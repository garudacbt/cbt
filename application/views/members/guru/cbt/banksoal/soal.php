<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 14/07/20
 * Time: 17:46
 */
?>

<div class="content-wrapper bg-white">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('cbtbanksoal') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php
            //var_dump($soal_ada);
            ?>
            <?= form_open('create', array('id' => 'create')) ?>
            <div class="card my-shadow">
                <div class="card-header">
                    <div class="card-title">
                        <h6><b>Bank
                                Soal:</b> <?= $bank->bank_kode . ' | PG: ' . $bank->jml_soal . ', Essai: ' . $bank->jml_esai ?>
                        </h6>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" id="jenis-id" name="jenis" value="1" class="form-control">
                    <input type="hidden" id="bank-id" name="bank_id" value="<?= $bank->id_bank ?>" class="form-control">
                    <input type="hidden" id="soal-id" name="soal_id"
                           value="<?= is_null($soal) ? '0' : $soal->id_soal ?>" class="form-control">
                    <input type="hidden" id="method" name="method" value="<?= is_null($soal) ? 'add' : 'edit' ?>"
                           class="form-control">
                    <span><b>PG NOMOR: </b></span><br>
                    <?php
                    $no = 1;
                    $soal_pg_ada = [];
                    $soal_esai_ada = [];
                    foreach ($soal_ada as $key => $value) {
                        if ($value->jenis == '1') {
                            //array_push($soal_pg_ada, $key+1);
                            array_push($soal_pg_ada, $value->nomor_soal);
                        } else {
                            array_push($soal_esai_ada, $value->nomor_soal);
                        }
                    }
                    //var_dump($soal_ada);
                    for ($i = 0; $i < $bank->jml_soal; $i++) : ?>
                        <a href="javascript:void(0)"
                           class="mt-1 btn btn-circle-micro <?= in_array($no, $soal_pg_ada) ? 'btn-success' : 'btn-outline-danger' ?> <?= is_null($soal) ? ($no == 1 ? 'active' : '') : ($no == $soal->nomor_soal ? 'active' : '') ?>"
                           onclick="getSoalById(<?= $bank->id_bank ?>, <?= $no ?>, <?= '1' . $no ?>, '1')"
                           id="btn-<?= '1' . $no ?>"><?= $no ?>
                        </a>
                        <?php
                        $no++;
                    endfor; ?>
                    <br><br><span><b>ESSAI NOMOR: </b></span><br>
                    <?php $noe = 1;
                    for ($i = 0; $i < $bank->jml_esai; $i++) : ?>
                        <a href="javascript:void(0)"
                           class="mt-1 btn btn-circle-micro <?= in_array($noe, $soal_esai_ada) ? 'btn-primary' : 'btn-outline-danger' ?>"
                           onclick="getSoalById(<?= $bank->id_bank ?>, <?= $noe ?>, <?= '2' . $noe ?>, '2')"
                           id="btn-<?= '2' . $noe ?>"><?= $noe ?>
                        </a>
                        <?php $noe++; endfor; ?>
                </div>
            </div>

            <div class="card my-shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div id="nomor-soal">Soal PG Nomor: 1</div>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-sm float-right">
                                <i class="fa fa-plus mr-1"></i>Simpan
                            </button>
                        </div>
                    </div>
                    <div class="soal-area mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Soal</label>
                                <textarea class="textsoal" id="textsoal"
                                          data-id="<?= $this->security->get_csrf_hash() ?>"
                                          data-name="<?= $this->security->get_csrf_token_name() ?>" name="soal"
                                          placeholder="Tulis soal disini"
                                          style="width:100%;"><?= is_null($soal) ? '' : $soal->soal ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <?php
                                $opsis [''] = 'Pilih Jawaban Benar :';
                                $opsis ['a'] = 'A';
                                $opsis ['b'] = 'B';
                                $opsis ['c'] = 'C';

                                if ($bank->opsi == 4) {
                                    $rangeAbjad = range('a', 'd');
                                    $opsis ['d'] = 'D';
                                } elseif ($bank->opsi == 5) {
                                    $rangeAbjad = range('a', 'e');
                                    $opsis ['d'] = 'D';
                                    $opsis ['d'] = 'D';
                                } else {
                                    $rangeAbjad = range('a', 'c');
                                };
                                ?>
                                <div id="root-opsi-pg">
                                    <?php
                                    foreach ($rangeAbjad as $abjad) :
                                        if (is_null($soal)) {
                                            $isi = '';
                                        } else {
                                            $isi = $abjad === 'a' ? $soal->opsi_a :
                                                ($abjad === 'b' ? $soal->opsi_b :
                                                    ($abjad === 'c' ? $soal->opsi_c :
                                                        ($abjad === 'd' ? $soal->opsi_d : $soal->opsi_e)));
                                        }
                                        ?>
                                        <div class="mb-3 ml-3">
                                            <label>Jawaban <?= strtoupper($abjad) ?></label>
                                            <textarea class="textjawaban" id="textjawaban_<?= $abjad ?>"
                                                      name="jawaban_<?= $abjad ?>"
                                                      placeholder="Place some text here"
                                                      style="width:100%;"><?= $isi ?></textarea>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="mt-1 ml-3">
                                    <label>Jawaban Benar</label>
                                    <div id="root-jawaban-pg">
                                        <?php //var_dump(trim(strtolower($soal->jawaban)));
                                        echo form_dropdown(
                                            'jawaban_pg',
                                            $opsis,
                                            is_null($soal) ? null : trim(strtolower($soal->jawaban)),
                                            'id="jawaban" class="select2 form-control" required'
                                        ); ?>
                                    </div>
                                    <div id="root-jawaban-essai" class="d-none">
										<textarea class="textjawaban-essai" id="jawaban-essai" name="jawaban_essai"
                                                  placeholder="Place some text here" style="width:100%;">
											<?= $soal->jawaban ?>
										</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </section>
</div>

<script>
    let soal_ada = '<?=is_null($soal) ? 'n' : 'y'?>';
    let bank_soal = '<?=$bank?>';
</script>
<script src="<?= base_url() ?>/assets/app/js/cbt/banksoal/soal.js"></script>
