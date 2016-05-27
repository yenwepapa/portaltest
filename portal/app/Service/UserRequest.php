<?php

namespace App\Service;

use Illuminate\Database\Eloquent\Model;

use DB;

class UserRequest extends Model
{
    protected $table='view_sttgdc_userrequest';

   
    public static function get_servicecategory(){
    	$data = DB::table('service')
            ->join('lnkcustomercontracttoservice', 'lnkcustomercontracttoservice.service_id', '=', 'service.id')
            ->join('view_customercontract', 'view_customercontract.id', '=', 'lnkcustomercontracttoservice.customercontract_id')
            ->where('view_customercontract.org_id','=',$_SESSION['org_id'])
            ->where('service.status','!=','obsolete')
            ->get();
        return $data;
    }
}
