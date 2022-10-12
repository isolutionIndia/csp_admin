<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('header'); ?>
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
				<h4 class="text-themecolor">Settings</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Settings</li>
					</ol>
				</div>
			</div>
			<?php if ($this->session->flashdata('success') != "") { ?>
				<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
			<?php } ?>
			<?php if ($this->session->flashdata('error') != "") { ?>
				<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
			<?php } ?>
		</div>
		<!-- ============================================================== -->
		<!-- End Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<form novalidate="" name='organisationform' id='organisationform' action="<?php echo base_url() . 'super/settings/organisationedit/' . $organisation['id']; ?>" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-4">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title m-b-30">Organization Details</h4>
							<div class="form-group">
								<h5>Organization Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input id="company_name" name="company_name" type="text" value="<?php echo set_value('company_name', $organisation['company_name']) ?>" class="form-control <?php echo (form_error('company_name')) ? 'is-invalid' : '' ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
									<?php echo form_error('company_name') ?>
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<h5>Email ID <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" id="company_email" name="company_email" value="<?php echo set_value('company_email', $organisation['company_email']) ?>" class="email-inputmask form-control <?php echo (form_error('company_email')) ? 'is-invalid' : '' ?>" id="email-mask" required="" data-validation-required-message="This is required" aria-invalid="false">
									<?php echo form_error('company_email') ?>
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<h5>Contact Number <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="number" id="company_phone" name="company_phone" minlength="10" maxlength="10" value="<?php echo set_value('company_phone', $organisation['company_phone']) ?>" class="form-control <?php echo (form_error('company_phone')) ? 'is-invalid' : '' ?>" placeholder="10 digit mobile No." required="" data-validation-required-message="This is required" aria-invalid="false">
									<?php echo form_error('company_phone') ?>
									<div class="help-block"></div>
								</div>
							</div>
							<!-- <div class="form-group">
								<h5>Website URL</h5>
								<div class="controls">
									<input type="text" name="website" class="form-control" placeholder="http://" data-validation-regex-regex="((http[s]?|ftp[s]?):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*" data-validation-regex-message="Only Valid URL's" aria-invalid="false">
									<div class="help-block"></div>
								</div>
							</div> -->

							<div class="form-group">
								<h5>GST Number</h5>
								<div class="controls">
									<input type="text" id="company_gstno" name="company_gstno" minlength="15" maxlength="15" value="<?php echo set_value('company_gstno', $organisation['company_gstno']) ?>" class="form-control <?php echo (form_error('company_gstno')) ? 'is-invalid' : '' ?>" required="" aria-invalid="false">
									<?php echo form_error('company_gstno') ?>
								</div>
							</div>

							<div class="form-group">
								<h5>Country <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="country_code" id="country_code" class="form-control <?php echo (form_error('country_code')) ? 'is-invalid' : '' ?>" required="" class="form-control" aria-invalid="false">
										<?php if (!empty($country)) {
											foreach ($country as $countries) {
												$selected = ($organisation['country_code'] == $countries['country_code']) ? true : false;
										?>

												<option <?php echo set_select('country_code', $countries['country_code'], $selected); ?> value="<?php echo $countries['country_code']; ?>"><?php echo $countries['country_name']; ?></option>
										<?php }
										} ?>
									</select>
									<?php echo form_error('country_code') ?>
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<h5>State <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="state" id="state" required="" class="form-control" aria-invalid="false">
										<option value="">--Select--</option>
										<option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
										<option value="ASSAM">ASSAM</option>
										<option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
										<option value="GUJRAT">GUJRAT</option>
										<option value="BIHAR">BIHAR</option>
										<option value="HARYANA">HARYANA</option>
										<option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
										<option value="JAMMU &amp; KASHMIR">JAMMU &amp; KASHMIR</option>
										<option value="KARNATAKA">KARNATAKA</option>
										<option value="KERALA">KERALA</option>
										<option value="MADHYA PRADESH">MADHYA PRADESH</option>
										<option value="MAHARASHTRA">MAHARASHTRA</option>
										<option value="MANIPUR">MANIPUR</option>
										<option value="MEGHALAYA">MEGHALAYA</option>
										<option value="MIZORAM">MIZORAM</option>
										<option value="NAGALAND">NAGALAND</option>
										<option value="ODISHA" selected="selected">ODISHA</option>
										<option value="PUNJAB">PUNJAB</option>
										<option value="RAJASTHAN">RAJASTHAN</option>
										<option value="SIKKIM">SIKKIM</option>
										<option value="TAMIL NADU">TAMIL NADU</option>
										<option value="TRIPURA">TRIPURA</option>
										<option value="UTTAR PRADESH">UTTAR PRADESH</option>
										<option value="WEST BENGAL">WEST BENGAL</option>
										<option value="DELHI">DELHI</option>
										<option value="GOA">GOA</option>
										<option value="PONDICHERY">PONDICHERY</option>
										<option value="LAKSHDWEEP">LAKSHDWEEP</option>
										<option value="DAMAN &amp; DIU">DAMAN &amp; DIU</option>
										<option value="DADRA &amp; NAGAR">DADRA &amp; NAGAR</option>
										<option value="CHANDIGARH">CHANDIGARH</option>
										<option value="ANDAMAN &amp; NICOBAR">ANDAMAN &amp; NICOBAR</option>
										<option value="UTTARANCHAL">UTTARANCHAL</option>
										<option value="JHARKHAND">JHARKHAND</option>
										<option value="CHATTISGARH">CHATTISGARH</option>
									</select>
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<h5>Address</h5>
								<div class="controls">
									<input type="text" id="company_address" name="company_address" value="<?php echo set_value('company_address', $organisation['company_address']) ?>" class="form-control <?php echo (form_error('company_address')) ? 'is-invalid' : '' ?>" required="" aria-invalid="false">
									<?php echo form_error('company_address') ?>
								</div>
							</div>
							<!-- <div class="form-group">
								<h5>Pincode</h5>
								<div class="controls">
									<input type="tel" name="pincode" minlength="6" maxlength="6" class="form-control" required="" aria-invalid="false">
								</div>
							</div> -->
							<button type="submit" class="btn btn-success">Save</button>
						</div>
					</div>

				</div>
				<div class="col-sm-12 col-md-6 col-lg-4">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title m-b-30">Manage Logos</h4>

							<div class="form-group">
								<h5>Login Logo <span class="text-danger">*</span></h5>
								<div class="controls">
									<!-- <input type="file" name="logo-dark" class="form-control" required=""> -->
									<small id="emailHelp" class="form-text text-muted">Ideal size must be 108px X 21px
									</small>
									<?php if ($organisation['image'] != ""  && file_exists('./uploads/organisation/thumb_admin/' . $organisation['image']) && file_exists('./uploads/organisation/thumb_front/' . $organisation['image'])) { ?>
										<img style="width: 100px;" src="<?php echo base_url() . 'uploads/organisation/thumb_front/' . $organisation['image']; ?>" alt="">

									<?php } else { ?>
										<img src="<?php echo base_url() . 'uploads/organisation/thumb_front/noImg.png' ?>" alt="">
									<?php } ?>
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<h5>Dashboard Logo <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="image" id="image" class="form-control <?php echo (!empty($errorImageUpload)) ? 'is-invalid' : '' ?>" required="">
									<small id="emailHelp" class="form-text text-muted">Ideal size must be 108px X 21px
									</small>
									<?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>

									<?php if ($organisation['image'] != ""  && file_exists('./uploads/organisation/thumb_admin/' . $organisation['image']) && file_exists('./uploads/organisation/thumb_front/' . $organisation['image'])) { ?>
										<img style="width: 100px;" src="<?php echo base_url() . 'uploads/organisation/thumb_admin/' . $organisation['image']; ?>" alt="">

									<?php } else { ?>
										<img src="<?php echo base_url() . 'uploads/organisation/thumb_admin/noImg.png' ?>" alt="">
									<?php } ?>
									<div class="help-block"></div>
								</div>
							</div>
							<div class="form-group">
								<h5>Fav Icon <span class="text-danger">*</span></h5>
								<div class="controls">
									<!-- <input type="file" name="fav-icon" class="form-control" required=""> -->
									<small id="emailHelp" class="form-text text-muted">Ideal size must be 40px X 40px
									</small>
									<?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>

									<?php if ($organisation['image'] != ""  && file_exists('./uploads/organisation/thumb_admin/' . $organisation['image']) && file_exists('./uploads/organisation/thumb_front/' . $organisation['image'])) { ?>
										<img style="width: 100px;" src="<?php echo base_url() . 'uploads/organisation/thumb_admin/' . $organisation['image']; ?>" alt="">

									<?php } else { ?>
										<img src="<?php echo base_url() . 'uploads/organisation/thumb_admin/noImg.png' ?>" alt="">
									<?php } ?>
									<div class="help-block"></div>
								</div>
							</div>
							<button type="submit" class="btn btn-success">Save</button>

						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-4">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title m-b-30">Mail Settings</h4>
							<div class="form-group">
								<h5>Host Name</h5>
								<div class="controls">
									<input type="text" id="host_name" name="host_name" value="<?php echo set_value('host_name', $organisation['host_name']) ?>" class="form-control <?php echo (form_error('host_name')) ? 'is-invalid' : '' ?>" minlength="2" maxlength="10" value="PUR">
									<?php echo form_error('host_name') ?>
								</div>
							</div>
							<div class="form-group">
								<h5>Port Name</h5>
								<div class="controls">
									<input id="port_name" name="port_name" type="text" value="<?php echo set_value('port_name', $organisation['port_name']) ?>" class="form-control <?php echo (form_error('port_name')) ? 'is-invalid' : '' ?>" minlength="2" maxlength="10" value="PRC">
									<?php echo form_error('port_name') ?>
								</div>
							</div>
							<div class="form-group">
								<h5>User Name</h5>
								<div class="controls">
									<input id="user_name" name="user_name" value="<?php echo set_value('user_name', $organisation['user_name']) ?> " type="text" class="form-control <?php echo (form_error('user_name')) ? 'is-invalid' : '' ?>" minlength="2" maxlength="10" value="FIN">
									<?php echo form_error('user_name') ?>
								</div>
							</div>
							<div class="form-group">
								<h5>Currency</h5>
								<input id="company_currency" name="company_currency" type="text" value="<?php echo set_value('company_currency', $organisation['company_currency']) ?>" class="form-control <?php echo (form_error('company_currency')) ? 'is-invalid' : '' ?>">
								<?php echo form_error('company_currency') ?>
								<button type="submit" class="btn btn-success">Save</button>
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
	<script src="<?php echo base_url(); ?>/public/assets/node_modules/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>/public/dist/js/pages/mask.init.js"></script>
	<script src="<?php echo base_url(); ?>/public/dist/js/pages/validation.js"></script>
	<script>
		! function(window, document, $) {
			"use strict";
			$("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
		}(window, document, jQuery);
	</script>

</body>

</html>
