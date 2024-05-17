<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/08/20
 * Time: 22:29
 */

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
                <?php
                $today = date("Y-m-d");
                $tugas = $tugass[$today];

                if (isset($kbm->istirahat)) {
                    $ist = json_decode(json_encode($kbm->istirahat));
                    $jmlIst = json_decode(json_encode(unserialize($ist ?? '')));
                    $arrIst = [];
                    foreach ($jmlIst as $istirahat) {
                        array_push($arrIst, $istirahat->ist);
                        $arrDur[$istirahat->ist] = $istirahat->dur;
                    }
                }
                ?>
                <div class="col-12">
                    <div class="card my-shadow">
                        <div class="card-header">
                            <h5 class="text-center">
                                TUGAS HARI INI<br/><?= buat_tanggal(date('D, d M Y')) ?>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php
                                $jamMulai = new DateTime($kbm->kbm_jam_mulai);
                                $jamSampai = new DateTime($kbm->kbm_jam_mulai);

                                if (count($tugas) > 0) :
                                    for ($i = 0; $i < $kbm->kbm_jml_mapel_hari; $i++) :
                                        $jamke = $i + 1;
                                        ?>

                                        <div class="col-md-6 col-lg-4">
                                            <div class="card border">
                                                <?php if (in_array($jamke, $arrIst)) :
                                                    $jamSampai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                                    ?>
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <b>JAM KE <?= $jamke ?></b>
                                                        </div>
                                                        <div class="card-tools">
                                                            <i class="fa fa-clock-o text-gray mr-1"></i>
                                                            <?= $jamMulai->format('H:i') ?>
                                                            s/d <?= $jamSampai->format('H:i') ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <div class="text-center" style="min-height: 192px;">
                                                            <br>
                                                            <br>
                                                            <br>
                                                            <b>ISTIRAHAT</b>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $jamMulai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                                else :
                                                    $jamSampai->add(new DateInterval('PT' . $kbm->kbm_jam_pel . 'M'));
                                                    if (isset($tugas[$jamke]->id_materi)) :
                                                        $tkelas = '';
                                                        $arrkelas = unserialize($tugas[$jamke]->materi_kelas ?? '');

                                                        foreach ($arrkelas as $k => $kls) {
                                                            if ($k > 0) {
                                                                $tkelas .= ', ';
                                                            }
                                                            $tkelas .= $kelas[$kls];
                                                        } ?>
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <b>JAM KE <?= $jamke ?></b>
                                                            </div>
                                                            <div class="card-tools">
                                                                <i class="fa fa-clock-o text-gray mr-1"></i>
                                                                <?= $jamMulai->format('H:i') ?>
                                                                s/d <?= $jamSampai->format('H:i') ?>
                                                            </div>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="small-box bg-gradient-danger mb-0">
                                                                <div class="inner">
                                                                    <h3><?= $tugas[$jamke]->kode_materi ?></h3>
                                                                    <span class="nama-mapel d-inline-block text-truncate"
                                                                          style="width: 300px">
                                                                <?= $tugas[$jamke]->nama_mapel ?></span>
                                                                    <br>
                                                                    <span><?= $tugas[$jamke]->nama_guru ?></span>
                                                                    <br>
                                                                    <span>Kelas: <?= $tkelas ?></span>
                                                                </div>
                                                                <div class="icon">
                                                                    <i class="fas fa-book-open"></i>
                                                                </div>
                                                                <hr style="margin-top:0; margin-bottom: 0">

                                                                <a href="<?= base_url('siswa/bukatugas/' . $tugas[$jamke]->id_kjm . '/' . $jamke) ?>"
                                                                   class="small-box-footer p-2">BUKA TUGAS
                                                                    <i class="fas fa-arrow-circle-right ml-3"></i><span
                                                                            class="ml-2"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="card-header">
                                                            <div class="card-title">
                                                                <b>JAM KE <?= $jamke ?></b>
                                                            </div>
                                                            <div class="card-tools">
                                                                <i class="fa fa-clock-o text-gray mr-1"></i>
                                                                <?= $jamMulai->format('H:i') ?>
                                                                s/d <?= $jamSampai->format('H:i') ?>
                                                            </div>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="text-center" style="min-height: 192px;">
                                                                <br>
                                                                <br>
                                                                <?= $tugas[$jamke]->nama_mapel ?>
                                                                <p><b>Tidak ada tugas</b></p>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php
                                                    $jamMulai->add(new DateInterval('PT' . $kbm->kbm_jam_pel . 'M'));
                                                endif; ?>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                <?php else: ?>
                                    <div class="col-12 alert alert-default-warning">
                                        <div class="text-center">Belum ada jadwal pelajaran</div>
                                    </div>
                                <?php endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card my-shadow">
                        <div class="card-header">
                            <h5 class="text-center">
                                TUGAS SEMINGGU
                            </h5>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
                                <?php foreach ($week as $index => $tgl) :
                                    $active = $index == 0 ? 'active' : '';
                                    $selected = $index == 0 ? 'true' : 'false';
                                    ?>
                                    <li class="nav-item" role="presentation">
                                        <a type="button" class="btn nav-link seminggu <?= $active ?>" id="<?= $tgl ?>"
                                           data-toggle="pill" data-target="#tab-<?= $tgl ?>" type="button" role="tab"
                                           aria-controls="<?= $tgl ?>" aria-selected="<?= $selected ?>">
                                            <?= str_replace(',', '<br>', singkat_tanggal(date('D, d M', strtotime($tgl)))) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <?php
                                $jamMulai = new DateTime($kbm->kbm_jam_mulai);
                                $jamSampai = new DateTime($kbm->kbm_jam_mulai);

                                foreach ($tugass as $tg => $mat) :
                                    $show = $tg == $today ? 'show active' : '';
                                    ?>
                                    <div class="tab-pane fade <?= $show ?>" id="tab-<?= $tg ?>" role="tabpanel"
                                         aria-labelledby="tab-<?= $tg ?>-tab">
                                        <?php
                                        //echo '<pre>';
                                        //var_dump($logs[$tg]);
                                        //echo '</pre>';
                                        //$log = $logs[$tg];
                                        ?>
                                        <table class="table table-sm">
                                            <tr class="alert alert-default-secondary">
                                                <th class="text-center">Jam Ke</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Tugas</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                            <?php
                                            foreach ($mat as $jam => $mtr) :
                                                ?>
                                                <?php if (in_array($jam, $arrIst)) :
                                                $jamSampai->add(new DateInterval('PT' . $arrDur[$jam] . 'M'));
                                                ?>
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        <?= $jam ?><br>
                                                        <small>
                                                            <?= $jamMulai->format('H:i') ?>
                                                            s/d <?= $jamSampai->format('H:i') ?>
                                                        </small>
                                                    </td>
                                                    <td colspan="3" class="align-middle">ISTIRAHAT</td>
                                                </tr>
                                                <?php
                                                $jamMulai->add(new DateInterval('PT' . $arrDur[$jam] . 'M'));
                                            else :
                                                $jamSampai->add(new DateInterval('PT' . $kbm->kbm_jam_pel . 'M'));
                                                if (isset($tugas[$jamke]->id_materi)) : ?>
                                                    <tr>
                                                        <td class="text-center align-middle">
                                                            <?= $jam ?><br>
                                                            <small>
                                                                <?= $jamMulai->format('H:i') ?>
                                                                s/d <?= $jamSampai->format('H:i') ?>
                                                            </small>
                                                        </td>
                                                        <?php
                                                        if (isset($mtr->id_kjm)) :
                                                            $status = '';
                                                            //var_dump($log[$mtr->id_kjm]);
                                                            if (count($log) > 0) {
                                                                if (isset($log[$mtr->id_kjm]) && $log[$mtr->id_kjm]->finish_time != null) {
                                                                    $status = '<a href="' . base_url() . 'siswa/bukatugas/' . $mtr->id_kjm . '/' . $tg . '" class="btn btn-success">Selesai</a>';
                                                                } else {
                                                                    $status = '<a href="' . base_url() . 'siswa/bukatugas/' . $mtr->id_kjm . '/' . $tg . '" class="btn btn-warning">Belum Selesai</a>';
                                                                }
                                                            } else {
                                                                $status = '<a href="' . base_url() . 'siswa/bukatugas/' . $mtr->id_kjm . '/' . $tg . '" class="btn btn-danger">Belum Dikerjakan</a>';
                                                            }
                                                            ?>
                                                            <td class="align-middle"><?= $mtr->nama_mapel ?></td>
                                                            <td class="align-middle"
                                                                style="line-height: 1"><?= $mtr->kode_materi ?>
                                                                <br><small><?= $mtr->judul_materi ?></small>
                                                            </td>
                                                            <td class="text-center align-middle"><?= $status ?></td>
                                                        <?php else: ?>
                                                            <td class="align-middle"><?= $mtr->nama_mapel ?></td>
                                                            <td class="align-middle">-</td>
                                                            <td class="text-center align-middle">-</td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php else: ?>
                                                    <!--
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <b>JAM KE <?= $jamke ?></b>
                                                    </div>
                                                    <div class="card-tools">
                                                        <i class="fa fa-clock-o text-gray mr-1"></i>
                                                        <?= $jamMulai->format('H:i') ?> s/d <?= $jamSampai->format('H:i') ?>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="text-center" style="min-height: 185px;">
                                                        <br>
                                                        <br>
                                                        <?= $tugas[$jamke]->nama_mapel ?>
                                                        <p><b>Tidak ada tugas</b></p>
                                                    </div>
                                                </div>
                                                -->
                                                <?php endif; ?>
                                                <?php
                                                $jamMulai->add(new DateInterval('PT' . $kbm->kbm_jam_pel . 'M'));
                                            endif; ?>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="overlay d-none" id="loading">
                            <div class="spinner-grow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        //getMateri(senin);
        var w = $(window).width();
        setWidth(w);

        $(window).on('resize', function () {
            setWidth($(this).width());
        });
    });

    function setWidth(width) {
        let w;
        if (width <= 750) {
            w = '';
        } else if (width <= 975) {
            w = 300;
        } else if (width <= 1182) {
            w = 260;
        } else {
            w = 320;
        }
        $(".nama-mapel").css("width", w);
    }
</script>
