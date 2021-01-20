<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">
@include('admin/inc/nav')

    <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
 <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Product</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('laravel-admin/dashboard')}}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{url('laravel-admin/product')}}">Product</a>
                                    </li>
                                    <li class="breadcrumb-item active">Add / Edit
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
                <!-- card actions section start -->
                <section id="card-actions">
        
                    <!-- Collapsible and Refresh Action starts -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Product Field </h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form-horizontal" method="post" action="{{url('laravel-admin/product/insert')}}" enctype="multipart/form-data"> 
                                            @csrf
                                            <?php if(!empty($datalist)){?>
                                            <input type="hidden" name="id" value="{{$datalist->id}}">
                                             <?php }?>
                                             <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">

                                                            <label>Product Name <span class="text-danger">*</span></label>
                                                            <input type="text" name="name" class="form-control" placeholder="Product Name" required data-validation-required-message="This Course Name field is required" value="<?=(!empty($datalist->name)?$datalist->name:'')?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">

                                                            <label>Product Parent <span class="text-danger">*</span></label>
                                                            <select name="parent_id" class="form-control">
                                                                @if(!empty($datalist->parent_id))
                                                                <option value="<?=$datalist->parent_id?>">{{$parent->name}}</option>
                                                                <optgroup>Selected</optgroup>    
                                                                @endif
                                                                @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">

                                                            <label>Selling Price <span class="text-danger">*</span></label>
                                                            <input type="text" name="s_price" class="form-control" placeholder="Selling Price" required data-validation-required-message="This Course Name field is required" value="<?=(!empty($datalist->s_price)?$datalist->s_price:'')?>">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">

                                                            <label>Base price <span class="text-danger">*</span></label>
                                                            <input type="text" name="b_price" class="form-control" placeholder="Base price" value="<?=(!empty($datalist->b_price)?$datalist->b_price:'')?>">
                                                        </div>
                                                    </div>
                                                </div>
                                               <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">

                                                            <label>Product Meta <span class="text-danger">*</span></label>
                                                            <input type="text" name="meta" class="form-control" placeholder="Product Name" required data-validation-required-message="This Course Name field is required" value="<?=(!empty($datalist->meta)?$datalist->meta:'')?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                  <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Product Short description<span class="text-danger">*</span></label>
                                                   <textarea name="short_descrip" id="short_descrip" contenteditable="true">
                                                    <?=(!empty($datalist->short_descrip)?$datalist->short_descrip:'')?>
                                                   </textarea>
                                                    </div>
                                                </div>

                                                
                                                   <script>
                                                        CKEDITOR.replace('short_descrip');
                                                       
                                                   </script>
                                                </div>
                                                 <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Product Image<span class="text-danger">*</span></label>
                                                            <input type="file" class="form-control" name="image" >
                                                    </div>
                                                </div>
                                               
                                                </div>
                                                <div class="col-sm-2">
                                                     @if(!empty($datalist->image))
                                                <img src="{{url('')}}/products/{{$datalist->image}}" width="100px">
                                                @endif
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Product description<span class="text-danger">*</span></label>
                                                   <textarea name="description" id="description" contenteditable="true">
                                                    <?=(!empty($datalist->description)?$datalist->description:'')?>
                                                   </textarea>
                                                    </div>
                                                </div>

                                                
                                                   <script>
                                                        CKEDITOR.replace('description');
                                                       
                                                   </script>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>Product Information<span class="text-danger">*</span></label>
                                                   <textarea name="information" id="information" contenteditable="true">
                                                    <?=(!empty($datalist->information)?$datalist->information:'')?>
                                                   </textarea>
                                                    </div>
                                                </div>

                                                
                                                   <script>
                                                        CKEDITOR.replace('information');
                                                       
                                                   </script>
                                                </div>
                                                 <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Select Product Recipe</label>
                                                        <select class="select2 form-control" multiple="multiple" name="recipe[]">

                                                                @if($selrecipes[0] != null))
                                                                    @foreach($selrecipes as $selrecipe)
                                                                    <option value="{{$selrecipe->id}}" selected="">
                                                                        {!!$selrecipe->title!!}
                                                                    </option>
                                                                    @endforeach
                                                                @endif
                                                            @foreach($recipes as $recipe)
                                                              <option value="{{$recipe->id}}">
                                                                  {!!$recipe->title!!}
                                                              </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                 </div>   
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label> Status Active/Inactive  </label>
                                                            <select class="form-control" name="status">
                                                                <option value="active">Active</option>
                                                                <option value="Inactive">Inactive</option>
                                                               
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <button type="submit" class="btn btn-primary" >Submit</button>
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </section>
            </div>
        </div>
    </div>