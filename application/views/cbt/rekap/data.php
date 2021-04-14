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
                </div>
                <div class="card-body">
                    <div class="row" id="konten">
                        <?php
                        //echo '<pre>';
                        //echo var_export($rekap_nilai);
                        //echo '<br>';
                        //echo '</pre>';
                        $keyRekap = [];
                        foreach ($rekap_jadwal as $jadwal) {
                            $key = array_search($jadwal->id_jadwal, array_column($rekap_nilai, 'id_jadwal'));
                            isset($rekap_nilai[$key]) ? array_push($keyRekap, $rekap_nilai[$key]->id_jadwal) : null;
                        }

                        for ($i=0;$i<count($rekap_nilai);$i++) {
                            if (in_array($rekap_nilai[$i]->id_jadwal, $keyRekap)) {
                                unset($rekap_nilai[$i]);
                            }
                        }
                        //echo 'setelah unset';
                        //echo '<pre>';
                        //echo var_export($rekap_nilai);
                        //echo '<br>';
                        //echo array_search(11, array_column($rekaps, 'id_jadwal'));
                        //echo '</pre>';

                        $rekapNilai = $rekap_nilai;
                        $rekapJadwal = $rekap_jadwal;
                        $rekaps = array_merge($rekapJadwal, $rekapNilai);

                        if (count($rekaps) === 0) : ?>
                            <?php if (!isset($tp_active) || !isset($smt_active)) : ?>
                                <div class="col-12">
                                    <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                        Tahun Pelajaran atau Semester belum di set
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-12">
                                    <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                        Belum ada jadwal penilaian untuk Tahun Pelajaran <b><?= $tp_active->tahun ?></b>
                                        Semester: <b><?= $smt_active->smt ?></b>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                        <div class="alert alert-default-info align-content-center w-100" role="alert">
                            INFO TABEL PENILAIAN
                            <ul>
                                <li>
                                    Tabel ini berisi Jadwal Ujian dan Bank Soal yang belum dihapus
                                </li>
                                <li>
                                    Lakukan Aksi <b>REKAP NILAI</b> agar nilai hasil siswa bisa diekspor dan diolah
                                </li>
                                <li>
                                    <b>REKAP NILAI</b> berguna untuk membackup nilai siswa agar bisa dibuka kapan saja
                                </li>
                                <li>
                                    <b>REKAP NILAI</b> hanya untuk jadwal penilaian yang sudah dilaksanakan
                                </li>
                                <li>
                                    Jadwal Penilaian yang sudah direkap bisa dihapus di menu <b>Jadwal Ujian</b> atau <b>Bank Soal</b>
                                </li>
                            </ul>
                        </div>

                        <?=$this->session->flashdata('rekapnilai')?>

                        <table class="w-100 table table-sm table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center align-middle p-0">No.</th>
                                    <th>Bank Soal</th>
                                    <th>Jenis</th>
                                    <th>Mapel</th>
                                    <th>Kelas</th>
                                    <th>Pelaksanaan</th>
                                    <th class="text-center align-middle p-0"><span>Nilai</span></th>
                                </tr>
                                </thead>
                                <tbody>

                            <?php
                            $urut = 1;
                            foreach ($rekaps as $jadwal) : ?>
                                <?php

                                $jk = json_decode(json_encode($jadwal->bank_kelas));
                                $jumlahKelas = $jadwal->bank_kelas == "" ? [] : json_decode(json_encode(unserialize($jk)));
                                //$jks = [];

                                $kelasbank = '';
                                $no = 1;
                                $id_kelases = [];
                                if (!empty($jumlahKelas)) {
                                    foreach ($jumlahKelas as $j) {
                                        foreach ($kelases as $k) {
                                            if ($j->kelas_id === $k->id_kelas) {
                                                if ($no > 1) {
                                                    $kelasbank .= ', ';
                                                }
                                                $kelasbank .= $k->nama_kelas;
                                                array_push($id_kelases, ['id'=>$k->id_kelas, 'nama'=>$k->nama_kelas]);
                                                $no++;
                                            }
                                        }
                                    }
                                } else {
                                    array_push($id_kelases, ['id' => 0, 'nama' => '']);
                                }
                                ?>
                            <tr>
                                <td class="text-center"><?=$urut?></td>
                                <td><?= $jadwal->bank_kode ?></td>
                                <td><?= $jadwal->kode_jenis ?></td>
                                <td><?= $jadwal->kode ?></td>
                                <td><?= $kelasbank ?></td>
                                <td><?= singkat_tanggal(date('d M Y', strtotime($jadwal->tgl_mulai))) ?> sd <?= singkat_tanggal(date('d M Y', strtotime($jadwal->tgl_selesai))) ?></td>
                                <td class="text-center">
                                    <?php if (isset($jadwal->rekap)) :
                                        if ($jadwal->rekap == '0') :?>
                                    <button class="btn btn-success btn-sm" onclick="backup(<?= $jadwal->id_jadwal ?>)">REKAP NILAI</button>
                                        <?php else : ?>
                                            <button class="btn btn-primary btn-sm" onclick="backup(<?= $jadwal->id_jadwal ?>)">ULANGI REKAP</button>
                                            <a type="button" class="btn btn-success btn-sm" href="<?= base_url(). 'cbtrekap/olahnilai?jadwal=' .$jadwal->id_jadwal?>">OLAH NILAI</a>
                                    <?php endif;
                                    else : ?>
                                        <a type="button" class="btn btn-success btn-sm" href="<?= base_url(). 'cbtrekap/olahnilai?jadwal=' .$jadwal->id_jadwal?>">OLAH NILAI</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $urut++; endforeach; endif; ?>
                                </tbody>
                            </table>
                    </div>
                </div>
                <div class="overlay d-none" id="loading-atas">
                    <div class="spinner-grow"></div>
                </div>
            </div>

            <div class="card card-default my-shadow mb-4">
				<div class="card-header">
					<h6 class="card-title">Ekspor Semua</h6>
                    <br>
                    <small><i>untuk semua jadwal ujian/ulangan yang sudah direkap</i></small>
				</div>
				<div class="card-body">
					<div class="row">
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Penilaian</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'jenis',
                                    $jenis,
                                    null,
                                    'id="jenis" class="form-control"'
                                ); ?>
                            </div>
                        </div>
						<div class="col-3" id="by-kelas">
							<div class="input-group">
								<div class="input-group-prepend w-30">
									<span class="input-group-text">Kelas</span>
								</div>
								<?php
								echo form_dropdown(
									'kelas',
									$kelas,
									null,
									'id="kelas" class="form-control"'
								); ?>
							</div>
						</div>
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tahun</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'tahun',
                                    $tahuns,
                                    null,
                                    'id="opsi-tahun" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Semester</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'smt',
                                    $semester,
                                    null,
                                    'id="opsi-semester" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Mapel</span>
                                </div>
                                <select name="mapel" id="opsi-mapel" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
					<hr>
					<div class="row d-none" id="info">
						<div class="col-12 mb-3">
                            <div class="float-right">
                                <button type="button" id="rollback" class="btn btn-warning align-text-bottom d-none">
                                    <i class="fa fa-undo ml-1 mr-1"></i> Nilai Asli
                                </button>
                                <button type="button" id="convert" class="btn btn-danger align-text-bottom"
                                        data-toggle="modal" data-target="#perbaikanModal">
                                    <i class="fa fa-star-half-alt ml-1 mr-1"></i> Perbaikan Nilai
                                </button>
                                <!--
                                <button type="button" class="btn btn-default align-text-bottom" onclick="refreshStatus()"
                                        data-toggle="tooltip"
                                        title="Refresh">
                                    <i class="fa fa-sync ml-1 mr-1"></i> Refresh
                                </button>
                                -->
                                <button type="button" id="download-excel" class="btn btn-success align-text-bottom"
                                        data-toggle="tooltip"
                                        title="Download Excel">
                                    <i class="fa fa-file-excel ml-1 mr-1"></i> Ekspor ke Excel
                                </button>
                                <button type="button" id="download-word" class="btn btn-primary align-text-bottom"
                                        data-toggle="tooltip"
                                        title="Download Word">
                                    <i class="fa fa-file-word ml-1 mr-1"></i> Ekspor ke Word
                                </button>
                            </div>
						</div>
					</div>
					<div id="for-export">
                        <!--
                        <p id="title-table" style="text-align: center;font-weight: bold;"></p>
                        <p id="title-mapel" style="text-align: center;font-weight: bold;"></p>
                        -->
						<table class="table-sm" id="table-status" style="font-size: 11pt; width: 100%;" data-cols-width="5,15,35,10">
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
<div class="modal fade" id="perbaikanModal" tabindex="-1" role="dialog" aria-labelledby="perbaikanModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="perbaikanModalLabel">Perbaikan Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nama_sesi" class="col-md-4 col-form-label">Nilai Tertinggi</label>
                    <div class="col-md-8">
                        <input type="text" id="ya" class="form-control" name="ya" value="100"
                               placeholder="Nilai tertinggi yang diinginkan" required>
                        <small>diisi nilai puluhan maksimal 100, misal 80 sampai 100</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_sesi" class="col-md-4 col-form-label">Nilai Terrendah</label>
                    <div class="col-md-8">
                        <input type="text" id="yb" class="form-control" name="yb" value="60"
                               placeholder="Nilai terrendah yang diinginkan" required>
                        <small>diisi nilai puluhan dibawah nilai tertinggi, misal 60</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btn-convert"><i class="fa fa-arrow-right"></i> Konversi
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/jquery.wordexport.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/tableToExcel.js"></script>

<script>
	var printBy = 1;
	var url = '';
    var newData = '';
    var oldData = '';
	var mplSelected = '0';
	var kodeMapel = 'Semua Mapel';

	var dataNilai;
    var nilai_max = 100;//nilai siswa terbesar
    var nilai_min = 0;//nilai siswa terkecil
    var hasil_max = 100;//batas nilai terbesar
    var hasil_min = 60;//batas nilai terkecil

    function sortById(a, b){
        var aID = a.id_mapel.toLowerCase();
        var bID = b.id_mapel.toLowerCase();
        return ((aID < bID) ? -1 : ((aID > bID) ? 1 : 0));
    }

	function refreshStatus() {
		$('#table-status').html('');
		$('#info').addClass('d-none');
		$('#loading').removeClass('d-none');

		setTimeout(function() {
			$.ajax({
				type: "GET",
				url: url,
				success: function (response) {
					console.log('refresh', response);
                    $('#loading').addClass('d-none');
					if (response.siswa.length === 0) {
                        $('#opsi-mapel').html('');
                    } else {
					    dataNilai = response;
                        createPreview(response, false)
                    }
				}
			});
		}, 500);
	}

	function createPreview(data, convert) {
        if (convert) {
            $('#rollback').removeClass('d-none');
            $('#convert').addClass('d-none');
        } else {
            $('#convert').removeClass('d-none');
            $('#rollback').addClass('d-none');
        }
	    var arrMapel = data.info;
        var lookup = {};
        for (var k = 0, len = arrMapel.length; k < len; k++) {
            lookup[arrMapel[k].id] = arrMapel[k];
        }
        var mpl = arrMapel.length > 1 ? 'Semua Mata Pelajaran' : arrMapel[0].nama_mapel;
        //$('#title-mapel').text(mpl);

        if (oldData !== newData) {
            oldData = newData;
            var opsis = '<option value="0" selected="selected">Semua Mapel</option>';
            for (let i = 0; i < arrMapel.length; i++) {
                var selected = mplSelected == arrMapel[i].id_mapel ? 'selected' : '';
                opsis += '<option value="'+arrMapel[i].id_mapel+'" '+selected+'>'+arrMapel[i].kode+'</option>';
            }
            $('#opsi-mapel').html(opsis);
        }

        console.log('mapel', arrMapel);
        var rows = arrMapel.length > 1 ? '2' : '1';
        var namaMpl = arrMapel.length > 1 ? '' : arrMapel[0].nama_mapel;

		var tbody = ' <tr>' +
            '     <td colspan="2" style="width: 120px">Jenis Ujian</td>' +
            '     <td colspan="5">:'+$("#jenis option:selected").text()+'</td>' +
            ' </tr>' +
            ' <tr>' +
            '     <td colspan="2">Mata Pelajaran</td>' +
            '     <td colspan="5">:'+mpl+'</td>' +
            ' </tr>' +
            ' <tr>' +
            '     <td colspan="2">Kelas</td>' +
            '     <td colspan="5">:'+$("#kelas option:selected").text()+'</td>' +
            ' </tr>' +
            ' <tr></tr>' +
			'<tr>' +
            '<th rowspan="'+rows+'" class="text-center align-middle bg-blue" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="width:40px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">No.</th>'+
            '<th rowspan="'+rows+'" class="text-center align-middle bg-blue" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">No. Peserta</th>' +
            '<th rowspan="'+rows+'" class="text-center align-middle bg-blue" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">Nama</th>' +
            '<th colspan="'+arrMapel.length+'" class="text-center align-middle bg-blue" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">Nilai</th>' +
            '<th rowspan="'+rows+'" class="text-center align-middle bg-blue" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">Jumlah</th>' +
            '<th rowspan="'+rows+'" class="text-center align-middle bg-blue" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">Rata-rata</th>' +
            '</tr>';
		if (arrMapel.length > 1) {
            tbody += '<tr>';
            for (let m = 0; m < arrMapel.length; m++) {
                tbody += '<th class="p-1 text-center align-middle bg-blue" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">'+arrMapel[m].kode+'</th>';
            }
            tbody += '</tr>';
        }
		//tbody += '<tbody>';

		var nos = 1;
		$.each(data.siswa, function (i, v) {
            //var disabled = mulai.includes('-') ? 'disabled' : '';
            var jumlahNilai = 0;
            tbody += '<tr>' +
                '<td data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;">'+nos+'</td>' +
                '<td data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;">'+v[0].nomor_peserta+'</td>' +
                '<td data-a-v="middle" data-a-h="left" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse;">'+v[0].nama+'</td>';
            $.each(arrMapel, function (key, val) {
                var nn = data.nilai[i][val.id_mapel];
                var skor = nn == null ? '0' : data.nilai[i][val.id_mapel].nilai_pg;
                var nilai_pg = skor;
                if (convert) {
                    nilai_pg = (((hasil_max - hasil_min) / 100)* parseFloat(skor)) + hasil_min;
                } else {
                    nilai_pg = skor;
                    if (parseFloat(skor) > nilai_max) {
                        nilai_max = parseFloat(skor);
                    }
                    if (parseFloat(skor) < nilai_max) {
                        nilai_min = parseFloat(skor);
                    }
                }
                jumlahNilai += parseFloat(nilai_pg);
                tbody += '<td data-a-v="middle" data-a-h="center" data-b-a-s="thin" class="text-success" style="border: 1px solid black;border-collapse: collapse; text-align: center;"><b>'+ nilai_pg +'</b></td>';
            });
            //'<td class="text-center text-success align-middle"><b>'+skor_pg+'</b></td>';
            //'<td class="text-center text-success align-middle"><b>'+skor_es+'</b></td>';
            //'<td class="text-center align-middle"><b>'+(skor_pg + skor_es)+'</b></td>' +
            tbody += '<td data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse;text-align: center">'+jumlahNilai+'</td>';
            tbody += '<td data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse;text-align: center">'+Math.round(jumlahNilai / arrMapel.length)+'</td>';
            tbody += '</tr>';
            nos +=1;
        });

		//tbody += '</tbody>';
		$('#table-status').html(tbody);
		$('#info').removeClass('d-none');
		$('#loading').addClass('d-none');

		/*
		$('#info-ujian').html('Soal: <b>' + data.info.bank_kode + '</b>, ' + 'Mata Pelajaran: <b>' + data.info.nama_mapel + '</b>, ' +
			'Level Kelas: <b>' + data.info.bank_level + '</b>, ' +
			'Jml Soal PG: <b>' + data.info.tampil_pg + '</b>, ' + 'Jml Soal Essai: <b>' + data.info.tampil_esai + '</b>');
			*/

		console.log(nilai_max, nilai_min);
    }

    function backup(id) {
        $('#loading-atas').removeClass('d-none');
        setTimeout(function() {
            $.ajax({
                url: base_url + "cbtrekap/backupnilai/"+id,
                success: function (data) {
                    //$('#loading-atas').addClass('d-none');
                    //console.log(data);
                    if (data.rekap && data.nilai > 0) {
                        window.location.href = base_url + 'cbtrekap'
                    } else {
                        showDangerToast(data.message);
                    }
                }, error: function (xhr, status, error) {
                    $('#loading-atas').addClass('d-none');
                    console.log(xhr.responseText);
                    showDangerToast('Data error');
                }
            });
        }, 500);
    }

    $('#perbaikanModal').on('show.bs.modal', function (e) {
        $('#ya').val(hasil_max);
        $('#yb').val(hasil_min);
        console.log('show dialog');
    });

    $('#btn-convert').click(function (e) {
        hasil_max = parseInt($('#ya').val());
        hasil_min = parseInt($('#yb').val());
        console.log(hasil_max, hasil_min);
        //console.log(nilai_max, nilai_min);

        $('#perbaikanModal').modal('hide').data('bs.modal', null);
        $('#perbaikanModal').on('hidden', function () {
            $(this).data('modal', null);
        });
        $('#loading').removeClass('d-none');
        createPreview(dataNilai, true);
    });

    $('#rollback').click(function (e) {
        createPreview(dataNilai, false);
    });

    $(document).ready(function () {
		ajaxcsrf();

        $("#flashdata").fadeTo(5000, 500).slideUp(500, function(){
            $("#flashdata").slideUp(500);
        });

		var opsiKelas = $("#kelas");
        var opsiJenis = $('#jenis');
        var opsiTahun = $('#opsi-tahun');
        var opsiSmt = $('#opsi-semester');
        var opsiMapel = $('#opsi-mapel');
        //var title = $('#title-table');

		opsiKelas.prepend("<option value='' selected='selected'>Pilih Kelas</option>");

		function reload(kls, jenis, thn, smt, mpl) {
            var empty = jenis===''|| kls==='' || thn===''|| smt==='' || jenis==null|| kls==null || thn==null|| smt==null;
            var dataPost = 'kelas='+kls+'&jenis='+jenis+'&tahun='+thn+'&smt='+smt+'&mapel='+mpl;
            newData = 'kelas='+kls+'&jenis='+jenis+'&tahun='+thn+'&smt='+smt;

            console.log(dataPost);
			if (!empty) {
				url = base_url + "cbtrekap/getnilaikelas?" + dataPost;
				refreshStatus();
			} else {
				console.log('empty')
			}
		}

		opsiKelas.change(function () {
            var smt = opsiSmt.val()== '1' ? 'I' : (opsiSmt.val()== '2' ? 'II' : '');
            /*
		    title.html('REKAP NILAI '+ $("#jenis option:selected").text()+
                ' KELAS '+$("#kelas option:selected").text()+ '<br>TAHUN PELAJARAN: ' +
                $("#opsi-tahun option:selected").text()+ ' SEMESTER: ' + smt);
                */

            $("#opsi-mapel select").val("0");
            reload($(this).val(), opsiJenis.val(), opsiTahun.val(), opsiSmt.val(), '0');
		});

        opsiJenis.on('change', function () {
            //var smt = opsiSmt.val() == '1' ? 'I' : (opsiSmt.val()== '2' ? 'II' : '');
            var smt = opsiSmt.val();
            /*
            title.html('REKAP NILAI '+ $("#jenis option:selected").text()+
                ' KELAS '+$("#kelas option:selected").text()+ '<br>TAHUN PELAJARAN: ' +
                $("#opsi-tahun option:selected").text()+ ' SEMESTER: ' + smt);
                */
            $("#opsi-mapel select").val("0");
            reload(opsiKelas.val(), $(this).val(), opsiTahun.val(), opsiSmt.val(), '0');
        });

        opsiTahun.change(function(){
            //var smt = opsiSmt.val()== '1' ? 'I' : (opsiSmt.val()== '2' ? 'II' : '');
            var smt = opsiSmt.val();
            /*
            title.html('REKAP NILAI '+ $("#jenis option:selected").text()+
                ' KELAS '+$("#kelas option:selected").text()+ '<br>TAHUN PELAJARAN: ' +
                $("#opsi-tahun option:selected").text()+ ' SEMESTER: ' + smt);
                */
            $("#opsi-mapel select").val("0");
            reload(opsiKelas.val(), opsiJenis.val(), $(this).val(), opsiSmt.val(), '0');
        });

        opsiSmt.on('change', function () {
            //var smt = $(this).val()== '1' ? 'I' : ($(this).val()== '2' ? 'II' : '');
            var smt = this.val();
            /*
            title.html('REKAP NILAI '+ $("#jenis option:selected").text()+
                ' KELAS '+$("#kelas option:selected").text()+ '<br>TAHUN PELAJARAN: ' +
                $("#opsi-tahun option:selected").text()+ ' SEMESTER: ' + smt);
                */
            $("#opsi-mapel select").val("0");
            reload(opsiKelas.val(), opsiJenis.val(), opsiTahun.val(), $(this).val(), '0');
        });

        opsiMapel.on('change', function () {
            mplSelected = $(this).val();
            kodeMapel = $("#opsi-mapel option:selected").text();
            reload(opsiKelas.val(), opsiJenis.val(), opsiTahun.val(), opsiSmt.val(), $(this).val());
        });

        $("#download-word").click(function (event) {
            $("#for-export").wordExport(`REKAP NILAI ${$("#jenis option:selected").text()} ${kodeMapel} ` +
                `Kls_${$("#kelas option:selected").text()} ${$("#opsi-tahun option:selected").text()} ${$("#opsi-semester option:selected").text()}`);
        });

        $("#download-excel").click(function (event) {
            var table = document.querySelector("#table-status");
            //TableToExcel.convert(table);
            TableToExcel.convert(table, {
                name: `REKAP NILAI ${$("#jenis option:selected").text()} ${kodeMapel} ${$("#kelas option:selected").text()} ${$("#opsi-tahun option:selected").text()} ${$("#opsi-semester option:selected").text()}.xlsx`,
                sheet: {
                    name: "Sheet 1"
                }
            });
        });
    })
</script>
