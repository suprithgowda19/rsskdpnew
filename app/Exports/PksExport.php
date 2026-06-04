<?php

namespace App\Exports;

use App\Models\Customer;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Illuminate\Support\Facades\DB;

class PksExport implements FromCollection , WithHeadings
{
    protected $id;

 function __construct($id) {
        $this->id = $id;
 }

    public function collection()
    {
        $list =  DB::table('pks_form')
       ->select('pks_form.id','pks_form.name','pks_form.phone', 'pwa_responsibilitypks.name as javb', 'pwa_karyavibhag.name as career',  'jm_blr_rs_nagar.name as nname', 'jm_blr_rs_bhag.name as bname', 'jm_blr_rs_vibhag.name as vibname', 
        'pks_form.q1', 'pks_form.q2' ,'pks_form.q22' ,'pks_form.q23' ,'pks_form.q24' ,'pks_form.q3' ,'pks_form.q32' ,'pks_form.q33' ,'pks_form.q34' ,'pks_form.q4' ,
        'pks_form.q42' ,'pks_form.q43' ,'pks_form.q44' ,'pks_form.q5' ,'pks_form.q52' ,'pks_form.q53' ,'pks_form.q54' ,'pks_form.q6' ,'pks_form.q7' ,'pks_form.q8' ,
        'pks_form.q9' ,'pks_form.q10' ,'pks_form.q102' ,'pks_form.q103' ,'pks_form.q104' ,'pks_form.q105', 'pks_form.created_at')
        // ->join('jm_blr_rs_vasathi', 'pks_form.area', '=', 'jm_blr_rs_vasathi.id','left')
              ->join('jm_blr_rs_nagar', 'pks_form.taluk', '=', 'jm_blr_rs_nagar.id','left')
              ->join('jm_blr_rs_bhag', 'pks_form.district', '=', 'jm_blr_rs_bhag.id','left')
              ->join('jm_blr_rs_vibhag', 'pks_form.city', '=', 'jm_blr_rs_vibhag.id','left')
              ->join('pwa_karyavibhag', 'pks_form.karyavibhag', '=', 'pwa_karyavibhag.id','left')
              ->join('pwa_responsibilitypks', 'pks_form.resp', '=', 'pwa_responsibilitypks.id','left')
               ->where('pks_form.city', $this->id)
        ->where('pks_form.status', 1)
        ->orderBy('pks_form.id', 'ASC')
        ->get();

        return $list;
    }
    public function headings():array
    {
        return [
            'Id', 'Name', 'Phone', 'Javabdari', 'Karya Vibhag', 'Nagar', 'Bhag', 'Vibhag', 'Q1', 'Q2. Sub1', 'Q2. Sub2', 'Q2. Sub3', 'Q2. Sub4', 'Q3. Sub1', 
            'Q3. Sub2', 'Q3. Sub3', 'Q3. Sub4', 'Q4. Sub1', 'Q4. Sub2', 'Q4. Sub3', 'Q4. Sub4' , 'Q5. Sub1', 'Q5. Sub2', 'Q5. Sub3', 'Q5. Sub4', 'Q6', 'Q7', 'Q8', 'Q9',
            'Q10 Sub1', 'Q10 Sub2', 'Q10 Sub3', 'Q10 Sub4', 'Q10 Sub5', 'Created_at'];
        } 
    }
