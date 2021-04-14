<div class="content-wrapper bg-white pt-4">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-6">
					<h1><?= $judul ?></h1>
				</div>
				<div class="col-6">
					<a href="<?= base_url('dataguru') ?>" type="button" class="btn btn-sm btn-danger float-right">
						<i class="fas fa-arrow-circle-left"></i><span
							class="d-none d-sm-inline-block ml-1">Kembali</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card my-shadow mb-4">
						<?= form_open('dataguru/saveJabatan', array('id' => 'editjabatan'), array('id_guru' => $guru->id_guru)) ?>
						<div class="card-header">
							<h6 class="card-title">Edit Jabatan <?= $guru->nama_guru ?></h6>
							<div class="card-tools">
								<a type="button" href="<?= base_url('dataguru') ?>" class="btn btn-sm btn-default">
									<i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
								</a>
								<button type="submit" id="btn-jabatan" class="btn btn-primary btn-sm">
									<i class="fas fa-save mr-1"></i> Simpan
								</button>
							</div>

						</div>
						<div class="card-body">
							<div class="row">
								<?php
								//var_dump($guru);
								$jmapel = json_decode(json_encode($guru->mapel_kelas));
								$jmapelval = json_decode(json_encode(unserialize($jmapel)));
								$jks = [];
								if ($jmapelval != null) {
									foreach ($jmapelval as $key => $val) {
										array_push($jks, $val->id_mapel);
									}
								}

                                $jekstra = json_decode(json_encode($guru->ekstra_kelas));
                                $jekstraval = json_decode(json_encode(unserialize($jekstra)));
                                $jke = [];
                                if ($jekstraval != null) {
                                    foreach ($jekstraval as $key => $val) {
                                        array_push($jke, $val->id_ekstra);
                                    }
                                }
								?>
								<div class="col-md-6">
									<label class="col-form-label">Mengajar</label>
									<div class="input-group input-group-sm mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text">Mata Pelajaran</span>
										</div>
										<?php
										echo form_dropdown(
											'mapel[]',
											$mapels,
											$jks,
											'id="mapel" class="select2 form-control form-control-sm" multiple="multiple" data-placeholder="Pilih Mapel"'
										); ?>
									</div>
                                    <div id="input-ekstra">
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">ekstrakurikuler</span>
                                            </div>
                                            <?php
                                            echo form_dropdown(
                                                'ekstra[]',
                                                $ekskul,
                                                $jke,
                                                'id="ekstra" class="select2 form-control form-control-sm" multiple="multiple" data-placeholder="Pilih Ekstrakurikuler"'
                                            ); ?>
                                        </div>
                                    </div>
									<div id="input-mapel">
										<label id="keterangan">Tentukan Kelas</label>
									</div>
								</div>
								<div id="input-jabatan" class="col-md-6">
									<label class="col-form-label">Jabatan Tambahan</label>
									<div class="input-group input-group-sm mb-3">
										<div class="input-group-prepend w-40">
											<span class="input-group-text">Jabatan</span>
										</div>
										<?php
										echo form_dropdown(
											'level',
											$levels,
											$guru->id_level,
											'id="level" class="form-control form-control-sm" required'
										); ?>
									</div>
								</div>
							</div>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php
$ekstra_guru = $guru->ekstra_kelas == null ? [] : unserialize($guru->ekstra_kelas);
?>
<script type="text/javascript">
	var guru_id = '<?=$guru->id_guru?>';
	var kelas_id = '<?=$guru->id_kelas?>';
	var level_id = '<?=$guru->id_level?>';
	var mapel_guru = '<?= json_encode(unserialize($guru->mapel_kelas)) ?>';
    var ekstra_guru = '<?= json_encode($ekstra_guru) ?>';
</script>

<script src="<?= base_url() ?>/assets/app/js/master/guru/editmapel.js"></script>
