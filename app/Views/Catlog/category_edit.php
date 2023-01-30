<style>
    .field-icon {
        float: right;
        margin-right: 20px;
        margin-top: -27px;
        position: relative;
        z-index: 2;
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
                                <h3 class="m-portlet__head-text" style="font-size:21px"> Update Category </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <?php if(isset($user_list_view_right)){ 
                                        if($user_list_view_right['view_right'] == '1') { ?>
                                        <a href="<?php echo base_url() ?>/view-category" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                            <span><i class="fa fa-list-ul"></i><span>View Category</span></span>
                                        </a>
                                    <?php } }?>
                                </li>
                                <li class="m-portlet__nav-item"></li>
                            </ul>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="edit_form" method="POST" action="<?php echo base_url('category-update-done') ?>">
                        <div class="m-portlet__body">
                            <?php
                            foreach ($category_view as $Value) {
                            ?>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-4 m-form__group-sub ">
                                        <label class="form-control-label"><span style="color:red">*</span>Category Name </label>
                                        <input type="text" name="cat_name" id="cat_name" value="<?php echo $Value['category_name'] ?>" class="form-control m-input" placeholder="Category Name " tabindex="3">
                                        <input type="hidden" name="hidden_id" value="<?php echo $Value['id'] ?>">
                                        <span id="name" style="color:red;display:none">Name field is required</span>
                                    </div>
                                    <div class="col-lg-4 m-form__group-sub ">
                                        <label class="form-control-label"><span style="color:red">*</span>Category Type </label>
                                        <input type="text" name="cat_type" id="cat_type" value="<?php echo $Value['category_type'] ?>" class="form-control m-input" placeholder="Category Type " tabindex="3">
                                        <span id="name" style="color:red;display:none">Name field is required</span>
                                    </div>
                                    <div class="col-lg-4 m-form__group-sub ">
                                        <label class="form-control-label"> Status </label>
                                        <div class="m-radio-inline">
                                            <label class="m-radio">
                                                <input type="radio" <?php if ($Value['category_status'] =='1') echo 'checked'; ?> name="Status" id="Status" value="1" required> Active
                                                <span></span>
                                            </label>
                                            <label class="m-radio">
                                                <input type="radio" <?php if ($Value['category_status'] =='0') echo 'checked'; ?> name="Status" id="Status" value="0" required> Inactive
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php } ?>
                        </div>
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-12" style="text-align:center">
                                    <?php if(isset($user_right)){ 
                                        if($user_right['edit_right'] == '1') { ?>
                                        <input type="button" id="catlog_update_button" form="myform" value="Update" class="btn btn-primary">
                                    <?php } } ?>
                                    <?php if(isset($user_list_view_right)){ 
                                        if($user_list_view_right['view_right'] == '1') { ?>
                                        <a href="<?php echo base_url(); ?>/view-category" class="btn btn-danger">Cancel</a>
                                    <?php } }?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>/public/assets/js/catlog.js" type="text/javascript"></script>