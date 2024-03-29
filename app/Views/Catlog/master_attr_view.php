<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">Master Attribute List</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <?php 
                            if(isset($user_right)){
                                if($user_right['add_right'] == '1'){ ?>
                            <button type="button" onclick="funClear()" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air getid" id="add_att" value=""><span><i class="fa fa-plus-circle"></i><span>Add Master Attribute</button>
                            <!-- <a href="" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air" id="sendmail"><span><i class="fa fa-plus-circle"></i><span>Add Master Attribute</span></span></a> -->
                            <?php } }?>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                    </ul>
                </div>
            </div>
            <div style="padding:10px">
                <table class="table table-striped table-bordered" id="master_att_list">
                    <thead>
                        <th>Sr. no</th>
                        <th>Master Attribute Name</th>
                        <th>Status</th>
                        <th style="text-align:center">Option</th>
                    </thead>
                    <tbody>
                         <?php $i = 1;
                            foreach ($view_master_attr as $value) { ?>
                        <tr>
                           
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['attributes_name'] ?></td>
                                <td <?php if ($value['attributes_status'] == '1') $valstatus = 'Active';
                                    else $valstatus = 'inactive';  ?>><?php echo $valstatus ?></td>
                                <td style="text-align:center">
                                    <?php 
                                    if(isset($user_right)){
                                        if($user_right['edit_right'] == '1'){ ?>
                                        <a href="#" id='getidvalu' data-toggle="modal" onclick="showmore(<?= $value['id'] ?>)" data-target="#myModal"><i class="fa fa-pencil-alt" aria-hidden="true" style="color:yellowgreen"></i>
                                        </a>
                                    <?php } ?>
                                    &nbsp;&nbsp;
                                    <?php if($user_right['delete_right'] == '1'){ ?>
                                        <a href="#" onclick="deleteRecord(<?= $value['id'] ?>)"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>
                                        </a>
                                    <?php } }?>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Add Master Attribute</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="MasterForm" method="POST" action="master-attribute-upload">
                    <div class="form-outline mb-4">
                        <label class="form-control-label"><span style="color:red">*</span>Master Attribute Name</label>
                        <input type="text" name="master_attr_name" id="master_attr_name" value="" class="form-control m-input" placeholder="Enter Master Attribute" tabindex="3">
                    </div>
                    <input type="hidden" name="hiddenvalue" id="hiddenvalue">
                    <div class="form-outline mb-4">
                        <label class="form-control-label"> Status </label>
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
                    <div class="form-outline mb-12-inline text-center">
                        <input type="button" id='master_attr_sub_button' value="Submit" form="myform" class="btn btn-primary">
                        <a href="" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>/public/assets/js/catlog.js" type="text/javascript"></script>
<?php echo view('footer'); ?>
