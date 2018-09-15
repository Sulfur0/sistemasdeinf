<!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h1>
                    <a href="<?php echo base_url(); ?>index.php/">Oficina de Trabajo</a>
                </h1>
                <span>OT</span>
            </div>
            <div class="profile-bg"></div>
            <ul class="list-unstyled components">                
                <li>
                    <a href="#usuariosSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        Estudiantes
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="usuariosSubmenu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Estudiantes/create">Agregar Nuevo</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Estudiantes/view">Lista de Estudiantes</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#facultadSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        Facultades
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="facultadSubmenu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Facultad/create">Agregar Nueva</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Facultad/index">Lista de Facultades</a>
                        </li>
                    </ul>
                </li>  
                <li>
                    <a href="#ajustesSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                        Ajustes
                        <i class="fas fa-angle-down fa-pull-right"></i>
                    </a>
                    <ul class="collapse list-unstyled" id="ajustesSubmenu">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Ajustes/index">Ajustes del Sistema</a>
                        </li>                        
                    </ul>
                </li>                                            
            </ul>
        </nav>