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
                            <div id="list-nilai-materi" class="table-responsive">
                                <?php
                                if (count($nilai_materi) > 0):?>
                                    <table class="table table-hover w-100" id="table-nilai-materi" style="line-height: 1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">NO</th>
                                            <th>Materi</th>
                                            <th>Tanggal</th>
                                            <th class="text-center">Nilai</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($nilai_materi as $nil) :
                                            ?>
                                            <tr onclick="showDialog(this)" data-text="<?= $nil->catatan ?>">
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
                                        </tbody>
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
                                <?php if (count($nilai_tugas) > 0): ?>
                                    <table class="table table-hover w-100" id="table-nilai-tugas" style="line-height: 1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">NO</th>
                                            <th>Tugas</th>
                                            <th>Tanggal</th>
                                            <th class="text-center">Nilai</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($nilai_tugas as $nil) :
                                            ?>
                                            <tr onclick="showDialog(this)" data-text="<?= $nil->catatan ?>">
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
                                        </tbody>
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
                                //var_dump($kelass);
                                //var_dump($jadwal);
                                //echo '</pre>';
                                ?>
                                <table class="table w-100" id="table-nilai-ujian">
                                    <thead>
                                    <tr>
                                        <th class="text-center align-middle">NO</th>
                                        <th>Jenis Penilaian</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kode Penilaian</th>
                                        <th class="text-center">Nilai</th>
                                        <th class="text-center">Detail</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (count($jadwal) > 0) :
                                        $no = 1;
                                        foreach ($jadwal as $j) :
                                            $hanya_pg = $j->tampil_pg > 0 && $j->tampil_kompleks == 0 && $j->tampil_jodohkan == 0 && $j->tampil_isian == 0 && $j->tampil_esai == 0;
                                            $total = !$hanya_pg && isset($skor[$j->id_jadwal]->dikoreksi) && $skor[$j->id_jadwal]->dikoreksi == 0 ? '*' : ($j->hasil_tampil == '0' ? '**' : $skor[$j->id_jadwal]->skor_total);
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $no ?></td>
                                                <td><?= $j->nama_jenis ?>
                                                    <br><small><?= buat_tanggal(date('D, d M Y', strtotime($j->tgl_mulai))) ?></small>
                                                </td>
                                                <td><?= $j->kode ?></td>
                                                <td><?= $j->bank_kode ?></td>
                                                <td class="text-center"><?= $total ?></td>
                                                <td class="text-center">
                                                    <button type="button"
                                                            data-koreksi="<?= isset($skor[$j->id_jadwal]->dikoreksi) ? $skor[$j->id_jadwal]->dikoreksi : '0' ?>"
                                                            data-tampil="<?= $j->hasil_tampil ?>"
                                                            data-id="<?= $j->id_jadwal ?>"
                                                            data-toggle="modal"
                                                            data-target="#detail-nilai"
                                                            class="btn btn-sm btn-primary">
                                                        Detail
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $no++; endforeach; else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <div class="alert align-content-center alert-default-warning"
                                                     role="alert">
                                                    Belum ada jadwal ulangan/ujian
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
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

<div class="modal fade" id="detail-nilai" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Detail Hasil Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="w-100">
                    <tr>
                        <td>Tgl. Pelaksanaan</td>
                        <td id="jwaktu">:</td>
                    </tr>
                    <tr>
                        <td>Mulai</td>
                        <td id="jmulai">:</td>
                    </tr>
                    <tr>
                        <td>Selesai</td>
                        <td id="jselesai">:</td>
                    </tr>
                    <tr>
                        <td>Waktu pengerjaan</td>
                        <td id="jdurasi">:</td>
                    </tr>
                </table>
                <hr>
                <div id="alert" class="alert alert-default-warning align-content-center" role="alert">
                    Hubungi guru pengampu jika ingin mengetahui nilai.
                </div>
                <table id="table-detail-soal" class="w-100 table-striped">
                    <tr>
                        <th class="border-bottom"></th>
                        <th class="text-center border-bottom">JML. SOAL</th>
                        <th class="text-center border-bottom">BENAR</th>
                        <th class="text-center border-bottom">SKOR</th>
                    </tr>
                    <tr id="tpg">
                        <td>Soal Pilihan Ganda</td>
                        <td class="text-center" id="jpg"></td>
                        <td class="text-center" id="bpg"></td>
                        <td class="text-center" id="spg"></td>
                    </tr>
                    <tr id="tpg2">
                        <td>Soal PG Kompleks</td>
                        <td class="text-center" id="jpg2"></td>
                        <td class="text-center" id="bpg2"></td>
                        <td class="text-center" id="spg2"></td>
                    </tr>
                    <tr id="tjod">
                        <td>Soal Menjodohkan</td>
                        <td class="text-center" id="jjod"></td>
                        <td class="text-center" id="bjod"></td>
                        <td class="text-center" id="sjod"></td>
                    </tr>
                    <tr id="tis">
                        <td>Soal Isian</td>
                        <td class="text-center" id="jis"></td>
                        <td class="text-center" id="bis"></td>
                        <td class="text-center" id="sis"></td>
                    </tr>
                    <tr id="tes">
                        <td>Soal Uraian</td>
                        <td class="text-center" id="jes"></td>
                        <td class="text-center" id="bes"></td>
                        <td class="text-center" id="ses"></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center border-top"><b>TOTAL SKOR</b></td>
                        <td class="text-center border-top" id="jskor"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    var arrbulan = ['', 'Januari', 'Februari', 'Maret', 'April',
        'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var arrhari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
    var skores = JSON.parse('<?= json_encode($skor)?>');
    var durasies = JSON.parse('<?= json_encode($durasi)?>');
    var jadwals = JSON.parse('<?= json_encode($jadwal)?>');

    $(document).ready(function () {
        $('#table-nilai-materi').DataTable();
        $('#table-nilai-tugas').DataTable();
        $('#table-nilai-ujian').DataTable();

        $('#detail-nilai').on('show.bs.modal', function (e) {
            var tampilNilai = $(e.relatedTarget).data('tampil');
            var id = $(e.relatedTarget).data('id');
            var dikoreksi = $(e.relatedTarget).data('koreksi') == '1';

            var jadwal = jadwals[id];
            var dur = durasies[id].length > 0 ? durasies[id][0] : null;
            var skor = skores[id];

            $('#alert').toggleClass('d-none', tampilNilai == '1');

            var sp = jadwal.tgl_mulai.split('-');
            var d = new Date(sp[0], sp[1] - 1, sp[2]);
            $('#jwaktu').html(': ' + arrhari[d.getDay()] + ', ' + sp[2] + ' ' + arrbulan[parseInt(sp[1])] + ' ' + sp[0]);

            if (dur != null && dur.mulai != null && dur.selesai != null) {
                var m = dur.mulai.split(' ')[1].split(':');
                $('#jmulai').html(': ' + m[0] + ':' + m[1]);
                var s = dur.selesai.split(' ')[1].split(':');
                $('#jselesai').html(': ' + s[0] + ':' + s[1]);
                if (dur.lama_ujian != null) {
                    var l = dur.lama_ujian.split(':');
                    var dr = '';
                    if (l[0] !== '00') {
                        dr += parseInt(l[0]) + ' jam ';
                    }
                    dr += parseInt(l[1]) + ' menit';
                    $('#jdurasi').html(': ' + dr);
                } else {
                    var old_date_obj = new Date(dur.mulai).getTime();
                    var new_date_obj = new Date(dur.selesai).getTime();
                    let dr = (new_date_obj - old_date_obj)/1000;
                    dr /= 60;
                    $('#jdurasi').html(': ' + Math.round(dr) + ' menit');
                }
            }

            if (tampilNilai == '1') {
                $('#table-detail-soal').removeClass('d-none');
                $('#tpg').toggleClass('d-none', parseInt(jadwal.tampil_pg) == 0);
                $('#jpg').text(jadwal.tampil_pg);
                $('#bpg').text(skor.benar_pg);
                $('#spg').text(skor.skor_pg);

                $('#tpg2').toggleClass('d-none', parseInt(jadwal.tampil_kompleks) == 0);
                $('#jpg2').text(jadwal.tampil_kompleks);
                $('#bpg2').text(skor.benar_kompleks);
                $('#spg2').text(skor.skor_kompleks);

                $('#tjod').toggleClass('d-none', parseInt(jadwal.tampil_jodohkan) == 0);
                $('#jjod').text(jadwal.tampil_jodohkan);
                $('#bjod').text(skor.benar_jodohkan);
                $('#sjod').text(skor.skor_jodohkan);

                $('#tis').toggleClass('d-none', parseInt(jadwal.tampil_isian) == 0);
                $('#jis').text(jadwal.tampil_isian);
                $('#bis').text(skor.benar_isian);
                $('#sis').html(dikoreksi ? skor.skor_isian : 'sedang<br>dikoreksi');

                $('#tes').toggleClass('d-none', parseInt(jadwal.tampil_esai) == 0);
                $('#jes').text(jadwal.tampil_esai);
                //$('#bes').text(skor.benar_esai);
                $('#bes').text('-');
                $('#ses').html(dikoreksi ? skor.skor_essai : 'sedang<br>dikoreksi');
                $('#jskor').html(`<b>${skor.skor_total}</b>`);
            } else {
                $('#table-detail-soal').addClass('d-none');
            }
        });
    });

    function showDialog(tr) {
        swal.fire({
            title: "Catatan Guru",
            html: '<div class="w-100 border p-4">' + $(tr).data('text') + '</div>',
            confirmButtonText: "TUTUP"
        })
    }
</script>
