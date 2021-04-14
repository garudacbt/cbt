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
						<a type="button" href="<?= base_url('kelasabsen') ?>" class="btn btn-sm btn-default">
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
					<div class='row'>
						<div class='col-md-12'>
							<?= form_open('', array('id' => 'formselect')) ?>
							<?= form_close(); ?>
							<div class="row">
								<div class="col-md-3 mb-2">
									<label>Guru</label>
									<?php
									echo form_dropdown(
										'guru',
										$guru,
										null,
										'id="opsi-guru" class="form-control"'
									); ?>
								</div>
								<div class="col-md-3 mb-2">
									<label>Materi/Tugas</label>
									<select id="opsi-materi" class="form-control">
										<optgroup label="Materi" id="opt-materi">
										</optgroup>
										<optgroup label="Tugas" id="opt-tugas">
										</optgroup>
									</select>
								</div>
								<div class="col-md-3 mb-2">
									<label>Kelas</label>
									<select id="opsi-kelas" class="form-control">
									</select>
								</div>
								<div class='col-md-3 mb-3'>
									<div class="row">
										<div class="col-6">
											<label>Bulan</label>
											<?php
											echo form_dropdown(
												'bulan',
												$bulan,
												date('n'),
												'id="opsi-bulan" class="form-control"'
											); ?>
										</div>
										<div class="col-6">
											<label>Tahun</label>
											<?php
											$ret = [];
											foreach ($tp as $key => $row) {
												$thn = explode("/", $row->tahun);
												$ret [$thn[0]] = $thn[0];
											}
											echo form_dropdown(
												'tahun',
												$ret,
												date('Y'),
												'id="opsi-tahun" class="form-control"'
											); ?>
										</div>
									</div>
								</div>
							</div>
							<div id="konten-absensi">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	var kelas = JSON.parse('<?= json_encode($kelas)?>');
	var arrKelas = [];
	var form;
	var bln = '';
	var thn ='';
	var oldData = '';

	function daysInMonth (month, year) {
		return new Date(year, month, 0).getDate();
	}

	function createTabelKehadiran(data) {
		console.log(data);
		var bulan = $("#opsi-bulan option:selected").text();
		var table = '';

		var jmlHari = daysInMonth(bln, thn);
		var weekday = ["Min","Sen","Sel","Rab","Kam","Jum","Sab"];

		table = '<table id="tabelsiswa" class="table table-bordered table-striped table-sm table-responsive">' +
			'<thead>' +
			'<tr>' +
			'<th rowspan="2" width="40" class="text-center align-middle">No</th>' +
			'<th rowspan="2" class="text-center align-middle">N I S</th>' +
			'<th rowspan="2" class="text-center align-middle">Nama</th>' +
			'<th rowspan="2" class="text-center align-middle">Kelas</th>' +
			'<th colspan="'+jmlHari+'" class="text-center align-middle">Kehadiran Bulan '+ bulan +'</th>' +
			'</tr>' +
			'<tr>';

		for (let i = 0; i < jmlHari; i++) {
			var tg = (i+1);
			var d = new Date(bln+'/'+tg+'/'+thn);
			var hari = weekday[d.getDay()];

			console.log(hari);
			if (hari === 'Min') {
				table += '<th class="text-center align-middle" style="background-color:#FF4444">'+ tg +'<br>'+hari+'</th>';
			} else {
				table += '<th class="text-center align-middle">'+ tg +'<br>'+hari+'</th>';
			}
		}
		table += '</tr></thead>';

		var no = 1;
		$.each(data, function(key, value) {
			table += '<tr>' +
				'<td class="text-center align-middle">'+no+'</td>' +
				'<td class="text-center align-middle">'+value.nis+'</td>' +
				'<td>'+value.nama+'</td>' +
				'<td class="text-center align-middle">'+value.kelas+'</td>';

			for (let i = 0; i < jmlHari; i++) {
				var tg = (i+1);
				var d = new Date(bln+'/'+tg+'/'+thn);
				var hari = weekday[d.getDay()];

				if (value.status[i] == null) {
					if (hari === 'Min') {
						table += '<td class="text-center align-middle" style="background-color:#FF4444"> -- </td>';
					} else {
						table += '<td class="text-center align-middle"> -- </td>';
					}
				} else {
					if (hari === 'Min') {
						table += '<td class="text-center align-middle" style="background-color:#FF4444">'+ value.status[i].jam +'</td>';
					} else {
						table += '<td class="text-center align-middle">'+ value.status[i].jam +'</td>';
					}
				}
			}
			table += '</tr>';
			no++;
		});

		table += '</table>';
		$('#konten-absensi').html(table);
	}

	$(document).ready(function() {
		var optMateri = $('#opt-materi');
		var optTugas = $('#opt-tugas');

		var selKelas = $('#opsi-kelas');
		var selMateri = $('#opsi-materi');
		var selTahun = $('#opsi-tahun');
		var selBulan = $('#opsi-bulan');
		var label = $('#opsi-materi :selected').parent().attr('label');
		form = $('#formselect');

		bln = selBulan.val();
		thn = selTahun.val();

		selKelas.change(function(){
			label = $('#opsi-materi :selected').parent().attr('label');
			reload(selMateri.val(), $(this).val(), label);
		});

		selBulan.change(function(){
			label = $('#opsi-materi :selected').parent().attr('label');
			reload(selMateri.val(), selKelas.val(), label);
		});

		selTahun.change(function(){
			label = $('#opsi-materi :selected').parent().attr('label');
			reload(selMateri.val(), selKelas.val(), label);
		});

		function reload(materi, kls, label) {
			console.log(bln, thn, kls, label);
			var empty = bln==='' || thn==='' || kls==='';
			var newData = '&thn='+thn+'&bln='+bln+'&kelas='+kls+'&label='+label+'&kjm='+materi;
			if (!empty && oldData !== newData) {
				oldData = newData;
				$.ajax({
					url: base_url + 'kelasabsensibulanan/loadabsensi',
					type:"POST",
					dataType:"json",
					data: form.serialize() + newData,
					success: function(data) {
						createTabelKehadiran(data)
					},
					error: function(xhr, status, error) {
						console.log(xhr.responseText);
					}
				});
			}
		}

		$('#opsi-guru').on('change', function () {
			$.ajax({
				type: "GET",
				url: base_url + "kelasstatus/getmateriguru/" + $(this).val(),
				success: function (response) {
					console.log(response);
					optMateri.html('');
					optTugas.html('');
					arrKelas = [];

					if (response.materi.length === 0) {
						optMateri.append('<option value="">Belum ada materi</option>');
					} else {
						for (let j = 0; j < response.materi.length; j++) {
							optMateri.append('<option value="'+response.materi[j].id_kjm+'">'+response.materi[j].kode+'</option>');

							var item = {};
							item['id_materi'] = response.materi[j].id_kjm;
							item['id_kelas'] = response.materi[j].kelas;

							arrKelas.push(item);
						}
					}

					if (response.tugas.length === 0) {
						optTugas.append('<option value="">Belum ada tugas</option>');
					} else {
						for (let k = 0; k < response.tugas.length; k++) {
							optTugas.append('<option value="'+response.tugas[k].id_kjt+'">'+response.tugas[k].kode+'</option>');

							var item = {};
							item['id_materi'] = response.tugas[k].id_kjt;
							item['id_kelas'] = response.tugas[k].kelas;

							arrKelas.push(item);
						}
					}
					label = $('#opsi-materi :selected').parent().attr('label');
					onChangeMateri($('#opsi-materi').val(), label);
				}
			});
		});
		//onChangeMateri($('#opsi-materi').val(), label);

		selMateri.on('change', function () {
			label = $('#opsi-materi :selected').parent().attr('label');
			onChangeMateri($(this).val(), label);
		});

		function onChangeMateri(id, label) {
			//console.log(label, id)
			selKelas.html('');

			for (let j = 0; j < arrKelas.length; j++) {
				if (arrKelas[j].id_materi === id) {
					var ids = arrKelas[j].id_kelas;
					for (let k = 0; k < ids.length; k++) {
						selKelas.append('<option value="'+ids[k]+'">'+kelas[ids[k]]+'</option>');
					}
				}
			}

			label = $('#opsi-materi :selected').parent().attr('label');
			reload(id, selKelas.val(), label);
		}
	});
</script>
