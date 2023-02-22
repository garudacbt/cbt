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
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                    <div class="card-tools">
                        <button id="generate" onclick="simpanToken()" class="btn btn-success">
                            GENERATE NEW TOKEN
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert border border-success alert-default-success">
                                Token akan digenerate otomatis jika pilihan <b>Otomatis: YA</b> dan ada jadwal ujian
                                pada hari ini.
                            </div>
                        </div>
                        <div class="col-12 col-md-6 p-1">
                            <div class="card border border-light">
                                <div class="row card-body">
                                    <div class="col-6">
                                        <label>Otomatis ?</label>
                                        <?php
                                        $arrVal = ["TIDAK", "YA"];
                                        echo form_dropdown(
                                            'auto',
                                            $arrVal,
                                            $token->auto,
                                            'id="auto" class="form-control"'
                                        ); ?>
                                    </div>
                                    <div class="col-6">
                                        <label>Interval (menit)</label>
                                        <input id="jarak" type="number" class="form-control" name="jarak"
                                               value="<?= $token->jarak ?>" <?= $token->auto == '0' ? 'disabled="disabled"' : '' ?>>
                                        <button class="float-right mt-3 btn btn-info" onclick="simpanToken()">Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 p-1">
                            <div class="card card-light p-4">
                                <span class="text-center">TOKEN SAAT INI</span>
                                <h1 class="text-center" id="token-view"><?= $token->token ?></h1>
                                <small id="info-interval" class="mt-3 text-center">Token akan dibuat otomatis dalam <b
                                            id="interval">-- : --</b></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    let timerTokenView;

    function simpanToken() {
        var auto = $('#auto').val();
        var jarak = $('#jarak').val();
        if (auto == '1' && jarak == '0') {
            swal.fire({
                title: "Ups!",
                text: "Interval menit harus diisi",
                icon: "warning"
            });
        } else {
            globalToken.auto = $('#auto').val();
            globalToken.jarak = $('#jarak').val();
            generateToken(function (result) {
                createViewToken(result);
            });
        }
    }

    $(document).ready(function () {
        $('#auto').on('change', function () {
            var idAuto = $(this).val();
            var token = {};
            token ["token"] = globalToken.token;
            token ["auto"] = idAuto;
            $('#jarak').attr('disabled', idAuto == '0');
        });

        setTimeout(function () {
            getGlobalToken();
        }, 1000);
    });

    function getGlobalToken() {
        if (globalToken != null) {
            createViewToken(globalToken);
        }
    }

    function createViewToken(result) {
        console.log('ada', adaJadwalUjian);
        $('#token-view').text(result.token);
        if (result != null && result.auto == '1' && adaJadwalUjian !== '0') {
            $('#info-interval').removeClass('invisible');
            var mulai = result.updated == null ? new Date() : new Date(result.updated);
            const now = getDiffMinutes(mulai);
            var mnt = Number(result.jarak);

            mnt = mnt - now.m;
            var scn = 60 - now.s;
            if (scn > 0) {
                mnt = mnt - 1;
            }

            if (timerTokenView) {
                clearInterval(timerTokenView);
                timerTokenView = null;
            }
            timerTokenView = setTimerToken($('#interval'), [0, 0, mnt, scn], function (block, isOver) {
                if (isOver) {
                    block.html('<b>Memuat token baru</b>');
                    setTimeout(function () {
                        getGlobalToken()
                    }, 300);
                }
            })
        } else {
            $('#info-interval').addClass('invisible')
        }
    }
</script>
