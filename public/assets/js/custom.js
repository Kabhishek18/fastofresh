$(document).ready(function(){
    $('[id^="hide-"]').on('click', function(){
        $(this).hide(); // this.value
        var matchvalue = $(this).data('value');;
        let html = "";
        html += `
            <div class='form-group'>
                <input type='button' onclick="decrementValue(${matchvalue})" value='-' class='btn btn-default' field='quantity' />
                <input type='text' name='qty' id="number${matchvalue}"  value='1' class='qty' />
                <input type='button' onclick="incrementValue(${matchvalue})" value='+' class='btn btn-default' field='quantity' />
            </div>    
            <div class='form-group'>
            <input type='submit' class="btn btn-danger  " style='background-color: #ea1b25;' value="Add to cart"/>
            </div>
          `;

          $('#show-'+matchvalue).html(html);
    });
    
});

function incrementValue(pid)
{	var id = 'number'+pid;
    var value = parseInt(document.getElementById(id).value, 10);
     value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById(id).value = value;
}
function decrementValue(pid)
{	var id = 'number'+pid;
    var value = parseInt(document.getElementById(id).value, 10);
     value = isNaN(value) ? 0 : value;
    var data = value - 1;
   	if(data >0){	
    document.getElementById(id).value = data;}
    else{
    	data = '1';
    document.getElementById(id).value = data;}
   
}
