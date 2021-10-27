<div class="content-wrapper bg-white pt-4">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-6">
					<h1><?= $judul ?></h1>
				</div>
				<div class="col-6">
					<a type="button" href="<?= base_url('cbtcetak') ?>" class="btn btn-sm float-right btn-default"
					   data-toggle="tooltip"
					   title="Reload">
						<i class="fa fa-sync ml-1 mr-1"></i><span class="d-none d-sm-inline-block ml-1"> Reload</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
            <!--
            <?= form_open('', array('id' => 'set-kop')) ?>
            <div class="card my-shadow">
                <div class="card-header">
                    <h6 class="card-title">Proktor</h6>
                    <button type="submit" class="card-tools btn btn-sm bg-primary text-white">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 d-none">
                            <div class="form-group">
                                <label>Header 1</label>
                                <textarea id="header-1" class="form-control" name="header_1" rows="2"
                                          placeholder="Header baris 1"><?= $kop->header_1 ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 d-none">
                            <div class="form-group">
                                <label>Header 2</label>
                                <textarea id="header-2" class="form-control" name="header_2" rows="2"
                                          placeholder="Header baris 2"><?= $kop->header_2 ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 d-none">
                            <div class="form-group">
                                <label>Header 3</label>
                                <textarea id="header-3" class="form-control" name="header_3" rows="2"
                                          placeholder="Header baris 3"><?= $kop->header_3 ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4 d-none">
                            <div class="form-group">
                                <label>Header 4</label>
                                <textarea id="header-4" class="form-control" name="header_4" rows="2"
                                          placeholder="Header baris 4"><?= $kop->header_4 ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Proktor</label>
                                <input id="input-proktor" class="form-control" name="proktor" placeholder="Proktor"
                                       value="<?= $kop->proktor ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4 d-none">
                            <div class="form-group">
                                <label>Pengawas 1</label>
                                <input id="input-pengawas-1" class="form-control" name="pengawas_1"
                                       placeholder="Pengawas 1" value="<?= $kop->pengawas_1 ?>">
                            </div>
                        </div>
						<div class="col-md-4 d-none">
							<div class="form-group">
								<label>Pengawas 2</label>
								<input id="input-pengawas-2" class="form-control" name="pengawas_2"
									   placeholder="Pengawas 2" value="<?= $kop->pengawas_2 ?>">
							</div>
						</div>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
            -->
			<div class="card my-shadow">
				<div class="card-header">
					<div class="card-title">
						<h6>Cetak</h6>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<a href="<?=base_url('cbtcetak/kartupeserta')?>">
								<div class="info-box border">
								<span class="info-box-icon bg-gradient-primary elevation-1">
									<i class="fa fa-vcard-o"></i>
								</span>
									<div class="info-box-content">
										<h5 class="info-box-content">Kartu Peserta</h5>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-md-6">
							<a href="<?=base_url('cbtcetak/absenpeserta')?>">
								<div class="info-box border">
								<span class="info-box-icon bg-gradient-primary elevation-1">
									<i class="fa fa-list-ol"></i>
								</span>
									<div class="info-box-content">
										<h5 class="info-box-content">Daftar Hadir</h5>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-md-6">
							<a href="<?=base_url('cbtcetak/beritaacara')?>">
								<div class="info-box border">
								<span class="info-box-icon bg-gradient-primary elevation-1">
									<i class="fa fa-pencil-square-o"></i>
								</span>
									<div class="info-box-content">
										<h5 class="info-box-content">Berita Acara</h5>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-md-6">
							<a href="<?=base_url('cbtcetak/pesertaujian')?>">
								<div class="info-box border">
								<span class="info-box-icon bg-gradient-primary elevation-1">
									<i class="fa fa-list-ul"></i>
								</span>
									<div class="info-box-content">
										<h5 class="info-box-content">Peserta Ujian</h5>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
    $('#set-kop').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        console.log($(this).serialize());

        $.ajax({
            url: base_url + 'cbtcetak/savekop',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                console.log(response);
                //history.back();
                window.location.href = base_url + 'cbtcetak'
            },
            error: function (xhr, error, status) {
                console.log(xhr.responseText);
            }
        });
    });
</script>