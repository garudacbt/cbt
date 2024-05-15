<div class="content-wrapper bg-white">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-9">
                    <h1><?= $subjudul ?></h1>
                </div>
                <div class="col-3">
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
            <div class="col-lg-12 p-0">
                <div class="alert alert-danger shadow align-content-center" role="alert">
                    <strong>Catatan!</strong> untuk import data dari file excel/word, silahkan download templatenya
                    terlebih dahulu.
                </div>
            </div>

            <div class="card my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><b>Upload Soal <?= $bank->nama_mapel . " kelas " . $bank->bank_level ?></b>
                    </h6>
                    <input type="hidden" name="bank_id" id="formInput" class="form-control">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="<?= base_url('uploads/import/format/format_soal_akm.docx') ?>"
                               class="btn-success btn mb-1 w-100"
                               download="Template Soal <?= $bank->nama_mapel ?> <?= $bank->bank_kode ?>">
                                <i class="fas fa-download"></i><span class="ml-2">Download Template</span>
                            </a>
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="row">
                                <div class="col-8">
                                    <?= form_open_multipart('', array('id' => 'formPreviewWord')); ?>
                                    <div class="custom-file">
                                        <input type="file" name="upload_file" class="custom-file-input input-sm"
                                               id="upload-word" accept=".doc, .docx">
                                        <label class="custom-file-label" for="upload-word">Upload Soal</label>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-primary w-100" onclick="getData()">
                                        <i class="fas fa-cloud-upload-alt mr-2"></i>Upload
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="file-preview" class="table-responsive"
                         data-id="<?= $this->security->get_csrf_hash() ?>"
                         data-name="<?= $this->security->get_csrf_token_name() ?>">
                        <div class="alert alert-default-info align-content-center" role="alert">
                            Sebelum upload, pastikan anda telah mengisi format yang telah disediakan.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= form_open('create', array('id' => 'grouping')) ?>
<div id="input-soal-word" class="d-none"></div>
<?= form_close() ?>

<script type="text/javascript"
        src="<?= base_url() ?>/assets/plugins/jquery-table2json/src/tabletojson-cell.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jquery-table2json/src/tabletojson-row.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jquery-table2json/src/tabletojson.js"></script>
<script src="<?= base_url() ?>/assets/app/js/mammoth.browser.min.js"></script>
<script>
    var bank_id = '<?= $bank->id_bank ?>';
    const jenjang = '<?= $setting->jenjang ?>';
    $(function () {
        bsCustomFileInput.init();
    });

    var pg;
    var essai;
    var filename = '';
    $(document).ready(function () {
        ajaxcsrf();

        $('#upload-word').on('change', function (e) {
            var form = new FormData($("#formPreviewWord")[0]);
            filename = $("#formPreviewWord").text();
            //preview(base_url + 'cbtbanksoal/previewword/'+bank_id, form, filename);
            parseWordDocxFile(e.target.files, '#file-preview');
        });
    });

    function parseWordDocxFile(inputElement, showDiv) {
        var files = inputElement || [];
        if (!files.length) return;

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

        var file = files[0];
        console.time();
        var reader = new FileReader();

        var options = {
            styleMap: ["u => u", "strike => del"]
        };
        reader.onloadend = function (event) {
            var arrayBuffer = reader.result;
            mammoth.convertToHtml({arrayBuffer: arrayBuffer}, options).then(function (resultObject) {
                $(showDiv).html(resultObject.value);
                setTimeout(function () {
                    $('#file-preview').children().not("table").remove();
                    $('#file-preview').children('table').each(function (i, v) {
                        console.log('tbls', i);
                        $(this).addClass('table table-bordered w-100 table-soal');

                        const $trs = $(this).find('tr'), headers = $trs.splice(0, 1); // header rows

                        var indexTr = 0;
                        let hide = false;
                        $trs.each(function (index, tr) {
                            var cekTbl = $(tr).parent().closest('td');
                            if (cekTbl.length === 0) {
                                $(this).addClass('tr-soal');
                                var $tds = $(this).find('td');
                                $tds.each(function (it, td) {
                                    var tdlength = $(td).closest('tr').hasClass('tr-soal');
                                    if (tdlength) $(td).addClass('td-soal');
                                    $(td).find('table').addClass('table table-bordered table-inner');
                                });

                                var rows = $(this).find("td:eq(0)").attr('rowspan');
                                var soal = $(this).find("td:eq(1)").text().trim();
                                var jenis = $(this).find("td:eq(2)").text().trim();
                                if (rows != null) {
                                    const imgSoal = $(this).find("td:eq(1)").find('img').length
                                    indexTr = 1;
                                    if (jenis === '1' || jenis === '2') {
                                        const noSoal = soal === '' && imgSoal === 0
                                        var jawaban = $(this).find("td:eq(4)").text().trim();
                                        console.log('jawaban', jawaban)
                                        hide = jawaban === '' && noSoal;
                                        if (hide) {
                                            $(this).remove();
                                        }
                                    } else if (jenis === '3') {
                                        const imgBaris = $(this).find("td:eq(4)").find('img').length
                                        const imgkolom = $(this).find("td:eq(6)").find('img').length

                                        var baris = $(this).find("td:eq(4)").text().trim();
                                        var kolom = $(this).find("td:eq(6)").text().trim();

                                        const noSoal = soal === '' && imgSoal === 0
                                        const noBaris = baris === '' && imgBaris === 0
                                        const noKolom = kolom === '' && imgkolom === 0

                                        hide = noBaris && noKolom && noSoal;
                                        if (hide) {
                                            $(this).remove();
                                        }
                                    }
                                } else {
                                    indexTr += 1;
                                    if (jenis === '4' || jenis === '5') {
                                        const imgSoal = $(this).find("td:eq(1)").find('img').length
                                        var jawab = $(this).find("td:eq(3)").text().trim();
                                        const noSoal = soal === '' && imgSoal === 0
                                        hide = jawab === '' && noSoal;
                                        if (hide) {
                                            $(this).remove();
                                        }
                                    }
                                }
                                if (indexTr > 1 && hide) {
                                    $(this).remove();
                                }
                            }
                        });

                        $(this).find('p').each(function () {
                            var arabic = /[\u0600-\u06FF]/;
                            var string = $(this).text();
                            if (arabic.test(string)) {
                                $(this).css({
                                    'font-size': '16pt',
                                    'font-family': 'Calibri',
                                    'direction': 'rtl',
                                    'text-align': 'justify'
                                });
                            }
                        });
                    });

                    var attrId = document.getElementById("formInput");
                    attrId.setAttribute("value", bank_id);
                    swal.close();

                }, 500);
            });
        };
        reader.readAsArrayBuffer(file);
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

        var tempJenis = "0";
        var index = 0;
        var $tables = $('.table-soal');
        var tbls = {};

        let formData = new FormData($('#grouping')[0])
        formData.append("id_bank", bank_id)

        $.each($tables, function (i, row) {
            var tbl = $(this).find('.tr-soal').get().map(function (row) {
                return $(row).find('.td-soal').get().map(function (cell) {
                    return $(cell).html();
                });
            });
            if (tbl[0] === undefined) return;
            //console.log('tabel1', tbl[0])
            var rowSoal = 0;
            if (i === index) {
                var p = tbl[0][2];
                tempJenis = $(p).text().trim();
                rowSoal = 0;

                if (isNaN(parseInt(tempJenis))) {
                    p = tbl[1][2];
                    tempJenis = $(p).text().trim();
                    rowSoal = 1;

                    if (isNaN(parseInt(tempJenis))) {
                        p = tbl[2][2];
                        tempJenis = $(p).text().trim();
                        rowSoal = 2;
                    }
                }
            }

            var myRows = {};
            var no1 = 0;
            var no3 = 0;
            for (let j = rowSoal; j < tbl.length; j++) {
                var items = tbl[j];
                myRows[j] = {};
                if (tempJenis == "1" || tempJenis == "2") {
                    if (items.length === 6) {
                        var no = $(items[0]).text().trim();
                        no1 = no;
                        const imgCheck = $(items[1]).find('img').length > 0
                        var soalCek = $(items[1]).text().trim();
                        var ops = $(items[3]).text().trim();
                        var knc = $(items[5]).text().trim();

                        if (soalCek != "" || imgCheck) {
                            formData.append('soal[' + tempJenis + ']' +'[' + no + '][soal]', encodeURIComponent(removeUrl(items[1])));
                            formData.append('soal[' + tempJenis + ']' + '[' + no + '][opsi][' + ops + ']', encodeURIComponent(removeUrl(items[4])));

                            if (knc != "" && knc.toUpperCase() == "V") {
                                formData.append('soal[' + tempJenis + ']' + '[' + no + '][kunci][]', ops);
                            }
                        }
                    } else {
                        myRows[j]['NO'] = no1;
                        myRows[j]['SOAL'] = '';
                        myRows[j]['JENIS'] = tempJenis;
                        var ops1 = $(items[0]).text().trim();

                        formData.append('soal[' + tempJenis + ']' + '[' + no1 + '][opsi][' + ops1 + ']', encodeURIComponent(removeUrl(items[1])));

                        var knc1 = $(items[2]).text().trim();
                        if (knc1 != "" && knc1.toUpperCase() == "V") {
                            formData.append('soal[' + tempJenis + ']' + '[' + no1 + '][kunci][]', ops1);
                        }
                    }
                } else if (tempJenis == '3') {
                    if (items.length === 9) {
                        no3 = $(items[0]).text().trim(); // nomor

                        var kd_baris = $(items[3]).text().trim().toUpperCase();
                        var kd_kolom = $(items[5]).text().trim().toUpperCase();
                        var kd_kunci = $(items[7]).text().trim().toUpperCase();

                        formData.append('soal[' + tempJenis + ']' + '[' + no3 + '][soal]', encodeURIComponent(removeUrl(items[1])));

                        const imgBrs = $(items[4]).find('img').length > 0
                        var brs = $(items[4]).text().trim();
                        if (brs != "" || imgBrs) {
                            formData.append('soal[' + tempJenis + ']' + '[' + no3 + '][baris][' + kd_baris + ']', encodeURIComponent(removeUrl(items[4])));
                        }

                        const imgKlm = $(items[6]).find('img').length > 0
                        var klm = $(items[6]).text().trim();
                        if (klm != "" || imgKlm) {
                            formData.append('soal[' + tempJenis + ']' + '[' + no3 + '][kolom][' + kd_kolom + ']', encodeURIComponent(removeUrl(items[6])));
                        }

                        var kncs = $(items[8]).text().trim().toUpperCase();
                        if (kncs != "") {
                            formData.append('soal[' + tempJenis + ']' + '[' + no3 + '][kunci][' + kd_kunci + ']', kncs);
                        }
                    } else {
                        var kd_baris1 = $(items[0]).text().trim().toUpperCase();
                        var kd_kolom1 = $(items[2]).text().trim().toUpperCase();
                        var kd_kunci1 = $(items[4]).text().trim().toUpperCase();

                        const imgBrs1 = $(items[1]).find('img').length > 0
                        var brs1 = $(items[1]).text().trim();
                        if (brs1 != "" || imgBrs1) {
                            formData.append('soal[' + tempJenis + ']' + '[' + no3 + '][baris][' + kd_baris1 + ']', encodeURIComponent(removeUrl(items[1])));
                        }

                        const imgKlm1 = $(items[3]).find('img').length > 0
                        var klm1 = $(items[3]).text().trim();
                        if (klm1 != "" || imgKlm1) {
                            formData.append('soal[' + tempJenis + ']' + '[' + no3 + '][kolom][' + kd_kolom1 + ']', encodeURIComponent(removeUrl(items[3])));
                        }

                        var kncs1 = $(items[5]).text().trim().toUpperCase();
                        if (kncs1 != "") {
                            formData.append('soal[' + tempJenis + ']' + '[' + no3 + '][kunci][' + kd_kunci1 + ']', kncs1);
                        }
                    }
                } else {
                    var no4 = $(items[0]).text().trim();
                    formData.append('soal[' + tempJenis + ']' + '[' + no4 + '][soal]', encodeURIComponent(removeUrl(items[1])));
                    if (tempJenis == '4') {
                        formData.append('soal[' + tempJenis + ']' + '[' + no4 + '][kunci]', $(items[3]).text().trim());
                    } else {
                        formData.append('soal[' + tempJenis + ']' + '[' + no4 + '][kunci]', encodeURIComponent(removeUrl(items[3])));
                    }
                }
                tbls[tempJenis] = myRows;
            }
            index++;
        });

        setTimeout(function () {
            //console.log('old_json', datapost);
            console.log('form', Object.fromEntries(formData))
            sendData(formData);
        }, 500);
    }

    function sendData(datapost) {
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
            url: base_url + "cbtbanksoal/uploadsoal",
            method: "POST",
            processData: false,
            contentType: false,
            data: datapost,
            success: function (result) {
                console.log("result", result);
                swal.fire({
                    title: "Sukses",
                    html: "Total isi soal: <b>" + result.total + "</b><br>Total soal diimport: <b>" + result.insert + "</b>",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                }).then(result => {
                    if (result.value) {
                        window.history.back()
                        //window.location.href = base_url + 'cbtbanksoal';
                    }
                });
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

    function appendFileAndSubmit(id, imageURL, fileName) {
        var datapost = $('#grouping').serialize() + "&src=" + imageURL.replace(/\+/g, "%2B") + "&name=" + fileName;
        $.ajax({
            url: base_url + "cbtbanksoal/uploadsoalimage",
            data: datapost,
            type: "POST",
            error: function (err) {
                console.error(err);
            },
            success: function (data) {
                $(id).attr('src', base_url + data.src);
                //$(id).attr('data-imgsrc', data.src);
                //console.log(data);
            },
            complete: function () {
                //console.log("Request finished.");
            }
        });
    }

    function removeUrl(str) {
        return str.replace(base_url, '');
    }

</script>
