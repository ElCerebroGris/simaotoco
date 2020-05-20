$(function() {

    function renderOptions(filtered, seletor, data) {

        switch (filtered) {
            case '1':
                $.each(data, function(key, value) {
                    seletor.append("<option value='" + value.paroquia_id + "'>" + value.descricao_paroquia + "</option>");
                });
                break;
            case '2':
                $.each(data, function(key, value) {
                    seletor.append("<option value='" + value.provincia_eclesiastica_id + "'>" + value.descricao_provincia_eclesiastica + "</option>");
                });
                break;
            case '3':
                $.each(data, function(key, value) {
                    seletor.append("<option value='" + value.igreja_nacional_id + "'>" + value.descricao_igreja_nacional + "</option>");
                });
                break;
            default:
                break;
        }
    }

    function renderUrl(filtered) {
        switch (filtered) {
            case '1':
                return 'http://172.16.200.9/documento/paroquias/';
                break;
            case '2':
                return 'http://172.16.200.9/documento/provincias/';
                break;
            case '3':
                return 'http://172.16.200.9/documento/igrejas/';
                break;
            default:
                break;
        }
    }

    $('#filter2').change(function(e) {

        var selector = $(this).val();
        var filtered = $("#listData2");

        $.ajax({
            url: renderUrl(selector),
            type: 'GET',
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {

                filtered.html('');
                if (data.error) {
                    filtered.append("<option value='0'>Sem Resultado Disponiveis</option>");
                    alert('Erro');
                }

                if (data.success) {
                    filtered.append("<option value=''>Selecione uma opção</option>");
                    renderOptions(selector, filtered, data.content);
                }
            }
        });
    });

    $('#filter3').change(function(e) {

        var selector = $(this).val();
        var filtered = $("#listData3");

        $.ajax({
            url: renderUrl(selector),
            type: 'GET',
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {

                filtered.html('');
                if (data.error) {
                    filtered.append("<option value='0'>Sem Resultado Disponiveis</option>");
                    alert('Erro');
                }

                if (data.success) {
                    filtered.append("<option value=''>Selecione uma opção</option>");
                    renderOptions(selector, filtered, data.content);
                }
            }
        });
    });

    $('#filter4').change(function(e) {

        var selector = $(this).val();
        var filtered = $("#listData4");

        $.ajax({
            url: renderUrl(selector),
            type: 'GET',
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {

                filtered.html('');
                if (data.error) {
                    filtered.append("<option value='0'>Sem Resultado Disponiveis</option>");
                    alert('Erro');
                }

                if (data.success) {
                    filtered.append("<option value=''>Selecione uma opção</option>");
                    filtered.append("<option value='0'>Todos</option>");
                    renderOptions(selector, filtered, data.content);
                }
            }
        });
    });

});