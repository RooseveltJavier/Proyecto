<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('generic_model');
     //   $this->load->library('grocery_CRUD');
    }

    public function index()
	{       
          //      $res['dato']=  $this->generic_model->get('prueba');
            	$this->load->view('login/login_view_2');
	}
}
