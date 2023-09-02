<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 17:20
 */
?>

<div class="content-wrapper bg-white">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
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
            <div class="card card-default my-shadow mb-4">
                <div class="card-body">
                    <div class="alert alert-default-danger">
                        <ul>
                            <li>
                                Halaman ini digunakan jika ingin menginput nilai tanpa koreksi.
                            </li>
                            <li>
                                Jika hasil siswa sudah dikoreksi dan diberi nilai, maka nilai di halaman ini akan
                                mengganti nilai hasil koreksi.
                            </li>
                            <li>
                                Nilai 0 di halaman ini tidak akan mengganti nilai hasil koreksi.
                            </li>
                        </ul>
                    </div>
                    <div class="alert alert-default-success border-success">
                        <h6><i class="icon fas fa-check"></i> Info Soal</h6>
                        <div class="row" id="info">
                            <div class="col-12 col-md-6">
                                <table>
                                    <tr>
                                        <td>Jenis Penilaian</td>
                                        <td> :</td>
                                        <td><span class="text-bold"><?= $jadwal->nama_jenis ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Mata Pelajaran</td>
                                        <td> :</td>
                                        <td><span class="text-bold"><?= $jadwal->nama_mapel ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td> :</td>
                                        <td><span class="text-bold"><?= $nama_kelas ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Pengampu</td>
                                        <td> :</td>
                                        <td><span class="text-bold"><?= $jadwal->nama_guru ?></span></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 col-md-6">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <?php if ($jadwal->tampil_pg != '0') : ?>
                                            <td class="text-center" style="border-color:black;">
                                                Jml. PG
                                            </td>
                                        <?php endif;
                                        if ($jadwal->tampil_kompleks != '0') :?>
                                            <td class="text-center" style="border-color:black;">
                                                Jml. PGK
                                            </td>
                                        <?php endif;
                                        if ($jadwal->tampil_jodohkan != '0') :?>
                                            <td class="text-center" style="border-color:black;">
                                                Jml. Jodohkan
                                            </td>
                                        <?php endif;
                                        if ($jadwal->tampil_isian != '0') :?>
                                            <td class="text-center" style="border-color:black;">
                                                Jml. Isian Singkat
                                            </td>
                                        <?php endif;
                                        if ($jadwal->tampil_esai != '0') :?>
                                            <td class="text-center" style="border-color:black;">
                                                Jml. Essai
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <?php if ($jadwal->tampil_pg != '0') : ?>
                                            <td class="text-center" style="border-color:black;">
                                                <span class="text-bold"
                                                      style="font-size: 20pt"><?= $jadwal->tampil_pg ?></span>
                                            </td>
                                        <?php endif;
                                        if ($jadwal->tampil_kompleks != '0') :?>
                                            <td class="text-center" style="border-color:black;">
                                                <span class="text-bold"
                                                      style="font-size: 20pt"><?= $jadwal->tampil_kompleks ?></span>
                                            </td>
                                        <?php endif;
                                        if ($jadwal->tampil_jodohkan != '0') :?>
                                            <td class="text-center" style="border-color:black;">
                                                <span class="text-bold"
                                                      style="font-size: 20pt"><?= $jadwal->tampil_jodohkan ?></span>
                                            </td>
                                        <?php endif;
                                        if ($jadwal->tampil_isian != '0') :?>
                                            <td class="text-center" style="border-color:black;">
                                                <span class="text-bold"
                                                      style="font-size: 20pt"><?= $jadwal->tampil_isian ?></span>
                                            </td>
                                        <?php endif;
                                        if ($jadwal->tampil_esai != '0') :?>
                                            <td class="text-center" style="border-color:black;">
                                                <span class="text-bold"
                                                      style="font-size: 20pt"><?= $jadwal->tampil_esai ?></span>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="table table-striped table-bordered table-responsive" id="table-essai">
                        <tr>
                            <th class="text-center align-middle">
                                No.
                            </th>
                            <th class="text-center align-middle">
                                No. Peserta
                            </th>
                            <th class="align-middle">
                                Nama
                            </th>
                            <?php if ($jadwal->tampil_pg != '0') : ?>
                                <th class="text-center align-middle">
                                    Nilai PG<br>
                                    Max. Point: <?= $jadwal->bobot_pg ?>
                                </th>
                            <?php endif;
                            if ($jadwal->tampil_kompleks != '0') :?>
                                <th class="text-center align-middle">
                                    Nilai PG Kompleks<br>
                                    Max. Point: <?= $jadwal->bobot_kompleks ?>
                                </th>
                            <?php endif;
                            if ($jadwal->tampil_jodohkan != '0') :?>
                                <th class="text-center align-middle">
                                    Nilai Menjodohkan<br>
                                    Max. Point: <?= $jadwal->bobot_jodohkan ?>
                                </th>
                            <?php endif;
                            if ($jadwal->tampil_isian != '0') :?>
                                <th class="text-center align-middle">
                                    Nilai Isisan Singkat<br>
                                    Max.Point: <?= $jadwal->bobot_isian ?>
                                </th>
                            <?php endif;
                            if ($jadwal->tampil_esai != '0') :?>
                                <th class="text-center align-middle">
                                    Nilai Essai<br>
                                    Max.Point: <?= $jadwal->bobot_esai ?>
                                </th>
                            <?php endif; ?>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($siswas as $siswa) :
                            $idSiswa = $siswa->id_siswa;
                            ?>
                            <tr class="nilai" data-idsiswa="<?= $idSiswa ?>">
                                <td class="text-center align-middle"> <?= $no ?> </td>
                                <td class="text-center align-middle"> <?= $siswa->nomor_peserta ?> </td>
                                <td class="align-middle"> <?= $siswa->nama ?> </td>
                                <?php if ($jadwal->tampil_pg != '0') : ?>
                                    <td class="text-center text-success align-middle">
                                        <?= $siswa->skor_pg ?>
                                    </td>
                                <?php endif;
                                if ($jadwal->tampil_kompleks != '0') :?>
                                    <td class="text-center text-success align-middle">
                                        <input class="form-control npg2" name="input-pg2"
                                               value="<?= $siswa->skor_pg2 ?>"
                                               type="number" min="0"
                                               max="<?= $jadwal->bobot_kompleks ?>"
                                               step="0.1"/>
                                    </td>
                                <?php endif;
                                if ($jadwal->tampil_jodohkan != '0') :?>
                                    <td class="text-center text-success align-middle">
                                        <input class="form-control njodohkan" name="input-jodohkan"
                                               value="<?= $siswa->skor_jod ?>"
                                               type="number" min="0"
                                               max="<?= $jadwal->bobot_jodohkan ?>"
                                               step="0.1"/>
                                    </td>
                                <?php endif;
                                if ($jadwal->tampil_isian != '0') :?>
                                    <td class="text-center text-success align-middle">
                                        <input class="form-control nisian" name="input-isian"
                                               value="<?= $siswa->skor_isian ?>"
                                               type="number" min="0"
                                               max="<?= $jadwal->bobot_isian ?>"
                                               step="0.1"/>
                                    </td>
                                <?php endif;
                                if ($jadwal->tampil_esai != '0') :?>
                                    <td class="text-center text-success align-middle">
                                        <input class="form-control nessai" name="input-essai"
                                               value="<?= $siswa->skor_essai ?>"
                                               type="number" min="0"
                                               max="<?= $jadwal->bobot_esai ?>"
                                               step="0.1"/>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <?php $no++; endforeach; ?>
                    </table>
                    <br>
                    <button id="essai" class="float-right btn btn-sm btn-primary" onclick="simpan(this)">
                        Simpan Nilai
                    </button>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('update', array('id' => 'koreksi')) ?>
<?= form_close() ?>

<script>
    function simpan(btn) {
        //var id = $(btn).attr('id');
        var loading = $(`#loading`);

        var maxpg2 = <?= $jadwal->bobot_kompleks ?>;
        var maxjod = <?= $jadwal->bobot_jodohkan ?>;
        var maxis = <?= $jadwal->bobot_isian ?>;
        var maxes = <?= $jadwal->bobot_esai ?>;

        var $nilai = $(`#table-essai`).find('.nilai');
        var json = [];
        $.each($nilai, function () {
            var npg2 = $(this).find('.npg2').val();
            var njod = $(this).find('.njodohkan').val();
            var nis = $(this).find('.nisian').val();
            var nes = $(this).find('.nessai').val();
            if (npg2 > maxpg2 || njod > maxjod || nis > maxis || nes > maxes) {
                showDangerToast("Point persoal harus kurang dari nilai max.");
                json = [];
                return false;
            }

            var item = {};
            item['id_nilai'] = $(this).data('idsiswa') + '<?= $jadwal->id_jadwal ?>';
            item['id_siswa'] = $(this).data('idsiswa');
            item['id_jadwal'] = '<?= $jadwal->id_jadwal ?>';
            item['kompleks_nilai'] = npg2;
            item['jodohkan_nilai'] = njod;
            item['isian_nilai'] = nis;
            item['essai_nilai'] = nes;
            json.push(item);
        });

        var dataPost = $('#koreksi').serialize() + '&jadwal=<?=$jadwal->id_jadwal?>&nilai=' + JSON.stringify(json);
        console.log(dataPost);

        if (json.length > 0) {
            loading.removeClass('d-none');
            swal.fire({
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
                url: base_url + "cbtnilai/simpankoreksiessai",
                type: "POST",
                data: dataPost,
                success: function (data) {
                    console.log(data);
                    if (data.success > 0) {
                        swal.fire({
                            title: "Berhasil",
                            text: "Nilai berhasil disimapn",
                            icon: "success"
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    } else {
                        loading.addClass('d-none');
                        swal.fire({
                            title: "Gagal",
                            text: 'Tidak ada nilai yang disimpan',
                            icon: "error"
                        });
                    }
                }, error: function (xhr, status, error) {
                    loading.addClass('d-none');
                    console.log("error", xhr.responseText);
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        }
    }

    $(document).ready(function () {
    });
</script>
