<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Models\Updates;

use Illuminate\Support\Facades\Hash;

use Session;

use Auth;

use Redirect;

use DataTables;

use Str;

class BupdatesController extends Controller
{
    public function manageupdates()
    {
        
        if(request()->ajax()) {
            $data = Updates::all();
    
            return DataTables::of($data)
        
            ->addColumn('id', function($data){
                
                if(empty($data)){
                    $id = '<a class="text-capitalize" href="'.url('admin/updates/view/' . $data->updates_id).'">'.$data->updates_id.'</a>';
                }else{
                $id = '<a class="text-capitalize" href="'.url('admin/updates/view/' . $data->updates_id).'">'.$data->updates_id.'</a> ';
                }
                return $id;
            })
            ->addColumn('title',function($data){
                $title =  '<a class="text-capitalize" href="'.url('admin/updates/view/' . $data->updates_id).'"><p class="text-capitalize">'.Str::limit($data->title, 20, $end='...').'</p></a>';
                return $title;
            })
            ->addColumn('image', function($data){
                
                $image = '<a class="text-capitalize" href="'.url('admin/updates/view/' . $data->updates_id).'"><img src="'.asset('uploads/updates/' . $data->image).'" class="rounded-circle" width="100" height="100"></a>';
            
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
                 <a href="'.url('admin/updates/edit/' . $data->updates_id).'" class="btn btn-outline-primary-2x"><i class="icon-pencil-alt"></i></a>
                  
                 <a href="javascript:void(0)" data-id="'.$data->updates_id.'" class="btn btn-outline-danger-2x" id="show-delete" ><i class="icon-trash" data-id="'.$data->updates_id.'"></i></a>
                  ';
               
                
                $button .= '</div>';
                return $button;
            })
           
            ->rawColumns(['action','status','image','title','id'])
            ->addIndexColumn()
            ->make(true);
                
        }
         
        return view('admin.manageupdates');
        
    }
    public function addupdates()
    {
         
        return view('admin.updates');
        
    }
     public function updates(Request $request)
    {
        $data['title'] = $request->title;
        $data['tag'] = $request->tag;
        $data['about'] = $request->about;
        $data['descp'] = $request->textbox;
        $data['status'] = $request->status ? "1" : "0";
        
        if($request->file('image'))
        {
            $file= $request->file('image');
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file-> move(public_path('uploads/updates'), $filename);
            $data['image']= $filename;
        }

        $updatesresult = DB::table('pwa_updates')->insert($data);
        if(!empty($updatesresult))
        {
           return redirect()->route('adminupdates')->with ('succes', 'Basavanagudi Updates added successfully');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
        
    }
    public function editupdates($id)
    {
        $updates = Updates::where('updates_id', $id)->first();
        return view('admin.editupdates', compact('updates'));
    }
    public function updateupdates(Request $request, $id)
    {
        
        $updates['title'] =$request->title;
        $updates['tag'] =$request->tag;
        $updates['about'] = $request->about;
        $updates['descp'] = $request->textbox;
        $updates['status'] = $request->status ? "1" : "0";
        
        
        if($request->file('image'))
        {
            $file= $request->file('image');
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file-> move(public_path('uploads/updates'), $filename);
            $updates['image']= $filename;
        }
        
       $upded = DB::table('pwa_updates')->where('updates_id', $id)->update($updates);
        
        if(!empty($upded))
        {
          return redirect()->route('adminupdates')->with ('succes', 'updated successfully');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
        
    }
    public function deleteupdates($id)
    {
        $deletd = DB::table('pwa_updates')->where('updates_id', $id)->delete();
        if(!empty($deletd))
        {
           return redirect()->route('adminupdates')->with ('succes', 'Basavanagudi Updates added successfully');
        }
        
    }
    public function viewupdates($id)
    {
        $updates = DB::table('pwa_updates')->where('updates_id', $id)->first();
        if(!empty($updates))
        {
            return view('admin.viewupdates', compact('updates'));
        }
        
    }
}