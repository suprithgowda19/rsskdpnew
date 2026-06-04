<?php

namespace App\Http\Controllers\Vibhag;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;

use Session;

use Auth;

use Redirect;

use DataTables;

use Str;

class SsvController extends Controller
{
    public function managereports()
    {
        return redirect()->route('ssv.admindashboard');
    }
}
