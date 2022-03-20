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
                    //var_dump($materi);
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
                        <div class="col-md-5 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Materi/Tugas</span>
                                </div>
                                <select id="dropdown-materi" class="form-control">
                                    <optgroup label="Materi" id="opt-materi">
                                    </optgroup>
                                    <optgroup label="Tugas" id="opt-tugas">
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Kelas</span>
                                </div>
                                <select id="kelas-materi" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="preview" class="table-responsive">
                        <div class="d-none" style="width:100%;">
                            <p id="title-doc" style="text-align:center;font-size:14pt; font-weight: bold"></p>
                        </div>
                        <table id="log" class="table table-striped table-bordered table-hover table-sm"
                               style="width: 100%;border: 1px solid #c0c0c0; border-collapse: collapse;">
                        </table>
                    </div>

                    <div id="cloned"></div>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
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
                    <div id="konten-hasil" class="row">
                    </div>
                    <div id="konten-nilai" class="row">
                        <div class="col-4 mb-3">
                            <div id="nilai-hasil" class="text-center" style="font-size: 60pt">
                            </div>
                        </div>
                        <div class="col-8">
                            <?= form_open('', array('id' => 'formnilai')) ?>
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <label>Beri Nilai</label>
                                    <input class="form-control" name="nilai" id="nilai" type="text" required>
                                    <input type="hidden" name="id_log" id="id-log">
                                    <input type="hidden" name="method" id="method">
                                </div>
                                <div class="col-4 mb-3">
                                    <br>
                                    <button type="submit" class="btn btn-primary mt-2">Simpan Nilai</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label>Catatan Untuk Siswa</label>
                                    <input id="catatan" class="form-control" name="catatan" type="text">
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

<script>
    var kelas = JSON.parse('<?= json_encode($kelas)?>');
    var arrKelasMateri = [];
    var arrKelasTugas = [];
    var form;
    var resultAll = {};
    var tanggaljudul = '';
    var arrJadwal = {};

    console.log('kls', kelas);

    $(document).ready(function () {
        var label = $('#dropdown-materi :selected').parent().attr('label');
        form = $('#formselect');

        var optMateri = $('#opt-materi');
        var optTugas = $('#opt-tugas');
        //var dropGuru = $('#dropdown-guru');
        var dropMapel = $('#dropdown-mapel');

        /*
		dropGuru.on('change', function () {
            console.log($(this).val());
			$.ajax({
				method: "GET",
				url: base_url + "kelasstatus/getmateriguru?id=" + $(this).val(),
				success: function (response) {
					console.log(response);
					optMateri.html('');
					optTugas.html('');
					arrKelasMateri = [];
					arrKelasTugas = [];

					if (response.materi.length === 0) {
						optMateri.append('<option value="">Belum ada materi</option>');
					} else {
						for (let j = 0; j < response.materi.length; j++) {
                            const date = stringToDate(response.materi[j].jadwal);
                            const tgl = dateToString(date);
							optMateri.append('<option value="'+response.materi[j].id_kjm+'">'+response.materi[j].kode+' -' + tgl +'</option>');

							var item = {};
							item['id_materi'] = response.materi[j].id_materi;
                            item['id_kjm'] = response.materi[j].id_kjm;
							item['id_kelas'] = response.materi[j].kelas;

							arrKelasMateri.push(item);
						}
					}

					if (response.tugas.length === 0) {
						optTugas.append('<option value="">Belum ada tugas</option>');
					} else {
						for (let k = 0; k < response.tugas.length; k++) {
						    const date = stringToDate(response.tugas[k].jadwal);
						    const tgl = dateToString(date);
							optTugas.append('<option value="'+response.tugas[k].id_kjm+'">'+response.tugas[k].kode+' -' + tgl +'</option>');

							var item = {};
							item['id_materi'] = response.tugas[k].id_materi;
                            item['id_kjm'] = response.tugas[k].id_kjm;
							item['id_kelas'] = response.tugas[k].kelas;

							arrKelasTugas.push(item);
						}
					}
					label = $('#dropdown-materi :selected').parent().attr('label');
					onChangeMateri($('#dropdown-materi').val(), label);
				}
			});
		});
		*/

        dropMapel.on('change', function () {
            console.log($(this).val());
            $.ajax({
                method: "GET",
                url: base_url + "kelasstatus/getmaterimapel?id=" + $(this).val(),
                success: function (response) {
                    console.log(response);
                    optMateri.html('');
                    optTugas.html('');
                    arrKelasMateri = [];
                    arrKelasTugas = [];

                    if (response.materi.length === 0) {
                        optMateri.append('<option value="">Belum ada materi</option>');
                    } else {
                        for (let j = 0; j < response.materi.length; j++) {
                            const date = stringToDate(response.materi[j].jadwal);
                            const tgl = dateToString(date);
                            optMateri.append('<option value="' + response.materi[j].id_kjm + '">' + response.materi[j].kode + ' - ' + tgl + '</option>');
                            arrJadwal[response.materi[j].id_kjm] = tgl;

                            var item = {};
                            item['id_materi'] = response.materi[j].id_materi;
                            item['id_kjm'] = response.materi[j].id_kjm;
                            item['id_kelas'] = response.materi[j].kelas;

                            arrKelasMateri.push(item);
                        }
                    }

                    if (response.tugas.length === 0) {
                        optTugas.append('<option value="">Belum ada tugas</option>');
                    } else {
                        for (let k = 0; k < response.tugas.length; k++) {
                            const date = stringToDate(response.tugas[k].jadwal);
                            const tgl = dateToString(date);
                            optTugas.append('<option value="' + response.tugas[k].id_kjm + '">' + response.tugas[k].kode + ' - ' + tgl + '</option>');
                            arrJadwal[response.tugas[k].id_kjm] = tgl;

                            var item = {};
                            item['id_materi'] = response.tugas[k].id_materi;
                            item['id_kjm'] = response.tugas[k].id_kjm;
                            item['id_kelas'] = response.tugas[k].kelas;

                            arrKelasTugas.push(item);
                        }
                    }
                    label = $('#dropdown-materi :selected').parent().attr('label');
                    onChangeMateri($('#dropdown-materi').val(), label);
                }
            });
        });

        $('#dropdown-materi').on('change', function () {
            label = $('#dropdown-materi :selected').parent().attr('label');
            onChangeMateri($(this).val(), label);
        });

        $('#kelas-materi').on('change', function () {
            getLogSiswa($('#dropdown-materi :selected').parent().attr('label'));
        });

        $('#daftarModal').on('show.bs.modal', function (e) {
            var key = $(e.relatedTarget).data('key');
            var konten = $('#konten-hasil');
            console.log(resultAll[key]);
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
                    if (file.type.match('image')) {
                        html = '<div class="col-12 mb-3">' +
                            '<img data-enlargeable src="' + base_url + '/' + file.src + '" alt="" class="img-thumbnail" /></div>';
                        konten.append(html);
                    } else if (file.type.match('video')) {
                        html = '<div class="col-12 mb-3"><video src="' + base_url + '/' + file.src + '"></video></div>';
                        konten.append(html);
                    } else {
                        html = '<div class="col-3 mb-3"><img src="' + base_url + '"/assets/app/img/document_file.png"></div>';
                        konten.append(html);
                    }
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
            var nilaiHasil = val.nilai === '' ? '' : val.nilai;
            var catatanGuru = val.catatan === '' ? '' : val.catatan;

            var idMateri = $('#dropdown-materi').val();
            $('#id-log').val(key + '' + idMateri);
            console.log('id', key + '' + idMateri);

            $('#nilai-hasil').text(nilaiHasil);
            $('#nilai').val(nilaiHasil);
            $('#catatan').val(catatanGuru);

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
                    getLogSiswa(label)
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

    function onChangeMateri(id, label) {
        var selKelas = $('#kelas-materi');
        tanggaljudul = arrJadwal[id] != null ? arrJadwal[id] : '';
        selKelas.html('');

        if (label === 'Materi') {
            for (let j = 0; j < arrKelasMateri.length; j++) {
                if (arrKelasMateri[j].id_kjm === id) {
                    var ids = arrKelasMateri[j].id_kelas;
                    for (let k = 0; k < ids.length; k++) {
                        selKelas.append('<option value="' + ids[k] + '">' + kelas[ids[k]] + '</option>');
                    }
                }
            }
        } else {
            for (let j = 0; j < arrKelasTugas.length; j++) {
                if (arrKelasTugas[j].id_kjm === id) {
                    var ids = arrKelasTugas[j].id_kelas;
                    for (let k = 0; k < ids.length; k++) {
                        selKelas.append('<option value="' + ids[k] + '">' + kelas[ids[k]] + '</option>');
                    }
                }
            }
        }

        getLogSiswa(label);
    }

    function getLogSiswa(label) {
        var selMateri = $('#dropdown-materi').val();
        var selKelas = $('#kelas-materi').val();

        $('#loading').removeClass('d-none');

        setTimeout(function () {
            $.ajax({
                type: 'POST',
                url: base_url + 'kelasstatus/loadstatus',
                data: form.serialize() + '&id_kjm=' + selMateri + '&id_kelas=' + selKelas + '&label=' + label,  //{id_materi: selMateri, id_kelas: selKelas},
                success: function (data) {
                    console.log('result', data);

                    resultAll = data.log;
                    var table = $('#log');
                    table.empty();
                    var html = '<thead>' +
                        '<tr style="background-color:lightgrey;">' +
                        '<th rowspan="2" height="50" width="50" class="align-middle text-center p-0 center">No.</th>' +
                        '<th rowspan="2" class="align-middle text-center d-none d-md-table-cell center">NIS</th>' +
                        '<th rowspan="2" class="align-middle text-center center">Nama Siswa</th>' +
                        '<th rowspan="2" class="align-middle text-center p-0 d-none d-md-table-cell center">Kelas</th>' +
                        '<th colspan="3" class="text-center align-middle center">Kehadiran</th>' +
                        '<th rowspan="2" class="text-center align-middle hidden center">Hasil</th>' +
                        '<th rowspan="2" class="text-center align-middle center">Nilai</th>' +
                        '</tr>' +
                        '<tr style="background-color:lightgrey;">' +
                        '<th class="text-center align-middle center">Buka ' + label + '</th>' +
                        '<th class="text-center align-middle center">Selesai</th>' +
                        '<th class="text-center align-middle center">Keterangan</th>' +
                        '</tr>' +
                        '</thead><tbody>';

                    var no = 1;
                    $.each(data.log, function (key, value) {
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
                            console.log('jamke', items);

                            var jamke = value.jam_ke;
                            var tglJadwal = formatDate(items[jamke]);
                            var diff = calculateTime(tglJadwal, value.selesai);
                            ketMulai = diff == '' ? '' : 'Selesai, Terlambat <br>' + diff;
                            //console.log('jadwal:' + tglJadwal + ' selesai:' + value.selesai.log_time + ' diff:' + calculateTime(tglJadwal, value.selesai.log_time));
                        }

                        html +=
                            '<tr>' +
                            '<td class="align-middle text-center center">' + no + '</td>' +
                            '<td class="align-middle d-none d-md-table-cell middle">' + value.nis + '</td>' +
                            '<td class="align-middle middle">' + value.nama + '</td>' +
                            '<td class="align-middle text-center d-none d-md-table-cell center">' + value.kelas + '</td>' +
                            //'<td class="align-middle text-center">' + login + '</td>' +
                            '<td class="align-middle text-center center">' + mulai + '</td>' +
                            '<td class="align-middle text-center center">' + selesai + '</td>' +
                            '<td class="align-middle text-center center">' + ketMulai + '</td>' +
                            '<td class="align-middle text-center hidden">' +
                            '<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#daftarModal" data-key="' + key + '">LIHAT</button>' +
                            '</td>' +
                            '<td class="align-middle text-center center">' + nilai + '</td>' +
                            '</tr>';
                        no++;
                    });

                    html += '</tbody>';
                    table.append(html);
                    $('#loading').addClass('d-none');
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
        var bulans = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        var kalender = string.split(" ")[0];
        var waktu = string.split(" ")[1];
        //console.log(kalender);

        var tanggal = kalender.split("-")[2];
        var bulan = kalender.split("-")[1];
        var tahun = kalender.split("-")[0];

        var jam = waktu.split(":")[0];
        var menit = waktu.split(":")[1];
        var detik = waktu.split(":")[2];

        var d = new Date(tahun, bulan, tanggal, jam, menit, detik);
        var curr_day = d.getDay();
        var curr_date = d.getDate();
        var curr_month = d.getMonth();
        var curr_year = d.getFullYear();
        var curr_jam = d.getHours();
        var curr_mnt = d.getMinutes();

        return hari[curr_day] + ", " + curr_date + "  " + bulans[curr_month] + " " + curr_year + " <br><b>" + curr_jam + ":" + curr_mnt + "</b>";
    }

    function calculateTime(jadwal, selesai) {
        var ONE_DAY = 1000 * 60 * 60 * 24;
        var ONE_HOUR = 1000 * 60 * 60;
        var ONE_MINUTE = 1000 * 60;

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

    var docTitle;

    function cloneTable() {
        var namakelas = $("#kelas-materi option:selected").text();
        var namamapel = $("#dropdown-mapel option:selected").text();
        console.log('tgl', tanggaljudul);
        docTitle = 'Nilai ' + namakelas + ' ' + namamapel + ' ' + tanggaljudul;
        $('#title-doc').text(docTitle.toUpperCase());

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

    function exportExcel() {

    }
</script>
