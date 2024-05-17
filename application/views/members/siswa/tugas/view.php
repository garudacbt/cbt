<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 23/08/20
 * Time: 23:18
 */

$dataFileAttach = $log_selesai != null && $log_selesai->file != null ? unserialize($log_selesai->file ?? '') : [];
?>
<div class="content-wrapper" style="margin-top: -1px;">
    <div class="sticky">
    </div>
    <section class="content overlap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card my-shadow mt-5">
                        <div class="card-header p-4">
                            <div class="media" style="line-height: 1.2">
                                <?php
                                $avatar = $tugas->foto == null ? 'assets/img/guru.png' : $tugas->foto;
                                ?>
                                <img class="img-circle media-left" src="<?= base_url($avatar) ?>" width="60"
                                     height="60"/>
                                <div class="media-body ml-4">
                                    <span class="text-lg"><b><?= $tugas->nama_guru ?></b></span>
                                    <br/>
                                    <span> <?= $tugas->nama_mapel ?> </span>
                                    <br/>
                                    <span>Kelas <?= $siswa->nama_kelas ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center"><?= $tugas->judul_materi ?></h3>
                            <div class="text-justify"><?= $tugas->isi_materi ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card my-shadow">
                        <div class="card-body">
                            <div id="input-tugas" class="row">
                                <div class="col-12 mb-3">
                                    <?= form_open('', array('id' => 'formhasil')) ?>
                                    <label>Hasil Tugas</label>
                                    <textarea id="text-tugas" name='isi_tugas' class='editor'
                                              data-id="<?= $this->security->get_csrf_hash() ?>"
                                              data-name="<?= $this->security->get_csrf_token_name() ?>"
                                              rows='10' cols='80'
                                              style='width:100%;'><?= $log_selesai != null ? $log_selesai->text : '' ?></textarea>
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

<script>
    var logMulai = '<?= $log_mulai != null ? $log_mulai->log_time : '' ?>';
    var logSelesai = '<?= $log_selesai != null ? $log_selesai->log_time : '' ?>';
    var idSiswa = '<?= $siswa->id_siswa ?>';
    var idKjt = '<?= $tugas->id_kjm ?>';
    var jamKe = '<?= $jamke ?>';

    var dataFiles = [];
    var arrFileAttach = JSON.parse('<?= json_encode($dataFileAttach)?>');
    dataFiles = $.merge(dataFiles, arrFileAttach);

    console.log(logMulai);
    $(document).ready(function () {

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
                    url: base_url + "siswa/savelogtugas?id_siswa=" + idSiswa + '&id_kjm=' + idKjt + '&jamke=' + jamKe,
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
            var dataUpload = $(this).serialize() + '&update=' + update + '&id_siswa=' + idSiswa + '&id_kjm=' + idKjt + '&jamke=' + jamKe + '&attach=' + JSON.stringify(dataFiles);

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
                type: 'POST',
                url: base_url + 'siswa/savefiletugasselesai',
                data: dataUpload,
                success: function (data) {
                    if (data.status === 'error') {
                        swal.fire({
                            title: "Gagal",
                            text: data.status,
                            icon: "error"
                        });
                    } else {
                        swal.fire({
                            title: "Sukses",
                            html: 'Berhasil disimpan',
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                        }).then(result => {
                            if (result.value) {
                                window.history.back();
                            }
                        });
                    }
                }, error: function (xhr, status, error) {
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
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
        var dataUpload = $('#formhasil').serialize() + '&update=' + update + '&id_siswa=' + idSiswa + '&jamke=' + jamKe + '&id_kjm=' + idKjt + '&attach=' + JSON.stringify(dataFiles);
        console.log(dataUpload);

        $.ajax({
            type: 'POST',
            url: base_url + 'siswa/savefiletugasselesai',
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
