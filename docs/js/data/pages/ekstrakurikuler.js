if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['ekstrakurikuler'] = {
    title: 'Ekstrakurikuler',
    desc: 'Panduan lengkap pengelolaan ekstrakurikuler dan mata pelajaran gabungan di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-chess"></i> Pengelolaan Ekstrakurikuler</h2>
        <p>Fitur ini digunakan untuk mengelola data ekstrakurikuler dan mata pelajaran gabungan di sekolah. Hanya Administrator yang memiliki akses ke menu ini. Ekstrakurikuler dapat diatur per kelas dengan penugasan siswa yang mengikuti kegiatan tersebut.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Ekstrakurikuler</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Data Umum</code></li>
            <li>Klik submenu <code class="inline">Ekstrakurikuler</code></li>
            <li>Halaman Ekstrakurikuler akan ditampilkan dengan tabel daftar ekskul untuk tahun pelajaran dan semester aktif</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan Anda login sebagai Administrator. Guru dan siswa tidak memiliki akses ke menu ini. Pastikan juga tahun pelajaran dan semester sudah diaktifkan sebelum mengelola ekstrakurikuler.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Ekstrakurikuler Baru</h3>
        <ol class="step-list">
            <li>Pada halaman Ekstrakurikuler, klik tombol <code class="inline">Tambah Ekskul</code> di pojok kiri atas</li>
            <li>Modal "Tambah Ekstrakurikuler" akan muncul dengan form input</li>
            <li>Isi formulir data ekskul:
                <ul class="step-list">
                    <li><strong>Ekstrakurikuler:</strong> Nama lengkap ekstrakurikuler (wajib diisi)</li>
                    <li><strong>Kode:</strong> Kode singkat untuk ekskul (wajib diisi)</li>
                    <li><strong>Mapel Agama:</strong> Pilih "Ya" jika ini adalah mata pelajaran agama, "Bukan" jika bukan</li>
                    <li><strong>Kelas Gabungan:</strong> Pilih "Ya" jika ekskul ini digabungkan antar kelas, "Tidak" jika per kelas</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Ekskul baru akan ditambahkan dan akan muncul di tabel</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan nama ekskul yang jelas dan konsisten. Kode ekskul akan digunakan untuk referensi internal. Mapel Agama dan Kelas Gabungan akan mempengaruhi cara pengelolaan kelas dan siswa.</div>
        </div>
        <hr>
        <h3>🠊 Mengedit Ekstrakurikuler</h3>
        <ol class="step-list">
            <li>Pada tabel Ekstrakurikuler, cari ekskul yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> (warna kuning) pada baris ekskul tersebut</li>
            <li>Modal "Edit Ekstrakurikuler" akan ditampilkan dengan data ekskul yang sudah terisi</li>
            <li>Ubah data sesuai kebutuhan (nama, kode, mapel agama, kelas gabungan)</li>
            <li>Klik tombol <code class="inline">Simpan Perubahan</code></li>
            <li>Data ekskul akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan Penting:</strong>
                <ul>
                    <li>Anda <strong>harus mengatur ulang pengampu</strong> (Jabatan Guru) ketika merubah data ekstrakurikuler</li>
                    <li>Khususnya ketika merubah <strong>agama</strong> dan <strong>kelas gabungan</strong></li>
                    <li>Perubahan ini akan berdampak pada penugasan guru dan jadwal pelajaran</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Menghapus Ekstrakurikuler</h3>
        <ol class="step-list">
            <li>Pada tabel Ekstrakurikuler, cari ekskul yang ingin dihapus</li>
            <li>Klik tombol <code class="inline">Hapus</code> (warna merah) pada baris ekskul tersebut</li>
            <li>Konfirmasi akan muncul: "Anda yakin? mapel ini akan dihapus!"</li>
            <li>Klik tombol <code class="inline">Hapus!</code> untuk konfirmasi</li>
            <li>Ekskul akan dihapus dari sistem</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Ekskul tidak dapat dihapus jika masih digunakan di tabel lain (kelas, jadwal, nilai, dll)</li>
                    <li>Sistem akan menampilkan daftar tabel yang masih menggunakan ekskul tersebut jika penghapusan gagal</li>
                    <li>Hapus atau pindahkan data terkait terlebih dahulu sebelum menghapus ekskul</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Mengatur Kelas dan Siswa</h3>
        <ol class="step-list">
            <li>Pada tabel Ekstrakurikuler, cari ekskul yang ingin diatur kelas dan siswanya</li>
            <li>Klik tombol <code class="inline">+</code> (warna biru) pada kolom "Kelas & Siswa"</li>
            <li>Halaman Detail Ekstrakurikuler akan ditampilkan</li>
            <li>Pilih kelas yang ingin ditugaskan untuk ekskul ini</li>
            <li>Untuk setiap kelas, pilih siswa yang mengikuti ekskul tersebut</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Kelas dan siswa akan ditugaskan ke ekskul tersebut</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Untuk ekskul dengan tipe "Kelas Gabungan", siswa dari berbagai kelas dapat digabungkan. Untuk ekskul biasa, setiap kelas memiliki kelompok siswa sendiri.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Mapel Agama</h3>
        <ol class="step-list">
            <li><strong>Mapel Agama = Ya:</strong> Ekskul ini dianggap sebagai mata pelajaran agama</li>
            <li>Siswa akan mengikuti mapel agama sesuai agama yang dianut</li>
            <li>Guru pengampu harus memiliki jabatan yang sesuai dengan agama tersebut</li>
            <li>Contoh: Agama Islam, Agama Kristen, Agama Katolik, dll</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Pengaturan Mapel Agama akan mempengaruhi penugasan guru dan jadwal pelajaran. Pastikan untuk mengatur ulang jabatan guru jika mengubah pengaturan ini.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Kelas Gabungan</h3>
        <ol class="step-list">
            <li><strong>Kelas Gabungan = Ya:</strong> Ekskul ini menggabungkan siswa dari berbagai kelas</li>
            <li>Siswa dari beberapa kelas dapat mengikuti ekskul yang sama dalam satu kelompok</li>
            <li>Cocok untuk ekskul seperti Pramuka, PMR, Paskibra, dll</li>
            <li><strong>Kelas Gabungan = Tidak:</strong> Ekskul ini diatur per kelas</li>
            <li>Setiap kelas memiliki kelompok siswa sendiri untuk ekskul tersebut</li>
            <li>Cocok untuk ekskul yang memerlukan pembinaan per kelas</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan Kelas Gabungan untuk ekskul yang bersifat organisasi atau kegiatan bersama. Gunakan mode per kelas untuk ekskul yang memerlukan pembinaan intensif per kelas.</div>
        </div>
        <hr>
        <h3>🠊 Reload Data</h3>
        <ol class="step-list">
            <li>Klik tombol <code class="inline">Reload</code> di pojok kiri atas halaman</li>
            <li>Halaman akan me-refresh dan menampilkan data terbaru</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Kapan digunakan:</strong> Tombol ini berguna jika ada perubahan data yang belum muncul atau jika terjadi error saat loading data.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Persiapan tahun pelajaran:</strong> Pastikan tahun pelajaran dan semester sudah diaktifkan sebelum mengelola ekskul</li>
            <li><strong>Konsistensi naming:</strong> Gunakan format nama ekskul yang konsisten dengan standar sekolah</li>
            <li><strong>Kode unik:</strong> Gunakan kode yang unik dan mudah diingat untuk setiap ekskul</li>
            <li><strong>Mapel Agama:</strong> Atur dengan benar untuk memudahkan penugasan guru agama</li>
            <li><strong>Kelas Gabungan:</strong> Pilih tipe yang sesuai dengan karakteristik ekskul</li>
            <li><strong>Pengampu guru:</strong> Selalu atur ulang jabatan guru setelah mengubah data ekskul</li>
            <li><strong>Penugasan siswa:</strong> Lakukan penugasan siswa secara berkala untuk memastikan data akurat</li>
            <li><strong>Backup sebelum hapus:</strong> Selalu backup database sebelum menghapus ekskul</li>
            <li><strong>Dokumentasi:</strong> Buat dokumentasi internal tentang daftar ekskul untuk referensi tim</li>
            <li><strong>Testing:</strong> Setelah membuat ekskul baru, coba atur kelas dan siswa untuk memastikan berfungsi dengan benar</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menghapus ekskul:</strong>
                <span>Ekskul masih digunakan di tabel lain (kelas, jadwal, nilai, dll). Hapus atau pindahkan data terkait terlebih dahulu. Sistem akan menampilkan daftar tabel yang masih menggunakan ekskul tersebut.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul di daftar:</strong>
                <span>Pastikan siswa sudah ditambahkan di menu Data Siswa dan terdaftar untuk tahun pelajaran dan semester aktif. Pastikan juga kelas sudah dipilih dengan benar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kelas tidak muncul di dropdown:</strong>
                <span>Pastikan kelas sudah dibuat di menu Kelas / Rombel untuk tahun pelajaran dan semester aktif. Kelas yang belum dibuat tidak akan muncul dalam daftar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Guru tidak terhubung ke ekskul:</strong>
                <span>Pastikan guru sudah ditugaskan sebagai pengampu ekskul di menu Jabatan Guru. Khusus untuk Mapel Agama, pastikan guru memiliki jabatan yang sesuai dengan agama tersebut.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Perubahan tidak tersimpan:</strong>
                <span>Pastikan semua field wajib sudah terisi dengan benar. Periksa koneksi internet saat menyimpan data. Cek apakah ada error yang ditampilkan di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Jadwal tidak muncul:</strong>
                <span>Pastikan ekskul sudah diatur dengan kelas dan siswa yang benar. Pastikan juga guru pengampu sudah ditugaskan. Cek pengaturan tahun pelajaran dan semester aktif.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ekskul per tahun pelajaran:</strong> Penugasan kelas dan siswa ke ekskul dilakukan per tahun pelajaran dan semester. Data di tahun pelajaran berbeda adalah data yang terpisah, sehingga perlu diatur ulang setiap tahun pelajaran baru.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Mapel Agama:</strong> Mapel Agama adalah ekskul khusus yang mengikuti agama siswa. Siswa Muslim akan mengikuti Agama Islam, siswa Kristen mengikuti Agama Kristen, dan seterusnya. Guru pengampu harus memiliki jabatan yang sesuai.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Kelas Gabungan:</strong> Ekskul dengan tipe Kelas Gabungan memungkinkan siswa dari berbagai kelas untuk bergabung dalam satu kelompok. Ini cocok untuk kegiatan organisasi atau ekskul yang bersifat lintas kelas.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Pengampu Guru:</strong> Setiap ekskul harus memiliki guru pengampu yang ditugaskan melalui menu Jabatan Guru. Perubahan pada data ekskul (terutama Mapel Agama dan Kelas Gabungan) mengharuskan pengaturan ulang jabatan guru.
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Semua operasi Ekstrakurikuler menggunakan AJAX ke controller <code>Dataekskul</code> dan mengembalikan respons JSON. Hanya Administrator yang dapat mengakses endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>dataekskul</code></td><td>Tampilkan halaman Ekstrakurikuler</td></tr>
                <tr><td>POST</td><td><code>dataekskul/read</code></td><td>Ambil data ekskul untuk DataTables (dengan sorting &amp; filter)</td></tr>
                <tr><td>POST</td><td><code>dataekskul/create</code></td><td>Tambah ekstrakurikuler baru</td></tr>
                <tr><td>POST</td><td><code>dataekskul/update</code></td><td>Edit ekstrakurikuler yang ada</td></tr>
                <tr><td>POST</td><td><code>dataekskul/delete</code></td><td>Hapus ekstrakurikuler</td></tr>
                <tr><td>GET</td><td><code>dataekskul/detail/{id}</code></td><td>Tampilkan halaman detail ekskul untuk atur kelas & siswa</td></tr>
                <tr><td>POST</td><td><code>dataekskul/saveKelasSiswa</code></td><td>Simpan penugasan kelas dan siswa ke ekskul</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>dataekskul/create</code> — Tambah Ekskul</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>nama_ekskul</code></td><td>Ya</td><td>Nama lengkap ekstrakurikuler</td></tr>
                <tr><td><code>kode</code></td><td>Ya</td><td>Kode singkat ekskul (unik)</td></tr>
                <tr><td><code>mapel_agama</code></td><td>Ya</td><td>1 jika mapel agama, 0 jika bukan</td></tr>
                <tr><td><code>kelas_gabungan</code></td><td>Ya</td><td>1 jika kelas gabungan, 0 jika per kelas</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }   // atau false jika gagal insert</pre>

        <h3 style="margin-top:20px;">POST <code>dataekskul/update</code> — Edit Ekskul</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_ekskul</code></td><td>Ya</td><td>ID ekskul yang akan diedit</td></tr>
                <tr><td><code>nama_ekskul</code></td><td>Ya</td><td>Nama lengkap ekstrakurikuler</td></tr>
                <tr><td><code>kode</code></td><td>Ya</td><td>Kode singkat ekskul</td></tr>
                <tr><td><code>mapel_agama</code></td><td>Ya</td><td>1 jika mapel agama, 0 jika bukan</td></tr>
                <tr><td><code>kelas_gabungan</code></td><td>Ya</td><td>1 jika kelas gabungan, 0 jika per kelas</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Perubahan pada field <code>mapel_agama</code> atau <code>kelas_gabungan</code> mengharuskan pengaturan ulang jabatan guru di menu Jabatan Guru.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }   // atau false jika gagal update</pre>

        <h3 style="margin-top:20px;">POST <code>dataekskul/delete</code> — Hapus Ekskul</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_ekskul</code></td><td>ID ekskul yang akan dihapus</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sebelum menghapus, server memeriksa apakah ekskul digunakan di tabel lain (kelas, jadwal, nilai, dll). Jika ada data terkait, hapus ditolak dan pesan error dikembalikan.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">// Sukses
{ "status": true, "message": "berhasil" }

// Gagal — masih ada relasi
{ "status": false, "message": "Ekskul digunakan di 2 tabel:&lt;br&gt;kelas_siswa&lt;br&gt;jadwal_pelajaran" }</pre>

        <h3 style="margin-top:20px;">GET <code>dataekskul/detail/{id}</code> — Detail Ekskul</h3>
        <p>Mengambil detail ekskul beserta daftar kelas dan siswa yang sudah ditugaskan. Tidak perlu parameter POST, ID ekskul diambil dari URL.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": true,
  "ekskul": {
    "id_ekskul": 1,
    "nama_ekskul": "Pramuka",
    "kode": "PRM",
    "mapel_agama": 0,
    "kelas_gabungan": 1
  },
  "kelas": [
    { "id_kelas": 1, "nama_kelas": "X IPA 1", "siswa": [...] },
    { "id_kelas": 2, "nama_kelas": "X IPA 2", "siswa": [...] }
  ]
}</pre>

        <h3 style="margin-top:20px;">POST <code>dataekskul/saveKelasSiswa</code> — Simpan Kelas & Siswa</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_ekskul</code></td><td>ID ekskul yang akan diatur</td></tr>
                <tr><td><code>kelas</code></td><td>Array data kelas dan siswa — tiap item berisi <code>id_kelas</code> dan array <code>siswa</code> (ID siswa)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Menyimpan penugasan kelas dan siswa ke ekskul. Data lama akan dihapus dan diganti dengan data baru. Untuk ekskul dengan tipe kelas gabungan, siswa dari berbagai kelas dapat digabungkan.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "kelas": [
    { "id_kelas": 1, "siswa": [1, 2, 3] },
    { "id_kelas": 2, "siswa": [4, 5, 6] }
  ]
}
// Response
{ "status": true, "total": 6 }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Endpoint <code>read</code> menggunakan library Ignited-DataTables — mengembalikan format JSON standar DataTables dengan <code>draw</code>, <code>recordsTotal</code>, <code>recordsFiltered</code>, dan array <code>data</code>. Data ekskul difilter berdasarkan tahun pelajaran dan semester aktif. Sorting default: <code>nama_ekskul ASC</code>.</div>
        </div>
    </div>`
};
