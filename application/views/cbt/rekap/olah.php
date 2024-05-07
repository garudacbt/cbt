<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */

function unserialize_with_key($serialized)
{
    $arr = unserialize($serialized ?? '');
    $result = [];
    foreach ($arr as $value) {
        $result[$value['no_soal']] = $value['jawab'];
    }
    return $result;
}

if (!isset($rekap)) {
    $rekap = json_decode(json_encode(['kode_jenis' => '', 'nama_mapel' => '']));
}

$XA = isset($convert) ? $convert['xa'] : 0;
$XB = isset($convert) ? $convert['xb'] : 20;
$YA = isset($convert) ? $convert['ya'] : 100;
$YB = isset($convert) ? $convert['yb'] : 60;

$colWidth = '';
function decimalFixed($num)
{
    return round(($num * 100) / 100, 2);
}

?>

<div class="content-wrapper bg-white">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('cbtrekap') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </a>
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
                        <div class="col-md-3" id="by-kelas">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Kelas</span>
                                </div>
                                <?php
                                $disable = $kelas ? '' : 'disabled="disabled"';
                                echo form_dropdown('kelas', $kelas, $kelas_selected, 'id="kelas" class="form-control" ' . $disable); ?>
                            </div>
                        </div>
                        <div class="col-9 <?= $kelas ? 'd-none' : '' ?>">
                            <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                Tidak bisa ditampilkan, Coba lagi <b>ULANGI REKAP</b> di halaman REKAP
                            </div>
                        </div>

                    </div>
                    <hr>
                    <?php
                    if (isset($rekap) && $kelas) :
                        $colWidth = '5,15,35';
                        for ($s = 0; $s < $rekap->tampil_pg; $s++) {
                            $colWidth .= ',4';
                        }
                        $colWidth .= ',10,10,10';

                        $jml_soal = $rekap->tampil_pg + $rekap->soal_kompleks->tampil +
                            $rekap->soal_jodohkan->tampil + $rekap->soal_isian->tampil + $rekap->soal_essai->tampil;

                        $cols = [$rekap->tampil_pg, $rekap->soal_kompleks->tampil, $rekap->soal_jodohkan->tampil, $rekap->soal_isian->tampil, $rekap->soal_essai->tampil];
                        $cols = array_filter($cols);
                        $rows = count($cols) > 1 ? 1 : 2;
                        ?>
                        <div class="row">
                            <div class="col-12 text-right" id="group-export">
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
                                <button type="button" id="nilai-detail" class="btn btn-success align-text-bottom"
                                        data-toggle="tooltip"
                                        title="Tampil Detail">
                                    <i class="fa fa-list ml-1 mr-1"></i> Tampil Detail
                                </button>
                                <button type="button" id="download-excel" class="btn btn-success align-text-bottom"
                                        data-toggle="tooltip"
                                        title="Download Excel">
                                    <i class="fa fa-file-excel ml-1 mr-1"></i> Ekspor ke Excel
                                </button>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 overflow-auto">
                                <table class="table" id="table-status" data-cols-width="<?= $colWidth ?>"
                                       style="white-space: nowrap;">
                                    <tr>
                                        <td colspan="2" style="width: 120px">Soal</td>
                                        <td colspan="2"><b><?= $rekap->bank_kode ?></b></td>
                                        <td colspan="8">Mata Pelajaran</td>
                                        <td colspan="12"><b><?= $rekap->nama_mapel ?></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Jenis Penilaian</td>
                                        <td colspan="2"><b><?= $rekap->kode_jenis ?></b></td>
                                        <td colspan="8">Guru Pengampu</td>
                                        <td colspan="12"><b><?= $rekap->nama_guru ?></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Kelas</td>
                                        <td colspan="2"><b><?= $nama_kelas ?></b></td>
                                        <td colspan="8">Waktu Pelaksanaan</td>
                                        <td colspan="12">
                                            <b><?= singkat_tanggal(date('d M Y', strtotime($rekap->tgl_mulai))) ?></b>
                                            s/d
                                            <b><?= singkat_tanggal(date('d M Y', strtotime($rekap->tgl_selesai))) ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Jumlah Soal</td>
                                        <td colspan="2"><b><?= $jml_soal ?></b></td>
                                        <td colspan="8">TP / SMT</td>
                                        <td colspan="12"><b><?= $rekap->tp ?></b> smt <b><?= $rekap->smt ?></b></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <?php if (isset($siswas)) :
                                        $soal_pgs = $rekap->jawaban_pg;
                                        ?>
                                        <tr>
                                            <th rowspan="2" class="text-center align-middle bg-blue" width="40"
                                                data-fill-color="b8daff" data-a-v="middle" data-a-h="center"
                                                data-b-a-s="thin"
                                                data-f-bold="true"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                No.
                                            </th>
                                            <th rowspan="2" class="text-center align-middle bg-blue" width="100"
                                                data-fill-color="b8daff" data-a-v="middle" data-a-h="center"
                                                data-b-a-s="thin"
                                                data-f-bold="true"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center; padding: 0 20px 0 20px;">
                                                No. Peserta
                                            </th>
                                            <th rowspan="2" class="text-center align-middle bg-blue"
                                                data-fill-color="b8daff"
                                                data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                Nama
                                            </th>
                                            <?php if ($rekap->tampil_pg > 0) : ?>
                                                <th id="no-soal-tile" colspan="<?= $rekap->tampil_pg ?>"
                                                    class="text-center align-middle bg-blue"
                                                    data-fill-color="b8daff" data-a-v="middle" data-a-h="center"
                                                    data-b-a-s="thin"
                                                    data-f-bold="true" data-exclude="false"
                                                    style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                    Nomor Soal
                                                </th>
                                                <th rowspan="2" class="text-center align-middle bg-blue"
                                                    data-fill-color="b8daff"
                                                    data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                                    data-f-bold="true"
                                                    style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                    PG Benar
                                                </th>
                                            <?php endif; ?>
                                            <th colspan="<?= count($cols) ?>" class="text-center align-middle bg-blue"
                                                data-fill-color="b8daff"
                                                data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                SKOR
                                            </th>
                                            <th colspan="2" class="text-center align-middle bg-blue"
                                                data-fill-color="b8daff"
                                                data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                                style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                Nilai
                                            </th>
                                        </tr>
                                        <tr>
                                            <?php if ($rekap->tampil_pg > 0) :
                                                for ($s = 0; $s < $rekap->tampil_pg; $s++) : ?>
                                                    <th class="text-center align-middle bg-blue p-1 no-soal"
                                                        data-fill-color="b8daff"
                                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                                        data-f-bold="true"
                                                        data-exclude="false"
                                                        style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                        <?= $s + 1 ?>
                                                    </th>
                                                <?php endfor; ?>
                                                <th class="text-center align-middle bg-blue p-1"
                                                    data-fill-color="b8daff"
                                                    data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                                    data-f-bold="true"
                                                    style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                    PG
                                                </th>
                                            <?php endif;
                                            if ($rekap->soal_kompleks->tampil > 0) :?>
                                                <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                                    data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                                    data-f-bold="true"
                                                    style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                    PGK
                                                </th>
                                            <?php endif;
                                            if ($rekap->soal_jodohkan->tampil > 0) :?>
                                                <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                                    data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                                    data-f-bold="true"
                                                    style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                    JOD
                                                </th>
                                            <?php endif;
                                            if ($rekap->soal_isian->tampil > 0) :?>
                                                <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                                    data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                                    data-f-bold="true"
                                                    style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                    IS
                                                </th>
                                            <?php endif;
                                            if ($rekap->soal_essai->tampil > 0) :?>
                                                <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                                    data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                                    data-f-bold="true"
                                                    style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                    ES
                                                </th>
                                            <?php endif; ?>
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

                                            $jwb_pgs = $siswa->jawaban_pg;
                                            $total = $siswa->nilai_pg + $siswa->soal_kompleks->nilai +
                                                $siswa->soal_jodohkan->nilai + $siswa->soal_isian->nilai + $siswa->soal_essai->nilai;
                                            $nilai_convert = decimalFixed($total);
                                            if (isset($convert)) {
                                                //((YA-YB)/(XA-XB))*(NX-XB)+YB
                                                $nilai_convert = decimalFixed(((($YA - $YB) / 100) * $nilai_convert) + $YB);
                                            } else {
                                                if ($nilai_convert > $XA) {
                                                    $XA = $nilai_convert;
                                                }
                                                if ($nilai_convert < $XB) {
                                                    $XB = $nilai_convert;
                                                }
                                                //$nilai_pg = $skor_pg;
                                                $nilai_convert = decimalFixed($total);
                                            }

                                            ?>
                                            <tr>
                                                <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                                    data-b-a-s="thin"
                                                    style="border: 1px solid grey;border-collapse: collapse; text-align: center;"> <?= $no ?> </td>
                                                <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                                    data-b-a-s="thin"
                                                    style="border: 1px solid grey;border-collapse: collapse; text-align: center;"> <?= $siswa->nomor_peserta ?> </td>
                                                <td class="align-middle" data-a-v="middle" data-b-a-s="thin"
                                                    style="border: 1px solid grey;border-collapse: collapse;"> <?= $siswa->nama ?> </td>
                                                <?php
                                                if ($rekap->tampil_pg > 0) :
                                                    $benar_pg = 0;
                                                    $salah_pg = 0;
                                                    foreach ($soal_pgs as $key => $benar) :
                                                        $bg1 = '#FF7043';
                                                        $bg2 = 'data-fill-color="FF7043"';
                                                        $jwbn = '';
                                                        if (isset($jwb_pgs[$key])) {
                                                            $jwbn = isset($jwb_pgs[$key]) ? $jwb_pgs[$key] : '';
                                                            if (strtoupper($benar ?? '') == strtoupper($jwb_pgs[$key] ?? '')) {
                                                                $bg1 = '#00E676';
                                                                $bg2 = 'data-fill-color="00E676"';
                                                                $benar_pg++;
                                                            } else {
                                                                $salah_pg++;
                                                            }
                                                        }
                                                        ?>
                                                        <td class="no-soal-siswa" <?= $bg2 ?> data-a-v="middle"
                                                            data-a-h="center" data-b-a-s="thin"
                                                            data-exclude="false"
                                                            style="background-color: <?= $bg1 ?>;border: 1px solid grey;border-collapse: collapse; text-align: center;"><?= $jwbn ?></td>
                                                    <?php endforeach; ?>
                                                    <td data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;"><?= $benar_pg ?></td>
                                                    <td class="text-center text-success align-middle" data-a-v="middle"
                                                        data-a-h="center" data-b-a-s="thin"
                                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                                        <b><?= $siswa->nilai_pg ?></b></td>
                                                <?php endif;
                                                if ($rekap->soal_kompleks->tampil > 0) :?>
                                                    <td class="text-center text-success align-middle" data-a-v="middle"
                                                        data-a-h="center" data-b-a-s="thin"
                                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                                        <b><?= $siswa->soal_kompleks->nilai ?></b></td>
                                                <?php endif;
                                                if ($rekap->soal_jodohkan->tampil > 0) :?>
                                                    <td class="text-center text-success align-middle" data-a-v="middle"
                                                        data-a-h="center" data-b-a-s="thin"
                                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                                        <b><?= $siswa->soal_jodohkan->nilai ?></b></td>
                                                <?php endif;
                                                if ($rekap->soal_isian->tampil > 0) :?>
                                                    <td class="text-center text-success align-middle" data-a-v="middle"
                                                        data-a-h="center" data-b-a-s="thin"
                                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                                        <b><?= $siswa->soal_isian->nilai ?></b></td>
                                                <?php endif;
                                                if ($rekap->soal_essai->tampil > 0) :?>
                                                    <td class="text-center text-success align-middle" data-a-v="middle"
                                                        data-a-h="center" data-b-a-s="thin"
                                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                                        <b><?= $siswa->soal_essai->nilai ?></b></td>
                                                <?php endif; ?>
                                                <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                                    data-b-a-s="thin"
                                                    style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                                    <b><?= $total ?></b></td>
                                                <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                                    data-b-a-s="thin"
                                                    style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                                    <b><?= $nilai_convert ?></b></td>
                                            </tr>

                                            <?php $no++; endforeach; endif; ?>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="overlay d-none" id="loading">
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
    var colWidthMin = '5,15,35,10,10,10';
    var colWidth = '<?= $colWidth ?>';

    var idJadwal = '<?=$jadwal_selected?>';
    var isSelected = <?= isset($siswa) ? '1' : '0'?>;
    var mapel = '<?=  $rekap->nama_mapel . " " . $rekap->kode_jenis . " " . $rekap->tp . " SMT " . $rekap->smt ?>';

    var nilai_max = <?=$XA?>;//nilai siswa terbesar
    var nilai_min = <?=$XB?>;//nilai siswa terkecil
    var hasil_max = <?=$YA?>;//batas nilai terbesar
    var hasil_min = <?=$YB?>;//batas nilai terkecil

    function lihatJawaban(idSiswa) {
        console.log("cbtnilai/getnilaisiswa?siswa=" + idSiswa + '&jadwal=' + idJadwal);
        window.location.href = base_url + 'cbtnilai/getnilaisiswa?siswa=' + idSiswa + '&jadwal=' + idJadwal;
    }

    $(document).ready(function () {
        ajaxcsrf();

        var opsiJadwal = $("#jadwal");
        var opsiKelas = $("#kelas");

        var selected = isSelected === 0 ? "selected='selected'" : "";
        opsiJadwal.prepend("<option value='' " + selected + " disabled>Pilih Jadwal</option>");
        opsiKelas.prepend("<option value='' " + selected + " disabled>Pilih Kelas</option>");

        function loadSiswaKelas(kelas) {
            var empty = kelas === '';
            if (!empty) {
                window.location.href = base_url + 'cbtrekap/olahnilai?kelas=' + kelas + '&jadwal=' + idJadwal;
            } else {
                console.log('empty')
            }
        }

        opsiKelas.change(function () {
            loadSiswaKelas($(this).val(), opsiJadwal.val())
        });

        //getDetailJadwal(idJadwal);
        $('#rollback').on('click', function (e) {
            loadSiswaKelas(opsiKelas.val(), opsiJadwal.val())
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
                window.location.href = base_url + 'cbtrekap/olahnilai?kelas=' + opsiKelas.val() + '&jadwal=' + idJadwal +
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

        $("#nilai-detail").click(function (event) {
            $("#no-soal-tile").toggleClass('d-none');
            $(".no-soal").toggleClass('d-none');
            $(".no-soal-siswa").toggleClass('d-none');

            var exluded = $('#no-soal-tile').attr('data-exclude') == 'true';
            $('#no-soal-tile').attr('data-exclude', '' + !exluded);
            $('.no-soal').attr('data-exclude', '' + !exluded);
            $('.no-soal-siswa').attr('data-exclude', '' + !exluded);

            var width = $('#table-status').attr('data-cols-width');
            console.log('attr', width);
            $('#table-status').attr('data-cols-width', width == colWidth ? colWidthMin : colWidth)
            //if () {
            //}
        });

        $("#download-excel").click(function (event) {
            var table = document.querySelector("#table-status");
            //TableToExcel.convert(table);
            TableToExcel.convert(table, {
                name: `Nilai Siswa ${$("#kelas option:selected").text()} ${mapel}.xlsx`,
                sheet: {
                    name: "Nilai"
                }
            });
        });
    })
</script>
