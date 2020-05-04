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
                text-align: center;
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
                <br>Relatório das actividades formativas relativo as datas de <?= $inicio ?> até <?= $fim ?>
            </p>
        </div>

        <table border="1" style="width: 100%">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Cursos</th>
                    <th>Numero de Formandos</th>
                    <th>Masculino</th>
                    <th>Femenino</th>
                </tr>
            </thead>
            <tbody>
                <?= $x = 1; ?>
                <?php foreach ($cursos as $c) { ?>
                    <tr>
                        <td><?= $x++ ?></td>
                        <td><?= $c->curso_nome ?></td>
                        <td><?= $c->quant ?></td>
                        <td><?= $c->quantM ?></td>
                        <td><?= $c->quantF ?></td>
                    </tr>
                <?php } ?>
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
