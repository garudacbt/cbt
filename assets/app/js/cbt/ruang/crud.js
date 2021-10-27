var table;

$(document).ready(function () {
	ajaxcsrf();

	table = $("#ruang").DataTable({
		initComplete: function () {
			var api = this.api();
			$("#ruang_filter input")
				.off(".DT")
				.on("keyup.DT", function (e) {
					api.search(this.value).draw();
				});
		},
		dom:
			"<'row'<'col-sm-6'l><'col-sm-6'f>>" +
			"<'row'<'toolbar'lfrtip>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>",
		oLanguage: {
			sProcessing: "loading..."
		},
		processing: true,
		serverSide: true,
		ajax: {
			url: base_url + "cbtruang/data",
			type: "POST"
			//data: csrf
		},
		columns: [
			{
				data: "id_ruang",
				orderable: false,
				searchable: false
			},
			{
				data: "id_ruang",
				className: "text-center",
				orderable: false,
				searchable: false
			},
			{data: "nama_ruang"},
			{data: "kode_ruang"},
			{data: "jum_sesi"}
		],
		columnDefs: [
			{
				searchable: false,
				targets: 5,
				data: {
					id_ruang: "id_ruang",
					nama_ruang: "nama_ruang",
					kode_ruang: "kode_ruang"
				},
				render: function (data, type, row, meta) {
					return `<div class="text-center">
									<a class="ml-1 mr-2 btn btn-warning btn-sm" data-toggle="modal" data-target="#editRuangModal" data-id='${data.id_ruang}' data-nama='${data.nama_ruang}' data-kode='${data.kode_ruang}'>
										<i class="fa fa-pencil-alt"></i> Edit
									</a>
								</div>`;
				}
			},
			{
				targets: 0,
				data: "id_ruang",
				render: function (data, type, row, meta) {
					return `<div class="text-center">
									<input name="checked[]" class="check" value="${data}" type="checkbox">
								</div>`;
				}
			}
		],
		order: [[1, "asc"]],
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
		.appendTo("#ruang_wrapper .col-md-6:eq(1)");

	$("div.toolbar").html(
		'<button id="hapusterpilih" onclick="bulk_delete()" type="button" class="btn btn-danger" data-toggle="tooltip" title="Hapus Terpilh" disabled="disabled">' +
		'<i class="far fa-trash-alt"></i></button>'
		/*'<div class="btn-group">' +
		'<button type="button" class="btn btn-default" data-toggle="tooltip" title="Print"><i class="fas fa-print"></i></button>' +
		'<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As PDF"><i class="fas fa-file-pdf"></i></button>' +
		'<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Word"><i class="fa fa-file-word"></i></button>' +
		'<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Excel"><i class="fa fa-file-excel"></i></button>' +
		'</div>'*/
	);

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
                $('#hapusterpilih').attr('disabled','disabled');
			});
		}
	});

	$("#ruang tbody").on("click", "tr .check", function () {
		var check = $("#ruang tbody tr .check").length;
		var checked = $("#ruang tbody tr .check:checked").length;
		if (check === checked) {
			$(".select_all").prop("checked", true);
		} else {
			$(".select_all").prop("checked", false);
		}

        if (checked === 0) {
            $('#hapusterpilih').attr('disabled','disabled');
        } else {
            $('#hapusterpilih').removeAttr('disabled');
        }
	});

	$('#create').submit('click', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		console.log("data:", $(this).serialize());

		$.ajax({
			url: base_url + "cbtruang/add",
			type: "POST",
			dataType: "JSON",
			data: $(this).serialize(),
			success: function (data) {
				console.log("result", data);
				$('#createRuangModal').modal('hide').data('bs.modal', null);
				$('#createRuangModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				showSuccessToast('Data berhasil disimpan.');
				table.ajax.reload();
			}, error: function (xhr, status, error) {
				$('#createRuangModal').modal('hide').data('bs.modal', null);
				$('#createRuangModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				console.log("error", xhr.responseText);
				showDangerToast('Error');
			}
		});
	});

	$('#editRuangModal').on('show.bs.modal', function (e) {
		var id = $(e.relatedTarget).data('id');
		var nama = $(e.relatedTarget).data('nama');
		var kode = $(e.relatedTarget).data('kode');

		$(e.currentTarget).find('input[id="namaEdit"]').val(nama);
		$(e.currentTarget).find('input[id="kodeEdit"]').val(kode);
		$(e.currentTarget).find('input[id="editIdRuang"]').val(id);

		var attrId = document.getElementById("editIdRuang");
		attrId.setAttribute("name", "id_ruang");

		var attrNama = document.getElementById("namaEdit");
		attrNama.setAttribute("name", "nama_ruang");

		var attrKode = document.getElementById("kodeEdit");
		attrKode.setAttribute("name", "kode_ruang");
	});

	$('#update').on('submit', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();

		var btn = $('#submit');
		btn.attr('disabled', 'disabled').text('Wait...');

		console.log("data", $(this).serialize());

		$.ajax({
			url: base_url + "cbtruang/update",
			data: $(this).serialize(),
			method: 'POST',
			dataType: "JSON",
			success: function (data) {
				$('#editRuangModal').modal('hide').data('bs.modal', null);
				$('#editRuangModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				showSuccessToast('Data berhasil diupdate.');
				table.ajax.reload();
			},
			error: function (xhr, status, error) {
				$('#editRuangModal').modal('hide').data('bs.modal', null);
				$('#editRuangModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				showDangerToast('Error');
			}
		});
	});

	$("#bulk").on("submit", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();

		$.ajax({
			url: $(this).attr("action"),
			data: $(this).serialize(),
			type: "POST",
			success: function (respon) {
				$('#hapusterpilih').addClass('d-none');
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
				$('#hapusterpilih').addClass('d-none');
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
	if ($("#ruang tbody tr .check:checked").length == 0) {
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

