<?php
echo view('header');
// print_r($product);
// exit();

?>
<!--sweet alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
</link>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">Product List</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">

                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href='product' class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air"><span><i class="fa fa-plus-circle"></i><span>Add Product</span></span></a>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                    </ul>

                </div>
            </div>
            <div style="padding:15px">
                <table class="table table-striped table-bordered" id="productlist">
                    <thead>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product SKU</th>
                        <th>Description</th>
                        <th>Short Description</th>
                        <th>Status</th>
                        <!-- <th>Attribute ID</th>  -->
                        <th>Option</th>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($product as $prdct) {

                        ?>
                            <tr>
                                <td><?php echo $prdct['id']; ?></td>
                                <td><?php echo $prdct['product_name'] ?></td>
                                <td><?php echo $prdct['product_sku'] ?></td>
                                <td><?php echo $prdct['long_description'] ?></td>
                                <td><?php echo $prdct['short_description'] ?> </td>
                                <td><?php if ($prdct['product_status'] == 1) {
                                        echo 'Available';
                                    } else {
                                        echo 'Not available';
                                    };
                                   // $count++;
                                    ?></td>
                                <td style="text-align:center">
                                    <a href="<?php echo base_url(); ?>/edit_products/<?php echo $prdct['id']; ?>"><i class="fa fa-pencil-alt" aria-hidden="true" style="color:yellowgreen"></i>
                                    </a>

                                    &nbsp;&nbsp;

                                    <a href="#" onclick="deleteRecord(<?php echo $prdct['id']; ?>)"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>
                                    </a>
                                    &nbsp;&nbsp;
                                </td>
                            </tr>
                        <?php

                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php echo view('footer'); ?>




<script>
    $(document).ready(function() {
        $('#productlist').DataTable({
            // pagingType: 'full_numbers',
        });
    });

    var BASE_URL = '<?php echo base_url() ?>';

    function deleteRecord(id) {
        var delete_id = id
       
        swal({
            title: "Are you sure?",
            text: "Do you want to delete this product?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: 'No'
        }).then(function(success) {
            if (success.value) {
                
                $.ajax({
                    method: "POST",
                    url: BASE_URL + '/display_deleted',
                    data: {
                        "delete_id": id
                    },
                    success: function(data) {
                        Swal.fire('Product deleted successfully!', '', 'success');
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                });
            }
        });
    }
</script>