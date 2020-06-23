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

        .main h1{
            margin-top: 20px;
            text-align: center;
            font-size: 1.4em;
            text-decoration: underline;
            font-weight: 500;
        }

        .main p{
            margin: 0 20px;
            text-align: justify;
            font-size: 1.2em;
        }
    </style>
</head>

<body>
    <div id="page-border">

        <div style="margin: 0 auto; width: 550px; font-size: 10pt; text-align: center; padding-top: 3mm; color: #28a745; ">
            <img src="<?= base_url() ?>libs/dist/img/logo.png" width="50px" alt="Logotipo">
            <h1 style="font-size: 12pt;">IGREJA DE NOSSO SENHOR JESUS CRISTO NO MUNDO</h1>
            <p>«OS TOCOÍSTAS»</p>
            <p>Relembrada em 25 de Julho de 1949<p>
                    <p>Por Sua Santidade Profeta Simão Gonçalves Tôco<p>
        </div>

        <div class="main">
        <?php $dado = explode(' ',$casamento[0]->data_casamento)[0];
        $idade = ('20'.date('y'))-explode('-',$homem->data_nascimento)[0];
        $idade_mulher = ('20'.date('y'))-explode('-',$mulher->data_nascimento)[0];
        $data = explode(' ',$casamento[0]->data_criacao)[0];
         ?> 
            <h1>CERTIDÃO DE CASAMENTO</h1>

            <p>=== Certifica-se que, com fundamento nas Sagradas Escrituras e sob
                observância do respectivo Ritual em uso nesta Igreja, na presença das
                testemunhas da terra e dos Céus, aos <?= explode('-', $dado)[2] ?> 
                de <?= explode('-', $dado)[1] ?> de <?= explode('-', $dado)[0] ?>, com registo as
                folhas n.º <?= $casamento[0]->numero_folha ?>, do Livro de Casamento n.º 
                <?= $casamento[0]->casamento_id ?>/INSJCM/<?= explode('-', $dado)[0] ?>, contraiu matrimónio, o
                Irmão <b><?= $homem->pessoa_nome ?></b>, de <?= $idade ?> anos de idade, natural do
                Município de <?= $homem->municipio_nascimento ?>, 
                Província de <?= $homem->provincia_nascimento ?>, de 
                Nacionalidade <?= $homem->descricao_nacionalidade ?>,
                nascido aos <?= $homem->data_nascimento ?>, filho de <?= $homem->nome_pai ?> 
                e de <?= $homem->nome_mae ?>,
                Baptizado na Igreja de Nosso Senhor Jesus Cristo no Mundo, em Luanda, aos 
                <?= $homem->data_baptismo ?>, 
                titular do Cartão de Membro n.º <?= $homem->descricao_identificacao ?>; 
                com a Irmã <b><?= $mulher->pessoa_nome ?></b>
                , de <?= $idade_mulher ?> anos de idade, natural do 
                Município do <?= $mulher->municipio_nascimento ?>, 
                Província de <?= $mulher->provincia_nascimento ?>, de 
                Nacionalidade <?= $mulher->descricao_nacionalidade ?>, 
                nascida aos <?= $mulher->data_nascimento ?>, filha de <?= $mulher->nome_pai ?>
                e de <?= $mulher->nome_mae ?>,
                Baptizada na Igreja de Nosso Senhor Jesus Cristo no Mundo, em Luanda, 
                aos <?= $mulher->data_baptismo ?>, 
                titular do Cartão de Membro n.º <?= $mulher->descricao_identificacao ?>.</p>
            <p>Foram Padrinhos <?= $casamento[0]->padrinho_nome ?> e <?= $casamento[0]->madrinha_nome ?>,
                ambos casados.</p>
            <p>Para efeitos probatórios, dentro e fora de Angola, passou-se-lhes a presente
                Certidão que vai devidamente autenticada com o selo branco em uso nesta Igreja.</p>

            <div class="main-footer">
                <p class="p-footer">Feito em,  <?= explode('-', $data)[2] ?> 
                de <?= explode('-', $data)[1] ?> de <?= explode('-', $data)[0] ?>- Milénio de Cristo</p>

                <p>O LÍDER ESPIRITUAL</p>
                <p>Santidade Bispo Dom AFONSO NUNES</p>
                <p>(Personificação do Profeta Simão Gonçalves Toco)</p>
            </div>
        </div>
<!-- 
        <div style="position: fixed; margin: 0 auto; width: 620px; font-size: 8pt; text-align: center; padding-top: 3mm; color: #28a745; ">
            Complexo Missionário Tocoísta, Rua Cmte Pedro de Castro Van-Duném “Loy”, Golf I, Tlf 916866264/912294255, Cx-Postl 22141
            <a mailto="executivocentral8@yahoo.com.br" style="text-decoration:  underline; color: blue;">executivocentral8@yahoo.com.br</a> Sede Social Administrativa e Eclesiástica Universal em Luanda Angola- África Ocidental<br />
            Sede Espiritual Universal “Sadi Zulumongo”Ntaia Maquela do Zombo A Cidade Santa do Grande Rei. Reconhecida pelo Governo Português por Despacho
            nº. 3163-94/72 de 24 de Setembro e pelo Governo de Angola por Despacho nº 396/25 de 16 de Novembro, D.R nº. 158, I Série
        </div>

    </div>
</body>

</html>