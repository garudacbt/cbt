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
                        <h6><b>Kelas <?= $kelases->nama_kelas ?></b></h6>
                    </div>
                    <div class="card-tools">
                        <button type="button" id="download" class="btn btn-primary">
                            <i class="fa fa-download"></i> <span class="ml-1">Download DKN</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="table-leger" class="table-fill">
                        <?php
                        $arrMapel[] = [];
                        $arrMulok[] = [];
                        foreach ($mapels as $mapel) {
                            if ($mapel->kelompok === "MULOK") {
                                array_push($arrMulok, $mapel);
                            } else {
                                array_push($arrMapel, $mapel);
                            }
                        }
                        $arrMapel = array_filter($arrMapel);
                        $arrMulok = array_filter($arrMulok);
                        $mapel_ekstra = array_filter($mapel_ekstra);

                        $ekstra_ekstra = [];
                        if (count($mapel_ekstra) < 4) {
                            for ($i = 0; $i < (4 - count($mapel_ekstra)); $i++) {
                                $ekstra_ekstra[] = 'Ekstrakurukuler ' . (($i + 1) + count($mapel_ekstra));
                            }
                        }
                        //echo '<pre>';
                        //var_dump($arrMapel);
                        //var_dump($absensi[1]['s']);
                        //var_dump($absensi[137]);
                        //echo '</pre>';
                        $sizeAllMapel = (count($arrMapel) * 2) + (count($arrMulok) * 2);
                        $widthColumns = '5,20,15,35,10';

                        for ($i = 0; $i < ($sizeAllMapel + 9); $i++) {
                            $widthColumns .= ',5';
                        }
                        $widthColumns .= ',15,10,15,15';
                        ?>

                        <table cellspacing="0" id="tbl-leger" class="table table-bordered border-primary text-sm"
                               data-cols-width="<?= $widthColumns ?>">
                            <!--
                            <tr>
                                <th colspan="<?= (count($arrMapel) * 2) + (count($arrMulok) * 2) + 17 ?>" class="text-center align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true">No.</th>
                            </tr>
                            -->
                            <thead>
                            <tr class="alert-default-primary" data-height="30">
                                <th rowspan="4" width="40" class="text-center align-middle border-primary"
                                    data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium"
                                    data-f-bold="true">No.
                                </th>
                                <th rowspan="4" style="min-width: 120px" class="text-center align-middle border-primary"
                                    data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium"
                                    data-f-bold="true">N I S
                                </th>
                                <th rowspan="4" style="min-width: 100px" class="text-center align-middle border-primary"
                                    data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium"
                                    data-f-bold="true">N I S N
                                </th>
                                <th rowspan="4" class="text-center align-middle border-primary"
                                    style="white-space: nowrap; padding: 40px" data-fill-color="b8daff"
                                    data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true">Nama
                                    Peserta Didik
                                </th>
                                <th rowspan="4" class="text-center align-middle border-primary" data-fill-color="b8daff"
                                    data-a-wrap="true" data-a-v="middle" data-a-h="center" data-b-a-s="medium"
                                    data-f-bold="true">Jenis<br>Kelamin
                                </th>
                                <th colspan="<?= count($arrMapel) * 2 ?>" style="height: 30px"
                                    class="text-center align-middle border-primary" data-fill-color="b8daff"
                                    data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true">Mata
                                    Pelajaran
                                </th>
                                <?php if (count($arrMulok) > 0) : ?>
                                    <th colspan="<?= count($arrMulok) * 2 ?>" style="height: 30px"
                                        class="text-center align-middle border-primary" data-fill-color="b8daff"
                                        data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true">Mulok
                                    </th>
                                <?php endif; ?>
                                <th colspan="2" class="text-center align-middle border-primary" data-fill-color="b8daff"
                                    data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true">Sikap
                                </th>
                                <th colspan="<?= count($mapel_ekstra) + count($ekstra_ekstra) ?>"
                                    class="text-center align-middle border-primary" data-fill-color="b8daff"
                                    data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true">
                                    Ekstrakurikuler
                                </th>
                                <th colspan="3" class="text-center align-middle border-primary" data-a-v="middle"
                                    data-a-h="center" data-fill-color="b8daff" data-b-a-s="medium" data-f-bold="true">
                                    Absensi
                                </th>
                                <th rowspan="4" class="text-center align-middle border-primary p-0"
                                    style="min-width: 80px" data-a-v="middle" data-a-h="center" data-b-a-s="medium"
                                    data-f-bold="true" data-fill-color="b8daff">Jml. Nilai
                                </th>
                                <th rowspan="4" class="text-center align-middle border-primary p-0"
                                    style="min-width: 60px" data-a-v="middle" data-a-h="center" data-b-a-s="medium"
                                    data-f-bold="true" data-fill-color="b8daff">Rank
                                </th>
                                <th rowspan="4" class="text-center align-middle border-primary p-0"
                                    style="min-width: 100px" data-a-v="middle" data-a-h="center" data-b-a-s="medium"
                                    data-f-bold="true" data-fill-color="b8daff">Naik/<br>Tidak Naik
                                </th>
                                <th rowspan="4" class="text-center align-middle border-primary" data-a-v="middle"
                                    data-a-h="center" data-b-a-s="medium" data-f-bold="true" data-fill-color="b8daff">
                                    Keterangan
                                </th>
                            </tr>
                            <tr class="alert-default-primary" data-height="20">
                                <?php foreach ($arrMapel as $mpl) :
                                    if ($mpl != null) :?>
                                        <th colspan="2" class="text-center border-primary" data-a-v="middle"
                                            data-a-h="center" data-b-a-s="medium" data-f-bold="true"
                                            data-fill-color="b8daff"><?= $mpl->kode ?></th>
                                    <?php endif; endforeach; ?>
                                <?php foreach ($arrMulok as $mul) :
                                    if ($mul != null) :?>
                                        <th colspan="2" class="text-center border-primary" data-a-v="middle"
                                            data-a-h="center" data-b-a-s="medium" data-f-bold="true"
                                            data-fill-color="b8daff"><?= $mul->kode ?></th>
                                    <?php endif; endforeach; ?>
                                <th rowspan="3" class="border-primary p-0" data-a-text-rotation="90" data-b-a-s="medium"
                                    data-f-bold="true" data-fill-color="b8daff">
                                    <div class="tbl-vertical">Spiritual</div>
                                </th>
                                <th rowspan="3" class="border-primary p-0" data-a-text-rotation="90" data-b-a-s="medium"
                                    data-f-bold="true" data-fill-color="b8daff">
                                    <div class="tbl-vertical">Sosial</div>
                                </th>
                                <?php
                                foreach ($mapel_ekstra as $k => $me):?>
                                    <th rowspan="3" class="border-primary p-0" data-a-text-rotation="90"
                                        data-a-h="center" data-b-a-s="medium" data-f-bold="true"
                                        data-fill-color="b8daff">
                                        <div class="tbl-vertical"><?= $me->nama_ekstra ?></div>
                                    </th>
                                <?php endforeach;
                                foreach ($ekstra_ekstra as $ex):?>
                                    <th rowspan="3" class="border-primary p-0" data-a-text-rotation="90"
                                        data-a-h="center" data-b-a-s="medium" data-f-bold="true"
                                        data-fill-color="b8daff">
                                        <div class="tbl-vertical"><?= $ex ?></div>
                                    </th>
                                <?php endforeach; ?>
                                <th rowspan="3" class="text-center border-primary" data-a-v="middle" data-a-h="center"
                                    data-b-a-s="medium" data-f-bold="true" data-fill-color="b8daff">S
                                </th>
                                <th rowspan="3" class="text-center border-primary" data-a-v="middle" data-a-h="center"
                                    data-b-a-s="medium" data-f-bold="true" data-fill-color="b8daff">I
                                </th>
                                <th rowspan="3" class="text-center border-primary" data-a-v="middle" data-a-h="center"
                                    data-b-a-s="medium" data-f-bold="true" data-fill-color="b8daff">A
                                </th>
                            </tr>
                            <tr class="alert-default-primary" data-height="20">
                                <?php foreach ($arrMapel as $mpl) :
                                    if ($mpl != null) :?>
                                        <td style="white-space: nowrap" colspan="2" class="text-center border-primary"
                                            data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true"
                                            data-fill-color="b8daff">
                                            KKM: <?= $kkm[$mpl->id_mapel] != null ? $kkm[$mpl->id_mapel]->kkm : 0 ?></td>
                                    <?php endif; endforeach; ?>
                                <?php foreach ($arrMulok as $mul) :
                                    if ($mul != null) :?>
                                        <td style="white-space: nowrap" colspan="2" class="text-center border-primary"
                                            data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true"
                                            data-fill-color="b8daff">
                                            KKM: <?= $kkm[$mpl->id_mapel] != null ? $kkm[$mpl->id_mapel]->kkm : 0 ?></td>
                                    <?php endif; endforeach; ?>
                            </tr>
                            <tr class="alert-default-primary" data-height="20">
                                <?php for ($i = 0; $i < count($mapels); $i++) : ?>
                                    <td class=" border-primary" data-a-v="middle" data-a-h="center" data-b-a-s="medium"
                                        data-f-bold="true" data-fill-color="b8daff">NP
                                    </td>
                                    <td class=" border-primary" data-a-v="middle" data-a-h="center" data-b-a-s="medium"
                                        data-f-bold="true" data-fill-color="b8daff">NK
                                    </td>
                                <?php endfor; ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($siswas as $siswa) :
                                $jmlNilai = 0; ?>
                                <tr>
                                    <td class="text-center border-primary p-0 align-middle" data-a-v="top"
                                        data-a-h="center" data-b-a-s="thin"><?= $no ?></td>
                                    <td class="text-center border-primary p-0 align-middle" data-a-v="top"
                                        data-a-h="center" data-b-a-s="thin"><?= $siswa->nis ?></td>
                                    <td class="text-center border-primary p-0 align-middle" data-a-v="top"
                                        data-a-h="center" data-b-a-s="thin"><?= $siswa->nisn ?></td>
                                    <td class="border-primary p-0 pl-2" data-a-wrap="true" data-a-v="top"
                                        data-a-h="left" data-b-a-s="thin">
                                        <?= $siswa->nama ?>
                                    </td>
                                    <td class="text-center border-primary p-0 align-middle" data-a-v="middle"
                                        data-a-h="center" data-b-a-s="thin"><?= $siswa->jenis_kelamin ?></td>
                                    <?php foreach ($arrMapel as $mpl) :
                                        $id = $mpl->id_mapel;
                                        $jmlNilai += isset($nilai[$siswa->id_siswa][$id]['nilai']) ? floatval($nilai[$siswa->id_siswa][$id]['nilai']) : 0;
                                        $jmlNilai += isset($nilai[$siswa->id_siswa][$id]['k_rata_rata']) ? floatval($nilai[$siswa->id_siswa][$id]['k_rata_rata']) : 0;
                                        ?>
                                        <td class="text-center border-primary p-0 align-middle" data-a-v="middle"
                                            data-a-h="center"
                                            data-b-a-s="thin"><?= isset($nilai[$siswa->id_siswa][$id]['nilai']) ? $nilai[$siswa->id_siswa][$id]['nilai'] : '' ?></td>
                                        <td class="text-center border-primary p-0 align-middle" data-a-v="middle"
                                            data-a-h="center"
                                            data-b-a-s="thin"><?= isset($nilai[$siswa->id_siswa][$id]['k_rata_rata']) ? $nilai[$siswa->id_siswa][$id]['k_rata_rata'] : '' ?></td>
                                    <?php endforeach; ?>
                                    <?php foreach ($arrMulok as $mpl) :
                                        $id = $mpl->id_mapel;
                                        $rata_k = isset($nilai[$siswa->id_siswa]) && isset($nilai[$siswa->id_siswa][$id]) && isset($nilai[$siswa->id_siswa][$id]['k_rata_rata']) ? $nilai[$siswa->id_siswa][$id]['k_rata_rata'] : 0;
                                        $jmlNilai += isset($nilai[$siswa->id_siswa][$id]['nilai']) ? $nilai[$siswa->id_siswa][$id]['nilai'] : 0;
                                        $jmlNilai += is_numeric($rata_k) ? $rata_k : 0;
                                        ?>
                                        <td class="text-center border-primary p-0 align-middle" data-a-v="middle"
                                            data-a-h="center"
                                            data-b-a-s="thin"><?= isset($nilai[$siswa->id_siswa][$id]['nilai']) ? $nilai[$siswa->id_siswa][$id]['nilai'] : '' ?></td>
                                        <td class="text-center border-primary p-0 align-middle" data-a-v="middle"
                                            data-a-h="center"
                                            data-b-a-s="thin"><?= isset($nilai[$siswa->id_siswa][$id]['k_rata_rata']) ? $nilai[$siswa->id_siswa][$id]['k_rata_rata'] : '' ?></td>
                                    <?php endforeach; ?>
                                    <td class="text-center border-primary p-0 align-middle" data-a-v="middle"
                                        data-a-h="center"
                                        data-b-a-s="thin"><?= $sikap[$siswa->id_siswa][1]['predikat']['predikat'] ?></td>
                                    <td class="text-center border-primary p-0 align-middle" data-a-v="middle"
                                        data-a-h="center"
                                        data-b-a-s="thin"><?= $sikap[$siswa->id_siswa][2]['predikat']['predikat'] ?></td>
                                    <?php foreach ($mapel_ekstra as $me) : ?>
                                        <td class="text-center border-primary p-0 align-middle" data-a-v="middle"
                                            data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai_ekstra[$siswa->id_siswa][$me->id_ekstra]->predikat ?></td>
                                    <?php endforeach;
                                    foreach ($ekstra_ekstra as $ex):?>
                                        <th class="border-primary p-0 align-middle" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"></th>
                                    <?php endforeach; ?>
                                    <td class="text-center border-primary p-0 align-middle" data-a-v="middle"
                                        data-a-h="center"
                                        data-b-a-s="thin"><?= isset($absensi[$siswa->id_siswa]['s']) ? $absensi[$siswa->id_siswa]['s'] : '' ?></td>
                                    <td class="text-center border-primary p-0 align-middle" data-a-v="middle"
                                        data-a-h="center"
                                        data-b-a-s="thin"><?= isset($absensi[$siswa->id_siswa]['i']) ? $absensi[$siswa->id_siswa]['i'] : '' ?></td>
                                    <td class="text-center border-primary p-0 align-middle" data-a-v="middle"
                                        data-a-h="center"
                                        data-b-a-s="thin"><?= isset($absensi[$siswa->id_siswa]['a']) ? $absensi[$siswa->id_siswa]['a'] : '' ?></td>
                                    <td class="text-center align-middle border-primary p-0" data-a-v="middle"
                                        data-a-h="center" data-b-a-s="thin"><?= $jmlNilai ?></td>
                                    <td class="text-center align-middle border-primary p-0" data-a-v="middle"
                                        data-a-h="center"
                                        data-b-a-s="thin"><?= $deskripsi[$siswa->id_siswa]->ranking ?></td>
                                    <?php
                                    $state = $naik[$siswa->id_siswa];
                                    $text = 'Naik';
                                    if ($state == '0') {
                                        $text = 'Tidak naik';
                                    }
                                    ?>
                                    <td class="text-center align-middle border-primary p-0" data-a-v="middle"
                                        data-a-h="center" data-b-a-s="thin"><?= $text ?></td>
                                    <td class="text-center align-middle border-primary p-0" data-a-v="middle"
                                        data-a-h="center" data-b-a-s="thin"></td>
                                </tr>
                                <?php $no++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/tableToExcel.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/freeze-table.js"></script>
<script>
    var kelas = '<?= $kelases->nama_kelas?>';
    var tp = '<?=$tp_active->tahun?>';
    var smt = '<?=$smt_active->smt?>';
    $(document).ready(function () {
        $("#table-leger").freezeTable({
            'columnNum': 4,
        });

        $('#download').on('click', function (e) {
            var table = document.querySelector("#tbl-leger");
            //TableToExcel.convert(table);
            TableToExcel.convert(table, {
                name: "Daftar Kumpulan Nilai Kelas " + kelas + " " + tp + " " + smt + ".xlsx",
                //sheet: {name: "Sheet 1"}
            });
        });
    });
</script>
