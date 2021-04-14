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
						<a href="<?= base_url('cbtjadwal') ?>" type="button" onclick=""
						   class="btn btn-sm btn-default">
							<i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
						</a>
						<a href="<?= base_url('cbtjadwal/add/0') ?>" type="button"
						   class="btn btn-primary btn-sm ml-1">
							<i class="fas fa-plus-circle"></i> Tambah Jadwal
						</a>
					</div>
				</div>
				<div class="card-body">
					<div class="row" id="konten">
						<?php if (count($jadwals) === 0) : ?>
							<?php if (!isset($tp_active) || !isset($smt_active)) : ?>
								<div class="col-12">
									<div class="alert alert-default-warning shadow align-content-center" role="alert">
										Tahun Pelajaran atau Semester belum di set
									</div>
								</div>
							<?php else: ?>
								<div class="col-12">
									<div class="alert alert-default-warning align-content-center" role="alert">
										Belum ada jadwal penilaian untuk Tahun Pelajaran <b><?= $tp_active->tahun ?></b> Semester: <b><?= $smt_active->smt ?></b>
									</div>
								</div>
							<?php endif; ?>
						<?php else:
							//echo '<pre>';
							//var_dump($kelas);
							//echo '</pre>';
							foreach ($jadwals as $jadwal) : ?>
								<?php
								$jk = json_decode(json_encode($jadwal->bank_kelas));
								$jumlahKelas = json_decode(json_encode(unserialize($jk)));
								//$jks = [];

								$kelasbank = '';
								$no = 1;
								foreach ($jumlahKelas as $j) {
									foreach ($kelas as $k) {
										if ($j->kelas_id === $k->id_kelas) {
											if ($no > 1) {
												$kelasbank .= ', ';
											}
											$kelasbank .= $k->nama_kelas;
											$no++;
										}
									}
								}
								$bgRandom = array('bg-gradient-blue', 'bg-gradient-fuchsia', 'bg-gradient-success',
									'bg-gradient-maroon', 'bg-gradient-purple');
								?>
								<div class="col-md-4 col-sm-6 col-12">
									<!-- small card -->
									<?php
									$r = array_rand($bgRandom)
									?>
									<div class="small-box <?= $bgRandom[$r] ?>">
										<div class="inner">
											<h3><?= $jadwal->bank_kode ?></h3>
											<span><?= $jadwal->kode ?></span>
											<br>
											<span>Kelas: <b><?= $kelasbank ?></b></span>
										</div>
										<div class="icon">
											<i class="fas fa-shopping-cart"></i>
										</div>
										<div class="mr-2 ml-2">
											<span>Jenis</span>
											<span class="float-right"><b><?= $jadwal->kode_jenis ?></b></span>
										</div>
										<hr style="margin-top:0; margin-bottom: 0">
										<div class="mr-2 ml-2">
											<span>Mulai</span>
											<span
												class="float-right"><b><?= singkat_tanggal(date('D, d M Y', strtotime($jadwal->tgl_mulai))) ?></b></span>
										</div>
										<hr style="margin-top:0; margin-bottom: 0">
										<div class="mr-2 ml-2">
											<span>Sampai</span>
											<span
												class="float-right"><b><?= singkat_tanggal(date('D, d M Y', strtotime($jadwal->tgl_selesai))) ?></b></span>
										</div>
										<hr style="margin-top:0; margin-bottom: 0">
										<div class="mr-2 ml-2">
											<span>Status</span>
											<span class="float-right">
								<b><?= ($jadwal->status === '0') ? 'Non Aktif' : 'Aktif' ?></b>
							</span>
										</div>
										<a href="<?= base_url('cbtjadwal/add/' . $jadwal->id_jadwal) ?>"
										   class="small-box-footer p-2">
											<i class="fas fa-pencil-alt"></i><span class="ml-2"> Edit Jadwal</span>
										</a>
										<!--
							<a href="#" class="small-box-footer p-2" data-toggle='modal' data-target='#tambahjadwal'
								<?= !$jadwal->id_jadwal ? '' : 'data-id="' . $jadwal->id_jadwal . '" data-kode="' . $jadwal->kode_jadwal . '" data-jenis="' . $jadwal->id_jenis . '"
							    data-bank="' . $jadwal->id_bank . '" data-durasi="' . $jadwal->durasi_ujian . '" data-mulai="' . $jadwal->tgl_mulai . '"
							    data-selesai="' . $jadwal->tgl_selesai . '" data-ruang="' . $jruangSele . '" data-sesi="' . $jsesi . '"' ?>>
								<i class="fas fa-pencil-alt"></i><span class="ml-2"> Edit Jadwal</span>
							</a>
							-->
									</div>
								</div>
							<?php endforeach; endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
