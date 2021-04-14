<div class="content-wrapper bg-white">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $judul ?></h1>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="card card-default my-shadow">
				<div class="card-header with-border">
					<h3 class="card-title"><?= $subjudul ?></h3>
					<div class="card-tools">
						<button type="button" onclick="reload_ajax()" class="btn btn-sm btn-default">
							<i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="users" class="w-100 table table-striped table-bordered table-hover table-sm">
							<thead>
							<tr>
								<th class="text-center align-middle" width="40" height="40">No.</th>
								<th class="text-center align-middle">NIS</th>
								<th class="align-middle">Nama</th>
								<th class="text-center align-middle">Kelas</th>
								<th class="text-center align-middle">Username</th>
								<th class="text-center align-middle">Password</th>
								<th class="text-center align-middle">Status</th>
                                <th class="text-center align-middle">Aksi</th>
							</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script type="text/javascript">
	var user_id = '<?=$user->id?>';
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
				url: base_url + "walisiswa/datakelas",
				type: "POST"
			},
			columns: [
				{
					data: "id_siswa",
					className: "text-center align-middle",
					orderable: false,
					searchable: false
				},
				{
					data: "nis",
					className: "text-center align-middle",
				},
				{
					data: "nama",
					className: "align-middle",
				},
				{
					data: "nama_kelas",
					className: "text-center align-middle",
				},
				{
					data: "username",
					className: "text-center align-middle",
				},
				{
					data: "password",
					className: "text-center align-middle",
				},
			],
			columnDefs: [
				{
					targets: 6,
					searchable: false,
					className: "text-center align-middle",
					data: {aktif: "aktif"},
					render: function (data, type, row, meta) {
						return data.aktif === '1' ? '<div class="badge badge-pill badge-success text-sm">Aktif</div>' : '<div class="badge badge-pill badge-danger text-sm">Nonaktif</div>';
					}
				},
                {
                    searchable: false,
                    targets: 7,
                    data: {
                        id_siswa: "id_siswa",
                    },
                    render: function (data, type, row, meta) {
                        return `<div class="text-center">
									<a class="btn btn-xs btn-warning" href="${base_url}walisiswa/edit/${data.id_siswa}">
										<i class="fa fa-pencil-alt"></i> Edit
									</a>
								</div>`;
                    }
                },
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
				console.log(data);
			}
		});

		table
			.buttons()
			.container()
			.appendTo("#users_wrapper .col-md-6:eq(0)");

		$("#users").on("click", ".btn-aktif", function() {
			let id = $(this).data("id");
			$.ajax({
				url: base_url + "usersiswa/activate/" + id,
				type: "GET",
				success: function (response) {
					console.log("pass", response.pass);
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
			$.ajax({
				url: base_url + "usersiswa/deactivate/" + id +"/"+nama,
				type: "GET",
				success: function (response) {
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
					$.ajax({
						url: uri,
						type: "GET",
						success: function (response) {
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
</script>
