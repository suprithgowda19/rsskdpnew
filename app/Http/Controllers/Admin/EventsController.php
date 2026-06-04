<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Models\Events;

use Illuminate\Support\Facades\Hash;

use Session;

use Auth;

use Redirect;

use DataTables;

use Str;

class EventsController extends Controller
{
    public function manageevents()
    {
        
        if(request()->ajax()) {
            $data = Events::all();
    
            return DataTables::of($data)
        
            ->addColumn('id', function($data){
                
                if(empty($data)){
                    $id = '<a class="text-capitalize" href="'.url('admin/events/view/' . $data->events_id).'">'.$data->events_id.'</a>';
                }else{
                $id = '<a class="text-capitalize" href="'.url('admin/events/view/' . $data->events_id).'">'.$data->events_id.'</a> ';
                }
                return $id;
            })
            ->addColumn('name',function($data){
                $name =  '<a class="text-capitalize" href="'.url('admin/events/view/' . $data->events_id).'"><p class="text-capitalize">'.$data->prime_member.'</p></a>';
                return $name;
            })
             ->addColumn('location',function($data){
                $location =  '<p class="text-capitalize">'.$data->location.'</p>';
                return $location;
            })
             ->addColumn('date',function($data){
                $date =  '<p class="text-capitalize">'.$data->date.'</p>';
                return $date;
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
                 <a href="'.url('admin/events/edit/' . $data->events_id).'" class="btn btn-outline-primary-2x"><i class="icon-pencil-alt"></i></a>
                  
                 <a href="javascript:void(0)" data-id="'.$data->events_id.'" class="btn btn-outline-danger-2x" id="show-delete" ><i class="icon-trash" data-id="'.$data->events_id.'"></i></a>
                  ';
               
                
                $button .= '</div>';
                return $button;
            })
           
            ->rawColumns(['action','status','name','date','location','id'])
            ->addIndexColumn()
            ->make(true);
                
        }
         
        return view('admin.manageevents');
        
    }
    public function addevents()
    {
         
        return view('admin.events');
        
    }
     public function events(Request $request)
    {
        $data['date'] = $request->date;
        $data['time'] =$request->time;
        $data['descp'] = $request->textbox;
        $data['location'] = $request->location;
        $data['prime_member'] =$request->name;
        $data['prime_member_desig'] = $request->desig;
        $data['secondary_member'] = ($request->secondary_name) ? implode(',', $request->secondary_name) : " ";
        $data['status'] = $request->status ? "1" : "0";
        
        if($request->file('image'))
        {
            $file= $request->file('image');
            $filename= uniqid().date('YmdHis').$file->getClientOriginalName();
            $file-> move(public_path('uploads/events'), $filename);
            $data['prime_member_image']= $filename;
        }
        
        $images=array();
        
        if ($request->hasFile('image2')) 
        {
            $files=$request->file('image2');
                $i=1;
            foreach($files as $file)
            {
                $image_name = uniqid().date('YmdHis').$i.$file->getClientOriginalName();
                $destinationPath = public_path('uploads/events');
                $file->move($destinationPath, $image_name);
                $images[]=$image_name;
                $i++;
                
            }
            $data['secondary_member_image'] = implode("|",$images);
            
        }
        
        $eventsresult = DB::table('pwa_events')->insert($data);
        if(!empty($eventsresult))
        {
           return redirect()->route('adminevents')->with ('succes', 'Events added successfully');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
        
    }
    public function editevents($id)
    {
        $events = Events::where('events_id', $id)->first();
        return view('admin.editevents', compact('events'));
    }
    public function updateevents(Request $request, $id)
    {
        
        $events['date'] = $request->date;
        $events['time'] =$request->time;
        $news['descp'] = $request->textbox;
        $events['location'] = $request->location;
        $events['prime_member'] =$request->name;
        $events['prime_member_desig'] = $request->desig;
        $events['secondary_member'] = ($request->secondary_name) ? implode(',', $request->secondary_name) : " ";
        $events['status'] = $request->status ? "1" : "0";
        
        if($request->file('image'))
        {
            $file= $request->file('image');
            $filename= uniqid().date('YmdHis').$file->getClientOriginalName();
            $file-> move(public_path('uploads/events'), $filename);
            $events['prime_member_image']= $filename;
        }
        
        $images=array();
        
        if ($request->hasFile('image2')) 
        {
            $files=$request->file('image2');
                $i=1;
            foreach($files as $file)
            {
                $image_name = uniqid().date('YmdHis').$i.$file->getClientOriginalName();
                $destinationPath = public_path('uploads/events');
                $file->move($destinationPath, $image_name);
                $images[]=$image_name;
                $i++;
                
            }
            $events['secondary_member_image'] = implode("|",$images);
            
        }
        
       $upded = DB::table('pwa_events')->where('events_id', $id)->update($events);
        
        if(!empty($upded))
        {
          return redirect()->route('adminevents')->with ('succes', 'updated successfully');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
        
    }
    public function deleteevents($id)
    {
        $deletd = DB::table('pwa_events')->where('events_id', $id)->delete();
        if(!empty($deletd))
        {
           return redirect()->route('adminevents')->with ('succes', 'Events added successfully');
        }
        
    }
    public function viewevents($id)
    {
        $events = DB::table('pwa_events')->where('events_id', $id)->first();
        if(!empty($events))
        {
            return view('admin.viewevents', compact('events'));
        }
        
    }
}