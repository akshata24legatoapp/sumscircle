<?php echo view('header'); ?>
				
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
                                <h3 class="m-portlet__head-text" style="font-size:21px">Add New User</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                   
                                	<a href="<?php echo base_url()?>/user_list" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                		<span><i class="fa fa-list-ul"></i><span>View User</span></span>
                                	</a>
                                    
                                </li>
                                <li class="m-portlet__nav-item"></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!--begin::Form-->
                     <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="userform" action="save_user" method= "POST" 
                        enctype="multipart/form-data" autocomplete="off">

                        <input type="hidden" name="" id="" class="form-control" value=""> 
                        <div class="m-portlet__body">
                           <div class="form-group m-form__group row">
                            	<div class="col-lg-4 m-form__group-sub ">
                                   <label class="form-control-label"><span style="color:red">*</span> Select Role</label>
                                    <div style="display:flex;">
                                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" tabindex="3" 
                                        name="role_id" id="role_id">
                                            <option value="" >Select Role</option>
                                            <?php foreach($roles as $val){ ?>
                                            <option value="<?php echo $val['id']?>"> <?php echo $val['role_name']?></option>
                                            <?php }?>
                                        </select>
                                        
                                    </div>
                                    <span id="role" style="display:none;color:red">Please select role</span>
                                </div>
                                
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>User Name </label>
                                 	<input type="text" name="user_name" id="user_name" 
                                    value="" class="form-control m-input" placeholder="" tabindex="3" >
                                    <span id="name" style="color:red;display:none">Name field is required</span>
                                </div>
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>  Email </label>
                                     <input type="text" name="user_email" id="user_email" value="" class="form-control m-input" placeholder="" tabindex="3">
                                     <span id="email" style="color:red;display:none">Email field is required</span>
                                     <span id="emailval" style="color:red;display:none"></span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">              
                                
                                <div class="col-lg-4 m-form__group-sub ">
                                   	<label class="form-control-label"><span style="color:red">*</span>  Password </label>
                                    <input type="password" name="Password" id="Password" value="" class="form-control m-input" placeholder="" tabindex="3">
                                    <span toggle="#Password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                     <span id="pass" style="color:red;display:none">Password field is required</span>
                                </div>
                              
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>  Mobile No. </label>                
                                    <input type="text" name="user_mobile" value="" id="user_mobile" class="form-control m-input onlyNumber" placeholder="" tabindex="3" maxlength='15'>
                                     <span id="mobile" style="color:red;display:none">Mobile field is required</span>
                                </div>
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"> Status </label> 
                                    <div class="m-radio-inline">                                          
                                        <label class="m-radio">
                                            <input type="radio" name="user_status" value="1" checked > Active
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="user_status" value="0" > Inactive
                                            <span></span>
                                        </label>
                                    </div>      
                                </div> 
                           	</div>
                            
                            <div class="form-group m-form__group row">
                               	<div class="col-lg-4 m-form__group-sub">
                                	<label class="form-control-label">User Profile</label> 
                                    <div class="custom-file">
                                        <input type="file" name="user_image"  class="custom-file-input form-control m-input" id="user_image" value="" />
                                        <label class="custom-file-label" for="photo">Choose file
                                        </label>
                                       
                                        
                                         <input type="hidden" name="attat_file" id="attat_file" class="form-control" value=""> 
                                        <span id="attatched_file" style="color:red;display:none">User Profile field is required</span>
                                    </div>
                                </div>
                                
								 
                             </div>
                             <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-12" style="text-align:center">
                                       
                                        <button type="button" class="btn btn-primary" onclick="validateUser_form()">Save</button>
                                      
                                        <a href="<?php echo base_url()?>/user_list" class="btn btn-danger">Cancel</a>
                                    </div>
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

<script type="text/javascript" src="<?php echo base_url()?>/public/assets/js/admin/admin.js"></script>

<?php echo view('footer');?> 