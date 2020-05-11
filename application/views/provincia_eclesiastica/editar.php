            <!-- Navbar -->
            <?php include APPPATH . 'views/includes/header.php';?>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                    <?php if ($this->session->flashdata('sms') != null) {?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?=$this->session->flashdata('sms');?>
                            </div>
                        <?php }?>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Editar Provincia Eclesiastica</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Provincia Eclesiastica</a></li>
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
                                        <h3 class="card-title">Dados da Provincia Eclesiastica</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" method="post" action="<?=base_url()?>provincia_eclesiastica/editarPost">
                                        <div class="card-body">
                                            <div class="row">
                                                <input value="<?= $provincia_eclesiasticas[0]->provincia_eclesiastica_id ?>" 
                                                type="hidden" name="provincia_eclesiastica_id" />
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Igreja Nacional</label>
                                                    <select name="igreja_nacional" class="form-control select2" style="width: 100%;">
                                                        <?php foreach ($igreja_nacionais as $n) {?>
                                                            <option value="<?= $n->igreja_nacional_id ?>"
                                                            <?= $n->igreja_nacional_id==$provincia_eclesiasticas[0]->igreja_nacional_id ? 'selected':'' ?>
                                                            ><?= $n->descricao_igreja_nacional ?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Descrição</label>
                                                    <input value="<?= $provincia_eclesiasticas[0]->descricao_provincia_eclesiastica ?>" name="descricao_provincia_eclesiastica" type="text" class="form-control" required="">
                                                </div>
                                                <div class="form-group col-md-6">
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
