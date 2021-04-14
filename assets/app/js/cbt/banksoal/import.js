var pg;
var essai;
$(document).ready(function () {
    ajaxcsrf();

    $('.dropify').dropify({
            tpl: {
                wrap: '<div class="dropify-wrapper"></div>',
                loader: '<div class="dropify-loader"></div>',
                message: '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
                preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
                filename: '<p class="dropify-filename"><span class="file-icon"></span> <span class="dropify-filename-inner"></span></p>',
                clearButton: '<button type="button" class="dropify-clear" onclick="onRemoved()">{{ remove }}</button>',
                errorLine: '<p class="dropify-error">{{ error }}</p>',
                errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
            }
        },
        {
            error: {
                'fileSize': 'The file size is too big ({{ value }} max).',
                'minWidth': 'The image width is too small ({{ value }}}px min).',
                'maxWidth': 'The image width is too big ({{ value }}}px max).',
                'minHeight': 'The image height is too small ({{ value }}}px min).',
                'maxHeight': 'The image height is too big ({{ value }}px max).',
                'imageFormat': 'The image format is not allowed ({{ value }} only).'
            }
        });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify');

    $('#toggleDropify').on('click', function (e) {
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        } else {
            drDestroy.init();
        }
    });

    // Used events
    var drEvente = $('#input-file-events-excel').dropify();
    var drEventw = $('#input-file-events-word').dropify();

    drEvente.on('dropify.beforeClear', function (event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvente.on('dropify.afterClear', function (event, element) {
		html = '<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>';
		$('#file-preview').html(html);
    });

    drEvente.on('dropify.errors', function (event, element) {
        console.log('Has Errors');
        $.toast({
            heading: "Error",
            text: "file rusak",
            icon: 'warning',
            showHideTransition: 'fade',
            allowToastClose: true,
            hideAfter: 5000,
            position: 'top-right'
        });
    });

    $('#formPreviewExcel').on('input',function(e){
        var form = new FormData($("#formPreviewExcel")[0]);
        var filename = $(this).text();
        preview(base_url + 'cbtbanksoal/previewexcel', form, filename);
    });

    /*
    $('#formPreviewWord').on('input',function(e){
        var form = new FormData($("#formPreviewWord")[0]);
        var filename = $(this).text();
		console.log(form);
        preview(base_url + 'cbtbanksoal/previewword/'+bank_id, form, filename);
    });
    */
    $('#formPreviewWord').on('submit',function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        var form = new FormData($("#formPreviewWord")[0]);
        var filename = $(this).text();
        console.log(form);
        preview(base_url + 'cbtbanksoal/previewword/'+bank_id, form, filename);
    });

    $('#formUpload').submit('click', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var dataUpload = $(this).serialize() + "&ganda="+JSON.stringify(pg).replaceAll('\\n', '');
        console.log('dataUpload',dataUpload);
        //console.log("data:", $(this).serialize() + "&datasoal=" + JSON.stringify(dataUpload));

        $.ajax({
            url: base_url + "cbtbanksoal/import",
            type: "POST",
            dataType: "json",
            data: dataUpload,//$(this).serialize() + "&datasoal=" + JSON.stringify(dataUpload),
            success: function (result) {
				console.log("result", result);
                if(result.data > 0) {
                    swal.fire({
                        title: "Berhasil",
                        text: result.data + " soal berhasil disimpan",
                        icon: "success"
                    }).then(result => {
                        if(result.value){
                            window.history.back();
                        }
                    })
                } else {
                    swal.fire({
                        title: "Gagal",
                        text: "Tidak ada soal yg disimpan",
                        icon: "error"
                    });
                }
            }, error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
                swal.fire({
                    title: "Gagal",
                    text: "Tidak ada soal yg disimpan",
                    icon: "error"
                });
            }
        });
    });
});

function preview(action, data, filename) {
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
            console.log("data", data);
			//console.log("error", JSON.stringify(JSON.parse(data), null, 2));
			var html = '';
            var i;

            if (filename == "") {
                html = '<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>';
            } else {
                swal.fire({
                    title: "Sukses",
                    text: data.data + " Soal berhasil diimport",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                });

                try {
					var no = 1;
					//var json = JSON.parse(data.replaceAll('&#13;', ''));
					pg = data.pg;
					html += '<h5><b>A. Soal Pilihan Ganda</b></h5><br /><ol class="soallist" type="1">';
					for (i = 0; i < pg.length; i++) {
						if (pg[i].jenis === '1') {
							html +=
								'<li>' + pg[i].soal +
								'<ol class="jawablist" type="A">' +
								'<li value="jawaban_a">' + pg[i].jawaban_a + '</li>' +
								'<li value="jawaban_b">' + pg[i].jawaban_b + '</li>' +
								'<li value="jawaban_c">' + pg[i].jawaban_c + '</li>' +
								'<li value="jawaban_d">' + pg[i].jawaban_d + '</li>';
							if (jenjang == '3') {
							    html += '<li value="jawaban_e">' + pg[i].jawaban_e + '</li>';
                            }
                            html += '</ol><br/>' +
								'<p><b>Kunci Jawaban: ' + pg[i].jawaban + '</b></p>' +
								'</li>';
						}
						no++;
					}
					html += '</ol>';

					html += '<hr/><h5><b>B. Soal Essai</b></h5><br /><ol class="soallist" type="1">';
					for (i = 0; i < pg.length; i++) {
						if (pg[i].jenis === '2') {
							html +=
								'<li>' + pg[i].soal + '</li>'+
								'<p><b>Jawaban: ' + pg[i].jawaban + '</b></p><hr/>';
						}
						no++;
					}
					html += '</ol>';
				} catch (e) {
					html +=  '<p>Gagal menampilkan data, periksa format file yang diimport</p>' + data;
					showDangerToast(data);
				}
            }
            $('#file-preview').html(html);

            var attrId = document.getElementById("formInput");
            attrId.setAttribute("value", bank_id);

            $('#file-preview img').each(function () {
                var curSrc = $(this).attr('src');
                if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                    $(this).attr('src', base_url+curSrc);
                }
            });

        },
        error: function (e) {
            console.log("error", e.responseText);
            showDangerToast(e.responseText);
        }
    });
}

function onRemoved() {
    $(".dropify-filename-inner").text("");
}
