<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/08/20
 * Time: 22:29
 */

?>
<div class="content-wrapper" style="margin-top: -1px;">
	<div class="sticky">
	</div>
	<section class="content overlap p-4">
		<div class="container">
			<div class="row">
				<div class="col-12">
                    <?php $this->load->view('members/siswa/templates/top'); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="card my-shadow">
						<div class="card-header">
							<h5 class="text-center">
								MATERI HARI INI<br/><?= buat_tanggal(date('D, d M Y')) ?>
							</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<?php
								if (isset($kbm->istirahat)) :
								$ist = json_decode(json_encode($kbm->istirahat));
								$jmlIst = json_decode(json_encode(unserialize($ist)));
								$arrIst = [];
								foreach ($jmlIst as $istirahat) {
									array_push($arrIst, $istirahat->ist);
									$arrDur[$istirahat->ist] = $istirahat->dur;
								};

								$jamMulai = new DateTime($kbm->kbm_jam_mulai);
								$jamSampai = new DateTime($kbm->kbm_jam_mulai);

								for ($i = 0; $i < $kbm->kbm_jml_mapel_hari; $i++) :
									$jamke = $i + 1;
									?>

									<div class="col-md-6 col-lg-4">
										<div class="card border">

											<?php if (in_array($jamke, $arrIst)) :
												$jamSampai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
												?>
												<div class="card-header">
													<div class="card-title">
														<b>JAM KE <?= $jamke ?></b>
													</div>
													<div class="card-tools">
														<i class="fa fa-clock-o text-gray mr-1"></i>
														<?= $jamMulai->format('H:i') ?> s/d <?= $jamSampai->format('H:i') ?>
													</div>
												</div>
												<div class="card-body p-0">
													<div class="text-center" style="min-height: 185px;">
														<br>
														<br>
														<br>
														ISTIRAHAT
													</div>
												</div>
												<?php
												$jamMulai->add(new DateInterval('PT' . $arrDur[$jamke] . 'M'));
											else :
												$jamSampai->add(new DateInterval('PT' . $kbm->kbm_jam_pel . 'M'));
												if (isset($materi[$jamke]->nama_mapel)) :
													$tkelas = '';
													$arrkelas = unserialize($materi[$jamke]->materi_kelas);

													foreach ($arrkelas as $k => $kls) {
														if ($k > 0) {
															$tkelas .= ', ';
														}
														$tkelas .= $kelas[$kls];
													}?>
													<div class="card-header">
														<div class="card-title">
															<b>JAM KE <?= $jamke ?></b>
														</div>
														<div class="card-tools">
															<i class="fa fa-clock-o text-gray mr-1"></i>
															<?= $jamMulai->format('H:i') ?> s/d <?= $jamSampai->format('H:i') ?>
														</div>
													</div>
													<div class="card-body p-0">
														<div class="small-box bg-gradient-success mb-0">
															<div class="inner">
																<h3><?= $materi[$jamke]->kode_materi ?></h3>
																<span><?= $materi[$jamke]->nama_mapel ?></span>
																<br>
																<span><?= $materi[$jamke]->nama_guru ?></span>
																<br>
																<span>Kelas: <?= $tkelas ?></span>
															</div>
															<div class="icon">
																<i class="fas fa-book-open"></i>
															</div>
															<hr style="margin-top:0; margin-bottom: 0">

															<a href="<?= base_url('siswa/bukamateri/'.$materi[$jamke]->id_kjm . '/' . $jamke)?>" class="small-box-footer p-2">BUKA MATERI
																<i class="fas fa-arrow-circle-right ml-3"></i><span class="ml-2"></span>
															</a>
														</div>
													</div>
												<?php else: ?>
													<div class="card-header">
														<div class="card-title">
															<b>JAM KE <?= $jamke ?></b>
														</div>
														<div class="card-tools">
															<i class="fa fa-clock-o text-gray mr-1"></i>
															<?= $jamMulai->format('H:i') ?> s/d <?= $jamSampai->format('H:i') ?>
														</div>
													</div>
													<div class="card-body p-0">
														<div class="text-center" style="min-height: 185px;">
															<br>
															<br>
															<br>
															Tidak ada materi
														</div>
													</div>
												<?php endif; ?>
												<?php
												$jamMulai->add(new DateInterval('PT' . $kbm->kbm_jam_pel . 'M'));
											endif; ?>
										</div>
									</div>
								<?php endfor; ?>
								<?php else: ?>
									<div class="col-12 alert alert-default-warning">
										<div class="text-center">Belum ada jadwal pelajaran</div>
									</div>
								<?php endif;
								?>
							</div>
						</div>
					</div>
				</div>
                <div class="col-12">
                    <div class="card my-shadow">
                        <div class="card-header">
                            <h5 class="text-center">
                                MATERI SEMINGGU
                            </h5>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <?php foreach ($week as $tgl) :?>
                                <li class="nav-item"><button type="button" class="btn nav-link seminggu" id="<?=$tgl?>" onclick="getMateri('<?=$tgl?>')">
                                        <?= str_replace(',', '<br>', singkat_tanggal(date('D, d M', strtotime($tgl)))) ?>
                                    </button></li>
                                <?php endforeach; ?>
                            </ul>
                            <hr>
                            <div id="tab-content">
                            </div>
                        </div>
                        <div class="overlay d-none" id="loading">
                            <div class="spinner-grow"></div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</section>
</div>

<script>
    var idKelas = '<?= $siswa->id_kelas?>';
    var idSiswa = '<?= $siswa->id_siswa?>';
    var senin = '<?=$week[0]?>';

    function getMateri(tgl) {
        $('#loading').removeClass('d-none');
        $('.seminggu').removeClass('active');
        $(`#${tgl}`).addClass('active');

        setTimeout(function() {
            $.ajax({
                url: base_url + 'siswa/seminggu?id_siswa='+idSiswa+'&id_kelas='+idKelas+'&tgl='+tgl+'&jenis=1',
                type:"GET",
                success: function(data) {
                    console.log('respon', data);

                    var html = '<table class="table table-sm">' +
                        '    <tr class="alert alert-default-secondary">' +
                        '        <th class="text-center">' +
                        '            Jam Ke' +
                        '        </th>' +
                        '        <th>' +
                        '            Mata Pelajaran' +
                        '        </th>' +
                        '        <th>' +
                        '            Materi' +
                        '        </th>' +
                        '        <th class="text-center">' +
                        '            Status' +
                        '        </th>' +
                        '    </tr>';

                    $.each(data.materi, function (i, mtr) {
                        console.log('mtr', mtr);
                        html += '<tr><td class="text-center">'+i+'</td>';
                        if (mtr.id_kjm != null) {
                            var status = '';
                            if (data.logs != null && Object.keys(data.logs).length > 0) {
                                if (data.logs[mtr.id_kjm] != null && data.logs[mtr.id_kjm].finish_time != null) {
                                    status = '<a href="'+base_url+'siswa/bukamateri/'+ mtr.id_kjm + '/' +i+'" class="btn btn-success">Selesai</a>';
                                } else {
                                    status = '<a href="'+base_url+'siswa/bukamateri/'+ mtr.id_kjm + '/' +i+'" class="btn btn-warning">Belum Selesai</a>';
                                }
                            } else {
                                status = '<a href="'+base_url+'siswa/bukamateri/'+ mtr.id_kjm + '/' +i+'" class="btn btn-danger">Belum Dikerjakan</a>';
                            }

                            html += '<td>'+ mtr.nama_mapel +'</td>' +
                            '<td style="line-height: 1">'+ mtr.kode_materi +'<br><small>'+mtr.judul_materi+'</small></td>' +
                            '<td class="text-center">' + status + '</td>';
                        } else {
                            html += '<td>'+ mtr.nama_mapel +'</td>' +
                                '<td>-</td>' +
                                '<td class="text-center">-</td>';
                        }
                        html += '</tr>';
                    });
                    html += '</table>';

                    $('#loading').addClass('d-none');
                    $('#tab-content').html(html);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    $('#loading').addClass('d-none');
                }
            });
        }, 500);
    }
    $(document).ready(function() {
        getMateri(senin)
    })
</script>