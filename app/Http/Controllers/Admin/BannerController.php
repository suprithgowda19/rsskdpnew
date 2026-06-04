<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Models\Banner;

use Illuminate\Support\Facades\Hash;

use Session;

use Auth;

use Redirect;

use DataTables;

use Str;

class BannerController extends Controller
{
    public function managebanner()
    {
        
        if(request()->ajax()) {
            $data = Banner::all();
    
            return DataTables::of($data)
        
            ->addColumn('id', function($data){
                
                if(empty($data)){
                    $id = '<a class="text-capitalize" href="'.url('admin/banner/view/' . $data->banner_id).'">'.$data->banner_id.'</a>';
                }else{
                $id = '<a class="text-capitalize" href="'.url('admin/banner/view/' . $data->banner_id).'">'.$data->banner_id.'</a> ';
                }
                return $id;
            })
            ->addColumn('title',function($data){
                $title =  '<a class="text-capitalize" href="'.url('admin/banner/view/' . $data->banner_id).'"><p class="text-capitalize">'.Str::limit($data->title, 20, $end='...').'</p></a>';
                return $title;
            })
            ->addColumn('image', function($data){
                
                $image = '<a class="text-capitalize" href="'.url('admin/banner/view/' . $data->banner_id).'"><img src="'.asset('uploads/banner/' . $data->image).'" class="rounded-circle" width="100" height="100"></a>';
            
                return $image;
            })
            ->addColumn('status', function($data){
    
                    if($data->status != null){

                        if($data->status == 1){
                                $status = '<span class="badge badge-success"> Activated</span>';
            
                            }
                           
                            else{
                                $status = '<span class="badge badge-danger">Not Activated</span>';
                            }
            
                            return $status;

                    }
                    
                })
            ->addColumn('action', function($data){
    
                $button = '<div class = "">';
                  $button .= '
                 <a href="'.url('admin/banner/edit/' . $data->banner_id).'" class="btn btn-outline-primary-2x"><i class="icon-pencil-alt"></i></a>
                  
                 <a href="javascript:void(0)" data-id="'.$data->banner_id.'" class="btn btn-outline-danger-2x" id="show-delete" ><i class="icon-trash" data-id="'.$data->banner_id.'"></i></a>
                  ';
               
                
                $button .= '</div>';
                return $button;
            })
           
            ->rawColumns(['action','status','image','title','id'])
            ->addIndexColumn()
            ->make(true);
                
        }
         
        return view('admin.managebanner');
        
    }
    public function addbanner()
    {
         
        return view('admin.banner');
        
    }
     public function banner(Request $request)
    {
        $data['title'] = $request->title;
        $data['descp'] = $request->textbox;
        $data['status'] = $request->status ? "1" : "0";
        
        
        if($request->file('image'))
        {
            $file= $request->file('image');
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file-> move(public_path('uploads/banner'), $filename);
            $data['image']= $filename;
        }

        $bannerresult = DB::table('pwa_banner')->insert($data);
        if(!empty($bannerresult))
        {
           return redirect()->route('adminbanner')->with ('succes', 'Banner added successfully');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
        
    }
    public function editbanner($id)
    {
        $banner = Banner::where('banner_id', $id)->first();
        return view('admin.editbanner', compact('banner'));
    }
    public function updatebanner(Request $request, $id)
    {
        
        $banner['title'] =$request->title;
        $banner['descp'] = $request->textbox;
        $banner['status'] = $request->status ? "1" : "0";
        
        
        if($request->file('image'))
        {
            $file= $request->file('image');
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file-> move(public_path('uploads/banner'), $filename);
            $banner['image']= $filename;
        }
        
       $upded = DB::table('pwa_banner')->where('banner_id', $id)->update($banner);
        
        if(!empty($upded))
        {
          return redirect()->route('adminbanner')->with ('succes', 'updated successfully');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
        
    }
    public function deletebanner($id)
    {
        $deletd = DB::table('pwa_banner')->where('banner_id', $id)->delete();
        if(!empty($deletd))
        {
           return redirect()->route('adminbanner')->with ('succes', 'Banner added successfully');
        }
        
    }
    public function viewbanner($id)
    {
        $banner = DB::table('pwa_banner')->where('banner_id', $id)->first();
        if(!empty($banner))
        {
            return view('admin.viewbanner', compact('banner'));
        }
        
    }
}