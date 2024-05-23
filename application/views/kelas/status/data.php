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
                        <a type="button" href="<?= base_url('kelasstatus') ?>" class="btn btn-sm btn-default">
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
                    //echo '<pre>';
                    //var_dump($mapel);
                    //echo '</pre>';
                    ?>
                    <?= form_open('', array('id' => 'formselect')) ?>
                    <?= form_close(); ?>
                    <div class="row">
                        <div class="col-md-4 mb-2 d-none">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Guru</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'guru',
                                    $gurus,
                                    null,
                                    'id="dropdown-guru" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Mapel</span>
                                </div>
                                <?php
                                $mapels = ['0' => 'Pilih Mapel'] + $mapels;
                                echo form_dropdown(
                                    'mapel',
                                    $mapels,
                                    null,
                                    'id="dropdown-mapel" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Kelas</span>
                                </div>
                                <select id="kelas-materi" class="form-control">
                                    <optgroup label="Materi" id="kls-materi">
                                    </optgroup>
                                    <optgroup label="Tugas" id="kls-tugas">
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Materi/Tugas</span>
                                </div>
                                <select id="dropdown-materi" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="table-info" class="table-responsive d-none">
                        <table id="atas" class="table table-sm table-borderless">
                            <tbody>
                            <tr>
                                <th colspan="2" class="border-bottom" id="label-jenis">MATERI</th>
                                <th colspan="3" class="border-bottom" id="info-judul">MATERI</th>
                                <th colspan="3" class="border-bottom">PELAKSANAAN</th>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-bold" style="width: 100px">Mapel</td>
                                <td colspan="3" id="info-mapel">Sejarah</td>
                                <td class="text-bold" style="width: 100px">Jam ke</td>
                                <td colspan="2" id="info-jam">....</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-bold">Guru</td>
                                <td colspan="3" id="info-guru">....</td>
                                <td class="text-bold">Dari</td>
                                <td colspan="2" id="info-dari">....</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-bold">Kelas</td>
                                <td colspan="3" id="info-kelas">....</td>
                                <td class="text-bold">Sampai</td>
                                <td colspan="2" id="info-sampai">....</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-md-6"></div>
                        <div class="col-12 col-md-6 text-right">
                            <label class="d-flex flex-row align-items-center">
                                Search: <input type="text" id="search" class="ml-1 form-control form-control-sm">
                            </label>
                        </div>
                    </div>
                    <div id="preview" class="table-responsive">
                        <div id="table-title" class="d-none" style="width:100%;">
                            <p id="title-doc" style="text-align:center;font-size:14pt; font-weight: bold"></p>
                        </div>
                        <table id="log" class="table table-striped table-bordered table-hover"
                               style="width: 100%;border: 1px solid #c0c0c0; border-collapse: collapse;">
                        </table>
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

<div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="daftarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daftarLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid border">
                    <div id="konten-hasil" class="row" style="word-wrap: break-word">
                    </div>
                    <hr>
                    <div id="konten-nilai" class="row p-2">
                        <div class="col-4 mb-3 border text-center align-middle">
                            <div id="nilai-hasil" style="font-size: 60pt">
                            </div>
                        </div>
                        <div class="col-8">
                            <?= form_open('', array('id' => 'formnilai')) ?>
                            <div class="row">
                                <div class="col-12 col-md-4 mb-3">
                                    <label id="label-title">Beri Nilai</label>
                                    <input class="form-control" name="nilai" id="nilai" type="text" required>
                                    <input type="hidden" name="id_log" id="id-log">
                                    <input type="hidden" name="method" id="method">
                                </div>
                                <div class="col-12 col-md-8 mb-3">
                                    <span><b>Info</b></span>
                                    <br>
                                    <small>
                                        Kosongkan (<b>0</b>) jika siswa harus mengulang materi/tugas.
                                    </small>
                                </div>
                                <div class="col-12">
                                    <label>Catatan Untuk Siswa</label>
                                    <textarea id="catatan" class="form-control" name="catatan"></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Simpan Nilai</button>
                                </div>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>/assets/app/js/print-area.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/convertCss.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/html-docx.js"></script>
<script src="<?= base_url() ?>/assets/app/js/convert-area.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/tableToExcel.js"></script>

<script>
    var kelas = JSON.parse('<?= json_encode($kelas)?>');
    var arrKelasMateri = [];
    var arrKelasTugas = [];
    var form;
    var resultAll = {};

    var namaKelas = '';
    var namaMapel = '';
    var tanggalSingkat = '';
    var tanggalLengkap = '';
    var docTitle = '';
    let label = '';
    const idGuru = '<?=isset($guru) ? $guru->id_guru : ""?>';

    // style excel
    var styleHead = ' data-fill-color="d3d3d3" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true"';
    var styleNormal = ' data-fill-color="ffffff" data-t="s" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="false"';
    var styleNama = ' data-fill-color="ffffff" data-t="s" data-a-v="middle" data-b-a-s="thin" data-f-bold="false"';

    $(document).ready(function () {
        form = $('#formselect');
        var dropMapel = $('#dropdown-mapel');
        dropMapel.select2({
            theme: "bootstrap4",
        });
        var dropKelas = $('#kelas-materi')
        dropKelas.select2({
            theme: "bootstrap4",
        });
        var dropMateri = $('#dropdown-materi')
        dropMateri.select2({
            theme: "bootstrap4",
        });

        dropMapel.on('change', function () {
            //console.log($(this).val());
            $.ajax({
                method: "GET",
                url: base_url + "kelasstatus/getmaterimapel?id=" + $(this).val() + '&id_guru='+idGuru,
                success: function (response) {
                    console.log('response', response);
                    arrKelasMateri = response.materi;
                    arrKelasTugas = response.tugas;
                    createDropdownKelas(response.kelas);
                }
            });
        });

        dropKelas.on('change', function () {
            var val = $(this).val();
            label = $('#kelas-materi :selected').parent().attr('label');
            createDropdownMateri(val);
        });

        dropMateri.on('change', function () {
            getLogSiswa($('#kelas-materi :selected').parent().attr('label'));
        });

        $('#daftarModal').on('show.bs.modal', function (e) {
            var key = $(e.relatedTarget).data('key');
            var konten = $('#konten-hasil');
            //console.log(resultAll[key]);
            var val = resultAll[key];
            var html = '';
            $('#daftarLabel').text('Hasil Siswa ' + val.nama);
            konten.html(html);

            if (val.selesai == null) {
                html = '<div class="col-12 mb-3 mt-3">' +
                    '<div class="border p-2">Siswa belum menyelesaikan materi</div></div>';
                konten.append(html);
                $('#method').val('add');

            } else {
                var catatan = val.text === '' ? 'Siswa tidak mencantumkan catatan' : val.text;
                html = '<div class="col-12 mb-3 mt-3">' +
                    '<div class="border p-2">' + catatan + '</div></div>';
                konten.append(html);

                for (let i = 0; i < val.file.length; i++) {
                    var file = val.file[i];
                    var fsrc = file.src.split('.');
                    var ext = fsrc[fsrc.length - 1];
                    if (file.type.match('image')) {
                        html = '<div class="col-3 mb-3">' +
                            '<img data-enlargeable src="' + base_url + '/' + file.src + '" alt="" class="img-thumbnail"></div>';
                    } else if (file.type.match('video')) {
                        html = '<div class="col-3 mb-3">' +
                            '<img src="' + base_url + '/assets/app/img/icon_play_black.png' + '" class="img-thumbnail"' +
                            ' onClick="parent.open(\'' + base_url + '/' + file.src + '\')">' +
                            '</div>';
                    } else {
                        var icon = base_url;
                        var style = '';
                        if (ext === 'doc' || ext === 'docx') {
                            icon += '/assets/app/img/word-icon.png';
                        } else if (ext === 'xls' || ext === 'xlsx') {
                            icon += '/assets/app/img/excel-icon.png';
                        } else if (ext === 'pdf') {
                            icon += '/assets/app/img/pdf-icon.png';
                        } else {
                            icon += '/assets/app/img/document-icon.svg';
                            style = "style='padding: 10px'";
                        }
                        html = '<div class="col-3 mb-3">' +
                            '<a href="' + base_url + '/' + file.src + '"><img src="' + icon + '" alt="" class="img-thumbnail" onclick="dialogDownload()">' +
                            '</a></div>';
                        //html = '<div class="col-3 mb-3"><img src="'+base_url+'/assets/app/img/document-icon.svg" class="img-thumbnail"></div>';
                    }
                    konten.append(html);
                }

                $('img[data-enlargeable]').addClass('img-enlargeable').click(function () {
                    var src = $(this).attr('src');
                    var modal;

                    function removeModal() {
                        modal.remove();
                        $('body').off('keyup.modal-close');
                    }

                    modal = $('<div>').css({
                        background: 'RGBA(0,0,0,.8) url(' + src + ') no-repeat center',
                        backgroundSize: 'contain',
                        width: '100%', height: '100%',
                        position: 'fixed',
                        zIndex: '10000',
                        top: '0', left: '0',
                        cursor: 'zoom-out'
                    }).click(function () {
                        removeModal();
                    }).appendTo('body');
                    //handling ESC
                    $('body').on('keyup.modal-close', function (e) {
                        if (e.key === 'Escape') {
                            removeModal();
                        }
                    });
                });
                $('#method').val('update');
            }
            var ttl = val.nilai === '' ? 'Beri Nilai' : 'Edit Nilai';
            var nilaiHasil = val.nilai === '' ? '' : val.nilai;
            var catatanGuru = val.catatan === '' ? '' : val.catatan;

            var idMateri = $('#dropdown-materi').val();
            $('#id-log').val(key + '' + idMateri);
            //console.log('id', key + '' + idMateri);
            $('#label-title').text(ttl);
            $('#nilai-hasil').text(nilaiHasil);
            $('#nilai').val(nilaiHasil);
            $('#catatan').html(catatanGuru);

        });

        $('#formnilai').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());

            $.ajax({
                url: base_url + "kelasstatus/savenilai",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize() + '&label=' + label,
                success: function (data) {
                    console.log("result", data);
                    $('#daftarModal').modal('hide').data('bs.modal', null);
                    $('#daftarModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showSuccessToast('Data berhasil disimpan.');
                    getLogSiswa()
                }, error: function (xhr, status, error) {
                    $('#daftarModal').modal('hide').data('bs.modal', null);
                    $('#daftarModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    console.log("error", xhr.responseText);
                    showDangerToast('ERROR');
                }
            });
        });

        //if (dropGuru.val()!= '') dropGuru.change();
        if (dropMapel.val() != '0') dropMapel.change();
        //calculateTime("2010-11-10 06:50:40", "2010-11-16 08:58:40")
    });

    function createDropdownKelas(arrKelas) {
        var klsMateri = $('#kls-materi');
        var klsTugas = $('#kls-tugas');
        klsMateri.html('');
        klsTugas.html('');

        let testTugas = [], testMateri = [];

        if (arrKelas != null && arrKelas['1'] != null) {
            console.log("arrMateri", arrKelas['1'])
            for (let j = 0; j < arrKelas['1'].length; j++) {
                if (kelas[arrKelas['1'][j]] !== undefined)
                    klsMateri.append('<option value="' + arrKelas['1'][j] + '">' + kelas[arrKelas['1'][j]] + '</option>');
            }
        } else {
            klsMateri.append('<option value="-">- -</option>');
        }

        if (arrKelas != null && arrKelas['2'] != null) {
            console.log("arrTugas", arrKelas['2'])
            for (let j = 0; j < arrKelas['2'].length; j++) {
                klsTugas.append('<option value="' + arrKelas['2'][j] + '">' + kelas[arrKelas['2'][j]] + '</option>');
            }
        } else {
            klsTugas.append('<option value="-">- -</option>');
        }
        label = $('#kelas-materi :selected').parent().attr('label');

        var dropKelas = $('#kelas-materi')
        dropKelas.select2({
            theme: "bootstrap4",
        });
        createDropdownMateri($('#kelas-materi').val());
    }

    function createDropdownMateri(kelas) {
        var dropMateri = $('#dropdown-materi');
        dropMateri.html('');

        if (label === 'Materi') {
            console.log('arr', arrKelasMateri[kelas]);
            if (arrKelasMateri[kelas] != null && arrKelasMateri[kelas].length > 0) {
                for (let j = 0; j < arrKelasMateri[kelas].length; j++) {
                    const date = stringToDate(arrKelasMateri[kelas][j].jadwal);
                    tanggalSingkat = dateToString(date);
                    tanggalLengkap = dateToStringDay(date);
                    dropMateri.append('<option value="' + arrKelasMateri[kelas][j].id_kjm + '">' + arrKelasMateri[kelas][j].kode + ' ' + tanggalSingkat + '</option>');
                    //arrJadwal[arrKelasMateri[kelas][j].id_kjm] = tgl;
                }
            } else {
                dropMateri.append('<option value="">Belum ada materi</option>');
            }
        } else {
            console.log('arr', arrKelasTugas[kelas]);
            if (arrKelasTugas[kelas] != null && arrKelasTugas[kelas].length > 0) {
                for (let k = 0; k < arrKelasTugas[kelas].length; k++) {
                    const date = stringToDate(arrKelasTugas[kelas][k].jadwal);
                    tanggalSingkat = dateToString(date);
                    tanggalLengkap = dateToStringDay(date);
                    dropMateri.append('<option value="' + arrKelasTugas[kelas][k].id_kjm + '">' + arrKelasTugas[kelas][k].kode + ' ' + tanggalSingkat + '</option>');
                }
            } else {
                dropMateri.append('<option value="">Belum ada tugas</option>');
            }
        }
        dropMateri.select2({
            theme: "bootstrap4",
        });
        getLogSiswa();
    }

    function getLogSiswa() {
        var selMateri = $('#dropdown-materi').val();
        var selKelas = $('#kelas-materi').val();
        if (selKelas === '-' || selKelas == null) {
            $('#log').html('<tr><td>Tidak ada data</td></tr>');
            $('#table-info').addClass('d-none')
            return;
        }

        $('#loading').removeClass('d-none');

        setTimeout(function () {
            $.ajax({
                type: 'POST',
                url: base_url + 'kelasstatus/loadstatus',
                data: form.serialize() + '&id_kjm=' + selMateri + '&id_kelas=' + selKelas + '&label=' + label,  //{id_materi: selMateri, id_kelas: selKelas},
                success: function (data) {
                    console.log('result', data);
                    $('#table-info').removeClass('d-none')
                    $('#label-jenis').text(label.toUpperCase())
                    $('#info-judul').text(': '+data.detail.judul)
                    $('#info-mapel').text(': '+data.detail.mapel || '-')
                    $('#info-guru').text(': '+data.detail.guru || '-')
                    $('#info-kelas').text(': '+data.detail.kelas || '-')
                    $('#info-jam').text(': '+data.detail.jam_ke || '-')
                    $('#info-dari').text(': '+data.detail.waktu.dari || '-')
                    $('#info-sampai').text(': '+data.detail.waktu.sampai || '-')

                    resultAll = data.log;
                    var table = $('#log');
                    table.empty();
                    var html = '<thead>' +
                        '<tr style="background-color:lightgrey;">' +
                        '<th rowspan="2" height="50" width="50" class="align-middle text-center p-0 center" '+ styleHead +'>No.</th>' +
                        '<th rowspan="2" class="align-middle text-center d-none d-md-table-cell center" '+ styleHead +'>NIS</th>' +
                        '<th rowspan="2" class="align-middle text-center center" '+ styleHead +'>Nama Siswa</th>' +
                        '<th rowspan="2" class="align-middle text-center p-0 d-none d-md-table-cell center" '+ styleHead +'>Kelas</th>' +
                        '<th colspan="3" class="text-center align-middle center" '+ styleHead +'>Kehadiran</th>' +
                        '<th rowspan="2" class="text-center align-middle hidden center" data-exclude="true" '+ styleHead +'>Hasil</th>' +
                        '<th rowspan="2" class="text-center align-middle center" '+ styleHead +'>Nilai</th>' +
                        '</tr>' +
                        '<tr style="background-color:lightgrey;">' +
                        '<th class="text-center align-middle center" '+ styleHead +'>Buka ' + label + '</th>' +
                        '<th class="text-center align-middle center" '+ styleHead +'>Selesai</th>' +
                        '<th class="text-center align-middle center" '+ styleHead +'>Keterangan</th>' +
                        '</tr>' +
                        '</thead><tbody>';

                    var no = 1;
                    $.each(resultAll, function (key, value) {
                        var login = '- -  :  - -';
                        var mulai = '- -  :  - -';
                        var selesai = '- -  :  - -';
                        var nilai = '';
                        var ketMulai = 'Belum mengerjakan';

                        if (value.login != null) {
                            login = createTime(value.login);
                        }

                        if (value.mulai != null) {
                            mulai = buatTanggal(value.mulai);
                            if (value.selesai == null) ketMulai = '<i class="fa fa-spinner fa-spin mr-2"></i> Mengerjakan';
                        }

                        if (value.mulai != null && value.selesai != null) {
                            nilai = value.nilai == null ? '' : value.nilai;
                            selesai = buatTanggal(value.selesai);
                            /*
                            //calculate jam pelajaran
                            var tgl = value.jadwal_materi;
                            var mulaiKbm = data.jadwal.kbm_jam_mulai;
                            var dateMulai = new Date(tgl + "T" + mulaiKbm);
                            var perMapel = data.jadwal.kbm_jam_pel;

                            var items = {};
                            for (let i = 0; i < data.jadwal.kbm_jml_mapel_hari; i++) {
                                var jk = i + 1;

                                for (let j = 0; j < data.jadwal.istirahat.length; j++) {
                                    var istJamKe = data.jadwal.istirahat[j].ist;
                                    var istDur = data.jadwal.istirahat[j].dur;

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
                            var tglJadwal = items[jamke] !== undefined ? formatDate(items[jamke]) : '';
                            var diff = tglJadwal != '' ? calculateTime(tglJadwal, value.selesai) : '';
                            ketMulai = diff == '' ? '' : 'Selesai, Terlambat <br>' + diff;
                             */

                            //console.log('diff', value.diff)
                            if (value.diff.terlambat) {
                                ketMulai = 'Selesai, terlambat ';
                                if (value.diff.days > 0) {
                                    ketMulai += value.diff.days + ' hari ';
                                }
                                if (value.diff.jam > 0) {
                                    ketMulai += value.diff.jam + ' jam ';
                                }
                                if (value.diff.menit > 0) {
                                    ketMulai += value.diff.menit + ' mnt';
                                }
                            } else {
                                ketMulai = 'Selesai';
                            }
                        }

                        html +=
                            '<tr>' +
                            '<td class="align-middle text-center center" '+ styleNormal +'>' + no + '</td>' +
                            '<td class="align-middle d-none d-md-table-cell middle" '+ styleNormal +'>' + value.nis + '</td>' +
                            '<td class="align-middle middle" '+ styleNama +'>' + value.nama + '</td>' +
                            '<td class="align-middle text-center d-none d-md-table-cell center" '+ styleNormal +'>' + value.kelas + '</td>' +
                            //'<td class="align-middle text-center">' + login + '</td>' +
                            '<td class="align-middle text-center center" '+ styleNormal +'>' + mulai + '</td>' +
                            '<td class="align-middle text-center center" '+ styleNormal +'>' + selesai + '</td>' +
                            '<td class="align-middle text-center center" '+ styleNama +'>' + ketMulai + '</td>' +
                            '<td class="align-middle text-center hidden" data-exclude="true" >' +
                            '<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#daftarModal" data-key="' + key + '">LIHAT</button>' +
                            '</td>' +
                            '<td class="align-middle text-center center"'+ styleNormal +'>' + nilai + '</td>' +
                            '</tr>';
                        no++;
                    });

                    html += '</tbody>';
                    table.append(html);

                    namaKelas = $("#kelas-materi option:selected").text();
                    namaMapel = $("#dropdown-mapel option:selected").text();
                    $('#title-doc').html('NILAI HARIAN ' + namaMapel.toUpperCase() + '<br>KELAS ' + namaKelas + '<br>' + tanggalLengkap);

                    $('#loading').addClass('d-none');

                    $('input#search').quicksearch('table#log tbody tr');

                    var colWidth = '5,15,35,15,25,25,40,10';
                    var trsAtas = $('table#atas tbody').html();
                    var trsHead = $('table#log thead').html();
                    var trsBody = $('table#log tbody').html();
                    var copy = '<table id="excel" style="font-size: 11pt;" data-cols-width="' + colWidth + '"><tbody>' +
                        trsAtas +
                        '<tr></tr>' +
                        trsHead +
                        trsBody +
                        '</tbody>';

                    $('#konten-copy').html(copy);
                }
            });
        }, 300);
    }

    function createTime(d) {
        var date = new Date(d);

        var jam = date.getHours();
        var menit = date.getMinutes();
        var sJam;
        var sMenit;

        if (jam < 10) sJam = '0' + jam;
        else sJam = '' + jam;

        if (menit < 10) sMenit = '0' + menit;
        else sMenit = '' + menit;

        var hari = daysdifference(d);
        var time;

        if (hari === 0) {
            time = sJam + ':' + sMenit;
        } else if (hari === 1) {
            time = 'kemarin, ' + sJam + ':' + sMenit;
        } else {
            time = jQuery.timeago(d) + ', ' + sJam + ':' + sMenit;
        }
        return time;
    }

    function daysdifference(last) {
        var startDay = new Date(last);
        var endDay = new Date();

        var millisBetween = startDay.getTime() - endDay.getTime();
        var days = millisBetween / (1000 * 3600 * 24);

        return Math.round(Math.abs(days));
    }

    function buatTanggal(string) {
        var hari = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
        var bulans = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        var kalender = string.split(" ")[0];
        var waktu = string.split(" ")[1];

        const date = kalender.split("-");
        const time = waktu.split(":");

        var tanggal = date[2];
        var bulan = date[1] - 1;
        var tahun = date[0];

        var jam = time[0];
        var menit = time[1];
        var detik = time[2];

        var d = new Date(tahun, bulan, tanggal, jam, menit, detik);
        var curr_day = d.getDay();
        /*
        var curr_date = d.getDate();
        var curr_month = d.getMonth();
        var curr_year = d.getFullYear();
        var curr_jam = d.getHours();
        var curr_mnt = d.getMinutes();
        console.log('res', d.getDay());
        */

        //return hari[curr_day] + ", " + curr_date + "  " + bulans[curr_month] + " " + curr_year + " <br><b>" + curr_jam + ":" + curr_mnt + "</b>";
        return hari[curr_day] + ", " + tanggal + "  " + bulans[parseInt(bulan)] + " " + tahun + " <br><b>" + jam + ":" + menit + "</b>";
    }

    function calculateTime(jadwal, selesai) {
        var ONE_MINUTE = 1000 * 60;
        var ONE_HOUR = ONE_MINUTE * 60;
        var ONE_DAY = ONE_HOUR * 24;

        var old_date = jadwal.replace(" ", "T");//"2010-11-10T07:30:40";
        var new_date = selesai.replace(" ", "T");//"2010-11-15T08:03:22";

        // Convert both dates to milliseconds
        var old_date_obj = new Date(old_date).getTime();
        var new_date_obj = new Date(new_date).getTime();

        // Calculate the difference in milliseconds
        var difference_ms = Math.abs(new_date_obj - old_date_obj)

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

        return w + " " + j;
    }

    function cloneTable() {
        docTitle = 'NILAI HARIAN ' + namaMapel + ' ' + namaKelas + ' ' + tanggalSingkat.toUpperCase();

        var styleCenterMiddle = 'border: 1px solid #c0c0c0; border-collapse: collapse; text-align: center; vertical-align: middle;';
        var styleLeftMiddle = 'border: 1px solid #c0c0c0; border-collapse: collapse; vertical-align: middle;';
        var thStyle = 'border: 1px solid #c0c0c0; border-collapse: collapse; text-align: center; vertical-align: middle; background-color: lightgrey';

        var html = $('#preview').clone();
        html.find('.hidden').remove();
        html.find('.center').attr('style', styleCenterMiddle);
        html.find('.middle').attr('style', styleLeftMiddle);
        html.find('th').attr('style', thStyle);
        html.find('table').removeAttr('class');
        html.find('thead').removeAttr('class');
        html.find('th').removeAttr('class');
        html.find('td').removeAttr('class');

        $.each(html.find('th'), function () {
            $(this).html('<p style="margin: 1px 4px; display: inline;">' + $(this).text() + '</p>')
        });

        $.each(html.find('td'), function () {
            $(this).html('<p style="margin: 1px 4px; display: inline;">' + $(this).text() + '</p>')
        });
        //<p style="margin: 1px; display: inline;">Kelas</p>

        return html;
    }

    function print() {
        var title = document.title;
        document.title = docTitle;
        var html = cloneTable();
        html.print();
        document.title = title;
    }

    function exportWord() {
        var contentDocument = cloneTable().convertToHtmlFile(docTitle, '');
        var content = '<!DOCTYPE html>' + contentDocument.documentElement.outerHTML;
        //console.log('css', content);
        var converted = htmlDocx.asBlob(content, {
            orientation: 'landscape',
            size: 'A4',
            margins: {top: 700, bottom: 700, left: 1000, right: 1000}
        });
        saveAs(converted, docTitle + '.docx');
    }

    function dialogDownload() {
        showSuccessToast("File telah didownload")
    }

    function exportExcel() {
        docTitle = 'NILAI HARIAN ' + namaMapel + ' ' + namaKelas + ' ' + tanggalSingkat.toUpperCase();
        var table = document.querySelector("#excel");
        TableToExcel.convert(table, {
            name: docTitle + '.xlsx',
            sheet: {
                name: "Sheet 1"
            }
        });
    }


</script>
