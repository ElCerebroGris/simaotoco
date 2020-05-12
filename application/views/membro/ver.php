            <!-- Navbar -->
            <?php include APPPATH . 'views/includes/header.php';?>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <?php if ($this->session->flashdata('sms') != null) {?>
                            <div class="alert alert-warning">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?=$this->session->flashdata('sms');?>
                            </div>
                        <?php }?>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Membro</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Membros</a></li>
                                    <li class="breadcrumb-item active">ver</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-3">

                                <!-- Profile Image -->
                                <div class="card card-success card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                 src="<?=base_url() . 'fotos/' . $membros->foto?>"
                                                 alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center"><?=$membros->pessoa_nome?></h3>

                                        <p class="text-muted text-center"><?=$membros->descricao_funcao?></p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Identificação:</b> <a class="float-right"><?=$membros->descricao_identificacao?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Data de nascimento:</b> <a class="float-right"><?=$membros->data_nascimento?></a>
                                            </li>
                                        </ul>
                                        <?php if ($this->session->userdata('nivel') <= 2) {?>
                                        <a target="blank" href="<?=base_url('membro/cartao/' . $membros->membro_id)?>" class="btn btn-primary btn-block"><b>Imprimir cartão</b></a>
                                        <?php }?>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-9">
                                <div class="card card">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Dados Pessoais</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Dados Eclesiasticos</a></li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="activity">
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Nome completo:</b> <a class="float-right"><?=$membros->pessoa_nome?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Nome do Pai:</b> <a class="float-right"><?=$membros->nome_pai?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Nome da Mãe:</b> <a class="float-right"><?=$membros->nome_mae?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Identificação:</b> <a class="float-right"><?=$membros->descricao_identificacao?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Nacionalidade:</b> <a class="float-right"><?=$membros->descricao_nacionalidade?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Data de nascimento:</b> <a class="float-right"><?=$membros->data_nascimento?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Estado civil:</b> <a class="float-right"><?=$membros->estado_civil?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Telefone:</b> <a class="float-right"><?=$membros->telefone?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Endereço:</b> <a class="float-right"><?=$membros->endereco?></a>
                                                </li>
                                            </ul>

                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="timeline">
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Tribo:</b> <a class="float-right"><?=$membros->descricao_tribo?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Igreja Nacional:</b> <a class="float-right"><?=$membros->descricao_igreja_nacional?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Provincia Eclesiastica:</b> <a class="float-right"><?=$membros->descricao_provincia_eclesiastica?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Paroquia:</b> <a class="float-right"><?=$membros->descricao_paroquia?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Classe:</b> <a class="float-right"><?=$membros->descricao_classe?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Data de admissão:</b> <a class="float-right"><?=$membros->data_admissao?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Categoria:</b> <a class="float-right"><?=$membros->descricao_categoria?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Função:</b> <a class="float-right"><?=$membros->descricao_funcao?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Data de baptismo:</b> <a class="float-right"><?=$membros->data_baptismo?></a>
                                                </li>
                                            </ul>
                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <?php include APPPATH . 'views/includes/footer.php';?>
