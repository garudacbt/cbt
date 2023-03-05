<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 21/10/2020
 * Time: 17:56
 */
?>

<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card my-shadow">
                <div class="card-header">
                    <div class="card-title">
                        <h6><?= $subjudul ?></h6>
                    </div>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary mb-2" onclick="processBackup()">BACKUP SEMUA DATA</button>
                    <div class="progress" style="height: 30px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%; height: 30px">
                        </div>
                    </div>
                    <p>Jangan merefresh/menutup halaman ini atau ke halaman lain selama proses backup berlangsung
                        <br>Jika backup gagal, gunakan cpanel untuk membackup file dan database</p>
                    <hr>
                    <br>

                    <h6><b>RIWAYAT BACKUP</b></h6>
                    <?= form_open('', array('id' => 'edittp')) ?>
                    <table id="database" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="50" height="50" class="text-center p-0 align-middle">No.</th>
                            <th class="text-center p-0 align-middle">Database/File</th>
                            <th class="text-center p-0 align-middle">Size</th>
                            <th class="text-center p-0 align-middle p-0">Tanggal Backup</th>
                            <th class="text-center p-0 align-middle">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //sort($list);
                        usort($list, function ($a, $b) {
                            return $b['tgl'] <=> $a['tgl'];
                        });
                        foreach ($list as $key => $value) :?>
                            <tr>
                                <td class="text-center">
                                    <?= ($key + 1) ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['nama'] . '.' . $value['type'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $value['size'] ?>
                                </td>
                                <td class="text-center">
                                    <?= buat_tanggal(date('D, d M Y H:i', $value['tgl'])) ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('./backups/' . $value['src']) ?>"
                                       download="<?= $value['src'] ?>" type="button"
                                       class="btn btn-xs btn-warning btn-download">Download</a>
                                    <button onclick="hapus('<?= $value['src'] ?>')" type="button"
                                            class="btn btn-xs btn-danger btn-hapus">Hapus
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= form_close() ?>
                </div>
            </div>

            <!--
            <div class="card my-shadow">
                <div class="card-header">
                    <div class="card-title">
                        <h6>Pilihan Backup/Restore</h6>
                    </div>
                </div>
                <div class="card-body">
                    <?php
            echo '<pre>';
            //var_dump($tables);
            echo '</pre>';
            ?>
                    <button class="btn btn-primary mb-2" onclick="processBackup()">BACKUP SEMUA DATA</button>
                    <div class="progress" style="height: 30px">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%; height: 30px">
                        </div>
                    </div>
                    <p>Jangan merefresh/menutup halaman ini atau ke halaman lain selama proses backup berlangsung
                        <br>Jika backup gagal, gunakan cpanel untuk membackup file dan database</p>
                    <hr>
                    <br>
                </div>
            </div>
            -->
        </div>
    </section>
</div>

<script>

    function updateProgress(count, message) {
        var progress = $('.progress-bar');
        //var count = Number(document.getElementById('count').innerHTML);
        //var total = document.getElementById('total').innerHTML;
        //var pcg = Math.floor(count/total*100);
        //document.getElementsByClassName('progress-bar').item(0).setAttribute('aria-valuenow', count);
        //document.getElementsByClassName('progress-bar').item(0).setAttribute('style','width:'+Number(count)+'%');

        progress.attr('aria-valuenow', count);
        progress.attr('style', 'width:' + Number(count) + '%');
        progress.text(count + '%  ' + message);
    }

    function processBackup() {
        swal.fire({
            title: "Backup database dan file sedang berjalan",
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

        updateProgress(5, ' ');
        $.ajax({
            type: "GET",
            url: base_url + 'dbmanager/backupdb',
            success: function (response) {
                console.log(response);
                updateProgress(50, response.message);
                backupData();
            }
        });
    }

    function backupData() {
        $.ajax({
            type: "GET",
            url: base_url + 'dbmanager/backupdata',
            success: function (response) {
                console.log(response);
                updateProgress(100, response.message);
                swal.fire({
                    title: "Berhasil",
                    text: "Semua file data berhasil dibackup",
                    icon: "success"
                }).then(result => {
                    if (result.value) {
                        window.location.href = base_url + 'dbmanager';
                    }
                })
            }
        });
    }

    function hapus(src) {
        swal.fire({
            title: "Anda yakin?",
            html: "File <b>" + src + "</b> akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
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
                    url: base_url + 'dbmanager/hapusbackup/' + src,
                    type: "GET",
                    success: function (respon) {
                        console.log(respon);
                        if (respon.status) {
                            swal.fire({
                                title: "Berhasil",
                                text: respon.message,
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.href = base_url + 'dbmanager';
                                }
                            })
                        } else {
                            swal.fire({
                                title: "Gagal",
                                text: respon.message,
                                icon: "error"
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                        const err = JSON.parse(xhr.responseText)
                        swal.fire({
                            title: "Error",
                            text: err.Message,
                            icon: "error"
                        });
                    }
                });
            }
        })
    }

    $(document).ready(function () {
    });

</script>
