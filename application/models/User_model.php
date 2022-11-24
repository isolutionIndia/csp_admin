<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function create($formArray)
	{
		$this->db->insert('user', $formArray);

		//print_r($formArray);
	}

	public function users()
	{

		return $this->db->get('user')->result_array();
	}

	public function getUser($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('user')->row_array();
	}
	public function update($formArray, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $formArray);
	}
	public function delete($id)
	{
		$this->db->where('id', $id);

		$this->db->delete('user');
	}
	public function roles()
	{
		return $this->db->get('roles')->result_array();
	}
}
