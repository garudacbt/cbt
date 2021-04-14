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
            url: base_url + "useradmin/data",
            type: "POST"
        },
        columns: [
            {
                data: "id",
                orderable: false,
                searchable: false
            },
            { data: "first_name" },
            { data: "last_name" },
            { data: "username" },
            { data: "email" },
            { data: "level" },
            { data: "created_on" }
        ],
        columnDefs: [
            {
                targets: 5,
                data: "level",
                render: function(data, type, row, meta) {
                    return `<div class="text-center">
                            <span class="badge">${data}</span>
                        </div>`;
                }
            },
            {
                targets: 7,
                orderable: false,
                searchable: false,
                title: "Status",
                data: "active",
                render: function(data, type, row, meta) {
                    if (data === "1") {
                        return `<div class="text-center">
                                <span class="badge bg-green">Active</span>
                            </div>`;
                    } else {
                        return `<div class="text-center">
                                <span class="badge bg-red">Not Active</span>
                            </div>`;
                    }
                }
            },
            {
                targets: 8,
                data: "id",
                render: function(data, type, row, meta) {
                    if (data === user_id) {
                        return `<div class="text-center">
                                <a class="btn btn-xs bg-primary" href="${base_url}useradmin/edit/${data}">
                                    <i class="fa fa-cog fa-spin"></i>
                                </a>
                            </div>`;
                    } else {
                    	if (user_id == "1") {
							return `<div class="text-center">
                                <a type="button" class="btn btn-xs btn-warning" href="${base_url}useradmin/edit/${data}">
                                    <i class="fa fa-pencil-alt text-white"></i>
                                </a>
                                <button type="button" class="btn btn-xs btn-danger" onclick="hapus(${data})">
                                    <i class="fa fa-trash text-white"></i>
                                </button>
                            </div>`;
						} else {
							return `<div class="text-center"><i class="fa fa-ban text-danger"></i></div>`;
						}
                    }
                }
            }
        ],
        order: [[1, "asc"]],
        rowId: function(a) {
            return a;
        },
        rowCallback: function(row, data, iDisplayIndex) {
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
        .appendTo("#users_wrapper .col-md-6:eq(0)");

    $("#show_me").on("change", function() {
        let src = base_url + "useradmin/data";
        let url = $(this).prop("checked") === true ? src : src + "/" + user_id;
        table.ajax.url(url).load();
    });


	$('#create').on('submit', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		console.log("data:", $(this).serialize());

		$.ajax({
			url: base_url + "useradmin/create",
			type: "POST",
			dataType: "JSON",
			data: $(this).serialize(),
			success: function (data) {
				//console.log("result", jQuery.parseJSON(data));
				$('#createAdminModal').modal('hide').data('bs.modal', null);
				$('#createAdminModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				showSuccessToast('Data berhasil disimpan.');
				table.ajax.reload();
			}, error: function (xhr, status, error) {
				$('#createAdminModal').modal('hide').data('bs.modal', null);
				$('#createAdminModal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});
				showDangerToast(status);
			}
		});
		return false;
	});
});

function hapus(id) {
    swal.fire({
        title: "Anda yakin?",
        text: "Data akan dihapus.",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus!"
    }).then(result => {
        if (result.value) {
            $.getJSON(base_url + "useradmin/delete/" + id, function(data) {
                swal.fire({
                    title: data.status ? "Berhasil" : "Gagal",
                    text: data.status
                        ? "User berhasil dihapus"
                        : "User gagal dihapus",
                    type: data.status ? "success" : "error"
                });
                reload_ajax();
            });
        }
    });
}
