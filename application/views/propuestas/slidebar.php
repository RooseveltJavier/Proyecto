        <div class="navbar-defaults sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        </div>
                        <!-- /input-group -->
                    </li>

                   <li> 
                    <a href="<?= base_url('propuestas/propuesta/new_propuesta') ?>"><i class="glyphicon glyphicon-hand-up"></i>Nueva Propuesta</a> 
                </li>
                <li> 
                    <a href="<?= base_url('propuestas/propuesta/get_crud') ?>"><i class="glyphicon glyphicon-hand-up"></i>Listar Propuestas Existentes</a> 
                </li>              

                </ul>
            </div>
                        <!-- /.sidebar-collapse -->
        </div>
            <!-- /.navbar-static-side -->