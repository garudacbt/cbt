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
            <?= form_open('', array('id' => 'set-kop')) ?>
            <div class="card my-shadow">
                <div class="card-header">
                    <h6 class="card-title">Setting Kop Daftar Kehadiran</h6>
                    <button type="submit" class="card-tools btn btn-sm bg-primary text-white">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Header 1</label>
                                <input class="form-control" name="header_1" placeholder="Header 1"
                                       value="<?= isset($kop->header_1) ? $kop->header_1 : '' ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Header 2</label>
                                <input class="form-control" name="header_2" placeholder="Header 2"
                                       value="<?= isset($kop->header_2) ? $kop->header_2 : '' ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Header 3</label>
                                <input class="form-control" name="header_3" placeholder="Header 3"
                                       value="<?= isset($kop->header_3) ? $kop->header_3 : '' ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Header 4</label>
                                <input class="form-control" name="header_4" placeholder="Header 4"
                                       value="<?= isset($kop->header_4) ? $kop->header_4 : '' ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4 d-none">
                            <div class="form-group">
                                <label>Proktor</label>
                                <input id="input-proktor" class="form-control" name="proktor" placeholder="Proktor"
                                       value="<?= isset($kop->proktor) ? $kop->proktor : '' ?>">
                            </div>
                        </div>
                        <div class="col-md-4 d-none">
                            <div class="form-group">
                                <label>Pengawas</label>
                                <input id="input-pengawas-1" class="form-control" name="pengawas_1"
                                       placeholder="Pengawas 1"
                                       value="<?= isset($kop->pengawas_1) ? $kop->pengawas_1 : '' ?>">
                            </div>
                        </div>
                        <div class="col-md-4 d-none">
                            <div class="form-group">
                                <label>Pengawas 2</label>
                                <input id="input-pengawas-2" class="form-control" name="pengawas_2"
                                       placeholder="Pengawas 2"
                                       value="<?= isset($kop->pengawas_2) ? $kop->pengawas_2 : '' ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close() ?>

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
                        <div class="col-6 col-md-3 mb-3 d-none" id="by-kelas">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Kelas</span>
                                </div>
                                <?php
                                echo form_dropdown('kelas', $kelas, null, 'id="kelas" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3" id="by-ruang">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Ruang</span>
                                </div>
                                <?php
                                echo form_dropdown('ruang', $ruang, null, 'id="ruang" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Sesi</span>
                                </div>
                                <?php
                                echo form_dropdown('sesi', $sesi, null, 'id="sesi" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-9 col-md-4 mb-3">
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
                        <div class="col-3 col-md-2 mb-3">
                            <button class="btn bg-success text-white" id="btn-print">
                                <i class="fa fa-print"></i><span class="ml-1">Cetak</span>
                            </button>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="d-flex justify-content-center bg-gray-light" style="min-height: 300mm">
                        <div id="print-preview" class="m-4">
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
    var oldVal1 = "<?=isset($kop->header_1) ? $kop->header_1 : ""?>";
    var oldVal2 = "<?=isset($kop->header_2) ? $kop->header_2 : ""?>";
    var oldVal3 = "<?=isset($kop->header_3) ? $kop->header_3 : ""?>";
    var oldVal4 = "<?=isset($kop->header_4) ? $kop->header_4 : ""?>";
    var logoKanan = "<?=isset($kop->logo_kanan) ? base_url() . $kop->logo_kanan : ""?>";
    var logoKiri = "<?=isset($kop->logo_kiri) ? base_url() . $kop->logo_kiri : ""?>";
    var tandatangan = "<?= isset($kop->tanda_tangan) ? base_url() . $kop->tanda_tangan : ""?>";
    var proktor = "<?=isset($kop->proktor) ? $kop->proktor : ""?>";
    //var pengawas1 = "<?=isset($kop->pengawas_1) ? $kop->pengawas_1 : ""?>";
    //var pengawas2 = "<?=isset($kop->pengawas_2) ? $kop->pengawas_2 : ""?>";
    var printBy = 1;

    function handleNull(value) {
        if (value == null || value == "0" || value == "") return "-";
        else return value;
    }

    function handleTanggal(tgl) {
        var hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
        var bulans = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        var ttl = "";
        if (handleNull(tgl) != "-") {
            var d = new Date(tgl);
            var curr_day = d.getDay();
            var curr_date = d.getDate();

            var curr_month = d.getMonth();
            var curr_year = d.getFullYear();

            ttl += hari[curr_day] + ', ' + curr_date + " " + bulans[curr_month] + " " + curr_year;
        }
        return ttl;
    }

    function buatTanggal() {
        var hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
        var bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];

        var d = new Date();
        var curr_day = d.getDay();
        var curr_date = d.getDate();

        var curr_month = d.getMonth();
        var curr_year = d.getFullYear();

        return hari[curr_day] + ", " + curr_date + "  " + bulan[curr_month] + " " + curr_year;
    }

    function createPrintPreview(data) {
        console.log(data);
        //var bagi = 25;
		var bagi = 28;
        var pages = Math.ceil(data.siswa.length / bagi);
        console.log('page', pages);
        var kelasTitle = printBy === 2 ? 'Kelas' : 'Ruang';
        var kelas = printBy === 2 ? 'Kelas/Sesi' : 'Ruang/Sesi';
        var sesi = $("#sesi option:selected").text();
        //var kelasVal = printBy === 2 ? $("#kelas option:selected").text() + '/' + sesiSelected : $("#ruang option:selected").text() + '/' + sesiSelected;
        //var sesi = data.info.sesi.nama_sesi;
        var kelasVal = printBy === 2 ? data.info.kelas.nama_kelas : data.info.ruang.nama_ruang + ' (' + data.info.ruang.kode_ruang + ')';
        document.title = 'Daftar Hadir ' + data.info.jadwal.kode + ' ' + kelasVal + ' ' + sesi;
        var pengawas1 = '';
        var pengawas2 = '';
        var nip1 = '';
        var nip2 = '';
        if ($.isArray(data.info.pengawas[0])) {
            pengawas1 = data.info.pengawas.length > 0 && data.info.pengawas[0].length > 0 ? data.info.pengawas[0][0].nama_guru : '';
            pengawas2 = data.info.pengawas.length > 0 && data.info.pengawas[0].length > 1 ? data.info.pengawas[0][1].nama_guru : '';
            nip1 = data.info.pengawas.length > 0 && data.info.pengawas[0].length > 0 ? data.info.pengawas[0][0].nip : '';
            nip2 = data.info.pengawas.length > 0 && data.info.pengawas[0].length > 1 ? data.info.pengawas[0][1].nip : '';
        } else {
            pengawas1 = data.info.pengawas.length > 0 ? data.info.pengawas[0].nama_guru : '';
            pengawas2 = data.info.pengawas.length > 1 ? data.info.pengawas[1].nama_guru : '';
            nip1 = data.info.pengawas.length > 0 ? data.info.pengawas[0].nip : '';
            nip2 = data.info.pengawas.length > 1 ? data.info.pengawas[1].nip : '';
        }

        var card = '';
        for (let a = 0; a < pages; a++) {
            let t = a * bagi;
            let end = (a + 1) < pages ? t + bagi : data.siswa.length;

            card += '<div class="border my-shadow mb-3 p-4 bg-white">' +
                '<div style="-webkit-justify-content: center;justify-content: center;width: 200mm; height: 290mm;padding: 15px">';

            card += '<table style="width: 100%; border: 0;">' +
                '<tr>' +
                '<td style="width:15%;">' +
                '<img src="' + logoKiri + '" style="width:85px; height:85px; margin: 6px;">' +
                '</td>' +
                '<td style="width:70%; text-align: center;">' +
                '<div style="line-height: 1.1; font-family: \'Times New Roman\'; font-size: 14pt">' + oldVal1 + '</div>' +
                '<div style="line-height: 1.1; font-family: \'Times New Roman\'; font-size: 16pt"><b>' + oldVal2 + '</b></div>' +
                '<div style="line-height: 1.2; font-family: \'Times New Roman\'; font-size: 13pt">' + oldVal3 + '</div>' +
                '<div style="line-height: 1.2; font-family: \'Times New Roman\'; font-size: 12pt">' + oldVal4 + '</div>' +
                '</td>' +
                '<td style="width:15%;">' +
                '<img src="' + logoKanan + '" style="width:85px; height:85px; margin: 6px; border-style: none">' +
                '</td>' +
                '</tr>' +
                '</table>' +
                '<hr style="border: 1px solid; margin-bottom: 6px">' +
                '<div style="display: flex;align-items: stretch;">' +
                '<div style="flex: 50%">' +
                '<table style="width: 100%; border: 0;">' +
                '<tbody>' +
                '<tr style="line-height: 1.1;font-family: \'Times New Roman\';">' +
                '<td>' + kelasTitle + '</td><td>:</td><td>' + kelasVal + '</td>' +
                '</tr>' +
                '<tr style="line-height: 1.1;font-family: \'Times New Roman\';">' +
                '<td>Sesi</td><td>:</td><td>' + sesi + '</td>' +
                '</tr>' +
                '<tr style="line-height: 1.1;font-family: \'Times New Roman\';">' +
                '<td>Waktu</td><td>:</td><td>' + data.info.sesi.waktu_mulai + ' s/d ' + data.info.sesi.waktu_akhir + '</td>' +
                '</tr>' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '  <div style="flex: 50%">' +
                '<table style="width: 100%; border: 0;">' +
                '<tbody>' +
                '<tr style="line-height: 1.1;font-family: \'Times New Roman\';">' +
                '<td>Hari/Tanggal</td><td>:</td><td>' + handleTanggal(data.info.jadwal.tgl_mulai) + '</td>' +
                '</tr>' +
                '<tr style="line-height: 1.1;font-family: \'Times New Roman\';">' +
                '<td>Mata Pelajaran</td><td>:</td><td>' + data.info.jadwal.nama_mapel + '</td>' +
                '</tr>' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '<br>' +
                '<table style="width: 100%; border-collapse: collapse">' +
                '<tr style="font-family: \'Times New Roman\';">' +
                '<th style="border: 1px solid black; width: 40px; height: 40px; text-align: center;">No.</th>' +
                '<th style="border: 1px solid black; text-align: center;">No Peserta</th>' +
                '<th style="border: 1px solid black; text-align: center;">Nama</th>' +
                '<th style="border: 1px solid black; text-align: center;">Kelas</th>' +
                '<th colspan="2" style="border: 1px solid black; text-align: center;">Tanda Tangan</th>' +
                '<th style="border: 1px solid black; text-align: center;width: 80px;">Ket.</th>' +
                '</tr>';

            for (let i = t; i < end; i++) {
                var genap = (i + 1) % 2 === 0;
                var forGenap = genap ? (i + 1) + '.' : '';
                var forGanjil = genap ? '' : (i + 1) + '.';
                card += '<tr style="font-family: \'Times New Roman\'; font-size: 10pt">' +
                    '<td class="ts" style="line-height: 1.1;border: 1px solid black; text-align: center">' + (i + 1) + '</td>' +
                    '<td class="ts" style="line-height: 1.1;border: 1px solid black; text-align: center; padding-left: 5px">' + data.siswa[i].nomor_peserta + '</td>' +
                    '<td class="ts" style="line-height: 1.1;border: 1px solid black; padding-left: 5px">' + data.siswa[i].nama + '</td>' +
                    '<td class="ts" style="line-height: 1.1;border: 1px solid black;text-align: center;">' + data.siswa[i].kode_kelas + '</td>' +
                    '<td class="ts" style="line-height: 1.1;border-bottom: 1px solid black;width:50px;padding-left: 5px">' + forGanjil + '</td>' +
                    '<td class="ts" style="line-height: 1.1;border-bottom: 1px solid black;width:100px;padding-left: 5px">' + forGenap + '</td>' +
                    '<td class="ts" style="line-height: 1.1;border: 1px solid black;"> </td>' +
                    '</tr>';
            }
            card += '</table>';
            if (a === (pages - 1)) {
                card += '</table>' +
                    '<br>' +
                    '<br>' +
                    '<table style="width: 100%">' +
                    '<tr style="line-height: 1.1;font-family: \'Times New Roman\';font-size: 10pt">' +
                    '<td style="width: 40%; text-align: left">' +
                    '<table style="border: 1px solid black; border-collapse: collapse">' +
                    '<tr>' +
                    '<td style="padding-left: 5px;">Jumlah peserta yang seharusnya hadir</td>' +
                    '<td>:</td>' +
                    '<td style="padding-right: 5px"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> orang</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td style="border-bottom: 1px solid black;padding-left: 5px;">Jumlah peserta yang tidak hadir</td>' +
                    '<td style="border-bottom: 1px solid black;">:</td>' +
                    '<td style="border-bottom: 1px solid black; padding-right: 5px"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> orang</td>' +
                    '</tr>' +
                    '<tr >' +
                    '<td style="padding-left: 5px;">Jumlah peserta hadir</td>' +
                    '<td>:</td>' +
                    '<td style="padding-right: 5px"><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> orang</td>' +
                    '</tr>' +
                    '</table>' +
                    '</td>';
                if (pengawas2 == '') {
                    card += '<td style="width: 30%; padding-left: 10px"></td>';
                } else {
                    card += '<td style="width: 30%; padding-left: 10px">' +
                        'Pengawas 1' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<u>' + pengawas1 + '</u>' +
                        '<br>' +
                        'Nip:' + nip1 +
                        '</td>';
                }
                if (pengawas2 == '') {
                    card += '<td style="width: 30%">' +
                        'Pengawas' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<u>' + pengawas1 + '</u>' +
                        '<br>' +
                        'Nip:' + nip1 +
                        '</td>';
                } else {
                    card += '<td style="width: 30%">' +
                        'Pengawas 2' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<br>' +
                        '<u>' + pengawas2 + '</u>' +
                        '<br>' +
                        'Nip:' + nip2 +
                        '</td>';
                }
                card += '</tr>' +
                    '</table>' +
                    '</div>' +
                    '</div>';
            }
            card += '</div></div>';
            card += '<div style="page-break-after: always"></div>';
        }

        if (data.siswa.length > 0) {
            $('#print-preview').html(card);
        } else {
            $('#print-preview').html('<b>Tidak ada data siswa</b>');
        }
        $('#loading').addClass('d-none');

        if (pages > 1) {
            $('.ts').height('23px');
        } else {
            $('.ts').height('20px');
        }
    }

    $(document).ready(function () {
        ajaxcsrf();
        var opsiJadwal = $("#jadwal");
        var opsiRuang = $("#ruang");
        var opsiSesi = $("#sesi");
        var opsiKelas = $("#kelas");

        function loadSiswaRuang(ruang, sesi, jadwal) {
            var notempty = ruang && sesi && jadwal;
            console.log('ruang', ruang);

            if (notempty) {
                //$('#print-preview').addClass('d-none');
                $('#loading').removeClass('d-none');

                setTimeout(function () {
                    $.ajax({
                        type: "GET",
                        url: base_url + "cbtcetak/getsiswaruang?ruang=" + ruang + '&sesi=' + sesi + '&jadwal=' + jadwal,
                        success: function (response) {
                            createPrintPreview(response);
                        },
                        error: function (xhr, status, error) {
                            $('#loading').addClass('d-none');
                            console.log("error", xhr.responseText);
                        }
                    });
                }, 500);
            }
        }

        function loadSiswaKelas(kelas, sesi, jadwal) {
            //$('#print-preview').addClass('d-none');
            var notempty = kelas && sesi && jadwal;
            console.log('url', base_url + "cbtcetak/getsiswakelas?kelas=" + kelas + '&sesi=' + sesi + '&jadwal=' + jadwal);
            if (notempty) {
                $('#loading').removeClass('d-none');
                setTimeout(function () {
                    $.ajax({
                        type: "GET",
                        url: base_url + "cbtcetak/getsiswakelas?kelas=" + kelas + '&sesi=' + sesi + '&jadwal=' + jadwal,
                        success: function (response) {
                            createPrintPreview(response);
                        },
                        error: function (xhr, status, error) {
                            console.log("error", xhr.responseText);
                        }
                    });
                }, 500);
            }
        }

        opsiJadwal.prepend("<option value='' selected='selected'>Pilih Jadwal</option>");
        opsiRuang.prepend("<option value='' selected='selected'>Pilih Ruang</option>");
        opsiSesi.prepend("<option value='' selected='selected'>Pilih Sesi</option>");
        opsiKelas.prepend("<option value='' selected='selected'>Pilih Kelas</option>");

        opsiKelas.change(function () {
            loadSiswaKelas($(this).val(), opsiSesi.val(), opsiJadwal.val())
        });

        opsiRuang.change(function () {
            loadSiswaRuang($(this).val(), opsiSesi.val(), opsiJadwal.val())
        });

        opsiSesi.change(function () {
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

            console.log($(this).serialize());
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
                url: base_url + 'cbtcetak/savekop',
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
                            window.location.href = base_url + 'cbtcetak/absenpeserta'
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

            if (!$('#by-kelas').is(':hidden')) {
                $('#by-kelas').addClass('d-none');
                $('#by-ruang').removeClass('d-none');
                printBy = 1;
                loadSiswaRuang(opsiRuang.val(), opsiSesi.val(), opsiJadwal.val())
            } else {
                $('#by-kelas').removeClass('d-none');
                $('#by-ruang').addClass('d-none');
                printBy = 2;
                loadSiswaKelas(opsiKelas.val(), opsiSesi.val(), opsiJadwal.val())
            }
        });

        opsiKelas.select2({theme: 'bootstrap4'});
        opsiRuang.select2({theme: 'bootstrap4'});
        opsiSesi.select2({theme: 'bootstrap4'});
        opsiJadwal.select2({theme: 'bootstrap4'});

    })
</script>
