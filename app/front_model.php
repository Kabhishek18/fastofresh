<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class front_model extends Model
{
   
    
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
    // Category By name
    public static function getCategoryName($id= ''){
        if($id){
          $array =array('name' => $id,'status' => 'active');
        $value=DB::table('categories')->where($array)->orderBy('id', 'asc')->first();
        }
        else{
        $value=DB::table('categories')->orderBy('id', 'asc')->get();
        }
        return $value;
      }  
    
    //Produc by id  
    public static function getProduct($id= ''){
        if($id){
          $array =array('id' => $id,'status' => 'active');
        $value=DB::table('products')->where($array)->orderBy('id', 'asc')->first();
        }
        else{
        $value=DB::table('products')->orderBy('id', 'asc')->get();
        }
        return $value;
      }
    //Produc by Name  
    public static function getProductname($id= ''){
      if($id){
        $array =array('name' => $id,'status' => 'active');
      $value=DB::table('products')->where($array)->orderBy('id', 'asc')->first();
      }
      else{
      $value=DB::table('products')->orderBy('id', 'asc')->get();
      }
      return $value;
    }  
    // Get product attribute  
      public static function getProductattr($id= ''){
        if($id){
          $array =array('product_id' => $id,'status' => 'active');
        $value=DB::table('product_attr')->where($array)->orderBy('id', 'asc')->first();
        }
        else{
        $value=DB::table('product_attr')->orderBy('id', 'asc')->get();
        }
        return $value;
      }          
   // Category Join Products
   public static function GetCatPro($id ='')
   {  
    $array =array('categories.id' => $id,'products.status' => 'active','categories.status' => 'active');
      $value = DB::table('categories')
          ->join('products', 'categories.id', '=', 'products.parent_id')
          ->select('products.*')
          ->where($array)
          ->get();
      return $value;    
   }

   //Product by Location user id
    public static function getLocationUid($id= ''){
        if($id){
          $array =array('userid' => $id);
        $value=DB::table('locations')->where($array)->orderBy('id', 'asc')->get();
        }
        return $value;
      }

  //Authenticate User
  public static function Authenticate($array){

        $value=DB::table('users')->where($array)->first();
        return $value;
  }   
}
