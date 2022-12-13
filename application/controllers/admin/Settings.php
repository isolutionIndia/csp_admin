<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$role = $this->session->userdata('role');
		if (!('0' == $role)) {
			$this->session->set_flashdata('msg', 'session expired ! please login');
			redirect(base_url() . 'super/dashboard');
		}
	}

	//shows organisation list page
	public function organisation()
	{
		$this->load->library('form_validation');
		$this->load->helper('common_helper');
		$this->load->model('organisation_model');


		$organisation = $this->organisation_model->getorganisation();

		$data['organisation'] = $organisation;
		$data['country'] = $this->organisation_model->getcountry();
		$data['tblstate'] = $this->organisation_model->getstate();
		$this->load->view('settings', $data);
	}


	//show organisation page
	public function organisationedit($id)
	{
		$this->load->model('organisation_model');
		$this->load->helper('common_helper');
		$this->load->library('form_validation');



		$organisation = $this->organisation_model->getorganisation();
		$data['organisation'] = $organisation;
		// print_r($organisation);
		// exit();
		if (empty($organisation)) {
			$this->session->set_flashdata('error', 'organisation not found');

			redirect(base_url() . 'super/settings/organisation');
		}
		$data['country'] = $this->organisation_model->getcountry();


		$config['upload_path']          = './uploads/organisation/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']        = true;

		$this->load->library('upload', $config);

		$this->form_validation->set_error_delimiters('<p class="invalid-feedback">', '</p>');
		$this->form_validation->set_rules('company_name', 'company_name', 'trim|required');
		$this->form_validation->set_rules('company_email', 'company_email', 'trim|required');
		$this->form_validation->set_rules('company_phone', 'company_phone', 'trim|required');
		$this->form_validation->set_rules('company_gstno', 'company_gstno', 'trim|required');
		$this->form_validation->set_rules('company_currency', 'company_currency', 'trim|required');
		$this->form_validation->set_rules('country_code', 'country_code', 'trim|required');
		$this->form_validation->set_rules('tblstates', 'tblstates', 'trim|required');
		$this->form_validation->set_rules('host_name', 'host_name', 'trim|required');
		$this->form_validation->set_rules('port_name', 'port_name', 'trim|required');
		$this->form_validation->set_rules('user_name', 'user_name', 'trim|required');
		$this->form_validation->set_rules('company_address', 'company_address', 'trim|required');

		if ($this->form_validation->run() == TRUE) {


			if (!empty($_FILES['image']['name'])) {


				//create organisation with image

				if ($this->upload->do_upload('image')) {
					//file uploaded successfully
					$data = $this->upload->data(); //file data

					//resize image part
					resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb_front/' . $data['file_name'], 1120, 800);
					resizeImage($config['upload_path'] . $data['file_name'], $config['upload_path'] . 'thumb_admin/' . $data['file_name'], 300, 250);

					$formArray['image'] = $data['file_name'];
					$formArray['company_name'] = $this->input->post('company_name');
					$formArray['company_email'] = $this->input->post('company_email');
					$formArray['company_phone'] = $this->input->post('company_phone');
					$formArray['company_currency'] = $this->input->post('company_currency');
					$formArray['company_gstno'] = $this->input->post('company_gstno');
					$formArray['country_code'] = $this->input->post('country_code');
					$formArray['tblstate'] = $this->input->post('tblstates');
					$formArray['host_name'] = $this->input->post('host_name');
					$formArray['port_name'] = $this->input->post('port_name');
					$formArray['user_name'] = $this->input->post('user_name');
					$formArray['company_address'] = $this->input->post('company_address');
					$formArray['updated_at'] = date('Y-m-d H:i:S');

					$this->organisation_model->update($id, $formArray);
					//unlink
					if (file_exists(base_url() . 'uploads/organisation/' . $organisation['image'])) {
						unlink(base_url() . 'uploads/organisation/' . $organisation['image']);
					}
					if (file_exists(base_url() . 'uploads/organisation/thumb_front/' . $organisation['image'])) {
						unlink(base_url() . 'uploads/organisation/thumb_front/' . $organisation['image']);
					}
					if (file_exists(base_url() . 'uploads/organisation/thumb_admin/' . $organisation['image'])) {
						unlink(base_url() . 'uploads/organisation/thumb_admin/' . $organisation['image']);
					}
					$this->session->set_flashdata('success', 'organisation updated Successfully');

					redirect(base_url() . 'super/settings/organisation/index');
				} else {
					//we got some error
					$error = $this->upload->display_errors("<p class='invalid-feedback'>", '</p>');
					$data['errorImageUpload'] = $error;
					$this->load->view('settings', $data);
				}
			} else {
				//create organisation without image
				$formArray['company_name'] = $this->input->post('company_name');
				$formArray['company_email'] = $this->input->post('company_email');
				$formArray['company_phone'] = $this->input->post('company_phone');
				$formArray['company_currency'] = $this->input->post('company_currency');
				$formArray['company_gstno'] = $this->input->post('company_gstno');
				$formArray['country_code'] = $this->input->post('country_code');
				$formArray['tblstate'] = $this->input->post('tblstates');
				$formArray['host_name'] = $this->input->post('host_name');
				$formArray['port_name'] = $this->input->post('port_name');
				$formArray['user_name'] = $this->input->post('user_name');
				$formArray['company_address'] = $this->input->post('company_address');
				$formArray['updated_at'] = date('Y-m-d H:i:S');
				$this->organisation_model->update($id, $formArray);

				$this->session->set_flashdata('success', 'organisation updated Successfully');

				redirect(base_url() . 'super/settings/organisation');
			}
		} else {
			$data['organisation'] = $organisation;
			$this->load->view('settings', $data);
		}
	}
}

/* End of file Settings.php */
