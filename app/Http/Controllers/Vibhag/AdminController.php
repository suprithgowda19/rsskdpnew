<?php

namespace App\Http\Controllers\Vibhag;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Models\News;

use Illuminate\Support\Facades\Hash;

use Session;

use Auth;

use Redirect;

use DataTables;

use Str;

use Carbon\Carbon;

use App\Models\Customer;

use App\Exports\SsvExport;

use App\Exports\PksExport;

use App\Exports\VibhagcustomersExport;

use App\Exports\VibhagExport;

use App\Exports\VasathiExport;

use App\Exports\VasathiallExport;

use Maatwebsite\Excel\Facades\Excel;

use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class AdminController extends Controller
{
    public function vibhaglist()
    {
        return response()->json(
            DB::table('jm_blr_rs_vibhag')->orderBy('name', 'asc')->get()
        );
    }

    public function exportpks($id) 
    {
        $filename = 'PKS Members List-'.date('Ymd-his').'.xlsx';
        return Excel::download(new PksExport($id), $filename);
    }
    public function pksdashboard()
  {
      
    if(Auth::guard('admin'))
    {
      $city =  Session::get('admin')->vid;
      $date = Carbon::now()->format('Y-m-d');
    //   , 'pwa_responsibility_sub.name as javbviv'
      $reports['reg'] = DB::table('pks_form')
             ->select('pks_form.*','jm_blr_rs_vasathi.name as vname', 'jm_blr_rs_nagar.name as nname', 'jm_blr_rs_bhag.name as bname', 'jm_blr_rs_vibhag.name as vibname', 'pwa_karyavibhag.name as career', 'pwa_responsibilitypks.name as javb')
              ->join('jm_blr_rs_vasathi', 'pks_form.area', '=', 'jm_blr_rs_vasathi.id','left')
              ->join('jm_blr_rs_nagar', 'pks_form.taluk', '=', 'jm_blr_rs_nagar.id','left')
              ->join('jm_blr_rs_bhag', 'pks_form.district', '=', 'jm_blr_rs_bhag.id','left')
              ->join('jm_blr_rs_vibhag', 'pks_form.city', '=', 'jm_blr_rs_vibhag.id','left')
              ->join('pwa_karyavibhag', 'pks_form.karyavibhag', '=', 'pwa_karyavibhag.id','left')
              ->join('pwa_responsibilitypks', 'pks_form.resp', '=', 'pwa_responsibilitypks.id','left')
      ->where('pks_form.city', $city)
      ->where('pks_form.status', 1)->paginate(10);
      
      
      $reports['count'] = DB::table('pks_form')->where('city', $city)->where('status', 1)->count();
      $reports['today'] = DB::table('pks_form')->where('city', $city)->where('created_at','like', $date.'%')->count();
      
      return view('vibhag.pksdashboard', compact('reports'));
    }  
  }
     public function ssvdashboard()
  {
      
    if(Auth::guard('admin'))
    {
      $city =  Session::get('admin')->vid;
      $date = Carbon::now()->format('Y-m-d');
    //   , 'pwa_responsibility_sub.name as javbviv'
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
              ->where('ssv_register.city', $city)
      ->where('ssv_register.status', 1)->paginate(10);
      
      
      $reports['count'] = DB::table('ssv_register')->where('city', $city)->where('status', 1)->count();
      $reports['today'] = DB::table('ssv_register')->where('city', $city)->where('created_at','like', $date.'%')->count();
      
      return view('vibhag.ssvdashboard', compact('reports'));
    }  
  }
    public function exportssv($id) 
    {
        $filename = 'SSV Members List-'.date('Ymd-his').'.xlsx';
        return Excel::download(new SsvExport($id), $filename);
    }
     public function vasathiallreport() 
    {
        $filename = 'VasathiList-'.date('Ymd-his').'.xlsx';
        return Excel::download(new VasathiallExport, $filename);
    }
    public function javbreport() 
    {
        $resp =  DB::table('customers') ->select('pwa_responsibility.id as respid','pwa_responsibility.name as respname',DB::raw('COUNT(customers.resp) as respcount'))
             ->leftjoin('pwa_responsibility', 'customers.resp', '=', 'pwa_responsibility.id')
             ->where('customers.resp','<','10')->where('customers.resp','>','0')->groupBy('customers.resp')->orderBy('respcount')->get();
       echo json_encode($resp);
    }
    public function careerreport() 
    {
        $career =  DB::table('customers') ->select('pwa_category.id as careerid','pwa_category.name as careername',DB::raw('COUNT(customers.prof) as careercount'))
             ->leftjoin('pwa_category', 'customers.prof', '=', 'pwa_category.id')
             ->where('customers.prof','>', 0)->groupBy('customers.prof')->orderBy('careercount')->get();
       echo json_encode($career);
    }
     public function vasathiexport($id) 
    {
       $filename = 'Vasathi Wise Registration List-'.date('Ymd-his').'.xlsx';
       return Excel::download(new VasathiExport($id), $filename);
    }
    public function vibhagexport($id) 
    {
       $filename = 'Vibhag Wise Registration List-'.date('Ymd-his').'.xlsx';
       return Excel::download(new VibhagExport($id), $filename);
    }
    public function export(Request $request) 
    {
        $filename = 'RegistrationList-'.date('Ymd-his').'.xlsx';
        return Excel::download(new VibhagcustomersExport, $filename);
   
    }

    public function dashboard()
    {
        
        if(Auth::guard('admin'))
        {
            $city =  Session::get('admin')->vid;
            $date = Carbon::now()->format('Y-m-d');
            
             $reports['reg'] = DB::table('customers')
             ->select('customers.*','jm_blr_rs_vasathi.name as vname', 'jm_blr_rs_nagar.name as nname', 'jm_blr_rs_bhag.name as bname', 'jm_blr_rs_vibhag.name as vibname', 'pwa_category.name as career', 'pwa_subcategory.name as careersub', 'pwa_responsibility.name as javb', 'pwa_responsibility_sub.name as javbviv')
              ->join('jm_blr_rs_vasathi', 'customers.area', '=', 'jm_blr_rs_vasathi.id','left')
              ->join('jm_blr_rs_nagar', 'customers.taluk', '=', 'jm_blr_rs_nagar.id','left')
              ->join('jm_blr_rs_bhag', 'customers.district', '=', 'jm_blr_rs_bhag.id','left')
              ->join('jm_blr_rs_vibhag', 'customers.city', '=', 'jm_blr_rs_vibhag.id','left')
              ->join('pwa_category', 'customers.prof', '=', 'pwa_category.id','left')
              ->join('pwa_subcategory', 'customers.are', '=', 'pwa_subcategory.id','left')
              ->join('pwa_responsibility', 'customers.resp', '=', 'pwa_responsibility.id','left')
                ->join('pwa_responsibility_sub', 'customers.resposub', '=', 'pwa_responsibility_sub.id','left')
                ->where('customers.city', $city)
             ->where('customers.status', 1)->paginate(10);
             
   
             $reports['count'] = DB::table('customers')->where('city', $city)->where('status', 1)->count();
             $reports['today'] = DB::table('customers')->where('city', $city)->where('created_at','like', $date.'%')->count();
          
            return view('vibhag.dashboard', compact('reports'));
        }  
    }
    public function edit_profile()
    {
        
         $profile = DB::table('pwa_admin')->select('*')->first();
         
        return view('vibhag.editprofile', compact('profile'));
        
    }
    public function update_profile(Request $request, $id)
    {
        $profile['name'] =$request->name;
        $profile['email'] = $request->email;
        $profile['password'] = $request->password;
        $profile['address'] =$request->address;
        $profile['city'] = $request->city;
        $profile['country'] = $request->country;
        $profile['pin'] = $request->pin;
        
        
        if($request->file('image'))
        {
            $file= $request->file('image');
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file-> move(public_path('uploads/profile'), $filename);
            $profile['image']= $filename;
        }
        
       $upded = DB::table('pwa_admin')->where('admin_id', $id)->update($profile);
        
        if(!empty($upded))
        {
          return redirect()->route('vibhag.adminLogout')->with ('succes', 'Updated admin details');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
    }
    
}
