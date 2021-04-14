<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */

$jenjang = $setting->jenjang;
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
            <div class="alert alert-default-info align-content-center" role="alert">
                <div class="row">
                    <div class="col-md-6">
                        <h5><i class="fa fa-info-circle"></i> Atur Ruangan</h5>
                        <ul>
                            <li>
                                <b>Gabung ke Ruang:</b> menggabungkan kelas ke ruang yang dipilh
                            </li>
                            <li>
                                <b>Gabung ke Sesi:</b> menggabungkan kelas ke sesi yang dipilh
                            </li>
                            <li>
                                <b>Gabungkan Siswa:</b> jika dicentang, maka seluruh siswa akan digabungkan ke Ruang dan Sesi yang dipilih.
                                Jika tidak dicentang, maka siswa harus dipilihkan Ruang dan Sesi dibagian <b>Atur Sesi Siswa</b>
                            </li>
                            <li>
                                <b>Simpan</b> terlebih dulu sebelum berpindah ke bagian <b>Atur Sesi Siswa</b>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h5><i class="fa fa-info-circle"></i> Atur Sesi Siswa</h5>
                        <ul>
                            <li>
                                Pilih Ruang dan Sesi untuk tiap siswa
                            </li>
                            <li>
                                Jangan lupa <b>Simpan</b> pada setiap kelas yang diatur
                            </li>
                            <li>
                                <b>Simpan</b> di bagian <b>Atur Ruangan</b> akan mereset semua ruangan dan sesi siswa, Anda harus mengatur ulang di bagian <b>Atur Sesi Siswa</b>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
			<div class="card card-default my-shadow mb-4">
				<div class="card-header">
					<h6 class="card-title"><?= $subjudul ?></h6>
					<div class="card-tools">
						<a type="button" href="<?= base_url('cbtsesisiswa') ?>" class="btn btn-sm btn-default">
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
					<div class="row">
						<div class="col-md-6">
							<div id="selector" class="btn-group mb-4">
                                <button type="button" class="btn active btn-success"><b>Atur Ruangan</b></button>
                                <button type="button" class="btn btn-outline-success"><b>Atur Sesi Siswa</b></button>
							</div>
						</div>
						<div id="dropdown-kelas-parent" class="col-md-6 d-none">
							<div class="row mb-2">
								<label class="col-3 col-form-label">Pilih Kelas: </label>
								<div class="col-9">
									<?php
									echo form_dropdown(
										'kelas',
										$kelas,
										null,
										'id="dropdown-kelas" class="form-control"'
									); ?>
								</div>
							</div>
						</div>
					</div>
					<?php
					//echo '<pre>';
					//var_dump($ruang);
					//echo '</pre>';
					?>
					<div id="atur-by-kelas">
						<?= form_open('cbtsesisiswa/editsesikelas', array('id' => 'editsesikelas')) ?>
						<div class="table-responsive">
							<table id="sesi" class="w-100 table table-striped table-bordered table-hover table-sm">
								<thead class="alert alert-primary">
								<tr>
									<th height="50" width="40" class="align-middle text-center p-0">No.</th>
									<th class="align-middle text-center p-0">Kelas</th>
									<?php if ($jenjang==3) :?>
									<th class="align-middle text-center p-0">Jurusan</th>
									<?php endif; ?>
									<th class="align-middle text-center p-0">Gabung ke Ruang</th>
									<th class="align-middle text-center p-0">Gabung ke Sesi</th>
									<th class="align-middle text-center p-0">Gabungkan Siswa</th>
									<!--
									<th class="align-middle text-center p-0">Aksi</th>
									-->
								</tr>
								</thead>
								<tbody>
								<?php
								$no = 1;
								foreach ($ruang_kelas as $k) : ?>
									<tr data-id="<?= $k->id_kelas ?>">
										<td class="align-middle text-center p-0"><?= $no++ ?></td>
										<td class="align-middle text-center"><?= $k->nama_kelas ?></td>
										<?php if ($jenjang==3) :?>
											<td class="align-middle"><?= $k->nama_jurusan ?></td>
										<?php endif; ?>
										<td data-name="input-ruang">
											<?php echo form_dropdown(
												null,
												$ruang,
												$k->id_ruang,
												'class="form-control form-control-sm input-ruang" id="kelas-ruang-' . $k->id_kelas . '" required'
											);
											?>
										</td>
										<td data-name="input-sesi">
											<?php echo form_dropdown(
												null,
												$sesi,
												$k->id_sesi,
												'class="form-control form-control-sm input-sesi" id="kelas-sesi-' . $k->id_kelas . '" required'
											);
											?>
										</td>
										<td class="text-center">
											<input class="check"
												   type="checkbox" <?php echo($k->set_siswa == "1" ? 'checked' : ''); ?>>
										</td>
										<!--
										<td class="text-center">
											<a href="#" class="btn btn-sm bg-purple text-white <?= $k->set_siswa == 1 ? 'disabled' : '' ?>">Edit Ruang / Sesi Siswa</a>
										</td>
										-->
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="float-right">
							<button type="submit" class="btn btn-sm bg-primary text-white">
								<i class="fas fa-save mr-1"></i> Simpan
							</button>
						</div>
						<?= form_close() ?>
					</div>
					<div id="atur-by-siswa" class="d-none">
						<?php
						//$kelasarray = array();
						//foreach ($siswa as $item) {
						//	$kelasarray[$item->nama_kelas][] = $item;
						//}
						?>
						<?= form_open('cbtsesisiswa/editsesisiswa', array('id' => 'editsesisiswa')) ?>
						<ul class="nav nav-tabs d-none" id="content-below-tab" role="tablist">
							<?php foreach ($ruang_kelas as $titletab) : ?>
								<li class="nav-item">
									<a class="nav-link <?= $ruang_kelas[0]->id_kelas === $titletab->id_kelas ? 'active' : '' ?>"
									   href="#content-below-<?= $titletab->id_kelas ?>">
									   <!--
									   id="content-below-<?= $titletab->id_kelas ?>-tab"
									   data-toggle="pill" href="#content-below-<?= $titletab->id_kelas ?>" role="tab"
									   aria-controls="content-below-<?= $titletab->id_kelas ?>"
									   aria-selected="true">
									   -->
									   <?= $titletab->nama_kelas ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<div class="tab-content" id="content-below-tabContent">
							<!--
							<?php foreach ($kelas as $titletab) : ?>
								<div class="tab-pane fade <?= $kelas[0]->id_kelas === $titletab->id_kelas ? 'active show' : '' ?>" id="content-below-<?= $titletab->id_kelas ?>" role="tabpanel"
									 aria-labelledby="content-below-<?= $titletab->id_kelas ?>-tab">
									<?php $arraySiswaPerKelas = $kelasarray[$titletab->nama_kelas]; ?>
									<div class="table-responsive" id="list-siswa">
										<table id="sesi-<?= $titletab->id_kelas ?>" class="w-100 table table-striped table-bordered table-hover table-sm">
											<thead class="alert alert-primary">
											<tr>
												<th height="50" width="40" class="align-middle text-center p-0">No.</th>
												<th class="align-middle text-center p-0">Nama Siswa</th>
												<th class="align-middle text-center p-0">Kelas</th>
												<th class="align-middle text-center p-0">Ruang</th>
												<th class="align-middle text-center p-0">Sesi</th>
											</tr>
											</thead>
											<tbody>
											<?php
											$no = 1;
											foreach ($arraySiswaPerKelas as $s) : ?>
												<tr data-id="<?= $s->id_siswa ?>">
													<td class="align-middle text-center p-0"><?=$no?></td>
													<td class="align-middle">
														<span class="set-ruang invisible"><?= $s->set_siswa; ?></span>
														<?= $s->nama ?>
													</td>
													<td class="align-middle text-center"><?= $s->nama_kelas ?></td>
													<td class="align-middle text-center" data-name="input-ruang">
														<?php if ($s->set_siswa === "0") :
														echo form_dropdown(
															null,
															$ruang,
															($s->ruang_id === '0' || is_null($s->ruang_id)) ? $s->ruang_kelas : $s->ruang_id,
															'data-name="select-ruang" class="form-control form-control-sm" id="ruang-' . $s->id_siswa . '" required '
														);
														else: ?>
														<?= $s->kode_ruang; ?>
															<span class="ruang-id invisible"><?= $s->ruang_id === '0' || is_null($s->ruang_id) ? $s->ruang_kelas : $s->ruang_id?></span>
														<?php endif; ?>
													</td>
													<td class="align-middle text-center" data-name="input-sesi">
														<?php
														if (is_null($s->sesi_id)) {
															$sesiSelected = $no <= count($arraySiswaPerKelas) / (count($sesi)) ? "1" : "2";
														} else {
															$sesiSelected = $s->sesi_id;
														}
														echo form_dropdown(
															null,
															$sesi,
															$sesiSelected,
															'data-name="select-sesi" class="form-control form-control-sm" id="sesi-' . $s->id_siswa . '" required '
														);
														?>
													</td>
												</tr>
											<?php $no++; endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							<?php endforeach; ?>
							-->
						</div>
						<div class="float-right">
							<button type="submit" class="btn btn-sm bg-primary text-white">
								<i class="fas fa-save mr-1"></i> Simpan
							</button>
						</div>
						<?= form_close() ?>
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
	let tp_id = '<?= $tp_active->id_tp ?>';
	let smt_id = '<?= $smt_active->id_smt ?>';
	var arrRuang = {};
	var jenjang = '<?= $jenjang ?>';

	$(document).ready(function () {
		ajaxcsrf();

		console.log(jenjang);

		$('#selector button').click(function() {
			$(this).addClass('active').siblings().addClass('btn-outline-success').removeClass('active btn-success');

			if(!$('#atur-by-kelas').is(':hidden')) {
				$('#atur-by-kelas').addClass('d-none');
				$('#atur-by-siswa').removeClass('d-none');
				$('#dropdown-kelas-parent').removeClass('d-none');
			} else {
				$('#atur-by-kelas').removeClass('d-none');
				$('#atur-by-siswa').addClass('d-none');
				$('#dropdown-kelas-parent').addClass('d-none');
			}
		});

		/*
		$( '#sesi' ).on( 'click', 'input[type="checkbox"]', function() {
			var checked = $( this ).prop("checked") === true;
			console.log(checked);
			var btn = $( this ).closest( 'tr' ).find('.btn');
			if (checked) {
				btn.addClass('disabled');
			} else {
				btn.removeClass('disabled');
			}
		});
		*/

		$("#editsesikelas").on("submit", function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();

			const $rows = $('#sesi').find('tr'), headers = $rows.splice(0, 1); // header rows
			var jsonKelas = [];
			$rows.each((i, row) => {
				var kelasid = $(row).attr("data-id");

				const $colSelectRuang = $(row).find('.input-ruang');
				const $colSelectSesi = $(row).find('.input-sesi');
				const $colCheck = $(row).find('input');

				let item = {};
				item ["ruang_id"] = $colSelectRuang.val();
				item ["sesi_id"] = $colSelectSesi.val();
				item ["kelas_id"] = kelasid;
				item ["set_siswa"] = $colCheck.prop("checked") === true ? "1" : "0";
				jsonKelas.push(item);
			});

			var dataKelas = $(this).serialize() + "&kelas_sesi=" + JSON.stringify(jsonKelas);
			console.log(dataKelas);

			$.ajax({
				url: base_url + "cbtsesisiswa/editsesikelas",
				type: "POST",
				dataType: "JSON",
				data: dataKelas,
				success: function (data) {
					console.log("response:", data);
					if (data.status) {
						//showSuccessToast('Data berhasil disimpan')
						window.location.href = base_url + 'cbtsesisiswa';
					} else {
						showDangerToast('gagal disimpan')
					}
				}, error: function (xhr, status, error) {
					console.log("response:", xhr.responseText);
					showDangerToast('gagal disimpan')
				}
			});
		});

		var opsiKelas = $('#dropdown-kelas');
		opsiKelas.prepend("<option value='' selected='selected'>Pilih Kelas</option>");
		var kelas_id = opsiKelas.val();

		opsiKelas.on('change', function (e) {
			var id = $(this).val();
			console.log(id);
			kelas_id = id;

			$.ajax({
				type: "GET",
				url: base_url + "cbtsesisiswa/getsiswaruang?kelas=" + kelas_id,
				success: function (response) {
					console.log(response);
					getSesi(response);
				}
			});
			//$('a[href="' + id + '"]').tab('show');
			//loadSiswaKelas($(this).val())
		});

		$("#editsesisiswa").on("submit", function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			//var value = $('tr[data-name="input-sesi"] select.form-control').val();
			const $rows = $('#sesi-siswa').find('tr'), headers = $rows.splice(0, 1); // header rows
			var jsonObj = [];
			$rows.each((i, row) => {
				var siswaid = $(row).attr("data-id");
				const $ruangSelect = $(row).find('select[data-name="select-ruang"]');
				const $sesiSelect = $(row).find('select[data-name="select-sesi"]');
				const setSiswa = $(row).find('.set-ruang').text();

				let item = {};
				item ["siswa_id"] = siswaid;
                item ["kelas_id"] = kelas_id;
				item ["ruang_id"] = setSiswa === '0' ? $ruangSelect.val() : $(row).find('.ruang-id').text();
				item ["sesi_id"]  = setSiswa === '0' ? $sesiSelect.val() : $(row).find('.sesi-id').text();
				item ["tp_id"]    = tp_id;
				item ["smt_id"]   = smt_id;
				jsonObj.push(item);
			});

			var dataPost = $(this).serialize() + "&siswa_sesi=" + JSON.stringify(jsonObj);
			console.log(dataPost);

			$.ajax({
				url: base_url + "cbtsesisiswa/editsesisiswa",
				type: "POST",
				dataType: "JSON",
				data: dataPost,
				success: function (data) {
					console.log("response:", data);
					if (data.status) {
						showSuccessToast('Data berhasil disimpan')
					} else {
						showDangerToast('gagal disimpan')
					}
				}, error: function (xhr, status, error) {
					console.log("response:", xhr.responseText);
					showDangerToast('gagal disimpan')
				}
			});
		});

		$.ajax({
			url: base_url + "cbtsesisiswa/getallruang",
			type: "GET",
			success: function (data) {
				arrRuang = data;
			}, error: function (xhr, status, error) {
				console.log("response:", xhr.responseText);
			}
		});
	});

	function getSesi(dataRuang) {
		$.ajax({
			url: base_url + "cbtsesisiswa/getallsesi",
			type: "GET",
			success: function (data) {
				createTable(dataRuang, data)
			}, error: function (xhr, status, error) {
				console.log("response:", xhr.responseText);
			}
		});
	}

	function createTable(dataRuang, arrSesi) {
		var html = '<div class="table-responsive" id="list-siswa">' +
			'<table id="sesi-siswa" class="w-100 table table-striped table-bordered table-hover table-sm">' +
			'<thead class="alert alert-primary">' +
			'<tr>' +
			'<th height="50" width="40" class="align-middle text-center p-0">No.</th>' +
			'<th class="align-middle text-center p-0">Nama Siswa</th>' +
			'<th class="align-middle text-center p-0">Kelas</th>' +
			'<th class="align-middle text-center p-0">Ruang</th>' +
			'<th class="align-middle text-center p-0">Sesi</th>' +
			'</tr>' +
			'</thead>' +
			'<tbody>';
		for (let i = 0; i < dataRuang.length; i++) {
			var siswa = dataRuang[i];
			var setSiswa = siswa.set_siswa === '0';
			html += '<tr data-id="'+siswa.id_siswa+'">' +
				'<td class="align-middle text-center p-0">'+(i+1)+'</td>' +
				'<td class="align-middle">' +
				'<span class="set-ruang invisible">'+siswa.set_siswa+'</span>' + siswa.nama +
				'</td>' +
				'<td class="align-middle text-center">'+siswa.nama_kelas+'</td>' +
				'<td class="align-middle text-center" data-name="input-ruang">';

			var ruangId = siswa.id_ruang_siswa == null || siswa.id_ruang_siswa === '0' ? siswa.id_ruang_kelas : siswa.id_ruang_siswa ;
			if (setSiswa) {
				html += '<select id="ruang'+siswa.id_siswa+'" class="form-control form-control-sm" data-name="select-ruang">' +
					'<option value="">Pilih Ruang</option>';
				$.each(arrRuang, function(key, value) {
					if (key == ruangId) {
						html += '<option value="'+key+'" selected="selected">'+value+'</option>';
					} else {
						html += '<option value="'+key+'">'+value+'</option>';
					}
				});
				html += '</select>';
			} else {
				html += '<span class="ruang-id invisible">'+siswa.id_ruang_kelas+'</span>' + siswa.kode_ruang_kelas;
			}

			html += '</td><td class="align-middle text-center" data-name="input-sesi">';
			var sesiId = siswa.id_sesi_siswa == null || siswa.id_sesi_siswa === '0' ? siswa.id_sesi_kelas : siswa.id_sesi_siswa;
			if (setSiswa) {
				html += '<select id="sesi'+siswa.id_siswa+'" class="form-control form-control-sm" data-name="select-sesi">' +
					'<option value="">Pilih Sesi</option>';

				$.each(arrSesi, function(k, v) {
					if (k == sesiId) {
						html += '<option value="'+k+'" selected="selected">'+v+'</option>';
					} else {
						html += '<option value="'+k+'">'+v+'</option>';
					}
				});
				html += '</select>';
			} else {
				html += '<span class="sesi-id invisible">'+siswa.id_sesi_kelas+'</span>' + siswa.kode_sesi_kelas;
			}
			html += '</td></tr>';
		}
		html += '</tbody>' +
			'</table>' +
			'</div>';
		$('#content-below-tabContent').html(html);
	}

</script>

