<?php
echo view('header');

$varid = array();
$masterid = array();
foreach ($prdct_var as $val) {


    array_push($varid, $val['attributes_variations_id']);
    array_push($masterid, $val['master_attribute_id']);
}
?>


<style>
    .field-icon {
        float: right;
        margin-right: 20px;
        margin-top: -27px;
        position: relative;
        z-index: 2;
    }

    .input {
        width: 20px;
    }
</style>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text" style="font-size:21px">Add Attributes </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">

                                    <a href="<?php echo base_url() ?>/display_products" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                        <span><i class="fa fa-list-ul"></i><span>View Products</span></span>
                                    </a>

                                </li>
                                <li class="m-portlet__nav-item"></li>
                            </ul>
                        </div>
                    </div>


                    <div class="m-portlet m-portlet--tabs">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-tabs m-tabs-line  m-tabs-line--2x m-tabs-line--right" role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" href="<?php echo base_url() ?>/edit_products/<?php echo $idpr;?>" aria-selected="true" disabled>Edit products
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link active show" href="" aria-selected="true">Edit attributes
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-flat">
                                    <div class="panel-body">
                                        <form method="POST" action="../update_attribute" enctype="multipart/form-data" id="attform">

                                            <input type="hidden" class="input" id="product_id" name="product_id" value="<?php echo $idpr; ?>">

                                            <div class="section">

                                                <div class="form-group">
                                                    <div class="row">

                                                        <?php

                                                        foreach ($attributes as $attr) {
                                                            $att_id = $attr['id'];
                                                            $check_master = in_array($attr['id'], $masterid)  ? 'checked="checked"' : NULL;

                                                        ?>

                                                            <label class="col-sm-4 control-label m-4">
                                                                <span class="m-2">
                                                                    <input type="checkbox" value="<?php echo $attr['id']  ?>" id="attcheck" name="upname[]" <?php echo $check_master ?>>
                                                                </span><?php echo $attr['attributes_name'] ?>
                                                                <input type="hidden" class="input" name="prid" value="<?php echo $attr['id'] ?>">
                                                            </label>
                                                            <div class="col-sm-6 m-3">
                                                                <?php
                                                                $var = model('Catlog_model');
                                                                $name = $var->display_attribute_variation($att_id);

                                                                foreach ($name as $att) {
                                                                    $check = in_array($att['id'], $varid)  ? 'checked="checked"' : NULL;

                                                                ?>

                                                                    <input type="checkbox" name="checkboxp_<?php echo $attr['id'] ?>[]" id="attris" class="m-2" value="<?php echo $att['id'] ?>" <?php echo $check; ?>><?php echo $att['attribute_variation_name'] ?>

                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>




                                                <!-- Submit and cancel button  -->
                                                <div class="m-form__actions m-form__actions m-3">
                                                    <div class="col-lg-12" style="text-align:center">

                                                        <button type="button" id="submit_both" onclick="val_boxes()" class="btn btn-primary">Update</button>
                                                        <a href="<?php echo base_url() ?>/display_products" id="cancel" class="btn btn-danger">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- Footer -->
<?php echo view('footer'); ?>

<script>
    function val_boxes() {
        var fun = checkboxValidate();
        if (fun == true) {
            $("#attform").submit();
            //swal("Thank you!");
            return true;
        } else {
            swal('Select proper attributes!');
            return false;
        }
    }



    function checkboxValidate(){
        var attribute = document.getElementsByName('upname[]');
        var at_count = 0;
        for (var i = 0; i < attribute.length; i++) {
            var att_val = attribute[i];
            if (att_val.checked == true) {

                var value_of = attribute[i].value;
                var sub_attribute = document.getElementsByName('checkboxp_' + value_of + '[]');
                var at_sub_count = 0;

                for (var j = 0; j < sub_attribute.length; j++) {
                    var sub_att_val = sub_attribute[j];
                    if (sub_att_val.checked) {
                        at_sub_count++;
                    }
                }
                
                at_count++;
            }
            if(at_sub_count=="0") { 
                return false;
            } 
        }
        if(at_count > 0 ){
            return true;
        }else{
            return false;
        }
        
    }
   

</script>