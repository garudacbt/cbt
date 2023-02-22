<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 23/08/20
 * Time: 23:18
 */
?>
<div class="content-wrapper" style="margin-top: -1px;">
    <div class="sticky">
    </div>
    <section class="content overlap pt-4">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <div class="info-box bg-transparent shadow-none">
                        <img src="<?= base_url() ?>/assets/img/garuda_circle.png" width="60" height="60">
                        <div class="info-box-content">
                                <span class="text-white"
                                      style="font-size: 24pt; line-height: 0.7;"><b>GarudaCBT</b></span>
                            <span class="text-white">C B T   A p p l i c a t i o n</span>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="float-right mt-2 d-none d-md-inline-block">
                        <div class="float-right ml-4">
                            <img src="<?= base_url() ?>/assets/app/img/ic_graduate.png" width="60" height="60">
                        </div>
                        <div class="float-left" style="line-height: 1.2">
                            <span class="text-white"><b><?= $siswa->nama ?></b></span>
                            <br>
                            <span class="text-white"><?= $siswa->nis ?></span>
                            <br>
                            <span class="text-white"><?= $siswa->nama_kelas ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container"
             style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;"
             unselectable="on">
            <div class="row">
                <div class="col-12">
                    <div class="card my-shadow">
                        <div class="card-header p-4">
                            <div class="card-title">
                                NOMOR:
                                <div id="nomor-soal" class="btn bg-primary no-hover ml-2 text-lg"></div>
                            </div>
                            <div class="card-tools">
                                <button class="btn btn-outline-danger btn-oval-sm no-hover">
                                    <span class='mr-4 d-none d-md-inline-block'><b>Sisa Waktu</b></span>
                                    <span id="timer"><b>00:00:00</b></span>
                                </button>
                                <button data-toggle="modal" data-target="#daftarModal"
                                        class="btn btn-primary btn-oval-sm">
                                    <span class="d-none d-md-inline-block mr-2"><b>Daftar Soal</b></span>
                                    <i class="fa fa-th"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="resize-text mb-3">
                                <button class="btn btn-outline-primary btn-oval-sm no-hover" id="minus"><i
                                            class="fa fa-minus"></i></button>
                                <button class="btn btn-outline-primary btn-oval-sm no-hover" id="plus"><i
                                            class="fa fa-plus"></i></button>
                            </div>
                            <?php
                            //echo '<pre>';
                            //var_dump($konten_opsi);
                            //echo '<br>';
                            //echo '<br>';
                            //var_dump($soal);
                            //echo '</pre>';
                            ?>
                            <div style="border: 1px solid; border-color: #D3D3D3">
                                <div class="konten-soal-jawab">
                                    <div class="row p-2 mb-4 ml-1">
                                        <div id="konten-soal"></div>
                                    </div>
                                    <?= form_open('jawab', array('id' => 'jawab')) ?>
                                    <div class="row p-3">
                                        <div id="konten-jawaban" class="col-12">
                                        </div>
                                    </div>
                                    <?= form_close() ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between bd-highlight">
                                <div class="bd-highlight">
                                    <button class="btn btn-primary btn-oval-sm" id="prev" onclick="prevSoal()">
                                        <i class="fa fa-arrow-circle-left"></i>
                                        <span class="ml-2 d-none d-md-inline-block"><b>Soal Sebelumnya</b></span>
                                    </button>
                                </div>
                                <div class="bd-highlight">
                                    <button class="btn btn-oval-sm" id="next" onclick="nextSoal()">
                                        <span id="text-next" class="mr-2 d-none d-md-inline-block"></span>
                                    </button>
                                    <!--
                                    <button class="btn btn-success btn-oval-sm d-none" id="finish" onclick="selesai()">
                                        <span class="mr-2 d-none d-md-inline-block"><b>Selesai</b></span>
                                        <i class="fa fa-check-circle"></i>
                                    </button>
                                    -->
                                </div>
                            </div>
                        </div>
                        <div class="overlay" id="loading">
                            <div class="spinner-grow"></div>
                            <div class="pl-3">MEMUAT SOAL</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="daftarLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="daftarLabel">Daftar Nomor Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="konten-modal">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>

<?= form_open('', array('id' => 'up')) ?>
<input type="hidden" name="siswa" value="<?= $siswa->id_siswa ?>">
<input type="hidden" name="jadwal" value="<?= $jadwal->id_jadwal ?>">
<input type="hidden" name="bank" value="<?= $jadwal->id_bank ?>">
<?= form_close() ?>

<script src="<?= base_url() ?>/assets/plugins/fields-linker/fieldsLinker.js"></script>
<script src="<?= base_url() ?>/assets/app/js/redirect.js"></script>
<script>
    var elem = document.documentElement;
    history.pushState(null, null, '<?php echo $_SERVER["REQUEST_URI"]; ?>');
    window.addEventListener('popstate', function (event) {
        loadSoalNomor(1);
    });
    const infoJadwal = JSON.parse(JSON.stringify(<?= json_encode($jadwal) ?>));
    let elapsed = '0';
    var timer = '0';
    let idDurasi;
    let h, m, s, th, tm, ts;
    var interval = null;

    let nomorSoal = 0;
    let idSoal, idSoalSiswa, jenisSoal, modelSoal, typeSoal;
    let jawabanSiswa, jawabanBaru = null, jsonJawaban;
    let nav = 0;
    let soalTerjawab = 0, soalTotal = 0;
    var message = "Jangan menggunakan klik kanan!";

    $(document).ready(function () {
        //startTime();
        document.onmousedown = rtclickcheck;
        swal.fire({
            title: 'Peraturan Ujian',
            html: 'Kerjakan soal dengan benar dan jangan nyontek',
            // showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                openFullscreen();
            }
        });

        $('#jawab').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var siswa = $('#up').find('input[name="siswa"]').val();
            var bank = $('#up').find('input[name="bank"]').val();

            $.ajax({
                url: base_url + 'siswa/savejawaban',
                method: 'POST',
                data: $(this).serialize() + '&siswa=' + siswa + '&bank=' + bank + '&data=' + JSON.stringify(jsonJawaban),
                success: function (response) {
                    soalTerjawab = response.soal_terjawab;
                    loadSoalNomor(nav)
                    //console.log(response);
                },
                error: function (xhr, error, status) {
                    console.log(xhr.responseText);
                }
            });
        });

        $("#plus").click(function () {
            $(".konten-soal-jawab").find('*').each(function () {
                var size = parseInt($(this).css("font-size"));
                if (size < 30) {
                    size = (size + 1) + "px";
                    $(this).css({'font-size': size});
                }
            });
        });

        $("#minus").click(function () {
            $(".konten-soal-jawab").find('*').each(function () {
                var size = parseInt($(this).css("font-size"));
                if (size > 12) {
                    size = (size - 1) + "px";
                    $(this).css({'font-size': size});
                }
            });
        });

        loadSoalNomor(1)

    });

    function loadSoal(datas) {
        $('#daftarModal').modal('hide').data('bs.modal', null);
        $('#daftarModal').on('hidden', function () {
            $(this).data('modal', null);
        });

        nav = $(datas).data('nomorsoal');
        var jwb1 = jawabanSiswa;
        var jwb2 = jawabanBaru;
        if ($.isArray(jwb1) || jwb1 instanceof jQuery) {
            jwb1 = JSON.stringify(jwb1)
        }
        if (jwb2 != null && ($.isArray(jwb2) || jwb2 instanceof jQuery)) {
            jwb2 = JSON.stringify(jwb2)
        }

        if (jawabanBaru != null && jwb1 !== jwb2) {
            $('#jawab').submit();
        } else {
            loadSoalNomor(nav);
        }
    }

    function loadSoalNomor(nomor) {
        if (nomor == nomorSoal) {
            return;
        }

        if (soalTotal === 0 || nomor <= parseInt(soalTotal)) {
            if (interval != null) clearInterval(interval);
            //$('#loading').removeClass('d-none');
            $.ajax({
                type: 'POST',
                url: base_url + 'siswa/loadsoal',
                data: $('#up').serialize() + '&nomor=' + nomor + '&elapsed=' + elapsed + '&timer=' + timer,
                success: function (data) {
                    //console.log(data);
                    $('#loading').addClass('d-none');
                    setKonten(data);
                }, error: function (xhr, error, status) {
                    showDangerToast('ERROR!');
                    console.log(xhr.responseText);
                }
            });
        } else {
            selesai();
        }

    }

    function setKonten(data) {
        idSoal = data.soal_id;
        idSoalSiswa = data.soal_siswa_id;
        nomorSoal = parseInt(data.soal_nomor);
        jenisSoal = data.soal_jenis;
        soalTerjawab = data.soal_terjawab;
        soalTotal = data.soal_total;

        idDurasi = data.id_durasi;
        if (data.elapsed == null) {
            window.location.href = base_url + 'siswa/cbt';
            return;
        }
        elapsed = data.elapsed == '0' ? "00:00:00" : data.elapsed;

        jsonJawaban = {};
        jawabanBaru = null;
        jawabanSiswa = data.soal_jawaban_siswa != null ? data.soal_jawaban_siswa : '';
        if ($.isArray(jawabanSiswa)) jawabanSiswa.sort();

        if (nomorSoal === 1) {
            $('#prev').attr('disabled', 'disabled');
        } else {
            $('#prev').removeAttr('disabled');
        }

        $('#nomor-soal').html(nomorSoal);
        $('#konten-soal').html(data.soal_soal);
        var jenis = data.soal_jenis;
        var html = '';
        if (jenis == "1") {
            $.each(data.soal_opsi, function (key, opsis) {
                if (opsis.valAlias != "") {
                    html += '<label class="container-jawaban font-weight-normal">' + opsis.opsi +
                        '<input type="radio"' +
                        ' name="jawaban"' +
                        ' value="' + opsis.value.toUpperCase() + '"' +
                        ' data-jawabansiswa="' + opsis.value.toUpperCase() + '"' +
                        ' data-jawabanalias="' + opsis.valAlias.toUpperCase() + '"' +
                        //' data-nomor="'+nomorSoal+'"' +
                        //' data-jenis="'+data.soal_jenis+'"' +
                        ' onclick="submitJawaban(this)" ' + opsis.checked + '>' +
                        '<span class="checkmark shadow text-center align-middle">' + opsis.valAlias.toUpperCase() + '</span>' +
                        '</label>';
                }
            });
            $('#konten-jawaban').html(html);
        } else if (jenis == "2") {
            $.each(data.soal_opsi, function (key, opsis) {
                //console.log(key, opsis);
                html += '<label class="container-jawaban font-weight-normal">' + opsis.opsi +
                    '<input type="checkbox"' +
                    ' name="jawaban"' +
                    ' value="' + opsis.value.toUpperCase() + '"' +
                    ' data-jawabansiswa="' + opsis.value.toUpperCase() + '"' +
                    ' onclick="submitJawaban(this)" ' + opsis.checked + '>' +
                    //'<i class="fa fa-2x icon-checkbox"></i>' +
                    '<span class="boxmark"></span>' +
                    '</label>';
            });
            $('#konten-jawaban').html(html);
        } else if (jenis == "3") {
            modelSoal = data.soal_opsi.model;
            typeSoal = data.soal_opsi.type;
            if (data.soal_opsi.model == '1') {
                var datalist = convertTableToList(data.soal_opsi);
                html = '<div class="bonds" id="original" style="display:block;"></div>';
                $('#konten-jawaban').html(html);
                var mode = datalist.type == '2' ? "oneToOne" : "manyToMany";
                var inputs = {
                    "localization": {},
                    "options": {
                        "associationMode": mode, // oneToOne,manyToMany
                        "lineStyle": "square-ends",
                        "buttonErase": false,//"Batalkan",
                        "displayMode": "original",
                        "whiteSpace": 'normal', //normal,nowrap,pre,pre-wrap,pre-line,break-spaces default => nowrap
                        "mobileClickIt": true
                    },
                    "Lists": [
                        {
                            "name": "baris-kiri" + data.soal_nomor_asli,
                            "list": datalist.jawaban[0]
                        },
                        {
                            "name": "baris-kanan" + data.soal_nomor_asli,
                            "list": datalist.jawaban[1],
                            //"mandatories": ["last_name", "email_adress"]
                        }
                    ],
                    "existingLinks": datalist.linked
                };
                //console.log('no-soal', nomor_soal);

                fieldLinks = $("#original").fieldsLinker("init", inputs);

                $(`ul[data-col="baris-kanan${data.soal_nomor_asli}"] li`).click(function (e) {
                    submitJawaban(null);
                });
            } else {
                html += '<table id="table-jodohkan" class="table table-bordered" data-type="' + data.soal_opsi.type + '">';
                html += '<tr class="text-center">';
                $.each(data.soal_opsi.thead, function (key, val) {
                    if (key === 0) {
                        html += '<th class="text-white">' + val + '</th>';
                    } else {
                        html += '<th class="text-center">' + val + '</th>';
                    }
                });
                html += '</tr>';
                $.each(data.soal_opsi.tbody, function (k, v) {
                    html += '<tr class="text-center">';
                    $.each(v, function (t, i) {
                        if (t === 0) {
                            html += '<td class="baris text-bold">' + i + '</td>';
                        } else {
                            const checked = i == '1' ? ' checked' : '';
                            const type = data.soal_opsi.type != '2' ? 'checkbox' : 'radio';
                            html += '<td>' +
                                '<input class="check" type="' + type + '" name="check' + k + '" style="height: 20px; width: 20px"' + checked + '>' +
                                '</td>';
                        }
                    });
                    html += '</tr>';
                });
                html += '</table>';
                $('#konten-jawaban').html(html);
            }
        } else if (jenis == "4") {
            html += '<div class="pr-4">' +
                '<span class="">JAWABAN:</span><br>' +
                '<input id="jawaban-essai" class="pl-1" type="text"' +
                ' name="jawaban" value="' + jawabanSiswa + '"' +
                ' placeholder="Tulis jawaban disini"/><br>' +
                '</div>';
            $('#konten-jawaban').html(html);
        } else {
            html += '<div class="pr-4">' +
                '<label>JAWABAN:</label><br>' +
                '<textarea id="jawaban-essai" class="w-100 pl-1" type="text"' +
                ' name="jawaban" rows="4"' +
                ' placeholder="Tulis jawaban disini">' + jawabanSiswa + '</textarea><br>' +
                '</div>';
            $('#konten-jawaban').html(html);
        }

        $('#konten-modal').html(data.soal_modal);

        var $imgs = $('.konten-soal-jawab').find('img');
        $.each($imgs, function () {
            //$(this).addClass('img-zoom');
            var curSrc = $(this).attr('src');
            var newSrc = '';
            if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                newSrc = base_url + curSrc;
                $(this).attr('src', newSrc);
            } else if (curSrc.indexOf(base_url) === -1) {
                var pathUpload = 'uploads';
                var forReplace = curSrc.split(pathUpload);
                newSrc = base_url + pathUpload + forReplace[1];
                $(this).attr('src', newSrc);
            }
            //$(this).removeAttr('style');
            $(this).on('load', function () {
                console.log('size', $(this).height() + 'x' + $(this).width());
                if ($(this).height() > 50) {
                    $(this).addClass('img-fluid');
                }
            });
            //$(this).wrap('<span style="display:inline-block"></span>').css('display', 'block').parent().zoom();
        });

        var next = $('#next');
        next.removeAttr('disabled');
        var txtnext = $('#text-next');
        $('#ic-btn').remove();
        if (soalTotal === nomorSoal) {
            next.removeClass('btn-primary');
            next.addClass('btn-success');
            next.append('<i id="ic-btn" class="fa fa-check-circle"></i>');
            txtnext.html('<b>Selesai</b>');
            //.$('#finish').removeClass('d-none');
        } else {
            next.removeClass('btn-success');
            next.addClass('btn-primary');
            next.append('<i id="ic-btn" class="fa fa-arrow-circle-right"></i>');
            txtnext.html('<b>Soal Berikutnya</b>')
            //$('#next').removeClass('d-none');
            //$('#finish').addClass('d-none');
        }

        $('video').css({'width': '100%', 'max-height': '100%'});

        $('.check').change(function () {
            submitJawaban(null);
        });

        $("#jawaban-essai").on('change keyup paste', function () {
            submitJawaban(null);
        });

        var ss = elapsed.split(":");
        h = parseInt(ss[0]);
        m = parseInt(ss[1]);
        s = parseInt(ss[2]);

        timer = data.timer;
        var tt = timer.split(":");
        th = parseInt(tt[0]);
        tm = parseInt(tt[1]);
        ts = parseInt(tt[2]);

        if (!countdown()) {
            interval = setInterval(countdown, 1000);
        }
    }

    function nextSoal() {
        $('#next').attr('disabled', 'disabled');
        $('#loading').removeClass('d-none');
        nav = (nomorSoal + 1);
        var jwb1 = jawabanSiswa;
        var jwb2 = jawabanBaru;
        if ($.isArray(jwb1) || jwb1 instanceof jQuery) {
            jwb1 = JSON.stringify(jwb1)
        }
        if (jwb2 != null && ($.isArray(jwb2) || jwb2 instanceof jQuery)) {
            jwb2 = JSON.stringify(jwb2)
        }

        if (jawabanBaru != null && jwb1 !== jwb2) {
            $('#jawab').submit();
        } else {
            loadSoalNomor(nav);
        }
    }

    function prevSoal() {
        $('#prev').attr('disabled', 'disabled');
        $('#loading').removeClass('d-none');
        nav = (nomorSoal - 1);
        var jwb1 = jawabanSiswa;
        var jwb2 = jawabanBaru;
        if ($.isArray(jwb1) || jwb1 instanceof jQuery) {
            jwb1 = JSON.stringify(jwb1)
        }
        if (jwb2 != null && ($.isArray(jwb2) || jwb2 instanceof jQuery)) {
            jwb2 = JSON.stringify(jwb2)
        }

        if (jawabanBaru != null && jwb1 !== jwb2) {
            $('#jawab').submit();
        } else {
            loadSoalNomor(nav);
        }
    }

    function updateModal(jwb) {
        var badges = $('#konten-modal').find(`#badge${nomorSoal}`);
        var btn = $('#konten-modal').find(`#btn${nomorSoal}`);
        btn.removeClass("btn-outline-secondary");
        btn.addClass("btn-primary");
        if (jenisSoal == 1) {
            if (badges.length) {
                $(`#badge${nomorSoal}`).text(jwb)
            } else {
                var badge = '<div id="badge' + nomorSoal + '" class="badge badge-pill badge-success border border-dark text-yellow"' +
                    ' style="font-size:12pt; width: 30px; height: 30px; margin-top: -60px; margin-left: 30px;">' +
                    jwb +
                    '</div>';
                $(`#box${nomorSoal}`).append(badge);
            }
        } else {
            if (!badges.length) {
                var badge = '<div id="badge' + nomorSoal + '" class="badge badge-pill badge-success border border-dark"' +
                    ' style="font-size:12pt; width: 30px; height: 30px; margin-top: -60px; margin-left: 30px;">' +
                    '&check;</div>';
                $(`#box${nomorSoal}`).append(badge);
            }
        }
    }

    function submitJawaban(opsi) {
        var jawaban_Siswa = '', jawaban_Alias = '';
        if (jenisSoal == 1) {
            jawaban_Siswa = $(opsi).data('jawabansiswa');
            jawaban_Alias = $(opsi).data('jawabanalias');
        } else if (jenisSoal == 2) {
            var selected = [];
            $('#konten-jawaban input:checked').each(function () {
                selected.push($(this).val());
            });
            jawaban_Siswa = selected;
        } else if (jenisSoal == 3) {
            var jawaban_json = modelSoal == '1' ? convertListToTable() : getDataTable();
            jawaban_Siswa = {};
            jawaban_Siswa['jawaban'] = jawaban_json;
            jawaban_Siswa['type'] = typeSoal;
            jawaban_Siswa['model'] = modelSoal;
        } else {
            jawaban_Siswa = $('#jawaban-essai').val();
        }

        jawabanBaru = jawaban_Siswa;
        if (jenisSoal == 2) {
            if ($.isArray(jawabanBaru)) jawabanBaru.sort();
        }

        updateModal(jawaban_Alias);
        jsonJawaban = createJsonJawaban(jawaban_Alias, jawaban_Siswa);
    }

    function createJsonJawaban(jawab_Alias, jawab_Siswa) {
        var siswa = $('#up').find('input[name="siswa"]').val();
        var jadwal = $('#up').find('input[name="jadwal"]').val();
        var bank = $('#up').find('input[name="bank"]').val();

        var item = {};
        item ["no_soal_alias"] = nomorSoal;
        item ["jawaban_alias"] = jawab_Alias;
        item ["jawaban_siswa"] = jawab_Siswa;
        item ["jenis"] = jenisSoal;
        item ["id_soal"] = idSoal;
        item ["id_soal_siswa"] = idSoalSiswa;
        item ["id_jadwal"] = jadwal;
        item ["id_bank"] = bank;
        item ["id_siswa"] = siswa;

        return item;
    }

    function getDataTable() {
        var tbl = $('#table-jodohkan tr').get().map(function (row) {
            var $tables = [];

            $(row).find('th').get().map(function (cell) {
                var klm = $(cell).text().trim();
                $tables.push(klm == "" ? "#" : klm);
            });

            $(row).find('td').get().map(function (cell) {
                if ($(cell).children('input').length > 0) {
                    $tables.push($(cell).find('input').prop("checked") === true ? "1" : "0");
                } else {
                    $tables.push($(cell).text().trim())
                }
            });

            return $tables;
        });
        return tbl;
    }

    function selesai() {
        if (soalTotal === soalTerjawab) {
            swal.fire({
                title: "Kamu yakin?",
                text: "Kamu akan menyelesaikan ujian",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Selesaikan!"
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        url: base_url + 'siswa/selesaiujian',
                        method: "POST",
                        data: $('#up').serialize(),
                        success: function (respon) {
                            $('#next').removeAttr('disabled');
                            $('#loading').addClass('d-none');
                            //console.log(respon);
                            if (respon.status) {
                                window.location.href = base_url + 'siswa/cbt';
                            } else {
                                swal.fire({
                                    title: "Gagal",
                                    text: "Tidak bisa menyelesaikan ujian",
                                    icon: "error"
                                });
                            }
                        },
                        error: function (xhr, error, status) {
                            console.log(xhr.responseText);
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa menyelesaikan ujian",
                                icon: "error"
                            });
                        }
                    });
                } else {
                    $('#next').removeAttr('disabled');
                    $('#loading').addClass('d-none');
                }
            });
        } else {
            swal.fire({
                title: "BELUM SELESAI!",
                text: "Masih ada soal yang belum dikerjakan",
                icon: "error",
                confirmButtonColor: "#3085d6",
            }).then(result => {
                if (result.value) {
                    $('#next').removeAttr('disabled');
                    $('#loading').addClass('d-none');
                }
            });
        }
    }

    function countdown() {
        getElapsewdTimer();
        ts--;
        if (ts < 0) {
            ts = 59;
            tm--;
        }
        if (tm < 0) {
            tm = 59;
            th--;
        }

        if (th === 0 && tm === 0 && ts === 0) {
            clearInterval(interval);
            $("#timer").html("WAKTU SUDAH HABIS");
            $('#prev').attr('disabled', 'disabled');
            $('#next').attr('disabled', 'disabled');

            var siswa = $('#up').find('input[name="siswa"]').val();
            var bank = $('#up').find('input[name="bank"]').val();
            var jadwal = $('#up').find('input[name="jadwal"]').val();

            $.ajax({
                url: base_url + 'siswa/savejawaban',
                method: 'POST',
                data: $('#jawab').serialize() + '&jadwal=' + jadwal + '&siswa=' + siswa + '&bank=' + bank + '&waktu=habis' + '&data=' + JSON.stringify(jsonJawaban),
                success: function (response) {
                    console.log('habis', response);
                    $('.konten-soal-jawab').html('');
                    dialogWaktu();
                },
                error: function (xhr, error, status) {
                    console.log(xhr.responseText);
                }
            });
            return true;
        }

        var sh = th < 10 ? '0' + th : th;
        var sm = tm < 10 ? '0' + tm : tm;
        var ss = ts < 10 ? '0' + ts : ts;
        timer = sh + ":" + sm + ":" + ss;
        $("#timer").html("<b>" + timer + "</b>");

        return false;
    }

    function dialogWaktu() {
        swal.fire({
            title: "Sudah Habis",
            text: "Waktu Ujian sudah habis, hubungi proktor",
            icon: "warning",
            allowOutsideClick: false,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then(result => {
            if (result.value) {
                window.location.href = base_url + 'siswa/cbt';
            }
        });
    }

    function getElapsewdTimer() {
        s++;
        if (s > 59) {
            s = 0;
            m++;
        }
        if (m > 59) {
            m = 0;
            h++;
        }
        elapsed = (h < 10 ? '0' + h : h) + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s);
    }

    function secondsToHMS(s) {
        var h = Math.floor(s / 3600);
        s -= h * 3600;
        var m = Math.floor(s / 60);
        s -= m * 60;

        return (h < 10 ? '0' + h : h) + ":" + (m < 10 ? '0' + m : m) + ":" + (s < 10 ? '0' + s : s);
    }

    function convertTableToList(data) {
        var kanan = data.thead;
        console.log('kanan', kanan);
        var kiri = [];
        $.each(data.tbody, function (i, v) {
            kiri.push(v.shift());
        });
        kanan.shift();

        var linked = [];
        $.each(data.tbody, function (n, arv) {
            $.each(arv, function (t, v) {
                if (v == '1') {
                    var it = {};
                    it['from'] = kiri[n];
                    it['to'] = kanan[t];
                    linked.push(it);
                }
            });
        });
        var item = {};
        item['type'] = data.type;
        item['jawaban'] = [kiri, kanan];
        item['linked'] = linked;
        console.log('test', item);
        return item;
    }

    function getListData() {
        var kolom = [];
        var baris = [];
        $(".FL-left li").each(function () {
            baris.push($(this).text());
        });
        $(".FL-right li").each(function () {
            kolom.push($(this).text());
        });
        return [kolom, baris];
    }

    function convertListToTable() {
        var results = fieldLinks.fieldsLinker("getLinks");
        var links = results.links;
        console.log('linked', links);

        var array = getListData();
        var kolom = array[0];
        console.log('kolom', kolom);
        var arrayres = [];
        $.each(array[1], function (ind, val) {
            var vv = [];
            for (let i = 0; i < kolom.length; i++) {
                var sv = '0';
                if (links.length > 0) {
                    $.each(links, function (p, isi) {
                        if (isi.from == val) {
                            if (isi.to == kolom[i]) {
                                sv = '1';
                                //console.log('k', isi.from, val);
                                //console.log('b', isi.to, kolom[i]);
                            }
                        }
                    });
                }
                vv.push(sv);
            }

            vv.unshift(val);
            arrayres.push(vv);
        });
        kolom.unshift('#');
        arrayres.unshift(kolom);
        console.log('aray', arrayres);
        return arrayres;

        //var item = {};
        //item['model'] = $('#model-opsi').val();
        //item['type'] = $('#type-opsi').val();
        //item['jawaban'] = arrayres;
        //return item;
    }

    function rtclickcheck(keyp) {
        if (navigator.appName == "Netscape" && keyp.which == 3) {
            alert(message);
            return false;
        }

        if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) {
            alert(message);
            return false;
        }
    }

    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) {
            /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) {
            /* Chrome, Safari & Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            /* IE/Edge */
            elem = window.top.document.body; //To break out of frame in IE
            elem.msRequestFullscreen();
        }
    }

</script>
