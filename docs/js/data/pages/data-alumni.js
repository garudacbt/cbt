if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['data-alumni'] = {
    title: 'Data Alumni',
    desc: 'Panduan lengkap mengelola data alumni sekolah di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-users"></i> Data Alumni</h2>
        <p>Data Alumni digunakan untuk mengelola informasi dan data siswa yang telah lulus dari sekolah. Fitur ini memungkinkan sekolah untuk menyimpan, mengedit, menghapus, dan mengekspor data alumni untuk keperluan jejak pendidikan dan networking.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Data Alumni</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik <code class="inline">Data Alumni</code></li>
            <li>Halaman Data Alumni akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Data alumni penting untuk jejak pendidikan dan networking. Pastikan data selalu diperbarui dan terlengkapi.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Data Alumni</h3>
        <ol class="step-list">
            <li>Pada halaman Data Alumni, klik tombol <code class="inline">Tambah Alumni</code></li>
            <li>Isi data alumni:
                <ul class="step-list">
                    <li><strong>Nama Lengkap:</strong> Nama alumni</li>
                    <li><strong>NISN:</strong> Nomor induk siswa nasional</li>
                    <li><strong>Tahun Lulus:</strong> Tahun kelulusan</li>
                    <li><strong>Jurusan:</strong> Jurusan saat sekolah</li>
                    <li><strong>Universitas:</strong> Universitas yang dituju</li>
                    <li><strong>No. HP:</strong> Nomor telepon</li>
                    <li><strong>Email:</strong> Alamat email</li>
                    <li><strong>Alamat:</strong> Alamat saat ini</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Data alumni akan tersimpan</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Data alumni dapat diimport dari data siswa yang lulus. Gunakan fitur import untuk menghemat waktu input.</div>
        </div>
        <hr>
        <h3>🠊 Edit Data Alumni</h3>
        <ol class="step-list">
            <li>Pada halaman Data Alumni, daftar alumni akan ditampilkan</li>
            <li>Klik tombol <code class="inline">Edit</code> pada alumni yang akan diubah</li>
            <li>Ubah data sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Data alumni akan diperbarui</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Update data alumni secara berkala untuk menjaga akurasi informasi networking dan jejak pendidikan.</div>
        </div>
        <hr>
        <h3>🠊 Hapus Data Alumni</h3>
        <ol class="step-list">
            <li>Pada halaman Data Alumni, daftar alumni akan ditampilkan</li>
            <li>Klik tombol <code class="inline">Hapus</code> pada alumni yang akan dihapus</li>
            <li>Konfirmasi penghapusan</li>
            <li>Data alumni akan dihapus dari sistem</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Penghapusan tidak dapat dibatalkan</li>
                    <li>Pastikan untuk backup sebelum menghapus</li>
                    <li>Hapus hanya jika data tidak diperlukan lagi</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Export Data Alumni</h3>
        <ol class="step-list">
            <li>Pada halaman Data Alumni, klik tombol <code class="inline">Export</code></li>
            <li>Pilih format export (Excel/CSV)</li>
            <li>Pilih filter jika diperlukan (tahun lulus, jurusan)</li>
            <li>Klik tombol <code class="inline">Download</code></li>
            <li>File akan didownload ke komputer</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Export data alumni untuk backup atau untuk keperluan analisis dan laporan sekolah.</div>
        </div>
        <hr>
        <h3>🠊 Filter dan Pencarian</h3>
        <ol class="step-list">
            <li>Pada halaman Data Alumni, gunakan fitur filter:
                <ul class="step-list">
                    <li><strong>Tahun Lulus:</strong> Filter berdasarkan tahun kelulusan</li>
                    <li><strong>Jurusan:</strong> Filter berdasarkan jurusan</li>
                    <li><strong>Universitas:</strong> Filter berdasarkan universitas</li>
                </ul>
            </li>
            <li>Gunakan fitur pencarian untuk mencari alumni berdasarkan nama atau NISN</li>
            <li>Hasil akan ditampilkan secara real-time</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan filter dan pencarian untuk menemukan alumni dengan cepat, terutama untuk database yang besar.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Data Alumni</h3>
        <ul class="step-list">
            <li><strong>Wajib:</strong> Nama lengkap dan tahun lulus adalah field wajib</li>
            <li><strong>Validasi:</strong> Sistem akan memvalidasi data sebelum disimpan</li>
            <li><strong>Unik:</strong> NISN harus unik untuk setiap alumni</li>
            <li><strong>Export:</strong> Data dapat diekspor ke Excel/CSV</li>
            <li><strong>Dokumentasi:</strong> Semua aktivitas terdokumentasi</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan data yang diinput akurat dan valid</li>
                    <li>Backup data sebelum menghapus</li>
                    <li>Review data sebelum export</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Update:</strong> Update data alumni secara berkala</li>
            <li><strong>Backup:</strong> Backup data alumni secara berkala</li>
            <li><strong>Export:</strong> Export data untuk backup dan analisis</li>
            <li><strong>Filter:</strong> Gunakan filter untuk pencarian cepat</li>
            <li><strong>Konsisten:</strong> Jaga konsistensi format data</li>
            <li><strong>Networking:</strong> Gunakan data untuk networking alumni</li>
            <li><strong>Jejak Pendidikan:</strong> Gunakan data untuk jejak pendidikan</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data alumni</li>
            <li><strong>Validasi:</strong> Validasi data sebelum menyimpan</li>
            <li><strong>Organisasi:</strong> Organisasi data berdasarkan tahun lulus</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Data tidak tersimpan:</strong>
                <span>Pastikan semua field wajib diisi. Periksa apakah ada error validasi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>NISN duplikat:</strong>
                <span>Pastikan NISN unik untuk setiap alumni. Periksa data alumni lain dengan NISN yang sama. Gunakan NISN yang berbeda.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Export gagal:</strong>
                <span>Pastikan browser mengizinkan download. Periksa koneksi internet. Coba gunakan browser lain.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Filter tidak berfungsi:</strong>
                <span>Pastikan filter diatur dengan benar. Refresh halaman dan coba lagi. Periksa apakah data sesuai kriteria filter.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa edit:</strong>
                <span>Pastikan Anda memiliki izin untuk edit. Periksa apakah data sedang digunakan. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Networking:</strong> Data alumni penting untuk networking dan komunikasi antar alumni. Gunakan data untuk menghubungkan alumni dengan sekolah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Jejak Pendidikan:</strong> Data alumni berguna untuk jejak pendidikan dan pelacakan karir alumni. Ini dapat digunakan untuk evaluasi kualitas pendidikan sekolah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validasi Sistem:</strong> Sistem akan memvalidasi data sebelum menyimpan. Pastikan data valid untuk menghindari error saat input.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Terbatas:</strong> Menu Data Alumni hanya dapat diakses oleh Administrator. Guru dan Wali Kelas tidak memiliki akses ke menu ini.</div>
        </div>
    </div>`
};
