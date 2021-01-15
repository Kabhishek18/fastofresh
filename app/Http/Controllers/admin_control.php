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

    public function CategoryInsert(Request $request)
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    		$cat['name'] = Request::post('name');
	    	 	$cat['meta'] = Request::post('meta');
	    	 	$cat['short_descrip'] = Request::post('short_descrip');
	    	 	$cat['description'] = Request::post('description');
	    	 	$cat['status'] = Request::post('status');
	    	 	$cat['updated_at'] = date('y-m-d h:i:s');
	    	 	//Image Checking while uploading 
			 	 if (Request::hasFile('image'))
		          {
		              $file = Request::file('image');
		              $path = public_path().'/categories';
		              if(!File::isDirectory($path)){
		                File::makeDirectory($path, 0777, true, true);
		              }
		              $cat['image'] = Request::file('image')->getClientOriginalName();
		              Request::file('image')->move($path,$cat['image']);
		          }



	    	 if(Request::post('id')){
	    	 	$cat['id'] = Request::post('id');
	    	 	$value =admin_model::UpdateCategory($cat);
	    	 	if ($value) {
	    	 		return redirect()->back()->with('succes', 'Updated succes');
	    	 	}
	    	 	else{
	    	 		 return redirect()->back()->with('warning', 'Failed To Add!');
	    	 	}	
	    	 }
	    	 else{
	    	 	$cat['created_at'] = date('y-m-d h:i:s');
	    	 	$value =admin_model::CreateCategory($cat);
	    	 	if ($value) {
	    	 		return redirect()->back()->with('succes', 'Added succes');
	    	 	}
	    	 	else{
	    	 		 return redirect()->back()->with('warning', 'Failed To Add!');
	    	 	}
	    	 }


		}else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }
   


   //Product view  
    public function Product()
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	$user['products'] =admin_model::getProduct();
	      echo view('admin/inc/header');
	      echo view('admin/product',$user);
	      echo view('admin/inc/footer');
	    	}
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }

    //ProductAdd 
	public function ProductAdd($id ='')
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	echo view('admin/inc/header');
	    	$user['categories'] =admin_model::getCategory();

	    	if($id){
	    		$user['datalist'] =admin_model::getProduct($id);
	    		$user['datalist']->parent_id;
	    		$user['parent'] =admin_model::getCategory($user['datalist']->parent_id);
			    echo view('admin/productadd',$user);
			  	
	    	}
	    	else{
			    echo view('admin/productadd',$user);
	    		
	    	}
	    	  echo view('admin/inc/footer');
	    }
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }

    public function ProductInsert(Request $request)
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    		$cat['name'] = Request::post('name');
	    	 	$cat['meta'] = Request::post('meta');
	    	 	$cat['parent_id'] = Request::post('parent_id');
	    	 	$cat['short_descrip'] = Request::post('short_descrip');
	    	 	$cat['description'] = Request::post('description');
	    	 	$cat['status'] = Request::post('status');
	    	 	$cat['updated_at'] = date('y-m-d h:i:s');
	    	 	//Image Checking while uploading 
			 	 if (Request::hasFile('image'))
		          {
		              $file = Request::file('image');
		              $path = public_path().'/products';
		              if(!File::isDirectory($path)){
		                File::makeDirectory($path, 0777, true, true);
		              }
		              $cat['image'] = Request::file('image')->getClientOriginalName();
		              Request::file('image')->move($path,$cat['image']);
		          }



	    	 if(Request::post('id')){
	    	 	$cat['id'] = Request::post('id');
	    	 	$value =admin_model::UpdateProduct($cat);
	    	 	if ($value) {
	    	 		return redirect()->back()->with('success', 'Updated succes');
	    	 	}
	    	 	else{
	    	 		 return redirect()->back()->with('warning', 'Failed To Add!');
	    	 	}	
	    	 }
	    	 else{
	    	 	$cat['created_at'] = date('y-m-d h:i:s');
	    	 	$value =admin_model::CreateProduct($cat);
	    	 	if ($value) {
	    	 		return redirect()->back()->with('success', 'Added succes');
	    	 	}
	    	 	else{
	    	 		 return redirect()->back()->with('warning', 'Failed To Add!');
	    	 	}
	    	 }


		}else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }
	


    //Order view  
    public function Order()
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	$user['orders'] =admin_model::getOrders();
	      echo view('admin/inc/header');
	      echo view('admin/order',$user);
	      echo view('admin/inc/footer');
	    	}
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }


}
