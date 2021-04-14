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
								<div class="col-md-4 mb-2">
									<label>Mata Pelajaran</label>
									<?php
									echo form_dropdown(
										'mapel',
										$mapel,
										null,
										'id="opsi-mapel" class="form-control"'
									); ?>
								</div>
								<div class="col-md-3 mb-2">
									<label>Kelas</label>
									<?php
									echo form_dropdown(
										'kelas',
										$kelas,
										null,
										'id="opsi-kelas" class="form-control"'
									); ?>
								</div>
								<div class='col-md-3 mb-3'>
									<label>Hari, Tanggal</label>
									<input type='text' id="opsi-tgl" name='tanggal' class='tgl form-control' autocomplete='off' required='true'/>
								</div>
							</div>
							<div id="konten-absensi">
							</div>
						</div>
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
	var kelas = JSON.parse('<?= json_encode($kelas)?>');
	var arrKelas = [];
	var form;
	var hari = '';
	var tgl = '';
	var bln = '';
	var thn ='';
	var oldData = '';

	function createTabelKehadiran(data) {
		console.log(data);
		var table = '';

		table = '<table id="tabelsiswa" class="table table-bordered table-striped table-sm">' +
			'<thead>' +
			'<tr>' +
			'<th width="40" class="text-center align-middle">No</th>' +
			'<th class="text-center align-middle">N I S</th>' +
			'<th class="text-center align-middle">Nama</th>' +
			'<th class="text-center align-middle">Kelas</th>' +
			'<th class="text-center align-middle">Kehadiran</th>' +
			'</tr>' +
			'</thead>';

		var no = 1;
		$.each(data, function(key, value) {
			table += '<tr>' +
				'<td class="text-center align-middle">'+no+'</td>' +
				'<td class="text-center align-middle">'+value.nis+'</td>' +
				'<td>'+value.nama+'</td>' +
				'<td class="text-center align-middle">'+value.kelas+'</td>';
			if (value.status === null) {
				table += '<td class="text-center align-middle">- -</td>';
			} else {
				var jm = value.status.jam_materi != null ? value.status.jam_materi : (value.status.jam_tugas != null ? value.status.jam_tugas : '- -');
				table += '<td class="text-center align-middle">'+ jm +'</td>';
			}
			table += '</tr>';
			no++;
		});

		table += '</table>';
		$('#konten-absensi').html(table);
		$('#loading').addClass('d-none');
	}

	$(document).ready(function() {
		var selKelas = $('#opsi-kelas');
		var selMapel = $('#opsi-mapel');
		form = $('#formselect');

		//console.log(form.serialize());

		jQuery.datetimepicker.setLocale('id');
		$('.tgl').datetimepicker({
			icons:
				{
					next: 'fa fa-angle-right',
					previous: 'fa fa-angle-left'
				},
			timepicker: false,
			format: 'D, d M Y',//'Y-m-d',
			widgetPositioning: {
				horizontal: 'left',
				vertical: 'bottom'
			},
			disabledWeekDays: [],
			onChangeDateTime: function(date, $input){
				tgl = date.getDate();
				var nb = date.getMonth() + 1;
				if (nb < 10) {
					bln = '0'+nb;
				} else {
					bln = nb;
				}
				thn = date.getFullYear();
				hari = date.getDay();
				//console.log(tgl, bln, thn)
			},
		});

		selMapel.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Mapel</option>");
		selKelas.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Kelas</option>");

		function reload(mapel, kls) {
			console.log(tgl, bln, thn, kls);
			var empty = tgl===''|| bln==='' || thn==='' || kls==='';
			var newData = '&thn='+thn+'&bln='+bln+'&tgl='+tgl+'&hari='+hari+'&kelas='+kls+'&mapel='+mapel;
			if (!empty && oldData !== newData) {
				oldData = newData;

				$('#loading').removeClass('d-none');

				setTimeout(function() {
					$.ajax({
						url: base_url + 'kelasabsensiharianmapel/loadabsensimapel',
						type:"POST",
						dataType:"json",
						data: form.serialize()+newData,
						success: function(data) {
							createTabelKehadiran(data)
						},
						error: function(xhr, status, error) {
							console.log(xhr.responseText);
						}
					});
				}, 500);
			}
		}

		$("#opsi-tgl").change(function(){
			reload(selMapel.val(), selKelas.val());
		});

		selKelas.change(function(){
			reload(selMapel.val(), $(this).val());
		});

		selMapel.on('change', function () {
			reload($(this).val(), selKelas.val());
		});
	});
</script>
