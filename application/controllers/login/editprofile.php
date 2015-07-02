<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editprofile extends MX_Controller {

    private $res_message = '';
 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   /* Obtenemos los datos del cliente que vamos a editar el perfil */  
   $user = $this->generic_model->get_data( 
            'billing_empleado', 
            array('id'=>$this->user->id), 
            $fields = 'nombres, apellidos, email, telefonos, celular, username, clave', 
            null, 
            1 
           );
   $res1['user'] = $user;  
   $res['view'] = $this->load->view('edit_profile',$res1,TRUE);   
   $res['slidebar'] = $this->load->view('slidebar','',TRUE);   
   $this->load->view('common/templates/dashboard',$res);
 }
 
 public function edit() {
   $this->load->library('form_validation');

   $this->form_validation->set_rules( 'nombres', 'Nombres', 'trim|required|xss_clean' );
   $this->form_validation->set_rules( 'apellidos', 'Apellidos', 'trim|required|xss_clean' );
   $this->form_validation->set_rules( 'email', 'E-mail', 'trim|required|xss_clean' );
   $this->form_validation->set_rules( 'telefonos', 'Telefonos', 'trim|required|xss_clean' );
   $this->form_validation->set_rules( 'celular', 'Celular', 'trim|required|xss_clean' );
   $this->form_validation->set_rules( 'username', 'Usuario', 'trim|required|xss_clean' );
   $this->form_validation->set_error_delimiters('<br /><span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->res_message = validation_errors();
//              echo tagcontent('script', "window.location.replace('".  base_url('user_conf/editprofile/index')."')");
        } else {
            $data_set = array(
                'nombres'=>set_value('nombres'),
                'apellidos'=>set_value('apellidos'),
                'email'=>set_value('email'),
                'telefonos'=>set_value('telefonos'),
                'celular'=>set_value('celular'),
                'username'=>set_value('username')
            );
            $res = $this->generic_model->update( 
                'billing_empleado', 
                $data_set, 
                array('id'=>$this->user->id)
            );
            
            if($res){
                $this->res_message = success_msg(', usuario Modificado.');
            }
        }
        
        echo $this->res_message;
 }
  
 public function edit_pass() {
   $this->load->library('form_validation');

   $this->form_validation->set_rules( 'current_pass', 'Clave Actual', 'trim|required|xss_clean' );
   $this->form_validation->set_rules( 'new_pass', 'Nueva Clave', 'trim|required|xss_clean' );
   $this->form_validation->set_rules( 'confirm_pass', 'Confirme Nueva Clave', 'trim|required|xss_clean' );

   $this->form_validation->set_error_delimiters('<br /><span class="text-danger">', '</span>');
   
   $form_validation = $this->form_validation->run();   
   
        if ($form_validation == FALSE) // validation hasn't been passed
        {
            $this->res_message = validation_errors();
//              echo tagcontent('script', "window.location.replace('".  base_url('user_conf/editprofile/index')."')");
        } else {
            $form_validation2 = $this->check_current_pass();            
            $form_validation = $this->confirm_pass();

            if($form_validation AND $form_validation2){
                $data_set = array(
                    'clave'=> md5(set_value('new_pass').get_settings('PASSWORDSALTMAIN'))
                );
                $res = $this->generic_model->update( 
                    'billing_empleado', 
                    $data_set, 
                    array('id'=>$this->user->id)
                );

                if($res){
                    $this->res_message .= success_msg(', clave actualizada.');
                }                
            }else{
                $this->res_message .= validation_errors();
            }

        }
        
        echo $this->res_message;
 }

	public function confirm_pass()
	{
            $new_pass = $this->input->post('new_pass');
            $confirm_pass = $this->input->post('confirm_pass');
		if ($new_pass != $confirm_pass) {
			$this->res_message .= warning_msg('No coincide la confirmaci&oacute;n de la clave.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
        
	public function check_current_pass()
	{
            $current_pass = $this->input->post('current_pass');
            $user = $this->generic_model->get_data( 
                     'billing_empleado', 
                     array('id'=>$this->user->id), 
                     $fields = 'clave', 
                     null, 
                     1 
                    );
            
		if ($user->clave != md5($current_pass.  get_settings('PASSWORDSALTMAIN'))) {
			$this->res_message .= warning_msg('La clave actual ingresada no coicide con la clave del usuairo.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	} 
        
        /* Verificamos la existencia del usuario */
	public function check_exist_user($ci_ruc)
	{
            $exist = $this->generic_model->count_all_results('billing_empleado', array('id'=>$ci_ruc) );            
		if ($exist > 0) {
			return TRUE;
		}
		else
		{
			return FALSE;
		}            
	}
        
}