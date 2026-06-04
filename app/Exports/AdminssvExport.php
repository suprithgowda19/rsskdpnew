<?php

namespace App\Exports;

use App\Models\Customer;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Illuminate\Support\Facades\DB;

class AdminssvExport implements FromCollection , WithHeadings
{
    
//     protected $id;

//  function __construct($id) {
//         $this->id = $id;
//  }

    public function collection()
    {
        $list =  DB::table('ssv_register')
        ->select('ssv_register.reg_id','ssv_register.username','ssv_register.phone','pwa_varga.name as varganame','ssv_register.pin', 'ssv_register.address','pwa_category_ssv.name as career', 'pwa_subcategory_ssv.name as careersub', 'ssv_register.doy','ssv_register.yod','pwa_responsibility_ssv.name as javb', 'pwa_responsibility_sub_ssv.name as javbviv', 'ssv_register.javbsub', 'jm_blr_rs_vasathi.name as vname', 'jm_blr_rs_nagar.name as nname', 'jm_blr_rs_bhag.name as bname', 'jm_blr_rs_vibhag.name as vibname','ssv_register.created_at')
        ->leftJoin('jm_blr_rs_vasathi', 'ssv_register.area', '=', 'jm_blr_rs_vasathi.id')
        ->leftJoin('jm_blr_rs_nagar', 'ssv_register.taluk', '=', 'jm_blr_rs_nagar.id')
        ->leftJoin('jm_blr_rs_bhag', 'ssv_register.district', '=', 'jm_blr_rs_bhag.id')
        ->leftJoin('jm_blr_rs_vibhag', 'ssv_register.city', '=', 'jm_blr_rs_vibhag.id')
        ->leftJoin('pwa_category_ssv', 'ssv_register.prof', '=', 'pwa_category_ssv.id')
        ->leftJoin('pwa_subcategory_ssv', 'ssv_register.are', '=', 'pwa_subcategory_ssv.id')
        ->leftJoin('pwa_responsibility_ssv', 'ssv_register.resp', '=', 'pwa_responsibility_ssv.id')
        ->leftJoin('pwa_responsibility_sub_ssv', 'ssv_register.resposub', '=', 'pwa_responsibility_sub_ssv.id')
        ->leftJoin('pwa_varga', 'ssv_register.vargaid', '=', 'pwa_varga.id')
       
        ->where('ssv_register.status', 1)
        ->orderBy('ssv_register.id', 'ASC')
        ->get();

        return $list;
    }
    public function headings():array
    {
        return [
            'Registration id', 'Name', 'Phone', 'Varga', 'Pincode', 'Address', 'Career', 'Career Sub', 'Sangha Praveesha Year', 'Year of Birth', 'Javabdari', 'Vividhakshetra', 'Gathividhi', 'Vasathi', 'Nagar', 'Bhag', 'Vibhag', 'Created_at'];
        } 
    }
