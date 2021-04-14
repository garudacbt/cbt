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
				</div>
				<div class="card-body">
					<?php
					//echo '<pre>';
					//var_dump($arrkelas);
					//echo '</pre>';
					?>
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
									<select id="opsi-kelas" class="form-control"></select>
								</div>
                                <div class="col-md-3 mb-2">
                                    <label>Tipe</label>
                                    <select id="opsi-tipe" class="form-control">
                                        <option value='' selected='selected' disabled='disabled'>Pilih Tipe</option>
                                        <option value='1'>Per-Kelas</option>
                                        <option value='2'>Per-Siswa</option>
                                    </select>
                                </div>
							</div>
                            <hr>
                            <div class="card border border-primary shadow">
                                <div class="card-header alert-default-primary">
                                    <h3 class="card-title">Catatan Perkelas</h3>
                                    <button id="create-note" type="button" class="card-tools btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#daftarModal" disabled="">
                                        <i class="fa fa-plus"></i> <span class="ml-1">Buat Catatan Kelas</span>
                                    </button>
                                </div>
                                <div class="card-body p-0">
                                    <div id="konten-catatankelas">
                                        <p class="p-4">Pilih mapel dan Kelas</p>
                                    </div>
                                </div>
                                <div class="overlay d-none">
                                    <div class="spinner-grow"></div>
                                </div>
                            </div>
                            <div class="card border border-success shadow">
                                <div class="card-header alert-default-success">
                                    <h3 class="card-title">Catatan Persiswa</h3>
                                </div>
                                <div class="card-body p-0">
                                    <div id="konten-catatansiswa">
                                        <p class="p-4">Pilih mapel dan Kelas</p>
                                    </div>
                                </div>
                                <div class="overlay d-none">
                                    <div class="spinner-grow"></div>
                                </div>
                            </div>
						</div>
					</div>
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
            <?= form_open('', array('id' => 'formcatatan')) ?>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis</label>
                                <?php
                                $arrLevel = [1=>'Saran',2=>'Teguran',3=>'Peringatan',4=>'Sangsi'];
                                echo form_dropdown(
                                    'level',
                                    $arrLevel,
                                    null,
                                    'class="select2 form-control" data-placeholder="Pilih Jenis" required'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea style="min-height: 200px" class="form-control" name="text" id="input_text" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_mapel" id="input-mapel">
                <input type="hidden" name="id_kelas" id="input-kelas">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
	var kelas = JSON.parse('<?= json_encode($kelas)?>');
	var arrMapel = JSON.parse('<?= json_encode($mapel)?>');
	var arrKelas = JSON.parse('<?= json_encode($arrkelas)?>');
	var form;
	var oldData = '';

	function createTabelCatatanKelas(data) {
		console.log(data);
		var table = '';
        $('#konten-catatankelas').html(table);

		table = '<table class="table table-striped table-bordered table-hover table-sm">' +
            '<thead>' +
            '<tr>' +
            '<th width="50" height="50" class="text-center p-0 align-middle">No.</th>' +
            '<th class="text-center p-0 align-middle p-0">Tanggal</th>' +
            '<th class="text-center p-0 align-middle">Jenis</th>' +
            '<th class="text-center p-0 align-middle">Catatan</th>' +
            '<th class="text-center p-0 align-middle">Keterangan</th>' +
            '<th class="text-center p-0 align-middle">Aksi</th>' +
            '</tr>' +
            '</thead>' +
            '<tbody>';

		if (data.kelas.length > 0) {
            var no = 1;
            var arrLvl = ['Tidak ada', 'Saran', 'Teguran', 'Peringatan', 'Sangsi'];
            $.each(data.kelas, function(key, value) {
                table += '<tr>' +
                    '<td class="text-center">' + no + '</td>' +
                    '<td class="text-center">' + value.tgl + '</td>' +
                    '<td class="text-center">' + arrLvl[value.level] + '</td>' +
                    '<td>' + value.text + '</td>' +
                    '<td width="100" class="text-center">' +
                    '<button type="button" class="btn btn-sm btn-success">' +
                    value.jml + ' siswa membaca' +
                    '</button>' +
                    '</td>' +
                    '<td width="100" class="text-center">' +
                    '    <button type="button" class="btn btn-sm btn-danger" data-id="'+value.id_catatan+'" onclick="hapus(this)">' +
                    '        <i class="fa fa-trash"></i> <span class="ml-1">Hapus</span>' +
                    '    </button>' +
                    '</td>' +
                    '</tr>';
                no++;
            });
        } else {
		    table += '<tr>' +
            '<td colspan="6" class="text-center">Belum ada catatan</td>' +
            '</tr>';
        }

        table +='</tbody></table>';
		$('#konten-catatankelas').html(table);
		$('#create-note').removeAttr('disabled');
	}

    function createTabelCatatanSiswa(data) {
        var selKelas = $('#opsi-kelas');
        var selMapel = $('#opsi-mapel');
        console.log(data);
        var table = '';
        $('#konten-catatansiswa').html(table);

        table = '<table class="table table-striped table-bordered table-hover table-sm">' +
            '    <thead>' +
            '    <tr>' +
            '        <th width="50" height="50" class="text-center p-0 align-middle">No.</th>' +
            '        <th class="text-center p-0 align-middle">NIS</th>' +
            '        <th class="text-center p-0 align-middle p-0">Nama</th>' +
            '        <th class="text-center p-0 align-middle">Catatan</th>' +
            '    </tr>' +
            '    </thead>' +
            '    <tbody>';

        var no = 1;
        $.each(data.siswa, function(key, value) {
            table += '<tr>' +
                '<td class="text-center">' + no + '</td>' +
                '<td class="text-center">' + value.nis + '</td>' +
                '<td>' + value.nama + '</td>' +
                '<td class="text-center">' +
                '<button onclick="loadCatatanSiswa('+value.id_siswa+')" class="btn btn-xs btn-success">' + value.jml_catatan + ' catatan</button>' +
                '</td>' +
                '</tr>';
            no++;
        });

        table +='</tbody></table>';
        $('#konten-catatansiswa').html(table);
    }

    function loadCatatanSiswa(id) {
	    window.location.href = base_url +'kelascatatan/siswa?id_siswa='+id+'&id_mapel='+ $('#opsi-mapel').val() +'&id_kelas='+ $('#opsi-kelas').val();
    }

    function hapus(data) {
        var idCatatan = $(data).data('id');
        console.log(idCatatan);

        swal.fire({
            title: "Hapus Catatan?",
            text: "Catatan ini akan dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'kelascatatan/hapus/' + idCatatan,
                    method: "GET",
                    success: function (respon) {
                        console.log(respon);
                        if (respon) {
                            reload($('#opsi-mapel').val(), $('#opsi-kelas').val(), $('#opsi-tipe').val(), true);
                        } else {
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa menghapus catatan",
                                icon: "error"
                            });
                        }
                    },
                    error: function (xhr, error, status) {
                        console.log(xhr.responseText);
                        swal.fire({
                            title: "Gagal",
                            text: "Tidak bisa menghapus catatan",
                            icon: "error"
                        });
                    }
                });
            }
        });
    }

    function reload(mapel, kls, tipe, force) {
        //var empty = mapel===''|| kls==='' || tipe==='' || mapel===null || kls===null || tipe===null;
        //var newData = '&kelas='+kls+'&mapel='+mapel+'&tipe='+tipe;
        var empty = mapel===''|| kls==='' || mapel===null || kls===null;
        var newData = '&kelas='+kls+'&mapel='+mapel;
        var sameData = oldData === newData;
        if (force) {
            sameData = false;
        }
        console.log('reload',empty);
        if (!empty && !sameData) {
            oldData = newData;
            $('.overlay').removeClass('d-none');
            $.ajax({
                url: base_url + 'kelascatatan/loadcatatan',
                type:"POST",
                dataType:"json",
                cache: false,
                data: form.serialize()+newData,
                success: function(data) {
                    console.log(data);
                    createTabelCatatanKelas(data);
                    createTabelCatatanSiswa(data);
                    $('.overlay').addClass('d-none');
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }
    }

    $(document).ready(function() {
		var selKelas = $('#opsi-kelas');
		var selMapel = $('#opsi-mapel');
        var selTipe = $('#opsi-tipe');
		form = $('#formselect');

		console.log(arrKelas);

		selMapel.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Mapel</option>");
		selKelas.prepend("<option value='' selected='selected' disabled='disabled'>Pilih Kelas</option>");

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

        selKelas.change(function(){
            reload(selMapel.val(), $(this).val(), selTipe.val(), false);
        });

        selMapel.on('change', function () {
			selectKelas($(this).val());
			reload($(this).val(), selKelas.val(), selTipe.val(), false);
		});

        //selTipe.change(function(){
        //    reload(selMapel.val(), selKelas.val(), $(this).val());
        //});

        $('#daftarModal').on('show.bs.modal', function (e) {
            var kelas = $("#opsi-kelas option:selected").text();
            $('#daftarLabel').text('Catatan Untuk Kelas ' + kelas);
            $('#input-mapel').val(selMapel.val());
            $('#input-kelas').val(selKelas.val());
        });

        $('#formcatatan').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());

            $.ajax({
                url: base_url + "kelascatatan/savecatatankelas",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log("result", data);
                    $('#daftarModal').modal('hide').data('bs.modal', null);
                    $('#daftarModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });

                    if (data) {
                        swal.fire({
                            title: "Sukses",
                            text: "Catatan berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                reload(selMapel.val(), selKelas.val(), selTipe.val(), true);
                            }
                        });
                    } else {
                        swal.fire({
                            title: "ERROR",
                            text: "Catatan Tidak Tersimpan",
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    $('#daftarModal').modal('hide').data('bs.modal', null);
                    $('#daftarModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });
                    console.log("error", xhr.responseText);
                    swal.fire({
                        title: "ERROR",
                        text: "Catatan Tidak Tersimpan",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            });
        });

    });
</script>
