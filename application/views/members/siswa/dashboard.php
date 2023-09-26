<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: -1px;">
    <!-- Main content -->
    <div class="sticky">
    </div>
    <section class="content overlap p-4">
        <div class="container">
            <?php $this->load->view('members/siswa/templates/top'); ?>
            <div class="row">
                <div class="col-12">
                    <div class="card card-blue">
                        <div class="card-header">
                            <div class="card-title text-white">
                                MENU UTAMA
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach ($menu as $m): ?>
                                    <div class="col-lg-2 col-sm-3 col-4 mb-3">
                                        <a href="<?= base_url($m->link) ?>">
                                            <figure class="text-center">
                                                <img class="img-fluid"
                                                     src="<?= base_url() ?>/assets/app/img/<?= $m->icon ?>" width="80"
                                                     height="80"/>
                                                <figcaption><?= $m->title ?></figcaption>
                                            </figure>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-7">
                    <div class="card card-success">
                        <div class="card-header">
                            <div class="card-title text-white">
                                INFO/PENGUMUMAN
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="konten-pengumuman">
                                <div id="pengumuman">
                                </div>
                                <p id="loading-post" class="text-center d-none">
                                    <br/><i class="fa fa-spin fa-circle-o-notch"></i> Loading....
                                </p>
                                <div id="loadmore-post"
                                     onclick="getPosts()"
                                     class="text-center mt-4 loadmore d-none">
                                    <div class="btn btn-default">Muat Timeline lainnya ...</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="card card-red">
                        <div class="card-header">
                            <div class="card-title text-white">
                                JADWAL HARI INI
                            </div>
                            <div class="card-tools">
                                <button type="button" onclick="loadJadwal()" class="btn btn-sm">
                                    <i class="fa fa-sync text-white"></i> <span
                                            class="d-none d-sm-inline-block ml-1 text-white">Reload</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            if ($kbms != null) :
                                if (count($jadwals) > 0):
                                    $no = 1;
                                    $arrIst = [];
                                    if (isset($kbms->istirahat)) {
                                        foreach ($kbms->istirahat as $istirahat) {
                                            array_push($arrIst, $istirahat['ist']);
                                            $arrDur[$istirahat['ist']] = $istirahat['dur'];
                                        }
                                    }
                                    $active = $no == 1 ? 'active' : '';
                                    ?>

                                    <div class="table-responsive">
                                        <table class="w-100 table">
                                            <tbody>
                                            <?php
                                            $jamMulai = new DateTime($kbms->kbm_jam_mulai);
                                            $jamSampai = new DateTime($kbms->kbm_jam_mulai);
                                            for ($i = 0; $i < $kbms->kbm_jml_mapel_hari; $i++) :
                                                $jamke = $i + 1;
                                                if (in_array($jamke, $arrIst)) :
                                                    $jamSampai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                                    ?>
                                                    <tr class="jam" data-jamke="<?= $jamke ?>">
                                                        <td class="align-middle" width="150">
                                                            <?= $jamMulai->format('H:i') ?>
                                                            - <?= $jamSampai->format('H:i') ?>
                                                        </td>
                                                        <td class="align-middle">ISTIRAHAT</td>
                                                    </tr>
                                                    <?php
                                                    $jamMulai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                                else :
                                                    $jamSampai->add(new DateInterval('PT' . $kbms->kbm_jam_pel . 'M'));
                                                    ?>
                                                    <tr class="jam" data-jamke="<?= $jamke ?>">
                                                        <td class="align-middle">
                                                            <?= $jamMulai->format('H:i') ?>
                                                            - <?= $jamSampai->format('H:i') ?>
                                                        </td>
                                                        <td class="align-middle">
                                                            <?= $jadwals[$jamke]->kode != null ? $jadwals[$jamke]->kode : '--' ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $jamMulai->add(new DateInterval('PT' . $kbms->kbm_jam_pel . 'M'));
                                                endif; endfor; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php else: ?>
                                    <p>
                                        Tidak ada jadwal hari ini
                                    </p>
                                <?php endif; ?>
                            <?php else: ?>
                                <p>
                                    Jadwal untuk kelas <?= $siswa->nama_kelas ?> belum dibuat
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="pengumumanModal" tabindex="-1" role="dialog" aria-labelledby="previewLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="user-block">
                    <img id="foto" class="img-circle" src="<?= base_url() ?>/assets/img/user.jpg" alt="User Image">
                    <span id="username" class="username">test</span>
                    <span id="tgl" class="description">aja</span>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-3">
                <div id="isi-pengumuman"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="komentarModal" tabindex="-1" role="dialog" aria-labelledby="komentarLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="komentarLabel">Tulis Komentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid img-circle img-sm" src="<?= base_url('assets/img/siswa.png') ?>" alt="Alt Text">
                <div class="img-push">
                    <?= form_open('create', array('id' => 'komentar')) ?>
                    <input type="hidden" id="id-post" name="id_post" value="">
                    <div class="input-group">
                        <input type="text" name="text" placeholder="Tulis komentar ..."
                               class="form-control form-control-sm" required>
                        <span class="input-group-append">
                                <button type="submit" class="btn btn-success btn-sm">Komentari</button>
                            </span>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="balasanModal" tabindex="-1" role="dialog" aria-labelledby="balasanLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="balasanLabel">Tulis Balasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid img-circle img-sm" src="<?= base_url('assets/img/siswa.png') ?>" alt="Alt Text">
                <div class="img-push">
                    <?= form_open('create', array('id' => 'balasan')) ?>
                    <input type="hidden" id="id-comment" name="id_comment" value="">
                    <div class="input-group">
                        <input type="text" name="text" placeholder="Tulis balasan ...."
                               class="form-control form-control-sm" required>
                        <span class="input-group-append">
                                <button type="submit" class="btn btn-success btn-sm">Balas</button>
                            </span>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    let jadwalKbm;
    var arrIst = [];
    var kelas = '<?=$siswa->id_kelas?>';
    var kodeKelas = '<?=$siswa->kode_kelas?>';
    var pengumuman;

    var halaman = 0;
    var idSiswa = "<?=$siswa->id_siswa?>";

    function createTime(d) {
        var date = new Date(d);

        var jam = date.getHours();
        var menit = date.getMinutes();
        var sJam;
        var sMenit;

        if (jam < 10) sJam = '0' + jam;
        else sJam = '' + jam;

        if (menit < 10) sMenit = '0' + menit;
        else sMenit = '' + menit;

        var hari = daysdifference(d);
        var time;

        if (hari === 0) {
            time = sJam + ':' + sMenit;
        } else if (hari === 1) {
            time = 'kemarin ' + sJam + ':' + sMenit;
        } else {
            time = jQuery.timeago(d) + ', ' + sJam + ':' + sMenit;
        }
        return time;
    }

    function daysdifference(last) {
        var startDay = new Date(last);
        var endDay = new Date();

        var millisBetween = startDay.getTime() - endDay.getTime();
        var days = millisBetween / (1000 * 3600 * 24);

        return Math.round(Math.abs(days));
    }

    function addComments(id, comments, append) {
        var comm = '';
        $.each(comments, function (i, v) {
            var dari, foto, avatar;
            if (v.dari == '0') {
                dari = 'Admin';
                avatar = v.foto != null ? '<img class="img-circle border" src="' + v.foto + '" alt="Img" width="40px" height="40px">' :
                    '<div class="btn-circle-sm btn-success media-left pt-1" style="width: 43px; height: 40px">A</div>'
            } else {
                if (v.dari_group == '2') {
                    dari = v.nama_guru;
                    foto = v.foto != null ? base_url + v.foto : base_url + 'assets/img/siswa.png';
                    avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="40px" height="40px">';
                } else {
                    dari = v.nama_siswa;
                    foto = v.foto_siswa != null ? base_url + v.foto_siswa : base_url + 'assets/img/siswa.png';
                    avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="40px" height="40px">';
                }
            }

            comm += '<div class="media mt-1" id="parent-reply' + v.id_comment + '">'
                + avatar +
                '    <div class="w-100 ml-2">' +
                '        <div class="media-body border pl-3 bg-light" style="border-radius: 20px">' +
                '            <span class="text-xs text-muted"><b>' + dari + '</b></span>' +
                '            <div class="comment-text pb-1">' + v.text + '</div>' +
                '        </div>' +
                '        <div class="ml-2">' +
                '            <span class="btn-sm mr-2 text-muted">' + createTime(v.tanggal) + '</span>' +
                '            <span id="trigger-reply' + v.id_comment + '" class="btn btn-sm mr-2 text-muted action-collapse" data-toggle="collapse" aria-expanded="true"' +
                '                              aria-controls="collapse-reply' + v.id_comment + '"' +
                '                              href="#collapse-reply' + v.id_comment + '"><b>' + v.jml + ' balasan</b></span>' +
                '            <span class="btn btn-sm mr-2 text-muted btn-toggle-reply"' +
                '                  data-id="' + v.id_comment + '" data-toggle="modal" data-target="#balasanModal">' +
                '                <i class="fas fa-reply"></i> <b>Balas</b></span>';
            if (v.dari_group === '3' && v.dari === idSiswa) {
                comm += '            <span class="btn btn-sm text-muted" data-id="' + v.id_comment + '">' +
                    '                <i class="fa fa-trash mr-1"></i> Hapus' +
                    '            </span>';
            }
            comm += '        </div>' +
                '<div id="collapse-reply' + v.id_comment + '" class="p-2 collapse toggle-reply" data-id="' + v.id_comment + '" data-parent="#parent-reply' + v.id_comment + '">';
            if (v.jml != '0') {
                comm += '<div id="konten-reply' + v.id_comment + '"></div>' +
                    '<div id="loadmore-reply' + v.id_comment + '" onclick="getReplies(' + v.id_comment + ')" class="text-center mb-3 loadmore-reply">' +
                    '       <div class="btn btn-default">Muat balasan lainnya ...</div>' +
                    '</div>';
            }
            comm += '    <div id="loading-reply' + v.id_comment + '" class="text-center d-none">' +
                '        <div class="spinner-grow"></div>' +
                '    </div>' +
                '</div>' +
                '    </div>' +
                '</div>';
        });

        if (append) {
            $(`#konten${id}`).append(comm);
        } else {
            $(`#konten${id}`).prepend(comm);
        }

        $('.toggle-reply').on('shown.bs.collapse', function (e) {
            var konten = $(this);
            var id = konten.data('id');
            var list = $(this).find('.media').length;
            if (list === 0) $(`#loadmore-reply${id}`).click();
        });

        $('#balasan').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            console.log("data", $(this).serialize());
            var id = $(this).find('input[name=id_comment]').val();

            $.ajax({
                url: base_url + "siswa/savebalasan",
                data: $(this).serialize(),
                method: 'POST',
                dataType: "JSON",
                success: function (response) {
                    console.log("result", response);
                    $('#balasanModal').modal('hide').data('bs.modal', null);
                    $('#balasanModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });
                    //window.location.href = base_url + 'pengumuman';
                    addReplies(id, response, false)
                },
                error: function (xhr, status, error) {
                    $('#balasanModal').modal('hide').data('bs.modal', null);
                    $('#balasanModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });
                    showDangerToast('Error, balasan tidak terkirim');
                }
            });
        });
        wrappTables()
    }

    function addReplies(id, replies, append) {
        console.log('replies', replies);
        var repl = '';
        $.each(replies, function (i, v) {
            var sudahAda = $(`.media${v.id_reply}`).length;
            if (!sudahAda) {
                var dari, foto, avatar;
                if (v.dari == '0') {
                    dari = 'Admin';
                    avatar = v.foto != null ? '<img class="img-circle border" src="' + v.foto + '" alt="Img" width="35px" height="35px">' :
                        '<div class="btn-circle-sm btn-success media-left pt-1 mr-2" style="width: 37px">A</div>';
                } else {
                    if (v.dari_group == '2') {
                        dari = v.nama_guru;
                        foto = v.foto != null ? base_url + v.foto : base_url + 'assets/img/siswa.png';
                        avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="35px" height="35px">';
                    } else {
                        dari = v.nama_siswa;
                        foto = v.foto_siswa != null ? base_url + v.foto_siswa : base_url + 'assets/img/siswa.png';
                        avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="35px" height="35px">';
                    }
                }

                repl +=
                    '<div class="media mt-1 media' + v.id_reply + '">'
                    + avatar +
                    '    <div class="w-100">' +
                    '        <div class="media-body border pl-3" style="border-radius: 17px; background-color: #dee2e6">' +
                    '            <span class="text-xs text-muted"><b>' + dari + '</b></span>' +
                    '            <div class="comment-text">' + v.text +
                    '            </div>' +
                    '        </div>' +
                    '        <div class="ml-2">' +
                    '            <small class="btn-sm mr-2 text-muted">' + createTime(v.tanggal) + '</small>';
                if (v.dari_group === '3' && v.dari === idSiswa) {
                    repl += '            <span class="btn btn-sm text-muted" data-id="' + v.id_reply + '">' +
                        '                <i class="fa fa-trash mr-1"></i> Hapus' +
                        '            </span>';
                }
                repl += '        </div>' +
                    '    </div>' +
                    '</div>';
            }
        });

        if (append) {
            $(`#konten-reply${id}`).append(repl);
        } else {
            $(`#konten-reply${id}`).prepend(repl);
        }
        console.log('added', 'reply' + id);
    }

    function getComments(id) {
        $(`#loading${id}`).removeClass('d-none');
        $(`#loadmore${id}`).addClass('d-none');
        var $count = $(`#loadmore${id}`), page = $count.data('count');
        if (!page) page = 0;

        setTimeout(function () {
            $.ajax({
                url: base_url + "siswa/getcomment/" + id + "/" + page,
                type: "GET",
                success: function (response) {
                    //console.log('page', page);
                    console.log("result", response);
                    page += 1;
                    currentPage = page;
                    $count.data('count', page);

                    if (response.length === 5) {
                        $(`#loadmore${id}`).removeClass('d-none');
                    }
                    $(`#loading${id}`).addClass('d-none');
                    addComments(id, response, true)
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                }
            });
        }, 500);
    }

    function getReplies(id) {
        $(`#loading-reply${id}`).removeClass('d-none');
        $(`#loadmore-reply${id}`).addClass('d-none');
        var $count = $(`#loadmore-reply${id}`), page = $count.data('count');
        if (!page) page = 0;

        setTimeout(function () {
            $.ajax({
                url: base_url + "siswa/getreplies/" + id + "/" + page,
                type: "GET",
                success: function (response) {
                    //console.log('page', page);
                    console.log("result", response);
                    page += 1;
                    currentPage = page;
                    $count.data('count', page);

                    //n >= start && n <= end
                    if (response.length === 5) {
                        $(`#loadmore-reply${id}`).removeClass('d-none');
                    }
                    $(`#loading-reply${id}`).addClass('d-none');
                    addReplies(id, response, true)
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                }
            });
        }, 500);
    }

    function addPosts(response) {
        var card = '';

        $.each(response, function (i, v) {
            var dari, foto, avatar;
            if (v.dari == '0') {
                dari = 'Admin';
                avatar = v.foto != null ? '<img class="img-circle border" src="' + v.foto + '" alt="Img" width="50px" height="50px">' :
                    '<div class="btn-circle btn-success media-left pt-1">A</div>';
            } else {
                if (v.dari_group == '2') {
                    dari = v.nama_guru;
                    foto = v.foto != null ? base_url + v.foto : base_url + 'assets/img/siswa.png';
                    avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="50px" height="50px">';
                } else {
                    dari = v.nama_siswa;
                    foto = v.foto_siswa != null ? base_url + v.foto_siswa : base_url + 'assets/img/siswa.png';
                    avatar = '<img class="img-circle border" src="' + foto + '" alt="Img" width="50px" height="50px">';
                }
            }

            card += '<div class="card">' +
                '    <div class="card-body" id="parent' + v.id_post + '">' +
                '        <div class="media">' +
                avatar +
                '                <div class="media-body ml-3">' +
                '                    <span class="font-weight-bold"><b>' + dari + '</b></span>' +
                '                    <br/>' +
                '                    <span class="text-gray">' + createTime(v.tanggal) + '</span>' +
                '                </div>' +
                '        </div>' +
                '        <div class="mt-2">' + v.text + '</div>' +
                '        <div class="text-muted">' +
                '            <button type="button" class="btn btn-default btn-sm mr-2 btn-toggle"' +
                '                    data-id="' + v.id_post + '" data-toggle="modal"' +
                '                    data-target="#komentarModal"><i class="fas fa-reply mr-1"></i> Tulis komentar' +
                '            </button>' +
                '            <button type="button" id="trigger' + v.id_post + '" class="btn btn-default btn-sm mr-2 action-collapse"' +
                '                    data-toggle="collapse" aria-expanded="true"' +
                '                    aria-controls="collapse-' + v.id_post + '"' +
                '                    href="#collapse-' + v.id_post + '">' +
                '                <i class="fa fa-commenting-o mr-1"></i>' + v.jml + ' komentar' +
                '            </button>' +
                '        </div>' +
                '    </div>' +
                '    <div id="collapse-' + v.id_post + '" class="p-2 collapse toggle-comment"' +
                '         data-id="' + v.id_post + '" data-parent="#parent' + v.id_post + '">' +
                '        <hr class="m-0">' +
                '        <div id="konten' + v.id_post + '" class="p-4">' +
                '        </div>' +
                '        <div id="loading' + v.id_post + '" class="text-center d-none">' +
                '            <div class="spinner-grow"></div>' +
                '        </div>';
            if (v.jml == '0') {
                card += '<div class="text-center">Tidak ada komentar</div>';
            } else {
                card += '<div id="loadmore' + v.id_post + '"' +
                    '     onclick="getComments(' + v.id_post + ')"' +
                    '     class="text-center mt-4 loadmore">' +
                    '    <div class="btn btn-default">Muat komentar lainnya ...</div>' +
                    '</div>';
            }
            card += '</div>' +
                '</div>';
        });

        $('#pengumuman').html(card);

        $('.toggle-comment').on('shown.bs.collapse', function (e) {
            var konten = $(this);
            var id = konten.data('id');
            var list = $(this).find('.media').length;
            if (list === 0) $(`#loadmore${id}`).click();
        });

        $('#komentarModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            $("#id-post").val(id);

            var isVisible = $(`#collapse-${id}`).hasClass('show');
            if (!isVisible) {
                $(`#trigger${id}`).click();
            }
        });

        $('#balasanModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            $("#id-comment").val(id);

            var isVisible = $(`#collapse-reply${id}`).hasClass('show');
            if (!isVisible) {
                $(`#trigger-reply${id}`).click();
            }
        });

        $('#komentar').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            console.log("data", $(this).serialize());
            var id = $(this).find('input[name=id_post]').val();

            $.ajax({
                url: base_url + "siswa/savekomentar",
                data: $(this).serialize(),
                method: 'POST',
                dataType: "JSON",
                success: function (response) {
                    console.log("result", response);
                    $('#komentarModal').modal('hide').data('bs.modal', null);
                    $('#komentarModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });
                    addComments(id, response, false)
                    //window.location.href = base_url + 'pengumuman';
                },
                error: function (xhr, status, error) {
                    $('#komentarModal').modal('hide').data('bs.modal', null);
                    $('#komentarModal').on('hidden', function () {
                        $(this).data('modal', null);
                    });
                    showDangerToast('Error, komentar tidak terkirim');
                }
            });
        });
        wrappTables()
    }

    function getPosts() {
        $(`#loading-post`).removeClass('d-none');
        $(`#loadmore-post`).addClass('d-none');

        setTimeout(function () {
            $.ajax({
                url: base_url + "siswa/getpost?halaman=" + halaman + "&kelas=" + kodeKelas,
                type: "GET",
                //data: {halaman: halaman, kelas: kodeKelas},
                success: function (response) {
                    console.log("result", response);
                    halaman += 1;

                    if (response.length === 5) {
                        $(`#loadmore-post`).removeClass('d-none');
                    }
                    $(`#loading-post`).addClass('d-none');
                    addPosts(response)
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                }
            });
        }, 500);
    }

    function loadPengumuman() {
        $.ajax({
            type: 'GET',
            url: base_url + 'dashboard/getpengumuman/3',
            success: function (data) {
                pengumuman = data;
                //console.log('result', data);
                var ul = '<ul class="products-list product-list-in-card pl-2 pr-2">';
                var pos = 0;
                $.each(data, function (key, value) {
                    //var nama = value.id_group === '1' ? value.name : (value.id_group === '2' ? value.nama_guru : value.nama);
                    var tgl = formatTanggal(value.date);//new Date('02/12/2018');
                    ul += '  <li class="item">' +
                        '<a href="javascript:void(0)" data-toggle="modal" data-target="#pengumumanModal" data-pos="' + pos + '">' +
                        '    <div class="media" style="line-height: 1">' +
                        '      <img class="img-circle media-left" src="' + base_url + '/assets/img/user.jpg" width="40" height="40" />' +
                        '      <div class="media-body ml-2">' +
                        '        <span class="float-right text-xs text-muted">' + tgl + '</span>' +
                        '        <span><b>' + value.judul + '</b></span>' +
                        '        <br />' +
                        '        <span class="text-sm">' + value.nama_guru + '</span>' +
                        '      </div>' +
                        '    </div>' +
                        '</a>' +
                        '  </li>';

                    pos++;
                });
                ul += '<li>' +
                    '<a href="">' +
                    '<div class="text-center">' +
                    '<br>Lihat semua pengumuman' +
                    '</div>' +
                    '</a>' +
                    '</li>' +
                    '</ul>';
                $('#list-pengumuman').html(ul);
            }
        })
    }

    function loadJadwal() {
        var date = new Date();
        var hari = date.getDay();

        $.ajax({
            type: 'GET',
            url: base_url + 'dashboard/getjadwalhariini/' + kelas + '/' + hari,
            success: function (data) {
                console.log('jadwal', data);
                if (data.length !== 0) {
                    var tableJadwal = '<table class="table w-100">' +
                        '<thead>' +
                        '<tr>' +
                        '<th class="text-center">Jam Ke</th>' +
                        '<th class="text-center">Waktu</th>' +
                        '<th>Mata Pelajaran</th>' +
                        '</tr></thead>' +
                        '<tbody>';
                    var jamMapel = jadwalKbm.jadwal.kbm_jam_pel;
                    var waktu = jadwalKbm.jadwal.kbm_jam_mulai;
                    var jmlMapel = jadwalKbm.jadwal.kbm_jml_mapel_hari;

                    var istirahat = jadwalKbm.istirahat;
                    var wktPel = 0;
                    var wktIst = 0;
                    for (let i = 0; i < jmlMapel; i++) {
                        var jamKe = i + 1;
                        var isIst = jQuery.inArray('' + jamKe, arrIst) > -1;

                        if (isIst) {
                            tableJadwal += '<tr>' +
                                '<td class="text-center">' + jamKe + '</td>' +
                                '<td class="text-center">' + waktu + '</td>' +
                                '<td>ISTIRAHAT</td>' +
                                '</tr>';
                            waktu = addTimes(waktu, '00:' + istirahat[wktIst].dur);
                            wktIst++;
                        } else {
                            //console.log(data[wktPel]);
                            var mpl = data[wktPel].nama_mapel == null ? '- -' : data[wktPel].nama_mapel;
                            tableJadwal += '<tr>' +
                                '<td class="text-center">' + data[wktPel].jam_ke + '</td>' +
                                '<td class="text-center">' + waktu + '</td>' +
                                '<td>' + mpl + '</td>' +
                                '</tr>';
                            wktPel++;
                            waktu = addTimes(waktu, '00:' + jamMapel);
                        }
                        console.log(waktu);
                    }
                    tableJadwal += '</tbody></table>';
                    $('#list-jadwal').html(tableJadwal);
                } else {
                    $('#list-jadwal').html('Tidak ada jadwal hari ini');
                }
            }
        })
    }

    $(document).ready(function () {
        //form = $('#formselect');
        $.ajax({
            type: 'GET',
            url: base_url + 'dashboard/getjadwalkbm/' + kelas,
            success: function (data) {
                console.log('kbm', data);
                jadwalKbm = data;
                $.each(data.istirahat, function (key, value) {
                    arrIst.push(value.ist);
                });
            }
        });

        $('#pengumumanModal').on('show.bs.modal', function (e) {
            var pos = $(e.relatedTarget).data('pos');
            var item = pengumuman[pos];
            var tgl = formatTanggal(item.date);

            var nama = item.nama_guru;
            var foto = item.foto;
            var tanggal = tgl;
            var judul = item.judul;
            var isi = item.text;

            $('#username').text(nama);
            $('#tgl').text(tanggal);
            $('#foto').attr('src', base_url + '/assets/img/' + foto);

            var html = '<h3>' + judul + '</h3>' + isi;
            $('#isi-pengumuman').html(html);

        });

        getPosts();
    });

    function addTimes(startTime, endTime) {
        var times = [0, 0, 0];
        var max = times.length;

        var a = (startTime || '').split(':');
        var b = (endTime || '').split(':');

        // normalize time values
        for (var i = 0; i < max; i++) {
            a[i] = isNaN(parseInt(a[i])) ? 0 : parseInt(a[i]);
            b[i] = isNaN(parseInt(b[i])) ? 0 : parseInt(b[i])
        }

        // store time values
        for (var j = 0; j < max; j++) {
            times[j] = a[j] + b[j]
        }

        var hours = times[0];
        var minutes = times[1];
        var seconds = times[2];

        if (seconds >= 60) {
            var m = (seconds / 60) << 0;
            minutes += m;
            seconds -= 60 * m
        }

        if (minutes >= 60) {
            var h = (minutes / 60) << 0;
            hours += h;
            minutes -= 60 * h
        }

        return ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2);// + ':' + ('0' + seconds).slice(-2)
    }

    function wrappTables() {
        $('table').each(function () {
            if (! $(this).parents('.table-responsive').length) {
                $(this).wrap('<div class="table-responsive"></div>');
            }
        })
    }
</script>
