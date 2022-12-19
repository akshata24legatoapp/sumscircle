<?php echo view('header');

?>
				
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
                                <h3 class="m-portlet__head-text" style="font-size:21px">Add New Role </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                   
                                	<a href="" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                		<span><i class="fa fa-list-ul"></i><span>View Customer</span></span>
                                	</a>
                                    
                                </li>
                                <li class="m-portlet__nav-item"></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- <div class="m-portlet__head" style="border-bottom: 3px solid #ebedf2">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text" style="
                                font-family:verdana;"><i class="far fa-user" style="font-size: 25px">&nbsp;&nbsp;<span style="font-size:23px"></span></i></h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <a href="" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                        <span><i class="fa fa-plus-circle"></i><span>Add Address</span></span>
                                    </a>
                                </li>
                                <li class="m-portlet__nav-item"></li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="m-portlet m-portlet--tabs">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-tabs m-tabs-line  m-tabs-line--2x m-tabs-line--right" role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" href="" aria-selected="true">tab1
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link active show" href="" aria-selected="true">Tab2
                                        </a>
                                    </li>
                                     <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" href="" aria-selected="false">Tab3
                                         </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                    <!--begin::Form-->
                     <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="customerform" action="#" method= "POST" 
                        enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="Customer_ID" id="Customer_ID" class="form-control" value=""> 
                        <div class="m-portlet__body">
                           <div class="form-group m-form__group row">
                            	<div class="col-lg-4 m-form__group-sub ">
                                   <label class="form-control-label"><span style="color:red">*</span> Select Role</label>
                                    <div style="display:flex;">
                                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" tabindex="3" 
                                        name="customer_role_id" id="customer_role_id">
                                            <option value="" >Select Role</option>
                                            
                                        </select>
                                        
                                    </div>
                                    <span id="role" style="display:none;color:red">Please select role</span>
                                </div>
                                
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>Name </label>
                                 	<input type="text" name="Name_VC" id="Name_VC" 
                                    value="" class="form-control m-input" placeholder="" tabindex="3" >
                                    <span id="name" style="color:red;display:none">Name field is required</span>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">              
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>  Email </label>
                                     <input type="text" name="Email" id="Email" value="" class="form-control m-input" placeholder="" tabindex="3">
                                     <span id="email" style="color:red;display:none">Email field is required</span>
                                     <span id="emailval" style="color:red;display:none"></span>
                                </div>
                              
                                <div class="col-lg-4 m-form__group-sub ">
                                   	<label class="form-control-label"><span style="color:red">*</span>  Password </label>
                                    <input type="password" name="Password" id="Password" value="" class="form-control m-input" placeholder="" tabindex="3">
                                    <span toggle="#Password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                     <span id="pass" style="color:red;display:none">Password field is required</span>
                                </div>
                              
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>  Mobile No. </label>                
                                    <input type="text" name="Mobile" value="" id="Mobile" class="form-control m-input onlyNumber" placeholder="" tabindex="3" maxlength='15'>
                                     <span id="mobile" style="color:red;display:none">Mobile field is required</span>
                                </div>
                           	</div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>Customer type</label>
                                    <div style="display:flex;">
                                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" tabindex="3" 
                                        name="Customer_type" id="Customer_type">
                                            <option value="">Select Customer category
                                            </option>
                                            
                                        </select> 
                                    </div>
                                    <span id="ctype" style="color:red;display:none">Customer type is required</span>
                                </div>
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label">Reference</label>                   
                                    <input type="text" name="Reference" value="" id="Reference" class="form-control m-input" placeholder="" tabindex="3" maxlength='15'>
                                </div>
                               
                            </div>
                            <div class="form-group m-form__group row">
                                
                                 <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"> Status </label> 
                                    <div class="m-radio-inline">                                          
                                        <label class="m-radio">
                                            <input type="radio" name="Status" value="1" checked > Active
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="Status" value="0" > Inactive
                                            <span></span>
                                        </label>
                                    </div>      
                                </div> 
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3 m-form__group-sub">
                                    <label class="form-control-label"> Mobile Verified </label> 
                                     <div class="m-radio-inline">                      
                                        <label class="m-radio">
                                            <input type="radio" name="IsMobile_verify" value="1" checked 
                                            > Yes
                                            <span></span>
                                        </label>                                                          
                                        <label class="m-radio">
                                             <input type="radio" name="IsMobile_verify" value="0"  > No
                                             <span></span>
                                        </label>  
                                    </div>                                    
                                </div>
                                
                                
                                <div class="col-lg-3 m-form__group-sub">
                                   <label class="form-control-label"> Approved </label> 
                                    <div class="m-radio-inline">                                          
                                        <label class="m-radio">
                                            <input type="radio" name="approved" id="app_y" value="1" checked  onclick=""> Approved
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="approved" id="app_n" value="0"  onclick=""> Block
                                            <span></span>
                                        </label>
                                    </div>                                    
                                </div> 
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-3 m-form__group-sub">
                                    <label class="form-control-label"> Send SMS</label> 
                                     <div class="m-radio-inline">                    
                                        <label class="m-radio">
                                            <input type="radio" name="Send_sms" value="1" checked 
                                            > Yes
                                            <span></span>
                                        </label>                                                          
                                        <label class="m-radio">
                                             <input type="radio" name="Send_sms" value="0"  > No
                                             <span></span>
                                        </label>  
                                    </div>                                    
                                </div>
                                <div class="col-lg-6 m-form__group-sub">
                                    <label class="form-control-label">Send Email </label> 
                                    <div class="m-radio-inline">                   
                                        <label class="m-radio">
                                            <input type="radio" name="Send_email" value="1" checked > Yes
                                            <span></span>
                                        </label>                                                          
                                        <label class="m-radio">
                                            <input type="radio" name="Send_email" value="0" > No
                                            <span></span>
                                         </label>  
                                    </div>                                    
                                </div>
                                
                                
                            </div>
                            <div class="form-group m-form__group row">
                               	<div class="col-lg-4 m-form__group-sub">
                                	<label class="form-control-label"> Photo </label> 
                                    <div class="custom-file">
                                        <input type="file" name="Attatched_file"  class="custom-file-input form-control m-input" id="Attatched_file" value="" />
                                        <label class="custom-file-label" for="photo">Choose file
                                        </label>
                                       
                                        
                                         <input type="hidden" name="attat_file" id="attat_file" class="form-control" value=""> 
                                        <span id="attatched_file" style="color:red;display:none">Photo field is required</span>
                                    </div>
                                </div>
                                
								 
                             </div>
                             <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-12" style="text-align:center">
                                       
                                        <button type="button" class="btn btn-primary" onclick="">Save</button>
                                      
                                          <a href="" class="btn btn-danger">Cancel</a>
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

<?php echo view('footer');?> 