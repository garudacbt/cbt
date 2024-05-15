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
                    <div class="card-tools">
                        <a type="button" href="<?= base_url('kelasnilai') ?>" class="btn btn-sm btn-default">
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
                    <?php
                    //$day = date('N', strtotime(date('Y-m-d')));
                    //echo '<pre>';
                    //echo json_encode($num_day, JSON_PRETTY_PRINT);
                    //var_dump($day);
                    //var_dump($num_day);
                    //echo '<br>';
                    //echo json_encode($kbm, JSON_PRETTY_PRINT);
                    //var_dump($kbm);
                    //echo '</pre>';
                    ?>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Mapel</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'mapel',
                                    $mapel,
                                    null,
                                    'id="opsi-mapel" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Kelas</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'kelas',
                                    $kelas,
                                    null,
                                    'id="opsi-kelas" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tahun</span>
                                </div>
                                <select name="tahun" id="opsi-tahun" class="form-control">
                                    <option value="" selected="selected" disabled="disabled">Pilih Tahun Pelajaran
                                    </option>
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
                                    <option value="" selected="selected" disabled="disabled">Pilih Semester</option>
                                    <?php foreach ($smt as $sm) : ?>
                                        <option value="<?= $sm->id_smt ?>"><?= $sm->smt ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="konten-absensi" class="table-responsive"></div>
                    <hr>
                    <div id="konten-copy" class="d-none"></div>
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
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/tableToExcel.js"></script>

<script>
    var docTitle = '';
    const namaBulan = ["", "Januar1", "Februar1", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    var styleHead = 'data-fill-color="ffffff" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"';
    var styleNormal = 'data-fill-color="ffffff" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="false"';
    var styleEmpty = 'data-fill-color="D3D3D3" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="false"';
    var styleNama = 'data-fill-color="ffffff" data-t="s" data-a-v="middle" data-b-a-s="thin" data-f-bold="false"';
    var styleRata = 'data-fill-color="ffffff" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"';
    var styleNonaktif = 'data-fill-color="FEFEC5" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="false"';

    var today = new Date();
    today.setHours(0, 0, 0, 0);

    var catatan = '';

    function createTable(data) {
        docTitle = '';
        var selmapel = $('#opsi-mapel option:selected').text();
        var selkelas = $('#opsi-kelas option:selected').text();
        var thnSel = $("#opsi-tahun option:selected").text();
        var selsmt = $('#opsi-semester option:selected').text();

        var smt = $('#opsi-semester').val();
        var thnSplit = thnSel.split('/');
        var sthn = smt === '1' ? thnSplit[0] : thnSplit[1];

        docTitle += 'Rekap Nilai ' + selmapel + ' ' + selkelas + ' ' + sthn + ' ' + selsmt;

        if (data.mapels.length == 0) {
            $('#konten-absensi').html('<p>Tidak Jadwal untuk mapel ' + selmapel + ' kelas ' + selkelas + '</p>');
            $('#loading').addClass('d-none');
            return;
        }

        var numCol = 0;
        $.each(data.bulans, function (k, v) {
            numCol += Object.keys(data.materi[v]).length;
        });

        var konten = '<div style="width:100%;" id="jdl"><p style="text-align:center;font-size:14pt; font-weight: bold">REKAPITULASI NILAI SISWA</p></div>' +
            '<div style="display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-ms-flex-pack:center;justify-content:center;height:100%;">' +
            '    <table id="atas">' +
            '        <tr>' +
            '            <td colspan="2"><p style="margin: 1px; display: inline;">Mata Pelajaran</p></td>' +
            '            <td><p style="margin: 1px; display: inline;">: <b>' + selmapel + '</b></p></td>' +
            '        </tr>' +
            '        <tr>' +
            '            <td colspan="2"><p style="margin: 1px; display: inline;">Kelas</p></td>' +
            '            <td><p style="margin: 1px; display: inline;">: <b>' + selkelas + '</b></p></td>' +
            '        </tr>' +
            '        <tr>' +
            '            <td colspan="2"><p style="margin: 1px; display: inline;">Tahun/Semester</p></td>' +
            '            <td><p style="margin: 1px; display: inline;">: <b>' + thnSel + ' (' + selsmt + ')</b></p></td>' +
            '        </tr>' +
            '    </table>' +
            '</div><br>' +
            '<table id="log-nilai" class="table" style="width:100%;border:1px solid #c0c0c0;border-collapse: collapse; border-spacing: 0; font-size: 10pt">' +
            '<thead>' +
            '<tr>' +
            '<th rowspan="3" style="min-width: 40px; border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;" ' + styleHead + '>No.</th>' +
            '<th rowspan="3" style="min-width: 100px; border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;" ' + styleHead + '>NIS</th>' +
            '<th rowspan="3" style="min-width: 200px; border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;" ' + styleHead + '>Nama</th>' +
            '<th colspan="' + (numCol + 6) + '" style="border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;" ' + styleHead + '>Bulan</th>' +
            '<th rowspan="3" style="min-width: 100px; border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;" ' + styleHead + '>Nilai Rata-rata</th>' +
            '</tr><tr>';

        $.each(data.bulans, function (k, v) {
            var ind = parseInt(v);
            var lon = Object.keys(data.materi[v]).length;
            konten += '<th colspan="' + lon + '"  style="border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;" ' + styleHead + '>' + namaBulan[ind] + '</th>';
            konten += '<th rowspan="2" class="tanggal" style="border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;" ' + styleHead + '>RT</th>';
            //var th = parseInt(sthn);
            //if (!(th>today.getFullYear()) && !(ind > today.getMonth()) {}
        });

        konten += '</tr><tr>';

        var colWidth = '4,15,35';
        $.each(data.bulans, function (i, bln) {
            var no = 1;
            $.each(data.materi[bln], function (tgl, jam) {
                konten += '<th class="tanggal" style="border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;" ' + styleHead + '>P' + no + '</th>';
                no++;
                colWidth += ',4';
            });
        });
        colWidth += ',4,4,4,4,4,4,15';
        konten += '</tr></thead><tbody>';

        var no = 1;
        $.each(data.log, function (key, value) {
            konten += '<tr>' +
                '<td style="border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;" ' + styleNormal + '>' + no + '</td>' +
                '<td style="border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;" ' + styleNormal + '>' + value.nis + '</td>' +
                '<td class="nama-siswa" style="border: 1px solid #c0c0c0; vertical-align: middle;" ' + styleNama + '>' + value.nama + '</td>';
            var totalMtr = 0;
            var totalNilai = 0;
            $.each(data.bulans, function (i, nbln) {
                var tgls = Object.keys(data.materi[nbln]);
                tgls.sort(function (a, b) {
                    return (a < b) ? -1 : 1;
                });
                var jmlMtrBulan = 0;
                var jmlNilaiBulan = 0;
                $.each(tgls, function (index, tgl) {
                    var a = new Date(sthn, parseInt(nbln) - 1, tgl);
                    var d = a.getDay();
                    var arrJam = [];

                    if (a <= today) {
                        var adaMateri = {}, adaTugas = {};
                        var jadwalPerHari = data.mapels[d];
                        $.each(jadwalPerHari, function (jamke, valJam) {
                            arrJam.push(jamke);
                            adaMateri[jamke] = data.materi[nbln][tgl][jamke]['1'] != null;
                            adaTugas[jamke] = data.materi[nbln][tgl][jamke]['2'] != null;
                        });
                        var bg = 'lightgrey';
                        var style = styleNormal;
                        var nilaiMateri = 0, nilaiTugas = 0;
                        var jmlJamMtr = 0;
                        $.each(arrJam, function (index, jj) {
                            if (adaMateri[jj]) {
                                jmlJamMtr += 1;
                            }
                            if (adaTugas[jj]) {
                                jmlJamMtr += 1;
                            }

                            bg = !adaMateri[jj] && !adaTugas[jj] ? 'lightgrey' : 'white';
                            style = !adaMateri[jj] && !adaTugas[jj] ? styleEmpty : styleNormal;
                            if (value.nilai_materi[nbln] != null && value.nilai_materi[nbln][tgl] != null && value.nilai_materi[nbln][tgl][jj] != null && value.nilai_materi[nbln][tgl][jj].nilai != null) {
                                if (adaMateri[jj]) {
                                    nilaiMateri += parseInt(value.nilai_materi[nbln][tgl][jj].nilai);
                                }
                            }
                            if (value.nilai_tugas[nbln] != null && value.nilai_tugas[nbln][tgl] != null && value.nilai_tugas[nbln][tgl][jj] != null && value.nilai_tugas[nbln][tgl][jj].nilai != null) {
                                if (adaTugas[jj]) nilaiTugas += parseInt(value.nilai_tugas[nbln][tgl][jj].nilai);
                            }
                        });
                        var nilaiHarian = nilaiMateri + nilaiTugas;
                        jmlMtrBulan += jmlJamMtr;
                        jmlNilaiBulan += nilaiHarian;
                        var nm = nilaiMateri == 0 ? '&ensp;' : '' + Math.round(nilaiHarian / jmlJamMtr);
                        konten += '<td style="border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;background: ' + bg + '" ' + style + '>' + nm + '</td>';
                    } else {
                        konten += '<td style="border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;background: #FEFEC5" ' + styleNonaktif + '>&ensp;</td>';
                    }
                });

                totalMtr += jmlMtrBulan;
                totalNilai += jmlNilaiBulan;
                var rtb = jmlMtrBulan == 0 && jmlNilaiBulan == 0 ? '0' : '' + Math.round(jmlNilaiBulan / jmlMtrBulan);
                konten += '<td style="border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;" ' + styleRata + '>' + rtb + '</td>';
            });
            var rts = totalMtr == 0 && totalNilai == 0 ? '0' : '' + Math.round(totalNilai / totalMtr);
            konten += '<td style="border: 1px solid #c0c0c0; text-align: center; vertical-align: middle;margin: 0px;" ' + styleRata + '>' + rts + '</td>' +
                '</tr>';
            no += 1;
        });
        catatan = '<span><b>Catatan:</b></span><ul>' +
            '<li> Jumlah penilaian dihitung dari jumlah hari tiap mapel dalam 1 bulan. </li>' +
            '<li> Nilai harian dihitung rata-rata dari jumlah jam perhari</li>' +
            '</ul>';
        konten += '</tbody></table>' + catatan;
        $('#konten-absensi').html(konten);

        $.each($('table#log-nilai').find('th'), function () {
            if ($(this).hasClass("tanggal")) {
                $(this).html('<p style=" font-size: 8pt; margin: 1px 2px; display: block; text-align: center; vertical-align: middle;"> ' + $(this).html() + '</p>')
            } else {
                $(this).html('<p style="margin: 1px 2px; display: block; text-align: center; vertical-align: middle;"> ' + $(this).html() + '</p>')
            }
        });

        $.each($('table#log-nilai').find('td'), function () {
            if ($(this).hasClass("nama-siswa")) {
                $(this).html('<p style="width: 150px; margin: 1px 2px; -webkit-line-clamp: 1; overflow : hidden; text-overflow: ellipsis; display: -webkit-box;-webkit-box-orient: vertical;"> ' + $(this).text() + '</p>')
            } else {
                $(this).html('<p style="margin: 1px 2px; display: inline;"> ' + $(this).text() + '</p>')
            }
        });

        $('#loading').addClass('d-none');

        var title = $('#jdl').html();
        var trsAtas = $('table#atas tbody').html();
        var trsHead = $('table#log-nilai thead').html();
        var trsBody = $('table#log-nilai tbody').html();
        var copy = '<table id="excel" style="font-size: 11pt;" data-cols-width="' + colWidth + '"><tbody>' +
            '<tr>' +
            '<td colspan="' + (numCol + 9) + '" data-a-v="middle" data-a-h="center" data-f-bold="true">' + title + '</td>' +
            '</tr>' +
            trsAtas +
            '<tr></tr>' +
            trsHead +
            trsBody +
            '<tr></tr>' +
            '<tr>' +
            '<td colspan="' + (numCol + 9) + '" data-a-v="middle"">' + catatan + '</td>' +
            '</tr>' +
            '</tbody>';

        $('#konten-copy').html(copy);
    }

    $(document).ready(function () {
        var selKelas = $('#opsi-kelas');
        var selMapel = $('#opsi-mapel');
        var selTahun = $('#opsi-tahun');
        var selSmt = $('#opsi-semester');

        selMapel.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Mapel</option>");
        selKelas.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Kelas</option>");

        function reload(mapel, kls, thn, smt) {
            var thnSel = $("#opsi-tahun option:selected").text();
            var thnSplit = thnSel.split('/');
            var sthn = smt === '1' ? thnSplit[0] : thnSplit[1];
            var empty = mapel === '' || kls === '' || thn === '' || smt === '' || mapel == null || kls == null || thn == null || smt == null;
            var newData = 'kelas=' + kls + '&mapel=' + mapel + '&tahun=' + thn + '&smt=' + smt + '&stahun=' + sthn;
            console.log(newData);
            if (!empty) {
                $('#loading').removeClass('d-none');

                setTimeout(function () {
                    $.ajax({
                        url: base_url + 'kelasnilai/loadnilaimapel?' + newData,
                        type: "GET",
                        success: function (data) {
                            console.log(data);
                            if (data.length === 0) {
                                $('#log-nilai').html('');
                                $('#loading').addClass('d-none');
                            } else {
                                createTable(data)
                            }
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                }, 500);
            }
        }

        selMapel.on('change', function () {
            reload($(this).val(), selKelas.val(), selTahun.val(), selSmt.val());
        });

        selKelas.change(function () {
            reload(selMapel.val(), $(this).val(), selTahun.val(), selSmt.val());
        });

        selTahun.change(function () {
            reload(selMapel.val(), selKelas.val(), $(this).val(), selSmt.val());
        });

        selSmt.on('change', function () {
            reload(selMapel.val(), selKelas.val(), selTahun.val(), $(this).val());
        });

        //reload('14', '101', '2', '1');
        selMapel.select2({theme: 'bootstrap4'});
        selKelas.select2({theme: 'bootstrap4'});
        selSmt.select2({theme: 'bootstrap4'});
        selTahun.select2({theme: 'bootstrap4'});
    });

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
