<section class="d-flex align-items-center gradient">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 aos-init aos-animate"
                 data-aos="fade-up">
                <div class="text-center text-md-left">
                    <div class="mb-3 text-white">
                        <img style="width:100px; height:auto;" src="<?= base_url() ?>/assets/img/garuda_white.svg"><span
                                class="h1 align-bottom">aruda</span> <span class="h1 align-bottom"> CBT</span>
                    </div>
                    <div class="h2 text-white">
                        <b>G</b>abungan <b>A</b>plikasi <b>R</b>apor,<br/><b>U</b>jian dan e-learning
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch hero-img aos-init aos-animate pt-5"
                 data-aos="fade-up">
                <div class="card" style="background-color: rgba(255,255,255,.7);">
                    <div class="card-body">
                        <?= form_open('create', array('id' => 'create')) ?>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="input-nama-db">Host Name</label>
                                <input type="text" class="form-control db" id="input-nama-host" name="hostname" value=""
                                       placeholder="localhost" required>
                            </div>
                            <div class="form-group col-12" required>
                                <label for="input-nama-db">Host Username</label>
                                <input type="text" class="form-control db" id="input-user-host" name="hostuser" value=""
                                       placeholder="Host Username">
                            </div>
                            <div class="form-group col-12" required>
                                <label for="input-nama-db">Host Password</label>
                                <input type="text" class="form-control" id="input-pass-host" value="" name="hostpass"
                                       placeholder="Host Password">
                                <small class="form-text text-muted">Kosongkan jika tidak menggunakan password.</small>
                            </div>
                            <div class="form-group col-12" required>
                                <label for="input-nama-db">Nama Database</label>
                                <input type="text" class="form-control db" id="input-nama-db" name="database" value=""
                                       placeholder="Nama Database">
                                <small class="form-text text-muted">Jangan gunakan spasi.</small>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap align-items-center justify-content-end">
                            <button type="submit" id="install-db" class="btn-primary btn">INSTALL / UPDATE</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-default-info align-content-center mt-4" role="alert"
             style="background-color: rgba(255,255,255,.7);">
            <i><b>A. Update Aplikasi</b></i>
            <ul>
                <li>
                    Isi kolom di atas, sesuaikan dengan pengaturan localhost/mySql dan nama database yang sudah ada,
                    lalu klik [INSTALL / UPDATE].
                </li>
            </ul>
            <br>
            <i><b>B. Install Otomatis</b></i>
            <ul>
                <li>
                    Isi kolom di atas, sesuaikan dengan pengaturan localhost/mySql, isi nama database, lalu klik
                    [INSTALL / UPDATE
                </li>
                <li>
                    Lanjutkan proses instalasi di halaman selanjutnya
                </li>
            </ul>
            <br>
            <i><b>C. Install Manual</b></i>
            <br>Jika ingin menginstall manual, lakukan langkah dibawah ini:
            <ol>
                <li>
                    Buat database baru di <b>phpmyadmin</b>
                </li>
                <li>
                    IMPORT file database di dalam folder /assets/app/db/master.sql
                </li>
                <li>
                    Buka file <b>database.php</b> di dalam folder /application/config/
                </li>
                <li>
                    Ganti baris kode dibawah ini:
                    <pre style="white-space: pre-line">
                        <code><span class="badge badge-light">'hostname' => '',</span></code>
                        <code><span class="badge badge-light">'username' => '',</span></code>
                        <code><span class="badge badge-light">'password' => '',</span></code>
                        <code><span class="badge badge-light">'database' => '',</span></code>
                    </pre>
                    menjadi:
                    <br>
                    <pre style="white-space: pre-line">
                        <code><span class="badge badge-light">'hostname' => 'localhost', </span>
                            <span class="badge badge-light">'username' => '',  </span> // default xampp tidak menggunakan username, laragon menggunakan username = root
                            <span class="badge badge-light">'password' => '',  </span> // default xampp dan laragon tidak menggunakan password
                            <span class="badge badge-light">'database' => 'nama_database', </span> // sesuaikan dengan nama database yang dibuat
                        </code>
                    </pre>
                </li>
                <li>
                    Refresh halaman ini
                </li>
            </ol>
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
    console.log('<?= $res ?>', '<?= $msg ?>');
    $(document).ready(function () {
        $('#create').submit(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());

            swal.fire({
                title: "Checking database",
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

            const dataPost = $(this).serialize();
            $.ajax({
                url: base_url + 'install/checkdatabase',
                method: 'POST',
                data: dataPost + '&page=0',
                success: function (response) {
                    console.log(response);
                    swal.close();
                    swal.fire({
                        title: "Sukses",
                        html: "Database berhasil diinstall",
                        icon: "success",
                        closeOnClickOutside: false,
                        showCancelButton: false,
                        closeOnEsc: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(result => {
                        if (result.value) {
                            window.location.reload();
                        }
                    });
                },
                error: function (xhr, error, status) {
                    swal.close();
                    Swal.fire({
                        title: "ERROR",
                        html: 'Gagal inisialisasi database',
                        icon: "error"
                    });
                    console.log(xhr.responseText);
                }
            });

            /*
            setTimeout(
                function() {
                    swal.close();
                }, 5000);
                */
        });
    });
</script>
