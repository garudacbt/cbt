function submitajax(url, data, msg, btn) {
    $.ajax({
        url: url,
        data: data,
        type: 'POST',
        success: function (response) {
            if (response.status) {
                swal.fire({
                    "title": "Berhasil",
                    "text": msg,
                    "type": "success"
                });
                $('form#change_password').trigger('reset');
            } else {
                if (response.errors) {
                    $.each(response.errors, function (key, val) {
                        $('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                        $('[name="' + key + '"]').nextAll('.help-block').eq(0).text(val);
                        if (val === '') {
                            $('[name="' + key + '"]').closest('.form-group').removeClass('has-error');
                            $('[name="' + key + '"]').nextAll('.help-block').eq(0).text('');
                        }
                    });
                }
                if (response.msg) {
                    swal.fire({
                        "title": "Gagal",
                        "text": "Password lama tidak benar",
                        "type": "error"
                    });
                }
            }
            btn.removeAttr('disabled').text('Ganti Password');
        }
    });
}

$(document).ready(function () {
    $('form input, form select').on('change', function () {
        $(this).closest('.form-group').removeClass('has-error');
        $(this).nextAll('.help-block').eq(0).text('');
    });

    $('form#user_info').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        let btn = $('#btn-info');
        btn.attr('disabled', 'disabled').text('Process...');

        url = $(this).attr('action');
        data = $(this).serialize();
        msg = "Informasi user berhasil diupdate";
        submitajax(url, data, msg, btn);
    });

    $('form#user_level').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        let btn = $('#btn-level');
        btn.attr('disabled', 'disabled').text('Process...');

        url = $(this).attr('action');
        data = $(this).serialize();
        msg = "Level user berhasil diupdate";
        submitajax(url, data, msg, btn);
    });

    $('form#user_status').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        let btn = $('#btn-status');
        btn.attr('disabled', 'disabled').text('Process...');

        url = $(this).attr('action');
        data = $(this).serialize();
        msg = "Status user berhasil diupdate";
        submitajax(url, data, msg, btn);
    });

});
