
<?php

  echo info_msg('Agregar Modulos a Usuarios');
  echo Open('form', array('action' => base_url('estudiante/crt_estudiante/get_crud_add_mod_usuarios'), 'method' => 'post'));
  echo tagcontent('button', 'Cargar', array('name' => 'btnreportes', 'class' => 'btn btn-primary  col-md-1', 'id' => 'ajaxformbtn', 'type' => 'submit', 'data-target' => 'container-fluid'));
  echo Close('form');
echo tagcontent('div', '', array('id' => 'container-fluid', 'class' => 'col-md-12'));
  
 

