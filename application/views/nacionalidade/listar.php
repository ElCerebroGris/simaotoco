
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
                                <a href="<?= base_url() ?>nacionalidade/add" class="btn btn-outline-success btn-sm">Adicionar</a>
                            </h5>
                        <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Nacionalidades</a></li>
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
                                        <h3 class="card-title">Lista de Nacionalidades</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped table-sm table-f-s-2">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>País</th>
                                                    <th>Estado</th>
                                                    <th>Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color:black">
                                                <?php foreach ($nacionalidades as $q) { ?>
                                                    <tr>
                                                        <td><?= $q->descricao_nacionalidade ?></td>
                                                        <td><?= $q->pais ?></td>
                                                        <?php if ($q->estado_nacionalidade == 0) {?>
                                                            <td>Desativado</td>
                                                        <?php } else {?>
                                                            <td>Ativado</td>
                                                        <?php }?>
                                                        <td class="text-center" width="20%">
                                                            <?php if ($q->estado_nacionalidade == 0) {?>
                                                                <a href="<?= base_url('nacionalidade/ativar/'.$q->nacionalidade_id) ?>" 
                                                                class="btn btn-outline-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                                            <?php } else {?>
                                                                <a href="<?= base_url('nacionalidade/desativar/'.$q->nacionalidade_id) ?>" 
                                                                class="btn btn-outline-secondary btn-sm"><i class="fa fa-eye-slash"></i></a>

                                                                <a href="<?= base_url('nacionalidade/editar/'.$q->nacionalidade_id) ?>" 
                                                                class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit"></i></a>
                                                            <?php }?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>País</th>
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