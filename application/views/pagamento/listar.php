            <!-- Navbar -->
            <?php include APPPATH . 'views/includes/header.php';?>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <?php if ($this->session->flashdata('sms') != null) {?>
                            <div class="callout callout-success alert alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?=$this->session->flashdata('sms');?>
                            </div>
                        <?php }?>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <?php if ($this->session->userdata('nivel') == 1) {?>
                                    <h5 class="mb-2">
                                        <a href="<?=base_url()?>pagamento/addCaixa" class="btn btn-outline-primary btn-sm	">Novo</a>
                                        <a target="blank" href="<?=base_url()?>pagamento/relatorios" class="btn btn-outline-primary btn-sm	">Relatorios</a>
                                        <a href="<?=base_url()?>pagamento/tipos" class="btn btn-outline-primary btn-sm	">Gestão de Tipos</a>
                                    </h5>
                                <?php }?>
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
                                                    <th>Operação</th>
                                                    <th>Tipo</th>
                                                    <th>Membro</th>
                                                    <th>Valor</th>
                                                    <th>Data</th>
                                                    <th>Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color:black">
                                                <?php foreach ($pagamentos as $q) {?>
                                                    <tr>
                                                        <td><?=$q->tipo?></td>
                                                        <td><?=$q->descricao?></td>
                                                        <td><?=$q->pessoa_nome?></td>
                                                        <td><?=$q->valor . ' ' . $q->moeda?></td>
                                                        <td><?=$q->data_criacao?></td>
                                                        <td>
                                                            <!--
                                                        <a id="btn_ver" data-toggle="modal" data-target="#myModal"
                                                            data-url="<?php//base_url('pagamento/ver/' . $q->pagamento_id)?>"
                                                                    class="btn btn-outline-secondary btn-sm"><i class="fa fa-info"></i></a>-->
                                                            <a target="blank" href="<?=base_url('pagamento/recibo/' . $q->pagamento_id)?>"
                                                                    class="btn btn-outline-secondary btn-sm"><i class="fa fa-print"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Operação</th>
                                                    <th>Tipo</th>
                                                    <th>Membro</th>
                                                    <th>Valor</th>
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

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Detalhes do Pagamento</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <h6>Membro</h6>
                                <p id="membro">aaaa</p>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Operação</h6>
                                <p id="tipo_pagamento">aaaa</p>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Tipo</h6>
                                <p id="tipo">aaaa</p>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Valor</h6>
                                <p id="valor">aaaa</p>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Referencia da transação</h6>
                                <p id="referencia_transacao">aaaa</p>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Data da transação</h6>
                                <p id="data_transacao">aaaa</p>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Modo</h6>
                                <p id="modo_pagamento">aaaa</p>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Moeda</h6>
                                <p id="moeda">aaaa</p>
                            </div>
                            <div class="form-group col-md-4">
                                <h6>Descrição</h6>
                                <p id="descricao">aaaa</p>
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Operador</h6>
                                <p id="nome_usuario">aaaa</p>
                            </div>
                            <div class="form-group col-md-6">
                                <h6>Data</h6>
                                <p id="data_criacao">aaaa</p>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                    </div>

                </div>
            </div>

            <?php include APPPATH . 'views/includes/footer.php';?>