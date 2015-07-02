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
class Estudiantes extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('generic_model');
        $this->load->library('grocery_CRUD');
       // $this->user->check_session();
    }
    
    public function index() {
        $res['view'] = $this->load->view('estudiantes/mod_estudiante', '', TRUE);
        $res['slidebar'] = $this->load->view('estudiantes/slidebar_lte', '', TRUE);
        $this->load->view('dasboard/dashboard_lte', $res,'',TRUE);
        
 }
 public function new_estudiante() {
       $res['view'] = $this->list_persona();
       $res['slidebar'] = $this->load->view('estudiantes/slidebar_lte', '', TRUE);
       $this->load->view('dasboard/dashboard_lte', $res,'',TRUE);
  }
  
     public function list_persona() {
        $res['tipo'] = $this->generic_model->get('gp_tipopersona');
        $res['depar'] = $this->generic_model->get('gp_departamentos');
        $output = $this->load->view('estudiantes/new_estudiante', $res,TRUE);
        return $output;
    }
    public function get_crud() {
    //    $this->load->view('estudiantes/slidebar_lte');
        $res['view'] = $this->load->view('estudiantes/lista_estudiantes', '', TRUE);
        $res['slidebar'] = $this->load->view('estudiantes/slidebar_lte', '', TRUE);
        $this->load->view('dasboard/dashboard_lte', $res, '', TRUE);
 }
}
