<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
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
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title">Catatan Untuk <b><?= $siswa->nama ?></b></h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="50" height="50" class="text-center p-0 align-middle">No.</th>
                            <th class="text-center p-0 align-middle p-0">Tanggal</th>
                            <th class="text-center p-0 align-middle">Catatan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (count($catatan_siswa) > 0) :
                            foreach ($catatan_siswa as $key => $value) : ?>
                                <tr>
                                    <td class="text-center">
                                        <?= ($key + 1) ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $value->tgl ?>
                                    </td>
                                    <td>
                                        <?= $value->text ?>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr>
                                <td colspan="3" class="text-center">Belum ada catatan
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="daftarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daftarLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('', array('id' => 'formcatatan')) ?>
            <div class="modal-body">
                <div class="container-fluid">
                    <textarea class="form-control" name="text" id="input_text" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_mapel" value="<?= $id_mapel ?>">
                <input type="hidden" name="id_siswa" value="<?= $siswa->id_siswa ?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    var idSiswa = <?=$siswa->id_siswa?>;
    var idMapel = <?=$id_mapel?>;
    var idKelas = <?=$id_kelas?>;
    $(document).ready(function () {

        $('#daftarModal').on('show.bs.modal', function (e) {
            $('#daftarLabel').text('Catatan Untuk Kelas ');
        });

        $('#formcatatan').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());
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
                url: base_url + "kelascatatan/savecatatansiswa",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log("result", data);
                    $('#daftarModal').modal('hide').data('bs.modal', null);
                    $('#daftarModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });

                    if (data) {
                        swal.fire({
                            title: "Sukses",
                            text: "Catatan berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + 'kelascatatan/siswa?id_siswa=' + idSiswa + '&id_mapel=' + idMapel + '&id_kelas=' + idKelas;
                            }
                        });
                    } else {
                        swal.fire({
                            title: "ERROR",
                            text: "Catatan Tidak Tersimpan",
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    $('#daftarModal').modal('hide').data('bs.modal', null);
                    $('#daftarModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });
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
    });
</script>
