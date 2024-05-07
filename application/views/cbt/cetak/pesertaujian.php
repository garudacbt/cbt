<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('cbtcetak') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card my-shadow">
                <div class="card-header">
                    <div class="card-title">
                        <h6>Cetak</h6>
                    </div>
                    <div class="card-tools">
                        <div id="selector" class="card-tools btn-group">
                            <?php
                            if ($mode == null || $mode == '1') {
                                $bgR = 'btn-primary';
                                $bgK = 'btn-outline-primary';
                            } else {
                                $bgR = 'btn-outline-primary';
                                $bgK = 'btn-primary';
                            }
                            ?>
                            <a href="<?= base_url('cbtcetak/pesertaujian/1') ?>" type="button" class="btn <?= $bgR ?>">By
                                Ruang</a>
                            <a href="<?= base_url('cbtcetak/pesertaujian/2') ?>" type="button" class="btn <?= $bgK ?>">By
                                Kelas</a>
                        </div>

                        <button class="btn bg-success text-white" id="btn-print">
                            <i class="fa fa-print"></i><span class="ml-1">Cetak</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!--
                        <div class="col-md-3 mb-4">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Level Kelas</span>
                                </div>
                                <?php
                        $arrLevel[0] = 'Pilih Level Kelas';
                        if ($setting->jenjang == "1") {
                            for ($i = 1; $i < 7; $i++) {
                                $arrLevel[$i] = $i;
                            }
                        } else if ($setting->jenjang == "2") {
                            for ($j = 7; $j < 10; $j++) {
                                $arrLevel[$j] = $j;
                            }
                        } else {
                            for ($k = 10; $k < 13; $k++) {
                                $arrLevel[$k] = $k;
                            }
                        }
                        echo form_dropdown(
                            'level',
                            $arrLevel,
                            null,
                            'id="level" class="form-control"'
                        ); ?>
                            </div>
                        </div>
                        -->
                        <div class="col-md-6 mb-4">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Jenis Ujian</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'jenis',
                                    $ujian,
                                    null,
                                    'id="jenis" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center bg-gray-light" style="min-height: 300mm">
                        <div id="print-preview" class="m-2">
                            <?php
                            if ($mode == null || $mode == '1'):
                                foreach ($siswa as $ruang => $sesi):
                                    foreach ($sesi as $ses => $sis):?>
                                        <div class="border my-shadow mb-3 p-4 bg-white">
                                            <div class="pt-4"
                                                 style="-webkit-justify-content: center;justify-content: center;background: white;width: 210mm; min-height: 297mm;padding: 1mm">
                                                <div style="display: flex; justify-content: center; align-items: center;">
                                                    <table style="width: 100%; border: 0;">
                                                        <tr>
                                                            <td style="width:15%;">
                                                                <img src="<?= base_url() . $kop->logo_kiri ?>"
                                                                     style="width:85px; height:85px; margin: 6px;">
                                                            </td>
                                                            <td style="width:70%; text-align: center;">
                                                                <div style="line-height: 1.1;font-size: 13pt"><?= $kop->sekolah ?></div>
                                                                <div style="line-height: 1.1;font-size: 16pt"><b>DAFTAR
                                                                        PESERTA</b>
                                                                </div>
                                                                <div style="line-height: 1.1;font-size: 14pt"
                                                                     class="jenis-ujian">Jenis
                                                                    Ujian
                                                                </div>
                                                                <div style="line-height: 1.1;font-size: 12pt">Tahun
                                                                    Pelajaran: <?= $tp_active->tahun ?>
                                                            </td>
                                                            <td style="width:15%;">
                                                                <img src="<?= base_url() . $kop->logo_kanan ?>"
                                                                     style="width:85px; height:85px; margin: 6px; border-style: none">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <hr class="m-0">
                                                <?php
                                                $se = $sesis[$sis[0]->kode_sesi] ?? [];
                                                $nama_sesi = $se->nama_sesi ?? '';
                                                $mulai_sesi = $se->waktu_mulai ?? '';
                                                $akhir_sesi = $se->waktu_akhir ?? '';
                                                ?>
                                                <table style="margin-top: 8px">
                                                    <tr>
                                                        <td style="width: 100px">RUANG</td>
                                                        <td> : </td>
                                                        <td><b><?= $sis[0]->nama_ruang ?></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>SESI</td>
                                                        <td> : </td>
                                                        <td><b><?= $nama_sesi ?></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>WAKTU</td>
                                                        <td> : </td>
                                                        <td><b>
                                                            <?= date('H:i', strtotime($mulai_sesi)) ?>
                                                            sampai
                                                            <?= date('H:i', strtotime($akhir_sesi)) ?></b>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table style="width: 100%; border: 1px solid black;border-collapse: collapse; font-size: 10pt;margin-top: 8px">
                                                    <thead>
                                                    <tr>
                                                        <th style="border: 1px solid black; width: 40px; height: 50px; text-align: center;">
                                                            NO
                                                        </th>
                                                        <th style="border: 1px solid black; text-align: center;">NO.
                                                            PESERTA
                                                        </th>
                                                        <th style="border: 1px solid black; text-align: center;">NAMA
                                                            PESERTA
                                                        </th>
                                                        <th style="border: 1px solid black; text-align: center;">KELAS
                                                        </th>
                                                        <th style="border: 1px solid black; text-align: center;">RUANG
                                                        </th>
                                                        <th style="border: 1px solid black; text-align: center;">SESI
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($sis as $s) :?>
                                                        <tr>
                                                            <td style="border: 1px solid black; text-align: center;height: 30px">
                                                                <?= $no ?>
                                                            </td>
                                                            <td style="border: 1px solid black; text-align: center;"><?= $s->nomor_peserta ?></td>
                                                            <td style="border: 1px solid black; padding: 1px 0 1px 6px"><?= $s->nama ?></td>
                                                            <td style="border: 1px solid black; text-align: center;"><?= $s->nama_kelas ?></td>
                                                            <td style="border: 1px solid black; text-align: center;"><?= $s->nama_ruang ?></td>
                                                            <td style="border: 1px solid black; text-align: center;"><?= $s->nama_sesi ?></td>
                                                        </tr>
                                                        <?php $no++; endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div style="page-break-after: always"></div>
                                    <?php endforeach; ?>
                                <?php endforeach;
                            else:
                                foreach ($siswa as $kelas => $sis): ?>
                                    <div class="border my-shadow mb-3 p-4 bg-white">
                                        <div class="pt-4"
                                             style="-webkit-justify-content: center;justify-content: center;background: white;width: 210mm; min-height: 297mm;padding: 1mm">
                                            <div style="display: flex; justify-content: center; align-items: center;">
                                                <table style="width: 100%; border: 0;">
                                                    <tr>
                                                        <td style="width:15%;">
                                                            <img src="<?= base_url() . $kop->logo_kiri ?>"
                                                                 style="width:85px; height:85px; margin: 6px;">
                                                        </td>
                                                        <td style="width:70%; text-align: center;">
                                                            <div style="line-height: 1.1;font-size: 13pt"><?= $kop->sekolah ?></div>
                                                            <div style="line-height: 1.1;font-size: 16pt"><b>DAFTAR
                                                                    PESERTA</b>
                                                            </div>
                                                            <div style="line-height: 1.1;font-size: 14pt"
                                                                 class="jenis-ujian">Jenis
                                                                Ujian
                                                            </div>
                                                            <div style="line-height: 1.1;font-size: 12pt">Tahun
                                                                Pelajaran: <?= $tp_active->tahun ?>
                                                        </td>
                                                        <td style="width:15%;">
                                                            <img src="<?= base_url() . $kop->logo_kanan ?>"
                                                                 style="width:85px; height:85px; margin: 6px; border-style: none">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <hr class="m-0">
                                            <table>
                                                <tr>
                                                    <td style="width: 100px">Kelas</td>
                                                    <td> :</td>
                                                    <td> <?= $sis[0]->nama_kelas ?></td>
                                                </tr>
                                                <?php foreach ($sesis as $sss) : ?>
                                                    <tr>
                                                        <td><?= $sss->nama_sesi ?></td>
                                                        <td> :</td>
                                                        <td>
                                                            <?php
                                                            //var_dump($sss);
                                                            ?>
                                                            <?= date('H:i', strtotime($sss->waktu_mulai)) ?>
                                                            sampai
                                                            <?= date('H:i', strtotime($sss->waktu_akhir)) ?>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </table>
                                            <table style="width: 100%; border: 1px solid black;border-collapse: collapse; font-size: 10pt">
                                                <thead>
                                                <tr>
                                                    <th style="border: 1px solid black; width: 40px; height: 40px; text-align: center;">
                                                        NO
                                                    </th>
                                                    <th style="border: 1px solid black; text-align: center;">NO.
                                                        PESERTA
                                                    </th>
                                                    <th style="border: 1px solid black; text-align: center;">NAMA
                                                        PESERTA
                                                    </th>
                                                    <th style="border: 1px solid black; text-align: center;">KELAS
                                                    </th>
                                                    <th style="border: 1px solid black; text-align: center;">RUANG
                                                    </th>
                                                    <th style="border: 1px solid black; text-align: center;">SESI
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($sis as $s) :?>
                                                    <tr>
                                                        <td style="border: 1px solid black; text-align: center;"><?= $no ?></td>
                                                        <td style="border: 1px solid black; text-align: center;"><?= $s->nomor_peserta ?></td>
                                                        <td style="border: 1px solid black;padding: 1px 0 1px 6px"><?= $s->nama ?></td>
                                                        <td style="border: 1px solid black; text-align: center;"><?= $s->nama_kelas ?></td>
                                                        <td style="border: 1px solid black; text-align: center;"><?= $s->nama_ruang ?></td>
                                                        <td style="border: 1px solid black; text-align: center;"><?= $s->nama_sesi ?></td>
                                                    </tr>
                                                    <?php $no++; endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div style="page-break-after: always"></div>
                                <?php endforeach; endif; ?>
                        </div>
                    </div>
                    <div class="overlay d-none" id="loading">
                        <div class="spinner-grow"></div>
                    </div>
                </div>
            </div>
    </section>
</div>

<script src="<?= base_url() ?>/assets/app/js/print-area.js"></script>
<script>
    var logoKanan = "<?= isset($kop->logo_kiri) ? base_url() . $kop->logo_kiri : "" ?>";
    var logoKiri = "<?= isset($kop->logo_kanan) ? base_url() . $kop->logo_kanan : ""?>";
    var sklh = "<?= isset($kop->sekolah) ? $kop->sekolah : "" ?>";

    $(document).ready(function () {
        ajaxcsrf();
        var opsiJenis = $("#jenis");

        //opsiJenis.prepend("<option value="" selected='selected'>Pilih Jenis Ujian</option>");

        opsiJenis.change(function () {
            $('.jenis-ujian').text($("#jenis option:selected").text().toUpperCase());
        });

        opsiJenis.select2({theme: 'bootstrap4'});

        $("#btn-print").click(function () {
            if (opsiJenis.val() === '') {
                Swal.fire({
                    title: "ERROR",
                    text: "Isi semua pilihan terlebih dulu",
                    icon: "error"
                })
            } else {
                $('#print-preview').print();
            }
        });
    })
</script>
