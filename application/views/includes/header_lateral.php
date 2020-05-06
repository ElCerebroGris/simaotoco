<aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url() ?>libs/dist/img/AdminLTELogo.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">SIMÃO TOCO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>libs/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url() ?>usuario/perfil" class="d-block"><?= $this->session->userdata('nome_completo') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url() ?>welcome/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?= base_url() ?>membro" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Membros
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?= base_url() ?>documento" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Documentos
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?= base_url() ?>pagamento" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Pagamentos
                        </p>
                    </a>
                </li>
                <li class="nav-header">Administração</li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>usuario" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Usuários
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>classe" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Classes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>paroquia" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Paroquias
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>provincia_eclesiastica" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Provincias Eclesiasticas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>tribo" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tribos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>igreja_nacional" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Igrejas Nacionais
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>nacionalidade" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Nacionalidades
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>categoria" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Categorias
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>funcao" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Funções
                        </p>
                    </a>
                </li>    
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>