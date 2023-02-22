<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between mb-2">
                <h1><?= $subjudul ?></h1>
                <a href="<?= base_url('dataguru') ?>" type="button" class="btn btn-sm btn-danger">
                    <i class="fas fa-arrow-circle-left"></i><span class="d-none d-sm-inline-block ml-1">Kembali</span>
                </a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?= form_open('', array('id' => 'formguru')); ?>
            <div class="card my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title">Tambah Manual</h6>
                    <div class="card-tools">
                        <button type="reset" class="btn btn-sm bg-warning text-white">
                            <i class="fa fa-sync mr-1"></i> Reset
                        </button>
                        <button type="submit" id="submit" class="btn btn-sm bg-primary text-white">
                            <i class="fas fa-save mr-1"></i> Simpan
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-6">
                            <div class="row mb-3">
                                <div class="col-md-4 col-sm-offset-4">
                                    <label for="nama_guru">Nama Guru :</label>
                                </div>
                                <div class="col-md-8 col-sm-offset-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input id="nama_guru" type="text" class="form-control" name="nama_guru"
                                               placeholder="Nama Guru" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-offset-4">
                                    <label for="nip">NIP/NUPTK :</label>
                                </div>
                                <div class="col-md-8 col-sm-offset-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="number" id="nip" class="form-control" name="nip" placeholder="NIP"
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-offset-6">
                            <div class="row mb-3">
                                <div class="col-md-4 col-sm-offset-4">
                                    <label for="username">Username :</label>
                                </div>
                                <div class="col-md-8 col-sm-offset-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input id="username" type="text" class="form-control" name="username"
                                               placeholder="Username" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-offset-4">
                                    <label for="password">Password :</label>
                                </div>
                                <div class="col-md-8 col-sm-offset-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input id="password" class="form-control" name="password" placeholder="Password"
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>

            <br>
            <div class="col-lg-12 p-0">
                <div class="alert alert-danger shadow align-content-center" role="alert">
                    <strong>Catatan!</strong> untuk import data dari file excel/word, silahkan download templatenya
                    terlebih dahulu.
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card my-shadow mb-4">
                        <?= form_open_multipart('', array('id' => 'formPreviewExcel')); ?>
                        <div class="card-header">
                            <h6 class="card-title">File Excel</h6>
                            <a href="<?= base_url('uploads/import/format/format_guru.xlsx') ?>"
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

                    <div class="card my-shadow mb-4">
                        <?= form_open_multipart('', array('id' => 'formPreviewWord')); ?>
                        <div class="card-header">
                            <h6 class="card-title">File Word</h6>
                            <a href="<?= base_url('uploads/import/format/format_guru.docx') ?>"
                               class="btn-success btn btn-sm card-tools">
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
                    <div class="card my-shadow mb-4">
                        <?= form_open('', array('id' => 'formUpload')); ?>
                        <div class="card-header">
                            <h6 class="card-title">Preview</h6>
                            <input type="hidden" name="guru" id="formInput" class="form-control">
                            <button name="preview" type="submit" class="btn btn-sm btn-primary card-tools">
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
<script src="<?= base_url() ?>/assets/app/js/master/guru/import.js"></script>
