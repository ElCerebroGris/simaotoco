<!DOCTYPE html>
<html>
    <head>        
        <style>
            img {
                display: block;
                margin: 0 auto;
                width: 10%;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            .cabecalho p {
                text-align: center;
                font-weight: bold;
            }
            .preta {
                border-style: solid;
                border-width: 0px 0px 1px 0px;
                border-color: #000;
            }
            .sec{
                padding-left:10em;
                padding-right:10em;
            }
        </style>
    </head>

    <body>
        <div style="border: 2px solid; padding: 25px;">
            <img src="<?= base_url() ?>img/logo2.png" class="center" style="text-align: center;
                 margin-left: 44%;" alt="logo" />

            <div class="cabecalho">
                <p>
                    <br>Centro de Formação “”
                    <br>FICHA DE INSCRIÇÃO
                </p>
            </div>

            <p>Data: <u><?= $aluno[0]->data_inscricao ?></u></p>

            <h4>CURSO</h4>

            <p>
                Curso: <u><?= $aluno[0]->curso_nome ?></u>
                <br>Horario: <u><?= $aluno[0]->horario_descricao ?></u>
                <br>Duração: <u><?= $aluno[0]->duracao ?> Semanas</u>
            </p>

            <h4>DADOS PESSOAIS</h4>

            <p>
                Nome: <u><?= $aluno[0]->aluno_nome . ' ' . $aluno[0]->sobrenome ?></u>
                <br>BI/Passaporte: <u><?= $aluno[0]->num_bi ?></u>
                <br>Telefone: <u><?= $aluno[0]->telefone ?>/<?= $aluno[0]->telefone2 ?></u>
                <br>Email: <u><?= $aluno[0]->email ?></u>
                <br>Residencia: <u><?= $aluno[0]->residencia ?></u>
            </p>

            <h4>DADOS ACADEMICOS</h4>

            <p>
                Nível Academico: <u><?= $aluno[0]->nivel_academico ?></u>
            </p>

            <h4>OUTRAS INFORMAÇÕES</h4>

            <p>
                Cursos já feitos: 
                <u>
                    <?php foreach ($cursos as $c) { ?>
                        <?= $c->curso_nome ?> ;
                    <?php } ?>
                </u>
            </p>

            <div class="tema text-center">
                <p style="font-size: 12px; text-align: center">
                    <span>Assinatura do/a Funcionario/a</span>
                </p>
                <div class="sec">
                    <p class="preta"></p>
                </div>
            </div>
        </div>

    </body>
</html>
