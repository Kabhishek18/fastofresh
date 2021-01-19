<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class front_model extends Model
{
   
    public static function getBlog($id= ''){
      if($id){
        $array =array('id' => $id,'status' =>'active');
      $value=DB::table('blogs')->where($array)->orderBy('created_at', 'desc')->first();
      }
      else{
      $value=DB::table('blogs')->orderBy('created_at', 'desc')->get();
      }
      return $value;
    }  
    //Category By Id  
    public static function getCategory($id= ''){
        if($id){
          $array =array('id' => $id,'status' => 'active');
        $value=DB::table('categories')->where($array)->orderBy('id', 'asc')->first();
        }
        else{
          $array =array('status' => 'active');
        $value=DB::table('categories')->where($array)->orderBy('id', 'asc')->get();
        }
        return $value;
      }  

    public static function getHomeList($id){
      $array =array('id' => $id);
      $value=DB::table('home_list')->where($array)->first();
      
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

      //Produc by id  
    public static function getProductlike($id){
        if($id){
        $value=DB::table('products')->where('name','like',$id.'%')->orderBy('name', 'asc')->get();
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

   // Get Order   
  public static function getOrderUserid($id= ''){
    if($id){
      $array =array('userid' => $id);
    $value=DB::table('orders')->where($array)->orderBy('id', 'desc')->get();
    }
    else{
    $value=DB::table('orders')->orderBy('id', 'desc')->get();
    }
    return $value;
  }







  //Insert

  //Add Location
   public static function AddLocation($array)
  {
    $value= DB::insert('insert into locations (`userid`,`location`,`created_at`,`updated_at` ) values(?,?,?,?)',[$array['userid'],$array['location'],date('Y-m-d h:s:i'),date('Y-m-d h:s:i')]);
    return $value;
  }


  //Add Order
  public static function PaymentOrder($order)
  {
    $value= DB::insert('insert into orders (`orderamount`,`transactionid`,`order_cart`,`orderdetail`,`userid`,`status`,`created_at`,`updated_at` ) values(?,?,?,?,?,?,?,?)',[$order['order_amount'],$order['transactionid'],$order['order_cart'],$order['orderdetail'],$order['userid'],'pending',$order['created_at'],$order['updated_at']]);
    return $value;
  }


//UPdate

    //UPdate Users
  public static function UserImageUpload($array)
  {
    $value= DB::update('update users set `avatar` = ?,`updated_at` = ?  where id =? ',[$array['image'],date('Y-m-d h:s:i'),$array['id']]);
    return $value;
  }
   //UPdate Users password
  public static function UserPassword($array)
  {
    $value= DB::update('update users set `password` = ?,`updated_at` = ?  where id =? ',[$array['password'],date('Y-m-d h:s:i'),$array['id']]);
    return $value;
  }


  //Delete

   //UPdate Users password
  public static function UserLocationDelete($array)
  {
    $value= DB::delete('delete from locations  where id =? and userid = ?',[$array['id'],$array['userid']]);
    return $value;
  }

}
