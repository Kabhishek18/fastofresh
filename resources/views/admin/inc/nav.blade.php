 <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <!-- Left Item Top Nav -->
                        <h1><marquee>Welcome To Fast O Fresh Admin Panel</marquee>  </h1>
                        
                    </div>
                    <ul class="nav navbar-nav float-right">
                     
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                       <!--  <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="input" type="text" placeholder="Explore Vaidaan..." tabindex="-1" data-search="template-list">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list search-list-main"></ul>
                            </div>
                        </li> -->
                    
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void0" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600" style="text-transform: capitalize;">{{$user->name}}</span><span class="user-status">
                                  Administrator 
                                </span></div><span>
                                    <img class="round" src="{{url('profileimages')}}/{{$user->id}}/{{$user->avatar}}" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{url('')}}/user/useredit/12"><i class="feather icon-user"></i> Edit Profile</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{url('laravel-admin/logout')}}"><i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
   
    <!-- END: Header -->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="<?=url('dashboard')?>">
                        
                        <h2 class="brand-text mb-0">Admin Panel</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class=" nav-item "><a href="{{url('laravel-admin/dashboard')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                </li>
                <li class=" navigation-header"><span>Category,Subcategory</span>

               <li class=" nav-item "><a href="{{url('laravel-admin/category')}}"><i class="feather icon-eye"></i><span class="menu-title" data-i18n="Dashboard">Category </span></a>
                </li>

               <li class=" navigation-header"><span>Product</span>

               <li class=" nav-item "><a href="{{url('laravel-admin/product')}}"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Dashboard">Product </span></a>
                </li>
                
               <li class=" navigation-header"><span>Orders</span>

               <li class=" nav-item "><a href="{{url('laravel-admin/order')}}"><i class="feather icon-shopping-cart"></i><span class="menu-title" data-i18n="Dashboard">Order </span></a>
                </li> 
                


            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->