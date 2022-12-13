<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bankaccount extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!'admin' == $this->session->userdata('role')) {
			redirect('super/dashboard');
		}
	}
	public function index()
	{
		$this->load->model('Bankaccount_model');
		$this->load->model('Serviceprovider_model');
		$data['bankaccounts'] = $this->Bankaccount_model->bankaccounts();
		$data['serviceproviders'] = $this->Serviceprovider_model->serviceproviders();
		$data['edit'] = '';
		if ($this->input->post()) {

			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
			$this->form_validation->set_rules('accountname', 'Account Holder Name', 'required');
			$this->form_validation->set_rules('accountno', 'Account Number', 'required');
			$this->form_validation->set_rules('ifsc', 'IFSC CODE', 'required');
			$this->form_validation->set_rules('bankname', 'Bank Name', 'required');
			$this->form_validation->set_rules('branchname', 'Branch Name', 'required');
			if ($this->form_validation->run() == TRUE) {
				//$recentdata = $this->input->post();
				$formarray = ['accountname' => $this->input->post('accountname'), 'accountno' => $this->input->post('accountno'), 'ifsc' => $this->input->post('ifsc'), 'bankname' => $this->input->post('bankname'), 'branchname' => $this->input->post('branchname'), 'serviceprovider' => $this->input->post('serviceprovider'), 'status' => $this->input->post('status')];
				$id = $this->input->post('id');
				if ($id != NULL) {
					//print_r($formarray);
					//echo ($id);
					$this->Bankaccount_model->update($formarray, $id);
				} else {
					$this->Bankaccount_model->create($formarray);
				}

				redirect(base_url() . 'super/bankaccount');
			} else {
				$this->load->view('bankaccount', $data);
			}
		} else {
			$this->load->view('bankaccount', $data);
		}
	}

	public function edit($edit)
	{

		if ($edit != NULL) {
			$this->load->model('Bankaccount_model');
			$this->load->model('Serviceprovider_model');
			$bankaccount = $this->Bankaccount_model->getBankaccount($edit);
			$data['bankaccounts'] = $this->Bankaccount_model->bankaccounts();
			$data['serviceproviders'] = $this->Serviceprovider_model->serviceproviders();
			$data['edit'] = $bankaccount;
			if (empty($bankaccount)) {
				$this->session->set_flashdata('error', 'Bank Account not found');

				redirect(base_url() . 'super/bankaccount');
			} else {
				$this->load->view('bankaccount', $data);
			}
		} else {
			$this->session->set_flashdata('error', 'bank Account not found');

			redirect(base_url() . 'super/bankaccount');
		}

		if ($this->input->post()) {
			$this->index();
		}
	}

	public function delete($id)
	{
		if ($id != NULL) {


			$this->load->model('Bankaccount_model');
			$bankaccount = $this->Bankaccount_model->getBankaccount($id);

			if (empty($bankaccount)) {
				$this->session->set_flashdata('error', 'Service provider not found');

				redirect(base_url() . 'super/bankaccount');
			}

			$this->Bankaccount_model->delete($id);
			$this->session->set_flashdata('success', 'Bank Account Deleted Successfuly');
			redirect(base_url() . 'super/bankaccount');
		} else {
			$this->session->set_flashdata('error', 'Service provider not found');

			redirect(base_url() . 'super/bankaccount');
		}
	}
}
