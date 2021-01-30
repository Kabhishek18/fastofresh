<?php

namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\Payment;
 use Redirect,Response;
 class RazorpayController extends Controller
 {
 public function razorpayProduct()
 {
 return view('front/razorpay');
 }
 public function razorPaySuccess(Request $Request){
 $data = [
           'user_id' => '1',
           'payment_id' => $request->payment_id,
           'amount' => $request->amount,
        ];
 $getId = Payment::insertGetId($data);  
 $arr = array('msg' => 'Payment successfully credited', 'status' => true);
 return Response()->json($arr);    
 }
 public function RazorThankYou()
 {
 return view('front/thankyou');
 }
 }