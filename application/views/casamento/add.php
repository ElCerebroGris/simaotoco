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
                                <h1>Novo Casamento</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Casamento</a></li>
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
                                        <h3 class="card-title">Dados do Casamento</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" method="post" action="<?=base_url()?>casamento/addPost">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nome">Homem</label>
                                                    <select name="paroquia" class="form-control select2" style="width: 100%;">
                                                        <?php foreach ($membros_h as $n) {?>
                                                            <option value="<?=$n->membro_id ?>"><?=$n->pessoa_nome?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="nome">Mulher</label>
                                                    <select name="paroquia" class="form-control select2" style="width: 100%;">
                                                        <?php foreach ($membros_m as $n) {?>
                                                            <option value="<?=$n->membro_id ?>"><?=$n->pessoa_nome?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="nome">Descrição</label>
                                                    <input name="descricao_classe" type="text" class="form-control" required="">
                                                </div>
                                                <div class="form-group col-md-6">
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