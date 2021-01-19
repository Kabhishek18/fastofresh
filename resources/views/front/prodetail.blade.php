
  
        
        <section>
            <div class="gray-bg">
            @include('../status')
                <div class="sec-box">
                    <div class="container">
                        <div class="row">
                            <div class="title2-wrapper" >
                            <h1 itemprop="headline">{{$product->name}}</h1>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                            
                                <div class="sec-wrapper">
                                    <div class="row">
                                        <div class="<?=(!empty($cart)?'col-md-8':'col-md-12')?> col-sm-12 col-lg-8">
                                            <div class="restaurant-detail-wrapper">
                                                <div class="restaurant-detail-info">
                                                    <div class="restaurant-detail-thumb">
                                                        <ul class="restaurant-detail-img-carousel">
                                                            <li><img class="brd-rd3" src="{{url('')}}/products/{{$product->image}}" alt="{{$product->image}}" itemprop="image"></li>
                                                            <li><img class="brd-rd3" src="{{$product->image}}" alt="{{url('')}}/products/{{$product->image}}" itemprop="image"></li>
                                                            
                                                        </ul>
                                                        <ul class="restaurant-detail-thumb-carousel">
                                                            <li><img class="brd-rd3" src="{{url('')}}/products/{{$product->image}}" alt="{{$product->image}}" itemprop="image"></li>
                                                            <li><img class="brd-rd3" src="{{url('')}}/products/{{$product->image}}" alt="{{$product->image}}" itemprop="image"></li>
                                                            
                                                        </ul>
                                                    </div>
                                                    <div class="restaurant-detail-title">
                                                       
                                                        {{ Form::open(array('url' => 'cartadd')) }}
                                                 @csrf
                                                 <input type="hidden" name="pid" value="{{$product->id}}">
                                                    <div class="popular-dish-box style2 wow fadeIn" data-wow-delay="0.2s">
                                                       
                                                        <div class="popular-dish-info">
                                                           <div class="col-md-6 col-sm-12 col-lg-6 ">
                                                                <span class="price">MRP: ₹ {{$product->s_price}} </span>
                                                           </div> 
                                                            
                                                            <div class="col-md-6 col-sm-12 col-lg-6 ">
                                                                <a class="btn btn-danger" style="background-color: #ea1b25;" id="hide-{{$product->id}}" data-value="{{$product->id}}" href="javascript:void(0)" title="Order Now" itemprop="url">ADD TO CART</a>
                                                            </div>                                                            

                                                           
                                                            <div id="show-{{$product->id}}"></div>
                                                           
                                                        </div>
                                                    </div><!-- Product Box -->
                                                    {{ Form::close() }}
                                                      
                                                    </div>
                                                    <div class="restaurant-detail-tabs">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active"><a href="#tab1-1" data-toggle="tab"><i class="fa fa-cutlery"></i> Description</a></li>
                                                            <li><a href="#tab1-2" data-toggle="tab"><i class="fa fa-info"></i>Information</a></li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade in active" id="tab1-1">
                                                              {{strip_tags(html_entity_decode($product->description))}}

                                                            </div>
                                                            <div class="tab-pane fade in" id="tab1-2">
                                                                {{strip_tags(html_entity_decode($product->information))}}

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                         @if($cart)               
                                        <div class="col-md-4 col-sm-12 col-lg-4">
                                            <div class="order-wrapper wow fadeIn" data-wow-delay="0.2s">
                                                <div class="order-inner gradient-brd">
                                                    <h4 itemprop="headline">Your Order</h4>
                                                    <div class="order-list-wrapper">
                                                        <ul class="order-list-inner">
                                                        
                                                        <?php $i =1;$total = 0 ;?>
                                                        @foreach($cart as $id => $details)
                                                        <?php $total += $details['price'] * $details['quantity'] ?>
                                                            <li>
                                                                <div class="dish-name">
                                                                    <i>{{$i++}}.</i> <h6 itemprop="headline">{{ $details['name'] }}  X ({{$details['quantity'] }})</h6> <span class="price">₹ {{ $details['price'] }}</span>
                                                                </div>
                                                               
                                                            </li>
                                                        @endforeach
                                                        </ul>
                                                        <ul class="order-total">
                                                            <li><span>Total</span> <i>₹  {{ $total }}</i></li>
                                                           
                                                        </ul>
                                                        <ul class="order-method brd-rd2 red-bg">
                                                            <li><span>Total</span> <span class="price">₹  {{ $total }}</span></li>
                                                            <li><span class="radio-box cash-popup-btn"><input type="radio" name="method" id="pay1-1"><label for="pay1-1"><i class="fa fa-money"></i> Cash</label></span> <span class="radio-box card-popup-btn"><input type="radio" name="method" id="pay1-2" checked><label for="pay1-2"><i class="fa fa-credit-card-alt"></i> Online</label></span></li>
                                                            <li><a class="brd-rd2" href="{{url('/checkout')}}" title="" itemprop="url">CHECKOUT ORDER</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
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