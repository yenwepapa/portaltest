<?php

namespace App\Service;

use Illuminate\Database\Eloquent\Model;

use DB;

class Booking extends Model
{
    protected $table='booking_data';

    public static function get_booking_json()
    {
        
        $result_array[]=array();
        
        $results  = Booking::all();
        

        foreach ($results as $result){

            $color = "#156802";
                $customer_data=DB::table('view_contact')->where('id',$_SESSION['customer_id'])->first();
                $title=$customer_data->name. ' from ' .$customer_data->org_name .' from '.$result->start_time .' to '.$result->end_time;
                 $result_array[] = array(
                'id'  => $result->id,
                'title'       => $title,
                'start'       => $result->start_date,
                'color'       => $color
                );                    
        }
        return json_encode($result_array);

    }

    public static function get_resource_booking_json(){
        $room_array[]=array();
        $room=DB::table('room')->get();
        $results=Booking::all();
        foreach ($room as $row) {
            $room_array[]=array(
                'id'    =>  $row->id,
                'title' =>  $row->name,
            );
        }
        return json_encode($room_array);
    }

    public static function get_booking_json_by_time(){
        $result_array=array();
        $count=0;
        $results=Booking::all();
        foreach ($results as $row) {
            $color = "#156802";
            $customer_data=DB::table('view_contact')->where('id',$_SESSION['customer_id'])->first();
            $date=date('Y-m-d',$row->start_date);
            $start_time=$row->start_time;
            $end_time=$row->end_time;
            if($start_time<10){
                $start_time=$date .'T0'.$start_time.':00:00';
                
            }else{
                $start_time=$date .'T'. $start_time.':00:00';
                
            }
            if($end_time<10){
                $end_time=$date .'T0'.$end_time.':00:00';
            }else{
                $end_time=$date .'T'. $end_time.':00:00';
            }
            $title=$customer_data->name. ' from ' .$customer_data->org_name .' from '.$row->start_time .' to '.$row->end_time;
            $result_array[$count]['id']=$row->id;
            $result_array[$count]['resourceId']=$row->room_id;
            $result_array[$count]['start']=$start_time;
            $result_array[$count]['end']=$end_time;
            $result_array[$count]['title']=$title;
            
            $count++;
        }
        return json_encode($result_array);
    }
}
