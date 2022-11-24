<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
		$this->load->model('User_model');
		$data['users'] = $this->User_model->users();
		$data['roles'] = $this->User_model->roles();

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
						$passwordd = $this->input->post('password');
						$formArray['password'] = $this->encrypt->encode($passwordd);
						$formArray['status'] = 0;
						$formArray['role'] = $this->input->post('role');
						$formArray['status'] = $this->input->post('status');
						$formArray['created_at'] = date('Y-m-d H:i:S');
						$id = $this->input->post('id');
						if ($id != NULL) {
							$this->User_model->update($formArray, $id);
						} else {
							$this->User_model->create($formArray);
						}
						$this->session->set_flashdata('success', 'User added Successfully');

						redirect(base_url() . 'super/user', $data);
					} else {
						//we got some error
						$error = $this->upload->display_errors("<p class='invalid-feedback'>", '</p>');
						$data['errorImageUpload'] = $error;
						$this->load->view('user', $data);
					}
				} else {
					//create User without image
					$formArray['username'] = $this->input->post('username');
					$formArray['useremail'] = $this->input->post('useremail');
					$formArray['userphonenumber'] = $this->input->post('userphonenumber');
					$passwordd = $this->input->post('password');
					$formArray['password'] = $this->encrypt->encode($passwordd);
					$formArray['status'] = 0;
					$formArray['role'] = $this->input->post('role');
					$formArray['status'] = $this->input->post('status');
					$formArray['created_at'] = date('Y-m-d H:i:S');
					$id = $this->input->post('id');
					if ($id != NULL) {
						$this->User_model->update($formArray, $id);
					} else {
						$this->User_model->create($formArray);
					}

					$this->session->set_flashdata('success', 'User added Successfully');

					redirect(base_url() . 'super/user', $data);
				}
			} else {
				//shows error
				$this->load->view('user', $data);
			}
		} else {
			$this->load->view('user', $data);
		}
	}


	public function edit($edit)
	{

		if ($edit != NULL) {
			$this->load->model('organisation_model');
			$this->load->model('User_model');
			$User = $this->User_model->getUser($edit);
			$data['edit'] = $User;
			$data['users'] = $this->User_model->users();
			$data['roles'] = $this->User_model->roles();
			$organisation = $this->organisation_model->getorganisation();
			$data['organisation'] = $organisation;
			if (empty($User)) {
				$this->session->set_flashdata('error', 'User not found');

				redirect(base_url() . 'super/user');
			} else {

				$this->load->view('user', $data);
			}
		} else {
			$this->session->set_flashdata('error', 'User not found');

			redirect(base_url() . 'super/user');
		}
		if ($this->input->post()) {
			$this->index();
		}
	}

	public function delete($id)
	{
		$this->load->model('User_model');
		$User = $this->User_model->getUser($id);

		if (empty($User)) {
			$this->session->set_flashdata('error', 'User not found');

			redirect(base_url() . 'super/user');
		}
		if (file_exists('./uploads/user/' . $User['userlogo'])) {
			unlink('./uploads/user/' . $User['userlogo']);
		}
		if (file_exists('./uploads/user/thumb/' . $User['userlogo'])) {
			unlink('./uploads/user/thumb/' . $User['userlogo']);
		}
		$this->User_model->delete($id);
		$this->session->set_flashdata('success', 'User Deleted Successfuly');
		redirect(base_url() . 'super/user');
	}
}
