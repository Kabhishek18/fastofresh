<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class apimodel extends Model
{
   

   	public static function getOrder(){
	    $value=DB::table('orders')->orderBy('id', 'desc')->get();
	    return $value;
  	}


	public static function getOrderDate($start,$end){
	    $value=DB::table('orders')->whereBetween('created_at',[$start,$end])->orderBy('id', 'desc')->get();
	    return $value;
  	}

  	public static function getOrderbyDate($date){
  		$array = array('created_at' =>$date);
	    $value=DB::table('orders')->where($array)->get();
	    return $value;
  	}
}
