if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['jenis-ujian'] = {
    title: 'Jenis Ujian',
    desc: 'Panduan lengkap mengelola jenis ujian dalam sistem CBT di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-project-diagram"></i> Jenis Ujian</h2>
        <p>Jenis ujian digunakan untuk mengkategorikan berbagai jenis ujian seperti UTS, UAS, Ujian Sekolah, Ujian Harian, dll. Pengelolaan jenis ujian yang baik akan memudahkan dalam pembuatan jadwal ujian dan analisis hasil ujian secara terstruktur.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Jenis Ujian</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Jenis Ujian</code></li>
            <li>Halaman Jenis Ujian akan ditampilkan dengan daftar jenis ujian yang ada</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Jenis ujian akan digunakan saat membuat jadwal ujian. Pastikan jenis ujian yang diperlukan sudah dibuat sebelum membuat jadwal ujian.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Jenis Ujian Baru</h3>
        <ol class="step-list">
            <li>Pada halaman Jenis Ujian, klik tombol <code class="inline">Tambah</code> di pojok kanan atas</li>
            <li>Modal tambah jenis ujian akan ditampilkan</li>
            <li>Isi formulir jenis ujian:
                <ul class="step-list">
                    <li><strong>Nama Jenis:</strong> Nama jenis ujian (wajib diisi, misal: UTS, UAS, Ujian Harian)</li>
                    <li><strong>Kode:</strong> Kode unik untuk jenis ujian (wajib diisi, misal: UTS, UAS, UH)</li>
                    <li><strong>Keterangan:</strong> Deskripsi atau penjelasan jenis ujian (opsional)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Jenis ujian baru akan ditambahkan ke daftar</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan kode yang singkat dan mudah diingat. Format yang konsisten seperti "UTS" untuk Ujian Tengah Semester akan memudahkan manajemen.</div>
        </div>
        <hr>
        <h3>🠊 Mengedit Jenis Ujian</h3>
        <ol class="step-list">
            <li>Pada halaman Jenis Ujian, cari jenis ujian yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> pada jenis ujian tersebut</li>
            <li>Modal edit jenis ujian akan ditampilkan</li>
            <li>Ubah data jenis ujian sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Jenis ujian akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Jenis ujian yang sudah digunakan dalam jadwal ujian tidak dapat dihapus</li>
                    <li>Perubahan kode jenis ujian akan mempengaruhi jadwal yang sudah ada</li>
                    <li>Gunakan edit dengan hati-hati untuk jenis ujian yang sudah digunakan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Menghapus Jenis Ujian</h3>
        <ol class="step-list">
            <li>Pilih jenis ujian yang ingin dihapus dengan checkbox</li>
            <li>Klik tombol <code class="inline">Hapus terpilih</code></li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Jenis ujian akan dihapus</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Jenis ujian yang sudah digunakan dalam jadwal ujian tidak dapat dihapus</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                    <li>Pastikan jenis ujian benar-benar tidak diperlukan sebelum menghapus</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Contoh Jenis Ujian yang Umum Digunakan</h3>
        <table class="table-custom">
            <thead><tr><th>Nama Jenis</th><th>Kode</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td>Ujian Tengah Semester</td><td>UTS</td><td>Ujian pertengahan semester</td></tr>
                <tr><td>Ujian Akhir Semester</td><td>UAS</td><td>Ujian akhir semester</td></tr>
                <tr><td>Ujian Harian</td><td>UH</td><td>Ujian harian atau mingguan</td></tr>
                <tr><td>Ujian Sekolah</td><td>US</td><td>Ujian sekolah</td></tr>
                <tr><td>Ujian Nasional</td><td>UN</td><td>Ujian nasional</td></tr>
                <tr><td>Ujian Remedial</td><td>REM</td><td>Ujian remedial untuk siswa yang belum lulus</td></tr>
                <tr><td>Ujian Pengayaan</td><td>PENG</td><td>Ujian pengayaan untuk siswa berprestasi</td></tr>
                <tr><td>Try Out</td><td>TO</td><td>Ujian latihan atau simulasi</td></tr>
            </tbody>
        </table>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Sesuaikan jenis ujian dengan kebutuhan sekolah. Gunakan kode yang konsisten dan mudah diingat untuk memudahkan manajemen.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Konsistensi kode:</strong> Gunakan kode yang konsisten untuk semua jenis ujian</li>
            <li><strong>Nama yang jelas:</strong> Gunakan nama yang deskriptif dan mudah dipahami</li>
            <li><strong>Keterangan lengkap:</strong> Tambahkan keterangan untuk jenis ujian yang spesifik</li>
            <li><strong>Standar sekolah:</strong> Sesuaikan jenis ujian dengan standar sekolah</li>
            <li><strong>Jangan terlalu banyak:</strong> Hindari membuat terlalu banyak jenis ujian yang tidak diperlukan</li>
            <li><strong>Review berkala:</strong> Review jenis ujian secara berkala dan hapus yang tidak digunakan</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan standar penamaan untuk referensi tim</li>
            <li><strong>Backup:</strong> Catat jenis ujian yang dibuat untuk backup</li>
            <li><strong>Komunikasi:</strong> Komunikasikan jenis ujian kepada semua guru</li>
            <li><strong>Testing:</strong> Uji coba jenis ujian sebelum digunakan dalam jadwal</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menambah jenis ujian:</strong>
                <span>Pastikan semua field wajib sudah terisi. Pastikan kode jenis ujian belum digunakan. Pastikan tidak ada error koneksi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kode sudah digunakan:</strong>
                <span>Pastikan kode jenis ujian unik. Gunakan kode yang berbeda untuk setiap jenis ujian.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengedit jenis ujian:</strong>
                <span>Jenis ujian yang sudah digunakan dalam jadwal ujian mungkin memiliki keterbatasan pengeditan. Hapus atau pindahkan data terkait terlebih dahulu jika perlu perubahan besar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menghapus jenis ujian:</strong>
                <span>Jenis ujian yang sudah digunakan dalam jadwal ujian tidak dapat dihapus. Hapus atau pindahkan jadwal terkait terlebih dahulu.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Jenis ujian tidak muncul di jadwal:</strong>
                <span>Pastikan jenis ujian sudah dibuat dan statusnya aktif. Pastikan jenis ujian ditugaskan ke tahun pelajaran dan semester yang benar.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> Jenis ujian bersifat global dan dapat digunakan di semua tahun pelajaran. Tidak perlu membuat ulang jenis ujian setiap tahun pelajaran baru.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan:</strong> Jenis ujian terkait dengan jadwal ujian. Perubahan pada jenis ujian akan mempengaruhi jadwal yang menggunakan jenis ujian tersebut.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Unik Kode:</strong> Kode jenis ujian harus unik. Sistem tidak mengizinkan dua jenis ujian dengan kode yang sama.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat melihat jenis ujian yang tersedia. Administrator memiliki akses penuh untuk menambah, mengedit, dan menghapus jenis ujian.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Semua operasi Jenis Ujian menggunakan AJAX POST ke controller <code>Cbtjenis</code> dan mengembalikan respons JSON. Hanya Administrator yang memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtjenis</code></td><td>Tampilkan halaman daftar jenis ujian</td></tr>
                <tr><td>GET</td><td><code>cbtjenis/data</code></td><td>Ambil data semua jenis ujian</td></tr>
                <tr><td>POST</td><td><code>cbtjenis/add</code></td><td>Tambah jenis ujian baru</td></tr>
                <tr><td>POST</td><td><code>cbtjenis/update</code></td><td>Update jenis ujian</td></tr>
                <tr><td>POST</td><td><code>cbtjenis/delete</code></td><td>Hapus jenis ujian (single atau bulk)</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtjenis/add</code> — Tambah Jenis Ujian</h3>
        <p>Endpoint ini menangani operasi penambahan jenis ujian baru.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>nama_jenis</code></td><td>Ya</td><td>Nama jenis ujian</td></tr>
                <tr><td><code>kode_jenis</code></td><td>Ya</td><td>Kode jenis ujian (unik)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": { "nama_jenis": "...", "kode_jenis": "..." } }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtjenis/update</code> — Update Jenis Ujian</h3>
        <p>Endpoint ini menangani operasi update jenis ujian.</p>

        <h3 style="margin-top:20px;">POST <code>cbtjenis/delete</code> — Hapus Jenis Ujian</h3>
        <p>Endpoint ini menangani operasi penghapusan jenis ujian (single atau bulk).</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>checked</code></td><td>Ya</td><td>Array ID jenis ujian yang akan dihapus</td></tr>
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
