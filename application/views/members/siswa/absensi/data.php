<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 23/08/20
 * Time: 23:18
 */

function format_interval(DateInterval $interval)
{
    $result = "";
    if ($interval->y) {
        $result .= $interval->format("%y tahun ");
    }
    if ($interval->m) {
        $result .= $interval->format("%m bulan ");
    }
    if ($interval->d) {
        $result .= $interval->format("%d hari ");
    }
    if ($interval->h) {
        $result .= $interval->format("%h jam ");
    }
    if ($interval->i) {
        $result .= $interval->format("%i menit ");
    }
    //if ($interval->s) { $result .= $interval->format("%s seconds "); }

    return $result;
}

$arrHari = ['Ming', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Ming'];
$arrBulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: -1px;">
    <!-- Main content -->
    <div class="sticky">
    </div>
    <section class="content overlap p-4">
        <div class="container">
            <?php $this->load->view('members/siswa/templates/top'); ?>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title text-white">
                                Kehadiran Hari Ini
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            $today = date('Y-m-d');
                            if ($kbm == null) : ?>
                                <div class="col-lg-12 p-0">
                                    <div class="alert align-content-center" role="alert">
                                        Jadwal belum dibuat.
                                    </div>
                                </div>
                            <?php else:
                                if (isset($jadwal) && count($jadwal) > 0) :
                                    foreach ($jadwal as $k) {
                                        $arrRes[$k->jam_ke] = (object)['mapel' => $k->nama_mapel, 'jam_ke' => $k->jam_ke, 'id_mapel' => $k->id_mapel, 'kode' => $k->kode];
                                    }

                                    $arrIst = [];
                                    $arrDur = [];
                                    foreach ($kbm->istirahat as $is) {
                                        array_push($arrIst, $is['ist']);
                                        $arrDur[$is['ist']] = $is['dur'];
                                    }

                                    $statusMateri = isset($sebulan['log'][1]) && isset($sebulan['log'][1][$today]) ? $sebulan['log'][1][$today] : [];
                                    $statusTugas = isset($sebulan['log'][2]) && isset($sebulan['log'][2][$today]) ? $sebulan['log'][2][$today] : [];
                                    ?>
                                    <table class="table w-100 table-bordered table-responsive">
                                        <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center align-middle">Jam<br>Ke</th>
                                            <th rowspan="2" class="text-center align-middle w-25">Waktu</th>
                                            <th rowspan="2" class="text-center align-middle w-75">Mata Pelajaran</th>
                                            <th class="text-center align-middle" colspan="2">Kehadiran</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Materi</th>
                                            <th class="text-center">Tugas</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $jamMapel = $kbm->kbm_jam_pel;
                                        $waktu = $kbm->kbm_jam_mulai;
                                        $jmlMapel = $kbm->kbm_jml_mapel_hari;

                                        $jamMulai = new DateTime($waktu);
                                        $jamSampai = new DateTime($waktu);

                                        for ($i = 0; $i < $jmlMapel; $i++) :
                                            $jamke = $i + 1;
                                            if (in_array($jamke, $arrIst)) :
                                                $jamSampai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                                ?>
                                                <tr>
                                                    <td class="text-center bg-gray-light"><?= $jamke ?></td>
                                                    <td class="text-center bg-gray-light">
                                                        <?= $jamMulai->format('H:i') ?>
                                                        - <?= $jamSampai->format('H:i') ?>
                                                    </td>
                                                    <td colspan="5" class="bg-gray-light">ISTIRAHAT</td>
                                                </tr>
                                                <?php
                                                $jamMulai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                            else :
                                                $jamSampai->add(new DateInterval('PT' . $jamMapel . 'M'));
                                                $absenMateri = isset($statusMateri[$jamke])
                                                    ? date('H:i', strtotime($statusMateri[$jamke]->log_time))
                                                    : '-';
                                                $absenTugas = isset($statusTugas[$jamke])
                                                    ? date('H:i', strtotime($statusTugas[$jamke]->log_time))
                                                    : '-';
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?= $jamke ?></td>
                                                    <td class="text-center">
                                                        <?= $jamMulai->format('H:i') ?>
                                                        - <?= $jamSampai->format('H:i') ?>
                                                    </td>
                                                    <td><?= $arrRes[$jamke]->mapel ?></td>
                                                    <td class="text-center"><?= $absenMateri ?></td>
                                                    <td class="text-center"><?= $absenTugas ?></td>
                                                </tr>
                                                <?php
                                                $jamMulai->add(new DateInterval('PT' . $jamMapel . 'M'));
                                            endif; endfor; ?>
                                        </tbody>
                                    </table>
                                <?php else : ?>
                                    <div class="col-lg-12 p-0">
                                        <div class="alert align-content-center" role="alert">
                                            Tidak ada jadwal hari ini
                                        </div>
                                    </div>
                                <?php endif; endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-indigo">
                        <div class="card-header">
                            <div class="card-title text-white">
                                Detail Kehadiran Bulan <?= buat_tanggal(date('M')) ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if ($kbm != null) :
                                $tanggal = date('d');
                                $bulan = date('m');
                                $tahun = date('Y');
                                $tgl = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
                                $jmlMinggu = 0;
                                $arrtgl = [];
                                for ($i = 0; $i < $tgl; $i++) {
                                    $t = ($i + 1) < 10 ? '0' . ($i + 1) : $i + 1;
                                    $hari = date('N', strtotime($tahun . '-' . $bulan . '-' . $t));
                                    if ($hari == 7) $jmlMinggu++;
                                    array_push($arrtgl, $t);
                                }
                                ?>
                                <table id="tableMapel" class="w-100 table table-bordered table-sm table-responsive">
                                    <thead>
                                    <tr>
                                        <th rowspan="3" class="text-center align-middle">Jam<br>ke</th>
                                        <th rowspan="3" class="text-center align-middle w-50">Mata Pelajaran</th>
                                        <th class="text-center align-middle" colspan="6">Kehadiran</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="text-center align-middle w-25">Materi</th>
                                        <th colspan="2" class="text-center align-middle w-25">Tugas</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($arrtgl as $tgl) :
                                        $tgl_skrg = $tahun . '-' . $bulan . '-' . $tgl;
                                        $hari = date('N', strtotime($tgl_skrg));
                                        if ($hari != 7 && (int)$tgl <= (int)$tanggal) :
                                            ?>
                                            <tr class="group bg-secondary">
                                                <td class="pl-2 border"
                                                    colspan="2"><?= $tgl . ' ' . $arrBulan[(int)$bulan] ?></td>
                                                <th class="text-center align-middle">Status</th>
                                                <th class="text-center align-middle">Keterangan</th>
                                                <th class="text-center align-middle">Status</th>
                                                <th class="text-center align-middle">Keterangan</th>
                                            </tr>
                                            <?php
                                            $jamMapel = $kbm->kbm_jam_pel;
                                            $waktu = $kbm->kbm_jam_mulai;
                                            $jmlMapel = $kbm->kbm_jml_mapel_hari;
                                            $materi = $sebulan['materis'][$tgl];

                                            $statusMateri = isset($sebulan['log'][1]) &&
                                            isset($sebulan['log'][1][$tgl_skrg])
                                                ? $sebulan['log'][1][$tgl_skrg]
                                                : [];

                                            $statusTugas = isset($sebulan['log'][2]) &&
                                            isset($sebulan['log'][2][$tgl_skrg])
                                                ? $sebulan['log'][2][$tgl_skrg]
                                                : [];

                                            $jdwl = isset($jadwals[$hari]) ? $jadwals[$hari] : [];
                                            $jamMulai = new DateTime($waktu);
                                            $jamSampai = new DateTime($waktu);
                                            if (count($jdwl) > 0) :
                                                $arrIst = [];
                                                $arrDur = [];
                                                foreach ($kbm->istirahat as $is) {
                                                    array_push($arrIst, $is['ist']);
                                                    $arrDur[$is['ist']] = $is['dur'];
                                                }

                                                $jamMapel = $kbm->kbm_jam_pel;
                                                $waktu = $kbm->kbm_jam_mulai;
                                                $jmlMapel = $kbm->kbm_jml_mapel_hari;
                                                for ($i = 0; $i < $jmlMapel; $i++) :
                                                    $jamke = $i + 1;
                                                    if (in_array($jamke, $arrIst)) :
                                                        $jamSampai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                                        ?>
                                                        <tr>
                                                            <td class="text-center bg-gray-light"><?= $jamke ?></td>
                                                            <td colspan="5" class="bg-gray-light">ISTIRAHAT</td>
                                                        </tr>
                                                        <?php
                                                        $jamMulai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                                    else :
                                                        $jamSampai->add(new DateInterval('PT' . $jamMapel . 'M'));
                                                        $adaMateri = isset($materi[$jdwl[$jamke]->id_mapel]) && isset($materi[$jdwl[$jamke]->id_mapel][$jamke]) && isset($materi[$jdwl[$jamke]->id_mapel][$jamke][1]);
                                                        $adaTugas = isset($materi[$jdwl[$jamke]->id_mapel]) && isset($materi[$jdwl[$jamke]->id_mapel][$jamke]) && isset($materi[$jdwl[$jamke]->id_mapel][$jamke][2]);

                                                        $bgMateri = $adaMateri ? '' : 'bg-gray-light';
                                                        $bgTugas = $adaTugas ? '' : 'bg-gray-light';

                                                        $absenMateri = isset($statusMateri[$jamke])
                                                            ? 'Hadir' //$statusMateri[$jamke]->log_time
                                                            : ($adaMateri ? '-' : '');
                                                        $absenTugas = isset($statusTugas[$jamke])
                                                            ? 'Hadir' //$statusTugas[$jamke]->log_time
                                                            : ($adaTugas ? '-' : '');

                                                        $m_ket = '';
                                                        if ($adaMateri) {
                                                            if ($absenMateri != '' && $absenMateri != '-') {
                                                                $str1 = $materi[$jdwl[$jamke]->id_mapel][$jamke][1]->jadwal_materi . ' ' . $jamSampai->format('H:i:s');
                                                                $date1 = new DateTime($str1);
                                                                $str2 = $statusMateri[$jamke]->log_time;
                                                                $date2 = new DateTime($statusMateri[$jamke]->log_time);
                                                                $diff = $date1->diff($date2);
                                                                if (strtotime($str1) < strtotime($str2)) $m_ket = 'Terlambat ' . format_interval($diff);
                                                            } else {
                                                                $m_ket = 'Tidak hadir';
                                                            }
                                                        }
                                                        $t_ket = '';
                                                        if ($adaTugas) {
                                                            if ($absenTugas != '' && $absenTugas != '-') {
                                                                $str1 = $materi[$jdwl[$jamke]->id_mapel][$jamke][2]->jadwal_materi . ' ' . $jamSampai->format('H:i:s');
                                                                $date1 = new DateTime($str1);
                                                                $str2 = $statusTugas[$jamke]->log_time;
                                                                $date2 = new DateTime($statusTugas[$jamke]->log_time);
                                                                $diff = $date1->diff($date2);
                                                                if (strtotime($str1) < strtotime($str2)) $t_ket = 'Terlambat ' . format_interval($diff);
                                                            } else {
                                                                $t_ket = 'Tidak hadir';
                                                            }
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td class="text-center align-middle"><?= $jamke ?></td>
                                                            <td><?= $jdwl[$jamke]->nama_mapel ?><br>
                                                                <small>
                                                                    <?= $jamMulai->format('H:i') ?>
                                                                    - <?= $jamSampai->format('H:i') ?>
                                                                </small>
                                                            </td>
                                                            <td class="text-center align-middle <?= $bgMateri ?>"><?= $absenMateri ?></td>
                                                            <td class="text-center align-middle <?= $bgMateri ?>"><?= $m_ket ?></td>
                                                            <td class="text-center align-middle <?= $bgTugas ?>"><?= $absenTugas ?></td>
                                                            <td class="text-center align-middle <?= $bgTugas ?>"><?= $t_ket ?></td>
                                                        </tr>
                                                        <?php
                                                        $jamMulai->add(new DateInterval('PT' . $jamMapel . 'M'));
                                                    endif;
                                                endfor;
                                            endif; endif; endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="col-lg-12 p-0">
                                    <div class="alert align-content-center" role="alert">
                                        Tidak ada jadwal pelajaran
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
