<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!'admin' == $this->session->userdata('role')) {
			redirect('super/dashboard');
		}
	}
	public function index($id = null)
	{
		$this->load->model('Application_model');
		$this->load->model('Service_model');
		$this->load->model('Applicant_model');
		$this->load->model('Serviceprovider_model');
		$this->load->model('organisation_model');
		$this->load->model('Bankaccount_model');
		    $data['applications'] = $this->Application_model->getApplication($id);
			$data['serviceprovider'] = $this->Application_model->getserviceproviderApplication($id);
		    $data['service'] = $this->Application_model->getserviceApplicationid($id);			
			$data['users'] = $this->Application_model->getuserApplicationid($id);
			$data['organisation'] = $this->organisation_model->getorganisation();
			
			
			 
		if (empty($id)) {
			$this->session->set_flashdata('error', 'Application not found');

			redirect(base_url() . 'super/application');
		} else {
			$this->load->view('approval', $data);
		}
	}
}
