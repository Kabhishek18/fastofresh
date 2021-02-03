   <section>
            <div class="block">
                <div class="fixed-bg" style="background-image: url(blogs/{{$blog->image}});"></div>
                <div class="page-title-wrapper text-center">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="page-title-inner">
                            <h1 itemprop="headline">Blog Detail</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="bread-crumbs-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                    <li class="breadcrumb-item active">Blog</li>
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
                                                <img src="{{url('')}}/blogs/{{$blog->image}}" alt="blog-detial-img2-1.jpg" itemprop="image" width="100%" height="400px">
                                            </div>
                                            <div class="blog-detail-info">
                                                <span class="post-detail-date red-clr"><i class="fa fa-clock-o"></i> {{date('F d y',strtotime($blog->created_at))}}</span>
                                                <div class="post-meta">
                                                    <span style="text-transform: capitalize;"><i class="fa fa-user red-clr" ></i> {{$blog->author}}</span>
                                                    <!-- <span><i class="fa fa-comment-o red-clr"></i> 5 Comments</span> -->
                                                </div>
                                            </div>
                                            <h1 itemprop="headline">{!!$blog->title!!}</h1>
                                            {!!$blog->description!!}
                                                {!!$blog->description!!}
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Section Box -->
            </div>
        </section>
