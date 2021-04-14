var save_label;
var table;
$(document).ready(function () {
	ajaxcsrf();

	table = $("#tableMapel").DataTable({
		initComplete: function () {
			var api = this.api();
			$("#tableMapel_filter input")
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
		paging: false,
		ajax: {
			url: base_url + "datamapel/read",
			type: "POST"
		},
		columns: [
			{
				data: "id_mapel",
				className: "text-center",
				orderable: false,
				searchable: false
			},
			{
				data: "id_mapel",
				className: "text-center",
				orderable: false,
				searchable: false
			},
			{
				data: "nama_mapel",
			},
			{
				data: "kode",
			},
            {
                data: "kelompok",
            },
            {
                data: "status",
            },
		],
		columnDefs: [
			{
				targets: 0,
                data: null,
				render: function (data, type, row, meta) {
					var disabled = row.deletable === '0' ? 'disabled' : 'enabled';
					return `<div class="text-center">
									<input id="check${row.id_mapel}" name="checked[]" class="check ${disabled}" value="${row.id_mapel}" type="checkbox" ${disabled}>
								</div>`;
				}
			},
			{
				searchable: false,
				targets: 6,
				data: {
					id_mapel: "id_mapel",
					nama_mapel: "nama_mapel",
					kode: "kode",
                    kelompok: "kelompok",
                    deletable: "deletable",
                    status: "status"
				},
				render: function (data, type, row, meta) {
                    var disabled = data.deletable === '0' ? 'disabled' : '';
					return `<div class="text-center">
									<a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editMapelModal"
									 data-deletable="${data.deletable}" data-status="${data.status}" data-id="${data.id_mapel}"
									  data-nama="${data.nama_mapel}" data-kode="${data.kode}" data-kelompok="${data.kelompok}">
										<i class="fa fa-pencil-alt text-white"></i>
									</a>
									<!--
									<button onclick="deleteItem(${data.id_mapel})" class="btn btn-xs btn-danger deleteRecord" data-id='${data.id_mapel}' ${disabled}>
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

			var st = data.status === '0' ? 'Nonaktif' : 'Aktif';
            $("td:eq(5)", row).html(st);
		}
	});

	table
		.buttons()
		.container()
		.appendTo("#tableMapel_wrapper .col-md-6:eq(1)");

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


    $("#myModal").on("shown.modal.bs", function () {
		$(':input[name="banyak"]').select();
	});

	$(".select_all").on("click", function () {
		if (this.checked) {
			$(".enabled").each(function () {
				this.checked = true;
				$(".select_all").prop("checked", true);
                $('#hapusterpilih').removeClass('d-none');
			});
		} else {
			$(".enabled").each(function () {
				this.checked = false;
				$(".select_all").prop("checked", false);
                $('#hapusterpilih').addClass('d-none');
			});
		}
	});

	$("#tableMapel tbody").on("click", "tr .check", function () {
		var check = $("#tableMapel tbody tr .check").length;
		var checked = $("#tableMapel tbody tr .check:checked").length;
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

	$('#create').on('submit', function () {
		var nama = $('#createnama').val();
		var kode = $('#createkode').val();
		console.log("data:", $(this).serialize());

		$.ajax({
			url: base_url + "datamapel/create",
			type: "POST",
			dataType: "JSON",
			data: $(this).serialize(),
			success: function (data) {
				console.log("result", data);
				$('#createMapelModal').modal('hide').data('bs.modal', null);
				$('#createMapelModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				showToastSukses('Data berhasil disimpan.');
				table.ajax.reload();
			}, error: function (xhr, status, error) {
				$('#createMapelModal').modal('hide').data('bs.modal', null);
				$('#createMapelModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				showDangerToast();
			}
		});
		return false;
	});

	$('#editMapelModal').on('show.bs.modal', function (e) {
		var id = $(e.relatedTarget).data('id');
		var nama = $(e.relatedTarget).data('nama');
		var kode = $(e.relatedTarget).data('kode');
        var kelompok = $(e.relatedTarget).data('kelompok');
        var status = $(e.relatedTarget).data('status');
        var deletable = $(e.relatedTarget).data('deletable');

        $('#namaEdit').val(nama);
        $('#kodeEdit').val(kode);
        $('#editIdMapel').val(id);
		$('#kelompok').val(kelompok);
        $('#status').val(status);

        console.log(status);
        if (deletable == 0) {
            $('#formnama').addClass('d-none');
            $('#formkode').addClass('d-none');
            $('#formkelompok').addClass('d-none');
        } else {
            $('#formnama').removeClass('d-none');
            $('#formkode').removeClass('d-none');
            $('#formkelompok').removeClass('d-none');
        }
	});

	$('#update').on('submit', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		//var btn = $('#submit');
		//btn.attr('disabled', 'disabled').text('Wait...');
		console.log("data", $(this).serialize());

		$.ajax({
			url: base_url + "datamapel/update",
			data: $(this).serialize(),
			method: 'POST',
			dataType: "JSON",
			success: function (data) {
				console.log("result", jQuery.parseJSON(data));
				//btn.removeAttr('disabled').text('Simpan');
				$('#editMapelModal').modal('hide').data('bs.modal', null);
				$('#editMapelModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});

				showSuccessToast('Data berhasil diupdate.');
				table.ajax.reload();
			},
			error: function (xhr, status, error) {
				$('#editMapelModal').modal('hide').data('bs.modal', null);
				$('#editMapelModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				showDangerToast('Error');
				console.log(xhr);
			}
		});
	});

	$("#bulk").on("submit", function (e) {
		if ($(this).attr("action") == base_url + "datamapel/delete") {
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
		}
	});
});

function aktifkan(e) {
    var id = $(e).data('id');
    console.log(id);

    $.ajax({
        url: base_url + "datamapel/aktifkan/"+id,
        type: "GET",
        success: function (data) {
            console.log("result", data);
            window.location.href = base_url + 'datamapel'
        }, error: function (xhr, status, error) {
            $('#mapelNonAktif').modal('hide').data('bs.modal', null);
            $('#mapelNonAktif').on('hidden', function () {
                $(this).data('modal', null);  // destroys modal
            });
            showDangerToast();
        }
    });
}

function dismissEdit() {
	var count = $('#tableMapel tr').length;
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
	bulk_delete("check" + id);
}

function bulk_delete(id) {
	if ($("#tableMapel tbody tr .check:checked").length == 0) {
		swal.fire({
			title: "Gagal",
			text: "Tidak ada data yang dipilih",
			icon: "error"
		});
	} else {
		$("#bulk").attr("action", base_url + "datamapel/delete");
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
                var inputs = document.getElementById(id);
                inputs.checked = false;
			}
		});
	}
}

function bulk_edit() {
	if ($("#tableMapel tbody tr .check:checked").length == 0) {
		swal.fire({
			title: "Gagal",
			text: "Tidak ada data yang dipilih",
			icon: "error"
		});
	} else {
		$("#bulk").attr("action", base_url + "datamapel/edit");
		$("#bulk").submit();
	}
}
