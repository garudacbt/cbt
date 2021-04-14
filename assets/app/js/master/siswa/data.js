var table;

$(document).ready(function() {
  ajaxcsrf();

  table = $("#siswa").DataTable({
    initComplete: function() {
      var api = this.api();
      $("#siswa_filter input")
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
      { data: "nis" },
		{ data: "nisn" },
      { data: "nama" },
      { data: "username" },
      { data: "password" }
    ],
    columnDefs: [
      {
        searchable: false,
        targets: 7,
        data: {
          id_siswa: "id_siswa",
          ada: "ada"
        },
        render: function(data, type, row, meta) {
          let btn;
          if (data.ada > 0) {
            btn = "";
          } else {
            btn = `<button data-id="${data.id_siswa}" type="button" class="btn btn-xs btn-primary btn-aktif">
								<i class="fa fa-user-plus"></i>
							</button>`;
          }
          return `<div class="text-center">
									<a class="btn btn-xs btn-warning" href="${base_url}datasiswa/edit/${data.id_siswa}">
										<i class="fa fa-pencil"></i>
									</a>
									${btn}
								</div>`;
        }
      },
      {
        targets: 0,
        data: "id_siswa",
        render: function(data, type, row, meta) {
          return `<div class="text-center">
									<input name="checked[]" class="check" value="${data}" type="checkbox">
								</div>`;
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
      $("td:eq(1)", row).html(index);
    }
  });

  table
    .buttons()
    .container()
    .appendTo("#siswa_wrapper .col-md-6:eq(1)");

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

  $("#siswa tbody").on("click", "tr .check", function() {
    var check = $("#siswa tbody tr .check").length;
    var checked = $("#siswa tbody tr .check:checked").length;
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

  $("#siswa").on("click", ".btn-aktif", function() {
    let id = $(this).data("id");

    $.ajax({
      url: base_url + "datasiswa/create_user",
      data: "id=" + id,
      type: "GET",
      success: function(response) {
        if (response.msg) {
          var title = response.status ? "Berhasil" : "Gagal";
          var type = response.status ? "success" : "error";
          swal.fire({
            title: title,
            text: response.msg,
            type: type
          });
        }
        reload_ajax();
      }
    });
  });
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
