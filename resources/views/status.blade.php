<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@if(Session::has('success'))
	<script type="text/javascript">
		swal("", "{{ Session::get('success') }}", "success");
	</script>
@endif
@if(Session::has('warning'))
	<script type="text/javascript">
		swal("!", "{{ Session::get('warning') }}!", "error");
	</script>
@endif


<!-- @if(Session::has('success'))
    <div class="text-center alert alert-success" style="color: #ffffff;
    background-color: #306f06;margin-bottom: 0px;"><strong>{{ Session::get('success') }}</strong></div>
@endif
@if(Session::has('warning'))
    <div class="text-center alert alert-warning" style="color: #ffffff;
    background-color: #ea2324;margin-bottom: 0px;"><strong>{{ Session::get('warning') }}</strong></div>
@endif -->