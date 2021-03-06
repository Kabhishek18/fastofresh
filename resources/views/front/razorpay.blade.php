<style type="text/css">
	.invoice {
  margin: 0px auto;
  font-family: calibri;
  overflow: hidden;
}

.header {
  width: 100%;
}

.header img {
  width: 100%;
}

.thanks {
  width: 100%;
  text-align: center;
  font-family: calibri;
  margin-bottom: 10px;
  margin-top: 10px;
  text-transform: uppercase;
}

.thanks p {
  font-size: 25px;
  font-weight: bold;
  color: #393939;
  margin-bottom: 4px;
  letter-spacing: 3px;
  text-transform: uppercase;
}

.deliver {
  display: inline-block;
  height: 190px;
  float: left;
  line-height: 150%;
  margin-left: 10px;
  margin-right: 10px;
}

.deliver p {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 0px;
  color: #393939;
}

.client {
  display: inline-block;
  margin-right: 20px;
  height: 190px;
  float: left;
  line-height: 150%;
  padding-left: 15px;
  border-left: 1px dashed;
}

.client p {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 0px;
  color: #393939;
}

.orderinfo {
  float: left;
  line-height: 150%;
  padding-left: 15px;
  border-left: 1px dashed;
  height: 190px;
}

.orderinfo p {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 0px;
  color: #393939;
}

.spacing hr {
  width: 100%;
  margin-top: 10px;
  margin-bottom: 20px;
  display: inline-block;
  border: 1px dashed #393939;
}

.payinfo {
  width: 1070px;
  margin-top: 10px;
  display: inline-block;
  line-height: 20px;
  border: 1px solid;
  padding-bottom: 10px;
  padding-left: 10px;
  padding-right: 10px;
  border-radius: 5px;
}

.payinfo p {
  font-size: 18px;
  font-weight: bold;
  margin-top: 10px;
  margin-bottom: 5px;
  color: #393939;
  text-align: center;
}

.productinfo {
	text-align: center;
  display: inline-block;
  margin-top: 20px;
  float: left;
  width: 98.3%;
  background: #306f06;
  padding: 10px;
  margin-right: 30px;
  border-radius: 10px;
}

.productinfo p {
  margin-top: 0px;
  color: #ffffff;
  font-weight: bold;
  font-size: 18px;
  margin-bottom: 5px;
}

.productinfo table {
  width: 100%;
}

.productinfo th.name {
  width: 35%;
	text-align: center;

  background: #ffffff;
  border-radius: 5px;
  line-height: 150%;
  color: #393939;
}

.productinfo th.detail {
  width: 35%;
  background: #ffffff;
  border-radius: 5px;
  line-height: 150%;
  color: #393939;
}

.productinfo td.name {
  background: #ffffff;
  border-radius: 5px;
  line-height: 150%;
  color: #000000;
  padding: 3px;
}

.productinfo td.detail {
  background: #ffffff;
  border-radius: 5px;
  line-height: 150%;
  color: #000000;
  padding: 3px;
}

.productinfo th.qty {
  width: 5%;
  background: #ffffff;
  border-radius: 5px;
  line-height: 150%;
  color: #393939;
}

.productinfo th.cost {
  width: 10%;
  background: #ffffff;
  border-radius: 5px;
  line-height: 150%;
  color: #393939;
}

.productinfo td.qty {
  background: #ffffff;
  border-radius: 5px;
  line-height: 150%;
  color: #000000;
  padding-left: 3px;
  text-align: center;
}

.productinfo td.cost {
  background: #ffffff;
  border-radius: 5px;
  line-height: 150%;
  color: #000000;
  padding-left: 3px;
  text-align: center;
}

.ordernotes{
  display: inline-block;
  float: left;
  width: 700px;
  height: 150px;
  padding-right: 10px;
  border-right: 1px dashed;
}

.ordernotes p {
  font-size: 18px;
  margin-top: 10px;
  margin-bottom: 5px;
  font-weight: bold;
  color: #393939;
  text-transform: uppercase;
}

.payment {
  margin-top: 10px;
  margin-left: 10px;
  margin-bottom: 0px;
  display: inline-block;
  width: 365px;
  line-height: 140%;
  font-size: 12pt;
  height: 150px;
  }

.payment strong {
  color: #393939;
}

.note{
  width: 100%;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 10pt;
  text-align: center;
  margin-top: 0px;
  margin-bottom: 0px;
}

.note p {
  font-weight: bold;
  color: #393939;
  margin-top: -10px;
  margin-bottom: 5px;
  font-size: 12pt;
}

.footer{
  width: 100%;
  font-size: 10pt;
  margin-top: -10px;
}

.footer p {
  font-size: 13pt;
  font-weight: bold;
  margin-top: 0px;
  margin-bottom: 10px;
  color: #393939;
  display:inline-block;
  float: left;
  width: 100%;
}

.footer img {
  width: 100%;
  margin-top: 15px;
  position: relative;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
	

        <div class="bread-crumbs-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('')}}}" title="" itemprop="url">Home</a></li>
                    <li class="breadcrumb-item active">Checkout Page</li>
                </ol>
            </div>
        </div>

        <section>
            <div class="block less-spacing gray-bg">
                <div class="sec-box bottom-padd140">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12  col-lg-12">
                                <div class="row">
                                   
										<div class="invoice">
										  <?php  
										  		$orderdetails =json_decode($orderdetail,true); 

										  		$loc =json_decode($orderdetails['loc']);    				
										  		?>
										<div class="header">
										</div>
										  
										  <div class="thanks">
										  	<h2>Order Review</h2>
										  
										    </strong>. 
										  </div>
										  
										  <div class="spacing">
										  <hr>
										  </div>
										  
										  <div class="col-sm-12 col-md-4" style="padding: 15px;height:150px;background: #306f0614;border-radius: 12px;">
  										<h4>Delivery Details:</h4>
  										    {{$loc->addressline1}} <br>
  										   Landmark: {{$loc->landmark}} <br>
  										    {{$loc->city}} <br>
  										    {{$loc->postalcode}} <br>

										  </div>

										  <div class="col-sm-12 col-md-4" style="padding: 15px;height:150px;background: #306f0614;border-radius: 12px;">
                    <h4>Customer Details:</h4>							
										Customer Name: {{$loc->username}}<br />
										Email: {{$loc->email}}<br />
										Contact Number: {{$loc->mobile}}<br />
										  </div>
										  
										  <div class="col-sm-12 col-md-4 " style="height:150px;padding: 15px;background: #306f0614;border-radius: 12px;">
										  <h4>Order Details: </h4>  
                        Order Date:  {{date('F d y h:i:s',strtotime($created_at))}} {{date('A')}} <br />
                        Delivery Slot : {{$orderdetails['slottime']}}
										</div>
										  
										  <div class="spacing">
										  <hr>
										  </div>
										  
											<?php $cart = json_decode($order_cart,true) ?>
										  
										  <div class="productinfo">
										<p> Your order information:</p>
										<table>
										    <tbody>
										        <tr>
										        <th class="name"> Product Name </th>
										        <th class="detail"> Product Image </th>
										        <th class="qty">Qty</th>
										        <th class="cost">SubTotal</th>
										        </tr>
										        <?php $total = 0 ;?>
                                                @foreach($cart as $id => $details)
                                            	<?php $total += $details['price'] * $details['quantity'] ?>
										        <tr>
										        <td class="name">{{ $details['name'] }}</td>
										        <td class="detail"><img src="{{url('products/')}}/{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></td>
										        <td class="qty">{{$details['quantity'] }}</td>
										        <td class="cost">₹ {{ $details['price'] * $details['quantity'] }}</td>
										        </tr>
										        @endforeach
										    </tbody>
										</table>
										</div>
										  
										
										      <div class="spacing">
                      <hr>
                      </div>
                     <div class="col-md-6 text-center">
                       <a href="javascript:void(0)" class="btn btn-warning float-right buy_now" data-amount="{{$total}}" data-id="1">Pay Now</a> 
                     </div> 
										<div class="col-md-6 text-center">
										<strong>Sub Total: </strong>₹  {{$total}} <br />
										@if($total<499)
                                                <?php $ship =30; $total += $ship?>
										<strong> Shipping Fee: </strong>₹ {{$ship}}<br />
										 @endif
										@if(!empty(session()->get('coupon')))
                                        <?php $coupon =session()->get('coupon'); ?>
										<strong> Discounts ({{$coupon->name}}): </strong> 
										@if($coupon->coupon_type =='percent')
                                                           <?php $couponvalue = ($coupon->coupon_value*$total/100) ;?>
                                                           @else
                                                           <?php $couponvalue = ($coupon->coupon_value) ;?>
                                                           @endif  
                                                           <?php if($total >$couponvalue){
                                                            $total = $total - $couponvalue;
                                                               }else{$total = 0;}?>
                                                               ₹ {{$couponvalue}} 
                                                                <br />
                                          @endif                      
										<strong> Order Total: </strong> ₹  {{$total}} <br />
											
										</div>
										  
										  <div class="spacing">
										  <hr>
										  </div>
										  
			
								
										  
										  
							
										  </div>
										  



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Section Box -->
            </div>
        </section>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
	var SITEURL = '{{url('')}}';
	$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
	}); 
	$('body').on('click', '.buy_now', function(e){
	var totalAmount = '{{$total}}';
	var options = {
	"key": "rzp_live_hdIQMSB6FiWtc1",
	"amount": (totalAmount*100), // 2000 paise = INR 20
	"name": "FastoFresh",
	"description": "Payment order{{$total}}",
	"image": SITEURL+ "/assets/images/logo2.png",
	"handler": function (response){
	$.ajax({
		url: SITEURL + '/paysuccess',
		type: 'post',
		dataType: 'json',
		data: {"_token": "{{ csrf_token() }}",razorpay_payment_id: response.razorpay_payment_id ,
		totalAmount : totalAmount ,
		}, 
		success: function (msg) {
			window.location.href = SITEURL + '/thank-you';
		},
		error: function (error) {
		  	
		}

	});
	},
	"prefill": {
	"contact": '{{$loc->mobile}}',
	"email":   '{{$loc->email}}',
	},
	"theme": {
	"color": "#e03335"
	}
	};
	var rzp1 = new Razorpay(options);
	rzp1.open();
	e.preventDefault();
	});
	/*document.getElementsClass('buy_plan1').onclick = function(e){
	rzp1.open();
	e.preventDefault();
	}*/
</script>
