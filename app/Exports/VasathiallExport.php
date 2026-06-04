<?php

namespace App\Exports;

use App\Models\Customer;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Illuminate\Support\Facades\DB;

class VasathiallExport implements FromCollection , WithHeadings
{

    public function collection()
    {
         
          $lists =  DB::table('customers') ->select('jm_blr_rs_vasathi.id as id','jm_blr_rs_vasathi.name as respname',DB::raw('COUNT(customers.area) as respcount'))
             ->join('jm_blr_rs_vasathi', 'customers.area', '=', 'jm_blr_rs_vasathi.id')
            ->whereNotNull('customers.area')->groupBy('customers.area')->orderBy('id')->get();
          
            //  dd($lists);
        return $lists;
    }
    public function headings():array
    {
        return [
            'Sl.No',' Vasathi Name', 'Count'];
        } 
    }
