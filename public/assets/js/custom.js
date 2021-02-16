
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
    $( ".login" ).remove();
    $( ".sign-popup-title" ).remove();
    $('.forgot-parent').append(' <div class="sign-popup-title text-center"><h4 itemprop="headline">Forgot Password </h4></div>'); 
    let formhtml = "";
        formhtml += `
                    <form class="form-group sign-form" method="post" action="/emailotpverify">
                        
                            <div class="col-md-12 col-sm-12 col-lg-12">
                              <div class="form-group">
                                <label>Enter Email ID<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="email" placeholder="Enter Email ID" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                              <div class="form-group">
                                <button class="red-bg brd-rd3" type="submit">Send Verification</button>
                              </div>  
                            </div>
                        <br><br>
                        <div class="col-md-12 col-sm-12 col-lg-12" >
                                 >><a class="sign-popup-btn" style="font-size: 14px;color: red" onclick="window.location.reload()" title="Register" itemprop="url">Back To Home</a>
                            </div>
                    </form>
                        `;
    $('.forgot-parent-body').html(formhtml); 

}


