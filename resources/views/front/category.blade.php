
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
                <div class="sec-box bottom-padd140">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="sec-wrapper">
                                    <div class="row">
                             
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <div class="title2-wrapper">
                                                <h3 class="marginb-0" itemprop="headline">All Categories</h3>
                                            </div>
                                            <div class="remove-ext">
                                                <div class="row">

                                                <!-- Category Shuffling -->
                                                @foreach ($categories as $category)
                                                    <div class="col-md-4 col-sm-4 col-lg-4">
                                                        <div class="featured-restaurant-box with-bg style2 brd-rd12 wow fadeIn" data-wow-delay="0.2s">
                                                            <div class="featured-restaurant-thumb">
                                                                <a href="<?=URL::to('/');?>/category/{{$category->name}}" title="" itemprop="url"><img src="{{url('')}}/categories/{{$category->image}}" alt="{{$category->image}}" itemprop="image"></a>
                                                            </div>
                                                            <div class="featured-restaurant-info">
                                                                <!-- <span class="red-clr">5th Avenue New York 68</span> -->
                                                                <h4 itemprop="headline"><a href="<?=URL::to('/');?>/category/{{$category->name}}" title="" itemprop="url">{{$category->name}}</a></h4>
                                                                <span class="food-types">Type of food: 
                                                                    <a href="#" title="" itemprop="url">{{$category->short_descrip}}</a>
                                                                </span>
                                                                
                                                               
                                                                <a class="brd-rd30" href="<?=URL::to('/');?>/category/{{$category->name}}" title="Order Online"><i class="fa fa-angle-double-right"></i> Explore Now</a>
                                                            </div>
                                                        </div>
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

       