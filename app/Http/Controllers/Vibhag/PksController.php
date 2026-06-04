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

class PksController extends Controller
{
    public function managereports()
    {
        return redirect()->route('pks.admindashboard');
    }
}
