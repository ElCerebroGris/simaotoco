
            <!-- Navbar -->
            <?php include APPPATH . 'views/includes/header.php';?>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                    <?php if ($this->session->flashdata('sms') != null) {?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?=$this->session->flashdata('sms');?>
                            </div>
                        <?php }?>
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Editar Usuário</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Usuário</a></li>
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
                                        <h3 class="card-title">Dados</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" method="post" action="<?=base_url()?>usuario/editarPost">
                                        <div class="card-body">
                                            <div class="row">
                                                <input name="usuario_id" value="<?=$usuarios[0]->usuario_id?>" type="hidden" />
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Nome de Usuário</label>
                                                <input name="nome_usuario" value="<?=$usuarios[0]->nome_usuario?>" type="text" class="form-control" id="" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Nivel de Usuário</label>
                                                <select name="codigo_nivel_usuario" class="form-control select2" style="width: 100%;">
                                                    <?php foreach ($niveis as $h) {?>
                                                        <option <?=$h->codigo_nivel_usuario == $usuarios[0]->codigo_nivel_usuario ? 'selected' : ''?>
                                                        value="<?=$h->codigo_nivel_usuario?>">
                                                        <?=$h->descricao_nivel_usuario?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input name="email" value="<?=$usuarios[0]->email?>" type="email" class="form-control" id="" required="">
                                            </div>
                                            </div>
                                            <div class="card">
                                            <button type="submit" class="btn btn-success">Salvar</button>
                                        </div>
                                        </div>
                                        <!-- /.card-body -->
                                                    </div>

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

