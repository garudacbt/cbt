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
            <div class="row ml-2 mb-3">
                <a type="button" href="<?= base_url('cbtjadwal') ?>" class="btn btn-sm btn-default mr-2"
                   data-toggle="tooltip"
                   title="Reload">
                    <i class="fa fa-sync ml-1 mr-1 mt-2"></i> Reload
                </a>
                <a href="<?= base_url('cbtjadwal/add/0') ?>" class="btn btn-primary p-2" data-toggle="tooltip"
                   title="Tambah Jadwal Penilaian">
                    <i class="fas fa-plus"></i><span class="ml-2"> Tambah Jadwal</span>
                </a>
                <!--
                <span data-toggle="tooltip" title="Tambah Jadwal Penilaian">
                    <button class='btn btn-primary' data-toggle='modal' data-target='#tambahjadwal'
                            data-id="" data-kode="" data-bank="" data-durasi="" data-mulai=""
                            data-selesai="" data-ruang="[,]" data-sesi="[,]">
                        <i class='fas fa-plus'></i> Tambah Jadwal</button>
                </span>
                -->
            </div>
            <div class="row" id="konten">
                <?php if (count($jadwals) === 0) : ?>
                    <?php if (!isset($tp_active) || !isset($smt_active)) : ?>
                        <div class="col-12">
                            <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                Tahun Pelajaran atau Semester belum di set
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                Belum ada jadwal penilaian untuk Tahun Pelajaran <b><?= $tp_active->tahun ?></b>
                                Semester: <b><?= $smt_active->smt ?></b>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php else:
                    //var_dump($ruangs);
                    //echo '<pre>';
                    //var_dump($jadwals);
                    //echo '</pre>';
                    foreach ($jadwals as $jadwal) : ?>
                        <?php
                        //$jr = json_decode(json_encode($jadwal->ruang));
                        //$jumlahRuang = json_decode(json_encode(unserialize($jr)));
                        //$jruangSele = '';
                        //$jruang = '';
                        //$no = 1;
                        /*
                        foreach ($jumlahRuang as $r) {
                            if ($no > 1 && $r->ruang != null) {
                                $jruang .= ",";
                            }

                            $jruang .= $r->ruang;
                            $jruangSele .= $r->ruang . ',';
                            $no++;
                        }*/

                        /*
                        $js = json_decode(json_encode($jadwal->sesi));
                        $jumlahSesi = json_decode(json_encode(unserialize($js)));
                        $jsesi = '';
                        foreach ($jumlahSesi as $s) {
                            $jsesi .= $s->sesi . ',';
                        }
                        */

                        $jk = json_decode(json_encode($jadwal->bank_kelas));
                        $jumlahKelas = json_decode(json_encode(unserialize($jk)));
                        //$jks = [];

                        $kelasbank = '';
                        $no = 1;
                        foreach ($jumlahKelas as $j) {
                            foreach ($kelas as $k) {
                                if ($j->kelas_id === $k->id_kelas) {
                                    if ($no > 1) {
                                        $kelasbank .= ', ';
                                    }
                                    $kelasbank .= $k->nama_kelas;
                                    $no++;
                                }
                            }
                        }
                        $bgRandom = array('bg-gradient-blue', 'bg-gradient-fuchsia', 'bg-gradient-success',
                            'bg-gradient-maroon', 'bg-gradient-purple');
                        ?>
                        <div class="col-md-4 col-sm-6 col-12">
                            <!-- small card -->
                            <?php
                            $r = array_rand($bgRandom)
                            ?>
                            <div class="small-box <?= $bgRandom[$r] ?>">
                                <div class="inner">
                                    <h3><?= $jadwal->bank_kode ?></h3>
                                    <span><?= $jadwal->nama_mapel ?></span>
                                    <br>
                                    <span>Kelas: <b><?= $kelasbank ?></b></span>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <div class="mr-2 ml-2">
                                    <span>Jenis</span>
                                    <span class="float-right"><b><?= $jadwal->nama_jenis ?></b></span>
                                </div>
                                <hr style="margin-top:0; margin-bottom: 0">
                                <div class="mr-2 ml-2">
                                    <span>Mulai</span>
                                    <span
                                            class="float-right"><b><?= singkat_tanggal(date('D, d M Y', strtotime($jadwal->tgl_mulai))) ?></b></span>
                                </div>
                                <hr style="margin-top:0; margin-bottom: 0">
                                <div class="mr-2 ml-2">
                                    <span>Sampai</span>
                                    <span
                                            class="float-right"><b><?= singkat_tanggal(date('D, d M Y', strtotime($jadwal->tgl_selesai))) ?></b></span>
                                </div>
                                <hr style="margin-top:0; margin-bottom: 0">
                                <div class="mr-2 ml-2">
                                    <span>Status</span>
                                    <span class="float-right">
								<b><?= ($jadwal->status === '0') ? 'Non Aktif' : 'Aktif' ?></b>
							</span>
                                </div>
                                <a href="<?= base_url('cbtjadwal/add/' . $jadwal->id_jadwal) ?>"
                                   class="small-box-footer p-2">
                                    <i class="fas fa-pencil-alt"></i><span class="ml-2"> Edit Jadwal</span>
                                </a>
                                <!--
							<a href="#" class="small-box-footer p-2" data-toggle='modal' data-target='#tambahjadwal'
								<?= !$jadwal->id_jadwal ? '' : 'data-id="' . $jadwal->id_jadwal . '" data-kode="' . $jadwal->kode_jadwal . '" data-jenis="' . $jadwal->id_jenis . '"
							    data-bank="' . $jadwal->id_bank . '" data-durasi="' . $jadwal->durasi_ujian . '" data-mulai="' . $jadwal->tgl_mulai . '"
							    data-selesai="' . $jadwal->tgl_selesai . '" data-ruang="' . $jruangSele . '" data-sesi="' . $jsesi . '"' ?>>
								<i class="fas fa-pencil-alt"></i><span class="ml-2"> Edit Jadwal</span>
							</a>
							-->
                            </div>
                        </div>
                    <?php endforeach; endif; ?>
            </div>
        </div>
    </section>
</div>

<!--
<div class='modal fade' id='tambahjadwal' style='display: none;'>
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class='modal-header bg-blue'>
				<h4 class='modal-title'><i class="fas fa-business-time fa-fw"></i> Tambah Jadwal Ujian</h4>
			</div>
			<div class='modal-body'>
				<?= form_open('create', array('id' => 'create')) ?>
				<div class='form-group'>
					<div class="row">
						<div class="col-md-8">
							<label>Kode Jadwal</label>
							<input type='text' id="kode-jadwal" name='kode_jadwal' class='form-control form-control-sm'
								   required/>
						</div>
						<div class="col-md-4">
							<label>Jenis</label>
							<?php
echo form_dropdown(
    'jenis_id',
    $jenis,
    null,
    'id="jenis-id" class="form-control form-control-sm" required'
); ?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-8">
						<div class='form-group'>
							<label>Bank Soal</label>
							<?php //var_dump($banks);
echo form_dropdown(
    'bank_id',
    $banks,
    null,
    'id="bank-id" class="form-control form-control-sm" required'
); ?>
						</div>
					</div>
					<div class='col-md-4'>
						<div class='form-group'>
							<label>Lama ujian (menit)</label>
							<input type='number' id="durasi-ujian" name='durasi_ujian'
								   class='form-control form-control-sm'
								   required='true'/>
						</div>
					</div>
				</div>
				<div class='form-group'>
					<div class='row'>
						<div class='col-md-6'>
							<label>Tanggal Mulai Ujian</label>
							<input type='text' id="tgl-mulai" name='tgl_mulai' class='tgl form-control form-control-sm'
								   autocomplete='off' required='true'/>
						</div>
						<div class='col-md-6'>
							<label>Tanggal Waktu Expired</label>
							<input type='text' id="tgl-selesai" name='tgl_selesai'
								   class='tgl form-control form-control-sm'
								   autocomplete='off' required='true'/>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-6'>
						<div class='form-group'>
							<label>Ruang</label>
							<?php
$ruang['Semua'] = 'Semua Ruang';
foreach ($ruangs as $key => $row) {
    $ruang[$key] = $row;
}
echo form_dropdown(
    'ruang[]',
    $ruang,
    null,
    'id="ruang-ujian" class="select2 form-control form-control-sm" multiple="multiple" data-placeholder="Pilih Ruang" required'
); ?>
						</div>
					</div>
					<div class='col-md-6'>
						<div class='form-group'>
							<label>Sesi</label>
							<?php
$sesi['Semua'] = 'Semua Sesi';
foreach ($sesis as $key => $row) {
    $sesi[$key] = $row;
}
echo form_dropdown(
    'sesi[]',
    $sesi,
    null,
    'id="sesi-ujian" class="select2 form-control form-control-sm" multiple="multiple" data-placeholder="Pilih Sesi" required'
); ?>
						</div>
					</div>
				</div>
				<div class='form-group'>
					<div class='row'>
						<div class='col-6'>
							<div class="icheck-cyan">
								<input type='checkbox' id="check-soal" name='acak_soal' value='1'/>
								<label for="check-soal">Acak Soal</label>
							</div>
						</div>
						<div class='col-6'>
							<div class="icheck-cyan">
								<input type='checkbox' id="check-opsi" name='acak_opsi' value='1'/>
								<label for="check-opsi">Acak Jawaban</label>
							</div>
						</div>
						<div class='col-6'>
							<div class="icheck-cyan">
								<input type='checkbox' id="check-token" name='token' value='1'/>
								<label for="check-token">Gunakan Token</label>
							</div>
						</div>
						<div class='col-6'>
							<div class="icheck-cyan">
								<input type='checkbox' id="check-hasil" name='hasil_tampil' value='1'/>
								<label for="check-hasil">Tampilkan Hasil</label>
							</div>
						</div>
						<div class='col-6'>
							<div class="icheck-cyan">
								<input type='checkbox' id="check-login" name='reset_login' value='1'/>
								<label for="check-login">Reset Login</label>
							</div>
						</div>
						<div class='col-6'>
							<div class="icheck-cyan">
								<input type='checkbox' id="check-status" name='status' value='1'/>
								<label for="check-status">Aktif</label>
							</div>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="reset" class="btn bg-warning text-white">
						<i class="fa fa-sync mr-1"></i> Reset
					</button>
					<input type="hidden" id="id-jadwal" name='id_jadwal' class='form-control d-none'/>
					<button name='tambahjadwal' class='btn btn-success'><i class='fa fa-check'></i> Simpan Semua
					</button>
				</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</div>
-->
