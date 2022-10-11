<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('role')) {

			redirect('welcome');
		}
	}

	public function index()
	{
		$this->load->view('dashboard');
	}
	public function logout()
	{
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('name');
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
