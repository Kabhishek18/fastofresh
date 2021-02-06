<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{url('assets/js/custom.js')}}"></script>        

<script>

    $(document).ready(function(){

     load_data();

     function load_data(query)
     {
        var token = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
       url:"<?php echo url(''); ?>/productsearch",
       method:"POST",
       data:{_token : token, query:query},
       success:function(responseData){
        onSuccess(responseData);
       }
      })
     }
     function onSuccess(responseData) {
      let html = "";
       
      if(responseData){
          $.each(responseData, function(key, value){
            console.log(value);
             html += `<option value="${ value.name }">`
          });
        }
      else{
            html +=`<option value="No Match Data Found">`;
      }
      $('.searchspecial').html(html);
    }
     $('#search_text').keyup(function(){
      var search = $(this).val();
      if(search != '')
      {
       load_data(search);
      }
      else
      {
       load_data();
      }
     });



    });
</script>
     
       
    
</main><!-- Main Wrapper -->
<script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
</script>
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins.js') }}"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
</body>	
</html>