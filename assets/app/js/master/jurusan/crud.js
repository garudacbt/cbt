var table;
$(document).ready(function () {
    ajaxcsrf();

    $('.select2').select2({
        theme: "bootstrap4",
    });

    table = $("#jurusan").DataTable(
        {
            order: [],
            "aoColumnDefs": [
                { "bSortable": false, "aTargets": [0,1,5]},
                //{ "bSearchable": false, "aTargets": [ 0, 1, 2, 3 ] }
            ],
            dom:
                "<'row'<'toolbar col-sm-6'lfrtip><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            /*
            columnDefs: [ {
                "targets": 0,
                "orderable": false
            } ]
             */
        }
    );
    table
        .buttons()
        .container()
        .appendTo("#jurusan_wrapper .col-md-6:eq(1)");

    $("div.toolbar").html(
        '<button id="hapusterpilih" onclick="bulk_delete()" type="button" class="btn btn-danger mr-3 d-none" data-toggle="tooltip" title="Hapus Terpilh"><i class="far fa-trash-alt"></i></button>'
    );

    $("#select_all").on("click", function () {
        if (this.checked) {
            $(".check").each(function () {
                this.checked = true;
                $("#select_all").prop("checked", true);
                $('#hapusterpilih').removeClass('d-none');
            });
        } else {
            $(".check").each(function () {
                this.checked = false;
                $("#select_all").prop("checked", false);
                $('#hapusterpilih').addClass('d-none');
            });
        }
    });

    $("#jurusan tbody").on("click", "tr .check", function () {
        var check = $("#jurusan tbody tr .check").length;
        var checked = $("#jurusan tbody tr .check:checked").length;
        if (check === checked) {
            $("#select_all").prop("checked", true);
        } else {
            $("#select_all").prop("checked", false);
        }
        if (checked === 0) {
            $('#hapusterpilih').addClass('d-none');
        } else {
            $('#hapusterpilih').removeClass('d-none');
        }
    });

    /*
    $('#createJurusanModal').on('show.bs.modal', function (e) {
        var nama = $(e.relatedTarget).data('nama');
        var kode = $(e.relatedTarget).data('kode');
        var mapel = $(e.relatedTarget).data('mapel');

        var arrSel = [];
        if (mapel != null) {
            arrSel = mapel.split(',');
        }
        console.log(arrSel);

        $("#createnama").val(nama);
        $("#createkode").val(kode);

        var selMapel = $("#create_mapel_peminatan");
        selMapel.html('');
        for (var key in mapels) {
            if (mapels.hasOwnProperty(key)) {
                var selected = jQuery.inArray(key, arrSel) > -1;
                selMapel.append(new Option(mapels[key], key, false, selected));
            }
        }
    });
     */

    $('#editJurusanModal').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        var nama = $(e.relatedTarget).data('nama');
        var kode = $(e.relatedTarget).data('kode');
        var mapel = $(e.relatedTarget).data('mapel');

        var arrSel = [];
        if (mapel != null) {
            arrSel = mapel.split(',');
        }

        $("#namaEdit").val(nama);
        $("#kodeEdit").val(kode);
        $("#editIdJurusan").val(id);

        for (kode in mapels) {
            var selMapel = $(`#mapel_peminatan${kode}`);
            selMapel.html('');
            for (var key in mapels[kode]) {
                console.log('mapel', mapels[kode])
                if (mapels[kode].hasOwnProperty(key)) {
                    var selected = jQuery.inArray(key, arrSel) > -1;
                    selMapel.append(new Option(mapels[kode][key], key, false, selected));
                }
            }
        }
    });

    $('#create').submit('click', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
        //var nama = $('#createnama').val();
        //var kode = $('#createkode').val();
        console.log("data:", $(this).serialize());

        $.ajax({
            url: base_url + "datajurusan/add",
            type: "POST",
            dataType: "JSON",
            data: $(this).serialize(),
            success: function (data) {
                console.log("result", data);
                $('#createJurusanModal').modal('hide').data('bs.modal', null);
                $('#createJurusanModal').on('hidden', function () {
                    $(this).data('modal', null);  // destroys modal
                });
                //showSuccessToast('Data berhasil disimpan.');
                //table.ajax.reload();
                window.location.reload(true);
            }, error: function (xhr, status, error) {
                $('#createJurusanModal').modal('hide').data('bs.modal', null);
                $('#createJurusanModal').on('hidden', function () {
                    $(this).data('modal', null);  // destroys modal
                });
                console.log("error", xhr.responseText);
                showDangerToast('Error');
            }
        });
    });

    $('#update').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var btn = $('#submit');
        btn.attr('disabled', 'disabled').text('Wait...');

        console.log("data", $(this).serialize());

        $.ajax({
            url: base_url + "datajurusan/update",
            data: $(this).serialize(),
            method: 'POST',
            dataType: "JSON",
            success: function (data) {
                console.log("result", data);
                btn.removeAttr('disabled').text('Simpan');
                $('#editJurusanModal').modal('hide').data('bs.modal', null);
                $('#editJurusanModal').on('hidden', function () {
                    $(this).data('modal', null);  // destroys modal
                });
                window.location.reload(true);
            },
            error: function (xhr, status, error) {
                $('#editJurusanModal').modal('hide').data('bs.modal', null);
                $('#editJurusanModal').on('hidden', function () {
                    $(this).data('modal', null);  // destroys modal
                });
                showDangerToast('Error');
            }
        });
    });

    $("#bulk").on("submit", function (e) {
        if ($(this).attr("action") == base_url + "datajurusan/delete") {
            e.preventDefault();
            e.stopImmediatePropagation();

            console.log("selected", $(this).serialize());
            $.ajax({
                url: $(this).attr("action"),
                data: $(this).serialize(),
                type: "POST",
                success: function (respon) {
                    console.log('jurusan', respon);
                    if (respon.status) {
                        //showSuccessToast(respon.total + " data berhasil dihapus");
                        window.location.reload(true);
                        //reload_ajax();
                    } else {
                        swal.fire({
                            title: "Gagal",
                            html: respon.total,
                            icon: "error"
                        });
                    }
                },
                error: function () {
                    swal.fire({
                        title: "Gagal",
                        text: "Ada data yang sedang digunakan",
                        icon: "error"
                    });
                }
            });
        }
    });
});

function dismissEdit() {
    var count = $('#jurusan tr').length;
    console.log("size", "-->"+count);
    for (var i = 0; i<count; i++) {
        var inputs = document.getElementById('check'+i);
        if (inputs!=null) {
            inputs.checked = false;
            console.log("id", "-->"+'check'+i);
        }
    }
}

function deleteItem(id) {
    dismissEdit();
    var checkBox = document.getElementById("check" + id);
    checkBox.checked = true;
    bulk_delete(true, "check" + id);
}

function bulk_delete(frombody, id) {
    if ($("#jurusan tbody tr .check:checked").length == 0) {
        swal.fire({
            title: "Failed",
            text: "Tidak ada data yang dipilih",
            icon: "error"
        });
    } else {
        $("#bulk").attr("action", base_url + "datajurusan/delete");
        swal.fire({
            title: "Anda yakin?",
            text: "Data akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
                $("#bulk").submit();
            } else {
                if (frombody) {
                    var inputs = document.getElementById(id);
                    inputs.checked = false;
                }
            }
        });
    }
}
