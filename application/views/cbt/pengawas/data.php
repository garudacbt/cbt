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
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <?php
                                echo form_dropdown('jenis', $jenis, $jenis_selected, 'id="jenis" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="jenis">Sesi</label>
                                <?php
                                echo form_dropdown('sesi', $sesi, $sesi_selected, 'id="sesi" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="jenis">Ruang</label>
                                <?php
                                echo form_dropdown('ruang', $ruang, $ruang_selected, 'id="ruang" class="form-control"'); ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    //echo '<pre>';
                    //var_dump($ruang_sesi);
                    //var_dump($jadwals);
                    //echo '</pre>';
                    if (count($jadwals) > 0) : ?>
                    <table class="table table-sm table-bordered" id="tbl">
                        <thead>
                        <tr>
                            <th style="width: 40px" class="text-center align-middle">No.</th>
                            <th class="text-center align-middle">Hari / Tanggal</th>
                            <th class="text-center align-middle">Mata Pelajaran</th>
                            <th class="text-center align-middle">Kelas</th>
                            <th class="text-center align-middle">Sesi</th>
                            <th class="text-center align-middle">Ruang</th>
                            <th class="text-center align-middle">Pengawas</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($jadwals as $jadwal):
                            if (isset($ruang_sesi[$sesi_selected]) && isset($ruang_sesi[$sesi_selected][$ruang_selected])) :
                            $klss = unserialize($jadwal->bank_kelas);
                            $kkl = '';
                            foreach ($klss as $kls) {
                                if (isset($kelas[$kls['kelas_id']]) && isset($ruang_sesi[$sesi_selected][$ruang_selected][$kls['kelas_id']])) {
                                    $kkl .= '<span class="badge badge-info">'.$kelas[$kls['kelas_id']].'</span> ';
                                }
                            }

                            if ($kkl != '') :
                            ?>

                        <tr>
                            <td class="text-center align-middle jadwal" data-id="<?= $jadwal->id_jadwal ?>"><?=$no?></td>
                            <td class="text-center align-middle"><?= buat_tanggal(date('D, d M Y', strtotime($jadwal->tgl_mulai))) ?></td>
                            <td class="text-center align-middle"><?= $jadwal->nama_mapel ?></td>
                            <td class="text-center align-middle"><?=$kkl?></td>
                            <td class="text-center align-middle"><?=$sesi[$sesi_selected]?></td>
                            <td class="text-center align-middle"><?=$ruang[$ruang_selected]?></td>
                            <td class="text-center align-middle">
                                <?php
                                $sel = isset($pengawas[$jadwal->id_jadwal]) &&
                                isset($pengawas[$jadwal->id_jadwal][$ruang_selected]) &&
                                isset($pengawas[$jadwal->id_jadwal][$ruang_selected][$sesi_selected])
                                    ? explode(',', $pengawas[$jadwal->id_jadwal][$ruang_selected][$sesi_selected]->id_guru) : [];
                                echo form_dropdown(
                                'pengawas[]',
                                $gurus,
                                $sel,
                                'style="width: 100%" class="select2 form-control form-control-sm pengawas" multiple="multiple" data-placeholder="Pilih Pengawas" required'
                                ); ?>
                            </td>
                        </tr>
                        <?php $no++; endif; endif; endforeach; ?>
                        </tbody>
                    </table>
                        <?= form_open('', array('id' => 'simpanpengawas')) ?>
                        <button type="submit" class="btn btn-primary card-tools mt-3 float-right">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                        <?= form_close() ?>
                    <?php else: ?>
                    <?php endif;
                    //echo '<pre>';
                    //var_dump($pengawas);
                    //echo '</pre>';
                    ?>

                </div>
            </div>
        </div>
    </section>
</div>
<script>
    var rSelected = <?= $ruang_selected == null ? 0 : 1?>;
    var sSelected = <?= $sesi_selected == null ? 0 : 1?>;
    $(document).ready(function () {
        ajaxcsrf();
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
            console.log(dataPost);

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
