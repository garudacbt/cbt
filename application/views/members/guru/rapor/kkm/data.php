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
                    <div class="shadow alert alert-default-info align-content-center" role="alert">
                        - Total BOBOT harus 100
                        <br>
                        - Jangan lupa untuk menyimpan perubahan
                    </div>
                    <?php if (count($mapel) > 0) :
                        foreach ($mapel as $key => $mpl) : ?>
                            <div class="card border border-primary">
                                <div class="card-header alert-default-secondary">
                                    <div class="card-title">
                                        <b><?= $mpl ?></b>
                                    </div>
                                    <div class="card-tools">
                                        <button id="btn<?= $key ?>" type="button"
                                                class="btn btn-sm btn-primary btn-save"
                                                disabled><i
                                                    class="fa fa-save"></i> <span class="d-none d-sm-inline-block ml-1">Simpan Bobot dan KKM</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    Kelas:
                                    <?php
                                    if (isset($kelas[$key]) && count($kelas[$key]) > 0) :
                                    foreach ($kelas[$key] as $k => $kls) :
                                        if ($kls['id_kelas'] != null) :?>
                                            <button class="btn btn-outline-success btn-kelas m<?= $key ?>"
                                                    data-mapel="<?= $key ?>"
                                                    data-kelas="<?= $kls['id_kelas'] ?>"><?= $kls['nama_kelas'] ?></button>
                                        <?php endif; endforeach; endif; ?>
                                    <div id="alert<?= $key ?>"
                                         class="mt-3 alert alert-default-warning align-content-center"
                                         role="alert">
                                        Silahklan pilih kelas
                                    </div>
                                    <div id="konten-kkm<?= $key ?>" class="mt-3">
                                    </div>
                                </div>
                                <div class="overlay d-none" id="loading<?= $key ?>">
                                    <div class="spinner-grow"></div>
                                </div>
                            </div>
                        <?php endforeach; ?><?php else: ?>
                        <div class="shadow alert alert-default-warning align-content-center" role="alert">
                            Tidak ada Mata Pelajaran diampu
                            <br> Hubungi Admin
                        </div>
                    <?php endif; ?>
                    <?php
                    if (count($ekstra) > 0) : ?>
                    <hr>
                    <p><b>Ekstrakurikuler</b></p>
                    <div class="row">
                        <?php
                        foreach ($ekstra as $key => $eks) : ?>
                            <div class="col-md-6">
                                <div class="card border border-primary">
                                    <div class="card-header alert-default-secondary">
                                        <div class="card-title">
                                            <b><?= $eks ?></b>
                                        </div>
                                        <div class="card-tools">
                                            <button id="btnekstra<?= $key ?>" type="button"
                                                    class="btn btn-sm btn-primary btnekstra-save" disabled><i
                                                        class="fa fa-save"></i> <span
                                                        class="d-none d-sm-inline-block ml-1">Simpan KKM</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        Kelas:
                                        <?php foreach ($kelas_ekstra[$key] as $k => $kls) :
                                            if ($kls['id_kelas'] != null) :?>
                                                <button class="btn btn-outline-success btn-kelas-ekstra e<?= $key ?>"
                                                        data-ekstra="<?= $key ?>"
                                                        data-kelas="<?= $kls['id_kelas'] ?>"><?= $kls['nama_kelas'] ?></button>
                                            <?php endif; endforeach; ?>
                                        <div id="alert-ekstra<?= $key ?>"
                                             class="mt-3 alert alert-default-warning align-content-center"
                                             role="alert">
                                            Silahklan pilih kelas
                                        </div>
                                        <div id="konten-kkm-ekstra<?= $key ?>" class="mt-3">
                                        </div>
                                    </div>
                                    <div class="overlay d-none" id="loading-ekstra<?= $key ?>">
                                        <div class="spinner-grow"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    var url = '';

    function createView(data) {
        var setting = data.setting;
        if (setting == null) {
            $('#alert' + data.mapel).text("KKM belum diatur oleh admin");
            return;
        }
        var kkm = data.kkm;
        var idkkm = '' + data.mapel + data.kelas + data.tp + data.smt + '1';  // 1 = untuk mapel utama
        var isikkm = 0;
        var isibobotph = 0;
        var isibobotpts = 0;
        var isibobotpas = 0;
        var isibeban = 0;

        var kkmTunggal = setting.kkm_tunggal == "1";
        var disabled = kkmTunggal ? 'readonly' : '';
        if (kkmTunggal) {
            isikkm = setting.kkm;
            isibobotph = parseInt(setting.bobot_ph);
            isibobotpts = parseInt(setting.bobot_pts);
            isibobotpas = parseInt(setting.bobot_pas);

            if (kkm != null && kkm.beban_jam != null) {
                isibeban = parseInt(kkm.beban_jam);
            }
        } else {
            if (kkm != null && kkm.kkm != null) {
                isikkm = kkm.kkm;
                isibobotph = parseInt(kkm.bobot_ph);
                isibobotpts = parseInt(kkm.bobot_pts);
                isibobotpas = parseInt(kkm.bobot_pas);
            }
            if (kkm != null && kkm.beban_jam != null) {
                isibeban = parseInt(kkm.beban_jam);
            }
        }

        var total1 = (isibobotph + isibobotpts + isibobotpas);
        var html = '<form action="" id="editkkm' + idkkm + '" method="post" accept-charset="utf-8">' +
            '<input type="hidden" name="id_kkm" value="' + idkkm + '"> ' +
            '<input type="hidden" name="id_mapel" value="' + data.mapel + '"> ' +
            '<input type="hidden" name="id_kelas" value="' + data.kelas + '"> ' +
            '<input type="hidden" name="jenis_kkm" value="1"> ' +
            '<input type="hidden" value="<?= $this->security->get_csrf_hash() ?>" name="<?= $this->security->get_csrf_token_name() ?>"> ' +
            '<div class="row" id="bobot1' + idkkm + '"> ' + //1

            '<div class="col-3 mb-3"> ' +
            '<label>BOBOT PH</label> ' +
            '<input id="ph' + idkkm + '" name="bobot_ph" value="' + isibobotph + '" type="number" class="form-control form-control-sm" required ' + disabled + '> ' +
            '</div> ' +

            '<div class="col-3 mb-3"> ' +
            '<label>PTS</label> ' +
            '<input id="pts' + idkkm + '" name="bobot_pts" value="' + isibobotpts + '" type="number" class="form-control form-control-sm" required ' + disabled + '> ' +
            '</div> ' +

            '<div class="col-3 mb-3"> ' +
            '<label>PAS</label> ' +
            '<input id="pas' + idkkm + '" name="bobot_pas" value="' + isibobotpas + '" type="number" class="form-control form-control-sm" required ' + disabled + '> ' +
            '</div> ' +

            '<div class="col-3 mb-3"> ' +
            '<label>Total</label> ' +
            '<input id="total1' + idkkm + '" class="form-control form-control-sm" value="' + total1 + '" disabled> ' +
            '</div> ' +

            '</div> <hr> ' + //1

            '<div class="row" id="kkm' + idkkm + '"> ' + //3

            '<div class="col-md-4 col-4 mb-3"> ' +
            '<label>Kretia Ketuntasan Minimal:</label> ' +
            '<input id="isikkm' + idkkm + '" name="kkm" value="' + isikkm + '" type="number" class="form-control form-control-sm" required ' + disabled + '> ' +
            '<br><label>Beban Jam:</label> ' +
            '<input name="beban" value="' + isibeban + '" type="number" class="form-control form-control-sm" required> ' +
            '</div> ' +

            '<div class="col-md-2 col-1 mb-3"></div> ' +

            '<div class="col-md-4 col-7 mb-3"> ' +
            '<label>Predikat:</label> ' +

            '<div class="row"> ' +
            '<div class="col-3"><input class="form-control form-control-sm mb-2 text-center" value="A" disabled></div> ' +
            '<div class="col-1">=</div> ' +
            '<div class="col-3"><input id="amin' + idkkm + '" class="form-control form-control-sm mb-2 text-center" disabled></div> ' +
            '<div class="col-1">~</div> ' +
            '<div class="col-3"><input class="form-control form-control-sm mb-2 text-center p-0" value="100" disabled></div> ' +
            '</div> ' +

            '<div class="row"> ' +
            '<div class="col-3"><input class="form-control form-control-sm mb-2 text-center" value="B" disabled></div> ' +
            '<div class="col-1">=</div> ' +
            '<div class="col-3"><input id="bmin' + idkkm + '" class="form-control form-control-sm mb-2 text-center" disabled></div> ' +
            '<div class="col-1">~</div> ' +
            '<div class="col-3"><input id="bmax' + idkkm + '" class="form-control form-control-sm mb-2 text-center" disabled></div> ' +
            '</div> ' +

            '<div class="row"> ' +
            '<div class="col-3"><input class="form-control form-control-sm mb-2 text-center" value="C" disabled></div> ' +
            '<div class="col-1">=</div> ' +
            '<div class="col-3"><input id="cmin' + idkkm + '" class="form-control form-control-sm mb-2 text-center" disabled></div> ' +
            '<div class="col-1">~</div> ' +
            '<div class="col-3"><input id="cmax' + idkkm + '" class="form-control form-control-sm mb-2 text-center" disabled></div> ' +
            '</div> ' +

            '<div class="row"> ' +
            '<div class="col-3"><input class="form-control form-control-sm mb-2 text-center" value="D" disabled></div> ' +
            '<div class="col-1">=</div> ' +
            '<div class="col-3"><input class="form-control form-control-sm mb-2 text-center" value="0" disabled></div> ' +
            '<div class="col-1">~</div> ' +
            '<div class="col-3"><input id="dmax' + idkkm + '" class="form-control form-control-sm mb-2 text-center" disabled></div> ' +
            '</div> ' +

            '</div> ' +
            '</div>' +
            '</form>';

        $('#alert' + data.mapel).addClass('d-none');
        $('#konten-kkm' + data.mapel).html(html);
        $('#btn' + data.mapel).removeAttr('disabled');

        var valBobotph = $('#ph' + idkkm);
        var valBobotpts = $('#pts' + idkkm);
        var valBobotpas = $('#pas' + idkkm);
        var valisikkm = $('#isikkm' + idkkm);

        function onChangeValueBobot1() {
            isibobotph = parseInt(valBobotph.val());
            isibobotpts = parseInt(valBobotpts.val());
            isibobotpas = parseInt(valBobotpas.val());
            $('#total1' + idkkm).val(isibobotph + isibobotpts + isibobotpas);
        }

        valBobotph.on('change', function () {
            onChangeValueBobot1();
        });
        valBobotpts.on('change', function () {
            onChangeValueBobot1();
        });
        valBobotpas.on('change', function () {
            onChangeValueBobot1();
        });

        function onChangeKkm() {
            var isi = parseInt(valisikkm.val());
            var d = 0;
            var dsd = isi - 1;
            var c = isi;
            var csd = Math.floor(isi + (100 - isi) / 3);
            var b = csd + 1;
            var bsd = Math.floor(b + (100 - b) / 2);
            var a = bsd + 1;
            var asd = 100;

            $('#amin' + idkkm).val(a);
            $('#bmin' + idkkm).val(b);
            $('#bmax' + idkkm).val(bsd);
            $('#cmin' + idkkm).val(c);
            $('#cmax' + idkkm).val(csd);
            $('#dmax' + idkkm).val(dsd);
        }

        valisikkm.on('change', function () {
            onChangeKkm();
        });

        onChangeValueBobot1();
        if (valisikkm.val() > 0) onChangeKkm();

        $(`#editkkm${idkkm}`).on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            console.log($(this).serialize());

            $.ajax({
                url: base_url + "rapor/savekkm",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
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

        $(`#btn${data.mapel}`).on('click', function (e) {
            $(`#editkkm${idkkm}`).submit();
        });

    }

    function createViewEkstra(data) {
        var kkm = data.kkm;
        var idkkm = '' + data.ekstra + data.kelas + data.tp + data.smt + '2'; //2 = untuk mapel ekstra
        var isikkm = 0;

        var setting = data.setting;
        var kkmTunggal = setting.kkm_tunggal == 1;
        var disabled = kkmTunggal ? 'readonly' : '';
        if (kkmTunggal) {
            isikkm = setting.kkm;
        } else {
            isikkm = kkm != null ? kkm.kkm : 0;
        }

        var html = '<form action="" id="editkkmekstra' + idkkm + '" method="post" accept-charset="utf-8">' +
            '<input type="hidden" name="id_kkm" value="' + idkkm + '"> ' +
            '<input type="hidden" name="jenis_kkm" value="2"> ' +
            '<input type="hidden" name="id_mapel" value="' + data.ekstra + '"> ' +
            '<input type="hidden" name="id_kelas" value="' + data.kelas + '"> ' +
            '<input type="hidden" value="<?= $this->security->get_csrf_hash() ?>" name="<?= $this->security->get_csrf_token_name() ?>"> ' +

            '<div class="row" id="kkmekstra' + idkkm + '"> ' + //3

            '<div class="col-12 mb-3"> ' +
            '<label>Kretia Ketuntasan Minimal:</label> ' +
            '<input id="isikkmekstra' + idkkm + '" name="kkm" value="' + isikkm + '" type="number" class="form-control form-control-sm" required ' + disabled + '> ' +
            '</div> ' +

            '<div class="col-md-10 col-8 mb-3"> ' +
            '<label>Predikat:</label> ' +

            '<div class="row"> ' +
            '<div class="col-3"><input class="form-control form-control-sm mb-2 text-center" value="A" disabled></div> ' +
            '<div class="col-1">=</div> ' +
            '<div class="col-3"><input id="aminekstra' + idkkm + '" class="form-control form-control-sm mb-2 text-center" disabled></div> ' +
            '<div class="col-1">~</div> ' +
            '<div class="col-3"><input class="form-control form-control-sm mb-2 text-center p-0" value="100" disabled></div> ' +
            '</div> ' +

            '<div class="row"> ' +
            '<div class="col-3"><input class="form-control form-control-sm mb-2 text-center" value="B" disabled></div> ' +
            '<div class="col-1">=</div> ' +
            '<div class="col-3"><input id="bminekstra' + idkkm + '" class="form-control form-control-sm mb-2 text-center" disabled></div> ' +
            '<div class="col-1">~</div> ' +
            '<div class="col-3"><input id="bmaxekstra' + idkkm + '" class="form-control form-control-sm mb-2 text-center" disabled></div> ' +
            '</div> ' +

            '<div class="row"> ' +
            '<div class="col-3"><input class="form-control form-control-sm mb-2 text-center" value="C" disabled></div> ' +
            '<div class="col-1">=</div> ' +
            '<div class="col-3"><input id="cminekstra' + idkkm + '" class="form-control form-control-sm mb-2 text-center" disabled></div> ' +
            '<div class="col-1">~</div> ' +
            '<div class="col-3"><input id="cmaxekstra' + idkkm + '" class="form-control form-control-sm mb-2 text-center" disabled></div> ' +
            '</div> ' +

            '<div class="row"> ' +
            '<div class="col-3"><input class="form-control form-control-sm mb-2 text-center" value="D" disabled></div> ' +
            '<div class="col-1">=</div> ' +
            '<div class="col-3"><input class="form-control form-control-sm mb-2 text-center" value="0" disabled></div> ' +
            '<div class="col-1">~</div> ' +
            '<div class="col-3"><input id="dmaxekstra' + idkkm + '" class="form-control form-control-sm mb-2 text-center" disabled></div> ' +
            '</div> ' +

            '</div> ' +
            '</div>' +
            '</form>';

        $('#alert-ekstra' + data.ekstra).addClass('d-none');
        $('#konten-kkm-ekstra' + data.ekstra).html(html);
        $('#btnekstra' + data.ekstra).removeAttr('disabled');

        function onChangeKkm() {
            var isi = parseInt(valisikkm.val());
            var d = 0;
            var dsd = isi - 1;
            var c = isi;
            var csd = Math.floor(isi + (100 - isi) / 3);
            var b = csd + 1;
            var bsd = Math.floor(b + (100 - b) / 2);
            var a = bsd + 1;
            var asd = 100;

            $('#aminekstra' + idkkm).val(a);
            $('#bminekstra' + idkkm).val(b);
            $('#bmaxekstra' + idkkm).val(bsd);
            $('#cminekstra' + idkkm).val(c);
            $('#cmaxekstra' + idkkm).val(csd);
            $('#dmaxekstra' + idkkm).val(dsd);
        }

        var valisikkm = $('#isikkmekstra' + idkkm);
        valisikkm.on('change', function () {
            onChangeKkm();
        });

        if (parseInt(valisikkm.val()) > 0) onChangeKkm();

        $(`#editkkmekstra${idkkm}`).on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            console.log($(this).serialize());

            $.ajax({
                url: base_url + "rapor/savekkm",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
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

        $(`#btnekstra${data.ekstra}`).click(function (e) {
            $(`#editkkmekstra${idkkm}`).submit();
        });
    }

    $(document).ready(function () {
        $('.btn-kelas').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            var mapel = $(this).data('mapel');
            var kelas = $(this).data('kelas');

            url = base_url + 'rapor/datakkm/' + mapel + '/' + kelas;
            $('#loading' + mapel).removeClass('d-none');
            setTimeout(function () {
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        console.log(response);
                        createView(response);
                        $('#loading' + mapel).addClass('d-none');
                    }
                });
            }, 500);

            $('.m' + mapel).removeClass('active');
            $(this).toggleClass('active');
        });

        $('.btn-kelas-ekstra').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            var ekstra = $(this).data('ekstra');
            var kelas = $(this).data('kelas');

            url = base_url + 'rapor/datakkmekstra/' + ekstra + '/' + kelas;
            $('#loading-ekstra' + ekstra).removeClass('d-none');
            setTimeout(function () {
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        console.log(response);
                        createViewEkstra(response);
                        $('#loading-ekstra' + ekstra).addClass('d-none');
                    }
                });
            }, 500);

            $('.e' + ekstra).removeClass('active');
            $(this).toggleClass('active');
        });
    });
</script>