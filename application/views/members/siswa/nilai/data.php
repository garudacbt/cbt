<nav class="main-header navbar navbar-expand-md navbar-dark navbar-green border-bottom-0">
    <ul class="navbar-nav ml-2">
        <li class="nav-item">
            <a class="nav-link btn-outline-success" href="<?= base_url('dashboard') ?>" role="button"><i class="fas fa-arrow-left"></i> Beranda</a>
        </li>
    </ul>

    <div class="mx-auto text-white text-center" style="line-height: 1">
        <span class="text-lg p-0"><?=$setting->nama_aplikasi?></span>
        <br>
        <small>Tahun Pelajaran: <?= $tp_active->tahun ?> Smt:<?= $smt_active->smt ?></small>
    </div>
</nav>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: -1px;">
	<!-- Main content -->
	<div class="sticky">
	</div>
	<section class="content overlap p-4">
		<div class="container">
			<div class="info-box bg-transparent shadow-none">
				<img src="<?= base_url() ?>/assets/app/img/ic_graduate.png" width="120" height="120">
				<div class="info-box-content">
					<h5 class="info-box-text text-white text-wrap"><b><?= $siswa->nama ?></b></h5>
					<span class="info-box-text text-white"><?= $siswa->nis ?></span>
					<span class="info-box-text text-white mb-1"><?= $siswa->nama_kelas ?></span>
					<button onclick="logout()" class="btn btn-danger btn-outline-light" style="width: 200px">
						LOGOUT<i class="fas fa-sign-out-alt ml-2"></i>
					</button>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="card card-primary">
						<div class="card-header">
							<div class="card-title text-white">
								NILAI HASIL MATERI
							</div>
						</div>
						<div class="card-body">
							<div id='list-pengumuman'>
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
							<div id='list-jadwal'>
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
								<table class="table table-hover w-100 ">
									<tr>
										<th class="text-center">NO</th>
										<th>Kode Penilaian</th>
										<th>Mata Pelajaran</th>
										<th class="text-center">Nilai PG</th>
                                        <th class="text-center">Nilai Essai</th>
									</tr>
                                    <?php
                                    if (count($jadwal)>0) :
                                    $no = 1;
                                    foreach ($jadwal as $j) :
                                        $nilai_pg = $nilai[$j->id_jadwal] == null ? '-' : ($j->hasil_tampil == '0' ? '**' : $nilai[$j->id_jadwal]->pg_nilai);
                                        $nilai_es = $nilai[$j->id_jadwal] == null ? '-' : ($j->hasil_tampil == '0' ? '**' : ($nilai[$j->id_jadwal]->essai_nilai == null ? '*' : $nilai[$j->id_jadwal]->essai_nilai));
                                    ?>
									<tr>
										<td class="text-center"><?=$no?></td>
										<td><?= $j->bank_kode . ' (' . $j->kode_jenis . ')' ?></td>
										<td><?= $j->kode?></td>
										<td class="text-center"><?= $nilai_pg ?></td>
                                        <td class="text-center"><?= $nilai_es ?></td>
									</tr>
                                    <?php $no++; endforeach; else:?>
                                        <tr>
                                            <td colspan="5" class="text-center">Belum ada jadwal ulangan/ujian</td>
                                        </tr>
                                    <?php endif; ?>
								</table>
                                <hr>
                                <span><i>Catatan:</i></span>
                                <br>
                                <small>
                                    <b>(-)</b>  Belum dikerjakan
                                    <br><b>(*)</b>  Menunggu hasil penilaian
                                    <br><b>(**)</b>  Hubungi Guru Pengampu jika ingin mengetahui nilai
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
