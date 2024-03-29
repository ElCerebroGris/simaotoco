$(function() {

    function renderOptions(filtered, seletor, data) {

        switch (filtered) {
            case 'area':
                $.each(data, function(key, value) {
                    seletor.append("<option value='" + value.area_id + "'>" + value.descricao_area + "</option>");
                });
                break;
            case 'provincia_eclesiastica':
                $.each(data, function(key, value) {
                    seletor.append("<option value='" + value.provincia_eclesiastica_id + "'>" + value.descricao_provincia_eclesiastica + "</option>");
                });
                break;
            case 'paroquia':
                $.each(data, function(key, value) {
                    seletor.append("<option value='" + value.paroquia_id + "'>" + value.descricao_paroquia + "</option>");
                });
                break;
            case 'classe':
                $.each(data, function(key, value) {
                    seletor.append("<option value='" + value.classe_id + "'>" + value.descricao_classe + "</option>");
                });
                break;
            default:
                break;
        }
    }

    function renderUrl(filtered, id) {
        switch (filtered) {
            case 'area':
                return 'http://172.16.200.8/membro/areasbytribo/' + id;
                break;
            case 'provincia_eclesiastica':
                return 'http://172.16.200.8/membro/peclesiasticasbyigreja/' + id;
                break;
            case 'paroquia':
                return 'http://172.16.200.8/membro/paroquiasbypeclesiastica/' + id;
                break;
            case 'classe':
                return 'http://172.16.200.8/membro/classesbyparoquia/' + id;
                break;
            default:
                break;
        }
    }

    $('html').on('change', 'select.filter', function(e) {

        var selector = $(this);
        var id = selector.val() ? selector.val() : '0';
        var filtered = $("select[name=" + selector.data('get') + "]");

        $.ajax({
            url: renderUrl(selector.data('get'), id),
            type: 'GET',
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {

                filtered.html('');
                if (data.error) {
                    filtered.append("<option value='0'>Sem Resultado Disponiveis</option>");
                }

                if (data.success) {
                    filtered.append("<option value=''>Selecione uma opção</option>");
                    renderOptions(selector.data('get'), filtered, data.content);
                }
            }
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                if ($('#imgActual').length) {
                    $('#imgActual').fadeOut(100);
                }
                $('#imgPrev').fadeIn(2000);
                $('#imgPrev').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('[name=foto]').on('change', function(e) {
        readURL(this);
    });

});