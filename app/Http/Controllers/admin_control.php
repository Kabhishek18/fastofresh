<?php

namespace App\Http\Controllers;

use Request;
use File;
use App\admin_model;
use PHPMailerPHPMailerPHPMailer;
use PHPMailerPHPMailerException;

class admin_control extends Controller
{
    public function index()
    {
	  echo view('admin/inc/header');
      echo view('admin/index');
      echo view('admin/inc/footer');
    }


    public function Authenticate()
    {
    	$val['email'] = Request::post('user_email');
	    $val['password'] = sha1(Request::post('user_password'));
	    $val['type'] = 'admin';
    	$val['status'] = 'active';
	    $auth =admin_model::Authenticate($val);
	    if (!empty($auth)) {
	      session()->put('admin_session',$auth);
	      return redirect('laravel-admin/dashboard');
	    }
	    else{
	      session()->flash('warning', 'Wrong Credentials');
	      return redirect('laravel-admin');
	    }
    }

    public function dashboard()
    {
    	 $user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	      echo view('admin/inc/header');
	      echo view('admin/dashboard',$user);
	      echo view('admin/inc/footer');
	    }
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }

    public function Logout($value='')
	  {
	    session()->flush('admin_session');
	    return redirect('laravel-admin');
	  }

	//Category view  
    public function Category()
    {
    	 $user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	$user['categories'] =admin_model::getCategory();
	      echo view('admin/inc/header');
	      echo view('admin/category',$user);
	      echo view('admin/inc/footer');
	    }
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }

    //Category Add

    public function CategoryAdd($id ='')
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	echo view('admin/inc/header');
	    	if($id){
	    		$user['datalist'] =admin_model::getCategory($id);
			    echo view('admin/categoryadd',$user);
			  	
	    	}
	    	else{
			    echo view('admin/categoryadd',$user);
	    		
	    	}
	    	  echo view('admin/inc/footer');
	    }
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }

   
}
