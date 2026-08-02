if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['setting-rapor'] = {
    title: 'Setting Rapor',
    desc: 'Panduan lengkap pengaturan umum sistem rapor di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-cogs"></i> Setting Rapor</h2>
        <p>Setting Rapor mengatur parameter umum untuk sistem penilaian dan pencetakan rapor. Pengaturan ini mencakup format rapor, bobot penilaian, dan konfigurasi lain yang berlaku untuk seluruh kelas.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Setting Rapor</h3>
        <hr>
        <h3>🠊 Mengakses Menu Setting Rapor</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Pengaturan Rapor</code></li>
            <li>Klik <code class="inline">Setting Rapor</code></li>
            <li>Halaman Setting Rapor akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Setting Rapor hanya dapat diakses oleh Administrator. Pastikan pengaturan disesuaikan dengan kebijakan sekolah dan kurikulum yang digunakan.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur Parameter Rapor</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Pengaturan Rapor</code></li>
            <li>Klik <code class="inline">Setting Rapor</code></li>
            <li>Halaman Setting Rapor akan ditampilkan dengan form konfigurasi</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Setting rapor berlaku untuk seluruh kelas. Pastikan bobot penilaian sesuai dengan kurikulum yang digunakan sebelum mulai input nilai.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur Parameter Rapor</h3>
        <ol class="step-list">
            <li>Pada halaman Setting Rapor, isi form konfigurasi:
                <ul class="step-list">
                    <li><strong>Format Rapor:</strong> Pilih format rapor yang digunakan (Standar/Kurikulum Merdeka/Kustom)</li>
                    <li><strong>Bobot Pengetahuan:</strong> Persentase bobot nilai pengetahuan (default 60%)</li>
                    <li><strong>Bobot Keterampilan:</strong> Persentase bobot nilai keterampilan (default 40%)</li>
                    <li><strong>Bobot Tugas:</strong> Persentase bobot nilai tugas (opsional)</li>
                    <li><strong>Bobot UTS:</strong> Persentase bobot nilai UTS (opsional)</li>
                    <li><strong>Bobot UAS:</strong> Persentase bobot nilai UAS (opsional)</li>
                    <li><strong>Nilai Minimal:</strong> Nilai minimal untuk lulus (default 70)</li>
                    <li><strong>Format Tanggal:</strong> Format tanggal yang digunakan di rapor</li>
            <li>Pada halaman Setting Rapor, atur parameter berikut:
                <ul class="step-list">
                    <li><strong>Format Rapor:</strong> Pilih format rapor yang digunakan (Standar/Kurikulum Merdeka/Kustom)</li>
                    <li><strong>Bobot Pengetahuan:</strong> Persentase bobot nilai pengetahuan (default: 60%)</li>
                    <li><strong>Bobot Keterampilan:</strong> Persentase bobot nilai keterampilan (default: 40%)</li>
                    <li><strong>Bobot Tugas:</strong> Persentase bobot nilai tugas (default: 20%)</li>
                    <li><strong>Bobot UTS:</strong> Persentase bobot nilai tengah semester (default: 20%)</li>
                    <li><strong>Bobot UAS:</strong> Persentase bobot nilai akhir semester (default: 40%)</li>
                </ul>
            </li>
            <li>Pastikan total bobot = 100%</li>
            <li>Atur format tanggal rapor</li>
            <li>Atur format nilai (desimal/bulat)</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Pengaturan akan diterapkan ke seluruh sistem</li>
            <li>Periksa ringkasan konfigurasi yang ditampilkan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Setting rapor akan disimpan dan berlaku untuk seluruh kelas</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Pastikan total bobot penilaian (Pengetahuan + Keterampilan + Tugas + UTS + UAS) sama dengan 100%. Jika tidak, sistem akan memberikan peringatan.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Parameter Setting</h3>
        <ol class="step-list">
            <li><strong>Format Rapor:</strong> Menentukan tampilan dan struktur rapor yang dicetak</li>
            <li><strong>Bobot Pengetahuan:</strong> Persentase kontribusi nilai pengetahuan ke nilai akhir</li>
            <li><strong>Bobot Keterampilan:</strong> Persentase kontribusi nilai keterampilan ke nilai akhir</li>
            <li><strong>Bobot Tugas:</strong> Persentase kontribusi nilai tugas ke nilai akhir</li>
            <li><strong>Bobot UTS:</strong> Persentase kontribusi nilai UTS ke nilai akhir</li>
            <li><strong>Bobot UAS:</strong> Persentase kontribusi nilai UAS ke nilai akhir</li>
            <li><strong>Nilai Minimal:</strong> Nilai minimal untuk dinyatakan lulus</li>
            <li><strong>Format Tanggal:</strong> Format tampilan tanggal di rapor</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Perubahan setting rapor akan mempengaruhi perhitungan nilai</li>
                    <li>Pastikan untuk mengkomunikasikan perubahan kepada guru</li>
                    <li>Setting rapor yang sudah digunakan untuk nilai tidak dapat diubah</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Sesuaikan kurikulum:</strong> Sesuaikan setting dengan kurikulum yang digunakan</li>
            <li><strong>Total bobot 100%:</strong> Pastikan total bobot sama dengan 100%</li>
            <li><strong>Konsistensi:</strong> Gunakan setting yang konsisten untuk seluruh kelas</li>
            <li><strong>Komunikasi:</strong> Komunikasikan setting kepada guru sebelum input nilai</li>
            <li><strong>Review:</strong> Review setting sebelum menyimpan</li>
            <li><strong>Backup:</strong> Catat setting sebelum mengubah untuk referensi</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan kebijakan penilaian untuk referensi</li>
            <li><strong>Testing:</strong> Coba uji coba setting sebelum implementasi penuh</li>
            <li><strong>Update berkala:</strong> Review dan update setting secara berkala</li>
            <li><strong>Sesuaikan kebutuhan:</strong> Sesuaikan dengan kebutuhan sekolah dan kurikulum</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Pastikan total bobot penilaian sama dengan 100%. Perubahan bobot akan mempengaruhi perhitungan nilai akhir siswa.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Setting Rapor</h3>
        <ul class="step-list">
            <li><strong>Global:</strong> Setting berlaku untuk seluruh kelas dan mapel</li>
            <li><strong>Kurikulum:</strong> Sesuaikan dengan kurikulum yang digunakan sekolah</li>
            <li><strong>Total Bobot:</strong> Total bobot harus sama dengan 100%</li>
            <li><strong>Validasi:</strong> Sistem akan memvalidasi pengaturan sebelum disimpan</li>
            <li><strong>Reversibel:</strong> Pengaturan dapat diubah kapan saja</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Perubahan setting akan mempengaruhi perhitungan nilai</li>
                    <li>Informasikan perubahan kepada semua guru</li>
                    <li>Backup data sebelum mengubah pengaturan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Konsultasi:</strong> Konsultasikan dengan tim kurikulum sebelum mengubah</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan setiap perubahan pengaturan</li>
            <li><strong>Komunikasi:</strong> Informasikan perubahan kepada semua guru</li>
            <li><strong>Testing:</strong> Uji coba pengaturan sebelum diterapkan</li>
            <li><strong>Backup:</strong> Backup data sebelum perubahan besar</li>
            <li><strong>Review:</strong> Review pengaturan secara berkala</li>
            <li><strong>Konsistensi:</strong> Jaga konsistensi dengan kebijakan sekolah</li>
            <li><strong>Validasi:</strong> Validasi pengaturan sebelum menyimpan</li>
            <li><strong>Monitoring:</strong> Monitor dampak perubahan pada nilai</li>
            <li><strong>Keamanan:</strong> Batasi akses ke Administrator saja</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Total bobot tidak 100%:</strong>
                <span>Atur ulang bobot agar totalnya 100%. Sistem akan memberikan peringatan jika total tidak sesuai.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Pengaturan tidak tersimpan:</strong>
                <span>Pastikan semua field diisi dengan benar. Periksa apakah ada error validasi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tidak sesuai setelah perubahan:</strong>
                <span>Perubahan bobot akan mempengaruhi nilai akhir. Rehit nilai atau kembalikan ke pengaturan sebelumnya jika diperlukan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengakses menu:</strong>
                <span>Pastikan login sebagai Administrator. Menu Setting Rapor hanya dapat diakses oleh Administrator.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Format tidak sesuai:</strong>
                <span>Pilih format rapor yang sesuai dengan kurikulum sekolah. Format yang salah dapat menyebabkan tampilan rapor tidak optimal.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Total bobot tidak 100%:</strong>
                <span>Pastikan total bobot penilaian sama dengan 100%. Sesuaikan bobot masing-masing komponen agar totalnya 100%.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengubah setting:</strong>
                <span>Setting rapor yang sudah digunakan untuk nilai tidak dapat diubah. Hubungi administrator jika perlu perubahan setting.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Format rapor tidak sesuai:</strong>
                <span>Pilih format rapor yang sesuai dengan kurikulum yang digunakan. Format yang salah akan menyebabkan tampilan rapor tidak sesuai.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tidak terhitung:</strong>
                <span>Pastikan bobot penilaian sudah diatur dengan benar. Periksa apakah komponen penilaian yang digunakan memiliki bobot > 0%.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Setting tidak tersimpan:</strong>
                <span>Pastikan semua field sudah diisi dengan benar. Periksa koneksi internet saat menyimpan. Coba lagi atau hubungi administrator.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Global Setting:</strong> Setting Rapor berlaku secara global untuk seluruh kelas dan mata pelajaran. Pastikan pengaturan sesuai dengan kebutuhan semua jenjang.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Kurikulum:</strong> Format dan bobot penilaian harus sesuai dengan kurikulum yang digunakan (Kurikulum 2013, Kurikulum Merdeka, atau kustom).</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Dampak Perubahan:</strong> Perubahan setting akan mempengaruhi perhitungan nilai akhir. Pertimbangkan dampaknya sebelum mengubah pengaturan.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Terbatas:</strong> Menu Setting Rapor hanya dapat diakses oleh Administrator. Guru tidak dapat mengubah pengaturan global ini.</div>
            <div>
                <strong>Data per tahun pelajaran:</strong> Setting rapor dibuat per tahun pelajaran dan semester. Data di tahun pelajaran berbeda adalah data yang terpisah.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan Nilai:</strong> Setting rapor menjadi dasar untuk perhitungan nilai. Perubahan Setting rapor akan mempengaruhi semua nilai yang dihitung.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Administrator:</strong> Hanya Administrator yang dapatakses dan mengubah Setting rapor. Guru tidak memiliki akses ke menu ini.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Integrasi dengan Predikat:</strong> Setting rapor digunakan bersama dengan setting Predikat untuk menentukan nilai huruf di rapor.
            </div>
        </div>
    </div>`
};
