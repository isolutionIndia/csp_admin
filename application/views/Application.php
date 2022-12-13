<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'uploads/'; ?>assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'uploads/'; ?>assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
</head>
<?php  ?>

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
				<h3 class="text-themecolor">Manage Applications</h3>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

						<li class="breadcrumb-item active">Applications</li>
					</ol>
				</div>
			</div>
		</div>
		<?php //echo $edit['user']; 
		?>
		<!-- ============================================================== -->
		<!-- End Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<?php //print_r($edit); 
		?>
		<form novalidate="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" class="form-control <?php echo (form_error('id') != "") ? 'is-invalid' : '' ?>" value="<?php echo  $edit != NULL ? $edit['id'] : ''; ?>">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12  bt-switch">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title m-b-30">Add Application</h4>
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-4  bt-switch">
									<div class="form-group">
										<h5>Applicant<span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="user" id="user" onchange="get_services_according_provider_for_specificUser(this.value)" onload="get_services_according_provider_for_specificUser(this.value)" class="form-control <?php echo (form_error('user')) ? 'is-invalid' : '' ?>" required="" class="form-control" aria-invalid="false">
												<option value="">Select Applicant From Enquiry</option>
												<?php if (!empty($users)) {
													foreach ($users as $user) {
														$selected = ($user['id'] == $edit['user']) ? true : false;
												?>

														<option <?php echo set_select('user', $user['id'], $selected); ?> value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
												<?php }
												} ?>
											</select>
											<?php echo form_error('user') ?>
											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<h5>Service<span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="service" id="service" required="" class="form-control" aria-invalid="false">
												<option value=""><?php echo 'Select'; ?>
												</option>
											</select>

											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<label>Serial No.<span class="text-danger">*</span></label>
										<div class="controls">
											<input type="text" id="serialno" name="serialno" class="form-control <?php echo (form_error('serialno') != "") ? 'is-invalid' : '' ?>" value="<?php $serialno = $edit != NULL ? $edit['serialno'] : $serial;
																																															echo set_value('serialno', $serialno) ?>" placeholder="" required="" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-4  bt-switch">
									<div class="form-group">
										<label>Proposal No.<span class="text-danger">*</span></label>
										<div class="controls">
											<input type="text" id="proposalno" name="proposalno" class="form-control <?php echo (form_error('proposalno') != "") ? 'is-invalid' : '' ?>" value="<?php $proposalno = $edit != NULL ? $edit['proposalno'] : $proposal;
																																																echo set_value('proposalno', $proposalno) ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<label>Reference No.<span class="text-danger">*</span></label>
										<div class="controls">
											<input type="text" id="referanceno" name="referanceno" class="form-control <?php echo (form_error('referanceno') != "") ? 'is-invalid' : '' ?>" value="<?php $referanceno = $edit != NULL ? $edit['referanceno'] : $refferance;
																																																	echo set_value('referanceno', $referanceno) ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<label>Application No.<span class="text-danger">*</span></label>
										<div class="controls">
											<input type="text" id="applicationno" name="applicationno" class="form-control <?php echo (form_error('applicationno') != "") ? 'is-invalid' :  '' ?>" value="<?php $applicationno = $edit != NULL ? $edit['applicationno'] :  $appnum;
																																																			echo set_value('applicationno', $applicationno) ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-4  bt-switch">
									<div class="form-group">
										<label>Image <span class="text-danger">*</span></label>
										<div class="controls">
											<input type="file" name="image" class="form-control <?php echo (!empty($errorImageUpload)) ? 'is-invalid' : '' ?>">
											<?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>
											<?php echo $edit != NULL ? '<img src="' . base_url() . 'uploads/application/thumb/' . $edit['userlogo'] . ' " alt="">' : ''; ?>
											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<label>Apply Date<span class="text-danger">*</span></label>
										<div class="controls">
											<input type="datetime-local" id="applydate" name="applydate" class="form-control <?php echo (form_error('applydate') != "") ? 'is-invalid' : '' ?>" value="<?php $applydate = $edit != NULL ? $edit['applydate'] : '';
																																																		echo set_value('applydate', $applydate) ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>


									<div class="form-group">
										<label>Status</label>
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" <?php echo $edit != NULL ? $edit['status'] == NULL ? '' :  'value="1" checked' : 'value="1" checked';
																																	'';
																																	?>>
											<label class="custom-control-label" for="customSwitch1">Active </label>
											<div class="text-center"><button type="submit" class="btn btn-success">Submit</button></div>

										</div>
									</div>

								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">List of Applications</h4>
							<div class="table-responsive m-t-40">
								<table id="config-table" class="table display table-bordered table-striped no-wrap">
									<thead>
										<tr>
											<th>Image</th>
											<th>Applicant</th>
											<th>Service Provider</th>
											<th>Service</th>
											<th class="text-center">Status</th>
											<th>Serial No.</th>
											<th>Proposal No.</th>
											<th>Reference No.</th>
											<th>Application No.</th>
											<th>Apply Date</th>


										</tr>
									</thead>
									<tbody>
										<?php if (!empty($applications)) { ?>
											<?php foreach ($applications as $application) { ?>
												<tr>
													<td><img src="<?php echo base_url() . 'uploads/application/thumb/' . $application['userlogo']; ?>" alt=""></td>
													<td><?php if (!empty($users)) {
															foreach ($users as $user) {
																if ($user['id'] ==  $application['user']) {
																	echo $user['username'];
																}
															}
														} ?>
														<br>
														<a href="<?php echo base_url() . 'super/application/edit/' . $application['id']; ?>" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-edit"></i></a>
														<a href="javascript::void(0)" onclick="deleteapplication(<?php echo $application['id']; ?>);" class="jsgrid-button jsgrid-delete-button"><i class="fas fa-trash-alt"></i></a>
														<a href="<?php echo base_url() . 'super/approval/index/' . $application['id']; ?>" class="btn btn-primary btn-xs">Approval</a>
													</td>
													<td><?php if (!empty($serviceproviders)) {
															foreach ($serviceproviders as $serviceprovider) {
																if ($serviceprovider['id'] ==  $application['serviceprovider']) {
																	echo $serviceprovider['ServiceProvidername'];
																}
															}
														} ?>
													</td>
													<td><?php if (!empty($services)) {
															foreach ($services as $service) {
																if ($service['id'] ==  $application['service']) {
																	echo $service['service'];
																}
															}
														} ?>
													</td>
													<td class="text-center"><span <?php echo $application['status'] ? 'class=" label label-success ">Active ' :  'class=" label label-danger ">Inactive'; ?></span> </td>
													<td><?php echo  $application['serialno']; ?></td>
													<td><?php echo  $application['proposalno']; ?></td>
													<td><?php echo  $application['referanceno']; ?></td>
													<td><?php echo  $application['applicationno']; ?></td>
													<td><?php echo date("m/d/Y", strtotime($application['applydate'])); ?></td>


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
	<script src=" <?php echo base_url() . 'uploads/'; ?>dist/js/pages/validation.js"></script>
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
		function deleteapplication(id) {
			if (confirm("Are you sure to delete Application ?")) {
				window.location.href = '<?php echo base_url() . 'super/application/delete/'; ?>' + id;

			}

		}
	</script>

</body>

<script>
	var serid;
	var bankid;
	<?php if ($edit != NULL) {

		echo "get_services_according_provider_for_specificUser(" . $edit['user'] . ");";
		echo 'serid=' . $edit['service'];
	} ?>



	function get_services_according_provider_for_specificUser(id) {

		var div_data = "";

		$.ajax({
			url: '<?php echo base_url(); ?>super/application/servicesByproviderinUserid',
			type: "POST",
			data: {
				item: id
			},
			dataType: 'json',
			success: function(res) {
				$.each(res, function(i, obj) {
					var sel = "";
					var select = "";
					if (obj.id == serid) {
						select = 'selected';
					}

					div_data += "<option value=" + obj.id + " " + select + ">" + obj.service + "</option>";

				});
				$("#service").html("<option value=''>Select</option>");
				$('#service').append(div_data);


			}

		});


	}
</script>



</html>
