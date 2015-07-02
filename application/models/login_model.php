<?php
Class Login_model extends CI_Model
{
 function login($username, $password)
 {

    $query = $this->db->query('SELECT em.id, em.cedula cedulausu, em.usu username,
	em.nombres nombres, em.apellidos apellidos,em.essuperusuario essuperusuario ,em.email email
	FROM  gp_persona em
    	WHERE em.usu = "' . $username . '" AND em.pass = "' . $password . '"');
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}


//if (!defined('BASEPATH'))
//    exit('No direct script access allowed');
//
//class login_model extends CI_Model {
//
//    private $ci = NULL;
//
//    function __construct() {
//         $this->ci = & get_instance();
//        parent::__construct();
//
//        $this->ci->load->model('generic_model');
//    }
//    function login_s($username, $password) {
//        $this->ci->db->select('em.id, em.cedula cedulausu, em.usu username,
//	em.nombres nombres, em.apellidos apellidos,em.essuperusuario essuperusuario ,em.email email');
//        $this->ci->db->from('gp_persona em');
//        $this->ci->db->where('em.usu', $username);
//        $this->ci->db->where('em.pass', $password);
//        $query = $this->ci->db->get();
//        if ($query->num_rows() == 1) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }
//
//    function login($username, $password) {
////WHERE em.usu = "' . $username . '" AND em.pass = "' . MD5($password . get_settings('PASSWORDSALTMAIN')) . '"');
//        
//        $query = $this->ci->db->query('SELECT em.id, em.cedula cedulausu, em.usu username,
//	em.nombres nombres, em.apellidos apellidos,em.essuperusuario essuperusuario ,em.email email
//	FROM  gp_persona em
//    	WHERE em.usu = "' . $username . '" AND em.pass = "' . $password . '"');
//        
//        if ($query->num_rows() == 1) {
//            return $query->result();
//        } else {
//            return false;
//        }
//    }
//
//}
