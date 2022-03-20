var pg;
var essai;
var filename = '';
$(document).ready(function () {
    ajaxcsrf();

    /*
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
    */

    $('#upload-excel').on('change', function(e){
        var form = new FormData($("#formPreviewExcel")[0]);
        filename = $("#formPreviewExcel").text();
        preview(base_url + 'cbtbanksoal/previewexcel', form, filename);
    });

    $('#upload-word').on('change', function(e){
        var form = new FormData($("#formPreviewWord")[0]);
        filename = $("#formPreviewWord").text();
        preview(base_url + 'cbtbanksoal/previewword/'+bank_id, form, filename);
    });
    /*
    $('#formPreviewExcel').on('input',function(e){
        var form = new FormData($("#formPreviewExcel")[0]);
        var filename = $(this).text();
        preview(base_url + 'cbtbanksoal/previewexcel', form, filename);
    });

    $('#formPreviewWord').on('input',function(e){
        var form = new FormData($("#formPreviewWord")[0]);
        var filename = $(this).text();
		console.log(form);
        preview(base_url + 'cbtbanksoal/previewword/'+bank_id, form, filename);
    });

    $('#formPreviewWord').on('submit',function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        var form = new FormData($("#formPreviewWord")[0]);
        var filename = $(this).text();
        console.log(form);
        preview(base_url + 'cbtbanksoal/previewword/'+bank_id, form, filename);
    });
    */

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
    swal.fire({
        title: "Mempersiapkan upload",
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
            swal.close();

            if (filename == "") {
                $('#file-preview').html('<div class="alert alert-default-info align-content-center" role="alert">' +
                    'Pastikan anda telah mengisi format yang telah disediakan.' +
                    '</div>');
            } else {
                /*
                swal.fire({
                    title: "Sukses",
                    text: data.data + " Soal berhasil diimport",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                });
                */

                if (data.type === "html") {
                    var doc = (new DOMParser()).parseFromString(data.pg, "text/html");
                    html = doc.body.outerHTML;

                    $('#file-preview').html(html);
                    $('#file-preview').children().not("table").remove();

                    var $tables = $('#file-preview').find('table');
                    $.each($tables, function (indt, trs) {
                        $(this).attr("class", "w-100 table table-sm table-bordered");

                        $('tr:first td').wrapInner('<div />').find('div').unwrap().wrap('<th/>');
                        //$('tr:first-child').children('td').replaceWith(function(i, v) {
                        //    return '<th>' + v + '</th>';
                        //});

                        $(this).find('span').each(function () {
                            var arabic = /[\u0600-\u06FF]/;
                            //alert(arabic.test(string));
                            var string = $(this).text();
                            //console.log('arabic', arabic.test(string));
                            if (arabic.test(string)) {
                                $(this).css({'font-size': '22pt'});
                                //$(this).text('arabic');
                            }
                        });
                        /*
                        $.each($spans, function () {
                            var arabic = /[\u0600-\u06FF]/;
                            //alert(arabic.test(string));
                            var string = $(this).text();
                            console.log('arabic', string);
                            if (arabic.test(string)) {
                                $(this).css({'font-size': '20pt'});
                                $(this).text('arabic');
                            }
                        });

                        /*
                        $(this).find('span').removeAttr('style');
                        var $imgs = $(this).find('img');
                        $.each($imgs, function () {
                            $(this).removeAttr('style');
                            $(this).removeAttr('border');
                        })
                        */
                    });

                    $('#file-preview tr').each(function(ind, tds){
                        var $header = $(this).find("th");
                        //console.log("tds", $header.length);
                        //if (ind === 0) return;
                        var _hide = true;

                        var soal = $(this).find("td:eq(1)").text().trim();
                        var soalGambar = $(this).find("td:eq(1)").find("img").length;

                        var $cells = $(this).find("td");
                        if ($cells.length > 6) {
                            // jodohkan
                            var kunci = '';
                            var jawab1 = '';
                            var jawab2 = '';
                            $cells.each(function (cellIndex) {
                                if (cellIndex === 8) {
                                    kunci = $(this).text().trim();
                                }
                                if (cellIndex === 4) {
                                    jawab1 = $(this).text().trim();
                                }
                                if (cellIndex === 6) {
                                    jawab2 = $(this).text().trim();
                                }
                            });
                            _hide = $header.length === 0 && !soalGambar && soal === "" && kunci === "" && jawab1 === "" && jawab2 === "";
                        } else if ($cells.length < 6) {
                            // essai, singkat
                            var kunciess = '';
                            $cells.each(function (cellIndex) {
                                if (cellIndex === 4) {
                                    kunciess = $(this).text().trim();
                                }
                            });
                            _hide = $header.length === 0 && !soalGambar && soal === "" && kunciess === "";
                        } else {
                            //pg1, pg2
                            var kuncipg = '';
                            var jawabpg = '';
                            $cells.each(function (cellIndex) {
                                if (cellIndex === 6) {
                                    kuncipg = $(this).text().trim();
                                }
                                if (cellIndex === 4) {
                                    jawabpg = $(this).text().trim();
                                }
                            });
                            _hide = $header.length === 0 && !soalGambar && soal === "" && kuncipg === "" && jawabpg === "";
                        }

                        //var header = $("this:has(th)").length;
                        //console.log(header);
                        if(_hide){
                            $(this).hide();
                        }
                    });

                    var attrId = document.getElementById("formInput");
                    attrId.setAttribute("value", bank_id);

                    $('#file-preview img').each(function () {
                        var curSrc = $(this).attr('src');
                        if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                            $(this).attr('src', base_url+curSrc);
                        }
                    });

                } else {
                    $('#file-preview').html('<div class="alert alert-default-info align-content-center" role="alert">' +
                        'Pastikan anda telah mengisi format yang telah disediakan.' +
                        '</div>');
                    /*
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
                    */
                }
            }

            //console.log(html);
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

function getData() {
    if (filename === '') {
        showDangerToast('Pilih File dulu');
        return;
    }
    swal.fire({
        title: "Import soal ke database",
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

    var $tables = $('table');
    var tbls = {};
    var jj = 1;
    $.each($tables, function (row) {
        //tbls[jj] = {};
        var myRows = {};
        var $headers = $("th");

        var header1 = ['NO', 'SOAL', 'JENIS', 'OPSI', 'JAWABAN', 'KUNCI'];
        var header3 = ['NO', 'SOAL', 'JENIS', 'KD_BARIS', 'BARIS', 'KD_KOLOM', 'KOLOM', 'KD_KUNCI', 'KUNCI'];
        var header4 = ['NO', 'SOAL', 'JENIS', 'KUNCI'];
        var tempJenis = '', tempNomor = '', tempSoal = '';

        var tbl = $('table.jexcel tr').get().map(function (row) {
            return $(row).find('td').get().map(function (cell) {
                return $(cell).html().replace(/\&nbsp;/g, '').trim();
            });
        });

        const $trs = $(this).find('tr'), headers = $trs.splice(0, 1); // header rows
        $trs.each(function (index, tr) {
            var nomor = $(this).find("td:eq(0)").text().trim();
            var soal = $(this).find("td:eq(1)").text().trim();
            var jenis = $(this).find("td:eq(2)").text().trim();
            if (jenis != '') jj = jenis;

            var soalGambar = $(this).find("td:eq(1)").find("img").length;

            if (nomor === "") {
                nomor = tempNomor;
            } else {
                tempNomor = nomor;
            }
            if (jenis === "") {
                jenis = tempJenis;
            } else {
                tempJenis = jenis;
            }

            myRows[index] = {};
            var $cells = $(this).find("td");
            if ($cells.length > 6) {
                $cells.each(function (cellIndex) {
                    //console.log('jenis', jenis);
                    const kol = header3[cellIndex];
                    if (cellIndex === 1) {
                        if (soal === "" && soalGambar === 0) {
                            myRows[index][kol] = "";
                        } else {
                            myRows[index][kol] = encodeHtml($(this).html().trim());
                        }
                    } else {
                        if (cellIndex === 0) {
                            myRows[index][kol] = nomor;
                        } else if (cellIndex === 2) {
                            myRows[index][kol] = jenis;
                        } else {
                            myRows[index][kol] = $(this).text().trim();
                        }
                    }
                });
            } else if ($cells.length < 6) {
                $cells.each(function (cellIndex) {
                    const kol = header4[cellIndex];
                    if (cellIndex === 1) {
                        if (soal === "" && soalGambar === 0) {
                            myRows[index][kol] = "";
                        } else {
                            myRows[index][kol] = encodeHtml($(this).html().trim());
                        }
                    } else if (cellIndex === 3) {
                        myRows[index][kol] = encodeHtml($(this).html().trim());
                    } else {
                        if (cellIndex === 0) {
                            myRows[index][kol] = nomor;
                        } else if (cellIndex === 2) {
                            myRows[index][kol] = jenis;
                        } else {
                            myRows[index][kol] = $(this).text().trim();
                        }
                    }
                });
            } else {
                $cells.each(function (cellIndex) {
                    const kol = header1[cellIndex];
                    if (cellIndex === 1) {
                        if (soal === "" && soalGambar === 0) {
                            myRows[index][kol] = "";
                        } else {
                            myRows[index][kol] = encodeHtml($(this).html().trim());
                        }
                    } else if (cellIndex === 4) {
                        myRows[index][kol] = encodeHtml($(this).html().trim());
                    } else {
                        if (cellIndex === 0) {
                            myRows[index][kol] = nomor;
                        } else if (cellIndex === 2) {
                            myRows[index][kol] = jenis;
                        } else {
                            myRows[index][kol] = $(this).text().trim();
                        }
                    }
                });
            }
        });
        tbls[jj] = myRows;
    });

    var datapost = $('#grouping').serialize() + "&id_bank=" + bank_id + "&data=" + JSON.stringify(tbls);
    console.log('new', tbls);

    $.ajax({
        url: base_url + "cbtbanksoal/doimport",
        method: "POST",
        //dataType: "json",
        data: datapost,
        success: function (result) {
            console.log("result", result);
            swal.fire({
                title: "Sukses",
                html: "Total isi soal: <b>" + result.total + "</b><br>Total soal diimport: <b>" + result.insert +"</b>",
                icon: "success",
                showCancelButton: false,
                confirmButtonColor: "#3085d6",
            }).then(result => {
                if (result.value) {
                    window.location.href = base_url + 'cbtbanksoal';
                }
            });
        }, error: function (xhr, status, error) {
            swal.close();
            console.log("error", xhr.responseText);
            showDangerToast('ERROR!!');
        }
    });
}

function encodeHtml(str) {
    return str
        //.replace(/[^ -~]+/g, '')
        .replace(/&nbsp;/g, '')
        .replace(/!/g, '%21')
        //.replace(/"/g, '%22')
        .replace(/"/g, '%27')
        .replace(/#/g, '%23')
        //.replace(/$/g, '%24')
        //.replace(/%/g, '%25')
        .replace(/&/g, '%26')
        .replace(/'/g, '%27')
        .replace(/\//g, '%2F')
        .replace(/:/g, '%3A')
        .replace(/;/g, '%3B')
        .replace(/</g, '%3C')
        .replace(/=/g, '%3D')
        .replace(/>/g, '%3E')
        .replace(/\?/g, '%3F')
        .replace(/(\s)/g, '%20')
        .replace(/_/g, '%5F')
        .replace(/\./g, '%2E')
}