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
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Log</a></li>
                                    <li class="breadcrumb-item active">Listar</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="container-fluid">
                     
                        <div class="row">
                            <div class="col-12">
                                <!-- Default box -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Lista de Log</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Usuário</th>
                                                    <th>Descrição</th>
                                                    <th>Data</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color:black">
                                                <?php foreach ($logs as $q) { ?>
                                                    <tr>
                                                    <td><?= $q->nome_usuario ?></td>
                                                        <td><?= $q->descricao_log ?></td>
                                                        <td><?= $q->data_criacao ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Usuário</th>
                                                    <th>Descrição</th>
                                                    <th>Data</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
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
