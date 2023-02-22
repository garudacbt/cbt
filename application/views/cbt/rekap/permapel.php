<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
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
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3" id="by-kelas">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Kelas</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'kelas',
                                    $kelas,
                                    null,
                                    'id="kelas" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Penilaian</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'jenis',
                                    $jenis,
                                    null,
                                    'id="jenis" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tahun</span>
                                </div>
                                <select name="tahun" id="opsi-tahun" class="form-control">
                                    <option value="" selected="selected" disabled="disabled">Tahun Pelajaran</option>
                                    <?php foreach ($tp as $tahun) : ?>
                                        <option value="<?= $tahun->id_tp ?>"><?= $tahun->tahun ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Semester</span>
                                </div>
                                <select name="smt" id="opsi-semester" class="form-control">
                                    <option value="0" selected="selected" disabled="disabled">Semester</option>
                                    <?php foreach ($smt as $sm) : ?>
                                        <option value="<?= $sm->id_smt ?>"><?= $sm->smt ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Penilaian</span>
                                </div>
                                <select name="smt" id="opsi-semester" class="form-control">
                                    <option value="0" selected="selected" disabled="disabled">Mapel</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row d-none" id="info">
                        <div class="col-12 mb-3">
                            <div class="float-right">
                                <button type="button" class="btn btn-default align-text-bottom"
                                        onclick="refreshStatus()"
                                        data-toggle="tooltip"
                                        title="Refresh">
                                    <i class="fa fa-sync ml-1 mr-1"></i> Refresh
                                </button>
                                <button type="button" id="download-excel" class="btn btn-success align-text-bottom"
                                        data-toggle="tooltip"
                                        title="Download Excel">
                                    <i class="fa fa-file-excel ml-1 mr-1"></i> Ekspor ke Excel
                                </button>
                                <button type="button" id="download-word" class="btn btn-primary align-text-bottom"
                                        data-toggle="tooltip"
                                        title="Download Word">
                                    <i class="fa fa-file-word ml-1 mr-1"></i> Ekspor ke Word
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="for-export">
                        <p id="title-table" style="text-align: center;font-weight: bold;"></p>
                        <table class="table" id="table-status"
                               style="font-size: 11pt; border: 1px solid black; border-collapse: collapse; border-spacing: 0; width: 100%">
                        </table>
                    </div>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/jquery.wordexport.js"></script>

<script>
    var printBy = 1;
    var url = '';
    //var bagi_pg = 0;
    //var bobot_pg = 0;
    //var bagi_essai = 0;
    //var bobot_essai = 0;

    function refreshStatus() {
        $('#table-status').html('');
        $('#info').addClass('d-none');
        $('#loading').removeClass('d-none');

        setTimeout(function () {
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    console.log('refresh', response);
                    if (response.length === 0) {
                        $('#loading').addClass('d-none');
                    } else {
                        createPreview(response)
                    }
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

        var arrBagiPg = [];
        var arrBobotPg = [];
        var arrBagiEs = [];
        var arrBobotEs = [];
        var arrMapel = [];

        $.each(data.info, function (key, value) {
            var itembagipg = {};
            itembagipg['id_jadwal'] = key;
            itembagipg['bagi'] = value.tampil_pg / 100;
            arrBagiPg.push(itembagipg);

            var itembobotpg = {};
            itembobotpg['id_jadwal'] = key;
            itembobotpg['bobot'] = value.bobot_pg / 100;
            arrBobotPg.push(itembobotpg);

            var itembagiess = {};
            itembagiess['id_jadwal'] = key;
            itembagiess['bagi'] = value.tampil_esai / 100;
            arrBagiEs.push(itembagiess);

            var itembobotess = {};
            itembobotess['id_jadwal'] = key;
            itembobotess['bobot'] = value.bobot_esai / 100;
            arrBobotEs.push(itembobotess);

            var itemMapel = {};
            itemMapel['id_jadwal'] = key;
            itemMapel['id_mapel'] = value.id_mapel;
            itemMapel['mapel'] = value.kode;
            arrMapel.push(itemMapel);
        });

        console.log('mapel', arrMapel);

        var tbody = '<thead class="alert-primary">' +
            '<tr>' +
            '<th rowspan="2" style="width:40px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">NO.</th>' +
            '<th rowspan="2" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">No. Peserta</th>' +
            '<th rowspan="2" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">Nama</th>' +
            '<th colspan="' + arrMapel.length + '"  style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">Nilai</th>' +
            '</tr>' +
            '<tr>';
        for (let m = 0; m < arrMapel.length; m++) {
            tbody += '<th class="p-1" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">' + arrMapel[m].mapel + '</th>';
        }
        tbody += '</tr></thead><tbody>';

        for (let i = 0; i < data.siswa.length; i++) {
            var idSiswa = data.siswa[i].id_siswa;

            //PG
            var skorPg = [];
            $.each(data.info, function (k, v) {
                var jawaban_pg = data.jawaban[idSiswa].jawab_pg[k];
                console.log(idSiswa, jawaban_pg);
                var benar_pg = 0;
                var salah_pg = 0;
                if (jawaban_pg != null) {
                    for (let j = 0; j < jawaban_pg.length; j++) {
                        if (jawaban_pg[j] != null) {
                            if (jawaban_pg[j].jawaban_siswa.toUpperCase() === jawaban_pg[j].jawaban_benar.toUpperCase()) {
                                benar_pg += 1;
                            } else {
                                salah_pg += 1;
                            }
                        }
                    }
                }
                var skor_pg = (benar_pg / (v.tampil_pg / 100)) * v.bobot_pg / 100;
                skorPg.push(skor_pg);
            });

            //ESSAI
            var jawaban_es = data.jawaban[idSiswa].jawab_essai;
            var benar_es = 0;
            var salah_es = 0;
            var skor_es = 0;
            if (data.info.tampil_esai > 0) {
                for (let j = 0; j < jawaban_es.length; j++) {
                    if (jawaban_es[j] != null) {
                        if (jawaban_es[j].koreksi === 1) {
                            benar_es += 1;
                        } else if (jawaban_es[j].koreksi === 2) {
                            salah_es += 1;
                        } else {
                            break;
                        }
                    }
                }
                //skor_es = (benar_es / bagi_essai) * bobot_essai
            }
            /*
            var logging = data.jawaban[idSiswa].log;
            var mulai = '- -  :  - -';
            var selesai = '- -  :  - -';
            for (let k = 0; k < logging.length; k++) {
                if (logging[k].log_type === '1') {
                    if (logging[k] != null) {
                        var t = logging[k].log_time.split(/[- :]/);
                        //var d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
                        mulai = t[3]+':'+t[4];
                    }
                } else {
                    if (logging[k] != null) {
                        var ti = logging[k].log_time.split(/[- :]/);
                        selesai = ti[3]+':'+ti[4];
                    }
                }
            }
            */

            //var disabled = mulai.includes('-') ? 'disabled' : '';
            console.log('skor', skorPg);
            tbody += '<tr>' +
                '<td style="border: 1px solid black;border-collapse: collapse; text-align: center;">' + (i + 1) + '</td>' +
                '<td style="border: 1px solid black;border-collapse: collapse; text-align: center;">' + data.siswa[i].nomor_peserta + '</td>' +
                '<td style="border: 1px solid black;border-collapse: collapse;">' + data.siswa[i].nama + '</td>';
            for (let s = 0; s < skorPg.length; s++) {
                tbody += '<td class="text-success" style="border: 1px solid black;border-collapse: collapse; text-align: center;"><b>' + skorPg[s] + '</b></td>';
            }
            //'<td class="text-center text-success align-middle"><b>'+skor_pg+'</b></td>';
            //'<td class="text-center text-success align-middle"><b>'+skor_es+'</b></td>';
            //'<td class="text-center align-middle"><b>'+(skor_pg + skor_es)+'</b></td>' +
            tbody += '</tr>';
        }

        tbody += '</tbody>';
        $('#table-status').html(tbody);
        $('#info').removeClass('d-none');
        $('#loading').addClass('d-none');

        /*
        $('#info-ujian').html('Soal: <b>' + data.info.bank_kode + '</b>, ' + 'Mata Pelajaran: <b>' + data.info.nama_mapel + '</b>, ' +
            'Level Kelas: <b>' + data.info.bank_level + '</b>, ' +
            'Jml Soal PG: <b>' + data.info.tampil_pg + '</b>, ' + 'Jml Soal Essai: <b>' + data.info.tampil_esai + '</b>');
            */
    }

    $(document).ready(function () {
        ajaxcsrf();

        var opsiKelas = $("#kelas");
        var opsiJenis = $('#jenis');
        var opsiTahun = $('#opsi-tahun');
        var opsiSmt = $('#opsi-semester');
        var title = $('#title-table');

        opsiKelas.prepend("<option value='' selected='selected'>Pilih Kelas</option>");

        function reload(kls, jenis, thn, smt) {
            //var thnSel = $("#opsi-tahun option:selected").text();
            //var thnSplit = thnSel.split('/');
            //var sthn = smt === '1' ? thnSplit[0] : thnSplit[1];
            var empty = jenis === '' || kls === '' || thn === '' || smt === '' || jenis == null || kls == null || thn == null || smt == null;
            var newData = 'kelas=' + kls + '&jenis=' + jenis + '&tahun=' + thn + '&smt=' + smt;

            //var empty = kelas === '';
            if (!empty) {
                url = base_url + "cbtrekap/getnilaikelas?" + newData;
                refreshStatus();
            } else {
                console.log('empty')
            }
        }

        opsiKelas.change(function () {
            var smt = opsiSmt.val() == '1' ? 'I' : (opsiSmt.val() == '2' ? 'II' : '');
            title.html('REKAP NILAI ' + $("#jenis option:selected").text() +
                ' KELAS ' + $("#kelas option:selected").text() + '<br>TAHUN PELAJARAN: ' +
                $("#opsi-tahun option:selected").text() + ' SEMESTER: ' + smt);

            reload($(this).val(), opsiJenis.val(), opsiTahun.val(), opsiSmt.val());
        });

        opsiJenis.on('change', function () {
            var smt = opsiSmt.val() == '1' ? 'I' : (opsiSmt.val() == '2' ? 'II' : '');
            title.html('REKAP NILAI ' + $("#jenis option:selected").text() +
                ' KELAS ' + $("#kelas option:selected").text() + '<br>TAHUN PELAJARAN: ' +
                $("#opsi-tahun option:selected").text() + ' SEMESTER: ' + smt);

            reload(opsiKelas.val(), $(this).val(), opsiTahun.val(), opsiSmt.val());
        });

        opsiTahun.change(function () {
            var smt = opsiSmt.val() == '1' ? 'I' : (opsiSmt.val() == '2' ? 'II' : '');
            title.html('REKAP NILAI ' + $("#jenis option:selected").text() +
                ' KELAS ' + $("#kelas option:selected").text() + '<br>TAHUN PELAJARAN: ' +
                $("#opsi-tahun option:selected").text() + ' SEMESTER: ' + smt);

            reload(opsiKelas.val(), opsiJenis.val(), $(this).val(), opsiSmt.val());
        });

        opsiSmt.on('change', function () {
            var smt = $(this).val() == '1' ? 'I' : ($(this).val() == '2' ? 'II' : '');
            title.html('REKAP NILAI ' + $("#jenis option:selected").text() +
                ' KELAS ' + $("#kelas option:selected").text() + '<br>TAHUN PELAJARAN: ' +
                $("#opsi-tahun option:selected").text() + ' SEMESTER: ' + smt);

            reload(opsiKelas.val(), opsiJenis.val(), opsiTahun.val(), $(this).val());
        });

        $("#download-word").click(function (event) {
            $("#for-export").wordExport('REKAP NILAI ' + $("#jenis option:selected").text() +
                ' Kls_' + $("#kelas option:selected").text() + ' ' +
                $("#opsi-tahun option:selected").text() + '_' + $("#opsi-semester option:selected").text());
        });
    })
</script>
