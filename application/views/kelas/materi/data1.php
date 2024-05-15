<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/08/20
 * Time: 22:29
 */

$total = count($materi);
$all_materi = [];
foreach ($materi as $k => $m) {
    if ($m->id_tp != $tp_active->tahun && $m->id_smt != $smt_active->id_smt) {
        array_push($all_materi, $m);
        unset($materi[$k]);
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
            //var_dump($total);
            //var_dump(count($all_materi));
            //echo '<br>';
            //var_dump($kelas_materi);
            //var_dump($materi);
            //echo '</pre>';
            ?>
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                    <div class="card-tools">
                        <a href="<?= base_url('kelasmateri/getmateriguru?id=' . $id_guru) ?>" type="button" onclick=""
                           class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </a>
                        <a href="<?= base_url('kelasmateri/add') ?>" type="button" class="btn btn-primary btn-sm ml-1">
                            <i class="fas fa-plus-circle"></i> Buat materi
                        </a>
                        <button type="button" data-toggle="modal" data-target="#openAllMateri"
                                class="btn btn-sm btn-success"><i class="fa fa-copy"></i> Copy Materi
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-info align-content-center" role="alert">
                        Untuk mengcopy materi dari tahun atau semester sebelumnya <b>ke TP <?= $tp_active->tahun ?>
                            SMT <?= $smt_active->nama_smt ?></b>,
                        <ul>
                            <li>
                                Pilih Nama Guru
                            </li>
                            <li>
                                Klik <b><i class="fa fa-copy"></i> Copy Materi</b>
                            </li>
                            <li>
                                Klik Aksi <b>Copy</b> untuk materi yang akan dicopy
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <?php
                        $dnone = $this->ion_auth->is_admin() ? '' : 'd-none';
                        $left = $this->ion_auth->is_admin() ? 'text-right' : 'text-left';
                        $btnNone = count($materi) > 0 ? '' : 'd-none';
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
                        <!--
                        <div class="col-6 col-md-3 mb-4">
                            <select id="tahun" name="tahun" class="form-control">
                                <option value="" selected="selected" disabled="disabled">Pilih Tahun Pelajaran</option>
                                <?php foreach ($tp as $t) :
                            $sel = $id_tp_sel == $t->id_tp ? 'selected' : ''; ?>
                                    <option value="<?= $t->id_tp ?>" <?= $sel ?>><?= $t->tahun ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <select id="smt" name="smt" class="form-control">
                                <option value="" selected="selected" disabled="disabled">Pilih Semester</option>
                                <?php foreach ($smt as $s) :
                            $sel = $id_smt_sel == $s->id_smt ? 'selected' : ''; ?>
                                    <option value="<?= $s->id_smt ?>" <?= $sel ?>><?= $s->nama_smt ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        -->
                        <div class="col-6 <?= $left ?> <?= $btnNone ?>">
                            <button type="button" id="delete-all" data-count="<?= count($materi) ?>"
                                    class="btn btn-sm btn-danger mb-3"><i class="fa fa-trash"></i> Hapus Semua Materi
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $arrIds = [];
                        if (count($materi) > 0) :
                            foreach ($materi as $key => $value) :
                                $arr = unserialize($value->materi_kelas ?? '');
                                array_push($arrIds, $value->id_materi);
                                ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card my-shadow mb-4 border">
                                        <div class="card-header border-bottom-0 bg-gradient-success">
                                            <div class="card-title">
                                                <h5><b><?= $value->kode ?></b></h5>
                                                <small><?= $value->nama_guru ?></small>
                                            </div>
                                            <div class="card-tools">
											<span data-toggle="tooltip" title="Edit Materi">
												<a type="button" class="btn btn-sm btn-warning"
                                                   href="<?= base_url('kelasmateri/add/' . $value->id_materi) ?>">
													<i class="fa fa-pencil-alt mr-1"></i> Edit
												</a>
											</span>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item text-center">
                                                    <b><?= $value->judul_materi ?></b>
                                                </li>
                                                <li class="list-group-item">
                                                    <table class="w-100">
                                                        <tr>
                                                            <th class="w-25">Kelas</th>
                                                            <th>Jadwal</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        <?php
                                                        foreach ($arr as $k => $v) : ?>
                                                            <tr>
                                                                <td>
                                                                    <?= isset($kelas_materi[$value->id_materi][$v]) ? $kelas_materi[$value->id_materi][$v] : '-' ?>
                                                                </td>
                                                                <td>
                                                                    <?= isset($jadwal_materi[$value->id_materi][$v]) ? $jadwal_materi[$value->id_materi][$v] : 'Belum diatur' ?>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-xs btn-warning"
                                                                       data-toggle="modal"
                                                                       data-target="#editJadwalModal"
                                                                       data-idmateri="<?= $value->id_materi ?>"
                                                                       data-idmapel="<?= $value->id_mapel ?>"
                                                                       data-judul="<?= $value->judul_materi ?>"
                                                                       data-tgl="<?= isset($jadwal_materi[$value->id_materi][$v]) ? $jadwal_materi[$value->id_materi][$v] : '' ?>"
                                                                       data-kelas="<?= $v ?>"
                                                                       data-namakelas="<?= isset($kelas_materi[$value->id_materi][$v]) ? $kelas_materi[$value->id_materi][$v] : '' ?>"
                                                                       data-mapel="<?= $value->id_mapel ?>"
                                                                       data-namamapel="<?= $value->nama_mapel ?>">
                                                                        Edit Jadwal
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </table>
                                                </li>
                                                <li class="list-group-item"> Dibuat
                                                    <span class="float-right">
														<?= date('d/m/Y H:i', strtotime($value->created_on)) ?>
												</span>
                                                    <br>
                                                    Diupdate
                                                    <span class="float-right">
													<?= date('d/m/Y H:i', strtotime($value->updated_on)) ?>
												</span>
                                                </li>
                                                <li class="list-group-item">
                                                    <table class="w-100">
                                                        <?php
                                                        $stt = $value->status == '1' ? 'Aktif' : 'Non Aktif';
                                                        $btn_bg = $value->status == '1' ? 'bg-warning' : 'bg-success';
                                                        $btn_txt = $value->status == '1' ? 'Nonaktifkan' : 'Aktifkan';
                                                        ?>
                                                        <tr>
                                                            <td>Status</td>
                                                            <td>
                                                                <b><?= $stt ?></b>
                                                            </td>
                                                            <td class="text-right">
                                                                <button
                                                                        class="btn btn-xs <?= $btn_bg ?>"
                                                                        onclick="aktifkanMateri(<?= $value->id_materi ?>, <?= $value->status ?>)">
                                                                    <?= $btn_txt ?>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </li>
                                                <li class="list-group-item">File
                                                    <br>
                                                    <?php
                                                    $dataFileAttach = [];
                                                    $att = @unserialize($value->file ?? '');
                                                    if ($att !== false) {
                                                        $dataFileAttach = unserialize($value->file ?? '');
                                                    } else {
                                                        if ($value->file != null) {
                                                            $file = $value->file;
                                                            if (strpos($file, 'http') == false) {
                                                                $file = base_url('uploads/materi/') . $value->file;
                                                            }
                                                            $src_file = [
                                                                'src' => $file,
                                                                'size' => '',
                                                                'type' => mime_content_type(str_replace(base_url(), '', $file)),
                                                                'name' => $value->file
                                                            ];
                                                            array_push($dataFileAttach, $src_file);
                                                        }
                                                    }

                                                    //$dataFileAttach = unserialize($value->file);
                                                    foreach ($dataFileAttach as $f) :
                                                        $icon = 'fa-file';
                                                        $arrFile = ['jpg', 'jpeg', 'png', 'gif'];

                                                        if (strpos(strtolower($f['src'] ?? ''), 'doc') || strpos(strtolower($f['src'] ?? ''), 'docx')) {
                                                            $icon = 'fa-file-word-o text-primary';
                                                        } elseif (strpos(strtolower($f['src'] ?? ''), 'xls') || strpos(strtolower($f['src'] ?? ''), 'xlsx')) {
                                                            $icon = 'fa-file-excel-o text-success';
                                                        } elseif (strpos(strtolower($f['src'] ?? ''), 'png') || strpos(strtolower($f['src'] ?? ''), 'jpg') || strpos(strtolower($f['src'] ?? ''), 'jpeg')) {
                                                            $icon = 'fa-file-picture-o text-orange';
                                                        } elseif (strpos(strtolower($f['src'] ?? ''), 'pdf')) {
                                                            $icon = 'fa-file-pdf-o text-danger';
                                                        } elseif (strpos(strtolower($f['src'] ?? ''), 'mp4')) {
                                                            $icon = 'fa-file-video-o text-fuchsia';
                                                        }
                                                        ?>
                                                        <a class="btn btn-lg mr-1 mb-1 p-0" data-toggle="modal"
                                                           data-target="#previewModal"
                                                           data-src="<?= $f['src'] ?>" data-size="<?= $f['size'] ?>"
                                                           data-type="<?= $f['type'] ?>">
                                                            <i class="fa <?= $icon ?>"></i>
                                                        </a>
                                                    <?php endforeach; ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            <button onclick="hapus(<?= $value->id_materi ?>)" type="button"
                                                    class="btn btn-sm btn-danger float-right" data-toggle="tooltip"
                                                    title="Hapus Kelas">
                                                <i class="fa fa-trash"></i> Hapus Materi
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach;
                        else:?>
                            <div class="col-12 p-0">
                                <div class="alert alert-default-warning align-content-center" role="alert">
                                    Belum ada materi
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewLabel">Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="media-preview" class="text-center"></div>
            </div>
            <div class="modal-footer">
                <a id="download" href="#" type="button" class="btn btn-primary"><i class="fa fa-download mr-2"></i>
                    Download
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editJadwalModal" tabindex="-1" role="dialog" aria-labelledby="editJadwalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewLabel">Edit Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    <tbody>
                    <tr>
                        <td style="width: 80px;">Materi</td>
                        <td colspan="3" id="judul">:</td>
                    </tr>
                    <tr>
                        <td>Mapel</td>
                        <td id="mapel">:</td>
                        <td class="pl-4">Kelas</td>
                        <td id="kelas">:</td>
                    </tr>
                    <tr>
                        <td>Jadwal</td>
                        <td colspan="3" id="jadwal">: Pilih tanggal di bawah</td>
                    </tr>
                    </tbody>
                </table>
                <hr>
                <div class="row">
                    <div class="col-8">
                        <form class="form-inline">
                            <select class="form-control col-5 mr-2" name="month" id="month" onchange="jump()">
                                <option value=0>Jan</option>
                                <option value=1>Feb</option>
                                <option value=2>Mar</option>
                                <option value=3>Apr</option>
                                <option value=4>May</option>
                                <option value=5>Jun</option>
                                <option value=6>Jul</option>
                                <option value=7>Aug</option>
                                <option value=8>Sep</option>
                                <option value=9>Oct</option>
                                <option value=10>Nov</option>
                                <option value=11>Dec</option>
                            </select>
                            <select class="form-control col-5" name="year" id="year" onchange="jump()">
                                <option value=2020>2020</option>
                                <option value=2021>2021</option>
                                <option value=2022>2022</option>
                                <option value=2023>2023</option>
                                <option value=2024>2024</option>
                                <option value=2025>2025</option>
                                <option value=2026>2026</option>
                                <option value=2027>2027</option>
                                <option value=2028>2028</option>
                                <option value=2029>2029</option>
                                <option value=2030>2030</option>
                            </select>
                        </form>
                    </div>
                    <div class="col-4 text-right">
                        <button class="btn btn-outline-primary col-3" id="previous" onclick="previous()">
                            <i class="fa fa-angle-left"></i>
                        </button>
                        <button class="btn btn-outline-primary col-3" id="next" onclick="next()">
                            <i class="fa fa-angle-right"></i>
                        </button>
                    </div>
                </div>
                <br>
                <table class="table table-bordered" id="kalendar">
                    <thead>
                    <tr>
                        <th class="text-center text-danger">Minggu</th>
                        <th class="text-center">Senin</th>
                        <th class="text-center">Selasa</th>
                        <th class="text-center">Rabu</th>
                        <th class="text-center">Kamis</th>
                        <th class="text-center">Jumat</th>
                        <th class="text-center">Sabtu</th>
                    </tr>
                    </thead>
                    <tbody id="kalendar-body">
                    </tbody>
                </table>
            </div>
            <?= form_open('', array('id' => 'editjadwal')) ?>
            <div class="modal-footer">
                <input type="hidden" id="id_kelas" name="id_kelas" class="form-control">
                <input type="hidden" id="id_materi" name="id_materi" class="form-control">
                <input type="hidden" id="id_mapel" name="id_mapel" class="form-control">
                <input type="hidden" id="jadwal_materi" name="jadwal_materi" class="form-control">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-2"></i>Tutup
                </button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i> Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <script src="<?= base_url() ?>/assets/app/js/kelas/jadwal/kalender.js"></script>
</div>

<div class="modal fade" id="openAllMateri" tabindex="-1" role="dialog" aria-labelledby="openMateriLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="openMateriLabel">Semua Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if (count($all_materi) > 0) : ?>
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
                        foreach ($all_materi as $am) :
                            $arr = unserialize($am->materi_kelas ?? '');
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
                        belum ada materi
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

        function getMateriGuru() {
            window.location.href = base_url + 'kelasmateri?id=' + idGuru;
        }

        $('#guru').append('<option value="0">SEMUA GURU</option>');

        $('#guru').on('change', function () {
            idGuru = $(this).val();
            getMateriGuru();
        });
        /*
        $('#tahun').on('change', function () {
            idTp = $(this).val();
            getMateriGuru();
        });
        $('#smt').on('change', function () {
            idSmt = $(this).val();
            getMateriGuru();
        });
        */

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

        $('#editJadwalModal').on('show.bs.modal', function (e) {
            var id_materi = $(e.relatedTarget).data('idmateri');
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
            $('#id_mapel').val(id_mapel);
            $('#jadwal_materi').val(tgl);
            $('#id_kelas').val(kelas);

            var arrJadwal = [];

            console.log('data', 'mapel=' + mapel + ', kelas=' + kelas);

            $.ajax({
                type: 'GET',
                url: base_url + 'kelasmateri/dataaddjadwal?mapel=' + mapel + '&kelas=' + kelas,
                //type: 'POST',
                //url: base_url + 'kelasmateri/dataaddjadwal',
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
                        terisi.push(value.jadwal_materi)
                    });

                    initCalendar(terisi, tgl, currentMonth, currentYear, arrJadwal, function (y, m, d) {
                        console.log('callback', y + '-' + m + '-' + d);
                        $('#jadwal').text(':  ' + d + '-' + m + '-' + y);
                        $('#jadwal_materi').val(y + '-' + m + '-' + d);
                    });
                }
            });
        });

        $('#editjadwal').submit(function (e) {
            e.stopPropagation();
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: base_url + 'kelasmateri/savejadwal',
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
                    title: "Hapus Semua Materi?",
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
                                        text: count + " Materi berhasil dihapus",
                                        icon: "success"
                                    }).then(result => {
                                        if (result.value) {
                                            window.location.href = base_url + 'kelasmateri?id=' + idGuru;
                                        }
                                    })
                                } else {
                                    swal.fire({
                                        title: "Gagal",
                                        text: "Tidak bisa menghapus materi",
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
                    title: "Materi Kosong",
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
                text: "Materi akan dinonaktifkan!",
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
            text: "Materi akan dihapus!",
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
                                text: "Materi berhasil dihapus",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.href = base_url + 'kelasmateri?id=' + idGuru;
                                    //window.location.href = base_url + 'kelasmateri/getmateriguru?id='+idGuru;
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
            title: "Copy Materi?",
            text: "Materi ini akan dicopy",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Copy"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'kelasmateri/copymateri/' + id,
                    type: "GET",
                    success: function (respon) {
                        if (respon) {
                            swal.fire({
                                title: "Berhasil",
                                text: "Materi berhasil dicopy",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.href = base_url + 'kelasmateri?id=' + idGuru;
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
