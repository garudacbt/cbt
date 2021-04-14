var table;

$(document).ready(function() {
	ajaxcsrf();

	table = $("#users").DataTable({
		initComplete: function() {
			var api = this.api();
			$("#users_filter input")
				.off(".DT")
				.on("keyup.DT", function(e) {
					api.search(this.value).draw();
				});
		},
		oLanguage: {
			sProcessing: "loading..."
		},
		processing: true,
		serverSide: true,
		ajax: {
			url: base_url + "usersiswa/data",
			type: "POST"
		},
		columns: [
			{
				data: "id_siswa",
				className: "text-center",
				orderable: false,
				searchable: false
			},
			{ data: "nis"},
			{ data: "nama" },
			{ data: "nama_kelas"},
			{ data: "username" },
			{ data: "password" },
		],
		columnDefs: [
			{
				searchable: false,
				className: "text-center",
				targets: 6,
				data: {
					id_siswa: "id_siswa",
					nama: "nama",
					aktif: "aktif",
					id : "id"
				},
				render: function(data, type, row, meta) {
					let btn;
					if (data.aktif > 0) {
						btn = `<button type="button" class="btn btn-nonaktif btn-danger btn-xs" data-id="${data.id}" data-nama="${data.nama}" data-toggle="tooltip" title="Nonaktifkan">
								<i class="fa fa-ban m-1"></i>
							</button>`;
					} else {
						btn = `<button type="button" class="btn btn-aktif btn-success btn-xs" data-id="${data.id_siswa}" data-toggle="tooltip" title="Aktifkan">
								<i class="fa fa-user-plus m-1"></i>
							</button>`;
					}
					return btn;
				}
			}
		],
		order: [[2, "asc"]],
		rowId: function(a) {
			return a;
		},
		rowCallback: function(row, data, iDisplayIndex) {
			var info = this.fnPagingInfo();
			var page = info.iPage;
			var length = info.iLength;
			var index = page * length + (iDisplayIndex + 1);
			$("td:eq(0)", row).html(index);
		},
		createdRow: function( row, data, dataIndex ) {
			//console.log(data);
		}
	});

	table
		.buttons()
		.container()
		.appendTo("#users_wrapper .col-md-6:eq(0)");

	$("#users").on("click", ".btn-aktif", function() {
		let id = $(this).data("id");
		$('#loading').removeClass('d-none');
		$.ajax({
			url: base_url + "usersiswa/activate/" + id,
			type: "GET",
			success: function (response) {
				console.log("pass", response.pass);
                $('#loading').addClass('d-none');
				if (response.msg) {
					if (response.status) {
						swal.fire({
							title: "Sukses",
							text: response.msg,
							icon: "success"
						});
						reload_ajax();
					} else {
						swal.fire({
							title: "Error",
							text: response.msg,
							icon: "error"
						});
					}
				}
			},
			error: function(xhr, status, error) {
				console.log(xhr);
				Swal.fire({
					title: "Gagal",
					html: xhr.responseText,
					icon: "error"
				});
			}
		});
	});

	$("#users").on("click", ".btn-nonaktif", function() {
		let id = $(this).data("id");
		let nama = $(this).data("nama").replace("'", "");
        $('#loading').removeClass('d-none');
		$.ajax({
			url: base_url + "usersiswa/deactivate/" + id +"/"+nama,
			type: "GET",
			success: function (response) {
                $('#loading').addClass('d-none');
				if (response.msg) {
					if (response.status) {
						swal.fire({
							title: "Sukses",
							text: response.msg,
							icon: "success"
						});
						reload_ajax();
					} else {
						swal.fire({
							title: "Error",
							text: response.msg,
							icon: "error"
						});
					}
				}
			}
		});
	});

	$(".btn-action").on("click", function() {
		let action = $(this).data("action");
		let uri = action === 'aktifkan' ? base_url + "usersiswa/aktifkansemua" : base_url + "usersiswa/nonaktifkansemua";
		swal.fire({
			title: action === 'aktifkan' ? "Aktifan Semua Siswa" : "Nonaktifkan Semua Siswa",
			text: "",
			icon: "info",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Lanjutkan"
		}).then(result => {
			if (result.value) {
                $('#loading').removeClass('d-none');
				$.ajax({
					url: uri,
					type: "GET",
					success: function (response) {
                        $('#loading').addClass('d-none');
						console.log("result", response.jumlah);
						swal.fire({
							title: response.status ? "Sukses" : "Gagal",
							text: response.msg,
							icon: response.status ? "success" : "error"
						}).then(result => {
							reload_ajax();
						});
					},
					error: function(xhr, status, error) {
						console.log(xhr);
						Swal.fire({
							title: "Gagal",
							html: xhr.responseText,
							icon: "error"
						});
					}
				});
			}
		});

	});

});

function editLogin(id) {
	console.log("id", id);
	window.location.href = base_url + "usersiswa/edit/"+id;
}
