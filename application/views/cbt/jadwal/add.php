<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 14/07/20
 * Time: 17:46
 */
?>

<div class="content-wrapper bg-white pt-4">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-6">
					<h1><?= $judul ?></h1>
				</div>
				<div class="col-6">
					<a href="<?= base_url('cbtjadwal') ?>" type="button" class="btn btn-sm btn-danger float-right">
						<i class="fas fa-arrow-circle-left"></i><span
							class="d-none d-sm-inline-block ml-1">Kembali</span>
					</a>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<?= form_open('create', array('id' => 'create')) ?>
			<div class="card my-shadow">
				<div class="card-header">
					<div class="card-title">
						<h6>Edit Jadwal</h6>
					</div>
					<div class="card-tools">
						<input type="hidden" id="id-jadwal" name='id_jadwal' value="<?=$jadwal->id_jadwal?>" class='form-control d-none'/>
						<button name='tambahjadwal' class='btn btn-success btn-sm'><i class='fa fa-check'></i> Simpan
						</button>
					</div>
				</div>
				<div class="card-body">
                    <?php
                    //var_dump($jadwal->id_mapel);
                    $disabled_option = $disable_opsi ? 'disabled="disabled"' : '';
                    ?>
					<div class="row">
                        <div class="col-md-5 mb-3">
                            <label>Mata Pelajaran</label>
                            <?php
                            echo form_dropdown(
                                'mapel',
                                $mapel,
                                isset($jadwal->id_mapel) ? $jadwal->id_mapel : '',
                                $disabled_option.' id="id-mapel" class="form-control form-control-sm" required'
                            ); ?>
                        </div>
						<div class="col-md-5 mb-3 d-none">
							<label>Guru</label>
							<?php
							echo form_dropdown(
								'guru',
								is_array($guru) ? $guru : [$guru->id_guru => $guru->nama_guru],
								isset($jadwal->bank_guru_id) ? $jadwal->bank_guru_id : '',
								$disabled_option.' id="id-guru" class="form-control form-control-sm" required'
							); ?>
						</div>
						<div class="col-md-4 mb-3">
							<label>Bank Soal</label>
							<select <?=$disabled_option?> name="bank_id" id="bank-id" class="form-control form-control-sm" required=""></select>
						</div>
						<div class="col-md-3 mb-3">
							<label>Jenis</label>
							<?php
							echo form_dropdown(
								'jenis_id',
								$jenis,
								$jadwal->id_jenis,
								$disabled_option.' id="jenis-id" class="form-control form-control-sm" required'
							); ?>
						</div>
						<div class='col-5 col-md-3 mb-3'>
							<label>Tanggal Mulai</label>
							<input type='text' id="tgl-mulai" name='tgl_mulai' value="<?=$jadwal->tgl_mulai?>"
								   class='tgl form-control form-control-sm' autocomplete='off' required='true'/>
						</div>
						<div class='col-5 col-md-3 mb-3'>
							<label>Tanggal Expired</label>
							<input type='text' id="tgl-selesai" name='tgl_selesai' value="<?=$jadwal->tgl_selesai?>"
								   class='tgl form-control form-control-sm'
								   autocomplete='off' required='true'/>
						</div>
						<div class='col-2 col-md-2 mb-3'>
							<div class='form-group'>
								<label>Durasi (menit)</label>
								<input type='number' id="durasi-ujian" name='durasi_ujian'
									   class='form-control form-control-sm' value="<?=$jadwal->durasi_ujian?>"
									   required='true'/>
							</div>
						</div>

					</div>

					<div class='form-group'>
						<div class='row'>
							<div class="col-md-8">
								<div class="row">
									<div class='col-6'>
										<div class="icheck-cyan">
											<input type='checkbox' id="check-soal" name='acak_soal' value='1' <?=$jadwal->acak_soal == 1 ? 'checked="checked"' : ''?> <?=$disabled_option?>/>
											<label for="check-soal">Acak Soal</label>
										</div>
									</div>
									<div class='col-6'>
										<div class="icheck-cyan">
											<input type='checkbox' id="check-opsi" name='acak_opsi' value='1' <?=$jadwal->acak_opsi == 1 ? 'checked="checked"' : ''?> <?=$disabled_option?>/>
											<label for="check-opsi">Acak Jawaban</label>
										</div>
									</div>
									<div class='col-6'>
										<div class="icheck-cyan">
											<input type='checkbox' id="check-token" name='token' value='1' <?=$jadwal->token === '1' ? 'checked="checked"' : ''?> <?=$disabled_option?>/>
											<label for="check-token">Gunakan Token</label>
										</div>
									</div>
									<div class='col-6'>
										<div class="icheck-cyan">
											<input type='checkbox' id="check-hasil" name='hasil_tampil' value='1' <?=$jadwal->hasil_tampil === '1' ? 'checked="checked"' : ''?> <?=$disabled_option?>/>
											<label for="check-hasil">Tampilkan Hasil</label>
										</div>
									</div>
									<div class='col-6'>
										<div class="icheck-cyan">
											<input type='checkbox' id="check-login" name='reset_login' value='1' <?=$jadwal->reset_login === '1' ? 'checked="checked"' : ''?> <?=$disabled_option?>/>
											<label for="check-login">Reset Login</label>
										</div>
									</div>
									<div class='col-6'>
                                        <div class="icheck-cyan">
											<input type='checkbox' id="check-status" name='status' value='1' <?=$jadwal->status === '1' ? 'checked="checked"' : ''?> <?=$disabled_option?>/>
											<label for="check-status">Aktif</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</section>
</div>

<script>
    var digunakan = <?= $disable_opsi ? '1' : '0' ?>;
	var idBank = '<?=$jadwal->id_bank?>';
	$(document).ready(function () {
        ajaxcsrf();
        console.log('used',digunakan);

        var selMapel = $('#id-mapel');
        var selec = idBank == '' ? 'selected' : '';
        selMapel.prepend('<option value="0" '+selec+'>Pilih Mata Pelajaran</option>');
        var selBank = $('#bank-id');

		$('.select2').select2();
		$('.tgl').datetimepicker({
			icons:
				{
					next: 'fa fa-angle-right',
					previous: 'fa fa-angle-left'
				},
			timepicker: false,
			format: 'Y-m-d',
            disabledWeekDays: [0],
			widgetPositioning: {
				horizontal: 'left',
				vertical: 'bottom'
			}
		});

		function reEnable(disable) {
            if (digunakan == '1') {
                $('#id-guru').attr('disabled', disable);
                $('#bank-id').prop('disabled', disable);
                $('#jenis-id').prop('disabled', disable);
                $('#check-soal').prop('disabled', disable);
                $('#check-opsi').prop('disabled', disable);
                $('#check-token').prop('disabled', disable);
                $('#check-hasil').prop('disabled', disable);
                $('#check-login').prop('disabled', disable);
                $('#check-status').prop('disabled', disable);
            }
        }

		$('#create').submit('click', function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			reEnable(false);
			console.log("data:", $(this).serialize());

            $.ajax({
                url: base_url + "cbtjadwal/saveJadwal",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log(data);
                    reEnable(true);
                    $('#tambahjadwal').modal('hide').data('bs.modal', null);
                    $('#tambahjadwal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });

                    if (data.success) {
                        swal.fire({
                            title: "Sukses",
                            text: "Jadwal berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + 'cbtjadwal';
                            }
                        });
                    } else {
                        swal.fire({
                            title: "ERROR",
                            text: data.message,
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

		function getBank(guru) {
			$.ajax({
				url: base_url + "cbtjadwal/getbankguru/"+guru,
				type: "GET",
				success: function (data) {
					selBank.html('');
					$.each(data, function (i, v) {
                        console.log(i);
						var selected = i===idBank ? 'selected' : '';
						if (i !== '') selBank.append('<option value="'+i+'" '+selected+'>'+v+'</option>');
					});
				}, error: function (xhr, status, error) {
					console.log("error", xhr.responseText);
				}
			});
		}

		$('#id-guru').on('change', function () {
			getBank($(this).val());
		});

		getBank($('#id-guru').val());

        function getBankMapel(mapel) {
            $.ajax({
                url: base_url + "cbtjadwal/getbankmapel/"+mapel,
                type: "GET",
                success: function (data) {
                    selBank.html('');
                    $.each(data, function (i, v) {
                        console.log(i);
                        var selected = i===idBank ? 'selected' : '';
                        if (i !== '') selBank.append('<option value="'+i+'" '+selected+'>'+v+'</option>');
                    });
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                }
            });
        }

        selMapel.on('change', function () {
            getBankMapel($(this).val());
        });
	});
</script>
