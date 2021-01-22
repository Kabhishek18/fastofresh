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

  public static function getHomeList($id){
      $array =array('id' => $id);
      $value=DB::table('home_list')->where($array)->first();
      
      return $value;
    }  
  //UPdate

  //UPdate Caegories
  public static function UpdateCategory($array)
  {
    $value = DB::table('categories')->where('id',$array['id'])->update($array);
    return $value;
  }

//UPdate Home list
  public static function Updatehome_list($array)
  {
    $value = DB::table('home_list')->where('id',$array['id'])->update($array);
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

  //Category By Id  
  public static function getCoupon($id= ''){
      if($id){
        $array =array('id' => $id);
      $value=DB::table('coupons')->where($array)->orderBy('id', 'desc')->first();
      }
      else{
      $value=DB::table('coupons')->orderBy('id', 'desc')->get();
      }
      return $value;
    }  
  
  public static function CategoryDelete($array)
  {
    $value= DB::delete('delete from categories  where id =?',[$array]);
    return $value;
  }

   public static function ProductDelete($array)
  {
    $value= DB::delete('delete from products  where id =?',[$array]);
    return $value;
  }


  //Blog
  //Category By Id  
  public static function getBlog($id= ''){
      if($id){
        $array =array('id' => $id);
      $value=DB::table('blogs')->where($array)->orderBy('created_at', 'desc')->first();
      }
      else{
      $value=DB::table('blogs')->orderBy('created_at', 'desc')->get();
      }
      return $value;
    }  

  //Add Blog
  public static function CreateBlog($array)
  {
    $value = DB::table('blogs')->insert($array);
    return $value;
  }


  //UPdate Blog
  public static function UpdateBlog($array)
  {
    $value = DB::table('blogs')->where('id',$array['id'])->update($array);
    return $value;
  }

   public static function BlogDelete($array)
  {
    $value= DB::delete('delete from blogs  where id =?',[$array]);
    return $value;
  }



  //Recipe
  //Category By Id  
  public static function getRecipe($id= ''){
      if($id){
        $array =array('id' => $id);
      $value=DB::table('recipe')->where($array)->orderBy('created_at', 'desc')->first();
      }
      else{
      $value=DB::table('recipe')->orderBy('created_at', 'desc')->get();
      }
      return $value;
    }  

  //Add Recipe
  public static function CreateRecipe($array)
  {
    $value = DB::table('recipe')->insert($array);
    return $value;
  }


  //UPdate Recipe
  public static function UpdateRecipe($array)
  {
    $value = DB::table('recipe')->where('id',$array['id'])->update($array);
    return $value;
  }

   public static function RecipeDelete($array)
  {
    $value= DB::delete('delete from recipe  where id =?',[$array]);
    return $value;
  }


}
