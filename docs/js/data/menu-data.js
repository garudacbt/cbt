const menuData = [
    {
        section: 'Mulai',
        items: [
            {
                id: 'pendahuluan',
                icon: 'fas fa-book-open',
                label: 'Pendahuluan',
                children: [
                    { id: 'tentang-aplikasi', label: 'Tentang GarudaCBT', prev: null, next: 'persyaratan-sistem' },
                    { id: 'persyaratan-sistem', label: 'Persyaratan Sistem', prev: 'tentang-aplikasi', next: 'tentang-panduan' },
                    { id: 'tentang-panduan', label: 'Tentang Panduan', prev: 'persyaratan-sistem', next: 'instalasi' }
                ]
            },
            {
                id: 'memulai',
                icon: 'fas fa-rocket',
                label: 'Memulai',
                children: [
                    { id: 'instalasi', label: 'Instalasi', prev: 'persyaratan-sistem', next: 'konfigurasi-awal' },
                    { id: 'konfigurasi-awal', label: 'Konfigurasi Awal', prev: 'instalasi', next: 'login-pertama' },
                    { id: 'login-pertama', label: 'Login', prev: 'konfigurasi-awal', next: 'petunjuk-antarmuka' },
                    { id: 'petunjuk-antarmuka', label: 'Petunjuk Antarmuka', prev: 'login-pertama', next: 'alur-awal-tahun' }
                ]
            },
            {
                id: 'alur-kerja',
                icon: 'fas fa-project-diagram',
                label: 'Alur Kerja Umum',
                children: [
                    { id: 'alur-awal-tahun', label: 'Persiapan Awal Tahun Ajaran', prev: 'petunjuk-antarmuka', next: 'alur-ujian-cbt' },
                    { id: 'alur-ujian-cbt', label: 'Menyelenggarakan Ujian CBT', prev: 'alur-awal-tahun', next: 'alur-elearning' },
                    { id: 'alur-elearning', label: 'Pengelolaan E-Learning', prev: 'alur-ujian-cbt', next: 'alur-rapor' },
                    { id: 'alur-rapor', label: 'Penerbitan Rapor', prev: 'alur-elearning', next: 'ringkasan-admin' }
                ]
            }
        ]
    },
    {
        section: 'Dashboard',
        items: [
            {
                id: 'dashboard-admin',
                icon: 'fas fa-user-shield',
                label: 'Dashboard Admin',
                children: [
                    { id: 'ringkasan-admin', label: 'Ringkasan Admin', prev: 'alur-rapor', next: 'info-box' },
                    { id: 'info-box', label: 'Info Box', prev: 'ringkasan-admin', next: 'ganti-tahun' },
                    { id: 'ganti-tahun', label: 'Ganti Tahun & Semester', prev: 'info-box', next: 'ringkasan-guru' }
                ]
            },
            {
                id: 'dashboard-guru',
                icon: 'fas fa-chalkboard-teacher',
                label: 'Dashboard Guru',
                children: [
                    { id: 'ringkasan-guru', label: 'Ringkasan Guru', prev: 'ganti-tahun', next: 'jadwal-harian' },
                    { id: 'jadwal-harian', label: 'Jadwal Harian', prev: 'ringkasan-guru', next: 'ringkasan-siswa' }
                ]
            },
            {
                id: 'dashboard-siswa',
                icon: 'fas fa-user-graduate',
                label: 'Dashboard Siswa',
                children: [
                    { id: 'ringkasan-siswa', label: 'Ringkasan Siswa', prev: 'jadwal-harian', next: 'menu-siswa' },
                    { id: 'menu-siswa', label: 'Menu Siswa', prev: 'ringkasan-siswa', next: 'tahun-ajaran' }
                ]
            }
        ]
    },
    {
        section: 'Administrator',
        items: [
            {
                id: 'data-umum',
                icon: 'fas fa-server',
                label: 'Data Umum',
                children: [
                    { id: 'tahun-ajaran', label: 'Tahun Pelajaran', prev: 'menu-siswa', next: 'mata-pelajaran' },
                    { id: 'mata-pelajaran', label: 'Mata Pelajaran', prev: 'tahun-ajaran', next: 'jurusan' },
                    { id: 'jurusan', label: 'Jurusan', prev: 'mata-pelajaran', next: 'kelas-rombel' },
                    { id: 'kelas-rombel', label: 'Kelas / Rombel', prev: 'jurusan', next: 'data-siswa' },
                    { id: 'data-siswa', label: 'Siswa', prev: 'kelas-rombel', next: 'ekstrakurikuler' },
                    { id: 'ekstrakurikuler', label: 'Ekstrakurikuler', prev: 'data-siswa', next: 'data-guru' },
                    { id: 'data-guru', label: 'Guru', prev: 'ekstrakurikuler', next: 'buku-induk' },
                    { id: 'buku-induk', label: 'Buku Induk', prev: 'data-guru', next: 'buat-bank-soal' }
                ]
            }
        ]
    },
    {
        section: 'CBT',
        items: [
            {
                id: 'bank-soal',
                icon: 'fas fa-folder-open',
                label: 'Bank Soal',
                children: [
                    { id: 'buat-bank-soal', label: 'Buat Bank Soal', prev: 'buku-induk', next: 'tambah-soal' },
                    { id: 'tambah-soal', label: 'Tambah Soal', prev: 'buat-bank-soal', next: 'import-soal' },
                    { id: 'import-soal', label: 'Import Soal', prev: 'tambah-soal', next: 'jenis-soal' },
                    { id: 'jenis-soal', label: 'Jenis Soal', prev: 'import-soal', next: 'jenis-ujian' },
                    { id: 'jenis-ujian', label: 'Jenis Ujian', prev: 'jenis-soal', next: 'sesi' },
                    { id: 'sesi', label: 'Sesi', prev: 'jenis-ujian', next: 'ruang' },
                    { id: 'ruang', label: 'Ruang', prev: 'sesi', next: 'nomor-peserta' },
                    { id: 'nomor-peserta', label: 'Nomor Peserta', prev: 'ruang', next: 'atur-ruang-sesi' },
                    { id: 'atur-ruang-sesi', label: 'Atur Ruang/Sesi', prev: 'nomor-peserta', next: 'buat-jadwal' }
                ]
            },
            {
                id: 'jadwal-cbt',
                icon: 'fas fa-calendar-alt',
                label: 'Jadwal CBT',
                children: [
                    { id: 'buat-jadwal', label: 'Buat Jadwal', prev: 'atur-ruang-sesi', next: 'alokasi-waktu' },
                    { id: 'alokasi-waktu', label: 'Alokasi Waktu', prev: 'buat-jadwal', next: 'pengawas' },
                    { id: 'pengawas', label: 'Pengawas', prev: 'alokasi-waktu', next: 'token-cbt' }
                ]
            },
            {
                id: 'pelaksanaan-cbt',
                icon: 'fas fa-laptop',
                label: 'Pelaksanaan CBT',
                children: [
                    { id: 'token-cbt', label: 'Token CBT', prev: 'pengawas', next: 'cetak-cbt' },
                    { id: 'cetak-cbt', label: 'Cetak CBT', prev: 'token-cbt', next: 'aktivasi-peserta' },
                    { id: 'aktivasi-peserta', label: 'Aktivasi Peserta', prev: 'cetak-cbt', next: 'status-siswa' },
                    { id: 'status-siswa', label: 'Status Siswa', prev: 'aktivasi-peserta', next: 'monitoring' },
                    { id: 'monitoring', label: 'Monitoring Ujian', prev: 'status-siswa', next: 'hasil-ujian' },
                    { id: 'hasil-ujian', label: 'Hasil Ujian', prev: 'monitoring', next: 'rekap-nilai' }
                ]
            },
            {
                id: 'hasil-cbt',
                icon: 'fas fa-chart-line',
                label: 'Hasil CBT',
                children: [
                    { id: 'rekap-nilai', label: 'Rekap Nilai', prev: 'monitoring', next: 'koreksi' },
                    { id: 'koreksi', label: 'Koreksi', prev: 'rekap-nilai', next: 'analisis' },
                    { id: 'analisis', label: 'Analisis Soal', prev: 'koreksi', next: 'cetak-hasil' },
                    { id: 'cetak-hasil', label: 'Cetak Hasil', prev: 'analisis', next: 'atur-jadwal' }
                ]
            }
        ]
    },
    {
        section: 'E-Learning',
        items: [
            {
                id: 'jadwal-pelajaran',
                icon: 'fas fa-calendar',
                label: 'Jadwal Pelajaran',
                children: [
                    { id: 'atur-jadwal', label: 'Atur Jadwal', prev: 'cetak-hasil', next: 'kbm-setting' },
                    { id: 'kbm-setting', label: 'Setting KBM', prev: 'atur-jadwal', next: 'copy-jadwal' },
                    { id: 'copy-jadwal', label: 'Copy Jadwal', prev: 'kbm-setting', next: 'tambah-materi' }
                ]
            },
            {
                id: 'materi',
                icon: 'fas fa-file-alt',
                label: 'Materi',
                children: [
                    { id: 'tambah-materi', label: 'Tambah Materi', prev: 'copy-jadwal', next: 'upload-materi' },
                    { id: 'upload-materi', label: 'Upload Materi', prev: 'tambah-materi', next: 'arsip-materi' },
                    { id: 'arsip-materi', label: 'Arsip Materi', prev: 'upload-materi', next: 'buat-tugas' }
                ]
            },
            {
                id: 'tugas',
                icon: 'fas fa-tasks',
                label: 'Tugas',
                children: [
                    { id: 'buat-tugas', label: 'Buat Tugas', prev: 'arsip-materi', next: 'nilai-tugas' },
                    { id: 'nilai-tugas', label: 'Nilai Tugas', prev: 'buat-tugas', next: 'absensi' },
                    { id: 'absensi', label: 'Absensi', prev: 'nilai-tugas', next: 'perpustakaan' }
                ]
            },
            {
                id: 'eperpus',
                icon: 'fas fa-book',
                label: 'Perpustakaan Digital',
                children: [
                    { id: 'perpustakaan', label: 'Perpustakaan Digital', prev: 'absensi', next: 'hasil-elearning' }
                ]
            },
        ]
    },
    {
        section: 'Hasil E-Learning',
        items: [
            {
                id: 'hasil-elearning',
                icon: 'fas fa-microscope',
                label: 'Hasil E-Learning',
                children: [
                    { id: 'nilai-materi-tugas', label: 'Nilai Materi/Tugas', prev: 'perpustakaan', next: 'kehadiran-harian' },
                    { id: 'kehadiran-harian', label: 'Kehadiran Harian', prev: 'nilai-materi-tugas', next: 'kehadiran-bulanan' },
                    { id: 'kehadiran-bulanan', label: 'Kehadiran Bulanan', prev: 'kehadiran-harian', next: 'rekap-nilai-elearning' },
                    { id: 'rekap-nilai-elearning', label: 'Rekap Nilai', prev: 'kehadiran-bulanan', next: 'setting-rapor' }
                ]
            }
        ]
    },
    {
        section: 'Rapor',
        items: [
            {
                id: 'pengaturan-rapor',
                icon: 'fas fa-cogs',
                label: 'Pengaturan Rapor',
                children: [
                    { id: 'setting-rapor', label: 'Setting Rapor', prev: 'absensi', next: 'kkm' },
                    { id: 'kkm', label: 'KKM', prev: 'setting-rapor', next: 'predikat' },
                    { id: 'predikat', label: 'Predikat', prev: 'kkm', next: 'bobot-nilai' },
                    { id: 'bobot-nilai', label: 'Bobot Nilai', prev: 'predikat', next: 'template-rapor' },
                    { id: 'template-rapor', label: 'Template Rapor', prev: 'bobot-nilai', next: 'aturan-penilaian' },
                    { id: 'aturan-penilaian', label: 'Aturan Penilaian', prev: 'template-rapor', next: 'ekstrakurikuler-rapor' },
                    { id: 'ekstrakurikuler-rapor', label: 'Ekstrakurikuler Rapor', prev: 'aturan-penilaian', next: 'catatan-rapor' },
                    { id: 'catatan-rapor', label: 'Catatan Rapor', prev: 'ekstrakurikuler-rapor', next: 'sikap' },
                    { id: 'sikap', label: 'Sikap', prev: 'catatan-rapor', next: 'nilai-pengetahuan' }
                ]
            },
            {
                id: 'input-nilai',
                icon: 'fas fa-edit',
                label: 'Input Nilai',
                children: [
                    { id: 'nilai-pengetahuan', label: 'Nilai Pengetahuan', prev: 'sikap', next: 'nilai-keterampilan' },
                    { id: 'nilai-keterampilan', label: 'Nilai Keterampilan', prev: 'nilai-pengetahuan', next: 'catatan-wali' },
                    { id: 'catatan-wali', label: 'Catatan Wali Kelas', prev: 'nilai-keterampilan', next: 'cetak-rapor' }
                ]
            },
            {
                id: 'cetak-rapor',
                icon: 'fas fa-print',
                label: 'Cetak Rapor',
                children: [
                    { id: 'cetak-rapor-siswa', label: 'Cetak Rapor Siswa' },
                    { id: 'cetak-legger', label: 'Cetak Legger' }
                ]
            },
            {
                id: 'arsip-rapor',
                icon: 'fas fa-book',
                label: 'Kumpulan Rapor',
                children: [
                    { id: 'kumpulan-rapor', label: 'Kumpulan Rapor', prev: 'cetak-legger', next: 'data-alumni' }
                ]
            },
            {
                id: 'alumni',
                icon: 'fas fa-users',
                label: 'Alumni',
                children: [
                    { id: 'data-alumni', label: 'Data Alumni', prev: 'kumpulan-rapor', next: 'pengumuman' }
                ]
            }
        ]
    },
    {
        section: 'Informasi',
        items: [
            {
                id: 'info',
                icon: 'fas fa-bullhorn',
                label: 'Pengumuman',
                children: [
                    { id: 'pengumuman', label: 'Pengumuman', prev: 'data-alumni', next: 'log-aktivitas' }
                ]
            },
            {
                id: 'log',
                icon: 'fas fa-clock',
                label: 'Log Aktivitas',
                children: [
                    { id: 'log-aktivitas', label: 'Log Aktivitas', prev: 'pengumuman', next: 'profil-sekolah' }
                ]
            }
        ]
    },
    {
        section: 'Pengaturan',
        items: [
            {
                id: 'sekolah',
                icon: 'fas fa-building',
                label: 'Data Sekolah',
                children: [
                    { id: 'profil-sekolah', label: 'Profil Sekolah' },
                ]
            },
            {
                id: 'pengguna',
                icon: 'fas fa-users',
                label: 'Manajemen Pengguna',
                children: [
                    { id: 'admin', label: 'Administrator' },
                    { id: 'user-guru', label: 'User Guru' },
                    { id: 'user-siswa', label: 'User Siswa' }
                ]
            }
        ]
    },
    {
        section: 'Database',
        items: [
            {
                id: 'database',
                icon: 'fas fa-database',
                label: 'Database Management',
                children: [
                    { id: 'db-management', label: 'Data Management', prev: 'user-siswa', next: 'backup-restore' },
                    { id: 'backup-restore', label: 'Backup & Restore', prev: 'db-manager', next: 'img-converter' },
                    { id: 'img-converter', label: 'Image Converter', prev: 'backup-restore', next: '' },
                ]
            }
        ]
    },
    {
        section: 'Lainnya',
        items: [
            {
                id: 'pemecahan-masalah',
                icon: 'fas fa-life-ring',
                label: 'Pemecahan Masalah',
                children: [
                    { id: 'faq', label: 'FAQ', prev: 'backup-restore', next: 'tips' },
                    { id: 'tips', label: 'Tips & Trick', prev: 'faq', next: 'changelog' },
                    { id: 'changelog', label: 'Changelog', prev: 'tips', next: '' },
                ]
            }
        ]
    }
];