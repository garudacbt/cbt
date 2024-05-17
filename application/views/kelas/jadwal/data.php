<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */

if (isset($jadwal_kbm)) {
    $ist = json_decode(json_encode($jadwal_kbm->istirahat));
    $jmlIst = json_decode(json_encode(unserialize($ist ?? '')));
    $jmlMapelPerHari = $jadwal_kbm->kbm_jml_mapel_hari;
} else {
    $jmlMapelPerHari = 0;
}
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
                        <button type="button" onclick="reload()" class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col">
                        Pilih Kelas:
                        <br>
                        <?php
                        if (count($kelas) > 0) :
                            foreach ($kelas as $key => $value) :?>
                                <a href="<?= base_url('kelasjadwal/kelas/' . $key) ?>"
                                   class="mt-1 btn <?= $id_kelas == $key ? 'btn-success' : 'btn-outline-success' ?>"
                                   id="btn-<?= $key ?>"><?= $value ?>
                                </a>
                            <?php endforeach;
                        else: ?>
                            <div class="col-12 p-0">
                                <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                    Belum ada data kelas untuk Tahun Pelajaran <b><?= $tp_active->tahun ?></b> Semester:
                                    <b><?= $smt_active->smt ?></b>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <hr>

                    <?php
                    if (isset($jadwal_mapel)) :
                        //var_dump($jadwal_kbm);
                        //echo '<pre>';
                        //var_dump($mapels);
                        //echo '</pre>';
                        foreach ($jadwal_mapel as $k) {
                            foreach ($k['jadwal'] as $j) {
                                $arrRes[$j->jam_ke][$j->id_hari] = [
                                    'id_tp' => $j->id_tp,
                                    'id_smt' => $j->id_smt,
                                    'id_kelas' => $j->id_kelas,
                                    'id_hari' => $j->id_hari,
                                    'jam_ke' => $j->jam_ke,
                                    'id_mapel' => $j->id_mapel,
                                    'kode' => $j->kode
                                ];
                            }
                        }

                        $arr_id_hari = ['1', '2', '3', '4', '5', '6'];
                        $arrIst = [];
                        foreach ($jmlIst as $istirahat) {
                            array_push($arrIst, $istirahat->ist);
                            $arrDur[$istirahat->ist] = $istirahat->dur;
                        };
                        if (isset($jadwal_kbm->ada)) : ?>
                            <div class="col-lg-12 p-0">
                                <div class="alert alert-default-warning align-content-center" role="alert">
                                    Jadwal <strong>Kelas <?= $kelas[$id_kelas] ?> </strong> Tahun Pelajaran
                                    <strong><?= $jadwal_kbm->id_tp ?>
                                        Smt <?= $jadwal_kbm->id_smt ?></strong> belum di set.
                                </div>
                            </div>
                        <?php endif;
                        ?>
                        <?= form_open('setJadwal', array('id' => 'setjadwal')); ?>
                        <div class="card">
                            <div class="card-body bg-gray-light">
                                <div class="row" id="inputs">
                                    <div class="col-md-4 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Durasi Mapel</span>
                                            </div>
                                            <?php
                                            $menits[''] = 'Durasi mapel';
                                            $jam = 20;
                                            for ($i = 0; $i < 9; $i++) {
                                                $menits[$jam] = $jam . ' menit';
                                                $jam += 5;
                                            }

                                            echo form_dropdown(
                                                'jam_mapel',
                                                $menits,
                                                $jadwal_kbm->kbm_jam_pel,
                                                'id="bank-id" class="form-control" required'
                                            ); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Jam Mulai</span>
                                            </div>
                                            <input id="jam_mulai" type="text" name="jam_mulai" class="form-control"
                                                   value="<?= $jadwal_kbm->kbm_jam_mulai ?>" autocomplete="off"
                                                   placeholder="Jam Mulai" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Jumlah Mapel</span>
                                            </div>
                                            <input id="jml-mapel" type="number" class="form-control" name="jml_mapel"
                                                   value="<?= $jadwal_kbm->kbm_jml_mapel_hari == '' ? 0 : $jadwal_kbm->kbm_jml_mapel_hari ?>"
                                                   placeholder="Jml Mapel"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Jml. Istirahat</span>
                                            </div>
                                            <?php
                                            $kali[''] = 'Jml Istirahat';
                                            $kl = 1;
                                            for ($k = 0; $k < 4; $k++) {
                                                $kali[$kl] = $kl . ' kali';
                                                $kl += 1;
                                            }

                                            echo form_dropdown(
                                                'jum_ist',
                                                $kali,
                                                count($jmlIst),
                                                'id="jum_ist" class="form-control" placeholder="Jml Istirahat" required'
                                            ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="id_kelas" value="<?= $id_kelas ?>" class="form-control">
                                <button class="btn btn-primary float-right">Generate Jadwal</button>
                            </div>
                        </div>
                        <?= form_close() ?>
                        <hr>
                        <?php
                        if (isset($jadwal_kbm->ada)) : ?>
                            <div class="col-lg-12 p-0">
                                <div class="alert align-content-center" role="alert">
                                    <strong>Jadwal belum di GENERATE.</strong> .
                                </div>
                            </div>
                        <?php else: ?>
                            <?= form_open('setMapel', array('id' => 'setmapel')); ?>
                            <div class="table-responsive">
                                <table id="jadwal-pelajaran" class="w-100 table table-bordered">
                                    <thead class="alert alert-primary">
                                    <tr>
                                        <th height="50" class="align-middle text-center p-0" style="min-width: 150px">WAKTU</th>
                                        <th class="align-middle text-center p-0" style="min-width: 150px">SENIN</th>
                                        <th class="align-middle text-center p-0" style="min-width: 150px">SELASA</th>
                                        <th class="align-middle text-center p-0" style="min-width: 150px">RABU</th>
                                        <th class="align-middle text-center p-0" style="min-width: 150px">KAMIS</th>
                                        <th class="align-middle text-center p-0" style="min-width: 150px">JUM'AT</th>
                                        <th class="align-middle text-center p-0" style="min-width: 150px">SABTU</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $jamMulai = new DateTime($jadwal_kbm->kbm_jam_mulai);
                                    $jamSampai = new DateTime($jadwal_kbm->kbm_jam_mulai);
                                    for ($i = 0; $i < $jadwal_kbm->kbm_jml_mapel_hari; $i++) :
                                        $jamke = $i + 1;
                                        if (in_array($jamke, $arrIst)) :
                                            $jamSampai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                            ?>
                                            <tr class="jam bg-gradient-red" data-jamke="<?= $jamke ?>">
                                                <td class="align-middle text-center">
                                                    <?= $jamMulai->format('H:i') ?> - <?= $jamSampai->format('H:i') ?>
                                                </td>
                                                <td class="align-middle text-center p-0">IS</td>
                                                <td class="align-middle text-center p-0">TI</td>
                                                <td class="align-middle text-center p-0">RA</td>
                                                <td class="align-middle text-center p-0">H</td>
                                                <td class="align-middle text-center p-0">A</td>
                                                <td class="align-middle text-center p-0">T</td>
                                            </tr>
                                            <?php
                                            $jamMulai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                        else :
                                            $jamSampai->add(new DateInterval('PT' . $jadwal_kbm->kbm_jam_pel . 'M'));
                                            ?>
                                            <tr class="jam" data-jamke="<?= $jamke ?>">
                                                <td class="align-middle text-center bg-gradient-primary">
                                                    <?= $jamMulai->format('H:i') ?> - <?= $jamSampai->format('H:i') ?>
                                                </td>
                                                <?php
                                                foreach ($arr_id_hari as $hari) :
                                                    $sel = isset($arrRes[$jamke]) && isset($arrRes[$jamke][$hari])
                                                        ? $arrRes[$jamke][$hari]['id_mapel'] : ''; ?>
                                                    <td class="align-middle">
                                                        <?= form_dropdown(
                                                            'input-mapel',
                                                            $mapels,
                                                            $sel,
                                                            'data-idhari="' . $hari . '" data-jamke="' . $jamke . '"' .
                                                            ' class="select2 form-control form-control-sm" data-placeholder="Pilih Mapel"'
                                                        ); ?>
                                                    </td>
                                                <?php endforeach; ?>
                                            </tr>
                                            <?php
                                            $jamMulai->add(new DateInterval('PT' . $jadwal_kbm->kbm_jam_pel . 'M'));
                                        endif;
                                    endfor; ?>
                                    </tbody>
                                </table>
                            </div>
                            <input type="hidden" name="id_kelas" value="<?= $id_kelas ?>" class="form-control">
                            <button class="btn btn-primary float-right" <?= isset($jadwal_kbm->ada) ? 'disabled' : '' ?>>
                                Simpan
                                Jadwal
                            </button>
                            <?= form_close() ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="col-lg-12 p-0">
                            <div class="alert alert-default-info shadow align-content-center" role="alert">
                                Silakan Pilih Kelas.
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    var arrMapel = JSON.parse(JSON.stringify(<?= isset($mapels) ? json_encode($mapels) : '[]'?>));
    let method = '<?= $method ?>';
    var jmlMapel = 0;
    $(document).ready(function () {
        $('.select2').select2();
        //$('.popr').popr();
        $('#jam_mulaiEdit, #jam_mulai').datetimepicker({
            datepicker: false,
            format: 'H:i',
            step: 15,
            disabledWeekDays: [0],
            minTime: '06:00',
            maxTime: '17:00'
        });

        onChangeJmlIst('<?= count($jmlIst) ?>');
        jmlMapel = '<?=$jmlMapelPerHari?>';
        onChangeJmlMapel(jmlMapel);

        $('#setjadwal').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            console.log("data", $(this).serialize());

            $.ajax({
                url: base_url + "kelasjadwal/setjadwal",
                data: $(this).serialize(),
                method: 'POST',
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    swal.fire({
                        "title": data.status ? "Berhasil" : "Gagal",
                        "text": data.status ? "Jadwal berhasil dibuat" : "Jadwal tidak dibuat",
                        "icon": data.status ? "success" : "error"
                    }).then(result => {
                        if (data.status) {
                            reload();
                        }
                    });
                },
                error: function (xhr, status, error) {
                    showDangerToast(xhr.responseText);
                }
            });
        });

        $('#jum_ist').on('change', function () {
            //console.log($(this).val());
            onChangeJmlIst($(this).val());
        });

        $('#jml-mapel').on('change', function () {
            onChangeJmlMapel($(this).val());
        });

        $('#setmapel').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            const $rows = $('#jadwal-pelajaran').find('tr'), headers = $rows.splice(0, 1); // header rows
            var jsonObj = [];
            $rows.each((i, row) => {
                //var jamke = $(row).attr("data-jamke");
                const $colsHari = $(row).find('select');
                $colsHari.each((h, col) => {
                    let item = {};
                    item ["id_tp"] = id_tp_active;
                    item ["id_smt"] = id_smt_active;
                    item ["id_hari"] = $(col).data("idhari");
                    item ["id_mapel"] = $(col).val();
                    item ["jam_ke"] = $(col).data("jamke");

                    jsonObj.push(item);
                });
            });
            //console.log("data="+JSON.stringify(jsonObj, null, 4));
            $.ajax({
                url: base_url + 'kelasjadwal/setmapel',
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize() + "&method=" + method + "&data=" + JSON.stringify(jsonObj),
                success: function (data) {
                    console.log(data);
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            text: "Jadwal Pelajaran berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            reload();
                        });
                    } else {
                        swal.fire({
                            title: "ERROR",
                            text: "Data Tidak Tersimpan",
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    swal.fire({
                        title: "ERROR",
                        text: "Data Tidak Tersimpan",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            });
        });
    });

    /*
    $(document).on('click', '.popr-item', function () {
        var id = $(this).data('id');
        var id_mapel = $(this).data('idmapel');
        var text = $(this).text();

        var value = $('#' + id);
        value.attr('data-idmapel', id_mapel);
        value.text(text);
        console.log('idmapel', value.data('id'));
    });
    */

    function reload() {
        window.location.href = base_url + 'kelasjadwal/kelas/' + '<?=$id_kelas?>';
    }

    function onChangeJmlMapel(s) {
        jmlMapel = s;
        onChangeJmlIst($('#jum_ist').val());
    }

    function onChangeJmlIst(jml) {
        var iid = 1;
        var inputgroup = $('#inputs');
        if (jml > 1) {
            $('#ist1').text('Istirahat 1');
            $('#dur1').text('Durasi Istirahat 1');
        } else {
            $('#ist1').text('Istirahat');
            $('#dur1').text('Durasi Istirahat');
        }

        for (let o = 1; o < 5; o++) {
            $("#input_ist" + o).remove();
            $("#input_dur" + o).remove();
        }

        var istirahat = JSON.parse('<?= isset($ist) ? json_encode(unserialize($ist ?? '')) : '[]' ?>');
        //jmlMapel = $('#jml-mapel').val();
        console.log(jmlMapel);

        for (let i = 0; i < jml; i++) {
            var num = jml === '1' ? '' : iid;
            var val = i + 1 > istirahat.length ? '' : istirahat[i].dur;
            var se = i + 1 > istirahat.length ? 0 : istirahat[i].ist;
            var inputDurasi = '<div class="col-md-3 mb-3" id="input_ist' + iid + '">' +
                '<div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<span id="ist' + iid + '" class="input-group-text">Istirahat ' + num + '</span>' +
                '</div>' +
                '<select name="ist' + iid + '" id="ist1" class="form-control" placeholder="Jam ke" required="">';
            for (let j = 0; j < jmlMapel; j++) {
                if (j === 0) {
                    inputDurasi += '<option value="">Jam Istirahat</option>';
                } else {
                    if (j == se) {
                        inputDurasi += '<option value="' + j + '" selected>Jam ke ' + j + '</option>';
                    } else {
                        inputDurasi += '<option value="' + j + '" >Jam ke ' + j + '</option>';
                    }
                }
            }
            inputDurasi += '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-3 mb-3" id="input_dur' + iid + '">' +
                '<div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<span id="dur' + iid + '" class="input-group-text">Durasi Istirahat ' + num + '</span>' +
                '</div>' +
                '<input type="number" class="form-control" name="dur_ist' + iid + '"' +
                'value="' + val + '" placeholder="Menit" required>' +
                '</div>' +
                '</div>';

            iid++;
            inputgroup.append(inputDurasi);
        }
    }
</script>
