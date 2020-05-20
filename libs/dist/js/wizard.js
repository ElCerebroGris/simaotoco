$(function() {

    function step(button) {
        $('.form-step:visible').fadeOut(200, function() {
            $('.error').html('').fadeOut();
            $('.' + button.data('step')).fadeIn(200);
        });
    }

    $('html').on('submit', 'form.form-wizard', function(e) {
        e.preventDefault();

        var form = $(this);
        var formData = new FormData(form[0]);
        var formButton = form.find('button');
        var url_target = $('span.wizard-url').data('url');

        $.ajax({
            url: url_target,
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {
                //console.log(data);

                if (data.error) {
                    $('.error').html('<p class="alert alert-danger">' + data.errMessage + '</p>').fadeIn(200);
                } else {
                    $('.error').html('').fadeOut();
                }

                if (data.success) {
                    step(formButton);
                }

                if (data.finish) {
                    location.replace(data.redirect);
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

    $('html').on('click', 'a[data-step]', function(e) {
        e.preventDefault();
        step($(this));
    });
});