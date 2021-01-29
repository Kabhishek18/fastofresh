<?php
$json_string =    file_get_contents("locationpin.json");
$parsed_json = json_decode($json_string, true);
?>
<header class="stick">
            <div class="topbar">
                <div class="container">
                    <div class="select-wrp">
                        <form action="{{url('')}}/pincode/saved" method="post">
                            @csrf
                        <select data-placeholder="Feel Like Eating" name="pinlocation" onchange="this.form.submit()">
                            @if(!empty(session()->get('pinlocation')))
                            <option selected="" value="{{session()->get('pinlocation')}}" >
                               Pincode : {{session()->get('pinlocation')}}</option>
                            @else
                            <option>Check Delivery  Availabilty </option>

                            @endif
                            @foreach($parsed_json as $key =>$value)
                            
                                @foreach($value as $meg =>$locdetail)
                                    <option value="{{($locdetail['Pincode'])}}">{{($locdetail['Area'])}}</option>

                                @endforeach 
                                @foreach($value as $meg =>$locdetail)
                                    <option value="{{($locdetail['Pincode'])}}">{{($locdetail['Pincode'])}}</option>
                                    
                                @endforeach  
                            @endforeach

                        </select>
                        </form>
                    </div>
                    <div class="select-wrp">
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
                    </div>
                    <div class="topbar-register">
                        @if(!empty(session()->get('user_session')))
                            <a href="{{url('/dashboard')}}">Hi, {{(session()->get('user_session'))->name}}
                                (MyAccount)
                            </a>
                        @else
                        <a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a> / <a class="sign-popup-btn" href="#" title="Register" itemprop="url">REGISTER</a>
                        @endif
                    </div>
                    <div class="social1">
                        <a href="{{url('cart')}}" title="Facebook" itemprop="url" ><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                        @if(session()->get('cart')) 
                        <sup> (
                           <span >
                           <?php $cart = session()->get('cart')?>
                            {{count($cart)}}
                        </span>
                        )</sup>
                        @endif
                        </a>
                        <a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>                
            </div><!-- Topbar -->
            <div class="logo-menu-sec">
                <div class="container">
                    <div class="logo"><h1 itemprop="headline"><a href="<?=URL::to('/');?>" title="Home" itemprop="url"><img src="{{ url('assets/images/logo2.png') }}" alt="logo.png" itemprop="image"></a></h1></div>
                    <nav>
                        <div class="menu-sec">
                            <ul>
                                 <li class="menu-item-has-children" >CATEGORIES
                                    <ul class="sub-dropdown">
                                       @foreach($categories as $category)
                                        <li style="text-transform: uppercase;"><a href="{{url('')}}/category/{{$category->name}}" title="REGISTER RESERVATION" itemprop="url">{{$category->name}}</a></li>
                                        
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url">FESTIVAL SPECIAL</a></li>
                                <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url">PRE ORDER</a></li>

                                <li class="menu-item-has-children"><a href="{{url('')}}/about-us" title="HOMEPAGES" itemprop="url">ABOUT US</a></li>
                                <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url">WHY FAST 'O' FRESH</a></li>

                            </ul>
                                                        <a class="red-bg brd-rd4" href="#" title="Register" itemprop="url" style="margin-left:40px;background: #306f06">TOLLFREE: 1800 123 456</a>

                        </div>
                    </nav><!-- Navigation -->
                </div>
            </div><!-- Logo Menu Section -->
        </header><!-- Header -->

        <div class="responsive-header">
            <div class="responsive-topbar">
                 <div class="select-wrp">
                        <select data-placeholder="Feel Like Eating">
                            <option>TODAY's ORDER</option>
                            <option>Caption - 1</option>
                            <option>Caption - 2</option>
                            <option>Caption - 3</option>
                            <option>Caption - 4</option>
                        </select>
                    </div>
                <div class="select-wrp">
                        <select data-placeholder="Choose Location">
                            <option>CHOOSE LOCATION</option>
                            <option>Gurgaon</option>
                            <option>Noida</option>
                            <option>Delhi</option>
                        </select>
                    </div>
            </div>
            <div class="responsive-logomenu">
                                <div class="logo"><h1 itemprop="headline"><a href="<?=URL::to('/');?>" title="Home" itemprop="url"><img src="{{ url('assets/images/logo-white.png') }}" alt="logo.png" itemprop="image"></a></h1></div>

                <span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
            </div>
            <div class="responsive-menu">
                <span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
                <div class="menu-lst">
                    <ul>
                        <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url">TODAY'S DEALS</a></li>
                                <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url">FESTIVAL SPECIAL</a></li>
                                <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url">PRE ORDER</a></li>

                                <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url">ABOUT US</a></li>
                                <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url">WHY FAST 'O' FRESH</a></li>

                            </ul>
                                                        
                </div>
                <div class="topbar-register">
                    <a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a> / <a class="sign-popup-btn" href="#" title="Register" itemprop="url">REGISTER</a>
                </div>
                <div class="social1">
                    <a href="#" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook-square"></i></a>
                    <a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
                </div>
               
            </div><!-- Responsive Menu -->
        </div><!-- Responsive Header -->