            <!-- Navbar -->
            <?php include APPPATH . 'views/includes/header.php'; ?>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <?php if ($this->session->flashdata('sms') != null) { ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?= $this->session->flashdata('sms'); ?>
                            </div>
                        <?php } ?>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Editar Lema</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Lema</a></li>
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
                                        <h3 class="card-title">Descrição do Lema</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" method="post" action="<?= base_url() ?>lema/editarPost">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-2">
                                                    <label for="nome">Ano</label>
                                                    <input value="<?= $lema[0]->id ?>" type="hidden" name="lema_id" />
                                                    <select name="ano" class="form-control">
                                                        <?php for ($year = (int) date('Y'); 2000 <= $year; $year--) : ?>
                                                            <option value="<?= $year ?>" <?= ($lema[0]->ano == $year) ? 'selected' : '' ?>><?= $year ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <label for="nome">Lema</label>
                                                    <input name="lema" value="<?= $lema[0]->lema ?>" type="text" class="form-control" required="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="nome">Estado <sup>(opcional)</sup></label>
                                                    <input name="status" type="checkbox" <?= ($lema[0]->status == 0) ? '' : 'checked' ?> class="form-control" style="width: 20px !important;">
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

            <?php include APPPATH . 'views/includes/footer.php'; ?>