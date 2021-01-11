<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\front_model;
use PHPMailerPHPMailerPHPMailer;
use PHPMailerPHPMailerException;

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
  public function login()
  {
    $val['token'] = Request::get('_token');
    $val['pid'] = Request::get('pid');
    $val['qty'] = Request::get('qty');

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
