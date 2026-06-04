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


class Home extends Controller
{
    
    public function pks()
    {
        return view('pks.register');  
    }

    public function pksstore(Request $request)
    {
        if($request->input('phone'))
        {
            
            $chkexist =  DB::table('pks_form')->where('phone', $request->input('phone'))->first();
        
        if(empty($chkexist))
        {
        $data['name'] = $request->input('name');
        $data['phone'] = $request->input('phone');
            $data['q1'] = $request->input('q1');
            $data['q2'] = $request->input('q2i');
            $data['q22'] = $request->input('q2ii');
            $data['q23'] = $request->input('q2iii');
            $data['q24'] = $request->input('q2iv');
            $data['q3'] = $request->input('q3i');
            $data['q32'] = $request->input('q3ii');
            $data['q33'] = $request->input('q3iii');
            $data['q34'] = $request->input('q3iv');
            $data['q4'] = $request->input('q4i');
            $data['q42'] = $request->input('q4ii');
            $data['q43'] = $request->input('q4iii');
            $data['q44'] = $request->input('q4iv');
            $data['q5'] = $request->input('q5i');
            $data['q52'] = $request->input('q5ii');
            $data['q53'] = $request->input('q5iii');
            $data['q54'] = $request->input('q5iv');
            $data['q6'] = $request->input('q6');
            $data['q7'] = $request->input('q7');
            $data['q8'] = $request->input('q8');
            $data['q9'] = $request->input('q9');
            $data['q10'] = $request->input('q10i');
            $data['q102'] = $request->input('q10ii');
            $data['q103'] = $request->input('q10iii');
            $data['q104'] = $request->input('q10iv');
            $data['q105'] = $request->input('q10v');
            $data['karyavibhag'] = $request->input('karyavibhag');
            $data['area'] = $request->input('area');
            $data['resp'] = $request->input('resp');
            $data['taluk'] = $request->input('taluk');
            $data['district'] = $request->input('district');
            $data['city'] = $request->input('city');
            $data['status'] = '1';
            $cstresult = DB::table('pks_form')->insert($data);
            
            if($cstresult)
            {
                return redirect()->route('pks')->with('success','Form Submitted successfully!!');
            }
            else
            {
                
                return redirect()->route('pks')->with('error', 'Invalid inputs you entered');
            }
        }
        else{
             return redirect()->route('pks')->with('error', 'Already Registered this mobile number');
            
        }
        }
    }
    public function listresources(Request $request)
    {
        $resources =  DB::table('pwa_activities')->where('status', 1)->get();
        return view('includes.resources',compact('resources'));  
        
    }
    
    public function verifymobile(Request $request)
    {

        
    }
    
    public function checkstatus(Request $request)
    {
        if($request->input('phone'))
        {
            
            $chkexist =  DB::table('customers')->where('phone', $request->input('phone'))->first();

        if(!empty($chkexist))
        {
            $reports = DB::table('customers')
             ->select('customers.*','jm_blr_rs_vasathi.name as vname', 'jm_blr_rs_nagar.name as nname', 'jm_blr_rs_bhag.name as bname', 'jm_blr_rs_vibhag.name as vibname', 'pwa_category.name as career', 'pwa_subcategory.name as careersub', 'pwa_responsibility.name as javb', 'pwa_responsibility_sub.name as javbviv')
              ->join('jm_blr_rs_vasathi', 'customers.area', '=', 'jm_blr_rs_vasathi.id','left')
              ->join('jm_blr_rs_nagar', 'customers.taluk', '=', 'jm_blr_rs_nagar.id','left')
              ->join('jm_blr_rs_bhag', 'customers.district', '=', 'jm_blr_rs_bhag.id','left')
               ->join('jm_blr_rs_vibhag', 'customers.city', '=', 'jm_blr_rs_vibhag.id','left')
               ->join('pwa_category', 'customers.prof', '=', 'pwa_category.id','left')
               ->join('pwa_subcategory', 'customers.are', '=', 'pwa_subcategory.id','left')
               ->join('pwa_responsibility', 'customers.resp', '=', 'pwa_responsibility.id','left')
                ->join('pwa_responsibility_sub', 'customers.resposub', '=', 'pwa_responsibility_sub.id','left')
             ->where('customers.phone', $request->input('phone'))->where('customers.status', 1)->get();
            
          
            return redirect()->route('checkstatus')->with('success', 'Already Registered')->with('data', $reports);
        }
        else
        {
            
            return redirect()->route('checkstatus')->with('error', 'It is not registered, Kindly register');
        }
            
        }
        else{
            return view('includes.checkstatus');
        }
          
    }

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

        return view('includes.index', compact('dash'));
    }

    public function register()
    {
        return view('includes.register');  
    }

    public function registerstore(Request $request)
    {

        $chkexist =  DB::table('customers')->where('phone', $request->input('phone'))->where('username', $request->input('name'))->first();

        if(!empty($chkexist))
        {
            return redirect()->route('register')->with('error', 'Already Registered, Please check the status for the details');
        }
        else
        {
            $validUpavasathi = DB::table('jm_blr_rs_upavasathi')
                ->where('id', $request->input('upavasathi'))
                ->where('vasathi_id', $request->input('area'))
                ->exists();

            if (!$validUpavasathi)
            {
                return redirect()->route('register')->with('error', 'Please select a valid Upavasathi.');
            }

            $data['username'] = $request->input('name');
            $data['email'] = $request->input('email');
            $data['phone'] = $request->input('phone');
            $data['address'] = $request->input('address');
            $data['prof'] = $request->input('prof');
            $data['are'] = $request->input('are');
            $data['inst'] = $request->input('inst');
            $data['doy'] = $request->input('doy');
            $data['resposub'] = $request->input('resposub');
            $data['javbsub'] = $request->input('javbsub');
            $data['resp'] = $request->input('resp');
            $data['yod'] = $request->input('yod');
            $data['area'] = $request->input('area');
            $data['upavasathi'] = $request->input('upavasathi');
            $data['taluk'] = $request->input('taluk');
            $data['district'] = $request->input('district');
            $data['pin'] = $request->input('pin');
            $data['grama'] = $request->input('grama');
            $data['city'] = $request->input('city');
            if(!empty($request->input('intrarea')))
            {
                $data['intrarea'] = implode(",",$request->input('intrarea'));
            }
             if(!empty($request->input('jag')))
            {
            $data['jag'] = implode(",",$request->input('jag'));
            }

            $data['status'] = '1';
            $cstresult = DB::table('customers')->insert($data);
             
            
            $v =  DB::getPdo()->lastInsertId();
            $upd['reg_id'] = date('Y')."00".$v;
            DB::table('customers')->where('id', $v)->update($upd);
            
            if($cstresult)
            {
                return redirect()->route('register')->with('success','Registered successfully!!');
            }
            else
            {
                Session::flash('error','Exist this email or phone'); 
                return redirect()->route('register')->with('error', 'Invalid inputs you entered');
            }
        }

    }

    public function dashboard()
    {
        $dashactive1 = "active-nav";
        return view('includes.index', compact('dashactive1')); 
    }

    public function maintanence()
    {
        return view('includes.maintanence');
    }

    public function logout()
    {
        Auth::logout();
        Auth::guard('customer')->logout();
        return redirect()->route('login');
    }

    public function loginind()
    {
        return view('includes.login')->with('loading','Connecting Public...');; 
    }

    public function login(Request $request)
    {
        return back()->with('error', 'Login is currently under maintenance.');
    }

    public function forgotpassword()
    {
        return $this->maintanence();
    }

    public function forgotpasswordstore(Request $request)
    {
        return redirect()->route('maintanence');
    }

    public function confirmpasswordstore(Request $request)
    {
        return redirect()->route('maintanence');
    }

    public function newtickets()
    {
        return $this->maintanence();
    }

    public function mytickets()
    {
        return $this->maintanence();
    }

    public function newticketsstore(Request $request)
    {
        return redirect()->route('maintanence');
    }

    public function transformations()
    {
        return $this->maintanence();
    }

    public function category()
    {
        return $this->maintanence();
    }

    public function subcategory()
    {
        return $this->maintanence();
    }

    public function joinus()
    {
        return $this->maintanence();
    }

    public function media()
    {
        return $this->maintanence();
    }

    public function transformation()
    {
        return $this->maintanence();
    }



}
