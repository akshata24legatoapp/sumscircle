<?php echo view('header');
    
    $adminModel = model('AdminModel');

    if(!empty($user_record)){
        $user_id = $user_record['id'];
        $user_email = $user_record['user_email'];
        $user_name = $user_record['user_name'];
    }else{
        $user_id = '';
        $user_email = '';
        $user_name = '';
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
                                <h3 class="m-portlet__head-text" style="font-size:21px">User Rights </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                   
                                	<a href="<?php echo base_url()?>/user_list" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                		<span><i class="fa fa-list-ul"></i><span>View User List</span></span>
                                	</a>
                                    
                                </li>
                                <li class="m-portlet__nav-item"></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!--begin::Form-->
                     <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="" action="" method= "POST" 
                        enctype="multipart/form-data" autocomplete="off">
                        
                        <div class="m-portlet__body">
                           <div class="form-group m-form__group row">
                                <div class="col-lg-6 m-form__group-sub ">
                                    <label class="form-control-label">User Name : </label>
                                 	<?php echo $user_name;?>
                                </div>
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label">User Email : </label> 
                                    <?php echo $user_email;?>     
                                </div> 
                            </div>
                            
                            <div style="padding:10px">
                            	<table class="table table-bordered" id="addrole">
                                    <thead>
                                    <th></th>
 									<th>ADD</th>
 									<th>EDIT</th>
 									<th>DELETE</th>
 									<th>VIEW</th>
 								</thead>
 								<tbody>
 									<?php

 									$menu_name= array();
 									
 									foreach($menuuserrights as $key => $value){ 
                                        $menu_id = $value['r_mid'];
                                        $submenurights =  $adminModel->getSubmenuuser_rights($user_id,$menu_id);
 										 
 									?>
 									
 									<tr>
 										<td style="font-weight:700"> <?php echo $value['menu_name'];?></td>
 										<tbody>
 											<?php foreach($submenurights as $key => $val){ 

                                                if($val['submenu_name']){
                                                    $submenuchk = 'checked';
                                                }else{
                                                    $submenuchk = '';
                                                }

                                                if($val['add_right'] == '1'){
                                                    $addchk = 'checked';
                                                }else{
                                                    $addchk = '';
                                                }

                                                if($val['edit_right'] == '1'){
                                                    $editchk = 'checked';
                                                }else{
                                                    $editchk = '';
                                                }        

                                                if($val['delete_right'] == '1'){
                                                    $deletechk = 'checked';
                                                }else{
                                                    $deletechk = '';
                                                }

                                                if($val['view_right'] == '1'){
                                                    $viewchk = 'checked';
                                                }else{
                                                   $viewchk = '';
                                                }



                                                ?>
 											<tr>
 												<td><input type="checkbox" name="submenu_" id="submenus_" value="" <?php echo $submenuchk;?> onclick="return false;">  <?php echo $val['submenu_name'];?>
 												</td>

 												<td><input type="checkbox" name="add_" id="" value="1" <?php echo $addchk;?> onclick="return false;"></td>
		 										<td><input type="checkbox" name="edit_" id="edit_" 
		 											value="1"  <?php echo $editchk;?> onclick="return false;"></td>
		 										<td><input type="checkbox" name="delete_" id="delete_" value="1"  <?php echo $deletechk;?> onclick="return false;"></td>
		 										<td><input type="checkbox" name="view_" id="view_" onclick="return false;"
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