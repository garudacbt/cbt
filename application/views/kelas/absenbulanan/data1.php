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
                    <div class="card-tools">
                        <a type="button" href="<?= base_url('kelasabsen') ?>" class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip"
                                    title="Print" onclick="print()">
                                <i class="fas fa-print"></i> <span
                                        class="d-none d-sm-inline-block ml-1"> Print/PDF</span></button>
                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip"
                                    title="Export As Word" onclick="exportWord()">
                                <i class="fa fa-file-word"></i> <span class="d-none d-sm-inline-block ml-1"> Word</span>
                            </button>
                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip"
                                    title="Export As Excel" onclick="exportExcel()">
                                <i class="fa fa-file-excel"></i> <span
                                        class="d-none d-sm-inline-block ml-1"> Excel</span></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class='row'>
                        <div class='col-md-12'>
                            <?= form_open('', array('id' => 'formselect')) ?>
                            <?= form_close(); ?>
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label>Mata Pelajaran</label>
                                    <?php
                                    echo form_dropdown(
                                        'mapel',
                                        $mapel,
                                        null,
                                        'id="opsi-mapel" class="form-control"'
                                    ); ?>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label>Kelas</label>
                                    <?php
                                    echo form_dropdown(
                                        'kelas',
                                        $kelas,
                                        null,
                                        'id="opsi-kelas" class="form-control"'
                                    ); ?>
                                </div>
                                <div class='col-md-3 mb-3'>
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Bulan</label>
                                            <?php
                                            echo form_dropdown(
                                                'bulan',
                                                $bulan,
                                                date('n'),
                                                'id="opsi-bulan" class="form-control"'
                                            ); ?>
                                        </div>
                                        <div class="col-6">
                                            <label>Tahun</label>
                                            <?php
                                            $ret = [];
                                            foreach ($tp as $key => $row) {
                                                $thn = explode("/", $row->tahun);
                                                $ret [$thn[0]] = $thn[0];
                                            }
                                            echo form_dropdown(
                                                'tahun',
                                                $ret,
                                                date('Y'),
                                                'id="opsi-tahun" class="form-control"'
                                            ); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <table>
                                        <tr>
                                            <td>
                                                <span>Pisahkan halaman: </span>
                                            </td>
                                            <td class="pl-2">
                                                <div class="custom-switch custom-switch-xs custom-switch-label-yesno pl-0">
                                                    <input class="custom-switch-input" id="gabungkan" type="checkbox">
                                                    <label class="custom-switch-btn" for="gabungkan"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div id="konten-absensi" class="w-100 overflow-auto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url() ?>/assets/app/js/print-area.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/html-docx.js"></script>
<script src="<?= base_url() ?>/assets/app/js/convert-area.js"></script>

<script>
    var kelas = JSON.parse('<?= json_encode($kelas)?>');
    var arrKelas = [];
    var form;
    var bln = '';
    var thn = '';
    var oldData = '';
    var jmlStatus = {};

    var styleBorder = 'style="border: 1px solid black; border-collapse: collapse;';
    var styleMinggu = 'style="border: 1px solid black; text-align: center; vertical-align: middle;background-color:#FF4444;';
    var styleHadir = 'style="border: 1px solid black; text-align: center; vertical-align: middle;background-color:#78E96B;';
    var styleTelat = 'style="border: 1px solid black; text-align: center; vertical-align: middle;background-color:#FFF493;';
    var styleAlpha = 'style="border: 1px solid black; text-align: center; vertical-align: middle;background-color:#FFB9BB;';
    var styleCenterMiddle = 'style="border: 1px solid black; text-align: center; vertical-align: middle;';
    var styleLeftMiddle = 'style="border: 1px solid black; vertical-align: middle;';
    var styleKosong = 'style="border: 1px solid black;background-color: #a6a6a6;';

    var docTitle = 'Kehadiran Bulanan';

    function daysInMonth(month, year) {
        return new Date(year, month, 0).getDate();
    }

    function createTabelKehadiran(data) {
        jmlStatus = {};
        console.log(data);
        var bulan = $("#opsi-bulan option:selected").text();
        var tahun = $("#opsi-tahun option:selected").text();
        var mapel = $("#opsi-mapel option:selected").text();
        var kelas = $("#opsi-kelas option:selected").text();
        var idmapel = $("#opsi-mapel").val();
        var table = '';

        var jmlHari = daysInMonth(bln, thn);
        var weekday = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];

        var totalJmlCol = 0;
        for (let i = 0; i < 17; i++) {
            var tgll = (i + 1);
            var dll = new Date(bln + '/' + tgll + '/' + thn);
            var harill = weekday[dll.getDay()];
            if (harill === 'Min') {
                totalJmlCol += 1;
            } else {
                totalJmlCol += 2;
            }
        }

        table = '<div style="width:100%;">' +
            '    <p style="text-align:center;font-size:14pt; font-weight: bold">REKAP KEHADIRAN SISWA</p>' +
            '</div>' +
            '<div style="display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-ms-flex-pack:center;justify-content:center;">' +
            '    <table>' +
            '        <tr>' +
            '            <td><p style="margin: 1px; display: inline;">Kelas</p></td>' +
            '            <td><p style="margin: 1px; display: inline;">: <b>' + kelas + '</b></p></td>' +
            '        </tr>' +
            '        <tr>' +
            '            <td><p style="margin: 1px; display: inline;">Mata Pelajaran</p></td>' +
            '            <td><p style="margin: 1px; display: inline;">: <b>' + mapel + '</b></p></td>' +
            '        </tr>' +
            '        <tr>' +
            '            <td><p style="margin: 1px; display: inline;">Bulan</p></td>' +
            '            <td><p style="margin: 1px; display: inline;">: <b>' + bulan + ' ' + tahun + '</b></p></td>' +
            '        </tr>' +
            '    </table>' +
            '</div><br>' +
            '<table class="tabelsiswa" style="width: 100%; border: 1px solid #c0c0c0; border-collapse: collapse; font-size: 10pt">' +
            '<thead style="background-color:lightgrey;">' +
            '<tr>' +
            '<th rowspan="3" ' + styleBorder + ' min-width: 40px;">No</th>' +
            '<th rowspan="3" ' + styleBorder + ' min-width: 80px;">N I S</th>' +
            '<th rowspan="3" ' + styleBorder + '">Nama</th>' +
            '<th rowspan="3" ' + styleBorder + '">Kelas</th>' +
            '<th colspan="' + totalJmlCol + '" ' + styleBorder + '">DARI TANGGAL 1 SAMPAI TANGGAL 17</th>' +
            '</tr>' +
            '<tr>';

        for (let i = 0; i < 17; i++) {
            var tg = (i + 1);
            var d = new Date(bln + '/' + tg + '/' + thn);
            var hari = weekday[d.getDay()];
            //console.log(hari);
            if (hari === 'Min') {
                totalJmlCol += 1;
                table += '<th rowspan="2" class="tanggal" ' + styleMinggu + '">' + tg + '<br>' + hari + '</th>';
            } else {
                table += '<th colspan="2" class="tanggal" ' + styleCenterMiddle + '">' + tg + '<br>' + hari + '</th>';
                totalJmlCol += 2;
            }
        }

        table += '</tr><tr>';

        for (let i = 0; i < 17; i++) {
            var tg2 = (i + 1);
            var d2 = new Date(bln + '/' + tg2 + '/' + thn);
            var hari2 = weekday[d2.getDay()];
            if (hari2 !== 'Min') {
                table += '<th class="tanggal" ' + styleCenterMiddle + '">M</th>' +
                    '<th class="tanggal" ' + styleCenterMiddle + '">T</th>';
            }
        }
        table += '</tr></thead>';

        var no = 1;
        var minggu = 0;
        var itemTable = {};

        $.each(data.log, function (key, value) {
            var item1 = {};
            item1['h'] = 0;
            item1['tl'] = 0;
            item1['th'] = 0;

            var item2 = {};
            item2['h'] = 0;
            item2['tl'] = 0;
            item2['th'] = 0;

            table += '<tr>' +
                '<td ' + styleCenterMiddle + '">' + no + '</td>' +
                '<td ' + styleCenterMiddle + '">' + value.nis + '</td>' +
                '<td class="nama-siswa" ' + styleLeftMiddle + '">' + value.nama + '</td>' +
                '<td ' + styleCenterMiddle + '">' + value.kelas + '</td>';

            minggu = 0;
            var hMateri = 0, tlMateri = 0, thMateri = 0, hTugas = 0, tlTugas = 0, thTugas = 0;
            for (let i = 0; i < 17; i++) {
                var tglm = (i + 1) < 10 ? '0' + (i + 1) : '' + (i + 1);
                var adaMateri = data.materi[tglm][idmapel] != null && data.materi[tglm][idmapel][1] != null;
                var adaTugas = data.materi[tglm][idmapel] != null && data.materi[tglm][idmapel][2] != null;

                var tg = (i + 1);
                var d = new Date(bln + '/' + tg + '/' + thn);
                var hari = weekday[d.getDay()];
                if (hari === 'Min') {
                    minggu++;
                    table += '<td ' + styleMinggu + '">&ensp;</td>';
                } else {
                    if (adaMateri) {
                        if (value.materi[i] != null && value.materi[i].jam != null) {
                            var jm = value.materi[i] != null ? value.materi[i].jam : '-';
                            //console.log('value', value.materi[i]);
                            if (terlambat(value.materi[i], data.jadwal)) {
                                table += '<td ' + styleTelat + '">&check;</td>';
                                item1['tl'] = item1.tl + 1;
                                tlMateri++;
                            } else {
                                table += '<td ' + styleHadir + '">&check;</td>';
                                item1['h'] = item1.h + 1;
                                hMateri++;
                            }
                        } else {
                            table += '<td ' + styleAlpha + '">&ensp;</td>';
                            item1['th'] = item1.th + 1;
                            thMateri++;
                        }
                    } else {
                        table += '<td ' + styleKosong + '">&ensp;</td>';
                    }

                    if (adaTugas) {
                        if (value.tugas[i] != null && value.tugas[i].jam != null) {
                            var jt = value.tugas[i] != null ? value.tugas[i].jam : '-';
                            if (terlambat(value.tugas[i], data.jadwal)) {
                                table += '<td ' + styleTelat + '">&check;</td>';
                                item2['tl'] = item2.tl + 1;
                                tlTugas++;
                            } else {
                                table += '<td ' + styleHadir + '">&check;</td>';
                                item2['h'] = item2.h + 1;
                                hTugas++;
                            }
                        } else {
                            table += '<td ' + styleAlpha + '">&ensp;</td>';
                            item2['th'] = item2.th + 1;
                            thTugas++;
                        }
                    } else {
                        table += '<td ' + styleKosong + '">&ensp;</td>';
                    }

                    var jmlItem = {};
                    jmlItem['mtr'] = item1;
                    jmlItem['tgs'] = item2;
                    itemTable[key] = jmlItem;
                }
            }

            table += '</tr>';
            no++;
        });
        jmlStatus['tbl1'] = itemTable;

        table += '</table>';

        var styleSpan = 'style="white-space: nowrap;font-size: 10pt; font-weight: 600;"';
        table += '<div id="ket" style="margin-top: 6px">' +
            '<div>Keterangan warna:</div><div>' +
            '<span ' + styleSpan + '>' +
            '<span style="background: #FF4444; border: 1px solid black;">&ensp;&ensp;</span> Hari libur</span>' +
            '&ensp;&ensp;<span ' + styleSpan + '>' +
            '<span style="background: #757575; border: 1px solid black;">&ensp;&ensp;</span> Tidak ada materi/tugas</span>' +
            '&ensp;&ensp;<span ' + styleSpan + '>' +
            '<span style="background: #78E96B; border: 1px solid black;">&ensp;&ensp;</span> (H) Hadir tepat waktu</span>' +
            '&ensp;&ensp;<span ' + styleSpan + '>' +
            '<span style="background: #FFF493; border: 1px solid black;">&ensp;&ensp;</span> (TL) Terlambat</span>' +
            '&ensp;&ensp;<span ' + styleSpan + '>' +
            '<span style="background: #FFB9BB; border: 1px solid black;">&ensp;&ensp;</span> (TH) Tidak hadir</span>' +
            '</div></div><br><br>';
        $('#konten-absensi').html(table);
        /*
        $('#loading').addClass('d-none');

        $.each($('table').find('th'), function () {
            $(this).html('<p style="margin: 1px 4px; display: inline;">'+$(this).html()+'</p>')
        });

        $.each($('table').find('td'), function () {
            $(this).html('<p style="margin: 1px 4px; display: inline;">'+$(this).text()+'</p>')
        });
        */
        createTable2(data);
    }

    function createTable2(data) {
        var idmapel = $("#opsi-mapel").val();
        var table = '';

        var jmlHari = daysInMonth(bln, thn);
        var weekday = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];

        var totalJmlCol = 0;
        for (let i = 17; i < jmlHari; i++) {
            var tgll = (i + 1);
            var dll = new Date(bln + '/' + tgll + '/' + thn);
            var harill = weekday[dll.getDay()];
            if (harill === 'Min') {
                totalJmlCol += 1;
            } else {
                totalJmlCol += 2;
            }
        }

        table = '<table class="tabelsiswa" style="width: 100%; border: 1px solid #c0c0c0; border-collapse: collapse; font-size: 10pt;">' +
            '<thead style="background-color:lightgrey;">' +
            '<tr>' +
            '<th rowspan="3" ' + styleBorder + ' min-width: 40px;">No</th>' +
            '<th rowspan="3" ' + styleBorder + ' min-width: 80px;">N I S</th>' +
            '<th rowspan="3" ' + styleBorder + '">Nama</th>' +
            '<th rowspan="3" ' + styleCenterMiddle + '">Kelas</th>' +
            '<th colspan="' + totalJmlCol + '" ' + styleBorder + '">DARI TANGGAL 18 SAMPAI TANGGAL ' + jmlHari + '</th>' +
            '<th colspan="6" ' + styleBorder + '">Jml. Kehadiran</th>' +
            '</tr>' +
            '<tr>';

        for (let i = 17; i < jmlHari; i++) {
            var tg = (i + 1);
            var d = new Date(bln + '/' + tg + '/' + thn);
            var hari = weekday[d.getDay()];
            //console.log(hari);
            if (hari === 'Min') {
                totalJmlCol += 1;
                table += '<th rowspan="2" class="tanggal" ' + styleMinggu + '">' + tg + '<br>' + hari + '</th>';
            } else {
                table += '<th colspan="2" class="tanggal" ' + styleCenterMiddle + '">' + tg + '<br>' + hari + '</th>';
                totalJmlCol += 2;
            }
        }

        table += '<th colspan="3" ' + styleCenterMiddle + '">Materi</th>' +
            '<th colspan="3" ' + styleCenterMiddle + '">Tugas</th>' +
            '</tr>';

        for (let i = 17; i < jmlHari; i++) {
            var tg2 = (i + 1);
            var d2 = new Date(bln + '/' + tg2 + '/' + thn);
            var hari2 = weekday[d2.getDay()];
            if (hari2 !== 'Min') {
                table += '<th class="tanggal" ' + styleCenterMiddle + '">M</th>' +
                    '<th class="tanggal" ' + styleCenterMiddle + '">T</th>';
            }
        }
        table += '<th class="tanggal" ' + styleCenterMiddle + '">H</th>' +
            '<th class="tanggal" ' + styleCenterMiddle + '">TL</th>' +
            '<th class="tanggal" ' + styleCenterMiddle + '">TH</th>' +
            '<th class="tanggal" ' + styleCenterMiddle + '">H</th>' +
            '<th class="tanggal" ' + styleCenterMiddle + '">TL</th>' +
            '<th class="tanggal" ' + styleCenterMiddle + '">TH</th>';

        table += '</tr></thead>';

        var no = 1;
        var minggu = 0;
        $.each(data.log, function (key, value) {
            table += '<tr>' +
                '<td ' + styleCenterMiddle + '">' + no + '</td>' +
                '<td ' + styleCenterMiddle + '">' + value.nis + '</td>' +
                '<td class="nama-siswa" ' + styleLeftMiddle + '">' + value.nama + '</td>' +
                '<td ' + styleCenterMiddle + '">' + value.kelas + '</td>';

            minggu = 0;
            var hMateri = 0, tlMateri = 0, thMateri = 0, hTugas = 0, tlTugas = 0, thTugas = 0;
            for (let i = 17; i < jmlHari; i++) {
                var tglm = (i + 1) < 10 ? '0' + (i + 1) : (i + 1);
                var adaMateri = data.materi[tglm][idmapel] != null && data.materi[tglm][idmapel][1] != null;
                var adaTugas = data.materi[tglm][idmapel] != null && data.materi[tglm][idmapel][2] != null;

                var tg = (i + 1);
                var d = new Date(bln + '/' + tg + '/' + thn);
                var hari = weekday[d.getDay()];
                if (hari === 'Min') {
                    minggu++;
                    table += '<td ' + styleMinggu + '">&ensp;</td>';
                } else {
                    if (adaMateri) {
                        if (value.materi[i] != null && value.materi[i].jam != null) {
                            var jm = value.materi[i] != null ? value.materi[i].jam : '-';
                            //console.log('value', value.materi[i]);
                            if (terlambat(value.materi[i], data.jadwal)) {
                                table += '<td ' + styleTelat + '">&check;</td>';
                                tlMateri++;
                            } else {
                                table += '<td ' + styleHadir + '">&check;</td>';
                                hMateri++;
                            }
                        } else {
                            table += '<td ' + styleAlpha + '">&ensp;</td>';
                            thMateri++;
                        }
                    } else {
                        table += '<td ' + styleKosong + '">&ensp;</td>';
                    }

                    if (adaTugas) {
                        if (value.tugas[i] != null && value.tugas[i].jam != null) {
                            var jt = value.tugas[i] != null ? value.tugas[i].jam : '-';
                            if (terlambat(value.tugas[i], data.jadwal)) {
                                table += '<td ' + styleTelat + '">&check;</td>';
                                tlTugas++;
                            } else {
                                table += '<td ' + styleHadir + '">&check;</td>';
                                hTugas++;
                            }
                        } else {
                            table += '<td ' + styleAlpha + '">&ensp;</td>';
                            thTugas++;
                        }
                    } else {
                        table += '<td ' + styleKosong + '">&ensp;</td>';
                    }
                }
            }

            table += '<td ' + styleCenterMiddle + '">' + (jmlStatus['tbl1'][key]['mtr'].h + hMateri) + '</td>' +
                '<td ' + styleCenterMiddle + '">' + (jmlStatus['tbl1'][key]['mtr'].tl + tlMateri) + '</td>' +
                '<td ' + styleCenterMiddle + '">' + (jmlStatus['tbl1'][key]['mtr'].th + thMateri) + '</td>' +
                '<td ' + styleCenterMiddle + '">' + (jmlStatus['tbl1'][key]['mtr'].h + hTugas) + '</td>' +
                '<td ' + styleCenterMiddle + '">' + (jmlStatus['tbl1'][key]['mtr'].tl + tlTugas) + '</td>' +
                '<td ' + styleCenterMiddle + '">' + (jmlStatus['tbl1'][key]['mtr'].th + thTugas) + '</td>' +
                '</tr>';

            no++;
        });

        table += '</table>';
        var styleSpan = 'style="white-space: nowrap;font-size: 10pt; font-weight: 600;"';
        table += '<div id="ket" style="margin-top: 6px">' +
            '<div>Keterangan warna:</div><div>' +
            '<span ' + styleSpan + '>' +
            '<span style="background: #FF4444; border: 1px solid black;">&ensp;&ensp;</span> Hari libur</span>' +
            '&ensp;&ensp;<span ' + styleSpan + '>' +
            '<span style="background: #757575; border: 1px solid black;">&ensp;&ensp;</span> Tidak ada materi/tugas</span>' +
            '&ensp;&ensp;<span ' + styleSpan + '>' +
            '<span style="background: #78E96B; border: 1px solid black;">&ensp;&ensp;</span> (H) Hadir tepat waktu</span>' +
            '&ensp;&ensp;<span ' + styleSpan + '>' +
            '<span style="background: #FFF493; border: 1px solid black;">&ensp;&ensp;</span> (TL) Terlambat</span>' +
            '&ensp;&ensp;<span ' + styleSpan + '>' +
            '<span style="background: #FFB9BB; border: 1px solid black;">&ensp;&ensp;</span> (TH) Tidak hadir</span>' +
            '</div></div>';
        $('#konten-absensi').append(table);
        $('#loading').addClass('d-none');

        $.each($('table.tabelsiswa').find('th'), function () {
            if ($(this).hasClass("tanggal")) {
                $(this).html('<p style=" font-size: 8pt; margin: 1px 2px; display: block; text-align: center; vertical-align: middle;">' + $(this).html() + '</p>')
            } else {
                $(this).html('<p style="margin: 1px 2px; display: block; text-align: center; vertical-align: middle;">' + $(this).html() + '</p>')
            }
        });

        $.each($('table.tabelsiswa').find('td'), function () {
            if ($(this).hasClass("nama-siswa")) {
                $(this).html('<p style="width: 150px; margin: 1px 2px; -webkit-line-clamp: 1; overflow : hidden; text-overflow: ellipsis; display: -webkit-box;-webkit-box-orient: vertical;">' + $(this).text() + '</p>')
            } else {
                $(this).html('<p style="margin: 1px 2px; display: inline;">' + $(this).text() + '</p>')
            }
        });

        if ($('#gabungkan').prop('checked')) {
            $('.tabelsiswa').css({'page-break-after': 'always'});
        } else {
            $('.tabelsiswa').css({'page-break-after': 'auto'});
        }
    }

    $(document).ready(function () {
        var gabung = $('#gabungkan');
        gabung.on('change', function () {
            //console.log('switch', $(this).prop('checked'));
            if ($(this).prop('checked')) {
                $('.tabelsiswa').css({'page-break-after': 'always'});
            } else {
                $('.tabelsiswa').css({'page-break-after': 'auto'});
            }
        });

        var selKelas = $('#opsi-kelas');
        var selMapel = $('#opsi-mapel');
        var selTahun = $('#opsi-tahun');
        var selBulan = $('#opsi-bulan');
        form = $('#formselect');

        bln = selBulan.val();
        thn = selTahun.val();

        function reload(mapel, kls, bln, thn) {
            //console.log(bln, thn, kls);
            var empty = bln === '' || thn === '' || kls === '';
            var newData = '&thn=' + thn + '&bln=' + bln + '&kelas=' + kls + '&mapel=' + mapel;
            if (!empty && oldData !== newData) {
                oldData = newData;
                $('#loading').removeClass('d-none');
                setTimeout(function () {
                    $.ajax({
                        url: base_url + 'kelasabsensibulanan/loadabsensimapel',
                        type: "POST",
                        dataType: "json",
                        data: form.serialize() + newData,
                        success: function (data) {
                            createTabelKehadiran(data)
                        },
                        error: function (xhr, status, error) {
                            //console.log(xhr.responseText);
                        }
                    });
                }, 500);
            }
        }

        selMapel.on('change', function () {
            reload($(this).val(), selKelas.val(), selBulan.val(), selTahun.val());
        });

        selKelas.change(function () {
            reload(selMapel.val(), $(this).val(), selBulan.val(), selTahun.val());
        });

        selBulan.change(function () {
            bln = $(this).val();
            reload(selMapel.val(), selKelas.val(), $(this).val(), selTahun.val());
        });

        selTahun.change(function () {
            thn = $(this).val();
            reload(selMapel.val(), selKelas.val(), selBulan.val(), $(this).val());
        });

        reload(selMapel.val(), selKelas.val(), selBulan.val(), selTahun.val());
    });

    function terlambat(value, jadwal) {
        var tgl = value.jadwal_materi;
        var mulaiKbm = jadwal.kbm_jam_mulai;
        var dateMulai = new Date(tgl + "T" + mulaiKbm);
        var perMapel = jadwal.kbm_jam_pel;

        var items = {};
        for (let i = 0; i < jadwal.kbm_jml_mapel_hari; i++) {
            var jk = i + 1;

            for (let j = 0; j < jadwal.istirahat.length; j++) {
                var istJamKe = jadwal.istirahat[j].ist;
                var istDur = jadwal.istirahat[j].dur;

                if (jk == istJamKe) {
                    dateMulai = new Date(dateMulai.getTime() + istDur * 60000);
                    items[jk] = dateMulai;//new Date(dateMulai.getTime() + istDur*60000);
                } else {
                    dateMulai = new Date(dateMulai.getTime() + perMapel * 60000);
                    items[jk] = dateMulai;//new Date(dateMulai.getTime() + istDur*60000);
                }
            }
        }

        var jamke = value.jam_ke;
        //console.log('jadwal', items);
        var tglJadwal = formatDate(items[jamke]);
        var diff = calculateTime(tglJadwal, value.log_time);
        return diff != '';
        //return diff == '' ? '' : 'Terlambat <br>' + diff;
        //console.log('jadwal:' + tglJadwal + ' selesai:' + value.selesai.log_time + ' diff:' + calculateTime(tglJadwal, value.selesai.log_time));
    }

    function calculateTime(jadwal, selesai) {
        var ONE_DAY = 1000 * 60 * 60 * 24;
        var ONE_HOUR = 1000 * 60 * 60;
        var ONE_MINUTE = 1000 * 60;

        // Convert both dates to milliseconds
        var old_date_obj = new Date(jadwal).getTime();
        var new_date_obj = new Date(selesai).getTime();

        // Calculate the difference in milliseconds
        var difference_ms = Math.abs(new_date_obj - old_date_obj);

        // Convert back to days, hours, and minutes
        var days = Math.round(difference_ms / ONE_DAY);
        var hours = Math.round(difference_ms / ONE_HOUR) - (days * 24) - 1;
        var minutes = Math.round(difference_ms / ONE_MINUTE) - (days * 24 * 60) - (hours * 60);

        if (minutes > 60) {
            hours += 1;
            minutes -= 60;
        }
        return (days > 0 ? days + ' hari, ' : '') + (hours > 0 ? hours + ' jam, ' : '') + (minutes > 0 ? minutes + ' menit' : '');
    }

    function formatDate(d) {
        var month = (d.getMonth() + 1),
            day = d.getDate(),
            year = d.getFullYear(),
            hour = d.getHours(),
            minute = d.getMinutes(),
            second = d.getSeconds();

        if (month < 10) month = '0' + month;
        if (day < 10) day = '0' + day;

        if (hour < 10) hour = '0' + hour;
        if (minute < 10) minute = '0' + minute;
        if (second < 10) second = '0' + second;

        var w = [year, month, day].join('-');
        var j = [hour, minute, second].join(':');

        return w + "T" + j;
    }

    function print() {
        var title = document.title;
        document.title = docTitle;
        $('#konten-absensi').print(docTitle);
        document.title = title;
    }

    function exportWord() {
        var contentDocument = $('#konten-absensi').convertToHtmlFile(docTitle, '');
        var content = '<!DOCTYPE html>' + contentDocument.documentElement.outerHTML;
        //console.log('css', content);
        var converted = htmlDocx.asBlob(content, {
            orientation: 'landscape',
            size: 'A4',
            margins: {top: 700, bottom: 700, left: 1000, right: 1000}
        });

        saveAs(converted, docTitle + '.docx');
    }

    function exportExcel() {

    }


</script>
