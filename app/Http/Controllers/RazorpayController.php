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
           		// Coupon Insert Count
                if(session()->get('coupon')){
                	$user['user'] = session()->get('user_session');
                  $coupon = session()->get('coupon');
                   $couponinsert = front_model::InsertCouponCount($user['user']->id, $coupon->id);
                   session()->forget('coupon');

                }
               //Coupon Insert COunt
				
				return json_encode(array('msg' => 'Payment successfully credited', 'status' => true));    
			}
			else{
				 $arr = array('msg' => 'Error', 'status' => true);
				return json_encode($arr);    
			  return redirect()->back()->with('warning', 'Order Has Been Declined Due To Technical Issue');
			}

	 
	 }
	public function RazorThankYou()
	{	
		session()->forget('cart');
		
		if (!empty(session()->get('order'))) {
		$categories['categories'] = front_model::getCategory();
		$order =session()->get('order');
		$orderdetails =json_decode($order['orderdetail'],true); 
		  		$loc =json_decode($orderdetails['loc']); 
		  		$sendmsg = 'Hi '.$loc->username.' Your Order has been Confirmed with Order no: '.date('Ymdhis',strtotime($order['created_at']));
				sendSms($loc->mobile,$sendmsg);
				 $ordermsg = '<table width="100%" cellpadding="0" cellspacing="0" border="0" id="m_-2287190302310609224m_-7533971164095270638background-table" style="border-collapse:collapse;padding:0;margin:0 auto;background-color:#ebebeb;font-size:12px">
									   <tbody>
									      <tr>
									         <td valign="top" align="center" style="font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;width:100%">
									            <table cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse:collapse;padding:0;margin:0 auto;width:600px">
									               <tbody>
									                  <tr>
									                     <td align="center" style="background:#fff;font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
									                        <table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;padding:0;margin:0">
									                           <tbody>
									                              <tr>
									                                 <td align="center"  style=" font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:15px 0px 10px 5px;margin:0">
									                                    <a href="https://www.fastofresh.com/" style="color:#3696c2;float:left;display:block" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.fastofresh.com/&amp;source=gmail&amp;ust=1612437442476000&amp;usg=AFQjCNGp8vRHo85GtG1KT4EjwDV7Yqv0Lg">
									                                    <img width="" height="" src="http://fastofresh.com/assets/images/logo2.png" alt="fastofresh.com" border="0" style=" outline:none;text-decoration:none" class="CToWUd"></a>
									                                 </td>
									                              </tr>
									                           </tbody>
									                        </table>
									                     </td>
									                  </tr>
									                  <tr>
									                     <td align="top" style="background:#fff;font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
									                        <table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;padding:0;margin:0">
									                           <tbody>
									                           
									                              <tr>
									                                 <td style="font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:5px 15px;margin:0;">
									                                    <h3 style="text-align:left;margin:0;padding:5px 15px">Dear '.$loc->username.',</h3>
									                                    <h3 style="padding:5px 15px;font-family:calibri;font-weight:normal;font-size:17px;margin-bottom:10px;margin-top:15px"> Thanks for using Fast O Fresh! Your order has been confirmed and will be delivered shortly. Look forward to serving you.</h3>
									                                    
									                                 </td>
									                              </tr>
									                              <tr>
									                                 <td style="width: 650px; font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
									                                    <table bgcolor="" width="100%" height="100px">
									                                       <tr>
									                                          <td></td>
									                                            <td colspan="3" style="color:#000; font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:5px 15px;margin:0;text-align:center">
									                                             
									                                             

									                                          </td>
									                                          <td></td>

									                                       </tr>
									                                 
									                                    </table>
									                                 </td>
									                                
									                                 </td>
									                              </tr>
									                           </tbody>
									                        </table>
									                        <table>
									                           <tbody>
									                              <tr>
									                                  <td style="font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:10px 15px;margin:10px;">
									                                       <p>Thankfully, Team Fast O fresh</p>
									                                   </td>        
									                              </tr>
									                           </tbody>
									                        </table>
									                     </td>
									                  </tr>
									               </tbody>
									            </table>
									   
									         </td>
									      </tr>
									   </tbody>
									</table>';
                sendEmail($loc->email,$ordermsg,'Your Fast O Fresh order no.'.date('Ymdhis',strtotime($order['created_at'])).' has been received.');
		echo view('front/inc/header');
		echo view('front/inc/nav',$categories);
		echo view('front/thankyou',$order);
		echo view('front/inc/footer',$categories);
		//session()->forget('order');
		}
		else{
			return redirect('')->with('warning', 'Page Reload Invaild');
		}
	}
 }