if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['catatan-rapor'] = {
    title: 'Catatan Rapor',
    desc: 'Panduan lengkap mengatur format catatan dalam rapor di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-sticky-note"></i> Catatan Rapor</h2>
        <p>Catatan Rapor mengatur format dan jenis catatan yang akan ditampilkan dalam rapor siswa. Catatan ini mencakup catatan wali kelas, guru mapel, kepala sekolah, dan tanggapan orang tua.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Catatan Rapor</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Pengaturan Rapor</code></li>
            <li>Klik <code class="inline">Catatan Rapor</code></li>
            <li>Halaman Catatan Rapor akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Catatan Rapor hanya dapat diakses oleh Administrator. Pastikan format catatan sesuai dengan kebutuhan sekolah sebelum mencetak rapor.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur Catatan Rapor</h3>
        <ol class="step-list">
            <li>Pada halaman Catatan Rapor, pilih jenis catatan yang akan diaktifkan:
                <ul class="step-list">
                    <li><strong>Catatan Wali Kelas:</strong> Catatan perkembangan siswa</li>
                    <li><strong>Catatan Guru Mapel:</strong> Catatan per mata pelajaran</li>
                    <li><strong>Catatan Kepala Sekolah:</strong> Catatan formal sekolah</li>
                    <li><strong>Catatan Orang Tua:</strong> Tanggapan orang tua</li>
                </ul>
            </li>
            <li>Atur format catatan:
                <ul class="step-list">
                    <li><strong>Maksimal Karakter:</strong> Batas panjang catatan</li>
                    <li><strong>Wajib Diisi:</strong> Apakah catatan wajib diisi</li>
                    <li><strong>Template:</strong> Format bawaan untuk catatan</li>
                    <li><strong>Posisi:</strong> Posisi catatan di rapor</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Pengaturan akan diterapkan ke seluruh sistem</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Catatan rapor sebaiknya berisi informasi yang bermanfaat bagi orang tua dan siswa untuk perkembangan selanjutnya.</div>
        </div>
        <hr>
        <h3>🠊 Input Catatan</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Rapor > Input Nilai</code></li>
            <li>Pilih jenis catatan yang akan diinput:
                <ul class="step-list">
                    <li><strong>Catatan Wali Kelas:</strong> Untuk wali kelas</li>
                    <li><strong>Catatan Guru Mapel:</strong> Untuk guru mapel</li>
                </ul>
            </li>
            <li>Pilih tahun ajaran, semester, dan kelas</li>
            <li>Pilih siswa</li>
            <li>Input catatan untuk setiap siswa</li>
            <li>Gunakan bahasa yang jelas dan konstruktif</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan bahasa yang positif dan membangun. Berikan pujian untuk pencapaian siswa dan saran perbaikan dengan cara yang baik.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Catatan</h3>
        <ul class="step-list">
            <li><strong>Global:</strong> Format catatan berlaku untuk seluruh kelas</li>
            <li><strong>Per Jenis:</strong> Setiap jenis catatan dapat memiliki format berbeda</li>
            <li><strong>Batas Karakter:</strong> Batas karakter untuk mengontrol panjang catatan</li>
            <li><strong>Wajib:</strong> Catatan dapat diatur sebagai wajib atau opsional</li>
            <li><strong>Template:</strong> Template dapat digunakan untuk konsistensi</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Perubahan format akan mempengaruhi semua rapor</li>
                    <li>Pastikan batas karakter sesuai kebutuhan</li>
                    <li>Review catatan sebelum mencetak rapor</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Konstruktif:</strong> Gunakan bahasa yang positif dan membangun</li>
            <li><strong>Jelas:</strong> Gunakan bahasa yang jelas dan mudah dipahami</li>
            <li><strong>Spesifik:</strong> Berikan catatan yang spesifik untuk setiap siswa</li>
            <li><strong>Pujian:</strong> Berikan pujian untuk pencapaian siswa</li>
            <li><strong>Saran:</strong> Sampaikan saran perbaikan dengan cara yang baik</li>
            <li><strong>Fokus:</strong> Fokus pada perkembangan dan potensi siswa</li>
            <li><strong>Hindari:</strong> Hindari bahasa yang menyinggung atau merendahkan</li>
            <li><strong>Konsisten:</strong> Jaga konsistensi format catatan</li>
            <li><strong>Review:</strong> Review catatan sebelum mencetak</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data siswa</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Catatan tidak tersimpan:</strong>
                <span>Pastikan catatan diisi dengan benar. Periksa apakah melebihi batas karakter. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Format tidak sesuai:</strong>
                <span>Pastikan format catatan sudah diatur dengan benar. Periksa setting catatan. Atur ulang jika diperlukan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul:</strong>
                <span>Pastikan siswa terdaftar di kelas. Periksa data siswa. Refresh halaman dan coba lagi.</span>
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
                <strong>Template tidak berfungsi:</strong>
                <span>Pastikan template sudah diatur dengan benar. Periksa format template. Atur ulang jika diperlukan.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Komunikasi:</strong> Catatan rapor menjadi bahan komunikasi penting antara sekolah dan orang tua. Pastikan catatan informatif dan bermanfaat.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Batas Karakter:</strong> Batas karakter membantu mengontrol panjang catatan. Sesuaikan dengan kebutuhan dan ruang di rapor.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Wajib vs Opsional:</strong> Catatan dapat diatur sebagai wajib atau opsional. Catatan wajib harus diisi sebelum rapor dapat dicetak.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Terbatas:</strong> Menu Catatan Rapor hanya dapat diakses oleh Administrator. Guru dapat menginput catatan sesuai dengan peran mereka.</div>
        </div>
    </div>`
};
