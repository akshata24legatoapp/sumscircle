$(document).ready(function () {  

    $('#inventory_list').DataTable();  
    
});

function getProductsku(productid){

    var inventory_id = $('#inventory_id').val();

    if(inventory_id == ''){
        var url = './getProductsku';
    }else{
        var url = '../getProductsku';
    }
    $('#product_sku').val('');
    $.ajax({
        type: "GET",
        url :url,
        dataType: "JSON",
        data:{productid:productid},
        success: function(data){
            //console.log(data);
            if(productid == 0 || data.product_sku == '' || data.product_sku == null){
                $('#product_sku').val(' ');
            }else{
                $('#product_sku').val(data.product_sku);
            }  
        }
    });
}

function getTotalQuantity(){
    var default_quan = $('#default_quantity').val();
    var sold_quan = $('#sold_quantity').val();
    var total_quan = default_quan - sold_quan;
    $('#total_quantity').val(total_quan);
}

function validateInventory_form(){
    if(chkinventory_from() == true){
        $('#inventoryform').submit();
    }else{
        return false;
    }
}

function chkinventory_from(){
    var product_id = $('#product_id').val();
    var default_quantity = $('#default_quantity').val();
    var sold_quantity = $('#sold_quantity').val();
    var chk = 0;

    if(product_id == '0'){
        $('.btn.btn-light').css('border-color','red');
        $('#product').css('display','block');
        chk++;  
    }else{
        $('.btn.btn-light').css('border-color','#ced4da');
        $('#product').css('display','none');
    }
    if(default_quantity == ''){
        $('#default_quantity').css('border-color','red');
        $('#def_quan').css('display','block');
        chk++;  
    }else{
        $('#default_quantity').css('border-color','#ced4da');
        $('#def_quan').css('display','none');
    }
    if(sold_quantity == ''){
        $('#sold_quantity').css('border-color','red');
        $('#sold_quan').css('display','block');
        chk++;  
    }else{
        $('#sold_quantity').css('border-color','#ced4da');
        $('#sold_quan').css('display','none');
    }

    if(chk > 0){
        return false;
    }else{
        return true;
    }
}