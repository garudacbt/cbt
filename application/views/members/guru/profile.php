<div class="content-wrapper bg-white">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="card my-shadow card-primary card-outline">
                        <div class="box-info text-center user-profile-2">
                            <div class="user-profile-inner">
                                <?php
                                $foto = $guru->foto;
                                if ($foto == '' || $foto == null) {
                                    $foto = 'assets/img/siswa.png';
                                }
                                ?>
                                <img id="foto-guru" src="<?= base_url() . $foto ?>"
                                     class="img-circle profile-avatar mt-2" alt="User avatar">
                                <h4 class="mt-5"><?= $guru->nama_guru ?></h4>
                                <h5 class="mb-5"><?= $guru->level . ' ' . $guru->nama_kelas ?></h5>
                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" data-toggle="modal" data-target="#editFotoModal"
                                                    class="btn btn-sm btn-primary btn-block"><i
                                                        class="fas fa-image"></i> Ganti Foto
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger btn-sm btn-block"
                                                    onclick="deleteImage(true)"><i
                                                        class="fa fa-trash"></i> Hapus Foto
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-warning btn-block" data-toggle="modal"
                                                    data-target="#editLoginModal"><i
                                                        class="fa fa-pencil"></i> Edit Username / Password
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-8">
                    <div class="card card-primary my-shadow card-outline card-outline-tabs">
                        <div class="card-header border-bottom-0 p-0">
                            <div class="card-title">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                           href="#custom-tabs-four-home" role="tab"
                                           aria-controls="custom-tabs-four-home" aria-selected="true">Profile *</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                           href="#custom-tabs-four-profile" role="tab"
                                           aria-controls="custom-tabs-four-profile" aria-selected="false">Data
                                            Lengkap</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-tools">
                                <button id="submit-profil" class="btn btn-sm bg-primary text-white">
                                    <i class="fas fa-save"></i><span class="d-none d-sm-inline-block ml-1">Simpan</span>
                                </button>
                            </div>
                        </div>
                        <?= form_open('', array('id' => 'formguru'), array('method' => 'edit', 'id_guru' => $guru->id_guru)); ?>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel"
                                     aria-labelledby="custom-tabs-four-home-tab">
                                    <?php foreach ($input_profile as $input) : ?>
                                        <?php if ($input->name == 'jenis_kelamin'): ?>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-6 mb-sm-0">
                                                    <label for="<?= $input->name ?>"
                                                           class="control-label"><?= $input->label ?></label>
                                                </div>
                                                <div class="col-md-8 col-6 mb-sm-0">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
															<span class="input-group-text"><i
                                                                        class="<?= $input->icon ?>"></i></span>
                                                        </div>
                                                        <select class="form-control" data-placeholder="Jenis Kelamin"
                                                                name="jenis_kelamin" required>
                                                            <option value="" <?= $input->value == null ? 'selected' : '' ?>
                                                                    disabled>Pilih Jenis Kelamin
                                                            </option>
                                                            <?php
                                                            $arrJk = ["L" => "Laki-laki", "P" => "Perempuan"];
                                                            foreach ($arrJk as $key => $jk) : ?>
                                                                <option value="<?= $key ?>" <?= $key == $input->value ? 'selected' : '' ?>><?= $jk ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php elseif ($input->name == 'agama'): ?>
                                            <div class="form-group row">
                                                <div class="col-md-4 mb-sm-0">
                                                    <label for="<?= $input->name ?>"
                                                           class="control-label"><?= $input->label ?></label>
                                                </div>
                                                <div class="col-md-8 mb-sm-0">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
															<span class="input-group-text"><i
                                                                        class="<?= $input->icon ?>"></i></span>
                                                        </div>
                                                        <?php
                                                        $arrAgama = ["Islam", "Kristen", "Katolik", "Kristen Protestan", "Hindu", "Budha", "Konghucu", "lainnya"];
                                                        ?>
                                                        <select class="form-control" id="agama"
                                                                data-placeholder="Pilih Agama yang dianut" name="agama">
                                                            <option value="Pilih Agama yang dianut">Pilih Agama yang
                                                                dianut
                                                            </option>
                                                            <?php foreach ($arrAgama as $agama) : ?>
                                                                <option
                                                                        value="<?= $agama ?>" <?= $agama == $input->value ? 'selected' : '' ?>><?= $agama ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group row">
                                                <div class="col-md-4 mb-sm-0">
                                                    <label for="<?= $input->name ?>"
                                                           class="control-label"><?= $input->label ?></label>
                                                </div>
                                                <div class="col-md-8 mb-sm-0">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
															<span class="input-group-text"><i
                                                                        class="<?= $input->icon ?>"></i></span>
                                                        </div>
                                                        <input value="<?= trim($input->value ?? '') ?>"
                                                               id="<?= $input->name ?>" type="<?= $input->type ?>"
                                                               class="form-control" name="<?= $input->name ?>"
                                                               placeholder="<?= $input->label ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; endforeach; ?>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                     aria-labelledby="custom-tabs-four-profile-tab">
                                    <?php foreach ($input_alamat as $alamat) : ?>
                                        <div class="form-group row">
                                            <div class="col-md-4 mb-sm-0">
                                                <label for="<?= $alamat->name ?>"
                                                       class="control-label"><?= $alamat->label ?></label>
                                            </div>
                                            <div class="col-md-8 mb-sm-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
														<span class="input-group-text"><i
                                                                    class="<?= $alamat->icon ?>"></i></span>
                                                    </div>
                                                    <input value="<?= trim($alamat->value ?? '') ?>" id="<?= $alamat->name ?>"
                                                           type="<?= $alamat->type ?>"
                                                           class="form-control" name="<?= $alamat->name ?>"
                                                           placeholder="<?= $alamat->label ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>
                        <div class="card-footer">
                            <small><b>INFO: </b><i>Semua kolom PROFIL wajib diisi</i></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="editFotoModal" tabindex="-1" role="dialog" aria-labelledby="editFotoLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Edit Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('', array('id' => 'set-foto-profile')) ?>
                <div class="form-group pb-2">
                    <label for="foto-profile">Foto Profil</label>
                    <input type="file" id="foto-profile" name="foto" class="dropify"
                           data-max-file-size-preview="2M"
                           data-allowed-file-extensions="jpg jpeg png"
                           data-default-file="<?= base_url() . $guru->foto ?>"/>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<?= form_open('', array('id' => 'updatelogin'), array('id_guru' => $guru->id_guru)) ?>
<div class="modal fade" id="editLoginModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Username / Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend w-40">
                        <span class="input-group-text">Username</span>
                    </div>
                    <input type="text" class="form-control" name="username" value="<?= $guru->username ?>"
                           placeholder="Username">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend w-40">
                        <span class="input-group-text">Password Lama</span>
                    </div>
                    <input class="form-control" name="old" value="<?= $guru->password ?>" placeholder="Username"
                           readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend w-40">
                        <span class="input-group-text">Password Baru</span>
                    </div>
                    <input type="text" name="new" class="form-control" placeholder="Password Baru">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend w-40">
                        <span class="input-group-text">Konfirmasi Password</span>
                    </div>
                    <input type="text" name="new_confirm" class="form-control" placeholder="Konfirmasi Password Baru"
                           required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning float-right">Ganti Password</button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<script>
    var fotoProfile = '';
    var idGuru = '<?=$guru->id_guru?>';
    var src = '<?=$guru->foto?>';
    $(document).ready(function () {
        $('#tgl_lahir').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            format: 'Y-m-d',
            timepicker: false,
            scrollInput: false,
            scrollMonth: false,
            disabledWeekDays: [0],
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom'
            }
        });

        $('#foto-profile').attr("data-default-file", base_url + src);
        var drEvent = $('.dropify').dropify({
            messages: {
                'default': 'Seret foto kesini atau klik',
                'replace': 'Seret atau klik<br>untuk mengganti foto',
                'remove': 'Hapus',
                'error': 'Ooops, ada kesalahan!!.'
            },
            error: {
                'fileSize': 'The file size is too big ({{ value }} max).',
                'minWidth': 'The image width is too small ({{ value }}}px min).',
                'maxWidth': 'The image width is too big ({{ value }}}px max).',
                'minHeight': 'The image height is too small ({{ value }}}px min).',
                'maxHeight': 'The image height is too big ({{ value }}px max).',
                'imageFormat': 'The image format is not allowed ({{ value }} only).'
            }
        });


        drEvent.on('dropify.beforeClear', function (event, element) {
            //return confirm("Hapus logo \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function (event, element) {
            src = $(event.currentTarget).data('default-file');
            deleteImage(false);
            fotoProfile = '';
        });

        drEvent.on('dropify.errors', function (event, element) {
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

        $('#editFotoModal').on('hidden.bs.modal', function (e) {
            window.location.reload();
        });

        $('#submit-profil').click(function () {
            console.log("data:", $('#formguru').serialize());

            $.ajax({
                url: base_url + "guruview/save",
                type: "POST",
                dataType: "JSON",
                data: $('#formguru').serialize(),
                success: function (data) {
                    console.log(data);
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            text: "Profile berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                //window.location.href = base_url + 'guruview';
                            }
                        })
                    } else {
                        swal.fire({
                            title: "ERROR",
                            html: data.errors.nip + "<br>" + data.errors.nama_guru,
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    swal.fire({
                        title: "ERROR",
                        text: "Data Tidak Tersimpan",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            });
        });

        $('#updatelogin').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var dataPost = $(this).serialize();
            console.log("data:", dataPost);

            $('#editLoginModal').modal('hide').data('bs.modal', null);
            $('#editLoginModal').on('hidden', function () {
                $(this).data('modal', null);
            });

            $.ajax({
                url: base_url + "userguru/editlogin",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log(data);
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            html: data.text,
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + "logout";
                                //window.location.href = base_url + 'guruview';
                            }
                        })
                    } else {
                        var html = '<ul>';
                        if (data.errors.username != null && data.errors.username !== "") {
                            html += '<li>' + data.errors.username + '</li>';
                        }
                        if (data.errors.old != null && data.errors.old !== "") {
                            html += '<li>' + data.errors.old + '</li>';
                        }
                        if (data.errors.new != null && data.errors.new !== "") {
                            html += '<li>' + data.errors.new + '</li>';
                        }
                        if (data.errors.new_confirm != null && data.errors.new_confirm !== "") {
                            html += '<li>' + data.errors.new_confirm + '</li>';
                        }
                        html += '</ul>';
                        swal.fire({
                            title: "ERROR",
                            html: html,
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    swal.fire({
                        title: "ERROR",
                        text: "Data Tidak Tersimpan",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            });
        });

        function uploadAttach(action, data) {
            console.log(data);
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
                    fotoProfile = data.src;
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

        $("#foto-profile").change(function () {
            var input = $(this)[0];
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //reader.onload = function (e) {
                //	$('#prev-logo-kanan').attr('src', e.target.result);
                //};
                reader.readAsDataURL(input.files[0]);

                var form = new FormData($('#set-foto-profile')[0]);
                uploadAttach(base_url + 'guruview/uploadfile/' + idGuru, form);
            }
        });

        $('#foto-guru').on("error", function () {
            $(this).attr("src", base_url + 'assets/img/siswa.png');
        });
    });

    function deleteImage(fromBtn) {
        console.log(src);
        $.ajax({
            data: {src: src},
            type: "GET",
            url: base_url + "guruview/deletefile/" + idGuru,
            cache: false,
            success: function (response) {
                console.log(response);
                if (fromBtn) {
                    window.location.href = base_url + 'guruview';
                }
            }
        });
    }
</script>
