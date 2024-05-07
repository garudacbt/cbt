<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul . $kelas['nama_kelas'] ?></h1>
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
            <div class="card my-shadow mb-4">
                <div class="card-header py-3">
                    <div class="card-title">
                        <h6><b>Template Nilai <?= $mapel['nama_mapel'] ?></b></h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php if ($kkm == null): ?>
                            <div class="alert alert-default-danger align-content-center" role="alert">
                                Download template tidak tersedia, Anda harus mengisi KKM terlebih dahulu di menu <b>DATA
                                    RAPOR > KKM DAN BOBOT</b>
                            </div>
                        <?php else: ?>
                            <div class="col-md-4 mb-3">
                                <div type="button" class="btn btn-primary w-100" onclick="processDownload(<?= $mapel['id_mapel'] ?>, <?= $kelas['id_kelas'] ?>)">
                                    <i class="fa fa-download"></i> <span class="ml-1">Download Template</span>
                                </div>
                                <!--
                                <a href="<?= base_url('rapor/downloadtemplateharian/' . $mapel['id_mapel'] . '/' . $kelas['id_kelas']) ?>"
                                   id="download" type="button" class="btn btn-primary w-100">
                                    <i class="fa fa-download"></i> <span class="ml-1">Download Template</span>
                                </a>
                                -->
                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-8">
                                        <?= form_open_multipart('', array('id' => 'uploadfile')); ?>
                                        <div class="custom-file">
                                            <input type="file" name="upload_file" class="custom-file-input" id="custom-file">
                                            <label class="custom-file-label" for="customFile">Pilih file excel</label>
                                        </div>
                                        <?= form_close(); ?>
                                    </div>

                                    <div class="col-4">
                                        <button id="upload" class="btn btn-success w-100">
                                            <i class="fa fa-upload"></i> <span class="ml-1">Upload</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <hr>
                </div>
            </div>

            <?= form_open('', array('id' => 'editkikd')) ?>
            <div class="card my-shadow mb-4">
                <div class="card-header py-3">
                    <div class="card-title">
                        <h6><b>Indikator Penilaian <?= $mapel['nama_mapel'] ?></b></h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-info align-content-center" role="alert">
                        - Penulisan ringkasan KD/indikator KD max 70 huruf
                        <br>
                        - Klik pada tiap teks untuk mengedit materi
                        <br>
                        - Jangan lupa untuk menyimpan perubahan ringkasan materi
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <table id="tbl1" class="table table-bordered border-success">
                                <thead>
                                <tr class="alert-default-success">
                                    <th class="text-center align-middle border-success" style="width: 50px">#</th>
                                    <th class="border-success">
                                        <span class="align-middle">Edit Aspek Pengetahuan</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                for ($i = 0; $i < 8; $i++):
                                    $id_mapel_kelas = $mapel['id_mapel'] . $kelas['id_kelas'];
                                    $id_kikd = $id_mapel_kelas . '1' . ($i + 1);
                                    $materi = $kikd[1][$id_kikd] == null ? '' : $kikd[1][$id_kikd]->materi_kikd;
                                    ?>
                                    <tr>
                                        <td style="width: 50px"
                                            class="text-sm align-middle text-center nomor border-success p-0">
                                            P<?= $i + 1 ?></td>
                                        <td class="text-sm border-success p-0">
                                            <input type="text" name="materi[1][<?= $id_mapel_kelas ?>][<?= $id_kikd ?>]"
                                                   value="<?= $materi ?>"
                                                   style="width: 100%; border: 0; padding-left: 6px; padding-right: 6px">
                                        </td>
                                    </tr>
                                <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table id="tbl2" class="table table-bordered border-success">
                                <thead>
                                <tr class="alert-default-success">
                                    <th class="text-center align-middle border-success">#</th>
                                    <th class="border-success">
                                        <span class="pl-2 align-middle">Edit Aspek Keterampilan (Praktik/Portofolio/Proyek)</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                for ($i = 0; $i < 8; $i++):
                                    $id_mapel_kelas = $mapel['id_mapel'] . $kelas['id_kelas'];
                                    $id_kikd = $id_mapel_kelas . '2' . ($i + 1);
                                    $materi = $kikd[2][$id_kikd] == null ? '' : $kikd[2][$id_kikd]->materi_kikd;
                                    ?>
                                    <tr>
                                        <td style="width: 50px"
                                            class="text-sm text-center border-success nomor pt-0 pb-0">
                                            K<?= $i + 1 ?></td>
                                        <td class="text-sm border-success editable p-0">
                                            <input type="text" name="materi[2][<?= $id_mapel_kelas ?>][<?= $id_kikd ?>]"
                                                   value="<?= $materi ?>"
                                                   style="width: 100%; border: 0; padding-left: 6px; padding-right: 6px">
                                    </tr>
                                <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right" data-jenis="1">Simpan</button>
                </div>
            </div>
            <?= form_close() ?>
            <?php $dnone = $kkm == null ? 'd-none' : ''; ?>
            <div class="card my-shadow mb-4 <?= $dnone ?>">
                <div class="card-header py-3">
                    <div class="card-title">
                        <h6><b>Edit Nilai <?= $mapel['nama_mapel'] ?></b></h6>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($kkm == null) : ?>
                        <div class="alert alert-default-warning shadow align-content-center" role="alert">
                            KKM dan Bobot belum diatur
                        </div>
                    <?php endif; ?>
                    <?php
                    $multi = $setting_rapor->kkm_tunggal == "0" ? "MULTI" : "TUNGGAL";
                    $isi = $kkm->kkm;
                    $d = 0;
                    $dsd = $isi - 1;
                    $c = $isi;
                    $csd = floor($isi + (100 - $isi) / 3);
                    $b = $csd + 1;
                    $bsd = floor($b + (100 - $b) / 2);
                    $a = $bsd + 1;
                    $asd = 100;
                    ?>
                    <table class="table w-100 table-bordered border-dark">
                        <tr class="bg-light text-center">
                            <td style="width: 20%">KKM</td>
                            <td style="width: 20%">Jenis KKM</td>
                            <td style="width: 40%">Interval Predikat Berdasarkan KKM</td>
                            <td style="width: 20%">Bobot Nilai Harian</td>
                        </tr>
                        <tr class="text-center text-md text-dark">
                            <td><?= $kkm->kkm ?></td>
                            <td><?= $multi ?></td>
                            <td>
                                <span class="bg-danger badge p-1">0 ~ <?= $dsd ?> : D</span>
                                <span class="bg-warning badge p-1"><?= $c . ' ~ ' . $csd ?> : C</span>
                                <span class="bg-blue badge p-1"><?= $b . ' ~ ' . $bsd ?> : B</span>
                                <span class="bg-success badge p-1"><?= $a ?> ~ 100 : A</span>
                            </td>
                            <td><?= $kkm->bobot_ph ?> %</td>
                        </tr>
                    </table>
                    <div id="t-siswa" class="w-100"></div>
                    <?= form_open('', array('id' => 'uploadnilai')) ?>
                    <input type="hidden" name="id_mapel" class="form-control" value="<?= $mapel['id_mapel'] ?>">
                    <input type="hidden" name="id_kelas" class="form-control" value="<?= $kelas['id_kelas'] ?>">
                    <div class="row mt-3 mb-3">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save mr-1"></i>Simpan
                            </button>
                        </div>
                    </div>
                    <div id="for-upload" class="d-none row"></div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </section>

    <?= form_open('', array('id' => 'uploadharian')); ?>
    <input type="hidden" name="id_mapel" class="form-control" value="<?= $mapel['id_mapel'] ?>">
    <input type="hidden" name="id_kelas" class="form-control" value="<?= $kelas['id_kelas'] ?>">
    <?= form_close(); ?>
</div>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/excel/exceljs.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/excel/js-excel-template.min.js"></script>

<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jexcel/js/jexcel.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/jexcel/js/jsuites.js"></script>
<script>
    var tpActive = '<?=$tp_active->id_tp?>';
    var smtActive = '<?=$smt_active->id_smt?>';
    var arrSiswa = JSON.parse(JSON.stringify(<?= json_encode($siswa)?>));
    var arrNilai = JSON.parse(JSON.stringify(<?= json_encode($nilai)?>));
    var arrKiKd = JSON.parse(JSON.stringify(<?= json_encode($kikd)?>));
    var kkm = JSON.parse(JSON.stringify(<?= json_encode($kkm)?>));
    var idMapel = '<?=$mapel['id_mapel']?>';
    var idKelas = '<?=$kelas['id_kelas']?>';
    var namaMapel = '<?=$mapel['nama_mapel']?>';
    var namaKelas = '<?=$kelas['nama_kelas']?>';

    var isi = 0;
    if (kkm != null) {
        isi = parseInt(kkm.kkm);
    }
    var pre_d = 0;
    var pre_dsd = isi - 1;
    var pre_c = isi;
    var pre_csd = Math.floor(isi + (100 - isi) / 3);
    var pre_b = pre_csd + 1;
    var pre_bsd = Math.floor(pre_b + (100 - pre_b) / 2);
    var pre_a = pre_bsd + 1;
    var pre_asd = 100;

    var arrIndic1 = [];
    for (let i = 0; i < 8; i++) {
        var asp1 = arrKiKd[1];
        var idP = 'P' + (i + 1);
        if (asp1[idMapel + idKelas + '1' + (i + 1)] != null && asp1[idMapel + idKelas + '1' + (i + 1)].materi_kikd !== '') {
            idP = asp1[idMapel + idKelas + '1' + (i + 1)].materi_kikd;
        }
        arrIndic1.push(idP);
    }
    var arrIndic2 = [];
    for (let i = 0; i < 8; i++) {
        var asp2 = arrKiKd[2];
        var idK = 'K' + (i + 1);
        if (asp2[idMapel + idKelas + '2' + (i + 1)] != null && asp2[idMapel + idKelas + '2' + (i + 1)].materi_kikd !== '') {
            idK = asp2[idMapel + idKelas + '2' + (i + 1)].materi_kikd;
        }
        arrIndic2.push(idK);
    }

    var cols = [];

    var mp1 = 'P1';
    var mp2 = 'P2';
    var mp3 = 'P3';
    var mp4 = 'P4';
    var mp5 = 'P5';
    var mp6 = 'P6';
    var mp7 = 'P7';
    var mp8 = 'P8';

    $(function () {
        bsCustomFileInput.init();
    });

    function inRange(n, start, end) {
        return n >= start && n <= end;
    }

    function sortByNilai(arr, key) {
        return arr.sort(function (a, b) {
            var x = a[key];
            var y = b[key];
            return ((x > y) ? -1 : ((x < y) ? 1 : 0));
        });
    }

    function preCalcKetr(n1, n2, n3, pos, posdesk) {
        var res = '';
        if (n2 != null) {
            if (inRange(n2, pre_a, pre_asd)) {
                if (pos > 0) {
                    if (inRange(n1, pre_a, pre_asd)) {
                        if (inRange(n3, pre_a, pre_asd)) {
                            res += ', ' + arrIndic2[posdesk];
                        } else {
                            res += ' dan ' + arrIndic2[posdesk];
                        }
                    } else {
                        res += ', sangat baik kemampuan dalam ' + arrIndic2[posdesk];
                    }
                } else {
                    res += ' sangat baik dalam ' + arrIndic2[posdesk];
                }
            } else if (inRange(n2, pre_b, pre_bsd)) {
                if (pos > 0) {
                    if (inRange(n1, pre_b, pre_bsd)) {
                        if (inRange(n3, pre_b, pre_bsd)) {
                            res += ', ' + arrIndic2[posdesk];
                        } else {
                            res += ' dan ' + arrIndic2[posdesk];
                        }
                    } else {
                        res += ', baik kemampuan dalam ' + arrIndic2[posdesk];
                    }
                } else {
                    res += ' baik dalam ' + arrIndic2[posdesk];
                }
            } else if (inRange(n2, pre_c, pre_csd)) {
                if (pos > 0) {
                    if (inRange(n1, pre_c, pre_csd)) {
                        if (inRange(n3, pre_c, pre_csd)) {
                            res += ', ' + arrIndic2[posdesk];
                        } else {
                            res += ' dan ' + arrIndic2[posdesk];
                        }
                    } else {
                        res += ', cukup kemampuan dalam ' + arrIndic2[posdesk];
                    }
                } else {
                    res += ' cukup dalam ' + arrIndic2[posdesk];
                }
            } else if (inRange(n2, pre_d, pre_dsd)) {
                if (pos > 0) {
                    if (inRange(n1, pre_d, pre_dsd)) {
                        if (inRange(n3, pre_d, pre_dsd)) {
                            res += ', ' + arrIndic2[posdesk];
                        } else {
                            res += ' dan ' + arrIndic2[posdesk];
                        }
                    } else {
                        res += ', kurang kemampuan dalam ' + arrIndic2[posdesk];
                    }
                } else {
                    res += ' kurang dalam ' + arrIndic2[posdesk];
                }
            }
        }

        if (n3 == null) {
            res += '.';
        }
        return res;
    }

    function preCalcPeng(n1, n2, n3, pos, posdesk) {
        var res = '';
        if (n2 != null) {
            if (inRange(n2, pre_a, pre_asd)) {
                if (pos > 0) {
                    if (inRange(n1, pre_a, pre_asd)) {
                        if (inRange(n3, pre_a, pre_asd)) {
                            res += ', ' + arrIndic1[posdesk];
                        } else {
                            res += ' dan ' + arrIndic1[posdesk];
                        }
                    } else {
                        res += ', sangat baik kemampuan dalam ' + arrIndic1[posdesk];
                    }
                } else {
                    res += ' sangat baik dalam ' + arrIndic1[posdesk];
                }
            } else if (inRange(n2, pre_b, pre_bsd)) {
                if (pos > 0) {
                    if (inRange(n1, pre_b, pre_bsd)) {
                        if (inRange(n3, pre_b, pre_bsd)) {
                            res += ', ' + arrIndic1[posdesk];
                        } else {
                            res += ' dan ' + arrIndic1[posdesk];
                        }
                    } else {
                        res += ', baik kemampuan dalam ' + arrIndic1[posdesk];
                    }
                } else {
                    res += ' baik dalam ' + arrIndic1[posdesk];
                }
            } else if (inRange(n2, pre_c, pre_csd)) {
                if (pos > 0) {
                    if (inRange(n1, pre_c, pre_csd)) {
                        if (inRange(n3, pre_c, pre_csd)) {
                            res += ', ' + arrIndic1[posdesk];
                        } else {
                            res += ' dan ' + arrIndic1[posdesk];
                        }
                    } else {
                        res += ', cukup kemampuan dalam ' + arrIndic1[posdesk];
                    }
                } else {
                    res += ' cukup dalam ' + arrIndic1[posdesk];
                }
            } else if (inRange(n2, pre_d, pre_dsd)) {
                if (pos > 0) {
                    if (inRange(n1, pre_d, pre_dsd)) {
                        if (inRange(n3, pre_d, pre_dsd)) {
                            res += ', ' + arrIndic1[posdesk];
                        } else {
                            res += ' dan ' + arrIndic1[posdesk];
                        }
                    } else {
                        res += ', kurang kemampuan dalam ' + arrIndic1[posdesk];
                    }
                } else {
                    res += ' kurang dalam ' + arrIndic1[posdesk];
                }
            }
        }

        if (n3 == null) {
            res += '.';
        }
        return res;
    }

    function setDeskPengetahuan(desk) {
        cols = [];
        for (let j = 0; j < desk.length; j++) {
            var item = {};
            item['pos'] = j;
            item['nilai'] = desk[j];
            item['desk'] = arrIndic1[j];
            cols.push(item)
        }
        cols = sortByNilai(cols, 'nilai');
        cols = $.grep(cols, function (n, i) {
            return (n != null && n.nilai !== '');
        });
        //console.log('grepped', cols);

        var result = cols.length > 1 ? 'Memiliki kemampuan' : '';
        if (cols.length > 0) {
            var count = cols.length > 2 ? 2 : cols.length;
            for (let i = 0; i < count; i++) {
                if (cols[i].nilai != null && cols[i].nilai !== '' && cols[i].nilai > 0) {
                    if (i === 0) {
                        if (cols[i + 1] != null) {
                            result += preCalcPeng(null, cols[i].nilai, cols[i + 1].nilai, i, cols[i].pos);
                        }
                    } else if (i === cols.length - 1) {
                        if (cols[i - 1] != null) {
                            result += preCalcPeng(cols[i - 1].nilai, cols[i].nilai, null, i, cols[i].pos);
                        }
                    } else {
                        if (cols[i - 1] != null && cols[i + 1] != null) {
                            result += preCalcPeng(cols[i - 1].nilai, cols[i].nilai, cols[i + 1].nilai, i, cols[i].pos);
                        }
                    }
                }
            }
        }
        return result;
    }

    function setDeskKeterampilan(desk) {
        cols = [];
        for (let j = 0; j < desk.length; j++) {
            var item = {};
            item['pos'] = j;
            item['nilai'] = desk[j];
            item['desk'] = arrIndic2[j];
            cols.push(item)
        }
        cols = sortByNilai(cols, 'nilai');
        cols = $.grep(cols, function (n, i) {
            return (n != null && n.nilai !== '');
        });
        //console.log(cols);

        var result = cols.length > 1 ? 'Memiliki keterampilan' : '';
        if (cols.length > 0) {
            var count = cols.length > 2 ? 2 : cols.length;
            for (let i = 0; i < count; i++) {
                if (cols[i].nilai != null && cols[i].nilai !== '' && cols[i].nilai > 0) {
                    if (i === 0) {
                        if (cols[i + 1] != null) {
                            result += preCalcKetr(null, cols[i].nilai, cols[i + 1].nilai, i, cols[i].pos);
                        }
                    } else if (i === cols.length - 1) {
                        if (cols[i - 1] != null) {
                            result += preCalcKetr(cols[i - 1].nilai, cols[i].nilai, null, i, cols[i].pos);
                        }
                    } else {
                        if (cols[i - 1] != null && cols[i + 1] != null) {
                            result += preCalcKetr(cols[i - 1].nilai, cols[i].nilai, cols[i + 1].nilai, i, cols[i].pos);
                        }
                    }
                }
            }
        }
        return result;
    }

    $(document).ready(function () {
        console.log(idKelas);
        console.log(arrNilai);
        //console.log('a' + pre_a + ' b' + pre_b + ' bd' + pre_bsd + ' c' + pre_c + ' cd' + pre_csd + ' dd' + pre_dsd);
        var dataSiswa = [];
        var row = 1;
        $.each(arrSiswa, function (i, v) {
            var noInduk = v.nisn == null || v.nisn == '' ? v.nis : v.nisn;
            var nilai = arrNilai[v.id_siswa];
            var p1 = nilai.p1 == '0' ? '' : nilai.p1;
            var p2 = nilai.p2 == '0' ? '' : nilai.p2;
            var p3 = nilai.p3 == '0' ? '' : nilai.p3;
            var p4 = nilai.p4 == '0' ? '' : nilai.p4;
            var p5 = nilai.p5 == '0' ? '' : nilai.p5;
            var p6 = nilai.p6 == '0' ? '' : nilai.p6;
            var p7 = nilai.p7 == '0' ? '' : nilai.p7;
            var p8 = nilai.p8 == '0' ? '' : nilai.p8;

            var k1 = nilai.k1 == '0' ? '' : nilai.k1;
            var k2 = nilai.k2 == '0' ? '' : nilai.k2;
            var k3 = nilai.k3 == '0' ? '' : nilai.k3;
            var k4 = nilai.k4 == '0' ? '' : nilai.k4;
            var k5 = nilai.k5 == '0' ? '' : nilai.k5;
            var k6 = nilai.k6 == '0' ? '' : nilai.k6;
            var k7 = nilai.k7 == '0' ? '' : nilai.k7;
            var k8 = nilai.k8 == '0' ? '' : nilai.k8;

            dataSiswa.push(
                [
                    noInduk, v.nama, p1, p2, p3, p4, p5, p6, p7, p8,
                    '=COUNTA(C' + row + ':J' + row + ')',
                    '=IF(COUNT(C' + row + ':J' + row + ')<2,"",ROUND(SUM(C' + row + ':J' + row + ')/K' + row + ',0))',
                    '=IF(L' + row + '>' + pre_bsd + ',"A",IF(L' + row + '>' + pre_csd + ',"B",IF(L' + row + '>' + pre_dsd + ',"C",IF(L' + row + '<' + pre_c + ',"D",""))))',
                    setDeskPengetahuan([p1, p2, p3, p4, p5, p6, p7, p8]),
                    k1, k2, k3, k4, k5, k6, k7, k8,
                    '=COUNTA(O' + row + ':V' + row + ')',
                    '=IF(COUNT(O' + row + ':V' + row + ')<2,"",ROUND(SUM(O' + row + ':V' + row + ')/W' + row + ',0))',
                    '=IF(X' + row + '>' + pre_bsd + ',"A",IF(X' + row + '>' + pre_csd + ',"B",IF(X' + row + '>' + pre_dsd + ',"C",IF(X' + row + '<' + pre_c + ',"D",""))))',
                    setDeskKeterampilan([k1, k2, k3, k4, k5, k6, k7, k8]),
                    v.id_siswa,
                    '=SUM(C' + row + ':J' + row + ')',
                    '=SUM(O' + row + ':V' + row + ')',
                    '=SUM(AB' + row + ':AC' + row + ')'
                ]
            );
            row++;
        });

        var arrCol = [];

        var pno = 1;
        var kno = 1;
        var char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for (let i = 0; i < 30; i++) {
            var item = {};

            if (i === 0) {
                item['title'] = 'NIS/NISN\n' + char.charAt(i);
                item['width'] = 160;
            } else if (i === 1) {
                item['title'] = 'NAMA SISWA\n' + char.charAt(i);
                item['width'] = 250;
            } else if (i < 10) {
                item['title'] = 'P-' + pno + '\n' + char.charAt(i);
                item['width'] = 35;
                pno++;
            } else if (i === 10) {
                item['title'] = 'JML\n' + char.charAt(i);
                item['width'] = 1;
            } else if (i === 11) {
                item['title'] = 'RATA\n' + char.charAt(i);
                item['width'] = 50;
            } else if (i === 12) {
                item['title'] = 'PRED\n' + char.charAt(i);
                item['width'] = 50;
            } else if (i === 13) {
                item['title'] = 'DESKRIPSI\n' + char.charAt(i);
                item['width'] = 200;
                item['wordWrap'] = true;
            } else if (i < 22) {
                item['title'] = 'K-' + kno + '\n' + char.charAt(i);
                item['width'] = 35;
                kno++;
            } else if (i === 22) {
                item['title'] = 'JML\n' + char.charAt(i);
                item['width'] = 1;
            } else if (i === 23) {
                item['title'] = 'RATA\n' + char.charAt(i);
                item['width'] = 50;
            } else if (i === 24) {
                item['title'] = 'PRED\n' + char.charAt(i);
                item['width'] = 50;
            } else if (i === 25) {
                item['title'] = 'DESKRIPSI\n' + char.charAt(i);
                item['width'] = 200;
                item['wordWrap'] = true;
            } else if (i === 26) {
                item['title'] = 'ID';
                item['width'] = 1;
            } else if (i > 26) {
                item['width'] = 1;
            }

            arrCol.push(item);
        }

        var tableSiswa = $('#t-siswa').jexcel({
            data: dataSiswa,
            minDimensions: [30],
            //defaultColWidth: 100,
            tableOverflow: true,
            tableWidth: '' + $('#t-siswa').width() + 'px',
            tableHeight: (120 * dataSiswa.length) + 'px',
            search: true,
            freezeColumns: 2,
            columnResize: false,
            columns: arrCol,
            nestedHeaders: [
                [
                    {
                        title: 'Nilai Harian',
                        colspan: '30',
                    },
                ],
            ],
            updateTable: function (instance, cell, col, row, val, label, cellName) {
                if (col === 0) {
                    cell.className = '';
                    cell.style.backgroundColor = '#f8d7da';
                    cell.style.textAlign = 'center';
                    cell.classList.add('readonly');
                }

                if (col === 1) {
                    cell.className = '';
                    cell.style.backgroundColor = '#f8d7da';
                    cell.style.textAlign = 'left';
                    cell.classList.add('readonly');
                }

                if (col === 10 || col === 11 || col === 12 || col === 13 ||
                    col === 22 || col === 23 || col === 24 || col === 25 ||
                    col === 26 || col === 27 || col === 28 || col === 29) {
                    cell.className = '';
                    cell.style.backgroundColor = '#fff3cd';
                    cell.classList.add('readonly');
                }

                if (col === 2 || col === 3 || col === 4 || col === 5 || col === 6 ||
                    col === 7 || col === 8 || col === 9 || col === 14 || col === 15 ||
                    col === 16 || col === 17 || col === 18 || col === 19 || col === 20 || col === 21) {
                    cell.style.backgroundColor = '#b9f6ca';
                }

                if (col === 13 || col === 25) {
                    cell.style.fontSize = 'small';
                    cell.style.textAlign = 'left';
                }
            },
            onchange: function (instance, cell, col, row, value, label) {
                //var cellName = jexcel.getColumnNameFromId([col,row]);
                var d = [];
                if (col === 10) {
                    d = [];
                    for (let i = 2; i < 10; i++) {
                        var values1 = $(`td[data-x="${i}"][data-y="${row}"]`).text();
                        d.push(values1);
                    }
                    $(`td[data-x="13"][data-y="${row}"]`).text(setDeskPengetahuan(d));
                }

                if (col === 22) {
                    d = [];
                    for (let i = 14; i < 22; i++) {
                        var values2 = $(`td[data-x="${i}"][data-y="${row}"]`).text();
                        d.push(values2);
                    }
                    //console.log(setDesk(d));
                    $(`td[data-x="25"][data-y="${row}"]`).text(setDeskKeterampilan(d));
                }
            }
        });

        function cellRef(cel) {
            var x = cel.replace(/[A-Za-z]/g, "");
            x = x.charCodeAt(0) - 65;
            var y = cel.replace(/\D/g, "");
            y = y - 1;

            return x + "," + y;
        }

        $('#upload').on('click', function (e) {
            const input = $('#custom-file')
            const files = input[0].files
            console.log('files',files)
            if (!files.length) {
                swal.fire({
                    title: "INFO",
                    text: 'Tidak ada file untuk diupload',
                    icon: "info"
                });
            } else {
                parseFile(files[0]);
            }
        })

        /*
        $('#uploadharian').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var form = new FormData($('#uploadharian')[0]);

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: base_url + 'rapor/uploadharian/' + idMapel + '/' + idKelas,
                data: form,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    console.log(data);
                    window.location.href = base_url + 'rapor/inputharian/' + idMapel + '/' + idKelas
                },
                error: function (e) {
                    console.log("error", e.responseText);
                    showDangerToast(e.responseText);
                }
            });
        });
         */

        $('#uploadnilai').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            swal.fire({
                title: "Menyimpan nilai harian",
                text: "Silahkan tunggu....",
                button: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                onOpen: () => {
                    swal.showLoading();
                }
            });

            var tbl = $('table.jexcel tr').get().map(function (row) {
                return $(row).find('td').get().map(function (cell) {
                    return $(cell).html().replace(/\&nbsp;/g, '').trim();
                });
            });
            tbl.shift();
            tbl.shift();
            var inputs = '';
            $.each(tbl, function (idx, s) {
                var idSiswa = s[27];
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_nilai_harian]" value="' + idMapel + idKelas + idSiswa + tpActive + smtActive + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_siswa]" value="' + idSiswa + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_tp]" value="' + tpActive + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_smt]" value="' + smtActive + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_mapel]" value="' + idMapel + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][id_kelas]" value="' + idKelas + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][p1]" value="' + s[3] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][p2]" value="' + s[4] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][p3]" value="' + s[5] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][p4]" value="' + s[6] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][p5]" value="' + s[7] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][p6]" value="' + s[8] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][p7]" value="' + s[9] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][p8]" value="' + s[10] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][p_rata_rata]" value="' + s[12] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][p_predikat]" value="' + s[13] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][p_deskripsi]" value="' + s[14] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][k1]" value="' + s[15] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][k2]" value="' + s[16] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][k3]" value="' + s[17] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][k4]" value="' + s[18] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][k5]" value="' + s[19] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][k6]" value="' + s[20] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][k7]" value="' + s[21] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][k8]" value="' + s[22] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][k_rata_rata]" value="' + s[24] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][k_predikat]" value="' + s[25] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][k_deskripsi]" value="' + s[26] + '" class="form-control col-1">';
                inputs += '<input type="text" name="siswa[' + idSiswa + '][jml]" value="' + s[30] + '" class="form-control col-1">';
            });
            $('#for-upload').html(inputs);

            $.ajax({
                type: "POST",
                url: base_url + 'rapor/importharian',
                data: $(this).serialize(),
                cache: false,
                success: function (data) {
                    console.log(data);
                    swal.fire({
                        title: "Sukses",
                        html: "<b>" + data.updated + "<b> nilai berhasil disimpan",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(result => {
                        if (result.value) {
                            window.location.href = base_url + 'rapor/inputharian/' + idMapel + '/' + idKelas
                        }
                    });
                },
                error: function (e) {
                    console.log("error", e.responseText);
                    swal.fire({
                        title: "Error",
                        html: "Gagal menyimpan",
                        icon: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    })
                }
            });
        });

        $('#editkikd').on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            swal.fire({
                title: "Menyimpan indikator penilaian",
                text: "Silahkan tunggu....",
                button: false,
                closeOnClickOutside: false,
                closeOnEsc: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                onOpen: () => {
                    swal.showLoading();
                }
            });

            $.ajax({
                url: base_url + "rapor/savekikd",
                type: "POST",
                data: $(this).serialize(),
                success: function (data) {
                    //console.log("response:", data);
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            html: "Indikator penilaian berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + 'rapor/inputharian/' + idMapel + '/' + idKelas
                            }
                        });
                    } else {
                        swal.fire({
                            title: "Error",
                            html: "Gagal menyimpan",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        })
                    }
                }, error: function (xhr, status, error) {
                    console.log("response:", xhr.responseText);
                    swal.fire({
                        title: "Error",
                        html: "Gagal menyimpan",
                        icon: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    })
                }
            });
        });



    });

    async function downloadTemplate(res) {
        const response = await fetch(base_url + 'uploads/import/format/template_harian_client.xlsx')
        const arrayBuffer = await response.arrayBuffer()
        const excelTemplate = await JsExcelTemplate.fromArrayBuffer(arrayBuffer)
        excelTemplate.set("mapel", namaMapel);
        excelTemplate.set("kelas", namaKelas);
        excelTemplate.set("kikd", res.kikd);
        excelTemplate.set("siswa", res.siswa);

        const blob = await excelTemplate.toBlob()
        saveAs(blob, `Nilai Harian ${namaMapel} ${namaKelas}.xlsx`);
    }

    async function processDownload(idMapel, idKelas) {
        $.ajax({
            url: base_url + "rapor/downloadnilaiharian/"+idMapel+"/"+idKelas,
            method: "GET",
            success: function (result) {
                console.log("result", result);
                downloadTemplate(result)
            }, error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
                const err = JSON.parse(xhr.responseText)
                swal.fire({
                    title: "Error",
                    text: err,
                    icon: "error"
                });
            }
        });
    }

    function getDataFromExcel(file) {
        return new Promise((resolve, reject) => {
            const wb = new ExcelJS.Workbook();
            const reader = new FileReader()
            reader.onload = async () => {
                try {
                    const buffer = reader.result;
                    wb.xlsx.load(buffer).then(workbook => {
                        let dataFiles = {}
                        workbook.eachSheet((sheet, id) => {
                            let cols = {
                                'name': sheet.name,
                                'header': [],
                                'rows': []
                            }
                            let head = []
                            sheet.eachRow({includeEmpty: true}, (row, rowIndex) => {
                                let obj = {}
                                for (let i = 0; i < row.values.length; i++) {
                                    if (rowIndex === 2) {
                                        let val = row.values[i] ? (row.values[i] === 'N I S N' ? 'NISN' : row.values[i].replaceAll(' ', '').replaceAll('.', '')) : ''
                                        if (val.includes('/')) val = val.split('/')[1]
                                        head.push(val.toLowerCase())
                                        if (row.values[i]) {
                                            let h = {
                                                label: row.values[i],
                                                value: val.toLowerCase(),
                                            }
                                            cols.header.push(h)
                                        }
                                    } else {
                                        obj[head[i]] = row.values[i]
                                    }
                                }
                                cols.rows.push(obj)
                            })
                            cols.rows = removeEmptyObjects(cols.rows)
                            dataFiles[sheet.name] = cols
                        })
                        resolve(dataFiles)
                    })
                } catch (err) {
                    reject(err)
                }
            }
            reader.onerror = (error) => {
                reject(error)
            };
            reader.readAsArrayBuffer(file)
        });
    }

    function removeEmptyObjects(array) {
        return array.filter(element => {
            //console.log('cols', element)
            delete element.undefined
            return Object.keys(element).length !== 0;
        });
    }

    function uploadNilaiHarian(jsonData) {
        swal.fire({
            title: "Menyimpan nilai harian",
            text: "Silahkan tunggu....",
            button: false,
            closeOnClickOutside: false,
            closeOnEsc: false,
            allowEscapeKey: false,
            allowOutsideClick: false,
            onOpen: () => {
                swal.showLoading();
            }
        });

        let formData = new FormData($('#uploadharian')[0])

        const nilaiSiswa = jsonData.NILAI.rows
        nilaiSiswa.forEach(function (siswa, ind) {
            for (const key in siswa) {
                if (key && key !== 'no') {
                    formData.append('siswa['+ind+']['+key+']', siswa[key])
                }
            }
        })
        const kikd = jsonData.KIKD.rows
        kikd.forEach(function (kd, ind) {
            for (const key in kd) {
                console.log('key', key, kd[key])
                if (key) {
                    formData.append('kikd['+ind+']['+key+']', kd[key])
                }
            }
        })

        $.ajax({
            type: "POST",
            url: base_url + 'rapor/uploadnilaiharian/',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                console.log(data);
                window.location.href = base_url + 'rapor/inputharian/' + idMapel + '/' + idKelas
            },
            error: function (e) {
                console.log("error", e.responseText);
                showDangerToast(e.responseText);
            }
        });
    }

    async function parseFile(file) {
        const jsonData = await getDataFromExcel(file)
        console.log('parse', jsonData)
        if (jsonData) {
            swal.fire({
                title: "UPLOAD",
                html: "Nilai yang sudah ada akan ditimpa. Lanjutkan?",
                icon: "warning",
                showCancelButton: 'Batal',
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            }).then(result => {
                if (result.value) {
                    uploadNilaiHarian(jsonData)
                }
            });
        }
    }


</script>
