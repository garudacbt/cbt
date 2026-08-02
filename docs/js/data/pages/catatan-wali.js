if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['catatan-wali'] = {
    title: 'Catatan Wali Kelas',
    desc: 'Panduan lengkap input catatan wali kelas untuk rapor di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-user-tie"></i> Catatan Wali Kelas</h2>
        <p>Catatan Wali Kelas adalah catatan yang dibuat oleh wali kelas mengenai perkembangan siswa selama satu semester. Catatan ini mencakup perkembangan akademik, sikap, kehadiran, dan saran untuk perbaikan.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Catatan Wali Kelas</h3>
        <ol class="step-list">
            <li>Login sebagai Wali Kelas atau Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Input Nilai</code></li>
            <li>Klik <code class="inline">Catatan Wali Kelas</code></li>
            <li>Halaman Catatan Wali Kelas akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Wali Kelas hanya dapat menginput catatan untuk kelas yang mereka ampu. Administrator dapat menginput catatan untuk semua kelas.</div>
        </div>
        <hr>
        <h3>🠊 Melakukan Input Catatan</h3>
        <ol class="step-list">
            <li>Pada halaman Catatan Wali Kelas, pilih tahun ajaran dan semester</li>
            <li>Pilih kelas</li>
            <li>Daftar siswa akan ditampilkan</li>
            <li>Input catatan untuk setiap siswa:
                <ul class="step-list">
                    <li><strong>Perkembangan Akademik:</strong> Catatan tentang prestasi dan kemajuan akademik</li>
                    <li><strong>Perkembangan Sikap:</strong> Catatan tentang sikap dan perilaku siswa</li>
                    <li><strong>Kehadiran:</strong> Catatan tentang kehadiran siswa</li>
                    <li><strong>Saran Perbaikan:</strong> Saran untuk perbaikan di semester berikutnya</li>
                    <li><strong>Prestasi:</strong> Catatan tentang prestasi yang dicapai</li>
                </ul>
            </li>
            <li>Gunakan bahasa yang jelas, positif, dan konstruktif</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Catatan akan tersimpan dan ditampilkan di rapor</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan bahasa yang positif dan membangun. Berikan pujian untuk pencapaian siswa dan saran perbaikan dengan cara yang baik.</div>
        </div>
        <hr>
        <h3>🠊 Komponen Catatan Wali Kelas</h3>
        <ul class="step-list">
            <li><strong>Perkembangan Akademik:</strong> Prestasi dan kemajuan dalam mata pelajaran</li>
            <li><strong>Perkembangan Sikap:</strong> Perilaku dan sikap di sekolah</li>
            <li><strong>Kehadiran:</strong> Data kehadiran dan ketidakhadiran</li>
            <li><strong>Saran Perbaikan:</strong> Rekomendasi untuk semester berikutnya</li>
            <li><strong>Prestasi:</strong> Penghargaan dan pencapaian khusus</li>
            <li><strong>Kondisi Khusus:</strong> Catatan tentang kondisi khusus siswa (jika ada)</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Batas Karakter:</strong> Pastikan catatan tidak melebihi batas karakter yang ditentukan. Gunakan bahasa yang ringkas namun informatif.</div>
        </div>
        <hr>
        <h3>🠊 Edit dan Hapus Catatan</h3>
        <ol class="step-list">
            <li>Pada halaman Catatan Wali Kelas, catatan yang sudah ada akan ditampilkan</li>
            <li>Ubah catatan sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Catatan akan diperbarui</li>
            <li>Untuk menghapus, klik tombol <code class="inline">Reset</code></li>
            <li>Konfirmasi reset catatan</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Reset catatan akan menghapus semua catatan untuk siswa tersebut</li>
                    <li>Pastikan untuk backup data sebelum reset</li>
                    <li>Review perubahan sebelum menyimpan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Catatan Wali Kelas</h3>
        <ul class="step-list">
            <li><strong>Per Kelas:</strong> Catatan diatur per kelas</li>
            <li><strong>Per Semester:</strong> Catatan diatur per tahun ajaran dan semester</li>
            <li><strong>Batas Karakter:</strong> Batas karakter untuk mengontrol panjang catatan</li>
            <li><strong>Wajib:</strong> Catatan dapat diatur sebagai wajib atau opsional</li>
            <li><strong>Dokumentasi:</strong> Semua catatan terdokumentasi di rapor</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan catatan diinput dengan benar dan akurat</li>
                    <li>Review catatan sebelum rapor dicetak</li>
                    <li>Komunikasikan catatan kepada orang tua</li>
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
                <strong>Kelas tidak muncul:</strong>
                <span>Pastikan Anda terdaftar sebagai wali kelas untuk kelas tersebut. Periksa data wali kelas. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Batas karakter terlampaui:</strong>
                <span>Pastikan catatan tidak melebihi batas karakter yang ditentukan. Singkatkan catatan atau gunakan bahasa yang lebih ringkas.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Komunikasi:</strong> Catatan wali kelas menjadi bahan komunikasi penting antara sekolah dan orang tua. Pastikan catatan informatif dan bermanfaat.</div>
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
                <strong>Akses Wali Kelas:</strong> Wali Kelas hanya dapat menginput catatan untuk kelas yang mereka ampu. Administrator dapat menginput catatan untuk semua kelas.</div>
        </div>
    </div>`
};
