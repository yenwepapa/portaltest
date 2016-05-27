<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\BookingRequest;

use App\Service\Booking;

use Session; 	
class BookingController extends Controller
{
    public function index(){
        $booking=Booking::get_booking_json();
    	return view('pages.booking.index',compact('booking'));
    }

    public function create(){
    	return view('pages.booking.add');
    }

    public function store(BookingRequest $request){
    	$booking=new Booking;
        $booking->customer_id=$_SESSION['customer_id'];
        $booking->room_id=$request->room_id;
        $booking->start_date=strtotime($request->start_date);
        $booking->end_date=strtotime($request->end_date);
        $booking->start_time=$request->start_time;
        $booking->end_time=$request->end_time;
        $booking->purpose=$request->purpose;
        $booking->save();
        Session::flash('message', 'Successfully created booking!');
        return redirect('/booking');

    }

    public function edit($id){
        $booking=Booking::find($id);
        return view('pages.booking.edit',compact('booking'));
    }

    public function update(BookingRequest $request, $id){
        $booking=Booking::findorFail($id);
        $booking->customer_id=$_SESSION['customer_id'];
        $booking->room_id=$request->room_id;
        $booking->start_date=strtotime($request->start_date);
        $booking->end_date=strtotime($request->end_date);
        $booking->start_time=$request->start_time;
        $booking->end_time=$request->end_time;
        $booking->purpose=$request->purpose;
        $booking->save();
        Session::flash('message', 'Successfully created booking!');
        return redirect('/booking');
    }

    public function day_booking(){
        $room=Booking::get_resource_booking_json();
        $booking=Booking::get_booking_json_by_time();
        return view('pages.booking.dayview',compact('booking','room'));
    }
}
