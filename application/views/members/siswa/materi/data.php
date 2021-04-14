<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/08/20
 * Time: 22:29
 */

?>
<nav class="main-header navbar navbar-expand-md navbar-dark navbar-green border-bottom-0">
    <ul class="navbar-nav ml-2">
        <li class="nav-item">
            <a class="nav-link btn-outline-success" href="<?= base_url('dashboard') ?>" role="button"><i
                        class="fas fa-arrow-left"></i> Beranda</a>
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
                            <button onclick="logout()" class="btn btn-danger btn-outline-light" style="width: 200px">
                                LOGOUT<i class="fas fa-sign-out-alt ml-2"></i>
                            </button>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="card my-shadow">
						<div class="card-header">
							<h5 class="text-center">
								MATERI HARI INI<br/><?= buat_tanggal(date('D, d M Y')) ?>
							</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<?php
								if (isset($kbm->istirahat)) :
								$ist = json_decode(json_encode($kbm->istirahat));
								$jmlIst = json_decode(json_encode(unserialize($ist)));
								$arrIst = [];
								foreach ($jmlIst as $istirahat) {
									array_push($arrIst, $istirahat->ist);
									$arrDur[$istirahat->ist] = $istirahat->dur;
								};

								$jamMulai = new DateTime($kbm->kbm_jam_mulai);
								$jamSampai = new DateTime($kbm->kbm_jam_mulai);

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
														<?= $jamMulai->format('H:i') ?> s/d <?= $jamSampai->format('H:i') ?>
													</div>
												</div>
												<div class="card-body p-0">
													<div class="text-center" style="min-height: 185px;">
														<br>
														<br>
														<br>
														ISTIRAHAT
													</div>
												</div>
												<?php
												$jamMulai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
											else :
												$jamSampai->add(new DateInterval('PT' . $kbm->kbm_jam_pel . 'M'));
												if (isset($materi[$jamke]->nama_mapel)) :
													$tkelas = '';
													$arrkelas = unserialize($materi[$jamke]->materi_kelas);

													foreach ($arrkelas as $k => $kls) {
														if ($k > 0) {
															$tkelas .= ', ';
														}
														$tkelas .= $kelas[$kls];
													}?>
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
														<div class="small-box bg-gradient-success mb-0">
															<div class="inner">
																<h3><?= $materi[$jamke]->kode_materi ?></h3>
																<span><?= $materi[$jamke]->nama_mapel ?></span>
																<br>
																<span><?= $materi[$jamke]->nama_guru ?></span>
																<br>
																<span>Kelas: <?= $tkelas ?></span>
															</div>
															<div class="icon">
																<i class="fas fa-book-open"></i>
															</div>
															<hr style="margin-top:0; margin-bottom: 0">

															<a href="<?= base_url('siswaview/bukamateri/'.$materi[$jamke]->id_kjm . '/' . $jamke)?>" class="small-box-footer p-2">BUKA MATERI
																<i class="fas fa-arrow-circle-right ml-3"></i><span class="ml-2"></span>
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
															<?= $jamMulai->format('H:i') ?> s/d <?= $jamSampai->format('H:i') ?>
														</div>
													</div>
													<div class="card-body p-0">
														<div class="text-center" style="min-height: 185px;">
															<br>
															<br>
															<br>
															Tidak ada materi
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
			</div>
		</div>
	</section>
</div>
