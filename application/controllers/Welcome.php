<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->output->delete_cache();
		$this->load->model('User_model');
	}

	public function send_email() {
		$from_uname = $this->session->userdata('uname');
		$from_email = $this->session->userdata('email'); 
		$to_email = "dhan.marlan.ortiz@gmail.com"; 

		$datestring = '%F %d %Y - %h:%i %A';
		$time = time();

		$this->email->from($from_email, 'LoanBoss automated login notifer'); 
		$this->email->to($to_email);
		$this->email->subject('Loan Boss login'); 
		$this->email->message($from_uname.' has logged in to the system ('.mdate($datestring, $time).')'); 
		$this->email->send();
	}

	public function index() {
		if(null !== $this->input->post('login')) {
			/* Input validation */
			$this->form_validation->set_rules('password', 'Password', 'required|alpha_dash|max_length[30]');
			$this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email');
			/* Valid */
			if ($this->form_validation->run()) {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				/* Check credentials */
				$data['check_user'] = $this->User_model->check_user($email, $password);
				if($data['check_user']) {
					$this->send_email();
					header("Location: ".site_url('home').""); // Redirect to admin page
				}else {
					$data['check_user'] = "Invalid username/password."; // Create error message
				}
			}
		}
		
		/* Create login form */
		$form =  array('class' => 'form-horizontal login-form', 'autocomplete' => 'off' );
		$email = array('name' => 'email', 
					'id' => 'email', 
					'value' => set_value('email'), 'maxlength' => '50', 
					'placeholder' => 'Email address', 
					'class' => 'form-control email', 
					'style' => '',
					'autocomplete' => 'off'
				);
		$password = array('name' => 'password', 
					'id' => 'password', 
					'type' => 'password', 
					'maxlength' => '30', 
					'placeholder' => 'Password', 
					'class' => 'form-control password', 
					'size' => '30', 
					'style' => '',
					'autocomplete' => 'off'
				);
		$submit = array('name' => 'login', 
					'id' => 'submit', 
					'value' => 'Sign in', 
					'class' => 'btn btn-primary submit', 
					'style' => ''
				);
		$data['form'] =  form_open('welcome', $form).heading('<span>LB</span> LoanBoss', 1, 'class="page-header"')
						.heading('Login', 5, 'class="form-sub"')
						.form_input($email)
						.form_input($password)
						.form_submit($submit)
						.form_close();

		$this->load->view('header');
		$this->load->view('login-page', $data);
		$this->load->view('footer');
	}
}
