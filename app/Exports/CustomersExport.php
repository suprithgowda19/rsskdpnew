<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return DB::table('customers')
            ->select('customers.reg_id', 'customers.username', 'customers.phone', 'customers.email', 'customers.pin', 'customers.address', 'pwa_category.name as career', 'pwa_subcategory.name as careersub', 'customers.yod', 'pwa_responsibility.name as javb', 'jm_blr_rs_vasathi.name as vname', 'jm_blr_rs_upavasathi.name as upavasathi_name', 'jm_blr_rs_nagar.name as nname', 'jm_blr_rs_bhag.name as bname', 'jm_blr_rs_vibhag.name as vibname', 'customers.created_at')
            ->leftJoin('jm_blr_rs_vasathi', 'customers.area', '=', 'jm_blr_rs_vasathi.id')
            ->leftJoin('jm_blr_rs_upavasathi', 'customers.upavasathi', '=', 'jm_blr_rs_upavasathi.id')
            ->leftJoin('jm_blr_rs_nagar', 'customers.taluk', '=', 'jm_blr_rs_nagar.id')
            ->leftJoin('jm_blr_rs_bhag', 'customers.district', '=', 'jm_blr_rs_bhag.id')
            ->leftJoin('jm_blr_rs_vibhag', 'customers.city', '=', 'jm_blr_rs_vibhag.id')
            ->leftJoin('pwa_category', 'customers.prof', '=', 'pwa_category.id')
            ->leftJoin('pwa_subcategory', 'customers.are', '=', 'pwa_subcategory.id')
            ->leftJoin('pwa_responsibility', 'customers.resp', '=', 'pwa_responsibility.id')
            ->where('customers.status', 1)
            ->orderBy('customers.id', 'ASC');
    }

    public function headings(): array
    {
        return [
            'Registration id', 'Name', 'Phone', 'Email', 'Pincode', 'Address',
            'Career', 'Career Sub', 'Year of Birth', 'Javabdari',
            'Vasathi', 'Upavasathi', 'Nagar', 'Bhag', 'Vibhag', 'Created_at',
        ];
    }
}
