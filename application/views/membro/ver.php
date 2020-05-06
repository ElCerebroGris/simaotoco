<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Simão Toco | Ver Membros</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?=base_url()?>libs/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?=base_url()?>libs/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?=base_url()?>libs/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?=base_url()?>libs/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <?php include APPPATH . 'views/includes/header.php';?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php include APPPATH . 'views/includes/header_lateral.php';?>

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
                                                 src="<?=base_url()?>libs/dist/img/user4-128x128.jpg"
                                                 alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center"><?=$membros[0]->nome_membro?></h3>

                                        <p class="text-muted text-center"><?=$membros[0]->descricao_funcao?></p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Identificação:</b> <a class="float-right"><?=$membros[0]->descricao_identificacao?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Data de nascimento:</b> <a class="float-right"><?=$membros[0]->data_nascimento?></a>
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
                                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Dados Eclesiasticos</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Documentos</a></li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="activity">
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Nome completo:</b> <a class="float-right"><?=$membros[0]->nome_membro?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Nome do Pai:</b> <a class="float-right"><?=$membros[0]->nome_pai?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Nome da Mãe:</b> <a class="float-right"><?=$membros[0]->nome_mae?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Identificação:</b> <a class="float-right"><?=$membros[0]->descricao_identificacao?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Nacionalidade:</b> <a class="float-right"><?=$membros[0]->descricao_nacionalidade?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Data de nascimento:</b> <a class="float-right"><?=$membros[0]->data_nascimento?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Estado civil:</b> <a class="float-right"><?=$membros[0]->descricao_estado_civil?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Telefone:</b> <a class="float-right"><?=$membros[0]->telefone?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Endereço:</b> <a class="float-right"><?=$membros[0]->endereco?></a>
                                                </li>
                                            </ul>

                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="timeline">
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Tribo:</b> <a class="float-right"><?=$membros[0]->descricao_tribo?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Igreja Nacional:</b> <a class="float-right"><?=$membros[0]->descricao_igreja_nacional?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Provincia Eclesiastica:</b> <a class="float-right"><?=$membros[0]->descricao_provincia_eclesiastica?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Paroquia:</b> <a class="float-right"><?=$membros[0]->descricao_paroquia?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Classe:</b> <a class="float-right"><?=$membros[0]->descricao_classe?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Data de admissão:</b> <a class="float-right"><?=$membros[0]->data_admissao?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Categoria:</b> <a class="float-right"><?=$membros[0]->descricao_categoria?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Função:</b> <a class="float-right"><?=$membros[0]->descricao_funcao?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Data de baptismo:</b> <a class="float-right"><?=$membros[0]->data_baptismo?></a>
                                                </li>
                                            </ul>
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
                                                        <?php foreach ($documentos as $u) {?>
                                                            <tr>
                                                                <td><?=$u->descricao_documento?></td>
                                                                <td><?=$u->nome_usuario?></td>
                                                                <td><?=$u->estado?></td>
                                                            </tr>
                                                        <?php }?>
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

            <?php include APPPATH . 'views/includes/footer.php';?>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="<?=base_url()?>libs/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?=base_url()?>libs/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?=base_url()?>libs/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- DataTables -->
        <script src="<?=base_url()?>libs/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?=base_url()?>libs/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
        <!-- AdminLTE App -->
        <script src="<?=base_url()?>libs/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?=base_url()?>libs/dist/js/demo.js"></script>
        <script>
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                });
            });
        </script>
    </body>
</html>
