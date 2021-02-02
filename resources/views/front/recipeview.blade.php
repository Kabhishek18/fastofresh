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
                                                <img src="{{url('')}}/recipes/{{$recipe->image}}" alt="blog-detial-img2-1.jpg" itemprop="image">
                                            </div>
                                            <div class="blog-detail-info">
                                                <span class="post-detail-date red-clr"><i class="fa fa-clock-o"></i> August 10, 2017</span>
                                                <div class="post-meta">
                                                    <span><i class="fa fa-eye red-clr"></i> 95 Views</span>
                                                    <span><i class="fa fa-comment-o red-clr"></i> 5 Comments</span>
                                                </div>
                                            </div>
                                            <h1 itemprop="headline">{!!$recipe->title!!}</h1>
                                            {!!$recipe->description!!}
                                                {!!$recipe->description!!}
                                            <div class="post-tags red-clr">
                                                <span>Tags:</span>
                                                <a href="#" title="" itemprop="url">#fish</a>,<a href="#" title="" itemprop="url">#pasta</a>,<a href="#" title="" itemprop="url">#soups</a>
                                            </div>
                                            <div class="post-cate red-clr">
                                                <span>Category:</span>
                                                <a href="#" title="Italian cuisine" itemprop="url">Italian cuisine</a>
                                            </div>
                                            <div class="post-share">
                                                <span>Share:</span>
                                                <a class="brd-rd2" href="#" title="Facebook" itemprop="url" target="_blank"><i class="fa fa-facebook"></i></a>
                                                <a class="brd-rd2" href="#" title="Twitter" itemprop="url" target="_blank"><i class="fa fa-twitter"></i></a>
                                                <a class="brd-rd2" href="#" title="Pinterest" itemprop="url" target="_blank"><i class="fa fa-pinterest"></i></a>
                                                <a class="brd-rd2" href="#" title="Google Plus" itemprop="url" target="_blank"><i class="fa fa-google-plus"></i></a>
                                                <a class="brd-rd2" href="#" title="Linkedin" itemprop="url" target="_blank"><i class="fa fa-linkedin"></i></a>
                                                <a class="brd-rd2" href="#" title="Vimeo" itemprop="url" target="_blank"><i class="fa fa-vimeo"></i></a>
                                            </div>
                                            <div class="post-next-prev">
                                                <a class="prev-post" href="#" title="Previous Post" itemprop="url"><i class="fa fa-angle-left"></i> PREV</a> -
                                                <a class="next-post" href="#" title="Next Post" itemprop="url">NEXT <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="author-info-wrapper">
                                            <h3 class="title4" itemprop="headline"><span class="sudo-bottom sudo-bg-red">About</span> The Author</h3>
                                            <div class="author-box">
                                                <img class="brd-rd50" src="assets/images/resource/author-img.jpg" alt="author-img.jpg" itemprop="image">
                                                <div class="author-info">
                                                    <h4 itemprop="headline"><a href="#" title="" itemprop="url">Mr.John Cristopher</a></h4>
                                                    <p itemprop="description">Similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. uni harum quidem sed rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihilares impedit quo repellendus eligendi optio cumque nihilare impedit quo minus id quod maxime.</p>
                                                    <a class="red-clr" href="#" title="Webinane" itemprop="url" target="_blank">webinane.com</a>
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
