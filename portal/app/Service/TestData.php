<?php

namespace App\Service;

use Illuminate\Database\Eloquent\Model;

class TestData extends Model
{
    protected $table = 'testdata';

    public function check_login(){
    		$url=URL::to('/');
    		$url=str_replace('/public', '', $url);
    		return redirect($url);
    }
}
