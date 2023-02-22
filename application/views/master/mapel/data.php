<div class="content-wrapper bg-white pt-4">
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
            <div class="card my-shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <h6>Kelompok Utama</h6>
                                </div>
                                <div class="col-6">
                                    <button type="button" data-toggle="modal" data-target="#editKelompokModal"
                                            class="btn btn-sm btn-primary float-right"><i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="tableKelompok" class="w-100 table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center align-middle">Kategori</th>
                                        <th class="text-center align-middle">Kode</th>
                                        <th class="align-middle">Nama</th>
                                        <th class="text-center align-middle p-0"><span>Aksi</span></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <h6>Sub Kelompok</h6>
                                </div>
                                <div class="col-6">
                                    <button type="button" data-toggle="modal" data-target="#editSubKelompokModal"
                                            class="btn btn-sm btn-primary float-right"><i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="tableSubKelompok" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center align-middle">Kode</th>
                                        <th class="align-middle">Nama</th>
                                        <th class="text-center align-middle">Kel. Utama</th>
                                        <th class="text-center align-middle p-0"><span>Aksi</span></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card my-shadow mb-4">
                <div class="card-header with-border">
                    <h3 class="card-title text-bold"><?= $subjudul ?></h3>
                    <div class="card-tools">
                        <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-default"><i
                                    class="fa fa-sync"></i> Reload
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-light border border-success align-content-center mb-3" role="alert">
                        <b>Nomor Urut Rapor</b> dan <b>Kelompok</b> diperlukan jika ingin mencetak rapor
                    </div>
                    <?= form_open('', array('id' => 'bulk')) ?>
                    <div class="table-responsive">
                        <table id="tableMapel" class="w-100 table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center align-middle p-0 w-auto">
                                    <input type="checkbox" class="select_all">
                                </th>
                                <th class="text-center align-middle p-0 w-auto">No.Urut Rapor</th>
                                <th class="text-center">Mata Pelajaran</th>
                                <th class="text-center">Kode Mata Pelajaran</th>
                                <th class="text-center">Kelompok</th>
                                <th class="text-center">Status</th>
                                <th class="text-center align-middle p-0"><span>Aksi</span></th>
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

<?= form_open('create', array('id' => 'create-kelompok')) ?>
<div class="modal fade" id="editKelompokModal" tabindex="-1" role="dialog" aria-labelledby="editKelompokModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKelompokModalLabel">Kelompok Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_kel_mapel" name="id_kel_mapel" class="form-control" required>
                <input type="hidden" name="id_parent" value="0" class="form-control" required>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Kode*</label>
                    <div class="col-md-9">
                        <input type="text" id="createkodekel" name="kode_kel_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Nama*</label>
                    <div class="col-md-9">
                        <input type="text" id="createnamakel" name="nama_kel_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Kategori*</label>
                    <div class="col-md-9">
                        <select id="kategori" name="kategori" class="form-control" required="">
                            <?php
                            foreach ($kategori as $kat) : ?>
                                <option value="<?= $kat ?>"><?= $kat ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<?= form_open('create', array('id' => 'create-sub-kelompok')) ?>
<div class="modal fade" id="editSubKelompokModal" tabindex="-1" role="dialog"
     aria-labelledby="editSubKelompokModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubKelompokModalLabel">Sub Kelompok Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_kel_sub" name="id_kel_mapel" class="form-control" required>
                <input type="hidden" id="kategori_sub" name="kategori" class="form-control" required>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Kode*</label>
                    <div class="col-md-9">
                        <input type="text" id="createkodesub" name="kode_kel_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Nama*</label>
                    <div class="col-md-9">
                        <input type="text" id="createnamasub" name="nama_kel_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Kel. Utama*</label>
                    <div class="col-md-9">
                        <select id="id_parent_sub" name="id_parent" class="form-control" required>
                            <?php
                            foreach ($kelompok_mapel as $ky => $km) :
                                if ($km->id_parent == 0) :
                                    ?>
                                    <option value="<?= $ky ?>"><?= $km->nama_kel_mapel ?></option>
                                <?php endif; endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<?= form_open('create', array('id' => 'create')) ?>
<div class="modal fade" id="createMapelModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Mapel*</label>
                    <div class="col-md-10">
                        <input type="text" id="createnama" name="nama_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Kode*</label>
                    <div class="col-md-10">
                        <input type="text" id="createkode" name="kode_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Kelompok*</label>
                    <div class="col-md-10">
                        <?php echo form_dropdown(
                            'kelompok',
                            $kelompok,
                            '',
                            'class="form-control" required'
                        ); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Status*</label>
                    <div class="col-md-10">
                        <?php
                        echo form_dropdown(
                            'status',
                            $status,
                            '1',
                            'class="form-control" required'
                        ); ?>
                    </div>
                </div>
                <div class="form-group row" id="formkode">
                    <label class="col-md-2 col-form-label">No. Urut Rapor*</label>
                    <div class="col-md-10">
                        <input type="number" name="urutan_tampil" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<?= form_open('update', array('id' => 'update')) ?>
<div class="modal fade" id="editMapelModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row" id="formnama">
                    <label class="col-md-2 col-form-label">Mapel*</label>
                    <div class="col-md-10">
                        <input type="text" id="namaEdit" name="nama_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row" id="formkode">
                    <label class="col-md-2 col-form-label">Kode*</label>
                    <div class="col-md-10">
                        <input type="text" id="kodeEdit" name="kode_mapel" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row" id="formkelompok">
                    <label class="col-md-2 col-form-label">Kelompok*</label>
                    <div class="col-md-10">
                        <?php
                        echo form_dropdown(
                            'kelompok',
                            $kelompok,
                            '',
                            'id="kelompok" class="form-control" required'
                        ); ?>
                    </div>
                </div>
                <div class="form-group row" id="formstatus">
                    <label class="col-md-2 col-form-label">Status*</label>
                    <div class="col-md-10">
                        <?php
                        echo form_dropdown(
                            'status',
                            $status,
                            '1',
                            'id="status" class="form-control" required'
                        ); ?>
                    </div>
                </div>
                <div class="form-group row" id="formkode">
                    <label class="col-md-2 col-form-label">No. Urut Rapor*</label>
                    <div class="col-md-10">
                        <input type="number" id="kodeUrut" name="urutan_tampil" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="editIdMapel" name="id_mapel" class="form-control">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<div class="modal fade" id="editDataMapelModal" tabindex="-1" role="dialog" aria-labelledby="editDataMapelModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataMapelModalLabel">Setting Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>

<!--
<div class="modal fade" id="mapelNonAktif" tabindex="-1" role="dialog" aria-labelledby="labelmapelNonAktif" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelmapelNonAktif">Edit Mapel Aktif/Nonaktif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="w-100 table">
                    <tr>
                        <th>
                            No
                        </th>
                        <th>
                            Mata Pelajaran
                        </th>
                        <th>
                            Kelompok
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>
                    <?php
$no = 1;
foreach ($mapel_non_aktif as $m) :
    if ($m->status == '0') :?>
                    <tr>
                        <td>
                            <?= $no ?>
                        </td>
                        <td>
                            <?= $m->nama_mapel ?>
                        </td>
                        <td>
                            <?= $m->kelompok ?>
                        </td>
                        <td>
                            <button onclick="aktifkan(this)" class="btn btn-xs btn-danger" data-id="<?= $m->id_mapel ?>">Aktifkan
                            </button>
                        </td>
                    </tr>
                    <?php $no++; endif; endforeach; ?>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
-->

<?= form_open('create', array('id' => 'hapus-kelompok')) ?>
<?= form_close() ?>
<script>
    var jsonkelompokMapel = JSON.parse(JSON.stringify(<?=json_encode($kelompok_mapel)?>));
    var kelompokMapel = Object.keys(jsonkelompokMapel).map(function (key) {
        return jsonkelompokMapel[key];
    });
</script>
<script src="<?= base_url() ?>/assets/app/js/master/mapel/crud.js"></script>
