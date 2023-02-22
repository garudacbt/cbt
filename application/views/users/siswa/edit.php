<div class="content-wrapper bg-white">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <?php if ($this->ion_auth->is_admin()) : ?>
                    <div class="col-6">
                        <a href="<?= base_url('usersiswa') ?>" type="button" class="btn btn-sm btn-danger float-right">
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
                <div class="col-md-3">
                    <div class="card card-info my-shadow">
                        <div class="card-header with-border">
                            <h3 class="card-title">Detail Data Siswa</h3>
                        </div>
                        <div class="card-body">
                            <div class="box-info text-center user-profile-2">
                                <div class="user-profile-inner">
                                    <?php if ($siswa->foto == 'assets/img/siswa.png'): ?>
                                        <?php if ($siswa->jenis_kelamin == 'L'): ?>
                                            <img src="<?= base_url() ?>/assets/img/siswa-l.png"
                                                 class="img-circle profile-avatar mt-2" alt="User avatar">
                                        <?php else: ?>
                                            <img src="<?= base_url() ?>/assets/img/siswa-p.png"
                                                 class="img-circle profile-avatar mt-2" alt="User avatar">
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <img src="<?= base_url() ?>/assets/img/<?= $siswa->foto ?>"
                                             class="img-circle profile-avatar mt-2" alt="User avatar">
                                    <?php endif; ?>
                                    <h4 class="mt-5"><?= $siswa->nama ?></h4>
                                    Kelas <?= $siswa->nama_kelas ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-warning my-shadow">
                        <div class="card-header with-border">
                            <h3 class="card-title">Ubah Password & Username</h3>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('editsiswa') ?>
                            <?= form_open('usersiswa/update', array('id' => 'editsiswa'), array('method' => 'edit', 'id_siswa' => $siswa->id_siswa)) ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend w-40">
                                    <span class="input-group-text">Username</span>
                                </div>
                                <input type="text" class="form-control" name="username" value="<?= $siswa->username ?>"
                                       placeholder="Username" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend w-40">
                                    <span class="input-group-text">Password Lama</span>
                                </div>
                                <input type="text" name="old" class="form-control" value="<?= $siswa->password ?>"
                                       placeholder="Password Lama" required>
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
                                <input type="text" name="new_confirm" class="form-control"
                                       placeholder="Konfirmasi Password Baru" required>
                            </div>
                            <button type="submit" id="btn-pass" class="btn btn-warning float-right">Ganti Password
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#flashdata").fadeTo(10000, 500).slideUp(500, function () {
            $("#flashdata").slideUp(500);
        });

    })
</script>