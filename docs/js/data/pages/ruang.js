if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['ruang'] = {
    title: 'Ruang Ujian',
    desc: 'Panduan lengkap mengelola ruang ujian di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-door-open"></i> Ruang Ujian</h2>
        <p>Ruang ujian digunakan untuk mendefinisikan lokasi pelaksanaan ujian CBT seperti lab komputer atau ruang ujian lainnya. Pengelolaan ruang yang baik akan memastikan distribusi peserta yang optimal berdasarkan kapasitas ruang yang tersedia.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Ruang Ujian</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Ruang</code></li>
            <li>Halaman Ruang Ujian akan ditampilkan dengan daftar ruang yang ada</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Ruang ujian akan digunakan saat membuat jadwal ujian dan mengalokasikan peserta. Pastikan ruang yang diperlukan sudah dibuat sebelum membuat jadwal ujian.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Ruang Ujian Baru</h3>
        <ol class="step-list">
            <li>Pada halaman Ruang Ujian, klik tombol <code class="inline">Tambah</code> di pojok kanan atas</li>
            <li>Modal tambah ruang akan ditampilkan</li>
            <li>Isi formulir ruang:
                <ul class="step-list">
                    <li><strong>Nama Ruang:</strong> Nama ruang (wajib diisi, misal: Lab 1, Lab 2, Ruang CBT A)</li>
                    <li><strong>Kapasitas:</strong> Jumlah komputer yang tersedia (wajib diisi, angka)</li>
                    <li><strong>Lokasi:</strong> Lokasi atau gedung ruang (opsional, misal: Gedung A, Lantai 2)</li>
                    <li><strong>Keterangan:</strong> Deskripsi atau penjelasan ruang (opsional)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Ruang baru akan ditambahkan ke daftar</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan nama ruang yang deskriptif seperti "Lab 1 - Matematika" atau "Lab 2 - Bahasa" untuk memudahkan identifikasi. Pastikan kapasitas sesuai dengan jumlah komputer yang tersedia.</div>
        </div>
        <hr>
        <h3>🠊 Mengedit Ruang Ujian</h3>
        <ol class="step-list">
            <li>Pada halaman Ruang Ujian, cari ruang yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> pada ruang tersebut</li>
            <li>Modal edit ruang akan ditampilkan</li>
            <li>Ubah data ruang sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Ruang akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Ruang yang sudah digunakan dalam jadwal ujian tidak dapat dihapus</li>
                    <li>Perubahan kapasitas akan mempengaruhi alokasi peserta yang sudah ada</li>
                    <li>Gunakan edit dengan hati-hati untuk ruang yang sudah digunakan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Menghapus Ruang Ujian</h3>
        <ol class="step-list">
            <li>Pilih ruang yang ingin dihapus dengan checkbox</li>
            <li>Klik tombol <code class="inline">Hapus terpilih</code></li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Ruang akan dihapus</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Ruang yang sudah digunakan dalam jadwal ujian tidak dapat dihapus</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                    <li>Pastikan ruang benar-benar tidak diperlukan sebelum menghapus</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Ruang Ujian</h3>
        <ul class="step-list">
            <li><strong>Kapasitas maksimal:</strong> Kapasitas ruang menentukan jumlah peserta maksimal per sesi</li>
            <li><strong>Multi-ujian:</strong> Ruang dapat digunakan untuk berbagai jenis ujian</li>
            <li><strong>Kondisi komputer:</strong> Pastikan komputer dalam ruang dalam kondisi baik</li>
            <li><strong>Akses internet:</strong> Pastikan ruang memiliki koneksi internet yang stabil</li>
            <li><strong>Multi-sesi:</strong> Satu ruang dapat digunakan untuk beberapa sesi dalam satu hari</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validasi Kapasitas:</strong> Sistem akan memvalidasi bahwa jumlah peserta yang dialokasikan ke ruang tidak melebihi kapasitas ruang. Jika melebihi, sistem akan menolak alokasi.</div>
        </div>
        <hr>
        <h3>🠊 Contoh Ruang Ujian yang Umum Digunakan</h3>
        <table class="table-custom">
            <thead><tr><th>Nama Ruang</th><th>Kapasitas</th><th>Lokasi</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td>Lab 1</td><td>30</td><td>Gedung A, Lantai 2</td><td>Lab komputer utama</td></tr>
                <tr><td>Lab 2</td><td>25</td><td>Gedung A, Lantai 3</td><td>Lab komputer kedua</td></tr>
                <tr><td>Lab 3</td><td>20</td><td>Gedung B, Lantai 1</td><td>Lab komputer kecil</td></tr>
                <tr><td>Ruang CBT A</td><td>40</td><td>Gedung C, Lantai 2</td><td>Ruang ujian CBT utama</td></tr>
                <tr><td>Ruang CBT B</td><td>35</td><td>Gedung C, Lantai 3</td><td>Ruang ujian CBT kedua</td></tr>
            </tbody>
        </table>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Sesuaikan kapasitas ruang dengan jumlah komputer yang tersedia. Pertimbangkan juga fasilitas pendukung seperti AC, proyektor, dan koneksi internet.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Perencanaan kapasitas:</strong> Sesuaikan kapasitas dengan jumlah komputer yang tersedia</li>
            <li><strong>Nama yang jelas:</strong> Gunakan nama ruang yang deskriptif dan mudah dipahami</li>
            <li><strong>Lokasi detail:</strong> Tambahkan lokasi detail untuk memudahkan pencarian</li>
            <li><strong>Konsistensi:</strong> Gunakan format nama yang konsisten untuk semua ruang</li>
            <li><strong>Review berkala:</strong> Review ruang secara berkala dan sesuaikan dengan kebutuhan</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan standar penamaan untuk referensi tim</li>
            <li><strong>Komunikasi:</strong> Komunikasikan lokasi ruang kepada semua guru dan siswa</li>
            <li><strong>Backup:</strong> Catat ruang yang dibuat untuk backup</li>
            <li><strong>Testing:</strong> Uji coba ruang sebelum digunakan dalam jadwal</li>
            <li><strong>Maintenance:</strong> Jadwalkan maintenance rutin untuk komputer di setiap ruang</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menambah ruang:</strong>
                <span>Pastikan semua field wajib sudah terisi. Pastikan kapasitas adalah angka positif. Pastikan tidak ada error koneksi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kapasitas tidak valid:</strong>
                <span>Pastikan kapasitas adalah angka positif. Kapasitas tidak boleh 0 atau negatif.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengedit ruang:</strong>
                <span>Ruang yang sudah digunakan dalam jadwal ujian mungkin memiliki keterbatasan pengeditan. Hapus atau pindahkan data terkait terlebih dahulu jika perlu perubahan besar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menghapus ruang:</strong>
                <span>Ruang yang sudah digunakan dalam jadwal ujian tidak dapat dihapus. Hapus atau pindahkan jadwal terkait terlebih dahulu.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Ruang tidak muncul di jadwal:</strong>
                <span>Pastikan ruang sudah dibuat dan statusnya aktif. Pastikan ruang ditugaskan ke tahun pelajaran dan semester yang benar.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> Ruang ujian bersifat global dan dapat digunakan di semua tahun pelajaran. Tidak perlu membuat ulang ruang setiap tahun pelajaran baru.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan:</strong> Ruang ujian terkait dengan jadwal ujian dan alokasi peserta. Perubahan pada ruang akan mempengaruhi jadwal yang menggunakan ruang tersebut.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validasi Kapasitas:</strong> Sistem akan memvalidasi kapasitas ruang saat alokasi peserta. Pastikan kapasitas diatur dengan benar.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat melihat ruang yang tersedia. Administrator memiliki akses penuh untuk menambah, mengedit, dan menghapus ruang.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Semua operasi Ruang Ujian menggunakan AJAX POST ke controller <code>Cbtruang</code> dan mengembalikan respons JSON. Hanya Administrator yang memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtruang</code></td><td>Tampilkan halaman daftar ruang ujian</td></tr>
                <tr><td>GET</td><td><code>cbtruang/data</code></td><td>Ambil data semua ruang ujian</td></tr>
                <tr><td>POST</td><td><code>cbtruang/add</code></td><td>Tambah ruang ujian baru</td></tr>
                <tr><td>POST</td><td><code>cbtruang/update</code></td><td>Update ruang ujian</td></tr>
                <tr><td>POST</td><td><code>cbtruang/delete</code></td><td>Hapus ruang ujian (single atau bulk)</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtruang/add</code> — Tambah Ruang Ujian</h3>
        <p>Endpoint ini menangani operasi penambahan ruang ujian baru.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>nama_ruang</code></td><td>Ya</td><td>Nama ruang ujian</td></tr>
                <tr><td><code>kode_ruang</code></td><td>Ya</td><td>Kode ruang ujian</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": { "nama_ruang": "...", "kode_ruang": "..." } }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtruang/update</code> — Update Ruang Ujian</h3>
        <p>Endpoint ini menangani operasi update ruang ujian.</p>

        <h3 style="margin-top:20px;">POST <code>cbtruang/delete</code> — Hapus Ruang Ujian</h3>
        <p>Endpoint ini menangani operasi penghapusan ruang ujian (single atau bulk).</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>checked</code></td><td>Ya</td><td>Array ID ruang yang akan dihapus</td></tr>
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
