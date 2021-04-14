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
						<a type="button" href="<?= base_url('kelasstatus') ?>" class="btn btn-sm btn-default">
							<i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
						</a>
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-default" data-toggle="tooltip" title="Print"><i
									class="fas fa-print"></i></button>
							<button type="button" class="btn btn-sm btn-default" data-toggle="tooltip"
									title="Export As PDF"><i class="fas fa-file-pdf"></i></button>
							<button type="button" class="btn btn-sm btn-default" data-toggle="tooltip"
									title="Export As Word"><i class="fa fa-file-word"></i></button>
							<button type="button" class="btn btn-sm btn-default" data-toggle="tooltip"
									title="Export As Excel"><i class="fa fa-file-excel"></i></button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<?php
					//echo '<pre>';
					//var_dump($tp);
					//echo '</pre>';
					?>
					<div class="row">
						<div class="col-md-3 mb-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Mapel</span>
								</div>
								<?php
								echo form_dropdown(
									'mapel',
									$mapel,
									null,
									'id="opsi-mapel" class="form-control"'
								); ?>
							</div>
						</div>
						<div class="col-md-3 mb-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Kelas</span>
								</div>
								<?php
								echo form_dropdown(
									'kelas',
									$kelas,
									null,
									'id="opsi-kelas" class="form-control"'
								); ?>
							</div>
						</div>
						<div class="col-md-3 mb-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Tahun</span>
								</div>
								<select name="tahun" id="opsi-tahun" class="form-control">
									<option value="" selected="selected" disabled="disabled">Pilih Tahun Pelajaran</option>
									<?php foreach ($tp as $tahun) :?>
									<option value="<?= $tahun->id_tp ?>"><?=$tahun->tahun?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-3 mb-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Semester</span>
								</div>
								<select name="smt" id="opsi-semester" class="form-control">
									<option value="" selected="selected" disabled="disabled">Pilih Semester</option>
									<?php foreach ($smt as $sm) :?>
										<option value="<?= $sm->id_smt ?>"><?=$sm->smt?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table id="log-nilai" class="w-100 table table-striped table-bordered table-hover table-sm">
						</table>
					</div>
				</div>
				<div class="overlay d-none" id="loading">
					<div class="spinner-grow"></div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	const namaBulan = ["","Januar1", "Februar1", "Maret", "April", "Mei", "Juni",
		"Juli", "Agustus", "September", "Oktober", "November", "Desember"];
	function createTable(data) {
		var konten = '<thead>' +
			'<tr>' +
			'<th rowspan="2" width="50" height="50" class="text-center p-0 align-middle">No.</th>' +
			'<th rowspan="2" class="text-center p-0 align-middle">NIS</th>' +
			'<th rowspan="2" class="align-middle">Nama</th>' +
			'<th colspan="'+(data.materi.length*6)+'" class="text-center p-0 align-middle">Bulan</th>' +
			'</tr><tr>';
		$.each(data.bulan, function (k, v) {
			konten += '<th colspan="'+data.materi.length+'" class="text-center p-0 align-middle">'+namaBulan[v]+'</th>';
		});
		konten += '</tr></thead><tbody>';

		var no = 1;
		$.each(data.log, function (key, value) {
			konten += '<tr>' +
				'<td class="text-center p-0 align-middle">'+no+'</td>' +
				'<td class="text-center p-0 align-middle">'+value.nis+'</td>' +
				'<td class="align-middle">'+value.nama+'</td>';
			$.each(data.bulan, function (k, v) {
				$.each(value.nilai_materi, function (kk, vv) {
					konten += '<td class="text-center p-0 align-middle">-</td>';
					if (v === kk) {
						if (vv!=null){
							$.each(vv, function (kkk, vvv) {
								var td = '<td class="text-center p-0 align-middle">-</td>';
								if (vvv!=null){
									td = '<td class="text-center p-0 align-middle">'+vvv.nilai+'</td>';
								}
								konten+=td;
							});
						}
					} else {
						konten += '<td class="text-center p-0 align-middle">-</td>';
					}
				});
			});
			konten += '</tr>';
			no +=1;
		});
		konten += '</tbody>';
		$('#log-nilai').html(konten);
		$('#loading').addClass('d-none');
	}

	$(document).ready(function () {
		var selKelas = $('#opsi-kelas');
		var selMapel = $('#opsi-mapel');
		var selTahun = $('#opsi-tahun');
		var selSmt = $('#opsi-semester');

		selMapel.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Mapel</option>");
		selKelas.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Kelas</option>");

		function reload(mapel, kls, thn, smt) {
			var thnSel = $("#opsi-tahun option:selected").text();
			var thnSplit = thnSel.split('/');
			var sthn = smt === '1' ? thnSplit[0] : thnSplit[1];
			var empty = mapel===''|| kls==='' || thn===''|| smt==='' || mapel==null|| kls==null || thn==null|| smt==null;
			var newData = 'kelas='+kls+'&mapel='+mapel+'&tahun='+thn+'&smt='+smt+'&stahun='+sthn;
			console.log(newData);
			if (!empty) {
				$('#loading').removeClass('d-none');

				setTimeout(function() {
					$.ajax({
						url: base_url + 'kelasnilai/loadnilaimapel?' + newData,
						type:"GET",
						success: function(data) {
							console.log(data);
                            if (data.length === 0) {
                                $('#log-nilai').html('');
                                $('#loading').addClass('d-none');
                            } else {
                                createTable(data)
                            }
						},
						error: function(xhr, status, error) {
							console.log(xhr.responseText);
						}
					});
				}, 500);
			}
		}

		selMapel.on('change', function () {
			reload($(this).val(), selKelas.val(), selTahun.val(), selSmt.val());
		});

		selKelas.change(function(){
			reload(selMapel.val(), $(this).val(), selTahun.val(), selSmt.val());
		});

		selTahun.change(function(){
			reload(selMapel.val(), selKelas.val(), $(this).val(), selSmt.val());
		});

		selSmt.on('change', function () {
			reload(selMapel.val(), selKelas.val(), selTahun.val(), $(this).val());
		});
	});
</script>
