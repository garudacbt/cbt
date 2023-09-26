<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */

$jenjang = $setting->jenjang;
?>

<div class="content-wrapper bg-white pt-4">
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
                    <div class="card-tools">
                        <a type="button" href="<?= base_url('cbtsesisiswa?kls=' . $kelas_selected) ?>"
                           class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    $kelass = ['0' => 'Pilih kelas'] + $kelas;
                    $ruangs = ['0' => 'Pilih ruang'] + $ruang;
                    $sesis = ['0' => 'Pilih sesi'] + $sesi;
                    ?>
                    <div class="row">
                        <div class="col-12 col-md-3 mb-3">
                            <label>Kelas: </label>
                            <?php
                            echo form_dropdown(
                                'kelas',
                                $kelass,
                                $kelas_selected,
                                'id="dropdown-kelas" class="select2 form-control"'
                            ); ?>
                        </div>
                        <?php if (count($siswas) > 0) : ?>
                            <div class="col-2 mb-2"></div>
                            <div class="col-12 col-md-7 mb-3">
                                <label>Gabungkan siswa <?= $kelass[$kelas_selected] ?> ke ruang dan sesi: </label>
                                <span id="undo" class="float-right badge btn">
                                <i class="fa fa-undo"></i>
                            </span>
                                <div class="row">
                                    <div class="col-6">
                                        <?php
                                        echo form_dropdown(
                                            'g-ruang',
                                            $ruangs,
                                            null,
                                            'id="g-ruang" class="form-control"'
                                        ); ?>
                                    </div>
                                    <div class="col-6">
                                        <?php
                                        echo form_dropdown(
                                            'g-sesi',
                                            $sesis,
                                            null,
                                            'id="g-sesi" class="form-control"'
                                        ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (count($siswas) > 0) : ?>
                        <div id="atur-by-siswa">
                            <?= form_open('cbtsesisiswa/editsesisiswa', array('id' => 'editsesisiswa')) ?>
                            <div class="table-responsive" id="list-siswa">
                                <table id="sesi-siswa" class="w-100 table table-bordered table-sm">
                                    <tr class="bg-primary">
                                        <th height="50" width="40" class="align-middle text-center">No.</th>
                                        <th class="align-middle text-center">Nama Siswa</th>
                                        <th class="align-middle text-center">Kelas</th>
                                        <th class="align-middle text-center">Ruang</th>
                                        <th class="align-middle text-center">Sesi</th>
                                    </tr>
                                    <?php
                                    $num = 1;
                                    foreach ($siswas as $siswa) :
                                        $ruangId = isset($siswa->id_ruang) && $siswa->id_ruang != null ? $siswa->id_ruang : '0';
                                        $sesiId = isset($siswa->id_sesi) && $siswa->id_sesi != null ? $siswa->id_sesi : '0';
                                        ?>
                                        <tr>
                                            <td class="align-middle text-center p-0"><?= $num ?></td>
                                            <td class="align-middle pl-2 pr-2"><?= $siswa->nama ?></td>
                                            <td class="align-middle text-center"><?= $siswa->nama_kelas ?></td>
                                            <td class="align-middle text-center" data-name="input-ruang">
                                                <?php
                                                echo form_dropdown(
                                                    'ruang-sesi[' . $siswa->id_siswa . '][' . $kelas_selected . '][ruang]',
                                                    $ruangs,
                                                    $ruangId,
                                                    'data-ruangid="' . $siswa->id_siswa . '" class="ruangsiswa form-control form-control-sm"'
                                                ); ?>
                                            </td>
                                            <td class="align-middle text-center" data-name="input-sesi">
                                                <?php
                                                echo form_dropdown(
                                                    'ruang-sesi[' . $siswa->id_siswa . '][' . $kelas_selected . '][sesi]',
                                                    $sesis,
                                                    $sesiId,
                                                    'data-sesiid="' . $siswa->id_siswa . '" class="sesisiswa form-control form-control-sm"'
                                                ); ?>
                                            </td>
                                        </tr>
                                        <?php $num++; endforeach; ?>
                                </table>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-sm bg-primary text-white">
                                    <i class="fas fa-save mr-1"></i> Simpan
                                </button>
                            </div>
                            <?= form_close() ?>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-default-warning align-content-center"
                             role="alert"><?= $kelas_selected == '0' ? 'Pilih kelas' : 'Belum ada data siswa' ?></div>
                    <?php endif; ?>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    let tp_id = '<?= $tp_active->id_tp ?>';
    let smt_id = '<?= $smt_active->id_smt ?>';
    var kelas_id = '<?=$kelas_selected?>';
    var jsonRuang = [];
    var jsonSesi = [];

    $(document).ready(function () {
        ajaxcsrf();
        var opsiKelas = $('#dropdown-kelas');
        var opsiGruang = $('#g-ruang');
        var opsiGsesi = $('#g-sesi');

        opsiKelas.select2();
        opsiGruang.select2();
        opsiGsesi.select2();
        opsiKelas.on('change', function (e) {
            var id = $(this).val();
            console.log(id);
            if (id != kelas_id) {
                $('#loading').removeClass('d-none');
                window.location.href = base_url + 'cbtsesisiswa?kls=' + id;
            }
        });

        opsiGruang.on('change', function () {
            const $ruangSelect = $('.ruangsiswa');
            if (jsonRuang.length === 0) {
                $ruangSelect.each((i, row) => {
                    let item = {};
                    item ["id"] = $(row).data('ruangid');
                    item ["val"] = $(row).val();
                    jsonRuang.push(item);
                });
            }
            $ruangSelect.val($(this).val());
        });

        opsiGsesi.on('change', function () {
            const $sesiSelect = $('.sesisiswa');
            if (jsonSesi.length === 0) {
                $sesiSelect.each((i, row) => {
                    let item = {};
                    item ["id"] = $(row).data('sesiid');
                    item ["val"] = $(row).val();
                    jsonSesi.push(item);
                });
            }
            $sesiSelect.val($(this).val());
        });

        $('#undo').on('click', function () {
            if (jsonRuang.length > 0) {
                $.each(jsonRuang, function (i, v) {
                    $('select[data-ruangid="' + v.id + '"]').val(v.val);
                });
            }

            if (jsonSesi.length > 0) {
                $.each(jsonSesi, function (i, v) {
                    $('select[data-sesiid="' + v.id + '"]').val(v.val);
                });
            }
        });

        $("#editsesisiswa").on("submit", function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('#loading').removeClass('d-none');
            console.log($(this).serialize());

            $.ajax({
                url: base_url + "cbtsesisiswa/editsesisiswa",
                type: "POST",
                data: $(this).serialize(),
                success: function (data) {
                    $('#loading').addClass('d-none');
                    console.log("response:", data);
                    if (data.status) {
                        window.location.href = base_url + 'cbtsesisiswa?kls=' + kelas_id;
                        //showSuccessToast('Data berhasil disimpan')
                    } else {
                        showDangerToast('gagal disimpan')
                    }
                }, error: function (xhr, status, error) {
                    $('#loading').addClass('d-none');
                    console.log("response:", xhr.responseText);
                    showDangerToast('gagal disimpan')
                }
            });
        });
    });
</script>

