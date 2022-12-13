<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicant_model extends CI_Model
{

	public function create($formArray)
	{
		$this->db->insert('enquiry', $formArray);

		//print_r($formArray);
	}

	public function users()
	{

		return $this->db->get('enquiry')->result_array();
	}

	public function getUser($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('enquiry')->row_array();
	}
	public function update($formArray, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('enquiry', $formArray);
	}
	public function delete($id)
	{
		$this->db->where('id', $id);

		$this->db->delete('enquiry');
	}
	public function roles()
	{
		return $this->db->get('roles')->result_array();
	}
}
