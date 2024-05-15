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

            <div class="card my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title">Download Data Siswa</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        if (count($kelas) > 0) :
                            foreach ($kelas as $id => $kls) : ?>
                                <div class="col-3 col-md-2 text-center mb-3">
                                    <div onclick="download(this)" data-kelas="<?= $kls ?>" data-id="<?=$id?>" class="card-tools btn-success btn btn-block">
                                        <i class="fas fa-download"></i>
                                        <span class="ml-2"><?= $kls ?></span>
                                    </div>
                                </div>
                            <?php endforeach;
                        else: ?>
                            <div class="alert alert-default-warning align-content-center" role="alert">Belum ada data
                                siswa dan kelas
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="card my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title">Download Foto Siswa</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        if (count($kelas) > 0) :
                            foreach ($kelas as $id => $kls) : ?>
                                <div class="col-3 col-md-2 text-center mb-3">
                                    <div onclick="downloadWord(this)" data-kelas="<?= $kls ?>" data-id="<?=$id?>" class="card-tools btn-success btn btn-block">
                                        <i class="fas fa-download"></i>
                                        <span class="ml-2"><?= $kls ?></span>
                                    </div>
                                </div>
                            <?php endforeach;
                        else: ?>
                            <div class="alert alert-default-warning align-content-center" role="alert">Belum ada data
                                siswa dan kelas
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row d-none" id="download-tbl">
                <div style="display: flex;flex-direction: column">
                    <p style="font-weight: bold; font-size: large">Update Foto Siswa</p>
                    <ul>
                        <li>
                            <span>Jangan merubah format tabel!</span>
                        </li>
                        <li>
                            <span>Hanya kolom NIS dan FOTO yang bisa diedit, jangan merubah isi kolom lain!</span>
                        </li>
                        <li>
                            <span>Jika NIS kosong, isi NIS dengan angka unik (jangan ada yang sama) </span>
                        </li>
                        <li>
                            <span>Gunakan format EXCEL untuk merubah data siswa selain FOTO</span>
                        </li>
                    </ul>
                </div>
                <table style="width:100%; font-size: 11pt; line-height: 1.3; border: 1px solid black; border-collapse: collapse; border-spacing: 0; page-break-after: always">
                    <thead>
                    <tr id="header-table" data-height="60" style="background-color: lightgrey"></tr>
                    </thead>
                    <tbody id="body-table">
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="card my-shadow mb-4">
                        <div class="card-body excel">
                            <?= form_open_multipart('', array('id' => 'formPreviewExcel')); ?>
                            <div class="form-group pb-2">
                                <label for="input-file-events-excel">Updata Data (Excel)</label>
                                <input accept=".xlsx" type="file" id="input-file-events-excel" name="upload_file" class="dropify"/>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="card my-shadow mb-4">
                        <div class="card-body excel">
                            <?= form_open_multipart('', array('id' => 'formPreviewWord')); ?>
                            <div class="form-group pb-2">
                                <label for="input-file-events-word">Update Foto (Word)</label>
                                <input accept=".docx" type="file" id="input-file-events-word" name="upload_file" class="dropify"/>
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
                    <button id="submit-excel" name="preview" type="submit"
                            class="btn btn-sm btn-primary card-tools" disabled="disabled">
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
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/html-docx.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/convert-area.js"></script>
<script>
    var typeImport = '<?=$tipe?>';

    var formDataSiswa;
    var isUploadType;
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
        var drEvente = $('.dropify').dropify();

        drEvente.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvente.on('dropify.afterClear', function (event, element) {
            $('#submit-excel').attr('disabled', 'disabled');
            $('#download-tbl').html('')
            formDataSiswa = null;
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

            $('#file-preview').html('<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>')

            const jsonData = await getDataFromExcel(files[0])
            console.log('json', jsonData)
            $('#submit-excel').attr('disabled', 'disabled');
            $('#download-tbl').html('')
            formDataSiswa = null;
            isUploadType = null;

            let tbl = $(' <table class="mb-4 table table-sm table-striped table-bordered nowrap w-100"></table>')
            createTable(jsonData[jsonData.sheets[0]], tbl)
        });

        $('#input-file-events-word').on('change', async function(e) {
            var files = e.target.files || [];
            if (!files.length) return;

            $('#file-preview').html('<span class="text-center">Pastikan anda telah mengisi format yang telah disediakan.</span>')

            $('#submit-excel').attr('disabled', 'disabled');
            $('#download-tbl').html('')
            formDataSiswa = null;
            isUploadType = null;
            parseWordDocxFile(files[0])
        });


        $('#formUpload').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            let url = '';
            if (formDataSiswa && isUploadType) {
                if (isUploadType === 'excel') url = "datasiswa/updateall"
                else url = "datasiswa/update_foto"
            }
            console.log("data:", Object.fromEntries(formDataSiswa));

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
                data: formDataSiswa,
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

        reader.onloadend = function (event) {
            var arrayBuffer = reader.result;
            mammoth.convertToHtml({arrayBuffer: arrayBuffer}).then(function (resultObject) {
                //console.log('file', resultObject)
                showDiv.html(resultObject.value);
                setTimeout(function () {
                    formDataSiswa = new FormData($('#formUpload')[0])

                    showDiv.children().not("table").remove();
                    showDiv.children('table').each(function (i, v) {
                        $(this).addClass('table table-bordered w-100 table-soal');
                        const $trs = $(this).find('tr'), headers = $trs.splice(0, 1); // header rows
                        $trs.each(function (index, tr) {
                            var cekTbl = $(tr).parent().closest('td');
                            if (cekTbl.length === 0) {
                                var id = $(this).find("td:eq(1)").text().trim();
                                var nis = $(this).find("td:eq(2)").text().trim();
                                var nama = $(this).find("td:eq(3)").text().trim();
                                var foto = $(this).find("td:eq(5)").find('img');
                                foto.each(function (ind, img) {
                                    $(img).attr('width', '100')
                                });
                                if (id && nis) {
                                    formDataSiswa.append('siswa['+index+'][id]', id)
                                    formDataSiswa.append('siswa['+index+'][nis]', nis)
                                    formDataSiswa.append('siswa['+index+'][nama]', nama)
                                    if (foto.length > 0) {
                                        const ftsiswa = $(foto[0]).attr('src')
                                        const ext = ftsiswa.substring("data:image/".length, ftsiswa.indexOf(";base64"))
                                        const base64 = ftsiswa.split(';base64')[1]
                                        formDataSiswa.append('siswa['+index+'][foto]', base64)
                                        formDataSiswa.append('siswa['+index+'][ext]', ext)
                                    }
                                    $('#submit-excel').removeAttr('disabled');
                                } else {
                                    $(this).remove();
                                }
                            }
                        });
                    });
                    swal.close();
                    isUploadType = 'word'
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
            $('#submit-excel').removeAttr('disabled');

            //console.log('rows', list.rows)
            formDataSiswa = new FormData($('#formUpload')[0])
            list.rows.forEach(function (siswa, ind) {
                for (const key in siswa) {
                    if (key) {formDataSiswa.append('siswa['+ind+']['+key+']', siswa[key])}
                }
            })
            isUploadType = 'excel'
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

    async function downloadTemplate(kls, res) {
        const response = await fetch(base_url + 'uploads/import/format/format_update_siswa.xlsx')
        const arrayBuffer = await response.arrayBuffer()
        const excelTemplate = await JsExcelTemplate.fromArrayBuffer(arrayBuffer)
        excelTemplate.set("siswa", res.siswa);

        const blob = await excelTemplate.toBlob()
        saveAs(blob, `Update Data Siswa ${kls}.xlsx`);
    }

    function download(btn) {
        const idKls = $(btn).data('id');
        const kls = $(btn).data('kelas')
        //console.log('download', idKls)

        $.ajax({
            url: base_url + "datasiswa/downloaddata/"+idKls,
            method: "GET",
            success: function (result) {
                console.log("result", result);
                //createTable(kls, result.data)
                downloadTemplate(kls, result)
            }, error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
                const err = JSON.parse(xhr.responseText)
                swal.fire({
                    title: "Error",
                    text: err.Message,
                    icon: "error"
                });
            }
        });
    }

    function downloadWord(btn) {
        const idKls = $(btn).data('id');
        const kls = $(btn).data('kelas')
        //console.log('download', idKls)

        $.ajax({
            url: base_url + "datasiswa/downloaddata/"+idKls,
            method: "GET",
            success: function (result) {
                if (result.siswa) {
                    prosesResult(result.siswa, kls)
                } else {

                }
            }, error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
                const err = JSON.parse(xhr.responseText)
                swal.fire({
                    title: "Error",
                    text: err.Message,
                    icon: "error"
                });
            }
        });
    }

    function prosesResult(dataSiswa, kelas) {
        swal.fire({
            text: "Menyiapkan data foto kelas "+kelas+" ....",
            button: false,
            closeOnClickOutside: false,
            closeOnEsc: false,
            allowEscapeKey: false,
            allowOutsideClick: false,
            onOpen: () => {
                swal.showLoading();
            }
        });

        const headerTbl = [
            {title: "No.", key: 'number', isCenter: true, width: '60px'},
            {title: "ID", key: 'id_siswa', isCenter: true, width: '60px'},
            {title: "NIS", key: "nis", isNumber: true, isCenter: true, width: 'auto'},
            {title: "NAMA SISWA", key: "nama", width: 'auto'},
            {title: "JENIS KELAMIN (L/P)", key: "jenis_kelamin", isCenter: true, width: 'auto'},
            {title: "FOTO", key: "foto", isCenter: true, width: '100px'},
        ]

        let thead = '';
        let tbody = '';
        headerTbl.forEach(function (header) {
            thead += '<th style="width:'+header.width +'; border: 1px solid black;border-collapse: collapse;' +
                ' text-align: center;font-weight: bold;" class="text-center align-middle">'+
                '<span style="margin: 0; padding: 4px">'+header.title+'</span>' +
                '</th>';
        })
        dataSiswa.forEach(function (siswa, ind) {
            tbody += '<tr>';
            headerTbl.forEach(function (header) {
                if (header.key === 'number') {
                    tbody += '<td style="border: 1px solid black;text-align: center;padding: 4px">' +
                        (ind+1) +
                        '</td>';
                } else {
                    if (header.key === 'foto') {
                        tbody += '<td id="avatar-'+siswa.nis+'" style="border: 1px solid black;padding: 4px">'+
                            '           <img class="avatar" ' +
                            '                src="'+base_url+siswa.foto+'" alt="User Image" style="max-width: 100px; height: auto"> ' +
                            '</td>';
                    } else {
                        const center = header.isCenter ? 'text-align: center;' : ''
                        tbody += '<td style="border: 1px solid black;padding: 4px;'+center+'">'+siswa[header.key]+'</td>';
                    }
                }
            })
            tbody += '</tr>';
        })

        $('#header-table').html(thead)
        $('#body-table').html(tbody)

        let count = 0
        $(`.avatar`).each(async function (i, v) {
            const loaded = () => {
                return new Promise((resolve, reject) => {
                    let obj = {pos: i}
                    $(v).on("error", function () {
                        obj.error = true
                        $(this).remove()
                        resolve(obj)
                    }).on('load', function () {
                        obj.error = false
                        resolve(obj)
                    })
                })
            }
            const imgs = await loaded()
            count ++
            if (count === dataSiswa.length) {
                saveWord(kelas)
            }
        });
    }

    function saveWord(kelas) {
        swal.close();
        var contentDocument = $('#download-tbl').convertToHtmlFile('detail', '');
        var content = '<!DOCTYPE html>' + contentDocument.documentElement.outerHTML;
        var converted = htmlDocx.asBlob(content, {
            size: 'A4',
            margins: {top: 700, bottom: 700, left: 1000, right: 1000}
        });
        saveAs(converted, `Foto Siswa Kelas ${kelas}.docx`);
    }

    function onRemoved() {
        $(".dropify-filename-inner").text("");
    }

</script>