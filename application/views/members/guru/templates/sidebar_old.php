<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-teal">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link bg-white">
        <?php $logo_app = $setting->logo_kiri == null ? base_url() . 'assets/img/favicon.png' : base_url() . $setting->logo_kiri; ?>
        <img src="<?= $logo_app ?>" alt="App Logo" class="brand-image"
             style="opacity: .8">
        <span class="brand-text text-sm"><?= $setting->nama_aplikasi ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 d-flex">
            <div class="image">
                <img src="<?= $guru->foto != null ? base_url() . $guru->foto : base_url('assets/img/user.jpg') ?>"
                     class="img-circle elevation-2" alt="User Image" style="height: 40px; width: 40px">
            </div>
            <div class="info">
                <a href="#" class="d-block text-wrap">
                    <p><?= $guru->nama_guru ?></p>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 mb-5">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <?php
                $page = $this->uri->segment(1);
                $elearning = ["kelasjadwal", "kelasmateri", "kelasmaterijadwal", "kelastugas", "kelasstatus", "kelasabsensiharian", "kelasabsensiharianmapel", "kelasabsensibulanan", "kelasnilai", "kelascatatan"];
                $cbt = ["cbtbanksoal", "cbtjadwal", "cbtcetak", "cbtpeserta", "cbtstatus", "cbtnilai", "cbtanalisis", "cbtrekap"];
                $wali = ["walisiswa", "walistruktur", "walicatatan"];
                ?>
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>"
                       class="nav-link <?= $page === 'dashboard' ? "active" : "" ?>">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('guruview') ?>" class="nav-link <?= $page === 'guruview' ? "active" : "" ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pengumuman') ?>"
                       class="nav-link <?= $page === 'pengumuman' ? "active" : "" ?>">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?= in_array($page, $elearning) ? "menu-open" : "" ?>">
                    <a href="#" class="nav-link <?= in_array($page, $elearning) ? "active" : "" ?>">
                        <i class="nav-icon fas fa-chalkboard"></i>
                        <p>
                            E-Learning
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('kelasjadwal') ?>"
                               class="nav-link <?= $page === 'kelasjadwal' ? "active" : "" ?>">
                                <i class="fa fa-calendar-alt nav-icon"></i>
                                <p>Jadwal Pelajaran</p>
                            </a>
                        </li>
                        <?php $pageact = $this->uri->segment(2); ?>
                        <li class="nav-item">
                            <a href="<?= base_url('kelasmateri/materi') ?>"
                               class="nav-link <?= $pageact === 'materi' ? "active" : "" ?>">
                                <i class="fa fa-pencil-ruler nav-icon"></i>
                                <p>Materi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kelasmateri/tugas') ?>"
                               class="nav-link <?= $pageact === 'tugas' ? "active" : "" ?>">
                                <i class="fa fa-drafting-compass nav-icon"></i>
                                <p>Tugas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kelasmaterijadwal') ?>"
                               class="nav-link <?= $page === 'kelasmaterijadwal' ? "active" : "" ?>">
                                <i class="fa fa-calendar-alt nav-icon"></i>
                                <p>Jadwal Materi/Tugas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kelasstatus') ?>"
                               class="nav-link <?= $page === 'kelasstatus' ? "active" : "" ?>">
                                <i class="far fa-clipboard nav-icon"></i>
                                <p>Nilai Harian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kelasabsensiharian') ?>"
                               class="nav-link <?= $page === 'kelasabsensiharian' ? "active" : "" ?>">
                                <i class="fa fa-user-check nav-icon"></i>
                                <p>Kehadiran Harian</p>
                            </a>
                        </li>
                        <!--
						<li class="nav-item">
							<a href="<?= base_url('kelasabsensiharianmapel') ?>" class="nav-link <?= $page === 'kelasabsensiharianmapel' ? "active" : "" ?>">
                                <i class="fa fa-tasks nav-icon"></i>
								<p>Absensi Mapel Harian</p>
							</a>
						</li>
						-->
                        <li class="nav-item">
                            <a href="<?= base_url('kelasabsensibulanan') ?>"
                               class="nav-link <?= $page === 'kelasabsensibulanan' ? "active" : "" ?>">
                                <i class="fa fa-tasks nav-icon"></i>
                                <p>Kehadiran Bulanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kelasnilai') ?>"
                               class="nav-link <?= $page === 'kelasnilai' ? "active" : "" ?>">
                                <i class="fa fa-trophy nav-icon"></i>
                                <p>Rekap Nilai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kelascatatan') ?>"
                               class="nav-link <?= $page === 'kelascatatan' ? "active" : "" ?>">
                                <i class="fa fa-pencil-alt nav-icon"></i>
                                <p>Catatan Guru</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= in_array($page, $cbt) ? "menu-open" : "" ?>">
                    <a href="#" class="nav-link <?= in_array($page, $cbt) ? "active" : "" ?>">
                        <i class="nav-icon fa fa-user-graduate"></i>
                        <p>
                            Ulangan/Ujian
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('cbtbanksoal') ?>"
                               class="nav-link <?= $page === 'cbtbanksoal' ? "active" : "" ?>">
                                <i class="far fa-folder-open nav-icon"></i>
                                <p>Bank Soal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cbtjadwal') ?>"
                               class="nav-link <?= $page === 'cbtjadwal' ? "active" : "" ?>">
                                <i class="far fa-calendar-alt nav-icon"></i>
                                <p>Jadwal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cbtcetak') ?>"
                               class="nav-link <?= $page === 'cbtcetak' ? "active" : "" ?>">
                                <i class="fa fa-print nav-icon"></i>
                                <p>Cetak</p>
                            </a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a href="<?= base_url('cbttoken') ?>"
                               class="nav-link <?= $page === 'cbttoken' ? "active" : "" ?>">
                                <i class="fa fa-key nav-icon"></i>
                                <p>Token</p>
                            </a>
                        </li>
						<li class="nav-item">
							<a href="<?= base_url('cbtpeserta') ?>" class="nav-link <?= $page === 'cbtpeserta' ? "active" : "" ?>">
                                <i class="fa fa-list-ol nav-icon"></i>
								<p>Daftar Peserta</p>
							</a>
						</li>
						-->
                        <li class="nav-item">
                            <a href="<?= base_url('cbtstatus') ?>"
                               class="nav-link <?= $page === 'cbtstatus' ? "active" : "" ?>">
                                <i class="fa fa-user-clock nav-icon"></i>
                                <p>Status Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cbtnilai') ?>"
                               class="nav-link <?= $page === 'cbtnilai' ? "active" : "" ?>">
                                <i class="fa fa-file-alt nav-icon"></i>
                                <p>Hasil Ujian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cbtanalisis') ?>"
                               class="nav-link <?= $page === 'cbtanalisis' ? "active" : "" ?>">
                                <i class="fa fa-chart-line nav-icon"></i>
                                <p>Analisis Soal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cbtrekap') ?>"
                               class="nav-link <?= $page === 'cbtrekap' ? "active" : "" ?>">
                                <i class="nav-icon fas fa-trophy"></i>
                                <p>Rekap Nilai</p>
                            </a>
                        </li>
                        <!--
						<li class="nav-item">
							<a href="<?= base_url('cbtanalisis') ?>" class="nav-link <?= $page === 'cbtanalisis' ? "active" : "" ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Analisis Soal</p>
							</a>
						</li>
						-->
                    </ul>
                </li>
                <?php if ($guru->id_jabatan == '4') : ?>
                    <li class="nav-item has-treeview <?= in_array($page, $wali) ? "menu-open" : "" ?>">
                        <a href="#" class="nav-link <?= in_array($page, $wali) ? "active" : "" ?>">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Wali Kelas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('walisiswa') ?>"
                                   class="nav-link <?= $page === 'walisiswa' ? "active" : "" ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Siswa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('walistruktur') ?>"
                                   class="nav-link <?= $page === 'walistruktur' ? "active" : "" ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Struktur</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('walicatatan') ?>"
                                   class="nav-link <?= $page === 'walicatatan' ? "active" : "" ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Catatan Kelas</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <li class="nav-header">PENILAIAN</li>
                <?php
                $pageact = $this->uri->segment(2);
                $data_rapor = ['raporkkm', 'raporkikd', 'raporsikap'];
                $rapor_input = ['raporspiritual', 'raporsosial', 'raporprestasi', 'raporcatatan', 'raporfisik', 'rapornaik'];
                $rapor_cetak = ['cetakpts', 'cetakakhir', 'cetakleger', 'dkn'];
                ?>
                <li class="nav-item has-treeview <?= in_array($pageact, $data_rapor) ? "menu-open" : "" ?>">
                    <a href="#" class="nav-link <?= in_array($pageact, $data_rapor) ? "active" : "" ?>">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            DATA RAPOR
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('rapor/raporkkm') ?>"
                               class="nav-link <?= $pageact === 'raporkkm' ? "active" : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>KKM dan Bobot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('rapor/raporkikd') ?>"
                               class="nav-link <?= $pageact === 'raporkikd' ? "active" : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Indikator Nilai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('rapor/rapornilai') ?>"
                       class="nav-link <?= $pageact === 'rapornilai' ? "active" : "" ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>INPUT NILAI</p>
                    </a>
                </li>
                <?php if ($guru->id_jabatan == '4') : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('rapor/rapornilaiguru') ?>"
                           class="nav-link <?= $pageact === 'rapornilaiguru' ? "active" : "" ?>">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PERIKSA NILAI</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview <?= in_array($pageact, $rapor_input) ? "menu-open" : "" ?>">
                        <a href="#" class="nav-link <?= in_array($pageact, $rapor_input) ? "active" : "" ?>">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                INPUT WALI KELAS
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('rapor/raporspiritual') ?>"
                                   class="nav-link <?= $pageact === 'raporspiritual' ? "active" : "" ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sikap Spiritual</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('rapor/raporsosial') ?>"
                                   class="nav-link <?= $pageact === 'raporsosial' ? "active" : "" ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sikap Sosial</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('rapor/raporprestasi') ?>"
                                   class="nav-link <?= $pageact === 'raporprestasi' ? "active" : "" ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Prestasi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('rapor/raporcatatan') ?>"
                                   class="nav-link <?= $pageact === 'raporcatatan' ? "active" : "" ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Absensi & Catatan</p>
                                </a>
                            </li>
                            <!--
                            <li class="nav-item">
                                <a href="<?= base_url('rapor/raporfisik') ?>"
                                   class="nav-link <?= $pageact === 'raporfisik' ? "active" : "" ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fisik</p>
                                </a>
                            </li>
                            -->
                            <li class="nav-item">
                                <a href="<?= base_url('rapor/rapornaik') ?>"
                                   class="nav-link <?= $pageact === 'rapornaik' ? "active" : "" ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kenaikan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview <?= in_array($pageact, $rapor_cetak) ? "menu-open" : "" ?>">
                        <a href="#" class="nav-link <?= in_array($pageact, $rapor_cetak) ? "active" : "" ?>">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                CETAK
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('rapor/cetakpts') ?>"
                                   class="nav-link <?= $pageact === 'cetakpts' ? "active" : "" ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Rapor PTS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('rapor/cetakakhir') ?>"
                                   class="nav-link <?= $pageact === 'cetakakhir' ? "active" : "" ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Rapor Akhir</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('rapor/cetakleger') ?>"
                                   class="nav-link <?= $pageact === 'cetakleger' ? "active" : "" ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ledger</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('rapor/dkn') ?>"
                                   class="nav-link <?= $pageact === 'dkn' ? "active" : "" ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>DKN</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">ARSIP</li>
                    <li class="nav-item">
                        <a href="<?= base_url('bukurapor') ?>"
                           class="nav-link <?= $page === 'bukurapor' ? "active" : "" ?>">
                            <i class="fas fa-book nav-icon"></i>
                            <p>ARSIP RAPOR</p>
                        </a>
                    </li>
                <?php endif; ?>
                <hr>
                <li class="nav-item">
                    <a href="#" onclick="logout()" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>LOGOUT</p>
                    </a>
                </li>
                <hr>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
