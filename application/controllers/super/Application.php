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
		$data['serial'] = $this->random_number();
		$data['proposal'] = $this->random_number();
		$data['refferance'] = $this->random_number();
		$data['appnum'] = $this->random_number();
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

			$this->load->helper('Common_helper');

			$config['upload_path']          = './uploads/application/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['encrypt_name']        = true;


			$this->load->library('upload', $config);


			$this->load->library('form_validation');

			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
			$this->form_validation->set_rules('user', 'Applicant', 'required');
			$this->form_validation->set_rules('service', 'Service', 'required');
			$this->form_validation->set_rules('serialno', 'Serial No', 'required');
			$this->form_validation->set_rules('proposalno', 'Proposal No', 'required');
			$this->form_validation->set_rules('referanceno', 'Referance No', 'required');
			$this->form_validation->set_rules('applicationno', 'Application No', 'required'); //|is_unique[application.applicationno]

			if ($this->form_validation->run() == TRUE) {

				if (!empty($_FILES['image']['name'])) {
					if ($this->upload->do_upload('image')) {
						//file uploaded successfully
						$data = $this->upload->data(); //file data

						//resize image part
						resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb/' . $data['file_name'], 64, 64);

						$usr = $this->input->post('user');
						$serviceprovider = $this->Applicant_model->getUser($usr);
						//$recentdata = $this->input->post();
						$formarray = ['user' => $this->input->post('user'), 'userlogo' => $data['file_name'], 'serviceprovider' => $serviceprovider['serviceprovider'], 'service' => $this->input->post('service'), 'serialno' => $this->input->post('serialno'), 'proposalno' => $this->input->post('proposalno'), 'referanceno' => $this->input->post('referanceno'), 'applicationno' => $this->input->post('applicationno'), 'applydate' => $this->input->post('applydate'), 'status' => $this->input->post('status')];
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
						//we got some error
						$error = $this->upload->display_errors("<p class='invalid-feedback'>", '</p>');
						$data['errorImageUpload'] = $error;
						$this->load->view('application', $data);
					}
				} else { //IF NO IMG
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
				}
			} else { // if form validationS false
				$this->load->view('application', $data);
			}
		} else {  // if input post false
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
	public function bankaccountByproviderinUserid()
	{
		$this->load->model('Bankaccount_model');
		$item = $this->input->post("item");
		$data = $this->Bankaccount_model->detailBankaccountByproviderinUserid($item);
		echo json_encode($data);
	}

	function random_number($maxlength = 6)
	{
		$chary = array( //"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
			"0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
			//"A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"
		);
		$return_str = "";
		for ($x = 0; $x <= $maxlength; $x++) {
			$return_str .= $chary[rand(0, count($chary) - 1)];
		}
		return $return_str;
	}
}
