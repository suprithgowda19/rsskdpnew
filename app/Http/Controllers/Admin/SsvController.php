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

class SsvController extends Controller
{
    public function managereports()
    {
      
             $reports['reg'] = DB::table('ssv_register')
             ->select('ssv_register.*','jm_blr_rs_vasathi.name as vname', 'jm_blr_rs_nagar.name as nname', 'jm_blr_rs_bhag.name as bname', 'jm_blr_rs_vibhag.name as vibname', 'pwa_category_ssv.name as career', 'pwa_subcategory_ssv.name as careersub', 'pwa_responsibility_ssv.name as javb', 'pwa_responsibility_sub_ssv.name as javbviv', 'pwa_varga.name as varga')
              ->join('jm_blr_rs_vasathi', 'ssv_register.area', '=', 'jm_blr_rs_vasathi.id','left')
              ->join('jm_blr_rs_nagar', 'ssv_register.taluk', '=', 'jm_blr_rs_nagar.id','left')
              ->join('jm_blr_rs_bhag', 'ssv_register.district', '=', 'jm_blr_rs_bhag.id','left')
              ->join('jm_blr_rs_vibhag', 'ssv_register.city', '=', 'jm_blr_rs_vibhag.id','left')
              ->join('pwa_category_ssv', 'ssv_register.prof', '=', 'pwa_category_ssv.id','left')
              ->join('pwa_subcategory_ssv', 'ssv_register.are', '=', 'pwa_subcategory_ssv.id','left')
              ->join('pwa_responsibility_ssv', 'ssv_register.resp', '=', 'pwa_responsibility_ssv.id','left')
                ->join('pwa_responsibility_sub_ssv', 'ssv_register.resposub', '=', 'pwa_responsibility_sub_ssv.id','left')
                ->join('pwa_varga', 'ssv_register.vargaid', '=', 'pwa_varga.id','left')
             ->where('ssv_register.status', 1)->paginate(10);
             
        // $reports = DB::table('ssv_register')->where('status', 1)->paginate(10);
        return view('admin.managereportssv', compact('reports'));
        
    }
}