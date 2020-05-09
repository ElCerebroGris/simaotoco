<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            background-image: url('http://localhost/code-behind/tocoista/libs/dist/img/card.jpg');
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

        .details .sub {
            margin-top: 40px;
        }

        .details .sub .title {
            font-size: 1em;
        }

        .details .sub .propriety {
            font-weight: bold;
        }

        .photo {
            width: 220px;
            float: right;
            margin-top: -55.5px;
        }

        .title {
            font-size: 1.5em;
            font-weight: bold;
            color: #38760f;
        }

        .propriety {
            font-size: 1.4em;
        }
    </style>
</head>

<body>
    <?php
    $membro = (object) $membro;
    //var_dump($membro);
    ?>
    <br>
    <div class="main">
        <div class="details">
            <p><span class="title">Nome: </span> <span class="propriety"><?= $membro->pessoa_nome ?></span></p>
            <p><span class="title">Filiação: </span> <span class="propriety"><?= $membro->nome_pai ?> e <?= $membro->nome_mae ?></span></p>
            <div class="sub">
                <p><span class="title">Cartão de Membro Nº: </span></p>
                <p><span class="propriety"><?= $membro->descricao_identificacao ?></span></p>
            </div>
        </div>
        <div class="photo">
            <img style="margin-left: 30px;" src="<?= base_url() . 'fotos/' . $membro->foto ?>" width="190px" height="228px">
        </div>
    </div>

</body>

</html>