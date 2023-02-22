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
            <div class="card my-shadow mb-4">
                <div class="card-body">
                    <div class="alert alert-default-danger align-content-center" role="alert">
                        - Penulisan deskripsi spritual max 70 huruf
                        <br>
                        - Klik pada tiap teks untuk mengedit deskripsi
                        <br>
                        - Jangan lupa untuk menyimpan perubahan
                    </div>
                    <?= form_open('', array('id' => 'editsikap')) ?>
                    <?= form_close() ?>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <table id="table-spritual" class="table table-bordered">
                                <thead>
                                <tr class="alert-default-danger">
                                    <th class="text-center align-middle border-danger" style="width: 50px">NO</th>
                                    <th class="border-danger">
                                        <span class="pl-2 align-middle">Edit Pilihan Deskripsi Spiritual</span>
                                        <button id="btn1" class="btn btn-sm btn-danger float-right btn-save"
                                                data-jenis="1">Simpan
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($sikap as $skp) :
                                    if ($skp->jenis === '1') :?>
                                        <tr>
                                            <td class="text-center border-danger nomor"><?= $skp->kode ?></td>
                                            <td class="border-danger editable"><?= $skp->sikap ?></td>
                                        </tr>
                                    <?php endif; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table id="table-sosial" class="table table-bordered border-danger">
                                <thead>
                                <tr class="alert-default-danger">
                                    <th class="text-center align-middle border-danger" style="width: 50px">NO</th>
                                    <th class="border-danger">
                                        <span class="pl-2 align-middle">Edit Pilihan Deskripsi Sosial</span>
                                        <button id="btn2" class="btn btn-sm btn-danger float-right btn-save"
                                                data-jenis="2">Simpan
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($sikap as $skp) :
                                    if ($skp->jenis === '2') :?>
                                        <tr>
                                            <td class="text-center border-danger nomor"><?= $skp->kode ?></td>
                                            <td class="border-danger editable"><?= $skp->sikap ?></td>
                                        </tr>
                                    <?php endif; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jexcel/js/jexcel.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jexcel/js/jsuites.js"></script>
<script>
    $(document).ready(function () {
        $('.editable').attr('contentEditable', true);

        $('.btn-save').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            var jenis = $(this).data('jenis');
            var table;
            if (jenis == '1') {
                table = $('#table-spritual');
            } else {
                table = $('#table-sosial');
            }
            const $rows = table.find('tr'), headers = $rows.splice(0, 1);
            var jsonObj = [];
            $rows.each((i, row) => {
                const desk = $(row).find('.editable').text();
                const nomor = $(row).find('.nomor').text();

                let item = {};
                item ["id_sikap"] = '' + jenis + nomor;
                item ["jenis"] = '' + jenis;
                item ["kode"] = nomor;
                item ["sikap"] = desk;

                jsonObj.push(item);
            });

            var form = $('#editsikap').serialize();
            var dataPost = form + "&sikap=" + JSON.stringify(jsonObj);
            console.log(dataPost);

            $.ajax({
                url: base_url + "rapor/savesikap",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log("response:", data);
                    if (data.status) {
                        showSuccessToast('Data berhasil disimpan')
                    } else {
                        showDangerToast('gagal disimpan')
                    }
                }, error: function (xhr, status, error) {
                    console.log("response:", xhr.responseText);
                    showDangerToast('gagal disimpan')
                }
            });
        });

    })
</script>
