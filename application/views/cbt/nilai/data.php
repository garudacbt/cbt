<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */

/*
NY = Nilai Hasil Konversi
YA = Nilai Terbesar Konversi (Yang Kita Inginkan)
YB = Nilai Terkecil Konversi (Yang Kita Inginkan)
XA = Nilai Terbesar Asli (Dari Daftar Nilai)
XB = Nilai Terkecil Asli (Dari Daftar Nilai
NX = Nilai yang Ingin Dikonversi (Nilai Rujukan)

((YA-YB)/(XA-XB))*(NX-XB)+YB
 */

$XA = isset($convert) ? $convert['xa'] : 0;
$XB = isset($convert) ? $convert['xb'] : 20;
$YA = isset($convert) ? $convert['ya'] : 100;
$YB = isset($convert) ? $convert['yb'] : 60;
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
                    <!--
					<div id="selector" class="card-tools btn-group">
						<button type="button" class="btn active btn-primary">By Ruang</button>
						<button type="button" class="btn btn-outline-primary">By Kelas</button>
					</div>
					-->
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php $dnone = $kelas_selected == null ? 'class="d-none"' : ''; ?>
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Jadwal</span>
                                </div>
                                <?php
                                echo form_dropdown('jadwal', $jadwal, $jadwal_selected, 'id="jadwal" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-md-3" id="by-kelas">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Kelas</span>
                                </div>
                                <?php
                                echo form_dropdown('kelas', $kelas, $kelas_selected, 'id="kelas" class="form-control"'); ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="float-right <?= $dnone ?>" id="group-export">
                        <?php if (isset($convert)) : ?>
                            <button type="button" id="rollback" class="btn btn-warning align-text-bottom">
                                <i class="fa fa-undo ml-1 mr-1"></i> Nilai Asli
                            </button>
                        <?php else: ?>
                            <button type="button" class="btn btn-danger align-text-bottom"
                                    data-toggle="modal" data-target="#perbaikanModal">
                                <i class="fa fa-balance-scale-right ml-1 mr-1"></i> Katrol Nilai
                            </button>
                        <?php endif; ?>
                        <button type="button" id="download-excel" class="btn btn-success align-text-bottom"
                                data-toggle="tooltip"
                                title="Download Excel">
                            <i class="fa fa-file-excel ml-1 mr-1"></i> Ekspor ke Excel
                        </button>
                    </div>
                    <?php
                    //var_dump(isset($convert));
                    if (isset($siswa)) :
                        $bagi_pg = $info->tampil_pg / 100;
                        $bobot_pg = $info->bobot_pg / 100;
                        $bagi_essai = $info->tampil_esai / 100;
                        $bobot_essai = $info->bobot_esai / 100;
                        echo '<pre>';
                        //var_dump($soal_pg);
                        //var_dump($jawaban[39]['dur']->lama_ujian);
                        //echo '<br>';
                        //var_dump($jawaban[39]['jawab_pg']);
                        //echo '<br>';
                        //var_dump($info);
                        echo '</pre>';
                        $colWidth = '5,15,35,15,10,10,10';
                        for ($s = 0; $s < $info->tampil_pg; $s++) {
                            $colWidth .= ',4';
                        }
                        $colWidth .= ',10,10,10';

                        ?>
                        <div class="d-none" id="info">
                            <div id="info-ujian"></div>
                        </div>
                        <div <?= $dnone ?>>
                            <table class="w-100 table-sm" id="table-status" data-cols-width="<?= $colWidth ?>">
                                <tr>
                                    <td colspan="2" style="width: 120px">Soal</td>
                                    <td colspan="5"><?= $info->bank_kode ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Mata Pelajaran</td>
                                    <td colspan="5"><?= $info->nama_mapel ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Kelas</td>
                                    <td colspan="5"><?= $kelas[$kelas_selected] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" height="60" class="align-top">Jumlah Soal</td>
                                    <td colspan="5" class="align-top"><?= $info->tampil_pg ?></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <th rowspan="2" class="text-center align-middle bg-blue" width="40"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                        No.
                                    </th>
                                    <th rowspan="2" class="text-center align-middle bg-blue" width="100"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                        No. Peserta
                                    </th>
                                    <th rowspan="2" class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                        Nama
                                    </th>
                                    <th rowspan="2" class="text-center align-middle bg-blue"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true">Ruang
                                    </th>
                                    <th rowspan="2" class="text-center align-middle bg-blue"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true">Sesi
                                    </th>
                                    <th rowspan="2" class="text-center align-middle bg-blue"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true">Mulai
                                    </th>
                                    <th rowspan="2" class="text-center align-middle bg-blue"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true">Durasi
                                    </th>
                                    <th colspan="<?= $info->tampil_pg ?>"
                                        class="text-center align-middle bg-blue d-none" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                        Nomor Soal
                                    </th>
                                    <th rowspan="2" class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                        Jml. Benar
                                    </th>
                                    <th rowspan="2" class="text-center align-middle bg-blue"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true">Salah
                                    </th>
                                    <th colspan="2" class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                        Skor
                                    </th>
                                    <th colspan="2" class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                        Nilai
                                    </th>
                                    <th rowspan="2" class="text-center align-middle bg-blue" data-exclude="true"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                        Aksi
                                    </th>
                                </tr>
                                <tr>
                                    <?php for ($s = 0; $s < $info->tampil_pg; $s++) : ?>
                                        <th class="text-center align-middle bg-blue p-1 d-none" data-fill-color="b8daff"
                                            data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                            <?= $soal_pg[$s]->nomor_soal ?>
                                        </th>
                                    <?php endfor; ?>
                                    <th class="text-center align-middle bg-blue p-1" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                        PG
                                    </th>
                                    <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                        Essai
                                    </th>
                                    <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                        Asli
                                    </th>
                                    <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                        Katrol
                                    </th>
                                </tr>

                                <?php
                                for ($i = 0; $i < count($siswa); $i++) :
                                    $idSiswa = $siswa[$i]->id_siswa;

                                    //PG
                                    $jawaban_pg = $jawaban[$idSiswa]['jawab_pg'];
                                    $benar_pg = 0;
                                    $salah_pg = 0;
                                    for ($j = 0; $j < count($jawaban_pg); $j++) {
                                        if ($jawaban_pg[$j] != null && $jawaban_pg[$j]->jawaban_siswa != null) {
                                            if (strtoupper($jawaban_pg[$j]->jawaban_siswa) == strtoupper($jawaban_pg[$j]->jawaban_benar)) {
                                                $benar_pg += 1;
                                            } else {
                                                $salah_pg += 1;
                                            }
                                        }
                                    }
                                    //console.log(benar_pg, salah_pg);
                                    $skor_pg = ($benar_pg / $bagi_pg) * $bobot_pg;
                                    //var_dump($benar_pg.', '. $salah_pg);

                                    //ESSAI
                                    $jawaban_es = $jawaban[$idSiswa]['jawab_essai'];
                                    $benar_es = 0;
                                    $salah_es = 0;
                                    $dikoreksi = false;
                                    $skor_es = 0;
                                    if ($info->tampil_esai > 0) {
                                        for ($j = 0; $j < count($jawaban_es); $j++) {
                                            if ($jawaban_es[$j] != null && isset($jawaban_es[$j]->koreksi)) {
                                                if ($jawaban_es[$j]->koreksi === 1) {
                                                    $benar_es += 1;
                                                    $dikoreksi = true;
                                                } else if ($jawaban_es[$j]->koreksi == 2) {
                                                    $salah_es += 1;
                                                    $dikoreksi = true;
                                                } else {
                                                    $dikoreksi = false;
                                                    break;
                                                }
                                            }
                                        }
                                        $skor_es = ($benar_es / $bagi_essai) * $bobot_essai;
                                    }

                                    $durasi = isset($jawaban[$idSiswa]['dur']->lama_ujian) ? $jawaban[$idSiswa]['dur']->lama_ujian : '';

                                    $logging = $jawaban[$idSiswa]['log'];
                                    $mulai = '- -  :  - -';
                                    $selesai = '- -  :  - -';
                                    for ($k = 0; $k < count($logging); $k++) {
                                        if ($logging[$k]->log_type == '1') {
                                            if ($logging[$k] != null) {
                                                $mulai = date('H:i', strtotime($logging[$k]->log_time));
                                            }
                                        } else {
                                            if ($logging[$k] != null) {
                                                $selesai = date('H:i', strtotime($logging[$k]->log_time));
                                            }
                                        }
                                    }

                                    if (isset($convert)) {
                                        //((YA-YB)/(XA-XB))*(NX-XB)+YB
                                        $nilai_pg = ((($YA-$YB)/100)* $skor_pg) + $YB;
                                    } else {
                                        if ($skor_pg > $XA) {
                                            $XA = $skor_pg;
                                        }
                                        if ($skor_pg < $XB) {
                                            $XB = $skor_pg;
                                        }
                                        $nilai_pg = $skor_pg;
                                    }

                                    $disabled = strpos($mulai, '-') !== false ? 'disabled' : '';
                                    ?>
                                    <tr>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"> <?= $i + 1 ?> </td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"> <?= $siswa[$i]->nomor_peserta ?> </td>
                                        <td class="align-middle" data-a-v="middle" data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse;"> <?= $siswa[$i]->nama ?> </td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?= $siswa[$i]->kode_ruang ?></td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?= $siswa[$i]->kode_sesi ?></td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?= $mulai ?></td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?= $durasi ?></td>
                                        <?php for ($s = 0; $s < $info->tampil_pg; $s++) :
                                            $ks = array_search($soal_pg[$s]->id_soal, array_column($jawaban_pg, 'id_soal'));
                                            $jwbn = isset($jawaban_pg[$ks]) && $jawaban_pg[$ks] != null && $jawaban_pg[$ks]->jawaban_siswa != null ? $jawaban_pg[$ks]->jawaban_siswa : '';
                                            $bg = strtoupper($jwbn) == strtoupper($soal_pg[$s]->jawaban) ? 'data-fill-color="00E676"' : 'data-fill-color="FF7043"';
                                            ?>
                                            <td class="d-none" <?= $bg ?> data-a-v="middle" data-a-h="center"
                                                data-b-a-s="thin"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?= $jwbn ?></td>
                                        <?php endfor; ?>
                                        <td data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?= $benar_pg ?></td>
                                        <td data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?= $salah_pg ?></td>
                                        <td class="text-center text-success align-middle" data-a-v="middle"
                                            data-a-h="center" data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                            <b> <?= round($skor_pg, 2) ?> </b></td>
                                        <?php if ($dikoreksi) : ?>
                                            <td class="text-center text-success align-middle" data-a-v="middle"
                                                data-a-h="center" data-b-a-s="thin"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                <b> <?= $skor_es ?> </b></td>
                                        <?php else : ?>
                                            <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                                data-b-a-s="thin"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                            <?php if ($info->tampil_esai == 0) : ?>
                                                --
                                            <?php else : ?>
                                                <button type="button"
                                                        class="btn btn-xs bg-primary mb-1  <?= $disabled ?>"
                                                        onclick="koreksiEssai()" data-toggle="tooltip"
                                                        title="Koreksi Jawaban Essai">Koreksi
                                                </button>
                                                </td>
                                            <?php endif; endif; ?>

                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                            <b> <?= round($skor_pg + $skor_es, 2) ?> </b></td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                            <b> <?= round($nilai_pg + $skor_es, 2) ?> </b></td>
                                        <td class="text-center align-middle" data-exclude="true" data-a-v="middle"
                                            data-a-h="center" data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                            <button type="button" class="btn btn-xs bg-success mb-1 <?= $disabled ?>"
                                                    onclick="lihatJawaban(<?= $siswa[$i]->id_siswa ?>)"
                                                    data-toggle="tooltip" title="Detail Jawaban Siswa">Lihat
                                            </button>
                                        </td>
                                    </tr>

                                <?php endfor; ?>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="overlay" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('update', array('id' => 'perbaikan-nilai')) ?>
<div class="modal fade" id="perbaikanModal" tabindex="-1" role="dialog" aria-labelledby="perbaikanModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="perbaikanModalLabel">Perbaikan Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nama_sesi" class="col-md-4 col-form-label">Nilai Tertinggi</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="ya" value="<?= $YA ?>"
                               placeholder="Nilai tertinggi yang diinginkan" required>
                        <small>diisi nilai puluhan maksimal 100, misal 80 sampai 100</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_sesi" class="col-md-4 col-form-label">Nilai Terrendah</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="yb" value="<?= $YB ?>"
                               placeholder="Nilai terrendah yang diinginkan" required>
                        <small>diisi nilai puluhan dibawah nilai tertinggi, misal 60</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="convert">Katrol  <i class="fa fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<?=form_close()?>

<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/tableToExcel.js"></script>

<script>
    var url = '';
    var bagi_pg = 0;
    var bobot_pg = 0;
    var bagi_essai = 0;
    var bobot_essai = 0;
    var idJadwal = '<?=$jadwal_selected?>';
    var isSelected = <?= isset($siswa) ? '1' : '0'?>;
    var namaMapel = '<?=isset($info) ? $info->kode : ''?>';
    var jenisUjian = '<?=isset($info) ? $info->kode_jenis : ''?>';

    var nilai_max = <?=$XA?>;//nilai siswa terbesar
    var nilai_min = <?=$XB?>;//nilai siswa terkecil
    var hasil_max = <?=$YA?>;//batas nilai terbesar
    var hasil_min = <?=$YB?>;//batas nilai terkecil

    function lihatJawaban(idSiswa) {
        console.log("cbtnilai/getnilaisiswa?siswa=" + idSiswa + '&jadwal=' + idJadwal);
        window.location.href = base_url + 'cbtnilai/getnilaisiswa?siswa=' + idSiswa + '&jadwal=' + idJadwal;
    }

    function getDetailJadwal(idJadwal) {
        $.ajax({
            type: "GET",
            url: base_url + "cbtstatus/getjadwalujianbyjadwal?id_jadwal=" + idJadwal,
            cache: false,
            success: function (response) {
                console.log(response);
                var selKelas = $('#kelas');
                selKelas.html('');
                selKelas.append('<option value="">Pilih Kelas</option>');
                $.each(response, function (k, v) {
                    if (v != null) {
                        selKelas.append('<option value="' + k + '">' + v + '</option>');
                    }
                });
            }
        });
    }

    $(document).ready(function () {
        ajaxcsrf();

        var opsiJadwal = $("#jadwal");
        var opsiKelas = $("#kelas");

        var selected = isSelected === 0 ? "selected='selected'" : "";
        opsiJadwal.prepend("<option value='' " + selected + " disabled>Pilih Jadwal</option>");
        opsiKelas.prepend("<option value='' " + selected + " disabled>Pilih Kelas</option>");

        function loadSiswaKelas(kelas, jadwal) {
            var empty = jadwal === null;
            //console.log(jadwal, kelas)
            if (!empty) {
                $('#loading').removeClass('d-none');
                window.location.href = base_url + 'cbtnilai?kelas=' + kelas + '&jadwal=' + jadwal;
            } else {
                console.log('empty')
            }
        }

        $('#rollback').on('click', function (e) {
            loadSiswaKelas(opsiKelas.val(), opsiJadwal.val())
        })

        opsiKelas.change(function () {
            loadSiswaKelas($(this).val(), opsiJadwal.val())
        });

        opsiJadwal.change(function () {
            idJadwal = $(this).val();
            getDetailJadwal(idJadwal);
        });

        $("#download-excel").click(function (event) {
            var table = document.querySelector("#table-status");
            if (table != null) {
                //TableToExcel.convert(table);
                TableToExcel.convert(table, {
                    name: `Nilai ${jenisUjian} ${namaMapel} ${$("#kelas option:selected").text()}.xlsx`,
                    sheet: {
                        name: "Sheet 1"
                    }
                });
            } else {
                Swal.fire({
                    title: "ERROR",
                    text: "Isi JADWAL dan KELAS terlebih dulu",
                    icon: "error"
                })
            }
        });

        $('#loading').addClass('d-none');

        $('#perbaikan-nilai').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var table = document.querySelector("#table-status");
            if (table != null) {
                var $inputs = $('#perbaikan-nilai :input');
                var values = {};
                $inputs.each(function () {
                    values[this.name] = $(this).val();
                });
                hasil_max = values['ya'];
                hasil_min = values['yb'];
                //console.log(hasil_max, hasil_min);
                //console.log(nilai_max, nilai_min);

                $('#perbaikanModal').modal('hide').data('bs.modal', null);
                $('#perbaikanModal').on('hidden', function () {
                    $(this).data('modal', null);  // destroys modal
                });
                $('#loading').removeClass('d-none');
                window.location.href = base_url + 'cbtnilai?kelas=' + opsiKelas.val() + '&jadwal=' + opsiJadwal.val() +
                    '&xa=' + nilai_max + '&xb=' + nilai_min + '&ya=' + hasil_max + '&yb=' + hasil_min;
            } else {
                $('#perbaikanModal').modal('hide').data('bs.modal', null);
                $('#perbaikanModal').on('hidden', function () {
                    $(this).data('modal', null);  // destroys modal
                });


                Swal.fire({
                    title: "ERROR",
                    text: "Isi JADWAL dan KELAS terlebih dulu",
                    icon: "error"
                })
            }
        });
    })
</script>
