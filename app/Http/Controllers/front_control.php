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
  public function products($name ="")
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
      if($user['user']){
        $cart['locations'] =front_model::getLocationUid($user['user']->id);
        $var['categories'] = front_model::getCategory();

        echo view('front/inc/header');
        echo view('front/inc/nav',$var);
        echo view('front/checkout',$cart);
        echo view('front/inc/footer',$categories);
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
              $sendmsg = 'Hi '.$loc->username.' Your Order has been Confirmed with Order no: '.date('ymdhis',strtotime($order['created_at']));
                sendSms($loc->mobile,$sendmsg);
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
         echo view('front/razorpay',$order);
         echo view('front/inc/footer',$var);
         

        }
    else{
          return redirect()->back()->with('warning', 'Please login for checkout');
      }  
  }
  //ccavRequestHandler
  public function ccavRequestHandler(Request $request)
  {
    // dd($_POST);
    echo view('front/ccavRequestHandler');
  }

  public function ccavResponseHandler(Request $request)
  {
    echo view('front/ccavResponseHandler');
    
  }
  //Login  
  public function login(Request $request)
  {

    $val['email'] = Request::post('email');
    $val['password'] = sha1(Request::post('password'));
    $val['type'] = 'user';
    $val['status'] = 'active';
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
          session()->forget('verifysession');
         return redirect('')->with('success', 'Success Registered');

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
      $val['otp'] =  mt_rand(100000, 999999);
      $subject ="Password Recovery Mail";
      $msg  ='
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td style="padding: 20px 0 30px 0;">

                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
                      <tr>
                        <td align="center" bgcolor="white" style="padding: 40px 0 30px 0;">
                          <img src="http://fastofresh.com/assets/images/logo2.png" alt="Creating Email Magic."  style="display: block;
                           background:white;" />
                        </td>
                      </tr>
                      <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                              <td style="color: #153643; font-family: Arial, sans-serif;">
                                <h1 style="font-size: 24px; margin: 0;">Welcome To Fast O Fresh,</h1>
                              </td>
                            </tr>
                            <tr>
                              <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
                                <p style="margin: 0;">Below is your verification code. Please use this code to access your account. Thanks for using Fast O Fresh.</p>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" bgcolor="#80000" style="color:whitesmoke;padding: 40px 0 30px 0;" >
                                <h1>'.$val['otp'].' </h1>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td bgcolor="#800000" style="padding: 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                              <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
                                <p style="margin: 0;">&reg; Fastofresh,  2021<br/>
                               <a href="#" style="color: #ffffff;">Unsubscribe</a> to this newsletter instantly</p>
                              </td>
                              <td align="right">
                                
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>

                  </td>
                </tr>
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
      $otp = Request::post('password');
      $var = session()->get('verifyemail');

      if($otp ==$var['otp']){
        $update= front_model::UserPasswordEmail($var);
         if($update){
          session()->forget('verifyemail');
         return redirect('')->with('success', 'Success Registered');

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
      sendEmail('kabhishek18@gmail.com','456','5464');
  
  }

  //End Of Code
}
