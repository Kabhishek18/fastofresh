<style type="text/css">
 

.modal-dialog {
  position: fixed;
  top: auto;
  left: auto;
  right: 0.5rem;
  bottom: 0;
  margin-bottom: 0.5rem;
  min-width: 300px;
  max-width: 400px;
  
  .notice {
    padding: 0rem 1rem;
    
    h4 {
      margin-bottom: 1.5rem;
    }
    
    p {
      margin-bottom: 0.5rem;
    }
  }
  
  .icon {
    font-size: 3rem;
  }
}

</style>
    <section>
            <div class="gray-bg " >
                
                <div class="sec-box " style="margin-top: 30px">
                   @include('../status')

                    <div class="container">

                        <div class="row">
                              <div class="col-md-12 col-sm-12 col-lg-12" >
                                 <div class="title2-wrapper text-center"  style="margin-top:10px;padding-bottom: 20px">
                                                <h3 class="marginb-0" itemprop="headline">Shopping Cart</h3>
                                            </div>
                                            <div class="remove-ext text-center" style="padding-bottom: 100px">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        Free Shipping on order above ₹ 499

                                                    </div>
                                                </div>
                                            </div>
                          
                                 
                              </div>
                            <div class="col-md-12 col-sm-12 col-lg-12" style="background: #f3f6f9ba;
    border-radius: 25px;
    padding: 50px">

                                <div class="sec-wrapper">
                                    <div class="row">
                                           
                                           <div class="container">
                                              <div class="row">
                                                <form action="{{url('')}}/applycoupon" method="post">
                                                <div class="col-md-3">
                                                 
                                                 <div class="form-group">
                                                        @csrf
                                                            <input type="text" name="coupon" class="form-control" placeholder="Redeem Coupon Code">
                                                       </div>
                                                  </div>
                                                
                                                  <div class="col-md-3">
                                                      <div class="form-group"> 
                                                      <button type="submit" class="btn btn-danger" style="background: #800000;border: none">Apply</button>
                                                        
                                                      </div>
                                                  </div>  

                                                  </form>
                                                  </div>
                                              </div>  
                                            </div>
                                            <br>
                                         
                                       
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Product</th>
                                                    <th scope="col" class="hidden-xs">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col" class="hidden-xs">Subtotal</th>
                                                    <th scope="col">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php $total = 0 ;?>
                                                @foreach($cart as $id => $details)
                                            <?php $total += $details['price'] * $details['quantity'] ?>
                                                <tr id="show-{{$details['pid']}}">
                                                    <td data-th="Product">
                                                        <div class="row">
                                                            <div class="col-xs-3 hidden-xs"><img src="{{url('products/')}}/{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                                                            <div class="col-xs-9">
                                                                <p class="nomargin">{{ $details['name'] }}</p>
                                                                
                                                            </div>
                                                            <div class="col-xs-12">
                                                              <span class="hidden-lg hidden-md " style="color:#800000"> Price :  ₹ {{ $details['price'] }}</span>
                                                                 <span class="hidden-lg hidden-md " style="color:#800000"> Subtotal :  ₹ {{ $details['price'] * $details['quantity'] }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-th="Price" class="hidden-xs"><div class="col-sm-12 col-xs-12"  style="padding: 10px">
                                                      ₹ {{ $details['price'] }}
                                                    </div></td>
                                                    <td data-th="Quantity" >
                                                      <div class="col-md-12" style="padding: 10px">
                                                        
                                                         <div class="col-md-4">
                                                           <input type='button' onclick="decrementValueCart(<?=$details['pid']?>)" value='-' class='btn btn-default' field='quantity' />
                                                         </div>
                                                         <div class="col-md-4">
                                                        <input type="number" id="qty<?=$details['pid']?>" value="{{ $details['quantity'] }}" class="form-control updatecart " min="1" style="padding: 10px;border-style: none;background: #f9f9f9;">
                                                         </div>
                                                         <div class="col-md-4">
                                                           
                                                        <input type='button' onclick="incrementValuecart(<?=$details['pid']?>)" value='+' class='btn btn-default' field='quantity' />
                                                         </div>
                                                      </div>
                                                      <div class="col-md-12 text-center hidden-md hidden-lg hidden-xl">
                                                        
                                                        <button class="btn btn-danger btn-sm remove-from-cart" style="background: #800000;border: none;margin-bottom: 10px" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                                                      </div>
                                                    </td>
                                                    <td data-th="Subtotal" class="text-center hidden-xs" >
                                                      <div class="col-md-12"  style="padding: 10px">
                                                        ₹{{ $details['price'] * $details['quantity'] }}
                                                      </div>  
                                                    </td>
                                                    <td class="actions  hidden-xs" data-th="">
                                                        
                                                      <span style="padding: 10px">
                                                          <button class="btn btn-danger btn-sm remove-from-cart" style="background: #800000;border: none;margin-bottom: 10px" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                                                      </span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                @if($total<499)
                                                <?php $ship =30; $total += $ship?>
                                                <tr>
                                                    <td colspan="3" class="hidden-xs"></td>
                                                    <td class="text-center" colspan=""><strong>Delivery Charge</strong></td>
                                                    <td class="text-center" colspan=""><strong>₹ {{$ship}}</strong></td>
                                                    <td colspan="1"></td>
                                                </tr>
                                                @endif
                                                @if(!empty(session()->get('coupon')))
                                                <?php $coupon =session()->get('coupon'); ?>
                                                    <tr>
                                                        <td colspan="3" class="hidden-xs"></td>
                                                        <td class="text-center"><strong>Coupon Applied ({{$coupon->name}})</strong></td>
                                                           @if($coupon->coupon_type =='percent')
                                                           <?php $couponvalue = ($coupon->coupon_value*$total/100) ;?>
                                                           @else
                                                           <?php $couponvalue = ($coupon->coupon_value) ;?>
                                                           @endif  
                                                           <?php if($total >$couponvalue){
                                                            $total = $total - $couponvalue;
                                                               }else{$total = 0;}?>
                                                        <td class="text-center"><strong>₹ {{$couponvalue}}</strong>
                                                            <a href="{{url('')}}/removeCoupon" class="text-danger"><i class="fa fa-trash-o"></i></a></td>
                                                        <td colspan="1"></td>
                                                    </tr>
                                                @endif
                                                <tr class="visible-xs">
                                                    <td class="text-center"><strong>Total ₹  {{ $total }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="{{ url('/') }}" class="btn btn-warning" style="background-color: #ffb100; color: #800000;"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                                    <td><a href="{{ url('/clearcart') }}" class="btn btn-danger" style="background-color: #800000;border:none;"> Clear Cart <i class="fa fa-angle-right"></i></a></td>
                                                    <td colspan="1" class="hidden-xs"></td>
                                                    <td class="hidden-xs text-center"><strong>Total</strong></td>
                                                    <td class="hidden-xs text-center"><strong> ₹ {{ $total }}</strong>
                                                    <td colspan="1" class="hidden-xs"></td>

                                                    </td>
                                                </tr>
                                                </tfoot>

                                            </table>
                                            
                                              <div class="content" align="right">
                                                <?php if(session()->get('user_session')){?>
                                                <a class="btn btn-danger" style="background-color: #800000;border:none;" href="{{url('checkout')}}"> Proceed to Checkout  </a>
                                                <?php }else{?>
                                                    <a class="btn btn-danger log-popup-btn" style="background-color: #800000;border:none;"> Proceed to Checkout  </a>
                                                <?php }?>
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
<script type="text/javascript">
    // $(document).ready(function() {  
    //   $('#discountModal').modal('show');
    // });
        $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
           $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".updatecart").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "post",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

   function incrementValuecart(pid)
  {   var id = 'qty'+pid;
     var value = parseInt(document.getElementById(id).value, 10);
     value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById(id).value = value;
     $.ajax({
        url: SITEURL + '/update-ajax',
        type: 'post',
        data: {"_token": "{{ csrf_token() }}",
                id: pid, 
                quantity : value ,
        }, 
        success: function (msg) {
            console.log('Increment');
              location.reload();
        },
        error: function (error) {
        }

    });
  }
  function decrementValueCart(pid)
  {   var id = 'qty'+pid;
      var value = parseInt(document.getElementById(id).value, 10);
     value = isNaN(value) ? 0 : value;
    var data = value - 1;
    if(data >0){  
    document.getElementById(id).value = data;
    $.ajax({
        url: SITEURL + '/update-ajax',
        type: 'post',
        data: {"_token": "{{ csrf_token() }}",
                id: pid, 
                quantity : data ,
        }, 
        success: function (msg) {
            location.reload();
        },
        error: function (error) {
        }

    });
    }
    else{
       
         $.ajax({
            url: SITEURL + '/remove-from-cart',
            method: "post",
            data: {_token: '{{ csrf_token() }}', id: pid},
            success: function (response) {
                document.getElementById(id).value = data;
                  $('#show-'+pid).remove();
                  location.reload();
            },
            error: function (error) {
            }
            });
         
        
    }
   
     
  }
       
    </script>        