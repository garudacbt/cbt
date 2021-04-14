<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */

function unserialize_with_key($serialized) {
    $arr = unserialize($serialized);
    $result = [];
    foreach ($arr as $value) {
        $result[$value['no_soal']] = $value['jawab'];
    }
    return $result;
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
                    <button onclick="window.history.back();" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </button>
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
                        <!--
                        <button id="refresh" class="btn btn-default align-text-bottom" onclick="refreshStatus()"
                                data-toggle="tooltip"
                                title="Refresh">
                            <i class="fa fa-sync ml-1 mr-1"></i> Refresh
                        </button>
                        -->
                        <button type="button" id="download-excel" class="btn btn-success align-text-bottom"
                                data-toggle="tooltip"
                                title="Download Excel">
                            <i class="fa fa-file-excel ml-1 mr-1"></i> Ekspor ke Excel
                        </button>
                    </div>
                    <?php
                    if (isset($siswas)) :
                        $info = $infos[0];

                        //echo '<pre>';
                        //var_dump($infos);
                        //echo var_export($siswas[39]->nilai, true);
                        //$soal_pgs = unserialize($siswas[39]->nilai[4]->soal_pg);
                        //var_dump($);
                        //var_dump($infos);
                        //echo '</pre>';

                        $soal_pgs = unserialize_with_key($info->jawaban_pg);
                        $soal_ess = unserialize_with_key($info->jawaban_esai);


                        $colWidth = '5,15,35';
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
                                    <td colspan="2">Level Kelas</td>
                                    <td colspan="5"><?= $info->bank_level ?></td>
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
                                        style="border: 1px solid gray;border-collapse: collapse; text-align: center;">
                                        No.
                                    </th>
                                    <th rowspan="2" class="text-center align-middle bg-blue" width="100"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true"
                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                        No. Peserta
                                    </th>
                                    <th rowspan="2" class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                        Nama
                                    </th>
                                    <th colspan="<?= $info->tampil_pg ?>" class="text-center align-middle bg-blue"
                                        data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                        data-f-bold="true"
                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                        Nomor Soal
                                    </th>
                                    <th rowspan="2" class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                        Jml. Benar
                                    </th>
                                    <th colspan="3" class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                        Nilai
                                    </th>
                                </tr>
                                <tr>
                                    <?php for ($s = 0; $s < $info->tampil_pg; $s++) : ?>
                                        <th class="text-center align-middle bg-blue p-1" data-fill-color="b8daff"
                                            data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                            style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                            <?= $s + 1 ?>
                                        </th>
                                    <?php endfor; ?>
                                    <th class="text-center align-middle bg-blue p-1" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                        PG
                                    </th>
                                    <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                        Essai
                                    </th>
                                    <th class="text-center align-middle bg-blue" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"
                                        style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                        Skor
                                    </th>
                                </tr>

                                <?php
                                $no = 1;
                                foreach ($siswas as $siswa) :
                                    $idSiswa = $siswa->id_siswa;
                                    //var_dump($idSiswa);

                                    $nil = $siswa->nilai[$mapel];
                                    $jwb_pgs = unserialize_with_key($nil->jawaban_pg);
                                    $jwb_ess = unserialize_with_key($nil->jawaban_esai);

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
                                        if ($soal_pgs > 0) :
                                            $benar_pg = 0;
                                        $salah_pg = 0;
                                        foreach ($soal_pgs as $key => $benar) :
                                            $bg1 = 'bg-red';
                                            $bg2 = 'data-fill-color="FF7043"';
                                        $jwbn = '';
                                            if (isset($jwb_pgs[$key])) {
                                                $jwbn = isset($jwb_pgs[$key]) ? $jwb_pgs[$key] : '';
                                                if (strtoupper($benar) == strtoupper($jwb_pgs[$key])) {
                                                    $bg1 = 'bg-green';
                                                    $bg2 = 'data-fill-color="00E676"';
                                                    $benar_pg ++;
                                                } else {
                                                    $salah_pg ++;
                                                }
                                            }
                                            ?>
                                            <td class="<?= $bg1 ?>" <?= $bg2 ?> data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                                style="border: 1px solid grey;border-collapse: collapse; text-align: center;"><?= $jwbn ?></td>
                                        <?php endforeach; endif; ?>
                                        <td data-a-v="middle" data-a-h="center" data-b-a-s="thin"
                                            style="border: 1px solid grey;border-collapse: collapse; text-align: center;"><?= $benar_pg ?></td>
                                        <td class="text-center text-success align-middle" data-a-v="middle"
                                            data-a-h="center" data-b-a-s="thin"
                                            style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                            <b><?= $nil->nilai_pg ?></b></td>
                                        <td class="text-center text-success align-middle" data-a-v="middle"
                                            data-a-h="center" data-b-a-s="thin"
                                            style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                            <b><?= $nil->nilai_esai ?></b></td>
                                        <td class="text-center align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"
                                            style="border: 1px solid grey;border-collapse: collapse; text-align: center;">
                                            <b><?= $nil->nilai_pg + $nil->nilai_esai ?></b></td>
                                    </tr>

                                    <?php $no++; endforeach; ?>
                            </table>
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
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/tableToExcel.js"></script>

<script>
    var url = '';
    var bagi_pg = 0;
    var bobot_pg = 0;
    var bagi_essai = 0;
    var bobot_essai = 0;
    var idJadwal = '<?=$jadwal_selected?>';
    var isSelected = <?= isset($siswa) ? '1' : '0'?>;

    function lihatJawaban(idSiswa) {
        console.log("cbtnilai/getnilaisiswa?siswa=" + idSiswa + '&jadwal=' + idJadwal);
        window.location.href = base_url + 'cbtnilai/getnilaisiswa?siswa=' + idSiswa + '&jadwal=' + idJadwal;
    }

    function refreshStatus() {
        $('#table-status').html('');
        $('#info').addClass('d-none');
        $('#loading').removeClass('d-none');

        setTimeout(function () {
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    console.log(response);
                    createPreview(response)
                }
            });
        }, 500);
    }

    function createPreview(data) {
        /*
        var bagi = ($info->tampil_pg + $info->tampil_esai) / 100;
        var bobot = $mapel['bobot_pg'] / 100;
        var skor = ($benar / $bagi) * $bobot;
        */
        bagi_pg = data.info.tampil_pg / 100;
        bobot_pg = data.info.bobot_pg / 100;
        bagi_essai = data.info.tampil_esai / 100;
        bobot_essai = data.info.bobot_esai / 100;

        console.log('bagi', bagi_pg);
        console.log('bobot', bobot_pg);

        var tbody = '    <tr>' +
            '        <td colspan="2" style="width: 120px">Soal</td>' +
            '        <td colspan="5">' + data.info.bank_kode + '</td>' +
            '    </tr>' +
            '    <tr>' +
            '        <td colspan="2">Maata Pelajaran</td>' +
            '        <td colspan="5">' + data.info.nama_mapel + '</td>' +
            '    </tr>' +
            '    <tr>' +
            '        <td colspan="2">Level Kelas</td>' +
            '        <td colspan="5">' + data.info.bank_level + '</td>' +
            '    </tr>' +
            '    <tr>' +
            '        <td colspan="2">Jumlah Soal</td>' +
            '        <td colspan="5">' + data.info.tampil_pg + '</td>' +
            '    </tr>' +
            '    <tr>' +
            '    </tr>' +
            //'<thead class="alert-primary">' +
            '<tr>' +
            '<th rowspan="2" class="text-center align-middle" width="40">No.</th>' +
            '<th rowspan="2" class="text-center align-middle" width="100">No. Peserta</th>' +
            '<th rowspan="2" class="text-center align-middle">Nama</th>' +
            '<th colspan="3" class="text-center align-middle">Nilai</th>' +
            '<th rowspan="2" class="text-center align-middle">Aksi</th>' +
            '</tr>' +
            '<tr>' +
            '<th class="text-center align-middle p-1">PG</th>' +
            '<th class="text-center align-middle">Essai</th>' +
            '<th class="text-center align-middle">Skor</th>' +
            '</tr>';

        for (let i = 0; i < data.siswa.length; i++) {
            var idSiswa = data.siswa[i].id_siswa;

            //PG
            var jawaban_pg = data.jawaban[idSiswa].jawab_pg;
            var benar_pg = 0;
            var salah_pg = 0;
            for (let j = 0; j < jawaban_pg.length; j++) {
                if (jawaban_pg[j] != null && jawaban_pg[j].jawaban_siswa != null) {
                    if (jawaban_pg[j].jawaban_siswa.toUpperCase() === jawaban_pg[j].jawaban_benar.toUpperCase()) {
                        benar_pg += 1;
                    } else {
                        salah_pg += 1;
                    }
                }
            }
            console.log(benar_pg, salah_pg);
            var skor_pg = (benar_pg / bagi_pg) * bobot_pg;

            //ESSAI
            var jawaban_es = data.jawaban[idSiswa].jawab_essai;
            var benar_es = 0;
            var salah_es = 0;
            var dikoreksi = false;
            var skor_es = 0;
            if (data.info.tampil_esai > 0) {
                for (let j = 0; j < jawaban_es.length; j++) {
                    if (jawaban_es[j] != null) {
                        if (jawaban_es[j].koreksi === 1) {
                            benar_es += 1;
                            dikoreksi = true;
                        } else if (jawaban_es[j].koreksi === 2) {
                            salah_es += 1;
                            dikoreksi = true;
                        } else {
                            dikoreksi = false;
                            break;
                        }
                    }
                }
                skor_es = (benar_es / bagi_essai) * bobot_essai
            }


            var logging = data.jawaban[idSiswa].log;
            var mulai = '- -  :  - -';
            var selesai = '- -  :  - -';
            for (let k = 0; k < logging.length; k++) {
                if (logging[k].log_type === '1') {
                    if (logging[k] != null) {
                        var t = logging[k].log_time.split(/[- :]/);
                        //var d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
                        mulai = t[3] + ':' + t[4];
                    }
                } else {
                    if (logging[k] != null) {
                        var ti = logging[k].log_time.split(/[- :]/);
                        selesai = ti[3] + ':' + ti[4];
                    }
                }
            }

            var disabled = mulai.includes('-') ? 'disabled' : '';
            tbody += '<tr>' +
                '<td class="text-center align-middle">' + (i + 1) + '</td>' +
                '<td class="text-center align-middle">' + data.siswa[i].nomor_peserta + '</td>' +
                '<td class="align-middle">' + data.siswa[i].nama + '</td>' +
                '<td class="text-center text-success align-middle"><b>' + skor_pg + '</b></td>';
            if (dikoreksi) {
                tbody += '<td class="text-center text-success align-middle"><b>' + skor_es + '</b></td>';
            } else {
                tbody += '<td class="text-center align-middle">';
                if (data.info.tampil_esai == 0) {
                    tbody += '--';
                } else {
                    tbody += '<button type="button" class="btn btn-xs bg-primary mb-1 ' + disabled + '" onclick="koreksiEssai()" data-toggle="tooltip" title="Koreksi Jawaban Essai">Koreksi</button>';
                }
                tbody += '</td>';
            }
            tbody += '<td class="text-center align-middle"><b>' + (skor_pg + skor_es) + '</b></td>' +
                '<td class="text-center align-middle">' +
                '	<button type="button" class="btn btn-xs bg-success mb-1 ' + disabled + '" onclick="lihatJawaban(' + data.siswa[i].id_siswa + ')" data-toggle="tooltip" title="Reset">Lihat</button>' +
                '</td>' +
                '</tr>';
        }

        tbody += '';
        $('#table-status').html(tbody);
        $('#info').removeClass('d-none');
        $('#group-export').removeClass('d-none');
        $('#loading').addClass('d-none');

        $('#info-ujian').html('<table class="table table-bordered table-sm">' +
            '    <tr>' +
            '        <td style="width: 120px">Soal</td>' +
            '        <td>' + data.info.bank_kode + '</td>' +
            '    </tr>' +
            '    <tr>' +
            '        <td>Maata Pelajaran</td>' +
            '        <td>' + data.info.nama_mapel + '</td>' +
            '    </tr>' +
            '    <tr>' +
            '        <td>Level Kelas</td>' +
            '        <td>' + data.info.bank_level + '</td>' +
            '    </tr>' +
            '    <tr>' +
            '        <td>Jumlah Soal</td>' +
            '        <td>' + data.info.tampil_pg + '</td>' +
            '    </tr>' +
            '</table>');
        $('#loading').addClass('d-none');
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


        $("#download-excel").click(function (event) {
            var table = document.querySelector("#table-status");
            //TableToExcel.convert(table);
            TableToExcel.convert(table, {
                name: `Hasil Siswa ${$("#kelas option:selected").text()}.xlsx`,
                sheet: {
                    name: "Sheet 1"
                }
            });
        });
    })
</script>
