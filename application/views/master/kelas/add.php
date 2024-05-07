<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $subjudul ?></h1>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('datakelas') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?= form_open('', array('id' => 'create')) ?>
            <div class="card my-shadow">
                <div class="card-header">
                    <div class="card-title">
                        <h6>Tambah Kelas</h6>
                    </div>
                    <div class="card-tools">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus mr-1"></i>Simpan
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <?php
                                //echo '<pre>';
                                //var_dump($siswa);
                                //echo '</pre>';
                                if (isset($id_kelas)) echo form_hidden('id_kelas', $id_kelas);
                                ?>
                                <label for="nama_kelas" class="col-md-3 col-form-label">Nama Kelas</label>
                                <div class="col-md-9">
                                    <?php
                                    $siswas = [];
                                    if (isset($siswa)) {
                                        foreach ($siswa as $key => $row) {
                                            if ($row->id_kelas == null || $row->id_kelas == 0) {
                                                $siswas [$row->id_siswa] = $row->nama .' - '.$row->nis;
                                            }
                                        }
                                    }
                                    if (isset($siswakelas)) {
                                        foreach ($siswakelas as $key => $row) {
                                            $siswas [$row->id_siswa] = $row->nama .' - '.$row->nis;
                                        }
                                    }
                                    $oj = json_decode(json_encode($kelas->jumlah_siswa));
                                    $jumlahSiswa = json_decode(json_encode(unserialize($oj ?? '')));
                                    $jjs = [];
                                    foreach ($jumlahSiswa as $js) {
                                        array_push($jjs, $js->id);
                                    }

                                    echo form_input(
                                        array(
                                            'name' => 'nama_kelas',
                                            'value' => $kelas->nama_kelas,
                                            'id' => 'nama_kelas',
                                            'type' => 'text',
                                            'class' => 'form-control',
                                            'placeholder' => 'Nama Kelas',
                                            'required' => 'required'
                                        )
                                    );
                                    //var_dump($siswas);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 control-label">Kode Kelas</label>
                                <div class="col-md-9">
                                    <input type='text' name='kode_kelas' class='form-control'
                                           value="<?= $kelas->kode_kelas ?>" required/>
                                </div>
                            </div>
                            <?php if ($setting->jenjang == '3') : ?>
                                <div class="form-group row">
                                    <label for="jurusan_id" class="col-md-3 control-label">Jurusan</label>
                                    <div class="col-md-9">
                                        <?php
                                        echo form_dropdown(
                                            'jurusan_id',
                                            $jurusan,
                                            $kelas->jurusan_id,
                                            'class="select2 form-control" id="jurusan_id" required'
                                        );
                                        ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="level_id" class="col-md-3 control-label">Level</label>
                                <div class="col-md-9">
                                    <?php
                                    echo form_dropdown(
                                        'level_id',
                                        $level,
                                        $kelas->level_id,
                                        'class="select2 form-control"  id="level_id" required'
                                    );
                                    ?>
                                </div>
                            </div>
                            <!--
                                <div class="form-group row">
                                    <label for="guru_id" class="col-md-3 control-label">Wali Kelas</label>
                                    <div class="col-md-9">
                                        <?php
                            echo form_dropdown(
                                'guru_id',
                                $guru,
                                $kelas->guru_id,
                                'class="select2 form-control" id="guru_id" required'
                            );
                            ?>
                                    </div>
                                </div>
                                -->
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card border">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jumlah_siswa" class="col-md-12 control-label">Daftar Siswa</label>
                                        <div class="col-md-12">
                                            <select name="siswa[]" class="form-control" id="jumlah_siswa" multiple="multiple" required="" style="position: absolute; left: -9999px;">
                                            <?php foreach ($siswas as $id=>$siswa) :?>
                                            <option value="<?= $id ?>" <?= in_array($id, $jjs) ? 'selected="selected"' : '';?>><?=$siswa?></option>
                                            <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="siswa_id" class="control-label">Ketua Kelas</label>
                                        <?php
                                        echo form_dropdown(
                                            'siswa_id',
                                            $siswas,
                                            $kelas->siswa_id,
                                            'class="select2 form-control" id="siswa_id" required'
                                        );
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <div id="dualSelectExample" style="width:500px; height:300px; background-color:#F0F0F0; padding:10px;"></div><br>

                            <div style="padding-bottom:20px;">
                                Set Color:
                                <select id="colorSelector">
                                    <option value="panelBackground">panelBackground</option>
                                    <option value="filterText">filterText</option>
                                    <option value="itemText">itemText</option>
                                    <option value="itemBackground">itemBackground</option>
                                    <option value="itemHoverBackground">itemHoverBackground</option>
                                    <option value="itemPlaceholderBackground">itemPlaceholderBackground</option>
                                    <option value="itemPlaceholderBorder">itemPlaceholderBorder</option>
                                    <option value="">All Objects</option>
                                </select>
                                <input id="colorValue" value="" style="width:130px; margin-right:20px;" />
                                <input type="button" id="setColor" value="Set" />
                                <input type="button" id="resetColor" value="Reset" />
                            </div>

                            <div style="float:left; margin-right:5px;">
                                <div id="addSel" style="background-color:lightgray; color:black; padding:5px; text-align:center; cursor:pointer; width:150px;">Add Candidate</div>
                                <textarea id="addIterms" rows="5" type="textarea" style="width:250px; height:100px; margin-top:5px;"></textarea>
                            </div>
                            <div style="float:left;">
                                <div id="getSel" style="background-color:lightgray; color:black; padding:5px; text-align:center; cursor:pointer; width:150px;">Get Selection</div>
                                <textarea id="selResult" rows="5" type="textarea" style="width:250px; height:100px; margin-top:5px;"></textarea>
                            </div>
                        </div>
                    </div>
                    -->
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </section>
</div>

<script>
    const arrAllSiswa = JSON.parse(JSON.stringify(<?= json_encode($siswas)?>));
    const arrSelSiswa = JSON.parse(JSON.stringify(<?= json_encode($jjs)?>));
    $(document).ready(function () {
        $("#guru_id option:first").attr('disabled', 'disabled');
        $("#jurusan_id option:first").attr('disabled', 'disabled');
        $("#level_id option:first").attr('disabled', 'disabled');
    });
</script>
<script src="<?= base_url() ?>/assets/app/js/master/kelas/add.js"></script>
