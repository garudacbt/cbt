var table;

$(document).ready(function() {
	ajaxcsrf();

	table = $("#soal").DataTable({
		initComplete: function() {
			var api = this.api();
			$("#soal_filter input")
				.off(".DT")
				.on("keyup.DT", function(e) {
					api.search(this.value).draw();
				});
		},
		dom:
			"<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>",
		buttons: [
			{
				extend: "copy",
				exportOptions: { columns: [2, 3, 4, 5] }
			},
			{
				extend: "print",
				exportOptions: { columns: [2, 3, 4, 5] }
			},
			{
				extend: "excel",
				exportOptions: { columns: [2, 3, 4, 5] }
			},
			{
				extend: "pdf",
				exportOptions: { columns: [2, 3, 4, 5] }
			}
		],
		oLanguage: {
			sProcessing: "loading..."
		},
		processing: true,
		serverSide: true,
		ajax: {
			url: base_url + "cbtbanksoal/data",
			type: "POST"
		},
		columns: [
			{
				data: "id_soal",
				orderable: false,
				searchable: false
			},
			{
				data: "id_soal",
				orderable: false,
				searchable: false
			},
			{ data: "nama_guru" },
			{ data: "nama_mapel" },
			{ data: "soal" },
			{ data: "created_on" }
		],
		columnDefs: [
			{
				targets: 0,
				data: "id_soal",
				render: function(data, type, row, meta) {
					return `<div class="text-center">
									<input name="checked[]" class="check" value="${data}" type="checkbox">
								</div>`;
				}
			},
			{
				targets: 6,
				data: "id_soal",
				render: function(data, type, row, meta) {
					return `<div class="text-center">
                                <a href="${base_url}soal/detail/${data}" class="btn btn-xs btn-default">
                                    <i class="fa fa-eye"></i> Detail
                                </a>
                                <a href="${base_url}soal/edit/${data}" class="btn btn-xs btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </div>`;
				}
			}
		],
		order: [[5, "desc"]],
		rowId: function(a) {
			return a;
		},
		rowCallback: function(row, data, iDisplayIndex) {
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
		.appendTo("#soal_wrapper .col-md-6:eq(0)");

	$(".select_all").on("click", function() {
		if (this.checked) {
			$(".check").each(function() {
				this.checked = true;
				$(".select_all").prop("checked", true);
			});
		} else {
			$(".check").each(function() {
				this.checked = false;
				$(".select_all").prop("checked", false);
			});
		}
	});

	$("#soal tbody").on("click", "tr .check", function() {
		var check = $("#soal tbody tr .check").length;
		var checked = $("#soal tbody tr .check:checked").length;
		if (check === checked) {
			$(".select_all").prop("checked", true);
		} else {
			$(".select_all").prop("checked", false);
		}
	});

	$("#bulk").on("submit", function(e) {
		e.preventDefault();
		e.stopImmediatePropagation();

		$.ajax({
			url: $(this).attr("action"),
			data: $(this).serialize(),
			type: "POST",
			success: function(respon) {
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
			error: function() {
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
	if ($("#soal tbody tr .check:checked").length == 0) {
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
