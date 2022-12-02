var table;

$(document).ready(function () {
	ajaxcsrf();

	table = $("#siswa").DataTable({
		initComplete: function () {
			var api = this.api();
			$("#siswa_filter input")
				.off(".DT")
				.on("keyup.DT", function (e) {
					api.search(this.value).draw();
				});
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
			type: "POST"
			//data: csrf
		},
		columns: [
			{
				data: "id_siswa",
				orderable: false,
				searchable: false
			},
			{
				data: "id_siswa",
				className: "text-center",
				orderable: false,
				searchable: false
			},
			{data: "nisn"},
			{data: "nis"},
			{data: "nama"},
			{data: "jenis_kelamin", className: "text-center",},
            {data: "nama_kelas"}
		],
		columnDefs: [
			/*
            {
                searchable: false,
                targets: 6,
                className: "text-center",
                data: {
                    id_siswa: "status",
                },
                render: function (data, type, row, meta) {
                	var stat = ['', 'Aktif', 'Lulus', 'Pindah', 'Keluar'];
                    return stat[data.status];
                }
            },
            */
			{
				searchable: false,
				targets: 7,
				data: {
					id_siswa: "id_siswa",
				},
				render: function (data, type, row, meta) {
					return `<div class="text-center">
									<a class="btn btn-xs btn-warning" href="${base_url}datasiswa/edit/${data.id_siswa}">
										<i class="fa fa-pencil-alt"></i> Edit
									</a>
								</div>`;
				}
			},
			{
				targets: 0,
				data: "id_siswa",
				render: function (data, type, row, meta) {
					return `<div class="text-center">
									<input name="checked[]" class="check" value="${data}" type="checkbox">
								</div>`;
				}
			}
		],
		order: [[4, "asc"]],
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
		.appendTo("#siswa_wrapper .col-md-6:eq(1)");

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

