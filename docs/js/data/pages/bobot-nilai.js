if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['bobot-nilai'] = {
    title: 'Bobot Nilai',
    desc: 'Panduan lengkap mengatur bobot penilaian untuk komponen nilai rapor di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-balance-scale"></i> Bobot Nilai</h2>
        <p>Bobot nilai menentukan persentase kontribusi setiap komponen penilaian terhadap nilai akhir siswa. Pengaturan bobot yang tepat memastikan penilaian yang adil dan sesuai dengan kurikulum.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Bobot Nilai</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Pengaturan Rapor</code></li>
            <li>Klik <code class="inline">Bobot Nilai</code></li>
            <li>Halaman Bobot Nilai akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Bobot nilai harus diatur sebelum penilaian dimulai. Total bobot harus sama dengan 100% untuk perhitungan yang benar.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur Bobot Nilai</h3>
        <ol class="step-list">
            <li>Pada halaman Bobot Nilai, pilih tahun ajaran dan semester</li>
            <li>Pilih jenjang kelas (jika diperlukan)</li>
            <li>Atur bobot untuk setiap komponen:
                <ul class="step-list">
                    <li><strong>Nilai Pengetahuan:</strong> Bobot untuk nilai ulangan/harian (default: 40%)</li>
                    <li><strong>Nilai Keterampilan:</strong> Bobot untuk nilai praktik (default: 30%)</li>
                    <li><strong>Nilai Tugas:</strong> Bobot untuk nilai tugas (default: 20%)</li>
                    <li><strong>Nilai UTS:</strong> Bobot untuk nilai tengah semester (default: 20%)</li>
                    <li><strong>Nilai UAS:</strong> Bobot untuk nilai akhir semester (default: 30%)</li>
                </ul>
            </li>
            <li>Pastikan total bobot = 100%</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Bobot akan diterapkan dan digunakan dalam perhitungan nilai</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Bobot dapat disesuaikan dengan kurikulum yang digunakan. Kurikulum 2013 dan Kurikulum Merdeka memiliki standar bobot yang berbeda.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Bobot</h3>
        <ul class="step-list">
            <li><strong>Total 100%:</strong> Total bobot harus sama dengan 100%</li>
            <li><strong>Per Jenjang:</strong> Bobot dapat berbeda untuk setiap jenjang kelas</li>
            <li><strong>Per Mapel:</strong> Bobot dapat berbeda untuk setiap mata pelajaran (opsional)</li>
            <li><strong>Kurikulum:</strong> Sesuaikan dengan kurikulum yang digunakan</li>
            <li><strong>Validasi:</strong> Sistem akan memvalidasi total bobot</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Perubahan bobot akan berpengaruh pada nilai akhir</li>
                    <li>Informasikan perubahan kepada semua guru</li>
                    <li>Backup data sebelum mengubah bobot</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Edit Bobot</h3>
        <ol class="step-list">
            <li>Pada halaman Bobot Nilai, pilih tahun ajaran, semester, dan jenjang</li>
            <li>Bobot yang sudah ada akan ditampilkan</li>
            <li>Ubah bobot sesuai kebutuhan</li>
            <li>Pastikan total bobot = 100%</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Bobot akan diperbarui</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Edit bobot hanya jika ada perubahan kebijakan sekolah atau standar kurikulum. Catat alasan perubahan untuk dokumentasi.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Konsultasi:</strong> Konsultasikan dengan tim kurikulum sebelum mengubah</li>
            <li><strong>Standar:</strong> Sesuaikan dengan standar kurikulum yang digunakan</li>
            <li><strong>Konsistensi:</strong> Jaga konsistensi bobot antar semester</li>
            <li><strong>Komunikasi:</strong> Informasikan bobot kepada guru dan siswa</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan alasan penentuan bobot</li>
            <li><strong>Review:</strong> Review bobot secara berkala</li>
            <li><strong>Validasi:</strong> Validasi total bobot sebelum menyimpan</li>
            <li><strong>Monitoring:</strong> Monitor dampak perubahan pada nilai</li>
            <li><strong>Backup:</strong> Backup data sebelum perubahan besar</li>
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
                <strong>Bobot tidak tersimpan:</strong>
                <span>Pastikan semua field diisi dengan benar. Periksa apakah ada error validasi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tidak sesuai setelah perubahan:</strong>
                <span>Perubahan bobot akan mempengaruhi nilai akhir. Rehit nilai atau kembalikan ke bobot sebelumnya jika diperlukan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa edit:</strong>
                <span>Pastikan Anda memiliki izin untuk edit bobot. Periksa apakah penilaian sudah selesai. Bobot mungkin dikunci setelah penilaian selesai.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai negatif atau > 100%:</strong>
                <span>Bobot harus dalam range 0-100%. Pastikan nilai yang dimasukkan valid dan sesuai standar.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Standar Kurikulum:</strong> Bobot harus sesuai dengan standar kurikulum yang digunakan. Kurikulum 2013 dan Kurikulum Merdeka memiliki standar bobot yang berbeda.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Dampak Perubahan:</strong> Perubahan bobot akan mempengaruhi perhitungan nilai akhir semua siswa. Pertimbangkan dampaknya sebelum mengubah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validasi Sistem:</strong> Sistem akan memvalidasi total bobot sebelum menyimpan. Pastikan total bobot sama dengan 100% untuk menghindari error.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat melihat bobot untuk mata pelajaran yang mereka ampu. Administrator dapat mengedit bobot untuk seluruh sistem.</div>
        </div>
    </div>`
};
