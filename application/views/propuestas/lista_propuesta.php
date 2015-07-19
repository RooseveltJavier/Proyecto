
<?php

  echo info_msg('Lista Propuestas de Tesis');
  echo Open('form', array('action' => base_url('propuestas/crt_propuestas/get_crud_propuesta'), 'method' => 'post'));
  echo tagcontent('button', 'Cargar', array('name' => 'btnreportes', 'class' => 'btn btn-warning  col-md-1', 'id' => 'ajaxformbtn', 'type' => 'submit', 'data-target' => 'container-fluid'));
  echo Close('form');
echo tagcontent('div', '', array('id' => 'container-fluid', 'class' => 'col-md-12'));
  
 

