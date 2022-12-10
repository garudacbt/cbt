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
                    <div class="alert alert-default-success border-success">
                        <h6><i class="icon fas fa-check"></i> Info Soal</h6>
                        <div class="row" id="info">
                            <div class="col-8">
                                <table>
                                    <tr>
                                        <td>Jenis Penilaian</td>
                                        <td> : </td>
                                        <td><span class="text-bold"><?= $jadwal->nama_jenis ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Mata Pelajaran</td>
                                        <td> : </td>
                                        <td><span class="text-bold"><?= $jadwal->nama_mapel ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td> : </td>
                                        <td><span class="text-bold"><?= $nama_kelas ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Pengampu</td>
                                        <td> : </td>
                                        <td><span class="text-bold"><?= $jadwal->nama_guru ?></span></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-4">
                                <table class="table table-sm table-bordered table-striped">
                                    <tr>
                                        <td class="text-center" style="border-color:black;">
                                            Jml. Essai
                                        </td>
                                        <td class="text-center" style="border-color:black;">
                                            Max. Nilai Essai
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="border-color:black;">
                                            <span class="text-bold" style="font-size: 20pt"><?= $jadwal->tampil_esai ?></span>
                                        </td>
                                        <td class="text-center" style="border-color:black;">
                                            <span class="text-bold" style="font-size: 20pt"><?= $jadwal->bobot_esai ?></span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="table table-striped table-bordered" id="table-essai">
                        <tr>
                            <th class="text-center align-middle" width="40">
                                No.
                            </th>
                            <th class="text-center align-middle" width="100">
                                No. Peserta
                            </th>
                            <th class="align-middle">
                                Nama
                            </th>
                            <th class="text-center align-middle">
                                Nilai Essai
                            </th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($siswas as $siswa) :
                            $idSiswa = $siswa->id_siswa;
                            ?>
                            <tr>
                                <td class="text-center align-middle"> <?= $no ?> </td>
                                <td class="text-center align-middle"> <?= $siswa->nomor_peserta ?> </td>
                                <td class="align-middle"> <?= $siswa->nama ?> </td>
                                <td class="text-center text-success align-middle essai">
                                    <input class="nessai" name="input<?= $idSiswa ?>" data-idsiswa="<?= $idSiswa ?>"
                                           value="<?= $siswa->skor_essai ?>"
                                           type="number" min="0"
                                           max="<?= $jadwal->bobot_esai ?>"
                                           step="0.1"/>
                            </tr>
                            <?php $no++; endforeach; ?>
                    </table>
                    <br>
                    <button id="essai" class="float-right btn btn-sm btn-primary" onclick="simpan(this)">Simpan Nilai Essai
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

        var max = <?= $jadwal->bobot_esai ?>;
        var $nilai = $(`#table-essai`).find('.essai');
        var json = [];
        $.each($nilai, function () {
            var n = $(this).find('.nessai').val();
            if (n > max) {
                showDangerToast("Point persoal harus kurang dari " + max);
                json = [];
                return false;
            }
            if ($(this).is(":hidden")) {
                showDangerToast("Klik tombol &#10004; dulu");
                json = [];
                return false;
            }

            var item = {};
            item['id_nilai'] = $(this).find('.nessai').data('idsiswa') + '<?= $jadwal->id_jadwal ?>;';
            item['id_siswa'] = $(this).find('.nessai').data('idsiswa');
            item['id_jadwal'] = '<?= $jadwal->id_jadwal ?>;';
            item['essai_nilai'] = n;
            json.push(item);
        });

        var dataPost = $('#koreksi').serialize() + '&jadwal=<?=$jadwal->id_jadwal?>&jenis=5' + '&nilai=' + JSON.stringify(json);
        console.log(dataPost);

        if (json.length > 0) {
            loading.removeClass('d-none');
            $.ajax({
                url: base_url + "cbtnilai/simpankoreksiessai",
                type: "POST",
                data: dataPost,
                success: function (data) {
                    console.log(data);
                    if (data.success > 0) {
                        window.location.reload();
                    } else {
                        loading.addClass('d-none');
                        showWarningToast('Tidak ada nilai yang disimpan')
                    }
                }, error: function (xhr, status, error) {
                    loading.addClass('d-none');
                    console.log("error", xhr.responseText);
                    showDangerToast('Error');
                }
            });
        }
    }
    $(document).ready(function () {
    });
</script>