<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Models\Services;

use Illuminate\Support\Facades\Hash;

use Session;

use Auth;

use Redirect;

use DataTables;

use Str;

class ServicesController extends Controller
{
    public function manageservices()
    {
        if(request()->ajax()) {
            $data = Services::all();

            return DataTables::of($data)
                ->addColumn('title', function($data){
                    return '<a class="text-capitalize" href="'.url('admin/services/view/' . $data->services_id).'"><p class="text-capitalize">'.Str::limit($data->title, 20, $end='...').'</p></a>';
                })
                ->addColumn('image', function($data){
                    return '<a class="text-capitalize" href="'.url('admin/services/view/' . $data->services_id).'"><img src="'.asset('uploads/services/' . $data->image).'" class="rounded-circle" width="100" height="100"></a>';
                })
                ->addColumn('status', function($data){
                    return $data->status == 1
                        ? '<span class="badge badge-success"> Activated</span>'
                        : '<span class="badge badge-danger">Not Activated</span>';
                })
                ->addColumn('action', function($data){
                    return '<div class="">
                        <a href="'.url('admin/services/edit/' . $data->services_id).'" class="btn btn-outline-primary-2x"><i class="icon-pencil-alt"></i></a>
                        <a href="javascript:void(0)" data-id="'.$data->services_id.'" class="btn btn-outline-danger-2x" id="show-delete"><i class="icon-trash" data-id="'.$data->services_id.'"></i></a>
                    </div>';
                })
                ->rawColumns(['action','status','image','title'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.manageservices');
    }

    public function resourcelist()
    {
        return redirect()->route('adminservices');
    }

    public function managereports()
    {
      
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
             ->where('customers.status', 1)->paginate(10);
             
        // $reports = DB::table('customers')->where('status', 1)->paginate(10);
        return view('admin.managereport', compact('reports'));
        
    }
    public function addservices()
    {
         
        return view('admin.services');
        
    }
     public function services(Request $request)
    {
        $data['title'] = $request->title;
        $data['descp'] = $request->textbox;
        $data['status'] = $request->status ? "1" : "0";
        
        if($request->file('image'))
        {
            $file= $request->file('image');
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file-> move(public_path('uploads/services'), $filename);
            $data['image']= $filename;
        }

        $servicesresult = DB::table('pwa_services')->insert($data);
        if(!empty($servicesresult))
        {
           return redirect()->route('adminservices')->with ('succes', 'Services added successfully');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
        
    }
    public function editservices($id)
    {
        $services = Services::where('services_id', $id)->first();
        return view('admin.editservices', compact('services'));
    }
    public function updateservices(Request $request, $id)
    {
        
        $services['title'] =$request->title;
        $services['descp'] = $request->textbox;
        $services['status'] = $request->status ? "1" : "0";
        
        
        if($request->file('image'))
        {
            $file= $request->file('image');
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file-> move(public_path('uploads/services'), $filename);
            $services['image']= $filename;
        }
        
       $upded = DB::table('pwa_services')->where('services_id', $id)->update($services);
        
        if(!empty($upded))
        {
          return redirect()->route('adminservices')->with ('succes', 'updated successfully');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
        
    }
    public function deleteservices($id)
    {
        $deletd = DB::table('pwa_services')->where('services_id', $id)->delete();
        if(!empty($deletd))
        {
           return redirect()->route('adminservices')->with ('succes', 'Services added successfully');
        }
        
    }
    public function viewservices($id)
    {
        $services = DB::table('pwa_services')->where('services_id', $id)->first();
        if(!empty($services))
        {
            return view('admin.viewservices', compact('services'));
        }
        
    }
}
