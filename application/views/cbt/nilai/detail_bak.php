<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
?>

<div class="content-wrapper bg-white">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <button onclick="window.history.back();" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default my-shadow mb-4">
                <div class="card-body">
                    <?php
                    echo '<pre>';
                    //var_dump($jawab_pg[0]);
                    echo '</pre>';
                    $no = 1;
                    $jml = $info->tampil_pg;

                    $pecah = 10;
                    $bagi = ceil($jml / $pecah);
                    $arr = [];
                    for ($t = 1; $t < $pecah; $t++) {
                        $jml -= $pecah;
                        if ($jml > 0) {
                            $arr[] = $pecah;
                        } else {
                            $arr[] = $jml + $pecah;
                            break;
                        }
                    }
                    //var_dump($arr);
                    ?>

                    <div class="row">
                        <div class="col-md-4">
                            <table class="table table-bordered">
                                <tr>
                                    <td style="width: 120px">Nama</td>
                                    <td><?= $siswa->nama ?></td>
                                </tr>
                                <tr>
                                    <td>N I S</td>
                                    <td><?= $siswa->nis ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td><?= $siswa->nama_kelas ?></td>
                                </tr>
                                <tr>
                                    <td>No. Peserta</td>
                                    <td><?= $siswa->nomor_peserta ?></td>
                                </tr>
                                <tr>
                                    <td>Sesi</td>
                                    <td><?= $siswa->kode_sesi ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered" id="table-status">
                                <tr>
                                <tr>
                                    <td>Ruang</td>
                                    <td><?= $siswa->kode_ruang ?></td>
                                </tr>
                                <td>Mata Pelajaran</td>
                                <td><?= $info->kode ?></td>
                                </tr>
                                <tr>
                                    <td>Guru</td>
                                    <td><?= $info->nama_guru ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Ujian</td>
                                    <td><?= $info->kode_jenis ?></td>
                                </tr>
                                <tr>
                                    <td>Tahun Pelajaran</td>
                                    <td><?= isset($tp_active) ? $tp_active->tahun : "--/--" ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2">
                            <table class="table table-bordered" id="table-status">
                                <tr>
                                    <td>PG</td>
                                    <td class="text-center"><?= round($skor->skor_pg, 2) ?></td>
                                    <td rowspan="5" style="width: 100px" class="text-center">
                                        <b>NILAI</b>
                                        <br>
                                        <span style="font-size: 40pt"><?= $skor->skor_total ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>PK</td>
                                    <td class="text-center"><?= round($skor->skor_kompleks, 2) ?></td>
                                </tr>
                                <tr>
                                    <td>JO</td>
                                    <td class="text-center"><?= round($skor->skor_jodohkan, 2) ?></td>
                                </tr>
                                <tr>
                                    <td>IS</td>
                                    <td class="text-center"><?= round($skor->skor_isian, 2) ?></td>
                                </tr>
                                <tr>
                                    <td>ES</td>
                                    <td class="text-center"><?= round($skor->skor_essai, 2) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <?php for ($i = 0; $i < count($arr); $i++) : ?>
                            <div class="col-4 col-md-2">
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="3" class="text-center text-indigo text-bold">Pilihan Ganda<br>(PG)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center text-bold" style="width: 50px">No.
                                        </th>
                                        <td class="text-center text-bold">Jawaban
                                        </th>
                                    </tr>
                                    <?php
                                    for ($j = 0; $j < $arr[$i]; $j++) :
                                        $jp = isset($jawab_pg[$no - 1]) ? $jawab_pg[$no - 1] : new stdClass();
                                        ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no ?>
                                            </td>
                                            <td>
                                        <span class="ml-2">
                                        <?= $jp['jawaban'] ?>
                                        </span>
                                                <span class="float-right mr-2">
                                            <?php if ($jp['benar']) : ?>
                                                <i class="fa fa-check-circle text-green"></i>
                                            <?php else: ?>
                                                <i class="fa fa-times-circle text-red"></i>
                                            <?php endif; ?>
                                        </span>
                                        </tr>
                                        <?php $no += 1; endfor; ?>
                                </table>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <div>
                        <table class="table table-bordered" id="table-status">
                        </table>
                    </div>
                </div>
            </div>

            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title">Detail Soal</h6>
                </div>
                <div class="card-body">
                    <div class="row" style="overflow-x: auto">
                        <?php
                        echo '<pre>';
                        var_dump($soal[1][0]);
                        echo '</pre>';
                        if (count($soal[1]) > 0) :
                            ?>
                            <table id="table-soal"
                                   class="w-100 table table-striped table-bordered border-success nowrap">
                                <thead>
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
                                    <th class="text-center align-middle bg-teal" style="width: 50px">Point</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ns = 1;
                                foreach ($soal[1] as $s) :
                                    if ($s->jenis == '1') :
                                        $arrAlias = [
                                            ['valAlias' => $s->opsi_alias_a, 'opsi' => $s->opsi_a, 'value' => 'A'],
                                            ['valAlias' => $s->opsi_alias_b, 'opsi' => $s->opsi_b, 'value' => 'B'],
                                        ];

                                        if ($info->opsi == 3) {
                                            array_push($arrAlias, ['valAlias' => $s->opsi_alias_c, 'opsi' => $s->opsi_c, 'value' => 'C']);
                                        } elseif ($info->opsi == 4) {
                                            array_push($arrAlias, ['valAlias' => $s->opsi_alias_c, 'opsi' => $s->opsi_c, 'value' => 'C']);
                                            array_push($arrAlias, ['valAlias' => $s->opsi_alias_d, 'opsi' => $s->opsi_d, 'value' => 'D']);
                                        } else {
                                            array_push($arrAlias, ['valAlias' => $s->opsi_alias_c, 'opsi' => $s->opsi_c, 'value' => 'C']);
                                            array_push($arrAlias, ['valAlias' => $s->opsi_alias_d, 'opsi' => $s->opsi_d, 'value' => 'D']);
                                            array_push($arrAlias, ['valAlias' => $s->opsi_alias_e, 'opsi' => $s->opsi_e, 'value' => 'E']);
                                        }
                                        array_multisort(array_column($arrAlias, 'valAlias'), SORT_ASC, $arrAlias);
                                        //$so = json_decode(json_encode($s), true);
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $ns ?></td>
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
                                            <td class="text-center"><?= strtoupper($s->jawaban) ?></td>
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
                                            <td class="text-center"><?= strtoupper($s->jawaban_alias) ?></td>
                                            <td class="text-center"><?= strtoupper($s->jawaban_siswa) ?></td>
                                            <?php
                                            $analisa = $s->jawaban_siswa == null ? '...' : (strtoupper($s->jawaban_siswa) == strtoupper($s->jawaban) ? '<i class="fa fa-check-circle text-green"></i> BENAR' : '<i class="fa fa-times-circle text-red"></i> SALAH');
                                            ?>
                                            <td class="text-center"><?= $analisa ?></td>
                                        </tr>
                                    <?php endif;
                                    $ns++; endforeach; ?>
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
