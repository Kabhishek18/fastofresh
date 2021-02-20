<?php

namespace App\Http\Controllers;

use Request;
use File;
use App\admin_model;
use PHPMailerPHPMailerPHPMailer;
use PHPMailerPHPMailerException;
use charlieuki\ReceiptPrinter\ReceiptPrinter as ReceiptPrinter;

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
	    session()->forget('admin_session');
	    return redirect('laravel-admin');
	}

	public function OrderStatus(Request $request)
	{
	   	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	   		$val['status'] = Request::post('statusupdate');
	   		$val['id'] = Request::post('id');
	   		$update = admin_model::StatusOrder($val);
	   		if ($update) {
	   			if($val['status'] == 'inprocess'){
	   			$order = admin_model::getOrders($val['id']);
	   			$orderdetail = json_decode($order->orderdetail, true);
                $location = json_decode($orderdetail['loc'],true);	
	   			sendSms($location['mobile'],'Hi '.$location['username'].'your order #'.date('Ymdhis',strtotime($order->created_at)).' is in process with Fast O Fresh. Thank you for your patience. ');
	   			}
	   			if($val['status'] == 'cancelled'){
	   			$order = admin_model::getOrders($val['id']);
	   			$orderdetail = json_decode($order->orderdetail, true);
                $location = json_decode($orderdetail['loc'],true);	
	   			sendSms($location['mobile'],'Hi '.$location['username'].'your order #'.date('Ymdhis',strtotime($order->created_at)).' has been Cancelled due to some issues. ');
	   			}
	   			if($val['status'] == 'dispatched'){
	   			$order = admin_model::getOrders($val['id']);
	   			$orderdetail = json_decode($order->orderdetail, true);
                $location = json_decode($orderdetail['loc'],true);	
	   			sendSms($location['mobile'],'Hi '.$location['username'].'your order #'.date('Ymdhis',strtotime($order->created_at)).' is out for delivery, We are trying our best to deliver your order at the earliest. ');
	   			}
	   			if($val['status'] == 'delivered'){
	   			$order = admin_model::getOrders($val['id']);
	   			$orderdetail = json_decode($order->orderdetail, true);
                $location = json_decode($orderdetail['loc'],true);	
	   			sendSms($location['mobile'],'Hi '.$location['username'].' your Fast O Fresh order #'.date('Ymdhis',strtotime($order->created_at)).' has been successfully delivered. Thank you for your order with Fast O Fresh ');
	   			}
	   			return redirect()->back()->with('success', 'Update Successfully');
	    		}
    		else{
    			return redirect()->back()->with('warning', 'Something Misfortune Happen');
    		}
	    }
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
	}

	public function Homelist()
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	   	$user['popular'] =admin_model::getHomeList(1);
	   		
	   	foreach (json_decode($user['popular']->description) as $value) {

	   	    $user['popularproduct'][] = admin_model::getProduct(number_format($value));
	   	}

	   	$user['best'] =admin_model::getHomeList(2);
    	foreach (json_decode($user['best']->description) as $value) {

	   	    $user['bestproduct'][] = admin_model::getProduct(number_format($value));
	   	}

   		$user['suggest'] =admin_model::getHomeList(3);
	   		
	   	foreach (json_decode($user['suggest']->description) as $value) {

	   	    $user['suggestproduct'][] = admin_model::getProduct(number_format($value));
	   	}
    	$user['products'] =admin_model::getProduct();

	   		echo view('admin/inc/header');
		    echo view('admin/home_list',$user);
		    echo view('admin/inc/footer');
	    }
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }

    public function HomelistInsert()
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	   		if(Request::post('id'))
	   		{
	   			$value['id'] =Request::post('id');
	   			$description =Request::post('popular');
	   			$value['description'] =json_encode($description);
	   			$value['updated_at'] =date('y-m-d h:i:s');
	    		$update=admin_model::Updatehome_list($value);
	    		if($update)
	    		{
	    			return redirect()->back()->with('success', 'Update Successfully');
	    		}
	    		else{
	    			return redirect()->back()->with('warning', 'Something Misfortune Happen');
	    		}
	   		}
	   		else{
	   			return redirect()->back()->with('warning', 'Error Happen');
	   		}
	    }
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
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

	//Category delete  
    public function CategoryDelete($id)
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    		$delete =admin_model::CategoryDelete($id);
	    		if($delete){
	    			return redirect()->back()->with('success', 'Updated succes');
	    		}
	    		else{
	    			return redirect()->back()->with('warning', 'Update Failure');
	    		}
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
		                File::makeDirectory($path, 0755, true, true);
		              }
		              $cat['image'] = Request::file('image')->getClientOriginalName();
		              Request::file('image')->move($path,$cat['image']);
		          }



	    	 if(Request::post('id')){
	    	 	$cat['id'] = Request::post('id');
	    	 	$value =admin_model::UpdateCategory($cat);
	    	 	if ($value) {
	    	 		return redirect()->back()->with('success', 'Updated succes');
	    	 	}
	    	 	else{
	    	 		 return redirect()->back()->with('warning', 'Failed To Add!');
	    	 	}	
	    	 }
	    	 else{
	    	 	$cat['created_at'] = date('y-m-d h:i:s');
	    	 	$value =admin_model::CreateCategory($cat);
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

    //Product delete  
    public function ProductDelete($id)
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    		$delete =admin_model::ProductDelete($id);
	    		if($delete){
	    			return redirect()->back()->with('success', 'Updated succes');
	    		}
	    		else{
	    			return redirect()->back()->with('warning', 'Update Failure');
	    		}
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
	    	$user['recipes'] =admin_model::getRecipe();
	    	if($id){
	    		$user['datalist'] =admin_model::getProduct($id);
	    		$user['datalist']->parent_id;
	    		$user['parent'] =admin_model::getCategory($user['datalist']->parent_id);
	    		if(!empty($user['datalist']->recipe)){
					foreach (json_decode($user['datalist']->recipe) as $value) {

				          $user['selrecipes'][] = admin_model::getRecipe(number_format($value));
				        
				      }
			  	}
			    else{
			    	 $user['selrecipes'] =null;
			    }  
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
	    	 	$cat['s_price'] = Request::post('s_price');
	    	 	$cat['b_price'] = Request::post('b_price');
	    	 	$cat['parent_id'] = Request::post('parent_id');
	    	 	$cat['information'] = Request::post('information');
	    	 	$cat['short_descrip'] = Request::post('short_descrip');
	    	 	$cat['description'] = Request::post('description');
	    	 	$cat['status'] = Request::post('status');
	    	 	$cat['updated_at'] = date('y-m-d h:i:s');
	    	 	$cat['recipe'] = json_encode( Request::post('recipe'));

	    	 	//Image Checking while uploading 
			 	 if (Request::hasFile('image'))
		          {
		              $file = Request::file('image');
		              $path = public_path().'/products';
		              if(!File::isDirectory($path)){
		                File::makeDirectory($path, 0755, true, true);
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

     //Order delete  
    public function OrderDelete($id)
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    		$delete =admin_model::OrderDelete($id);
	    		if($delete){
	    			return redirect()->back()->with('success', 'Updated succes');
	    		}
	    		else{
	    			return redirect()->back()->with('warning', 'Update Failure');
	    		}
	    	}
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }
    //Order 
	public function OrderAdd($id ='')
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	echo view('admin/inc/header');
	    	$user['order']=admin_model::getOrders($id);
	    	echo view('admin/orderinvoice',$user);
	    	
    	  echo view('admin/inc/footer');
	    }
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }

    public function OrderInsert(Request $request)
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    		$cat['name'] = Request::post('name');
	    	 	$cat['meta'] = Request::post('meta');
	    	 	$cat['s_price'] = Request::post('s_price');
	    	 	$cat['b_price'] = Request::post('b_price');
	    	 	$cat['parent_id'] = Request::post('parent_id');
	    	 	$cat['information'] = Request::post('information');
	    	 	$cat['short_descrip'] = Request::post('short_descrip');
	    	 	$cat['description'] = Request::post('description');
	    	 	$cat['status'] = Request::post('status');
	    	 	$cat['updated_at'] = date('y-m-d h:i:s');
	    	 	$cat['recipe'] = json_encode( Request::post('recipe'));

	    	 	//Image Checking while uploading 
			 	 if (Request::hasFile('image'))
		          {
		              $file = Request::file('image');
		              $path = public_path().'/products';
		              if(!File::isDirectory($path)){
		                File::makeDirectory($path, 0755, true, true);
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
	



    //Coupon view  
    public function Coupon()
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	$user['coupons'] =admin_model::getCoupon();
	      echo view('admin/inc/header');
	      echo view('admin/coupon',$user);
	      echo view('admin/inc/footer');
	    	}
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }

    
     //Order delete  
    public function CouponDelete($id)
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    		$delete =admin_model::CouponDelete($id);
	    		if($delete){
	    			return redirect()->back()->with('success', 'Updated succes');
	    		}
	    		else{
	    			return redirect()->back()->with('warning', 'Update Failure');
	    		}
	    	}
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }
    //Order 
	public function CouponAdd($id ='')
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	echo view('admin/inc/header');
	    	if($id){
		    	$user['datalist']=admin_model::getCoupon($id);
		    	echo view('admin/couponadd',$user);
	    	}
	    	else{
		    	echo view('admin/couponadd',$user);

	    	}
    	  echo view('admin/inc/footer');
	    }
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }

    public function CouponInsert(Request $request)
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    		$cat['name'] = Request::post('name');
	    	 	$cat['description'] = Request::post('description');
	    	 	$cat['cart_min'] = Request::post('cart_min');
	    	 	$cat['cart_max'] = Request::post('cart_max');
	    	 	$cat['coupon_value'] = Request::post('coupon_value');
	    	 	$cat['date_expire'] = Request::post('date_expire');
	    	 	$cat['coupon_type'] = Request::post('coupon_type');
	    	 	$cat['status'] = Request::post('status');
	    	 	$cat['updated_at'] = date('y-m-d h:i:s');

	    	 	


	    	 if(Request::post('id')){
	    	 	$cat['id'] = Request::post('id');
	    	 	$value =admin_model::UpdateCoupon($cat);
	    	 	if ($value) {
	    	 		return redirect()->back()->with('success', 'Updated succes');
	    	 	}
	    	 	else{
	    	 		 return redirect()->back()->with('warning', 'Failed To Add!');
	    	 	}	
	    	 }
	    	 else{
	    	 	$cat['created_at'] = date('y-m-d h:i:s');
	    	 	$value =admin_model::CreateCoupon($cat);
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
	




   //Blog view  
    public function Blog()
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	$user['blogs'] =admin_model::getBlog();
	      echo view('admin/inc/header');
	      echo view('admin/blog',$user);
	      echo view('admin/inc/footer');
	    	}
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }
	//Blog delete  
    public function BlogDelete($id)
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    		$delete =admin_model::BlogDelete($id);
	    		if($delete){
	    			return redirect()->back()->with('success', 'Updated succes');
	    		}
	    		else{
	    			return redirect()->back()->with('warning', 'Update Failure');
	    		}
	    	}
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }

    //BlogAdd Add
	public function BlogAdd($id ='')
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	echo view('admin/inc/header');
	    	if($id){
	    		$user['datalist'] =admin_model::getBlog($id);
			    echo view('admin/blogadd',$user);
			  	
	    	}
	    	else{
			    echo view('admin/blogadd',$user);
	    		
	    	}
	    	  echo view('admin/inc/footer');
	    }
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }

    public function BlogInsert(Request $request)
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	 	$cat['author'] = Request::post('author');
	    	 	$cat['meta'] = Request::post('meta');
	    	 	$cat['email'] = Request::post('email');
	    	 	$cat['title'] = Request::post('title');
	    	 	$cat['subtitle'] = Request::post('subtitle');
	    	 	$cat['short_descrip'] = Request::post('short_descrip');
	    	 	$cat['description'] = Request::post('description');
	    	 	$cat['status'] = Request::post('status');
	    	 	$cat['updated_at'] = date('y-m-d h:i:s');
	    	 	//Image Checking while uploading 
			 	 if (Request::hasFile('image'))
		          {
		              $file = Request::file('image');
		              $path = public_path().'/blogs';
		              if(!File::isDirectory($path)){
		                File::makeDirectory($path, 0755, true, true);
		              }
		              $cat['image'] = Request::file('image')->getClientOriginalName();
		              Request::file('image')->move($path,$cat['image']);
		          }



	    	 if(Request::post('id')){
	    	 	$cat['id'] = Request::post('id');
	    	 	$value =admin_model::UpdateBlog($cat);
	    	 	if ($value) {
	    	 		return redirect()->back()->with('success', 'Updated succes');
	    	 	}
	    	 	else{
	    	 		 return redirect()->back()->with('warning', 'Failed To Add!');
	    	 	}	
	    	 }
	    	 else{
	    	 	$cat['created_at'] = date('y-m-d h:i:s');
	    	 	$value =admin_model::CreateBlog($cat);
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

   //Recipe view  
    public function Recipe()
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	$user['recipes'] =admin_model::getRecipe();
	      echo view('admin/inc/header');
	      echo view('admin/recipe',$user);
	      echo view('admin/inc/footer');
	    	}
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }
	//Recipe delete  
    public function RecipeDelete($id)
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    		$delete =admin_model::RecipeDelete($id);
	    		if($delete){
	    			return redirect()->back()->with('success', 'Updated succes');
	    		}
	    		else{
	    			return redirect()->back()->with('warning', 'Update Failure');
	    		}
	    	}
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }

    //BlogAdd Add
	public function RecipeAdd($id ='')
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	echo view('admin/inc/header');
	    	if($id){
	    		$user['datalist'] =admin_model::getRecipe($id);
			    echo view('admin/recipeadd',$user);
			  	
	    	}
	    	else{
			    echo view('admin/recipeadd',$user);
	    		
	    	}
	    	  echo view('admin/inc/footer');
	    }
	    else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    }

    public function RecipeInsert(Request $request)
    {
    	$user['user'] = session()->get('admin_session');
	    if ($user['user']) {
	    	 	$cat['title'] = Request::post('title');
	    	 	$cat['description'] = Request::post('description');
	    	 	$cat['ingredient'] = Request::post('ingredient');
	    	 	$cat['status'] = Request::post('status');
	    	 	$cat['updated_at'] = date('y-m-d h:i:s');
	    	 	//Image Checking while uploading 
			 	 if (Request::hasFile('image'))
		          {
		              $file = Request::file('image');
		              $path = public_path().'/recipes';
		              if(!File::isDirectory($path)){
		                File::makeDirectory($path, 0755, true, true);
		              }
		              $cat['image'] = Request::file('image')->getClientOriginalName();
		              Request::file('image')->move($path,$cat['image']);
		          }



	    	 if(Request::post('id')){
	    	 	$cat['id'] = Request::post('id');
	    	 	$value =admin_model::UpdateRecipe($cat);
	    	 	if ($value) {
	    	 		return redirect()->back()->with('success', 'Updated succes');
	    	 	}
	    	 	else{
	    	 		 return redirect()->back()->with('warning', 'Failed To Add!');
	    	 	}	
	    	 }
	    	 else{
	    	 	$cat['created_at'] = date('y-m-d h:i:s');
	    	 	$value =admin_model::CreateRecipe($cat);
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

   public function PrintThermaal($id)
    {
		$user['user'] = session()->get('admin_session');
	    if ($user['user']) {

    	$order=admin_model::getOrders($id);
    	  $cart =json_decode($order->order_cart,true);
         $client = json_decode($order->orderdetail,true);
         $clientLocation = json_decode($client['loc'],true);

        
         // Set params
        $cin = 'U15490DL2020PTC367249';
        $gst = '07AAECF1671R1Z5';
        $store_name = 'M/S Fast O Fresh Pvt Ltd,';
        $store_address = ' B-155, Ghazipur, New Delhi 110096';
        $store_phone = '1234567890';
        $store_email = 'yourmart@email.com';
        $store_website = 'yourmart.com';
        $tax_percentage = 0;
        $transaction_id = $order->transactionid;

        // Set items
        $i=0;
        foreach ($cart as $key => $value) {
            $items[$i]['name'] =$value['name'];
            $items[$i]['qty'] =$value['quantity'];
            $items[$i]['price'] =$value['price'];
            if($value['parent_id']==4){
                $items[$i]['gst'] =($value['price'] - ($value['price']*(100/(100+12) )));
            }
            elseif($value['parent_id']==5){
                $items[$i]['gst'] =($value['price'] - ($value['price']*(100/(100+12) )));
            }
            else{
                $items[$i]['gst'] =0;
            }
            $i++;
        }
        
        // Init printer
        $printer = new ReceiptPrinter;
        $printer->init(
            config('receiptprinter.connector_type'),
            config('receiptprinter.connector_descriptor')
        );

        // Set Client Info
        $printer->SetClient($order->orderamount,$client['ship'],$clientLocation['addressline1'],$clientLocation['landmark'],$clientLocation['city'],$clientLocation['postalcode'],$clientLocation['mobile'],$clientLocation['username'],$clientLocation['email'],$client['method'],$client['slottime'],date('Ymdhis',strtotime($order->created_at)));

        // Set store info
        $printer->setStore($cin,$gst, $store_name, $store_address, $store_phone, $store_email, $store_website);

        // Add items
        foreach ($items as $item) {
            $printer->addItem(
                $item['name'],
                $item['qty'],
                $item['price'],
                $item['gst']
            );
        }


        // Set tax
        $printer->setTax($tax_percentage);

        // Calculate total
        $printer->calculateSubTotal();
        $printer->calculateGrandTotal();

        // Set transaction ID
        $printer->setTransactionID($transaction_id);

      
        //Set Payment method and slot
    
        // Set qr code
        $printer->setQRcode([
            'txnid' => $transaction_id,

        ]);

        // Print receipt
        $printer->printReceipt();
      	return redirect()->back()->with('success', 'Print succes');

      	}else{
	       session()->flash('warning', 'Access Denied');
	      return redirect('laravel-admin');
	    }
    } 

    
}
