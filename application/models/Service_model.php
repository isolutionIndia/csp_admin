<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service_model extends CI_Model
{

	public function create($formArray)
	{
		$this->db->insert('service', $formArray);

		//print_r($formArray);
	}

	public function services()
	{
		return $this->db->get('service')->result_array();
	}

	public function getService($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('service')->row_array();
	}
	public function servicesByprovider($provider)
	{
		$this->db->where('serviceprovider', $provider);
		return $this->db->get('service')->result_array();
	}
	public function servicesByproviderinUserid($id = null)
	{
		if ($id == null) {
			return $this->db->get('service')->result_array();
		} else {
			$this->db->where('id', $id);
			$provider = $this->db->get('enquiry')->row_array();
			$this->db->where('serviceprovider', $provider['serviceprovider']);
			return $this->db->get('service')->result_array();
		}
	}
	public function detailservicesByproviderinUserid($id = null)
	{
		if ($id == null) {
			return $this->db->get('service')->result_array();
		} else {
			$this->db->where('id', $id);
			$provider = $this->db->get('enquiry')->row_array();
			$this->db->where('serviceprovider', $provider['serviceprovider']);

			$this->db->join('serviceprovider', 'serviceprovider.id=service.serviceprovider', 'left');
			return  $this->db->get('service')->result_array();
		}
	}
	public function detailservicesByproviderinApplicationid($id = null)
	{
		if ($id == null) {
			return $this->db->get('service')->result_array();
		} else {
			$this->db->where('id', $id);
			$provider = $this->db->get('application')->row_array();
			$this->db->where('serviceprovider', $provider['serviceprovider']);

			$this->db->join('serviceprovider', 'serviceprovider.id=service.serviceprovider', 'left');
			return  $this->db->get('service')->result_array();
		}
	}
	public function update($formArray, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('service', $formArray);
	}
	public function delete($id)
	{
		$this->db->where('id', $id);

		$this->db->delete('service');
	}
}
