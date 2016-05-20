<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;

use DB;

use URL;

use Redirect;

class SessionController extends Controller
{
    public function index(){
    	return view('pages.dashboard');
    }
}
