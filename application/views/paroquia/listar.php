
            <!-- Navbar -->
            <?php include APPPATH . 'views/includes/header.php'; ?>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <?php if ($this->session->flashdata('sms') != null) { ?>
                            <div class="alert alert-warning">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?= $this->session->flashdata('sms'); ?>
                            </div>
                        <?php } ?>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            <?php if ($this->session->userdata('nivel') == 1) { ?>
                            <h5 class="mb-2">
                                <a href="<?= base_url() ?>paroquia/add" class="btn btn-outline-primary btn-sm	">Adicionar</a>
                            </h5>
                        <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Paroquias</a></li>
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
                                        <h3 class="card-title">Lista de Paroquias</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Provincia Eclesiastica</th>
                                                    <th>Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color:black">
                                                <?php foreach ($paroquias as $q) { ?>
                                                    <tr>
                                                    <td><?= $q->descricao_paroquia ?></td>
                                                        <td><?= $q->descricao_provincia_eclesiastica ?></td>
                                                        
                                                        <td class="text-center" width="20%">
                                                            <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                                            <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fa fa-eye-slash"></i></a>
                                                            <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Provincias Nacionais</th>
                                                    <th>Opções</th>
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
