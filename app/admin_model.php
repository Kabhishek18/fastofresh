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
        $array =array('id' => $id);
      $value=DB::table('categories')->where($array)->orderBy('id', 'asc')->first();
      }
      else{
      $value=DB::table('categories')->orderBy('id', 'asc')->get();
      }
      return $value;
    }  

  //Add Category
  public static function CreateCategory($array)
  {
    $value = DB::table('categories')->insert($array);
    return $value;
  }


  //UPdate

  //UPdate Caegories
  public static function UpdateCategory($array)
  {
    $value = DB::table('categories')->where('id',$array['id'])->update($array);
    return $value;
  }





  //Category By Id  
  public static function getProduct($id= ''){
      if($id){
        $array =array('id' => $id);
      $value=DB::table('products')->where($array)->orderBy('id', 'asc')->first();
      }
      else{
      $value=DB::table('products')->orderBy('id', 'asc')->get();
      }
      return $value;
    }  

  //Add Category
  public static function CreateProduct($array)
  {
    $value = DB::table('products')->insert($array);
    return $value;
  }


  //UPdate

  //UPdate Users
  public static function UpdateProduct($array)
  {
    $value = DB::table('products')->where('id',$array['id'])->update($array);
    return $value;
  }






    //Category By Id  
  public static function getOrders($id= ''){
      if($id){
        $array =array('id' => $id);
      $value=DB::table('orders')->where($array)->orderBy('id', 'desc')->first();
      }
      else{
      $value=DB::table('orders')->orderBy('id', 'desc')->get();
      }
      return $value;
    }  

}
