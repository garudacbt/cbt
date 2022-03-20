<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 23/08/20
 * Time: 23:18
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

            <div class="container-fluid h-100">
                <div class="row h-100 justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card my-shadow">
                            <div class="card-body">
                                <?php
                                //var_dump($pengawas);
                                if ($support && $valid) : ?>
                                    <h3 class="text-center">KONFIRMASI</h3>
                                    <h5 class="text-center">
                                        <b><?= $bank->kode_jenis . ' | ' . $bank->tahun . ' | ' . $bank->smt ?></b>
                                    </h5>
                                    <br>
                                    <?php
                                    $jk = json_decode(json_encode($bank->bank_kelas));
                                    $jumlahKelas = json_decode(json_encode(unserialize($jk)));

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

                                    ?>
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item p-1"> Mata Pelajaran
                                            <span class="float-right"><b><?= $bank->nama_mapel ?></b></span>
                                        </li>
                                        <!--
                                        <li class="list-group-item p-1"> Guru
                                            <span class="float-right"><b><?= $bank->nama_guru ?></b></span>
                                        </li>
                                        -->
                                        <li class="list-group-item p-1"> Kelas
                                            <span class="float-right"><b><?= $kelasbank ?></b></span>
                                        </li>
                                        <li class="list-group-item p-1"> Durasi Waktu
                                            <span class="float-right"><b><?= $bank->durasi_ujian ?> Menit</b></span>
                                        </li>
                                        <!--
									<li class="list-group-item p-1"> Status
										<span class="float-right">
											<b><?= ($bank->status === '0') ? 'Non Aktif' : 'Aktif' ?></b>
										</span>
									</li>
									-->
                                        <li class="list-group-item p-1"> Jumlah Soal
                                            <span class="float-right">
											<b><?= $bank->tampil_pg + $bank->tampil_kompleks + $bank->tampil_jodohkan + $bank->tampil_isian + $bank->tampil_esai ?></b>
										</span>
                                        </li>
                                        <?php if ($bank->token === '1') : ?>
                                            <li class="list-group-item p-1"><span
                                                        class="text-danger"><b>Token</b></span>
                                                <div class="float-right">
                                                    <input type='text' id="input-token" class="text-center" name='token'
                                                           placeholder="Masukkan Token"/>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    </ul>

                                    <div class="alert alert-default-info">
                                        <h5>Pengawas Ujian:</h5>
                                        <ul>
                                            <?php
                                            foreach ($pengawas as $pws) :?>
                                                <li><?=$pws->nama_guru?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <br>
                                    <span class="float-right" data-toggle="tooltip" title="MULAI">
                                        <button id="load-soal" onclick="loadSoal()"
                                                type="button" class="btn btn-success">MULAI
                                        </button>
                                    </span>

                                    <?= form_open('', array('id' => 'konfir')) ?>
                                    <input type="hidden" name="siswa" value="<?= $siswa->id_siswa ?>">
                                    <input type="hidden" name="jadwal" value="<?= $bank->id_jadwal ?>">
                                    <input type="hidden" name="bank" value="<?= $bank->id_bank ?>">
                                    <?= form_close(); ?>

                                <?php elseif (!$valid) : ?>
                                    <div class="alert alert-default-danger text-center p-5">
                                        <h2><i class="icon fas fa-ban"></i> WARNING..!!</h2>
                                        <div class="text-lg">
                                            Ujian tidak bisa dilanjutkan
                                            <br>
                                            hubungi proktor
                                        </div>
                                    </div>
                                <?php elseif (!$support): ?>
                                    <div class="alert alert-default-danger text-center p-5">
                                        <h2><i class="icon fas fa-ban"></i> WARNING..!!</h2>
                                        <div class="text-lg">
                                            Browser yang digunakan tidak mendukung
                                            <br>
                                            silahkan gunakan browser lain dengan versi terbaru
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url() ?>/assets/app/js/redirect.js"></script>
<script>
    function loadSoal() {
        swal.fire({
            title: "Membuka Soal",
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

        $('#load-soal').attr('disabled', 'disabled');
        if ($('#input-token').length) {
            var tkn = $('#input-token').val();

            $.ajax({
                url: base_url + "siswa/cektoken/" + tkn,
                method: 'GET',
                success: function (data) {
                    console.log(data);

                    if (data.token === tkn) {
                        $('#konfir').submit();
                    } else {
                        swal.fire({
                            "title": "Token salah",
                            "text": "Token yang kamu masukkan salah",
                            "icon": "error"
                        }).then(result => {
                            if (data.status) {
                                reload();
                            }
                        });
                    }
                },
                error: function (xhr, status, error) {
                    swal.fire({
                        "title": "Error",
                        "text": "Server tidak merespon",
                        "icon": "error"
                    })
                }
            });
        } else {
            $('#konfir').submit();
        }
    }

    $('#konfir').submit(function (e) {
        e.stopPropagation();
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: base_url + 'siswa/ceksesisiswa',
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
                if (data.soal > 0) {
                    cekDurasi();
                } else {
                    showDangerToast('Coba kembali ke beranda, lalu ulangi lagi');
                }
            }, error: function (xhr, error, status) {
                showDangerToast('ERROR!');
                console.log(xhr.responseText);
            }
        });
    });

    function cekDurasi() {
        var jadwal = $('#konfir').find('input[name="jadwal"]').val();
        $.ajax({
            type: 'POST',
            url: base_url + 'siswa/cekelapsedtimer',
            data: $('#konfir').serialize(),
            success: function (data) {
                window.location.href = base_url + 'siswa/penilaian/' + jadwal;
            }, error: function (xhr, error, status) {
                showDangerToast('ERROR!');
                console.log(xhr.responseText);
            }
        });
    }

</script>
