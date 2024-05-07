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
                                <div class="col-6 col-md-3 text-center mb-3">
                                    <div onclick="download(this)" data-kelas="<?= $kls ?>" data-id="<?=$id?>" class="card-tools btn-success btn btn-block">
                                        <i class="fas fa-download"></i>
                                        <span class="ml-2">Download Data Siswa<br/>Kelas <?= $kls ?></span>
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
            <!--
            <div class="row d-none">
                <table id="download-tbl"
                       style="font-size: 11pt; width: 100%;"
                       data-cols-width="5,18,25,35,10,15,15,15,25,25,20,18,25,15,20,10,25,35,6,6,20,15,20,15,10,20,20,15,15,15,20,20,20,15,15,15,20,20,20,15,15,15,20,15">
                    <thead>
                    <tr id="header-table" data-height="60"></tr>
                    </thead>
                    <tbody id="body-table">
                    </tbody>
                </table>
            </div>
            -->
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card my-shadow mb-4">
                        <div class="card-header">
                            <h6 class="card-title">Upload File Excel</h6>
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

            var url = "datasiswa/updateall";
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

            console.log('rows', list.rows)
            dataSiswa = new FormData($('#formUpload')[0])
            list.rows.forEach(function (siswa, ind) {
                for (const key in siswa) {
                    let k = key.split('(')[0];
                    k = k.split('/')[0]
                    k = k.split('1')[0]
                    dataSiswa.append('siswa['+ind+']['+k.trim()+']', siswa[key])
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
                            let head = []
                            sheet.eachRow({includeEmpty: true}, (row, rowIndex) => {
                                let obj = {}
                                for (let i = 0; i < row.values.length; i++) {
                                    if (rowIndex === 1) {
                                        let val = row.values[i] || '';
                                        if (isRichValue(row.values[i])) {
                                            val = richToString(row.values[i])
                                        }
                                        if (val && val.includes('|')) val = val.split('|')[0]
                                        let key = val.replaceAll(' ', '').replaceAll('\n', '').toLowerCase();
                                        head.push(key.toLowerCase())
                                        if (row.values[i]) {
                                            if (val && val.includes('\n')) val = val.split('\n')[0]
                                            let h = {
                                                label: val,
                                                value: key,
                                            }
                                            cols.header.push(h)
                                        }
                                    } else {
                                        let val = row.values[i] || '';
                                        if (isRichValue(row.values[i])) {
                                            val = richToString(row.values[i])
                                        }
                                        val = val === '0' ? '' : val
                                        obj[head[i]] = val
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
    /*
    const headerTbl = [
        {title: "No.", key: 'number', isCenter: true},
        {title: "NISN*", key: "nisn", isNumber: true, isCenter: true},
        {title: "NIS*", key: "nis", isNumber: true, isCenter: true},
        {title: "NAMA SISWA*", key: "nama"},
        {title: "JENIS KELAMIN (L/P) *", key: "jenis_kelamin", isCenter: true},
        {title: "USERNAME*", key: "username", isCenter: true},
        {title: "PASSWORD*", key: "password", isCenter: true},
        {title: "KELAS AWAL* (gunakan nomor 1-12)", key: "kelas_awal", isCenter: true},
        {title: "TANGGAL DI TERIMA* FORMAT (YYYY-MM-DD) CONTOH (2018-07-20)", key: "tahun_masuk", isCenter: true},
        {title: "SEKOLAH ASAL", key: "sekolah_asal"},
        {title: "TEMPAT LAHIR", key: "tempat_lahir"},
        {title: "TANGGAL LAHIR FORMAT (DD-MM-YYY) CONTOH (05-06-1990)", key: "tanggal_lahir", isCenter: true},
        {title: "AGAMA ", key: "agama", isCenter: true},
        {title: "NOMOR TELEPON", key: "hp", isNumber: true, isCenter: true},
        {title: "EMAIL", key: "email"},
        {title: "ANAK KE", key: "anak_ke", isCenter: true},
        {title: "STATUS DALAM KELUARGA, 1 = Anak Kandung, 2 = Anak Tiri, 3 = Anak Angkat", key: "status_keluarga", isCenter: true},
        {title: "ALAMAT", key: "alamat"},
        {title: "RT", key: "rt", isCenter: true},
        {title: "RW", key: "rw", isCenter: true},
        {title: "DESA/KELURAHAN", key: "kelurahan"},
        {title: "KECAMATAN", key: "kecamatan"},
        {title: "KABUPATEN/KOTA", key: "kabupaten"},
        {title: "PROVINSI", key: "provinsi"},
        {title: "KODE POS", key: "kode_pos", isCenter: true},
        {title: "NAMA AYAH", key: '"nama_ayah"'},
        {title: "TANGGAL LAHIR AYAH", key: "tgl_lahir_ayah", isCenter: true},
        {title: "PENDIDIKAN AYAH", key: "pendidikan_ayah"},
        {title: "PEKERJAAN AYAH", key: "pekerjaan_ayah"},
        {title: "NOMOR TELEPON AYAH", key: "nohp_ayah", isNumber: true, isCenter: true},
        {title: "ALAMAT AYAH", key: "alamat_ayah"},
        {title: "NAMA IBU", key: "nama_ibu"},
        {title: "TANGGAL LAHIR IBU", key: "tgl_lahir_ibu", isCenter: true},
        {title: "PENDIDIKAN IBU", key: "pendidikan_ibu"},
        {title: "PEKERJAAN IBU", key: "pekerjaan_ibu"},
        {title: "NOMOR TELEPON IBU", key: "nohp_ibu", isNumber: true, isCenter: true},
        {title: "ALAMAT IBU", key: "alamat_ibu"},
        {title: "NAMA WALI", key: "nama_wali"},
        {title: "TANGGAL LAHIR WALI", key: "tgl_lahir_wali", isCenter: true},
        {title: "PENDIDIKAN WALI", key: "pendidikan_wali"},
        {title: "PEKERJAAN WALI", key: "pekerjaan_wali"},
        {title: "NOMOR TELEPON WALI", key: "nohp_wali", isNumber: true, isCenter: true},
        {title: "ALAMAT WALI", key: "alamat_wali"},
        {title: "ID_SISWA JANGAN DIRUBAH", key: "id_siswa", isCenter: true},
    ]

    function createTable(kls, res) {
        let thead = '';
        let tbody = '';
        headerTbl.forEach(function (header) {
            thead += '<th class="text-center align-middle" data-a-wrap="true" data-fill-color="d3d3d3" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true">'+header.title+'</th>';
        })
        res.forEach(function (siswa, ind) {
            tbody += '<tr>';
            headerTbl.forEach(function (header) {
                if (header.key === 'number') {
                    tbody += '<td data-a-v="middle" data-a-h="center">' + (ind+1) + '</td>';
                } else {
                    const val = (header.isNumber ? "'" : "") + (siswa[header.key] || (header.isNumber ? "0" : " "))
                    tbody += '<td '+ (header.isCenter ? 'data-a-h="center"' : '')+' data-a-v="middle" data-a-h="left">'+val+'</td>';
                }
            })
            tbody += '</tr>';
        })

        $('#header-table').html(thead)
        $('#body-table').html(tbody)

        var table = document.querySelector("#download-tbl");
        TableToExcel.convert(table, {
            name: `Data Siswa Kelas ${kls}.xlsx`,
            sheet: {
                name: `KELAS ${kls}`
            }
        });
    }
     */

</script>