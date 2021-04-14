<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 14/07/20
 * Time: 17:46
 */

$kelasSelected = json_encode(unserialize($bank->bank_kelas));
?>

<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <button onclick="window.history.back();" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?= form_open('create', array('id' => 'create')) ?>
            <div class="card my-shadow">
                <div class="card-header">
                    <div class="card-title">
                        <h6><?= $subjudul . ' - ' . $bank->bank_kode ?></h6>
                    </div>
                    <div class="card-tools">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus mr-1"></i>Simpan
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php echo form_hidden('id_bank', $bank->id_bank) ?>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Kode Bank Soal</label>
                                <input type="text" class="form-control form-control-sm" name="kode" maxlength="20"
                                       placeholder="Masukan Kode Bank Soal" value="<?= $bank->bank_kode ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Guru Pengampu</label>
                                <?php echo form_dropdown('guru', $gurus, $bank->bank_guru_id, 'id="select-guru" class="select2 form-control form-control-sm" required'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <?php echo form_dropdown('mapel', $mapel, $bank->bank_mapel_id, 'id="select-mapel" class="form-control form-control-sm" required'); ?>
                            </div>
                        </div>
                        <div class="col-md-1 col-3">
                            <div class="form-group">
                                <label>Level</label><br>
                                <?php
                                if ($setting->jenjang == "1") {
                                    for ($i = 1; $i < 7; $i++) {
                                        $arrLevel[$i] = $i;
                                    }
                                } else if ($setting->jenjang == "2") {
                                    for ($j = 7; $j < 10; $j++) {
                                        $arrLevel[$j] = $j;
                                    }
                                } else {
                                    for ($k = 10; $k < 13; $k++) {
                                        $arrLevel[$k] = $k;
                                    }
                                }

                                echo form_dropdown('level', $arrLevel, $bank->bank_level, 'id="select-level" class="form-control form-control-sm" data-placeholder="Pilih Level Kelas" required'); ?>
                            </div>
                        </div>
                        <div class="col-md-3 col-9">
                            <div class="form-group">
                                <label>Pilih Kelas</label><br>
                                <select name="kelas[]" id="select-kelas"
                                        class="select2 form-control form-control-sm" multiple="multiple"
                                        required=""></select>
                            </div>
                        </div>
                        <!--
                        <div class="col-md-2 col-4">
                            <div class="form-group">
                                <label>Jml Soal PG</label>
                                <input type='number' id='soalpg' name='jml_soal' class='form-control form-control-sm'
                                       value="<?= $bank->jml_soal ?>" required/>
                            </div>
                        </div>
                        -->
                        <div class="col-md-2 col-4">
                            <div class="form-group">
                                <label>PG Tampil</label>
                                <input type='number' id='tampilpg' name='tampil_pg' class='form-control form-control-sm'
                                       value="<?= $bank->tampil_pg ?>" required/>
                            </div>
                        </div>
                        <div class="col-md-2 col-4">
                            <div class="form-group">
                                <label>Bobot PG %</label>
                                <input type='number' name='bobot_pg' class='form-control form-control-sm'
                                       value="<?= $bank->bobot_pg ?>"
                                       required/>
                            </div>
                        </div>
                        <!--
                        <div class="col-md-2 col-4">
                            <div class="form-group">
                                <label>Jml Soal Essai</label>
                                <input type='number' id='soalesai' name='jml_esai' class='form-control form-control-sm'
                                       value="<?= $bank->jml_esai ?>" required/>
                            </div>
                        </div>
                        -->
                        <div class="col-md-2 col-4">
                            <div class="form-group">
                                <label>Essai Tampil</label>
                                <input type='number' id='tampilesai' name='tampil_esai'
                                       class='form-control form-control-sm'
                                       value="<?= $bank->tampil_esai ?>" required/>
                            </div>
                        </div>
                        <div class="col-md-2 col-4">
                            <div class="form-group">
                                <label>Bobot Essai %</label>
                                <input type='number' name='bobot_esai' class='form-control form-control-sm'
                                       value="<?= $bank->bobot_esai ?>" required/>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="form-group">
                                <label>Opsi</label>
                                <?php
                                $opsis [''] = 'Pilih Jml Opsi :';
                                $opsis ['3'] = '3 (A, B, C)';
                                $opsis ['4'] = '4 (A, B, C, D)';
                                $opsis ['5'] = '5 (A, B, C, D, E)';

                                echo form_dropdown('opsi', $opsis, $bank->opsi, 'class="form-control form-control-sm" required'); ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="form-group">
                                <label>Status</label>
                                <?php
                                $aktifs [''] = 'Pilih Status :';
                                $aktifs ['1'] = 'Aktif';
                                $aktifs ['0'] = 'Non Aktif';

                                echo form_dropdown('status', $aktifs, $bank->status, 'class="form-control form-control-sm" required'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </section>
</div>

<script>
    let kelasSelect = JSON.parse('<?= $kelasSelected ?>');
    var idGuru = '<?=$id_guru?>';
    var idMapel = '<?=$bank->bank_mapel_id?>';

    $(document).ready(function () {
        ajaxcsrf();
        var selLevel = $('#select-level');
        var selKelas = $('#select-kelas');
        var selMapel = $('#select-mapel');
        var selGuru = $('#select-guru');

        selKelas.select2();
        selGuru.select2();

        var as = [];
        for (let i = 0; i < kelasSelect.length; i++) {
            as.push(kelasSelect[i].kelas_id);
        }

        getKelasLevel(selLevel.val(), selMapel.val());

        //console.log(kelasSelect);

        $('#create').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());
            $.ajax({
                url: base_url + "cbtbanksoal/saveBank",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    window.history.back();
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    showDangerToast();
                }
            });
        });

        function getMateriGuru(guru) {
            $.ajax({
                url: base_url + "cbtbanksoal/getmapelguru?id_guru=" + guru,
                type: "GET",
                success: function (data) {
                    console.log(data);
                    var opts = '';
                    selMapel.html(opts);
                    $.each(data, function (k, v) {
                        var selected = idMapel == k ? 'selected=selected' : '';
                        opts += '<option value="'+k+'" '+selected+'>'+v+'</option>';//new Option(v, k, false, selected);
                    });
                    selMapel.html(opts);
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                }
            });
        }

        function getKelasLevel(param, mapel) {
            console.log(idGuru);
            if (idGuru === '' || mapel == null) {

            } else {
                $.ajax({
                    url: base_url + "cbtbanksoal/getkelaslevel?level=" + param + "&id_guru=" + idGuru + '&mapel=' + mapel,
                    type: "GET",
                    success: function (data) {
                        console.log(data);
                        selKelas.html('').select2({data: null}).trigger('change');
                        //var options = '';
                        var kelas = data.kelas;
                        for (let i = 0; i < kelas.length; i++) {
                            var selected = jQuery.inArray(kelas[i].id_kelas, as) > -1;
                            selKelas.append(new Option(kelas[i].nama_kelas, kelas[i].id_kelas, false, selected));
                        }
                        selKelas.trigger('change');
                    }, error: function (xhr, status, error) {
                        console.log("error", xhr.responseText);
                    }
                });
            }
        }

        selGuru.on('change', function () {
            idGuru = $(this).val();
            //getKelasLevel(selLevel.val(), selMapel.val());
            getMateriGuru(idGuru);
        });

        selLevel.on('change', function () {
            getKelasLevel($(this).val(), selMapel.val());
        });

        selMapel.on('change', function () {
            getKelasLevel(selLevel.val(), $(this).val());
        });
    });

</script>
