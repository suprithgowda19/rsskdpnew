<?php

namespace App\Http\Controllers\Admin;

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

use App\Exports\CustomersExport;

use App\Exports\AdminssvExport;

use App\Exports\AdminpksExport;

use App\Exports\VibhagExport;

use App\Exports\VasathiExport;

use App\Exports\VasathiallExport;

use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    
    public function vibhaglist()
    {
        return response()->json(
            DB::table('jm_blr_rs_vibhag')->orderBy('name', 'asc')->get()
        );
    }

    public function exportssv() 
    {
        $filename = 'SSV Members List-'.date('Ymd-his').'.xlsx';
        return Excel::download(new SsvExport, $filename);
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
    public function adminexportpks(Request $request) 
    {
        $filename = 'PKS ALL RegistrationList-'.date('Ymd-his').'.xlsx';
        return Excel::download(new AdminpksExport, $filename);
    }
    public function adminexportssv(Request $request) 
    {
        $filename = 'SSV ALL RegistrationList-'.date('Ymd-his').'.xlsx';
        return Excel::download(new AdminssvExport, $filename);
    }
    public function export(Request $request) 
    {
        $chunkc =  DB::table('customers')
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
        ->where('customers.status', 1)
        ->orderBy('customers.id', 'ASC')
        ->count();
        
            
            
           
        // $id = 1;
        $filename = 'RegistrationList-'.date('Ymd-his').'.xlsx';
            return Excel::download(new CustomersExport, $filename);
       
        // return Excel::download(new CustomersExport($id), $filename);
        
        
        
        
        
        
    //      $orders =  DB::table('customers')
    //     ->select('customers.reg_id','customers.username','customers.phone','customers.email','customers.pin','customers.grama', 'customers.address','pwa_intre_area.name as interest','pwa_jagrithi.name as jagrithi','pwa_category.name as career', 'pwa_subcategory.name as careersub', 'customers.doy','customers.yod','pwa_responsibility.name as javb', 'pwa_responsibility_sub.name as javbviv', 'jm_blr_rs_vasathi.name as vname', 'jm_blr_rs_nagar.name as nname', 'jm_blr_rs_bhag.name as bname', 'jm_blr_rs_vibhag.name as vibname','customers.created_at')
    //     ->leftJoin('jm_blr_rs_vasathi', 'customers.area', '=', 'jm_blr_rs_vasathi.id')
    //     ->leftJoin('jm_blr_rs_nagar', 'customers.taluk', '=', 'jm_blr_rs_nagar.id')
    //     ->leftJoin('jm_blr_rs_bhag', 'customers.district', '=', 'jm_blr_rs_bhag.id')
    //     ->leftJoin('jm_blr_rs_vibhag', 'customers.city', '=', 'jm_blr_rs_vibhag.id')
    //     ->leftJoin('pwa_jagrithi', 'customers.jag', '=', 'pwa_jagrithi.id')
    //     ->leftJoin('pwa_intre_area', 'customers.intrarea', '=', 'pwa_intre_area.id')
    //     ->leftJoin('pwa_category', 'customers.prof', '=', 'pwa_category.id')
    //     ->leftJoin('pwa_subcategory', 'customers.are', '=', 'pwa_subcategory.id')
    //     ->leftJoin('pwa_responsibility', 'customers.resp', '=', 'pwa_responsibility.id')
    //     ->leftJoin('pwa_responsibility_sub', 'customers.resposub', '=', 'pwa_responsibility_sub.id')
    //     ->where('customers.status', 1)
    //     ->orderBy('customers.id', 'ASC')
    //     ->get();
        
    //     Excel::create('Report', function($excel) use ($orders) {
    //     $excel->sheet('report', function($sheet) use($orders) {
    //         $sheet->appendRow(array(
    //             'Registration id', 'Name', 'Phone', 'Email', 'Pincode', 'Grama', 'Address', 'Intrest area', 'Jagrithi', 'Career', 'Career Sub', 'Sangha Praveesha Year', 'Year of Birth', 'Javabdari', 'Vividhakshetra', 'Vasathi', 'Nagar', 'Bhag', 'Vibhag', 'Created_at'
    //         ));
    //         $orders->chunk(100000, function($rows) use ($sheet)
    //         {
    //             foreach ($rows as $row)
    //             {
    //                 $sheet->appendRow(array(
    //                      $row->reg_id, $row->username, $row->phone, $row->email, $row->pin, $row->grama, $row->address, $row->interest, $row->jagrithi, $row->career, $row->careersub, $row->doy, $row->yod, $row->javb, $row->javbviv, $row->vname, $row->nname, $row->bname, $row->vibname, $row->created_at
        
                        
    //                 ));
    //             }
    //         });
    //     });
    // })->download($filename);
    
    
    
    }

    public function dashboard()
    {
        if(Auth::guard('admin'))
        {
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
             ->where('customers.status', 1)->paginate(10);
             
             
              $reports['max_vibhag'] =  DB::table('customers') ->select('jm_blr_rs_vibhag.name as vibname',DB::raw('COUNT(customers.city) as vibh_cnt'))
             ->leftjoin('jm_blr_rs_vibhag', 'customers.city', '=', 'jm_blr_rs_vibhag.id')
             ->where('customers.city','>', 0)->groupBy('customers.city')->orderBy('vibh_cnt','desc')->first();
             
             $reports['min_vibhag'] =  DB::table('customers') ->select('jm_blr_rs_vibhag.name as vibname',DB::raw('COUNT(customers.city) as vibh_cnt'))
             ->leftjoin('jm_blr_rs_vibhag', 'customers.city', '=', 'jm_blr_rs_vibhag.id')
             ->where('customers.city','>', 0)->groupBy('customers.city')->orderBy('vibh_cnt','asc')->first();
             
             $reports['max_bhag'] =  DB::table('customers') ->select('jm_blr_rs_bhag.name as bhag_name',DB::raw('COUNT(customers.district) as bhag_cnt'))
             ->leftjoin('jm_blr_rs_bhag', 'customers.district', '=', 'jm_blr_rs_bhag.id')
             ->where('customers.district','>', 0)->groupBy('customers.district')->orderBy('bhag_cnt','desc')->first();
             
             $reports['min_bhag'] =  DB::table('customers') ->select('jm_blr_rs_bhag.name as bhag_name',DB::raw('COUNT(customers.district) as bhag_cnt'))
             ->leftjoin('jm_blr_rs_bhag', 'customers.district', '=', 'jm_blr_rs_bhag.id')
             ->where('customers.district','>', 0)->groupBy('customers.district')->orderBy('bhag_cnt','asc')->first();
             
             $reports['max_nagar'] =  DB::table('customers') ->select('jm_blr_rs_nagar.name as nagar_name',DB::raw('COUNT(customers.taluk) as nagar_cnt'))
             ->leftjoin('jm_blr_rs_nagar', 'customers.taluk', '=', 'jm_blr_rs_nagar.id')
             ->where('customers.taluk','>', 0)->groupBy('customers.taluk')->orderBy('nagar_cnt','desc')->first();
             
             $reports['min_nagar'] =  DB::table('customers') ->select('jm_blr_rs_nagar.name as nagar_name',DB::raw('COUNT(customers.taluk) as nagar_cnt'))
             ->leftjoin('jm_blr_rs_nagar', 'customers.taluk', '=', 'jm_blr_rs_nagar.id')
             ->where('customers.taluk','>', 0)->groupBy('customers.taluk')->orderBy('nagar_cnt','asc')->first();
             
             $reports['max_vasathi'] =  DB::table('customers') ->select('jm_blr_rs_vasathi.name as vasathi_name',DB::raw('COUNT(customers.area) as vasathi_cnt'))
             ->leftjoin('jm_blr_rs_vasathi', 'customers.area', '=', 'jm_blr_rs_vasathi.id')
             ->where('customers.area','>', 0)->groupBy('customers.area')->orderBy('vasathi_cnt','desc')->first();
             
             $reports['min_vasathi'] =  DB::table('customers') ->select('jm_blr_rs_vasathi.name as vasathi_name',DB::raw('COUNT(customers.area) as vasathi_cnt'))
             ->leftjoin('jm_blr_rs_vasathi', 'customers.area', '=', 'jm_blr_rs_vasathi.id')
             ->where('customers.area','>', 0)->groupBy('customers.area')->orderBy('vasathi_cnt','asc')->first();
             
            
             
   
             $reports['count'] = DB::table('customers')->where('status', 1)->count();
             $reports['today'] = DB::table('customers')->where('created_at','like', $date.'%')->count();
             $reports['vibhag'] = DB::table('jm_blr_rs_vibhag')->orderBy('name','asc')->get();
             $reports['vasathi'] = DB::table('jm_blr_rs_vasathi')->count();
            //  dd($reports);
            return view('admin.dashboard', compact('reports'));
        }  
    }
    public function edit_profile()
    {
        
         $profile = DB::table('pwa_admin')->select('*')->first();
         
        return view('admin.editprofile', compact('profile'));
        
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
          return redirect()->route('adminLogout')->with ('succes', 'Updated admin details');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
    }
    public function managenews()
    {
        
        if(request()->ajax()) {
            $data = News::all();
    
            return DataTables::of($data)
        
            ->addColumn('id', function($data){
                
                if(empty($data)){
                    $id = '<a class="text-capitalize" href="'.url('admin/news/view/' . $data->news_id).'">'.$data->news_id.'</a>';
                }else{
                $id = '<a class="text-capitalize" href="'.url('admin/news/view/' . $data->news_id).'">'.$data->news_id.'</a> ';
                }
                return $id;
            })
            ->addColumn('title',function($data){
                $title =  '<a class="text-capitalize" href="'.url('admin/news/view/' . $data->news_id).'"><p class="text-capitalize">'.Str::limit($data->title, 20, $end='...').'</p></a>';
                return $title;
            })
            ->addColumn('image', function($data){
                
                $image = '<a class="text-capitalize" href="'.url('admin/news/view/' . $data->news_id).'"><img src="'.asset('uploads/news/' . $data->image).'" class="rounded-circle" width="100" height="100"></a>';
            
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
                 <a href="'.url('admin/news/edit/' . $data->news_id).'" class="btn btn-outline-primary-2x"><i class="icon-pencil-alt"></i></a>
                  
                 <a href="javascript:void(0)" data-id="'.$data->news_id.'" class="btn btn-outline-danger-2x" id="show-delete" ><i class="icon-trash" data-id="'.$data->news_id.'"></i></a>
                  ';
               
                
                $button .= '</div>';
                return $button;
            })
           
            ->rawColumns(['action','status','image','title','id'])
            ->addIndexColumn()
            ->make(true);
                
        }
         
        return view('admin.managenews');
        
    }
    public function addnews()
    {
         
        return view('admin.news');
        
    }
     public function news(Request $request)
    {
        $data['title'] = $request->title;
        $data['about'] = $request->about;
        $data['descp'] = $request->textbox;
        $data['status'] = $request->status ? "1" : "0";
        
        if($request->file('image'))
        {
            $file= $request->file('image');
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file-> move(public_path('uploads/news'), $filename);
            $data['image']= $filename;
        }

        $newsresult = DB::table('pwa_news')->insert($data);
        if(!empty($newsresult))
        {
           return redirect()->route('adminnews')->with ('succes', 'News added successfully');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
        
    }
    public function editnews($id)
    {
        $news = News::where('news_id', $id)->first();
        return view('admin.editnews', compact('news'));
    }
    public function updatenews(Request $request, $id)
    {
        
        $news['title'] =$request->title;
        $news['about'] = $request->about;
        $news['descp'] = $request->textbox;
        $news['status'] = $request->status ? "1" : "0";
        
        
        if($request->file('image'))
        {
            $file= $request->file('image');
            $filename= date('YmdHis').$file->getClientOriginalName();
            $file-> move(public_path('uploads/news'), $filename);
            $news['image']= $filename;
        }
        
       $upded = DB::table('pwa_news')->where('news_id', $id)->update($news);
        
        if(!empty($upded))
        {
          return redirect()->route('adminnews')->with ('succes', 'updated successfully');
        }
        else
        {
            return back()->with('error','something are wrong.');
        }
        
        
    }
    public function deletenews($id)
    {
        $deletd = DB::table('pwa_news')->where('news_id', $id)->delete();
        if(!empty($deletd))
        {
           return redirect()->route('adminnews')->with ('succes', 'News added successfully');
        }
        
    }
    public function viewnews($id)
    {
        $news = DB::table('pwa_news')->where('news_id', $id)->first();
        if(!empty($news))
        {
            return view('admin.viewnews', compact('news'));
        }
        
    }
}
