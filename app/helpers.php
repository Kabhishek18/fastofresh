<?php
  
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
	echo $response;
}