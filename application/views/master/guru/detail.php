<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 14/06/2020
 * Time: 01.31
 */
?>

<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between mb-2">
                <h1><?= $judul ?></h1>
                <a href="<?= base_url('dataguru') ?>" type="button" class="btn btn-sm btn-danger">
                    <i class="fas fa-arrow-circle-left"></i><span class="d-none d-sm-inline-block ml-1">Kembali</span>
                </a>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                    <div class="card-tools"></div>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-warning mb-0">
                        <p><i class="fa fa-warning"></i> Anda akan menghapus data <b><?= $guru['detail']->nama_guru ?>
                                .</b></p>
                        <div class="row">
                            <div class="col-md-5">
                                <p><b>PENTING</b></p>
                                <ul>
                                    <li>
                                        <span>Informasi di bawah ini adalah detail dari guru bersangkutan</span><br>
                                    </li>
                                    <li>
                                        <span>Setelah menghapus data guru maka harus mengatur ulang guru pengganti agar tidak terjadi error</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-6">
                                <p><b>SARAN</b></p>
                                <ul>
                                    <li>
                                        <span>Sebaiknya tidak menghapus guru yang mempunyai jabatan atau tugas lainnya.</span><br>
                                    </li>
                                    <li>
                                        <span>Gunakan menu <b>User Management -> Guru</b> untuk menonaktifkan guru.</span>
                                    </li>
                                    <li>
                                        <span>Atau gunakan menu <b>Guru -> Edit Profile</b> untuk mengganti nama guru tanpa harus menghapus.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="table w-100 table-bordered">
                        <?php
                        $tahuns = [];
                        $tahun_ids = [];
                        foreach ($guru['jabatan'] as $t => $s) {
                            $searchTp = array_search($t, array_column($tp, 'id_tp'));
                            array_push($tahun_ids, $tp[$searchTp]->id_tp);
                            array_push($tahuns, $tp[$searchTp]->tahun);
                        }
                        ?>
                        <tr>
                            <td class="w-25">Nama</td>
                            <td <?= count($tahuns) > 0 ? 'colspan="2" ' : '' ?>class="w-75">
                                <b><?= $guru['detail']->nama_guru ?></b></td>
                        </tr>
                        <?php if (count($tahuns) > 0) : ?>
                            <tr>
                                <td rowspan="<?= count($tahuns) * 2 ?>" class="align-top">Tugas / Jabatan</td>
                                <td rowspan="2"
                                    class="w-25"><?= isset($tahuns[0]) ? $tahuns[0] : '' ?></td>
                                <td>
                                    Smt 1
                                    <?php
                                    if (isset($guru['jabatan'][$tahun_ids[0]][1])) :
                                        ?>
                                        <ul>
                                            <li><?= $guru['jabatan'][$tahun_ids[0]][1]->level . ' ' . $guru['jabatan'][$tahun_ids[0]][1]->nama_kelas ?></li>
                                            <li>
                                                Pengampu
                                                <ul>
                                                    <?php
                                                    $mapels = json_decode(json_encode(unserialize($guru['jabatan'][$tahun_ids[0]][1]->mapel_kelas ?? '')));
                                                    foreach ($mapels as $mapel) :
                                                        $kls = '';
                                                        foreach ($mapel->kelas_mapel as $mk) {
                                                            if (isset($kelas[$tahun_ids[0]][1][$mk->kelas])) {
                                                                $kls .= '<span class="badge badge-btn badge-primary">' . $kelas[$tahun_ids[0]][1][$mk->kelas]->nama_kelas . '</span> ';
                                                            }
                                                        }
                                                        ?>
                                                        <li><?= $mapel->nama_mapel ?><br><?= $kls ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Smt 2
                                    <?php
                                    if (isset($guru['jabatan'][$tahun_ids[0]][2])) :?>
                                        <ul>
                                            <li><?= $guru['jabatan'][$tahun_ids[0]][2]->level . ' ' . $guru['jabatan'][$tahun_ids[0]][2]->nama_kelas ?></li>
                                            <li>
                                                Pengampu
                                                <ul>
                                                    <?php
                                                    $mapels = json_decode(json_encode(unserialize($guru['jabatan'][$tahun_ids[0]][2]->mapel_kelas ?? '')));
                                                    foreach ($mapels as $mapel) :
                                                        $kls = '';
                                                        foreach ($mapel->kelas_mapel as $mk) {
                                                            if (isset($kelas[$tahun_ids[0]][2][$mk->kelas])) {
                                                                $kls .= '<span class="badge badge-btn badge-primary">' . $kelas[$tahun_ids[0]][2][$mk->kelas]->nama_kelas . '</span> ';
                                                            }
                                                        }
                                                        ?>
                                                        <li><?= $mapel->nama_mapel ?><br><?= $kls ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php
                            for ($i = 1; $i < count($tahuns); $i++) : ?>
                                <tr>
                                    <td rowspan="2"><?= $tahuns[$i] ?></td>
                                    <td>
                                        Smt 1
                                        <?php if (isset($guru['jabatan'][$tahun_ids[$i]][1])) : ?>
                                            <ul>
                                                <li><?= $guru['jabatan'][$tahun_ids[$i]][1]->level . ' ' . $guru['jabatan'][$tahun_ids[$i]][1]->nama_kelas ?></li>
                                                <li>
                                                    Pengampu
                                                    <ul>
                                                        <?php
                                                        $mapels = json_decode(json_encode(unserialize($guru['jabatan'][$tahun_ids[$i]][1]->mapel_kelas ?? '')));
                                                        foreach ($mapels as $mapel) :
                                                            $kls = '';
                                                            foreach ($mapel->kelas_mapel as $mk) {
                                                                if (isset($kelas[$tahun_ids[$i]][1][$mk->kelas])) {
                                                                    $kls .= '<span class="badge badge-btn badge-primary">' . $kelas[$tahun_ids[$i]][1][$mk->kelas]->nama_kelas . '</span> ';
                                                                }
                                                            }
                                                            ?>
                                                            <li><?= $mapel->nama_mapel ?><br><?= $kls ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">
                                        Smt 2
                                        <?php if (isset($guru['jabatan'][$tahun_ids[$i]][2])) : ?>
                                            <ul>
                                                <li><?= $guru['jabatan'][$tahun_ids[$i]][2]->level . ' ' . $guru['jabatan'][$tahun_ids[$i]][2]->nama_kelas ?></li>
                                                <li>
                                                    Pengampu
                                                    <ul>
                                                        <?php
                                                        $mapels = json_decode(json_encode(unserialize($guru['jabatan'][$tahun_ids[$i]][2]->mapel_kelas ?? '')));
                                                        foreach ($mapels as $mapel) :
                                                            $kls = '';
                                                            foreach ($mapel->kelas_mapel as $mk) {
                                                                if (isset($kelas[$tahun_ids[$i]][2][$mk->kelas])) {
                                                                    $kls .= '<span class="badge badge-btn badge-primary">' . $kelas[$tahun_ids[$i]][2][$mk->kelas]->nama_kelas . '</span> ';
                                                                }
                                                            }
                                                            ?>
                                                            <li><?= $mapel->nama_mapel ?><br><?= $kls ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endfor; endif; ?>
                        <tr>
                            <td class="align-top">Materi Siswa</td>
                            <td <?= count($tahuns) > 0 ? 'colspan="2" ' : '' ?>class="">
                                <b><?= $guru['materi'] ?></b> materi
                            </td>
                        </tr>
                        <tr>
                            <td class="align-top">Catatan Siswa</td>
                            <td <?= count($tahuns) > 0 ? 'colspan="2" ' : '' ?>class="">
                                <b><?= $guru['catatan_mapel'] ?></b> catatan
                            </td>
                        </tr>
                        <tr>
                            <td class="align-top">Bank Soal</td>
                            <td <?= count($tahuns) > 0 ? 'colspan="2" ' : '' ?>class="">
                                <b><?= $guru['bank_soal'] ?></b> bank soal
                            </td>
                        </tr>
                        <tr>
                            <td class="align-top">Pengawas</td>
                            <td <?= count($tahuns) > 0 ? 'colspan="2" ' : '' ?>class="">
                                <b><?= $guru['pengawas'] ?></b> jadwal
                            </td>
                        </tr>
                        <tr>
                            <td class="align-top">Pengumuman</td>
                            <td <?= count($tahuns) > 0 ? 'colspan="2" ' : '' ?>class="">
                                <b><?= $guru['posts'] ?></b> post
                            </td>
                        </tr>
                        <tr>
                            <td class="align-top">Komentar</td>
                            <td <?= count($tahuns) > 0 ? 'colspan="2" ' : '' ?>class="">
                                <b><?= $guru['comments'] ?></b> komentar
                            </td>
                        </tr>
                        <tr>
                            <td class="align-top">Balasan Komentar</td>
                            <td <?= count($tahuns) > 0 ? 'colspan="2" ' : '' ?>class="">
                                <b><?= $guru['replies'] ?></b> balasan
                            </td>
                        </tr>
                    </table>

                    <div class="mb-3 float-right mt-3">
                        <a href="<?= base_url('dataguru') ?>" type="button" class="btn btn-success">
                            <i class="fas fa-arrow-left"></i> Batalkan Penghapusan
                        </a>
                        <button class="btn btn-outline-danger" onclick="hapus('<?= $id_guru ?>')">
                            <i class="fa fa-trash mr-1"></i>Lanjutkan Penghapusan
                        </button>
                    </div>
                    <?php
                    //$searchId = array_search('1', array_column($tp, 'id_tp'));
                    //echo '<pre>';
                    //var_dump($tahuns);
                    // var_dump($tp);
                    //echo '<br>';
                    //var_dump($kelas);
                    //echo '<br>';
                    //var_dump($guru);
                    //echo '</pre>';
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?= form_open('', array('id' => 'hapus-guru')) ?>
<?= form_close() ?>

<script>
    function hapus(idGuru) {
        swal.fire({
            title: "Anda yakin?",
            text: "Data guru akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'dataguru/forcedelete',
                    data: $('#hapus-guru').serialize() + '&id_guru=' + idGuru,
                    type: "POST",
                    success: function (respon) {
                        console.log(respon);
                        if (respon.status) {
                            swal.fire({
                                title: "Berhasil",
                                text: "Data guru berhasil dihapus",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.href = base_url + 'dataguru';
                                }
                            });
                        } else {
                            swal.fire({
                                title: "Gagal",
                                html: respon.message,
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

    });
</script>
