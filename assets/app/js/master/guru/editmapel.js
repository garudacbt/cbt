var kelas;
var mapelObj = [];
var mapelGuru;
var ekstraObj = [];
var ekstraGuru;
let mapelTerisi, ekstraTerisi, jabatanTerisi;

function inArrayKelas(val, array) {
	var found = $.inArray(val, array);
	return found >= 0;
}

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

function createDropdownKelasMapel() {
	mapelGuru = JSON.parse(mapel_guru);

	var inputgroup = $('#input-mapel');

	$.each(mapelGuru, function (keym, entrym) {
		var div1 = $('<div>',  {class : "row mb-4 addmapel", id: entrym.id_mapel});
		var hiden = $('<input>', {type:"hidden", name:"nama_mapel"+entrym.id_mapel, value: entrym.nama_mapel});
		hiden.appendTo(div1);

		//var div2 = $('<div>',  {class : ""});
		var spangroup = $('<label>',  {class : "", text: entrym.nama_mapel});
		var sel = $('<select>',  {id : "kelasmapel" + entrym.id_mapel, name : "kelasmapel"+entrym.id_mapel+"[]", class : "select2 form-control selectmapel",
			multiple:'multiple', required:'required'});

		//div2.append(spangroup);
		div1.append(spangroup);
		div1.append(sel);
		div1.appendTo(inputgroup);

		$.each(kelas, function (key, entry) {
			var terisi = [];
			$.each(mapelTerisi[entrym.id_mapel], function (idg, valg) {
				var ada = guru_id != idg && inArrayKelas(entry.id_kelas, valg['kelas']);
				var mengisi = ada ? ' - - ( '+valg['guru']+' )' : '';
				if (ada) {
					terisi.push({ada: ada, kelas: entry.id_kelas, guru: mengisi});
				}
			});
			var adaGuru = terisi.length > 0 ? terisi[0].guru : '';
			sel.append($('<option></option>')
				.attr('value', entry.id_kelas)
				.attr('disabled', terisi.length > 0)
				.text(entry.nama_kelas+adaGuru));
		});

		item = {};
		item ["id"] = entrym.id_mapel;
		mapelObj.push(item);

		var selectedMapel = [];
		$.each(entrym.kelas_mapel, function (k, en) {
			selectedMapel.push(en.kelas);
		});
		$('#kelasmapel' + entrym.id_mapel).val(selectedMapel);
	});

	$(".selectmapel").select2({tags: true});
}

function createDropdownKelasEkstra() {
    ekstraGuru = JSON.parse(ekstra_guru);

    var inputgroup = $('#input-mapel');

    $.each(ekstraGuru, function (keym, entrym) {
        var div1 = $('<div>',  {class : "row mb-4 addekstra", id: entrym.id_ekstra});
        var hiden = $('<input>', {type:"hidden", name:"nama_ekstra"+entrym.id_ekstra, value: entrym.nama_ekstra});
        hiden.appendTo(div1);

        //var div2 = $('<div>',  {class : ""});
        var spangroup = $('<label>',  {class : "", text: entrym.nama_ekstra});
        var sel = $('<select>',  {id : "kelasekstra" + entrym.id_ekstra, name : "kelasekstra"+entrym.id_ekstra+"[]", class : "select2 form-control selectekstra",
            multiple:'multiple', required:'required'});

        //div2.append(spangroup);
        div1.append(spangroup);
        div1.append(sel);
        div1.appendTo(inputgroup);

        $.each(kelas, function (key, entry) {
			var terisi = [];
			$.each(ekstraTerisi[entrym.id_ekstra], function (idg, valg) {
				var ada = guru_id != idg && inArrayKelas(entry.id_kelas, valg['kelas']);
				var mengisi = ada ? ' - - ( '+valg['guru']+' )' : '';
				if (ada) {
					terisi.push({ada: ada, kelas: entry.id_kelas, guru: mengisi});
				}
			});
			var adaGuru = terisi.length > 0 ? terisi[0].guru : '';
            sel.append($('<option></option>')
				.attr('disabled', terisi.length > 0)
                .attr('value', entry.id_kelas)
                .text(entry.nama_kelas+adaGuru));
        });

        var item = {};
        item ["id"] = entrym.id_ekstra;
        ekstraObj.push(item);

        var selectedEkstra = [];
        $.each(entrym.kelas_ekstra, function (k, en) {
            selectedEkstra.push(en.kelas);
        });
        $('#kelasekstra' + entrym.id_ekstra).val(selectedEkstra);
    });

    $(".selectekstra").select2({tags: true});
}

function createDropdownKelasWali() {
	if (level_id === "4") {
		var inputgroup = $('#input-jabatan');

		var div1 = $('<div>',  {class : "row mb-4 addkelas", id: "input-group-walikelas"});
		//var div2 = $('<div>',  {class : ""});
		var spangroup = $('<label>',  {class : "", text: "Kelas"});
		var sel = $('<select>',  {name : "kelas_wali", class : "select2 form-control selectkelas", required:'required'});
		//div2.append(spangroup);
		div1.append(spangroup);
		div1.append(sel);
		div1.appendTo(inputgroup);

		var arrSelect = [];
		$.each(kelas, function (key, entry) {
			var nguru = '';
			var selected = [];
			if (jabatanTerisi[4] !== undefined && jabatanTerisi[4][entry.id_kelas] !== undefined) {
				var idg = jabatanTerisi[4][entry.id_kelas].id;
				nguru = guru_id != idg ? ' - - ( '+jabatanTerisi[4][entry.id_kelas].nama + ' )' : '';
				selected = entry.id_kelas == kelas_id ? 'selected="selected" ' : '';
				arrSelect.push(entry.id_kelas == kelas_id);
			}
			var disabl = nguru !=='' ? 'disabled="disabled"': '';
			sel.append($('<option value="'+entry.id_kelas+'" '+ selected + disabl+'>'+entry.nama_kelas+nguru+'</option>'));
		});
		var isSelected = inArrayKelas(true, arrSelect) ? '' : 'selected="selected"';
		sel.prepend($('<option value="" '+isSelected+' disabled>Pilih Kelas</option>'));

		$(".selectkelas").select2({tags: true});
	}
}

function sortByLevel(a, b){
    var aID = a.level_id.toLowerCase();
    var bID = b.level_id.toLowerCase();
    return ((aID < bID) ? -1 : ((aID > bID) ? 1 : 0));
}

function sortByKode(a, b){
    var aID = a.nama_kelas.toLowerCase();
    var bID = b.nama_kelas.toLowerCase();
    return ((aID < bID) ? -1 : ((aID > bID) ? 1 : 0));
}

$(document).ready(function () {

	$('#mapel').select2();
    $('#level').select2();
    $('#ekstra').select2();
    $('.guru2').select2();

	$.ajax({
        url: base_url + "dataguru/getDataKelas",
		type: "GET",
		success: function (data) {
			console.log('kelas', data);
			mapelTerisi = data.mpl_terisi;
			ekstraTerisi = data.eks_terisi;
			jabatanTerisi = data.jabatan;
            kelas = data.kelas;
            kelas.sort(sortByKode);
            kelas.sort(sortByLevel);

            createDropdownKelasMapel();
            createDropdownKelasEkstra();
			createDropdownKelasWali();
		}, error: function (xhr, status, error) {
			console.log(xhr.responseText);
			showDangerToast('Data error.');
		}
	});

    $('form input, form select').on('change', function () {
        $(this).closest('.form-group').removeClass('has-error');
        $(this).nextAll('.help-block').eq(0).text('');
    });

	$('form#editjabatan').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        let btn = $('#btn-jabatan');
        btn.attr('disabled', 'disabled').text('Process...');
        //console.log($(this).serialize());
		$.ajax({
			url: $(this).attr('action'),
			data: $(this).serialize(),
			type: 'POST',
			success: function (response) {
				console.log(response);
				swal.fire({
					"title": response.status ? "Berhasil" : "Gagal",
					"text": response.msg,
					"icon": response.status ? "success" : "error"
				}).then(result => {
					window.location.href = base_url+'dataguru';
				});
				btn.removeAttr('disabled').text('Simpan');
			},
			error: function (xhr, error, status) {
				console.log(xhr.responseText);
			}
		});
    });

	$('#mapel').on('select2:select', function (e) {
		var data = e.params.data;
		mapelObj.push(data);

		var inputgroup = $('#input-mapel');

		var div1 = $('<div>',  {class : "row mb-4 addmapel", id: data.id});
		var hiden = $('<input>', {type:"hidden", name:"nama_mapel"+data.id, value: data.text});
		hiden.appendTo(div1);

		//var div2 = $('<div>',  {class : ""});
		var spangroup = $('<label>',  {class : "", text: data.text});
		var sel = $('<select>',  {id : "kelasmapel" + data.id, name : "kelasmapel"+data.id+"[]", class : "select2 form-control selectmapel",
			multiple:'multiple', required:'required'});

		//div2.append(spangroup);
		div1.append(spangroup);
		div1.append(sel);
		div1.appendTo(inputgroup);

		$.each(kelas, function (key, entry) {
			var terisi = [];
			$.each(mapelTerisi[data.id], function (idg, valg) {
				var ada = guru_id != idg && inArrayKelas(entry.id_kelas, valg['kelas']);
				var mengisi = ada ? ' - - ( '+valg['guru']+' )' : '';
				if (ada) {
					terisi.push({ada: ada, kelas: entry.id_kelas, guru: mengisi});
				}
			});
			var adaGuru = terisi.length > 0 ? terisi[0].guru : '';
			sel.append($('<option></option>')
				.attr('value', entry.id_kelas)
				.attr('disabled', terisi.length>0)
				.text(entry.nama_kelas + adaGuru));
		});

		var selectedMapel = [];
		$.each(mapelGuru, function (keym, entrym) {
			//console.log(entrym.id_mapel, data.id);
			if (entrym.id_mapel === data.id) {
				$.each(entrym.kelas_mapel, function (k, en) {
					selectedMapel.push(en.kelas);
				});
			}
		});
		//console.log(selectedMapel);
		$('#kelasmapel' + data.id).val(selectedMapel);
		$(".selectmapel").select2({tags: true});

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

        //if (!$(".addmapel").length && !$(".addekstra").length) {
		//	$('#keterangan').addClass('d-none');
		//}
	});

    $('#ekstra').on('select2:select', function (e) {
        var data = e.params.data;
        ekstraObj.push(data);

        var inputgroup = $('#input-mapel');

        var div1 = $('<div>',  {class : "row mb-4 addekstra", id: data.id});
        var hiden = $('<input>', {type:"hidden", name:"nama_ekstra"+data.id, value: data.text});
        hiden.appendTo(div1);

        //var div2 = $('<div>',  {class : ""});
        var spangroup = $('<label>',  {class : "", text: data.text});
        var sel = $('<select>',  {id : "kelasekstra" + data.id, name : "kelasekstra"+data.id+"[]", class : "select2 form-control selectekstra",
            multiple:'multiple', required:'required'});

        //div2.append(spangroup);
        div1.append(spangroup);
        div1.append(sel);
        div1.appendTo(inputgroup);

        $.each(kelas, function (key, entry) {
			let terisi = [];
			$.each(ekstraTerisi[data.id], function (idg, valg) {
				var ada = guru_id != idg && inArrayKelas(entry.id_kelas, valg['kelas']);
				var mengisi = ada ? ' - - ( '+valg['guru']+' )' : '';
				if (ada) {
					terisi.push({ada: ada, kelas: entry.id_kelas, guru: mengisi});
				}
			});
			var adaGuru = terisi.length > 0 ? terisi[0].guru : '';
            sel.append($('<option></option>')
				.attr('disabled', terisi.length>0)
				.attr('value', entry.id_kelas)
				.text(entry.nama_kelas + adaGuru));
        });

        var selectedEkstra = [];
        $.each(ekstraGuru, function (keym, entrym) {
            //console.log(entrym.id_ekstra, data.id);
            if (entrym.id_ekstra === data.id) {
                $.each(entrym.kelas_ekstra, function (k, en) {
                    selectedEkstra.push(en.kelas);
                });
            }
        });
        //console.log(selectedEkstra);
        $('#kelasekstra' + data.id).val(selectedEkstra);
        $(".selectekstra").select2({tags: true});
    });

    $('#ekstra').on('select2:unselect', function (e) {
        var data = e.params.data;
        //console.log(data);
        for (var i = 0; i < ekstraObj.length; i++)
            if (ekstraObj[i].id && ekstraObj[i].id === data.id) {
                //ekstraObj.splice(i, 1);
                $("div").remove("#"+ data.id +"");
                break;
            }
        //console.log("ekstraObj", ekstraObj);

        //if (!$(".addmapel").length && !$(".addekstra").length) {
        //    $('#keterangan').addClass('d-none');
        //}
    });

	$('#kelas-wali').select2({
		dropdownAutoWidth : true,
		width: 'auto'
	});

	$('#level').on('select2:select', function (e) {
		var data = e.params.data;
		//console.log(data);

		if (data.id === "4") {
			var inputgroup = $('#input-jabatan');

			var div1 = $('<div>',  {class : "row mb-4 addkelas", id: "input-group-walikelas"});
			//var div2 = $('<div>',  {class : ""});
			var spangroup = $('<label>',  {class : "", text: "Kelas"});
			var sel = $('<select>',  {name : "kelas_wali", class : "select2 form-control selectkelas", required:'required'});
			//div2.append(spangroup);
			div1.append(spangroup);
			div1.append(sel);
			div1.appendTo(inputgroup);

			$.each(kelas, function (key, entry) {
				var nguru = '';
				var selected = '';
				if (jabatanTerisi[4] !== undefined && jabatanTerisi[4][entry.id_kelas] !== undefined) {
					var idg = jabatanTerisi[4][entry.id_kelas].id;
					nguru = guru_id != idg ? ' - - ( '+jabatanTerisi[4][entry.id_kelas].nama + ' )' : '';
					selected = entry.id_kelas == kelas_id ? 'selected="selected" ' : '';
				}
				var disabl = nguru !=='' ? 'disabled="disabled"': '';
				sel.append($('<option value="'+entry.id_kelas+'" '+ selected + disabl+'>'+entry.nama_kelas+nguru+'</option>'));
			});
			sel.prepend($('<option value="" selected="selected" disabled>Pilih Kelas</option>'));

			$(".selectkelas").select2({tags: true});
		} else {
			$("div").remove("#input-group-walikelas");
		}
	});

    $('#copyjabatan').on('submit', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        $('#beforeModal').modal('hide').data('bs.modal', null);

        //console.log($(this).serialize());
		$.ajax({
			url: $(this).attr('action'),
			data: $(this).serialize(),
			type: 'POST',
			success: function (response) {
				console.log(response);
				swal.fire({
					"title": response.status ? "Berhasil" : "Gagal",
					"text": response.msg,
					"icon": response.status ? "success" : "error"
				}).then(result => {
					window.location.href = base_url+'dataguru';
				});
			},
			error: function (xhr, error, status) {
				console.log(xhr.responseText);
			}
		});
    });
});
