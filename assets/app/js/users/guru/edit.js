function submitajax(url, data, msg, btn) {
    $.ajax({
        url: url,
        data: data,
        type: 'POST',
        success: function (response) {
            if (response.status) {
                swal.fire({
                    "title": "Berhasil",
                    "text": msg,
                    "type": "success"
                });
                //$('form#change_password').trigger('reset');
            } else {
                if (response.errors) {
                    $.each(response.errors, function (key, val) {
                        $('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                        $('[name="' + key + '"]').nextAll('.help-block').eq(0).text(val);
                        if (val === '') {
                            $('[name="' + key + '"]').closest('.form-group').removeClass('has-error');
                            $('[name="' + key + '"]').nextAll('.help-block').eq(0).text('');
                        }
                    });
                }
                if (response.msg) {
                    swal.fire({
                        "title": "Gagal",
                        "text": "Password lama tidak benar",
                        "type": "error"
                    });
                }
            }
            btn.removeAttr('disabled').text('Ganti Password');
        }
    });
}

$(document).ready(function () {
	var kelas;
	/*
	$.ajax({
		url: base_url + "dataguru/getDataKelas",
		type: "GET",
		success: function (data) {
			kelas = JSON.parse(data);
		}, error: function (xhr, status, error) {
			console.log(xhr.responseText);
			showDangerToast('Data tidak tersimpan.');
		}
	});
	*/

    $('form input, form select').on('change', function () {
        $(this).closest('.form-group').removeClass('has-error');
        $(this).nextAll('.help-block').eq(0).text('');
    });

    $('form#editjabatan').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        let btn = $('#btn-jabatan');
        btn.attr('disabled', 'disabled').text('Process...');

		$.ajax({
			url: $(this).attr('action'),
			data: $(this).serialize(),
			type: 'POST',
			success: function (response) {
				swal.fire({
					"title": response.status ? "Berhasil" : "Gagal",
					"text": response.msg,
					"icon": response.status ? "success" : "error"
				});
				btn.removeAttr('disabled').text('Simpan');
			}
		});
    });

    $('form#user_level').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        let btn = $('#btn-level');
        btn.attr('disabled', 'disabled').text('Process...');

        url = $(this).attr('action');
        data = $(this).serialize();
        msg = "Level user berhasil diupdate";
        submitajax(url, data, msg, btn);
    });

    $('form#user_status').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        let btn = $('#btn-status');
        btn.attr('disabled', 'disabled').text('Process...');

        url = $(this).attr('action');
        data = $(this).serialize();
        msg = "Status user berhasil diupdate";
        submitajax(url, data, msg, btn);
    });

    var mapelObj = [];
	$('#mapel').on('select2:select', function (e) {
		var data = e.params.data;
		mapelObj.push(data);
		var inputgroup = $('#input-mapel');

		var div1 = $('<div>',  {class : "input-group mb-3 addmapel", id: data.id});
		var div2 = $('<div>',  {class : "input-group-prepend"});
		var spangroup = $('<div>',  {class : "input-group-text", text: data.text});
		var sel = $('<select>',  {name : "kelasmapel"+data.id+"[]", class : "select2 form-control selectmapel",
			multiple:'multiple', required:'required'});

		div2.append(spangroup);
		div1.append(div2);
		div1.append(sel);
		div1.appendTo(inputgroup);

		$.each(kelas, function (key, entry) {
			sel.append($('<option></option>').attr('value', entry.id_kelas).text(entry.nama_kelas));
		});

		$(".selectmapel").select2({tags: true});

		if ($(".addmapel").length) {
			$('#keterangan').removeClass('d-none');
		}
	});

	$('#mapel').on('select2:unselect', function (e) {
		var data = e.params.data;
		//console.log(data);
		for (var i = 0; i < mapelObj.length; i++)
			if (mapelObj[i].id && mapelObj[i].id === data.id) {
				//mapelObj.splice(i, 1);
				$("div").remove("#"+ data.id +"");
				break;
			}
		//console.log("mapelObj", mapelObj);
		//jsonKelasMapel();

		if (!$(".addmapel").length) {
			$('#keterangan').addClass('d-none');
		}
	});

	$('#kelas-wali').select2({
		dropdownAutoWidth : true,
		width: 'auto'
	});

	$('#level').on('select2:select', function (e) {
		var data = e.params.data;
		console.log(data);

		if (data.id === "4") {
			var inputgroup = $('#input-jabatan');

			var div1 = $('<div>',  {class : "input-group mb-3 addkelas", id: "input-group-walikelas"});
			var div2 = $('<div>',  {class : "input-group-prepend"});
			var spangroup = $('<div>',  {class : "input-group-text", text: "Kelas"});
			var sel = $('<select>',  {name : "kelas_wali", class : "select2 form-control selectkelas", required:'required'});
			sel.append($('<option value="" selected="selected" disabled>Pilih Kelas</option>'));
			div2.append(spangroup);
			div1.append(div2);
			div1.append(sel);
			div1.appendTo(inputgroup);

			$.each(kelas, function (key, entry) {
				if (entry.guru_id === guru_id) {
					console.log(guru_id);
					sel.append($('<option value="'+entry.id_kelas+'" selected="selected">'+entry.nama_kelas+'</option>'));
				} else {
					sel.append($('<option value="'+entry.id_kelas+'">'+entry.nama_kelas+'</option>'));
				}
				//sel.append($('<option>', {value: entry.id_kelas, text: entry.nama_kelas}));
			});

			$(".selectkelas").select2({tags: true});
		} else {
			$("div").remove("#input-group-walikelas");
		}
	});
});
