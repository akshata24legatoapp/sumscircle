<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>sumcircle</title>
	<meta name="Pro-Bizdel" content="Pro-Bizdel">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<?php echo view('script'); ?>

</head>

<?php echo view('add_header'); ?>

<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

	<?php echo view('sidebar'); ?>

	<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
	
	<!-- <script src="<?php echo base_url(); ?>/assets/js/catlog.js" type="text/javascript"></script> -->
	<link href="<?php echo base_url(); ?>/assets/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>/assets/plugins/jodit/jodit.min.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url(); ?>/assets/plugins/datatables/datatables.min.js" type="text/javascript">
	</script>
	<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/bootstrap-select.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/assets/plugins/jodit/jodit.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.inputmask.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/assets/components/util/session_timeout/idle/store.min.js">
	</script>
	<script src="<?php echo base_url(); ?>/assets/components/util/session_timeout/idle/jquery-idleTimeout.min.js">
	</script>
	<script src="<?php echo base_url(); ?>/assets/components/util/session_timeout/idle/session-timeout-idle-init.js"></script>
	<script> var BASE_URL = "<?php echo base_url() ?>";</script>
	<style type="text/css">
		.color_span {
			color: #ffffff !important;
			width: 100%;
			border-radius: 3px;
			text-align: center;
			padding: 5px 0;
			display: block;
			font-weight: bold
		}

		#customerlist_wrapper {
			overflow: auto;
		}

		.date_change {
			position: absolute;
			right: 30px;
			top: 55%;
		}

		.toast-message {
			display: inline-block;
			padding-left: 8%;
			font-size: 16px;
		}
	</style>

	<script>
		$(document).ready(function() {
			$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
				$($.fn.dataTable.tables(true)).DataTable()
					.columns.adjust()
					.responsive.recalc();
			});

			$(".onlyNumber").keypress(function(e) {
				if (e.which == 46) {
					if ($(this).val().indexOf('.') != -1) {
						return false;
					}
				}

				if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
					return false;
				}
				// if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				// 	return false;
				// 	}
			});

			$(".datepicker").datepicker({
				format: "yyyy-mm-dd",
				orientation: "bottom-left",
				todayHighlight: !0,
				autoclose: true,
				clearBtn: true,
			});


			/* belows function only for telephone purpose */

			$('.onlyNumbersss').keypress(function(e) {
				var regex = new RegExp("^[0-9/ -]+$");
				var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
				if (regex.test(str)) {
					return true;
				}

				e.preventDefault();
				return false;
			});

		});
	</script>


	<script>
		toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-bottom-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "3000",
			"hideDuration": "500",
			"timeOut": "3000",
			"extendedTimeOut": "500",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut",

			iconClasses: {
				success: 'fas fa-check',
				error: 'fas fa-trash',
			},

		};
	</script>

</html>