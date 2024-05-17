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
            $days = [0, 1, 2, 3, 4, 5, 6];
            $disabledDay = [];
            foreach ($jadwal_mapel as $km => $vm) {
                foreach ($vm as $kk => $vk) {
                    $disabledDay[$km][$kk] = $days;
                    foreach ($vk as $ih) {
                        unset($disabledDay[$km][$kk][$ih->id_hari]);
                    }
                }
            }
            ?>
            <div class="card card-default my-shadow mb-4 <?= count($jadwal_mapel) > 0 ? '' : 'd-none' ?>">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                    <div class="card-tools">
                        <a href="<?= base_url('kelasmateri/' . $urlJenis . '?id=' . $id_guru) ?>" type="button"
                           onclick=""
                           class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </a>
                        <a href="<?= base_url('kelasmateri/add/' . $jenis) ?>" type="button"
                           class="btn btn-primary btn-sm ml-1">
                            <i class="fas fa-plus-circle"></i> Buat <?= $subjudul ?>
                        </a>
                        <button type="button" data-toggle="modal" data-target="#openAll<?= $subjudul ?>"
                                class="btn btn-sm btn-success"><i class="fa fa-copy"></i> Copy <?= $subjudul ?>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-info align-content-center" role="alert">
                        Untuk mengcopy <?= $subjudul ?> dari tahun atau semester sebelumnya <b>ke
                            TP <?= $tp_active->tahun ?>
                            SMT <?= $smt_active->nama_smt ?></b>,
                        <ul>
                            <?php if ($this->ion_auth->is_admin()) : ?>
                                <li>
                                    Pilih Nama Guru
                                </li>
                            <?php endif; ?>
                            <li>
                                Klik <b><i class="fa fa-copy"></i> Copy <?= $subjudul ?></b>
                            </li>
                            <li>
                                Klik Aksi <b>Copy</b> untuk <?= $subjudul ?> yang akan dicopy
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
                                    class="btn btn-sm btn-danger mb-3"><i class="fa fa-trash"></i> Hapus
                                Semua <?= $subjudul ?>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $arrIds = [];
                        if (count($curr_materi) > 0) :?>
                            <div class="col-12 table-responsive">
                                <table class="w-100 table table-bordered">
                                    <tr class="alert alert-success">
                                        <th rowspan="2" class="text-center align-middle">No.</th>
                                        <th rowspan="2" class="text-center align-middle">Guru<br>Mapel</th>
                                        <th colspan="3" class="text-center align-middle"><?= $subjudul ?></th>
                                        <th rowspan="2" class="text-center align-middle" style="width: 200px">Tanggal
                                        </th>
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
                                        $arr = unserialize($value->materi_kelas ?? '');
                                        $arrIds[] = $value->id_materi;
                                        $rows = count($arr) > 1 ? count($arr) : '1';
                                        ?>
                                        <tr>
                                            <td rowspan="<?= $rows ?>" class="text-center align-middle"><?= $no ?></td>
                                            <td rowspan="<?= $rows ?>" class="align-middle">
                                                <?= $value->nama_guru ?><br><b><?= $value->kode ?></b>
                                            </td>
                                            <td rowspan="<?= $rows ?>"
                                                class="align-middle"><?= $value->kode_materi ?></td>
                                            <td rowspan="<?= $rows ?>"
                                                class="align-middle"><?= $value->judul_materi ?></td>
                                            <td class="text-center align-middle">
                                                <b><?= isset($kelas_materi[$value->id_materi]) && isset($kelas_materi[$value->id_materi][$arr[0]])
                                                        ? $kelas_materi[$value->id_materi][$arr[0]]
                                                        : '' ?></b>
                                            </td>
                                            <td class="align-middle text-center">
                                                <?php
                                                $arrtgl = '';
                                                $disableDates = [];
                                                if (isset($jadwal_materi[$value->id_materi][$arr[0]])) {
                                                    if (count($jadwal_materi[$value->id_materi][$arr[0]]) > 0) {
                                                        foreach ($jadwal_materi[$value->id_materi][$arr[0]] as $jtgl) {
                                                            $disabledBtn = $jtgl->jml_siswa == '0' ? '' : 'disabled';
                                                            $disableDates[] = $jtgl->jadwal_materi;
                                                            $sisa = strlen($jtgl->id_kjm ?? '') - (strlen($jtgl->id_kelas ?? '') + 10);
                                                            $len = $sisa === 3 ? 2 : 1;
                                                            $jam = substr($jtgl->id_kjm, strlen($jtgl->id_kjm ?? '') - $sisa, $len);
                                                            $ctgl = singkat_tanggal(date('d M Y', strtotime($jtgl->jadwal_materi)));
                                                            $arrtgl .= '<div class="m-1"><span class="bg-circle bg-gray-light border text-sm">' . $ctgl . ' jam:' . $jam
                                                                . '<button class="btn btn-sm" data-tgl="' . $ctgl . '" data-id="' . $jtgl->id_kjm . '" onclick="hapusTgl(this)" ' . $disabledBtn
                                                                . '><i class="fa fa-times-circle-o"></i></button></span></div>';
                                                        }
                                                    }
                                                }
                                                ?>
                                                <?= $arrtgl ?>
                                                <button class="btn btn-sm btn-default m-2"
                                                        data-toggle="modal"
                                                        data-target="#openCalendar"
                                                        data-dis="<?= implode(',', $disableDates) ?>"
                                                        data-jenis="<?= $jenis ?>"
                                                        data-materi="<?= $value->id_materi ?>"
                                                        data-mapel="<?= $value->id_mapel ?>"
                                                        data-kelas="<?= $arr[0] ?>">
                                                    <i class="fa fa-calendar-check-o"></i>
                                                </button>
                                            </td>
                                            <?php
                                            $stt = $value->status == '1' ? 'Aktif' : 'Non Aktif';
                                            $btn_bg = $value->status == '1' ? 'bg-success' : 'bg-warning';
                                            ?>
                                            <td rowspan="<?= $rows ?>" class="text-center align-middle">
                                                <button
                                                        class="btn btn-xs <?= $btn_bg ?>"
                                                        onclick="aktifkanMateri(<?= $value->id_materi ?>, <?= $value->status ?>)">
                                                    <?= $stt ?>
                                                </button>
                                            </td>
                                            <td rowspan="<?= $rows ?>" class="text-center align-middle">
                                                <a type="button" class="btn btn-sm btn-warning"
                                                   title="Edit <?= $subjudul ?>"
                                                   href="<?= base_url('kelasmateri/add/' . $jenis . '/' . $value->id_materi) ?>">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <button onclick="hapus(<?= $value->id_materi ?>)" type="button"
                                                        class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                        title="Hapus <?= $subjudul ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php for ($k = 1; $k < count($arr); $k++) : ?>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <b><?= isset($kelas_materi[$value->id_materi]) && isset($kelas_materi[$value->id_materi][$arr[$k]])
                                                        ? $kelas_materi[$value->id_materi][$arr[$k]]
                                                        : '' ?></b>
                                            </td>
                                            <td class="align-middle text-center">
                                                <?php
                                                $arrtgl = '';
                                                $disableDates = [];
                                                if (isset($jadwal_materi[$value->id_materi][$arr[$k]])) {
                                                    if (count($jadwal_materi[$value->id_materi][$arr[$k]]) > 0) {
                                                        foreach ($jadwal_materi[$value->id_materi][$arr[$k]] as $jtgl) {
                                                            $disabledBtn = $jtgl->jml_siswa == '0' ? '' : 'disabled';
                                                            $disableDates[] = $jtgl->jadwal_materi;
                                                            $ctgl = singkat_tanggal(date('d M Y', strtotime($jtgl->jadwal_materi)));
                                                            $arrtgl .= '<div class="m-1"><span class="bg-circle bg-gray-light border text-sm">' . $ctgl
                                                                . '<button class="btn btn-sm" data-tgl="' . $ctgl . '" data-id="' . $jtgl->id_kjm . '" onclick="hapusTgl(this)" ' . $disabledBtn . '><i class="fa fa-times-circle-o"></i></button></span></div>';
                                                        }
                                                    }
                                                }
                                                ?>
                                                <?= $arrtgl ?>
                                                <button class="btn btn-default"
                                                        data-toggle="modal"
                                                        data-target="#openCalendar"
                                                        data-dis="<?= implode(',', $disableDates) ?>"
                                                        data-jenis="<?= $jenis ?>"
                                                        data-materi="<?= $value->id_materi ?>"
                                                        data-mapel="<?= $value->id_mapel ?>"
                                                        data-kelas="<?= $arr[$k] ?>">
                                                    <i class="fa fa-calendar-check-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endfor;
                                        $no++; endforeach; ?>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="col-12 p-0">
                                <div class="alert alert-default-warning align-content-center" role="alert">
                                    Belum ada <?= $subjudul ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div id="loading" class="overlay d-none">
                    <div class="spinner-grow"></div>
                </div>
            </div>
            <div class="card card-default my-shadow mb-4 <?= count($jadwal_mapel) == 0 ? '' : 'd-none' ?>">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                </div>
                <div class="card-body">
                    <div class="col-12 p-0">
                        <div class="alert alert-default-warning align-content-center" role="alert">
                            Jadwal Pelajaran belum diatur
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="openAll<?= $subjudul ?>" tabindex="-1" role="dialog"
     aria-labelledby="open<?= $subjudul ?>Label"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="open<?= $subjudul ?>Label">Semua <?= $subjudul ?></h5>
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
                            $arr = unserialize($am->materi_kelas ?? '');
                            $skelas = '';
                            for ($i = 0; $i < count($arr); $i++) {
                                $skelas .= $kelas[$arr[$i]] ?? "-";
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

<div class="modal fade" id="openCalendar" tabindex="-1" role="dialog" aria-labelledby="openCalendarLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="openCalendarLabel">Tanggal Mulai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center p-0">
                <div id="tgl"></div>
                <hr>
                <div id="empty" class="d-none"><p>Jadwal Pelajaran belum diatur</p></div>
                <?= form_open('', array('id' => 'set-jadwal')) ?>
                <div id="form-tgl" class="m-3">
                    <input class="d-none" type="text" name="id_kelas" value="">
                    <input class="d-none" type="text" name="jenis" value="">
                    <input class="d-none" type="text" name="id_materi" value="">
                    <input class="d-none" type="text" name="id_mapel" value="">
                    <input class="d-none" type="text" name="jadwal_materi" value="">
                    <div class="row align-items-center">
                        <span class="col-3 text-bold">Jam Ke:</span>
                        <select id="jam-ke" name="jam_ke" class="form-control col-6" required="">
                            <option>
                                Pilih tanggal dulu
                            </option>
                        </select>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-id="cancel" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btn-result" disabled
                        data-id="ok" onclick="simpanTgl(this)">Simpan
                </button>
            </div>
        </div>
    </div>
</div>

<?= form_open('', array('id' => 'up')) ?>
<?= form_close() ?>

<script src="<?= base_url() ?>/assets/plugins/pignose/js/pignose.calendar.full.js"></script>
<script>
    var jmlGuru = <?=count($gurus)?>;
    var idGuru = '<?=$id_guru?>';
    var subjudul = '<?=$subjudul?>';
    var urlJenis = '<?=$jenis == "1" ? "materi" : "tugas"?>';
    var jenis = '<?=$jenis?>';
    const mapelJam = JSON.parse('<?= json_encode($tanggal_jadwal) ?>');
    const thn = JSON.parse('<?= json_encode($tp_active) ?>');
    const smt = JSON.parse('<?= json_encode($smt_active) ?>');
    const days = JSON.parse('<?= json_encode($disabledDay) ?>');
    $(document).ready(function () {
        ajaxcsrf();

        function getMateriGuru() {
            window.location.href = base_url + 'kelasmateri/' + urlJenis + '?id=' + idGuru;
        }
        $('#guru').select2();
        $('#guru option[value="0"]').attr("disabled", "disabled");
        //if (jmlGuru > 1) $('#guru').append('<option value="0">SEMUA GURU</option>');

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
                    html: count + " " + subjudul + " akan dihapus<br>Pastikan semua siswa yang mengerjakan sudah mendapat nilai",
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
                                            window.location.href = base_url + 'kelasmateri/' + urlJenis + '?id=' + idGuru;
                                        }
                                    })
                                } else {
                                    swal.fire({
                                        title: "Gagal",
                                        text: "Tidak bisa menghapus " + urlJenis,
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

        $('#openCalendar').on('show.bs.modal', function (e) {
            const idJenis = $(e.relatedTarget).data('jenis');
            const idMateri = $(e.relatedTarget).data('materi');
            const idMapel = $(e.relatedTarget).data('mapel');
            const idKelas = $(e.relatedTarget).data('kelas');
            var disabledDates = $(e.relatedTarget).data('dis');

            $("input[name='id_kelas']").val(idKelas);
            $("input[name='id_mapel']").val(idMapel);
            $("input[name='id_materi']").val(idMateri);
            $("input[name='jenis']").val(idJenis);
            //$("input[name='jam_ke']").val(jamke);

            if (days[idMapel] === undefined || days[idMapel][idKelas] === undefined) {
                $('#empty').removeClass('d-none');
                $('.xdsoft_datetimepicker').addClass('d-none');
                $('#btn-result').attr('disabled', '');
            } else {
                var dis = days[idMapel][idKelas];
                $('#empty').addClass('d-none');
                $('.xdsoft_datetimepicker').removeClass('d-none');
                $('#btn-result').removeAttr('disabled');
                var values = Object.keys(dis).map(function (key) {
                    return dis[key];
                });
                //let today = new Date().toISOString().slice(0, 10);
                //$("input[name='jadwal_materi']").val(oldTime);

                $('#tgl').pignoseCalendar({
                    lang: 'id',
                    //date: moment(oldTime),
                    format: 'YYYY-MM-DD',
                    select: onSelectHandler,
                    disabledWeekdays: values,
                    //disabledDates: disabledDates.split(',')
                });
            }

            function onSelectHandler(date, context) {
                console.log('selected', new Date(date[0]).getDay());
                //console.log(date[0].format('YYYY-MM-DD'));
                $('#jam-ke').html('');
                var vals = mapelJam[idMapel][idKelas][new Date(date[0]).getDay()];
                console.log('selected', vals);
                var values = '';
                $.each(vals, function (ind, val) {
                    values += '<option value="' + val + '">' + val + '</option>';
                });
                $('#jam-ke').html(values);

                $("input[name='jadwal_materi']").val(date[0].format('YYYY-MM-DD'));
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
            html: subjudul + " akan dihapus!<br>Pastikan semua siswa yang mengerjakan sudah mendapat nilai",
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
                                    window.location.href = base_url + 'kelasmateri/' + urlJenis + '?id=' + idGuru;
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
                                    window.location.href = base_url + 'kelasmateri/' + urlJenis + '?id=' + idGuru;
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

    function simpanTgl(btn) {
        // id_kjm = kls + tp + smt +
        // $tanggal.replaceAll("-", "") + jamke + jenis
        console.log('post', $('#set-jadwal').serialize());
        $('#openCalendar').modal('hide').data('bs.modal', null);
        $('#openCalendar').on('hidden', function () {
            $(this).data('modal', null);
        });
        $('#tgl').html('');

        $('#loading').removeClass('d-none');
        $.ajax({
            url: base_url + "kelasmateri/savejadwal",
            type: "POST",
            data: $('#set-jadwal').serialize(),
            success: function (data) {
                console.log("result", data);
                $('#loading').addClass('d-none');
                if (data) {
                    swal.fire({
                        title: "Sukses",
                        text: "Jadwal materi berhasil disimpan",
                        icon: "success",
                        showCancelButton: false,
                    }).then(result => {
                        if (result.value) {
                            window.location.reload();
                        }
                    });
                } else {
                    swal.fire({
                        title: "ERROR",
                        text: "Jadwal materi gagal disimpan",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            }, error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
                swal.fire({
                    title: "ERROR",
                    text: "Jadwal materi gagal disimpan",
                    icon: "error",
                    showCancelButton: false,
                });
            }
        });
    }

    function hapusTgl(btn) {
        swal.fire({
            title: "Anda yakin?",
            html: "Jadwal pada tanggal <b>" + $(btn).data('tgl') + "</b> akan diahpus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
                $('#loading').removeClass('d-none');
                $.ajax({
                    url: base_url + "kelasmateri/hapusjadwal/" + $(btn).data('id'),
                    type: "GET",
                    success: function (data) {
                        console.log("result", data);
                        $('#loading').addClass('d-none');
                        if (data) {
                            swal.fire({
                                title: "Sukses",
                                text: "Jadwal materi berhasil dihapus",
                                icon: "success",
                                showCancelButton: false,
                            }).then(result => {
                                if (result.value) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            swal.fire({
                                title: "ERROR",
                                text: "Jadwal materi gagal dihapus",
                                icon: "error",
                                showCancelButton: false,
                            });
                        }
                    }, error: function (xhr, status, error) {
                        console.log("error", xhr.responseText);
                        swal.fire({
                            title: "ERROR",
                            text: "Jadwal materi gagal dihapus",
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                });
            }
        });
    }

</script>
