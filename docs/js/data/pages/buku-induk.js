if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['buku-induk'] = {
    title: 'Buku Induk Siswa',
    desc: 'Panduan pengelolaan buku induk siswa di aplikasi GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-book-user"></i> Pengelolaan Buku Induk Siswa</h2>
        <p>Buku Induk Siswa adalah fitur untuk mengelola data induk siswa secara digital. Fitur ini mencakup data pribadi, informasi orang tua, dan riwayat akademik siswa selama menempuh pendidikan di sekolah.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Buku Induk</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">Data Umum</code></li>
            <li>Klik submenu <code class="inline">Buku Induk</code></li>
            <li>Halaman Buku Induk akan ditampilkan dengan daftar siswa</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan data siswa sudah diinput melalui menu Siswa sebelum mengelola buku induk.</div>
        </div>
        <hr>
        <h3>🠊 Melihat dan Mengisi Data Buku Induk</h3>
        <ol class="step-list">
            <li>Pada halaman Buku Induk, pilih siswa dari daftar yang tersedia</li>
            <li>Halaman detail buku induk siswa akan ditampilkan dengan beberapa tab:
                <ul class="step-list">
                    <li><strong>Data Siswa:</strong> Informasi dasar siswa</li>
                    <li><strong>Data Orang Tua:</strong> Informasi ayah, ibu, dan wali siswa</li>
                    <li><strong>Data Periodik:</strong> Informasi tambahan seperti hobi, cita-cita, dll.</li>
                    <li><strong>Riwayat Pendidikan:</strong> Riwayat pendidikan formal dan non-formal</li>
                </ul>
            </li>
            <li>Isi atau perbarui data pada setiap tab sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code> untuk menyimpan perubahan</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Lengkapi data buku induk secara berkala untuk menjaga akurasi data siswa.</div>
        </div>
        <hr>
        <h3>🠊 Mencetak Buku Induk</h3>
        <ol class="step-list">
            <li>Pada halaman detail buku induk siswa, klik tombol <code class="inline">Cetak</code></li>
            <li>Pilih format cetak yang diinginkan</li>
            <li>Sistem akan menghasilkan file PDF buku induk siswa yang siap untuk diunduh atau dicetak</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Pastikan semua data sudah terisi dengan benar sebelum mencetak</li>
                    <li>Data yang dicetak adalah data yang tersimpan saat itu</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Search Siswa</h3>
        <ol class="step-list">
            <li>Gunakan kolom pencarian di pojok kanan atas halaman</li>
            <li>Ketik nama siswa, NIS, NISN, atau kata kunci lainnya</li>
            <li>Tekan Enter atau klik tombol <code class="inline">Search</code></li>
            <li>Tabel akan menampilkan siswa yang sesuai dengan kata kunci pencarian</li>
            <li>Klik tombol <code class="inline">X</code> untuk menghapus pencarian dan menampilkan semua siswa</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur search sangat berguna untuk menemukan siswa dengan cepat, terutama jika jumlah siswa sangat banyak.</div>
        </div>
        <hr>
        <h3>🠊 Filter Berdasarkan Status</h3>
        <ol class="step-list">
            <li>Gunakan dropdown "Filter Status" di pojok kanan atas halaman</li>
            <li>Pilih status yang diinginkan:
                <ul class="step-list">
                    <li><strong>Semua:</strong> Menampilkan semua siswa</li>
                    <li><strong>Aktif:</strong> Hanya siswa dengan status aktif</li>
                    <li><strong>Lulus:</strong> Hanya siswa yang sudah lulus</li>
                    <li><strong>Pindah:</strong> Hanya siswa yang pindah sekolah</li>
                    <li><strong>Keluar:</strong> Hanya siswa yang keluar sekolah</li>
                </ul>
            </li>
            <li>Tabel akan menampilkan siswa sesuai filter yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Filter status berguna untuk memisahkan siswa aktif dari siswa yang sudah tidak bersekolah lagi.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Lengkapi data secara berkala:</strong> Update data buku induk secara berkala untuk menjaga akurasi data siswa</li>
            <li><strong>Verifikasi data:</strong> Selalu verifikasi data sebelum mencetak untuk memastikan kebenaran informasi</li>
            <li><strong>Backup data:</strong> Selalu backup database sebelum melakukan perubahan besar pada data buku induk</li>
            <li><strong>Dokumentasi:</strong> Buat dokumentasi internal tentang format data buku induk untuk referensi tim</li>
            <li><strong>Gunakan filter:</strong> Manfaatkan fitur filter dan search untuk menemukan siswa dengan cepat</li>
            <li><strong>Cetak berkala:</strong> Cetak buku induk secara berkala untuk arsip fisik</li>
            <li><strong>Konsistensi data:</strong> Pastikan data di buku induk konsisten dengan data di menu Siswa</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Data tidak tersimpan:</strong>
                <span>Pastikan semua field wajib sudah terisi dengan benar. Periksa koneksi internet saat menyimpan data. Cek apakah ada error yang ditampilkan di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Cetak gagal:</strong>
                <span>Pastikan semua data sudah tersimpan sebelum mencetak. Periksa apakah browser mendukung fitur cetak PDF. Cek koneksi internet saat mencetak.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul di daftar?</strong>
                <span>Pastikan siswa sudah ditambahkan di menu Data Siswa. Cek juga apakah filter status sudah dipilih dengan benar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Data tidak sinkron dengan menu Siswa:</strong>
                <span>Data buku induk seharusnya sinkron dengan data di menu Siswa. Jika ada perbedaan, perbarui data di menu Siswa terlebih dahulu, kemudian refresh halaman buku induk.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data permanen:</strong> Data buku induk bersifat permanen dan mencatat riwayat siswa selama menempuh pendidikan di sekolah. Data ini penting untuk dokumentasi dan referensi masa depan.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru memiliki akses untuk melihat dan mengisi data buku induk siswa di kelas yang mereka ampu. Administrator memiliki akses penuh ke semua data buku induk.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Status siswa:</strong> Status siswa (Aktif, Lulus, Pindah, Keluar) dicatat di buku induk dan bersifat permanen. Gunakan fitur ini dengan benar untuk menjaga akurasi data historis.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Dokumen pendukung:</strong> Upload dokumen pendukung seperti KTP, KK, dan sertifikat untuk melengkapi data buku induk siswa. Pastikan dokumen dalam format yang didukung (PDF, JPG, PNG).
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Semua operasi Buku Induk menggunakan AJAX ke controller <code>Bukuinduk</code> dan mengembalikan respons JSON. Administrator dan Guru dapat mengakses endpoint ini dengan hak akses yang berbeda.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>bukuinduk</code></td><td>Tampilkan halaman Buku Induk</td></tr>
                <tr><td>POST</td><td><code>bukuinduk/read</code></td><td>Ambil data siswa untuk DataTables (dengan sorting &amp; filter)</td></tr>
                <tr><td>GET</td><td><code>bukuinduk/detail/{id}</code></td><td>Tampilkan halaman detail buku induk siswa</td></tr>
                <tr><td>POST</td><td><code>bukuinduk/updateDataSiswa</code></td><td>Update data siswa di buku induk</td></tr>
                <tr><td>POST</td><code>bukuinduk/updateOrangTua</code></td><td>Update data orang tua</td></tr>
                <tr><td>POST</td><code>bukuinduk/updateDataPeriodik</code></td><td>Update data periodik</td></tr>
                <tr><td>POST</td><code>bukuinduk/updateRiwayatPendidikan</code></td><td>Update riwayat pendidikan</td></tr>
                <tr><td>POST</td><code>bukuinduk/uploadDokumen</code></td><td>Upload dokumen pendukung</td></tr>
                <tr><td>GET</td><td><code>bukuinduk/cetak/{id}</code></td><td>Cetak buku induk siswa ke PDF</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>bukuinduk/updateDataSiswa</code> — Update Data Siswa</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_siswa</code></td><td>Ya</td><td>ID siswa yang akan diupdate</td></tr>
                <tr><td><code>nama</code></td><td>Ya</td><td>Nama lengkap siswa</td></tr>
                <tr><td><code>nis</code></td><td>Ya</td><td>Nomor Induk Siswa</td></tr>
                <tr><td><code>nisn</code></td><td>Tidak</td><td>Nomor Induk Siswa Nasional</td></tr>
                <tr><td><code>jenis_kelamin</code></td><td>Ya</td><td>L atau P</td></tr>
                <tr><td><code>tempat_lahir</code></td><td>Tidak</td><td>Tempat lahir</td></tr>
                <tr><td><code>tanggal_lahir</code></td><td>Tidak</td><td>Tanggal lahir (YYYY-MM-DD)</td></tr>
                <tr><td><code>agama</code></td><td>Tidak</td><td>Agama siswa</td></tr>
                <tr><td><code>alamat</code></td><td>Tidak</td><td>Alamat lengkap</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }   // atau false jika gagal update</pre>

        <h3 style="margin-top:20px;">POST <code>bukuinduk/updateOrangTua</code> — Update Data Orang Tua</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_siswa</code></td><td>Ya</td><td>ID siswa</td></tr>
                <tr><td><code>nama_ayah</code></td><td>Tidak</td><td>Nama ayah</td></tr>
                <tr><td><code>nik_ayah</code></td><td>Tidak</td><td>NIK ayah</td></tr>
                <tr><td><code>pekerjaan_ayah</code></td><td>Tidak</td><td>Pekerjaan ayah</td></tr>
                <tr><td><code>no_hp_ayah</code></td><td>Tidak</td><td>Nomor HP ayah</td></tr>
                <tr><td><code>nama_ibu</code></td><td>Tidak</td><td>Nama ibu</td></tr>
                <tr><td><code>nik_ibu</code></td><td>Tidak</td><td>NIK ibu</td></tr>
                <tr><td><code>pekerjaan_ibu</code></td><td>Tidak</td><td>Pekerjaan ibu</td></tr>
                <tr><td><code>no_hp_ibu</code></td><td>Tidak</td><td>Nomor HP ibu</td></tr>
                <tr><td><code>nama_wali</code></td><td>Tidak</td><td>Nama wali (jika ada)</td></tr>
                <tr><td><code>nik_wali</code></td><td>Tidak</td><td>NIK wali</td></tr>
                <tr><td><code>pekerjaan_wali</code></td><td>Tidak</td><td>Pekerjaan wali</td></tr>
                <tr><td><code>no_hp_wali</code></td><td>Tidak</td><td>Nomor HP wali</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }</pre>

        <h3 style="margin-top:20px;">POST <code>bukuinduk/updateDataPeriodik</code> — Update Data Periodik</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_siswa</code></td><td>ID siswa</td></tr>
                <tr><td><code>hobi</code></td><td>Hobi siswa</td></tr>
                <tr><td><code>cita_cita</code></td><td>Cita-cita siswa</td></tr>
                <tr><td><code>golongan_darah</code></td><td>Golongan darah</td></tr>
                <tr><td><code>tinggi_badan</code></td><td>Tinggi badan (cm)</td></tr>
                <tr><td><code>berat_badan</code></td><td>Berat badan (kg)</td></tr>
                <tr><td><code>penyakit_berat</code></td><td>Riwayat penyakit berat</td></tr>
                <tr><td><code>alergi</code></td><td>Alergi</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }</pre>

        <h3 style="margin-top:20px;">POST <code>bukuinduk/updateRiwayatPendidikan</code> — Update Riwayat Pendidikan</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_siswa</code></td><td>ID siswa</td></tr>
                <tr><td><code>riwayat</code></td><td>Array data riwayat pendidikan — tiap item berisi jenjang, nama_sekolah, tahun_lulus, dll</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "riwayat": [
    { "jenjang": "SD", "nama_sekolah": "SDN 1", "tahun_lulus": "2018" },
    { "jenjang": "SMP", "nama_sekolah": "SMPN 1", "tahun_lulus": "2021" }
  ]
}
// Response
{ "status": true }</pre>

        <h3 style="margin-top:20px;">POST <code>bukuinduk/uploadDokumen</code> — Upload Dokumen</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_siswa</code></td><td>ID siswa</td></tr>
                <tr><td><code>jenis_dokumen</code></td><td>Jenis dokumen (KTP, KK, Sertifikat, dll)</td></tr>
                <tr><td><code>file</code></td><td>File dokumen (PDF, JPG, PNG)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Mengupload dokumen pendukung untuk melengkapi data buku induk siswa. File akan disimpan di server dan terhubung dengan data siswa.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "file_path": "/uploads/dokumen/..." }</pre>

        <h3 style="margin-top:20px;">GET <code>bukuinduk/cetak/{id}</code> — Cetak Buku Induk</h3>
        <p>Menghasilkan file PDF berisi data lengkap buku induk siswa. Tidak perlu parameter POST, ID siswa diambil dari URL.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">// Response: File PDF untuk download</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Endpoint <code>read</code> menggunakan library Ignited-DataTables — mengembalikan format JSON standar DataTables dengan <code>draw</code>, <code>recordsTotal</code>, <code>recordsFiltered</code>, dan array <code>data</code>. Data siswa difilter berdasarkan status (Aktif, Lulus, Pindah, Keluar). Sorting default: <code>nama ASC</code>. Search berdasarkan nama, NIS, atau NISN.</div>
        </div>
    </div>`
};