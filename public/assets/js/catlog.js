$('#catlog_sub_button').click(function () {
    let cat_name = $('#cat_name').val();
    let cat_type = $('#cat_type').val();
    var option = document.getElementsByName('Status');

    if (cat_name == '')
        swal('Warning', 'Please Enter Category Name.', 'warning');
    else if (cat_type == '')
        swal('Warning', 'Please Enter Category Type.', 'warning');
    else if (!(option[0].checked || option[1].checked)) {
        swal('Warning', 'Please Checked Status', 'warning');
        return false;
    }
    else
        $('#myform').submit();
    return true;
});

$('#catlog_update_button').click(function () {
    let cat_name = $('#cat_name').val();
    let cat_type = $('#cat_type').val();
    var option = document.getElementsByName('Status');

    if (cat_name == '')
        swal('Warning', 'Please Enter Category Name For Update.', 'warning');
    else if (cat_type == '')
        swal('Warning', 'Please Enter Category Type For Update.', 'warning');
    else if (!(option[0].checked || option[1].checked)) {
        swal('Warning', 'Please Checked Status', 'warning');
        return false;
    }
    else
        $('#edit_form').submit();
    return true;
});

$('#Att_sub_button').click(function () {
    let drop_val = $('#drop_val').val();
    let attr_variation_name = $('#attr_variation_name').val();
    var option = document.getElementsByName('Status');

    if (drop_val == '')
        swal('Warning', 'Please Selected Master Name.', 'warning');
    else if (attr_variation_name == '')
        swal('Warning', 'Please Enter Attribuation Name.', 'warning');
    else if (!(option[0].checked || option[1].checked)) {
        swal('Warning', 'Please Checked Status', 'warning');
        return false;
    }

    else
        $('#Attribute_vari_form').submit();
    return true;
});



$('#master_attr_sub_button').click(function () {
    let master_attr_name = $('#master_attr_name').val();
    var option = document.getElementsByName('Status');

    if (master_attr_name == '')
        swal('Warning', 'Please Enter Master Attribution Name.', 'warning');
    else if (!(option[0].checked || option[1].checked)) {
        swal('Warning', 'Please Checked Status', 'warning');
        return false;
    }

    else
        $('#MasterForm').submit();
    return true;
});

let nameError = document.getElementById("name_error");
let descrError = document.getElementById("description_error");
let shortError = document.getElementById("short_error");
let productError = document.getElementById("product_error");
let imgError = document.getElementById("file_error");
let attrError = document.getElementById("attr_error");
let catError = document.getElementById("cat_error");

function nameVal() {
  let name = document.getElementById("product_name").value;

  if (name.length == "") {
    nameError.innerHTML = "Required";
    return false;
  } 
  else {
    nameError.innerHTML = "";
    return true;
  }
}

function descrVal() {
  let descr = document.getElementById("description").value;

  if (descr.length == "") {
    descrError.innerHTML = "Required";
    return false;
  } else {
    descrError.innerHTML = "";
    return true;
  }
}

function shortVal() {
  let short = document.getElementById("shot_descr").value;

  if (short.length == "") {
    shortError.innerHTML = "Required";
    return false;
  } else {
    shortError.innerHTML = "";
    return true;
  }
}

function productVal() {
  let sku = document.getElementById("product_sku").value;

  if (sku.length == "") {
    productError.innerHTML = "Required";
    return false;
  } else {
    productError.innerHTML = "";
    return true;
  }
}

function imgVal() {
  let img = document.getElementById("multi_image").value;

  if (img.length == "") {
    imgError.innerHTML = "Please select images";
    return false;
  } else {
    imgError.innerHTML = "";
    return true;
  }
}

function cat_val(){
  select = document.getElementById('cat_id');
if (select.value == "") {
  catError.innerHTML = "Required";
  return false;
}
return true;
} 


function validate() {
  if (nameVal() && descrVal() && shortVal() && productVal() && imgVal() && cat_val()) {
    $("#customerform").submit();
    swal("Product added successfully");
    return true;
  } else {
    
    swal("Please fill all the fields");  
    //topFunction();
    return false;
    
  }
}



////////////////////////////////////////////////////////////////////
// // master 
// var BASE_URL = "<?php echo base_url() ?>";

// function showmore(id) {
//     var val_id = id
//     $.ajax({
//         method: "POST",
//         url: BASE_URL + '/master-attribute-update',
//         data: {
//             "val_id": val_id
//         },
//         success: function(response) {
//             data = JSON.parse(response);
//             $("#master_attr_name").val(data[0]['attributes_name']);
//             // $("#Status").val(data[0]['attributes_status']);
//             $("#hiddenvalue").val(data[0]['id']);
//             console.log(data[0]['attributes_status']);
//             if ((data[0]['attributes_status']) == '1') {
//                 $('#Status1').attr('checked', true);
//             } else {
//                 $('#Status0').attr('checked', true);
//             }

//         }
//     });

// };

// function funClear() {
//     document.getElementById("MasterForm").reset();
//     $('#Status1').attr('checked', false);
//     $('#Status0').attr('checked', false);
// }
// $(function() {
//     $('#add_att').click(function() {
//         $('#myModal').modal('show');
//     });
// });
////////////////////////////////////////////////////////////////////




