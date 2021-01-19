$(document).ready(function(){

 load_data();

 function load_data(query)
 {
    var token = $('meta[name="csrf-token"]').attr('content');

  $.ajax({
   url:"{{url('')}}/productsearch",
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