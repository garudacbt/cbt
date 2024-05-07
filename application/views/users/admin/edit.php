<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('useradmin') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php if ($this->ion_auth->is_admin()) : ?>
                    <div class="col-md-6">
                        <?= form_open('users/edit_info', array('id' => 'user_info'), array('id' => $users->id)) ?>
                        <div class="card card-info my-shadow">
                            <div class="card-header">
                                <h3 class="card-title"><?= $subjudul ?></h3>
                            </div>
                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control"
                                           value="<?= $users->username ?>">
                                    <small class="help-block"></small>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" class="form-control"
                                               value="<?= $users->first_name ?>">
                                        <small class="help-block"></small>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" class="form-control"
                                               value="<?= $users->last_name ?>">
                                        <small class="help-block"></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= $users->email ?>">
                                    <small class="help-block"></small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="btn-info" class="btn btn-info float-right">Simpan</button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                <?php endif; ?>
                <?php if ($user->id === $users->id || $this->ion_auth->is_admin()) : ?>
                    <div class="col-md-6">
                        <div class="card card-primary my-shadow">
                            <div class="card-header">
                                <h3 class="card-title">Foto Profile</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5">
                                        <?= form_open_multipart('', array('id' => 'set-foto')) ?>
                                        <div class="form-group pb-2">
                                            <label for="logo-kanan">Foto</label>
                                            <input type="file" id="foto" name="foto" class="dropify"
                                                   data-max-file-size-preview="2M"
                                                   data-allowed-file-extensions="jpg jpeg png"
                                                   data-default-file="<?= base_url() . $profile->foto ?>"/>
                                        </div>
                                        <?= form_close() ?>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" placeholder="Nama Lengkap" id="nama-lengkap"
                                                   class="form-control" value="<?= $profile->nama_lengkap ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <input type="text" id="jabatan" placeholder="Jabatan" class="form-control"
                                                   value="<?= $profile->jabatan ?>">
                                        </div>
                                        <button onclick="simpanProfile()" id="simpan"
                                                class="btn btn-success float-right mt-3">Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?= form_open('useradmin/change_password', array('id' => 'change_password'), array('id' => $users->id)) ?>
                        <div class="card card-warning my-shadow">
                            <div class="card-header">
                                <h3 class="card-title">Ubah Password</h3>
                            </div>
                            <div class="card-body pb-0">
                                <div class="form-group">
                                    <label for="old">Password Lama</label>
                                    <input type="password" placeholder="Password Lama" name="old" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="new">Password Baru</label>
                                    <input type="password" placeholder="Password Baru" name="new" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="new_confirm">Konfirmasi Password</label>
                                    <input type="password" placeholder="Konfirmasi Password Baru" name="new_confirm"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="btn-pass" class="btn btn-warning float-right ml-3">Ganti
                                    Password
                                </button>
                                <button type="reset" class="btn btn-default float-right ml-3">
                                    <i class="fa fa-rotate-left"></i> Refresh
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        function submitajax(url, data, msg, type) {
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
                url: url,
                data: data,
                type: 'POST',
                success: function (response) {
                    if (response.status) {
                        swal.fire({
                            title: "Sukses",
                            text: msg,
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                        }).then(result => {
                            if (result.value) {
                                location.href = base_url + "logout";
                            }
                        });
                    } else {
                        if (response.errors) {
                            swal.fire({
                                title: "Gagal",
                                text: 'Gagal edit admin',
                                icon: "error"
                            });
                        }
                        if (response.msg) {
                            swal.fire({
                                title: "Gagal",
                                text: 'Password lama tidak benar',
                                icon: "error"
                            });
                        }
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
        }

        $('form#change_password').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            let btn = $('#btn-pass');
            btn.attr('disabled', 'disabled').text('Process...');

            url = $(this).attr('action');
            data = $(this).serialize();
            msg = "Password anda berhasil diganti";
            submitajax(url, data, msg, 1);
        });

        $('form input, form select').on('change', function () {
            $(this).closest('.form-group').removeClass('has-error');
            $(this).nextAll('.help-block').eq(0).text('');
        });

        $('form#user_info').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            let btn = $('#btn-info');
            btn.attr('disabled', 'disabled').text('Process...');

            url = $(this).attr('action');
            data = $(this).serialize();
            msg = "Informasi user berhasil diupdate";
            submitajax(url, data, msg, 2);
        });

        $('form#user_level').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            let btn = $('#btn-level');
            btn.attr('disabled', 'disabled').text('Process...');

            url = $(this).attr('action');
            data = $(this).serialize();
            msg = "Level user berhasil diupdate";
            submitajax(url, data, msg, 3);
        });

        $('form#user_status').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            let btn = $('#btn-status');
            btn.attr('disabled', 'disabled').text('Process...');

            url = $(this).attr('action');
            data = $(this).serialize();
            msg = "Status user berhasil diupdate";
            submitajax(url, data, msg, 4);
        });

    });
</script>

<?php if ($user->id === $users->id) : ?>
    <script type="text/javascript">
        var idUser = '<?=$user->id?>';
        var fprofil = '<?= base_url() . $profile->foto ?>';
        $(document).ready(function () {
            ajaxcsrf();
            var drEvent = $('.dropify').dropify({
                messages: {
                    'default': 'Seret logo kesini atau klik',
                    'replace': 'Seret atau klik<br>untuk mengganti logo',
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
                deleteImage($(event.currentTarget).data('default-file'));
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

            $("#foto").change(function () {
                var input = $(this)[0];
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#prev-logo-kanan').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);

                    var form = new FormData($('#set-foto')[0]);
                    uploadAttach(base_url + 'useradmin/uploadfile/' + idUser, form);
                }
            });

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
                        console.log(data.src);
                        fprofil = data.src;
                    },
                    error: function (xhr, status, error) {
                        const err = JSON.parse(xhr.responseText)
                        swal.fire({
                            title: "Error",
                            text: err.Message,
                            icon: "error"
                        });
                    }
                });
            }

            function deleteImage(src) {
                console.log(src);
                $.ajax({
                    data: {src: src},
                    type: "POST",
                    url: base_url + "useradmin/deletefile",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                        fprofil = '';
                    }
                });
            }
        });

        function simpanProfile() {
            var namaLengkap = $('#nama-lengkap').val();
            var jabatan = $('#jabatan').val();
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
                data: {foto: fprofil, nama_lengkap: namaLengkap, jabatan: jabatan},
                type: "POST",
                url: base_url + "useradmin/saveprofile",
                success: function (response) {
                    //console.log(response);
                    swal.fire({
                        title: "Sukses",
                        text: "Profile berhasil disimpan",
                        icon: "success",
                    });
                }, error: function (xhr, status, error) {
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        }
    </script>
<?php endif; ?>
