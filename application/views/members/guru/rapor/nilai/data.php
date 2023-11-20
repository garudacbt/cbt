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
                    <?php if (count($mapel) == 0 && count($ekstra) == 0) : ?>
                        <div class="alert alert-default-warning align-content-center" role="alert">
                            Tidak ada Mata Pelajaran diampu
                            <br> Hubungi Admin
                        </div>
                    <?php endif; ?>
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

                        foreach ($mapel as $km => $m) :
                        if (isset($arrLevel[$km]) && count($arrLevel[$km]) > 0) :
                            foreach ($arrLevel[$km] as $lv) : ?>
                                <div class="col-md-6">
                                    <div class="card border border-primary">
                                        <div class="card-header alert-default-primary">
                                            <b><?= $lv[0]['mapel'] ?></b>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr class="bg-light">
                                                    <th rowspan="2" width="40" class="text-center p-0 align-middle">
                                                        No.
                                                    </th>
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
                                                    $indich = $harian[$km][$kls['nama_kelas']] == $siswas[$km][$kls['nama_kelas']] ? '<i class="fa fa-check-circle text-success text-xs"></i>' : '<i class="fa fa-warning text-warning text-xs"></i>';
                                                    $indicp = $pts[$km][$kls['nama_kelas']] == $siswas[$km][$kls['nama_kelas']] ? '<i class="fa fa-check-circle text-success text-xs"></i>' : '<i class="fa fa-warning text-warning text-xs"></i>';
                                                    $indica = $pas[$km][$kls['nama_kelas']] == $siswas[$km][$kls['nama_kelas']] ? '<i class="fa fa-check-circle text-success text-xs"></i>' : '<i class="fa fa-warning text-warning text-xs"></i>';
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
                                                               class="btn btn-xs btn-primary">Input Nilai </a>
                                                            <?= $indica ?>
                                                        </td>
                                                    </tr>
                                                    <?php $no++; endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; endif; endforeach; ?>
                    </div>
                    <?php if (count($ekstra) > 0) : ?>
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
                                            <table class="table table-bordered">
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
                                                    $indice = $ekstras[$k][$kls['nama_kelas']] == $siswae[$k][$kls['nama_kelas']] ? '<i class="fa fa-check-circle text-success text-xs"/>' : '<i class="fa fa-warning text-warning text-xs"/>';
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
