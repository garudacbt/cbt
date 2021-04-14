<?php

if (isset($jadwal_ujian)) {
    $ist = json_decode(json_encode($jadwal_ujian->istirahat));
    $jmlIst = json_decode(json_encode(unserialize($ist)));
    $jmlMapelPerHari = $jadwal_ujian->jml_mapel_hari;
} else {
    $jmlMapelPerHari = 0;
}
?>

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
            <!--
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title">Ujian Terjadwal</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            Pilih Kelas:
                            <br>
                            <?php
                            $arrKls = [];
                            foreach ($kelas as $kls) {
                                array_push($arrKls, $kls->level);
                            }
                            $arrKls = array_unique($arrKls);

                            if (count($arrKls) > 0) :
                                foreach ($arrKls as $v) :?>
                                    <a href="<?= base_url('cbtjadwal?level=' . $v) ?>"
                                       class="mt-1 btn <?= $level == $v ? 'btn-success' : 'btn-outline-success' ?>"
                                       id="btn-<?= $v ?>">Kelas Level: <?= $v ?>
                                    </a>
                                <?php endforeach;
                            else: ?>
                                <div class="col-12 p-0">
                                    <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                        Belum ada data kelas untuk Tahun Pelajaran <b><?= $tp_active->tahun ?></b>
                                        Semester:
                                        <b><?= $smt_active->smt ?></b>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <hr>

                    <?php
                    if ($level != '0') : ?>
                        <?= form_open('setJadwal', array('id' => 'setjadwal')); ?>
                        <div class="card">
                            <div class="card-body bg-gray-light">
                                <div class="row" id="inputs">
                                    <div class="col-md-3 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Tgl Mulai</span>
                                            </div>
                                            <input id="tgl_mulai" type="text" name="tgl_mulai" class="form-control"
                                                   value="<?= $jadwal_ujian->dari ?>" autocomplete="off"
                                                   placeholder="Tanggal Mulai" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Tgl Selesai</span>
                                            </div>
                                            <input id="tgl_selesai" type="text" name="tgl_selesai" class="form-control"
                                                   value="<?= $jadwal_ujian->sampai ?>" autocomplete="off"
                                                   placeholder="Tanggal Selesai" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Jumlah Mapel</span>
                                            </div>
                                            <input id="jml-mapel" type="number" class="form-control" name="jml_mapel"
                                                   value="<?= $jadwal_ujian->jml_mapel_hari == '' ? 0 : $jadwal_ujian->jml_mapel_hari ?>"
                                                   placeholder="Jml Mapel"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Istirahat</span>
                                            </div>
                                            <?php
                                            $kali[''] = 'Jml Istirahat';
                                            $kl = 1;
                                            for ($k = 0; $k < 2; $k++) {
                                                $kali[$kl] = $kl . ' kali';
                                                $kl += 1;
                                            }

                                            echo form_dropdown('jum_ist', $kali, count($jmlIst), 'id="jum_ist" class="form-control" placeholder="Jml Istirahat" required'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="level" value="<?= $level ?>" class="form-control">
                                <button class="btn btn-primary float-right">Generate Jadwal</button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    <?php endif; ?>
                </div>
            </div>
            -->
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title">Jadwal Ujian/Ulangan</h6>
                    <div class="card-tools">
                        <a href="<?= base_url('cbtjadwal') ?>" type="button" onclick=""
                           class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </a>
                        <a href="<?= base_url('cbtjadwal/add/0') ?>" type="button"
                           class="btn btn-primary btn-sm ml-1">
                            <i class="fas fa-plus-circle"></i> Tambah Jadwal
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    Kode Background Jadwal:
                    <br>
                    <span class="mr-3"><i class="fas fa-square text-gray"></i> Tidak aktif</span>
                    <span class="mr-3"><i class="fas fa-square text-maroon"></i> Belum dimulai</span>
                    <span class="mr-3"><i class="fas fa-square text-yellow"></i> Sedang dilaksanakan</span>
                    <span class="mr-3"><i class="fas fa-square text-fuchsia"></i> Selesai, belum rekap nilai</span>
                    <span><i class="fas fa-square text-success"></i> Selesai, sudah rekap nilai</span>
                    <hr>
                    <div class="row" id="konten">
                        <?php
                        //var_dump($jadwals[0]);
                        if (count($jadwals) === 0) : ?>
                            <?php if (!isset($tp_active) || !isset($smt_active)) : ?>
                                <div class="col-12">
                                    <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                        Tahun Pelajaran atau Semester belum di set
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-12">
                                    <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                        Belum ada jadwal penilaian untuk Tahun Pelajaran <b><?= $tp_active->tahun ?></b>
                                        Semester: <b><?= $smt_active->smt ?></b>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else:
                            //var_dump($ruangs);
                            //echo '<pre>';
                            //var_dump($jadwals[1]);
                            //echo '</pre>';
                            foreach ($jadwals as $jadwal) : ?>
                                <?php

                                $jk = json_decode(json_encode($jadwal->bank_kelas));
                                $jumlahKelas = json_decode(json_encode(unserialize($jk)));
                                //$jks = [];

                                $kelasbank = '';
                                $no = 1;
                                foreach ($jumlahKelas as $j) {
                                    foreach ($kelas as $k) {
                                        if ($j->kelas_id === $k->id_kelas) {
                                            if ($no > 1) {
                                                $kelasbank .= ', ';
                                            }
                                            $kelasbank .= $k->nama_kelas;
                                            $no++;
                                        }
                                    }
                                }
                                $startDay = strtotime($jadwal->tgl_mulai);
                                $endDay = strtotime($jadwal->tgl_selesai);
                                $today = strtotime(date('Y-m-d'));

                                //echo 'skrg='.$today . ' start=' . $startDay . ' end=' . $endDay;

                                $hariMulai = new DateTime($jadwal->tgl_mulai);
                                $hariSampai = new DateTime($jadwal->tgl_selesai);

                                $bgRandom = 'bg-gradient-maroon';
                                if ($jadwal->status == '0') {
                                    $bgRandom = 'bg-gradient-gray';
                                } else {
                                    if ($today < $startDay) {
                                        //belum dimulai
                                        $bgRandom = 'bg-gradient-maroon';
                                    } elseif ($today > $endDay) {
                                        //selesai
                                        $bgRandom = 'bg-gradient-fuchsia';
                                        if ($jadwal->rekap == '1') {
                                            $bgRandom = 'bg-gradient-success';
                                        }
                                    } else {
                                        //sedang dilaksanakan
                                        $bgRandom = 'bg-gradient-yellow';
                                    }
                                }
                                ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <!-- small card -->
                                    <?php
                                    //$r = array_rand($bgRandom)
                                    ?>
                                    <div class="small-box <?= $bgRandom ?>">
                                        <div class="inner" style="line-height: 1.3">
                                            <h5><b><?= $jadwal->bank_kode ?></b></h5>
                                            <span class="text-lg"><?= $jadwal->kode ?></span>
                                            <br>
                                            <span class="text-md">Kelas: <b><?= $kelasbank ?></b></span>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-book"></i>
                                        </div>
                                        <div class="list-jadwal-ujian">
                                            <div class="d-flex justify-content-between mr-2 ml-2">
                                                <span>Jenis</span>
                                                <span class="float-right"><b><?= $jadwal->kode_jenis ?></b></span>
                                            </div>
                                            <div class="d-flex justify-content-between mr-2 ml-2">
                                                <span>Mulai</span>
                                                <span class="float-right"><b><?= singkat_tanggal(date('D, d M Y', strtotime($jadwal->tgl_mulai))) ?></b></span>
                                            </div>
                                            <div class="d-flex justify-content-between mr-2 ml-2">
                                                <span>Sampai</span>
                                                <span class="float-right"><b><?= singkat_tanggal(date('D, d M Y', strtotime($jadwal->tgl_selesai))) ?></b></span>
                                            </div>
                                            <div class="d-flex justify-content-between mr-2 ml-2">
                                                <span>Durasi</span>
                                                <span class="float-right"><b><?= $jadwal->durasi_ujian ?>
                                                        menit</b></span>
                                            </div>
                                            <div class="d-flex justify-content-between mr-2 ml-2">
                                                <span>Acak Soal</span>
                                                <span class="float-right"><b><?= $jadwal->acak_soal == '1' ? 'Ya' : 'Tidak' ?></b></span>
                                            </div>
                                            <div class="d-flex justify-content-between mr-2 ml-2">
                                                <span>Acak Jawaban</span>
                                                <span class="float-right"><b><?= $jadwal->acak_opsi == '1' ? 'Ya' : 'Tidak' ?></b></span>
                                            </div>
                                            <div class="d-flex justify-content-between mr-2 ml-2">
                                                <span>Hasil Tampil</span>
                                                <span class="float-right"><b><?= $jadwal->hasil_tampil == '1' ? 'Ya' : 'Tidak' ?></b></span>
                                            </div>
                                            <div class="d-flex justify-content-between mr-2 ml-2">
                                                <span>Gunakan Token</span>
                                                <span class="float-right"><b><?= $jadwal->token == '1' ? 'Ya' : 'Tidak' ?></b></span>
                                            </div>
                                            <div class="d-flex justify-content-between mr-2 ml-2">
                                                <span>Reset Login</span>
                                                <span class="float-right"><b><?= $jadwal->reset_login == '1' ? 'Ya' : 'Tidak' ?></b></span>
                                            </div>
                                            <div class="d-flex justify-content-between mr-2 ml-2">
                                                <span>Status</span>
                                                <span class="float-right"><b><?= ($jadwal->status === '0') ? 'Non Aktif' : 'Aktif' ?></b></span>
                                            </div>
                                            <div class="d-flex justify-content-between mr-2 ml-2">
                                                <span>Sudah Rekap</span>
                                                <span class="float-right"><b><?= $jadwal->rekap == '1' ? 'Sudah' : 'Belum' ?></b></span>
                                            </div>
                                        </div>
                                        <hr style="margin-top:0; margin-bottom: 0">
                                        <div class="small-box-footer p-2 text-right">
                                            <a href="<?= base_url('cbtjadwal/add/' . $jadwal->id_jadwal) ?>"
                                               class="btn btn-warning">
                                                <i class="fas fa-pencil-alt"></i><span class="ml-2"> Edit</span>
                                            </a>
                                            <button class="btn btn-danger" onclick="hapus(<?= $jadwal->id_jadwal ?>)">
                                                <i class="fas fa-trash"></i><span class="ml-2"> Hapus</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function hapus(id) {
        swal.fire({
            title: "Anda yakin?",
            text: "Jadwal Ujian akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'cbtjadwal/deletejadwal?id_jadwal=' + id,
                    type: "GET",
                    success: function (respon) {
                        if (respon.status) {
                            swal.fire({
                                title: "Berhasil",
                                text: "Jadwal Ujian berhasil dihapus",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.href = base_url + 'cbtjadwal';
                                }
                            });
                        } else {
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa menghapus, " + respon.message,
                                icon: "error"
                            });
                        }
                    },
                    error: function () {
                        swal.fire({
                            title: "Gagal",
                            text: "Ada data yang sedang digunakan",
                            icon: "error"
                        });
                    }
                });
            }
        });
    }
</script>
