<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Models\Customer;

use Illuminate\Support\Facades\Hash;

use Session;

use Auth;

use Redirect;

use Stevebauman\Location\Facades\Location;

use Illuminate\Support\Facades\Crypt;


class SsvController extends Controller
{
    public function index()
    {
        $dash['banner'] = DB::table('pwa_banner')->select('*')->where('status',1)->get();
        $dash['news'] = DB::table('pwa_news')->select('*')->where('status',1)->get();
        $dash['activities'] = DB::table('pwa_activities')->select('*')->where('status',1)->get();
        $dash['updates'] = DB::table('pwa_updates')->select('*')->where('status',1)->get();
        $dash['events'] = DB::table('pwa_events')->select('*')->where('status',1)->limit('1')->first();
        $dash['scheme'] = DB::table('pwa_scheme')->select('*')->where('status',1)->get();
        $dash['about'] = DB::table('pwa_about')->select('*')->where('status',1)->get();
        $dash['content'] = DB::table('pwa_content')->select('*')->where('status',1)->limit('1')->first();
        $dash['services'] = DB::table('pwa_services')->select('*')->where('status',1)->get();

        return view('ssv.index', compact('dash'));
    }

    public function register()
    {
        return view('ssv.register');  
    }

    public function registerstore(Request $request)
    {

        $chkexist =  DB::table('ssv_register')->where('phone', $request->input('phone'))->where('username', $request->input('name'))->first();

        if(!empty($chkexist))
        {
            return redirect()->route('ssv.register')->with('error', 'Already Registered, Please check the status for the details');
        }
        else
        {
        
            // $data['email'] = $request->input('email');
            // $data['inst'] = $request->input('inst');
            // $data['grama'] = $request->input('grama');
            // $data['fprathyear'] = $request->input('fprathyear');
            // $data['sprathyear'] = $request->input('sprathyear');
            // $data['fprath'] = $request->input('fprath');
            // $data['sprath'] = $request->input('sprath');
            // if(!empty($request->input('intrarea')))
            // {
            //     $data['intrarea'] = implode(",",$request->input('intrarea'));
            // }
            //  if(!empty($request->input('jag')))
            // {
            // $data['jag'] = implode(",",$request->input('jag'));
            // }
            
            $data['vargaid'] = $request->input('vargaid');
            $data['username'] = $request->input('name');
            $data['phone'] = $request->input('phone');
            $data['yod'] = $request->input('yod');
            $data['doy'] = $request->input('doy');
            $data['pin'] = $request->input('pin');
            $data['address'] = $request->input('address');
            $data['are'] = $request->input('are');
            $data['prof'] = $request->input('prof');
            $data['shakehead'] = $request->input('shakehead');
            $data['shake'] = $request->input('shake');
            $data['resp'] = $request->input('resp');
            $data['javbsub'] = $request->input('javbsub');
            $data['resposub'] = $request->input('resposub');
            $data['city'] = $request->input('city');
            $data['district'] = $request->input('district');
            $data['taluk'] = $request->input('taluk');
            $data['area'] = $request->input('area');
            
            

            $data['status'] = '1';
            $cstresult = DB::table('ssv_register')->insert($data);
             
            
            $v =  DB::getPdo()->lastInsertId();
            $upd['reg_id'] = date('Y')."00".$v;
            DB::table('ssv_register')->where('id', $v)->update($upd);
            
            if($cstresult)
            {
                return redirect()->route('ssv.register')->with('success','Registered successfully!!');
            }
            else
            {
                Session::flash('error','Exist this email or phone'); 
                return redirect()->route('ssv.register')->with('error', 'Invalid inputs you entered');
            }
        }

    }
    
     public function checkstatus(Request $request)
    {
        if($request->input('phone'))
        {
            
            $chkexist =  DB::table('ssv_register')->where('phone', $request->input('phone'))->first();

        if(!empty($chkexist))
        {
            $reports = DB::table('ssv_register')
             ->select('ssv_register.*','jm_blr_rs_vasathi.name as vname', 'jm_blr_rs_nagar.name as nname', 'jm_blr_rs_bhag.name as bname', 'jm_blr_rs_vibhag.name as vibname', 'pwa_category.name as career', 'pwa_subcategory.name as careersub', 'pwa_responsibility.name as javb', 'pwa_responsibility_sub.name as javbviv')
              ->join('jm_blr_rs_vasathi', 'ssv_register.area', '=', 'jm_blr_rs_vasathi.id','left')
              ->join('jm_blr_rs_nagar', 'ssv_register.taluk', '=', 'jm_blr_rs_nagar.id','left')
              ->join('jm_blr_rs_bhag', 'ssv_register.district', '=', 'jm_blr_rs_bhag.id','left')
               ->join('jm_blr_rs_vibhag', 'ssv_register.city', '=', 'jm_blr_rs_vibhag.id','left')
               ->join('pwa_category', 'ssv_register.prof', '=', 'pwa_category.id','left')
               ->join('pwa_subcategory', 'ssv_register.are', '=', 'pwa_subcategory.id','left')
               ->join('pwa_responsibility', 'ssv_register.resp', '=', 'pwa_responsibility.id','left')
                ->join('pwa_responsibility_sub', 'ssv_register.resposub', '=', 'pwa_responsibility_sub.id','left')
             ->where('ssv_register.phone', $request->input('phone'))->where('ssv_register.status', 1)->get();
            
          
            return redirect()->route('ssv.checkstatus')->with('success', 'Already Registered')->with('data', $reports);
        }
        else
        {
            
            return redirect()->route('ssv.checkstatus')->with('error', 'It is not registered, Kindly register');
        }
            
        }
        else{
            return view('includes.checkstatus', ['checkStatusRoute' => 'ssv.checkstatus']);
        }
          
    }




}
