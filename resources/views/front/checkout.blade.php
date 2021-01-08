       
        <section>
            <div class="gray-bg">
            @include('../status')
                <div class="sec-box">
                    <div class="container">
                        <div class="row">
                            <div class="title2-wrapper" >
                            <h1 itemprop="headline">Checkout</h1>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                            
                                <div class="sec-wrapper">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12 col-lg-8">
                                            <div class="restaurant-detail-wrapper">
                                              <div class="form-group">
                                                <label for="">Full Name</label>
                                                <input type="text" class="form-control" name="full name" placeholder="Full Name">
                                              </div>
                                              <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Full Name">
                                              </div>    
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 col-lg-4">
                                            <div class="order-wrapper wow fadeIn" data-wow-delay="0.2s">
                                                <div class="order-inner gradient-brd">
                                                    <h4 itemprop="headline">Your Order</h4>
                                                    <div class="order-list-wrapper">
                                                        <ul class="order-list-inner">
                                                        <?php $cart = session()->get('cart');
                                                        ?>
                                                        <?php $i =1;$total = 0 ;?>
                                                        @foreach($cart as $id => $details)
                                                        <?php $total += $details['price'] * $details['quantity'] ?>
                                                            <li>
                                                                <div class="dish-name">
                                                                    <i>1.</i> <h6 itemprop="headline">{{ $details['name'] }}  X ({{$details['quantity'] }})</h6> <span class="price">₹ {{ $details['price'] }}</span>
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
                                                            <li><a class="brd-rd2" href="#" title="" itemprop="url">CHECKOUT ORDER</a></li>
                                                        </ul>
                                                    </div>
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
     

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{url('assets/js/custom.js')}}"></script>