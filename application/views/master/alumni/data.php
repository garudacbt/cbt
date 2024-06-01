<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <!--
                <div class="col-6">
                    <a href="<?= base_url('datakelas') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </a>
                </div>
                -->
            </div>
        </div>
    </section>

    <section class="content">
        <?php
        $searchId = array_search('1', array_column($tp, 'active'));
        ?>
        <div class="container-fluid">
            <div class="card my-shadow mb-4">
                <div class="card-header">
                    <div class="card-title">
                        <?= $subjudul ?>
                    </div>
                    <div class="card-tools">
                        <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-default">
                            <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                        </button>
                        <?php $disable = $jumlah_lulus > 0 ? '' : 'disabled="disabled"'; ?>
                        <button type="button" class="btn btn-sm btn-primary" onclick="generate()" <?= $disable ?>>
                            <i class="fa fa-gear"></i>
                            <span class="d-none d-sm-inline-block ml-1">Generate Alumni</span>
                        </button>
                        <!--
                        <button type="button" data-toggle="modal" data-target="#createAlumniModal"
                                class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i>
                            <span class="d-none d-sm-inline-block ml-1">Tambah Alumni</span>
                        </button>
                        <a href="<?= base_url('dataalumni/add') ?>" class="btn btn-sm bg-gradient-success">
                            <i class="fas fa-upload"></i>
                            <span class="d-none d-sm-inline-block ml-1">Import</span></a>
                            -->
                    </div>
                </div>
                <?php
                //echo '<pre>';
                //var_dump($tahun_lulus);
                //var_dump(array_search('1', array_column($tp, 'active')));
                //echo '</pre>';
                //$idTpActive = $tp[$searchId];
                if ($searchId > 0) :
                    $tpBefore = $tp[$searchId - 1];
                    if ($jumlah_lulus > 0) :?>
                        <div class="alert alert-default-warning align-content-center" role="alert">
                            Ada <?= $jumlah_lulus ?> Siswa yang LULUS pada Tahun Pelajaran <?= $tpBefore->tahun ?>,
                            silahkan klik tombol <b><i class="fa fa-gear"></i> Generate Alumni</b> untuk memindahkan
                            siswa lulus ke data alumni.
                        </div>
                    <?php endif; endif; ?>
                <div class="card-body">
                    <div class="alert alert-default-info align-content-center" role="alert">
                        <ul>
                            <?php
                            $sebelumnya = $searchId > 0 ? $tpBefore->tahun : "sebelumnya";
                            ?>
                            <li>
                                <b><i class="fa fa-gear"></i> Generate Alumni</b> untuk membuat data alumni secara
                                otomatis berdasarkan hasil RAPOR tahun <?= $sebelumnya ?> pada semester GENAP
                            </li>
                            <li>
                                <b><i class="fas fa-plus"></i> Tambah Alumni</b> untuk menambah data alumni satu persatu
                            </li>
                            <li>
                                <b><i class="fas fa-upload"></i> Import</b> untuk mengimpor data dari template file
                                Excel yang disediakan
                            </li>
                        </ul>
                    </div>
                    <hr>

                    <label>Data Alumni menurut tahun lulus dan kelas akhir</label>
                    <div class="row">
                        <div class="col-md-3 col-6 mb-2">
                            <select name="tahun" id="opsi-tahun" class="form-control">
                                <?php
                                if (count($tahun_lulus) > 0) :
                                    foreach ($tahun_lulus as $key => $value) :
                                        $selected = $key == $tahun_selected ? 'selected="selected"' : ''; ?>
                                        <option value="<?= $key ?>" <?= $selected ?>><?= $value ?></option>
                                    <?php endforeach;
                                else: ?>
                                    <option value="0" disabled>Tidak ada data alumni</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <select name="kelas" id="opsi-kelas" class="form-control">
                                <?php
                                if (count($kelas_akhir) > 0) :
                                    foreach ($kelas_akhir as $value) :
                                        $selected = $value == $kelas_selected ? 'selected="selected"' : ''; ?>
                                        <option value="<?= $value ?>" <?= $selected ?>><?= $value ?></option>
                                    <?php endforeach;
                                else: ?>
                                    <option value="0" disabled>Tidak ada data alumni</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <?php
                    if (isset($alumnis)) :
                        //echo '<pre>';
                        //var_dump($alumni_kelas_baru);
                        //echo '</pre>';
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped table-bordered table-hover" id="tbl-alumni">
                                    <thead>
                                    <tr>
                                        <th width="50" height="50" class="text-center p-0 align-middle">No.</th>
                                        <th class="text-center p-0 align-middle">N I S N</th>
                                        <th class="text-center p-0 align-middle">N I S</th>
                                        <th class="text-center p-0 align-middle p-0">Nama Alumni</th>
                                        <th class="text-center p-0 align-middle">Kelas Akhir</th>
                                        <th class="text-center p-0 align-middle">Tahun Lulus</th>
                                        <th class="text-center p-0 align-middle">Nomor Ijazah</th>
                                        <th class="text-center p-0 align-middle">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($alumnis as $alumni) :?>
                                        <tr>
                                            <td class="d-none id-alumni align-middle"><?= $alumni->id_siswa ?></td>
                                            <td class="text-center align-middle"><?= $no ?></td>
                                            <td class="text-center align-middle"><?= $alumni->nisn ?></td>
                                            <td class="text-center align-middle"><?= $alumni->nis ?></td>
                                            <td class="align-middle"><?= $alumni->nama ?></td>
                                            <td class="text-center align-middle"><?= $alumni->kelas_akhir ?></td>
                                            <td class="text-center align-middle"><?= $alumni->tahun_lulus ?></td>
                                            <td class="text-center align-middle"><?= $alumni->no_ijazah ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-xs btn-warning"
                                                   href="<?= base_url() . 'dataalumni/edit?id=' . $alumni->id_siswa ?>">
                                                    <i class="fa fa-pencil-alt"></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $no++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('', array('id' => 'formalumni')); ?>
<div class="modal fade" id="createAlumniModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Alumni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-4 col-sm-offset-4">
                        <label for="nama_alumni">Nama* :</label>
                    </div>
                    <div class="col-md-8 col-sm-offset-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="nama_alumni" type="text" class="form-control" name="nama_alumni"
                                   placeholder="Nama Alumni" required>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 col-sm-offset-4">
                        <label for="nis">NIS :</label>
                    </div>
                    <div class="col-md-8 col-sm-offset-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            </div>
                            <input type="number" id="nis" class="form-control" name="nis" placeholder="NIS">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 col-sm-offset-4">
                        <label for="nisn">NISN :</label>
                    </div>
                    <div class="col-md-8 col-sm-offset-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            </div>
                            <input type="number" id="nisn" class="form-control" name="nisn" placeholder="NISN">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 col-sm-offset-4">
                        <label for="jenis_kelamin" class="control-label">Jenis Kelamin* :</label>
                    </div>
                    <div class="col-md-8 col-sm-offset-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                            </div>
                            <select class="form-control" id="kelas_awal" data-placeholder="Jenis Kelamin"
                                    name="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 col-sm-offset-4">
                        <label for="tahun-lulus">Tahun Lulus* :</label>
                    </div>
                    <div class="col-md-8 col-sm-offset-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-check"></i></span>
                            </div>
                            <input id="tahun-lulus" type="number" class="form-control" name="tahun_lulus"
                                   placeholder="Tahun Lulus" required>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 col-sm-offset-4">
                        <label for="kelas-akhir">Kelas Akhir* :</label>
                    </div>
                    <div class="col-md-8 col-sm-offset-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-school"></i></span>
                            </div>
                            <input id="kelas-akhir" class="form-control" name="kelas_akhir" placeholder="Kelas Akhir"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4 col-sm-offset-4">
                        <label for="nomor-ijazah">Nomor Ijazah :</label>
                    </div>
                    <div class="col-md-8 col-sm-offset-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            </div>
                            <input type="text" id="nomor-ijazah" class="form-control" name="no_ijazah"
                                   placeholder="Nomor Ijazah">
                        </div>
                    </div>
                </div>
                <small><b>*</b> Wajib diisi</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="reset" class="btn bg-warning text-white">
                    <i class="fa fa-sync mr-1"></i> Reset
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<script>
    var thnSelected = '<?= isset($tahun_selected) ? $tahun_selected : '';?>';
    var klsSelected = '<?= isset($kelas_selected) ? $kelas_selected : '';?>';

    function generate() {
        swal.fire({
            title: "Generate Data Alumni",
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

        $.ajax({
            url: base_url + "dataalumni/generatealumni",
            type: "GET",
            success: function (data) {
                console.log("result", data);
                if (data) {
                    swal.fire({
                        title: "Sukses",
                        text: "Data alumni berhasil digenerate",
                        icon: "success",
                        showCancelButton: false,
                    }).then(result => {
                        if (result.value) {
                            window.location.href = base_url + "dataalumni";
                        }
                    });
                } else {
                    swal.fire({
                        title: "ERROR",
                        text: "Data alumni gagal digenerate",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            }, error: function (xhr, status, error) {
                console.log("error", xhr.responseText);
                swal.fire({
                    title: "ERROR",
                    text: "Data alumni gagal digenerate",
                    icon: "error",
                    showCancelButton: false,
                });
            }
        });
    }

    $(document).ready(function () {
        //console.log(arrKelas);

        var opsiTahun = $('#opsi-tahun');
        var opsiKelas = $('#opsi-kelas');

        var tslctd = thnSelected == '' ? "selected='selected'" : "";
        opsiTahun.prepend("<option value='0' " + tslctd + " disabled='disabled'>Pilih Tahun Lulus</option>");
        opsiTahun.change(function () {
            getDataAlumni($(this).val(), opsiKelas.val());
        });

        var kslctd = klsSelected == '' ? "selected='selected'" : "";
        opsiKelas.prepend("<option value='0' " + kslctd + " disabled='disabled'>Pilih Kelas Akhir</option>");
        opsiKelas.change(function () {
            getDataAlumni(opsiTahun.val(), $(this).val());
        });

        function getDataAlumni(tahun, kelas) {
            console.log(tahun);
            if (tahun != null && kelas != null) {
                window.location.href = base_url + 'dataalumni?tahun=' + tahun + '&kelas=' + kelas;
            }
        }

        $('#formalumni').on('submit', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log($(this).serialize());

            $.ajax({
                url: base_url + "dataalumni/create",
                data: $(this).serialize(),
                dataType: "JSON",
                type: 'POST',
                success: function (response) {
                    console.log("result", response);
                    $('#createAlumniModal').modal('hide').data('bs.modal', null);
                    $('#createAlumniModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });

                    if (response.insert) {
                        showSuccessToast(response.text);
                        window.location.href = base_url + 'dataalumni';
                    } else {
                        showDangerToast(response.text);
                    }
                },
                error: function (xhr, status, error) {
                    $('#createAlumniModal').modal('hide').data('bs.modal', null);
                    $('#createAlumniModal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });
                    showDangerToast("Gagal disimpan");
                    console.log(xhr.responseText);
                }
            })
        });
    });
</script>
