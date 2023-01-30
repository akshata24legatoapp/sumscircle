<?php echo view('header') ?>

<!-- ///////// -->

<style>
    .field-icon {
        float: right;
        margin-right: 20px;
        margin-top: -27px;
        position: relative;
        z-index: 2;
    }

    .removecross {
        position: relative;
        top: 5px;
        right: 18px;
        height: 25px;
        width: 25px;
        background: #414141;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
    }

    #preview-wrapper {
        display: flex;
        flex-wrap: wrap;
    }

    #preview-wrapper img {
        position: relative;
        height: 100px;
        width: 100px;
        margin-left: 15px;
        margin-top: 14px;
    }

    .remove-image {
        display: none;
        position: absolute;
        top: -10px;
        right: -10px;
        border-radius: 10em;
        padding: 2px 6px 3px;
        text-decoration: none;
        font: 700 21px/20px sans-serif;
        background: #555;
        border: 3px solid #fff;
        color: #FFF;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5), inset 0 2px 4px rgba(0, 0, 0, 0.3);
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        -webkit-transition: background 0.5s;
        transition: background 0.5s;
    }

    .remove-image:hover {
        background: #E54E4E;
        cursor: pointer;
        padding: 3px 7px 5px;
        top: -11px;
        right: -11px;
    }

    .remove-image:active {
        background: black;
        top: -10px;
        right: -11px;
    }
</style>


<!--  sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
</link>

<!-- <form  enctype="multipart/form-data"> -->
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text" style="font-size:21px">Add New Product </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">
                                    <?php if(isset($user_list_view_right)){
                                            if($user_list_view_right['view_right'] == '1'){ ?>
                                        <a href="display_products" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                        <span><i class="fa fa-list-ul"></i><span>View Product list</span></span>
                                        </a>
                                    <?php } } ?>
                                </li>
                                <li class="m-portlet__nav-item"></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Section 1 -->
                    <div class="section1">
                        <div class="m-portlet m-portlet--tabs">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-tools">
                                    <ul class="nav nav-tabs m-tabs-line  m-tabs-line--2x m-tabs-line--right" role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <div class="panel panel-flat">
                                                <div class="panel-body">
                                                    <a class="nav-link m-tabs__link active show" href="" aria-selected="true">Add Product
                                                    </a>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- <li class="nav-item m-tabs__item">
                                            <div class="panel panel-flat">
                                                <div class="panel-body">
                                                    <a class="nav-link m-tabs__link " href="<?php echo base_url() ?>/add_attributes" aria-disabled="true">Add Attributes
                                                    </a>
                                        </li> -->

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--begin::Form-->
                        <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="customerform" action="<?php echo base_url() ?>/add_products" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <input type="hidden" name="Customer_ID" id="Customer_ID" class="form-control" value="">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub ">
                                        <label class="form-control-label"><span style="color:red">*</span>Product Name </label>
                                        <input type="text" name="product_name" id="product_name" value="" class="form-control m-input" onkeydown="nameVal()" placeholder="" tabindex="3">
                                        <span id="name_error" style="color:red"></span>
                                    </div>

                                    <div class="col-lg-6 m-form__group-sub ">
                                        <label class="form-control-label"><span style="color:red">*</span>Product SKU </label>
                                        <input type="text" name="product_sku" id="product_sku" value="" class="form-control m-input" onkeydown="productVal()" placeholder="" tabindex="3">
                                        <span id="product_error" style="color:red"></span>

                                    </div>

                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub ">
                                        <label for="comment" class="form-control-label"><span style="color:red">*</span>Description</label>
                                        <textarea class="form-control" rows="5" name="product_description" onkeydown="descrVal()" id="description"></textarea>
                                        <span id="description_error" style="color:red"></span>
                                    </div>
                                    <div class="col-lg-6 m-form__group-sub ">
                                        <label for="comment" class="form-control-label"><span style="color:red">*</span>Short Description</label>
                                        <textarea class="form-control" rows="5" name="short_description" onkeydown="shortVal()" id="shot_descr"></textarea>
                                        <span id="short_error" style="color:red"></span>
                                    </div>
                                </div>


                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6 m-form__group-sub">
                                        <label for="exampleFormControlSelect1">Category id </label>

                                        <select class="form-control  m-bootstrap-select m_selectpicker" data-live-search="true" onchange="cat_val()" tabindex="3" id="cat_id" name="cat_id">
                                            <option value="">Choose an option</option>
                                            <?php
                                            foreach ($cat_data as $cat) {
                                               
                                            ?>
                                                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['category_name'];?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <span id="cat_error" style="color:red"></span>
                                    </div>

                                    <div>
                                        <div class="col-lg-4 m-form__group-sub ">
                                            <label class="form-control-label"> Status </label>
                                            <div class="m-radio-inline">
                                                <label class="m-radio">
                                                    <input type="radio" id="prstat" name="status" value="1" checked> Available
                                                    <span></span>
                                                </label>
                                                <label class="m-radio">
                                                    <input type="radio" id="prstat" name="status" value="0"> Not available
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Images -->
                               
                                    <div class="col-lg-12 m-form__group-sub ">
                                        <label for="m-3 form-control-label">Select images</label>
                                        <input type="file" accept="image/*" class="form-control m-input" name="image[]" id="multi_image" multiple='multiple' >
                                        <span id="file_error" style="color:red"></span>
                                        <input id="prdct_files" class="form-control" name="prdct_hidden_files" type="hidden" accept="image/*" multiple />
                                        <div id="preview-wrapper"></div>
                                        <br>
                                    </div>
                               



                                <div class="m-form__actions m-form__actions">
                                    <!-- Next and cancel button  -->
                                    <div class="col-lg-12" style="text-align:center">
                                        <?php if(isset($user_right)){
                                            if($user_right['add_right'] == '1'){ ?>
                                            <button id="next_button" type="submit"  class="btn btn-primary">Next</button>
                                        <?php } }?>
                                        <?php if(isset($user_list_view_right)){
                                            if($user_list_view_right['view_right'] == '1'){ ?>
                                            <a href="<?php echo base_url() ?>/display_products" id="cancel" class="btn btn-danger">Cancel</a>
                                         <?php } }?>
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
<?php echo view('footer') ?>

<script src="./public/assets/js/catlog.js"></script>
<script>
   

    // Addtional function 
    let chooseFiles = document.getElementById("multi_image");
    // alert(chooseFiles);
    let previewWrapper = document.getElementById("preview-wrapper");
    // console.log(previewWrapper);
    let form = document.getElementById('customerform');
    // console.log(form);

    chooseFiles.addEventListener("change", (e) => {
        [...e.target.files].forEach(showFiles);
    });


    function showFiles(file) {
        // console.log('hey');
        let previewImage = new Image();
        // div.innerHTML = str;
        var html = '<i class="fa fa-times-circle removecross"></i>';
        previewImage.dataset.name = file.name;
        previewImage.classList.add("img");
        previewImage.src = URL.createObjectURL(file);

        previewWrapper.append(previewImage); // append preview image
        previewImage.insertAdjacentHTML('afterend', html);

        document.querySelectorAll(".removecross").forEach((i) => {
            i.addEventListener("click", (e) => {
                
                i.previousSibling.remove();
                // i.nextSibling.remove();
                e.target.remove();
            });
        });
    }



    form.addEventListener('submit', (evt) => {
        
        evt.preventDefault();
       
        const toSend = []
        const afterdelete = []
        const imgs = [...document.querySelectorAll('.img')].map(img => img.dataset.name);

        [...chooseFiles.files].forEach(file => {
            if (imgs.includes(file.name)) {
                toSend.push(file)
                 console.log(toSend);
            }
        })

        for (var i = 0; i < toSend.length; i++) {
            // var file = files[i];
           
            afterdelete.push(toSend[i]['name']);
            
        }
        //console.log(afterdelete);
         document.getElementById("prdct_files").value = afterdelete;
        //$("#prdct_files").val(afterdelete);
        validate();
        //form.submit();
        
    })
</script>