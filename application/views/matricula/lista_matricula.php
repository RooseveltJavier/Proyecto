
<?php

  echo info_msg('Listar  Matriculaciones de Usuarios ');
  echo Open('form', array('action' => base_url('matriculacion/crt_matricula/get_crud_matricula'), 'method' => 'post'));
  echo tagcontent('button', 'Cargar', array('name' => 'btnreportes', 'class' => 'btn btn-info  col-md-1', 'id' => 'ajaxformbtn', 'type' => 'submit', 'data-target' => 'container-fluid'));
  echo Close('form');
echo tagcontent('div', '', array('id' => 'container-fluid', 'class' => 'col-md-12'));
  
 

