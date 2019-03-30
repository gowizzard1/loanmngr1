<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investments extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Client_model');
        $this->load->helper("myHelper");

        if(null === $this->session->userdata('uid')) {
            header("Location: ".site_url('welcome?fa=1')."");
        }
    }

    public function index() {
        $data['breadcrumbs'] = breadcrumbs(array('Investments'));
        $data['navbar_left'] = navbar_left($this->uri->segment(1));
        $this->load->view('header');
        $this->load->view('generic-page', $data);
        $this->load->view('footer');
    }

}