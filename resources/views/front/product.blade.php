        <section>
            <div class="gray-bg ">

                @include('../status')
                <div class="sec-box ">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="sec-wrapper">
                                    <div class="row">
                                         <div class="bread-crumbs-wrapper">

                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                                                <li class="breadcrumb-item active">All Category</li>
                                            </ol>

                                            </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <div class="title2-wrapper">
                                                <h3 class="marginb-0" itemprop="headline">About {{$category->name}}</h3>
                                            </div>
                                            <div class="remove-ext">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        {!!$category->description!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Section Box -->
            </div>
        </section>
        <section>
            <div class="gray-bg ">
                <div class="sec-box bottom-padd140">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="sec-wrapper">
                                    <div class="row">
                             
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                      

                                           
                                           
                                            <div class="remove-ext">
                                                <div class="row">
                                                
                                                 <!-- Product Shuffling -->
                                                 <?php $i=1;?>
                                                 @foreach ($products as $product)
                                                
                                                 <div class="col-md-4 col-sm-6 col-lg-4">
                                                 {{ Form::open(array('url' => 'cartadd')) }}
                                                 @csrf
                                                 <input type="hidden" name="pid" value="{{$product->id}}">
                                                    <div class="popular-dish-box  parent style1 wow fadeIn" data-wow-delay="0.{{$i++}}s">
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
                                                             </span>
                                                             <span>
                                                                  @if($product->b_price)
                                                              @if(number_format(($product->b_price-$product->s_price)/$product->b_price *100) > 0)
                                                            Discount
                                                            {{number_format(($product->b_price-$product->s_price)/$product->b_price *100)}}
                                                            <i class="fa fa-percent"></i> 
                                                              @endif
                                                            
                                                            
                                                            @endif
                                                             </span>
                                                            </div>
                                                            <div class="col-sm-12 d-flex justify-content-center"> 
                                                            <a class="btn btn-danger" id="hide-{{$product->id}}" data-value="{{$product->id}}" href="javascript:void(0)" title="Order Now" style="background: #ea1b25" itemprop="url">ADD TO CART</a>
                                                           
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
                        </div>
                    </div>
                </div><!-- Section Box -->
            </div>
        </section>

        <section>
            <div class="block no-padding red-bg">
                <img class="bottom-clouds-mockup" src="{{ url('assets/images/resource/clouds2.png')}}" alt="clouds2.png" itemprop="image">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="app-sec">
                                <div class="row">
                                    <div class="col-md-4 hidden-sm col-md-offset-1 col-sm-4 col-sm-offset-0 col-lg-4 col-lg-offset-1">
                                        <div class="app-mockup text-right overlape-110 wow fadeInUp" data-wow-delay="0.2s"><img src="{{ url('assets/images/resource/app-mockup.png')}}" alt="app-mockup.png" itemprop="image"></div>
                                    </div>
                                    
                                    <div class="col-md-6 col-md-offset-1 col-sm-12 col-sm-offset-0 col-lg-6 col-lg-offset-1">
                                        <div class="app-info">
                                            <h4 itemprop="headline">The Best Food Delivery App</h4>
                                            <p itemprop="description">We have a launch team that focuses on one city at a time. At the end of the day, we're a marketplace. In order to make an effective marketplace, you need critical mass. We need enough restaurants that  quality and variety</p>
                                            <div class="app-download-btns">
                                                <a class="wow zoomInUp" data-wow-delay="0.2s" href="#" title="Google Play Store" itemprop="url" target="_blank"><img src="{{ url('assets/images/resource/app-download-btn1.png')}}" alt="app-download-btn1.png" itemprop="image"></a>
                                                <a class="wow zoomInUp" data-wow-delay="0.4s" href="#" title="Apple App Store" itemprop="url" target="_blank"><img src="{{ url('assets/images/resource/app-download-btn2.png')}}" alt="app-download-btn2.png" itemprop="image"></a>
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