<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a type="button" href="<?= base_url('cbtcetak') ?>" class="btn btn-sm float-right btn-default"
                       data-toggle="tooltip"
                       title="Reload">
                        <i class="fa fa-sync ml-1 mr-1"></i><span class="d-none d-sm-inline-block ml-1"> Reload</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card my-shadow">
                <div class="card-header">
                    <div class="card-title">
                        <h6>Cetak</h6>
                    </div>
                </div>
                <?php
                $isAdmin = $this->ion_auth->is_admin();
                $dnone = $isAdmin ? '' : 'd-none';
                if ($isAdmin || (isset($guru) && isset($ids_pengawas) && in_array($guru->id_guru, $ids_pengawas))) :
                ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 <?=$dnone?>">
                            <a href="<?= base_url('cbtcetak/kartupeserta') ?>">
                                <div class="info-box border">
								<span class="info-box-icon bg-gradient-primary elevation-1">
									<i class="fa fa-vcard-o"></i>
								</span>
                                    <div class="info-box-content">
                                        <h5 class="info-box-content">Kartu Peserta</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="<?= base_url('cbtcetak/absenpeserta') ?>">
                                <div class="info-box border">
								<span class="info-box-icon bg-gradient-primary elevation-1">
									<i class="fa fa-list-ol"></i>
								</span>
                                    <div class="info-box-content">
                                        <h5 class="info-box-content">Daftar Hadir</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 <?=$dnone?>">
                            <a href="<?= base_url('cbtcetak/pengawas') ?>">
                                <div class="info-box border">
								<span class="info-box-icon bg-gradient-primary elevation-1">
									<i class="fa fa-list-ul"></i>
								</span>
                                    <div class="info-box-content">
                                        <h5 class="info-box-content">Jadwal Pengawas</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="<?= base_url('cbtcetak/pesertaujian') ?>">
                                <div class="info-box border">
								<span class="info-box-icon bg-gradient-primary elevation-1">
									<i class="fa fa-list-ul"></i>
								</span>
                                    <div class="info-box-content">
                                        <h5 class="info-box-content">Peserta Ujian</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <a href="<?= base_url('cbtcetak/beritaacara') ?>">
                                <div class="info-box border">
								<span class="info-box-icon bg-gradient-primary elevation-1">
									<i class="fa fa-pencil-square-o"></i>
								</span>
                                    <div class="info-box-content">
                                        <h5 class="info-box-content">Berita Acara</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--
                        <div class="col-lg-3 col-md-6">
                            <a href="<?= base_url('cbtcetak/jadwal') ?>">
                                <div class="info-box border">
								<span class="info-box-icon bg-gradient-primary elevation-1">
									<i class="fa fa-list-ul"></i>
								</span>
                                    <div class="info-box-content">
                                        <h5 class="info-box-content">Jadwal Ujian</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        -->
                    </div>
                </div>
                <?php else: ?>
                    <div class="card-body">Halaman CETAK hanya untuk PENGAWAS UJIAN</div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>
