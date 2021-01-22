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
                            <h2 class="content-header-title float-left mb-0">Order Details</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('')}}/laravel-admin/dashboard">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{url('')}}/laravel-admin/order">Order</a>
                                    </li>
                                    <li class="breadcrumb-item active">Invoice
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- invoice functionality start -->
                <section class="invoice-print mb-1">
                    <div class="row">

                        
                        <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
                            <button class="btn btn-primary btn-print mb-1 mb-md-0"> <i class="feather icon-file-text"></i> Print</button>
                            <button class="btn btn-outline-primary  ml-0 ml-md-1"> <i class="feather icon-download"></i> Download</button>
                        </div>
                    </div>
                </section>
                <!-- invoice functionality end -->
                <!-- invoice page -->
                <section class="card invoice-page">
                    <div id="invoice-template" class="card-body">
                        <!-- Invoice Company Details -->
                        <div id="invoice-company-details" class="row">
                            <div class="col-sm-6 col-12 text-left pt-1">
                                <div class="media pt-1">
                                    <img src="{{url('')}}/assets/images/logo2.png" alt="company logo" />
                                </div>
                            </div>

                            <div class="col-sm-6 col-12 text-right">
                                <h1>Invoice</h1>
                                <div class="invoice-details mt-2">
                                    <h6>INVOICE NO.</h6>
                                    <p>{{date('ymdhsi',strtotime($order->created_at))}}</p>
                                    <h6 class="mt-2">INVOICE DATE</h6>
                                    <p>{{date('F d y, h:i:s',strtotime($order->created_at))}}</p>
                                </div>
                            </div>
                        </div>
                        <!--/ Invoice Company Details -->
                        
                        <!-- Invoice Recipient Details -->
                        <div id="invoice-customer-details" class="row pt-2">
                            <div class="col-sm-6 col-12 text-left">
                                <h5>Recipient</h5>
                                <?php $orderdetail = json_decode($order->orderdetail, true);
                                       $location = json_decode($orderdetail['loc'],true); 
                                       ?>
                                <div class="recipient-info my-2">
                                    <p>{{$location['username']}}</p>
                                    <p>{{$location['addressline1']}}</p>
                                    <p><strong>Landmark: </strong>{{$location['addressline1']}}</p>
                                    <p>{{$location['city']}}, </p>
                                    <p>{{$location['postalcode']}}</p>
                                </div>
                                <div class="recipient-contact pb-2">
                                    <p>
                                        <i class="feather icon-mail"></i>
                                        {{$location['email']}}
                                    </p>
                                    <p>
                                        <i class="feather icon-phone"></i>
                                        {{$location['mobile']}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 text-right">
                                <h5>Microsion Technologies Pvt. Ltd.</h5>
                                <div class="company-info my-2">
                                    <p>9 N. Sherwood Court</p>
                                    <p>Elyria, OH</p>
                                    <p>94203</p>
                                </div>
                                <div class="company-contact">
                                    <p>
                                        <i class="feather icon-mail"></i>
                                        hello@pixinvent.net
                                    </p>
                                    <p>
                                        <i class="feather icon-phone"></i>
                                        1800-313-8898 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/ Invoice Recipient Details -->

                        <!-- Invoice Items Details -->
                        <div id="invoice-items-details" class="pt-1 invoice-items-table">
                            <div class="row">
                                <div class="table-responsive col-12">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> DESCRIPTION</th>
                                                <th>QUANTITY</th>
                                                <th>BASE AMT</th>
                                                <th>GST AMT
                                                    <br>(CGST/IGST/SGST)</th>
                                                <th>NET AMT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $cart =json_decode($order->order_cart,true);
                                            $total ='';?>
                                           <?php $i =1;$total = 0 ;?>
                                                @foreach($cart as $id => $details)
                                            <?php $total += $details['price'] * $details['quantity'] ?>
                                                <tr>
                                                 <td><?=$i++?></td>
                                                 <td>{{ $details['name'] }}</td>
                                                 <td>{{ $details['quantity'] }}</td>
                                                 <td> ₹ 
                                                    @if($details['parent_id'] == 4)
                                                    {{($details['price'] - $details['price']*12/100)}}
                                                    @elseif($details['parent_id']==5)
                                                    {{($details['price'] -$details['price']*12/100)}}
                                                    @else
                                                    {{($details['price'] -$details['price']*0)}}

                                                    @endif</td>
                                                 <td> ₹ 
                                                    @if($details['parent_id'] == 4)
                                                    {{($details['price']*12/100)}}
                                                    @elseif($details['parent_id']==5)
                                                    {{($details['price']*12/100)}}
                                                    @else
                                                    {{($details['price']*0)}}

                                                    @endif
                                                 </td>
                                                 <td>₹ {{ $details['quantity']* $details['price'] }}</td>

                                                   </tr>
                                                @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="invoice-total-details" class="invoice-total-table">
                            <div class="row">
                                <div class="col-7 offset-5">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th>SUBTOTAL</th>
                                                    <td>₹ {{$total}}</td>
                                                </tr>
                                                <tr>
                                                    <th>DISCOUNT (%)</th>
                                                    <td>₹ {{$order->orderamount -$total}}</td>
                                                </tr>
                                                <tr>
                                                    <th>TOTAL</th>
                                                    <td>₹ {{$order->orderamount}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Footer -->
                        <div id="invoice-footer" class="text-right pt-3">
                            <p>Transfer the amounts to the business amount below. Please include invoice number on your check.
                                <p class="bank-details mb-0">
                                    <span class="mr-4">BANK: <strong>FTSBUS33</strong></span>
                                    <span>IBAN: <strong>G882-1111-2222-3333</strong></span>
                                </p>
                        </div>
                        <!--/ Invoice Footer -->

                    </div>
                </section>
                <!-- invoice page end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
