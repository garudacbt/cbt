<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */

if (isset($jadwal_kbm)) {
	$ist = json_decode(json_encode($jadwal_kbm->istirahat));
	$jmlIst = json_decode(json_encode(unserialize($ist)));
}
?>

<div class="content-wrapper" style="margin-top: -1px;">
	<div class="sticky">
	</div>
	<section class="content overlap p-4">
		<div class="container">
			<div class="row">
				<div class="col-12">
                    <?php $this->load->view('members/siswa/templates/top'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="card my-shadow">
						<div class="card-header">
							<h5 class="text-center">
								Jadwal Pelajaran Kelas <?=$siswa->nama_kelas?>
								<br>Tahun Pelajaran <?=$tp_active->tahun?> Semester <?=$smt_active->smt?>
							</h5>
						</div>
						<div class="card-body">
							<?php
							if (isset($jadwal_mapel)) :
								foreach ($jadwal_mapel as $k) {
									foreach ($k['jadwal'] as $j) {
										$arrRes[$j->jam_ke][] = [
											'id_tp' => $j->id_tp,
											'id_smt' => $j->id_smt,
											'id_kelas' => $j->id_kelas,
											'id_hari' => $j->id_hari,
											'jam_ke' => $j->jam_ke,
											'id_mapel' => $j->id_mapel,
											'kode' => $j->kode
										];
									}
								}

								$arrIst = [];
								foreach ($jmlIst as $istirahat) {
									array_push($arrIst, $istirahat->ist);
									$arrDur[$istirahat->ist] = $istirahat->dur;
								};
								?>
								<div class="table-responsive">
									<table id="jadwal-pelajaran" class="w-100 table table-striped table-bordered">
										<thead class="alert alert-primary">
										<tr>
											<th height="50" class="align-middle text-center p-0">JAM</th>
											<th class="align-middle text-center p-0">SEN</th>
											<th class="align-middle text-center p-0">SEL</th>
											<th class="align-middle text-center p-0">RAB</th>
											<th class="align-middle text-center p-0">KAM</th>
											<th class="align-middle text-center p-0">JUM</th>
											<th class="align-middle text-center p-0">SAB</th>
										</tr>
										</thead>
										<tbody>
										<?php
										$jamMulai = new DateTime($jadwal_kbm->kbm_jam_mulai);
										$jamSampai = new DateTime($jadwal_kbm->kbm_jam_mulai);
										for ($i = 0; $i < $jadwal_kbm->kbm_jml_mapel_hari; $i++) :
											$jamke = $i + 1;
											if (in_array($jamke, $arrIst)) :
												$jamSampai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
												?>
												<tr class="jam bg-gradient-fuchsia" data-jamke="<?= $jamke ?>">
													<td class="align-middle text-center">
														<?= $jamMulai->format('H:i') ?> - <?= $jamSampai->format('H:i') ?>
													</td>
													<td colspan="6" class="align-middle text-center p-0">ISTIRAHAT</td>
												</tr>
												<?php
												$jamMulai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
											else :
												$jamSampai->add(new DateInterval('PT' . $jadwal_kbm->kbm_jam_pel . 'M'));
												?>
												<tr class="jam" data-jamke="<?= $jamke ?>">
													<td class="align-middle text-center bg-gradient-primary">
														<?= $jamMulai->format('H:i') ?> - <?= $jamSampai->format('H:i') ?>
													</td>
													<?php
													if (isset($arrRes[$jamke])) :
														foreach ($arrRes[$jamke] as $value) :?>
															<td class="align-middle text-center">
																<div class="value-name"
																	 data-idmapel="<?= $value['id_mapel'] ?>"
																	 data-idhari="<?= $value['id_hari'] ?>"
																	 id="<?= $value['id_hari'] . $jamke ?>">
																	<?= $value['kode'] ?>
																</div>
															</td>
														<?php
														endforeach;
													else:
														for ($d = 0; $d < 6; $d++) :
															?>
															<td class="align-middle text-center">
																<div class="value-name" data-idmapel="0"
																	 data-idhari="<?= $d + 1 ?>"
																	 id="<?= $d + 1 . $jamke ?>">
																</div>
															</td>
														<?php
														endfor;
													endif; ?>
												</tr>

												<?php
												$jamMulai->add(new DateInterval('PT' . $jadwal_kbm->kbm_jam_pel . 'M'));
											endif;
										endfor; ?>
										</tbody>
									</table>
									<?php
									if (isset($jadwal_kbm->ada)) : ?>
										<div class="col-lg-12 p-0">
											<div class="alert align-content-center" role="alert">
												<strong>Jadwal belum dibuat.</strong> .
											</div>
										</div>
									<?php endif;
									?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	let method = '<?= $method ?>';
	var jmlMapel = 0;
	$(document).ready(function () {
		$('#jam_mulaiEdit, #jam_mulai').datetimepicker({
			datepicker: false,
			format: 'H:i',
			step: 15,
			minTime: '06:00',
			maxTime: '17:00',
            disabledWeekDays: [0]
		});

		onChangeJmlIst('<?= count($jmlIst) ?>');
		jmlMapel = '<?=$jadwal_kbm->kbm_jml_mapel_hari?>';
		onChangeJmlMapel(jmlMapel);

		$('#setjadwal').on('submit', function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();

			console.log("data", $(this).serialize());

			$.ajax({
				url: base_url + "kelasjadwal/setjadwal",
				data: $(this).serialize(),
				method: 'POST',
				dataType: "JSON",
				success: function (data) {
					console.log(data);
					swal.fire({
						"title": data.status ? "Berhasil" : "Gagal",
						"text": data.status ? "Jadwal berhasil dibuat" : "Jadwal tidak dibuat",
						"icon": data.status ? "success" : "error"
					}).then(result => {
						if (data.status) {
							reload();
						}
					});
				},
				error: function (xhr, status, error) {
					showDangerToast(xhr.responseText);
				}
			});
		});

		$('#jum_ist').on('change', function () {
			//console.log($(this).val());
			onChangeJmlIst($(this).val());
		});

		$('#jml-mapel').on('change', function () {
			onChangeJmlMapel($(this).val());
		});

		$('#setmapel').submit('click', function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();

			const $rows = $('#jadwal-pelajaran').find('tr'), headers = $rows.splice(0, 1); // header rows
			var jsonObj = [];
			$rows.each((i, row) => {
				var jamke = $(row).attr("data-jamke");
				const colsHari = $(row).find('div.value-name');
				colsHari.each((h, col) => {
					let item = {};
					item ["id_tp"] = id_tp_active;
					item ["id_smt"] = id_smt_active;
					item ["id_hari"] = $(col).attr("data-idhari");
					item ["id_mapel"] = $(col).attr('data-idmapel');
					item ["jam_ke"] = jamke;

					jsonObj.push(item);
				});
			});
			//console.log("data="+JSON.stringify(jsonObj, null, 4));

			$.ajax({
				url: base_url + 'kelasjadwal/setmapel',
				type: "POST",
				dataType: "JSON",
				data: $(this).serialize() + "&method=" + method + "&data=" + JSON.stringify(jsonObj),
				success: function (data) {
					console.log(data);
					if (data.status) {
						swal.fire({
							title: "Sukses",
							text: "Jadwal Pelajaran berhasil disimpan",
							icon: "success",
							showCancelButton: false,
						}).then(result => {
							reload();
						});
					} else {
						swal.fire({
							title: "ERROR",
							text: "Data Tidak Tersimpan",
							icon: "error",
							showCancelButton: false,
						});
					}
				}, error: function (xhr, status, error) {
					console.log("error", xhr.responseText);
					swal.fire({
						title: "ERROR",
						text: "Data Tidak Tersimpan",
						icon: "error",
						showCancelButton: false,
					});
				}
			});

		});

	});

	function reload() {
		window.location.href = base_url + 'kelasjadwal/kelas/' + '<?=$id_kelas?>';
	}

	function onChangeJmlMapel(s) {
		jmlMapel = s;
		onChangeJmlIst($('#jum_ist').val());
	}

	function onChangeJmlIst(jml) {
		var iid = 1;
		var inputgroup = $('#inputs');
		if (jml > 1) {
			$('#ist1').text('Istirahat 1');
			$('#dur1').text('Durasi Istirahat 1');
		} else {
			$('#ist1').text('Istirahat');
			$('#dur1').text('Durasi Istirahat');
		}

		for (let o = 1; o < 5; o++) {
			$("#input_ist" + o).remove();
			$("#input_dur" + o).remove();
		}

		var istirahat = JSON.parse('<?= json_encode(unserialize($ist)) ?>');
		//jmlMapel = $('#jml-mapel').val();
		console.log(jmlMapel);

		for (let i = 0; i < jml; i++) {
			var num = jml === '1' ? '' : iid;
			var val = i + 1 > istirahat.length ? '' : istirahat[i].dur;
			var se = i + 1 > istirahat.length ? 0 : istirahat[i].ist;
			var inputDurasi = '<div class="col-md-3 mb-3" id="input_ist' + iid + '">' +
				'<div class="input-group">' +
				'<div class="input-group-prepend">' +
				'<span id="ist' + iid + '" class="input-group-text">Istirahat ' + num + '</span>' +
				'</div>' +
				'<select name="ist' + iid + '" id="ist1" class="form-control" placeholder="Jam ke" required="">';
			for (let j = 0; j < jmlMapel; j++) {
				if (j === 0) {
					inputDurasi += '<option value="">Jam Istirahat</option>';
				} else {
					if (j == se) {
						inputDurasi += '<option value="' + j + '" selected>Jam ke ' + j + '</option>';
					} else {
						inputDurasi += '<option value="' + j + '" >Jam ke ' + j + '</option>';
					}
				}
			}
			inputDurasi += '</select>' +
				'</div>' +
				'</div>' +
				'<div class="col-md-3 mb-3" id="input_dur' + iid + '">' +
				'<div class="input-group">' +
				'<div class="input-group-prepend">' +
				'<span id="dur' + iid + '" class="input-group-text">Durasi Istirahat ' + num + '</span>' +
				'</div>' +
				'<input type="number" class="form-control" name="dur_ist' + iid + '"' +
				'value="' + val + '" placeholder="Menit" required>' +
				'</div>' +
				'</div>';

			iid++;
			inputgroup.append(inputDurasi);
		}
	}
</script>
