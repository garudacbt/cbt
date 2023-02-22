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
                </div>
                <div class="card-body">
                    <div class="container-fluid h-100">
                        <div class="row h-100 justify-content-center">
                            <div class="card col-lg-6 card-light p-4">
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
    $(document).ready(function () {
        getToken(function (result) {
            getGlobalToken();
        });
    });

    function getGlobalToken() {
        if (globalToken != null) {
            createViewToken(globalToken);
        }
    }

    function createViewToken(result) {
        $('#token-view').text(result.token);
        if (result != null && result.auto == '1' && adaJadwalUjian !== '0') {
            $('#interval').removeClass('d-none');
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
                    block.html('<b>-- : --</b>');
                    setTimeout(function () {
                        getToken(function (result) {
                            getGlobalToken();
                        });
                    }, 300);
                }
            })
        } else {
            $('#interval').addClass('d-none');
        }
    }

</script>
