<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 23/08/20
 * Time: 23:18
 */
?>
<nav class="main-header navbar navbar-expand-md navbar-dark navbar-green border-bottom-0">
    <ul class="navbar-nav ml-2">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('siswaview/cbt') ?>" role="button"><i class="fas fa-arrow-left"></i></a>
        </li>
    </ul>

    <div class="mx-auto text-white text-center" style="line-height: 1">
        <span class="text-lg p-0"><?=$setting->nama_aplikasi?></span>
        <br>
        <small>Tahun Pelajaran: <?= $tp_active->tahun ?> Smt:<?= $smt_active->smt ?></small>
    </div>
</nav>
<div class="content-wrapper" style="margin-top: -1px;">
	<div class="sticky">
	</div>
	<section class="content overlap p-4">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="info-box bg-transparent shadow-none">
						<img src="<?= base_url() ?>/assets/app/img/ic_graduate.png" width="90" height="90">
						<div class="info-box-content">
							<h5 class="info-box-text text-white text-wrap"><b><?= $siswa->nama ?></b></h5>
							<span class="info-box-text text-white"><?= $siswa->nis ?></span>
							<span class="info-box-text text-white"><?= $siswa->nama_kelas ?></span>
						</div>
					</div>
				</div>
			</div>

			<div class="container-fluid h-100">
				<div class="row h-100 justify-content-center">
					<div class="col-md-8 col-lg-6">
						<div class="card my-shadow">
							<div class="card-body">
								<h3 class="text-center">KONFIRMASI TES</h3>
								<h5 class="text-center">
									<b><?= $bank->kode_jenis .' | '. $bank->tahun . ' | ' . $bank->smt?></b>
								</h5>
								<br>
								<?php
                                //var_dump($bank);
                                $jk = json_decode(json_encode($bank->bank_kelas));
                                $jumlahKelas = json_decode(json_encode(unserialize($jk)));

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

								?>
								<ul class="list-group list-group-unbordered">
									<li class="list-group-item p-1"> Mata Pelajaran
										<span class="float-right"><b><?= $bank->nama_mapel ?></b></span>
									</li>
									<li class="list-group-item p-1"> Guru
										<span class="float-right"><b><?= $bank->nama_guru ?></b></span>
									</li>
									<li class="list-group-item p-1"> Pengawas
										<span class="float-right"><b><?= implode(', ', $pengawas) ?></b></span>
									</li>
									<li class="list-group-item p-1"> Kelas
										<span class="float-right"><b><?= $kelasbank ?></b></span>
									</li>
                                    <li class="list-group-item p-1"> Durasi Waktu
                                        <span class="float-right"><b><?= $bank->durasi_ujian ?> Menit</b></span>
                                    </li>
                                    <!--
									<li class="list-group-item p-1"> Status
										<span class="float-right">
											<b><?= ($bank->status === '0') ? 'Non Aktif' : 'Aktif' ?></b>
										</span>
									</li>
									-->
									<li class="list-group-item p-1"> Soal PG
										<span class="float-right">
											<b><?= $bank->tampil_pg ?></b>
										</span>
									</li>
									<li class="list-group-item p-1"> Soal Essai
										<span class="float-right">
											<b><?= $bank->tampil_esai ?></b>
										</span>
									</li>
									<?php if ($bank->token === '1') :?>
									<li class="list-group-item p-1"> <span class="text-danger"><b>Token</b></span>
										<div class="float-right">
											<input type='text' id="input-token" class="text-center" name='token' placeholder="Masukkan Token"/>
										</div>
									</li>
									<?php endif; ?>
								</ul>
								<br>
								<span class="float-right" data-toggle="tooltip" title="MULAI">
												<button onclick="loadSoal(<?=$bank->id_jadwal?>)"
												   type="button" class="btn btn-success">KERJAKAN
												</button>
											</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
    var bankSoal = <?= json_encode($bank) ?>;
    console.log(bankSoal);
    function loadSoal(id_jadwal) {
		var tkn = 'ABCDEF';
		if ($('#input-token').length) {
			tkn = $('#input-token').val();

			$.ajax({
				url: base_url + "siswaview/cektoken/" + tkn,
				method: 'GET',
				success: function (data) {
					console.log(data);

					if (data.token === tkn) {
						window.location.href = base_url+'siswaview/loadsoal/'+id_jadwal+'/'+bankSoal.id_bank;
					} else {
						swal.fire({
							"title": "Token salah",
							"text": "Token yang kamu masukkan salah",
							"icon": "error"
						}).then(result => {
							if (data.status) {
								reload();
							}
						});
					}
				},
				error: function (xhr, status, error) {
					swal.fire({
						"title": "Error",
						"text": "Server tidak merespon",
						"icon": "error"
					})
				}
			});
		} else {
			window.location.href = base_url+'siswaview/loadsoal/'+id_jadwal+'/'+bankSoal.id_bank;
		}
	}
</script>
