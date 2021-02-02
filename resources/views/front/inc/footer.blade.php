<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{url('assets/js/custom.js')}}"></script>        

    <script>
        $(document).ready(function(){

         load_data();

         function load_data(query)
         {
            var token = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
           url:"<?php echo url(''); ?>/productsearch",
           method:"POST",
           data:{_token : token, query:query},
           success:function(responseData){
            onSuccess(responseData);
           }
          })
         }
         function onSuccess(responseData) {
          let html = "";
           
          if(responseData){
              $.each(responseData, function(key, value){
                console.log(value);
                 html += `<option value="${ value.name }">`
              });
            }
          else{
                html +=`<option value="No Match Data Found">`;
          }
          $('.searchspecial').html(html);
        }
         $('#search_text').keyup(function(){
          var search = $(this).val();
          if(search != '')
          {
           load_data(search);
          }
          else
          {
           load_data();
          }
         });



        });
    </script>
    <footer>
        <div class="block top-padd80 bottom-padd80 dark-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="footer-data">
                            <div class="row">
                                 <div class="col-md-3 col-sm-6 col-lg-3">
                                    <div class="widget information_links wow fadeIn" data-wow-delay="0.2s">
                                        <h4 class="widget-title" itemprop="headline">USEFUL LINKS</h4>
                                        <ul>
                                            <li><a href="#" title="" itemprop="url">Why Fast 'O' Fresh?</a></li>
                                            <li><a href="#" title="" itemprop="url">Refer & Earn</a></li>
                                            <li><a href="#" title="" itemprop="url">Campaign</a></li>
                                            <li><a href="#" title="" itemprop="url">FSSC 22000 Certification</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-lg-3">
                                    <div class="widget information_links wow fadeIn" data-wow-delay="0.2s">
                                        <h4 class="widget-title" itemprop="headline">INFORMATION</h4>
                                        <ul>
                                            <li><a href="#" title="" itemprop="url">Careers</a></li>
                                            <li><a href="#" title="" itemprop="url">Investor Relations</a></li>
                                            <li><a href="#" title="" itemprop="url">Press Releases</a></li>
                                            <li><a href="#" title="" itemprop="url">Shop with Points</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-lg-3">
                                    <div class="widget customer_care wow fadeIn" data-wow-delay="0.3s">
                                        <h4 class="widget-title" itemprop="headline">CUSTOMER CARE</h4>
                                        <ul>
                                            <li><a href="#" title="" itemprop="url">Returns</a></li>
                                            <li><a href="#" title="" itemprop="url">Shipping Info</a></li>
                                            <li><a href="#" title="" itemprop="url">Gift Cards</a></li>
                                            <li><a href="#" title="" itemprop="url">Size Guide</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-lg-3">
                                    <div class="widget get_in_touch wow fadeIn" data-wow-delay="0.4s">
                                        <h4 class="widget-title" itemprop="headline">GET IN TOUCH</h4>
                                        <ul>
                                           <li><i class="fa fa-map-marker"></i> H-201, Level-1, Sector 63, Noida 201301.</li>
                                           <li><i class="fa fa-phone"></i> 1800 123 456</li>
                                           <li><i class="fa fa-envelope"></i> <a href="#" title="" itemprop="url">care@fastofresh.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Footer Data -->
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- footer -->
    <footer>
        <div class="block top-padd80  dark-bg" style="border-top:1px solid;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="footer-data">
                            <div class="row">
                                  <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="widget get_in_touch wow fadeIn" data-wow-delay="0.4s">
                                        <h4 class="widget-title" itemprop="headline" style="margin-bottom:0px;">CHICKEN</h4>

                                        <ul>
                                           <li style="padding-left:0px;">Chicken Breast (Boneless) Chicken (Skinless) - Curry Cut (Large) Chicken Mince/Keema Chicken Leg Curry Cut (Large - 4 pieces) Chicken Lollipop - 10 Pieces Tender Spring Chicken Curry Cut Chicken - Whole with Skin Chicken Curry Cut (Small - 13 to 16 Pieces)</li>
                                        </ul>
                                        

                                    </div>
                                     <div class="widget get_in_touch wow fadeIn" data-wow-delay="0.4s">
                                        <h4 class="widget-title" itemprop="headline" style="margin-bottom:0px;">MUTTON</h4>

                                        <ul>
                                           <li style="padding-left:0px;">Goat Mince/Keema Rich Goat Curry Cut (Small - 16 to 20 pieces) Lean Goat Curry Cut (Small - 16 to 20 pieces) Lean Lamb Curry Cut (Small - 16 to 20 pieces) Rich Lamb Curry Cut (Small - 16 to 20 pieces) Lamb Ribs and Chops Goat Ribs and Chops</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="widget get_in_touch wow fadeIn" data-wow-delay="0.4s">
                                        <h4 class="widget-title" itemprop="headline" style="margin-bottom:0px;">FISH & SEAFOOD</h4>

                                        <ul>
                                           <li style="padding-left:0px;">Basa Fillet (Platinum Grade) Premium Grade Mackerel (Cleaned) Freshwater Rohu Large - Bengali Cut (w/o Head) Freshwater Rohu - Bengali Cut (Without Head) Medium Prawns - Without Tail Seer (Surmai) Steaks Freshwater Rohu Small - Bengali Cut (without Head)</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="widget get_in_touch wow fadeIn" data-wow-delay="0.4s">
                                        <h4 class="widget-title" itemprop="headline" style="margin-bottom:0px;">READY TO COOK</h4>

                                        <ul>
                                           <li style="padding-left:0px;">Caribbean Jerk Chicken (Boneless) Habanero Chicken Wings (Hot) - 10 Pieces Creamy Afghani Chicken Peri Peri Chicken (Spicy) Chicken Cutlet (Bengali Style)</li>
                                        </ul>
                                    </div>
                                    
                                    <div class="widget get_in_touch wow fadeIn" data-wow-delay="0.4s" >
                                        <h4 class="widget-title" itemprop="headline" style="margin-bottom:0px;">EXOTIC MEATS</h4>

                                        <ul >
                                           <li style="padding-left:0px;">Atlantic Salmon Steaks Blue Crab Sea Bass/ Bhetki Fillet</li>
                                        </ul>
                                    </div>
                                
                                    
                                </div>
                                
                                
                                
                                
                            </div>
                        </div><!-- Footer Data -->
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- footer -->
        
        <div class="bottom-bar dark-bg text-center">
            <div class="container">
                <p itemprop="description">&copy; 2020 <a class="red-clr" href="#" title="FAST O FRESH" itemprop="url" target="_blank">FAST 'O" FRESH</a>. ALL RIGHTS RESERVED</p> |   <p itemprop="description">Credit By: <a class="red-clr" href="https://www.techcentrica.com" title="TechCentrica" itemprop="url" target="_blank">TECHCENTRICA</a></p>
                <p Style="line-height:22px;">FastOFresh brings fresh meat to your doorsteps with a few screen taps. We strictly maintain hygiene and ensure that the meat you are served with is natural, fresh, and healthy. We have Mutton, Chicken, Mutton, Seafood (Fish, Prawns, Crabs), etc., as of now and are constantly upgrading ourselves. Don’t wait anymore; explore the power of your clicks.
                </p>
            </div>
        </div><!-- Bottom Bar -->

       

    

        <div class="log-popup text-center">
            <div class="sign-popup-wrapper brd-rd5">
                <div class="sign-popup-inner brd-rd5">
                    <a class="log-close-btn" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                        <div class="sign-popup-title text-center">
                            <h4 itemprop="headline">LOG IN</h4>
                           
                        </div>
                        <form class="sign-form" method="post" action="{{url('login')}}">
                          @csrf
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <label>Enter Email ID / Mobile Number<span class="text-danger">*</span></label>
                                    <input class="brd-rd3" type="text" name="email" placeholder="Enter Email ID / Mobile Number" required>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <label>Password<span class="text-danger">*</span></label>
                                    <input class="brd-rd3" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <button class="red-bg brd-rd3" type="submit">LOG IN</button>
                                </div>
                                
                            </div>
                            <div class="row" >
                                 New To Fast O Fresh? <a class="sign-popup-btn" style="font-size: 14px;color: red" href="#" title="Register" itemprop="url">Sign up Here</a>
                            </div>
                            <div class="row" >
                                  <a class="forgot-popup-btn" onclick="forgotPassword()" style="font-size: 14px;color: red" href="javascript:void(0)" title="forgot" itemprop="url">Forgot Your Password ??</a>
                            </div>
                        </form>

                        <div class="forgot-parent">
                        </div>
                         <div class="forgot-parent-body">
                        </div>
                </div>
            </div>
        </div>


        <div class="sign-popup text-center">
            <div class="sign-popup-wrapper brd-rd5">
                <div class="sign-popup-inner brd-rd5">
                    <a class="sign-close-btn" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                    <div class="sign-popup-title text-center">
                        <h4 itemprop="headline">SIGN UP</h4>
                       
                    </div>
                    
                    <form class="sign-form" method="post" action="{{url('')}}/register">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <label>Name<span class="text-danger">*</span></label>
                                <input class="brd-rd3" type="text" name="name" placeholder="Name" required >
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <label>Email<span class="text-danger">*</span></label>
                                <input class="brd-rd3" type="email" name="email" placeholder="Email" required >
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <label>Mobile<span class="text-danger">*</span></label>
                                <input class="brd-rd3" type="number" name="mobile" placeholder="Mobile" required >
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <label>Password<span class="text-danger">*</span></label>
                                <input class="brd-rd3" type="password" name="password" placeholder="Password" required>
                            </div>

                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button class="red-bg brd-rd3" type="submit">REGISTER NOW</button>
                            </div>
                            
                        </div>
                        <div class="row">
                           Already on FastOFresh?  <a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
</main><!-- Main Wrapper -->
<script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
</script>
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins.js') }}"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
</body>	
</html>