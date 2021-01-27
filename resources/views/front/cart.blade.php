<section>
            <div class="gray-bg bottom-padd210">
                @include('../status')
                <div class="sec-box bottom-padd140">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="sec-wrapper">
                                    <div class="row">
                                       
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
                                                                <h4 class="nomargin">{{ $details['name'] }}</h4>
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