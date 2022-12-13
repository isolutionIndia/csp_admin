<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Application_model extends CI_Model
{

	public function create($formArray)
	{
		$this->db->insert('application', $formArray);

		//print_r($formArray);
	}

	public function applications()
	{

		return $this->db->get('application')->result_array();
	}

	public function getApplication($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('application')->row_array();
	}
	public function getApplicationbyUser($id)
	{
		$this->db->where('enquiry', $id);
		return $this->db->get('application')->row_array();
	}
	public function update($formArray, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('application', $formArray);
	}
	public function delete($id)
	{
		$this->db->where('id', $id);

		$this->db->delete('application');
	}
	public function roles()
	{
		return $this->db->get('roles')->result_array();
	}

	public function getuserApplicationid($id = null)
	{
		if ($id == null) {
			return $this->db->get('enquiry')->result_array();
		} else {
			$this->db->where('id', $id);
			$provider = $this->db->get('application')->row_array();
			$this->db->where('id', $provider['user']);
			return  $this->db->get('enquiry')->row_array();
		}
	}
	public function getserviceApplicationid($id = null)
	{
		if ($id == null) {
			return $this->db->get('service')->result_array();
		} else {
			$this->db->where('id', $id);
			$provider = $this->db->get('application')->row_array();
			$this->db->where('id', $provider['service']);
			return  $this->db->get('service')->row_array();
		}
	}

	public function getserviceproviderApplication($id = null)
	{
		if ($id == null) {
			return $this->db->get('serviceprovider')->result_array();
		} else {
			$this->db->where('id', $id);
			$provider = $this->db->get('application')->row_array();
			$this->db->where('id', $provider['serviceprovider']);
			return  $this->db->get('serviceprovider')->row_array();
		}
	}
}
