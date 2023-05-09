<div class="content-wrapper bg-white">
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
                    <h3 class="card-title"><b><?= $subjudul ?></b></h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-default-info shadow align-content-center" role="alert">
                        <strong>Catatan!</strong>
                        <ol>
                            <li>
                                Mengatur urutan aktif jadwal ujian sesuai urutan jam
                            </li>
                            <li>
                                Contoh <b>Jam ke</b> 2, maka jadwal mapel akan aktif setelah jam pertama selesai
                                dikerjakan oleh siswa
                            </li>
                            <li>
                                Jika semua <b>Jam ke</b> diatur ke 0 atau 1 maka semua jadwal yang aktif akan bisa
                                dikerjakan oleh siswa
                            </li>
                            <li>
                                Halaman ini berlaku jika semua jadwal telah diaktifkan
                            </li>
                            <li>
                                Jika halaman ini tidak diatur/tidak disimpan, maka jadwal ujian mengikuti aturan di MENU
                                <b>JADWAL</b>
                            </li>
                        </ol>
                    </div>
                    <br>
                    <div class="row mb-3">
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <?php echo form_dropdown('jenis', $jenis, $jenis_selected, 'id="jenis" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-6" id="by-level">
                            <div class="form-group">
                                <label for="level">Level Kelas</label>
                                <?php echo form_dropdown('level', $levels, $level_selected, 'id="level" class="form-control"'); ?>
                            </div>
                        </div>
                        <div class="col-md-2 col-4">
                            <div class="form-group">
                                <label for="filter">Filter</label>
                                <?php echo form_dropdown('filter', $filter, $filter_selected, 'id="filter" class="form-control"'); ?>
                            </div>
                        </div>
                        <?php $dnone = $filter_selected == '0' ? 'd-none' : '' ?>
                        <div class='col-md-2 col-4 <?= $dnone ?>' id="tgl-dari">
                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type='text' id="dari" name='dari' value="<?= $dari_selected ?>"
                                       class='tgl form-control' autocomplete='off'/>
                            </div>
                        </div>
                        <div class='col-md-2 col-4 <?= $dnone ?>' id="tgl-sampai">
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type='text' id="sampai" name='sampai'
                                       class='tgl form-control' value="<?= $sampai_selected ?>"
                                       autocomplete='off'/>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (count($jadwals) > 0) :
                        if ($jenis_selected != null) :?>
                            <table class="table border mt-4" id="tbl">
                                <tr>
                                    <th class="text-center align-middle border">
                                        Hari & Tanggal
                                    </th>
                                    <th class="text-center align-middle border">
                                        Level Kelas
                                    </th>
                                    <th class="text-center align-middle border">
                                        Jadwal / Mata Pelajaran
                                    </th>
                                    <th class="text-center align-middle border" style="width: 100px">
                                        Jam ke
                                    </th>
                                </tr>
                                <?php
                                foreach ($jadwals as $jadwal):
                                    $jumlahKelas = json_decode(json_encode(unserialize($jadwal->bank_kelas)));
                                    $kls_jadwal = [];
                                    $kelasbank = '';
                                    $no = 1;
                                    foreach ($jumlahKelas as $j) {
                                        if (isset($kelas[$j->kelas_id])) {
                                            if ($no > 1) {
                                                $kelasbank .= ', ';
                                            }
                                            $kelasbank .= $kelas[$j->kelas_id];
                                            $no++;
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td class="text-center align-middle border">
                                            <?= buat_tanggal(date('D, d M Y', strtotime($jadwal->tgl_mulai))) ?>
                                        </td>
                                        <td class="border text-center align-middle level">
                                            <?= $jadwal->bank_level ?> (<?= $kelasbank ?>)
                                        </td>
                                        <td class="border text-center align-middle">
                                            <?= $jadwal->bank_kode . ' (' . $jadwal->nama_mapel . ')' ?>
                                        </td>
                                        <td class="text-center border jam-ke" data-id="<?= $jadwal->id_jadwal ?>">
                                            <input class="form-control" type="number" min="1" name="jamke"
                                                   value="<?= $jadwal->jam_ke ?>">
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif; ?>
                        <?= form_open('', array('id' => 'simpanalokasi')) ?>
                        <button type="submit" class="btn btn-primary card-tools mt-3 float-right">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                        <?= form_close() ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url() ?>/assets/app/js/jquery.rowspanizer.js"></script>
<script>
    $(document).ready(function () {
        ajaxcsrf();
        $("#tbl").rowspanizer({columns: [0]});

        var opsiLevel = $("#level");
        var opsiJenis = $("#jenis");

        var opsiFilter = $("#filter");
        var opsiDari = $("#dari");
        var opsiSampai = $("#sampai");

        opsiFilter.change(function () {
            if ($(this).val() == '0') {
                $('#tgl-dari').addClass('d-none');
                $('#tgl-sampai').addClass('d-none');
                var jenis = opsiJenis.val();
                var level = opsiLevel.val();
                var url = base_url + 'cbtalokasi?jenis=' + jenis + '&level=' + level + '&filter=0';
                if (jenis != "" && level != "0") {
                    window.location.href = url;
                }
            } else {
                $('#tgl-dari').removeClass('d-none');
                $('#tgl-sampai').removeClass('d-none');
            }
        });

        opsiLevel.change(function () {
            //var lvl = $(this).val();
            //if (lvl != "" && lvl !== old) {
            getAllJadwal();
            //window.location.href = base_url + 'cbtalokasi?jenis=' + opsiJenis.val() + '&level=' + lvl;
            //}
        });

        opsiJenis.change(function () {
            getAllJadwal();
        });

        var dariold = "<?=$dari_selected?>";
        opsiDari.change(function () {
            var dari = $(this).val();
            if (dari != "" && dari !== dariold) {
                getAllJadwal();
            }
        });

        var sampaiold = "<?=$sampai_selected?>";
        opsiSampai.change(function () {
            var sampai = $(this).val();
            if (sampai != "" && sampai !== sampaiold) {
                getAllJadwal();
            }
        });

        function getAllJadwal() {
            var jenis = opsiJenis.val();
            var level = opsiLevel.val();
            var dari = opsiDari.val();
            var sampai = opsiSampai.val();
            var fil = opsiFilter.val();

            var tglKosong = fil == '1' && (dari == "" || sampai == "");
            var url = base_url + 'cbtalokasi?jenis=' + jenis + '&level=' + level + '&filter=' + opsiFilter.val() + '&dari=' + dari + '&sampai=' + sampai;
            console.log(url);
            if (jenis != "" && level != "0" && !tglKosong) {
                window.location.href = url;
            }
        }

        $('#simpanalokasi').on('submit', function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            const $rows1 = $('#tbl').find('tr'), headers1 = $rows1.splice(0, 1);
            var jsonObj = [];
            $rows1.each((i, row) => {
                const td = $(row).find('.jam-ke');
                const jam_ke = td.find('input[name="jamke"]').val();
                const id_jadwal = td.data('id');

                let item = {};
                item ["id_jadwal"] = id_jadwal;
                item ["jam_ke"] = jam_ke;

                jsonObj.push(item);
            });

            var dataPost = $(this).serialize() + "&alokasi=" + JSON.stringify(jsonObj);
            console.log(dataPost);

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
                url: base_url + "cbtalokasi/savealokasi",
                type: "POST",
                dataType: "JSON",
                data: dataPost,
                success: function (data) {
                    console.log("response:", data);
                    if (data.status) {
                        swal.fire({
                            title: "Sukses",
                            html: "Alokasi waktu ujian berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        }).then(result => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });
                    } else {
                        swal.fire({
                            title: "Gagal",
                            text: "Alokasi gagal disimpan",
                            icon: "error"
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("response:", xhr.responseText);
                    const err = JSON.parse(xhr.responseText)
                    swal.fire({
                        title: "Error",
                        text: err.Message,
                        icon: "error"
                    });
                }
            });
        });

        $('#selector button').click(function () {
            $(this).addClass('active').siblings().addClass('btn-outline-primary').removeClass('active btn-primary');

            if (!$('#by-kelas').is(':hidden')) {
                $('#by-kelas').addClass('d-none');
                $('#by-ruang').removeClass('d-none');
            } else {
                $('#by-kelas').removeClass('d-none');
                $('#by-ruang').addClass('d-none');
            }
        });

    })
</script>
