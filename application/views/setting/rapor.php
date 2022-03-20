<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 20/12/2020
 * Time: 11:45
 */

?>

<div class="content-wrapper bg-white pt-4">
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
            <div class="card my-shadow mb-4">
                <div class="card-body">
                    <div class="alert alert-default-info align-content-center" role="alert">
                        - KKM Tunggal: mengatur semua mapel mempunyai KKM yang sama
                        <br>
                        - Total BOBOT harus 100
                        <br>
                        - Jangan lupa untuk menyimpan perubahan
                    </div>
                    <hr>
                    <?=form_open('edit', array('id'=>'editsetting'), array('id_setting' => $rapor !=null ? $rapor->id_setting : ''))?>
                    <div class="form-group row">
                        <label class="col-3 col-md-2 col-form-label">Tgl Rapor PTS</label>
                        <div class="col-6 col-md-3">
                            <input type="text" name="tgl_rapor_pts" value="<?=$rapor !=null ? $rapor->tgl_rapor_pts : ''?>" class="form-control tgl" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-md-2 col-form-label">Tgl Rapor Akhir</label>
                        <div class="col-6 col-md-3">
                            <input type="text" name="tgl_rapor_akhir" value="<?=$rapor !=null ? $rapor->tgl_rapor_akhir : ''?>" class="form-control tgl" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-md-2 col-form-label">KKM Tunggal</label>
                        <div class="col-6 col-md-3">
                            <?php
                            echo form_dropdown(
                                'kkm_tunggal',
                                $kkm_drop,
                                $rapor !=null ? $rapor->kkm_tunggal : '',
                                'id="tunggal" class="form-control form-control-sm" required'
                            ); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-md-2 col-form-label">KKM</label>
                        <div class="col-6 col-md-3">
                            <input type="number" name="kkm" value="<?=$rapor !=null ? $rapor->kkm : ''?>" class="form-control kkm" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-md-2 col-form-label">Bobot PH</label>
                        <div class="col-6 col-md-3">
                            <input type="number" name="bobot_ph" value="<?=$rapor !=null ? $rapor->bobot_ph : ''?>" class="form-control kkm" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-md-2 col-form-label">Bobot PTS</label>
                        <div class="col-6 col-md-3">
                            <input type="number" name="bobot_pts" value="<?=$rapor !=null ? $rapor->bobot_pts : ''?>" class="form-control kkm" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-md-2 col-form-label">Bobot PAS</label>
                        <div class="col-6 col-md-3">
                            <input type="number" name="bobot_pas" value="<?=$rapor !=null ? $rapor->bobot_pas : ''?>" class="form-control kkm" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-9 col-md-5">
                            <button type="submit" class='btn btn-success btn-sm float-right'><i class='fa fa-save'></i> Simpan</button>
                        </div>
                    </div>
                    <?=form_close()?>
                </div>
                <div class="overlay d-none" id="loading">
                    <div class="spinner-grow"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        function onChangeKkm() {
            console.log('change');
            var tunggal = $('#tunggal').val();
            if (tunggal == '1') {
                $('.kkm').removeAttr('readonly');
            } else {
                $('.kkm').attr('readonly', 'true');
            }
        }

        onChangeKkm();

        $.datetimepicker.setLocale('id');
        $('.tgl').datetimepicker({
            i18n: {
                id: {
                    months: [
                        'Januari', 'Februari', 'Maret', 'April', 'Mei',
                        'Juni', 'Juli', 'Agustus', 'September',
                        'Oktober', 'November', 'Desember'
                    ],
                    dayOfWeek: [
                        'Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'
                    ]
                }
            },
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
        }).change(function () {
            $(this).val(buat_tanggal_indonesia($(this).val()));
        });

        $('#editsetting').submit(function (e) {
            e.stopPropagation();
            e.preventDefault();
            e.stopImmediatePropagation();

            console.log($(this).serialize());
            $('#loading').removeClass('d-none');

            $.ajax({
                url: base_url + 'rapor/saveraporadmin',
                type: "POST",
                dataType: "json",
                data: $(this).serialize(),
                success: function (response) {
                    setTimeout(function () {
                        $('#loading').addClass('d-none');
                        if (response.status) {
                            showSuccessToast("Sukses")
                        } else {
                            showSuccessToast("gagal")
                        }
                    }, 500);
                }, error: function (xhr, status, error) {
                    $('#loading').addClass('d-none');
                    console.log("response:", xhr.responseText);
                    showDangerToast('gagal disimpan')
                }
            });
        });

        $('#tunggal').on('change', function () {
            onChangeKkm();
        });

    })
</script>

