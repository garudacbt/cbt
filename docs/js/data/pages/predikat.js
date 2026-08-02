if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['predikat'] = {
    title: 'Predikat',
    desc: 'Panduan lengkap mengelola konversi nilai ke predikat di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-award"></i> Predikat Nilai</h2>
        <p>Predikat adalah konversi nilai angka ke nilai huruf (A, B, C, D, E) berdasarkan rentang nilai yang ditentukan. Predikat digunakan untuk memudahkan interpretasi nilai akademik siswa.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Predikat</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Pengaturan Rapor</code></li>
            <li>Klik <code class="inline">Predikat</code></li>
            <li>Halaman Predikat akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Predikat harus diatur sebelum penilaian dimulai. Predikat akan otomatis ditampilkan di rapor berdasarkan nilai akhir siswa.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur Predikat</h3>
        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Predikat</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Rapor</code></li>
            <li>Klik submenu <code class="inline">Pengaturan Rapor</code></li>
            <li>Klik <code class="inline">Predikat</code></li>
            <li>Halaman Predikat akan ditampilkan dengan daftar predikat yang ada</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Predikat harus diatur sebelum input nilai. Predikat akan otomatis ditampilkan di rapor berdasarkan nilai akhir siswa dan rentang yang ditentukan.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur Predikat</h3>
        <ol class="step-list">
            <li>Pada halaman Predikat, daftar predikat akan ditampilkan</li>
            <li>Pada halaman Predikat, daftar predikat akan ditampilkan</li>
            <li>Edit rentang nilai untuk setiap predikat:
                <ul class="step-list">
                    <li><strong>A (Sangat Baik):</strong> Rentang nilai 90-100</li>
                    <li><strong>B (Baik):</strong> Rentang nilai 80-89</li>
                    <li><strong>C (Cukup):</strong> Rentang nilai 70-79</li>
                    <li><strong>D (Kurang):</strong> Rentang nilai 60-69</li>
                    <li><strong>E (Sangat Kurang):</strong> Rentang nilai < 60</li>
                <ul class="step-list">
                    <li><strong>A:</strong> Nilai sangat baik (rentang nilai, misal 90-100)</li>
                    <li><strong>B:</strong> Nilai baik (rentang nilai, misal 80-89)</li>
                    <li><strong>C:</strong> Nilai cukup (rentang nilai, misal 70-79)</li>
                    <li><strong>D:</strong> Nilai kurang (rentang nilai, misal 0-69)</li>
                </ul>
            </li>
            <li>Atur deskripsi untuk setiap predikat (opsional)</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Predikat akan diterapkan dan digunakan dalam perhitungan nilai</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Rentang nilai predikat dapat disesuaikan dengan kebijakan sekolah dan standar kurikulum yang digunakan.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Predikat</h3>
        <ul class="step-list">
            <li><strong>Range:</strong> Rentang nilai harus mencakup 0-100</li>
            <li><strong>Overlap:</strong> Rentang nilai tidak boleh tumpang tindih</li>
            <li><strong>Gap:</strong> Tidak boleh ada gap antar rentang nilai</li>
            <li><strong>Kurikulum:</strong> Sesuaikan dengan standar kurikulum</li>
            <li><strong>Otomatis:</strong> Predikat dihitung otomatis berdasarkan nilai akhir</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Perubahan rentang predikat akan mempengaruhi semua nilai</li>
                    <li>Pastikan rentang nilai mencakup semua kemungkinan nilai</li>
                    <li>Informasikan perubahan kepada guru dan siswa</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Edit Predikat</h3>
        <ol class="step-list">
            <li>Pada halaman Predikat, klik tombol <code class="inline">Edit</code> pada predikat yang akan diubah</li>
            <li>Modal edit predikat akan ditampilkan</li>
            <li>Ubah rentang nilai sesuai kebutuhan</li>
            <li>Update deskripsi jika diperlukan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Predikat akan diperbarui</li>
            <li>Isi rentang nilai minimal dan maksimal untuk setiap predikat</li>
            <li>Tambahkan deskripsi untuk setiap predikat (opsional)</li>
            <li>Periksa ringkasan konfigurasi yang ditampilkan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Predikat akan disimpan dan berlaku untuk seluruh kelas</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Pastikan rentang nilai tidak tumpang tindih antara predikat. Rentang nilai harus berurutan dan mencakup seluruh rentang 0-100.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Predikat</h3>
        <ol class="step-list">
            <li><strong>Predikat A:</strong> Nilai sangat baik, menunjukkan pencapaian siswa di atas standar</li>
            <li><strong>Predikat B:</strong> Nilai baik, menunjukkan pencapaian siswa sesuai standar</li>
            <li><strong>Predikat C:</strong> Nilai cukup, menunjukkan pencapaian siswa mendekati standar</li>
            <li><strong>Predikat D:</strong> Nilai kurang, menunjukkan pencapaian siswa di bawah standar</li>
            <li><strong>Konversi Otomatis:</strong> Sistem otomatis mengkonversi nilai angka ke predikat berdasarkan rentang</li>
            <li><strong>Integrasi KKM:</strong> Predikat dapat disesuaikan dengan KKM untuk penilaian yang lebih akurat</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Perubahan predikat akan mempengaruhi tampilan nilai di rapor</li>
                    <li>Pastikan untuk mengkomunikasikan perubahan kepada guru</li>
                    <li>Predikat yang sudah digunakan untuk nilai tidak dapat diubah</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Mengedit Predikat</h3>
        <ol class="step-list">
            <li>Pada halaman Predikat, cari predikat yang ingin diedit</li>
            <li>Ubah rentang nilai sesuai kebutuhan</li>
            <li>Ubah deskripsi jika diperlukan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Predikat akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Perubahan predikat akan mempengaruhi semua nilai yang sudah ada</li>
                    <li>Pastikan untuk mengkomunikasikan perubahan kepada guru dan siswa</li>
                    <li>Predikat yang sudah digunakan untuk nilai tidak dapat diubah</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Rentang berurutan:</strong> Pastikan rentang nilai berurutan dan tidak tumpang tindih</li>
            <li><strong>Cakupan penuh:</strong> Pastikan rentang mencakup seluruh rentang 0-100</li>
            <li><strong>Sesuai KKM:</strong> Sesuaikan predikat dengan KKM untuk penilaian yang akurat</li>
            <li><strong>Konsistensi:</strong> Gunakan predikat yang konsisten untuk seluruh kelas</li>
            <li><strong>Komunikasi:</strong> Komunikasikan predikat kepada guru dan siswa</li>
            <li><strong>Review:</strong> Review predikat sebelum menyimpan</li>
            <li><strong>Backup:</strong> Catat predikat sebelum mengubah untuk referensi</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan kebijakan predikat untuk referensi</li>
            <li><strong>Testing:</strong> Coba uji coba predikat sebelum implementasi penuh</li>
            <li><strong>Update berkala:</strong> Review dan update predikat secara berkala</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Rentang nilai tumpang tindih:</strong>
                <span>Pastikan rentang nilai tidak tumpang tindih antara predikat. Sesuaikan rentang agar berurutan dan tidak ada celah.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Rentang tidak mencakup 0-100:</strong>
                <span>Pastikan rentang nilai mencakup seluruh rentang 0-100. Tambahkan atau sesuaikan predikat untuk mencakup seluruh rentang.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengubah predikat:</strong>
                <span>Predikat yang sudah digunakan untuk nilai tidak dapat diubah. Hubungi administrator jika perlu perubahan predikat.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Predikat tidak muncul di rapor:</strong>
                <span>Pastikan predikat sudah disimpan dengan benar. Pastikan rentang nilai sudah diatur dengan benar. Periksa setting rapor.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Predikat tidak tersimpan:</strong>
                <span>Pastikan semua field sudah diisi dengan benar. Periksa koneksi internet saat menyimpan. Coba lagi atau hubungi administrator.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> Predikat dibuat per tahun pelajaran dan semester. Data di tahun pelajaran berbeda adalah data yang terpisah.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan Nilai:</strong> Predikat menjadi dasar untuk konversi nilai angka ke nilai huruf. Perubahan Predikat akan mempengaruhi semua nilai yang ditampilkan.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Administrator:</strong> Hanya Administrator yang dapat mengakses dan mengubah Predikat. Guru tidak memiliki akses ke menu ini.
            </div>
        </div>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Edit predikat hanya jika ada perubahan kebijakan sekolah atau standar kurikulum. Catat alasan perubahan untuk dokumentasi.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Standar:</strong> Sesuaikan dengan standar kurikulum yang digunakan</li>
            <li><strong>Konsistensi:</strong> Jaga konsistensi predikat antar semester</li>
            <li><strong>Komunikasi:</strong> Informasikan kriteria predikat kepada siswa</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan kriteria penilaian</li>
            <li><strong>Review:</strong> Review predikat secara berkala</li>
            <li><strong>Validasi:</strong> Validasi rentang nilai sebelum menyimpan</li>
            <li>Transparansi: Jaga transparansi dalam penilaian</li>
            <li><strong>KKM:</strong> Sesuaikan dengan KKM yang telah ditentukan</li>
            <li><strong>Feedback:</strong> Berikan feedback berdasarkan predikat</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data nilai</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Predikat tidak muncul:</strong>
                <span>Pastikan predikat sudah diatur. Periksa setting predikat. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Predikat tidak tersimpan:</strong>
                <span>Pastikan rentang nilai diisi dengan benar. Periksa apakah ada error validasi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Predikat tidak sesuai:</strong>
                <span>Pastikan rentang nilai tidak tumpang tindih. Periksa apakah ada gap antar rentang. Atur ulang jika diperlukan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tanpa predikat:</strong>
                <span>Pastikan rentang nilai mencakup 0-100. Tambahkan predikat untuk nilai yang belum tercakup.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa edit:</strong>
                <span>Pastikan Anda memiliki izin untuk edit predikat. Periksa apakah penilaian sudah selesai. Predikat mungkin dikunci setelah penilaian selesai.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Standar Kurikulum:</strong> Predikat harus sesuai dengan standar kurikulum yang digunakan. Kurikulum 2013 dan Kurikulum Merdeka memiliki standar predikat yang berbeda.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Konversi Otomatis:</strong> Predikat dihitung otomatis berdasarkan nilai akhir siswa dan rentang nilai yang ditentukan. Tidak perlu konversi manual.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Deskripsi Predikat:</strong> Deskripsi predikat dapat ditambahkan untuk memberikan penjelasan lebih detail tentang kualitas pencapaian siswa.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat melihat kriteria predikat. Administrator dapat mengedit predikat untuk seluruh sistem.</div>
            <div>
                <strong>Integrasi dengan KKM:</strong> Predikat digunakan bersama dengan KKM untuk menentukan nilai huruf di rapor. KKM dapat digunakan sebagai referensi untuk menentukan rentang predikat.
            </div>
        </div>
    </div>`
};
