if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['rekap-nilai-elearning'] = {
    title: 'Rekap Nilai E-Learning',
    desc: 'Panduan lengkap melihat rekapitulasi nilai e-learning per semester di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-trophy"></i> Rekap Nilai E-Learning</h2>
        <p>Rekap Nilai E-Learning menampilkan rekapitulasi nilai siswa dari kegiatan e-learning per semester. Fitur ini memungkinkan guru dan administrator melihat performa akademik siswa, ranking, dan statistik kelas berdasarkan aktivitas pembelajaran daring.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Rekap Nilai E-Learning</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">E-Learning</code></li>
            <li>Klik submenu <code class="inline">Hasil E-Learning</code></li>
            <li>Klik <code class="inline">Rekap Nilai</code></li>
            <li>Halaman Rekap Nilai E-Learning akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Rekap Nilai E-Learning menampilkan rekapitulasi dari nilai materi dan tugas. Pastikan nilai materi/tugas sudah diinput sebelum melihat rekap.</div>
        </div>
        <hr>
        <h3>🠊 Melihat Rekap Nilai</h3>
        <ol class="step-list">
            <li>Pada halaman Rekap Nilai, pilih tahun ajaran dan semester</li>
            <li>Pilih kelas</li>
            <li>Pilih mata pelajaran (opsional)</li>
            <li>Rekap nilai akan ditampilkan:
                <ul class="step-list">
                    <li><strong>Nama Siswa:</strong> Nama peserta</li>
                    <li><strong>NIS:</strong> Nomor Induk Siswa</li>
                    <li><strong>Kelas:</strong> Kelas siswa</li>
                    <li><strong>Nilai Materi:</strong> Rata-rata nilai materi</li>
                    <li><strong>Nilai Tugas:</strong> Rata-rata nilai tugas</li>
                    <li><strong>Nilai Akhir:</strong> Nilai akhir e-learning</li>
                    <li><strong>Ranking:</strong> Peringkat di kelas</li>
                    <li><strong>Predikat:</strong> Predikat berdasarkan nilai</li>
                </ul>
            </li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan filter untuk melihat rekap per kelas atau per mata pelajaran. Ini akan memudahkan analisis performa spesifik.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Perhitungan Nilai Akhir</h3>
        <p>Nilai akhir e-learning dihitung berdasarkan formula:</p>
        <div class="info-box info">
            <i class="fas fa-calculator"></i>
            <div>
                <strong>Formula:</strong> Nilai Akhir = (Nilai Materi × Bobot Materi) + (Nilai Tugas × Bobot Tugas)
            </div>
        </div>
        <ul class="step-list">
            <li><strong>Bobot Materi:</strong> Persentase kontribusi nilai materi (default: 60%)</li>
            <li><strong>Bobot Tugas:</strong> Persentase kontribusi nilai tugas (default: 40%)</li>
            <li><strong>Bobot dapat disesuaikan:</strong> Sesuai dengan kebijakan sekolah</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan bobot penilaian sudah diatur dengan benar</li>
                    <li>Perubahan bobot akan mempengaruhi nilai akhir</li>
                    <li>Komunikasikan formula penilaian kepada siswa</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Memahami Predikat</h3>
        <p>Predikat ditentukan berdasarkan nilai akhir:</p>
        <ul class="step-list">
            <li><strong>A (90-100):</strong> Sangat Baik</li>
            <li><strong>B (80-89):</strong> Baik</li>
            <li><strong>C (70-79):</strong> Cukup</li>
            <li><strong>D (60-69):</strong> Kurang</li>
            <li><strong>E (< 60):</strong> Sangat Kurang</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Kustomisasi:</strong> Rentang nilai dan predikat dapat disesuaikan sesuai dengan kebijakan sekolah melalui menu Pengaturan Rapor.</div>
        </div>
        <hr>
        <h3>🠊 Filter dan Pencarian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter Kelas</code> untuk memfilter berdasarkan kelas</li>
            <li>Gunakan dropdown <code class="inline">Filter Mapel</code> untuk memfilter berdasarkan mata pelajaran</li>
            <li>Gunakan dropdown <code class="inline">Filter Rentang Nilai</code> untuk memfilter berdasarkan nilai</li>
            <li>Gunakan dropdown <code class="inline">Filter Predikat</code> untuk memfilter berdasarkan predikat</li>
            <li>Gunakan kolom <code class="inline">Cari</code> untuk mencari siswa berdasarkan nama atau NIS</li>
            <li>Hasil akan ditampilkan sesuai filter yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter rentang nilai dan predikat berguna untuk mengidentifikasi siswa yang perlu perhatian khusus atau siswa berprestasi.</div>
        </div>
        <hr>
        <h3>🠊 Export Rekap Nilai</h3>
        <ol class="step-list">
            <li>Pada halaman Rekap Nilai, klik tombol <code class="inline">Export</code></li>
            <li>Pilih format export:
                <ul class="step-list">
                    <li><strong>PDF:</strong> Untuk laporan resmi dan distribusi</li>
                    <li><strong>Excel:</strong> Untuk analisis data dan pengolahan lebih lanjut</li>
                </ul>
            </li>
            <li>Pilih tahun ajaran dan semester yang akan di-export</li>
            <li>Pilih kelas (opsional)</li>
            <li>Klik tombol <code class="inline">Download</code></li>
            <li>File akan di-generate dan didownload ke komputer</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Export dalam format Excel jika perlu mengolah data lebih lanjut atau membuat analisis statistik nilai.</div>
        </div>
        <hr>
        <h3>🠊 Cetak Rekap Nilai</h3>
        <ol class="step-list">
            <li>Pada halaman Rekap Nilai, klik tombol <code class="inline">Cetak</code></li>
            <li>Pilih format cetak:
                <ul class="step-list">
                    <li><strong>Per Siswa:</strong> Cetak rekap per siswa</li>
                    <li><strong>Per Kelas:</strong> Cetak rekap per kelas</li>
                    <li><strong>Rekap Lengkap:</strong> Cetak semua rekap</li>
                </ul>
            </li>
            <li>Pilih tahun ajaran dan semester</li>
            <li>Pilih kelas (opsional)</li>
            <li>Klik tombol <code class="inline">Cetak</code></li>
            <li>Dokumen akan di-generate untuk dicetak</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Cetak rekap nilai untuk dokumentasi dan laporan ke orang tua atau pihak sekolah.</div>
        </div>
        <hr>
        <h3>🠊 Statistik Kelas</h3>
        <ol class="step-list">
            <li>Pada halaman Rekap Nilai, klik tombol <code class="inline">Statistik</code></li>
            <li>Statistik kelas akan ditampilkan:
                <ul class="step-list">
                    <li>Rata-rata nilai kelas</li>
                    <li>Nilai tertinggi dan terendah</li>
                    <li>Distribusi predikat</li>
                    <li>Jumlah siswa per predikat</li>
                    <li>Grafik distribusi nilai</li>
                    <li>Perbandingan antar kelas</li>
                </ul>
            </li>
            <li>Statistik dapat dilihat per kelas atau per mapel</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Statistik kelas berguna untuk evaluasi performa kelas dan identifikasi area perbaikan pembelajaran.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Rekap Nilai</h3>
        <ul class="step-list">
            <li><strong>Per Semester:</strong> Rekap dihitung per tahun ajaran dan semester</li>
            <li><strong>Akumulatif:</strong> Data diakumulasi dari nilai materi dan tugas</li>
            <li><strong>Real-time:</strong> Rekap di-update secara real-time</li>
            <li><strong>Per Kelas:</strong> Rekap diorganisir per kelas dan mapel</li>
            <li><strong>Komponen:</strong> Rekap dapat digunakan sebagai komponen rapor</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan nilai materi/tugas diinput dengan benar</li>
                    <li>Rekap bergantung pada data nilai yang tersedia</li>
                    <li>Gunakan rekap untuk evaluasi dan perbaikan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Review Semester:</strong> Review rekap nilai setiap semester</li>
            <li><strong>Analisis Tren:</strong> Analisis tren performa jangka panjang</li>
            <li><strong>Identifikasi:</strong> Identifikasi siswa yang perlu perhatian</li>
            <li><strong>Intervensi:</strong> Berikan intervensi dini untuk siswa bermasalah</li>
            <li><strong>Komunikasi:</strong> Komunikasikan rekap kepada orang tua</li>
            <li><strong>Dokumentasi:</strong> Simpan rekap sebagai arsip</li>
            <li><strong>Perbandingan:</strong> Bandingkan performa antar semester</li>
            <li><strong>Evaluasi:</strong> Evaluasi efektivitas pembelajaran e-learning</li>
            <li><strong>Transparansi:</strong> Jaga transparansi dalam pelaporan</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data nilai</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Rekap tidak muncul:</strong>
                <span>Pastikan tahun ajaran dan semester sudah dipilih. Pastikan nilai materi/tugas sudah diinput. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai akhir tidak sesuai:</strong>
                <span>Pastikan bobot penilaian sudah diatur dengan benar. Periksa nilai materi dan tugas. Refresh halaman untuk update data.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul:</strong>
                <span>Pastikan siswa terdaftar di kelas. Pastikan nilai tersedia. Periksa data siswa.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Export gagal:</strong>
                <span>Pastikan koneksi internet stabil. Coba refresh halaman dan ulangi proses. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Cetak gagal:</strong>
                <span>Pastikan printer terhubung. Coba refresh halaman dan ulangi proses. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data Nilai:</strong> Rekap nilai dihitung dari data nilai materi dan tugas. Pastikan nilai diinput secara konsisten untuk hasil yang akurat.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Update Real-time:</strong> Rekap nilai di-update secara real-time saat nilai materi/tugas diinput atau diubah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Komponen Rapor:</strong> Rekap nilai e-learning dapat digunakan sebagai komponen penilaian dalam rapor sesuai dengan aturan penilaian sekolah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat melihat rekap nilai siswa di kelas yang mereka ampu. Administrator memiliki akses penuh ke semua rekap nilai.</div>
        </div>
    </div>`
};
