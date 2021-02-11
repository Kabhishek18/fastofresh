<?php

namespace App\Http\Controllers;
date_default_timezone_set("Asia/Calcutta");
use Request;
use File;
use App\front_model;
use App\helpers;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class front_control extends Controller
{
    //Home Page
  public function index()
  {   
     // if(url()->full() != 'https://fastofresh.com/'){
     //  return redirect('https://fastofresh.com/')
     // }
     $categories['categories'] = front_model::getCategory();
      $popular =front_model::getHomeList(1);
        
      foreach (json_decode($popular->description) as $value) {

          $categories['popular'][] = front_model::getProduct(number_format($value));
      }

      $best =front_model::getHomeList(2);
      foreach (json_decode($best->description) as $value) {

          $categories['best'][] = front_model::getProduct(number_format($value));
      }
      $categories['blogs'] = front_model::getBlog();

      echo view('front/inc/header');
      echo view('front/inc/nav',$categories);
      echo view('front/index',$categories);
      echo view('front/inc/footer',$categories);
  }

  public function dummy($value='')
  {
  	echo view('dummy');
  }

  public function about($value='')
  {
     $categories['categories'] = front_model::getCategory();
      echo view('front/inc/header');
      echo view('front/inc/nav',$categories);
      echo view('front/about');
      echo view('front/inc/footer',$categories);
  }

   public function privacy($value='')
  {
     $categories['categories'] = front_model::getCategory();
      echo view('front/inc/header');
      echo view('front/inc/nav',$categories);
      echo view('front/privacy');
      echo view('front/inc/footer',$categories);
  }

     public function terms($value='')
  {
     $categories['categories'] = front_model::getCategory();
      echo view('front/inc/header');
      echo view('front/inc/nav',$categories);
      echo view('front/terms');
      echo view('front/inc/footer',$categories);
  }
    public function faq($value='')
  {
     $categories['categories'] = front_model::getCategory();
      echo view('front/inc/header');
      echo view('front/inc/nav',$categories);
      echo view('front/faq');
      echo view('front/inc/footer',$categories);
  }
  public function why($value='')
  {
     $categories['categories'] = front_model::getCategory();
      echo view('front/inc/header');
      echo view('front/inc/nav',$categories);
      echo view('front/why');
      echo view('front/inc/footer',$categories);
  }
   //Categories
  public function categories()
  {  
      $var['categories'] =front_model::getCategory();
      echo view('front/inc/header');
      echo view('front/inc/nav',$var);
      echo view('front/category',$var);
      echo view('front/inc/footer',$var);
  }

   //Categories Products
  public function products($name)
  {   
      $var['categories'] = front_model::getCategory();
      $var['category'] =front_model::getCategoryName($name);
      $var['products'] =front_model::GetCatPro($var['category']->id);
       echo view('front/inc/header');
       echo view('front/inc/nav',$var);
       echo view('front/product',$var);
       echo view('front/inc/footer',$var);
  }

   //Prdouct via Seach
  public function productSearch(Request $request)
  {
      $query = Request::post('query');
      $products =front_model::getProductlike($query);
      return json_decode($products); 
  }

  public function Search(Request $request)
  {
        $query = Request::post('product');
        $products =front_model::getProductlike($query);
       if (empty($products[0])) {
         return redirect()->back()->with('warning', 'No Product Found');
       }
        return redirect('product/'.$products[0]->id );
  }

   //Product Detail
  public function productDetail($id,$name="")
  {  
    $var['cart'] = session()->get('cart');
    $var['product'] =front_model::getProduct($id);
     if(!empty($var['product']->recipe)){
     foreach (json_decode($var['product']->recipe) as $value) {

         $var['recipes'][] = front_model::getRecipe(number_format($value));
      }
    }
      else
      {
        $var['recipes'] =null;
      }

      $var['categories'] = front_model::getCategory();
    echo view('front/inc/header');
     echo view('front/inc/nav',$var);
     echo view('front/prodetail',$var);
     echo view('front/inc/footer',$var);
  }
  
  //checkout
  public function checkout()
  { 
    $cart['cart'] = session()->get('cart');
    if($cart['cart']){
      $user['user'] = session()->get('user_session');
      if(!empty($user['user']->email)){
       if(empty($user['user']->id)){
         $data = front_model::GetUserEmailby( $user['user']->email);
        session()->put('user_session',$data);
       $user['user'] = session()->get('user_session');
      }}
      else{
         return redirect()->back()->with('warning', 'Please login for checkout');
      }
      if($user['user']){
        $cart['locations'] =front_model::getLocationUid($user['user']->id);
        $var['categories'] = front_model::getCategory();

        echo view('front/inc/header');
        echo view('front/inc/nav',$var);
        echo view('front/checkout',$cart);
        echo view('front/inc/footer',$var);
      }
      else{
        return redirect()->back()->with('warning', 'Please login for checkout');
      }
    }
    else{
        return redirect('')->with('success', 'Empty Cart');
    }
  }

  public function payment(Request $request)
  {
    $user['user'] = session()->get('user_session');
    if($user['user']){      
         $val['ship'] =Request::post('ship'); 
        $val['locationadd'] = Request::post('locationadd');
          if ($val['locationadd']=="add") {
            $reg['addressline1'] = Request::post('addressline1');
            $reg['landmark'] = Request::post('landmark');
            $reg['city'] = Request::post('city');
            $reg['postalcode'] = Request::post('postalcode');
            $reg['mobile'] = Request::post('mobile');
            $reg['username'] =$user['user']->name;
            $reg['email'] =$user['user']->email;
            //$rep Varialble used
            $rep['location'] =json_encode($reg);
            $val['loc'] =$rep['location'];
            //Add Location 
            $rep['userid'] =$user['user']->id;
            
            $insert =front_model::AddLocation($rep);
            //NOt Insert Location
            if(!$insert){
              return redirect()->back()->with('warning', 'Location Not Added');
            }
          }else{
            //No else
            if(empty(Request::post('loc'))){
                return redirect()->back()->with('warning', 'Please Select Or Add Location');
            }
            $val['loc'] = Request::post('loc');
          }
         if(empty(Request::post('method'))){
                return redirect()->back()->with('warning', 'Please Select Your Method');
            }  
        $val['method'] =Request::post('method');
        if(empty(Request::post('slottime'))){
                return redirect()->back()->with('warning', 'Please Select Your Slotime');
            }  
        $val['slottime'] =Request::post('slottime');
        
        $order['order_amount'] =session()->get('total');

        $order['transactionid'] = rand(10000,879456);
        $order['order_cart'] =json_encode(session()->get('cart')); 
        $order['orderdetail'] =json_encode($val);
        $order['userid'] =$user['user']->id;
        $order['created_at'] =date('y-m-d h:i:s');
        $order['updated_at'] =date('y-m-d h:i:s');  
         session()->put('order', $order);
          if(Request::post('method') == 'cash'){
    
            $insert =front_model::PaymentOrder($order);
            if($insert){
              $orderdetails =json_decode($order['orderdetail'],true); 
              $loc =json_decode($orderdetails['loc']); 
              $sendmsg = 'Hi '.$loc->username.' Your Order '.date('ymdhis',strtotime($order['created_at'])).' has been Confirmed with your selected payment mode of COD';
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
                sendEmail($loc->email,$ordermsg,'Your Fast O Fresh order no.'.date('ymdhis',strtotime($order['created_at'])).' has been received.');

              return redirect('thank-you')->with('success', 'Order Placed With');
      
            }
            else{
              return redirect()->back()->with('warning', 'Something Misfortune Happen!');
                }  
        }
        session()->put('order', $order);
        $var['categories'] = front_model::getCategory();
        echo view('front/inc/header');
        echo view('front/inc/nav',$var);
         echo view('front/ccavenue',$order);
         echo view('front/inc/footer',$var);
         

        }
    else{
          return redirect()->back()->with('warning', 'Please login for checkout');
      }  
  }
  //ccavRequestHandler
  public function ccavRequestHandler()
  {
    echo view('front/ccavRequestHandler');
  }

  public function ccavResponseHandler(Request $request)
  {

       $workingKey='983018055D7B2E7BB023A8808611CCB4';    //Working Key should be provided here.
      $encResponse= Request::post('encResp');     //This is the response sent by the CCAvenue Server
      $rcvdString=ccdecrypt($encResponse,$workingKey);    //Crypto Decryption used as per the specified working key.
      $order_status="";
      $decryptValues=explode('&', $rcvdString);
      $dataSize=sizeof($decryptValues);
      echo "<center>";

      for($i = 0; $i < $dataSize; $i++) 
      {
        $information=explode('=',$decryptValues[$i]);
        if($i==3) $order_status=$information[1];
      }

      if($order_status==="Success")
      {
        $information=explode('=',$decryptValues[0]);
        $ordersession= front_model::GetOrder_Sessions($information[1]);
        $categories['categories'] = front_model::getCategory();
        $orderinsert =front_model::PaymentOrder(json_decode($ordersession->order,true));
        $order =json_decode($ordersession->order,true);
        session()->put('user_session',json_decode($ordersession->user));
        if($orderinsert){
       $orderdetails =json_decode($order['orderdetail'],true); 
          $loc =json_decode($orderdetails['loc']); 
          $sendmsg = 'Hi '.$loc->username.' Your Order has been Confirmed with Order no: '.date('ymdhis',strtotime($order['created_at']));
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
                sendEmail($loc->email,$ordermsg,'Your Fast O Fresh order no.'.date('ymdhis',strtotime($order['created_at'])).' has been received.');
          //delete Session
              front_model::OrderSessionsDelete($information[1]);
            echo view('front/inc/header');
          echo view('front/inc/nav',$categories);
          echo view('front/thankyou',$order);
          echo view('front/inc/footer',$categories);
          session()->forget('order');
          }
        else{
            echo "Please Contact @webadmin";  
        }
      }
      else if($order_status==="Aborted")
      {
        return redirect('')->with('warning', 'Payment was Aborted');
      
      }
      else if($order_status==="Failure")
      {
        return redirect('')->with('warning', 'Payment had occur with failure');
      }
      else
      {
         return redirect('')->with('warning', 'Security Error. Illegal access detected');
        
      
      }
  
    
  }
  //Login  
  public function login(Request $request)
  {

    $val['email'] = Request::post('email');
    $val['password'] = sha1(Request::post('password'));
    $val['type'] = 'user';
    $val['status'] = 'active';
    $checkmail =front_model::GetUserEmail($val['email']);
    if($checkmail > 0){
      $auth =front_model::Authenticate($val);
      if (!empty($auth)) {
        session()->put('user_session',$auth);
        return redirect('dashboard');
      }
      else{
        session()->flash('warning', 'Wrong Credentials');
        return redirect('');
      }
    }
    else{
      session()->flash('warning', 'Email Id Invalid');
        return redirect('');
    }
  } 
   
  public function register(Request $request)
  {
    $val['name'] = Request::post('name');
    $val['email'] = (Request::post('email'));
    $val['mobile'] = (Request::post('mobile'));

     $emailverify = front_model::GetUserEmail($val['email']);
     if($emailverify >0){
      return redirect()->back()->with('warning', 'Email Id Already Register');
     }
      $mobileverify = front_model::GetUserPhone($val['mobile']);
     if($mobileverify >0){
      return redirect()->back()->with('warning', 'Mobile Number Already Register');
     }
     
    $val['password'] = sha1(Request::post('password'));
    $val['sixdigit'] =  mt_rand(100000, 999999);
    $val['sendsms'] =$val['sixdigit'] .' is your verification code. Please use this code to access your account. Thanks for using Fast O Fresh.';
    sendSms($val['mobile'], $val['sendsms']);

    session()->put('verifysession',$val);

    $var['categories'] = front_model::getCategory();
    echo view('front/inc/header');
    echo view('front/inc/nav',$var);
    echo view('front/otpverifcation',$val);
    echo view('front/inc/footer',$var);

  } 

  public function otpVerifcation(Request $request)
  {
    if(!empty(session()->get('verifysession')))
    {
      $otp = Request::post('otp');
      $var = session()->get('verifysession');
      $var['type'] ='user';
      $var['status'] ='active';

      if($otp ==$var['sixdigit']){
        $insert= front_model::InsertUser($var);
         if($insert){
          sendSms($var['mobile'], 'Thank you for registration. If you have any questions, please feel free to contact us at 1800-313-8898 ');

            $emailmsg = '<table width="100%" cellpadding="0" cellspacing="0" border="0" id="m_-2287190302310609224m_-7533971164095270638background-table" style="border-collapse:collapse;padding:0;margin:0 auto;background-color:#ebebeb;font-size:12px">
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
                                                                     <td align="center" style=" font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:15px 0px 10px 5px;margin:0">
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
                                                                        <h3 style="text-align:left;margin:0;padding:5px 15px">Dear '.$var['name'].',</h3>
                                                                        <h3 style="padding:5px 15px;font-family:calibri;font-weight:normal;font-size:17px;margin-bottom:10px;margin-top:15px">Welcome to Fast O Fresh,
                                    Thanks for creating an account on Fast O Fresh. Your username is '.$var['name'].'. You can access your account area to view orders, change your password, and more at: <a href="www.fastofresh.com/my-account/">www.fastofresh.com/my-account/</a>
                                    </h3>
                                    
                                 </td>
                              </tr>
                              <tr>
                                 <td style="width: 650px; font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
                                    <table bgcolor="" width="100%" height="100px">
                                       <tbody><tr>
                                          <td></td>
                                            
                                          <td></td>

                                       </tr>
                                 
                                    </tbody></table>
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
          $subject='Your Fast O Fresh account has been created!';

          
          sendEmail($var['email'],$emailmsg,$subject);
          session()->forget('verifysession');
          $object = (object) $var;
           session()->put('user_session',$object);
         return redirect('')->with('success', 'Successfully Registered');

         } 
         else{
           session()->forget('verifysession');
         return redirect('')->with('warning', 'Something Misfortune Happen!');
         }
      }
      else{
           session()->forget('verifysession');
         return redirect('')->with('warning', 'OTP Did Not Matched');
      }
    }
    else{
         return redirect()->back()->with('warning', 'Something Went Wrong!');
    }
  }


  //Email Verification
  public function EmailotpForgot(Request $request)
  {
    
      $val['email'] = (Request::post('email'));
      $emailverify = front_model::GetUserEmail($val['email']);
      if($emailverify == 0){
        return redirect()->back()->with('warning', 'Email Id Invalid');
      }
      else{
        $user = front_model::GetUserEmailby($val['email']);
      }
      $val['otp'] =  mt_rand(100000, 999999);
      $subject ='<table width="100%" cellpadding="0" cellspacing="0" border="0" id="m_-2287190302310609224m_-7533971164095270638background-table" style="border-collapse:collapse;padding:0;margin:0 auto;background-color:#ebebeb;font-size:12px">
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
                                    <h3 style="text-align:left;margin:0;padding:5px 15px">Dear'.$user['name'] .' </h3>
                                    <h3 style="padding:5px 15px;font-family:calibri;font-weight:normal;font-size:17px;margin-bottom:10px;margin-top:15px">Hope you are having a great time with Fast O Fresh.
To complete your account verification, please enter the code below.  
</h3>
                                    
                                 </td>
                              </tr>
                              <tr>
                                 <td style="width: 650px; font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
                                    <table bgcolor="" width="100%" height="100px">
                                       <tr>
                                          <td></td>
                                            <td colspan="3" style="color:#000; font-family:calibri;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:5px 15px;margin:0;text-align:center">
                                             <h3 style="font-family:calibri;font-weight:normal;font-size:32px;margin-bottom:10px;margin-top:15px;text-align: center;">789456</h3>
                                             

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
    sendEmail( $val['email'],$msg,$subject);
    session()->put('verifyemail',$val);
    $var['categories'] = front_model::getCategory();
    echo view('front/inc/header');
    echo view('front/inc/nav',$var);
    echo view('front/emailforgot',$val);
    echo view('front/inc/footer',$var);
  }

  //Email Verification
  public function ForgotUpdate(Request $request)
  {
    if(!empty(session()->get('verifyemail')))
    {
      $otp = Request::post('otp');
      $password = Request::post('password');
      $var = session()->get('verifyemail');
      $array['email'] =$var['email'];
      $array['password'] =$password;
      if($otp == $var['otp']){
        $update= front_model::UserPasswordEmail($array);
         if($update){
          session()->forget('verifyemail');
         return redirect('')->with('success', 'Successfully  Updated');

         } 
         else{
           session()->forget('verifyemail');
         return redirect('')->with('warning', 'Something Misfortune Happen!');
         }
      }
      else{
           session()->forget('verifyemail');
         return redirect('')->with('warning', 'OTP Did Not Matched');
      }
    }
    else{
         return redirect('')->with('warning', 'Something Went Wrong!');
    }
  }



  //Dashboard
  public function Dashboard($value='')
  {
    $user['user'] = session()->get('user_session');
    if ($user['user']) {
      if(empty($user['user']->id)){
         $data = front_model::GetUserEmailby( $user['user']->email);
        session()->put('user_session',$data);
       $user['user'] = session()->get('user_session');
      }
      $var['categories'] = front_model::getCategory();
      $user['orders'] =front_model::getOrderUserid($user['user']->id);
      $user['locations'] =front_model::getLocationUid($user['user']->id);
      echo view('front/inc/header');
      echo view('front/inc/nav',$var);
      echo view('front/dashboard',$user);
      echo view('front/inc/footer',$var);
    }
    else{
       session()->flash('warning', 'Access Denied');
      return redirect('');
    }
  }

  public function OrderInvoice($value='')
  {
    $user['user'] = session()->get('user_session');
    if ($user['user']) {
      $user['order'] =front_model::getOrderid($user['user']->id,$value);
      if(empty($user['user']->id)){
         $data = front_model::GetUserEmailby( $user['user']->email);
        session()->put('user_session',$data);
       $user['user'] = session()->get('user_session');
      }
        echo  view('admin/inc/header2');    
         
        echo  view('front/invoice',$user);
        echo  view('admin/inc/footer');    

    }
    else{
       session()->flash('warning', 'Access Denied');
      return redirect('');
    }
  }

  public function CancelOrder(Request $request)
  {
     $user['user'] = session()->get('user_session');
    if ($user['user']) {
      $reason = Request::post('reason');
      $var['id'] =Request::post('id');
      $var['userid'] =$user['user']->id;
      $order =front_model::getOrderid($var['userid'],$var['id']);
      if(!empty($order))
      {
        $update =front_model::UserCancelOrder($var);
        if($update){
          $orderdetails =json_decode($order->orderdetail,true); 
          
              $loc =json_decode($orderdetails['loc']); 
              $sendmsg = 'Hi '.$loc->username.' Your Order has been Cancelled with Order no: '.date('ymdhis',strtotime($order->created_at));
              $sender =$loc->mobile;
          sendSms($loc->mobile,$sendmsg);
          return redirect()->back()->with('success', 'Cancel Order SuccessFully!');
        }
        else{
           return redirect()->back()->with('warning', 'Something Went Wrong!');
         }
      }
    }
    else{
       session()->flash('warning', 'Access Denied');
      return redirect('');
    }
  }


  //Location remove
  public function LocationRemove($value)
  {
    $user['user'] = session()->get('user_session');
    if ($user['user']) {
      $var['id'] =$value;
      $var['userid'] =$user['user']->id;
      $update =front_model::UserLocationDelete($var);
      if($update){
        return redirect()->back()->with('success', 'Remove Location SuccessFully!');
      }
      else{
         return redirect()->back()->with('warning', 'Something Went Wrong!');
       }
    }
    else{
       session()->flash('warning', 'Access Denied');
      return redirect('');
    }
  }
  
  
  //Profile Image UIpklo-ad
  public function profileimageupload(Request $request)
  {
    $user['user'] = session()->get('user_session');
    if ($user['user']) {
        if (Request::hasFile('image'))
          {
              $file = Request::file('image');
              $path = public_path().'/profileimages/'.$user['user']->id;
              if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
              }
              $name = Request::file('image')->getClientOriginalName();
              Request::file('image')->move($path,$name);
              $var['image'] =$name;
              $var['id'] =$user['user']->id;
              $insert =front_model::UserImageUpload($var);
              if ($insert) {
                 $updateuser = session()->get('user_session');
                 $updateuser->avatar =$name;
                session()->put('user_session', $updateuser);
                return redirect()->back()->with('success', 'Updated Success');
              }
              else{
                 return redirect()->back()->with('warning', 'Something Went Wrong!');
              }
             
                
          }
        else{
             return redirect()->back()->with('warning', 'Something Went Wrong With Upload!');
        }  
    }
    else{
       session()->flash('warning', 'Access Denied');
      return redirect('');
    }
  }

  //Profile Password change
  public function changepassword(Request $request)
  {
    $user['user'] = session()->get('user_session');
    if ($user['user']) {
        $password = Request::post('password');
        $cpassword = Request::post('cpassword');
        if($password == $cpassword)
        {
          $password =sha1($password);
          $var['password'] =$password;
           $var['id'] =$user['user']->id;
           $insert =front_model::UserPassword($var);
              if ($insert) {
                return redirect()->back()->with('success', 'Updated Success');
              }
              else{
                 return redirect()->back()->with('warning', 'Something Went Wrong!');
              }
        }
        else{
           return redirect()->back()->with('warning', 'Password Match Failed !');
        }

    }
    else{
       session()->flash('warning', 'Access Denied');
      return redirect('');
    }
  }

  //Logout
  public function Logout($value='')
  {
    session()->forget('user_session');
    return redirect('');
  }

  public function BlogDetail($id)
  {
    $var['blog'] =front_model::getBlog($id);
     $var['categories'] = front_model::getCategory();

    echo view('front/inc/header');
    echo view('front/inc/nav',$var);
    echo view('front/blogdetail',$var);
     echo view('front/inc/footer',$var);
  }


  public function recipeDetail($id)
  {
    
    $var['recipe'] =front_model::getRecipe($id);
     $var['categories'] = front_model::getCategory();
    echo view('front/inc/header');
    echo view('front/inc/nav',$var);
    echo view('front/recipeview',$var);
     echo view('front/inc/footer',$var);
  }
 
  
  public function LocationSaved(Request $request)
  {
      $weblocation = Request::post('weblocation');
       session()->put('location',$weblocation);
          return redirect()->back();
  }

   public function PincodeSaved(Request $request)
  {
      $weblocation = Request::post('pinlocation');
       session()->put('pinlocation',$weblocation);
          return redirect()->back();
  }


  public function Test()
  {
     // sendEmail('kabhishek18@gmail.com','456','5464');
   sendSms('7053948103','test');
  }

  //End Of Code
}
