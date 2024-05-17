var table;
$(document).ready(function () {
    ajaxcsrf();

    $('.select2').select2();
    table = $("#jurusan").DataTable(
        {
            "aoColumnDefs": [
                { "bSortable": false, "aTargets": [0]},
                //{ "bSearchable": false, "aTargets": [ 0, 1, 2, 3 ] }
            ],
            dom:
                "<'row'<'toolbar col-sm-6'lfrtip><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        }
    );
    /*
    table = $("#jurusan").DataTable({
        initComplete: function () {
            var api = this.api();
            $("#jurusan_filter input")
                .off(".DT")
                .on("keyup.DT", function (e) {
                    api.search(this.value).draw();
                });
        },
        dom:
            "<'row'<'toolbar col-sm-6'lfrtip><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        oLanguage: {
            sProcessing: "loading..."
        },
        processing: true,
        serverSide: true,
        ajax: {
            url: base_url + "datajurusan/data",
            type: "POST"
            //data: csrf
        },
        columns: [
            {
                data: "bulk_select",
                orderable: false,
                searchable: false
            },
            {
                data: "id_jurusan",
                className: "text-center",
                orderable: false,
                searchable: false
            },
            {
                data: "kode_jurusan",
                className: "text-center",
            },
            {
                data: "nama_jurusan"
            },
            {
                data: "mapel_peminatan",
            }
        ],
        columnDefs: [
            {
                targets: 0,
                data: null,
                render: function (data, type, row, meta) {
                    //var disabled = row.deletable === '0' ? 'disabled' : 'enabled';
                    var disabled = row.deletable === '0' ? '' : '';
                    return `<div class="text-center">
									<input id="check${row.id_jurusan}" name="checked[]" class="check ${disabled}" value="${row.id_jurusan}" type="checkbox" ${disabled}>
								</div>`;
                }
            },
            {
                searchable: false,
                targets: 5,
                data: {
                    id_jurusan: "id_jurusan",
                    nama_jurusan: "nama_jurusan",
                    kode_jurusan: "kode_jurusan",
                    deletable: "deletable",
                    mapel_peminatan: "mapel_peminatan"
                },
                render: function (data, type, row, meta) {
                    //var disabled = data.deletable === "0" ? 'disabled' : '';
                    var disabled = data.deletable === "0" ? '' : '';
                    return `<div class="text-center">
									<a class="btn btn-xs btn-warning editRecord" data-toggle="modal"
									 data-target="#editJurusanModal" data-deletable="${data.deletable}"
									  data-mapel="${data.mapel_peminatan}" data-id='${data.id_jurusan}'
									   data-nama='${data.nama_jurusan}' data-kode='${data.kode_jurusan}'>
										<i class="fa fa-pencil-alt text-white"></i>
									</a>
									<!--
									<button onclick="deleteItem(${data.id_jurusan})" class="btn btn-xs btn-danger deleteRecord" data-id="${data.id_jurusan}" ${disabled}>
								<i class="fa fa-trash text-white"></i>
							</button>
									-->
								</div>`;
                }
            }
        ],
        order: [[2, "asc"]],
        rowId: function (a) {
            return a;
        },
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $("td:eq(1)", row).html(index);

            /*
            var st = data.status === '0' ? 'Nonaktif' : 'Aktif';
            $("td:eq(4)", row).html(st);
        }
    });

    */
    table
        .buttons()
        .container()
        .appendTo("#jurusan_wrapper .col-md-6:eq(1)");

    $("div.toolbar").html(
        '<button id="hapusterpilih" onclick="bulk_delete()" type="button" class="btn btn-danger mr-3 d-none" data-toggle="tooltip" title="Hapus Terpilh"><i class="far fa-trash-alt"></i></button>'
        //'<div class="btn-group">' +
        //'<button type="button" class="btn btn-default" data-toggle="tooltip" title="Print"><i class="fas fa-print"></i></button>' +
        //'<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As PDF"><i class="fas fa-file-pdf"></i></button>' +
        //'<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Word"><i class="fa fa-file-word"></i></button>' +
        //'<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Excel"><i class="fa fa-file-excel"></i></button>' +
        //'<button type="button" class="btn btn-default" data-toggle="modal" data-target="#mapelNonAktif">Lihat Mapel Nonaktif</button>' +
        //'</div>'
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

    $('#editJurusanModal').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        var nama = $(e.relatedTarget).data('nama');
        var kode = $(e.relatedTarget).data('kode');
        var mapel = $(e.relatedTarget).data('mapel');

        var arrSel = [];
        if (mapel != null) {
            arrSel = mapel.split(',');
        }
        console.log(arrSel);

        $("#namaEdit").val(nama);
        $("#kodeEdit").val(kode);
        $("#editIdJurusan").val(id);

        var selMapel = $("#mapel_peminatan");
        selMapel.html('');
        for (var key in mapels) {
            if (mapels.hasOwnProperty(key)) {
                var selected = jQuery.inArray(key, arrSel) > -1;
                selMapel.append(new Option(mapels[key], key, false, selected));
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
                //showSuccessToast('Data berhasil diupdate.');
                //table.ajax.reload();
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
