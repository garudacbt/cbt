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
                        <!--
                        <div class="col-md-3 col-4">
                            <div class="form-group">
                                <label for="jenis">Ruang</label>
                                <?php
                                echo form_dropdown('ruang', $ruang, '', 'id="ruang" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-4">
                            <div class="form-group">
                                <label for="jenis">Sesi</label>
                                <?php
                                echo form_dropdown('sesi', $sesi, '', 'id="sesi" class="form-control"'); ?>
                            </div>
                        </div>
                        -->
                    </div>

                    <div class="table-responsive">
                        <?php
                        //echo '<pre>';
                        //var_dump($tgl_jadwals);
                        //echo '</pre>';
                        if (count($tgl_jadwals) > 0) :
                            foreach ($tgl_jadwals as $tgl=>$jadwals) :?>
                            <table class="table table-bordered tbl-pengawas">
                                <thead>
                                <tr>
                                    <th class="text-center align-middle">Hari / Tanggal</th>
                                    <th class="text-center align-middle">Ruang</th>
                                    <th class="text-center align-middle">Sesi</th>
                                    <!--
                                    <th class="text-center align-middle">Kelas Peserta</th>
                                    -->
                                    <th class="text-center align-middle">Mata Pelajaran</th>
                                    <th class="text-center align-middle">Pengawas</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($ruangs as $ruang => $sesis) :
                                    foreach ($sesis as $sesi) :
                                        foreach ($jadwals as $idmpl => $jadwal):
                                            $listIdJad = [];
                                            $total_peserta = 0;
                                            foreach ($jadwal as $jdw) {
                                                $listIdJad[] = $jdw->id_jadwal;
                                                $bank_kelass = $jdw->bank_kelas;
                                                foreach ($bank_kelass as $bank_kelas) {
                                                    foreach ($jdw->peserta as $peserta) {
                                                        $cnt = isset($peserta[$ruang]) && isset($peserta[$ruang][$sesi->sesi_id]) ?
                                                            count($peserta[$ruang][$sesi->sesi_id]) : 0;
                                                        if ($bank_kelas['kelas_id'] != null && $cnt > 0) {
                                                            $total_peserta += $cnt;
                                                        }
                                                    }
                                                }
                                            }
                                            if ($total_peserta > 0) :
                                            ?>
                                            <tr>
                                                <td class="text-center align-middle"><?= buat_tanggal(date('D, d M Y', strtotime($jadwal[0]->tgl_mulai))) ?></td>
                                                <td class="text-center align-middle"><?= $sesi->nama_ruang ?></td>
                                                <td class="text-center align-middle"><?= $sesi->nama_sesi ?></td>
                                                <td class="text-center align-middle jadwal"
                                                    data-ruang="<?=$ruang?>" data-sesi="<?=$sesi->sesi_id?>"
                                                    data-id="[<?= implode(',', $listIdJad) ?>]"><?= $jadwal[0]->nama_mapel ?></td>
                                                <td class="text-center align-middle">
                                                    <?php
                                                    $sel = '';
                                                    $idJad = $jadwal[0]->id_jadwal;
                                                    $sel = isset($pengawas[$idJad]) &&
                                                    isset($pengawas[$idJad][$ruang]) &&
                                                    isset($pengawas[$idJad][$ruang][$sesi->sesi_id])
                                                        ? explode(',', $pengawas[$idJad][$ruang][$sesi->sesi_id]->id_guru) : [];
                                                    echo form_dropdown(
                                                        'pengawas[]',
                                                        $gurus,
                                                        $sel,
                                                        'style="width: 100%" class="select2 form-control form-control-sm pengawas" multiple="multiple" data-placeholder="Pilih Pengawas" required'
                                                    ); ?>
                                                </td>
                                            </tr>
                                        <?php endif; endforeach; endforeach; endforeach;?>
                                </tbody>
                            </table>
                        <?php endforeach; ?>
                            <?= form_open('', array('id' => 'savepengawas')) ?>
                            <button type="submit" class="btn btn-primary card-tools mb-3 mt-3 float-right">
                                <i class="fas fa-save mr-2"></i>Simpan
                            </button>
                            <?= form_close() ?>
                        <?php else: ?>
                            <div></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url() ?>/assets/app/js/jquery.rowspanizer.js"></script>
<script>
    var rSelected = <?= isset($ruang_selected) && $ruang_selected == null ? 0 : 1?>;
    var sSelected = <?= isset($sesi_selected) && $sesi_selected == null ? 0 : 1?>;
    $(document).ready(function () {
        ajaxcsrf();
        $(".tbl-pengawas").rowspanizer({columns: [0,1,2]});
        $('.select2').select2();
        var opsiJenis = $("#jenis");
        //var opsiRuang = $("#ruang");
        //var opsiSesi = $("#sesi");

        /*
        var selectedr = rSelected === 0 ? "selected='selected'" : "";
        opsiRuang.prepend("<option value='' " + selectedr + ">Pilih Ruang</option>");

        var selecteds = sSelected === 0 ? "selected='selected'" : "";
        opsiSesi.prepend("<option value='' " + selecteds + ">Pilih Sesi</option>");
         */


        opsiJenis.change(function () {
            getAllJadwal();
        });
        /*
        opsiRuang.change(function () {
            getAllJadwal();
        });
        opsiSesi.change(function () {
            getAllJadwal();
        });
         */

        function getAllJadwal() {
            var jenis = opsiJenis.val();
            //var ruang = opsiRuang.val();
            //var sesi = opsiSesi.val();
            var kosong = jenis == "";// || ruang == '' || sesi == "";
            var url = base_url + 'cbtpengawas?jenis=' + jenis;// + '&ruang=' + ruang + '&sesi=' + sesi;
            console.log(url);
            if (!kosong) {
                window.location.href = url;
            }
        }

        $('#savepengawas').on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            var jenis = opsiJenis.val();
            var kosong = jenis == ""; //ruang == '' || sesi == "" ||
            if (kosong) return;

            const $tables = $('.tbl-pengawas');
            var jsonObj = [];
            $tables.each((ind, tbl) => {
                const $rows1 = $(tbl).find('tr'), headers1 = $rows1.splice(0, 1);
                $rows1.each((i, row) => {
                    const ruang = $(row).find('.jadwal').data('ruang');//opsiRuang.val();
                    const sesi = $(row).find('.jadwal').data('sesi');//opsiSesi.val();
                    const jadwal = $(row).find('.jadwal').data('id');
                    const guru = $(row).find('.pengawas').val();

                    for (i = 0; i < jadwal.length; i++) {
                        let item = {};
                        item ["jadwal"] = jadwal[i];
                        item ["ruang"] = ruang;
                        item ["sesi"] = sesi;
                        item ["guru"] = guru;

                        jsonObj.push(item);
                    }
                });
            });

            var dataPost = $(this).serialize() + "&data=" + JSON.stringify(jsonObj);
            //console.log('table', dataPost);
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
