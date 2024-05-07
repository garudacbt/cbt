$(document).ready(function () {
    ajaxcsrf();

    $('#table-kelas').dataTable({
        paging: false,
        order: [],
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [0,5]},
        ],
    })

    $('.hapuskelas').click(function (e) {
        var kelas = $(this).data('id');
        console.log(kelas);

        swal.fire({
            title: "Hapus Data Kelas?",
            text: "Kelas beserta jumlah siswa akan dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'datakelas/hapus/'+kelas,
                    method:"GET",
                    success: function (respon) {
                        console.log(respon);
                        if (respon.kelas) {
                            window.location.href = base_url +'datakelas';
                        } else {
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa menghapus kelas",
                                icon: "error"
                            });
                        }
                    },
                    error: function (xhr, error, status) {
                        console.log(xhr.responseText);
                        swal.fire({
                            title: "Gagal",
                            text: "Tidak bisa menghapus kelas",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
});