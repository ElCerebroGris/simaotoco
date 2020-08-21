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

        .main-footer {
            margin-top: 20px;
        }

        .main-footer p {
            text-align: center;
            font-weight: bold;
        }

        .main-footer .p-footer {
            margin-top: 30px;
            margin-bottom: 20px;
            font-weight: 400;
            font-style: italic;
            font-size: 10pt;
        }

        .main-footer .assign-line {
            margin: 30px;
            font-weight: 300;
        }

        .main-footer .assign-name {
            font-size: 1em;
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
            <h1>FOLHA DE CAIXA</h1>
            <p style="text-align: right; margin-right: 30px; font-weight: bold; color: #333; font-size: 0.85em;">Registos de <?= $data_inicio ?> á <?= $data_fim ?></p>
            <div>
                <table id="customers">
                    <thead>
                        <tr>
                            <th>N/O</th>
                            <th>DESCRIÇÃO</th>
                            <th>KZ</th>
                            <th>USD</th>
                            <th>EUR</th>
                            <th>ZAR</th>
                            <th>Outras Moedas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalKz = 0;
                        $totalUsd = 0;
                        $totalEuro = 0;
                        $totalZar = 0;
                        $totalOutro = 0;
                        $i = 1;
                        ?>
                        <?php if (count($pagamentos)) : ?>
                            <tr>
                                <td colspan="7" style="text-align: center; font-weight: bold;">RECEBIMENTOS</td>
                            </tr>
                            <?php foreach ($pagamentos['income'] as $key => $pagamento) : ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $pagamento['type'] ?></td>
                                    <td><?= number_format($pagamento['kz'], 2, ',', '.') ?></td>
                                    <td><?= number_format($pagamento['usd'], 2, ',', '.') ?></td>
                                    <td><?= number_format($pagamento['euro'], 2, ',', '.') ?></td>
                                    <td><?= number_format($pagamento['zar'], 2, ',', '.') ?></td>
                                    <td><?= number_format($pagamento['other_coin'], 2, ',', '.') ?></td>
                                </tr>
                                <?php
                                $totalKz += $pagamento['kz'];
                                $totalUsd += $pagamento['usd'];
                                $totalEuro += $pagamento['euro'];
                                $totalZar += $pagamento['zar'];
                                $totalOutro += $pagamento['other_coin'];
                                $i++
                                ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="10" style="text-align: center; color: red; font-size: 1.1em;">Sem informação disponivel</td>
                            </tr>
                        <?php endif; ?>

                        <tr>
                            <td style="font-weight: bold;">Total</td>
                            <td></td>
                            <td style="text-align: right; font-weight: bold;"><?= number_format($totalKz, 2, ',', '.') ?></td>
                            <td style="text-align: right; font-weight: bold;"><?= number_format($totalUsd, 2, ',', '.') ?></td>
                            <td style="text-align: right; font-weight: bold;"><?= number_format($totalEuro, 2, ',', '.') ?></td>
                            <td style="text-align: right; font-weight: bold;"><?= number_format($totalZar, 2, ',', '.') ?></td>
                            <td style="text-align: right; font-weight: bold;"><?= number_format($totalOutro, 2, ',', '.') ?></td>
                        </tr>

                        <tr>
                            <td colspan="7" style="text-align: center; font-weight: bold;">PAGAMENTOS</td>
                        </tr>
                        <?php
                        $totalKz = 0;
                        $totalUsd = 0;
                        $totalEuro = 0;
                        $totalZar = 0;
                        $totalOutro = 0;
                        ?>
                        <?php foreach ($pagamentos['outcome'] as $key => $pagamento) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $pagamento['type'] ?></td>
                                <td><?= number_format($pagamento['kz'], 2, ',', '.') ?></td>
                                <td><?= number_format($pagamento['usd'], 2, ',', '.') ?></td>
                                <td><?= number_format($pagamento['euro'], 2, ',', '.') ?></td>
                                <td><?= number_format($pagamento['zar'], 2, ',', '.') ?></td>
                                <td><?= number_format($pagamento['other_coin'], 2, ',', '.') ?></td>
                            </tr>
                            <?php
                            $totalKz += $pagamento['kz'];
                            $totalUsd += $pagamento['usd'];
                            $totalEuro += $pagamento['euro'];
                            $totalZar += $pagamento['zar'];
                            $totalOutro += $pagamento['other_coin'];
                            $i++
                            ?>
                        <?php endforeach; ?>
                        <tr>
                            <td style="font-weight: bold;">Total</td>
                            <td></td>
                            <td style="text-align: right; font-weight: bold;"><?= number_format($totalKz, 2, ',', '.') ?></td>
                            <td style="text-align: right; font-weight: bold;"><?= number_format($totalUsd, 2, ',', '.') ?></td>
                            <td style="text-align: right; font-weight: bold;"><?= number_format($totalEuro, 2, ',', '.') ?></td>
                            <td style="text-align: right; font-weight: bold;"><?= number_format($totalZar, 2, ',', '.') ?></td>
                            <td style="text-align: right; font-weight: bold;"><?= number_format($totalOutro, 2, ',', '.') ?></td>
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

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
mpdf-->
    </div>
</body>

</html>