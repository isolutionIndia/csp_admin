<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_model extends CI_Model
{
	public function index($info, $password)
	{
		$this->load->library('encrypt');
		$data = array(
			'email' => $info,
			// 'Password' => $password
		);
		// $phone = array(
		// 	'phone' => $info,
		// 	// 'Password' => $password
		// );

		$this->db->where($data);
		// $this->db->or_where($phone);
		$login = $this->db->get('super');
		if ($login != NULL) {

			$valid = $login->row();

			$passwd = $this->encrypt->decode($valid->password);
			if ($passwd == $password) {
				return $login->row();
			}
		}
	}
}
