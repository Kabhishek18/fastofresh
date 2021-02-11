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
  width: 220px;
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
  margin-left: 10px;
  margin-right: 20px;
  width: 325px;
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
  margin-left: 30px;
  width: 430px;
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
  float: right;
  margin-top: 10px;
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
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
										                                        
										<div class="invoice">
										  <?php  
										  		$orderdetails =json_decode($orderdetail,true); 
										  		$loc =json_decode($orderdetails['loc']);    				
										  		?>
										<div class="header">
										</div>
										  
										  <div class="thanks">
										  	<h2>Invoice Order</h2>
										    Please find attatched below your order invoice information for <strong>
										    	{{$loc->username}}
										    </strong>. 
										  </div>
										  
										  <div class="spacing">
										  <hr>
										  </div>
										  
										  <div class="deliver">
										<p> Delivery Details:</p>
										    {{$loc->addressline1}} <br>
										   Landmark: {{$loc->landmark}} <br>
										    {{$loc->city}} <br>
										    {{$loc->postalcode}} <br>

										  </div>

										  <div class="client">
										<p>Client Details: </p>
										<strong>Contact:</strong> {{$loc->username}}<br />
										<strong>Email:</strong> {{$loc->email}}<br />
										<strong> Contact Number: </strong> {{$loc->mobile}}<br />
										  </div>
										  
										  <div class="orderinfo">
										    <p> Order Information: </p><br>
										<strong> Order Date: </strong> {{date('F d y h:i:s A',strtotime($created_at))}} <br />
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
										  
										  <div class="ordernotes">
											
										  </div>
										  
										<div class="payment">
										<strong>Sub Total: </strong>₹  {{$total}} <br />
										@if($total<499)
                                                <?php $ship =30; $total += $ship?>
										<strong> Postage &amp; Packaging: </strong>₹ {{$ship}}<br />
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
											<a href="{{url('')}}/ccavRequestHandler" class="btn btn-lg btn-warning float-right buy_now" data-amount="{{$total}}" data-id="1">Pay Now</a> 
										</div>
										  
										  <div class="spacing">
										  <hr>
										  </div>
										  
										  <div class="note">
										    <p> PLEASE NOTE:</p><br>
										    <p>In case of any modifications made to your order, the inital delivery address will remain the same.</p>
										If any of the above information is incorrect, you must inform us as soon as possible using info@fastofresh.cpm Failure to do so will result in your order being dispatched as above. Orders are accepted up to 5pm every working day. if they arrive with Fast O Fresh Pvt. Ltd. after this time, they are considered to have arrived the next day. There may be a delay if you have opted in for a printed proof to be sent to yourself or there is a delay with your payment. We aim to notify our customers of all delays where possible. Once your order has been dispatched, you will recieve an email of estimated delivery date and tracking number if applicable. For full terms and conditions please visit fastofresh.com
										  </div>
										  
										 <div class="spacing">
										  <hr>
										  </div>
										  
										  
										  <div class="footer">
										   <!--  <p>In case of any modifications made to your order, the inital delivery address will remain the same.</p>
										If any of the above information is incorrect, you must inform us as soon as possible using info@fastofresh.cpm Failure to do so will result in your order being dispatched as above. Orders are accepted up to 5pm every working day. if they arrive with Fast O Fresh Pvt. Ltd. after this time, they are considered to have arrived the next day. There may be a delay if you have opted in for a printed proof to be sent to yourself or there is a delay with your payment. We aim to notify our customers of all delays where possible. Once your order has been dispatched, you will recieve an email of estimated delivery date and tracking number if applicable. For full terms and conditions please visit fastofresh.com
										<img alt="" src="http://FastoFresh.com" /> -->
										</div>
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

