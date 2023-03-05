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
                    <div class="alert alert-danger shadow align-content-center" role="alert">
                        <strong>Catatan !</strong> <br>BACKUP terlebih dahulu di menu Backup/Restore.
                    </div>

                    <?php
                    //echo '<pre>';
                    //var_dump($tables);
                    //echo '</pre>';
                    foreach ($tables as $ket => $table) :
                        $keterangan = $ket == '1' ?
                            '<li>Tabel berisi data yang bisa digunakan sepanjang tahun/semester</li>' .
                            '<li>Sebaiknya tidak dihapus, kecuali data sudah tidak diperlukan</li>' .
                            '<li>Tabel otomatis dibackup ketika dihapus, lihat di menu Backup/Restore untuk melihat backup table yang dihapus</li>' :
                            '<li>Tabel berisi data yang hanya digunakan satu tahun/semester</li>' .
                            '<li>Tabel otomatis dibackup ketika dihapus, lihat di menu Backup/Restore untuk melihat backup table yang dihapus</li>';
                        ?>
                        <div class="alert alert-default-success border-success">
                            <ul class="mb-1">
                                <?= $keterangan ?>
                            </ul>
                        </div>
                        <table id="database" class="table table-striped table-bordered table-hover mb-5">
                            <thead>
                            <tr>
                                <th width="50" height="50" class="text-center p-0 align-middle">No.</th>
                                <th class="text-center p-0 align-middle">Tabel</th>
                                <th class="text-center p-0 align-middle">Total Data</th>
                                <th class="text-center p-0 align-middle">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($table as $info) :?>
                                <tr>
                                    <td class="text-center align-middle"><?= $no ?></td>
                                    <td class="align-middle"><?= $info['name'] ?></td>
                                    <td class="align-middle text-center"><?= $info['size'] ?></td>
                                    <td class="text-center p-0 align-middle">
                                        <?php
                                        $disable = $info['size'] == 0 ? 'disabled="disabled"' : '';
                                        ?>
                                        <button class="btn btn-sm btn-warning"
                                                onclick="hapus('<?= $info['table'] ?>')" <?= $disable ?>><i
                                                    class="fa fa-trash"> Kosongkan</i></button>
                                    </td>
                                </tr>
                                <?php $no++; endforeach; ?>
                            </tbody>
                        </table>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('', array('id' => 'delete-table')) ?>
<?= form_close() ?>

<script>
    function hapus(src) {
        swal.fire({
            title: "Anda yakin?",
            html: "Tabel akan dihapus!",
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
                    url: base_url + 'dbclear/hapustable',
                    type: "POST",
                    data: $('#delete-table').serialize() + '&table=' + src,
                    success: function (respon) {
                        console.log(respon);
                        swal.fire({
                            title: "Berhasil",
                            text: respon.message,
                            icon: "success"
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + 'dbclear';
                            }
                        });
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
</script>
