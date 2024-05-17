var jenisSoal;
var fieldLinks;

let dataJodohkan;
let adaJawaban = false;

$(document).ready(function() {
    ajaxcsrf();
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
            ['insert', ['link', 'picture', 'video', 'file', 'math']],
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
            ['insert', ['picture', 'math']],
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
            ['insert', ['math']],
            //['view', ['fullscreen', 'codeview', 'help']],
            //['cleaner',['cleaner']],
        ],
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

        let formData = new FormData($('#create')[0]);
        formData.append('nomor_soal', nomor_soal)

        if (jenisSoal == '3') {
            if (!adaJawaban) {
                swal.fire({
                    title: "ERROR",
                    text: "JAWABAN tidak boleh kosong",
                    icon: "error",
                    showCancelButton: false
                });
                return
            }
            $.each(dataJodohkan, function( key, value ) {
                if (key === "jawaban") {
                    $.each(value, function (ks, vs) {
                        $.each(vs, function (k, v) {
                            formData.append('jawaban['+ks+']['+k+']',  v)
                        })
                    })
                } else {
                    formData.append(key, value)
                }
            });
        }
        console.log(Object.fromEntries(formData))

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
                    processData: false,
                    contentType: false,
                    data: formData,
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

    $('#tambah-jawaban-pg2').on('click', function (e) {
        var opsi2 = $('#opsi-pg2');
        var count = opsi2.find('.pg-kompleks').length + 65;
        console.log(String.fromCharCode(count));

        var alphaCaps = String.fromCharCode(count);
        var lower = alphaCaps.toLowerCase();

        $('#opsi-pg2').append('<div class="pg-kompleks mb-4 ml-3">' +
            '    <div class="row mb-2">' +
            '       <div class="col-6">' +
            '          <button type="button" class="btn btn-sm btn-default mr-4" onclick="deleteOpsiPg2(this)">' +
            '<i class="fa fa-trash"></i></button>' +
            '<span class="abjad-pg2"><b>Jawaban ' + alphaCaps + '</b></span></div>' +
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
                        var tit = result ? 'BERHASIL' : 'GAGAL';
                        var msg = result ? 'berhasil' : 'gagal';
                        var ic = result ? 'success' : 'error';
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
    getSoalById(idBank, nomor_soal, jenis+''+nomor_soal, jenis);
});

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
            ['insert', ['picture', 'math']],
        ],
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
                        if (curSrc.indexOf("base64") > 0 || !curSrc.includes("uploads")) {
                        } else {
                            var pathUpload = 'uploads';
                            var forReplace = curSrc.split(pathUpload);
                            $(this).attr('src', base_url + pathUpload + forReplace[1]);
                        }
						$(this).removeAttr('alt');
                    });

                    sSoal.find(`video`).each(function () {
                        var curSrc = $(this).attr('src');
                        if (curSrc.indexOf("base64") > 0) {
                        } else {
                            var pathUpload = 'uploads';
                            var forReplace = curSrc.split(pathUpload);
                            $(this).attr('src', base_url + pathUpload + forReplace[1]);
                        }
                    });

                    sSoal.find(`audio`).each(function () {
                        var curSrc = $(this).attr('src');
                        if (curSrc.indexOf("base64") > 0) {
                        } else {
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
								$(this).removeAttr('alt');
                                var curSrc = $(this).attr('src');
                                if (curSrc.indexOf("base64") > 0 || !curSrc.includes("uploads")) {
                                } else {
                                    var pathUpload = 'uploads';
                                    var forReplace = curSrc.split(pathUpload);
                                    $(this).attr('src', base_url + pathUpload + forReplace[1]);
                                }
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
                                var pv = $($.parseHTML(v));
                                pv.find(`img`).each(function () {
                                    var curSrc = $(this).attr('src');
                                    if (curSrc.indexOf("base64") > 0 || !curSrc.includes("uploads")) {
                                    } else {
                                        var pathUpload = 'uploads';
                                        var forReplace = curSrc.split(pathUpload);
                                        $(this).attr('src', base_url + pathUpload + forReplace[1]);
                                    }
                                })

                                jwb2 += '<div class="pg-kompleks mb-4 ml-3">' +
                                    '    <div class="row mb-2">' +
                                    '       <div class="col-6">' +
                                    '          <button type="button" class="btn btn-sm btn-default mr-4" onclick="deleteOpsiPg2(this)">' +
                                    '<i class="fa fa-trash"></i></button>' +
                                    '<span class="abjad-pg2"><b>Jawaban ' + k.toUpperCase() + '</b></span></div>' +
                                    '       <div class="col-6 text-right d-flex justify-content-end">' +
                                    '          <b>Jawaban banar</b>' +
                                    '          <input class="check-pg2" type="checkbox" style="width: 24px; height: 24px; margin-left: 8px;" name="jawaban_benar_pg2[]" value="' + k + '" ' + checked + '>' +
                                    '       </div>' +
                                    '    </div>' +
                                    '    <textarea class="textjawaban2" id="textjawaban2_' + k + '" name="jawaban2_' + k + '" placeholder="Buat jawaban" style="width:100%;">' + pv.html(pv.clone()).html() + '</textarea>\n' +
                                    '</div>';
                            });
                        } else {
                            jwb2 += '<div class="pg-kompleks mb-4 ml-3">' +
                                '    <div class="row mb-2">' +
                                '       <div class="col-6">' +
                                '          <button type="button" class="btn btn-sm btn-default mr-4" onclick="deleteOpsiPg2(this)">' +
                                '<i class="fa fa-trash"></i></button>' +
                                '<span class="abjad-pg2"><b>Jawaban A</b></span></div>' +
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
                        let konten = $('#jawaban-jodohkan')
                        konten.html('')
                        if (!data.jawaban) {
                            data.jawaban = {
                                jawaban: [],
                                model: '1',
                                type: '2'
                            }
                        }
                        dataJodohkan = data.jawaban;
                        konten.linkerList({
                            data: data.jawaban,
                            id: nomor_soal,
                            viewMode: '3',
                            callback: function (id, data, hasLinks) {
                                //console.log('data:'+id, data, hasLinks)
                                dataJodohkan = data
                                adaJawaban = hasLinks
                            }
                        });
                    } else if (jenis_soal === '4') {
                        $('#jawaban-isian').val($.trim(data.jawaban));
                    } else {
                        var sJawabEssai = $($.parseHTML(`<div>${data.jawaban}</div>`));
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

function HasArabicCharacters(text){
    var arregex = /[\u0600-\u06FF]/;
    return arregex.test(text);
}

function deleteOpsiPg2(e) {
    $(e).closest('.pg-kompleks').remove();

    var opsi2 = $('#opsi-pg2');
    const $abjads = opsi2.find('.abjad-pg2')

    $abjads.each(function (index, sp) {
        $(sp).html('<b>Jawaban '+(index + 10).toString(36).toUpperCase()+'</b>')
    })

    const $teks = opsi2.find('.textjawaban2');
    $teks.each(function (index, area) {
        const abc = (index + 10).toString(36).toLowerCase();
        $(area).prop('id', 'textjawaban2_'+abc).prop('name', 'jawaban2_'+abc)
    })
}

function showEditDialog(el) {
    valSelected = $(el).closest('.float-right').prev();
    let dialog = $('#noteModal');
    let editorCode = $('#edit-dialog');
    dialog.modal('show')
    editorCode.summernote('code', valSelected.html())
}

function simpanValue() {
    let editorCode = $('#edit-dialog');
    valSelected.html(editorCode.summernote('code'));
    $('#noteModal').modal('hide');
}

function deleteOpsiPg2(e) {
    $(e).closest('.pg-kompleks').remove();

    var opsi2 = $('#opsi-pg2');
    const $abjads = opsi2.find('.abjad-pg2')

    $abjads.each(function (index, sp) {
        $(sp).html('<b>Jawaban '+(index + 10).toString(36).toUpperCase()+'</b>')
    })

    const $teks = opsi2.find('.textjawaban2');
    $teks.each(function (index, area) {
        const abc = (index + 10).toString(36).toLowerCase();
        $(area).prop('id', 'textjawaban2_'+abc).prop('name', 'jawaban2_'+abc)
    })
}

function encode(str) {
    var decoded = decodeURIComponent(str)
    var isEncoded = decoded !== str
    var encoded = encodeURIComponent(str)
    if (isEncoded) {
        return str
    } else {
        return encoded
    }
}

function decode(str) {
    var decoded = decodeURIComponent(str)
    var encoded = encodeURIComponent(decoded)
    var isEncoded = encoded === str
    if (isEncoded) {
        return decoded
    } else {
        return str
    }
}
