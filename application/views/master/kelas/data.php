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
            <div class="card my-shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <?php if ($smt_active->id_smt == '2'): ?>
                            <div class="col-12 alert alert-default-info align-content-center" role="alert">
                                <span class="badge badge-primary"><i class="fas fa-tools mr-1"></i> Atur Kelas Semester</span>
                                digunakan jika ingin menyalin semua data kelas dari SMT I ke SMT II
                            </div>
                        <?php else: ?>
                            <div class="col-12 alert alert-default-info align-content-center" role="alert">
                                <span class="badge badge-primary"><i
                                            class="fas fa-tools mr-1"></i> Kenaikan Kelas</span>
                                digunakan untuk mengatur kenaikan kelas, siswa akan otomatis dipindahkan ke
                                tahun pelajaran berikutnya sesuai kelasnya
                            </div>
                        <?php endif; ?>
                        <div>
                            <a type="button" href="<?= base_url('datakelas') ?>" class="btn btn-default mr-2 mb-3"
                               data-toggle="tooltip" title="Reload"><i class="fa fa-sync ml-1 mr-1"></i> Reload
                            </a>
                            <span data-toggle="tooltip" title="Tambah Kelas">
                                <a href="<?= base_url('datakelas/add') ?>" type="button"
                                   class="btn btn-success mr-2 mb-3">
                                    <i class="fas fa-plus mr-1"></i> Rombel Baru
                                </a>
                            </span>
                            <?php if ($smt_active->id_smt == '2') : ?>
                                <span data-toggle="tooltip" title="Manajemen Kelas">
                                    <a href="<?= base_url('datakelas/manage') ?>" type="button"
                                       class="btn btn-primary mr-2 mb-3">
                                        <i class="fas fa-tools mr-1"></i> Atur Kelas Semester
                                    </a>
                                </span>
                            <?php endif; ?>
                            <?php if ($smt_active->id_smt == '1') : ?>
                                <span data-toggle="tooltip" title="Kenaikan Kelas">
                                    <a href="<?= base_url('datakelas/kenaikan') ?>" type="button"
                                       class="btn btn-primary mr-2 mb-3">
                                        <i class="fas fa-tools mr-1"></i> Kenaikan Kelas
                                    </a>
                                </span>
                            <?php endif; ?>
                            <!--
                            <div class="btn-group">
                                <button type="button" class="btn btn-default" data-toggle="tooltip" title="Print">
                                    <i class="fas fa-print"></i></button>
                                <button type="button" class="btn btn-default" data-toggle="tooltip"
                                        title="Export As PDF"><i
                                            class="fas fa-file-pdf"></i></button>
                                <button type="button" class="btn btn-default" data-toggle="tooltip"
                                        title="Export As Word"><i
                                            class="fa fa-file-word"></i></button>
                                <button type="button" class="btn btn-default" data-toggle="tooltip"
                                        title="Export As Excel"><i
                                            class="fa fa-file-excel"></i></button>
                            </div>
                            -->
                        </div>
                    </div>

                    <?php
                    //var_dump($kelas);
                    if (count($kelas) === 0) : ?>
                        <div class="col-12">
                            <div class="alert alert-default-warning shadow align-content-center" role="alert">
                                Belum ada data kelas untuk Tahun Pelajaran <b><?= $tp_active->tahun ?></b> Semester:
                                <b><?= $smt_active->smt ?></b>
                            </div>
                        </div>
                    <?php else: ?>
                    <div class="table-responsive">
                        <table id="table-kelas" class="w-100 table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="alert alert-info">
                                <th class="text-center align-middle p-0">No.</th>
                                <th>Nama Kelas</th>
                                <th>Kode Kelas</th>
                                <?php if ($setting->jenjang == '3') : ?>
                                    <td>Jurusan</td>
                                <?php endif; ?>
                                <th>Wali Kelas</th>
                                <th class="align-middle text-center">Jumlah Siswa</th>
                                <th class="text-center align-middle p-0" style="width: 180px"><span>Aksi</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($kelas as $kls) : ?>
                                <tr>
                                    <td class="align-middle text-center"><?= $no ?></td>
                                    <td class="align-middle"><?= $kls->nama_kelas ?></td>
                                    <td class="align-middle"><?= $kls->kode_kelas ?></td>
                                    <?php if ($setting->jenjang == '3') : ?>
                                        <td class="align-middle text-center"><?= $kls->nama_jurusan ?></td>
                                    <?php endif; ?>
                                    <td class="align-middle"><?= $kls->nama_guru ?></td>
                                    <td class="align-middle text-center"><?= $kls->jml_siswa ?></td>
                                    <td class="align-middle text-center">
                                        <div class="btn-group btn-group-xs">
                                <span data-toggle="tooltip" title="Lihat Detail Kelas">
										<a type="button" href="<?= base_url('datakelas/detail/' . $kls->id_kelas) ?>"
                                           class="btn btn-default btn-xs mr-1">
											<i class="fa fa-eye"></i>
										</a>
									</span>
                                            <span data-toggle="tooltip" title="Edit Kelas">
										<a type="button" href="<?= base_url('datakelas/edit/' . $kls->id_kelas) ?>"
                                           class="btn btn-default btn-xs mr-1">
											<i class="fa fa-pencil-alt"></i>
										</a>
									</span>
                                            <button data-id="<?= $kls->id_kelas ?>" type="button"
                                                    class="btn-xs btn btn-default hapuskelas" data-toggle="tooltip"
                                                    title="Hapus Data Kelas">
                                                <i class="far fa-trash-alt text-xs"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $no++; endforeach;
                            endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--
            <div class="row" id="konten">
                <?php
            //var_dump($jml);
            if (count($kelas) === 0) : ?>
                    <div class="col-12">
                        <div class="alert alert-default-warning shadow align-content-center" role="alert">
                            Belum ada data kelas untuk Tahun Pelajaran <b><?= $tp_active->tahun ?></b> Semester:
                            <b><?= $smt_active->smt ?></b>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($kelas as $kls) : ?>
                        <div class="col-md-4">
                            <div class="card my-shadow mb-4">
                                <div class="card-header border-bottom-0">
                                    <h3 class="card-title mt-1">Kelas: <b><?= $kls->nama_kelas ?></b></h3>
                                    <div class="card-tools">
                                        <span data-toggle="tooltip" title="Lihat Detail Kelas">
										<a type="button" href="<?= base_url('datakelas/detail/' . $kls->id_kelas) ?>"
                                           class="btn btn-default btn-sm mr-1">
											<i class="fa fa-eye"></i>
										</a>
									</span>
                                        <span data-toggle="tooltip" title="Edit Kelas">
										<a type="button" href="<?= base_url('datakelas/edit/' . $kls->id_kelas) ?>"
                                           class="btn btn-default btn-sm mr-1">
											<i class="fa fa-pencil-alt"></i>
										</a>
									</span>
                                        <button data-id="<?= $kls->id_kelas ?>" type="button"
                                                class="btn-sm btn btn-default hapuskelas" data-toggle="tooltip"
                                                title="Hapus Data Kelas">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <ul class="list-group list-group-unbordered">
                                        <?php if ($setting->jenjang == '3') : ?>
                                            <li class="list-group-item">
                                                <i class="fas fa-inbox"></i> Jurusan
                                                <span class="float-right"><b><?= $kls->nama_jurusan ?></b></span>
                                            </li>
                                        <?php endif; ?>
                                        <li class="list-group-item">
                                            <i class="fas fa-inbox"></i> Wali Kelas
                                            <span class="float-right"><b><?= $kls->nama_guru ?></b></span>
                                        </li>
                                        <li class="list-group-item">
                                            <i class="far fa-envelope"></i> Ketua Kelas
                                            <span class="float-right"><b><?= $kls->nama ?></b></span>
                                        </li>
                                        <li class="list-group-item">
                                            <i class="far fa-file-alt"></i> Jumlah Siswa
                                            <span class="float-right"><b><?= $kls->jml_siswa ?></b></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; endif; ?>
            </div>
            -->
        </div>
    </section>
</div>

<script src="<?= base_url() ?>/assets/app/js/master/kelas/crud.js"></script>
