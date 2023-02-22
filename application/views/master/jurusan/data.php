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
                <div class="card-header py-3">
                    <div class="card-title">
                        <h6><?= $subjudul ?></h6>
                    </div>
                    <div class="card-tools">
                        <button type="button" onclick="window.location.reload()" class="btn btn-sm btn-default"><i
                                    class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </button>
                        <button type="button" data-toggle="modal" data-target="#createJurusanModal"
                                class="btn btn-sm btn-primary"><i
                                    class="fas fa-plus"></i><span
                                    class="d-none d-sm-inline-block ml-1">Tambah Data</span>
                        </button>
                        <a href="<?= base_url('datajurusan/import') ?>" class="btn btn-sm btn-flat btn-success"><i
                                    class="fas fa-upload"></i><span class="d-none d-sm-inline-block ml-1">Import</span></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-light border border-success align-content-center mb-3" role="alert">
                        Abaikan halaman ini jika sekolah tidak ada jurusan (jenjang SMP/MTs atau SD/MI)
                    </div>
                    <?= form_open('', array('id' => 'bulk')) ?>
                    <div class="table-responsive">
                        <table id="jurusan" class="w-100 table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center align-middle p-0" style="width: 40px">
                                    <input type="checkbox" id="select_all">
                                </th>
                                <th style="width: 40px" class="text-center align-middle p-0">No.</th>
                                <th>Kode</th>
                                <th>Jurusan</th>
                                <th>Mapel Peminatan</th>
                                <th class="text-center align-middle p-0" style="width: 100px"><span>Aksi</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($jurusans as $row) :
                                $badges = '';
                                foreach (explode(',', $row->mapel_peminatan) as $mid) {
                                    if ($mid != '')
                                        $badges .= '<div class="badge badge-btn badge-success mr-1">' . $jurusan_mapels[$row->id_jurusan][$mid] . '</div>';
                                }
                                ?>
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <input id="check<?= $row->id_jurusan ?>" name="checked[]" class="check"
                                                   value="<?= $row->id_jurusan ?>" type="checkbox">
                                        </div>
                                    </td>
                                    <td class="text-center"><?= $no ?></td>
                                    <td><?= $row->kode_jurusan ?></td>
                                    <td><?= $row->nama_jurusan ?></td>
                                    <td><?= $badges ?></td>
                                    <td>
                                        <div class="text-center">
                                            <a class="btn btn-xs btn-warning editRecord" data-toggle="modal"
                                               data-target="#editJurusanModal" data-deletable="<?= $row->deletable ?>"
                                               data-mapel="<?= $row->mapel_peminatan ?>"
                                               data-id='<?= $row->id_jurusan ?>'
                                               data-nama='<?= $row->nama_jurusan ?>'
                                               data-kode='<?= $row->kode_jurusan ?>'>
                                                <i class="fa fa-pencil-alt text-white"></i>
                                            </a>
                                            <!--
                                            <button onclick="deleteItem(${data.id_jurusan})" class="btn btn-xs btn-danger deleteRecord" data-id="${data.id_jurusan}" ${disabled}>
                                        <i class="fa fa-trash text-white"></i>
                                    </button>
                                            -->
                                        </div>
                                    </td>
                                </tr>
                                <?php $no++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('create', array('id' => 'create')) ?>
<div class="modal fade" id="createJurusanModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Jurusan*</label>
                    <div class="col-md-9">
                        <input type="text" id="createnama" name="nama_jurusan" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Kode*</label>
                    <div class="col-md-9">
                        <input type="text" id="createkode" name="kode_jurusan" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Mapel Peminatan*</label>
                    <div class="col-md-9">
                        <select name="mapel[]" id="create_mapel_peminatan" class="form-control mapel_peminatan select2"
                                multiple="">
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

<?= form_open('update', array('id' => 'update')) ?>
<div class="modal fade" id="editJurusanModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row" id="formnama">
                    <label class="col-md-3 col-form-label">Jurusan*</label>
                    <div class="col-md-9">
                        <input type="text" id="namaEdit" name="nama_jurusan" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row" id="formkode">
                    <label class="col-md-3 col-form-label">Kode*</label>
                    <div class="col-md-9">
                        <input type="text" id="kodeEdit" name="kode_jurusan" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row" id="formstatus">
                    <label class="col-md-3 col-form-label">Mapel Peminatan*</label>
                    <div class="col-md-9">
                        <select name="mapel[]" id="mapel_peminatan" class="form-control mapel_peminatan select2"
                                multiple="">
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="editIdJurusan" name="id_jurusan" class="form-control">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<!--
<div class="template-demo d-flex justify-content-between flex-wrap">
    <button type="button" class="btn btn-success btn-fw" onclick="showSuccessToast()">Success</button>
    <button type="button" class="btn btn-info btn-fw" onclick="showInfoToast()">Info</button>
    <button type="button" class="btn btn-warning btn-fw" onclick="showWarningToast()">Warning</button>
    <button type="button" class="btn btn-danger btn-fw" onclick="showDangerToast()">Danger</button>
</div>
-->
<script>
    var mapels = JSON.parse('<?= json_encode($mapel_peminatan) ?>');
</script>
<script src="<?= base_url() ?>/assets/app/js/master/jurusan/crud.js"></script>
