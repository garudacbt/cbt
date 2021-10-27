<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('bukuinduk') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card my-shadow mb-4">
                <div class="card-header">
                    <div class="card-title">
                        <?= $subjudul ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-info align-content-center" role="alert">
                        Fitur ini digunakan untuk menyalin semua siswa TP:<?= $tp_active->tahun ?> dari semester 1 ke
                        semester 2
                        <br>
                        <ul>
                            <li>
                                Pilih kelas dari semester I
                            </li>
                            <li>
                                Klik SIMPAN untuk menyalin semua data kelas
                            </li>
                        </ul>
                        Untuk menyalin siswa antar Tahun Pelajaran, gunakan halaman KENAIKAN KELAS
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <div class="mb-3">
                                <label>Pilih Tahun Pelajaran</label>
                                <select name="tahun" id="id-tahun" class="form-control form-control-sm">
                                    <?php
                                    foreach ($tahun as $key => $value) :
                                        $selected = $key == $tahun_selected ? 'selected="selected"' : ''; ?>
                                        <option value="<?= $key ?>" <?= $selected ?>><?= $value ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Pilih Semester</label>
                                <select name="semester" id="id-smt" class="form-control form-control-sm">
                                    <?php
                                    foreach ($semester as $key => $value) :
                                        $selected = $key == $smt_selected ? 'selected="selected"' : ''; ?>
                                        <option value="<?= $key ?>" <?= $selected ?>><?= $value ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Pilih Kelas</label>
                                <?php
                                echo form_dropdown(
                                    'kelas',
                                    $kelases,
                                    isset($kelas_selected) ? $kelas_selected : null,
                                    'id="id-kelas" class="form-control form-control-sm"'
                                ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<script>
    var thnSelected = '<?= isset($tahun_selected) ? $tahun_selected : '';?>';
    var smtSelected = '<?= isset($smt_selected) ? $smt_selected : '';?>';
    var klsSelected = '<?= isset($kelas_selected) ? $kelas_selected : '';?>';

    $(document).ready(function () {

        var opsiTahun = $('#id-tahun');
        var tslctd = thnSelected == '' ? "selected='selected'" : "";
        opsiTahun.prepend("<option value='0' " + tslctd + " disabled='disabled'>Pilih Tahun Pelajaran</option>");
        opsiTahun.change(function () {
            getDataSiswa($(this).val(), opsiSmt.val(), opsiKelas.val());
        });

        var opsiSmt = $('#id-smt');
        var sslctd = smtSelected == '' ? "selected='selected'" : "";
        opsiSmt.prepend("<option value='0' " + sslctd + " disabled='disabled'>Pilih Semester</option>");
        opsiSmt.change(function () {
            getDataSiswa(opsiTahun.val(), $(this).val(), opsiKelas.val());
        });

        var opsiKelas = $('#id-kelas');
        console.log(klsSelected);
        var kslctd = klsSelected == '' ? "selected='selected'" : "";
        opsiKelas.prepend("<option value='0' " + kslctd + " disabled='disabled'>Pilih Kelas</option>");
        opsiKelas.change(function () {
            getDataSiswa(opsiTahun.val(), opsiSmt.val(), $(this).val());
        });

        function getDataSiswa(tahun, smt, kelas) {
            console.log(tahun, smt, kelas);
            if (tahun != null && smt != null) {
                window.location.href = base_url + 'bukuinduk?backupnilai=' + tahun + '&semester=' + smt + '&kelas=' + kelas;
            }
        }
    })

</script>