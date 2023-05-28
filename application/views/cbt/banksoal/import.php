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
                                    indexTr = 1;
                                    if (jenis === '1' || jenis === '2') {
                                        var jawaban = $(this).find("td:eq(4)").text().trim();
                                        hide = jawaban === '' && soal === '';
                                        if (hide) {
                                            $(this).remove();
                                        }
                                    } else if (jenis === '3') {
                                        var baris = $(this).find("td:eq(4)").text().trim();
                                        var kode = $(this).find("td:eq(6)").text().trim();
                                        hide = baris === '' && kode === '' && soal === '';
                                        if (hide) {
                                            $(this).remove();
                                        }
                                    }
                                } else {
                                    indexTr += 1;
                                    if (jenis === '4' || jenis === '5') {
                                        var jawab = $(this).find("td:eq(3)").text().trim();
                                        hide = jawab === '' && soal === '';
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
                                    'font-size': '22pt',
                                    'font-family': '"uthmanic"',
                                    'direction': 'rtl',
                                    'text-align': 'justify'
                                });
                            }
                        });
                    });

                    //'img_'.$id_bank.date('YmdHis').$numimg.'.'.$extension
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();
                    var h = today.getHours();
                    var m = today.getMinutes();
                    var s = today.getSeconds();

                    var numing = 1;
                    $('#file-preview img').each(function () {
                        today = yyyy + '' + mm + '' + dd + '' + h + '' + m + '' + s;

                        var curSrc = $(this).attr('src');
                        var block = curSrc.split(";");
                        var contentType = block[0].split("/")[1];
                        var contentData = block[1].split(",")[1];
                        var id = 'img_' + bank_id + today + numing;
                        $(this).attr('id', id);
                        numing++;
                        appendFileAndSubmit('#' + id, contentData, id + '.' + contentType);
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
        $.each($tables, function (i, row) {
            var tbl = $(this).find('.tr-soal').get().map(function (row) {
                return $(row).find('.td-soal').get().map(function (cell) {
                    return $(cell).html();
                });
            });
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
                        var soalCek = $(items[1]).text().trim();
                        var ops = $(items[3]).text().trim();
                        var knc = $(items[5]).text().trim();

                        if (soalCek != "") {
                            $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                                '[' + no + '][soal]" value="' + encodeURIComponent(removeUrl(items[1])) + '">');

                            $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                                '[' + no + '][opsi][' + ops + ']" value="' + encodeURIComponent(removeUrl(items[4])) + '">');

                            if (knc != "" && knc.toUpperCase() == "V") {
                                $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                                    '[' + no + '][kunci][]" value="' + ops + '">');
                            }
                        }
                    } else {
                        myRows[j]['NO'] = no1;
                        myRows[j]['SOAL'] = '';
                        myRows[j]['JENIS'] = tempJenis;
                        var ops1 = $(items[0]).text().trim();

                        $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                            '[' + no1 + '][opsi][' + ops1 + ']" value="' + encodeURIComponent(removeUrl(items[1])) + '">');

                        var knc1 = $(items[2]).text().trim();
                        if (knc1 != "" && knc1.toUpperCase() == "V") {
                            $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                                '[' + no1 + '][kunci][]" value="' + ops1 + '">');
                        }
                    }
                } else if (tempJenis == '3') {
                    if (items.length === 9) {
                        no3 = $(items[0]).text().trim();

                        var kd_baris = $(items[3]).text().trim().toUpperCase();
                        var kd_kolom = $(items[5]).text().trim().toUpperCase();
                        var kd_kunci = $(items[7]).text().trim().toUpperCase();
                        $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                            '[' + no3 + '][soal]" value="' + encodeURIComponent(removeUrl(items[1])) + '">');

                        var brs = $(items[4]).text().trim();
                        if (brs != "") {
                            $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                                '[' + no3 + '][baris][' + kd_baris + ']" value="' + brs + '">');
                        }

                        var klm = $(items[6]).text().trim();
                        if (klm != "") {
                            $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                                '[' + no3 + '][kolom][' + kd_kolom + ']" value="' + klm + '">');
                        }

                        var kncs = $(items[8]).text().trim().toUpperCase();
                        if (kncs != "") {
                            $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                                '[' + no3 + '][kunci][' + kd_kunci + ']" value="' + kncs + '">');
                        }
                    } else {
                        var kd_baris1 = $(items[0]).text().trim().toUpperCase();
                        var kd_kolom1 = $(items[2]).text().trim().toUpperCase();
                        var kd_kunci1 = $(items[4]).text().trim().toUpperCase();

                        var brs1 = $(items[1]).text().trim();
                        if (brs1 != "") {
                            $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                                '[' + no3 + '][baris][' + kd_baris1 + ']" value="' + brs1 + '">');
                        }

                        var klm1 = $(items[3]).text().trim();
                        if (klm1 != "") {
                            $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                                '[' + no3 + '][kolom][' + kd_kolom1 + ']" value="' + klm1 + '">');
                        }

                        var kncs1 = $(items[5]).text().trim().toUpperCase();
                        if (kncs1 != "") {
                            $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                                '[' + no3 + '][kunci][' + kd_kunci1 + ']" value="' + kncs1 + '">');
                        }
                    }
                } else {
                    var no4 = $(items[0]).text().trim();
                    $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                        '[' + no4 + '][soal]" value="' + encodeURIComponent(removeUrl(items[1])) + '">');

                    $('#input-soal-word').append('<input type="text" name="soal[' + tempJenis + ']' +
                        '[' + no4 + '][kunci]" value="' + encodeURIComponent(removeUrl(items[3])) + '">');
                }
                tbls[tempJenis] = myRows;
            }
            index++;
        });

        setTimeout(function () {
            var datapost = $('#grouping').serialize() + "&id_bank=" + bank_id;// + "&data=" + JSON.stringify(tbls);
            console.log('old_json', datapost);
            sendData(datapost);
        }, 1000);
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
                        window.location.href = base_url + 'cbtbanksoal';
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
