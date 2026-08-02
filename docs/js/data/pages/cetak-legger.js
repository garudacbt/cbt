if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['cetak-legger'] = {
    title: 'Cetak Legger',
    desc: 'Panduan lengkap mencetak legger nilai di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-table"></i> Cetak Legger Nilai</h2>
        <p>Legger adalah rekap nilai seluruh siswa dalam satu kelas yang digunakan untuk dokumentasi sekolah. Legger berisi ringkasan nilai, predikat, rata-rata kelas, dan peringkat siswa.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Cetak Legger</h3>
        <ol class="step-list">
            <li>Login sebagai Guru, Wali Kelas, atau Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Cetak Rapor</code></li>
            <li>Klik <code class="inline">Legger</code></li>
            <li>Halaman Cetak Legger akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Legger berguna untuk analisis nilai kelas dan dokumentasi sekolah. File dapat diedit jika diperlukan setelah didownload.</div>
        </div>
        <hr>
        <h3>🠊 Mencetak Legger</h3>
        <ol class="step-list">
            <li>Pada halaman Cetak Legger, pilih tahun ajaran dan semester</li>
            <li>Pilih kelas</li>
            <li>Pilih format output:
                <ul class="step-list">
                    <li><strong>Excel:</strong> Download sebagai file Excel</li>
                    <li><strong>PDF:</strong> Download sebagai file PDF</li>
                    <li><strong>Print:</strong> Cetak langsung ke printer</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Cetak</code> atau <code class="inline">Download</code></li>
            <li>Legger akan dihasilkan sesuai format yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Format Excel direkomendasikan untuk legger karena memungkinkan editing dan analisis lebih lanjut.</div>
        </div>
        <hr>
        <h3>🠊 Informasi dalam Legger</h3>
        <ul class="step-list">
            <li><strong>Informasi Siswa:</strong> Nama, NISN, kelas, semester</li>
            <li><strong>Nilai Mapel:</strong> Nilai untuk setiap mata pelajaran</li>
            <li><strong>Predikat:</strong> Predikat untuk setiap mata pelajaran</li>
            <li><strong>Rata-rata:</strong> Rata-rata nilai per siswa</li>
            <li><strong>Rata-rata Kelas:</strong> Rata-rata nilai kelas per mapel</li>
            <li><strong>Peringkat:</strong> Peringkat siswa dalam kelas</li>
            <li><strong>Kehadiran:</strong> Data kehadiran siswa</li>
            <li><strong>Status Ketuntasan:</strong> Status tuntas/belum tuntas</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Analisis:</strong> Legger dapat digunakan untuk analisis performa kelas, identifikasi siswa yang perlu perhatian, dan evaluasi efektivitas pembelajaran.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Cetak Legger</h3>
        <ul class="step-list">
            <li><strong>Format:</strong> Legger dapat dicetak dalam format Excel, PDF, atau langsung ke printer</li>
            <li><strong>Per Kelas:</strong> Legger dihasilkan per kelas</li>
            <li><strong>Validasi:</strong> Sistem akan memvalidasi data sebelum mencetak</li>
            <li><strong>Arsip:</strong> Legger yang dicetak akan diarsipkan di sistem</li>
            <li><strong>Dokumentasi:</strong> Semua cetakan terdokumentasi</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan semua nilai sudah lengkap sebelum mencetak</li>
                    <li>Review data sebelum cetak massal</li>
                    <li>Backup data sebelum cetak massal</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Excel:</strong> Gunakan format Excel untuk analisis lebih lanjut</li>
            <li><strong>Review:</strong> Review semua data sebelum mencetak</li>
            <li><strong>Backup:</strong> Simpan file sebagai backup digital</li>
            <li><strong>Analisis:</strong> Gunakan legger untuk analisis performa kelas</li>
            <li><strong>Konsisten:</strong> Jaga konsistensi format legger</li>
            <li><strong>Arsip:</strong> Arsipkan legger setiap semester</li>
            <li><strong>Distribusi:</strong> Rencanakan distribusi legger</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data siswa</li>
            <li><strong>Validasi:</strong> Validasi data sebelum mencetak</li>
            <li><strong>Monitoring:</strong> Monitor performa kelas secara berkala</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Legger tidak dapat dicetak:</strong>
                <span>Pastikan semua data nilai sudah lengkap. Periksa apakah ada error validasi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Excel tidak terdownload:</strong>
                <span>Pastikan browser mengizinkan download. Periksa koneksi internet. Coba gunakan browser lain.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tidak sesuai:</strong>
                <span>Pastikan nilai sudah diinput dengan benar. Periksa setting bobot dan predikat. Refresh halaman untuk update data.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Peringkat tidak muncul:</strong>
                <span>Pastikan semua nilai sudah lengkap. Periksa apakah perhitungan peringkat sudah diaktifkan. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Data tidak lengkap:</strong>
                <span>Pastikan semua nilai sudah diinput. Periksa data yang belum lengkap. Lengkapi data sebelum mencetak.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Analisis Performa:</strong> Legger berguna untuk analisis performa kelas, identifikasi siswa yang perlu perhatian, dan evaluasi efektivitas pembelajaran.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Format Excel:</strong> Format Excel direkomendasikan untuk legger karena memungkinkan editing, analisis, dan formatting lebih lanjut.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validasi Sistem:</strong> Sistem akan memvalidasi data sebelum mencetak. Pastikan semua data valid untuk menghindari error saat cetak.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses:</strong> Guru, Wali Kelas, dan Administrator dapat mencetak legger. Guru hanya dapat mencetak legger untuk kelas yang mereka ampu.</div>
        </div>
    </div>`
};