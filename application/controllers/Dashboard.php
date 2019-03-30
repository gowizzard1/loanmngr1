<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper("myHelper");
		if(null === $this->session->userdata('uid')) {
			header("Location: ".site_url('welcome?fa=1')."");
		}
	}

	public function get() {
		$data['users']= $this->User_model->getUsers();
	}
}
