<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 14/07/20
 * Time: 17:46
 */

$dataFileAttach = [];
$att = @unserialize($soal->file);
if ($att !== false) {
    $dataFileAttach = unserialize($soal->file);
}

?>

<div class="content-wrapper bg-white">
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
            <?php
            //echo time();
            //echo '<pre>';
            //var_dump(unserialize($soal->file));
            //var_dump($soal_belum_komplit);
            //var_dump($bank);
            //echo '</pre>';
            ?>
            <?= form_open('create', array('id' => 'create')) ?>
            <div class="card my-shadow">
                <div class="card-header">
                    <div class="card-title">
                        <h6><b>Bank
                                Soal:</b> <?= $bank->bank_kode . ' | PG: ' . $bank->tampil_pg . ', Essai: ' . $bank->tampil_esai ?>
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
                    $pg_belum_komplit = [];
                    $essai_belum_komplit = [];
                    foreach ($soal_belum_komplit as $key => $value) {
                        if ($value->jenis == '1') {
                            array_push($pg_belum_komplit, $value->nomor_soal);
                        } else {
                            array_push($essai_belum_komplit, $value->nomor_soal);
                        }
                    }

                    $soal_pg_ada = [];
                    $soal_esai_ada = [];
                    foreach ($soal_ada as $key => $value) {
                        if ($value->jenis == '1') {
                            array_push($soal_pg_ada, $value->nomor_soal);
                        } else {
                            array_push($soal_esai_ada, $value->nomor_soal);
                        }
                    }
                    $tpg = $jml_pg == null || $jml_pg->nomor_soal == null ? 0 : $jml_pg->nomor_soal;
                    for ($i = 0; $i < $tpg; $i++) : ?>
                        <a href="javascript:void(0)"
                           class="mt-1 btn btn-circle-sm <?= !in_array($no, $pg_belum_komplit) ? 'btn-success' : 'btn-outline-danger' ?> <?= is_null($soal) ? ($no == 1 ? 'active' : '') : ($no == $soal->nomor_soal ? 'active' : '') ?>"
                           onclick="getSoalById(<?= $bank->id_bank ?>, <?= $no ?>, <?= '1' . $no ?>, '1')"
                           id="btn-<?= '1' . $no ?>"><?= $no ?>
                        </a>
                        <?php
                        $no++;
                    endfor; ?>
                    <a href="javascript:void(0)" class="pt-1 btn btn-oval-sm btn-outline-success" data-mapel="<?= $bank->bank_mapel_id ?>" data-bank="<?= $bank->id_bank ?>" data-nomor="<?=$no?>" onclick="tambahSoalPg(this)" id="btn-add-new-pg"><i class="fa fa-plus"></i> Tambah PG</a>

                    <br><br><span><b>ESSAI NOMOR: </b></span><br>
                    <?php $noe = 1;
                    $tes = $jml_essai == null || $jml_essai->nomor_soal == null ? 0 : $jml_essai->nomor_soal;
                    for ($i = 0; $i < $tes; $i++) : ?>
                        <a href="javascript:void(0)"
                           class="mt-1 btn btn-circle-sm <?= !in_array($noe, $essai_belum_komplit) ? 'btn-primary' : 'btn-outline-danger' ?>"
                           onclick="getSoalById(<?= $bank->id_bank ?>, <?= $noe ?>, <?= '2' . $noe ?>, '2')"
                           id="btn-<?= '2' . $noe ?>"><?= $noe ?>
                        </a>
                        <?php $noe++; endfor; ?>
                    <a href="javascript:void(0)" class="pt-1 btn btn-oval-sm btn-outline-primary" data-mapel="<?= $bank->bank_mapel_id ?>" data-bank="<?= $bank->id_bank ?>" data-nomor="<?=$noe?>" onclick="tambahSoalEssai(this)" id="btn-add-new-essai"><i class="fa fa-plus"></i> Tambah Essai</a>
                </div>
            </div>

            <div class="card my-shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div id="nomor-soal"><b>Soal PG Nomor: 1</b></div>
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
                                <div class="form-group">
                                    <label>Soal</label>
                                    <textarea class="textsoal" id="textsoal" data-id="<?= $this->security->get_csrf_hash() ?>"
                                              data-name="<?= $this->security->get_csrf_token_name() ?>" name="soal"
                                              placeholder="Tulis soal disini"
                                              style="width:100%;"><?= is_null($soal) ? '' : $soal->soal ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <?php
                                $opsis [''] = 'Pilih Jawaban Benar :';
                                $opsis ['a'] = 'A';
                                $opsis ['b'] = 'B';
                                $opsis ['c'] = 'C';

                                if ($bank->opsi == 4) {
                                    $opsis ['d'] = 'D';
                                    $rangeAbjad = range('a', 'd');
                                } elseif ($bank->opsi == 5) {
                                    $opsis ['d'] = 'D';
                                    $opsis ['e'] = 'E';
                                    $rangeAbjad = range('a', 'e');
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

            <div class="card my-shadow">
                <div class="card-header">
                    <div class="card-title">
                        <span><b>File Pendukung</b></span><br>
                        <small><i>Hnaya untuk menambahkan file audio atau video pendek</i></small>
                    </div>
                    <button type="button" data-toggle="modal" data-target="#pickerModal" class="btn btn-outline-primary btn-oval-sm card-tools"><i class="fa fa-plus"></i>
                        <span class="d-none d-sm-inline-block ml-1">Tambahkan File</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="card card-success">
                                <div class="card-body">
                                    <?= form_open_multipart('', array('id'=>'uploadharian')); ?>
                                    <div class="row">
                                        <label>Tambahkan File</label>
                                        <div class="col-12 mb-3">
                                            <div class="custom-file">
                                                <input type="file" name="upload_file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Pilih file audio</label>
                                            </div>
                                        </div>
                                        <label>Putar</label>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">kali</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <button id="upload" type="submit" class="btn btn-success w-100">
                                                <i class="fa fa-upload"></i> <span class="ml-1">Upload</span>
                                            </button>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>

                                    <div id="audios">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 mb-2">
                            <div class="card card-primary">
                                <div id="videos" class="card-body">
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="col-md-4 mb-2">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title pt-2">
                                        <h6><b>Gambar</b></h6>
                                    </div>
                                    <button class="btn btn-outline-primary btn-oval-sm card-tools"><i class="fa fa-plus"></i> Tambah</button>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <img src="<?= base_url().'assets/img/garuda_bw.png'?>" class="img-thumbnail" width="100%" height="auto">
                                        </div>
                                        <div class="col-6">
                                            <img src="<?= base_url().'assets/img/guru.png'?>" class="img-thumbnail" width="100%" height="auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?=form_open('create', array('id'=>'addfile'))?>
<div class="modal fade" id="pickerModal" tabindex="-1" role="dialog" aria-labelledby="pickerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <h5 id="pickerModalLabel">Pilih File</h5>
                    <br> hanya untuk file audio dan video
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <ul id="media-list" class="clearfix">
                        <li class="myupload">
                                    <span>
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        <input name="file_uploads" type="file" id="picupload"
                                               class="picupload">
                                    </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<?=form_close()?>

<script src="<?=base_url()?>/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?=base_url()?>/assets/app/js/mediastyler.js"></script>
<script>
    let soal_ada = '<?=is_null($soal) ? 'n' : 'y'?>';
    let idBank = '<?= $bank->id_bank ?>';
    let idSoal = '<?= is_null($soal) ? 0 : $soal->id_soal ?>';

    var dataFiles = [];
    var arrFileAttach = JSON.parse('<?= json_encode($dataFileAttach)?>');
    dataFiles = $.merge(dataFiles, arrFileAttach);

    $(function () {
        bsCustomFileInput.init();
    });

</script>
<script src="<?= base_url() ?>/assets/app/js/cbt/banksoal/soal.js"></script>
