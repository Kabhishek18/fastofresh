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
                            <h2 class="content-header-title float-left mb-0">Home List</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('laravel-admin/dashboard')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Home List
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
                                <div class="card-header">
                                    <div class="col-sm-6 col-12">

                                        <form method="post" action="{{url('')}}/laravel-admin/home_list/insert">
                                            @csrf
                                            <div class="text-bold-600 font-medium-2">
                                                    <h4>{{$popular->name}}</h4>
                                                </div>
                                                <input type="hidden" name="id" value="{{$popular->id}}">
                                                <p>Select Your Multiple Products</p>
                                                <div class="form-group">
                                                    <select class="select2 form-control" multiple="multiple" name="popular[]">
                                                        @for($i=0;$i <= (count($popularproduct)-1);$i++)
                                                        @if($popularproduct[$i]==false)

                                                        @else
                                                          <option value="{{$popularproduct[$i]->id}}" selected="">
                                                              {{$popularproduct[$i]->name}}
                                                          </option>
                                                        @endif
                                                        @endfor
                                                        @foreach($products as $product)
                                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-outline-light mr-1 mb-1 waves-effect waves-lightop" name="" value="Update">
                                                </div>
                                        </form>

                                    </div>
                                     <div class="col-sm-6 col-12">

                                        <form method="post" action="{{url('')}}/laravel-admin/home_list/insert">
                                            @csrf
                                            <div class="text-bold-600 font-medium-2">
                                                    <h4>{{$best->name}}</h4>
                                                </div>
                                                <input type="hidden" name="id" value="{{$best->id}}">
                                                <p>Select Your Multiple Products</p>
                                                <div class="form-group">
                                                    <select class="select2 form-control" multiple="multiple" name="popular[]">
                                                      @for($i=0;$i <= (count($bestproduct)-1);$i++)
                                                        @if($bestproduct[$i]==false)

                                                        @else
                                                          <option value="{{$bestproduct[$i]->id}}" selected="">
                                                              {{$bestproduct[$i]->name}}
                                                          </option>
                                                        @endif
                                                        @endfor
                                                        @foreach($products as $product)
                                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-outline-light mr-1 mb-1 waves-effect waves-lightop" name="" value="Update">
                                                </div>
                                        </form>

                                    </div>


                                     <div class="col-sm-6 col-12">

                                        <form method="post" action="{{url('')}}/laravel-admin/home_list/insert">
                                            @csrf
                                            <div class="text-bold-600 font-medium-2">
                                                    <h4>{{$suggest->name}}</h4>
                                                </div>
                                                <input type="hidden" name="id" value="{{$suggest->id}}">
                                                <p>Select Your Multiple Products</p>
                                                <div class="form-group">
                                                    <select class="select2 form-control" multiple="multiple" name="popular[]">
                                                        @for($i=0;$i <= (count($suggestproduct)-1);$i++)
                                                        @if($suggestproduct[$i]==false)

                                                        @else
                                                          <option value="{{$suggestproduct[$i]->id}}" selected="">
                                                              {{$suggestproduct[$i]->name}}
                                                          </option>
                                                        @endif
                                                        @endfor
                                                     
                                                        @foreach($products as $product)
                                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-outline-light mr-1 mb-1 waves-effect waves-lightop" name="" value="Update">
                                                </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <p class="card-text">
                                           <!--  The print button will open a new window in the end user's browser and, by default, automatically trigger the print function allowing the end user to print the table. The window will be closed once the print is complete, or has been cancelled. -->
                                        </p>

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
