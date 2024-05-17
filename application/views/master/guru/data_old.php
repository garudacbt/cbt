<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 14/06/2020
 * Time: 01.31
 */

function sortByPosition($a, $b)
{
    if ($a->id_jabatan == $b->id_jabatan) return 0;
    if ($a->id_jabatan == 0) return 1;
    if ($b->id_jabatan == 0) return -1;
    return $a->id_jabatan > $b->id_jabatan ? 1 : -1;
}

?>

<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6 col-sm-7 col-lg-9">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6 col-sm-5 col-lg-3">
                    <input type='text' class='search-input form-control' autocomplete='off' placeholder='Cari Guru'>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title">Master <?= $subjudul ?></h6>
                    <div class="card-tools">
                        <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </button>
                        <a href="<?= base_url('dataguru/import') ?>" class="btn btn-sm bg-gradient-primary"><i
                                    class="fas fa-upload"></i><span class="d-none d-sm-inline-block ml-1">Tambah Guru / Import</span></a>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    //echo "<pre>";
                    //var_dump($gurus);
                    //echo "</pre>";
                    if ($mode == null || $mode == '1') :?>
                        <div class="row">
                            <?php
                            if (count($gurus) > 0) :
                                //usort($gurus, 'sortByPosition');
                                foreach ($gurus as $guru):
                                    $mapels_guru = json_decode(json_encode(unserialize($guru->mapel_kelas ?? '')));
                                    $ekstras_guru = json_decode(json_encode(unserialize($guru->ekstra_kelas ?? '')));
                                    ?>
                                    <div class="col-md-6 col-xl-4 d-flex align-items-stretch">
                                        <div class="card flex-fill">
                                            <div class="card-body d-flex flex-column justify-content-between">
                                                <div class="media mb-3">
                                                    <img class="d-flex mr-3 rounded-circle img-thumbnail thumb-lg"
                                                         onerror="this.src='<?= base_url('assets/img/siswa.png') ?>'"
                                                         src="<?= base_url($guru->foto) ?>" alt="foto"/>
                                                    <div class="media-body overflow-hidden">
                                                        <p class="card-text mb-0 text-xs"><?= $guru->nip ?></p>
                                                        <h6 class="card-text mb-0"><?= $guru->nama_guru ?></h6>
                                                        <p class="card-text"><?= $guru->level . ' ' . $guru->nama_kelas ?></p>
                                                        <?php
                                                        $stts = '';
                                                        $badge = '';
                                                        if ($guru->status) {
                                                            $stts = 'Aktif';
                                                            $badge = 'badge-success';
                                                        } else {
                                                            $stts = 'Nonaktif';
                                                            $badge = 'badge-danger';
                                                        } ?>
                                                        <span class="badge badge-btn <?= $badge ?>"><?= $stts ?></span>
                                                    </div>
                                                </div>
                                                <?php if ($mapels_guru != null || $ekstras_guru != null): ?>
                                                    <div>
                                                        <span>Pengampu:</span>
                                                        <table class="table table-bordered table-bordered">
                                                            <tr>
                                                                <th class="text-center">No.</th>
                                                                <th class="text-center">Mata Pelajaran</th>
                                                                <th class="text-center">Kelas</th>
                                                            </tr>
                                                            <?php
                                                            $nn = 1;
                                                            foreach ($mapels_guru as $mapel) :
                                                                $all_kelas_mapel = $mapel->kelas_mapel;
                                                                $kls_guru_mapel = '';
                                                                foreach ($all_kelas_mapel as $kls_mpl) {
                                                                    if (isset($kelass[$kls_mpl->kelas])) $kls_guru_mapel .= '<span class="badge badge-light border">' . $kelass[$kls_mpl->kelas]->nama_kelas . '</span> ';
                                                                }
                                                                ?>
                                                                <tr>
                                                                    <td class="text-center"><?= $nn ?></td>
                                                                    <td><?= $mapel->nama_mapel ?></td>
                                                                    <td class="text-center">
                                                                        <?= $kls_guru_mapel ?>
                                                                    </td>
                                                                </tr>
                                                                <?php $nn++; endforeach; ?>
                                                            <?php
                                                            foreach ($ekstras_guru as $ekstra) :
                                                                $all_kelas_ekstra = $ekstra->kelas_ekstra;
                                                                $kls_guru_ekstra = '';
                                                                foreach ($all_kelas_ekstra as $kls_eks) {
                                                                    if (isset($kelass[$kls_eks->kelas])) $kls_guru_ekstra .= '<span class="badge badge-light border">' . $kelass[$kls_eks->kelas]->nama_kelas . '</span> ';
                                                                }
                                                                ?>
                                                                <tr>
                                                                    <td class="text-center"><?= $nn ?></td>
                                                                    <td><?= $ekstra->nama_ekstra ?></td>
                                                                    <td class="text-center">
                                                                        <?= $kls_guru_ekstra ?>
                                                                    </td>
                                                                </tr>
                                                                <?php $nn++; endforeach; ?>
                                                        </table>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="row mt-auto">
                                                    <a href="<?= base_url('dataguru/edit/' . $guru->id_guru) ?>"
                                                       class="btn btn-sm btn-outline-primary"><i
                                                                class="fa fa-pencil"></i> Profile</a>
                                                    <a href="<?= base_url('dataguru/editJabatan/' . $guru->id_guru) ?>"
                                                       class="btn btn-sm btn-outline-primary ml-1"><i
                                                                class="fa fa-pencil"></i> Jabatan</a>
                                                    <button onclick="hapus('<?= $guru->id_guru ?>')"
                                                            class="btn btn-sm btn-outline-danger ml-auto"><i
                                                                class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;
                            else: ?>
                                <div class="alert alert-default-warning align-content-center" role="alert">Belum ada
                                    data GURU
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table id="guru" class="table w-100">
                                <thead class="alert alert-primary">
                                <tr>
                                    <th height="50" width="40" class="text-center p-0 align-middle">
                                        <input type="checkbox" id="select_all">
                                    </th>
                                    <th width="50" class="align-middle p-0">No.</th>
                                    <th class="align-middle p-0">Profil Guru</th>
                                    <th class="align-middle p-0">TP</th>
                                    <th class="align-middle p-0">SMT</th>
                                    <th class="text-center align-middle">Mapel</th>
                                    <th class="text-center p-0 align-middle"><span>Aksi</span></th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Kode</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?= form_open('', array('id' => 'hapus-guru')) ?>
<?= form_close() ?>

<script>
    $('.thumb-lg').css({'width': '6rem', 'height': '6rem'});

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
                    url: base_url + 'dataguru/deleteguru',
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
                                    window.location.reload(true);
                                }
                            });
                        } else {
                            if (respon.count > 0) {
                                window.location.href = base_url + 'dataguru/detail/' + idGuru
                            } else {
                                swal.fire({
                                    title: "Gagal",
                                    html: respon.message,
                                    icon: "error"
                                });
                            }
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

    /*
    $(document).ready(function () {
        $(`img.avatar`).each(function () {
            $(this).on("error", function () {
                console.log('foto', $(this).attr('src'));
                $(this).attr("src", base_url + '/assets/img/siswa.png'); // default foto
            });
        });
    });
    */
</script>
