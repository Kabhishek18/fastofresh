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
            return redirect()->back()->with('warning', 'Something Went Wrong With Cart!');
        }
        if(!$productattr) {
            return redirect()->back()->with('warning', 'Product Attribute Not Available!');
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
    $cart['cart'] = session()->get('cart');
        if($cart['cart']){
            echo view('front/inc/header');
            echo view('front/inc/nav');
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
        
            session()->flush('cart');
            session()->flash('success', 'Cart removed successfully');
            return redirect('/');
        
    }
    


}
