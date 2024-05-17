<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */

function weekOfMonth($date)
{
    //Get the first day of the month.
    $firstOfMonth = strtotime(date("Y-m-01", strtotime($date)));
    //Apply above formula.
    return weekOfYear($date) - weekOfYear($firstOfMonth) + 1;
}

function weekOfYear($date)
{
    $weekOfYear = intval(date("W", strtotime($date)));
    if (date('n', strtotime($date)) == "1" && $weekOfYear > 51) {
        // It's the last week of the previos year.
        $weekOfYear = 0;
    }
    return $weekOfYear;
}

function weeksOfMonth($date)
{
    $week = date('W', strtotime($date)); // note that ISO weeks start on Monday
    $firstWeekOfMonth = date('W', strtotime(date('Y-m-01', strtotime($date))));
    return 1 + ($week < $firstWeekOfMonth ? $week : $week - $firstWeekOfMonth);
}

function getWeeksOfMonth($date)
{
    $currentYear = date('Y', strtotime($date));
    $currentMonth = date('m', strtotime($date));

    //Substitue year and month
    $time = strtotime("$currentYear-$currentMonth-01");
    //Got the first week number
    $firstWeek = date("W", $time);

    if ($currentMonth == 12)
        $currentYear++;
    else
        $currentMonth++;

    $time = strtotime("$currentYear-$currentMonth-01") - 86400;
    $lastWeek = date("W", $time);

    $weekArr = array();

    $j = 1;
    for ($i = $firstWeek; $i <= $lastWeek; $i++) {
        $weekArr[$i] = 'week ' . $j;
        $j++;
    }
    return $weekArr;
}

if (isset($jadwal_kbm)) {
    $ist = json_decode(json_encode($jadwal_kbm->istirahat));
    $jmlIst = json_decode(json_encode(unserialize($ist ?? '')));
    $jmlMapelPerHari = $jadwal_kbm->kbm_jml_mapel_hari;
} else {
    $jmlMapelPerHari = 0;
}

$nowDate = strtotime(date('Y-m-d'));
$nowHour = strtotime(date('H:i'));
$today = new DateTime();

$tempIdSelected = $id_kelas . $tp_active->id_tp . $smt_active->id_smt;
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
                        <button type="button" onclick="refreshPage()" class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col">
                        <div class="col-12 p-0">
                            <div class="alert alert-default-warning align-content-center" role="alert">
                                <b>Info</b>
                                <br> Jika jadwal materi/tugas sudah diatur di menu Materi dan menu Tugas, maka abaikan
                                halaman ini.
                            </div>
                        </div>
                        Pilih Kelas:
                        <br>
                        <?php
                        if (count($kelas) > 0) :
                            foreach ($kelas as $key => $value) :?>
                                <a href="<?= base_url('kelasmaterijadwal/kelas?kelas=' . $key . '&date=' . $date_selected . '&tahun=' . $tp_active->tahun . '&bulan=' . date('m', strtotime($date_selected))) ?>"
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
                        $arrKelasGuru = [];
                        $arr_id_kelas_guru = [];
                        if (isset($guru)) {
                            $mapel_guru = $guru->mapel_kelas == null ? [] : unserialize($guru->mapel_kelas ?? '');
                            foreach ($mapel_guru as $mg) {
                                $arr_id_kelas_guru[$mg['id_mapel']] = $mg;

                                foreach ($mg['kelas_mapel'] as $km) {
                                    array_push($arrKelasGuru, $km['kelas']);
                                }
                            }
                        }
                        $ada_kelas = in_array($id_kelas, $arrKelasGuru);

                        //sortir jadwal
                        foreach ($jadwal_mapel as $k) {
                            foreach ($k['jadwal'] as $j) {
                                $arrRes[$j->id_hari][$j->jam_ke] = [
                                    'id_tp' => $j->id_tp,
                                    'id_smt' => $j->id_smt,
                                    'id_kelas' => $j->id_kelas,
                                    'id_hari' => $j->id_hari,
                                    'jam_ke' => $j->jam_ke,
                                    'id_mapel' => $j->id_mapel,
                                    'nama_mapel' => $j->nama_mapel,
                                    'kode' => $j->kode
                                ];
                            }
                        }

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

                        <?php else: ?>
                            <div class="row">
                                <div class="col-md-3 col-4">
                                    <select class="form-control" name="year" id="year">
                                        <?php foreach ($tp as $thn) :
                                            if ($thn->tahun == $thn_selected) :
                                                //$selected = $thn->tahun == $thn_selected ? 'selected="selected"' : "";
                                                ?>
                                                <option value="<?= $thn->tahun ?>"
                                                        selected="selected"><?= $thn->tahun ?></option>
                                            <?php endif; endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-3 col-4">
                                    <select class="form-control" name="month" id="month">
                                        <?php
                                        $arrSmt1 = ["07" => "Jul", "08" => "Agu", "09" => "Sep", "10" => "Okt", "11" => "Nov", "12" => "Des"];
                                        $arrSmt2 = ["01" => "Jan", "02" => "Feb", "03" => "Mar", "04" => "Apr", "05" => "Mei", "06" => "Jun"];
                                        //$arrSmt = ["01" => "Jan", "02" => "Feb", "03" => "Mar", "04" => "Apr", "05" => "Mei", "06" => "Jun",
                                        //    "07" => "Jul", "08" => "Agu", "09" => "Sep", "10" => "Okt", "11" => "Nov", "12" => "Des"];
                                        if ($smt_active->id_smt == '1') :
                                            foreach ($arrSmt1 as $key => $hiji) :
                                                $mSelect = date('m', strtotime($date_selected)) == $key ? 'selected="selected"' : ""; ?>
                                                <option value="<?= $key ?>" <?= $mSelect ?>><?= $hiji ?></option>
                                            <?php endforeach;
                                        else :
                                            foreach ($arrSmt2 as $key => $dua) :
                                                $mSelect = date('m', strtotime($date_selected)) == $key ? 'selected="selected"' : ""; ?>
                                                <option value="<?= $key ?>" <?= $mSelect ?>><?= $dua ?></option>
                                            <?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <button class="col-2 col-md-1 btn btn-outline-primary" id="prevweek"
                                        onclick="prevweek()">
                                    <i class="fa fa-angle-left"></i>
                                </button>
                                <button class="border border-primary col-4 d-none d-md-block text-primary">
                                    <b><?= singkat_tanggal(date('d M Y', strtotime($week[0]))) ?></b>
                                    sd <b><?= singkat_tanggal(date('d M Y', strtotime($week[count($week) - 1]))) ?></b>
                                </button>
                                <button class="col-2 col-md-1 btn btn-outline-primary" id="nextweek"
                                        onclick="nextweek()">
                                    <i class="fa fa-angle-right"></i>
                                </button>
                            </div>
                            <table class="table border mt-4" id="tbl-jadwal">
                                <tr class="alert alert-default-success">
                                    <th class="text-center align-middle border" style="height: 50px">
                                        Hari & Tanggal
                                    </th>
                                    <th class="text-center align-middle border">
                                        Jam Ke
                                    </th>
                                    <th class="text-center align-middle border">
                                        Waktu
                                    </th>
                                    <th class="text-center align-middle border">
                                        Mata Pelajaran
                                    </th>
                                    <th class="text-center align-middle border">
                                        Materi
                                    </th>
                                    <th class="text-center align-middle border">
                                        Tugas
                                    </th>
                                </tr>
                                <?php
                                $idHari = 1;
                                foreach ($week as $jh) :
                                    $jamMulai = new DateTime($jadwal_kbm->kbm_jam_mulai);
                                    $jamSampai = new DateTime($jadwal_kbm->kbm_jam_mulai);
                                    $splited = explode('-', $jh ?? '');
                                    $y = $splited[0];
                                    $m = $splited[1];
                                    $d = $splited[2];
                                    $jamMulai->setDate($y, $m, $d);
                                    $jamSampai->setDate($y, $m, $d);

                                    for ($i = 0; $i < $jadwal_kbm->kbm_jml_mapel_hari; $i++):
                                        $jamke = $i + 1; ?>
                                        <tr>
                                            <td class="text-center align-middle text-bold tanggal">
                                                <?= buat_tanggal(date('D, d M Y', strtotime($jh))) ?>
                                            </td>
                                            <td class="border text-center align-middle jam-ke"
                                                data-tgl="<?= $jh ?>"><?= $jamke ?></td>
                                            <?php if (in_array($jamke, $arrIst)) :
                                                $jamSampai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M')); ?>
                                                <td class="border text-center align-middle waktu">
                                                    <?= $jamMulai->format('H:i') ?> - <?= $jamSampai->format('H:i') ?>
                                                </td>
                                                <td class="border align-middle mapel" data-id="">ISTIRAHAT</td>
                                                <td class="border text-center align-middle materi">ISTIRAHAT</td>
                                                <td class="border text-center align-middle tugas">ISTIRAHAT</td>
                                                <?php
                                                $jamMulai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                            else:
                                                $jamSampai->add(new DateInterval('PT' . $jadwal_kbm->kbm_jam_pel . 'M')); ?>
                                                <td class="align-middle text-center">
                                                    <?= $jamMulai->format('H:i') ?> - <?= $jamSampai->format('H:i') ?>
                                                </td>
                                                <td title="<?= $arrRes[$idHari][$jamke]['nama_mapel'] ?>"
                                                    class="border align-middle mapel"
                                                    data-id="<?= $arrRes[$idHari][$jamke]['id_mapel'] ?>">
                                                    <?= $arrRes[$idHari][$jamke]['kode'] ?>
                                                </td>
                                                <td class="border materi">
                                                    <?php
                                                    $id_mpl = $arrRes[$idHari][$jamke]['id_mapel'];
                                                    $opsis = [0 => "--Pilih Materi--"];
                                                    if (isset($opsi_materi[$id_mpl]) && isset($opsi_materi[$id_mpl][1])) {
                                                        $opsis = $opsis + $opsi_materi[$id_mpl][1];
                                                    }
                                                    if ($this->ion_auth->is_admin()) {
                                                        $ada_mapel = true;
                                                    } elseif ($this->ion_auth->in_group('guru')) {
                                                        $ada_mapel = isset($arr_id_kelas_guru[$id_mpl]) && isset($guru) && $ada_kelas;
                                                    } else {
                                                        $ada_mapel = false;
                                                    }
                                                    //$disableSelect = $ada_mapel && $today < $jamMulai ? '' : 'disabled="disabled"';
                                                    $disableSelect = $ada_mapel ? '' : 'disabled="disabled"';
                                                    $tempId = $tempIdSelected . str_replace('-', '', $jh) . $jamke . '1';

                                                    echo form_dropdown(
                                                        'select-materi',
                                                        $opsis,
                                                        isset($detail_jadwal_materi[$tempId]) ? $detail_jadwal_materi[$tempId]->id_materi : '',
                                                        'class="select2 dropdown-materi form-control" data-name="select-materi"'//. $disableSelect
                                                    ); ?>
                                                </td>
                                                <td class="border tugas">
                                                    <?php
                                                    $id_mpl = $arrRes[$idHari][$jamke]['id_mapel'];
                                                    $opsis = [0 => "--Pilih Tugas--"];
                                                    if (isset($opsi_materi[$id_mpl]) && isset($opsi_materi[$id_mpl][2])) {
                                                        $opsis = $opsis + $opsi_materi[$id_mpl][2];
                                                    }
                                                    if ($this->ion_auth->is_admin()) {
                                                        $ada_mapel = true;
                                                    } elseif ($this->ion_auth->in_group('guru')) {
                                                        $ada_mapel = isset($arr_id_kelas_guru[$id_mpl]) && isset($guru) && $ada_kelas;
                                                    } else {
                                                        $ada_mapel = false;
                                                    }
                                                    //$disableSelect = $ada_mapel && $today < $jamMulai ? '' : 'disabled="disabled"';
                                                    $disableSelect = $ada_mapel ? '' : 'disabled="disabled"';
                                                    $tempId = $tempIdSelected . str_replace('-', '', $jh) . $jamke . '2';

                                                    echo form_dropdown(
                                                        'select-tugas',
                                                        $opsis,
                                                        isset($detail_jadwal_tugas[$tempId]) ? $detail_jadwal_tugas[$tempId]->id_materi : '',
                                                        'class="select2 dropdown-tugas form-control" data-name="select-tugas"'//. $disableSelect
                                                    ); ?>
                                                </td>
                                                <?php
                                                $jamMulai->add(new DateInterval('PT' . $jadwal_kbm->kbm_jam_pel . 'M'));
                                            endif; ?>
                                        </tr>
                                        <?php if ($jamke == $jadwal_kbm->kbm_jml_mapel_hari) : ?>
                                        <tr class="alert alert-default-secondary">
                                            <td colspan="6"></td>
                                        </tr>
                                    <?php endif; endfor;
                                    $idHari++; endforeach; ?>
                            </table>

                            <?= form_open('setMapel', array('id' => 'setmapel')); ?>
                            <button class="btn btn-primary float-right mt-3">Simpan Jadwal</button>
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

<div class="modal fade" id="pickerModal" tabindex="-1" role="dialog" aria-labelledby="pickerModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pickerModalLabel">Tambah Ekstrakurikuler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="height: 400px;overflow-y:auto;-webkit-overflow-scrolling: touch">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>/assets/app/js/jquery.rowspanizer.js"></script>
<script>
    var tglSelected = "<?=$date_selected?>";
    var klsSelected = "<?=$id_kelas?>";
    var thnSelected = "<?=$thn_selected?>";
    var blnSelected = "<?=$bln_selected?>";
    var currSmt = "<?=$smt_active->id_smt?>";
    var currTp = "<?=$tp_active->id_tp?>";
    var currTahun = "<?=$tp_active->tahun?>".split('/');

    var arrIstirahat = JSON.parse(JSON.stringify(<?= json_encode($jmlIst)?>));
    var ists = [];
    $.each(arrIstirahat, function (i, v) {
        ists.push(v.ist)
    });

    //console.log('tahun', currTahun[0]);
    function calculateNextWeek(tgl) {
        var d = new Date(tgl);
        var next = new Date(d.setDate(d.getDate() + 8 - d.getDay()));
        //var bound = currSmt == '1' ? 1 : 6;
        //console.log("curmonth", next.getMonth());
        //console.log("next-bound", bound);
        //if ((next.getMonth() + 1) == bound) {
        //    return null;
        //} else {
        return next.getFullYear() + "-" + ("0" + (next.getMonth() + 1)).slice(-2) + "-" + ("0" + next.getDate()).slice(-2);
        //}
    }

    function calculatePrevWeek(tgl) {
        var d = new Date(tgl);
        var prev = new Date(d.setDate(d.getDate() - 6 - d.getDay()));

        //var bound = currSmt == '1' ? 6 : 1;
        //console.log("curmonth", prev.getMonth());
        //console.log("prev-bound", bound);
        //if ((prev.getMonth() + 1) == bound) {
        //    return null;
        //} else {
        return prev.getFullYear() + "-" + ("0" + (prev.getMonth() + 1)).slice(-2) + "-" + ("0" + prev.getDate()).slice(-2);
        //}
    }

    function nextweek() {
        var datestring = calculateNextWeek(tglSelected);
        if (datestring != null) window.location.href = base_url + 'kelasmaterijadwal/kelas?kelas=' + klsSelected + '&date=' + datestring + '&tahun=' + thnSelected + '&bulan=' + blnSelected;
    }

    function prevweek() {
        var datestring = calculatePrevWeek(tglSelected);
        if (datestring != null) window.location.href = base_url + 'kelasmaterijadwal/kelas?kelas=' + klsSelected + '&date=' + datestring + '&tahun=' + thnSelected + '&bulan=' + blnSelected;
    }

    $(document).ready(function () {
        $("#tbl-jadwal").rowspanizer({columns: [0]});
        $('#year').on('change', function () {
            var tahun = $(this).val().split('/');
            var thn;
            if (currSmt == '1') thn = tahun[0];
            else thn = tahun[1];
            var month = $('#month').val();
            //console.log(thn, month);

            var day = new Date(tglSelected);
            var tgl = thn + "-" + +"-" + ("0" + day.getDate()).slice(-2);
            //reload(klsSelected, tgl, thnSelected, blnSelected);
        });

        $('#month').on('change', function () {
            var tahun = $('#year').val().split('/');
            var thn;
            if (currSmt == '1') thn = tahun[0];
            else thn = tahun[1];
            var month = $(this).val();
            //console.log(thn, month);

            var day = new Date(tglSelected);
            var tgl = thn + "-" + month + "-" + ("0" + day.getDate()).slice(-2);
            reload(klsSelected, tgl, thnSelected, month);
        });

        if (calculatePrevWeek(tglSelected) == null) $('#prevweek').attr('disabled', 'disabled');
        if (calculateNextWeek(tglSelected) == null) $('#nextweek').attr('disabled', 'disabled');

        $('#setmapel').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            const $rows = $('#tbl-jadwal').find('tr'), headers = $rows.splice(0, 1); // header rows
            var jsonMateri = [];
            var jsonTugas = [];
            $rows.each((i, row) => {
                const $jamke = $(row).find(".jam-ke").text();
                const $tanggal = $(row).find(".jam-ke").attr('data-tgl');
                const $mapel = $(row).find('.mapel').attr('data-id');

                //var siswaid = $(row).attr("data-id");
                const $materiSelect = $(row).find('select[data-name="select-materi"]');
                const idMateri = $materiSelect.val();
                var isDisabled = $materiSelect.prop('disabled');
                //console.log('select:', isDisabled);

                const $tugasSelect = $(row).find('select[data-name="select-tugas"]');
                const idTugas = $tugasSelect.val();
                var isIst = jQuery.inArray('' + $jamke, ists) > -1;

                let itemm = {};
                if (!isDisabled && $mapel != "" && $jamke != "" && !isIst) {
                    itemm ["id_kjm"] = klsSelected + currTp + currSmt + $tanggal.replaceAll("-", "") + $jamke + "1";
                    itemm ["jadwal_materi"] = $tanggal;
                    itemm ["id_materi"] = idMateri;
                    itemm ["id_kelas"] = klsSelected;
                    //itemm ["jam_ke"] = $jamke;
                    itemm ["id_mapel"] = $mapel;
                    itemm ["id_tp"] = currTp;
                    itemm ["id_smt"] = currSmt;

                    jsonMateri.push(itemm);
                }

                let itemt = {};
                if (!isDisabled && $mapel != "" && $jamke != "" && !isIst) {
                    itemt ["id_kjm"] = klsSelected + currTp + currSmt + $tanggal.replaceAll("-", "") + $jamke + "2";
                    itemt ["jadwal_materi"] = $tanggal;
                    itemt ["id_materi"] = idTugas;
                    itemt ["id_kelas"] = klsSelected;
                    //itemt ["jam_ke"] = $jamke;
                    itemt ["id_mapel"] = $mapel;
                    itemt ["id_tp"] = currTp;
                    itemt ["id_smt"] = currSmt;

                    jsonTugas.push(itemt);
                }
            });

            //console.log("materi=" + JSON.stringify(jsonMateri, null, 4));
            //console.log("tugas=" + JSON.stringify(jsonTugas, null, 4));

            if (jsonMateri.length == 0 && jsonTugas.length == 0) {
                showWarningToast("Tidak ada yang bisa disimpan");
                return;
            }

            $.ajax({
                url: base_url + 'kelasmaterijadwal/savejadwal',
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize() + "&materi=" + JSON.stringify(jsonMateri) + "&tugas=" + JSON.stringify(jsonTugas),
                success: function (data) {
                    console.log(data);
                    if (data) {
                        swal.fire({
                            title: "Sukses",
                            text: "Jadwal Pelajaran berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            reload(klsSelected, tglSelected, thnSelected, blnSelected);
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

    function refreshPage() {
        if (klsSelected == '0') {
            window.location.href = base_url + 'kelasmaterijadwal';
        } else {
            reload(klsSelected, tglSelected, thnSelected, blnSelected);
        }
    }

    function reload(kelas, tgl, tahun, bulan) {
        window.location.href = base_url + 'kelasmaterijadwal/kelas?kelas=' + kelas + '&date=' + tgl + '&tahun=' + tahun + '&bulan=' + bulan;
    }
</script>
