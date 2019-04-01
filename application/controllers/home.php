<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        // $data = $this->Client_model->get_unpaid()->result();
        // var_dump($data);
        $data['breadcrumbs'] = breadcrumbs(array('home'));
        $data['navbar_left'] = navbar_left($this->uri->segment(1));
        $data['standing_loans'] = $this->Client_model->get_unpaid()->result();
         $data['officer']=$this->Client_model->fetchDesignationsOff()->result();
         $des=$this->Client_model->fetchDesignations()->result();
         $data['access']=$this->User_model->getLevels()->result();
        $data['designation']=$des;
        $this->load->view('header');
        $this->load->view('generic-page', $data);
        $this->load->view('home', $data);
        $this->load->view('footer');
    }

}