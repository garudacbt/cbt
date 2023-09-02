var table;

$(document).ready(function () {
    ajaxcsrf();
    var startTime = Date.now();
    table = $("#siswa")
        .on('preXhr.dt', function () {
            console.log('Send ajax request ', Date.now() - startTime + ' milliseconds.');
        })
        .on('xhr.dt', function () {
            console.log('Received ajax response ', Date.now() - startTime + ' milliseconds.');
        })
        .DataTable({
        initComplete: function () {
            var api = this.api();
            $("#siswa_filter input")
                .off(".DT")
                .on("keyup.DT", function (e) {
                    api.search(this.value).draw();
                });
            console.log('DT init complete in ', Date.now() - startTime + ' milliseconds.');
        },
        dom:
            "<'row'<'col-md-6'l><'col-md-6'f>>" +
            "<'row'<'toolbar col-md-6 p-0'lfrtip>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        oLanguage: {
            sProcessing: "loading..."
        },
        processing: true,
        serverSide: true,
        ajax: {
            url: base_url + "datasiswa/data",
            type: "POST",
            //data: csrf,
            /*
            success: function(data) {
                console.log(data);
                console.log('Received ajax response ', Date.now() - startTime + ' milliseconds.');
            }
             */
        },
        columns: [
            {
                data: "id_siswa",
                className: "text-center align-middle",
                orderable: false,
                searchable: false
            },
            {
                data: "id_siswa",
                className: "text-center align-middle",
                orderable: false,
                searchable: false
            },
            {data: "nama"},
            {data: "nis"},
            //{data: "jenis_kelamin", className: "text-center",},
            //{data: "nama_kelas"}
        ],
        columnDefs: [
            {
                targets: 0,
                data: "id_siswa",
                render: function (data, type, row) {
                    return `<input name="checked[]" class="check" value="${data}" type="checkbox">`;
                }
            },
            {
                searchable: true,
                targets: 2,
                data: "id_siswa",
                render: function (data, type, row) {
					return `<div class="media d-flex h-100">
                		<img class="avatar img-circle justify-content-center align-self-center" src="${base_url + row.foto}" width="50" height="50" alt="User Image">
      					<div class="media-body ml-2 justify-content-center align-self-center">
							${row.nama}<br>
							<span class="badge badge-info">${row.nama_kelas}</span>
							<span class="badge badge-info">${row.jenis_kelamin}</span>
      					</div>
      				</div>`;
                }
            },
            {
                searchable: true,
                targets: 3,
                className: "align-middle",
                data: "id_siswa",
                render: function (data, type, row) {
                    return `<span class="badge badge-light">${row.nis}</span><br>
							<span class="badge badge-light">${row.nisn}</span>`;
                }
            },
            {
                searchable: false,
                targets: 4,
				className: "align-middle",
                data: {
                    id_siswa: "id_siswa",
                },
                render: function (data, type, row) {
                    return `<div class="text-center">
									<a class="btn btn-xs btn-warning" href="${base_url}datasiswa/edit/${data.id_siswa}">
										<i class="fa fa-pencil-alt"></i> Edit
									</a>
								</div>`;
                }
            },
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
            //console.log('data', data);
        }
    });

    table
        .buttons()
        .container()
        .appendTo("#siswa_wrapper .col-md-6:eq(1)");

    table.on('draw', function () {
        $(`.avatar`).each(function () {
            $(this).on("error", function () {
                var src = $(this).attr('src').replace('profiles', 'foto_siswa');
                $(this).attr("src", src);
                $(this).on("error", function () {
                    $(this).attr("src", base_url + 'assets/img/siswa.png');
                });
            });
        });
    });

    $("div.toolbar").html(
        '<button id="hapusterpilih" onclick="bulk_delete()" type="button" class="btn btn-danger" data-toggle="tooltip" title="Hapus Terpilh" disabled="disabled">' +
        '<i class="far fa-trash-alt mr-2"></i> Hapus Terpilih</button>'
        /*
        '<div class="btn-group">' +
        '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Print"><i class="fas fa-print"></i></button>' +
        '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As PDF"><i class="fas fa-file-pdf"></i></button>' +
        '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Word"><i class="fa fa-file-word"></i></button>' +
        '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Excel"><i class="fa fa-file-excel"></i></button>' +
        //'<button type="button" class="btn btn-default" data-toggle="modal" data-target="#mapelNonAktif">Lihat Mapel Nonaktif</button>' +
        '</div>'
        */
    );

    /*
    $("div.toolbar").html(
        '<button id="hapusterpilih" onclick="bulk_delete(false)" type="button" class="btn btn-danger mr-3 d-none" data-toggle="tooltip" title="Hapus Terpilh"><i class="far fa-trash-alt"></i></button>' +
        '<div class="btn-group">' +
        '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Print"><i class="fas fa-print"></i></button>' +
        '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As PDF"><i class="fas fa-file-pdf"></i></button>' +
        '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Word"><i class="fa fa-file-word"></i></button>' +
        '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Excel"><i class="fa fa-file-excel"></i></button>' +
        '</div>'
    );
    */

    $(".select_all").on("click", function () {
        if (this.checked) {
            $(".check").each(function () {
                this.checked = true;
                $(".select_all").prop("checked", true);
                $('#hapusterpilih').removeAttr('disabled');
            });
        } else {
            $(".check").each(function () {
                this.checked = false;
                $(".select_all").prop("checked", false);
                $('#hapusterpilih').attr('disabled', 'disabled');
            });
        }
    });

    $("#siswa tbody").on("click", "tr .check", function () {
        var check = $("#siswa tbody tr .check").length;
        var checked = $("#siswa tbody tr .check:checked").length;
        if (check === checked) {
            $(".select_all").prop("checked", true);
        } else {
            $(".select_all").prop("checked", false);
        }

        if (checked === 0) {
            //$('#hapusterpilih').addClass('d-none');
            $('#hapusterpilih').attr('disabled', 'disabled');
        } else {
            //$('#hapusterpilih').removeClass('d-none');
            $('#hapusterpilih').removeAttr('disabled');
        }
    });

    $("#bulk").on("submit", function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        $.ajax({
            url: $(this).attr("action"),
            data: $(this).serialize(),
            type: "POST",
            success: function (respon) {
                if (respon.status) {
                    swal.fire({
                        title: "Berhasil",
                        text: respon.total + " data berhasil dihapus",
                        icon: "success"
                    });
                } else {
                    swal.fire({
                        title: "Gagal",
                        text: "Tidak ada data yang dipilih",
                        icon: "error"
                    });
                }
                reload_ajax();
            },
            error: function () {
                swal.fire({
                    title: "Gagal",
                    text: "Ada data yang sedang digunakan",
                    icon: "error"
                });
            }
        });
    });

    $('#tahunmasuk').datetimepicker({
        icons:
            {
                next: 'fa fa-angle-right',
                previous: 'fa fa-angle-left'
            },
        timepicker: false,
        format: 'Y-m-d',
        disabledWeekDays: [0],
        widgetPositioning: {
            horizontal: 'left',
            vertical: 'bottom'
        }
    });

    $('#formsiswa').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        console.log($(this).serialize());
        $.ajax({
            url: base_url + "datasiswa/create",
            data: $(this).serialize(),
            dataType: "JSON",
            type: 'POST',
            success: function (response) {
                console.log("result", response);
                $('#createSiswaModal').modal('hide').data('bs.modal', null);
                $('#createSiswaModal').on('hidden', function () {
                    $(this).data('modal', null);  // destroys modal
                });

                if (response.insert) {
                    showSuccessToast(response.text);
                    table.ajax.reload();
                } else {
                    showDangerToast(response.text);
                }
            },
            error: function (xhr, status, error) {
                $('#createSiswaModal').modal('hide').data('bs.modal', null);
                $('#createSiswaModal').on('hidden', function () {
                    $(this).data('modal', null);  // destroys modal
                });
                showDangerToast("Gagal disimpan");
                console.log(xhr.responseText);
            }
        })
    });

    /*
    $('#formsiswa input, #formsiswa select').on('change', function () {
        $(this).closest('.form-group').removeClass('has-error has-success');
        $(this).nextAll('.help-block').eq(0).text('');
    });
    */
});

function bulk_delete() {
    if ($("#siswa tbody tr .check:checked").length == 0) {
        swal.fire({
            title: "Gagal",
            text: "Tidak ada data yang dipilih",
            icon: "error"
        });
    } else {
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
            }
        });
    }
}

