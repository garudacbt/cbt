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
                        <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </button>
                        <button type="button" data-toggle="modal" data-target="#createSesiModal"
                                class="btn btn-sm btn-primary"><i
                                    class="fas fa-plus"></i><span class="d-none d-sm-inline-block ml-1">Tambah Sesi Ujian</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <?= form_open('cbtsesi/delete', array('id' => 'bulk')); ?>
                    <div class="table-responsive">
                        <table id="sesi" class="w-100 table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="40" class="align-middle text-center p-0">
                                    <input class="select_all" type="checkbox">
                                </th>
                                <th width="40" class="align-middle text-center p-0">No.</th>
                                <th>Sesi</th>
                                <th>Kode</th>
                                <th>Waktu</th>
                                <th class="align-middle text-center p-0">Aksi</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('create', array('id' => 'create')) ?>
<div class="modal fade" id="createSesiModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Sesi Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nama_sesi" class="col-md-4 col-form-label">Sesi Ujian*</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nama_sesi" placeholder="Nama Sesi" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kode_sesi" class="col-md-4 col-form-label">Kode Sesi*</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="kode_sesi" placeholder="Kode Sesi Ujian" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Jam Mulai*</label>
                    <div class="col-md-8">
                        <input type="text" id="jamAwal" name="waktu_mulai" class="form-control" autocomplete="off"
                               required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Jam Berakhir*</label>
                    <div class="col-md-8">
                        <input type="text" id="jamAkhir" name="waktu_akhir" class="form-control" autocomplete="off"
                               required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="reset" class="btn bg-warning text-white">
                    <i class="fa fa-sync mr-1"></i> Reset
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<?= form_open('update', array('id' => 'update')) ?>
<div class="modal fade" id="editSesiModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Sesi Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Sesi Ujian*</label>
                    <div class="col-md-8">
                        <input type="text" id="namaEdit" name="nama_sesi" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Kode Sesi*</label>
                    <div class="col-md-8">
                        <input type="text" id="kodeEdit" name="kode_sesi" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Jam Mulai*</label>
                    <div class="col-md-8">
                        <input type="text" id="jamAwalEdit" name="waktu_mulai" class="form-control" autocomplete="off"
                               required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label">Jam Berakhir*</label>
                    <div class="col-md-8">
                        <input type="text" id="jamAkhirEdit" name="waktu_akhir" class="form-control" autocomplete="off"
                               required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="editIdSesi" class="form-control">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<script src="<?= base_url() ?>/assets/app/js/cbt/sesi/crud.js"></script>


