<?php include APPPATH . 'views/includes/header.php'; ?>

<div class="wrapper">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Membro</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Membro</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <?php $membro = (object)$membro; ?>
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="error" style="display: none;">

                        </div>
                        <div class="card card-success data-foto form-step">
                            <div class="card-header">
                                <h3 class="card-title">Fotografia</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" method="post" class="form-wizard-edit" enctype="multipart/form-data">
                                    <div class="row" style="margin-bottom: 10px;">
                                        <div class="form-group col-md-6">
                                            <label for="nome">Tirar Foto Nova <sup>(opcional)</sup></label>
                                            <input name="foto" type="file" accept=".jpg, .jpeg, .png" class="form-control">
                                            <input type="hidden" name="action" value="foto">
                                            <input type="hidden" name="foto_atual" value="<?=$membro->foto?>">
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <img id="imgPrev" src="#" width="150px" style="display: none;">
                                            <img id="imgActual" src="<?=base_url()."fotos/".$membro->foto?>" width="150px" >
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <button type="submit" class="btn btn-success" data-step="data-eclesis">Próximo <i class="fa fa-arrow-circle-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.card -->

                        <div class="card card-success data-eclesis form-step" style="display: none;">
                            <div class="card-header">
                                <h3 class="card-title">Dados Eclasisaticos</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" method="post" class="form-wizard-edit">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="nome">Igreja Nacional</label>
                                            <select name="igreja_nacional" class="form-control select2 filter" data-get="provincia_eclesiastica" style="width: 100%;">
                                                <option value="">Selecione uma opção</option>
                                                <?php foreach ($igreja_nacionais as $n) { ?>
                                                    <option value="<?= $n->igreja_nacional_id ?>" <?php if($n->igreja_nacional_id == $membro->igreja_nacional_id){ echo 'selected';}?>><?= $n->descricao_igreja_nacional ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nome">Provincia Eclesiastica</label>
                                            <select name="provincia_eclesiastica" class="form-control select2 filter" data-get="paroquia" style="width: 100%;">
                                                <?php foreach ($provincia_eclesiasticas as $n) { ?>
                                                    <option value="<?= $n->provincia_eclesiastica_id ?>" <?php if($n->provincia_eclesiastica_id == $membro->provincia_eclesiastica_id){ echo 'selected';}?>><?= $n->descricao_provincia_eclesiastica ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nome">Paroquia</label>
                                            <select name="paroquia" class="form-control select2 filter" data-get="classe" style="width: 100%;">
                                                <?php foreach ($paroquias as $n) { ?>
                                                    <option value="<?= $n->paroquia_id ?>" <?php if($n->paroquia_id == $membro->paroquia_id){ echo 'selected';}?>><?= $n->descricao_paroquia ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nome">Classe</label>
                                            <select name="classe" class="form-control select2" style="width: 100%;">
                                                <?php foreach ($classes as $n) { ?>
                                                    <option value="<?= $n->classe_id ?>" <?php if($n->classe_id == $membro->classe_id){ echo 'selected';}?>><?= $n->descricao_classe ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nome">Tribo</label>
                                            <input type="hidden" name="action" value="eclesis">
                                            <select name="tribo" class="form-control select2 filter" data-get="area" style="width: 100%;">
                                                <option value="">Selecione uma opção</option>
                                                <?php foreach ($tribos as $n) { ?>
                                                    <option value="<?= $n->tribo_id ?>" <?php if($n->tribo_id == $membro->tribo_id){ echo 'selected';}?>><?= $n->descricao_tribo ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nome">Area</label>
                                            <select name="area" class="form-control select2" style="width: 100%;">
                                                <?php foreach ($areas as $n) { ?>
                                                    <option value="<?= $n->area_id ?>" <?php if($n->area_id == $membro->area_id){ echo 'selected';}?>><?= $n->descricao_area ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nome">Categoria</label>
                                            <select name="categoria" class="form-control select2" style="width: 100%;">
                                                <?php foreach ($categorias as $n) { ?>
                                                    <option value="<?= $n->categoria_id ?>" <?php if($n->categoria_id == $membro->categoria_id){ echo 'selected';}?>><?= $n->descricao_categoria ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nome">Função</label>
                                            <select name="funcao" class="form-control select2" style="width: 100%;">
                                                <?php foreach ($funcoes as $n) { ?>
                                                    <option value="<?= $n->funcao_id ?>" <?php if($n->funcao_id == $membro->funcao_id){ echo 'selected';}?>><?= $n->descricao_funcao ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="nome">Data de admissão</label>
                                            <input name="data_admissao" type="date" class="form-control" value="<?=$membro->data_admissao?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="nome">Data de baptismo <sup>(opcional)</sup></label>
                                            <input name="data_baptismo" type="date" class="form-control" value="<?=($membro->data_baptismo ?? '')?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="nome">Local do Baptismo</label>
                                            <input name="local_baptismo" type="text" class="form-control" value="<?=($membro->local_baptismo ?? '')?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="" class="btn btn-success" data-step="data-foto"><i class="fa fa-arrow-circle-left"></i> Anterior</a>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="submit" class="btn btn-success" data-step="data-personal">Próximo <i class="fa fa-arrow-circle-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->

                        <div class="card card-success data-personal form-step" style="display: none;">
                            <div class="card-header">
                                <h3 class="card-title">Dados Pesoais</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" method="post" class="form-wizard-edit">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="nome">Nome Completo</label>
                                            <input type="hidden" name="action" value="personal">
                                            <input type="hidden" name="pessoa_id" value="<?=$membro->pessoa_id?>">
                                            <input name="nome_membro" type="text" class="form-control" value="<?=$membro->pessoa_nome?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="nome">Nome do Pai</label>
                                            <input name="nome_pai" type="text" class="form-control" value="<?=$membro->nome_pai?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="nome">Nome da Mãe</label>
                                            <input name="nome_mae" type="text" class="form-control" value="<?=$membro->nome_mae?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="nome">Identificação</label>
                                            <input name="identificacao" type="text" class="form-control" value="<?=$membro->descricao_identificacao?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="nome">Tipo</label>
                                            <select name="tipo" class="form-control select2" style="width: 100%;">
                                                <option value="BI">Bilhete de Identidade</option>
                                                <option value="PASSAPORTE">Bilhete de Identidade</option>
                                                <option value="CÉDULA">Cédula</option>
                                                <option value="OUTRO">Outro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="nome">Nacionalidade</label>
                                            <select name="nacionalidade" class="form-control select2" style="width: 100%;">
                                                <?php foreach ($nacionalidades as $n) { ?>
                                                    <option value="<?= $n->nacionalidade_id ?>" <?php if($n->nacionalidade_id == $membro->nacionalidade_id){ echo 'selected';}?>><?= $n->descricao_nacionalidade ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="nome">Data de nascimento</label>
                                            <input name="data_nascimento" type="date" class="form-control" value="<?=($membro->data_nascimento)?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="nome">Provincia de Nascimento</label>
                                            <input name="provincia_nascimento" type="text" class="form-control" value="<?=$membro->provincia_nascimento?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="nome">Municipio de Nascimento</label>
                                            <input name="municipio_nascimento" type="text" class="form-control" value="<?=$membro->municipio_nascimento?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="nome">Sexo</label>
                                            <select name="sexo" class="form-control select2" style="width: 100%;">
                                                <option value="MASCULINO" <?php if($membro->sexo == 'MASCULINO'){ echo 'selected';}?>>Masculino(a)</option>
                                                <option value="FEMENINO" <?php if($membro->sexo == 'FEMENINO'){ echo 'selected';}?>>Feminino(a)</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="nome">Estado Civil</label>
                                            <select name="estado_civil" class="form-control select2" style="width: 100%;">
                                                <option value="SOLTEIRO" <?php if($membro->estado_civil == 'SOLTEIRO'){ echo 'selected';}?>>Solteiro(a)</option>
                                                <option value="CASADO" <?php if($membro->estado_civil == 'CASADO'){ echo 'selected';}?>>Casado(a)</option>
                                                <option value="DIVORCIADO" <?php if($membro->estado_civil == 'DIVORCIADO'){ echo 'selected';}?>>Divorciado(a)</option>
                                                <option value="VIÚVO" <?php if($membro->estado_civil == 'VIÚVO'){ echo 'selected';}?>>Viúvo(a)</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="nome">Telefone</label>
                                            <input name="telefone" type="text" class="form-control" value="<?=($membro->telefone ?? '')?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="nome">Endereço</label>
                                            <input name="endereco" type="text" class="form-control" value="<?=($membro->endereco ?? '')?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="" class="btn btn-success" data-step="data-eclesis"><i class="fa fa-arrow-circle-left"></i> Anterior</a>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="submit" class="btn btn-success" data-step="data-finish">Salvar <i class="fa fa-check-circle"></i></button>
                                        </div>
                                    </div>
                                </form>
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

</div>
<?php include APPPATH . 'views/includes/footer.php'; ?>