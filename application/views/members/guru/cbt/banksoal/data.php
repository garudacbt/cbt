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
                    <div class="card-tools">
                        <a href="<?= base_url('cbtbanksoal') ?>" type="button" onclick=""
                           class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </a>
                        <a href="<?= base_url('cbtbanksoal/addBank') ?>" type="button"
                           class="btn btn-primary btn-sm ml-1">
                            <i class="fas fa-plus-circle"></i> Tambah Bank Soal
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" id="konten">
                        <?php
                        //var_dump($banks);
                        if (count($banks) > 0) :
                            foreach ($banks as $bank) : ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border mb-4">
                                        <div class="card-header border-bottom-0 bg-gradient-blue">
                                            <h3 class="card-title mt-1"><b><?= $bank->bank_kode ?></b></h3>
                                            <div class="card-tools">
									<span data-toggle="tooltip" title="Edit Bank Soal">
										<a type="button"
                                           href="<?= base_url('cbtbanksoal/editBank?id_bank=' . $bank->id_bank . '&id_guru=' . $id_guru) ?>"
                                           class="btn btn-warning btn-sm mr-1">
											<i class="fa fa-pencil-alt"></i>
										</a>
									</span>
                                                <button onclick="hapus(<?= $bank->id_bank ?>)" type="button"
                                                        class="btn-sm btn btn-danger" data-toggle="tooltip"
                                                        title="Hapus Bank Soal">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <?php
                                            /*
                                            $jk = json_decode(json_encode($bank->bank_kelas));
                                            $jumlahKelas = json_decode(json_encode(unserialize($jk)));
                                            $jks = [];

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
                                            }*/
                                            ?>
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item p-1"> Guru
                                                    <span class="float-right"><b><?= $bank->nama_guru ?></b></span>
                                                </li>
                                                <li class="list-group-item p-1"> Mapel
                                                    <span class="float-right"><b><?= $bank->kode ?></b></span>
                                                </li>
                                                <li class="list-group-item p-1"> Level Kelas
                                                    <span class="float-right"><b><?= $bank->bank_level ?></b></span>
                                                </li>
                                                <li class="list-group-item p-1"> Soal PG/Essai
                                                    <span class="float-right">
											<b><?= $bank->total_soal == 0 ? 'Belum dibuat' : ($bank->total_soal < ($bank->jml_soal + $bank->jml_esai) ? 'Belum selesai' : $bank->jml_soal . '/' . $bank->jml_esai) ?></b>
										</span>
                                                </li>
                                                <li class="list-group-item p-1"> Dibuat
                                                    <span class="float-right"><b><?= singkat_tanggal(date('d M Y - H:i', strtotime($bank->date))) ?></b></span>
                                                </li>
                                                <li class="list-group-item p-1"> Status
                                                    <span class="float-right">
											<b><?= ($bank->status === '0') ? 'Non Aktif' : 'Aktif' ?></b>
										</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer">
											<span class="float-right" data-toggle="tooltip" title="Buat Soal">
												<a href="<?= base_url('cbtbanksoal/detail/' . $bank->id_bank) ?>"
                                                   type="button" class="btn btn-success">
													<?php if ($bank->total_soal == 0) : ?>
                                                        <i class="fas fa-plus"></i> Buat Soal
                                                    <?php else: ?>
                                                        <i class="fas fa-eye"></i> Lihat/Edit Soal
                                                    <?php endif; ?>
												</a>
											</span>
                                            <span class="float-right" data-toggle="tooltip" title="Buat Soal">
											<a href="<?= base_url('cbtbanksoal/importsoal/' . $bank->id_bank) ?>"
                                               type="button" class="btn btn-primary mr-2">
												<i class="fas fa-plus"></i> Import Soal
											</a>
										</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                        else:?>
                            <div class="col-12 p-0">
                                <div class="alert alert-default-warning align-content-center" role="alert">
                                    Belum ada BANK SOAL, pilih guru lain
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    var idGuru = '<?=$id_guru?>';
    $(document).ready(function () {
        ajaxcsrf();

        $('#guru').on('change', function () {
            idGuru = $(this).val();
            window.location.href = base_url + 'cbtbanksoal'
        });
    });

    function hapus(id) {
        swal.fire({
            title: "Anda yakin?",
            text: "Bank Soal akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    url: base_url + 'cbtbanksoal/deleteBank?id_bank=' + id,
                    //data: {id_bank: id},
                    type: "GET",
                    success: function (respon) {
                        if (respon.status) {
                            swal.fire({
                                title: "Berhasil",
                                text: "Bank soal berhasil dihapus",
                                icon: "success"
                            }).then(result => {
                                if (result.value) {
                                    window.location.href = base_url + 'cbtbanksoal';
                                }
                            });
                        } else {
                            swal.fire({
                                title: "Gagal",
                                text: "Tidak bisa menghapus, " + respon.message,
                                icon: "error"
                            });
                        }
                    },
                    error: function () {
                        swal.fire({
                            title: "Gagal",
                            text: "Ada data yang sedang digunakan",
                            icon: "error"
                        });
                    }
                });
            }
        });
    }
</script>
