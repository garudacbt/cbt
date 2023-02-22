<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('datajurusan') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span class="d-none d-sm-inline-block ml-1">Batal</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-12 p-0">
                <div class="alert alert-default-danger shadow align-content-center" role="alert">
                    <strong>Catatan!</strong> untuk import data dari file excel, silahkan download templatenya terlebih
                    dahulu.
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <?= form_open_multipart('', array('id' => 'formPreviewExcel')); ?>
                        <div class="card-header">
                            <h6 class="card-title">File Excel</h6>
                            <a href="<?= base_url('uploads/import/format/format_jurusan.xlsx') ?>"
                               class="card-tools btn-success btn btn-sm">
                                <i class="fas fa-download"></i><span class="ml-2">Download Template</span>
                            </a>
                        </div>
                        <div class="card-body excel">
                            <div class="form-group pb-2">
                                <label for="upload_file">Pilih file excel</label>
                                <input type="file" id="input-file-events-excel" name="upload_file" class="dropify"/>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>

                    <div class="card shadow mb-4">
                        <?= form_open_multipart('', array('id' => 'formPreviewWord')); ?>
                        <div class="card-header">
                            <h6 class="card-title">File Word</h6>
                            <a href="<?= base_url('uploads/import/format/format_jurusan.docx') ?>"
                               class="card-tools btn-success btn btn-sm">
                                <i class="fas fa-download"></i><span class="ml-2">Download Template</span>
                            </a>
                        </div>
                        <div class="card-body word">
                            <div class="form-group pb-2">
                                <label for="upload_file">Pilih file word</label>
                                <input type="file" id="input-file-events-word" name="upload_file" class="dropify"/>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>

                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <?= form_open('', array('id' => 'formUpload')); ?>
                        <div class="card-header">
                            <h6 class="card-title">Preview</h6>
                            <input type="hidden" name="jurusan" id="formInput" class="form-control">
                            <button name="preview" type="submit" class="card-tools btn btn-sm btn-primary">
                                <i class="fas fa-cloud-upload-alt mr-2"></i>Upload
                            </button>
                        </div>
                        <?= form_close(); ?>
                        <div class="card-body" id="file-preview">
                            <span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url() ?>/assets/app/js/jquery.htmlparser.min.js"></script>
<script src="<?= base_url() ?>/assets/app/js/master/jurusan/import.js"></script>
