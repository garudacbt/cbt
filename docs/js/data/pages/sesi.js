if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['sesi'] = {
    title: 'Sesi Ujian',
    desc: 'Panduan lengkap mengelola sesi ujian di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-clock"></i> Sesi Ujian</h2>
        <p>Sesi ujian digunakan untuk membagi pelaksanaan ujian ke dalam beberapa sesi waktu berdasarkan kapasitas ruang atau kebutuhan lainnya. Pengelolaan sesi yang baik akan memastikan distribusi peserta yang optimal dan kelancaran pelaksanaan ujian.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Sesi Ujian</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Sesi</code></li>
            <li>Halaman Sesi Ujian akan ditampilkan dengan daftar sesi yang ada</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Sesi ujian akan digunakan saat membuat jadwal ujian dan mengalokasikan peserta. Pastikan sesi yang diperlukan sudah dibuat sebelum membuat jadwal ujian.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Sesi Ujian Baru</h3>
        <ol class="step-list">
            <li>Pada halaman Sesi Ujian, klik tombol <code class="inline">Tambah</code> di pojok kanan atas</li>
            <li>Modal tambah sesi akan ditampilkan</li>
            <li>Isi formulir sesi:
                <ul class="step-list">
                    <li><strong>Nama Sesi:</strong> Nama sesi (wajib diisi, misal: Sesi 1, Sesi 2, Pagi, Siang)</li>
                    <li><strong>Waktu Mulai:</strong> Jam mulai sesi (wajib diisi, format HH:MM)</li>
                    <li><strong>Waktu Selesai:</strong> Jam selesai sesi (wajib diisi, format HH:MM)</li>
                    <li><strong>Keterangan:</strong> Deskripsi atau penjelasan sesi (opsional)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Sesi baru akan ditambahkan ke daftar</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan nama sesi yang deskriptif seperti "Sesi 1 - Pagi" atau "Sesi 2 - Siang" untuk memudahkan identifikasi. Pastikan waktu sesi tidak tumpang tindih dengan sesi lain.</div>
        </div>
        <hr>
        <h3>🠊 Mengedit Sesi Ujian</h3>
        <ol class="step-list">
            <li>Pada halaman Sesi Ujian, cari sesi yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> pada sesi tersebut</li>
            <li>Modal edit sesi akan ditampilkan</li>
            <li>Ubah data sesi sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Sesi akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Sesi yang sudah digunakan dalam jadwal ujian tidak dapat dihapus</li>
                    <li>Perubahan waktu sesi akan mempengaruhi jadwal yang sudah ada</li>
                    <li>Gunakan edit dengan hati-hati untuk sesi yang sudah digunakan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Menghapus Sesi Ujian</h3>
        <ol class="step-list">
            <li>Pilih sesi yang ingin dihapus dengan checkbox</li>
            <li>Klik tombol <code class="inline">Hapus terpilih</code></li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Sesi akan dihapus</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Sesi yang sudah digunakan dalam jadwal ujian tidak dapat dihapus</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                    <li>Pastikan sesi benar-benar tidak diperlukan sebelum menghapus</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Sesi Ujian</h3>
        <ul class="step-list">
            <li><strong>Waktu tidak tumpang tindih:</strong> Waktu sesi tidak boleh tumpang tindih dengan sesi lain</li>
            <li><strong>Waktu selesai setelah mulai:</strong> Waktu selesai harus setelah waktu mulai</li>
            <li><strong>Kapasitas ruang:</strong> Sesi digunakan untuk membagi peserta berdasarkan kapasitas ruang</li>
            <li><strong>Multi-sesi:</strong> Satu jadwal ujian dapat memiliki beberapa sesi</li>
            <li><strong>Durasi fleksibel:</strong> Setiap sesi dapat memiliki durasi yang berbeda</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validasi Waktu:</strong> Sistem akan memvalidasi bahwa waktu sesi tidak tumpang tindih dengan sesi lain. Jika ada tumpang tindih, sistem akan menolak penyimpanan.</div>
        </div>
        <hr>
        <h3>🠊 Contoh Sesi Ujian yang Umum Digunakan</h3>
        <table class="table-custom">
            <thead><tr><th>Nama Sesi</th><th>Waktu Mulai</th><th>Waktu Selesai</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td>Sesi 1 - Pagi</td><td>07:00</td><td>09:00</td><td>Sesi pagi untuk kelas pagi</td></tr>
                <tr><td>Sesi 2 - Siang</td><td>09:30</td><td>11:30</td><td>Sesi siang untuk kelas siang</td></tr>
                <tr><td>Sesi 3 - Sore</td><td>13:00</td><td>15:00</td><td>Sesi sore untuk kelas sore</td></tr>
                <tr><td>Sesi A</td><td>08:00</td><td>10:00</td><td>Sesi A untuk kelompok A</td></tr>
                <tr><td>Sesi B</td><td>10:30</td><td>12:30</td><td>Sesi B untuk kelompok B</td></tr>
            </tbody>
        </table>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Sesuaikan sesi dengan kapasitas ruang komputer dan jumlah siswa. Berikan jarak waktu antar sesi untuk persiapan ruang dan distribusi peserta.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Perencanaan kapasitas:</strong> Sesuaikan jumlah sesi dengan kapasitas ruang komputer</li>
            <li><strong>Jarak waktu:</strong> Berikan jarak waktu antar sesi untuk persiapan</li>
            <li><strong>Nama yang jelas:</strong> Gunakan nama sesi yang deskriptif dan mudah dipahami</li>
            <li><strong>Konsistensi:</strong> Gunakan format nama yang konsisten untuk semua sesi</li>
            <li><strong>Durasi cukup:</strong> Pastikan durasi sesi cukup untuk ujian</li>
            <li><strong>Review berkala:</strong> Review sesi secara berkala dan sesuaikan dengan kebutuhan</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan standar penamaan untuk referensi tim</li>
            <li><strong>Komunikasi:</strong> Komunikasikan jadwal sesi kepada semua guru dan siswa</li>
            <li><strong>Backup:</strong> Catat sesi yang dibuat untuk backup</li>
            <li><strong>Testing:</strong> Uji coba sesi sebelum digunakan dalam jadwal</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menambah sesi:</strong>
                <span>Pastikan semua field wajib sudah terisi. Pastikan waktu selesai setelah waktu mulai. Pastikan waktu sesi tidak tumpang tindih dengan sesi lain.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Waktu tumpang tindih:</strong>
                <span>Pastikan waktu sesi tidak tumpang tindih dengan sesi lain. Sesuaikan waktu sesi agar tidak ada overlap.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengedit sesi:</strong>
                <span>Sesi yang sudah digunakan dalam jadwal ujian mungkin memiliki keterbatasan pengeditan. Hapus atau pindahkan data terkait terlebih dahulu jika perlu perubahan besar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menghapus sesi:</strong>
                <span>Sesi yang sudah digunakan dalam jadwal ujian tidak dapat dihapus. Hapus atau pindahkan jadwal terkait terlebih dahulu.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Sesi tidak muncul di jadwal:</strong>
                <span>Pastikan sesi sudah dibuat dan statusnya aktif. Pastikan sesi ditugaskan ke tahun pelajaran dan semester yang benar.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> Sesi ujian bersifat global dan dapat digunakan di semua tahun pelajaran. Tidak perlu membuat ulang sesi setiap tahun pelajaran baru.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan:</strong> Sesi ujian terkait dengan jadwal ujian dan alokasi peserta. Perubahan pada sesi akan mempengaruhi jadwal yang menggunakan sesi tersebut.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validasi Waktu:</strong> Sistem akan memvalidasi waktu sesi untuk mencegah tumpang tindih. Pastikan waktu sesi diatur dengan benar.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat melihat sesi yang tersedia. Administrator memiliki akses penuh untuk menambah, mengedit, dan menghapus sesi.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Semua operasi Sesi Ujian menggunakan AJAX POST ke controller <code>Cbtsesi</code> dan mengembalikan respons JSON. Hanya Administrator yang memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtsesi</code></td><td>Tampilkan halaman daftar sesi ujian</td></tr>
                <tr><td>GET</td><td><code>cbtsesi/data</code></td><td>Ambil data semua sesi ujian</td></tr>
                <tr><td>POST</td><td><code>cbtsesi/add</code></td><td>Tambah sesi ujian baru</td></tr>
                <tr><td>POST</td><td><code>cbtsesi/update</code></td><td>Update sesi ujian</td></tr>
                <tr><td>GET</td><td><code>cbtsesi/edit/{id}</code></td><td>Tampilkan halaman edit sesi ujian</td></tr>
                <tr><td>POST</td><td><code>cbtsesi/delete</code></td><td>Hapus sesi ujian (single atau bulk)</td></tr>
                <tr><td>GET</td><td><code>cbtsesi/sesisiswa</code></td><td>Tampilkan halaman daftar sesi untuk siswa</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtsesi/add</code> — Tambah Sesi Ujian</h3>
        <p>Endpoint ini menangani operasi penambahan sesi ujian baru.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>nama_sesi</code></td><td>Ya</td><td>Nama sesi ujian</td></tr>
                <tr><td><code>kode_sesi</code></td><td>Ya</td><td>Kode sesi ujian</td></tr>
                <tr><td><code>waktu_mulai</code></td><td>Ya</td><td>Waktu mulai sesi (format HH:MM)</td></tr>
                <tr><td><code>waktu_akhir</code></td><td>Ya</td><td>Waktu selesai sesi (format HH:MM)</td></tr>
                <tr><td><code>istirahat</code></td><td>Tidak</td><td>Waktu istirahat</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": { "nama_sesi": "...", "kode_sesi": "...", "waktu_mulai": "...", "waktu_akhir": "..." } }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtsesi/update</code> — Update Sesi Ujian</h3>
        <p>Endpoint ini menangani operasi update sesi ujian.</p>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "Data berhasil diupdate" }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtsesi/delete</code> — Hapus Sesi Ujian</h3>
        <p>Endpoint ini menangani operasi penghapusan sesi ujian (single atau bulk).</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>checked</code></td><td>Ya</td><td>Array ID sesi yang akan dihapus</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "total": 5 }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Semua operasi yang mengubah data (tambah, edit, hapus) dicatat ke tabel log aktivitas.</div>
        </div>
    </div>`
};
