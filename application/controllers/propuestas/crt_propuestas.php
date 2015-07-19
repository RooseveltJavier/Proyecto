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
        $res['titulo'] = $this->input->post('title');
        $res['razon'] = $this->input->post('razon');

        $res['id_dep'] = $this->generic_model->get('gp_departamentos', array('id_dep' => $this->input->post('id_dep')), '');
        $res['id_periodo'] = $this->generic_model->get('gp_periodo', array('id_per' => $this->input->post('id_periodo')), '');

        $res['propuesta'] = $this->generic_model->get('gp_estados');

        $res['datos_emp'] = $this->generic_model->get('gp_persona', array('cedula' => $this->input->post('emp_id')), '');
        $id_tipo = $this->generic_model->get_val_where('gp_persona', array('cedula' => $this->input->post('emp_id')), 'id_tipopersona');
        $res['tipo_usu'] = $this->generic_model->get_val_where('gp_tipopersona', array('id_typ' => $id_tipo), 'typo_persona');


        $id_emp = $this->generic_model->get_val_where('gp_persona', array('cedula' => $this->input->post('emp_id')), 'id');

        $id_matricula = $this->generic_model->get_val_where('gp_matricula', array('id_persona' => $id_emp), 'id_materia');
        $nom_materia = $this->generic_model->get_val_where('gp_materias', array('id' => $id_matricula), 'nombre_materia');
        $id_expe = $this->generic_model->get_val_where('gp_expediente', array('id_persona' => $id_emp), 'nro_creditos');

        if (($nom_materia == 'GP PLATINUM 4_1') OR ( $nom_materia == 'GP PLATINUM 4_2')OR ( $id_expe >= 200)):
            $this->load->view('propuestas/preview_tema', $res);
            echo tagcontent('script', 'alertaExito("Exito....!!!")');
        else:
            echo tagcontent('script', 'alertaError("No se pudo subir su tesis....!!!")');
        endif;
    }

    public function save_tesis_usu() {
        $title = $this->input->post('titulo');
        $contenido = $this->input->post('razon');
        $fechaIn = $this->input->post('fechaIn');
        $id_periodo = $this->input->post('periodo');
        $id_departamento = $this->input->post('departamento');
        $id_persona = $this->input->post('id_usu');
        $id_estado = $this->input->post('estado');
        $email = $this->input->post('email');

        $get_data = array(
            'titulo' => $title,
            'contenido' => $contenido,
            'id_periodo' => $id_periodo,
            'id_departamento' => $id_departamento,
            'id_persona' => $id_persona,
            'fecha_sys' => date("Y-m-d"),
            'hora_sys' => date("H:i:s"),
            'id_estado' => $id_estado,
            'fecha_post' => $fechaIn);
        $this->generic_model->save($get_data, 'gp_propuesta');
    }

    public function get_crud_propuesta() {
        $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms', true);
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables2');
        $crud->set_relation('id_periodo', 'gp_periodo', 'siglas');
        $crud->set_relation('id_departamento', 'gp_departamentos', 'nombre_depart', array('estado_dep' => '1'));
        $crud->set_relation('id_persona', 'gp_persona', '{nombres} {apellidos}');
        $crud->display_as('id_periodo', 'Periodo')
                ->display_as('id_departamento', 'Departamento')
                ->display_as('id_persona', 'Usuario')
        ;

        // $crud->set_relation('id_persona', 'gp_tipopersona', 'typo_persona');
        //$crud->set_relation('id_estado', 'gp_estados', 'valor');
        $crud->callback_column('estado', array($this, 'color_estado'));
        $crud->callback_column('tipo_persona', array($this, 'tipo_persona'));
        $crud->callback_column('asignacion_tutor', array($this, 'asigna_tutor'));
        $crud->callback_column('tutor', array($this, 'view_tutor'));
        $crud->callback_column('historial', array($this, 'get_historial'));


        $cols = array('titulo', 'contenido', 'id_periodo', 'id_departamento', 'id_persona', 'tipo_persona', 'fecha_post', 'estado', 'tutor', 'asignacion_tutor', 'historial');
        $crud->columns2($cols);
        $crud->set_table('gp_propuesta');
        $crud->set_subject('Tesis');
        $crud->unset_add()->unset_delete()->unset_edit();
        $output = $crud->render();
        $this->load->view('crud/crud_view_datatable', $output);
    }

    public function get_historial($value, $row) {
        /* Mostrar e historial de la propuesta */
        $dato = tagcontent('a', '<font size=1px><span> Ver Historial</span></font>', array('id' => 'ajaxpanelbtn', 'data-url' => base_url('propuestas/crt_propuestas/get_historial_report/' . $row->id_p), 'data-target' => 'container-fluid', 'href' => '#', 'title' => 'Asignacion de Jornadas al Empleado'));
        return $dato;
    }

    public function asigna_tutor($value, $row) {
        $dato = tagcontent('a', '<font size=1px><span> Asignar Tutor</span></font>', array('id' => 'ajaxpanelbtn', 'data-url' => base_url('propuestas/crt_propuestas/get_agina_tutor/' . $row->id_p), 'data-target' => 'container-fluid', 'href' => '#', 'title' => 'Asignacion de Jornadas al Empleado'));
        return $dato;
    }

    public function view_tutor($value, $row) {
        $tutor = $this->generic_model->get_val_where('gp_asignar_propuesta', array('id_propuesta' => $row->id_p), 'id_persona');
        $nom = $this->generic_model->get_val_where('gp_persona', array('id' => $tutor), 'nombres');
        // $ape = $this->generic_model->get_val_where('gp_persona',array('id'=>$tutor),'apellidos');
        $tutor_asig = '';
        if ($nom != -1):

            //$tutor_asig = $nom.' '. $ape;
            $tutor_asig = $nom;
        else:
            $tutor_asig = '<font color=red>No tiene Asignado un Tutor aun</font>';

        endif;
        return $tutor_asig;
    }

    public function get_agina_tutor($id) {
        $res['id_propuesta'] = $id;
        $res['persona'] = $this->generic_model->get('gp_persona');
        $res['tipo_persona'] = $this->generic_model->get('gp_tipopersona');
        $res['depar'] = $this->generic_model->get('gp_departamentos');
        $this->load->view('propuestas/asgina_pro', $res);
    }

    public function get_historial_report($id) {
        /* sirve para sacar el historial y unir tablas que contien la tabla propuesta */
        $where_data = array('bf.id_p' => $id);
        $join_cluase = array(
            '0' => array('table' => 'gp_periodo bc', 'condition' => 'bf.id_periodo = bc.id_per'),
            '1' => array('table' => 'gp_departamentos be', 'condition' => 'bf.id_departamento = be.id_dep'),
            '2' => array('table' => 'gp_persona bvt', 'condition' => 'bf.id_persona = bvt.id'),
            '3' => array('table' => 'gp_estados bvta', 'condition' => 'bf.id_estado = bvta.id_estado'));


        $res['historial'] = $this->generic_model->get_join(
                'gp_propuesta bf', $where_data, $join_cluase, 'bf.*, bc.*, be.*, bvt.*, bvta.*', '');

        $res['get_hist'] = $this->generic_model->get_data('gp_historial', array('id_propuesta' => $id), '');
        $res['estados'] = $this->generic_model->get('gp_estados');
        $this->load->view('propuestas/cambia_historial', $res);
// 
    }

    public function save_historial() {
        $email = $this->input->post('email');
        $id_propuesta = $this->input->post('id_pro');
        $fecha_cambio = $this->input->post('fechaIn');
        $estado = $this->input->post('estado');
        $obser = $this->input->post('razon');
        $usuario = $this->input->post('nombre');

        if ($obser != '' and $id_propuesta > 0 and $estado != '') {
            $get_save = array(
                "historial" => $obser,
                "id_propuesta" => $id_propuesta,
                "fecha_cambio" => $fecha_cambio,
                "id_estado" => $estado,
            );
            //   $this->generic_model->save($get_save, 'gp_historial');
            echo tagcontent('script', 'alertaExito("Registro con exito....!!!")');
        } else {
            echo tagcontent('script', 'alertaError("No admite datos vacios....!!!")');
        }

        //$this->load->library("class.phpmailer");
        require_once('lib_php_mail/lib_php_mail/class.phpmailer.php');
        require_once("lib_php_mail/lib_php_mail/class.smtp.php");
//        require_once("PHPMailer/class.phpmailer.php");
//        require_once("PHPMailer/class.smtp.php");
        
        $mensaje ='hola mundo';
        $para = 'angelvcuenca@gmail.com';
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
       // $mail->SMTPSecure = 'ssl';
       $mail->SMTPSecure = 'tsl';
       
       // $mail->SMTPDebug = 1;
        $mail->Host = 'smtp.gmail.com';
     
        $mail->Port = 587;
       // $mail->Port = 465;
        $mail->FromName = 'SecureService';
        $mail->From = 'secureservicecompany@gmail.com';
        //Nuestra cuenta
        $mail->Username = 'secureservicecompany@gmail.com';
        $mail->Password = 'securemaster'; //Su password
        //Agregar destinatario
        $mail->AddAddress($para);
        $mail->Subject = 'Certificado SecureService';
        $mail->Body = $mensaje;
        //Para adjuntar archivo
        // $mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
        $mail->IsHTML($mensaje);
      //  $mail->Send();
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }

//        $mail = new PHPMailer();
//        $mail->IsSMTP();
//        $mail->CharSet = "UTF-8";
//        $mail->SMTPAuth = true;
//        $mail->SMTPSecure = 'ssl';
//        $mail->Host = 'smtp.gmail.com';
//        $mail->Port = 465;
//        
//        $mail->Username = 'angelvcuenca@gmail.com';
//        $mail->Password = 'angel1104133648';
//        
//       
//        $mail->From = 'angelvcuenca@gmail.com';
//        $mail->FromName = 'Mohammad Masoudian';
//        $mail->AddAddress('angelvcuenca@gmail.com');
//        $mail->Subject = "PHPMailer Test Subject via Sendmail, basic";
//        //$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
//        $mail->Body = "Hello";
//
//        if (!$mail->Send()) {
//            echo "Mailer Error: " . $mail->ErrorInfo;
//        } else {
//            echo "Message sent!";
//        }
    }

    public function save_tutor() {
        $id_persona = $this->input->post('id_persona');
        $id_propuesta = $this->input->post('id_pro');

        if (!empty($id_persona)) {
            foreach ($id_persona as $val) {

                $get_save = array(
                    "id_propuesta" => $id_propuesta,
                    "id_persona" => $val,
                    "fecha_asignado" => date("y-m-s")
                );
                $this->generic_model->save($get_save, 'gp_asignar_propuesta');
                echo tagcontent('script', 'alerta'
                        . 'Exito("Ingreso de Jornadas  con exito....!!!")');
            }
        }
        $this->get_crud_propuesta();
    }

    public function tipo_persona($value, $row) {

        $id_tipo_persona = $this->generic_model->get_val_where('gp_persona', array('id' => $row->id_persona), 'id_tipopersona');
        $tipo_persona = $this->generic_model->get_val_where('gp_tipopersona', array('id_typ' => $id_tipo_persona), 'typo_persona');
        return $tipo_persona;
    }

    public function color_estado($value, $row) {
        $id = $row->id_estado;
        $color_dat = $this->generic_model->get_val_where('gp_estados', array('id_estado' => $id), 'valor');
        if ($color_dat == 'revisado'):
            $estado = "<span class='label label-success'>REVISADO</span>";
        else:
            if ($color_dat == 'anulado'):
                $estado = "<span class='label label-danger'>ANULADO</span>";
            else:
                if ($color_dat == 'pendiente'):
                    $estado = "<span class='label label-primary'>PENDIENTE</span>";

                endif;
            endif;
        endif;

        return $estado;
    }

}
