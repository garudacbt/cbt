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
                    <?= form_close() ?>
                    <?php foreach ($mapel as $key => $mpl) : ?>
                        <div class="card border border-success">
                            <div class="card-header alert-default-success">
                                <b><?= $mpl ?></b>
                            </div>
                            <div class="card-body">
                                Kelas:
                                <?php foreach ($kelas[$key] as $k => $kls) :
                                    if ($kls['id_kelas'] != null) :?>
                                        <button class="btn btn-outline-success btn-kelas m<?=$key?>" data-mapel="<?= $key ?>"
                                                data-kelas="<?= $kls['id_kelas'] ?>"><?= $kls['nama_kelas'] ?></button>
                                    <?php endif; endforeach; ?>
                                <div id="alert<?= $key ?>" class="mt-3 alert alert-default-warning align-content-center"
                                     role="alert">
                                    Silahklan pilih kelas
                                </div>
                                <div id="konten-kikd<?=$key?>" class="row mt-3">
                                </div>
                            </div>
                            <div class="overlay d-none" id="loading<?= $key ?>">
                                <div class="spinner-grow"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
        console.log(data);
        var html = '<div class="col-md-6"> ' +
            '<table id="table-'+data.mapel+data.kelas+1+'" class="table table-bordered table-sm"> ' +
            '<tr> ' +
            '<th class="text-center align-middle">#</th>' +
            '<th><span class="pl-2 align-middle">Aspek Pengetahuan</span>' +
            '<button id="btn'+data.mapel+data.kelas+'1'+'" class="btn btn-sm btn-primary float-right btn-save" data-asp="1" data-mapel="'+data.mapel+'" data-kelas="'+data.kelas+'">Simpan</button></th> ' +
            '</tr> ';
        for (let i = 0; i < 8; i++) {
            var asp1 = data.kikd[1];
            var idPeng;
            if (asp1[data.mapel+data.kelas+'1'+(i+1)] != null) {
                idPeng = asp1[data.mapel+data.kelas+'1'+(i+1)].materi_kikd;
            } else {
                idPeng = '';
            }
            html += '<tr data-id="'+data.mapel+data.kelas+1+(i+1)+'"> ' +
                '<td class="text-center" style="width: 40px">P-'+(i+1)+'</td> ' +
                '<td class="editable text-primary">'+idPeng+'</td> ' +
                '</tr> ';
        }
        html += '</table> ' +
            '</div> ' +
            '<div class="col-md-6"> ' +
            '<table id="table-'+data.mapel+data.kelas+2+'" class="table table-bordered table-sm"> ' +
            '<tr> ' +
            '<th class="text-center align-middle">#</th>' +
            '<th><span class="pl-2 align-middle">Aspek Keterampilan </span>' +
            '<button id="btn'+data.mapel+data.kelas+'2'+'" class="btn btn-sm btn-primary float-right btn-save" data-asp="2" data-mapel="'+data.mapel+'" data-kelas="'+data.kelas+'">Simpan</button></th> ' +
            '</tr>';
        for (let j = 0; j < 8; j++) {
            var asp2 = data.kikd[2];
            var idKetr;
            if (asp2[data.mapel+data.kelas+'2'+(j+1)] != null) {
                idKetr = asp2[data.mapel+data.kelas+'2'+(j+1)].materi_kikd;
            } else {
                idKetr = '';
            }
            html += '<tr data-id="'+data.mapel+data.kelas+2+(j+1)+'"> ' +
                '<td class="text-center" style="width: 40px">K-'+(j+1)+'</td> ' +
                '<td class="editable text-primary">'+idKetr+'</td> ' +
                '</tr>';
        }
        html += '</table> </div>';

        $('#alert' + data.mapel).addClass('d-none');
        $('#konten-kikd' + data.mapel).html(html);

        $('.editable').attr('contentEditable',true);

        $('.btn-save').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();
            var id_mapel = $(this).data('mapel');
            var id_kelas = $(this).data('kelas');
            var asp = $(this).data('asp');
            var id_kikd = ''+id_mapel+id_kelas+asp;
            console.log(id_kikd);
            if (this.id == 'btn'+id_kikd) {
                const $rows = $('#table-' + id_kikd).find('tr'), headers = $rows.splice(0, 1);
                var jsonObj = [];
                var no = 1;
                $rows.each((i, row) => {
                    const materi_kikd = $(row).find('.editable').text();

                    let item = {};
                    item ["id_kikd"] = '' + id_kikd + no;
                    item ["id_mapel_kelas"] = '' + id_mapel + id_kelas;
                    item ["aspek"] = asp;
                    item ["materi_kikd"] = materi_kikd;

                    jsonObj.push(item);
                    no++;
                });

                var form = $('#editkikd').serialize();
                var dataPost = form + "&indikator=" + JSON.stringify(jsonObj);
                console.log(dataPost);

                $.ajax({
                    url: base_url + "rapor/savekikd",
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
            }
        });

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

            $('.m'+mapel).removeClass('active');
            $(this).toggleClass('active');
        });
    });
</script>