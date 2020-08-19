<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10pt;
        }

        #page-border {
            width: 100%;
            height: 100%;
            border: 1px solid rgba(40, 167, 69, 0.4);
        }

        p {
            margin: 0pt;
        }

        .main h1 {
            margin-top: 190px;
            text-align: center;
            font-size: 1.3em;
        }

        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 95%;
            margin: 0 auto;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 5px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 7px;
            padding-bottom: 7px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

        tbody th {
            padding: 5px;
            background-color: #fff !important;
            color: #000;
            font-size: 0.9em !important;
            font-weight: normal;
        }
    </style>
    <?php
    $text_right = "text-align: right !important;";
    $text_center = "text-align: center !important;";
    ?>
</head>

<body>
    <div id="page-border">

        <div class="main">
            <h1>CONTROLE DE <?= $tipo ?></h1>
            <p style="text-align: right; margin-right: 30px; font-weight: bold; color: #333; font-size: 0.85em;">Registos de <?=$data_inicio?> á <?=$data_fim?></p>
            <div>
                <table id="customers">
                    <thead>
                        <tr>
                            <th>N/O</th>
                            <th>Nome</th>
                            <th>Província</th>
                            <th>Paroquia</th>
                            <th>Classe</th>
                            <th>Tribo</th>
                            <th>Área</th>
                            <th>Mês</th>
                            <th>Valor</th>
                            <th>Caixa/Banco</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php if (count($pagamentos)) : ?>
                            <?php foreach ($pagamentos as $key => $pagamento) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $pagamento->nome_membro ?></td>
                                    <td><?= $pagamento->provincia ?></td>
                                    <td><?= $pagamento->paroquia ?></td>
                                    <td><?= $pagamento->classe ?></td>
                                    <td><?= $pagamento->tribo ?></td>
                                    <td><?= $pagamento->area ?></td>
                                    <td><?= $pagamento->area ?></td>
                                    <td><?= number_format($pagamento->valor, 2, ',', '.') ?></td>
                                    <td><?= $pagamento->modo_pagamento ?></td>
                                </tr>
                                <?php $total += $pagamento->valor; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="10" style="text-align: center; color: red; font-size: 1.1em;">Sem informação disponivel</td>
                            </tr>
                        <?php endif; ?>

                        <tr>
                            <td style="font-weight: bold;">Total</td>
                            <td colspan="9" style="text-align: right; font-weight: bold;"><?= number_format($total, 2, ',', '.') ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!--mpdf
<htmlpageheader name="myheader">
<div style="margin: 0 auto; width: 550px; font-size: 10pt; text-align: center; padding-top: 3mm; color: #28a745; ">
<img src="<?= base_url() ?>libs/dist/img/logo.png" width="50px" alt="Logotipo">
<h1 style="font-size: 12pt;">IGREJA DE NOSSO SENHOR JESUS CRISTO NO MUNDO</h1>
<p>«OS TOCOÍSTAS»</p>
<p>Relembrada em 25 de Julho de 1949<p>
<p>Por Sua Santidade Profeta Simão Gonçalves Tôco<p>
</div>
</htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="margin: 0 auto; width: 550px; font-size: 7pt; text-align: center; padding-top: 3mm; color: #28a745; ">
<p>Sede Social Administrativa e Eclesiástica Universal em Luanda Angola- África Ocidental
Sede Espiritual Universal “Sadi Zulumongo”Ntaia Maquela do Zombo</p>
<p>A Cidade Santa do Grande Rei. Apocalipse 3:4, Salmo 48:2, S. Lucas 17:37</p>
<p style="color: black; font-weight: bold;">executivocentral8@yahoo.com.br</p>
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
    </div>
</body>

</html>