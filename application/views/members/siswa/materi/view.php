<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 23/08/20
 * Time: 23:18
 */

$ada_nilai = $logs != null && $logs->nilai != null && $logs->nilai != '0';
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
                                <?= $ada_nilai ? $logs->nilai : '' ?>
                                </span>
                            </div>
                        </div>
                        <?php
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
                            <?php if ($ada_nilai) : ?>
                                <div class="col-lg-12 p-0">
                                    <div class="alert align-content-center alert-default-warning" role="alert">
                                        <?= $judul ?> ini sudah dikerjakan dan sudah mendapat nilai, tidak bisa
                                        dikerjakan ulang!
                                    </div>
                                </div>
                            <?php endif; ?>
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
                            <img id="img1"/>
                            <ul class="clearfix media-list">
                                <?php
                                $files = unserialize($materi->file ?? '');
                                foreach ($files as $file) : ?>
                                    <?php
                                    $temp = explode('.', $file["src"] ?? '');
                                    $extension = end($temp);
                                    //echo $extension;
                                    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') :?>
                                        <li>
                                            <img src="<?= base_url() . $file["src"] ?>" data-target="#view-modal"
                                                 data-toggle="modal" data-src="<?= base_url() . $file["src"] ?>"
                                                 data-type="<?= $file["type"] ?>"/>
                                            <div class="title-thumb"><?= $file["name"] ?></div>
                                        </li>
                                    <?php elseif ($extension == 'mpeg' || $extension == 'mpg' || $extension == 'mp4' || $extension == 'avi'): ?>
                                        <li>
                                            <img src="<?= base_url() . '/assets/app/img/icon_play_black.png' ?>"
                                                 onClick="parent.open('<?= base_url() . $file["src"] ?>')">
                                            <div class="title-thumb"><?= $file["name"] ?></div>
                                        </li>
                                    <?php else: ?>
                                        <?php if ($extension == 'xls' || $extension == 'xlsx') : ?>
                                            <li>
                                                <a href="<?= base_url() . $file["src"] ?>">
                                                    <img src="<?= base_url() . '/assets/app/img/excel-icon.png' ?> "
                                                         onclick="dialogDownload()">
                                                    <div class="title-thumb"><?= $file["name"] ?></div>
                                                </a>
                                            </li>
                                        <?php elseif ($extension == 'doc' || $extension == 'docx') : ?>
                                            <li>
                                                <a href="<?= base_url() . $file["src"] ?>">
                                                    <img src="<?= base_url() . '/assets/app/img/word-icon.png' ?> "
                                                         onclick="dialogDownload()">
                                                    <div class="title-thumb"><?= $file["name"] ?></div>
                                                </a>
                                            </li>
                                        <?php elseif ($extension == 'pdf') : ?>
                                            <li>
                                                <a href="<?= base_url() . $file["src"] ?>">
                                                    <img src="<?= base_url() . '/assets/app/img/pdf-icon.png' ?> "
                                                         onclick="dialogDownload()">
                                                    <div class="title-thumb"><?= $file["name"] ?></div>
                                                </a>
                                            </li>
                                        <?php else : ?>
                                            <li>
                                                <a href="<?= base_url() . $file["src"] ?>">
                                                    <img src="<?= base_url() . '/assets/app/img/document-icon.svg' ?> "
                                                         style="padding: 8px" onclick="dialogDownload()">
                                                    <div class="title-thumb"><?= $file["name"] ?></div>
                                                </a>
                                            </li>
                                        <?php endif; ?>
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
                                    <label>Hasil <?= $judul ?></label>
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
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h6 class="card-title">Tambahkan File</h6>
                                        </div>
                                        <div class="card-body">
                                            <?= form_open_multipart('', array('id' => 'formfile')) ?>
                                            <div class="form-group">
                                                <ul id="media-upload" class="clearfix media-list">
                                                    <li class="myupload">
														<span>
															<i class="fa fa-plus" aria-hidden="true"></i>
															<input name="file_uploads" type="file" id="picupload"
                                                                   class="picupload">
                                                            <input type="hidden" name="max-size" value="2048">
														</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?= form_close(); ?>
                                        </div>
                                        <div class="card-footer">
                                            <i class="fa fa-info-circle"></i> File yang akan ditambahkan harus diberi
                                            nama siswa!
                                            <br>File yang bisa ditambahkan:
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
    var adaNilai = '<?=$ada_nilai?>' == '1';
    var logMateri = JSON.parse('<?= json_encode($logs) ?>');
    var logMulai = '<?= $logs != null && $logs->log_time != null ? $logs->log_time : '' ?>';
    var logSelesai = '<?= $logs != null && $logs->finish_time != null ? $logs->finish_time : '' ?>';
    var idSiswa = '<?= $siswa->id_siswa ?>';
    var idKjm = '<?= $materi->id_kjm ?>';
    var jamKe = '<?= $jamke ?>';
    var mapel = '<?= $materi->id_mapel ?>';

    var dataFiles = [];
    var arrFileAttach = logMateri != null && logMateri.file != null ? logMateri.file : [];
    //console.log('files', arrFileAttach);
    dataFiles = $.merge(dataFiles, arrFileAttach);

    $(document).ready(function () {
        ajaxcsrf();
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

            if (adaNilai) return;
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
                    showDangerToast('Gagal menyimpan');
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
            if (adaNilai) return;
            var form = new FormData($("#formfile")[0]);
            var maxSize = $("#formfile").find('input[name="max-size"]').val();
            uploadAttach(base_url + 'siswa/uploadfile', form, maxSize);
            //createPreviewFile($(this), e)
        });

        $('#view-modal').on('show.bs.modal', function (e) {
            if (adaNilai) return;
            var src = $(e.relatedTarget).data('src');
            var type = $(e.relatedTarget).data('type');
            var html = '';
            if (type.match('image')) {
                html = '<img src="' + src + '" class="img-fluid"/>';
            } else if (type.match('video')) {
                html = '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="' + src + '"></iframe></div>';
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
        if (adaNilai) return;
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

    function uploadAttach(action, data, maxsize) {
        if (adaNilai) return;
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
                if (data.status) {
                    var item = {};
                    item ['size'] = data.size;
                    item ["type"] = data.type;
                    item ["src"] = data.src;
                    item ["name"] = data.filename;
                    dataFiles.push(item);
                    console.log(data.type);
                    saveFileToDb();
                } else {
                    swal.fire({
                        title: "Gagal",
                        html: data.src,
                        icon: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "OK"
                    });
                }
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
        if (adaNilai) return;
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
            console.log('preview', file);
            //names_files.push(elem.get(0).files[j].name);
            var div = document.createElement("li");
            div.setAttribute("data-name", file.name);
            var fsrc = file.src.split('.');
            var ext = fsrc[fsrc.length - 1];

            if (!$('li[data-name="' + file.name + '"]').length) {
                if (file.type.match('image')) {
                    div.innerHTML = "<img src='" + base_url + file.src + "'/>" +
                        "<div  class='post-thumb'>" +
                        "<div class='inner-post-thumb'>" +
                        "<a href='javascript:void(0);' data-id='" + file.name + "' class='remove-pic'>" +
                        "<i class='fa fa-times' aria-hidden='true'></i></a>" +
                        "</div>" +
                        "</div>" +
                        "<div class='title-thumb'>" + file.name + "." + ext + "</div>";
                    $("#media-upload").prepend(div);
                } else if (file.type.match('video')) {
                    div.innerHTML = "<video src='" + base_url + file.src + "'></video>" +
                        "<div class='post-thumb'>" +
                        "<div  class='inner-post-thumb'>" +
                        "<a href='javascript:void(0);' data-id='" + file.name + "' class='remove-pic'>" +
                        "<i class='fa fa-times' aria-hidden='true'></i></a>" +
                        "</div>" +
                        "</div>" +
                        "<div class='title-thumb'>" + file.name + "." + ext + "</div>";
                    $("#media-upload").prepend(div);
                } else {
                    var icon = base_url;
                    var style = '';
                    if (ext === 'doc' || ext === 'docx') {
                        icon += '/assets/app/img/word-icon.png';
                    } else if (ext === 'xls' || ext === 'xlsx') {
                        icon += '/assets/app/img/excel-icon.png';
                    } else if (ext === 'pdf') {
                        icon += '/assets/app/img/pdf-icon.png';
                    } else {
                        icon += '/assets/app/img/document-icon.svg';
                        style = "style='padding: 10px'";
                    }
                    div.innerHTML = "<img src='" + icon + "' " + style + ">" +
                        "<div class='post-thumb'>" +
                        "<div  class='inner-post-thumb'>" +
                        "<a href='javascript:void(0);' data-id='" + file.name + "' class='remove-pic'>" +
                        "<i class='fa fa-times' aria-hidden='true'></i></a>" +
                        "</div>" +
                        "</div>" +
                        "<div class='title-thumb'>" + file.name + "." + ext + "</div>";
                    $("#media-upload").prepend(div);
                }
            }
        }

        $(".remove-pic").click(function () {
            console.log("First Way: " + $(this).data('id'));
            //$(this).parent().parent().parent().remove();
            var elm = $(this).parent().parent().parent();
            var removeItem = $(this).data('id');
            for (var i = 0; i < dataFiles.length; i++) {
                var cur = dataFiles[i];
                if (cur.name === removeItem) {
                    //dataFiles.splice(i, 1);
                    deleteImage(i, elm, cur.src);
                    break;
                }
            }
        });
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
