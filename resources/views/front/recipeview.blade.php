   <section>
            <div class="block">
                <div class="fixed-bg" style="background-image: url(recipes/{{$recipe->image}});"></div>
                <div class="page-title-wrapper text-center">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="page-title-inner">
                            <h1 itemprop="headline">Recipe Detail</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="bread-crumbs-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                    <li class="breadcrumb-item active">Recipe</li>
                </ol>
            </div>
        </div>

        <section>
            <div class="block less-spacing gray-bg">
                <div class="sec-box bottom-padd140">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <div class="blog-detail-wrapper">
                                            <div class="blog-detail-thumb wow fadeIn" data-wow-delay="0.2s">
                                                <img src="{{url('')}}/recipes/{{$recipe->image}}" alt="blog-detial-img2-1.jpg"  width="100%" itemprop="image">
                                            </div>
                                            <div class="blog-detail-info">
                                                <span class="post-detail-date red-clr"><i class="fa fa-clock-o"></i>{{date('F dy',strtotime($recipe->created_at))}}</span>
                                               
                                            </div>
                                            <h1 itemprop="headline">{!!$recipe->title!!}</h1>
                                            {!!$recipe->ingredient!!}

                                            {!!$recipe->description!!}
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Section Box -->
            </div>
        </section>
