<body class="vertical-layout vertical-menu-modern dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="dark-layout">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                            @if(Session::has('success'))

                                            <div class="alert alert-success" role="alert">
                                                                    <!-- <h4 class="alert-heading">Success</h4> -->
                                                                    <p class="mb-0">
                                                                        {{ Session::get('success') }}
                                                                    </p>
                                                                </div>
                                            @endif              
                                            @if(Session::has('warning'))  
                                               <div class="alert alert-danger" role="alert">
                                                                    <!-- <h4 class="alert-heading">Danger</h4> -->
                                                                    <p class="mb-0">
                                                                       {{ Session::get('warning') }}
                                                                    </p>
                                                                </div>
                                            @endif 
                                    <img src= "{{url('')}}/resource/app-assets/images/pages/login.png" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Login</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Welcome back, please login to your account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form action="{{url('laravel-admin/authenticate')}}" method="post">
                                                    @csrf
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="email" class="form-control" id="user-name" name="user_email" placeholder="Email Id " required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Email</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="user-password" name="user_password" placeholder="Password" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>
                                                  
                                                    <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                            <div class="divider">
                                                <div class="divider-text">OR</div>
                                            </div>
                                           <div class="text-right"><a href="auth-forgot-password.html" class="btn btn-outline-primary float-left btn-inline">Register</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->