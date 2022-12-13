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
				<h3 class="text-themecolor">Approval</h3>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

						<li class="breadcrumb-item active">Approvals</li>
					</ol>
				</div>
			</div>

			<!-- <?php // print_r($organisation)
					?>
			<br>
			<?php // print_r($users)
			?>
			<br>
			<?php //print_r($service)
			?>
			<br>
			<?php //print_r($applications)
			?>
			<br>
				<?php //print_r($serviceprovider)
				?>
			<br> -->

		</div>
		<!-- ============================================================== -->
		<!-- End Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<?php //print_r();
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-body printableArea " style="background-color:#fef7e5 !important;">

					<div class="row p-5">
						<div class="col-sm-12">
							<span class="pull-left">
								<img src="<?php echo base_url() . 'uploads/'; ?>approvalleter/a.jpg" class="img-fluid" alt="...">
							</span>
							<span class="float-right">
								<?php if ($organisation['image'] != ""  && file_exists('./uploads/serviceprovider/thumb/' . $serviceprovider['Providerlogo'])) { ?>
									<img style="width:150px;" src="<?php echo base_url() . 'uploads/serviceprovider/' . $serviceprovider['Providerlogo']; ?>" alt="">

								<?php } else { ?>
									<img style="width:150px;" src="<?php echo base_url() . 'uploads/organisation/thumb_front/noImg.png' ?>" alt="">
								<?php } ?>
							</span>

						</div>
						<div class="col-sm-12 text-center">
							<img src="<?php echo base_url() . 'uploads/'; ?>approvalleter/b.jpg" class="img-fluid" alt="...">
						</div>
						<div class="col-sm-12 text-center">
							<h3 style="padding:10px;"> This is to certify that <strong> <?php echo $users['username']; ?></strong> has successfully completed the document verification for further steps. </h4>
								<h3 style="padding:10px;">REGISTRATION NO.<strong> <?php echo $applications['applicationno']; ?> </strong></h4>
									<h3>Approved Bank: <strong><?php echo $service['service']; ?> </strong></h3>
						</div>
						<div class="col-sm-12 text-center">
							<img src="<?php echo base_url() . 'uploads/'; ?>approvalleter/c.jpg" class="img-fluid" alt="...">
						</div>
						<hr>

					</div>
				</div>
			</div>
			<div class="text-center">

				<button id="print" class="btn btn-lg btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
			</div>
		</div>
	</div>
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
	<script src="<?php echo base_url() . 'uploads/'; ?>dist/js/pages/jquery.PrintArea.js" type="text/JavaScript"></script>
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
		function deleteapproval(id) {
			if (confirm("Are you sure to delete Approval ?")) {
				window.location.href = '<?php echo base_url() . 'super/approval/delete/'; ?>' + id;

			}

		}
	</script>
	<script>
		$(document).ready(function() {
			$("#print").click(function() {
				var mode = 'iframe'; //popup
				var close = mode == "popup";
				var options = {
					mode: mode,
					popClose: close
				};
				$("div.printableArea").printArea(options);
			});
		});
	</script>

</body>

</html>
