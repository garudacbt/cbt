var nomor_soal = 1;
var fieldLinks;
var jenisSoal;

function inArray(val, array) {
    var found = $.inArray(val, array);
    return found >= 0;
}

function initTextArea() {
    $('.textjawaban2').summernote({
        placeholder: 'Tulis Jawaban disini',
        tabsize: 2,
        minHeight: 50,
        toolbar: [
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            //['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['picture']],
        ],
        /*
        callbacks: {
            onImageUpload: function(image) {
                var idtextarea = $(this);
                uploadImage(image[0], idtextarea);
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        }
        */
    });
}

function myOwnCallBack(file, idtextarea) {
    var name = $('#textsoal').attr('data-name');
    var hash = $('#textsoal').attr('data-id');
    let data = new FormData();
    data.append("file", file);
    data.append(name, hash);

    $.ajax({
        data: data,
        type: "POST",
        url: base_url + "cbtbanksoal/upload_image",
        //url: "file-uploader.php", //Your own back-end uploader
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() { //Handle progress upload
            let myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
            return myXhr;
        },
        success: function(reponse) {
            if(reponse.status === true) {
                let listMimeImg = ['image/png', 'image/jpeg', 'image/webp', 'image/gif', 'image/svg'];
                let listMimeAudio = ['audio/mpeg', 'audio/ogg', 'udio/mp3'];
                let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];
                let elem;

                if (listMimeImg.indexOf(file.type) > -1) {
                    //Picture
                    $(idtextarea).summernote('editor.insertImage', base_url + reponse.filename);
                } else if (listMimeAudio.indexOf(file.type) > -1) {
                    //Audio
                    elem = document.createElement("audio");
                    elem.setAttribute("src", base_url + reponse.filename);
                    elem.setAttribute("controls", "controls");
                    elem.setAttribute("preload", "metadata");
                    $(idtextarea).summernote('editor.insertNode', elem);
                } else if (listMimeVideo.indexOf(file.type) > -1) {
                    //Video
                    elem = document.createElement("video");
                    elem.setAttribute("src", base_url + reponse.filename);
                    elem.setAttribute("controls", "controls");
                    elem.setAttribute("preload", "metadata");
                    $(idtextarea).summernote('editor.insertNode', elem);
                } else {
                    //Other file type
                    elem = document.createElement("a");
                    let linkText = document.createTextNode(file.name);
                    elem.appendChild(linkText);
                    elem.title = file.name;
                    elem.href = base_url + reponse.filename;
                    $(idtextarea).summernote('editor.insertNode', elem);
                }
            }
        }
    });
}

function progressHandlingFunction(e) {
    if (e.lengthComputable) {
        //Log current progress
        console.log((e.loaded / e.total * 100) + '%');

        //Reset progress on complete
        if (e.loaded === e.total) {
            console.log("Upload finished.");
        }
    }
}

function uploadImage(image, editor, editable) {
    var name = $('#textsoal').attr('data-name');
    var hash = $('#textsoal').attr('data-id');

    var data = new FormData();
    data.append("file", image);
    data.append(name, hash);

    $.ajax({
        url: base_url + "cbtbanksoal/upload_image",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "POST",
        success: function(data) {
            $(idtextarea).summernote("insertImage", data);
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function deleteImage(src) {
    var $name = $('#textsoal').attr('data-name');
    var hash = $('#textsoal').attr('data-id');
    var data = new FormData();
    data.append("src", src);
    data.append(name, hash);

    $.ajax({
        data: {src : src},
        type: "POST",
        url: base_url + "cbtbanksoal/delete_image",
        cache: false,
        success: function(response) {
            console.log(response);
        }
    });
}

function inputKosong() {
    var kosong = true;
    if (jenis === '1') {
        $('.textjawaban').each(function () {
            if ($(this).summernote('isEmpty')) {
                kosong = true;
                return false;
            } else {
                kosong = false;
            }
        });
    } else if (jenis === '2') {
        $('.textjawaban2').each(function () {
            if ($(this).summernote('isEmpty')) {
                kosong = true;
                return false;
            } else {
                kosong = false;
            }
        });
    } else if (jenis === '3') {
        kosong = false;
    } else if (jenis === '4') {
        kosong = $('#jawaban-isian').val().trim() == "";
    } else {
        kosong = $('.textjawaban-essai').summernote('isEmpty');
    }
    return kosong;
}

function inArray(val, array) {
    var found = $.inArray(val, array);
    return found >= 0;
}

var old_id = 11;
function getSoalById(id_bank, number, id, jenis_soal) {
    jenisSoal = jenis_soal;
    $('#empty-soal').addClass('d-none');
    $('#not-empty-soal').addClass('d-none');

    $('#btn-'+old_id).removeClass('active');
	$('#btn-'+id).addClass('active');
	$('#jenis-id').val(jenis_soal);
	if (jenis_soal === '1') {
        $('#nomor-soal').html('<b>Soal PG Nomor: ' + number + '</b>');

        $('#soal-area').removeClass('col-md-12');
        $('#soal-area').addClass('col-md-6');
        $('#jawaban-area').removeClass('col-md-12');
        $('#jawaban-area').addClass('col-md-6');

        // 1 enable
        $('#root-opsi-pg').removeClass('d-none');
        $('.textjawaban').removeAttr('disabled', 'disabled');
        $('#jawaban-benar').removeClass('d-none');
        $('#root-jawaban-pg').removeClass('d-none');
        $('#jawaban').prop('required', true);
        $('#jawaban').removeAttr('disabled');

        // 2 disable
        $('#root-opsi-pg2').addClass('d-none');
        $('.textjawaban2').attr('disabled', 'disabled');
        $('.check-pg2').attr('disabled', 'disabled');

        // 3 disable
        $('#root-opsi-jodohkan').addClass('d-none');
        $('#model-opsi').attr('disabled', 'disabled');
        $('#type-opsi').attr('disabled', 'disabled');

        // 4 disable
        $('#root-jawaban-isian').addClass('d-none');
        $('#jawaban-isian').attr('disabled', 'disabled');

        // 5 disable
        $('#root-jawaban-essai').addClass('d-none');
        $('#jawaban-essai').attr('disabled', 'disabled');
    } else if (jenis_soal === '2') {
        $('#nomor-soal').html('<b>Soal Kompleks Nomor: '+number + '</b>');

        $('#soal-area').removeClass('col-md-12');
        $('#soal-area').addClass('col-md-6');
        $('#jawaban-area').removeClass('col-md-12');
        $('#jawaban-area').addClass('col-md-6');

        // 1 disable
        $('#root-opsi-pg').addClass('d-none');
        $('.textjawaban').attr('disabled', 'disabled');
        $('#jawaban-benar').addClass('d-none');
        $('#root-jawaban-pg').addClass('d-none');
        $('#jawaban').prop('required', false);
        $('#jawaban').attr('disabled', 'disabled');

        // 2 enable
        $('#root-opsi-pg2').removeClass('d-none');
        $('.textjawaban2').removeAttr('disabled');
        $('.check-pg2').removeAttr('disabled');

        // 3 disable
        $('#root-opsi-jodohkan').addClass('d-none');
        $('#model-opsi').attr('disabled', 'disabled');
        $('#type-opsi').attr('disabled', 'disabled');

        // 4 disable
        $('#root-jawaban-isian').addClass('d-none');
        $('#jawaban-isian').attr('disabled', 'disabled');

        // 5 disable
        $('#root-jawaban-essai').addClass('d-none');
        $('#jawaban-essai').attr('disabled', 'disabled');
    } else if (jenis_soal === '3') {
        $('#nomor-soal').html('<b>Soal Menjodohkan Nomor: '+number + '</b>');

        $('#soal-area').removeClass('col-md-6');
        $('#soal-area').addClass('col-md-12');
        $('#jawaban-area').removeClass('col-md-6');
        $('#jawaban-area').addClass('col-md-12');

        // 1 disable
        $('#root-opsi-pg').addClass('d-none');
        $('.textjawaban').attr('disabled', 'disabled');
        $('#root-jawaban-pg').addClass('d-none');
        $('#jawaban').prop('required', false);
        $('#jawaban').attr('disabled', 'disabled');

        // 2 disable
        $('#root-opsi-pg2').addClass('d-none');
        $('.textjawaban2').attr('disabled', 'disabled');
        $('.check-pg2').attr('disabled', 'disabled');

        // 3 enable
        $('#root-opsi-jodohkan').removeClass('d-none');
        $('#model-opsi').removeAttr('disabled');
        $('#type-opsi').removeAttr('disabled');

        // 4 disable
        $('#jawaban-benar').addClass('d-none');
        $('#root-jawaban-isian').addClass('d-none');
        $('#jawaban-isian').attr('disabled', 'disabled');

        // 5 disable
        $('#root-jawaban-essai').addClass('d-none');
        $('#jawaban-essai').attr('disabled', 'disabled');
    } else if (jenis_soal === '4') {
        $('#nomor-soal').html('<b>Soal Isian Nomor: '+number + '</b>');

        $('#soal-area').removeClass('col-md-12');
        $('#soal-area').addClass('col-md-6');
        $('#jawaban-area').removeClass('col-md-12');
        $('#jawaban-area').addClass('col-md-6');

        // 1 disable
        $('#root-opsi-pg').addClass('d-none');
        $('.textjawaban').attr('disabled', 'disabled');
        $('#root-jawaban-pg').addClass('d-none');
        $('#jawaban').prop('required', false);
        $('#jawaban').attr('disabled', 'disabled');

        // 2 disable
        $('#root-opsi-pg2').addClass('d-none');
        $('.textjawaban2').attr('disabled', 'disabled');
        $('.check-pg2').attr('disabled', 'disabled');

        // 3 disable
        $('#root-opsi-jodohkan').addClass('d-none');
        $('#model-opsi').attr('disabled', 'disabled');
        $('#type-opsi').attr('disabled', 'disabled');

        // 4 enable
        $('#jawaban-benar').removeClass('d-none');
        $('#root-jawaban-isian').removeClass('d-none');
        $('#jawaban-isian').removeAttr('disabled');

        // 5 disable
        $('#root-jawaban-essai').addClass('d-none');
        $('#jawaban-essai').attr('disabled', 'disabled');
	} else {
		$('#nomor-soal').html('<b>Soal Essai Nomor: '+number + '</b>');

        $('#soal-area').removeClass('col-md-12');
        $('#soal-area').addClass('col-md-6');
        $('#jawaban-area').removeClass('col-md-12');
        $('#jawaban-area').addClass('col-md-6');

        // 1 disable
		$('#root-opsi-pg').addClass('d-none');
        $('.textjawaban').attr('disabled', 'disabled');
        $('#root-jawaban-pg').addClass('d-none');
        $('#jawaban').prop('required',false);
        $('#jawaban').attr('disabled', 'disabled');

        // 2 disable
        $('#root-opsi-pg2').addClass('d-none');
        $('.textjawaban2').attr('disabled', 'disabled');
        $('.check-pg2').attr('disabled', 'disabled');

        // 3 disable
        $('#root-opsi-jodohkan').addClass('d-none');

        // 4 disable
        $('#root-jawaban-isian').addClass('d-none');
        $('#jawaban-isian').attr('disabled', 'disabled');

        // 5 enable
        $('#jawaban-benar').removeClass('d-none');
		$('#root-jawaban-essai').removeClass('d-none');
        $('#jawaban-essai').removeAttr('disabled');
	}

	$('#loading').removeClass('d-none');
	setTimeout(function() {
		old_id = id;
		nomor_soal = number;
		jenis = jenis_soal;
		//console.log("data", bank_soal);
		$.ajax({
			type: "GET",
			url: base_url + "cbtbanksoal/getSoalByNomor",
			dataType: "JSON",
			data: {bank_id: id_bank, nomor: number, jenis: jenis_soal},
            //responseType: "blob",
			success: function (data) {
				$('#loading').addClass('d-none');
				console.log('soal', data);
				if (data == null) {
                    $('#empty-soal').removeClass('d-none');
                    $('#not-empty-soal').addClass('d-none');
					$('#soal-id').val('0');
					$('#method').val('add');
					$('#textsoal').summernote('code', '');
					$(".textjawaban").each(function(){
						$(this).summernote('code', '');
					});
					$('#jawaban').prop('selectedIndex', 0).change();
					$('#jawaban-essai').summernote('code', '');
				} else {
                    $('#empty-soal').addClass('d-none');
                    $('#not-empty-soal').removeClass('d-none');
					$('#soal-id').val(data.id_soal);
					$('#method').val('edit');

					var checkSoal = data.soal == null ? '' : data.soal;
                    var sSoal = $($.parseHTML(checkSoal));
                    sSoal.find(`img`).each(function () {
                        var curSrc = $(this).attr('src');
                        curSrc.replace(base_url, '');
                        if (curSrc.indexOf("http") === -1) {// && curSrc.indexOf("base64") === -1) {
                            //$(this).attr('src', base_url+curSrc);
                        } else if (curSrc.indexOf(base_url) === -1) {
                            var pathUpload = 'uploads';
                            var forReplace = curSrc.split(pathUpload);
                            $(this).attr('src', base_url + pathUpload + forReplace[1]);
                        }
                    });

                    sSoal.find(`video`).each(function () {
                        var curSrc = $(this).attr('src');
                        curSrc.replace(base_url, '');
                        if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                            $(this).attr('src', base_url+curSrc);
                        } else if (curSrc.indexOf(base_url) === -1) {
                            var pathUpload = 'uploads';
                            var forReplace = curSrc.split(pathUpload);
                            $(this).attr('src', base_url + pathUpload + forReplace[1]);
                        }
                    });

                    sSoal.find(`audio`).each(function () {
                        var curSrc = $(this).attr('src');
                        curSrc.replace(base_url, '');
                        if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                            $(this).attr('src', base_url+curSrc);
                        } else if (curSrc.indexOf(base_url) === -1) {
                            var pathUpload = 'uploads';
                            var forReplace = curSrc.split(pathUpload);
                            $(this).attr('src', base_url + pathUpload + forReplace[1]);
                        }
                    });

					$('#textsoal').summernote('code', sSoal);

					if (jenis_soal === '1') {
                        let arrJawaban = [data.opsi_a, data.opsi_b, data.opsi_c, data.opsi_d, data.opsi_e];
                        let arrAbjad = ['a', 'b', 'c', 'd', 'e'];

                        $.each(arrJawaban, function (i, item) {
                            var chekJawaban = arrJawaban[i] == null ? '' : arrJawaban[i];
                            var sJawabPg = $($.parseHTML(chekJawaban));
                            sJawabPg.find(`img`).each(function () {
                                var curSrc = $(this).attr('src').replaceAll(base_url, '');
                                console.log('img', curSrc);
                                if (curSrc.indexOf("http") === -1 || curSrc.indexOf("data:image") === -1) {
                                    console.log('no http',);
                                    $(this).attr('src', base_url + curSrc);
                                    /*
                                    if (curSrc.indexOf(base_url) === -1) {
                                        $(this).attr('src', base_url + curSrc);
                                    } else {
                                        curSrc.replaceAll(base_url, '');
                                        $(this).attr('src', base_url + curSrc);
                                    }
                                    */
                                } else if (curSrc.indexOf(base_url) === -1) {
                                    console.log('no base url',);
                                    var pathUpload = 'uploads';
                                    var forReplace = curSrc.split(pathUpload);
                                    $(this).attr('src', base_url + pathUpload + forReplace[1]);
                                }
                                console.log('img', curSrc.replaceAll(base_url, ''));
                            });
                            $('#textjawaban_' + arrAbjad[i]).summernote('code', sJawabPg);

                        });

                        var jwb = data.jawaban == null ? '' : $.trim((data.jawaban).toLowerCase());
                        console.log(jwb);
                        $('#jawaban').prop('selectedIndex', arrAbjad.indexOf(jwb) + 1).change();
                    } else if (jenis_soal === '2') {
                        var jwb2 = '';
                        if (data.opsi_a) {
                            $.each(data.opsi_a, function (k, v) {
                                var checked = '';
                                if (inArray(k, data.jawaban)) {
                                    checked = 'checked="checked"';
                                }
                                jwb2 += '<div class="pg-kompleks mb-4 ml-3">' +
                                    '    <div class="row mb-2">' +
                                    '       <div class="col-6"><b>Jawaban ' + k.toUpperCase() + '</b></div>' +
                                    '       <div class="col-6 text-right d-flex justify-content-end">' +
                                    '          <b>Jawaban banar</b>' +
                                    '          <input class="check-pg2" type="checkbox" style="width: 24px; height: 24px; margin-left: 8px;" name="jawaban_benar_pg2[]" value="' + k + '" ' + checked + '>' +
                                    '       </div>' +
                                    '    </div>' +
                                    '    <textarea class="textjawaban2" id="textjawaban2_' + k + '" name="jawaban2_' + k + '" placeholder="Buat jawaban" style="width:100%;">' + v + '</textarea>\n' +
                                    '</div>';
                            });
                        } else {
                            jwb2 += '<div class="pg-kompleks mb-4 ml-3">' +
                                '    <div class="row mb-2">' +
                                '       <div class="col-6"><b>Jawaban A</b></div>' +
                                '       <div class="col-6 text-right d-flex justify-content-end">' +
                                '          <b>Jawaban banar</b>' +
                                '          <input class="check-pg2" type="checkbox" style="width: 24px; height: 24px; margin-left: 8px;" name="jawaban_benar_pg2[]" value="a">' +
                                '       </div>' +
                                '    </div>' +
                                '    <textarea class="textjawaban2" id="textjawaban2_a" name="jawaban2_a" placeholder="Buat jawaban" style="width:100%;"></textarea>\n' +
                                '</div>';
                        }
                        $('#opsi-pg2').html(jwb2);
                        initTextArea();
                    } else if (jenis_soal === '3') {
					    if (data.jawaban && data.jawaban.jawaban.length > 0 && Array.isArray(data.jawaban.jawaban[0])) {
					        var valModel = data.jawaban.type == null && data.jawaban.model == null ? '0' :
                                (data.jawaban.type != null && data.jawaban.model == null ? '2' : data.jawaban.model);
					        if (valModel == '0') {
                                $('#btn-table').addClass('d-none');
                            } else if (valModel == '1') {
                                $('#btn-table').addClass('d-none');
                            } else {
                                $('#btn-table').removeClass('d-none');
                            }

					        $('#model-opsi').val(valModel);
                            $('#type-opsi').val(data.jawaban.type);
					        if (data.jawaban.model == '1') {
					            createListJodohkan(convertTableToList(data.jawaban.jawaban));
                            } else {
                                createTableJodohkan(data.jawaban);
                            }
					        /*
					        var trs = '<table id="table-jodohkan" class="table table-sm table-bordered">';
                            $.each(data.jawaban.jawaban, function (k, v) {
                                if (k === 0) {
                                    trs += '<tr class="text-center">';
                                    $.each(v, function (key, val) {
                                        if (key === 0) {
                                            trs += '<th class="text-white">'+val+'</th>';
                                        } else {
                                            trs += '<th class="kolom">' +
                                                '<div>' +
                                                '<span class="editable">'+val+'</span>' +
                                                '<span class="float-right hapus-kolom" title="hapus kolom: '+val+'" style="cursor: pointer">&times;</span>' +
                                                '</div>' +
                                                '</th>';
                                        }
                                    });
                                    trs += '</tr>';
                                } else {
                                    trs += '<tr class="text-center">';
                                    $.each(v, function (t, i) {
                                        if (t === 0) {
                                            trs += '<td class="baris text-bold">' +
                                                '<div>' +
                                                '<span class="editable">'+i+'</span>' +
                                                '<span class="float-right hapus-baris" title="hapus baris: '+i+'" style="cursor: pointer">&times;</span>' +
                                                '</div>' +
                                                '</td>';
                                        } else {
                                            const checked = i == '0' ? '' : ' checked';
                                            const type = data.jawaban.type != '2' ? 'checkbox' : 'radio';
                                            trs += '<td>' +
                                                '<input class="check" type="'+type+'" name="check'+k+'" style="height: 20px; width: 20px"'+checked+'>' +
                                                '</td>';
                                        }
                                    });
                                    trs += '</tr>';
                                }
                            });
                            trs += '</table>' +
                                '<button type="button" class="btn btn-success btn-sm" onclick="addRow()"><i class="fa fa-plus"></i> Tambah Baris</button>';
                            $('#jawaban-jodohkan').html(trs);
                            */
                        } else {
                            $('#model-opsi').val('0');
                            $('#type-opsi').val('0');
                            $('#btn-table').addClass('d-none');
					        var table = '<table id="table-jodohkan" class="table table-sm table-bordered">' +
                                '<tr class="text-center">\n' +
                                '    <th class="text-white">#</th>\n' +
                                '    <th class="kolom">' +
                                '      <div>' +
                                '        <span class="editable">Kolom 1</span>' +
                                '        <span class="float-right hapus-kolom" title="hapus kolom: Kolom 1" style="cursor: pointer">&times;</span>' +
                                '      </div>' +
                                '    </th>\n' +
                                '    <th class="kolom">' +
                                '      <div>' +
                                '        <span class="editable">Kolom 2</span>' +
                                '        <span class="float-right hapus-kolom" title="hapus kolom: Kolom 2" style="cursor: pointer">&times;</span>' +
                                '      </div>' +
                                '    </th>\n' +
                                '</tr>\n' +
                                '<tr class="text-center">\n' +
                                '    <td class="baris text-bold">' +
                                '       <div>' +
                                '          <span class="editable">Baris 1</span>' +
                                '          <span class="float-right hapus-baris" title="hapus baris: Baris 1" style="cursor: pointer">&times;</span>' +
                                '       </div>' +
                                '    </td>\n' +
                                '    <td><input class="check" type="checkbox" name="check1" style="height: 20px; width: 20px"></td>\n' +
                                '    <td><input class="check" type="checkbox" name="check1" style="height: 20px; width: 20px"></td>\n' +
                                '</tr>\n' +
                                '<tr class="text-center">\n' +
                                '    <td class="baris text-bold">' +
                                '       <div>' +
                                '          <span class="editable">Baris 2</span>' +
                                '          <span class="float-right hapus-baris" title="hapus baris: Baris 2" style="cursor: pointer">&times;</span>' +
                                '       </div>' +
                                '    </td>\n' +
                                '    <td><input class="check" type="checkbox" name="check2" style="height: 20px; width: 20px"></td>\n' +
                                '    <td><input class="check" type="checkbox" name="check2" style="height: 20px; width: 20px"></td>\n' +
                                '</tr>\n' +
                                '</table>' +
                                '<button type="button" class="btn btn-success btn-sm" onclick="addRow()"><i class="fa fa-plus"></i> Tambah Baris</button>';
                            $('#jawaban-jodohkan').html(table);
                            $('.editable').attr('contentEditable',true);

                            $('.hapus-kolom').on('click', function() {
                                var cell = $(this).closest('th'),
                                    index = cell.index() + 1;
                                cell.closest('table')
                                    .find('th, td')
                                    .filter(':nth-child(' + index + ')')
                                    .remove();
                            });

                            $('.hapus-baris').on('click', function() {
                                $(this).closest('tr').remove();
                            });

                        }
                    } else if (jenis_soal === '4') {
                        $('#jawaban-isian').val($.trim(data.jawaban));
                    } else {
                        var sJawabEssai = $($.parseHTML(`<div>${data.jawaban}</div>`));
                        sJawabEssai.find(`img`).each(function () {
                            var curSrc = $(this).attr('src');
                            if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                                $(this).attr('src', base_url+curSrc);
                            } else if (curSrc.indexOf(base_url) === -1) {
                                var pathUpload = 'uploads';
                                var forReplace = curSrc.split(pathUpload);
                                $(this).attr('src', base_url + pathUpload + forReplace[1]);
                            }
                        });
						$('#jawaban-essai').summernote('code', sJawabEssai);
					}

                    let listMimeAudio = ['audio/mpeg', 'audio/ogg'];
                    let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];

                    var audioPendukung = '';

                    var videoPendukung = '';

                    $.each(data.file, function (i, v) {
                        if (listMimeAudio.indexOf(v.type) > -1) {
                        	audioPendukung += '<audio id="audio-att">' +
                                '    <source src="'+base_url + v.src+'" type="'+v.type+'" />' +
                                '  </audio>' +
                            '        <span>'+v.src+'</span>';
                        } else {
                            videoPendukung += '    <span>' +v.file_name+
								'</span><br><video id="video-att" width="100" height="auto" src="'+base_url + v.src+'" controls></video>' +
                                '        <span>3 x</span>';
						}
                    });

                    $('#audios').html(audioPendukung);
                    $('#videos').html(videoPendukung);

                    $('#audio-att, #video-att').stylise({
						//enableSeeking: false,
						enableRestart: false
					});
				}
                $('[data-toggle="tooltip"]').tooltip();

				/*
                $('.note-editable').find('p').each(function () {
                    if(HasArabicCharacters($(this))){
                        $(this).removeAttr('style');
                        $(this).attr('style', '"font-family: "uthmanic"; font-size: 22pt;"');
                    }

                    $(this).find('span').each(function () {
                        console.log(HasArabicCharacters($(this)));
                        if(HasArabicCharacters($(this))){
                            $(this).removeAttr('style');
                            $(this).attr('style', '"font-family: "uthmanic"; font-size: 22pt;"');
                        }
                    });
                });
                */
            },
			error: function (e) {
				$('#loading').addClass('d-none');
				console.log("error", e.responseText);
				showDangerToast(e.responseText);
			}
		});
		}, 500);
}

function tambahSoalPg(e) {
	var nomor = $(e).data('nomor');
    var bank = $(e).data('bank');
    var mapel = $(e).data('mapel');

    $.ajax({
        url: base_url + "cbtbanksoal/tambahSoal",
        type: "POST",
        dataType: "JSON",
        data: {
        	nomor: nomor,
			jenis: 1,
			bank: bank
		},
        success: function (data) {
            console.log(data);
            window.location.href = base_url + 'cbtbanksoal/buatsoal/'+bank+'?tab=1';
        }, error: function (xhr, status, error) {
            console.log("error", xhr.responseText);
            showDangerToast('Gagal menambah soal');
        }
    });
}

function tambahSoalPg2(e) {
    var nomor = $(e).data('nomor');
    var bank = $(e).data('bank');
    var mapel = $(e).data('mapel');

    $.ajax({
        url: base_url + "cbtbanksoal/tambahSoal",
        type: "POST",
        dataType: "JSON",
        data: {
            nomor: nomor,
            jenis: 2,
            bank: bank
        },
        success: function (data) {
            console.log(data);
            window.location.href = base_url + 'cbtbanksoal/buatsoal/'+bank+'?tab=2';
        }, error: function (xhr, status, error) {
            console.log("error", xhr.responseText);
            showDangerToast('Gagal menambah soal');
        }
    });
}

function tambahSoalJodohkan(e) {
    var nomor = $(e).data('nomor');
    var bank = $(e).data('bank');
    var mapel = $(e).data('mapel');

    $.ajax({
        url: base_url + "cbtbanksoal/tambahSoal",
        type: "POST",
        dataType: "JSON",
        data: {
            nomor: nomor,
            jenis: 3,
            bank: bank
        },
        success: function (data) {
            console.log(data);
            window.location.href = base_url + 'cbtbanksoal/buatsoal/'+bank+'?tab=3';
        }, error: function (xhr, status, error) {
            console.log("error", xhr.responseText);
            showDangerToast('Gagal menambah soal');
        }
    });
}

function tambahSoalIsian(e) {
    var nomor = $(e).data('nomor');
    var bank = $(e).data('bank');
    var mapel = $(e).data('mapel');

    $.ajax({
        url: base_url + "cbtbanksoal/tambahSoal",
        type: "POST",
        dataType: "JSON",
        data: {
            nomor: nomor,
            jenis: 4,
            bank: bank
        },
        success: function (data) {
            console.log(data);
            window.location.href = base_url + 'cbtbanksoal/buatsoal/'+bank+'?tab=4';
        }, error: function (xhr, status, error) {
            console.log("error", xhr.responseText);
            showDangerToast('Gagal menambah soal');
        }
    });
}

function tambahSoalEssai(e) {
    var nomor = $(e).data('nomor');
    var bank = $(e).data('bank');
    var mapel = $(e).data('mapel');

    $.ajax({
        url: base_url + "cbtbanksoal/tambahSoal",
        type: "POST",
        dataType: "JSON",
        data: {
            nomor: nomor,
            jenis: 5,
            bank: bank
        },
        success: function (data) {
            console.log(data);
            window.location.href = base_url + 'cbtbanksoal/buatsoal/'+bank+'?tab=5';
        }, error: function (xhr, status, error) {
            console.log("error", xhr.responseText);
            showDangerToast('Gagal menambah soal');
        }
    });
}

function uploadAttach(action, data) {
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: action,
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {
            console.log('result', data);
            if (data.status) {
                dataFiles = data.files;
                /*
                var item = {};
                item ['size'] = data.size;
                item ["type"] = data.type;
                item ["src"] = data.src;
                item ["name"] = data.filename;
                dataFiles.push(item);
                console.log(data.type);
                */
                createPreviewFile();
			} else {
                swal.fire({
                    title: "ERROR",
                    html: data.src,
                    icon: "error",
                    showCancelButton: false
                });
			}
        },
        error: function (e) {
            console.log("error", e.responseText);
            showDangerToast("file tidak terbaca");}
    });
}

function createPreviewFile(/*elem, event*/) {
    //var files = event.target.files;
    for (var j = 0; j < dataFiles.length; j++) {
        let file = dataFiles[j];
        //names_files.push(elem.get(0).files[j].name);
        if (file.file_name !== "") {

            var div = document.createElement("li");
            div.setAttribute("id", "f-" + file.alias);
            if (!$("#f-" + file.alias).length) {
                if (file.type.match('image')) {
                    div.innerHTML = "<img src='" + base_url + file.src + "'/>" +
                        "<div  class='post-thumb'>" +
                        "<div class='inner-post-thumb'>" +
                        "<a href='javascript:void(0);' data-id='" + file.alias + "' class='remove-pic'>" +
                        "<i class='fa fa-times' aria-hidden='true'></i></a>" +
                        "<div>" +
                        "</div>";
                    $("#media-list").prepend(div);
                } else if (file.type.match('video')) {
                    div.innerHTML = "<video src='" + file.src + "'></video>" +
                        "<div class='post-thumb'>" +
                        "<div  class='inner-post-thumb'>" +
                        "<a href='javascript:void(0);' data-id='" + file.alias + "' class='remove-pic'>" +
                        "<i class='fa fa-times' aria-hidden='true'></i></a>" +
                        "<div>" +
                        "</div>";
                    $("#media-list").prepend(div);
                } else {
                    div.innerHTML = "<img src='" + base_url + "/assets/app/img/document_file.png'>" +
                        "<div class='post-thumb'>" +
                        "<div  class='inner-post-thumb'>" +
                        "<a href='javascript:void(0);' data-id='" + file.alias + "' class='remove-pic'>" +
                        "<i class='fa fa-times' aria-hidden='true'></i></a>" +
                        "<div>" +
                        "</div>";
                    $("#media-list").prepend(div);
                }
            }
        }
    }
    console.log(dataFiles);
}

$('body').on('click', '.remove-pic', function() {
    $(this).parent().parent().parent().remove();
    var removeItem = $(this).attr('data-id');

    for (var i = 0; i < dataFiles.length; i++) {
        var cur = dataFiles[i];
        if (cur.alias === removeItem) {
            dataFiles.splice(i, 1);
            deleteImage(cur.src);
            break;
        }
    }
    console.log(dataFiles);
});

function deleteImage(src) {
    $.ajax({
        data: {src: src},
        type: "POST",
        url: base_url + "cbtbanksoal/deletefile",
        cache: false,
        success: function (response) {
            console.log(response);
        }
    });
}

function createTableJodohkan(data) {
    var trs = '<table id="table-jodohkan" class="table table-sm table-bordered">';
    $.each(data.jawaban, function (k, v) {
        if (k === 0) {
            trs += '<tr class="text-center">';
            $.each(v, function (key, val) {
                if (key === 0) {
                    trs += '<th class="text-white">'+val+'</th>';
                } else {
                    trs += '<th class="kolom">' +
                        '<div>' +
                        '<span class="editable">'+val+'</span>' +
                        '<span class="float-right hapus-kolom" title="hapus kolom: '+val+'" style="cursor: pointer">&times;</span>' +
                        '</div>' +
                        '</th>';
                }
            });
            trs += '</tr>';
        } else {
            trs += '<tr class="text-center">';
            $.each(v, function (t, i) {
                if (t === 0) {
                    trs += '<td class="baris text-bold">' +
                        '<div>' +
                        '<span class="editable">'+i+'</span>' +
                        '<span class="float-right hapus-baris" title="hapus baris: '+i+'" style="cursor: pointer">&times;</span>' +
                        '</div>' +
                        '</td>';
                } else {
                    const checked = i == '0' ? '' : ' checked';
                    const type = data.type != '2' ? 'checkbox' : 'radio';
                    trs += '<td>' +
                        '<input class="check" type="'+type+'" name="check'+k+'" style="height: 20px; width: 20px"'+checked+'>' +
                        '</td>';
                }
            });
            trs += '</tr>';
        }
    });
    trs += '</table>' +
        '<button type="button" class="btn btn-success btn-sm" onclick="addRow()"><i class="fa fa-plus"></i> Tambah Baris</button>';
    $('#jawaban-jodohkan').html(trs);
    $('.editable').attr('contentEditable',true);

    $('.hapus-kolom').on('click', function() {
        var cell = $(this).closest('th'),
            index = cell.index() + 1;
        cell.closest('table')
            .find('th, td')
            .filter(':nth-child(' + index + ')')
            .remove();
    });

    $('.hapus-baris').on('click', function() {
        $(this).closest('tr').remove();
    });

    $('#type-opsi').on('change', function () {
        if ($(this).val() == '2') {
            $('.check').attr('type', 'radio');
        } else {
            $('.check').attr('type', 'checkbox');
        }
    });
}

function createListJodohkan(data) {
    var list = '<div class="bonds" id="original" style="display:block;"></div>' +
        //'<button type="button" class="btn fieldLinkerSave btn-sm btn-primary">Save links</button>\n' +
        //'&nbsp;<span id="output"></span>\n' +
        //'<br /><br />\n' +
        //'<div id="input"></div>' +
        '<hr><span>Untuk menambah / mengurangi list dan mengedit teks kiri / kanan, silahkan gunakan MODEL Table. Setelah selesai pengeditan, pilih lagi MODEL List</span>';
    $('#jawaban-jodohkan').html(list);

    var mode = data.type == '2' ? "oneToOne" : "manyToMany";
    var inputs = {
        "localization": {
        },
        "options": {
            "associationMode": mode, // oneToOne,manyToMany
            "lineStyle": "square-ends",
            "buttonErase": false,//"Batalkan",
            "displayMode": "original",
            "whiteSpace": 'normal', //normal,nowrap,pre,pre-wrap,pre-line,break-spaces default => nowrap
            "mobileClickIt": true
        },
        "Lists": [
            {
                "name": "baris-kiri"+nomor_soal,
                "list": data.jawaban[0]
            },
            {
                "name": "baris-kanan"+nomor_soal,
                "list": data.jawaban[1],
                //"mandatories": ["last_name", "email_adress"]
            }
        ],
        "existingLinks": data.linked
    };
    //console.log('no-soal', nomor_soal);
    /*
    $(".fieldLinkerSave").on("click",function(){
        var results = fieldLinks.fieldsLinker("getLinks");
        $("#output").html("output => " + JSON.stringify(results));
    });
    */

    fieldLinks = $("#original").fieldsLinker("init", inputs);

    $('#type-opsi').on('change', function () {
        if ($(this).val() == '2') {
            fieldLinks.fieldsLinker("changeParameters",{"associationMode": "oneToOne"});
        } else {
            fieldLinks.fieldsLinker("changeParameters",{"associationMode": "manyToMany"});
        }
    });

    /* test disable click
    $(`ul[data-col="baris-kiri${nomor_soal}"] li`).click(function(e) {
        var from = $(e.target).text();
        console.log('klik', from);
        var results = fieldLinks.fieldsLinker("getLinks");
        console.log('res', results);
        var count = 0;
        results.links.forEach(function(e) {
            if (from == e.from) {
                count ++;
            }
        });
        console.log('count', count);
        if (count >= 3) {
            $(e.target).removeClass('selected');
            $('.FL-main').trigger('click');
        }
    });

    $('.FL-main').on('click', function (e) {
        console.log('main klik');
    });
    */

    /*
    $("input[name='mobileClickIt']").on("click", function () {
        let isCheck = $(this).prop("checked");
        if(isCheck)
            $(this).addClass("active");
        else
            $(this).removeClass("active");

        $("#original").html="";
        inputOri.options.mobileClickIt = isCheck;
        fieldLinks=$("#original").fieldsLinker("init",inputOri);
    });
    */
}

var dataJodohkanTable = null, dataJodohkanList = null;
$(document).ready(function() {
    ajaxcsrf();

    //console.log('files', dataFiles);
    $('.textsoal').summernote({
        placeholder: 'Tulis Soal disini',
        tabsize: 2,
        minHeight: 100,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video', 'file']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ['cleaner',['cleaner']],
        ],
        callbacks: {
            onFileUpload: function(file) {
                var idtextarea = $(this);
                myOwnCallBack(file[0], idtextarea);
            },
            onImageUpload: function(images) {
                var idtextarea = $(this);
                myOwnCallBack(images[0], idtextarea);
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        },
        /*
        callbacks: {
            onImageUpload: function(image) {
                var idtextarea = $(this);
                uploadImage(image[0], idtextarea);
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        }
        */
    });

    $('.textjawaban').summernote({
        placeholder: 'Tulis Jawaban disini',
        tabsize: 2,
        minHeight: 50,
        toolbar: [
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            //['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ['insert', ['picture']],
        ],
        callbacks: {
            onImageUpload: function(images) {
                var idtextarea = $(this);
                myOwnCallBack(images[0], idtextarea);
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        },
    });

    $('.textjawaban-essai').summernote({
        placeholder: 'Tulis Jawaban disini',
        tabsize: 2,
        toolbar: [
            //['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            //['fontname', ['fontname']],
            //['fontsize', ['fontsize']],
            //['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            //['insert', ['video', 'file']],
            //['view', ['fullscreen', 'codeview', 'help']],
            //['cleaner',['cleaner']],
        ],
        /*
        callbacks: {
            onImageUpload: function(image) {
                var idtextarea = $(this);
                uploadImage(image[0], idtextarea);
            },
            onMediaDelete : function(target) {
                deleteImage(target[0].src);
            }
        }
        */
    });

    $("#picupload").on('change', function (e) {
        var form = new FormData($("#addfile")[0]);
        //console.log('nama file', names_files);
        //bank_id: id_bank, nomor: number, jenis: jenis_soal
        uploadAttach(base_url + 'cbtbanksoal/uploadfile?id_soal='+idSoal, form);
    });

    $('#create').submit('click', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        jenis = $('#jenis-id').val();

        //console.log(inputKosong());
        //console.log("data:", $(this).serialize());
        //var isDisabled = $('#type-opsi').prop('disabled');

        var jwbJodohkan = '';
        if (jenisSoal == '3') {
            var dataJodohkan = '';
            if ($('#table-jodohkan').length > 0) {
                dataJodohkan = JSON.stringify(getTableData());
            } else {
                var datalist = convertListToTable(getListData());
                dataJodohkan = JSON.stringify(datalist.jawaban);
            }
            jwbJodohkan = jenis == '3' ? '&jawaban_jodohkan=' + dataJodohkan + '&model=' + $('#model-opsi').val() + '&type=' + $('#type-opsi').val() : '';
        }
        var dataPost = $(this).serialize()+"&nomor_soal="+nomor_soal + jwbJodohkan;
        console.log(dataPost);

        if (inputKosong()) {
            swal.fire({
                title: "ERROR",
                text: "SOAL atau JAWABAN tidak boleh kosong",
                icon: "error",
                showCancelButton: false
            });
        } else {
            $('#loading').removeClass('d-none');
            setTimeout(function() {
                $.ajax({
                    url: base_url + "cbtbanksoal/saveSoal",
                    type: "POST",
                    dataType: "JSON",
                    data: dataPost,
                    success: function (data) {
                        $('#loading').addClass('d-none');
                        console.log(data);
                        if (data.status === 'error') {
                            swal.fire({
                                title: "ERROR",
                                text: "SOAL atau JAWABAN tidak boleh kosong",
                                icon: "warning",
                                showCancelButton: false
                            });
                        } else {
                            showSuccessToast("Soal nomor" + nomor_soal + " berhasil disimpan");
                            if (jenis==='1' || jenis==='2') {
                                $('#btn-'+jenis+nomor_soal).removeClass('btn-outline-danger');
                                $('#btn-'+jenis+nomor_soal).addClass('btn-success');
                            } else {
                                $('#btn-'+jenis+nomor_soal).removeClass('btn-outline-danger');
                                $('#btn-'+jenis+nomor_soal).addClass('btn-primary');
                            }
                        }
                    }, error: function (xhr, status, error) {
                        $('#loading').addClass('d-none');
                        console.log("error", xhr.responseText);
                        showDangerToast();
                    }
                });
            }, 500);
        }
    });

    //createPreviewFile();

    $('#tambah-jawaban-pg2').on('click', function (e) {
        var opsi2 = $('#opsi-pg2');
        var count = opsi2.find('.pg-kompleks').length + 65;
        console.log(String.fromCharCode(count));

        var alphaCaps = String.fromCharCode(count);
        var lower = alphaCaps.toLowerCase();

        //$('.letters').append('<div>' + String.fromCharCode(i) + '</div>');
        $('#opsi-pg2').append('<div class="pg-kompleks mb-4 ml-3">' +
            '    <div class="row mb-2">' +
            '       <div class="col-6"><b>Jawaban '+alphaCaps+'</b></div>' +
            '       <div class="col-6 text-right d-flex justify-content-end">' +
            '          <b>Jawaban banar</b>' +
            '          <input class="check-pg2" type="checkbox" style="width: 24px; height: 24px; margin-left: 8px;" name="jawaban_benar_pg2[]" value="'+lower+'">' +
            '       </div>' +
            '    </div>' +
            '    <textarea class="textjawaban2" id="textjawaban2_'+lower+'" name="jawaban2_'+lower+'" placeholder="Buat jawaban" style="width:100%;"></textarea>' +
            '</div>' );

        initTextArea();
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var tab = $(e.target);
        var target = tab.attr("href");
        var id, jenis;
        if (target == '#ganda') {
            id = '11';
            jenis = '1';
        } else if (target == '#kompleks') {
            id = '21';
            jenis = '2';
        } else if (target == '#jodoh') {
            id = '31';
            jenis = '3';
        } else if (target == '#isian') {
            id = '41';
            jenis = '4';
        } else if (target == '#essai') {
            id = '51';
            jenis = '5';
        } else {
            console.log('id not defined');
        }

        getSoalById(idBank, 1, id, jenis);
    });

    $('#model-opsi').on('change', function () {
        if ($(this).val() == '1') {
            if ($('#original').length < 1) {
                dataJodohkanList = convertTableToList(getTableData());
                createListJodohkan(dataJodohkanList);
                $('#btn-table').addClass('d-none');
            }
        } else {
            if ($('#table-jodohkan').length < 1) {
                dataJodohkanTable = convertListToTable(getListData());
                createTableJodohkan(dataJodohkanTable);
                $('#btn-table').removeClass('d-none');
            }
        }
    });

    var arrJenis = ['', 'PG', 'PG Kompleks', 'Menjodohkan', 'Isian Singkat', 'Uraian/essai'];
    $('#hapus-soal').on('click', function () {
        swal.fire({
            title: "HAPUS ?",
            html: "Soal berikut akan dihapus<br>Nomor: <b>" +nomor_soal+"</b><br>Jenis: <b>"+arrJenis[jenis]+"</b>",
            icon: "error",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if(result.value){
                console.log($('#create').serialize());
                $.ajax({
                    url: base_url + "cbtbanksoal/hapussoal",
                    method: "POST",
                    data: $('#create').serialize(),
                    success: function (result) {
                        console.log("result", result);
                        var tit = result.status ? 'BERHASIL' : 'GAGAL';
                        var msg = result.status ? 'berhasil' : 'gagal';
                        var ic = result.status ? 'success' : 'error';
                        swal.fire({
                            title: tit,
                            text: "Soal " + msg + " dihapus",
                            icon: ic,
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    }, error: function (xhr, status, error) {
                        console.log("error", xhr.responseText);
                        showDangerToast('ERROR!!');
                    }
                });
            }
        })

    });

    if (inArray(1, adaPg)) {

    }
    //var num = inArray('1', adaPg) ? 1 : 0;
    //console.log('num',num);
    getSoalById(idBank, 1, jenis+''+1, jenis);
});

function getTableData() {
    return $('#table-jodohkan tr').get().map(function (row) {
        var $tables = [];

        $(row).find('th').get().map(function (cell) {
            var klm = $(cell).find('span.editable').text().trim();
            $tables.push(klm == "" ? "#" : klm);
        });

        $(row).find('td').get().map(function (cell) {
            if ($(cell).children('input').length > 0) {
                $tables.push($(cell).find('input').prop("checked") === true ? "1" : "0");
            } else {
                $tables.push($(cell).find('span.editable').text().trim())
            }
        });

        return $tables;
    });
}

function getListData() {
    var kolom = [];
    var baris = [];
    $(".FL-left li").each(function() {
        baris.push($(this).text());
    });
    $(".FL-right li").each(function() {
        kolom.push($(this).text());
    });
    return [kolom, baris];
}

function addColumn() {
    var $headers = $("th");
    let no = 0;
    const type = $('#type-opsi').val() == '2' ? 'radio' : 'checkbox';
    $('#table-jodohkan').find('tr').each(function(){
        $(this).find('th').eq(-1).after('<th class="kolom">' +
            '      <div>' +
            '        <span class="editable">Kolom '+$headers.length+'</span>' +
            '        <span class="float-right hapus-kolom" title="hapus kolom: Kolom '+$headers.length+'" style="cursor: pointer">&times;</span>' +
            '      </div>' +
            '</th>');
        $(this).find('td').eq(-1).after('<td>' +
            '<input class="check" type="'+type+'" name="check'+no+'" style="height: 20px; width: 20px">' +
            '</td>');
        no ++;
    });
    $('.editable').attr('contentEditable',true);

    $('[data-toggle="tooltip"]').tooltip();

    $('.hapus-kolom').on('click', function() {
        var cell = $(this).closest('th'), index = cell.index() + 1;
        cell.closest('table')
            .find('th, td')
            .filter(':nth-child(' + index + ')')
            .remove();
        $('[data-toggle="tooltip"]').tooltip('hide');
    });
}

function addRow() {
    const type = $('#type-opsi').val() == '2' ? 'radio' : 'checkbox';
    var $rows = $("tr");
    var $headers = $("th");
    //console.log($headers);
    var tds = '';
    const countKolom = $headers.length;
    for (let i = 0; i < countKolom - 1; i++) {
        tds += '<td>' +
            '<input class="check" type="'+type+'" name="check'+ $rows.length +'" style="height: 20px; width: 20px">' +
            '</td>';
    }
    $('#table-jodohkan tr:last').after('<tr class="text-center">' +
        '<td class="baris text-bold">' +
        '       <div>' +
        '          <span class="editable">Baris '+$rows.length+'</span>' +
        '          <span class="float-right hapus-baris" title="hapus baris: Baris '+$rows.length+'" style="cursor: pointer">&times;</span>' +
        '       </div>' +
        '</td>' +
        tds +
        '</tr>');
    $('.editable').attr('contentEditable',true);

    $('[data-toggle="tooltip"]').tooltip();

    $('.hapus-baris').on('click', function() {
        $(this).closest('tr').remove();
        $('[data-toggle="tooltip"]').tooltip('hide');
    });
}

function convertTableToList(array) {
    var kanan = array.shift();
    var kiri = [];
    $.each(array, function (i, v) {
        kiri.push(v.shift());
    });
    kanan.shift();

    var linked = [];
    $.each(array, function (n, arv) {
        $.each(arv, function (t, v) {
            if (v != '0') {
                var it = {};
                it['from'] = kiri[n];
                it['to'] = kanan[t];
                linked.push(it);
            }
        });
    });
    var item = {};
    item['type'] = $('#type-opsi').val();
    item['jawaban'] = [kiri, kanan];
    item['linked'] = linked;
    return item;
}

function convertListToTable(array) {
    if (jenisSoal != '3') return;
    var results = fieldLinks.fieldsLinker("getLinks");
    var links = results.links;
    console.log('linked', links);

    var kolom = array[0];
    console.log('kolom', kolom);
    var arrayres = [];
    $.each(array[1], function (ind, val) {
        var vv = [];
        for (let i = 0; i < kolom.length; i++) {
            var sv = '0';
            if (links.length > 0) {
                $.each(links, function (p, isi) {
                    if (isi.from == val) {
                        if (isi.to == kolom[i]) {
                            sv = '1';
                            //console.log('k', isi.from, val);
                            //console.log('b', isi.to, kolom[i]);
                        }
                    }
                });
            }
            vv.push(sv);
        }

        vv.unshift(val);
        arrayres.push(vv);
    });
    kolom.unshift('#');
    arrayres.unshift(kolom);
    console.log('aray', arrayres);

    var item = {};
    item['model'] = $('#model-opsi').val();
    item['type'] = $('#type-opsi').val();
    item['jawaban'] = arrayres;
    return item;
}

//function replaceAll(str, find, replace) {
//    return str.replace(new RegExp(find, 'g'), replace);
//}

function HasArabicCharacters(text){
    var arregex = /[\u0600-\u06FF]/;
    return arregex.test(text);
}
