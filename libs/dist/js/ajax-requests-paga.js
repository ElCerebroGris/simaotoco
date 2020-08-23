$(function() {

    $(".transacao").hide();

    $('#tipo_pagamento').change(function(e) {

        var url_target = $(this).data('url');
        var selector = $(this).val();
        var tipo = $("#tipo");

        var id = 0;
        if (selector == 'DESPESA') {
            id = 1;
            $(".transacao").hide();
        } else if (selector == 'RECEITA') {
            id = 2;
            $(".transacao").show();
        }

        $.ajax({
            url: url_target + id,
            type: 'GET',
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {

                tipo.html('');
                if (data.error) {
                    tipo.append("<option value='0'>Sem Resultado Disponiveis</option>");
                }

                if (data.success) {
                    tipo.append("<option value=''>Selecione uma opção</option>");
                    $.each(data.content, function(key, value) {
                        tipo.append("<option value='" + value.tipo_pagamento_id + "'>" + value.descricao + "</option>");
                    });
                }
            }
        });
    });

    $('#btn_ver').click(function(e) {

        var url_target = $(this).data('url');
        console.log(url_target);

        $.ajax({
            url: url_target,
            type: 'GET',
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {
                if (data.success) {

                    $('#membro').text(data.content.pessoa_nome);
                    $('#tipo_pagamento').text(data.content.tipo_pagamento);
                    $('#tipo').text(data.content.tipo);
                    $('#valor').text(data.content.valor);
                    $('#referencia_transacao').text(data.content.referencia_transacao);
                    $('#data_transacao').text(data.content.data_transacao);
                    $('#modo_pagamento').text(data.content.modo_pagamento);
                    $('#moeda').text(data.content.moeda);
                    $('#descricao').text(data.content.descricao);
                    $('#nome_usuario').text(data.content.nome_usuario);
                    $('#data_criacao').text(data.content.data_criacao);
                }
            }
        });
    });

});