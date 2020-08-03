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
                                <h1>Emitir Relatorio</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Relatorio</a></li>
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
                                        <h3 class="card-title">Dados do Relatorio</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" method="post" action="<?=base_url()?>pagamento/gerarRelatorio">
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="form-group col-md-6">
                                                    <label for="nome">Data Inicio</label>
                                                    <input name="data_inicio" type="date" class="form-control" required="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Data Fim</label>
                                                    <input name="data_fim" type="date" class="form-control" required="">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="nome">Tipo</label>
                                                    <select name="tipo" class="form-control" style="width: 100%;">
                                                        <option value="1">Folha de Caixa</option>
                                                        <option value="2">Controle de Dizimos</option>
                                                        <option value="3">Controle de Quotas</option>
                                                        <option value="4">Movimentos Bancarios</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="card">
                                            <button type="submit" class="btn btn-success">Gerar</button>
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
