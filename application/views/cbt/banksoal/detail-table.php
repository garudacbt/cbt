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
                <h1><?= $subjudul ?></h1>
                <a href="<?= base_url('cbtbanksoal') ?>" type="button" class="btn btn-sm btn-danger float-right">
                    <i class="fas fa-arrow-circle-left"></i><span
                            class="d-none d-sm-inline-block ml-1">Kembali</span>
                </a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                    <div class="card-tools">
                        <button type="button" onclick="javascript:window.location.reload()"
                                class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </button>
                        <button id="convert" class="btn btn-sm btn-primary">
                            <i class="fas fa-download"></i> <span
                                    class="d-none d-sm-inline-block ml-1">Download Soal</span>
                        </button>
                        <a href="<?= base_url('cbtbanksoal/buatsoal/' . $bank->id_bank) ?>"
                           type="button" class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> <span
                                    class="d-none d-sm-inline-block ml-1">Tambah/Edit Soal</span>
                        </a>
                    </div>
                </div>
                <div id="tabel-konten" class="card-body">
                    <div id="alert-download" class="alert alert-success align-content-center d-none" role="alert">
                        <div id="download-area"></div>
                    </div>

                    <?php
                    $soals_pg = [];
                    $soals_pg2 = [];
                    $soals_jodohkan = [];
                    $soals_isian = [];
                    $soals_essai = [];
                    foreach ($soals as $soal) {
                        if ($soal->jenis == "1") {
                            $soals_pg[] = $soal;
                        } elseif ($soal->jenis == "2") {
                            $soals_pg2[] = $soal;
                        } elseif ($soal->jenis == "3") {
                            $soals_jodohkan[] = $soal;
                        } elseif ($soal->jenis == "4") {
                            $soals_isian[] = $soal;
                        } elseif ($soal->jenis == "5") {
                            $soals_essai[] = $soal;
                        }
                    }

                    $badge_success = '<span class="text-lg"><i class="bi-check-circle"></i></span>';
                    $badge_danger = '<span class="text-lg text-danger"><i class="bi-exclamation-circle"></i></span>';

                    $total_pg = count($soals_pg);
                    $total_pg_tampil = isset(array_count_values(array_column($soals_pg, 'tampilkan'))['1']) ? array_count_values(array_column($soals_pg, 'tampilkan'))['1'] : 0;
                    $badge_pg = $total_pg_tampil < $bank->tampil_pg ? $badge_danger : $badge_success;

                    $total_pg2 = count($soals_pg2);
                    $total_pg2_tampil = isset(array_count_values(array_column($soals_pg2, 'tampilkan'))['1']) ? array_count_values(array_column($soals_pg2, 'tampilkan'))['1'] : 0;
                    $badge_pg2 = $total_pg2_tampil < $bank->tampil_kompleks ? $badge_danger : $badge_success;

                    $total_jodohkan = count($soals_jodohkan);
                    $total_jodohkan_tampil = isset(array_count_values(array_column($soals_jodohkan, 'tampilkan'))['1']) ? array_count_values(array_column($soals_jodohkan, 'tampilkan'))['1'] : 0;
                    $badge_jodohkan = $total_jodohkan_tampil < $bank->tampil_jodohkan ? $badge_danger : $badge_success;

                    $total_isian = count($soals_isian);
                    $total_isian_tampil = isset(array_count_values(array_column($soals_isian, 'tampilkan'))['1']) ? array_count_values(array_column($soals_isian, 'tampilkan'))['1'] : 0;
                    $badge_isian = $total_isian_tampil < $bank->tampil_isian ? $badge_danger : $badge_success;

                    $total_essai = count($soals_essai);
                    $total_essai_tampil = isset(array_count_values(array_column($soals_essai, 'tampilkan'))['1']) ? array_count_values(array_column($soals_essai, 'tampilkan'))['1'] : 0;
                    $badge_essai = $total_essai_tampil < $bank->tampil_esai ? $badge_danger : $badge_success;

                    $total_soal_tampil = isset(array_count_values(array_column($soals, 'tampilkan'))['1']) ? array_count_values(array_column($soals, 'tampilkan'))['1'] : 0;
                    $total_soal_seharusnya_tampil = $bank->tampil_pg + $bank->tampil_kompleks + $bank->tampil_jodohkan + $bank->tampil_isian + $bank->tampil_esai;

                    //echo '<pre>';
                    //var_dump($total_soal_seharusnya_tampil);
                    //var_dump($total_soal_tampil);
                    //echo '</pre>';
                    //
                    $tampil_kurang = ($total_pg_tampil + $total_pg2_tampil + $total_jodohkan_tampil + $total_isian_tampil + $total_essai_tampil) < $total_soal_seharusnya_tampil;
                    $soal_kurang = $total_pg_tampil <> $bank->tampil_pg && $total_pg2_tampil <> $bank->tampil_kompleks
                        && $total_jodohkan_tampil <> $bank->tampil_jodohkan && $total_isian_tampil <> $bank->tampil_isian
                        && $total_essai_tampil <> $bank->tampil_esai;
                    $status_soal = $soal_kurang || $tampil_kurang ? 'Belum Selesai' : 'SELESAI';
                    $ket_soal = count($soals) < $total_soal_seharusnya_tampil ? 'pembuatan soal masih kurang'
                        : ($tampil_kurang ? 'soal yang ditampilkan masih kurang' : ($soal_kurang ? 'soal yang ditampilkan tidak sama dengan seharusnya' : 'soal sudah cukup dan siap digunakan'));
                    $bg_color = $total_soal_tampil < $total_soal_seharusnya_tampil ? 'bg-danger' : 'bg-success';

                    $jk = json_decode(json_encode($bank->bank_kelas));
                    $jumlahKelas = json_decode(json_encode(unserialize($jk)));

                    $kelasbank = '';
                    $no = 1;
                    foreach ($jumlahKelas as $j) {
                        foreach ($kelas as $k) {
                            if ((isset($j->kelas_id) && isset($k->id_kelas)) && $j->kelas_id === $k->id_kelas) {
                                if ($no > 1) {
                                    $kelasbank .= ', ';
                                }
                                $kelasbank .= $k->nama_kelas;
                                $no++;
                            }
                        }
                    }
                    //var_dump($check_soal);
                    ?>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item p-1"> Kode Bank Soal
                                    <span class="float-right"><b><?= $bank->bank_kode ?></b></span>
                                </li>
                                <li class="list-group-item p-1"> Mata Pelajaran
                                    <span class="float-right"><b><?= $bank->nama_mapel ?></b></span>
                                </li>
                                <li class="list-group-item p-1"> Guru
                                    <span class="float-right">
											<b><?= $bank->nama_guru ?></b>
										</span>
                                </li>
                                <li class="list-group-item p-1"> Kelas
                                    <span class="float-right"><b><?= $kelasbank ?></b></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item p-1"> Total Seharusnya
                                    <span class="float-right"><b><?= $total_soal_seharusnya_tampil ?></b></span>
                                </li>
                                <li class="list-group-item p-1"> Total Soal dibuat
                                    <span class="float-right"><b><?= count($soals) ?></b></span>
                                </li>
                                <li class="list-group-item p-1"> Total ditampilkan
                                    <span class="float-right"><b><?= $total_soal_tampil ?></b></span>
                                </li>
                                <li class="list-group-item p-1"> Keterangan
                                    <span class="float-right"><b><?= $status_soal ?></b></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="card">
                                <div class="card-body text-center p-2 <?= $bg_color ?>">
                                    <b>Pembuatan Soal</b>
                                    <br>
                                    <span class="text-lg"><b><?= $status_soal ?></b></span>
                                    <br>
                                    <span><?= $ket_soal ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-default my-shadow mb-4">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#ganda" data-toggle="tab">Pilihan
                                Ganda <?= $badge_pg ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="#kompleks" data-toggle="tab">Pilihan Ganda
                                Kompleks <?= $badge_pg2 ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="#jodoh"
                                                data-toggle="tab">Menjodohkan <?= $badge_jodohkan ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="#isian" data-toggle="tab">Isian
                                Singkat <?= $badge_isian ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="#essai"
                                                data-toggle="tab">Essai/Uraian <?= $badge_essai ?></a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="ganda">
                            <table class="table table-bordered">
                                <tr class="alert alert-default-dark text-center align-middle">
                                    <th class="border-dark">Jenis Soal</th>
                                    <th class="border-dark" colspan="2">Jumlah Soal</th>
                                    <th class="border-dark">Bobot Nilai</th>
                                    <th class="border-dark">Point Per-nomor</th>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td rowspan="3" class="text-center align-middle border-dark">Pilihan Ganda</td>
                                    <td class="border-dark">Seharusnya</td>
                                    <td class="text-center border-dark"><?= $bank->tampil_pg ?></td>
                                    <td rowspan="3" class="text-center align-middle border-dark">
                                        <?= $bank->bobot_pg ?>
                                    </td>
                                    <td rowspan="3" class="text-center align-middle border-dark">
                                        <?= $bank->bobot_pg > 0 ? round(($bank->bobot_pg / max($total_pg_tampil, $bank->tampil_pg)), 2) : 0 ?>
                                    </td>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td class="border-dark">Telah dibuat</td>
                                    <td class="text-center border-dark"><?= $total_pg ?></td>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td class="border-dark">Ditampilkan</td>
                                    <td class="text-center border-dark"><?= $total_pg_tampil ?></td>
                                </tr>
                                <tr class="alert alert-default-danger">
                                    <td colspan="5" class="border-dark">
                                        Info :
                                        <br>
                                        <?php if ($total_pg < $bank->tampil_pg) : ?>
                                            Soal PILIHAN GANDA masih kurang, klik tombol <b>(<i class="fas fa-plus"></i>
                                                Tambah/Edit Soal)</b>  untuk menambahkan.
                                            <br>
                                        <?php endif; ?>
                                        <?php if ($total_pg > 0 && $bank->tampil_pg == '0') : ?>
                                            Ada soal PILIHAN GANDA tapi tidak ada yang ditampilkan.
                                            <br>
                                        <?php endif; ?>
                                        <?php if ($total_pg_tampil <> $bank->tampil_pg) : ?>
                                            Jumlah soal yang ditampilkan tidak sama dengan jumlah seharusnya.
                                            <br>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <?php if ($total_pg > 0) : ?>
                                <?= form_open('', array('id' => 'select-pg')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="1">
                                <div class="d-sm-flex justify-content-between">
                                    <div>
                                        <input style="width: 24px; height: 24px" class="check-pg-all m-1" id="all-pg"
                                               type="checkbox">
                                        <label for="all-pg" class="align-middle">Pilih Semua PG</label>
                                    </div>
                                    <div>
                                        <span><b>Jumlah PG terpilih: </b></span>
                                        <span id="total-pg" class="text-lg"></span>

                                        <button type="button" class="btn btn-sm btn-primary ml-3" id="save-pg">
                                            <i class="fa fa-save"></i> <span class="d-none d-md-inline-block ml-1">Simpan Soal Terpilih</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="rTable">
                                    <div class="rTableBody">
                                        <?php
                                        foreach ($soals_pg as $s) :
                                        $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                        <div class="rTableRow">
                                            <div class="rTableCell align-top">
                                                <input style="width: 24px; height: 24px" class="check-pg mt-1"
                                                       id="<?= $s->id_soal ?>" type="checkbox" name="soal[]"
                                                       value="<?= $s->id_soal ?>" <?= $checked ?>>
                                            </div>
                                            <div class="rTableCell align-top">
                                                <div class="mt-2">
                                                    <?= $s->nomor_soal ?>.
                                                </div>
                                            </div>
                                            <div class="rTableCell">
                                                <div class="mt-2">
                                                    <?= $s->soal ?>
                                                    <br>
                                                </div>
                                                <br>
                                                <ul class="list-group list-group-unbordered pl-3"
                                                    style="list-style-type: upper-alpha">
                                                    <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_a) ?></li>
                                                    <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_b) ?></li>
                                                    <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_c) ?></li>
                                                    <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_d) ?></li>
                                                    <?php if ($setting->jenjang === '3') : ?>
                                                        <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_e) ?></li>
                                                    <?php endif; ?>
                                                </ul>
                                                <div class="mb-2 mt-2">Jawaban: <b><?= strtoupper($s->jawaban) ?></b>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <!--
                                <table id="table-pg" class="table-soal table table-striped mt-3">
                                    <?php
                                    foreach ($soals_pg as $s) :
                                        $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                        <tr>
                                            <td class="border-0" style="width: 30px">
                                                <input style="width: 24px; height: 24px" class="check-pg mt-1"
                                                       id="<?= $s->id_soal ?>" type="checkbox" name="soal[]"
                                                       value="<?= $s->id_soal ?>" <?= $checked ?>>
                                            </td>
                                            <td class="border-0" style="width: 30px">
                                                <div class="mt-2">
                                                    <?= $s->nomor_soal ?>.
                                                </div>
                                            </td>
                                            <td class="border-0 w-100">
                                                <div class="mt-2">
                                                    <?= $s->soal ?>
                                                    <br>
                                                </div>
                                                <ul class="list-group list-group-unbordered pl-3"
                                                    style="list-style-type: upper-alpha">
                                                    <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_a) ?></li>
                                                    <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_b) ?></li>
                                                    <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_c) ?></li>
                                                    <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_d) ?></li>
                                                    <?php if ($setting->jenjang === '3') : ?>
                                                        <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_e) ?></li>
                                                    <?php endif; ?>
                                                </ul>
                                                <div class="mb-2 mt-2">Jawaban: <b><?= strtoupper($s->jawaban) ?></b>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                                -->
                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Pilihan Ganda
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane" id="kompleks">
                            <table class="table table-bordered">
                                <tr class="alert alert-default-dark text-center align-middle">
                                    <th class="border-dark">Jenis Soal</th>
                                    <th class="border-dark" colspan="2">Jumlah Soal</th>
                                    <th class="border-dark">Bobot Nilai</th>
                                    <th class="border-dark">Point Per-nomor</th>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td rowspan="3" class="text-center align-middle border-dark">Pil. Ganda Kompleks
                                    </td>
                                    <td class="border-dark">Seharusnya</td>
                                    <td class="text-center border-dark"><?= $bank->tampil_kompleks ?></td>
                                    <td rowspan="3" class="text-center align-middle border-dark">
                                        <?= $bank->bobot_kompleks ?>
                                    </td>
                                    <td rowspan="3" class="text-center align-middle border-dark">
                                        <?= $bank->bobot_kompleks > 0 ? round(($bank->bobot_kompleks / max($total_pg2_tampil, $bank->tampil_kompleks)), 2) : 0 ?>
                                    </td>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td class="border-dark">Telah dibuat</td>
                                    <td class="text-center border-dark"><?= $total_pg2 ?></td>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td class="border-dark">Ditampilkan</td>
                                    <td class="text-center border-dark"><?= $total_pg2_tampil ?></td>
                                </tr>
                                <tr class="alert alert-default-danger">
                                    <td colspan="5" class="border-dark">
                                        Info :
                                        <br>
                                        <?php if ($total_pg2 < $bank->tampil_kompleks) : ?>
                                            Soal PILIHAN GANDA KOMPLEKS masih kurang, klik tombol <b>(<i
                                                        class="fas fa-plus"></i> Tambah/Edit
                                                Soal)</b>  untuk menambahkan.
                                            <br>
                                        <?php endif; ?>
                                        <?php if ($total_pg2 > 0 && $bank->tampil_kompleks == '0') : ?>
                                            Ada soal PILIHAN GANDA KOMPLEKS tapi tidak ada yang ditampilkan.
                                            <br>
                                        <?php endif; ?>
                                        <?php if ($total_pg2_tampil <> $bank->tampil_kompleks) : ?>
                                            Jumlah soal yang ditampilkan tidak sama dengan jumlah seharusnya.
                                            <br>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <?php if ($total_pg2 > 0) : ?>
                                <?= form_open('', array('id' => 'select-pg2')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="2">
                                <div class="d-sm-flex justify-content-between">
                                    <div>
                                        <input style="width: 24px; height: 24px" class="check-pg2-all m-1" id="all-pg2"
                                               type="checkbox">
                                        <label for="all-pg2" class="align-middle">Pilih Semua</label>
                                    </div>
                                    <div>
                                        <span><b>Jumlah Soal terpilih: </b></span>
                                        <span id="total-pg2" class="text-lg"></span>

                                        <button type="button" class="btn btn-sm btn-primary ml-3" id="save-pg2">
                                            <i class="fa fa-save"></i> <span class="d-none d-sm-inline-block ml-1">Simpan Soal Terpilih</span>
                                        </button>
                                    </div>
                                </div>
                                <table id="table-pg2" class="table-soal table table-striped mt-3">
                                    <?php
                                    foreach ($soals_pg2 as $s) :
                                        $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                        <tr>
                                            <td class="border-0" style="width: 30px">
                                                <input style="width: 24px; height: 24px" class="check-pg2"
                                                       id="<?= $s->id_soal ?>" type="checkbox" name="soal[]"
                                                       value="<?= $s->id_soal ?>" <?= $checked ?>>
                                            </td>
                                            <td class="border-0" style="width: 30px">
                                                <div class="mt-2">
                                                    <?= $s->nomor_soal ?>.
                                                </div>
                                            </td>
                                            <td class="border-0 w-100">
                                                <div class="mt-2">
                                                    <?= $s->soal ?>
                                                </div>
                                                <?php
                                                $opsis = unserialize($s->opsi_a);
                                                $jawabs = unserialize($s->jawaban);
                                                $jwb_pg2 = '';
                                                if ($jawabs) {
                                                    $jwb_pg2 = implode(', ', $jawabs);
                                                }
                                                if ($opsis) : ?>
                                                    <ul class="list-group list-group-unbordered pl-3"
                                                        style="list-style-type: upper-alpha">
                                                        <?php for ($i = 97; $i < (97 + count($opsis)); $i++) :
                                                            $abjad = chr($i); ?>
                                                            <li><?= str_replace(['<p>', '</p>'], '', $opsis[$abjad]) ?></li>
                                                        <?php endfor; ?>
                                                    </ul>
                                                <?php endif; ?>
                                                <div class="mb-2 mt-2">Jawaban: <b><?= strtoupper($jwb_pg2) ?></b></div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Pilihan Ganda Kompleks
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane" id="jodoh">
                            <table class="table table-bordered">
                                <tr class="alert alert-default-dark text-center align-middle">
                                    <th class="border-dark">Jenis Soal</th>
                                    <th class="border-dark" colspan="2">Jumlah Soal</th>
                                    <th class="border-dark">Bobot Nilai</th>
                                    <th class="border-dark">Point Per-nomor</th>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td rowspan="3" class="text-center align-middle border-dark">Menjodohkan</td>
                                    <td class="border-dark">Seharusnya</td>
                                    <td class="text-center border-dark"><?= $bank->tampil_jodohkan ?></td>
                                    <td rowspan="3" class="text-center align-middle border-dark">
                                        <?= $bank->bobot_jodohkan ?>
                                    </td>
                                    <td rowspan="3" class="text-center align-middle border-dark">
                                        <?= $bank->bobot_jodohkan > 0 ? round(($bank->bobot_jodohkan / max($total_jodohkan_tampil, $bank->tampil_jodohkan)), 2) : 0 ?>
                                    </td>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td class="border-dark">Telah dibuat</td>
                                    <td class="text-center border-dark"><?= $total_jodohkan ?></td>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td class="border-dark">Ditampilkan</td>
                                    <td class="text-center border-dark"><?= $total_jodohkan_tampil ?></td>
                                </tr>
                                <tr class="alert alert-default-danger">
                                    <td colspan="5" class="border-dark">
                                        Info :
                                        <br>
                                        <?php if ($total_jodohkan < $bank->tampil_jodohkan) : ?>
                                            Soal MENJODOHKAN masih kurang, klik tombol <b>(<i class="fas fa-plus"></i>
                                                Tambah/Edit Soal)</b>  untuk menambahkan.
                                            <br>
                                        <?php endif; ?>
                                        <?php if ($total_jodohkan > 0 && $bank->tampil_jodohkan == '0') : ?>
                                            Ada soal MENJODOHKAN tapi tidakada yang ditampilkan.
                                            <br>
                                        <?php endif; ?>
                                        <?php if ($total_jodohkan_tampil <> $bank->tampil_jodohkan) : ?>
                                            Jumlah soal yang ditampilkan tidak sama dengan jumlah seharusnya.
                                            <br>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <?php if ($total_jodohkan > 0) : ?>
                                <?= form_open('', array('id' => 'select-jodohkan')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="3">
                                <div class="d-sm-flex justify-content-between">
                                    <div>
                                        <input style="width: 24px; height: 24px" class="check-jodohkan-all m-1"
                                               id="all-jodohkan" type="checkbox">
                                        <label for="all-jodohkan" class="align-middle">Pilih Semua</label>
                                    </div>
                                    <div>
                                        <span><b>Jumlah Soal terpilih: </b></span>
                                        <span id="total-jodohkan" class="text-lg"></span>

                                        <button type="button" class="btn btn-sm btn-primary ml-3" id="save-jodohkan">
                                            <i class="fa fa-save"></i> <span class="d-none d-sm-inline-block ml-1">Simpan Soal Terpilih</span>
                                        </button>
                                    </div>
                                </div>
                                <table id="table-jodohkan" class="table-soal table table-striped mt-3">
                                    <?php
                                    foreach ($soals_jodohkan as $s) :
                                        $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                        <tr>
                                            <td class="border-0" style="width: 30px">
                                                <input style="width: 24px; height: 24px" class="check-jodohkan"
                                                       id="<?= $s->id_soal ?>" type="checkbox" name="soal[]"
                                                       value="<?= $s->id_soal ?>" <?= $checked ?>>
                                            </td>
                                            <td class="border-0" style="width: 30px">
                                                <div class="mt-2">
                                                    <?= $s->nomor_soal ?>.
                                                </div>
                                            </td>
                                            <td class="border-0 w-100">
                                                <div class="mt-2">
                                                    <?= $s->soal ?>
                                                </div>
                                                <?php $jawaban = unserialize($s->jawaban);
                                                if (!isset($jawaban['jawaban'])) $jawaban['jawaban'] = [];
                                                ?>
                                                <div class="mb-2 mt-2"><b>Jawaban:</b></div>
                                                <?php if (isset($jawaban['model']) && $jawaban['model'] == '1') : ?>
                                                    <div class='list-jodohkan'
                                                         data-list='<?= json_encode($jawaban['jawaban']) ?>'>
                                                        <div class="bonds" id="soal<?= $s->id_soal ?>"
                                                             style="display:block;"></div>
                                                    </div>
                                                <?php else : ?>
                                                    <table class="table table-bordered">
                                                        <?php
                                                        foreach ($jawaban['jawaban'] as $nomor => $items) :
                                                            if ($nomor === 0) : ?>
                                                                <tr class="text-center">
                                                                    <?php foreach ($items as $head) :
                                                                        $head = $head == "#" ? "" : $head; ?>
                                                                        <th><?= $head ?></th>
                                                                    <?php endforeach; ?>
                                                                </tr>

                                                            <?php else : ?>
                                                                <tr class="text-center">
                                                                    <?php foreach ($items as $key => $val) :
                                                                        $jbenar = $val == "0" ? '' : ($val == "1" ? '&#10004;' : '<b>' . $val . '</b>') ?>
                                                                        <td><?= $jbenar ?></td>
                                                                    <?php endforeach; ?>
                                                                </tr>
                                                            <?php endif; endforeach; ?>
                                                    </table>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Menjodohkan
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane" id="isian">
                            <table class="table table-bordered">
                                <tr class="alert alert-default-dark text-center align-middle">
                                    <th class="border-dark">Jenis Soal</th>
                                    <th class="border-dark" colspan="2">Jumlah Soal</th>
                                    <th class="border-dark">Bobot Nilai</th>
                                    <th class="border-dark">Point Per-nomor</th>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td rowspan="3" class="text-center align-middle border-dark">Isian Singkat</td>
                                    <td class="border-dark">Seharusnya</td>
                                    <td class="text-center border-dark"><?= $bank->tampil_isian ?></td>
                                    <td rowspan="3" class="text-center align-middle border-dark">
                                        <?= $bank->bobot_isian ?>
                                    </td>
                                    <td rowspan="3" class="text-center align-middle border-dark">
                                        <?= $bank->bobot_isian > 0 ? round(($bank->bobot_isian / max($total_isian_tampil, $bank->tampil_isian)), 2) : 0 ?>
                                    </td>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td class="border-dark">Telah dibuat</td>
                                    <td class="text-center border-dark"><?= $total_isian ?></td>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td class="border-dark">Ditampilkan</td>
                                    <td class="text-center border-dark"><?= $total_isian_tampil ?></td>
                                </tr>
                                <tr class="alert alert-default-danger">
                                    <td colspan="5" class="border-dark">
                                        Info :
                                        <br>
                                        <?php if ($total_isian < $bank->tampil_isian) : ?>
                                            Soal ISIAN SINGKAT masih kurang, klik tombol <b>(<i class="fas fa-plus"></i>
                                                Tambah/Edit Soal)</b>  untuk menambahkan.
                                            <br>
                                        <?php endif; ?>
                                        <?php if ($total_isian > 0 && $bank->tampil_isian == '0') : ?>
                                            Ada soal ISIAN SINGKAT tapi tidak ada yang ditampilkan.
                                            <br>
                                        <?php endif; ?>
                                        <?php if ($total_isian_tampil <> $bank->tampil_isian) : ?>
                                            Jumlah soal yang ditampilkan tidak sama dengan jumlah seharusnya.
                                            <br>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <?php if ($total_isian > 0) : ?>
                                <?= form_open('', array('id' => 'select-isian')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="1">
                                <div class="d-sm-flex justify-content-between">
                                    <div>
                                        <input style="width: 24px; height: 24px" class="check-isian-all m-1"
                                               id="all-isian" type="checkbox">
                                        <label for="all-isian" class="align-middle">Pilih Semua</label>
                                    </div>
                                    <div>
                                        <span><b>Jumlah Soal terpilih: </b></span>
                                        <span id="total-isian" class="text-lg"></span>

                                        <button type="button" class="btn btn-sm btn-primary ml-3" id="save-isian">
                                            <i class="fa fa-save"></i> <span class="d-none d-sm-inline-block ml-1">Simpan Soal Terpilih</span>
                                        </button>
                                    </div>
                                </div>
                                <table id="table-isian" class="table-soal table table-striped mt-3">
                                    <?php
                                    foreach ($soals_isian as $s) :
                                        $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                        <tr>
                                            <td class="border-0" style="width: 30px">
                                                <input style="width: 24px; height: 24px" class="check-isian"
                                                       id="<?= $s->id_soal ?>" type="checkbox" name="soal[]"
                                                       value="<?= $s->id_soal ?>" <?= $checked ?>>
                                            </td>
                                            <td class="border-0" style="width: 30px">
                                                <div class="mt-2">
                                                    <?= $s->nomor_soal ?>.
                                                </div>
                                            </td>
                                            <td class="border-0 w-100">
                                                <div class="mt-2">
                                                    <?= $s->soal ?>
                                                </div>
                                                <div class="mb-2 mt-2">Jawaban: <b><?= strtoupper($s->jawaban) ?></b>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Isian Singkat
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane" id="essai">
                            <table class="table table-bordered">
                                <tr class="alert alert-default-dark text-center align-middle">
                                    <th class="border-dark">Jenis Soal</th>
                                    <th class="border-dark" colspan="2">Jumlah Soal</th>
                                    <th class="border-dark">Bobot Nilai</th>
                                    <th class="border-dark">Point Per-nomor</th>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td rowspan="3" class="text-center align-middle border-dark">Uraian/Essai</td>
                                    <td class="border-dark">Seharusnya</td>
                                    <td class="text-center border-dark"><?= $bank->tampil_esai ?></td>
                                    <td rowspan="3" class="text-center align-middle border-dark">
                                        <?= $bank->bobot_esai ?>
                                    </td>
                                    <td rowspan="3" class="text-center align-middle border-dark">
                                        <?= $bank->bobot_esai > 0 ? round(($bank->bobot_esai / max($total_essai_tampil, $bank->tampil_esai)), 2) : 0 ?>
                                    </td>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td class="border-dark">Telah dibuat</td>
                                    <td class="text-center border-dark"><?= $total_essai ?></td>
                                </tr>
                                <tr class="alert alert-default-success">
                                    <td class="border-dark">Ditampilkan</td>
                                    <td class="text-center border-dark"><?= $total_essai_tampil ?></td>
                                </tr>
                                <tr class="alert alert-default-danger">
                                    <td colspan="5" class="border-dark">
                                        Info :
                                        <br>
                                        <?php if ($total_essai < $bank->tampil_esai) : ?>
                                            Soal ESSAI masih kurang, klik tombol <b>(<i class="fas fa-plus"></i>
                                                Tambah/Edit Soal)</b>  untuk menambahkan.
                                            <br>
                                        <?php endif; ?>
                                        <?php if ($total_essai > 0 && $bank->tampil_esai == '0') : ?>
                                            Ada soal ESSAI tapi tidak ada yang ditampilkan.
                                            <br>
                                        <?php endif; ?>
                                        <?php if ($total_essai_tampil <> $bank->tampil_esai) : ?>
                                            Jumlah soal yang ditampilkan tidak sama dengan jumlah seharusnya.
                                            <br>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <?php if ($total_essai > 0) : ?>
                                <?= form_open('', array('id' => 'select-essai')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="5">
                                <div class="d-sm-flex justify-content-between">
                                    <div>
                                        <input style="width: 24px; height: 24px" class="check-essai-all" id="all-essai"
                                               type="checkbox">
                                        <label for="all-essai" class="align-middle">Pilih Semua Essai</label>
                                    </div>
                                    <div>
                                        <span><b>Jumlah Essai terpilih: </b></span>
                                        <span id="total-essai" class="text-lg"></span>

                                        <button type="button" class="btn btn-sm btn-primary ml-3" id="save-essai">
                                            <i class="fa fa-save"></i> <span class="d-none d-sm-inline-block ml-1">Simpan Essai Terpilih</span>
                                        </button>
                                    </div>
                                </div>
                                <table id="table-essai" class="table-soal table table-striped">
                                    <?php
                                    foreach ($soals_essai as $s) :
                                        $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                        <tr>
                                            <td class="border-0" style="width: 30px">
                                                <input style="width: 24px; height: 24px" class="check-essai"
                                                       id="<?= $s->id_soal ?>" type="checkbox" name="soal[]"
                                                       value="<?= $s->id_soal ?>" <?= $checked ?>>
                                            </td>
                                            <td class="border-0" style="width: 30px">
                                                <div class="mt-2">
                                                    <?= $s->nomor_soal ?>.
                                                </div>
                                            </td>
                                            <td class="border-0 w-100">
                                                <div class="mt-2">
                                                    <?= $s->soal ?>
                                                </div>
                                                <div class="mb-2 mt-2">Jawaban: <b><?= $s->jawaban ?></b></div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Uraian
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="for-export" class="d-none">
                <p><b>I. Soal Pilihan Ganda</b></p>
                <table class="table-soal"
                       style="width:100%; font-size: 11pt; border: 1px solid black; border-collapse: collapse; border-spacing: 0; page-break-after: always">
                    <thead>
                    <tr style="background-color: lightgrey">
                        <th style="width:60px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            NO
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">
                            SOAL
                        </th>
                        <th style="width:100px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold">
                            JENIS
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold">
                            OPSI
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold">
                            JAWABAN
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse;  text-align: center; font-weight: bold; padding: 12px">
                            KUNCI
                        </th>
                    </tr>
                    </thead>
                    <?php
                    $rows1 = count($soals_pg) > 50 ? count($soals_pg) : 50;
                    for ($i = 0; $i < $rows1; $i++) :
                        $s = isset($soals_pg[$i]) ? (array)$soals_pg[$i] : [
                            'nomor_soal' => $i + 1,
                            'soal' => '',
                            'opsi_a' => '',
                            'opsi_b' => '',
                            'opsi_c' => '',
                            'opsi_d' => '',
                            'opsi_e' => '',
                            'jawaban' => ''
                        ] ?>
                        <tr>
                            <td rowspan="5" style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= $s['nomor_soal'] ?>
                            </td>
                            <td rowspan="5" style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s['soal'] ?>
                            </td>
                            <td rowspan="5" style="border: 1px solid black;vertical-align: top;text-align: center;">
                                1
                            </td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">A</td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px"><?= $s['opsi_a'] ?></td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px"><?= strtolower($s['jawaban']) == 'a' ? 'v' : '' ?></td>
                        </tr>
                        <?php
                        $post_char = 98;
                        for ($a = 0; $a < 4; $a++) :
                            $abjad = chr($post_char);
                            ?>
                            <tr>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                    <?= strtoupper($abjad) ?>
                                </td>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                    <?= $s['opsi_' . $abjad] ?>
                                </td>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px"><?= strtolower($s['jawaban']) == $abjad ? 'v' : '' ?></td>
                            </tr>
                            <?php $post_char++; endfor; endfor; ?>
                </table>
                <p>&nbsp;</p>
                <p><b>II. Soal Pilihan Ganda Kompleks</b></p>
                <table class="table-soal"
                       style="width:100%; font-size: 11pt; border: 3px solid black; border-collapse: collapse; border-spacing: 0; page-break-after: always">
                    <thead>
                    <tr style="border-bottom: 3px solid black; background-color: lightgrey">
                        <th style="width:40px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            NO
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">
                            SOAL
                        </th>
                        <th style="width:60px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold; padding: 12px">
                            JENIS
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold; padding: 12px">
                            OPSI
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold; padding: 12px">
                            JAWABAN
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse;  text-align: center; font-weight: bold; padding: 12px">
                            KUNCI
                        </th>
                    </tr>
                    </thead>
                    <?php
                    $rows2 = count($soals_pg2) > 10 ? count($soals_pg2) : 10;
                    for ($sp = 0; $sp < $rows2; $sp++) :
                        $s = isset($soals_pg2[$sp]) ? $soals_pg2[$sp] : json_decode(json_encode([
                            'jawaban' => serialize([]),
                            'nomor_soal' => $sp + 1,
                            'soal' => '',
                            'opsi_a' => serialize(['a' => '', 'b' => '', 'c' => ''])
                        ]));
                        $opsis = unserialize($s->opsi_a);
                        $rows = $opsis ? count($opsis) : 3;
                        $jawabs = unserialize($s->jawaban);
                        $bg = $s->nomor_soal % 2 == 0 ? '#FFFFFF' : '#F2F2F2';
                        //if ($opsis) :
                        ?>
                        <tr style="border-top: 3px solid black;background-color: <?= $bg ?>">
                            <td rowspan="<?= $rows ?>"
                                style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= $s->nomor_soal ?>
                            </td>
                            <td rowspan="<?= $rows ?>"
                                style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s->soal ?>
                            </td>
                            <td rowspan="<?= $rows ?>"
                                style="border: 1px solid black;vertical-align: top;text-align: center;">
                                2
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center; width: 50px">
                                A
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;padding-left: 6px;">
                                <?= $opsis['a'] ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= in_array('a', $jawabs) ? 'v' : '' ?>
                            </td>
                        </tr>
                        <?php

                        $post_char = 98;
                        for ($i = 1; $i < count($opsis); $i++) :
                            $abjad = chr($post_char); ?>
                            <tr style="background-color: <?= $bg ?>">
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= strtoupper($abjad) ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;padding-left: 6px">
                                    <?= $opsis[$abjad] ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= in_array($abjad, $jawabs) ? 'v' : '' ?>
                                </td>
                            </tr>
                            <?php $post_char++; endfor;
                        //endif;
                    endfor; ?>
                </table>
                <p>&nbsp;</p>
                <p><b>III. Soal Menjodohkan</b></p>
                <table class="table-soal"
                       style="width:100%; font-size: 11pt; border: 3px solid black; border-collapse: collapse; border-spacing: 0; page-break-after: always">
                    <thead>
                    <tr style="border-bottom: 3px solid black; background-color: lightgrey">
                        <th rowspan="2"
                            style="width:40px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            NO
                        </th>
                        <th rowspan="2"
                            style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 300px">
                            SOAL
                        </th>
                        <th rowspan="2"
                            style="width:60px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            JENIS
                        </th>
                        <th colspan="2"
                            style="border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            BARIS
                        </th>
                        <th colspan="2"
                            style="width:100px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            KOLOM
                        </th>
                        <th colspan="2"
                            style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 200px">
                            KUNCI
                        </th>
                    </tr>
                    <tr style="background-color: lightgrey;font-weight: bold;">
                        <th style="border: 1px solid black;vertical-align: top;text-align: center;width:60px;">
                            KODE
                        </th>
                        <th style="border: 1px solid black;vertical-align: top;text-align: center;width:140px; ">
                            NAMA BARIS
                        </th>
                        <th style="border: 1px solid black;vertical-align: top;text-align: center;width:60px;">
                            KODE
                        </th>
                        <th style="border: 1px solid black;vertical-align: top;text-align: center;width:140px; ">
                            NAMA KOLOM
                        </th>
                        <th style="border: 1px solid black;vertical-align: top;text-align: center;width:60px;">
                            KODE BARIS
                        </th>
                        <th style="border: 1px solid black;vertical-align: top;text-align: center;width:140px; ">
                            KODE KOLOM
                        </th>
                    </tr>
                    </thead>
                    <?php
                    $count = 0;
                    $rows3 = count($soals_jodohkan) > 10 ? count($soals_jodohkan) : 10;
                    for ($sj = 0; $sj < $rows3; $sj++) :
                        $s = isset($soals_jodohkan[$sj]) ? $soals_jodohkan[$sj] : json_decode(json_encode(
                            ['jawaban' => '', 'nomor_soal' => $sj + 1, 'soal' => '']
                        ));
                        $count++;
                        $bg = $count % 2 == 0 ? '#FFFFFF' : '#F2F2F2';

                        $jawaban = isset($s->jawaban) ? unserialize($s->jawaban) : [];
                        if ($jawaban['jawaban'] != null) {
                            foreach ($jawaban['jawaban'] as $kk => $jwbn) {
                                $jawaban['jawaban'][$kk] = (array)$jwbn;
                            }
                        }

                        $jml_kolom = $jawaban && isset($jawaban['jawaban']) && $jawaban['jawaban'] != null ? count((array)$jawaban['jawaban'][0]) : 0;
                        $jml_baris = $jawaban ? count($jawaban['jawaban']) : 0;
                        $rows = $jml_kolom > 0 && $jml_baris > 0 ? max(($jml_kolom - 1), ($jml_baris - 1)) : 5;

                        $jwb_benar = [];
                        if ($jawaban['jawaban'] != null) {
                            foreach ($jawaban['jawaban'] as $kk => $jb) {
                                foreach ($jb as $ki => $item) {
                                    if ($item == '1') $jwb_benar[$kk][] = strtoupper(chr($ki + 96));
                                }
                            }
                        }
                        ?>
                        <tr style="border-top: 3px solid black;background-color: <?= $bg ?>">
                            <td rowspan="<?= $rows ?>"
                                style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= $s->nomor_soal ?>
                            </td>
                            <td rowspan="<?= $rows ?>"
                                style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s->soal; ?>
                            </td>
                            <td rowspan="<?= $rows ?>"
                                style="border: 1px solid black;vertical-align: top;text-align: center;">
                                3
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= isset($jawaban['jawaban'][1][0]) && isset($jawaban['jawaban'][1][0]) != "" ? '1' : '&nbsp;' ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= isset($jawaban['jawaban'][1][0]) ? $jawaban['jawaban'][1][0] : '' ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= isset($jawaban['jawaban'][0][1]) && $jawaban['jawaban'][0][1] != "" ? 'A' : '' ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= isset($jawaban['jawaban'][0][1]) ? $jawaban['jawaban'][0][1] : '' ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= isset($jawaban['jawaban'][1][0]) && isset($jawaban['jawaban'][1][0]) != "" ? '1' : '' ?>
                            </td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?php
                                echo
                                isset($jwb_benar[1]) ? implode(', ', $jwb_benar[1]) : '';
                                ?>

                            </td>
                        </tr>
                        <?php
                        $post_char = 98;
                        for ($i = 1; $i < $rows; $i++) :
                            $abjad = chr($post_char);
                            $index = $i + 1;
                            ?>
                            <tr style="background-color: <?= $bg ?>">
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= isset($jawaban['jawaban'][$index][0]) && $jawaban['jawaban'][$index][0] != "" ? $index : '&nbsp;' ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= isset($jawaban['jawaban'][$index][0]) ? $jawaban['jawaban'][$index][0] : '' ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= isset($jawaban['jawaban'][0][$index]) && $jawaban['jawaban'][0][$index] != "" ? strtoupper($abjad) : ''; ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= isset($jawaban['jawaban'][0][$index]) ? $jawaban['jawaban'][0][$index] : '' ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= isset($jawaban['jawaban'][$index][0]) && $jawaban['jawaban'][$index][0] != "" ? $index : '' ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;padding-left: 6px">
                                    <?php
                                    echo isset($jwb_benar[$index]) ? implode(', ', $jwb_benar[$index]) : '';
                                    ?>
                                </td>
                            </tr>
                            <?php $post_char++; endfor; endfor; ?>
                </table>
                <p>&nbsp;</p>
                <p><b>IV. Soal Isian Singkat</b></p>
                <table class="table-soal"
                       style="width:100%; font-size: 11pt; border: 1px solid black; border-collapse: collapse; border-spacing: 0; page-break-after: always">
                    <thead>
                    <tr style="background-color: lightgrey">
                        <th style="width:40px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            NO
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 300px">
                            SOAL
                        </th>
                        <th style="width:60px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            JENIS
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 200px">
                            JAWABAN BENAR
                        </th>
                    </tr>
                    </thead>
                    <?php
                    $count = 0;
                    $rows4 = count($soals_jodohkan) > 10 ? count($soals_jodohkan) : 10;
                    for ($si = 0; $si < $rows4; $si++) :
                        $s = isset($soals_isian[$si]) ? $soals_isian[$si] : json_decode(json_encode(
                            ['jawaban' => '', 'nomor_soal' => $si + 1, 'soal' => '']
                        ));
                        $count++;
                        ?>
                        <tr>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= $s->nomor_soal ?>
                            </td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s->soal ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                4
                            </td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s->jawaban ?>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <p>&nbsp;</p>
                <p><b>V. Soal Essai</b></p>
                <table class="table-soal"
                       style="width:100%; font-size: 11pt; border: 1px solid black; border-collapse: collapse; border-spacing: 0;">
                    <thead>
                    <tr style="background-color: lightgrey">
                        <th style="width:40px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            NO
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 300px">
                            SOAL
                        </th>
                        <th style="width:60px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            JENIS
                        </th>
                        <th style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 200px">
                            JAWABAN BENAR
                        </th>
                    </tr>
                    </thead>
                    <?php
                    $count = 0;
                    $rows5 = count($soals_essai) > 10 ? count($soals_essai) : 10;
                    for ($se = 0; $se < $rows4; $se++) :
                        $s = isset($soals_essai[$se]) ? $soals_essai[$se] : json_decode(json_encode(
                            ['jawaban' => '', 'nomor_soal' => $se + 1, 'soal' => '']
                        ));
                        //foreach ($soals_essai as $s) :
                        $count++;
                        ?>
                        <tr>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= $s->nomor_soal ?>
                            </td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s->soal ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                5
                            </td>
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                <?= $s->jawaban ?>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
        </div>
    </section>
</div>

<!--
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/jquery.wordexport.js"></script>
-->
<script src="<?= base_url() ?>/assets/plugins/fields-linker/fieldsLinker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/html-docx.js"></script>
<script src="<?= base_url() ?>/assets/app/js/convert-area.js"></script>
<script>
    var jmlPgTampil = '<?=$bank->tampil_pg?>';
    var jmlPg2Tampil = '<?=$bank->tampil_kompleks?>';
    var jmlJodohkanTampil = '<?=$bank->tampil_jodohkan?>';
    var jmlIsianTampil = '<?=$bank->tampil_isian?>';
    var jmlEssaiTampil = '<?=$bank->tampil_esai?>';

    $(document).ready(function () {

        //const totalSeharusnyaTampil = <?=$total_soal_seharusnya_tampil?>

        var $tableSoal = $('.table-soal');
        $.each($tableSoal, function () {
            var $imgs = $(this).find('tr img');
            $.each($imgs, function () {
                var curSrc = $(this).attr('src');
                if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                    $(this).attr('src', base_url + curSrc);
                } else if (curSrc.indexOf(base_url) === -1) {
                    var pathUpload = 'uploads';
                    var forReplace = curSrc.split(pathUpload);
                    $(this).attr('src', base_url + pathUpload + forReplace[1]);
                }
            })
        });

        //var $div_lists = $('.list-jodohkan');
        //$.each($div_lists, function () {
        var lists = JSON.parse(JSON.stringify($('.list-jodohkan').data('list')));
        var datas = convertTableToList(lists);
        console.log('list', datas);
        var inputs = {
            "localization": {},
            "options": {
                "associationMode": "manyToMany", // oneToOne,manyToMany
                "lineStyle": "square-ends",
                "buttonErase": false,//"Batalkan",
                "displayMode": "original",
                "whiteSpace": 'normal', //normal,nowrap,pre,pre-wrap,pre-line,break-spaces default => nowrap
                "mobileClickIt": true
            },
            "Lists": [
                {
                    "name": "kiri",
                    "list": datas.jawaban[0]
                },
                {
                    "name": "kanan",
                    "list": datas.jawaban[1],
                    //"mandatories": ["last_name", "email_adress"]
                }
            ],
            "existingLinks": datas.linked
        };
        var fields = $('#soal5970').fieldsLinker("init", inputs);

        //});

        var pgCount = $('#table-pg .check-pg').length;
        var pg2Count = $('#table-pg2 .check-pg2').length;
        var jodohkanCount = $('#table-jodohkan .check-jodohkan').length;
        var isianCount = $('#table-isian .check-isian').length;
        var essaiCount = $('#table-essai .check-essai').length;

        console.log('count', jodohkanCount);

        var pgUnchecked = [];
        var pg2Unchecked = [];
        var jodohkanUnchecked = [];
        var isianUnchecked = [];
        var essaiUnchecked = [];

        function findUnchecked() {
            pgUnchecked = [];
            pg2Unchecked = [];
            jodohkanUnchecked = [];
            isianUnchecked = [];
            essaiUnchecked = [];

            $("#table-pg tbody tr .check-pg:not(:checked)").each(function () {
                pgUnchecked.push($(this).val());
            });

            $("#table-pg2 tbody tr .check-pg2:not(:checked)").each(function () {
                pg2Unchecked.push($(this).val());
            });

            $("#table-jodohkan tbody tr .check-jodohkan:not(:checked)").each(function () {
                jodohkanUnchecked.push($(this).val());
            });

            $("#table-isian tbody tr .check-isian:not(:checked)").each(function () {
                isianUnchecked.push($(this).val());
            });

            $("#table-essai tbody tr .check-essai:not(:checked)").each(function () {
                essaiUnchecked.push($(this).val());
            });

            var pgchecked = $("#table-pg tbody tr .check-pg:checked").length;
            $('#total-pg').html(`<b>${pgchecked}</b>`);
            $("#all-pg").prop("checked", pgchecked == pgCount);

            var pg2checked = $("#table-pg2 tbody tr .check-pg2:checked").length;
            $('#total-pg2').html(`<b>${pg2checked}</b>`);
            $("#all-pg2").prop("checked", pg2checked == pg2Count);

            var jodohkanchecked = $("#table-jodohkan tbody tr .check-jodohkan:checked").length;
            $('#total-jodohkan').html(`<b>${jodohkanchecked}</b>`);
            $("#all-jodohkan").prop("checked", jodohkanchecked == jodohkanCount);

            var isianchecked = $("#table-isian tbody tr .check-isian:checked").length;
            $('#total-isian').html(`<b>${isianchecked}</b>`);
            $("#all-isian").prop("checked", isianchecked == isianCount);

            var essaiChecked = $("#table-essai tbody tr .check-essai:checked").length;
            $('#total-essai').html(`<b>${essaiChecked}</b>`);
            $("#all-essai").prop("checked", essaiChecked == essaiCount);
        }

        findUnchecked();

        $("#table-pg tbody").on("change", "tr .check-pg", function () {
            findUnchecked();
        });

        $("#table-pg2 tbody").on("change", "tr .check-pg2", function () {
            findUnchecked();
        });

        $("#table-jodohkan tbody").on("change", "tr .check-jodohkan", function () {
            findUnchecked();
        });

        $("#table-isian tbody").on("change", "tr .check-isian", function () {
            findUnchecked();
        });

        $("#table-essai tbody").on("change", "tr .check-essai", function () {
            findUnchecked();
        });

        $("#all-pg").on("click", function () {
            if (this.checked) {
                $(".check-pg").each(function () {
                    this.checked = true;
                    $("#all-pg").prop("checked", true);
                });
            } else {
                $(".check-pg").each(function () {
                    this.checked = false;
                    $("#all-pg").prop("checked", false);
                });
            }
            findUnchecked();
        });

        $("#all-pg2").on("click", function () {
            if (this.checked) {
                $(".check-pg2").each(function () {
                    this.checked = true;
                    $("#all-pg2").prop("checked", true);
                });
            } else {
                $(".check-pg2").each(function () {
                    this.checked = false;
                    $("#all-pg2").prop("checked", false);
                });
            }
            findUnchecked();
        });

        $("#all-jodohkan").on("click", function () {
            if (this.checked) {
                $(".check-jodohkan").each(function () {
                    this.checked = true;
                    $("#all-jodohkan").prop("checked", true);
                });
            } else {
                $(".check-jodohkan").each(function () {
                    this.checked = false;
                    $("#all-jodohkan").prop("checked", false);
                });
            }
            findUnchecked();
        });

        $("#all-isian").on("click", function () {
            if (this.checked) {
                $(".check-isian").each(function () {
                    this.checked = true;
                    $("#all-isian").prop("checked", true);
                });
            } else {
                $(".check-isian").each(function () {
                    this.checked = false;
                    $("#all-isian").prop("checked", false);
                });
            }
            findUnchecked();
        });

        $("#all-essai").on("click", function () {
            if (this.checked) {
                $(".check-essai").each(function () {
                    this.checked = true;
                    $("#all-essai").prop("checked", true);
                });
            } else {
                $(".check-essai").each(function () {
                    this.checked = false;
                    $("#all-essai").prop("checked", false);
                });
            }
            findUnchecked();
        });

        $('#save-pg').on('click', function (e) {
            var dataPost = $('#select-pg').serialize() + "&uncheck=" + JSON.stringify(pgUnchecked);
            console.log(dataPost);

            var checked = $("#table-pg tbody tr .check-pg:checked").length;
            if (checked !== parseInt(jmlPgTampil)) {
                swal.fire({
                    title: "Info",
                    html: `Soal Pilihan Ganda terpilih: ${checked} <br>Seharusnya: ${jmlPgTampil}`,
                    icon: "error"
                });
            } else {
                saveSoalSelected(dataPost);
            }
        });

        $('#save-pg2').on('click', function (e) {
            var dataPost = $('#select-pg2').serialize() + "&uncheck=" + JSON.stringify(pg2Unchecked);
            console.log(dataPost);

            var checked = $("#table-pg2 tbody tr .check-pg2:checked").length;
            if (checked !== parseInt(jmlPg2Tampil)) {
                swal.fire({
                    title: "Info",
                    html: `Soal Ganda Kompleks terpilih: ${checked} <br>Seharusnya: ${jmlPg2Tampil}`,
                    icon: "error"
                });
            } else {
                saveSoalSelected(dataPost);
            }
        });

        $('#save-jodohkan').on('click', function (e) {
            var dataPost = $('#select-jodohkan').serialize() + "&uncheck=" + JSON.stringify(jodohkanUnchecked);
            console.log(dataPost);

            var checked = $("#table-jodohkan tbody tr .check-jodohkan:checked").length;
            if (checked !== parseInt(jmlJodohkanTampil)) {
                swal.fire({
                    title: "Info",
                    html: `Soal Menjodohkan terpilih: ${checked} <br>Seharusnya: ${jmlJodohkanTampil}`,
                    icon: "error"
                });
            } else {
                saveSoalSelected(dataPost);
            }
        });

        $('#save-isian').on('click', function (e) {
            var dataPost = $('#select-isian').serialize() + "&uncheck=" + JSON.stringify(isianUnchecked);
            console.log(dataPost);

            var checked = $("#table-isian tbody tr .check-isian:checked").length;
            if (checked !== parseInt(jmlIsianTampil)) {
                swal.fire({
                    title: "Info",
                    html: `Soal Isian terpilih: ${checked} <br>Seharusnya: ${jmlIsianTampil}`,
                    icon: "error"
                });
            } else {
                saveSoalSelected(dataPost);
            }
        });

        $('#save-essai').on('click', function (e) {
            var dataPost = $('#select-essai').serialize() + "&uncheck=" + JSON.stringify(essaiUnchecked);
            console.log(dataPost);

            var checked = $("#table-essai tbody tr .check-essai:checked").length;
            if (checked !== parseInt(jmlEssaiTampil)) {
                swal.fire({
                    title: "Info",
                    html: `Soal Uraian terpilih: ${checked} <br>Seharusnya: ${jmlEssaiTampil}`,
                    icon: "error"
                });
            } else {
                saveSoalSelected(dataPost);
            }
        });

        function saveSoalSelected(dataPost) {
            swal.fire({
                title: "Menyimpan Soal Terpilih",
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
                url: base_url + "cbtbanksoal/saveSelected",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log(data);
                    if (data.check > 0) {
                        //showSuccessToast(`${data.check} Soal terpilih berhasil disimpan`)
                        window.location.reload(true);
                    } else {
                        showDangerToast('Soal terpilih gagal disimpan')
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    showDangerToast('Error');
                }
            });
        }

        $("#convert").click(function (e) {
            e.preventDefault();

            var contentDocument = $('#for-export').convertToHtmlFile('detail', '');
            //console.log(contentDocument);
            //convertImagesToBase64();

            var content = '<!DOCTYPE html>' + contentDocument.documentElement.outerHTML;
            var converted = htmlDocx.asBlob(content, {
                orientation: 'landscape',
                size: 'A4',
                margins: {top: 700, bottom: 700, left: 1000, right: 1000}
            });
            saveAs(converted, 'Soal <?= $bank->bank_kode ?> <?= $bank->nama_mapel ?> Kls <?= $bank->bank_level ?>.docx');

            var link = document.createElement('a');
            link.href = URL.createObjectURL(converted);
            link.download = 'Soal <?= $bank->nama_mapel ?> Kls <?= $bank->bank_level ?>.docx';
            link.appendChild(
                document.createTextNode('Click here if your download has not started automatically'));
            var downloadArea = document.getElementById('download-area');
            downloadArea.innerHTML = '';
            downloadArea.appendChild(link);

            $('#alert-download').removeClass('d-none');

            $("#alert-download").fadeTo(10000, 500).slideUp(500, function () {
                $("#alert-download").slideUp(500);
            });

        });

        function convertImagesToBase64() {
            var regularImages = contentDocument.querySelectorAll("img");
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            [].forEach.call(regularImages, function (imgElement) {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                canvas.width = imgElement.width;
                canvas.height = imgElement.height;

                ctx.drawImage(imgElement, 0, 0);
                var dataURL = canvas.toDataURL();
                imgElement.setAttribute('src', dataURL);
            });
            canvas.remove();
        }
    })

    function convertTableToList(array) {
        var kanan = array.shift();
        var kiri = [];
        $.each(array, function (i, v) {
            kiri.push(v.shift());
        });
        kanan.shift();

        var linked = [];
        $.each(array, function (n, arv) {
            $.each(arv, function (t, v) {
                if (v != '0') {
                    var it = {};
                    it['from'] = kiri[n];
                    it['to'] = kanan[t];
                    linked.push(it);
                }
            });
        });
        var item = {};
        item['jawaban'] = [kiri, kanan];
        item['linked'] = linked;
        return item;
    }

</script>
