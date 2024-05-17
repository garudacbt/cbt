<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between mb-2">
                <h1><?= $subjudul ?></h1>
                <a href="<?= base_url('datasiswa') ?>" type="button" class="btn btn-sm btn-danger">
                    <i class="fas fa-arrow-circle-left"></i><span class="d-none d-sm-inline-block ml-1">Kembali</span>
                </a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <br>
            <div class="col-lg-12 p-0">
                <div class="alert alert-default-danger shadow align-content-center" role="alert">
                    <strong>Catatan!</strong> untuk import data dari file excel, silahkan download templatenya terlebih
                    dahulu.
                </div>
            </div>

            <div class="card my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title">Download Data Siswa</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        if (count($kelas) > 0) :
                            foreach ($kelas as $id => $kls) : ?>
                                <div class="col-6 col-md-3 text-center mb-3">
                                    <a href="<?= base_url() . 'datasiswa/downloaddata/' . $id ?>"
                                       class="card-tools btn-success btn btn-block">
                                        <i class="fas fa-download"></i><span
                                                class="ml-2">Download Data Siswa<br/>Kelas <?= $kls ?></span>
                                    </a>
                                </div>
                            <?php endforeach;
                        else: ?>
                            <div class="alert alert-default-warning align-content-center" role="alert">Belum ada data
                                siswa dan kelas
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card my-shadow mb-4">
                        <?= form_open_multipart('', array('id' => 'formPreviewExcel')); ?>
                        <div class="card-header">
                            <h6 class="card-title">Upload File Excel</h6>
                        </div>
                        <div class="card-body excel">
                            <div class="form-group pb-2">
                                <label for="upload_file">Pilih file excel</label>
                                <input type="file" id="input-file-events-excel" name="upload_file" class="dropify"/>
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

<script>
    var typeImport = '<?=$tipe?>';
</script>
<script type="text/javascript"
        src="<?= base_url() ?>/assets/plugins/jquery-table2json/src/tabletojson-cell.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jquery-table2json/src/tabletojson-row.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jquery-table2json/src/tabletojson.js"></script>
<script src="<?= base_url() ?>/assets/app/js/jquery.htmlparser.min.js"></script>
<script src="<?= base_url() ?>/assets/app/js/master/siswa/import.js"></script>
