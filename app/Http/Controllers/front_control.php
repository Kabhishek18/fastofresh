<?php

namespace App\Http\Controllers;
date_default_timezone_set("Asia/Calcutta");
use Request;
use File;
use App\front_model;
use PHPMailerPHPMailerPHPMailer;
use PHPMailerPHPMailerException;

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
        return redirect('product/'.$query);
  }

   //Product Detail
  public function productDetail($name ="")
  {  
    $var['cart'] = session()->get('cart');
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
      $user['user'] = session()->get('user_session');
      if($user['user']){
        $cart['locations'] =front_model::getLocationUid($user['user']->id);
        echo view('front/inc/header');
        echo view('front/inc/nav');
        echo view('front/checkout',$cart);
        echo view('front/inc/footer');
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
            $val['loc'] = Request::post('loc');
          }
        $val['method'] =Request::post('method');
        $val['slottime'] =Request::post('slottime');
        
        $order['order_amount'] =session()->get('total');
        $order['transactionid'] = rand(9,0);
        $order['order_cart'] =json_encode(session()->get('cart')); 
        $order['orderdetail'] =json_encode($val);
        $order['userid'] =$user['user']->id;
        $order['created_at'] =date('y-m-d h:i:s');
        $order['updated_at'] =date('y-m-d h:i:s');  
         $insert =front_model::PaymentOrder($order);
         if($insert){
            dd($order);
          }
          else{
             return redirect()->back()->with('warning', 'Order Has Been Declined Due To Technical Issue');
          }

        }
    else{
          return redirect()->back()->with('warning', 'Please login for checkout');
      }  
  }

  //Login  
  public function login()
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
   
  //Dashboard
  public function Dashboard($value='')
  {
    $user['user'] = session()->get('user_session');
    if ($user['user']) {
      $user['orders'] =front_model::getOrderUserid($user['user']->id);
      $user['locations'] =front_model::getLocationUid($user['user']->id);
      echo view('front/inc/header');
      echo view('front/inc/nav');
      echo view('front/dashboard',$user);
      echo view('front/inc/footer');
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
    session()->flush('user_session');
    return redirect('');
  }

  public function BlogDetail($value='')
  {
    dd($value);
    $var['product'] =front_model::getProductname($name);
    echo view('front/inc/header');
     echo view('front/inc/nav');
     echo view('front/blogdetail',$var);
     echo view('front/inc/footer');
  }
  public function sendEmail (Request $request) {
    
    // is method a POST ?
      if( Request::isMethod('post') ) {

        require '../vendor/autoload.php'; // load Composer's autoloader

        $mail = new PHPMailer(true); // Passing `true` enables exceptions

        try {

          // Mail server settings

          $mail->SMTPDebug = 4; // Enable verbose debug output
          $mail->isSMTP(); // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
          $mail->SMTPAuth = true; // Enable SMTP authentication
          $mail->Username = '@gmail.com'; // SMTP username
          $mail->Password = 'your-gmail-password'; // SMTP password
          $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587; // TCP port to connect to

          $mail->setFrom('your-email@gmail.com', 'Your Name');
          $mail->addAddress($_POST['email']); // Add a recipient, Name is optional
          $mail->addCC($_POST['email-cc']);
          $mail->addBCC($_POST['email-bcc']);
          $mail->addReplyTo('your-email@gmail.com', 'Your Name');
          // print_r($_FILES['file']); exit;

          for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
            $mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]); // Optional name
          }

          $mail->isHTML(true); // Set email format to HTML

          $mail->Subject = $_POST['subject'];
          $mail->Body    = $_POST['message'];
          // $mail->AltBody = plain text version of your message;

          if( !$mail->send() ) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
          } else {
            echo 'Message has been sent';
          }

        } catch (Exception $e) {
          // return back()->with('error','Message could not be sent.');
        }
      }
  }


  //end
}
