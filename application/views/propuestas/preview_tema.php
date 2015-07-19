<?php
 if ($id_dep) {
                foreach ($id_dep as $row) {
                    echo Open('tr');
                   $departamento = $row->nombre_depart;
                   $id_dep = $row->id_dep;
                    echo Close('tr');
                }
            }
             if ($id_periodo) {
                foreach ($id_periodo as $row) {
                    echo Open('tr');
                   $periodo = $row->siglas;
                   $id_perio = $row->id_perido;
                    echo Close('tr');
                }
            }
            if ($propuesta) {
                foreach ($propuesta as $row) {
                    if($row->valor=='pendiente'):
                        $estado = $row->id_estado;
                        $estado_view = $row->valor;
                    
                    
                    endif;
                   
                 }
            }
            
echo lineBreak2(2);
echo info_msg('Visualizacion de la Propuesta publicada');

echo Open('table', array('class' => "table table-striped table-condensed"));
            if ($datos_emp) {
                foreach ($datos_emp as $row) {
                    echo Open('tr');
                   $nom = $row->nombres;
                   $ape = $row->apellidos;
                   $id_usu = $row->id;
                   $email = $row->email;
                   
                    echo Close('tr');
                }
            }
            echo Close('table');
            
 echo '<h4><font class="text-danger">'.$tipo_usu.': </font><font class="text-info">'.$nom.' '.$ape.'</font></h4>';
echo Open('form', array('action' => base_url('propuestas/crt_propuestas/save_tesis_usu'), 'method' => 'post'));
            echo input(array('type' => 'hidden', 'name' => 'id_usu', 'id' => 'id_usu', 'value' => $id_usu));
            echo input(array('type' => 'hidden', 'name' => 'email', 'id' => 'email', 'value' => $email));

echo Open('div',array('class'=>'col-md-4'));
    echo Open('table', array('class' => "table table-condensed"));
                $thead = array('Nombre Modulos');
                 tablethead($thead);
                  echo '<br>';
                  
                  echo Open('tr');
                    echo Open('td',array('class'=>'danger'));
                    echo '<font color = brown ><b> TITULO</b></font>';
                    echo Close('td');
                    echo Open('td',array('class'=>'info'));
                    echo $titulo;
                    echo input(array('type' => 'hidden', 'name' => 'titulo', 'id' => 'titulo', 'value' => $titulo));

                    echo Close('td');
                  echo Close('tr');
 
                  echo Open('tr');
                    echo Open('td',array('class'=>'danger'));
                    echo '<font color = brown ><b> CONTENIDO</b></font>';
                    echo Close('td');
                    echo Open('td',array('class'=>'info'));
                    echo $razon;
                    echo input(array('type' => 'hidden', 'name' => 'razon', 'id' => 'razon', 'value' => $razon));

                    echo Close('td');
                  echo Close('tr');
                  
                   echo Open('tr');
                    echo Open('td',array('class'=>'danger'));
                    echo '<font color = brown ><b> ESTADO</b></font>';
                    echo Close('td');
                    echo Open('td',array('class'=>'info'));
                    echo $estado_view;
                    echo input(array('type' => 'hidden', 'name' => 'estado', 'id' => 'estado', 'value' => $estado));

                    echo Close('td');
                  echo Close('tr');
                  
                  echo Open('tr');
                    echo Open('td',array('class'=>'danger'));
                    echo '<font color = brown ><b> FECHA DE PUBLICACION</b></font>';
                    echo Close('td');
                    echo Open('td',array('class'=>'info'));
                    echo $fechaIn;
                    echo input(array('type' => 'hidden', 'name' => 'fechaIn', 'id' => 'fechaIn', 'value' => $fechaIn));

                    echo Close('td');
                  echo Close('tr');

                  echo Open('tr');
                    echo Open('td',array('class'=>'danger'));
                    echo '<font color = brown ><b> DEPARTAMENTO</b></font>';
                    echo Close('td');
                    echo Open('td',array('class'=>'info'));
                    echo $departamento;
                    echo input(array('type' => 'hidden', 'name' => 'departamento', 'id' => 'departamento', 'value' => $id_dep));

                    echo Close('td');
                  echo Close('tr');
                  
                   echo Open('tr');
                    echo Open('td',array('class'=>'danger'));
                    echo '<font color = brown ><b> PERIODO ACADEMICO</b></font>';
                    echo Close('td');
                    echo Open('td',array('class'=>'info'));
                    echo $periodo;
                    echo input(array('type' => 'hidden', 'name' => 'periodo', 'id' => 'periodo', 'value' => $id_perio));

                    echo Close('td');
                  echo Close('tr');
                  
    
echo Close('div');
echo Close('form');
echo tagcontent('button', 'Guardar', array('name' => 'btnreportes', 'class' => 'btn btn-info  col-md-2', 'id' => 'ajaxformbtn', 'type' => 'submit', 'data-target' => 'opcion'));
echo tagcontent('div', '', array('id' => 'opcion', 'class' => 'col-md-12'));
echo Close('div');