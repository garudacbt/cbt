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
                    <h6 class="card-title"><b>Upload Soal <?= $bank->nama_mapel." kelas ".$bank->bank_level ?></b></h6>
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
                                        <input type="file" name="upload_file" class="custom-file-input input-sm" id="upload-word" accept=".doc, .docx">
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
<?= form_close() ?>

<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jquery-table2json/src/tabletojson-cell.js"></script>
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

        $('#upload-word').on('change', function(e){
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
        reader.onloadend = function(event) {

            var arrayBuffer = reader.result;
            mammoth.convertToHtml({arrayBuffer: arrayBuffer}).then(function (resultObject) {
                $(showDiv).html(resultObject.value);

                setTimeout(function () {
                    $('#file-preview').children().not("table").remove();
                    $('#file-preview').children('table').each(function (i, v) {
                        $(this).addClass('table table-bordered table-sm w-100');

                        const $trs = $(this).find('tr'), headers = $trs.splice(0, 1); // header rows

                        var indexTr = 0;
                        let hide = false;
                        $trs.each(function (index, tr) {
                            var rows = $(this).find("td:eq(0)").attr('rowspan');
                            var soal = $(this).find("td:eq(1)").text().trim();
                            var jenis = $(this).find("td:eq(2)").text().trim();
                            if (rows != null) {
                                indexTr = 1;
                                if (jenis === '1' || jenis === '2') {
                                    var jawaban = $(this).find("td:eq(4)").text().trim();
                                    hide = jawaban === '' && soal === '';
                                    if (hide) {
                                        $(this).hide();
                                    }
                                } else if (jenis === '3') {
                                    var baris = $(this).find("td:eq(4)").text().trim();
                                    var kode = $(this).find("td:eq(6)").text().trim();
                                    hide = baris === '' && kode === '' && soal === '';
                                    if (hide) {
                                        $(this).hide();
                                    }
                                }
                            } else {
                                indexTr += 1;
                                if (jenis === '4' || jenis === '5') {
                                    var jawab = $(this).find("td:eq(3)").text().trim();
                                    hide = jawab === '' && soal === '';
                                    if (hide) {
                                        $(this).hide();
                                    }
                                }
                            }
                            if (indexTr > 1 && hide) {
                                $(this).hide();
                            }
                        });

                        $(this).find('p').each(function () {
                            var arabic = /[\u0600-\u06FF]/;
                            var string = $(this).text();
                            if (arabic.test(string)) {
                                $(this).css({'font-size': '22pt', 'font-family':'"uthmanic"', 'direction':'rtl', 'text-align':'justify'});
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
                        today = yyyy+''+mm+''+dd+''+h+''+m+''+s;

                        var curSrc = $(this).attr('src');
                        var block = curSrc.split(";");
                        var contentType = block[0].split("/")[1];
                        var contentData = block[1].split(",")[1];
                        var id = 'img_' + bank_id + today + numing;
                        $(this).attr('id', id);
                        numing ++;
                        appendFileAndSubmit('#'+id, contentData, id + '.' + contentType);
                        //console.log('img', id);
                    });

                    var attrId = document.getElementById("formInput");
                    attrId.setAttribute("value", bank_id);
                    swal.close();
                }, 500);

            });
            /*
            console.timeEnd();
            mammoth.extractRawText({arrayBuffer: arrayBuffer}).then(function (resultObject) {
                result2.innerHTML = resultObject.value;
                console.log(resultObject.value);
            });

            mammoth.convertToMarkdown({arrayBuffer: arrayBuffer}).then(function (resultObject) {
                result3.innerHTML = resultObject.value;
                console.log(resultObject.value);
            })
            */
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

        var header1 = ['NO', 'SOAL', 'JENIS', 'OPSI', 'JAWABAN', 'KUNCI'];
        var header3 = ['NO', 'SOAL', 'JENIS', 'KD_BARIS', 'BARIS', 'KD_KOLOM', 'KOLOM', 'KD_KUNCI', 'KUNCI'];
        var header4 = ['NO', 'SOAL', 'JENIS', 'KUNCI'];
        var tempJenis = "0";

        var index = 0;
        var $tables = $('table');
        var tbls = {};
        $.each($tables, function (i, row) {
            var tbl = $(this).find('tbody tr').get().map(function (row) {
                return $(row).find('td').get().map(function (cell) {
                    return $(cell).html();
                });
            });
            console.log('table', tbl);
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
            for (let j = rowSoal; j < tbl.length; j++) {
                var items = tbl[j];
                myRows[j] = {};
                if (tempJenis == "1" || tempJenis == "2") {
                    if (items.length === 6) {
                        var no = $(items[0]).text();
                        for (let k = 0; k < items.length; k++) {
                            const kol = header1[k];
                            const p1 = items[k];
                            const text = $(p1).text().trim();
                            if (k === 1 || k === 4 ) {
                                myRows[j][kol] = encodeHtml(p1);
                            } else {
                                myRows[j][kol] = text;
                            }
                        }
                    } else {
                        myRows[j]['NO'] = no;
                        myRows[j]['SOAL'] = '';
                        myRows[j]['JENIS'] = tempJenis;
                        for (let k = 0; k < items.length; k++) {
                            const kol = header1[k+3];
                            if (k === 1 || k === 4 ) {
                                myRows[j][kol] = encodeHtml(items[k]);
                            } else {
                                var par = items[k];
                                myRows[j][kol] = $(par).text().trim();
                            }
                        }
                    }
                } else if (tempJenis == '3') {
                    if (items.length === 9) {
                        var no3 = $(items[0]).text().trim();
                        for (let k = 0; k < items.length; k++) {
                            const kol = header3[k];
                            const p3 = items[k];
                            const text3 = $(p3).text().trim();
                            if (k === 1) {
                                myRows[j][kol] = encodeHtml(p3);
                            } else {
                                myRows[j][kol] = text3;
                            }
                        }
                    } else {
                        myRows[j]['NO'] = no3;
                        myRows[j]['SOAL'] = '';
                        myRows[j]['JENIS'] = tempJenis;
                        for (let k = 0; k < items.length; k++) {
                            const kol = header3[k+3];
                            var par3 = items[k];
                            myRows[j][kol] = $(par3).text().trim();
                        }
                    }
                } else {
                    for (let k = 0; k < items.length; k++) {
                        const kol = header4[k];
                        const p3 = items[k];
                        const text3 = $(p3).text().trim();
                        if (k === 1 || k === 3 ) {
                            myRows[j][kol] = encodeHtml(p3);
                        } else {
                            myRows[j][kol] = text3;
                        }
                    }
                }
                //if (myRows[])
                tbls[tempJenis] = myRows;
            }
            index ++;
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
                        //window.location.href = base_url + 'cbtbanksoal';
                    }
                });
            }, error: function (xhr, status, error) {
                swal.close();
                console.log("error", xhr.responseText);
                showDangerToast('ERROR!!');
            }
        });
    }

    function appendFileAndSubmit(id, imageURL, fileName){
        console.log('data', imageURL);
        var datapost = $('#grouping').serialize() + "&src=" + imageURL.replace(/\+/g, "%2B") + "&name=" + fileName;
        $.ajax({
            url: base_url + "cbtbanksoal/uploadsoalimage",
            data: datapost,// the formData function is available in almost all new browsers.
            type:"POST",
            //dataType:"json", // Change this according to your response from the server.
            error:function(err){
                console.error(err);
            },
            success:function(data){
                $(id).attr('src', base_url + data.src);
                console.log(data);
            },
            complete:function(){
                console.log("Request finished.");
            }
        });
    }

    function progressHandlingFunction(e) {
        if (e.lengthComputable) {
            //Log current progress
            console.log((e.loaded / e.total * 100) + '%');

            //Reset progress on complete
            if (e.loaded === e.total) {
                console.log("Upload finished.");
            }
        }
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
</script>
