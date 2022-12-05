<?php echo view('header');
//print'<pre>';print_r($_SESSION);exit();

?>

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
                            <a href="" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air"><span><i class="fa fa-plus-circle"></i><span>Add Role</span></span></a>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                    </ul>
                   
                </div>
            </div>
            <div style="padding:10px">
                <table class="table table-striped table-bordered" id="customerlist">
                    <thead>
                        <th>Role ID</th>  
                        <th>Role Name</th> 
                        <th>Email</th>
                        <th>Mobile</th> 
                        <th>Status</th> 
                        <th>Option</th>    
                    </thead>
                    <tbody>
                       
                        <tr>
                        	<td>1</td>
                        	<td>test</td>
                        	<td>test2</td>
                            <td>1224344</td>
                           
                            <td>active</td>
                            <td style="text-align:center">
                               <a href=""><i class="fa fa-pencil-alt" aria-hidden="true" style="color:yellowgreen"></i>
                                </a>
                                
                                &nbsp;&nbsp;
                                
                                <a href="#" onclick=""><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>
                                </a>
                              
                                &nbsp;&nbsp;
                               
                                    <a href="">
                                    <i class="fa fa-key" aria-hidden="true" style="color:#628239" title="access Rights"></i>
                                    </a>
                              
                            </td> 
                        </tr>
                        <tr>
                        	<td>2</td>
                        	<td>test</td>
                        	<td>test2</td>
                            <td>1224344</td>
                           
                            <td>active</td>
                            <td style="text-align:center">
                               <a href=""><i class="fa fa-pencil-alt" aria-hidden="true" style="color:yellowgreen"></i>
                                </a>
                                
                                &nbsp;&nbsp;
                                
                                <a href="#" onclick=""><i class="fa fa-trash" aria-hidden="true" style="color:red"></i>
                                </a>
                              
                                &nbsp;&nbsp;
                               
                                    <a href="">
                                    <i class="fa fa-key" aria-hidden="true" style="color:#628239" title="access Rights"></i>
                                    </a>
                              
                            </td> 
                        </tr>
                           
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>
<script>
	$(document).ready(function () {  
	$('#customerlist').DataTable();  
	});
</script>

<?php echo view('footer');?> 