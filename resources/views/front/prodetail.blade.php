
        <section>
            <div class="gray-bg">
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
                                                              {!!$product->description!!}
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
                                                               </div> 
                                                                
                                                                <div class="col-md-6 col-sm-12 col-lg-6 ">
                                                                  <div class="col-sm-12 d-flex justify-content-center" style="margin-top: 15px;"> 
                                                                     <a class="btn btn-danger" id="hide-{{$product->id}}" data-value="{{$product->id}}" href="javascript:void(0)" title="Order Now" style="background: #ea1b25" itemprop="url">ADD TO CART</a>
                                                                     <div id="show-{{$product->id}}"></div>
                                                            
                                                                    </div>         
                                                               
                                                               
                                                                </div>
                                                            </div><!-- Product Box -->
                                                                {{ Form::close() }}
                                                          
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            @if(!empty($recipes))
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="sec-wrapper">
                                    <div class="row">
                                      <div class="row">
                                          <div class="col-md-9">
                                              <h3>
                                                  Recipes</h3>
                                          </div>
                                        
                                      </div>
                                      @foreach($recipes as $recipe) 
                                            <div class="col-sm-3">
                                                <div class="col-item">
                                                    <div class="photo">
                                                        <img src="{{url('')}}/recipes/{{$recipe->image}}" class="img-responsive" alt="a" style="width:100% ;height :250px !important" />
                                                    </div>
                                                    <div class="text-default" style="text-align: center;text-transform: capitalize;">
                                                        <div class="row">
                                                            <div class=" col-md-12">
                                                                <h5>
                                                                   {!!$recipe->title!!}</h5>
                                                               
                                                            </div>
                                                           
                                                        </div>
                                                   
                                                        <div class="clearfix">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          @endforeach
                                  </div>
                                </div>
                            </div>    
                            @endif
                        </div>
                    </div>
                </div><!-- Section Box -->
            </div>
        </section>
     
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{url('assets/js/custom.js')}}"></script>