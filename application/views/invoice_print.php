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
				<h3 class="text-themecolor">Invoice</h3>
			</div>
			<div class="col-md-7 align-self-center text-right">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

						<li class="breadcrumb-item active">Invoices</li>
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
		<?php //print_r($users);
		?>
		<?php // print_r($invoices);
		?>
		<?php //print_r($organisation);
		?>
		<?php //print_r($bankaccount);
		?>
		<div class="row">

			<div class="col-sm-12">
				<div class="card card-body printableArea px-5">
					<div class="row">
						
					<div class="col pull-left">
						<h3><b>GST INVOICE</b> </h3>
						<h4><b> Invoice No.</b><span class="pull-right">#INVNO<?php echo $invoices['id']; ?></span></h4>
						<h4><b>Invoice Date :</b> <?php echo date( "m/d/Y", strtotime($invoices['date'])); ?></4>
					</div>
					
					

					<div class="col pull-right text-right">
							<span class="">
								<?php if ($organisation['image'] != ""  && file_exists('./uploads/serviceprovider/thumb_admin/' . $service[0]['Providerlogo']) && file_exists('./uploads/serviceprovider/thumb_front/' . $service[0]['Providerlogo'])) { ?>
									<img style="width:150px;" src="<?php echo base_url() . 'uploads/serviceprovider/thumb_admin/' . $service[0]['Providerlogo']; ?>" alt="">

								<?php } else { ?>
									<img style="width:150px;" src="<?php echo base_url() . 'uploads/organisation/thumb_front/noImg.png' ?>" alt="">
								<?php } ?>
							</span>
					</div>
								</div>
								<hr>
					<div class="row">
						<div class="col-sm-12">
						 <div class="row" style="font-size:1.2rem;">
								<div class="col pull-left mx-5">
									<address class="mx-5 bg-info text-light box" style="padding:20px;">
										<h3>From,</h3>
										<h3><b class="text-light"><?php echo $service[0]['ServiceProvidername']; ?></b></h3>
										<p class=" m-l-5">
											<br /><b>Address: </b><?php echo $service[0]['ServiceProvideraddress']; ?>,
											<br /><b>GST NO. </b><?php echo $service[0]['ServiceProvidergst']; ?>
											<br /><b>PAN NO. </b><?php echo $service[0]['ServiceProviderpan']; ?>
											<br><b>Phone No. </b><?php echo $service[0]['ServiceProviderphonenumber']; ?>
										</p>
									</address>
								</div>
								<div class="col pull-right ">
									<address class="mx-5 bg-info text-light box" style="padding:20px;">
										<h3>To,</h3>
										<h3><b class="text-light"><?php echo $users['username']; ?></b></h3>
										<p class=" m-l"><br>
											<b>Address: </b><?php echo $users['address']; ?>
											<br /><b>District. </b> <?php echo $users['district']; ?>
											<br /><b>State. </b> <?php echo $users['state']; ?>,
											<br /><b>Pincode. </b> <?php echo $users['pincode']; ?>
										</p>
										

									</address>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="table-responsive m-t-40" style="clear: both;">
								<table class="table table-info full-info-table">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th>Service Provider</th>
											<th class="text-right">Services</th>
											<th class="text-right">Quantity</th>
											<th class="text-right">invoicefor</th>
											<th class="text-right">GST %</th>
											<th class="text-right">Amount</th>
											<th class="text-right">Total Amount</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">1</td>
											<td><?php echo $service[0]['ServiceProvidername']; ?></td>
											<td class="text-right"><?php echo $service[0]['service']; ?></td>
											<td class="text-right"><?php echo $invoices['quantity']; ?></td>
											<td class="text-right"><?php echo $invoices['invoicefor']; ?></td>
											<td class="text-right"><?php echo $invoices['gst']; ?></td>
											<td class="text-right"><?php echo $organisation['company_currency']; ?> <?php echo $invoices['amount']; ?></td>
											<td class="text-right"><?php echo $organisation['company_currency']; ?> <?php echo ( (($invoices['quantity'] * $invoices['amount'])*($invoices['gst']/100))+$invoices['amount']); ?></td>
										</tr>

									</tbody>
								</table>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="pull-right m-t-30 mx-5 text-right">
								

								<hr>
								<h3><b>Total :</b> <?php echo $organisation['company_currency']; ?> <?php echo ( (($invoices['quantity'] * $invoices['amount'])*($invoices['gst']/100))+$invoices['amount']); ?></h3>
							</div>
							<div class="clearfix"></div>
							<hr>
							
						</div>
					</div>
				</div>
				<div class="text-right">

								<button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
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
		function deleteinvoice(id) {
			if (confirm("Are you sure to delete Invoice ?")) {
				window.location.href = '<?php echo base_url() . 'super/invoice/delete/'; ?>' + id;

			}

		}
	</script>
	<script>
		$(document).ready(function() {
			$("#print").click(function() {
				var mode = 'iframe'; //popup
				var close = mode == "blank";
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
