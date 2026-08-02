if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['copy-jadwal'] = {
    title: 'Copy Jadwal',
    desc: 'Panduan lengkap menyalin jadwal pelajaran dari kelas lain di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-copy"></i> Menyalin Jadwal Pelajaran</h2>
        <p>Fitur copy jadwal memungkinkan menyalin jadwal dari kelas sumber ke kelas tujuan, menghemat waktu dalam pembuatan jadwal. Fitur ini sangat berguna untuk kelas paralel atau kelas dengan struktur jadwal yang sama. Administrator dan Guru memiliki akses ke menu ini.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Fitur Copy Jadwal</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">E-Learning</code></li>
            <li>Klik submenu <code class="inline">Jadwal Pelajaran</code></li>
            <li>Halaman Jadwal Pelajaran akan ditampilkan</li>
            <li>Klik tombol <code class="inline">Copy Jadwal</code> di pojok kanan atas</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan kelas sumber sudah memiliki jadwal sebelum melakukan copy. Pastikan juga kelas tujuan sudah dibuat untuk tahun pelajaran dan semester aktif.</div>
        </div>
        <hr>
        <h3>🠊 Menyalin Jadwal Pelajaran</h3>
        <ol class="step-list">
            <li>Pada halaman Jadwal Pelajaran, klik tombol <code class="inline">Copy Jadwal</code></li>
            <li>Modal akan muncul dengan pilihan copy jadwal</li>
            <li>Pilih kelas sumber yang jadwalnya ingin disalin dari dropdown</li>
            <li>Pilih kelas tujuan yang akan menerima jadwal dari dropdown</li>
            <li>Pilih hari yang ingin disalin:
                <ul class="step-list">
                    <li><strong>Semua Hari:</strong> Menyalin jadwal untuk semua hari (Senin s.d. Sabtu)</li>
                    <li><strong>Hari Tertentu:</strong> Pilih hari spesifik yang ingin disalin</li>
                </ul>
            </li>
            <li>Periksa ringkasan informasi yang ditampilkan</li>
            <li>Klik tombol <code class="inline">Proses</code></li>
            <li>Jadwal akan disalin ke kelas tujuan</li>
            <li>Konfirmasi keberhasilan akan ditampilkan</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan fitur ini untuk kelas paralel atau kelas dengan struktur jadwal yang sama. Setelah copy, sesuaikan guru pengampu jika berbeda antara kelas sumber dan tujuan.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Opsi Copy</h3>
        <ol class="step-list">
            <li><strong>Copy Semua Hari:</strong> Menyalin seluruh jadwal dari kelas sumber ke kelas tujuan</li>
            <li><strong>Copy Hari Tertentu:</strong> Menyalin jadwal hanya untuk hari yang dipilih</li>
            <li><strong>Timpa Jadwal:</strong> Jadwal yang sudah ada di kelas tujuan akan ditimpa</li>
            <li><strong>Guru Otomatis:</strong> Guru pengampu akan disesuaikan berdasarkan mapel</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Menyalin jadwal akan menimpa jadwal yang sudah ada di kelas tujuan</li>
                    <li>Pastikan untuk membackup jadwal jika diperlukan</li>
                    <li>Guru pengampu mungkin perlu disesuaikan setelah copy</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Verifikasi Setelah Copy</h3>
        <ol class="step-list">
            <li>Setelah proses copy selesai, buka jadwal kelas tujuan</li>
            <li>Periksa apakah jadwal sudah sesuai yang diinginkan</li>
            <li>Sesuaikan guru pengampu jika berbeda</li>
            <li>Sesuaikan ruang kelas jika diperlukan</li>
            <li>Klik <code class="inline">Simpan</code> untuk menyimpan perubahan</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Selalu verifikasi jadwal setelah copy untuk memastikan semua data sudah sesuai, terutama guru pengampu dan ruang kelas.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Kelas paralel:</strong> Gunakan untuk kelas paralel dengan struktur sama</li>
            <li><strong>Backup dulu:</strong> Backup jadwal kelas tujuan sebelum copy</li>
            <li><strong>Verifikasi:</strong> Selalu verifikasi hasil copy</li>
            <li><strong>Sesuaikan guru:</strong> Cek guru pengampu setelah copy</li>
            <li><strong>Hari tertentu:</strong> Gunakan copy hari tertentu untuk perubahan parsial</li>
            <li><strong>Dokumentasi:</strong> Catat kelas yang sudah di-copy untuk referensi</li>
            <li><strong>Testing:</strong> Coba copy ke kelas test terlebih dahulu</li>
            <li><strong>Komunikasi:</strong> Komunikasikan perubahan kepada guru terkait</li>
            <li><strong>Review:</strong> Review jadwal setelah copy sebelum digunakan</li>
            <li><strong>Update berkala:</strong> Update jadwal jika ada perubahan struktur</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kelas sumber tidak muncul:</strong>
                <span>Pastikan kelas sumber sudah memiliki jadwal. Pastikan kelas sumber ada di tahun pelajaran dan semester yang sama.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kelas tujuan tidak muncul:</strong>
                <span>Pastikan kelas tujuan sudah dibuat untuk tahun pelajaran dan semester aktif. Pastikan kelas tujuan belum memiliki jadwal jika ingin copy semua.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Copy jadwal gagal:</strong>
                <span>Pastikan struktur jam pelajaran sama antara kelas sumber dan tujuan. Pastikan mapel di kelas sumber dan tujuan sama atau tersedia.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Guru tidak sesuai:</strong>
                <span>Guru pengampu mungkin berbeda antara kelas sumber dan tujuan. Sesuaikan guru setelah copy melalui edit jadwal.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Jadwal tidak lengkap:</strong>
                <span>Pastikan memilih "Semua Hari" jika ingin menyalin seluruh jadwal. Periksa apakah hari yang diinginkan sudah dipilih.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> Copy jadwal hanya berlaku untuk tahun pelajaran dan semester yang sama. Data di tahun pelajaran berbeda adalah data yang terpisah.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Timpa Jadwal:</strong> Copy jadwal akan menimpa jadwal yang sudah ada di kelas tujuan. Pastikan untuk backup jika diperlukan.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Guru Pengampu:</strong> Guru pengampu akan disesuaikan berdasarkan mapel. Namun, jika guru berbeda antara kelas, perlu disesuaikan manual.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru hanya dapat copy jadwal untuk kelas yang mereka ampu. Administrator memiliki akses penuh ke semua kelas.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru hanya dapat copy jadwal untuk kelas yang mereka ampu. Administrator memiliki akses penuh ke semua kelas.
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Fitur Copy Jadwal dijalankan melalui endpoint <code>elearning/copy_jadwal</code> menggunakan AJAX POST dan mengembalikan respons JSON. Administrator dan Guru memiliki akses sesuai hak kelas masing-masing.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>POST</td><td><code>elearning/copy_jadwal</code></td><td>Menyalin jadwal dari tahun/semester lalu ke aktif</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>elearning/copy_jadwal</code> — Salin Jadwal</h3>
        <p>Endpoint ini menghapus jadwal KBM pada tahun/semester aktif target, lalu menyalin struktur jadwal dari tahun/semester sumber ke kelas target.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>tp</code></td><td>ID tahun pelajaran target (aktif)</td></tr>
                <tr><td><code>smt</code></td><td>ID semester target (aktif)</td></tr>
                <tr><td><code>thnLalu</code></td><td>Nama/tahun pelajaran sumber (misal "2024/2025")</td></tr>
                <tr><td><code>smtLalu</code></td><td>ID semester sumber</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": true,
  "insert": [ ... ],
  "update": [ ... ]
}</pre>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <ul style="margin-bottom:0;">
                    <li>Copy jadwal akan menghapus jadwal KBM yang sudah ada di tahun/semester target sebelum menyalin.</li>
                    <li>Pastikan struktur jam pelajaran (Setting KBM) sumber & target sudah sama agar hasil akurat.</li>
                    <li>Guru pengampu akan disesuaikan otomatis berdasarkan mapel di kelas target.</li>
                    <li>Semua request menggunakan token CSRF dan session login aktif.</li>
                </ul>
            </div>
        </div>
    </div>`
};
