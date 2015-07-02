<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of propuesta
 *
 * @author Usuario
 */
class propuesta extends CI_Controller{
    //put your code here
    
    public function __construct() {
       parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('generic_model');
        $this->load->library('grocery_CRUD');
       // $this->user->check_session();
    }
    
    public function index() {
        $res['view'] = $this->load->view('propuestas/mod_propuesta', '', TRUE);
        $res['slidebar'] = $this->load->view('propuestas/slidebar_lte', '', TRUE);
        $this->load->view('dasboard/dashboard_lte', $res,'',TRUE);
 }
 public function new_propuesta() {
      //  $res['view'] = $this->load->view('propuestas/new_propuesta', '', TRUE);
         $res['view'] = $this->list_departamentos();
        $res['slidebar'] = $this->load->view('propuestas/slidebar_lte', '', TRUE);
        $this->load->view('dasboard/dashboard_lte', $res,'',TRUE);
 }
 public function list_departamentos() {
        $res['depar'] = $this->generic_model->get('gp_departamentos');
        $res['periodo'] = $this->generic_model->get('gp_periodo');
        
        $output = $this->load->view('propuestas/new_propuesta', $res,TRUE);
        return $output;
    }
}
