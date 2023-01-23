<?php echo view('header');

// print'<pre>';
// print_r($product_edit['prdct']['id']);
//  exit();
$var = array();
foreach ($product_var as $val) {
    array_push($var, $val['attributes_variations_id']);
}
//print'<pre>';print_r($var);exit();

?>


<!--sweet alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
</link>

<style>
    .field-icon {
        float: right;
        margin-right: 20px;
        margin-top: -27px;
        position: relative;
        z-index: 2;

    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 40%;
        margin: 15px;
        float: left;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .container {
        padding: 2px 14px;

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

    .img_prdct {
        width: 20%;
    }

    .img_prdct img {
        width: 100%;
        object-fit: cover;
        object-position: center;
        height: 130px;
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
                                            height: 150px;
                                            width: 150px;
                                            margin-left: 15px;
                                            margin-top: 14px;
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
                                <h3 class="m-portlet__head-text" style="font-size:21px">Update Product </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item">

                                    <a href="<?php echo base_url() ?>/display_products" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
                                        <span><i class="fa fa-list-ul"></i><span>View Product list</span></span>
                                    </a>

                                </li>
                                <li class="m-portlet__nav-item"></li>
                            </ul>
                        </div>
                    </div>


                    <div class="m-portlet m-portlet--tabs">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-tabs m-tabs-line  m-tabs-line--2x m-tabs-line--right" role="tablist">
                                    <li class="nav-item m-tabs__item active">
                                        <a class="nav-link m-tabs__link active show" href="" aria-selected="true">Edit Product
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item disabled">
                                        <a class="nav-link m-tabs__link " tabindex="-1" href="<?php echo base_url() ?>/attribute/<?php echo $product_edit['prdct']['id']?>" aria-disabled="true">Edit attributes
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="m-form m-form--state m-form--fit m-form--label-align-right" id="customerform" action="<?php echo base_url() ?>/update_product" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <!-- <input type="hidden" name="Customer_ID" id="Customer_ID" class="form-control" value=""> -->
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">

                                <div class="col-lg-6 m-form__group-sub ">
                                    <input type="hidden" name="product_id" value="<?php echo $product_edit['prdct']['id'] ?>" />
                                    <label class="form-control-label"><span style="color:red">*</span>Product name</label>
                                    <input type="text" name="product_name" onkeyup="nameVal()" id="product_name" value="<?php echo $product_edit['prdct']['product_name'] ?>" class="form-control m-input" placeholder="" tabindex="3" required>
                                    <span id="nameerror" style="color:red;display:none"></span>
                                </div>

                                <div class="col-lg-6 m-form__group-sub ">
                                    <label class="form-control-label"><span style="color:red">*</span>Product SKU </label>
                                    <input type="text" name="product_sku" id="product_sku" value="<?php echo $product_edit['prdct']['product_sku'] ?>" class="form-control m-input" placeholder="" tabindex="3" required>
                                    <span id="skuerror" style="color:red;display:none"></span>
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-6 m-form__group-sub ">
                                    <label for="comment" class="form-control-label"><span style="color:red">*</span>Description</label>
                                    <textarea class="form-control" rows="5" name="product_description" id="description" required><?php echo $product_edit['prdct']['long_description'] ?></textarea>
                                    <span id="description_error" style="color:red;display:none"></span>
                                </div>
                                <div class="col-lg-6 m-form__group-sub ">
                                    <label for="comment" class="form-control-label"><span style="color:red">*</span>Short Description</label>
                                    <textarea class="form-control" rows="5" name="short_description" id="description" required><?php echo $product_edit['prdct']['short_description'] ?></textarea>
                                    <span id="short_error" style="color:red;display:none"></span>
                                </div>
                            </div>


                            <div class="form-group m-form__group row">
                                <div class="col-lg-6 m-form__group-sub">
                                    <label for="exampleFormControlSelect1">Category id </label>

                                    <select class="form-control  m-bootstrap-select m_selectpicker" data-live-search="true" tabindex="3" id="exampleFormControlSelect1" name="cat_id" required>
                                        <option value="" disabled >Select an option</option>
                                        <?php
                                        foreach ($cat_data as $cat) {
                                        ?>
                                            <option value="<?php echo $cat['id']; ?>" 
                                            <?php 
                                            if($cat['id'] ==  $product_edit['prdct']['product_category_id']){
                                                echo 'selected';
                                            }
                                            ?>
                                            ><?php echo $cat['category_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <span id="caterror" style="color:red"></span>
                                </div>

                                <div class="col-lg-4 m-form__group-sub ">
                                    <label class="form-control-label"> Status </label>
                                    <div class="m-radio-inline">
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="1" <?php
                                                                                        if ($product_edit['prdct']['product_status'] == '1') {
                                                                                            echo "checked";
                                                                                        }
                                                                                        ?>> Available
                                            <span></span>
                                        </label>
                                        <label class="m-radio">
                                            <input type="radio" name="status" value="0" <?php
                                                                                        if ($product_edit['prdct']['product_status'] == '0') {
                                                                                            echo "checked";
                                                                                        }
                                                                                        ?>> Not available
                                            <span></span>
                                        </label>
                                    </div>
                                </div>

                            </div>


                            <!-- <div class="form-group m-form__group row">

                            </div> -->

                            <div class="form-group m-form__group row">
                                <div class="col-lg-12 m-form__group-sub ">
                                    <label for="m-3 form-control-label"><span style="color:red">*</span>Select images</label>
                                    <input type="file" class="form-control m-input" value="" name="multi_image[]" id="exampleFormControlFile1" multiple>
                                    
                                    <input id="prdct_files" class="form-control" name="prdct_hidden_files" type="hidden" accept="image/*" multiple />
                                    <div id="preview-wrapper"></div>
                                    
                                    <?php
                                    $varImg = $product_edit['prdct_img'];
                                    foreach ($varImg as $img) {

                                    ?>

                                        <div class="img_prdct card">

                                            <img src="<?php echo base_url() ?>/public/assets/images/productImgs/<?php echo $img['attatched_file_name'] ?>" width="100%" alt="img">
                                            <a class="remove-image" onclick="removeImage('<?php echo $img["id"]?>')" style="display: inline;" id="button">&#215;</a>
                                            <input type="hidden" name="hiddenimg[]" value="<?php echo $img['attatched_file_name'] ?>">

                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-8" style="text-align:center">

                                        <!-- <input type="button" class="btn btn-primary" value="Update" onclick="validate()"> -->
                                        <button type="submit" class="btn btn-primary" >Next</button>
                                        <a href="<?php echo base_url() ?>/display_products" class="btn btn-danger">Cancel</a>
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

<?php echo view('footer'); ?>

<!-- For image deletion -->
<script>

    var BASE_URL = '<?php echo base_url()?>';

    $(document).on('click', '.remove-image', function(e) {
        $(this).closest('.img_prdct').remove();
    });

    function removeImage(id) {
        $.ajax({
            method: "POST",
            url: BASE_URL +'/delete_att_img',
            dataType: "JSON",
            data:{id:id},
          
            success: function(data) {
                //console.log(data);
               // $(this).closest('.img_prdct').remove();
            }
        })
    }
</script>

<script>
    let nameError = document.getElementById("nameerror");
    let skuerror = document.getElementById("skuerror");
    let descrError = document.getElementById("description_error");
    let shortError = document.getElementById("short_error");
    let imgError = document.getElementById("file_error");
    let attrError = document.getElementById("attrerror");
    let catError = document.getElementById("caterror");

    function nameVal() {
        let name = document.getElementById("product_name").value;

        if (name.length == "") {
            nameError.innerHTML = "Required";
            return false;
        } else if (name.length < 3) {
            nameError.innerHTML = "Atleast 3 characters required";
            return false;
        } else {
            nameError.innerHTML = "";
            return true;
        }
    }

    function descrVal() {
        let descr = document.getElementById("description").value;

        if (descr.length == "") {
            descrError.innerHTML = "Required";
            return false;
        } else {
            descrError.innerHTML = "";
            return true;
        }
    }

    function attVal() {
        select = document.getElementById('attri');
        if (select.value == "") {
            attrError.innerHTML = "Required";
            return false;
        }
        return true;
    }

   
    function validate() {
        if (nameVal() && descrVal()) {
            $("#customerform").submit();
            swal("Product updated successfully");
            return true;
        } else {
            swal("Please fill all the fields");
            return false;
        }
    }

    function cancel() {
        swal("Insertion cancelled");
        return true;
    }

    function preview_image() {
        var total_file = document.getElementById("multi_image").files.length;
        for (var i = 0; i < total_file; i++) {
            $("#image_preview").append(
                "<img height='150px' width='150px' src='" + URL.createObjectURL(event.target.files[i]) + " '><br>"
            );
        }
    }



    let chooseFiles = document.getElementById("exampleFormControlFile1");
    // alert(chooseFiles);
    let previewWrapper = document.getElementById("preview-wrapper");
    // alert(previewWrapper)
    let form = document.getElementById('customerform');


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
        evt.preventDefault()
       
        const toSend = []
        const afterdelete = []
        const imgs = [...document.querySelectorAll('.img')].map(img => img.dataset.name);

        [...chooseFiles.files].forEach(file => {
            if (imgs.includes(file.name)) {
                toSend.push(file)
            }
        })
        for (var i = 0; i < toSend.length; i++) {
            // var file = files[i];
           
            afterdelete.push(toSend[i]['name']);
        }
        
        document.getElementById("prdct_files").value = afterdelete;
        //$("#prdct_files").val(afterdelete);
        validate();
        //form.submit();
        // return true;/
    })
</script>