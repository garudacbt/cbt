if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['aturan-penilaian'] = {
    title: 'Aturan Penilaian',
    desc: 'Panduan lengkap mengatur aturan dan kriteria penilaian siswa di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-gavel"></i> Aturan Penilaian</h2>
        <p>Aturan Penilaian menentukan kriteria dan standar yang digunakan dalam penilaian siswa. Pengaturan aturan yang tepat memastikan penilaian yang objektif, konsisten, dan sesuai dengan kebijakan sekolah.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Aturan Penilaian</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Pengaturan Rapor</code></li>
            <li>Klik <code class="inline">Aturan Penilaian</code></li>
            <li>Halaman Aturan Penilaian akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Aturan Penilaian hanya dapat diakses oleh Administrator. Pastikan aturan disesuaikan dengan kebijakan sekolah dan standar kurikulum.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur Kriteria Penilaian</h3>
        <ol class="step-list">
            <li>Pada halaman Aturan Penilaian, atur kriteria penilaian:
                <ul class="step-list">
                    <li><strong>Jumlah Penilaian Minimum:</strong> Minimal jumlah ulangan per mapel</li>
                    <li><strong>Batas Nilai Maksimal:</strong> Nilai tertinggi yang dapat diberikan (default: 100)</li>
                    <li><strong>Batas Nilai Minimal:</strong> Nilai terendah yang dapat diberikan (default: 0)</li>
                    <li><strong>Aturan Pembulatan:</strong> Cara pembulatan nilai (0.5 ke atas, ke bawah, atau terdekat)</li>
                    <li><strong>Aturan Remedial:</strong> Ketentuan untuk remedial (nilai < KKM, nilai < 70, dll)</li>
                </ul>
            </li>
            <li>Atur aturan kehadiran:
                <ul class="step-list">
                    <li><strong>Batas Izin:</strong> Maksimal hari izin yang diperbolehkan</li>
                    <li><strong>Batas Sakit:</strong> Maksimal hari sakit yang diperbolehkan</li>
                    <li><strong>Batas Alpha:</strong> Maksimal hari tanpa keterangan yang diperbolehkan</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Aturan akan diterapkan ke seluruh sistem</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Aturan penilaian yang baik akan membantu guru dalam memberikan penilaian yang objektif dan konsisten.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Penilaian</h3>
        <ul class="step-list">
            <li><strong>Global:</strong> Aturan berlaku untuk seluruh mapel</li>
            <li><strong>Kebijakan:</strong> Dapat disesuaikan dengan kebijakan sekolah</li>
            <li><strong>Reversibel:</strong> Perubahan berlaku untuk penilaian yang belum selesai</li>
            <li><strong>Validasi:</strong> Sistem akan memvalidasi aturan sebelum disimpan</li>
            <li><strong>Dokumentasi:</strong> Catat perubahan aturan untuk dokumentasi</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Perubahan aturan akan mempengaruhi penilaian</li>
                    <li>Informasikan perubahan kepada semua guru</li>
                    <li>Backup data sebelum mengubah aturan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Edit Aturan Penilaian</h3>
        <ol class="step-list">
            <li>Pada halaman Aturan Penilaian, atur akan ditampilkan</li>
            <li>Ubah aturan sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Aturan akan diperbarui</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Edit aturan hanya jika ada perubahan kebijakan sekolah atau standar kurikulum. Catat alasan perubahan untuk dokumentasi.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Konsultasi:</strong> Konsultasikan dengan tim kurikulum sebelum mengubah</li>
            <li><strong>Standar:</strong> Sesuaikan dengan standar kurikulum yang digunakan</li>
            <li><strong>Konsisten:</strong> Jaga konsistensi aturan antar semester</li>
            <li><strong>Komunikasi:</strong> Informasikan aturan kepada guru dan siswa</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan alasan penentuan aturan</li>
            <li><strong>Review:</strong> Review aturan secara berkala</li>
            <li><strong>Validasi:</strong> Validasi aturan sebelum menyimpan</li>
            <li><strong>Monitoring:</strong> Monitor dampak perubahan pada nilai</li>
            <li><strong>Backup:</strong> Backup data sebelum perubahan besar</li>
            <li><strong>Keamanan:</strong> Batasi akses ke Administrator saja</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Aturan tidak tersimpan:</strong>
                <span>Pastikan semua field diisi dengan benar. Periksa apakah ada error validasi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tidak sesuai setelah perubahan:</strong>
                <span>Perubahan aturan pembulatan akan mempengaruhi nilai. Rehit nilai atau kembalikan ke aturan sebelumnya jika diperlukan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Remedial tidak berjalan:</strong>
                <span>Pastikan aturan remedial sudah diatur dengan benar. Periksa nilai siswa terhadap KKM. Atur ulang jika diperlukan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa edit:</strong>
                <span>Pastikan Anda memiliki izin untuk edit aturan. Periksa apakah penilaian sudah selesai. Aturan mungkin dikunci setelah penilaian selesai.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai di luar range:</strong>
                <span>Pastikan batas nilai maksimal dan minimal sudah diatur dengan benar. Nilai harus dalam range 0-100.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Standar Kurikulum:</strong> Aturan penilaian harus sesuai dengan standar kurikulum yang digunakan. Kurikulum 2013 dan Kurikulum Merdeka memiliki standar yang berbeda.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Dampak Perubahan:</strong> Perubahan aturan akan mempengaruhi perhitungan nilai dan status ketuntasan siswa. Pertimbangkan dampaknya sebelum mengubah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validasi Sistem:</strong> Sistem akan memvalidasi aturan sebelum menyimpan. Pastikan semua aturan valid untuk menghindari error.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Terbatas:</strong> Menu Aturan Penilaian hanya dapat diakses oleh Administrator. Guru tidak dapat mengubah aturan penilaian.</div>
        </div>
    </div>`
};
