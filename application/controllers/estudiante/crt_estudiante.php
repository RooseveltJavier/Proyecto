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
        $crud->unset_add();
        $output = $crud->render();
        $this->load->view('crud/crud_view_datatable', $output);
    }
    public function get_crud_add_mod_usuarios() {
         $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms', true);
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables2');
        $crud->set_relation('id_tipopersona','gp_tipopersona','typo_persona');
        $crud->set_relation('id_departamento','gp_departamentos','nombre_depart', array('estado_dep'=>'1'));
        $crud->set_relation_n_n( 'modulos', 'gp_mod_persona', 'gp_modulos', 'id_persona', 'id_modulo', 'modulos' );
                        
        $crud->set_table('gp_persona');
      //   $crud->callback_column('modulos', array($this, 'view_modulos'));
          $crud->callback_column('add_modulos', array($this, 'add_modulos'));
        $columns=array('cedula','nombres','apellidos','id_tipopersona','id_departamento', 'modulos','add_modulos');
        $crud->columns2($columns);
        $crud->set_subject('Estudiante');
        $crud->unset_add()->unset_delete()->unset_edit();
        $output = $crud->render();
        $this->load->view('crud/crud_view_datatable', $output);
    }
    
    public function add_modulos($value, $row) {
       $dato = tagcontent('a', '<span> Asignar Modulos</span>', array('id' => 'ajaxpanelbtn', 'data-url' => base_url('estudiante/crt_estudiante/get_asigna_modulos/' . $row->id), 'data-target' => 'container-fluid', 'href' => '#', 'title' => 'Asignacion Modulos a Usuarios'));
        return $dato;
    }
    public function get_asigna_modulos($id) {
        $res['modulos'] = $this->generic_model->get('gp_modulos');
        $res['id_usu'] = $id;
        $res['id_cd_usu'] = $this->generic_model->get('gp_persona', array('id' => $id), 'nombres, apellidos');

        $this->load->view('estudiantes/modulos_usuarios', $res);
    }
    public function save_modu_estu() {
        $id_mod = $this->input->post('id_mod');
        $id_empleado = $this->input->post('id_empleado');
        echo '<br>';
        if (!empty($id_mod)) {
            foreach ($id_mod as $row) {

                $get_save = array("id_persona" => $id_empleado, "id_modulo" => $row);
              //  echo $id_empleado . '-' . $row . '<br>';
                $this->generic_model->save($get_save, 'gp_mod_persona');
            }
        }
        echo tagcontent('script', 'alertaExito("Registro con exito....!!!")');
        $this->get_crud_add_mod_usuarios();
    }
    public function new_estudiante() {
        $usu = $this->input->post('usu');
        $pass = $this->input->post('pass');
        $ced_estu = $this->input->post('ced_estu');
        $name_estu = $this->input->post('name_estu');
        $app_estu = $this->input->post('app_estu');
        $mail_estu = $this->input->post('mail_estu');
        $id_persona = $this->input->post('id_persona');
        $id_dep = $this->input->post('id_dep');
       
       $datos = array (
           'cedula'=>$ced_estu,
           'nombres'=>$name_estu,
           'apellidos'=>$app_estu,
           'usu'=>$usu,
           'pass'=>  md5($pass),
           'email'=>$mail_estu,
           'id_tipopersona'=>$id_persona,
           'id_departamento'=>$id_dep,
           'fecha'=>date("Y-m-d"),
           'time'=>date("H:i:s"),
           );
       $this->generic_model->save($datos,'gp_persona');
       
        echo tagcontent('script', 'alertaExito("Registro con exito....!!!")');
       
       
        
    }

}
