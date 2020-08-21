<!DOCTYPE html>
<html>
    <head>        
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 5px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
            img {
                display: block;
                margin: 0 auto;
                width: 10%;
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
        <img src="<?= base_url() ?>img/logo2.png" class="center" style="text-align: center;
             margin-left: 44%;" alt="logo" />

        <div class="cabecalho">
            <p>
                <br>Centro de Formação “”
                <br>Mapa Estatístico Relativo as datas de <?= $inicio ?> até <?= $fim ?>
            </p>
        </div>
        <br>

        <table border="1">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Cursos</th>
                    <th>Horário</th>
                    <th>Formandos</th>
                    <th>Formador</th>
                    <th>Mensalidade</th>
                    <th>Valor Pago</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 1;
                foreach ($turmas as $t) {
                    ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td><?= $t->curso_nome ?></td>
                        <td><?= $t->horario_descricao ?></td>
                        <td><?= $t->alunos ?></td>
                        <td><?= $t->nome_completo ?></td>
                        <td><?= $t->curso_preco ?></td>
                        <td><?= $t->valor ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th>Total</th>
                    <td></td>
                    <td></td>
                    <td><?= $totalF ?></td>
                    <td></td>
                    <td></td>
                    <td><?= $totalV ?></td>
                </tr>
            </tbody>
        </table>



        <p>Luanda, <u>22/07/2019</u></p>

        <div class="tema text-center">
            <p style="font-size: 12px; text-align: center">
                <span>O/A Cordenador(a)</span>
            </p>
            <div class="sec">
                <p class="preta"></p>
            </div>
            <p style="font-size: 12px; text-align: center">
                <span></span>
            </p>
        </div>

    </body>
</html>
