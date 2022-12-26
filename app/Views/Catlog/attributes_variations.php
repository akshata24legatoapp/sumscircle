<?php echo view('header'); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">Attribute Variations List</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <button type="button" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air getid" onclick="funClear()" id="add_att_vari" value=""><span><i class="fa fa-plus-circle"></i><span>Add Attribute variations</button>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                    </ul>
                </div>
            </div>
            <div style="padding:10px">
                <table class="table table-striped table-bordered" id="variationlist">
                    <thead>
                        <th>Srno</th>
                        <th>Master Attribute Name</th>
                        <th>Attribute Variation Name</th>
                        <th>Status</th>
                        <th style="text-align:center">Option</th>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                            $SearchType = '';
                            foreach ($view_att_variation as $value) { ?>
                        <tr>
                            
                                <td><?php echo $i; ?></td>
                                <td> <?php echo $value['attributes_name'] ?> </td>
                                <td><?php echo $value['attribute_variation_name'] ?></td>
                                <td <?php if ($value['attribute_variation_status'] == '1') $valstatus = 'Active';
                                    else $valstatus = 'inactive';  ?>><?php echo $valstatus; ?></td>
                                <td style="text-align:center">
                                    <a href="#" id='getidvalu' data-toggle="modal" onclick="showmore(<?= $value['idsget'] ?>)" data-target="#myModal"><i class="fa fa-pencil-alt" aria-hidden="true" style="color:yellowgreen"></i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="#" onclick="deleteRecord(<?= $value['idsget'] ?>)"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>
                                    </a>
                                </td>
                        </tr>
                    <?php $i++;
                            } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Attribute Variation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="Attribute_vari_form" method="POST" action="attribute-variation-upload">
                    <div class="form-outline mb-4">
                        <label class="form-control-label"><span style="color:red">*</span>Master Attribute Name</label>
                        <select name="drop_val" id="drop_val" class="form-control m-bootstrap-select selectpicker" data-live-search="true">
                            <option value="">Select Values</option>
                            <?php foreach ($dropdone_master_val as $value) { ?>
                                <option value="<?php echo $value['id'] ?>"> <?php echo $value['attributes_name'] ?>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-control-label"><span style="color:red">*</span>Attribute Variation Name</label>
                        <input type="text" name="attr_variation_name" id="attr_variation_name" value="" class="form-control m-input" placeholder="Attribute variation name" tabindex="3" required>
                        <span id="name" style="color:red;display:none">Name field is required</span>
                    </div>
                    <input type="hidden" value="" name="hiddenvalue" id="hiddenvalue">
                    <div class="form-outline mb-4">
                        <label class="form-control-label"><span style="color:red">*</span> Status </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio" name="Status" id="Status1" value="1"> Active
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio" name="Status" id="Status0" value="0"> Inactive
                                <span></span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="form-outline mb-4 text-center">
                <input type="button" id="Att_sub_button" value="Submit" form="myform" class="btn btn-primary">
                <a href="" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
</div>



<?php echo view('footer'); ?>
<script src="<?php echo base_url();?>/public/assets/js/catlog.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $('#variationlist').DataTable();
        
    });
    var BASE_URL = "<?php echo base_url() ?>";

    function showmore(idsget) {
        var val_id = idsget
        $.ajax({
            method: "POST",
            url: BASE_URL + '/attribute-variation-update',
            data: {
                "val_id": val_id
            },
            success: function(response) {
                data = JSON.parse(response);
                $("#drop_val").val(data[0]['master_attribute_id']);
                $("#attr_variation_name").val(data[0]['attribute_variation_name']);
                // $("#Status").val(data[0]['attribute_variation_status']);
                $("#hiddenvalue").val(val_id);
                if ((data[0]['attribute_variation_status']) == '1') {
                    $('#Status1').attr('checked', true);
                } else {
                    $('#Status0').attr('checked', true);
                }
            }
        });
    };

    function funClear() {
        document.getElementById("Attribute_vari_form").reset();
        $('#Status1').attr('checked', false);
        $('#Status0').attr('checked', false);
    }

    $(function() {
        $('#add_att_vari').click(function() {
            $('#myModal').modal('show');
        });
    });

    function deleteRecord(id) {
        var delete_id = id
        swal({
            title: "Are you sure?",
            text: "You Want To Delete Data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: 'No'
        }).then(function(success) {
            if (success.value) {
                $.ajax({
                    method: "POST",
                    url: BASE_URL + '/attribute-variation-delete',
                    data: {
                        "delete_id": delete_id
                    },
                    success: function(data) {
                        swal("Attribute Variation Delete!", {
                            icon: "success",
                        }).then(function(success) {
                            if (success) {
                                window.location.href = BASE_URL + '/attribute-variation-list';
                            }
                        });
                    }
                });
            }
        })
    };
</script>