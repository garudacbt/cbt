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
                    <button class="btn btn-sm btn-default d-none card-tools" id="refresh-token"><i class="fa fa-refresh"></i> Refresh Token</button>
                </div>
                <div class="card-body">
                    <h6 class="text-center">TOKEN SAAT INI</h6>
                    <h1 class="text-center" id="token-view"><?= $token->token ?></h1>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    let timerTokenView;
    let timerTokenRemaining, timerTokenOnGoing;
    $(document).ready(function () {
        getToken(function (result) {
            getGlobalToken();
        });

        $('#refresh-token').click(function () {
            getToken(function (result) {
                getGlobalToken();
            });
        });
    });

    function getGlobalToken() {
        if (globalToken != null) {
            const viewToken = $('#token-view');
            if (viewToken.length) viewToken.text(globalToken.token);
            if (globalToken.auto == '1' && adaJadwalUjian != '0') {
                $('#refresh-token').removeClass('d-none')
            }
        }
    }

</script>
