<?php
echo Open('table', array('class' => "table table-striped table-condensed"));
            if (!empty($persona)) {
                foreach ($persona as $row) {
                    echo Open('tr');
                   $nom = $row->nombres;
                   $ape = $row->apellidos;
                    echo Close('tr');
                }
            }
            echo Close('table');
         
echo info_msg('Agregar Tutor');
echo '<h3><font class="text-info">'.$nom.' '.$ape.'</font></h3>';
echo Close('table');    


echo Open('form', array('action' => base_url('propuestas/crt_propuestas/save_tutor'), 'method' => 'post'));
  echo input(array('type' => 'hidden', 'name' => 'id_pro', 'id' => 'id_pro', 'value' => $id_propuesta));
            
            echo Open('table', array('class' => "table table-striped table-condensed"));
            $thead = array('Usuario', 'Tipo Usuario', 'Departamento','Op');
            echo tablethead($thead);
              echo '<br>';
              
          
            if (!empty($persona)) {
                foreach ($persona as $row) {
                    foreach ($tipo_persona as $val) {
                        foreach ($depar as $value) {
                            if($row->id_tipopersona == $val->id_typ and $val->id_typ==4):
                                if($row->id_departamento==$value->id_dep):
                                        echo Open('tr');
                                        echo tagcontent('td', $row->nombres);
                                        echo tagcontent('td', $val->typo_persona);
                                        echo tagcontent('td', $value->nombre_depart);
                                        echo Open('td');
                                        echo input(array('type' => 'checkbox', 'name' => 'id_persona[]', 'value' => $row->id));
                                        echo Close('td');
                                        echo Close('tr');
                                endif;
                                
                        endif;
                        }
                        
                    }
                   
                }
           }
         //   echo Close('table');
            /*fin*/
echo Close('form');

echo tagcontent('button', 'Guardar', array('name' => 'btnreportes', 'class' => 'btn btn-info  col-md-1', 'id' => 'ajaxformbtn', 'type' => 'submit', 'data-target' => 'container-fluid'));
         
//echo tagcontent('div', '', array('id' => 'container-fluid', 'class' => 'col-md-12'));

