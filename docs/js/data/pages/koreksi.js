if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['koreksi'] = {
    title: 'Koreksi Manual',
    desc: 'Panduan lengkap mengoreksi soal essay dan isian singkat di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-edit"></i> Koreksi Manual Soal</h2>
        <p>Soal essay dan isian singkat tidak dapat dinilai secara otomatis oleh sistem. Guru perlu mengoreksi jawaban siswa secara manual. Koreksi manual adalah proses penting untuk menentukan nilai akhir siswa dan memberikan feedback yang berkualitas.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Koreksi</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Hasil CBT</code></li>
            <li>Klik <code class="inline">Koreksi</code></li>
            <li>Halaman Koreksi akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan ujian sudah selesai sebelum melakukan koreksi. Koreksi hanya dapat dilakukan untuk ujian yang sudah selesai.</div>
        </div>
        <hr>
        <h3>🠊 Melakukan Koreksi</h3>
        <ol class="step-list">
            <li>Pada halaman Koreksi, pilih jadwal ujian yang ingin dikoreksi</li>
            <li>Dropdown jadwal ujian akan menampilkan semua jadwal yang sudah selesai</li>
            <li>Pilih jadwal ujian dari dropdown</li>
            <li>Daftar siswa dengan jawaban yang perlu dikoreksi akan ditampilkan</li>
            <li>Siswa yang sudah dikoreksi akan ditandai dengan status "Selesai"</li>
            <li>Siswa yang belum dikoreksi akan ditandai dengan status "Belum"</li>
            <li>Klik pada nama siswa untuk melihat jawaban</li>
            <li>Halaman koreksi siswa akan ditampilkan</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Sistem akan menampilkan soal essay dan isian singkat yang perlu dikoreksi. Soal pilihan ganda dan ganda kompleks sudah dinilai secara otomatis.</div>
        </div>
        <hr>
        <h3>🠊 Halaman Koreksi Siswa</h3>
        <p>Halaman koreksi siswa menampilkan informasi berikut:</p>
        <ul class="step-list">
            <li><strong>Informasi Siswa:</strong> Nama, NIS, dan kelas siswa</li>
            <li><strong>Daftar Soal:</strong> Daftar soal yang perlu dikoreksi</li>
            <li><strong>Jawaban Siswa:</strong> Jawaban asli yang diberikan siswa</li>
            <li><strong>Kunci Jawaban:</strong> Kunci jawaban atau pedoman penilaian</li>
            <li><strong>Nilai Maksimal:</strong> Nilai maksimal untuk setiap soal</li>
            <li><strong>Input Nilai:</strong> Kolom untuk memasukkan nilai</li>
            <li><strong>Catatan:</strong> Kolom untuk menambahkan catatan koreksi</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Auto-Save:</strong> Sistem akan menyimpan nilai secara otomatis saat Anda berpindah ke soal berikutnya. Pastikan nilai sudah benar sebelum berpindah.</div>
        </div>
        <hr>
        <h3>🠊 Memberikan Nilai</h3>
        <ol class="step-list">
            <li>Pada halaman koreksi siswa, lihat jawaban siswa untuk setiap soal</li>
            <li>Bandingkan dengan kunci jawaban atau pedoman penilaian</li>
            <li>Masukkan nilai di kolom input nilai (0 sampai nilai maksimal)</li>
            <li>Tambahkan catatan koreksi jika diperlukan (opsional)</li>
            <li>Ulangi proses untuk semua soal yang perlu dikoreksi</li>
            <li>Klik tombol <code class="inline">Simpan</code> untuk menyimpan semua nilai</li>
            <li>Nilai akhir akan dihitung secara otomatis</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan pedoman penilaian yang konsisten untuk semua siswa. Catatan koreksi berguna untuk memberikan feedback kepada siswa.</div>
        </div>
        <hr>
        <h3>🠊 Fitur Koreksi</h3>
        <p>Sistem menyediakan beberapa fitur untuk memudahkan koreksi:</p>
        <ul class="step-list">
            <li><strong>Lihat Jawaban Asli:</strong> Lihat jawaban asli siswa tanpa format</li>
            <li><strong>Beri Nilai per Soal:</strong> Berikan nilai untuk setiap soal secara individual</li>
            <li><strong>Tambah Catatan:</strong> Tambahkan catatan koreksi untuk setiap soal</li>
            <li><strong>Rekap Otomatis:</strong> Nilai akhir dihitung secara otomatis</li>
            <li><strong>Navigasi Cepat:</strong> Navigasi antar soal dengan mudah</li>
            <li><strong>Preview:</strong> Preview jawaban sebelum memberikan nilai</li>
            <li><strong>History:</strong> Lihat history koreksi jika perlu revisi</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan navigasi cepat untuk berpindah antar soal tanpa harus scroll. Ini akan mempercepat proses koreksi.</div>
        </div>
        <hr>
        <h3>🠊 Filter dan Pencarian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter Status</code> untuk memfilter berdasarkan status koreksi</li>
            <li>Gunakan dropdown <code class="inline">Filter Kelas</code> untuk memfilter berdasarkan kelas</li>
            <li>Gunakan kolom <code class="inline">Cari</code> untuk mencari siswa berdasarkan nama atau NIS</li>
            <li>Hasil akan ditampilkan sesuai filter yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk fokus pada siswa yang belum dikoreksi atau untuk koreksi per kelas.</div>
        </div>
        <hr>
        <h3>🠊 Revisi Koreksi</h3>
        <ol class="step-list">
            <li>Pada halaman Koreksi, klik pada nama siswa yang sudah dikoreksi</li>
            <li>Halaman koreksi siswa akan ditampilkan dengan nilai yang sudah diberikan</li>
            <li>Ubah nilai sesuai kebutuhan</li>
            <li>Ubah catatan koreksi jika diperlukan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Nilai akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Revisi koreksi akan mengubah nilai akhir siswa</li>
                    <li>Revisi akan dicatat dalam history koreksi</li>
                    <li>Gunakan revisi hanya jika benar-benar diperlukan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Pedoman penilaian:</strong> Gunakan pedoman penilaian yang konsisten untuk semua siswa</li>
            <li><strong>Koreksi bertahap:</strong> Koreksi secara bertahap untuk menghindari kelelahan</li>
            <li><strong>Catatan detail:</strong> Tambahkan catatan detail untuk feedback yang lebih baik</li>
            <li><strong>Review:</strong> Review nilai sebelum menyimpan</li>
            <li><strong>Backup:</strong> Export data koreksi secara berkala</li>
            <li><strong>Komunikasi:</strong> Komunikasikan hasil koreksi kepada siswa</li>
            <li><strong>Feedback:</strong> Gunakan catatan untuk memberikan feedback konstruktif</li>
            <li><strong>Waktu:</strong> Alokasikan waktu yang cukup untuk koreksi yang teliti</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan prosedur koreksi untuk referensi</li>
            <li><strong>Review:</strong> Review prosedur koreksi untuk perbaikan berikutnya</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Daftar siswa tidak muncul:</strong>
                <span>Pastikan jadwal ujian sudah dipilih. Pastikan ujian sudah selesai. Pastikan ada siswa yang mengikuti ujian.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Jawaban tidak muncul:</strong>
                <span>Pastikan ujian sudah selesai. Pastikan data jawaban sudah tersimpan. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
                <div class="d-flex flex-column">
                <strong>Nilai tidak tersimpan:</strong>
                <span>Pastikan nilai dalam rentang yang valid (0 sampai nilai maksimal). Pastikan tidak ada error koneksi. Coba simpan ulang.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai akhir tidak berubah:</strong>
                <span>Refresh halaman untuk melihat nilai terbaru. Pastikan semua nilai sudah disimpan. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Revisi gagal:</strong>
                <span>Pastikan nilai dalam rentang yang valid. Pastikan tidak ada error koneksi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Filter tidak berfungsi:</strong>
                <span>Pastikan filter dipilih dengan benar. Refresh halaman dan coba lagi. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Nilai 0:</strong> Nilai yang belum dikoreksi akan dianggap 0. Pastikan koreksi selesai sebelum mencetak hasil ujian.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Auto-Grade:</strong> Soal pilihan ganda dan ganda kompleks dinilai secara otomatis. Hanya soal essay dan isian singkat yang perlu dikoreksi manual.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>History:</strong> Semua revisi koreksi dicatat dalam history untuk audit dan dokumentasi. History dapat diakses jika perlu review.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru hanya dapat mengoreksi ujian untuk mata pelajaran yang mereka ampu. Administrator memiliki akses penuh ke semua ujian.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Koreksi Manual menggunakan endpoint untuk mengambil dan menyimpan nilai koreksi soal essay dan isian singkat. Semua operasi menggunakan AJAX POST dan mengembalikan respons JSON.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtkoreksi/koreksi/{id_jadwal}</code></td><td>Tampilkan halaman koreksi</td></tr>
                <tr><td>GET</td><td><code>cbtkoreksi/getSiswa/{id_jadwal}</code></td><td>Ambil daftar siswa yang perlu dikoreksi</td></tr>
                <tr><td>GET</td><td><code>cbtkoreksi/getJawaban/{id_siswa}/{id_jadwal}</code></td><td>Ambil jawaban siswa untuk dikoreksi</td></tr>
                <tr><td>POST</td><td><code>cbtkoreksi/simpanNilai</code></td><td>Simpan nilai koreksi</td></tr>
                <tr><td>POST</td><td><code>cbtkoreksi/simpanCatatan</code></td><td>Simpan catatan koreksi</td></tr>
                <tr><td>GET</td><td><code>cbtkoreksi/getHistory/{id_siswa}/{id_jadwal}</code></td><td>Ambil history koreksi</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtkoreksi/simpanNilai</code> — Simpan Nilai Koreksi</h3>
        <p>Endpoint ini menangani operasi penyimpanan nilai koreksi untuk soal essay dan isian singkat.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_siswa</code></td><td>Ya</td><td>ID siswa</td></tr>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
                <tr><td><code>nilai</code></td><td>Ya</td><td>Array nilai per soal (id_soal: nilai)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "Nilai berhasil disimpan", "total": 5 }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Sistem akan menyimpan nilai secara otomatis saat berpindah ke soal berikutnya (auto-save).</div>
        </div>
    </div>`
};
