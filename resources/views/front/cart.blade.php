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
            <div class="gray-bg bottom-padd210" >
              
                <div class="sec-box bottom-padd140" style="margin-top: 30px">
                   @include('../status')
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">

                                <div class="sec-wrapper">
                                    <div class="row">
                                        <br>
                                           <div class="container">
                                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#discountModal">
                                                Apply Coupon
                                              </button>  
                                            </div>
                                            <br>
                                            <div class="modal fade" id="discountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                
                                                  
                                                  <div class="modal-body text-center">

                                                    <div class="icon text-danger">
                                                      <i class="fas fa-percent"></i>
                                                    </div>
                                                    <div class="notice">
                                                      <h4>Get Discount</h4>
                                                      <p>For the next 24 hours you can get any product at half-price.</p>
                                                      
                                                      <p>Use promo code <span class="badge badge-info">50-OFF</span> at checkout.</p>
                                                    </div>
                                                          
                                                        
                                                    <div class="code"></div>
                                                  </div>
                                                  <div class="modal-footer d-flex justify-content-between">
                                                     <form action="{{url('')}}/applycoupon" method="post">
                                                       <div class="form-group">
                                                        @csrf
                                                            <input type="text" name="coupon" class="form-control" placeholder="Coupon Code">
                                                       </div>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Nevermind</button>
                                                    <button type="submit" class="btn btn-danger">Apply Code</button>
                                                  </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Subtotal</th>
                                                    <th scope="col">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php $i =1;$total = 0 ;?>
                                                @foreach($cart as $id => $details)
                                            <?php $total += $details['price'] * $details['quantity'] ?>
                                                <tr>
                                                    <td><?=$i++?></td>
                                                    <td data-th="Product">
                                                        <div class="row">
                                                            <div class="col-sm-3 hidden-xs"><img src="{{url('products/')}}/{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                                                            <div class="col-sm-9">
                                                                <p class="nomargin">{{ $details['name'] }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-th="Price">₹ {{ $details['price'] }}</td>
                                                    <td data-th="Quantity" >
                                                         <input type='button' onclick="decrementValueCart(<?=$details['pid']?>)" value='-' class='btn btn-default' field='quantity' />
                                                        <input type="number" id="qty<?=$details['pid']?>" value="{{ $details['quantity'] }}" class="updatecart " min="1"  style="width: 20%;
                                                  text-align: center;"/>
                                                        <input type='button' onclick="incrementValuecart(<?=$details['pid']?>)" value='+' class='btn btn-default' field='quantity' />
                                                    </td>
                                                    <td data-th="Subtotal" class="text-center">₹ {{ $details['price'] * $details['quantity'] }}</td>
                                                    <td class="actions" data-th="">
                                                        <button class="btn btn-warning btn-sm update-cart" data-id="{{ $id }}" data-value="{{$id}}"><i class="fa fa-refresh"></i>Update</button>
                                                        <button class="btn btn-danger btn-sm remove-from-cart" style="background-color: #ea1b25;" data-id="{{ $id }}"><i class="fa fa-trash-o"></i>Remove</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                @if($total<499)
                                                <?php $ship =30; $total += $ship?>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td class="text-center" colspan=""><strong>Delivery Charge</strong></td>
                                                    <td class="text-center" colspan=""><strong>₹ {{$ship}}</strong></td>
                                                    <td colspan="1"></td>
                                                </tr>
                                                @endif
                                                @if(!empty(session()->get('coupon')))
                                                <?php $coupon =session()->get('coupon'); ?>
                                                    <tr>
                                                        <td colspan="3"></td>
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
                                                    <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                                    <td><a href="{{ url('/clearcart') }}" class="btn btn-danger" style="background-color: #ea1b25;"> Clear Cart <i class="fa fa-angle-right"></i></a></td>
                                                    <td colspan="1" class="hidden-xs"></td>
                                                    <td class="hidden-xs text-center"><strong>Total</strong></td>
                                                    <td class="hidden-xs text-center"><strong> ₹ {{ $total }}</strong>
                                                    <td colspan="1" class="hidden-xs"></td>

                                                    </td>
                                                </tr>
                                                </tfoot>

                                            </table>
                                            
                                              <div class="content" align="right">
                                                <a class="btn btn-danger" href="{{url('checkout')}}"> Checkout</a>
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
                    method: "DELETE",
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
}
function decrementValueCart(pid)
{   var id = 'qty'+pid;
    var value = parseInt(document.getElementById(id).value, 10);
     value = isNaN(value) ? 0 : value;
    var data = value - 1;
    if(data >0){    
    document.getElementById(id).value = data;}
    else{
        data = '1';
    document.getElementById(id).value = data;}
   
}
       
    </script>        