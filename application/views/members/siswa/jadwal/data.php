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
}
?>

<div class="content-wrapper" style="margin-top: -1px;">
    <div class="sticky">
    </div>
    <section class="content overlap p-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php $this->load->view('members/siswa/templates/top'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card my-shadow">
                        <div class="card-header">
                            <h5 class="text-center">
                                Jadwal Pelajaran Kelas <?= $siswa->nama_kelas ?>
                                <br>Tahun Pelajaran <?= $tp_active->tahun ?> Semester <?= $smt_active->smt ?>
                            </h5>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($jadwal_mapel)) :
                                foreach ($jadwal_mapel as $k) {
                                    foreach ($k['jadwal'] as $j) {
                                        $arrRes[$j->jam_ke][] = [
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

                                $arrIst = [];
                                foreach ($jmlIst as $istirahat) {
                                    array_push($arrIst, $istirahat->ist);
                                    $arrDur[$istirahat->ist] = $istirahat->dur;
                                };
                                ?>
                                <div class="table-responsive">
                                    <table id="jadwal-pelajaran" class="w-100 table table-striped table-bordered">
                                        <thead class="alert alert-primary">
                                        <tr>
                                            <th height="50" class="align-middle text-center p-0">JAM</th>
                                            <th class="align-middle text-center p-0">SEN</th>
                                            <th class="align-middle text-center p-0">SEL</th>
                                            <th class="align-middle text-center p-0">RAB</th>
                                            <th class="align-middle text-center p-0">KAM</th>
                                            <th class="align-middle text-center p-0">JUM</th>
                                            <th class="align-middle text-center p-0">SAB</th>
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
                                                <tr class="jam bg-gradient-fuchsia" data-jamke="<?= $jamke ?>">
                                                    <td class="align-middle text-center">
                                                        <?= $jamMulai->format('H:i') ?>
                                                        - <?= $jamSampai->format('H:i') ?>
                                                    </td>
                                                    <td colspan="6" class="align-middle text-center p-0">ISTIRAHAT</td>
                                                </tr>
                                                <?php
                                                $jamMulai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                            else :
                                                $jamSampai->add(new DateInterval('PT' . $jadwal_kbm->kbm_jam_pel . 'M'));
                                                ?>
                                                <tr class="jam" data-jamke="<?= $jamke ?>">
                                                    <td class="align-middle text-center bg-gradient-primary">
                                                        <?= $jamMulai->format('H:i') ?>
                                                        - <?= $jamSampai->format('H:i') ?>
                                                    </td>
                                                    <?php
                                                    if (isset($arrRes[$jamke])) :
                                                        foreach ($arrRes[$jamke] as $value) :?>
                                                            <td class="align-middle text-center">
                                                                <div class="value-name"
                                                                     data-idmapel="<?= $value['id_mapel'] ?>"
                                                                     data-idhari="<?= $value['id_hari'] ?>"
                                                                     id="<?= $value['id_hari'] . $jamke ?>">
                                                                    <?= $value['kode'] ?>
                                                                </div>
                                                            </td>
                                                        <?php
                                                        endforeach;
                                                    else:
                                                        for ($d = 0; $d < 6; $d++) :
                                                            ?>
                                                            <td class="align-middle text-center">
                                                                <div class="value-name" data-idmapel="0"
                                                                     data-idhari="<?= $d + 1 ?>"
                                                                     id="<?= $d + 1 . $jamke ?>">
                                                                </div>
                                                            </td>
                                                        <?php
                                                        endfor;
                                                    endif; ?>
                                                </tr>

                                                <?php
                                                $jamMulai->add(new DateInterval('PT' . $jadwal_kbm->kbm_jam_pel . 'M'));
                                            endif;
                                        endfor; ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    if (isset($jadwal_kbm->ada)) : ?>
                                        <div class="col-lg-12 p-0">
                                            <div class="alert align-content-center" role="alert">
                                                <strong>Jadwal belum dibuat.</strong> .
                                            </div>
                                        </div>
                                    <?php endif;
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
