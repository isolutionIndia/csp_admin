<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('header'); ?>
	<!-- This page CSS -->
	<!-- chartist CSS -->
	<link href="<?php echo base_url(); ?>uploads/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
	<!-- Vector CSS -->
	<link href="<?php echo base_url(); ?>uploads/assets/node_modules/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<!--c3 CSS -->
	<link href="<?php echo base_url(); ?>uploads/dist/css/pages/easy-pie-chart.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?php echo base_url(); ?>uploads/dist/css/style.min.css" rel="stylesheet">
	<!-- Dashboard 1 Page CSS -->
	<link href="<?php echo base_url(); ?>uploads/dist/css/pages/dashboard2.css" rel="stylesheet">
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
				<h4 class="text-themecolor">Dashboard</h4>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Info Box -->
		<!-- ============================================================== -->
		<div class="row">
			<!-- Column -->
			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Site A Traffic</h5>
						<div class="stats-row m-t-20 m-b-20">
							<div class="stat-item">
								<h6>Growth</h6> <b>80.40%</b>
							</div>
							<div class="stat-item">
								<h6>Montly</h6> <b>20.40%</b>
							</div>
							<div class="stat-item">
								<h6>Daily</h6> <b>5.40%</b>
							</div>
						</div>
					</div>
					<div id="sparkline8" class="sparkchart"><canvas width="406" height="50" style="display: inline-block; width: 406.984px; height: 50px; vertical-align: top;"></canvas>
					</div>
				</div>
			</div>
			<!-- Column -->
			<!-- Column -->
			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Site B Traffic</h5>
						<div class="stats-row m-t-20 m-b-20">
							<div class="stat-item">
								<h6>Growth</h6> <b>80.40%</b>
							</div>
							<div class="stat-item">
								<h6>Montly</h6> <b>20.40%</b>
							</div>
							<div class="stat-item">
								<h6>Daily</h6> <b>5.40%</b>
							</div>
						</div>
					</div>
					<div id="sparkline9" class="sparkchart"><canvas width="406" height="50" style="display: inline-block; width: 406.984px; height: 50px; vertical-align: top;"></canvas>
					</div>
				</div>
			</div>
			<!-- Column -->
			<!-- Column -->
			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Site C Traffic</h5>
						<div class="stats-row m-t-20 m-b-20">
							<div class="stat-item">
								<h6>Growth</h6> <b>80.40%</b>
							</div>
							<div class="stat-item">
								<h6>Montly</h6> <b>20.40%</b>
							</div>
							<div class="stat-item">
								<h6>Daily</h6> <b>5.40%</b>
							</div>
						</div>
					</div>
					<div id="sparkline10" class="sparkchart"><canvas width="406" height="50" style="display: inline-block; width: 406.984px; height: 50px; vertical-align: top;"></canvas>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
		<!-- ============================================================== -->
		<!-- End Info Box Content -->
		<!-- ============================================================== -->
		<!-- Map Chart and browser state-->
		<!-- ============================================================== -->
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-8">
								<h5 class="card-title">SITES VISITS</h5>
								<div id="visitfromworld" style="width:100%!important; height:415px"></div>
							</div>
							<div class="col-md-4">
								<ul class="country-state slimscrollcountry">
									<li>
										<h2>6350</h2> <small>From India</small>
										<div class="pull-right">48% <i class="fa fa-level-up text-success"></i>
										</div>
										<div class="progress">
											<div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%; height: 6px;">
												<span class="sr-only">48%
													Complete</span>
											</div>
										</div>
									</li>
									<li>
										<h2>3250</h2> <small>From UAE</small>
										<div class="pull-right">98% <i class="fa fa-level-up text-success"></i>
										</div>
										<div class="progress">
											<div class="progress-bar bg-dark" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:98%; height: 6px;">
												<span class="sr-only">98%
													Complete</span>
											</div>
										</div>
									</li>
									<li>
										<h2>1250</h2> <small>From Australia</small>
										<div class="pull-right">75% <i class="fa fa-level-down text-danger"></i>
										</div>
										<div class="progress">
											<div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:75%; height: 6px;">
												<span class="sr-only">75%
													Complete</span>
											</div>
										</div>
									</li>
									<li>
										<h2>1350</h2> <small>From USA</small>
										<div class="pull-right">48% <i class="fa fa-level-up text-success"></i>
										</div>
										<div class="progress">
											<div class="progress-bar bg-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%; height: 6px;">
												<span class="sr-only">48%
													Complete</span>
											</div>
										</div>
									</li>
									<li>
										<h2>350</h2> <small>From UK</small>
										<div class="pull-right">68% <i class="fa fa-level-down text-danger"></i>
										</div>
										<div class="progress">
											<div class="progress-bar bg-purple" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:68%; height: 6px;">
												<span class="sr-only">48%
													Complete</span>
											</div>
										</div>
									</li>
								</ul>
								<div class="row">
									<div class="col-md-4 col-sm-4 col-xs-12 m-t-20 text-center">
										<div class="chart easy-pie-chart-2" data-percent="75"> <span class="percent">75</span>
											<br />
											<h4>New Users Visits</h4>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12 m-t-20 text-center">
										<div class="chart easy-pie-chart-1" data-percent="65"> <span class="percent">75</span>
											<br />
											<h4>Returning Users</h4>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12 m-t-20 text-center">
										<div class="chart easy-pie-chart-3" data-percent="25"> <span class="percent">75</span>
											<br />
											<h4>Bounce Rate</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
		<!-- ============================================================== -->
		<!-- End Sales Chart -->
		<!-- ============================================================== -->
		<?php //include_once('sidebar.php'); 
		?>
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->

	<?php $this->load->view('footer'); ?>
	<!-- Flot Charts JavaScript -->
	<script src="<?php echo base_url(); ?>uploads/assets/node_modules/flot/jquery.flot.js"></script>
	<script src="<?php echo base_url(); ?>uploads/assets/node_modules/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
	<!--sparkline JavaScript -->
	<script src="<?php echo base_url(); ?>uploads/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
	<!-- EASY PIE CHART JS -->
	<script src="<?php echo base_url(); ?>uploads/assets/node_modules/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
	<script src="<?php echo base_url(); ?>uploads/assets/node_modules/jquery.easy-pie-chart/easy-pie-chart.init.js"></script>
	<!-- Vector map JavaScript -->
	<script src="<?php echo base_url(); ?>uploads/assets/node_modules/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="<?php echo base_url(); ?>uploads/assets/node_modules/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- Chart JS -->
	<script src="<?php echo base_url(); ?>uploads/dist/js/dashboard2.js"></script>
</body>





</html>
