<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */

function sortir($a, $b)
{
    return strcmp($a->tgl_mulai, $b->tgl_mulai) * -1;
}

function my_array_unique($array, $keep_key_assoc = false)
{
    $duplicate_keys = array();
    $tmp = array();

    foreach ($array as $key => $val) {
        // convert objects to arrays, in_array() does not support objects
        if (is_object($val))
            $val = (array)$val;

        if (!in_array($val['id_jadwal'], $tmp))
            $tmp[] = $val['id_jadwal'];
        else
            $duplicate_keys[] = $key;
    }

    foreach ($duplicate_keys as $key)
        unset($array[$key]);

    return $keep_key_assoc ? $array : array_values($array);
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
                    <h6 class="card-title"><?= $subjudul ?></h6>
                </div>
                <div class="card-body">
                    <div class="row" id="konten">
                        <?php
                        $rekaps = my_array_unique($rekaps);

                        if (count($rekaps) === 0) : ?>
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
                        <?php else: ?>
                        <div class="alert alert-default-info align-content-center w-100" role="alert">
                            INFO TABEL PENILAIAN
                            <ul>
                                <li>
                                    Tabel ini berisi Jadwal Ujian dan Bank Soal yang belum dihapus
                                </li>
                                <li>
                                    Lakukan Aksi <b>REKAP NILAI</b> agar nilai hasil siswa bisa diekspor dan diolah
                                </li>
                                <li>
                                    <b>REKAP NILAI</b> berguna untuk membackup nilai siswa agar bisa dibuka kapan saja
                                </li>
                                <li>
                                    <b>REKAP NILAI</b> hanya untuk jadwal penilaian yang sudah dilaksanakan
                                </li>
                                <li>
                                    Jadwal Penilaian yang sudah direkap bisa dihapus di menu <b>Jadwal Ujian</b> atau
                                    <b>Bank Soal</b>
                                </li>
                            </ul>
                        </div>

                        <?= $this->session->flashdata('rekapnilai') ?>

                        <div class="col-12 mb-3">
                            <button id="hapusterpilih" onclick="bulk_delete()" type="button"
                                    class="btn btn-outline-danger mr-1" data-toggle="tooltip" title="Hapus Terpilh"
                                    disabled="disabled"><i class="far fa-trash-alt"></i> Hapus Terpilih
                            </button>
                            <button id="rekapterpilih" onclick="bulk_rekap()" type="button"
                                    class="btn btn-outline-success mr-1" data-toggle="tooltip" title="Rekap Terpilh"
                                    disabled="disabled"><i class="fa fa-database"></i> Rekap Terpilih
                            </button>
                            <a href="<?= base_url('cbtrekap/export') ?>" type="button"
                               class="btn btn-success mr-1 float-right"><i class="fa fa-download"></i> <span
                                        class="d-none d-sm-inline-block ml-1">Ekspor Semua</a>
                        </div>
                    </div>
                    <table id="jadwal-bank" class="w-100 table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>
                                <div class="text-center">
                                    <input id="check-all" class="check-all" type="checkbox">
                                </div>
                            </th>
                            <th class="text-center align-middle p-0">No.</th>
                            <th>Bank Soal</th>
                            <th>Jenis</th>
                            <th>Mapel</th>
                            <th>Kelas</th>
                            <th>Pelaksanaan</th>
                            <th class="text-center align-middle p-0"><span>Nilai</span></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $urut = 1;
                        foreach ($rekaps as $jadwal) : ?>
                            <?php

                            $jk = json_decode(json_encode($jadwal->bank_kelas));
                            $jumlahKelas = $jadwal->bank_kelas == "" ? [] : json_decode(json_encode(unserialize($jk ?? '')));
                            //$jks = [];

                            $kelasbank = '';
                            $no = 1;
                            $id_kelases = [];
                            if (!empty($jumlahKelas)) {
                                foreach ($jumlahKelas as $j) {
                                    foreach ($kelases as $k) {
                                        if ($j->kelas_id === $k->id_kelas) {
                                            if ($no > 1) {
                                                $kelasbank .= ', ';
                                            }
                                            $kelasbank .= $k->nama_kelas;
                                            array_push($id_kelases, ['id' => $k->id_kelas, 'nama' => $k->nama_kelas]);
                                            $no++;
                                        }
                                    }
                                }
                            } else {
                                array_push($id_kelases, ['id' => 0, 'nama' => '']);
                            }
                            ?>
                            <tr>
                                <td class="align-middle">
                                    <div class="text-center">
                                        <input class="check" value="<?= $jadwal->id_jadwal ?>" type="checkbox">
                                    </div>
                                </td>
                                <td class="text-center align-middle"><?= $urut ?></td>
                                <td class="align-middle"><?= $jadwal->bank_kode ?></td>
                                <td class="align-middle"><?= $jadwal->kode_jenis ?></td>
                                <td class="align-middle"><?= $jadwal->kode ?></td>
                                <td class="align-middle"><?= $kelasbank ?></td>
                                <td class="align-middle"><?= singkat_tanggal(date('d M Y', strtotime($jadwal->tgl_mulai))) ?>
                                    sd <?= singkat_tanggal(date('d M Y', strtotime($jadwal->tgl_selesai))) ?></td>
                                <td class="text-center">
                                    <?php if (isset($jadwal->rekap)) :
                                        $sudah_rekap = isset($ada_rekap[$jadwal->id_jadwal]);
                                        if ($sudah_rekap) :?>
                                            <button class="btn btn-primary btn-sm"
                                                    onclick="backup(<?= $jadwal->id_jadwal ?>)">ULANGI REKAP
                                            </button>
                                            <a type="button" class="btn btn-success btn-sm"
                                               href="<?= base_url() . 'cbtrekap/olahnilai?jadwal=' . $jadwal->id_jadwal ?>">DETAIL</a>
                                        <?php else : ?>
                                            <button class="btn btn-primary btn-sm"
                                                    onclick="backup(<?= $jadwal->id_jadwal ?>)">REKAP NILAI
                                            </button>
                                        <?php endif; ?>
                                        <?php if (!$jadwal->hanya_pg) : ?>
                                        <br>
                                        <?php
                                        $badge_jenis = isset($koreksi[$jadwal->id_jadwal][1]) && $jadwal->mengerjakan == count($koreksi[$jadwal->id_jadwal][1]) ? 'badge-success' : 'badge-danger';
                                        ?>
                                        <span class="badge badge-btn <?= $badge_jenis ?>">
                                                <?= $jadwal->mengerjakan ?> mengerjakan,
                                                <?= isset($koreksi[$jadwal->id_jadwal][1]) ? count($koreksi[$jadwal->id_jadwal][1]) : '0' ?> dikoreksi
                                            </span>
                                    <?php endif; ?>
                                    <?php else : ?>
                                        <a type="button" class="btn btn-success btn-sm"
                                           href="<?= base_url() . 'cbtrekap/olahnilai?jadwal=' . $jadwal->id_jadwal ?>">DETAIL</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $urut++; endforeach;
                        endif; ?>
                        </tbody>
                    </table>

                </div>
                <div class="overlay d-none" id="loading-atas">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('', array('id' => 'bulk')) ?>
<?= form_close(); ?>

<script>
    function sortById(a, b) {
        var aID = a.id_mapel.toLowerCase();
        var bID = b.id_mapel.toLowerCase();
        return ((aID < bID) ? -1 : ((aID > bID) ? 1 : 0));
    }

    function bulk_delete() {
        const $rows = $('#jadwal-bank').find('tr'), headers = $rows.splice(0, 1); // header rows
        var jsonId = [];
        $rows.each((i, row) => {
            const $selected = $(row).find('.check:checked');
            if ($selected.val() != null) jsonId.push($selected.val());
        });

        const dataPost = $('#bulk').serialize() + '&ids=' + JSON.stringify(jsonId);
        console.log('post', dataPost);

        if ($("#jadwal-bank tbody tr .check:checked").length == 0) {
            swal.fire({
                title: "Gagal",
                text: "Tidak ada data yang dipilih",
                icon: "error"
            });
        } else {
            swal.fire({
                title: "Semua jadwal CBT terpilih akan dihapus!",
                html: "Semua nilai siswa dari jadwal yang terpilih juga akan dihapus!<br><span class='text-danger'><b>Pastikan anda telah mendownload semua nilai siswa</b></span>",
                //text: "Semua nilai siswa akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "YA, Hapus!"
            }).then(result => {
                if (result.value) {
                    swal.fire({
                        title: "Merekap Nilai Siswa",
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
                        url: base_url + 'cbtrekap/hapusrekap',
                        data: $('#bulk').serialize() + '&ids=' + JSON.stringify(jsonId),
                        type: "POST",
                        success: function (respon) {
                            console.log(respon);
                            if (respon.success) {
                                swal.fire({
                                    title: "Berhasil",
                                    text: respon.total + " jadwal CBT dan nilai siswa berhasil dihapus",
                                    icon: "success"
                                }).then(result => {
                                    if (result.value) {
                                        window.location.href = base_url + 'cbtrekap';
                                    }
                                })
                            } else {
                                swal.fire({
                                    title: "Gagal",
                                    text: "Tidak ada data yang dihapus",
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
    }

    function bulk_rekap() {
        const $rows = $('#jadwal-bank').find('tr'), headers = $rows.splice(0, 1); // header rows
        var jsonId = [];
        $rows.each((i, row) => {
            const $selected = $(row).find('.check:checked');
            if ($selected.val() != null) jsonId.push($selected.val());
        });

        const dataPost = $('#bulk').serialize() + '&ids=' + JSON.stringify(jsonId);
        console.log('post', dataPost);

        if ($("#jadwal-bank tbody tr .check:checked").length == 0) {
            swal.fire({
                title: "Gagal",
                text: "Tidak ada data yang dipilih",
                icon: "error"
            });
        } else {
            swal.fire({
                title: "Merekap Nilai Siswa",
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
                url: base_url + 'cbtrekap/bulkbackup',
                data: $('#bulk').serialize() + '&ids=' + JSON.stringify(jsonId),
                type: "POST",
                success: function (respon) {
                    console.log(respon);
                    window.location.href = base_url + 'cbtrekap';
                    /*
                    if (respon.rekap && respon.nilai > 0) {
                        swal.fire({
                            title: "Berhasil",
                            text: respon.total + " jadwal CBT dan nilai siswa berhasil direkap",
                            icon: "success"
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + 'cbtrekap';
                            }
                        })
                    } else {
                        swal.fire({
                            title: "Gagal",
                            text: respon.message,
                            icon: "error"
                        });
                    }
                    */
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
    }

    function backup(id) {
        $('#loading-atas').removeClass('d-none');
        setTimeout(function () {
            $.ajax({
                url: base_url + "cbtrekap/backupnilai/" + id,
                //url: base_url + "cbtrekap/generatenilaiujian/" + id,
                success: function (data) {
                    //$('#loading-atas').addClass('d-none');
                    console.log(data);
                    window.location.href = base_url + 'cbtrekap'
                    /*
                    if (data.rekap && data.nilai > 0) {
                    } else {
                        $('#loading-atas').addClass('d-none');
                        showDangerToast(data.message);
                    }
                    */
                }, error: function (xhr, status, error) {
                    $('#loading-atas').addClass('d-none');
                    console.log(xhr.responseText);
                    showDangerToast('Data error');
                }
            });
        }, 500);
    }

    $(document).ready(function () {
        ajaxcsrf();
        $("#jadwal-bank").DataTable({
            //paging: false,
            //ordering: false,
            info: false,
        });

        $("#flashdata").fadeTo(8000, 500).slideUp(500, function () {
            $("#flashdata").slideUp(500);
        });

        $("#check-all").on("click", function () {
            if (this.checked) {
                $(".check").each(function () {
                    this.checked = true;
                    $("#check-all").prop("checked", true);
                    $("#hapusterpilih").removeAttr("disabled");
                    $("#rekapterpilih").removeAttr("disabled");

                    //$("#hapusterpilih").css({ visibility: "visible" });
                    //$("#rekapterpilih").css({ visibility: "visible" });
                });
            } else {
                $(".check").each(function () {
                    this.checked = false;
                    $("#check-all").prop("checked", false);
                    $("#hapusterpilih").attr("disabled", "disabled");
                    $("#rekapterpilih").attr("disabled", "disabled");

                    //$("#hapusterpilih").css({ visibility: "hidden" });
                    //$("#rekapterpilih").css({ visibility: "hidden" });
                });
            }
        });

        $("#jadwal-bank tbody").on("click", "tr .check", function () {
            var check = $("#jadwal-bank tbody tr .check").length;
            var checked = $("#jadwal-bank tbody tr .check:checked").length;
            if (check === checked) {
                $("#check-all").prop("checked", true);
            } else {
                $("#check-all").prop("checked", false);
            }

            if (checked === 0) {
                $("#hapusterpilih").attr("disabled", "disabled");
                $("#rekapterpilih").attr("disabled", "disabled");
            } else {
                $("#hapusterpilih").removeAttr("disabled");
                $("#rekapterpilih").removeAttr("disabled");
            }
        });
    })
</script>
