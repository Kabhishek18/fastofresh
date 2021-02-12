<?php

namespace App\Http\Controllers;
date_default_timezone_set("Asia/Calcutta");
use Request;
use File;
use App\apimodel;
use App\helpers;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class apicontrol extends Controller
{
	// Get Order
	public function GetOrderApi($value='')
	{
		$json = apimodel::getOrder();
		return response($json);
	}

	//Get Order by Date

	public function GetOrderByDateApi(Request $request)
	{	
		$start =Request::post('start');
		$end =Request::post('end');
		$json = apimodel::getOrderDate($start,$end);
		return response($json);
	}
}
