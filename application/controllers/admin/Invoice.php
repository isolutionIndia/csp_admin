<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!'0' == $this->session->userdata('role')) {
			redirect('super/dashboard');
		}
	}
	public function index()
	{
		$this->load->model('Invoice_model');
		$this->load->model('Applicant_model');
		$data['invoices'] = $this->Invoice_model->invoices();
		$data['users'] = $this->Applicant_model->users();
		$data['edit'] = '';
		if ($this->input->post()) {

			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
			$this->form_validation->set_rules('user', 'Applicant Name', 'required');
			$this->form_validation->set_rules('date', 'Date', 'required');
			$this->form_validation->set_rules('amount', 'Amount', 'required');
			$this->form_validation->set_rules('invoicefor', 'Invoice For', 'required');

			if ($this->form_validation->run() == TRUE) {
				//$recentdata = $this->input->post();
				$formarray = ['user' => $this->input->post('user'), 'date' => $this->input->post('date'), 'amount' => $this->input->post('amount'), 'invoicefor' => $this->input->post('invoicefor'), 'status' => $this->input->post('status')];
				$id = $this->input->post('id');
				if ($id != NULL) {
					//print_r($formarray);
					//echo ($id);
					$this->Invoice_model->update($formarray, $id);
				} else {
					$this->Invoice_model->create($formarray);
				}

				redirect(base_url() . 'super/invoice');
			} else {
				$this->load->view('invoice', $data);
			}
		} else {
			$this->load->view('invoice', $data);
		}
	}

	public function edit($edit)
	{

		if ($edit != NULL) {
			$this->load->model('Invoice_model');
			$this->load->model('Applicant_model');
			$invoice = $this->Invoice_model->getInvoice($edit);
			$data['users'] = $this->Applicant_model->users();
			$data['invoices'] = $this->Invoice_model->invoices();
			$data['edit'] = $invoice;
			if (empty($invoice)) {
				$this->session->set_flashdata('error', 'Invoice not found');

				redirect(base_url() . 'super/invoice');
			} else {
				$this->load->view('invoice', $data);
			}
		} else {
			$this->session->set_flashdata('error', 'invoice not found');

			redirect(base_url() . 'super/invoice');
		}

		if ($this->input->post()) {
			$this->index();
		}
	}
	public function print($id, $uid)
	{

		if ($id != NULL) {
			$this->load->model('Invoice_model');
			$this->load->model('Applicant_model');
			$this->load->model('organisation_model');
			$this->load->model('Service_model');
			$data['service'] = $this->Service_model->detailservicesByproviderinUserid($uid);
			$invoice = $this->Invoice_model->getInvoice($id);
			$data['users'] = $this->Applicant_model->getUser($uid);
			$data['invoices'] = $invoice;
			$organisation = $this->organisation_model->getorganisation();
			$data['organisation'] = $organisation;
			if (empty($invoice)) {
				$this->session->set_flashdata('error', 'Invoice not found');

				redirect(base_url() . 'super/invoice');
			} else {
				$this->load->view('invoice_print', $data);
			}
		} else {
			$this->session->set_flashdata('error', 'invoice not found');

			redirect(base_url() . 'super/invoice');
		}
	}
	public function delete($id)
	{
		if ($id != NULL) {


			$this->load->model('Invoice_model');
			$invoice = $this->Invoice_model->getInvoice($id);

			if (empty($invoice)) {
				$this->session->set_flashdata('error', 'Service provider not found');

				redirect(base_url() . 'super/invoice');
			}

			$this->Invoice_model->delete($id);
			$this->session->set_flashdata('success', 'Invoice Deleted Successfuly');
			redirect(base_url() . 'super/invoice');
		} else {
			$this->session->set_flashdata('error', 'Service provider not found');

			redirect(base_url() . 'super/invoice');
		}
	}
}
