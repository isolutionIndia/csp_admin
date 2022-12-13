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
<div id="main-wrapper">
	<!-- ============================================================== -->
	<!-- Topbar header - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<header class="topbar">
		<nav class="navbar top-navbar navbar-expand-md navbar-dark">
			<!-- ============================================================== -->
			<!-- Logo -->
			<!-- ============================================================== -->
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo base_url(); ?>super/dashboard">
					<!-- Logo icon --><b>
						<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
						<!-- Dark Logo icon -->
						<img src="<?php echo base_url(); ?>uploads/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
						<!-- Light Logo icon -->
						<img src="<?php echo base_url(); ?>uploads/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
					</b>
					<!--End Logo icon -->
					<!-- Logo text --><span class="hidden-sm-down">
						<!-- dark Logo text -->
						<img src="<?php echo base_url(); ?>uploads/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
						<!-- Light Logo text -->
						<img src="<?php echo base_url(); ?>uploads/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
					</span>
				</a>
			</div>
			<!-- ============================================================== -->
			<!-- End Logo -->
			<!-- ============================================================== -->
			<div class="navbar-collapse">
				<!-- ============================================================== -->
				<!-- toggle and nav items -->
				<!-- ============================================================== -->
				<ul class="navbar-nav mr-auto">
					<!-- This is  -->
					<li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
					<li class="nav-item"> <a class="nav-link sidebartoggler d-none waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
					<!-- ============================================================== -->
					<!-- Search -->
					<!-- ============================================================== -->
					<li class="nav-item">
						<form class="app-search d-none d-md-block d-lg-block">
							<input type="text" class="form-control" placeholder="Search & enter">
						</form>
					</li>
				</ul>
				<!-- ============================================================== -->
				<!-- User profile and search -->
				<!-- ============================================================== -->
				<ul class="navbar-nav my-lg-0">


					<!-- ============================================================== -->
					<!-- User Profile -->
					<!-- ============================================================== -->
					<li class="nav-item dropdown u-pro">
						<a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>uploads/assets/images/users/1.jpg" alt="user" class=""> <span class="hidden-md-down"><?php echo $this->session->userdata('name'); ?>
								&nbsp;<i class="fa fa-angle-down"></i></span> </a>
						<div class="dropdown-menu dropdown-menu-right animated flipInY">
							<!-- text-->
							<a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My
								Profile</a>
							<!-- text-->
							<a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account
								Setting</a>
							<!-- text-->
							<div class="dropdown-divider"></div>
							<!-- text-->
							<a href="<?php echo base_url(); ?>super/dashboard/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
							<!-- text-->
						</div>
					</li>
					<!-- ============================================================== -->
					<!-- End User Profile -->
					<!-- ============================================================== -->
				</ul>
			</div>
		</nav>
	</header>
	<!-- ============================================================== -->
	<!-- End Topbar header -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Left Sidebar - style you can find in sidebar.scss  -->
	<!-- ============================================================== -->
	<aside class="left-sidebar">
		<!-- Sidebar scroll-->
		<div class="scroll-sidebar">
			<!-- Sidebar navigation-->
			<nav class="sidebar-nav">
				<ul id="sidebarnav">
					<li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="<?php echo base_url(); ?>uploads/assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu">Mark Jeckson</span></a>
						<ul aria-expanded="false" class="collapse">
							<li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
							<li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
							<li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
						</ul>
					</li>
					<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard
								<span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
						<ul aria-expanded="false" class="collapse">
							<li><a href="<?php echo base_url(); ?>super/dashboard">Overview </a></li>

						</ul>
					</li>
					
					<!-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Approval Letters</span></a>
						<ul aria-expanded="false" class="collapse">
							<li><a href="#">All Approval Letters</a></li>
							<li><a href="#">Add Approval Letter</a></li>
						</ul>
					</li> -->
					<li> <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>super/applicant" ><i class="ti-layout-grid2"></i><span class="hide-menu">Enquiries</span></a></li>
					<li> <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>super/application" ><i class="ti-layout-grid2"></i><span class="hide-menu">Applications</span></a></li>
					
					<li> <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>super/invoice" ><i class="ti-layout-grid2"></i><span class="hide-menu">Invoices</span></a></li>
					<?php if ('0' == $this->session->userdata('status')||'1' == $this->session->userdata('status')) {  ?>
					
					<li> <a class="waves-effect waves-dark" href="<?php echo base_url(); ?>super/employee" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Employees</span></a></li>
					
					<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Setup</span></a>
						<ul aria-expanded="false" class="collapse">
							<?php if ('0' == $this->session->userdata('status')) {  ?>
							<li><a href="<?php echo base_url(); ?>super/settings/organisation">Settings</a></li>
							 <?php } ?>
							<li><a href="<?php echo base_url(); ?>super/serviceprovider">Service Providers</a></li>
                            <li><a href="<?php echo base_url(); ?>super/service">Services</a></li>
							<li><a href="<?php echo base_url(); ?>super/bankaccount">Bank Accounts</a></li>
							<?php if ('0' == $this->session->userdata('status')) {  ?>
							<li><a href="<?php echo base_url(); ?>super/user">User</a></li>
							 <?php } ?>
						</ul>
					</li>
            <?php } ?>
				</ul>
			</nav>
			<!-- End Sidebar navigation -->
		</div>
		<!-- End Sidebar scroll-->
	</aside>
	<!-- ============================================================== -->
	<!-- End Left Sidebar - style you can find in sidebar.scss  -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Page wrapper  -->
	<!-- ============================================================== -->
	<div class="page-wrapper">
		<?php if ($this->session->flashdata('success') != "") { ?>
			<div class="alert alert-success " id=""><?php echo $this->session->flashdata('success') ?></div>

		<?php } ?>
		<?php if ($this->session->flashdata('error') != "") { ?>
			<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
		<?php } ?>
