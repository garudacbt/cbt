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
            <div class="card card-default my-shadow">
                <div class="card-body">
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
                        <div class="col-md-5">
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
                        <div class="col-md-3">
                            <table class="table table-bordered" id="table-status">
                                <tr>
                                    <td>PG</td>
                                    <td class="text-center"><?= round($skor->skor_pg, 2) ?></td>
                                    <td rowspan="3" style="width: 100px" class="text-center">
                                        <b>NILAI</b>
                                        <br>
                                        <span style="font-size: 40pt"><?= round($skor->skor_total, 2) ?></span>
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
                                    <td rowspan="2" style="width: 100px" class="text-center">
                                        <b><?=isset($skor->dikoreksi) && $skor->dikoreksi ? "Sudah dikoreksi" : "Belum dikoreksi"?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ES</td>
                                    <td class="text-center"><?= round($skor->skor_essai, 2) ?></td>
                                </tr>
                            </table>
                            <button class="float-right btn btn-success" id="btn-marked">Tandai Sudah Dikoreksi</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="konten-soal">
                <?php if (isset($soal[1]) && count($soal[1]) > 0) : ?>
                    <div class="card card-default my-shadow mb-4 collapsed-card">
                        <div class="card-header">
                            <h6 class="card-title"><b>I. PILIHAN GANDA</b></h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-default-success" role="alert">
                                <ul>
                                    <li>Bobot soal: <b><?= $info->bobot_pg ?></b>. Jumlah soal:
                                        <b><?= $info->tampil_pg ?></b>. Max point persoal:
                                        <b><?= round($info->bobot_pg / $info->tampil_pg, 2) ?></b>.
                                    </li>
                                    <li>Point soal PG tidak bisa diedit</li>
                                </ul>
                            </div>
                            <table id="table-pg"
                                   class="w-100 table table-striped table-bordered border-success nowrap">
                                <thead>
                                <tr>
                                    <th class="text-center align-middle bg-blue" style="width: 50px">No. Soal</th>
                                    <th class="text-center align-middle bg-blue">Soal</th>
                                    <th class="text-center align-middle bg-blue">Pilihan</th>
                                    <th class="text-center align-middle bg-blue" style="width: 50px">Jawaban Benar</th>
                                    <th class="text-center align-middle bg-teal d-none" style="width: 50px">No. Acak
                                    </th>
                                    <th class="text-center align-middle bg-teal d-none">Pilihan Acak</th>
                                    <th class="text-center align-middle bg-teal d-none" style="width: 50px">Jawaban
                                        Siswa Acak
                                    </th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">Jawaban Siswa</th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">Analisa</th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">
                                        Point<br>Max. <?= round($info->bobot_pg / $info->tampil_pg, 2) ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ns = 1;
                                foreach ($soal[1] as $s) :
                                    $arrAlias = [
                                        ['valAlias' => $s->opsi_alias_a, 'opsi' => $s->opsi_a, 'value' => 'A'],
                                        ['valAlias' => $s->opsi_alias_b, 'opsi' => $s->opsi_b, 'value' => 'B'],
                                    ];

                                    if ($info->opsi == 3) {
                                        $arrAlias[] = ['valAlias' => $s->opsi_alias_c, 'opsi' => $s->opsi_c, 'value' => 'C'];
                                    } elseif ($info->opsi == 4) {
                                        $arrAlias[] = ['valAlias' => $s->opsi_alias_c, 'opsi' => $s->opsi_c, 'value' => 'C'];
                                        $arrAlias[] = ['valAlias' => $s->opsi_alias_d, 'opsi' => $s->opsi_d, 'value' => 'D'];
                                    } else {
                                        $arrAlias[] = ['valAlias' => $s->opsi_alias_c, 'opsi' => $s->opsi_c, 'value' => 'C'];
                                        $arrAlias[] = ['valAlias' => $s->opsi_alias_d, 'opsi' => $s->opsi_d, 'value' => 'D'];
                                        $arrAlias[] = ['valAlias' => $s->opsi_alias_e, 'opsi' => $s->opsi_e, 'value' => 'E'];
                                    }
                                    array_multisort(array_column($arrAlias, 'valAlias'), SORT_ASC, $arrAlias);
                                    ?>
                                    <tr>
                                        <td class="text-center"><?= $ns ?></td>
                                        <td><?= $s->soal ?></td>
                                        <td>
                                            <ol type="A">
                                                <li>
                                                    <?= $s->opsi_a ?>
                                                </li>
                                                <li>
                                                    <?= $s->opsi_b ?>
                                                </li>
                                                <?php if ($info->opsi == 3) : ?>
                                                    <li>
                                                        <?= $s->opsi_c ?>
                                                    </li>
                                                <?php elseif ($info->opsi == 4) : ?>
                                                    <li>
                                                        <?= $s->opsi_c ?>
                                                    </li>
                                                    <li>
                                                        <?= $s->opsi_d ?>
                                                    </li>
                                                <?php else : ?>
                                                    <li>
                                                        <?= $s->opsi_c ?>
                                                    </li>
                                                    <li>
                                                        <?= $s->opsi_d ?>
                                                    </li>
                                                    <li>
                                                        <?= $s->opsi_e ?>
                                                    </li>
                                                <?php endif; ?>
                                            </ol>
                                        </td>
                                        <td class="text-center"><?= strtoupper($s->jawaban ?? '') ?></td>
                                        <td class="text-center d-none"><?= $s->no_soal_alias ?></td>
                                        <td class="d-none">
                                            <ol type="A">
                                                <?php foreach ($arrAlias as $alias) : ?>
                                                    <li>
                                                        <?= $alias['opsi'] ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ol>
                                        </td>
                                        <td class="text-center d-none"><?= strtoupper($s->jawaban_alias ?? '') ?></td>
                                        <td class="text-center"><?= strtoupper($s->jawaban_siswa ?? '') ?></td>
                                        <td class="text-center"><?= $s->analisa ?></td>
                                        <td class="text-center"><?= $s->point ?></td>
                                    </tr>
                                    <?php $ns++; endforeach; ?>
                                <tr>
                                    <td colspan="6" class="text-right text-bold">TOTAL SCORE PILIHAN GANDA</td>
                                    <td class="text-center text-bold"><?= round($skor->skor_pg, 2) ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="overlay d-none" id="loading-pg">
                            <div class="spinner-grow"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($soal[2]) && count($soal[2]) > 0) : ?>
                    <div class="card card-default my-shadow mb-4">
                        <div class="card-header">
                            <h6 class="card-title"><b>II. PILIHAN GANDA KOMPLEKS</b></h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-default-success" role="alert">
                                <ul>
                                    <li>Bobot soal: <b><?= $info->bobot_kompleks ?></b>. Jumlah soal:
                                        <b><?= $info->tampil_kompleks ?></b>. Max point persoal:
                                        <b><?= round($info->bobot_kompleks / $info->tampil_kompleks, 2) ?></b>.
                                    </li>
                                    <li>Point soal PG Kompleks bisa diedit</li>
                                    <li>Utamakan mengkoreksi hasil analisa yang berwarna kuning</li>
                                    <li>Klik <i class="fa fa-pencil"></i> untuk mengedit point. Klik <i
                                                class="fa fa-undo"></i> untuk mengembalikan ke point otomatis
                                    </li>
                                    <li>Klik tobol <b>SIMPAN</b> untuk menyimpan perubahan point</li>
                                </ul>
                            </div>
                            <table id="table-pg2"
                                   class="w-100 table table-striped table-bordered border-success nowrap">
                                <thead>
                                <tr>
                                    <th class="text-center align-middle bg-blue" style="width: 50px">No. Soal</th>
                                    <th class="text-center align-middle bg-blue">Soal</th>
                                    <th class="text-center align-middle bg-blue">Pilihan</th>
                                    <th class="text-center align-middle bg-blue" style="width: 50px">Jawaban Benar</th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">Jawaban Siswa</th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">Analisa</th>
                                    <th class="text-center align-middle bg-teal" style="width: 80px">
                                        Point<br>Max. <?= round($info->bobot_kompleks / $info->tampil_kompleks, 2) ?>
                                    </th>
                                    <th class="text-center align-middle bg-teal" style="width: 80px">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ns = 1;
                                foreach ($soal[2] as $s) :?>
                                    <tr>
                                        <td class="text-center"><?= $ns ?></td>
                                        <td><?= $s->soal ?></td>
                                        <td>
                                            <ol type="A">
                                                <?php foreach ($s->opsi_a as $abc => $opsi) : ?>
                                                    <li>
                                                        <?= $opsi ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ol>
                                        </td>
                                        <td class="text-center"><?= strtoupper(implode(", ", $s->jawaban_benar ?? [''])) ?></td>
                                        <td class="text-center"><?= $s->jawaban_siswa ? strtoupper(implode(", ", $s->jawaban_siswa)) : '' ?></td>
                                        <td class="text-center"><?= $s->analisa ?></td>
                                        <td class="text-center">
                                            <input id="input<?= $s->id_soal_siswa ?>"
                                                   name="input<?= $s->id_soal_siswa ?>"
                                                   value="<?= $s->point ?>"
                                                   type="number" min="0"
                                                   max="<?= round($info->bobot_kompleks / $info->tampil_kompleks, 2) ?>"
                                                   step="0.1"
                                                   style="width: 100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box; display: none"/>
                                            <span class="pg2" data-idsoal="<?= $s->id_soal_siswa ?>"
                                                  id="span<?= $s->id_soal_siswa ?>"><?= $s->point ?></span>
                                        </td>
                                        <td>
                                            <button id="edit<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="edit(<?= $s->id_soal_siswa ?>)"><i
                                                        class="fa fa-pencil"></i>
                                            </button>
                                            <button id="undo<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="undo(<?= $s->id_soal_siswa ?>, <?= $s->point_otomatis ?>)">
                                                <i
                                                        class="fa fa-undo"></i></button>
                                        </td>
                                    </tr>
                                    <?php $ns++; endforeach; ?>
                                <tr>
                                    <td colspan="6" class="text-right text-bold">TOTAL SCORE PILIHAN GANDA KOMPLEKS</td>
                                    <td class="text-center text-bold"><?= round($skor->skor_kompleks, 2) ?></td>
                                    <td>
                                        <button id="pg2"
                                                data-max="<?= round($info->bobot_kompleks / $info->tampil_kompleks, 2) ?>"
                                                class="btn btn-sm btn-primary" onclick="simpan(this)">Simpan
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="overlay d-none" id="loading-pg2">
                            <div class="spinner-grow"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($soal[3]) && count($soal[3]) > 0) : ?>
                    <div class="card card-default my-shadow mb-4">
                        <div class="card-header">
                            <h6 class="card-title"><b>III. MENJODOHKAN</b></h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-default-success" role="alert">
                                <ul>
                                    <li>Bobot soal: <b><?= $info->bobot_jodohkan ?></b>. Jumlah soal:
                                        <b><?= $info->tampil_jodohkan ?></b>. Max point persoal:
                                        <b><?= round($info->bobot_jodohkan / $info->tampil_jodohkan, 2) ?></b>.
                                    </li>
                                    <li>Point soal menjodohkan bisa diedit</li>
                                    <li>Utamakan mengkoreksi hasil analisa yang berwarna kuning</li>
                                    <li>Klik <i class="fa fa-pencil"></i> untuk mengedit point. Klik <i
                                                class="fa fa-undo"></i> untuk mengembalikan ke point otomatis
                                    </li>
                                    <li>Klik tobol <b>SIMPAN</b> untuk menyimpan perubahan point</li>
                                </ul>
                            </div>
                            <table id="table-jodohkan"
                                   class="w-100 table table-striped table-bordered border-success nowrap">
                                <thead>
                                <tr>
                                    <th class="text-center align-middle bg-blue" style="width: 50px">No. Soal</th>
                                    <th class="text-center align-middle bg-blue">Soal</th>
                                    <th class="text-center align-middle bg-blue">Jawaban Benar</th>
                                    <th class="text-center align-middle bg-teal">Jawaban Siswa</th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">Analisa</th>
                                    <th class="text-center align-middle bg-teal" style="width: 80px">
                                        Point<br>Max. <?= round($info->bobot_jodohkan / $info->tampil_jodohkan, 2) ?>
                                    </th>
                                    <th class="text-center align-middle bg-teal" style="width: 80px">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ns = 1;
                                foreach ($soal[3] as $s) :
                                    $rows = count($s->tabel_soal)
                                    ?>
                                    <tr>
                                        <td class="text-center" rowspan="<?=$rows?>"><?= $ns ?></td>
                                        <td rowspan="<?=$rows?>"><?= $s->soal ?></td>
                                        <td>
                                            <?php
                                            $jwb = $s->tabel_soal[0];
                                            if ($s->type_soal == '1') :?>
                                                    <span><?= $jwb->title ?></span>
                                                    <?php if (isset($jwb->subtitle)) : ?>
                                                        <ul>
                                                            <?php foreach ($jwb->subtitle as $sub) : ?>
                                                                <li><?= $sub ?></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php else: ?>
                                                        <br>--
                                                    <?php endif; ?>
                                            <?php else:?>
                                                    <p><?= $jwb->title ?>
                                                        <br><?= isset($jwb->subtitle) ? $jwb->subtitle[0] : '' ?></p>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $jwb = isset($s->tabel_jawab[0]) ? $s->tabel_jawab[0] : [];
                                            if ($s->type_soal == '1') :?>
                                                    <span><?= $jwb->title ?? '' ?></span>
                                                    <?php if (isset($jwb->subtitle)) : ?>
                                                        <ul>
                                                            <?php foreach ($jwb->subtitle as $sub) : ?>
                                                                <li><?= $sub ?></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php else: ?>
                                                        <br>--
                                                    <?php endif; ?>
                                            <?php else:?>
                                                    <p><?= $jwb->title ?? '' ?>
                                                        <br><?= isset($jwb->subtitle) ? $jwb->subtitle[0] : '--' ?></p>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center" rowspan="<?=$rows?>"><?= $s->analisa ?></td>
                                        <td class="text-center" rowspan="<?=$rows?>">
                                            <input id="input<?= $s->id_soal_siswa ?>"
                                                   name="input<?= $s->id_soal_siswa ?>"
                                                   value="<?= $s->point ?>"
                                                   type="number" min="0"
                                                   max="<?= round($info->bobot_jodohkan / $info->tampil_jodohkan, 2) ?>"
                                                   step="0.10"
                                                   style="width: 100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box; display: none"/>
                                            <span class="jodohkan" data-idsoal="<?= $s->id_soal_siswa ?>"
                                                  id="span<?= $s->id_soal_siswa ?>"><?= $s->point ?></span>
                                        </td>
                                        <td rowspan="<?=$rows?>">
                                            <button id="edit<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="edit(<?= $s->id_soal_siswa ?>)"><i
                                                        class="fa fa-pencil"></i>
                                            </button>
                                            <button id="undo<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="undo(<?= $s->id_soal_siswa ?>, <?= $s->point_otomatis ?>)">
                                                <i
                                                        class="fa fa-undo"></i></button>
                                        </td>
                                    </tr>
                                <?php for ($t = 1, $tMax = count($s->tabel_soal); $t < $tMax; $t++):?>
                                <tr>
                                    <td>
                                        <?php
                                        $jwb = $s->tabel_soal[$t];
                                        if ($s->type_soal == '1') : ?>
                                                <span><?= $jwb->title ?></span>
                                                <?php if (isset($jwb->subtitle)) : ?>
                                                    <ul>
                                                        <?php foreach ($jwb->subtitle as $sub) : ?>
                                                            <li><?= $sub ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else: ?>
                                                    <br>--
                                                <?php endif; ?>
                                        <?php else: ?>
                                                <p><?= $jwb->title ?>
                                                    <br><?= isset($jwb->subtitle) ? $jwb->subtitle[0] : '' ?></p>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $jwb = $s->tabel_jawab[$t] ?? [];
                                        if ($s->type_soal == '1') : ?>
                                                <span><?= $jwb->title ?? '' ?></span>
                                                <?php if (isset($jwb->subtitle)) : ?>
                                                    <ul>
                                                        <?php foreach ($jwb->subtitle as $sub) : ?>
                                                            <li><?= $sub ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else: ?>
                                                    <br>--
                                                <?php endif; ?>
                                        <?php else: ?>
                                                <p><?= $jwb->title ?? '' ?>
                                                    <br><?= isset($jwb->subtitle) ? $jwb->subtitle[0] : '--' ?></p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                    <?php endfor; ?>
                                    <?php $ns++; endforeach; ?>
                                <tr>
                                    <td colspan="5" class="text-right text-bold">TOTAL SCORE MENJODOHKAN</td>
                                    <td class="text-center text-bold"><?= round($skor->skor_jodohkan, 2) ?></td>
                                    <td>
                                        <button id="jodohkan"
                                                data-max="<?= round($info->bobot_jodohkan / $info->tampil_jodohkan, 2) ?>"
                                                class="btn btn-sm btn-primary" onclick="simpan(this)">Simpan
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="overlay d-none" id="loading-jodohkan">
                            <div class="spinner-grow"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($soal[4]) && count($soal[4]) > 0) : ?>
                    <div class="card card-default my-shadow mb-4">
                        <div class="card-header">
                            <h6 class="card-title"><b>IV. ISIAN SINGKAT</b></h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-default-success" role="alert">
                                <ul>
                                    <li>Bobot soal: <b><?= $info->bobot_isian ?></b>. Jumlah soal:
                                        <b><?= $info->tampil_isian ?></b>. Max point persoal:
                                        <b><?= round($info->bobot_isian / $info->tampil_isian, 2) ?></b>.
                                    </li>
                                    <li>Point soal isian singkat bisa diedit</li>
                                    <li>Utamakan mengkoreksi hasil analisa yang berwarna kuning</li>
                                    <li>Klik <i class="fa fa-pencil"></i> untuk mengedit point. Klik <i
                                                class="fa fa-undo"></i> untuk mengembalikan ke point otomatis
                                    </li>
                                    <li>Klik tobol <b>SIMPAN</b> untuk menyimpan perubahan point</li>
                                </ul>
                            </div>
                            <table id="table-isian"
                                   class="w-100 table table-striped table-bordered border-success nowrap">
                                <thead>
                                <tr>
                                    <th class="text-center align-middle bg-blue" style="width: 50px">No. Soal</th>
                                    <th class="text-center align-middle bg-blue">Soal</th>
                                    <th class="text-center align-middle bg-blue" style="width: 50px">Jawaban Benar</th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">Jawaban Siswa</th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">Analisa</th>
                                    <th class="text-center align-middle bg-teal" style="width: 80px">
                                        Point<br>Max. <?= round($info->bobot_isian / $info->tampil_isian, 2) ?></th>
                                    <th class="text-center align-middle bg-teal" style="width: 80px">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ns = 1;
                                foreach ($soal[4] as $s) :?>
                                    <tr>
                                        <td class="text-center"><?= $ns ?></td>
                                        <td><?= $s->soal ?></td>
                                        <td class="text-center"><?= $s->jawaban_benar ?></td>
                                        <td class="text-center"><?= $s->jawaban_siswa ?></td>
                                        <td class="text-center"><?= $s->analisa ?></td>
                                        <td class="text-center">
                                            <input id="input<?= $s->id_soal_siswa ?>"
                                                   name="input<?= $s->id_soal_siswa ?>"
                                                   value="<?= $s->point ?>"
                                                   type="number" min="0"
                                                   max="<?= round($info->bobot_isian / $info->tampil_isian, 2) ?>"
                                                   step="0.1"
                                                   style="width: 100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box; display: none"/>
                                            <span class="isian" data-idsoal="<?= $s->id_soal_siswa ?>"
                                                  id="span<?= $s->id_soal_siswa ?>"><?= $s->point ?></span>
                                        </td>
                                        <td>
                                            <button id="edit<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="edit(<?= $s->id_soal_siswa ?>)"><i
                                                        class="fa fa-pencil"></i>
                                            </button>
                                            <button id="undo<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="undo(<?= $s->id_soal_siswa ?>, <?= $s->point_otomatis ?>)">
                                                <i
                                                        class="fa fa-undo"></i></button>
                                        </td>
                                    </tr>
                                    <?php $ns++; endforeach; ?>
                                <tr>
                                    <td colspan="5" class="text-right text-bold">TOTAL SCORE ISIAN SINGKAT</td>
                                    <td class="text-center text-bold"><?= round($skor->skor_isian, 2) ?></td>
                                    <td>
                                        <button id="isian"
                                                data-max="<?= round($info->bobot_isian / $info->tampil_isian, 2) ?>"
                                                class="btn btn-sm btn-primary" onclick="simpan(this)">Simpan
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="overlay d-none" id="loading-isian">
                            <div class="spinner-grow"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($soal[5]) && count($soal[5]) > 0) : ?>
                    <div class="card card-default my-shadow mb-4">
                        <div class="card-header">
                            <h6 class="card-title"><b>V. URAIAN</b></h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-default-success" role="alert">
                                <ul>
                                    <li>Bobot soal: <b><?= $info->bobot_esai ?></b>. Jumlah soal:
                                        <b><?= $info->tampil_esai ?></b>. Max point persoal:
                                        <b><?= round($info->bobot_esai / $info->tampil_esai) ?></b>.
                                    </li>
                                    <li>Point soal uraian bisa diedit</li>
                                    <li>Utamakan mengkoreksi hasil analisa yang berwarna kuning</li>
                                    <li>Klik <i class="fa fa-pencil"></i> untuk mengedit point. Klik <i
                                                class="fa fa-undo"></i> untuk mengembalikan ke point otomatis
                                    </li>
                                    <li>Klik tobol <b>SIMPAN</b> untuk menyimpan perubahan point</li>
                                </ul>
                            </div>
                            <table id="table-essai"
                                   class="w-100 table table-striped table-bordered border-success nowrap">
                                <thead>
                                <tr>
                                    <th class="text-center align-middle bg-blue" style="width: 50px">No. Soal</th>
                                    <th class="text-center align-middle bg-blue">Soal</th>
                                    <th class="text-center align-middle bg-blue" style="width: 50px">Jawaban Benar</th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">Jawaban Siswa</th>
                                    <th class="text-center align-middle bg-teal" style="width: 50px">Analisa</th>
                                    <th class="text-center align-middle bg-teal" style="width: 80px">
                                        Point<br>Max. <?= round($info->bobot_esai / $info->tampil_esai) ?></th>
                                    <th class="text-center align-middle bg-teal" style="width: 80px">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ns = 1;
                                foreach ($soal[5] as $s) :?>
                                    <tr>
                                        <td class="text-center"><?= $ns ?></td>
                                        <td><?= $s->soal ?></td>
                                        <td class="text-center"><?= $s->jawaban_benar ?></td>
                                        <td class="text-center"><?= $s->jawaban_siswa ?></td>
                                        <td class="text-center"><?= $s->analisa ?></td>
                                        <td class="text-center">
                                            <input id="input<?= $s->id_soal_siswa ?>"
                                                   name="input<?= $s->id_soal_siswa ?>"
                                                   value="<?= $s->point ?>"
                                                   type="number" min="0"
                                                   max="<?= round($info->bobot_esai / $info->tampil_esai, 2) ?>"
                                                   step="0.10"
                                                   style="width: 100%; box-sizing: border-box; -webkit-box-sizing:border-box; -moz-box-sizing: border-box; display: none"/>
                                            <span class="essai" data-idsoal="<?= $s->id_soal_siswa ?>"
                                                  id="span<?= $s->id_soal_siswa ?>"><?= $s->point ?></span>
                                        </td>
                                        <td>
                                            <button id="edit<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="edit(<?= $s->id_soal_siswa ?>)"><i
                                                        class="fa fa-pencil"></i>
                                            </button>
                                            <button id="undo<?= $s->id_soal_siswa ?>" type="button" class="btn btn-sm"
                                                    onclick="undo(<?= $s->id_soal_siswa ?>, <?= $s->point_otomatis ?>)">
                                                <i class="fa fa-undo"></i></button>
                                        </td>
                                    </tr>
                                    <?php $ns++; endforeach; ?>
                                <tr>
                                    <td colspan="5" class="text-right text-bold">TOTAL SCORE URAIAN</td>
                                    <td class="text-center text-bold"><?= round($skor->skor_essai, 2) ?></td>
                                    <td>
                                        <button id="essai"
                                                data-max="<?= round($info->bobot_esai / $info->tampil_esai, 2) ?>"
                                                class="btn btn-sm btn-primary" onclick="simpan(this)">Simpan
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="overlay d-none" id="loading-essai">
                            <div class="spinner-grow"></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?= form_open('update', array('id' => 'koreksi')) ?>
<?= form_close() ?>

<script>
    function edit(id) {
        var input = $(`#input${id}`);
        var span = $(`#span${id}`);
        var btnedit = $(`#edit${id}`);

        if (input.is(":visible")) {
            input.hide();
            span.text(input.val()).show();
            btnedit.html(`<i class="fa fa-pencil"></i>`);
        } else {
            span.hide();
            input.val(span.text()).show();
            btnedit.html(`<i class="fa fa-check"></i>`);
        }
    }

    function undo(id, nilai) {
        var input = $(`#input${id}`);
        var span = $(`#span${id}`);
        input.val(nilai);
        span.text(nilai);
    }

    function simpan(btn) {
        var id = $(btn).attr('id');
        var key;
        if (id === 'pg') {
            key = 'pg_nilai';
        } else if (id === 'pg2') {
            key = 'kompleks_nilai';
        } else if (id === 'jodohkan') {
            key = 'jodohkan_nilai';
        } else if (id === 'isian') {
            key = 'isian_nilai';
        } else if (id === 'essai') {
            key = 'essai_nilai';
        }

        var loading = $(`#loading-${id}`);
        var max = $(btn).data('max');
        var $nilai = $(`#table-${id}`).find(`.${id}`);
        var json = [];
        $.each($nilai, function () {
            var n = $(this).text();
            if (n > max) {
                showDangerToast("Point persoal harus kurang dari " + max);
                json = [];
                return false;
            }
            if ($(this).is(":hidden")) {
                showDangerToast("Klik tombol &#10004; dulu");
                json = [];
                return false;
            }

            var item = {};
            item['id_soal'] = $(this).data('idsoal');
            //item['jenis'] = jenis;
            item['koreksi'] = $(this).text();
            json.push(item);
        });

        var dataPost = $('#koreksi').serialize() + '&siswa=<?=$siswa->id_siswa?>&jadwal=<?=$info->id_jadwal?>&jenis=' + key +
            '&nilai=' + JSON.stringify(json);
        console.log(dataPost);

        if (json.length > 0) {
            loading.removeClass('d-none');
            swal.fire({
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
                url: base_url + "cbtnilai/simpankoreksi",
                type: "POST",
                data: dataPost,
                success: function (data) {
                    console.log(data);
                    if (data.success > 0) {
                        swal.fire({
                            title: "Berhasil",
                            text: "Koreksi nilai berhasil disimpan",
                            icon: "success"
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    } else {
                        loading.addClass('d-none');
                        swal.fire({
                            title: "Gagal",
                            text: 'Tidak ada nilai yang disimpan',
                            icon: "error"
                        });
                    }
                }, error: function (xhr, status, error) {
                    loading.addClass('d-none');
                    console.log("error", xhr.responseText);
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        }
    }

    $(document).ready(function () {
        $('#konten-soal tbody tr img').each(function () {
            var curSrc = $(this).attr('src');
            var pathUpload = 'uploads';
            if (curSrc.indexOf("base64") > 0 || !curSrc.includes("uploads")) {
            } else {
                var forReplace = curSrc.split(pathUpload);
                $(this).attr('src', base_url + pathUpload + forReplace[1]);
            }
            $(this).css({'max-width': '100px'})
        });

        $('#btn-marked').on('click', function () {
            $(this).attr('disabled', 'disabled');
            var dataPost = $('#koreksi').serialize() + '&siswa=<?=$siswa->id_siswa?>&jadwal=<?=$info->id_jadwal?>';
            console.log(dataPost)
            swal.fire({
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
                url: base_url + "cbtnilai/tandaikoreksi",
                type: "POST",
                data: dataPost,
                success: function (data) {
                    $('#btn-marked').removeAttr('disabled');
                    console.log(data);
                    if (data.success) {
                        swal.fire({
                            title: "Berhasil",
                            text: "Jawaban berhasil ditandai",
                            icon: "success"
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    } else {
                        swal.fire({
                            title: "Gagal",
                            text: 'Tidak bisa menandai',
                            icon: "error"
                        });
                    }
                }, error: function (xhr, status, error) {
                    $('#btn-marked').removeAttr('disabled');
                    console.log("error", xhr.responseText);
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        })
    })
</script>
