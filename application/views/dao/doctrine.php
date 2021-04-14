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

            <div class="card card-default my-shadow mb-4">
                <div class="card-header">
                    <h6 class="card-title"><?= $subjudul ?></h6>
                </div>
                <div class="card-body">
                    <?php
                    echo '<pre>';
                    var_dump($rekap);
                    echo '</pre>';

                    /*
                    foreach($logs as $log) {
                        echo $log->log_time;
                        echo '<br>';
                    }
                    */
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>
