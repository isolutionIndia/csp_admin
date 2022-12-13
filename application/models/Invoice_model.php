<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice_model extends CI_Model
{

	public function create($formArray)
	{
		$this->db->insert('invoice', $formArray);

		//print_r($formArray);
	}

	public function invoices()
	{
		return $this->db->get('invoice')->result_array();
	}
	public function getInvoice($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('invoice')->row_array();
	}
	public function update($formArray, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('invoice', $formArray);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);

		$this->db->delete('invoice');
	}
}
