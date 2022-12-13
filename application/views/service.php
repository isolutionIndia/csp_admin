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
				<h3 class="text-themecolor">Manage Service</h3>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

						<li class="breadcrumb-item active">Service</li>
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
		<form novalidate="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" class="form-control <?php echo (form_error('id') != "") ? 'is-invalid' : '' ?>" value="<?php echo  $edit != NULL ? $edit['id'] : ''; ?>">
			<div class="row">
				<?php if ('0' == $this->session->userdata('status')) {  ?>
					<div class="col-sm-12 col-md-12 col-lg-4  bt-switch">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title m-b-30">Add Service</h4>
								<div class="form-group">
									<label>Name <span class="text-danger">*</span></label>
									<div class="controls">
										<input type="text" name="service" class="form-control <?php echo (form_error('service') != "") ? 'is-invalid' : '' ?>" value="<?php $service = $edit != NULL ? $edit['service'] : '';
																																										echo set_value('service', $service); ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
										<div class="help-block"></div>
									</div>
								</div>

								<div class="form-group">
									<h5>Service Provider<span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="serviceprovider" id="serviceprovider" class="form-control <?php echo (form_error('serviceprovider')) ? 'is-invalid' : '' ?>" required="" class="form-control" aria-invalid="false">
											<?php if (!empty($serviceproviders)) {
												foreach ($serviceproviders as $serviceprovider) {
													$selected = ($serviceprovider['id'] == $edit['serviceprovider']) ? true : false;
											?>

													<option <?php echo set_select('serviceprovider', $serviceprovider['id'], $selected); ?> value="<?php echo $serviceprovider['id']; ?>"><?php echo $serviceprovider['ServiceProvidername']; ?></option>
											<?php }
											} ?>
										</select>
										<?php echo form_error('serviceprovider') ?>
										<div class="help-block"></div>
									</div>
								</div>

								<div class="form-group">
									<label>Logo </label>
									<div class="controls">
										<input type="file" name="image" class="form-control <?php echo (!empty($errorImageUpload)) ? 'is-invalid' : '' ?>">
										<?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>
										<?php echo $edit != NULL ? '<img src="' . base_url() . 'uploads/service/thumb/' . $edit['logo'] . ' " alt="">' : ''; ?>
										<div class="help-block"></div>
									</div>
								</div>
								<div class="form-group">
									<label>Status</label>
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" <?php echo $edit != NULL ? $edit['status'] == NULL ? '' :  'value="1" checked' : 'value="1" checked';
																																'';
																																?>>
										<label class="custom-control-label" for="customSwitch1">Active</label>
									</div>
								</div>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</div><?php } ?>
				<div class="col-sm-12 col-md-12 <?php if ('0' == $this->session->userdata('status')) {  ?> col-lg-8 <?php } ?>">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">List of Service</h4>
							<div class="table-responsive m-t-40">
								<table id="config-table" class="table display table-bordered table-striped no-wrap">
									<thead>
										<tr>
											<th>Logo</th>
											<th>Name</th>
											<th>Service Provider</th>

											<th class="text-center">Status</th>

										</tr>
									</thead>
									<tbody>
										<?php if (!empty($services)) { ?>
											<?php foreach ($services as $service) { ?>
												<tr>
													<td><img src="<?php echo base_url() . 'uploads/service/thumb/' . $service['logo']; ?>" alt=""></td>
													<td><?php echo  $service['service']; ?> <br>
														<?php if ('0' == $this->session->userdata('status')) {  ?> <a href="<?php echo base_url() . 'super/service/edit/' . $service['id']; ?>" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-edit"></i></a>
															<a href="javascript::void(0)" onclick="deleteservice(<?php echo $service['id']; ?>);" class="jsgrid-button jsgrid-delete-button"><i class="fas fa-trash-alt"></i></a> <?php } ?>
													</td>
													<td><?php if (!empty($serviceproviders)) {
															foreach ($serviceproviders as $serviceprovider) {
																if ($serviceprovider['id'] ==  $service['serviceprovider']) {
																	echo $serviceprovider['ServiceProvidername'];
																}
															}
														} ?>
													</td>


													<td class="text-center"><span class="label label-success">Active</span></td>

												</tr>
										<?php }
										} ?>

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
	<script>
		function deleteservice(id) {
			if (confirm("Are you sure to delete Service ?")) {
				window.location.href = '<?php echo base_url() . 'super/service/delete/'; ?>' + id;

			}

		}
	</script>

</body>

</html>
