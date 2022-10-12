<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>

<?php if ($organisation['image'] != ""  && file_exists('./uploads/organisation/thumb_admin/' . $organisation['image']) && file_exists('./uploads/organisation/thumb_front/' . $organisation['image'])) { ?>
	<?php echo base_url() . 'uploads/organisation/thumb_admin/' . $organisation['image']; ?>

	<?php } else { ?>
		<?php echo base_url() . 'uploads/assets/images/background/super.jpg' ?>
		<?php } ?>">
	<title>ADMIN</title>

	<!-- page css -->
	<link href="<?php echo base_url(); ?>uploads/dist/css/pages/login-register-lock.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?php echo base_url(); ?>uploads/dist/css/style.min.css" rel="stylesheet">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
		<div class="loader">
			<div class="loader__figure"></div>
			<p class="loader__label">Admin</p>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<section id="wrapper" class="login-register login-sidebar" style="background-image:url(<?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>

<?php if ($organisation['image'] != ""  && file_exists('./uploads/organisation/thumb_admin/' . $organisation['image']) && file_exists('./uploads/organisation/thumb_front/' . $organisation['image'])) { ?>
	<?php echo base_url() . 'uploads/organisation/' . $organisation['image']; ?>

	<?php } else { ?>
		<?php echo base_url() . 'uploads/assets/images/background/super.jpg' ?>
		<?php } ?>);">
		<div class="login-box card">
			<div class="card-body">
				<form method="post" class="form-horizontal form-material text-center" id="loginform" action="<?php echo base_url(); ?>super/login/">
					<a href="javascript:void(0)" class="db"><img src="<?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>

<?php if ($organisation['image'] != ""  && file_exists('./uploads/organisation/thumb_admin/' . $organisation['image']) && file_exists('./uploads/organisation/thumb_front/' . $organisation['image'])) { ?>
	<?php echo base_url() . 'uploads/organisation/thumb_admin/' . $organisation['image']; ?>

	<?php } else { ?>
		<?php echo base_url() . 'uploads/assets/images/background/super.jpg' ?>
		<?php } ?>" alt="Home" />
						<br />
						<h2>ADMIN</h2>
					</a>
					<?php if ($this->session->flashdata('error')) { ?>
						<p style="color:red"><?php echo $this->session->flashdata('error'); ?></p>
					<?php } ?>
					<div class="form-group m-t-40">
						<div class="col-xs-12">
							<input class="form-control" type="text" required="" placeholder="Username" name="usrnme" value='<?php echo set_value('emailid'); ?>'>
							<?php echo form_error('usrnme', "<div style='color:red'>", "</div>"); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control" type="password" required="" placeholder="Password" name="psswd" value='<?php echo set_value('password'); ?>'>
							<?php echo form_error('psswd', "<div style='color:red'>", "</div>"); ?>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<div class="d-flex no-block align-items-center">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck1">
									<label class="custom-control-label" for="customCheck1">Remember me</label>
								</div>
								<div class="ml-auto">
									<a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> Forgot pwd?</a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group text-center m-t-20">
						<div class="col-xs-12">
							<button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Log
								In</button>
						</div>
					</div>
				</form>
				<form class="form-horizontal" id="recoverform" action="<?php echo base_url(); ?>super/login/">
					<div class="form-group ">
						<div class="col-xs-12">
							<h3>Recover Password</h3>
							<p class="text-muted">Enter your Email and instructions will be sent to you! </p>
						</div>
					</div>
					<div class="form-group ">
						<div class="col-xs-12">
							<input class="form-control" type="text" required="" placeholder="Email">
						</div>
					</div>
					<div class="form-group text-center m-t-20">
						<div class="col-xs-12">
							<button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- All Jquery -->
	<!-- ============================================================== -->
	<script src="<?php echo base_url(); ?>uploads/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
	<!-- Bootstrap tether Core JavaScript -->
	<script src="assets/node_modules/popper/popper.min.js"></script>
	<script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<!--Custom JavaScript -->
	<script type="text/javascript">
		$(function() {
			$(".preloader").fadeOut();
		});
		$(function() {
			$('[data-toggle="tooltip"]').tooltip()
		});
		// ============================================================== 
		// Login and Recover Password 
		// ============================================================== 
		$('#to-recover').on("click", function() {
			$("#loginform").slideUp();
			$("#recoverform").fadeIn();
		});
	</script>

</body>

</html>
