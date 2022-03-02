<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">
	<section class="content-header p-0 d-flex align-items-end" style="height: 400px; background: url('<?=base_url('assets/img/wall2.png')?>')">
		<div class="container-fluid pl-0 pr-0 pb-0 pt-4" style="background-color: rgba(255,255,255,0.7)">
            <div class="row m-0">
                <?php foreach ($info_box as $info) : ?>
                    <div class="col-md-2 col-3">
                        <div class="shadow small-box bg-<?= $info->box ?>">
                            <div class="inner">
                                <h5 class="mb-0"><b><?= $info->total; ?></b></h5>
                                <span><?= $info->title; ?></span>
                            </div>
                            <div class="icon">
                                <i class="fa fa-<?= $info->icon ?>" style="top: 5px"></i>
                            </div>
                            <a href="<?= base_url() . $info->url ?>" class="small-box-footer">
                                Detail <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
	</section>
	<!-- Main content -->
	<section class="content mt-4">
		<div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary my-shadow">
                        <div class="card-header">
                            <div class="card-title">
                                JADWAL HARI INI
                            </div>
                            <div class="card-tools">
                                <a href="<?=base_url('kelasjadwal')?>" type="button" onclick="" class="btn btn-sm">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="card border-0 shadow-none m-0">
                                <div class="card-header d-flex p-0">
                                    <ul class="nav nav-pills p-2">
                                        <?php
                                        $no = 1;
                                        foreach ($kelases as $ky=>$kelas) :
                                            $active = $no == 1 ? 'active' : '';
                                        ?>
                                        <li class="nav-item"><a class="nav-link <?=$active?>" href="#tab_<?=$ky?>" data-toggle="tab"><?=$kelas?></a></li>
                                        <?php $no++; endforeach; ?>
                                    </ul>
                                </div>
                                <?php
                                if (count($jadwals)>0 && count($kbms)>0):
                                ?>
                                <div class="card-body p-0">
                                    <div class="tab-content">
                                        <?php
                                        $no = 1;
                                        foreach ($kelases as $ky=>$kelas) :
                                            $arrIst = [];
                                        if (isset($kbms[$ky]->istirahat)) {
                                            foreach ($kbms[$ky]->istirahat as $istirahat) {
                                                array_push($arrIst, $istirahat['ist']);
                                                $arrDur[$istirahat['ist']] = $istirahat['dur'];
                                            }
                                        }
                                            $active = $no == 1 ? 'active' : '';
                                            ?>
                                            <div class="tab-pane <?=$active?>" id="tab_<?=$ky?>">
                                                <?php if (isset($kbms[$ky])) : ?>
                                                <div class="table-responsive">
                                                    <table class="w-100 table">
                                                        <tbody>
                                                        <?php
                                                        $jamMulai = new DateTime($kbms[$ky]->kbm_jam_mulai);
                                                        $jamSampai = new DateTime($kbms[$ky]->kbm_jam_mulai);
                                                        for ($i = 0; $i < $kbms[$ky]->kbm_jml_mapel_hari; $i++) :
                                                            $jamke = $i + 1;
                                                            if (in_array($jamke, $arrIst)) :
                                                                $jamSampai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                                                ?>
                                                                <tr class="jam" data-jamke="<?= $jamke ?>">
                                                                    <td class="align-middle" width="150">
                                                                        <?= $jamMulai->format('H:i') ?> - <?= $jamSampai->format('H:i') ?>
                                                                    </td>
                                                                    <td class="align-middle">ISTIRAHAT</td>
                                                                </tr>
                                                                <?php
                                                                $jamMulai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
                                                            else :
                                                                $jamSampai->add(new DateInterval('PT' . $kbms[$ky]->kbm_jam_pel . 'M'));
                                                                ?>
                                                                <tr class="jam" data-jamke="<?= $jamke ?>">
                                                                    <td class="align-middle">
                                                                        <?= $jamMulai->format('H:i') ?> - <?= $jamSampai->format('H:i') ?>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <?= $jadwals[$ky][$jamke]->kode != null ? $jadwals[$ky][$jamke]->kode : '--' ?>
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $jamMulai->add(new DateInterval('PT' . $kbms[$ky]->kbm_jam_pel . 'M'));
                                                            endif;
                                                        endfor; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        <?php else: ?>
                                                    <div class="m-4">
                                                        Jadwal untuk kelas <?= $kelas ?> belum dibuat
                                                    </div>
                                        <?php endif; ?>
                                            </div>
                                            <?php $no++; endforeach; ?>
                                    </div>
                                </div>
                                <?php
                                else:
                                ?>
                                <div class="card-body">
                                    Tidak ada jadwal hari ini
                                </div>
                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card card-success my-shadow">
                        <div class="card-header">
                            <div class="card-title">Aktifitas</div>
                            <div class="card-tools">
                                <button type="button" onclick="hapusLogAktivitas()" class="btn btn-sm">
                                    <i class="fa fa-trash text-white"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="log-list">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-danger my-shadow">
                        <div class="card-header">
                            <h4 class="card-title">Penilaian</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach ($ujian_box as $info) : ?>
                                    <div class="col-md-3 col-4" style="min-height: 60px">
                                        <a href="<?=base_url().$info->url?>">
                                            <div class="info-box border p-1" style="min-height: 60px">
                                                <!--
												<span class="info-box-icon bg-gradient-<?= $info->box ?> elevation-1">
													<i class="fa fa-<?= $info->icon ?>"></i>
												</span>
												-->
                                                <div class="info-box-content p-1 text-danger">
                                                    <span class="info-box-text"><?= $info->title; ?></span>
                                                    <h5 class="info-box-number m-0"><?= $info->total; ?></h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5>Mading</h5>
                    <div class="konten-pengumuman">
                        <div id="pengumuman">
                        </div>
                        <p id="loading-post" class="text-center d-none">
                            <br/><i class="fa fa-spin fa-circle-o-notch"></i> Loading....
                        </p>
                        <div id="loadmore-post"
                             onclick="getPosts()"
                             class="text-center mt-4 loadmore d-none">
                            <div class="btn btn-default">Muat Timeline lainnya ...</div>
                        </div>
                    </div>
                </div>
            </div>
	</section>
</div>


<div class="modal fade" id="komentarModal" tabindex="-1" role="dialog" aria-labelledby="komentarLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="komentarLabel">Tulis Komentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid img-circle img-sm" src="<?= base_url('assets/img/siswa.png') ?>" alt="Alt Text">
                <div class="img-push">
                    <?= form_open('create', array('id' => 'komentar')) ?>
                    <input type="hidden" id="id-post" name="id_post" value="">
                    <div class="input-group">
                        <input type="text" name="text" placeholder="Tulis komentar ..."
                               class="form-control form-control-sm" required>
                        <span class="input-group-append">
                                <button type="submit" class="btn btn-success btn-sm">Komentari</button>
                            </span>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="balasanModal" tabindex="-1" role="dialog" aria-labelledby="balasanLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="balasanLabel">Tulis Balasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid img-circle img-sm" src="<?= base_url('assets/img/siswa.png') ?>" alt="Alt Text">
                <div class="img-push">
                    <?= form_open('create', array('id' => 'balasan')) ?>
                    <input type="hidden" id="id-comment" name="id_comment" value="">
                    <div class="input-group">
                        <input type="text" name="text" placeholder="Tulis balasan ...."
                               class="form-control form-control-sm" required>
                        <span class="input-group-append">
                                <button type="submit" class="btn btn-success btn-sm">Balas</button>
                            </span>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>/assets/app/js/dashboard.js"></script>