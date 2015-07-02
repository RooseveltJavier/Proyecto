<?php
    echo  Open('body',array('class'=>''));
    
    echo  Open('div', array('class'=>'container','style'=>'margin-top:15px'));
        $base_path = base_url();
        $activemodule = 0;
        $allcapabilities = $this->user->getAllCapabilities();
        foreach ( $allcapabilities as $tab) {
            /* Solo cuando son modulos, ya que tambien pueden ser cargos(permisos)*/
            if($tab->tipo == 'module' AND $tab->estaActiva == 1){
                $uritab = '';
                    if($tab->ubicacion != ''){ $uritab = $tab->ubicacion; }
                    if($tab->interno == 1){ $base_path = base_url();
                    }else{ $base_path = ''; }
                    
                if($tab->acceso == 'noregistered'  && empty($this->user->userid) || !empty($this->user->userid) && $this->user->essuperusuario == 1){                                                            
                    $activemodule = 1;
                    echo get_item_f1($tab->capacidadview, base_url().$tab->ubicacion, '<span style="font-size:10px">'.$tab->descripcion.'<span>', 'Abrir Modulo', $tab->icon.'  ', 'small-box bg-primary');
                continue;
                }elseif( $tab->acceso == 'all' || ($tab->acceso == 'registered' && !empty($this->user->userid)) ){
                    $activemodule = 1;
                    echo get_item_f1($tab->capacidadview, base_url().$tab->ubicacion, '<span style="font-size:10px">'.$tab->descripcion.'<span>',  'Abrir Modulo', $tab->icon.'  ', 'small-box bg-green');
                continue;
                }elseif(!empty($this->user->userid)){ // enrolled
//                    echo 'Paso x aqui';
                    $cap = $tab->capacidad;
                        if($this->session->userdata($cap)){
                            echo get_item_f1($tab->capacidadview, base_url().$tab->ubicacion, '<span style="font-size:10px">'.$tab->descripcion.'<span>',  'Abrir Modulo', $tab->icon.'  ', 'small-box bg-green');
                        continue;
                        }
                }
               if($activemodule == 0){
                   echo get_item_f1($tab->capacidadview, '#', '<span style="font-size:10px">'.$tab->descripcion.'<span>',  'Abrir Modulo', $tab->icon.'  ', 'small-box bg-yellow');
               }
            }
        }    
        
//        echo tagcontent('div', '<strong style="font-size:20px">Otros M&oacute;dulos Disponibles</strong>', array('class'=>'text-success col-md-12'));
        $otros_modulos = $this->generic_model->get_data(
                    'billing_capacidad', 
                    array('estaActiva'=>'0', 'tipo'=>'module'),
                    'capacidad, UPPER(capacidad) capacidadview, descripcion, imagen, ubicacion, tabid label, interno, acceso, tipo, icon, estaActiva'
                );
        
                foreach ($otros_modulos as $tab) {
                    echo get_item_f1($tab->capacidadview, 'https://www.masterpc.com.ec', '<span style="font-size:10px">'.$tab->descripcion.'<span>',  'Comprar Modulo', $tab->icon.'  ', 'small-box bg-red', 'col-lg-3 col-xs-6');    
                }
        
    echo  closeTag('div');
    
