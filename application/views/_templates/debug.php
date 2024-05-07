<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 18/07/20
 * Time: 20:15
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>DEBUG</title>
</head>
<body>
<p>
    <?= $data ?>
</p>

<div class="container-fluid h-100">
    <div class="row h-100 justify-content-center">
        <div class="card card-warning w-100">
            <div class="card-header">
                <div class="card-title text-white">
                    INFO
                </div>
                <div class="card-tools">
                    <button type="button" onclick="" class="btn btn-sm">
                        <i class="fa fa-sync text-white"></i> <span class="d-none d-sm-inline-block ml-1 text-white">Reload</span>
                    </button>
                </div>
            </div>
            <div class="card-body">

            </div>
        </div>
        <div class="card card-blue w-100">
            <div class="card-header">
                <div class="card-title text-white">
                    MENU UTAMA
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($menu as $m): ?>
                        <div class="col-lg-2 col-sm-3 col-xs-4 mb-3">
                            <figure class="text-center">
                                <img class="img-fluid" src="<?= base_url() ?>/assets/app/img/<?= $m->icon ?>" width="80"
                                     height="80"/>
                                <figcaption><?= $m->title ?></figcaption>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="card card-red w-100">
            <div class="card-header">
                <div class="card-title text-white">
                    JADWAL HARI INI
                </div>
                <div class="card-tools">
                    <button type="button" onclick="" class="btn btn-sm">
                        <i class="fa fa-sync text-white"></i> <span class="d-none d-sm-inline-block ml-1 text-white">Reload</span>
                    </button>
                </div>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>


<!--
						<div class='col-md-3'>
							<label>Pilih Kelas</label><br>
							<?php
$jk = json_decode(json_encode($bank->bank_kelas));
$jumlahKelas = json_decode(json_encode(unserialize($jk ?? '')));
$jks = [];
foreach ($jumlahKelas as $j) {
    array_push($jks, $j->kelas_id);
}
echo form_dropdown(
    'kelas[]',
    $kelas,
    $jks,
    'class="select2 form-control" multiple="multiple" data-placeholder="Pilih Kelas" required'
); ?>
						</div>
						-->


</body>
</html>
