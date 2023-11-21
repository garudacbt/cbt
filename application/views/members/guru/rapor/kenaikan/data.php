<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
?>

<div class="content-wrapper bg-white">
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
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-danger align-content-center" role="alert">
                        - Semua siswa otomatis naik
                        <br />
                        - Siswa yang tidak naik harus diset manual
                        <br />
                        - Jangan lupa <b>simpan</b>
                    </div>

                    <?php
                    //echo '<pre>';
                    //var_dump($guru);
                    //echo '</pre>';
                    $naik = 'Naik';
                    $tdkNaik = 'Tidak Naik';
                    if ($guru->level == '6' || $guru->level == '9' || $guru->level == '12') {
                        $naik = 'Lulus';
                        $tdkNaik = 'Tidak Lulus';
                    }
                    $naiks = ['1' => $naik, '0' => $tdkNaik];
                    ?>

                    <table class="table table-striped table-bordered table-hover" id="tbl-siswa">
                        <thead>
                        <tr>
                            <th width="50" height="50" class="text-center p-0 align-middle">No.</th>
                            <th class="text-center p-0 align-middle">N I S N</th>
                            <th class="text-center p-0 align-middle">N I S</th>
                            <th class="text-center p-0 align-middle p-0">Nama Siswa</th>
                            <th class="text-center p-0 align-middle">Naik / Lulus</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($siswas as $siswa) :
                            ?>
                            <tr>
                                <td class="d-none id-siswa"><?= $siswa->id_siswa ?></td>
                                <td class="text-center"><?= $no ?></td>
                                <td class="text-center"><?= $siswa->nisn ?></td>
                                <td class="text-center"><?= $siswa->nis ?></td>
                                <td><?= $siswa->nama ?></td>
                                <td>
                                    <?php
                                    echo form_dropdown('naik', $naiks, $siswa->naik != null ? $siswa->naik : '', 'class="form-control form-control-sm naik"'); ?>
                                </td>
                            </tr>
                            <?php $no++; endforeach; ?>
                        </tbody>
                    </table>

                    <?= form_open('', array('id' => 'formkenaikan')) ?>
                    <button type="submit" class="btn btn-primary card-tools mt-3 float-right">
                        <i class="fas fa-save mr-2"></i>Simpan
                    </button>
                    <?= form_close() ?>

                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        $('#formkenaikan').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());

            const $rows1 = $('#tbl-siswa').find('tr'), headers1 = $rows1.splice(0, 1);
            var jsonObj = [];
            $rows1.each((i, row) => {
                const id_siswa = $(row).find('.id-siswa').text();
                const naik = $(row).find('.naik').val();

                let item = {};
                item ["id_siswa"] = id_siswa;
                item ["naik"] = naik;

                jsonObj.push(item);
            });

            console.log($(this).serialize() + '&naik=' + JSON.stringify(jsonObj));

            $.ajax({
                url: base_url + "rapor/savenaik",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize() + '&naik=' + JSON.stringify(jsonObj),
                success: function (data) {
                    console.log("result", data);
                    swal.fire({
                        title: "Sukses",
                        text: data + " Data berhasil disimpan",
                        icon: "success",
                        showCancelButton: false,
                    }).then(result => {
                        if (result.value) {
                            window.location.reload()
                        }
                    });
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    swal.fire({
                        title: "ERROR",
                        text: "Data Tidak Tersimpan",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            });
        });

    });
</script>
