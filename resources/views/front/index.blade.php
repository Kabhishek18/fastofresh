 @include('../status')
       
       <section>
           <div class=" ">
               <div class="">

                                 <!-- #region Jssor Slider Begin -->
                <!-- Generator: Jssor Slider Composer -->
                <!-- Source: https://www.jssor.com/demos/ski/ski.slider/=edit -->
                <script src="{{url('')}}/assets/js/jssor.slider-28.1.0.min.js" type="text/javascript"></script>
                <script type="text/javascript">
                    window.jssor_1_slider_init = function() {

                        var jssor_1_SlideoTransitions = [
                          [{b:0,d:600,o:0.8}],
                          [{b:300,d:600,o:0.8}],
                          [{b:600,d:600,o:0.8}],
                          [{b:-1,d:1,da:[0,700]},{b:500,d:3500,da:[623,700],e:{da:1}}],
                          [{b:1000,d:500,o:1}],
                          [{b:1000,d:500,o:1}],
                          [{b:-1,d:1,y:30},{b:1000,d:500,y:0,o:1,e:{y:27}}],
                          [{b:1700,d:500,o:1}],
                          [{b:1700,d:500,o:1}],
                          [{b:-1,d:1,y:30},{b:1700,d:500,y:0,o:1,e:{y:27}}],
                          [{b:2300,d:500,o:1}],
                          [{b:2300,d:500,o:1}],
                          [{b:-1,d:1,y:30},{b:2300,d:500,y:0,o:1,e:{y:27}}],
                          [{b:2900,d:500,o:1}],
                          [{b:2900,d:500,o:1}],
                          [{b:-1,d:1,y:30},{b:2900,d:500,y:0,o:1,e:{y:27}}],
                          [{b:0,d:600,x:208,y:44,e:{x:27,y:27}}],
                          [{b:300,d:600,x:145,y:22,e:{x:27,y:27}}],
                          [{b:100,d:600,x:177,y:31,e:{x:27,y:27}}],
                          [{b:200,d:600,x:177,y:31,e:{x:27,y:27}}],
                          [{b:-1,d:1,x:-80,y:-370,r:-60,rY:30,sY:1.5,p:{x:{d:1,dO:68},y:{d:1,dO:68},r:{d:1,dO:68}}},{b:300,d:1500,x:0,y:0,o:1,r:0,kX:-15,e:{x:27,y:27,o:1,r:27,kX:27},p:{x:{dl:0.02,o:68},y:{dl:0.02,o:68},o:{dl:0.2,o:68},r:{dl:0.02,o:68},kX:{dl:0.02,o:68}}}],
                          [{b:-1,d:1,x:-80,y:-370,r:-60,sY:1.5,p:{x:{d:1,dO:68},y:{d:1,dO:68},r:{d:1,dO:68}}},{b:300,d:1500,x:0,y:0,o:1,r:0,kX:-15,e:{x:27,y:27,o:1,r:27,kX:27},p:{x:{dl:0.02,o:68},y:{dl:0.02,o:68},o:{dl:0.2,o:68},r:{dl:0.02,o:68},kX:{dl:0.02,o:68}}}],
                          [{b:-1,d:1,sX:1.2,kX:-15},{b:0,d:600,o:0.06}],
                          [{b:-1,d:1,x:-30,sY:1.3,p:{x:{o:32,r:0.5}}},{b:600,d:600,x:0,o:1,e:{x:36,o:1},p:{x:{dl:0.1,o:32,rd:2},o:{dl:0.1,o:32,rd:2}}}],
                          [{b:600,d:600,x:300,e:{x:7}}],
                          [{b:-1,d:1,x:-30,sY:1.3,p:{x:{o:32,r:0.5}}},{b:900,d:600,x:0,o:1,e:{x:36,o:1},p:{x:{dl:0.1,o:32,rd:2},o:{dl:0.1,o:32,rd:2}}}],
                          [{b:900,d:600,x:97,e:{x:7}}],
                          [{b:-1,d:1,x:-30,sY:1.3,p:{x:{o:32,r:0.5}}},{b:1200,d:600,x:0,o:1,e:{x:36,o:1},p:{x:{dl:0.1,o:32,rd:2},o:{dl:0.1,o:32,rd:2}}}],
                          [{b:1200,d:600,x:260,e:{x:7}}],
                          [{b:-1,d:1,x:-30,sY:1.3,p:{x:{o:32,r:0.5}}},{b:1500,d:1000,x:0,o:1,e:{x:36,o:1},p:{x:{dl:0.1,o:32,rd:2},o:{dl:0.1,o:32,rd:2}}}],
                          [{b:1500,d:1000,x:112,e:{x:7}}],
                          [{b:-1,d:1,x:-30,sY:1.3,p:{x:{o:32,r:0.5}}},{b:2000,d:1000,x:0,o:1,e:{x:36,o:1},p:{x:{dl:0.1,o:32,rd:2},o:{dl:0.1,o:32,rd:2}}}],
                          [{b:2000,d:1000,x:105,e:{x:7}}]
                        ];

                        var jssor_1_options = {
                          $AutoPlay: 1,
                          $CaptionSliderOptions: {
                            $Class: $JssorCaptionSlideo$,
                            $Transitions: jssor_1_SlideoTransitions
                          },
                          $ArrowNavigatorOptions: {
                            $Class: $JssorArrowNavigator$
                          },
                          $BulletNavigatorOptions: {
                            $Class: $JssorBulletNavigator$,
                            $SpacingX: 16,
                            $SpacingY: 16
                          }
                        };

                        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                        /*#region responsive code begin*/

                        var MAX_WIDTH = 1370;

                        function ScaleSlider() {
                            var containerElement = jssor_1_slider.$Elmt.parentNode;
                            var containerWidth = containerElement.clientWidth;

                            if (containerWidth) {

                                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                                jssor_1_slider.$ScaleWidth(expectedWidth);
                            }
                            else {
                                window.setTimeout(ScaleSlider, 30);
                            }
                        }

                        ScaleSlider();

                        $Jssor$.$AddEvent(window, "load", ScaleSlider);
                        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                        /*#endregion responsive code end*/
                    };
                </script>
                <style>
                    /*jssor slider loading skin double-tail-spin css*/
                    .jssorl-004-double-tail-spin img {
                        animation-name: jssorl-004-double-tail-spin;
                        animation-duration: 1.6s;
                        animation-iteration-count: infinite;
                        animation-timing-function: linear;
                    }

                    @keyframes jssorl-004-double-tail-spin {
                        from { transform: rotate(0deg); }
                        to { transform: rotate(360deg); }
                    }

                    /*jssor slider bullet skin 102 css*/
                    .jssorb102 .i {position:absolute;cursor:pointer;}
                    .jssorb102 .i .ci {fill:#fff;}
                    .jssorb102 .i .co {fill:#000;opacity:.2;}
                    .jssorb102 .i:hover .co {fill:#ff9933;opacity: 1;}
                    .jssorb101 .i:hover .ci {fill:#000;}
                    .jssorb102 .iav .ci {fill:#000;stroke-width:0;}
                    .jssorb102 .iav .co {fill:#ffba04;opacity: 1;}
                    .jssorb102 .i.idn {opacity:.3;}

                    /*jssor slider arrow skin 051 css*/
                    .jssora051 {display:block;position:absolute;cursor:pointer;}
                    .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
                    .jssora051:hover {opacity:.8;}
                    .jssora051.jssora051dn {opacity:.5;}
                    .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
                </style>
                <svg viewbox="0 0 0 0" width="0" height="0" style="display:block;position:relative;left:0px;top:0px;">
                    <defs>
                        <filter id="jssor_1_flt_1" x="-50%" y="-50%" width="200%" height="200%">
                            <feGaussianBlur stddeviation="4"></feGaussianBlur>
                        </filter>
                        <filter id="jssor_1_flt_2" x="-50%" y="-50%" width="200%" height="200%">
                            <feGaussianBlur stddeviation="4"></feGaussianBlur>
                        </filter>
                        <filter id="jssor_1_flt_3" x="-50%" y="-50%" width="200%" height="200%">
                            <feGaussianBlur stddeviation="4"></feGaussianBlur>
                        </filter>
                        <filter id="jssor_1_flt_4" x="-50%" y="-50%" width="200%" height="200%">
                            <feGaussianBlur stddeviation="4"></feGaussianBlur>
                        </filter>
                        <filter id="jssor_1_flt_5" x="-50%" y="-50%" width="200%" height="200%">
                            <feImage x="0" y="0" width="980" height="380" data-load="href" result="r1" href="img/ski.jpg"></feImage>
                            <feDisplacementMap in="SourceGraphic" in2="r1" scale="4" xchannelselector="R" ychannelselector="G" result="r3"></feDisplacementMap>
                            <feColorMatrix in="r1" type="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 -0.4 -0.4 -0.4 1.4 0" result="r2"></feColorMatrix>
                            <feComposite operator="in" in="r3" in2="r2" result="r4"></feComposite>
                        </filter>
                    </defs>
                </svg>
                <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
                    <!-- Loading Screen -->
                    <div data-u="loading" class="jssorl-004-double-tail-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/double-tail-spin.svg" />
                    </div>
                    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                        <div data-p="680">
                            <img data-u="image" src="assets/images/parallax2.jpg" />
                            
                           
                        </div>
                        <div data-p="680">
                            <img data-u="image" src="assets/images/parallax2.jpg" />
                             
                        </div>
                        <div>
                            <img data-u="image" src="assets/images/parallax2.jpg" />
                            
                            
                        </div>
                    </div><a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">html slider</a>
                    <!-- Bullet Navigator -->
                    <div data-u="navigator" class="jssorb102" style="position:absolute;bottom:16px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                        <div data-u="prototype" class="i" style="width:16px;height:16px;">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <circle class="co" cx="8000" cy="8000" r="5000"></circle>
                                <circle class="ci" cx="8000" cy="8000" r="3000"></circle>
                            </svg>
                        </div>
                    </div>
                    <!-- Arrow Navigator -->
                    <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                        </svg>
                    </div>
                    <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                        </svg>
                    </div>
                </div>
                <script type="text/javascript">jssor_1_slider_init();
                </script>
                <!-- #endregion Jssor Slider End -->
                           </div>
                       </div>
       </section>    
<!-- 
        <section>
            <div class="block no-padding overlape-95">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="top-restaurants-wrapper">
                                <ul class="restaurants-wrapper style1">
                                    <?php $i=0.0;?>
                                    @foreach($categories as $category)
                                    
                                    <li class="wow bounceIn" data-wow-delay="{{$i +=0.2}}s">
                                        <div class="top-restaurant">
                                        <a class="brd-rd50" href="category/{{$category->name}}" title="Restaurant 1" itemprop="url"><img src="{{url('')}}/categories/{{$category->image}}" alt="{{$category->image}}" itemprop="image">
                                        <div class="text-default" style="text-transform: uppercase">
                                            <h4 style="margin-top: 0px;">{{$category->name}}</h4>
                                        </div>
                                        </a>
                                        </div>
                                    </li>
                                    @endforeach
                               </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- top returents -->
        
        <section>
            <div class="block remove-bottom">
                <div class="container">
                    <div class="row">
                        <div class="welcome-sec">
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="welcome-secinfo">
                                    <h2>Welcome To Fast O Fresh</h2>
                                    <span>Creating Tasty Memories, True Emotions.</span>
                                    <p>We keep a scrupulous check at every step during the production & the delivery of food items
                                      from the farm to the table. We own multiple farms to produce natural and nutrition-rich meat. Our intensive process control measures ensure that the meat you receive is of utmost quality
                                      while conforming with supreme hygiene practices.</p>
                                    
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <figure class="wow fadeIn" data-wow-delay="0.2s"><img src="{{ url('assets/images/resource/image-pack.png') }}" alt=""></figure>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </section><!-- welcome section -->

        <section>
            <div class="block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="title1-wrapper text-center">
                                <div class="title1-inner">
                                    <h2 itemprop="headline">popular of the month</h2>

                                    <h5 >Are you looking for Chicken, Mutton, Fish, or something else? Or all at once? Aha. Someone’s having a party, are we invited? </h5>
                                
                                </div>

                            </div>
                               
                            <div class="remove-ext">
                                <div class="row">
                                    <?php $i=1;?>
                                   @foreach($popular as $product)
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                                 {{ Form::open(array('url' => 'cartadd')) }}
                                                 @csrf
                                                 <input type="hidden" name="pid" value="{{$product->id}}">
                                                    <div class="popular-dish-box style1 wow fadeIn" data-wow-delay="0.{{$i++}}s">
                                                        <div class="popular-dish-thumb">
                                                            <a href="{{url('product').'/'.$product->id}}" title="" itemprop="url"><img src="{{url('')}}/products/{{$product->image}}" alt="popular-dish-img1.jpg" itemprop="image"></a>
                                                          
                                                            
                                                        </div>
                                                        <div class="popular-dish-info">
                                                            <h4 itemprop="headline"><a href="{{url('product').'/'.$product->id}}" title="" itemprop="url">{{$product->name}}</a></h4>
                                                            {!!$product->short_descrip!!}
                                                            <div class="d-flex justify-content-center" style="margin-top: 10px;margin-bottom: 10px;"> 
                                                            <span class="price "> 
                                                            @if($product->b_price)
                                                            <del>MRP: ₹{{$product->b_price}}</del>
                                                            MRP: ₹ {{$product->s_price}}
                                                            @else
                                                            MRP: ₹ {{$product->s_price}}
                                                            @endif
                                                            &nbsp;
                                                             
                                                             </span>
                                                             <span style="color: green;text-transform: uppercase;font-weight: 600">@if($product->b_price)
                                                              @if(number_format(($product->b_price-$product->s_price)/$product->b_price *100) > 0)
                                                            {{number_format(($product->b_price-$product->s_price)/$product->b_price *100)}}
                                                            % Off
                                                              @endif
                                                            @endif</span>
                                                            </div>
                                                            <div class="col-sm-12 d-flex justify-content-center"> 
                                                            <a class="btn btn-danger" id="hide-{{$product->id}}" data-value="{{$product->id}}" href="javascript:void(0)" title="Order Now" style="background: #800000" itemprop="url">ADD TO CART</a>
                                                           
                                                            <div id="show-{{$product->id}}"></div>
                                                            </div>
                                                           
                                                        </div>
                                                    </div><!-- Product Box -->
                                                    {{ Form::close() }}
                                                </div>
                                   @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <section>
            <div class="block blackish opac35">
                <div class="fixed-bg" style="background-image: url({{url('/assets/images/parallax1.jpg')}});"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="title1-wrapper text-center">
                                <div class="title1-inner">
                                    <h2 class="text-white" itemprop="headline">easy order in 3 steps</h2>
                                </div>
                            </div>
                            <div class="remove-ext text-center">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-lg-4">
                                        <div class="step-box wow fadeInUp" data-wow-delay="0.2s">
                                            <i><img src="{{url('')}}/assets/images/setp-img1.png" alt="setp-img1.png" itemprop="image"> <span class="brd-rd50 red-bg">1</span></i>
                                            <div class="setp-box-inner">
                                                <h4 itemprop="headline">Explore Restaurants</h4>
                                                <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                            </div>
                                        </div><!-- Step Box -->
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-lg-4">
                                        <div class="step-box wow fadeInUp" data-wow-delay="0.4s">
                                            <i><img src="{{url('')}}/assets/images/setp-img2.png" alt="setp-img2.png" itemprop="image"> <span class="brd-rd50 red-bg">2</span></i>
                                            <div class="setp-box-inner">
                                                <h4 itemprop="headline">Choose a Tasty Dish</h4>
                                                <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                            </div>
                                        </div><!-- Step Box -->
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-lg-4">
                                        <div class="step-box wow fadeInUp" data-wow-delay="0.6s">
                                            <i><img src="{{url('')}}/assets/images/setp-img3.png" alt="setp-img3.png" itemprop="image"> <span class="brd-rd50 red-bg">3</span></i>
                                            <div class="setp-box-inner">
                                                <h4 itemprop="headline">Follow The Status</h4>
                                                <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                            </div>
                                        </div><!-- Step Box -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="block gray-bg top-padd210">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="filters-wrapper">
                            <div class="title1-wrapper">
                                <i><img src="{{ url('assets/images/resource/icon.png') }}" alt=""></i>
                                <div class="title1-inner">
                                    <span>Meat you love the most</span>
                                    <h2 itemprop="headline">Explore by Bestsellers</h2>

                                </div>
                            </div>
                            <div class="row">
                                    <?php $i=1;?>
                                   @foreach($best as $productbest)
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                                 {{ Form::open(array('url' => 'cartadd')) }}
                                                 @csrf
                                                 <input type="hidden" name="pid" value="{{$productbest->id}}">
                                                    <div class="popular-dish-box style1 wow fadeIn" data-wow-delay="0.{{$i++}}s">
                                                        <div class="popular-dish-thumb">
                                                            <a href="{{url('product').'/'.$product->id}}" title="" itemprop="url"><img src="{{url('')}}/products/{{$productbest->image}}" alt="popular-dish-img1.jpg" itemprop="image"></a>
                                                          
                                                        </div>
                                                        <div class="popular-dish-info">
                                                            <h4 itemprop="headline"><a href="{{url('product').'/'.$productbest->id}}" title="" itemprop="url">{{$productbest->name}}</a></h4>
                                                            <p>{!!$productbest->short_descrip!!}</p>
                                                             <span class="price "> 
                                                            @if($productbest->b_price)
                                                            <del>MRP: ₹{{$productbest->b_price}}</del>
                                                            MRP: ₹ {{$productbest->s_price}}
                                                            @else
                                                            MRP: ₹ {{$productbest->s_price}}
                                                            @endif
                                                            &nbsp;
                                                             
                                                             </span>
                                                              <span style="color: green;text-transform: uppercase;font-weight: 600">@if($productbest->b_price)
                                                              @if(number_format(($productbest->b_price-$productbest->s_price)/$productbest->b_price *100) > 0)
                                                            {{number_format(($productbest->b_price-$productbest->s_price)/$productbest->b_price *100)}}
                                                            % Off
                                                              @endif
                                                            @endif</span>
                                                            <a class="brd-rd4 " id="hide-{{$productbest->id}}" data-value="{{$productbest->id}}" href="javascript:void(0)" title="Order Now" itemprop="url">ADD TO CART</a>
                                                           
                                                            <div id="show-{{$productbest->id}}"></div>
                                                           
                                                        </div>
                                                    </div><!-- Product Box -->
                                                    {{ Form::close() }}
                                                </div>
                                   @endforeach
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        


        <section>
            <div class="block bottom-padd210">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="title1-wrapper text-center">
                                <div class="title1-inner">
                                    <h2 itemprop="headline">Check out our blog</h2>
                                </div>
                            </div>
                            <div class="remove-ext">
                                <div class="row">
                                    @if(!empty($blogs))
                                      @foreach($blogs as $blog)
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="news-box wow fadeIn" data-wow-delay="0.2s">
                                            <div class="news-thumb">
                                                <a class="brd-rd2" href="blog-detail-right-sidebar.html" title="" itemprop="url"><img src="
                                                    @if(!empty($blog->image))
                                                        {{url('')}}/blogs/{{$blog->image}}
                                                    @else
                                                    {{ url('assets/images/resource/news-img1.jpg') }}
                                                    @endif
                                                    " alt="news-img1.jpg" itemprop="image"></a>
                                                <div class="news-btns">
                                                    <a class="post-date red-bg" href="#" title="" itemprop="url">{{date('F y' ,strtotime($blog->created_at))}}</a>
                                                    <a class="read-more" href="{{url('')}}/blog/{{$blog->id}}" itemprop="url">READ MORE</a>
                                                </div>
                                            </div>
                                            <div class="news-info">
                                                <h4 itemprop="headline"><a href="{{url('')}}/blog/{{$blog->id}}" title="" itemprop="url">{!!$blog->title!!}</a></h4>
                                                <p itemprop="description">{!!$blog->subtitle!!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      <style type="text/css">
          .modal-content{
              max-width: 480px;
          }
          label {
          width: 100%;

          }
          .location-heading{
              padding-left: 5px;
          margin-top: 5px;
          padding-bottom: 17px;
          padding-top: 17px;
          text-decoration: none;
          border: none;
          color: #fff;
          background-color: #306f06;
          }
          .card-input-element {
              display: none;
          }

          .card-input {
              margin: 10px;
              padding: 00px;

          }

          .card-input:hover {
              cursor: pointer;
          }

          .card-input-element:checked + .card-input {
               box-shadow: 0 0 10px 4px #ea1b25;
           }
           .select-pin{
              border-radius: 2px solid #306f06;
              padding-bottom: 15px;
              padding-top: 15px;
              background-color: #306f06;
           }
     </style>
        @if(empty(session()->get('pinlocation')))
        <div class="newsletter-popup-wrapper text-center">

              <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                          <div class="modal-logo"><img src="/assets/images/logo2.png"></div>
                          <h4><i class="fa fa-map-marker"></i> Please select your location</h4>
                          <p>Wholesome meat, swift delivery.</p>
                        </div>
                        <div class="modal-body" style="padding: 0px">
                            <div class="" >
                                <form action="{{url('')}}/location/saved" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <label>
                                      <input type="radio" name="weblocation" class="card-input-element" value="East Delhi" <?=((session()->get('location'))=='East Delhi'?'checked':'' )?> />

                                        <div class=" card-input">
                                          <div class="location-heading">East Delhi</div>
                                         </div>

                                    </label>
                                    
                                </div>

                                <div class="col-md-12">
                                    <label>
                                      <input type="radio" name="weblocation" class="card-input-element" value="Ghaziabad" <?=((session()->get('location'))=='Ghaziabad'?'checked':'' )?> />

                                        <div class=" card-input">
                                          <div class="location-heading">Ghaziabad</div>
                                         </div>

                                    </label>
                                    
                                </div>

                               
                                <div class="col-md-12">
                                    <label>
                                      <input type="radio" name="weblocation" class="card-input-element" value="Noida" <?=((session()->get('location'))=='Noida'?'checked':'' )?> />

                                        <div class=" card-input">
                                          <div class="location-heading">Noida</div>
                                         </div>

                                    </label>
                                    
                                </div>
                            </form>
                            </div>

                            <div class=" col-md-12 text-center" style="">
                              <div class=""  >
                              <?php
                              $json_string =    file_get_contents("locationpin.json");
                              $parsed_json = json_decode($json_string, true);
                              ?>
                              <form action="{{url('')}}/pincode/saved" method="post" style="display: flex;color: #fff !important">
                            @csrf
                            <i class="fa fa-map-marker"></i>
                            <select data-placeholder="Feel Like Eating" name="pinlocation" onchange="this.form.submit()">
                            @if(!empty(session()->get('pinlocation')))
                            <option selected="" value="{{session()->get('pinlocation')}}" >
                               {{session()->get('pinlocation')}}</option>
                            @else
                            <option>Check Delivery  Availabilty </option>

                            @endif
                            @foreach($parsed_json as $key =>$value)
                            
                                @foreach($value as $meg =>$locdetail)
                                    <option value="{{($locdetail['Area'])}} ,{{($locdetail['Pincode'])}}">{{($locdetail['Area'])}} ,{{($locdetail['Pincode'])}}</option>

                                @endforeach 
                               
                            @endforeach

                        </select>
                        </form>
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                           
                        </div>
                 </div><!-- /.modal-content -->
              </div>   
        </div>
        @endif

        <section>
            <div class="block no-padding red-bg">
                <img class="bottom-clouds-mockup" src="{{ url('assets/images/resource/clouds2.png') }}" alt="clouds2.png" itemprop="image">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="app-sec">
                                <div class="row">
                                    <div class="col-md-4 hidden-sm col-md-offset-1 col-sm-4 col-sm-offset-0 col-lg-4 col-lg-offset-1">
                                        <div class="app-mockup text-right overlape-110 wow fadeInUp" data-wow-delay="0.2s"><img src="{{ url('assets/images/resource/app-mockup.png') }}" alt="app-mockup.png" itemprop="image"></div>
                                    </div>
                                    <div class="col-md-6 col-md-offset-1 col-sm-12 col-sm-offset-0 col-lg-6 col-lg-offset-1">
                                        <div class="app-info">
                                            <h4 itemprop="headline">The Best Food Delivery App</h4>
                                            <p itemprop="description">We have a launch team that focuses on one city at a time. At the end of the day, we're a marketplace. In order to make an effective marketplace, you need critical mass.</p>
                                            <div class="app-download-btns">
                                                <a class="wow zoomInUp" data-wow-delay="0.2s" href="#" title="Google Play Store" itemprop="url" target="_blank"><img src="{{ url('assets/images/resource/app-download-btn1.png') }}" alt="app-download-btn1.png" itemprop="image"></a>
                                                <a class="wow zoomInUp" data-wow-delay="0.4s" href="#" title="Apple App Store" itemprop="url" target="_blank"><img src="{{ url('assets/images/resource/app-download-btn2.png') }}" alt="app-download-btn2.png" itemprop="image"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- App Section -->
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- red section -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{url('assets/js/custom.js')}}"></script>     
<script type="text/javascript">
    $(document).ready(function(){
        $('input[type=radio]').on('change', function() {
        $(this).closest("form").submit();
    });
        

});
</script>