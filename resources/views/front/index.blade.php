
        @include('../status')
   
        <section>
            <div class="block blackish low-opacity">
                <div class="fixed-bg" style="background-image: url({{ url('assets/images/parallax2.jpg') }});"></div>
                <div class="restaurant-searching style2 text-center">
                    <div class="restaurant-searching-inner">
						<span>Delicious <i>Product</i> </span>
                        <h2 itemprop="headline">Order Delivery & Take-Out</h2>
                        <form class="restaurant-search-form2 brd-rd30">
                            <input class="brd-rd30" type="text" placeholder="Search for any delicious product">
                            <button class="brd-rd30 red-bg" type="submit">SEARCH</button>
                        </form>
                    </div>
                </div><!-- Restaurant Searching -->
            </div>
        </section>
		
        <section>
            <div class="block no-padding overlape-45">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="top-restaurants-wrapper">
                                <ul class="restaurants-wrapper style2">
									<?php ?>
                                    @foreach($categories as $category)
									<li class="wow bounceIn" data-wow-delay="0.2s"><div class="top-restaurant"><a class="brd-rd50" href="category/{{$category->name}}" title="Restaurant 1" itemprop="url"><img src="{{$category->image}}" alt="top-restaurant1.png" itemprop="image"></a></div></li>
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
									<p>Proin luctus, justo sit amet laoreet venenatis, libero velit tincidunt mi, nec 
            	fermentum ante massa id quam. In gravida erat vel diam blandit consequat morbi. Ut interdum nuceu egestas arcu uspend isse sodales. Eiusmod tempor incidiunt labore velit dolore magna aliqu sed enimi nim.</p>
									<div class="award">
										<img src="{{ url('assets/images/award.png') }}" alt="">
										<span><em>Delivered </em>Fresh <i>Everyday</i></span>
									</div>
									<span class="sign">
										<img src="{{ url('assets/images/sign.png') }}" alt="">
									</span>
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
                                </div>
                            </div>
                            <div class="remove-ext">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="popular-dish-box style2 wow fadeIn" data-wow-delay="0.2s">
                                            <div class="popular-dish-thumb">
                                                <a href="food-detail.html" title="" itemprop="url"><img src="{{ url('assets/images/resource/Img1.webp') }}" alt="popular-dish-img1.jpg" itemprop="image"></a>
                                                <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 4.25</span>
                                            </div>
                                            <div class="popular-dish-info">
                                                <h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Chicken Curry Cut (Small Pcs)</a></h4>
                                                <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                <span class="price">MRP: ₹ 135</span>
                                                <a class="brd-rd4 " href="food-detail.html" title="Order Now" itemprop="url">ADD TO CART</a>
                                               
                                            </div>
                                        </div><!-- Popular Dish Box -->
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="popular-dish-box style2 wow fadeIn" data-wow-delay="0.4s">
                                            <div class="popular-dish-thumb">
                                                <a href="food-detail.html" title="" itemprop="url"><img src="{{ url('assets/images/resource/Img2.webp') }}" alt="popular-dish-img2.jpg" itemprop="image"></a>
                                                <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 3.25</span>
                                            </div>
                                            <div class="popular-dish-info">
                                                <h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Chicken Breast - Boneless</a></h4>
                                                <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                <span class="price">MRP: ₹ 135</span>
                                                <a class="brd-rd4" href="food-detail.html" title="Order Now" itemprop="url">ADD TO CART</a>
                                                
                                            </div>
                                        </div><!-- Popular Dish Box -->
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="popular-dish-box style2 wow fadeIn" data-wow-delay="0.6s">
                                            <div class="popular-dish-thumb">
                                                <a href="food-detail.html" title="" itemprop="url"><img src="{{ url('assets/images/resource/Img3.webp') }}" alt="popular-dish-img3.jpg" itemprop="image"></a>
                                                <span class="post-rate yellow brd-rd2"><i class="fa fa-star yellow-clr"></i> 5.00</span>
                                            </div>
                                            <div class="popular-dish-info">
                                                <h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Rich Goat Curry Cut</a></h4>
                                                <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                                <span class="price">MRP: ₹ 135</span>
                                                <a class="brd-rd4" href="food-detail.html" title="Order Now" itemprop="url">ADD TO CART</a>
                                               
                                            </div>
                                        </div><!-- Popular Dish Box -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="block remove-bottom blackish low-opacity margin-bottom">
                <div class="fixed-bg" style="background-image: url({{ url('assets/images/parallax3.jpg') }});"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="title1-wrapper text-center text-white">
                                <div class="title1-inner">
                                    <h2 itemprop="headline">Popular Localities </h2>
                                </div>
                            </div>
                            <div class="localities-wrapper">
                                <div class="localities-inner brd-rd2 wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-lg-4">
                                            <ul class="locat-list">
                                                <li>England <span>( 98 Places )</span></li>
                                                <li>Berkshire <span>( 98 Places )</span></li>
                                                <li>Bedfords <span>( 98 Places )</span></li>
                                                <li>Scotland <span>( 98 Places )</span></li>
                                                <li>Cambridges <span>( 98 Places )</span></li>
                                                <li>London <span>( 98 Places )</span></li>
                                                <li>Canada <span>( 98 Places )</span></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-lg-4">
                                            <ul class="locat-list">
                                                <li>England <span>( 98 Places )</span></li>
                                                <li>Berkshire <span>( 98 Places )</span></li>
                                                <li>Bedfords <span>( 98 Places )</span></li>
                                                <li>Scotland <span>( 98 Places )</span></li>
                                                <li>Cambridges <span>( 98 Places )</span></li>
                                                <li>London <span>( 98 Places )</span></li>
                                                <li>Canada <span>( 98 Places )</span></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-lg-4">
                                            <ul class="locat-list">
                                                <li>England <span>( 98 Places )</span></li>
                                                <li>Berkshire <span>( 98 Places )</span></li>
                                                <li>Bedfords <span>( 98 Places )</span></li>
                                                <li>Scotland <span>( 98 Places )</span></li>
                                                <li>Cambridges <span>( 98 Places )</span></li>
                                                <li>London <span>( 98 Places )</span></li>
                                                <li>Canada <span>( 98 Places )</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Localities Wrapper -->
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
                            
							<ul class="filter-buttons right">
								<li class="active"><a class="brd-rd30" data-filter="*" href="#" itemprop="url">All</a></li>
								<li><a class="brd-rd30" data-filter=".filter-item1" href="#" itemprop="url">Chicken</a></li>
								<li><a class="brd-rd30" data-filter=".filter-item2" href="#" itemprop="url">Fish & Seafood</a></li>
								<li><a class="brd-rd30" data-filter=".filter-item3" href="#" itemprop="url">Mutton</a></li>

							</ul><!-- Filter Buttons -->
							<div class="filters-inner style2">
								<div class="row">
									<div class="masonry">
										<div class="col-md-6 col-sm-12 col-lg-6 filter-item filter-item1">
											<div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.1s">
												<div class="featured-restaurant-thumb">
													<a href="food-detail.html" title="" itemprop="url"><img class="brd-rd50" src="{{ url('assets/images/resource/featured-restaurant-img1.jpg') }}" alt="featured-restaurant-img1.jpg" itemprop="image"></a>
												</div>
												<div class="featured-restaurant-info">
													<span class="red-clr">Value Pack</span>
													<h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Chicken Curry Cut Small - Large Pack</a></h4>
													<span class="price">MRP: ₹ 265</span>
													
													<ul class="post-meta">
														<li><i class="fa fa-check-circle-o"></i> Net Wt: 100gms</li>
														<li><i class="flaticon-transport"></i> Tomorrow 7 AM - 9 AM</li>
													</ul>
													<span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 4.25</span>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-12 col-lg-6 filter-item filter-item1">
											<div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.1s">
												<div class="featured-restaurant-thumb">
													<a href="food-detail.html" title="" itemprop="url"><img class="brd-rd50" src="{{ url('assets/images/resource/featured-restaurant-img1.jpg') }}" alt="featured-restaurant-img1.jpg" itemprop="image"></a>
												</div>
												<div class="featured-restaurant-info">
													<span class="red-clr">Value Pack</span>
													<h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Chicken Curry Cut Small - Large Pack</a></h4>
													<span class="price">MRP: ₹ 265</span>
													
													<ul class="post-meta">
														<li><i class="fa fa-check-circle-o"></i> Net Wt: 100gms</li>
														<li><i class="flaticon-transport"></i> Tomorrow 7 AM - 9 AM</li>
													</ul>
													<span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 4.25</span>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-12 col-lg-6 filter-item filter-item1">
											<div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.1s">
												<div class="featured-restaurant-thumb">
													<a href="food-detail.html" title="" itemprop="url"><img class="brd-rd50" src="{{ url('assets/images/resource/featured-restaurant-img1.jpg') }}" alt="featured-restaurant-img1.jpg" itemprop="image"></a>
												</div>
												<div class="featured-restaurant-info">
													<span class="red-clr">Value Pack</span>
													<h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Chicken Curry Cut Small - Large Pack</a></h4>
													<span class="price">MRP: ₹ 265</span>
													
													<ul class="post-meta">
														<li><i class="fa fa-check-circle-o"></i> Net Wt: 100gms</li>
														<li><i class="flaticon-transport"></i> Tomorrow 7 AM - 9 AM</li>
													</ul>
													<span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 4.25</span>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-12 col-lg-6 filter-item filter-item1">
											<div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.1s">
												<div class="featured-restaurant-thumb">
													<a href="food-detail.html" title="" itemprop="url"><img class="brd-rd50" src="{{ url('assets/images/resource/featured-restaurant-img1.jpg') }}" alt="featured-restaurant-img1.jpg" itemprop="image"></a>
												</div>
												<div class="featured-restaurant-info">
													<span class="red-clr">Value Pack</span>
													<h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Chicken Curry Cut Small - Large Pack</a></h4>
													<span class="price">MRP: ₹ 265</span>
													
													<ul class="post-meta">
														<li><i class="fa fa-check-circle-o"></i> Net Wt: 100gms</li>
														<li><i class="flaticon-transport"></i> Tomorrow 7 AM - 9 AM</li>
													</ul>
													<span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 4.25</span>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-12 col-lg-6 filter-item filter-item1">
											<div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.1s">
												<div class="featured-restaurant-thumb">
													<a href="food-detail.html" title="" itemprop="url"><img class="brd-rd50" src="{{ url('assets/images/resource/featured-restaurant-img1.jpg') }}" alt="featured-restaurant-img1.jpg" itemprop="image"></a>
												</div>
												<div class="featured-restaurant-info">
													<span class="red-clr">Value Pack</span>
													<h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Chicken Curry Cut Small - Large Pack</a></h4>
													<span class="price">MRP: ₹ 265</span>
													
													<ul class="post-meta">
														<li><i class="fa fa-check-circle-o"></i> Net Wt: 100gms</li>
														<li><i class="flaticon-transport"></i> Tomorrow 7 AM - 9 AM</li>
													</ul>
													<span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 4.25</span>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-12 col-lg-6 filter-item filter-item1">
											<div class="featured-restaurant-box wow fadeIn" data-wow-delay="0.1s">
												<div class="featured-restaurant-thumb">
													<a href="food-detail.html" title="" itemprop="url"><img class="brd-rd50" src="{{ url('assets/images/resource/featured-restaurant-img1.jpg') }}" alt="featured-restaurant-img1.jpg" itemprop="image"></a>
												</div>
												<div class="featured-restaurant-info">
													<span class="red-clr">Value Pack</span>
													<h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">Chicken Curry Cut Small - Large Pack</a></h4>
													<span class="price">MRP: ₹ 265</span>
													
													<ul class="post-meta">
														<li><i class="fa fa-check-circle-o"></i> Net Wt: 100gms</li>
														<li><i class="flaticon-transport"></i> Tomorrow 7 AM - 9 AM</li>
													</ul>
													<span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star yellow-clr"></i> 4.25</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		
		
		
		<section>
			<div class="block">
                <div class="container">
                    <div class="row">
						<div class="col-md-12 col-sm-12 col-lg-12">
							<div class="title1-wrapper text-center">
								<div class="title1-inner">
									<h2 itemprop="headline">Explore by category</h2>
								</div>
							</div>
						</div>	
						<div class="resturent-services remove-ext">
							<div class="col-md-4 col-sm-6">
								<div class="servise-box wow fadeIn" data-wow-delay="0.2s">
									<figure>
										<img src="{{ url('assets/images/resource/resto-service1.jpg') }}" alt="">
									</figure>
									<div class="uper-meta">
										<i><img src="{{ url('assets/images/icon1.png') }}" alt=""></i>
										<h4><a href="#" title="">CHICKEN</a></h4>
										<span>About electric do in market</span>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="servise-box wow fadeIn" data-wow-delay="0.3s">
									<figure>
										<img src="{{ url('assets/images/resource/resto-service2.jpg') }}" alt="">
									</figure>
									<div class="uper-meta">
										<i><img src="{{ url('assets/images/icon2.png') }}" alt=""></i>
										<h4><a href="#" title="">HAPPY HOUR</a></h4>
										<span>About electric do in market</span>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="servise-box wow fadeIn" data-wow-delay="0.4s">
									<figure>
										<img src="{{ url('assets/images/resource/resto-service3.jpg') }}" alt="">
									</figure>
									<div class="uper-meta">
										<i><img src="{{ url('assets/images/icon3.png') }}" alt=""></i>
										<h4><a href="#" title="">PRE ORDER</a></h4>
										<span>About electric do in market</span>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="servise-box wow fadeIn" data-wow-delay="0.5s">
									<figure>
										<img src="{{ url('assets/images/resource/resto-service4.jpg') }}" alt="">
									</figure>
									<div class="uper-meta">
										<i><img src="{{ url('assets/images/icon4.png') }}" alt=""></i>
										<h4><a href="#" title="">COMBO</a></h4>
										<span>About electric do in market</span>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="servise-box wow fadeIn" data-wow-delay="0.6s">
									<figure>
										<img src="{{ url('assets/images/resource/resto-service5.jpg') }}" alt="">
									</figure>
									<div class="uper-meta">
										<i><img src="{{ url('assets/images/icon5.png') }}" alt=""></i>
										<h4><a href="#" title="">READY TO COOK</a></h4>
										<span>About electric do in market</span>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="servise-box wow fadeIn" data-wow-delay="0.7s">
									<figure>
										<img src="{{ url('assets/images/resource/resto-service6.jpg') }}" alt="">
									</figure>
									<div class="uper-meta">
										<i><img src="{{ url('assets/images/icon6.png') }}" alt=""></i>
										<h4><a href="#" title="">KEBABS</a></h4>
										<span>About electric do in market</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- our services -->
		
		<section>
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
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="news-box wow fadeIn" data-wow-delay="0.2s">
                                            <div class="news-thumb">
                                                <a class="brd-rd2" href="blog-detail-right-sidebar.html" title="" itemprop="url"><img src="{{ url('assets/images/resource/news-img1.jpg') }}" alt="news-img1.jpg" itemprop="image"></a>
                                                <div class="news-btns">
                                                    <a class="post-date red-bg" href="#" title="" itemprop="url">DEC 2020</a>
                                                    <a class="read-more" href="blog-detail-right-sidebar.html" itemprop="url">READ MORE</a>
                                                </div>
                                            </div>
                                            <div class="news-info">
                                                <h4 itemprop="headline"><a href="blog-detail-right-sidebar.html" title="" itemprop="url">Make Hyderabadi Mutton Masala</a></h4>
                                                <p itemprop="description">The only thing bad about the place was the time they .took to provide us with our food</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="news-box wow fadeIn" data-wow-delay="0.4s">
                                            <div class="news-thumb">
                                                <a class="brd-rd2" href="blog-detail-left-sidebar.html" title="" itemprop="url"><img src="{{ url('assets/images/resource/news-img2.jpg') }}" alt="news-img2.jpg" itemprop="image"></a>
                                                <div class="news-btns">
                                                    <a class="post-date red-bg" href="#" title="" itemprop="url">DEC 2020</a>
                                                    <a class="read-more" href="blog-detail-left-sidebar.html" itemprop="url">READ MORE</a>
                                                </div>
                                            </div>
                                            <div class="news-info">
                                                <h4 itemprop="headline"><a href="blog-detail-right-sidebar.html" title="" itemprop="url">Make Hyderabadi Mutton Masala</a></h4>
                                                <p itemprop="description">The only thing bad about the place was the time they .took to provide us with our food</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 col-lg-4">
                                        <div class="news-box wow fadeIn" data-wow-delay="0.6s">
                                            <div class="news-thumb">
                                                <a class="brd-rd2" href="blog-detail.html" title="" itemprop="url"><img src="{{ url('assets/images/resource/news-img3.jpg') }}" alt="news-img3.jpg" itemprop="image"></a>
                                                <div class="news-btns">
                                                    <a class="post-date red-bg" href="#" title="" itemprop="url">DEC 2020</a>
                                                    <a class="read-more" href="blog-detail.html" itemprop="url">READ MORE</a>
                                                </div>
                                            </div>
                                            <div class="news-info">
                                                <h4 itemprop="headline"><a href="blog-detail-right-sidebar.html" title="" itemprop="url">Make Hyderabadi Mutton Masala</a></h4>
                                                <p itemprop="description">The only thing bad about the place was the time they .took to provide us with our food</p>
                                            </div>
                                        </div>
                                    </div>
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

    