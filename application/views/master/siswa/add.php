<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between mb-2">
                <h1><?= $subjudul ?></h1>
                <a href="<?= base_url('datasiswa') ?>" type="button" class="btn btn-sm btn-danger">
                    <i class="fas fa-arrow-circle-left"></i><span class="d-none d-sm-inline-block ml-1">Kembali</span>
                </a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <br>
            <div class="col-lg-12 p-0">
                <div class="alert alert-default-danger shadow align-content-center" role="alert">
                    <strong>Catatan!</strong> untuk import data dari file excel, silahkan download templatenya terlebih
                    dahulu.
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card my-shadow mb-4">
                        <div class="card-header">
                            <h6 class="card-title">File Excel</h6>
                            <?php $url = 'uploads/import/format/format_siswa.xlsx'; ?>
                            <a href="<?= base_url() . $url ?>" class="card-tools btn-success btn btn-sm">
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
                <div class="col-xl-8 col-lg-7">
                    <div class="card my-shadow mb-4">
                        <?= form_open('', array('id' => 'formUpload')); ?>
                        <div class="card-header">
                            <h6 class="card-title">Preview</h6>
                            <button id="submit-excel" name="preview" type="submit"
                                    class="btn btn-sm btn-primary card-tools" disabled="disabled">
                                <i class="fas fa-cloud-upload-alt mr-2"></i>Upload
                            </button>
                        </div>
                        <?= form_close(); ?>
                        <div class="card-body table-responsive" id="file-preview">
                            <table id="tableprev" class="mb-4 table table-sm table-striped table-bordered nowrap w-100"></table>
                            <span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/excel/exceljs.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/excel/js-excel-template.min.js"></script>

<script>
    var typeImport = '<?=$tipe?>';
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
            $('#submit-excel').attr('disabled', 'disabled');
            $('#tableprev').html('')
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

        $('#input-file-events-excel').on('change', async function(e) {
            var files = e.target.files || [];
            if (!files.length) return;

            const jsonData = await getDataFromExcel(files[0])
            createTable(jsonData[jsonData.sheets[0]], '#tableprev')
        });

        $('#formUpload').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", Object.fromEntries(dataSiswa));

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
                data: dataSiswa,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    console.log("response:", data);
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
            //return false;
        });

    });

    function onRemoved() {
        $(".dropify-filename-inner").text("");
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

        if (list.rows.length > 0) {
            $('#submit-excel').removeAttr('disabled');

            dataSiswa = new FormData($('#formUpload')[0])
            list.rows.forEach(function (siswa, ind) {
                for (const key in siswa) {
                    if (key) {dataSiswa.append('siswa['+ind+']['+key+']', siswa[key])}
                }
            })
        } else {
            $('#submit-excel').attr('disabled', 'disabled');
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
                                        if (i===2||i===3||i===14||i===19||i===20||i===30||i===36||i===42) {
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

</script>