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
                    <h3 class="card-title">Master <?= $subjudul ?></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-action btn-success btn-sm" data-action="aktifkan"
                                data-toggle="tooltip" title="Aktifkan">
                            <i class="fa fa-users m-1"></i><span
                                    class="d-none d-sm-inline-block ml-1">Aktifkan Semua</span>
                        </button>
                        <button type="button" class="btn btn-action btn-danger btn-sm" data-action="nonaktifkan"
                                data-toggle="tooltip" title="Nonaktifkan">
                            <i class="fa fa-ban m-1"></i><span
                                    class="d-none d-sm-inline-block ml-1">Nonaktifkan Semua</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length">
                                    <label>Show
                                        <select id="users_length" aria-controls="users" class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_filter">
                                    <button id="btn-clear" type="button" class="btn btn-sm btn-light m-0" data-toggle="tooltip" title="hapus pencarian" disabled="disabled">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <label>
                                        <input id="input-search" type="search" class="form-control form-control-sm" placeholder="" aria-controls="users">
                                    </label>
                                    <button id="btn-search" type="button" class="btn btn-sm btn-light" data-toggle="tooltip" title="Cari" onclick="applySearch()" disabled="disabled">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mb-3">
                        <?= form_open('', array('id' => 'bulk')); ?>
                        <table id="users" class="w-100 table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 40px">No.</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th class="text-center">Reset Login</th>
                                <th class="text-center">Status/Aksi</th>
                            </tr>
                            </thead>
                            <tbody id="table-body">
                            </tbody>
                        </table>
                        <?= form_close() ?>
                    </div>
                    <div class="col-12">
                        <nav aria-label="Page navigation" class="float-right">
                            <ul class="pagination" id="pagination"></ul>
                        </nav>
                    </div>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('', array('id' => 'pager')); ?>
<input type="hidden" id="pager-page" name="page" value="1">
<input type="hidden" id="pager-limit" name="limit" value="10">
<?= form_close() ?>

<script src="<?=base_url()?>/assets/app/js/jquery.twbsPagination.js" type="text/javascript"></script>
<script type="text/javascript">
    let currentPage = 1;
    let perPage = 10;
    let $pagination, defaultOpts, query;

    $(document).ready(function() {
        ajaxcsrf();

        $pagination = $('#pagination');
        defaultOpts = {
            visiblePages: 5,
            initiateStartPageClick: false,
            onPageClick: function (event, page) {
                console.info(page + ' (from options)');
                currentPage = page;
                loadSiswa();
            }
        };
        $pagination.twbsPagination(defaultOpts);

        $('#users_length').change(function () {
            $('#pager-limit').val($(this).val());
            perPage = $(this).val();
            currentPage = 1;
            loadSiswa();
        });

        $('#input-search').on('change keyup', function () {
            var val = $(this).val();
            query = val === "" ? null : val;
            $('#btn-clear').attr('disabled', query == null)
            $('#btn-search').attr('disabled', query == null)
        });

        $('#btn-clear').on('click', function () {
            query = null;
            currentPage = 1;
            $(this).attr('disabled', query == null);
            $('#btn-search').attr('disabled', query == null);
            loadSiswa();
        });

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
                            loadSiswa();
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
            let username = $(this).data("username");
            let nama = $(this).data("nama").replace("'", "");
            $('#loading').removeClass('d-none');
            $.ajax({
                url: base_url + "usersiswa/deactivate/" + username +"/"+nama,
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
                            loadSiswa();
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

        $("#users").on("click", ".btn-reset", function() {
            let username = $(this).data("username");
            let nama = encodeURIComponent($(this).data("nama"));
            $('#loading').removeClass('d-none');
            $.ajax({
                url: base_url + "usersiswa/reset_login/" + username +"/"+nama,
                type: "GET",
                success: function (response) {
                    $('#loading').addClass('d-none');
                    if (response.msg) {
                        if (response.status) {
                            swal.fire({
                                title: "Sukses",
                                html: "<b>"+decodeURIComponent(response.msg)+"<b>",
                                icon: "success"
                            });
                            loadSiswa();
                        } else {
                            swal.fire({
                                title: "Error",
                                html: "<b>"+decodeURIComponent(response.msg)+"<b>",
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

        $(".btn-action").on("click", function() {
            let action = $(this).data("action");
            let uri = action === 'aktifkan' ? base_url + "usersiswa/aktifkansemua" : base_url + "usersiswa/nonaktifkansemua";

            swal.fire({
                title: action === 'aktifkan' ? "Aktifan semua siswa" : "Nonaktifkan semua siswa",
                text: "",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Lanjutkan"
            }).then(result => {
                if (result.value) {
                    $('#loading').removeClass('d-none');
                    swal.fire({
                        title: action === 'aktifkan' ? "Mengaktifkan semua siswa" : "Menonaktifkan semua siswa",
                        text: "Silahkan tunggu....",
                        button: false,
                        closeOnClickOutside: false,
                        closeOnEsc: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });

                    $.ajax({
                        url: uri,
                        type: "GET",
                        success: function (response) {
                            $('#loading').addClass('d-none');
                            console.log("result", response);
                            swal.fire({
                                title: response.status ? "Sukses" : "Gagal",
                                text: response.msg,
                                icon: response.status ? "success" : "error"
                            }).then(result => {
                                loadSiswa();
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

        loadSiswa();

    });

    function loadSiswa() {
        $('#pager-page').val(currentPage);
        $('#loading').removeClass('d-none');
        var cari = query != null ? '&search=' + query : ''
        var dataPost = $('#pager').serialize() + cari;
        console.log('post', dataPost);
        $.ajax({
            url: base_url + 'usersiswa/list',
            data: dataPost,
            type: 'POST',
            success: function (data) {
                $('#loading').addClass('d-none');
                $('#input-search').val(data.search);
                if (data.pages > 0) {
                    $pagination.removeClass('d-none');
                    $pagination.twbsPagination('destroy');
                    $pagination.twbsPagination($.extend({}, defaultOpts, {
                        startPage: currentPage,
                        totalPages: data.pages,
                    }));
                } else {
                    $pagination.addClass('d-none');
                }
                previewData(data);
            }, error: function (xhr, status, error) {
                $('#loading').addClass('d-none')
                console.log("error", xhr.responseText);
                swal.fire({
                    title: "ERROR",
                    text: "Ada kesalahan",
                    icon: "error"
                });
            }
        });
    }

    function previewData(data) {
        console.log(data);
        $('#input-search').val(data.search);
        var html = '';
        if (data.lists.length > 0) {
            $.each(data.lists, function (idx, siswa) {
                const kls = siswa.nama_kelas != null ? siswa.nama_kelas : '';
                html += `<tr>
                <td class="text-center align-middle">
                    <input type="hidden" name="ids[]" value="${siswa.id_siswa}">
                    ${Number((perPage * (currentPage - 1)) + (idx + 1))}</td>
            <td class="align-middle">${siswa.nis}</td>
            <td>
                <div class="media d-flex h-100">
                    <img class="avatar img-circle justify-content-center align-self-center" src="${base_url+siswa.foto}" width="30" height="30" alt="User Image">
                        <div class="media-body ml-2 justify-content-center align-self-center">${siswa.nama}</div>
                </div>
            </td>
            <td class="align-middle">${kls}</td>
            <td class="align-middle">${siswa.username}</td>
            <td class="align-middle">${siswa.password}</td>
            <td class="text-center align-middle">
                <button type="button" class="btn btn-default btn-xs btn-reset" ${siswa.reset == '0' ? 'disabled' : ''} data-username="${siswa.username}" data-nama="${siswa.nama}" data-toggle="tooltip" title="Reset Login"> <i class="fa fa-sync text-xs mr-1 ml-1"></i></button>
            </td>
            <td class="text-center align-middle p-1">`;
                if (siswa.aktif == "0") {
                    html += `<span class="badge badge-danger">Nonaktif</span><br><button type="button" class="btn btn-aktif btn-success btn-xs" data-id="${siswa.id_siswa}" data-toggle="tooltip" title="Aktifkan"> <i class="fa fa-user-plus text-xs mr-1 ml-1"></i> </button>`;
                } else {
                    html += `<span class="badge badge-success">Aktif</span><br><button type="button" class="btn btn-nonaktif btn-danger btn-xs" data-username="${siswa.username}" data-nama="${siswa.nama}" data-toggle="tooltip" title="Nonaktifkan"> <i class="fa fa-ban text-xs mr-1 ml-1"></i></button>`;
                }
            html +=`</td></tr>`;
            });
        } else {
            html += '<tr><td colspan="7" class="text-center align-middle">Tidak ada data siswa</td><tr>';
        }

        $('#table-body').html(html);
        $(`.avatar`).each(function () {
            $(this).on("error", function () {
                var src = $(this).attr('src').replace('profiles', 'foto_siswa');
                $(this).attr("src", src);
                $(this).on("error", function () {
                    $(this).attr("src", base_url + 'assets/img/siswa.png');
                });
            });
        });
    }

    function applySearch() {
        query = $('#input-search').val();
        currentPage = 1;
        loadSiswa();
    }


</script>