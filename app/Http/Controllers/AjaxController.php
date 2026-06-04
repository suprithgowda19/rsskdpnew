<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\Models\Customer;

use Illuminate\Support\Facades\Hash;

use Session;

use Auth;


class AjaxController extends Controller
{
    public function listkaryavibhag(Request $request)
    {
        $result = DB::table('pwa_karyavibhag')->where('status',1)->get();
        $response = $result;
        return response()->json($response); 
    }
    public function listregisterresppks(Request $request)
    {
        $result = DB::table('pwa_responsibilitypks')->where('status',1)->get();
        $response = $result;
        return response()->json($response); 
    }
    public function listregisterrespsubssv(Request $request)
    {
        $resp_id = $request->respid;
        $result = DB::table('pwa_responsibility_sub_ssv')->where('resp_id',$resp_id)->where('status',1)->get();
        $response = $result;
        return response()->json($response); 
    }
    public function listregisterrespssv(Request $request)
    {
        $result = DB::table('pwa_responsibility_ssv')->where('status',1)->get();
        $response = $result;
        return response()->json($response); 
    }
    public function listregistercategoryssv(Request $request)
    {
        $result = DB::table('pwa_category_ssv')->where('status',1)->get();
        $response = $result;
        return response()->json($response); 
    }

    public function listregistersubcategoryssv(Request $request)
    {
        $cat_id = $request->category;
        $result = DB::table('pwa_subcategory_ssv')->where('cat_id',$cat_id)->where('status',1)->orderBy('id', 'desc')->get();
        $response = $result;
        return response()->json($response); 
    }
    public function listvarga()
    {
        $result = DB::table('pwa_varga')->where('status', 1)->get();
        $response = $result;
        return response()->json($response); 
    }
    
    
    public function listareasearch(Request $request)
    {
        if (!preg_match('/[^A-Za-z]/', $request->search)) 
        {
            
            // $result = DB::table('jm_blr_rs_vasathi')
            // ->select('jm_blr_rs_vasathi.id','jm_blr_rs_vasathi.nagar_id','jm_blr_rs_vasathi.name', 'jm_blr_rs_vasathi.name_kn', 'jm_blr_rs_nagar.id as nid', 'jm_blr_rs_nagar.name as nname','jm_blr_rs_nagar.name_kn as nname_kn')
            // ->join('jm_blr_rs_nagar', 'jm_blr_rs_vasathi.nagar_id', '=', 'jm_blr_rs_nagar.id')
            // ->where('jm_blr_rs_vasathi.name','LIKE', $request->search."%")
            // ->get();
            
            // $result = DB::table('jm_blr_rs_vibhag')
            // ->select('jm_blr_rs_vibhag.id','jm_blr_rs_vibhag.name', 'jm_blr_rs_vibhag.name_kn', 'jm_blr_rs_bhag.id as bid', 'jm_blr_rs_bhag.name as bname','jm_blr_rs_bhag.name_kn as bname_kn')
            // ->join('jm_blr_rs_bhag', 'jm_blr_rs_vibhag.id', '=', 'jm_blr_rs_bhag.vibhag_id')
            // ->where('jm_blr_rs_vibhag.name','LIKE', $request->search."%")
            // ->get();
            
            $result = DB::table('jm_blr_rs_vibhag')->where('jm_blr_rs_vibhag.name','LIKE', $request->search."%")->get();
           

        }
        else
        {
             $result = DB::table('jm_blr_rs_vasathi')
              ->select('jm_blr_rs_vasathi.id','jm_blr_rs_vasathi.nagar_id','jm_blr_rs_vasathi.name', 'jm_blr_rs_vasathi.name_kn', 'jm_blr_rs_nagar.id as nid', 'jm_blr_rs_nagar.name as nname','jm_blr_rs_nagar.name_kn as nname_kn')
            ->join('jm_blr_rs_nagar', 'jm_blr_rs_vasathi.nagar_id', '=', 'jm_blr_rs_nagar.id')
            ->where('jm_blr_rs_vasathi.name_kn','LIKE', $request->search."%")
            ->get();
        }
       
        $response = $result;
        return response()->json($response); 
    }
    public function listjag()
    {
        $result = DB::table('pwa_jagrithi')->orderBy('id', 'asc')->get();
        $response = $result;
        return response()->json($response); 
    }

    public function listintrarea()
    {
        $result = DB::table('pwa_intre_area')->orderBy('name', 'asc')->get();
        $response = $result;
        return response()->json($response); 
    }
    public function listallareas(Request $request)
    {
        $nagar = $request->vasathi_id;
        $result = DB::table('jm_blr_rs_vasathi')->select('id','name','name_kn')->where('nagar_id',$nagar)->get();
        $response = $result;
        return response()->json($response); 
    }

    public function listallupavasathi(Request $request)
    {
        $result = DB::table('jm_blr_rs_upavasathi')
            ->select('id', 'name', 'name_kn')
            ->where('vasathi_id', $request->vasathi_id)
            ->get();

        return response()->json($result);
    }

    public function listalltaluk(Request $request)
    {
        $bhag = $request->nagar_id;
        $data = DB::table('jm_blr_rs_nagar')->select('id','name','name_kn')->where('bhag_id',$bhag)->get();
        $response = $data;
        return response()->json($response); 
    }

    public function listalldistrict(Request $request)
    {
        
        $id = $request->bhag_id;
        $result = DB::table('jm_blr_rs_bhag')->where('vibhag_id',$id)->get();
        $response = $result;
        return response()->json($response); 
    }

    public function listallcity(Request $request)
    {
        $result = DB::table('jm_blr_rs_vibhag')->orderBy('priority', 'asc')->get();
        $response = $result;
        return response()->json($response); 
    }

    public function listregistercategory(Request $request)
    {
        $result = DB::table('pwa_category')->where('status',1)->get();
        $response = $result;
        return response()->json($response); 
    }

    public function listregistersubcategory(Request $request)
    {
        $cat_id = $request->category;
        $result = DB::table('pwa_subcategory')->where('cat_id',$cat_id)->where('status',1)->orderBy('id', 'desc')->get();
        $response = $result;
        return response()->json($response); 
    }

    public function listregisterresp(Request $request)
    {
        $result = DB::table('pwa_responsibility')->where('status',1)->get();
        $response = $result;
        return response()->json($response); 
    }
    public function listregisterrespsub(Request $request)
    {
        $resp_id = $request->respid;
        $result = DB::table('pwa_responsibility_sub')->where('resp_id',$resp_id)->where('status',1)->get();
        $response = $result;
        return response()->json($response); 
    }

    public function category(Request $request)
    {

        $category = $request->category;
// $result = DB::table('subcategorysd')->select('id','subcategoryname')->where('status', 1)->get();
        $result = DB::table('subcategorysd')->select('subcategorysd.id','subcategorysd.subcategoryname')
        ->leftJoin('subcategoryschild', 'subcategorysd.id', '=', 'subcategoryschild.subcategory_id')
        ->where('subcategoryschild.category_id', $category)
        ->where('subcategorysd.status', 1)
        ->get();


        $response = $result;
        return response()->json($response); 
// echo json_encode($response);
    }

}
