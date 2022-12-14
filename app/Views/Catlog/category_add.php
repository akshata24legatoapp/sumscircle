			<style>
				.field-icon {
					float: right;
					margin-right: 20px;
					margin-top: -27px;
					position: relative;
					z-index: 2;
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
											<h3 class="m-portlet__head-text" style="font-size:21px">Add New Category</h3>
										</div>
									</div>
									<div class="m-portlet__head-tools">
										<ul class="m-portlet__nav">
											<li class="m-portlet__nav-item">

												<a href="view-category" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
													<span><i class="fa fa-list-ul"></i><span>View Category</span></span>
												</a>

											</li>
											<li class="m-portlet__nav-item"></li>
										</ul>
									</div>
								</div>

								<!--begin::Form-->
								<form class="m-form m-form--state m-form--fit m-form--label-align-right" id="myform" method="POST" action="category-upload">
									<div class="m-portlet__body">
										<div class="form-group m-form__group row">
											<div class="col-lg-4 m-form__group-sub ">
												<label class="form-control-label"><span style="color:red">*</span>Category Name </label>
												<input type="text" name="cat_name" id="cat_name" value="" class="form-control m-input" placeholder="Category Name " tabindex="3">
												<span id="name" style="color:red;display:none">Name field is required</span>
											</div>
											<div class="col-lg-4 m-form__group-sub ">
												<label class="form-control-label"><span style="color:red">*</span>Category Type </label>
												<input type="text" name="cat_type" id="cat_type" value="" class="form-control m-input" placeholder="Category Type " tabindex="3">
												<span id="name" style="color:red;display:none">Name field is required</span>
											</div>
										</div>
									</div>
									<div class="form-group m-form__group row">
										<div class="col-lg-4 m-form__group-sub ">
											<label class="form-control-label"> Status </label>
											<div class="m-radio-inline">
												<label class="m-radio">
													<input type="radio" name="Status" id="Status" value="1" required> Active
													<span></span>
												</label>
												<label class="m-radio">
													<input type="radio" name="Status" id="Status" value="0" required> Inactive
													<span></span>
												</label>
											</div>
										</div>
									</div>
									<div class="m-form__actions m-form__actions">
										<div class="row">
											<div class="col-lg-12" style="text-align:center">
												<input type="button" value="submit" id="catlog_sub_button" form="myform" class="btn btn-primary">
												<a href="<?php echo base_url(); ?>/view-category" class="btn btn-danger">Cancel</a>
											</div>
										</div>
									</div>
								</form>
								<!-- <input type="text"  name="textddd" id="textddd">
								<button  type="submit" id="swal"></button> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<script src="<?php echo base_url(); ?>/assets/js/catlog.js" type="text/javascript"></script>