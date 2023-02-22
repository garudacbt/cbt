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
                    <div class="row">
                        <?php
                        $mapelNone = $filter_selected != '1' ? 'd-none' : '';
                        $extraNone = $filter_selected != '2' ? 'd-none' : '';
                        ?>
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Filter</span>
                                </div>
                                <?php
                                echo form_dropdown('filter', $filter, $filter_selected, 'id="filter" class="form-control"'); ?>
                            </div>
                        </div>
                        <div id="opmapel" class="col-md-5 mb-3 <?= $mapelNone ?>">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Mata Pelajaran</span>
                                </div>
                                <?php
                                echo form_dropdown('mapel', $mapel, $mapel_selected, 'id="mapel" class="form-control"'); ?>
                            </div>
                        </div>
                        <div id="opekstra" class="col-md-5 mb-3 <?= $extraNone ?>">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Ekstrakurikuler</span>
                                </div>
                                <?php
                                echo form_dropdown('ekstra', $ekstra, $ekstra_selected, 'id="ekstra" class="form-control"'); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    //echo '<pre>';
                    //var_dump($guru_mapel);
                    //var_dump($guru_mapels[7]->nama_guru);
                    //var_dump($guru_mapels[7]->mapel_kelas);
                    //var_dump($guru_mapels[7]->mapel_kelas[0]['id_mapel']);
                    //var_dump($guru_mapels[7]->mapel_kelas[0]['kelas_mapel'][0]['kelas']);
                    //echo '</pre>';
                    if (isset($siswa)) : ?>
                        <div class="overflow-auto">
                            <?php
                            $widthTable = $mapelNone ? '800px' : '2000px';
                            $widthNama = $mapelNone ? '30%' : '10%';
                            $widthDesk = $mapelNone ? '50%' : '30%';
                            ?>
                            <table id="table-nilai" class="table table-bordered table-striped text-sm"
                                   style="width: <?= $widthTable ?>">
                                <thead>
                                <tr class="bg-gray">
                                    <th rowspan="2" class="text-center align-middle">NO</th>
                                    <th rowspan="2" class="text-center align-middle">NIS/NISN</th>
                                    <th rowspan="2" class="text-center align-middle" style="width: <?= $widthNama ?>;">
                                        NAMA
                                    </th>
                                    <?php if ($extraNone) : ?>
                                        <th colspan="8" class="text-center">NILAI PENGETAHUAN</th>
                                        <th rowspan="2" class="text-center align-middle">RPH P</th>
                                        <th rowspan="2" class="text-center align-middle">PRED P</th>
                                        <th rowspan="2" class="text-center align-middle"
                                            style="width: <?= $widthDesk ?>">DESKRIPSI PENGETAHUAN
                                        </th>
                                        <th colspan="8" class="text-center">NILAI KETERAMPILAN</th>
                                        <th rowspan="2" class="text-center align-middle">RPH K</th>
                                        <th rowspan="2" class="text-center align-middle">PRED K</th>
                                        <th rowspan="2" class="text-center align-middle"
                                            style="width: <?= $widthDesk ?>">DESKRIPSI KETERAMPILAN
                                        </th>
                                    <?php else: ?>
                                        <th rowspan="2" class="text-center">NILAI</th>
                                        <th rowspan="2" class="text-center align-middle">PRED</th>
                                        <th rowspan="2" class="text-center align-middle"
                                            style="width: <?= $widthDesk ?>">DESKRIPSI
                                        </th>
                                    <?php endif; ?>
                                </tr>
                                <?php if ($extraNone) : ?>
                                    <tr class="bg-gray">
                                        <th class="text-center">P1</th>
                                        <th class="text-center">P2</th>
                                        <th class="text-center">P3</th>
                                        <th class="text-center">P4</th>
                                        <th class="text-center">P5</th>
                                        <th class="text-center">P6</th>
                                        <th class="text-center">P7</th>
                                        <th class="text-center">P8</th>
                                        <th class="text-center">K1</th>
                                        <th class="text-center">K2</th>
                                        <th class="text-center">K3</th>
                                        <th class="text-center">K4</th>
                                        <th class="text-center">K5</th>
                                        <th class="text-center">K6</th>
                                        <th class="text-center">K7</th>
                                        <th class="text-center">K8</th>
                                    </tr>
                                <?php endif; ?>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                foreach ($siswa as $s) :
                                    $ns = $nilai[$s->id_siswa] ?>
                                    <tr>
                                        <td class="text-center"><?= $no ?></td>
                                        <td class="text-center"><?= $s->nis ?></td>
                                        <td><?= $s->nama ?></td>
                                        <?php if ($extraNone) : ?>
                                            <td class="text-center nilai"><?= $ns->p1 ?></td>
                                            <td class="text-center nilai"><?= $ns->p2 ?></td>
                                            <td class="text-center nilai"><?= $ns->p3 ?></td>
                                            <td class="text-center nilai"><?= $ns->p4 ?></td>
                                            <td class="text-center nilai"><?= $ns->p5 ?></td>
                                            <td class="text-center nilai"><?= $ns->p6 ?></td>
                                            <td class="text-center nilai"><?= $ns->p7 ?></td>
                                            <td class="text-center nilai"><?= $ns->p8 ?></td>
                                            <td class="text-center nilai text-bold"><?= $ns->p_rata_rata ?></td>
                                            <td class="text-center text-bold"><?= $ns->p_predikat ?></td>
                                            <td style="font-size: 8pt"><?= $ns->p_deskripsi ?></td>
                                            <td class="text-center nilai"><?= $ns->k1 ?></td>
                                            <td class="text-center nilai"><?= $ns->k2 ?></td>
                                            <td class="text-center nilai"><?= $ns->k3 ?></td>
                                            <td class="text-center nilai"><?= $ns->k4 ?></td>
                                            <td class="text-center nilai"><?= $ns->k5 ?></td>
                                            <td class="text-center nilai"><?= $ns->k6 ?></td>
                                            <td class="text-center nilai"><?= $ns->k7 ?></td>
                                            <td class="text-center nilai"><?= $ns->k8 ?></td>
                                            <td class="text-center nilai text-bold"><?= $ns->k_rata_rata ?></td>
                                            <td class="text-center text-bold"><?= $ns->k_predikat ?></td>
                                            <td style="font-size: 8pt"><?= $ns->k_deskripsi ?></td>
                                        <?php else: ?>
                                            <td class="text-center nilai"><?= $ns->nilai ?></td>
                                            <td class="text-center"><?= $ns->predikat ?></td>
                                            <td class="text-center"><?= $ns->deskripsi ?></td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php $no++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        ajaxcsrf();

        //$('#table-nilai').dataTable();

        var opsiFilter = $("#filter");
        var opsiMapel = $("#mapel");
        var opsiEskul = $("#ekstra");

        function loadSiswaKelas(filter, id) {
            var empty = id === null;
            if (!empty) {
                $('#loading').removeClass('d-none');
                window.location.href = base_url + 'rapor/rapornilaiguru/' + filter + '/' + id;
            } else {
                console.log('empty')
            }
        }

        opsiFilter.change(function () {
            if ($(this).val() == '1') {
                $('#opmapel').removeClass('d-none');
                $('#opekstra').addClass('d-none');
                opsiMapel.val('');
                opsiEskul.val('');
            } else if ($(this).val() == '2') {
                $('#opekstra').removeClass('d-none');
                $('#opmapel').addClass('d-none');
                opsiMapel.val('');
                opsiEskul.val('');
            } else {
                $('#opmapel').addClass('d-none');
                $('#opekstra').addClass('d-none');
                opsiMapel.val('');
                opsiEskul.val('');
            }
        });

        opsiMapel.change(function () {
            loadSiswaKelas(opsiFilter.val(), $(this).val())
        });

        opsiEskul.change(function () {
            loadSiswaKelas(opsiFilter.val(), $(this).val())
        });

        $.each($('.nilai'), function () {
            var nn = parseInt($(this).text());
            if (!isNaN(nn)) {
                console.log('nilai', nn);
                if (nn < 70) {
                    $(this).attr('style', 'background: #dc3545;');
                } else if (nn < 80) {
                    $(this).attr('style', 'background: #ffc107;');
                } else if (nn >= 80) {
                    $(this).attr('style', 'background: #20c997;');
                }
            }
        });
    })

</script>
