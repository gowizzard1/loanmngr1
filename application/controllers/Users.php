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

	public function index() {
		$default_username = "";
		$default_email = "";

		// /* Submit form */
		// if(null !== $this->input->post('create_user')) {
		// 	/* Validate input */
		// 	$this->form_validation->set_rules('username', 'Username', 'required|is_unique[accounts.use
		// 		rname]|alpha_dash|max_length[30]|min_length[6]');
		// 	$this->form_validation->set_rules('password', 'Password', 'required|alpha_dash|max_length[30]|min_length[8]');
		// 	$this->form_validation->set_rules('password2', 'Password confirm', 'required|alpha_dash|max_length[30]|matches[password]');
		// 	$this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|is_unique[accounts.email]|valid_email');
		// 	/* Validation success */
		// 	if ($this->form_validation->run()) {
		// 		$data['create_user'] = $this->User_model->create_user(
		// 						$this->input->post('username'),
		// 						$this->input->post('email'),
		// 						$this->input->post('password')
		// 					);
		// 		if($data['create_user'] == 1) { // Database insert success, refresh page, display alert msg, clear fields
		// 			header("Location: ".site_url('users')."?create_alert=Success");
		// 		}else { // Database insert failed, display alert msg, repopulate fields
		// 			$data['create_alert'] = "Failed! Please try again.";
		// 			$default_username = set_value('username');
		// 			$default_email = set_value('email');
		// 		}
		// 	}else { // Validation failed, repopulate fields
		// 		$default_username = set_value('username');
		// 		$default_email = set_value('email');
		// 	}
		// }else if(null !== $this->input->post('reset')) {
		// 	header("Location: ".site_url('users')."");
		// }

		// /* Create form */
		// $form = 	array('class' => 'form-horizontal user-form');
		// $username = array('name' => 'username', 
		// 				'id' => 'username', 
		// 				'value' => $default_username, 'maxlength' => '30', 
		// 				'placeholder' => 'Username', 
		// 				'class' => 'form-control username', 
		// 				'style' => ''
		// 			);
		// $email = 	array('name' => 'email', 
		// 				'id' => 'email', 
		// 				'value' => $default_email, 'maxlength' => '50', 
		// 				'placeholder' => 'Email Address', 
		// 				'class' => 'form-control email', 
		// 				'style' => ''
		// 			);
		// $password1 = array('name' => 'password', 
		// 				'id' => 'password', 
		// 				'type' => 'password', 
		// 				'maxlength' => '30', 
		// 				'placeholder' => 'Password', 
		// 				'class' => 'form-control password',	'size' => '30', 
		// 				'style' => ''
		// 			);
		// $password2 = array('name' => 'password2', 
		// 				'id' => 'password2', 
		// 				'type' => 'password', 
		// 				'maxlength' => '30', 
		// 				'placeholder' => 'Password Confirm', 
		// 				'class' => 'form-control password',	'style' => ''
		// 			);
		// $reset = 	array('name' => 'reset', 
		// 				'id' => 'reset', 
		// 				'value' => 'Clear', 
		// 				'class' => 'btn btn-normal', 
		// 				'style' => ''
		// 			);
		// $submit = 	array('name' => 'create_user', 
		// 				'id' => 'submit', 
		// 				'value' => 'Submit', 
		// 				'class' => 'btn btn-cyan', 
		// 				'style' => ''
		// 			);
		// $data['form1'] = form_open('users', $form)
		// 				.form_input($username)
		// 				.form_input($email)
		// 				.form_input($password1)
		// 				.form_input($password2)
		// 				.form_submit($reset)
		// 				.form_submit($submit) 
		// 				.form_close();
		
		/* Get list */
		$list = $this->User_model->get_user();

		/* Generate table */
		$this->table->set_heading('Username', 'Email', '&nbsp;');
		if(null !== $list) {
			foreach ($list as $l):
				$this->table->add_row($l['username'], $l['email'], '<a href="'.site_url().'/users/profile/'.$l['id'].'">View</a>');
			endforeach;
		}

		$template = array('table_open' => '<table class="table table-striped myTable">');

		$this->table->set_template($template);
		$data['table'] = $this->table->generate();
		$data['breadcrumbs'] =  breadcrumbs(array('User Accounts'));
        $data['table_header'] = "List of users";
        $data['form_header'] = "Add new user";
        $data['navbar_left'] = navbar_left($this->uri->segment(1));

        $this->load->view('header');
        $this->load->view('generic-page', $data);
        $this->load->view('footer');
	}

    public function logout() {
		session_destroy();
		header("Location: ".site_url('welcome')."?lo=1");
	}
	
	public function addCustomer(){

	}
  public function generateReport(){
		
	}
	public function makeRepayment(){
		
	}
	function dashboard(){

	}
	
	public function profile($id) {
		$profile = $this->User_model->get_user($id);
		$default_username = $profile['username'];
		$this->table->add_row(array('ID', $profile['id']));
		$this->table->add_row(array('Username', $default_username));
		$this->table->add_row(array('Email', $profile['email']));
		$this->table->add_row(array('&#x270e;', anchor(site_url().'/users/update/'.$profile['id'], 'Edit', 'title="Edit"') ));

		$template = array('table_open' => '<table class="table table-striped myTable">');
		$this->table->set_template($template);
		$data['form1'] = $this->table->generate();

		$data['breadcrumbs'] =  breadcrumbs(array('users', $default_username));
        $data['table_header'] = "";
        $data['form_header'] = $default_username;
        $data['navbar_left'] = navbar_left($this->uri->segment(1));
        
        $this->load->view('header');
        $this->load->view('generic-page', $data);
        $this->load->view('footer');
	}
	

	public function update($id) {
		$profile = $this->User_model->get_user($id);
		$default_username = $profile['username'];
		$default_email = $profile['email'];
		$default_id = $profile['id'];

		if(null !== $this->input->post('save')) {
			/* Validate input */
			$new_uname = $this->input->post('username');
			$new_email = $this->input->post('email');
			if($new_uname == $default_username) {
				$uniq_uname = '';
			}else {
				$uniq_uname = '|is_unique[accounts.username]';
			}

			if($new_uname == $default_username) {
				$uniq_email = '';
			}else {
				$uniq_email = '|is_unique[accounts.email]';
			}

			$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash|max_length[30]|min_length[6]'.$uniq_uname);
			$this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|valid_email'.$uniq_email);
			$this->form_validation->set_rules('password', 'Password', 'required|alpha_dash|max_length[30]|min_length[8]');
			$this->form_validation->set_rules('password2', 'Password confirm', 'required|alpha_dash|max_length[30]|matches[password]');
			// /* Validation success */
			if ($this->form_validation->run()) {
				$data['update_user'] = $this->User_model->update_user(
								$this->input->post('username'),
								$this->input->post('email'),
								$this->input->post('password'),
								$this->input->post('user_id')
							);
				if($data['update_user'] == 1) { // Database update success, refresh page, display alert msg, clear fields
					header("Location: ".site_url('users/profile/').$id."?form1_alert=Success");
				}else { // Database update failed, display alert msg, repopulate fields
					$data['update_user'] = "Failed! Please try again.";
					$default_username = set_value('username');
					$default_email = set_value('email');
				}
			}else { // Validation failed, repopulate fields
				$default_username = set_value('username');
				$default_email = set_value('email');
			}
		}else if(null !== $this->input->post('reset')) {
			header("Location: ".site_url('users/profile/').$id."");
		}

		$username = array(
	        'type'  => 'text',
	        'name'  => 'username',
	        'value' => $default_username,
	        'placeholder' => 'Username',
		);
		$email = array(
	        'type'  => 'text',
	        'name'  => 'email',
	        'value' => $default_email,
	        'placeholder' => 'Email'
		);
		$password = array(
	        'type'  => 'password',
	        'name'  => 'password',
	        'placeholder' => 'Password'
		);
		$password2 = array(
	        'type'  => 'password',
	        'name'  => 'password2',
	        'placeholder' => 'Password confirm'
		);
		$user_id = array(
	        'type'  => 'hidden',
	        'name'  => 'user_id',
	        'value' =>  $default_id
		);
		$save = array(
	        'type'  => 'submit',
	        'name'  => 'save',
	        'value' => 'Save',
	        'class' => 'btn-link'
		);

		$this->table->add_row(array(form_open('users/update/'.$profile['id'].'').'ID', $profile['id']));
		$this->table->add_row(array('Username', form_input($username)));
		$this->table->add_row(array('Email', form_input($email)));
		$this->table->add_row(array('Password', form_input($password)));
		$this->table->add_row(array('Password', form_input($password2)));
		$this->table->add_row(array('&#x270e;', 
								anchor(site_url().'/users/profile/'.$id, 'Cancel', 'title="Cancel"')."&nbsp;&nbsp;|&nbsp;&nbsp;". 
								anchor(site_url().'/users/update/'.$id, 'Reset', 'title="Reset"')."&nbsp;&nbsp;|". 
								form_submit($save).form_input($user_id).
								form_close()
							));
		
		$template = array('table_open' => '<table class="table table-striped myTable">');
		$this->table->set_template($template);
		$data['form1'] = $this->table->generate();

		$data['breadcrumbs'] =  breadcrumbs(array('users', $default_username));
        $data['table_header'] = "";
        $data['form_header'] = $default_username;
        $data['navbar_left'] = navbar_left($this->uri->segment(1));
        
        $this->load->view('header');
        $this->load->view('generic-page', $data);
        $this->load->view('footer');
	}
}
