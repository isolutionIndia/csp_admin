<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Application extends CI_Controller
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
		$this->load->view('application');
	}
}