<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 14/06/2020
 * Time: 01.31
 */
?>

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
			<div class="card card-default my-shadow mb-4">
				<div class="card-header">
					<h6 class="card-title">Master <?=$subjudul?></h6>
					<div class="card-tools">
						<button type="button" onclick="reload_ajax()" class="btn btn-sm btn-default">
							<i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
						</button>
						<a href="<?= base_url('dataguru/import') ?>" class="btn btn-sm bg-gradient-primary"><i
								class="fas fa-upload"></i><span class="d-none d-sm-inline-block ml-1">Tambah Guru / Import</span></a>
					</div>
				</div>
				<div class="card-body">
					<?=form_open('',array('id'=>'bulk'))?>
					<div class="table-responsive">
						<table id="guru" class="table w-100">
							<thead class="alert alert-primary">
							<tr>
								<th height="50" width="40" class="text-center p-0 align-middle">
									<input type="checkbox" id="select_all">
								</th>
								<th width="50" class="align-middle p-0">No.</th>
								<th class="align-middle p-0">Profil Guru</th>
                                <th class="align-middle p-0">TP</th>
                                <th class="align-middle p-0">SMT</th>
								<th class="text-center align-middle">Mapel</th>
								<th class="text-center p-0 align-middle"><span>Aksi</span></th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Kode</th>
							</tr>
							</thead>
						</table>
					</div>
					<?=form_close()?>
				</div>
			</div>
		</div>
	</section>

<script src="<?= base_url() ?>/assets/app/js/master/guru/datacard.js"></script>
