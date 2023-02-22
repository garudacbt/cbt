<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <?php if ($this->ion_auth->is_admin()) : ?>
                    <div class="col-6">
                        <a href="<?= base_url('userguru') ?>" type="button" class="btn btn-sm btn-danger float-right">
                            <i class="fas fa-arrow-circle-left"></i><span
                                    class="d-none d-sm-inline-block ml-1">Kembali</span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php if ($user->username === $guru->username or $this->ion_auth->is_admin()) : ?>
                    <div class="col-md-6">
                        <div class="card my-shadow mb-4">
                            <div class="card-header">
                                <?php if (is_null($users)) : ?>
                                    <h6 class="card-title"><?= $guru->nama_guru ?> belum aktif</h6>
                                    <button type="submit" id="btn-aktif" class="card-tools btn btn-success btn-sm">
                                        Aktifkan
                                    </button>
                                <?php else: ?>
                                    <h6 class="card-title">Edit Login <?= $guru->nama_guru ?></h6>
                                    <?php if ($this->ion_auth->is_admin()) : ?>
                                        <button type="submit" id="btn-nonaktif"
                                                class="card-tools btn btn-danger btn-sm">
                                            Nonaktifkan
                                        </button>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <?= form_open('userguru/editlogin', array('id' => 'change_password'), array('id' => $guru->id)) ?>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-40">
                                        <span class="input-group-text">Nama Depan</span>
                                    </div>
                                    <input type="text" name="first_name" class="form-control"
                                           value="<?= is_null($users) ? '' : $users->first_name ?>"
                                           placeholder="Nama Depan"
                                        <?= is_null($users) ? 'disabled' : '' ?> required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-40">
                                        <span class="input-group-text">Nama Belakang</span>
                                    </div>
                                    <input type="text" name="last_name" class="form-control"
                                           value="<?= is_null($users) ? '' : $users->last_name ?>"
                                           placeholder="Nama Belakang"
                                        <?= is_null($users) ? 'disabled' : '' ?> required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-40">
                                        <span class="input-group-text">Email</span>
                                    </div>
                                    <input type="email" name="email" class="form-control"
                                           value="<?= is_null($users) ? '' : $guru->email ?>"
                                           placeholder="Email" required <?= is_null($users) ? 'disabled' : '' ?>>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-40">
                                        <span class="input-group-text">Username</span>
                                    </div>
                                    <input type="text" class="form-control" value="<?= $guru->username ?>"
                                           placeholder="Username" disabled>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-40">
                                        <span class="input-group-text">Password</span>
                                    </div>
                                    <input type="password" class="form-control" value="<?= $guru->password ?>"
                                           placeholder="Username" disabled>
                                </div>
                                <button type="submit" id="btn-level"
                                        class="btn btn-primary float-right" <?= is_null($users) ? 'disabled' : '' ?>>
                                    Simpan
                                </button>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-warning my-shadow">
                            <div class="card-header with-border">
                                <h3 class="card-title">Ubah Password & Username</h3>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-40">
                                        <span class="input-group-text">Username</span>
                                    </div>
                                    <input type="text" class="form-control" name="username"
                                           value="<?= is_null($users) ? '' : $users->username ?>" placeholder="Username"
                                        <?= is_null($users) ? 'disabled' : '' ?> required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-40">
                                        <span class="input-group-text">Password Lama</span>
                                    </div>
                                    <input type="password" name="old" class="form-control" placeholder="Password Lama"
                                           required <?= is_null($users) ? 'disabled' : '' ?>>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-40">
                                        <span class="input-group-text">Password Baru</span>
                                    </div>
                                    <input type="password" name="new" class="form-control" placeholder="Password Baru"
                                           required <?= is_null($users) ? 'disabled' : '' ?>>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend w-40">
                                        <span class="input-group-text">Konfirmasi Password</span>
                                    </div>
                                    <input type="password" name="new_confirm" class="form-control"
                                           placeholder="Konfirmasi Password Baru"
                                           required <?= is_null($users) ? 'disabled' : '' ?>>
                                </div>
                                <button type="submit" id="btn-pass" class="btn btn-warning float-right"
                                    <?= is_null($users) ? 'disabled' : '' ?>>Ganti Password
                                </button>
                                <button type="reset"
                                        class="btn btn-default float-right mr-2" <?= is_null($users) ? 'disabled' : '' ?>>
                                    <i class="fa fa-rotate-left"></i> Reset
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    var guru_id = '<?=$guru->id_guru?>';
</script>

<script src="<?= base_url() ?>/assets/app/js/users/guru/edit.js"></script>

<?php if ($user->id === $guru->id_guru) : ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('form#change_password').on('submit', function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                let btn = $('#btn-pass');
                btn.attr('disabled', 'disabled').text('Process...');

                url = $(this).attr('action');
                data = $(this).serialize();
                msg = "Password anda berhasil diganti";
                submitajax(url, data, msg, btn);
            });
        });
    </script>
<?php endif; ?>
