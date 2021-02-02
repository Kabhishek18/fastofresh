$(document).ready(function(){
    $('[id^="hide-"]').on('click', function(){
        $(this).hide(); // this.value
        var matchvalue = $(this).data('value');;
        let html = "";
        html += `
            <div class=''>
                <input type='button' onclick="decrementValue(${matchvalue})" value='-' class='btn btn-default' field='quantity' />
                <input type='text' name='qty' id="number${matchvalue}"  value='1' class='qty' />
                <input type='button' onclick="incrementValue(${matchvalue})" value='+' class='btn btn-default' field='quantity' />
        
            <input type='submit' class="btn btn-danger  " style='background-color: #800000;' value="Add to cart"/>
            </div>
          `;

          $('#show-'+matchvalue).html(html);
    });

    //Location Hide Detail on checkout page
     $('#filllocation').hide();
    $('#locationcheck').on('change', function(){
        var chek = $(this).val();
        if(chek =='work'){
            $('#hidelocation').hide(); // this.value
            $('#filllocation').show(); // this.value
            $('#locationcheck').val('add');
        }
        else{
            $('#hidelocation').show(); // this.value
            $('#filllocation').hide(); // this.value  
             $('#locationcheck').val('work'); 
        }

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

function forgotPassword()
{
    $( ".sign-form" ).remove();
    $( ".sign-popup-title" ).remove();
    $('.forgot-parent').append('<div class="sign-popup-title text-center"><h4 itemprop="headline">Forgot Password </h4></div>'); 
    let formhtml = "";
        formhtml += `
                    <form class="sign-form" method="post" action="/emailotpverify">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <label>Enter Email ID<span class="text-danger">*</span></label>
                                <input class="brd-rd3" type="text" name="email" placeholder="Enter Email ID" required>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button class="red-bg brd-rd3" type="submit">Send Verification</button>
                            </div>
                        </div>
                        <div class="row" >
                             New To Fast O Fresh? <a class="sign-popup-btn" style="font-size: 14px;color: red" href="#" title="Register" itemprop="url">Sign up Here</a>
                        </div>
                    </form>
                        `;
    $('.forgot-parent-body').html(formhtml); 

}


