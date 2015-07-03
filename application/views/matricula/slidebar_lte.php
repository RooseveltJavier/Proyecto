      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <?php
                echo $this->load->view('login/user_logo','',TRUE);
            ?>
          </div>
          

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!--<li class="header" id="client_name">CLIENTE:</li>-->
          <?php
            if(!empty($slidebar_actions)){
                echo $slidebar_actions;
            }
          ?>
            <li class="header">MATRICULACION DE USUARIOS</li>
            
<!--                <li> 
                    <a href="<?= base_url('estudiante/estudiantes/new_estudiante') ?>"><i class="glyphicon glyphicon-hand-up"></i>Ingresar Usuario</a> 
                </li>
                <li> 
                    <a href="<?= base_url('estudiante/estudiantes/add_mod_usuarios') ?>"><i class="glyphicon glyphicon-hand-up"></i>Agregar Modulos a Usuario</a> 
                </li>
                -->
                <li> 
                    <a href="<?= base_url('matriculacion/matricula/get_crud') ?>"><i class="glyphicon glyphicon-hand-up"></i>Expediente Academico</a> 
                </li>
          
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>