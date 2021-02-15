
$(document).ready(function(){
    $('[id^="hide-"]').on('click', function(){
        $(this).hide(); // this.value
        var matchvalue = $(this).data('value');
          $('#show-'+matchvalue).show();
        let html = "";
        var qty = 1;
        html += `
                <input type='button' onclick="decrementValue(${matchvalue})" value='-' class='btn btn-default' field='quantity' />
                <input type='text' name='qty' id="number${matchvalue}"  value=${qty} class='qty' />
                <input type='button' onclick="incrementValue(${matchvalue})" value='+' class='btn btn-default' field='quantity' />
          `;

          $('#show-'+matchvalue).html(html);
        $.ajax({
        url: SITEURL + '/cartline',
        type: 'post',
        dataType: 'json',
        data: {"_token": "{{ csrf_token() }}",pid: matchvalue ,
        qty : qty ,
        }, 
        success: function (msg) {
             swal({
    title: "Added Successfully  ",
    timer: 1500,
    buttons: false,
    });
     
        },
        error: function (error) {
            
        }

    });
          
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
     $.ajax({
        url: SITEURL + '/update-ajax',
        type: 'post',
        data: {"_token": "{{ csrf_token() }}",
                id: pid, 
                quantity : value ,
        }, 
        success: function (msg) {
            console.log('Increment');
        },
        error: function (error) {
        }

    });

}
function decrementValue(pid)
{	var id = 'number'+pid;
    var value = parseInt(document.getElementById(id).value, 10);
     value = isNaN(value) ? 0 : value;
    var data = value - 1;
   	if(data >0){	
    document.getElementById(id).value = data;
    $.ajax({
        url: SITEURL + '/update-ajax',
        type: 'post',
        data: {"_token": "{{ csrf_token() }}",
                id: pid, 
                quantity : data ,
        }, 
        success: function (msg) {
             console.log('Decrement');
        },
        error: function (error) {
        }

    });
    }
    else{
       
         $.ajax({
            url: SITEURL + '/remove-from-cart',
            method: "post",
            data: {_token: '{{ csrf_token() }}', id: pid},
            success: function (response) {
                document.getElementById(id).value = data;
                 $('#hide-'+pid).show();
                  $('#show-'+pid).hide();
            },
            error: function (error) {
            }
            });
         
        
    }
   
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


