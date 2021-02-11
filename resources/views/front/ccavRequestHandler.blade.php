<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>
<?php 
	 $order = session()->get('order');
	 $user = session()->get('user_session');

	 $insert = SessionHelper(date('ymdhis',strtotime($order['created_at'])),json_encode($order),json_encode($user),date('y-m-d h:i:s'),date('y-m-d h:i:s'));
	 if ($insert) {
	 
	 $orderdetails =json_decode($order['orderdetail'],true);
	 $location =json_decode($orderdetails['loc'],true);
	$valuable =array(
    'tid' => date('ymdhis'),
    'merchant_id' => '312729',
    'order_id' => date('ymdhis',strtotime($order['created_at'])),
    'amount' => $order['order_amount'],
    'currency' => 'INR',
    'redirect_url' => url('').'/ccavResponseHandler',
    'cancel_url' => url('').'/ccavResponseHandler',
    'language' => 'EN',
    'billing_name' => $location['username'],
    'billing_address' => $location['addressline1'],
    'billing_city' => $location['city'],
    'billing_state' => $location['postalcode'],
    'billing_zip' => $location['postalcode'],
    'billing_country' => 'India',
    'billing_tel' => $location['mobile'],
    'billing_email' => $location['email'] ,
    'promo_code' => '',
    'customer_identifier' => '',
);
	$merchant_data='';
	$working_key='983018055D7B2E7BB023A8808611CCB4';//Shared by CCAVENUES
	$access_code='AVHT00IA37BF26THFB';//Shared by CCAVENUES
	
	foreach ($valuable as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}

	$encrypted_data=ccencrypt($merchant_data,$working_key); // Method for encrypting the data.
	}else{
	 	 return redirect()->back()->with('warning', 'Something Misfortune Happen');
	 }
?>
<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

