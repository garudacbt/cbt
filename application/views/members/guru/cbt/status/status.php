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
            <div class="d-sm-flex justify-content-between mb-2">
                <h1><?= $judul ?></h1>
                <button onclick="window.history.back();" type="button" class="btn btn-sm btn-danger float-right">
                    <i class="fas fa-arrow-circle-left"></i><span
                            class="d-none d-sm-inline-block ml-1">Kembali</span>
                </button>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                    <button class="card-tools btn btn-default btn-sm mr-2 btn-toggle" data-toggle="modal"
                            data-target="#infoModal"><i class="fas fa-info-circle mr-1"></i> Info Error
                    </button>
                </div>
                <?php
                $dnone = in_array($guru->id_guru, $ids_pengawas) ? '' : 'd-none';
                ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-center">TOKEN</span>
                                </div>
                                <input id="token-input" class="form-control text-bold text-center" readonly="readonly"/>
                                <div class="input-group-append" id="kolom-kanan">
                                    <span id="interval" class="input-group-text text-xs d-none">-- : -- : --</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" id="info">
                        <div class="col-md-5">
                            <div class="alert alert-default-success border-success">
                                <h6><i class="icon fas fa-check"></i> Info Ujian</h6>
                                <div id="info-ujian">
                                    <div class="row">
                                        <div class="col-4">Mapel</div>
                                        <div class="col-8">
                                            <b><?= $info->nama_mapel ?></b>
                                        </div>
                                        <div class="col-4">Guru</div>
                                        <div class="col-8">
                                            <b><?= $info->nama_guru ?></b>
                                        </div>
                                        <div class="col-4">Jenis Ujian</div>
                                        <div class="col-8">
                                            <b><?= $info->kode_jenis ?></b>
                                        </div>
                                        <div class="col-4">Jml. Soal</div>
                                        <div class="col-8">
                                            <b><?= ($info->tampil_pg + $info->tampil_kompleks) +
                                                ($info->tampil_jodohkan + $info->tampil_isian) +
                                                $info->tampil_esai ?></b>
                                        </div>
                                        <div class="col-4">Pengawas</div>
                                        <div class="col-8">
                                            <?php
                                            if (count($pengawas) > 0) :
                                            foreach ($pengawas as $p) : ?>
                                                <b><?= $p->nama_guru ?></b><br>
                                            <?php endforeach;
                                            else: ?>
                                            Tidak diatur
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="alert alert-default-info border-info">
                                <div id="info-penggunaan">
                                    <ul>
                                        <li>
                                            Gunakan tombol <span class="badge badge-success pt-1 pb-1"><i
                                                        class="fa fa-sync ml-1 mr-1"></i> Refresh</span>
                                            untuk merefresh halaman
                                        </li>
                                        <li>
                                            <b>RESET WAKTU.</b> Jika siswa logout sebelum selesai dan tidak melanjutkan
                                            sampai waktu ujian habis maka akan ditolak, jika ingin melanjutkan maka
                                            harus reset waktu.
                                        </li>
                                        <li>
                                            Aksi <b>RESET IZIN</b> untuk mengizinkkan siswa mengerjakan ujian di
                                            perangkat berbeda.
                                        </li>
                                        <li>
                                            Aksi <b>PAKSA SELESAI</b> untuk memaksa siswa menyelesaikan ujian.
                                        </li>
                                        <li>
                                            Aksi <b>ULANG</b> untuk mengulang ujian siswa dari awal.
                                        </li>
                                        <li>
                                            <span class="badge badge-success"><i class="fa fa-check ml-1 mr-1"></i> Terapkan Aksi</span>
                                            untuk menerapkan aksi terpilih ke setiap siswa yang dipilih
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-success align-bottom mb-2"
                                    onclick="refreshStatus()"
                                    data-toggle="tooltip"
                                    title="Refresh">
                                <i class="fa fa-sync ml-1 mr-1"></i> Refresh
                            </button>
                            <div class="float-right align-bottom mb-2">
                                <label><input type="search" id="cari-status-siswa"
                                              class="form-control form-control-sm" placeholder="Cari">
                                </label>
                                <button type="button" class="ml-2 btn btn-success <?= $dnone ?>"
                                        onclick="terapkanAksi()"
                                        data-toggle="tooltip"
                                        title="Terapkan Aksi pada siswa terpilih">
                                    <i class="fa fa-check ml-1 mr-1"></i> Terapkan Aksi
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (count($siswa) > 0) : ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table-status">
                            <thead class="alert-light">
                            <tr>
                                <th rowspan="2" class="text-center align-middle" width="40">No.</th>
                                <th rowspan="2" class="text-center align-middle" width="100">No. Peserta</th>
                                <th rowspan="2" class="text-center align-middle">Nama</th>
                                <th rowspan="2" class="text-center align-middle">Kelas</th>
                                <th rowspan="2" class="text-center align-middle">Ruang</th>
                                <th rowspan="2" class="text-center align-middle">Sesi</th>
                                <th colspan="2" class="text-center align-middle">Status</th>
                                <th rowspan="2" class="text-center align-middle <?=$dnone?>">Reset<br>Waktu</th>
                                <th colspan="3" class="text-center align-middle <?=$dnone?>">Aksi</th>
                            </tr>
                            <tr>
                                <th class="text-center align-middle p-1">Mulai</th>
                                <th class="text-center align-middle">Durasi</th>
                                <th class="text-center align-middle <?=$dnone?>">Reset<br>Izin<br><input id="input-reset-all" class="check" type="checkbox"></th>
                                <th class="text-center align-middle <?=$dnone?>">Paksa<br>Selesai<br><input id="input-force-all" class="check" type="checkbox"></th>
                                <th class="text-center align-middle <?=$dnone?>">Ulang<br><input id="input-ulang-all" class="check" type="checkbox"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for ($i = 0; $i < count($siswa); $i++) :
                                $idSiswa = $siswa[$i]->id_siswa;
                                $durasis = json_decode(json_encode($durasi_siswa[$idSiswa]));
                                $durasi = $durasis->dur != null ? $durasis->dur->lama_ujian : ' - -';
                                $logging = $durasis->log;
                                $mulai = '- -  :  - -';
                                $selesai = '- -  :  - -';
                                $reset = null;
                                $pattern = '/[- :]/';
                                foreach ($logging as $log) {
                                    if ($log->log_type === '1') {
                                        if ($log != null) {
                                            $reset = $log->reset;
                                            $t = preg_split($pattern, $log->log_time);
                                            $mulai = $t[3] . ':' . $t[4];
                                        }
                                    } else {
                                        if ($log != null) {
                                            $ti = preg_split($pattern, $log->log_time);
                                            $selesai = $ti[3] . ':' . $ti[4];
                                        }
                                    }
                                }

                                $belumUjian = $durasis->dur == null;
                                $sudahSelesai = !$belumUjian && $durasis->dur->selesai != null;
                                $loading = $belumUjian ? '' : ($sudahSelesai ? "" : '<i class="fa fa-spinner fa-spin mr-2"></i>');

                                $disabledReset = !$sudahSelesai && $reset != null && $reset == '0' ? '' : 'disabled';
                                $disabledSelesai = !$sudahSelesai && !$belumUjian ? '' : 'disabled';
                                $disabledUlang = $belumUjian ? 'disabled' : ($sudahSelesai ? '' : 'disabled');

                                // jika ingin selalu aktif
                                // $disabledReset = '';
                                // $disabledSelesai = '';
                                // $disabledUlang = '';

                                $sesi = $siswa[$i]->kode_sesi;
                                $ruang = $siswa[$i]->kode_ruang;
                                $kelas = $siswa[$i]->kode_kelas;
                                ?>
                                <tr data-id="<?=$idSiswa?>">
                                    <td class="text-center align-middle"><?=($i + 1) ?></td>
                                    <td class="text-center align-middle"><?=$siswa[$i]->nomor_peserta ?></td>
                                    <td class="align-middle"><?=$siswa[$i]->nama ?></td>
                                    <td class="text-center align-middle"><?=$kelas ?></td>
                                    <td class="text-center align-middle"><?=$ruang ?></td>
                                    <td class="text-center align-middle"><?=$sesi ?></td>
                                    <td class="text-center align-middle"><?=$mulai ?></td>
                                    <td class="text-center align-middle"><?=$loading . $durasi ?></td>
                                    <td class="text-center align-middle <?=$dnone?>">
                                        <button type="button" class="btn btn-default"
                                        data-siswa="<?=$idSiswa ?>" data-jadwal="<?= $info->id_jadwal ?>"
                                        data-toggle="modal" data-target="#resetModal" <?=$disabledReset?>>
                                        <i class="fa fa-refresh"></i></button>
                                    </td>
                                    <td class="text-center text-success align-middle <?=$dnone?>">
                                        <input class="check input-reset" type="checkbox" <?=$disabledReset?>>
                                    </td>
                                    <td class="text-center text-danger align-middle <?=$dnone?>">
                                        <input class="check input-force" type="checkbox" <?=$disabledSelesai?>>
                                    </td>
                                    <td class="text-center text-danger align-middle <?=$dnone?>">
                                        <input class="check input-ulang" type="checkbox" <?=$disabledUlang?>>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <hr />
                    <div class="alert alert-default-danger border-danger">
                        Tidak ada siswa yang tergabung dalam jadwal ujian ini
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('', array('id' => 'reset')) ?>
<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetLabel">Reset Waktu Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="icheck-success">
                        <input class="radio" type="radio" name="reset" id="reset1" value="1">
                        <label for="reset1">Reset Waktu dari awal</label>
                    </div>
                    <div class="icheck-success">
                        <input class="radio" type="radio" name="reset" id="reset2" value="2">
                        <label for="reset2">Lanjutkan sisa waktu</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">OK</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoLabel">Kode error siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table w-100">
                    <tr>
                        <td class="text-bold">001</td>
                        <td>:</td>
                        <td>Token salah atau token belum digenerate</td>
                    </tr>
                    <tr>
                        <td class="text-bold">002</td>
                        <td>:</td>
                        <td>Harus reset izin</td>
                    </tr>
                    <tr>
                        <td class="text-bold">003</td>
                        <td>:</td>
                        <td>Harus reset waktu</td>
                    </tr>
                    <tr>
                        <td class="text-bold">004</td>
                        <td>:</td>
                        <td>Soal belum dibuat atau belum dipilih</td>
                    </tr>
                    <tr>
                        <td class="text-bold">005</td>
                        <td>:</td>
                        <td>Siswa menggunakan browser yang tidak mendukung</td>
                    </tr>
                    <tr>
                        <td class="text-bold">006</td>
                        <td>:</td>
                        <td>internet down atau error dari database/server</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>/assets/plugins/multiselect/js/jquery.quicksearch.js"></script>

<script>
    var isPengawas = '<?= in_array($guru->id_guru, $ids_pengawas) ? "1" : "0"?>';
    var jadwal = '<?=$info->id_jadwal?>'
    var dnone = isPengawas == "1" ? '' : 'd-none';

    function terapkanAksi() {
        const $rows = $('#table-status').find('tr'), headers = $rows.splice(0, 2);
        let item = {};
        item ["reset"] = [];
        item ["force"] = [];
        item ["log"] = [];
        item ["ulang"] = [];
        item ["hapus"] = [];
        $rows.each((i, row) => {
            var siswa_id = $(row).attr("data-id");

            const $colReset = $(row).find('.input-reset');
            const $colForce = $(row).find('.input-force');
            const $colUlang = $(row).find('.input-ulang');
            if ($colReset.prop("checked") === true) {
                item ["reset"].push(siswa_id + '0' + jadwal + '1');
                //item ["id_logs"].push(siswa_id+''+jadwal);
            }
            if ($colForce.prop("checked") === true) {
                item ["force"].push(siswa_id + '0' + jadwal);
                item ["log"].push(siswa_id);
            }
            if ($colUlang.prop("checked") === true) {
                item ["ulang"].push(siswa_id);
                item ["hapus"].push(siswa_id + '0' + jadwal);
            }
        });

        var dataSiswa = $('#reset').serialize() + '&jadwal=' + jadwal + "&aksi=" + JSON.stringify(item);
        console.log(dataSiswa);

        var jmlReset = item.reset.length === 0 ? '' : '<b>' + item.reset.length + '</b> siswa akan direset<br>';
        var jmlForce = item.force.length === 0 ? '' : '<b>' + item.force.length + '</b> siswa akan dipaksa selesai<br>';
        var jmlUlang = item.ulang.length === 0 ? '' : '<b>' + item.ulang.length + '</b> siswa akan mengulang ujian';

        if (item.reset.length === 0 && item.force.length === 0 && item.ulang.length === 0) {
            showWarningToast('Silahkan pilih AKSI');
            return;
        }

        swal.fire({
            title: "Terapkan Aksi",
            html: jmlReset + jmlForce + jmlUlang,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Apply"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + "siswa/applyaction",
                    type: 'POST',
                    data: dataSiswa,
                    success: function (data) {
                        //console.log(data);
                        window.location.reload()
                    }, error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });

    }

    function refreshStatus() {
        $('#cari-status-siswa').val('')
        window.location.reload()
    }

    $(document).ready(function () {
        var idSiswa = '';
        var idJadwal = '';

        $('#cari-status-siswa').quicksearch('#table-status tbody tr');

        $('#resetModal').on('show.bs.modal', function (e) {
            idSiswa = $(e.relatedTarget).data('siswa');
            idJadwal = $(e.relatedTarget).data('jadwal');

            console.log('siswa:' + idSiswa, 'jadwal:' + idJadwal);
        });

        $('#reset').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            $('#resetModal').modal('hide').data('bs.modal', null);
            $('#resetModal').on('hidden', function () {
                $(this).data('modal', null);
            });

            $.ajax({
                url: base_url + "siswa/resettimer",
                type: 'POST',
                data: $(this).serialize() + '&id_durasi=' + idSiswa + '0' + idJadwal,
                success: function (data) {
                    console.log(data.status);
                    if (data.status) refreshStatus();
                    else showDangerToast('tidak bisa mereset waktu');
                }, error: function (xhr, status, error) {
                    console.log('error');
                }
            });
        });

        $('#kolom-kanan').html('<button class="btn btn-default" id="refresh-token"><i class="fa fa-refresh"></i> </button>');

        getToken(function (result) {
            getGlobalToken();
        });

        $('#refresh-token').click(function () {
            getToken(function (result) {
                getGlobalToken();
            });
        });

        function getGlobalToken() {
            if (globalToken != null) {
                const viewToken = $('#token-input');
                if (viewToken.length) viewToken.val(globalToken.token);
                if (globalToken.auto == '1' && adaJadwalUjian != '0') {
                    $('#refresh-token').removeClass('d-none')
                }
            }
        }

        $("#input-reset-all").on("click", function () {
            if (this.checked) {
                $(".input-reset").each(function () {
                    if (!$(this).prop('disabled')) {
                        this.checked = true;
                    }
                    $("#input-reset-all").prop("checked", true);
                });
            } else {
                $(".input-reset").each(function () {
                    if (!$(this).prop('disabled')) {
                        this.checked = false;
                    }
                    $("#input-reset-all").prop("checked", false);
                });
            }
        });

        $("#input-force-all").on("click", function () {
            if (this.checked) {
                $(".input-force").each(function () {
                    if (!$(this).prop('disabled')) {
                        this.checked = true;
                    }
                    $("#input-force-all").prop("checked", true);
                });
            } else {
                $(".input-force").each(function () {
                    if (!$(this).prop('disabled')) {
                        this.checked = false;
                    }
                    $("#input-force-all").prop("checked", false);
                });
            }
        });

        $("#input-ulang-all").on("click", function () {
            if (this.checked) {
                $(".input-ulang").each(function () {
                    if (!$(this).prop('disabled')) {
                        this.checked = true;
                    }
                    $("#input-ulang-all").prop("checked", true);
                });
            } else {
                $(".input-ulang").each(function () {
                    if (!$(this).prop('disabled')) {
                        this.checked = false;
                    }
                    $("#input-ulang-all").prop("checked", false);
                });
            }
        });
    });

</script>
