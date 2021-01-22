<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">
 @include('admin/inc/nav')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Orders</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('laravel-admin/dashboard')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Orders List
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                  
                </div>
            </div>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                                        <!-- <h4 class="alert-heading">Success</h4> -->
                                        <p class="mb-0">
                                            {{ Session::get('success') }}
                                        </p>
                                    </div>
                @endif              
                @if(Session::has('warning'))  
                   <div class="alert alert-danger" role="alert">
                                        <!-- <h4 class="alert-heading">Danger</h4> -->
                                        <p class="mb-0">
                                           {{ Session::get('warning') }}
                                        </p>
                                    </div>
                @endif 
            <div class="content-body">
            
                <!-- Column selectors with Export Options and print table -->
                <section id="column-selectors">
              
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                               
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <p class="card-text">
                                           <!--  The print button will open a new window in the end user's browser and, by default, automatically trigger the print function allowing the end user to print the table. The window will be closed once the print is complete, or has been cancelled. -->
                                          
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table dataex-html5-selectors">
                                                <thead>
                                                    <tr>
                                                        <th>Order Id</th>
                                                        <th>Transaction Id</th>
                                                        <th>Order Cart</th>
                                                        <th>Order Amount</th>
                                                        <th>Order status</th>
                                                        <th>Created</th>
                                                        <th>Modified</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{$order->id}}</td>
                                                        <td>{{$order->transactionid}}</td>
                                                        <?php $carts = json_decode($order->order_cart,true);?>
                                                        <td>
                                                            <ul class="list-group">
                                                            @foreach($carts as $id =>  $cart)
                                                                <li class="list-group-item">{{$cart['name']}}   *  {{$cart['quantity'] }}  </li>
                                                            @endforeach
                                                            </ul>
                                                        </td>  
                                                        <td>{{$order->orderamount}}</td>  
                                                        <td>
                                                            <form method="post" action="{{url('')}}/laravel-admin/order/status">
                                                            <select class="form-control" id="statusupdate">
                                                            <option value="pending" selected="">Pending </option>
                                                            <option value="inprocess">InProcess</option><option value="dispatched">Dispatched</option>
                                                            <option value="delivered">Delivered</option>
                                                            </select>
                                                              <button type="submit" ><i class="fa fa-refresh"></i></button>  
                                                            </form>
                                                        </td>  
                                                        <td>{{date('F d y h:i:s',strtotime($order->updated_at))}}</td>
                                                        <td>{{date('F d y h:i:s',strtotime($order->created_at))}}</td>
                                                        <td><span class="action-edit">
                                                                <a href="{{url('laravel-admin')}}/order/edit/{{$order->id}}">
                                                                 <i class="feather icon-edit"></i>
                                                                </a>
                                                            </span>
                                                            <span class="action-delete">
                                                                <a href="{{url('')}}/laravel-admin/orderDelete/{{$order->id}}" onclick="return confirm('Are you sure, you want to delete it?')">
                                                                    <i class="feather icon-trash"></i>
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                        
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Order Id</th>
                                                        <th>Transaction Id</th>
                                                        <th>Order Cart</th>
                                                        <th>Order Detail</th>
                                                        <th>Order status</th>
                                                        <th>Created</th>
                                                        <th>Modified</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Column selectors with Export Options and print table -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

