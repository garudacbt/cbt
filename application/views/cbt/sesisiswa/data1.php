<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
?>

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
						<a type="button" href="<?= base_url('cbtsesisiswa') ?>" class="btn btn-sm btn-default">
							<i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
						</a>
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-default" data-toggle="tooltip" title="Print"><i
									class="fas fa-print"></i></button>
							<button type="button" class="btn btn-sm btn-default" data-toggle="tooltip"
									title="Export As PDF"><i class="fas fa-file-pdf"></i></button>
							<button type="button" class="btn btn-sm btn-default" data-toggle="tooltip"
									title="Export As Word"><i class="fa fa-file-word"></i></button>
							<button type="button" class="btn btn-sm btn-default" data-toggle="tooltip"
									title="Export As Excel"><i class="fa fa-file-excel"></i></button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div id="selector" class="btn-group mb-4">
								<button type="button" class="btn active btn-success">Atur Sesi By Kelas</button>
								<button type="button" class="btn btn-outline-success">Atur Sesi By Siswa</button>
							</div>
						</div>
						<div id="dropdown-kelas-parent" class="col-md-6 d-none">
							<div class="row mb-2">
								<label class="col-3 col-form-label">Pilih Kelas: </label>
								<div class="col-9">
									<select id="dropdown-kelas" class="form-control">
										<?php foreach ($kelas as $k) : ?>
										<option value="#content-below-<?= $k->id_kelas ?>"><?= $k->nama_kelas ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<!--
					<?php
					echo '<pre>';
					var_dump($siswa);
					echo '</pre>';
					?>
					-->
					<div id="atur-by-kelas">
						<?= form_open('cbtsesisiswa/editsesikelas', array('id' => 'editsesikelas')) ?>
						<div class="table-responsive">
							<table id="sesi" class="w-100 table table-striped table-bordered table-hover">
								<thead class="alert alert-primary">
								<tr>
									<th height="50" width="40" class="align-middle text-center p-0">No.</th>
									<th class="align-middle text-center p-0">Kelas</th>
									<th class="align-middle text-center p-0">Jurusan</th>
									<th class="align-middle text-center p-0">Sesi</th>
									<th class="align-middle text-center p-0">Set Siswa</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$no = 1;
								foreach ($kelas as $k) : ?>
									<tr data-id="<?= $k->id_kelas ?>">
										<td class="align-middle text-center p-0"><?= $no++ ?></td>
										<td class="align-middle"><?= $k->nama_kelas ?></td>
										<td class="align-middle"><?= $k->nama_jurusan ?></td>
										<td data-name="input-sesi">
											<?php echo form_dropdown(
												'sesi_id',
												$sesi,
												$k->sesi_id,
												'class="form-control form-control-sm" id="kelas-' . $k->id_kelas . '" required'
											);
											?>
										</td>
										<td class="text-center">
											<input class="check"
												   type="checkbox" <?php echo($k->set_siswa == "1" ? 'checked' : ''); ?>>
										</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="float-right">
							<button type="submit" id="submit" class="btn btn-sm bg-primary text-white">
								<i class="fas fa-save mr-1"></i> Simpan
							</button>
						</div>
						<?= form_close() ?>
					</div>
					<div id="atur-by-siswa" class="d-none">
						<?php
						$kelasarray = array();
						foreach ($siswa as $item) {
							$kelasarray[$item->nama_kelas][] = $item;
						}
						?>
						<?= form_open('cbtsesisiswa/editsesisiswa', array('id' => 'editsesisiswa')) ?>
						<ul class="nav nav-tabs d-none" id="content-below-tab" role="tablist">
							<?php foreach ($kelas as $titletab) : ?>
								<li class="nav-item">
									<a class="nav-link <?= $kelas[0]->id_kelas === $titletab->id_kelas ? 'active' : '' ?>"
									   href="#content-below-<?= $titletab->id_kelas ?>">
									   <!--
									   id="content-below-<?= $titletab->id_kelas ?>-tab"
									   data-toggle="pill" href="#content-below-<?= $titletab->id_kelas ?>" role="tab"
									   aria-controls="content-below-<?= $titletab->id_kelas ?>"
									   aria-selected="true">
									   -->
									   <?= $titletab->nama_kelas ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<div class="tab-content" id="content-below-tabContent">
							<?php foreach ($kelas as $titletab) : ?>
								<div class="tab-pane fade <?= $kelas[0]->id_kelas === $titletab->id_kelas ? 'active show' : '' ?>" id="content-below-<?= $titletab->id_kelas ?>" role="tabpanel"
									 aria-labelledby="content-below-<?= $titletab->id_kelas ?>-tab">
									<?php $arraySiswaPerKelas = $kelasarray[$titletab->nama_kelas]; ?>
									<div class="table-responsive">
										<table id="sesi" class="w-100 table table-striped table-bordered table-hover">
											<thead class="alert alert-primary">
											<tr>
												<th height="50" width="40" class="align-middle text-center p-0">No.</th>
												<th class="align-middle text-center p-0">Nama Siswa</th>
												<th class="align-middle text-center p-0">Kelas</th>
												<th class="align-middle text-center p-0">Sesi</th>
											</tr>
											</thead>
											<tbody>
											<?php
											$no = 1;
											foreach ($arraySiswaPerKelas as $s) : ?>
												<tr data-id="<?= $s->id_siswa ?>">
													<td class="align-middle text-center p-0"><?= $no++ ?></td>
													<td class="align-middle"><?= $s->nama ?></td>
													<td class="align-middle"><?= $s->nama_kelas ?></td>
													<td class="align-middle text-center" data-name="input-sesi">
														<?php if ($s->set_siswa === "0") :
														echo form_dropdown(
															'sesi_id',
															$sesi,
															($s->sesi === '0' || is_null($s->sesi)) ? $s->sesi_id : $s->sesi,
															'class="form-control form-control-sm" id="siswa-' . $s->id_siswa . '" required '
														);
														else: ?>
														<?= $s->sesi_id; ?>
														<?php endif; ?>
													</td>
												</tr>
											<?php endforeach; ?>
											</tbody>
										</table>
									</div>

								</div>
							<?php endforeach; ?>
						</div>
						<div class="float-right">
							<button type="submit" id="submit" class="btn btn-sm bg-primary text-white">
								<i class="fas fa-save mr-1"></i> Simpan
							</button>
						</div>
						<?= form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script src="<?= base_url() ?>/assets/app/js/cbt/sesisiswa/crud1.js"></script>

