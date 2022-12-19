<?php echo view('header');
    $role_model_res = model('AdminModel'); 

    //print'<pre>';print_r($role_data);exit();

    if(!empty($role_data)){
        $role_id = $role_data['id'];
        $role_name = $role_data['role_name'];
        $role_status = $role_data['role_status'];
    }else{
        $role_id = '';
        $role_name = '';
        $role_status = '';

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
                                <h3 class="m-portlet__head-text" style="font-size:21px">Update Role </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                   
                                	<a href="<?php echo base_url()?>/admin" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                		<span><i class="fa fa-list-ul"></i><span>View Role List</span></span>
                                	</a>
                                    
                                </li>
                                <li class="m-portlet__nav-item"></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!--begin::Form-->
                     <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="roleform" action="../save_role" method= "POST" 
                        enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="role_id" id="role_id" class="form-control" value="<?php echo $role_id;?>"> 
                        <div class="m-portlet__body">
                           <div class="form-group m-form__group row">
                                <div class="col-lg-6 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>Role Name </label>
                                 	<input type="text" name="role_name" id="role_name" 
                                    value="<?php echo $role_name;?>" class="form-control m-input" placeholder="" tabindex="3" >
                                    <span id="name" style="color:red;display:none">Role Name is required</span>
                                </div>
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"> Status </label> 
                                    <div class="m-radio-inline">                                          
                                        <label class="m-radio">
                                            <input type="radio" name="role_status" value="1" <?php if(!empty($role_data) && ($role_status == '1')) {echo 'checked';}else { echo '';}?> > Active
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="role_status" value="0" <?php if(!empty($role_data) && ($role_status == '0')) {echo 'checked';}else { echo '';}?>> Inactive
                                            <span></span>
                                        </label>
                                    </div>      
                                </div> 
                            </div>
                            
                            <div style="padding:10px">
                            	<table class="table table-bordered" id="addrole">
                                    <thead>
 									<th><input type="checkbox" name="checkall[]" id="checkall" value="" onchange="checkAll(this)"> Check All</th>
 									<th>ADD</th>
 									<th>EDIT</th>
 									<th>DELETE</th>
 									<th>VIEW</th>
 								</thead>
 								<tbody>
 									<?php
 									
 									foreach($menus as $key => $menu_val){ 
 										$submenu_res = $role_model_res->getSubmenusByRoleId($menu_val['id'],$role_id);
                                        
                                        if(!empty($role_id) && ($menu_val['id'] == $menu_val['rr_mid'])){
                                            $menuchk = 'checked';
                                        }else{
                                            $menuchk = '';
                                        }
 									?>
 									
 									<tr>
 										<td style="font-weight:700"><input type="checkbox" name="menu[]" id="menu[]" value="<?php echo $menu_val['id']?>" onclick="chksubmenuByMenus()" <?php echo $menuchk;?>>  <?php echo $menu_val['menu_name'];?></td>
 										<tbody>
 											<?php foreach($submenu_res as $key1 => $submenu_val){ 

                                                if(!empty($role_id) && ($submenu_val['id'] == $submenu_val['rr_sid'])){
                                                    $submenuchk = 'checked';
                                                }else{
                                                    $submenuchk = '';
                                                }

                                                if(!empty($role_id) && ($submenu_val['add_right'] == '1')){
                                                    $addchk = 'checked';
                                                }else{
                                                    $addchk = '';
                                                }

                                                if(!empty($role_id) && ($submenu_val['edit_right'] == '1')){
                                                    $editchk = 'checked';
                                                }else{
                                                    $editchk = '';
                                                }

                                                if(!empty($role_id) && ($submenu_val['delete_right'] == '1')){
                                                    $deletechk = 'checked';
                                                }else{
                                                    $deletechk = '';
                                                }

                                                if(!empty($role_id) && ($submenu_val['view_right'] == '1')){
                                                    $viewchk = 'checked';
                                                }else{
                                                    $viewchk = '';
                                                }

                                            ?>
 											<tr>
 												<td><input type="checkbox" name="submenu_<?php echo $menu_val['id']?>[]" id="submenus_<?php echo $submenu_val['id']?>" value="<?php echo $submenu_val['id']?>"<?php echo $submenuchk;?>>  <?php echo $submenu_val['submenu_name'];?>
 												</td>

 												<td><input type="checkbox" name="add_<?php echo $menu_val['id']?>_<?php echo $submenu_val['id']?>" id="add_<?php echo $menu_val['id']?>_<?php echo $submenu_val['id']?>" value="1" <?php echo $addchk;?>></td>
		 										<td><input type="checkbox" name="edit_<?php echo $menu_val['id']?>_<?php echo $submenu_val['id']?>[]" id="edit_<?php echo $menu_val['id']?>_<?php echo $submenu_val['id']?>" 
		 											value="1"  <?php echo $editchk;?>></td>
		 										<td><input type="checkbox" name="delete_<?php echo $menu_val['id']?>_<?php echo $submenu_val['id']?>[]" id="delete_<?php echo $menu_val['id']?>_<?php echo $submenu_val['id']?>" value="1"  <?php echo $deletechk;?>></td>
		 										<td><input type="checkbox" name="view_<?php echo $menu_val['id']?>_<?php echo $submenu_val['id']?>[]" id="view_<?php echo $menu_val['id']?>_<?php echo $submenu_val['id']?>" 
		 											value="1"  <?php echo $viewchk;?>></td>
 											</tr>
 											<?php }?>
 										</tbody>
 									</tr>
 									<?php }?>
 								</tbody>
                                </table>
                            </div>
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-12" style="text-align:center">
                                       
                                        <button type="button" class="btn btn-primary" onclick="validateroleform()">Save</button>
                                      
                                        <a href="<?php echo base_url()?>/admin" class="btn btn-danger">Cancel</a>
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
<script type="text/javascript" src="<?php echo base_url()?>/assets/js/admin/admin.js"></script>

<?php echo view('footer');?> 