<?php

namespace App\Http\Controllers;

use Request;
use App\front_model;
class cart extends Controller
{
   public function AddToCart(Request $request)
   {    
    $val['token'] = Request::get('_token');
    $val['pid'] = Request::get('pid');
    $val['qty'] = Request::get('qty');
    $product = front_model::getProduct( $val['pid']);
    //Use When Weight attribute enable
    //$productattr = front_model::getProductattr($val['pid']);
       if(!$product) {
            return redirect()->back()->with('warning', 'Something Went Wrong With Cart!');
        }
        // if(!$productattr) {
        //     return redirect()->back()->with('warning', 'Product Attribute Not Available!');
        // } 
        $cart = session()->get('cart');  
        // if cart is empty then this the first product  
        if(!$cart) {
            $cart = [
                     $val['pid'] => [
                        "pid" => $val['pid'],
                        "name" => $product->name,
                        "parent_id" => $product->parent_id,
                        "quantity" => $val['qty'],
                        "price" => $product->s_price,
                        "photo" => $product->image
                    ]
            ];   
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$val['pid']])) {
            $cart[$val['pid']]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

         // if item not exist in cart then add to cart with quantity = 1
         $cart[$val['pid']] = [
             "pid" => $val['pid'],
            "name" => $product->name,
             "parent_id" => $product->parent_id,
            "quantity" => $val['qty'],
            "price" => $product->s_price,
            "photo" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
   }

   public function CartView()
   {
    $cart['cart'] = session()->get('cart');
        if($cart['cart']){
      $var['categories'] = front_model::getCategory();

            echo view('front/inc/header');
            echo view('front/inc/nav',$var);
            echo view('front/cart',$cart);
            echo view('front/inc/footer');
        }
        else{
            return redirect('')->with('success', 'Empty Cart');
        }

   }
   public function update(Request $request)
    {   
        if(Request::get('quantity') > 0){
            if(Request::get('_token') and Request::get('quantity'))
            {
                $cart = session()->get('cart');
                $cart[Request::get('id')]["quantity"] = Request::get('quantity');
                session()->put('cart', $cart);
                session()->flash('success', 'Cart updated successfully');
            }
        }
    }
    public function remove(Request $request)
    {
        if(Request::get('id')) {
            $cart = session()->get('cart');
            if(isset($cart[Request::get('id')])) {
                unset($cart[Request::get('id')]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function removeall(Request $request)
    {
        
            session()->forget('cart');
            return redirect('')->back()->with('success', 'Cart Removed Successfully');

        
    }
    public function removeCoupon(Request $request)
    {
        
            session()->forget('coupon');
            return redirect()->back()->with('warning', 'Coupon Removed Successfully');
        
    }

  public function ApplyCoupon(Request $request)
  {
       $coupon = Request::post('coupon');
       $appcoupons =front_model::getCoupon($coupon);
       if(!empty($appcoupons)){
           $cart = session()->get('cart');  
           $total = 0;
           foreach($cart as $id => $details){
            $total += $details['price'] * $details['quantity'];
           }
               if ($appcoupons->cart_min < $total) {
                    if(date('y-m-d',strtotime($appcoupons->date_expire)) >= date('y-m-d')){
                        session()->put('coupon', $appcoupons);
                        return redirect()->back()->with('success', 'Coupon Applied Successfully');       
                    }
                    else{
                        return redirect()->back()->with('warning', 'Coupon Expired');
                    }
               }
               else{
                return redirect()->back()->with('warning', 'Increase Cart Minimum Value To Apply Coupon');

               }
        }
        else{
            return redirect()->back()->with('warning', 'Coupon Invaild');

        }
  }


}
