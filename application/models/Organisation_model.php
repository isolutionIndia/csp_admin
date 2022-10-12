
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organisation_model extends CI_Model
{

	public function create($formArray)
	{



		$this->db->insert('categories', $formArray);
	}



	public function getorganisation()
	{


		$organisation = $this->db->get('organisation')->row_array();
		return $organisation;
	}

	public function getcountry()
	{


		$country = $this->db->get('country')->result_array();
		return $country;
	}

	public function getpurchasecodeprefix()
	{

		$this->db->select('host_name');
		$getpurchasecode = $this->db->get('organisation')->row_array();
		return $getpurchasecode;
	}
	public function getprocesscodeprefix()
	{

		$this->db->select('port_name');
		$getpurchasecode = $this->db->get('organisation')->row_array();
		return $getpurchasecode;
	}

	public function update($id, $formArray)
	{

		$this->db->where('id', $id);
		$this->db->update('organisation', $formArray);
	}
}

/* End of file ModelName.php */
?>
