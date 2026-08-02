if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['mata-pelajaran'] = {
    title: 'Mata Pelajaran',
    desc: 'Panduan lengkap pengelolaan mata pelajaran, kelompok mapel, dan sub kelompok mapel di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-book"></i> Pengelolaan Mata Pelajaran</h2>
        <p>Fitur ini digunakan untuk mengelola data mata pelajaran yang ada di sekolah. Hanya Administrator yang memiliki akses ke menu ini. Data mata pelajaran menjadi referensi untuk jadwal pelajaran, bank soal, nilai, dan fitur lainnya di sistem.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Mata Pelajaran</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Data Umum</code></li>
            <li>Klik submenu <code class="inline">Mata Pelajaran</code></li>
            <li>Halaman Mata Pelajaran akan ditampilkan dengan beberapa bagian:
                <ol class="step-list">
                    <li>Tabel Kelompok Mapel (kiri atas)</li>
                    <li>Tabel Sub Kelompok Mapel (kanan atas)</li>
                    <li>Tabel Mata Pelajaran (bawah)</li>
                </ol>
            </li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan Anda login sebagai Administrator. Guru dan siswa tidak memiliki akses ke menu ini.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Kelompok Mapel</h3>
        <ol class="step-list">
            <li>Pada bagian Kelompok Mapel, klik tombol <code class="inline">Tambah Kelompok</code></li>
            <li>Modal/form akan muncul dengan field input:
                <ul class="step-list">
                    <li><strong>Nama Kelompok:</strong> Nama kelompok mapel (contoh: WAJIB, PEMINATAN, dll)</li>
                    <li><strong>Kode:</strong> Kode singkat untuk kelompok (contoh: A, B, C)</li>
                    <li><strong>Kategori:</strong> Pilih kategori dari dropdown (WAJIB, PAI, PEMINATAN AKADEMIK, AKADEMIK KEJURUAN, LINTAS MINAT, MULOK)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Kelompok mapel baru akan ditambahkan ke tabel</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Kelompok mapel digunakan untuk mengelompokkan mata pelajaran berdasarkan kategori kurikulum. Buat kelompok sesuai dengan struktur kurikulum yang digunakan di sekolah.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Sub Kelompok Mapel</h3>
        <ol class="step-list">
            <li>Pastikan kelompok utama sudah dibuat terlebih dahulu</li>
            <li>Pada bagian Kelompok Mapel, klik tombol <code class="inline">Tambah Kelompok</code></li>
            <li>Isi field input:
                <ul class="step-list">
                    <li><strong>Nama Kelompok:</strong> Nama sub kelompok (contoh: Matematika, Bahasa, dll)</li>
                    <li><strong>Kode:</strong> Kode singkat untuk sub kelompok</li>
                    <li><strong>Kategori:</strong> Pilih kategori yang sesuai</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Sub kelompok akan muncul di tabel Sub Kelompok Mapel</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Sub kelompok mapel berguna untuk pengelompokan yang lebih spesifik dalam satu kategori utama.</div>
        </div>
        <hr>
        <h3>🠊 Mengedit Kelompok/Sub Kelompok Mapel</h3>
        <ol class="step-list">
            <li>Pada tabel Kelompok Mapel atau Sub Kelompok Mapel, cari data yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> (warna kuning) pada baris tersebut</li>
            <li>Modal edit akan muncul dengan data yang sudah terisi</li>
            <li>Ubah data sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Data akan diperbarui</li>
        </ol>
        <hr>
        <h3>🠊 Menghapus Kelompok/Sub Kelompok Mapel</h3>
        <ol class="step-list">
            <li>Pada tabel Kelompok Mapel atau Sub Kelompok Mapel, cari data yang ingin dihapus</li>
            <li>Klik tombol <code class="inline">Hapus</code> (warna merah) pada baris tersebut</li>
            <li>Sistem akan mengecek apakah kelompok tersebut digunakan di tabel lain</li>
            <li>Jika tidak digunakan, konfirmasi akan muncul</li>
            <li>Klik tombol <code class="inline">Hapus</code> untuk konfirmasi</li>
            <li>Data akan dihapus dari sistem</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Kelompok mapel tidak dapat dihapus jika masih digunakan oleh mata pelajaran</li>
                    <li>Sub kelompok tidak dapat dihapus jika masih memiliki anak</li>
                    <li>Sistem akan menampilkan pesan error jika penghapusan tidak diperbolehkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Menambah Mata Pelajaran Baru</h3>
        <ol class="step-list">
            <li>Pada bagian Mata Pelajaran, klik tombol <code class="inline">Tambah Mata Pelajaran</code></li>
            <li>Modal/form akan muncul dengan field input:
                <ul class="step-list">
                    <li><strong>Nama Mapel:</strong> Nama lengkap mata pelajaran (contoh: Matematika Wajib)</li>
                    <li><strong>Kode:</strong> Kode singkat untuk mapel (contoh: MTW, BHS, dll)</li>
                    <li><strong>Kelompok:</strong> Pilih kelompok mapel dari dropdown</li>
                    <li><strong>Urutan Tampil:</strong> Nomor urutan untuk pengurutan tampilan (1, 2, 3, dst)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Mata pelajaran baru akan ditambahkan ke tabel</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan kode mapel yang singkat dan mudah diingat. Kode ini akan digunakan di berbagai fitur seperti jadwal dan bank soal.</div>
        </div>
        <hr>
        <h3>🠊 Mengaktifkan Mata Pelajaran</h3>
        <ol class="step-list">
            <li>Pada tabel Mata Pelajaran, cari mapel yang ingin diaktifkan</li>
            <li>Jika status non-aktif, akan muncul tombol <code class="inline">AKTIFKAN</code></li>
            <li>Klik tombol <code class="inline">AKTIFKAN</code> pada mapel yang diinginkan</li>
            <li>Status akan berubah menjadi <code class="inline">✓ AKTIF</code> dengan warna hijau</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Mapel yang aktif akan muncul di dropdown saat membuat jadwal, bank soal, dan fitur lainnya. Mapel non-aktif masih tersimpan di database tetapi tidak ditampilkan.</div>
        </div>
        <hr>
        <h3>🠊 Mengedit Mata Pelajaran</h3>
        <ol class="step-list">
            <li>Pada tabel Mata Pelajaran, cari mapel yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> (warna kuning) pada baris mapel tersebut</li>
            <li>Modal edit akan muncul dengan data mapel yang sudah terisi</li>
            <li>Ubah data sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Data mata pelajaran akan diperbarui</li>
        </ol>
        <hr>
        <h3>🠊 Menghapus Mata Pelajaran</h3>
        <ol class="step-list">
            <li>Pada tabel Mata Pelajaran, pilih satu atau lebih mapel yang ingin dihapus dengan checkbox</li>
            <li>Klik tombol <code class="inline">Hapus</code> di pojok kanan atas tabel</li>
            <li>Sistem akan mengecek apakah mapel digunakan di tabel lain (soal, jadwal, nilai, dll)</li>
            <li>Jika tidak digunakan, konfirmasi akan muncul</li>
            <li>Klik tombol <code class="inline">Hapus</code> untuk konfirmasi</li>
            <li>Mapel akan dihapus dari sistem</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Mapel tidak dapat dihapus jika masih digunakan di tabel lain (soal, jadwal, nilai, dll)</li>
                    <li>Sistem akan menampilkan daftar tabel yang menggunakan mapel tersebut</li>
                    <li>Hapus atau non-aktifkan data terkait terlebih dahulu sebelum menghapus mapel</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Import Mata Pelajaran</h3>
        <ol class="step-list">
            <li>Klik tombol <code class="inline">Import</code> di pojok kanan atas halaman</li>
            <li>Halaman Import Mata Pelajaran akan ditampilkan</li>
            <li>Siapkan data mata pelajaran dalam format yang sesuai</li>
            <li>Input data mata pelajaran (nama, kode, kelompok, urutan)</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Data akan diimpor ke sistem</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur import berguna untuk memasukkan banyak mata pelajaran sekaligus. Pastikan format data sesuai dengan yang diharapkan sistem.</div>
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
            <li><strong>Urutan pembuatan:</strong> Buat kelompok mapel → Buat sub kelompok (jika diperlukan) → Buat mata pelajaran</li>
            <li><strong>Konsistensi kode:</strong> Gunakan kode mapel yang konsisten dengan standar sekolah atau dinas</li>
            <li><strong>Urutan tampil:</strong> Atur urutan tampil agar mapel muncul dalam urutan yang logis di dropdown</li>
            <li><strong>Kategorisasi:</strong> Kelompokkan mapel sesuai dengan struktur kurikulum (WAJIB, PEMINATAN, dll)</li>
            <li><strong>Non-aktifkan jangan hapus:</strong> Jika mapel tidak digunakan sementara, lebih baik non-aktifkan daripada menghapus</li>
            <li><strong>Backup sebelum hapus:</strong> Selalu backup database sebelum menghapus kelompok atau mapel</li>
            <li><strong>Pengelompokan agama:</strong> Untuk mapel agama, pastikan pengaturan agama siswa sudah sesuai</li>
            <li><strong>Testing:</strong> Setelah menambah mapel baru, coba buat jadwal atau bank soal untuk memastikan mapel muncul dengan benar</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menghapus kelompok mapel:</strong>
                <span>Kelompok mapel masih digunakan oleh mata pelajaran. Hapus atau pindahkan mata pelajaran terkait terlebih dahulu, atau non-aktifkan kelompok tersebut.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menghapus mata pelajaran:</strong>
                <span>Mata pelajaran masih digunakan di tabel lain (soal, jadwal, nilai, dll). Sistem akan menampilkan daftar tabel yang menggunakan mapel tersebut. Hapus atau non-aktifkan data terkait terlebih dahulu.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Mapel tidak muncul di dropdown:</strong>
                <span>Pastikan status mapel adalah "Aktif". Mapel non-aktif tidak akan muncul di dropdown saat membuat jadwal atau bank soal.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Urutan tampil tidak berfungsi:</strong>
                <span>Pastikan nilai urutan tampil diisi dengan angka yang unik untuk setiap mapel dalam kelompok yang sama. Duplikasi nilai dapat menyebabkan pengurutan tidak akurat.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Import gagal:</strong>
                <span>Pastikan format data import sesuai dengan yang diharapkan sistem. Periksa apakah semua field wajib (nama, kode, kelompok) sudah terisi dengan benar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Sub kelompok tidak muncul:</strong>
                <span>Pastikan field "Parent" diisi dengan kelompok utama yang sudah ada. Sub kelompok tanpa parent tidak akan ditampilkan di tabel Sub Kelompok Mapel.</span>
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Semua operasi Mata Pelajaran menggunakan AJAX ke controller <code>Datamapel</code> dan mengembalikan respons JSON. Hanya Administrator yang dapat mengakses endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>datamapel</code></td><td>Tampilkan halaman Mata Pelajaran</td></tr>
                <tr><td>POST</td><td><code>datamapel/read</code></td><td>Ambil data mapel untuk DataTables (dengan sorting &amp; filter)</td></tr>
                <tr><td>POST</td><td><code>datamapel/create</code></td><td>Tambah mata pelajaran baru</td></tr>
                <tr><td>POST</td><td><code>datamapel/update</code></td><td>Edit mata pelajaran yang ada</td></tr>
                <tr><td>GET</td><td><code>datamapel/aktifkan/{id}</code></td><td>Aktifkan mata pelajaran by ID</td></tr>
                <tr><td>POST</td><td><code>datamapel/delete</code></td><td>Hapus mapel (bulk checkbox)</td></tr>
                <tr><td>POST</td><td><code>datamapel/addKelompokMapel</code></td><td>Tambah atau edit kelompok / sub kelompok mapel</td></tr>
                <tr><td>POST</td><td><code>datamapel/hapusKelompok</code></td><td>Hapus kelompok / sub kelompok mapel</td></tr>
                <tr><td>POST</td><td><code>datamapel/getDataKelompok</code></td><td>Ambil data kelompok utama untuk DataTables</td></tr>
                <tr><td>POST</td><td><code>datamapel/getDataSubKelompok</code></td><td>Ambil data sub kelompok untuk DataTables</td></tr>
                <tr><td>GET</td><td><code>datamapel/import</code></td><td>Tampilkan halaman Import Mata Pelajaran</td></tr>
                <tr><td>POST</td><td><code>datamapel/do_import</code></td><td>Proses import mata pelajaran dari data form</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>datamapel/create</code> — Tambah Mapel</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>nama_mapel</code></td><td>Ya</td><td>Nama lengkap mata pelajaran</td></tr>
                <tr><td><code>kode_mapel</code></td><td>Ya</td><td>Kode singkat mapel (unik)</td></tr>
                <tr><td><code>kelompok</code></td><td>Ya</td><td>Kode kelompok mapel dari tabel <code>master_kelompok_mapel</code></td></tr>
                <tr><td><code>urutan_tampil</code></td><td>Tidak</td><td>Angka urutan tampil di dropdown dan tabel</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Field <code>jenjang</code> diambil otomatis dari pengaturan sekolah (<code>setting.jenjang</code>), tidak perlu dikirim dari form.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }   // atau false jika gagal insert</pre>

        <h3 style="margin-top:20px;">GET <code>datamapel/aktifkan/{id}</code> — Aktifkan Mapel</h3>
        <p>Mengubah kolom <code>status</code> mapel menjadi <code>'1'</code> (aktif) by ID. Mapel aktif akan muncul di semua dropdown jadwal, bank soal, dll.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">true   // boolean langsung, bukan JSON object</pre>

        <h3 style="margin-top:20px;">POST <code>datamapel/delete</code> — Hapus Mapel (Bulk)</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>checked</code></td><td>Array ID mapel dari checkbox yang dipilih</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sebelum menghapus, server memeriksa <strong>seluruh tabel di database</strong> yang memiliki kolom <code>id_mapel</code> atau <code>mapel_id</code>. Jika ada data terkait di tabel lain, hapus ditolak dan daftar tabel yang bermasalah dikembalikan.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">// Sukses
{ "status": true, "total": 2 }

// Gagal — masih ada relasi
{ "status": false, "total": "Mapel digunakan di 3 tabel:&lt;br&gt;cbt_soal&lt;br&gt;jadwal_mapel&lt;br&gt;rapor_nilai" }</pre>

        <h3 style="margin-top:20px;">POST <code>datamapel/addKelompokMapel</code> — Tambah / Edit Kelompok</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_kel_mapel</code></td><td>Kosong = tambah baru; diisi = edit kelompok tersebut</td></tr>
                <tr><td><code>nama_kel_mapel</code></td><td>Nama kelompok</td></tr>
                <tr><td><code>kode_kel_mapel</code></td><td>Kode singkat kelompok</td></tr>
                <tr><td><code>kategori</code></td><td>Salah satu dari: <code>WAJIB</code>, <code>PAI (Kemenag)</code>, <code>PEMINATAN AKADEMIK</code>, <code>AKADEMIK KEJURUAN</code>, <code>LINTAS MINAT</code>, <code>MULOK</code></td></tr>
                <tr><td><code>id_parent</code></td><td><code>0</code> = kelompok utama; ID kelompok lain = sub kelompok</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">true   // boolean langsung dari hasil update/insert</pre>

        <h3 style="margin-top:20px;">POST <code>datamapel/hapusKelompok</code> — Hapus Kelompok</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_kel</code></td><td>ID kelompok yang akan dihapus</td></tr>
                <tr><td><code>kode</code></td><td>Kode kelompok — digunakan untuk cek apakah ada mapel yang menggunakan kelompok ini</td></tr>
                <tr><td><code>id_parent</code></td><td>ID parent — digunakan untuk cek apakah ada sub kelompok yang masih menggantung</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Sebelum hapus, server melakukan dua pengecekan: apakah ada <strong>mapel</strong> yang menggunakan kode kelompok ini, dan apakah ada <strong>sub kelompok</strong> yang masih punya parent ke kelompok ini.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">// Sukses
{ "status": true, "message": "berhasil" }

// Gagal — masih ada relasi
{ "status": false, "message": "Kelompok Mapel digunakan di 2 tabel:&lt;br&gt;Mata Pelajaran&lt;br&gt;Sub Kelompok" }</pre>

        <h3 style="margin-top:20px;">POST <code>datamapel/do_import</code> — Import Mapel</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>mapel</code></td><td>Array data mapel — tiap item berisi field yang sama dengan <code>create</code></td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Menggunakan <code>master->create()</code> dengan flag batch insert (<code>true</code>) — semua data diinsert sekaligus dalam satu query.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">true   // boolean langsung dari hasil batch insert</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Endpoint <code>read</code>, <code>getDataKelompok</code>, dan <code>getDataSubKelompok</code> menggunakan library Ignited-DataTables — mengembalikan format JSON standar DataTables dengan <code>draw</code>, <code>recordsTotal</code>, <code>recordsFiltered</code>, dan array <code>data</code>. Sorting default: <code>kelompok ASC</code>, <code>urutan_tampil ASC</code>.</div>
        </div>
    </div>`
};
