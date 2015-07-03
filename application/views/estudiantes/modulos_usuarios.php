<?php
echo Open('table', array('class' => "table table-striped table-condensed"));
            if ($id_cd_usu) {
                foreach ($id_cd_usu as $row) {
                    echo Open('tr');
                   $nom = $row->nombres;
                   $ape = $row->apellidos;
                    echo Close('tr');
                }
            }
            echo Close('table');
         
echo' <h3>Modulos : <br></h3>';
echo '<h3><font class="text-info">'.$nom.' '.$ape.'</font></h3>';
echo Close('table');    


echo Open('form', array('action' => base_url('estudiante/crt_estudiante/save_modu_estu'), 'method' => 'post'));
            echo input(array('type' => 'hidden', 'name' => 'id_empleado', 'id' => 'id_empleado', 'value' => $id_usu));
            
            /*envia los dias*/
            
            echo Open('table', array('class' => "table table-condensed"));
            $thead = array('Nombre Modulos');
            echo tablethead($thead);
              echo '<br>';
          
            if ($modulos) {
                foreach ($modulos as $row) {
                 //   print_r($row);
                    echo Open('tr');
                        echo Open('td',array('class'=>'info'));
                              echo $row->modulos;
                         echo Close('td');
                        echo Open('td',array('class'=>'danger')); 
                        echo input(array('type' => 'checkbox', 'name' => 'id_mod[]', 'value' => $row->id_mod));
                        echo Close('td');
                    echo Close('tr');
                }
           }
         //   echo Close('table');
            /*fin*/
echo Close('form');

echo tagcontent('button', 'Guardar', array('name' => 'btnreportes', 'class' => 'btn btn-info  col-md-1', 'id' => 'ajaxformbtn', 'type' => 'submit', 'data-target' => 'opcion_elegida'));
         
//echo tagcontent('div', '', array('id' => 'opcion_elegida', 'class' => 'col-md-12'));

