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
    $productattr = front_model::getProductattr($val['pid']);
       if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');  
        // if cart is empty then this the first product  
        if(!$cart) {
            $cart = [
                     $val['pid'] => [
                        "name" => $product->name,
                        "quantity" => $val['qty'],
                        "weight" => $productattr->weight,
                        "price" => $productattr->s_price,
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
            "name" => $product->name,
            "quantity" => $val['qty'],
            "weight" => $productattr->weight,
            "price" => $productattr->s_price,
            "photo" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
   }

   public function CartView()
   {
      dd(session()->get('cart'));
     session()->forget('cart');
      session()->flush();

   }
}
