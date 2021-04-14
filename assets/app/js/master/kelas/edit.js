$(document).ready(function () {
    $('form#kelas input, form#kelas select').on('change', function () {
        $(this).closest('.form-group').removeClass('has-error');
        $(this).next().next().text('');
    });

    $('form#kelas').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var btn = $('#submit');
        btn.attr('disabled', 'disabled').text('Wait...');

        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serialize(),
            method: 'POST',
            success: function (data) {
                btn.removeAttr('disabled').text('Simpan');
                //console.log(data);
                if (data.status) {
                    swal.fire({
                        "title": "Sukses",
                        "text": "Data Berhasil disimpan",
                        "type": "success"
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = base_url+'kelas';
                        }
                    });
                } else {
                    var j;
                    for (let i = 0; i <= data.errors.length; i++) {
                        $.each(data.errors[i], function (key, val) {
                            j = $('[name="' + key + '"]');
                            j.closest('.form-group').addClass('has-error');
                            j.next().next().text(val);
                            if (val == '') {
                                j.closest('.form-group').addClass('has-error');
                                j.next().next().text('');
                            }
                        });
                    }
                }
            }
        });
    });
});
