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
                            <h5 class="mb-2">
                                <a href="<?=base_url()?>correspondencia/listar" class="btn btn-outline-primary btn-sm  ">Listar Correspondencias</a>
                            </h5>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Correspondencia</a></li>
                                </ol>
                            </div>
                        </div>
                        <?php if ($this->session->flashdata('sms') != null) {?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?=$this->session->flashdata('sms');?>
                            </div>
                        <?php }?>
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
                                        <h3 class="card-title">Nova Correspondencia</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" method="post" enctype="multipart/form-data" action="<?=base_url()?>correspondencia/addPost">
                                        <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputFile">Documento:</label>

                                                <div class="input-group">
                                                <input type="file" name="doc" id="doc">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                            </div>
                                        </div>

                                        <div class="row">
                                        <div class="form-group col-md-6">
                                                <label>Para:</label>
                                                <select id="filter4" data-url="<?=base_url()?>" name="destino_tipo" class="form-control select2" style="width: 100%;">
                                                        <option value="0">Selecione a Destino</option>
                                                        <option value="1">PAROQUIA</option>
                                                        <option value="2">PROVINCIA ECLESIASTICA</option>
                                                        <option value="3">IGREJA NACIONAL</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Referencia:</label>
                                                <select id="listData4" name="destinos[]" class="form-control select2" 
                                                multiple="multiple" data-placeholder="Seleciona os destinos" style="width: 100%;">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Observações:</label>
                                                <textarea class="form-control" name="obs" rows="3"></textarea>
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

            <?php include APPPATH . 'views/includes/footer.php';?>
