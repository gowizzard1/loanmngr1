<?php
class User_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	/* Login authentication */
	public function check_user($email, $password) {
		$query = $this->db->get_where('accounts', array('email' => $email));
		$result = $query->row_array();
		if(password_verify($password, $result['password'])) { // check decrypt password
			$user_id = $result['id'];
			$username = $result['username'];
			$email = $result['email'];
			$this->session->set_userdata('uid', $user_id); // create session id
			$this->session->set_userdata('uname', $username); // create session username
			$this->session->set_userdata('email', $email); // create session email
			return $user_id;
		}else {
			return;
		}
	}

	/* Retrieve users */
	public function get_user($id=null) {
		/* Specific user */
		if(isset($id)) {
			$query = $this->db->get_where('accounts', array('id' => $id));
			$result = $query->row_array();
		}else { 
			/* All users */
			$query = $this->db->get('accounts');
			$result = $query->result_array();
		}
		return $result;
	}

	/* Create user */
	public function create_user($username, $email, $password) {
		$encrypt = password_hash($password, PASSWORD_DEFAULT); //encrypt password
		$data = array(
			'username' => $username,
			'email' => $email,
			'password' => $encrypt
		);
		$query = $this->db->insert('accounts', $data);
		return $this->db->affected_rows();
	}

	/* update user */
	public function update_user($username, $email, $password, $id) {
		echo $username."<br>";
		echo $email."<br>";
		echo $password."<br>";
		echo $id."<br>";

		$encrypt = password_hash($password, PASSWORD_DEFAULT); //encrypt password
		$data = array(
			'username' => $username,
			'email' => $email,
			'password' => $encrypt
		);
		$query = $this->db->update('accounts', $data, array('id' => $id));
		echo $this->db->affected_rows();
		return $this->db->affected_rows();
	}
	
}