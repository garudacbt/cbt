<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 12/06/2020
 * Time: 10.26
 */
?>

<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul ?></h1>
                </div>
                <!--
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
                -->
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <div class="card-title"><?= $subjudul ?></div>
                    <div class="card-tools">
                        <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </button>
                        <button type="button" data-from="add" data-toggle="modal" data-target="#createTahunModal"
                                class="btn btn-sm bg-gradient-primary"><i
                                    class="fas fa-plus"></i><span class="d-none d-sm-inline-block ml-1">Tambah Tahun Pelajaran</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7 mb-4 table-responsive">
                            <label>Tahun Pelajaran</label>
                            <?= form_open('', array('id' => 'edittp')) ?>
                            <table id="tahun" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="d-none">id</th>
                                    <th width="50" height="50" class="text-center p-0 align-middle">No.</th>
                                    <th class="text-center p-0 align-middle">Tahun Pelajaran</th>
                                    <th class="text-center p-0 align-middle p-0">Status</th>
                                    <th class="text-center p-0 align-middle">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($tp as $key => $value) : ?>
                                    <tr>
                                        <td class="d-none">
                                            <?= $value->id_tp ?>
                                        </td>
                                        <td class="text-center">
                                            <?= ($key + 1) ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $value->tahun ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value->active) : ?>
                                                <span class="text-success"><i class="fa fa-check mr-2"></i>AKTIF</span>
                                            <?php else : ?>
                                                <button type="button" data-id="<?= $value->id_tp ?>"
                                                        class="btn btn-xs btn-primary btn-aktif">AKTIFKAN
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" data-id="<?= $value->id_tp ?>"
                                                        data-tahun="<?= $value->tahun ?>" data-from="edit"
                                                        data-toggle="modal" data-target="#createTahunModal"
                                                        class="btn btn-xs btn-warning btn-edit">Edit
                                                </button>
                                                <button type="button" data-id="<?= $value->id_tp ?>"
                                                        class="btn btn-xs btn-danger btn-hapus">Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?= form_close() ?>
                        </div>
                        <div class="col-md-5">
                            <label>Semester</label>
                            <?= form_open('', array('id' => 'editsmt')) ?>
                            <table id="semester" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="d-none">id</th>
                                    <th width="50" height="50" class="text-center p-0 align-middle">No.</th>
                                    <th class="text-center p-0 align-middle">Semester</th>
                                    <th class="text-center p-0 align-middle p-0">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($smt as $key => $value) : ?>
                                    <tr>
                                        <td class="d-none">
                                            <?= $value->id_smt ?>
                                        </td>
                                        <td class="text-center">
                                            <?= ($key + 1) ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $value->smt ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($value->active) : ?>
                                                <span class="text-success"><i class="fa fa-check mr-2"></i>AKTIF</span>
                                            <?php else : ?>
                                                <button type="button" data-id="<?= $value->id_smt ?>"
                                                        class="btn btn-xs btn-primary btn-aktif">AKTIFKAN
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?= form_close() ?>
                            <?= form_open('', array('id' => 'hariefektif')) ?>
                            <label>Jumlah Hari Efektif Satu Semester</label>
                            <div class="input-group">
                                <input name="jml_hari" value="<?= $jml_hari ?>" type="number" class="form-control"
                                       required>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">Simpan</button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('create', array('id' => 'create')) ?>
<div class="modal fade" id="createTahunModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Tahun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Tahun*</label>
                    <div class="col-md-10">
                        <input type="text" id="createtahun" name="tahun" class="form-control" required>
                    </div>
                </div>
                <!--
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Status*</label>
                    <div class="col-md-10">
                        <select name="active_tahun" id="createactive" class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak aktif</option>
                        </select>
                    </div>
                </div>
                -->
            </div>
            <div class="modal-footer">
                <input type="hidden" id="editIdTahun" class="form-control">
                <input type="hidden" id="method" name="method" class="form-control">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<div class="modal-box">
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <div class="modal-body">
                    <div class="icon"><i class="fa fa-close"></i></div>
                    <h3 class="title">Woohoo! <br> Lorem ipsum dolor sit amet</h3>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid commodi
                        consequatur cumque </p>
                    <button class="subscribe">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"
        src="<?= base_url() ?>/assets/plugins/jquery-table2json/src/tabletojson-cell.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jquery-table2json/src/tabletojson-row.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jquery-table2json/src/tabletojson.js"></script>
<script>
    $(document).ready(function () {
        ajaxcsrf();

        $("#tahun").on("click", ".btn-aktif", function () {
            let id = $(this).data("id");
            var dataTahun = JSON.stringify($('#tahun').tableToJSON());
            var replaced = dataTahun.replace(/Tahun Pelajaran/g, "tp");

            //console.log($('#edittp').serialize() + "&active=" + id + "&tahun=" + replaced);
            swal.fire({
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
                url: base_url + "datatahun/gantitahun",
                data: $('#edittp').serialize() + "&active=" + id + "&tahun=" + replaced,
                type: "POST",
                success: function (response) {
                    var title = response.status ? "Berhasil" : "Gagal";
                    var type = response.status ? "success" : "error";

                    swal.fire({
                        title: title,
                        text: response.msg,
                        icon: type
                    }).then((result) => {
                        if (result.value) {
                            if (response.status) {
                                window.location.href = base_url + 'datatahun';
                            }
                        }
                    });
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        });

        $('#createTahunModal').on('show.bs.modal', function (e) {
            var method = $(e.relatedTarget).data('from');
            $(e.currentTarget).find('input[id="method"]').val(method);

            if (method === 'edit') {
                $('#createModalLabel').text('Edit Tahun');
                var id = $(e.relatedTarget).data('id');
                var tahun = $(e.relatedTarget).data('tahun');

                $(e.currentTarget).find('input[id="editIdTahun"]').val(id);
                $(e.currentTarget).find('input[id="createtahun"]').val(tahun);

                var attrId = document.getElementById("editIdTahun");
                attrId.setAttribute("name", "id_tahun");
            } else {
                $('#createModalLabel').text('Tambah Tahun');
                $(e.currentTarget).find('input[id="editIdTahun"]').val('');
                $(e.currentTarget).find('input[id="createtahun"]').val('');
            }
        });

        $("#tahun").on("click", ".btn-hapus", function () {
            let id = $(this).data("id");
            swal.fire({
                title: 'Hapus Tahun',
                text: 'Anda yakin akan menghapus Tahun Pelajaran? tindakan ini akan membuat data yang berhubungan tidak aktif',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Hapus"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: base_url + "datatahun/hapustahun",
                        data: $('#edittp').serialize() + "&hapus=" + id,
                        type: "POST",
                        success: function (response) {
                            var title = response.status ? "Berhasil" : "Gagal";
                            var type = response.status ? "success" : "error";

                            swal.fire({
                                title: title,
                                text: response.msg,
                                icon: type
                            }).then((result) => {
                                if (result.value) {
                                    if (response.status) {
                                        window.location.href = base_url + 'datatahun';
                                    }
                                }
                            });
                        }, error: function (xhr, status, error) {
                            console.log("error", xhr.responseText);
                            const err = JSON.parse(xhr.responseText)
                            swal.fire({
                                title: "Error",
                                text: err.Message,
                                icon: "error"
                            });
                        }
                    });
                }
            });
        });

        $("#semester").on("click", ".btn-aktif", function () {
            let id = $(this).data("id");
            var dataSmt = JSON.stringify($('#semester').tableToJSON());
            //console.log($('#edittp').serialize() + "&active=" + id + "&tahun=" + replaced);
            $.ajax({
                url: base_url + "datatahun/gantisemester",
                data: $('#edittp').serialize() + "&active=" + id + "&semester=" + dataSmt,
                type: "POST",
                success: function (response) {
                    var title = response.status ? "Berhasil" : "Gagal";
                    var type = response.status ? "success" : "error";

                    swal.fire({
                        title: title,
                        text: response.msg,
                        icon: type
                    }).then((result) => {
                        if (result.value) {
                            if (response.status) {
                                window.location.href = base_url + 'datatahun';
                            }
                        }
                    });
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        });

        $('#create').submit('click', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();
            //var tahun = $('#createtahun').val();
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
                    showDangerToast('Gagal menambah tahun pelajaran');
                }
            });
            return false;
        });

        $('#hariefektif').submit('click', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());

            $.ajax({
                url: base_url + "datatahun/savehariefektif",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            text: "Jumlah Hari Efektif berhasi disimpan",
                            icon: "success"
                        }).then((result) => {
                            if (result.value) {
                                if (data.status) {
                                    window.location.href = base_url + 'datatahun';
                                }
                            }
                        });
                    } else {
                        swal.fire({
                            title: "Gagal",
                            text: 'Gagal menyimpan jumlah hari efektif',
                            icon: "error",
                        });
                    }
                }, error: function (xhr, status, error) {
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        });
    })
</script>
