<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
?>

<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between mb-2">
                <h1><?= $subjudul ?></h1>
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
                    <div class="card-tools">
                        <button type="button" onclick="" class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </button>
                        <button id="convert" class="btn btn-sm btn-primary">
                            <i class="fas fa-download"></i> <span
                                    class="d-none d-sm-inline-block ml-1">Download Soal</span>
                        </button>
                        <a href="<?= base_url('cbtbanksoal/buatsoal/' . $bank->id_bank) ?>"
                           type="button" class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> <span
                                    class="d-none d-sm-inline-block ml-1">Tambah/Edit Soal</span>
                        </a>
                    </div>
                </div>
                <div id="tabel-konten" class="card-body">
                    <?php
                    $total_pg = isset(array_count_values(array_column($soal, 'jenis'))['1']) ? array_count_values(array_column($soal, 'jenis'))['1'] : 0;
                    $total_essai = isset(array_count_values(array_column($soal, 'jenis'))['2']) ? array_count_values(array_column($soal, 'jenis'))['2'] : 0;

                    $check_soal = isset(array_count_values(array_column($soal, 'tampilkan'))['1']) ? array_count_values(array_column($soal, 'tampilkan'))['1'] : 0;

                    //var_dump($total_essai);
                    $jk = json_decode(json_encode($bank->bank_kelas));
                    $jumlahKelas = json_decode(json_encode(unserialize($jk)));

                    $kelasbank = '';
                    $no = 1;
                    foreach ($jumlahKelas as $j) {
                        foreach ($kelas as $k) {
                            if ((isset($j->kelas_id) && isset($k->id_kelas)) && $j->kelas_id === $k->id_kelas) {
                                if ($no > 1) {
                                    $kelasbank .= ', ';
                                }
                                $kelasbank .= $k->nama_kelas;
                                $no++;
                            }
                        }
                    }
                    ?>

                    <?php if ($check_soal < ($bank->tampil_pg + $bank->tampil_esai)) :?>
                        <div class="alert alert-default-danger align-content-center" role="alert">
                            Soal Yang dicentang masih kurang dari jumlah soal yang ditampilkan, silahkan pilih soal mana saja yang akan ditampilkan dengan mencentang nomor soal.
                        </div>
                    <?php endif; ?>
                    <?php if ($total_pg < $bank->tampil_pg) :?>
                    <div class="alert alert-default-danger align-content-center" role="alert">
                        Soal PILIHAN GANDA masih kurang, klik tombol <b>(<i class="fas fa-plus"></i> Tambah/Edit Soal)</b>  untuk menambahkan
                    </div>
                    <?php endif; ?>
                    <?php if ($total_essai < $bank->tampil_esai) :?>
                        <div class="alert alert-default-danger align-content-center" role="alert">
                            Soal ESSAI masih kurang, klik tombol <b>(<i class="fas fa-plus"></i> Tambah/Edit Soal)</b>  untuk menambahkan
                        </div>
                    <?php endif; ?>

                    <?php if ($total_pg > $bank->tampil_pg) :?>
                        <div class="alert alert-default-danger align-content-center" role="alert">
                            Jumlah soal PILIHAN GANDA melebihi jumlah yang ditampilkan, silahkan pilih soal mana saja yang akan ditampilkan dengan mencentang nomor soal.
                        </div>
                    <?php endif; ?>
                    <?php if ($total_essai > $bank->tampil_esai) :?>
                        <div class="alert alert-default-danger align-content-center" role="alert">
                            Jumlah soal ESSAI melebihi jumlah yang ditampilkan, silahkan pilih soal mana saja yang akan ditampilkan dengan mencentang nomor soal.
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <td style="width: 120px">
                                        Kode Bank Soal
                                    </td>
                                    <td>
                                        <?= $bank->bank_kode ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Mata Pelajaran
                                    </td>
                                    <td>
                                        <?= $bank->nama_mapel ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Kelas
                                    </td>
                                    <td>
                                        <?= $kelasbank ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Guru
                                    </td>
                                    <td>
                                        <?= $bank->nama_guru ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <td rowspan="2" class="text-center align-middle">Pil. Ganda</td>
                                    <td>
                                        Jumlah Soal
                                    </td>
                                    <td class="text-center">
                                        <?= $total_pg ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Yang ditampilkan
                                    </td>
                                    <td class="text-center">
                                        <?= $bank->tampil_pg ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td rowspan="2" class="text-center align-middle">Essai</td>
                                    <td>
                                        Jumlah Soal
                                    </td>
                                    <td class="text-center">
                                        <?= $total_essai ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Yang ditampilkan
                                    </td>
                                    <td class="text-center">
                                        <?= $bank->tampil_esai ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><b>I. Soal Pilihan Ganda</b></h6>
                    <div class="card-tools">
                        <span><b>Jumlah PG terpilih: </b></span>
                        <span id="total-pg" class="text-lg"></span>

                        <button type="button" class="btn btn-sm btn-primary ml-3" id="save-pg">
                            <i class="fa fa-save"></i> <span class="d-none d-sm-inline-block ml-1">Simpan Soal Terpilih</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($total_pg > 0) : ?>
                    <?= form_open('', array('id' => 'select-pg')) ?>
                    <input type="hidden" name="id_bank" value="<?=$bank->id_bank?>">
                    <input type="hidden" name="jenis" value="1">
                    <input style="width: 24px; height: 24px" class="check-essai m-1" id="all-pg" type="checkbox">
                    <label for="all-pg" class="align-middle">Pilih Semua PG</label>
                    <table id="table-pg" class="table table-sm table-striped mt-3">
                        <?php
                        foreach ($soal as $s) :
                            if ($s->jenis == '1') :
                                $checked = $s->tampilkan == 1 ? 'checked' : ''?>
                                <tr>
                                    <td class="border-0" style="width: 30px">
                                        <input style="width: 24px; height: 24px" class="check-pg" id="<?= $s->id_soal ?>" type="checkbox" name="soal[]" value="<?=$s->id_soal ?>" <?=$checked?>>
                                    </td>
                                    <td class="border-0" style="width: 30px">
                                        <div class="mt-2">
                                            <?= $s->nomor_soal ?>.
                                        </div>
                                    </td>
                                    <td class="border-0 w-100">
                                        <div class="mt-2">
                                            <?= $s->soal ?>
                                        </div>
                                        <ul class="list-group list-group-unbordered pl-3"
                                            style="list-style-type: upper-alpha">
                                            <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_a) ?></li>
                                            <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_b) ?></li>
                                            <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_c) ?></li>
                                            <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_d) ?></li>
                                            <?php if ($setting->jenjang === '3') : ?>
                                                <li><?= str_replace(['<p>', '</p>'], '', $s->opsi_e) ?></li>
                                            <?php endif; ?>
                                        </ul>
                                        <div class="mb-2 mt-2">Jawaban: <b><?= strtoupper($s->jawaban) ?></b></div>
                                    </td>
                                </tr>
                            <?php endif; endforeach; ?>
                    </table>
                    <?= form_close() ?>
                    <?php else: ?>
                        <p>Tidak ada soal PG</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><b>II. Soal Essai</b></h6>
                    <div class="card-tools">
                        <span><b>Jumlah Essai terpilih: </b></span>
                        <span id="total-essai" class="text-lg"><b>20</b></span>

                        <button type="button" class="btn btn-sm btn-primary ml-3" id="save-essai">
                            <i class="fa fa-save"></i> <span class="d-none d-sm-inline-block ml-1">Simpan Soal Terpilih</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <?php if ($total_essai > 0) :?>
                    <?= form_open('', array('id' => 'select-essai')) ?>
                    <input type="hidden" name="id_bank" value="<?=$bank->id_bank?>">
                    <input type="hidden" name="jenis" value="2">
                    <input style="width: 24px; height: 24px" class="check-essai" id="all-essai" type="checkbox">
                    <table id="table-essai" class="table table-sm table-striped">
                        <?php
                        foreach ($soal as $s) :
                            if ($s->jenis == '2') :
                                $checked = $s->tampilkan == 1 ? 'checked' : ''?>
                                <tr>
                                    <td class="border-0" style="width: 30px">
                                        <input style="width: 24px; height: 24px" class="check-essai" id="<?= $s->id_soal ?>" type="checkbox" name="soal[]" value="<?=$s->id_soal ?>" <?=$checked?>>
                                    </td>
                                    <td class="border-0" style="width: 30px">
                                        <div class="mt-2">
                                            <?= $s->nomor_soal ?>.
                                        </div>
                                    </td>
                                    <td class="border-0 w-100">
                                        <div class="mt-2">
                                            <?= $s->soal ?>
                                        </div>
                                        <div class="mb-2 mt-2">Jawaban: <b><?= $s->jawaban ?></b></div>
                                    </td>
                                </tr>
                            <?php endif; endforeach; ?>
                    </table>
                    <?= form_close() ?>
                    <?php else: ?>
                    <p>Tidak ada soal essai</p>
                    <?php endif; ?>
                </div>
            </div>
            <div id="for-export" class="d-none">
                <p><b>I. Soal Pilihan Ganda</b></p>
                <table id="table-pg" style="font-size: 11pt; border: 1px solid black; border-collapse: collapse; border-spacing: 0;">
                    <tr>
                        <td style="width:40px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            NO
                        </td>
                        <td style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">
                            SOAL
                        </td>
                        <td style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">
                            JAWABAN A
                        </td>
                        <td style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">
                            JAWABAN B
                        </td>
                        <td style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">
                            JAWABAN C
                        </td>
                        <td style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">
                            JAWABAN D
                        </td>
                        <td style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold;">
                            JAWABAN E
                        </td>
                        <td style="border: 1px solid black;border-collapse: collapse;  text-align: center; font-weight: bold;">
                            JAWABAN BENAR
                        </td>
                    </tr>
                    <?php foreach ($soal as $s) :
                        if ($s->jenis == '1') : ?>
                            <tr>
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= $s->nomor_soal ?>
                                </td>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                    <?= $s->soal ?>
                                </td>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                    <?= $s->opsi_a ?>
                                </td>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                    <?= $s->opsi_b ?>
                                </td>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                    <?= $s->opsi_c ?>
                                </td>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                    <?= $s->opsi_d ?>
                                </td>
                                <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                                    <?= $s->opsi_e ?>
                                </td>
                                <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                                    <?= $s->jawaban ?>
                                </td>
                            </tr>
                        <?php endif; endforeach; ?>
                </table>
                <p>&nbsp;</p>
                <p><b>II. Soal Essai</b></p>
                <table id="table-essai" style="font-size: 11pt; border: 1px solid black; border-collapse: collapse; border-spacing: 0;">
                    <tr>
                        <td style="width:40px; border: 1px solid black;border-collapse: collapse; text-align: center;font-weight: bold;">
                            NO
                        </td>
                        <td style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 300px">
                            SOAL
                        </td>
                        <td style="border: 1px solid black;border-collapse: collapse; text-align: center; font-weight: bold; width: 200px">
                            JAWABAN
                        </td>
                    </tr>
                    <?php
                    $count = 0;
                    foreach ($soal as $s) :
                    if ($s->jenis == '2') :
                    $count++;
                    ?>
                    <tr>
                        <td style="border: 1px solid black;vertical-align: top;text-align: center;">
                            <?= $s->nomor_soal ?>
                        </td>
                        <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                            <?= $s->soal ?>
                        </td>
                        <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">
                            <?= $s->jawaban ?>
                        </td>
                    </tr>
                    <?php endif; endforeach; ?>
                    <?php if ($count == 0): ?>
                    <tr>
                        <td style="border: 1px solid black;vertical-align: top;text-align: center;">1</td>
                        <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">...</td>
                        <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">...</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;vertical-align: top;text-align: center;">2</td>
                        <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">...</td>
                        <td style="border: 1px solid black; vertical-align: top; padding-left: 6px">...</td>
                    </tr>
                    <?php endif;?>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/jquery.wordexport.js"></script>

<script>
    var jmlPgTampil = '<?=$bank->tampil_pg?>';
    var jmlEssaiTampil = '<?=$bank->tampil_esai?>';

    $("#convert").click(function (event) {
        $("#for-export").wordExport('Soal <?= $bank->nama_mapel ?> Kls <?= $bank->bank_level ?>');
    });

    $(document).ready(function () {

        $('#table-pg tbody tr img').each(function () {
            var curSrc = $(this).attr('src');
            if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                $(this).attr('src', base_url+curSrc);
            }
        });

        $('#table-essai tbody tr img').each(function () {
            var curSrc = $(this).attr('src');
            if (curSrc.indexOf("http") === -1 && curSrc.indexOf("data:image") === -1) {
                $(this).attr('src', base_url+curSrc);
            }
        });

        var itemUnchecked = [];
        var essaiUnchecked = [];

        function findUnchecked() {
            itemUnchecked = [];
            essaiUnchecked = [];
            $("#table-pg tbody tr .check-pg:not(:checked)").each(function () {
                itemUnchecked.push($(this).val());
            });

            $("#table-essai tbody tr .check-essai:not(:checked)").each(function () {
                essaiUnchecked.push($(this).val());
            });

            var checked = $("#table-pg tbody tr .check-pg:checked").length;
            $('#total-pg').html(`<b>${checked}</b>`);
            //console.log('unchecked',itemUnchecked);
            var essaiChecked = $("#table-essai tbody tr .check-essai:checked").length;
            $('#total-essai').html(`<b>${essaiChecked}</b>`);
        }

        findUnchecked();

        $("#table-pg tbody").on("change", "tr .check-pg", function () {
            //var uncheck = $("#table-pg tbody tr .check-pg:not(:checked)").length;
            //var checked = $("#table-pg tbody tr .check-pg:checked").length;
            //console.log('checked', $(this).val(), uncheck);
            findUnchecked();
        });

        $("#table-essai tbody").on("change", "tr .check-essai", function () {
            findUnchecked();
        });

        $("#all-pg").on("click", function () {
            if (this.checked) {
                $(".check-pg").each(function () {
                    this.checked = true;
                    $("#all-pg").prop("checked", true);
                });
            } else {
                $(".check-pg").each(function () {
                    this.checked = false;
                    $("#all-pg").prop("checked", false);
                });
            }
            findUnchecked();
        });

        $('#save-pg').on('click', function (e) {
            var dataPost = $('#select-pg').serialize() + "&uncheck="+JSON.stringify(itemUnchecked);
            console.log(dataPost);

            var checked = $("#table-pg tbody tr .check-pg:checked").length;
            if (checked !== parseInt(jmlPgTampil)) {
                swal.fire({
                    title: "Info",
                    html: `Soal terpilih: ${checked} <br>Soal yang ditampilkan: ${jmlPgTampil}`,
                    icon: "error"
                });
            } else {
                $.ajax({
                    url: base_url + "cbtbanksoal/saveSelected",
                    type: "POST",
                    dataType: "JSON",
                    data: dataPost,
                    success: function (data) {
                        console.log(data);
                        if (data.check > 0) {
                            showSuccessToast(`${data.check} Soal terpilih berhasil disimpan`)
                        } else {
                            showDangerToast('Soal terpilih gagal disimpan')
                        }
                    }, error: function (xhr, status, error) {
                        console.log("error", xhr.responseText);
                        showDangerToast('Error');
                    }
                });
            }
        })

        $('#save-essai').on('click', function (e) {
            var dataPost = $('#select-essai').serialize() + "&uncheck="+JSON.stringify(essaiUnchecked);
            console.log(dataPost);

            var checked = $("#table-essai tbody tr .check-essai:checked").length;
            if (checked !== parseInt(jmlEssaiTampil)) {
                swal.fire({
                    title: "Info",
                    html: `Soal terpilih: ${checked} <br>Soal yang ditampilkan: ${jmlEssaiTampil}`,
                    icon: "error"
                });
            } else {
                $.ajax({
                    url: base_url + "cbtbanksoal/saveSelected",
                    type: "POST",
                    dataType: "JSON",
                    data: dataPost,
                    success: function (data) {
                        console.log(data);
                        if (data.check > 0) {
                            showSuccessToast(`${data.check} Soal terpilih berhasil disimpan`)
                        } else {
                            showDangerToast('Soal terpilih gagal disimpan')
                        }
                    }, error: function (xhr, status, error) {
                        console.log("error", xhr.responseText);
                        showDangerToast('Error');
                    }
                });
            }
        })
    })

</script>