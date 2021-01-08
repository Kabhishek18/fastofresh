<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\front_model;
class front_control extends Controller
{
    //Home Page
   public function index()
   {
      $categories['categories'] = front_model::getCategory();
      echo view('front/inc/header');
      echo view('front/inc/nav');
      echo view('front/index',$categories);
      echo view('front/inc/footer');
   }

   //Categories
   public function categories()
   {  
      $var['categories'] =front_model::getCategory();
      echo view('front/inc/header');
      echo view('front/inc/nav');
      echo view('front/category',$var);
      echo view('front/inc/footer');
   }

   //Categories Products
   public function products($name ="")
   {  
      $var['category'] =front_model::getCategoryName($name);
      $var['products'] =front_model::GetCatPro($var['category']->id);
       echo view('front/inc/header');
       echo view('front/inc/nav');
       echo view('front/product',$var);
       echo view('front/inc/footer');
   }

   //Product Detail
   public function productDetail($name ="")
   {
      $var['product'] =front_model::getProductname($name);
      echo view('front/inc/header');
       echo view('front/inc/nav');
       echo view('front/prodetail',$var);
       echo view('front/inc/footer');
   }
   //checkout

   public function checkout()
   {
      $cart['cart'] = session()->get('cart');
      if($cart['cart']){
          echo view('front/inc/header');
          echo view('front/inc/nav');
          echo view('front/checkout',$cart);
          echo view('front/inc/footer');
      }
      else{
          return redirect('')->with('success', 'Empty Cart');
      }
   }

}
