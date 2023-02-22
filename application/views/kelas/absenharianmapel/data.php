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
                                <i class="fas fa-print"></i> <span class="d-none d-sm-inline-block ml-1"> Print</span>
                            </button>
                            <button type="button" class="btn btn-sm btn-default" data-toggle="tooltip"
                                    title="Export As PDF" onclick="exportPdf()">
                                <i class="fas fa-file-pdf"></i> <span class="d-none d-sm-inline-block ml-1"> PDF</span>
                            </button>
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
                                <div class="col-md-4 mb-2">
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
                                    <label id="lbl-materi">Materi, Tugas</label>
                                    <select id="opsi-materi" class="form-control">
                                        <optgroup label="Materi" id="opt-materi">
                                        </optgroup>
                                        <optgroup label="Tugas" id="opt-tugas">
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-2">
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
                                    <label>Hari, Tanggal</label>
                                    <input type='text' id="opsi-tgl" name='tanggal' class='tgl form-control'
                                           autocomplete='off' required='true'/>
                                </div>
                            </div>
                            <div id="konten-absensi">
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

<script>
    var kelas = JSON.parse('<?= json_encode($kelas)?>');
    var arrMateri = JSON.parse(JSON.stringify(<?= json_encode($materi)?>));
    var form;
    var hari = '';
    var tgl = '';
    var bln = '';
    var thn = '';
    var oldData = '';

    function createTabelKehadiran(data) {
        console.log(data);
        var table = '';

        table = '<table id="tabelsiswa" class="table table-bordered table-striped">' +
            '<thead>' +
            '<tr>' +
            '<th width="40" class="text-center align-middle">No</th>' +
            '<th class="text-center align-middle">N I S</th>' +
            '<th class="text-center align-middle">Nama</th>' +
            '<th class="text-center align-middle">Kelas</th>' +
            '<th class="text-center align-middle">Kehadiran</th>' +
            '</tr>' +
            '</thead>';

        var no = 1;
        $.each(data, function (key, value) {
            table += '<tr>' +
                '<td class="text-center align-middle">' + no + '</td>' +
                '<td class="text-center align-middle">' + value.nis + '</td>' +
                '<td>' + value.nama + '</td>' +
                '<td class="text-center align-middle">' + value.kelas + '</td>';
            if (value.status === null) {
                table += '<td class="text-center align-middle">- -</td>';
            } else {
                var jm = value.status.jam_materi != null ? value.status.jam_materi : (value.status.jam_tugas != null ? value.status.jam_tugas : '- -');
                table += '<td class="text-center align-middle">' + jm + '</td>';
            }
            table += '</tr>';
            no++;
        });

        table += '</table>';
        $('#konten-absensi').html(table);
        $('#loading').addClass('d-none');
    }

    $(document).ready(function () {
        var selKelas = $('#opsi-kelas');
        var selMapel = $('#opsi-mapel');
        var selMateri = $('#opsi-materi');

        var optMateri = $('#opt-materi');
        var optTugas = $('#opt-tugas');

        form = $('#formselect');

        jQuery.datetimepicker.setLocale('id');
        $('.tgl').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            timepicker: false,
            scrollInput: false,
            scrollMonth: false,
            format: 'D, d M Y',//'Y-m-d',
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom'
            },
            disabledWeekDays: [0],
            onChangeDateTime: function (date, $input) {
                tgl = date.getDate();
                var nb = date.getMonth() + 1;
                if (nb < 10) {
                    bln = '0' + nb;
                } else {
                    bln = nb;
                }
                thn = date.getFullYear();
                hari = date.getDay();
                //console.log(tgl, bln, thn)
            },
        });

        selMapel.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Mapel</option>");
        selKelas.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Kelas</option>");

        console.log('materi', arrMateri);

        function reload(mapel, mtr, kls) {
            console.log(tgl, bln, thn, kls);
            var empty = tgl === '' || bln === '' || thn === '' || kls === '' || mtr === '' || kls == null || mtr == null;
            var newData = '&thn=' + thn + '&bln=' + bln + '&tgl=' + tgl + '&hari=' + hari + '&kelas=' + kls + '&matei=' + mtr + '&mapel=' + mapel;
            if (!empty && oldData !== newData) {
                oldData = newData;

                $('#loading').removeClass('d-none');

                setTimeout(function () {
                    $.ajax({
                        url: base_url + 'kelasabsensiharianmapel/loadabsensimapel',
                        type: "POST",
                        dataType: "json",
                        data: form.serialize() + newData,
                        success: function (data) {
                            createTabelKehadiran(data)
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                }, 500);
            }
        }

        var arrKelasMateri = [];
        var arrKelasTugas = [];

        function setMateri(id) {
            optMateri.html('');
            optTugas.html('');
            arrKelasMateri = [];
            arrKelasTugas = [];
            var mtrAda = arrMateri[id] != null && arrMateri[id]['1'] != null;
            var tgsAda = arrMateri[id] != null && arrMateri[id]['2'] != null;

            if (mtrAda) {
                for (let i = 0; i < arrMateri[id]['1'].length; i++) {
                    var materi = arrMateri[id]['1'][i];
                    const date = stringToDate(materi.jadwal);
                    const tgl = dateToString(date);
                    optMateri.append('<option value="' + materi.id_kjm + '">' + materi.kode + ' -' + tgl + '</option>');

                    var item = {};
                    item['id_materi'] = materi.id_materi;
                    item['id_kjm'] = materi.id_kjm;
                    item['id_kelas'] = materi.kelas;
                    arrKelasMateri.push(item);
                }
            } else {
                optMateri.append('<option value="">Belum ada materi</option>');
            }

            if (tgsAda) {
                for (let i = 0; i < arrMateri[id]['2'].length; i++) {
                    var tugas = arrMateri[id]['2'][i];
                    const date = stringToDate(tugas.jadwal);
                    const tgl = dateToString(date);
                    optTugas.append('<option value="' + tugas.id_kjm + '">' + tugas.kode + ' -' + tgl + '</option>');

                    var itemt = {};
                    itemt['id_materi'] = tugas.id_materi;
                    itemt['id_kjm'] = tugas.id_kjm;
                    itemt['id_kelas'] = tugas.kelas;
                    arrKelasTugas.push(itemt);
                }
            } else {
                optTugas.append('<option value="">Belum ada tugas</option>');
            }

            var jmlm = mtrAda ? arrMateri[id]['1'].length : 0;
            var jmlt = tgsAda ? arrMateri[id]['2'].length : 0;

            $('#lbl-materi').text('Materi ' + jmlm + ', Tugas ' + jmlt);

            var label = $('#opsi-materi :selected').parent().attr('label');
            setKelas(selMateri.val(), label);
        }

        function setKelas(id, label) {
            selKelas.html('');
            if (label === 'Materi') {
                for (let j = 0; j < arrKelasMateri.length; j++) {
                    if (arrKelasMateri[j].id_kjm === id) {
                        var idm = arrKelasMateri[j].id_kelas;
                        for (let k = 0; k < idm.length; k++) {
                            selKelas.append('<option value="' + idm[k] + '">' + kelas[idm[k]] + '</option>');
                        }
                    }
                }
            } else {
                for (let j = 0; j < arrKelasTugas.length; j++) {
                    if (arrKelasTugas[j].id_kjm === id) {
                        var idt = arrKelasTugas[j].id_kelas;
                        for (let k = 0; k < idt.length; k++) {
                            selKelas.append('<option value="' + idt[k] + '">' + kelas[idt[k]] + '</option>');
                        }
                    }
                }
            }
            if (selKelas.val() != '' && selMapel.val() != '') selKelas.change();
        }

        selMapel.on('change', function () {
            setMateri($(this).val());
        });

        selMateri.change(function () {
            var label = $('#opsi-materi :selected').parent().attr('label');
            setKelas($(this).val(), label);
        });

        selKelas.change(function () {
            reload(selMapel.val(), selMateri.val(), $(this).val());
        });

        $("#opsi-tgl").change(function () {
            reload(selMapel.val(), selMateri.val(), selKelas.val());
        });
    });
</script>
