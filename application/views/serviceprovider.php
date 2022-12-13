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
				<h3 class="text-themecolor">Manage Service Providers</h3>
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
		<form novalidate="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" class="form-control <?php echo (form_error('id') != "") ? 'is-invalid' : '' ?>" value="<?php echo  $edit != NULL ? $edit['id'] : ''; ?>">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12  bt-switch">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title m-b-30">Add Service Provider</h4>
							<div class="row">
								<div class="col-sm-12 col-md-4 col-lg-4">
									<div class="form-group">
										<label>Name <span class="text-danger">*</span></label>
										<div class="controls">
											<input type="text" name="ServiceProvidername" class="form-control <?php echo (form_error('ServiceProvidername') != "") ? 'is-invalid' : '' ?>" value="<?php $ServiceProvidername = $edit != NULL ? $edit['ServiceProvidername'] : '';
																																																	echo set_value('ServiceProvidername', $ServiceProvidername); ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<label>Email <span class="text-danger">*</span></label>
										<div class="controls">
											<input type="email" id="ServiceProvideremail" name="ServiceProvideremail" class="form-control <?php echo (form_error('ServiceProvideremail') != "") ? 'is-invalid' : '' ?>" value="<?php $ServiceProvideremail = $edit != NULL ? $edit['ServiceProvideremail'] : '';
																																																								echo set_value('ServiceProvideremail', $ServiceProvideremail); ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<label>Phone number <span class="text-danger">*</span></label>
										<div class="controls">
											<input type="number" id="ServiceProviderphonenumber" name="ServiceProviderphonenumber" minlength="10" maxlength="10" class="form-control <?php echo (form_error('ServiceProviderphonenumber') != "") ? 'is-invalid' : '' ?>" value="<?php $ServiceProviderphonenumber = $edit != NULL ? $edit['ServiceProviderphonenumber'] : '';
																																																																				echo set_value('ServiceProviderphonenumber', $ServiceProviderphonenumber); ?>" placeholder="10 digit mobile No." required="" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<label>Address <span class="text-danger">*</span></label>
										<div class="controls">
											<input type="text" name="ServiceProvideraddress" class="form-control <?php echo (form_error('ServiceProvideraddress') != "") ? 'is-invalid' : '' ?>" value="<?php $ServiceProvideraddress = $edit != NULL ? $edit['ServiceProvideraddress'] : '';
																																																		echo set_value('ServiceProvideraddress', $ServiceProvideraddress); ?>" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-4 col-lg-4  ">
									<div class="form-group">
										<label>GST </label>
										<div class="controls">
											<input type="number" name="ServiceProvidergst" minlength="15" maxlength="15" class="form-control <?php echo (form_error('ServiceProvidergst') != "") ? 'is-invalid' : '' ?>" value="<?php $ServiceProvidergst = $edit != NULL ? $edit['ServiceProvidergst'] : '';
																																																								echo set_value('ServiceProvidergst', $ServiceProvidergst); ?>" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<label>PAN </label>
										<div class="controls">
											<input type="text" minlength="10" maxlength="10" name="ServiceProviderpan" class="form-control <?php echo (form_error('ServiceProviderpan') != "") ? 'is-invalid' : '' ?>" value="<?php $ServiceProviderpan = $edit != NULL ? $edit['ServiceProviderpan'] : '';
																																																								echo set_value('ServiceProviderpan', $ServiceProviderpan); ?>" aria-invalid="false" style="text-transform:uppercase;">
											<div class="help-block"></div>
										</div>
									</div>

									<div class="form-group">
										<label>Logo <span class="text-danger">*</span></label>
										<div class="controls">
											<input type="file" name="image" class="form-control <?php echo (!empty($errorImageUpload)) ? 'is-invalid' : '' ?>">
											<?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>
											<?php echo $edit != NULL ? '<img src="' . base_url() . 'uploads/serviceprovider/thumb/' . $edit['Providerlogo'] . ' " alt="">' : ''; ?>
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
								</div>
								<div class="col-sm-12 col-md-3 col-lg-3 offset-md-1">
									<div class="form-group">
										<h5>Host Name</h5>
										<div class="controls">
											<input type="text" id="host_name" name="host_name" value="<?php $host_name = $edit != NULL ? $edit['host_name'] : '';
																										echo set_value('host_name', $host_name); ?>" class="form-control <?php echo (form_error('host_name')) ? 'is-invalid' : '' ?>" minlength="2" maxlength="10" value="PUR">
											<?php echo form_error('host_name') ?>
										</div>
									</div>
									<div class="form-group">
										<h5>Port Name</h5>
										<div class="controls">
											<input id="port_name" name="port_name" type="text" value="<?php $port_name = $edit != NULL ? $edit['port_name'] : '';
																										echo set_value('port_name', $port_name); ?>" class="form-control <?php echo (form_error('port_name')) ? 'is-invalid' : '' ?>" minlength="4" maxlength="4" value="PRC">
											<?php echo form_error('port_name') ?>
										</div>
									</div>
									<div class="form-group">
										<h5>Port Value</h5>
										<div class="controls">
											<input id="port_value" name="port_value" type="int" value="<?php $port_value = $edit != NULL ? $edit['port_value'] : '';
																										echo set_value('port_value', $port_value); ?>" class="form-control <?php echo (form_error('port_value')) ? 'is-invalid' : '' ?>" minlength="3" maxlength="3" value="PRC">
											<?php echo form_error('port_value') ?>
										</div>
									</div>
									<div class="form-group">
										<h5>User Name</h5>
										<div class="controls">
											<input id="user_name" name="user_name" value="<?php $user_name = $edit != NULL ? $edit['user_name'] : '';
																							echo set_value('user_name', $user_name); ?>" type=" text" class="form-control <?php echo (form_error('user_name')) ? 'is-invalid' : '' ?>" minlength="2" maxlength="50" value="FIN">
											<?php echo form_error('user_name') ?>
										</div>
									</div>
									<div class="form-group">
										<h5>Password</h5>
										<input id="password" name="password" type="text" value="<?php $password = $edit != NULL ? $edit['password'] : '';
																								echo set_value('password', $password); ?>" class="form-control <?php echo (form_error('password')) ? 'is-invalid' : '' ?>">
										<?php echo form_error('password') ?>
									</div>
									<button type="submit" class="btn btn-success">Save</button>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">List of Service Providers</h4>
							<div class="table-responsive m-t-40">
								<table id="config-table" class="table display table-bordered table-striped no-wrap">
									<thead>
										<tr>
											<th>Logo</th>
											<th>Name</th>
											<th>Email</th>
											<th>Phone No.</th>
											<th>GST</th>
											<th>PAN</th>
											<th>Address</th>
											<th class="text-center">Status</th>

										</tr>
									</thead>
									<tbody>
										<?php if (!empty($serviceproviders)) { ?>
											<?php foreach ($serviceproviders as $serviceprovider) { ?>
												<tr>
													<td><img src="<?php echo base_url() . 'uploads/serviceprovider/thumb/' . $serviceprovider['Providerlogo']; ?>" alt=""></td>
													<td><?php echo  $serviceprovider['ServiceProvidername']; ?> <br>
														<a href="<?php echo base_url() . 'super/serviceprovider/edit/' . $serviceprovider['id']; ?>" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-edit"></i></a>
														<a href="javascript::void(0)" onclick="deleteserviceprovider(<?php echo $serviceprovider['id']; ?>);" class="jsgrid-button jsgrid-delete-button"><i class="fas fa-trash-alt"></i></a>
													</td>
													<td><?php echo  $serviceprovider['ServiceProvideremail']; ?></td>
													<td><?php echo  $serviceprovider['ServiceProviderphonenumber']; ?></td>
													<td><?php echo  $serviceprovider['ServiceProvidergst']; ?></td>
													<td><?php echo  $serviceprovider['ServiceProviderpan']; ?></td>
													<td><?php echo  $serviceprovider['ServiceProvideraddress']; ?></td>
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
		function deleteserviceprovider(id) {
			if (confirm("Are you sure to delete Service Provider ?")) {
				window.location.href = '<?php echo base_url() . 'super/serviceprovider/delete/'; ?>' + id;

			}

		}
	</script>

</body>

</html>
