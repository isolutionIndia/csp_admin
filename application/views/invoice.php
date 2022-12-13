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
				<h3 class="text-themecolor">Manage Invoices</h3>
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
		<?php //print_r($edit); 
		?>
		<form novalidate="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" class="form-control <?php echo (form_error('id') != "") ? 'is-invalid' : '' ?>" value="<?php echo  $edit != NULL ? $edit['id'] : ''; ?>">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12  bt-switch">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title m-b-30">Add Invoice</h4>
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-4  bt-switch">
									<div class="form-group">
										<h5>Applicant<span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="user" id="user" onchange='bank(this.value)' onload='bank(this.value)' class="form-control <?php echo (form_error('user')) ? 'is-invalid' : '' ?>" required="" class="form-control" aria-invalid="false">
												<option value="">Select Applicant</option>
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
										<label>Invoice Date <span class="text-danger">*</span></label>
										<div class="controls">
											<input type="datetime-local" id="date" name="date" class="form-control <?php echo (form_error('date') != "") ? 'is-invalid' : '' ?>" value="<?php $date = $edit != NULL ? $edit['date'] : '';
																																														echo set_value('date', $date) ?>" required="" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<label>Invoice For<span class="text-danger">*</span></label>
										<div class="controls">
											<input type="text" id="invoicefor" name="invoicefor" class="form-control <?php echo (form_error('invoicefor') != "") ? 'is-invalid' : '' ?>" value="<?php $invoicefor = $edit != NULL ? $edit['invoicefor'] : '';
																																																echo set_value('invoicefor', $invoicefor) ?>" placeholder="invoicefor." required="" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-4  bt-switch">
									<div class="form-group">
										<label>Amount<span class="text-danger">*</span></label>
										<div class="controls">
											<input type="number" id="amount" name="amount" class="form-control <?php echo (form_error('amount') != "") ? 'is-invalid' : '' ?>" value="<?php $amount = $edit != NULL ? $edit['amount'] : '';
																																														echo set_value('amount', $amount) ?>" placeholder="amount." required="" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<label>Quantity<span class="text-danger">*</span></label>
										<div class="controls">
											<input type="number" id="quantity" name="quantity" class="form-control <?php echo (form_error('quantity') != "") ? 'is-invalid' : '' ?>" value="<?php $quantity = $edit != NULL ? $edit['quantity'] : '';
																																															echo set_value('quantity', $quantity) ?>" placeholder="quantity." required="" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<label>GST<span class="text-danger">*</span></label>
										<div class="controls">
											<input type="number" id="gst" name="gst" class="form-control <?php echo (form_error('gst') != "") ? 'is-invalid' : '' ?>" value="<?php $gst = $edit != NULL ? $edit['gst'] : '';
																																												echo set_value('gst', $gst) ?>" placeholder="gst." required="" data-validation-required-message="This is required" aria-invalid="false">
											<div class="help-block"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-12 col-lg-4  bt-switch">
									<div class="form-group">
										<h5>Bank Account<span class="text-danger">*</span></h5>
										<div class="controls">
											<select name="bankaccount" id="bankaccount" required="" class="form-control" aria-invalid="false">
												<option value=""><?php echo 'Select'; ?>
												</option>
											</select>

											<div class="help-block"></div>
										</div>
									</div>
									<div class="form-group">
										<label>Payment Status</label>
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" <?php echo $edit != NULL ? $edit['status'] == NULL ? '' :  'value="1" checked' : 'value="0" ';
																																	'';
																																	?>>
											<label class="custom-control-label" for="customSwitch1"></label>
										</div>
									</div>
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">List of Invoices</h4>
							<div class="table-responsive m-t-40">
								<table id="config-table" class="table display table-bordered table-striped no-wrap">
									<thead>
										<tr>

											<th>Invoice Number</th>
											<th>Applicant</th>
											<th>Invoice For</th>
											<th>Amount</th>
											<th>GST</th>
											<th>Quantity</th>
											<th>Date</th>
											<th class="text-center">Payment Status</th>

										</tr>
									</thead>
									<tbody>
										<?php if (!empty($invoices)) { ?>
											<?php foreach ($invoices as $invoice) { ?>
												<tr>

													<td><?php echo  'INVNO' . $invoice['id']; ?> <br>
														<a href="<?php echo base_url() . 'super/invoice/edit/' . $invoice['id']; ?>" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-edit"></i></a>
														<a href="javascript::void(0)" onclick="deleteinvoice(<?php echo $invoice['id']; ?>);" class="jsgrid-button jsgrid-delete-button"><i class="fas fa-trash-alt"></i></a>
													</td>

													<td><?php if (!empty($users)) {
															foreach ($users as $user) {
																if ($user['id'] ==  $invoice['user']) {
																	echo $user['username'];
																}
															}
														} ?></td>
													<td><?php echo  $invoice['invoicefor']; ?></td>
													<td><?php echo  $invoice['amount']; ?></td>
													<td><?php echo  $invoice['gst']; ?></td>
													<td><?php echo  $invoice['quantity']; ?></td>
													<td><?php echo date("m/d/Y", strtotime($invoice['date'])); ?></td>


													<td class="text-center"><span <?php echo $invoice['status'] ? 'class=" label label-success ">Paid ' :  'class=" label label-danger ">Unpaid'; ?></span> <a href="<?php echo base_url() . 'super/invoice/print/' . $invoice['id'] . "/" . $invoice['user']; ?>" class="button btn-primary btn-xs">print</a></td>

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
		function deleteinvoice(id) {
			if (confirm("Are you sure to delete Invoice ?")) {
				window.location.href = '<?php echo base_url() . 'super/invoice/delete/'; ?>' + id;

			}

		}
	</script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
	<script src="<?php echo base_url() . 'uploads/'; ?>dist/js/pages/jquery.PrintArea.js" type="text/JavaScript"></script>
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

<script>
	var serid;
	<?php if ($edit != NULL) {

		echo "bank(" . $edit['user'] . ");";
	} ?>

	function bank(id) {

		var div_databank = "";
		$.ajax({
			url: '<?php echo base_url(); ?>super/invoice/bankaccountByproviderinServiceid',
			type: "POST",
			data: {
				item: id
			},
			dataType: 'json',
			success: function(res) {
				$.each(res, function(i, obj) {
					var sel = "";
					var select = "";
					if (obj.id == <?php if ($edit != NULL) {
										echo $edit['bankaccount'];
									} else {
										echo ('serid');
									} ?>) {
						select = 'selected';
					}
					div_databank += "<option  value=" + obj.id + " " + select + ">" + obj.accountname + "</option>";

				});
				$("#bankaccount").html("<option value=''>Select</option>");
				$('#bankaccount').append(div_databank);


			}

		});
	}
</script>

</html>
