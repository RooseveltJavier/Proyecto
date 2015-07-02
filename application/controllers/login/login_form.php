<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //require_once "../libraries/login/login_model.php";
class login_form extends CI_Controller
{
    
private $obj_login;
     public function __construct()
     {
          parent::__construct();
          $this->load->library('form_validation');
          $this->load->model('generic_model');
          $this->load->library('form_validation');
          
          //load the login model
          $this->load->model('login_model');
     }

     public function index()
     {
         
          //get the posted values
          $username = $this->input->post("txt_username");
          $password = $this->input->post("txt_password");

          //set validations
          $this->form_validation->set_rules("txt_username", "Username", "trim|required");
          $this->form_validation->set_rules("txt_password", "Password", "trim|required");
      
          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('login/login');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->login_model->get_user($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
                         //set the session variables
                         $sessiondata = array(
                              'username' => $username,
                              'loginuser' => TRUE
                         );
                         $this->session->set_userdata($sessiondata);
                        // $res['dat']='angel';
                        // redirect("principal/index",$res);
                         $this->vista_principal($username,$password);
                    }
                    else
                    {
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                         redirect('Welcome/index');
                    }
               }
               else
               {
                    redirect('login/login');
               }
          }
          
     }
     public function vista_principal($usu,$pass) {
          $res['name']=$usu;
          $res['pass']=$pass;
          
          $id_persona = $this->generic_model->get_val_where('gp_persona',array('usu'=>$usu, 'pass'=>$pass),'id');
         // $id_mod= $this->generic_model->get('gp_mod_persona',array('id_persona'=>$id_persona),'id_modulo');
         // $res['dat'] = $this->generic_model->get('gp_modulos',array('id'=>$id_mod),'');
          
//          $where_data = array('id_persona bf' => $id_persona);, 'bf.estado' => $estado, 'bf.empleado_vendedor' => $empleado_id, "bf.fechaCreacion between '" . $this->fecha_ini . "' and " => $this->fecha_fin);
          $where_data = array('bf.id_persona' => $id_persona);
          $join_cluase = array(
            '0' => array('table' => 'gp_modulos bc', 'condition' => 'bf.id_modulo = bc.id_mod'),
            '1' => array('table' => 'gp_persona be', 'condition' => 'bf.id_persona = be.id'));
            

        $res['dat'] = $this->generic_model->get_join(
                'gp_mod_persona bf', $where_data, $join_cluase, 'bf.*, bc.*, be.*', '');

//                 $this->load->view('dasboard/panel_control',$res);

//          $this->load->view('dasboard/dashboard_lte');
          $res['view'] = $this->load->view('login/panel_control', $res, TRUE);
          $res['slidebar'] = $this->load->view('login/slidebar_lte', '', TRUE);
          $this->load->view('login/dashboard_lte', $res,'',TRUE);
    

     }
     public function control_panel() {
         }
     
}

