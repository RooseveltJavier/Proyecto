
<?php

echo Open('form', array('action' => base_url('estudiante/crt_estudiante/new_estudiante'), 'method' => 'post'));
    echo Open('div',array('class'=>'col-md-12'));
        echo warning_msg('Usuario y Clave para el acceso al sistema');
         echo Open('div',array('class'=>'col-md-4 form-group'));
                 echo Open('div',array('class'=>'input-group'));
                     echo tagcontent('span','<b>Usuario</b>: ', array('class'=>'input-group-addon'));
                     echo input(array('type' => 'text', 'name' => 'usu', 'id' => 'usu','placeholder'=>'Usuario', 'class' => 'form-control'));
                 echo Close('div');
         echo Close('div');
         echo Open('div',array('class'=>'col-md-4 form-group'));
                 echo Open('div',array('class'=>'input-group'));
                     echo tagcontent('span','<b>Password</b>: ', array('class'=>'input-group-addon'));
                     echo input(array('type' => 'password', 'name' => 'pass', 'id' => 'pass','placeholder'=>'********', 'class' => 'form-control'));
                 echo Close('div');
         echo Close('div');
        echo Close('div');
    
   
      echo Open('div',array('class'=>'col-md-12'));
        echo success_info_msg('Datos Complementarios');
         echo Open('div',array('class'=>'col-md-4 form-group'));
                 echo Open('div',array('class'=>'input-group'));
                     echo tagcontent('span','<b>Dni/Pasaporte</b>: ', array('class'=>'input-group-addon'));
                     echo input(array('type' => 'text', 'name' => 'ced_estu', 'id' => 'ced_estu','placeholder'=>'Digete el NªIdent.', 'class' => 'form-control'));
                 echo Close('div');
         echo Close('div');
    
        echo Open('div',array('class'=>'col-md-4 form-group'));
                 echo Open('div',array('class'=>'input-group'));
                     echo tagcontent('span','<b>Nombre</b>: ', array('class'=>'input-group-addon'));
                     echo input(array('type' => 'text', 'name' => 'name_estu', 'id' => 'name_estu','placeholder'=>'Digete el Nombre', 'class' => 'form-control'));
                 echo Close('div');
         echo Close('div');
    
         echo Open('div',array('class'=>'col-md-4 form-group'));
                 echo Open('div',array('class'=>'input-group'));
                     echo tagcontent('span','<b>Apellido</b>: ', array('class'=>'input-group-addon'));
                     echo input(array('type' => 'text', 'name' => 'app_estu', 'id' => 'app_estu','placeholder'=>'Digete el Apellido', 'class' => 'form-control'));
                 echo Close('div');
         echo Close('div');
         
         echo Open('div',array('class'=>'col-md-4 form-group'));
                 echo Open('div',array('class'=>'input-group'));
                     echo tagcontent('span','<b>Correo</b>: ', array('class'=>'input-group-addon'));
                     echo input(array('type' => 'text', 'name' => 'mail_estu', 'id' => 'mail_estu','placeholder'=>'Digete el M@il', 'class' => 'form-control'));
                 echo Close('div');
         echo Close('div');
        $tiposrango_combo = combobox($tipo, array('label'=>'typo_persona','value'=>'id_typ'), array('name'=>'id_persona','class'=>'form-control'), true);
        echo Open('div',array('class'=>'col-md-4 form-group'));
            echo Open('div',array('class'=>'input-group'));
                echo tagcontent('span', '<b>Tipo Persona:</b> ', array('class'=>'input-group-addon'));
                echo $tiposrango_combo;
            echo Close('div');
        echo Close('div');  

        $tiposdepar_combo = combobox($depar, array('label'=>'nombre_depart','value'=>'id_dep'), array('name'=>'id_dep','class'=>'form-control'), true);
        echo Open('div',array('class'=>'col-md-4 form-group'));
            echo Open('div',array('class'=>'input-group'));
                echo tagcontent('span', '<b>Departamento:</b> ', array('class'=>'input-group-addon'));
                echo $tiposdepar_combo;
            echo Close('div');
        echo Close('div');  

    echo Close('div'); 

    echo tagcontent('button', 'Calcular', array('name' => 'btnreportes', 'class' => 'btn btn-success  col-md-1', 'id' => 'ajaxformbtn', 'type' => 'submit', 'data-target' => 'opcion_elegida'));
    echo Close('form');

    echo tagcontent('div', '', array('id' => 'opcion_elegida', 'class' => 'col-md-6'));
