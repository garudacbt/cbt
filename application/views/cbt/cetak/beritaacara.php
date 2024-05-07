<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('cbtcetak') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card my-shadow">
                <div class="card-header">
                    <h6 class="card-title">Setting Kop</h6>
                    <button class="card-tools btn btn-sm bg-primary text-white" onclick="submitKop()">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
                <div class="card-body">
                    <?= form_open('', array('id' => 'set-kop')) ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Header 1</label>
                                <textarea id="header-1" class="form-control" name="header_1" rows="2"
                                          placeholder="Header baris 1"
                                          required><?= isset($kop->header_1) ? $kop->header_1 : '' ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Header 2</label>
                                <textarea id="header-2" class="form-control" name="header_2" rows="2"
                                          placeholder="Header baris 2"
                                          required><?= isset($kop->header_2) ? $kop->header_2 : '' ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Header 3</label>
                                <textarea id="header-3" class="form-control" name="header_3" rows="2"
                                          placeholder="Header baris 3"
                                          required><?= isset($kop->header_3) ? $kop->header_3 : '' ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Header 4</label>
                                <textarea id="header-4" class="form-control" name="header_4" rows="2"
                                          placeholder="Header baris 4"
                                          required><?= isset($kop->header_4) ? $kop->header_4 : '' ?></textarea>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>

            <div class="card my-shadow">
                <div class="card-header">
                    <div class="card-title">
                        <h6>Cetak</h6>
                    </div>
                    <div id="selector" class="card-tools btn-group">
                        <button type="button" class="btn active btn-primary">By Ruang</button>
                        <button type="button" class="btn btn-outline-primary">By Kelas</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 d-none" id="by-kelas">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Kelas</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'kelas',
                                    $kelas,
                                    null,
                                    'id="kelas" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-3" id="by-ruang">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Ruang</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'ruang',
                                    $ruang,
                                    null,
                                    'id="ruang" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Sesi</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'sesi',
                                    $sesi,
                                    null,
                                    'id="sesi" class="form-control"'
                                ); ?>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Jadwal</span>
                                </div>
                                <?php
                                //echo form_dropdown('jadwal', $jadwal, null, 'id="jadwal" class="form-control"');
                                echo form_dropdown('jadwal', $mapel, null, 'id="jadwal" class="form-control"');
                                ?>
                            </div>
                        </div>
                        <div class="col-2">
                            <button class="btn bg-success text-white" id="btn-print">
                                <i class="fa fa-print"></i><span class="ml-1">Cetak</span>
                            </button>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="p-4">
                        <div style="display: flex; justify-content: center; align-items: center;">
                            <div id="print-preview" style="width: 21cm; min-height: 29cm;" class="border my-shadow p-5">
                                <table id="table-header-print"
                                       style="width: 100%; border: 0;">
                                    <tr>
                                        <td style="width:15%;">
                                            <img alt="logo kiri" id="prev-logo-kanan-print"
                                                 src="<?= isset($kop->logo_kiri) ? base_url() . $kop->logo_kiri : '' ?>"
                                                 style="width:85px; height:85px; margin: 6px;">
                                        </td>
                                        <td style="width:70%; text-align: center;">
                                            <div style="line-height: 1.1; font-family: 'Times New Roman'; font-size: 14pt"><?= isset($kop->header_1) ? $kop->header_1 : '' ?></div>
                                            <div style="line-height: 1.1; font-family: 'Times New Roman'; font-size: 16pt">
                                                <b><?= isset($kop->header_2) ? $kop->header_2 : '' ?></b></div>
                                            <div style="line-height: 1.2; font-family: 'Times New Roman'; font-size: 13pt"><?= isset($kop->header_3) ? $kop->header_3 : '' ?></div>
                                            <div style="line-height: 1.2; font-family: 'Times New Roman'; font-size: 12pt"><?= isset($kop->header_4) ? $kop->header_4 : '' ?></div>
                                        </td>
                                        <td style="width:15%;">
                                            <img alt="logo kanan" id="prev-logo-kiri-print"
                                                 src="<?= isset($kop->logo_kanan) ? base_url() . $kop->logo_kanan : '' ?>"
                                                 style="width:85px; height:85px; margin: 6px; border-style: none">
                                        </td>
                                    </tr>
                                </table>
                                <hr style="border: 1px solid; margin-bottom: 6px">
                                <br>
                                <br>
                                <div style="text-align: justify; font-family: 'Times New Roman'">
                                    Pada hari ini <span class="editable bg-gray-light" id="edit-hari"
                                                        style="display: inline-block;min-width: 20px"><?= buat_tanggal(date('D')) ?></span>
                                    tanggal <span class="editable bg-gray-light" id="edit-tanggal"
                                                  style="display: inline-block;min-width: 20px"><?= buat_tanggal(date('d')) ?></span>
                                    bulan <span class="editable bg-gray-light" id="edit-bulan"
                                                style="display: inline-block;min-width: 20px"><?= buat_tanggal(date('M')) ?></span>
                                    tahun <span class="editable bg-gray-light" id="edit-tahun"
                                                style="display: inline-block;min-width: 20px"><?= buat_tanggal(date('Y')) ?></span>
                                    telah diselenggarakan <span class="editable bg-gray-light" id="edit-jenis-ujian"
                                                                style="display: inline-block;min-width: 20px">............................................</span>
                                    untuk Mata Pelajaran <span class="editable bg-gray-light" id="edit-mapel"
                                                               style="display: inline-block;min-width: 20px">.....................................</span>
                                    dari pukul <span class="editable bg-gray-light" id="edit-waktu-mulai"
                                                     style="display: inline-block;min-width: 20px">.............</span>
                                    sampai dengan pukul <span class="editable bg-gray-light" id="edit-waktu-akhir"
                                                              style="display: inline-block;min-width: 20px">...........</span>
                                </div>
                                <br>
                                <table style="width: 100%;font-family: 'Times New Roman';">
                                    <tr>
                                        <td style="width: 30px;">1.</td>
                                        <td style="width: 30%;">
                                            Pada Sekolah/Madrasah
                                        </td>
                                        <td>:</td>
                                        <td class="editable bg-gray-light"
                                            id="edit-nama_sekolah"><?= isset($kop->sekolah) ? $kop->sekolah : '' ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td id="title-ruang">
                                            Ruang
                                        </td>
                                        <td>:</td>
                                        <td class="editable bg-gray-light" id="edit-ruang">
                                            .................................................................
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Sesi</td>
                                        <td>:</td>
                                        <td class="editable bg-gray-light" id="edit-sesi">
                                            .................................................................
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            Jumlah Peserta Seharusnya
                                        </td>
                                        <td>:</td>
                                        <td class="editable bg-gray-light" id="edit-jml-peserta">
                                            .................................................................
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            Jumlah Peserta Hadir
                                        </td>
                                        <td>:</td>
                                        <td class="editable bg-gray-light" id="edit-hadir">
                                            .................................................................
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            Jumlah Peserta Tidak Hadir
                                        </td>
                                        <td>:</td>
                                        <td class="editable bg-gray-light" id="edit-tidak-hadir">
                                            .................................................................
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            Nomor Peserta Tidak Hadir
                                        </td>
                                        <td>:</td>
                                        <td class="editable bg-gray-light" id="edit-username">
                                            .................................................................
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-top: 12px">2.</td>
                                        <td style="padding-top: 12px" colspan="3">
                                            Catatan selama <span class="editable bg-gray-light" id="edit-nama-ujian"
                                                                 style="display: inline-block;min-width: 20px">.......</span>
                                            berlangsung :
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3" style="height: 100px; border: 1px solid black; padding: 12px"
                                            class="editable bg-gray-light" id="edit-catatan"></td>
                                    </tr>
                                </table>
                                <br>
                                <br>
                                <br>
                                <br>
                                <div id="berita-ttd">
                                    <table style="width:90%; font-family: 'Times New Roman';">
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th style="text-align: center">TTD</th>
                                        </tr>
                                        <tr>
                                            <td style="width: 30px;">1.</td>
                                            <td>Pengawas 1</td>
                                            <td>:</td>
                                            <td class="editable bg-gray-light" id="edit-pengawas1">_________________________</td>
                                            <td style="padding-left: 20px" rowspan="2">1. _________________________</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                NIP/NUPTK
                                            </td>
                                            <td>:</td>
                                            <td class="editable bg-gray-light">_________________________</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 12px">2.</td>
                                            <td style="padding-top: 12px">Pengawas 2</td>
                                            <td style="padding-top: 12px">:</td>
                                            <td style="padding-top: 12px" class="editable bg-gray-light" id="edit-pengawas2">_________________________</td>
                                            <td style="padding-left: 20px" rowspan="2">2. _________________________</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                NIP/NUPTK
                                            </td>
                                            <td>:</td>
                                            <td class="editable bg-gray-light">_________________________</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 12px">3.</td>
                                            <td style="padding-top: 12px">
                                                Kepala Sekolah
                                            </td>
                                            <td style="padding-top: 12px">:</td>
                                            <td style="padding-top: 12px"
                                                class="editable bg-gray-light"><?= isset($kop->kepsek) && $kop->kepsek != '' ? $kop->kepsek : '_________________________' ?></td>
                                            <td style="padding-left: 20px" rowspan="2">3. _________________________</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                NIP/NUPTK
                                            </td>
                                            <td>:</td>
                                            <td class="editable bg-gray-light"><?= isset($kop->nip) && $kop->nip != '' ? $kop->nip : '_________________________' ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url() ?>/assets/app/js/print-area.js"></script>
<script>
    const kepsek = "<?= isset($kop->kepsek) && $kop->kepsek != "" ? $kop->kepsek : "_________________________" ?>";
    const nip = "<?= isset($kop->nip) && $kop->nip != "" ? $kop->nip : "_________________________" ?>";
    var oldVal1 = "<?=isset($kop->header_1) ? $kop->header_1 : ""?>";
    var oldVal2 = "<?=isset($kop->header_2) ? $kop->header_2 : ""?>";
    var oldVal3 = "<?=isset($kop->header_3) ? $kop->header_3 : ""?>";
    var oldVal4 = "<?=isset($kop->header_4) ? $kop->header_4 : ""?>";
    var printBy = 1;

    var HARI, TANGGAL, BULAN, TAHUN;

    function handleNull(value) {
        if (value == null || value == "0" || value == "") return "-";
        else return value;
    }

    function handleTanggal(tgl) {
        var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
        var bulans = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        if (handleNull(tgl) != "-") {
            var d = new Date(tgl);
            var curr_day = d.getDay();
            var curr_date = d.getDate();

            var curr_month = d.getMonth();
            var curr_year = d.getFullYear();

            HARI = hari[curr_day];
            TANGGAL = curr_date;
            BULAN = bulans[curr_month];
            TAHUN = curr_year;
        }
    }

    function submitKop() {
        $('#set-kop').submit();
    }

    $(document).ready(function () {
        ajaxcsrf();
        var opsiJadwal = $("#jadwal");
        var opsiRuang = $("#ruang");
        var opsiSesi = $("#sesi");
        var opsiKelas = $("#kelas");

        $('.editable').attr('contentEditable', true);

        function loadSiswaRuang(ruang, sesi, jadwal) {
            var notempty = ruang && sesi && jadwal;
            if (notempty) {
                $('#loading').removeClass('d-none');
                $.ajax({
                    type: "GET",
                    url: base_url + "cbtcetak/getsiswaruang?ruang=" + ruang + '&sesi=' + sesi + '&jadwal=' + jadwal,
                    success: function (response) {
                        $('#loading').addClass('d-none');
                        console.log('respon', response);
                        handleTanggal(response.info.jadwal.tgl_mulai);
                        $('#edit-hari').html('<b>' + HARI + '</b>');
                        $('#edit-tanggal').html('<b>' + TANGGAL + '</b>');
                        $('#edit-bulan').html('<b>' + BULAN + '</b>');
                        $('#edit-tahun').html('<b>' + TAHUN + '</b>');
                        $('#edit-jml-peserta').html('<b>' + response.siswa.length + '</b>');

                        $('#edit-jenis-ujian').html('<b>' + response.info.jadwal.nama_jenis + '</b>');
                        $('#edit-nama-ujian').html('<b>' + response.info.jadwal.nama_jenis + '<b>');
                        $('#edit-waktu-mulai').html('<b>' + response.info.sesi.waktu_mulai.substring(0, 5) + '</b>');
                        $('#edit-waktu-akhir').html('<b>' + response.info.sesi.waktu_akhir.substring(0, 5) + '</b>');
                        $('#edit-mapel').html('<b>' + response.info.jadwal.nama_mapel + '</b>');

                        previewTTD(response.info.pengawas);
                        /*
                        var p1 = response.info.pengawas.length > 0 ? response.info.pengawas[0].nama_guru : '_________________________';
                        $('#edit-pengawas1').text(p1);
                        var p2 = response.info.pengawas.length > 1 ? response.info.pengawas[1].nama_guru : '_________________________';
                        $('#edit-pengawas2').text(p2);
                         */
                        document.title = 'Berita Acara ' + response.info.jadwal.kode + ' ' + $('#edit-ruang').text() + ' ' + $('#edit-sesi').text();
                    },
                    error: function (xhr, status, error) {
                        $('#loading').addClass('d-none');
                        console.log("error", xhr.responseText);
                    }
                });
            }
        }

        function loadSiswaKelas(kelas, sesi, jadwal) {
            var notempty = kelas && sesi && jadwal;
            if (notempty) {
                $('#loading').removeClass('d-none');
                $.ajax({
                    type: "GET",
                    url: base_url + "cbtcetak/getsiswakelas?kelas=" + kelas + '&sesi=' + sesi + '&jadwal=' + jadwal,
                    success: function (response) {
                        $('#loading').addClass('d-none');
                        console.log('respon', response);
                        handleTanggal(response.info.jadwal.tgl_mulai);
                        $('#edit-hari').html('<b>' + HARI + '</b>');
                        $('#edit-tanggal').html('<b>' + TANGGAL + '</b>');
                        $('#edit-bulan').html('<b>' + BULAN + '</b>');
                        $('#edit-tahun').html('<b>' + TAHUN + '</b>');
                        $('#edit-jml-peserta').html('<b>' + response.siswa.length + '</b>');
                        $('#edit-jml-peserta').html('<b>' + response.siswa.length + '</b>');

                        $('#edit-jenis-ujian').html('<b>' + response.info.jadwal.nama_jenis + '</b>');
                        $('#edit-nama-ujian').text(response.info.jadwal.nama_jenis);
                        $('#edit-waktu-mulai').html('<b>' + response.info.sesi.waktu_mulai.substring(0, 5) + '</b>');
                        $('#edit-waktu-akhir').html('<b>' + response.info.sesi.waktu_akhir.substring(0, 5) + '</b>');
                        $('#edit-mapel').html('<b>' + response.info.jadwal.nama_mapel + '</b>');
                        previewTTD(response.info.pengawas);
                        /*
                        var p1 = response.info.pengawas.length > 0 && response.info.pengawas[0].length > 0 ? response.info.pengawas[0][0].nama_guru : '';
                        $('#edit-pengawas1').text(p1);
                        var p2 = response.info.pengawas.length > 0 && response.info.pengawas[0].length > 1 ? response.info.pengawas[0][1].nama_guru : '';
                        $('#edit-pengawas2').text(p2);
                         */
                        document.title = 'Berita Acara ' + response.info.jadwal.kode + ' ' + $('#edit-ruang').text() + ' ' + $('#edit-sesi').text();
                    },
                    error: function (xhr, status, error) {
                        $('#loading').addClass('d-none');
                        console.log("error", xhr.responseText);
                    }
                });
            }
        }

        opsiJadwal.prepend("<option value='' selected='selected'>Pilih Jadwal</option>");
        opsiRuang.prepend("<option value='' selected='selected'>Pilih Ruang</option>");
        opsiSesi.prepend("<option value='' selected='selected'>Pilih Sesi</option>");
        opsiKelas.prepend("<option value='' selected='selected'>Pilih Kelas</option>");


        opsiKelas.change(function () {
            $('#edit-ruang').text($("#kelas option:selected").text());
            loadSiswaKelas($(this).val(), opsiSesi.val(), opsiJadwal.val())
        });

        opsiRuang.change(function () {
            $('#edit-ruang').text($("#ruang option:selected").text());
            loadSiswaRuang($(this).val(), opsiSesi.val(), opsiJadwal.val())
        });

        opsiSesi.change(function () {
            $('#edit-sesi').text($("#sesi option:selected").text());
            if (printBy === 1) {
                loadSiswaRuang(opsiRuang.val(), $(this).val(), opsiJadwal.val())
            } else {
                loadSiswaKelas(opsiKelas.val(), $(this).val(), opsiJadwal.val())
            }
        });

        opsiJadwal.change(function () {
            if (printBy === 1) {
                loadSiswaRuang(opsiRuang.val(), opsiSesi.val(), $(this).val())
            } else {
                loadSiswaKelas(opsiKelas.val(), opsiSesi.val(), $(this).val())
            }
        });

        $("#btn-print").click(function () {
            var kosong = printBy === 2 ? ($('#kelas').val() === '' || ($('#sesi').val() === '') || ($('#jadwal').val() === '')) : ($('#ruang').val() === '' || ($('#sesi').val() === '') || ($('#jadwal').val() === ''));
            if (kosong) {
                Swal.fire({
                    title: "ERROR",
                    text: "Isi semua pilihan terlebih dulu",
                    icon: "error"
                })
            } else {
                $('#print-preview').print();
            }
        });

        $("#header-1").on("change keyup paste", function () {
            var currentVal = $(this).val();
            if (currentVal === oldVal1) {
                return;
            }
            oldVal1 = currentVal;
        });

        $("#header-2").on("change keyup paste", function () {
            var currentVal = $(this).val();
            if (currentVal === oldVal2) {
                return;
            }
            oldVal2 = currentVal;
        });

        $("#header-3").on("change keyup paste", function () {
            var currentVal = $(this).val();
            if (currentVal === oldVal3) {
                return;
            }
            oldVal3 = currentVal;
        });

        $("#header-4").on("change keyup paste", function () {
            var currentVal = $(this).val();
            if (currentVal === oldVal4) {
                return;
            }
            oldVal4 = currentVal;
        });

        $('#set-kop').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            swal.fire({
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
            let form = new FormData($('#set-kop')[0]);
            $.ajax({
                url: base_url + 'cbtcetak/savekopberita',
                type: 'POST',
                processData: false,
                contentType: false,
                data: form,
                success: function (response) {
                    console.log(response);
                    swal.fire({
                        title: 'Sukses',
                        text: "Template KOP berhasil disimpan",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                    }).then(result => {
                        if (result.value) {
                            window.location.href = base_url + 'cbtcetak/beritaacara'
                        }
                    });
                },
                error: function (xhr, error, status) {
                    console.log(xhr.responseText);
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        });

        $('#selector button').click(function () {
            $(this).addClass('active').siblings().addClass('btn-outline-primary').removeClass('active btn-primary');
            console.log('change')
            if (!$('#by-kelas').is(':hidden')) {
                $('#by-kelas').addClass('d-none');
                $('#by-ruang').removeClass('d-none');
                printBy = 1;
                $('#title-ruang').text('Ruang');
                loadSiswaRuang(opsiRuang.val(), opsiSesi.val(), opsiJadwal.val())
            } else {
                $('#by-kelas').removeClass('d-none');
                $('#by-ruang').addClass('d-none');
                $('#title-ruang').text('Kelas');
                printBy = 2;
                loadSiswaKelas(opsiKelas.val(), opsiSesi.val(), opsiJadwal.val())
            }
        });

        opsiKelas.select2({theme: 'bootstrap4'});
        opsiRuang.select2({theme: 'bootstrap4'});
        opsiSesi.select2({theme: 'bootstrap4'});
        opsiJadwal.select2({theme: 'bootstrap4'});

    })

    function previewTTD(pengawas) {
        //console.log('tbl', pengawas)
        var nomor = 1;
        var pengawas1 = pengawas.length > 0 ? pengawas[0].nama_guru : '';
        var pengawas2 = pengawas.length > 1 ? pengawas[1].nama_guru : '';
        var nip1 = pengawas.length > 0 ? pengawas[0].nip : '_________________________';
        var nip2 = pengawas.length > 1 ? pengawas[1].nip : '_________________________';
        var title_p1 = pengawas2 == '' ? 'Pengawas' : 'Pengawas 1';

        var table = '<table style="width:90%; font-family: \'Times New Roman\';">' +
        ' <tr>' +
        ' <th></th>' +
        ' <th></th>' +
        ' <th></th> <th></th> <th style="text-align: center">TTD</th>' +
        ' </tr>' +

        ' <tr>' +
        ' <td style="width: 30px;">'+nomor+'.</td>' +
        ' <td>'+title_p1+'</td>' +
        ' <td>:</td>' +
        ' <td class="editable bg-gray-light" id="edit-pengawas1">'+pengawas1+'</td>' +
        ' <td style="padding-left: 20px" rowspan="2">1. _________________________</td>' +
        ' </tr>' +

        ' <tr>' +
        ' <td></td>' +
        ' <td>NIP/NUPTK </td>' +
        '         <td>:</td>' +
        ' <td class="editable bg-gray-light">'+nip1+'</td>' +
        ' </tr>';
        nomor +=1;
        if (pengawas2 !== '') {
            table += ' <tr>' +
                ' <td style="padding-top: 12px">'+nomor+'.</td>' +
                ' <td style="padding-top: 12px">Pengawas 2</td>' +
                ' <td style="padding-top: 12px">:</td>' +
                ' <td style="padding-top: 12px" class="editable bg-gray-light" id="edit-pengawas2">'+pengawas2+'</td>' +
                ' <td style="padding-left: 20px" rowspan="2">'+nomor+'. _________________________</td>' +
                '</tr>' +

                ' <tr>' +
                ' <td></td>' +
                ' <td>NIP/NUPTK </td>' +
                '         <td>:</td>' +
                ' <td class="editable bg-gray-light">'+nip2+'</td>' +
                ' </tr>';
            nomor +=1;
        }
        table += ' <tr>' +
        ' <td style="padding-top: 12px">'+nomor+'.</td>' +
        ' <td style="padding-top: 12px">Kepala Sekolah</td>' +
        '         <td style="padding-top: 12px">:</td>' +
        ' <td style="padding-top: 12px"class="editable bg-gray-light">'+kepsek+'</td>' +
        '         <td style="padding-left: 20px" rowspan="2">'+nomor+'. _________________________</td>' +
        ' </tr>' +

        ' <tr>' +
        ' <td></td>' +
        ' <td>NIP/NUPTK </td>' +
        '         <td>:</td>' +
        ' <td class="editable bg-gray-light">'+nip+'</td>' +
        ' </tr>' +
        ' </table>';

        $('#berita-ttd').html(table)
        $('.editable').attr('contentEditable', true);
    }
</script>
