<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/08/20
 * Time: 22:29
 */

$kelas_pilih = unserialize($tugas->tugas_kelas ?? '');

$dataFileAttach = [];
$att = @unserialize($tugas->file ?? '');
if ($att !== false) {
    $dataFileAttach = unserialize($tugas->file ?? '');
} else {
    if ($tugas->file != null) {
        $file = $tugas->file;
        if (strpos($file, 'http') == false) {
            $file = base_url('uploads/tugas/') . $tugas->file;
        }
        $src_file = [
            'src' => $file,
            'size' => '',
            'type' => mime_content_type(str_replace(base_url(), '', $file)),
            'name' => $tugas->file
        ];
        array_push($dataFileAttach, $src_file);
    }
}

if (empty($kelas_pilih)) {
    $arrKelasSelected[] = [
        'mapel' => '0', 'kelas' => '0'
    ];
} else {
    foreach ($kelas_pilih as $m) {
        $arrKelasSelected[] = [
            'mapel' => $tugas->id_mapel, 'kelas' => $m
        ];
    }
}

?>

<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
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
            <div class="card card-default my-shadow mb-4">
                <?php
                //echo '<code><pre>';
                //var_dump($tugas);
                //echo '<br>';
                //var_dump($tugas->tugas_kelas);
                //echo '</pre></code>';
                ?>
                <?= form_open('', array('id' => 'formtugas')) ?>
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                    <div class="card-tools">
                        <button type="submit" class="btn btn-primary btn btn-sm float-right ml-1">Simpan</button>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" class="form-control" name="id_materi" value="<?= $id_materi ?>">
                    <div id="input-tugas" class="row">
                        <div class="col-md-3 mb-3">
                            <label>Kode</label>
                            <input name="kode_tugas" value="<?= $tugas->kode_tugas ?>" type="text"
                                   class="form-control form-control-sm" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Guru</label>
                            <?php echo form_dropdown(
                                'guru',
                                $gurus,
                                $tugas->id_guru,
                                'id="guru" class="select2 form-control form-control-sm" required'
                            ); ?>
                        </div>
                        <div class='col-md-3 mb-3'>
                            <label>Mapel</label>
                            <select name="mapel" id="mapel" class="select2 form-control form-control-sm w-100"
                                    required=""></select>
                        </div>
                        <div class='col-md-3 mb-3'>
                            <label>Kelas</label>
                            <select name="kelas[]" id="kelas" class="select2 form-control form-control-sm"
                                    multiple="multiple"
                                    data-placeholder="Pilih Kelas" required=""></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Judul Tugas</label>
                        <input type="text" class="form-control" name="judul" aria-describedby="helpId"
                               value="<?= $tugas->judul_tugas ?>" placeholder="Judul tugas" required>
                    </div>
                    <div class="form-group">
                        <label>Isi Tugas</label>
                        <textarea id="text-tugas" name='isi_tugas' class='editor'
                                  data-id="<?= $this->security->get_csrf_hash() ?>"
                                  data-name="<?= $this->security->get_csrf_token_name() ?>"
                                  rows='10' cols='80' style='width:100%;'>
								<?= $tugas->isi_tugas ?>
						</textarea>
                    </div>
                </div>
                <?= form_close(); ?>
                <?= form_open_multipart('', array('id' => 'formfile')) ?>
                <div class="card card-default m-4">
                    <div class="card-header">
                        <h6 class="card-title">File Pendukung</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <ul id="media-list" class="clearfix">
                                <li class="myupload">
                                    <span>
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        <input name="file_uploads" type="file" id="picupload"
                                               class="picupload">
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer">
                        Info:
                    </div>
                    <div class="overlay d-none"><i class="fas fa-2x fa-sync-alt fa-spin mr-4"></i> Memuat file ...</div>
                </div>
                <?= form_close(); ?>
            </div>
    </section>
</div>

<script>
    const kls = JSON.parse('<?=json_encode($kelas)?>');
    var arrJadwal = [];
    var arrKelas = [];
    var arrKelasMapel = [];
    var dataFiles = [];
    var arrFileAttach = JSON.parse('<?= json_encode($dataFileAttach)?>');
    dataFiles = $.merge(dataFiles, arrFileAttach);

    $.map(kls, function (value, index) {
        item = {};
        item ["id"] = index;
        item ["kelas"] = value;
        arrKelas.push(item);
        //return [index];
    });

    $(document).ready(function () {
        $('#kelas').select2();
        $('#guru').select2();
        createPreviewFile();

        //onChangeGuru('<?=$tugas->id_guru?>');
        console.log(dataFiles);
        $('.editor').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video', 'file', 'removeFile']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            placeholder: 'Tulis isi tugas disini',
            tabsize: 2,
            minHeight: 200,
            callbacks: {
                onImageUpload: function (image) {
                    var idtextarea = $(this);
                    uploadFileSummernote(image[0]);
                },
                onMediaDelete: function (target) {
                    deleteImage(target[0].src);
                },
                onFileUpload: function (file) {
                    uploadFileSummernote(file[0]);
                },
            }
        });

        $('#guru').on('change', function () {
            onChangeGuru($(this).val());
        });

        $('#mapel').on('change', function (e) {
            //console.log('change mapel', $(this).val());
            onChangeMapel($(this).val());
        });

        $('#kelas').on('select2:select select2:unselect', function (e) {
            onChangeKelas($(this).val(), e);
        });

        $("#picupload").on('change', function (e) {
            var form = new FormData($("#formfile")[0]);
            //console.log('nama file', names_files);
            uploadAttach(base_url + 'kelastugas/uploadfile', form);
            //createPreviewFile($(this), e)
        });

        $('#formtugas').submit(function (e) {
            e.stopPropagation();
            e.preventDefault();
            var dataUpload = new FormData($('#formtugas')[0]);
            dataUpload.append('attach', JSON.stringify(dataFiles));
            console.log(dataUpload);

            $.ajax({
                type: 'POST',
                url: base_url + 'kelastugas/savetugas',
                enctype: 'multipart/form-data',
                data: dataUpload,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.status === 'error') {
                        showDangerToast(data.status);
                    } else {
                        window.history.back();
                    }
                }, error: function (data) {
                    showDangerToast('Gagal membuat tugas');
                    console.log(data);
                }
            });
        });

        $('body').on('click', '.remove-pic', function () {
            $(this).parent().parent().parent().remove();
            var removeItem = $(this).attr('data-id');

            for (var i = 0; i < dataFiles.length; i++) {
                var cur = dataFiles[i];
                if (cur.name === removeItem) {
                    dataFiles.splice(i, 1);
                    deleteImage(cur.src);
                    break;
                }
            }
            console.log(dataFiles);
        });

        if ($('#guru').val() != '') {
            onChangeGuru($('#guru').val())
        }
    });

    function onChangeGuru(idGuru) {
        var selMapel = $('#mapel');
        selMapel.html('').select2({data: null}).trigger('change');
        $.ajax({
            type: 'GET',
            url: base_url + 'kelastugas/dataaddkelas/' + idGuru,
            //data: data,
            success: function (data) {
                arrKelasMapel = [];
                selMapel.append(new Option('Pilih Mapel :', '', false, false));
                for (let i = 0; i < data.length; i++) {
                    var selected = '<?=$tugas->id_mapel?>' === data[i].id_mapel;
                    selMapel.append(new Option(data[i].nama_mapel, data[i].id_mapel, false, selected));
                    $.map(data[i].kelas_mapel, function (value, index) {
                        if (value.kelas != null) {
                            for (let l = 0; l < arrKelas.length; l++) {
                                if (arrKelas[l].id === value.kelas) {
                                    item = {};
                                    item ['mapel'] = data[i].id_mapel;
                                    item ["id"] = arrKelas[l].id;
                                    item ["kelas"] = arrKelas[l].kelas;
                                    arrKelasMapel.push(item);
                                }
                            }
                        }
                    });
                    if (selected) {
                        onChangeMapel('<?=$tugas->id_mapel?>');
                    }
                }
                selMapel.trigger('change');
            }
        });
    }

    function onChangeMapel(mapel) {
        var selKelas = $('#kelas');
        selKelas.html('').select2({data: null}).trigger('change');

        var kelas = JSON.parse('<?= json_encode($arrKelasSelected) ?>');
        var as = [];
        for (let i = 0; i < kelas.length; i++) {
            if (kelas[i].mapel === mapel) {
                as.push(kelas[i].kelas);
            }
        }

        for (let j = 0; j < arrKelasMapel.length; j++) {
            if (arrKelasMapel[j].id != null && arrKelasMapel[j].mapel === mapel) {
                var select = jQuery.inArray(arrKelasMapel[j].id, as) > -1;
                selKelas.append(new Option(arrKelasMapel[j].kelas, arrKelasMapel[j].id, false, select));
            }
        }
        selKelas.trigger('change');
    }

    function onChangeKelas(kelas, e) {
        arrJadwal = [];
        var selMapel = $('#mapel');
        console.log(selMapel.val(), kelas);
        $.ajax({
            method: 'GET',
            url: base_url + 'kelastugas/dataaddjadwal?mapel=' + selMapel.val() + '&kelas=' + kelas,
            success: function (data) {
                for (let i = 0; i < data.length; i++) {
                    arrJadwal.push(data[i].id_jadwal);
                }
                console.log('result', arrJadwal);
            }
        });
    }

    function uploadFileSummernote(file) {
        var name = $('#text-tugas').attr('data-name');
        var hash = $('#text-tugas').attr('data-id');

        let data = new FormData();
        data.append("file_uploads", file);
        data.append(name, hash);
        $.ajax({
            type: "POST",
            url: base_url + 'kelastugas/uploadfile',
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            xhr: function () { //Handle progress upload
                let myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
                return myXhr;
            },
            success: function (reponse) {
                if (reponse.status) {
                    let listMimeImg = ['image/png', 'image/jpeg', 'image/webp', 'image/gif', 'image/svg'];
                    let listMimeAudio = ['audio/mpeg', 'audio/ogg'];
                    let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];
                    let elem;

                    if (listMimeImg.indexOf(file.type) > -1) {
                        //Picture
                        $('.editor').summernote('editor.insertImage', reponse.src);
                    } else if (listMimeAudio.indexOf(file.type) > -1) {
                        //Audio
                        elem = document.createElement("audio");
                        elem.setAttribute("src", reponse.src);
                        elem.setAttribute("controls", "controls");
                        elem.setAttribute("preload", "metadata");
                        $('.editor').summernote('editor.insertNode', elem);
                    } else if (listMimeVideo.indexOf(file.type) > -1) {
                        //Video
                        elem = document.createElement("video");
                        elem.setAttribute("src", reponse.src);
                        elem.setAttribute("controls", "controls");
                        elem.setAttribute("preload", "metadata");
                        $('.editor').summernote('editor.insertNode', elem);
                    } else {
                        //Other file type
                        elem = document.createElement("a");
                        let linkText = document.createTextNode(file.name);
                        elem.appendChild(linkText);
                        elem.title = file.name;
                        elem.href = reponse.filename;
                        $('.editor').summernote('editor.insertNode', elem);
                    }
                }
            }, error: function (data) {
                //showDangerToast('Gagal membuat tugas');
                console.log(data);
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

    function uploadAttach(action, data) {
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
                console.log('result', data.filename);
                //dataFiles.push(data.src);
                //$('#files-attach').val(JSON.stringify(names_files));
                var item = {};
                item ['size'] = data.size;
                item ["type"] = data.type;
                item ["src"] = data.src;
                item ["name"] = data.filename;
                dataFiles.push(item);
                console.log(data.type);
                createPreviewFile();
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

    function deleteImage(src) {
        $.ajax({
            data: {src: src},
            type: "POST",
            url: base_url + "kelastugas/deletefile",
            cache: false,
            success: function (response) {
                console.log(response);
            }
        });
    }

    function createPreviewFile(/*elem, event*/) {
        //var files = event.target.files;
        for (var j = 0; j < dataFiles.length; j++) {
            let file = dataFiles[j];
            //names_files.push(elem.get(0).files[j].name);
            var div = document.createElement("li");
            div.setAttribute("id", "f-" + file.name);
            if (!$("#f-" + file.name).length) {
                if (file.type.match('image')) {
                    div.innerHTML = "<img src='" + file.src + "'/>" +
                        "<div  class='post-thumb'>" +
                        "<div class='inner-post-thumb'>" +
                        "<a href='javascript:void(0);' data-id='" + file.name + "' class='remove-pic'>" +
                        "<i class='fa fa-times' aria-hidden='true'></i></a>" +
                        "<div>" +
                        "</div>";
                    $("#media-list").prepend(div);
                } else if (file.type.match('video')) {
                    div.innerHTML = "<video src='" + file.src + "'></video>" +
                        "<div class='post-thumb'>" +
                        "<div  class='inner-post-thumb'>" +
                        "<a href='javascript:void(0);' data-id='" + file.name + "' class='remove-pic'>" +
                        "<i class='fa fa-times' aria-hidden='true'></i></a>" +
                        "<div>" +
                        "</div>";
                    $("#media-list").prepend(div);
                } else {
                    div.innerHTML = "<img src='" + base_url + "/assets/app/img/document_file.png'>" +
                        "<div class='post-thumb'>" +
                        "<div  class='inner-post-thumb'>" +
                        "<a href='javascript:void(0);' data-id='" + file.name + "' class='remove-pic'>" +
                        "<i class='fa fa-times' aria-hidden='true'></i></a>" +
                        "<div>" +
                        "</div>";
                    $("#media-list").prepend(div);
                }
            }

        }
        console.log(dataFiles);
    }

</script>

