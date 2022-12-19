<?php echo view('header');?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Change Password</h3>
                            </div>
                        </div>
                     
                    </div>
                     <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="passwordform" action="updatePassword" method="post"  autocomplete="off" name="mainform">
                        <div class="m-portlet__body">
                           <div class="form-group m-form__group row">
                                <div class="col-lg-6 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span> Old Password </label>
                                    <input type="password" name="old_password" id ="old_password" value="" class="form-control m-input" placeholder="" tabindex="3" onblur="checkOldpassword()">
                                    <span id="old_pwd" style="display:none;color:red">Please enter Old Password field</span>
									<span id="chk_old_pwd" style="display:none;color:red">Old Password does not matched with existing password</span>
                                    <input type="hidden" name="chkoldpwd" id="chkoldpwd" value="">
                                </div>  
                            </div>
							<div class="form-group m-form__group row">
							    <div class="col-lg-6 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span> New Password </label>
                                    <input type="password" name="new_password" id ="new_password" value="" class="form-control m-input" placeholder="" tabindex="3">
                                    <span id="new_pwd" style="display:none;color:red">Please enter New Password field</span>
									
                                </div>
							</div>
							<div class="form-group m-form__group row">
							    <div class="col-lg-6 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span> Confirm Password </label>
                                    <input type="password" name="confirm_password" id ="confirm_password" value="" class="form-control m-input" placeholder="" tabindex="3">
                                    <span id="confirm_pwd" style="display:none;color:red">Please enter Confirm Password field</span>
                                    <span id="confirm_new_pwd" style="display:none;color:red">New Password and Confirm Password does not matched</span>
                                </div>
							</div>

                        </div>
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-12" style="text-align:center">                          
                                    <button type="button" class="btn btn-primary" id="savebtn" onclick="validate_passwordForm()">Save</button>
                                   <!--  <a href="" class="btn btn-danger">Cancel</a> -->
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


<script type="text/javascript" src="<?php echo base_url()?>/assets/js/login/login.js"></script>

<?php echo view('footer');?>