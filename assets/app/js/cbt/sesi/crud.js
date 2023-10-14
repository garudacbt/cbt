var table;

$(document).ready(function () {
	ajaxcsrf();

	table = $("#sesi").DataTable({
		initComplete: function () {
			var api = this.api();
			$("#sesi_filter input")
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
			url: base_url + "cbtsesi/data",
			type: "POST"
			//data: csrf
		},
		columns: [
			{
				data: "id_sesi",
				orderable: false,
				searchable: false
			},
			{
				data: "id_sesi",
				className: "text-center",
				orderable: false,
				searchable: false
			},
			{data: "nama_sesi"},
			{data: "kode_sesi"},
			{data: null, render: function (data, type, row) {
					return data.waktu_mulai+'  s/d  '+data.waktu_akhir;
				}}
		],
		columnDefs: [
			{
				searchable: false,
				targets: 5,
				data: {
					id_sesi: "id_sesi",
					nama_sesi: "nama_sesi",
					kode_sesi: "kode_sesi",
					waktu_mulai: "waktu_mulai",
					waktu_akhir: "waktu_akhir"
				},
				render: function (data, type, row, meta) {
					return `<div class="text-center">
									<a class="ml-1 mr-2 btn btn-warning btn-sm" data-toggle="modal" data-target="#editSesiModal"
									 data-id='${data.id_sesi}' data-nama='${data.nama_sesi}' data-kode='${data.kode_sesi}'
									 data-awal='${data.waktu_mulai}' data-akhir='${data.waktu_akhir}'>
										<i class="fa fa-pencil-alt"></i> Edit
									</a>
								</div>`;
				}
			},
			{
				targets: 0,
				data: "id_sesi",
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
		.appendTo("#sesi_wrapper .col-md-6:eq(1)");

	$("div.toolbar").html(
		'<button id="hapusterpilih" onclick="bulk_delete()" type="button" class="btn btn-danger" data-toggle="tooltip" title="Hapus Terpilh" disabled="disabled">' +
		'<i class="far fa-trash-alt"></i></button>'
		/*
		'<div class="btn-group">' +
		'<button type="button" class="btn btn-default" data-toggle="tooltip" title="Print"><i class="fas fa-print"></i></button>' +
		'<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As PDF"><i class="fas fa-file-pdf"></i></button>' +
		'<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Word"><i class="fa fa-file-word"></i></button>' +
		'<button type="button" class="btn btn-default" data-toggle="tooltip" title="Export As Excel"><i class="fa fa-file-excel"></i></button>' +
		'</div>'
		*/
	);

	$(".select_all").on("click", function () {
		if (this.checked) {
			$(".check").each(function () {
				this.checked = true;
				$(".select_all").prop("checked", true);
                $('#hapusterpilih').attr('disabled','disabled');
			});
		} else {
			$(".check").each(function () {
				this.checked = false;
				$(".select_all").prop("checked", false);
                $('#hapusterpilih').attr('disabled','disabled');
			});
		}
	});

	$("#sesi tbody").on("click", "tr .check", function () {
		var check = $("#sesi tbody tr .check").length;
		var checked = $("#sesi tbody tr .check:checked").length;
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
			url: base_url + "cbtsesi/add",
			type: "POST",
			dataType: "JSON",
			data: $(this).serialize(),
			success: function (data) {
				console.log("result", data);
				$('#createSesiModal').modal('hide').data('bs.modal', null);
				$('#createSesiModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				showSuccessToast('Data berhasil disimpan.');
				table.ajax.reload();
			}, error: function (xhr, status, error) {
				$('#createSesiModal').modal('hide').data('bs.modal', null);
				$('#createSesiModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				console.log("error", xhr.responseText);
				showDangerToast("Error");
			}
		});
	});

	$('#editSesiModal').on('show.bs.modal', function (e) {
		var id = $(e.relatedTarget).data('id');
		var nama = $(e.relatedTarget).data('nama');
		var kode = $(e.relatedTarget).data('kode');
		var awal = $(e.relatedTarget).data('awal');
		var akhir = $(e.relatedTarget).data('akhir');

		var attrNama = document.getElementById("editIdSesi");
		attrNama.setAttribute("name", "id_sesi");

		$(e.currentTarget).find('input[id="namaEdit"]').val(nama);
		$(e.currentTarget).find('input[id="kodeEdit"]').val(kode);
		$(e.currentTarget).find('input[id="editIdSesi"]').val(id);
		$(e.currentTarget).find('input[id="jamAwalEdit"]').val(awal);
		$(e.currentTarget).find('input[id="jamAkhirEdit"]').val(akhir);
	});

	$('#update').on('submit', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();

		var btn = $('#submit');
		btn.attr('disabled', 'disabled').text('Wait...');

		console.log("data", $(this).serialize());

		$.ajax({
			url: base_url + "cbtsesi/update",
			data: $(this).serialize(),
			method: 'POST',
			dataType: "JSON",
			success: function (data) {
				$('#editSesiModal').modal('hide').data('bs.modal', null);
				$('#editSesiModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				showSuccessToast('Data berhasil diupdate.');
				table.ajax.reload();
			},
			error: function (xhr, status, error) {
				$('#editSesiModal').modal('hide').data('bs.modal', null);
				$('#editSesiModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				showDangerToast("Error");
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

	$('#jamAwalEdit, #jamAkhirEdit, #jamAwal, #jamAkhir').datetimepicker({
		datepicker:false,
		format:'H:i:s',
		step: 30,
		minTime: '06:00',
		maxTime: '23:00'
	});

});

function bulk_delete() {
	if ($("#sesi tbody tr .check:checked").length == 0) {
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

