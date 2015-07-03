
<?php

  echo info_msg('Listar Periodos Academicos');
  echo Open('form', array('action' => base_url('periodosacad/crt_periodo/get_crud_emp'), 'method' => 'post'));
  echo tagcontent('button', 'Cargar', array('name' => 'btnreportes', 'class' => 'btn btn-info  col-md-1', 'id' => 'ajaxformbtn', 'type' => 'submit', 'data-target' => 'container-fluid'));
  echo Close('form');
echo tagcontent('div', '', array('id' => 'container-fluid', 'class' => 'col-md-12'));
  
 

