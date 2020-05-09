<aside class="main-sidebar sidebar-dark-success elevation-4">
	<!-- Brand Logo -->
	<div class="">

		<a href="<?= base_url() ?>" class="brand-link navbar-success">
			<img src="<?= base_url() ?>libs/dist/img/logo.png"
			alt="Igreja Tocoista"
			class="brand-image img-circle elevation-4"
    >   
    <span class="brand-text font-weight-dark ">SGMIST</span>
 
		</a>
	</div>
		
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
                    <a href="<?= base_url() ?>welcome/dashboard" class="nav-link ">
                        <i class="nav-icon fas fa-church "></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?= base_url() ?>membro" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Membros
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?= base_url() ?>documento" class="nav-link">
                        <i class="nav-icon fas  fa-id-card"></i>
                        <p>
                            Documentos
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?= base_url() ?>pagamento" class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Pagamentos
                        </p>
                    </a>
                </li>
                <li class="nav-header">Administração</li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>log" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Logs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>usuario" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Usuários
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>classe" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Classes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>paroquia" class="nav-link">
                        <i class="nav-icon fas fa-hotel"></i>
                        <p>
                            Paroquias
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>provincia_eclesiastica" class="nav-link">
                        <i class="nav-icon fas fa-globe-africa"></i>
                        <p>
                            Provincias Eclesiasticas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>tribo" class="nav-link">
                        <i class="nav-icon fas fa-pray"></i>
                        <p>
                            Tribos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>area" class="nav-link">
                        <i class="nav-icon fas fa-pray"></i>
                        <p>
                            Area
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>igreja_nacional" class="nav-link">
                        <i class="nav-icon fas fa-sun"></i>
                        <p>
                            Igrejas Nacionais
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>nacionalidade" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Nacionalidades
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>categoria" class="nav-link">
                        <i class="nav-icon fas fa-certificate"></i>
                        <p>
                            Categorias
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>funcao" class="nav-link">
                        <i class="nav-icon fas fa-filter"></i>
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
