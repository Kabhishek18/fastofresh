<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class admin_model extends Model
{
	//GET THE VALUE
    public static function Authenticate($array){
     	  $value=DB::table('users')->where($array)->first();
        return $value;
  	}   

  	//Category By Id  
    public static function getCategory($id= ''){
        if($id){
          $array =array('id' => $id,'status' => 'active');
        $value=DB::table('categories')->where($array)->orderBy('id', 'asc')->first();
        }
        else{
        $value=DB::table('categories')->orderBy('id', 'asc')->get();
        }
        return $value;
      }  
}
