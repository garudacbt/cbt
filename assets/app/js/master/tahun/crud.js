let table;

$(document).ready(function () {
	ajaxcsrf();

	table = $("#tahun").DataTable({
		initComplete: function () {
			var api = this.api();
			$("#tahun_filter input")
				.off(".DT")
				.on("keyup.DT", function (e) {
					api.search(this.value).draw();
				});
		},
		oLanguage: {
			sProcessing: "loading..."
		},
		processing: true,
		serverSide: true,
		ajax: {
			url: base_url + "datatahun/data",
			type: "POST"
		},
		columns: [
			{
				data: "id_tp",
				className: "text-center",
				orderable: false,
				searchable: false
			},
			{
				data: "tahun"
			},
		],
		columnDefs: [
			{
				targets: 2,
				data: {id_tp: "id_tp", active: "active"},
				render: function (data, type, row, meta) {
					var btnAktifkan = '<span class="text-success">' +
						'<i class="fa fa-check mr-2"></i>AKTIF' +
						'</span>';
					var btnNonAktifkan = '<button data-id="${data.id_tp}" type="button" class="btn btn-xs btn-primary btn-aktif">' +
						'AKTIFKAN' +
						'</button>';
					var btn = data.active == 1 ? btnAktifkan : btnNonAktifkan;
					return `<div class="text-center">${btn}</div>`;
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
			$("td:eq(0)", row).html(index);
		}
	});

	table
		.buttons()
		.container()
		.appendTo("#tahun_wrapper .col-md-6:eq(1)");

	$("#select_all").on("click", function () {
		if (this.checked) {
			$(".check").each(function () {
				this.checked = true;
			});
		} else {
			$(".check").each(function () {
				this.checked = false;
			});
		}
	});

	$("#tahun tbody").on("click", "tr .check", function () {
		var check = $("#jurusan tbody tr .check").length;
		var checked = $("#jurusan tbody tr .check:checked").length;
		if (check === checked) {
			$("#select_all").prop("checked", true);
		} else {
			$("#select_all").prop("checked", false);
		}
	});

	$('#create').submit('click', function () {
		var tahun = $('#createtahun').val();
		//var active = $('#createactive option:selected').val()
		console.log("data:", $(this).serialize());

		$.ajax({
			url: base_url + "datatahun/add",
			type: "POST",
			dataType: "JSON",
			data: $(this).serialize(),
			success: function (data) {
				location.href = base_url + 'datatahun';
			}, error: function (xhr, status, error) {
				$('#createTahunModal').modal('hide').data('bs.modal', null);
				$('#createTahunModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				showDangerToast('Error');
			}
		});
		return false;
	});

	$("#bulkhapus").on("submit", function (e) {
		if ($(this).attr("action") == base_url + "datatahun/hapus") {
			e.preventDefault();
			e.stopImmediatePropagation();

			$.ajax({
				url: $(this).attr("action"),
				data: $(this).serialize(),
				type: "POST",
				success: function (respon) {
					if (respon.status) {
						location.href = base_url + "/datatahun";
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
		}
	});
});


function bulk_delete(frombody, id) {
	if ($("#tahun tbody tr .check:checked").length == 0) {
		swal.fire({
			title: "Failed",
			text: "Tidak ada data yang dipilih",
			icon: "error"
		});
	} else {
		$("#bulkhapus").attr("action", base_url + "datatahun/hapus");
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
				$("#bulkhapus").submit();
			}
		});
	}
}
