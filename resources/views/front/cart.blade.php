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
                                                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                                                            <div class="col-sm-9">
                                                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td data-th="Price">₹ {{ $details['price'] }}</td>
                                                    <td data-th="Quantity">
                                                        <input type="number" id="qty" value="{{ $details['quantity'] }}" class="form-control quantity" />
                                                    </td>
                                                    <td data-th="Subtotal" class="text-center">₹ {{ $details['price'] * $details['quantity'] }}</td>
                                                    <td class="actions" data-th="">
                                                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}" data-value="{{$id}}"><i class="fa fa-refresh"></i></button>
                                                        <button class="btn btn-danger btn-sm remove-from-cart" style="background-color: #ea1b25;" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="visible-xs">
                                                    <td class="text-center"><strong>Total {{ $total }}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                                    <td><a href="{{ url('/clearcart') }}" class="btn btn-danger" style="background-color: #ea1b25;"> Clear Cart <i class="fa fa-angle-right"></i></a></td>
                                                    <td colspan="2" class="hidden-xs"></td>
                                                    <td class="hidden-xs text-center"><strong>Total</strong></td>
                                                    <td class="hidden-xs text-center"><strong> ₹ {{ $total }}</strong></td>
                                                </tr>
                                                </tfoot>

                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Section Box -->
            </div>
        </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
<script type="text/javascript">
        $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
           $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
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
    </script>        