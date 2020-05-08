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
            margin-top: 220px;
            margin-bottom: 40px;
            text-align: center;
            font-size: 1.4em;
            text-decoration: underline;
        }

        .main p {
            margin: 0 40px;
            text-align: justify;
            font-size: 1.2em;
        }

        .main-footer {
            margin-top: 20px;
        }

        .main-footer p {
            text-align: center;
            font-weight: bold;
        }

        .main-footer .p-footer {
            margin-bottom: 35px;
        }
    </style>
</head>

<body>
    <div id="page-border">

        <!-- <div style="margin: 30px auto; width: 550px; font-size: 10pt; text-align: center; padding-top: 3mm; color: #28a745; ">
            <img src="<?= base_url() ?>libs/dist/img/logo.png" width="50px" alt="Logotipo">
            <h1 style="font-size: 12pt;">IGREJA DE NOSSO SENHOR JESUS CRISTO NO MUNDO</h1>
            <p>«OS TOCOÍSTAS»</p>
            <p>Relembrada em 25 de Julho de 1949<p>
                    <p>Por Sua Santidade Profeta Simão Gonçalves Tôco<p>
        </div> -->

        <div class="main">
        <?php $dado = explode('-',$membro->data_nascimento);
        $dado1 = explode('-',$membro->data_baptismo); 
        $dado2 = explode('-',date('d-m').'-20'.date('y'));
        ?>
            <h1>CERTIDÃO DE BAPTISMO</h1>

            <p>Pelo presente, certifica-se que <?= $membro->pessoa_nome ?>,
                Estado Civil <?= $membro->estado_civil ?>, Natural de <?= $membro->provincia_nascimento ?>, 
                filho de <?= $membro->nome_pai ?> e de  <?= $membro->nome_mae ?>,
                nascido aos <?= $dado[2] .' de '. $dado[1] .' de '. $dado[0] ?>, foi baptizado, por
                imersão, na Igreja de Nosso Senhor Jesus Cristo no Mundo, 
                aos <?= $dado1[2] .' de '. $dado1[1] .' de '. $dado1[0] ?>, 
                cumprindo o respectivo ritual vigente
                nesta Igreja, passando a partir desta data a ostentar a categoria de
                cristão. <br>
                Para constar, passou-se-lhe o presente certificado que vai devidamente
                assinado e carimbado.</p>

            <div class="main-footer">
                <p class="p-footer">Luanda, <?= $dado2[0] .' de '. $dado2[1] .' de '. $dado2[2] ?> - 
                “Ano da Solidariedade, da Leitura e Interpretação da Lei de Deus” - Milénio de Cristo</p>



                <p>O PASTOR PROVINCIAL</p>

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