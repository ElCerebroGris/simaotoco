            <!-- Navbar -->
            <?php include APPPATH . 'views/includes/header.php'; ?>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <?php if ($this->session->flashdata('sms') != null) { ?>
                            <div class="callout callout-success alert alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?= $this->session->flashdata('sms'); ?>
                            </div>
                        <?php } ?>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <?php if ($this->session->userdata('nivel') == 1) { ?>
                                    <h5 class="mb-2">
                                        <a href="<?= base_url() ?>provincia_eclesiastica/add" class="btn btn-outline-success btn-sm">Adicionar</a>
                                    </h5>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Provincias Eclesiasticas</a></li>
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
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Lista de Provincias Eclesiasticas</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped table-sm table-f-s-2">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Código</th>
                                                    <th>Igreja Nacional</th>
                                                    <th>Representante</th>
                                                    <th>Estado</th>
                                                    <th>Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color:black">
                                                <?php foreach ($provincia_eclesiasticas as $q) { ?>
                                                    <tr>
                                                        <td><?= $q->descricao_provincia_eclesiastica ?></td>
                                                        <td><?= $q->codigo ?></td>
                                                        <td><?= $q->descricao_igreja_nacional ?></td>
                                                        <td><?= $q->representante_id ?></td>
                                                        <?php if ($q->estado_provincia_eclesiastica == 0) {?>
                                                            <td>Desativado</td>
                                                        <?php } else { ?>
                                                            <td>Ativado</td>
                                                        <?php } ?>
                                                        <td class="text-center" width="20%">
                                                            <?php if ($q->estado_provincia_eclesiastica == 0) { ?>
                                                                <a href="<?= base_url('provincia_eclesiastica/ativar/' . $q->provincia_eclesiastica_id) ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                                            <?php } else { ?>
                                                                <a href="<?= base_url('provincia_eclesiastica/desativar/' . $q->provincia_eclesiastica_id) ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-eye-slash"></i></a>

                                                                <a href="<?= base_url('provincia_eclesiastica/editar/' . $q->provincia_eclesiastica_id) ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i></a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Código</th>
                                                    <th>Igreja Nacional</th>
                                                    <th>Estado</th>
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