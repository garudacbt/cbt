var table;

$(document).ready(function () {
	ajaxcsrf();

	$('#selector button').click(function() {
		$(this).addClass('active').siblings().addClass('btn-outline-success').removeClass('active btn-success');

		if(!$('#atur-by-kelas').is(':hidden')) {
			$('#atur-by-kelas').addClass('d-none');
			$('#atur-by-siswa').removeClass('d-none');
			$('#dropdown-kelas-parent').removeClass('d-none');
		} else {
			$('#atur-by-kelas').removeClass('d-none');
			$('#atur-by-siswa').addClass('d-none');
			$('#dropdown-kelas-parent').addClass('d-none');
		}
	});

	$("#editsesikelas").on("submit", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();

		const $rows = $('#sesi').find('tr'), headers = $rows.splice(0, 1); // header rows
		var jsonObj = [];
		$rows.each((i, row) => {
			var kelasid = $(row).attr("data-id");

			const $colSelect = $(row).find('select');
			const $colCheck = $(row).find('input');

			let item = {};
			item ["sesi_id"] = $colSelect.val();
			item ["kelas_id"] = kelasid;
			item ["set_siswa"] = $colCheck.prop("checked") === true ? "1" : "0";
			jsonObj.push(item);
		});

		var dataPost = $(this).serialize() + "&kelas_sesi=" + JSON.stringify(jsonObj);
		console.log(dataPost);

		$.ajax({
			url: base_url + "cbtsesisiswa/editsesikelas",
			type: "POST",
			dataType: "JSON",
			data: dataPost,
			success: function (data) {
				console.log("response:", data);
				if (data.status) {
					//showSuccessToast('Data berhasil disimpan')
					window.location.href = base_url + 'cbtsesisiswa';
				} else {
					showDangerToast('gagal disimpan')
				}
			}, error: function (xhr, status, error) {
				console.log("response:", xhr.responseText);
				showDangerToast('gagal disimpan')
			}
		});
	});

	$("#editsesisiswa").on("submit", function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		//var value = $('tr[data-name="input-sesi"] select.form-control').val();

		const $rows = $('#sesi').find('tr'), headers = $rows.splice(0, 1); // header rows
		var jsonObj = [];
		$rows.each((i, row) => {
			const $cols = $(row).find('td');
			var siswaid = $(row).attr("data-id");
			$cols.each((i, col) => {
				const $col = $(col);
				var selectObject = $col.find("select");
				var selid = selectObject.val();

				if (selid != undefined) {
					item = {};
					item ["sesi_id"] = selid;
					item ["siswa_id"] = siswaid;
					jsonObj.push(item);
				}
			});
		});

		var dataPost = $(this).serialize() + "&siswa_sesi=" + JSON.stringify(jsonObj);
		console.log(dataPost);

		$.ajax({
			url: base_url + "cbtsesisiswa/editsesisiswa",
			type: "POST",
			dataType: "JSON",
			data: dataPost,
			success: function (data) {
				console.log("response:", data);
				if (data.status) {
					showSuccessToast('Data berhasil disimpan')
				} else {
					showDangerToast('gagal disimpan')
				}
			}, error: function (xhr, status, error) {
				showDangerToast(xhr.responseText);
			}
		});

	});

	$('#dropdown-kelas').on('change', function (e) {
		var id = $(this).val();
		console.log(id);
		$('a[href="' + id + '"]').tab('show');
	});
});
