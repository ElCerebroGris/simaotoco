            <!-- Navbar -->
            <?php include APPPATH . 'views/includes/header.php';?>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Editar Paroquia</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Paroquia</a></li>
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
                                        <h3 class="card-title">Dados da Paroquia</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" method="post" action="<?=base_url()?>paroquia/editarPost">
                                        <div class="card-body">
                                            <div class="row">
                                                <input value="<?= $paroquias[0]->paroquia_id ?>" type="hidden" name="paroquia_id" />
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Provincia Ecliesastica</label>
                                                    <select name="provincia_eclesiastica" class="form-control select2" style="width: 100%;">
                                                        <?php foreach ($provincia_eclesiasticas as $n) {?>
                                                            <option value="<?= $n->provincia_eclesiastica_id ?>"
                                                            <?= $n->provincia_eclesiastica_id==$paroquias[0]->provincia_eclesiastica_id ? 'selected':'' ?> >
                                                            <?= $n->descricao_provincia_eclesiastica ?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Descrição</label>
                                                    <input value="<?= $paroquias[0]->descricao_paroquia ?>" name="descricao_paroquia" type="text" class="form-control" required="">
                                                </div>
                                                
                                            </div>
                                            <div class="card">
                                            <button type="submit" class="btn btn-success">Salvar</button>
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

            <?php include APPPATH . 'views/includes/footer.php';?>
