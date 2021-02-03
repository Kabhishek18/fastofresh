
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
                                                            <!-- <li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-info"></i>Information</a></li> -->
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade in active" id="tab1-1">
                                                              {!!$product->description!!}
                                                            </div>
                                                            <!-- <div class="tab-pane fade in" id="tab1-2">
                                                                {!!$product->information!!}

                                                            </div> -->
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
                                                                             <span class="price" style="color: green;text-transform: uppercase;font-weight: 600">@if($product->b_price)
                                                              @if(number_format(($product->b_price-$product->s_price)/$product->b_price *100) > 0)
                                                            {{number_format(($product->b_price-$product->s_price)/$product->b_price *100)}}
                                                            % Off
                                                              @endif
                                                            @endif</span>
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

 <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<style type="text/css">


.frame {
  float: left;
  height: 250px;
    overflow: hidden;
  position: relative;
  width: calc(100% - 75%);
}

.frame a {
  display: block;
    height: 100%;
  width: 100%;
}



.frame:nth-child(2) img {
  top: -90%;
  left: -70%;
}
.frame:nth-child(3) img {
  top: -90%;
}

.frame a .caption {
    background-color: rgba(0, 0, 0, 0.7);
    display: block;
  overflow: hidden;
  padding: 10px;
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  top: 180px;
    transition-property: top;
  transition-duration: 0.2s;  
  width: 100%;  
  z-index: 10;
}

.frame a:hover .caption {
    top: 0;
  transition: all 2s;
}

.frame a .caption h2 {
  color: orange;
  font-size: 32px;
    margin-bottom: 20px;
}

.frame a .caption p {
  color: white;
  display: none;
  line-height: 150%;
  transition: all 0.2s;  
  width: 90%;
}

.frame a:hover .caption p {
  display: block;
  margin-bottom: 20px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->

<!-- partial -->
 


                            
                            @if(!empty($recipes))
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="sec-wrapper">
                                    <div class="row">
                                      <div class="row">
                                          <div class="col-md-9 ">
                                              <h3>Recipes</h3>
                                          </div>
                                        
                                      </div>
                                      <section id="main">
                                      @foreach($recipes as $recipe) 

                                 
                                      <div class="frame">
                                        <a href="#">
                                            <span class="caption">
                                                <h2> {!!$recipe->title!!}</h2>
                                            <p class="desc">Atomic Robo is an American comic book series depicting the adventures of the eponymous character, a self-aware robot built by a fictional version of Nikola Tesla, created by 8-Bit Theater writer Brian Clevinger and artist Scott Wegener.</p>
                                            </span>
                                        <img src="{{url('')}}/recipes/{{$recipe->image}}" class="img-responsive" alt="a" style="width:100% ;height :250px !important" >
                                        </a>  
                                      </div>
                                  



                                          @endforeach
                                     </section>     
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