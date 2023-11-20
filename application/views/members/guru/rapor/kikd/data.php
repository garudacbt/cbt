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
                <div class="card-header py-3">
                    <div class="card-title">
                        <h6> <?= $subjudul ?></h6>
                    </div>
                    <div class="card-tools">
                        <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-default"><i
                                    class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-info align-content-center" role="alert">
                        - Penulisan ringkasan KD/indikator KD, max 70 huruf
                        <br>
                        - Klik pada tiap teks untuk mengedit materi
                        <br>
                        - Jangan lupa untuk menyimpan perubahan ringkasan materi
                    </div>
                    <?= form_open('', array('id' => 'editkikd')) ?>
                    <?php foreach ($mapel as $key => $mpl) : ?>
                        <div class="card border border-success">
                            <div class="card-header alert-default-success">
                                <b><?= $mpl ?></b>
                                <button type="submit" class="card-tools btn btn-sm btn-primary" disabled><i
                                            class="fa fa-save"></i> Simpan
                                </button>
                            </div>
                            <div class="card-body">
                                <span><b>Kelas:</b></span><br>
                                <?php
                                if (isset($kelas[$key]) && count($kelas[$key]) > 0) :
                                foreach ($kelas[$key] as $k => $kls) :
                                    if ($kls['id_kelas'] != null) :?>
                                        <button class="btn btn-outline-success btn-kelas m<?= $key ?>"
                                                data-mapel="<?= $key ?>"
                                                data-kelas="<?= $kls['id_kelas'] ?>"><?= $kls['nama_kelas'] ?></button>
                                    <?php endif; endforeach; endif; ?>
                                <div id="alert<?= $key ?>" class="mt-3 alert alert-default-warning align-content-center"
                                     role="alert">
                                    Silahklan pilih kelas
                                </div>
                                <div id="konten-kikd<?= $key ?>" class="row mt-3">
                                </div>
                            </div>
                            <div class="overlay d-none" id="loading<?= $key ?>">
                                <div class="spinner-grow"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    var arrmapel = JSON.parse('<?= json_encode($mapel)?>');
    var arrkelas = JSON.parse('<?= json_encode($kelas)?>');
    var url = '';

    function refreshStatus(mapel) {
        $('#loading' + mapel).removeClass('d-none');
        setTimeout(function () {
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    //console.log(response);
                    createView(response);
                    $('#loading' + mapel).addClass('d-none');
                }
            });
        }, 500);
    }

    function createView(data) {
        //console.log(data);
        var html = '<div class="col-md-6"> ' +
            '<table id="table-' + data.mapel + data.kelas + 1 + '" class="table table-bordered"> ' +
            '<tr> ' +
            '<th class="text-center align-middle">#</th>' +
            '<th><span class="pl-2 align-middle">Aspek Pengetahuan</span>' +
            '</th></tr> ';
        for (let i = 0; i < 8; i++) {
            var asp1 = data.kikd[1];
            var idPeng;
            if (asp1[data.mapel + data.kelas + '1' + (i + 1)] != null) {
                idPeng = asp1[data.mapel + data.kelas + '1' + (i + 1)].materi_kikd;
            } else {
                idPeng = '';
            }
            var mapel1 = data.mapel + '';
            var kls1 = data.kelas + '';
            var aspk1 = '1';
            var id_mapel_kelas1 = mapel1 + kls1;
            var id_kikd1 = mapel1 + kls1 + aspk1 + (i + 1);
            html += '<tr> ' +
                '<td class="text-center" style="width: 40px">P-' + (i + 1) + '</td> ' +
                '<td class="editable text-primary">' +
                '<textarea name="materi[1][' + id_mapel_kelas1 + '][' + id_kikd1 + ']"' +
                ' placeholder="Place some text here" style="width:100%;">' + idPeng + '</textarea>' +
                '</td></tr>';
        }
        html += '</table> ' +
            '</div> ' +
            '<div class="col-md-6"> ' +
            '<table id="table-' + data.mapel + data.kelas + 2 + '" class="table table-bordered"> ' +
            '<tr> ' +
            '<th class="text-center align-middle">#</th>' +
            '<th><span class="pl-2 align-middle">Aspek Keterampilan </span>' +
            '</th></tr>';
        for (let j = 0; j < 8; j++) {
            var asp2 = data.kikd[2];
            var idKetr;
            if (asp2[data.mapel + data.kelas + '2' + (j + 1)] != null) {
                idKetr = asp2[data.mapel + data.kelas + '2' + (j + 1)].materi_kikd;
            } else {
                idKetr = '';
            }
            var mapel = data.mapel + '';
            var kls = data.kelas + '';
            var aspk = '2';
            var id_mapel_kelas = mapel + kls;
            var id_kikd = mapel + kls + aspk + (j + 1);

            html += '<tr> ' +
                '<td class="text-center" style="width: 40px">K-' + (j + 1) + '</td> ' +
                '<td class="editable text-primary">' +
                '<textarea name="materi[2][' + id_mapel_kelas + '][' + id_kikd + ']"' +
                ' placeholder="Place some text here" style="width:100%;">' + idKetr + '</textarea>' +
                '</td></tr>';
        }
        html += '</table> </div>';

        $('#alert' + data.mapel).addClass('d-none');
        $('#konten-kikd' + data.mapel).html(html);
        $('.btn').removeAttr('disabled');

        /*
        $('.editable').attr('contentEditable',true);
         */
    }

    $(document).ready(function () {
        $('.btn-kelas').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            var mapel = $(this).data('mapel');
            var kelas = $(this).data('kelas');

            url = base_url + 'rapor/datakikd/' + mapel + '/' + kelas;
            refreshStatus(mapel);

            $('.m' + mapel).removeClass('active');
            $(this).toggleClass('active');
        });

        $('#editkikd').submit('click', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();
            //console.log($(this).serialize());

            swal.fire({
                title: "Menyimpan",
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
                url: base_url + "rapor/savekikd",
                type: "POST",
                data: $(this).serialize(),
                success: function (data) {
                    //console.log("response:", data);
                    if (data.status) {
                        //showSuccessToast('Data berhasil disimpan')
                        swal.fire({
                            title: "Sukses",
                            html: "Indikator penilaian berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        })
                    } else {
                        //showDangerToast('gagal disimpan')
                        swal.fire({
                            title: "Error",
                            html: "Gagal menyimpan",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        })
                    }
                }, error: function (xhr, status, error) {
                    console.log("response:", xhr.responseText);
                    //showDangerToast('gagal disimpan')
                    swal.fire({
                        title: "Error",
                        html: "Gagal menyimpan",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    })
                }
            });
        });
    });
</script>
