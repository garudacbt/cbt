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
            <?php
            //echo '<pre>';
            //var_dump($siswas);
            //echo '</pre>';
            $ruang_aktif = $btn_aktif == 1 ? 'active btn-primary' : 'btn-outline-primary';
            $kelas_aktif = $btn_aktif == 2 ? 'active btn-primary' : 'btn-outline-primary';

            $ruang_none = $btn_aktif == 1 ? '' : 'd-none';
            $kelas_none = $btn_aktif == 2 ? '' : 'd-none';
            ?>
            <div class="card card-default my-shadow">
                <div class="card-header with-border">
                    <h3 class="card-title">Master <?= $subjudul ?></h3>
                    <div id="selector" class="card-tools btn-group">
                        <button type="button" class="btn <?= $ruang_aktif ?>">By Ruang</button>
                        <button type="button" class="btn <?= $kelas_aktif ?>">By Kelas</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 <?= $ruang_none ?>" id="by-ruang">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Ruang</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'ruang',
                                    $ruang,
                                    $ruang_selected,
                                    'id="ruang" class="form-control"'
                                ); ?>
                            </div>
                        </div>

                        <div class="col-3 <?= $ruang_none ?>" id="by-sesi">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Sesi</span>
                                </div>
                                <?php
                                echo form_dropdown(
                                    'sesi',
                                    $sesi,
                                    $sesi_selected,
                                    'id="sesi" class="form-control"'
                                ); ?>
                            </div>
                        </div>

                        <div class="col-md-3 <?= $kelas_none ?>" id="by-kelas">
                            <div class="input-group">
                                <div class="input-group-prepend w-30">
                                    <span class="input-group-text">Kelas</span>
                                </div>
                                <?php
                                echo form_dropdown('kelas', $kelas, $kelas_selected, 'id="kelas" class="form-control"'); ?>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <button class="btn btn-success" id="download-word">Ekspor ke Word</button>
                        </div>
                    </div>
                    <hr>

                    <div class="row" id="for-export">
                        <table>
                            <?php
                            foreach ($siswas as $siswa) : ?>
                                <tr>
                                    <td rowspan="6">
                                        <img width="100" height="120" src="<?= base_url() . $siswa->foto ?>"
                                             style="object-fit: cover;object-position: center;outline: 1px solid;"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        4
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        5
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/jquery.wordexport.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/app/js/tableToExcel.js"></script>
<script type="text/javascript">
    var user_id = '<?=$user->id?>';
    var kelas = '<?=$kelas_selected == null ? '0' : $kelas_selected?>';
    var ruang = '<?=$ruang_selected == null ? '0' : $ruang_selected?>';
    var sesi = '<?=$sesi_selected == null ? '0' : $sesi_selected?>';

    $(document).ready(function () {
        ajaxcsrf();

        var opsiRuang = $("#ruang");
        var opsiSesi = $("#sesi");
        var opsiKelas = $("#kelas");

        var selRuang = ruang === '0' ? 'selected' : '';
        var selSesi = sesi === '0' ? 'selected' : '';
        var selKelas = kelas === '0' ? 'selected' : '';
        opsiRuang.prepend("<option value='' " + selRuang + " disabled>Pilih Ruang</option>");
        opsiSesi.prepend("<option value='' " + selSesi + " disabled>Pilih Sesi</option>");
        opsiKelas.prepend("<option value='' " + selKelas + " disabled>Pilih Kelas</option>");

        $('#selector button').click(function () {
            $(this).addClass('active').siblings().addClass('btn-outline-primary').removeClass('active btn-primary');

            if (!$('#by-kelas').is(':hidden')) {
                $('#by-kelas').addClass('d-none');
                $('#by-ruang').removeClass('d-none');
                $('#by-sesi').removeClass('d-none');
            } else {
                $('#by-kelas').removeClass('d-none');
                $('#by-ruang').addClass('d-none');
                $('#by-sesi').addClass('d-none');
            }
        });

        function loadSiswaRuang(ruang, sesi) {
            var notempty = ruang && sesi;
            if (notempty) {
                window.location.href = base_url + "cbtpeserta?ruang=" + ruang + '&sesi=' + sesi;
            } else {
                console.log('empty')
            }
        }

        function loadSiswaKelas(kelas) {
            if (kelas) {
                window.location.href = base_url + "cbtpeserta?kelas=" + kelas;
            } else {
                console.log('empty')
            }
        }

        opsiKelas.change(function () {
            kelas = $(this).val();
            loadSiswaKelas(kelas);
        });

        opsiRuang.change(function () {
            ruang = $(this).val();
            loadSiswaRuang(ruang, opsiSesi.val());
        });

        opsiSesi.change(function () {
            sesi = $(this).val();
            loadSiswaRuang(opsiRuang.val(), sesi);
        });

        $("#download-word").click(function (event) {
            $("#for-export").wordExport(`test`);
        });
    });
</script>
