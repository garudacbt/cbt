var nomor_soal = 1;
var jenis = '1';

$(document).ready(function() {
    ajaxcsrf();

    //console.log('files', dataFiles);
	$('.textsoal').summernote({
		placeholder: 'Tulis Soal disini',
		tabsize: 2,
		minHeight: 300,
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
			//['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['table', ['table']],
			['insert', ['link', 'picture']],
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

	$('.textjawaban-essai').summernote({
		placeholder: 'Tulis Jawaban disini',
		tabsize: 2,
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

    /*
	function uploadImage(image, idtextarea) {
		var name = $('#textsoal').attr('data-name');
		var hash = $('#textsoal').attr('data-id');

		var data = new FormData();
		data.append("image", image);
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
	*/

	$('#create').submit('click', function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();
		jenis = $('#jenis-id').val();

		//console.log(inputKosong());
		//console.log("data:", $(this).serialize());
		var dataPost = $(this).serialize()+"&nomor_soal="+nomor_soal;

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
							if (jenis==='1') {
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

	createPreviewFile();
});

var old_id = 11;
function getSoalById(id_bank, number, id, jenis_soal) {
	$('#btn-'+old_id).removeClass('active');
	$('#btn-'+id).addClass('active');
	$('#jenis-id').val(jenis_soal);
	if (jenis_soal === '1') {
		$('#nomor-soal').html('<b>Soal PG Nomor: '+number + '</b>');
		$('#root-opsi-pg').removeClass('d-none');
		$('#root-jawaban-pg').removeClass('d-none');
		$('#jawaban').prop('required',true);
		$('#root-jawaban-essai').addClass('d-none');
	} else {
		$('#nomor-soal').html('<b>Soal Essai Nomor: '+number + '</b>');
		$('#root-opsi-pg').addClass('d-none');
		$('#root-jawaban-pg').addClass('d-none');
		$('#jawaban').prop('required',false);
		$('#root-jawaban-essai').removeClass('d-none');
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
			success: function (data) {
				$('#loading').addClass('d-none');
				console.log('soal', data);
				if (data == null) {
					$('#soal-id').val('0');
					$('#method').val('add');
					$('#textsoal').summernote('code', '');
					$(".textjawaban").each(function(){
						$(this).summernote('code', '');
					});
					$('#jawaban').prop('selectedIndex', 0).change();
					$('#jawaban-essai').summernote('code', '');
				} else {
					$('#soal-id').val(data.id_soal);
					$('#method').val('edit');

					var checkSoal = data.soal == null ? '' : data.soal;
                    var sSoal = $($.parseHTML(`<div>${checkSoal}</div>`));
                    sSoal.find(`img`).each(function () {
                        var curSrc = $(this).attr('src');
                        if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                            $(this).attr('src', base_url+curSrc);
                        }
                    });

					$('#textsoal').summernote('code', sSoal);

					if (jenis_soal === '1') {
						let arrJawaban = [data.opsi_a, data.opsi_b, data.opsi_c, data.opsi_d, data.opsi_e];
						let arrAbjad = ['a', 'b', 'c', 'd', 'e'];

						$.each(arrJawaban, function(i, item) {
							var chekJawaban = arrJawaban[i] == null ? '' : arrJawaban[i];
                            var sJawabPg = $($.parseHTML(`<div>${chekJawaban}</div>`));
                            sJawabPg.find(`img`).each(function () {
                                var curSrc = $(this).attr('src');
                                if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                                    $(this).attr('src', base_url+curSrc);
                                }
                            });
                            $('#textjawaban_'+arrAbjad[i]).summernote('code', sJawabPg);

                        });

						var jwb = $.trim((data.jawaban).toLowerCase());
						console.log(jwb);
						$('#jawaban').prop('selectedIndex', arrAbjad.indexOf(jwb)+1).change();

						//for(let i = 'a'.charCodeAt(0); i <= 'd'.charCodeAt(0); i++) {
						//console.log(String.fromCharCode(i));
						//}
					} else {
                        var sJawabEssai = $($.parseHTML(`<div>${data.jawaban}</div>`));
                        sJawabEssai.find(`img`).each(function () {
                            var curSrc = $(this).attr('src');
                            if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                                $(this).attr('src', base_url+curSrc);
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

            },
			error: function (e) {
				$('#loading').addClass('d-none');
				console.log("error", e.responseText);
				showDangerToast(e.responseText);
			}
		});
		}, 500);
}

function inputKosong() {
	var kosong = true;
	if (jenis === '1') {
		$('.textjawaban').each(function() {
			if ($(this).summernote('isEmpty')) {
				kosong = true;
				return false;
			} else {
				kosong = false;
			}
		});
	} else {
		kosong = $('.textjawaban-essai').summernote('isEmpty');
	}
	return kosong;
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
            window.location.reload();
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
            jenis: 2,
            bank: bank
        },
        success: function (data) {
            console.log(data);
            window.location.reload();
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
