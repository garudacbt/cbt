if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['kelas-rombel'] = {
    title: 'Kelas / Rombel',
    desc: 'Panduan lengkap pengelolaan kelas dan rombongan belajar di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-school"></i> Pengelolaan Kelas / Rombel</h2>
        <p>Fitur ini digunakan untuk mengelola data kelas atau rombongan belajar di sekolah. Hanya Administrator yang memiliki akses ke menu ini. Kelas digunakan untuk mengelompokkan siswa berdasarkan tingkat dan jurusan. Setiap kelas dapat memiliki wali kelas dan daftar siswa yang terdaftar.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Kelas / Rombel</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Data Umum</code></li>
            <li>Klik submenu <code class="inline">Kelas / Rombel</code></li>
            <li>Halaman Kelas akan ditampilkan dengan tabel daftar kelas untuk tahun pelajaran dan semester aktif</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan Anda login sebagai Administrator. Guru dan siswa tidak memiliki akses ke menu ini. Pastikan juga tahun pelajaran dan semester sudah diaktifkan sebelum mengelola kelas.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Kelas Baru (Single)</h3>
        <ol class="step-list">
            <li>Pada halaman Kelas, klik tombol <code class="inline">+ Kelas</code> di pojok kiri atas</li>
            <li>Halaman Tambah Kelas akan ditampilkan dengan form input</li>
            <li>Isi formulir data kelas:
                <ul class="step-list">
                    <li><strong>Nama Kelas:</strong> Nama lengkap kelas (contoh: X IPA 1, XI IPS 2)</li>
                    <li><strong>Kode Kelas:</strong> Kode singkat untuk kelas (contoh: XIPA1, XIIPS2)</li>
                    <li><strong>Jurusan:</strong> Pilih jurusan untuk kelas ini (opsional, tergantung jenjang sekolah)</li>
                    <li><strong>Level:</strong> Pilih tingkat kelas (contoh: 1 untuk kelas X, 2 untuk kelas XI, dll)</li>
                    <li><strong>Wali Kelas:</strong> Pilih guru yang akan menjadi wali kelas</li>
                    <li><strong>Siswa:</strong> Pilih siswa yang akan dimasukkan ke kelas ini (dapat memilih lebih dari satu)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Kelas baru akan ditambahkan dan akan muncul di tabel</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan nama kelas yang konsisten dengan standar sekolah. Pastikan jurusan dan level sudah dikonfigurasi dengan benar. Siswa yang dipilih akan otomatis terdaftar di kelas tersebut.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Kelas Sekaligus (Bulk Create)</h3>
        <ol class="step-list">
            <li>Pada halaman Kelas, klik tombol <code class="inline">Sekaligus</code> di sebelah tombol <code class="inline">+ Kelas</code></li>
            <li>Modal "Tambah Kelas Sekaligus" akan muncul</li>
            <li>Isi formulir:
                <ul class="step-list">
                    <li><strong>Format Tingkat:</strong> Pilih format angka (Romawi atau Biasa)</li>
                    <li><strong>Tingkat:</strong> Pilih level kelas (contoh: X, XI, XII atau 10, 11, 12)</li>
                    <li><strong>Jumlah:</strong> Masukkan jumlah kelas yang ingin dibuat</li>
                    <li><strong>Format Kelas:</strong> Pilih format (Huruf atau Angka)</li>
                    <li><strong>Mulai dari:</strong> Pilih awal penomoran (contoh: A untuk huruf, 1 untuk angka)</li>
                </ul>
            </li>
            <li>Preview hasil akan muncul di bawah form</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Semua kelas akan ditambahkan sekaligus</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur ini sangat berguna untuk membuat kelas baru di awal tahun pelajaran. Contoh: Format Romawi, Tingkat X, Jumlah 5, Format Huruf, Mulai dari A akan membuat: X A, X B, X C, X D, X E.</div>
        </div>
        <hr>
        <h3>🠊 Mengedit Kelas</h3>
        <ol class="step-list">
            <li>Pada tabel Kelas, cari kelas yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> (ikon pensil) pada baris kelas tersebut</li>
            <li>Halaman Edit Kelas akan ditampilkan dengan data kelas yang sudah terisi</li>
            <li>Ubah data sesuai kebutuhan (nama, kode, jurusan, level, wali kelas, atau siswa)</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Data kelas akan diperbarui</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Perubahan pada kelas akan berdampak pada data siswa, jadwal, dan nilai yang terkait dengan kelas tersebut. Pastikan untuk mempertimbangkan dampaknya sebelum mengubah.</div>
        </div>
        <hr>
        <h3>🠊 Melihat Detail Kelas</h3>
        <ol class="step-list">
            <li>Pada tabel Kelas, cari kelas yang ingin dilihat detailnya</li>
            <li>Klik tombol <code class="inline">Detail</code> (ikon mata) pada baris kelas tersebut</li>
            <li>Halaman Detail Kelas akan ditampilkan dengan informasi lengkap:
                <ul class="step-list">
                    <li>Informasi kelas (nama, kode, jurusan, level)</li>
                    <li>Wali kelas</li>
                    <li>Daftar siswa yang terdaftar</li>
                    <li>Struktur kelas (jika ada)</li>
                </ul>
            </li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Halaman detail berguna untuk melihat komposisi siswa dalam kelas dan memverifikasi data sebelum melakukan perubahan.</div>
        </div>
        <hr>
        <h3>🠊 Menghapus Kelas</h3>
        <ol class="step-list">
            <li>Pada tabel Kelas, cari kelas yang ingin dihapus</li>
            <li>Klik tombol <code class="inline">Hapus</code> (ikon sampah) pada baris kelas tersebut</li>
            <li>Konfirmasi akan muncul: "Hapus Data Kelas? Kelas beserta jumlah siswa akan dihapus"</li>
            <li>Klik tombol <code class="inline">Hapus</code> untuk konfirmasi</li>
            <li>Kelas akan dihapus dari sistem</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Kelas tidak dapat dihapus jika masih digunakan di tabel lain (jadwal, nilai, dll)</li>
                    <li>Penghapusan kelas akan menghapus data kelas_siswa terkait</li>
                    <li>Pastikan untuk backup database sebelum menghapus kelas</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Import Siswa ke Kelas</h3>
        <ol class="step-list">
            <li>Pada tabel Kelas, cari kelas yang ingin diimport siswa</li>
            <li>Klik tombol <code class="inline">Import Siswa</code> (ikon upload) pada baris kelas tersebut</li>
            <li>Halaman Import Siswa akan ditampilkan</li>
            <li>Pilih siswa yang ingin ditambahkan ke kelas</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Siswa akan ditambahkan ke kelas tersebut</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur ini berguna untuk menambah siswa baru ke kelas yang sudah ada. Pastikan siswa sudah terdaftar di sistem sebelum diimport ke kelas.</div>
        </div>
        <hr>
        <h3>🠊 Kenaikan Kelas (Semester 1)</h3>
        <ol class="step-list">
            <li>Pastikan semester aktif adalah Semester 1</li>
            <li>Klik tombol <code class="inline">Kenaikan Kelas</code> di pojok kiri atas</li>
            <li>Halaman Kenaikan Kelas akan ditampilkan</li>
            <li>Pilih kelas asal yang akan dinaikkan</li>
            <li>Sistem akan otomatis menampilkan kelas tujuan yang sesuai</li>
            <li>Pilih siswa yang akan naik kelas (atau pilih semua)</li>
            <li>Pilih mode kenaikan:
                <ul class="step-list">
                    <li><strong>Per Kelas:</strong> Semua siswa di kelas asal dipindahkan ke kelas tujuan</li>
                    <li><strong>Per Siswa:</strong> Pilih siswa tertentu saja untuk dinaikkan</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Proses Kenaikan</code></li>
            <li>Siswa akan dipindahkan ke kelas baru di tahun pelajaran berikutnya</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur ini otomatis menaikkan level kelas (contoh: X ke XI, XI ke XII). Pastikan kelas tujuan sudah dibuat sebelum melakukan kenaikan kelas.</div>
        </div>
        <hr>
        <h3>🠊 Atur Kelas Semester (Semester 2)</h3>
        <ol class="step-list">
            <li>Pastikan semester aktif adalah Semester 2</li>
            <li>Klik tombol <code class="inline">Atur Kelas Semester</code> di pojok kiri atas</li>
            <li>Halaman Copy Kelas akan ditampilkan</li>
            <li>Pilih kelas dari Semester 1 yang ingin disalin</li>
            <li>Masukkan nama kelas baru untuk Semester 2</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Data kelas dan siswa akan disalin ke Semester 2</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur ini berguna untuk menyalin kelas dari Semester 1 ke Semester 2 dalam tahun pelajaran yang sama. Siswa akan otomatis tetap berada di kelas yang sama.</div>
        </div>
        <hr>
        <h3>🠊 Reload Data</h3>
        <ol class="step-list">
            <li>Klik tombol <code class="inline">Reload</code> di pojok kanan atas halaman</li>
            <li>Halaman akan me-refresh dan menampilkan data terbaru</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Kapan digunakan:</strong> Tombol ini berguna jika ada perubahan data yang belum muncul atau jika terjadi error saat loading data.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Persiapan tahun pelajaran:</strong> Pastikan tahun pelajaran dan semester sudah diaktifkan sebelum membuat kelas</li>
            <li><strong>Buat kelas dulu:</strong> Buat kelas sebelum menambah siswa, agar siswa bisa langsung ditugaskan ke kelas</li>
            <li><strong>Gunakan bulk create:</strong> Untuk membuat banyak kelas sekaligus di awal tahun pelajaran, gunakan fitur "Sekaligus"</li>
            <li><strong>Konsistensi naming:</strong> Gunakan format nama kelas yang konsisten (contoh: X IPA 1, XI IPS 2)</li>
            <li><strong>Wali kelas:</strong> Tetapkan wali kelas untuk setiap kelas untuk memudahkan manajemen</li>
            <li><strong>Jurusan:</strong> Hubungkan kelas dengan jurusan yang sesuai untuk memudahkan pengelolaan mapel peminatan</li>
            <li><strong>Kenaikan kelas:</strong> Lakukan kenaikan kelas di akhir tahun pelajaran setelah semua nilai selesai diproses</li>
            <li><strong>Copy semester:</strong> Gunakan fitur "Atur Kelas Semester" untuk menyalin kelas dari SMT 1 ke SMT 2</li>
            <li><strong>Backup sebelum hapus:</strong> Selalu backup database sebelum menghapus kelas</li>
            <li><strong>Testing:</strong> Setelah membuat kelas baru, coba tambahkan siswa untuk memastikan kelas berfungsi dengan benar</li>
            <li><strong>Dokumentasi:</strong> Buat dokumentasi internal tentang struktur kelas untuk referensi tim</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menghapus kelas:</strong>
                <span>Kelas masih digunakan di tabel lain (jadwal, nilai, dll). Hapus atau pindahkan data terkait terlebih dahulu sebelum menghapus kelas.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul di dropdown:</strong>
                <span>Pastikan siswa sudah ditambahkan di menu Data Siswa dan terdaftar untuk tahun pelajaran dan semester aktif. Cek juga apakah siswa sudah memiliki kelas sebelumnya.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Jurusan tidak muncul di dropdown:</strong>
                <span>Pastikan jurusan sudah dibuat di menu Jurusan. Jika jenjang sekolah tidak menggunakan jurusan, field ini mungkin tidak muncul.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kenaikan kelas gagal:</strong>
                <span>Pastikan kelas tujuan sudah dibuat untuk tahun pelajaran berikutnya. Pastikan juga tahun pelajaran baru sudah diaktifkan sebelum melakukan kenaikan kelas.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Bulk create gagal:</strong>
                <span>Pastikan semua field wajib sudah terisi dengan benar. Periksa apakah format tingkat dan format kelas sudah dipilih. Pastikan jumlah kelas tidak melebihi batas yang wajar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Wali kelas tidak tersimpan:</strong>
                <span>Pastikan guru sudah ditambahkan di menu Data Guru dan memiliki jabatan yang sesuai. Cek juga apakah guru sudah memiliki user aktif di sistem.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Copy kelas gagal:</strong>
                <span>Pastikan kelas asal ada di Semester 1 dan nama kelas baru belum ada di Semester 2. Pastikan juga semester aktif adalah Semester 2.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Kelas per tahun pelajaran:</strong> Kelas dibuat per tahun pelajaran dan semester. Kelas di tahun pelajaran berbeda adalah data yang terpisah, sehingga perlu dibuat ulang atau disalin setiap tahun pelajaran baru.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Siswa di kelas:</strong> Siswa dapat berada di lebih dari satu kelas dalam tahun pelajaran yang sama (misalnya kelas utama dan kelas tambahan). Namun, untuk keperluan rapor, sistem akan menggunakan kelas utama siswa.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Wali kelas:</strong> Wali kelas bertanggung jawab atas manajemen kelas termasuk input nilai rapor dan catatan siswa. Pastikan wali kelas memiliki akses yang sesuai di sistem.
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Semua operasi Kelas / Rombel menggunakan AJAX ke controller <code>Datakelas</code> dan mengembalikan respons JSON. Hanya Administrator yang dapat mengakses endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>datakelas</code></td><td>Tampilkan halaman Kelas / Rombel</td></tr>
                <tr><td>POST</td><td><code>datakelas/read</code></td><td>Ambil data kelas untuk DataTables (dengan sorting &amp; filter)</td></tr>
                <tr><td>POST</td><td><code>datakelas/create</code></td><td>Tambah kelas baru (single)</td></tr>
                <tr><td>POST</td><td><code>datakelas/bulkCreate</code></td><td>Tambah kelas sekaligus (bulk create)</td></tr>
                <tr><td>POST</td><td><code>datakelas/update</code></td><td>Edit kelas yang ada</td></tr>
                <tr><td>POST</td><td><code>datakelas/delete</code></td><td>Hapus kelas</td></tr>
                <tr><td>GET</td><td><code>datakelas/detail/{id}</code></td><td>Tampilkan detail kelas beserta siswa</td></tr>
                <tr><td>POST</td><td><code>datakelas/importSiswa</code></td><td>Import siswa ke kelas yang sudah ada</td></tr>
                <tr><td>GET</td><td><code>datakelas/kenaikanKelas</code></td><td>Tampilkan halaman Kenaikan Kelas</td></tr>
                <tr><td>POST</td><td><code>datakelas/prosesKenaikan</code></td><td>Proses kenaikan kelas ke tahun pelajaran berikutnya</td></tr>
                <tr><td>GET</td><td><code>datakelas/copyKelas</code></td><td>Tampilkan halaman Copy Kelas (Semester 1 ke 2)</td></tr>
                <tr><td>POST</td><td><code>datakelas/prosesCopy</code></td><td>Proses copy kelas dari Semester 1 ke Semester 2</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>datakelas/create</code> — Tambah Kelas (Single)</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>nama_kelas</code></td><td>Ya</td><td>Nama lengkap kelas (contoh: X IPA 1)</td></tr>
                <tr><td><code>kode_kelas</code></td><td>Ya</td><td>Kode singkat kelas (contoh: XIPA1)</td></tr>
                <tr><td><code>jurusan_id</code></td><td>Tidak</td><td>ID jurusan dari tabel <code>master_jurusan</code> (opsional)</td></tr>
                <tr><td><code>level</code></td><td>Ya</td><td>Tingkat kelas (1=X, 2=XI, 3=XII, dst)</td></tr>
                <tr><td><code>guru_id</code></td><td>Tidak</td><td>ID guru yang menjadi wali kelas</td></tr>
                <tr><td><code>siswa</code></td><td>Tidak</td><td>Array ID siswa yang akan dimasukkan ke kelas ini</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }   // atau false jika gagal insert</pre>

        <h3 style="margin-top:20px;">POST <code>datakelas/bulkCreate</code> — Tambah Kelas Sekaligus</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>format_tingkat</code></td><td>Ya</td><td>Format tingkat: <code>romawi</code> atau <code>biasa</code></td></tr>
                <tr><td><code>tingkat</code></td><td>Ya</td><td>Tingkat kelas (X, XI, XII atau 10, 11, 12)</td></tr>
                <tr><td><code>jumlah</code></td><td>Ya</td><td>Jumlah kelas yang akan dibuat</td></tr>
                <tr><td><code>format_kelas</code></td><td>Ya</td><td>Format kelas: <code>huruf</code> atau <code>angka</code></td></tr>
                <tr><td><code>mulai_dari</code></td><td>Ya</td><td>Awal penomoran (A untuk huruf, 1 untuk angka)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sistem akan generate nama kelas secara otomatis berdasarkan format yang dipilih. Contoh: Format Romawi, Tingkat X, Jumlah 5, Format Huruf, Mulai dari A → X A, X B, X C, X D, X E.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "total": 5 }   // jumlah kelas yang berhasil dibuat</pre>

        <h3 style="margin-top:20px;">POST <code>datakelas/update</code> — Edit Kelas</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_kelas</code></td><td>Ya</td><td>ID kelas yang akan diedit</td></tr>
                <tr><td><code>nama_kelas</code></td><td>Ya</td><td>Nama lengkap kelas</td></tr>
                <tr><td><code>kode_kelas</code></td><td>Ya</td><td>Kode singkat kelas</td></tr>
                <tr><td><code>jurusan_id</code></td><td>Tidak</td><td>ID jurusan (opsional)</td></tr>
                <tr><td><code>level</code></td><td>Ya</td><td>Tingkat kelas</td></tr>
                <tr><td><code>guru_id</code></td><td>Tidak</td><td>ID guru wali kelas</td></tr>
                <tr><td><code>siswa</code></td><td>Tidak</td><td>Array ID siswa (akan replace siswa yang ada)</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }   // atau false jika gagal update</pre>

        <h3 style="margin-top:20px;">POST <code>datakelas/delete</code> — Hapus Kelas</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_kelas</code></td><td>ID kelas yang akan dihapus</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sebelum menghapus, server memeriksa apakah kelas digunakan di tabel lain (jadwal, nilai, dll). Jika ada data terkait, hapus ditolak dan pesan error dikembalikan. Penghapusan kelas juga akan menghapus data di tabel <code>kelas_siswa</code>.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">// Sukses
{ "status": true, "message": "berhasil" }

// Gagal — masih ada relasi
{ "status": false, "message": "Kelas digunakan di 2 tabel:&lt;br&gt;jadwal_pelajaran&lt;br&gt;rapor_nilai" }</pre>

        <h3 style="margin-top:20px;">GET <code>datakelas/detail/{id}</code> — Detail Kelas</h3>
        <p>Mengambil detail kelas beserta daftar siswa yang terdaftar. Tidak perlu parameter POST, ID kelas diambil dari URL.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": true,
  "kelas": {
    "id_kelas": 1,
    "nama_kelas": "X IPA 1",
    "kode_kelas": "XIPA1",
    "jurusan": "IPA",
    "level": 1,
    "wali_kelas": "Budi Santoso"
  },
  "siswa": [
    { "id_siswa": 1, "nama": "Ahmad", "nis": "1001" },
    { "id_siswa": 2, "nama": "Budi", "nis": "1002" }
  ]
}</pre>

        <h3 style="margin-top:20px;">POST <code>datakelas/importSiswa</code> — Import Siswa ke Kelas</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_kelas</code></td><td>ID kelas tujuan</td></tr>
                <tr><td><code>siswa</code></td><td>Array ID siswa yang akan ditambahkan ke kelas</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Siswa akan ditambahkan ke kelas tanpa menghapus siswa yang sudah ada. Cocok untuk menambah siswa baru ke kelas yang sudah terisi.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "total": 5 }   // jumlah siswa yang berhasil ditambahkan</pre>

        <h3 style="margin-top:20px;">POST <code>datakelas/prosesKenaikan</code> — Proses Kenaikan Kelas</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>kelas_asal</code></td><td>ID kelas asal (tahun pelajaran saat ini)</td></tr>
                <tr><td><code>kelas_tujuan</code></td><td>ID kelas tujuan (tahun pelajaran berikutnya)</td></tr>
                <tr><td><code>siswa</code></td><td>Array ID siswa yang akan dinaikkan</td></tr>
                <tr><td><code>mode</code></td><td>Mode kenaikan: <code>per_kelas</code> atau <code>per_siswa</code></td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sistem akan memindahkan siswa ke kelas baru di tahun pelajaran berikutnya. Level kelas otomatis dinaikkan. Pastikan tahun pelajaran baru sudah diaktifkan sebelum melakukan kenaikan.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "total": 30 }   // jumlah siswa yang berhasil dinaikkan</pre>

        <h3 style="margin-top:20px;">POST <code>datakelas/prosesCopy</code> — Copy Kelas (Semester 1 ke 2)</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>kelas_asal</code></td><td>ID kelas dari Semester 1</td></tr>
                <tr><td><code>nama_kelas_baru</code></td><td>Nama kelas baru untuk Semester 2</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Menyalin data kelas dan siswa dari Semester 1 ke Semester 2 dalam tahun pelajaran yang sama. Siswa akan tetap berada di kelas yang sama.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "berhasil" }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Endpoint <code>read</code> menggunakan library Ignited-DataTables — mengembalikan format JSON standar DataTables dengan <code>draw</code>, <code>recordsTotal</code>, <code>recordsFiltered</code>, dan array <code>data</code>. Data kelas difilter berdasarkan tahun pelajaran dan semester aktif. Sorting default: <code>level ASC</code>, <code>nama_kelas ASC</code>.</div>
        </div>
    </div>`
};
