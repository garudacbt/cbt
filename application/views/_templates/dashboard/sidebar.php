<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-teal my-shadow">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link bg-white">
        <?php $logo_app = $setting->logo_kiri == null ? base_url() . 'assets/img/favicon.png' : base_url() . $setting->logo_kiri; ?>
        <img src="<?= $logo_app ?>" alt="App Logo" class="brand-image"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $setting->nama_aplikasi ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <?php $avatar = $profile->foto == null ? base_url() . 'assets/adminlte/dist/img/avatar5.png' : base_url() . $profile->foto; ?>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel border-0 d-flex mt-3 mb-3">
            <div class="image">
                <img src="<?= $avatar ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" style="line-height: 1">
                    <?= $profile->nama_lengkap == null ? 'NoName' : $profile->nama_lengkap ?>
                    <br>
                    <small class="text-muted">
                        <?= $profile->jabatan == null ? 'Admin' : $profile->jabatan ?>
                    </small>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 mb-5">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <?php
                $page = $this->uri->segment(1);
                $master = ["datatahun", "dataguru", "datajurusan", "datakelas", "datamapel", "dataekstra", "datasiswa"];
                $elearning = ["kelasjadwal", "kelasmateri", "kelastugas", "kelasmaterijadwal"];
                $infoelearning = ["kelascetak", "kelasstatus", "kelasabsensiharian", "kelasabsensiharianmapel", "kelasabsensibulanan", "kelasnilai", "kelascatatan"];
                $cbt = ["cbtjenis", "cbtruang", "cbtsesi", "cbtsesisiswa", "cbtnomorpeserta", "cbtjadwal", "cbtbanksoal", "cbtalokasi", "cbtpengawas", "cbttoken"];
                $infoujian = ["cbtcetak", "cbtpeserta", "cbtstatus", "cbtnilai", "cbtanalisis", "cbtrekap"];
                $usermanager = ["useradmin", "userguru", "usersiswa"];
                $databases = ["dbmanager", "dbclear", "update"];
                $users = ["users"];
                ?>
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>"
                       class="nav-link <?= $page === 'dashboard' ? "active" : "" ?>">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?= in_array($page, $master) ? "menu-open" : "" ?>">
                    <a href="#" class="nav-link <?= in_array($page, $master) ? "active" : "" ?>">
                        <i class="nav-icon fas fa-server"></i>
                        <p>Data Umum<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('datatahun') ?>"
                               class="nav-link <?= $page === 'datatahun' ? "active" : "" ?>">
                                <i class="far fa-calendar-check nav-icon"></i>
                                <p>Tahun Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('datamapel') ?>"
                               class="nav-link <?= $page === 'datamapel' ? "active" : "" ?>">
                                <i class="fa fa-book nav-icon"></i>
                                <p>Mata Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('datajurusan') ?>"
                               class="nav-link <?= $page === 'datajurusan' ? "active" : "" ?>">
                                <i class="fa fa-flask nav-icon"></i>
                                <p>Jurusan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('datasiswa') ?>"
                               class="nav-link <?= $page === 'datasiswa' ? "active" : "" ?>">
                                <i class="fa fa-users nav-icon"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('datakelas') ?>"
                               class="nav-link <?= $page === 'datakelas' ? "active" : "" ?>">
                                <i class="fa fa-school nav-icon"></i>
                                <p>Kelas / Rombel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dataekstra') ?>"
                               class="nav-link <?= $page === 'dataekstra' ? "active" : "" ?>">
                                <i class="fa fa-chess nav-icon"></i>
                                <p>Ekstrakurikuler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dataguru') ?>"
                               class="nav-link <?= $page === 'dataguru' ? "active" : "" ?>">
                                <i class="fa fa-chalkboard-teacher nav-icon"></i>
                                <p>Guru</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= in_array($page, $elearning) ? "menu-open" : "" ?>">
                    <a href="#" class="nav-link <?= in_array($page, $elearning) ? "active" : "" ?>">
                        <i class="nav-icon fas fa-chalkboard"></i>
                        <p>
                            Data E-Learning
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
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= in_array($page, $cbt) ? "menu-open" : "" ?>">
                    <a href="#" class="nav-link <?= in_array($page, $cbt) ? "active" : "" ?>">
                        <i class="nav-icon fa fa-user-graduate"></i>
                        <p>
                            Data Ujian
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('cbtjenis') ?>"
                               class="nav-link <?= $page === 'cbtjenis' ? "active" : "" ?>">
                                <i class="fa fa-project-diagram nav-icon"></i>
                                <p>Jenis Ujian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cbtsesi') ?>"
                               class="nav-link <?= $page === 'cbtsesi' ? "active" : "" ?>">
                                <i class="far fa-clock nav-icon"></i>
                                <p>Sesi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cbtruang') ?>"
                               class="nav-link <?= $page === 'cbtruang' ? "active" : "" ?>">
                                <i class="fa fa-door-open nav-icon"></i>
                                <p>Ruang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cbtsesisiswa') ?>"
                               class="nav-link <?= $page === 'cbtsesisiswa' ? "active" : "" ?>">
                                <i class="fa fa-user-clock nav-icon"></i>
                                <p>Atur Ruang dan Sesi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cbtnomorpeserta') ?>"
                               class="nav-link <?= $page === 'cbtnomorpeserta' ? "active" : "" ?>">
                                <i class="far fa-id-card nav-icon"></i>
                                <p>Atur Nomor Peserta</p>
                            </a>
                        </li>
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
                            <a href="<?= base_url('cbtalokasi') ?>"
                               class="nav-link <?= $page === 'cbtalokasi' ? "active" : "" ?>">
                                <i class="fa fa-clock-o nav-icon"></i>
                                <p>Alokasi Waktu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cbtpengawas') ?>"
                               class="nav-link <?= $page === 'cbtpengawas' ? "active" : "" ?>">
                                <i class="fa fa-briefcase nav-icon"></i>
                                <p>Pengawas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('cbttoken') ?>"
                               class="nav-link <?= $page === 'cbttoken' ? "active" : "" ?>">
                                <i class="fa fa-key nav-icon"></i>
                                <p>Token</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pengumuman') ?>"
                       class="nav-link <?= $page === 'pengumuman' ? "active" : "" ?>">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>
                <li class="nav-header">PELAKSANAAN</li>
                <li class="nav-item has-treeview <?= in_array($page, $infoelearning) ? "menu-open" : "" ?>">
                    <a href="#" class="nav-link <?= in_array($page, $infoelearning) ? "active" : "" ?>">
                        <i class="nav-icon fas fa-microscope"></i>
                        <p>
                            Hasil E-Learning
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('kelasstatus') ?>"
                               class="nav-link <?= $page === 'kelasstatus' ? "active" : "" ?>">
                                <i class="far fa-clipboard nav-icon"></i>
                                <p>Nilai Harian</p>
                            </a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a href="<?= base_url('kelasabsensiharianmapel') ?>" class="nav-link <?= $page === 'kelasabsensiharianmapel' ? "active" : "" ?>">
                                <i class="fa fa-tasks nav-icon"></i>
                                <p>Kehadiran dan Nilai</p>
                            </a>
                        </li>
                        -->
                        <li class="nav-item">
                            <a href="<?= base_url('kelasabsensiharian') ?>"
                               class="nav-link <?= $page === 'kelasabsensiharian' ? "active" : "" ?>">
                                <i class="fa fa-user-check nav-icon"></i>
                                <p>Kehadiran Harian</p>
                            </a>
                        </li>
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
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= in_array($page, $infoujian) ? "menu-open" : "" ?>">
                    <a href="#" class="nav-link <?= in_array($page, $infoujian) ? "active" : "" ?>">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Pelaksanaan Ujian
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('cbtcetak') ?>"
                               class="nav-link <?= $page === 'cbtcetak' ? "active" : "" ?>">
                                <i class="fa fa-print nav-icon"></i>
                                <p>Cetak</p>
                            </a>
                        </li>
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
                                <p>Rekap Nilai Ujian</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">RAPOR</li>
                <li class="nav-item">
                    <a href="<?= base_url('rapor') ?>" class="nav-link <?= $page === 'rapor' ? "active" : "" ?>">
                        <i class="fas fa-book nav-icon"></i>
                        <p>Setting Rapor</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('bukurapor') ?>"
                       class="nav-link <?= $page === 'bukurapor' ? "active" : "" ?>">
                        <i class="fas fa-book nav-icon"></i>
                        <p>Kumpulan Nilai Rapor</p>
                    </a>
                </li>
                <!--
                <li class="nav-item">
                    <a href="<?= base_url('bukuinduk') ?>" class="nav-link <?= $page === 'bukuinduk' ? "active" : "" ?>">
                        <i class="fas fa-book nav-icon"></i>
                        <p>Buku Induk</p>
                    </a>
                </li>
                -->
                <li class="nav-item">
                    <a href="<?= base_url('dataalumni') ?>"
                       class="nav-link <?= $page === 'dataalumni' ? "active" : "" ?>">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Alumni</p>
                    </a>
                </li>
                <li class="nav-header">PENGATURAN</li>
                <li class="nav-item">
                    <a href="<?= base_url('settings') ?>" class="nav-link <?= $page === 'settings' ? "active" : "" ?>">
                        <i class="fas fa-university nav-icon"></i>
                        <p>Profile Sekolah</p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?= in_array($page, $usermanager) ? "menu-open" : "" ?>">
                    <a href="#" class="nav-link <?= in_array($page, $usermanager) ? "active" : "" ?>">
                        <i class="nav-icon fa fa-users-cog"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('useradmin') ?>"
                               class="nav-link <?= $page === 'useradmin' ? "active" : "" ?>">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>Administrator</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('userguru') ?>"
                               class="nav-link <?= $page === 'userguru' ? "active" : "" ?>">
                                <i class="fas fa-user-tie nav-icon"></i>
                                <p>Guru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('usersiswa') ?>"
                               class="nav-link <?= $page === 'usersiswa' ? "active" : "" ?>">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?= in_array($page, $databases) ? "menu-open" : "" ?>">
                    <a href="#" class="nav-link <?= in_array($page, $databases) ? "active" : "" ?>">
                        <i class="nav-icon fa fa-users-cog"></i>
                        <p>
                            Database
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('dbmanager') ?>"
                               class="nav-link <?= $page === 'dbmanager' ? "active" : "" ?>">
                                <i class="fas fa-database nav-icon"></i>
                                <p>Backup/Restore</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dbclear') ?>"
                               class="nav-link <?= $page === 'dbclear' ? "active" : "" ?>">
                                <i class="fas fa-database nav-icon"></i>
                                <p>Data Manager</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('update') ?>"
                               class="nav-link <?= $page === 'update' ? "active" : "" ?>">
                                <i class="fas fa-upload nav-icon"></i>
                                <p>Update</p>
                            </a>
                        </li>
                    </ul>
                </li>
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
