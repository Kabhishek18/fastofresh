

        <div class="bread-crumbs-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    @if(Session::has('success'))
        <div class="alert alert-info">{{ Session::get('success') }}</div>
    @endif
    @if(Session::has('warning'))
        <div class="alert alert-warning">{{ Session::get('warning') }}</div>
    @endif
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
                                                        <img class="brd-rd50" src="{{url('profileimages')}}/{{$user->id}}/{{$user->avatar}}" alt="user-avatar.jpg" itemprop="image" width= 76px;>
                                                        <div class="user-info-inner">
                                                            <h5 itemprop="headline"><a href="#" title="" itemprop="url">{{$user->name}}</a></h5>
                                                            <span><a href="#" title="" itemprop="url">{{$user->email}}</a></span>
                                                            <a class="brd-rd3 sign-out-btn yellow-bg" href="{{url('logout')}}" title="" itemprop="url"><i class="fa fa-sign-out"></i> SIGN OUT</a>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs">
                                                        
                                                        <li class="active"><a href="#my-orders" data-toggle="tab"><i class="fa fa-shopping-basket"></i> MY ORDERS</a></li>
                                                        <li><a href="#my-wallet" data-toggle="tab"><i class="fa fa-money"></i> MY WALLET</a></li>
                                                        <li><a href="#my-location" data-toggle="tab"><i class="fa fa-money"></i> MY LOCATION</a></li>
                                                        <li><a href="#account-settings" data-toggle="tab"><i class="fa fa-cog"></i> ACCOUNT SETTINGS</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12 col-lg-8">
                                            <div class="tab-content">
                                                
                                                <div class="tab-pane fade in active" id="my-orders">
                                                    <div class="tabs-wrp brd-rd5">
                                                        <h4 itemprop="headline">MY ORDERS</h4>
                                                        <div class="order-list">
                                                            
                                                            @foreach($orders as $order)
                                                            <div class="order-item brd-rd5">
                                                              
                                                                <div class="order-info">
                                                                    <span class="red-clr">{{date('F d y h:i A',strtotime($order->created_at))}}</span>
                                                                    <?php $cart = json_decode($order->order_cart,true
                                                                        );?>

                                                                    <div class="row">
                                                                        @foreach($cart as $item)
                                                                        <div class="col-md-12"> 
                                                                            <table class="table">
                                                                                <tr>
                                                                                    <td><h4 class="text-info">{{$item['name']}}</h4></td>
                                                                                    <td style="float: right;"> <img src="{{url('')}}/products/{{$item['photo']}}" width="150px"></td>
                                                                                </tr>
                                                                              <!--   <tr>
                                                                                    <td><span >₹ {{$item['price']}} X {{$item['quantity']}}</span>= ₹ {{$item['price'] * $item['quantity']}}</span></td>
                                                                                </tr> -->
                                                                            </table>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <span class="price">₹ {{$order->orderamount}}</span>
                                                                    <span class="processing brd-rd3" style="text-transform: capitalize;float: right;">{{$order->status}}</span>
                                                                    
                                                                </div>
                                                            </div>
                                                            @endforeach

                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade  " id="my-location">
                                                    <div class="tabs-wrp brd-rd5">
                                                        <h4 itemprop="headline">MY LOCATIONS</h4>
                                                       <br>
                                                        <?php $i=1;?>
                                                       @foreach($locations as $location) 
                                                      <div class="order-list">
                                                            <div class="order-item card">
                                                              <div class="card-header" style="padding: 15px;
">
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
                                                    </div>
                                                </div>   
                                                <div class="tab-pane fade " id="account-settings">
                                                    <div class="tabs-wrp account-settings brd-rd5">
                                                        <h4 itemprop="headline">ACCOUNT SETTINGS</h4>
                                                        <div class="account-settings-inner">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-4 col-lg-4">
                                                                    <div class="profile-info text-center">
                                                                        <div class="profile-thumb brd-rd50">
                                                                            <img id="profile-display" src="{{url('profileimages')}}/{{$user->id}}/{{$user->avatar}}" alt="profile-img.jpg" itemprop="image">
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
                                                                                    <input class="brd-rd3" type="text" name="password">
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-6 col-lg-6">
                                                                                    <label>Confirm Password <sup class="text-danger">*</sup></label>
                                                                                    <input class="brd-rd3" type="text" name="cpassword">
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