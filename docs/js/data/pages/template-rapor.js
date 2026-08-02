if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['template-rapor'] = {
    title: 'Template Rapor',
    desc: 'Panduan lengkap mengatur tampilan dan format cetakan rapor di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-file-alt"></i> Template Rapor</h2>
        <p>Template Rapor mengatur tampilan, format, dan informasi yang akan dicetak pada rapor siswa. Pengaturan template yang tepat memastikan rapor sesuai dengan standar dinas pendidikan dan kebutuhan sekolah.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Template Rapor</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Pengaturan Rapor</code></li>
            <li>Klik <code class="inline">Template Rapor</code></li>
            <li>Halaman Template Rapor akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Template Rapor hanya dapat diakses oleh Administrator. Pastikan format sesuai dengan ketentuan dinas pendidikan sebelum mencetak.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur Template Rapor</h3>
        <ol class="step-list">
            <li>Pada halaman Template Rapor, pilih template yang akan digunakan:
                <ul class="step-list">
                    <li><strong>Template Standar:</strong> Format rapor sesuai kurikulum</li>
                    <li><strong>Template Kustom:</strong> Format rapor yang dapat disesuaikan</li>
                </ul>
            </li>
            <li>Atur elemen yang akan ditampilkan:
                <ul class="step-list">
                    <li><strong>Header Sekolah:</strong> Logo, nama, alamat sekolah</li>
                    <li><strong>Informasi Siswa:</strong> Nama, NISN, kelas, semester</li>
                    <li><strong>Nilai Akademik:</strong> Nilai pengetahuan dan keterampilan</li>
                    <li><strong>Nilai Sikap:</strong> Penilaian sikap spiritual dan sosial</li>
                    <li><strong>Ekstrakurikuler:</strong> Kegiatan ekstrakurikuler</li>
                    <li><strong>Catatan:</strong> Catatan wali kelas dan kepala sekolah</li>
                    <li><strong>Kehadiran:</strong> Data kehadiran siswa</li>
                </ul>
            </li>
            <li>Upload logo sekolah (jika diperlukan)</li>
            <li>Atur tanda tangan digital (jika diperlukan)</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Template akan diterapkan untuk semua rapor</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Template rapor dapat dikustomisasi sesuai kebutuhan sekolah. Pastikan format sesuai dengan ketentuan dinas pendidikan.</div>
        </div>
        <hr>
        <h3>🠊 Upload Logo Sekolah</h3>
        <ol class="step-list">
            <li>Pada halaman Template Rapor, klik tombol <code class="inline">Upload Logo</code></li>
            <li>Pilih file logo sekolah (format: PNG, JPG, max 2MB)</li>
            <li>Atur ukuran dan posisi logo</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Logo akan ditampilkan di header rapor</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan logo dengan resolusi tinggi untuk hasil cetak yang baik. Format PNG direkomendasikan untuk background transparan.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Template</h3>
        <ul class="step-list">
            <li><strong>Global:</strong> Template berlaku untuk seluruh kelas</li>
            <li><strong>Standar:</strong> Sesuaikan dengan standar dinas pendidikan</li>
            <li><strong>Kurikulum:</strong> Format berbeda untuk tiap kurikulum</li>
            <li><strong>Preview:</strong> Preview tersedia sebelum dicetak</li>
            <li><strong>Reversibel:</strong> Template dapat diubah kapan saja</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Perubahan template akan mempengaruhi semua rapor</li>
                    <li>Pastikan format sesuai standar dinas pendidikan</li>
                    <li>Test cetak sebelum mencetak massal</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Standar:</strong> Sesuaikan dengan standar dinas pendidikan</li>
            <li><strong>Testing:</strong> Test cetak sebelum mencetak massal</li>
            <li><strong>Konsisten:</strong> Jaga konsistensi format antar semester</li>
            <li><strong>Backup:</strong> Backup template sebelum mengubah</li>
            <li><strong>Review:</strong> Review template secara berkala</li>
            <li><strong>Konsultasi:</strong> Konsultasikan dengan dinas pendidikan jika perlu</li>
            <li><strong>Logo:</strong> Gunakan logo berkualitas tinggi</li>
            <li><strong>Tanda Tangan:</strong> Siapkan tanda tangan digital</li>
            <li><strong>Preview:</strong> Selalu preview sebelum mencetak</li>
            <li><strong>Keamanan:</strong> Batasi akses ke Administrator saja</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Logo tidak muncul:</strong>
                <span>Pastikan file logo berhasil diupload. Periksa format dan ukuran file. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Template tidak tersimpan:</strong>
                <span>Pastikan semua field diisi dengan benar. Periksa apakah ada error validasi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Cetak tidak sesuai:</strong>
                <span>Pastikan template sudah disimpan dengan benar. Preview template sebelum mencetak. Atur ulang jika diperlukan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Upload gagal:</strong>
                <span>Pastikan file dalam format yang benar (PNG/JPG). Pastikan ukuran file < 2MB. Periksa koneksi internet.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa edit:</strong>
                <span>Pastikan Anda memiliki izin untuk edit template. Periksa apakah rapor sudah dicetak. Template mungkin dikunci setelah cetak.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Standar Dinas:</strong> Template rapor harus sesuai dengan standar dinas pendidikan setempat. Pastikan format memenuhi persyaratan sebelum mencetak.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Kurikulum:</strong> Format rapor berbeda untuk setiap kurikulum. Pilih template yang sesuai dengan kurikulum yang digunakan sekolah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Preview:</strong> Selalu gunakan fitur preview sebelum mencetak massal. Ini akan membantu mengidentifikasi error sebelum cetak.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Terbatas:</strong> Menu Template Rapor hanya dapat diakses oleh Administrator. Guru tidak dapat mengubah template rapor.</div>
        </div>
    </div>`
};
