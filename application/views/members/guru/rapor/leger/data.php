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
                            <i class="fa fa-download"></i> <span class="ml-1">Download Leger</span>
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
                                $ekstra_ekstra[] = 'Ekstrakurikuler ' . (($i + 1) + count($mapel_ekstra));
                            }
                        }
                        //echo '<pre>';
                        //var_dump($kelases);
                        //var_dump($absensi[1]['s']);
                        //var_dump($absensi[137]);
                        //echo '</pre>';
                        $sizeAllMapel = (count($arrMapel) * 2) + (count($arrMulok) * 2);
                        $widthColumns = '5,25,10';

                        for ($i = 0; $i < ($sizeAllMapel + 10); $i++) {
                            $widthColumns .= ',5';
                        }
                        $widthColumns .= ',20';
                        ?>

                        <table cellspacing="0" id="tbl-leger" class="table table-bordered border-primary text-sm"
                               data-cols-width="<?= $widthColumns ?>">
                            <thead>
                            <tr class="alert-default-primary" data-height="30">
                                <th rowspan="4" width="40" class="text-center align-middle border-primary"
                                    data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="medium"
                                    data-f-bold="true">No.
                                </th>
                                <th rowspan="4" class="text-center align-middle border-primary"
                                    style="white-space: nowrap; padding: 40px" data-fill-color="b8daff"
                                    data-a-v="middle" data-a-h="center" data-b-a-s="medium" data-f-bold="true">Nama
                                    Peserta Didik
                                </th>
                                <th rowspan="4" class="text-center align-middle border-primary" data-fill-color="b8daff"
                                    data-a-wrap="true" data-a-v="middle" data-a-h="center" data-b-a-s="medium"
                                    data-f-bold="true">Jenis<br>Penilaian
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
                                <th rowspan="4" class="border-primary p-0" data-a-v="bottom" data-a-h="center"
                                    data-b-a-s="medium" data-f-bold="true" data-fill-color="b8daff"
                                    data-a-text-rotation="90">
                                    <div class="tbl-vertical">Naik/Tidak Naik</div>
                                </th>
                                <th rowspan="4" class="text-center align-middle border-primary" data-a-v="bottom"
                                    data-a-h="center" data-b-a-s="medium" data-f-bold="true" data-fill-color="b8daff"
                                    data-a-text-rotation="90">Keterangan
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
                            foreach ($siswas as $siswa) : ?>
                                <tr>
                                    <td rowspan="5" class="text-center border-primary p-0" data-a-v="top"
                                        data-a-h="center" data-b-a-s="thin"><?= $no ?></td>
                                    <td rowspan="5" class="border-primary p-0 pl-2" data-a-wrap="true" data-a-v="top"
                                        data-a-h="left" data-b-a-s="thin">
                                        <?= $siswa->nama ?>
                                        <br>
                                        <?= $siswa->nis ?>/<?= $siswa->nisn ?>
                                    </td>
                                    <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                        data-b-a-s="thin">HPH
                                    </td>
                                    <?php foreach ($arrMapel as $mpl) : $id = $mpl->id_mapel ?>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->p_rata_rata ?></td>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->k_rata_rata ?></td>
                                    <?php endforeach; ?>
                                    <?php foreach ($arrMulok as $mpl) : $id = $mpl->id_mapel ?>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->p_rata_rata ?></td>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->k_rata_rata ?></td>
                                    <?php endforeach; ?>
                                    <td rowspan="5" class="text-center border-primary p-0 align-middle"
                                        data-a-v="middle" data-a-h="center"
                                        data-b-a-s="thin"><?= $sikap[$siswa->id_siswa][1]['predikat']['predikat'] ?></td>
                                    <td rowspan="5" class="text-center border-primary p-0 align-middle"
                                        data-a-v="middle" data-a-h="center"
                                        data-b-a-s="thin"><?= $sikap[$siswa->id_siswa][2]['predikat']['predikat'] ?></td>
                                    <?php foreach ($mapel_ekstra as $me) : ?>
                                        <td rowspan="5" class="text-center border-primary p-0 align-middle"
                                            data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai_ekstra[$siswa->id_siswa][$me->id_ekstra]->predikat ?></td>
                                    <?php endforeach;
                                    foreach ($ekstra_ekstra as $ex):?>
                                        <th rowspan="5" class="border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"></th>
                                    <?php endforeach; ?>
                                    <td rowspan="5" class="text-center border-primary p-0 align-middle"
                                        data-a-v="middle" data-a-h="center"
                                        data-b-a-s="thin"><?= $absensi[$siswa->id_siswa]['s'] ?></td>
                                    <td rowspan="5" class="text-center border-primary p-0 align-middle"
                                        data-a-v="middle" data-a-h="center"
                                        data-b-a-s="thin"><?= $absensi[$siswa->id_siswa]['i'] ?></td>
                                    <td rowspan="5" class="text-center border-primary p-0 align-middle"
                                        data-a-v="middle" data-a-h="center"
                                        data-b-a-s="thin"><?= $absensi[$siswa->id_siswa]['a'] ?></td>
                                    <?php
                                    $state = $naik[$siswa->id_siswa];
                                    $text = 'Naik';
                                    if ($state == '0') {
                                        $text = 'Tidak naik';
                                    }
                                    ?>
                                    <td rowspan="5" class="text-center align-middle border-primary px-1" data-a-v="middle" data-a-h="center"
                                        data-b-a-s="thin"><?=$text?></td>
                                    <td rowspan="5" class="border-primary p-0" data-a-v="middle" data-a-h="center"
                                        data-b-a-s="thin"></td>
                                </tr>
                                <tr>
                                    <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                        data-b-a-s="thin">HPTS
                                    </td>
                                    <?php foreach ($arrMapel as $mpl) :
                                        $id = $mpl->id_mapel ?>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin">
                                            <?= $nilai_pts[$siswa->id_siswa]->$id == 0 ? '' : $nilai_pts[$siswa->id_siswa]->$id ?>
                                        </td>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"></td>
                                    <?php endforeach; ?>
                                    <?php foreach ($arrMulok as $mpl) :
                                        $id = $mpl->id_mapel ?>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin">
                                            <?= $nilai_pts[$siswa->id_siswa]->$id == 0 ? '' : $nilai_pts[$siswa->id_siswa]->$id ?>
                                        </td>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"></td>
                                    <?php endforeach; ?>
                                </tr>
                                <tr>
                                    <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                        data-b-a-s="thin">HPAS
                                    </td>
                                    <?php foreach ($arrMapel as $mpl) :
                                        $id = $mpl->id_mapel ?>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->nilai_pas ?></td>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"></td>
                                    <?php endforeach; ?>
                                    <?php foreach ($arrMulok as $mpl) :
                                        $id = $mpl->id_mapel ?>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->nilai_pas ?></td>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"></td>
                                    <?php endforeach; ?>
                                </tr>
                                <tr>
                                    <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                        data-b-a-s="thin">HPA
                                    </td>
                                    <?php foreach ($arrMapel as $mpl) :
                                        $id = $mpl->id_mapel ?>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->nilai ?></td>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->k_rata_rata ?></td>
                                    <?php endforeach; ?>
                                    <?php foreach ($arrMulok as $mpl) :
                                        $id = $mpl->id_mapel ?>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->nilai ?></td>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->k_rata_rata ?></td>
                                    <?php endforeach; ?>
                                </tr>
                                <tr>
                                    <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                        data-b-a-s="thin">PRED
                                    </td>
                                    <?php foreach ($arrMapel as $mpl) :
                                        $id = $mpl->id_mapel ?>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->predikat ?></td>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->k_predikat ?></td>
                                    <?php endforeach; ?>
                                    <?php foreach ($arrMulok as $mpl) :
                                        $id = $mpl->id_mapel ?>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->predikat ?></td>
                                        <td class="text-center border-primary p-0" data-a-v="middle" data-a-h="center"
                                            data-b-a-s="thin"><?= $nilai[$siswa->id_siswa]->$id->k_predikat ?></td>
                                    <?php endforeach; ?>
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
            'columnNum': 3,
        });

        $('#download').on('click', function (e) {
            var table = document.querySelector("#tbl-leger");
            //TableToExcel.convert(table);
            TableToExcel.convert(table, {
                name: "Leger Nilai Kelas " + kelas + " " + tp + " " + smt + ".xlsx",
                //sheet: {name: "Sheet 1"}
            });
        });
    });
</script>
