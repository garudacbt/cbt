<div class="content-wrapper bg-white pt-4">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $judul ?></h1>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">

            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-3">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Jadwal</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'jadwal',
                                    $kodejadwal,
                                    null,
                                    'id="jadwal" class="form-control"'
                                ); ?>
                            </div>
                        </div>

                        <div class="col-3" id="by-kelas">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Kelas</span>
                                </div>
                                <select name="kelas" id="kelas" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <?php
                        //echo '<pre>';
                        //var_dump($kelas);
                        //echo '</pre>';
                        if (count($jadwals) === 0) : ?>
                            <div class="col-12">
                                <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                    Belum ada jadwal ujian untuk Tahun Pelajaran <b><?= $tp_active->tahun ?></b> Semester:
                                    <b><?= $smt_active->smt ?></b>
                                </div>
                            </div>
                        <?php else:
                            foreach ($jadwals as $jadwal) :?>
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h3 class="card-title mt-1"><b><?= $jadwal->bank_kode ?></b></h3>
                                        </div>
                                        <div class="card-body pt-0">
                                            <table class="w-100 table-sm">
                                                <tr>
                                                    <th class="w-25">KELAS</th>
                                                    <th>HASIL ANALISA</th>
                                                </tr>
                                                <?php
                                                $arr = unserialize($jadwal->bank_kelas);
                                                //var_dump($arr);
                                                //var_dump($kode_kelas);
                                                foreach ($arr as $k => $v) :
                                                    if ($v['kelas_id'] != null) :?>
                                                        <tr>
                                                            <td>
                                                                <?= $kode_kelas[$v['kelas_id']] ?>
                                                            </td>
                                                            <td>
                                                                <?= $kode_kelas[$v['kelas_id']] ?>

                                                                <span class="float-right">detail</span>
                                                                <!--
                                                            <a class="btn btn-xs btn-warning"
                                                               data-toggle="modal"
                                                               data-target="#editJadwalModal"
                                                               data-idmateri="<?= $value->id_materi ?>"
                                                               data-idmapel="<?= $value->id_mapel ?>"
                                                               data-judul="<?= $value->judul_materi ?>"
                                                               data-tgl="<?= isset($jadwal_materi[$value->id_materi][$v]) ? $jadwal_materi[$value->id_materi][$v] : '' ?>"
                                                               data-kelas="<?= $v ?>"
                                                               data-namakelas="<?= isset($kelas_materi[$value->id_materi][$v]) ? $kelas_materi[$value->id_materi][$v] : '' ?>"
                                                               data-mapel="<?= $value->id_mapel ?>"
                                                               data-namamapel="<?= $value->nama_mapel ?>">
                                                                Edit Jadwal
                                                            </a>
                                                            -->
                                                            </td>
                                                        </tr>
                                                    <?php endif; endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
		</div>
	</section>
</div>
<script>
    function getDetailJadwal(idJadwal) {
        $.ajax({
            type: "GET",
            url: base_url + "cbtstatus/getjadwalujianbyjadwal?id_jadwal="+idJadwal,
            cache: false,
            success: function (response) {
                console.log(response);
                var selKelas = $('#kelas');
                selKelas.html('');
                selKelas.append('<option value="">Pilih Kelas</option>');
                $.each(response, function (k, v) {
                    if (v != null) {
                        selKelas.append('<option value="'+k+'">'+v+'</option>');
                    }
                });
            }
        });
    }

    $(document).ready(function () {
        ajaxcsrf();

        var opsiJadwal = $("#jadwal");
        var opsiKelas = $("#kelas");

        opsiJadwal.prepend("<option value='' selected='selected'>Pilih Jadwal</option>");
        opsiKelas.prepend("<option value='' selected='selected'>Pilih Kelas</option>");

        function loadSiswaKelas(kelas, sesi, jadwal) {
            var empty = ruang === '' || jadwal === '';
            if (!empty) {
                url = base_url + "cbtstatus/getsiswakelas?kelas=" + kelas + '&jadwal=' + jadwal;
                refreshStatus();
            } else {
                console.log('empty')
            }
        }

        opsiKelas.change(function () {
            loadSiswaKelas($(this).val(), opsiJadwal.val())
        });

        opsiJadwal.change(function () {
            console.log($(this).val());
            getDetailJadwal($(this).val());
        });
    })
</script>
