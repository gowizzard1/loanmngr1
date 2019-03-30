<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('User_model');
    }

    public function index() {

    }
}
        