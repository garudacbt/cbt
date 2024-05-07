<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
?>

<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between mb-2">
                <h1><?= $judul ?></h1>
                <button onclick="window.history.back();" type="button" class="btn btn-sm btn-danger float-right">
                    <i class="fas fa-arrow-circle-left"></i><span
                            class="d-none d-sm-inline-block ml-1">Kembali</span>
                </button>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $siswa->nama ?></h6>
                </div>
                <div class="card-body">
                    <div class="row" style="overflow-x: auto">
                        <?php
                        //echo '<pre>';
                        //var_dump($soal[6]);
                        //echo '</pre>';

                        if (count($soal) > 0) :
                            ?>
                            <table id="table-soal"
                                   class="w-100 table table-striped table-bordered border-success nowrap">
                                <thead>
                                <tr>
                                    <th colspan="4" class="text-center align-middle bg-blue">SOAL ASLI</th>
                                    <th colspan="5" class="text-center align-middle bg-teal p-0">SOAL SISWA</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle bg-blue" style="width: 50px">No. Soal</th>
                                    <th class="text-center align-middle bg-blue">Soal</th>
                                    <th class="text-center align-middle bg-blue">Pilihan</th>
                                    <th class="text-center align-middle bg-blue" style="width: 50px">Jawaban Benar</th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">No. Acak</th>
                                    <th class="text-center align-middle bg-teal">Pilihan Acak</th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">Jawaban Siswa
                                        Acak
                                    </th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">Jawaban
                                        Sebenarnya
                                    </th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">Analisa</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($soal as $s) :
                                    if ($s->jenis_soal == '1') :
                                        if ($setting->jenjang == '3') {
                                            $arrAlias = [
                                                ['valAlias' => $s->opsi_alias_a, 'opsi' => $s->opsi_a, 'value' => 'A'],
                                                ['valAlias' => $s->opsi_alias_b, 'opsi' => $s->opsi_b, 'value' => 'B'],
                                                ['valAlias' => $s->opsi_alias_c, 'opsi' => $s->opsi_c, 'value' => 'C'],
                                                ['valAlias' => $s->opsi_alias_d, 'opsi' => $s->opsi_d, 'value' => 'D'],
                                                ['valAlias' => $s->opsi_alias_e, 'opsi' => $s->opsi_e, 'value' => 'E']
                                            ];
                                        } else {
                                            $arrAlias = [
                                                ['valAlias' => $s->opsi_alias_a, 'opsi' => $s->opsi_a, 'value' => 'A'],
                                                ['valAlias' => $s->opsi_alias_b, 'opsi' => $s->opsi_b, 'value' => 'B'],
                                                ['valAlias' => $s->opsi_alias_c, 'opsi' => $s->opsi_c, 'value' => 'C'],
                                                ['valAlias' => $s->opsi_alias_d, 'opsi' => $s->opsi_d, 'value' => 'D'],
                                            ];
                                        }
                                        array_multisort(array_column($arrAlias, 'valAlias'), SORT_ASC, $arrAlias);
                                        //$so = json_decode(json_encode($s), true);
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $s->nomor_soal ?></td>
                                            <td><?= $s->soal ?></td>
                                            <td>
                                                <ol type="a">
                                                    <li>
                                                        <?= $s->opsi_a ?>
                                                    </li>
                                                    <li>
                                                        <?= $s->opsi_b ?>
                                                    </li>
                                                    <li>
                                                        <?= $s->opsi_c ?>
                                                    </li>
                                                    <li>
                                                        <?= $s->opsi_d ?>
                                                    </li>
                                                    <?php if ($setting->jenjang == '3') : ?>
                                                        <li>
                                                            <?= $s->opsi_e ?>
                                                        </li>
                                                    <?php endif; ?>
                                                </ol>
                                            </td>
                                            <td class="text-center"><?= strtoupper($s->jawaban ?? '') ?></td>
                                            <td class="text-center"><?= $s->no_soal_alias ?></td>
                                            <td>
                                                <ol type="a">
                                                    <?php foreach ($arrAlias as $alias) : ?>
                                                        <li>
                                                            <?= $alias['opsi'] ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ol>
                                            </td>
                                            <td class="text-center"><?= strtoupper($s->jawaban_alias ?? '') ?></td>
                                            <td class="text-center"><?= strtoupper($s->jawaban_siswa ?? '') ?></td>
                                            <td class="text-center"><?= $s->jawaban_siswa == null ? '...' : (strtoupper($s->jawaban_siswa ?? '') == strtoupper($s->jawaban ?? '') ? 'BENAR' : 'SALAH') ?></td>
                                        </tr>
                                    <?php endif; endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <div class="alert alert-info shadow align-content-center" role="alert">
                                Siswa belum memulai ujian
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        $('#table-soal tbody tr img').each(function () {
            var curSrc = $(this).attr('src');
            if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                $(this).attr('src', base_url + curSrc);
            }
        });
    })
</script>
