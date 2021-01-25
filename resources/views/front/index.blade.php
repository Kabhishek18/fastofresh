
        @include('../status')
   
        <section>
            <div class="block blackish low-opacity">
                <div class="fixed-bg" style="background-image: url({{ url('assets/images/parallax2.jpg') }});"></div>
                <div class="restaurant-searching style2 text-center">
                    <div class="restaurant-searching-inner">
						<span>Delicious <i>Product</i> </span>
                        <h2 itemprop="headline">Order Delivery & Take-Out</h2>
                        <form class="restaurant-search-form2 brd-rd30" action="{{url('')}}/search" method="post">
                            @csrf
                            <input class="brd-rd30" id="search_text" type="text" name="product" placeholder="Search for any delicious product"  list="browsers">
                           <datalist class="searchspecial" id="browsers">
                               
                              </datalist>
                            <button class="brd-rd30 red-bg" type="submit">SEARCH</button>
                        </form>
                    </div>
                </div><!-- Restaurant Searching -->
            </div>
        </section>
		
        <section>
            <div class="block no-padding overlape-95">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="top-restaurants-wrapper">
                                <ul class="restaurants-wrapper style2">
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
        </section><!-- top returents -->
		
		<section>
            <div class="block remove-bottom">
                <div class="container">
                    <div class="row">
						<div class="welcome-sec">
							<div class="col-md-6 col-sm-6 col-lg-6">
								<div class="welcome-secinfo">
									<h2>Welcome To Fast 'O' Fresh </h2>
									<span>We Create Delicious Memories</span>
									<p>We pride ourselves on having hands-on involvement every step of the way literally from the farm to the table. And since quality is so important to us, we figured, why not control the process ourselves? And the best way to do that is to keep it in the family and do the work together.</p><p> We produce quality meats and maintain the highest standards that are the fabric of our business. We own many farms, where we can always be assured that the care and quality that goes into everything is top notch and beyond reproach.</p>
									
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

                                    <h5 >Buy the freshest and most palatable meat from your very own online meat shop. where you will get to enjoy the flavours of freshness and moistness all in one. </h5>
                                
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
                                                    <div class="popular-dish-box  parent style1 wow fadeIn" data-wow-delay="0.{{$i++}}s">
                                                        <div class="popular-dish-thumb">
                                                            <a href="{{url('product').'/'.$product->id}}" title="" itemprop="url"><img src="{{url('')}}/products/{{$product->image}}" alt="popular-dish-img1.jpg" itemprop="image"></a>
                                                           <h4 class="ribbon">
                                                            @if($product->b_price)
                                                              @if(number_format(($product->b_price-$product->s_price)/$product->b_price *100) > 0)
                                                            Discount
                                                            {{number_format(($product->b_price-$product->s_price)/$product->b_price *100)}}
                                                            <i class="fa fa-percent"></i> 
                                                              @endif
                                                            
                                                            
                                                            @endif</h4>
                                                            
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
									<span>Your Favourite Food</span>
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
                                                    <div class="popular-dish-box  parent style1 wow fadeIn" data-wow-delay="0.{{$i++}}s">
                                                        <div class="popular-dish-thumb">
                                                            <a href="{{url('product').'/'.$product->id}}" title="" itemprop="url"><img src="{{url('')}}/products/{{$productbest->image}}" alt="popular-dish-img1.jpg" itemprop="image"></a>
                                                           <h4 class="ribbon">
                                                            @if($productbest->b_price)
                                                              @if(number_format(($productbest->b_price-$productbest->s_price)/$productbest->b_price *100) > 0)
                                                            Discount
                                                            {{number_format(($productbest->b_price-$productbest->s_price)/$productbest->b_price *100)}}
                                                            <i class="fa fa-percent"></i> 
                                                              @endif
                                                            
                                                            
                                                            @endif</h4>
                                                            
                                                        </div>
                                                        <div class="popular-dish-info">
                                                            <h4 itemprop="headline"><a href="{{url('product').'/'.$productbest->id}}" title="" itemprop="url">{{$productbest->name}}</a></h4>
                                                            <p>{!!$productbest->short_descrip!!}</p>
                                                            <span class="price">MRP: ₹ 
                                                            @if($productbest->b_price)
                                                            <del>{{$productbest->b_price}}</del>
                                                            {{$productbest->s_price}}
                                                            @else
                                                            {{$productbest->s_price}}
                                                            @endif
                                                             </span>
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
		
		
	
		
	<!-- 	<section>
            <div class="block gray-bg">
				<div class="top-mockup"><img src="{{ url('assets/images/resource/mockup2.png') }}" alt=""></div>
                <div class="container">
                    <div class="row">
						<div class="col-md-5 col-sm-5">
							<div class="booking-form-sec wow fadeIn" data-wow-delay="0.2s">
								<div class="fit-bg" style="background-image: url({{ url('assets/images/resource/booking-frombg.jpg') }})"></div>
								<div class="form-meta">
									<h2>Book Your Order</h2>
									<span>Place Your Order Now</span>
									<form method="post">
										<input type="text" placeholder="Name">
										<input type="text" placeholder="Email">
										<input type="text" placeholder="Phone No">
										<button type="submit">place order now</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-7 col-sm-7">
							<div class="upcoming-event">
								<div class="title1-wrapper">
									<i><img alt="" src="{{ url('assets/images/resource/icon.png') }}"></i>
									<div class="title1-inner">
										<h2 itemprop="headline">UPCOMING EVENT</h2>
										<b>Place Your Order Now</b>
									</div>
								</div>
								<div class="article-data">
									<div class="article-info-meta">
										<span>Mon</span>
										<a title="" href="#">25 Dec 2020</a>
										<a title="" href="#">By Eat 'O' Fresh</a>
									</div>
									<div class="article-meta">
										<h3><a title="" href="#">
												Kick-Start The New Year With The Serpentine Running Club's Annual
											</a>
										</h3>
										<p>
											Pellentesque nibh felis, eleifend id, commodo in, interdum vitae, leo praese
                Ut eu ligula. Class aptent taciti sociosqu ad litora torquent conubia.
										</p>
										
									</div>
								</div>
								<div class="counter-meta">
									<ul class="countdown">
										<li class="white-bg">
											<span class="days">00</span>
											<p class="days_ref">Days</p>
										</li>
										<li class="white-bg">
											<span class="hours">00</span>
											<p class="hours_ref">Hours</p>
										</li>
										<li class="white-bg">
											<span class="minutes">00</span>
											<p class="minutes_ref">Minutes</p>
										</li>
										<li class="white-bg">
											<span class="seconds">00</span>
											<p class="seconds_ref">Seconds</p>
										</li>
									</ul>
									<a class="view-more" title="" href="#">view more food</a>
								</div>	
							</div>
						</div>
					</div>	
				</div>
				<div class="bottom-mockup"><img src="{{ url('assets/images/resource/mockup1.png') }}" alt=""></div>
            </div>
        </section> -->

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
