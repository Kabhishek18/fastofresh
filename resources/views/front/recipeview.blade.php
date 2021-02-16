
        <div class="bread-crumbs-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                    <li class="breadcrumb-item active">Recipe</li>
                </ol>
            </div>
        </div>

        <section>
            <div class="  gray-bg">
                <div class="sec-box bottom-padd140">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <div class="blog-detail-wrapper">
                                            <div class="blog-detail-thumb wow fadeIn" data-wow-delay="0.2s">
                                                 <h1 itemprop="headline">{!!$recipe->title!!}</h1>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <img src="{{url('')}}/recipes/{{$recipe->image}}" alt="blog-detial-img2-1.jpg"  width="100%" itemprop="image">
                                                 | Posted on<span class="post-detail-date red-clr"><i class="fa fa-clock-o"></i>{{date('F d Y',strtotime($recipe->created_at))}}</span>

                                               
                                               
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                            <h3>Ingredients</h3>    
                                            {!!$recipe->ingredient!!}

                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <h3>Description </h3>
                                            {!!$recipe->description!!}
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
