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

        $.ajax({
            url: base_url + url,
            type: "POST",
            dataType: "JSON",
            data: dataPost,
            success: function (data) {
				//console.log("response:", data);
                window.history.back();
            }, error: function (xhr, status, error) {
				$('#file-preview').html(xhr.responseText);
				//console.log("error:", xhr);
                $.toast({
                    heading: "ERROR!!",
                    text: "file tidak terbaca",
                    icon: 'error',
                    showHideTransition: 'fade',
                    allowToastClose: true,
                    hideAfter: 5000,
                    position: 'top-right'
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

            if (filename === "") {
                html = '<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>';
            } else {
				try {
					dataSiswa = JSON.parse(data);
                    //console.log("data", dataSiswa);
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
						html +=
							'<tr>' +
							'<td class="text-center">' + no++ + '</td>' +
							'<td>' + dataSiswa[i].nama + '</td>' +
							'<td>' + dataSiswa[i].nis + '</td>' +
							'<td>' + dataSiswa[i].nisn + '</td>' +
							'<td>' + dataSiswa[i].jenis_kelamin + '</td>' +
							'<td>' + dataSiswa[i].username + '</td>' +
							'<td>' + dataSiswa[i].password + '</td>' +
							'</tr>';
					}
					html +=  '</tbody></table>';
				} catch (e) {
					html +=  '<p>Gagal menampilkan data, periksa format file yang diimport</p>' + data;
					showDangerToast(data);
				}
            }
            $('#file-preview').html(html);
            //var attrId = document.getElementById("formInput");
            //attrId.setAttribute("value", data);

			$('#tableprev').DataTable({
				"paging":   false,
				"ordering": false,
				"info":     false,
				"scrollX": 	true
			});
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
