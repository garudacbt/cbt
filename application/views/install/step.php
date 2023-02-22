<section class="d-flex align-items-center gradient">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-4 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 aos-init aos-animate"
                 data-aos="fade-up">
                <div class="text-center text-lg-left">
                    <div class="mb-3 text-white">
                        <img style="width:100px; height:auto;" src="<?= base_url() ?>/assets/img/garuda_white.svg"><span
                                class="h1 align-bottom">aruda</span>
                        <span class="h1 align-bottom"> CBT</span>
                    </div>
                    <div class="h2 text-white">
                        <b>G</b>abungan <b>A</b>plikasi <b>R</b>apor,<br/><b>U</b>jian dan e-learning
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-5">
                <div class="card-step multi-step">
                    <div class="multi-step">
                        <div class="card card-step-content" style="background-color: rgba(255,255,255,.7);">
                            <div class="card-header">
                                <div class="card-step-header">
                                    <h5 class="card-step-title">
                                        Install Applikasi</h5>
                                    <div class="card-steps">
                                        <div class="step completed <?= $data->current_page == 1 ? 'current' : '' ?>"
                                             data-step="1" data-step-skip="false">
                                            <div class="dot"></div>
                                            <label class="label <?= $data->current_page > 1 ? 'completed' : '' ?>">Database</label>
                                        </div>
                                        <div class="step <?= $data->current_page == 2 ? 'current' : '' ?>" data-step="2"
                                             data-step-skip="false">
                                            <div class="dot"></div>
                                            <label class="label <?= $data->current_page > 2 ? 'completed' : '' ?>">Administrator</label>
                                        </div>
                                        <div class="step <?= $data->current_page == 3 ? 'current' : '' ?>" data-step="3"
                                             data-step-skip="false">
                                            <div class="dot"></div>
                                            <label class="label <?= $data->current_page > 3 ? 'completed' : '' ?>">Sekolah</label>
                                        </div>
                                        <div class="step <?= $data->current_page == 4 ? 'current' : '' ?>" data-step="4"
                                             data-step-skip="false">
                                            <div class="dot"></div>
                                            <label class="label">Selesai</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $readAdminNama = $data->nama_admin === '' ? '' : 'readonly';
                            $readAdminUser = $data->user_admin === '' ? '' : 'readonly';
                            $readAdminPass = $data->pass_admin === '' ? '' : 'readonly';

                            $readAppNama = $data->aplikasi === '' ? '' : 'readonly';
                            $readSklNama = $data->sekolah === '' ? '' : 'readonly';
                            $readSklKepsek = $data->kepsek === '' ? '' : 'readonly';
                            $readSklJenjang = $data->jenjang === '' ? '' : 'readonly';
                            $readSklSatuan = $data->satuan === '' ? '' : 'readonly';
                            $readSklAlamat = $data->alamat === '' ? '' : 'readonly';
                            $readSklDesa = $data->desa === '' ? '' : 'readonly';
                            $readSklKec = $data->kec === '' ? '' : 'readonly';
                            $readSklKota = $data->kota === '' ? '' : 'readonly';
                            $readSklProv = $data->prov === '' ? '' : 'readonly';
                            ?>
                            <?= form_open('', array('id' => 'installapp')) ?>
                            <div class="card-body card-step-body">
                                <div class="step-content-container">
                                    <div class="step-content <?= $data->current_page == 1 ? 'active' : '' ?>"
                                         data-step="1" data-step-skip="false">
                                        <div class="content-inner">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="input-nama-db">Host Name</label>
                                                    <input type="text" class="form-control db" id="input-nama-host"
                                                           name="hostname" value="<?= $data->hostname ?>"
                                                           placeholder="localhost" readonly="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="input-nama-db">Host Username</label>
                                                    <input type="text" class="form-control db" id="input-user-host"
                                                           name="hostuser" value="<?= $data->username ?>"
                                                           placeholder="Host Username" readonly="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="input-nama-db">Host Password</label>
                                                    <input type="text" class="form-control" id="input-pass-host"
                                                           value="<?= $data->password ?>" name="hostpass"
                                                           placeholder="Host Password" readonly="">
                                                    <small class="form-text text-muted">Kosongkan jika tidak menggunakan
                                                        password.
                                                    </small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="input-nama-db">Nama Database</label>
                                                    <input type="text" class="form-control db" id="input-nama-db"
                                                           name="database" value="<?= $data->database ?>"
                                                           placeholder="Nama Database" readonly="">
                                                    <small class="form-text text-muted">Jangan gunakan spasi.</small>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-end">
                                                <button type="button" id="next1" class="btn-primary btn">Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-content <?= $data->current_page == 2 ? 'active' : '' ?>"
                                         data-step="2" data-step-skip="false">
                                        <div class="content-inner">
                                            <div class="text-center">
                                                <p><b>LOGIN ADMINISTRATOR</b></p>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap" id="input-nama-adm"
                                                           value="<?= $data->nama_admin ?>" class="form-control adm"
                                                           required="" <?= $readAdminNama ?>>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Username</label>
                                                    <input type="text" name="username" id="input-user"
                                                           class="form-control adm" value="<?= $data->user_admin ?>"
                                                           required="" <?= $readAdminUser ?>>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Password</label>
                                                    <input type="text" name="password" id="input-pass"
                                                           class="form-control adm" required="" <?= $readAdminPass ?>>
                                                    <small class="form-text text-muted">Password harus 6 karakter atau
                                                        lebih.
                                                    </small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label">Ulangi Password</label>
                                                    <input type="text" id="input-rep-pass" class="form-control adm"
                                                           required="" <?= $readAdminPass ?>>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-end">
                                                <button type="button" id="prev2" class="btn-primary btn mr-auto">
                                                    Sebelumnya
                                                </button>
                                                <button type="button" id="next2" class="btn-primary btn">Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-content <?= $data->current_page == 3 ? 'active' : '' ?>"
                                         data-step="3" data-step-skip="false">
                                        <div class="content-inner">
                                            <div class="row">
                                                <div class="col-md-4 mb-4">
                                                    <label>Nama Aplikasi</label>
                                                    <input type="text" id="input-nama-app" name="nama_aplikasi"
                                                           class="form-control app" value="<?= $data->aplikasi ?>"
                                                           required="" <?= $readAppNama ?>>
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <label>Nama Sekolah</label>
                                                    <input type="text" id="input-nama-skl" name="nama_sekolah"
                                                           class="form-control app" value="<?= $data->sekolah ?>"
                                                           required="" <?= $readSklNama ?>>
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <label>Kepala Sekolah</label>
                                                    <input type="text" id="input-nama-kepsek" name="kepsek"
                                                           class="form-control app" value="<?= $data->kepsek ?>"
                                                           required="" <?= $readSklKepsek ?>>
                                                </div>
                                                <div class="col-md-7 mb-4">
                                                    <label>Alamat</label>
                                                    <br>
                                                    <input type="text" id="input-alamat" class="form-control app"
                                                           name="alamat" value="<?= $data->alamat ?>"
                                                           required="" <?= $readSklAlamat ?>>
                                                </div>
                                                <div class="col-md-5 mb-4">
                                                    <label>Desa/Kelurahan</label>
                                                    <input type="text" id="input-desa" name="desa"
                                                           class="form-control app" value="<?= $data->desa ?>"
                                                           required="" <?= $readSklDesa ?>>
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <label>Kecamatan</label>
                                                    <input type="text" id="input-kec" name="kec"
                                                           class="form-control app" value="<?= $data->kec ?>"
                                                           required="" <?= $readSklKec ?>>
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <label>Kabupaten/Kota</label>
                                                    <input type="text" id="input-kota" name="kota"
                                                           class="form-control app" value="<?= $data->kota ?>"
                                                           required="" <?= $readSklKota ?>>
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <label>Provinsi</label>
                                                    <input type="text" id="input-prov" name="prov" class="form-control"
                                                           value="<?= $data->prov ?>" <?= $readSklProv ?>>
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <label>Jenjang</label>
                                                    <select class="form-control app" id="input-jenjang"
                                                            data-placeholder="Pilih Jenjang" name="jenjang"
                                                            required="" <?= $readSklJenjang ?>>
                                                        <option value="" selected="<?= $data->jenjang ?>" disabled="">
                                                            Pilih Jenjang
                                                        </option>
                                                        <option value="1">SD/MI</option>
                                                        <option value="2">SMP/MTS</option>
                                                        <option value="3">SMA/MA/SMK</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <label>Satuan Pend.</label>
                                                    <select class="form-control app" id="input-satuan"
                                                            data-placeholder="Pilih Satuan Pendidikan" name="satuan"
                                                            required="" <?= $readSklSatuan ?>>
                                                        <option value="" disabled="">Satuan Pendidikan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap align-items-center justify-content-end">
                                                <button type="button" id="prev3" class="btn-primary btn mr-auto">
                                                    Sebelumnya
                                                </button>
                                                <button type="button" id="next3" class="btn-primary btn">Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-content <?= $data->current_page == 4 ? 'active' : '' ?>"
                                         data-step="4" data-step-skip="false">
                                        <div class="content-inner">
                                            <div class="row p-4">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td>Database</td>
                                                        <td id="text-db">:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Aplikasi</td>
                                                        <td id="text-app">:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Administrator</td>
                                                        <td id="text-adm">:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Username</td>
                                                        <td id="text-usr">:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Password</td>
                                                        <td id="text-pass">:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Sekolah</td>
                                                        <td id="text-skl">:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kepala Sekolah</td>
                                                        <td id="text-kep">:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenjang</td>
                                                        <td id="text-jen">:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Satuan Pend.</td>
                                                        <td id="text-satuan">:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td id="text-alm">:</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr>
                                            <div class="d-flex flex-wrap align-items-center justify-content-end">
                                                <button type="button" id="prev4" class="btn-primary btn mr-auto">
                                                    Sebelumnya
                                                </button>
                                                <button type="button" id="next4" class="btn-primary btn">
                                                    Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?= form_close() ?>
                            <div class="overlay d-none loading">
                                <div class="spinner-grow"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gradient">
    <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                      opacity="0.100000001"></path>
                <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                      opacity="0.100000001"></path>
                <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                      id="Path-4" opacity="0.200000003"></path>
            </g>
            <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                <path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
            </g>
        </g>
    </svg>
</section>

<script>
    var dataInstall = JSON.parse(JSON.stringify(<?=json_encode($data)?>));
    var currentPage = dataInstall.current_page;
    var completed = dataInstall.current_page - 1;
    var dbSudah = false;

    var satuanPend = [[], ["SD", "MI"], ["SMP", "MTS"], ["SMA", "MA", "SMK"]];
    $(document).ready(function () {
        console.log('data', satuanPend);

        $('.modal-footer').addClass('d-none');

        $('#next1').click(function () {
            currentPage++;
            switchPage(currentPage, false)
        });

        $('#next2').click(function () {
            var hasInput = true;
            $('.adm').each(function () {
                if ($(this).val() === "") {
                    hasInput = false;
                    return false;
                }
            });

            var adminAda = dataInstall.nama_admin !== '' && dataInstall.user_admin !== '';
            if (adminAda) {
                currentPage++;
                switchPage(currentPage, false)
            } else {
                if (!hasInput) {
                    Swal.fire({
                        title: "ERROR",
                        text: "Semua harus diisi, jangan ada yang kosong",
                        icon: "error"
                    });
                } else {
                    if ($('#input-pass').val() === $('#input-rep-pass').val()) {
                        if ($('#input-pass').val().length < 6) {
                            Swal.fire({
                                title: "ERROR",
                                text: "Password kurang dari 6 karakter",
                                icon: "error"
                            });
                        } else {
                            $('.card-step').find('[data-step="2"]').addClass('completed');
                            $('.card-step').find('[data-step="2"]').find('.label').addClass('completed');
                            currentPage++;
                            switchPage(currentPage, false)
                        }
                    } else {
                        Swal.fire({
                            title: "ERROR",
                            text: "Password tidak sama",
                            icon: "error"
                        });
                    }
                }
            }
        });

        $('#prev2').click(function () {
            currentPage--;
            switchPage(currentPage, true);
        });

        $('#next3').click(function () {
            var hasInput = true;
            $('.app').each(function () {
                if ($(this).val() === "") {
                    hasInput = false;
                    return false;
                }
            });

            var settingAda = dataInstall.aplikasi !== '' && dataInstall.sekolah !== '' && dataInstall.kepsek !== '' &&
                dataInstall.jenjang !== '' && dataInstall.alamat !== '' && dataInstall.desa !== '' &&
                dataInstall.kec !== '' && dataInstall.kota !== '';
            if (settingAda) {
                currentPage++;
                switchPage(currentPage, false);
            } else {
                if (!hasInput) {
                    Swal.fire({
                        title: "ERROR",
                        text: "Isi semua pilihan yang bertanda bintang (*)",
                        icon: "error"
                    });
                } else {
                    $('.card-step').find('[data-step="3"]').addClass('completed');
                    $('.card-step').find('[data-step="3"]').find('.label').addClass('completed');
                    currentPage++;
                    switchPage(currentPage, false)
                }
            }
        });

        $('#prev3').click(function () {
            currentPage--;
            switchPage(currentPage, true);
        });

        $('#prev4').click(function () {
            currentPage--;
            switchPage(currentPage, true);
        });

        $('#next4').click(function () {
            $('#installapp').submit();
        });

        $('#input-jenjang').change(function () {
            var htmlOptions = '<option value="" disabled="">Satuan Pendidikan</option>';
            var satSelected = satuanPend[$(this).val()];
            for (let i = 0; i < satSelected.length; i++) {
                htmlOptions += '<option value="' + (i + 1) + '">' + satSelected[i] + '</option>';
            }
            $('#input-satuan').html(htmlOptions);
        });

        $('#installapp').submit(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            $('.loading').removeClass('d-none');
            swal.fire({
                title: "Menyimpan installasi",
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

            var dataPost = $(this).serialize();
            console.log(dataPost);

            swal.close();
            $('.loading').addClass('d-none');

            $.ajax({
                url: base_url + 'install/createapp',
                method: 'POST',
                data: dataPost,
                success: function (response) {
                    $('.loading').addClass('d-none');
                    console.log(response);
                    const isSuccess = response.admin && response.insert;
                    swal.close();
                    swal.fire({
                        title: isSuccess ? "Sukses" : "Gagal!",
                        html: isSuccess ? "Aplikasi berhasil diinstall" : 'Gagal menyimpan data aplikasi',
                        icon: isSuccess ? "success" : "error",
                        closeOnClickOutside: false,
                        showCancelButton: false,
                        closeOnEsc: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(result => {
                        if (result.value) {
                            if (isSuccess) window.location.href = base_url;
                        }
                    });

                },
                error: function (xhr, error, status) {
                    $('.loading').addClass('d-none');
                    swal.close();
                    Swal.fire({
                        title: "ERROR",
                        html: 'Gagal menyimpan data',
                        icon: "error"
                    });
                    console.log(xhr.responseText);
                }
            });
        });

    });

    function switchPage(page, back) {
        $('.step').removeClass('current');
        console.log(completed, page);
        if (back) $('.card-step').find('[data-step="' + (page + 1) + '"]').removeClass('completed');
        $('.card-step').find('[data-step="' + page + '"]').addClass('current');

        $('.step-content').removeClass('active');
        $('.step-content-container').find('[data-step="' + page + '"]').addClass('active');

        if (page == 4) {
            $('#text-db').text(': ' + $('#input-nama-db').val());
            $('#text-app').text(': ' + $('#input-nama-app').val());
            $('#text-adm').text(': ' + $('#input-nama-adm').val());
            $('#text-usr').text(': ' + $('#input-user').val());
            $('#text-pass').text(': ' + $('#input-pass').val());
            $('#text-skl').text(': ' + $('#input-nama-skl').val());
            $('#text-kep').text(': ' + $('#input-nama-kepsek').val());
            $('#text-jen').text(': ' + $('#input-jenjang option:selected').text());
            $('#text-satuan').text(': ' + $('#input-satuan option:selected').text());
            $('#text-alm').text(': ' + $('#input-alamat').val() + ' ' + $('#input-desa').val() + ' ' +
                $('#input-kec').val() + ' ' + $('#input-kota').val() + ' ' + $('#input-prov').val());
        }
    }
</script>
