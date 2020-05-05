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
                                <form role="form" method="post" action="<?= base_url() ?>membro/addPost">

                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Fotografia</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Tirar Foto</label>
                                                    <input name="nome_membro" type="file" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card -->

                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Dados Eclasisaticos</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Tribo</label>
                                                    <select name="tribo" class="form-control select3" style="width: 100%;">
                                                        <?php foreach ($tribos as $n) { ?>
                                                            <option value="<?= $n->id_tribo ?>"><?= $n->descricao_tribo ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Igreja Nacional</label>
                                                    <select name="igreja_nacional" class="form-control select3" style="width: 100%;">
                                                        <?php foreach ($igreja_nacionais as $n) { ?>
                                                            <option value="<?= $n->id_igreja_nacional ?>"><?= $n->descricao_igreja_nacional ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Provincia Eclesiastica</label>
                                                    <select name="provincia_eclesiastica" class="form-control select3" style="width: 100%;">
                                                        <?php foreach ($provincia_eclesiasticas as $n) { ?>
                                                            <option value="<?= $n->id_provincia_eclesiastica ?>"><?= $n->descricao_provincia_eclesiastica ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Paroquia</label>
                                                    <select name="paroquia" class="form-control select3" style="width: 100%;">
                                                        <?php foreach ($paroquia as $n) { ?>
                                                            <option value="<?= $n->id_paroquia ?>"><?= $n->descricao_paroquia ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Classe</label>
                                                    <select name="classe" class="form-control select3" style="width: 100%;">
                                                        <?php foreach ($classes as $n) { ?>
                                                            <option value="<?= $n->id_classe ?>"><?= $n->descricao_classe ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Data de admissão</label>
                                                    <input name="data_admissao" type="date" class="form-control" required="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Categoria</label>
                                                    <select name="categoria" class="form-control select3" style="width: 100%;">
                                                        <?php foreach ($categorias as $n) { ?>
                                                            <option value="<?= $n->id_categoria ?>"><?= $n->descricao_categoria ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Função</label>
                                                    <select name="categoria" class="form-control select3" style="width: 100%;">
                                                        <?php foreach ($funcoes as $n) { ?>
                                                            <option value="<?= $n->id_funcao ?>"><?= $n->descricao_funcao ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Data de baptismo</label>
                                                    <input name="data_baptismo" type="date" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card -->

                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Dados Pesoais</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Nome Completo</label>
                                                    <input name="nome_membro" type="text" class="form-control" required="">
                                                </div>
                                                <div class="form-group col-md-6"></div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Nome do Pai</label>
                                                    <input name="nome_pai" type="text" class="form-control" required="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Nome da nãe</label>
                                                    <input name="nome_mae" type="text" class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Identificação</label>
                                                    <input name="identificacao" type="text" class="form-control" required="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Tipo</label>
                                                    <select name="tipo" class="form-control select2" style="width: 100%;">
                                                        <?php foreach ($tipo_identificacao as $n) { ?>
                                                            <option value="<?= $n->id_tipo_identificacao ?>"><?= $n->descricao_tipo_identificacao ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Nacinalidade</label>
                                                    <select name="nacionalidade" class="form-control select3" style="width: 100%;">
                                                        <?php foreach ($nacionalidades as $n) { ?>
                                                            <option value="<?= $n->id_nacionalidade ?>"><?= $n->descricao_nacionalidade ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Data de nascimento</label>
                                                    <input name="data_nascimento" type="date" class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Estado Civil</label>
                                                    <select name="estado_civil" class="form-control select4" style="width: 100%;">
                                                        <?php foreach ($estado_civil as $n) { ?>
                                                            <option value="<?= $n->id_estado_civil ?>"><?= $n->descricao_estado_civil ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Localidade</label>
                                                    <input name="nome" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Telefone</label>
                                                    <input name="telefone" type="text" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Endereço</label>
                                                    <input name="endereco" type="text" class="form-control">
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                            <br>
                                        </div>
                                    </div>
                                </form>
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
