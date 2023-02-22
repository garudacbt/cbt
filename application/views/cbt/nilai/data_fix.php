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
                    <!--
					<div id="selector" class="card-tools btn-group">
						<button type="button" class="btn active btn-primary">By Ruang</button>
						<button type="button" class="btn btn-outline-primary">By Kelas</button>
					</div>
					-->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Jadwal</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'jadwal',
                                    $jadwal,
                                    null,
                                    'id="jadwal" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-md-3" id="by-kelas">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Kelas</span>
                                </div>
                                <select name="kelas" id="kelas" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 d-none" id="by-ruang">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Ruang</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'ruang',
                                    $ruang,
                                    null,
                                    'id="ruang" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-md-3 d-none">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Sesi</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'sesi',
                                    $sesi,
                                    null,
                                    'id="sesi" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="float-right d-none" id="group-export">
                        <button id="refresh" class="btn btn-default align-text-bottom" onclick="refreshStatus()"
                                data-toggle="tooltip"
                                title="Refresh">
                            <i class="fa fa-sync ml-1 mr-1"></i> Refresh
                        </button>
                        <button type="button" id="download-excel" class="btn btn-success align-text-bottom"
                                data-toggle="tooltip"
                                title="Download Excel">
                            <i class="fa fa-file-excel ml-1 mr-1"></i> Ekspor ke Excel
                        </button>
                    </div>
                    <div class="d-none" id="info">
                        <div id="info-ujian"></div>
                    </div>
                    <div>
                        <table class="table table-bordered" id="table-status">
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

<script>
    var printBy = 1;
    var url = '';
    var bagi_pg = 0;
    var bobot_pg = 0;
    var bagi_essai = 0;
    var bobot_essai = 0;
    var idJadwal = '';

    function lihatJawaban(idSiswa) {
        console.log("cbtnilai/getnilaisiswa?siswa=" + idSiswa + '&jadwal=' + idJadwal);
        window.location.href = base_url + 'cbtnilai/getnilaisiswa?siswa=' + idSiswa + '&jadwal=' + idJadwal;
    }

    function refreshStatus() {
        $('#table-status').html('');
        $('#info').addClass('d-none');
        $('#loading').removeClass('d-none');

        setTimeout(function () {
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

        var tbody = '<thead class="alert-primary">' +
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
            '</tr></thead><tbody>';

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

        tbody += '</tbody>';
        $('#table-status').html(tbody);
        $('#info').removeClass('d-none');
        $('#group-export').removeClass('d-none');
        $('#loading').addClass('d-none');

        $('#info-ujian').html('<table class="table table-bordered">' +
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
            '</table>'
            //'Soal: <b>' + data.info.bank_kode + '</b>, ' + 'Mata Pelajaran: <b>' + data.info.nama_mapel + '</b>, ' +
            //'Level Kelas: <b>' + data.info.bank_level + '</b>, ' +
            //'Jml Soal PG: <b>' + data.info.tampil_pg + '</b>, ' + 'Jml Soal Essai: <b>' + data.info.tampil_esai + '</b>'
        );
        $('#loading').addClass('d-none');
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
        var opsiRuang = $("#ruang");
        var opsiSesi = $("#sesi");
        var opsiKelas = $("#kelas");

        opsiJadwal.prepend("<option value='' selected='selected'>Pilih Jadwal</option>");
        opsiRuang.prepend("<option value='' selected='selected'>Pilih Ruang</option>");
        opsiSesi.prepend("<option value='' selected='selected'>Pilih Sesi</option>");
        opsiKelas.prepend("<option value='' selected='selected'>Pilih Kelas</option>");

        function loadSiswaRuang(ruang, sesi, jadwal) {
            //var empty = ruang === '' || sesi === '' || jadwal === '';
            var empty = ruang === '' || jadwal === '';
            if (!empty) {
                url = base_url + "cbtnilai/getnilairuang?ruang=" + ruang + '&sesi=' + sesi + '&jadwal=' + jadwal;
                refreshStatus();
            } else {
                console.log('empty')
            }
        }

        function loadSiswaKelas(kelas, sesi, jadwal) {
            //var empty = kelas === '' || sesi === '' || jadwal === '';
            var empty = ruang === '' || jadwal === '';
            if (!empty) {
                //url = base_url + "cbtnilai/getnilaikelas?kelas=" + kelas + '&sesi=' +sesi + '&jadwal=' + jadwal;
                url = base_url + "cbtnilai/getnilaikelas?kelas=" + kelas + '&jadwal=' + jadwal;
                refreshStatus();
            } else {
                console.log('empty')
            }
        }

        opsiKelas.change(function () {
            loadSiswaKelas($(this).val(), opsiSesi.val(), opsiJadwal.val())
        });

        opsiRuang.change(function () {
            loadSiswaRuang($(this).val(), opsiSesi.val(), opsiJadwal.val())
        });

        opsiSesi.change(function () {
            if (printBy === 2) {
                //loadSiswaRuang(opsiRuang.val(), $(this).val(), opsiJadwal.val())
            } else {
                loadSiswaKelas(opsiKelas.val(), $(this).val(), opsiJadwal.val())
            }
        });

        opsiJadwal.change(function () {
            idJadwal = $(this).val();
            getDetailJadwal(idJadwal);
            /*
            if (printBy === 2) {
                //loadSiswaRuang(opsiRuang.val(), opsiSesi.val(), $(this).val())
            } else {
                loadSiswaKelas(opsiKelas.val(), opsiSesi.val(), $(this).val())
            }*/
        });

        $('#selector button').click(function () {
            $(this).addClass('active').siblings().addClass('btn-outline-primary').removeClass('active btn-primary');

            if (!$('#by-kelas').is(':hidden')) {
                $('#by-kelas').addClass('d-none');
                $('#by-ruang').removeClass('d-none');
                printBy = 2;
            } else {
                $('#by-kelas').removeClass('d-none');
                $('#by-ruang').addClass('d-none');
                printBy = 1;
            }
        });
    })
</script>
