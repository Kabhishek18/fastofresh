<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class front_model extends Model
{
    public static function getuserData(){
        $value=DB::table('users')->orderBy('id', 'asc')->get();
        return $value;
      }
    
    //Category By Id  
    public static function getCategory($id= ''){
        if($id){
        $value=DB::table('categories')->where('id', $id)->orderBy('id', 'asc')->first();
        }
        else{
        $value=DB::table('categories')->orderBy('id', 'asc')->get();
        }
        return $value;
      }  
    // Category By name
    public static function getCategoryName($id= ''){
        if($id){
        $value=DB::table('categories')->where('name', $id)->orderBy('id', 'asc')->first();
        }
        else{
        $value=DB::table('categories')->orderBy('id', 'asc')->get();
        }
        return $value;
      }  
    
    //Produc by id  
    public static function getProduct($id= ''){
        if($id){
        $value=DB::table('products')->where('id', $id)->orderBy('id', 'asc')->first();
        }
        else{
        $value=DB::table('products')->orderBy('id', 'asc')->get();
        }
        return $value;
      }    
   // Category Join Products
    
   public static function GetCatPro($id ='')
   {
      $value = DB::table('categories')
          ->join('products', 'categories.id', '=', 'products.parent_id')
          ->select('products.*')
          ->where('categories.id', $id)
          ->get();
      return $value;    
   }

   //Product by cat id

}
