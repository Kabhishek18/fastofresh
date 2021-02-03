<?php

namespace App\Http\Controllers;
use Request;
use App\front_model;
 use App\Payment;
 class RazorpayController extends Controller
 {
	public function razorpayProduct()
	 {
		 return view('front/razorpay');
	 }
	public function razorPaySuccess(Request $request){


			$order =session()->get('order');
			$order['transactionid'] =Request::get('razorpay_payment_id');
			$order['order_amount'] =Request::get('totalAmount');
					$insert =front_model::PaymentOrder($order);
			if($insert){
           		session()->put('order', $order);
           		$orderdetails =json_decode($order['orderdetail'],true); 
		  		$loc =json_decode($orderdetails['loc']); 
		  		$sendmsg = 'Hi '.$loc->username.' Your Order has been Confirmed with Order no: '.date('ymdhis',strtotime($order['created_at']));
				sendSms($loc->mobile,$sendmsg);
				$arr = array('msg' => 'Payment successfully credited', 'status' => true);
				return json_encode($arr);    
			}
			else{
				 $arr = array('msg' => 'Error', 'status' => true);
				return json_encode($arr);    
			 // return redirect()->back()->with('warning', 'Order Has Been Declined Due To Technical Issue');
			}

	 
	 }
	public function RazorThankYou()
	{	
		if (!empty(session()->get('order'))) {
		$categories['categories'] = front_model::getCategory();
		$order =session()->get('order');
		echo view('front/inc/header');
		echo view('front/inc/nav',$categories);
		echo view('front/thankyou',$order);
		echo view('front/inc/footer');
		session()->forget('order');
		}
		else{
			return redirect('')->with('warning', 'Page Reload Invaild');
		}
	}
 }