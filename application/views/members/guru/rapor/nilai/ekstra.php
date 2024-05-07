<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul . $kelas['nama_kelas'] ?></h1>
                </div>
                <div class="col-6">
                    <button onclick="window.history.back();" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card my-shadow mb-4">
                <div class="card-header py-3">
                    <div class="card-title">
                        <h6><b><?= $ekstra['nama_ekstra'] ?></b></h6>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($kkm == null): ?>
                        <div class="alert alert-default-danger align-content-center" role="alert">
                            Download template tidak tersedia, Anda harus mengisi KKM terlebih dahulu di menu <b>DATA
                                RAPOR > KKM DAN BOBOT</b>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div type="button" class="btn btn-primary w-100" onclick="processDownload(<?= $ekstra['id_ekstra'] ?>, <?= $kelas['id_kelas'] ?>)">
                                    <i class="fa fa-download"></i> <span class="ml-1">Download Template</span>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-8">
                                        <?= form_open_multipart('', array('id' => 'uploadfile')); ?>
                                        <div class="custom-file">
                                            <input type="file" name="upload_file" class="custom-file-input" id="custom-file">
                                            <label class="custom-file-label" for="customFile">Pilih file excel</label>
                                        </div>
                                        <?= form_close(); ?>
                                    </div>

                                    <div class="col-4">
                                        <button id="upload" type="submit" class="btn btn-success w-100">
                                            <i class="fa fa-upload"></i> <span class="ml-1">Upload</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php if ($kkm == null) : ?>
                            <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                KKM dan Bobot belum diatur
                            </div>
                        <?php endif; ?>
                        <div id="t-siswa" class="w-100"></div>
                        <?= form_open('', array('id' => 'uploadnilai')) ?>
                        <div class="row mt-3 mb-3">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary mt-3 mb-3">
                                    <i class="fa fa-save mr-1"></i>Simpan
                                </button>
                            </div>
                        </div>
                        <div id="for-upload" class="d-none row"></div>
                        <?= form_close() ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?= form_open('', array('id' => 'uploadekstra')); ?>
    <input type="hidden" name="id_ekstra" class="form-control" value="<?= $ekstra['id_ekstra'] ?>">
    <input type="hidden" name="id_kelas" class="form-control" value="<?= $kelas['id_kelas'] ?>">
    <?= form_close(); ?>
</div>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/excel/exceljs.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/excel/js-excel-template.min.js"></script>

<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jexcel/js/jexcel.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jexcel/js/jsuites.js"></script>
<script>
    var arrSiswa = JSON.parse(JSON.stringify(<?= json_encode($siswa)?>));
    var arrNilai = JSON.parse(JSON.stringify(<?= json_encode($nilai)?>));
    var kkm = JSON.parse(JSON.stringify(<?= json_encode($kkm)?>));
    var idMapel = '<?=$ekstra['id_ekstra']?>';
    var idKelas = '<?=$kelas['id_kelas']?>';
    var namaMapel = '<?=$ekstra['nama_ekstra']?>';
    var namaKelas = '<?=$kelas['nama_kelas']?>';
    var tpActive = '<?=$tp_active->id_tp?>';
    var smtActive = '<?=$smt_active->id_smt?>';

    var isi = parseInt(kkm.kkm);
    var pre_d = 0;
    var pre_dsd = isi - 1;
    var pre_c = isi;
    var pre_csd = Math.floor(isi + (100 - isi) / 3);
    var pre_b = pre_csd + 1;
    var pre_bsd = Math.floor(pre_b + (100 - pre_b) / 2);
    var pre_a = pre_bsd + 1;
    var pre_asd = 100;

    $(function () {
        bsCustomFileInput.init();
    });

    function inRange(n, start, end) {
        return n >= start && n <= end;
    }

    function setDeskripsi(desk) {
        var result = '';
        if (inRange(desk, pre_a, pre_asd)) {
            result = "Sangat Baik";
        } else if (inRange(desk, pre_b, pre_bsd)) {
            result = "Baik";
        } else if (inRange(desk, pre_c, pre_csd)) {
            result = "Cukup";
        } else if (inRange(desk, pre_d, pre_dsd)) {
            result = "Kurang";
        }
        return result;
    }

    $(document).ready(function () {
        //console.log('a' + pre_a + ' b' + pre_b + ' bd' + pre_bsd + ' c' + pre_c + ' cd' + pre_csd + ' dd' + pre_dsd);
        var dataSiswa = [];
        var row = 1;
        $.each(arrSiswa, function (i, v) {
            var noInduk = v.nisn == null || v.nisn == '' ? v.nis : v.nisn;
            var nilai = arrNilai[v.id_siswa];
            dataSiswa.push(
                [
                    noInduk, v.nama, nilai.nilai,
                    '=IF(C' + row + '>' + pre_bsd + ',"A",IF(C' + row + '>' + pre_csd + ',"B",IF(C' + row + '>' + pre_dsd + ',"C",IF(C' + row + '<' + pre_c + ',"D",""))))',
                    '=IF(D' + row + '=="A","Sangat Baik",IF(D' + row + '=="B","Baik",IF(D' + row + '=="C","Cukup",IF(C' + row + '=="D","Kurang",""))))',
                    v.id_siswa
                ]
            );
            row++;
        });

        var tableSiswa = $('#t-siswa');

        var arrCol = [];

        var char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for (let i = 0; i < 6; i++) {
            var item = {};
            if (i === 0) {
                item['title'] = 'NIS/NISN\n' + char.charAt(i);
                item['width'] = 100;
            } else if (i === 1) {
                item['title'] = 'NAMA SISWA\n' + char.charAt(i);
                item['width'] = 250;
            } else if (i === 2) {
                item['title'] = 'NILAI\n' + char.charAt(i);
                item['width'] = 100;
            } else if (i === 3) {
                item['title'] = 'PREDIKAT\n' + char.charAt(i);
                item['width'] = 100;
            } else if (i === 4) {
                item['title'] = 'DESKRIPSI\n' + char.charAt(i);
                item['width'] = 100;
            } else if (i === 5) {
                item['title'] = 'ID';
                item['width'] = 1;
            }
            item['colspan'] = '1';

            arrCol.push(item);
        }

        tableSiswa.jexcel({
            data: dataSiswa,
            minDimensions: [5],
            //defaultColWidth: 100,
            tableOverflow: true,
            tableWidth: '' + tableSiswa.width() + 'px',
            tableHeight: (80 * dataSiswa.length) + 'px',
            search: true,
            freezeColumns: 2,
            //rowResize: true,
            columnResize: false,
            columns: arrCol,
            /*[
            {width: 100},
            {width: 300},       ],*/
            updateTable: function (instance, cell, col, row, val, label, cellName) {
                if (col === 0) {
                    cell.className = '';
                    cell.style.backgroundColor = '#f8d7da';
                    cell.style.textAlign = 'center';
                    cell.classList.add('readonly');
                }

                if (col === 1) {
                    cell.className = '';
                    cell.style.backgroundColor = '#f8d7da';
                    cell.style.textAlign = 'left';
                    cell.classList.add('readonly');
                }

                if (col === 3 || col === 4 || col === 5) {
                    cell.className = '';
                    cell.style.backgroundColor = '#fff3cd';
                    cell.classList.add('readonly');
                }

                if (col === 2) {
                    cell.style.backgroundColor = '#b9f6ca';
                }
            },
        });

        /*
        $('#uploadekstra').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var form = new FormData($('#uploadekstra')[0]);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: base_url + 'rapor/uploadekstra/' + idMapel + '/' + idKelas,
                data: form,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    console.log(data);
                    window.location.href = base_url + 'rapor/inputekstra/' + idMapel + '/' + idKelas
                },
                error: function (e) {
                    console.log("error", e.responseText);
                    showDangerToast(e.responseText);
                }
            });
        });
         */

        $('#uploadnilai').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            swal.fire({
                title: "Menyimpan nilai ekstrakulikuler",
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

            var tbl = $('table.jexcel tr').get().map(function (row) {
                return $(row).find('td').get().map(function (cell) {
                    return $(cell).html();
                });
            });
            tbl.shift();
            var inputs = '';
            $.each(tbl, function (idx, s) {
                var idSiswa = s[6];
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_nilai_ekstra]" value="' + idMapel + idKelas + idSiswa + tpActive + smtActive + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_siswa]" value="' + idSiswa + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_tp]" value="' + tpActive + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_smt]" value="' + smtActive + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_ekstra]" value="' + idMapel + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_kelas]" value="' + idKelas + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][nilai]" value="' + s[3] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][predikat]" value="' + s[4] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][deskripsi]" value="' + s[5] + '" class="form-control col-1">';
            });
            $('#for-upload').html(inputs);

            $.ajax({
                type: "POST",
                url: base_url + 'rapor/importekstra',
                data: $(this).serialize(),
                cache: false,
                success: function (data) {
                    console.log(data);
                    swal.fire({
                        title: "Sukses",
                        html: "<b>" + data + "<b> nilai berhasil disimpan",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(result => {
                        if (result.value) {
                            window.location.href = base_url + 'rapor/inputekstra/' + idMapel + '/' + idKelas
                        }
                    });
                },
                error: function (e) {
                    console.log("error", e.responseText);
                    swal.fire({
                        title: "Error",
                        html: "Gagal menyimpan",
                        icon: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    })
                }
            });
        });

        $('#custom-file').on('change', async function (e) {
            var files = e.target.files || [];
            if (!files.length) return;

            const jsonData = await getDataFromExcel(files[0])
            console.log('parse', jsonData)
        });

        $('#upload').on('click', function (e) {
            const input = $('#custom-file')
            const files = input[0].files
            if (!files.length) {
                swal.fire({
                    title: "INFO",
                    text: 'Tidak ada file untuk diupload',
                    icon: "info"
                });
            } else {
                parseFile(files[0]);
            }
        })

    });

    async function downloadTemplate(res) {
        const response = await fetch(base_url + 'uploads/import/format/template_ekstra_client.xlsx')
        const arrayBuffer = await response.arrayBuffer()
        const excelTemplate = await JsExcelTemplate.fromArrayBuffer(arrayBuffer)
        excelTemplate.set("mapel", namaMapel);
        excelTemplate.set("kelas", namaKelas);
        excelTemplate.set("siswa", res.siswa);

        const blob = await excelTemplate.toBlob()
        saveAs(blob, `Nilai ${namaMapel} ${namaKelas}.xlsx`);
    }

    async function processDownload(idMapel, idKelas) {
        $.ajax({
            url: base_url + "rapor/downloadtemplateekstra/"+idMapel+"/"+idKelas,
            method: "GET",
            success: function (result) {
                console.log("result", result);
                downloadTemplate(result)
            }, error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
                const err = JSON.parse(xhr.responseText)
                swal.fire({
                    title: "Error",
                    text: err,
                    icon: "error"
                });
            }
        });
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
                            let cols = {
                                'name': sheet.name,
                                'header': [],
                                'rows': []
                            }
                            let head = []
                            sheet.eachRow({includeEmpty: true}, (row, rowIndex) => {
                                let obj = {}
                                for (let i = 0; i < row.values.length; i++) {
                                    if (rowIndex === 4) {
                                        let val = row.values[i] ? (row.values[i] === 'N I S N' ? 'NISN' : row.values[i].replaceAll(' ', '').replaceAll('.', '')) : ''
                                        if (val.includes('/')) val = val.split('/')[1]
                                        head.push(val.toLowerCase())
                                        if (row.values[i]) {
                                            let h = {
                                                label: row.values[i],
                                                value: val.toLowerCase(),
                                            }
                                            cols.header.push(h)
                                        }
                                    } else {
                                        obj[head[i]] = row.values[i]
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

    function uploadNilaiEkstra(jsonData) {
        swal.fire({
            title: "Menyimpan nilai Ekstrakurikuler",
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

        let formData = new FormData($('#uploadekstra')[0])

        const nilaiSiswa = jsonData.NILAI.rows
        nilaiSiswa.forEach(function (siswa, ind) {
            for (const key in siswa) {
                if (key && key !== 'no') {
                    formData.append('siswa['+ind+']['+key+']', siswa[key])
                }
            }
        })

        $.ajax({
            type: "POST",
            url: base_url + 'rapor/uploadnilaiekstra/',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                console.log(data);
                window.location.href = base_url + 'rapor/inputekstra/' + idMapel + '/' + idKelas
            },
            error: function (e) {
                console.log("error", e.responseText);
                showDangerToast(e.responseText);
            }
        });
    }

    async function parseFile(file) {
        const jsonData = await getDataFromExcel(file)
        console.log('parse', jsonData)
        if (jsonData) {
            swal.fire({
                title: "UPLOAD",
                html: "Nilai yang sudah ada akan ditimpa. Lanjutkan?",
                icon: "warning",
                showCancelButton: 'Batal',
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            }).then(result => {
                if (result.value) {
                    uploadNilaiEkstra(jsonData)
                }
            });
        }
    }

</script>
