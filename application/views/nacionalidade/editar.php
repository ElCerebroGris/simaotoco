
            <!-- Navbar -->
            <?php include APPPATH . 'views/includes/header.php'; ?>
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
                                <h1>Editar Nacionalidade</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Nacionalidade</a></li>
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
                                        <h3 class="card-title">Dados da Nacionalidade</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" method="post" action="<?= base_url() ?>nacionalidade/editarPost">
                                        <div class="card-body">
                                            <div class="row">
                                                <input value="<?= $nacionalidades[0]->nacionalidade_id ?>" type="hidden" name="nacionalidade_id" />
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Nome do País</label>
                                                    <input value="<?= $nacionalidades[0]->pais ?>" name="pais" type="text" class="form-control" required="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Descrição</label>
                                                    <input value="<?= $nacionalidades[0]->descricao_nacionalidade ?>" name="descricao_nacionalidade" type="text" class="form-control" required="">
                                                </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card">
                                            <button type="submit" class="btn btn-success">Salvar</button>
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
