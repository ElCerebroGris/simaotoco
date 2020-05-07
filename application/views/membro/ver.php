
            <!-- Navbar -->
            <?php include APPPATH . 'views/includes/header.php'; ?>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <?php if ($this->session->flashdata('sms') != null) { ?>
                            <div class="alert alert-warning">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?= $this->session->flashdata('sms'); ?>
                            </div>
                        <?php } ?>
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
                                                 src="<?= base_url() ?>libs/dist/img/user4-128x128.jpg"
                                                 alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center"><?= $membros[0]->nome_membro ?></h3>

                                        <p class="text-muted text-center">#Cargo</p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Identificação:</b> <a class="float-right"><?= $membros[0]->descricao_identificacao ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Data de nascimento:</b> <a class="float-right"><?= $membros[0]->data_nascimento ?></a>
                                            </li>
                                        </ul>

                                        <a href="#" class="btn btn-primary btn-block"><b>Imprimir cartão</b></a>
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
                                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Paroquia</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Documentos</a></li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="activity">

                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="timeline">

                                            </div>
                                            <!-- /.tab-pane -->

                                            <div class="tab-pane" id="settings">
                                                <table id="example" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Documento</th>
                                                            <th>Usuário</th>
                                                            <th>Data</th>
                                                            <th>Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($documentos as $u) { ?>
                                                            <tr>
                                                                <td><?= $u->descricao_documento ?></td>
                                                                <td><?= $u->nome_usuario ?></td>
                                                                <td><?= $u->estado ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Documento</th>
                                                            <th>Usuário</th>
                                                            <th>Data</th>
                                                            <th>Estado</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
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

            <?php include APPPATH . 'views/includes/footer.php'; ?>
