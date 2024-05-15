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
                    $jumlahKelas = json_decode(json_encode(unserialize($jk ?? '')));

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
                        <div class="col-lg-6 col-md-8">
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
                        <div class="col-lg-3 col-md-4">
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
                                <li class="list-group-item p-1"> Ket.
                                    <span class="float-right"><b><?= $status_soal ?></b></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 mt-2">
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
                        <div class="col-12 mt-1">
                            <div class="alert alert-default-info">
                                Jika keteragan pembuatan soal sudah <b>SELESAI</b> tapi tidak muncul di akun siswa, klik
                                tombol
                                <span class="badge badge-btn badge-primary">
                                <i class="fa fa-save"></i> <span class="d-none d-md-inline-block ml-1">Simpan Soal Terpilih</span>
                            </span>
                                di bawah
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
                        <?php
                        $disable_delete = $bank->digunakan > 0 || $total_siswa > 0;
                        $dis = $disable_delete ? 'disabled' : '';
                        ?>
                        <div class="tab-pane table-responsive active" id="ganda">
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
                                        <ul>
                                            <?php if ($total_pg < $bank->tampil_pg) : ?>
                                                <li>
                                                    Soal PILIHAN GANDA masih kurang, klik tombol
                                                    <b>(<i class="fas fa-plus"></i>
                                                        Tambah/Edit Soal)</b> untuk menambahkan.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_pg > 0 && $bank->tampil_pg == '0') : ?>
                                                <li>
                                                    Ada soal PILIHAN GANDA tapi tidak ada yang ditampilkan.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_pg_tampil <> $bank->tampil_pg) : ?>
                                                <li>
                                                    Jumlah soal yang ditampilkan tidak sama dengan jumlah seharusnya.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($bank->digunakan > 0) : ?>
                                                <li>
                                                    Soal sudah dijadwalkan, tidak bisa menghapus dan memilih ulang butir soal.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_siswa > 0) : ?>
                                                <li>
                                                    Soal sedang digunakan oleh siswa, tidak bisa menghapus dan memilih ulang butir soal.
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <?php if ($total_pg > 0) : ?>
                                <?= form_open('', array('id' => 'select-pg')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="1">
                                <div class="d-sm-flex justify-content-between mb-3">
                                    <div>
                                        <input style="width: 24px; height: 24px" class="check-pg-all m-1" id="all-pg"
                                               type="checkbox" <?=$dis?>>
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

                                <div class="rTable" id="table-pg">
                                    <div class="rTableBody">
                                        <?php
                                        foreach ($soals_pg as $s) :
                                            $checked = $s->tampilkan == 1 ? 'checked' : ''; ?>
                                            <div class="rTableRow">
                                                <div class="rTableCell align-top text-left" style="width: 40px;">
                                                    <input style="width: 24px; height: 24px" class="check-pg mt-2"
                                                           id="<?= $s->id_soal ?>" type="checkbox" name="soal[]"
                                                           value="<?= $s->id_soal ?>" <?= $checked ?> <?=$dis?>>
                                                </div>
                                                <div class="rTableCell align-top text-center" style="width: 40px;">
                                                    <p class="mt-2">
                                                        <?= $s->nomor_soal ?>.
                                                    </p>
                                                </div>
                                                <div class="rTableCell align-top">
                                                    <div class="mt-2">
                                                        <?= $s->soal ?>
                                                    </div>
                                                    <br>
                                                    <ul class="list-group list-group-unbordered pl-3"
                                                        style="list-style-type: upper-alpha">
                                                        <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_a ?? '') ?></li>
                                                        <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_b ?? '') ?></li>
                                                        <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_c ?? '') ?></li>
                                                        <?php if ($bank->opsi == '4') : ?>
                                                        <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_d ?? '') ?></li>
                                                        <?php endif; ?>
                                                        <?php if ($bank->opsi == '5') : ?>
                                                            <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_d ?? '') ?></li>
                                                            <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_e ?? '') ?></li>
                                                        <?php endif; ?>
                                                    </ul>
                                                    <div class="mb-2 mt-2">Jawaban:
                                                        <b><?= strtoupper($s->jawaban ?? '') ?></b>
                                                    </div>
                                                </div>
                                                <div class="rTableCell text-right pt-2" style="width: 60px">
                                                    <a href="<?= base_url('cbtbanksoal/buatsoal/' . $bank->id_bank . '?no=' . $s->nomor_soal . '&jns=1') ?>"
                                                       type="button" class="btn btn-sm btn-default mb-2">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-default"
                                                            type="button"
                                                            data-idsoal="<?= $s->id_soal ?>"
                                                            data-nomor="<?= $s->nomor_soal ?>"
                                                            data-jenis="1"
                                                            onclick="hapusSoal(this)" <?= $dis ?>>
                                                        <i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Pilihan Ganda
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane table-responsive" id="kompleks">
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
                                        <ul>
                                            <?php if ($total_pg2 < $bank->tampil_kompleks) : ?>
                                                <li>
                                                    Soal PILIHAN GANDA KOMPLEKS masih kurang, klik tombol <b>(<i
                                                                class="fas fa-plus"></i> Tambah/Edit
                                                        Soal)</b> untuk menambahkan.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_pg2 > 0 && $bank->tampil_kompleks == '0') : ?>
                                                <li>
                                                    Ada soal PILIHAN GANDA KOMPLEKS tapi tidak ada yang ditampilkan.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_pg2_tampil <> $bank->tampil_kompleks) : ?>
                                                <li>
                                                    Jumlah soal yang ditampilkan tidak sama dengan jumlah seharusnya.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($bank->digunakan > 0) : ?>
                                                <li>
                                                    Soal sudah dijadwalkan, tidak bisa menghapus dan memilih ulang butir soal.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_siswa > 0) : ?>
                                                <li>
                                                    Soal sedang digunakan oleh siswa, tidak bisa menghapus dan memilih ulang butir soal.
                                                </li>
                                            <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <?php if ($total_pg2 > 0) : ?>
                                <?= form_open('', array('id' => 'select-pg2')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="2">
                                <div class="d-sm-flex justify-content-between mb-3">
                                    <div>
                                        <input style="width: 24px; height: 24px" class="check-pg2-all m-1" id="all-pg2"
                                               type="checkbox" <?=$dis?>>
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

                                <div class="rTable" id="table-pg2">
                                    <div class="rTableBody">
                                        <?php
                                        foreach ($soals_pg2 as $s) :
                                            $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                            <div class="rTableRow">
                                                <div class="rTableCell align-top text-left" style="width: 40px;">
                                                    <input style="width: 24px; height: 24px" class="check-pg2 mt-2"
                                                           id="<?= $s->id_soal ?>" type="checkbox" name="soal[]"
                                                           value="<?= $s->id_soal ?>" <?= $checked ?> <?=$dis?>>
                                                </div>
                                                <div class="rTableCell align-top text-center" style="width: 40px;">
                                                    <p class="mt-2">
                                                        <?= $s->nomor_soal ?>.
                                                    </p>
                                                </div>
                                                <div class="rTableCell align-top">
                                                    <div class="mt-2">
                                                        <?= $s->soal ?>
                                                        <br>
                                                    </div>
                                                    <br>
                                                    <?php
                                                    $opsis = unserialize($s->opsi_a ?? '');
                                                    $jawabs = unserialize($s->jawaban ?? '');
                                                    $jwb_pg2 = '';
                                                    if ($jawabs) {
                                                        $jwb_pg2 = implode(', ', array_filter($jawabs));
                                                    }
                                                    if ($opsis) : ?>
                                                        <ul class="list-group list-group-unbordered pl-3"
                                                            style="list-style-type: upper-alpha">
                                                            <?php for ($i = 97; $i < (97 + count($opsis)); $i++) :
                                                                $abjad = chr($i); ?>
                                                                <li><?=isset($opsis[$abjad]) ? str_replace(['<p>', '</p>'], '', $opsis[$abjad]) : 'null' ?></li>
                                                            <?php endfor; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                    <div class="mb-2 mt-2">Jawaban: <b><?= strtoupper($jwb_pg2 ?? '') ?></b>
                                                    </div>
                                                </div>
                                                <div class="rTableCell text-right pt-2" style="width: 60px">
                                                    <a href="<?= base_url('cbtbanksoal/buatsoal/' . $bank->id_bank . '?no=' . $s->nomor_soal . '&jns=2') ?>"
                                                       type="button" class="btn btn-sm btn-default mb-2">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-default"
                                                            type="button"
                                                            data-idsoal="<?= $s->id_soal ?>"
                                                            data-nomor="<?= $s->nomor_soal ?>"
                                                            data-jenis="2"
                                                            onclick="hapusSoal(this)" <?= $dis ?>>
                                                        <i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Pilihan Ganda Kompleks
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane table-responsive" id="jodoh">
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
                                        <ul>
                                            <?php if ($total_jodohkan < $bank->tampil_jodohkan) : ?>
                                                <li>
                                                    Soal MENJODOHKAN masih kurang, klik tombol
                                                    <b>(<i class="fas fa-plus"></i>
                                                        Tambah/Edit Soal)</b> untuk menambahkan.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_jodohkan > 0 && $bank->tampil_jodohkan == '0') : ?>
                                                <li>
                                                    Ada soal MENJODOHKAN tapi tidakada yang ditampilkan.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_jodohkan_tampil <> $bank->tampil_jodohkan) : ?>
                                                <li>
                                                    Jumlah soal yang ditampilkan tidak sama dengan jumlah seharusnya.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($bank->digunakan > 0) : ?>
                                                <li>
                                                    Soal sudah dijadwalkan, tidak bisa menghapus dan memilih ulang butir soal.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_siswa > 0) : ?>
                                                <li>
                                                    Soal sedang digunakan oleh siswa, tidak bisa menghapus dan memilih ulang butir soal.
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <?php if ($total_jodohkan > 0) : ?>
                                <?= form_open('', array('id' => 'select-jodohkan')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="3">
                                <div class="d-sm-flex justify-content-between mb-3">
                                    <div>
                                        <input style="width: 24px; height: 24px" class="check-jodohkan-all m-1"
                                               id="all-jodohkan" type="checkbox" <?=$dis?>>
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

                                <div class="rTable" id="table-jodohkan">
                                    <div class="rTableBody">
                                        <?php
                                        foreach ($soals_jodohkan as $s) :
                                            $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                            <div class="rTableRow">
                                                <div class="rTableCell align-top text-left" style="width: 40px;">
                                                    <input style="width: 24px; height: 24px" class="check-jodohkan mt-2"
                                                           id="<?= $s->id_soal ?>" type="checkbox" name="soal[]"
                                                           value="<?= $s->id_soal ?>" <?= $checked ?> <?=$dis?>>
                                                </div>
                                                <div class="rTableCell align-top text-center" style="width: 40px;">
                                                    <p class="mt-2">
                                                        <?= $s->nomor_soal ?>.
                                                    </p>
                                                </div>
                                                <div class="rTableCell align-top">
                                                    <div class="mt-2">
                                                        <?= $s->soal ?>
                                                        <br>
                                                    </div>
                                                    <br>
                                                    <?php $jawaban = unserialize($s->jawaban ?? '');
                                                    if (!isset($jawaban['jawaban'])) $jawaban['jawaban'] = [];
                                                    ?>
                                                    <div class="mb-2 mt-2"><b>Jawaban:</b></div>
                                                    <div class='list-jodohkan' data-nomor="<?= $s->nomor_soal ?>"
                                                         data-list='<?= json_encode($jawaban) ?>'>
                                                    </div>
                                                </div>
                                                <div class="rTableCell text-right pt-2" style="width: 60px">
                                                    <a href="<?= base_url('cbtbanksoal/buatsoal/' . $bank->id_bank . '?no=' . $s->nomor_soal . '&jns=3') ?>"
                                                       type="button" class="btn btn-sm btn-default mb-2">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-default"
                                                            type="button"
                                                            data-idsoal="<?= $s->id_soal ?>"
                                                            data-nomor="<?= $s->nomor_soal ?>"
                                                            data-jenis="3"
                                                            onclick="hapusSoal(this)" <?= $dis ?>>
                                                        <i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Menjodohkan
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane table-responsive" id="isian">
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
                                        <ul>
                                            <?php if ($total_isian < $bank->tampil_isian) : ?>
                                                <li>
                                                    Soal ISIAN SINGKAT masih kurang, klik tombol
                                                    <b>(<i class="fas fa-plus"></i>
                                                        Tambah/Edit Soal)</b> untuk menambahkan.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_isian > 0 && $bank->tampil_isian == '0') : ?>
                                                <li>
                                                    Ada soal ISIAN SINGKAT tapi tidak ada yang ditampilkan.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_isian_tampil <> $bank->tampil_isian) : ?>
                                                <li>
                                                    Jumlah soal yang ditampilkan tidak sama dengan jumlah seharusnya.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($bank->digunakan > 0) : ?>
                                                <li>
                                                    Soal sudah dijadwalkan, tidak bisa menghapus dan memilih ulang butir soal.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_siswa > 0) : ?>
                                                <li>
                                                    Soal sedang digunakan oleh siswa, tidak bisa menghapus dan memilih ulang butir soal.
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <?php if ($total_isian > 0) : ?>
                                <?= form_open('', array('id' => 'select-isian')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="1">
                                <div class="d-sm-flex justify-content-between mb-3">
                                    <div>
                                        <input style="width: 24px; height: 24px" class="check-isian-all m-1"
                                               id="all-isian" type="checkbox" <?=$dis?>>
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

                                <div class="rTable" id="table-isian">
                                    <div class="rTableBody">
                                        <?php
                                        foreach ($soals_isian as $s) :
                                            $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                            <div class="rTableRow">
                                                <div class="rTableCell align-top text-left" style="width: 40px;">
                                                    <input style="width: 24px; height: 24px" class="check-isian mt-2"
                                                           id="<?= $s->id_soal ?>" type="checkbox" name="soal[]"
                                                           value="<?= $s->id_soal ?>" <?= $checked ?> <?=$dis?>>
                                                </div>
                                                <div class="rTableCell align-top text-center" style="width: 40px;">
                                                    <p class="mt-2">
                                                        <?= $s->nomor_soal ?>.
                                                    </p>
                                                </div>
                                                <div class="rTableCell align-top">
                                                    <div class="mt-2">
                                                        <?= $s->soal ?>
                                                        <br>
                                                    </div>
                                                    <br>
                                                    <div class="mb-2 mt-2">Jawaban: <b><?= $s->jawaban ?></b>
                                                    </div>
                                                </div>
                                                <div class="rTableCell text-right pt-2" style="width: 60px">
                                                    <a href="<?= base_url('cbtbanksoal/buatsoal/' . $bank->id_bank . '?no=' . $s->nomor_soal . '&jns=4') ?>"
                                                       type="button" class="btn btn-sm btn-default mb-2">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-default"
                                                            type="button"
                                                            data-idsoal="<?= $s->id_soal ?>"
                                                            data-nomor="<?= $s->nomor_soal ?>"
                                                            data-jenis="4"
                                                            onclick="hapusSoal(this)" <?= $dis ?>>
                                                        <i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?= form_close() ?>
                            <?php else: ?>
                                <div class="alert alert-default-info shadow align-content-center" role="alert">
                                    Tidak ada soal Isian Singkat
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane table-responsive" id="essai">
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
                                        <ul>
                                            <?php if ($total_essai < $bank->tampil_esai) : ?>
                                                <li>
                                                    Soal ESSAI masih kurang, klik tombol <b>(<i class="fas fa-plus"></i>
                                                        Tambah/Edit Soal)</b> untuk menambahkan.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_essai > 0 && $bank->tampil_esai == '0') : ?>
                                                <li>
                                                    Ada soal ESSAI tapi tidak ada yang ditampilkan.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_essai_tampil <> $bank->tampil_esai) : ?>
                                                <li>
                                                    Jumlah soal yang ditampilkan tidak sama dengan jumlah seharusnya.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($bank->digunakan > 0) : ?>
                                                <li>
                                                    Soal sudah dijadwalkan, tidak bisa menghapus dan memilih ulang butir soal.
                                                </li>
                                            <?php endif; ?>
                                            <?php if ($total_siswa > 0) : ?>
                                                <li>
                                                    Soal sedang digunakan oleh siswa, tidak bisa menghapus dan memilih ulang butir soal.
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <?php if ($total_essai > 0) : ?>
                                <?= form_open('', array('id' => 'select-essai')) ?>
                                <input type="hidden" name="id_bank" value="<?= $bank->id_bank ?>">
                                <input type="hidden" name="jenis" value="5">
                                <div class="d-sm-flex justify-content-between mb-3">
                                    <div>
                                        <input style="width: 24px; height: 24px" class="check-essai-all m-1"
                                               id="all-essai"
                                               type="checkbox" <?=$dis?>>
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

                                <div class="rTable" id="table-essai">
                                    <div class="rTableBody">
                                        <?php
                                        foreach ($soals_essai as $s) :
                                            $checked = $s->tampilkan == 1 ? 'checked' : '' ?>
                                            <div class="rTableRow">
                                                <div class="rTableCell align-top text-left" style="width: 40px;">
                                                    <input style="width: 24px; height: 24px" class="check-essai mt-2"
                                                           id="<?= $s->id_soal ?>" type="checkbox" name="soal[]"
                                                           value="<?= $s->id_soal ?>" <?= $checked ?> <?=$dis?>>
                                                </div>
                                                <div class="rTableCell align-top text-center" style="width: 40px;">
                                                    <p class="mt-2">
                                                        <?= $s->nomor_soal ?>.
                                                    </p>
                                                </div>
                                                <div class="rTableCell align-top">
                                                    <div class="mt-2">
                                                        <?= $s->soal ?>
                                                        <br>
                                                    </div>
                                                    <br>
                                                    <div class="mb-2 mt-2">Jawaban: <b><?= $s->jawaban ?></b>
                                                    </div>
                                                </div>
                                                <div class="rTableCell text-right pt-2" style="width: 60px">
                                                    <a href="<?= base_url('cbtbanksoal/buatsoal/' . $bank->id_bank . '?no=' . $s->nomor_soal . '&jns=5') ?>"
                                                       type="button" class="btn btn-sm btn-default mb-2">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-default"
                                                            type="button"
                                                            data-idsoal="<?= $s->id_soal ?>"
                                                            data-nomor="<?= $s->nomor_soal ?>"
                                                            data-jenis="5"
                                                            onclick="hapusSoal(this)" <?= $dis ?>>
                                                        <i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

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
            <div id="temp-list"></div>
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
                            <td style="border: 1px solid black; vertical-align: top; padding-left: 6px"><?= strtolower($s['jawaban'] ?? '') == 'a' ? 'v' : '' ?></td>
                        </tr>
                        <?php
                        $post_char = 98;
                        for ($a = 0; $a < 4; $a++) :
                            $abjad = chr($post_char);
                            ?>
                            <tr>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                    <?= strtoupper($abjad ?? '') ?>
                                </td>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                    <?= $s['opsi_' . $abjad] ?>
                                </td>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px"><?= strtolower($s['jawaban'] ?? '') == $abjad ? 'v' : '' ?></td>
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
                        $opsis = unserialize($s->opsi_a ?? '');
                        $opsis = $opsis ? $opsis : ['a'=>'','b'=>'','c'=>''];
                        $rows = $opsis ? count($opsis) : 3;
                        $jawabs = $opsis ? unserialize($s->jawaban ?? '') : [];
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
                                <?= $opsis ? $opsis['a'] : '' ?>
                            </td>
                            <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                <?= $jawabs && in_array('a', $jawabs) ? 'v' : '' ?>
                            </td>
                        </tr>
                        <?php

                        $post_char = 98;
                        for ($i = 1; $i < count($opsis); $i++) :
                            $abjad = chr($post_char); ?>
                            <tr style="background-color: <?= $bg ?>">
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= strtoupper($abjad ?? '') ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;padding-left: 6px">
                                    <?= $opsis[$abjad] ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= $jawabs && in_array($abjad, $jawabs) ? 'v' : '' ?>
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

                        $jawaban = isset($s->jawaban) ? unserialize($s->jawaban ?? '') : [];
                        if (isset($jawaban['jawaban']) && $jawaban['jawaban'] != null) {
                            foreach ($jawaban['jawaban'] as $kk => $jwbn) {
                                $jawaban['jawaban'][$kk] = (array)$jwbn;
                            }
                        }

                        $jml_kolom = $jawaban && isset($jawaban['jawaban']) && $jawaban['jawaban'] != null ? count((array)$jawaban['jawaban'][0]) : 0;
                        $jml_baris = $jawaban ? count($jawaban['jawaban']) : 0;
                        $rows = $jml_kolom > 0 && $jml_baris > 0 ? max(($jml_kolom - 1), ($jml_baris - 1)) : 5;

                        $jwb_benar = [];
                        if (isset($jawaban['jawaban']) && $jawaban['jawaban'] != null) {
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
                                    <?= isset($jawaban['jawaban'][0][$index]) && $jawaban['jawaban'][0][$index] != "" ? strtoupper($abjad ?? '') : ''; ?>
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

<?= form_open('', array('id' => 'up')) ?>
<?= form_close() ?>

<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/html-docx.js"></script>
<script src="<?= base_url() ?>/assets/app/js/convert-area.js"></script>

<script src="<?= base_url() ?>/assets/app/js/linker-list.js"></script>
<script src="<?= base_url() ?>/assets/plugins/element-queries/ElementQueries.js"></script>
<script src="<?= base_url() ?>/assets/plugins/element-queries/ResizeSensor.js"></script>

<script>
    var jmlPgTampil = '<?=$bank->tampil_pg?>';
    var jmlPg2Tampil = '<?=$bank->tampil_kompleks?>';
    var jmlJodohkanTampil = '<?=$bank->tampil_jodohkan?>';
    var jmlIsianTampil = '<?=$bank->tampil_isian?>';
    var jmlEssaiTampil = '<?=$bank->tampil_esai?>';
    var arrJenis = ['', 'Pilihan Ganda', 'PG Kompleks', 'Menjodohkan', 'Isian Singkat', 'Uraian/Essai'];

    $(document).ready(function () {
        var pathUpload = 'uploads';
        var $imgs = $('img');
        $.each($imgs, function () {
            var curSrc = $(this).attr('src');
            if (curSrc.indexOf("base64") > 0 || !curSrc.includes("uploads")) {
            } else {
                var forReplace = curSrc.split(pathUpload);
                $(this).attr('src', base_url + pathUpload + forReplace[1]);
            }
        });

        $.each($(`video`), function () {
            var curSrc = $(this).attr('src');
            if (curSrc.indexOf("base64") > 0 || !curSrc.includes("uploads")) {
            } else {
                var forReplace = curSrc.split(pathUpload);
                $(this).attr('src', base_url + pathUpload + forReplace[1]);
            }
        });

        $.each($(`audio`), function () {
            var curSrc = $(this).attr('src');
            if (curSrc.indexOf("base64") > 0 || !curSrc.includes("uploads")) {
            } else {
                var forReplace = curSrc.split(pathUpload);
                $(this).attr('src', base_url + pathUpload + forReplace[1]);
            }
        });

        var $div_lists = $('.list-jodohkan');
        let isMounted = false;
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            //e.target // newly activated tab
            //e.relatedTarget // previous active tab
            if ($(this).attr('href') === "#jodoh" && !isMounted) {
                $.each($div_lists, function () {
                    var noSoal = $(this).data('nomor');
                    var lists = $(this).data('list');
                    console.log('res', lists)
                    if ($(this).children().length > 1) return
                    $(this).linkerList({
                        enableSelect: false,
                        enableEditor: false,
                        data: lists,
                        id: noSoal,
                        onInit: function (msg) {
                            isMounted = true
                        }
                    });
                });
            }
        })

        var pgCount = $('#table-pg .check-pg').length;
        var pg2Count = $('#table-pg2 .check-pg2').length;
        var jodohkanCount = $('#table-jodohkan .check-jodohkan').length;
        var isianCount = $('#table-isian .check-isian').length;
        var essaiCount = $('#table-essai .check-essai').length;

        //console.log('count', jodohkanCount);

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

            $("#table-pg .check-pg:not(:checked)").each(function () {
                pgUnchecked.push($(this).val());
            });

            $("#table-pg2 .check-pg2:not(:checked)").each(function () {
                pg2Unchecked.push($(this).val());
            });

            $("#table-jodohkan .check-jodohkan:not(:checked)").each(function () {
                jodohkanUnchecked.push($(this).val());
            });

            $("#table-isian .check-isian:not(:checked)").each(function () {
                isianUnchecked.push($(this).val());
            });

            $("#table-essai .check-essai:not(:checked)").each(function () {
                essaiUnchecked.push($(this).val());
            });

            var pgchecked = $("#table-pg .check-pg:checked").length;
            $('#total-pg').html(`<b>${pgchecked}</b>`);
            $("#all-pg").prop("checked", pgchecked == pgCount);

            var pg2checked = $("#table-pg2 .check-pg2:checked").length;
            $('#total-pg2').html(`<b>${pg2checked}</b>`);
            $("#all-pg2").prop("checked", pg2checked == pg2Count);

            var jodohkanchecked = $("#table-jodohkan .check-jodohkan:checked").length;
            $('#total-jodohkan').html(`<b>${jodohkanchecked}</b>`);
            $("#all-jodohkan").prop("checked", jodohkanchecked == jodohkanCount);

            var isianchecked = $("#table-isian .check-isian:checked").length;
            $('#total-isian').html(`<b>${isianchecked}</b>`);
            $("#all-isian").prop("checked", isianchecked == isianCount);

            var essaiChecked = $("#table-essai .check-essai:checked").length;
            $('#total-essai').html(`<b>${essaiChecked}</b>`);
            $("#all-essai").prop("checked", essaiChecked == essaiCount);
        }

        findUnchecked();

        $("#table-pg").on("change", ".check-pg", function () {
            findUnchecked();
        });

        $("#table-pg2").on("change", ".check-pg2", function () {
            findUnchecked();
        });

        $("#table-jodohkan").on("change", ".check-jodohkan", function () {
            findUnchecked();
        });

        $("#table-isian").on("change", ".check-isian", function () {
            findUnchecked();
        });

        $("#table-essai").on("change", ".check-essai", function () {
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

            var checked = $("#table-pg .check-pg:checked").length;
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

            var checked = $("#table-pg2 .check-pg2:checked").length;
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

            var checked = $("#table-jodohkan .check-jodohkan:checked").length;
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

            var checked = $("#table-isian .check-isian:checked").length;
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

            var checked = $("#table-essai .check-essai:checked").length;
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
                    swal.fire({
                        title: "Sukses",
                        html: data.check+' Soal terpilih berhasil disimpan',
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(result => {
                        if (result.value) {
                            window.location.reload();
                        }
                    });
                }, error: function (xhr, status, error) {
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

        $("#convert").click(function (e) {
            e.preventDefault();

            var contentDocument = $('#for-export').convertToHtmlFile('detail', '');

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
    });

    function hapusSoal(btn) {
        const id = $(btn).data('idsoal');
        const no = $(btn).data('nomor');
        const jn = $(btn).data('jenis');

        swal.fire({
            title: "HAPUS ?",
            html: "Soal berikut akan dihapus<br>Nomor: <b>" + no + "</b><br>Jenis: <b>" + arrJenis[jn] + "</b>",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
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
                    url: base_url + "cbtbanksoal/hapussoal",
                    method: "POST",
                    data: $('#up').serialize() + '&soal_id=' + id,
                    success: function (result) {
                        console.log("result", result);
                        var tit = result ? 'BERHASIL' : 'GAGAL';
                        var msg = result ? 'berhasil' : 'gagal';
                        var ic = result ? 'success' : 'error';
                        swal.fire({
                            title: tit,
                            text: "Soal " + msg + " dihapus",
                            icon: ic,
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    }, error: function (xhr, status, error) {
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
        })
    }
</script>
