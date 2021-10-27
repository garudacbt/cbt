<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 14/07/20
 * Time: 17:46
 */

/*
$jr = json_decode(json_encode($jadwal->ruang));
$jumlahRuang = json_decode(json_encode(unserialize($jr)));
$jruangSele = [];
foreach ($jumlahRuang as $r) {
	array_push($jruangSele, $r->ruang);
}

$js = json_decode(json_encode($jadwal->sesi));
$jumlahSesi = json_decode(json_encode(unserialize($js)));
$jsesi = [];
foreach ($jumlahSesi as $s) {
	array_push($jsesi, $s->sesi);
}
*/
$jp = json_decode(json_encode($jadwal->pengawas));
$jumlahPengawas = json_decode(json_encode(unserialize($jp)));
$jPengawas = [];
foreach ($jumlahPengawas as $p) {
    array_push($jPengawas, $p->guru);
}

?>

<div class="content-wrapper bg-white pt-4">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-6">
                    <a href="<?= base_url('cbtjadwal') ?>" type="button" class="btn btn-sm btn-danger float-right">
                        <i class="fas fa-arrow-circle-left"></i><span
                                class="d-none d-sm-inline-block ml-1">Kembali</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?= form_open('create', array('id' => 'create')) ?>
            <div class="card my-shadow">
                <div class="card-header">
                    <div class="card-title">
                        <h6>Tambah Kelas</h6>
                    </div>
                    <div class="card-tools">
                        <input type="hidden" id="id-jadwal" name='id_jadwal' value="<?=$jadwal->id_jadwal?>" class='form-control d-none'/>
                        <button name='tambahjadwal' class='btn btn-success btn-sm'><i class='fa fa-check'></i> Simpan
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Guru</label>
                            <select name="guru" id="id-guru" class="form-control form-control-sm" required="">
                                <option value="<?=$guru->id_guru?>"><?=$guru->nama_guru?></option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Bank Soal</label>
                            <select name="bank_id" id="bank-id" class="form-control form-control-sm" required=""></select>
                            <!--
							<?php
                            echo form_dropdown(
                                'bank_id',
                                $banks,
                                $jadwal->id_bank,
                                'id="bank-id" class="form-control form-control-sm" required'
                            ); ?>
							-->
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Jenis</label>
                            <?php
                            echo form_dropdown(
                                'jenis_id',
                                $jenis,
                                $jadwal->id_jenis,
                                'id="jenis-id" class="form-control form-control-sm" required'
                            ); ?>
                        </div>
                        <div class='col-md-4 mb-3'>
                            <label>Pengawas</label>
                            <?php
                            $sesi['Semua'] = 'Semua Sesi';
                            foreach ($sesis as $key => $row) {
                                $sesi[$key] = $row;
                            }
                            echo form_dropdown(
                                'pengawas[]',
                                $pengawas,
                                $jPengawas,
                                'id="pengawas-ujian" class="select2 form-control form-control-sm" multiple="multiple" data-placeholder="Pilih Pengawas" required'
                            ); ?>
                        </div>
                        <div class='col-md-3 mb-3'>
                            <label>Tanggal Mulai</label>
                            <input type='text' id="tgl-mulai" name='tgl_mulai' value="<?=$jadwal->tgl_mulai?>"
                                   class='tgl form-control form-control-sm' autocomplete='off' required='true'/>
                        </div>
                        <div class='col-md-3 mb-3'>
                            <label>Tanggal Expired</label>
                            <input type='text' id="tgl-selesai" name='tgl_selesai' value="<?=$jadwal->tgl_selesai?>"
                                   class='tgl form-control form-control-sm'
                                   autocomplete='off' required='true'/>
                        </div>
                        <div class='col-md-2 mb-3'>
                            <div class='form-group'>
                                <label>Durasi (menit)</label>
                                <input type='number' id="durasi-ujian" name='durasi_ujian'
                                       class='form-control form-control-sm' value="<?=$jadwal->durasi_ujian?>"
                                       required='true'/>
                            </div>
                        </div>

                    </div>

                    <div class='form-group'>
                        <div class='row'>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class='col-6'>
                                        <div class="icheck-cyan">
                                            <input type='checkbox' id="check-soal" name='acak_soal' value='1' <?=$jadwal->acak_soal == 1 ? 'checked="checked"' : ''?>/>
                                            <label for="check-soal">Acak Soal</label>
                                        </div>
                                    </div>
                                    <div class='col-6'>
                                        <div class="icheck-cyan">
                                            <input type='checkbox' id="check-opsi" name='acak_opsi' value='1' <?=$jadwal->acak_opsi == 1 ? 'checked="checked"' : ''?>/>
                                            <label for="check-opsi">Acak Jawaban</label>
                                        </div>
                                    </div>
                                    <div class='col-6'>
                                        <div class="icheck-cyan">
                                            <input type='checkbox' id="check-token" name='token' value='1' <?=$jadwal->token == 1 ? 'checked="checked"' : ''?>/>
                                            <label for="check-token">Gunakan Token</label>
                                        </div>
                                    </div>
                                    <div class='col-6'>
                                        <div class="icheck-cyan">
                                            <input type='checkbox' id="check-hasil" name='hasil_tampil' value='1' <?=$jadwal->hasil_tampil == 1 ? 'checked="checked"' : ''?>/>
                                            <label for="check-hasil">Tampilkan Hasil</label>
                                        </div>
                                    </div>
                                    <div class='col-6'>
                                        <div class="icheck-cyan">
                                            <input type='checkbox' id="check-login" name='reset_login' value='1' <?=$jadwal->reset_login == 1 ? 'checked="checked"' : ''?>/>
                                            <label for="check-login">Reset Login</label>
                                        </div>
                                    </div>
                                    <div class='col-6'>
                                        <div class="icheck-cyan">
                                            <input type='checkbox' id="check-status" name='status' value='1' <?=$jadwal->status == 1 ? 'checked="checked"' : ''?>/>
                                            <label for="check-status">Aktif</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </section>
</div>

<script>
    var idBank = '<?=$jadwal->id_bank?>'
    $(document).ready(function () {
        var selBank = $('#bank-id')
        ajaxcsrf();
        $('.select2').select2();
        $('.tgl').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            timepicker: false,
            format: 'Y-m-d',
            disabledWeekDays: [0],
            widgetPositioning: {
                horizontal: 'left',
                vertical: 'bottom'
            }
        });

        /*
        $('#tambahjadwal').on('show.bs.modal', function (e) {
            var id_jadwal = $(e.relatedTarget).data('id');
            var kode = $(e.relatedTarget).data('kode');
            var id_bank = $(e.relatedTarget).data('bank');
            var id_jenis = $(e.relatedTarget).data('jenis');
            var durasi = $(e.relatedTarget).data('durasi');
            var mulai = $(e.relatedTarget).data('mulai');
            var selesai = $(e.relatedTarget).data('selesai');

            var ruang = $(e.relatedTarget).data('ruang');
            var arrayRuang = ruang.split(',');
            var sesi = $(e.relatedTarget).data('sesi');
            var arraySesi = sesi.split(',');

            $(e.currentTarget).find('input[id="id-jadwal"]').val(id_jadwal);
            $(e.currentTarget).find('input[id="kode-jadwal"]').val(kode);
            $(e.currentTarget).find('input[id="durasi-ujian"]').val(durasi);
            $(e.currentTarget).find('input[id="tgl-mulai"]').val(mulai);
            $(e.currentTarget).find('input[id="tgl-selesai"]').val(selesai);

            $('#bank-id').val(id_bank);
            $('#jenis-id').val(id_jenis);
            $('#ruang-ujian').select2().val(arrayRuang).trigger('change');
            $('#sesi-ujian').select2().val(arraySesi).trigger('change');

            console.log(sesi);
        });
        */

        $('#create').submit('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            console.log("data:", $(this).serialize());

            $.ajax({
                url: base_url + "cbtjadwal/saveJadwal",
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
                success: function (data) {
                    console.log(data);
                    $('#tambahjadwal').modal('hide').data('bs.modal', null);
                    $('#tambahjadwal').on('hidden', function () {
                        $(this).data('modal', null);  // destroys modal
                    });

                    if (data) {
                        swal.fire({
                            title: "Sukses",
                            text: "Jadwal berhasil disimpan",
                            icon: "success",
                            showCancelButton: false,
                        }).then(result => {
                            if(result.value){
                                window.location.href = base_url + 'cbtjadwal';
                            }
                        });
                    } else {
                        swal.fire({
                            title: "ERROR",
                            text: "Data Tidak Tersimpan",
                            icon: "error",
                            showCancelButton: false,
                        });
                    }
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                    swal.fire({
                        title: "ERROR",
                        text: "Data Tidak Tersimpan",
                        icon: "error",
                        showCancelButton: false,
                    });
                }
            });
        });

        function getBank(guru) {
            $.ajax({
                url: base_url + "cbtjadwal/getbankguru/"+guru,
                type: "GET",
                success: function (data) {
                    console.log(data);
                    selBank.html('');
                    $.each(data, function (i, v) {
                        var selected = i===idBank ? 'selected' : '';
                        if (i !== '') selBank.append('<option value="'+i+'" '+selected+'>'+v+'</option>');
                    });
                }, error: function (xhr, status, error) {
                    console.log("error", xhr.responseText);
                }
            });
        }

        $('#id-guru').on('change', function () {
            getBank($(this).val());
        });

        getBank($('#id-guru').val());
    });
</script>
