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
		$userdata = array(
			'useremail' => $info,
			// 'Password' => $password
		);
		// $phone = array(
		// 	'phone' => $info,
		// 	// 'Password' => $password
		// );
		$this->db->where($userdata);
		$userlogin = $this->db->get('user');

		$this->db->where($data);
		// $this->db->or_where($phone);
		$login = $this->db->get('super');
		if ($login != NULL) {

			$valid = $login->row();
			if ($valid) {
				$passwd = $this->encrypt->decode($valid->password);
				if ($passwd == $password) {
					return $login->row();
				}
			} else if ($userlogin != NULL) {

				$uservalid = $userlogin->row();
				if ($uservalid) {
					$passwd = $this->encrypt->decode($uservalid->password);
					if ($passwd == $password) {
						return $userlogin->row();
					}
				}
			}
		}
	}
}
