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
                                        <a href="<?= base_url() ?>pagamento/add" class="btn btn-outline-primary btn-sm	">Novo</a>
                                        <a href="<?= base_url() ?>pagamento/addCaixa" class="btn btn-outline-primary btn-sm	">Nova Despesa/Receita</a>
                                        <a target="blank" href="<?= base_url() ?>pagamento/relatorios" class="btn btn-outline-primary btn-sm	">Relatorios</a>
                                    </h5>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Pagamentos</a></li>
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
                                        <h3 class="card-title">Lista de Pagamentos</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Tipo</th>
                                                    <th>Membro</th>
                                                    <th>Usuário</th>
                                                    <th>Data</th>
                                                    <th>Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color:black">
                                                <?php foreach ($pagamentos as $q) { ?>
                                                    <tr>
                                                        <td><?= $q->tipo_pagamento ?></td>
                                                        <td><?= $q->pessoa_nome ?></td>
                                                        <td><?= $q->nome_usuario ?></td>
                                                        <td><?= $q->data_criacao ?></td>
                                                        <td>
                                                        <a target="blank" href="<?= base_url('pagamento/recibo/'.$q->pagamento_id) ?>" 
                                                                class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Tipo</th>
                                                    <th>Membro</th>
                                                    <th>Usuário</th>
                                                    <th>Data</th>
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