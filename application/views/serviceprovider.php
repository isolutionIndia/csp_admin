<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'uploads/'; ?>assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'uploads/'; ?>assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
</head>

<body class="horizontal-nav skin-megna fixed-layout">
	<?php $this->load->view('body'); ?>
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">

		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">Manage Service Providers</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

						<li class="breadcrumb-item active">Service Providers</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<form novalidate="">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-4  bt-switch">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title m-b-30">Add Service Provider</h4>
							<div class="form-group">
								<label>Service Provider Name <span class="text-danger">*</span></label>
								<div class="controls">
									<input type="text" name="Service Provider-name" class="form-control" required="" data-validation-required-message="This is required" aria-invalid="false">
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<label>Service Provider email <span class="text-danger">*</span></label>
								<div class="controls">
									<input type="number" id="Service Provider-email" name="Service Provider-email" minlength="10" maxlength="10" value="<?php echo set_value('company_phone', $organisation['company_phone']) ?>" class="form-control <?php echo (form_error('company_phone')) ? 'is-invalid' : '' ?>" placeholder="10 digit mobile No." required="" data-validation-required-message="This is required" aria-invalid="false">
									<input type="email" name="" class="form-control" required="" data-validation-required-message="This is required" aria-invalid="false">
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<label>Service Provider Phone number <span class="text-danger">*</span></label>
								<div class="controls">
									<input type="number" name="Service Provider-phonenumber" class="form-control" required="" data-validation-required-message="This is required" aria-invalid="false">
									<div class="help-block"></div>
								</div>
							</div>

							<div class="form-group">
								<label>Service Provider Logo <span class="text-danger">*</span></label>
								<div class="controls">
									<input type="file" name="Service Provider-logo" class="form-control" required="" data-validation-required-message="This is required" aria-invalid="false">
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<label>Status</label>
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
									<label class="custom-control-label" for="customSwitch1">Active</label>
								</div>
							</div>
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-8">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">List of Service Providers</h4>
							<div class="table-responsive m-t-40">
								<table id="config-table" class="table display table-bordered table-striped no-wrap">
									<thead>
										<tr>
											<th>Logo</th>
											<th>Service Provider Name</th>
											<th>Service Provider Email</th>
											<th>Service Provider Phone No</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><img src="<?php echo base_url(); ?>uploads/assets/images/favicon.png" alt=""></td>
											<td>name1</td>
											<td>email1@mail.com</td>
											<td>1234567890</td>
											<td class="text-center"><span class="label label-success">Active</span></td>
											<td class="text-center"><button class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></button><button class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></button></td>
										</tr>
										<tr>
											<td><img src="<?php echo base_url(); ?>uploads/assets/images/favicon.png" alt=""></td>
											<td>name2</td>
											<td>email2.com</td>
											<td>1234567890</td>
											<td class="text-center"><span class="label label-success">Active</span></td>
											<td class="text-center"><button class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></button><button class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></button></td>
										</tr>
										<tr>
											<td><img src="<?php echo base_url(); ?>uploads/assets/images/favicon.png" alt=""></td>
											<td>name3</td>
											<td>email3@mail.com</td>
											<td>1234567890</td>
											<td class="text-center"><span class="label label-success">Active</span></td>
											<td class="text-center"><button class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></button><button class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></button></td>
										</tr>
										<tr>
											<td><img src="<?php echo base_url(); ?>uploads/assets/images/favicon.png" alt=""></td>
											<td>name4</td>
											<td>email4@mail.com</td>
											<td>1234567890</td>
											<td class="text-center"><span class="label label-success">Active</span></td>
											<td class="text-center"><button class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></button><button class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></button></td>
										</tr>
										<tr>
											<td><img src="<?php echo base_url(); ?>uploads/assets/images/favicon.png" alt=""></td>
											<td>name5</td>
											<td>email5@mail.com</td>
											<td>1234567890</td>
											<td class="text-center"><span class="label label-danger">Inactive</span>
											</td>
											<td class="text-center"><button class="jsgrid-button jsgrid-edit-button" type="button" title="Edit"></button><button class="jsgrid-button jsgrid-delete-button" type="button" title="Delete"></button></td>
										</tr>

									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
			</div>
		</form>
	</div>
	<!-- ============================================================== -->
	<!-- End PAge Content -->
	<!-- ============================================================== -->
	<?php //include_once('sidebar.php'); 
	?>
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->


	<?php $this->load->view('footer'); ?>
	<script src="<?php echo base_url() . 'uploads/'; ?>dist/js/pages/validation.js"></script>
	<script>
		! function(window, document, $) {
			"use strict";
			$("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
		}(window, document, jQuery);
	</script>
	<!-- This is data table -->
	<script src="<?php echo base_url() . 'uploads/'; ?>assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() . 'uploads/'; ?>assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
	<!-- start - This is for export functionality only -->
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
	<!-- end - This is for export functionality only -->
	<script>
		$(function() {
			// responsive table
			$('#config-table').DataTable({
				responsive: true
			});
			$('#example23').DataTable({
				dom: 'Bfrtip',
				buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print'
				]
			});
			$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass(
				'btn btn-primary mr-1');
		});
	</script>

</body>

</html>
