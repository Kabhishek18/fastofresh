 @include('../status')
<div class="bread-crumbs-wrapper">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>

        <section>
            <div class=" gray-bg">
                <div class="sec-box bottom-padd140">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="dashboard-tabs-wrapper">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 col-lg-4">
                                            <div class="profile-sidebar brd-rd5 wow fadeIn" data-wow-delay="0.2s">
                                                <div class="profile-sidebar-inner brd-rd5">
                                                    <div class="user-info red-bg">

                                                     @if($user->avatar)
                                                   <img class="brd-rd50" src="{{url('profileimages')}}/{{$user->id}}/{{$user->avatar}}" alt="user-avatar.jpg" itemprop="image" width= 76px;>
                                                    @else
                                                    <img class="brd-rd50" src="{{url('')}}/profileimages/1/download.jpeg" alt="user-avatar.jpg" itemprop="image" width= 76px;>
                                                    @endif
                                                        <div class="user-info-inner">
                                                            <h5 itemprop="headline"><a href="#" title="" itemprop="url">{{$user->name}}</a></h5>
                                                            <span><a href="#" title="" itemprop="url">{{$user->email}}</a></span>
                                                            <a class="brd-rd3 sign-out-btn yellow-bg" href="{{url('logout')}}" title="" itemprop="url"><i class="fa fa-sign-out"></i> SIGN OUT</a>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#my-dashboard" data-toggle="tab"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                                        <li ><a href="#my-orders" data-toggle="tab"><i class="fa fa-shopping-basket"></i> MY ORDERS</a></li>
                                                        <!-- <li><a href="#my-wallet" data-toggle="tab"><i class="fa fa-money"></i> MY WALLET</a></li> -->
                                                        <li><a href="#my-location" data-toggle="tab"><i class="fa fa-money"></i> MY LOCATION</a></li>
                                                        <li><a href="#account-settings" data-toggle="tab"><i class="fa fa-cog"></i> ACCOUNT SETTINGS</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12 col-lg-8">
                                            <div class="tab-content">

                                                <div class="tab-pane fade in active" id="my-dashboard">
                                                    <div class="tabs-wrp brd-rd5">
                                                        <h4 itemprop="headline">Dashboard</h4>
                                                       <br>
                                                      
                                                      <div class="order-list">
                                                            <div class="order-item card">
                                                              <div class="card-header" style="padding: 15px;">
                                                                <h5>Welcome <strong>{{$user->name}}</strong>,</h5>
                                                              </div>
                                                              <div class="card-body">
                                                               
                                                              </div>
                                                              <div class="card-foot">
                                                                   
                                                              </div>
                                                            </div> 
                                                          
                                                      </div>    
                                                    </div>
                                                </div> 
                                                <div class="tab-pane" id="my-location">
                                                    <div class="tabs-wrp my-location brd-rd5">
                                                        <h4 itemprop="headline">MY LOCATIONS</h4>
                                                         <br>
                                                          <?php $i=1;?>
                                                          @if(!empty($locations))
                                                           @foreach($locations as $location) 
                                                            <div class="order-list">
                                                                <div class="order-item card">
                                                                  <div class="card-header" style="padding: 15px;">
                                                                    <h5><strong>Saved Address</strong></h5>
                                                                  </div>
                                                                  <div class="card-body">
                                                                    <?php $address =json_decode($location->location,true);?>
                                                                    <p class="card-text">{{$address['addressline1']}},{{$address['landmark']}},</p>
                                                                   <p class="card-text">{{$address['city']}},{{$address['postalcode']}}</p>
                                                                  </div>
                                                                  <div class="card-foot">
                                                                       <a href="{{url('dashboard/locationremove/'.$location->id)}}" class="btn btn-danger"><i class="fa fa-remove"></i>Remove</a>
                                                                  </div>
                                                                </div> 
                                                            </div>      
                                                            @endforeach 
                                                          @endif
                                                    </div>
                                                </div>  
                                                <div class="tab-pane " id="account-settings">
                                                    <div class="tabs-wrp account-settings brd-rd5">
                                                        <h4 itemprop="headline">ACCOUNT SETTINGS</h4>
                                                        <div class="account-settings-inner">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-lg-4">
                                                                    <div class="profile-info text-center">
                                                                        <div class="profile-thumb brd-rd50">
                                                                            @if($user->avatar)
                                                                            <img id="profile-display" src="{{url('profileimages')}}/{{$user->id}}/{{$user->avatar}}" alt="profile-img.jpg" itemprop="image">
                                                                            @else
                                                                            <img id="profile-display" src="{{url('')}}/profileimages/1/download.jpeg" alt="profile-img.jpg" itemprop="image">
                                                                            @endif
                                                                        </div>
                                                                     <form method="Post" action="{{url('dashboard/profileimageupload')}}" enctype="multipart/form-data">  
                                                                        @csrf  
                                                                        <div class="profile-img-upload-btn">
                                                                            <label class="fileContainer brd-rd5 yellow-bg">
                                                                                UPLOAD PICTURE
                                                                                <input id="profile-upload" type="file" name="image"  />
                                                                            </label>
                                                                            <div><button class="btn" type="submit">Upload </button></div>  
                                                                        </div>
                                                                    </form>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8 col-sm-8 col-lg-8">
                                                                    <div class="profile-info-form-wrap">
                                                                        <form class="profile-info-form">
                                                                            <div class="row mrg20">
                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <label>Name <sup>*</sup></label>
                                                                                    <input class="brd-rd3" type="text" placeholder="Enter Your Name" value="{{$user->name}}">
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <label>Email Address <sup>*</sup></label>
                                                                                    <input class="brd-rd3" type="email" placeholder="Enter Your Email Address" disabled="" value="{{$user->email}}">
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <label>Phone No <sup>*</sup></label>
                                                                                    <input class="brd-rd3" type="text" placeholder="Enter Your Phone No" disabled="" value="{{$user->mobile}}">
                                                                                </div>
                                                                            </div>
                                                                        </form>  
                                                                        <hr>
                                                                        <form class="profile-info-form" method="post" action="{{url('dashboard/changepassword')}}">
                                                                            @csrf
                                                                            <div class="col-md-12 col-sm-6 col-lg-6">
                                                                                <label>Password <sup class="text-danger">*</sup></label>
                                                                                <input class="brd-rd3" type="text" name="password" required="">
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-6 col-lg-6">
                                                                                <label>Confirm Password <sup class="text-danger">*</sup></label>
                                                                                <input class="brd-rd3" type="text" name="cpassword" required="">
                                                                            </div>
                                                                            <div>
                                                                                <input type="submit" class="btn btn-success" name=""value="Update Password" style="color: white">
                                                                            </div>
                                                                        </form>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane " id="my-orders">
                                                    <div class="tabs-wrp my-orders  brd-rd5 ">
                                                        <h4 itemprop="headline">MY ORDERS</h4>
                                                        <div class="order-list">
                                                            @if(!empty($orders))
                                                            @foreach($orders as $order)
                                                            <div class="order-item brd-rd5">
                                                              
                                                                <div class="order-info">


                                                                    <span class="red-clr">{{date('F d y H:i A',strtotime($order->created_at))}}</span>
                                                                    <?php $cart = json_decode($order->order_cart,true
                                                                        );
                                                                        $total =''
                                                                        ?>

                                                                    <div class="row">
                                                                        @foreach($cart as $item)
                                                                        <div class="col-md-12"> 
                                                                            <table class="table">
                                                                                <tr>
                                                                                    <td><h4 class="text-info">{{$item['name']}}</h4>
                                                                                       <h5>Price : {{$item['price']}} </h5> 
                                                                                    </td>
                                                                                    <td style="float: right;"> <img src="{{url('')}}/products/{{$item['photo']}}" width="100px"></td>
                                                                                </tr>
                                                                              <!--   <tr>
                                                                                    <td><span >₹ {{$item['price']}} X {{$item['quantity']}}</span>= ₹ {{$item['price'] * $item['quantity']}}</span></td>
                                                                                </tr> -->
                                                                            </table>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="row" style="padding: 10px;align-content: center;">
                                                                       <div class="col-md-6">
                                                                          <span class="price">Grand Total : ₹ {{$order->orderamount}}</span>
                                                                       </div>
                                                                        <div class="col-md-6 text-center">
                                                                        @if($order->status =='cancelled')
                                                                       
                                                                           <span class="btn btn-default " style="text-transform: capitalize;float: right;background:#face82; color: #800000">{{$order->status}}</span>
                                                                        @else
                                                                        <span class="btn btn-default  " style="text-transform: capitalize;background: #800000;color:#face82">{{$order->status}}</span>
                                                                        @endif
                                                                         </div>
                                                                        @if($order->status =='cancelled' OR $order->status =='dispatched' OR $order->status =='delivered'  )
                                                                        @else
                                                                       
                                                                        <div class="col-md-12" style="margin-top: 10px ">
                                                                          
                                                                            <!-- cancel -->

                                                                               <div class="col-md-6" style="padding: 10px">
                                                                                    <div class="btn btn-danger" data-toggle="modal" data-target="#GSCCModal"><i class="fa fa-remove"></i> Cancel Order</div>
                                                                               </div>
                                                                            <form method="post" action="{{url('')}}/cancelorder">
                                                                                    <input type="hidden" value="{{$order->id}}" name="id">
                                                                                <div id="GSCCModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                 <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                      <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
                                                                                        <h4 class="modal-title" id="myModalLabel">Your Order #{{date('Ymdhis')}}</h4>
                                                                                      </div>
                                                                                      <div class="modal-body">
                                                                                        
                                                                                        <div class="column-wrapper"><div class="options-wrapper">
                                                                                            <div class="options-header">Please select your reason for cancellation</div>
                                                                                            <div class="options"><div class="reason">
                                                                                              <div>
                                                                                                  <input class="radio-custom form-group" name="cancellation_reasons" type="radio" id="radio_0" value="I changed my mind" checked>
                                                                                                  <label for="radio_0" class="radio-custom-label" >I changed my mind</label>
                                                                                              </div>
                                                                                            </div><div class="reason">
                                                                                              <div>
                                                                                                  <input class="radio-custom" name="cancellation_reasons" type="radio" id="radio_1" value="I chose the wrong address">
                                                                                                  <label for="radio_1" class="radio-custom-label">I chose the wrong address</label>
                                                                                              </div>
                                                                                            </div><div class="reason">
                                                                                              <div>
                                                                                                  <input class="radio-custom" name="cancellation_reasons" type="radio" id="radio_2" value="I forgot to add/remove a product">
                                                                                                  <label for="radio_2" class="radio-custom-label">I forgot to add/remove a product</label>
                                                                                              </div>
                                                                                            </div><div class="reason">
                                                                                              <div>
                                                                                                  <input class="radio-custom" name="cancellation_reasons" type="radio" id="radio_3" value="I forgot to apply a coupon">
                                                                                                  <label for="radio_3" class="radio-custom-label">I forgot to apply a coupon</label>
                                                                                              </div>
                                                                                            </div><div class="reason">
                                                                                              <div>
                                                                                                  <input class="radio-custom" name="cancellation_reasons" type="radio" id="radio_4" value="My order is delayed">
                                                                                                  <label for="radio_4" class="radio-custom-label">My order is delayed</label>
                                                                                              </div>
                                                                                            </div><div class="reason">
                                                                                              <div>
                                                                                                  <input class="radio-custom" name="cancellation_reasons" type="radio" id="radio_5" value="Others">
                                                                                                  <label for="radio_5" class="radio-custom-label">Others *</label>

                                                                                              </div>
                                                                                                  <textarea class="form-control" name="cancellation_reasons" for="radio_5"></textarea> 
                                                                                            </div></div></div>
                                                                                                  <div class="bottom-msg-wrapper">
                                                                                                    *The refund amount from your order cancellation will be credited to your source account.
                                                                                                  </div></div>
                                                                                                                                                                          </div>
                                                                                      <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-danger" style="background:#800000">Cancel Order</button>
                                                                                      </div>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                            </form>
                                                                            <!-- cancel -->
                                                                            <!-- View Order Detail -->
                                                                            <div class="col-md-6 text-center" style="padding: 10px">
                                                                                
                                                                                <a href="{{url('')}}/invoice/{{$order->id}}" class="btn btn-default" style="background: #face82;color: #800000">Download Inovice</a>
                                                                            </div>
                                                                            <!-- View Order Details -->

                                                                        </div>
                                                                         @endif
                                                                    </div>
                                                                    
                                                                   
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                            @endif
                                                        </div>
                                                       
                                                    </div>
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