if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['kumpulan-rapor'] = {
    title: 'Kumpulan Rapor',
    desc: 'Panduan lengkap mengelola kumpulan rapor siswa di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-book"></i> Kumpulan Rapor</h2>
        <p>Kumpulan Rapor menyediakan fitur untuk mengelola dan menyimpan arsip rapor siswa. Fitur ini memungkinkan sekolah untuk menyimpan, mendownload, mengupload, dan mengarsipkan rapor siswa secara digital.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Kumpulan Rapor</h3>
        <ol class="step-list">
            <li>Login sebagai Guru, Wali Kelas, atau Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik <code class="inline">Kumpulan Rapor</code></li>
            <li>Halaman Kumpulan Rapor akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Kumpulan Rapor berguna untuk menyimpan arsip digital rapor siswa sebagai backup dan kemudahan akses jika rapor fisik hilang atau rusak.</div>
        </div>
        <hr>
        <h3>🠊 Mengelola Kumpulan Rapor</h3>
        <ol class="step-list">
            <li>Pada halaman Kumpulan Rapor, pilih tahun ajaran dan semester</li>
            <li>Pilih kelas</li>
            <li>Daftar rapor siswa akan ditampilkan:
                <ul class="step-list">
                    <li><strong>Nama Siswa:</strong> Nama siswa</li>
                    <li><strong>Status:</strong> Status rapor (Selesai/Belum)</li>
                    <li><strong>Tanggal Cetak:</strong> Tanggal pencetakan</li>
                    <li><strong>File:</strong> File rapor (PDF)</li>
                </ul>
            </li>
            <li>Lakukan tindakan yang diperlukan:
                <ul class="step-list">
                    <li><strong>Download:</strong> Download file rapor</li>
                    <li><strong>Upload:</strong> Upload rapor yang sudah dicetak</li>
                    <li><strong>Hapus:</strong> Hapus file rapor</li>
                    <li><strong>Arsip:</strong> Arsip rapor lama</li>
                </ul>
            </li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan fitur arsip untuk rapor lama agar tidak menumpuk di halaman utama. Arsip dapat diakses kapan saja jika diperlukan.</div>
        </div>
        <hr>
        <h3>🠊 Download Rapor</h3>
        <ol class="step-list">
            <li>Pada halaman Kumpulan Rapor, pilih siswa</li>
            <li>Klik tombol <code class="inline">Download</code></li>
            <li>File rapor akan didownload ke komputer</li>
            <li>File dapat dibuka dengan PDF viewer</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Download rapor untuk backup digital atau untuk distribusi ke orang tua jika rapor fisik tidak tersedia.</div>
        </div>
        <hr>
        <h3>🠊 Upload Rapor</h3>
        <ol class="step-list">
            <li>Pada halaman Kumpulan Rapor, klik tombol <code class="inline">Upload</code></li>
            <li>Pilih siswa yang akan diupload rapornya</li>
            <li>Pilih file rapor dari komputer</li>
            <li>Klik tombol <code class="inline">Upload</code></li>
            <li>File akan diupload ke sistem</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan file yang diupload adalah file rapor yang valid</li>
                    <li>File harus dalam format PDF</li>
                    <li>Ukuran file tidak boleh melebihi batas yang ditentukan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Hapus Rapor</h3>
        <ol class="step-list">
            <li>Pada halaman Kumpulan Rapor, pilih siswa</li>
            <li>Klik tombol <code class="inline">Hapus</code></li>
            <li>Konfirmasi penghapusan</li>
            <li>File rapor akan dihapus dari sistem</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Penghapusan tidak dapat dibatalkan</li>
                    <li>Pastikan untuk backup sebelum menghapus</li>
                    <li>Hapus hanya jika file tidak diperlukan lagi</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Arsip Rapor</h3>
        <ol class="step-list">
            <li>Pada halaman Kumpulan Rapor, pilih siswa</li>
            <li>Klik tombol <code class="inline">Arsip</code></li>
            <li>Rapor akan dipindahkan ke arsip</li>
            <li>Rapor yang diarsip dapat diakses dari menu Arsip</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Arsipkan rapor lama untuk menjaga kebersihan halaman utama. Arsip dapat diakses kapan saja jika diperlukan.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Kumpulan Rapor</h3>
        <ul class="step-list">
            <li><strong>Format:</strong> Rapor harus dalam format PDF</li>
            <li><strong>Ukuran:</strong> Ukuran file tidak boleh melebihi batas yang ditentukan</li>
            <li><strong>Validasi:</strong> Sistem akan memvalidasi file sebelum upload</li>
            <li><strong>Arsip:</strong> Rapor lama dapat diarsipkan</li>
            <li><strong>Dokumentasi:</strong> Semua aktivitas terdokumentasi</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan file yang diupload valid dan tidak rusak</li>
                    <li>Backup data sebelum menghapus</li>
                    <li>Review file sebelum menghapus</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Backup:</strong> Selalu backup rapor secara berkala</li>
            <li><strong>Arsip:</strong> Arsipkan rapor lama untuk kebersihan</li>
            <li><strong>Review:</strong> Review file sebelum menghapus</li>
            <li><strong>Upload:</strong> Upload rapor yang sudah dicetak sebagai backup</li>
            <li><strong>Download:</strong> Download rapor untuk distribusi digital</li>
            <li><strong>Konsisten:</strong> Jaga konsistensi penamaan file</li>
            <li><strong>Organisasi:</strong> Organisasi rapor berdasarkan tahun ajaran</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data siswa</li>
            <li><strong>Validasi:</strong> Validasi file sebelum upload</li>
            <li><strong>Monitoring:</strong> Monitor ruang penyimpanan</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Upload gagal:</strong>
                <span>Pastikan file dalam format PDF. Periksa ukuran file. Pastikan file tidak rusak. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Download gagal:</strong>
                <span>Pastikan browser mengizinkan download. Periksa koneksi internet. Coba gunakan browser lain.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>File tidak muncul:</strong>
                <span>Pastikan rapor sudah dicetak. Periksa apakah file sudah diupload. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa hapus:</strong>
                <span>Pastikan Anda memiliki izin untuk hapus. Periksa apakah file sedang digunakan. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Ruang penuh:</strong>
                <span>Hapus atau arsipkan rapor lama untuk menghemat ruang. Periksa kapasitas penyimpanan sistem.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Backup Digital:</strong> Kumpulan Rapor menyediakan backup digital untuk semua rapor siswa. Ini berguna jika rapor fisik hilang atau rusak.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Arsip:</strong> Arsipkan rapor lama untuk menjaga kebersihan halaman utama. Arsip dapat diakses kapan saja jika diperlukan.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validasi Sistem:</strong> Sistem akan memvalidasi file sebelum upload. Pastikan file valid untuk menghindari error saat upload.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses:</strong> Guru, Wali Kelas, dan Administrator dapat mengelola kumpulan rapor. Guru hanya dapat mengelola rapor untuk kelas yang mereka ampu.</div>
        </div>
    </div>`
};
