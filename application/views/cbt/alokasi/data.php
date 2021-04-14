<?php
function date_sort($a, $b) {
    return strtotime($a) - strtotime($b);
}

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
                    $arr[$item->tgl_mulai][] = $item;
                }

                ksort($arr, SORT_ASC);

                //echo '<pre>';
                //var_dump($jadwals);
                //echo '</pre>';
                ?>
                <div class="card-header">
                    <h3 class="card-title"><b><?= $subjudul ?></b></h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Jenis Ujian</span>
                                </div>
                                <?php
                                echo form_dropdown('jenis', $jenis, $jenis_selected, 'id="jenis" class="form-control"'); ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!--<p><b>Alokasi Jadwal <?= $jenis[$jenis_selected] ?></b></p>-->
                    <div class="alert alert-info shadow align-content-center" role="alert">
                        <strong>Catatan!</strong>
                        <ul>
                            <li>
                                Mengatur berapa menit jadwal ujian akan aktif setelah sesi dimulai
                            </li>
                            <li>
                                Contoh <b>Menit ke</b> 90, maka jadwal mapel akan aktif 90 menit setelah sesi dimulai
                            </li>
                            <li>
                                Jika semua <b>Menit ke</b> diatur ke 0 maka semua jadwal akan bisa dikerjakan oleh siswa
                            </li>
                            <li>
                                halaman ini berlaku jika semua jadwal telah diaktifkan
                            </li>
                            <li>
                                Jika halaman ini tidak diatur, maka jadwal ujian mengikuti aturan di MENU <b>JADWAL</b>
                            </li>
                        </ul>
                    </div>
                    <?php
                    if ($jenis_selected != null) : ?>
                    <table class="table table-sm border mt-4" id="tbl">
                        <tr>
                            <th class="text-center align-middle border">
                                Hari & Tanggal
                            </th>
                            <th class="text-center align-middle border">
                                Jam ke
                            </th>
                            <th width="100" class="text-center align-middle border">
                                Menit ke
                            </th>
                            <th class="text-center align-middle border">
                                Mata Pelajaran
                            </th>
                        </tr>
                        <?php
                        if (count($arr) > 0) :
                            foreach ($arr as $key => $jadwal):
                                $drop_jadwal = [];
                                foreach ($jadwal as $jdwl) {
                                    $drop_jadwal[$jdwl->id_jadwal] = $jdwl->nama_mapel;
                                }
                                ?>
                                <tr>
                                    <td rowspan="<?= count($jadwal) ?>" class="text-center align-middle border">
                                        <?= buat_tanggal(date('D, d M Y', strtotime($key))) ?>
                                    </td>
                                    <td class="border text-center align-middle jam-ke">
                                        1
                                    </td>
                                    <td class="border">
                                        <input type="number" id="jarak" name="jarak" value="0" class="form-control form-control-sm jarak" required readonly>
                                    </td>
                                    <td class="border">
                                        <?php
                                        $keyj = array_search('1', array_column($jadwal, 'jam_ke'));
                                        if (!$keyj) $keyj = 0;
                                        echo form_dropdown('mapel', $drop_jadwal, $jadwal[$keyj]->id_jadwal, 'id="'.$jadwal[$keyj]->id_jadwal.'" class="form-control form-control-sm jadwal"'); ?>
                                    </td>
                                </tr>
                                <?php
                            if (count($jadwal)>1) :
                                for ($i=1;$i<count($jadwal);$i++) :
                                    $keyi = array_search($i+1, array_column($jadwal, 'jam_ke'));
                                if (!$keyi) $keyi = $i;
                                    ?>
                                <tr>
                                    <td class="border text-center align-middle jam-ke">
                                        <?=$i+1?>
                                    </td>
                                    <td class="border">
                                        <input type="number" id="jarak" name="jarak" value="<?=$jadwal[$keyi]->jarak?>" class="form-control form-control-sm jarak" required>
                                    </td>
                                    <td class="border">
                                        <?php
                                        echo form_dropdown('mapel', $drop_jadwal, $jadwal[$keyi]->id_jadwal, 'id="'.$jadwal[$keyi]->id_jadwal.'" class="form-control form-control-sm jadwal"'); ?>
                                    </td>
                                </tr>
                            <?php endfor; endif; endforeach;
                        endif; ?>
                    </table>
                    <?php endif; ?>
                    <?= form_open('', array('id' => 'simpanalokasi')) ?>
                    <button type="submit" class="btn btn-primary card-tools mt-3 float-right">
                        <i class="fas fa-save mr-2"></i>Simpan
                    </button>
                    <?= form_close() ?>
                </div>
            </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        ajaxcsrf();

        var old = "<?=$jenis_selected?>";
        $('#jenis').change(function () {
            var jj = $(this).val();
            if (jj != "" && jj !== old) {
                window.location.href = base_url + 'cbtalokasi?jenis=' + jj;
            }
        });

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
    })
</script>