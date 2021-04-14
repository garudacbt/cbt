<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title">Siswa</h3>
                        </div>
                        <div class="card-body p-0"
                             style="height: 400px;overflow-y:auto;-webkit-overflow-scrolling: touch">
                            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview">
                                <?php $n = 1;
                                foreach ($siswas as $siswa): ?>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" class="nav-link pt-1 pb-1 pl-2 text-sm siswa"
                                           onclick="preview(<?= $siswa->id_siswa ?>)">
                                            <?= $n . '. ' . $siswa->nama ?>
                                        </a>
                                    </li>
                                    <?php $n++; endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!--
                    <div class="card my-shadow">
                        <div class="card-header">
                            <div class="card-title">
                                <h6>Cetak Rapor PTS</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                    //echo '<pre>';
                    //var_dump($nilai_harian);
                    //echo '</pre>';
                    ?>
                            <table id="log" class="w-100 table table-striped table-bordered table-hover table-sm">
                                <thead class="alert alert-success">
                                <tr>
                                    <th height="50" width="50" class="align-middle text-center p-0">No.</th>
                                    <th class="align-middle">Nama Siswa</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                    $n = 1;
                    foreach ($siswas as $siswa): ?>
                                    <tr>
                                        <td class="align-middle text-center"><?= $n ?></td>
                                        <td class="align-middle"><?= $siswa->nama ?></td>
                                    </tr>
                                    <?php $n++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    -->
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="card-title">
                                <h6>Print Preview</h6>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm" onclick="cetakRapor()">
                                    <i class="fa fa-print mr-1"></i>Cetak
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-0 d-flex justify-content-center bg-gray-light">
                            <div style="transform: scale(0.9)">
                                <div id="print-preview" class="border my-shadow"
                                     style="background: white;width: 210mm; height: 330mm;padding-left: 0.5cm;padding-right: 0.5cm;padding-top: 1cm;padding-bottom: 1cm">
                                </div>
                            </div>
                        </div>
                        <div class="overlay d-none" id="loading">
                            <div class="spinner-grow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url() ?>/assets/app/js/print-area.js"></script>
<script>
    var kelas = '<?= $kelas ?>';
    var arrSiswa = JSON.parse(JSON.stringify(<?= json_encode($siswas)?>));
    var arrMapel = JSON.parse(JSON.stringify(<?= json_encode($mapels)?>));
    var nilaiHarian = JSON.parse(JSON.stringify(<?= json_encode($nilai_harian)?>));
    var nilaiPts = JSON.parse(JSON.stringify(<?= json_encode($nilai_pts)?>));
    var setting = JSON.parse(JSON.stringify(<?= json_encode($setting) ?>));
    var raporSetting = JSON.parse(JSON.stringify(<?= json_encode($rapor) ?>));
    var tp = '<?= $tp_active->tahun ?>';
    var smt = '<?= $smt_active->smt ?>';
    var kkm = JSON.parse(JSON.stringify(<?= json_encode($kkm)?>));

    var jmlKkmMapel = 0;
    var adaKkm = 0;
    $.each(kkm, function (k, v) {
        if (kkm[k] != null) {
            adaKkm ++;
            jmlKkmMapel += parseInt(kkm[k].kkm)
        }
    })

    var isi = adaKkm > 0 ? jmlKkmMapel / adaKkm : 70;
    var pre_d = 1;
    var pre_dsd = isi - 1;
    var pre_c = isi;
    var pre_csd = Math.floor(isi + (100 - isi) / 3);
    var pre_b = pre_csd + 1;
    var pre_bsd = Math.floor(pre_b + (100 - pre_b) / 2);
    var pre_a = pre_bsd + 1;
    var pre_asd = 100;

    function inRange(n, start, end) {
        return n >= start && n <= end;
    }

    function createPredikat(arrN) {
        arrN = $.grep(arrN, function (n, i) {
            return (n !== '' && n != null);
        });

        var jumlah = 0;
        for (let i = 0; i < arrN.length; i++) {
            jumlah += parseInt(arrN[i]);
        }
        var rata = Math.ceil(jumlah/arrN.length)
        console.log('rata', rata);

        if (inRange(rata, pre_a, pre_asd)) {
            return 'A';
        } else if (inRange(rata, pre_b, pre_bsd)) {
            return 'B';
        } else if (inRange(rata, pre_c, pre_csd)) {
            return 'C';
        } else if (inRange(rata, pre_d, pre_dsd)) {
            return 'D';
        } else {
            return '';
        }
    }

    function preview(idSiswa) {
        var siswa = null;
        for (let i = 0; i < arrSiswa.length; i++) {
            if (arrSiswa[i].id_siswa == idSiswa) {
                siswa = arrSiswa[i];
            }
        }

        //console.log(siswa);
        $('#loading').removeClass('d-none');

        var tableNilai = '<div style="padding-left: 1cm; padding-right: 1cm; padding-top: 0.3cm; padding-bottom: 0">' +
            '    <p style="font-family: \'Arial\';text-align: center;font-size: 14pt;"><b>RAPOR PENILAIAN TENGAH SEMESTER</b></p>' +
            '    <br>' +
            '    <table id="table-info-print" style="width: 100%; border: 0;">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;vertical-align: top">' +
            '            <td style="width:20%;">Nama</td>' +
            '            <td>:</td>' +
            '            <td style="width:40%;"><b>' + siswa.nama + '</b></td>' +
            '            <td style="width:20%;">Kelas</td>' +
            '            <td>:</td>' +
            '            <td style="width:20%;"><b>' + siswa.nama_kelas + '</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;vertical-align: top">' +
            '            <td>No. Induk/NISN</td>' +
            '            <td>:</td>' +
            '            <td><b>' + siswa.nis + '/' + siswa.nisn + '</b></td>' +
            '            <td>Semester</td>' +
            '            <td>:</td>' +
            '            <td><b>' + smt + '</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;vertical-align: top">' +
            '            <td>Nama Madrasah</td>' +
            '            <td>:</td>' +
            '            <td><b>' + setting.sekolah + '</b></td>' +
            '            <td>Tahun Pelajaran</td>' +
            '            <td>:</td>' +
            '            <td><b>' + tp + '</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;vertical-align: top">' +
            '            <td>Alamat</td>' +
            '            <td>:</td>' +
            '            <td><b>' + setting.alamat + ' ' + setting.kecamatan + ' ' + setting.kota + '</b>' +
            '            </td>' +
            '            <td></td>' +
            '            <td></td>' +
            '            <td></td>' +
            '        </tr>' +
            '    </table>' +
            '    <br>' +
            '    <table id="table-nilai-print" style="width: 100%;border: 2px solid black; border-collapse: collapse">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;text-align: center">' +
            '            <td rowspan="3" style="width:5%;border: 1px solid black; border-collapse: collapse"><b>NO</b>' +
            '            </td>' +
            '            <td rowspan="3" style="width:30%;border: 1px solid black; border-collapse: collapse"><b>Mata' +
            '                    Pelajaran</b></td>' +
            '            <td colspan="10" style="width:38%;border: 1px solid black; border-collapse: collapse">' +
            '                <b>Hasil Penilaian Harian (HPH)</b></td>' +
            '            <td rowspan="3" style="width:7%;border: 1px solid black; border-collapse: collapse"><b>HPTS</b>' +
            '            </td>' +
            '            <td rowspan="3" style="width:5%;border: 1px solid black; border-collapse: collapse"><b>PRE</b>' +
            '            </td>' +
            '            <td rowspan="3" style="width:15%;border: 1px solid black; border-collapse: collapse"><b>Keterangan</b>' +
            '            </td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;text-align: center">' +
            '            <td colspan="5" style="border: 1px solid black; border-collapse: collapse"><b>Pengetahuan</b>' +
            '            </td>' +
            '            <td colspan="5" style="border: 1px solid black; border-collapse: collapse"><b>Keterampilan</b>' +
            '            </td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;text-align: center">';

        for (let i = 0; i < 5; i++) {
            tableNilai += '<td style="border: 1px solid black; border-collapse: collapse;width: 20px">' +
                '<b>' + (i + 1) + '</b></td>';
        }
        for (let i = 0; i < 5; i++) {
            tableNilai += '<td style="border: 1px solid black; border-collapse: collapse;width: 20px">' +
                '<b>' + (i + 1) + '</b></td>';
        }

        tableNilai += '</tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '            <td colspan="15"' +
            '                style="border: 1px solid black; border-collapse: collapse; padding-left: 8px"><b>Kelompok' +
            '                    A (Umum)</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '            <td rowspan="5"' +
            '                style="border: 1px solid black; border-collapse: collapse; text-align: center; vertical-align: top;">' +
            '                1' +
            '            </td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse; vertical-align: top; padding-left: 6px">' +
            '                Pendidikan Agama Islam' +
            '            </td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse"></td>';
        for (let i = 0; i < 12; i++) {
            tableNilai += '<td style="border: 1px solid black; border-collapse: collapse"></td>';
        }
        tableNilai += '</tr>';

        var no = 2;
        var abjad = ['a', 'b', 'c', 'd'];
        var pos = 0;

        $.each(arrMapel, function (k, mapel) {
            var pts = nilaiPts[idSiswa][mapel.id_mapel] == '0' ? '' : nilaiPts[idSiswa][mapel.id_mapel];
            var arrN = [];
            if (mapel.urutan == '1') {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">' + abjad[pos] + '. ' + mapel.nama_mapel + '</td>';

                $.each(nilaiHarian[idSiswa][mapel.id_mapel], function (key, nilai) {
                    //arrN = [];
                    tableNilai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nilai + '</td>';
                    arrN.push(nilai);
                });
                arrN.push(pts);
                console.log('nilai_pai', arrN);
                tableNilai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    pts +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    createPredikat(arrN) +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>' +
                    '</tr>';
                pos++;
            } else if (mapel.urutan == '2') {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + no + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">' + mapel.nama_mapel + '</td>';
                $.each(nilaiHarian[idSiswa][mapel.id_mapel], function (key, nilai) {
                    //arrN = [];
                    tableNilai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nilai + '</td>';
                    arrN.push(nilai);
                });
                arrN.push(pts);
                console.log('nilai_a_umum', arrN);
                tableNilai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    pts +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    createPredikat(arrN) +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>' +
                    '</tr>';
                no++;
            }
        });

        tableNilai += '        <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '            <td colspan="15"' +
            '                style="border: 1px solid black; border-collapse: collapse; padding-left: 8px"><b>Kelompok B (Umum)</b></td>' +
            '        </tr>';

        $.each(arrMapel, function (k, mapel) {
            var arrN = [];
            var pts = nilaiPts[idSiswa][mapel.id_mapel] == '0' ? '' : nilaiPts[idSiswa][mapel.id_mapel];
            if (mapel.urutan == '3') {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + no + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">' + mapel.nama_mapel + '</td>';
                $.each(nilaiHarian[idSiswa][mapel.id_mapel], function (key, nilai) {
                    //arrN = [];
                    tableNilai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nilai + '</td>';
                    arrN.push(nilai);
                });
                arrN.push(pts);
                console.log('nilai_b_umum', arrN);
                tableNilai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    pts +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    createPredikat(arrN) +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>' +
                    '</tr>';
                no++;
            }
        });

        tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '<td rowspan="2" style="border: 1px solid black; border-collapse: collapse; text-align: center; vertical-align: top;">' + no + '</td>' +
            '<td style="border: 1px solid black; border-collapse: collapse; vertical-align: top; padding-left: 6px">' +
            '<b>Muatan Lokal *)</b>' +
            '</td>' +
            '<td style="border: 1px solid black; border-collapse: collapse"></td>';

        for (let i = 0; i < 12; i++) {
            tableNilai += '<td style="border: 1px solid black; border-collapse: collapse"></td>';
        }
        tableNilai += '</tr>';

        $.each(arrMapel, function (k, mapel) {
            var pts = nilaiPts[idSiswa][mapel.id_mapel] == '0' ? '' : nilaiPts[idSiswa][mapel.id_mapel];
            var arrN = [];
            if (mapel.kelompok == 'MULOK') {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">' + mapel.nama_mapel + '</td>';
                $.each(nilaiHarian[idSiswa][mapel.id_mapel], function (key, nilai) {
                    //arrN = [];
                    tableNilai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nilai + '</td>';
                    arrN.push(nilai);
                });
                arrN.push(pts);
                tableNilai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    pts +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    createPredikat(arrN) +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>' +
                    '</tr>';
                no++;
            }
        });

        tableNilai += '</table>' +
            '<small><i>HPTS = Hasil Penilaian Tengah Semester (khusus pada aspek Pengetahuan)</i></small>' +
            '<br>' +
            '<br>' +
            '<table id="table-kkm-print" style="width: 100%;border: 2px solid black; border-collapse: collapse">' +
            '    <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '        <td rowspan="2" style="width: 20%;border: 1px solid black; border-collapse: collapse; text-align: center;"><b>KKM</b></td>' +
            '        <td colspan="4" style="width:80%;border: 1px solid black; border-collapse: collapse; text-align: center;"><b>PREDIKAT</b></td>' +
            '    </tr>' +
            '    <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"><b>D (kurang)</b></td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"><b>C (cukup)</b></td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"><b>B (baik)</b></td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"><b>A (sangat baik)</b></td>' +
            '    </tr>' +
            '    <tr style="font-family: \'Tahoma\';font-size: 10pt;vertical-align: top">' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"><b>'+isi+'</b></td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">< '+isi+'</td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'+pre_c + ' ~ ' + pre_csd+'</td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'+pre_b+' ~ '+pre_bsd+'</td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'+pre_a +' ~ '+pre_asd +'</td>' +
            '    </tr>' +
            '</table>';

        tableNilai += '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '<table style="width: 100%">' +
            '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '<td style="width: 35%;">' +
            '    Mengetahui:' +
            '    <br>' +
            '    Orang Tua/Wali' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>' +
            '</td>' +
            '<td style="width: 30%;"></td>' +
            '<td style="width: 35%">' +
            setting.kota+',  ' + raporSetting.tgl_rapor_pts +
            '    <br>' +
            '    Kepala Madrasah' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <u>'+setting.kepsek+'</u>' +
            '    <br>' +
            '    Nip:' +
            '</td>' +
            '</tr>' +
            '</table>' +
            '</div>';
        $('#print-preview').html(tableNilai);

        setTimeout(function () {
            $('#loading').addClass('d-none');
        }, 500);
    }

    function cetakRapor() {
        $('#print-preview').print();
    }

    $(document).ready(function () {
        $('.siswa').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.siswa').removeClass('active');
            $(this).toggleClass('active');
        })
    })
</script>
