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
				<h3 class="text-themecolor">Manage Enquiries</h3>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

						<li class="breadcrumb-item active">Enquiry</li>
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
				<div class="col-sm-12 col-md-12 col-lg-4  bt-switch">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title m-b-30">Add Enquiry</h4>
							<div class="form-group">
								<label>Name <span class="text-danger">*</span></label>
								<div class="controls">
									<input type="text" name="username" class="form-control <?php echo (form_error('username') != "") ? 'is-invalid' : '' ?>" value="<?php $username = $edit != NULL ? $edit['username'] : '';
																																									echo set_value('username', $username); ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<label>Email <span class="text-danger">*</span></label>
								<div class="controls">
									<input type="email" id="useremail" name="useremail" class="form-control <?php echo (form_error('useremail') != "") ? 'is-invalid' : '' ?>" value="<?php $useremail = $edit != NULL ? $edit['useremail'] : '';
																																														echo set_value('useremail', $useremail); ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<label>Phone number <span class="text-danger">*</span></label>
								<div class="controls">
									<input type="number" id="userphonenumber" name="userphonenumber" minlength="10" maxlength="10" class="form-control <?php echo (form_error('userphonenumber') != "") ? 'is-invalid' : '' ?>" value="<?php $userphonenumber = $edit != NULL ? $edit['userphonenumber'] : '';
																																																										echo set_value('userphonenumber', $userphonenumber); ?>" placeholder="10 digit mobile No." required="" data-validation-required-message="This is required" aria-invalid="false">
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<label>Aadhar Number</label>
								<div class="controls">
									<input type="number" name="aadharcard" minlength="12" maxlength="12" class="form-control <?php echo (form_error('aadharcard') != "") ? 'is-invalid' : '' ?>" value="<?php $aadharcard = $edit != NULL ? $edit['aadharcard'] : '';
																																																		echo set_value('aadharcard', $aadharcard); ?>" aria-invalid="false">
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<label>PAN Number</label>
								<div class="controls">
									<input type="text" name="pancard" minlength="10" maxlength="10" class="form-control <?php echo (form_error('pancard') != "") ? 'is-invalid' : '' ?>" value="<?php $pancard = $edit != NULL ? $edit['pancard'] : '';
																																																echo set_value('pancard', $pancard); ?>" aria-invalid="false">
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<label>Address <span class="text-danger">*</span></label>
								<div class="controls">
									<input type="text" name="address" class="form-control <?php echo (form_error('address') != "") ? 'is-invalid' : '' ?>" value="<?php $address = $edit != NULL ? $edit['address'] : '';
																																									echo set_value('address', $address); ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<h5>State<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="state" id="state" class="form-control <?php echo (form_error('state')) ? 'is-invalid' : '' ?>" required="" class="form-control" aria-invalid="false">
										<option value="">Select State</option>
										<?php if (!empty($tblstate)) {
											foreach ($tblstate as $tblstates) {
												$selected = ($tblstates['name'] == $edit['state']) ? true : false;
										?>

												<option <?php echo set_select('state', $tblstates['name'], $selected); ?> value="<?php echo $tblstates['name']; ?>"><?php echo $tblstates['name']; ?></option>
										<?php }
										} ?>
									</select>
									<?php echo form_error('state') ?>
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<label>District <span class="text-danger">*</span></label>
								<div class="controls">
									<input type="text" name="district" class="form-control <?php echo (form_error('district') != "") ? 'is-invalid' : '' ?>" value="<?php $district = $edit != NULL ? $edit['district'] : '';
																																									echo set_value('district', $district); ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<label>Pincode <span class="text-danger">*</span></label>
								<div class="controls">
									<input type="number" minlength="5" maxlength="5" name="pincode" class="form-control <?php echo (form_error('pincode') != "") ? 'is-invalid' : '' ?>" value="<?php $pincode = $edit != NULL ? $edit['pincode'] : '';
																																																echo set_value('pincode', $pincode); ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<h5>Service Provider<span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="serviceprovider" id="serviceprovider" class="form-control <?php echo (form_error('serviceprovider')) ? 'is-invalid' : '' ?>" required="" class="form-control" aria-invalid="false">
										<option value="">Select Service Provider</option>
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




							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-8">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">List of Enquiries</h4>
							<div class="table-responsive m-t-40">
								<table id="config-table" class="table display table-bordered table-striped no-wrap">
									<thead>
										<tr>
											<!-- <th>Image</th> -->
											<th>Name</th>
											<th>Email</th>
											<th>Phone No.</th>
											<th>Aadhar</th>
											<th>PAN</th>
											<th>Address</th>
											<th>State</th>
											<th>District</th>
											<th>pincode</th>
											<th>Service Provider</th>



										</tr>
									</thead>
									<tbody>
										<?php if (!empty($users)) { ?>
											<?php foreach ($users as $user) { ?>
												<tr>

													<td><?php echo  $user['username']; ?> <br>
														<a href="<?php echo base_url() . 'super/applicant/edit/' . $user['id']; ?>" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-edit"></i></a>
														<a href="javascript::void(0)" onclick="deleteuser(<?php echo $user['id']; ?>);" class="jsgrid-button jsgrid-delete-button"><i class="fas fa-trash-alt"></i></a>
													</td>
													<td><?php echo  $user['useremail']; ?></td>
													<td><?php echo  $user['userphonenumber']; ?></td>
													<td><?php echo  $user['aadharcard']; ?></td>
													<td><?php echo  $user['pancard']; ?></td>
													<td><?php echo  $user['address']; ?></td>
													<td><?php echo  $user['state']; ?></td>
													<td><?php echo  $user['district']; ?></td>
													<td><?php echo  $user['pincode']; ?></td>
													<td><?php if (!empty($serviceproviders)) {
															foreach ($serviceproviders as $serviceprovider) {
																if ($serviceprovider['id'] ==  $user['serviceprovider']) {
																	echo $serviceprovider['ServiceProvidername'];
																}
															}
														} ?>
													</td>

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
		function deleteuser(id) {
			if (confirm("Are you sure to delete Applicant ?")) {
				window.location.href = '<?php echo base_url() . 'super/applicant/delete/'; ?>' + id;

			}

		}
	</script>

</body>

</html>
