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
                    <div class="row">
                        <div class="col-6">
                            <p><b>Catatan Untuk Semua Siswa</b></p>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal"
                                    data-target="#daftarModal">
                                <i class="fa fa-plus"></i> <span class="ml-1">Buat Catatan Kelas</span>
                            </button>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="50" height="50" class="text-center p-0 align-middle">No.</th>
                            <th class="text-center p-0 align-middle p-0">Tanggal</th>
                            <th class="text-center p-0 align-middle">Jenis</th>
                            <th class="text-center p-0 align-middle">Catatan</th>
                            <th class="text-center p-0 align-middle">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $arrLvl = ['Tidak ada', 'Saran', 'Teguran', 'Peringatan', 'Sangsi'];
                        if (count($catatan_kelas) > 0) :
                            foreach ($catatan_kelas as $key => $value) :
                                $jenis = $value->level ?>
                                <tr>
                                    <td class="text-center">
                                        <?= ($key + 1) ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $value->tgl ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $arrLvl[$value->level] ?>
                                    </td>
                                    <td>
                                        <?= $value->text ?>
                                    </td>
                                    <td width="100" class="text-center">
                                        <button type="button" class="btn btn-sm btn-danger"
                                                data-id="<?= $value->id_catatan ?>" onclick="hapus(this)">
                                            <i class="fa fa-trash"></i> <span class="ml-1">Hapus</span>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Belum ada catatan
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="overlay d-none">
                    <div class="spinner-grow"></div>
                </div>

            </div>
            <div class="card card-default my-shadow">
                <div class="card-header with-border">
                    <h3 class="card-title">Catatan Per-siswa</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="50" height="50" class="text-center p-0 align-middle">No.</th>
                            <th class="text-center p-0 align-middle">NIS</th>
                            <th class="text-center p-0 align-middle p-0">Nama</th>
                            <th class="text-center p-0 align-middle">Catatan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($catatan_siswa as $key => $value) :?>
                            <tr>
                                <td class="text-center">
                                    <?= ($key + 1) ?>
                                </td>
                                <td class="text-center">
                                    <?= $value->nis ?>
                                </td>
                                <td>
                                    <?= $value->nama ?>
                                </td>
                                <td class="text-center">
                                    <button onclick="loadCatatanSiswa(<?= $value->id_siswa ?>)"
                                            class="btn btn-xs btn-success"><b><?= $value->jml_catatan ?></b> catatan
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="overlay d-none">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="daftarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daftarLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('', array('id' => 'formcatatan')) ?>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis</label>
                                <?php
                                $arrLevel = [1 => 'Saran', 2 => 'Teguran', 3 => 'Peringatan', 4 => 'Sangsi'];
                                echo form_dropdown(
                                    'level',
                                    $arrLevel,
                                    null,
                                    'class="select2 form-control" data-placeholder="Pilih Jenis" required'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea style="min-height: 200px" class="form-control" name="text" id="input_text"
                                          required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    var idKelas = '<?=$guru->wali_kelas?>';

    function loadCatatanSiswa(id) {
        window.location.href = base_url + 'walicatatan/siswa?id_siswa=' + id + '&id_kelas=' + idKelas;
    }

    $(document).ready(function () {
        ajaxcsrf();

        $('#daftarModal').on('show.bs.modal', function (e) {
            var idSiswa = $(e.relatedTarget).data('id');
        });

        $('#formcatatan').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());

            $.ajax({
                url: base_url + "walicatatan/savecatatankelas",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log("result", data);
                    $('#daftarModal').modal('hide').data('bs.modal', null);
                    $('#daftarModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });

                    if (data) {
                        swal.fire({
                            title: "Sukses",
                            text: "Catatan berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + 'walicatatan';
                            }
                        });
                    } else {
                        swal.fire({
                            title: "ERROR",
                            text: "Catatan Tidak Tersimpan",
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    $('#daftarModal').modal('hide').data('bs.modal', null);
                    $('#daftarModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });
                    console.log("error", xhr.responseText);
                    //showDangerToast('ERROR');
                    swal.fire({
                        title: "ERROR",
                        text: "Catatan Tidak Tersimpan",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            });
        });
    });

    function hapus(data) {
        var idCatatan = $(data).data('id');
        console.log(idCatatan);

        swal.fire({
            title: "Hapus Catatan?",
            text: "Catatan ini akan dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'walicatatan/hapus/' + idCatatan,
                    method: "GET",
                    success: function (respon) {
                        console.log(respon);
                        if (respon) {
                            window.location.href = base_url + 'walicatatan';
                        } else {
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa menghapus catatan",
                                icon: "error"
                            });
                        }
                    },
                    error: function (xhr, error, status) {
                        console.log(xhr.responseText);
                        swal.fire({
                            title: "Gagal",
                            text: "Tidak bisa menghapus catatan",
                            icon: "error"
                        });
                    }
                });
            }
        });
    }

</script>
