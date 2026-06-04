<?php

namespace App\Exports;

use App\Models\Customer;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Illuminate\Support\Facades\DB;

class VasathiExport implements FromCollection , WithHeadings
{
    
    protected $id;

 function __construct($id) {
        $this->id = $id;
 }

    public function collection()
    {
        $list =  DB::table('customers')
        ->select('customers.reg_id','customers.username','customers.phone','customers.email','customers.pin','customers.grama', 'customers.address','pwa_intre_area.name as interest','pwa_jagrithi.name as jagrithi','pwa_category.name as career', 'pwa_subcategory.name as careersub', 'customers.doy','customers.yod','pwa_responsibility.name as javb', 'pwa_responsibility_sub.name as javbviv', 'jm_blr_rs_vasathi.name as vname', 'jm_blr_rs_nagar.name as nname', 'jm_blr_rs_bhag.name as bname', 'jm_blr_rs_vibhag.name as vibname','customers.created_at')
        ->leftJoin('jm_blr_rs_vasathi', 'customers.area', '=', 'jm_blr_rs_vasathi.id')
        ->leftJoin('jm_blr_rs_nagar', 'customers.taluk', '=', 'jm_blr_rs_nagar.id')
        ->leftJoin('jm_blr_rs_bhag', 'customers.district', '=', 'jm_blr_rs_bhag.id')
        ->leftJoin('jm_blr_rs_vibhag', 'customers.city', '=', 'jm_blr_rs_vibhag.id')
        ->leftJoin('pwa_jagrithi', 'customers.jag', '=', 'pwa_jagrithi.id')
        ->leftJoin('pwa_intre_area', 'customers.intrarea', '=', 'pwa_intre_area.id')
        ->leftJoin('pwa_category', 'customers.prof', '=', 'pwa_category.id')
        ->leftJoin('pwa_subcategory', 'customers.are', '=', 'pwa_subcategory.id')
        ->leftJoin('pwa_responsibility', 'customers.resp', '=', 'pwa_responsibility.id')
        ->leftJoin('pwa_responsibility_sub', 'customers.resposub', '=', 'pwa_responsibility_sub.id')
        ->where('customers.area', $this->id)
        ->orderBy('customers.id', 'ASC')
        ->get();
// dd($list);
        return $list;
    }
    public function headings():array
    {
        return [
            'Registration id', 'Name', 'Phone', 'Email', 'Pincode', 'Grama', 'Address', 'Intrest area',
            'Jagrithi', 'Career', 'Career Sub', 'Sangha Praveesha Year', 'Year of Birth', 'Javabdari', 'Vividhakshetra', 'Vasathi', 'Nagar', 'Bhag', 'Vibhag', 'Created_at'];
        } 
    }
