$(document).ready(function () {  

    $('#rolelist').DataTable();  
    $('#users_list').DataTable();  
    
});

function checkAll(ele) {   
    var checkboxes = document.getElementsByTagName('input');
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = true;
                $('#checkall').val(1);
            }
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = false;
                $('#checkall').val(0);
            }
        }
    }
}


function chksubmenuByMenus(){   
    var menu = document.getElementsByName('menu[]'); 
   
    for (var m = 0; m < menu.length; m++) {
        if (menu[m].checked ==true) { 
            var mval=(menu[m].value);
            var submenu = document.getElementsByName('submenu_'+mval+'[]');
            for (var sm = 0; sm < submenu.length; sm++) { 
                if (menu[m].checked ==true) { 
                    submenu[sm].checked = true;
                    var sval=(submenu[sm].value);

                    var data  = ['add_'+mval+'_'+sval,'edit_'+mval+'_'+sval,'delete_'+mval+'_'+sval,'view_'+mval+'_'+sval];

                    for (var i = 0; i < data.length; i++) {
                        $('#'+data[i]).prop('checked', true);
                        $('#'+data[i]).val('1');
            
                    }
                }

            }
        }else{
            var mval=(menu[m].value);
            var submenu = document.getElementsByName('submenu_'+mval+'[]');
            for (var sm = 0; sm < submenu.length; sm++) { 
                if (menu[m].checked ==false) { 
                    submenu[sm].checked = false;

                    var sval=(submenu[sm].value);

                    var data  = ['add_'+mval+'_'+sval,'edit_'+mval+'_'+sval,'delete_'+mval+'_'+sval,'view_'+mval+'_'+sval];

                    for (var i = 0; i < data.length; i++) {
                        $('#'+data[i]).prop('checked', false);
                        $('#'+data[i]).val('0');
            
                    }
                }
            }
        }
    }   
}

function ValidateChkCnt(){
    
    var mainmenucnt=0;
    var menu = document.getElementsByName('menu[]'); 

    if (menu){
        for (var m = 0; m < menu.length; m++) {             
            if (menu[m].checked) {
                
                var mval=(menu[m].value);
                
                var submenucnt=0;
                var submenu = document.getElementsByName('submenu_'+mval+'[]'); 
                if (menu){
                    for (var sm = 0; sm < submenu.length; sm++) { 
                        if (submenu[sm].checked) { 
                            submenucnt++;
                        }
                    }
                    mainmenucnt++;
                }   
            }
            if(submenucnt=="0") { 
                return false;
            } 
        }
    }
    if(mainmenucnt>0) { 
        return true;
    } else {
        return false;
    }
}


function validateroleform(){
    var frm = document.getElementById('roleform');
    var chkall =  $('#checkall').val();
    var role_name= $('#role_name').val();
    var cnt = ValidateChkCnt();
    
    if(chkall == 1 && (role_name != '')){
        frm.submit();
        return true; 
    }else if(cnt == true && (role_name != '')){
        frm.submit();
        return true; 
    }else{
        swal({   
             //title: "Mainmenu and its relative submenu items are required", 
            title:"",
            type: "warning",
            text: "Role name,Mainmenu and its relative submenu items are required",   
            confirmButtonColor: "#485094",   
            confirmButtonText: "Ok",
        });   
    }
}

function deleteRole(role_id){
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this record!",   
        showCancelButton: true,   
        confirmButtonColor: "#485094",   
        confirmButtonText: "Yes, delete it!",   
    }).then(function(isConfirm) {
        if(isConfirm.value) {
            $.ajax({
                url :'./deleteRole',
                type: "POST",
                dataType: "JSON",
                data:{role_id:role_id},
                success: function(data){
                    //console.log(data);
                    if(data.status == "success") {
                        swal(data.response);
                        location.reload();  
                    } else {
                        return false;                 
                    }
                }
            });
        }
    });
}

$(".toggle-password").click(function() {
      
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
  
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

function chkUser_validation(){
    var role = $('#role_id').val();
    var user_name = $('#user_name').val();
    var user_email = $('#user_email').val();
    var Password = $('#Password').val();
    var user_mobile = $('#user_mobile').val();
    var img_val = $('#user_image').val();
    var attat_file = $('#attat_file').val();
   
    var emailvald = emailvalidation(user_email);
    var chk=0;

    if(role == ''){
        $('.btn.btn-light').css('border-color','red');
        $('#role').css('display','block');
        chk++;  
    }else{
        $('.btn.btn-light').css('border-color','#ced4da');
        $('#role').css('display','none');
    }

    if(user_name == ''){
        $('#user_name').css('border-color','red');
        $('#name').css('display','block');
        chk++;  
    }else{
        $('#user_name').css('border-color','#ced4da');
        $('#name').css('display','none');
    }

    if(Password == ''){
        $('#Password').css('border-color','red');
        $('#pass').css('display','block');
        chk++;  
    }else{
        $('#Password').css('border-color','#ced4da');
        $('#pass').css('display','none');
    }

    if(user_email == ''){
        $('#user_email').css('border-color','red');
        $('#email').css('display','block');
        chk++;
    }else{
        if(email != ''){
            if(emailvald == false){
                document.getElementById('emailval').innerHTML = "Invalid Email";
                $('#user_email').css('border-color','red');
                $('#emailval').css('display','block');
                $('#email').css('display','none');
                chk++;
            }else{
                $('#user_email').css('border-color','#ced4da');
                $('#emailval').css('display','none');
            }
            
        }else{
            $('#user_email').css('border-color','#ced4da');
            $('#emailval').css('display','none');
            $('#email').css('display','none');
        }
    }

    if(user_mobile == ''){
        $('#user_mobile').css('border-color','red');
        $('#mobile').css('display','block');
        chk++;  
    }else{
        $('#user_mobile').css('border-color','#ced4da');
        $('#mobile').css('display','none');
    }

    if(img_val == '' && attat_file == ''){
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

function validateUser_form(){
    if(chkUser_validation() == true){
        $('#userform').submit();
    }else{
        topFunction();
    }
}

function emailvalidation(email){
    //var email= $('#user_email').val();
    var testEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/; 
    if(testEmail.test(email) == false){
        return false;
    }

}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


function deleteUser(user_id){
    swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this record!",   
        showCancelButton: true,   
        confirmButtonColor: "#485094",   
        confirmButtonText: "Yes, delete it!",   
    }).then(function(isConfirm) {
        if(isConfirm.value) {
            $.ajax({
                url :'./deleteUser',
                type: "POST",
                dataType: "JSON",
                data:{user_id:user_id},
                success: function(data){

                    // if(data.message != "") {
                    //     swal(data.message);
                    //     location.reload();  
                    // } else {
                    //     return false;                 
                    // }

                    if(data.status == "success") {
                        swal(data.response);
                        location.reload();  
                    } else {
                        return false;                 
                    }
                }
            });
        }
    });
}