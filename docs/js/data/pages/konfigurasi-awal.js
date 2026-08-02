if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['konfigurasi-awal'] = {
    title: 'Konfigurasi Awal',
    desc: 'Dua tahap setup GarudaCBT: setup database via installer, lalu setup admin & sekolah via wizard.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-route"></i> Alur Instalasi: Dua Tahap</h2>
        <p>Proses setup GarudaCBT dilakukan dalam dua tahap yang berbeda, masing-masing memiliki URL dan teknologi tersendiri:</p>
        <table class="table-custom">
            <thead><tr><th>Tahap</th><th>URL</th><th>Teknologi</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr>
                    <td><strong>Tahap 1</strong></td>
                    <td><code>/installer</code></td>
                    <td>PHP Standalone</td>
                    <td>Setup database — buat database, import tabel, tulis <code>database.php</code></td>
                </tr>
                <tr>
                    <td><strong>Tahap 2</strong></td>
                    <td><code>/install</code></td>
                    <td>CodeIgniter Controller</td>
                    <td>Setup aplikasi — buat akun admin, isi profil sekolah</td>
                </tr>
            </tbody>
        </table>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>Kedua tahap harus diselesaikan secara berurutan. Tahap 2 tidak akan bisa diakses dengan benar sebelum database siap dari Tahap 1.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-database"></i> Tahap 1: Setup Database (<code>/installer</code>)</h2>
        <p>
            Buka <code class="inline">http://domain-anda/installer</code> di browser.
            Halaman ini berjalan dari folder <code class="inline">installer/</code> sebagai PHP standalone — 
            tidak melalui CodeIgniter, sehingga bisa diakses meski database belum terkonfigurasi.
        </p>

        <h3>Form Konfigurasi Database</h3>
        <table class="table-custom">
            <thead><tr><th>Field</th><th>Contoh Nilai</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td>Host Name</td><td><code>localhost</code></td><td>Host MySQL. Di shared hosting bisa berupa nama host khusus.</td></tr>
                <tr><td>Host Username</td><td><code>root</code></td><td>Username MySQL yang punya hak akses</td></tr>
                <tr><td>Host Password</td><td><em>(kosong)</em></td><td>Password MySQL. Boleh kosong untuk XAMPP/Laragon default.</td></tr>
                <tr><td>Nama Database</td><td><code>garudacbt</code></td><td>Nama database. Jangan gunakan spasi.</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:16px;">Yang Terjadi Setelah Submit</h3>
        <p>Installer mendeteksi kondisi sistem secara otomatis, lalu menjalankan proses yang sesuai:</p>
        <ol class="step-list">
            <li>Deteksi kondisi: cek apakah <code>database.php</code> sudah ada, database sudah ada, dan tabel sudah ada</li>
            <li>Buat database jika belum ada: <code>CREATE DATABASE IF NOT EXISTS \`nama_db\` CHARACTER SET utf8mb4</code></li>
            <li>Tulis konfigurasi ke <code>application/config/database.php</code> dari template dengan mengganti placeholder</li>
            <li>Import skema tabel dari <code>assets/app/db/master.sql</code> — hanya jika tabel belum ada</li>
            <li>Setelah sukses, browser redirect ke <code>/init</code> untuk inisialisasi, lalu ke <code>/install</code> untuk Tahap 2</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>File <code>application/config/database.php</code> harus <strong>writable</strong> saat proses ini. Jika gagal, ubah permission ke <code>666</code> sementara, kembalikan ke <code>644</code> setelah selesai.</div>
        </div>

        <h3 style="margin-top:16px;">Juga Bisa Digunakan untuk Update</h3>
        <p>Installer mendeteksi jika database atau tabel sudah ada, dan akan melewati langkah yang tidak diperlukan — sehingga aman dijalankan ulang saat melakukan update versi aplikasi.</p>
        <table class="table-custom">
            <thead><tr><th>Kondisi Terdeteksi</th><th>Tindakan</th></tr></thead>
            <tbody>
                <tr><td>Config kosong / database belum ada</td><td>Jalankan semua langkah dari awal</td></tr>
                <tr><td>Database sudah ada, tabel belum ada</td><td>Lewati pembuatan database, langsung import tabel</td></tr>
                <tr><td>Database &amp; tabel sudah ada</td><td>Lewati semua, langsung redirect ke tahap berikutnya</td></tr>
            </tbody>
        </table>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-magic"></i> Tahap 2: Setup Aplikasi (<code>/install</code>)</h2>
        <p>
            Setelah database siap, sistem otomatis mengarahkan ke <code class="inline">/install</code> — 
            halaman wizard berbasis CodeIgniter yang menangani setup akun administrator dan profil sekolah.
        </p>
        <p>Wizard mendeteksi kondisi database dan menampilkan langkah yang belum selesai:</p>
        <table class="table-custom">
            <thead><tr><th>Kondisi</th><th>Langkah Ditampilkan</th></tr></thead>
            <tbody>
                <tr><td>Tabel sudah ada, admin belum ada</td><td>Langkah 1: Setup Akun Administrator</td></tr>
                <tr><td>Admin sudah ada, profil sekolah belum ada</td><td>Langkah 2: Profil Sekolah</td></tr>
                <tr><td>Semua sudah ada</td><td>Redirect ke <code>/update</code> (proses migrasi)</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:16px;"><i class="fas fa-user-shield"></i> Langkah 1: Setup Akun Administrator</h3>
        <p>Buat akun administrator pertama untuk login ke panel admin.</p>
        <table class="table-custom">
            <thead><tr><th>Field</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td>Nama Lengkap</td><td>Nama lengkap — digunakan sebagai nama tampilan di aplikasi</td></tr>
                <tr><td>Username</td><td>Username untuk login — catat dan simpan dengan aman</td></tr>
                <tr><td>Password</td><td>Minimal 6 karakter — disimpan dengan enkripsi bcrypt</td></tr>
            </tbody>
        </table>
        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div><strong>Simpan username dan password ini.</strong> Tidak ada fitur lupa password bawaan — jika lupa, harus direset langsung di database via phpMyAdmin.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>Email admin dibuat otomatis: <code>strtolower(nama_lengkap)@admin.com</code>. Bisa diubah nanti via menu <strong>Pengaturan → Manajemen Pengguna</strong>.</div>
        </div>

        <h3 style="margin-top:16px;"><i class="fas fa-school"></i> Langkah 2: Profil Sekolah</h3>
        <p>Isi identitas sekolah yang ditampilkan di seluruh aplikasi, rapor, dan dokumen cetak.</p>
        <table class="table-custom">
            <thead><tr><th>Field</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td>Nama Aplikasi</td><td>Nama yang tampil di header (contoh: GarudaCBT SMAN 1 Kota)</td></tr>
                <tr><td>Nama Sekolah</td><td>Nama resmi sekolah sesuai dokumen</td></tr>
                <tr><td>Jenjang</td><td>SD, SMP, SMA, SMK, MA, MTs, MI, dll</td></tr>
                <tr><td>Satuan Pendidikan</td><td>Contoh: SMA Negeri, SMK Swasta</td></tr>
                <tr><td>Kepala Sekolah</td><td>Nama kepala sekolah aktif</td></tr>
                <tr><td>Alamat, Desa, Kecamatan, Kota, Provinsi</td><td>Alamat lengkap sekolah</td></tr>
            </tbody>
        </table>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Semua data profil sekolah bisa diubah kapan saja via menu <strong>Pengaturan → Profil Sekolah</strong>.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-check-circle"></i> Setelah Instalasi Selesai</h2>
        <p>Setelah kedua tahap selesai, sistem siap digunakan. Langkah awal yang disarankan:</p>
        <ol class="step-list">
            <li>Login sebagai admin menggunakan akun yang baru dibuat</li>
            <li>Buka <strong>Data Umum → Tahun Pelajaran</strong> — tambah dan aktifkan tahun ajaran berjalan</li>
            <li>Tambah data <strong>Mata Pelajaran</strong>, <strong>Jurusan</strong>, dan <strong>Kelas</strong></li>
            <li>Import atau tambah data <strong>Guru</strong> dan <strong>Siswa</strong></li>
            <li>Buat akun login untuk guru dan siswa via <strong>Pengaturan → Manajemen Pengguna</strong></li>
        </ol>
        <div class="info-box success">
            <i class="fas fa-check-circle"></i>
            <div>Lihat panduan <a href="#/alur-awal-tahun">Persiapan Awal Tahun Ajaran</a> untuk urutan lengkap setup data pertama kali.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>

        <h3><i class="fas fa-database" style="width:18px"></i> Tahap 1 — <code>installer/install.php</code> (PHP Standalone)</h3>
        <p>Komunikasi via AJAX POST dengan state machine berbasis field <code>cond</code>:</p>
        <table class="table-custom">
            <thead><tr><th><code>cond</code></th><th>Kondisi</th><th>Tindakan</th></tr></thead>
            <tbody>
                <tr><td><code>0</code></td><td>Request pertama (halaman baru dibuka)</td><td>Deteksi otomatis: cek config, database, tabel</td></tr>
                <tr><td><code>1</code></td><td>Config kosong / database belum ada</td><td>Tampilkan form, minta isi parameter</td></tr>
                <tr><td><code>2</code></td><td>Database ada, tabel belum ada</td><td>Lanjut import tabel dari <code>master.sql</code></td></tr>
                <tr><td><code>3</code></td><td>Database &amp; tabel sudah ada</td><td>Lewati semua, lanjut ke <code>/init</code></td></tr>
                <tr><td><code>4</code></td><td>Validasi gagal — field kosong</td><td>Error: "pastikan semua parameter diisi"</td></tr>
                <tr><td><code>5</code></td><td>File <code>database.php</code> tidak ditemukan</td><td>Error: file config tidak ada</td></tr>
                <tr><td><code>6</code></td><td>Gagal membuat database</td><td>Error: periksa parameter koneksi</td></tr>
                <tr><td><code>7</code></td><td>Gagal tulis <code>database.php</code></td><td>Error: ubah permission ke 777</td></tr>
                <tr><td><code>8</code></td><td>Gagal import <code>master.sql</code></td><td>Error: file SQL tidak valid</td></tr>
                <tr><td><code>9</code></td><td>Selesai</td><td>Sukses — redirect ke <code>/init</code></td></tr>
            </tbody>
        </table>
        <p style="margin-top:10px;"><strong>Format respons JSON:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "cond": 9,
  "type": "success",        // "success" | "info" | "error"
  "message": "Database dan tabel berhasil dibuat.",
  "data": {                 // pre-fill form jika cond = 2 atau 3
    "hostname": "localhost",
    "username": "root",
    "password": "",
    "database": "garudacbt"
  }
}</pre>

        <h3 style="margin-top:20px;"><i class="fas fa-magic" style="width:18px"></i> Tahap 2 — <code>/install</code> (CodeIgniter Controller)</h3>
        <p>Endpoint-endpoint wizard setup aplikasi:</p>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>install</code></td><td>Tampilkan wizard — deteksi kondisi via <code>check_installer()</code></td></tr>
                <tr><td>POST</td><td><code>install/checkDatabase</code></td><td>Validasi koneksi, tulis config, buat database &amp; tabel</td></tr>
                <tr><td>POST</td><td><code>install/createAdmin</code></td><td>Buat akun administrator (hash bcrypt, role <code>'1'</code>)</td></tr>
                <tr><td>POST</td><td><code>install/createSetting</code></td><td>Simpan profil sekolah ke tabel <code>setting</code></td></tr>
                <tr><td>POST</td><td><code>install/createApp</code></td><td>Buat admin + profil sekolah sekaligus dalam satu request</td></tr>
            </tbody>
        </table>
        <p style="margin-top:10px;">Kondisi yang dideteksi <code>check_installer()</code> untuk menentukan langkah wizard:</p>
        <table class="table-custom">
            <thead><tr><th>Return Value</th><th>Kondisi</th><th>Tindakan</th></tr></thead>
            <tbody>
                <tr><td><code>'0'</code></td><td>Instalasi lengkap</td><td>Redirect ke <code>/update</code></td></tr>
                <tr><td><code>'2'</code></td><td>Tabel ada, admin belum ada</td><td>Wizard mulai langkah setup admin</td></tr>
                <tr><td><code>'3'</code></td><td>Admin ada, profil sekolah belum ada</td><td>Wizard mulai langkah profil sekolah</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;"><i class="fas fa-folder" style="width:18px"></i> File-file Terkait</h3>
        <table class="table-custom">
            <thead><tr><th>File</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td><code>installer/index.php</code></td><td>Form HTML + logika AJAX Tahap 1</td></tr>
                <tr><td><code>installer/install.php</code></td><td>Endpoint POST Tahap 1 — orkestrasi pipeline</td></tr>
                <tr><td><code>installer/taskCoreClass.php</code></td><td>Class <code>Core</code> — deteksi kondisi, tulis config</td></tr>
                <tr><td><code>installer/databaseLibrary.php</code></td><td>Class <code>Database</code> — buat database, import SQL</td></tr>
                <tr><td><code>application/controllers/Install.php</code></td><td>Controller Tahap 2 — wizard admin &amp; profil sekolah</td></tr>
                <tr><td><code>assets/app/db/database.php</code></td><td>Template konfigurasi database (berisi placeholder)</td></tr>
                <tr><td><code>assets/app/db/master.sql</code></td><td>Skema SQL lengkap semua tabel aplikasi</td></tr>
            </tbody>
        </table>
    </div>
    `
};
