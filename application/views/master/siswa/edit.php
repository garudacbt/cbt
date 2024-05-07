<?php
$fotoSiswa = $siswa->foto;
if (!file_exists(FCPATH . $siswa->foto)) {
    $fotoSiswa = str_replace('profiles', 'foto_siswa', $siswa->foto);
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
            <?= $this->session->flashdata('updatesiswa') ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-info my-shadow">
                        <div class="card-header with-border">
                            <h3 class="card-title">Detail Data Siswa</h3>
                        </div>
                        <div class="card-body">
                            <div class="box-info text-center user-profile-2">
                                <div class="user-profile-inner">
                                    <?php
                                    if (!file_exists(FCPATH . $fotoSiswa) || $fotoSiswa == ""): ?>
                                        <?php if ($siswa->jenis_kelamin == 'L'): ?>
                                            <img src="<?= base_url() ?>/assets/img/siswa-l.png"
                                                 class="img-circle profile-avatar mt-2" alt="User avatar">
                                        <?php else: ?>
                                            <img src="<?= base_url() ?>/assets/img/siswa-p.png"
                                                 class="img-circle profile-avatar mt-2" alt="User avatar">
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <img src="<?= base_url($fotoSiswa) ?>"
                                             class="img-circle profile-avatar mt-2" alt="User avatar">
                                    <?php endif; ?>
                                    <h4 class="mt-5 mb-5"><?= $siswa->nama ?></h4>
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
                                                <button type="button" class="btn btn-warning btn-block"
                                                        data-toggle="modal" data-target="#editLoginModal"><i
                                                            class="fa fa-pencil"></i> Edit Username / Password
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <?= form_open('datasiswa/updatedata', array('id' => 'siswa'), array('method' => 'edit', 'id_siswa' => $siswa->id_siswa)) ?>
                    <div class="card my-shadow">
                        <div class="card-header p-1">
                            <div class="card-title">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#datasiswa" data-toggle="tab">Siswa</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#biosiswa"
                                                            data-toggle="tab">Detail</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#ortusiswa" data-toggle="tab">Keluarga</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#walisiswa"
                                                            data-toggle="tab">Wali</a></li>
                                </ul>
                            </div>
                            <div class="card-tools mr-2 mt-1">
                                <button type="reset" class="btn btn-sm bg-warning text-white">
                                    <i class="fa fa-sync"></i><span class="d-none d-sm-inline-block ml-1">Reset</span>
                                </button>
                                <button type="submit" id="submit" class="btn btn-sm bg-success text-white">
                                    <i class="fas fa-save"></i><span class="d-none d-sm-inline-block ml-1">Simpan</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="datasiswa">
                                    <?php foreach ($input_data as $data) :
                                        $req = $data->name == 'nisn' || $data->name == 'sekolah_asal' ? '' : ' required' ?>
                                        <?php if ($data->name == 'jenis_kelamin'): ?>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-6 mb-sm-0">
                                                <label for="<?= $data->name ?>"
                                                       class="control-label"><?= $data->label ?></label>
                                            </div>
                                            <div class="col-md-8 col-sm-offset-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="<?= $data->icon ?>"></i></span>
                                                    </div>
                                                    <select class="form-control" data-placeholder="Jenis Kelamin"
                                                            name="jenis_kelamin" required>
                                                        <option value="" disabled>Pilih Jenis Kelamin</option>
                                                        <?php
                                                        $arrJk = ["L" => "Laki-laki", "P" => "Perempuan"];
                                                        foreach ($arrJk as $key => $jk) : ?>
                                                            <option value="<?= $key ?>" <?= $key == $data->value ? 'selected' : '' ?>><?= $jk ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?php elseif ($data->name == 'status'): ?>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-6 mb-sm-0">
                                                <label for="<?= $data->name ?>"
                                                       class="control-label"><?= $data->label ?></label>
                                            </div>
                                            <div class="col-md-8 col-sm-offset-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="<?= $data->icon ?>"></i></span>
                                                    </div>
                                                    <select class="form-control" data-placeholder="Status Siswa"
                                                            name="status" required>
                                                        <?php
                                                        $arrSt = ["Pilih Status", "AKTIF", "LULUS", "PINDAH", "KELUAR"];
                                                        foreach ($arrSt as $key => $jk) : ?>
                                                            <option value="<?= $key ?>" <?= $key == $data->value ? 'selected' : '' ?>><?= $jk ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?php elseif ($data->name == 'kelas_awal'): ?>
                                        <div class="form-group row">
                                            <div class="col-md-4 col-6 mb-sm-0">
                                                <label for="<?= $data->name ?>"
                                                       class="control-label"><?= $data->label ?></label>
                                            </div>
                                            <div class="col-md-8 col-sm-offset-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="<?= $data->icon ?>"></i></span>
                                                    </div>
                                                    <select class="form-control" data-placeholder="Kelas Awal"
                                                            name="kelas_awal" required>
                                                        <option value="" disabled>Kelas Awal</option>
                                                        <?php
                                                        if ($setting->jenjang == 1) {
                                                            $opsis ['1'] = '1';
                                                            $opsis ['2'] = '2';
                                                            $opsis ['3'] = '3';
                                                            $opsis ['4'] = '4';
                                                            $opsis ['5'] = '5';
                                                            $opsis ['6'] = '6';
                                                        } elseif ($setting->jenjang == 2) {
                                                            $opsis ['7'] = '7';
                                                            $opsis ['8'] = '8';
                                                            $opsis ['9'] = '9';
                                                        } else {
                                                            $opsis ['10'] = '10';
                                                            $opsis ['11'] = '11';
                                                            $opsis ['12'] = '12';
                                                        };
                                                        foreach ($opsis as $key => $kelas) : ?>
                                                            <option value="<?= $key ?>" <?= $key == $data->value ? 'selected' : '' ?>><?= $kelas ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?php elseif ($data->name == 'agama'): ?>
                                        <div class="form-group row">
                                            <div class="col-md-4 mb-sm-0">
                                                <label for="<?= $data->name ?>"
                                                       class="control-label"><?= $data->label ?></label>
                                            </div>
                                            <div class="col-md-8 mb-sm-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="<?= $data->icon ?>"></i></span>
                                                    </div>
                                                    <?php
                                                    $arrAgama = ["Islam", "Kristen", "Katolik", "Kristen Protestan", "Hindu", "Budha", "Konghucu", "lainnya"];
                                                    ?>
                                                    <select class="form-control" id="agama"
                                                            data-placeholder="Pilih Agama yang dianut" name="agama"
                                                            required>
                                                        <option value="0">Pilih Agama yang dianut
                                                        </option>
                                                        <?php foreach ($arrAgama as $agama) : ?>
                                                            <option value="<?= $agama ?>" <?= $agama == $data->value ? 'selected' : '' ?>><?= $agama ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-group row">
                                            <div class="col-md-4 mb-sm-0">
                                                <label for="<?= $data->name ?>"
                                                       class="control-label"><?= $data->label ?></label>
                                            </div>
                                            <div class="col-md-8 mb-sm-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="<?= $data->icon ?>"></i></span>
                                                    </div>
                                                    <input value="<?= trim($data->value ?? '') ?>" id="<?= $data->name ?>"
                                                           type="<?= $data->type ?>"
                                                           class="form-control <?= $data->class ?>"
                                                           name="<?= $data->name ?>"
                                                           placeholder="<?= $data->label ?>"
                                                           autocomplete="off" <?= $req ?>>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="tab-pane" id="biosiswa">
                                    <?php foreach ($input_bio as $bio) : ?>
                                        <?php if ($bio->name == 'agama'): ?>
                                            <div class="form-group row">
                                                <div class="col-md-4 mb-sm-0">
                                                    <label for="<?= $bio->name ?>"
                                                           class="control-label"><?= $bio->label ?></label>
                                                </div>
                                                <div class="col-md-8 mb-sm-0">
                                                    <div class="input-group">
                                                        <!--
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                        class="<?= $bio->icon ?>"></i></span>
                                                        </div>
                                                        -->
                                                        <?php
                                                        $arrAgama = ["Islam", "Kristen", "Katolik", "Kristen Protestan", "Hindu", "Budha", "Konghucu", "lainnya"];
                                                        ?>
                                                        <select class="form-control" id="agama"
                                                                data-placeholder="Pilih Agama yang dianut" name="agama">
                                                            <option value="Pilih Agama yang dianut">Pilih Agama yang
                                                                dianut
                                                            </option>
                                                            <?php foreach ($arrAgama as $agama) : ?>
                                                                <option value="<?= $agama ?>" <?= $agama == $bio->value ? 'selected' : '' ?>><?= $agama ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group row">
                                                <div class="col-md-4 mb-sm-0">
                                                    <label for="<?= $bio->name ?>"
                                                           class="control-label"><?= $bio->label ?></label>
                                                </div>
                                                <div class="col-md-8 mb-sm-0">
                                                    <div class="input-group">
                                                        <!--
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="<?= $bio->icon ?>"></i></span>
                                                        </div>
                                                        -->
                                                        <input value="<?= trim($bio->value ?? '') ?>" id="<?= $bio->name ?>"
                                                               type="<?= $bio->type ?>"
                                                               class="form-control <?= $bio->class ?>"
                                                               name="<?= $bio->name ?>"
                                                               placeholder="<?= $bio->label ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="tab-pane" id="ortusiswa">
                                    <?php
                                    foreach ($input_ortu as $ortu) :
                                        if ($ortu->name == 'status_keluarga'):
                                            $list = ["Pilih Status Kelurga", "Anak Kandung", "Anak Tiri", "Anak Angkat"];
                                            ?>
                                            <div class="form-group row">
                                                <div class="col-md-4 mb-sm-0">
                                                    <label for="<?= $ortu->name ?>"
                                                           class="control-label"><?= $ortu->label ?></label>
                                                </div>
                                                <div class="col-md-8 mb-sm-0">
                                                    <div class="input-group">
                                                        <select class="form-control" id="<?= $ortu->name ?>"
                                                                data-placeholder="Pilih Agama yang dianut"
                                                                name="<?= $ortu->name ?>">
                                                            <?php foreach ($list as $ks => $stt) : ?>
                                                                <option value="<?= $ks ?>" <?= $ks == $ortu->value ? 'selected' : '' ?>><?= $stt ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group row">
                                                <div class="col-md-4 mb-sm-0">
                                                    <label for="<?= $ortu->name ?>"
                                                           class="control-label"><?= $ortu->label ?></label>
                                                </div>
                                                <div class="col-md-8 mb-sm-0">
                                                    <div class="input-group">
                                                        <input value="<?= trim($ortu->value ?? '') ?>" id="<?= $ortu->name ?>"
                                                               type="<?= $ortu->type ?>"
                                                               class="form-control" name="<?= $ortu->name ?>"
                                                               placeholder="<?= $ortu->label ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; endforeach; ?>
                                </div>
                                <div class="tab-pane" id="walisiswa">
                                    <?php foreach ($input_wali as $wali) : ?>
                                        <div class="form-group row">
                                            <div class="col-md-4 mb-sm-0">
                                                <label for="<?= $wali->name ?>"
                                                       class="control-label"><?= $wali->label ?></label>
                                            </div>
                                            <div class="col-md-8 mb-sm-0">
                                                <div class="input-group">
                                                    <!--
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                    class="<?= $wali->icon ?>"></i></span>
                                                    </div>
                                                    -->
                                                    <input value="<?= trim($wali->value ?? '') ?>" id="<?= $wali->name ?>"
                                                           type="<?= $wali->type ?>"
                                                           class="form-control" name="<?= $wali->name ?>"
                                                           placeholder="<?= $wali->label ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group pull-right">
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
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
                           data-default-file="<?= base_url() . $fotoSiswa ?>"/>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<?= form_open('', array('id' => 'updatelogin'), array('id_siswa' => $siswa->id_siswa)) ?>
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
                    <input type="text" class="form-control" name="username" value="<?= $siswa->username ?>"
                           placeholder="Username">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend w-40">
                        <span class="input-group-text">Password Lama</span>
                    </div>
                    <input class="form-control" name="old" value="<?= $siswa->password ?>" placeholder="Username"
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
    var idSiswa = '<?=$siswa->id_siswa?>';
    var src = '<?=$fotoSiswa?>';
    $(document).ready(function () {
        ajaxcsrf();

        $('.tahun').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            timepicker: false,
            scrollInput: false,
            scrollMonth: false,
            format: 'Y-m-d',
            disabledWeekDays: [0],
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom'
            }
        });

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

        $('form#siswa').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var btn = $('#submit');
            btn.attr('disabled', 'disabled').text('Wait...');

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
                url: $(this).attr('action'),
                data: $(this).serialize(),
                type: 'POST',
                success: function (data) {
                    console.log(data);
                    btn.removeAttr('disabled').text('Simpan');
                    if (data.insert) {
                        swal.fire({
                            "title": "Sukses",
                            "text": data.text,
                            "icon": "success",
                            "type": "success"
                        }).then((result) => {
                            if (result.value) {
                                window.location.reload(true)// = base_url+'datasiswa';
                            }
                        });
                    } else {
                        swal.fire({
                            "title": "Error",
                            "text": data.text,
                            "icon": "error",
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    swal.fire({
                        title: "ERROR",
                        text: "Data Tidak Tersimpan",
                        icon: "error"
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
                url: base_url + "datasiswa/editlogin",
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
                                window.location.reload();
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
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
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
                reader.onload = function (e) {
                    $('#prev-logo-kanan').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);

                var form = new FormData($('#set-foto-profile')[0]);
                uploadAttach(base_url + 'datasiswa/uploadfile/' + idSiswa, form);
            }
        });

    });

    function deleteImage(fromBtn) {
        console.log(src);
        $.ajax({
            data: {src: src},
            type: "POST",
            url: base_url + "datasiswa/deletefile/" + idSiswa,
            cache: false,
            success: function (response) {
                console.log(response);
                if (fromBtn) {
                    window.location.reload();
                }
            }
        });
    }
</script>
