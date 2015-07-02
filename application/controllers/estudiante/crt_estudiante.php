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
class crt_estudiante extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('generic_model');
        $this->load->library('grocery_CRUD');
    }

    public function get_crud_emp() {
        $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms', true);
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables2');
        $crud->set_relation('id_tipopersona','gp_tipopersona','typo_persona');
        $crud->set_relation('id_departamento','gp_departamentos','nombre_depart', array('estado_dep'=>'1'));
        
        $crud->set_table('gp_persona');
        $crud->set_subject('Estudiante');
        $output = $crud->render();
        $this->load->view('crud/crud_view_datatable', $output);
    }
    
    public function new_estudiante() {
       echo $usu = $this->input->post('usu');
       echo $pass = $this->input->post('pass');
       echo $ced_estu = $this->input->post('ced_estu');
       echo $name_estu = $this->input->post('name_estu');
       echo $app_estu = $this->input->post('app_estu');
       echo $mail_estu = $this->input->post('mail_estu');
       echo $id_persona = $this->input->post('id_persona');
       echo $id_dep = $this->input->post('id_dep');
       
        
        
        
    }

}
