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
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="table-responsive">
                                <table id="table-siswa" class="w-100 table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center align-middle" width="40" height="40">No.</th>
                                        <th class="align-middle">Nama</th>
                                        <th class="text-center align-middle">NIS & NISN</th>
                                <th class="text-center align-middle">Username<br>Password</th>
                                <th class="text-center align-middle">Status</th>
                                <th class="text-center align-middle">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody id="table-body">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <nav aria-label="Page navigation" class="float-right">
                                <ul class="pagination" id="pagination"></ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="overlay" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('', array('id' => 'pager')); ?>
<input type="hidden" id="pager-page" name="page" value="1">
<input type="hidden" id="pager-limit" name="limit" value="10">
<input type="hidden" name="kelas" value="<?=$guru->wali_kelas?>">
<?= form_close() ?>

<script src="<?=base_url()?>/assets/app/js/jquery.twbsPagination.js" type="text/javascript"></script>
<script type="text/javascript">
    let currentPage = 1;
    let perPage = 10;
    let $pagination, defaultOpts, query;

    $(document).ready(function () {
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

        loadSiswa();
    });

    function loadSiswa() {
        $('#pager-page').val(currentPage);
        $('#loading').removeClass('d-none');
        var cari = query != null ? '&search=' + query : ''
        var dataPost = $('#pager').serialize() + cari;
        console.log('post', dataPost);
        $.ajax({
            url: base_url + 'walisiswa/list',
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
                const kls = siswa.nama_kelas != null ? '<span class="badge badge-pill badge-info">'+siswa.nama_kelas+'</span>' : '';
                const status = siswa.aktif == "0"  ? '<div class="badge badge-pill badge-danger">Nonaktif</div>' : '<div class="badge badge-pill badge-success">Aktif</div>';
                html += '<tr>' +
                    '   <td class="text-center align-middle">'+ Number((perPage * (currentPage - 1)) + (idx + 1)) +'</td>' +
                    '   <td>' +
                    '       <div class="media d-flex h-100">' +
                    '           <img class="avatar img-circle justify-content-center align-self-center"' +
                    '                src="'+base_url+siswa.foto+'" width="50" height="50" alt="User Image"> ' +
                    '           <div class="media-body ml-2 justify-content-center align-self-center">'+siswa.nama+'<br>' + kls +
                    '               <span class="badge badge-info">'+siswa.jenis_kelamin+'</span>' +
                    '           </div>' +
                    '       </div>' +
                    '   </td>' +
                    '   <td class=" align-middle">' +
                    '       <span class="badge badge-light">'+siswa.nis+'</span><br>' +
                    '       <span class="badge badge-light">'+siswa.nisn+'</span>' +
                    '   </td>' +
                    '<td>U: '+siswa.username+'<br>P: '+siswa.password+'</td>' +
                    '<td class="text-center align-middle">'+kls+'<br>'+status+'</td>' +
                    '   <td class=" align-middle">' +
                    '       <div class="text-center">' +
                    '           <a class="btn btn-xs btn-warning" href="'+base_url+'datasiswa/edit/'+siswa.id_siswa+'">' +
                    '               <i class="fa fa-pencil-alt"></i> Edit' +
                    '           </a>' +
                    '       </div>' +
                    '   </td>' +
                    '</tr>';
            });
        } else {
            html += '<tr><td colspan="6" class="text-center align-middle">Tidak ada data siswa</td><tr>';
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
