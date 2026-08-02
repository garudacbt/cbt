if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['ekstrakurikuler-rapor'] = {
    title: 'Ekstrakurikuler Rapor',
    desc: 'Panduan lengkap mengatur penilaian kegiatan ekstrakurikuler dalam rapor di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-running"></i> Ekstrakurikuler Rapor</h2>
        <p>Ekstrakurikuler Rapor mengatur penilaian dan pencatatan kegiatan ekstrakurikuler siswa yang akan ditampilkan dalam rapor. Fitur ini memungkinkan pembina ekskul memberikan penilaian yang objektif dan terdokumentasi.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Ekstrakurikuler Rapor</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Pembina Ekskul ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Pengaturan Rapor</code></li>
            <li>Klik <code class="inline">Ekstrakurikuler Rapor</code></li>
            <li>Halaman Ekstrakurikuler Rapor akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan pembina ekskul telah diberikan akses yang sesuai. Administrator dapat mengatur semua ekskul, pembina hanya dapat mengakses ekskul yang mereka ampu.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur Ekstrakurikuler Rapor</h3>
        <ol class="step-list">
            <li>Pada halaman Ekstrakurikuler Rapor, pilih tahun ajaran dan semester</li>
            <li>Daftar ekstrakurikuler akan ditampilkan</li>
            <li>Atur penilaian untuk setiap ekstrakurikuler:
                <ul class="step-list">
                    <li><strong>Nama Ekskul:</strong> Nama kegiatan ekstrakurikuler</li>
                    <li><strong>Pembina:</strong> Guru pembina ekskul</li>
                    <li><strong>Keterangan:</strong> Deskripsi kegiatan</li>
                    <li><strong>Sistem Penilaian:</strong> A/B/C atau Sangat Baik/Baik/Cukup</li>
                    <li><strong>Wajib Diikuti:</strong> Apakah ekskul wajib atau opsional</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Pengaturan akan diterapkan</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Sistem penilaian dapat disesuaikan dengan kebutuhan sekolah. Pastikan deskripsi kegiatan jelas dan informatif.</div>
        </div>
        <hr>
        <h3>🠊 Input Nilai Ekstrakurikuler</h3>
        <ol class="step-list">
            <li>Pada halaman Ekstrakurikuler Rapor, pilih ekskul yang akan dinilai</li>
            <li>Pilih kelas atau siswa</li>
            <li>Input nilai untuk setiap siswa:
                <ul class="step-list">
                    <li><strong>Nilai:</strong> Pilih nilai sesuai sistem penilaian</li>
                    <li><strong>Catatan:</strong> Tambahkan catatan jika diperlukan</li>
                    <li><strong>Kehadiran:</strong> Catat kehadiran siswa (opsional)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Nilai akan tersimpan dan ditampilkan di rapor</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Nilai ekstrakurikuler dapat diinput oleh pembina ekskul atau admin. Pastikan pembina telah diberikan akses yang sesuai.</div>
        </div>
        <hr>
        <h3>🠊 Edit dan Hapus Ekstrakurikuler</h3>
        <ol class="step-list">
            <li>Pada halaman Ekstrakurikuler Rapor, daftar ekskul akan ditampilkan</li>
            <li>Klik tombol <code class="inline">Edit</code> untuk mengubah data ekskul</li>
            <li>Ubah data sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Untuk menghapus, klik tombol <code class="inline">Hapus</code></li>
            <li>Konfirmasi penghapusan</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Penghapusan ekskul akan menghapus semua nilai terkait</li>
                    <li>Pastikan tidak ada siswa yang sedang mengikuti ekskul</li>
                    <li>Backup data sebelum menghapus</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Ekstrakurikuler</h3>
        <ul class="step-list">
            <li><strong>Per Semester:</strong> Data diatur per tahun ajaran dan semester</li>
            <li><strong>Per Pembina:</strong> Pembina hanya dapat mengakses ekskul yang mereka ampu</li>
            <li><strong>Opsional:</strong> Ekskul dapat bersifat wajib atau opsional</li>
            <li><strong>Real-time:</strong> Nilai di-update secara real-time</li>
            <li><strong>Dokumentasi:</strong> Semua data terdokumentasi di rapor</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan pembina ekskul terdaftar di sistem</li>
                    <li>Berikan akses yang sesuai kepada pembina</li>
                    <li>Review nilai sebelum rapor dicetak</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Konsistensi:</strong> Jaga konsistensi sistem penilaian antar ekskul</li>
            <li><strong>Komunikasi:</strong> Informasikan kriteria penilaian kepada siswa</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan kegiatan dan pencapaian siswa</li>
            <li><strong>Objektif:</strong> Berikan penilaian yang objektif dan adil</li>
            <li><strong>Catatan:</strong> Tambahkan catatan untuk siswa dengan performa khusus</li>
            <li><strong>Review:</strong> Review nilai secara berkala</li>
            <li><strong>Kehadiran:</strong> Catat kehadiran sebagai bagian penilaian</li>
            <li><strong>Feedback:</strong> Berikan feedback kepada siswa</li>
            <li><strong>Akses:</strong> Kelola akses pembina dengan baik</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data nilai</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Ekskul tidak muncul:</strong>
                <span>Pastikan ekskul sudah ditambahkan di sistem. Periksa apakah Anda memiliki akses ke ekskul tersebut. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tidak tersimpan:</strong>
                <span>Pastikan semua field diisi dengan benar. Periksa apakah ada error validasi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul:</strong>
                <span>Pastikan siswa terdaftar di kelas. Periksa apakah siswa mengikuti ekskul tersebut. Atur kepesertaan jika diperlukan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa edit:</strong>
                <span>Pastikan Anda memiliki izin untuk edit. Periksa apakah rapor sudah dicetak. Data mungkin dikunci setelah cetak.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Pembina tidak memiliki akses:</strong>
                <span>Pastikan pembina terdaftar di sistem. Berikan akses yang sesuai melalui menu Administrator > Manajemen User.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Pembina:</strong> Pembina ekskul hanya dapat mengakses dan menginput nilai untuk ekskul yang mereka ampu. Administrator memiliki akses penuh ke semua ekskul.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Sistem Penilaian:</strong> Sistem penilaian (A/B/C atau deskriptif) dapat disesuaikan dengan kebijakan sekolah. Pastikan sistem penilaian konsisten antar ekskul.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Dokumentasi:</strong> Nilai dan catatan ekstrakurikuler akan ditampilkan di rapor siswa. Pastikan data yang diinput akurat dan informatif.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Wajib vs Opsional:</strong> Ekskul dapat ditandai sebagai wajib atau opsional. Ekskul wajib akan muncul di semua rapor, ekskul opsional hanya untuk siswa yang mengikuti.</div>
        </div>
    </div>`
};
