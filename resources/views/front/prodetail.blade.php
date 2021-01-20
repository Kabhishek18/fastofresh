<style type="text/css">
    .tcb-product-slider {
  background: #333;
  background-image: url(https://unsplash.it/1240/530?image=721);
  background-size: cover;
  background-repeat: no-repeat;
  padding: 100px 0;
}
.tcb-product-slider .carousel-control {
  width: 5%;
}
.tcb-product-item a {
  color: #147196;
}
.tcb-product-item a:hover {
  text-decoration: none;
}
.tcb-product-item .tcb-hline {
  margin: 10px 0;
  height: 1px;
  background: #ccc;
}
@media all and (max-width: 768px) {
  .tcb-product-item {
    margin-bottom: 30px;
  }
}
.tcb-product-photo {
  text-align: center;
  height: 180px;
  background: #fff;
}
.tcb-product-photo img {
  height: 100%;
  display: inline-block;
}
.tcb-product-info {
  background: #f0f0f0;
  padding: 15px;
}
.tcb-product-title h4 {
  margin-top: 0;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}
.tcb-product-rating {
  color: #acacac;
}
.tcb-product-rating .active {
  color: #FFB500;
}
.tcb-product-price {
  color: firebrick;
  font-size: 18px;
}



.details {
    margin: 50px 0; }
 .details h1 {
      font-size: 32px;
      text-align: center;
      margin-bottom: 3px; }
    .details .back-link {
      text-align: center; }
      .details .back-link a {
        display: inline-block;
        margin: 20px 0;
        padding: 15px 30px;
        background: #333;
        color: #fff;
        border-radius: 24px; }
        .details .back-link a svg {
          margin-right: 10px;
          vertical-align: text-top;
          display: inline-block; }
</style>
        <section>
            <div class="gray-bg bottom-padd210">
            @include('../status')
                <div class="sec-box">
                    <div class="container">
                        <div class="row">
                            <div class="title2-wrapper" >
                                  <div class="bread-crumbs-wrapper">

                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{url('')}}" title="" itemprop="url">Home</a></li>
                                                <li class="breadcrumb-item active">All Category</li>
                                            </ol>

                                            </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                            
                                <div class="sec-wrapper">
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="restaurant-detail-wrapper">
                                                <div class="restaurant-detail-info">
                                                    <div class="restaurant-detail-thumb parent">
                                                        <ul class="restaurant-detail-img-carousel">
                                                            <li><img class="brd-rd3" src="{{url('')}}/products/{{$product->image}}" alt="{{$product->image}}" itemprop="image"></li>
                                                            <li><img class="brd-rd3" src="{{url('')}}/products/{{$product->image}}" alt="{{url('')}}/products/{{$product->image}}" itemprop="image"></li>
                                                            
                                                        </ul>
                                                        <h4 class="ribbon">
                                                            @if($product->b_price)
                                                              @if(number_format(($product->b_price-$product->s_price)/$product->b_price *100) > 0)
                                                            Discount
                                                            {{number_format(($product->b_price-$product->s_price)/$product->b_price *100)}}
                                                            <i class="fa fa-percent"></i> 
                                                              @endif
                                                            
                                                            
                                                            @endif</h4>
                                                        <ul class="restaurant-detail-thumb-carousel">
                                                            <li><img class="brd-rd3" src="{{url('')}}/products/{{$product->image}}" alt="{{$product->image}}" itemprop="image"></li>
                                                            <li><img class="brd-rd3" src="{{url('')}}/products/{{$product->image}}" alt="{{$product->image}}" itemprop="image"></li>
                                                            
                                                        </ul>
                                                    </div>
                                                    
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        
                                                     
                                        <div class="col-md-6" >
                                            <div class="" style="padding-left: 30px;margin: 10px ">
                                                 <h1 itemprop="headline">{{$product->name}}</h1>
                                                
                                                <div class="restaurant-detail-tabs">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-cutlery"></i> Description</a></li>
                                                            <li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-info"></i>Information</a></li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade in active" id="tab1-1">
                                                              <p>{!!$product->description!!}</p>

                                                            </div>
                                                            <div class="tab-pane fade in" id="tab1-2">
                                                                {!!$product->information!!}

                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="restaurant-detail-title">
                                                           
                                                        {{ Form::open(array('url' => 'cartadd')) }}
                                                        @csrf
                                                         <input type="hidden" name="pid" value="{{$product->id}}">
                                                        <div class="popular-dish-box style2 wow fadeIn" data-wow-delay="0.2s">
                                                           
                                                            <div class="popular-dish-info">
                                                               <div class="col-md-6 col-sm-12 col-lg-6 ">
                                                                    <span class="price">MRP: @if($product->b_price)
                                                                    <del>₹ {{$product->b_price}}</del>
                                                                    &nbsp;₹ {{$product->s_price}}
                                                                    @else
                                                                    {{$product->s_price}}
                                                                    @endif
                                                                     </span>
                                                               </div> 
                                                                
                                                                <div class="col-md-6 col-sm-12 col-lg-6 ">
                                                                    <a class="btn btn-danger" style="background-color: #ea1b25;" id="hide-{{$product->id}}" data-value="{{$product->id}}" href="javascript:void(0)" title="Order Now" itemprop="url">ADD TO CART</a>
                                                                </div>                                                            

                                                               
                                                                <div id="show-{{$product->id}}"></div>
                                                               
                                                            </div>
                                                            </div><!-- Product Box -->
                                                                {{ Form::close() }}
                                                          
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="sec-wrapper">
                                    <div class="row">

                                        <div class="tcb-product-slider">
                                            <div class="container">
                                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                                    <!-- Wrapper for slides -->
                                                    <div class="carousel-inner" role="listbox">
                                                        <div class="item active">
                                                            <div class="row">
                                                                <div class="col-xs-6 col-sm-3">
                                                                    <div class="tcb-product-item">
                                                                        <div class="tcb-product-photo">
                                                                            <a href="#"><img src="https://i.imgur.com/Z7eqMnj.jpg" class="img-responsive" alt="a" /></a>
                                                                        </div>
                                                                        <div class="tcb-product-info">
                                                                            <div class="tcb-product-title">
                                                                                <h4><a href="#">Olympus Photo Camera </a></h4></div>
                                                                            <div class="tcb-product-rating">
                                                                                <i class="active glyphicon glyphicon-star"></i><i class="active glyphicon glyphicon-star"></i><i class="active glyphicon glyphicon-star"></i><i class="active glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i>
                                                                                <a href="#">(4,585 ratings)</a>
                                                                            </div>
                                                                            <div class="tcb-hline"></div>
                                                                            <div class="tcb-product-price">
                                                                                $ 495.00 (17% off)
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-3">
                                                                    <div class="tcb-product-item">
                                                                        <div class="tcb-product-photo">
                                                                            <a href="#"><img src="https://i.imgur.com/fCrZot6.jpg" class="img-responsive" alt="a" /></a>
                                                                        </div>
                                                                        <div class="tcb-product-info">
                                                                            <div class="tcb-product-title">
                                                                                <h4><a href="#">Coca Cola Bottle</a></h4></div>
                                                                            <div class="tcb-product-rating">
                                                                                <i class="active glyphicon glyphicon-star"></i><i class="active glyphicon glyphicon-star"></i><i class="active glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i>
                                                                                <a href="#">(245 ratings)</a>
                                                                            </div>
                                                                            <div class="tcb-hline"></div>
                                                                            <div class="tcb-product-price">
                                                                                $ 99.00 (21% off)
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-3">
                                                                    <div class="tcb-product-item">
                                                                        <div class="tcb-product-photo">
                                                                            <a href="#"><img src="https://i.imgur.com/kTmJp8W.jpg" class="img-responsive" alt="a" /></a>
                                                                        </div>
                                                                        <div class="tcb-product-info">
                                                                            <div class="tcb-product-title">
                                                                                <h4><a href="#">Jewel from Italy</a></h4></div>
                                                                            <div class="tcb-product-rating">
                                                                                <i class="active glyphicon glyphicon-star"></i><i class="active glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i>
                                                                                <a href="#">(345 ratings)</a>
                                                                            </div>
                                                                            <div class="tcb-hline"></div>
                                                                            <div class="tcb-product-price">
                                                                                $ 999.00 (33% off)
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-3">
                                                                    <div class="tcb-product-item">
                                                                        <div class="tcb-product-photo">
                                                                            <a href="#"><img src="https://i.imgur.com/sMwmKmh.jpg" class="img-responsive" alt="a" /></a>
                                                                        </div>
                                                                        <div class="tcb-product-info">
                                                                            <div class="tcb-product-title">
                                                                                <h4><a href="#">White Pepper</a></h4></div>
                                                                            <div class="tcb-product-rating">
                                                                                <i class="active glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i>
                                                                                <a href="#">(45 ratings)</a>
                                                                            </div>
                                                                            <div class="tcb-hline"></div>
                                                                            <div class="tcb-product-price">
                                                                                $ 199.00 (37% off)
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                     
                                                    </div>
                                                    <!-- Controls -->
                                                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        {{var_dump($recipes)}}
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div><!-- Section Box -->
            </div>
        </section>
     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{url('assets/js/custom.js')}}"></script>