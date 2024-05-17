<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('dataguru') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert border border-success alert-default-success">
                        <div class="row">
                            <span class="col-12 mb-2">
                                Jika ada jabatan guru di semester sebelumnya, jabatan dan mata pelajaran yang diampu bisa dicopy ke semester sekarang, dengan catatan:
                                <ul class="mb-1">
                                    <li>
                                        <b>Aksi ini akan mengganti jabatan dan mapel guru yang sudah diatur di semester sekarang</b>.
                                    </li>
                                    <li>
                                        Pastikan nama kelas sekarang sudah dibuat dan sama seperti nama kelas sebelumnya.
                                    </li>
                                    <li>
                                        Aksi ini tidak akan berjalan sempurna jika nama kelas di semester sebelumnya berbeda dengan nama kelas di semestr sekarang.
                                    </li>
                                </ul>
                            </span>
                            <div class="col-12 text-right">
                                <button type="button" data-toggle="modal" data-target="#beforeModal"
                                        class="btn btn-success btn-sm">
                                    Lihat jabatan sebelumnya
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card my-shadow mb-4">
                        <?= form_open('dataguru/saveJabatan', array('id' => 'editjabatan'), array('id_guru' => $guru->id_guru)) ?>
                        <div class="card-header">
                            <h6 class="card-title text-bold">Edit Jabatan <?= $guru->nama_guru ?></h6>
                            <div class="card-tools">
                                <a type="button" href="<?= base_url('dataguru') ?>" class="btn btn-sm btn-default">
                                    <i class="fa fa-sync"></i> <span class="d-none d-sm-inline-block ml-1">Reload</span>
                                </a>
                                <button type="submit" id="btn-jabatan" class="btn btn-primary btn-sm">
                                    <i class="fas fa-save mr-1"></i> Simpan
                                </button>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php
                                //var_dump($guru);
                                $jmapel = json_decode(json_encode($guru->mapel_kelas));
                                $jmapelval = json_decode(json_encode(unserialize($jmapel ?? '')));
                                $jks = [];
                                if ($jmapelval != null) {
                                    foreach ($jmapelval as $key => $val) {
                                        array_push($jks, $val->id_mapel);
                                    }
                                }

                                $jekstra = json_decode(json_encode($guru->ekstra_kelas));
                                $jekstraval = json_decode(json_encode(unserialize($jekstra ?? '')));
                                $jke = [];
                                if ($jekstraval != null) {
                                    foreach ($jekstraval as $key => $val) {
                                        array_push($jke, $val->id_ekstra);
                                    }
                                }
                                ?>
                                <div class="col-md-6">
                                    <div class="card card-light border border-light">
                                        <div class="card-header">
                                            <span class="card-title text-bold">Mengajar</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-4">
                                                <label>Mata Pelajaran:</label>
                                                <?php
                                                echo form_dropdown(
                                                    'mapel[]',
                                                    $mapels,
                                                    $jks,
                                                    'id="mapel" class="select2 form-control form-control-sm" multiple="multiple" data-placeholder="Pilih Mapel"'
                                                ); ?>

                                            </div>
                                            <div class="row" id="input-ekstra">
                                                <label>Ekstrakurikuler:</label>
                                                <?php
                                                echo form_dropdown(
                                                    'ekstra[]',
                                                    $ekskul,
                                                    $jke,
                                                    'id="ekstra" class="select2 form-control form-control-sm" multiple="multiple" data-placeholder="Pilih Ekstrakurikuler"'
                                                ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-light border border-light">
                                        <div class="card-header">
                                            <span id="keterangan"
                                                  class="card-title text-bold">Tentukan Kelas Mapel</span>
                                        </div>
                                        <div class="card-body" id="input-mapel"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-light border border-light">
                                        <div class="card-header">
                                            <span id="keterangan" class="card-title text-bold">Jabatan</span>
                                            <button type="button" data-toggle="modal" data-target="#createJabatanModal"
                                                    class="card-tools btn btn-xs"><i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="card-body" id="input-jabatan">
                                            <div class="row mb-4">
                                                <label>Jabatan</label>
                                                <?php
                                                echo form_dropdown(
                                                    'level',
                                                    $levels,
                                                    $guru->id_level,
                                                    'id="level" class="form-control form-control-sm" required'
                                                ); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= form_open('dataguru/saveJabatan', array('id' => 'copyjabatan'), array('id_guru' => $guru->id_guru, 'copy' => 'copy')) ?>
<div class="modal fade" id="beforeModal" tabindex="-1" role="dialog" aria-labelledby="beforeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="beforeModalLabel">Jabatan Sebelumnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <?php
                    $kls_lalu = $before['kelass'];
                    $guru2 = $before['guru'];
                    if ($guru2->mapel_kelas != null || $guru2->ekstra_kelas != null):
                        $jks2 = [];
                        $jke2 = [];
                        ?>
                        <div class="d-none">
                            <?php
                            foreach ($guru2->mapel_kelas as $val) {
                                array_push($jks2, $val->id_mapel);

                                $idklsm = [];
                                foreach ($val->kelas_mapel as $ids) {
                                    array_push($idklsm, $ids->kelas);
                                }

                                echo form_dropdown(
                                    'kelasmapel' . $val->id_mapel . '[]',
                                    $kls_lalu,
                                    $idklsm,
                                    'class="guru2 select2 form-control form-control-sm" multiple="multiple"'
                                );
                                echo '<input type="hidden" name="nama_mapel' . $val->id_mapel . '" value="' . $val->nama_mapel . '">';
                            }
                            foreach ($guru2->ekstra_kelas as $val) {
                                array_push($jke2, $val->id_ekstra);

                                $idklse = [];
                                foreach ($val->kelas_ekstra as $ids) {
                                    array_push($idklse, $ids->kelas);
                                }

                                echo form_dropdown(
                                    'kelasekstra' . $val->id_ekstra . '[]',
                                    $kls_lalu,
                                    $idklse,
                                    'class="guru2 select2 form-control form-control-sm" multiple="multiple"'
                                );
                                echo '<input type="hidden" name="nama_ekstra' . $val->id_ekstra . '" value="' . $val->nama_ekstra . '">';
                            }
                            echo form_dropdown(
                                'mapel[]',
                                $mapels,
                                $jks2,
                                'class="guru2 select2 form-control form-control-sm" multiple="multiple"'
                            );
                            echo form_dropdown(
                                'ekstra[]',
                                $ekskul,
                                $jke2,
                                'class="guru2 select2 form-control form-control-sm" multiple="multiple"'
                            );
                            echo form_dropdown(
                                'level',
                                $levels,
                                $guru2->id_level,
                                'class="guru2 select2 form-control form-control-sm"'
                            );
                            echo form_dropdown(
                                'kelas_wali',
                                $kls_lalu,
                                $guru2->id_kelas,
                                'class="guru2 select2 form-control form-control-sm"'
                            );
                            ?>
                        </div>
                        <span>Jabatan:</span>
                        <br>
                        <span class="text-lg"><?= $levels[$guru2->id_level] ?></span>
                        <br>
                        <br>
                        <span>Pengampu:</span>
                        <table class="table table-bordered table-bordered">
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Mata Pelajaran</th>
                                <th class="text-center">Kelas</th>
                            </tr>
                            <?php
                            $nn = 1;
                            foreach ($guru2->mapel_kelas as $mapel) :
                                $all_kelas_mapel = $mapel->kelas_mapel;
                                $kls_guru_mapel = '';
                                foreach ($all_kelas_mapel as $kls_mpl) {
                                    if (isset($kls_lalu[$kls_mpl->kelas])) $kls_guru_mapel .= '<span class="badge badge-primary border">' . $kls_lalu[$kls_mpl->kelas] . '</span> ';
                                }
                                ?>
                                <tr>
                                    <td class="text-center"><?= $nn ?></td>
                                    <td><?= $mapel->nama_mapel ?></td>
                                    <td class="text-center">
                                        <?= $kls_guru_mapel ?>
                                    </td>
                                </tr>
                                <?php $nn++; endforeach; ?>
                            <?php
                            foreach ($guru2->ekstra_kelas as $ekstra) :
                                $all_kelas_ekstra = $ekstra->kelas_ekstra;
                                $kls_guru_ekstra = '';
                                foreach ($all_kelas_ekstra as $kls_eks) {
                                    if (isset($kls_lalu[$kls_eks->kelas])) $kls_guru_ekstra .= '<span class="badge badge-primary border">' . $kls_lalu[$kls_eks->kelas] . '</span> ';
                                }
                                ?>
                                <tr>
                                    <td class="text-center align-middle"><?= $nn ?></td>
                                    <td class="align-middle"><?= $ekstra->nama_ekstra ?></td>
                                    <td class="text-center align-middle">
                                        <?= $kls_guru_ekstra ?>
                                    </td>
                                </tr>
                                <?php $nn++; endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success float-right">
                    <i class="fa fa-copy"></i> Copy
                </button>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>

<?= form_open('dataguru/addJabatan', array('id' => 'create')) ?>
<div class="modal fade" id="createJabatanModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Level <b>Jabatan</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert border border-danger alert-default-warning">
                    Nomor 1 sampai 5 <b>jangan diubah dan jangan diganti</b>.
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <button type="button" class="btn btn-info add-new float-right"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
                <div class="table-responsive" id="table-editable">
                    <table class="table table-bordered w-100">
                        <thead>
                        <tr>
                            <th class="text-center align-middle" style="width: 80px">No</th>
                            <th class="align-middle">Jabatan</th>
                            <th class="text-center align-middle">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($levels as $id=>$level) :
                            $btn_dis = $id <= 5 ? 'btn-disabled' : '';
                            $dis = $id <= 5 ? 'disabled' : '';
                            if ($id != ''):?>
                                <tr>
                                    <td class="text-center align-middle p-1 id-level"><?=$id?></td>
                                    <td class="align-middle p-1"><?=$level?></td>
                                    <td class="text-center align-middle p-1">
                                        <button type="button" class="add btn <?=$btn_dis?>" title="Add" style="display: none;" <?=$dis?>><i class="fa fa-check text-success"></i></button>
                                        <button type="button" class="edit btn <?=$btn_dis?>" title="Edit" <?=$dis?>><i class="fa fa-pencil text-warning"></i></button>
                                        <button type="button" class="delete btn <?=$btn_dis?>" title="Delete" <?=$dis?>><i class="fa fa-trash text-danger"></i></button>
                                    </td>
                                </tr>
                            <?php endif; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>

<?php
$ekstra_guru = $guru->ekstra_kelas == null ? [] : unserialize($guru->ekstra_kelas ?? '');
?>
<script type="text/javascript">
    var guru_id = '<?=$guru->id_guru?>';
    var kelas_id = '<?=$guru->id_kelas?>';
    var level_id = '<?=$guru->id_level?>';
    var mapel_guru = '<?= json_encode(unserialize($guru->mapel_kelas ?? '')) ?>';
    var ekstra_guru = '<?= json_encode($ekstra_guru) ?>';
    var guru_before = JSON.parse('<?= str_replace("'", "\'", json_encode($guru2)) ?>');
</script>
<script src="<?= base_url() ?>/assets/app/js/master/guru/editmapel.js"></script>
<script>
    let changed = false;
    $(document).ready(function(){
        var actions = '<button type="button" class="add btn"><i class="fa fa-check text-success"></i></button>' +
            '<button type="button" class="edit btn"><i class="fa fa-pencil text-warning"></i></button>' +
            '<button type="button" class="delete btn"><i class="fa fa-trash text-danger"></i></button>';
        //$("#table-editable td:last-child").html();

        // Append table with add row form on add new button click
        $(".add-new").click(function(){
            $(this).attr("disabled", "disabled");
            var index = $("#table-editable table tbody tr:last-child").index();
            var valId = $("#table-editable table tbody tr").eq(index).find('.id-level').text();
            var newId = Number(valId) + 1;
            var row = '<tr>' +
                '<td class="text-center align-middle p-1 id-level">' +
                '<input type="number" class="form-control" name="id_level" value="'+ newId +'" readonly>' +
                '</td>' +
                '<td class="align-middle p-1">' +
                '<input type="text" class="form-control" name="level">' +
                '</td>' +
                '<td class="text-center align-middle p-1">' + actions + '</td>' +
                '</tr>';
            $("#table-editable table").append(row);
            $("#table-editable table tbody tr").eq(index + 1).find(".edit").toggle();
        });
        // Add row on add button click
        $(document).on("click", ".add", function(){
            var empty = false;
            var input = $(this).parents("tr").find('input');
            input.each(function(){
                if(!$(this).val()){
                    $(this).addClass("error");
                    empty = true;
                } else{
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if(!empty){
                let spost = '&mode=1';
                input.each(function(ind, v){
                    if (ind === 0) {
                        spost += '&id_level='+$(this).val();
                    } else {
                        spost += '&level='+$(this).val();
                    }
                    $(this).parent("td").html($(this).val());
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                sendJabatan(spost);
            }
        });
        // Edit row on edit button click
        $(document).on("click", ".edit", function(){
            $(this).parents("tr").find("td:not(:last-child)").each(function(ind, v){
                if (ind === 0) {
                    $(this).html('<input type="number" class="form-control" value="' + $(this).text() + '" readonly>');
                } else {
                    $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
                }
            });
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").attr("disabled", "disabled");
        });
        // Delete row on delete button click
        $(document).on("click", ".delete", function(){
            $(this).parents("tr").remove();
            var sid = $(this).parents("tr").eq(0).find('.id-level').text();
            sendJabatan('&mode=2&id_level='+sid);
        });

        $("#createJabatanModal").on("hidden.bs.modal", function () {
            if (changed) window.location.reload();
        });
    });

    function sendJabatan(data) {
        $(".add-new").html('<i class="spinner-border spinner-border-sm"></i> Saving');
        console.log($('#create').serialize() + data);
        $.ajax({
            url: $('#create').attr('action'),
            data: $('#create').serialize() + data,
            type: 'POST',
            success: function (response) {
                console.log(response);
                $(".add-new").removeAttr("disabled");
                $(".add-new").html('<i class="fa fa-plus"></i> Tambah');
                if (response.success) {
                    changed = true;
                    showSuccessToast(response.msg);
                } else {
                    showDangerToast(response.msg);
                }
            },
            error: function (xhr, error, status) {
                console.log(xhr.responseText);
                showDangerToast(xhr.responseText);
            }
        });
    }
</script>
