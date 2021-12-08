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
                    <table class="w-100">
                        <tr>
                            <td class="p-1" style="width: 20px"><i class="fas fa-square text-muted"></i></td>
                            <td class="p-1">Tidak aktif</td>
                            <td class="p-1" style="width: 20px"><i class="fas fa-square text-indigo"></i></td>
                            <td class="p-1">Sedang dilaksanakan</td>
                        </tr>
                        <tr>
                            <td class="p-1"><i class="fas fa-square text-yellow"></i></td>
                            <td class="p-1">Tidak digunakan</td>
                            <td class="p-1"><i class="fas fa-square text-fuchsia"></i></td>
                            <td class="p-1">Selesai, belum rekap nilai</td>
                        </tr>
                        <tr>
                            <td class="p-1"><i class="fas fa-square text-maroon"></i></td>
                            <td class="p-1">Belum dimulai</td>
                            <td class="p-1"><i class="fas fa-square text-success"></i></td>
                            <td class="p-1">Selesai, sudah rekap nilai</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="alert alert-default-danger" id="bulk-delete">
                <?= form_open('', array('id' => 'hapus_semua')) ?>
                <input style="width: 28px; height: 28px" class="check-all m-1" id="check-all" type="checkbox">
                <label for="check-all" class="align-middle">Pilih Semua</label>
                <button id="submit-hapus" type="submit" class="btn btn-danger mb-3 ml-4 d-none">
                    <i class="far fa-trash-alt"></i> Hapus Jadwal Terpilih
                </button>
                <?= form_close() ?>
            </div>

            <?php
            if (count($jadwals) === 0) : ?>
                <div class="card card-default my-shadow mb-4">
                    <div class="card-body">
                        <?php if (!isset($tp_active) || !isset($smt_active)) : ?>
                            <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                Tahun Pelajaran atau Semester belum di set
                            </div>
                        <?php else: ?>
                            <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                Belum ada jadwal penilaian untuk Tahun Pelajaran <b><?= $tp_active->tahun ?></b>
                                Semester: <b><?= $smt_active->smt ?></b>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else:
                //echo '<pre>';
            //var_dump($jadwals);
                //echo '</pre>';
                ?>
            <div id="konten-jadwal">
                <?php
                foreach ($jadwals as $title => $arrjadwal) : ?>
                    <div class="card card-default my-shadow mb-4">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <?php foreach ($arrjadwal as $lvl => $sjadwal) : ?>
                            <div class="card-body" style="display: block;">
                                <div><b>Kelas: <?=$lvl?></b></div>
                                <div class="row mt-2">
                                    <?php foreach ($sjadwal as $jadwal) : ?>
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

                                        $enableEdit = true;
                                        $sedangdikerjakan = 0;
                                        $terpakai = true;//isset($jadwal->total_siswa) && $jadwal->total_siswa != null;
                                        $bgRandom = 'bg-gradient-maroon';
                                        if ($jadwal->status == '0') {
                                            $bgRandom = 'bg-gradient-gray';
                                        } else {
                                            if ($today < $startDay) {
                                                //belum dimulai
                                                $bgRandom = 'bg-gradient-maroon';
                                            } elseif ($today > $endDay) {
                                                //selesai
                                                $terpakai = isset($total_siswa[$jadwal->id_jadwal]) && count($total_siswa[$jadwal->id_jadwal]) > 0;
                                                $bgRandom = $terpakai ? 'bg-gradient-fuchsia' : 'bg-gradient-yellow';
                                                if ($jadwal->rekap == '1') {
                                                    $bgRandom = $terpakai ? 'bg-gradient-success' : 'bg-gradient-yellow';
                                                }
                                                //$enableEdit = false;
                                            } else {
                                                //sedang dilaksanakan
                                                $terpakai = isset($total_siswa[$jadwal->id_jadwal]) && count($total_siswa[$jadwal->id_jadwal]) > 0;
                                                $bgRandom = $terpakai ? 'bg-gradient-indigo' : 'bg-gradient-yellow';
                                                $sedangdikerjakan = $terpakai ? 1 : 0;
                                            }
                                        }

                                        $total_seharusnya = ($jadwal->tampil_pg + $jadwal->tampil_kompleks + $jadwal->tampil_jodohkan + $jadwal->tampil_isian + $jadwal->tampil_esai);
                                        $total_soal = $jadwal->total_soal == 0 ? 'Soal belum dibuat' :
                                            ($jadwal->total_soal < $total_seharusnya ? 'Soal belum selesai' :
                                                'Jml. Soal: <b>' . $total_seharusnya . '</b>')
                                        ?>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                            <!-- small card -->
                                            <?php
                                            //$r = array_rand($bgRandom)
                                            ?>
                                            <div class="small-box <?= $bgRandom ?>" style="text-align: left">
                                                <div class="inner" style="line-height: 1.3">
                                                    <h6 class="crop-text-1"><b><?= $jadwal->nama_mapel ?></b></h6>
                                                    <span><?= $total_soal ?></span>
                                                    <br>
                                                    <span class="text-sm">Kelas: </span>
                                                    <span class="float-right"><b><?= $kelasbank ?></b></span>
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
                                                        <span>Kode Soal</span>
                                                        <span class="float-right"><b><?= $jadwal->bank_kode ?></b></span>
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
                                                    <div class="d-flex justify-content-between mr-2 ml-2">
                                                        <span>Mengerjakan</span>
                                                        <span class="float-right">
                                                            <b><?= isset($total_siswa[$jadwal->id_jadwal]) ? count($total_siswa[$jadwal->id_jadwal]) : '0'; ?></b>
                                                        </span>
                                                    </div>
                                                </div>
                                                <hr style="margin-top:0; margin-bottom: 0">
                                                <div class="small-box-footer p-2">
                                                    <input name="checked[]" value="<?=$jadwal->id_jadwal?>" class="check-jadwal float-left" type="checkbox" style="width: 28px;height: 28px">
                                                    <div class="text-right">
                                                        <a href="<?= $enableEdit ? base_url('cbtjadwal/add/' . $jadwal->id_jadwal . '?enable=' . $sedangdikerjakan) : '#' ?>"
                                                           class="btn btn-warning <?= $enableEdit ? '' : 'btn-disabled' ?>">
                                                            <i class="fas fa-pencil-alt"></i><span class="ml-2"> Edit</span>
                                                        </a>
                                                        <button class="btn btn-danger"
                                                                onclick="hapus(<?= $jadwal->id_jadwal ?>)">
                                                            <i class="fas fa-trash"></i><span class="ml-2"> Hapus</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </section>
</div>

<script>
    $('.btn-disabled').click(function (e) {
        e.preventDefault();
    });

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

    $(document).ready(function () {
        var count = $('#konten-jadwal .check-jadwal').length;
        if (count == 0) {
            $('#bulk-delete').addClass('d-none');
        }

        var unchecked = [];
        var checked = [];

        function findUnchecked() {
            unchecked = [];
            checked = [];
            var count = $('#konten-jadwal .check-jadwal').length;

            $("#konten-jadwal .check-jadwal:not(:checked)").each(function () {
                unchecked.push($(this).val());
            });
            $("#konten-jadwal .check-jadwal:checked").each(function () {
                checked.push($(this).val());
            });
            var countChecked = $("#konten-jadwal .check-jadwal:checked").length;
            $("#check-all").prop("checked", countChecked == count);

            if (countChecked > 0) {
                $("#submit-hapus").removeClass('d-none');
            } else {
                $("#submit-hapus").addClass('d-none');
            }
        }

        $("#konten-jadwal").on("change", ".check-jadwal", function () {
            findUnchecked();
        });

        $("#check-all").on("click", function () {
            if (count > 0) {
                if (this.checked) {
                    $(".check-jadwal").each(function () {
                        this.checked = true;
                        $("#check-all").prop("checked", true);
                    });
                } else {
                    $(".check-jadwal").each(function () {
                        this.checked = false;
                        $("#check-all").prop("checked", false);
                    });
                }
                findUnchecked()
            }
        });

        $('#hapus_semua').on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            var dataPost = $(this).serialize() + '&checked=' + JSON.stringify(checked);
            console.log(dataPost);

            swal.fire({
                title: "Anda yakin?",
                text: "Semua Bank Soal yang dipilih akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus!"
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        url: base_url + 'cbtjadwal/deletealljadwal',
                        type: "POST",
                        data: dataPost,
                        success: function (respon) {
                            if (respon.status) {
                                swal.fire({
                                    title: "Berhasil",
                                    text: "Jadwal berhasil dihapus",
                                    icon: "success"
                                }).then(result => {
                                    if (result.value) {
                                        window.location.reload();
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
        })
    })

</script>
