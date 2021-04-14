<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
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
					//var_dump($materi);
					//echo '</pre>';
					?>
					<?= form_open('', array('id' => 'formselect')) ?>
					<?= form_close(); ?>
					<div class="row">
						<div class="col-md-4 mb-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Guru</span>
								</div>
								<?php
								echo form_dropdown(
									'guru',
									$gurus,
									null,
									'id="dropdown-guru" class="form-control"'
								); ?>
							</div>
						</div>
						<div class="col-md-5 mb-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Materi/Tugas</span>
								</div>
								<select id="dropdown-materi" class="form-control">
									<optgroup label="Materi" id="opt-materi">
									</optgroup>
									<optgroup label="Tugas" id="opt-tugas">
									</optgroup>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Kelas</span>
								</div>
								<select id="kelas-materi" class="form-control">
								</select>
							</div>
						</div>
					</div>
					<hr>
					<div class="table-responsive">
						<table id="log" class="w-100 table table-striped table-bordered table-hover table-sm">
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

<div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="daftarLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="daftarLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid border">
					<div id="konten-hasil" class="row">
					</div>
					<div id="konten-nilai" class="row">
						<div class="col-4 mb-3">
							<div id="nilai-hasil" class="text-center" style="font-size: 60pt">
							</div>
						</div>
						<div class="col-8">
							<?= form_open('', array('id' => 'formnilai')) ?>
							<div class="row">
								<div class="col-4 mb-3">
									<label>Beri Nilai</label>
									<input class="form-control" name="nilai" id="nilai" type="text" required>
									<input type="hidden" name="id_log_file" id="id-log">
									<input type="hidden" name="method" id="method">
								</div>
								<div class="col-4 mb-3">
									<br>
									<button type="submit" class="btn btn-primary mt-2">Simpan Nilai</button>
								</div>
							</div>
							<div class="row">
								<div class="col-12 mb-3">
									<label>Catatan Untuk Siswa</label>
									<input id="catatan" class="form-control" name="catatan" type="text">
								</div>
							</div>
							<?= form_close(); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
			</div>
		</div>
	</div>
</div>

<script>
	var kelas = JSON.parse('<?= json_encode($kelas)?>');
	var arrKelasMateri = [];
	var arrKelasTugas = [];
	var form;
	var resultAll = {};

	$(document).ready(function () {
		var label = $('#dropdown-materi :selected').parent().attr('label');
		form = $('#formselect');

		var optMateri = $('#opt-materi');
		var optTugas = $('#opt-tugas');
		var dropGuru = $('#dropdown-guru');

		dropGuru.on('change', function () {
			$.ajax({
				type: "GET",
				url: base_url + "kelasstatus/getmateriguru/" + $(this).val(),
				success: function (response) {
					console.log(response);
					optMateri.html('');
					optTugas.html('');
					arrKelasMateri = [];
					arrKelasTugas = [];

					if (response.materi.length === 0) {
						optMateri.append('<option value="">Belum ada materi</option>');
					} else {
						for (let j = 0; j < response.materi.length; j++) {
							optMateri.append('<option value="'+response.materi[j].id_materi+'">'+response.materi[j].kode+'</option>');

							var item = {};
							item['id_materi'] = response.materi[j].id_materi;
                            //item['id_kjm'] = response.materi[j].id_kjm;
							item['id_kelas'] = response.materi[j].kelas;

							arrKelasMateri.push(item);
						}
					}

					if (response.tugas.length === 0) {
						optTugas.append('<option value="">Belum ada tugas</option>');
					} else {
						for (let k = 0; k < response.tugas.length; k++) {
							optTugas.append('<option value="'+response.tugas[k].id_tugas+'">'+response.tugas[k].kode+'</option>');

							var item = {};
							item['id_tugas'] = response.tugas[k].id_tugas;
                            //item['id_kjt'] = response.tugas[k].id_kjt;
							item['id_kelas'] = response.tugas[k].kelas;

							arrKelasTugas.push(item);
						}
					}
					label = $('#dropdown-materi :selected').parent().attr('label');
					onChangeMateri($('#dropdown-materi').val(), label);
				}
			});
		});

		$('#dropdown-materi').on('change', function () {
			label = $('#dropdown-materi :selected').parent().attr('label');
			onChangeMateri($(this).val(), label);
		});

		$('#kelas-materi').on('change', function () {
			getLogSiswa($('#dropdown-materi :selected').parent().attr('label'));
		});

		$('#daftarModal').on('show.bs.modal', function (e) {
			var key = $(e.relatedTarget).data('key');
			var konten = $('#konten-hasil');
			//console.log(resultAll[key]);
			var val = resultAll[key];
			var html = '';
			$('#daftarLabel').text('Hasil Siswa ' + val.nama);
			konten.html(html);

			if (val.selesai == null) {
				html = '<div class="col-12 mb-3 mt-3">' +
					'<div class="border p-2">Siswa belum menyelesaikan materi</div></div>';
				konten.append(html);
				$('#method').val('add');

				var idMateri = $('#dropdown-materi').val();
				$('#id-log').val(key+''+idMateri+'2');

				$('#nilai-hasil').text('');
				$('#nilai').val('');
				$('#catatan').val('');
			} else {
				var catatan = val.selesai.text === '' || val.selesai.text == null ? 'Siswa tidak mencantumkan catatan' : val.selesai.text;
				html = '<div class="col-12 mb-3 mt-3">' +
					'<div class="border p-2">'+catatan+'</div></div>';
				konten.append(html);

				for (let i = 0; i < val.file.length; i++) {
					var file = val.file[i];
					if (file.type.match('image')) {
						html = '<div class="col-12 mb-3">' +
							'<img data-enlargeable src="'+ file.src +'" alt="" class="img-thumbnail" /></div>';
						konten.append(html);
					} else if (file.type.match('video')) {
						html = '<div class="col-12 mb-3"><video src="' + file.src + '"></video></div>';
						konten.append(html);
					} else {
						html = '<div class="col-3 mb-3"><img src="'+ base_url + '"/assets/app/img/document_file.png"></div>';
						konten.append(html);
					}
				}

				$('img[data-enlargeable]').addClass('img-enlargeable').click(function(){
					var src = $(this).attr('src');
					var modal;
					function removeModal(){ modal.remove(); $('body').off('keyup.modal-close'); }
					modal = $('<div>').css({
						background: 'RGBA(0,0,0,.8) url('+src+') no-repeat center',
						backgroundSize: 'contain',
						width:'100%', height:'100%',
						position:'fixed',
						zIndex:'10000',
						top:'0', left:'0',
						cursor: 'zoom-out'
					}).click(function(){
						removeModal();
					}).appendTo('body');
					//handling ESC
					$('body').on('keyup.modal-close', function(e){
						if(e.key==='Escape'){ removeModal(); }
					});
				});

				var nilaiHasil = val.selesai.nilai === '' ? '' : val.selesai.nilai;
				var idLog = val.selesai.id_log === '' ? '' : val.selesai.id_log;
				var catatanGuru = val.selesai.catatan === '' ? '' : val.selesai.catatan;

				$('#method').val('update');
				$('#nilai-hasil').text(nilaiHasil);
				$('#nilai').val(nilaiHasil);
				$('#id-log').val(idLog);
				$('#catatan').val(catatanGuru);
			}

		});

		$('#formnilai').submit('click', function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			console.log("data:", $(this).serialize());

			$.ajax({
				url: base_url + "kelasstatus/savenilai",
				type: "POST",
				dataType: "JSON",
				data: $(this).serialize() + '&label=' +label,
				success: function (data) {
					console.log("result", data);
					$('#daftarModal').modal('hide').data('bs.modal', null);
					$('#daftarModal').on('hidden', function () {
						$(this).data('modal', null);  // destroys modal
					});
					showSuccessToast('Data berhasil disimpan.');
					getLogSiswa(label)
				}, error: function (xhr, status, error) {
					$('#daftarModal').modal('hide').data('bs.modal', null);
					$('#daftarModal').on('hidden', function () {
						$(this).data('modal', null);  // destroys modal
					});
					console.log("error", xhr.responseText);
					showDangerToast('ERROR');
				}
			});
		});
		
		if (dropGuru.val()!= '') dropGuru.change();
	});

	function onChangeMateri(id, label) {
		var selKelas = $('#kelas-materi');
		selKelas.html('');

		if (label === 'Materi') {
			for (let j = 0; j < arrKelasMateri.length; j++) {
				if (arrKelasMateri[j].id_materi === id) {
					var ids = arrKelasMateri[j].id_kelas;
					for (let k = 0; k < ids.length; k++) {
						selKelas.append('<option value="'+ids[k]+'">'+kelas[ids[k]]+'</option>');
					}
				}
			}
		} else {
			for (let j = 0; j < arrKelasTugas.length; j++) {
				if (arrKelasTugas[j].id_tugas === id) {
					var ids = arrKelasTugas[j].id_kelas;
					for (let k = 0; k < ids.length; k++) {
						selKelas.append('<option value="'+ids[k]+'">'+kelas[ids[k]]+'</option>');
					}
				}
			}
		}

		getLogSiswa(label);
	}

	function getLogSiswa(label) {
		var selMateri = $('#dropdown-materi').val();
		var selKelas = $('#kelas-materi').val();

		//jQuery.timeago(new Date());             //=> "less than a minute ago"
		//jQuery.timeago("2008-07-17");           //=> "12 years ago"
		//jQuery.timeago(jQuery("time#some_id")); //=> "12 years ago"     // [title="2008-07-20"]
		$('#loading').removeClass('d-none');

		setTimeout(function() {
			$.ajax({
				type: 'POST',
				url: base_url + 'kelasstatus/loadstatus',
				data: form.serialize()+'&id_kjm='+selMateri+'&id_kelas='+selKelas+'&label='+label,  //{id_materi: selMateri, id_kelas: selKelas},
				success: function (data) {
					console.log('result', data);
					resultAll = data;
					var table = $('#log');
					table.empty();
					var html = '<thead class="alert alert-primary">' +
						'<tr>' +
						'<th height="50" width="50" class="align-middle text-center p-0">No.</th>' +
						'<th class="align-middle d-none d-md-table-cell">NIS</th>' +
						'<th class="align-middle">Nama Siswa</th>' +
						'<th class="align-middle text-center p-0 d-none d-md-table-cell">Kelas</th>' +
						//'<th class="text-center align-middle">Login</th>' +
						'<th class="text-center align-middle">Buka '+label+'</th>' +
						'<th class="text-center align-middle">Selesai</th>' +
						'<th class="text-center align-middle">Hasil</th>' +
						'<th class="text-center align-middle">Nilai</th>' +
						'</tr>' +
						'</thead><tbody>';

					var no = 1;
					$.each(data, function( key, value ) {
						var login = '- -  :  - -';
						var mulai = '- -  :  - -';
						var selesai = '- -  :  - -';
						var nilai = '';

						if (value.login != null) {
							login = createTime(value.login);
						}

						if (value.mulai !=null) {
							mulai = createTime(value.mulai.log_time);
						}
						if (value.selesai !=null) {
							selesai = createTime(value.selesai.log_time);
                            nilai = value.selesai.nilai == null ? '' : value.selesai.nilai;
						}

						html +=
							'<tr>' +
							'<td class="align-middle text-center">' + no + '</td>' +
							'<td class="align-middle d-none d-md-table-cell">' + value.nis + '</td>' +
							'<td class="align-middle">' + value.nama + '</td>' +
							'<td class="align-middle text-center d-none d-md-table-cell">' + value.kelas + '</td>' +
							//'<td class="align-middle text-center">' + login + '</td>' +
							'<td class="align-middle text-center">' + mulai + '</td>' +
							'<td class="align-middle text-center">' + selesai + '</td>' +
							'<td class="align-middle text-center">' +
							'<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#daftarModal" data-key="'+key+'">LIHAT</button>' +
							'</td>' +
							'<td class="align-middle text-center">'+ nilai +'</td>' +
							'</tr>';
						no++;
					});

					html +=  '</tbody>';
					table.append(html);
					$('#loading').addClass('d-none');
				}
			});
		}, 300);
	}

	function createTime(d) {
		var date = new Date(d);

		var jam = date.getHours();
		var menit = date.getMinutes();
		var sJam;
		var sMenit;

		if(jam < 10) sJam = '0'+jam;
		else sJam = ''+jam;

		if(menit < 10) sMenit = '0'+menit;
		else sMenit = ''+menit;

		var hari = daysdifference(d);
		var time;

		if (hari === 0) {
			time = sJam + ':' + sMenit;
		} else if (hari === 1) {
			time = 'kemarin, ' + sJam + ':' + sMenit;
		} else {
			time = jQuery.timeago(d) + ', ' + sJam + ':' + sMenit;
		}
		return time;
	}

	function daysdifference(last){
		var startDay = new Date(last);
		var endDay = new Date();

		var millisBetween = startDay.getTime() - endDay.getTime();
		var days = millisBetween / (1000 * 3600 * 24);

		return Math.round(Math.abs(days));
	}
</script>
