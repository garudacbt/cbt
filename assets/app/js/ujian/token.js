$(document).ready(function () {
    ajaxcsrf();

    $('#btncek').on('click', function () {
        var token = $('#token').val();
        var idUjian = $(this).data('id');
        if (token === '') {
            swal.fire('Gagal', 'Token harus diisi', 'error');
        } else {
            var key = $('#id_ujian').data('key');
            $.ajax({
                url: base_url + 'ujian/cektoken/',
                type: 'POST',
                data: {
                    id_ujian: idUjian,
                    token: token
                },
                cache: false,
                success: function (result) {
                    swal.fire({
                        "type": result.status ? "success" : "error",
                        "title": result.status ? "Berhasil" : "Gagal",
                        "text": result.status ? "Token Benar" : "Token Salah"
                    }).then((data) => {
                        if(result.status){
                            location.href = base_url + 'ujian/?key=' + key;
                        }
                    });
                }
            });
        }
    });

    var time = $('.countdown');
    if (time.length) {
        countdown(time.data('time'));
    }
});
