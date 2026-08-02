if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['absensi'] = {
    title: 'Absensi',
    desc: 'Panduan lengkap mengelola absensi siswa di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-user-check"></i> Absensi Siswa</h2>
        <p>Absensi mencatat kehadiran siswa dalam setiap pertemuan pembelajaran. Data absensi akan digunakan untuk perhitungan kehadiran di rapor dan laporan kehadiran bulanan. Guru memiliki akses ke menu ini untuk mengelola absensi siswa.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Absensi</h3>
        <ol class="step-list">
            <li>Login sebagai Guru ke sistem</li>
            <li>Buka menu <code class="inline">E-Learning</code></li>
            <li>Klik submenu <code class="inline">Absensi</code></li>
            <li>Halaman Absensi akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan jadwal pelajaran sudah diatur sebelum melakukan absensi. Absensi akan mengikuti jadwal pelajaran yang telah dibuat.</div>
        </div>
        <hr>
        <h3>🠊 Melakukan Absensi</h3>
        <ol class="step-list">
            <li>Pada halaman Absensi, pilih kelas dari dropdown</li>
            <li>Pilih tanggal absensi dari date picker</li>
            <li>Pilih mata pelajaran dari dropdown (opsional)</li>
            <li>Daftar siswa akan ditampilkan</li>
            <li>Tandai status kehadiran untuk setiap siswa:
                <ul class="step-list">
                    <li><strong>Hadir:</strong> Siswa hadir (default)</li>
                    <li><strong>Izin:</strong> Siswa izin dengan keterangan</li>
                    <li><strong>Sakit:</strong> Siswa sakit dengan keterangan</li>
                    <li><strong>Alpha:</strong> Siswa tidak hadir tanpa keterangan</li>
                </ul>
            </li>
            <li>Tambahkan keterangan jika status Izin atau Sakit</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Absensi akan disimpan dan dapat dilihat oleh siswa</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Lakukan absensi secara rutin setiap pertemuan. Data absensi yang akurat akan memudahkan perhitungan kehadiran di rapor.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Status Kehadiran</h3>
        <ol class="step-list">
            <li><strong>Hadir:</strong> Siswa hadir di kelas pada pertemuan tersebut</li>
            <li><strong>Izin:</strong> Siswa tidak hadir dengan izin (perlu keterangan)</li>
            <li><strong>Sakit:</strong> Siswa tidak hadir karena sakit (perlu keterangan)</li>
            <li><strong>Alpha:</strong> Siswa tidak hadir tanpa keterangan</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Status Izin dan Sakit memerlukan keterangan</li>
                    <li>Alpha akan berdampak negatif pada perhitungan kehadiran</li>
                    <li>Pastikan absensi dilakukan secara akurat dan jujur</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Mengedit Absensi</h3>
        <ol class="step-list">
            <li>Pada halaman Absensi, pilih kelas dan tanggal yang ingin diedit</li>
            <li>Daftar siswa dengan absensi yang sudah ada akan ditampilkan</li>
            <li>Ubah status kehadiran sesuai kebutuhan</li>
            <li>Ubah keterangan jika diperlukan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Absensi akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Perubahan absensi akan mempengaruhi perhitungan kehadiran</li>
                    <li>Pastikan untuk mengkomunikasikan perubahan kepada siswa</li>
                    <li>Absensi yang sudah masuk ke rapor tidak dapat diubah</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Rekap Absensi</h3>
        <ol class="step-list">
            <li>Pada halaman Absensi, klik tombol <code class="inline">Rekap Absensi</code></li>
            <li>Pilih kelas dan periode rekap (mingguan/bulanan)</li>
            <li>Tabel rekap absensi akan ditampilkan dengan:
                <ul class="step-list">
                    <li><strong>Nama Siswa:</strong> Nama siswa</li>
                    <li><strong>Total Hadir:</strong> Jumlah kehadiran</li>
                    <li><strong>Total Izin:</strong> Jumlah izin</li>
                    <li><strong>Total Sakit:</strong> Jumlah sakit</li>
                    <li><strong>Total Alpha:</strong> Jumlah alpha</li>
                    <li><strong>Persentase:</strong> Persentase kehadiran</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Export</code> untuk download rekap</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Rekap absensi sangat berguna untuk melihat overview kehadiran seluruh siswa. Export rekap untuk dokumentasi atau laporan.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Rutin:</strong> Lakukan absensi secara rutin setiap pertemuan</li>
            <li><strong>Akurat:</strong> Pastikan absensi dilakukan secara akurat</li>
            <li><strong>Keterangan:</strong> Berikan keterangan yang jelas untuk Izin dan Sakit</li>
            <li><strong>Komunikasi:</strong> Komunikasikan absensi kepada siswa</li>
            <li><strong>Dokumentasi:</strong> Gunakan rekap absensi untuk dokumentasi</li>
            <li><strong>Review:</strong> Review absensi sebelum menyimpan</li>
            <li><strong>Backup:</strong> Export rekap absensi untuk backup</li>
            <li><strong>Monitoring:</strong> Monitor kehadiran siswa secara berkala</li>
            <li><strong>Follow-up:</strong> Follow-up siswa dengan kehadiran rendah</li>
            <li><strong>Transparansi:</strong> Jelaskan kebijakan absensi kepada siswa</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa melakukan absensi:</strong>
                <span>Pastikan kelas dan tanggal sudah dipilih dengan benar. Pastikan jadwal pelajaran sudah diatur untuk tanggal tersebut. Periksa koneksi internet saat menyimpan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul di daftar:</strong>
                <span>Pastikan siswa sudah dibuat dan ditugaskan ke kelas tersebut. Pastikan tahun pelajaran dan semester aktif sesuai.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Absensi tidak tersimpan:</strong>
                <span>Pastikan semua status sudah ditandai. Periksa koneksi internet saat menyimpan. Coba lagi atau hubungi administrator.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengedit absensi:</strong>
                <span>Absensi yang sudah masuk ke perhitungan rapor tidak dapat diubah. Hubungi administrator jika perlu perubahan absensi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Rekap absensi tidak muncul:</strong>
                <span>Pastikan kelas dan periode sudah dipilih dengan benar. Pastikan ada data absensi untuk periode tersebut. Periksa filter yang digunakan.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> Absensi dibuat per tahun pelajaran dan semester. Data di tahun pelajaran berbeda adalah data yang terpisah.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Integrasi dengan Rapor:</strong> Data absensi akan otomatis masuk ke perhitungan kehadiran di rapor. Pastikan absensi dilakukan secara akurat.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru hanya dapat melihat dan mengelola absensi untuk kelas yang mereka ampu. Administrator memiliki akses penuh ke semua absensi.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan Jadwal:</strong> Absensi mengikuti jadwal pelajaran yang telah dibuat. Pastikan jadwal pelajaran sudah diatur sebelum melakukan absensi.
            </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan Jadwal:</strong> Absensi mengikuti jadwal pelajaran yang telah dibuat. Pastikan jadwal pelajaran sudah diatur sebelum melakukan absensi.
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Data absensi harian & bulanan diambil melalui endpoint AJAX di controller <code>Elearning</code> / <code>Kbm</code> dan mengembalikan respons JSON. Guru dan Administrator memiliki akses sesuai kelas yang diampu.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>POST</td><td><code>elearning/loadabsensi</code></td><td>Ambil daftar siswa & jadwal untuk absensi harian</td></tr>
                <tr><td>POST</td><td><code>elearning/loadabsensibulanan</code></td><td>Ambil rekap absensi bulanan per siswa</td></tr>
                <tr><td>GET</td><td><code>kbm/load_absensi</code></td><td>Ambil detail jadwal harian siswa (siswa)</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>elearning/loadabsensi</code> — Ambil Data Absensi Harian</h3>
        <p>Endpoint ini mengembalikan daftar siswa, jadwal pelajaran hari itu, dan log kehadiran yang sudah ada.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>kelas</code></td><td>ID kelas</td></tr>
                <tr><td><code>thn</code></td><td>Tahun (YYYY)</td></tr>
                <tr><td><code>bln</code></td><td>Bulan (1–12)</td></tr>
                <tr><td><code>tgl</code></td><td>Tanggal (1–31)</td></tr>
                <tr><td><code>hari</code></td><td>ID hari (1=Senin … 7=Minggu)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — struktur:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "log": {
    "<id_siswa>": {
      "nama": "...", "nis": "...", "kelas": "...",
      "status": { "<id_kjm>": { "kehadiran": "1", "keterangan": "..." } }
    }
  },
  "info": { "libur": "7", ... },
  "jadwal": [ { "id_mapel": "5", "dari": "07:00", "sampai": "07:45", ... } ],
  "materi": [ ... ],
  "id_mapel": [ ... ],
  "now": "2026-07-20 07:30:00"
}</pre>

        <h3 style="margin-top:20px;">POST <code>elearning/loadabsensibulanan</code> — Rekap Bulanan</h3>
        <p>Endpoint ini mengembalikan matriks kehadiran siswa per hari dalam satu bulan.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>kelas</code></td><td>ID kelas</td></tr>
                <tr><td><code>bln</code></td><td>Bulan (1–12)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — struktur:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "jadwal": { ... },
  "jadwal_materi": { ... },
  "logs": { "<id_siswa>": { "1": { "2026-07-01": {...} } } },
  "info": [ ... ],
  "jadwal_mapel": [ ... ],
  "arrMapel": [ ... ]
}</pre>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <ul style="margin-bottom:0;">
                    <li>Status kehadiran: <code>1</code>=Hadir, <code>2</code>=Izin, <code>3</code>=Sakit, <code>4</code>=Alpha.</li>
                    <li>Absensi mengikuti jadwal pelajaran — pastikan jadwal sudah diatur.</li>
                    <li>Data absensi mengalir ke Kehadiran Harian/Bulanan & Rapor.</li>
                    <li>Semua request menggunakan token CSRF dan session login aktif.</li>
                </ul>
            </div>
        </div>
    </div>`
};
