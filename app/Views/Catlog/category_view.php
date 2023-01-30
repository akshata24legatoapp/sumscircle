<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">Category List</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <?php if(isset($user_right)){  
                                if($user_right['add_right'] == '1') { ?>
                                <a href="add-category" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air"><span><i class="fa fa-plus-circle"></i><span>Add Category</span></span></a>
                            <?php } } ?>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                    </ul>
                </div>
            </div>
            <div style="padding:10px">
                <table class="table table-striped table-bordered" id="customerlist">
                    <thead>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Category Type</th>
                        <th>Status</th>
                        <th>Option</th>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach ($category_view as $Value) {
                            ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $Value['category_name']?></td>
                            <td><?php echo $Value['category_type']?></td>
                            <td <?php if ($Value['category_status'] == '1') $valstatus = 'Active'; else $valstatus = 'inactive';  ?>><?php echo $valstatus ?></td>
                            <td style="text-align:center">
                                <?php if(isset($user_right)){  
                                    if($user_right['edit_right'] == '1') { ?>
                                    <a href="update-category/<?php echo $Value['id'] ?>"><i class="fa fa-pencil-alt" aria-hidden="true" style="color:yellowgreen"></i>
                                </a>
                                <?php } } ?>
                                &nbsp;&nbsp;
                                <?php if(isset($user_right)){  
                                    if($user_right['delete_right'] == '1') { ?>
                                    <a href="#" onclick="deleteRecord(<?= $Value['id'] ?>)"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>
                                </a>
                                <?php } } ?>
                                    
                            </td>
                        </tr>
                    <?php
                    $i++;
                            }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>/public/assets/js/catlog.js" type="text/javascript"></script>