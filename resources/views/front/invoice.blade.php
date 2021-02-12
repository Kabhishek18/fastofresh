 <script type="text/javascript">
   var quill = new Quill('#' + uid, options);
 </script>
 <div class="content-body">
                <!-- invoice functionality start -->
                <section class="invoice-print mb-1">
                    <div class="row">

                        
                        <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
                            <button class="btn btn-primary"> <i class="feather icon-file-text"></i> Print</button>
                        </div>
                    </div>
                </section>
                <!-- invoice functionality end -->
                <!-- invoice page -->
                <section class="card invoice-page">
                    <div id="invoice-template" class="card-body">
                        <!-- Invoice Company Details -->
                        <div id="invoice-company-details" class="row">
                            <div class="col-sm-6 col-12 text-left pt-1">
                                <div class="media pt-1">
                                    <img src="{{url('')}}/assets/images/logo2.png" alt="company logo" />
                                </div>
                            </div>

                            <div class="col-sm-6 col-12 text-right">
                                <h1>Invoice</h1>
                                <div class="invoice-details mt-2">
                                    <h6>Order Id.</h6>
                                    <p>{{date('Ymdhis',strtotime($order->created_at))}}</p>
                                    <h6 class="mt-2">INVOICE DATE</h6>
                                    <p>{{date('F d y, h:i:s',strtotime($order->created_at))}}</p>
                                </div>
                            </div>
                        </div>
                        <!--/ Invoice Company Details -->
                        
                        <!-- Invoice Recipient Details -->
                        <div id="invoice-customer-details" class="row pt-2">
                            <div class="col-sm-6 col-12 text-left">
                                <h5>Recipient</h5>
                                <?php $orderdetail = json_decode($order->orderdetail, true);
                                       $location = json_decode($orderdetail['loc'],true);

                                       ?>
                                <div class="recipient-info my-2">
                                    <p><strong>Name :</strong> {{$location['username']}}</p>
                                    <p><strong>Address :</strong> {{$location['addressline1']}}</p>

                                    <p>{{$location['postalcode']}}</p>
                                      <?php $loc_part = (explode(",", $location['postalcode']))?>

                                </div>
                                <div class="recipient-contact pb-2">
                                    <p>
                                        <i class="feather icon-mail"></i>
                                        {{$location['email']}}
                                    </p>
                                    <p>
                                        <i class="feather icon-phone"></i>
                                        {{$location['mobile']}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 text-right">
                                <h5>Fast O Fresh Pvt. Ltd.</h5>
                                <div class="company-info my-2" style="margin-top: -5px !important">
                                    <p>B-155, Ghazipur,</p>
                                    <p>New Delhi,</p>
                                    <p>110096</p>
                                     <p><strong>CIN : U15490DL2020PTC367249</strong> </p>
                                    <p><STRONG> GST : 07AAECF1671R1Z5</STRONG></p>
                                </div>
                                <div class="company-contact">
                                    <p>
                                        <i class="feather icon-mail"></i>
                                        care@fastofresh.com
                                    </p>
                                    <p>
                                        <i class="feather icon-phone"></i>
                                        1800-313-8898 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/ Invoice Recipient Details -->

                        <!-- Invoice Items Details -->
                        <div id="invoice-items-details" class="pt-1 invoice-items-table">
                            <div class="row">
                                <div class="table-responsive col-12">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> DESCRIPTION</th>
                                                <th>QUANTITY</th>
                                                <th>BASE AMT</th>
                                                <th>
                                                   <div class="" style="display: flex;">
                                                    <?php
                                                    $loc_part['1'] = (int) $loc_part['1'];
                                                  ?>
                                                    @if(startsWith($loc_part['1'], "11"))
                                                       <div class="col-sm-6">
                                                        CGST (6%)
                                                     </div>
                                                     <div class="col-sm-6">
                                                        SGST (6%)
                                                     </div>
                                                   @else
                                                   
                                                    IGST (12%)
                                                   @endif
                                                   </div>
                                                 </th>
                                                <th>NET AMT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $cart =json_decode($order->order_cart,true);
                                            $total ='';?>
                                           <?php $i =1;$total = 0 ;?>
                                                @foreach($cart as $id => $details)
                                            <?php $total += $details['price'] * $details['quantity'] ?>
                                                <tr>
                                                 <td><?=$i++?></td>
                                                 <td>{{ $details['name'] }}</td>
                                                 <td>{{ $details['quantity'] }}</td>
                                                 <td> ₹ 
                                                    @if($details['parent_id'] == 4)
                                                    {{number_format($details['price'] - ($details['price'] - $details['price']*(100/(100+12))),2)}}
                                                    @elseif($details['parent_id']==5)
                                                   {{number_format($details['price'] - ($details['price'] - $details['price']*(100/(100+12))),2)}}
                                                    @else
                                                    {{($details['price'] -$details['price']*0)}}

                                                    @endif</td>
                                                 <td> 
                                                  

                                                     @if(startsWith($loc_part['1'], "11")) 
                                                     
                                                     @if($details['parent_id'] == 4)
                                                      <div style="display: flex;">
                                                       
                                                        <div class="col-sm-6 " style="padding: 15px;">
                                                            ₹ {{number_format((($details['price'] - $details['price']*(100/(100+12)))/2),2)}}
                                                        </div> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
    &nbsp;                                                   <div class="col-sm-6" style="padding: 15px;">
                                                         ₹   {{number_format((($details['price'] - $details['price']*(100/(100+12)))/2),2)}}
                                                        </div>
                                                      </div>
                                                    @elseif($details['parent_id']==5)
                                                      <div style="display: flex;">
                                                        
                                                            <div class="col-sm-6" style="padding: 15px;">
                                                                ₹ {{number_format((($details['price'] - $details['price']*(100/(100+12)))/2),2)}}
                                                            </div> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
    &nbsp;                                                  <div class="col-sm-6" style="padding: 15px;">
                                                            ₹ {{number_format((($details['price'] - $details['price']*(100/(100+12)))/2),2)}}
                                                           </div>
                                                        </div>
                                                    @else
                                                      <div style="display: flex;">
                                                        <div class="col-sm-6" style="padding: 15px;">  ₹
                                                        {{($details['price']*0)}} </div>
                                                        <div class="col-sm-6" style="padding: 15px;">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; ₹      
                                                          {{($details['price']*0)}}
                                                        </div>
                                                      </div>
                                                    @endif

                                                    @else
                                                     @if($details['parent_id'] == 4)
                                                     <div style="display: flex;">
                                                      ₹
                                                    {{number_format($details['price'] - $details['price']*(100/(100+12)),2)}}
                                                     </div>
                                                    @elseif($details['parent_id']==5)
                                                     ₹ {{number_format($details['price'] - $details['price']*(100/(100+12)),2)}}
                                                    @else
                                                      ₹ {{($details['price']*0)}}

                                                    @endif
                                                    @endif
                                                 </td>
                                                 <td>₹ {{ $details['quantity']* $details['price'] }}</td>

                                                   </tr>
                                                @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="invoice-total-details" class="invoice-total-table">
                            <div class="row">
                                <div class="col-7 offset-5">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th>SUBTOTAL</th>
                                                    <td>₹ {{$total}}</td>
                                                </tr>
                                               
                                                <tr>

                                                    <th>DISCOUNT (%)</th>
                                                    <td>₹ {{($total+$orderdetail['ship']) - $order->orderamount}}</td>
                                                </tr>
                                                 <tr>
                                                    <th>SHIPPING CHARGE</th>
                                                    <td>₹  {{empty($orderdetail['ship'])?'0':$orderdetail['ship']}}</td>
                                                </tr>
                                                <tr>
                                                    <th>GRAND TOTAL</th>
                                                    <td>₹ {{$order->orderamount}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Footer -->
                        <div id="invoice-footer" class="text-center pt-3">
                            <p>@for($i=0;$i<=45;$i++)
                                {!!'-'!!}
                               @endfor 
                            E & OE
                        @for($i=0;$i<=45;$i++)
                                {!!'-'!!}
                               @endfor 
                           </p>
                           <p><span>*</span> This is a computer generated invoice, hence signature and stamp is not required</p>
                            <p>Thank you for shopping !!</p>


                        </div>
                        <!--/ Invoice Footer -->

                    </div>
                </section>
                <!-- invoice page end -->

            </div>