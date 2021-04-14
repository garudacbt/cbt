$(document).ready(function () {
    $('#formdosen').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        var btn = $('#submit');

        btn.attr('disabled', 'disabled').text('Wait...');

        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serialize(),
            type: 'POST',
            success: function (response) {
                btn.removeAttr('disabled').text('Update');
                if (response.status) {
                    swal.fire('Sukses', 'Data Berhasil diupdate', 'success')
                        .then((result) => {
                            if (result.value) {
                                window.location.href = base_url+'dosen';
                            }
                        });
                } else {
                    $.each(response.errors, function (key, val) {
                        $('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                        $('[name="' + key + '"]').nextAll('.help-block').eq(0).text(val);
                        if (val === '') {
                            $('[name="' + key + '"]').closest('.form-group').removeClass('has-error').addClass('has-success');
                            $('[name="' + key + '"]').nextAll('.help-block').eq(0).text('');
                        }
                    });
                }
            }
        })
    });

    $('#formdosen input, #formdosen select').on('change', function () {
        $(this).closest('.form-group').removeClass('has-error has-success');
        $(this).nextAll('.help-block').eq(0).text('');
    });

    $('#tanggallahir').datetimepicker({
        icons:
            {
                next: 'fa fa-angle-right',
                previous: 'fa fa-angle-left'
            },
        format: 'YYYY-MM-DD',
        widgetPositioning: {
            horizontal: 'left',
            vertical: 'bottom'
        }
    });
});
