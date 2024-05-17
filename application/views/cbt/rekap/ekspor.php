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
                <div class="col-6">
                    <a href="<?= base_url('cbtrekap') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                    <br>
                    <small><i>untuk semua jadwal ujian/ulangan yang sudah direkap</i></small>
                </div>
                <div class="card-body">
                    <?php
                    if (count($rekaps) === 0) : ?>
                        <?php if (!isset($tp_active) || !isset($smt_active)) : ?>
                            <div class="col-12">
                                <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                    Tahun Pelajaran atau Semester belum di set
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                    Belum ada nilai rekap
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-3 mb-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Tahun</span>
                                    </div>
                                    <?php
                                    echo form_dropdown(
                                        'tahun',
                                        $tahuns,
                                        isset($tp_active) ? $tp_active->tahun : '',
                                        'id="opsi-tahun" class="form-control"'
                                    ); ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Semester</span>
                                    </div>
                                    <?php
                                    echo form_dropdown(
                                        'smt',
                                        $semester,
                                        isset($smt_active) ? $smt_active->nama_smt : '',
                                        'id="opsi-semester" class="form-control"'
                                    ); ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Penilaian</span>
                                    </div>
                                    <select name="jenis" id="jenis" class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 mb-2" id="by-kelas">
                                <div class="input-group">
                                    <div class="input-group-prepend w-30">
                                        <span class="input-group-text">Kelas</span>
                                    </div>
                                    <select name="kelas" id="kelas" class="form-control"></select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 mb-2" id="by-mapel">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Mapel</span>
                                    </div>
                                    <select name="mapel" id="opsi-mapel" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row d-none" id="info">
                            <div class="col-12 mb-3">
                                <div class="float-right">
                                    <button type="button" id="rollback"
                                            class="btn btn-warning align-text-bottom d-none">
                                        <i class="fa fa-undo ml-1 mr-1"></i> Nilai Asli
                                    </button>
                                    <button type="button" id="convert" class="btn btn-danger align-text-bottom"
                                            data-toggle="modal" data-target="#perbaikanModal">
                                        <i class="fa fa-star-half-alt ml-1 mr-1"></i> Perbaikan Nilai
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
                        <div id="for-word" class="table-responsive">
                            <br>
                            <table class="table" id="preview" style="font-size: 11pt; width: 100%;">
                            </table>
                        </div>
                        <table class="table d-none" id="table-status" style="font-size: 11pt; width: 100%;"
                               data-cols-width="5,15,35,10">
                        </table>
                    <?php endif; ?>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="perbaikanModal" tabindex="-1" role="dialog" aria-labelledby="perbaikanModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="perbaikanModalLabel">Perbaikan Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Nilai Tertinggi</label>
                    <div class="col-md-8">
                        <input type="text" id="ya" class="form-control" name="ya" value="100"
                               placeholder="Nilai tertinggi yang diinginkan" required>
                        <small>diisi nilai puluhan maksimal 100, misal 80 sampai 100</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Nilai Terrendah</label>
                    <div class="col-md-8">
                        <input type="text" id="yb" class="form-control" name="yb" value="60"
                               placeholder="Nilai terrendah yang diinginkan" required>
                        <small>diisi nilai puluhan dibawah nilai tertinggi, misal 60</small>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <label class="col-md-4 col-form-label">KKM</label>
                    <div class="col-md-8">
                        <input type="text" id="kkm" class="form-control" name="kkm" value="70" placeholder="KKM"
                               required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btn-convert"><i class="fa fa-arrow-right"></i>
                    Konversi
                </button>
            </div>
        </div>
    </div>
</div>

<?= form_open('', array('id' => 'bulk')) ?>
<?= form_close(); ?>

<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/html-docx.js"></script>
<script src="<?= base_url() ?>/assets/app/js/convert-area.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/tableToExcel.js"></script>

<script>
    var newData = '';
    var oldData = '';
    var mplSelected = '0';
    var kodeMapel = 'Semua Mapel';

    var dataNilai;
    var nilai_max = 100;//nilai siswa terbesar
    var nilai_min = 0;//nilai siswa terkecil
    var hasil_max = 100;//batas nilai terbesar
    var hasil_min = 60;//batas nilai terkecil
    var kkm = 70;
    var orientation = 'potrait';

    var jeniss = <?= json_encode($jenis) ?>;
    var kelass = <?= json_encode($kelas) ?>;
    var titleDownload = 'REKAP NILAI ASLI';

    function createPreview(data, convert) {
        if (convert) {
            titleDownload = 'REKAP NILAI KATROL';
            $('#rollback').removeClass('d-none');
            $('#convert').addClass('d-none');
        } else {
            titleDownload = 'REKAP NILAI ASLI';
            $('#convert').removeClass('d-none');
            $('#rollback').addClass('d-none');
        }
        var arrMapel = data.info;
        var lookup = {};
        for (var k = 0, len = arrMapel.length; k < len; k++) {
            lookup[arrMapel[k].id] = arrMapel[k];
        }
        var mpl = arrMapel.length > 1 ? 'Semua Mata Pelajaran' : arrMapel[0].nama_mapel;
        //$('#title-mapel').text(mpl);

        if (oldData !== newData) {
            oldData = newData;
            var opsis = '<option value="0" selected="selected">Semua Jadwal</option>';
            for (let i = 0; i < arrMapel.length; i++) {
                var selected = mplSelected == arrMapel[i].id_jadwal ? 'selected' : '';
                opsis += '<option value="' + arrMapel[i].id_jadwal + '" ' + selected + '>' + arrMapel[i].bank_kode + '</option>';
            }
            $('#opsi-mapel').html(opsis);
        }

        //console.log('mapel', arrMapel);
        var rows = arrMapel.length > 1 ? '2' : '1';
        //var namaMpl = arrMapel.length > 1 ? '' : arrMapel[0].nama_mapel;

        $('.table-header').remove();
        var tinfo = '<table class="table-header"><tr>' +
            '     <td colspan="2" style="width: 120px">Jenis Ujian</td>' +
            '     <td colspan="5">: ' + $("#jenis option:selected").text() + '</td>' +
            ' </tr>' +
            ' <tr>' +
            '     <td colspan="2">Mata Pelajaran</td>' +
            '     <td colspan="5">: ' + mpl + '</td>' +
            ' </tr>' +
            ' <tr>' +
            '     <td colspan="2">Kelas</td>' +
            '     <td colspan="5">: ' + $("#kelas option:selected").text() + '</td>' +
            ' </tr>' +
            ' <tr></tr></table>';
        $('#for-word').prepend(tinfo);

        var thead = '<tr>' +
            '<th rowspan="' + rows + '" class="text-center align-middle" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="width:40px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;background-color: lightgrey;">No.</th>' +
            '<th rowspan="' + rows + '" class="text-center align-middle" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;background-color: lightgrey;">No. Peserta</th>' +
            '<th rowspan="' + rows + '" class="text-center align-middle" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;background-color: lightgrey;">Nama</th>';

        if (rows > 1) {
            thead += '<th colspan="' + arrMapel.length + '" class="text-center align-middle" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;background-color: lightgrey;">Nilai</th>' +
                '<th rowspan="' + rows + '" class="text-center align-middle" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;background-color: lightgrey;">Jumlah</th>' +
                '<th rowspan="' + rows + '" class="text-center align-middle" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;background-color: lightgrey;">Rata-rata</th>' +
                '<th rowspan="' + rows + '" class="text-center align-middle" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;background-color: lightgrey;">Rank</th>' +
                '<th rowspan="' + rows + '" class="text-center align-middle" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;background-color: lightgrey;">Ket.</th>' +
                '</tr>';
        } else {
            thead += '<th colspan="' + arrMapel.length + '" class="text-center align-middle" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;background-color: lightgrey;">Nilai</th>' +
                '<th rowspan="' + rows + '" class="text-center align-middle" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;background-color: lightgrey;">Ket.</th>' +
                '</tr>';
        }

        if (arrMapel.length > 1) {
            thead += '<tr class="head">';
            for (let m = 0; m < arrMapel.length; m++) {
                thead += '<th class="p-1 text-center align-middle" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;background-color: lightgrey;">' + arrMapel[m].kode + '</th>';
            }
            thead += '</tr>';
        }

        var tbody = '';
        var nos = 1;
        $.each(data.siswa, function (ind, v) {
            //var disabled = mulai.includes('-') ? 'disabled' : '';
            var jumlahNilai = 0;
            var i = v.id_siswa;
            tbody += '<tr>' +
                '<td data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;">' + nos + '</td>' +
                '<td data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;">' + v.nomor_peserta + '</td>' +
                '<td data-a-v="middle" data-a-h="left" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse;">' + v.nama + '</td>';
            $.each(arrMapel, function (key, val) {
                var nn = data.nilai[i][val.id_jadwal];
                var nilaiPg = nn == null ? 0 : parseFloat(nn.nilai_pg);
                var nilaiPg2 = nn == null ? 0 : parseFloat(nn.soal_kompleks.nilai);
                var nilaiJod = nn == null ? 0 : parseFloat(nn.soal_jodohkan.nilai);
                var nilaiIs = nn == null ? 0 : parseFloat(nn.soal_isian.nilai);
                var nilaiEs = nn == null ? 0 : parseFloat(nn.soal_essai.nilai);
                var skor = nilaiPg + nilaiPg2 + nilaiJod + nilaiIs + nilaiEs;
                if (convert) {
                    if (skor > 0)
                        skor = (((hasil_max - hasil_min) / 100) * decimalFixed(skor)) + hasil_min;
                } else {
                    if (decimalFixed(skor) > nilai_max) {
                        nilai_max = decimalFixed(skor);
                    }
                    if (decimalFixed(skor) < nilai_max) {
                        nilai_min = decimalFixed(skor);
                    }
                }
                jumlahNilai += decimalFixed(skor);
                var bgFill = skor == kkm ? 'D7F2DA' : (skor > kkm ? 'BEEBC2' : 'FFFFB7');
                tbody += '<td data-a-v="middle" data-a-h="center" data-b-a-s="thin" class="align-middle" data-fill-color="'+bgFill+'" style="border: 1px solid black;border-collapse: collapse; text-align: center;background-color: #'+bgFill+';">' + (''+decimalFixed(skor).toFixed(2)).replace('.', ',') + '</td>';
            });

            var rata2 = decimalFixed(jumlahNilai / arrMapel.length);
            var ketNilai = rata2 == kkm ? 'Tercapai' : (rata2 > kkm ? 'Terlampaui' : 'Remidi');
            var bgFill = rata2 == kkm ? 'D7F2DA' : (rata2 > kkm ? 'BEEBC2' : 'FFFFB7');
            if (arrMapel.length > 1) {
                tbody += '<td class="align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse;text-align: center">' + ('' + decimalFixed(jumlahNilai).toFixed(2)).replace('.', ',') + '</td>';
                tbody += '<td class="total align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-fill-color="'+bgFill+'" style="border: 1px solid black;border-collapse: collapse;text-align: center;background-color: #'+bgFill+';"><b>' + decimalFixed(jumlahNilai / arrMapel.length) + '</b></td>';
                tbody += '<td class="align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse;text-align: center"></td>';
            }
            tbody += '<td class="align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-fill-color="'+bgFill+'" style="border: 1px solid black;border-collapse: collapse;text-align: center;background-color: #'+bgFill+';">' + ketNilai + '</td>';
            tbody += '</tr>';
            nos += 1;
        });

        $('#preview').html('<thead>' + thead + '</thead>' + tbody);

        var texcel = ' <tr>' +
            '     <td colspan="2" style="width: 120px">Jenis Ujian</td>' +
            '     <td colspan="5">:' + $("#jenis option:selected").text() + '</td>' +
            ' </tr>' +
            ' <tr>' +
            '     <td colspan="2">Mata Pelajaran</td>' +
            '     <td colspan="5">:' + mpl + '</td>' +
            ' </tr>' +
            ' <tr>' +
            '     <td colspan="2">Kelas</td>' +
            '     <td colspan="5">:' + $("#kelas option:selected").text() + '</td>' +
            ' </tr>' +
            ' <tr></tr>';
        texcel += thead + tbody;

        $('#table-status').html(texcel);
        $('#info').removeClass('d-none');
        $('#loading').addClass('d-none');

        $(".total")
            .map(function () {
                return $(this).text()
            })
            .get()
            .sort(function (a, b) {
                return a - b
            })
            .reduce(function (a, b) {
                if (b != a[0]) a.unshift(b);
                return a
            }, [])
            .forEach((v, i) => {
                $('.total').filter(function () {
                    return $(this).text() == v;
                }).next().text(i + 1);
            });

        //console.log(nilai_max, nilai_min);
        orientation = rows > 1 ? 'landscape' : 'potrait';
    }

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
                    $('#loading').addClass('d-none');
                    if (response.siswa.length === 0) {
                        $('#opsi-mapel').html('');
                    } else {
                        dataNilai = response;
                        createPreview(response, false)
                    }
                }
            });
        }, 500);
    }

    $(document).ready(function () {
        ajaxcsrf();

        var opsiKelas = $("#kelas");
        var opsiJenis = $('#jenis');
        var opsiTahun = $('#opsi-tahun');
        var opsiSmt = $('#opsi-semester');
        var opsiMapel = $('#opsi-mapel');

        opsiKelas.prepend("<option value='' selected='selected'>Pilih Kelas</option>");
        opsiJenis.prepend("<option value='' selected='selected'>Pilih Jenis</option>");

        function reload(kls, jenis, thn, smt, mpl) {
            var empty = jenis === '' || kls === '' || thn === '' || smt === '' || jenis == null || kls == null || thn == null || smt == null;
            var dataPost = 'kelas=' + kls + '&jenis=' + jenis + '&tahun=' + thn + '&smt=' + smt + '&mapel=' + mpl;
            newData = 'kelas=' + kls + '&jenis=' + jenis + '&tahun=' + thn + '&smt=' + smt;

            console.log(dataPost);
            if (!empty) {
                url = base_url + "cbtrekap/getnilaikelas?" + dataPost;
                refreshStatus();
            } else {
                console.log('empty')
            }
        }

        function changeJenis(thn, smt) {
            opsiJenis.html('');
            changeKelas(thn, smt, null);
            if (jeniss[thn][smt] != null) {
                opsiJenis.append("<option value='' selected='selected'>Pilih Jenis</option>");
                $.each(jeniss[thn][smt], function (k, j) {
                    opsiJenis.append("<option value='" + k + "'>" + j + "</option>")
                });
            } else {
                opsiJenis.append("<option value='' selected='selected'>Tidak ada penilaian</option>");
            }
        }

        function changeKelas(thn, smt, jenis) {
            opsiKelas.html('');
            if (jenis != null && kelass[thn][smt][jenis] != null) {
                opsiKelas.append("<option value='' selected='selected'>Pilih Kelas</option>");
                $.each(kelass[thn][smt][jenis], function (k, j) {
                    opsiKelas.append("<option value='" + k + "'>" + j + "</option>")
                });
            } else {
                opsiKelas.append("<option value='' selected='selected'>Tidak ada kelas</option>");
            }
        }

        opsiTahun.change(function () {
            $("#opsi-mapel select").val("0");
            changeJenis($(this).val(), opsiSmt.val())
        });

        opsiSmt.on('change', function () {
            $("#opsi-mapel select").val("0");
            changeJenis(opsiTahun.val(), $(this).val())
        });

        opsiJenis.on('change', function () {
            $("#opsi-mapel select").val("0");
            changeKelas(opsiTahun.val(), opsiSmt.val(), $(this).val())
        });

        opsiKelas.change(function () {
            $("#opsi-mapel select").val("0");
            reload($(this).val(), opsiJenis.val(), opsiTahun.val(), opsiSmt.val(), '0');
        });

        opsiMapel.on('change', function () {
            mplSelected = $(this).val();
            kodeMapel = $("#opsi-mapel option:selected").text();
            reload(opsiKelas.val(), opsiJenis.val(), opsiTahun.val(), opsiSmt.val(), $(this).val());
        });

        $("#download-word").click(function (event) {
            event.preventDefault();
            var contentDocument = $('#for-word').convertToHtmlFile('detail', '');
            var content = '<!DOCTYPE html>' + contentDocument.documentElement.outerHTML;
            var converted = htmlDocx.asBlob(content, {
                orientation: orientation,
                size: 'A4',
                margins: {top: 700, bottom: 700, left: 1000, right: 1000}
            });
            saveAs(converted, `${titleDownload} ${$("#jenis option:selected").text()} ${kodeMapel} ` +
                `${$("#kelas option:selected").text()} ${$("#opsi-tahun option:selected").text()} smt ${$("#opsi-semester option:selected").text()}.docx`);
        });

        $("#download-excel").click(function (event) {
            var table = document.querySelector("#table-status");
            TableToExcel.convert(table, {
                name: `${titleDownload} ${$("#jenis option:selected").text()} ${kodeMapel} ${$("#kelas option:selected").text()} ${$("#opsi-tahun option:selected").text()} smt ${$("#opsi-semester option:selected").text()}.xlsx`,
                sheet: {
                    name: "Sheet 1"
                }
            });
        });

        $('#perbaikanModal').on('show.bs.modal', function (e) {
            $('#ya').val(hasil_max);
            $('#yb').val(hasil_min);
            $('#kkm').val(kkm);
        });

        $('#btn-convert').click(function (e) {
            hasil_max = parseInt($('#ya').val());
            hasil_min = parseInt($('#yb').val());
            //console.log(hasil_max, hasil_min);
            //console.log(nilai_max, nilai_min);
            kkm = parseInt($('#kkm').val());

            $('#perbaikanModal').modal('hide').data('bs.modal', null);
            $('#perbaikanModal').on('hidden', function () {
                $(this).data('modal', null);
            });
            $('#loading').removeClass('d-none');
            createPreview(dataNilai, true);
        });

        $('#rollback').click(function (e) {
            createPreview(dataNilai, false);
        });

        changeJenis(opsiTahun.val(), opsiSmt.val());
    });

    function decimalFixed(num) {
        return Math.round(num * 100) / 100
    }

</script>
