<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 14/07/20
 * Time: 17:46
 */

$kelasSelected = json_encode(unserialize($bank->bank_kelas ?? ''));
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
                        <?php
                        echo form_hidden('id_bank', $bank->id_bank) ?>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Kode Bank Soal</label>
                                <input type="text" class="form-control form-control-sm" name="kode" maxlength="20"
                                       placeholder="Masukan Kode Bank Soal" value="<?= $bank->bank_kode ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <?php echo form_dropdown('mapel', $mapel, $bank->bank_mapel_id, 'id="select-mapel" class="select2 form-control form-control-sm" required'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Guru Pengampu</label>
                                <?php echo form_dropdown('guru', $gurus, $bank->bank_guru_id, 'id="select-guru" class="select2 form-control form-control-sm" required'); ?>
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
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-7">
                            <div class="card alert-default-primary">
                                <div class="card-body p-2">
                                    <span><b>Soal Pilihan Ganda</b></span>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Jml. Soal</label>
                                                <input id="jml-pg" type='number' name='tampil_pg'
                                                       class='form-control form-control-sm'
                                                       value="<?= $bank->tampil_pg ?>" required/>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>Bobot %</label>
                                                <input id="bobot-pg" type='number' name='bobot_pg'
                                                       class='form-control form-control-sm'
                                                       value="<?= $bank->bobot_pg ?>"
                                                       required/>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label>Opsi Jawaban</label>
                                                <?php
                                                $opsis [''] = 'Pilih Jml Opsi :';
                                                $opsis ['3'] = '3 (A, B, C)';
                                                $opsis ['4'] = '4 (A, B, C, D)';
                                                $opsis ['5'] = '5 (A, B, C, D, E)';

                                                echo form_dropdown('opsi', $opsis, $bank->opsi, 'class="form-control form-control-sm" required'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="card alert-default-warning">
                                <div class="card-body p-2">
                                    <span><b>Soal Ganda Kompleks</b></span>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Jml. Soal</label>
                                                <input id="jml-pg2" type='number' name='tampil_kompleks'
                                                       class='form-control form-control-sm'
                                                       value="<?= $bank->tampil_kompleks ?>" required/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Bobot %</label>
                                                <input id="bobot-pg2" type='number' name='bobot_kompleks'
                                                       class='form-control form-control-sm'
                                                       value="<?= $bank->bobot_kompleks ?>"
                                                       required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="card alert-default-danger">
                                <div class="card-body p-2">
                                    <span><b>Soal Menjodohkan</b></span>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Jml. Soal</label>
                                                <input id="jml-jodohkan" type='number' name='tampil_jodohkan'
                                                       class='form-control form-control-sm'
                                                       value="<?= $bank->tampil_jodohkan ?>" required/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Bobot %</label>
                                                <input id="bobot-jodohkan" type='number' name='bobot_jodohkan'
                                                       class='form-control form-control-sm'
                                                       value="<?= $bank->bobot_jodohkan ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card alert-default-success">
                                <div class="card-body p-2">
                                    <span><b>Soal Isian Singkat</b></span>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Jml. Soal</label>
                                                <input id="jml-isian" type='number' name='tampil_isian'
                                                       class='form-control form-control-sm'
                                                       value="<?= $bank->tampil_isian ?>" required/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Bobot %</label>
                                                <input id="bobot-isian" type='number' name='bobot_isian'
                                                       class='form-control form-control-sm'
                                                       value="<?= $bank->bobot_isian ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card alert-default-secondary">
                                <div class="card-body p-2">
                                    <span><b>Soal Uraian/Essai</b></span>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Jml. Soal</label>
                                                <input id="jml-essai" type='number' name='tampil_esai'
                                                       class='form-control form-control-sm'
                                                       value="<?= $bank->tampil_esai ?>" required/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Bobot %</label>
                                                <input id="bobot-essai" type='number' name='bobot_esai'
                                                       class='form-control form-control-sm'
                                                       value="<?= $bank->bobot_esai ?>" required/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <table class="w-100">
                                        <tr class="text-center">
                                            <th>Total Soal</th>
                                            <th>Total Bobot</th>
                                        </tr>
                                        <tr class="text-center text-bold text-lg">
                                            <td id="total-soal">0</td>
                                            <td id="total-bobot">0</td>
                                        </tr>
                                    </table>
                                    <small></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label>Mapel Agama</label>
                                <?php
                                echo form_dropdown('soal_agama', $mapel_agama, $bank->soal_agama, 'class="form-control form-control-sm" required'); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="form-group">
                                <label>Status Bank Soal</label>
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
    var isAdmin = '<?= $this->ion_auth->is_admin() ?>';
    let kelasSelect = JSON.parse('<?= $kelasSelected ?>');
    var idGuru = '<?=$id_guru?>';
    var idMapel = '<?=$bank->bank_mapel_id?>';

    $(document).ready(function () {
        ajaxcsrf();
        var selLevel = $('#select-level');
        var selKelas = $('#select-kelas');
        var selMapel = $('#select-mapel');
        var selGuru = $('#select-guru');

        selMapel.select2();
        selKelas.select2();
        selGuru.select2();

        var as = [];
        for (let i = 0; i < kelasSelect.length; i++) {
            as.push(kelasSelect[i].kelas_id);
        }

        getGuruMapel(selMapel.val());
        getKelasLevel(selLevel.val(), selMapel.val());

        $('#create').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());
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
            $.ajax({
                url: base_url + "cbtbanksoal/saveBank",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    swal.fire({
                        title: "Sukses",
                        html: 'Bank soal berhasil disimpan',
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    }).then(result => {
                        if (result.value) {
                            window.history.back();
                        }
                    });
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        });

        function getGuruMapel(mapel) {
            if (isAdmin) {
                $.ajax({
                    url: base_url + "cbtbanksoal/getgurumapel?id_mapel=" + mapel,
                    type: "GET",
                    success: function (data) {
                        console.log('guru', data);
                        var opts = '';
                        selGuru.html(opts);
                        $.each(data, function (k, v) {
                            var selected = idGuru == k ? 'selected=selected' : '';
                            opts += '<option value="' + k + '" ' + selected + '>' + v + '</option>';
                        });
                        selGuru.html(opts);
                        idGuru = selGuru.val();
                        getKelasLevel(selLevel.val(), selMapel.val());
                    }, error: function (xhr, status, error) {
                        console.log("error", xhr.responseText);
                    }
                });
            }
        }

        function getKelasLevel(level, mapel) {
            console.log('id_guru', idGuru);
            console.log('id_level', level);
            console.log('id_mapel', mapel);
            if (idGuru === '' || mapel == null) {
                console.log('id_guru', 'empty');
            } else {
                $.ajax({
                    url: base_url + "cbtbanksoal/getkelaslevel?level=" + level + "&id_guru=" + idGuru + '&mapel=' + mapel,
                    type: "GET",
                    success: function (data) {
                        console.log('kelas', data);
                        selKelas.html('').select2({data: null}).trigger('change');
                        var kelas = data.kelas;
                        for (let i = 0; i < kelas.length; i++) {
                            var selected = jQuery.inArray(kelas[i].id_kelas, as) > -1;
                            selKelas.append(new Option(kelas[i].kode_kelas, kelas[i].id_kelas, false, selected));
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
            console.log('id_guru_change', idGuru);
            getKelasLevel(selLevel.val(), selMapel.val());
        });

        selLevel.on('change', function () {
            getKelasLevel($(this).val(), selMapel.val());
        });

        selMapel.on('change', function () {
            getGuruMapel($(this).val());
        });

        var valBobotPg = $('#bobot-pg');
        var valBobotPg2 = $('#bobot-pg2');
        var valBobotJodohkan = $('#bobot-jodohkan');
        var valBobotIsian = $('#bobot-isian');
        var valBobotEssai = $('#bobot-essai');
        var totalBobot = $('#total-bobot');
        onChangeValueBobot();

        var valSoalPg = $('#jml-pg');
        var valSoalPg2 = $('#jml-pg2');
        var valSoalJodohkan = $('#jml-jodohkan');
        var valSoalIsian = $('#jml-isian');
        var valSoalEssai = $('#jml-essai');
        var totalSoal = $('#total-soal');
        onChangeValueJumlah();

        function onChangeValueBobot() {
            const bobotpg = valBobotPg.val() === "" ? 0 : parseInt(valBobotPg.val());
            const bobotpp2 = valBobotPg2.val() === "" ? 0 : parseInt(valBobotPg2.val());
            const bobotjodohkan = valBobotJodohkan.val() === "" ? 0 : parseInt(valBobotJodohkan.val());
            const bobotisian = valBobotIsian.val() === "" ? 0 : parseInt(valBobotIsian.val());
            const bobotessai = valBobotEssai.val() === "" ? 0 : parseInt(valBobotEssai.val());

            totalBobot.text((bobotpg + bobotpp2 + bobotjodohkan + bobotisian + bobotessai) + '');
        }

        function onChangeValueJumlah() {
            const jmlpg = valSoalPg.val() === "" ? 0 : parseInt(valSoalPg.val());
            const jmlpp2 = valSoalPg2.val() === "" ? 0 : parseInt(valSoalPg2.val());
            const jmljodohkan = valSoalJodohkan.val() === "" ? 0 : parseInt(valSoalJodohkan.val());
            const jmlisian = valSoalIsian.val() === "" ? 0 : parseInt(valSoalIsian.val());
            const jmlessai = valSoalEssai.val() === "" ? 0 : parseInt(valSoalEssai.val());

            totalSoal.text((jmlpg + jmlpp2 + jmljodohkan + jmlisian + jmlessai) + '');
        }

        valBobotPg.on('change keyup', function () {
            onChangeValueBobot();
        });
        valBobotPg2.on('change keyup', function () {
            onChangeValueBobot();
        });
        valBobotJodohkan.on('change keyup', function () {
            onChangeValueBobot();
        });
        valBobotIsian.on('change keyup', function () {
            onChangeValueBobot();
        });
        valBobotEssai.on('change keyup', function () {
            onChangeValueBobot();
        });

        valSoalPg.on('change keyup', function () {
            onChangeValueJumlah();
        });
        valSoalPg2.on('change keyup', function () {
            onChangeValueJumlah();
        });
        valSoalJodohkan.on('change keyup', function () {
            onChangeValueJumlah();
        });
        valSoalIsian.on('change keyup', function () {
            onChangeValueJumlah();
        });
        valSoalEssai.on('change keyup', function () {
            onChangeValueJumlah();
        });
    });

</script>
