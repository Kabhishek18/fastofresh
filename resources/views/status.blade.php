@if(Session::has('success'))
    <div class="text-center alert alert-success" style="color: #ffffff;
    background-color: #306f06;margin-bottom: 0px;"><strong>{{ Session::get('success') }}</strong></div>
@endif
@if(Session::has('warning'))
    <div class="text-center alert alert-warning" style="color: #ffffff;
    background-color: #ea2324;margin-bottom: 0px;"><strong>{{ Session::get('warning') }}</strong></div>
@endif