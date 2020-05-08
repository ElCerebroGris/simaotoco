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

        .title {
            font-size: 1.3em;
            font-weight: bold;
        }

        .propriety {
            font-size: 1.1em;
            text-transform: uppercase;
        }

        .photo {
            margin-left: 210px;
            margin-top: -60px;
        }
    </style>
</head>

<body>
    <br>
    <table width="100%" style="margin-top: 340px" cellpadding="10">
        <tr>
            <td width="80%" style="font-size: 18pt; margin-top: -30px;">
                <p><span class="title">Nome Completo:</span> <span class="propriety">Nome Completo</span></p>
                <p><span class="title">Cartão de Membro Nº:</span> <span class="propriety">Nome Completo</span></p>
                <p><span class="title">Categoria:</span> <span class="propriety">Nome Completo</span></p>
                <p><span class="title">Data de Admissão:</span> <span class="propriety">Nome Completo</span></p>
                <p><span class="title">Paróquia:</span> <span class="propriety">Nome Completo</span></p>
                <p><span class="title">Tribo:</span> <span class="propriety">Nome Completo</span></p>
            </td>
            <td width="10%">&nbsp;</td>
            <td width="10%">
                <img class="photo" src="<?= base_url() . 'libs/dist/img/photo3.jpg' ?>" width="315px" height="390px" alt="Foto do Membro">
            </td>
        </tr>
    </table>

    </div>

</body>

</html>