<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of crt_propuestas
 *
 * @author Sammy Guergachi <sguergachi at gmail.com>
 */
class crt_propuestas extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
          $this->load->library('form_validation');
        $this->load->model('generic_model');
        $this->load->library('grocery_CRUD');
    }

    public function ingresa_tema() {
        $res['emp_id'] = $this->input->post('emp_id');
        $res['fechaIn'] = $this->input->post('fechaIn');
        $res['id_dep'] = $this->input->post('id_dep');
        $res['id_periodo'] = $this->input->post('id_periodo');
        $res['titulo'] = $this->input->post('title');
        $res['razon'] = $this->input->post('razon');
        $res['datos_emp'] = $this->generic_model->get('gp_persona', array('cedula' => $this->input->post('emp_id')), '');
        $this->load->view('propuestas/preview_tema', $res);
    }

}
