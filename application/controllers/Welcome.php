<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ('admin' == $this->session->userdata('role')) {
			redirect('super/dashboard');
		}
	}
	public function index()
	{
		$this->load->model('organisation_model');


		$organisation = $this->organisation_model->getorganisation();

		$data['organisation'] = $organisation;
		$this->load->view('welcome_message', $data);
	}
}
