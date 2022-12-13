<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bankaccount_model extends CI_Model
{

	public function create($formArray)
	{
		$this->db->insert('bankaccount', $formArray);

		//print_r($formArray);
	}

	public function bankaccounts()
	{
		return $this->db->get('bankaccount')->result_array();
	}
	public function getBankaccount($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('bankaccount')->row_array();
	}

	public function detailBankaccountByproviderinUserid($id = null)
	{
		if ($id == null) {
			return $this->db->get('bankaccount')->result_array();
		} else {
			$this->db->where('id', $id);
			$provider = $this->db->get('user')->row_array();
			$this->db->where('serviceprovider', $provider['serviceprovider']);
			return  $this->db->get('bankaccount')->result_array();
		}
	}
		public function detailBankaccountByproviderinServiceid($id = null)
	{
		if ($id == null) {
			return $this->db->get('bankaccount')->result_array();
		} else {
			$this->db->where('id', $id);
			$provider = $this->db->get('user')->row_array();
			$this->db->where('serviceprovider', $provider['serviceprovider']);
			return  $this->db->get('bankaccount')->result_array();
		}
	}
	public function update($formArray, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('bankaccount', $formArray);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);

		$this->db->delete('bankaccount');
	}
}
