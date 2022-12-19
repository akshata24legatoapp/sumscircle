<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">Categorie List</h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="Catlog-add" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air"><span><i class="fa fa-plus-circle"></i><span>Add Categorie</span></span></a>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                    </ul>
                </div>
            </div>
            <div style="padding:10px">
                <table class="table table-striped table-bordered" id="customerlist">
                    <thead>
                        <th>Categorie ID</th>
                        <th>Categorie Name</th>
                        <th>Categorie Type</th>
                        <th>Status</th>
                        <th>Option</th>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $i = 1;
                            foreach ($Catlog_view as $Value) {
                            ?>
                                <td><?php echo $i ?></td>
                                <td><?php echo $Value['category_name']?></td>
                                <td><?php echo $Value['category_type']?></td>
                                <td <?php if ($Value['category_status'] == '1') $valstatus = 'Active'; else $valstatus = 'notactive';  ?>><?php echo $valstatus ?></td>
                                <td style="text-align:center">
                                    <a href="Catlog-update/<?php echo $Value['id'] ?>"><i class="fa fa-pencil-alt" aria-hidden="true" style="color:yellowgreen"></i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="#" onclick="deleteRecord(<?= $Value['id'] ?>)"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>
                                    </a>
                                    
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
<script>
    $(document).ready(function() {
        $('#customerlist').DataTable();
    });
    function deleteRecord(id) {
        var delete_id = id
        swal({
            title: "Are you sure?",
            text: "You Want To Delete Data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: 'No'
        }).then(function(success) {
            if (success.value) {
                $.ajax({
                    method: "POST",
                    url: BASE_URL + '/Catlog-delete',
                    data: {
                        "delete_id": delete_id
                    },
                    success: function(data) {
                        swal("Categories Data Delete!", {
                            icon: "success",
                        }).then(function(success) {
                            if (success) {
                                window.location.href = BASE_URL + '/Catlog-view';
                            }
                        });
                    }
                });
            }
        })
    };

</script>