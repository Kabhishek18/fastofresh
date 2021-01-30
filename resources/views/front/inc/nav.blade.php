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
                                    <option value="{{($locdetail['Pincode'])}}">{{($locdetail['Area'])}} ,{{($locdetail['Pincode'])}}</option>

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
                      
                        <a href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
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
                            <ul>
                                 
                                 <li class="menu-item-has-children" >CATEGORIES
                                    <ul class="sub-dropdown">
                                       @foreach($categories as $category)
                                        <li style="text-transform: uppercase;"><a href="{{url('')}}/category/{{$category->name}}" title="REGISTER RESERVATION" itemprop="url">{{$category->name}}</a></li>
                                        
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="menu-item-has-children" width="100%"> <form  action="{{url('')}}/search" method="post">
                                    @csrf
                                    <input class="brd-rd30" id="search_text" type="text" name="product" placeholder="Search for any delicious product"  list="browsers">
                                   <datalist class="searchspecial" id="browsers">
                               
                                      </datalist>
                                    <button class="btn brd-rd30 red-bg" type="submit">SEARCH</button>
                                </form></li>
                                <li class="menu-item-has-children">
                                      <a href="{{url('cart')}}" title="Cart" itemprop="url"  style="font-size: 20px"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                        @if(session()->get('cart')) 
                                        <sup> (
                                           
                                           <?php $cart = session()->get('cart')?>
                                            {{count($cart)}}
                                        )</sup>
                                        @endif
                                        </a>
                                </li>

                               

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
                                    <option value="{{($locdetail['Pincode'])}}">{{($locdetail['Area'])}} ,{{($locdetail['Pincode'])}}</option>

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
            </div>
            <div class="responsive-logomenu">
                                <div class="logo"><h1 itemprop="headline"><a href="<?=URL::to('/');?>" title="Home" itemprop="url"><img src="{{ url('assets/images/logo-white.png') }}" alt="logo.png" itemprop="image"></a></h1></div>

                <span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
            </div>
            <div class="responsive-menu">
                <span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
                <div class="menu-lst">
                    <ul>
                        <li class="menu-item-has-children">
                            <form  action="{{url('')}}/search" method="post">
                                    @csrf
                                    <input class="brd-rd30" id="search_text" type="text" name="product" placeholder="Search for any delicious product"  list="browsers">
                                   <datalist class="searchspecial" id="browsers"> </datalist>
                                <button class="btn brd-rd30 red-bg" type="submit">SEARCH</button>
                            </form>
                        </li>
                        <li><a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a> / <a class="sign-popup-btn" href="#" title="Register" itemprop="url">REGISTER</a></li>

                            </ul>
                                                        
                </div>
                <div class="topbar-register">
                    
                </div>
              
               
            </div><!-- Responsive Menu -->
        </div><!-- Responsive Header -->