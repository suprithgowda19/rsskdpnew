<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Models\Versions;

use Illuminate\Support\Facades\Hash;

use Session;

use Auth;

use Redirect;

use DataTables;

use Str;

class VersionController extends Controller
{
    public function home()
    {
         $versions = Versions::where('status', 1)->get();
        return view('versions', compact('versions'));
        
    }
    public function manageversions()
    {
         $versions = Versions::all();
        return view('admin.version.manageversions', compact('versions'));
        
    }
    public function addversions()
    {
         
        return view('admin.version.versions');
        
    }
     public function versions(Request $request)
    {
        $data['versions'] = $request->versions;
        // $data['title'] =$request->title;
        // $data['descp'] = $request->textbox;
        
        
        // $data['versions'] = ($request->versions) ? implode(',', $request->versions) : " ";
        $data['title'] = ($request->title) ? implode('||', $request->title) : " ";
        $data['descp'] = ($request->textbox) ? implode('||', $request->textbox) : " ";
        
        
        $data['status'] = $request->status ? "1" : "0";
        
        // if($request->file('image'))
        // {
        //     $file= $request->file('image');
        //     $filename= uniqid().date('YmdHis').$file->getClientOriginalName();
        //     $file-> move(public_path('uploads/versions'), $filename);
        //     $data['image']= $filename;
        // }
        
        $images=array();
        
        if ($request->hasFile('image')) 
        {
            $files=$request->file('image');
                $i=1;
            foreach($files as $file)
            {
                $image_name = uniqid().date('YmdHis').$i.$file->getClientOriginalName();
                $destinationPath = public_path('uploads/versions');
                $file->move($destinationPath, $image_name);
                $images[]=$image_name;
                $i++;
                
            }
            $data['image'] = implode("||",$images);
            
        }
        // dd($data);
        $versionsresult = DB::table('versions')->insert($data);
        if(!empty($versionsresult))
        {
           return redirect()->route('adminversions')->with ('succes', 'Version added successfully');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
        
    }
    public function editversions($id)
    {
        $versions = Versions::where('versions_id', $id)->first();
        return view('admin.version.editversions', compact('versions'));
    }
    public function updateversions(Request $request, $id)
    {
        
        $versions['date'] = $request->date;
        $versions['time'] =$request->time;
        $news['descp'] = $request->textbox;
        $versions['location'] = $request->location;
        $versions['prime_member'] =$request->name;
        $versions['prime_member_desig'] = $request->desig;
        $versions['secondary_member'] = ($request->secondary_name) ? implode(',', $request->secondary_name) : " ";
        $versions['status'] = $request->status ? "1" : "0";
        
        if($request->file('image'))
        {
            $file= $request->file('image');
            $filename= uniqid().date('YmdHis').$file->getClientOriginalName();
            $file-> move(public_path('uploads/versions'), $filename);
            $versions['prime_member_image']= $filename;
        }
        
        $images=array();
        
        if ($request->hasFile('image2')) 
        {
            $files=$request->file('image2');
                $i=1;
            foreach($files as $file)
            {
                $image_name = uniqid().date('YmdHis').$i.$file->getClientOriginalName();
                $destinationPath = public_path('uploads/versions');
                $file->move($destinationPath, $image_name);
                $images[]=$image_name;
                $i++;
                
            }
            $versions['secondary_member_image'] = implode("|",$images);
            
        }
        
       $upded = DB::table('pwa_versions')->where('versions_id', $id)->update($versions);
        
        if(!empty($upded))
        {
          return redirect()->route('adminversions')->with ('succes', 'updated successfully');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
        
    }
    public function deleteversions($id)
    {
        $deletd = DB::table('versions')->where('id', $id)->delete();
        if(!empty($deletd))
        {
           return redirect()->route('adminversions')->with ('succes', 'Events added successfully');
        }
        
    }
    public function viewversions($id)
    {
        $versions = DB::table('versions')->where('id', $id)->first();
        if(!empty($versions))
        {
            return view('admin.version.viewversions', compact('versions'));
        }
        
    }
}