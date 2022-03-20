<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/08/20
 * Time: 22:29
 */

$arrGuru = [];
foreach ($guru as $g) {
    $arrGuru[$g->id_guru] = $g->nama_guru;
}

$jam_pertama = null;
?>
<div class="content-wrapper" style="margin-top: -1px;">
    <div class="sticky">
    </div>
    <section class="content overlap p-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    $cbt_setting = [];
                    $this->load->view('members/siswa/templates/top'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card my-shadow">
                        <div class="card-header">
                            <div class="text-center">INFO ULANGAN/UJIAN</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <?php
                                    if ($cbt_info == null) : ?>
                                        <div class="alert alert-default-warning">
                                            <div class="text-center">Tidak ada jadwal penilaian</div>
                                        </div>
                                    <?php else: ?>
                                        <div class="card border">
                                            <div class="card-header border-bottom-0">
                                                <h4 class="card-title mt-1 text-wrap"><?= $siswa->nama ?></h4>
                                            </div>
                                            <div class="card-body pt-0">
                                                <ul class="list-group list-group-unbordered">
                                                    <?php
                                                    $arrTitle = ['Ruang', 'Sesi', 'Dari', 'Sampai'];
                                                    $arrSub = [$cbt_info->nama_ruang, $cbt_info->nama_sesi, substr($cbt_info->waktu_mulai, 0, -3), substr($cbt_info->waktu_akhir, 0, -3)];
                                                    foreach ($arrTitle as $key => $title) :
                                                        if ($arrSub[$key] == null) array_push($cbt_setting, $title)
                                                        ?>
                                                        <li class="list-group-item p-1">
                                                            <?= $title ?>
                                                            <span class="float-right"><b><?= $arrSub[$key] ?></b></span>
                                                        </li>
                                                    <?php
                                                    endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-default-danger">
                                        <div class="text-center"><b>** INFORMASI PENTING **</b></div>
                                        Selama melaksanakan ULANGAN/UJIAN <b>Siswa DILARANG:</b>
                                        <ul>
                                            <li>
                                                Meninggalkan ruang ujian tanpa izin pengawas
                                            </li>
                                            <li>
                                                Logout/Keluar dari aplikasi tanpa izin dari pengawas
                                            </li>
                                            <li>
                                                Saling memberitahukan jawaban sesama peserta
                                            </li>
                                            <li>
                                                Membawa makanan dan minuman
                                            </li>
                                            <li>
                                                Membawa handphone ke ruangan ujian
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card my-shadow">
                        <div class="card-header">
                            <h5 class="text-center">
                                PENILAIAN HARI INI<br/><?= buat_tanggal(date('D, d M Y')) ?>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row" id="jadwal-content">
                                <?php
                                //echo '<pre>';
                                //var_dump($elapsed);
                                //echo '</pre>';
                                if ($cbt_info == null || count($cbt_setting) > 0) : ?>
                                    <div class="col-12 alert alert-default-warning">
                                        <div class="text-center">Tidak ada jadwal penilaian.<b>Tidak bisa mengerjakan
                                                ulangan/ujian.<br>Hubungi Proktor/Admin</div>
                                    </div>
                                <?php else:
                                    $jamSesi = $cbt_info == null ? '0' : (isset($cbt_info->sesi_id) ? $cbt_info->sesi_id : $cbt_info->id_sesi);
                                    foreach ($cbt_jadwal as $key => $jadwal)  :
                                        if ($jadwal->jarak == 0) {
                                            $jam_pertama = isset($elapsed[$jadwal->id_jadwal]) ? $elapsed[$jadwal->id_jadwal]->mulai : null;
                                        }
                                        $kk = unserialize($jadwal->bank_kelas);
                                        $arrKelasCbt = [];
                                        foreach ($kk as $k) {
                                            array_push($arrKelasCbt, $k['kelas_id']);
                                        }

                                        $startDay = strtotime($jadwal->tgl_mulai);
                                        $endDay = strtotime($jadwal->tgl_selesai);
                                        $today = strtotime(date('Y-m-d'));

                                        //echo 'skrg='.$today . ' start=' . $startDay . ' end=' . $endDay;

                                        $hariMulai = new DateTime($jadwal->tgl_mulai);
                                        $hariSampai = new DateTime($jadwal->tgl_selesai);

                                        $sesiMulai = new DateTime($sesi[$jamSesi]['mulai']);
                                        $sesiSampai = new DateTime($sesi[$jamSesi]['akhir']);
                                        $now = strtotime(date('H:i'));

                                        $durasi = $elapsed[$jadwal->id_jadwal];

                                        if ($durasi != null) {
                                            $selesai = $durasi->selesai != null;
                                            $lanjutkan = $durasi->lama_ujian != null;
                                            $reset = $durasi->reset;
                                            if ($lanjutkan != null && !$selesai) $bg = 'bg-gradient-warning';
                                            elseif ($selesai) $bg = 'bg-gradient-success';
                                            else {
                                                if ($jadwal->jarak != 0) {
                                                    $bg = 'bg-gradient-secondary';
                                                } else {
                                                    $bg = 'bg-gradient-danger';
                                                }
                                            }
                                        } else {
                                            $selesai = false;
                                            $lanjutkan = false;
                                            $reset = 0;
                                            if ($jadwal->jarak != 0) {
                                                $bg = 'bg-gradient-secondary';
                                            } else {
                                                $bg = 'bg-gradient-danger';
                                            }
                                        }

                                        //$durasiMulai = new DateTime($sesi[$jamSesi]['mulai']);
                                        //$durasiSampai = new DateTime($sesi[$jamSesi]['mulai']);
                                        //$durasiMulai->add(new DateInterval('PT' . $jadwal->jarak . 'M'));
                                        //$durasiSampai->add(new DateInterval('PT' . ($jadwal->jarak + $jadwal->durasi_ujian) . 'M'));
                                        //echo '<pre>';
                                        //var_dump($now);
                                        //var_dump(strtotime($durasiMulai->format('H:i')));
                                        //echo '</pre>';
                                        ?>
                                        <div class="jadwal-cbt col-md-6 col-lg-4">
                                            <div class="card border">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <b><i class="fa fa-clock-o text-gray mr-1"></i>
                                                            <?= $jadwal->durasi_ujian ?> mnt</b>
                                                    </div>
                                                    <div class="card-tools">
                                                        <?=$jadwal->soal_agama?>
                                                        <!--
                                                        <?= $sesiMulai->format('H:i') ?>
                                                        ~ <?= $sesiSampai->format('H:i') ?>
                                                    -->
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="small-box <?= $bg ?> mb-0">
                                                        <div class="inner">
                                                            <h4><b><?= $jadwal->kode ?></b></h4>
                                                            <h5><?= $jadwal->nama_jenis ?></h5>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fas fa-book-open"></i>
                                                        </div>
                                                        <hr style="margin-top:0; margin-bottom: 0">
                                                        <?php
                                                        if (!$lanjutkan && $reset == 0 && !$selesai) : ?>
                                                            <?php if ($today < $startDay) : ?>
                                                                <div id="status<?=$jadwal->id_jadwal?>" class="small-box-footer p-2">
                                                                    <b>BELUM DIMULAI</b>
                                                                </div>
                                                            <?php elseif ($today > $endDay) : ?>
                                                                <div id="status<?=$jadwal->id_jadwal?>" class="small-box-footer p-2">
                                                                    <b>SUDAH BERAKHIR</b>
                                                                </div>
                                                            <?php else: ?>
                                                                <?php if ($now < strtotime($sesiMulai->format('H:i'))) : ?>
                                                                    <div id="status<?=$jadwal->id_jadwal?>" class="small-box-footer p-2">
                                                                        <b><?= strtoupper($cbt_info->nama_sesi) ?> BELUM DIMULAI</b>
                                                                    </div>
                                                                <?php elseif ($now > strtotime($sesiSampai->format('H:i'))) : ?>
                                                                    <div id="status<?=$jadwal->id_jadwal?>" class="small-box-footer p-2">
                                                                        <b><?= strtoupper($cbt_info->nama_sesi) ?> SUDAH BERAKHIR</b>
                                                                    </div>
                                                                <?php else : ?>
                                                                    <?php
                                                                    $hide = $jadwal->jarak != 0 ? 'd-none' : '';
                                                                    $show = $jadwal->jarak != 0 ? '' : 'd-none';
                                                                    ?>
                                                                    <div id="timer<?=$jadwal->id_jadwal?>" data-jarak="<?=$jadwal->jarak?>" data-id="<?=$jadwal->id_jadwal?>" class="timer small-box-footer p-2 <?=$show?>"></div>
                                                                    <a id="<?=$jadwal->id_jadwal?>"
                                                                       href="<?= base_url('siswa/konfirmasi/' . $jadwal->id_jadwal) ?>"
                                                                       class="text-white small-box-footer p-2 <?=$hide?>">
                                                                        <b>KERJAKAN</b><i class="fas fa-arrow-circle-right ml-3"></i>
                                                                    </a>
                                                                    <?php endif; endif; ?>
                                                        <?php elseif ($lanjutkan && !$selesai) : ?>
                                                            <a id="status<?=$jadwal->id_jadwal?>" class="small-box-footer p-2 text-white"
                                                               href="<?= base_url('siswa/konfirmasi/' . $jadwal->id_jadwal) ?>">
                                                                <b>LANJUTKAN</b><i class="fas fa-arrow-circle-right ml-3"></i>
                                                            </a>
                                                        <?php else : ?>
                                                            <div id="status<?=$jadwal->id_jadwal?>" class="small-box-footer p-2">
                                                                <b>SUDAH SELESAI</b>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?=base_url()?>/assets/app/js/jquery.countdown.js"></script>
<script>
    $(document).ready(function () {
        /*
        let targetTime = new Date(localStorage.getItem('target' + ID));

        function checkComplete() {
            var now = new Date().getTime();
            var distance = targetTime - now;

            if (distance < 0) {
                $('#status').html('<b>Waktu Habis</b>');
            }
        }

        //console.log(localStorage.getItem('target' + ID));
        console.log('sampai:',targetTime.getTime());
        console.log('kini', new Date().getTime());
        console.log('sisa', targetTime - new Date().getTime());

        if (reset == 0) {
            localStorage.setItem('current' + ID, null);
            localStorage.setItem('target' + ID, null);
        }

        if (localStorage.getItem('target' + ID) != null) {
            checkComplete();
        }
        */

        var siswaMulai = '<?=$jam_pertama == null ? 0 : $jam_pertama?>';
        if (siswaMulai == 0) {
            $('.timer').html('<b>Belum dimulai</b>');
        } else {
            $('.timer').each(function() {
                var idTimer = $(this).data('id');
                var target = new Date(siswaMulai);
                target.setMinutes(target.getMinutes() + $(this).data('jarak'));
                $('#timer'+idTimer).countdown(target, function(event) {
                    $(this).html(event.strftime('<span class="text-bold">%H:%M</span><small>:%S</small>'));
                }).on('finish.countdown', function() {
                    $(this).hide();
                    $('#'+idTimer).removeClass('d-none');
                    var parent = $(this).closest('.bg-gradient-secondary');
                    console.log('parent', parent);
                    parent.removeClass('bg-gradient-secondary').addClass('bg-gradient-danger');
                });
            });
        }

        var $boxs = $('.small-box');
        $.each($boxs, function (i, child) {
            var idTimer = $(child).find('.timer').attr('id');
            if (idTimer != null) {
            }
        });

        if (!$('.jadwal-cbt').length) {
            var html = '<div class="col-12 alert alert-default-warning">' +
                'Tidak ada jadwal penilaian.' +
                '</div>';

            $('#jadwal-content').html(html);
        }

        if (<?= count($cbt_setting)?> >0){
            var html = '<div class="col-12 alert alert-default-warning">' +
                'RUANG atau SESI belum terdaftar.<br>Tidak bisa mengerjakan ulangan/ujian.<br>Hubungi Proktor/Admin' +
                '</div>';

            $('#jadwal-content').html(html);
        }
    });

    function startTime(idTimer) {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);

        timer.html('<span class="text-lg">' + h + ':' + m + '</span>:' + s);
        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {i = "0" + i}return i;
    }

</script>
