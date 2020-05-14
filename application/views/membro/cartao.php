<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            background-image: url('http://172.16.200.10/gestoasimaotoco/libs/dist/img/card.jpg');
            background-position: top left;
            background-repeat: no-repeat;
            background-image-resize: 2;
        }

        p {
            margin: 0pt;
        }

        .main {
            width: 100%;
        }

        .details {
            width: 500px;
            float: left;
            margin-top: 270px;
        }

        .details .propriety{
            font-size: 1.5em;
        }

        .details .sub {
            margin-top: 16px;
        }

        .details .sub .qr-code {
            /* margin-top: -20px; */
            /* background-color: #38760f; */
            width: 24%;
            float: left;
        }

        .details .sub p{
            /* font-weight: bold; */
            margin-top: 25px;
            font-size: 2em;
        }
        .details .sub .sub-propriety {
            color: #38760f;
            font-weight: bold;
        }

        .photo {
            width: 220px;
            float: right;
            margin-top: -38px;
        }

        .title {
            font-size: 1.5em;
            font-weight: bold;
            color: #38760f;
        }
    </style>
</head>

<body>
    <br>
    <div class="main">
        <div class="details">
            <p><span class="title">Nome: </span> <span class="propriety"><?= $membro->pessoa_nome ?></span></p>
            <p><span class="title"><?=($membro->sexo == 'MASCULINO') ? 'Filho ' : 'Filha ' ?>de: </span> <span class="propriety"><?= $membro->nome_pai ?></p>
            <p><span class="title">e de: </span> <span class="propriety"><?= $membro->nome_mae ?></span></p>
            <p><span class="title">Categoria: </span> <span class="propriety"><?= $membro->descricao_categoria ?></span></p>
            <p><span class="title">Data de Nascimento: </span> <span class="propriety"><?= date('d/m/Y', strtotime($membro->data_nascimento)) ?></span></p>
            <div class="sub">
                <div class="qr-code">
                    <?= $qr_data ?>
                </div>
                <p>Nº <span class="sub-propriety"><?= $membro->descricao_identificacao ?></span></p>
            </div>
        </div>
        <div class="photo">
            <img style="margin-left: 28.5px;" src="<?= base_url() . 'fotos/' . $membro->foto ?>" width="190px" height="228px">
        </div>
    </div>

</body>

</html>