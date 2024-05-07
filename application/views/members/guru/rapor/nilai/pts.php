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
                        <h6><b><?= $mapel['nama_mapel'] ?></b></h6>
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
                                <div type="button" class="btn btn-primary w-100" onclick="processDownload(<?= $mapel['id_mapel'] ?>, <?= $kelas['id_kelas'] ?>)">
                                    <i class="fa fa-download"></i> <span class="ml-1">Download Template</span>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-8">
                                        <?= form_open_multipart('', array('id' => 'uploadfile')); ?>
                                        <div class="custom-file">
                                            <input type="file" name="upload_file" class="custom-file-input"
                                                   id="custom-file">
                                            <label class="custom-file-label" for="customFile">Pilih file excel</label>
                                        </div>
                                        <?= form_close(); ?>
                                    </div>

                                    <div class="col-4">
                                        <button id="upload" class="btn btn-success w-100">
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
                        <?php
                        $multi = $setting_rapor->kkm_tunggal == "0" ? "MULTI" : "TUNGGAL";
                        $isi = $kkm->kkm;
                        $d = 0;
                        $dsd = $isi - 1;
                        $c = $isi;
                        $csd = floor($isi + (100 - $isi) / 3);
                        $b = $csd + 1;
                        $bsd = floor($b + (100 - $b) / 2);
                        $a = $bsd + 1;
                        $asd = 100;
                        ?>
                        <table class="table w-100 table-bordered border-dark">
                            <tr class="bg-light text-center">
                                <td style="width: 20%">KKM</td>
                                <td style="width: 20%">Jenis KKM</td>
                                <td style="width: 40%">Interval Predikat Berdasarkan KKM</td>
                                <td style="width: 20%">Bobot Nilai PTS</td>
                            </tr>
                            <tr class="text-center text-md text-dark">
                                <td><?= $kkm->kkm ?></td>
                                <td><?= $multi ?></td>
                                <td>
                                    <span class="bg-danger badge p-1">0 ~ <?= $dsd ?> : D</span>
                                    <span class="bg-warning badge p-1"><?= $c . ' ~ ' . $csd ?> : C</span>
                                    <span class="bg-blue badge p-1"><?= $b . ' ~ ' . $bsd ?> : B</span>
                                    <span class="bg-success badge p-1"><?= $a ?> ~ 100 : A</span>
                                </td>
                                <td><?= $kkm->bobot_pts ?> %</td>
                            </tr>
                        </table>
                        <div id="t-siswa" class="w-100"></div>
                        <?= form_open('', array('id' => 'uploadnilai')) ?>
                        <input type="hidden" name="id_kelas" class="form-control" value="<?= $mapel['id_mapel'] ?>">
                        <input type="hidden" name="id_mapel" class="form-control" value="<?= $kelas['id_kelas'] ?>">
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
    <?= form_open('', array('id' => 'uploadpts')); ?>
    <input type="hidden" name="id_mapel" class="form-control" value="<?= $mapel['id_mapel'] ?>">
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
    var idMapel = '<?=$mapel['id_mapel']?>';
    var idKelas = '<?=$kelas['id_kelas']?>';
    var tpActive = '<?=$tp_active->id_tp?>';
    var smtActive = '<?=$smt_active->id_smt?>';
    var namaMapel = '<?=$mapel['nama_mapel']?>';
    var namaKelas = '<?=$kelas['nama_kelas']?>';

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
                    v.id_siswa
                ]
            );
            row++;
        });

        var tableSiswa = $('#t-siswa');

        var arrCol = [];

        var char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for (let i = 0; i < 5; i++) {
            var item = {};
            if (i === 0) {
                item['title'] = 'NIS/NISN\n' + char.charAt(i);
                item['width'] = 160;
            } else if (i === 1) {
                item['title'] = 'NAMA SISWA\n' + char.charAt(i);
                item['width'] = 250;
            } else if (i === 2) {
                item['title'] = 'NILAI PTS\n' + char.charAt(i);
                item['width'] = 100;
            } else if (i === 3) {
                item['title'] = 'PREDIKAT\n' + char.charAt(i);
                item['width'] = 100;
            } else if (i === 4) {
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

                if (col === 3 || col === 4) {
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
        $('#uploadpts').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var form = new FormData($('#uploadpts')[0]);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: base_url + 'rapor/uploadpts/' + idMapel + '/' + idKelas,
                data: form,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    console.log(data);
                    window.location.href = base_url + 'rapor/inputpts/' + idMapel + '/' + idKelas
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
                title: "Menyimpan nilai PTS",
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
                var idSiswa = s[5];
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_nilai_pts]" value="' + idMapel + idKelas + idSiswa + tpActive + smtActive + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_siswa]" value="' + idSiswa + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_tp]" value="' + tpActive + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_smt]" value="' + smtActive + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_mapel]" value="' + idMapel + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_kelas]" value="' + idKelas + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][nilai]" value="' + s[3] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][predikat]" value="' + s[4] + '" class="form-control col-1">';
            });
            $('#for-upload').html(inputs);

            $.ajax({
                type: "POST",
                url: base_url + 'rapor/importpts',
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
                            window.location.href = base_url + 'rapor/inputpts/' + idMapel + '/' + idKelas
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
        const response = await fetch(base_url + 'uploads/import/format/template_pts_client.xlsx')
        const arrayBuffer = await response.arrayBuffer()
        const excelTemplate = await JsExcelTemplate.fromArrayBuffer(arrayBuffer)
        excelTemplate.set("mapel", namaMapel);
        excelTemplate.set("kelas", namaKelas);
        excelTemplate.set("siswa", res.siswa);

        const blob = await excelTemplate.toBlob()
        saveAs(blob, `Nilai PTS ${namaMapel} ${namaKelas}.xlsx`);
    }

    async function processDownload(idMapel, idKelas) {
        $.ajax({
            url: base_url + "rapor/downloadtemplatepts/"+idMapel+"/"+idKelas,
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
                                    if (rowIndex === 5) {
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

    function uploadNilaiPTS(jsonData) {
        swal.fire({
            title: "Menyimpan nilai PTS",
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

        let formData = new FormData($('#uploadpts')[0])

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
            url: base_url + 'rapor/uploadnilaipts/',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                console.log(data);
                window.location.href = base_url + 'rapor/inputpts/' + idMapel + '/' + idKelas
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
                    uploadNilaiPTS(jsonData)
                }
            });
        }
    }

</script>
