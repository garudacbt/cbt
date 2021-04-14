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
				<div class="card-header with-border">
					<h3 class="card-title">Master <?= $subjudul ?></h3>
					<div class="card-tools">
						<button type="button" onclick="reload_ajax()" class="btn btn-sm btn-default"><i class="fa fa-sync"></i> Reload</button>
						<button type="button" data-toggle="modal" data-target="#createMapelModal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
						<a href="<?= base_url('datamapel/import') ?>" class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Import</a>
						<!--
						<div class="pull-right">
							<button onclick="bulk_edit()" class="btn btn-sm btn-flat btn-warning" type="button"><i class="fa fa-edit"></i> Edit</button>
							<button onclick="bulk_delete()" class="btn btn-sm btn-flat btn-danger" type="button"><i class="fa fa-trash"></i> Delete</button>
						</div>
						-->
					</div>
				</div>
				<div class="card-body">
					<?= form_open('', array('id' => 'bulk')) ?>
					<table id="tableMapel" class="w-100 table table-striped table-bordered table-hover table-sm">
						<thead>
						<tr>
							<th class="text-center align-middle p-0 w-auto">
								<input type="checkbox" class="select_all">
							</th>
							<th class="text-center align-middle p-0 w-auto">No.</th>
							<th>Mata Pelajaran</th>
							<th>Kode Mata Pelajaran</th>
                            <th>Kelompok</th>
                            <th>Status</th>
							<th class="text-center align-middle p-0"><span>Aksi</span></th>
						</tr>
						</thead>
					</table>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</section>
</div>

<?=form_open('create', array('id'=>'create'))?>
<div class="modal fade" id="createMapelModal" tabindex="-1" role="dialog" aria-labelledby="vcreateModalLabel" aria-hidden="true">
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
<?=form_close()?>

<?=form_open('update', array('id'=>'update'))?>
<div class="modal fade" id="editMapelModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
<?=form_close()?>

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
                <table class="w-100 table table-sm">
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
                            <?=$no?>
                        </td>
                        <td>
                            <?=$m->nama_mapel?>
                        </td>
                        <td>
                            <?=$m->kelompok?>
                        </td>
                        <td>
                            <button onclick="aktifkan(this)" class="btn btn-xs btn-danger" data-id="<?=$m->id_mapel?>">Aktifkan
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
<script>
    var kelompokMapel = JSON.parse('<?=json_encode($kelompok)?>');
</script>
<script src="<?= base_url() ?>/assets/app/js/master/mapel/crud.js"></script>
