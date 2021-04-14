$(document).ready(function () {
    $('.datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });

    $('#formujian input, #formujian select').on('change', function () {
        $(this).closest('.form-group').eq(0).removeClass('has-error');
        $(this).nextAll('.help-block').eq(0).text('');
    });

    $('#formujian').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        let btn = $('#submit');
        btn.attr('disabled', 'disabled').text('Proses...');

        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serialize(),
            type: 'POST',
            success: function (data) {
                btn.removeAttr('disabled').html('<i class="fa fa-save"></i> Simpan');

                if (data.status) {
                    swal.fire({
                        "title": "Berhasil",
                        "type": "success",
                        "text": "Data berhasil disimpan"
                    }).then(result => {
                        window.location = "master";
                    });
                } else {
                    if (data.errors) {
                        $.each(data.errors, function (key, val) {
                            $('[name="' + key + '"]').closest('.form-group').eq(0).addClass('has-error');
                            $('[name="' + key + '"]').nextAll('.help-block').eq(0).text(val);
                            if (val === '') {
                                $('[name="' + key + '"]').closest('.form-group').eq(0).removeClass('has-error');
                                $('[name="' + key + '"]').nextAll('.help-block').eq(0).text('');
                            }
                        });
                    }
                }
            }
        });
    });
});
