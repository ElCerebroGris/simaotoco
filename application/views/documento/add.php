<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Simão Toco | Adicionar Documento</title>
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
                                <h1>Adicionar Documento</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Documento</a></li>
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
                            <div class="col-md-6">
                                <!-- general form elements -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Dados</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" method="post" action="<?= base_url() ?>usuario/addPost">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Tipo de Documento</label>
                                                <select name="tipo_documento" class="form-control select2" style="width: 100%;">
                                                    <?php foreach ($tipo_documento as $h) { ?>
                                                        <option value="<?= $h->id_tipo_documento ?>"><?= $h->descricao_tipo_documento ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Membro a receber</label>
                                                <select name="membro" class="form-control select2" style="width: 100%;">
                                                    <?php foreach ($membros as $h) { ?>
                                                        <option value="<?= $h->id_membro ?>"><?= $h->nome_membro ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </form>
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
        
        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2();
                $('.select22').select2();

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                });

            });
        </script>
    </body>
</html>
