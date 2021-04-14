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
									<input type='text' id="opsi-tgl" name='tanggal' class='tgl form-control' autocomplete='off' required />
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
	var form;
	var hari = '';
	var tgl = '';
	var bln = '';
	var thn ='';
	var oldData = '';

	function createTabelKehadiran(data) {
		console.log(data);
		var kelas = $("#opsi-kelas option:selected").text();
		var table = '';
		if (data.info == null) {
			table += '<div class="alert alert-default-warning align-content-center" role="alert">Jadwal Pelajaran kelas '+ kelas +' belum diatur</div>';
		} else {
			var totalMapel = data.info.kbm_jml_mapel_hari;
			table = '<table id="tabelsiswa" class="table table-bordered table-striped table-sm">' +
				'<thead>' +
				'<tr>' +
				'<th rowspan="2" width="40" class="text-center align-middle">No</th>' +
				'<th rowspan="2" class="text-center align-middle">N I S</th>' +
				'<th rowspan="2" class="text-center align-middle">Nama</th>' +
				'<th rowspan="2" class="text-center align-middle">Kelas</th>' +
				'<th colspan="'+totalMapel+'" class="text-center align-middle">Kehadiran Jam</th>' +
				'</tr>' +
				'<tr>';

			for (let i = 0; i < totalMapel; i++) {
				var jam = (i+1);
				$.each(data.jadwal, function (k, v) {
					if (v.jam_ke == jam) {
						//console.log(v.jam_ke);
						if (v.nama_mapel != null) {
							table += '<th class="text-center align-middle">'+ v.kode +'</th>';
						} else {
							table += '<th class="text-center align-middle">Mapel</th>';
						}
					}
				});

				$.each(data.istirahat, function (ke, va) {
					if (va.ist == jam) {
						//table += '<th class="text-center align-middle">Ist</th>';
						console.log(va.ist);
					}
				});
			}
			table += '</tr></thead>';

			var no = 1;
			$.each(data.log, function(key, value) {
				table += '<tr>' +
					'<td class="text-center align-middle">'+no+'</td>' +
					'<td class="text-center align-middle">'+value.nis+'</td>' +
					'<td>'+value.nama+'</td>' +
					'<td class="text-center align-middle">'+value.kelas+'</td>';

				for (let k = 0; k < totalMapel-1; k++) {
					if (value.status_materi.length === 0) {
						table += '<td class="text-center align-middle"> - - </td>';
					} else {
						if (typeof value.status_materi[k] === 'undefined') {

						} else {
							for (let l = 0; l < data.jadwal.length; l++) {
								if (value.status_materi[k].kode === data.jadwal[l].kode) {
									table += '<td class="text-center align-middle">'+value.status_materi[k].jam+'</td>';
								} else {
									table += '<td class="text-center align-middle"> - - </td>';
								}
							}
						}
					}
				}

				table += '</tr>';
				no++;
			});

			table += '</table>';
		}
		$('#konten-absensi').html(table);
		$('#loading').addClass('d-none');
	}

	$(document).ready(function() {
		var selKelas = $('#opsi-kelas');
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
			scrollMonth : false,
			scrollInput : false,
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
			},
		});

		//selMateri.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Materi/Tugas</option>");
		selKelas.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Kelas</option>");

		selKelas.change(function(){
			reload($(this).val());
		});


		$("#opsi-tgl").change(function(){
			reload(selKelas.val());
		});

		function reload(kls) {
			console.log(tgl, bln, thn, kls);
			var empty = tgl===''|| bln==='' || thn==='' || kls==='';
			var newData = '&thn='+thn+'&bln='+bln+'&tgl='+tgl+'&hari='+hari+'&kelas='+kls;
			if (!empty && oldData !== newData) {
				oldData = newData;
				$('#loading').removeClass('d-none');

				setTimeout(function() {
					$.ajax({
						url: base_url + 'kelasabsensiharian/loadabsensi',
						type:"POST",
						dataType:"json",
						data: form.serialize()+'&thn='+thn+'&bln='+bln+'&tgl='+tgl+'&hari='+hari+'&kelas='+kls,
						success: function(data) {
							createTabelKehadiran(data);
						},
						error: function(xhr, status, error) {
							console.log(xhr.responseText);
						}
					});
				}, 500);

			}
		}
	});
</script>
