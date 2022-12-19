"use strict";

$(document ).ready(function() {

	var BASE_URL = $('#baseurl').val();
    
    $('#login_form').submit(function(event){
		event.preventDefault();
		
		var url=BASE_URL+'/check_login';
		
		if(checkvalidation() == true){
		
			$.ajax({
	            type: 'post',
	            url: url,
	            dataType : 'json',
	            data: $('#login_form').serialize(),
	            success: function (resp) {
	           
	            	if(resp.status=="success"){ 
	                    window.location.href=resp.reload;    
	                }
	                if(resp.status=="fail"){
	                	Swal.fire({text:resp.message,
					 	icon:"error",buttonsStyling:!1,confirmButtonText:"Ok",
					 	customClass:{confirmButton:"btn btn-primary"}});           
	                }
	            },
				// error: function(xhr, resp, text) {
				// 	  swal("Oops", "We couldn't connect to the server!", "error");
				// }
			});

		}

		return false;
	});

});




function checkvalidation(){
	var email= $('#email').val();
	var password= $('#password').val();
	var emailval = emailvalidation(email);
	var chk =0;

	if(email == ''){
		Swal.fire({text:"Sorry, looks like there are some errors detected, please try again.",
	 	icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",
	 	customClass:{confirmButton:"btn btn-primary"}});
		$('#emailid').css('display','block');
		$('#email').css('border-color','red');
		chk++;

	}else if(emailval == false){
		Swal.fire({text:"Sorry, looks like there are some errors detected, please try again.",
		icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",
		customClass:{confirmButton:"btn btn-primary"}});
		document.getElementById('emaildemo').innerHTML = "Invalid Email address";
		$('#emaildemo').css('display','block');
		$('#email').css('border-color','red');
	}else{
		$('#email').css('border-color','#ced4da');
		$('#emailid').css('display','none');
		$('#emaildemo').css('display','none');

	}

	if(password == ''){
		Swal.fire({text:"Sorry, looks like there are some errors detected, please try again.",
	 	icon:"error",buttonsStyling:!1,confirmButtonText:"Ok, got it!",
	 	customClass:{confirmButton:"btn btn-primary"}});
		$('#password').css('border-color','red');
		$('#pwd').css('display','block');
		chk++;
	}else{
		$('#password').css('border-color','#ced4da');
		$('#pwd').css('display','none');
	}

	if(chk > 0){
		return false;
	}else{
		return true;
	}

}
	
function emailvalidation(email){
	//var email= $('#email').val();
	var testEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/; 
	if(testEmail.test(email) == false){
		return false;
	}

}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


function chk_passwordForm(){
	var old_password = $('#old_password').val();
    var new_password = $('#new_password').val();
    var confirm_password = $('#confirm_password').val();
    var chk = 0;

    if(old_password == ''){
        $('#old_password').css('border-color','red');
        $('#old_pwd').css('display','block');
        chk++;  
    }else{
        $('#old_password').css('border-color','#ced4da');
        $('#old_pwd').css('display','none');
    }
    if(new_password == ''){
        $('#new_password').css('border-color','red');
        $('#new_pwd').css('display','block');
        chk++;  
    }else{
        $('#new_password').css('border-color','#ced4da');
        $('#new_pwd').css('display','none');
    }
    if(confirm_password == ''){
        $('#confirm_password').css('border-color','red');
        $('#confirm_pwd').css('display','block');
        chk++;  
    }else{
        $('#confirm_password').css('border-color','#ced4da');
        $('#confirm_pwd').css('display','none');
    }

    if(new_password != confirm_password){
    	$('#confirm_password').css('border-color','red');
    	$('#confirm_new_pwd').css('display','block');
    	chk++;  
    }else{
    	$('#confirm_password').css('border-color','#ced4da');
    	$('#confirm_new_pwd').css('display','none');

    }

    if(chk > 0){
    	return false; 
    }else{
    	return true;
    }
}

function validate_passwordForm(){
	if(chk_passwordForm() == true){
		$('#passwordform').submit();
	}else{
		topFunction();
	}
}


function checkOldpassword(){
	var password = $('#old_password').val();
	$.ajax({
        url :'./checkpassword',
        type: "POST",
        dataType: "JSON",
        data:{password:password},
        success: function(data){
           	if(data == 'success'){
           		$('#old_password').css('border-color','#ced4da');
    			$('#chk_old_pwd').css('display','none');
           		$('#chkoldpwd').val(1);
           	}else{
           		$('#old_password').css('border-color','red');
    			$('#chk_old_pwd').css('display','block');
           		$('#chkoldpwd').val(0);
           	}
                    
        }
    });
}

function chkProfile_form(){
	var name = $('#name').val();
	var email = $('#email').val();
	var mobile = $('#mobile').val();
	var user_image = $('#user_image').val();
	var attat_file = $('#attat_file').val();
	var emailvald = emailvalidation(email);
	var chk = 0;

	if(name == ''){
        $('#name').css('border-color','red');
        $('#name_val').css('display','block');
        chk++;  
    }else{
        $('#name').css('border-color','#ced4da');
        $('#name_val').css('display','none');
    }
    if(email == ''){
        $('#email').css('border-color','red');
        $('#emailid').css('display','block');
        chk++;
    }else{
        if(email != ''){
            if(emailvald == false){
                document.getElementById('emailval').innerHTML = "Invalid Email";
                $('#email').css('border-color','red');
                $('#emailval').css('display','block');
                $('#emailid').css('display','none');
                chk++;
            }else{
                $('#email').css('border-color','#ced4da');
                $('#emailval').css('display','none');
            }
            
        }else{
            $('#email').css('border-color','#ced4da');
            $('#emailval').css('display','none');
            $('#emailid').css('display','none');
        }
    }


    if(mobile == ''){
        $('#mobile').css('border-color','red');
        $('#mobile_no').css('display','block');
        chk++;  
    }else{
        $('#mobile').css('border-color','#ced4da');
        $('#mobile_no').css('display','none');
    }
    if(user_image == ''){
        $('#user_image').css('border-color','red');
        $('#attatched_file').css('display','block');
        chk++;  
    }else{
        $('#user_image').css('border-color','#ced4da');
        $('#attatched_file').css('display','none');
    }

    if(chk > 0){
    	return false;
	}else{
		return true;
    }
    
}

function validate_profileform(){
	if(chkProfile_form() == true){
		$('#profileform').submit();
	}else{
		topFunction();
	}
}

