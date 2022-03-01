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
                    <?php
                    //echo '<pre>';
                    //var_dump($siswas);
                    //var_dump($pts[1]);
                    //var_dump($mapel);
                    //var_dump($kelas_mapel);
                    //echo '</pre>';
                    ?>
                    <div class="row">
                        <?php
                        sort($level);

                        $arrLevel = [];
                        foreach ($level as $lvl) {
                            foreach ($mapel as $key => $mpl) {
                                $nos = 1;
                                foreach ($kelas_mapel[$key] as $k => $kls) {
                                    if ($kls['level'] == $lvl && $kls['id_kelas'] != null) {
                                        $arrLevel[$key][$lvl][] = ['mapel' => $mpl, 'url_harian' => base_url('rapor/inputharian/' . $key . '/' . $kls['id_kelas']), 'url_pts' => base_url('rapor/inputpts/' . $key . '/' . $kls['id_kelas']), 'url_pas' => base_url('rapor/inputpas/' . $key . '/' . $kls['id_kelas']), 'nama_kelas' => $kls['nama_kelas']];
                                        $nos++;
                                    }
                                }
                            }
                        }
                        //echo '<pre>';
                        //var_dump($arrLevel);
                        //echo '</pre>';

                        foreach ($mapel as $km=>$m) :
                        foreach ($arrLevel[$km] as $lv) : ?>
                            <div class="col-md-6">
                                <div class="card border border-primary">
                                    <div class="card-header alert-default-primary">
                                        <b><?= $lv[0]['mapel'] ?></b>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                            <tr class="bg-light">
                                                <th rowspan="2" width="40" class="text-center p-0 align-middle">No.</th>
                                                <th rowspan="2" class="text-center p-0 align-middle">Kelas</th>
                                                <th colspan="3" class="text-center p-0 align-middle p-0">Input Nilai
                                                </th>
                                            </tr>
                                            <tr class="bg-light">
                                                <th class="text-center p-0 align-middle p-0">Harian</th>
                                                <th class="text-center p-0 align-middle p-0">P T S</th>
                                                <th class="text-center p-0 align-middle p-0">P A S</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($lv as $k => $kls) :
                                                $indich = $harian[$km][$kls['nama_kelas']] == $siswas[$km][$kls['nama_kelas']] ? '<i class="fa fa-check-circle text-success"/>' : '<i class="fa fa-warning text-warning"/>';
                                                $indicp = $pts[$km][$kls['nama_kelas']] == $siswas[$km][$kls['nama_kelas']] ? '<i class="fa fa-check-circle text-success"/>' : '<i class="fa fa-warning text-warning"/>';
                                                $indica = $pas[$km][$kls['nama_kelas']] == $siswas[$km][$kls['nama_kelas']] ? '<i class="fa fa-check-circle text-success"/>' : '<i class="fa fa-warning text-warning"/>';
                                                ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?= $no ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?= $kls['nama_kelas'] ?>
                                                    </td>
                                                    <td class="text-center w-25">
                                                        <a href="<?= $kls['url_harian'] ?>" type="button"
                                                           class="btn btn-xs btn-primary">Input Nilai</a>
                                                        <?= $indich ?>
                                                    </td>
                                                    <td class="text-center w-25">
                                                        <a href="<?= $kls['url_pts'] ?>" type="button"
                                                           class="btn btn-xs btn-primary">Input Nilai</a>
                                                        <?= $indicp ?>
                                                    </td>
                                                    <td class="text-center w-25">
                                                        <a href="<?= $kls['url_pas'] ?>" type="button"
                                                           class="btn btn-xs btn-primary">Input Nilai</a>
                                                        <?= $indica ?>
                                                    </td>
                                                </tr>
                                                <?php $no++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; endforeach;?>
                    </div>

                    <?php
                    //echo '<pre>';
                    //var_dump($ekstra);
                    //var_dump($ekstras);
                    //var_dump($kelas_ekstra);
                    //echo '</pre>';

                    if (count($ekstra) > 0) :
                        ?>
                        <hr>
                        <p><b>Ekstrakurikuler</b></p>
                        <div class="row">
                            <?php foreach ($ekstra as $k => $v) : ?>
                                <div class="col-md-6">
                                    <div class="card border border-primary">
                                        <div class="card-header alert-default-primary">
                                            <b><?= $v ?></b>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-sm">
                                                <thead>
                                                <tr class="bg-light">
                                                    <th width="40" class="text-center p-0 align-middle">No.</th>
                                                    <th class="text-center p-0 align-middle">Kelas</th>
                                                    <th class="text-center p-0 align-middle p-0">Input Nilai</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($kelas_ekstra[$k] as $e => $kls) :
                                                    $indice = $ekstras[$k][$kls['nama_kelas']] == $siswae[$k][$kls['nama_kelas']] ? '<i class="fa fa-check-circle text-success"/>' : '<i class="fa fa-warning text-warning"/>';
                                                    ?>
                                                    <tr>
                                                        <td class="text-center">
                                                            <?= $no ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <?= $kls['nama_kelas'] ?>
                                                        </td>
                                                        <td class="text-center w-25">
                                                            <a href="<?= base_url('rapor/inputekstra/' . $k . '/' . $kls['id_kelas']) ?>"
                                                               type="button"
                                                               class="btn btn-xs btn-primary">Input Nilai</a>
                                                            <?= $indice ?>
                                                        </td>
                                                    </tr>
                                                    <?php $no++; endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>
