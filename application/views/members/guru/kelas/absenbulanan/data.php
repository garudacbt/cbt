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
										'mapel',
										$mapel,
										null,
										'id="opsi-mapel" class="form-control"'
									); ?>
								</div>
								<div class="col-md-3 mb-2">
									<label>Kelas</label>
									<select id="opsi-kelas" class="form-control"></select>
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
	var arrMapel = JSON.parse('<?= json_encode($mapel)?>');
	var arrKelas = JSON.parse('<?= json_encode($arrkelas)?>');
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
		var mapel = $("#opsi-mapel option:selected").text();
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
			'<th colspan="'+jmlHari+'" class="text-center align-middle">Kehadiran Siswa Mata Pelajaran: '+ mapel +', Bulan: '+ bulan +'</th>' +
			'<th colspan="3" class="text-center align-middle">Jumlah</th>' +
			'</tr>' +
			'<tr>';

		for (let i = 0; i < jmlHari; i++) {
			var tg = (i+1);
			var d = new Date(bln+'/'+tg+'/'+thn);
			var hari = weekday[d.getDay()];

			//console.log(hari);
			if (hari === 'Min') {
				table += '<th class="text-center align-middle" style="background-color:#FF4444">'+ tg +'<br>'+hari+'</th>';
			} else {
				table += '<th class="text-center align-middle">'+ tg +'<br>'+hari+'</th>';
			}
		}
		table += '<th class="text-center align-middle">H</th>' +
			'<th class="text-center align-middle">TL</th>' +
			'<th class="text-center align-middle">TH</th>' +
			'</tr></thead>';

		var no = 1;
		var minggu = 0;
		$.each(data, function(key, value) {
			table += '<tr>' +
				'<td class="text-center align-middle">'+no+'</td>' +
				'<td class="text-center align-middle">'+value.nis+'</td>' +
				'<td>'+value.nama+'</td>' +
				'<td class="text-center align-middle">'+value.kelas+'</td>';

			minggu = 0;
			for (let i = 0; i < jmlHari; i++) {
				var tg = (i+1);
				var d = new Date(bln+'/'+tg+'/'+thn);
				var hari = weekday[d.getDay()];
				if (hari === 'Min') {
					minggu ++;
					table += '<td class="text-center align-middle" style="background-color:#FF4444">-</td>';
				} else {
					if (value.status[i] == null) {
						table += '<td class="text-center align-middle">-</td>';
					} else {
						var jm = value.status[i] != null || value.status[i].jam_materi != null ? value.status[i].jam_materi : (value.status[i] != null ? value.status[i].jam_tugas : '-');
						table += '<td class="text-center align-middle">'+ jm +'</td>';
					}
				}
			}

			table += '<td class="text-center align-middle">'+ value.hadir +'</td>' +
				'<td class="text-center align-middle">'+ value.telat +'</td>' +
				'<td class="text-center align-middle">'+ (value.tdk_hadir-minggu) +'</td>' +
				'</tr>';

			no++;
		});

		table += '</table>';
		$('#konten-absensi').html(table);
	}

	$(document).ready(function() {
		var selKelas = $('#opsi-kelas');
		var selMapel = $('#opsi-mapel');
		var selTahun = $('#opsi-tahun');
		var selBulan = $('#opsi-bulan');
		form = $('#formselect');

		bln = selBulan.val();
		thn = selTahun.val();

		selMapel.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Mapel</option>");
		selKelas.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Kelas</option>");

		function reload(mapel, kls, bln, thn) {
			console.log(bln, thn, kls);
			var empty = bln==='' || thn==='' || kls==='' || bln==null || thn==null || kls==null;
			var newData = '&thn='+thn+'&bln='+bln+'&kelas='+kls+'&mapel='+mapel;
			if (!empty && oldData !== newData) {
				oldData = newData;
				$.ajax({
					url: base_url + 'kelasabsensibulanan/loadabsensimapel',
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

		function selectKelas(idMapel) {
			selKelas.html('');
			selKelas.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Kelas</option>");
			console.log(arrKelas[idMapel]);

			var arr = arrKelas[idMapel];
			for (let k = 0; k < arr.length; k++) {
				if (arr[k].id_kelas != null) {
					selKelas.append('<option value="'+arr[k].id_kelas+'">'+arr[k].nama_kelas+'</option>');
				}
			}
		}

		selMapel.on('change', function () {
			selectKelas($(this).val());
			reload($(this).val(), selKelas.val(), selBulan.val(), selTahun.val());
		});

		selKelas.change(function(){
			reload(selMapel.val(), $(this).val(), selBulan.val(), selTahun.val());
		});

		selBulan.change(function(){
			bln = $(this).val();
			reload(selMapel.val(), selKelas.val(), $(this).val(), selTahun.val());
		});

		selTahun.change(function(){
			thn = $(this).val();
			reload(selMapel.val(), selKelas.val(), selBulan.val(), $(this).val());
		});

		reload(selMapel.val(), selKelas.val(), selBulan.val(), selTahun.val());
	});
</script>
