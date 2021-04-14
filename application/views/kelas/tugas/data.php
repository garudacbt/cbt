<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/08/20
 * Time: 22:29
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
			<?php
			//echo '<pre>';
			//var_dump($jadwal_tugas);
			//echo '<br>';
			//var_dump($kelas_tugas);
			//var_dump($tugas);
			//echo '</pre>';
			?>
			<div class="card card-default my-shadow mb-4">
				<div class="card-header">
					<h6 class="card-title"><?= $subjudul ?></h6>
					<div class="card-tools">
						<a href="<?= base_url('kelastugas?id=' . $id_guru) ?>" type="button" onclick="" class="btn btn-sm btn-default">
							<i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
						</a>
						<a href="<?= base_url('kelastugas/add') ?>" type="button" class="btn btn-primary btn-sm ml-1">
							<i class="fas fa-plus-circle"></i> Buat tugas
						</a>
						<!--<button type="submit" class="btn btn-success btn-sm ml-1"><i class="fa fa-save mr-1"></i>Simpan</button>-->
					</div>
				</div>
				<div class="card-body">
                    <?php
                    $dnone = $this->ion_auth->is_admin() ? '' : 'd-none';
                    ?>
					<div class="col-6 mb-4 <?=$dnone?>">
						<?php echo form_dropdown(
							'guru',
							$gurus,
							$id_guru,
							'id="guru" class="select2 form-control" required'
						); ?>
					</div>
                    <div class="row">
                        <div class="col-12">
                            <button type="button" id="delete-all" data-count="<?=count($tugas)?>" class="btn btn-sm btn-danger float-right mb-3"><i class="fa fa-trash"></i> Hapus Semua Materi</button>
                        </div>
                    </div>
					<div class="row">
						<?php
                        $arrIds = [];
                        if (count($tugas) > 0) :
							foreach ($tugas as $key => $value) :
								$arr = unserialize($value->tugas_kelas);
                                array_push($arrIds, $value->id_tugas);
								?>
								<div class="col-md-6 col-lg-4">
									<div class="card border mb-4">
										<div class="card-header border-bottom-0 bg-gradient-red">
											<h3 class="card-title mt-1"><b><?= $value->judul_tugas ?></b></h3>
											<div class="card-tools">
											<span data-toggle="tooltip" title="Edit Tugas">
												<a type="button" class="btn btn-sm btn-warning"
												   href="<?= base_url('kelastugas/add/' . $value->id_tugas) ?>">
													<i class="fa fa-pencil-alt mr-1"></i> Edit
												</a>
											</span>
											</div>
										</div>
										<div class="card-body pt-0">
											<ul class="list-group list-group-unbordered">
												<li class="list-group-item">
													<b><?= $value->kode ?></b>
													<span class="float-right">
													<b><?= $value->nama_guru ?></b>
												</span>
												</li>
												<li class="list-group-item">
													<table class="w-100 table-sm">
														<tr>
															<th class="w-25">Kelas</th>
															<th>Jadwal</th>
															<th>Aksi</th>
														</tr>
														<?php
														foreach ($arr as $k => $v) : ?>
															<tr>
																<td>
																	<?= isset($kelas_tugas[$value->id_tugas][$v]) ? $kelas_tugas[$value->id_tugas][$v] : '-' ?>
																</td>
																<td>
																	<?= isset($jadwal_tugas[$value->id_tugas][$v]) ? $jadwal_tugas[$value->id_tugas][$v] : 'Belum diatur' ?>
																</td>
																<td>
																	<a class="btn btn-xs btn-warning"
																	   data-toggle="modal"
																	   data-target="#editJadwalModal"
																	   data-idtugas="<?= $value->id_tugas ?>"
																	   data-judul="<?= $value->judul_tugas ?>"
																	   data-tgl="<?= isset($jadwal_tugas[$value->id_tugas][$v]) ? $jadwal_tugas[$value->id_tugas][$v] : '' ?>"
																	   data-kelas="<?= $v ?>"
																	   data-namakelas="<?= isset($kelas_tugas[$value->id_tugas][$v]) ? $kelas_tugas[$value->id_tugas][$v] : '' ?>"
																	   data-mapel="<?= $value->id_mapel ?>"
																	   data-namamapel="<?= $value->nama_mapel ?>">
																		Edit Jadwal
																	</a>
																</td>
															</tr>
														<?php endforeach; ?>
													</table>
												</li>
												<li class="list-group-item"> Dibuat
													<span class="float-right">
													<small>
														<?= date('d/m/Y H:i', strtotime($value->created_on)) ?>
													</small>
												</span>
													<br>
													Diupdate
													<span class="float-right">
													<small>
													<?= date('d/m/Y H:i', strtotime($value->updated_on)) ?>
													</small>
												</span>
												</li>
												<li class="list-group-item">
													<table class="w-100">
														<tr>
															<td>Status</td>
															<td>
																<b><?= ($value->status === '1') ? 'Aktif' : 'Non Aktif' ?></b>
															</td>
															<td class="text-right">
																<button
																	class="btn btn-xs <?= ($value->status === '1') ? 'bg-warning' : 'bg-success' ?>"
																	onclick="aktifkanTugas(<?= $value->id_tugas ?>, <?= $value->status ?>)">
																	<?= ($value->status === '1') ? 'Nonaktifkan' : 'Aktifkan' ?>
																</button>
															</td>
														</tr>
													</table>
												</li>
												<li class="list-group-item">File
													<br>
													<?php
													//$dataFileAttach = unserialize($value->file);
													$dataFileAttach = [];
													$att = @unserialize($value->file);
													if ($att !== false) {
														$dataFileAttach = unserialize($value->file);
													} else {
														if ($value->file != null) {
															$file = $value->file;
															if (strpos($file, 'http') == false) {
																$file = base_url('uploads/tugas/').$value->file;
															}
															$src_file = [
																'src' => $file,
																'size' => '',
																'type' => mime_content_type(str_replace(base_url(), '', $file)),
																'name' => $value->file
															];
															array_push($dataFileAttach, $src_file);
														}
													}

													if ($dataFileAttach==null){
														$dataFileAttach = [];
													}
													foreach ($dataFileAttach as $f) :
														$icon = 'fa-file';
														$arrFile = ['jpg', 'jpeg', 'png', 'gif'];

                                                        if (strpos(strtolower($f['src']), 'doc') || strpos(strtolower($f['src']), 'docx')) {
                                                            $icon = 'fa-file-word-o text-primary';
                                                        } elseif (strpos(strtolower($f['src']), 'xls') || strpos(strtolower($f['src']), 'xlsx')) {
                                                            $icon = 'fa-file-excel-o text-success';
                                                        } elseif (strpos(strtolower($f['src']), 'png') || strpos(strtolower($f['src']), 'jpg') || strpos(strtolower($f['src']), 'jpeg')) {
                                                            $icon = 'fa-file-picture-o text-orange';
                                                        } elseif (strpos(strtolower($f['src']), 'pdf')) {
                                                            $icon = 'fa-file-pdf-o text-danger';
                                                        } elseif (strpos(strtolower($f['src']), 'mp4')) {
                                                            $icon = 'fa-file-video-o text-fuchsia';
                                                        }
														?>
														<a class="btn btn-lg mr-1 mb-1 p-0" data-toggle="modal"
														   data-target="#previewModal"
														   data-src="<?= $f['src'] ?>" data-size="<?= $f['size'] ?>"
														   data-type="<?= $f['type'] ?>">
															<i class="fa <?= $icon ?>"></i>
														</a>
													<?php endforeach; ?>
												</li>
											</ul>
										</div>
										<div class="card-footer">
											<button onclick="hapus(<?= $value->id_tugas ?>)" type="button"
													class="btn btn-sm btn-danger float-right" data-toggle="tooltip"
													title="Hapus Kelas">
												<i class="fa fa-trash"></i> Hapus Tugas
											</button>
										</div>

									</div>
								</div>
							<?php endforeach;
						else:?>
							<div class="col-12 p-0">
								<div class="alert alert-default-warning align-content-center" role="alert">
									<?= $id_guru == '' ? "Pilih Guru" : "Belum ada tugas"; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="previewLabel">Preview</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="media-preview" class="text-center"></div>
			</div>
			<div class="modal-footer">
                <a id="download" href="#" type="button" class="btn btn-primary"><i class="fa fa-download mr-2"></i>
                    Download
                </a>
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-2"></i>Tutup
				</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editJadwalModal" tabindex="-1" role="dialog" aria-labelledby="editJadwalLabel"
	 aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="previewLabel">Edit Jadwal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table>
					<tbody>
					<tr>
						<td style="width: 80px;">Tugas</td>
						<td colspan="3" id="judul">:</td>
					</tr>
					<tr>
						<td>Mapel</td>
						<td id="mapel">:</td>
						<td class="pl-4">Kelas</td>
						<td id="kelas">:</td>
					</tr>
					<tr>
						<td>Jadwal</td>
						<td colspan="3" id="jadwal">: Pilih tanggal di bawah</td>
					</tr>
					</tbody>
				</table>
				<hr>
				<div class="row">
					<div class="col-8">
						<form class="form-inline">
							<select class="form-control col-5 mr-2" name="month" id="month" onchange="jump()">
								<option value=0>Jan</option>
								<option value=1>Feb</option>
								<option value=2>Mar</option>
								<option value=3>Apr</option>
								<option value=4>May</option>
								<option value=5>Jun</option>
								<option value=6>Jul</option>
								<option value=7>Aug</option>
								<option value=8>Sep</option>
								<option value=9>Oct</option>
								<option value=10>Nov</option>
								<option value=11>Dec</option>
							</select>
							<select class="form-control col-5" name="year" id="year" onchange="jump()">
								<option value=2020>2020</option>
								<option value=2021>2021</option>
								<option value=2022>2022</option>
								<option value=2023>2023</option>
								<option value=2024>2024</option>
								<option value=2025>2025</option>
								<option value=2026>2026</option>
								<option value=2027>2027</option>
								<option value=2028>2028</option>
								<option value=2029>2029</option>
								<option value=2030>2030</option>
							</select>
						</form>
					</div>
					<div class="col-4 text-right">
						<button class="btn btn-outline-primary col-3" id="previous" onclick="previous()">
							<i class="fa fa-angle-left"></i>
						</button>
						<button class="btn btn-outline-primary col-3" id="next" onclick="next()">
							<i class="fa fa-angle-right"></i>
						</button>
					</div>
				</div>
				<br>
				<table class="table table-bordered table-sm" id="kalendar">
					<thead>
					<tr>
						<th class="text-center text-danger">Minggu</th>
						<th class="text-center">Senin</th>
						<th class="text-center">Selasa</th>
						<th class="text-center">Rabu</th>
						<th class="text-center">Kamis</th>
						<th class="text-center">Jumat</th>
						<th class="text-center">Sabtu</th>
					</tr>
					</thead>
					<tbody id="kalendar-body">
					</tbody>
				</table>
			</div>
			<?= form_open('', array('id' => 'editjadwal')) ?>
			<div class="modal-footer">
				<input type="hidden" id="id_kelas" name="id_kelas" class="form-control">
				<input type="hidden" id="id_tugas" name="id_tugas" class="form-control">
                <input type="hidden" id="id_mapel" name="id_mapel" class="form-control">
				<input type="hidden" id="jadwal_tugas" name="jadwal_tugas" class="form-control">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-2"></i>Tutup
				</button>
				<button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> Simpan</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
	<script src="<?= base_url() ?>/assets/app/js/kelas/jadwal/kalender.js"></script>
</div>
<?= form_open('', array('id' => 'up')) ?>
<?= form_close() ?>

<script>
	var idGuru = '<?=$id_guru?>';
	$(document).ready(function () {
		ajaxcsrf();

        function getTugasGuru() {
            window.location.href = base_url + 'kelastugas?id=' + idGuru;
        }

		$('#guru').on('change', function () {
			idGuru = $(this).val();
			getTugasGuru()
		});

		$('#previewModal').on('show.bs.modal', function (e) {
			var src = $(e.relatedTarget).data('src');
			var size = $(e.relatedTarget).data('size');
			var type = $(e.relatedTarget).data('type');

            $('#download').attr('href', src).attr('download', 'file_tugas.'+type.split('/')[1]);

			$("div").remove(".prev");
			if (type.match('image')) {
				$('#media-preview').append('<div class="prev"><img src="' + src + '" alt=""></div>');
			} else if (type.match('video')) {
				$('#media-preview').append('<div class="prev"><video src="' + src + '" controls="controls" preload="metadata" style="width: 100%; height: auto;"></div>');
			}
		});

		$('#editJadwalModal').on('show.bs.modal', function (e) {
			var id_tugas = $(e.relatedTarget).data('idtugas');
			var judul = $(e.relatedTarget).data('judul');
			var kelas = $(e.relatedTarget).data('kelas');
			var mapel = $(e.relatedTarget).data('mapel');
			var namakelas = $(e.relatedTarget).data('namakelas');
			var namamapel = $(e.relatedTarget).data('namamapel');
			var tgl = $(e.relatedTarget).data('tgl');

			var stgl = tgl.split('-');
			$('#judul').text(':  ' + judul);
			$('#mapel').text(':  ' + namamapel);
			$('#kelas').text(':  ' + namakelas);
			$('#jadwal').text(stgl[1] === undefined ? ': Pilih tanggal di bawah' : ':  ' + stgl[2] + '-' + stgl[1] + '-' + stgl[0]);

			$('#id_tugas').val(id_tugas);
			$('#jadwal_tugas').val(tgl);
            $('#id_mapel').val(mapel);
			$('#id_kelas').val(kelas);

			var arrJadwal = [];

			$.ajax({
				method: 'POST',
                url: base_url + 'kelastugas/dataaddjadwal?mapel='+mapel+'&kelas='+kelas,
				//data: {id_mapel: mapel, id_kelas: [kelas]},
				success: function (data) {
                    console.log('result', data);
                    var mapel = data.mapel;
                    for(let i = 0; i < mapel.length; i++) {
                        arrJadwal.push(mapel[i].id_hari);
                    }

                    let today = new Date();
                    let currentMonth = today.getMonth();
                    let currentYear = today.getFullYear();

                    var terisi = [];
                    $.each(data.terisi, function (key, value) {
                        terisi.push(value.jadwal_tugas)
                    });

                    initCalendar(terisi, tgl, currentMonth, currentYear, arrJadwal, function(y, m, d) {
						console.log('callback', y + '-' + m + '-' + d);
						$('#jadwal').text(':  ' + d + '-' + m + '-' + y);
						$('#jadwal_tugas').val(y + '-' + m + '-' + d);
					});
				}
			});
		});

		$('#editjadwal').submit(function (e) {
			e.stopPropagation();
			e.preventDefault();

			$.ajax({
				type: 'POST',
				url: base_url + 'kelastugas/savejadwal',
				data: $(this).serialize(),
				success: function (data) {
					console.log(data);
					$('#editJadwalModal').modal('hide').data('bs.modal', null);
					$('#editJadwalModal').on('hidden', function () {
						$(this).data('modal', null);  // destroys modal
					});
					if (data) {
						showSuccessToast(data.status)
					} else {
						showDangerToast(data.status);
					}
					location.reload();
				}, error: function (data) {
					showDangerToast('Gagal membuat jadwal');
					console.log(data);
				}
			});

		});

        $('#delete-all').on('click', function (e) {
            var ids = <?= json_encode($arrIds) ?>;
            var dataPost = $('#up').serialize() + '&ids='+ JSON.stringify(ids);
            console.log(dataPost);
            var count = $(this).data('count');
            if (count > 0) {
                swal.fire({
                    title: "Hapus Semua Tugas?",
                    text: count + " tugas akan dihapus",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Hapus Semua"
                }).then(result => {
                    if(result.value) {
                        $.ajax({
                            url: base_url + 'kelastugas/deletealltugas',
                            type: "POST",
                            data: dataPost,
                            success: function (respon) {
                                if (respon) {
                                    swal.fire({
                                        title: "Berhasil",
                                        text: count + " Tugas berhasil dihapus",
                                        icon: "success"
                                    }).then(result => {
                                        if(result.value) {
                                            window.location.href = base_url + 'kelastugas?id=' + idGuru ;
                                        }
                                    })
                                } else {
                                    swal.fire({
                                        title: "Gagal",
                                        text: "Tidak bisa menghapus tugas",
                                        icon: "error"
                                    });
                                }
                            },
                            error: function () {
                                swal.fire({
                                    title: "Gagal",
                                    text: "Ada data yang sedang digunakan",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            } else {
                swal.fire({
                    title: "Materi Kosong",
                    text: "Tidak ada materi yang bisa dihapus",
                    icon: "info"
                });
            }
        });

    });

	function aktifkanTugas(id, status) {
		function aktifkan() {
			$.ajax({
				url: base_url + 'kelastugas/aktifkantugas',
				data: {id_tugas: id, method: status},
				type: "POST",
				success: function (respon) {
					if (respon.status) {
						swal.fire({
							title: "Berhasil",
							text: status === '0' ? "data berhasil diaktifkan" : "data berhasil dinonaktifkan",
							icon: "success"
						}).then(result => {
							if(result.value
					)
						{
							window.location.href = base_url + 'kelastugas?id='+idGuru;
						}
					})
						;
					} else {
						swal.fire({
							title: "Gagal",
							text: "Tidak bisa menghapus",
							icon: "error"
						});
					}
					reload_ajax();
				},
				error: function () {
					swal.fire({
						title: "Gagal",
						text: "Ada data yang sedang digunakan",
						icon: "error"
					});
				}
			});
		}

		if (status === '1') {
			swal.fire({
				title: "Anda yakin?",
				text: "Tugas akan dinonaktifkan!",
				icon: "info",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Nonaktifkan"
			}).then(result => {
				if(result.value){
					aktifkan();
				}
			})
		} else {
			aktifkan();
		}
	}

	function hapus(id) {
		swal.fire({
			title: "Anda yakin?",
			text: "Tugas akan dihapus!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Hapus!"
		}).then(result => {
			if(result.value
	)
		{
			$.ajax({
				url: base_url + 'kelastugas/hapustugas',
				data: {id_tugas: id},
				type: "POST",
				success: function (respon) {
					if (respon.status) {
						swal.fire({
							title: "Berhasil",
							text: "Tugas berhasil dihapus",
							icon: "success"
						}).then(result => {
							if(result.value
					)
						{
							window.location.href = base_url + 'kelastugas?id='+idGuru;
						}
					})
						;
					} else {
						swal.fire({
							title: "Gagal",
							text: "Tidak bisa menghapus",
							icon: "error"
						});
					}
					reload_ajax();
				},
				error: function () {
					swal.fire({
						title: "Gagal",
						text: "Ada data yang sedang digunakan",
						icon: "error"
					});
				}
			});
		}
	})
		;
	}

</script>
