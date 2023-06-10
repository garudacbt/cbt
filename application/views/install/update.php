<section class="d-flex align-items-center">
    <?php
    /*
    echo '<pre>';
    foreach ($json as $js) {
        foreach ($js as $objects) {
            if (!is_string($objects)) {
                foreach ($objects as $key=>$object) {
                    foreach ($object as $key=>$obj) {
                        var_dump($key);
                        var_dump($obj);
                        echo '<br>';
                    }
                }
            }
        }
    }
    echo '</pre>';
    */
    ?>
    <div class="container">
        <div class="align-content-center">
            <img class="mt-3 mb-3" width="30" height="30" src="<?= base_url('assets/img/garuda_circle.png') ?>">
            <span class="text-lg"><b>arudaCBT</b></span>
        </div>
        <hr>
        <div class="row mb-3">
            <div class="col-8">
                <h4>UPDATE DATABASE</h4>
            </div>
            <div class="col-4 text-right">
                <a href="<?= base_url() ?>" class="btn btn-success">
                    <svg style="margin-bottom: 5px" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
                         xml:space="preserve" version="1.0" shape-rendering="geometricPrecision"
                         text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd"
                         clip-rule="evenodd" viewBox="0 0 115.89 91.59" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path fill="#FFFFFF"
                          d="M115.87 0c-5.48,11.17 -22.76,12.93 -35.49,12.83 -25.61,-0.32 -49.5,-9.74 -46.18,14.9 -20.65,1.16 -34.89,16.99 -34.17,22.41 9.99,-3.77 20.67,-4 25.82,-2.77 0.57,8.68 14.85,14.9 24.52,18.57 -6.36,-9.17 -11.52,-28 6.34,-32.59 1.11,-0.23 1.55,-0.31 2.89,-0.39 27.86,-1.2 57.34,-9.9 56.27,-32.96z"></path>
                        <path fill="#FFFFFF"
                              d="M24.01 55.4c7.39,49.12 66.11,44.11 77.13,9.65 2.88,2.25 6.63,1.22 9.62,0.31 -8.28,-8.6 0.17,-26.97 -9.18,-26.71l-44.28 1.35c2.7,12.27 7.85,18.66 23.32,19.96 -12.65,18.88 -45.34,10.32 -56.61,-4.56z"></path>
                </svg>
                    <span class="ml-2">Ke Aplikasi</span>
                </a>
            </div>
        </div>
        <div class="alert alert-default-danger align-content-center" role="alert">
            <h4>Sebelum melakukan update:</h4>
            <ol>
                <li>Pastikan aplikasi sedang tidak digunakan</li>
                <li>Backup database terlebih dahulu untuk berjaga-jaga</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-md-3 col-6">
                <button id="check" class="w-100 btn btn-primary" onclick="cekDatabase()">Cek Database</button>
            </div>
            <div id="update" class="col-md-3 col-6 d-none">
                <button id="btn-update" class="w-100 btn btn-success" onclick="updateDatabase()">Update Database
                </button>
            </div>

            <div id="progress" class="col-md-6 col-12 d-none">
                <div class="border border-primary" style="height: 35px">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                         aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%; height: 35px">
                    </div>
                </div>
            </div>

            <div id="spinner" class="col-md-6 d-none">
                <div class="spinner-border text-danger" role="status">
                    <span class="sr-only">Loading</span>
                </div>
                <span id="spinner-info" class="ml-2">
                    Mengambil informasi ....
                </span>
            </div>
        </div>
        <div id="info-db" class="alert alert-default-info align-content-center mt-3 d-none" role="alert">
        </div>
        <div class="row mt-4" id="info-table">
        </div>
    </div>

    <?= form_open('update', array('id' => 'update-database')) ?>
    <?= form_close() ?>

</section>

<script>
    $(document).ready(function () {

    });

    function cekDatabase() {
        $('#check').attr('disabled', 'disabled');
        $('#spinner').removeClass('d-none');
        $('#update').addClass('d-none');
        $('#progress').addClass('d-none');
        $.ajax({
            type: "GET",
            url: base_url + 'update/checkdatabase',
            success: function (response) {
                console.log(response);
                $('#check').removeAttr('disabled');
                $('#check').text('Cek Ulang Database');
                $('#spinner').addClass('d-none');
                $('#info-db').removeClass('d-none');

                if (response.counts === 0) {
                    console.log('updated');
                    $('#info-db').html('Database sudah versi terbaru');
                } else {
                    console.log('need update');
                    $('#info-db').html('Database perlu update, silahkan lakukan update ke versi terbaru');
                    $('#update').removeClass('d-none');
                }
            },
            error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
                swal.fire({
                    title: "ERROR",
                    text: "Ada kesalahan",
                    icon: "error"
                });
            }
        });
    }

    function updateDatabase() {
        $('#check').attr('disabled', 'disabled');
        $('#btn-update').attr('disabled', 'disabled');

        $('#spinner').removeClass('d-none');
        $('#spinner-info').html('Update database....');
        $('#info-db').html('Update database....');

        $.ajax({
            method: "GET",
            url: base_url + 'update/updatedatabase',
            success: function (response) {
                console.log(response);
                $('#spinner').addClass('d-none');
                $('#info-db').html('Update database selesai');

                $('#check').removeAttr('disabled');
                $('#btn-update').removeAttr('disabled');
                $('#update').addClass('d-none');
            },
            error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
                swal.fire({
                    title: "ERROR",
                    html: xhr.responseText,
                    icon: "error"
                });
            }
        });
    }

    function updateProgress(count, message) {
        var progress = $('.progress-bar');
        var prog = Math.round(Number(count));
        console.log(prog);
        progress.attr('aria-valuenow', prog);
        progress.attr('style', 'width:' + prog + '%; height: 35px');
        progress.html('<span class="text-dark">' + prog + '%  ' + message + '</span>');

        if (count >= 100) {
            $('#check').removeAttr('disabled');
            $('#btn-update').removeAttr('disabled');
        }

        $('#info-db').html(message);
    }

</script>
