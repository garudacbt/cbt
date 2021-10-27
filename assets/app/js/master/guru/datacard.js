var table;

$(document).ready(function () {
    ajaxcsrf();

    $("#guru thead").hide();

    table = $("#guru").DataTable({
        initComplete: function () {
            var api = this.api();
            $("#guru_filter input")
                .off(".DT")
                .on("keyup.DT", function (e) {
                    api.search(this.value).draw();
                });
        },
        /*
        dom:
            "<'row'<'toolbar col-sm-6 p-0'lfrtip><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            */
        oLanguage: {
            sProcessing: "loading..."
        },
        deferRender: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: base_url + "dataguru/data",
            type: "POST"
        },
        pageLength: 12,
        columns: [
            {
                data: "id_guru",
                orderable: false,
                searchable: false,
                visible: false
            },
            {
                data: "id_guru",
                className: "text-center",
                orderable: false,
                searchable: false,
                visible: false
            },
			{
				data: "id_guru",
                searchable: false,
				render: function (data, type, row) {
                    var kelas = row.nama_kelas === null ? "" : row.nama_kelas;
                    var jabatan = row.level === null ? "--" : row.level;
                    var foto = row.foto !=null ? row.foto : base_url +'assets/img/siswa.png';
                    var kode = row.kode_guru !=null ? row.kode_guru : '';

                    return `<div class="card card-primary card-outline">
                            <div class="box-info text-center user-profile-2">
                                <div class="user-profile-inner">
                                    <img src="${foto}" class="img-circle profile-avatar" alt="User avatar">
                                    <h6 class="mt-2">${row.nama_guru}</h6>
                                    <p class="mb-2">${jabatan} ${kelas}</p>
                                    <div><b>${row.nip}</b></div>
                                    <div class="mt-3"><b>${kode}</b></div>
                                    <div class="user-button">
                                        <div class="row">
                                             <a href="${base_url}dataguru/editJabatan/${data}" class="btn btn-sm bg-primary col-12 mb-2">
                                                  <i class="fa fa-pencil-alt mr-1"></i> Edit Mapel/Jabatan
                                             </a>
                                             <a href="${base_url}dataguru/edit/${data}" class="btn btn-sm bg-warning col-12">
                                                  <i class="fa fa-pencil-alt mr-1"></i> Edit Profil
                                             </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    /*
                    return '<table class="table-borderless table-sm">' +
                        '            <tr>' +
                        '              <td rowspan="4" class="p-0"><img width="80" height="80" src="'+foto+'" class="img-circle elevation-2" alt="User Image"></td>' +
                        '              <td class="p-0"><span class="ml-2">Nama</td>' +
                        '              <td class="p-0 w-auto"><b>'+row.nama_guru+'</b></span></td>' +
                        '            </tr>' +
                        '            <tr>' +
                        '              <td class="p-0"><span class="ml-2 mr-1">Jabatan</span></td>' +
                        '              <td class="p-0"><b>'+ jabatan + ' '+ kelas +'</b></td>' +
                        '            </tr>' +
                        '            <tr>' +
                        '              <td class="p-0"><span class="ml-2">NIP</span></td>' +
                        '              <td class="p-0"><b>'+row.nip+ '</b></td>' +
                        '            </tr>' +
                        '            <tr>' +
                        '              <td class="p-0"><span class="ml-2">Kode</span></td>' +
                        '              <td  class="p-0"><b>'+kode+ '</b></td>' +
                        '            </tr>' +
                        '          </table>';
                        */
				}
			},
            {
                data: "tahun",
                className: "text-center",
                visible: false
            },
            {
                data: "nama_smt",
                className: "text-center",
                visible: false
            },
        ],
        columnDefs: [
			{
				targets: 0,
				data: "id_guru",
				render: function (data, type, row, meta) {
					return `<div class="text-center">
									<input id="check${data}" name="checked[]" class="check" value="${data}" type="checkbox">
								</div>`;
				}
			},
			{
				targets: 5,
				data: "id_guru",
                visible: false,
				render: function (data, type, row, meta) {
					return `<div class="text-center">
							<a href="${base_url}dataguru/editJabatan/${data}" class="btn btn-xs bg-warning">
								<i class="fa fa-pencil-alt mr-1"></i> Edit Mapel/Jabatan
							</a>` +
						`</div>`;
				}
			},
            {
                searchable: false,
                targets: 6,
                data: "id_guru",
                visible: false,
                render: function (data, type, row, meta) {
                    return `<div class="text-center">
							<a href="${base_url}dataguru/edit/${data}" class="btn btn-xs bg-warning">
								<i class="fa fa-pencil-alt mr-1"></i> Edit Profil
							</a>` +
						`</div>`;
                }
            },
            {
                data: "nama_guru",
                targets: 7,
                visible: false
            },
            {
                data: "level",
                targets: 8,
                visible: false,
                render: function (data, type, row) {
                    return row.level === null ? "--" : row.level;
                }
            },
            {
                data: "kode_guru",
                targets: 9,
                visible: false
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
        }
    });

    table
        .buttons()
        .container()
        .appendTo("#guru_wrapper .col-md-6:eq(1)");

    table.on('draw', function(data){
        $('#guru tbody').addClass('row');
        $('#guru tbody tr').addClass('col-md-3 p-0');
    });

    $("div.toolbar").html(
        '<button id="hapusterpilih" onclick="bulk_delete()" type="button" class="btn btn-danger mr-3 d-none" data-toggle="tooltip" title="Hapus Terpilh"><i class="far fa-trash-alt"></i></button>' +
        '<div class="btn-group">' +
        '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Print"><i class="fas fa-print"></i></button>' +
        '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As PDF"><i class="fas fa-file-pdf"></i></button>' +
        '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Word"><i class="fa fa-file-word"></i></button>' +
        '<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Excel"><i class="fa fa-file-excel"></i></button>' +
        //'<button type="button" class="btn btn-default" data-toggle="modal" data-target="#mapelNonAktif">Lihat Mapel Nonaktif</button>' +
        '</div>'
    );

    $("#select_all").on("click", function () {
        if (this.checked) {
            $(".check").each(function () {
                this.checked = true;
                $(".select_all").prop("checked", true);
                $('#hapusterpilih').removeClass('d-none');
            });
        } else {
            $(".check").each(function () {
                this.checked = false;
                $(".select_all").prop("checked", false);
                $('#hapusterpilih').addClass('d-none');
            });
        }
    });

    $("#guru tbody").on("click", "tr .check", function () {
        var check = $("#guru tbody tr .check").length;
        var checked = $("#guru tbody tr .check:checked").length;
        if (check === checked) {
            $(".select_all").prop("checked", true);
        } else {
            $(".select_all").prop("checked", false);
        }
        if (checked === 0) {
            $('#hapusterpilih').addClass('d-none');
        } else {
            $('#hapusterpilih').removeClass('d-none');
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
                $(".select_all").prop("checked", false);
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

});

function bulk_delete() {
    if ($("#guru tbody tr .check:checked").length == 0) {
        swal.fire({
            title: "Gagal",
            text: "Tidak ada data yang dipilih",
            icon: "error"
        });
    } else {
        $("#bulk").attr("action", base_url + "dataguru/delete");
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
