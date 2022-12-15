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
                    <h3 class="card-title"><b><?= $subjudul ?></b></h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3 col-4">
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <?php
                                echo form_dropdown('jenis', $jenis, $jenis_selected, 'id="jenis" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-4">
                            <div class="form-group">
                                <label for="jenis">Sesi</label>
                                <?php
                                echo form_dropdown('sesi', $sesi, $sesi_selected, 'id="sesi" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-4">
                            <div class="form-group">
                                <label for="jenis">Ruang</label>
                                <?php
                                echo form_dropdown('ruang', $ruang, $ruang_selected, 'id="ruang" class="form-control"'); ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    if (count($tgl_jadwals) > 0) : ?>
                        <table class="table table-sm table-bordered" id="tbl-pengawas">
                            <thead>
                            <tr>
                                <th style="width: 40px" class="text-center align-middle">No.</th>
                                <th class="text-center align-middle">Hari / Tanggal</th>
                                <th class="text-center align-middle">Mata Pelajaran</th>
                                <th class="text-center align-middle">Sesi</th>
                                <th class="text-center align-middle">Ruang</th>
                                <th class="text-center align-middle">Pengawas</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($tgl_jadwals as $tgl => $jadwal):
                                $listMapel = array_keys($jadwal);
                                $listIdJad = [];
                                if (isset($jadwal[$listMapel[0]])) {
                                    foreach ($jadwal[$listMapel[0]] as $ids) {
                                        array_push($listIdJad, $ids->id_jadwal);
                                    }
                                }
                                ?>
                                <tr>
                                    <td rowspan="<?= count($listMapel) ?>"
                                        class="text-center align-middle"><?= $no ?></td>
                                    <td rowspan="<?= count($listMapel) ?>"
                                        class="text-center align-middle"><?= buat_tanggal(date('D, d M Y', strtotime($tgl))) ?></td>
                                    <td class="text-center align-middle jadwal" data-id="<?= implode(',', $listIdJad) ?>"><?= $listMapel[0] ?></td>
                                    <td class="text-center align-middle"><?= $sesi[$sesi_selected] ?></td>
                                    <td class="text-center align-middle"><?= $ruang[$ruang_selected] ?></td>
                                    <td class="text-center align-middle">
                                        <?php
                                        $sel = '';
                                        if (isset($listMapel[0]) && isset($jadwal[$listMapel[0]]) && isset($jadwal[$listMapel[0]][0])) {
                                            $idJad = $jadwal[$listMapel[0]][0]->id_jadwal;
                                            $sel = isset($pengawas[$idJad]) &&
                                            isset($pengawas[$idJad][$ruang_selected]) &&
                                            isset($pengawas[$idJad][$ruang_selected][$sesi_selected])
                                                ? explode(',', $pengawas[$idJad][$ruang_selected][$sesi_selected]->id_guru) : [];
                                        }
                                        echo form_dropdown(
                                            'pengawas[]',
                                            $gurus,
                                            $sel,
                                            'style="width: 100%" class="select2 form-control form-control-sm pengawas" multiple="multiple" data-placeholder="Pilih Pengawas" required'
                                        ); ?>
                                    </td>
                                </tr>
                                <?php for ($i = 1; $i < count($listMapel); $i++) :
                                $listIdJad = [];
                                foreach ($jadwal[$listMapel[$i]] as $ids) {
                                    array_push($listIdJad, $ids->id_jadwal);
                                }
                                ?>
                                <tr>
                                    <td class="text-center align-middle jadwal" data-id="<?= implode(',', $listIdJad) ?>"><?= $listMapel[$i] ?></td>
                                    <td class="text-center align-middle"><?= $sesi[$sesi_selected] ?></td>
                                    <td class="text-center align-middle"><?= $ruang[$ruang_selected] ?></td>
                                    <td class="text-center align-middle">
                                        <?php
                                        $idJad = $jadwal[$listMapel[$i]][0]->id_jadwal;
                                        $sel = isset($pengawas[$idJad]) &&
                                        isset($pengawas[$idJad][$ruang_selected]) &&
                                        isset($pengawas[$idJad][$ruang_selected][$sesi_selected])
                                            ? explode(',', $pengawas[$idJad][$ruang_selected][$sesi_selected]->id_guru) : [];
                                        echo form_dropdown(
                                            'pengawas[]',
                                            $gurus,
                                            $sel,
                                            'style="width: 100%" class="select2 form-control form-control-sm pengawas" multiple="multiple" data-placeholder="Pilih Pengawas" required'
                                        ); ?>
                                    </td>
                                </tr>
                            <?php
                            endfor;
                                $no++; endforeach; ?>
                            </tbody>
                        </table>
                        <?= form_open('', array('id' => 'savepengawas')) ?>
                        <button type="submit" class="btn btn-primary card-tools mt-3 float-right">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                        <?= form_close() ?>
                    <?php else: ?>
                        <div></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url() ?>/assets/app/js/jquery.rowspanizer.js"></script>
<script>
    var rSelected = <?= $ruang_selected == null ? 0 : 1?>;
    var sSelected = <?= $sesi_selected == null ? 0 : 1?>;
    $(document).ready(function () {
        ajaxcsrf();
        $("#tbl").rowspanizer({columns: [0, 1, 2]});
        $('.select2').select2();
        var opsiJenis = $("#jenis");
        var opsiRuang = $("#ruang");
        var opsiSesi = $("#sesi");

        var selectedr = rSelected === 0 ? "selected='selected'" : "";
        opsiRuang.prepend("<option value='' " + selectedr + ">Pilih Ruang</option>");

        var selecteds = sSelected === 0 ? "selected='selected'" : "";
        opsiSesi.prepend("<option value='' " + selecteds + ">Pilih Sesi</option>");


        opsiJenis.change(function () {
            getAllJadwal();
        });
        opsiRuang.change(function () {
            getAllJadwal();
        });
        opsiSesi.change(function () {
            getAllJadwal();
        });

        function getAllJadwal() {
            var jenis = opsiJenis.val();
            var ruang = opsiRuang.val();
            var sesi = opsiSesi.val();
            var kosong = ruang == '' || sesi == "" || jenis == "";
            var url = base_url + 'cbtpengawas?jenis=' + jenis + '&ruang=' + ruang + '&sesi=' + sesi;
            console.log(url);
            if (!kosong) {
                window.location.href = url;
            }
        }

        $('#simpanpengawas').on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            var kosong = ruang == '' || sesi == "" || jenis == "";
            if (kosong) return;

            const $rows1 = $('#tbl').find('tr'), headers1 = $rows1.splice(0, 1);
            var jsonObj = [];
            $rows1.each((i, row) => {
                const ruang = opsiRuang.val();
                const sesi = opsiSesi.val();
                const jadwal = $(row).find('.jadwal').data('id');
                const guru = $(row).find('.pengawas').val();

                let item = {};
                item ["jadwal"] = jadwal;
                item ["ruang"] = ruang;
                item ["sesi"] = sesi;
                item ["guru"] = guru;

                jsonObj.push(item);
            });


            var dataPost = $(this).serialize() + "&data=" + JSON.stringify(jsonObj);
            //console.log('table 2', dataPost);
            /*
            $.ajax({
                url: base_url + "cbtpengawas/savepengawas",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log("response:", data);
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            html: "Pengawas ujian berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    } else {
                        showDangerToast('gagal disimpan')
                    }
                }, error: function (xhr, status, error) {
                    console.log("response:", xhr.responseText);
                    showDangerToast('gagal disimpan')
                }
            });
            */
        });

        $('#savepengawas').on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            var kosong = ruang == '' || sesi == "" || jenis == "";
            if (kosong) return;

            const $rows1 = $('#tbl-pengawas').find('tr'), headers1 = $rows1.splice(0, 1);
            var jsonObj = [];
            $rows1.each((i, row) => {
                const ruang = opsiRuang.val();
                const sesi = opsiSesi.val();
                const jadwal = $(row).find('.jadwal').data('id');
                const guru = $(row).find('.pengawas').val();

                const listIdJadwal = jadwal.split(',');
                for (i=0; i<listIdJadwal.length; i++) {
                    let item = {};
                    item ["jadwal"] = listIdJadwal[i];
                    item ["ruang"] = ruang;
                    item ["sesi"] = sesi;
                    item ["guru"] = guru;

                    jsonObj.push(item);
                }
            });


            var dataPost = $(this).serialize() + "&data=" + JSON.stringify(jsonObj);
            //console.log('table 1', dataPost);
            $.ajax({
                url: base_url + "cbtpengawas/savepengawas",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log("response:", data);
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            html: "Pengawas ujian berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
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
