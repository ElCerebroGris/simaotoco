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
                                <h1>Novo Pagamento</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Pagamentos</a></li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="container-fluid">
                    <?php if ($this->session->flashdata('sms') != null) { ?>
                            <div class="callout callout-danger alert alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?= $this->session->flashdata('sms'); ?>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Dados do Pagamento</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" method="post" action="<?=base_url()?>pagamento/addCaixaPost">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Membro</label>
                                                    <select name="membro" class="form-control select2" style="width: 100%;">
                                                        <?php foreach ($membros as $n) {?>
                                                            <option value="<?=$n->membro_id?>"><?=$n->pessoa_nome?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="nome">Operação</label>
                                                    <select id="tipo_pagamento" name="tipo_pagamento" data-url="<?=base_url()?>pagamento/getTipos/" class="form-control" style="width: 100%;">
                                                        <option value="0">Selecione o tipo</option>
                                                        <option value="DESPESA">Despesa</option>
                                                        <option value="RECEITA">Receita</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="nome">Tipo</label>
                                                    <select id="tipo" name="tipo" class="form-control" style="width: 100%;">
                                                        <option value="0">Selecione uma operação</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="nome">Valor</label>
                                                    <input name="valor" type="text" class="form-control" required="">
                                                </div>

                                                <div class="form-group col-md-6 transacao">
                                                    <label for="nome">Referencia da transação</label>
                                                    <input name="referencia_transacao" type="text" class="form-control">
                                                </div>

                                                <div class="form-group col-md-6 transacao">
                                                    <label for="nome">Data da transação</label>
                                                    <input name="data_transacao" type="date" class="form-control">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="nome">Modo</label>
                                                    <select name="modo_pagamento" class="form-control select2" style="width: 100%;">
                                                        <option value="CAIXA">Caixa</option>
                                                        <option value="TRANSFERENCIA">Transferencia</option>
                                                        <option value="DEPOSITO">Deposito</option>
                                                        <option value="TPA">TPA</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="nome">Moeda</label>
                                                    <select name="moeda" class="form-control" style="width: 100%;">
                                                        <option value="AKZ">AKZ</option>
                                                        <option value="USD">USD</option>
                                                        <option value="EURO">EURO</option>
                                                        <option value="ZAR">ZAR</option>
                                                        <option value="OUTRO">OUTRO</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="comment">Descrição:</label>
                                                    <textarea name="descricao" class="form-control" rows="5" id="descricao"></textarea>
                                                </div>

                                            </div>
                                            <div class="card">
                                            <button type="submit" class="btn btn-success">Salvar</button>
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
