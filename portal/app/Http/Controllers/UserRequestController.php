<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Service\UserRequest;

use DB;

class UserRequestController extends Controller
{
    public function index(){
    	$open_request=UserRequest::whereNotIn('status', ['closed', 'resolved'])->get();
    	$resolved_request=UserRequest::where('status','resolved')->get();
    	return view('pages.userrequest.index',compact('open_request','resolved_request'));
    }

    public function create(){
    	$service=UserRequest::get_servicecategory(); 	
    	return view('pages.userrequest.add',compact('service'));
    }

    public function show($id){

    }

    public function get_service_sub_cat(){
    	echo "hi";die();
    	$service_id=Input::get('service_id');
    	$data=DB::table('servicesubcategory')->where('service_id',$service_id)->where('status','!=','obsolete');
		echo json_encode($data);
	} 	
}
