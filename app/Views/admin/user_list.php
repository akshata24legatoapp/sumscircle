<?php echo view('header'); 

//print'<pre>';print_r($_SESSION);exit();
?>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">User List</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                	<?php if(isset($user_right)){  
                        if($user_right['add_right'] == '1') { ?>
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="<?php echo base_url()?>/add_user" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air"><span><i class="fa fa-plus-circle"></i><span>Add User</span></span></a>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                    </ul>
                   <?php } } ?>
                </div>
            </div>
            <div style="padding:10px">
                <table class="table table-striped table-bordered" id="users_list">
                    <thead>
                        <th>User ID</th>  
                        <th>User Name</th> 
                        <th>Email</th>
                        <th>Mobile</th> 
                        <th>Status</th> 
                        <th>Option</th>    
                    </thead>
                    <tbody>
                       <?php foreach($users as $val){ 
                            if($val['user_status'] == '1'){
                                $status = 'Active';
                            }else{
                                $status = 'Inactive';
                            }

                        ?>
                        <tr>
                        	<td><?php echo $val['id'];?></td>
                        	<td><?php echo $val['user_name'];?></td>
                        	<td><?php echo $val['user_email'];?></td>
                            <td><?php echo $val['user_mobile'];?></td>
                            <td><?php echo $status;?></td>
                            <td style="text-align:center">
                                <?php if(isset($user_right)){  
                                    if($user_right['edit_right'] == '1') { ?>
                                    <a href="<?php echo base_url()?>/edit_user/<?php echo $val['id']?>"><i class="fa fa-pencil-alt" aria-hidden="true" style="color:yellowgreen"></i>
                                    </a>
                                <?php } ?>
                                &nbsp;&nbsp;
                                <?php if($user_right['delete_right'] == '1') { ?>
                                    <a href="#" onclick="deleteUser('<?php echo $val['id'];?>')"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>
                                    </a>
                                <?php } ?>
                                &nbsp;&nbsp;
                                <?php if($user_right['edit_right'] == '1') { ?>
                                    <a href="<?php echo base_url()?>/view_user_rights/<?php echo $val['id']?>">
                                        <i class="fa fa-key" aria-hidden="true" style="color:#628239" title="access Rights"></i>
                                    </a>
                                <?php } } ?>
                            </td> 
                        </tr> 
                        <?php } ?>
                    </tbody>
                </table>
            </div> 
        </div>
    </div>

</div>

<script type="text/javascript" src="<?php echo base_url()?>/public/assets/js/admin/admin.js"></script>

<?php echo view('footer');?> 