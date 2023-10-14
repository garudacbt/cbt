var dataSiswa;
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
        //dataUpload = '';
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

    $('#formPreviewExcel').find('.dropify-filename-inner').on('DOMSubtreeModified',function(e){
        var form = new FormData($("#formPreviewExcel")[0]);
        var filename = $(this).text();
        preview(base_url + 'datasiswa/previewExcel', form, filename);
    });

    $('#formUpload').submit('click', function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
		var dataPost = $(this).serialize() + "&siswa=" + JSON.stringify(dataSiswa);
		console.log("data:", dataPost);

		var url = typeImport === "add" ? "datasiswa/do_import" : "datasiswa/updateall";
        swal.fire({
            text: "Silahkan tunggu....",
            button: false,
            closeOnClickOutside: false,
            closeOnEsc: false,
            allowEscapeKey: false,
            allowOutsideClick: false,
            onOpen: () => {
                swal.showLoading();
            }
        });

        $.ajax({
            url: base_url + url,
            type: "POST",
            dataType: "JSON",
            data: dataPost,
            success: function (data) {
				console.log("response:", data);
                //window.history.back();
                if (data.status) {
                    swal.fire({
                        title: "Berhasil",
                        text: "Data siswa berhasil diimpor",
                        icon: "success"
                    }).then(result => {
                        if (result.value) {
                            window.history.back();
                        }
                    });
                } else {
                    let arrNisnDup = [];
                    let arrNisDup = [];
                    let arrUserDup = [];
                    $.each(data.errors, function (idx, o) {
                        console.log(idx, o);
                        if (o.nisn !== "") arrNisnDup.push("<br />" + idx + ": " +o.nisn);
                        if (o.nis !== "") arrNisDup.push("<br />" + idx + ": " +o.nis);
                        if (o.username !== "") arrUserDup.push("<br />" + idx + ": " +o.username);
                        });
                    let err = arrNisnDup.length ? `<b>${arrNisnDup.join("' ")}</b>` : '';
                    err += arrNisDup.length ? `<br /><b>${arrNisDup.join("' ")}</b>` : '';
                    err += arrUserDup.length ? `<br /><b>${arrUserDup.join("' ")}</b>` : '';
                    swal.fire({
                        title: "Gagal",
                        html: 'cek kembali siswa berikut: <br />'+err+'',
                        icon: "error"
                    }).then(result => {});
                }
            }, error: function (xhr, status, error) {
				$('#file-preview').html(xhr.responseText);
				console.log("error:", xhr);
                swal.fire({
                    title: "Gagal",
                    html: 'Gagal menyimpan data',
                    icon: "error"
                });
            }
        });
        return false;
    });

    $.fn.toJson = function(){
        if(!this.is('table')){
            return;
        }

        var results = [];

        this.find('table tr').each(function(indx, obj){
            var tds = $(obj).children('td');
            results.push(tds);
        });

        return results;
    }
});

function preview(action, data, filename) {
    console.log(filename);
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
            var html = '';
            var i;
            var no = 1;

            let arrNisn = [];
            let arrNis = [];
            let arrUser = [];
            let arrNisnDup = [];
            let arrNisDup = [];
            let arrUserDup = [];
            let arrSiswaDup = [];
            if (filename === "") {
                html = '<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>';
            } else {
				try {
                    dataResult = JSON.parse(data);
					dataSiswa = dataResult.siswa;
                    dataExists = dataResult.exist;
                    console.log("data", dataResult);
					html = '<table id="tableprev" class="table table-sm table-striped table-bordered nowrap w-100">' +
						'        <thead>' +
						'        <tr>' +
						'        <td class="text-center">No</td>' +
						'        <td>Nama</td>' +
						'        <td>NIS</td>' +
						'        <td>NISN</td>' +
						'        <td>Jenis_Kelamin</td>' +
						'        <td>Username</td>' +
						'        <td>Password</td>' +
						'        </tr>' +
						'        </thead>' +
						'        <tbody>';
					for (i = 0; i < dataSiswa.length; i++) {
                        const siswa = dataSiswa[i];
                        if (dataExists.length) {
                            const siswaDup = dataExists.find(function (obj) {
                                return obj.nisn === siswa.nisn || obj.nis === siswa.nis || obj.username === siswa.username
                            })
                            if (siswaDup) arrSiswaDup.push(siswaDup.nama);
                        }
					    if (arrNisn.includes(siswa.nisn)) {
                            arrNisnDup.push(siswa.nisn)
                        } else {
                            arrNisn.push(siswa.nisn)
                        }
                        if (arrNis.includes(siswa.nis)) {
                            arrNisDup.push(siswa.nis)
                        } else {
                            arrNis.push(siswa.nis)
                        }
                        if (arrUser.includes(siswa.username)) {
                            arrUserDup.push(siswa.username)
                        } else {
                            arrUser.push(siswa.username)
                        }

						html +=
							'<tr>' +
							'<td class="text-center">' + no++ + '</td>' +
							'<td>' + siswa.nama + '</td>' +
							'<td>' + siswa.nis + '</td>' +
							'<td>' + siswa.nisn + '</td>' +
							'<td>' + siswa.jenis_kelamin + '</td>' +
							'<td>' + siswa.username + '</td>' +
							'<td>' + siswa.password + '</td>' +
							'</tr>';
					}
					html +=  '</tbody></table>';
				} catch (e) {
                    console.log('error', e)
					html +=  '<p>Gagal menampilkan data, periksa format file yang diimport</p>' + data;
					showDangerToast(data);
				}
            }
            //console.log("duplikatNisn", arrNisnDup);
            //console.log("duplikatNis", arrNisDup);
            //console.log("duplikatUsername", arrUserDup);
            let htmlError = $('<ul><b>DUPLIKAT TEMPLATE</b></ul>');
            let invalidTemp = false;
            if (arrNisnDup.length) {
                invalidTemp = true;
                htmlError.append($(`<li>Ada ${arrNisnDup.length} duplikat NISN, silakan cek kembali NISN berikut: <br /><b>${arrNisnDup.join(", ")}</b></li>`))
            }
            if (arrNisDup.length) {
                invalidTemp = true;
                htmlError.append($(`<li>Ada ${arrNisDup.length} duplikat NIS, silakan cek kembali NIS berikut: <br /><b>${arrNisDup.join(", ")}</b></li>`))
            }
            if (arrUserDup.length) {
                invalidTemp = true;
                htmlError.append($(`<li>Ada ${arrUserDup.length} duplikat USERNAME, silakan cek kembali USERNAME berikut: <br /><b>${arrUserDup.join(", ")}</b></li>`))
            }

            let invalidDb = false;
            let dbError = $('<ul><b>DUPLIKAT DATABASE</b></ul>');
            if (arrSiswaDup.length > 0) {
                invalidDb = true;
                dbError.append($(`<li><b>${arrSiswaDup.length}</b> Siswa menggunakan NISN/NIS/USERNAME yang sudah digunakan dalam DATABASE, silakan cek kembali Siswa berikut: <br /><b>${arrSiswaDup.join(", ")}</b></li>`))
            }

            let alert = $('<div class="alert alert-default-danger align-content-center" role="alert"></div>');
            if (invalidTemp) alert.append(htmlError)
            if (invalidDb) alert.append(dbError)

            const content = $('#file-preview')
            content.html('')
            if ((invalidTemp || invalidDb) && typeImport === "add") {
                content.append(alert)
            }
            content.append(html)

            //var attrId = document.getElementById("formInput");
            //attrId.setAttribute("value", data);

			$('#tableprev').DataTable({
				"paging":   false,
				"ordering": false,
				"info":     false,
				"scrollX": 	true
			});
			if (typeImport === "add" && (invalidTemp || invalidDb)) {
                $('#submit-excel').attr('disabled', 'disabled');
            } else {
                $('#submit-excel').removeAttr('disabled');
            }
		},
        error: function (e) {
            console.log("error", e.responseText);
            showDangerToast(e.responseText);
        }
    });
}

function parse(data) {

    $.htmlParser(data, {
        start: function () {
            // 'this' is a jQuery object representing the current node
            console.log('Start tag: <' + this.prop('tagName') + '>');
        },
        end: function () {
            console.log('End tag: </' + this.prop('tagName') + '>');
        },
        text: function () {
            console.log('Text: ' + this.text());
        },
        comment: function (text) {
            console.log('Comment: ' + this.text());
        }
    });
}

/*
function onFileChange(input){
    require("docx2html")(input.files[0]).then(function(converted){
        console.log(converted.toString())
    })
}*/

function onRemoved() {
    $(".dropify-filename-inner").text("");
}
