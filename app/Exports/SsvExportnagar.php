<?php

namespace App\Exports;

use App\Models\Customer;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Illuminate\Support\Facades\DB;

class SsvExportnagar implements FromCollection , WithHeadings
{
    
    protected $id;

 function __construct($id) {
        $this->id = $id;
 }

    public function collection()
    {
        $list =  DB::table('ssv_register')
        ->select('ssv_register.reg_id','ssv_register.username','ssv_register.phone','ssv_register.email','pwa_varga.name as varganame','ssv_register.pin','ssv_register.grama', 'ssv_register.address','pwa_intre_area.name as interest','pwa_jagrithi.name as jagrithi','pwa_category.name as career', 'pwa_subcategory.name as careersub', 'ssv_register.doy','ssv_register.yod','pwa_responsibility.name as javb', 'pwa_responsibility_sub.name as javbviv', 'jm_blr_rs_vasathi.name as vname', 'jm_blr_rs_nagar.name as nname', 'jm_blr_rs_bhag.name as bname', 'jm_blr_rs_vibhag.name as vibname','ssv_register.created_at')
        ->leftJoin('jm_blr_rs_vasathi', 'ssv_register.area', '=', 'jm_blr_rs_vasathi.id')
        ->leftJoin('jm_blr_rs_nagar', 'ssv_register.taluk', '=', 'jm_blr_rs_nagar.id')
        ->leftJoin('jm_blr_rs_bhag', 'ssv_register.district', '=', 'jm_blr_rs_bhag.id')
        ->leftJoin('jm_blr_rs_vibhag', 'ssv_register.city', '=', 'jm_blr_rs_vibhag.id')
        ->leftJoin('pwa_jagrithi', 'ssv_register.jag', '=', 'pwa_jagrithi.id')
        ->leftJoin('pwa_intre_area', 'ssv_register.intrarea', '=', 'pwa_intre_area.id')
        ->leftJoin('pwa_category', 'ssv_register.prof', '=', 'pwa_category.id')
        ->leftJoin('pwa_subcategory', 'ssv_register.are', '=', 'pwa_subcategory.id')
        ->leftJoin('pwa_responsibility', 'ssv_register.resp', '=', 'pwa_responsibility.id')
        ->leftJoin('pwa_responsibility_sub', 'ssv_register.resposub', '=', 'pwa_responsibility_sub.id')
        ->leftJoin('pwa_varga', 'ssv_register.vargaid', '=', 'pwa_varga.id')
        ->where('ssv_register.taluk', $this->id)
        ->orderBy('ssv_register.id', 'ASC')
        ->get();
// dd($list);
        return $list;
    }
    public function headings():array
    {
        return [
            'Registration id', 'Name', 'Phone', 'Email','Varga', 'Pincode', 'Grama', 'Address', 'Intrest area',
            'Jagrithi', 'Career', 'Career Sub', 'Sangha Praveesha Year', 'Year of Birth', 'Javabdari', 'Vividhakshetra', 'Vasathi', 'Nagar', 'Bhag', 'Vibhag', 'Created_at'];
        } 
    }
