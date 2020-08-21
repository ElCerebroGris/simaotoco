<!DOCTYPE html>
<html>
    <head>  
        <style>
            p {
                font-size: 25px;
            }
            .cabecalho p {
                text-align: center;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        <div class="cabecalho">
            <p>
                <br>Centro de Formação 
                <br>Recibo de Pagamento
            </p>
        </div>
        <div>

            <p><b>Dados do estudante:</b>
                <br>Nome:  <?= $pagamento[0]->aluno_nome . ' ' .  $pagamento[0]->sobrenome ?>
                <br>Identificação: Género: <?=  $pagamento[0]->sexo ?> | BI: <?=  $pagamento[0]->num_bi ?>
                <br>Curso: <?=  $pagamento[0]->curso_nome ?> | Turma: <?=  $pagamento[0]->turma_nome ?>
                <br>Nº Interno: <?=  $pagamento[0]->id_aluno ?>
            </p>
            <p><b>Dados do emolumento:</b>
                <br>Referente: <?=  $pagamento[0]->descricao ?>  | Valor: <?=  $pagamento[0]->valor_pago ?> Kz
                <br>Data do Pagamento: <?=  $pagamento[0]->data_criacao ?> | Ref. do Pagamento: <?=  $pagamento[0]->referencia ?>
                <br>Processado Por: <?= $this->session->userdata('nome_completo') ?>
                <br>
                <br>
                <br>
            </p>
        </div>
    </body>
</html>
