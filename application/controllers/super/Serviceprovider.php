<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Serviceprovider extends CI_Controller
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
		$this->load->model('organisation_model');
		$this->load->model('Serviceprovider_model');
		$data['serviceproviders'] = $this->Serviceprovider_model->serviceproviders();


		$organisation = $this->organisation_model->getorganisation();

		$data['organisation'] = $organisation;
		$data['edit'] = '';

		if ($this->input->post()) {

			// check valid data (Form Validation)

			$this->load->helper('Common_helper');

			$config['upload_path']          = './uploads/serviceprovider/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['encrypt_name']        = true;


			$this->load->library('upload', $config);


			$this->load->library('form_validation');


			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
			$this->form_validation->set_rules('ServiceProvidername', 'ServiceProvidername', 'required');
			$this->form_validation->set_rules('ServiceProvideremail', 'ServiceProvideremail', 'required|valid_email');
			$this->form_validation->set_rules('ServiceProviderphonenumber', 'ServiceProvidername', 'required|min_length[10]|max_length[10]');
			if ($this->form_validation->run() == TRUE) {
				//save category to DB

				if (!empty($_FILES['image']['name'])) {
					//create category with image
					if ($this->upload->do_upload('image')) {
						//file uploaded successfully
						$data = $this->upload->data(); //file data

						//resize image part
						resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb/' . $data['file_name'], 64, 64);

						$formArray['Providerlogo'] = $data['file_name'];
						$formArray['ServiceProvidername'] = $this->input->post('ServiceProvidername');
						$formArray['ServiceProvideremail'] = $this->input->post('ServiceProvideremail');
						$formArray['ServiceProviderphonenumber'] = $this->input->post('ServiceProviderphonenumber');
						$formArray['status'] = 0;
						$formArray['status'] = $this->input->post('status');
						$formArray['created_at'] = date('Y-m-d H:i:S');
						$id = $this->input->post('id');
						if ($id != NULL) {
							$this->Serviceprovider_model->update($formArray, $id);
						} else {
							$this->Serviceprovider_model->create($formArray);
						}
						$this->session->set_flashdata('success', 'Service Provider added Successfully');

						redirect(base_url() . 'super/serviceprovider', $data);
					} else {
						//we got some error
						$error = $this->upload->display_errors("<p class='invalid-feedback'>", '</p>');
						$data['errorImageUpload'] = $error;
						$this->load->view('serviceprovider', $data);
					}
				} else {
					//create Service Provider without image
					$formArray['ServiceProvidername'] = $this->input->post('ServiceProvidername');
					$formArray['ServiceProvideremail'] = $this->input->post('ServiceProvideremail');
					$formArray['ServiceProviderphonenumber'] = $this->input->post('ServiceProviderphonenumber');
					$formArray['status'] = 0;
					$formArray['status'] = $this->input->post('status');
					$formArray['created_at'] = date('Y-m-d H:i:S');
					$id = $this->input->post('id');
					if ($id != NULL) {
						$this->Serviceprovider_model->update($formArray, $id);
					} else {
						$this->Serviceprovider_model->create($formArray);
					}

					$this->session->set_flashdata('success', 'Service Provider added Successfully');

					redirect(base_url() . 'super/serviceprovider', $data);
				}
			} else {
				//shows error
				$this->load->view('serviceprovider', $data);
			}
		} else {
			$this->load->view('serviceprovider', $data);
		}
	}


	public function edit($edit)
	{

		if ($edit != NULL) {
			$this->load->model('organisation_model');
			$this->load->model('Serviceprovider_model');
			$Serviceprovider = $this->Serviceprovider_model->getServiceprovider($edit);
			$data['edit'] = $Serviceprovider;
			$data['serviceproviders'] = $this->Serviceprovider_model->serviceproviders();
			$organisation = $this->organisation_model->getorganisation();
			$data['organisation'] = $organisation;
			if (empty($Serviceprovider)) {
				$this->session->set_flashdata('error', 'Service provider not found');

				redirect(base_url() . 'super/serviceprovider');
			} else {

				$this->load->view('serviceprovider', $data);
			}
		} else {
			$this->session->set_flashdata('error', 'Service provider not found');

			redirect(base_url() . 'super/serviceprovider');
		}
		if ($this->input->post()) {
			$this->index();
		}
	}

	public function delete($id)
	{
		$this->load->model('Serviceprovider_model');
		$Serviceprovider = $this->Serviceprovider_model->getServiceprovider($id);

		if (empty($Serviceprovider)) {
			$this->session->set_flashdata('error', 'Service provider not found');

			redirect(base_url() . 'super/serviceprovider');
		}
		if (file_exists('./uploads/serviceprovider/' . $Serviceprovider['Providerlogo'])) {
			unlink('./uploads/serviceprovider/' . $Serviceprovider['Providerlogo']);
		}
		if (file_exists('./uploads/serviceprovider/thumb/' . $Serviceprovider['Providerlogo'])) {
			unlink('./uploads/serviceprovider/thumb/' . $Serviceprovider['Providerlogo']);
		}
		$this->Serviceprovider_model->delete($id);
		$this->session->set_flashdata('success', 'Service Provider Deleted Successfuly');
		redirect(base_url() . 'super/serviceprovider');
	}
}
