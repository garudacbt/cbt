if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['data-siswa'] = {
    title: 'Siswa',
    desc: 'Panduan lengkap pengelolaan data siswa di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-users"></i> Pengelolaan Data Siswa</h2>
        <p>Fitur ini digunakan untuk mengelola data siswa di sekolah. Administrator dan Guru memiliki akses ke menu ini. Data siswa mencakup informasi pribadi, akun login, status aktif/nonaktif, dan kelas tempat siswa berada.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Siswa</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">Data Umum</code></li>
            <li>Klik submenu <code class="inline">Siswa</code></li>
            <li>Halaman Data Siswa akan ditampilkan dengan tabel daftar siswa untuk tahun pelajaran dan semester aktif</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan tahun pelajaran dan semester sudah diaktifkan sebelum mengelola data siswa. Guru hanya dapat melihat dan mengedit siswa di kelas yang mereka ampu.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Siswa Baru</h3>
        <ol class="step-list">
            <li>Pada halaman Data Siswa, klik tombol <code class="inline">Tambah Siswa</code> di pojok kanan atas</li>
            <li>Modal "Tambah Siswa" akan muncul dengan form input</li>
            <li>Isi formulir data siswa:
                <ul class="step-list">
                    <li><strong>Nama Siswa:</strong> Nama lengkap siswa sesuai dokumen resmi</li>
                    <li><strong>NIS:</strong> Nomor Induk Siswa (wajib unik, minimal 5 digit)</li>
                    <li><strong>NISN:</strong> Nomor Induk Siswa Nasional (wajib unik, minimal 5 digit)</li>
                    <li><strong>Jenis Kelamin:</strong> Laki-laki/Perempuan</li>
                    <li><strong>Agama:</strong> Agama yang dianut siswa</li>
                    <li><strong>Kelas Awal:</strong> Kelas saat siswa diterima (sesuai jenjang sekolah)</li>
                    <li><strong>Tanggal Diterima:</strong> Tanggal siswa diterima di sekolah</li>
                    <li><strong>Username:</strong> Username untuk login siswa (wajib unik, minimal 5 karakter)</li>
                    <li><strong>Password:</strong> Password untuk login siswa (minimal 5 karakter)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Siswa baru akan ditambahkan dan akun login akan otomatis dibuat</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan NIS sebagai username untuk memudahkan siswa mengingat. Password default bisa sama dengan NIS dan dapat diubah oleh siswa setelah login pertama.</div>
        </div>
        <hr>
        <h3>🠊 Import Siswa</h3>
        <ol class="step-list">
            <li>Pada halaman Data Siswa, klik tombol <code class="inline">Import</code> di pojok kanan atas</li>
            <li>Halaman Import Siswa akan ditampilkan</li>
            <li>Download template Excel yang tersedia</li>
            <li>Isi template dengan data siswa sesuai format yang ditentukan
        <table class="table-custom">
            <thead><tr><th>Kolom</th><th>Keterangan</th><th>Wajib</th></tr></thead>
            <tbody>
                <tr><td>NIS</td><td>Nomor Induk Siswa (harus unik)</td><td>Ya</td></tr>
                <tr><td>NISN</td><td>Nomor Induk Siswa Nasional</td><td>Tidak</td></tr>
                <tr><td>Nama</td><td>Nama lengkap siswa</td><td>Ya</td></tr>
                <tr><td>Level Kelas</td><td>Tingkat Jenjang (1 sampai 12)</td><td>Ya</td></tr>
                <tr><td>Jenis Kelamin</td><td>L/P</td><td>Ya</td></tr>
                <tr><td>Tempat Lahir</td><td>Kota kelahiran</td><td>Tidak</td></tr>
                <tr><td>Tanggal Lahir</td><td>Format: YYYY-MM-DD</td><td>Tidak</td></tr>
                <tr><td>Agama</td><td>Agama siswa</td><td>Tidak</td></tr>
                <tr><td>Kolom lainnya</td><td>Field tambahan (opsional)</td><td>Tidak</td></tr>
            </tbody>
        </table>
            </li>
            <li>Upload file yang telah diisi</li>
            <li>Pilih kelas jika ingin langsung menugaskan siswa ke kelas tertentu</li>
            <li>Klik tombol <code class="inline">Proses</code></li>
            <li>Data siswa akan diimpor dan akun login akan otomatis dibuat</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur import sangat berguna untuk menambah banyak siswa sekaligus di awal tahun pelajaran. Pastikan format data sesuai dengan template yang disediakan.</div>
        </div>
        <hr>
        <h3>🠊 Update Data Siswa dengan Excel</h3>
        <ol class="step-list">
            <li>Pada halaman Data Siswa, klik tombol <code class="inline">Update Data</code> di pojok kanan atas</li>
            <li>Halaman Update Data akan ditampilkan</li>
            <li>Pilih file Excel yang berisi data siswa yang ingin diupdate</li>
            <li>Upload file tersebut</li>
            <li>Sistem akan memproses dan mengupdate data siswa yang ada</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Fitur ini digunakan untuk mengupdate data siswa yang sudah ada, bukan untuk menambah siswa baru. Gunakan dengan hati-hati untuk menghindari kesalahan data.</div>
        </div>
        <hr>
        <h3>🠊 Update Foto Siswa dengan File Word</h3>
        <ol class="step-list">
            <li>Pada halaman Data Siswa, klik tombol <code class="inline">Update Data</code> di pojok kanan atas</li>
            <li>Halaman Update Data akan ditampilkan dengan dua opsi: Excel dan Word</li>
            <li>Pilih tab <code class="inline">Word</code> untuk update foto siswa</li>
            <li>Siapkan file Word (.docx) yang berisi foto siswa
                <ul class="step-list">
                    <li>Format file Word harus sesuai dengan template yang disediakan</li>
                    <li>Foto siswa disisipkan dalam dokumen Word dengan posisi yang sesuai</li>
                    <li>Nama file atau label foto harus sesuai dengan NIS atau NISN siswa</li>
                    <li>Foto harus dalam format yang didukung (JPG, PNG, JPEG)</li>
                </ul>
            </li>
            <li>Upload file Word yang telah disiapkan</li>
            <li>Sistem akan memproses file dan mengekstrak foto siswa</li>
            <li>Foto akan diupdate ke profil siswa yang sesuai berdasarkan NIS/NISN</li>
            <li>Notifikasi akan muncul menunjukkan jumlah foto yang berhasil diupdate</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur ini sangat berguna untuk mengupdate foto banyak siswa sekaligus. Pastikan nama file atau label foto sesuai dengan NIS/NISN agar sistem dapat mencocokkan foto dengan siswa yang benar. Gunakan template Word yang disediakan untuk memastikan format yang benar.</div>
        </div>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan ukuran file Word tidak terlalu besar untuk menghindari timeout saat upload</li>
                    <li>Foto yang terlalu besar mungkin gagal diproses, gunakan ukuran yang wajar (disarankan maksimal 500KB per foto)</li>
                    <li>Backup data foto siswa sebelum melakukan update massal</li>
                    <li>Verifikasi hasil update setelah proses selesai untuk memastikan foto cocok dengan siswa yang benar</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Mengedit Data Siswa</h3>
        <ol class="step-list">
            <li>Pada tabel Data Siswa, cari siswa yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> (warna kuning) pada baris siswa tersebut</li>
            <li>Halaman Edit Data Siswa akan ditampilkan dengan tab-tab:
                <ul class="step-list">
                    <li><strong>Data:</strong> Informasi dasar (nama, NIS, NISN, jenis kelamin, dll)</li>
                    <li><strong>Biodata:</strong> Informasi biodata lengkap (tempat/tanggal lahir, alamat, dll)</li>
                    <li><strong>Orang Tua:</strong> Data ayah dan ibu siswa</li>
                    <li><strong>Wali:</strong> Data wali siswa (jika ada)</li>
                </ul>
            </li>
            <li>Ubah data sesuai kebutuhan pada tab yang relevan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Data siswa akan diperbarui</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Perubahan pada data siswa akan berdampak pada jadwal, nilai, dan rapor. Pastikan untuk mempertimbangkan dampaknya sebelum mengubah data penting seperti NIS atau NISN.</div>
        </div>
        <hr>
        <h3>🠊 Mengaktifkan/Nonaktifkan Akun Siswa</h3>
        <ol class="step-list">
            <li>Pada tabel Data Siswa, cari siswa yang ingin diaktifkan atau dinonaktifkan</li>
            <li>Jika akun siswa aktif, akan muncul tombol <code class="inline">Nonaktifkan</code> (warna merah)</li>
            <li>Jika akun siswa nonaktif, akan muncul tombol <code class="inline">Aktifkan</code> (warna hijau)</li>
            <li>Klik tombol sesuai kebutuhan</li>
            <li>Konfirmasi akan muncul</li>
            <li>Status akun siswa akan berubah</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Siswa dengan akun nonaktif tidak dapat login ke sistem</li>
                    <li>Nonaktifkan akun siswa yang sudah lulus, pindah, atau keluar</li>
                    <li>Akun siswa harus dinonaktifkan sebelum data siswa dapat dihapus</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Filter dan Search Siswa</h3>
        <ol class="step-list">
            <li><strong>Filter Status:</strong> Gunakan dropdown "Filter" untuk memfilter berdasarkan status:
                <ul class="step-list">
                    <li>Semua: Menampilkan semua siswa</li>
                    <li>Aktif: Hanya siswa dengan status aktif</li>
                    <li>Nonaktif: Hanya siswa dengan akun nonaktif</li>
                    <li>Kelas: Filter berdasarkan kelas tertentu</li>
                </ul>
            </li>
            <li><strong>Filter Kelas:</strong> Jika memilih "Kelas" pada filter, dropdown kelas akan aktif untuk memilih kelas spesifik</li>
            <li><strong>Search:</strong> Gunakan kolom pencarian untuk mencari siswa berdasarkan nama, NIS, atau NISN</li>
            <li><strong>Urutkan:</strong> Gunakan dropdown "Urutkan" untuk mengurutkan berdasarkan Nama, NIS, NISN, atau Kelas</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Kombinasi filter dan search sangat berguna untuk menemukan siswa tertentu dengan cepat, terutama jika jumlah siswa sangat banyak.</div>
        </div>
        <hr>
        <h3>🠊 Aksi Bulk (Pindah/Keluar/Hapus)</h3>
        <ol class="step-list">
            <li>Pada tabel Data Siswa, pilih satu atau lebih siswa dengan checkbox</li>
            <li>Tombol <code class="inline">Aksi</code> akan aktif di pojok kiri atas tabel</li>
            <li>Klik tombol <code class="inline">Aksi</code></li>
            <li>Pilih aksi yang diinginkan:
                <ul class="step-list">
                    <li><strong>Set sebagai PINDAH:</strong> Menandai siswa sebagai pindah sekolah</li>
                    <li><strong>Set sebagai KELUAR:</strong> Menandai siswa sebagai keluar sekolah</li>
                    <li><strong>HAPUS:</strong> Menghapus data siswa dari sistem</li>
                </ul>
            </li>
            <li>Konfirmasi akan muncul sesuai aksi yang dipilih</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan untuk HAPUS:</strong>
                <ul>
                    <li>Siswa tidak dapat dihapus jika masih memiliki data di kelas, CBT, atau rapor</li>
                    <li>Siswa harus dikeluarkan dari kelas terlebih dahulu</li>
                    <li>Hasil ujian siswa harus sudah direkap</li>
                    <li>Akun siswa harus dinonaktifkan sebelum dapat dihapus</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Pagination</h3>
        <ol class="step-list">
            <li>Gunakan dropdown "Show" di pojok kiri bawah tabel untuk mengatur jumlah siswa per halaman (10, 25, 50, atau 100)</li>
            <li>Gunakan tombol pagination di bawah tabel untuk berpindah halaman</li>
            <li>Informasi total entri ditampilkan di sebelah kiri pagination</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Tips:</strong> Untuk performa yang lebih baik, gunakan jumlah per halaman yang lebih kecil jika data siswa sangat banyak.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Gunakan import untuk banyak siswa:</strong> Untuk menambah banyak siswa sekaligus, gunakan fitur Import daripada menambah satu per satu</li>
            <li><strong>Konsistensi NIS:</strong> Gunakan format NIS yang konsisten sesuai standar sekolah</li>
            <li><strong>Username yang mudah diingat:</strong> Gunakan NIS sebagai username untuk memudahkan siswa</li>
            <li><strong>Password default:</strong> Gunakan password yang mudah diingat (seperti NIS) dan instruksikan siswa untuk mengubah setelah login pertama</li>
            <li><strong>Nonaktifkan siswa lulus:</strong> Siswa yang sudah lulus segera dinonaktifkan akunnya</li>
            <li><strong>Backup sebelum hapus:</strong> Selalu backup database sebelum menghapus data siswa</li>
            <li><strong>Gunakan filter:</strong> Manfaatkan fitur filter dan search untuk menemukan siswa dengan cepat</li>
            <li><strong>Update berkala:</strong> Lakukan update data siswa secara berkala untuk menjaga akurasi data</li>
            <li><strong>Foto siswa:</strong> Upload foto siswa untuk memudahkan identifikasi, terutama untuk ujian CBT</li>
            <li><strong>Dokumentasi:</strong> Buat dokumentasi internal tentang format data siswa untuk referensi tim</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menambah siswa:</strong>
                <span>Pastikan NIS, NISN, dan Username belum digunakan oleh siswa lain. Sistem mencegah duplikasi data unik ini.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Import gagal:</strong>
                <span>Pastikan format file sesuai dengan template. Periksa apakah semua field wajib (nama, NIS, NISN, username, password) sudah terisi dengan benar. Pastikan tidak ada duplikasi NIS, NISN, atau username.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menghapus siswa:</strong>
                <span>Siswa masih memiliki data di kelas, CBT, atau rapor. Keluarkan siswa dari kelas, rekap hasil ujian, atau set sebagai pindah/keluar sebelum menghapus. Pastikan akun siswa sudah dinonaktifkan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul di filter kelas:</strong>
                <span>Pastikan siswa sudah ditugaskan ke kelas untuk tahun pelajaran dan semester aktif. Cek juga apakah filter kelas sudah dipilih dengan benar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Akun siswa tidak bisa login:</strong>
                <span>Pastikan akun siswa dalam status aktif. Cek username dan password yang benar. Jika lupa password, admin dapat mereset password melalui menu User Management.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Edit data tidak tersimpan:</strong>
                <span>Pastikan semua field wajib sudah terisi. Periksa apakah NIS atau NISN bentrok dengan siswa lain. Validasi form akan menampilkan error jika ada masalah.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Foto tidak muncul:</strong>
                <span>Pastikan foto sudah diupload dengan format yang benar (JPG, PNG, JPEG). Ukuran file terlalu besar mungkin menyebabkan gagal upload. Cek koneksi internet saat upload.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> Data siswa bersifat global dan tidak terikat per tahun pelajaran. Namun, penugasan kelas siswa dilakukan per tahun pelajaran dan semester.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Status siswa:</strong> Status siswa (Aktif, Lulus, Pindah, Keluar) dicatat di Buku Induk dan bersifat permanen untuk dokumentasi. Gunakan fitur ini dengan benar untuk menjaga akurasi data historis.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru hanya dapat melihat dan mengedit siswa di kelas yang mereka ampu sebagai wali kelas atau guru mapel. Administrator memiliki akses penuh ke semua data siswa.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akun login:</strong> Setiap siswa memiliki akun login yang otomatis dibuat saat data siswa ditambahkan. Username dan password dapat diubah oleh admin atau siswa sendiri.
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Semua operasi Data Siswa menggunakan AJAX ke controller <code>Datasiswa</code> dan mengembalikan respons JSON. Administrator dan Guru dapat mengakses endpoint ini dengan hak akses yang berbeda.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>datasiswa</code></td><td>Tampilkan halaman Data Siswa</td></tr>
                <tr><td>POST</td><td><code>datasiswa/read</code></td><td>Ambil data siswa untuk DataTables (dengan sorting &amp; filter)</td></tr>
                <tr><td>POST</td><td><code>datasiswa/create</code></td><td>Tambah siswa baru</td></tr>
                <tr><td>POST</td><td><code>datasiswa/update</code></td><td>Edit data siswa yang ada</td></tr>
                <tr><td>POST</td><td><code>datasiswa/delete</code></td><td>Hapus siswa (bulk)</td></tr>
                <tr><td>POST</td><td><code>datasiswa/aktifkan</code></td><td>Aktifkan akun siswa</td></tr>
                <tr><td>POST</td><td><code>datasiswa/nonaktifkan</code></td><td>Nonaktifkan akun siswa</td></tr>
                <tr><td>POST</td><td><code>datasiswa/setPindah</code></td><td>Set status siswa sebagai PINDAH</td></tr>
                <tr><td>POST</td><td><code>datasiswa/setKeluar</code></td><td>Set status siswa sebagai KELUAR</td></tr>
                <tr><td>GET</td><td><code>datasiswa/import</code></td><td>Tampilkan halaman Import Siswa</td></tr>
                <tr><td>POST</td><td><code>datasiswa/do_import</code></td><td>Proses import siswa dari Excel</td></tr>
                <tr><td>GET</td><td><code>datasiswa/updateData</code></td><td>Tampilkan halaman Update Data</td></tr>
                <tr><td>POST</td><td><code>datasiswa/updateExcel</code></td><td>Update data siswa dari Excel</td></tr>
                <tr><td>POST</td><td><code>datasiswa/updateWord</code></td><td>Update foto siswa dari file Word</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>datasiswa/create</code> — Tambah Siswa</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>nama</code></td><td>Ya</td><td>Nama lengkap siswa</td></tr>
                <tr><td><code>nis</code></td><td>Ya</td><td>Nomor Induk Siswa (unik, min 5 digit)</td></tr>
                <tr><td><code>nisn</code></td><td>Tidak</td><td>Nomor Induk Siswa Nasional (unik, min 5 digit)</td></tr>
                <tr><td><code>jenis_kelamin</code></td><td>Ya</td><td>L atau P</td></tr>
                <tr><td><code>agama</code></td><td>Tidak</td><td>Agama siswa</td></tr>
                <tr><td><code>kelas_awal</code></td><td>Ya</td><td>Kelas saat siswa diterima</td></tr>
                <tr><td><code>tanggal_diterima</code></td><td>Tidak</td><td>Tanggal diterima (YYYY-MM-DD)</td></tr>
                <tr><td><code>username</code></td><td>Ya</td><td>Username login (unik, min 5 karakter)</td></tr>
                <tr><td><code>password</code></td><td>Ya</td><td>Password login (min 5 karakter)</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }   // atau false jika gagal insert</pre>

        <h3 style="margin-top:20px;">POST <code>datasiswa/update</code> — Edit Siswa</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_siswa</code></td><td>Ya</td><td>ID siswa yang akan diedit</td></tr>
                <tr><td><code>nama</code></td><td>Ya</td><td>Nama lengkap siswa</td></tr>
                <tr><td><code>nis</code></td><td>Ya</td><td>Nomor Induk Siswa</td></tr>
                <tr><td><code>nisn</code></td><td>Tidak</td><td>Nomor Induk Siswa Nasional</td></tr>
                <tr><td><code>jenis_kelamin</code></td><td>Ya</td><td>L atau P</td></tr>
                <tr><td><code>agama</code></td><td>Tidak</td><td>Agama siswa</td></tr>
                <tr><td><code>tempat_lahir</code></td><td>Tidak</td><td>Tempat lahir</td></tr>
                <tr><td><code>tanggal_lahir</code></td><td>Tidak</td><td>Tanggal lahir (YYYY-MM-DD)</td></tr>
                <tr><td><code>alamat</code></td><td>Tidak</td><td>Alamat lengkap</td></tr>
                <tr><td><code>nama_ayah</code></td><td>Tidak</td><td>Nama ayah</td></tr>
                <tr><td><code>nama_ibu</code></td><td>Tidak</td><td>Nama ibu</td></tr>
                <tr><td><code>nama_wali</code></td><td>Tidak</td><td>Nama wali (jika ada)</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }   // atau false jika gagal update</pre>

        <h3 style="margin-top:20px;">POST <code>datasiswa/delete</code> — Hapus Siswa (Bulk)</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>checked</code></td><td>Array ID siswa dari checkbox yang dipilih</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sebelum menghapus, server memeriksa apakah siswa masih memiliki data di kelas, CBT, atau rapor. Jika ada data terkait, hapus ditolak dan pesan error dikembalikan. Akun siswa harus dinonaktifkan terlebih dahulu.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">// Sukses
{ "status": true, "total": 2 }

// Gagal — masih ada relasi
{ "status": false, "total": "Siswa masih memiliki data di:&lt;br&gt;kelas_siswa&lt;br&gt;cbt_soal_jawaban" }</pre>

        <h3 style="margin-top:20px;">POST <code>datasiswa/do_import</code> — Import Siswa dari Excel</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>file</code></td><td>File Excel (.xlsx) yang berisi data siswa</td></tr>
                <tr><td><code>kelas_id</code></td><td>ID kelas tujuan (opsional, jika ingin langsung menugaskan ke kelas)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sistem akan membaca file Excel dan melakukan insert batch ke tabel siswa dan users. Akun login otomatis dibuat untuk setiap siswa. Format kolom harus sesuai dengan template yang disediakan.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "total": 50, "gagal": 0 }</pre>

        <h3 style="margin-top:20px;">POST <code>datasiswa/updateExcel</code> — Update Data dari Excel</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>file</code></td><td>File Excel (.xlsx) yang berisi data siswa untuk diupdate</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sistem akan mencocokkan data berdasarkan NIS atau NISN dan mengupdate field yang ada. Tidak menambah siswa baru, hanya update data yang sudah ada.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "total": 30, "updated": 25, "not_found": 5 }</pre>

        <h3 style="margin-top:20px;">POST <code>datasiswa/updateWord</code> — Update Foto dari Word</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>file</code></td><td>File Word (.docx) yang berisi foto siswa</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sistem akan mengekstrak gambar dari dokumen Word dan mencocokkan dengan siswa berdasarkan NIS/NISN yang terdapat pada nama file atau label foto. Foto akan diupdate ke field foto di tabel siswa.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "total": 45, "updated": 42, "not_found": 3 }</pre>

        <h3 style="margin-top:20px;">POST <code>datasiswa/aktifkan</code> / <code>nonaktifkan</code> — Ubah Status Akun</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_siswa</code></td><td>ID siswa yang akan diubah statusnya</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Mengubah kolom <code>is_active</code> di tabel users. Siswa dengan akun nonaktif tidak dapat login ke sistem.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }</pre>

        <h3 style="margin-top:20px;">POST <code>datasiswa/setPindah</code> / <code>setKeluar</code> — Set Status Siswa</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>checked</code></td><td>Array ID siswa dari checkbox yang dipilih</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Mengubah status siswa di Buku Induk menjadi PINDAH atau KELUAR. Status ini bersifat permanen untuk dokumentasi historis.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "total": 3 }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Endpoint <code>read</code> menggunakan library Ignited-DataTables — mengembalikan format JSON standar DataTables dengan <code>draw</code>, <code>recordsTotal</code>, <code>recordsFiltered</code>, dan array <code>data</code>. Data siswa difilter berdasarkan tahun pelajaran dan semester aktif. Sorting default: <code>nama ASC</code>. Filter tambahan: status aktif/nonaktif, kelas, dan pencarian berdasarkan nama/NIS/NISN.</div>
        </div>
    </div>`
};
