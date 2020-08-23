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
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                    Novo
                                    </button>
                                    </h5>
                                <?php }?>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Pagamentos</a></li>
                                    <li class="breadcrumb-item active">Tipos</li>
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
                                        <h3 class="card-title">Lista de Tipos</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Tipo</th>
                                                    <th>Descrição</th>
                                                    <th>Estado</th>
                                                    <th>Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color:black">
                                                <?php foreach ($tipos as $q) {?>
                                                    <tr>
                                                        <td><?=$q->tipo?></td>
                                                        <td><?=$q->descricao?></td>
                                                        <?php if ($q->estado_tipo == 0) {?>
                                                            <td>Desativado</td>
                                                        <?php } else {?>
                                                            <td>Ativado</td>
                                                        <?php }?>
                                                        <td>
                                                        <?php if ($q->estado_tipo == 0) {?>
                                                                <a href="<?=base_url('pagamento/ativar_tipo/' . $q->tipo_pagamento_id)?>"
                                                                class="btn btn-outline-secondary btn-sm"><i class="fa fa-eye"></i></a>
                                                            <?php } else {?>
                                                                <a href="<?=base_url('pagamento/desativar_tipo/' . $q->tipo_pagamento_id)?>"
                                                                class="btn btn-outline-secondary btn-sm"><i class="fa fa-eye-slash"></i></a>
                                                            <?php }?>

                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Tipo</th>
                                                    <th>Descrição</th>
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

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">Detalhes do Tipo</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <form role="form" method="post" action="<?=base_url()?>pagamento/addTipoPost">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="nome">Tipo</label>
                                        <select id="tipo_pagamento" name="tipo" data-url="<?=base_url()?>pagamento/getTipos/" class="form-control" style="width: 100%;">
                                            <option value="0">Selecione o tipo</option>
                                            <option value="DESPESA">Despesa</option>
                                            <option value="RECEITA">Receita</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="nome">Descrição</label>
                                        <input name="descricao" type="text" class="form-control">
                                    </div>
                                </div>      
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Salvar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            </div>
                        </form>
                    </div>
                    

                </div>
            </div>

            <?php include APPPATH . 'views/includes/footer.php';?>