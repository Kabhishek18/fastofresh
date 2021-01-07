
<style>
.qty {
    width: 40px;
    height: 25px;
    text-align: center;
}
input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25px;}

</style>
        <section>
            <div class="block">
				<div class="fixed-bg" style="background-image: url({{ url('assets/images/topbg.jpg')}});"></div>
                <div class="page-title-wrapper text-center">
					<div class="col-md-12 col-sm-12 col-lg-12">
						<div class="page-title-inner">
							<h1 itemprop="headline">Search Your Favourite Food</h1>
							<form class="restaurant-search-form brd-rd2">
								<div class="row mrg10">
									<div class="col-md-6 col-sm-5 col-lg-5 col-xs-12">
										<div class="input-field brd-rd2"><input class="brd-rd2" type="text" placeholder="Restaurant Name"></div>
									</div>
									<div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
										<div class="input-field brd-rd2"><i class="fa fa-map-marker"></i><input class="brd-rd2" type="text" placeholder="Search Location"><i class="fa fa-location-arrow"></i></div>
									</div>
									<div class="col-md-2 col-sm-3 col-lg-3 col-xs-12">
										<button class="brd-rd2 red-bg" type="submit">SEARCH</button>
									</div>
								</div>
							</form>
						</div>
					</div>
                </div>
            </div>
        </section>

        <div class="bread-crumbs-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                    <li class="breadcrumb-item active">All Category</li>
                </ol>
            </div>
        </div>
        <section>
            <div class="gray-bg bottom-padd210">
            @if(Session::has('success'))
            <div class="alert alert-info">{{ Session::get('success') }}</div>
            @endif
                <div class="sec-box bottom-padd140">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="sec-wrapper">
                                    <div class="row">
                             
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <div class="title2-wrapper">
                                                <h3 class="marginb-0" itemprop="headline">{{$category->name}}</h3>
                                            </div>
                                            <div class="remove-ext">
                                                <div class="row">
                                                
                                                 <!-- Product Shuffling -->
                                                 @foreach ($products as $product)
                                                
                                                 <div class="col-md-4 col-sm-6 col-lg-4">
                                                 {{ Form::open(array('url' => 'cart')) }}
                                                 @csrf
                                                 <input type="hidden" name="pid" value="{{$product->id}}">
                                                    <div class="popular-dish-box style2 wow fadeIn" data-wow-delay="0.2s">
                                                        <div class="popular-dish-thumb">
                                                            <a href="food-detail.html" title="" itemprop="url"><img src="{{$product->image}}" alt="popular-dish-img1.jpg" itemprop="image"></a>
                                                            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 4.25</span>
                                                        </div>
                                                        <div class="popular-dish-info">
                                                            <h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">{{$product->name}}</a></h4>
                                                            <p itemprop="description">{{$product->short_descrip}}</p>
                                                            <span class="price">MRP: ₹ 456 </span>
                                                            <a class="brd-rd4 " id="hide-{{$product->id}}" data-value="{{$product->id}}" href="javascript:void(0)" title="Order Now" itemprop="url">ADD TO CART</a>
                                                           
                                                            <div id="show-{{$product->id}}"></div>
                                                           
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