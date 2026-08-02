if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['data-guru'] = {
    title: 'Guru',
    desc: 'Panduan lengkap pengelolaan data guru di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-chalkboard-teacher"></i> Pengelolaan Data Guru</h2>
        <p>Fitur ini digunakan untuk mengelola data guru di sekolah. Hanya Administrator yang memiliki akses ke menu ini. Data guru mencakup informasi profil, akun login, jabatan pengampu mata pelajaran, dan penugasan ekstrakurikuler.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Guru</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Data Umum</code></li>
            <li>Klik submenu <code class="inline">Guru</code></li>
            <li>Halaman Data Guru akan ditampilkan dengan tabel daftar guru untuk tahun pelajaran dan semester aktif</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan Anda login sebagai Administrator. Guru dan siswa tidak memiliki akses ke menu ini. Pastikan juga tahun pelajaran dan semester sudah diaktifkan sebelum mengelola data guru.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Guru Baru</h3>
        <ol class="step-list">
            <li>Pada halaman Data Guru, klik tombol <code class="inline">Tambah Guru / Import</code> di pojok kanan atas</li>
            <li>Halaman Tambah Data Guru akan ditampilkan</li>
            <li>Pilih metode penambahan:
                <ul class="step-list">
                    <li><strong>Manual:</strong> Isi form data guru satu per satu</li>
                    <li><strong>Import:</strong> Upload file Excel untuk menambah banyak guru sekaligus</li>
                </ul>
            </li>
            <li>Jika menggunakan metode Manual, isi formulir data guru:
                <ul class="step-list">
                    <li><strong>Nama Guru:</strong> Nama lengkap guru (wajib diisi)</li>
                    <li><strong>NIP:</strong> Nomor Induk Pegawai (wajib unik, minimal 6 digit)</li>
                    <li><strong>Email:</strong> Email guru (wajib diisi, format email valid)</li>
                    <li><strong>Username:</strong> Username untuk login guru (wajib unik, minimal 5 karakter)</li>
                    <li><strong>Password:</strong> Password untuk login guru (wajib diisi, minimal 5 karakter)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Guru baru akan ditambahkan dan akun login akan otomatis dibuat</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan NIP sebagai username untuk memudahkan guru mengingat. Password default bisa sama dengan NIP dan dapat diubah oleh guru setelah login pertama.</div>
        </div>
        <hr>
        <h3>🠊 Import Guru</h3>
        <ol class="step-list">
            <li>Pada halaman Data Guru, klik tombol <code class="inline">Tambah Guru / Import</code></li>
            <li>Halaman Tambah Data Guru akan ditampilkan</li>
            <li>Pilih tab <code class="inline">Import</code></li>
            <li>Download template Excel yang tersedia</li>
            <li>Isi template dengan data guru sesuai format yang ditentukan
            <table class="table-custom">
              <thead><tr><th>Kolom</th><th>Keterangan</th><th>Wajib</th></tr></thead>
              <tbody>
                <tr><td>NIP</td><td>Nomor Induk Pegawai (harus unik)</td><td>Ya</td></tr>
                <tr><td>Nama</td><td>Nama lengkap guru</td><td>Ya</td></tr>
                <tr><td>Jenis Kelamin</td><td>L/P</td><td>Ya</td></tr>
                <tr><td>Mapel</td><td>Kode mapel yang diampu</td><td>Ya</td></tr>
                <tr><td>No. HP</td><td>Nomor telepon</td><td>Tidak</td></tr>
                <tr><td>Email</td><td>Email guru</td><td>Tidak</td></tr>
              </tbody>
            </table>
            </li>
            <li>Upload file yang telah diisi</li>
            <li>Klik tombol <code class="inline">Proses</code></li>
            <li>Data guru akan diimpor dan akun login akan otomatis dibuat</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur import sangat berguna untuk menambah banyak guru sekaligus di awal tahun pelajaran. Pastikan format data sesuai dengan template yang disediakan.</div>
        </div>
        <hr>
        <h3>🠊 Update Data Guru</h3>
        <ol class="step-list">
            <li>Pada halaman Data Guru, klik tombol <code class="inline">Update Data</code> di pojok kanan atas</li>
            <li>Halaman Update Data akan ditampilkan</li>
            <li>Pilih file Excel yang berisi data guru yang ingin diupdate</li>
            <li>Upload file tersebut</li>
            <li>Sistem akan memproses dan mengupdate data guru yang ada</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Fitur ini digunakan untuk mengupdate data guru yang sudah ada, bukan untuk menambah guru baru. Gunakan dengan hati-hati untuk menghindari kesalahan data.</div>
        </div>
        <hr>
        <h3>🠊 Mengedit Profil Guru</h3>
        <ol class="step-list">
            <li>Pada tabel Data Guru, cari guru yang ingin diedit profilnya</li>
            <li>Klik tombol <code class="inline">Profile</code> pada baris guru tersebut</li>
            <li>Halaman Edit Data Guru akan ditampilkan dengan tab-tab:
                <ul class="step-list">
                    <li><strong>Profile:</strong> Informasi dasar (nama, NIP, email, jenis kelamin, no HP, agama)</li>
                    <li><strong>Alamat:</strong> Informasi alamat lengkap (NIK, tempat/tanggal lahir, alamat, kecamatan, kota, provinsi, kode pos)</li>
                    <li><strong>Dokumen:</strong> Upload dokumen (KTP, KK, Sertifikat)</li>
                </ul>
            </li>
            <li>Ubah data sesuai kebutuhan pada tab yang relevan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Data profil guru akan diperbarui</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Perubahan pada profil guru akan berdampak pada seluruh sistem. Pastikan untuk mempertimbangkan dampaknya sebelum mengubah data penting seperti NIP atau email.</div>
        </div>
        <hr>
        <h3>🠊 Mengedit Jabatan Guru</h3>
        <ol class="step-list">
            <li>Pada tabel Data Guru, cari guru yang ingin diedit jabatannya</li>
            <li>Klik tombol <code class="inline">Jabatan</code> pada baris guru tersebut</li>
            <li>Halaman Edit Jabatan Guru akan ditampilkan</li>
            <li>Atur jabatan dan penugasan:
                <ul class="step-list">
                    <li><strong>Level:</strong> Pilih level guru (misalnya: Guru Tetap, Guru Honorer, dll)</li>
                    <li><strong>Wali Kelas:</strong> Pilih kelas jika guru menjadi wali kelas</li>
                    <li><strong>Mata Pelajaran:</strong> Pilih mata pelajaran yang diampu dan kelas-kelasnya</li>
                    <li><strong>Ekstrakurikuler:</strong> Pilih ekskul yang dibina dan kelas-kelasnya</li>
                </ul>
            </li>
            <li>Untuk Mapel Agama, pilih kelas berdasarkan agama siswa</li>
            <li>Centang <code class="inline">Copy dari semester sebelumnya</code> jika ingin menyalin penugasan dari periode sebelumnya</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Jabatan dan penugasan guru akan diperbarui</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur Copy dari semester sebelumnya sangat berguna saat awal tahun pelajaran baru untuk menyalin penugasan guru dari semester sebelumnya dengan penyesuaian kelas yang sesuai.</div>
        </div>
        <hr>
        <h3>🠊 Menghapus Guru</h3>
        <ol class="step-list">
            <li>Pada tabel Data Guru, cari guru yang ingin dihapus</li>
            <li>Klik tombol <code class="inline">Hapus</code> (warna merah) pada baris guru tersebut</li>
            <li>Konfirmasi akan muncul: "Anda yakin? Data guru akan dihapus!"</li>
            <li>Klik tombol <code class="inline">Hapus!</code> untuk konfirmasi</li>
            <li>Jika guru masih memiliki data terkait, akan diarahkan ke halaman Detail Guru</li>
            <li>Jika tidak, guru akan dihapus dari sistem beserta akun loginnya</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Guru tidak dapat dihapus jika masih memiliki data di tabel lain (kelas, jadwal, nilai, bank soal, dll)</li>
                    <li>Sistem akan menampilkan daftar tabel yang masih menggunakan data guru tersebut</li>
                    <li>Hapus atau pindahkan data terkait terlebih dahulu sebelum menghapus guru</li>
                    <li>Penghapusan guru akan menghapus akun login guru secara otomatis</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Search Guru</h3>
        <ol class="step-list">
            <li>Gunakan kolom pencarian di pojok kanan atas halaman</li>
            <li>Ketik nama guru, NIP, atau kata kunci lainnya</li>
            <li>Tekan Enter atau klik tombol <code class="inline">Search</code></li>
            <li>Tabel akan menampilkan guru yang sesuai dengan kata kunci pencarian</li>
            <li>Klik tombol <code class="inline">X</code> untuk menghapus pencarian dan menampilkan semua guru</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur search sangat berguna untuk menemukan guru dengan cepat, terutama jika jumlah guru sangat banyak.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Tampilan Data Guru</h3>
        <ol class="step-list">
            <li><strong>No:</strong> Nomor urut guru dalam daftar</li>
            <li><strong>Data Guru:</strong> Menampilkan foto, NIP, nama, level, kelas, dan status (Aktif/Nonaktif)</li>
            <li><strong>Pengampu:</strong> Menampilkan mata pelajaran atau ekskul yang diampu beserta kelas-kelasnya
                <ul class="step-list">
                    <li>Untuk Mapel Agama, kelas dikelompokkan berdasarkan agama siswa</li>
                    <li>Untuk Mapel biasa, kelas ditampilkan dalam satu kelompok</li>
                </ul>
            </li>
            <li><strong>Aksi:</strong> Tombol untuk mengedit profil, mengedit jabatan, dan menghapus guru</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Guru yang belum memiliki penugasan mapel atau ekskul akan menampilkan tanda "-" pada kolom Pengampu.</div>
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
            <li><strong>Persiapan tahun pelajaran:</strong> Pastikan tahun pelajaran dan semester sudah diaktifkan sebelum mengelola data guru</li>
            <li><strong>Konsistensi NIP:</strong> Gunakan format NIP yang konsisten sesuai standar sekolah</li>
            <li><strong>Username yang mudah diingat:</strong> Gunakan NIP sebagai username untuk memudahkan guru</li>
            <li><strong>Password default:</strong> Gunakan password yang mudah diingat (seperti NIP) dan instruksikan guru untuk mengubah setelah login pertama</li>
            <li><strong>Gunakan import:</strong> Untuk menambah banyak guru sekaligus, gunakan fitur Import daripada menambah satu per satu</li>
            <li><strong>Atur jabatan dengan benar:</strong> Pastikan jabatan guru diatur dengan benar untuk memudahkan penugasan jadwal dan nilai</li>
            <li><strong>Mapel Agama:</strong> Untuk mapel agama, atur penugasan berdasarkan agama siswa</li>
            <li><strong>Copy penugasan:</strong> Gunakan fitur Copy dari semester sebelumnya untuk mempercepat penugasan di awal tahun pelajaran</li>
            <li><strong>Backup sebelum hapus:</strong> Selalu backup database sebelum menghapus data guru</li>
            <li><strong>Dokumentasi:</strong> Buat dokumentasi internal tentang daftar guru dan penugasan untuk referensi tim</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menambah guru:</strong>
                <span>Pastikan NIP dan Username belum digunakan oleh guru lain. Sistem mencegah duplikasi data unik ini. Pastikan email format valid dan semua field wajib sudah terisi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Import gagal:</strong>
                <span>Pastikan format file sesuai dengan template. Periksa apakah semua field wajib (nama, NIP, username, password) sudah terisi dengan benar. Pastikan tidak ada duplikasi NIP atau username.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menghapus guru:</strong>
                <span>Guru masih memiliki data di tabel lain (kelas, jadwal, nilai, bank soal, dll). Hapus atau pindahkan data terkait terlebih dahulu. Sistem akan menampilkan daftar tabel yang masih menggunakan data guru tersebut.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Jabatan tidak tersimpan:</strong>
                <span>Pastikan semua field wajib sudah terisi. Periksa apakah kelas sudah dibuat untuk tahun pelajaran dan semester aktif. Pastikan mapel dan ekskul sudah ada di sistem.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Copy penugasan gagal:</strong>
                <span>Pastikan nama kelas di semester sebelumnya dan semester sekarang sesuai atau memiliki mapping yang benar. Jika nama kelas berbeda, sistem mungkin tidak dapat menemukan kelas yang sesuai.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Guru tidak bisa login:</strong>
                <span>Pastikan akun guru dalam status aktif. Cek username dan password yang benar. Jika lupa password, admin dapat mereset password melalui menu User Management.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Mapel tidak muncul di dropdown:</strong>
                <span>Pastikan mapel sudah dibuat di menu Mata Pelajaran. Pastikan juga mapel sudah aktif untuk tahun pelajaran dan semester yang sedang berjalan.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> Penugasan jabatan guru (mapel dan ekskul) dilakukan per tahun pelajaran dan semester. Data di tahun pelajaran berbeda adalah data yang terpisah, sehingga perlu diatur ulang setiap tahun pelajaran baru.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Mapel Agama:</strong> Mapel Agama adalah mapel khusus yang mengikuti agama siswa. Guru pengampu harus ditugaskan berdasarkan agama yang mereka ampu. Siswa Muslim diajar oleh guru Agama Islam, dan seterusnya.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Wali Kelas:</strong> Guru yang ditugaskan sebagai wali kelas memiliki tanggung jawab tambahan untuk mengelola kelas tersebut, termasuk input nilai rapor dan catatan siswa. Pastikan wali kelas memiliki akses yang sesuai di sistem.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akun login:</strong> Setiap guru memiliki akun login yang otomatis dibuat saat data guru ditambahkan. Username dan password dapat diubah oleh admin atau guru sendiri. Status aktif/nonaktif akun mengontrol akses guru ke sistem.
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Semua operasi Data Guru menggunakan AJAX ke controller <code>Dataguru</code> dan mengembalikan respons JSON. Hanya Administrator yang dapat mengakses endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>dataguru</code></td><td>Tampilkan halaman Data Guru</td></tr>
                <tr><td>POST</td><td><code>dataguru/read</code></td><td>Ambil data guru untuk DataTables (dengan sorting &amp; filter)</td></tr>
                <tr><td>POST</td><td><code>dataguru/create</code></td><td>Tambah guru baru (manual)</td></tr>
                <tr><td>POST</td><td><code>dataguru/update</code></td><td>Edit profil guru</td></tr>
                <tr><td>POST</td><td><code>dataguru/delete</code></td><td>Hapus guru</td></tr>
                <tr><td>GET</td><td><code>dataguru/import</code></td><td>Tampilkan halaman Import Guru</td></tr>
                <tr><td>POST</td><td><code>dataguru/do_import</code></td><td>Proses import guru dari Excel</td></tr>
                <tr><td>GET</td><td><code>dataguru/updateData</code></td><td>Tampilkan halaman Update Data</td></tr>
                <tr><td>POST</td><td><code>dataguru/updateExcel</code></td><td>Update data guru dari Excel</td></tr>
                <tr><td>GET</td><td><code>dataguru/jabatan/{id}</code></td><td>Tampilkan halaman Edit Jabatan Guru</td></tr>
                <tr><td>POST</td><td><code>dataguru/saveJabatan</code></td><td>Simpan jabatan dan penugasan guru</td></tr>
                <tr><td>POST</td><code>dataguru/copyJabatan</code></td><td>Copy penugasan dari semester sebelumnya</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>dataguru/create</code> — Tambah Guru (Manual)</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>nama</code></td><td>Ya</td><td>Nama lengkap guru</td></tr>
                <tr><td><code>nip</code></td><td>Ya</td><td>Nomor Induk Pegawai (unik, min 6 digit)</td></tr>
                <tr><td><code>email</code></td><td>Ya</td><td>Email guru (format valid)</td></tr>
                <tr><td><code>username</code></td><td>Ya</td><td>Username login (unik, min 5 karakter)</td></tr>
                <tr><td><code>password</code></td><td>Ya</td><td>Password login (min 5 karakter)</td></tr>
                <tr><td><code>jenis_kelamin</code></td><td>Tidak</td><td>L atau P</td></tr>
                <tr><td><code>no_hp</code></td><td>Tidak</td><td>Nomor telepon</td></tr>
                <tr><td><code>agama</code></td><td>Tidak</td><td>Agama guru</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }   // atau false jika gagal insert</pre>

        <h3 style="margin-top:20px;">POST <code>dataguru/do_import</code> — Import Guru dari Excel</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>file</code></td><td>File Excel (.xlsx) yang berisi data guru</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sistem akan membaca file Excel dan melakukan insert batch ke tabel guru dan users. Akun login otomatis dibuat untuk setiap guru dengan username = NIP dan password = NIP. Format kolom harus sesuai dengan template yang disediakan.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "total": 25, "gagal": 0 }</pre>

        <h3 style="margin-top:20px;">POST <code>dataguru/updateExcel</code> — Update Data dari Excel</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>file</code></td><td>File Excel (.xlsx) yang berisi data guru untuk diupdate</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sistem akan mencocokkan data berdasarkan NIP dan mengupdate field yang ada. Tidak menambah guru baru, hanya update data yang sudah ada.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "total": 20, "updated": 18, "not_found": 2 }</pre>

        <h3 style="margin-top:20px;">POST <code>dataguru/update</code> — Edit Profil Guru</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_guru</code></td><td>Ya</td><td>ID guru yang akan diedit</td></tr>
                <tr><td><code>nama</code></td><td>Ya</td><td>Nama lengkap guru</td></tr>
                <tr><td><code>nip</code></td><td>Ya</td><td>Nomor Induk Pegawai</td></tr>
                <tr><td><code>email</code></td><td>Ya</td><td>Email guru</td></tr>
                <tr><td><code>jenis_kelamin</code></td><td>Tidak</td><td>L atau P</td></tr>
                <tr><td><code>no_hp</code></td><td>Tidak</td><td>Nomor telepon</td></tr>
                <tr><td><code>agama</code></td><td>Tidak</td><td>Agama guru</td></tr>
                <tr><td><code>nik</code></td><td>Tidak</td><td>Nomor Induk Kependudukan</td></tr>
                <tr><td><code>tempat_lahir</code></td><td>Tidak</td><td>Tempat lahir</td></tr>
                <tr><td><code>tanggal_lahir</code></td><td>Tidak</td><td>Tanggal lahir (YYYY-MM-DD)</td></tr>
                <tr><td><code>alamat</code></td><td>Tidak</td><td>Alamat lengkap</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }   // atau false jika gagal update</pre>

        <h3 style="margin-top:20px;">POST <code>dataguru/delete</code> — Hapus Guru</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_guru</code></td><td>ID guru yang akan dihapus</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sebelum menghapus, server memeriksa apakah guru masih memiliki data di tabel lain (kelas, jadwal, nilai, bank soal, dll). Jika ada data terkait, hapus ditolak dan pesan error dikembalikan. Penghapusan guru juga akan menghapus akun login di tabel users.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">// Sukses
{ "status": true, "message": "berhasil" }

// Gagal — masih ada relasi
{ "status": false, "message": "Guru masih memiliki data di:&lt;br&gt;jadwal_pelajaran&lt;br&gt;cbt_soal&lt;br&gt;rapor_nilai" }</pre>

        <h3 style="margin-top:20px;">POST <code>dataguru/saveJabatan</code> — Simpan Jabatan & Penugasan</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_guru</code></td><td>ID guru yang akan diatur jabatannya</td></tr>
                <tr><td><code>level</code></td><td>Level guru (misalnya: Guru Tetap, Guru Honorer)</td></tr>
                <tr><td><code>wali_kelas</code></td><td>ID kelas jika guru menjadi wali kelas (opsional)</td></tr>
                <tr><td><code>mapel</code></td><td>Array data mapel — tiap item berisi <code>id_mapel</code>, <code>kelas</code> (array ID kelas)</td></tr>
                <tr><td><code>ekskul</code></td><td>Array data ekskul — tiap item berisi <code>id_ekskul</code>, <code>kelas</code> (array ID kelas)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Menyimpan penugasan guru untuk mata pelajaran dan ekstrakurikuler. Data lama akan dihapus dan diganti dengan data baru. Untuk mapel agama, kelas dikelompokkan berdasarkan agama siswa.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "mapel": [
    { "id_mapel": 1, "kelas": [1, 2, 3] },
    { "id_mapel": 2, "kelas": [4, 5] }
  ],
  "ekskul": [
    { "id_ekskul": 1, "kelas": [1, 2, 3, 4] }
  ]
}
// Response
{ "status": true }</pre>

        <h3 style="margin-top:20px;">POST <code>dataguru/copyJabatan</code> — Copy Penugasan dari Semester Sebelumnya</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_guru</code></td><td>ID guru yang akan dicopy penugasannya</td></tr>
                <tr><td><code>semester_asal</code></td><td>Semester asal untuk copy (1 atau 2)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Menyalin penugasan mapel dan ekskul dari semester sebelumnya ke semester aktif saat ini. Sistem akan mencoba mencocokkan nama kelas untuk menentukan penugasan yang sesuai.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "total": 5 }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Endpoint <code>read</code> menggunakan library Ignited-DataTables — mengembalikan format JSON standar DataTables dengan <code>draw</code>, <code>recordsTotal</code>, <code>recordsFiltered</code>, dan array <code>data</code>. Data guru difilter berdasarkan tahun pelajaran dan semester aktif. Sorting default: <code>nama ASC</code>. Search berdasarkan nama, NIP, atau email.</div>
        </div>
    </div>`
};
