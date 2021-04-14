$(document).ready(function () {
	ajaxcsrf();

	$('.select2').select2();
	$('.tgl').datetimepicker({
		icons:
			{
				next: 'fa fa-angle-right',
				previous: 'fa fa-angle-left'
			},
		timepicker: false,
		format: 'Y-m-d',
		widgetPositioning: {
			horizontal: 'left',
			vertical: 'bottom'
		}
	});

	/*
	$('#tambahjadwal').on('show.bs.modal', function (e) {
		var id_jadwal = $(e.relatedTarget).data('id');
		var kode = $(e.relatedTarget).data('kode');
		var id_bank = $(e.relatedTarget).data('bank');
		var id_jenis = $(e.relatedTarget).data('jenis');
		var durasi = $(e.relatedTarget).data('durasi');
		var mulai = $(e.relatedTarget).data('mulai');
		var selesai = $(e.relatedTarget).data('selesai');

		var ruang = $(e.relatedTarget).data('ruang');
		var arrayRuang = ruang.split(',');
		var sesi = $(e.relatedTarget).data('sesi');
		var arraySesi = sesi.split(',');

		$(e.currentTarget).find('input[id="id-jadwal"]').val(id_jadwal);
		$(e.currentTarget).find('input[id="kode-jadwal"]').val(kode);
		$(e.currentTarget).find('input[id="durasi-ujian"]').val(durasi);
		$(e.currentTarget).find('input[id="tgl-mulai"]').val(mulai);
		$(e.currentTarget).find('input[id="tgl-selesai"]').val(selesai);

		$('#bank-id').val(id_bank);
		$('#jenis-id').val(id_jenis);
		$('#ruang-ujian').select2().val(arrayRuang).trigger('change');
		$('#sesi-ujian').select2().val(arraySesi).trigger('change');

		console.log(sesi);
	});
	*/

	$('#create').submit('click', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		console.log("data:", $(this).serialize());

		$.ajax({
			url: base_url + "cbtjadwal/saveJadwal",
			type: "POST",
			dataType: "JSON",
			data: $(this).serialize(),
			success: function (data) {
				console.log(data);
				$('#tambahjadwal').modal('hide').data('bs.modal', null);
				$('#tambahjadwal').on('hidden', function () {
					$(this).data('modal', null);  // destroys modal
				});

				if (data) {
					swal.fire({
						title: "Sukses",
						text: "Jadwal berhasil disimpan",
						icon: "success",
						showCancelButton: false,
					}).then(result => {
						window.location.href = base_url + 'cbtjadwal';
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
