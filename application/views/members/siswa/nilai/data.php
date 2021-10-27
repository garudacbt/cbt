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
                                NILAI HASIL MATERI
                            </div>
                        </div>
                        <div class="card-body">
                            <div id='list-nilai-materi'>
                                <?php
                                //echo '<pre>';
                                //var_dump($nilai_materi);
                                //echo '</pre>';

                                if (count($nilai_materi) > 0):?>
                                    <table class="table table-sm table-hover w-100" style="line-height: 1">
                                        <tr>
                                            <th class="text-center">NO</th>
                                            <th>Materi</th>
                                            <th>Tanggal</th>
                                            <th class="text-center">Nilai</th>
                                        </tr>

                                        <?php
                                        $no = 1;
                                        foreach ($nilai_materi as $nil) :
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $no ?></td>
                                                <td>
                                                    <?= $nil->kode ?>
                                                    <br>
                                                    <small>
                                                        <?= $nil->kode_materi ?>
                                                    </small>
                                                    <br>
                                                    <small>
                                                        <?= $nil->judul_materi ?>
                                                    </small>
                                                </td>
                                                <td><?= singkat_tanggal(date('D, d M Y', strtotime($nil->jadwal_materi))) ?></td>
                                                <td class="text-center text-lg"><b><?= $nil->nilai ?></b></td>
                                            </tr>
                                        <?php $no++; endforeach; ?>
                                    </table>
                                <?php else: ?>
                                    <p>Belum ada nilai.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card card-red">
                        <div class="card-header">
                            <div class="card-title text-white">
                                NILAI HASIL TUGAS
                            </div>
                        </div>
                        <div class="card-body">
                            <div id='list-nilai-tugas'>
                                <?php if (count($nilai_tugas) > 0):?>
                                <table class="table table-sm table-hover w-100" style="line-height: 1">
                                    <tr>
                                        <th class="text-center">NO</th>
                                        <th>Tugas</th>
                                        <th>Tanggal</th>
                                        <th class="text-center">Nilai</th>
                                    </tr>

                                    <?php
                                    $no = 1;
                                    foreach ($nilai_tugas as $nil) :
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $no ?></td>
                                            <td>
                                                <?= $nil->kode ?>
                                                <br>
                                                <small>
                                                    <?= $nil->kode_materi ?>
                                                </small>
                                                <br>
                                                <small>
                                                    <?= $nil->judul_materi ?>
                                                </small>
                                            </td>
                                            <td><?= singkat_tanggal(date('D, d M Y', strtotime($nil->jadwal_materi))) ?></td>
                                            <td class="text-center text-lg"><b><?= $nil->nilai ?></b></td>
                                        </tr>
                                        <?php $no++; endforeach; ?>
                                </table>
                                <?php else: ?>
                                <p>Belum ada nilai.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-purple">
                        <div class="card-header">
                            <div class="card-title text-white">
                                NILAI HASIL ULANGAN/UJIAN
                            </div>
                        </div>
                        <div class="card-body">
                            <div id='list-cbt'>
                                <?php
                                //echo '<pre>';
                                //var_dump($nilai);
                                //var_dump($jadwal);
                                //echo '</pre>';
                                ?>
                                <table class="table table-sm table-hover w-100 ">
                                    <tr>
                                        <th class="text-center align-middle">NO</th>
                                        <th>Jenis Penilaian</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kode Penilaian</th>
                                        <th class="text-center">Nilai</th>
                                    </tr>
                                    <?php
                                    if (count($jadwal) > 0) :
                                        $no = 1;
                                        foreach ($jadwal as $j) :
                                            $hanya_pg = $j->tampil_pg > 0 && $j->tampil_kompleks == 0 && $j->tampil_jodohkan == 0 && $j->tampil_isian == 0 && $j->tampil_esai == 0;
                                            $total = !$hanya_pg && isset($j->dikoreksi) && $j->dikoreksi == 0 ? '*' : ($j->hasil_tampil == '0' ? '**' : $nilai[$j->id_jadwal]);
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $no ?></td>
                                                <td><?= $j->nama_jenis ?></td>
                                                <td><?= $j->kode ?></td>
                                                <td><?= $j->bank_kode ?></td>
                                                <td class="text-center"><?= $total ?></td>
                                            </tr>
                                            <?php $no++; endforeach; else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">Belum ada jadwal ulangan/ujian</td>
                                        </tr>
                                    <?php endif; ?>
                                </table>
                                <hr>
                                <span><i>Catatan:</i></span>
                                <br>
                                <small>
                                    <b>(-)</b> Belum dikerjakan
                                    <br><b>(*)</b> Menunggu hasil koreksi
                                    <br><b>(**)</b> Hubungi Guru Pengampu jika ingin mengetahui nilai
                                </small>
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
        $.ajax({
            type: 'GET',
            url: base_url + 'dashboard/getjadwalkbm/'+kelas,
            success: function (data) {
                console.log('kbm', data);
                jadwalKbm = data;
                $.each(data.istirahat, function (key, value) {
                    arrIst.push(value.ist);
                });
            }
        });
        */
    });
</script>
