

        <div class="bread-crumbs-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                    <li class="breadcrumb-item active">Email OTP Verification</li>
                </ol>
            </div>
        </div>
         @include('../status')
       
        <section>
            <div class=" gray-bg">
                <div class="sec-box bottom-padd140">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="dashboard-tabs-wrapper">
                                    <div class="row">
                                       <form method="post" action="{{url('')}}/passwordforget">
                                           @csrf
                                        <div class="row">
                                            <?php $verifysession = session()->get('verifyemail');?>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Email<span class="text-danger">*</span></label>
                                                <input class="form-control" type="email" name="email" placeholder="Email" required value="{{$verifysession['email']}}" disabled="">
                                                </div>
                                            </div>
                                              <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>Password<span class="text-danger">*</span></label>
                                                <input class="form-control" type="password" name="password" placeholder="password" required >
                                                </div>
                                            </div>   

                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>OTP (Required)<span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="otp" placeholder="OTP 6 Digit " required >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                       <button class="btn red-bg brd-rd3" type="submit" style="color:white">Verify Now</button>
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