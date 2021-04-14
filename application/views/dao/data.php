<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 12/06/2020
 * Time: 10.26
 * @var LogDto $log
 * @var CbtRuangDto $ruang
 * @var MasterKelaDto $kelas
 */


$ruangs = [];
foreach ($druang as $ruang) {
    $ruangs[$ruang->idRuang] = $ruang->namaRuang;
}
/*
$kelases = [];
foreach ($dkelas as $kelas) {
    $kelases[$kelas->idKelas] = $kelas->namaKelas;
}
*/
?>

<div class="content-wrapper bg-white pt-4">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $judul ?></h1>
				</div>
				<!--
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">DataTables</li>
					</ol>
				</div>
				-->
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
            <?php
            echo '<pre>';
            var_dump($compile);
            echo '</pre>';
            ?>
			<div class="card card-default my-shadow mb-4">
				<div class="card-header">
					<div class="card-title"><?=$subjudul?></div>
				</div>
				<div class="card-body">
                    <div class="row">
                        <?php $dnone = $kelas_selected == null ? 'd-none"' : ''; ?>
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Jadwal</span>
                                </div>
                                <?php
                                echo form_dropdown('jadwal', $jadwal, $jadwal_selected, 'id="jadwal" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-md-3" id="by-kelas">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Kelas</span>
                                </div>
                                <?php
                                echo form_dropdown('kelas', $kelas, $kelas_selected, 'id="kelas" class="form-control"'); ?>
                            </div>
                        </div>
                    </div>

                    <hr>


                    <div class="row">
                        <?php
                        if (isset($siswa)) :
                            $bagi_pg = $info->tampil_pg / 100;
                            $bobot_pg = $info->bobot_pg / 100;
                            $bagi_essai = $info->tampil_esai / 100;
                            $bobot_essai = $info->bobot_esai / 100;
                            $colWidth = '5,15,35';
                            for($s=0;$s<$info->tampil_pg;$s++){
                                $colWidth .= ',4';
                            }
                            $colWidth .= ',10,10,10';

                            ?>
                            <div class="d-none" id="info">
                                <div id="info-ujian"></div>
                            </div>
                            <div class="col-12 <?= $dnone ?>">
                                <table class="w-100 table-sm" id="table-status" data-cols-width="<?=$colWidth?>">
                                    <tr>
                                        <td colspan="2" style="width: 120px">Soal</td>
                                        <td colspan="5"><?= $info->bank_kode ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Mata Pelajaran</td>
                                        <td colspan="5"><?= $info->nama_mapel ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Level Kelas</td>
                                        <td colspan="5"><?= $info->bank_level ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" height="60" class="align-top">Jumlah Soal</td>
                                        <td colspan="5" class="align-top"><?= $info->tampil_pg ?></td>
                                    </tr>
                                    <tr></tr>
                                    <tr>
                                        <th rowspan="2" class="text-center align-middle bg-blue" width="40" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center;">No.</th>
                                        <th rowspan="2" class="text-center align-middle bg-blue" width="100" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center;">No. Peserta</th>
                                        <th rowspan="2" class="text-center align-middle bg-blue" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center;">Nama</th>
                                        <th rowspan="2" class="text-center align-middle bg-blue" style="border: 1px solid black;border-collapse: collapse; text-align: center;" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" >Ruang</th>
                                        <th rowspan="2" class="text-center align-middle bg-blue" style="border: 1px solid black;border-collapse: collapse; text-align: center;" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" >Sesi</th>
                                        <th rowspan="2" class="text-center align-middle bg-blue" style="border: 1px solid black;border-collapse: collapse; text-align: center;" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" >Mulai</th>
                                        <th rowspan="2" class="text-center align-middle bg-blue" style="border: 1px solid black;border-collapse: collapse; text-align: center;" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" >Durasi</th>
                                        <th colspan="<?= $info->tampil_pg ?>" class="text-center align-middle bg-blue d-none" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center;">Nomor Soal</th>
                                        <th rowspan="2" class="text-center align-middle bg-blue" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center;">Jml. Benar</th>
                                        <th rowspan="2" class="text-center align-middle bg-blue" style="border: 1px solid black;border-collapse: collapse; text-align: center;" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" >Salah</th>
                                        <th colspan="3" class="text-center align-middle bg-blue" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center;">Nilai</th>
                                        <th rowspan="2" class="text-center align-middle bg-blue" data-exclude="true" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center;">Aksi</th>
                                    </tr>
                                    <tr>
                                        <?php for($s=0;$s<$info->tampil_pg;$s++) :?>
                                            <th class="text-center align-middle bg-blue p-1 d-none" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                <?=$soal_pg[$s]->nomor_soal?>
                                            </th>
                                        <?php endfor;?>
                                        <th class="text-center align-middle bg-blue p-1" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center;">PG</th>
                                        <th class="text-center align-middle bg-blue" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center;">Essai</th>
                                        <th class="text-center align-middle bg-blue" data-fill-color="b8daff" data-a-v="middle" data-a-h="center" data-b-a-s="thin" data-f-bold="true" style="border: 1px solid black;border-collapse: collapse; text-align: center;">Skor</th>
                                    </tr>

                                    <?php
                                    for ($i = 0; $i < count($siswa); $i++) :
                                        $idSiswa = $siswa[$i]->id_siswa;

                                        //PG
                                        $jawaban_pg = $jawaban[$idSiswa]['jawab_pg'];
                                        $benar_pg = 0;
                                        $salah_pg = 0;
                                        for ($j = 0; $j < count($jawaban_pg); $j++) {
                                            if ($jawaban_pg[$j] != null && $jawaban_pg[$j]->jawabanSiswa != null) {
                                                if (strtoupper($jawaban_pg[$j]->jawabanSiswa) == strtoupper($jawaban_pg[$j]->jawabanBenar)) {
                                                    $benar_pg += 1;
                                                } else {
                                                    $salah_pg += 1;
                                                }
                                            }
                                        }
                                        //console.log(benar_pg, salah_pg);
                                        $skor_pg = ($benar_pg / $bagi_pg) * $bobot_pg;
                                        //var_dump($benar_pg.', '. $salah_pg);

                                        //ESSAI
                                        $jawaban_es = $jawaban[$idSiswa]['jawab_essai'];
                                        $benar_es = 0;
                                        $salah_es = 0;
                                        $dikoreksi = false;
                                        $skor_es = 0;
                                        if ($info->tampil_esai > 0) {
                                            for ($j = 0; $j < count($jawaban_es); $j++) {
                                                if ($jawaban_es[$j] != null && isset($jawaban_es[$j]->koreksi)) {
                                                    if ($jawaban_es[$j]->koreksi === 1) {
                                                        $benar_es += 1;
                                                        $dikoreksi = true;
                                                    } else if ($jawaban_es[$j]->koreksi == 2) {
                                                        $salah_es += 1;
                                                        $dikoreksi = true;
                                                    } else {
                                                        $dikoreksi = false;
                                                        break;
                                                    }
                                                }
                                            }
                                            $skor_es = ($benar_es / $bagi_essai) * $bobot_essai;
                                        }

                                        $durasi = isset($jawaban[$idSiswa]['dur']->lamaUjian) ? $jawaban[$idSiswa]['dur']->lamaUjian . ' mnt' : '';

                                        $logging = $jawaban[$idSiswa]['log'];
                                        $mulai = '- -  :  - -';
                                        for ($k = 0; $k < count($logging); $k++) {
                                            if ($logging[$k]->logType == '1') {
                                                if ($logging[$k] != null) {
                                                    $mulai = date('H:i', strtotime($logging[$k]->logTime));
                                                }
                                            }
                                        }

                                        $disabled = strpos($mulai, '-') !== false ? 'disabled' : '';
                                        ?>
                                        <tr>
                                            <td class="text-center align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;"> <?=$i + 1?> </td>
                                            <td class="text-center align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;"> <?=$siswa[$i]->nomor_peserta?> </td>
                                            <td class="align-middle" data-a-v="middle" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse;"> <?=$siswa[$i]->nama ?> </td>
                                            <td class="text-center align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?=$siswa[$i]->kode_ruang ?></td>
                                            <td class="text-center align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?=$siswa[$i]->kode_sesi?></td>
                                            <td class="text-center align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?=$mulai?></td>
                                            <td class="text-center align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?=$durasi?></td>
                                            <?php for($s=0;$s<$info->tampil_pg;$s++) :
                                                if (isset($soal_pg[$s])) {
                                                    $ks = array_search($soal_pg[$s]->idSoal, array_column($jawaban_pg, 'id_soal'));
                                                    $jwbn = $jawaban_pg[$ks] != null && $jawaban_pg[$ks]->jawabanSiswa != null ? $jawaban_pg[$ks]->jawabanSiswa : '';
                                                    $bg = strtoupper($jwbn) == strtoupper($soal_pg[$s]->jawaban) ? 'data-fill-color="00E676"' : 'data-fill-color="FF7043"';
                                                }
                                                ?>
                                                <td class="d-none" <?=$bg?> data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?=$jwbn?></td>
                                            <?php endfor;?>
                                            <td data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?=$benar_pg?></td>
                                            <td data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?=$salah_pg?></td>
                                            <td class="text-center text-success align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;"><b> <?=$skor_pg ?> </b></td>
                                            <?php if ($dikoreksi) : ?>
                                                <td class="text-center text-success align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;"><b> <?=$skor_es ?> </b></td>
                                            <?php else : ?>
                                                <td class="text-center align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                <?php if ($info->tampil_esai == 0) : ?>
                                                    --
                                                <?php else : ?>
                                                    <button type="button" class="btn btn-xs bg-primary mb-1  <?=$disabled?>" onclick="koreksiEssai()" data-toggle="tooltip" title="Koreksi Jawaban Essai">Koreksi</button>
                                                    </td>
                                                <?php endif; endif;?>

                                            <td class="text-center align-middle" data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;"><b> <?=$skor_pg + $skor_es ?> </b></td>
                                            <td class="text-center align-middle" data-exclude="true" data-a-v="middle" data-a-h="center" data-b-a-s="thin" style="border: 1px solid black;border-collapse: collapse; text-align: center;">
                                                <button type="button" class="btn btn-xs bg-success mb-1 <?=$disabled?>" onclick="lihatJawaban(<?=$siswa[$i]->id_siswa?>)" data-toggle="tooltip" title="Reset">Lihat</button>
                                            </td>
                                        </tr>

                                    <?php endfor; ?>
                                </table>
                            </div>
                        <?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
    var idJadwal = '<?=$jadwal_selected?>';
    var isSelected = <?= isset($siswa) ? '1' : '0'?>;

    function getDetailJadwal(idJadwal) {
        $.ajax({
            type: "GET",
            url: base_url + "cbtstatus/getjadwalujianbyjadwal?id_jadwal=" + idJadwal,
            cache: false,
            success: function (response) {
                console.log(response);
                var selKelas = $('#kelas');
                selKelas.html('');
                selKelas.append('<option value="">Pilih Kelas</option>');
                $.each(response, function (k, v) {
                    if (v != null) {
                        selKelas.append('<option value="' + k + '">' + v + '</option>');
                    }
                });
            }
        });
    }

    $(document).ready(function () {
        ajaxcsrf();

        var opsiJadwal = $("#jadwal");
        var opsiKelas = $("#kelas");

        var selected = isSelected === 0 ? "selected='selected'" : "";
        opsiJadwal.prepend("<option value='' " + selected + " disabled>Pilih Jadwal</option>");
        opsiKelas.prepend("<option value='' " + selected + " disabled>Pilih Kelas</option>");

        function loadSiswaKelas(kelas, jadwal) {
            var empty = jadwal === null;
            //console.log(jadwal, kelas)
            if (!empty) {
                window.location.href = base_url + 'daotest?kelas=' + kelas + '&jadwal=' + jadwal;
            } else {
                console.log('empty')
            }
        }

        opsiKelas.change(function () {
            loadSiswaKelas($(this).val(), opsiJadwal.val())
        });

        opsiJadwal.change(function () {
            idJadwal = $(this).val();
            getDetailJadwal(idJadwal);
        });
    })
</script>