<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between mb-2">
                <h1><?= $subjudul ?></h1>
                <a href="<?= base_url('dataguru') ?>" type="button" class="btn btn-sm btn-danger">
                    <i class="fas fa-arrow-circle-left"></i><span class="d-none d-sm-inline-block ml-1">Kembali</span>
                </a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?= form_open('', array('id' => 'formguru')); ?>
            <div class="card my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title">Tambah Manual</h6>
                    <div class="card-tools">
                        <button type="reset" class="btn btn-sm bg-warning text-white">
                            <i class="fa fa-sync mr-1"></i> Reset
                        </button>
                        <button type="submit" id="submit" class="btn btn-sm bg-primary text-white">
                            <i class="fas fa-save mr-1"></i> Simpan
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-6">
                            <div class="row mb-3">
                                <div class="col-md-4 col-sm-offset-4">
                                    <label for="nama_guru">Nama Guru :</label>
                                </div>
                                <div class="col-md-8 col-sm-offset-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input id="nama_guru" type="text" class="form-control" name="nama_guru"
                                               placeholder="Nama Guru" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-offset-4">
                                    <label for="nip">NIP/NUPTK :</label>
                                </div>
                                <div class="col-md-8 col-sm-offset-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="number" id="nip" class="form-control" name="nip" placeholder="NIP"
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-offset-6">
                            <div class="row mb-3">
                                <div class="col-md-4 col-sm-offset-4">
                                    <label for="username">Username :</label>
                                </div>
                                <div class="col-md-8 col-sm-offset-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input id="username" type="text" class="form-control" name="username"
                                               placeholder="Username" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-offset-4">
                                    <label for="password">Password :</label>
                                </div>
                                <div class="col-md-8 col-sm-offset-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input id="password" class="form-control" name="password" placeholder="Password"
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
            <div class="col-lg-12 p-0">
                <div class="alert alert-default-info shadow align-content-center" role="alert">
                    <ul class="mt-2"><strong>Info!</strong>
                        <li>
                            untuk import data dari file excel/word, silahkan download templatenya
                            terlebih dahulu.
                        </li>
                        <li>
                            hanya template WORD yang bisa <b>disisipi FOTO</b>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="card my-shadow mb-4">
                        <div class="card-header">
                            <h6 class="card-title">File Excel</h6>
                            <a href="<?= base_url('uploads/import/format/format_guru.xlsx') ?>"
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
                            <a href="<?= base_url('uploads/import/format/format_guru.docx') ?>"
                               class="btn-success btn btn-sm card-tools">
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
                    <button name="preview" type="submit" class="btn btn-sm btn-primary card-tools">
                        <i class="fas fa-cloud-upload-alt mr-2"></i>Upload
                    </button>
                </div>
                <?= form_close(); ?>
                <div class="card-body table-responsive" id="file-preview">
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
    let formDataGuru;

    $(document).ready(function () {
        ajaxcsrf();

        $('#formguru').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log('klik submit');
            var btn = $('#submit');

            btn.attr('disabled', 'disabled').text('Wait...');
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
                url: base_url + "dataguru/create",
                data: $(this).serialize(),
                dataType: "JSON",
                type: 'POST',
                success: function (response) {
                    console.log('sukses', response);
                    btn.removeAttr('disabled').text('Simpan');
                    if (response.status) {
                        swal.fire('Sukses', 'Data Berhasil disimpan', 'success')
                            .then((result) => {
                                if (result.value) {
                                    $("#nama_guru").val("");
                                    $("#nip").val("");
                                    $("#username").val("");
                                    $('#password').val("");
                                    //window.location.href = base_url+'dataguru';
                                }
                            });
                    } else {
                        let errs = '';
                        $.each(response.errors, function (key, val) {
                            errs += val
                            $('[name="' + key + '"]').closest('.form-group').addClass('has-error');
                            $('[name="' + key + '"]').nextAll('.help-block').eq(0).text(val);
                            if (val === '') {
                                $('[name="' + key + '"]').closest('.form-group').removeClass('has-error').addClass('has-success');
                                $('[name="' + key + '"]').nextAll('.help-block').eq(0).text('');
                            }
                        });
                        swal.fire({
                            title: "Gagal",
                            html: errs,
                            icon: "error"
                        });
                    }
                },error: function (xhr, status, error) {
                    console.log("error", e.responseText);
                    swal.fire({
                        title: "Gagal",
                        html: 'Gagal menyimpan data',
                        icon: "error"
                    });
                }
            })
        });

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
            },
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
            formDataGuru = null;
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

        $('#input-file-events-excel').on('change', async function(e) {
            var files = e.target.files || [];
            if (!files.length) return;

            formDataGuru = null;
            $('#file-preview').html('<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>')
            const jsonData = await getDataFromExcel(files[0])
            let tbl = $('<table class="table table-bordered w-100" />')
            createTable(jsonData[jsonData.sheets[0]], tbl)
        });

        $('#input-file-events-word').on('change', async function(e) {
            var files = e.target.files || [];
            if (!files.length) return;
            formDataGuru = null;
            $('#file-preview').html('<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>')
            parseWordDocxFile(files[0])
        });

        $('#formUpload').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            //console.log('form', Object.fromEntries(formDataGuru))

            $.ajax({
                url: base_url + "dataguru/do_import",
                type: "POST",
                processData: false,
                contentType: false,
                data: formDataGuru,
                success: function (data) {
                    if (data.status) window.history.back();
                    else {
                        console.log("error", data);
                        $.toast({
                            heading: "ERROR!!",
                            text: JSON.stringify(data.errors),
                            icon: 'error',
                            showHideTransition: 'fade',
                            allowToastClose: true,
                            hideAfter: 5000,
                            position: 'top-right'
                        });
                    }
                },
                error: function (xhr, status, error) {
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

        reader.onloadend = function (event) {
            var arrayBuffer = reader.result;
            mammoth.convertToHtml({arrayBuffer: arrayBuffer}).then(function (resultObject) {
                //console.log('file', resultObject)
                showDiv.html(resultObject.value);
                setTimeout(function () {
                    formDataGuru = new FormData($('#formUpload')[0])

                    showDiv.children().not("table").remove();
                    showDiv.children('table').each(function (i, v) {
                        $(this).addClass('table table-bordered w-100 table-soal');
                        const $trs = $(this).find('tr'), headers = $trs.splice(0, 1); // header rows
                        $trs.each(function (index, tr) {
                            var cekTbl = $(tr).parent().closest('td');
                            if (cekTbl.length === 0) {
                                var nama = $(this).find("td:eq(1)").text().trim();
                                var nip = $(this).find("td:eq(2)").text().trim();
                                var kode = $(this).find("td:eq(3)").text().trim();
                                var username = $(this).find("td:eq(4)").text().trim();
                                var password = $(this).find("td:eq(5)").text().trim();
                                var foto = $(this).find("td:eq(6)").find('img');
                                foto.each(function (ind, img) {
                                    $(img).attr('width', '100')
                                });
                                if (nama && nip && kode && username && password) {
                                    formDataGuru.append('guru['+index+'][2]', nama)
                                    formDataGuru.append('guru['+index+'][3]', nip)
                                    formDataGuru.append('guru['+index+'][4]', kode)
                                    formDataGuru.append('guru['+index+'][5]', username)
                                    formDataGuru.append('guru['+index+'][6]', password)
                                    if (foto.length > 0) {
                                        const ftGuru = $(foto[0]).attr('src')
                                        const ext = ftGuru.substring("data:image/".length, ftGuru.indexOf(";base64"))
                                        const base64 = ftGuru.split(';base64')[1]
                                        //console.log('file', ftGuru)
                                        formDataGuru.append('guru['+index+'][7]', base64)
                                        formDataGuru.append('guru['+index+'][8]', ext)
                                    }
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
            formDataGuru = new FormData($('#formUpload')[0])
            list.rows.forEach(function (siswa, ind) {
                for (const key in siswa) {
                    if (key) {formDataGuru.append('guru['+ind+']['+key+']', siswa[key])}
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

    function onRemoved() {
        $(".dropify-filename-inner").text("");
    }
</script>
