<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!'0' == $this->session->userdata('role')) {
			redirect('super/dashboard');
		}
	}
	public function index($id = null)
	{
		$this->load->model('Application_model');
		$this->load->model('Service_model');
		$this->load->model('Applicant_model');
		$this->load->model('Serviceprovider_model');
		$data['applications'] = $this->Application_model->getApplicationbyUser($id);
		$data['services'] = $this->Service_model->services();
		$data['serviceproviders'] = $this->Serviceprovider_model->serviceproviders();
		$data['users'] = $this->Applicant_model->getUser($id);
		if (empty($id)) {
			$this->session->set_flashdata('error', 'Application not found');

			redirect(base_url() . 'super/application');
		} else {
			$this->load->view('approval', $data);
		}
	}
}
