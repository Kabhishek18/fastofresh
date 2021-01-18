<style type="text/css">
    
.card-input-element {
    display: none;
}

.card-input {
    margin: 10px;
    padding: 00px;
}

.card-input:hover {
    cursor: pointer;
}

.card-input-element:checked + .card-input {
     box-shadow: 0 0 1px 1px #2ecc71;
 }


</style>       
        <section>
            <div class="gray-bg">
            @include('../status')
                <div class="sec-box">
                    <div class="container">
                        <div class="row">
                            <div class="title2-wrapper" >
                            <h1 itemprop="headline">Checkout</h1>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                            
                                <div class="sec-wrapper">
                                    <div class="row">
                                         <form class="form-group" method="post" action="{{url('payment')}}">
                                            @csrf
                                        <div class="col-md-8 col-sm-12 col-lg-8">
                                            <div class="restaurant-detail-wrapper">
                                
                                                
                                              <div id="hidelocation">
                                                <?php $i=1;?>
                                                   @foreach($locations as $location)
                                                    <div class="col-md-4 col-lg-4 col-sm-4">
                                                        
                                                        <label>
                                                            <?php $loc = json_decode($location->location,true)?>
                                                          <input type="radio" name="loc" class="card-input-element" value="{{$location->location}}" />

                                                            <div class="panel panel-default card-input">
                                                              <div class="panel-heading">Location {{$i++}}</div>
                                                              <div class="panel-body">
                                                               <p>{{$loc['addressline1']}}</p> 
                                                               <p>{{$loc['city']}},{{$loc['postalcode']}}</p>
                                                               <p><strong>({{$loc['landmark']}})</strong></p>
                                                              </div>
                                                            </div>

                                                        </label>
                                                    </div>
                                                    @endforeach
                                              </div>
                                                   
                                                  

                                
                                                <div class="col-md-12 col-sm-12 ">
                                                    <div class="form-check" >
                                                      <input class="form-check-input" type="checkbox" name="locationadd" id="locationcheck" value="work" style="display: contents;">
                                                      <label class="form-check-label" for="locationcheck" style="font-size: x-large">
                                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>  <i class="fa fa-map-marker" aria-hidden="true"></i> <u>Add New Location </u>
                                                      </label>
                                                    </div>
                                                </div>
                                                <div id="filllocation">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Flat no / Building name / Street name <span class="text-danger">*</span></label>
                                                            <textarea class="form-control" name="addressline1" placeholder="Address line 1"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Landmark  (Optional)</label>
                                                            <textarea class="form-control" name="landmark" placeholder="landmark"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>City <span class="text-danger">*</span></label>
                                                             <input type="text" name="city" class="form-control" placeholder="City">   
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Postal Code<span class="text-danger">*</span></label>
                                                             <input type="text" name="postalcode" class="form-control" placeholder="Postal Code">   
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Mobile Number <span class="text-danger">*</span></label>
                                                             <input type="text" name="mobile" class="form-control" placeholder="Mobile Number">   
                                                        </div>
                                                    </div>
                                                 
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <h4><u>Check You Time Slots</u></h4>
                                                     <div class="col-md-4 col-lg-4 col-sm-4">
                                                        <?php $date =date('y-m-d H:i:s');
                                                        $deliverytime = new DateTime($date);
                                                         $hour = $deliverytime->format('H');
                                                        
                                                         if ($hour < 11 ) { ?>
                                                            <input type="radio" name="loc" class="card-input-element" value="" />

                                                            <div class="panel panel-default card-input">
                                                              <div class="panel-heading">Slot 1 </div>
                                                              <div class="panel-body">
                                                               <p>7:30 AM</p> 
                                                              </div>
                                                            </div>
                                                        <?php } if ($hour < 15 ) { ?>
                                                            <input type="radio" name="loc" class="card-input-element" value="" />

                                                            <div class="panel panel-default card-input">
                                                              <div class="panel-heading">Slot 2 </div>
                                                              <div class="panel-body">
                                                               <p>7:30 AM</p> 
                                                              </div>
                                                            </div>
                                                        <?php } if ($hour < 18 ) { ?>
                                                            <input type="radio" name="loc" class="card-input-element" value="" />

                                                            <div class="panel panel-default card-input">
                                                              <div class="panel-heading">Slot 3 </div>
                                                              <div class="panel-body">
                                                               <p>7:30 AM</p> 
                                                              </div>
                                                            </div>
                                                        <?php } if ($hour < 22 ) { ?>
                                                            <input type="radio" name="loc" class="card-input-element" value="" />

                                                            <div class="panel panel-default card-input">
                                                              <div class="panel-heading">Slot 4 </div>
                                                              <div class="panel-body">
                                                               <p>7:30 AM</p> 
                                                              </div>
                                                            </div>        
                                                         <?php } ?>
                                                        <label>
                                                         

                                                        </label>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-lg-4">
                                            <div class="order-wrapper wow fadeIn" data-wow-delay="0.2s">
                                                <div class="order-inner gradient-brd">
                                                    <h4 itemprop="headline">Your Order</h4>
                                                    <div class="order-list-wrapper">
                                                        <ul class="order-list-inner">
                                                        <?php $cart = session()->get('cart');
                                                        ?>
                                                        <?php $i =1;$total = 0 ;?>
                                                        @foreach($cart as $id => $details)
                                                        <?php $total += $details['price'] * $details['quantity'] ?>
                                                            <li>
                                                                <div class="dish-name">
                                                                    <i>1.</i> <h6 itemprop="headline">{{ $details['name'] }}  X ({{$details['quantity'] }})</h6> <span class="price">₹ {{ $details['price'] }}</span>
                                                                </div>
                                                               
                                                            </li>
                                                        @endforeach
                                                        </ul>
                                                        <ul class="order-total">
                                                            @if($total<499)
                                                            <li><span>Delivery </span> <i> 
                                                                 <?php $ship =30; $total += $ship?> ₹{{$ship}} 
                                                                </i>  </li>
                                                            @endif    
                                                            <li><span>Total</span> <i>₹  {{ $total }}</i></li>
                                                           
                                                        </ul>
                                                        <ul class="order-method brd-rd2 red-bg">
                                                            <li><span>Total</span> <span class="price">₹  {{ $total }}
                                                            <?php session()->put('total',$total);?>    
                                                            </span></li>
                                                            <li><span class="radio-box cash-popup-btn"><input type="radio" name="method" value="cash" id="pay1-1"><label for="pay1-1"><i class="fa fa-money"></i> Cash</label></span> <span class="radio-box card-popup-btn"><input type="radio" name="method" id="pay1-2"  value="online" checked><label for="pay1-2"><i class="fa fa-credit-card-alt"></i> Online</label></span></li>
                                                            <li>
                                                                <input class="btn btn-default"  type="submit" itemprop="url" value="CHECKOUT ORDER">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Section Box -->
            </div>
        </section>
     

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    
</script>
<script src="{{url('assets/js/custom.js')}}"></script>