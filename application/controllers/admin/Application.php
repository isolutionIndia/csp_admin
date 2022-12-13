<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Application extends CI_Controller
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
		$this->load->model('Application_model');
		$this->load->model('Service_model');
		$this->load->model('Applicant_model');
		$this->load->model('Serviceprovider_model');
		$data['applications'] = $this->Application_model->applications();
		$data['services'] = $this->Service_model->services();
		$data['serviceproviders'] = $this->Serviceprovider_model->serviceproviders();

		$data['users'] = $this->Applicant_model->users();
		$data['edit'] = '';
		if ($this->input->post()) {

			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
			$this->form_validation->set_rules('user', 'Applicant', 'required');
			$this->form_validation->set_rules('service', 'Service', 'required');
			$this->form_validation->set_rules('serialno', 'Serial No', 'required');
			$this->form_validation->set_rules('proposalno', 'Proposal No', 'required');
			$this->form_validation->set_rules('referanceno', 'Referance No', 'required');
			$this->form_validation->set_rules('applicationno', 'Application No', 'required');

			if ($this->form_validation->run() == TRUE) {
				$usr = $this->input->post('user');
				$serviceprovider = $this->Applicant_model->getUser($usr);
				//$recentdata = $this->input->post();
				$formarray = ['user' => $this->input->post('user'), 'serviceprovider' => $serviceprovider['serviceprovider'], 'service' => $this->input->post('service'), 'serialno' => $this->input->post('serialno'), 'proposalno' => $this->input->post('proposalno'), 'referanceno' => $this->input->post('referanceno'), 'applicationno' => $this->input->post('applicationno'), 'applydate' => $this->input->post('applydate'), 'status' => $this->input->post('status')];
				$id = $this->input->post('id');
				if ($id != NULL) {
					//print_r($formarray);
					// exit();
					//echo ($id);
					$this->Application_model->update($formarray, $id);
				} else {
					$this->Application_model->create($formarray);
				}

				redirect(base_url() . 'super/application');
			} else {
				$this->load->view('application', $data);
			}
		} else {
			$this->load->view('application', $data);
		}
	}

	public function edit($edit)
	{

		if ($edit != NULL) {

			$this->load->model('Application_model');
			$this->load->model('Service_model');
			$this->load->model('Applicant_model');
			$this->load->model('Serviceprovider_model');
			$application = $this->Application_model->getApplication($edit);
			$data['applications'] = $this->Application_model->applications();

			$data['services'] = $this->Service_model->services();
			$data['users'] = $this->Applicant_model->users();
			$data['serviceproviders'] = $this->Serviceprovider_model->serviceproviders();
			$data['edit'] = $application;
			if (empty($application)) {
				$this->session->set_flashdata('error', 'Application not found');

				redirect(base_url() . 'super/application');
			} else {
				$this->load->view('application', $data);
			}
		} else {
			$this->session->set_flashdata('error', 'Application not found');

			redirect(base_url() . 'super/application');
		}

		if ($this->input->post()) {
			$this->index();
		}
	}

	public function delete($id)
	{
		if ($id != NULL) {


			$this->load->model('Application_model');
			$application = $this->Application_model->getApplication($id);

			if (empty($application)) {
				$this->session->set_flashdata('error', 'Application not found');

				redirect(base_url() . 'super/application');
			}

			$this->Application_model->delete($id);
			$this->session->set_flashdata('success', 'Application Deleted Successfuly');
			redirect(base_url() . 'super/application');
		} else {
			$this->session->set_flashdata('error', 'Application not found');

			redirect(base_url() . 'super/application');
		}
	}
	public function servicesByproviderinUserid()
	{
		$this->load->model('Service_model');
		$item = $this->input->post("item");
		$data = $this->Service_model->servicesByproviderinUserid($item);
		echo json_encode($data);
	}
}
