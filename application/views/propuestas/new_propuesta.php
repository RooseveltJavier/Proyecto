<?php



echo info_msg('<h3>Generar una Nueva Propuesta de Tesis</h3>');
    echo '<br>';
    echo Open('form', array('action' => base_url('propuestas/crt_propuestas/ingresa_tema'), 'method' => 'post'));
        $a='<font color=red size= 3>*</font>';
        echo '<font color=brown>Llene la Ficha con la  Informacion Requeridad</font><br><h5>Campos Obligatorios marcados por un asterisco '.'('.$a.')'.'</h5>';
        echo '<br>';
            echo warning_msg('Detalles Particulares');
            echo Open('div',array('class'=>'col-md-12'));
                echo Open('div',array('class'=>'col-md-4 form-group'));
                    echo Open('div',array('class'=>'input-group'));
                        echo tagcontent('span',$a.'  Identificacion. : ', array('class'=>'input-group-addon'));
                        echo input(array('type' => 'text', 'name' => 'emp_id', 'id' => 'emp_id', 'placeholder' => 'Escriba su identificacion', 'class' => 'form-control'));
                    echo Close('div');
                echo Close('div'); 

                echo Open('div',array('class'=>'col-md-4 form-group'));
                    echo Open('div',array('class'=>'input-group'));
                        echo tagcontent('span', $a.' Fecha Publicacion: ', array('class'=>'input-group-addon'));
                        echo input(array('name'=>"fechaIn",'id'=>"fechaIn", 'type'=>"text",'class'=>"form-control datepicker",'placeholder'=>"Fecha Publicacion"));
                    echo Close('div');
                echo Close('div'); 

                $tiposdepar_combo = combobox($depar, array('label'=>'nombre_depart','value'=>'id_dep'), array('name'=>'id_dep','class'=>'form-control'), true);
                echo Open('div',array('class'=>'col-md-4 form-group'));
                    echo Open('div',array('class'=>'input-group'));
                        echo tagcontent('span', '<b>Departamento:</b> ', array('class'=>'input-group-addon'));
                        echo $tiposdepar_combo;
                    echo Close('div');
                echo Close('div'); 
                $periodos_combo = combobox($periodo, array('label'=>'fecha_periodo','value'=>'id_perido'), array('name'=>'id_periodo','class'=>'form-control'), true);
                echo Open('div',array('class'=>'col-md-4 form-group'));
                    echo Open('div',array('class'=>'input-group'));
                        echo tagcontent('span', '<b>Periodo Academico:</b> ', array('class'=>'input-group-addon'));
                        echo $periodos_combo;
                    echo Close('div');
                echo Close('div'); 
            echo Close('div'); 
            
            
            echo warning_msg('Detalles de la Tesis');
            echo Open('div',array('class'=>'col-md-12'));
                echo Open('div',array('class'=>'col-md-4 form-group'));
                    echo Open('div',array('class'=>'input-group'));
                        echo tagcontent('span',$a.'Titulo : ', array('class'=>'input-group-addon'));
                        echo input(array('type' => 'text', 'name' => 'title', 'id' => 'title', 'placeholder' => 'Escriba titulo de  la tesis', 'class' => 'form-control'));
                    echo Close('div');
                echo Close('div'); 

                $textarea = tagcontent('textarea', '', array('class' => 'form-control', 'rows' => '8', 'placeholder' => 'Razones por la cuales plantea la tesis', 'name' => 'razon','id'=>'razon'));
                echo tagcontent('div', $textarea, array('id' => 'textarea', 'class' => 'col-md-12'));
                echo Close('div');
            echo Close('div');
            echo lineBreak(1);
        echo tagcontent('button', 'Continuar >>', array('name' => 'btnreportes', 'class' => 'btn btn-success  col-md-0', 'id' => 'ajaxformbtn', 'type' => 'submit', 'data-target' => 'opcion_elegida'));
         
        echo Close('form');
   
    
    echo tagcontent('div', '', array('id' => 'opcion_elegida', 'class' => 'col-md-12'));
 