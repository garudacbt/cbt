if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['arsip-materi'] = {
    title: 'Arsip Materi',
    desc: 'Panduan lengkap mengelola materi arsip dari semester sebelumnya di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-archive"></i> Arsip Materi</h2>
        <p>Arsip materi menyimpan materi dari semester atau tahun ajaran sebelumnya untuk referensi atau penggunaan kembali. Materi di arsip tidak dapat diedit tetapi dapat di-copy ke semester aktif jika diperlukan. Administrator dan Guru memiliki akses ke menu ini.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Arsip Materi</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">E-Learning</code></li>
            <li>Klik submenu <code class="inline">Materi</code></li>
            <li>Klik tab <code class="inline">Arsip</code></li>
            <li>Halaman Arsip Materi akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Arsip materi berisi materi dari semester atau tahun ajaran sebelumnya. Materi di arsip tidak dapat diedit, hanya dapat dilihat dan di-copy.</div>
        </div>
        <hr>
        <h3>🠊 Mengakses Arsip</h3>
        <ol class="step-list">
            <li>Pada halaman Arsip Materi, pilih tahun ajaran dari dropdown</li>
            <li>Pilih semester arsip dari dropdown</li>
            <li>Daftar materi arsip akan ditampilkan</li>
            <li>Gunakan filter untuk mempersempit hasil:
                <ul class="step-list">
                    <li><strong>Mapel:</strong> Filter berdasarkan mata pelajaran</li>
                    <li><strong>Kelas:</strong> Filter berdasarkan kelas</li>
                    <li><strong>Status:</strong> Filter berdasarkan status materi</li>
                </ul>
            </li>
            <li>Klik materi untuk melihat detail atau download</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan filter untuk menemukan materi arsip dengan cepat. Arsip sangat berguna untuk referensi materi yang pernah digunakan sebelumnya.</div>
        </div>
        <hr>
        <h3>🠊 Memindahkan Materi ke Arsip</h3>
        <ol class="step-list">
            <li>Materi dapat dipindahkan ke arsip secara otomatis saat tahun ajaran berakhir</li>
            <li>Administrator dapat memindahkan materi ke arsip secara manual:
                <ul class="step-list">
                    <li>Buka menu <code class="inline">E-Learning > Materi</code></li>
                    <li>Pilih materi yang ingin diarsipkan</li>
                    <li>Klik tombol <code class="inline">Arsipkan</code></li>
                    <li>Konfirmasi akan muncul</li>
                    <li>Klik tombol konfirmasi untuk melanjutkan</li>
                </ul>
            </li>
            <li>Materi akan dipindahkan ke arsip dan tidak akan muncul di materi aktif</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Materi yang diarsipkan tidak dapat diedit</li>
                    <li>Materi yang diarsipkan tidak akan muncul untuk siswa</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Copy Materi dari Arsip</h3>
        <ol class="step-list">
            <li>Pada halaman Arsip Materi, cari materi yang ingin di-copy</li>
            <li>Klik tombol <code class="inline">Copy ke Aktif</code> pada materi tersebut</li>
            <li>Pilih tahun ajaran dan semester tujuan</li>
            <li>Pilih mapel dan kelas tujuan</li>
            <li>Edit judul dan deskripsi jika diperlukan</li>
            <li>Klik tombol <code class="inline">Copy</code></li>
            <li>Materi akan di-copy ke semester aktif</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur copy sangat berguna untuk menggunakan kembali materi yang pernah digunakan sebelumnya. Edit judul dan deskripsi sesuai kebutuhan semester baru.</div>
        </div>
        <hr>
        <h3>🠊 Download Materi Arsip</h3>
        <ol class="step-list">
            <li>Pada halaman Arsip Materi, cari materi yang ingin didownload</li>
            <li>Klik tombol <code class="inline">Download</code> pada materi tersebut</li>
            <li>File akan didownload ke perangkat</li>
            <li>File dapat digunakan untuk referensi atau backup lokal</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Download materi arsip untuk backup lokal atau untuk digunakan di luar sistem. Pastikan format file kompatibel dengan perangkat Anda.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Rutin arsip:</strong> Arsipkan materi secara rutin setiap akhir semester</li>
            <li><strong>Organisasi:</strong> Gunakan filter untuk mengorganisasi materi arsip</li>
            <li><strong>Copy untuk reuse:</strong> Gunakan copy untuk menggunakan kembali materi</li>
            <li><strong>Backup lokal:</strong> Download materi arsip untuk backup lokal</li>
            <li><strong>Review:</strong> Review materi sebelum copy ke semester aktif</li>
            <li><strong>Edit judul:</strong> Edit judul dan deskripsi sesuai kebutuhan baru</li>
            <li><strong>Dokumentasi:</strong> Catat materi yang sering di-copy untuk referensi</li>
            <li><strong>Cleanup:</strong> Hapus materi arsip yang tidak diperlukan</li>
            <li><strong>Komunikasi:</strong> Komunikasikan materi arsip kepada guru baru</li>
            <li><strong>Update berkala:</strong> Review arsip secara berkala untuk cleanup</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Arsip tidak muncul:</strong>
                <span>Pastikan tahun ajaran dan semester sudah dipilih dengan benar. Pastikan ada materi yang diarsipkan untuk periode tersebut.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa copy materi:</strong>
                <span>Pastikan semester tujuan sudah aktif. Pastikan mapel dan kelas tujuan sudah ada. Periksa apakah ada error yang ditampilkan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Download gagal:</strong>
                <span>Pastikan koneksi internet stabil. Periksa apakah file masih ada di server. Coba lagi atau hubungi administrator.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Materi tidak dapat diarsipkan:</strong>
                <span>Pastikan materi belum diarsipkan sebelumnya. Pastikan Anda memiliki akses untuk mengarsipkan materi tersebut.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Filter tidak berfungsi:</strong>
                <span>Pastikan filter dipilih dengan benar. Periksa apakah ada data yang sesuai dengan filter yang dipilih.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> Arsip materi dibuat per tahun pelajaran dan semester. Data di tahun pelajaran berbeda adalah data yang terpisah.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Tidak Bisa Diedit:</strong> Materi di arsip tidak dapat diedit. Jika perlu perubahan, copy materi ke semester aktif terlebih dahulu.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru hanya dapat melihat dan copy materi arsip yang mereka buat sendiri. Administrator memiliki akses penuh ke semua arsip.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Otomatis vs Manual:</strong> Materi dapat diarsipkan secara otomatis saat tahun ajaran berakhir atau manual oleh Administrator.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru hanya dapat melihat dan copy materi arsip yang mereka buat sendiri. Administrator memiliki akses penuh ke semua arsip.
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Arsip materi dikelola melalui controller <code>Elearning</code>. Menyalin materi dari arsip ke semester aktif menggunakan endpoint <code>elearning/copyMateri</code>. Administrator dan Guru memiliki akses sesuai hak masing-masing.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>elearning/copyMateri/{id_materi}/{jenis}</code></td><td>Salin materi arsip ke tahun/semester aktif</td></tr>
                <tr><td>POST</td><td><code>elearning/delMateri</code></td><td>Hapus materi (jika masih ada di semester aktif)</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">GET <code>elearning/copyMateri/{id_materi}/{jenis}</code> — Copy ke Aktif</h3>
        <p>Endpoint ini memetakan ulang daftar kelas dari semester lalu ke kelas dengan kode yang sama di semester aktif, lalu insert/update ke tabel <code>kelas_materi</code>.</p>
        <table class="table-custom">
            <thead><tr><th>Parameter</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_materi</code></td><td>ID materi sumber (dari arsip)</td></tr>
                <tr><td><code>jenis</code></td><td><code>1</code> = materi, <code>2</code> = tugas</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "success": true,
  "id_materi": 456,
  "materi_kelas": [ 1, 2, 3 ],
  "kelas_mapped": 3
}</pre>
        <p style="margin-top:8px;"><strong>Respons JSON — materi tidak ditemukan:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "success": false,
  "message": "Materi tidak ditemukan"
}</pre>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <ul style="margin-bottom:0;">
                    <li>Pemetaan kelas dilakukan berdasarkan <em>kode kelas</em> yang sama antara semester lalu dan aktif.</li>
                    <li>Jika materi dengan kode yang sama sudah ada di semester aktif, data akan di-update (bukan dibuat ganda).</li>
                    <li>Materi di arsip (semester lalu) tidak dapat diedit — harus di-copy dulu ke semester aktif.</li>
                    <li>Semua request menggunakan token CSRF dan session login aktif.</li>
                </ul>
            </div>
        </div>
    </div>`
};
