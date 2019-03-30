<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

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
        $data['breadcrumbs'] = breadcrumbs(array('Reports'));
        $data['navbar_left'] = navbar_left($this->uri->segment(1));
        $data['standing_loans'] = $this->Client_model->get_unpaid()->result();
         //$des=$this->Client_model->fetchDesignations()->result();
        $data['desigs']=$data['desigs']=$this->Client_model-> fetchAllDesig()->result();
        $this->load->view('header');
        $this->load->view('generic-page', $data);
        $this->load->view('reports', $data);
        $this->load->view('footer');
    }
    function blabla(){
        $data['desigs']=$this->Client_model-> fetchAllDesig()->result();
       
    }

}