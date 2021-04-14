<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <button onclick="window.history.back();" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </button>
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
                        Fitur ini digunakan untuk menyalin semua siswa TP:<?=$tp_active->tahun?> dari semester 1 ke semester 2
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
                    <?= form_open('', array('id' => 'managekelas')) ?>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label>Kelas SMT I</label>
                            <select name="kelas_lama" id="opsi-kelas1" class="form-control">
                                <?php foreach ($kelas as $key=>$kls) :
                                    if (!in_array($kls, $kelas2)) :?>
                                        <option value="<?= $key ?>"><?=$kls?></option>
                                    <?php endif; endforeach; ?>
                            </select>
                            <?php
                            //echo form_dropdown('kelas_lama', $kelas, null, 'id="opsi-kelas1" class="form-control"');
                            ?>
                        </div>
                        <div class='col-md-3 mb-3'>
                            <label>Kelas SMT II</label>
                            <input id="kelas-baru" type='text' name='kelas_baru' class='form-control' readonly />
                        </div>
                        <div class='col-md-3 mb-3 align-self-end'>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i><span class="ml-1">Simpan</span></button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
            <!--
            <div class="card my-shadow mb-4">
                <div class="card-header">
                    <div class="card-title">
                        Copy Data Per-Siswa
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-info align-content-center" role="alert">
                        Fitur ini digunakan untuk menyalin beberapa siswa TP:<?=$tp_active->tahun?> dari semester ganjil ke semester genap
                        <br>
                        <ul>
                            <li>
                                Pilih kelas pada kolom SMT II untuk menyalin data siswa dari SMT I ke SMT II
                            </li>
                            <li>
                                Jangan lupa untuk menyimpan perubahan
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label>Kelas SMT I</label>
                            <?php
            echo form_dropdown(
                'kelas',
                $kelas,
                null,
                'id="opsi-kelas2" class="form-control"'
            ); ?>
                        </div>
                        <div class="col-md-9 mb-2">
                            <div id="info-pindah" class="alert alert-default-info align-content-center d-none" role="alert">
                            </div>
                        </div>
                    </div>
                    <div id="tsiswa"></div>
                    <div class="float-right">
                        <button id="submitkelas" class="btn btn-sm bg-primary text-white">
                            <i class="fas fa-save mr-1"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
            -->
        </div>
    </section>
</div>

<script>
    var arrKelas = JSON.parse(JSON.stringify(<?= json_encode($kelas)?>));
    $(document).ready(function() {
        console.log(arrKelas);
        $('#opsi-kelas1').prepend("<option value='' selected='selected' disabled='disabled'>Pilih Kelas</option>");

        $('#opsi-kelas1').change(function(){
            $('#kelas-baru').val($('#opsi-kelas1 option:selected').text());
        });

        $('#managekelas').submit(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            $.ajax({
                url: base_url + 'datakelas/copyfromsmt1',
                type:"POST",
                data: $(this).serialize(),
                success: function(data) {
                    window.location.href = base_url + 'datakelas/manage';
                    console.log(data);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });

        $('#submitkelas').click(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var form = $('#managekelas').serialize();
            const $rows = $('#tsiswa').find('tr'), headers = $rows.splice(0, 1);
            var jsonKelas = [];
            $rows.each((i, row) => {
                var idSiswa = $(row).attr("data-siswa");
                const $colSelectKelas = $(row).find('select[data-name="select-kelas"]');

                let item = {};
                item ["id_kelas"] = $colSelectKelas.val();
                item ["id_siswa"] = idSiswa;
                jsonKelas.push(item);
            });

            var dataPost = form + '&kelas=' + JSON.stringify(jsonKelas);
            console.log(dataPost);

            if (jsonKelas.length > 0) {
                $.ajax({
                    url: base_url + 'datakelas/copysiswafromsmt1',
                    type:"POST",
                    data: dataPost,
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>