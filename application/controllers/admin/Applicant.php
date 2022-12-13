<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicant extends CI_Controller
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
		$this->load->model('Applicant_model');
		$this->load->model('Serviceprovider_model');
		$data['users'] = $this->Applicant_model->users();
		$data['roles'] = $this->Applicant_model->roles();
		$data['tblstate'] = $this->organisation_model->getstate();
		$data['serviceproviders'] = $this->Serviceprovider_model->serviceproviders();
		$organisation = $this->organisation_model->getorganisation();

		$data['organisation'] = $organisation;
		$data['edit'] = '';

		if ($this->input->post()) {

			// check valid data (Form Validation)

			$this->load->helper('Common_helper');

			$config['upload_path']          = './uploads/user/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['encrypt_name']        = true;


			$this->load->library('upload', $config);


			$this->load->library('form_validation');


			$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('useremail', 'useremail', 'required|valid_email');
			$this->form_validation->set_rules('userphonenumber', 'username', 'required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			if ($this->form_validation->run() == TRUE) {
				//save category to DB

				if (!empty($_FILES['image']['name'])) {
					//create category with image
					if ($this->upload->do_upload('image')) {
						//file uploaded successfully
						$data = $this->upload->data(); //file data

						//resize image part
						resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb/' . $data['file_name'], 64, 64);

						$formArray['userlogo'] = $data['file_name'];
						$formArray['username'] = $this->input->post('username');
						$formArray['useremail'] = $this->input->post('useremail');
						$formArray['userphonenumber'] = $this->input->post('userphonenumber');
						$formArray['aadharcard'] = $this->input->post('aadharcard');
						$formArray['pancard'] = $this->input->post('pancard');
						$formArray['address'] = $this->input->post('address');
						$formArray['state'] = $this->input->post('state');
						$formArray['district'] = $this->input->post('district');
						$formArray['pincode'] = $this->input->post('pincode');
						$formArray['serviceprovider'] = $this->input->post('serviceprovider');
						$passwordd = $this->input->post('password');
						$formArray['password'] = $this->encrypt->encode($passwordd);
						$formArray['status'] = 0;
						$formArray['role'] = $this->input->post('role');
						$formArray['status'] = $this->input->post('status');
						$formArray['created_at'] = date('Y-m-d H:i:S');
						$id = $this->input->post('id');
						if ($id != NULL) {
							$this->Applicant_model->update($formArray, $id);
						} else {
							$this->Applicant_model->create($formArray);
						}
						$this->session->set_flashdata('success', 'Applicant added Successfully');

						redirect(base_url() . 'super/applicant', $data);
					} else {
						//we got some error
						$error = $this->upload->display_errors("<p class='invalid-feedback'>", '</p>');
						$data['errorImageUpload'] = $error;
						$this->load->view('applicant', $data);
					}
				} else {
					//create User without image
					$formArray['username'] = $this->input->post('username');
					$formArray['useremail'] = $this->input->post('useremail');
					$formArray['userphonenumber'] = $this->input->post('userphonenumber');
					$formArray['aadharcard'] = $this->input->post('aadharcard');
					$formArray['pancard'] = $this->input->post('pancard');
					$formArray['address'] = $this->input->post('address');
					$formArray['state'] = $this->input->post('state');
					$formArray['district'] = $this->input->post('district');
					$formArray['pincode'] = $this->input->post('pincode');
					$formArray['serviceprovider'] = $this->input->post('serviceprovider');
					$passwordd = $this->input->post('password');
					$formArray['password'] = $this->encrypt->encode($passwordd);
					$formArray['status'] = 0;
					$formArray['role'] = $this->input->post('role');
					$formArray['status'] = $this->input->post('status');
					$formArray['created_at'] = date('Y-m-d H:i:S');
					$id = $this->input->post('id');
					if ($id != NULL) {
						$this->Applicant_model->update($formArray, $id);
					} else {
						$this->Applicant_model->create($formArray);
					}

					$this->session->set_flashdata('success', 'Applicant added Successfully');

					redirect(base_url() . 'super/applicant', $data);
				}
			} else {
				//shows error
				$this->load->view('applicant', $data);
			}
		} else {
			$this->load->view('applicant', $data);
		}
	}
	public function edit($edit)
	{

		if ($edit != NULL) {
			$this->load->model('organisation_model');
			$this->load->model('Applicant_model');
			$this->load->model('Serviceprovider_model');
			$User = $this->Applicant_model->getUser($edit);
			$data['edit'] = $User;
			$data['users'] = $this->Applicant_model->users();
			$data['roles'] = $this->Applicant_model->roles();
			$organisation = $this->organisation_model->getorganisation();
			$data['organisation'] = $organisation;
			$data['tblstate'] = $this->organisation_model->getstate();
			$data['serviceproviders'] = $this->Serviceprovider_model->serviceproviders();
			if (empty($User)) {
				$this->session->set_flashdata('error', 'Applicant not found');

				redirect(base_url() . 'super/applicant');
			} else {

				$this->load->view('applicant', $data);
			}
		} else {
			$this->session->set_flashdata('error', 'Applicant not found');

			redirect(base_url() . 'super/applicant');
		}
		if ($this->input->post()) {
			$this->index();
		}
	}

	public function delete($id)
	{
		$this->load->model('Applicant_model');
		$User = $this->Applicant_model->getUser($id);

		if (empty($User)) {
			$this->session->set_flashdata('error', 'Applicant not found');

			redirect(base_url() . 'super/user');
		}
		if (file_exists('./uploads/user/' . $User['userlogo'])) {
			unlink('./uploads/user/' . $User['userlogo']);
		}
		if (file_exists('./uploads/user/thumb/' . $User['userlogo'])) {
			unlink('./uploads/user/thumb/' . $User['userlogo']);
		}
		$this->Applicant_model->delete($id);
		$this->session->set_flashdata('success', 'Applicant Deleted Successfuly');
		redirect(base_url() . 'super/applicant');
	}
}
