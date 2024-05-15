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
                        <button type="button" id="reload-page" class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </button>
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
                                                $thn = explode("/", $row->tahun ?? '');
                                                $ret [$thn[0]] = $thn[0];
                                                $ret [$thn[1]] = $thn[1];
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
            <div id="konten-copy" class="d-none"></div>
        </div>
    </section>
</div>

<script src="<?= base_url() ?>/assets/app/js/print-area.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/html-docx.js"></script>
<script src="<?= base_url() ?>/assets/app/js/convert-area.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/tableToExcel.js"></script>

<script>
    var kelas = JSON.parse('<?= json_encode($kelas)?>');
    var arrKelas = [];
    var form;
    var bln = '';
    var thn = '';
    var oldData = '';
    var jmlStatus = {};

    var styleBorder = ' style="border: 1px solid #8d8d8d; border-collapse: collapse;';
    var styleMinggu = ' style="border: 1px solid #8d8d8d; text-align: center; vertical-align: middle;background-color:#FF9393;';
    var styleHadir = ' style="border: 1px solid #8d8d8d; text-align: center; vertical-align: middle;background-color:#78E96B;';
    var styleTelat = ' style="border: 1px solid #8d8d8d; text-align: center; vertical-align: middle;background-color:#FFF493;';
    var styleAlpha = ' style="border: 1px solid #8d8d8d; text-align: center; vertical-align: middle;background-color:#FFCCCD;';
    var styleCenterMiddle = ' style="border: 1px solid #8d8d8d; text-align: center; vertical-align: middle;';
    var styleLeftMiddle = ' style="border: 1px solid #8d8d8d; vertical-align: middle;';
    var styleKosong = ' style="border: 1px solid #8d8d8d;background-color: #a6a6a6;';

    // style excel
    var styleHead = ' data-fill-color="d3d3d3" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"';
    var styleHeadMinggu = ' data-fill-color="FF9393" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"';
    var styleNormal = ' data-fill-color="ffffff" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="false"';
    var styleNormalMinggu = ' data-fill-color="FF9393" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="false"';
    var style_Hadir = ' data-fill-color="78E96B" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="false"';
    var style_Telat = ' data-fill-color="FFF493" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="false"';
    var style_Alpha = ' data-fill-color="FFCCCD" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="false"';
    var styleEmpty = ' data-fill-color="a6a6a6" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="false"';
    var styleNama = ' data-fill-color="ffffff" data-t="s" data-a-v="middle" data-b-a-s="thin" data-f-bold="false"';

    var docTitle = '';

    function daysInMonth(month, year) {
        return new Date(year, month, 0).getDate();
    }

    function createTable(data) {
        docTitle = '';
        //console.log('response',data);
        if (data.jadwal == null) {
            $('#konten-absensi').html('<p>tidak ada jadwal pelajaran</p>');
            $('#loading').addClass('d-none');
            return;
        }

        var bulan = $("#opsi-bulan option:selected").text();
        var tahun = $("#opsi-tahun option:selected").text();
        var mapel = $("#opsi-mapel option:selected").text();
        var kelas = $("#opsi-kelas option:selected").text();
        var idmapel = $("#opsi-mapel").val();
        var table = '';
        docTitle += 'Kehadiran ' + mapel + ' Kelas ' + kelas + ' Bulan ' + bulan;

        var jmlHari = daysInMonth(bln, thn);
        var weekday = ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];

        var totalJmlCol = 0;
        for (let i = 0; i < jmlHari; i++) {
            var tgll = (i + 1) < 10 ? '0' + (i + 1) : (i + 1);
            var dll = new Date(bln + '/' + tgll + '/' + thn);
            var harill = weekday[dll.getDay()];
            if (harill === 'Min') {
                totalJmlCol += 1;
            } else {
                if (data.mapels[tgll] != null) {
                    var jmlJam = Object.keys(data.mapels[tgll]).length;
                    totalJmlCol += 2 * jmlJam;
                }
            }
        }

        table = '<div id="jdl" style="width:100%;"><p style="text-align:center;font-size:14pt; font-weight: bold">KEHADIRAN BULANAN SISWA</p></div>' +
            '<div style="display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-ms-flex-pack:center;justify-content:center;height:100%;">' +
            '    <table id="atas">' +
            '        <tr>' +
            '            <td colspan="2"><p style="margin: 1px; display: inline;">Mata Pelajaran</p></td>' +
            '            <td><p style="margin: 1px; display: inline;">: <b>' + mapel + '</b></p></td>' +
            '        </tr>' +
            '        <tr>' +
            '            <td colspan="2"><p style="margin: 1px; display: inline;">Kelas</p></td>' +
            '            <td><p style="margin: 1px; display: inline;">: <b>' + kelas + '</b></p></td>' +
            '        </tr>' +
            '        <tr>' +
            '            <td colspan="2"><p style="margin: 1px; display: inline;">Bulan</p></td>' +
            '            <td><p style="margin: 1px; display: inline;">: <b>' + bulan + '</b></p></td>' +
            '        </tr>' +
            '    </table>' +
            '</div><br>' +
            '<table id="log-nilai" class="tabelsiswa" style="width: 100%; border: 1px solid #c0c0c0; border-collapse: collapse; font-size: 10pt;">' +
            '<thead style="background-color:lightgrey;">' +
            '<tr>' +
            '<th rowspan="4" ' + styleBorder + ' min-width: 40px;"' + styleHead + '>No</th>' +
            '<th rowspan="4" ' + styleBorder + ' min-width: 80px;"' + styleHead + '>N I S</th>' +
            '<th rowspan="4" ' + styleBorder + '"' + styleHead + '>Nama</th>' +
            '<th rowspan="4" ' + styleCenterMiddle + '"' + styleHead + '>Kelas</th>' +
            '<th colspan="' + totalJmlCol + '" ' + styleBorder + '"' + styleHead + '>HARI, TANGGAL</th>' +
            '<th colspan="6" ' + styleBorder + '"' + styleHead + '>Jml. Kehadiran</th>' +
            '</tr>' +
            '<tr>';

        for (let i = 0; i < jmlHari; i++) {
            var tg = (i + 1) < 10 ? '0' + (i + 1) : (i + 1);
            var d = new Date(bln + '/' + tg + '/' + thn);
            var hari = weekday[d.getDay()];
            if (hari === 'Min') {
                table += '<th rowspan="3" class="tanggal" ' + styleMinggu + '" ' + styleHeadMinggu + '>'+ hari + ' ' + '<br>' + tg + '</th>';
            } else {
                if (data.mapels[tg] != null) {
                    var jmlJam = Object.keys(data.mapels[tg]).length;
                    table += '<th colspan="' + (2 * jmlJam) + '" class="tanggal" ' + styleCenterMiddle + '"' + styleHead + '>'+ hari + ' ' + '<br>' + tg + '</th>';
                }
            }
        }

        table += '<th colspan="3" rowspan="2" ' + styleCenterMiddle + '"' + styleHead + '>Materi</th>' +
            '<th colspan="3" rowspan="2" ' + styleCenterMiddle + '"' + styleHead + '>Tugas</th>' +
            '</tr>';

        for (let i = 0; i < jmlHari; i++) {
            var tg2 = (i + 1) < 10 ? '0' + (i + 1) : (i + 1);
            var d2 = new Date(bln + '/' + tg2 + '/' + thn);
            var hari2 = weekday[d2.getDay()];

            if (hari2 !== 'Min' && data.mapels[tg2] != null) {
                //var jmlJam = Object.keys(data.mapels[tg2]).length;
                $.each(data.mapels[tg2], function (k, v) {
                    table += '<th colspan="2" class="tanggal" ' + styleCenterMiddle + '"' + styleHead + '>jam ke ' + k + '</th>';
                });
            }
        }
        table += '</tr><tr>';

        for (let i = 0; i < jmlHari; i++) {
            var tg2 = (i + 1) < 10 ? '0' + (i + 1) : (i + 1);
            var d2 = new Date(bln + '/' + tg2 + '/' + thn);
            var hari2 = weekday[d2.getDay()];

            if (hari2 !== 'Min' && data.mapels[tg2] != null) {
                var jmlJam = Object.keys(data.mapels[tg2]).length;
                for (let j = 0; j < jmlJam; j++) {
                    table += '<th class="tanggal" ' + styleCenterMiddle + '"' + styleHead + '>M</th>' +
                        '<th class="tanggal" ' + styleCenterMiddle + '"' + styleHead + '>T</th>';
                }
            }
        }

        table += '<th class="tanggal" ' + styleCenterMiddle + '"' + styleHead + '>H</th>' +
            '<th class="tanggal" ' + styleCenterMiddle + '"' + styleHead + '>TL</th>' +
            '<th class="tanggal" ' + styleCenterMiddle + '"' + styleHead + '>TH</th>' +
            '<th class="tanggal" ' + styleCenterMiddle + '"' + styleHead + '>H</th>' +
            '<th class="tanggal" ' + styleCenterMiddle + '"' + styleHead + '>TL</th>' +
            '<th class="tanggal" ' + styleCenterMiddle + '"' + styleHead + '>TH</th>' +
            '</tr></thead>';

        var no = 1;
        var minggu = 0;
        var colWidth = '';
        $.each(data.log, function (key, value) {
            table += '<tr>' +
                '<td ' + styleCenterMiddle + '"'+ styleNormal +'>' + no + '</td>' +
                '<td ' + styleCenterMiddle + '"'+ styleNormal +'>' + value.nis + '</td>' +
                '<td class="nama-siswa" ' + styleLeftMiddle + '"'+ styleNama +'>' + value.nama + '</td>' +
                '<td ' + styleCenterMiddle + '"'+ styleNormal +'>' + value.kelas + '</td>';

            colWidth = '4,15,35,15';
            minggu = 0;
            var hMateri = 0, tlMateri = 0, thMateri = 0, hTugas = 0, tlTugas = 0, thTugas = 0;
            for (let i = 0; i < jmlHari; i++) {
                var tglm = (i + 1) < 10 ? '0' + (i + 1) : (i + 1);
                var adaJadwal = data.mapels[tglm] != null;

                var d = new Date(bln + '/' + tglm + '/' + thn);
                var hari = weekday[d.getDay()];
                if (hari === 'Min') {
                    minggu++;
                    table += '<td ' + styleMinggu + '"'+ styleNormalMinggu +'>&ensp;</td>';
                    colWidth += ',4';
                } else {
                    if (adaJadwal) {
                        $.each(data.mapels[tglm], function (jamKe, tgl) {
                            var adaMateri = data.materi[tglm][idmapel] != null && data.materi[tglm][idmapel][jamKe] != null && data.materi[tglm][idmapel][jamKe][1] != null;
                            if (adaMateri) {
                                if (value.materi[i] != null && value.materi[i][jamKe] != null && value.materi[i][jamKe].jam != null) {
                                    if (terlambat(value.materi[i][jamKe], data.jadwal)) {
                                        table += '<td ' + styleTelat + '"'+ style_Telat +'>&check;</td>';
                                        tlMateri++;
                                    } else {
                                        table += '<td ' + styleHadir + '"'+ style_Hadir +'>&check;</td>';
                                        hMateri++;
                                    }
                                } else {
                                    table += '<td ' + styleAlpha + '"'+ style_Alpha +'>&ensp;</td>';
                                    thMateri++;
                                }
                                colWidth += ',4';
                            } else {
                                table += '<td ' + styleKosong + '"'+ styleEmpty +'>&ensp;</td>';
                                colWidth += ',4';
                            }

                            var adaTugas = data.materi[tglm][idmapel] != null && data.materi[tglm][idmapel][jamKe] != null && data.materi[tglm][idmapel][jamKe][2] != null;
                            if (adaTugas) {
                                if (value.tugas[i] != null && value.tugas[i][jamKe] != null && value.tugas[i][jamKe].jam != null) {
                                    //var jt = value.tugas[i] != null ? value.tugas[i].jam : '-';
                                    if (terlambat(value.tugas[i][jamKe], data.jadwal)) {
                                        table += '<td ' + styleTelat + '"'+ style_Telat +'>&check;</td>';
                                        tlTugas++;
                                    } else {
                                        table += '<td ' + styleHadir + '"'+ style_Hadir +'>&check;</td>';
                                        hTugas++;
                                    }
                                } else {
                                    table += '<td ' + styleAlpha + '"'+ style_Alpha +'>&ensp;</td>';
                                    thTugas++;
                                }
                                colWidth += ',4';
                            } else {
                                table += '<td ' + styleKosong + '"'+ styleEmpty +'>&ensp;</td>';
                                colWidth += ',4';
                            }
                        });
                    }
                }
            }

            table += '<td ' + styleCenterMiddle + '"'+ styleNormal +'>' + hMateri + '</td>' +
                '<td ' + styleCenterMiddle + '"'+ styleNormal +'>' + tlMateri + '</td>' +
                '<td ' + styleCenterMiddle + '"'+ styleNormal +'>' + thMateri + '</td>' +
                '<td ' + styleCenterMiddle + '"'+ styleNormal +'>' + hTugas + '</td>' +
                '<td ' + styleCenterMiddle + '"'+ styleNormal +'>' + tlTugas + '</td>' +
                '<td ' + styleCenterMiddle + '"'+ styleNormal +'>' + thTugas + '</td>' +
                '</tr>';

            no++;
        });

        table += '</table>';
        var styleSpan = 'style="white-space: nowrap;font-size: 10pt; font-weight: 600;"';
        table += '<div id="ket" style="margin-top: 6px">' +
            '<div>Keterangan warna:</div><div>' +
            '<span ' + styleSpan + '>' +
            '<span style="background: #FF9393; border: 1px solid black;">&ensp;&ensp;</span> Hari libur</span>' +
            '&ensp;&ensp;<span ' + styleSpan + '>' +
            '<span style="background: #757575; border: 1px solid black;">&ensp;&ensp;</span> Tidak ada materi/tugas</span>' +
            '&ensp;&ensp;<span ' + styleSpan + '>' +
            '<span style="background: #78E96B; border: 1px solid black;">&ensp;&ensp;</span> (H) Hadir tepat waktu</span>' +
            '&ensp;&ensp;<span ' + styleSpan + '>' +
            '<span style="background: #FFF493; border: 1px solid black;">&ensp;&ensp;</span> (TL) Terlambat</span>' +
            '&ensp;&ensp;<span ' + styleSpan + '>' +
            '<span style="background: #FFCCCD; border: 1px solid black;">&ensp;&ensp;</span> (TH) Tidak hadir</span>' +
            '</div></div>';
        $('#konten-absensi').html(table);
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

        colWidth += ',4,4,4,4,4,4';
        console.log('colWidth', colWidth.split(',').length)
        var title = $('#jdl').html();
        var trsAtas = $('table#atas tbody').html();
        var trsHead = $('table#log-nilai thead').html();
        var trsBody = $('table#log-nilai tbody').html();
        var copy = '<table id="excel" style="font-size: 11pt;" data-cols-width="' + colWidth + '"><tbody>' +
            '<tr>' +
            '<td colspan="10" data-a-v="middle" data-a-h="center" data-f-bold="true">' + title + '</td>' +
            '</tr>' +
            trsAtas +
            '<tr></tr>' +
            trsHead +
            trsBody +
            '</tbody>';

        $('#konten-copy').html(copy);

    }

    $(document).ready(function () {
        var selKelas = $('#opsi-kelas');
        var selMapel = $('#opsi-mapel');
        var selTahun = $('#opsi-tahun');
        var selBulan = $('#opsi-bulan');
        form = $('#formselect');

        bln = selBulan.val();
        thn = selTahun.val();

        function reload(mapel, kls, bln, thn, force) {
            var empty = bln === '' || thn === '' || kls === '';
            var newData = '&thn=' + thn + '&bln=' + bln + '&kelas=' + kls + '&mapel=' + mapel;
            var f = force ? true : oldData !== newData;
            if (!empty && f) {
                oldData = newData;
                $('#loading').removeClass('d-none');
                setTimeout(function () {
                    $.ajax({
                        url: base_url + 'kelasabsensibulanan/loadabsensimapel',
                        type: "POST",
                        dataType: "json",
                        data: form.serialize() + newData,
                        success: function (data) {
                            //createTabelKehadiran(data)
                            createTable(data);
                        },
                        error: function (xhr, status, error) {
                            //console.log(xhr.responseText);
                        }
                    });
                }, 500);
            }
        }

        selMapel.on('change', function () {
            reload($(this).val(), selKelas.val(), selBulan.val(), selTahun.val(), false);
        });

        selKelas.change(function () {
            reload(selMapel.val(), $(this).val(), selBulan.val(), selTahun.val(), false);
        });

        selBulan.change(function () {
            bln = $(this).val();
            reload(selMapel.val(), selKelas.val(), $(this).val(), selTahun.val(), false);
        });

        selTahun.change(function () {
            thn = $(this).val();
            reload(selMapel.val(), selKelas.val(), selBulan.val(), $(this).val(), false);
        });

        reload(selMapel.val(), selKelas.val(), selBulan.val(), selTahun.val(), false);

        $('#reload-page').click(function () {
            reload(selMapel.val(), selKelas.val(), selBulan.val(), selTahun.val(), true);
        })

        selMapel.select2({theme: 'bootstrap4'});
        selKelas.select2({theme: 'bootstrap4'});
        selBulan.select2({theme: 'bootstrap4'});
        selTahun.select2({theme: 'bootstrap4'});
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
        var table = document.querySelector("#excel");
        TableToExcel.convert(table, {
            name: docTitle + '.xlsx',
            sheet: {
                name: "Sheet 1"
            }
        });
    }
</script>
