<?php echo view('header'); ?>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">Inventory List</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                	
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <?php if(isset($user_right)){
                            if($user_right['add_right'] == '1'){ ?>
                                <a href="add_inventory" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air"><span><i class="fa fa-plus-circle"></i><span>Add Inventory</span></span></a>
                        <?php } } ?>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                    </ul>
                   
                </div>
            </div>
            <div style="padding:10px">
                <table class="table table-striped table-bordered" id="inventory_list">
                    <thead>
                        <th>Inventory ID</th>  
                        <th>Product Name</th> 
                        <th>Total Quantity</th>
                        <th>Status</th> 
                        <th>Option</th>    
                    </thead>
                    <tbody>
                       <?php foreach($inventory as $val){ 
                            if($val['status'] == '1'){
                                $status = 'In stock';
                            }else{
                                $status = 'Out of stock';
                            }

                           $quantity = $val['default_quantity'] - $val['sold_quantity'];

                        ?>
                        <tr>
                        	<td><?php echo $val['id'];?></td>
                        	<td><?php echo $val['product_name'];?></td>
                        	<td><?php echo $quantity;?></td>
                            <td><?php echo $status;?></td>
                            <td style="text-align:center">
                            <?php if(isset($user_right)){
                                if($user_right['edit_right'] == '1'){ ?>
                                    <a href="<?php echo base_url()?>/edit_inventory/<?php echo $val['id'];?>"><i class="fa fa-pencil-alt" aria-hidden="true" style="color:yellowgreen"></i>
                                    </a>
                            <?php } } ?>  
                                &nbsp;&nbsp;
                                
                            </td> 
                        </tr> 
                        <?php } ?>
                    </tbody>
                </table>
            </div> 
        </div>
    </div>

</div>

<script type="text/javascript" src="<?php echo base_url()?>/public/assets/js/inventory/inventory.js"></script>

<?php echo view('footer');?> 