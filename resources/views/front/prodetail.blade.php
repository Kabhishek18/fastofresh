   @include('../status')
        <section>
            <div class="gray-bg">
         
                <div class="sec-box">
                    <div class="container">
                        <div class="row">
                            <div class="title2-wrapper" >
                                  <div class="bread-crumbs-wrapper">

                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{url('')}}" title="" itemprop="url">Home</a></li>
                                                <li class="breadcrumb-item active">{{$product->name}}</li>
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
                                                               <div class="col-sm-12 col-md-6 col-lg-6 text-center" >
                                                                   
                                                                            <div class="price "> 
                                                                            @if($product->b_price)
                                                                            <del>MRP: ₹{{$product->b_price}}</del>
                                                                            MRP: ₹ {{$product->s_price}}
                                                                            @else
                                                                            MRP: ₹ {{$product->s_price}}
                                                                            @endif
                                                                             </div>
                                                                </div>
                                                                  <div class="col-sm-12 col-md-6 col-lg-6  text-center"  >        
                                                                          @if($product->b_price)
                                                                              @if(number_format(($product->b_price-$product->s_price)/$product->b_price *100) > 0)   
                                                                            <div class="btn btn-default" style="background: green;color: white;font-size: 18px;text-transform: uppercase;font-weight: 600;">
                                                                            {{number_format(($product->b_price-$product->s_price)/$product->b_price *100)}}
                                                                            % Off
                                                                           
                                                                            </div>
                                                                               @endif
                                                                            @endif
                                                                     
                                                               </div> 
                                                                
                                                                 <div class="col-sm-12 col-md-6 col-lg-6" > 
                                                                     <a class="btn btn-default" id="hide-{{$product->id}}" data-value="{{$product->id}}" href="javascript:void(0)" title="Order Now" style="background: #800000;color:#face82" itemprop="url">ADD TO CART</a>
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

 <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<style type="text/css">


  .frame {
    float: left;
      overflow: hidden;
    position: relative;
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
      background-color: rgba(0, 0, 0, 0.9);
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

  .frame a .caption li {
    color: white !important;
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
                                      <div class="col-md-3 col-sm-3 col-xs-12" style="margin-bottom:20px" >
                                        <div class="frame text-center">
                                        <a href="{{url('')}}/recipes/{{$recipe->id}}">
                                            <span class="caption">
                                                <h2 style="color: green !important"> {!!$recipe->title!!}</h2>
                                            <p class="desc" style=" overflow: hidden; -webkit-transition: max-height .75s;  transition: max-height .75s;">{!!$recipe->description!!}</p>
                                            </span>
                                        <img src="{{url('')}}/recipes/{{$recipe->image}}" class="img-responsive" alt="a" style="width:100% ;height :250px !important" >
                                        </a>  
                                      </div>
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