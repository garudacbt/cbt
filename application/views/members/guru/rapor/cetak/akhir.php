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
                                <?php
                                $n = 1;
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
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="card-title">
                                <h6>Preview</h6>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm" onclick="perbesar()" disabled>
                                    <i class="fa fa-search-plus mr-1"></i>Perbesar
                                </button>
                                <button class="btn btn-primary btn-sm" onclick="perkecil()" disabled>
                                    <i class="fa fa-search-minus mr-1"></i>Perkecil
                                </button>
                            </div>
                        </div>
                        <div class="card-body bg-gray-light p-1">
                            <div class="row mb-3 ml-1">
                                <button id="cetak-sampul" class="btn btn-primary btn-sm ml-1" onclick="cetakSampul()"
                                        disabled>
                                    <i class="fa fa-print mr-1"></i>Sampul
                                </button>
                                <button id="cetak-info" class="btn btn-primary btn-sm ml-1" onclick="cetakInfo()"
                                        disabled>
                                    <i class="fa fa-print mr-1"></i>Info
                                </button>
                                <button id="cetak-data" class="btn btn-primary btn-sm ml-1" onclick="cetakData()"
                                        disabled>
                                    <i class="fa fa-print mr-1"></i>Data Siswa
                                </button>
                                <button id="cetak-nilai" class="btn btn-primary btn-sm ml-1" onclick="cetakRapor()"
                                        disabled>
                                    <i class="fa fa-print mr-1"></i>Nilai
                                </button>
                                <button id="cetak-semua" class="btn btn-primary btn-sm ml-1" onclick="cetakSemua()"
                                        disabled>
                                    <i class="fa fa-print mr-1"></i>Semua Halaman
                                </button>
                            </div>
                            <div class="d-flex justify-content-center bg-gray-light" style="min-height: 300mm">
                                <div id="zoom" style="transform: scale(0.9); transform-origin: top center">
                                    <div id="print-preview">
                                        <div id="empty"
                                             style="display: flex;-webkit-justify-content: center;justify-content: center;width: 210mm; min-height: 297mm;padding: 10mm">
                                            Silahkan pilih siswa
                                        </div>
                                        <div id="print-sampul" class="border my-shadow mb-3 d-none"
                                             style="display: flex;-webkit-justify-content: center;justify-content: center;background: white;width: 210mm; min-height: 297mm;padding: 10mm">
                                            <div style="margin-top: 80px;text-align: center">
                                                <div class="image">
                                                    <img src="<?= base_url('assets/img/garuda_bw.png') ?>"
                                                         style="width: 80px;">
                                                </div>
                                                <br>
                                                <div class="judul"
                                                     style="text-align: center;font-family: 'Arial';font-size: 20pt;font-weight: bold">
                                                    <p style="margin-bottom: 0">RAPOR</p>
                                                    <p style="margin-bottom: 0">MADRASAH TSANAWIYAH (MTS)</p>
                                                    <p style="margin-bottom: 0"><?= $setting->sekolah ?></p>
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
                                                    <p>KEMENTRIAN AGAMA</p>
                                                    <p>REPUBLIK INDONESIA</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="print-info" class="border my-shadow mb-3 d-none"
                                             style="background: white;width: 210mm; min-height: 297mm;padding: 10mm">
                                        </div>
                                        <div id="print-data" class="border my-shadow mb-3 d-none"
                                             style="background: white;width: 210mm; min-height: 297mm;padding: 10mm">
                                        </div>
                                        <div id="print-sikap" class="border my-shadow mb-3 d-none"
                                             style="background: white;width: 210mm; min-height: 297mm;padding: 10mm">
                                        </div>
                                        <div id="print-nilai" class="border my-shadow mb-3 d-none"
                                             style="background: white;width: 210mm; min-height: 297mm;padding: 10mm">
                                        </div>
                                        <div id="print-deskripsi1" class="border my-shadow mb-3 d-none"
                                             style="background: white;width: 210mm; min-height: 297mm;padding: 10mm">
                                        </div>
                                        <div id="print-deskripsi2" class="border my-shadow mb-3 d-none"
                                             style="background: white;width: 210mm; min-height: 297mm;padding: 10mm">
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
    var kelas = '<?= $kelas ?>';
    var level = '<?= $lvl_kelas ?>';
    var guru = JSON.parse(JSON.stringify(<?= json_encode($guru)?>));
    var arrSiswa = JSON.parse(JSON.stringify(<?= json_encode($siswas)?>));
    var arrMapel = JSON.parse(JSON.stringify(<?= json_encode($mapels)?>));
    var arrekstra = JSON.parse(JSON.stringify(<?= json_encode($mapel_ekstra)?>));
    var sikap = JSON.parse(JSON.stringify(<?= json_encode($sikap)?>));
    var nilai = JSON.parse(JSON.stringify(<?= json_encode($nilai)?>));
    var nilaiRapor = JSON.parse(JSON.stringify(<?= json_encode($nilai_rapor)?>));
    var deskripsi = JSON.parse(JSON.stringify(<?= json_encode($deskripsi)?>));
    var absensi = JSON.parse(JSON.stringify(<?= json_encode($absensi)?>));
    var fisik = JSON.parse(JSON.stringify(<?= json_encode($fisik)?>));
    var ekstra = JSON.parse(JSON.stringify(<?= json_encode($nilai_ekstra)?>));
    var naik = JSON.parse(JSON.stringify(<?= json_encode($naik)?>));
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

    //var isi = kkm[1] != null ? parseInt(kkm[1].kkm) : 0;
    var isi = adaKkm > 0 ? jmlKkmMapel / adaKkm : 70;
    var pre_d = 1;
    var pre_dsd = isi - 1;
    var pre_c = isi;
    var pre_csd = Math.floor(isi + (100 - isi) / 3);
    var pre_b = pre_csd + 1;
    var pre_bsd = Math.floor(pre_b + (100 - pre_b) / 2);
    var pre_a = pre_bsd + 1;
    var pre_asd = 100;

    var z = 0.9;

    function perbesar() {
        var prev = $('#zoom');
        var scala = prev.css('transform');
        console.log(z);
        if (z < 1) {
            z += 0.1;
            prev.css('transform', 'scale(' + z + ')');
        }
        //cell.style.fontSize = 'small';
    }

    function perkecil() {
        var prev = $('#zoom');
        console.log(z);
        //if (z === 10)
        if (z > 0.2) {
            z -= 0.1;
            prev.css({'transform': 'scale(' + z + ')', 'transform-origin': 'top center'});
        }
        //cell.style.fontSize = 'small';
    }

    function inRange(n, start, end) {
        return n >= start && n <= end;
    }

    function handleNull(value) {
        if (value == null || value == '0') return '-'
        else return value;
    }

    function handleAlamat(almt, rt, rw, kelurahan, kecamatan, kabupaten, provinsi) {
        var alamat = '';
        alamat += handleNull(almt);
        alamat += ' RT/RW: ' + handleNull(rt) + '/' + handleNull(rw);
        alamat += ' Desa/Kel. ' + handleNull(kelurahan);
        alamat += ' Kec. ' + handleNull(kecamatan);
        alamat += ' Kota/Kab. ' + handleNull(kabupaten);
        alamat += ' ' + handleNull(provinsi);

        return alamat;
    }

    function handlePredikat(pred) {
        if (pred == 'A') return 'Sangat Baik';
        else if (pred == 'B') return 'Baik';
        else if (pred == 'C') return 'Cukup';
        else if (pred == 'D') return 'Kurang';
        else return '';
    }

    function ellipsisText(text) {
        //text = 'Menyusun, menanggapi, menyajikan teks pidato sesuai kaidah, Menelaah, menanggapi, ' +
        //    'menyajikan teks berita ilmu pengetahuan, teknologi dan seni, Menelaah, menanggapi, membicarakan ' +
        //    'karangan argumentasi sesuai kaidah, Menelaah, menanggapi dan memparafasekan isi teks guritan';
        /*
        var limit = 135;
        var len = text.length;
        if (len >= limit) {
            text = text.substring(0, limit) + '...';
        }
        return text;
        */
        if (text == null) {
            return '';
        } else {
            var splitted = text.split(',');
            if (splitted.length > 2) return splitted[0] + ',' + splitted[1];
            else return text;
        }
    }

    function createPageInfo() {
        var arrInfoTitle = [
            'Nama Madrasah', 'NPSN', 'NIS/NSS/NDS', 'Alamat',
            'Kelurahan/Desa', 'Kecamatan', 'Kota/Kabupaten', 'Provinsi',
            'Kode Pos', 'No. Telepon', 'Faksimili', 'Websita', 'Email'];
        var arrInfoVal = [
            handleNull(setting.sekolah), handleNull(setting.npsn), handleNull(setting.nss), handleNull(setting.alamat),
            handleNull(setting.desa), handleNull(setting.kecamatan), handleNull(setting.kota), handleNull(setting.provinsi),
            handleNull(setting.kode_pos), handleNull(setting.telp), handleNull(setting.fax), handleNull(setting.web),
            handleNull(setting.email)];

        var infoSekolah = '<div style="padding: 0.5cm; margin-top: 100px">' +
            '    <div class="judul" style="text-align: center;font-family: \'Arial\';font-size: 20pt;font-weight: bold">' +
            '        <p style="margin-bottom: 0">RAPOR</p>' +
            '        <p style="margin-bottom: 0">MADRASAH TSANAWIYAH</p>' +
            '        <p style="margin-bottom: 0">(MTS)</p>' +
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

        return infoSekolah;
    }

    function createPageIdentitas(siswa) {
        var arrIdNo = [
            '1.', '2.', '3.', '4.', '5.', '6.', '7.', '8.', '9.', '10.', '11.', '', '', '12.',
            '', '', '', '', '', '', '', '', '13.', '', '', '', '',];
        var arrIdTitle = [
            'Nama Lengkap Peserta Didik', 'NIS / NISN', 'Tempat Tanggal Lahir', 'Jenis Kelamin', 'Agama',
            'Status dalam Keluarga', 'Anak ke', 'Alamat Peserta Didik', 'Nomor Telepon Rumah', 'Madrasah Asal',
            'Diterima di Madrasah ini', 'a. Di kelas', 'b. Pada tanggal', 'Orang Tua', 'a. Nama Ayah',
            'b. Pekerjaan', 'c. Nomor Telepon/HP', 'd. Alamat', 'e. Nama Ibu', 'f. Pekerjaan', 'g. Nomor Telepon/HP',
            'h. Alamat', 'Wali', 'a. Nama Wali', 'b. Pekerjaan', 'c. Nomor Telpon/HP', 'd. Alamat'];
        var arrIdVal = [
            handleNull(siswa.nama), handleNull(siswa.nis) + ' / ' + handleNull(siswa.nisn),
            handleNull(siswa.tempat_lahir) + ', ' + handleNull(siswa.tanggal_lahir), handleNull(siswa.jenis_kelamin),
            handleNull(siswa.agama), handleNull(siswa.status_keluarga), handleNull(siswa.anak_ke),
            handleAlamat(siswa.alamat, siswa.rt, siswa.rw, siswa.kelurahan, siswa.kecamatan, siswa.kabupaten, siswa.provinsi),
            handleNull(siswa.hp), handleNull(siswa.sekolah_asal), '', handleNull(siswa.kelas_awal), handleNull(siswa.tahun_masuk),
            '', handleNull(siswa.nama_ayah), handleNull(siswa.pekerjaan_ayah), handleNull(siswa.nohp_ayah), handleNull(siswa.alamat_syah),
            handleNull(siswa.nama_ibu), handleNull(siswa.pekerjaan_ibu), handleNull(siswa.nohp_ibu), handleNull(siswa.alamat_ibu),
            '', handleNull(siswa.nama_wali), handleNull(siswa.pekerjaan_wali), handleNull(siswa.nohp_wali), handleNull(siswa.alamat_wali),
        ];
        var identitas = '<div style="padding: 0.5cm; margin-top: 0">' +
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
        return identitas;
    }

    function createPageSikap(idSiswa, siswa) {
        var tableSikap = '<div style="padding: 0.5cm;">' +
            '    <p style="font-family: \'Tahoma\';text-align: center;font-size: 14pt;"><b>PENCAPAIAN KOMPETENSI PESERTA DIDIK</b></p>' +
            '    <hr>' +
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
            '<hr>' +
            '<br>' +
            '<br>' +
            '    <span style="font-family: \'Tahoma\';font-size: 12pt;"><b>A. SIKAP</b></span>' +
            '<br>' +
            '<br>' +
            '    <span style="font-family: \'Tahoma\';font-size: 12pt;"><b>1. Sikap Spiritual</b></span>' +
            '    <div style="display: flex;-webkit-justify-content: center;justify-content: center;margin-top: 4px;font-family: \'Tahoma\';font-size: 12pt;">' +
            '        <table style="width: 100%; border: 2px solid black; border-collapse: collapse">'+
            '<tr style="font-family: \'Tahoma\';font-size: 10pt;text-align: center">' +
            '    <td style="width: 20%;height:30px;border: 1px solid black; border-collapse: collapse;background: #E6E7E9"><b>Predikat</b></td>' +
            '    <td style="width:80%;border: 1px solid black; border-collapse: collapse;background: #E6E7E9"><b>Deskripsi</b></td>' +
            '</tr>' +
            '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '    <td style="width: 30%;height:200px;border: 1px solid black; border-collapse: collapse;text-align: center"><b>'+
            handlePredikat(sikap[idSiswa][1].predikat.predikat) +
            '</b></td>' +
            '    <td style="width:70%;border: 1px solid black; border-collapse: collapse;padding: 6px">' +
            sikap[idSiswa][1].deskripsi +
            '</td>' +
            '</tr>' +
            '</table></div>'+
            '<br>' +
            '<br>' +
            '    <span style="font-family: \'Tahoma\';font-size: 12pt;"><b>2. Sikap Sosial</b></span>' +
            '    <div style="display: flex;-webkit-justify-content: center;justify-content: center;margin-top: 4px;font-family: \'Tahoma\';font-size: 12pt;">' +
            '        <table style="width: 100%; border: 2px solid black; border-collapse: collapse">'+
            '<tr style="font-family: \'Tahoma\';font-size: 10pt;text-align: center">' +
            '    <td style="width: 20%;height:30px;border: 1px solid black; border-collapse: collapse;background: #E6E7E9"><b>Predikat</b></td>' +
            '    <td style="width:80%;border: 1px solid black; border-collapse: collapse;background: #E6E7E9"><b>Deskripsi</b></td>' +
            '</tr>' +
            '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '    <td style="width: 30%;height:200px;border: 1px solid black; border-collapse: collapse;text-align: center"><b>' +
            handlePredikat(sikap[idSiswa][2].predikat.predikat) +
            '</b></td>' +
            '    <td style="width:70%;border: 1px solid black; border-collapse: collapse;padding: 6px;vertical-align: center">' +
            sikap[idSiswa][2].deskripsi +
            '</td>' +
            '</tr>' +
            '</table>' +
            '</div>'+
            '</div>';

        tableSikap += '<div class="d-none" style="width: 100%; position: fixed; bottom: 0;color: #404040;font-family: \'Tahoma\';font-size: 9pt;">' +
            '<hr style="border-top: 1px dotted #404040">' +
            '<table>' +
            '<tr>' +
            '<td style="width:20px;background: #BEBFC1">' + '</td>' +
            '<td style="padding-left: 6px;">' + siswa.nama + ' | ' + siswa.nis + ' | ' + siswa.nisn + ' | ' + setting.sekolah + '</td>' +
        '</tr>' +
        '</table>' +
        '</div>';

        return tableSikap;
    }

    function createPageNilai(idSiswa) {
        var tableNilai = '<div style="padding: 0.5cm;margin-top: 20px">' +
            '    <span style="font-family: \'Tahoma\';font-size: 12pt;"><b>B. PENGETAHUAN DAN KETERAMPILAN</b></span>' +
            '<br>' +
            '    <span style="font-family: \'Tahoma\';font-size: 12pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kreteria Ketuntasan Minimal: <b>'+isi+'</b></span>' +
            '<br>' +
            '<br>' +
            '    <table style="width: 100%;border: 2px solid black; border-collapse: collapse">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;text-align: center;background: #E6E7E9">' +
            '            <td rowspan="2" style="width:5%;border: 1px solid black; border-collapse: collapse"><b>NO</b></td>' +
            '            <td rowspan="2" style="width:45%;border: 1px solid black; border-collapse: collapse"><b>Mata Pelajaran</b></td>' +
            '            <td colspan="2" style="width:25%;height:35px;border: 1px solid black; border-collapse: collapse"><b>Pengetahuan</b></td>' +
            '            <td colspan="2" style="width:25%;border: 1px solid black; border-collapse: collapse"><b>Keterampilan</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;text-align: center;background: #E6E7E9">' +
            '            <td style="width:10%;height:35px;border: 1px solid black; border-collapse: collapse"><b>Nilai</b></td>' +
            '            <td style="width:15%;border: 1px solid black; border-collapse: collapse"><b>Predikat</b></td>' +
            '            <td style="width:10%;border: 1px solid black; border-collapse: collapse"><b>Nilai</b></td>' +
            '            <td style="width:15%;border: 1px solid black; border-collapse: collapse"><b>Predikat</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '            <td colspan="6" style="border: 1px solid black; border-collapse: collapse; padding: 8px"><b>Kelompok A (Umum)</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '            <td rowspan="5" style="border: 1px solid black; border-collapse: collapse; text-align: center; vertical-align: top; padding: 6px">1</td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse; vertical-align: top; padding: 6px">' +
            '                Pendidikan Agama Islam' +
            '            </td>';
        for (let i = 0; i < 4; i++) {
            tableNilai += '<td style="border: 1px solid black; border-collapse: collapse"></td>';
        }
        tableNilai += '</tr>';

        var no = 2;
        var abjad = ['a', 'b', 'c', 'd'];
        var pos = 0;

        $.each(arrMapel, function (k, mapel) {
            var pnilai = nilai[idSiswa][mapel.id_mapel].nilai == '0' ? '' : nilai[idSiswa][mapel.id_mapel].nilai;
            var ppred = nilai[idSiswa][mapel.id_mapel].predikat == '0' ? '' : nilai[idSiswa][mapel.id_mapel].predikat;
            var knilai = nilai[idSiswa][mapel.id_mapel].k_rata_rata == '0' ? '' : nilai[idSiswa][mapel.id_mapel].k_rata_rata;
            var kpred = nilai[idSiswa][mapel.id_mapel].k_predikat == '0' ? '' : nilai[idSiswa][mapel.id_mapel].k_predikat;
            if (mapel.urutan == '1') {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 6px">' + abjad[pos] + '. ' + mapel.nama_mapel + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + pnilai + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + ppred + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + knilai + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + kpred + '</td>' +
                    '</tr>';
                pos++;
            } else if (mapel.urutan == '2') {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + no + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 6px">' + mapel.nama_mapel + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + pnilai + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + ppred + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + knilai + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + kpred + '</td>' +
                    '</tr>';
                no++;
            }
        });

        tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '<td colspan="6" style="border: 1px solid black; border-collapse: collapse; padding: 8px"><b>Kelompok B (Umum)</b></td>' +
            '</tr>';

        $.each(arrMapel, function (k, mapel) {
            var pnilai = nilai[idSiswa][mapel.id_mapel].nilai == '0' ? '' : nilai[idSiswa][mapel.id_mapel].nilai;
            var ppred = nilai[idSiswa][mapel.id_mapel].predikat == '0' ? '' : nilai[idSiswa][mapel.id_mapel].predikat;
            var knilai = nilai[idSiswa][mapel.id_mapel].k_rata_rata == '0' ? '' : nilai[idSiswa][mapel.id_mapel].k_rata_rata;
            var kpred = nilai[idSiswa][mapel.id_mapel].k_predikat == '0' ? '' : nilai[idSiswa][mapel.id_mapel].k_predikat;
            if (mapel.urutan == '3') {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + no + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 6px">' + mapel.nama_mapel + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + pnilai + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + ppred + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + knilai + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + kpred + '</td>' +
                    '</tr>';
                no++;
            }
        });

        var totalMulok = 0;
        $.each(arrMapel, function (k, mapel) {
            if (mapel.kelompok == 'MULOK') {
                totalMulok += 1;
            }
        });

        if (totalMulok > 0) {
            tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                '<td rowspan="2" style="border: 1px solid black; border-collapse: collapse; text-align: center; vertical-align: top;padding: 6px">' + no + '</td>' +
                '<td colspan="5" style="border: 1px solid black; border-collapse: collapse; vertical-align: top; padding: 6px"><b>Muatan Lokal *)</b></td>' +
                '</tr>';

            $.each(arrMapel, function (k, mapel) {
                var pnilai = nilai[idSiswa][mapel.id_mapel].nilai == '0' ? '' : nilai[idSiswa][mapel.id_mapel].nilai;
                var ppred = nilai[idSiswa][mapel.id_mapel].predikat == '0' ? '' : nilai[idSiswa][mapel.id_mapel].predikat;
                var knilai = nilai[idSiswa][mapel.id_mapel].k_rata_rata == '0' ? '' : nilai[idSiswa][mapel.id_mapel].k_rata_rata;
                var kpred = nilai[idSiswa][mapel.id_mapel].k_predikat == '0' ? '' : nilai[idSiswa][mapel.id_mapel].k_predikat;
                if (mapel.kelompok == 'MULOK') {
                    tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                        '<td style="border: 1px solid black; border-collapse: collapse; padding: 6px">' + mapel.nama_mapel + '</td>' +
                        '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + pnilai + '</td>' +
                        '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + ppred + '</td>' +
                        '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + knilai + '</td>' +
                        '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + kpred + '</td>' +
                        '</tr>';
                }
            });
        }

        tableNilai += '</table>' +
            '<br>' +
            '<br>' +
            '<span style="font-family: \'Tahoma\';font-size: 12pt">Table Interval Predikat Berdasarkan KKM</span>' +
            '<table id="table-kkm-print" style="width: 100%;border: 2px solid black; border-collapse: collapse;margin-top: 6px">' +
            '    <tr style="font-family: \'Tahoma\';font-size: 10pt;background: #E6E7E9">' +
            '        <td rowspan="2" style="width: 20%;border: 1px solid black; border-collapse: collapse; text-align: center; padding: 6px"><b>KKM</b></td>' +
            '        <td colspan="4" style="width:80%;border: 1px solid black; border-collapse: collapse; text-align: center; padding: 6px"><b>PREDIKAT</b></td>' +
            '    </tr>' +
            '    <tr style="font-family: \'Tahoma\';font-size: 10pt;background: #E6E7E9">' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 6px"><b>D (kurang)</b></td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 6px"><b>C (cukup)</b></td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 6px"><b>B (baik)</b></td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 6px"><b>A (sangat baik)</b></td>' +
            '    </tr>' +
            '    <tr style="font-family: \'Tahoma\';font-size: 10pt;vertical-align: top">' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 6px"><b>' + isi + '</b></td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 6px">< ' + isi + '</td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 6px">' + pre_c + ' ~ ' + pre_csd + '</td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 6px">' + pre_b + ' ~ ' + pre_bsd + '</td>' +
            '        <td style="border: 1px solid black; border-collapse: collapse; text-align: center; padding: 6px">' + pre_a + ' ~ ' + pre_asd + '</td>' +
            '    </tr>' +
            '</table>' +
            '</div>';

        return tableNilai;
    }

    function createPageDeskripsi(idSiswa) {
        var tableNilai = '<div style="padding: 0.5cm;margin-top: 20px">' +
            '    <span style="font-family: \'Tahoma\';font-size: 12pt;"><b>C. DESKRIPSI PENGETAHUAN DAN KETERAMPILAN</b></span>' +
            '<br>' +
            '    <table id="table-nilai-print" style="width: 100%;border: 2px solid black; border-collapse: collapse;margin-top: 6px;">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;text-align: center;background: #E6E7E9">' +
            '            <td style="width:5%;height:35px;border: 1px solid black; border-collapse: collapse"><b>NO</b></td>' +
            '            <td style="width:20%;border: 1px solid black; border-collapse: collapse"><b>Mata Pelajaran</b></td>' +
            '            <td style="width:37%;height:35px;border: 1px solid black; border-collapse: collapse"><b>Pengetahuan</b></td>' +
            '            <td style="width:38%;border: 1px solid black; border-collapse: collapse"><b>Keterampilan</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '            <td colspan="4" style="border: 1px solid black; border-collapse: collapse; padding: 6px"><b>Kelompok A (Umum)</b></td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '            <td rowspan="5" style="border: 1px solid black; border-collapse: collapse; text-align: center; vertical-align: top; padding: 4px">1</td>' +
            '            <td colspan="3" style="border: 1px solid black; border-collapse: collapse; vertical-align: top; padding: 4px">' +
            '                Pendidikan Agama Islam' +
            '            </td>'
            +'</tr>';

        var no = 2;
        var abjad = ['a', 'b', 'c', 'd'];
        var pos = 0;

        $.each(arrMapel, function (k, mapel) {
            var pdesk = nilai[idSiswa][mapel.id_mapel].p_deskripsi;
            var kdesk = nilai[idSiswa][mapel.id_mapel].k_deskripsi;
            if (mapel.urutan == '1') {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 4px">' + abjad[pos] + '. ' + mapel.nama_mapel + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 4px;font-size: 8pt;line-height: 1.3;text-align: justify">' +
                    ellipsisText(pdesk) +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 4px;font-size: 8pt;line-height: 1.3;text-align: justify">' +
                    ellipsisText(kdesk) +
                    '</td>' +
                    '</tr>';
                pos++;
            } else if (mapel.urutan == '2') {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;padding: 4px">' + no + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 4px">' + mapel.nama_mapel + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 4px;font-size: 8pt;line-height: 1.3;text-align: justify">' +
                    ellipsisText(pdesk) +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 4px;font-size: 8pt;line-height: 1.3;text-align: justify">' +
                    ellipsisText(kdesk) +
                    '</td>' +
                    '</tr>';
                no++;
            }
        });

        tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '<td colspan="4" style="border: 1px solid black; border-collapse: collapse; padding: 6px"><b>Kelompok B (Umum)</b></td>' +
            '</tr>';

        $.each(arrMapel, function (k, mapel) {
            var pdesk = nilai[idSiswa][mapel.id_mapel].p_deskripsi;
            var kdesk = nilai[idSiswa][mapel.id_mapel].k_deskripsi;
            if (mapel.urutan == '3') {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">' + no + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 4px">' + mapel.nama_mapel + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 4px;font-size: 8pt;line-height: 1.3;text-align: justify">' +
                    ellipsisText(pdesk) +
                    '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding: 4px;font-size: 8pt;line-height: 1.3;text-align: justify">' +
                    ellipsisText(kdesk) +
                    '</td>' +
                    '</tr>';
                no++;
            }
        });
        var totalMulok = 0;
        $.each(arrMapel, function (k, mapel) {
            if (mapel.kelompok == 'MULOK') {
                totalMulok += 1;
            }
        });

        if (totalMulok > 0) {
            tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                '<td rowspan="2" style="border: 1px solid black; border-collapse: collapse; text-align: center; vertical-align: top;padding: 4px">' + no + '</td>' +
                '<td colspan="3" style="border: 1px solid black; border-collapse: collapse; vertical-align: top; padding: 4px"><b>Muatan Lokal *)</b></td>' +
                '</tr>';

            $.each(arrMapel, function (k, mapel) {
                var pdesk = nilai[idSiswa][mapel.id_mapel].p_deskripsi;
                var kdesk = nilai[idSiswa][mapel.id_mapel].k_deskripsi;
                if (mapel.kelompok == 'MULOK') {
                    tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                        '<td style="border: 1px solid black; border-collapse: collapse; padding: 4px">' + mapel.nama_mapel + '</td>' +
                        '<td style="border: 1px solid black; border-collapse: collapse; padding: 4px;font-size: 8pt;line-height: 1.3;text-align: justify">' +
                        ellipsisText(pdesk) +
                        '</td>' +
                        '<td style="border: 1px solid black; border-collapse: collapse; padding: 4px;font-size: 8pt;line-height: 1.3;text-align: justify">' +
                        ellipsisText(kdesk) +
                        '</td>' +
                        '</tr>';
                }
            });
        }

        tableNilai += '</table></div>';

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
                text = naikStrike1 + 'naik ke kelas   II  ( dua  )'+ naikStrike2 +'<br>' +
                    tnaikStrike1 + 'tinggal di kelas  I ( satu  )'+ tnaikStrike2 +'<br>';
                break;
            case '2':
                text = naikStrike1 + 'naik ke kelas   III  ( dua  )'+ naikStrike2 +'<br>' +
                    tnaikStrike1 + 'tinggal di kelas  II ( satu  )'+ tnaikStrike2 +'<br>';
                break;
            case '3':
                text = naikStrike1 + 'naik ke kelas   IV  ( dua  )'+ naikStrike2 +'<br>' +
                    tnaikStrike1 + 'tinggal di kelas  III ( satu  )'+ tnaikStrike2 +'<br>';
                break;
            case '4':
                text = naikStrike1 + 'naik ke kelas  V  ( dua  )'+ naikStrike2 +'<br>' +
                    tnaikStrike1 + 'tinggal di kelas  IV ( satu  )'+ tnaikStrike2 +'<br>';
                break;
            case '5':
                text = naikStrike1 + 'naik ke kelas   VI  ( dua  )'+ naikStrike2 +'<br>' +
                    tnaikStrike1 + 'tinggal di kelas  V ( satu  )'+ tnaikStrike2 +'<br>';
                break;
            case '6':
                text = naikStrike1 + 'Lulus'+ naikStrike2 +' / '+ tnaikStrike1 + 'Tidak Lulus'+ tnaikStrike2 +'<br>';
                break;
            case '7':
                text = naikStrike1 + 'naik ke kelas   VIII  ( dua  )'+ naikStrike2 +'<br>' +
                    tnaikStrike1 + 'tinggal di kelas  VII ( satu  )'+ tnaikStrike2 +'<br>';
                break;
            case '8':
                text = naikStrike1 + 'naik ke kelas   IX  ( dua  )'+ naikStrike2 +'<br>' +
                    tnaikStrike1 + 'tinggal di kelas  VIII ( satu  )'+ tnaikStrike2 +'<br>';
                break;
            case '9':
                text = naikStrike1 + 'Lulus'+ naikStrike2 +' / '+ tnaikStrike1 + 'Tidak Lulus'+ tnaikStrike2 +'<br>';
                break;
            case '10':
                text = naikStrike1 + 'naik ke kelas   XI  ( dua  )'+ naikStrike2 +'<br>' +
                    tnaikStrike1 + 'tinggal di kelas  X ( satu  )'+ tnaikStrike2 +'<br>';
                break;
            case '11':
                text = naikStrike1 + 'naik ke kelas   XII  ( dua  )'+ naikStrike2 +'<br>' +
                    tnaikStrike1 + 'tinggal di kelas  XI ( satu  )'+ tnaikStrike2 +'<br>';
                break;
            case '12':
                text = naikStrike1 + 'Lulus'+ naikStrike2 +' / '+ tnaikStrike1 + 'Tidak Lulus'+ tnaikStrike2 +'<br>';
        }

        return text;
    }
    function createPageekstra(idSiswa) {
        console.log('ekstra', ekstra);
        var tableNilai = '<div style="padding: 0.5cm;margin-top: 20px">' +
            '    <span style="font-family: \'Tahoma\';font-size: 12pt;"><b>D. EKSTRAKURIKULER</b></span>' +
            '<br>' +
            '    <table style="width: 100%;border: 2px solid black; border-collapse: collapse;margin-top: 6px">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;text-align: center;background: #E6E7E9">' +
            '            <td style="width:5%;border: 1px solid black; border-collapse: collapse"><b>NO</b></td>' +
            '            <td style="width:35%;border: 1px solid black; border-collapse: collapse"><b>Kegiatan Ekstrakurikuler</b></td>' +
            '            <td style="width:15%;height:35px;border: 1px solid black; border-collapse: collapse"><b>Nilai</b></td>' +
            '            <td style="width:45%;border: 1px solid black; border-collapse: collapse"><b>Keterangan</b></td>' +
            '        </tr>';
        var no = 1;
        $.each(arrekstra, function (k, v) {
            if (k != '') {
                var nilaiEkstra = ekstra[idSiswa][k].predikat != null ? ekstra[idSiswa][k].predikat : '';
                var nilaiDesk = ekstra[idSiswa][k].deskripsi != null ? ekstra[idSiswa][k].deskripsi : '';
                console.log('ekstra', ekstra[idSiswa][k].deskripsi);
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'+no+'</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding-left: 4px">'+v.nama_ekstra+'</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'+nilaiEkstra+'</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse; padding-left: 4px">'+nilaiDesk+'</td>' +
                    '</tr>';
                no ++;
            }
        });

        for (let i = no; i < 4; i++) {
            tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'+no+'</td>' +
                '<td style="border: 1px solid black; border-collapse: collapse;"></td>' +
                '<td style="border: 1px solid black; border-collapse: collapse;"></td>' +
                '<td style="border: 1px solid black; border-collapse: collapse;"></td>' +
                '</tr>';
            no ++;
        }
        tableNilai += '</table><br>';

        tableNilai += '<span style="font-family: \'Tahoma\';font-size: 12pt;"><b>E. PRESTASI</b></span>' +
            '<br>' +
            '    <table style="width: 100%;border: 2px solid black; border-collapse: collapse;margin-top: 6px">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;text-align: center;background: #E6E7E9">' +
            '            <td style="width:5%;height:35px;border: 1px solid black; border-collapse: collapse"><b>NO</b></td>' +
            '            <td style="width:35%;border: 1px solid black; border-collapse: collapse"><b>Jenis Kegiatan</b></td>' +
            '            <td style="width:60%;border: 1px solid black; border-collapse: collapse"><b>Deskripsi</b></td>' +
            '        </tr>';

        no = 1;
        for (let i = 0; i < 3; i++) {
            tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                '<td style="border: 1px solid black; border-collapse: collapse; text-align: center;">'+no+'</td>' +
                '<td style="border: 1px solid black; border-collapse: collapse;">' + deskripsi[idSiswa].p1 + '</td>' +
                '<td style="border: 1px solid black; border-collapse: collapse;">' + deskripsi[idSiswa].p1_desk + '</td>' +
                '</tr>';
            no ++;
        }
        tableNilai += '</table><br>';

        if (setting.jenjang == '1') {
            var sehat = ['Pendengaran', 'Penglihatan', 'Gigi', 'Lain-lain'];
            var kondisi = [fisik[idSiswa].kondisi.telinga, fisik[idSiswa].kondisi.mata, fisik[idSiswa].kondisi.gigi, fisik[idSiswa].kondisi.lain];
            tableNilai += '<span style="font-family: \'Tahoma\';font-size: 12pt;"><b>F. KONDISI KESEHATAN DAN FISIK</b></span>' +
                '<div style="display: flex">' +
                '<table style="width: 58%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">' +
                '        <tr style="font-family: \'Tahoma\';font-size: 10pt;background: #E6E7E9;text-align: center">' +
                '            <td style="border: 1px solid black; border-collapse: collapse;height:35px"><b>Aspek yang Dinilai</b></td>' +
                '            <td style="border: 1px solid black; border-collapse: collapse"><b>Keterangan</b></td>' +
                '        </tr>';

            for (let i = 0; i < sehat.length; i++) {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">' + sehat[i] + '</td>' +
                    '<td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">' + kondisi[i] + '</td>' +
                    '</tr>';
            }
            tableNilai += '</table><div style="width: 2%"></div>';

            tableNilai += '<table style="width: 40%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">' +
                '        <tr style="font-family: \'Tahoma\';font-size: 10pt;background: #E6E7E9;text-align: center">' +
                '            <td rowspan="2" style="width:40%;border: 1px solid black; border-collapse: collapse"><b>Aspek yang Dinilai</b></td>' +
                '            <td colspan="2" style="width:60%;border: 1px solid black; border-collapse: collapse"><b>Semester</b></td>' +
                '        </tr>' +
                '        <tr style="font-family: \'Tahoma\';font-size: 10pt;text-align: center;background: #E6E7E9">' +
                '            <td style="width:30%;border: 1px solid black; border-collapse: collapse"><b>1</b></td>' +
                '            <td style="width:30%;border: 1px solid black; border-collapse: collapse"><b>2</b></td>' +
                '        </tr>' +
                '<tr>';

            var tb = ['Tinggi Badan', 'Berat Badan'];
            var arrt = [fisik[idSiswa].smt1.tinggi, fisik[idSiswa].smt2.tinggi];
            var arrb = [fisik[idSiswa].smt1.berat, fisik[idSiswa].smt2.berat];
            for (let i = 0; i < tb.length; i++) {
                tableNilai += '<tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                    '<td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">' + tb[i] + '</td>';
                for (let j = 0; j < 2; j++) {
                    var tt = arrt[j] == '' ? '' : arrt[j] + ' cm';
                    var bb = arrb[j] == '' ? '' : arrb[j] + ' kg';
                    if (i === 0) tableNilai += '<td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px;text-align: center">' +
                        tt + '</td>';
                    else tableNilai += '<td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px;text-align: center">' +
                        bb + '</td>';
                }
                tableNilai += '</tr>';
            }
            tableNilai += '</table></div><br>';
        }

        tableNilai += '    <span style="font-family: \'Tahoma\';font-size: 12pt;"><b>F. CATATAN WALI KELAS</b></span>' +
            '<br>' +
            '    <table style="width: 100%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '            <td style="width:100%;border: 1px solid black; border-collapse: collapse;padding-left: 6px">' +
            'Ranking ke: ' + deskripsi[idSiswa].ranking + '. ' + deskripsi[idSiswa].rank_deskripsi +
            '<br>' + deskripsi[idSiswa].saran +
            '</td>' +
            '        </tr>' +
            '</table>';

        tableNilai += '<br>' +
        '    <span style="font-family: \'Tahoma\';font-size: 12pt;"><b>G. TANGGAPAN ORANG TUA/WALI</b></span>' +
        '<table style="width: 100%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">' +
        '<tr>' +
        '    <td style="width:100%;height: 60px;border: 1px solid black; border-collapse: collapse"></td>' +
        '</tr>' +
        '</table>';

        tableNilai += '<br>' +
            '<span style="font-family: \'Tahoma\';font-size: 12pt;"><b>H. KETIDAKHADIRAN</b></span>' +
            '<div style="display: flex; align-items: flex-start;">' +
            '    <table style="width: 45%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '            <td style="width:70%;border: 1px solid black; border-collapse: collapse;padding-left: 6px">Sakit</td>' +
            '            <td style="width:30%;border: 1px solid black; border-collapse: collapse;padding-left: 6px">'+
            absensi[idSiswa].s +' hari' +
            '</td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">Izin</td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">' +
            absensi[idSiswa].i +' hari' +
            '</td>' +
            '        </tr>' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">Tanpa Keterangan</td>' +
            '            <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">' +
            absensi[idSiswa].a +' hari' +
            '</td>' +
            '        </tr>' +
            '</table>' +
            '<div style="width:7%"></div>';

        if (smt == 'Genap') {
            var naikKe = parseInt(level)+1;
            var txtNaik = buatTeksKenaikan(naik[idSiswa]);
            tableNilai += '<table style="width: 48%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">' +
                '        <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
                '            <td style="width:100%;height: 55px;border: 1px solid black; border-collapse: collapse; padding-left: 6px">' +
                '<b>Keputusan:</b><br>' +
                'Berdasarkan pencapaian kompetensi pada semester ke-1 dan ke-2, peserta didik ditetapkan *)<br>' +
                    txtNaik +
                '<small>*) Coret yang tidak perlu.</small>' +
                '</td>' +
                '        </tr>' +
                '</table>';
        } else {
            tableNilai += '<div style="width:48%"></div>';
        }
        tableNilai += '</div>';

        tableNilai += '    <br>' +
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
            '    <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>' +
            '</td>' +
            '<td style="width: 30%;"></td>' +
            '<td style="width: 35%">' +
            setting.kota + ',  ' + raporSetting.tgl_rapor_pts +
            '    <br>' +
            'Wali Kelas' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <u>' + guru.nama_guru + '</u>' +
            '    <br>' +
            '    Nip:' +
            '</td>' +
            '</tr>' +
            '</table>' +
            '    <br>' +
            '    <br>' +
            '<div style="display: flex;-webkit-justify-content: center;justify-content: center;">' +
            '    <table style="width: 500px;border: 0;">' +
            '        <tr style="font-family: \'Tahoma\';font-size: 10pt;">' +
            '            <td style=" padding: 4px 4px 4px 180px">Mengetahui,' +
            '    <br>' +
            '    Kepala Madrasah' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <br>' +
            '    <u>' + setting.kepsek + '</u>' +
            '    <br>' +
            '    Nip:' +
            '</td>' +
            '        </tr>' +
            '    </table>' +
            '</div>' +
            '</div>';

        return tableNilai;
    }

    function preview(idSiswa) {
        var siswa = null;
        for (let i = 0; i < arrSiswa.length; i++) {
            if (arrSiswa[i].id_siswa == idSiswa) {
                siswa = arrSiswa[i];
            }
        }

        $('#loading').removeClass('d-none');

        $('#nama-siswa').html('<b>' + siswa.nama + '</b>');
        $('#nis-siswa').html(siswa.nis + ' / ' + siswa.nisn);

        //INFO SEKOLAH
        $('#print-info').html(createPageInfo());

        //IDENTITAS SISWA
        $('#print-data').html(createPageIdentitas(siswa));

        //SIKAP
        $('#print-sikap').html(createPageSikap(idSiswa, siswa));

        //NILAI
        $('#print-nilai').html(createPageNilai(idSiswa));

        //DESKRIPSI
        $('#print-deskripsi1').html(createPageDeskripsi(idSiswa));

        $('#print-deskripsi2').html(createPageekstra(idSiswa));

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
        }, 500);
    }

    function cetakSampul() {
        $('#print-sampul').print();
    }

    function cetakInfo() {
        $('#print-info').print();
    }

    function cetakData() {
        $('#print-data').print();
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
            $(div).print();
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
            $(div).print();
        }, 500);
    }

    $(document).ready(function () {
        console.log('nilai_rapor', nilaiRapor);
        console.log('sikap', sikap);
        console.log('nilai', nilai);
        console.log('desk', deskripsi);
        console.log('absensi', absensi);
        console.log('fisik', fisik);
        console.log('m_ekstra', ekstra);
        console.log('arr_ekstra', arrekstra);
        console.log('kelas', kelas);
        console.log('naik', naik);
        $('.siswa').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();
            $('.siswa').removeClass('active');
            $(this).toggleClass('active');
        })
    })
</script>
