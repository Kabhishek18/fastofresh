<header class="stick">
            <div class="topbar">
                <div class="container">
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
                    <div class="topbar-register">
                        @if(!empty(session()->get('user_session')))
                            <a href="{{url('/dashboard')}}">Dashboard</a>
                        @else
                        <a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a> / <a class="sign-popup-btn" href="#" title="Register" itemprop="url">REGISTER</a>
                        @endif
                    </div>
                    <div class="social1">
                        <a href="{{url('cart')}}" title="Facebook" itemprop="url" ><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                        @if(session()->get('cart')) 
                        <sup> (
                           <span class="text-danger">
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
                                <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url">TODAY'S DEALS</a></li>
                                <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url">FESTIVAL SPECIAL</a></li>
                                <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url">PRE ORDER</a></li>

                                <li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url">ABOUT US</a></li>
								<li class="menu-item-has-children"><a href="#" title="HOMEPAGES" itemprop="url">WHY FAST 'O' FRESH</a></li>

                            </ul>
							                            <a class="red-bg brd-rd4" href="#" title="Register" itemprop="url" style="margin-left:40px;">TOLLFREE: 1800 123 456</a>

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
