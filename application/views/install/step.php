<div class="row p-4">
    <div class="col-md-1 col-lg-2"></div>
    <div class="col-md-10 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    Selamat Datang
                    <br> Install GarudaCBT
                </div>
            </div>
        </div>
        <?=form_open('',array('id'=>'installapp'))?>
        <div class="steps">
        </div>
        <?=form_close()?>
    </div>
    <div class="col-md-1 col-lg-2"></div>
</div>
<!--
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <div class="card my-5">
            <div class="card-header">
                Setting database
            </div>
            <div class="card-body">
                <li>Rename file <b>application/config/database.sample.php</b> menjadi <b>application/config/database.php</b>
                </li>
                <?php if (!empty($error)): ?>
                    <li>
                        Atur koneksi database pada file <b>application/config/database.php</b>, isi bagian - bagian
                        configurasi dengan benar :<br>
                    </li>
                    <?= $error; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-2"></div>
</div>
-->
<script>
    var dataInstall = JSON.parse(JSON.stringify(<?=json_encode($data)?>));
    var currentPage = 1;
    var dbSudah = false;
    $(document).ready(function() {
        console.log('data', dataInstall);
        var readHostname = dataInstall.hostname === '' ? '' : 'readonly';
        var readHostuser = dataInstall.hostuser === '' ? '' : 'readonly';
        var readHostpass = dataInstall.hostpass === '' ? '' : 'readonly';
        var readHostDb   = dataInstall.database === '' ? '' : 'readonly';

        var readAdminNama = dataInstall.nama_admin === '' ? '' : 'readonly';
        var readAdminUser = dataInstall.user_admin === '' ? '' : 'readonly';
        var readAdminPass = dataInstall.pass_admin === '' ? '' : 'readonly';

        var readAppNama     = dataInstall.aplikasi === '' ? '' : 'readonly';
        var readSklNama     = dataInstall.sekolah === '' ? '' : 'readonly';
        var readSklKepsek   = dataInstall.kepsek === '' ? '' : 'readonly';
        var readSklJenjang  = dataInstall.jenjang === '' ? '' : 'readonly';
        var readSklAlamat   = dataInstall.alamat === '' ? '' : 'readonly';
        var readSklDesa     = dataInstall.desa === '' ? '' : 'readonly';
        var readSklKec      = dataInstall.kec === '' ? '' : 'readonly';
        var readSklKab      = dataInstall.kota === '' ? '' : 'readonly';
        var readSklTlp      = dataInstall.tlp === '' ? '' : 'readonly';

        var content1 = `<div class="row">
                    <div class="form-group col-md-6">
                        <label for="input-nama-db">Host Name</label>
                        <input type="text" class="form-control db" id="input-nama-host" name="hostname" value="${dataInstall.hostname}" placeholder="localhost" ${readHostname}>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input-nama-db">Host Username</label>
                        <input type="text" class="form-control db" id="input-user-host" name="hostuser" value="${dataInstall.hostuser}" placeholder="Host Username" ${readHostuser}>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input-nama-db">Host Password</label>
                        <input type="text" class="form-control" id="input-pass-host" value="${dataInstall.hostpass}" name="hostpass" placeholder="Host Password" ${readHostpass}>
                        <small class="form-text text-muted">Kosongkan jika tidak menggunakan password.</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input-nama-db">Nama Database</label>
                        <input type="text" class="form-control db" id="input-nama-db" name="database" value="${dataInstall.database}" placeholder="Nama Database" ${readHostDb}>
                        <small class="form-text text-muted">Jangan gunakan spasi.</small>
                    </div>
                    </div>
                    <div class="d-flex flex-wrap align-items-center justify-content-end">
                    <button type="button" id="next1" class="btn-primary btn">Selanjutnya</button></div>
                    <!--
                    <div class="alert alert-default-info align-content-center mt-4" role="alert">
                    <i>INFO</i>
                    <br>Jika ingin mengganti <strong>localhost</strong> dan <strong>root</strong>, lakukan langkah dibawah ini:
                <ul>
                    <li>
                        Buka file <b>database.php</b> di dalam folder /application/config/
                    </li>
                    <li>
                        Ganti baris dibawah ini:
                        <pre><code>'hostname' => 'localhost',<br>'username' => 'root',<br>'password' => ' ',<br>'database' => ' ',</code></pre>
                        menjadi:
                        <pre><code>'hostname' => ' ',<br>'username' => ' ',<br>'password' => ' ',<br>'database' => ' ',</code></pre>
                    </li>
                    <li>
                        Refresh halaman ini
                    </li>
                </ul>
                    </div>-->`;

        var content2 = `<div class="text-center">
                    <p><b>LOGIN ADMINISTRATOR</b></p>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="input-nama-adm" value="${dataInstall.nama_admin}" class="form-control adm" required="" ${readAdminNama}>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Username</label>
                        <input type="text" name="username" id="input-user" class="form-control adm" value="${dataInstall.user_admin}" required="" ${readAdminUser}>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Password</label>
                        <input type="password" name="password" id="input-pass" class="form-control adm" required="" ${readAdminPass}>
                        <small class="form-text text-muted">Password harus 6 karakter atau lebih.</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Ulangi Password</label>
                        <input type="password" id="input-rep-pass" class="form-control adm" required="" ${readAdminPass}>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-end">
                    <button type="button" id="prev2" class="btn-primary btn mr-auto">Sebelumnya</button>
                    <button type="button" id="next2" class="btn-primary btn">Selanjutnya</button>
                </div>`;

        var content3 = `<div class="row">
                    <div class="col-md-4 mb-4">
                        <label>Nama Aplikasi *</label>
                        <input type="text" id="input-nama-app" name="nama_aplikasi" class="form-control app" value="${dataInstall.aplikasi}" required  ${readAppNama}>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label>Nama Sekolah *</label>
                        <input type="text" id="input-nama-skl" name="nama_sekolah" class="form-control app" value="${dataInstall.sekolah}" required ${readSklNama}>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label>Kepala Sekolah *</label>
                        <input type="text" id="input-nama-kepsek" name="kepsek" class="form-control app" value="${dataInstall.kepsek}" required ${readSklKepsek}>
                    </div>
                    <div class="col-md-3 mb-4">
                        <label>Jenjang *</label>
                        <select class="form-control app" id="input-jenjang" data-placeholder="Pilih Jenjang" name="jenjang" required ${readSklJenjang}>
                            <option value="" ${dataInstall.jenjang == '' ? 'selected' : ''} disabled>Pilih Jenjang</option>`;
        var arrJenjang = ["SD/MI","SMP/MTS","SMA/MA/SMK"];
        for (let i=0;i<3;i++) {
            var selected = (i+1) == dataInstall.jenjang ? 'selected' : '';
            content3 += `<option value="${i+1}" ${selected}>${arrJenjang[i]}</option>`;
        }
        content3 += `</select>
                    </div>
                    <div class="col-md-5 mb-4">
                        <label>Alamat *</label>
                        <br>
                        <input type="text" id="input-alamat" class="form-control app" name="alamat" value="${dataInstall.alamat}" required ${readSklAlamat}>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label>Desa/Kelurahan *</label>
                        <input type="text" id="input-desa" name="desa" class="form-control app" value="${dataInstall.desa}" required ${readSklDesa}>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label>Kecamatan *</label>
                        <input type="text" id="input-kec" name="kec" class="form-control app" value="${dataInstall.kec}" required ${readSklKec}>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label>Kabupaten/Kota *</label>
                        <input type="text" id="input-kota" name="kota" class="form-control app" value="${dataInstall.kota}" required ${readSklKab}>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label>Nomor Telepon</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+62</span>
                            </div>
                            <input type="number" id="input-tlp" name="tlp" class="form-control" value="${dataInstall.tlp}" ${readSklTlp}>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-end">
                     <button type="button" id="prev3" class="btn-primary btn mr-auto">Sebelumnya</button>
                     <button type="button" id="next3" class="btn-primary btn">Selanjutnya</button>
                </div>`;

        var content4 = `<div class="row p-4">
                        <table class="table">
                            <tr>
                                <td>Database</td>
                                <td id="text-db">: </td>
                            </tr>
                            <tr>
                                <td>Nama Aplikasi</td>
                                <td id="text-app">: </td>
                            </tr>
                            <tr>
                                <td>Nama Administrator</td>
                                <td id="text-adm">: </td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td id="text-usr">: </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td id="text-pass">: </td>
                            </tr>
                            <tr>
                                <td>Nama Sekolah</td>
                                <td id="text-skl">: </td>
                            </tr>
                            <tr>
                                <td>Kepala Sekolah</td>
                                <td id="text-kep">: </td>
                            </tr>
                            <tr>
                                <td>Jenjang</td>
                                <td id="text-jen">: </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td id="text-alm">: </td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td id="text-tlp">: </td>
                            </tr>
                        </table>
                </div>
                <hr>
                <div class="d-flex flex-wrap align-items-center justify-content-end">
                     <button type="button" id="next4" class="btn-primary btn">Mulai Aplikasi</button>
                </div>`;

        $('.steps').MultiStep({
            title:'Install Applikasi',
            data:[
                {content: content1, label:'Database'},
                {content: content2, label:'Administrator'},
                {content: content3, label:'Sekolah', skip:true},
            ],
            final: content4,//'Aplikasi sudah terinstal<br><button type="button" id="gotoapp" class="btn-primary btn mr-auto">Mulai Aplikasi</button>',
            //modalSize:'lg'
        });

        $('.modal-footer').addClass('d-none');

        $('.btn-next').click(function (e) {
            $('#text-db').text(': ' + $('#input-nama-db').val());
            $('#text-app').text(': ' + $('#input-nama-app').val());
            $('#text-adm').text(': ' + $('#input-nama-adm').val());
            $('#text-usr').text(': ' + $('#input-user').val());
            $('#text-pass').text(': *');
            $('#text-skl').text(': ' + $('#input-nama-skl').val());
            $('#text-kep').text(': ' + $('#input-nama-kepsek').val());
            $('#text-jen').text(': ' + $('#input-jenjang').val());
            $('#text-alm').text(': ' + $('#input-alamat').val() +' '+ $('#input-desa').val() +' '+ $('#input-kec').val() +' '+ $('#input-kota').val());
            $('#text-tlp').text(': ' + $('#input-tlp').val());
        });

        $('#next1').click(function () {
            var hasInput=true;
            $('.db').each(function () {
                if($(this).val() === ""){
                    hasInput=false;
                    return false;
                }
            });

            if(!hasInput){
                Swal.fire({
                    title: "ERROR",
                    text: "Semua harus diisi, jangan ada yang kosong",
                    icon: "error"
                });
            } else {
                var dbAda = dataInstall.hostname !== '' && dataInstall.hostuser !== '' && dataInstall.database !== '';
                if (dbSudah) {
                    currentPage ++;
                    $('.btn-next').click();
                } else {
                    $('#installapp').submit();
                }
            }
        });

        $('#next2').click(function () {
            var hasInput=true;
            $('.adm').each(function () {
                if($(this).val() === ""){
                    hasInput=false;
                    return false;
                }
            });

            var adminAda = dataInstall.nama_admin !== '' && dataInstall.user_admin !== '';
            if (adminAda) {
                currentPage ++;
                $('.btn-next').click();
                //console.log('page', currentPage);
            } else {
                if(!hasInput){
                    Swal.fire({
                        title: "ERROR",
                        text: "Semua harus diisi, jangan ada yang kosong",
                        icon: "error"
                    });
                }else{
                    if ($('#input-pass').val() === $('#input-rep-pass').val()) {
                        if ($('#input-pass').val().length < 6) {
                            Swal.fire({
                                title: "ERROR",
                                text: "Password kurang dari 6 karakter",
                                icon: "error"
                            });
                        } else {
                            $('#installapp').submit();
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
            currentPage --;
            $('.btn-prev').click();
            console.log('page', currentPage);
        });

        $('#next3').click(function () {
            var hasInput=true;
            $('.app').each(function () {
                if($(this).val() === ""){
                    hasInput=false;
                    return false;
                }
            });

            var settingAda = dataInstall.aplikasi !== '' && dataInstall.sekolah !== '' && dataInstall.kepsek !== '' &&
                    dataInstall.jenjang !== '' && dataInstall.alamat !== '' && dataInstall.desa !== '' &&
                    dataInstall.kec !== '' && dataInstall.kota !== '' ;
            if (settingAda) {
                currentPage ++;
                $('.btn-next').click();
                //console.log('page', currentPage);
            } else {
                if (!hasInput) {
                    Swal.fire({
                        title: "ERROR",
                        text: "Isi semua pilihan yang bertanda bintang (*)",
                        icon: "error"
                    });
                } else {
                    $('#installapp').submit();
                }
            }
        });

        $('#prev3').click(function () {
            currentPage --;
            $('.btn-prev').click();
            console.log('page', currentPage);
        });

        $('#prev4').click(function () {
            currentPage --;
            $('.btn-prev').click();
            console.log('page', currentPage);
        });

        $('#installapp').submit(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var dataPost = $(this).serialize();
            console.log(dataPost);

            var url;
            if (currentPage === 1) {
                url = base_url + 'install/createdb';
            } else if (currentPage === 2) {
                url = base_url + 'install/createadmin';
            } else if (currentPage === 3) {
                url = base_url + 'install/createsetting';
            }

            $('.loading').removeClass('d-none');
            $.ajax({
                url: url,
                method: 'POST',
                data: dataPost + '&page=' + currentPage,
                success: function (response) {
                    $('.loading').addClass('d-none');
                    console.log(response);
                    if (currentPage === 1) {
                        if (response.database && response.table && response.host) {
                            currentPage ++;
                            $('.btn-next').click();
                            dbSudah = true;
                        } else {
                            var msg = '';
                            if (!response.database) {
                                msg += 'Gagal membuat database<br>';
                            }
                            if (!response.table) {
                                msg += 'Gagal membuat table<br>';
                            }
                            if (!response.database) {
                                msg += 'Gagal koneksi ke host<br>';
                            }

                            Swal.fire({
                                title: "ERROR",
                                html: msg,
                                icon: "error"
                            });
                        }
                    } else if (currentPage === 2) {
                        if (!response.admin) {
                            Swal.fire({
                                title: "ERROR",
                                html: 'Gagal membuat akun administrator',
                                icon: "error"
                            });
                        } else {
                            currentPage ++;
                            $('.btn-next').click();
                        }
                    } else if (currentPage === 3) {
                        if (!response.insert) {
                            Swal.fire({
                                title: "ERROR",
                                html: 'Gagal membuat data sekolah',
                                icon: "error"
                            });
                        } else {
                            currentPage ++;
                            $('.btn-next').click();
                        }
                    }

                },
                error: function (xhr, error, status) {
                    $('.loading').addClass('d-none');
                    Swal.fire({
                        title: "ERROR",
                        html: 'Gagal menyimpan data',
                        icon: "error"
                    });
                    console.log(xhr.responseText);
                }
            });
        });

        $('#next4').click(function () {
            window.location.href = base_url;
        });
    });
</script>