<?php
$satuan = [
    "1" => ["",
        "SEKOLAH DASAR (SD)",
        "MADRASAH IBTIDAIYAH (MI)"
    ],
    "2" => ["",
        "SEKOLAH MENENGAH PERTAMA (SMP)",
        "MADRASAH TSANAWIYAH (MTS)"
    ],
    "3" => ["",
        "SEKOLAH MENENGAH ATAS (SMA)",
        "MADRASAH ALIYAH (MA)",
        "SEKOLAH MENENGAH KEJURUAN (SMK)"
    ]
];
?>
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
                            <table id="log" class="w-100 table table-striped table-bordered table-hover">
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
                                <div id="model-selector" class="btn-group btn-group-sm">
                                    <button type="button" data-id="1" class="btn btn-outline-success">Model 1</button>
                                    <button type="button" data-id="2" class="btn active btn-success">Model 2</button>
                                </div>
                                <button class="btn btn-primary btn-sm ml-2" onclick="cetakRapor()">
                                    <i class="fa fa-print mr-1"></i>Cetak
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-0 d-flex justify-content-center bg-gray-light">
                            <div style="transform: scale(0.9)">
                                <div id="print-preview" class="border my-shadow"
                                     style="background: white;width: 210mm; min-height: 297mm;padding-left: 0.5cm;padding-right: 0.5cm;padding-top: 1cm;padding-bottom: 1cm">
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
    var arrKelompokMapel = JSON.parse(JSON.stringify(<?= json_encode($kelompoks)?>));
    var nilaiHarian = JSON.parse(JSON.stringify(<?= json_encode($nilai_harian)?>));
    var nilaiPts = JSON.parse(JSON.stringify(<?= json_encode($nilai_pts)?>));
    var setting = JSON.parse(JSON.stringify(<?= json_encode($setting) ?>));
    var raporSetting = JSON.parse(JSON.stringify(<?= json_encode($rapor) ?>));
    var tp = '<?= $tp_active->tahun ?>';
    var smt = '<?= $smt_active->nama_smt ?>';
    var kkm = JSON.parse(JSON.stringify(<?= json_encode($kkm)?>));

    var guru = JSON.parse(JSON.stringify(<?= json_encode($guru)?>));
    var satuanPend = JSON.parse(JSON.stringify(<?= json_encode($satuan)?>));
    var namaSatuanPend = setting.satuan_pendidikan == 2 ? 'Madrasah' : 'Sekolah';

    var nipKepsek = raporSetting != null && raporSetting.nip_kepsek === '1' ? setting.nip : '';
    var nipWalas = raporSetting != null && raporSetting.nip_walikelas === '1' ? guru.nip : '';

    let model = '2';
    let siswaActive = '';

    function inRange(n, start, end) {
        return n >= start && n <= end;
    }

    function handleNull(value) {
        if (value == null || value == '0' || value == '') return '-';
        else return value;
    }

    function handleNisn(nis, nisn) {
        var induk = '';
        if (handleNull(nis) != '-') {
            induk += handleNull(nis);
        }
        if (handleNull(nisn) != '-') {
            induk += ' / ' + handleNull(nisn);
        }
        return induk;
    }

    function createPredikat(arrN, idMapel) {
        if (raporSetting == null) {
            return;
        }
        const kkmmapel = raporSetting.kkm_tunggal == "1" ? raporSetting.kkm : (kkm[idMapel] == null ? 65 : kkm[idMapel].kkm);
        const isi = parseInt(kkmmapel);
        var pre_d = 1;
        var pre_dsd = isi - 1;
        var pre_c = isi;
        var pre_csd = Math.floor(isi + (100 - isi) / 3);
        var pre_b = pre_csd + 1;
        var pre_bsd = Math.floor(pre_b + (100 - pre_b) / 2);
        var pre_a = pre_bsd + 1;
        var pre_asd = 100;

        arrN = $.grep(arrN, function (n, i) {
            return (n !== '' && n != null);
        });

        var jumlah = 0;
        for (let i = 0; i < arrN.length; i++) {
            jumlah += parseInt(arrN[i]);
        }
        var rata = Math.ceil(jumlah / arrN.length);
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

    function createNilaiPredikat(arrN, idMapel) {
        if (raporSetting == null) {
            return;
        }
        const kkmmapel = raporSetting.kkm_tunggal == "1" ? raporSetting.kkm : (kkm[idMapel] == null ? 65 : kkm[idMapel].kkm);
        const isi = parseInt(kkmmapel);
        var pre_d = 1;
        var pre_dsd = isi - 1;
        var pre_c = isi;
        var pre_csd = Math.floor(isi + (100 - isi) / 3);
        var pre_b = pre_csd + 1;
        var pre_bsd = Math.floor(pre_b + (100 - pre_b) / 2);
        var pre_a = pre_bsd + 1;
        var pre_asd = 100;

        arrN = $.grep(arrN, function (n, i) {
            return (n !== '' && n != null);
        });

        var jumlah = 0;
        for (let i = 0; i < arrN.length; i++) {
            jumlah += parseInt(arrN[i]);
        }
        var rata = Math.ceil(jumlah / arrN.length);
        var p = '';

        if (inRange(rata, pre_a, pre_asd)) {
            p = 'A'
        } else if (inRange(rata, pre_b, pre_bsd)) {
            p = 'B';
        } else if (inRange(rata, pre_c, pre_csd)) {
            p = 'C';
        } else if (inRange(rata, pre_d, pre_dsd)) {
            p = 'D';
        }
        return {nilai: arrN.length > 0 ? rata : '', pred: p};
    }

    function inArray(val, array) {
        var found = $.inArray(val, array);
        return found >= 0;
    }

    function handleTitiMangsa(tgl) {
        var bulans = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var ttl = '';
        if (handleNull(tgl) != '-') {
            if (tgl.indexOf("-") >= 0) {
                var splitted = tgl.split("-");
                var tanggal, tahun;
                if (splitted[2] != null && splitted[0].length == 4) {
                    tanggal = splitted[2];
                    tahun = splitted[0];
                } else {
                    tanggal = splitted[0];
                    tahun = splitted[2];
                }
                var bulan = splitted[1];

                ttl += tanggal + " " + bulans[Math.abs(bulan)] + " " + tahun;
            } else {
                ttl = tgl;
            }
        }
        return ttl;
    }

    function preview(idSiswa) {
        siswaActive = idSiswa;
        if (raporSetting == null) {
            $('#print-preview').html('<b>Rapor belum diatur oleh admin</b>');
            return;
        }
        $('#loading').removeClass('d-none');
        setTimeout(function () {
            if (model == '1') {
                preview1(idSiswa);
            } else {
                preview2(idSiswa);
            }
        }, 100);
    }

    function preview1(idSiswa) {
        var siswa = null;
        for (let i = 0; i < arrSiswa.length; i++) {
            if (arrSiswa[i].id_siswa == idSiswa) {
                siswa = arrSiswa[i];
            }
        }

        var display = raporSetting.kkm_tunggal == '1' ? 'display:none;' : '';
        var collSpan = raporSetting.kkm_tunggal == '1' ? 19 : 20;

        var tableNilai = '<div style="padding: 0.3cm;">' +
            '    <p style="font-family: \'Arial\';text-align: center;font-size: 12pt;"><b>LAPORAN HASIL BELAJAR TENGAH SEMESTER</b></p>' +
            '    <br>' +
            '    <table id="table-info-print" style="width: 100%; border: 0;">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
            '            <td style="width:20%;">Nama</td>' +
            '            <td>:</td>' +
            '            <td style="width:40%;"><b>' + siswa.nama + '</b></td>' +
            '            <td style="width:20%;">Kelas</td>' +
            '            <td>:</td>' +
            '            <td style="width:20%;"><b>' + siswa.nama_kelas + '</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
            '            <td>No. Induk/NISN</td>' +
            '            <td>:</td>' +
            '            <td><b>' + handleNisn(siswa.nis, siswa.nisn) + '</b></td>' +
            '            <td>Semester</td>' +
            '            <td>:</td>' +
            '            <td><b>' + smt + '</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
            '            <td>Nama ' + namaSatuanPend + '</td>' +
            '            <td>:</td>' +
            '            <td><b>' + setting.sekolah + '</b></td>' +
            '            <td>Tahun Pelajaran</td>' +
            '            <td>:</td>' +
            '            <td><b>' + tp + '</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
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
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center">' +
            '            <td rowspan="3" style="width:5%;border: 1px solid black; border-collapse: collapse"><b>NO</b></td>' +
            '            <td rowspan="3" style="width:30%;border: 1px solid black; border-collapse: collapse"><b>Mata Pelajaran</b></td>' +
            '            <td rowspan="3" style="width:7%;border: 1px solid black; border-collapse: collapse; ' + display + '"><b>KKM</b></td>' +
            '            <td colspan="14" style="width:38%;border: 1px solid black; border-collapse: collapse">' +
            '                <b>Hasil Penilaian Harian (HPH)</b></td>' +
            '            <td rowspan="3" style="width:6%;border: 1px solid black; border-collapse: collapse"><b>HPTS</b></td>' +
            '            <td rowspan="3" style="width:5%;border: 1px solid black; border-collapse: collapse"><b>PRE</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center">' +
            '            <td colspan="7" style="border: 1px solid black; border-collapse: collapse"><b>Pengetahuan</b></td>' +
            '            <td colspan="7" style="border: 1px solid black; border-collapse: collapse"><b>Keterampilan</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center">';

        for (let i = 0; i < 5; i++) {
            tableNilai += '<td style="border: 1px solid black; border-collapse: collapse;width: 20px">' +
                '<b>' + (i + 1) + '</b></td>';
        }
        tableNilai += '<td style="border: 1px solid black; border-collapse: collapse;width: 25px"><b>NR</b></td>';
        tableNilai += '<td style="border: 1px solid black; border-collapse: collapse;width: 25px"><b>PRE</b></td>';
        for (let i = 0; i < 5; i++) {
            tableNilai += '<td style="border: 1px solid black; border-collapse: collapse;width: 20px">' +
                '<b>' + (i + 1) + '</b></td>';
        }
        tableNilai += '<td style="border: 1px solid black; border-collapse: collapse;width: 25px"><b>NR</b></td>';
        tableNilai += '<td style="border: 1px solid black; border-collapse: collapse;width: 25px"><b>PRE</b></td>';
        tableNilai += '</tr>';

        var htmlPai = '';
        var tablePai = '';
        var abjad = ['', 'a', 'b', 'c', 'd', 'e', 'f'];
        var pos = 0;

        var arr = Object.keys(arrKelompokMapel).map(function (key) {
            return arrKelompokMapel[key];
        });
        var indexPAI = arr.map(function (kel) {
            return kel.kategori;
        }).indexOf('PAI (Kemenag)');
        var pai = arr[indexPAI];

        $.each(arrMapel, function (k, mapel) {
            if (pai != null && pai.kode_kel_mapel != null && nilaiPts[idSiswa] != null && nilaiPts[idSiswa][mapel.id_mapel] != null && mapel.kelompok == pai.kode_kel_mapel) {
                const kkmMapel = kkm[mapel.id_mapel] == null ? "" : kkm[mapel.id_mapel].kkm;
                var pts = nilaiPts[idSiswa][mapel.id_mapel].nilai !== null
                && nilaiPts[idSiswa][mapel.id_mapel].nilai !== '0' ? parseInt(nilaiPts[idSiswa][mapel.id_mapel].nilai) : '';

                pos++;
                htmlPai += '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">' + abjad[pos] + '. ' + mapel.nama_mapel + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;' + display + '"><b>' + kkmMapel + '</b></td>';

                let arrNP = [];
                let arrNK = [];
                let countP = 0;
                let totalP = 0;
                let countK = 0;
                let totalK = 0;

                $.each(nilaiHarian[idSiswa][mapel.id_mapel], function (key, nilai) {
                    if (key.startsWith("p")) {
                        if (nilai != '') {
                            nilai = parseInt(nilai);
                            arrNP.push(nilai);
                            totalP += nilai
                            countP ++
                        }
                        htmlPai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nilai + '</td>';
                    }
                });
                const rataP = Math.ceil(totalP / countP)
                htmlPai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    '<b>'+(rataP > 0 ? rataP : '') + '</b>' +
                    '</td>'+
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    '<b>'+createPredikat(arrNP, mapel.id_mapel) + '</b>' +
                    '</td>';

                $.each(nilaiHarian[idSiswa][mapel.id_mapel], function (key, nilai) {
                    if (key.startsWith("k")) {
                        if (nilai != '') {
                            nilai = parseInt(nilai);
                            arrNK.push(nilai);
                            totalK += nilai
                            countK ++
                        }
                        htmlPai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nilai + '</td>';
                    }
                });
                const rataK = Math.ceil(totalK / countK)
                htmlPai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    '<b>'+(rataK > 0 ? rataK : '') + '</b>' +
                    '</td>'+
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    '<b>'+createPredikat(arrNK, mapel.id_mapel) + '</b>' +
                    '</td>';

                //arrN.push(pts);
                htmlPai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    '<b>'+pts + '</b>' +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    '<b>'+createPredikat([pts], mapel.id_mapel) + '</b>' +
                    '</td>' +
                    '</tr>';
            }
        });

        if (pos > 0) {
            tablePai = '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                '            <td rowspan="' + (pos + 1) + '" style="border: 1px solid black; border-collapse: collapse; text-align: center; vertical-align: top; padding: 6px">1</td>' +
                '            <td colspan="' + (collSpan - 1) + '" style="border: 1px solid black; border-collapse: collapse; vertical-align: top; padding: 6px">' +
                '                Pendidikan Agama Islam' +
                '            </td>' +
                '</tr>' + htmlPai;
        }

        var index = 0;
        $.each(arrKelompokMapel, function (kel, val) {
            var no = pos > 0 && index == 0 ? 1 : 0;
            var htmlTr = '';
            var hasSub = false;

            if (val.kategori != 'PAI (Kemenag)') {
                $.each(arrMapel, function (k, mapel) {
                    if (nilaiPts[idSiswa] != null && nilaiPts[idSiswa][mapel.id_mapel] != null && mapel.kelompok == kel) {
                        hasSub = val.id_parent != '0';
                        no++;
                        //var pts = nilaiPts[idSiswa][mapel.id_mapel] == '0' ? '' : parseInt(nilaiPts[idSiswa][mapel.id_mapel]);
                        var pts = nilaiPts[idSiswa][mapel.id_mapel].nilai !== null && nilaiPts[idSiswa][mapel.id_mapel].nilai !== '0' ? parseInt(nilaiPts[idSiswa][mapel.id_mapel].nilai) : '';
                        //var arrN = [];
                        const kkmMapel = kkm[mapel.id_mapel] == null ? "" : kkm[mapel.id_mapel].kkm;
                        htmlTr += '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + no + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">' + mapel.nama_mapel + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center; ' + display + '"><b>' + kkmMapel + '</b></td>';
                        let arrNP = [];
                        let arrNK = [];
                        let countP = 0;
                        let totalP = 0;
                        let countK = 0;
                        let totalK = 0;
                        $.each(nilaiHarian[idSiswa][mapel.id_mapel], function (key, nilai) {
                            if (key.startsWith("p")) {
                                if (nilai != '') {
                                    nilai = parseInt(nilai);
                                    arrNP.push(nilai);
                                    totalP += nilai
                                    countP ++
                                }
                                htmlTr += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nilai + '</td>';
                            }
                        });
                        const rataP = Math.ceil(totalP / countP)
                        htmlTr += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                            '<b>'+(rataP > 0 ? rataP : '') + '</b>' +
                            '</td>'+
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                            '<b>'+createPredikat(arrNP, mapel.id_mapel) + '</b>' +
                            '</td>';

                        $.each(nilaiHarian[idSiswa][mapel.id_mapel], function (key, nilai) {
                            if (key.startsWith("k")) {
                                if (nilai != '') {
                                    nilai = parseInt(nilai);
                                    arrNK.push(nilai);
                                    totalK += nilai
                                    countK ++
                                }
                                htmlTr += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nilai + '</td>';
                            }
                        });
                        const rataK = Math.ceil(totalK / countK)
                        htmlTr += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                            '<b>'+(rataK > 0 ? rataK : '') + '</b>' +
                            '</td>'+
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                            '<b>'+createPredikat(arrNK, mapel.id_mapel) + '</b>' +
                            '</td>';

                        //arrN.push(pts);
                        htmlTr += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                            '<b>'+pts + '</b>' +
                            '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                            '<b>'+createPredikat([pts], mapel.id_mapel) + '</b>' +
                            '</td>';
                    }
                });
            }

            if (hasSub && no > 0) {
                var parent;
                $.each(arrKelompokMapel, function (kels, vals) {
                    if (vals.id_kel_mapel == val.id_parent) {
                        parent = vals.nama_kel_mapel;
                    }
                });
                tableNilai += '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                    '            <td colspan="' + collSpan + '" style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4"><b>' + parent + '</b></td>' +
                    '        </tr>';
            }

            if (no > 0) {
                if (index == 0) {
                    tableNilai += '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                        '            <td colspan="' + collSpan + '" style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4"><b>' + val.nama_kel_mapel + '</b></td>' +
                        '        </tr>' + tablePai + htmlTr;
                } else {
                    tableNilai += '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                        '            <td colspan="' + collSpan + '" style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4"><b>' + val.nama_kel_mapel + '</b></td>' +
                        '        </tr>' + htmlTr;
                }
            }
            index++;
        });

        tableNilai += '</table>';

        let arrKKM = [];
        if (raporSetting.kkm_tunggal == "1") {
            arrKKM.push(raporSetting.kkm);
        } else {
            $.each(kkm, function (id, val) {
                if (val != null && !inArray(val.kkm, arrKKM)) {
                    arrKKM.push(val.kkm);
                }
            });
        }

        let kkmTable = [];
        if (arrKKM.length <= 3) {
            arrKKM.sort();
            kkmTable = arrKKM;
        } else {
            arrKKM.sort();
            //arrKKM.shift();
            let halfwayThrough = Math.floor(arrKKM.length / 2);
            let arrayFirstHalf = arrKKM.slice(0, halfwayThrough);
            let arraySecondHalf = arrKKM.slice(halfwayThrough, arrKKM.length);

            kkmTable.push(arrayFirstHalf[0]);
            kkmTable.push(arraySecondHalf[0]);
            kkmTable.push(arraySecondHalf[arraySecondHalf.length - 1]);
        }

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
            '    </tr>';

        $.each(kkmTable, function (p, kkm) {
            var isi = kkm == "" ? 65 : parseInt(kkm);
            var pre_d = 1;
            var pre_dsd = isi - 1;
            var pre_c = isi;
            var pre_csd = Math.floor(isi + (100 - isi) / 3);
            var pre_b = pre_csd + 1;
            var pre_bsd = Math.floor(pre_b + (100 - pre_b) / 2);
            var pre_a = pre_bsd + 1;
            var pre_asd = 100;

            tableNilai +=
                '    <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 6px 2px 6px"><b>' + isi + '</b></td>' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 6px 2px 6px">< ' + isi + '</td>' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 6px 2px 6px">' + pre_c + ' ~ ' + pre_csd + '</td>' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 6px 2px 6px">' + pre_b + ' ~ ' + pre_bsd + '</td>' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 6px 2px 6px">' + pre_a + ' ~ ' + pre_asd + '</td>' +
                '    </tr>';
        });
        tableNilai += '</table>';

        tableNilai += '    <br>' +
            '    <br>' +
            '<table style="width: 100%">' +
            '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '<td style="width: 33%;vertical-align: top;">' +
            '    Mengetahui:' +
            '    <br>' +
            '    Orang Tua/Wali' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>' +
            '</td>' +
            '<td style="width: 34%;">' +
            '    Mengetahui:' +
            '    <br>' +
            '    Kepala ' + namaSatuanPend +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <u>' + setting.kepsek + '</u>' +
            '    <br>' +
            '    Nip:' + nipKepsek +
            '</td>' +
            '<td style="width: 33%">' +
            setting.kota + ',  ' + handleTitiMangsa(raporSetting.tgl_rapor_pts) +
            '    <br>' +
            'Wali Kelas' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <u>' + guru.nama_guru + '</u>' +
            '    <br>' +
            '    Nip:' + nipWalas +
            '</td>' +
            '</tr>' +
            '</table>' +
            '</div>';
        $('#print-preview').html(tableNilai);

        setTimeout(function () {
            $('#loading').addClass('d-none');
        }, 500);
    }

    function preview2(idSiswa) {
        var siswa = null;
        for (let i = 0; i < arrSiswa.length; i++) {
            if (arrSiswa[i].id_siswa == idSiswa) {
                siswa = arrSiswa[i];
            }
        }

        var display = raporSetting.kkm_tunggal == '1' ? 'display:none;' : '';
        var collSpan = raporSetting.kkm_tunggal == '1' ? 8 : 9;

        var tableNilai = '<div style="padding: 0.3cm;">' +
            '    <p style="font-family: \'Arial\';text-align: center;font-size: 12pt;"><b>LAPORAN HASIL BELAJAR TENGAH SEMESTER</b></p>' +
            '    <br>' +
            '    <table id="table-info-print" style="width: 100%; border: 0;">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
            '            <td style="width:20%;">Nama</td>' +
            '            <td>:</td>' +
            '            <td style="width:40%;"><b>' + siswa.nama + '</b></td>' +
            '            <td style="width:20%;">Kelas</td>' +
            '            <td>:</td>' +
            '            <td style="width:20%;"><b>' + siswa.nama_kelas + '</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
            '            <td>No. Induk/NISN</td>' +
            '            <td>:</td>' +
            '            <td><b>' + handleNisn(siswa.nis, siswa.nisn) + '</b></td>' +
            '            <td>Semester</td>' +
            '            <td>:</td>' +
            '            <td><b>' + smt + '</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
            '            <td>Nama ' + namaSatuanPend + '</td>' +
            '            <td>:</td>' +
            '            <td><b>' + setting.sekolah + '</b></td>' +
            '            <td>Tahun Pelajaran</td>' +
            '            <td>:</td>' +
            '            <td><b>' + tp + '</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
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
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center">' +
            '            <td rowspan="3" style="width:5%;border: 1px solid black; border-collapse: collapse"><b>NO</b></td>' +
            '            <td rowspan="3" style="width:30%;border: 1px solid black; border-collapse: collapse"><b>Mata Pelajaran</b></td>' +
            '            <td rowspan="3" style="width:5%;border: 1px solid black; border-collapse: collapse; ' + display + '"><b>KKM</b></td>' +
            '            <td colspan="4" style="width:40%;border: 1px solid black; border-collapse: collapse">' +
            '                <b>Rata-rata</b></td>' +
            '            <td colspan="2" rowspan="2" style="width:20%;border: 1px solid black; border-collapse: collapse"><b>Nilai PTS</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center">' +
            '            <td colspan="2" style="border: 1px solid black; border-collapse: collapse"><b>Pengetahuan</b></td>' +
            '            <td colspan="2" style="border: 1px solid black; border-collapse: collapse"><b>Keterampilan</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center">' +
            '           <td style="border: 1px solid black; border-collapse: collapse;"><b>Nilai</b></td>' +
            '           <td style="border: 1px solid black; border-collapse: collapse;"><b>Predikat</b></td>' +
            '           <td style="border: 1px solid black; border-collapse: collapse;"><b>Nilai</b></td>' +
            '           <td style="border: 1px solid black; border-collapse: collapse;"><b>Predikat</b></td>' +
            '           <td style="border: 1px solid black; border-collapse: collapse;"><b>Nilai</b></td>' +
            '           <td style="border: 1px solid black; border-collapse: collapse;"><b>Predikat</b></td>' +
            '       </tr>';

        var htmlPai = '';
        var tablePai = '';
        var abjad = ['', 'a', 'b', 'c', 'd', 'e', 'f'];
        var pos = 0;

        var arr = Object.keys(arrKelompokMapel).map(function (key) {
            return arrKelompokMapel[key];
        });
        var indexPAI = arr.map(function (kel) {
            return kel.kategori;
        }).indexOf('PAI (Kemenag)');
        var pai = arr[indexPAI];

        $.each(arrMapel, function (k, mapel) {
            if (pai != null && pai.kode_kel_mapel != null && nilaiPts[idSiswa] != null && nilaiPts[idSiswa][mapel.id_mapel] != null && mapel.kelompok == pai.kode_kel_mapel) {
                const kkmMapel = kkm[mapel.id_mapel] == null ? "" : kkm[mapel.id_mapel].kkm;
                var arrNP = [];
                var arrNK = [];
                //var pts = nilaiPts[idSiswa][mapel.id_mapel] == '0' ? '' : parseInt(nilaiPts[idSiswa][mapel.id_mapel]);
                var pts = nilaiPts[idSiswa][mapel.id_mapel].nilai !== null && nilaiPts[idSiswa][mapel.id_mapel].nilai !== '0' ? parseInt(nilaiPts[idSiswa][mapel.id_mapel].nilai) : '';

                $.each(nilaiHarian[idSiswa][mapel.id_mapel], function (key, nilai) {
                    if (nilai !== '') {
                        nilai = parseInt(nilai);
                        if (key.startsWith("p")) {
                            arrNP.push(nilai);
                        } else if (key.startsWith("k")) {
                            arrNK.push(nilai);
                        }
                    }
                });
                var npeng = createNilaiPredikat(arrNP, mapel.id_mapel);
                var nketr = createNilaiPredikat(arrNK, mapel.id_mapel);
                pos++;
                htmlPai += '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">' + abjad[pos] + '. ' + mapel.nama_mapel + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;' + display + '"><b>' + kkmMapel + '</b></td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + npeng.nilai + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + npeng.pred + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nketr.nilai + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nketr.pred + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + pts + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + createPredikat([pts], mapel.id_mapel) + '</td>' +
                    '</tr>';

                //arrN.push(pts);
                /*
                htmlPai += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    pts +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                    //createPredikat(arrN, mapel.id_mapel) +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>' +
                    '</tr>';
                    */
            }
        });

        if (pos > 0) {
            tablePai = '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                '            <td rowspan="' + (pos + 1) + '" style="border: 1px solid black; border-collapse: collapse; text-align: center; vertical-align: top; padding: 6px">1</td>' +
                '            <td colspan="' + (collSpan - 1) + '" style="border: 1px solid black; border-collapse: collapse; vertical-align: top; padding: 6px">' +
                '                Pendidikan Agama Islam' +
                '            </td>' +
                '</tr>' + htmlPai;
        }

        var index = 0;
        $.each(arrKelompokMapel, function (kel, val) {
            var no = pos > 0 && index == 0 ? 1 : 0;
            var htmlTr = '';
            var hasSub = false;

            if (val.kategori != 'PAI (Kemenag)') {
                $.each(arrMapel, function (k, mapel) {
                    if (nilaiPts[idSiswa] != null && nilaiPts[idSiswa][mapel.id_mapel] != null && mapel.kelompok == kel) {
                        hasSub = val.id_parent != '0';
                        no++;
                        //var pts = nilaiPts[idSiswa][mapel.id_mapel] == '0' ? '' : parseInt(nilaiPts[idSiswa][mapel.id_mapel]);
                        var pts = nilaiPts[idSiswa][mapel.id_mapel].nilai !== null && nilaiPts[idSiswa][mapel.id_mapel].nilai !== '0' ? parseInt(nilaiPts[idSiswa][mapel.id_mapel].nilai) : '';
                        var arrNP = [];
                        var arrNK = [];
                        const kkmMapel = kkm[mapel.id_mapel] == null ? "" : kkm[mapel.id_mapel].kkm;
                        $.each(nilaiHarian[idSiswa][mapel.id_mapel], function (key, nilai) {
                            if (nilai !== '') {
                                nilai = parseInt(nilai);
                                if (key.startsWith("p")) {
                                    arrNP.push(nilai);
                                } else if (key.startsWith("k")) {
                                    arrNK.push(nilai);
                                }
                            }
                        });

                        var npeng = createNilaiPredikat(arrNP, mapel.id_mapel);
                        var nketr = createNilaiPredikat(arrNK, mapel.id_mapel);

                        htmlTr += '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + no + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">' + mapel.nama_mapel + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center; ' + display + '"><b>' + kkmMapel + '</b></td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + npeng.nilai + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + npeng.pred + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nketr.nilai + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nketr.pred + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + pts + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + createPredikat([pts], mapel.id_mapel) + '</td>' +
                            '</tr>';

                        /*
                        $.each(nilaiHarian[idSiswa][mapel.id_mapel], function (key, nilai) {
                            if (nilai != '') nilai = parseInt(nilai);
                            htmlTr += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nilai + '</td>';
                            arrN.push(nilai);
                        });
                        arrN.push(pts);
                        htmlTr += '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                            pts +
                            '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' +
                            createPredikat(arrN, mapel.id_mapel) +
                            '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>' +
                            '</tr>';
                            */
                    }
                });
            }

            if (hasSub && no > 0) {
                var parent;
                $.each(arrKelompokMapel, function (kels, vals) {
                    if (vals.id_kel_mapel == val.id_parent) {
                        parent = vals.nama_kel_mapel;
                    }
                });
                tableNilai += '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                    '            <td colspan="' + collSpan + '" style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4"><b>' + parent + '</b></td>' +
                    '        </tr>';
            }

            if (no > 0) {
                if (index == 0) {
                    tableNilai += '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                        '            <td colspan="' + collSpan + '" style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4"><b>' + val.nama_kel_mapel + '</b></td>' +
                        '        </tr>' + tablePai + htmlTr;
                } else {
                    tableNilai += '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                        '            <td colspan="' + collSpan + '" style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4"><b>' + val.nama_kel_mapel + '</b></td>' +
                        '        </tr>' + htmlTr;
                }
            }
            index++;
        });

        tableNilai += '</table>';

        let arrKKM = [];
        if (raporSetting.kkm_tunggal == "1") {
            arrKKM.push(raporSetting.kkm);
        } else {
            $.each(kkm, function (id, val) {
                if (val != null && !inArray(val.kkm, arrKKM)) {
                    arrKKM.push(val.kkm);
                }
            });
        }
        let kkmTable = [];
        if (arrKKM.length <= 3) {
            arrKKM.sort();
            kkmTable = arrKKM;
        } else {
            arrKKM.sort();
            //arrKKM.shift();
            let halfwayThrough = Math.floor(arrKKM.length / 2);
            let arrayFirstHalf = arrKKM.slice(0, halfwayThrough);
            let arraySecondHalf = arrKKM.slice(halfwayThrough, arrKKM.length);

            kkmTable.push(arrayFirstHalf[0]);
            kkmTable.push(arraySecondHalf[0]);
            kkmTable.push(arraySecondHalf[arraySecondHalf.length - 1]);
        }

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
            '    </tr>';

        $.each(kkmTable, function (p, kkm) {
            var isi = kkm == "" ? 65 : parseInt(kkm);
            var pre_d = 1;
            var pre_dsd = isi - 1;
            var pre_c = isi;
            var pre_csd = Math.floor(isi + (100 - isi) / 3);
            var pre_b = pre_csd + 1;
            var pre_bsd = Math.floor(pre_b + (100 - pre_b) / 2);
            var pre_a = pre_bsd + 1;
            var pre_asd = 100;

            tableNilai +=
                '    <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 6px 2px 6px"><b>' + isi + '</b></td>' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 6px 2px 6px">< ' + isi + '</td>' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 6px 2px 6px">' + pre_c + ' ~ ' + pre_csd + '</td>' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 6px 2px 6px">' + pre_b + ' ~ ' + pre_bsd + '</td>' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 6px 2px 6px">' + pre_a + ' ~ ' + pre_asd + '</td>' +
                '    </tr>';
        });
        tableNilai += '</table>';

        tableNilai += '    <br>' +
            '    <br>' +
            '<table style="width: 100%">' +
            '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '<td style="width: 33%;vertical-align: top;">' +
            '    Mengetahui:' +
            '    <br>' +
            '    Orang Tua/Wali' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>' +
            '</td>' +
            '<td style="width: 34%;">' +
            '    Mengetahui:' +
            '    <br>' +
            '    Kepala ' + namaSatuanPend +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <u>' + setting.kepsek + '</u>' +
            '    <br>' +
            '    Nip:' + nipKepsek +
            '</td>' +
            '<td style="width: 33%">' +
            setting.kota + ',  ' + handleTitiMangsa(raporSetting.tgl_rapor_pts) +
            '    <br>' +
            'Wali Kelas' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <u>' + guru.nama_guru + '</u>' +
            '    <br>' +
            '    Nip:' + nipWalas +
            '</td>' +
            '</tr>' +
            '</table>' +
            '</div>';
        $('#print-preview').html(tableNilai);

        setTimeout(function () {
            $('#loading').addClass('d-none');
        }, 500);

        /*
        var tableNilai = '<div style="padding: 0.3cm;">' +
            '    <p style="font-family: \'Arial\';text-align: center;font-size: 12pt;"><b>LAPORAN HASIL BELAJAR TENGAH SEMESTER</b></p>' +
            '    <br>' +
            '    <table id="table-info-print" style="width: 100%; border: 0;">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
            '            <td style="width:20%;">Nama</td>' +
            '            <td>:</td>' +
            '            <td style="width:40%;"><b>' + siswa.nama + '</b></td>' +
            '            <td style="width:20%;">Kelas</td>' +
            '            <td>:</td>' +
            '            <td style="width:20%;"><b>' + siswa.nama_kelas + '</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
            '            <td>No. Induk/NISN</td>' +
            '            <td>:</td>' +
            '            <td><b>' + handleNisn(siswa.nis, siswa.nisn) + '</b></td>' +
            '            <td>Semester</td>' +
            '            <td>:</td>' +
            '            <td><b>' + smt + '</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
            '            <td>Nama ' + namaSatuanPend + '</td>' +
            '            <td>:</td>' +
            '            <td><b>' + setting.sekolah + '</b></td>' +
            '            <td>Tahun Pelajaran</td>' +
            '            <td>:</td>' +
            '            <td><b>' + tp + '</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
            '            <td>Alamat</td>' +
            '            <td>:</td>' +
            '            <td><b>' + setting.alamat + ' ' + setting.kecamatan + ' ' + setting.kota + '</b>' +
            '            </td>' +
            '            <td></td>' +
            '            <td></td>' +
            '            <td></td>' +
            '        </tr>' +
            '    </table>' +
            '    <br>';

        tableNilai += '<table id="table-nilai-print" style="width: 100%;border: 2px solid black; border-collapse: collapse">\n' +
            '<tbody>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center">\n' +
            '    <td rowspan="3" style="width:5%;border: 1px solid black; border-collapse: collapse">\n' +
            '        <b>NO</b></td>\n' +
            '    <td rowspan="3" style="width:30%;border: 1px solid black; border-collapse: collapse">\n' +
            '        <b>Mata Pelajaran</b></td>\n' +
            '    <td rowspan="3" style="width:7%;border: 1px solid black; border-collapse: collapse; ">\n' +
            '        <b>KKM</b></td>\n' +
            '    <td colspan="4" style="width:38%;border: 1px solid black; border-collapse: collapse">\n' +
            '        <b>Rata-rata</b></td>\n' +
            '    <td rowspan="2" colspan="2" style="width:7%;border: 1px solid black; border-collapse: collapse">\n' +
            '        <b>Nilai PTS</b></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center">\n' +
            '    <td colspan="2" style="border: 1px solid black; border-collapse: collapse">\n' +
            '        <b>Pengetahuan</b></td>\n' +
            '    <td colspan="2" style="border: 1px solid black; border-collapse: collapse">\n' +
            '        <b>Keterampilan</b></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse;width: 20px">\n' +
            '        <b>Nilai</b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse;width: 20px">\n' +
            '        <b>Predikat</b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse;width: 20px">\n' +
            '        <b>Nilai</b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse;width: 20px">\n' +
            '        <b>Predikat</b></td>\n' +
            '    <td style="width:5%;border: 1px solid black; border-collapse: collapse">\n' +
            '        <b>Nilai</b></td>\n' +
            '    <td style="width:15%;border: 1px solid black; border-collapse: collapse">\n' +
            '        <b>Predikat</b></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td colspan="9" style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4">\n' +
            '        <b>Kelompok A (Wajib)</b></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td rowspan="5" style="border: 1px solid black; border-collapse: collapse; text-align: center; vertical-align: top; padding: 6px">\n' +
            '        1\n' +
            '    </td>\n' +
            '    <td colspan="8" style="border: 1px solid black; border-collapse: collapse; vertical-align: top; padding: 6px">\n' +
            '        Pendidikan Agama Islam\n' +
            '    </td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">\n' +
            '        a. Al Quran-Hadis\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        <b>70</b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        80\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        75\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        C\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">\n' +
            '        b. Akidah Akhlak\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        <b></b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">\n' +
            '        c. Fiqih\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        <b></b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">\n' +
            '        d. Sejarah Kebudayaan Islam\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        <b></b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        2\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">\n' +
            '        Pendidikan Pancasila dan Kewarganegaraan\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center; ">\n' +
            '        <b>75</b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        3\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">\n' +
            '        Bahasa Arab\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center; ">\n' +
            '        <b></b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        4\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">\n' +
            '        Bahasa Indonesia\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center; ">\n' +
            '        <b></b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        5\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">\n' +
            '        Matematika\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center; ">\n' +
            '        <b></b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        6\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">\n' +
            '        Ilmu Pengetahuan Alam\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center; ">\n' +
            '        <b></b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        7\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">\n' +
            '        Ilmu Pengetahuan Sosial\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center; ">\n' +
            '        <b></b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td colspan="16" style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4">\n' +
            '        <b>Kelompok B</b></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        1\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">\n' +
            '        Pendidikan Jasmani Olah Raga dan Kesehatan\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center; ">\n' +
            '        <b></b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        2\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">\n' +
            '        Seni Budaya dan Prakarya\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center; ">\n' +
            '        <b></b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td colspan="16" style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4">\n' +
            '        <b>Muatan Lokal</b></td>\n' +
            '</tr>\n' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">\n' +
            '        1\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 6px">\n' +
            '        Bahasa Sunda\n' +
            '    </td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center; ">\n' +
            '        <b></b></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>\n' +
            '</tr>\n' +
            '</tbody>\n' +
            '</table>\n';
            */
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
        });

        $('#model-selector button').click(function () {
            $(this).addClass('active').siblings().addClass('btn-outline-success').removeClass('active btn-success');
            model = $(this).data('id');
            if (siswaActive != '') preview(siswaActive);
        });

    })
</script>
