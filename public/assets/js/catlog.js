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




