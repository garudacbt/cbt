<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('datamapel') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span class="d-none d-sm-inline-block ml-1">Batal</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-12 p-0">
                <div class="alert alert-danger my-shadow align-content-center" role="alert">
                    <strong>Catatan!</strong> untuk import data dari file excel, silahkan download templatenya terlebih
                    dahulu.
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="card my-shadow mb-4">
                        <div class="card-header">
                            <h6 class="card-title">File Excel</h6>
                            <a href="<?= base_url('uploads/import/format/format_mapel.xlsx') ?>"
                               class="card-tools btn-success btn btn-sm">
                                <i class="fas fa-download"></i><span class="ml-2">Download Template</span>
                            </a>
                        </div>
                        <div class="card-body excel">
                            <?= form_open_multipart('', array('id' => 'formPreviewExcel')); ?>
                            <div class="form-group pb-2">
                                <label for="upload_file">Pilih file excel</label>
                                <input type="file" id="input-file-events-excel" name="upload_file" class="dropify"/>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="card my-shadow mb-4">
                        <div class="card-header">
                            <h6 class="card-title">File Word</h6>
                            <a href="<?= base_url('uploads/import/format/format_mapel.docx') ?>"
                               class="card-tools btn-success btn btn-sm">
                                <i class="fas fa-download"></i><span class="ml-2">Download Template</span>
                            </a>
                        </div>
                        <div class="card-body word">
                            <?= form_open_multipart('', array('id' => 'formPreviewWord')); ?>
                            <div class="form-group pb-2">
                                <label for="upload_file">Pilih file word</label>
                                <input type="file" id="input-file-events-word" name="upload_file" class="dropify"/>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card my-shadow mb-4">
                <?= form_open('', array('id' => 'formUpload')); ?>
                <div class="card-header">
                    <h6 class="card-title">Preview</h6>
                    <button name="preview" type="submit" class="card-tools btn btn-sm btn-primary">
                        <i class="fas fa-cloud-upload-alt mr-2"></i>Upload
                    </button>
                </div>
                <?= form_close(); ?>
                <div class="card-body" id="file-preview">
                    <span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url() ?>/assets/app/js/mammoth.browser.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/excel/exceljs.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/excel/js-excel-template.min.js"></script>
<script src="<?= base_url() ?>/assets/app/js/jquery.htmlparser.min.js"></script>

<script>
    let formDataMapel;
    $(document).ready(function () {
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
        var drEvente = $('.dropify').dropify();

        drEvente.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvente.on('dropify.afterClear', function (event, element) {
            formDataMapel = null;
            $('#file-preview').html('<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>')
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

        $('#input-file-events-excel').on('change', async function(e){
            var files = e.target.files || [];
            if (!files.length) return;

            formDataMapel = null;
            $('#file-preview').html('<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>')
            const jsonData = await getDataFromExcel(files[0])
            let tbl = $('<table class="table table-bordered w-100" />')
            createTable(jsonData[jsonData.sheets[0]], tbl)

        });

        $('#input-file-events-word').on('change', async function(e){
            var files = e.target.files || [];
            if (!files.length) return;

            formDataMapel = null;
            $('#file-preview').html('<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>')
            parseWordDocxFile(files[0])
        });

        $('#formUpload').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            //console.log('form', Object.fromEntries(formDataMapel))

            $.ajax({
                url: base_url + "datamapel/do_import",
                type: "POST",
                processData: false,
                contentType: false,
                data: formDataMapel,
                success: function (data) {
                    window.history.back();
                }, error: function (xhr, status, error) {
                    console.log("error", e.responseText);
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
    });

    function parseWordDocxFile(file) {
        var showDiv = $('#file-preview')

        swal.fire({
            title: "Memuat file",
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
        console.time();
        var reader = new FileReader();

        var options = {
            styleMap: ["u => u", "strike => del"]
        };
        reader.onloadend = function (event) {
            var arrayBuffer = reader.result;
            mammoth.convertToHtml({arrayBuffer: arrayBuffer}, options).then(function (resultObject) {
                showDiv.html(resultObject.value);
                setTimeout(function () {
                    formDataMapel = new FormData($('#formUpload')[0])

                    showDiv.children().not("table").remove();
                    showDiv.children('table').each(function (i, v) {
                        $(this).addClass('table table-bordered w-100 table-soal');
                        const $trs = $(this).find('tr'), headers = $trs.splice(0, 1); // header rows
                        $trs.each(function (index, tr) {
                            var cekTbl = $(tr).parent().closest('td');
                            if (cekTbl.length === 0) {
                                var namaMapel = $(this).find("td:eq(1)").text().trim();
                                var kodeMapel = $(this).find("td:eq(2)").text().trim();
                                if (namaMapel && kodeMapel) {
                                    formDataMapel.append('mapel['+index+'][nama_mapel]', namaMapel)
                                    formDataMapel.append('mapel['+index+'][kode]', kodeMapel)
                                } else {
                                    $(this).remove();
                                }
                            }
                        });
                    });
                    swal.close();
                }, 500);
            });
        };
        reader.readAsArrayBuffer(file);
    }

    function createTable(list, selector) {
        let cols = Headers(list.header, selector);
        let len = list.rows.length;
        if (list.rows.length > 50) len = 50;
        for (let i = 0; i < len; i++) {
            let row = $('<tr/>');
            for (let colIndex = 0; colIndex < cols.length; colIndex++) {
                let val = list.rows[i][cols[colIndex]] || '';
                if (colIndex === 3 || colIndex > 8) {
                    row.append($('<td/>').html(val));
                } else {
                    row.append($('<td class="text-center" />').html(val));
                }
            }
            $(selector).append(row);
        }
        $('#file-preview').prepend(selector)

        if (list.rows.length > 0) {
            formDataMapel = new FormData($('#formUpload')[0])
            list.rows.forEach(function (mapel, ind) {
                for (const key in mapel) {
                    console.log(key, mapel[key])
                    if (key === '2') formDataMapel.append('mapel['+ind+'][nama_mapel]', mapel[key])
                    else if (key === '3') formDataMapel.append('mapel['+ind+'][kode]', mapel[key])
                }
            })
        } else {
            // empty
        }
    }

    function Headers(list, selector) {
        let columns = [];
        let header = $('<tr/>');

        for (let i = 0; i < list.length; i++) {
            let row = list[i];
            for (let k in row) {
                if (k === 'label') {
                    header.append($('<th class="text-center align-middle" />').html(row[k]));
                } else {
                    if ($.inArray(row[k], columns) == -1) {
                        columns.push(row[k]);
                    }
                }
            }
        }
        $(selector).append(header);
        return columns;
    }

    function getDataFromExcel(file) {
        console.log('called')
        return new Promise((resolve, reject) => {
            const wb = new ExcelJS.Workbook();
            const reader = new FileReader()
            reader.onload = async () => {
                try {
                    const buffer = reader.result;
                    wb.xlsx.load(buffer).then(workbook => {
                        let dataFiles = {}
                        workbook.eachSheet((sheet, id) => {
                            if (!dataFiles['sheets']) dataFiles['sheets'] = []
                            dataFiles['sheets'].push(sheet.name)
                            let cols = {
                                'name': sheet.name,
                                'header': [],
                                'rows': []
                            }
                            //let head = []
                            sheet.eachRow({includeEmpty: true}, (row, rowIndex) => {
                                let obj = {}
                                for (let i = 0; i < row.values.length; i++) {
                                    if (rowIndex === 1) {
                                        if (row.values[i]) {
                                            let val = row.values[i] || 'val-'+i;
                                            if (isRichValue(row.values[i])) {
                                                val = richToString(row.values[i])
                                            }
                                            if (val && val.includes('|')) val = val.split('|')[0]
                                            let h = {
                                                label: val,
                                                value: i//key,
                                            }
                                            cols.header.push(h)
                                        }
                                    } else {
                                        let val = row.values[i] || '';
                                        if (isRichValue(row.values[i])) {
                                            val = richToString(row.values[i])
                                        }
                                        if (i===3) {
                                            val = val.replace("'", "")
                                            console.log('index', i, val)
                                        }
                                        obj[i] = val
                                    }
                                }
                                cols.rows.push(obj)
                            })
                            cols.rows = removeEmptyObjects(cols.rows)
                            dataFiles[sheet.name] = cols
                        })
                        resolve(dataFiles)
                    })
                } catch (err) {
                    reject(err)
                }
            }
            reader.onerror = (error) => {
                reject(error)
            };
            reader.readAsArrayBuffer(file)
        });
    }

    function removeEmptyObjects(array) {
        return array.filter(element => {
            delete element.undefined
            return Object.keys(element).length !== 0;
        });
    }

    function isRichValue(value) {
        return Boolean(value && Array.isArray(value.richText));
    }

    function richToString(rich) {
        return rich.richText.map(({ text }) => text).join('|');
    }

    /*
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
                var html = '';
                var i;
                var no = 1;

                if (filename == "") {
                    html = '<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>';
                } else {
                    console.log(data);
                    var obj = JSON.parse(data);
                    html = '<table id="tablePrev" class="table table-bordered">' +
                        '        <thead>' +
                        '        <tr>' +
                        '        <td>No</td>' +
                        '        <td>nama</td>' +
                        '        <td>kode</td>' +
                        '        </tr>' +
                        '        </thead>' +
                        '        <tbody>';
                    for (i = 0; i < obj.length; i++) {
                        if (!obj[i].nama.trim() == "") {
                            html +=
                                '<tr>' +
                                '<td>' + no++ + '</td>' +
                                '<td>' + obj[i].nama + '</td>' +
                                '<td>' + obj[i].kode + '</td>' +
                                '</tr>';
                        }
                    }
                    html +=  '</tbody></table>';
                }

                $('#file-preview').html(html);
            },
            error: function (e) {
                console.log("error", e.responseText);
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
    }
     */

    function onRemoved() {
        $(".dropify-filename-inner").text("");
    }
</script>
