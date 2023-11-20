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
                    <div class="mb-3">
                        <label>Pilih Tahun Pelajaran</label>
                        <select name="tahun" id="id-tahun" class="form-control form-control-sm">
                            <?php foreach ($tp as $tahun) :
                                $selected = isset($tp_selected) && $tahun->id_tp == $tp_selected ? 'selected="selected"' : ''; ?>
                                <option value="<?= $tahun->id_tp ?>" <?= $selected ?>><?= $tahun->tahun ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Pilih Semester</label>
                        <select name="semester" id="id-smt" class="form-control form-control-sm">
                            <?php foreach ($smt as $sm) :
                                $selected = isset($smt_selected) && $sm->id_smt == $smt_selected ? 'selected="selected"' : ''; ?>
                                <option value="<?= $sm->id_smt ?>" <?= $selected ?>><?= $sm->smt ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Pilih Kelas</label>
                        <?php
                        echo form_dropdown(
                            'kelas',
                            $kelases,
                            isset($kls_selected) ? $kls_selected : null,
                            'id="id-kelas" class="form-control form-control-sm"'
                        ); ?>
                    </div>
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title">Pilih Siswa</h3>
                        </div>
                        <div class="card-body p-0"
                             style="height: 400px;overflow-y:auto;-webkit-overflow-scrolling: touch">
                            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview">
                                <?php
                                if (isset($siswas)) :
                                    $n = 1;
                                    foreach ($siswas as $siswa): ?>
                                        <li class="nav-item">
                                            <a href="javascript:void(0)" class="nav-link pt-1 pb-1 pl-2 text-sm siswa"
                                               onclick="preview(<?= $siswa->id_siswa ?>)">
                                                <?= $n . '. ' . $siswa->nama ?>
                                            </a>
                                        </li>
                                        <?php $n++; endforeach; endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header bg-gray-light">
                            <div class="card-title">
                                <h6>Preview</h6>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-success btn-sm" onclick="perbesar()" disabled>
                                    <i class="fa fa-search-plus mr-1"></i>Perbesar
                                </button>
                                <button class="btn btn-success btn-sm" onclick="perkecil()" disabled>
                                    <i class="fa fa-search-minus mr-1"></i>Perkecil
                                </button>
                                <button class="btn btn-warning btn-sm d-none" onclick="editNilai()" disabled>
                                    <i class="fa fa-pencil mr-1"></i>Edit Rapor
                                </button>
                            </div>
                        </div>
                        <div class="card-body bg-gray-light p-1">
                            <div class="row mb-1 ml-1 mr-1 d-flex flex-wrap">
                                <button id="cetak-sampul" class="btn btn-primary btn-sm ml-1 mb-1"
                                        onclick="cetakSampul()"
                                        disabled>
                                    <i class="fa fa-print mr-1"></i>Sampul
                                </button>
                                <button id="cetak-info" class="btn btn-primary btn-sm ml-1 mb-1" onclick="cetakInfo()"
                                        disabled>
                                    <i class="fa fa-print mr-1"></i>Info
                                </button>
                                <button id="cetak-data" class="btn btn-primary btn-sm ml-1 mb-1" onclick="cetakData()"
                                        disabled>
                                    <i class="fa fa-print mr-1"></i>Data Siswa
                                </button>
                                <button id="cetak-nilai" class="btn btn-primary btn-sm ml-1 mb-1" onclick="cetakRapor()"
                                        disabled>
                                    <i class="fa fa-print mr-1"></i>Nilai
                                </button>
                                <button id="cetak-semua" class="btn btn-primary btn-sm ml-1 mb-1" onclick="cetakSemua()"
                                        disabled>
                                    <i class="fa fa-print mr-1"></i>Semua Halaman
                                </button>
                                <div class="text-right mb-1 ml-auto">
                                    <span>Hal. dari</span>
                                    <input type="number" id="page-start" style="width: 100px;" disabled="disabled">
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center bg-gray-light" style="min-height: 300mm">
                                <div id="zoom" style="transform: scale(0.9); transform-origin: top center">
                                    <div id="print-preview">
                                        <div id="empty"
                                             style="display: flex;-webkit-justify-content: center;justify-content: center;width: 210mm; min-height: 297mm;padding: 10mm">
                                            Silahkan pilih siswa
                                        </div>
                                        <div id="print-sampul" class="border my-shadow mb-3 d-none p-5"
                                             style="display: flex;-webkit-justify-content: center;justify-content: center;background: white;width: 210mm; min-height: 297mm; padding: 5mm 10mm 5mm 10mm">
                                            <div style="margin-top: 80px;text-align: center">
                                                <div class="image">
                                                    <img src="<?= base_url('assets/img/garuda_bw.png') ?>"
                                                         style="width: 80px;">
                                                </div>
                                                <br>
                                                <div class="judul"
                                                     style="text-align: center;font-family: 'Arial';font-size: 20pt;font-weight: bold">
                                                    <p style="margin-bottom: 0">LAPORAN HASIL BELAJAR</p>
                                                    <?php
                                                    $header_rapor = $satuan[$setting->jenjang][$setting->satuan_pendidikan];
                                                    ?>
                                                    <p style="margin-bottom: 0"><?= $header_rapor ?></p>
                                                    <p style="margin-bottom: 0;font-family: 'Arial';font-size: 24pt;"><?= $setting->sekolah ?></p>
                                                </div>
                                                <div class="judul"
                                                     style="text-align: center;font-family: 'Arial';font-size: 12pt;">
                                                    <p style="margin-bottom: 0">NSM: <?= $setting->nss ?> |
                                                        NPSN: <?= $setting->npsn ?></p>
                                                </div>
                                                <div class="image">
                                                    <img src="<?= base_url() . $setting->logo_kiri ?>"
                                                         style="width: 200px; margin-top: 30px">
                                                </div>
                                                <div class="siswa"
                                                     style="text-align: center;font-family: 'Arial';font-size: 14pt;margin-top: 50px">
                                                    <p>NAMA PESERTA DIDIK</p>
                                                    <div style="display: flex;-webkit-justify-content: center;justify-content: center;">
                                                        <table style="width: 500px;border: 1px solid black; border-collapse: collapse;">
                                                            <tr>
                                                                <td id="nama-siswa"
                                                                    style=" padding: 10px;font-size: 18pt;font-weight: bold"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="siswa"
                                                     style="text-align: center;font-family: 'Arial';font-size: 14pt;margin-top: 20px">
                                                    <p>NIS / NISN</p>
                                                    <div style="display: flex;-webkit-justify-content: center;justify-content: center;">
                                                        <table style="width: 500px;border: 1px solid black; border-collapse: collapse;">
                                                            <tr>
                                                                <td id="nis-siswa" style=" padding: 4px"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="foot"
                                                     style="text-align: center;font-family: 'Arial';font-size: 14pt;font-weight: bold;margin-top: 80px">
                                                    <?php if ($setting->satuan_pendidikan == '2') : ?>
                                                        <p>KEMENTRIAN AGAMA</p>
                                                    <?php else: ?>
                                                        <p>KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</p>
                                                    <?php endif; ?>
                                                    <p>REPUBLIK INDONESIA</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="print-info" class="border my-shadow mb-3 d-none p-5"
                                             style="background: white;width: 210mm; min-height: 297mm;">
                                        </div>
                                        <div id="print-data" class="border my-shadow mb-3 d-none p-5"
                                             style="background: white;width: 210mm; min-height: 297mm;">
                                        </div>
                                        <div id="print-sikap" class="border my-shadow mb-3 d-none p-5"
                                             style="background: white;width: 210mm; min-height: 297mm;">
                                        </div>
                                        <div id="print-nilai" class="border my-shadow mb-3 d-none p-5"
                                             style="background: white;width: 210mm; min-height: 297mm;">
                                        </div>
                                        <div id="print-deskripsi1" class="border my-shadow mb-3 d-none p-5"
                                             style="background: white;width: 210mm; min-height: 297mm;">
                                        </div>
                                        <div id="print-deskripsi2" class="border my-shadow mb-3 d-none p-5"
                                             style="background: white;width: 210mm; min-height: 297mm;">
                                        </div>
                                    </div>
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
    var isAdmin = '<?= $this->ion_auth->is_admin() ?>';
    var siswaSelected = null;
    var thnSelected = '<?= isset($tp_selected) ? $tp_selected : '';?>';
    var smtSelected = '<?= isset($smt_selected) ? $smt_selected : '';?>';
    var klsSelected = '<?= isset($kls_selected) ? $kls_selected : '';?>';

    var kelas = '<?= $kelas ?>';
    var level = '<?= $lvl_kelas ?>';
    var tp = JSON.parse(JSON.stringify(<?= json_encode($tp_name != null ? $tp_name : "") ?>));
    var smt = JSON.parse(JSON.stringify(<?= json_encode($smt_name != null ? $smt_name : "") ?>));

    var raporSetting = JSON.parse(JSON.stringify(<?= json_encode($rapor) ?>));
    var guru = JSON.parse(JSON.stringify(<?= json_encode($guru)?>));
    var jabatanGuru = JSON.parse(JSON.stringify(<?= json_encode($jabatan)?>));
    var arrMapel = JSON.parse(JSON.stringify(<?= json_encode($mapels)?>));
    var arrKelompokMapel = JSON.parse(JSON.stringify(<?= json_encode($kelompoks)?>));
    var arrekstra = JSON.parse(JSON.stringify(<?= json_encode($mapel_ekstra)?>));
    var sikap = JSON.parse(JSON.stringify(<?= json_encode($sikap)?>));
    var nilai = JSON.parse(JSON.stringify(<?= json_encode($nilai)?>));
    var nilaiRapor = JSON.parse(JSON.stringify(<?= json_encode($nilai_rapor)?>));
    var deskripsi = JSON.parse(JSON.stringify(<?= json_encode($deskripsi)?>));
    var absensi = JSON.parse(JSON.stringify(<?= json_encode($absensi)?>));
    var fisik = JSON.parse(JSON.stringify(<?= json_encode($fisik)?>));
    var ekstra = JSON.parse(JSON.stringify(<?= json_encode($nilai_ekstra)?>));
    var naik = JSON.parse(JSON.stringify(<?= json_encode($naik)?>));

    var arrSiswa = JSON.parse(JSON.stringify(<?=isset($siswas) ? json_encode($siswas) : "[]"?>));
    var satuanPend = JSON.parse(JSON.stringify(<?= json_encode($satuan)?>));
    var setting = JSON.parse(JSON.stringify(<?= json_encode($setting) ?>));
    var namaSatuanPend = setting.satuan_pendidikan == 2 ? 'Madrasah' : 'Sekolah';
    var kkm = JSON.parse(JSON.stringify(<?= json_encode($kkm)?>));

    var z = 0.9;

    var halamanAwal = 1;
    var perSmt = 4;
    var perTp = perSmt * 2;

    var levelAkhir = ["6", "9", "12"];
    var klsAkhir = inArray(level, levelAkhir);

    var nipKepsek = raporSetting != null && raporSetting.nip_kepsek === '1' ? setting.nip : '';
    var nipWalas = raporSetting != null && raporSetting.nip_walikelas === '1' ? guru.nip : '';

    function inArray(val, array) {
        var found = $.inArray(val, array);
        return found >= 0;
    }

    function perbesar() {
        var prev = $('#zoom');
        var scala = prev.css('transform');
        console.log(z);
        if (z < 1) {
            z += 0.1;
            prev.css('transform', 'scale(' + z + ')');
        }
    }

    function perkecil() {
        var prev = $('#zoom');
        console.log(z);
        if (z > 0.2) {
            z -= 0.1;
            prev.css({'transform': 'scale(' + z + ')', 'transform-origin': 'top center'});
        }
    }

    function inRange(n, start, end) {
        return n >= start && n <= end;
    }

    function handleNull(value) {
        if (value == null || value == '0' || value == '') return '-';
        else return value;
    }

    function handleJenisKelamin(value) {
        if (value == null || value == '0') return '-'
        else {
            if (value.toUpperCase() == "L") return 'Laki-laki';
            else if (value.toUpperCase() == "P") return 'Perempuan';
            else return '-';
        }
    }

    function handleStatusKeluarga(value) {
        var list = ["", "Anak Kandung", "Anak Tiri", "Anak Angkat"];
        if (value == null || value == '-') return '-';
        else return list[value];
    }

    function handleAlamat(almt, rt, rw, kelurahan, kecamatan, kabupaten, provinsi) {
        var alamat = '';
        alamat += handleNull(almt);
        if (handleNull(rt) != '-' && handleNull(rw) != '-') {
            alamat += ' RT/RW: ' + handleNull(rt) + '/' + handleNull(rw);
        }
        if (handleNull(kelurahan) != '-') {
            alamat += ' Desa/Kel. ' + handleNull(kelurahan);
        }
        if (handleNull(kecamatan) != '-') {
            alamat += ' Kec. ' + handleNull(kecamatan);
        }
        if (handleNull(kabupaten) != '-') {
            alamat += ' Kota/Kab. ' + handleNull(kabupaten);
        }
        if (handleNull(provinsi) != '-') {
            alamat += ' ' + handleNull(provinsi);
        }

        return alamat;
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

    function handlePredikat(pred) {
        if (pred == 'A') return 'Sangat Baik';
        else if (pred == 'B') return 'Baik';
        else if (pred == 'C') return 'Cukup';
        else if (pred == 'D') return 'Kurang';
        else return '';
    }

    function handleTanggal(tgl) {
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

    function ellipsisText(text) {
        if (text == null) {
            return '';
        } else {
            var limit = 300;
            if (text.length > limit) {
                return text.substring(0, limit) + '...';
            } else {
                return text;
            }
            /*
            var splitted = text.split(',');
            if (splitted.length > 2) {
                var s1 = splitted[0];
                var s2 = splitted[1];

                var limit = 100;
                var len = s2.length;
                if (len >= limit) {
                    s2 = s2.substring(0, limit) + '...';
                }
                return s1 + ',' + s2;
            } else {
                return text;
            }
            */
        }
    }

    function createPageInfo() {
        var arrInfoTitle = [
            'Nama ' + namaSatuanPend, 'NPSN', 'NIS/NSS/NDS', 'Alamat',
            'Kelurahan/Desa', 'Kecamatan', 'Kota/Kabupaten', 'Provinsi',
            'Kode Pos', 'No. Telepon', 'Faksimili', 'Websita', 'Email'];
        var arrInfoVal = [
            handleNull(setting.sekolah).toUpperCase(), handleNull(setting.npsn), handleNull(setting.nss), handleNull(setting.alamat),
            handleNull(setting.desa), handleNull(setting.kecamatan), handleNull(setting.kota), handleNull(setting.provinsi),
            handleNull(setting.kode_pos), handleNull(setting.telp), handleNull(setting.fax), handleNull(setting.web),
            handleNull(setting.email)];

        var splited = satuanPend[setting.jenjang][setting.satuan_pendidikan].split('(');
        var title1 = splited[0];
        var title2 = '(' + splited[1];
        var infoSekolah = '<div style="height: 274mm;display: flex; flex-direction: column; justify-content: space-between;">' +
            '<div style="padding: 0; margin-top: 100px">' +
            '    <div class="judul" style="text-align: center;font-family: \'Arial\';font-size: 20pt;font-weight: bold">' +
            '        <p style="margin-bottom: 0">RAPOR</p>' +
            '        <p style="margin-bottom: 0">' + title1 + '</p>' +
            '        <p style="margin-bottom: 0">' + title2 + '</p>' +
            '    </div>' +
            '    <br>' +
            '    <div style="display: flex;-webkit-justify-content: center;justify-content: center;margin-top: 300px;font-family: \'Tahoma\';font-size: 14pt;">' +
            '        <table style="width: 80%; border: 0;">';
        for (let i = 0; i < arrInfoTitle.length; i++) {
            if (i === 0) {
                infoSekolah += '<tr>' +
                    '<td style="width:30%;">' + arrInfoTitle[i] + '</td>' +
                    '<td>:</td>' +
                    '<td style="width:70%;"><b>' + arrInfoVal[i] + '</b></td>' +
                    '</tr>';
            } else {
                infoSekolah += '<tr>' +
                    '<td>' + arrInfoTitle[i] + '</td>' +
                    '<td>:</td>' +
                    '<td>' + arrInfoVal[i] + '</td>' +
                    '</tr>';
            }
        }
        infoSekolah += '</table></div></div>';
        infoSekolah += '<div class="" style="width: 100%; color: #000000; font-family: \'Tahoma\';font-size: 9pt;">' +
            '<hr style="border-top: 1px solid #000000;margin-bottom: 2px">' +
            '<table style="width: 100%;">' +
            '<tr>' +
            '<td style="width:20px;background: #BEBFC1">' + '</td>' +
            '<td style="padding-left: 6px;"></td>' +
            '<td style="text-align: end;">ii</td>' +
            '</tr>' +
            '</table>' +
            '</div></div>';

        return infoSekolah;
    }

    function createPageIdentitas(siswa) {
        var arrIdNo = [
            '1.', '2.', '3.', '4.', '5.', '6.', '7.', '8.', '9.', '10.', '11.', '', '', '12.',
            '', '', '', '', '', '', '', '', '13.', '', '', '', '',];
        var arrIdTitle = [
            'Nama Lengkap Peserta Didik', 'NIS / NISN', 'Tempat Tanggal Lahir', 'Jenis Kelamin', 'Agama',
            'Status dalam Keluarga', 'Anak ke', 'Alamat Peserta Didik', 'Nomor Telepon Rumah', namaSatuanPend + ' Asal',
            'Diterima di ' + namaSatuanPend + ' ini', 'a. Di kelas', 'b. Pada tanggal', 'Orang Tua', 'a. Nama Ayah',
            'b. Pekerjaan', 'c. Nomor Telepon/HP', 'd. Alamat', 'e. Nama Ibu', 'f. Pekerjaan', 'g. Nomor Telepon/HP',
            'h. Alamat', 'Wali', 'a. Nama Wali', 'b. Pekerjaan', 'c. Nomor Telpon/HP', 'd. Alamat'];
        var arrIdVal = [
            handleNull(siswa.nama).toUpperCase(), handleNisn(siswa.nis, siswa.nisn),
            handleNull(siswa.tempat_lahir) + ', ' + handleTanggal(siswa.tanggal_lahir), handleJenisKelamin(siswa.jenis_kelamin),
            handleNull(siswa.agama), handleStatusKeluarga(siswa.status_keluarga), handleNull(siswa.anak_ke),
            handleAlamat(siswa.alamat, siswa.rt, siswa.rw, siswa.kelurahan, siswa.kecamatan, siswa.kabupaten, siswa.provinsi),
            handleNull(siswa.hp), handleNull(siswa.sekolah_asal), '', handleNull(siswa.kelas_awal), handleTanggal(siswa.tahun_masuk),
            '', handleNull(siswa.nama_ayah), handleNull(siswa.pekerjaan_ayah), handleNull(siswa.nohp_ayah), handleNull(siswa.alamat_ayah),
            handleNull(siswa.nama_ibu), handleNull(siswa.pekerjaan_ibu), handleNull(siswa.nohp_ibu), handleNull(siswa.alamat_ibu),
            '', handleNull(siswa.nama_wali), handleNull(siswa.pekerjaan_wali), handleNull(siswa.nohp_wali), handleNull(siswa.alamat_wali),
        ];
        var identitas = '<div style="height: 274mm;display: flex; flex-direction: column; justify-content: space-between;">' +
            '<div style="padding: 0; margin-top: 0">' +
            '    <div class="judul"' +
            '         style="text-align: center;font-family: \'Arial\';font-size: 16pt;font-weight: bold">' +
            '        <p>IDENTITAS PESERTA DIDIK</p>' +
            '    </div>' +
            '    <br>' +
            '    <div style="display: flex;-webkit-justify-content: center;justify-content: center;margin-top: 20px;font-family: \'Arial\';font-size: 12pt;">' +
            '        <table style="width: 100%; border: 0;">';
        for (let i = 0; i < arrIdTitle.length; i++) {
            if (i === 0) {
                identitas += '<tr>' +
                    '    <td style="width: 5%">' + arrIdNo[i] + '</td>' +
                    '    <td style="width:35%;">' + arrIdTitle[i] + '</td>' +
                    '    <td style="width: 2%">:</td>' +
                    '    <td style="width:58%;"><b>' + arrIdVal[i] + '</b></td>' +
                    '</tr>';
            } else {
                identitas += '<tr>' +
                    '    <td style="vertical-align: top">' + arrIdNo[i] + '</td>' +
                    '    <td style="vertical-align: top">' + arrIdTitle[i] + '</td>' +
                    '    <td style="vertical-align: top">:</td>' +
                    '    <td>' + arrIdVal[i] + '</td>' +
                    '</tr>';
            }
        }

        identitas += '</table></div></div>';
        identitas += '<table style="width: 100%">' +
            '<tr style="font-family: \'Tahoma\';font-size: 12pt;">' +
            '<td style="width: 35%;padding-left: 100px;">' +
            '<img class="avatar" src="' + base_url + siswa.foto + '"width="100" height="130"' +
            ' style="object-fit: cover; border: 1px solid black"></td>' +
            '</td>' +
            '<td style="width: 30%;">' +
            '<td style="width: 35%">' +
            setting.kota + ',  ' + handleTanggal(siswa.tahun_masuk) +
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
            '</tr>' +
            '</table>';
        //footer
        identitas += '<div class="" style="width: 100%; color: #000000; font-family: \'Tahoma\';font-size: 9pt;">' +
            '<hr style="border-top: 1px solid #000000;margin-bottom: 2px">' +
            '<table style="width: 100%;">' +
            '<tr>' +
            '<td style="width:20px;background: #BEBFC1">' + '</td>' +
            '<td style="padding-left: 6px;">' + siswa.nama + ' | ' + siswa.nis + ' | ' + handleNull(siswa.nisn) + '</td>' +
            '<td style="text-align: end;">iii</td>' +
            '</tr>' +
            '</table>' +
            '</div></div>';

        return identitas;
    }

    function headerPage(siswa) {
        var header = '    <table id="table-info-print" style="width: 100%; border: 0;">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
            '            <td style="width:20%;">Nama</td>' +
            '            <td>:</td>' +
            '            <td style="width:40%;"><b>' + siswa.nama.toUpperCase() + '</b></td>' +
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
            '            <td><b>' + smt.nama_smt + '</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;vertical-align: top">' +
            '            <td>Nama ' + namaSatuanPend + '</td>' +
            '            <td>:</td>' +
            '            <td><b>' + setting.sekolah + '</b></td>' +
            '            <td>Tahun Pelajaran</td>' +
            '            <td>:</td>' +
            '            <td><b>' + tp.tahun + '</b></td>' +
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
            '<hr>';
        return header;
    }

    const alpha = Array.from(Array(26)).map((e, i) => i + 65);
    const alphabet = alpha.map((x) => String.fromCharCode(x));
    let posAlpha = 0;

    //console.log(alphabet[0]);

    function createPageSikap(idSiswa, siswa) {
        var sSpiritual = sikap[idSiswa] != null && sikap[idSiswa][1] != null ? sikap[idSiswa][1].predikat.predikat : '';
        var sSosial = sikap[idSiswa] != null && sikap[idSiswa][2] != null ? sikap[idSiswa][2].predikat.predikat : '';
        var desSpiritual = sikap[idSiswa] != null && sikap[idSiswa][1] != null ? sikap[idSiswa][1].deskripsi : '';
        var desSosial = sikap[idSiswa] != null && sikap[idSiswa][2] != null ? sikap[idSiswa][2].deskripsi : '';

        var tableSikap = '<div style="min-height: 274mm;display: flex; flex-direction: column; justify-content: space-between;"> ' +
            '<div style="padding: 0;">' +
            '    <p style="font-family: \'Tahoma\';text-align: center;font-size: 12pt;"><b>PENCAPAIAN KOMPETENSI PESERTA DIDIK</b></p>' +
            '    <hr>' + headerPage(siswa) +
            '<br>' +
            '<br>' +
            '    <span style="font-family: \'Tahoma\';font-size: 10pt;"><b>' + alphabet[posAlpha] + '. SIKAP</b></span>' +
            '<br>' +
            '<br>' +
            '    <span style="font-family: \'Tahoma\';font-size: 10pt;"><b>1. Sikap Spiritual</b></span>' +
            '    <div style="display: flex;-webkit-justify-content: center;justify-content: center;margin-top: 4px;">' +
            '        <table style="width: 100%; border: 2px solid black; border-collapse: collapse">' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center">' +
            '    <td style="width: 20%;height:30px;border: 1px solid black; border-collapse: collapse;background: #E6E7E9"><b>Predikat</b></td>' +
            '    <td style="width:80%;border: 1px solid black; border-collapse: collapse;background: #E6E7E9"><b>Deskripsi</b></td>' +
            '</tr>' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
            '    <td style="width: 30%;height:200px;border: 1px solid black; border-collapse: collapse;text-align: center"><b>' +
            handlePredikat(sSpiritual) +
            '</b></td>' +
            '    <td style="width:70%;border: 1px solid black; border-collapse: collapse;padding: 6px">' +
            desSpiritual +
            '</td>' +
            '</tr>' +
            '</table></div>' +
            '<br>' +
            '<br>' +
            '    <span style="font-family: \'Tahoma\';font-size: 10pt;"><b>2. Sikap Sosial</b></span>' +
            '    <div style="display: flex;-webkit-justify-content: center;justify-content: center;margin-top: 4px;">' +
            '        <table style="width: 100%; border: 2px solid black; border-collapse: collapse">' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center">' +
            '    <td style="width: 20%;height:30px;border: 1px solid black; border-collapse: collapse;background: #E6E7E9"><b>Predikat</b></td>' +
            '    <td style="width:80%;border: 1px solid black; border-collapse: collapse;background: #E6E7E9"><b>Deskripsi</b></td>' +
            '</tr>' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
            '    <td style="width: 30%;height:200px;border: 1px solid black; border-collapse: collapse;text-align: center"><b>' +
            handlePredikat(sSosial) +
            '</b></td>' +
            '    <td style="width:70%;border: 1px solid black; border-collapse: collapse;padding: 6px;vertical-align: center">' +
            desSosial +
            '</td>' +
            '</tr>' +
            '</table>' +
            '</div>' +
            '</div>';
        posAlpha++;

        //footer
        tableSikap += '<div class="" style="width: 100%; color: #000000; font-family: \'Tahoma\';font-size: 9pt;">' +
            '<hr style="border-top: 1px solid #000000;margin-bottom: 2px">' +
            '<table style="width: 100%;">' +
            '<tr>' +
            '<td style="width:20px;background: #BEBFC1">' + '</td>' +
            '<td style="padding-left: 6px;">' + siswa.nama + ' | ' + siswa.nama_kelas + ' | ' + siswa.nis + ' | ' + handleNull(siswa.nisn) + '</td>' +
            '<td class="hal" style="text-align: end;"></td>' +
            '</tr>' +
            '</table>' +
            '</div></div>';
        return tableSikap;
    }

    function tableKkm() {
        let arrKKM = [];
        if (raporSetting.kkm_tunggal == "1") {
            arrKKM.push(raporSetting.kkm);
        } else {
            $.each(kkm[1], function (id, val) {
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

        var tableNilai = '</table>' +
            '<br>' +
            '<span style="font-family: \'Tahoma\';font-size: 10pt">Table Interval Predikat Berdasarkan KKM</span>' +
            '<table id="table-kkm-print" style="width: 100%;border: 2px solid black; border-collapse: collapse;margin-top: 6px">' +
            '    <tr style="font-family: \'Tahoma\';font-size: 9pt;background: #E6E7E9">' +
            '        <td rowspan="2" style="width: 20%;border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 4px 2px 4px"><b>KKM</b></td>' +
            '        <td colspan="4" style="width:80%;border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 4px 2px 4px"><b>PREDIKAT</b></td>' +
            '    </tr>' +
            '    <tr style="font-family: \'Tahoma\';font-size: 9pt;background: #E6E7E9">' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 4px 2px 4px"><b>D (kurang)</b></td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 4px 2px 4px"><b>C (cukup)</b></td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 4px 2px 4px"><b>B (baik)</b></td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 4px 2px 4px"><b>A (sangat baik)</b></td>' +
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
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 4px 2px 4px"><b>' + isi + '</b></td>' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 4px 2px 4px">< ' + isi + '</td>' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 4px 2px 4px">' + pre_c + ' ~ ' + pre_csd + '</td>' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 4px 2px 4px">' + pre_b + ' ~ ' + pre_bsd + '</td>' +
                '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 2px 4px 2px 4px">' + pre_a + ' ~ ' + pre_asd + '</td>' +
                '    </tr>';
        });
        tableNilai += '</table>';
        return tableNilai;
    }

    function createPagePengetahuan(idSiswa, siswa) {
        var tableNilai = '<div style="min-height: 274mm;display: flex; flex-direction: column; justify-content: space-between;">' +
            '<div style="padding: 0;">' +
            headerPage(siswa) +
            '    <span style="font-family: \'Tahoma\';font-size: 10pt;"><b>' + alphabet[posAlpha] + '. PENGETAHUAN</b></span>';
        if (raporSetting.kkm_tunggal == '1') {
            tableNilai += '<br>' +
                '    <span style="font-family: \'Tahoma\';font-size: 10pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kreteria Ketuntasan Minimal: <b>' + raporSetting.kkm + '</b></span>';
        }
        posAlpha++;
        var display = raporSetting.kkm_tunggal == '1' ? 'display:none;' : '';
        var collSpan = raporSetting.kkm_tunggal == '1' ? 5 : 6;
        tableNilai += '<br>' +
            '    <table style="width: 100%;border: 2px solid black; border-collapse: collapse;margin-top: 6px">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center;background: #E6E7E9">' +
            '            <td rowspan="2" style="width:5%;border: 1px solid black; border-collapse: collapse"><b>NO</b></td>' +
            '            <td rowspan="2" style="width:20%;border: 1px solid black; border-collapse: collapse"><b>Mata Pelajaran</b></td>' +
            '            <td rowspan="2" style="width:7%;border: 1px solid black; border-collapse: collapse;' + display + '"><b>KKM</b></td>' +
            '            <td colspan="3" style="height:25px;border: 1px solid black; border-collapse: collapse"><b>Pengetahuan</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center;background: #E6E7E9">' +
            '            <td style="width:7%;height:25px;border: 1px solid black; border-collapse: collapse"><b>Nilai</b></td>' +
            '            <td style="width:9%;border: 1px solid black; border-collapse: collapse"><b>Predikat</b></td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse"><b>Deskripsi</b></td>' +
            '        </tr>';

        // mapel pai
        var htmlPai = '';
        var tablePai = '';
        var abjad = ['', 'a', 'b', 'c', 'd'];
        var pos = 0;

        var arr = Object.keys(arrKelompokMapel).map(function (key) {
            return arrKelompokMapel[key];
        });
        var indexPAI = arr.map(function (kel) {
            return kel.kategori;
        }).indexOf('PAI (Kemenag)');
        var pai = arr[indexPAI];

        $.each(arrMapel, function (k, mapel) {
            if (pai != null && pai.kode_kel_mapel != null && nilai[idSiswa] != null && nilai[idSiswa][mapel.id_mapel] != null && mapel.kelompok == pai.kode_kel_mapel) {
                const kkmMapel = raporSetting.kkm_tunggal == "1" ? raporSetting.kkm : (kkm[1][mapel.id_mapel] == null ? "" : kkm[1][mapel.id_mapel].kkm);
                var pnilai = nilai[idSiswa][mapel.id_mapel].nilai == '0' ? '' : nilai[idSiswa][mapel.id_mapel].nilai;
                var ppred = nilai[idSiswa][mapel.id_mapel].predikat == '0' ? '' : nilai[idSiswa][mapel.id_mapel].predikat;
                var pdesk = nilai[idSiswa][mapel.id_mapel].p_deskripsi;
                pos++;
                htmlPai += '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">' + abjad[pos] + '. ' + mapel.nama_mapel + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;' + display + '"><b>' + kkmMapel + '</b></td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + pnilai + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + ppred + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify">' +
                    ellipsisText(pdesk) +
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

        var trCount = pos;
        // mapel non pai
        var index = 0;
        $.each(arrKelompokMapel, function (kel, val) {
            var no = pos > 0 && index == 0 ? 1 : 0;
            var htmlTr = '';
            var hasSub = false;

            if (val.kategori != 'PAI (Kemenag)') {
                $.each(arrMapel, function (k, mapel) {
                    if (nilai[idSiswa] != null && nilai[idSiswa][mapel.id_mapel] != null && mapel.kelompok == kel) {
                        hasSub = val.id_parent != '0';
                        const kkmMapel = raporSetting.kkm_tunggal == "1" ? raporSetting.kkm : (kkm[1][mapel.id_mapel] == null ? "" : kkm[1][mapel.id_mapel].kkm);
                        var pnilai = nilai[idSiswa][mapel.id_mapel].nilai == '0' ? '' : nilai[idSiswa][mapel.id_mapel].nilai;
                        var ppred = nilai[idSiswa][mapel.id_mapel].predikat == '0' ? '' : nilai[idSiswa][mapel.id_mapel].predikat;
                        var pdesk = nilai[idSiswa][mapel.id_mapel].p_deskripsi;
                        no++;
                        htmlTr += '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + no + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">' + mapel.nama_mapel + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;' + display + '"><b>' + kkmMapel + '</b></td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + pnilai + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + ppred + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify">' +
                            ellipsisText(pdesk) +
                            '</td>' +
                            '</tr>';
                        trCount++;
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

        if (trCount == 0) {
            tableNilai += '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                '            <td colspan="5" style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;"><b>Tidak ada arsip nilai</b></td>' +
                '        </tr>';
        }

        tableNilai += '</table>';
        tableNilai += tableKkm() + '</div>';

        tableNilai += '<div class="" style="width: 100%; color: #000000; font-family: \'Tahoma\';font-size: 9pt;">' +
            '<hr style="border-top: 1px solid #000000;margin-bottom: 2px">' +
            '<table style="width: 100%;">' +
            '<tr>' +
            '<td style="width:20px;background: #BEBFC1">' + '</td>' +
            '<td style="padding-left: 6px;">' + siswa.nama + ' | ' + siswa.nama_kelas + ' | ' + siswa.nis + ' | ' + handleNull(siswa.nisn) + '</td>' +
            '<td class="hal" style="text-align: end;"></td>' +
            '</tr>' +
            '</table>' +
            '</div></div>';

        return tableNilai;
    }

    function createPageKeterampilan(idSiswa, siswa) {
        var tableNilai = '<div style="min-height: 274mm;display: flex; flex-direction: column; justify-content: space-between;">' +
            '<div style="padding: 0;">' +
            headerPage(siswa) +
            '    <span style="font-family: \'Tahoma\';font-size: 10pt;"><b>' + alphabet[posAlpha] + '. KETERAMPILAN</b></span>';
        if (raporSetting.kkm_tunggal == '1') {
            tableNilai += '<br>' +
                '    <span style="font-family: \'Tahoma\';font-size: 10pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kreteria Ketuntasan Minimal: <b>' + raporSetting.kkm + '</b></span>';
        }
        posAlpha++;
        var display = raporSetting.kkm_tunggal == '1' ? 'display:none;' : '';
        var collSpan = raporSetting.kkm_tunggal == '1' ? 5 : 6;
        tableNilai += '<br>' +
            '    <table style="width: 100%;border: 2px solid black; border-collapse: collapse;margin-top: 6px">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center;background: #E6E7E9">' +
            '            <td rowspan="2" style="width:5%;border: 1px solid black; border-collapse: collapse"><b>NO</b></td>' +
            '            <td rowspan="2" style="width:25%;border: 1px solid black; border-collapse: collapse"><b>Mata Pelajaran</b></td>' +
            '            <td rowspan="2" style="width:7%;border: 1px solid black; border-collapse: collapse;' + display + '"><b>KKM</b></td>' +
            '            <td colspan="3" style="height:25px;border: 1px solid black; border-collapse: collapse"><b>Keterampilan</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center;background: #E6E7E9">' +
            '            <td style="width:7%;height:25px;border: 1px solid black; border-collapse: collapse"><b>Nilai</b></td>' +
            '            <td style="width:9%;border: 1px solid black; border-collapse: collapse"><b>Predikat</b></td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse"><b>Deskripsi</b></td>' +
            '        </tr>';

        // mapel pai
        var htmlPai = '';
        var tablePai = '';
        var abjad = ['', 'a', 'b', 'c', 'd'];
        var pos = 0;

        var arr = Object.keys(arrKelompokMapel).map(function (key) {
            return arrKelompokMapel[key];
        });
        var indexPAI = arr.map(function (kel) {
            return kel.kategori;
        }).indexOf('PAI (Kemenag)');
        var pai = arr[indexPAI];
        $.each(arrMapel, function (k, mapel) {
            if (pai != null && pai.kode_kel_mapel != null && nilai[idSiswa] != null && nilai[idSiswa][mapel.id_mapel] != null && mapel.kelompok == pai.kode_kel_mapel) {
                const kkmMapel = raporSetting.kkm_tunggal == "1" ? raporSetting.kkm : (kkm[1][mapel.id_mapel] == null ? "" : kkm[1][mapel.id_mapel].kkm);
                var knilai = nilai[idSiswa][mapel.id_mapel].k_rata_rata == '0' ? '' : nilai[idSiswa][mapel.id_mapel].k_rata_rata;
                var kpred = nilai[idSiswa][mapel.id_mapel].k_predikat == '0' ? '' : nilai[idSiswa][mapel.id_mapel].k_predikat;
                var kdesk = nilai[idSiswa][mapel.id_mapel].k_deskripsi;
                pos++;
                htmlPai += '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">' + abjad[pos] + '. ' + mapel.nama_mapel + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;' + display + '"><b>' + kkmMapel + '</b></td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + knilai + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + kpred + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify">' +
                    ellipsisText(kdesk) +
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

        var trCount = pos;
        // mapel non pai
        var index = 0;
        $.each(arrKelompokMapel, function (kel, val) {
            var no = pos > 0 && index == 0 ? 1 : 0;
            var htmlTr = '';
            var hasSub = false;

            if (val.kategori != 'PAI (Kemenag)') {
                $.each(arrMapel, function (k, mapel) {
                    if (nilai[idSiswa] != null && nilai[idSiswa][mapel.id_mapel] != null && mapel.kelompok == kel) {
                        hasSub = val.id_parent != '0';
                        const kkmMapel = raporSetting.kkm_tunggal == "1" ? raporSetting.kkm : (kkm[1][mapel.id_mapel] == null ? "" : kkm[1][mapel.id_mapel].kkm);
                        var knilai = nilai[idSiswa][mapel.id_mapel].k_rata_rata == '0' ? '' : nilai[idSiswa][mapel.id_mapel].k_rata_rata;
                        var kpred = nilai[idSiswa][mapel.id_mapel].k_predikat == '0' ? '' : nilai[idSiswa][mapel.id_mapel].k_predikat;
                        var kdesk = nilai[idSiswa][mapel.id_mapel].k_deskripsi;
                        no++;
                        htmlTr += '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + no + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">' + mapel.nama_mapel + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;' + display + '"><b>' + kkmMapel + '</b></td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + knilai + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + kpred + '</td>' +
                            '<td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify">' +
                            ellipsisText(kdesk) +
                            '</td>' +
                            '</tr>';
                        trCount++;
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

        if (trCount == 0) {
            tableNilai += '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                '            <td colspan="5" style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;"><b>Tidak ada arsip nilai</b></td>' +
                '        </tr>';
        }

        tableNilai += '</table></div>';

        tableNilai += '<div class="" style="width: 100%; color: #000000; font-family: \'Tahoma\';font-size: 9pt;">' +
            '<hr style="border-top: 1px solid #000000;margin-bottom: 2px">' +
            '<table style="width: 100%;">' +
            '<tr>' +
            '<td style="width:20px;background: #BEBFC1">' + '</td>' +
            '<td style="padding-left: 6px;">' + siswa.nama + ' | ' + siswa.nama_kelas + ' | ' + siswa.nis + ' | ' + handleNull(siswa.nisn) + '</td>' +
            '<td class="hal" style="text-align: end;"></td>' +
            '</tr>' +
            '</table>' +
            '</div></div>';

        return tableNilai;
    }

    function buatTeksKenaikan(state) {
        var text = '';
        var naikStrike1 = '';
        var naikStrike2 = '';

        var tnaikStrike1 = '<del>';
        var tnaikStrike2 = '</del>';

        if (state == '0') {
            naikStrike1 = '<del>';
            naikStrike2 = '</del>';
            tnaikStrike1 = '';
            tnaikStrike2 = '';
        }

        switch (level) {
            case '1':
                text = naikStrike1 + 'naik ke kelas   II  ( dua )' + naikStrike2 + '<br>' +
                    tnaikStrike1 + 'tinggal di kelas  I ( satu )' + tnaikStrike2 + '<br>';
                break;
            case '2':
                text = naikStrike1 + 'naik ke kelas   III  ( tiga )' + naikStrike2 + '<br>' +
                    tnaikStrike1 + 'tinggal di kelas  II ( dua )' + tnaikStrike2 + '<br>';
                break;
            case '3':
                text = naikStrike1 + 'naik ke kelas   IV  ( empat )' + naikStrike2 + '<br>' +
                    tnaikStrike1 + 'tinggal di kelas  III ( tiga )' + tnaikStrike2 + '<br>';
                break;
            case '4':
                text = naikStrike1 + 'naik ke kelas  V  ( lima )' + naikStrike2 + '<br>' +
                    tnaikStrike1 + 'tinggal di kelas  IV ( empat )' + tnaikStrike2 + '<br>';
                break;
            case '5':
                text = naikStrike1 + 'naik ke kelas   VI  ( enam )' + naikStrike2 + '<br>' +
                    tnaikStrike1 + 'tinggal di kelas  V ( lima )' + tnaikStrike2 + '<br>';
                break;
            case '6':
                text = naikStrike1 + 'Lulus' + naikStrike2 + ' / ' + tnaikStrike1 + 'Tidak Lulus' + tnaikStrike2 + '<br>';
                break;
            case '7':
                text = naikStrike1 + 'naik ke kelas   VIII  ( delapan )' + naikStrike2 + '<br>' +
                    tnaikStrike1 + 'tinggal di kelas  VII ( tujuh )' + tnaikStrike2 + '<br>';
                break;
            case '8':
                text = naikStrike1 + 'naik ke kelas   IX  ( sembilan )' + naikStrike2 + '<br>' +
                    tnaikStrike1 + 'tinggal di kelas  VIII ( delapan )' + tnaikStrike2 + '<br>';
                break;
            case '9':
                text = naikStrike1 + 'Lulus' + naikStrike2 + ' / ' + tnaikStrike1 + 'Tidak Lulus' + tnaikStrike2 + '<br>';
                break;
            case '10':
                text = naikStrike1 + 'naik ke kelas   XI  ( sebelas )' + naikStrike2 + '<br>' +
                    tnaikStrike1 + 'tinggal di kelas  X ( sepuluh )' + tnaikStrike2 + '<br>';
                break;
            case '11':
                text = naikStrike1 + 'naik ke kelas   XII  ( duabelas )' + naikStrike2 + '<br>' +
                    tnaikStrike1 + 'tinggal di kelas  XI ( sebelas )' + tnaikStrike2 + '<br>';
                break;
            case '12':
                text = naikStrike1 + 'Lulus' + naikStrike2 + ' / ' + tnaikStrike1 + 'Tidak Lulus' + tnaikStrike2 + '<br>';
        }

        return text;
    }

    function createPageekstra(idSiswa, siswa) {
        console.log('ekstra', ekstra);
        var tableNilai = '<div style="min-height: 274mm;display: flex; flex-direction: column; justify-content: space-between;">' +
            '<div style="padding: 0cm;">' +
            '    <span style="font-family: \'Tahoma\';font-size: 10pt;"><b>' + alphabet[posAlpha] + '. EKSTRAKURIKULER</b></span>' +
            '<br>' +
            '    <table style="width: 100%;border: 2px solid black; border-collapse: collapse;margin-top: 6px">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center;background: #E6E7E9">' +
            '            <td style="width:5%;border: 1px solid black; border-collapse: collapse"><b>NO</b></td>' +
            '            <td style="width:35%;border: 1px solid black; border-collapse: collapse"><b>Kegiatan Ekstrakurikuler</b></td>' +
            '            <td style="width:15%;height:35px;border: 1px solid black; border-collapse: collapse"><b>Nilai</b></td>' +
            '            <td style="width:45%;border: 1px solid black; border-collapse: collapse"><b>Keterangan</b></td>' +
            '        </tr>';
        posAlpha++;
        var no = 1;
        $.each(arrekstra, function (k, v) {
            if (k != '') {
                var nilaiEkstra = ekstra[idSiswa][k].predikat != null ? ekstra[idSiswa][k].predikat : '';
                var nilaiDesk = ekstra[idSiswa][k].deskripsi != null ? ekstra[idSiswa][k].deskripsi : '';
                console.log('ekstra', ekstra[idSiswa][k].deskripsi);
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + no + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding-left: 4px">' + v.nama_ekstra + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + nilaiEkstra + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding-left: 4px">' + nilaiDesk + '</td>' +
                    '</tr>';
                no++;
            }
        });

        for (let i = no; i < 4; i++) {
            tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + no + '</td>' +
                '<td style="border: 1px solid black; border-collapse: collapse;"></td>' +
                '<td style="border: 1px solid black; border-collapse: collapse;"></td>' +
                '<td style="border: 1px solid black; border-collapse: collapse;"></td>' +
                '</tr>';
            no++;
        }
        tableNilai += '</table><br>';

        //prestasi
        tableNilai += '<span style="font-family: \'Tahoma\';font-size: 10pt;"><b>' + alphabet[posAlpha] + '. PRESTASI</b></span>' +
            '<br>' +
            '    <table style="width: 100%;border: 2px solid black; border-collapse: collapse;margin-top: 6px">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center;background: #E6E7E9">' +
            '            <td style="width:5%;height:35px;border: 1px solid black; border-collapse: collapse"><b>NO</b></td>' +
            '            <td style="width:35%;border: 1px solid black; border-collapse: collapse"><b>Jenis Kegiatan</b></td>' +
            '            <td style="width:60%;border: 1px solid black; border-collapse: collapse"><b>Deskripsi</b></td>' +
            '        </tr>' +
            '       <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
            '            <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">1</td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding: 2px 4px 2px 4px;">' + deskripsi[idSiswa].p1 + '</td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding: 2px 4px 2px 4px;">' + deskripsi[idSiswa].p1_desk + '</td>' +
            '       </tr>' +
            '            <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
            '            <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">2</td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding: 2px 4px 2px 4px;">' + deskripsi[idSiswa].p2 + '</td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding: 2px 4px 2px 4px;">' + deskripsi[idSiswa].p2_desk + '</td>' +
            '       </tr>' +
            '       <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
            '            <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">3</td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding: 2px 4px 2px 4px;">' + deskripsi[idSiswa].p3 + '</td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding: 2px 4px 2px 4px;">' + deskripsi[idSiswa].p3_desk + '</td>' +
            '       </tr>';

        posAlpha++;
        tableNilai += '</table>';

        //fisik
        /*
        if (setting.jenjang == '1') {
            var sehat = ['Pendengaran', 'Penglihatan', 'Gigi', 'Lain-lain'];
            var kondisi = [fisik[idSiswa].kondisi.telinga, fisik[idSiswa].kondisi.mata, fisik[idSiswa].kondisi.gigi, fisik[idSiswa].kondisi.lain];
            tableNilai += '<br>' +
                '<span style="font-family: \'Tahoma\';font-size: 10pt;"><b>' + alphabet[posAlpha] + '. KONDISI KESEHATAN DAN FISIK</b></span>' +
                '<div style="display: flex">' +
                '<table style="width: 58%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">' +
                '        <tr style="font-family: \'Tahoma\';font-size: 9pt;background: #E6E7E9;text-align: center">' +
                '            <td style="border: 1px solid black; border-collapse: collapse;height:35px"><b>Aspek yang Dinilai</b></td>' +
                '            <td style="border: 1px solid black; border-collapse: collapse"><b>Keterangan</b></td>' +
                '        </tr>';
            posAlpha++;

            for (let i = 0; i < sehat.length; i++) {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">' + sehat[i] + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">' + kondisi[i] + '</td>' +
                    '</tr>';
            }
            tableNilai += '</table><div style="width: 2%"></div>';

            tableNilai += '<table style="width: 40%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">' +
                '        <tr style="font-family: \'Tahoma\';font-size: 9pt;background: #E6E7E9;text-align: center">' +
                '            <td rowspan="2" style="width:40%;border: 1px solid black; border-collapse: collapse"><b>Aspek yang Dinilai</b></td>' +
                '            <td colspan="2" style="width:60%;border: 1px solid black; border-collapse: collapse"><b>Semester</b></td>' +
                '        </tr>' +
                '        <tr style="font-family: \'Tahoma\';font-size: 9pt;text-align: center;background: #E6E7E9">' +
                '            <td style="width:30%;border: 1px solid black; border-collapse: collapse"><b>1</b></td>' +
                '            <td style="width:30%;border: 1px solid black; border-collapse: collapse"><b>2</b></td>' +
                '        </tr>' +
                '<tr>';

            var tb = ['Tinggi Badan', 'Berat Badan'];
            var arrt = [fisik[idSiswa].smt1.tinggi, fisik[idSiswa].smt2.tinggi];
            var arrb = [fisik[idSiswa].smt1.berat, fisik[idSiswa].smt2.berat];
            for (let i = 0; i < tb.length; i++) {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">' + tb[i] + '</td>';
                for (let j = 0; j < 2; j++) {
                    var tt = arrt[j] == '0' || arrt[j] == '' ? '' : arrt[j] + ' cm';
                    var bb = arrb[j] == '0' || arrb[j] == '' ? '' : arrb[j] + ' kg';
                    if (i === 0) tableNilai += '<td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px;text-align: center">' +
                        tt + '</td>';
                    else tableNilai += '<td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px;text-align: center">' +
                        bb + '</td>';
                }
                tableNilai += '</tr>';
            }
            tableNilai += '</table></div>';
        }
         */

        // absensi
        var ssakit = absensi[idSiswa].nilai.s == '' ? '0' : absensi[idSiswa].nilai.s;
        var sizin = absensi[idSiswa].nilai.i == '' ? '0' : absensi[idSiswa].nilai.i;
        var salpa = absensi[idSiswa].nilai.a == '' ? '0' : absensi[idSiswa].nilai.a;
        tableNilai += '<br>' +
            '<span style="font-family: \'Tahoma\';font-size: 10pt;"><b>' + alphabet[posAlpha] + '. KETIDAKHADIRAN</b></span>' +
            '    <table style="width: 50%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
            '            <td style="width:70%;border: 1px solid black; border-collapse: collapse;padding-left: 6px">Sakit</td>' +
            '            <td style="width:30%;border: 1px solid black; border-collapse: collapse;padding-left: 6px">' +
            ssakit + ' hari' +
            '</td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">Izin</td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">' +
            sizin + ' hari' +
            '</td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">Tanpa Keterangan</td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">' +
            salpa + ' hari' +
            '</td>' +
            '        </tr>' +
            '</table>';
        posAlpha++;

        //catatan walikelas
        var sRank = parseInt(deskripsi[idSiswa].ranking) > 5 ? '--' : deskripsi[idSiswa].ranking;
        tableNilai += '<br>' +
            '    <span style="font-family: \'Tahoma\';font-size: 10pt;"><b>' + alphabet[posAlpha] + '. CATATAN WALI KELAS</b></span>' +
            '<br>' +
            '    <table style="width: 100%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
            '            <td style="width:100%;border: 1px solid black; border-collapse: collapse;padding-left: 6px">' +
            '               <table>' +
            '                   <tr>' +
            '                       <td style="vertical-align: top; width:12%;">Ranking ke: </td>' +
            '                       <td style="vertical-align: top; width:88%;">' + sRank + '. ' + deskripsi[idSiswa].rank_deskripsi + '</td>' +
            '                   </tr>' +
            '                   <tr>' +
            '                       <td style="vertical-align: top">Saran-saran: </td>' +
            '                       <td>' + absensi[idSiswa].saran + '</td>' +
            '                   </tr>' +
            '               </table>' +
            '           </td>' +
            '       </tr>' +
            '   </table>';
        posAlpha++;

        tableNilai += '<br>' +
            '    <span style="font-family: \'Tahoma\';font-size: 10pt;"><b>' + alphabet[posAlpha] + '. TANGGAPAN ORANG TUA/WALI</b></span>' +
            '<table style="width: 100%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">' +
            '<tr>' +
            '    <td style="width:100%;height: 40px;border: 1px solid black; border-collapse: collapse"></td>' +
            '</tr>' +
            '</table>';
        posAlpha++;

        tableNilai += '<br>' +
            '<div style="display: flex; align-items: flex-start;">' +
            '<div style="width:50%"></div>';

        //kenaikan
        if (smt.smt == 'Genap') {
            var naikKe = parseInt(level) + 1;
            var txtNaik = buatTeksKenaikan(naik[idSiswa]);
            tableNilai += '<table style="width: 50%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">' +
                '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
                '            <td style="width:100%;height: 55px;border: 1px solid black; border-collapse: collapse; padding-left: 6px">' +
                '<b>Keputusan:</b><br>' +
                'Berdasarkan pencapaian kompetensi pada semester ke-1 dan ke-2, peserta didik ditetapkan: <br>' +
                txtNaik +
                '<small>*) Coret yang tidak perlu.</small>' +
                '</td>' +
                '        </tr>' +
                '</table>';
        } else {
            tableNilai += '<div style="width:50%"></div>';
        }
        tableNilai += '</div>';

        tableNilai += '    <br>' +
            '<table style="width: 100%">' +
            '<tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
            '<td style="width: 35%;">' +
            '    Mengetahui:' +
            '    <br>' +
            '    Orang Tua/Wali' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>' +
            '</td>' +
            '<td style="width: 30%;"></td>' +
            '<td style="width: 35%">' +
            setting.kota + ',  ' + handleTanggal(klsAkhir ? raporSetting.tgl_rapor_kelas_akhir : raporSetting.tgl_rapor_akhir) +
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
            '<div style="display: flex;-webkit-justify-content: center;justify-content: center;">' +
            '    <table style="width: 500px;border: 0;">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 9pt;">' +
            '            <td style=" padding: 4px 4px 4px 180px">Mengetahui,' +
            '    <br>' +
            '    Kepala ' + namaSatuanPend +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <u>' + setting.kepsek + '</u>' +
            '    <br>' +
            '    Nip:' + nipKepsek +
            '</td>' +
            '        </tr>' +
            '    </table>' +
            '</div>' +
            '</div>';

        tableNilai += '<div class="" style="width: 100%; color: #000000; font-family: \'Tahoma\';font-size: 9pt;">' +
            '<hr style="border-top: 1px solid #000000;margin-bottom: 2px">' +
            '<table style="width: 100%;">' +
            '<tr>' +
            '<td style="width:20px;background: #BEBFC1">' + '</td>' +
            '<td style="padding-left: 6px;">' + siswa.nama + ' | ' + siswa.nama_kelas + ' | ' + siswa.nis + ' | ' + handleNull(siswa.nisn) + '</td>' +
            '<td class="hal" style="text-align: end;"></td>' +
            '</tr>' +
            '</table>' +
            '</div></div>';

        return tableNilai;
    }

    function preview(idSiswa) {
        if (raporSetting == null) {
            $('#empty').html('<b>Rapor belum diatur oleh admin</b>');
            return;
        } else {
            if (raporSetting.kkm_tunggal == "0" && kkm.length == 0) {
                $('#empty').html('<b>KKM belum diatur</b>');
                return;
            }
        }
        //var siswa = null;
        for (let i = 0; i < arrSiswa.length; i++) {
            if (arrSiswa[i].id_siswa == idSiswa) {
                siswaSelected = arrSiswa[i];
            }
        }

        posAlpha = 0;
        if (raporSetting == null) {
            $('#empty').html('<div class="text-center">Tidak ada arsip rapor untuk<br><b>' +
                siswaSelected.nama.toUpperCase() + '</b><br>Tahun Pelajaran ' + tp.tahun + ' Semester ' + smt.nama_smt + '</div>');
            return;
        }

        $('#loading').removeClass('d-none');

        $('#nama-siswa').html('<b>' + siswaSelected.nama.toUpperCase() + '</b>');
        $('#nis-siswa').html(handleNisn(siswaSelected.nis, siswaSelected.nisn));

        //INFO SEKOLAH
        $('#print-info').html(createPageInfo());

        //IDENTITAS SISWA
        console.log('SISWA', siswaSelected);
        $('#print-data').html(createPageIdentitas(siswaSelected));

        //SIKAP
        $('#print-sikap').html(createPageSikap(idSiswa, siswaSelected));

        //NILAI
        $('#print-nilai').html(createPagePengetahuan(idSiswa, siswaSelected));

        //DESKRIPSI
        $('#print-deskripsi1').html(createPageKeterampilan(idSiswa, siswaSelected));

        $('#print-deskripsi2').html(createPageekstra(idSiswa, siswaSelected));

        $(`.avatar`).each(function () {
            $(this).on("error", function () {
                var src = $(this).attr('src').replace('profiles', 'foto_siswa');
                $(this).attr("src", src);
                $(this).on("error", function () {
                    $(this).attr("src", base_url + "/assets/app/img/bg_frame.jpg");
                });
            });
        });

        setTimeout(function () {
            $('#loading').addClass('d-none');
            $('#empty').addClass('d-none');
            $('#print-sampul').removeClass('d-none');
            $('#print-info').removeClass('d-none');
            $('#print-data').removeClass('d-none');
            $('#print-sikap').removeClass('d-none');
            $('#print-nilai').removeClass('d-none');
            $('#print-deskripsi1').removeClass('d-none');
            $('#print-deskripsi2').removeClass('d-none');
            $('.btn').removeAttr('disabled');
            $('#page-start').removeAttr('disabled');

            buatHalaman();
        }, 500);
    }

    function cetakSampul() {
        $('#print-sampul').print(siswaSelected.nama);
    }

    function cetakInfo() {
        $('#print-info').print(siswaSelected.nama);
    }

    function cetakData() {
        $('#print-data').print(siswaSelected.nama);
    }

    function cetakRapor() {
        var div = '<div>';
        div += $('#print-sikap').html();
        div += '<div style="page-break-after: always"></div>';
        div += $('#print-nilai').html();
        div += '<div style="page-break-after: always"></div>';
        div += $('#print-deskripsi1').html();
        div += '<div style="page-break-after: always"></div>';
        div += $('#print-deskripsi2').html();
        div += '</div>';

        setTimeout(function () {
            console.log(div);
            $(div).print(siswaSelected.nama);
        }, 500);
    }

    function cetakSemua() {

        var div = '<div>';
        div += $('#print-sampul').html();
        div += '<div style="page-break-after: always"></div>';
        div += $('#print-info').html();
        div += '<div style="page-break-after: always"></div>';
        div += $('#print-data').html();
        div += '<div style="page-break-after: always"></div>';
        div += $('#print-sikap').html();
        div += '<div style="page-break-after: always"></div>';
        div += $('#print-nilai').html();
        div += '<div style="page-break-after: always"></div>';
        div += $('#print-deskripsi1').html();
        div += '<div style="page-break-after: always"></div>';
        div += $('#print-deskripsi2').html();
        div += '</div>';

        setTimeout(function () {
            $(div).print(siswaSelected.nama);
        }, 500);
    }

    function buatHalaman() {
        halamanAwal = 1;
        var tLevel = parseInt(level);
        if (setting.jenjang == '1') {
            tLevel = tLevel - 1;
        } else if (setting.jenjang == '2') {
            tLevel = tLevel - 7;
        } else if (setting.jenjang == '3') {
            tLevel = tLevel - 10;
        }

        if (smt.smt == 'Genap') {
            halamanAwal += (perTp * tLevel) + perSmt;
        } else {
            halamanAwal += perTp * tLevel;
        }

        $('#page-start').val(halamanAwal).trigger('change');
    }

    function editNilai() {
        window.location.href = base_url + "bukurapor/editnilairapor?siswa=" + siswaSelected.id_siswa +
            '&tp=' + thnSelected +
            '&smt=' + smtSelected +
            "&mode=1";
    }

    $(document).ready(function () {
        var opsiTahun = $('#id-tahun');
        var tslctd = thnSelected == '' ? "selected='selected'" : "";
        opsiTahun.prepend("<option value='0' " + tslctd + " disabled='disabled'>Pilih Tahun Pelajaran</option>");
        opsiTahun.change(function () {
            getDataKelas($(this).val(), opsiSmt.val());
        });

        var opsiSmt = $('#id-smt');
        var sslctd = smtSelected == '' ? "selected='selected'" : "";
        opsiSmt.prepend("<option value='0' " + sslctd + " disabled='disabled'>Pilih Semester</option>");
        opsiSmt.change(function () {
            getDataKelas(opsiTahun.val(), $(this).val());
        });

        var opsiKelas = $('#id-kelas');
        console.log(klsSelected);
        var kslctd = klsSelected == '' ? "selected='selected'" : "";
        opsiKelas.prepend("<option value='0' " + kslctd + " disabled='disabled'>Pilih Kelas</option>");
        opsiKelas.change(function () {
            getDataSiswa(opsiTahun.val(), opsiSmt.val(), $(this).val());
        });

        function getDataSiswa(tahun, smt, kelas) {
            console.log(tahun, smt, kelas);
            if (tahun != null && smt != null) {
                window.location.href = base_url + 'bukurapor?tp=' + tahun + '&smt=' + smt + '&kls=' + kelas;
            }
        }

        function getDataKelas(tahun, smt) {
            if (tahun != null && smt != null) {
                console.log('jabatan', isAdmin == '1' ? 'admin' : jabatanGuru[tahun][smt]);
                var idKelas = isAdmin == '1' ? '' : '&kls=' + jabatanGuru[tahun][smt];
                var url = base_url + "bukurapor/getdatakelas?tp=" + tahun + "&smt=" + smt + idKelas;
                //console.log('url', url);
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (data) {
                        console.log("result", data);
                        jabatanGuru = data.jabatan;
                        console.log('jabatan', isAdmin == '1' ? 'admin' : jabatanGuru[tahun][smt]);
                        var opts = '<option value="0" selected="selected" disabled="disabled">Pilih Kelas</option>';
                        $.each(data.kelas, function (i, v) {
                            opts += '<option value="' + i + '">' + v + '</option>';
                        });
                        opsiKelas.html(opts);
                    }, error: function (xhr, status, error) {
                        console.log("error", xhr.responseText);
                        showDangerToast('ERROR');
                    }
                });
            }
        }

        $('#page-start').on('change keyup', function () {
            var n = 0;
            halamanAwal = parseInt($(this).val());
            $.each($('.hal'), function () {
                $(this).text((halamanAwal + n));
                n++;
            })
        });

        $('.siswa').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.siswa').removeClass('active');
            $(this).toggleClass('active');
        })
    })
</script>
