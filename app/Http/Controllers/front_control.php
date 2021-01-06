<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class front_control extends Controller
{
    //Home Page
   public function index()
   {
      echo view('front/index');
   }
   
   //

}
