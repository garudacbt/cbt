<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 23/08/20
 * Time: 23:18
 */
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
                <div class="col-12 col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="card-title text-white">
                                Kehadiran Hari Ini
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            //echo '<pre>';
                            //var_dump($arrRes[1]->mapel);
                            //echo '<br>';
                            //var_dump($kbm);
                            //echo '<br>';
                            //var_dump($jadwal);
                            //echo '</pre>';
                            if ($kbm == null) : ?>
                                <div class="col-lg-12 p-0">
                                    <div class="alert align-content-center" role="alert">
                                        Jadwal belum dibuat.
                                    </div>
                                </div>
                            <?php else:

                            foreach ($jadwal as $k) {
                                $arrRes[$k->jam_ke] = (object) ['mapel' => $k->nama_mapel, 'jam_ke' => $k->jam_ke, 'id_mapel' => $k->id_mapel, 'kode' => $k->kode];
                            }

                            $arrIst = [];
                            $arrDur = [];
                            $ist = unserialize($kbm->istirahat);
                            foreach ($ist as $is) {
                                array_push($arrIst, $is['ist']);
                                $arrDur[$is['ist']] = $is['dur'];
                            }
                            ?>
                            <table class="table table-sm w-100">
                                <thead>
                                <tr>
                                    <th class="text-center">Jam Ke</th>
                                    <th class="text-center">Waktu</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kehadiran</th>
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
                                            <td class="text-center"><?=$jamke?></td>
                                            <td class="text-center">
                                                <?= $jamMulai->format('H:i') ?> - <?= $jamSampai->format('H:i') ?>
                                            </td>
                                            <td>ISTIRAHAT</td>
                                            <td>ISTIRAHAT</td>
                                        </tr>
                                        <?php
                                        $jamMulai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                    else :
                                        $jamSampai->add(new DateInterval('PT' . $jamMapel . 'M')); ?>
                                                <tr>
                                                    <td class="text-center"><?=$jamke?></td>
                                                    <td class="text-center">
                                                        <?= $jamMulai->format('H:i') ?> - <?= $jamSampai->format('H:i') ?>
                                                    </td>
                                                    <td><?=$arrRes[$jamke]->mapel?></td>
                                                    <td>-</td>
                                                </tr>
                                            <?php
                                        $jamMulai->add(new DateInterval('PT' . $jamMapel . 'M'));
                                    endif; endfor; ?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card card-red">
                        <div class="card-header">
                            <div class="card-title text-white">
                                Jumlah Tidak Hadir
                            </div>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <!--
                <div class="col-12">
                    <div class="card card-purple">
                        <div class="card-header">
                            <div class="card-title text-white">
                                Tabel Kehadiran Kamu
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>
    </section>
</div>
