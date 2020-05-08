<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Simão Toco | Adicionar Membro</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>libs/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>libs/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>libs/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>libs/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>libs/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include APPPATH . 'views/includes/header.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include APPPATH . 'views/includes/header_lateral.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Adicionar Membro</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Membro</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="error" style="display: none;">
                               
                            </div>

                            <div class="card card-success data-foto form-step">
                                <div class="card-header">
                                    <h3 class="card-title">Fotografia</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" method="post" class="form-wizard" data-action="foto" id="upload-form" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="nome">Tirar Foto</label>
                                                <input name="foto-membro" type="file" class="form-control">
                                                <input name="action" type="hidden" value="foto">
                                            </div>
                                            <div class="form-group col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-right">
                                                <button type="submit" class="btn btn-primary" data-step="data-personal">Próximo</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card -->

                            <div class="card card-success data-personal form-step" style="display: none;">
                                <div class="card-header">
                                    <h3 class="card-title">Dados Pesoais</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" method="post" class="form-wizard" data-action="personal">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="nome">Identificação</label>
                                                <input name="identificacao" type="text" name="id" class="form-control">
                                                <input name="action" type="hidden" value="personal">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nome">Tipo</label>
                                                <select class="form-control select2" name="tipo_id" style="width: 100%;">
                                                    <?php foreach ($tipo_identificacao as $n) { ?>
                                                        <option value="<?= $n->id_tipo_identificacao ?>"><?= $n->descricao_tipo_identificacao ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <a href="" class="btn btn-primary" data-step="data-foto">Anterior</a>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button type="submit" class="btn btn-primary" data-step="data-other">Próximo</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card card-success data-other form-step" style="display: none;">
                                <div class="card-header">
                                    <h3 class="card-title">Outros Dados</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" method="post" class="form-wizard" data-action="other">

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="nome">Nacinalidade</label>
                                                <input name="action" type="hidden" value="other">
                                                <select name="nacionalidade" class="form-control select3" style="width: 100%;">
                                                    <?php foreach ($nacionalidades as $n) { ?>
                                                        <option value="<?= $n->id_nacionalidade ?>"><?= $n->descricao_nacionalidade ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nome">Data de nascimento</label>
                                                <input name="data_nascimento" type="date" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="nome">Estado Civil</label>
                                                <select name="estado_civil" class="form-control select2" style="width: 100%;">
                                                    <?php foreach ($estado_civil as $n) { ?>
                                                        <option value="<?= $n->id_estado_civil ?>"><?= $n->descricao_estado_civil ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nome">Endereço</label>
                                                <input name="endereco" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <a href="" class="btn btn-primary" data-step="data-personal">Anterior</a>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include APPPATH . 'views/includes/footer.php'; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>libs/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>libs/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url() ?>libs/plugins/select2/js/select2.full.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url() ?>libs/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>libs/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>libs/dist/js/wizard.js"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2();
            $('.select3').select2();
            $('.select4').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

        });
    </script>
</body>

</html>