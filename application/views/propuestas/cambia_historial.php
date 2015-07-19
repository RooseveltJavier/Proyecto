<?php
echo Open('table', array('class' => "table table-striped table-condensed"));
            if (!empty($historial)) {
                foreach ($historial as $row) {
                    echo Open('tr');
                  $id_propuesta=$row->id_p;
                   $nom = $row->nombres;
                   $ape = $row->apellidos;
                   $email = $row->email;
                   $titulo = $row->titulo;
                   $contenido = $row->contenido;
                   $estado = $row->valor;
                   $fecha = $row->fecha_post;
                   $depar = $row->nombre_depart;
                   
                    echo Close('tr');
                }
            }
            echo Close('table');
            
            
         
echo info_msg('Historial de Propuesta');
echo '<h5><font class="text-info">'.$nom.' '.$ape.'</font></h5>';
echo Close('table');    


            echo Open('table', array('class' => "table table-striped table-condensed"));
            
               $thead = array('Propuesta Realizada');
            echo tablethead($thead);
                echo Open('tr');
                    echo Open('td');
                        echo '<h5><font class="text-success">TITULO</font></h5>'; 
                    echo Close('td');
                    echo Open('td');
                        echo $titulo; 
                    echo Close('td');  
                echo Close('tr');  
                
                echo Open('tr');
                    echo Open('td');
                        echo '<h5><font class="text-success">CONTENIDO</font></h5>'; 
                    echo Close('td');
                    echo Open('td');
                        echo $contenido; 
                    echo Close('td');  
                echo Close('tr');
                
                echo Open('tr');
                    echo Open('td');
                        echo '<h5><font class="text-success">DEPARTAMENTO</font></h5>'; 
                    echo Close('td');
                    echo Open('td');
                        echo $depar; 
                    echo Close('td');  
                echo Close('tr');
                
                echo Open('tr');
                    echo Open('td');
                        echo '<h5><font class="text-success">ESTADO</font></h5>'; 
                    echo Close('td');
                    echo Open('td');
                        echo $estado; 
                    echo Close('td');  
                echo Close('tr');
                
                echo Open('tr');
                    echo Open('td');
                        echo '<h5><font class="text-success">FECHA PUBLICACION</font></h5>'; 
                    echo Close('td');
                    echo Open('td');
                        echo $fecha; 
                    echo Close('td');  
                echo Close('tr');
                
            echo Close('table');    
 
            if(!empty($get_hist)){
                echo Open('table', array('class' => "table table-striped table-condensed"));
                $thead = array('Cambios Realizados');
                echo tablethead($thead);

                foreach ($get_hist as $val) {
                echo Open('tr');
                    echo Open('td');
                        echo '<h5><font class="text-success">OBSERVACIONES</font></h5>'; 
                    echo Close('td');
                    echo Open('td');
                        echo $val->historial; 
                    echo Close('td');  
                echo Close('tr');  
                
                               
                echo Open('tr');
                    echo Open('td');
                        echo '<h5><font class="text-success">ESTADO</font></h5>'; 
                    echo Close('td');
                    echo Open('td');
                        echo $val->id_estado; 
                    echo Close('td');  
                echo Close('tr');
                
                echo Open('tr');
                    echo Open('td');
                        echo '<h5><font class="text-success">FECHA OBSERVACION</font></h5>'; 
                    echo Close('td');
                    echo Open('td');
                        echo $val->fecha_cambio; 
                    echo Close('td');  
                echo Close('tr');
                
                
           
                }
                 echo Close('table');    
 
            }
           // echo $id_propuesta;
           // echo $email;
            
 echo Open('form', array('action' => base_url('propuestas/crt_propuestas/save_historial'), 'method' => 'post'));
  echo input(array('type' => 'hidden', 'name' => 'id_pro', 'id' => 'id_pro', 'value' => $id_propuesta));
  echo input(array('type' => 'hidden', 'name' => 'email', 'id' => 'email', 'value' => $email));
  echo input(array('type' => 'hidden', 'name' => 'nombre', 'id' => 'nombre', 'value' => $nom));
            
            echo warning_msg('OBSERVACIONES');
            echo Open('div',array('class'=>'col-md-12'));
             echo Open('div',array('class'=>'col-md-4 form-group'));
                    echo Open('div',array('class'=>'input-group'));
                        echo tagcontent('span',' Fecha Observacion: ', array('class'=>'input-group-addon'));
                        echo input(array('name'=>"fechaIn",'id'=>"fechaIn", 'type'=>"text",'class'=>"form-control datepicker",'placeholder'=>"Fecha Cambio"));
                    echo Close('div');
                echo Close('div');
                
             $estados_combo = combobox($estados, array('label'=>'valor','value'=>'valor'), array('name'=>'estado','class'=>'form-control'), true);
                echo Open('div',array('class'=>'col-md-4 form-group'));
                    echo Open('div',array('class'=>'input-group'));
                        echo tagcontent('span', '<b>Estados:</b> ', array('class'=>'input-group-addon'));
                        echo $estados_combo;
                    echo Close('div');
                echo Close('div'); 
                
         $textarea=  tagcontent('textarea', '', array('class' => 'form-control', 'rows' => '8', 'placeholder' => 'Observaciones/Cambios en la tesis', 'name' => 'razon','id'=>'razon'));
         echo tagcontent('div', $textarea, array('id' => 'textarea', 'class' => 'col-md-12'));
         // echo Close('div'); 
echo Close('form');

echo tagcontent('button', 'Notificar', array('name' => 'btnreportes', 'class' => 'btn btn-info  col-md-1', 'id' => 'ajaxformbtn', 'type' => 'submit', 'data-target' => 'container-fluid'));
         
//echo tagcontent('div', '', array('id' => 'container-fluid', 'class' => 'col-md-12'));

