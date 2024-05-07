<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/08/20
 * Time: 22:29
 */

$total = count($tugas);
$all_tugas = [];
foreach ($tugas as $k => $m) {
    if ($m->id_tp != $tp_active->tahun && $m->id_smt != $smt_active->id_smt) {
        array_push($all_tugas, $m);
        unset($tugas[$k]);
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
            //var_dump($jadwal_tugas);
            //echo '<br>';
            //var_dump($kelas_tugas);
            //var_dump($tugas);
            //echo '</pre>';
            ?>
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                    <div class="card-tools">
                        <a href="<?= base_url('kelastugas?id=' . $id_guru) ?>" type="button" onclick=""
                           class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </a>
                        <a href="<?= base_url('kelastugas/add') ?>" type="button" class="btn btn-primary btn-sm ml-1">
                            <i class="fas fa-plus-circle"></i> Buat tugas
                        </a>
                        <button type="button" data-toggle="modal" data-target="#openAllTugas"
                                class="btn btn-sm btn-success"><i class="fa fa-copy"></i> Copy Tugas
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-info align-content-center" role="alert">
                        Untuk mengcopy tugas dari tahun atau semester sebelumnya <b>ke TP <?= $tp_active->tahun ?>
                            SMT <?= $smt_active->nama_smt ?></b>,
                        <ul>
                            <?php if ($this->ion_auth->is_admin()) : ?>
                                <li>
                                    Pilih Nama Guru
                                </li>
                            <?php endif; ?>
                            <li>
                                Klik <b><i class="fa fa-copy"></i> Copy Tugas</b>
                            </li>
                            <li>
                                Klik Aksi <b>Copy</b> untuk tugas yang akan dicopy
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <?php
                        $dnone = $this->ion_auth->is_admin() ? '' : 'd-none';
                        $left = $this->ion_auth->is_admin() ? 'text-right' : 'text-left';
                        $btnNone = count($tugas) > 0 ? '' : 'd-none';
                        ?>
                        <div class="col-6 mb-4 <?= $dnone ?>">
                            <label>Pilih Guru</label>
                            <?php echo form_dropdown(
                                'guru',
                                $gurus,
                                $id_guru,
                                'id="guru" class="select2 form-control" required'
                            ); ?>
                        </div>
                        <div class="col-6 <?= $left ?> <?= $btnNone ?>">
                            <button type="button" id="delete-all" data-count="<?= count($tugas) ?>"
                                    class="btn btn-sm btn-danger mb-3"><i class="fa fa-trash"></i> Hapus Semua Tugas
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="w-100 table table-bordered">
                                <tr class="alert alert-success">
                                    <th rowspan="2" class="text-center align-middle">No.</th>
                                    <th rowspan="2" class="text-center align-middle">Guru</th>
                                    <th rowspan="2" class="text-center align-middle">Mapel</th>
                                    <th colspan="3" class="text-center align-middle">Tugas</th>
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
                                $arrIds = [];
                                if (count($tugas) > 0) :
                                $no = 1;
                                foreach ($tugas as $key => $value) :
                                    $arr = unserialize($value->tugas_kelas ?? '');
                                    array_push($arrIds, $value->id_materi);
                                    ?>
                                    <tr>
                                        <td class="text-center align-middle"><?= $no ?></td>
                                        <td class="align-middle"><?= $value->nama_guru ?></td>
                                        <td class="align-middle"><?= $value->kode ?></td>
                                        <td class="align-middle"><?= $value->kode_tugas ?></td>
                                        <td class="align-middle"><?= $value->judul_tugas ?></td>
                                        <?php
                                        $arrKls = '';
                                        foreach ($arr as $k => $v) {
                                            if (isset($kelas_tugas[$value->id_materi][$v])) {
                                                $arrKls .= '<span class="badge badge-secondary mr-1">' . $kelas_tugas[$value->id_materi][$v] . '</span>';
                                            }
                                        } ?>

                                        <td class="text-center align-middle"><?= $arrKls ?></td>
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
                                                    onclick="aktifkanTugas(<?= $value->id_materi ?>, <?= $value->status ?>)">
                                                <?= $stt ?>
                                            </button>
                                        </td>
                                        <td class="text-center">
                                            <a type="button" class="btn btn-sm btn-warning" title="Edit Tugas"
                                               href="<?= base_url('kelastugas/add/' . $value->id_materi) ?>">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <button onclick="hapus(<?= $value->id_materi ?>)" type="button"
                                                    class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                    title="Hapus Tugas">
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
                                    <?= $id_guru == '' ? "Pilih Guru" : "Belum ada tugas"; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="openAllTugas" tabindex="-1" role="dialog" aria-labelledby="openTugasLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="openTugasLabel">Semua Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (count($all_tugas) > 0) : ?>
                    <table id="tableEkstra"
                           class="w-100 table table-striped table-bordered table-hover table-head-fixed overflow-auto display nowrap"
                           style="height: 300px">
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
                        foreach ($all_tugas as $am) :
                            $arr = unserialize($am->tugas_kelas ?? '');
                            $kelas = '';
                            for ($i = 0; $i < count($arr); $i++) {
                                $kelas .= $arr[$i];
                                if ($i < (count($arr) - 1)) {
                                    $kelas .= ', ';
                                }
                            }
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $am->judul_tugas ?></td>
                                <td><?= $am->kode_mapel ?></td>
                                <td><?= $kelas ?></td>
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
                        tidak ada tugas sebelumnya
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
    $(document).ready(function () {
        ajaxcsrf();

        function getTugasGuru() {
            window.location.href = base_url + 'kelastugas?id=' + idGuru;
        }

        $('#guru').append('<option value="0">SEMUA GURU</option>');

        $('#guru').on('change', function () {
            idGuru = $(this).val();
            getTugasGuru()
        });

        $('#previewModal').on('show.bs.modal', function (e) {
            var src = $(e.relatedTarget).data('src');
            var size = $(e.relatedTarget).data('size');
            var type = $(e.relatedTarget).data('type');

            $('#download').attr('href', src).attr('download', 'file_tugas.' + type.split('/')[1]);

            $("div").remove(".prev");
            if (type.match('image')) {
                $('#media-preview').append('<div class="prev"><img src="' + src + '" alt=""></div>');
            } else if (type.match('video')) {
                $('#media-preview').append('<div class="prev"><video src="' + src + '" controls="controls" preload="metadata" style="width: 100%; height: auto;"></div>');
            }
        });

        $('#editJadwalModal').on('show.bs.modal', function (e) {
            var id_materi = $(e.relatedTarget).data('idtugas');
            var id_mapel = $(e.relatedTarget).data('idmapel');
            var judul = $(e.relatedTarget).data('judul');
            var kelas = $(e.relatedTarget).data('kelas');
            var mapel = $(e.relatedTarget).data('mapel');
            var namakelas = $(e.relatedTarget).data('namakelas');
            var namamapel = $(e.relatedTarget).data('namamapel');
            var tgl = $(e.relatedTarget).data('tgl');

            var stgl = tgl.split('-');
            $('#judul').text(':  ' + judul);
            $('#mapel').text(':  ' + namamapel);
            $('#kelas').text(':  ' + namakelas);
            $('#jadwal').text(stgl[1] === undefined ? ': Pilih tanggal di bawah' : ':  ' + stgl[2] + '-' + stgl[1] + '-' + stgl[0]);

            $('#id_materi').val(id_materi);
            $('#jadwal_tugas').val(tgl);
            $('#id_mapel').val(mapel);
            $('#id_kelas').val(kelas);

            var arrJadwal = [];

            $.ajax({
                method: 'POST',
                url: base_url + 'kelastugas/dataaddjadwal?mapel=' + mapel + '&kelas=' + kelas,
                //data: {id_mapel: mapel, id_kelas: [kelas]},
                success: function (data) {
                    console.log('result', data);
                    var mapel = data.mapel;
                    for (let i = 0; i < mapel.length; i++) {
                        arrJadwal.push(mapel[i].id_hari);
                    }

                    let today = new Date();
                    let currentMonth = today.getMonth();
                    let currentYear = today.getFullYear();

                    var terisi = [];
                    $.each(data.terisi, function (key, value) {
                        terisi.push(value.jadwal_tugas)
                    });

                    initCalendar(terisi, tgl, currentMonth, currentYear, arrJadwal, function (y, m, d) {
                        console.log('callback', y + '-' + m + '-' + d);
                        $('#jadwal').text(':  ' + d + '-' + m + '-' + y);
                        $('#jadwal_tugas').val(y + '-' + m + '-' + d);
                    });
                }
            });
        });

        $('#editjadwal').submit(function (e) {
            e.stopPropagation();
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: base_url + 'kelastugas/savejadwal',
                data: $(this).serialize(),
                success: function (data) {
                    console.log(data);
                    $('#editJadwalModal').modal('hide').data('bs.modal', null);
                    $('#editJadwalModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    if (data) {
                        showSuccessToast(data.status)
                    } else {
                        showDangerToast(data.status);
                    }
                    location.reload();
                }, error: function (data) {
                    showDangerToast('Gagal membuat jadwal');
                    console.log(data);
                }
            });

        });

        $('#delete-all').on('click', function (e) {
            var ids = <?= json_encode($arrIds) ?>;
            var dataPost = $('#up').serialize() + '&ids=' + JSON.stringify(ids);
            console.log(dataPost);
            var count = $(this).data('count');
            if (count > 0) {
                swal.fire({
                    title: "Hapus Semua Tugas?",
                    text: count + " tugas akan dihapus",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Hapus Semua"
                }).then(result => {
                    if (result.value) {
                        $.ajax({
                            url: base_url + 'kelastugas/deletealltugas',
                            type: "POST",
                            data: dataPost,
                            success: function (respon) {
                                if (respon) {
                                    swal.fire({
                                        title: "Berhasil",
                                        text: count + " Tugas berhasil dihapus",
                                        icon: "success"
                                    }).then(result => {
                                        if (result.value) {
                                            window.location.href = base_url + 'kelastugas?id=' + idGuru;
                                        }
                                    })
                                } else {
                                    swal.fire({
                                        title: "Gagal",
                                        text: "Tidak bisa menghapus tugas",
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
                    title: "Tugas Kosong",
                    text: "Tidak ada tugas yang bisa dihapus",
                    icon: "info"
                });
            }
        });

    });

    function aktifkanTugas(id, status) {
        function aktifkan() {
            $.ajax({
                url: base_url + 'kelastugas/aktifkantugas',
                data: {id_materi: id, method: status},
                type: "POST",
                success: function (respon) {
                    if (respon.status) {
                        swal.fire({
                            title: "Berhasil",
                            text: status === '0' ? "data berhasil diaktifkan" : "data berhasil dinonaktifkan",
                            icon: "success"
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + 'kelastugas?id=' + idGuru;
                            }
                        })
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

        if (status === '1') {
            swal.fire({
                title: "Anda yakin?",
                text: "Tugas akan dinonaktifkan!",
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
            text: "Tugas akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'kelastugas/hapustugas',
                    data: {id_materi: id},
                    type: "POST",
                    success: function (respon) {
                        if (respon.status) {
                            swal.fire({
                                title: "Berhasil",
                                text: "Tugas berhasil dihapus",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.href = base_url + 'kelastugas?id=' + idGuru;
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
            title: "Copi Tugas?",
            text: "Tugas ini akan dicopy",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Copy"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'kelastugas/copytugas/' + id,
                    type: "GET",
                    success: function (respon) {
                        if (respon) {
                            swal.fire({
                                title: "Berhasil",
                                text: "Tugas berhasil dicopy",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.href = base_url + 'kelastugas?id=' + idGuru;
                                }
                            })
                        } else {
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa mengcopy tugas",
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
