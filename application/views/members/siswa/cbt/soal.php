<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 23/08/20
 * Time: 23:18
 */

$elapsed_id = $siswa->id_siswa . $jadwal->id_jadwal;
if (isset($elapsed->lama_ujian)) {
    $elapsed_time = $elapsed->lama_ujian;
    $reset = $elapsed->reset;
} else {
    $elapsed_time = 0;
    $reset = '0';
}

$durasi = $jadwal->durasi_ujian;
$sisa_waktu = $durasi - $elapsed_time;

$log_siswa = empty($log) ? json_encode([]) : json_encode($log);


if ($this->agent->is_browser()) {
    $agent = $this->agent->browser() . ' ' . $this->agent->version();
} elseif ($this->agent->is_mobile()) {
    $agent = $this->agent->mobile();
} else {
    $agent = 'unknown';
}

if ($agent == 'unknown') {
    return 'error';
} else {
    $os = $this->agent->platform();
    $ip = $this->input->ip_address();
}

$reset_login = $jadwal->reset_login == 1;

if ($reset_login && (!empty($log) && $agent != $log[0]->agent && $ip != $log[0]->address && $os != $log[0]->device)) :
    ?>
    <div class="content-wrapper" style="margin-top: -1px;">
        <div class="sticky">
        </div>
        <section class="content overlap pt-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="info-box bg-transparent shadow-none">
                            <img src="<?= base_url() ?>/assets/app/img/ic_graduate.png" width="60" height="60">
                            <div class="info-box-content">
                                <span class="text-white"
                                      style="font-size: 24pt; line-height: 0.7;"><b>PUSPENDIK</b></span>
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
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-shadow">
                            <div class="card-body p-3">
                                <div class="alert alert-danger text-center p-5">
                                    <h2><i class="icon fas fa-ban"></i> WARNING..!!</h2>
                                    <div class="text-lg">
                                        Ujian tidak bisa dilanjutkan
                                        <br>
                                        hubungi proktor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php else: ?>
    <div class="content-wrapper" style="margin-top: -1px;">
        <div class="sticky">
        </div>
        <section class="content overlap pt-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="info-box bg-transparent shadow-none">
                            <img src="<?= base_url() ?>/assets/app/img/ic_graduate.png" width="60" height="60">
                            <div class="info-box-content">
                                <span class="text-white"
                                      style="font-size: 24pt; line-height: 0.7;"><b>AURAsoft</b></span>
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
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-shadow">
                            <div class="card-header p-4">
                                <div class="card-title">
                                    SOAL NOMOR:
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
                                    <button class="btn btn-outline-primary btn-oval-sm no-hover" id="minus"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-outline-primary btn-oval-sm no-hover" id="plus"><i class="fa fa-plus"></i></button>
                                </div>
                                <div style="border: 1px solid; border-color: #D3D3D3">
                                    <div class="konten-soal-jawab">
                                        <div class="row p-2 mb-4 ml-1">
                                            <div id="konten-soal">
                                            </div>
                                        </div>
                                        <?= form_open('jawab', array('id' => 'jawab')) ?>
                                        <div class="row p-3">
                                            <div id="konten-jawaban" class="ml-4 col-12">
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
                                    <!--
                                    <div class="bd-highlight btn-oval-sm btn-warning no-hover pr-3 pl-3 pt-0 pb-0">
                                        <div class="icheck-red">
                                            <input type='checkbox' id="ragu" name='hasil_tampil' value='1'/>
                                            <label for="ragu" class="text-white">Ragu-ragu</label>
                                        </div>
                                    </div>
                                    -->
                                    <div class="bd-highlight">
                                        <button class="btn btn-primary btn-oval-sm" id="next" onclick="nextSoal()">
                                            <span class="mr-2 d-none d-md-inline-block"><b>Soal Berikutnya</b></span>
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </button>
                                        <button class="btn btn-success btn-oval-sm" id="finish" onclick="selesai()">
                                            <span class="mr-2 d-none d-md-inline-block"><b>Selesai</b></span>
                                            <i class="fa fa-check-circle"></i>
                                        </button>
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
                    <div class="container-fluid">
                        <span id="title-pg"><b>Nomor Soal Pilihan Ganda</b></span>
                        <br>
                        <br>
                        <div class="d-flex flex-wrap justify-content-center grid-nomor-pg">
                        </div>
                        <br>
                        <span id="title-essai"><b>Nomor Soal Essai</b></span>
                        <br>
                        <br>
                        <div class="d-flex flex-wrap justify-content-center grid-nomor-essai">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                </div>
            </div>
        </div>
    </div>

    <?= form_open('', array('id' => 'up')) ?>
    <?= form_close() ?>


    <script>
        var arrJawaban = [];
        var arrJawabanEssai = [];
        var currentItem;
        var jawabanItem;

        var log = JSON.parse('<?= $log_siswa ?>');
        var idSiswa = <?= $siswa->id_siswa ?>;
        var jadwal = JSON.parse(JSON.stringify(<?= json_encode($jadwal) ?>));
        var idJadwal = jadwal.id_jadwal;
        //console.log(runningText);
        if (log.length === 0) {
            $.ajax({
                url: base_url + "siswa/savelogujian/" + idSiswa + "/" + idJadwal,
                method: 'GET',
                success: function (data) {
                    //console.log(data);
                }, error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }

        var jumOpsi = <?= $jadwal->opsi ?>;
        var bank_id = <?= $jadwal->id_bank ?>;
        var ID = <?= $elapsed_id ?>;
        var elapsed = <?= $elapsed_time ?>;

        var interval;
        let durasi = <?= $durasi ?>;
        let sisa = <?= $sisa_waktu ?>;
        let reset = <?= $reset ?>;

        let jmlPg = <?= $jadwal->tampil_pg?>;
        let jmlPg2 = <?= $jadwal->tampil_kompleks?>;
        let jmljodohkan = <?= $jadwal->tampil_jodohkan?>;
        let jmlIsian = <?= $jadwal->tampil_isian?>;
        let jmlEssai = parseInt('<?= $jadwal->tampil_esai?>');

        let acakSoal = <?= $jadwal->acak_soal ?>;
        let acakOpsi = <?= $jadwal->acak_opsi ?>;
        let jenjang = <?= $setting->jenjang ?>;
        //console.log('jnj',jenjang);

        let lcurrentTime = localStorage.getItem('current' + ID);
        let ltargetTime = localStorage.getItem('target' + ID);
        let currentTime;
        let targetTime;
        let itemSoal = JSON.parse(JSON.stringify(<?= json_encode($soals) ?>));
        var adaEssai = jmlEssai > 0;

        if (reset === '1' || (ltargetTime == null && lcurrentTime == null)) {
            elapsed = 0;
            currentTime = new Date();
            targetTime = new Date(currentTime.getTime() + (durasi * 60000));

            localStorage.setItem('current' + ID, currentTime);
            localStorage.setItem('target' + ID, targetTime);

            //console.log('reset === 1 || (ltargetTime == null && lcurrentTime == null)');
        } else if (reset === '2') {
            currentTime = new Date();
            targetTime = new Date(currentTime.getTime() + (sisa * 60000));

            localStorage.setItem('current' + ID, currentTime);
            localStorage.setItem('target' + ID, targetTime);
            //console.log('reset=2');
        } else {
            if (elapsed === 0) {
                currentTime = new Date();
                targetTime = new Date(currentTime.getTime() + (durasi * 60000));
                localStorage.setItem('current' + ID, currentTime);
                localStorage.setItem('target' + ID, targetTime);
                //console.log('elapsed=0');
            } else {
                if (ltargetTime == null || lcurrentTime == null) {
                    currentTime = new Date();
                    targetTime = new Date(currentTime.getTime() + (durasi * 60000));
                    localStorage.setItem('current' + ID, currentTime);
                    localStorage.setItem('target' + ID, targetTime);
                    //console.log('ltargetTime == null || lcurrentTime == null');
                } else {
                    currentTime = new Date(lcurrentTime);
                    targetTime = new Date(ltargetTime);
                    //console.log('lainnya');
                }
            }
        }

        //var test = new Date();
        //var test2 = new Date(test.getTime() + (durasi * 60000));
        //console.log(new Date(test.getTime()));
        //console.log(currentTime);
        //console.log(targetTime);

        if (!checkComplete()) {
            interval = setInterval(checkComplete, 1000);
        }

        function saveElapsedTime() {
            elapsed += 1;
            $.ajax({
                url: base_url + "siswa/savetimer?id_siswa=" + idSiswa + "&id_jadwal=" + idJadwal + "&elapsed=" + elapsed + "&id_durasi=" + ID,
                method: 'GET',
                success: function (data) {
                    //console.log(data.status);
                }, error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }

        function checkComplete() {
            //console.log('target', targetTime);
            var now = new Date().getTime();
            var distance = targetTime - now;

            if (distance < 0) {
                clearInterval(interval);
                document.getElementById("timer").innerHTML = "WAKTU SUDAH HABIS";
                //console.log('swal 1');
                $('.konten-soal-jawab').html('');
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
                //alert("Time is up");
                return true;
            } else {
                //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                if (hours < 10) {
                    hours = '0' + hours;
                }

                if (minutes < 10) {
                    minutes = '0' + minutes;
                }

                if (seconds < 10) {
                    seconds = '0' + seconds;
                }

                document.getElementById("timer").innerHTML = "<b>" + hours + ":" + minutes + ":" + seconds + "</b>";

                if (seconds == '01') {
                    saveElapsedTime();
                }
                return false;
            }
        }

        /*
        document.onbeforeunload = function () {
            localStorage.setItem('current' + ID, currentTime);
        };

        window.onbeforeunload = function () {
            return 'Are you sure you want to leave?';
        };
        */
        history.pushState(null, null, '<?php echo $_SERVER["REQUEST_URI"]; ?>');
        window.addEventListener('popstate', function(event) {
            window.location.href = base_url + 'siswa/loadsoal/'+idJadwal+'/'+bank_id
        });

        function loadSoalNomor(datas) {
            $('#loading').removeClass('d-none');

            var key;
            var nomorSoal;
            var nomorTampil;
            var jenis;
            if (datas == null) {
                key = currentItem.pos;
                nomorSoal = itemSoal[currentItem.pos - 1].nomor_soal;
                nomorTampil = itemSoal[currentItem.pos - 1].no_soal_alias;
                jenis = itemSoal[currentItem.pos - 1].jenis;
            } else {
                key = $(datas).data('pos');
                nomorSoal = $(datas).data('nomorsoal');
                nomorTampil = $(datas).data('nomortampil');
                jenis = $(datas).data('jenis');
            }
            //console.log(key, nomorSoal, jenis);

            $('#daftarModal').modal('hide').data('bs.modal', null);
            $('#daftarModal').on('hidden', function () {
                $(this).data('modal', null);  // destroys modal
            });

            var dataPost = $('#up').serialize() + '&id=' + ID + '&bank=' + bank_id + '&nomor=' + nomorSoal + '&jenis=' + jenis + '&jadwal=' + idJadwal;
            console.log('post', dataPost);
            $.ajax({
                url: base_url + 'siswa/loadNomorSoal',
                method: 'POST',
                data : dataPost,
                cache: false,
                success: function (response) {
                    console .log('respon', response);
                    if (response.selesai) {
                        //console.log('swal 2');
                        swal.fire({
                            title: "Sudah Selesai",
                            text: "Ujian sudah dilaksanakan",
                            icon: "info",
                            allowOutsideClick: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        }).then(result => {
                            if (result.value) {
                                window.location.href = base_url + 'siswa/cbt';
                            }
                        });
                    } else {
                        var soal = response.soal;
                        //console.log(soal);
                        currentItem = {};
                        currentItem['pos'] = key;
                        currentItem['nomor_soal'] = nomorSoal;
                        currentItem['no_soal_alias'] = nomorTampil;
                        currentItem['jenis'] = jenis;

                        if (jenis === '2') {
                            if (soal != null) {
                                var item = itemSoal.findIndex(obj => obj.jenis === jenis, obj => obj.nomor_soal === nomorSoal);
                                itemSoal[item].jawaban = soal.jawaban_alias;
                                createModalContent();
                            }
                        }
                        setContent(soal);
                    }
                },
                error: function (xhr, error, status) {
                    console.log(xhr.responseText);
                }
            });
        }

        function prevSoal() {
            currentItem.pos = currentItem.pos - 1;
            loadSoalNomor(null);
        }

        function nextSoal() {
            if (currentItem.pos < itemSoal.length) {
                currentItem.pos = currentItem.pos + 1;
                loadSoalNomor(null);
            }
        }

        function sortAlias(arr, key) {
            return arr.sort(function (a,b) {
                var x = a[key];
                var y = b[key];
                return ((x<y) ? -1 : ((x>y) ? 1 : 0));
            });
        }

        function setContent(item) {
            //console.log('item', item);
            var values = ['A', 'B', 'C', 'D', 'E'];
            //var opsi = ['opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'opsi_e'];
            //var abjadAcak = [item.opsi_alias_a, item.opsi_alias_b, item.opsi_alias_c, item.opsi_alias_d, item.opsi_alias_e];

            var opsis = [
                {
                    'valAlias' : item.opsi_alias_a,
                    'opsi' : item.opsi_a,
                    'value' : 'A'
                },
                {
                    'valAlias' : item.opsi_alias_b,
                    'opsi' : item.opsi_b,
                    'value' : 'B'
                },
                {
                    'valAlias' : item.opsi_alias_c,
                    'opsi' : item.opsi_c,
                    'value' : 'C'
                },
                {
                    'valAlias' : item.opsi_alias_d,
                    'opsi' : item.opsi_d,
                    'value' : 'D'
                },
                {
                    'valAlias' : item.opsi_alias_e,
                    'opsi' : item.opsi_e,
                    'value' : 'E'
                },
            ];
            opsis = sortAlias(opsis, 'valAlias');

            $('#nomor-soal').html('<b>' + itemSoal[currentItem.pos - 1].no_soal_alias + '</b>');
            if (item != null) {
                $('#konten-soal').html(item.soal);

                var jawaban = '';
                if (itemSoal[currentItem.pos - 1].jenis === '1') {
                    for (let i = 0; i < jumOpsi; i++) {
                        var jwbSiswa = item.jawaban_alias != null ? item.jawaban_alias.toUpperCase() : '';
                        var checked = values[i] === jwbSiswa ? 'checked' : '';

                        jawaban += '<label class="container-jawaban font-weight-normal">' + opsis[i].opsi +
                            '<input type="radio" name="jawaban" value="' + opsis[i].value + '" ' +
                            'data-jawabansiswa="' + opsis[i].value + '" data-jawabanalias="' + opsis[i].valAlias + '" ' +
                            'data-nomor="' + itemSoal[currentItem.pos - 1].nomor_soal + '" ' +
                            'data-jenis="' + itemSoal[currentItem.pos - 1].jenis + '" onclick="submitJawaban(this)" ' + checked + '>' +
                            '<span class="checkmark shadow">' + opsis[i].valAlias + '</span>' +
                            '</label>'
                    }
                    $('#konten-jawaban').html(jawaban);
                } else {
                    var jwban = item.jenis==='2' && item.jawaban_siswa != null ? item.jawaban_siswa : '';
                    $('#konten-jawaban').html('<div class="pr-4">' +
                        '<label>JAWABAN:</label><br>' +
                        '<textarea id="jawaban-essai" class="w-100 pl-1" type="text" name="jawaban" rows="4" placeholder="Tulis jawaban disini">' + jwban + '</textarea><br>' +
                        '<button class="btn btn-success float-right" ' +
                        'data-nomor="' + itemSoal[currentItem.pos - 1].nomor_soal + '" ' +
                        'data-jenis="' + itemSoal[currentItem.pos - 1].jenis + '" onclick="submitJawaban(this)" ' + '>Simpan Jawaban</button></div>');
                }
            } else {
                $('#konten-soal').html('Soal belum dibuat');
                $('#konten-jawaban').html('Soal belum dibuat');
            }

            $('#konten-soal img').each(function () {
                var curSrc = $(this).attr('src');
                $(this).addClass('img-zoom');
                if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                    $(this).attr('src', base_url+curSrc);
                }
                //$(this).css({'font-size': size});
            });

            $('#konten-jawaban img').each(function () {
                var curSrc = $(this).attr('src');
                $(this).addClass('img-zoom');
                if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                    $(this).attr('src', base_url+curSrc);
                }
            });

            if (itemSoal[currentItem.pos - 1].no_soal_alias === '1' && itemSoal[currentItem.pos - 1].jenis === '1') {
                $('#prev').attr('disabled', 'disabled');
            } else {
                $('#prev').removeAttr('disabled');
            }

            //var finish = !adaEssai ? parseInt(item.jenis === 1) && parseInt(item.soal_end) === 1 : parseInt(item.jenis) === 2 && parseInt(item.soal_end) === 1;
            var selesai = parseInt(itemSoal[currentItem.pos - 1].no_soal_alias) === parseInt(jmlPg);
            var finish = parseInt(item.soal_end) === 1;
            if (selesai) {
                $('#next').hide();
                $('#finish').show();
            } else {
                $('#next').show();
                $('#finish').hide();
            }

            $('#loading').addClass('d-none');

            /*
            Mousetrap.bind('enter', function() {
                nextSoal()
            });

            Mousetrap.bind('right', function() {
                nextSoal()
            });

            Mousetrap.bind('left', function() {
                prevSoal()
            });

            Mousetrap.bind('a', function() {
                $('#A').click()
            });

            Mousetrap.bind('b', function() {
                $('#B').click()
            });

            Mousetrap.bind('c', function() {
                $('#C').click()
            });

            Mousetrap.bind('d', function() {
                $('#D').click()
            });

            Mousetrap.bind('e', function() {
                $('#E').click()
            });

            Mousetrap.bind('space', function() {
                $('input[type=checkbox]').click()
                radaragu();
            });
            */
        }

        function submitJawaban(opsi) {
            var nomor = $(opsi).data('nomor');
            var jenis = $(opsi).data('jenis');

            var jawabanSiswa = jenis == 1 ? $(opsi).data('jawabansiswa') : $('#jawaban-essai').val();
            var jawabanAlias = jenis == 1 ? $(opsi).data('jawabanalias') : '';

            var item = itemSoal.findIndex((obj => obj.nomor_soal == nomor));
            itemSoal[item].jawaban_alias = jawabanAlias;
            itemSoal[item].jawaban_siswa = jawabanSiswa;
            createModalContent();

            //console.log(itemSoal);
            jawabanItem = createJsonJawaban(nomor, jawabanAlias, jawabanSiswa, jenis);

            $('#jawab').submit();
        }

        function createJsonJawaban(no, jawabAlias, jawabSiswa, jenis) {
            var item = {};
            item ["nomor_soal"] = no;
            //item ["no_soal_alias"] = no;
            item ["jawaban_alias"] = jawabAlias;
            item ["jawaban_siswa"] = jawabSiswa;
            item ["jenis"] = jenis;
            item ["id_soal"] = itemSoal.id_soal;
            item ["id_jadwal"] = jadwal.id_jadwal;
            item ["id_bank"] = jadwal.id_bank;
            item ["id_siswa"] = idSiswa;

            return item;
        }

        function createModalContent() {
            arrJawaban = [];
            var gridNomorPg = '';
            var gridNomorEssai = '';
            $.each(itemSoal, function (key, entry) {
                if (entry.jenis == 1) {
                    var color = entry.jawaban_alias == null ? 'outline-secondary' : 'primary';
                    gridNomorPg += '<div class="mb-4">' +
                        '<div class="d-flex flex-column" style="width: 70px; height: 60px;">' +
                        '<button class="btn btn-' + color + ' border border-dark" ' +
                        'data-pos="' + (key + 1) + '" data-nomortampil="' + entry.no_soal_alias + '" ' +
                        'data-nomorsoal="' + entry.nomor_soal + '" data-jenis="1" ' +
                        'onclick="loadSoalNomor(this)" ' +
                        'style="width: 50px; height: 50px; ">' +
                        '<span style="font-size: 14pt"><b>' + entry.no_soal_alias + '</b></span>' +
                        '</button>';
                    if (entry.jawaban_alias != null) {
                        arrJawaban.push(entry.jawaban_alias);
                        gridNomorPg += '<div id="jawab" class="badge badge-pill badge-success border border-dark"' +
                            '  style="font-size:12pt; width: 30px; height: 30px; margin-top: -60px; margin-left: 30px;">' + entry.jawaban_alias + '</div>';
                    }
                    gridNomorPg += '</div></div>';
                } else {
                    /*
                    var color = 'outline-secondary';
                    if (entry.jawaban_siswa != null && entry.jawaban_siswa !== '') {
                        arrJawabanEssai.push(entry.jawaban_siswa);
                        color = 'primary';
                    }
                    */
                    gridNomorEssai += '<div class="mb-4">' +
                        '<div class="d-flex flex-column" style="width: 70px; height: 60px;">' +
                        '<button class="btn btn-' + color + '" ' +
                        'data-pos="' + (key + 1) + '" data-nomortampil="' + entry.no_soal_alias + '" ' +
                        'data-nomorsoal="' + entry.nomor_soal + '" data-jenis="2" ' +
                        'onclick="loadSoalNomor(this)" ' +
                        'style="width: 50px; height: 50px;">' +
                        '<span style="font-size: 14pt"><b>' + entry.no_soal_alias + '</b></span>' +
                        '</button>';
                    gridNomorEssai += '</div></div>';
                }
            });

            $('.grid-nomor-pg').html(gridNomorPg);
            $('.grid-nomor-essai').html(gridNomorEssai);

            if (jmlEssai === 0) {
                $('#title-essai').addClass('d-none');
            }
        }

        function prepareContent() {
            if (currentItem == null) {
                currentItem = {};
                currentItem['pos'] = 1;
                currentItem['nomor_soal'] = itemSoal[currentItem.pos - 1].nomor_soal;
                currentItem['no_soal_alias'] = itemSoal[currentItem.pos - 1].no_soal_alias;
                currentItem['jenis'] = '1';
            }
        }

        function shuffle(array) {
            var currentIndex = array.length, temporaryValue, randomIndex;
            // While there remain elements to shuffle...
            while (0 !== currentIndex) {
                // Pick a remaining element...
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;
                // And swap it with the current element.
                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
            }
            return array;
        }

        function createQueueNumber() {
            let arrOpsi;
            if (jenjang === 3) arrOpsi = ['A', 'B', 'C', 'D', 'E'];
            else arrOpsi = ['A', 'B', 'C', 'D'];

            let arrSoal = [];
            let arrNumPg = [];
            for (let i = 0; i < jmlPg; i++) {
                arrNumPg.push(i + 1);
            }

            let arrNumEss = [];
            for (let i = 0; i < jmlEssai; i++) {
                arrNumEss.push(i + 1);
            }

            if (acakSoal === 1) {
                arrNumPg = shuffle(arrNumPg);

                for (let j = 0; j < arrNumPg.length; j++) {
                    if (acakOpsi === 1) arrOpsi = shuffle(arrOpsi);
                    var itemA = {};
                    itemA ["no_soal_alias"] = j + 1;
                    itemA ["nomor_soal"] = arrNumPg[j];
                    itemA ["jawaban"] = '';
                    itemA ["jenis"] = '1';
                    itemA ["id_soal"] = null;
                    itemA ["id_jadwal"] = jadwal.id_jadwal;
                    itemA ["id_bank"] = jadwal.id_bank;
                    itemA ["id_siswa"] = idSiswa;
                    itemA ["opsi_alias_a"] = arrOpsi[0];
                    itemA ["opsi_alias_b"] = arrOpsi[1];
                    itemA ["opsi_alias_c"] = arrOpsi[2];
                    itemA ["opsi_alias_d"] = arrOpsi[3];
                    if (jenjang === 3) itemA ["opsi_alias_e"] = arrOpsi[4];
                    itemA ["soal_end"] = j+1 === arrNumPg.length ? '1' : '0';
                    arrSoal.push(itemA);
                }
            } else {
                for (let k = 0; k < jmlPg; k++) {
                    var itemB = {};
                    itemB ["no_soal_alias"] = k + 1;
                    itemB ["nomor_soal"] = k + 1;
                    itemB ["jawaban"] = '';
                    itemB ["jenis"] = '1';
                    itemB ["id_soal"] = null;
                    itemB ["id_jadwal"] = jadwal.id_jadwal;
                    itemB ["id_bank"] = jadwal.id_bank;
                    itemB ["id_siswa"] = idSiswa;
                    itemB ["opsi_alias_a"] = arrOpsi[0];
                    itemB ["opsi_alias_b"] = arrOpsi[1];
                    itemB ["opsi_alias_c"] = arrOpsi[2];
                    itemB ["opsi_alias_d"] = arrOpsi[3];
                    if (jenjang === 3) itemB ["opsi_alias_e"] = arrOpsi[4];
                    itemB ["soal_end"] = k+1 === jmlPg.length ? '1' : '0';
                    arrSoal.push(itemB);
                }
            }

            if (acakSoal === 1) {
                arrNumEss = shuffle(arrNumEss);

                for (let j = 0; j < arrNumEss.length; j++) {
                    var itemC = {};
                    itemC ["no_soal_alias"] = j + 1;
                    itemC ["nomor_soal"] = arrNumEss[j];
                    itemC ["jawaban"] = '';
                    itemC ["jenis"] = '2';
                    itemC ["id_soal"] = null;
                    itemC ["id_jadwal"] = jadwal.id_jadwal;
                    itemC ["id_bank"] = jadwal.id_bank;
                    itemC ["id_siswa"] = idSiswa;
                    itemC ["soal_end"] = j+1 === arrNumEss.length ? '1' : '0';
                    arrSoal.push(itemC);
                }
            } else {
                for (let k = 0; k < jmlEssai; k++) {
                    var itemD = {};
                    itemD ["no_soal_alias"] = k + 1;
                    itemD ["nomor_soal"] = k + 1;
                    itemD ["jawaban"] = '';
                    itemD ["jenis"] = '2';
                    itemD ["id_soal"] = null;
                    itemD ["id_jadwal"] = jadwal.id_jadwal;
                    itemD ["id_bank"] = jadwal.id_bank;
                    itemD ["id_siswa"] = idSiswa;
                    itemD ["soal_end"] = k+1 === jmlEssai.length ? '1' : '0';
                    arrSoal.push(itemD);
                }
            }

            var dataPost = $('#up').serialize() + '&shuffle=' + JSON.stringify(arrSoal);
            //console.log(dataPost);
            $.ajax({
                url: base_url + 'siswa/savesoalsiswa',
                type: 'JSON',
                method: 'POST',
                data: dataPost,
                success: function (response) {
                    itemSoal = response.soals;
                    //console.log(response);
                    //console.log(itemSoal);

                    prepareContent();
                    createModalContent();
                    loadSoalNomor(null);
                },
                error: function (xhr, error, status) {
                    console.log(xhr.responseText);
                }
            });
        }

        var z = 1;
        $(document).ready(function () {
            console.log('itemSoal', itemSoal);
            if (itemSoal.length === 0) {
                createQueueNumber();
            } else {
                prepareContent();
                createModalContent();
                loadSoalNomor(null);
            }

            if (elapsed < 1) {
                saveElapsedTime();
            }

            $('#jawab').on('submit', function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                //console.log($(this).serialize() + '&data=' + JSON.stringify(jawabanItem));
                $.ajax({
                    url: base_url + 'siswa/savejawaban',
                    method: 'POST',
                    data: $(this).serialize() + '&data=' + JSON.stringify(jawabanItem),
                    success: function (response) {
                        //console.log(response);
                    },
                    error: function (xhr, error, status) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $("#plus").click(function() {
                $("#konten-soal").children().each(function() {
                    $(this).children().each(function () {
                        var size = parseInt($(this).css("font-size"));
                        if (size < 30) {
                            size = (size + 1) + "px";
                            $(this).css({'font-size': size});
                        }
                    });
                });

                $("#konten-jawaban").find('p span').each(function () {
                    var size = parseInt($(this).css("font-size"));
                    if (size < 30) {
                        size = (size + 1) + "px";
                        $(this).css({'font-size': size});
                    }
                });
                /*
                $("#konten-jawaban").children().each(function() {
                    $(this).children().each(function () {
                        var size = parseInt($(this).css("font-size"));
                        if (size < 30) {
                            size = (size + 1) + "px";
                            $(this).css({'font-size': size});
                        }
                    });
                });
                */
            });

            $("#minus").click(function(){
                $("#konten-soal").children().each(function() {
                    $(this).children().each(function () {
                        var size = parseInt($(this).css("font-size"));
                        if (size > 12) {
                            size = (size - 1) + "px";
                            $(this).css({'font-size': size});
                        }
                    });
                });

                $("#konten-jawaban").find('p span').each(function () {
                    var size = parseInt($(this).css("font-size"));
                    if (size > 12) {
                        size = (size - 1) + "px";
                        $(this).css({'font-size': size});
                    }
                });
                /*
                $("#konten-jawaban").children('label').each(function() {
                    $(this).children().each(function () {
                        var size = parseInt($(this).css("font-size"));
                        if (size > 12) {
                            size = (size - 1) + "px";
                            $(this).css({'font-size': size});
                        }
                    });
                });
                */
            });
        });

        function selesai() {
            if (arrJawaban.length === parseInt(jmlPg)) {
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
                            url: base_url + 'siswa/selesaiujian/' + idSiswa+'/'+idJadwal,
                            method: "GET",
                            success: function (respon) {
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
                    }
                });
            } else {
                swal.fire({
                    title: "BELUM SELESAI!",
                    text: "Masih ada soal yang belum dikerjakan",
                    icon: "error",
                    confirmButtonColor: "#3085d6",
                });
            }
        }

    </script>
<?php endif; ?>
