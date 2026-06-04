<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Models\Customerssv;

use App\Exports\SsvExportvibhag;

use App\Exports\SsvExportbhag;

use App\Exports\SsvExportnagar;

use Illuminate\Support\Facades\Hash;

use Session;

use Auth;

use Redirect;

use Stevebauman\Location\Facades\Location;

use Illuminate\Support\Facades\Crypt;

use Carbon\Carbon;

use Maatwebsite\Excel\Facades\Excel;


class Reportssv extends Controller
{
    public function ssvexportnagar($id) 
    {
       
       $filename = 'SSV Members List Nagar-'.date('Ymd-his').'.xlsx';
       return Excel::download(new SsvExportnagar($id), $filename);
    }
    public function ssvexportbhag($id) 
    {
       
       $filename = 'SSV Members List Bhag-'.date('Ymd-his').'.xlsx';
       return Excel::download(new SsvExportbhag($id), $filename);
    }
    public function ssvexportvibhag($id) 
    {
        
       $filename = 'SSV Members List Vibhag-'.date('Ymd-his').'.xlsx';
       return Excel::download(new SsvExportvibhag($id), $filename);
    }
    public function vibhagmandala(Request $request)
    {
        $bhag = $request->bhag;
        $vibhag = $request->vibhag;
        $nagar = $request->nagar;
        
        $date = Carbon::now()->format('Y-m-d');
             $count = DB::table('ssv_register')->where('taluk', $nagar)->where('district', $bhag)->where('city', $vibhag)->where('status', 1)->count();
             $today = DB::table('ssv_register')->where('taluk', $nagar)->where('district', $bhag)->where('city', $vibhag)->where('created_at','like', $date.'%')->count();
             
             
        $mandala = DB::table('jm_blr_rs_vasathi')->where('nagar_id',$nagar)->get();
        $data = '';
        $data.='
        
          <div class="row p-4">
            <h2>Swayamsevak Registration</h2>
            
        </div>
        <div class="row mb-0">
            <div class="col-6 pe-0">
                <div class="card card-style">
            <div class="content mb-0">
                <div class="row ">
                    <div class="col-12 pe-0">
                        <h2 class="text-center">'.$count.'</h2>
                    </div>
                    <div class="col-12">
                        <h6 class="text-center">Total </h6>
                    </div>
                </div>
            </div>
        </div>      
            </div>
          
        </div>
        
        
        
				 <h2 class="color-highlight m-4 text-uppercase">Mandala / Vasathi </h2>
        <div class="card card-style">
			<div class="content">';
				foreach($mandala as $nag)
				{
				 $data.='<div class="d-flex">
					<div class="ps-3">
						<h4>'.$nag->name.'</h4>
					</div>';
					$id = $nag->id;
         $v_count = DB::table('ssv_register')->where('area', $id)->where('status', 1)->count();
				$data.='<div class="ms-auto align-self-center">
						<h1 class="font-20">'.$v_count.'</h1>
					</div>
				</div>
				<div class="divider mt-3 mb-3"></div>';
				}
			$data.='</div>
		</div>';
		
        $response = $data;
        return response()->json($response); 
    }
    
    public function vibhagbhag(Request $request)
    {
        $id = $request->vibhag;
        
         $date = Carbon::now()->format('Y-m-d');
             $count = DB::table('ssv_register')->where('city', $id)->where('status', 1)->count();
             $today = DB::table('ssv_register')->where('city', $id)->where('created_at','like', $date.'%')->count();
        
        
        $bhag = DB::table('jm_blr_rs_bhag')->where('vibhag_id',$id)->get();
        $data = '';
        $data.='
        
        <div class="row p-4">
            <h2>Swayamsevak Registration</h2>
            
        </div>
        <div class="row mb-0">
            <div class="col-6 pe-0">
                <div class="card card-style">
            <div class="content mb-0">
                <div class="row ">
                    <div class="col-12 pe-0">
                        <h2 class="text-center">'.$count.'</h2>
                    </div>
                    <div class="col-12">
                        <h6 class="text-center">Total </h6>
                    </div>
                </div>
            </div>
        </div>      
            </div>
            
        </div>
        
        
        <div class="card card-style">
			<div class="content">
				 <h2 class="text-danger rdash m-4">Bhag / Jille Dashboard </h2>';
				foreach($bhag as $bha)
				{
				 $data.='<div class="d-flex">
					<div class="ps-3">
						<h4>'.$bha->name.'</h4>
					</div>';
					$id = $bha->id;
         $v_count = DB::table('ssv_register')->where('district', $id)->where('status', 1)->count();
				$data.='<div class="ms-auto align-self-center">
						<h1 class="font-20">'.$v_count.'</h1>
					</div>
				</div>
				<div class="divider mt-3 mb-3"></div>';
				}
			$data.='</div>
		</div>';
		
		
	
		
        $response = $data;
        return response()->json($response); 
    }
    
    public function bhagnagar(Request $request)
    {
        $id = $request->vibhag;
        
         $date = Carbon::now()->format('Y-m-d');
             $count = DB::table('ssv_register')->where('city', $id)->where('status', 1)->count();
             $today = DB::table('ssv_register')->where('city', $id)->where('created_at','like', $date.'%')->count();
        
        
        $bhag = DB::table('jm_blr_rs_bhag')->where('vibhag_id',$id)->get();
        $data = '';
        $data.='
        
        <div class="row p-4">
            <h2>Swayamsevak Registration</h2>
            
        </div>
        <div class="row mb-0">
            <div class="col-6 pe-0">
                <div class="card card-style">
            <div class="content mb-0">
                <div class="row ">
                    <div class="col-12 pe-0">
                        <h2 class="text-center">'.$count.'</h2>
                    </div>
                    <div class="col-12">
                        <h6 class="text-center">Total </h6>
                    </div>
                </div>
            </div>
        </div>      
            </div>
           
        </div>
        
        
        <div class="card card-style">
			<div class="content">
				 <h2 class="text-danger rdash m-4">Bhag / Jille Dashboard </h2>';
				foreach($bhag as $bha)
				{
				 $data.='<div class="d-flex">
					<div class="ps-3">
						<h4>'.$bha->name.'</h4>
					</div>';
					$id = $bha->id;
         $v_count = DB::table('ssv_register')->where('district', $id)->where('status', 1)->count();
				$data.='<div class="ms-auto align-self-center">
						<h1 class="font-20">'.$v_count.'</h1>
					</div>
				</div>
				<div class="divider mt-3 mb-3"></div>';
				}
			$data.='</div>
		</div>
		
		  <h2 class="color-highlight m-4 text-uppercase">Nagar / Taluk</h2>';
 
				foreach($bhag as $bh)
				{
				
        
         	$data.='<div class="card card-style">
			<div class="content">
				<h2 class="color-highlight m-4 text-uppercase">'.$bh->name.'</h2>';
				
				$id = $bh->id;
				 $reports['nagar'] = DB::table('jm_blr_rs_nagar')->where('bhag_id',$id)->get();
				
				foreach($reports['nagar'] as $nag)
				{
				
				 $data.='<div class="d-flex">
					<div class="ps-3">
						<h4 class="text-uppercase">'.$nag->name.'</h4>
					</div>';
					
					$id = $nag->id;
         $v_count = DB::table('ssv_register')->where('taluk', $id)->where('status', 1)->count();
         
				$data.='<div class="ms-auto align-self-center">
						<h1 class="font-20">'.$v_count.'</h1>
					</div>
				</div>
				<div class="divider mt-3 mb-3"></div>';
				
				}
				
		$data.='</div>
		</div>';
           } 
		
		
	
		
        $response = $data;
        return response()->json($response); 
    }
    
    public function kdpdashboard()
    {
        $date = Carbon::now()->format('Y-m-d');
             $reports['count'] = DB::table('ssv_register')->where('status', 1)->count();
             $reports['today'] = DB::table('ssv_register')->where('created_at','like', $date.'%')->count();
             
             $reports['vibhag'] = DB::table('jm_blr_rs_vibhag')->orderBy('priority','asc')->get();
            //  dd($reports);
            return view('reportssv.kdp', compact('reports'));
    }
    
     public function vibhagdashboardall()
    {
        $date = Carbon::now()->format('Y-m-d');
             $reports['count'] = DB::table('ssv_register')->where('status', 1)->count();
             $reports['today'] = DB::table('ssv_register')->where('created_at','like', $date.'%')->count();
             
             $reports['bhag'] = DB::table('jm_blr_rs_bhag')->orderBy('name','asc')->get();
            //  dd($reports);
            return view('reportssv.vibhagall', compact('reports'));
    }
    
    public function vibhagdashboardids($id)
    {
        if($id < 9)
        {
           $reports['vibhagid'] = $id;
            $reports['vibhag'] = DB::table('jm_blr_rs_vibhag')->where('id',$id)->first();
         $reports['bhag'] = DB::table('jm_blr_rs_bhag')->where('vibhag_id',$id)->get();
        $date = Carbon::now()->format('Y-m-d');
             $reports['today'] = DB::table('ssv_register')->where('city', $id)->where('created_at','like', $date.'%')->count();
              $reports['count'] = DB::table('ssv_register')->where('city', $id)->where('status', 1)->count();
            
            return view('reportssv.vibhags', compact('reports'));
            
        }
        
    }
    public function bhagdashboardids($id)
    {
        if($id < 39){
            
            $reports['bhag'] = DB::table('jm_blr_rs_bhag')->where('id',$id)->first();
         $reports['nagar'] = DB::table('jm_blr_rs_nagar')->where('bhag_id',$id)->get();
        $date = Carbon::now()->format('Y-m-d');
             $reports['today'] = DB::table('ssv_register')->where('district', $id)->where('created_at','like', $date.'%')->count();
              $reports['count'] = DB::table('ssv_register')->where('district', $id)->where('status', 1)->count();
            
            return view('reportssv.bhags', compact('reports'));
            
        }
        
    }
    
    public function nagardashboardids($id)
    {
        if($id < 282){
            
            $reports['nagar'] = DB::table('jm_blr_rs_nagar')->where('id',$id)->first();
         $reports['vasathi'] = DB::table('jm_blr_rs_vasathi')->where('nagar_id',$id)->get();
        $date = Carbon::now()->format('Y-m-d');
             $reports['today'] = DB::table('ssv_register')->where('taluk', $id)->where('created_at','like', $date.'%')->count();
              $reports['count'] = DB::table('ssv_register')->where('taluk', $id)->where('status', 1)->count();
            
            return view('reportssv.nagars', compact('reports'));
            
        }
        
    }
    
    public function vibhagdashboard()
    {
        $date = Carbon::now()->format('Y-m-d');
             $reports['count'] = DB::table('ssv_register')->where('status', 1)->count();
             $reports['today'] = DB::table('ssv_register')->where('created_at','like', $date.'%')->count();
             $reports['vibhag'] = DB::table('jm_blr_rs_vibhag')->orderBy('name','asc')->get();
            //  dd($reports);
            return view('reportssv.vibhag', compact('reports'));
    }
    public function bhagdashboard()
    {
        $date = Carbon::now()->format('Y-m-d');
             $reports['count'] = DB::table('ssv_register')->where('status', 1)->count();
             $reports['today'] = DB::table('ssv_register')->where('created_at','like', $date.'%')->count();
             
            //  dd($reports);
            return view('reportssv.bhag', compact('reports'));
    }
     public function nagardashboard()
    {
        $date = Carbon::now()->format('Y-m-d');
             $reports['count'] = DB::table('ssv_register')->where('status', 1)->count();
             $reports['today'] = DB::table('ssv_register')->where('created_at','like', $date.'%')->count();
             
            //  dd($reports);
            return view('reportssv.nagar', compact('reports'));
    }
   
    public function vibhag()
    {
        $date = Carbon::now()->format('Y-m-d');
             $reports['count'] = DB::table('ssv_register')->where('status', 1)->count();
             $reports['today'] = DB::table('ssv_register')->where('created_at','like', $date.'%')->count();
             $reports['ssv'] = DB::table('ssv_register')->where('status', 1)->orderBy('id','desc')->get();
            //  dd($reports);
            return view('reportssv.report', compact('reports'));
    }
    public function vibhaglist()
    {
        $ssv = DB::table('ssv_register')->where('status', 1)->orderBy('id','desc')->get();
        $ssvcnt = 1;
        $date = Carbon::now()->format('Y-m-d');
             $count = DB::table('ssv_register')->where('status', 1)->count();
             $today = DB::table('ssv_register')->where('created_at','like', $date.'%')->count();
             
        $vibhag = DB::table('jm_blr_rs_vibhag')->orderBy('priority','asc')->get();
        $data = '';
        $data.='
        
        <div class="row p-4">
            <h2>Swayamsevak Registration</h2>
            
        </div>
        <div class="row mb-0">
            <div class="col-6 pe-0">
                <div class="card card-style">
            <div class="content mb-0">
                <div class="row ">
                    <div class="col-12 pe-0">
                        <h2 class="text-center">'.$count.'</h2>
                    </div>
                    <div class="col-12">
                        <h6 class="text-center">Total </h6>
                    </div>
                </div>
            </div>
        </div>      
            </div>
        
        </div>
        
        
        <div class="card card-style">
			<div class="content">
				<h2 class="text-danger rdash m-4">Karnataka Dakshina Prantha Dashboard</h2>';
				foreach($vibhag as $vib)
				{
				 $data.='<div class="d-flex">
					<div class="ps-3">
						<h4>'.$vib->name.'</h4>
					</div>';
					$id = $vib->id;
         $v_count = DB::table('ssv_register')->where('city', $id)->where('status', 1)->count();
				$data.='<div class="ms-auto align-self-center">
						<h1 class="font-20">'.$v_count.'</h1>
					</div>
				</div>
				<div class="divider mt-3 mb-3"></div>';
				}
			$data.='</div>
		</div>';
		
		
		
		if($count > 0){
		
		$data.='
        
        <div class="card card-style">
			<div class="content">
			 <div class="text-end mt-2" >
              </div>
				<h2 class="text-danger rdash m-4">SSV Members List</h2>';
				foreach($ssv as $sv)
				{
				 $data.='<div class="d-flex ">
				 <div class="ps-3 pl-4">
						<h4>'.$ssvcnt.'</h4>
					</div>
					<div class="ps-3 pl-4">
						<h4>'.$sv->username.'</h4>
					</div>
			
				</div>
				<div class="divider mt-3 mb-3"></div>';
				$ssvcnt++;
				}
			$data.='</div>
		</div>';
		
		}
		
		echo json_encode($data);
    }
    
    public function vibhaglistall()
    {
        $vibhag = DB::table('jm_blr_rs_vibhag')->orderBy('priority','asc')->get();
        $response = $vibhag;
        return response()->json($response); 
    }
    
    public function bhag(Request $request)
    {
        $id = $request->vibhag;
        
        $ssv = DB::table('ssv_register')->where('city', $id)->where('status', 1)->orderBy('id','desc')->get();
        $ssvcnt = 1;
        
         $date = Carbon::now()->format('Y-m-d');
             $count = DB::table('ssv_register')->where('city', $id)->where('status', 1)->count();
             $today = DB::table('ssv_register')->where('city', $id)->where('created_at','like', $date.'%')->count();
        
        
        $bhag = DB::table('jm_blr_rs_bhag')->where('vibhag_id',$id)->get();
        $data = '';
        $data.='
        
        <div class="row p-4">
            <h2>Swayamsevak Registration</h2>
            
        </div>
        <div class="row mb-0">
            <div class="col-6 pe-0">
                <div class="card card-style">
            <div class="content mb-0">
                <div class="row ">
                    <div class="col-12 pe-0">
                        <h2 class="text-center">'.$count.'</h2>
                    </div>
                    <div class="col-12">
                        <h6 class="text-center">Total </h6>
                    </div>
                </div>
            </div>
        </div>      
            </div>
           
        </div>
        
        
        <div class="card card-style">
			<div class="content">
				 <h2 class="text-danger rdash m-4">Bhag / Jille Dashboard </h2>';
				foreach($bhag as $bha)
				{
				 $data.='<div class="d-flex">
					<div class="ps-3">
						<h4>'.$bha->name.'</h4>
					</div>';
					$idv = $bha->id;
         $v_count = DB::table('ssv_register')->where('district', $idv)->where('status', 1)->count();
				$data.='<div class="ms-auto align-self-center">
						<h1 class="font-20">'.$v_count.'</h1>
					</div>
				</div>
				<div class="divider mt-3 mb-3"></div>';
				}
			$data.='</div>
		</div>
		
		  ';
		  
		  	if($count > 0){
           $data.='
        
        <div class="card card-style">
			<div class="content">
			<div class="text-end mt-2" >
              </div>
				<h2 class="text-danger rdash m-4">SSV Members List</h2>';
				foreach($ssv as $sv)
				{
				 $data.='<div class="d-flex ">
				 <div class="ps-3 pl-4">
						<h4>'.$ssvcnt.'</h4>
					</div>
					<div class="ps-3 pl-4">
						<h4>'.$sv->username.'</h4>
					</div>
			
				</div>
				<div class="divider mt-3 mb-3"></div>';
				$ssvcnt++;
				}
			$data.='</div>
		</div>';
		
		  	}
	
		
        $response = $data;
        return response()->json($response); 
    }
    public function nagar(Request $request)
    {
        $bhag = $request->bhag;
        $vibhag = $request->vibhag;
        
        $ssv = DB::table('ssv_register')->where('district', $bhag)->where('status', 1)->orderBy('id','desc')->get();
        $ssvcnt = 1;
        
        $date = Carbon::now()->format('Y-m-d');
             $count = DB::table('ssv_register')->where('district', $bhag)->where('city', $vibhag)->where('status', 1)->count();
             $today = DB::table('ssv_register')->where('district', $bhag)->where('city', $vibhag)->where('created_at','like', $date.'%')->count();
        
        
        $nagar = DB::table('jm_blr_rs_nagar')->where('bhag_id',$bhag)->get();
        $data = '';
        $data.='
        
          <div class="row p-4">
            <h2>Swayamsevak Registration</h2>
            
        </div>
        <div class="row mb-0">
            <div class="col-6 pe-0">
                <div class="card card-style">
            <div class="content mb-0">
                <div class="row ">
                    <div class="col-12 pe-0">
                        <h2 class="text-center">'.$count.'</h2>
                    </div>
                    <div class="col-12">
                        <h6 class="text-center">Total </h6>
                    </div>
                </div>
            </div>
        </div>      
            </div>
            
        </div>
        
        
        
        
        <div class="card card-style">
			<div class="content">
				 <h2 class="text-danger rdash m-4">Taluk / Nagar Dashboard </h2>';
				foreach($nagar as $nag)
				{
				 $data.='<div class="d-flex">
					<div class="ps-3">
						<h4>'.$nag->name.'</h4>
					</div>';
					$id = $nag->id;
         $v_count = DB::table('ssv_register')->where('taluk', $id)->where('status', 1)->count();
				$data.='<div class="ms-auto align-self-center">
						<h1 class="font-20">'.$v_count.'</h1>
					</div>
				</div>
				<div class="divider mt-3 mb-3"></div>';
				}
			$data.='</div>
		</div>';
		
		
			if($count > 0){
           $data.='
        
        <div class="card card-style">
			<div class="content">
			<div class="text-end mt-2" >
              </div>
				<h2 class="text-danger rdash m-4">SSV Members List</h2>';
				foreach($ssv as $sv)
				{
				 $data.='<div class="d-flex ">
				 <div class="ps-3 pl-4">
						<h4>'.$ssvcnt.'</h4>
					</div>
					<div class="ps-3 pl-4">
						<h4>'.$sv->username.'</h4>
					</div>
			
				</div>
				<div class="divider mt-3 mb-3"></div>';
				$ssvcnt++;
				}
			$data.='</div>
		</div>';
		
		  	}
		
        $response = $data;
        return response()->json($response); 
    }
    public function mandala(Request $request)
    {
        $bhag = $request->bhag;
        $vibhag = $request->vibhag;
        $nagar = $request->nagar;
        
        $ssv = DB::table('ssv_register')->where('taluk', $nagar)->where('status', 1)->orderBy('id','desc')->get();
        $ssvcnt = 1;
        
        $date = Carbon::now()->format('Y-m-d');
             $count = DB::table('ssv_register')->where('taluk', $nagar)->where('district', $bhag)->where('city', $vibhag)->where('status', 1)->count();
             $today = DB::table('ssv_register')->where('taluk', $nagar)->where('district', $bhag)->where('city', $vibhag)->where('created_at','like', $date.'%')->count();
             
             
        $mandala = DB::table('jm_blr_rs_vasathi')->where('nagar_id',$nagar)->get();
        $data = '';
        $data.='
        
          <div class="row p-4">
            <h2>Swayamsevak Registration</h2>
            
        </div>
        <div class="row mb-0">
            <div class="col-6 pe-0">
                <div class="card card-style">
            <div class="content mb-0">
                <div class="row ">
                    <div class="col-12 pe-0">
                        <h2 class="text-center">'.$count.'</h2>
                    </div>
                    <div class="col-12">
                        <h6 class="text-center">Total </h6>
                    </div>
                </div>
            </div>
        </div>      
            </div>
           
        </div>
        
        
        
        <div class="card card-style">
			<div class="content">
				 <h2 class="text-danger rdash m-4">Mandala / Vasathi Dashboard </h2>';
				foreach($mandala as $nag)
				{
				 $data.='<div class="d-flex">
					<div class="ps-3">
						<h4>'.$nag->name.'</h4>
					</div>';
					$id = $nag->id;
         $v_count = DB::table('ssv_register')->where('area', $id)->where('status', 1)->count();
				$data.='<div class="ms-auto align-self-center">
						<h1 class="font-20">'.$v_count.'</h1>
					</div>
				</div>
				<div class="divider mt-3 mb-3"></div>';
				}
			$data.='</div>
		</div>';
		
		
			if($count > 0){
           $data.='
        
        <div class="card card-style">
			<div class="content">
			<div class="text-end mt-2" >
              </div>
				<h2 class="text-danger rdash m-4">SSV Members List</h2>';
				foreach($ssv as $sv)
				{
				 $data.='<div class="d-flex ">
				 <div class="ps-3 pl-4">
						<h4>'.$ssvcnt.'</h4>
					</div>
					<div class="ps-3 pl-4">
						<h4>'.$sv->username.'</h4>
					</div>
			
				</div>
				<div class="divider mt-3 mb-3"></div>';
				$ssvcnt++;
				}
			$data.='</div>
		</div>';
		
		  	}
		  	
		  	
		
        $response = $data;
        return response()->json($response); 
    }
    public function bhaglistall(Request $request)
    {
        $id = $request->bhag;
         $bhag = DB::table('jm_blr_rs_bhag')->where('vibhag_id',$id)->get();
        $response = $bhag;
        return response()->json($response); 
    }
    public function nagarlistall(Request $request)
    {
        $vibhag = $request->vibhag;
        $bhag = $request->bhag;
        $nagar = DB::table('jm_blr_rs_nagar')->where('bhag_id',$bhag)->get();
        $response = $nagar;
        return response()->json($response); 
    }
    public function vibhagnagarlist(Request $request)
    {
        $vibhag = $request->vibhag;
        $bhag = $request->bhag;
        $resp['nagar'] = DB::table('jm_blr_rs_nagar')->where('bhag_id',$bhag)->get();
        
        
        
        $date = Carbon::now()->format('Y-m-d');
             $count = DB::table('ssv_register')->where('district', $bhag)->where('city', $vibhag)->where('status', 1)->count();
             $today = DB::table('ssv_register')->where('district', $bhag)->where('city', $vibhag)->where('created_at','like', $date.'%')->count();
             
             
       
        $data = '';
        $data.='
        
          <div class="row p-4">
            <h2>Swayamsevak Registration</h2>
            
        </div>
        <div class="row mb-0">
            <div class="col-6 pe-0">
                <div class="card card-style">
            <div class="content mb-0">
                <div class="row ">
                    <div class="col-12 pe-0">
                        <h2 class="text-center">'.$count.'</h2>
                    </div>
                    <div class="col-12">
                        <h6 class="text-center">Total </h6>
                    </div>
                </div>
            </div>
        </div>      
            </div>
           
        </div>
        
        
        
        <h2 class="color-highlight m-4 text-uppercase">Nagar / Taluk</h2> 
        <div class="card card-style">
			<div class="content">';
				foreach($resp['nagar']  as $nag)
				{
				 $data.='<div class="d-flex">
					<div class="ps-3">
						<h4>'.$nag->name.'</h4>
					</div>';
					$id = $nag->id;
         $v_count = DB::table('ssv_register')->where('taluk', $id)->where('status', 1)->count();
				$data.='<div class="ms-auto align-self-center">
						<h1 class="font-20">'.$v_count.'</h1>
					</div>
				</div>
				<div class="divider mt-3 mb-3"></div>';
				}
			$data.='</div>
		</div>';
        
        
        $resp['nagardash'] = $data;
        $response = $resp;
        return response()->json($response); 
    }

}
