<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
?>

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
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                </div>
                <div class="card-body">
                    <div class='row'>
                        <div class='col-md-12'>
                            <?= form_open('', array('id' => 'formselect')) ?>
                            <?= form_close(); ?>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label>Mata Pelajaran</label>
                                    <?php
                                    echo form_dropdown(
                                        'mapel',
                                        $mapel,
                                        $mapel_selected,
                                        'id="opsi-mapel" class="form-control"'
                                    ); ?>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label>Kelas</label>
                                    <?php
                                    echo form_dropdown(
                                        'kelas',
                                        isset($kelas[$mapel_selected]) ? $kelas[$mapel_selected] : [],
                                        $kelas_selected,
                                        'id="opsi-kelas" class="form-control"'
                                    ); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="card border border-primary shadow">
                                <div class="card-header alert-default-primary">
                                    <h3 class="card-title">Catatan Perkelas</h3>
                                    <?php $disabled = isset($cat_kelas) ? '' : 'disabled="disabled"' ?>
                                    <button id="create-note" type="button"
                                            class="card-tools btn btn-sm btn-primary float-right" data-toggle="modal"
                                            data-target="#daftarModal" <?= $disabled ?>>
                                        <i class="fa fa-plus"></i> <span class="ml-1">Buat Catatan Kelas</span>
                                    </button>
                                </div>
                                <div class="card-body p-0">
                                    <div id="konten-catatankelas">
                                        <?php if (isset($cat_kelas)) : ?>
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th width="50" height="50" class="text-center p-0 align-middle">
                                                        No.
                                                    </th>
                                                    <th class="text-center p-0 align-middle p-0">Tanggal</th>
                                                    <th class="text-center p-0 align-middle">Jenis</th>
                                                    <th class="text-center p-0 align-middle">Catatan</th>
                                                    <th class="text-center p-0 align-middle">Keterangan</th>
                                                    <th class="text-center p-0 align-middle">Aksi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if (count($cat_kelas) > 0) :
                                                    $arrLvl = ['Tidak ada', 'Saran', 'Teguran', 'Peringatan', 'Sangsi'];
                                                    $no = 1;
                                                    foreach ($cat_kelas as $value) :?>
                                                        <tr>
                                                            <td class="text-center"><?= $no ?></td>
                                                            <td class="text-center"><?= $value->tgl ?></td>
                                                            <td class="text-center"><?= $arrLvl[$value->level] ?></td>
                                                            <td><?= $value->text ?></td>
                                                            <td class="text-center">
                                                                <span class="badge badge-btn badge-info">
                                                                    <?= count($value->reading) ?> siswa membaca
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                        data-id="<?= $value->id_catatan ?>"
                                                                        onclick="hapus(this)">
                                                                    <i class="fa fa-trash"></i> <span
                                                                            class="ml-1">Hapus</span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php $no++; endforeach;
                                                else:?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">Belum ada catatan</td>
                                                    </tr>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        <?php else: ?>
                                            <p class="p-4">Pilih mapel dan Kelas</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="overlay d-none">
                                    <div class="spinner-grow"></div>
                                </div>
                            </div>
                            <div class="card border border-success shadow">
                                <div class="card-header alert-default-success">
                                    <h3 class="card-title">Catatan Persiswa</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div id="konten-catatansiswa">
                                        <?php if (isset($cat_siswa)) : ?>
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th width="50" height="50" class="text-center p-0 align-middle">
                                                        No.
                                                    </th>
                                                    <th class="text-center p-0 align-middle">NIS</th>
                                                    <th class="text-center p-0 align-middle p-0">Nama</th>
                                                    <th class="text-center p-0 align-middle">Catatan</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if (count($cat_siswa) > 0) :
                                                    $no = 1;
                                                    foreach ($cat_siswa as $value) :?>
                                                        <tr>
                                                            <td class="text-center"><?= $no ?></td>
                                                            <td class="text-center"><?= $value->nis ?></td>
                                                            <td><?= $value->nama ?></td>
                                                            <td class="text-center">
                                                                <button onclick="loadCatatanSiswa(<?= $value->id_siswa ?>)"
                                                                        class="btn btn-xs btn-success"><?= $value->jml_catatan ?>
                                                                    catatan
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php $no++; endforeach;
                                                else:?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">Belum ada catatan</td>
                                                    </tr>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        <?php else: ?>
                                            <p class="p-4">Pilih mapel dan Kelas</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="overlay d-none">
                                    <div class="spinner-grow"></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <input type="hidden" name="id_mapel" id="input-mapel">
                <input type="hidden" name="id_kelas" id="input-kelas">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    var arrKelas = JSON.parse('<?= json_encode($kelas)?>');
    var mplSelected = '<?= isset($mapel_selected) ? $mapel_selected : ''?>';
    var klsSelected = '<?= isset($kelas_selected) ? $kelas_selected : ''?>';

    var form;
    var oldData = '';

    function loadCatatanSiswa(id) {
        window.location.href = base_url + 'kelascatatan/siswa?id=' + id + '&mapel=' + $('#opsi-mapel').val() + '&kelas=' + $('#opsi-kelas').val();
    }

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
                    url: base_url + 'kelascatatan/hapus/' + idCatatan,
                    method: "GET",
                    success: function (respon) {
                        console.log(respon);
                        if (respon) {
                            reload($('#opsi-mapel').val(), $('#opsi-kelas').val(), $('#opsi-tipe').val(), true);
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

    function reload(mapel, kls, force) {
        var empty = mapel === '' || kls === '' || mapel === null || kls === null;
        var newData = '&kelas=' + kls + '&mapel=' + mapel;
        var sameData = oldData === newData;
        if (force) {
            sameData = false;
        }
        console.log('reload', empty);
        if (!empty && !sameData) {
            window.location.href = base_url + 'kelascatatan?mapel=' + mapel + '&kelas=' + kls;
        }
    }


    $(document).ready(function () {
        var selKelas = $('#opsi-kelas');
        var selMapel = $('#opsi-mapel');
        form = $('#formselect');

        //console.log(arrKelas);
        var defSelMapel = mplSelected == '' ? "selected='selected'" : "";
        selMapel.prepend("<option value='' " + defSelMapel + " disabled='disabled'>Pilih Mapel</option>");
        var defSelKelas = klsSelected == '' ? "selected='selected'" : "";
        selKelas.prepend("<option value='' " + defSelKelas + " disabled='disabled'>Pilih Kelas</option>");

        function selectKelas(idMapel) {
            selKelas.html('');
            selKelas.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Kelas</option>");
            console.log(arrKelas[idMapel]);
            $.each(arrKelas[idMapel], function (index, value) {
                if (value != null) {
                    selKelas.append('<option value="' + index + '">' + value + '</option>');
                }
            });
        }

        selKelas.change(function () {
            reload(selMapel.val(), $(this).val(), false);
        });

        selMapel.on('change', function () {
            selectKelas($(this).val());
            //reload($(this).val(), selKelas.val(), false);
        });

        $('#daftarModal').on('show.bs.modal', function (e) {
            var kelas = $("#opsi-kelas option:selected").text();
            $('#daftarLabel').text('Catatan Untuk Kelas ' + kelas);
            $('#input-mapel').val(selMapel.val());
            $('#input-kelas').val(selKelas.val());
        });

        $('#formcatatan').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());

            $.ajax({
                url: base_url + "kelascatatan/savecatatankelas",
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
                                reload(selMapel.val(), selKelas.val(), true);
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
</script>
