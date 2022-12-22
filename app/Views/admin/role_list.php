<?php echo view('header');?>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">Role List</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                	
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="<?php echo base_url()?>/add_role" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air"><span><i class="fa fa-plus-circle"></i><span>Add Role</span></span></a>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                    </ul>
                   
                </div>
            </div>
            <div style="padding:10px">
                <table class="table table-striped table-bordered" id="rolelist">
                    <thead>
                        <th>Role ID</th>  
                        <th>Role Name</th> 
                        <th>Status</th> 
                        <th>Option</th>    
                    </thead>
                    <tbody>
                       <?php foreach($roles_record as $val) {

                            if($val['role_status'] == '1'){
                                $status =  'Active';
                            }else{
                                $status = 'Inactive';
                            }
                        ?>
                        <tr>
                        	<td><?php echo $val['id']?></td>
                        	<td><?php echo $val['role_name']?></td>
                        	<td><?php echo $status;?></td>
                            <td style="text-align:center">
                               <a href="<?= base_url();?>/edit_role/<?php echo $val['id'];?>"><i class="fa fa-pencil-alt" aria-hidden="true" style="color:yellowgreen"></i>
                                </a>
                                
                                &nbsp;&nbsp;
                                
                                <a href="#" onclick="deleteRole('<?php echo $val['id'];?>')"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>
                                </a>  
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