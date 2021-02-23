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

<style type="text/css">
 .responsive-logomenu .logo img {
    max-width: 100%;
}
</style>

    

        <div class="log-popup text-center">
            <div class="sign-popup-wrapper brd-rd5">
                <div class="sign-popup-inner brd-rd5">
                    <a class="log-close-btn" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                        <div class="sign-popup-title text-center">
                            <h4 itemprop="headline">LOG IN</h4>
                        </div>

                        <form class="login"  method="post" action="{{url('login')}}">
                          @csrf
                            
                                <div class="col-md-12 col-sm-12 col-lg-12 ">
                                    <div class="form-group">
                                      <label>Enter Email ID / Mobile Number<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="email" placeholder="Enter Email ID / Mobile Number" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                    <div class="form-group">
                                      <label>Password<span class="text-danger">*</span></label>
                                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-lg-12 form-group">
                                   <div class="form-group">
                                      <button class="btn btn-lg " style="background: #800000;color:#face82" type="submit">LOG IN</button>
                                   </div>
                                </div>
                                
                            
                            <div class="row" >
                                 New To Fast O Fresh? <a class="sign-popup-btn" style="font-size: 14px;color: red" href="#" title="Register" itemprop="url">Sign up Here</a>
                            </div>
                            <div class="row" >
                                  <a class="forgot-popup-btn" onclick="forgotPassword()" style="font-size: 14px;color: red" href="javascript:void(0)" title="forgot" itemprop="url">Forgot Your Password ??</a>
                            </div>
                        </form>
                </div>
                <div class="forgot-parent">
                </div>
                 <div class="forgot-parent-body">
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
                    <form class="form-group" method="post" action="{{url('')}}/register">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Name" required >
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                               <div class="form-group">
                                  <label>Email<span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" placeholder="Email" required >
                               </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                       <label>Mobile<span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="mobile" placeholder="Mobile" required >
                           
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                               <div class="form-group">
                                  <label>Password<span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="password" placeholder="Password" required>
                               </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button class="btn btn-lg"  style="background: #800000;color:#face82" type="submit">REGISTER NOW</button>
                            </div>
                            
                        </div>
                        <div class="row">
                           Already on FastOFresh?  <a class="log-popup-btn" style="font-size: 14px;color: #800000;" href="#" title="Login" itemprop="url">LOGIN</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer>
            <div class="block top-padd80 bottom-padd80 dark-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="footer-data">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="widget information_links">
                                            <h4 class="widget-title" itemprop="headline">USEFUL LINKS</h4>
                                            <ul>
                                                <li><a href="{{url('')}}/why" title="" itemprop="url">Why Fast 'O' Fresh?</a></li>
                                                <li><a href="{{url('')}}/about-us" title="" itemprop="url">About Us</a></li>
                                                <!-- <li><a href="#" title="" itemprop="url">Refer & Earn</a></li> -->
                                                 <!-- <li><a href="https://www.linkedin.com/company/71600846/admin/" title="" itemprop="url">Careers</a></li> -->

                                                <li><a href="{{url('')}}/terms" title="" itemprop="url">Terms & Condition</a></li>
                                                <li><a href="{{url('')}}/faq" title="" itemprop="url">FAQs</a></li>
                                                 <li><a href="{{url('')}}/privacyandpolicy" title="" itemprop="url">Privacy and Policy</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="widget customer_care ">
                                            <h4 class="widget-title" itemprop="headline">FOLLOW US </h4>

                                              <ul style="list-style: none !importants">
                                                <li>   <a href="https://www.facebook.com/fastofreshfoods/" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook"></i> &nbsp;Like us on Facebook</a>
                                                </li>
                                                <li>
                                                   <a href="https://www.instagram.com/fastofreshfoods/" title="Instagram" itemprop="url" target="_blank"><i class="fa fa-instagram"></i> &nbsp; Follow us on Instagram</a>
                                                
                                                </li>
                                                <li>
                                                  <a href="https://www.linkedin.com/company/71600846/admin/" title="Instagram" itemprop="url" target="_blank"><i class="fa fa-linkedin"></i> &nbsp; Connect us on Linkedin</a>
                                                </li>
                                                <li>
                                                  
                                                   <a href="https://twitter.com/fastofreshfoods" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i> &nbsp; Follow us on Twitter</a>
                                                </li>
                                              </ul> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="widget get_in_touch ">
                                            <h4 class="widget-title" itemprop="headline">GET IN TOUCH</h4>
                                            <ul>
                                               <li><i class="fa fa-map-marker"></i> H-201, Level-1, Sector 63, Noida 201301.</li>
                                               <li><i class="fa fa-phone"></i> 1800 313 8898</li>
                                               <li><i class="fa fa-envelope"></i> <a href="#" title="" itemprop="url">care@fastofresh.com</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="widget information_links">
                                            <div class="d-flex"> 
                                              
                                               <img src="{{url('')}}/assets/images/mastervisa-01.png" width="70%">
                                               <br>
                                               <br>
                                               <img src="{{url('')}}/assets/images/FSSAI_logo.png" width="40%"> 
                                               <h5 style="color:white">Lic. No. 13320003000188  </h5>
                                            </div>
                                            <br>
                                         
                                             
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
             <div class="block dark-bg">
                <div class="container">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-lg-12" style="border-bottom: 1px solid ;">
                        <h4 style="color: wheat; ">“Source to your home, same day delivery.” Have you ever imagined?"</h4>
                        <p>Well, to ensure about the accessibility of meat, we are modifying the old practices. We convey new
                        meat every single day from clean organic farms which is more delectable and better with no harmful
                        chemicals or additives.</p>
                        <h4 style="color: wheat; margin-top: 30px;">Do you know “Variety is the spice of life”?</h4>
                        <p>What&#39;s more, we at Fast O Fresh gives you entire heap of varieties. You can choose Basa fish to chicken, prawns to mutton, lamb to sole fish and so on. You just name it and we will convey at your doorstep. All things considered, isn&#39;t it extraordinary?</p>

                        <h4 style="color: wheat; margin-top: 30px;">Who doesn’t love fresh meat?</h4>
                        <p>We are so fixated to deliver the fresh product that we store them at a temperature of 0 - 4°C right
                        from the procurement and until it delivered from our warehouse to your door. We deliver fresh
                        from the source. Well, all around did we neglect to make reference to above, we are likewise paying
                        special mind to your cleanliness and wellbeing.</p>

                        <h4 style="color: wheat; margin-top: 30px;">Tired of paying extra? Pay for what you purchase.</h4>
                        <p>All things considered; we can’t talk on behalf of others however we unquestionably do it. You simply
                        need to pay for what you purchase. A large portion of the individuals gauge the complete meat first
                        and afterward cut the parts which aren’t a great idea to eat but then you pay for that and get less.
                        Here, at Fast O Fresh we don’t do it; you just have to pay for the original weight. Unless the others
                        who weighs the meat first and then cut into pieces.</p>

                        <h4 style="color: wheat; margin-top: 30px;">Have you heard about the term, “The more the merrier”?</h4>
                        <p>Well, on the off chance that in some way or another you get less measure of meat which you have
                        requested, at that point the leftover amount will be transferred in your Fast O Fresh wallet and if
                        you get more than the genuine weight you’ve ordered, for that <strong>we don’t charge additional single
                        penny.</strong></p>

                        <h4 style="color: wheat; margin-top: 30px;">Have you ever heard about, “Pocket friendly price ∝ superior quality”?</h4>
                        <p style="margin-bottom: 30px">If not, at that point we at Fast O Fresh certainly do it. We convey superior quality item in pocket
                        friendly value which is brimming with taste and deliciousness. What else do we need to live in this
                        costly world?</strong></p>
                      </div>
                      <!-- Div End -->
                        <div class="col-md-12 col-sm-12 col-lg-12">
                        <?php $i=0.0;?>
                          @foreach($categories as $category)
                           <div class="widget get_in_touch " style="    color: wheat;">

                            <h4 class="widget-title" itemprop="headline" style="margin-bottom:10px;"><u><a href="{{url('')}}/category/{{$category->name}}">{{$category->name}}</a></u></h4>
                              
                              @foreach(footpro($category->id) as $profoot)
                                <a href="{{url('')}}/product/{{$profoot->id}}" >{{$profoot->name}}</a> &nbsp; | &nbsp;
                               @endforeach
                          </div>
                          @endforeach
                        </div>

                       
                         <div class="col-md-12 col-sm-12 col-lg-12 text-center d-sm-none" style="border-top:1px solid;">
                            <p itemprop="description">&copy; 2020 <a class="red-clr" href="#" title="FAST O FRESH" itemprop="url" target="_blank">FAST O FRESH</a>. ALL RIGHTS RESERVED</p> |   <p itemprop="description">Website Credits:<a class="red-clr" href="https://www.techcentrica.com" title="TechCentrica" target="_blank">TECHCENTRICA</a></p>
                            <p Style="line-height:22px;">FastOFresh brings fresh meat to your doorsteps with a few screen taps. We strictly maintain hygiene and ensure that the meat you are served with is natural, fresh, and healthy. We haveMutton, Chicken, Mutton, Seafood (Fish, Prawns, Crabs), etc., as of now and are constantly upgrading ourselves. Don’t wait anymore; explore the power of your clicks.
                            </p>
                        </div>
                         <div class="hidden-md hidden-lg" style="margin-bottom: 280px">
                        
                        </div>
                    </div>
                    <!-- Row End -->

                </div>
            </div>
        </footer><!-- footer -->
        
      

  
    
</main><!-- Main Wrapper -->
<script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
</script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins.js') }}"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
</body>	
</html>