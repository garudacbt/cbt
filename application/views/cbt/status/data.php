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
                    <!--
                        <div id="selector" class="card-tools btn-group">
                            <button type="button" class="btn active btn-primary">By Kelas</button>
                            <button type="button" class="btn btn-outline-primary">By Ruang</button>
                        </div>
                    -->
                    </div>
				<div class="card-body">
					<div class="row">
						<div class="col-6 col-md-3">
							<div class="input-group">
								<div class="input-group-prepend w-30">
									<span class="input-group-text">Jadwal</span>
								</div>
								<?php
								echo form_dropdown(
									'jadwal',
									$jadwal,
									null,
									'id="jadwal" class="form-control"'
								); ?>
							</div>
						</div>
						<div class="col-6 col-md-3" id="by-kelas">
							<div class="input-group">
								<div class="input-group-prepend w-30">
									<span class="input-group-text">Kelas</span>
								</div>
                                <select name="kelas" id="kelas" class="form-control">
                                </select>
							</div>
						</div>
						<div class="col-3 d-none" id="by-ruang">
							<div class="input-group">
								<div class="input-group-prepend w-30">
									<span class="input-group-text">Ruang</span>
								</div>
								<?php
								echo form_dropdown(
									'ruang',
									$ruang,
									null,
									'id="ruang" class="form-control"'
								); ?>
							</div>
						</div>
						<div class="col-3 d-none">
							<div class="input-group">
								<div class="input-group-prepend w-30">
									<span class="input-group-text">Sesi</span>
								</div>
								<?php
								echo form_dropdown(
									'sesi',
									$sesi,
									null,
									'id="sesi" class="form-control"'
								); ?>
							</div>
						</div>
					</div>
					<hr>
					<div class="row d-none" id="info">
						<div class="col-12">
							<div class="alert alert-default-info border-info">
								<h5><i class="icon fas fa-check"></i> Info Ujian</h5>
								<div id="info-ujian"></div>
							</div>
						</div>
                        <div class="col-12">
                            <button type="button" class="btn btn-success align-bottom mb-2"
                                    onclick="refreshStatus()"
                                    data-toggle="tooltip"
                                    title="Refresh">
                                <i class="fa fa-sync ml-1 mr-1"></i> Refresh
                            </button>
                        </div>
					</div>
					<div>
						<table class="table table-bordered table-sm" id="table-status">
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

<?=form_open('', array('id'=>'reset'))?>
<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetLabel">Reset Waktu Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="icheck-success">
                        <input class="radio" type="radio" name="reset" id="reset1" value="1">
                        <label for="reset1">Reset Waktu dari awal</label>
                    </div>
                    <div class="icheck-success">
                        <input class="radio" type="radio" name="reset" id="reset2" value="2">
                        <label for="reset2">Lanjutkan sisa waktu</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">OK</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
            </div>
        </div>
    </div>
</div>
<?=form_close()?>

<script>
	var printBy = 1;
	var url = '';

	var kelas;
	var jadwal;

	function paksaSelesai(id) {
        var idSiswa = $(`#paksa-${id}`).attr('data-siswa');
        var idJadwal = $(`#paksa-${id}`).attr('data-jadwal');

        console.log('siswa:' + idSiswa, 'jadwal:' + idJadwal);

        swal.fire({
            title: "Selesaikan",
            text: "Paksa selesaikan ujian?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Selesaikan!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + "siswaview/selesaiujian/" + idSiswa+'/'+idJadwal,
                    type: 'GET',
                    success: function (data) {
                        console.log(data.status);
                        url = base_url + "cbtstatus/getsiswakelas?kelas=" + kelas + '&jadwal=' + jadwal;
                        refreshStatus();
                    }, error: function (xhr, status, error) {
                        console.log('error');
                    }
                });
            }
        });
    }

	function ulangiSiswa(id) {
        var idSiswa = $(`#ulangi-${id}`).attr('data-siswa');
        var idJadwal = $(`#ulangi-${id}`).attr('data-jadwal');
        var idBank = $(`#ulangi-${id}`).attr('data-bank');

        console.log('jadwal:' + idSiswa +idJadwal, 'bank:' + idBank);

        swal.fire({
            title: "Mengulang",
            text: "Ulangi ujian siswa terpilih?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ulangi"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + "siswaview/ulangiujian/" + idSiswa+''+idJadwal + "/" + idBank,
                    type: 'GET',
                    success: function (data) {
                        console.log(data);
                        url = base_url + "cbtstatus/getsiswakelas?kelas=" + kelas + '&jadwal=' + jadwal;
                        refreshStatus();
                    }, error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
	}

	function refreshStatus() {
		$('#loading').removeClass('d-none');
		setTimeout(function () {
			$.ajax({
				type: "GET",
				url: url,
				success: function (response) {
					console.log(response);
					createPreview(response)
				}
			});
		}, 500);
	}

	function createPreview(data) {
		var tbody = '<thead class="alert-primary">' +
			'<tr>' +
			'<th rowspan="2" class="text-center align-middle" width="40">No.</th>' +
			'<th rowspan="2" class="text-center align-middle" width="100">No. Peserta</th>' +
			'<th rowspan="2" class="text-center align-middle">Nama</th>' +
            '<th rowspan="2" class="text-center align-middle">Ruang</th>' +
            '<th rowspan="2" class="text-center align-middle">Sesi</th>' +
			'<th colspan="4" class="text-center align-middle">Status</th>' +
			'<th rowspan="2" class="text-center align-middle">Aksi</th>' +
			'</tr>' +
			'<tr>' +
			'<th class="text-center align-middle p-1">Mulai</th>' +
			'<th class="text-center align-middle">Benar</th>' +
			'<th class="text-center align-middle">Salah</th>' +
			'<th class="text-center align-middle">Durasi</th>' +
			'</tr></thead><tbody>';

		for (let i = 0; i < data.siswa.length; i++) {
			var idSiswa = data.siswa[i].id_siswa;
			var durasi = data.durasi[idSiswa].dur != null ? data.durasi[idSiswa].dur.lama_ujian + ' m' : ' - -';

			var jawaban = data.durasi[idSiswa].jawab;
			var benar = 0;
			var salah = 0;
			for (let j = 0; j < jawaban.length; j++) {
				if (jawaban[j] != null && jawaban[j].jawaban_siswa != null) {
					if (jawaban[j].jawaban_siswa.toUpperCase() === jawaban[j].jawaban_benar.toUpperCase()) {
						benar += 1;
					} else {
						salah += 1;
					}
				}
			}

			var logging = data.durasi[idSiswa].log;
			var mulai = '- -  :  - -';
			var selesai = '- -  :  - -';
			for (let k = 0; k < logging.length; k++) {
				if (logging[k].log_type === '1') {
					if (logging[k] != null) {
						var t = logging[k].log_time.split(/[- :]/);
						//var d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
						mulai = t[3] + ':' + t[4];
					}
				} else {
					if (logging[k] != null) {
						var ti = logging[k].log_time.split(/[- :]/);
						selesai = ti[3] + ':' + ti[4];
					}
				}
			}

			var reset = data.durasi[idSiswa].dur != null ? data.durasi[idSiswa].dur.reset : '0';
            var belumUjian = data.durasi[idSiswa].dur == null;
            var sudahSelesai = !belumUjian && data.durasi[idSiswa].dur.selesai != null;
            var loading = belumUjian ? '' : (sudahSelesai ? "" : '<i class="fa fa-spinner fa-spin mr-2"></i>');

            var disabledReset = !sudahSelesai && !belumUjian && reset === '0' ? '' : 'disabled';
            var disabledUlang = belumUjian ? 'disabled' : (sudahSelesai ? '' : 'disabled');

            var sesi = data.siswa[i].kode_sesi;
            var ruang = data.siswa[i].kode_ruang;

            tbody += '<tr>' +
				'<td class="text-center align-middle">' + (i + 1) + '</td>' +
				'<td class="text-center align-middle">' + data.siswa[i].nomor_peserta + '</td>' +
				'<td class="align-middle">' + data.siswa[i].nama + '</td>' +
                '<td class="text-center align-middle">' + ruang + '</td>' +
                '<td class="text-center align-middle">' + sesi + '</td>' +
				'<td class="text-center align-middle">' + mulai + '</td>' +
				'<td class="text-center text-success align-middle"><b>' + benar + '</b></td>' +
				'<td class="text-center text-danger align-middle"><b>' + salah + '</b></td>' +
				'<td class="text-center align-middle">' + loading + durasi + '</td>' +
				'<td class="text-center align-middle">' +
				'	<button type="button" class="btn btn-xs bg-fuchsia mb-1" ' +
                'data-siswa="'+idSiswa+'" data-jadwal="'+data.info.id_jadwal+'" ' +
                'data-toggle="modal" data-target="#resetModal" '+disabledReset+'>Reset</button>' +
				'	<button id="paksa-'+idSiswa+'" type="button" class="btn btn-xs bg-orange mb-1" ' +
                'data-siswa="'+idSiswa+'" data-jadwal="'+data.info.id_jadwal+'" onclick="paksaSelesai('+idSiswa+')" '+disabledReset+'>Selesaikan</button>' +
				'	<button id="ulangi-'+idSiswa+'" type="button" class="btn btn-xs bg-maroon mb-1" ' +
                'data-bank="'+data.info.id_bank+'" data-siswa="'+idSiswa+'" data-jadwal="'+data.info.id_jadwal+'" onclick="ulangiSiswa('+idSiswa+')" '+disabledUlang+'>Ulangi</button>' +
                //'	<a type="button" class="ml-3 btn btn-xs bg-success mb-1" href="'+base_url+'cbtstatus/detail?siswa='+idSiswa+'&jadwal='+data.info.id_jadwal+'">Detail</a>' +
                '</td>' +
				'</tr>';
		}

		tbody += '</tbody>';
		$('#table-status').html(tbody);
		$('#info').removeClass('d-none');

		var infoJadwal = '<div class="row">' +
            '<div class="col-4 col-md-2">Bank Soal</div>' +
            '<div class="col-8 col-md-4">' +
            '<b>'+data.info.bank_kode+'</b>' +
            '</div>' +
            '<div class="col-4 col-md-2">Mata Pelajaran</div>' +
            '<div class="col-8 col-md-4">' +
            '<b>'+data.info.nama_mapel+'</b>' +
            '</div>' +
            '<div class="col-4 col-md-2">Guru</div>' +
            '<div class="col-8 col-md-4">' +
            '<b>'+data.info.nama_guru+'</b>' +
            '</div>' +
            '<div class="col-4 col-md-2">Level Kelas</div>' +
            '<div class="col-8 col-md-4">' +
            '<b>'+data.info.bank_level+'</b>' +
            '</div>' +
            '<div class="col-4 col-md-2">Jumlah PG</div>' +
            '<div class="col-8 col-md-4">' +
            '<b>'+data.info.tampil_pg+'</b>' +
            '</div>' +
            '<div class="col-4 col-md-2">Jumlah Essai</div>' +
            '<div class="col-8 col-md-4">' +
            '<b>'+data.info.tampil_esai+'</b>' +
            '</div>' +
            '</div>';

		$('#info-ujian').html(infoJadwal);
		$('#loading').addClass('d-none');
	}

    function getDetailJadwal(idJadwal) {
        $.ajax({
            type: "GET",
            url: base_url + "cbtstatus/getjadwalujianbyjadwal?id_jadwal="+idJadwal,
            cache: false,
            success: function (response) {
                console.log(response);
                var selKelas = $('#kelas');
                selKelas.html('');
                selKelas.append('<option value="">Pilih Kelas</option>');
                $.each(response, function (k, v) {
                    if (v != null) {
                        selKelas.append('<option value="'+k+'">'+v+'</option>');
                    }
                });
            }
        });
    }

    $(document).ready(function () {
		ajaxcsrf();

		var opsiJadwal = $("#jadwal");
		var opsiRuang = $("#ruang");
		var opsiSesi = $("#sesi");
		var opsiKelas = $("#kelas");

		opsiJadwal.prepend("<option value='' selected='selected'>Pilih Jadwal</option>");
		opsiRuang.prepend("<option value='' selected='selected'>Pilih Ruang</option>");
		opsiSesi.prepend("<option value='' selected='selected'>Pilih Sesi</option>");
		opsiKelas.prepend("<option value='' selected='selected'>Pilih Kelas</option>");

		function loadSiswaRuang(ruang, sesi, jadwal) {
			var empty = ruang === '' || sesi === '' || jadwal === '';
            //var empty = ruang === '' || jadwal === '';
            if (!empty) {
				url = base_url + "cbtstatus/getsiswaruang?ruang=" + ruang + '&sesi=' + sesi + '&jadwal=' + jadwal;
				refreshStatus();
			} else {
				console.log('empty')
			}
		}

		function loadSiswaKelas(kelas, jadwal) {
            var empty = kelas === '' || jadwal === '';
			if (!empty) {
				//url = base_url + "cbtstatus/getsiswakelas?kelas=" + kelas + '&sesi=' + sesi + '&jadwal=' + jadwal;
                url = base_url + "cbtstatus/getsiswakelas?kelas=" + kelas + '&jadwal=' + jadwal;
				refreshStatus();
			} else {
				console.log('empty')
			}
		}

		opsiKelas.change(function () {
		    kelas = $(this).val();
		    jadwal = opsiJadwal.val();
			loadSiswaKelas(kelas, jadwal)
		});

		opsiRuang.change(function () {
			loadSiswaRuang($(this).val(), opsiSesi.val(), opsiJadwal.val())
		});

		opsiJadwal.change(function () {
		    getDetailJadwal($(this).val());
		    /*
			if (printBy === 1) {
				loadSiswaKelas(opsiKelas.val(), opsiSesi.val(), $(this).val())
			} else {
				loadSiswaRuang(opsiRuang.val(), opsiSesi.val(), $(this).val())
			}*/
		});

		$('#selector button').click(function () {
			$(this).addClass('active').siblings().addClass('btn-outline-primary').removeClass('active btn-primary');

			if (!$('#by-kelas').is(':hidden')) {
				$('#by-kelas').addClass('d-none');
				$('#by-ruang').removeClass('d-none');
				printBy = 2;
			} else {
				$('#by-kelas').removeClass('d-none');
				$('#by-ruang').addClass('d-none');
				printBy = 1;
			}
		});

        var idSiswa = '';
        var idJadwal = '';
            $('#resetModal').on('show.bs.modal', function (e) {
            idSiswa = $(e.relatedTarget).data('siswa');
            idJadwal = $(e.relatedTarget).data('jadwal');

            console.log('siswa:' + idSiswa, 'jadwal:' + idJadwal);
            //$(e.currentTarget).find('input[id="namaEdit"]').val(nama);
            //$(e.currentTarget).find('input[id="kodeEdit"]').val(kode);
        });

        $('#reset').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            $('#resetModal').modal('hide').data('bs.modal', null);
            $('#resetModal').on('hidden', function () {
                $(this).data('modal', null);
            });

            $.ajax({
                url: base_url + "siswaview/resettimer",
                type: 'POST',
                data: $(this).serialize() + '&id_durasi=' + idSiswa+''+idJadwal,
                success: function (data) {
                    console.log(data.status);
                }, error: function (xhr, status, error) {
                    console.log('error');
                }
            });

        });
    })
</script>
