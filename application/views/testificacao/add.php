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
                                <h1>Adicionar Testificação</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Testificação</a></li>
                                </ol>
                            </div>
                        </div>
                        <?php if ($this->session->flashdata('sms') != null) { ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?= $this->session->flashdata('sms'); ?>
                            </div>
                        <?php } ?>
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
                                    <form role="form" method="post" action="<?= base_url() ?>testificacao/addPost">
                                        <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Membro a receber</label>
                                                <select name="membro" class="form-control select2" style="width: 100%;">
                                                    <?php foreach ($membros as $h) { ?>
                                                        <option value="<?= $h->membro_id ?>"><?= $h->pessoa_nome ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>DE:</label>
                                                <select id="filter2" name="origem_tipo" class="form-control select2" style="width: 100%;">
                                                        <option value="0">Selecione a Origem</option>        
                                                        <option value="1">PAROQUIA</option>
                                                        <option value="2">PROVINCIA ECLESIASTICA</option>
                                                        <option value="3">IGREJA NACIONAL</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>PARA:</label>
                                                <select id="filter3" name="destino_tipo" class="form-control select2" style="width: 100%;">
                                                        <option value="0">Selecione a Destino</option>         
                                                        <option value="1">PAROQUIA</option>
                                                        <option value="2">PROVINCIA ECLESIASTICA</option>
                                                        <option value="3">IGREJA NACIONAL</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Referencia:</label>
                                                <select id="listData2" name="origem_referencia" class="form-control select2" style="width: 100%;">
                                                        <option value="CARTÃO">...</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Referencia:</label>
                                                <select id="listData3" name="destino_referencia" class="form-control select2" style="width: 100%;">
                                                        <option value="CARTÃO">...</option>
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
