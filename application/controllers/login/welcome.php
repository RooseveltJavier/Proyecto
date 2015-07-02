<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

   

    function __construct() {
        parent::__construct();
         $this->load->library('form_validation');
          $this->load->model('generic_model');
          $this->load->library('form_validation');
          $this->load->library('user');
          $this->load->model('login_model');
          
    }

    public function index() {

        if ($this->session->userdata('userid')) {

            $session_data = $this->session->userdata('userid');

           // $this->session->set_userdata($sessiondata);
           // $where_data = array('bf.id_persona' => 1);
           $where_data = array('bf.id_persona' => $this->user->id);
            
            $join_cluase = array(
                '0' => array('table' => 'gp_modulos bc', 'condition' => 'bf.id_modulo = bc.id_mod'),
                '1' => array('table' => 'gp_persona be', 'condition' => 'bf.id_persona = be.id'));
            $res['dat'] = $this->generic_model->get_join(
                    'gp_mod_persona bf', $where_data, $join_cluase, 'bf.*, bc.*, be.*', '');
            $res['view'] = $this->load->view('login/panel_control', $res, TRUE);
            $res['slidebar'] = $this->load->view('login/slidebar_lte', '', TRUE);
            $this->load->view('dasboard/dashboard_lte', $res, '', TRUE);
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
            redirect('Welcome/index');
        }
    }

    function index_S() {
        if ($this->session->userdata('userid')) {

            $session_data = $this->session->userdata('userid');
            //   $id_persona = $this->generic_model->get_val_where('gp_persona', array('usu' => $usu, 'pass' => $pass), 'id');
            $where_data = array('bf.id_persona' => $this->user->id);
            $join_cluase = array(
                '0' => array('table' => 'gp_modulos bc', 'condition' => 'bf.id_modulo = bc.id_mod'),
                '1' => array('table' => 'gp_persona be', 'condition' => 'bf.id_persona = be.id'));
            $res['dat'] = $this->generic_model->get_join(
                    'gp_mod_persona bf', $where_data, $join_cluase, 'bf.*, bc.*, be.*', '');
            $res['view'] = $this->load->view('login/panel_control', $res, TRUE);
            $res['slidebar'] = $this->load->view('login/slidebar_lte', '', TRUE);
            $this->load->view('login/dashboard_lte', $res, '', TRUE);


//            $join_cluase = array(
//                '0' => array('table' => 'billing_capacidad c', 'condition' => 'ec.Capacidades_capacidad = c.capacidad')
//            );
//            $res['assignedrole'] = $this->generic_model->get_join('billing_empleadocapacidad ec', array('ec.empleado_id' => $this->user->id), $join_cluase, $fields = 'ec.empleado_id, ec.Capacidades_capacidad, c.capacidad capacidad, ec.fecha, c.interno, c.acceso, c.ubicacion, c.tabid label');
//
//
            foreach ($res['assignedrole'] as $r) {
                $permiso = $r->capacidad;
                $this->session->set_userdata($permiso, 1);
            }
//
//            $res1['view'] = $this->load->view('welcome_message', $res, TRUE);
//            $res['view'] = $this->load->view('common/templates/dashboard_lte', $res1);
//     $this->load->view('welcome_message',$res);
        } else {
            //If no session, redirect to login page
            redirect(base_url('login'));
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login/welcome');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */