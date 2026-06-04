<?php

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

require __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$source = $argv[1] ?? null;
$commit = in_array('--commit', $argv, true);

if (!$source || !is_file($source)) {
    fwrite(STDERR, "Usage: php scripts/import_upavasathi.php <workbook.xlsx> [--commit]\n");
    exit(1);
}

function normalizeName($value): string
{
    $value = strtoupper(trim((string) $value));
    return preg_replace('/[^A-Z0-9]+/', '', $value);
}

function valueFrom(array $row, string $heading)
{
    return $row[$heading] ?? null;
}

function indexRows($rows, string $parentColumn = null): array
{
    $index = [];

    foreach ($rows as $row) {
        $parent = $parentColumn ? (string) $row->{$parentColumn} : 'root';
        $key = $parent.'|'.normalizeName($row->name);
        $index[$key][] = $row;
    }

    return $index;
}

function singleMatch(array $index, $parentId, $name): array
{
    $key = (string) $parentId.'|'.normalizeName($name);
    $matches = $index[$key] ?? [];

    if (count($matches) === 1) {
        return ['status' => 'matched', 'row' => $matches[0]];
    }

    return ['status' => count($matches) > 1 ? 'ambiguous' : 'unmatched', 'row' => null];
}

$vibhags = indexRows(DB::table('jm_blr_rs_vibhag')->select('id', 'name')->get());
$bhags = indexRows(DB::table('jm_blr_rs_bhag')->select('id', 'vibhag_id', 'name')->get(), 'vibhag_id');
$nagars = indexRows(DB::table('jm_blr_rs_nagar')->select('id', 'bhag_id', 'name')->get(), 'bhag_id');
$vasathis = indexRows(DB::table('jm_blr_rs_vasathi')->select('id', 'nagar_id', 'name')->get(), 'nagar_id');

$spreadsheet = IOFactory::load($source);
$report = [];
$inserts = [];
$summary = [
    'source_rows' => 0,
    'matched' => 0,
    'already_exists' => 0,
    'unmatched_vibhag' => 0,
    'unmatched_bhag' => 0,
    'unmatched_nagar' => 0,
    'unmatched_vasathi' => 0,
    'ambiguous' => 0,
    'invalid' => 0,
];

foreach ($spreadsheet->getWorksheetIterator() as $sheet) {
    $rows = $sheet->toArray(null, true, true, false);
    $headings = array_map(fn ($value) => trim((string) $value), $rows[1] ?? []);

    foreach (array_slice($rows, 2) as $values) {
        $row = array_combine($headings, array_pad($values, count($headings), null));
        $upavasathi = trim((string) valueFrom($row, 'Grama / Upavasati'));

        if ($upavasathi === '') {
            continue;
        }

        $summary['source_rows']++;
        $result = [
            'sheet' => $sheet->getTitle(),
            'sl_no' => valueFrom($row, 'Sl No.'),
            'vibhaga' => valueFrom($row, 'Vibhaga'),
            'bhag' => valueFrom($row, 'Zilla / Bhag'),
            'nagar' => valueFrom($row, 'Taluku / Nagara'),
            'vasathi' => valueFrom($row, 'Mandala / Vasati'),
            'upavasathi' => $upavasathi,
            'vasathi_id' => null,
            'status' => null,
        ];

        $vibhag = singleMatch($vibhags, 'root', $result['vibhaga']);
        if ($vibhag['status'] !== 'matched') {
            $result['status'] = $vibhag['status'].'_vibhag';
        } else {
            $bhag = singleMatch($bhags, $vibhag['row']->id, $result['bhag']);
            if ($bhag['status'] !== 'matched') {
                $result['status'] = $bhag['status'].'_bhag';
            } else {
                $nagar = singleMatch($nagars, $bhag['row']->id, $result['nagar']);
                if ($nagar['status'] !== 'matched') {
                    $result['status'] = $nagar['status'].'_nagar';
                } else {
                    $vasathi = singleMatch($vasathis, $nagar['row']->id, $result['vasathi']);
                    if ($vasathi['status'] !== 'matched') {
                        $result['status'] = $vasathi['status'].'_vasathi';
                    } else {
                        $result['vasathi_id'] = $vasathi['row']->id;
                        $sourceKey = 'BDV-Upavasati-2025.xlsx|'.$sheet->getTitle().'|'.$result['sl_no'];
                        $exists = DB::table('jm_blr_rs_upavasathi')
                            ->where('vasathi_id', (string) $vasathi['row']->id)
                            ->where('description', $sourceKey)
                            ->exists();

                        if ($exists) {
                            $result['status'] = 'already_exists';
                        } else {
                            $result['status'] = 'matched';
                            $inserts[] = [
                                'vasathi_id' => (string) $vasathi['row']->id,
                                'name' => $upavasathi,
                                'name_kn' => $upavasathi,
                                'description' => $sourceKey,
                                'is_updated' => 0,
                                'updated_by' => 0,
                                'is_deleted' => 0,
                                'deleted_by' => 0,
                            ];
                        }
                    }
                }
            }
        }

        if (str_starts_with($result['status'], 'ambiguous')) {
            $summary['ambiguous']++;
        } elseif (array_key_exists($result['status'], $summary)) {
            $summary[$result['status']]++;
        } else {
            $summary['invalid']++;
        }

        $report[] = $result;
    }
}

$reportPath = __DIR__.'/../storage/app/upavasathi_import_report.csv';
$handle = fopen($reportPath, 'w');
fputcsv($handle, array_keys($report[0] ?? []));
foreach ($report as $row) {
    fputcsv($handle, $row);
}
fclose($handle);

if ($commit && $inserts) {
    DB::transaction(function () use ($inserts) {
        foreach (array_chunk($inserts, 500) as $chunk) {
            DB::table('jm_blr_rs_upavasathi')->insert($chunk);
        }
    });
}

echo json_encode([
    'mode' => $commit ? 'commit' : 'dry-run',
    'summary' => $summary,
    'rows_ready_to_insert' => count($inserts),
    'report' => realpath($reportPath),
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE).PHP_EOL;
