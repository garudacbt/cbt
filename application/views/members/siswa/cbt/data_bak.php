<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/08/20
 * Time: 22:29
 */

function cmp($a, $b) {
    return strcmp($a->jam_ke, $b->jam_ke);
}

usort($cbt_jadwal, "cmp");

$arrGuru = [];
foreach ($guru as $g) {
    $arrGuru[$g->id_guru] = $g->nama_guru;
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
                                //var_dump($cbt_jadwal);
                                //echo '</pre>';
                                if ($cbt_info == null) : ?>
                                    <div class="col-12 alert alert-default-warning">
                                        <div class="text-center">Tidak ada jadwal penilaian</div>
                                    </div>
                                <?php else:
                                    $jamSesi = $cbt_info == null ? '0' : (isset($cbt_info->sesi_id) ? $cbt_info->sesi_id : $cbt_info->id_sesi);

                                    foreach ($cbt_jadwal as $key => $jadwal)  :
                                        $kk = unserialize($jadwal->bank_kelas);
                                        $arrKelasCbt = [];
                                        foreach ($kk as $k) {
                                            array_push($arrKelasCbt, $k['kelas_id']);
                                        }

                                        $pp = unserialize($jadwal->pengawas);
                                        $arrPengawasCbt = [];
                                        foreach ($pp as $p) {
                                            if ($p['guru'] != null) {
                                                array_push($arrPengawasCbt, $arrGuru[$p['guru']]);
                                            }
                                        }

                                        $startDay = strtotime($jadwal->tgl_mulai);
                                        $endDay = strtotime($jadwal->tgl_selesai);
                                        $today = strtotime(date('Y-m-d'));

                                        //echo 'skrg='.$today . ' start=' . $startDay . ' end=' . $endDay;

                                        $hariMulai = new DateTime($jadwal->tgl_mulai);
                                        $hariSampai = new DateTime($jadwal->tgl_selesai);

                                        $jamJadwalMulai = new DateTime($sesi[$jamSesi]['mulai']);
                                        $jadwalMulai = $jamJadwalMulai->add(new DateInterval('PT' . $jadwal->jarak . 'M'));
                                        $jamJadwalSelesai = new DateTime($sesi[$jamSesi]['mulai']);
                                        $jadwalSelesai = $jamJadwalSelesai->add(new DateInterval('PT' . $jadwal->durasi_ujian . 'M'));
                                        $jadwalSelesai->add(new DateInterval('PT' . $jadwal->jarak . 'M'));

                                        $jamMulai = new DateTime($sesi[$jamSesi]['mulai']);
                                        $jamSampai = new DateTime($sesi[$jamSesi]['akhir']);
                                        $now = strtotime(date('H:i'));

                                        $durasi = $elapsed[$jadwal->id_jadwal];

                                        $bg;
                                        if ($durasi != null) {
                                            $selesai = $durasi->selesai != null;
                                            $lanjutkan = $durasi->lama_ujian != null;
                                            $reset = $durasi->reset;
                                            if ($lanjutkan != null && !$selesai) $bg = 'bg-gradient-warning'; elseif ($selesai) $bg = 'bg-gradient-success';
                                            else $bg = 'bg-gradient-danger';
                                        } else {
                                            $selesai = false;
                                            $lanjutkan = false;
                                            $reset = 0;
                                            $bg = 'bg-gradient-danger';
                                        }
                                        ?>
                                        <div class="jadwal-cbt col-md-6 col-lg-4">
                                            <div class="card border">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <b><i class="fa fa-clock-o text-gray mr-1"></i>
                                                            <?= $jadwalMulai->format('H:i') ?>
                                                            <!--
                                                            s/d <?= $jadwalSelesai->format('H:i') ?>
                                                            -->
                                                        </b>
                                                    </div>
                                                    <div class="card-tools" id="countdown<?=$jadwal->id_jadwal?>"></div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="small-box <?= $bg ?> mb-0">
                                                        <div class="inner">
                                                            <h4><b><?= $jadwal->kode ?></b></h4>
                                                            <h5><?= $jadwal->nama_jenis ?></h5>
                                                            <!--
																<hr style="margin-top:0; margin-bottom: 0">
																<span class="float-left">Tanggal</span>
																<span
																	class="float-right"><?= $hariMulai->format('d M Y') ?>
																	s/d <?= $hariSampai->format('d M Y') ?></span>
																<br>
																<hr style="margin-top:0; margin-bottom: 0">
																<span class="float-left">Durasi Waktu</span>
																<span
																	class="float-right"><?= $jadwal->durasi_ujian ?>
																	menit</span>
																<br>
																<hr style="margin-top:0; margin-bottom: 0">
																<span class="float-left">Pengawas</span>
																<span
																	class="float-right"><?= implode(', ', $arrPengawasCbt) ?></span>
																<br>
																-->
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fas fa-book-open"></i>
                                                        </div>
                                                        <hr style="margin-top:0; margin-bottom: 0">
                                                        <?php
                                                        if (!$lanjutkan && $reset == 0 && !$selesai) : ?>
                                                            <?php if ($today < $startDay) : ?>
                                                                <div id="status" class="small-box-footer p-2">
                                                                    <b>BELUM DIMULAI</b>
                                                                </div>
                                                            <?php elseif ($today > $endDay) : ?>
                                                                <div id="status" class="small-box-footer p-2">
                                                                    <b>SUDAH BERAKHIR</b>
                                                                </div>
                                                            <?php else: ?>
                                                                <?php if ($now < strtotime($jamMulai->format('H:i'))) : ?>
                                                                    <div id="status" class="small-box-footer p-2">
                                                                        <b><?= strtoupper($cbt_info->nama_sesi) ?> BELUM
                                                                            DIMULAI</b>
                                                                    </div>
                                                                <?php elseif ($now > strtotime($jamSampai->format('H:i'))) : ?>
                                                                    <div id="status" class="small-box-footer p-2">
                                                                        <b><?= strtoupper($cbt_info->nama_sesi) ?> SUDAH
                                                                            BERAKHIR</b>
                                                                    </div>
                                                                <?php else : ?>
                                                                    <?php
                                                                if ($now < $jadwalMulai->format('H:i')) :
                                                                    ?>
                                                                    <div class="small-box-footer p-2">
                                                                        <b>JADWAL <?= strtoupper($jadwal->kode) ?> BELUM DIMULAI</b>
                                                                        <br><small>refresh jika waktu sudah sampai pada jamnya</small>
                                                                    </div>
                                                                <?php
                                                                else:
                                                                    ?>
                                                                    <a id="status" href="<?= base_url('siswa/konfirmasi/' . $jadwal->id_jadwal) ?>"
                                                                       class="text-white small-box-footer p-2">
                                                                    <b>KERJAKAN</b><i
                                                                            class="fas fa-arrow-circle-right ml-3"></i>
                                                                    </a>
                                                            <!--
                                                            <script>
                                                                //Jan 5, 2022 15:37:25
                                                                var countDownDate = new Date("<?= date('M d, Y H:i', strtotime($jadwalMulai->format('M d, Y H:i:s')))?>").getTime();
                                                                var x = setInterval(function() {
                                                                    var now = new Date().getTime();
                                                                    var distance = countDownDate - now;

                                                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                                                    document.getElementById("countdown<?=$jadwal->id_jadwal?>").innerHTML = days + "d " + hours + "h "
                                                                        + minutes + "m " + seconds + "s ";

                                                                    if (distance < 0) {
                                                                        clearInterval(x);
                                                                        document.getElementById("countdown<?=$jadwal->id_jadwal?>").innerHTML = "EXPIRED";
                                                                    }
                                                                }, 1000);
                                                            </script>
                                                            -->
                                                                <?php endif; endif; endif; ?>
                                                        <?php elseif ($lanjutkan && !$selesai) : ?>
                                                            <a id="status" class="small-box-footer p-2 text-white" href="<?= base_url('siswa/konfirmasi/' . $jadwal->id_jadwal) ?>">
                                                                <b>LANJUTKAN</b><i
                                                                        class="fas fa-arrow-circle-right ml-3"></i>
                                                            </a>
                                                        <?php else : ?>
                                                            <div id="status" class="small-box-footer p-2">
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

        if (!$('.jadwal-cbt').length) {
            var html = '<div class="col-12 alert alert-default-warning">' +
                '<div class="text-center">Tidak ada jadwal penilaian</div>' +
                '</div>';

            $('#jadwal-content').html(html);
        }
    });
</script>
