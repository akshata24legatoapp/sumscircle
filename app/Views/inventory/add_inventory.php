<?php echo view('header'); ?>
				
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text" style="font-size:21px">Add New Inventory</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                   
                                	<a href="inventory" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                		<span><i class="fa fa-list-ul"></i><span>View Inventory List</span></span>
                                	</a>
                                    
                                </li>
                                <li class="m-portlet__nav-item"></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!--begin::Form-->
                     <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="inventoryform" action="save_inventory" method= "POST" 
                        enctype="multipart/form-data" autocomplete="off">

                        <input type="hidden" name="inventory_id" id="inventory_id" class="form-control" value=""> 
                        <div class="m-portlet__body">
                           <div class="form-group m-form__group row">
                            	<div class="col-lg-4 m-form__group-sub ">
                                   <label class="form-control-label"><span style="color:red">*</span>Select Product</label>
                                    <div style="display:flex;">
                                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" tabindex="3" 
                                        name="product_id" id="product_id" onchange="getProductsku(this.value)">
                                            <option value="0">Select Product</option>
                                            <?php foreach($products as $val){ ?>
                                            <option value="<?php echo $val['id']?>"> <?php echo $val['product_name']?>
                                            <?php }?>
                                        </select>
                                        
                                    </div>
                                    <span id="product" style="display:none;color:red">Please select Product</span>
                                </div>
                                
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>Product SKU </label>
                                 	<input type="text" name="product_sku" id="product_sku" 
                                    value="" class="form-control m-input" placeholder="" tabindex="3" readonly>
                                </div>
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"> Status </label> 
                                    <div class="m-radio-inline">                                          
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="1" checked >In stock
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="0" > Out of stock
                                            <span></span>
                                        </label>
                                    </div>      
                                </div> 
                            </div>
                            <div class="form-group m-form__group row">              
                                
                                <div class="col-lg-4 m-form__group-sub ">
                                   	<label class="form-control-label"><span style="color:red">*</span>Default Quantity</label>
                                    <input type="text" name="default_quantity" id="default_quantity" value="" class="form-control m-input onlyNumber" placeholder="" tabindex="3" onkeyup="getTotalQuantity()">
                                    <span id="def_quan" style="color:red;display:none">Default quantity field is required</span>
                                </div>
                              
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>Sold Quantity </label>                
                                    <input type="text" name="sold_quantity" value="" id="sold_quantity" class="form-control m-input onlyNumber" placeholder="" tabindex="3" maxlength='15' onkeyup="getTotalQuantity()">
                                     <span id="sold_quan" style="color:red;display:none">Sold quantity field is required</span>
                                </div>
                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>Total Quantity</label>                
                                    <input type="text" name="total_quantity" value="" id="total_quantity" class="form-control m-input onlyNumber" placeholder="" tabindex="3" maxlength='15' readonly>
                                </div>
                           	</div>
                            
                             <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-12" style="text-align:center">
                                       
                                        <button type="button" class="btn btn-primary" onclick="validateInventory_form()">Save</button>
                                      
                                        <a href="inventory" class="btn btn-danger">Cancel</a>
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

<script type="text/javascript" src="<?php echo base_url()?>/public/assets/js/inventory/inventory.js"></script>

<?php echo view('footer');?> 