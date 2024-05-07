<?php
function date_sort($a, $b)
{
    return strtotime($a) - strtotime($b);
}

$allowedDates = [];
?>
<div class="content-wrapper bg-white">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('cbtcetak') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card my-shadow mb-4">
                <div class="card-header">
                    <h3 class="card-title"><b><?= $subjudul ?></b></h3>
                    <div class="card-tools">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip"
                                    title="Print" onclick="print()">
                                <i class="fas fa-print"></i>
                                <span class="d-none d-sm-inline-block ml-1"> Print/PDF</span></button>
                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip"
                                    title="Export As Word" onclick="exportWord()">
                                <i class="fa fa-file-word"></i> <span class="d-none d-sm-inline-block ml-1"> Word</span>
                            </button>
                            <!--
                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip"
                                    title="Export As Excel" onclick="exportExcel()">
                                <i class="fa fa-file-excel"></i> <span class="d-none d-sm-inline-block ml-1"> Excel</span></button>
                                -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <?php
                                echo form_dropdown('jenis', $jenis, $jenis_selected, 'id="jenis" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-4">
                            <div class="form-group">
                                <label for="filter">Filter</label>
                                <?php
                                echo form_dropdown('filter', $filter, $filter_selected, 'id="filter" class="form-control"'); ?>
                            </div>
                        </div>
                        <?php
                        $dnone = $filter_selected == '0' ? 'd-none' : '' ?>
                        <div class='col-md-2 col-4 <?= $dnone ?>' id="tgl-dari">
                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type='text' id="dari" name='dari' value="<?= $dari_selected ?>"
                                       class='tgl form-control' autocomplete='off'/>
                            </div>
                        </div>
                        <div class='col-md-2 col-4 <?= $dnone ?>' id="tgl-sampai">
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type='text' id="sampai" name='sampai'
                                       class='tgl form-control' value="<?= $sampai_selected ?>"
                                       autocomplete='off'/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center bg-gray-light">
                    <div id="print-preview">
                        <?php
                        $none = count($jadwals_ruang) > 0 ? '' : 'd-none';
                        if (count($jadwals_ruang) > 0):
                            $list_ruang = array_keys($jadwals_ruang);
                            foreach ($list_ruang as $rng) :
                                ?>
                                <div style="background: white; width: 210mm; min-height: 297mm; padding: 1mm;white-space: nowrap;"
                                     class="border my-shadow m-4 p-5">
                                    <table id="table-header-print" style="width: 100%; border: 0;">
                                        <tr>
                                            <td style="width:15%;">
                                                <img alt="logo kiri" id="prev-logo-kanan-print" width="85" height="85"
                                                     src="<?= isset($setting->logo_kiri) ? base_url() . $setting->logo_kiri : '' ?>"
                                                     style="width:85px; height:85px; margin: 6px;">
                                            </td>
                                            <td style="width:70%; text-align: center;">
                                                <div style="line-height: 1.1; font-family: 'Times New Roman'; font-size: 14pt"><?= $setting->sekolah ?></div>
                                                <div style="line-height: 1.1; font-family: 'Times New Roman'; font-size: 16pt">
                                                    <b>DAFTAR PENGAWAS</b></div>
                                                <div style="line-height: 1.2; font-family: 'Times New Roman'; font-size: 13pt"><?= strtoupper($jenis_ujian->nama_jenis ?? '' . ' (' . $jenis_ujian->kode_jenis . ')') ?></div>
                                                <div style="line-height: 1.2; font-family: 'Times New Roman'; font-size: 12pt">
                                                    Tahun Pelajaran: <?= $tp_active->tahun ?></div>
                                            </td>
                                            <td style="width:15%;">
                                                <img alt="logo kanan" id="prev-logo-kiri-print"
                                                     src="<?= isset($setting->logo_kanan) ? base_url() . $setting->logo_kanan : '' ?>"
                                                     width="85" height="85"
                                                     style="width:85px; height:85px; margin: 6px; border-style: none">
                                            </td>
                                        </tr>
                                    </table>
                                    <hr style="border: 1px solid; margin-bottom: 6px; margin-top: 2px">
                                    <p><?= $rng ?></p>
                                    <table class="tbl-pengawas" style="width: 100%; border-collapse: collapse">
                                        <thead>
                                        <tr style="font-family: 'Times New Roman'; font-size: 12pt">
                                            <th style="border: 1px solid black; height: 40px; text-align: center;">Hari
                                                & Tanggal
                                            </th>
                                            <!--
                                            <th style="border: 1px solid black; height: 40px; text-align: center;">Ruang</th>
                                            -->
                                            <th style="border: 1px solid black; height: 40px; text-align: center;">
                                                Sesi
                                            </th>
                                            <!--
                                            <th class="text-center align-middle">Jam ke</th>
                                            -->
                                            <th style="border: 1px solid black; height: 40px; text-align: center;">Mata
                                                Pelajaran
                                            </th>
                                            <th style="border: 1px solid black; height: 40px; text-align: center;">
                                                Pengawas
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($jadwals_ruang[$rng] as $jadwal) :
                                            ?>
                                            <tr style="font-family: 'Times New Roman'; font-size: 11pt">
                                                <td style="line-height: 1.5;border: 1px solid black; text-align: center;"><?= str_replace(',', '<br>', singkat_tanggal(date('D,d M Y', strtotime($jadwal->tanggal)))) ?></td>
                                                <!--
                                            <td style="line-height: 1.5;border: 1px solid black; text-align: center;"><?= $jadwal->ruang ?></td>
                                            -->
                                                <td style="line-height: 1.5;border: 1px solid black; text-align: center;"><?= $jadwal->sesi ?></td>
                                                <!--
                                <td class="text-center align-middle"><?= $jadwal->waktu ?></td>
                                -->
                                                <td style="line-height: 1.5;border: 1px solid black; text-align: center;"><?= $jadwal->mapel ?></td>
                                                <td style="line-height: 1.5;border: 1px solid black; text-align: center;"><?= $jadwal->pengawas ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div id="konten-copy" class="d-none"></div>
                                </div>
                                <div style="page-break-after: always"></div>
                            <?php endforeach; endif; ?>
                    </div>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<script src="<?= base_url() ?>/assets/app/js/print-area.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/html-docx.js"></script>
<script src="<?= base_url() ?>/assets/app/js/convert-area.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/jquery.wordexport.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/tableToExcel.js"></script>
<script src="<?= base_url() ?>/assets/app/js/jquery.rowspanizer.js"></script>
<script>
    var docTitle = "<?=$judul?>" + " <?=$jenis[$jenis_selected]?>";

    $(document).ready(function () {
        ajaxcsrf();

        $(".tbl-pengawas").rowspanizer({
            columns: [0, 1, 2],
            vertical_align: "middle"
        });

        var allowed = JSON.parse("<?=json_encode($allowedDates)?>");
        //console.log(allowed);
        $('.tgl').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            timepicker: false,
            scrollInput: false,
            scrollMonth: false,
            format: 'Y-m-d',
            disabledWeekDays: [0],
            //allowDates: allowed,
            formatDate: 'Y-m-d',
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom'
            }
        });

        var opsiJenis = $("#jenis");
        var opsiFilter = $("#filter");
        var opsiDari = $("#dari");
        var opsiSampai = $("#sampai");

        opsiFilter.change(function () {
            if ($(this).val() == '0') {
                $('#tgl-dari').addClass('d-none');
                $('#tgl-sampai').addClass('d-none');
                var jenis = opsiJenis.val();
                var url = base_url + 'cbtcetak/pengawas?jenis=' + jenis + '&filter=0';
                if (jenis != "") {
                    $('#loading').removeClass('d-none');
                    window.location.href = url;
                }
            } else {
                $('#tgl-dari').removeClass('d-none');
                $('#tgl-sampai').removeClass('d-none');
            }
        });

        var old = "<?=$jenis_selected?>";
        opsiJenis.change(function () {
            //var jj = $(this).val();
            //if (jj != "" && jj !== old) {
            getAllJadwal();
            //window.location.href = base_url + 'cbtalokasi?jenis=' + jj + '&level=' + opsiLevel.val();
            //}
        });

        var dariold = "<?=$dari_selected?>";
        opsiDari.change(function () {
            var dari = $(this).val();
            if (dari != "" && dari !== dariold) {
                getAllJadwal();
            }
        });

        var sampaiold = "<?=$sampai_selected?>";
        opsiSampai.change(function () {
            var sampai = $(this).val();
            if (sampai != "" && sampai !== sampaiold) {
                getAllJadwal();
            }
        });

        opsiJenis.select2({theme: 'bootstrap4'});

        function getAllJadwal() {
            var dari = opsiDari.val();
            var sampai = opsiSampai.val();
            var jenis = opsiJenis.val();
            var fil = opsiFilter.val();

            var tglKosong = fil == '1' && (dari == "" || sampai == "");
            var url = base_url + 'cbtcetak/pengawas?jenis=' + jenis + '&filter=' + opsiFilter.val() + '&dari=' + dari + '&sampai=' + sampai;
            if (jenis != "" && !tglKosong) {
                $('#loading').removeClass('d-none');
                window.location.href = url;
            }
        }

        $('#selector button').click(function () {
            $(this).addClass('active').siblings().addClass('btn-outline-primary').removeClass('active btn-primary');

            if (!$('#by-kelas').is(':hidden')) {
                $('#by-kelas').addClass('d-none');
                $('#by-ruang').removeClass('d-none');
            } else {
                $('#by-kelas').removeClass('d-none');
                $('#by-ruang').addClass('d-none');
            }
        });
    });

    function print() {
        var title = document.title;
        document.title = docTitle;
        $('#print-preview').print(docTitle);
        document.title = title;
    }

    function exportWord() {
        var contentDocument = $('#print-preview').convertToHtmlFile(docTitle, '');
        var content = '<!DOCTYPE html>' + contentDocument.documentElement.outerHTML;
        //console.log('css', content);
        var converted = htmlDocx.asBlob(content, {
            //orientation: 'landscape',
            size: 'A4',
            margins: {top: 700, bottom: 700, left: 1000, right: 1000}
        });
        saveAs(converted, docTitle + '.docx');
    }

    function exportExcel() {
        /*
        var title = $('#jdl').html();
        var trsAtas = $('table#atas tbody').html();
        var trsHead = $('table#log-nilai thead').html();
        var trsBody = $('table#log-nilai tbody').html();
        var copy = '<table id="excel" style="font-size: 11pt;" data-cols-width="'+colWidth+'"><tbody>' +
            '<tr>' +
            '<td colspan="'+ (numCol+9) +'" data-a-v="middle" data-a-h="center" data-f-bold="true">' + title + '</td>' +
            '</tr>' +
            trsAtas +
            trsHead +
            trsBody +
            '<tr>' +
            '<td colspan="'+ (numCol+9) +'" data-a-v="middle"">' + catatan + '</td>' +
            '</tr>' +
            '</tbody>';
            */
        $('#konten-copy').html(copy);


        var table = document.querySelector("#excel");
        TableToExcel.convert(table, {
            name: docTitle + '.xlsx',
            sheet: {
                name: "Sheet 1"
            }
        });
    }

</script>
