<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */

/*
NY = Nilai Hasil Konversi

XA = Nilai Terbesar Asli (Dari Daftar Nilai)
XB = Nilai Terkecil Asli (Dari Daftar Nilai
YA = Nilai Terbesar Konversi (Yang Kita Inginkan)
YB = Nilai Terkecil Konversi (Yang Kita Inginkan)

NX = Nilai yang Ingin Dikonversi (Nilai Rujukan)

((YA-YB)/(XA-XB))*(NX-XB)+YB
 */

$XA = isset($convert) ? $convert['xa'] : 0; // nilai terbesar
$XB = isset($convert) ? $convert['xb'] : 20;  // nilai terkecil
$YA = isset($convert) ? $convert['ya'] : 100; // hasil terbesar
$YB = isset($convert) ? $convert['yb'] : 60;  // hasil terkecil

$colWidth = '';

$cols_name = ["PG", "PK", "JOD", "IS", "ES"];
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
                    <div class="row">
                        <?php $dnone = $kelas_selected == null ? 'class="d-none"' : ''; ?>
                        <div class="col-md-4" id="by-kelas">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Kelas</span>
                                </div>
                                <?php
                                echo form_dropdown('kelas', $kelas, $kelas_selected, 'id="kelas" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Jadwal</span>
                                </div>
                                <?php
                                echo form_dropdown('jadwal', $jadwal, $jadwal_selected, 'id="jadwal" class="form-control"'); ?>
                            </div>
                        </div>
                        <?php
                        $isShow = count($siswas) > 0 ? '' : ' d-none';
                        ?>
                        <div class="col-md-4 mb-3">
                            <div class="row">
                                <button type="button" id="import-essai"
                                        class="btn btn-info align-text-bottom btn-disabled col-5"
                                        data-toggle="tooltip"
                                        title="Input nilai manual">
                                    <i class="fa fa-pencil ml-1 mr-1"></i> Input Nilai
                                </button>
                                <div class="col-1"></div>
                                <button type="button" id="mark-all"
                                        class="btn btn-success align-text-bottom btn-disabled col-6"
                                        data-toggle="tooltip"
                                        title="Tandai semua siswa sudah dikoreksi" disabled>
                                    <i class="fa fa-check ml-1 mr-1"></i> Tandai semua
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="float-right row <?= $dnone ?>" id="group-export">
                        <?php if (isset($convert)) : ?>
                            <button type="button" id="rollback" class="btn btn-warning align-text-bottom">
                                <i class="fa fa-undo ml-1 mr-1"></i> Nilai Asli
                            </button>
                        <?php else: ?>
                            <button type="button" class="btn btn-danger align-text-bottom"
                                    data-toggle="modal" data-target="#perbaikanModal">
                                <i class="fa fa-balance-scale-right ml-1 mr-1"></i> Katrol
                            </button>
                        <?php endif; ?>
                        <input style="width: 24px; height: 24px" class="m-1" id="nilai-detail" type="checkbox" checked>
                        <label for="nilai-detail" class="mt-1 mr-1">Detail</label>
                        <button type="button" id="download-excel" class="btn btn-success align-text-bottom mr-2"
                                data-toggle="tooltip"
                                title="Download Excel">
                            <i class="fa fa-file-excel ml-1 mr-1"></i> Ekspor Excel
                        </button>
                    </div>
                    <?php
                    $nilaiTertinggi = 0;
                    $nilaiTerrendah = -1;
                    if (count($siswas) > 0) :
                        $cols = [$info->tampil_pg, $info->tampil_kompleks, $info->tampil_jodohkan, $info->tampil_isian, $info->tampil_esai];
                        $cols = array_filter($cols);
                        $rows = count($cols) > 1 ? 1 : 2;

                        $colWidth = '5,15,35,15,10,10,10';
                        for ($s = 0; $s < $info->tampil_pg; $s++) {
                            $colWidth .= ',4';
                        }
                        $colWidth .= ',10,10,10';

                        $totalSoal = $info->tampil_pg + $info->tampil_kompleks + $info->tampil_jodohkan + $info->tampil_isian + $info->tampil_esai;
                        ?>
                        <div class="d-none" id="info">
                            <div id="info-ujian"></div>
                        </div>
                        <div <?= $dnone ?>>
                            <?= form_open('', array('id' => 'koreksi-semua')) ?>
                            <table class="w-100" id="table-status" data-cols-width="<?= $colWidth ?>">
                                <tr>
                                    <td colspan="2">Mata Pelajaran</td>
                                    <td colspan="5"><?= $info->nama_mapel ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Kelas</td>
                                    <td colspan="5"><?= $kelas[$kelas_selected] ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Guru</td>
                                    <td colspan="5"><?= $info->nama_guru ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 120px">Soal</td>
                                    <td colspan="5"><?= $info->bank_kode ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" height="60" class="align-top">Jumlah Soal</td>
                                    <td colspan="5" class="align-top"><?= $totalSoal ?></td>
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
                                        data-f-bold="true">Sesi
                                    </th>
                                    <th rowspan="2" class="text-center align-middle bg-blue"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true">Ruang
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
                                    <?php if ($info->tampil_pg > 0) : ?>
                                        <th id="no-soal-tile" colspan="<?= $info->tampil_pg ?>"
                                            class="text-center align-middle bg-blue d-none" data-fill-color="b8daff"
                                            data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                            Nomor Soal PG
                                        </th>
                                        <th colspan="2" class="text-center align-middle bg-blue"
                                            data-fill-color="b8daff"
                                            data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                            PG
                                        </th>
                                    <?php endif; ?>

                                    <th colspan="<?= count($cols) ?>" rowspan="<?= $rows ?>"
                                        class="text-center align-middle bg-blue"
                                        data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                        Skor <?= count($cols) > 1 ? "" : $cols_name[array_key_first($cols)] ?>
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
                                    <?php for ($js = 0; $js < $info->tampil_pg; $js++) : ?>
                                        <th class="no-soal text-center align-middle bg-blue p-1 d-none"
                                            data-fill-color="b8daff"
                                            data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                            <?= $js + 1 ?>
                                        </th>
                                    <?php endfor; ?>
                                    <?php if ($info->tampil_pg > 0) : ?>
                                        <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                            data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                            B
                                        </th>
                                        <th class="text-center align-middle bg-blue"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"
                                            data-fill-color="b8daff" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            data-f-bold="true">S
                                        </th>
                                    <?php endif; ?>
                                    <?php
                                    if ($rows == 1) :
                                        if ($info->tampil_pg > 0) : ?>
                                            <th class="text-center align-middle bg-blue p-1" data-fill-color="b8daff"
                                                data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                PG
                                            </th>
                                        <?php endif;
                                        if ($info->tampil_kompleks > 0) :?>
                                            <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                                data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                PK
                                            </th>
                                        <?php endif;
                                        if ($info->tampil_jodohkan > 0) :?>
                                            <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                                data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                JO
                                            </th>
                                        <?php endif;
                                        if ($info->tampil_isian > 0) :?>
                                            <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                                data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                IS
                                            </th>
                                        <?php endif;
                                        if ($info->tampil_esai > 0) :?>
                                            <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                                data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                ES
                                            </th>
                                        <?php endif;
                                    endif;
                                    ?>
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
                                $no = 1;
                                foreach ($siswas as $siswa) :
                                    $idSiswa = $siswa->id_siswa;
                                    $disable = strpos($siswa->mulai_ujian, '-') !== false;
                                    $disabled = $disable ? 'disabled' : '';
                                    ?>
                                    <tr>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"> <?= $no ?> </td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"> <?= $siswa->nomor_peserta ?> </td>
                                        <td class="align-middle" data-a-v="middle" data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; padding: 2px 6px"> <?= $siswa->nama ?> </td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?= $siswa->kode_sesi ?></td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?= $siswa->kode_ruang ?></td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?= $siswa->mulai_ujian ?></td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?= $siswa->lama_ujian ?></td>
                                        <?php
                                        $benar_pg = 0;
                                        $salah_pg = 0;
                                        foreach ($siswa->jawaban_pg as $num => $jwb) :
                                            if ($jwb['benar']) {
                                                $bg = 'data-fill-color="00E676"';
                                                $benar_pg++;
                                            } else {
                                                $bg = 'data-fill-color="FF7043"';
                                                $salah_pg++;
                                            }
                                            //if ($jwb['jawaban'] != '') {
                                            //}
                                            if (round($siswa->skor_total, 2) > $nilaiTertinggi) {
                                                $nilaiTertinggi = round($siswa->skor_total, 2);
                                            }
                                            if (round($siswa->skor_total, 2) > 0 && $siswa->skor_total < $nilaiTerrendah) {
                                                $nilaiTerrendah = round($siswa->skor_total, 2);
                                            }
                                            ?>
                                            <td class="no-soal-siswa d-none" <?= $bg ?> data-a-v="middle"
                                                data-a-h="center"
                                                data-b-a-s="thin"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?= $jwb['jawaban'] ?></td>
                                        <?php endforeach; ?>

                                        <?php if ($info->tampil_pg > 0) : ?>
                                            <td class="text-success" data-a-v="middle" data-a-h="center"
                                                data-b-a-s="thin"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                <b><?= $disable ? '' : $benar_pg ?></b></td>
                                            <td class="text-danger" data-a-v="middle" data-a-h="center"
                                                data-b-a-s="thin"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                <b><?= $disable ? '' : $salah_pg ?></b></td>

                                            <td class="text-center text-info align-middle" data-a-v="middle"
                                                data-a-h="center" data-b-a-s="thin"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                <b> <?= $disable ? '' : $siswa->skor_pg ?> </b></td>
                                        <?php endif;
                                        if ($info->tampil_kompleks > 0) : ?>
                                            <td class="text-center text-success align-middle" data-a-v="middle"
                                                data-a-h="center" data-b-a-s="thin"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                <b> <?= $disable ? '' : $siswa->skor_kompleks ?> </b></td>
                                        <?php endif;
                                        if ($info->tampil_jodohkan > 0) : ?>
                                            <td class="text-center text-success align-middle" data-a-v="middle"
                                                data-a-h="center" data-b-a-s="thin"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                <b> <?= $disable ? '' : $siswa->skor_jodohkan ?> </b></td>
                                        <?php endif;
                                        if ($info->tampil_isian > 0) : ?>
                                            <td class="text-center text-success align-middle" data-a-v="middle"
                                                data-a-h="center" data-b-a-s="thin"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                <b> <?= $disable ? '' : $siswa->skor_isian ?> </b></td>
                                        <?php endif;
                                        if ($info->tampil_esai > 0) : ?>
                                            <td class="text-center text-success align-middle" data-a-v="middle"
                                                data-a-h="center" data-b-a-s="thin"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                <b> <?= $disable ? '' : $siswa->skor_essai ?> </b></td>
                                        <?php endif; ?>

                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                            <b> <?= $disable ? '' : round($siswa->skor_total, 2) ?> </b></td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                            <b> <?= $disable ? '' : ($siswa->skor_katrol == '' ? '' : round($siswa->skor_katrol, 2)) ?> </b>
                                        </td>
                                        <td class="text-center align-middle" data-exclude="true" data-a-v="middle"
                                            data-a-h="center" data-b-a-s="thin"
                                            style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                            <button type="button" class="btn btn-xs bg-success mb-1 <?= $disabled ?>"
                                                    onclick="lihatJawaban(<?= $siswa->id_siswa ?>)"
                                                    data-toggle="tooltip" title="Detail Jawaban Siswa" <?= $disabled ?>>
                                                Koreksi
                                            </button>
                                            <?php if (isset($siswa->dikoreksi) && $siswa->dikoreksi === '1') : ?>
                                                <i title="Sudah dikoreksi"
                                                   class="fa fa-check-circle text-green ml-1"></i>
                                            <?php else: ?>
                                                <i title="Belum dikoreksi" class="fa fa-warning text-warning ml-1"></i>
                                            <?php endif; ?>
                                            <input type="hidden" name="ids[<?= $idSiswa ?>]"
                                                   value="<?= $disabled ? '2' : (isset($siswa->dikoreksi) && $siswa->dikoreksi ? '1' : '0') ?>">
                                        </td>
                                    </tr>

                                    <?php $no++; endforeach; ?>
                            </table>
                            <?= form_close() ?>
                        </div>
                    <?php endif; ?>
                    <!--
                    <div>
                        <table class="table-sm">
                            <tr>
                                <td>Katrol tertinggi</td>
                                <td>100</td>
                            </tr>
                            <tr>
                                <td>Katrol terrendah</td>
                                <td>60</td>
                            </tr>
                            <tr>
                                <td>Nilai tertinggi</td>
                                <td id="ntinggi"><?= $nilaiTertinggi ?></td>
                            </tr>
                            <tr>
                                <td>Nilai terendah</td>
                                <td id="nrendah">2</td>
                            </tr>
                        </table>
                    </div>
                    -->
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
                <button type="submit" class="btn btn-primary" id="convert">Katrol <i class="fa fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/tableToExcel.js"></script>

<script>
    var colWidthMin = '5,15,35,15,10,10,10,10,10,10';
    var colWidth = '<?= $colWidth ?>';

    var idJadwal = '<?=$jadwal_selected?>';
    var idKelas = '<?=$kelas_selected?>';
    const arrSiswa = <?= json_encode($siswas) ?>;
    var isSelected = <?= count($siswas) > 0 ? 1 : 0?>;
    var namaMapel = '<?=isset($info) ? $info->kode : ''?>';
    var jenisUjian = '<?=isset($info) ? $info->kode_jenis : ''?>';

    var nilai_max = <?=$XA?>;//nilai siswa terbesar
    var nilai_min = <?=$XB?>;//nilai siswa terkecil
    var hasil_max = <?=$YA?>;//batas nilai terbesar
    var hasil_min = <?=$YB?>;//batas nilai terkecil

    function lihatJawaban(idSiswa) {
        //console.log("cbtnilai/getnilaisiswa?siswa=" + idSiswa + '&jadwal=' + idJadwal);
        window.location.href = base_url + 'cbtnilai/detail?siswa=' + idSiswa + '&jadwal=' + idJadwal;
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

    function getKelasJadwal(idKelas) {
        $.ajax({
            type: "GET",
            url: base_url + "cbtstatus/getjadwalujianbykelas?id_kelas=" + idKelas,
            cache: false,
            success: function (response) {
                console.log(response);

                var selJadwal = $('#jadwal');
                selJadwal.html('');
                selJadwal.append('<option value="">Pilih Jadwal</option>');
                $.each(response, function (k, v) {
                    if (v != null) {
                        selJadwal.append('<option value="' + k + '">' + v + '</option>');
                    }
                });
                const enb = isSelected && $("#jadwal").val() === "<?= $jadwal_selected ?>"
                $('#import-essai').attr('disabled', !enb);
                $('#import-essai').toggleClass('btn-disabled', !enb);
            }
        });
    }

    $(document).ready(function () {
        ajaxcsrf();

        const loading = $('#loading');
        var opsiJadwal = $("#jadwal");
        var opsiKelas = $("#kelas");

        var selected = isSelected === 0 ? "selected='selected'" : "";
        opsiJadwal.prepend("<option value='' " + selected + " disabled>Pilih Jadwal</option>");
        opsiKelas.prepend("<option value='' " + selected + " disabled>Pilih Kelas</option>");
        $('#import-essai').attr('disabled', !isSelected);
        $('#import-essai').toggleClass('btn-disabled', !isSelected);
        $('#mark-all').attr('disabled', !isSelected);
        $('#mark-all').toggleClass('btn-disabled', !isSelected);

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
        });

        opsiKelas.change(function () {
            //loadSiswaKelas($(this).val(), opsiJadwal.val())
            //console.log(opsiKelas.val(), opsiJadwal.val())
            //const dis = $(this).val() === "<?= $kelas_selected ?>" && opsiJadwal.val() === "<?= $jadwal_selected ?>"
            //$('#import-essai').attr('disabled', dis);
            //$('#import-essai').toggleClass('btn-disabled', dis);
            getKelasJadwal($(this).val());
        });

        opsiJadwal.change(function () {
            idJadwal = $(this).val();
            //getDetailJadwal(idJadwal);
            //const dis = $(this).val() === "<?= $jadwal_selected ?>" && opsiKelas === "<?= $kelas_selected ?>"
            //$('#import-essai').attr('disabled', dis);
            //$('#import-essai').toggleClass('btn-disabled', dis);
            loadSiswaKelas(opsiKelas.val(), $(this).val())
        });

        $("#download-excel").click(function (event) {
            var table = document.querySelector("#table-status");
            if (table != null) {
                //TableToExcel.convert(table);
                TableToExcel.convert(table, {
                    name: `Nilai ${jenisUjian} ${$("#kelas option:selected").text()} ${namaMapel}.xlsx`,
                    sheet: {
                        name: "Sheet 1"
                    }
                });
                /*
                table1 = document.getElementById("simpleTable1");
                table2 = document.getElementById("simpleTable2");
                book = TableToExcel.tableToBook(table1, {sheet: {name: "sheet1"}});
                TableToExcel.tableToSheet(book, table2, {sheet: {name: "sheet2"}});
                TableToExcel.save(book, "test.xlsx")
                */
            } else {
                Swal.fire({
                    title: "ERROR",
                    text: "Isi JADWAL dan KELAS terlebih dulu",
                    icon: "error"
                })
            }
        });

        loading.addClass('d-none');

        $("#nilai-detail").on("click", function () {
            if (this.checked) {
            } else {
            }
            var exluded = this.checked;
            $('#no-soal-tile').attr('data-exclude', '' + !exluded);
            $('.no-soal').attr('data-exclude', '' + !exluded);
            $('.no-soal-siswa').attr('data-exclude', '' + !exluded);

            var width = $('#table-status').attr('data-cols-width');
            $('#table-status').attr('data-cols-width', width == colWidth ? colWidthMin : colWidth)
        });

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

        $("#import-essai").on("click", function () {
            var kls = opsiKelas.val();
            var jad = opsiJadwal.val();
            if (kls = null || jad == null) {
                return;
            }
            window.location.href = base_url + 'cbtnilai/inputessai?kelas=' + opsiKelas.val() + '&jadwal=' + opsiJadwal.val();
        });

        $('#mark-all').on('click', function () {
            let dataPost = new FormData($('#koreksi-semua')[0])
            dataPost.append('id_jadwal', idJadwal)
            //console.log('arrSiswa', dataForm)
            //var dataPost = $('#koreksi-semua').serialize() + '&id_jadwal=' + idJadwal;
            loading.removeClass('d-none');
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
                url: base_url + "cbtnilai/tandaisemua",
                type: "POST",
                data: dataPost,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    if (data.success > 0) {
                        swal.fire({
                            title: "Berhasil",
                            text: "Koreksi nilai berhasil disimpan",
                            icon: "success"
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    } else {
                        loading.addClass('d-none');
                        swal.fire({
                            title: "Gagal",
                            text: 'Tidak ada nilai yang disimpan',
                            icon: "error"
                        });
                    }
                }, error: function (xhr, status, error) {
                    loading.addClass('d-none');
                    console.log("error", xhr.responseText);
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        })

        opsiKelas.select2({theme: 'bootstrap4'});
        opsiJadwal.select2({theme: 'bootstrap4'});

    })
</script>
