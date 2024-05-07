<div class="content-wrapper bg-white pt-4">
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
                <div class="card-header">
                    <div class="btn-group mb-1">
                        <?php $active1 = $mode == '1' ? ' active' : ''; ?>
                        <?php $active2 = $mode == '2' ? ' active' : ''; ?>
                        <?php $active3 = $mode == '3' ? ' active' : ''; ?>
                        <?php $active4 = $mode == '4' ? ' active' : ''; ?>
                        <a href="<?= base_url('bukurapor/editnilairapor?id_siswa=' . $id_siswa . '&mode=1') ?>"
                           type="button"
                           class="btn btn-sm btn-outline-primary<?= $active1 ?>"><i class="fa fa-pencil"></i> Sikap</a>
                        <a href="<?= base_url('bukurapor/editnilairapor?id_siswa=' . $id_siswa . '&mode=2') ?>"
                           type="button"
                           class="btn btn-sm btn-outline-primary<?= $active2 ?>"><i class="fa fa-pencil"></i>
                            Pengetahuan</a>
                        <a href="<?= base_url('bukurapor/editnilairapor?id_siswa=' . $id_siswa . '&mode=3') ?>"
                           type="button"
                           class="btn btn-sm btn-outline-primary<?= $active3 ?>"><i class="fa fa-pencil"></i>
                            Keterampilan</a>
                        <a href="<?= base_url('bukurapor/editnilairapor?id_siswa=' . $id_siswa . '&mode=4') ?>"
                           type="button"
                           class="btn btn-sm btn-outline-primary<?= $active4 ?>"><i class="fa fa-pencil"></i> Lain-lain</a>
                    </div>
                    <div class="card-tools">
                        <button class="btn btn-primary btn-sm ml-1">
                            <i class="fas fa-save"></i> Simpan Nilai
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="table-info-print" style="width: 100%; border: 0;">
                        <tbody>
                        <tr style="font-family: 'Tahoma';vertical-align: top">
                            <td style="width:20%;">Nama</td>
                            <td>:</td>
                            <td style="width:40%;"><b><?= strtoupper($siswa->nama ?? '') ?></b></td>
                            <td style="width:20%;">Kelas</td>
                            <td>:</td>
                            <td style="width:20%;"><b><?= $siswa->nama_kelas ?></b></td>
                        </tr>
                        <tr style="font-family: 'Tahoma';vertical-align: top">
                            <td>No. Induk/NISN</td>
                            <td>:</td>
                            <td><b><?= $siswa->nis . '/' . $siswa->nisn ?></b></td>
                            <td>Semester</td>
                            <td>:</td>
                            <td><b><?= $smt_sel->nama_smt ?></b></td>
                        </tr>
                        <tr style="font-family: 'Tahoma';vertical-align: top">
                            <td>Nama <?= $setting->satuan_pendidikan == 2 ? 'Madrasah' : 'Sekolah' ?></td>
                            <td>:</td>
                            <td><b><?= $setting->sekolah ?></b></td>
                            <td>Tahun Pelajaran</td>
                            <td>:</td>
                            <td><b><?= $tp_sel->tahun ?></b></td>
                        </tr>
                        <tr style="font-family: 'Tahoma';vertical-align: top">
                            <td>Alamat</td>
                            <td>:</td>
                            <td><b><?= $setting->alamat ?></b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <?php if ($mode == '1') : ?>
                        <div id="nilai1">
                            <span style="font-family: 'Tahoma';"><b>A. SIKAP</b></span><br>
                            <span style="font-family: 'Tahoma';"><b>1. Sikap Spiritual</b></span>
                            <div style="display: flex;-webkit-justify-content: center;justify-content: center;margin-top: 4px;">
                                <?php
                                $a = unserialize($sikap[0]->nilai ?? '');
                                $pred_a = $a['predikat'];
                                $desk_a = $sikap[0]->deskripsi;

                                $b = unserialize($sikap[1]->nilai ?? '');
                                $pred_b = $b['predikat'];
                                $desk_b = $sikap[1]->deskripsi;
                                ?>
                                <table style="width: 100%; border: 2px solid black; border-collapse: collapse">
                                    <tbody>
                                    <tr style="font-family: 'Tahoma';text-align: center">
                                        <td style="width: 20%;height:30px;border: 1px solid black; border-collapse: collapse;background: #E6E7E9">
                                            <b>Predikat</b></td>
                                        <td style="width:80%;border: 1px solid black; border-collapse: collapse;background: #E6E7E9">
                                            <b>Deskripsi</b></td>
                                    </tr>
                                    <tr style="font-family: 'Tahoma';">
                                        <td class="editable"
                                            style="width: 30%;height:200px;border: 1px solid black; border-collapse: collapse;text-align: center">
                                            <b><?= $pred_a ?></b></td>
                                        <td class="editable"
                                            style="width:70%;border: 1px solid black; border-collapse: collapse;padding: 6px"><?= $desk_a ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br><br> <span style="font-family: 'Tahoma';"><b>2. Sikap Sosial</b></span>
                            <div style="display: flex;-webkit-justify-content: center;justify-content: center;margin-top: 4px;">
                                <table style="width: 100%; border: 2px solid black; border-collapse: collapse">
                                    <tbody>
                                    <tr style="font-family: 'Tahoma';text-align: center">
                                        <td style="width: 20%;height:30px;border: 1px solid black; border-collapse: collapse;background: #E6E7E9">
                                            <b>Predikat</b></td>
                                        <td style="width:80%;border: 1px solid black; border-collapse: collapse;background: #E6E7E9">
                                            <b>Deskripsi</b></td>
                                    </tr>
                                    <tr style="font-family: 'Tahoma';">
                                        <td class="editable"
                                            style="width: 30%;height:200px;border: 1px solid black; border-collapse: collapse;text-align: center">
                                            <b><?= $pred_b ?></b></td>
                                        <td class="editable"
                                            style="width:70%;border: 1px solid black; border-collapse: collapse;padding: 6px;vertical-align: center"><?= $desk_b ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                    <?php elseif ($mode == '2') :
                        echo '<pre>';
                        var_dump($nilai_sikap);
                        echo '</pre>';
                        ?>
                        <div id="nilai2">
                            <span style="font-family: 'Tahoma';"><b>B. PENGETAHUAN</b></span><br> <span
                                    style="font-family: 'Tahoma';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kreteria Ketuntasan Minimal: <b>65</b></span><br>
                            <table style="width: 100%;border: 2px solid black; border-collapse: collapse;margin-top: 6px">
                                <tbody>
                                <tr style="font-family: 'Tahoma';text-align: center;background: #E6E7E9">
                                    <td rowspan="2" style="width:5%;border: 1px solid black; border-collapse: collapse">
                                        <b>NO</b>
                                    </td>
                                    <td rowspan="2"
                                        style="width:20%;border: 1px solid black; border-collapse: collapse"><b>Mata
                                            Pelajaran</b></td>
                                    <td rowspan="2"
                                        style="width:7%;border: 1px solid black; border-collapse: collapse;display:none;">
                                        <b>KKM</b></td>
                                    <td colspan="3"
                                        style="height:25px;border: 1px solid black; border-collapse: collapse">
                                        <b>Pengetahuan</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';text-align: center;background: #E6E7E9">
                                    <td style="width:7%;height:25px;border: 1px solid black; border-collapse: collapse">
                                        <b>Nilai</b>
                                    </td>
                                    <td style="width:9%;border: 1px solid black; border-collapse: collapse">
                                        <b>Predikat</b>
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse"><b>Deskripsi</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td colspan="5"
                                        style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4">
                                        <b>Kelompok A (Wajib)</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td rowspan="5"
                                        style="border: 1px solid black; border-collapse: collapse; text-align: center; vertical-align: top; padding: 6px">
                                        1
                                    </td>
                                    <td colspan="4"
                                        style="border: 1px solid black; border-collapse: collapse; vertical-align: top; padding: 6px">
                                        Pendidikan Agama Islam
                                    </td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        a. Al Quran-Hadis
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        b. Akidah Akhlak
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        c. Fiqih
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        d. Sejarah Kebudayaan Islam
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        2
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Pendidikan Pancasila dan Kewarganegaraan
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        3
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Bahasa Arab
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        4
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Bahasa Indonesia
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        5
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Matematika
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        6
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Ilmu Pengetahuan Alam
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        7
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Ilmu Pengetahuan Sosial
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        8
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Bahasa Inggris
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td colspan="5"
                                        style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4">
                                        <b>Kelompok B</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        1
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Seni Budaya
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        2
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Prakarya
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        3
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Pendidikan Jasmani Olah Raga dan Kesehatan
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        4
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Seni Budaya dan Prakarya
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td colspan="5"
                                        style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4">
                                        <b>Muatan Lokal</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        1
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Bahasa Sunda
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td colspan="5"
                                        style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4">
                                        <b>TEMATIK</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        1
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 1
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        2
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 2
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        3
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 3
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        4
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 4
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        5
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 5
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        6
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 6
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        7
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 7
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        8
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 8
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        9
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 9
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                </tbody>
                            </table>
                            <br>
                        </div>
                    <?php elseif ($mode == '3') : ?>
                        <div id="nilai3">
                            <span style="font-family: 'Tahoma';"><b>C. KETERAMPILAN</b></span><br> <span
                                    style="font-family: 'Tahoma';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kreteria Ketuntasan Minimal: <b>65</b></span><br>
                            <table style="width: 100%;border: 2px solid black; border-collapse: collapse;margin-top: 6px">
                                <tbody>
                                <tr style="font-family: 'Tahoma';text-align: center;background: #E6E7E9">
                                    <td rowspan="2" style="width:5%;border: 1px solid black; border-collapse: collapse">
                                        <b>NO</b>
                                    </td>
                                    <td rowspan="2"
                                        style="width:25%;border: 1px solid black; border-collapse: collapse"><b>Mata
                                            Pelajaran</b></td>
                                    <td rowspan="2"
                                        style="width:7%;border: 1px solid black; border-collapse: collapse;display:none;">
                                        <b>KKM</b></td>
                                    <td colspan="3"
                                        style="height:25px;border: 1px solid black; border-collapse: collapse">
                                        <b>Keterampilan</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';text-align: center;background: #E6E7E9">
                                    <td style="width:7%;height:25px;border: 1px solid black; border-collapse: collapse">
                                        <b>Nilai</b>
                                    </td>
                                    <td style="width:9%;border: 1px solid black; border-collapse: collapse">
                                        <b>Predikat</b>
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse"><b>Deskripsi</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td colspan="5"
                                        style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4">
                                        <b>Kelompok A (Wajib)</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td rowspan="5"
                                        style="border: 1px solid black; border-collapse: collapse; text-align: center; vertical-align: top; padding: 6px">
                                        1
                                    </td>
                                    <td colspan="4"
                                        style="border: 1px solid black; border-collapse: collapse; vertical-align: top; padding: 6px">
                                        Pendidikan Agama Islam
                                    </td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        a. Al Quran-Hadis
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        b. Akidah Akhlak
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        c. Fiqih
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        d. Sejarah Kebudayaan Islam
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        2
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Pendidikan Pancasila dan Kewarganegaraan
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        3
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Bahasa Arab
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        4
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Bahasa Indonesia
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        5
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Matematika
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        6
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Ilmu Pengetahuan Alam
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        7
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Ilmu Pengetahuan Sosial
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        8
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Bahasa Inggris
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td colspan="5"
                                        style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4">
                                        <b>Kelompok B</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        1
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Seni Budaya
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        2
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Prakarya
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        3
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Pendidikan Jasmani Olah Raga dan Kesehatan
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        4
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Seni Budaya dan Prakarya
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td colspan="5"
                                        style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4">
                                        <b>Muatan Lokal</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        1
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        Bahasa Sunda
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td colspan="5"
                                        style="border: 1px solid black; border-collapse: collapse; padding: 2px 8px 2px 8px;background:#F1F3F4">
                                        <b>TEMATIK</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        1
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 1
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        2
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 2
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        3
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 3
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        4
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 4
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        5
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 5
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        6
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 6
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        7
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 7
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        8
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 8
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        9
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px">
                                        TEMA 9
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;display:none;">
                                        <b>65</b></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding: 2px 4px 2px 4px;font-size: 8pt;line-height: 1.3;text-align: justify"></td>
                                </tr>
                                </tbody>
                            </table>
                            <br>
                        </div>
                    <?php elseif ($mode == '4') : ?>
                        <div id="nilai4">
                            <span style="font-family: 'Tahoma';"><b>D. EKSTRAKURIKULER</b></span><br>
                            <table style="width: 100%;border: 2px solid black; border-collapse: collapse;margin-top: 6px">
                                <tbody>
                                <tr style="font-family: 'Tahoma';text-align: center;background: #E6E7E9">
                                    <td style="width:5%;border: 1px solid black; border-collapse: collapse"><b>NO</b>
                                    </td>
                                    <td style="width:35%;border: 1px solid black; border-collapse: collapse"><b>Kegiatan
                                            Ekstrakurikuler</b></td>
                                    <td style="width:15%;height:35px;border: 1px solid black; border-collapse: collapse">
                                        <b>Nilai</b>
                                    </td>
                                    <td style="width:45%;border: 1px solid black; border-collapse: collapse">
                                        <b>Keterangan</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        1
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 4px">
                                        Baca
                                        Tulis Al Quran
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 4px"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        2
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 4px">
                                        Shalat
                                        Dhuha
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse; padding-left: 4px"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        3
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse;"></td>
                                </tr>
                                </tbody>
                            </table>
                            <br><span style="font-family: 'Tahoma';"><b>E. PRESTASI</b></span><br>
                            <table style="width: 100%;border: 2px solid black; border-collapse: collapse;margin-top: 6px">
                                <tbody>
                                <tr style="font-family: 'Tahoma';text-align: center;background: #E6E7E9">
                                    <td style="width:5%;height:35px;border: 1px solid black; border-collapse: collapse">
                                        <b>NO</b>
                                    </td>
                                    <td style="width:35%;border: 1px solid black; border-collapse: collapse"><b>Jenis
                                            Kegiatan</b></td>
                                    <td style="width:60%;border: 1px solid black; border-collapse: collapse">
                                        <b>Deskripsi</b></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        1
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse;"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        2
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse;"></td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse; text-align: center;">
                                        3
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse;"></td>
                                    <td style="border: 1px solid black; border-collapse: collapse;"></td>
                                </tr>
                                </tbody>
                            </table>
                            <br>
                            <span style="font-family: 'Tahoma';"><b>F. KONDISI KESEHATAN DAN FISIK</b></span>
                            <div style="display: flex">
                                <table style="width: 58%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">
                                    <tbody>
                                    <tr style="font-family: 'Tahoma';background: #E6E7E9;text-align: center">
                                        <td style="border: 1px solid black; border-collapse: collapse;height:35px"><b>Aspek
                                                yang Dinilai</b></td>
                                        <td style="border: 1px solid black; border-collapse: collapse"><b>Keterangan</b>
                                        </td>
                                    </tr>
                                    <tr style="font-family: 'Tahoma';">
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">
                                            Pendengaran
                                        </td>
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px"></td>
                                    </tr>
                                    <tr style="font-family: 'Tahoma';">
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">
                                            Penglihatan
                                        </td>
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px"></td>
                                    </tr>
                                    <tr style="font-family: 'Tahoma';">
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">
                                            Gigi
                                        </td>
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px"></td>
                                    </tr>
                                    <tr style="font-family: 'Tahoma';">
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">
                                            Lain-lain
                                        </td>
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px"></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div style="width: 2%"></div>
                                <table style="width: 40%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">
                                    <tbody>
                                    <tr style="font-family: 'Tahoma';background: #E6E7E9;text-align: center">
                                        <td rowspan="2"
                                            style="width:40%;border: 1px solid black; border-collapse: collapse"><b>Aspek
                                                yang Dinilai</b></td>
                                        <td colspan="2"
                                            style="width:60%;border: 1px solid black; border-collapse: collapse">
                                            <b>Semester</b></td>
                                    </tr>
                                    <tr style="font-family: 'Tahoma';text-align: center;background: #E6E7E9">
                                        <td style="width:30%;border: 1px solid black; border-collapse: collapse">
                                            <b>1</b>
                                        </td>
                                        <td style="width:30%;border: 1px solid black; border-collapse: collapse">
                                            <b>2</b>
                                        </td>
                                    </tr>
                                    <tr></tr>
                                    <tr style="font-family: 'Tahoma';">
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">
                                            Tinggi Badan
                                        </td>
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px;text-align: center"></td>
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px;text-align: center"></td>
                                    </tr>
                                    <tr style="font-family: 'Tahoma';">
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">
                                            Berat Badan
                                        </td>
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px;text-align: center"></td>
                                        <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px;text-align: center"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <span style="font-family: 'Tahoma';"><b>G. KETIDAKHADIRAN</b></span>
                            <table style="width: 50%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">
                                <tbody>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="width:70%;border: 1px solid black; border-collapse: collapse;padding-left: 6px">
                                        Sakit
                                    </td>
                                    <td style="width:30%;border: 1px solid black; border-collapse: collapse;padding-left: 6px">
                                        - hari
                                    </td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">
                                        Izin
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px"> -
                                        hari
                                    </td>
                                </tr>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px">
                                        Tanpa
                                        Keterangan
                                    </td>
                                    <td style="border: 1px solid black; border-collapse: collapse;padding-left: 6px"> -
                                        hari
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <br>
                            <span style="font-family: 'Tahoma';"><b>H. CATATAN WALI KELAS</b></span><br>
                            <table style="width: 100%;border: 1px solid black; border-collapse: collapse;margin-top: 6px">
                                <tbody>
                                <tr style="font-family: 'Tahoma';">
                                    <td style="width:100%;border: 1px solid black; border-collapse: collapse;padding-left: 6px">
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td style="vertical-align: top; width:12%;">Ranking ke:</td>
                                                <td style="vertical-align: top; width:88%;">.</td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top">Saran-saran:</td>
                                                <td>undefined</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <br>
                        </div>
                    <?php endif; ?>
                    <hr>
                    <span class="text-danger">Jangan lupa untuk menyimpan pada setiap perubahan</span>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        $('.editable').attr('contentEditable', true);
    })

</script>
