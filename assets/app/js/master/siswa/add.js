function load_jurusan() {
    $('#jurusan').find('option').not(':first').remove();

    $.getJSON(base_url+'jurusan/load_jurusan', function (data) {
        var option = [];
        for (let i = 0; i < data.length; i++) {
            option.push({
                id: data[i].id_jurusan,
                text: data[i].nama_jurusan
            });
        }
        $('#jurusan').select2({
            data: option
        })
    });
}

function load_kelas(id) {
    $('#kelas').find('option').not(':first').remove();

    $.getJSON(base_url+'kelas/kelas_by_jurusan/' + id, function (data) {
        var option = [];
        for (let i = 0; i < data.length; i++) {
            option.push({
                id: data[i].id_kelas,
                text: data[i].nama_kelas
            });
        }
        $('#kelas').select2({
            data: option
        });
    });
}

$(document).ready(function () {

    ajaxcsrf();

    // Load Jurusan
    load_jurusan();

    // Load Kelas By Jurusan
    $('#jurusan').on('change', function () {
        load_kelas($(this).val());
    });

    $('form#mahasiswa input, form#mahasiswa select').on('change', function () {
        $(this).closest('.form-group').removeClass('has-error has-success');
        $(this).nextAll('.help-block').eq(0).text('');
    });

    $('[name="jenis_kelamin"]').on('change', function () {
        $(this).parent().nextAll('.help-block').eq(0).text('');
    });

    $('form#mahasiswa').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var btn = $('#submit');
        btn.attr('disabled', 'disabled').text('Wait...');

        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serialize(),
            type: 'POST',
            success: function (data) {
                btn.removeAttr('disabled').text('Simpan');
                if (data.status) {
                    swal.fire({
                        "title": "Sukses",
                        "text": "Data Berhasil disimpan",
                        "type": "success"
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = base_url+'mahasiswa';
                        }
                    });
                } else {
                    console.log(data.errors);
                    $.each(data.errors, function (key, value) {
                        $('[name="' + key + '"]').nextAll('.help-block').eq(0).text(value);
                        $('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                        if (value == '') {
                            $('[name="' + key + '"]').nextAll('.help-block').eq(0).text('');
                            $('[name="' + key + '"]').closest('.form-group').removeClass('has-error').addClass('has-success');
                        }
                    });
                }
            }
        });
    });
});
