<?php echo view('header');

//print'<pre>';print_r($user_records);exit();

if(!empty($user_records)){
    $id = $user_records['id'];
    $user_name = $user_records['user_name'];
    $user_email = $user_records['user_email'];
    $user_status = $user_records['user_status'];
    $user_mobile = $user_records['user_mobile'];
    $user_image = $user_records['user_image'];
}else{
    $id = '';
    $user_name = '';
    $user_email = '';
    $user_status = '';
    $user_mobile = '';
    $user_image = '';
}

if(!empty($user_image)){
    if(APPPATH2 . 'images/users/' . $user_image){
        $userimg = APPPATH2 . 'images/users/' . $user_image;
    }else{
        $userimg = '';
    }
   
}else{
    $userimg = '';
}

?>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Update Profile</h3>
                            </div>
                        </div>
                     
                    </div>
                    <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="profileform" action="updateProfile" method= "POST" 
                        enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="user_id" id="user_id" class="form-control" value="<?php echo $id;?>"> 
                        <div class="m-portlet__body">
                           	<div class="form-group m-form__group row">
                                <div class="col-lg-6 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>User Name </label>
                                     <input type="text" name="name" id="name" value="<?php echo $user_name;?>" class="form-control m-input" placeholder="" tabindex="3">
                                     <span id="name_val" style="color:red;display:none">Please Enter User Name field</span>
                                </div>
                                <div class="col-lg-6 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span> Email Id</label>
                                     <input type="text" name="email" id="email" value="<?php echo $user_email;?>" class="form-control m-input" placeholder="" tabindex="3">
                                     <span id="emailid" style="color:red;display:none">Please enter Email field</span>
                                     <span id="emailval" style="color:red;"></span>
                                </div>
                                
                            </div>
                            <div class="form-group m-form__group row">
                               <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>Mobile</label>
                                     <input type="text" name="mobile" id="mobile" value="<?php echo $user_mobile;?>" class="form-control m-input onlyNumber" placeholder="" tabindex="3" maxlength="15">
                                     <span id="mobile_no" style="color:red;display:none">Please enter Mobile field</span>
                                </div>
                                <div class="col-lg-3 m-form__group-sub ">
                                    <label class="form-control-label"> Status </label> 
                                    <div class="m-radio-inline">                                          
                                        <label class="m-radio">
                                            <input type="radio" name="user_status" value="1" <?php if(!empty($user_records) && ($user_status == '1')){ echo 'checked';}else{ echo '';}?>> Active
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="user_status" value="0" <?php if(!empty($user_records) && ($user_status == '0')){ echo 'checked';}else{ echo '';}?>> Inactive
                                            <span></span>
                                        </label>
                                    </div>      
                                </div>
                                <div class="col-lg-4 m-form__group-sub">
                                    <label class="form-control-label">User Profile</label> 
                                    <div class="custom-file">
                                        <input type="file" name="user_image"  class="custom-file-input form-control m-input" id="user_image" value="" />
                                        <label class="custom-file-label" for="photo">Choose file
                                        </label>
                                        <img src="<?php echo $userimg;?>" style="width:100%">
                                        <span id="attatched_file" style="color:red;display:none">Please choose File</span>
                                        <input type="hidden" name="attat_file" id="attat_file" class="form-control" value="<?php echo $user_image;?>"> 
                                        
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-12" style="text-align:center">
                                       <button type="button" class="btn btn-primary" onclick="validate_profileform()">Update</button>
                                 
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
<script type="text/javascript" src="<?php echo base_url()?>/assets/js/login/login.js"></script>