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