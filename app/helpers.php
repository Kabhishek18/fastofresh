<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\front_model;

function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}
   
function productImagePath($image_name)
{
    return public_path('images/products/'.$image_name);
}


function sendSms($contacts,$msg)
{
	$api_key = '560128DFBBA483';
	$contacts = $contacts;
	$from = 'FOFRSH';
	$sms_text = urlencode($msg);

	//Submit to server

	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL, "http://byebyesms.com/app/smsapi/index.php");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=10708&routeid=7&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
	$response = curl_exec($ch);
	curl_close($ch);
	// echo $response;
}

 function sendEmail($sender,$msg,$subject) 
  {
    
      // Load Composer's autoloader
      require '../vendor/autoload.php';

      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);

      try {
          //Server settings
          //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = 'in-v3.mailjet.com';                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = '393e832dc0c67ff5ca93ea07ad73f96f';                     // SMTP username
          $mail->Password   = 'e2f6ea5d61072b421a2f4a00f1bd0103';                               // SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
          $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

          //Recipients
          $mail->setFrom('no-reply@fastofresh.com', 'FastOFresh');
          $mail->addAddress($sender, $sender);     // Add a recipient
          // $mail->addAddress('ellen@example.com');               // Name is optional
          // $mail->addReplyTo('info@example.com', 'Information');
          // $mail->addCC('cc@example.com');
          // $mail->addBCC('bcc@example.com');

          // Attachments
          // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = $subject;
          $mail->Body    = $msg;
          //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();
          echo 'Message has been sent';
      } catch (Exception $e) {
          // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      	     echo "Message could not be sent";
      }
  }


    function footpro($id)
    {
      $product = front_model::GetCatPro($id);
        return $product;
    }


  function startsWith($string, $startString) { 
      $len = strlen($startString); 
      return (substr($string, 0, $len) === $startString); 
    } 


   function SessionHelper($a,$b,$c,$d,$e)
    {
      $update = front_model::InsertSession($a,$b,$c,$d,$e);
        return $update;
    }


    function ccencrypt($plainText,$key)
{
  $key = cchextobin(md5($key));
  $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
  $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
  $encryptedText = bin2hex($openMode);
  return $encryptedText;
}

/*
* @param1 : Encrypted String
* @param2 : Working key provided by CCAvenue
* @return : Plain String
*/
function ccdecrypt($encryptedText,$key)
{
  $key = cchextobin(md5($key));
  $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
  $encryptedText = cchextobin($encryptedText);
  $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
  return $decryptedText;
}

function cchextobin($hexString) 
 { 
  $length = strlen($hexString); 
  $binString="";   
  $count=0; 
  while($count<$length) 
  {       
      $subString =substr($hexString,$count,2);           
      $packedString = pack("H*",$subString); 
      if ($count==0)
      {
      $binString=$packedString;
      } 
      
      else 
      {
      $binString.=$packedString;
      } 
      
      $count+=2; 
  } 
        return $binString; 
  } 