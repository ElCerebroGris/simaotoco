            <!-- Navbar -->
            <?php include APPPATH . 'views/includes/header.php'; ?>
            <!-- /.navbar -->
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
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Dados</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" method="post" action="<?= base_url() ?>usuario/addPost">
                                        <div class="card-body">
                                        <div class="row">
                                        <div class="form-group col-md-6">
                                                <label>Tipo de Documento</label>
                                                <select name="tipo_documento" class="form-control select2" style="width: 100%;">
                                                    <?php foreach ($tipo_documento as $h) { ?>
                                                        <option value="<?= $h->id_tipo_documento ?>"><?= $h->descricao_tipo_documento ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Membro a receber</label>
                                                <select name="membro" class="form-control select2" style="width: 100%;">
                                                    <?php foreach ($membros as $h) { ?>
                                                        <option value="<?= $h->id_membro ?>"><?= $h->nome_membro ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            </div>
                                            
                                            <div class="card">
                                            <button type="submit" class="btn btn-success">Salvar</button>
                                        </div>
                                        </div>
                                                    </div>
                                        <!-- /.card-body -->

                                       
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
