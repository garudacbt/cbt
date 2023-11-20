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
                    <button class="card-tools btn btn-default btn-sm mr-2 btn-toggle" data-toggle="modal"
                            data-target="#infoModal"><i class="fas fa-info-circle mr-1"></i> Info Error
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-center">TOKEN</span>
                                </div>
                                <input id="token-input" class="form-control text-bold text-center" readonly="readonly"/>
                                <div class="input-group-append" id="kolom-kanan">
                                    <span id="interval" class="input-group-text text-xs d-none">-- : -- : --</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-light mb-4">
                        <div class="card-header">
                            <span>Mapel diampu</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 col-md-3 mb-3">
                                    <label>Jadwal</label>
                                    <?php
                                    echo form_dropdown(
                                        'jadwal',
                                        $jadwal,
                                        null,
                                        'id="jadwal" class="form-control"'
                                    ); ?>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <label>Ruang</label>
                                    <select name="ruang" id="ruang" class="form-control"></select>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <label>Sesi</label>
                                    <select name="sesi" id="sesi" class="form-control"></select>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <label>Aksi</label>
                                    <br>
                                    <button id="detail-pengampu" class="btn btn-info">Lihat Status</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-light">
                        <div class="card-header">
                            <span>Sebagai Pengawas</span>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center align-middle">Jadwal</th>
                                    <th class="text-center align-middle">Ruang</th>
                                    <th class="text-center align-middle">Sesi</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($pengawas as $peng) :
                                    ?>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <b><?= singkat_tanggal(date('D, d M Y', strtotime($peng->tgl_mulai))) ?></b>
                                            <br>
                                            <?=$peng->bank_kode . ' ('. $peng->kode_jenis.')' ?>
                                        </td>
                                        <td class="text-center align-middle"><?=$ruang[$peng->id_ruang]?></td>
                                        <td class="text-center align-middle"><?=$sesi[$peng->id_sesi]?></td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-info btn-sm"
                                                    data-id="<?=$peng->id_jadwal?>"
                                                    data-ruang="<?=$peng->id_ruang?>"
                                                    data-sesi="<?=$peng->id_sesi?>"
                                                    onclick="detail(this)">Lihat Status</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <table class="table table-bordered" id="table-status">
                            </table>
                        </div>
                    </div>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoLabel">Kode error siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table w-100">
                    <tr>
                        <td class="text-bold">001</td>
                        <td>:</td>
                        <td>Token salah atau token belum digenerate</td>
                    </tr>
                    <tr>
                        <td class="text-bold">002</td>
                        <td>:</td>
                        <td>Harus reset izin</td>
                    </tr>
                    <tr>
                        <td class="text-bold">003</td>
                        <td>:</td>
                        <td>Harus reset waktu</td>
                    </tr>
                    <tr>
                        <td class="text-bold">004</td>
                        <td>:</td>
                        <td>Soal belum dibuat atau belum dipilih</td>
                    </tr>
                    <tr>
                        <td class="text-bold">005</td>
                        <td>:</td>
                        <td>Siswa menggunakan browser yang tidak mendukung</td>
                    </tr>
                    <tr>
                        <td class="text-bold">006</td>
                        <td>:</td>
                        <td>internet down atau error dari database/server</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    const ruangs = JSON.parse('<?=json_encode($ruang)?>');
    const arrRuang = JSON.parse('<?=json_encode($ruangs)?>');

    $(document).ready(function () {
        ajaxcsrf();

        $('#kolom-kanan').html('<button class="btn btn-default" id="refresh-token"><i class="fa fa-refresh"></i> </button>');

        getToken(function (result) {
            getGlobalToken();
        });

        $('#refresh-token').click(function () {
            getToken(function (result) {
                getGlobalToken();
            });
        });

        function getGlobalToken() {
            if (globalToken != null) {
                const viewToken = $('#token-input');
                if (viewToken.length) viewToken.val(globalToken.token);
                if (globalToken.auto == '1' && adaJadwalUjian != '0') {
                    $('#refresh-token').removeClass('d-none')
                }
            }
        }

        var opsiJadwal = $("#jadwal");
        var opsiRuang = $("#ruang");
        var opsiSesi = $("#sesi");

        opsiJadwal.prepend("<option value='' selected='selected'>Pilih Jadwal</option>");
        opsiRuang.html("<option value='' selected='selected'>Pilih Ruang</option>");
        opsiSesi.html("<option value='' selected='selected'>Pilih Sesi</option>");

        opsiJadwal.change(function () {
            opsiRuang.html("<option value='' selected='selected'>Pilih Ruang</option>");
            if ($(this).val()) {
                $.each(arrRuang, function (k, v) {
                    opsiRuang.append("<option value='"+k+"'>"+ruangs[k]+"</option>");
                })
            }
        });

        opsiRuang.change(function () {
            opsiSesi.html("<option value='' selected='selected'>Pilih Sesi</option>");
            if ($(this).val()) {
                $.each(arrRuang[$(this).val()], function (k, v) {
                    opsiSesi.append("<option value='"+k+"'>"+v.nama_sesi+"</option>");
                })
            }
        });

        $('#detail-pengampu').on('click', function (e) {
            if (opsiRuang.val() && opsiSesi.val() && opsiJadwal.val())
                window.location.href = base_url + 'cbtstatus/status_ruang?ruang=' + opsiRuang.val()
                    + '&sesi=' + opsiSesi.val()
                    + '&jadwal=' + opsiJadwal.val();
            else showDangerToast('Pilih dahulu JADWAL, RUANG dan SESI')
        })
    });

    function detail(e) {
        window.location.href = base_url + 'cbtstatus/status_ruang?ruang=' + $(e).data('ruang')
            + '&sesi=' + $(e).data('sesi')
            + '&jadwal=' + $(e).data('id');
    }

</script>
