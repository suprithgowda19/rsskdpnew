<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;

use Session;

use Auth;

use Redirect;

use DataTables;

use Str;

class PksController extends Controller
{
    public function managereports()
    {
      
             $reports['reg'] = DB::table('pks_form')
             ->select('pks_form.*','jm_blr_rs_vasathi.name as vname', 'jm_blr_rs_nagar.name as nname', 'jm_blr_rs_bhag.name as bname', 'jm_blr_rs_vibhag.name as vibname', 'pwa_karyavibhag.name as karyavib', 'pwa_responsibilitypks.name as javb')
              ->join('jm_blr_rs_vasathi', 'pks_form.area', '=', 'jm_blr_rs_vasathi.id','left')
              ->join('jm_blr_rs_nagar', 'pks_form.taluk', '=', 'jm_blr_rs_nagar.id','left')
              ->join('jm_blr_rs_bhag', 'pks_form.district', '=', 'jm_blr_rs_bhag.id','left')
              ->join('jm_blr_rs_vibhag', 'pks_form.city', '=', 'jm_blr_rs_vibhag.id','left')
              ->join('pwa_karyavibhag', 'pks_form.karyavibhag', '=', 'pwa_karyavibhag.id','left')
              ->join('pwa_responsibilitypks', 'pks_form.resp', '=', 'pwa_responsibilitypks.id','left')
             ->where('pks_form.status', 1)->paginate(10);
             
        // $reports = DB::table('pks_form')->where('status', 1)->paginate(10);
        return view('admin.managereportpks', compact('reports'));
        
    }
}