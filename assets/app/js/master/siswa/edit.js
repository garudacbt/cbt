function load_kelas(id) {
    $('#kelas').find('option').not(':first').remove();

    $.ajax({
        url: base_url+'kelas/kelas_by_jurusan/' + id,
        icon: 'GET',
        success: function (data) {
            var option = [];
            for (let i = 0; i < data.length; i++) {
                option.push({
                    id: data[i].id_kelas,
                    text: data[i].nama_kelas
                });
            }
            $('#kelas').select2({
                data: option
            })
        }
    });
}

$(document).ready(function () {

    ajaxcsrf();

    $('form#siswa input, form#siswa select').on('change', function () {
        $(this).closest('.form-group').removeClass('has-error has-success');
        $(this).nextAll('.help-block').eq(0).text('');
    });

    /*
    $('[name="jenis_kelamin"]').on('change', function () {
        $(this).parent().nextAll('.help-block').eq(0).text('');
    });
    */

    $('.tahun').datetimepicker({
        icons:
            {
                next: 'fa fa-angle-right',
                previous: 'fa fa-angle-left'
            },
        timepicker: false,
        format: 'Y-m-d',
        widgetPositioning: {
            horizontal: 'left',
            vertical: 'bottom'
        }
    });

    $('form#siswa').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var btn = $('#submit');
        btn.attr('disabled', 'disabled').text('Wait...');

        $.ajax({
            url: $(this).attr('action'),
            data: $(this).serialize(),
            type: 'POST',
            success: function (data) {
                console.log(data);
                btn.removeAttr('disabled').text('Simpan');
                if (data.insert) {
                    swal.fire({
                        "title": "Sukses",
                        "text": data.text,
                        "icon": "success",
                        "type": "success"
                    }).then((result) => {
                        if (result.value) {
                            window.location.reload(true)// = base_url+'datasiswa';
                        }
                    });
                } else {
                    swal.fire({
                        "title": "Error",
                        "text": data.text,
                        "icon": "error",
                    });
                }
            }, error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
                swal.fire({
                    title: "ERROR",
                    text: "Data Tidak Tersimpan",
                    icon: "error"
                });
            }
        });
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
