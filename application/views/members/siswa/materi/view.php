<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 23/08/20
 * Time: 23:18
 */

$dataFileAttach = $logs != null && $logs->file != null ? unserialize($logs->file) : [];
?>

<div class="content-wrapper" style="margin-top: -1px;">
    <div class="sticky">
    </div>
    <section class="content overlap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card my-shadow mt-5">
                        <div class="card-header">
                            <div class="media card-title" style="line-height: 1.2">
                                <?php
                                $avatar = $materi->foto == null ? 'assets/img/guru.png' : $materi->foto;
                                ?>
                                <img class="img-circle media-left" src="<?= base_url($avatar) ?>" width="60"
                                     height="60"/>
                                <div class="media-body ml-4">
                                    <span class="text-lg"><b><?= $materi->nama_guru ?></b></span>
                                    <br/>
                                    <span> <?= $materi->nama_mapel ?> </span>
                                    <br/>
                                    <span>Kelas <?= $siswa->nama_kelas ?> </span>
                                </div>
                            </div>
                            <div class="card-tools pl-3 pr-3 pb-1 pt-1 text-center alert alert-default-info m-0"
                                 style="line-height: 1">
                                Nilai
                                <br>
                                <span style="font-size: 28pt">
                                <?= $logs != null && $logs->nilai != null ? $logs->nilai : '' ?>
                                </span>
                            </div>
                        </div>
                        <?php
                        //str_replace("world","Peter","Hello world!");
                        //
                        //        var sMateri = $($.parseHTML(checkMateri));
                        //        sMateri.find(`img`).each(function () {
                        //            var curSrc = $(this).attr('src');
                        //            if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                        //                $(this).attr('src', base_url+curSrc);
                        //            } else if (curSrc.indexOf(base_url) === -1) {
                        //                var pathUpload = 'uploads';
                        //                var forReplace = curSrc.split(pathUpload);
                        //                $(this).attr('src', base_url + pathUpload + forReplace[1]);
                        //            }
                        //        });

                        //$html = str_get_html($received_str);
                        //
                        ////Image tag
                        //$img_tag = $html->find("img", 0)->outertext;
                        //
                        ////Example Text
                        //$example_text = $html->find('div[style=example]', 0)->last_child()->innertext;
                        $dom = new DOMDocument();
                        @$dom->loadHTML($materi->isi_materi);
                        $images = $dom->getElementsByTagName('img');
                        foreach ($images as $image) {
                            $curSrc = $image->getAttribute('src');
                            if (strpos($curSrc, 'http') !== false) {
                                $pathUpload = 'uploads';
                                $forReplace = explode($pathUpload, $pathUpload);
                                $image->setAttribute('src', base_url() . $pathUpload . $forReplace[1]);
                            } else {
                                $image->setAttribute('src', base_url() . $curSrc);
                            }
                        }
                        $isi_materi = $dom->saveHTML();
                        ?>
                        <div class="card-body">
                            <h3 class="text-center"><?= $materi->judul_materi ?></h3>
                            <div class="text-justify"><?= $isi_materi ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card my-shadow">
                        <div class="card-header">
                            <div class="media card-title text-bold">File Pendukung</div>
                        </div>
                        <div class="card-body">
                            <img id="img1" />
                            <ul id="media-list">
                            <?php
                            $files = unserialize($materi->file);
                            foreach ($files as $file) : ?>
                                    <?php
                                    $temp = explode('.', $file["src"]);
                                    $extension = end($temp);
                                    //echo $extension;
                                    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') :?>
                                        <li>
                                            <img src="<?= base_url() . $file["src"] ?>" data-target="#view-modal" data-toggle="modal" data-src="<?= base_url() . $file["src"] ?>" data-type="<?= $file["type"] ?>"/>
                                            <span class="text-xs text-white" style="background:#000000;position:absolute;bottom: 0;padding: 6px; width: 100%"><?= substr($file["name"],0,10).'..' ?></span>
                                        </li>
                                    <?php elseif ($extension == 'mpeg' || $extension == 'mpg' || $extension == 'mp4' || $extension == 'avi'): ?>
                                        <li>
                                            <img src="<?= base_url() . '/assets/app/img/icon_play_black.png' ?>" data-target="#view-modal" data-toggle="modal" data-src="<?= base_url() . $file["src"] ?>" data-type="<?= $file["type"] ?>">
                                            <span class="text-xs text-white" style="background:#000000;position:absolute;bottom: 0;padding: 6px; width: 100%"><?= substr($file["name"],0,10).'..' ?></span>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <a href="<?= base_url() . $file["src"] ?>">
                                                <img src="<?= base_url() . '/assets/app/img/document_file.png'?> " style="padding: 12px" onclick="dialogDownload()">
                                                <span class="text-xs text-white" style="background:#000000;position:absolute;bottom: 0;padding: 6px; width: 100%"><?= substr($file["name"],0,10).'..' ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card my-shadow">
                        <div class="card-body">
                            <div id="input-materi" class="row">
                                <div class="col-12 mb-3">
                                    <?= form_open('', array('id' => 'formhasil')) ?>
                                    <label>Hasil Materi</label>
                                    <textarea id="text-materi" name='isi_materi' class='editor'
                                              data-id="<?= $this->security->get_csrf_hash() ?>"
                                              data-name="<?= $this->security->get_csrf_token_name() ?>"
                                              rows='10' cols='80'
                                              style='width:100%;'><?= $logs != null ? $logs->text : '' ?></textarea>
                                    <button type="submit" class="btn btn-primary float-right ml-1"><i
                                                class="fa fa-upload"></i> KIRIM
                                    </button>
                                    <?= form_close(); ?>
                                </div>
                                <div class="col-12">
                                    <?= form_open_multipart('', array('id' => 'formfile')) ?>
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h6 class="card-title">Tambahkan File</h6>
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
                                            <i class="fa fa-info-circle"></i> File yang bisa ditambahkan:
                                            <br>
                                            <table class="ml-4">
                                                <tr>
                                                    <td>Gambar</td>
                                                    <td> :</td>
                                                    <td>jpg, png, bmp, gif</td>
                                                </tr>
                                                <tr>
                                                    <td>Video</td>
                                                    <td> :</td>
                                                    <td>mp4, avi, mpeg</td>
                                                </tr>
                                                <tr>
                                                    <td>Suara</td>
                                                    <td> :</td>
                                                    <td>mp3, wav</td>
                                                </tr>
                                                <tr>
                                                    <td>Dokumen</td>
                                                    <td> :</td>
                                                    <td>pdf, word, excel, power point</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="overlay d-none"><i class="fas fa-2x fa-sync-alt fa-spin mr-4"></i>
                                            Memuat file ...
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="view-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lihat File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="konten-dialog" class="col-12"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var logMateri = JSON.parse('<?= json_encode($logs) ?>');
    var logMulai = '<?= $logs != null && $logs->log_time != null ? $logs->log_time : '' ?>';
    var logSelesai = '<?= $logs != null && $logs->finish_time != null ? $logs->finish_time : '' ?>';
    var idSiswa = '<?= $siswa->id_siswa ?>';
    var idKjm = '<?= $materi->id_kjm ?>';
    var jamKe = '<?= $jamke ?>';
    var mapel = '<?= $materi->id_mapel ?>';

    var dataFiles = [];
    var arrFileAttach = JSON.parse('<?= json_encode($dataFileAttach)?>');
    dataFiles = $.merge(dataFiles, arrFileAttach);

    $(document).ready(function () {
        console.log('logMateri',logMateri);
        $('.editor').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                //['insert', ['link', 'picture', 'video', 'file', 'removeFile']],
                //['view', ['fullscreen', 'codeview', 'help']],
            ],
            placeholder: 'Tulis keterangan disini',
            tabsize: 2,
            minHeight: 200,
            /*
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
			*/
        });

        if (logMulai === '') {
            setTimeout(function () {
                $.ajax({
                    type: "GET",
                    url: base_url + "siswa/savelogmateri?id_siswa=" + idSiswa + '&id_kjm=' + idKjm + '&jamke=' + jamKe + '&mapel=' + mapel,
                    success: function (response) {
                        console.log(response);
                    }
                });
            }, 1000);
        }

        createPreviewFile();

        $('#formhasil').submit(function (e) {
            e.stopPropagation();
            e.preventDefault();

            var update = logSelesai === '' ? '0' : '1';
            var dataUpload = $(this).serialize() + '&update=' + update + '&id_siswa=' + idSiswa + '&id_kjm=' + idKjm + '&jamke=' + jamKe + '&mapel=' + mapel + '&attach=' + JSON.stringify(dataFiles);

            $.ajax({
                type: 'POST',
                url: base_url + 'siswa/savefilemateriselesai',
                data: dataUpload,
                success: function (data) {
                    if (data.status === 'error') {
                        showDangerToast(data.status);
                    } else {
                        setTimeout(function () {
                            window.history.back();
                        }, 1000);
                    }
                }, error: function (data) {
                    showDangerToast('Gagal membuat materi');
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
                    saveFileToDb();
                    deleteImage(cur.src);
                    break;
                }
            }
            console.log(dataFiles);
        });

        $("#picupload").on('change', function (e) {
            var form = new FormData($("#formfile")[0]);
            //console.log('nama file', names_files);
            uploadAttach(base_url + 'siswa/uploadfile', form);
            //createPreviewFile($(this), e)
        });

        $('#view-modal').on('show.bs.modal', function (e) {
            var src = $(e.relatedTarget).data('src');
            var type = $(e.relatedTarget).data('type');
            var html = '';
            if (type.match('image')) {
                html = '<img src="'+src+'" class="img-fluid"/>';
            } else if (type.match('video')) {
                html = '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="'+src+'"></iframe></div>';
            } else {
                html = '<img src="' + base_url + '"/assets/app/img/document_file.png"></div>';
            }
            $('#konten-dialog').html(html);
        });
    });

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

    function saveFileToDb() {
        var update = logSelesai === '' ? '0' : '1';
        var dataUpload = $('#formhasil').serialize() + '&update=' + update + '&id_siswa=' + idSiswa + '&jamke=' + jamKe + '&id_kjm=' + idKjm + '&attach=' + JSON.stringify(dataFiles);
        console.log(dataUpload);

        $.ajax({
            type: 'POST',
            url: base_url + 'siswa/savefilemateriselesai',
            data: dataUpload,
            success: function (data) {
                showSuccessToast(data.status);
                createPreviewFile();
            }, error: function (data) {
                showDangerToast('Gagal meyimpan gambar');
                console.log(data);
            }
        });
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
                //createPreviewFile();

                saveFileToDb();
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
            url: base_url + "siswa/deletefile",
            cache: false,
            success: function (response) {
                console.log(response);
            }
        });
    }

    function dialogDownload() {
        showSuccessToast("File telah didownload")
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
                    div.innerHTML = "<img src='" + base_url + "/" + file.src + "'/>" +
                        "<div  class='post-thumb'>" +
                        "<div class='inner-post-thumb'>" +
                        "<a href='javascript:void(0);' data-id='" + file.name + "' class='remove-pic'>" +
                        "<i class='fa fa-times' aria-hidden='true'></i></a>" +
                        "<div>" +
                        "</div>";
                    $("#media-list").prepend(div);
                } else if (file.type.match('video')) {
                    div.innerHTML = "<video src='" + base_url + "/" + file.src + "'></video>" +
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

    function createThumbnail() {
        console.log(1);
        var video = $('ul').find("video")[0];
        //video.setAttribute('crossOrigin', 'anonymous');
        var canvas = document.createElement('canvas');
        canvas.width = 100;
        canvas.height = 100;
        var context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        var dataURI = canvas.toDataURL('image/jpeg');
        $('#img1').attr("src", dataURI);
    }

    var entityMap = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#39;',
        '/': '&#x2F;',
        '`': '&#x60;',
        '=': '&#x3D;'
    };

</script>
