<?php
$json_string =    file_get_contents("locationpin.json");
$parsed_json = json_decode($json_string, true);
?>
<header class="stick">
            <div class="topbar" >
                <div class="container">
                    <div class="select-wrp">
                        <form action="{{url('')}}/pincode/saved" method="post" style="display: flex;color: #fff !important">
                            @csrf
                            <i class="fa fa-map-marker" style="margin-top: 6px; padding: 10px;"></i>
                            <select data-placeholder="Feel Like Eating" name="pinlocation" onchange="this.form.submit()">
                            @if(!empty(session()->get('pinlocation')))
                            <option selected="" value="{{session()->get('pinlocation')}}" >
                               {{session()->get('pinlocation')}}</option>
                            @else
                            <option>Check Delivery  Availabilty </option>

                            @endif
                            @foreach($parsed_json as $key =>$value)
                            
                                @foreach($value as $meg =>$locdetail)
                                    <option value="{{($locdetail['Area'])}}, {{($locdetail['Pincode'])}}">{{($locdetail['Area'])}}, {{($locdetail['Pincode'])}}</option>
 
                                @endforeach 
                               
                            @endforeach

                        </select>
                        </form>
                    </div>
                    <!-- <div class="select-wrp">
                         <form action="{{url('')}}/location/saved" method="post">
                            @csrf
                          <select data-placeholder="Choose Location" name="weblocation" onchange="this.form.submit()">
                            @if(!empty(session()->get('location')))
                            <option selected="" value="{{session()->get('location')}}" >{{session()->get('location')}}</option>
                            @else
                            <option>Select Your Location </option>
                            @endif
                            <option value="Ghaziabad">Ghaziabad </option>
                            <option value="Noida">Noida </option>
                            <option value="East Delhi">East Delhi </option>

                          </select>
                        </form>
                    </div> -->
                    <div class="d-flex select-wrp " style="color: #fff;display: inline-flex; ">
                      <div class="d-flex p-2 bd-highlight">
                            <form  action="{{url('')}}/search" method="post" style="display: inline-flex; width: 200%; margin-top: 5px;">
                                @csrf
                                <input class="form-control" id="search_text" type="text" name="product" placeholder="Decided what to cook?"  list="browsers" width="100px" required="">
                                   <datalist class="searchspecial" id="browsers">
                               
                                      </datalist>
                                <button class="btn btn-danger" style="background: #ebe530; color: #800000;  margin-left: 10px;border: none;" type="submit"><i class="fa fa-search"></i></button>
                                
                            
                             </form>
                            
                        </div>
                        
                    </div>
                    <div class="topbar-register">
                        @if(!empty(session()->get('user_session')))
                            <a href="{{url('/dashboard')}}">Hi, {{(session()->get('user_session'))->name}}
                                (MyAccount)
                            </a>
                        @else
                        <a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a>
                        @endif
                    </div>
                    <div class="social1">
                         <a href="{{url('cart')}}" title="Cart" itemprop="url"  style="font-size: 20px;margin-right: 10px;margin-top: -1px"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                            <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
                                <script>
                                    $(document).ready(
                                            function() {
                                                setInterval(function() {
                                                        $.ajax({
                                                        url: SITEURL + '/cartquant',
                                                        type: 'get',
                                                        success: function (msg) {
                                                             $('#show').text(msg);
                                                        },
                                                        error: function (error) {

                                                        }

                                                        });

                                                   
                                                }, 1000);
                                            });
                                </script>

                              
                                        
                                        <sup id="show"></sup>
                                        <span style="font-size: 16px"> Cart</span>
                                        </a>
                     
                        <a href="https://www.facebook.com/fastofreshfoods/" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://www.instagram.com/fastofreshfoods/" title="Instagram" itemprop="url" target="_blank"><i class="fa fa-instagram"></i></a>
                        <!-- <a href="https://www.linkedin.com/company/71600846/admin/" title="Instagram" itemprop="url" target="_blank"><i class="fa fa-linkedin"></i></a> -->
                           <a href="https://twitter.com/fastofreshfoods" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div >
                        
                    </div>
                </div>                
            </div><!-- Topbar -->
            <div class="logo-menu-sec">
                <div class="container">
                    <div class="logo"><h1 itemprop="headline"><a href="<?=URL::to('/');?>" title="Home" itemprop="url"><img src="{{ url('assets/images/logo2.png') }}" alt="logo.png" itemprop="image"></a></h1></div>
                    <nav>
                        <div class="menu-sec">
                            <style type="text/css">
                               .menumom{
                                margin-right: 15px
                                padding-right: 0px;
                                font-size: 15px;
                                width: 110px;
                                padding: 5px;
                                border-radius: 10px
                               }
                               .menumom img{
                                 padding: 5px
                               }
                            </style>
                            <ul>
                                   <?php $i=0.0;?>
                                    @foreach($categories as $category)
                                    <li class="wow  bounceIn menumom " data-wow-delay="{{$i +=0.1}}s" style="" >
                                        <div class="imag" style="">
                                        <a class="" href="{{url('')}}/category/{{$category->name}}" title="{{$category->name}}" itemprop="url"><img src="{{url('')}}/categories/{{$category->image}}" alt="{{$category->image}}" itemprop="image">
                                             <div class="text-center">{{$category->name}}</div>
                                        </a>
                                        </div>
                                    </li>
                                    @endforeach
                                <li class="menu-item-has-children">
                                      
                                </li>

                               

                            </ul>
                                                        

                        </div>
                    </nav><!-- Navigation -->
                </div>
            </div><!-- Logo Menu Section -->
        </header><!-- Header -->

        <div class="responsive-header">
            <div class="responsive-topbar">
                 <div class="select-wrp" style="width:100% !important ;text-align-last:center;">
                         <form action="{{url('')}}/pincode/saved" method="post" style="display: flex;color: #fff !important">
                            @csrf
                            <i class="fa fa-map-marker" style="margin-top: 1px; padding: 10px;"></i>
                            <select data-placeholder="Feel Like Eating" style="width: 100%;background:black;" name="pinlocation" onchange="this.form.submit()">
                            @if(!empty(session()->get('pinlocation')))
                            <option selected="" value="{{session()->get('pinlocation')}}" >
                               {{session()->get('pinlocation')}}</option>
                            @else
                            <option>Check Delivery  Availabilty </option>

                            @endif
                            @foreach($parsed_json as $key =>$value)
                            
                                @foreach($value as $meg =>$locdetail)
                                    <option value="{{($locdetail['Area'])}}, {{($locdetail['Pincode'])}}">{{($locdetail['Area'])}}, {{($locdetail['Pincode'])}}</option>
 
                                @endforeach 
                               
                            @endforeach

                        </select>
                        </form>
                        
                    </div>
               
            </div>
            <div class="responsive-topbar">
                <div class="text-center">
                            <a href="{{url('cart')}}" title="Cart" itemprop="url"  style="color:white;font-size: 20px;margin-top: -1px"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                        <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.1.min.js"></script>
                                <script>
                                    $(document).ready(
                                            function() {
                                                setInterval(function() {
                                                        $.ajax({
                                                        url: SITEURL + '/cartquant',
                                                        type: 'get',
                                                        success: function (msg) {
                                                             $('#showm').text(msg);
                                                        },
                                                        error: function (error) {

                                                        }

                                                        });

                                                   
                                                }, 1000);
                                            });
                                </script>

                              
                                        
                                        <sup id="showm"></sup>
                                        <span style="font-size: 16px"> Cart</span>
                                        </a>
                        </div>
            </div>
            <div class="responsive-logomenu">
                <div class="logo"><h1 itemprop="headline"><a href="<?=URL::to('/');?>" title="Home" itemprop="url"><img src="{{ url('assets/images/logo2.png') }}" alt="logo.png" itemprop="image"></a></h1></div>

                <span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
            </div>
            <div class="responsive-menu">
                <span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
                <div class="menu-lst">
                    <ul>
                        <li>
                            <form class="form-group"  action="{{url('')}}/search" method="post" >
                                @csrf
                                <div class="form-group">
                                     <input class="form-control" id="search_text" type="text" name="product" placeholder="Decided what to cook?"  list="browsers" width="100px">
                                   <datalist class="searchspecial" id="browsers">
                               
                                      </datalist>
                                </div>
                                <div class="form-group">
                                    
                                <button class="btn btn-lg btn-default" style="background: #ebe530; color: #800000;  margin-left: 10px;border: none;" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                                
                            
                             </form>
                        </li>

                                    @foreach($categories as $category)
                                    <li>
                                        
                                        <a class="" href="{{url('')}}/category/{{$category->name}}" title="{{$category->name}}" >
                                             {{$category->name}}
                                        </a>
                                    </li>
                                    @endforeach
                    
                        <li>
                             @if(!empty(session()->get('user_session')))
                            <a href="{{url('/dashboard')}}">Hi, {{(session()->get('user_session'))->name}}
                                (MyAccount)
                            </a>
                            @else
                            <a class="log-popup-btn" href="#" title="Login" itemprop="url">Login</a>
                            @endif
                        </li>

                            </ul>
                                                        
                </div>
                <div class="topbar-register">
                    
                </div>
              
               
            </div><!-- Responsive Menu -->
        </div><!-- Responsive Header -->