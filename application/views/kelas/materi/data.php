<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/08/20
 * Time: 22:29
 */

$urlJenis = $jenis == "1" ? "materi" : "tugas";
$total = count($materi);
$all_materi = [];
$curr_materi = [];
foreach ($materi as $k => $m) {
    if ($m->smt == $smt_active->smt && $m->tahun == $tp_active->tahun) {
        array_push($curr_materi, $m);
        //unset($materi[$k]);
    } else {
        array_push($all_materi, $m);
        //unset($materi[$k]);
    }
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
            <?php
            //echo '<pre>';
            //var_dump($kelas_materi);
            //echo '<br>';
            //var_dump($total);
            //echo '<br>';
            //var_dump($kelas_materi);
            //var_dump($curr_materi);
            //echo '</pre>';
            ?>
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                    <div class="card-tools">
                        <a href="<?= base_url('kelasmateri/'.$urlJenis.'?id=' . $id_guru) ?>" type="button" onclick=""
                           class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </a>
                        <a href="<?= base_url('kelasmateri/add/'.$jenis) ?>" type="button" class="btn btn-primary btn-sm ml-1">
                            <i class="fas fa-plus-circle"></i> Buat <?=$subjudul?>
                        </a>
                        <button type="button" data-toggle="modal" data-target="#openAll<?=$subjudul?>"
                                class="btn btn-sm btn-success"><i class="fa fa-copy"></i> Copy <?=$subjudul?>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-info align-content-center" role="alert">
                        Untuk mengcopy <?=$subjudul?> dari tahun atau semester sebelumnya <b>ke TP <?= $tp_active->tahun ?>
                            SMT <?= $smt_active->nama_smt ?></b>,
                        <ul>
                            <?php if ($this->ion_auth->is_admin()) : ?>
                                <li>
                                    Pilih Nama Guru
                                </li>
                            <?php endif; ?>
                            <li>
                                Klik <b><i class="fa fa-copy"></i> Copy <?=$subjudul?></b>
                            </li>
                            <li>
                                Klik Aksi <b>Copy</b> untuk <?=$subjudul?> yang akan dicopy
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <?php
                        $dnone = $this->ion_auth->is_admin() ? '' : 'd-none';
                        $left = $this->ion_auth->is_admin() ? 'text-right' : 'text-left';
                        $btnNone = count($curr_materi) > 0 ? '' : 'd-none';
                        ?>
                        <div class="col-md-6 mb-4 <?= $dnone ?>">
                            <label>Pilih Guru</label>
                            <?php echo form_dropdown(
                                'guru',
                                $gurus,
                                $id_guru,
                                'id="guru" class="select2 form-control" required'
                            ); ?>
                        </div>
                        <div class="col-6 <?= $left ?> <?= $btnNone ?>">
                            <button type="button" id="delete-all" data-count="<?= count($curr_materi) ?>"
                                    class="btn btn-sm btn-danger mb-3"><i class="fa fa-trash"></i> Hapus Semua <?=$subjudul?>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $arrIds = [];
                        if (count($curr_materi) > 0) :?>
                        <div class="col-12">
                            <table class="w-100 table table-sm table-bordered">
                                <tr class="alert alert-success">
                                    <th rowspan="2" class="text-center align-middle">No.</th>
                                    <th rowspan="2" class="text-center align-middle">Guru</th>
                                    <th rowspan="2" class="text-center align-middle">Mapel</th>
                                    <th colspan="3" class="text-center align-middle"><?=$subjudul?></th>
                                    <th rowspan="2" class="text-center align-middle">TP / SMT</th>
                                    <th rowspan="2" class="text-center align-middle">Dibuat</th>
                                    <th rowspan="2" class="text-center align-middle">Status</th>
                                    <th rowspan="2" class="text-center align-middle" style="width: 100px">Aksi</th>
                                </tr>
                                <tr class="alert alert-success">
                                    <th class="text-center align-middle">Kode</th>
                                    <th class="text-center align-middle">Judul</th>
                                    <th class="text-center align-middle">Kelas</th>
                                </tr>
                                <?php
                                $no = 1;
                                foreach ($curr_materi as $key => $value) :
                                    $arr = unserialize($value->materi_kelas);
                                    array_push($arrIds, $value->id_materi);
                                    ?>
                                    <tr>
                                        <td class="text-center align-middle"><?= $no ?></td>
                                        <td class="align-middle"><?= $value->nama_guru ?></td>
                                        <td class="align-middle"><?= $value->kode ?></td>
                                        <td class="align-middle"><?= $value->kode_materi ?></td>
                                        <td class="align-middle"><?= $value->judul_materi ?></td>
                                        <?php
                                        $arrKls = '';
                                        foreach ($arr as $k => $v) {
                                            if (isset($kelas_materi[$value->id_materi][$v])) {
                                                $arrKls .= '<span class="badge badge-secondary mr-1">' . $kelas_materi[$value->id_materi][$v] . '</span>';
                                            }
                                        } ?>

                                        <td class="text-center align-middle"><?= $arrKls ?></td>
                                        <td class="text-center align-middle"><?= $value->tahun ?> smt <?= $value->nama_smt ?></td>
                                        <td class="text-center align-middle">
                                            <?= date('d-m-Y H:i', strtotime($value->updated_on)) ?>

                                        </td>
                                        <?php
                                        $stt = $value->status == '1' ? 'Aktif' : 'Non Aktif';
                                        $btn_bg = $value->status == '1' ? 'bg-success' : 'bg-warning';
                                        //$btn_txt = $value->status == '1' ? 'Nonaktifkan' : 'Aktifkan';
                                        ?>
                                        <td class="text-center align-middle">
                                            <button
                                                    class="btn btn-xs <?= $btn_bg ?>"
                                                    onclick="aktifkanMateri(<?= $value->id_materi ?>, <?= $value->status ?>)">
                                                <?= $stt ?>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <a type="button" class="btn btn-sm btn-warning" title="Edit <?=$subjudul?>"
                                               href="<?= base_url('kelasmateri/add/'. $jenis. '/' . $value->id_materi) ?>">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button onclick="hapus(<?= $value->id_materi ?>)" type="button"
                                                    class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                    title="Hapus <?=$subjudul?>">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $no++; endforeach; ?>
                            </table>
                        </div>
                        <?php else: ?>
                            <div class="col-12 p-0">
                                <div class="alert alert-default-warning align-content-center" role="alert">
                                    Belum ada <?=$subjudul?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="openAll<?=$subjudul?>" tabindex="-1" role="dialog" aria-labelledby="open<?=$subjudul?>Label"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="open<?=$subjudul?>Label">Semua <?=$subjudul?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (count($all_materi) > 0) : ?>
                    <table id="tableEkstra"
                           class="w-100 table table-striped table-bordered table-hover table-head-fixed overflow-auto display nowrap"
                           style="max-height: 300px">
                        <thead>
                        <tr>
                            <th class="text-center align-middle p-0">No.</th>
                            <th>Judul</th>
                            <th>Mapel</th>
                            <th>Kelas</th>
                            <th>TP/SMT</th>
                            <th class="text-center align-middle p-0" style="width: 100px"><span>Aksi</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($all_materi as $am) :
                            $arr = unserialize($am->materi_kelas);
                            $skelas = '';
                            for ($i = 0; $i < count($arr); $i++) {
                                $skelas .= isset($kelas[$arr[$i]]) ? $kelas[$arr[$i]] : "-";
                                if ($i < (count($arr) - 1)) {
                                    $skelas .= ', ';
                                }
                            }
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $am->judul_materi ?></td>
                                <td><?= $am->kode_mapel ?></td>
                                <td><?= $skelas ?></td>
                                <td><?= $am->tahun . ' - ' . $am->nama_smt ?></td>
                                <td>
                                    <button onclick="copy(<?= $am->id_materi ?>)" type="button"
                                            class="btn btn-sm btn-success"><i class="fa fa-copy"></i> Copy
                                    </button>
                                </td>
                            </tr>
                            <?php
                            $no++;
                        endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-default-info align-content-center" role="alert">
                        tidak ada materi sebelumnya
                    </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?= form_open('', array('id' => 'up')) ?>
<?= form_close() ?>

<script>
    var idGuru = '<?=$id_guru?>';
    var subjudul = '<?=$subjudul?>';
    var urlJenis = '<?=$jenis == "1" ? "materi" : "tugas"?>';
    var jenis = '<?=$jenis?>';
    $(document).ready(function () {
        ajaxcsrf();

        function getMateriGuru() {
            window.location.href = base_url + 'kelasmateri/'+ urlJenis +'?id=' + idGuru;
        }

        $('#guru').append('<option value="0">SEMUA GURU</option>');

        $('#guru').on('change', function () {
            idGuru = $(this).val();
            getMateriGuru();
        });

        $('#previewModal').on('show.bs.modal', function (e) {
            var src = $(e.relatedTarget).data('src');
            var size = $(e.relatedTarget).data('size');
            var type = $(e.relatedTarget).data('type');

            $('#download').attr('href', src).attr('download', 'file_materi.' + type.split('/')[1]);

            $("div").remove(".prev");
            if (type.match('image')) {
                $('#media-preview').append('<div class="prev"><img src="' + src + '" alt=""></div>');
            } else if (type.match('video')) {
                $('#media-preview').append('<div class="prev"><video src="' + src + '" controls="controls" preload="metadata" style="width: 100%; height: auto;"></div>');
            }
        });

        $('#delete-all').on('click', function (e) {
            var ids = <?= json_encode($arrIds) ?>;
            var dataPost = $('#up').serialize() + '&ids=' + JSON.stringify(ids);
            console.log(dataPost);
            var count = $(this).data('count');
            if (count > 0) {
                swal.fire({
                    title: "Hapus Semua " + subjudul + "?",
                    text: count + " materi akan dihapus",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Hapus Semua"
                }).then(result => {
                    if (result.value) {
                        $.ajax({
                            url: base_url + 'kelasmateri/deleteallmateri',
                            type: "POST",
                            data: dataPost,
                            success: function (respon) {
                                if (respon) {
                                    swal.fire({
                                        title: "Berhasil",
                                        text: count + " " + subjudul + " berhasil dihapus",
                                        icon: "success"
                                    }).then(result => {
                                        if (result.value) {
                                            window.location.href = base_url + 'kelasmateri/'+urlJenis+'?id=' + idGuru;
                                        }
                                    })
                                } else {
                                    swal.fire({
                                        title: "Gagal",
                                        text: "Tidak bisa menghapus "+ urlJenis,
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
            } else {
                swal.fire({
                    title: subjudul + " Kosong",
                    text: "Tidak ada materi yang bisa dihapus",
                    icon: "info"
                });
            }
        });
    });

    function aktifkanMateri(id, status) {
        function aktifkan() {
            $.ajax({
                url: base_url + 'kelasmateri/aktifkanmateri',
                data: {id_materi: id, method: status},
                type: "POST",
                success: function (respon) {
                    if (respon.status) {
                        /*
                        swal.fire({
                            title: "Berhasil",
                            text: status === '0' ? "data berhasil diaktifkan" : "data berhasil dinonaktifkan",
                            icon: "success"
                        }).then(result => {
                            if(result.value) {
                                window.location.href = base_url + 'kelasmateri?id=' + idGuru ;
                                //window.location.href = base_url + 'kelasmateri/getmateriguru?id='+idGuru;
                        }})*/
                    } else {
                        swal.fire({
                            title: "Gagal",
                            text: "Tidak bisa menghapus",
                            icon: "error"
                        });
                    }
                    location.reload();
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

        if (status == '1') {
            swal.fire({
                title: "Anda yakin?",
                text: subjudul + " akan dinonaktifkan!",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Nonaktifkan"
            }).then(result => {
                if (result.value) {
                    aktifkan();
                }
            })
        } else {
            aktifkan();
        }
    }

    function hapus(id) {
        swal.fire({
            title: "Anda yakin?",
            text: subjudul + " akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'kelasmateri/hapusmateri',
                    data: {id_materi: id},
                    type: "POST",
                    success: function (respon) {
                        if (respon.status) {
                            swal.fire({
                                title: "Berhasil",
                                text: subjudul + " berhasil dihapus",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.href = base_url + 'kelasmateri/'+urlJenis+'?id=' + idGuru;
                                }
                            })
                        } else {
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa menghapus",
                                icon: "error"
                            });
                        }
                        //reload_ajax();
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

    function copy(id) {
        swal.fire({
            title: "Copi " + subjudul + "?",
            text: subjudul + " ini akan dicopy",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Copy"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'kelasmateri/copymateri/' + id + '/' + jenis,
                    type: "GET",
                    success: function (respon) {
                        if (respon) {
                            swal.fire({
                                title: "Berhasil",
                                text: subjudul + " berhasil dicopy",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.href = base_url + 'kelasmateri/'+urlJenis+'?id=' + idGuru;
                                    //window.location.href = base_url + 'kelasmateri/getmateriguru?id='+idGuru;
                                }
                            })
                        } else {
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa mengcopy materi",
                                icon: "error"
                            });
                        }
                        //reload_ajax();
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
