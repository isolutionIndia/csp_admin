<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Serviceprovider_model extends CI_Model
{

	public function create($formArray)
	{
		$this->db->insert('serviceprovider', $formArray);

		//print_r($formArray);
	}

	public function serviceproviders()
	{
		return $this->db->get('serviceprovider')->result_array();
	}

	public function getServiceprovider($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('serviceprovider')->row_array();
	}
	public function update($formArray, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('serviceprovider', $formArray);
	}
	public function delete($id)
	{
		$this->db->where('id', $id);

		$this->db->delete('serviceprovider');
	}
}
