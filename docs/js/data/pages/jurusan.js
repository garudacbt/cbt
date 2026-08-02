if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['jurusan'] = {
    title: 'Jurusan',
    desc: 'Panduan lengkap pengelolaan jurusan/program studi dan mata pelajaran peminatan di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-graduation-cap"></i> Pengelolaan Jurusan</h2>
        <p>Fitur ini digunakan untuk mengelola data jurusan atau program studi di sekolah. Hanya Administrator yang memiliki akses ke menu ini. Jurusan digunakan untuk mengelompokkan siswa berdasarkan minat atau keahlian (contoh: IPA, IPS, Kejuruan). Setiap jurusan dapat memiliki mata pelajaran peminatan yang spesifik.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Jurusan</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Data Umum</code></li>
            <li>Klik submenu <code class="inline">Jurusan</code></li>
            <li>Halaman Jurusan akan ditampilkan dengan tabel daftar jurusan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan Anda login sebagai Administrator. Guru dan siswa tidak memiliki akses ke menu ini.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Jurusan Baru</h3>
        <ol class="step-list">
            <li>Pada halaman Jurusan, klik tombol <code class="inline">Tambah Jurusan</code> di pojok kanan atas</li>
            <li>Modal/form akan muncul dengan field input:
                <ul class="step-list">
                    <li><strong>Nama Jurusan:</strong> Nama lengkap jurusan (contoh: Ilmu Pengetahuan Alam, Ilmu Pengetahuan Sosial)</li>
                    <li><strong>Kode Jurusan:</strong> Kode singkat untuk jurusan (contoh: IPA, IPS, TKJ)</li>
                    <li><strong>Mapel Peminatan:</strong> Pilih mata pelajaran peminatan yang terkait dengan jurusan ini (dapat memilih lebih dari satu)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Jurusan baru akan ditambahkan ke tabel</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan kode jurusan yang singkat dan mudah diingat. Kode ini akan digunakan di berbagai fitur seperti jadwal dan nilai. Pastikan mapel peminatan sudah dibuat terlebih dahulu di menu Mata Pelajaran.</div>
        </div>
        <hr>
        <h3>🠊 Mengedit Jurusan</h3>
        <ol class="step-list">
            <li>Pada tabel Jurusan, cari jurusan yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> (warna kuning) pada baris jurusan tersebut</li>
            <li>Modal edit akan muncul dengan data jurusan yang sudah terisi</li>
            <li>Ubah data sesuai kebutuhan (nama, kode, atau mapel peminatan)</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Data jurusan akan diperbarui</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Perubahan pada jurusan akan berdampak pada data kelas, jadwal, dan nilai yang terkait dengan jurusan tersebut. Pastikan untuk mempertimbangkan dampaknya sebelum mengubah.</div>
        </div>
        <hr>
        <h3>🠊 Menghapus Jurusan</h3>
        <ol class="step-list">
            <li>Pada tabel Jurusan, pilih satu atau lebih jurusan yang ingin dihapus dengan checkbox</li>
            <li>Klik tombol <code class="inline">Hapus</code> di pojok kanan atas tabel</li>
            <li>Sistem akan mengecek apakah jurusan digunakan di tabel lain (kelas, siswa, dll)</li>
            <li>Jika tidak digunakan, konfirmasi akan muncul</li>
            <li>Klik tombol <code class="inline">Hapus</code> untuk konfirmasi</li>
            <li>Jurusan akan dihapus dari sistem</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Jurusan tidak dapat dihapus jika masih digunakan di tabel lain (kelas, siswa, jadwal, dll)</li>
                    <li>Sistem akan menampilkan daftar tabel yang menggunakan jurusan tersebut</li>
                    <li>Hapus atau pindahkan data terkait terlebih dahulu sebelum menghapus jurusan</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Import Jurusan</h3>
        <ol class="step-list">
            <li>Klik tombol <code class="inline">Import</code> di pojok kanan atas halaman</li>
            <li>Halaman Import Jurusan akan ditampilkan</li>
            <li>Siapkan data jurusan dalam format yang sesuai</li>
            <li>Input data jurusan (nama, kode)</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Data akan diimpor ke sistem</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur import berguna untuk memasukkan banyak jurusan sekaligus. Pastikan format data sesuai dengan yang diharapkan sistem. Mapel peminatan dapat ditambahkan setelah import melalui fitur edit.</div>
        </div>
        <hr>
        <h3>🠊 Menghubungkan Jurusan ke Kelas</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Data Umum</code> → <code class="inline">Kelas / Rombel</code></li>
            <li>Edit kelas yang ingin diberi jurusan</li>
            <li>Pilih jurusan dari dropdown</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Kelas sekarang terhubung dengan jurusan tersebut</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Jurusan pada kelas akan menentukan mapel peminatan yang tersedia untuk siswa di kelas tersebut. Pastikan jurusan sudah memiliki mapel peminatan yang sesuai.</div>
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
            <li><strong>Persiapan mapel:</strong> Pastikan mapel peminatan sudah dibuat di menu Mata Pelajaran sebelum membuat jurusan</li>
            <li><strong>Konsistensi kode:</strong> Gunakan kode jurusan yang konsisten dengan standar sekolah atau dinas</li>
            <li><strong>Naming convention:</strong> Gunakan nama jurusan yang jelas dan deskriptif untuk memudahkan identifikasi</li>
            <li><strong>Mapel peminatan:</strong> Pilih mapel peminatan yang relevan dengan jurusan untuk memudahkan pengelolaan jadwal dan nilai</li>
            <li><strong>Non-aktifkan jangan hapus:</strong> Jika jurusan tidak digunakan sementara, pertimbangkan untuk tidak menghapusnya karena berdampak pada data historis</li>
            <li><strong>Backup sebelum hapus:</strong> Selalu backup database sebelum menghapus jurusan</li>
            <li><strong>Testing:</strong> Setelah menambah jurusan baru, coba buat kelas dengan jurusan tersebut untuk memastikan mapel peminatan muncul dengan benar</li>
            <li><strong>Dokumentasi:</strong> Buat dokumentasi internal tentang struktur jurusan dan mapel peminatan untuk referensi tim</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menghapus jurusan:</strong>
                <span>Jurusan masih digunakan di tabel lain (kelas, siswa, jadwal, dll). Sistem akan menampilkan daftar tabel yang menggunakan jurusan tersebut. Hapus atau pindahkan data terkait terlebih dahulu.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Mapel peminatan tidak muncul:</strong>
                <span>Pastikan mapel peminatan sudah dibuat di menu Mata Pelajaran dan memiliki kategori yang sesuai (PEMINATAN AKADEMIK atau AKADEMIK KEJURUAN). Mapel dengan kategori lain tidak akan muncul di dropdown peminatan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Jurusan tidak muncul di dropdown kelas:</strong>
                <span>Pastikan jurusan sudah disimpan dengan benar. Cek tabel jurusan untuk memastikan data ada. Jika ada, reload halaman kelas untuk memperbarui dropdown.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Import gagal:</strong>
                <span>Pastikan format data import sesuai dengan yang diharapkan sistem. Periksa apakah semua field wajib (nama, kode) sudah terisi dengan benar. Pastikan tidak ada duplikasi kode jurusan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Mapel peminatan tidak berfungsi di jadwal:</strong>
                <span>Pastikan jurusan sudah terhubung dengan kelas dan mapel peminatan sudah dipilih saat membuat jurusan. Cek kembali pengaturan jurusan dan pastikan mapel peminatan sudah benar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kode jurusan duplikat:</strong>
                <span>Sistem mencegah duplikasi kode jurusan. Gunakan kode yang unik untuk setiap jurusan. Jika perlu mengubah kode, edit jurusan tersebut.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Jurusan bersifat opsional:</strong> Sekolah dasar atau sekolah yang tidak menggunakan sistem jurusan dapat mengabaikan fitur ini. Sistem akan tetap berfungsi normal tanpa pengaturan jurusan.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Mapel Peminatan:</strong> Fitur mapel peminatan hanya akan berfungsi optimal jika jurusan sudah dikonfigurasi dengan benar. Pastikan untuk menghubungkan jurusan dengan kelas agar mapel peminatan dapat digunakan dalam jadwal dan penilaian.
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Semua operasi Jurusan menggunakan AJAX ke controller <code>Datajurusan</code> dan mengembalikan respons JSON. Hanya Administrator yang dapat mengakses endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>datajurusan</code></td><td>Tampilkan halaman Jurusan</td></tr>
                <tr><td>POST</td><td><code>datajurusan/read</code></td><td>Ambil data jurusan untuk DataTables (dengan sorting &amp; filter)</td></tr>
                <tr><td>POST</td><td><code>datajurusan/create</code></td><td>Tambah jurusan baru</td></tr>
                <tr><td>POST</td><td><code>datajurusan/update</code></td><td>Edit jurusan yang ada</td></tr>
                <tr><td>POST</td><td><code>datajurusan/delete</code></td><td>Hapus jurusan (bulk checkbox)</td></tr>
                <tr><td>GET</td><td><code>datajurusan/import</code></td><td>Tampilkan halaman Import Jurusan</td></tr>
                <tr><td>POST</td><td><code>datajurusan/do_import</code></td><td>Proses import jurusan dari data form</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>datajurusan/create</code> — Tambah Jurusan</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>nama_jurusan</code></td><td>Ya</td><td>Nama lengkap jurusan/program studi</td></tr>
                <tr><td><code>kode_jurusan</code></td><td>Ya</td><td>Kode singkat jurusan (unik)</td></tr>
                <tr><td><code>mapel_peminatan</code></td><td>Tidak</td><td>Array ID mata pelajaran peminatan yang terkait dengan jurusan ini</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }   // atau false jika gagal insert</pre>

        <h3 style="margin-top:20px;">POST <code>datajurusan/update</code> — Edit Jurusan</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jurusan</code></td><td>Ya</td><td>ID jurusan yang akan diedit</td></tr>
                <tr><td><code>nama_jurusan</code></td><td>Ya</td><td>Nama lengkap jurusan/program studi</td></tr>
                <tr><td><code>kode_jurusan</code></td><td>Ya</td><td>Kode singkat jurusan (unik)</td></tr>
                <tr><td><code>mapel_peminatan</code></td><td>Tidak</td><td>Array ID mata pelajaran peminatan yang terkait dengan jurusan ini</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }   // atau false jika gagal update</pre>

        <h3 style="margin-top:20px;">POST <code>datajurusan/delete</code> — Hapus Jurusan (Bulk)</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>checked</code></td><td>Array ID jurusan dari checkbox yang dipilih</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sebelum menghapus, server memeriksa <strong>seluruh tabel di database</strong> yang memiliki kolom <code>id_jurusan</code> atau <code>jurusan_id</code>. Jika ada data terkait di tabel lain (kelas, siswa, jadwal, dll), hapus ditolak dan daftar tabel yang bermasalah dikembalikan.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">// Sukses
{ "status": true, "total": 2 }

// Gagal — masih ada relasi
{ "status": false, "total": "Jurusan digunakan di 3 tabel:&lt;br&gt;kelas&lt;br&gt;siswa&lt;br&gt;jadwal_pelajaran" }</pre>

        <h3 style="margin-top:20px;">POST <code>datajurusan/do_import</code> — Import Jurusan</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>jurusan</code></td><td>Array data jurusan — tiap item berisi field yang sama dengan <code>create</code></td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Menggunakan <code>master->create()</code> dengan flag batch insert (<code>true</code>) — semua data diinsert sekaligus dalam satu query. Mapel peminatan dapat ditambahkan setelah import melalui fitur edit.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">true   // boolean langsung dari hasil batch insert</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Endpoint <code>read</code> menggunakan library Ignited-DataTables — mengembalikan format JSON standar DataTables dengan <code>draw</code>, <code>recordsTotal</code>, <code>recordsFiltered</code>, dan array <code>data</code>. Sorting default: <code>nama_jurusan ASC</code>.</div>
        </div>
    </div>`
};
