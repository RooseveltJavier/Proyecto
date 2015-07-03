<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of crt_estudiante
 *
 * @author Usuario
 */
class crt_expediente extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('generic_model');
        $this->load->library('grocery_CRUD');
    }

    public function get_crud_expe() {
        $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms', true);
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables2');
        $crud->set_relation('id_persona','gp_persona','{nombres} {apellidos}');
        $crud->set_relation('id_periodo','gp_periodo','siglas', array('estado_periodo'=>'1'));
        
        $crud->set_table('gp_expediente');
        $crud->set_subject('Expediente');
     //   $crud->unset_add();
        $output = $crud->render();
        $this->load->view('crud/crud_view_datatable', $output);
    }
   
}
