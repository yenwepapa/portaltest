<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Service\TestData;

use App\Http\Requests\TestDataRequest;

use Session;

class TestController extends Controller
{
    public function index(){
    	$test_data=TestData::all();
    	return view('pages.test.index',compact('test_data'));
    }

    public function create(){
    	return view('pages.test.add');
    }

    public function store(TestDataRequest $request)
    {
        $test_data=new TestData;
        $test_data->name=$request->name;
        $test_data->mobile=$request->mobile;
        $test_data->address=$request->address;
        $test_data->introduction=$request->introduction;
        $test_data->save();
        Session::flash('message', 'Successfully created group!');
        return redirect('/test_data');
    }

    public function edit($id){
    	$test_data=TestData::find($id);
    	return view('pages.test.edit',compact('test_data'));
    }

    public function update(TestDataRequest $request, $id)
    {
        $test_data=TestData::findorFail($id);
        $test_data->name=$request->name;
		$test_data->mobile=$request->mobile;
		$test_data->address=$request->address;
		$test_data->introduction=$request->introduction;
		$test_data->save();
        Session::flash('message', 'Successfully created test data!');
        return redirect('/test_data');

    }

    public function destroy($id){
        $test_data=TestData::find($id);
        $test_data->delete();
        Session::flash('message','Successfully deleted test data!');
        return redirect('/test_data');
    }
}
