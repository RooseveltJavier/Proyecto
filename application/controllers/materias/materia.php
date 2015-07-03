<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of principal
 *
 * @author Usuario
 */
class Materia extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('generic_model');
        $this->load->library('grocery_CRUD');
       // $this->user->check_session();
    }
    
    public function index() {
        $res['view'] = $this->load->view('materias/mod_materia', '', TRUE);
        $res['slidebar'] = $this->load->view('materias/slidebar_lte', '', TRUE);
        $this->load->view('dasboard/dashboard_lte', $res,'',TRUE);
        
 }
 public function get_crud() {
      $res['view'] = $this->load->view('materias/lista_complementos', '', TRUE);
        $res['slidebar'] = $this->load->view('materias/slidebar_lte', '', TRUE);
        $this->load->view('dasboard/dashboard_lte', $res, '', TRUE);
 }
  


}
