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
            <div class="card card-default my-shadow">
                <?= form_open('', array('id' => 'create')) ?>
                <div class="card-header with-border">
                    <h3 class="card-title"><?= $subjudul ?></h3>
                    <button type="submit" class="btn btn-primary btn-sm card-tools">
                        <i class="fa fa-save mr-1"></i>Simpan
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="id_kelas" value="<?= $id_kelas ?>">
                        <?php
                        $inputs = ['Ketua Kelas', 'Wakil Ketua', 'Sekretaris 1', 'Sekretaris 2',
                            'Bendahara 1', 'Bendahara 2', 'Sie Ekstrakurikuler', 'Sie Upacara', 'Sie Olahraga',
                            'Sie Keagamaan', 'Sie Keamanan', 'Sie Ketertiban', 'Sie Kebersihan', 'Sie Keindahan',
                            'Sie Kesehatan', 'Sie Kekeluargaan', 'Sie Humas'];
                        $ids = ['ketua', 'wakil_ketua', 'sekretaris_1', 'sekretaris_2', 'bendahara_1', 'bendahara_2', 'sie_ekstrakurikuler', 'sie_upacara', 'sie_olahraga', 'sie_keagamaan', 'sie_keamanan', 'sie_ketertiban', 'sie_kebersihan', 'sie_keindahan', 'sie_kesehatan', 'sie_kekeluargaan', 'sie_humas'];

                        //var_dump($struktur);
                        foreach ($ids as $key => $value) : ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i
                                                        class="far fa-user mr-2"></i><?= $inputs[$key] ?></span>
                                        </div>
                                        <?php
                                        echo form_dropdown(
                                            $value,
                                            $siswas,
                                            $struktur->$value,
                                            'id="' . $value . '" class="select2 form-control" data-placeholder="Pilih ' . $inputs[$key] . '" required'
                                        ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        ajaxcsrf();

        $('.select2').select2();

        $('#create').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());
            $.ajax({
                url: base_url + "walistruktur/save",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    if (data) {
                        swal.fire({
                            title: "Sukses",
                            text: "Data berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + 'walistruktur';
                            }
                        });
                    } else {
                        swal.fire({
                            title: "ERROR",
                            text: "Data Tidak Tersimpan",
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
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
