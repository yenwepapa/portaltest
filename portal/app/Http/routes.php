<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware'=>'logincheck'],function(){
	Route::get('/dashboard','SessionController@index');
	Route::get('/','SessionController@index');
	Route::resource('/test_data','TestController');
	// Route::post('/userrequest/get_service_sub_cat','UserRequestController@get_service_sub_cat');
	// Route::resource('/userrequest','UserRequestController');
	Route::get('/day_booking','BookingController@day_booking');
	Route::resource('booking','BookingController');

});
// Route::get('/',[
//    'middleware' => 'logincheck',
//    'uses' => 'SessionController',
// ]);

// Route::get('/', function () {
//     return view('welcome');
// });
