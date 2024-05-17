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

            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-4">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Tahun</span>
                                </div>
                                <select name="thn" id="tahun" class="form-control">
                                    <?php foreach ($tp as $thn) :
                                        $selected = $tp_selected == $thn->id_tp ? 'selected="selected"' : '' ?>
                                        <option value="<?= $thn->id_tp ?>" <?= $selected ?>><?= $thn->tahun ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Smt</span>
                                </div>
                                <select name="smt" id="smt" class="form-control">
                                    <?php foreach ($smt as $sm) :
                                        $selected = $smt_selected == $sm->id_smt ? 'selected="selected"' : '' ?>
                                        <option value="<?= $sm->id_smt ?>" <?= $selected ?>><?= $sm->nama_smt ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Jadwal</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'jadwal',
                                    $kodejadwal,
                                    $jadwal_selected,
                                    'id="jadwal" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <!--
                        <div class="col-3">
                            <?php if (isset($nilai) && count($nilai) == 0) : ?>
                                <button class="btn btn-primary" id="kalkulasi">Buat Analisa</button>
                            <?php endif; ?>
                        </div>
                        -->
                    </div>
                    <hr>
                    <?php
                    if (isset($soals)) :
                        //echo '<pre>';
                        //$atas = array_slice($nilai, 0, 48, true);
                        //$bawah = array_slice($nilai, 49, 48, true);
                        //var_dump($nilai);

                        //echo '<br>';
                        //var_dump($soals);
                        //echo '</pre>';
                        if (isset($soals[1])) :?>
                            <div class="card card-success col-md-12 p-0">
                                <div class="card-header">
                                    <h3 class="card-title">Soal Pilihan Ganda</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body p-0 table-responsive">
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-bordered w-100">
                                                <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 40px">NO.</th>
                                                    <th>SOAL</th>
                                                    <th colspan="2" class="text-center" style="width: 300px">ANALISA
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($soals[1] as $soal) :?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td>
                                                            <?= $soal->soal ?>
                                                            <br>
                                                            <ol type="A">
                                                                <li>
                                                                    <?= $soal->opsi_a ?>
                                                                </li>
                                                                <li>
                                                                    <?= $soal->opsi_b ?>
                                                                </li>
                                                                <?php if ($info->opsi == 3) : ?>
                                                                    <li>
                                                                        <?= $soal->opsi_c ?>
                                                                    </li>
                                                                <?php elseif ($info->opsi == 4) : ?>
                                                                    <li>
                                                                        <?= $soal->opsi_c ?>
                                                                    </li>
                                                                    <li>
                                                                        <?= $soal->opsi_d ?>
                                                                    </li>
                                                                <?php else : ?>
                                                                    <li>
                                                                        <?= $soal->opsi_c ?>
                                                                    </li>
                                                                    <li>
                                                                        <?= $soal->opsi_d ?>
                                                                    </li>
                                                                    <li>
                                                                        <?= $soal->opsi_e ?>
                                                                    </li>
                                                                <?php endif; ?>
                                                            </ol>
                                                            <p>JAWABAN: <b><?= strtoupper($soal->jawaban ?? '') ?></b></p>
                                                        </td>
                                                        <td style="width: 150px">
                                                            <ul class="chart-legend clearfix m-0">
                                                                <?php
                                                                if ($info->opsi == '3') {
                                                                    $opsis = ['a', 'b', 'c'];
                                                                } elseif ($info->opsi == '4') {
                                                                    $opsis = ['a', 'b', 'c', 'd'];
                                                                } else {
                                                                    $opsis = ['a', 'b', 'c', 'd', 'e'];
                                                                }

                                                                foreach ($opsis as $opsi) :
                                                                    $bg = 'btn-danger';
                                                                    if (strtoupper($opsi ?? '') == strtoupper($soal->jawaban ?? '')) {
                                                                        $bg = 'btn-success';
                                                                    } ?>
                                                                    <li class="m-1">
                                                    <span class="pl-2 pr-2 btn-circle-sm <?= $bg ?>"
                                                          style="white-space: nowrap">
                                                        <?= strtoupper($opsi ?? '') ?>
                                                        = <?= isset($soal->jawaban_siswa['jawab_' . $opsi]) ? count($soal->jawaban_siswa['jawab_' . $opsi]) : 0 ?>
                                                        siswa
                                                    </span>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                            <?php
                                                            if ($soal->status_kesukaran == 'mudah') {
                                                                $warna = 'alert-default-success';
                                                            } else if ($soal->status_kesukaran == 'sedang') {
                                                                $warna = 'alert-default-warning';
                                                            } else {
                                                                $warna = 'alert-default-danger';
                                                            }

                                                            if ($soal->status_valid == 'Valid') {
                                                                $warna_valid = 'alert-default-success';
                                                            } else {
                                                                $warna_valid = 'alert-default-danger';
                                                            }

                                                            if ($soal->daya_pembeda >= 0.70) {
                                                                $warna_daya = 'alert-default-primary';
                                                            } else if ($soal->daya_pembeda >= 0.40) {
                                                                $warna_daya = 'alert-default-success';
                                                            } else if ($soal->daya_pembeda >= 0.20) {
                                                                $warna_daya = 'alert-default-warning';
                                                            } else {
                                                                $warna_daya = 'alert-default-danger';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <p class="alert <?= $warna ?> p-1">
                                                                Kesukaran:<br>
                                                                <b><?= $soal->tingkat_kesukaran ?></b> <?= $soal->status_kesukaran ?>
                                                            </p>
                                                            <p class="alert <?= $warna_valid ?> p-1">
                                                                Validasi:<br>
                                                                <b><?= round($soal->nilai_valid, 2) ?></b> <?= $soal->status_valid ?>
                                                            </p>
                                                            <p class="alert <?= $warna_daya ?> p-1">
                                                                Pembeda:<br>
                                                                <b><?= round($soal->daya_pembeda, 2) ?></b> <?= $soal->status_daya ?>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <?php $no++; endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        if (isset($soals[2])) : ?>
                            <!-- Todo analisis pg kompleks
                            <div class="card card-success col-md-12 p-0">
                                <div class="card-header">
                                    <h3 class="card-title">Soal Pilihan Ganda Kompleks</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body p-0">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 40px">NO.</th>
                                            <th>SOAL</th>
                                            <th colspan="2" class="text-center" style="width: 300px">ANALISA</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                            $no = 1;
                            foreach ($soals[2] as $soal) :
                                $soal->opsi_a = @unserialize($soal->opsi_a ?? '');
                                $soal->jawaban = @unserialize($soal->jawaban ?? '');
                                ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td>
                                                    <?= $soal->soal ?>
                                                    <br>
                                                    <ol type="A">
                                                        <?php foreach ($soal->opsi_a as $abc => $opsi) : ?>
                                                            <li>
                                                                <?= $opsi ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ol>
                                                    <p>JAWABAN: <b><?= strtoupper(implode(", ", $soal->jawaban ?? [''])) ?></b></p>
                                                </td>
                                                <td style="width: 150px">
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                            <?php $no++; endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            -->
                        <?php endif;
                        if (isset($soals[3])) :
                            foreach ($soals[3] as $soal) :
                                $soal->jawaban_siswa = @unserialize($soal->jawaban_siswa ?? '');
                                $soal->jawaban_benar = @unserialize($soal->jawaban_benar ?? '');

                                $soal->jawaban_siswa = json_decode(json_encode($soal->jawaban_siswa));
                                $soal->jawaban_benar = json_decode(json_encode($soal->jawaban_benar));
                                ?>
                                <!-- Todo analisis menjodohkan -->
                            <?php endforeach; endif;
                        if (isset($soals[4])) : ?>
                            <!-- Todo analisis isian singkat -->
                        <?php endif;
                        if (isset($soals[5])) : ?>
                            <!-- Todo analisis uraian -->
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    var idJadwal = '<?=$jadwal_selected?>';
    var isSelected = <?= $jadwal_selected == null ? 0 : 1?>;

    function getDetailJadwal(idJadwal) {
        $('#loading').removeClass('d-none');
        $.ajax({
            type: "GET",
            url: base_url + "cbtstatus/getjadwalujianbyjadwal?id_jadwal=" + idJadwal,
            cache: false,
            success: function (response) {
                $('#loading').addClass('d-none');
                console.log(response);
                var selKelas = $('#kelas');
                selKelas.html('');
                selKelas.append('<option value="">Pilih Kelas</option>');
                $.each(response, function (k, v) {
                    if (v != null) {
                        selKelas.append('<option value="' + k + '">' + v + '</option>');
                    }
                });
            }, error: function (xhr, status, error) {
                console.log("response:", xhr.responseText);
                const err = JSON.parse(xhr.responseText)
                swal.fire({
                    title: "Error",
                    text: err.Message,
                    icon: "error"
                });
            }
        });
    }

    $(document).ready(function () {
        ajaxcsrf();

        var opsiJadwal = $("#jadwal");
        //var opsiKelas = $("#kelas");
        var opsiThn = $("#tahun");
        var opsiSmt = $("#smt");

        var selected = isSelected === 0 ? "selected='selected'" : "";
        opsiJadwal.prepend("<option value='' " + selected + ">Pilih Jadwal</option>");

        //opsiKelas.prepend("<option value='' "+selected+">Pilih Kelas</option>");

        function loadSoal(jadwal, thn, smt) {
            var empty = jadwal === '';
            if (!empty) {
                $('#loading').removeClass('d-none');
                window.location.href = base_url + 'cbtanalisis?jadwal=' + jadwal + '&thn=' + thn + '&smt=' + smt;
            } else {
                console.log('empty')
            }
        }

        function loadJadwalTahun(thn, smt) {
            $('#loading').removeClass('d-none');
            window.location.href = base_url + "cbtanalisis?&thn=" + thn + "&smt=" + smt;
        }

        opsiSmt.change(function () {
            loadJadwalTahun(opsiThn.val(), $(this).val());
        });

        opsiThn.change(function () {
            loadJadwalTahun($(this).val(), opsiSmt.val());
        });

        opsiJadwal.change(function () {
            console.log($(this).val());
            loadSoal($(this).val(), opsiThn.val(), opsiSmt.val())
            //getDetailJadwal($(this).val(), opsiThn.val(), opsiSmt.val());
        });

        $('#kalkulasi').click(function () {
            console.log('test', base_url + "cbtanalisis/kalkulasi?jadwal=" + opsiJadwal.val());
            $.ajax({
                url: base_url + "cbtanalisis/kalkulasi?jadwal=" + opsiJadwal.val(),
                type: "GET",
                success: function (data) {
                    window.location.reload();
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                }
            });
        });

        $('table tbody tr img').each(function () {
            var curSrc = $(this).attr('src');
            console.log('src', curSrc);
            if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                $(this).attr('src', base_url + curSrc);
            } else if (curSrc.indexOf(base_url) === -1) {
                var pathUpload = 'uploads';
                var forReplace = curSrc.split(pathUpload);
                $(this).attr('src', base_url + pathUpload + forReplace[1]);
            }
        });

        opsiThn.select2({theme: 'bootstrap4'});
        opsiSmt.select2({theme: 'bootstrap4'});
        opsiJadwal.select2({theme: 'bootstrap4'});

        /*
        var donutData = {
            labels: [
                'A',
                'B',
                'C',
                'D',
                'E'
            ],
            datasets: [
                {
                    data: [20, 10, 5, 8, 2],
                    backgroundColor: ['#dc3545', '#ffc107', '#28a745', '#17a2b8', '#007bff'],
                }
            ]
        };

        var pieChartCanvas = $('.pieChart').get(0).getContext('2d')
        var pieData = donutData;
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {display: false},
            plugins: {
                labels: {
                    fontSize: 16,
                    fontColor: '#FFFFFF',
                    render: function (args) {
                        return args.label;// + ' ' + args.percentage + '%';
                    },
                    //position: 'outside'
                }
            },
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        });
        */
    });
</script>
