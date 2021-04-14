<div class="content-wrapper bg-white">
	<section class="content-header">
		<div class="container-fluid">
            <div class="row mb-2">
                <div class="col-9">
                    <h1><?= $subjudul ?></h1><span class="float-left text-lg">Mapel <b><?= $bank->nama_mapel ?></b></span>
                </div>
                <div class="col-3">
                    <button onclick="window.history.back();" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </button>
                </div>
            </div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="col-lg-12 p-0">
				<div class="alert alert-danger shadow align-content-center" role="alert">
					<strong>Catatan!</strong> untuk import data dari file excel/word, silahkan download templatenya terlebih dahulu.
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="card my-shadow p-3">
						<div class="form-group">
							<label for="upload_file">File Word</label>
							<a href="<?= base_url('uploads/import/format/format_soal.docx') ?>" class="float-right btn-success btn btn-sm mb-1"
                               download="Soal_<?=$bank->nama_mapel?>">
								<i class="fas fa-download"></i><span class="ml-2">Download</span>
							</a>
                            <?= form_open_multipart('', array('id'=>'formPreviewWord')); ?>
							<input type="file" id="input-file-events-word" name="upload_file" class="dropify"/>

                            <button type="submit" class="btn btn-sm btn-primary card-tools mt-3">
                                <i class="fas fa-cloud-upload-alt mr-2"></i>Upload
                            </button>
                            <?= form_close(); ?>
                        </div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="card my-shadow mb-4">
						<div class="card-header">
							<h6 class="card-title">Preview</h6>
							<input type="hidden" name="bank_id" id="formInput" class="form-control">
						</div>
						<div class="card-body" id="file-preview">
							<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	var bank_id = '<?= $bank->id_bank ?>';
    const jenjang = '<?= $setting->jenjang ?>';
</script>
<script src="<?= base_url() ?>/assets/app/js/cbt/banksoal/import.js"></script>
