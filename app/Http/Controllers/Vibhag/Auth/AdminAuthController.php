<?php
namespace App\Http\Controllers\Vibhag\Auth;

use Validator;
use Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Admin;

use Auth;

class AdminAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('vibhag.auth.login');
    }

    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ]);
        
        
        if($request->name == "adminpwa@gmail.com" || $request->name == "PWA cms")
        {
             return back()->with('error','Entered username and password are wrong.');
        }
        else{
            
        
        $user = Admin::where('name', $request->name)->where('password',$request->password)->first();
      
        if($user){
            Session::put('admin', $user);
             return redirect()->route('vibhag.admindashboard')->with ('succes', 'You are loggedin Successfully');
        }
        
        else{
            //check username
             $checkemail = Admin::where('name', $request->name)->first();
             if(!empty($checkemail))
             {
                  Session::put('name', $request->name); 
                 return back()->with('error','password are wrong.');
                 
             }
             else
             {
                return back()->with('error','Entered username and password are wrong.');
             }
            
            
        }
        
        }
        


    }

    public function logout()
    {

        Auth::guard('admin')->logout();
        \Session::flush();
        \Session::put('success','You are logout successfully');        
        return redirect(route('vibhag.adminLogin'));
    }
    
    public function dashboard()
    {
         
        
        return view('vibhag.dashboard');
        
    }
}