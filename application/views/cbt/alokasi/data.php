<?php
function date_sort($a, $b)
{
    return strtotime($a) - strtotime($b);
}

$allowedDates = [];
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
                <?php
                $arr = [];
                foreach ($jadwals as $key => $item) {
                    $arr[$item->tgl_mulai]['level'] = $item->bank_level;
                    $arr[$item->tgl_mulai]['jadwal'][] = $item;
                }

                ksort($arr, SORT_ASC);
                $allowedDates = array_keys($arr);

                //echo '<pre>';
                //var_dump($arr);
                //echo '</pre>';
                ?>
                <div class="card-header">
                    <h3 class="card-title"><b><?= $subjudul ?></b></h3>
                </div>
                <div class="card-body">
                    <!--<p><b>Alokasi Jadwal <?= $jenis[$jenis_selected] ?></b></p>-->
                    <div class="alert alert-default-info shadow align-content-center" role="alert">
                        <strong>Catatan!</strong>
                        <ol>
                            <li>
                                Mengatur berapa menit jadwal ujian akan aktif setelah sesi dimulai
                            </li>
                            <li>
                                Contoh <b>Menit ke</b> 90, maka jadwal mapel akan aktif 90 menit setelah Mapel pertama dimulai
                            </li>
                            <li>
                                Jika semua <b>Menit ke</b> diatur ke 0 maka semua jadwal akan bisa dikerjakan oleh siswa
                            </li>
                            <li>
                                halaman ini berlaku jika semua jadwal telah diaktifkan
                            </li>
                            <li>
                                Jika halaman ini tidak diatur/tidak disimpan, maka jadwal ujian mengikuti aturan di MENU <b>JADWAL</b>
                            </li>
                        </ol>
                    </div>
                    <br>

                    <div class="row mb-3">
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <?php
                                echo form_dropdown('jenis', $jenis, $jenis_selected, 'id="jenis" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-6" id="by-level">
                            <div class="form-group">
                                <label for="level">Level Kelas</label>
                                <?php
                                echo form_dropdown('level', $levels, $level_selected, 'id="level" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-4">
                            <div class="form-group">
                                <label for="filter">Filter</label>
                                <?php
                                echo form_dropdown('filter', $filter, $filter_selected, 'id="filter" class="form-control"'); ?>
                            </div>
                        </div>
                        <?php
                        $dnone = $filter_selected == '0' ? 'd-none' : ''?>
                        <div class='col-md-2 col-4 <?=$dnone?>' id="tgl-dari">
                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type='text' id="dari" name='dari' value="<?= $dari_selected ?>"
                                       class='tgl form-control' autocomplete='off'/>
                            </div>
                        </div>
                        <div class='col-md-2 col-4 <?=$dnone?>' id="tgl-sampai">
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type='text' id="sampai" name='sampai'
                                       class='tgl form-control' value="<?= $sampai_selected ?>"
                                       autocomplete='off'/>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (count($arr) > 0) :
                        if ($jenis_selected != null) :?>
                            <table class="table table-sm border mt-4" id="tbl">
                                <tr>
                                    <th class="text-center align-middle border">
                                        Hari & Tanggal
                                    </th>
                                    <th class="text-center align-middle border">
                                        Level Kelas
                                    </th>
                                    <th class="text-center align-middle border d-none">
                                        Jam ke
                                    </th>
                                    <th width="100" class="text-center align-middle border">
                                        Menit ke
                                    </th>
                                    <th class="text-center align-middle border">
                                        Jadwal / Mata Pelajaran
                                    </th>
                                </tr>
                                <?php
                                foreach ($arr as $key => $jadwal):
                                    $drop_jadwal = [];
                                    $kls_jadwal = [];
                                    foreach ($jadwal['jadwal'] as $jdwl) {
                                        $drop_jadwal[$jdwl->id_jadwal] = $jdwl->bank_kode.' ('.$jdwl->nama_mapel.')';

                                        $jumlahKelas = json_decode(json_encode(unserialize($jdwl->bank_kelas)));
                                        $kelasbank = '';
                                        $no = 1;
                                        foreach ($jumlahKelas as $j) {
                                            if (isset($kelas[$j->kelas_id])) {
                                                if ($no > 1) {
                                                    $kelasbank .= ', ';
                                                }
                                                $kelasbank .= $kelas[$j->kelas_id];
                                                $no++;
                                            }
                                        }
                                        $kls_jadwal[] = $kelasbank;
                                    }

                                    ?>
                                    <tr>
                                        <td rowspan="<?= count($jadwal['jadwal']) ?>" class="text-center align-middle border">
                                            <?= buat_tanggal(date('D, d M Y', strtotime($key))) ?>
                                        </td>
                                        <?php $keyj = array_search('1', array_column($jadwal['jadwal'], 'jam_ke'));
                                        if (!$keyj) $keyj = 0; ?>
                                        <td class="border text-center align-middle level">
                                            <?= $jadwal['level'] ?> (<?= $kls_jadwal[$keyj] ?>)
                                        </td>
                                        <td class="border text-center align-middle jam-ke d-none">
                                            1
                                        </td>
                                        <td class="border">
                                            <input type="number" id="jarak" name="jarak" value="0"
                                                   class="form-control form-control-sm jarak" required readonly>
                                        </td>
                                        <td class="border">
                                            <?php
                                            echo form_dropdown('mapel', $drop_jadwal, $jadwal['jadwal'][$keyj]->id_jadwal, 'id="' . $jadwal['jadwal'][$keyj]->id_jadwal . '" class="form-control form-control-sm jadwal"'); ?>
                                        </td>
                                    </tr>
                                    <?php
                                    if (count($jadwal['jadwal']) > 1) :
                                        for ($i = 1; $i < count($jadwal['jadwal']); $i++) :
                                            $keyi = array_search($i + 1, array_column($jadwal['jadwal'], 'jam_ke'));
                                            if (!$keyi) $keyi = $i;
                                            ?>
                                            <tr>
                                                <td class="border text-center align-middle level">
                                                    <?= $jadwal['level'] ?> (<?= $kls_jadwal[$keyi] ?>)
                                                </td>
                                                <td class="border text-center align-middle jam-ke d-none">
                                                    <?= $i + 1 ?>
                                                </td>
                                                <td class="border">
                                                    <input type="number" id="jarak" name="jarak"
                                                           value="<?= $jadwal['jadwal'][$keyi]->jarak ?>"
                                                           class="form-control form-control-sm jarak" required>
                                                </td>
                                                <td class="border">
                                                    <?php
                                                    echo form_dropdown('mapel', $drop_jadwal, $jadwal['jadwal'][$keyi]->id_jadwal, 'id="' . $jadwal['jadwal'][$keyi]->id_jadwal . '" class="form-control form-control-sm jadwal"'); ?>
                                                </td>
                                            </tr>
                                        <?php endfor; endif; endforeach; ?>
                            </table>
                        <?php endif; ?>
                        <?= form_open('', array('id' => 'simpanalokasi')) ?>
                        <button type="submit" class="btn btn-primary card-tools mt-3 float-right">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                        <?= form_close() ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        ajaxcsrf();

        var allowed = JSON.parse('<?=json_encode($allowedDates)?>');
        console.log(allowed);
        $('.tgl').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            timepicker: false,
            format: 'Y-m-d',
            disabledWeekDays: [0],
            //allowDates: allowed,
            formatDate: 'Y-m-d',
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom'
            }
        });

        var opsiLevel = $("#level");
        var opsiJenis = $("#jenis");

        //var opsiRuang = $("#ruang");
        //var opsiKelas = $("#kelas");

        var opsiFilter = $("#filter");
        var opsiDari = $("#dari");
        var opsiSampai = $("#sampai");

        //opsiRuang.prepend("<option value='' selected='selected'>Pilih Ruang</option>");
        //opsiKelas.prepend("<option value='' selected='selected'>Pilih Kelas</option>");

        //opsiKelas.change(function () {
            //loadSiswaKelas($(this).val(), opsiSesi.val(), opsiJadwal.val())
        //});

        //opsiRuang.change(function () {
            //loadSiswaRuang($(this).val(), opsiSesi.val(), opsiJadwal.val())
        //});

        opsiFilter.change(function () {
            if ($(this).val() == '0') {
                $('#tgl-dari').addClass('d-none');
                $('#tgl-sampai').addClass('d-none');
                var jenis = opsiJenis.val();
                var level = opsiLevel.val();
                var url =  base_url + 'cbtalokasi?jenis=' + jenis + '&level=' + level + '&filter=0';
                if (jenis != "" && level != "0") {
                    window.location.href = url;
                }
            } else {
                $('#tgl-dari').removeClass('d-none');
                $('#tgl-sampai').removeClass('d-none');
            }
        });

        opsiLevel.change(function () {
            //var lvl = $(this).val();
            //if (lvl != "" && lvl !== old) {
                getAllJadwal();
                //window.location.href = base_url + 'cbtalokasi?jenis=' + opsiJenis.val() + '&level=' + lvl;
            //}
        });

        var old = "<?=$jenis_selected?>";
        opsiJenis.change(function () {
            //var jj = $(this).val();
            //if (jj != "" && jj !== old) {
                getAllJadwal();
                //window.location.href = base_url + 'cbtalokasi?jenis=' + jj + '&level=' + opsiLevel.val();
            //}
        });

        var dariold = "<?=$dari_selected?>";
        opsiDari.change(function () {
            var dari = $(this).val();
            if (dari != "" && dari !== dariold) {
                getAllJadwal();
            }
        });

        var sampaiold = "<?=$sampai_selected?>";
        opsiSampai.change(function () {
            var sampai = $(this).val();
            if (sampai != "" && sampai !== sampaiold) {
                getAllJadwal();
            }
        });

        function getAllJadwal() {
            var jenis = opsiJenis.val();
            var level = opsiLevel.val();
            var dari = opsiDari.val();
            var sampai = opsiSampai.val();
            var fil = opsiFilter.val();

            var tglKosong = fil == '1' && (dari == "" || sampai == "");
            var url = base_url + 'cbtalokasi?jenis=' + jenis + '&level=' + level + '&filter=' + opsiFilter.val() + '&dari=' + dari + '&sampai=' + sampai;
            console.log(url);
            if (jenis != "" && level != "0" && !tglKosong) {
                window.location.href = url;
            }
        }

        $('#simpanalokasi').on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            const $rows1 = $('#tbl').find('tr'), headers1 = $rows1.splice(0, 1);
            var jsonObj = [];
            $rows1.each((i, row) => {
                const jam_ke = $(row).find('.jam-ke').text().trim();
                const jarak = $(row).find('input.jarak').val();
                const id_jadwal = $(row).find('.jadwal').val();

                let item = {};
                item ["id_jadwal"] = id_jadwal;
                item ["jam_ke"] = jam_ke;
                item ["jarak"] = jarak;

                jsonObj.push(item);
            });


            var dataPost = $(this).serialize() + "&alokasi=" + JSON.stringify(jsonObj);
            console.log(dataPost);

            $.ajax({
                url: base_url + "cbtalokasi/savealokasi",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log("response:", data);
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            html: "Alokasi waktu ujian berhasil disimpan",
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

        $('#selector button').click(function () {
            $(this).addClass('active').siblings().addClass('btn-outline-primary').removeClass('active btn-primary');

            if (!$('#by-kelas').is(':hidden')) {
                $('#by-kelas').addClass('d-none');
                $('#by-ruang').removeClass('d-none');
            } else {
                $('#by-kelas').removeClass('d-none');
                $('#by-ruang').addClass('d-none');
            }
        });

    })
</script>
