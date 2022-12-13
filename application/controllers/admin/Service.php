<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
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
		$this->load->model('organisation_model');
		$this->load->model('Service_model');
		$this->load->model('Serviceprovider_model');
		$data['services'] = $this->Service_model->services();
		$data['serviceproviders'] = $this->Serviceprovider_model->serviceproviders();


		$organisation = $this->organisation_model->getorganisation();

		$data['organisation'] = $organisation;
		$data['edit'] = '';

		if ($this->input->post()) {

			// check valid data (Form Validation)

			$this->load->helper('Common_helper');

			$config['upload_path']          = './uploads/service/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['encrypt_name']        = true;


			$this->load->library('upload', $config);


			$this->load->library('form_validation');


			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
			$this->form_validation->set_rules('service', 'service', 'required');
			$this->form_validation->set_rules('serviceprovider', 'serviceprovider', 'required');

			if ($this->form_validation->run() == TRUE) {
				//save category to DB

				if (!empty($_FILES['image']['name'])) {
					//create category with image
					if ($this->upload->do_upload('image')) {
						//file uploaded successfully
						$data = $this->upload->data(); //file data

						//resize image part
						resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb/' . $data['file_name'], 64, 64);

						$formArray['logo'] = $data['file_name'];
						$formArray['service'] = $this->input->post('service');
						$formArray['serviceprovider'] = $this->input->post('serviceprovider');

						$formArray['status'] = 0;
						$formArray['status'] = $this->input->post('status');
						$formArray['created_at'] = date('Y-m-d H:i:S');
						$id = $this->input->post('id');
						if ($id != NULL) {
							$this->Service_model->update($formArray, $id);
						} else {
							$this->Service_model->create($formArray);
						}
						$this->session->set_flashdata('success', 'Service  added Successfully');

						redirect(base_url() . 'super/service', $data);
					} else {
						//we got some error
						$error = $this->upload->display_errors("<p class='invalid-feedback'>", '</p>');
						$data['errorImageUpload'] = $error;
						$this->load->view('service', $data);
					}
				} else {
					//create Service  without image
					$formArray['service'] = $this->input->post('service');
					$formArray['serviceprovider'] = $this->input->post('serviceprovider');

					$formArray['status'] = 0;
					$formArray['status'] = $this->input->post('status');
					$formArray['created_at'] = date('Y-m-d H:i:S');
					$id = $this->input->post('id');
					if ($id != NULL) {
						$this->Service_model->update($formArray, $id);
					} else {
						$this->Service_model->create($formArray);
					}

					$this->session->set_flashdata('success', 'Service  added Successfully');

					redirect(base_url() . 'super/service', $data);
				}
			} else {
				//shows error
				$this->load->view('service', $data);
			}
		} else {
			$this->load->view('service', $data);
		}
	}


	public function edit($edit)
	{

		if ($edit != NULL) {
			$this->load->model('organisation_model');
			$this->load->model('Service_model');
			$this->load->model('Serviceprovider_model');
			$Service = $this->Service_model->getservice($edit);
			$data['edit'] = $Service;
			$data['services'] = $this->Service_model->services();
			$organisation = $this->organisation_model->getorganisation();
			$data['organisation'] = $organisation;
			$data['serviceproviders'] = $this->Serviceprovider_model->serviceproviders();
			if (empty($Service)) {
				$this->session->set_flashdata('error', 'Service  not found');

				redirect(base_url() . 'super/service');
			} else {

				$this->load->view('service', $data);
			}
		} else {
			$this->session->set_flashdata('error', 'Service  not found');

			redirect(base_url() . 'super/service');
		}
		if ($this->input->post()) {
			$this->index();
		}
	}

	public function delete($id)
	{
		$this->load->model('Service_model');
		$Service = $this->Service_model->getservice($id);

		if (empty($Service)) {
			$this->session->set_flashdata('error', 'Service  not found');

			redirect(base_url() . 'super/service');
		}
		if (file_exists('./uploads/service/' . $Service['logo'])) {
			unlink('./uploads/service/' . $Service['logo']);
		}
		if (file_exists('./uploads/service/thumb/' . $Service['logo'])) {
			unlink('./uploads/service/thumb/' . $Service['logo']);
		}
		$this->Service_model->delete($id);
		$this->session->set_flashdata('success', 'Service  Deleted Successfuly');
		redirect(base_url() . 'super/service');
	}
}
