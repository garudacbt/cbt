if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['tahun-ajaran'] = {
    title: 'Tahun Pelajaran',
    desc: 'Panduan lengkap pengelolaan tahun pelajaran dan semester aktif di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-calendar-alt"></i> Pengelolaan Tahun Pelajaran</h2>
        <p>Fitur ini digunakan untuk mengelola tahun ajaran dan semester aktif di sekolah. Hanya Administrator yang memiliki akses ke menu ini. Tahun pelajaran dan semester aktif menjadi referensi untuk seluruh data di sistem (kelas, jadwal, nilai, dll).</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Tahun Pelajaran</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">Data Umum</code></li>
            <li>Klik submenu <code class="inline">Tahun Pelajaran</code></li>
            <li>Halaman Tahun Pelajaran akan ditampilkan dengan dua tabel:
                <ol class="step-list">
                    <li>Tabel Tahun Pelajaran (kiri)</li>
                    <li>Tabel Semester (kanan)</li>
                </ol class="step-list">
            </li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan Anda login sebagai Administrator. Guru dan siswa tidak memiliki akses ke menu ini.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Tahun Pelajaran Baru</h3>
        <ol class="step-list">
            <li>Pada halaman Tahun Pelajaran, klik tombol <code class="inline">Tambah Tahun Pelajaran</code> di pojok kanan atas</li>
            <li>Modal/form akan muncul dengan field input</li>
            <li>Masukkan tahun pelajaran dengan format: <code class="inline">YYYY/YYYY</code> (contoh: <code class="inline">2024/2025</code>)</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Tahun pelajaran baru akan ditambahkan ke tabel dan halaman akan direfresh</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Disarankan menambahkan tahun pelajaran untuk beberapa tahun ke depan sekaligus untuk memudahkan perencanaan.</div>
        </div>
        <hr>
        <h3>🠊 Mengaktifkan Tahun Pelajaran</h3>
        <ol class="step-list">
            <li>Pada tabel Tahun Pelajaran, cari tahun yang ingin diaktifkan</li>
            <li>Jika status belum aktif, akan muncul tombol <code class="inline">AKTIFKAN</code> berwarna biru</li>
            <li>Klik tombol <code class="inline">AKTIFKAN</code> pada tahun yang diinginkan</li>
            <li>Konfirmasi loading akan muncul, tunggu proses selesai</li>
            <li>Notifikasi "Berhasil" akan muncul</li>
            <li>Tahun yang aktif akan menampilkan status <code class="inline">✓ AKTIF</code> dengan warna hijau</li>
            <li>Tahun lain akan otomatis menjadi non-aktif</li>
        </ol>
        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Hanya satu tahun pelajaran yang bisa aktif dalam satu waktu</li>
                    <li>Pastikan data tahun sebelumnya sudah selesai diproses sebelum mengganti tahun aktif</li>
                    <li>Lakukan backup database sebelum mengganti tahun pelajaran</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Mengedit Tahun Pelajaran</h3>
        <ol class="step-list">
            <li>Pada tabel Tahun Pelajaran, cari tahun yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> (warna kuning) pada baris tahun tersebut</li>
            <li>Modal edit akan muncul dengan data tahun yang sudah terisi</li>
            <li>Ubah tahun pelajaran sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Data tahun pelajaran akan diperbarui</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Tombol Edit hanya aktif untuk tahun yang TIDAK sedang aktif. Tahun yang sedang aktif tidak dapat diedit.</div>
        </div>
        <hr>
        <h3>🠊 Menghapus Tahun Pelajaran</h3>
        <ol class="step-list">
            <li>Pada tabel Tahun Pelajaran, cari tahun yang ingin dihapus</li>
            <li>Klik tombol <code class="inline">Hapus</code> (warna merah) pada baris tahun tersebut</li>
            <li>Konfirmasi akan muncul: "Anda yakin akan menghapus Tahun Pelajaran? tindakan ini akan membuat data yang berhubungan tidak aktif"</li>
            <li>Klik tombol <code class="inline">Hapus</code> untuk konfirmasi</li>
            <li>Tahun pelajaran akan dihapus dari sistem</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Penghapusan tahun pelajaran akan membuat data yang terkait (kelas, siswa, nilai, jadwal, dll) menjadi tidak aktif</li>
                    <li>Tombol Hapus hanya aktif untuk tahun yang TIDAK sedang aktif</li>
                    <li>Pastikan untuk backup database sebelum menghapus tahun pelajaran</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Mengaktifkan Semester</h3>
        <ol class="step-list">
            <li>Pada tabel Semester (di sebelah kanan tabel Tahun Pelajaran)</li>
            <li>Cari semester yang ingin diaktifkan (Ganjil/Genap)</li>
            <li>Jika status belum aktif, akan muncul tombol <code class="inline">AKTIFKAN</code></li>
            <li>Klik tombol <code class="inline">AKTIFKAN</code> pada semester yang diinginkan</li>
            <li>Semester akan berubah status menjadi <code class="inline">✓ AKTIF</code> dengan warna hijau</li>
            <li>Semester lain akan otomatis menjadi non-aktif</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Hanya satu semester yang bisa aktif dalam satu waktu. Semester aktif digunakan sebagai referensi untuk semua data di sistem (kelas, jadwal, nilai, dll).</div>
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
            <li><strong>Urutan yang disarankan:</strong> Tambah tahun pelajaran → Aktifkan tahun → Aktifkan semester</li>
            <li><strong>Backup sebelum hapus:</strong> Selalu backup database melalui menu Database → Backup sebelum menghapus tahun pelajaran</li>
            <li><strong>Perencanaan:</strong> Tambahkan tahun pelajaran untuk beberapa tahun ke depan sekaligus untuk memudahkan perencanaan jangka panjang</li>
            <li><strong>Transisi semester:</strong> Saat pergantian semester, aktifkan semester baru setelah semua data semester lalu selesai diproses (rekap nilai, cetak rapor, dll)</li>
            <li><strong>Kenaikan kelas:</strong> Lakukan kenaikan kelas setelah mengaktifkan tahun pelajaran baru</li>
            <li><strong>Testing:</strong> Sebelum mengganti tahun/semester aktif di produksi, lakukan testing di environment staging untuk memastikan semua data berfungsi dengan baik</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi:</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengedit tahun pelajaran:</strong>
                <span>Tombol Edit disabled karena tahun pelajaran sedang aktif. Non-aktifkan tahun tersebut terlebih dahulu dengan mengaktifkan tahun lain.</span>
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Semua operasi Tahun Pelajaran menggunakan AJAX POST ke controller <code>Datatahun</code> dan mengembalikan respons JSON. Hanya Administrator yang dapat mengakses endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>datatahun</code></td><td>Tampilkan halaman Tahun Pelajaran</td></tr>
                <tr><td>GET</td><td><code>datatahun/data</code></td><td>Ambil data semua tahun pelajaran (JSON untuk DataTables)</td></tr>
                <tr><td>POST</td><td><code>datatahun/add</code></td><td>Tambah tahun baru atau edit tahun yang ada</td></tr>
                <tr><td>POST</td><td><code>datatahun/gantiTahun</code></td><td>Ganti tahun pelajaran aktif</td></tr>
                <tr><td>POST</td><td><code>datatahun/gantiSemester</code></td><td>Ganti semester aktif</td></tr>
                <tr><td>POST</td><td><code>datatahun/hapusTahun</code></td><td>Hapus satu tahun pelajaran by ID</td></tr>
                <tr><td>POST</td><td><code>datatahun/hapus</code></td><td>Hapus tahun pelajaran secara bulk (checkbox)</td></tr>
                <tr><td>POST</td><td><code>datatahun/saveHariEfektif</code></td><td>Simpan jumlah hari efektif semester aktif</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>datatahun/add</code> — Tambah / Edit</h3>
        <p>Endpoint ini menangani dua operasi sekaligus, dibedakan oleh field <code>method</code>:</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>method</code></td><td>Ya</td><td><code>"add"</code> untuk tambah, <code>"edit"</code> untuk edit</td></tr>
                <tr><td><code>tahun</code></td><td>Ya</td><td>Format <code>YYYY/YYYY</code>, contoh: <code>2024/2025</code></td></tr>
                <tr><td><code>id_tahun</code></td><td>Hanya saat edit</td><td>ID tahun pelajaran yang akan diedit</td></tr>
            </tbody>
        </table>
        <p style="margin-top:10px;"><strong>Validasi yang dijalankan server:</strong></p>
        <ol class="step-list">
            <li>Field <code>tahun</code> tidak boleh kosong</li>
            <li>Format harus cocok dengan regex <code>/^[0-9]{4}\/[0-9]{4}$/</code></li>
            <li>Tahun awal harus antara 1990–2100</li>
            <li>Tahun akhir harus tepat 1 tahun setelah tahun awal (misal: 2024 → 2025)</li>
            <li>Tahun tidak boleh duplikat di database (saat tambah); saat edit, ID saat ini dikecualikan dari pengecekan duplikat</li>
        </ol>
        <p style="margin-top:10px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }</pre>
        <p style="margin-top:8px;"><strong>Respons JSON — validasi gagal:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": false,
  "message": "Format tahun harus YYYY/YYYY (contoh: 2024/2025)",
  "errors": { "tahun": "Format tahun harus YYYY/YYYY (contoh: 2024/2025)" }
}</pre>

        <h3 style="margin-top:20px;">POST <code>datatahun/gantiTahun</code> — Ganti Tahun Aktif</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>active</code></td><td>ID tahun pelajaran yang akan dijadikan aktif</td></tr>
                <tr><td><code>tahun</code></td><td>JSON array semua tahun — format: <code>[{"id":"1","tp":"2024/2025"}, ...]</code></td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Server melakukan update batch: semua tahun di-set <code>active = 0</code>, hanya yang cocok dengan <code>active</code> di-set <code>active = 1</code>. Aktivitas dicatat ke log.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": true,
  "msg": "Merubah Tahun Aktif",
  "update": [ {"id_tp": 1, "tahun": "2024/2025", "active": 1}, ... ]
}</pre>

        <h3 style="margin-top:20px;">POST <code>datatahun/gantiSemester</code> — Ganti Semester Aktif</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>active</code></td><td>ID semester yang akan dijadikan aktif</td></tr>
                <tr><td><code>semester</code></td><td>JSON array semua semester — format: <code>[{"id":"1","Semester":"Ganjil"}, ...]</code></td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Logika sama dengan <code>gantiTahun</code> — update batch ke tabel <code>master_smt</code>.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": true,
  "msg": "Merubah Semester Aktif",
  "update": [ {"id_smt": 1, "smt": "Ganjil", "active": 1}, ... ]
}</pre>

        <h3 style="margin-top:20px;">POST <code>datatahun/hapusTahun</code> & <code>datatahun/hapus</code> — Hapus</h3>
        <table class="table-custom">
            <thead><tr><th>Endpoint</th><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>hapusTahun</code></td><td><code>hapus</code></td><td>ID tunggal tahun yang akan dihapus</td></tr>
                <tr><td><code>hapus</code></td><td><code>checked</code></td><td>Array ID dari checkbox yang dipilih</td></tr>
            </tbody>
        </table>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">// Sukses
{ "status": true, "msg": "Menghapus Tahun Pelajaran" }

// Gagal (data masih digunakan relasi lain)
{ "status": false, "msg": "Menghapus Tahun Pelajaran" }</pre>

        <h3 style="margin-top:20px;">POST <code>datatahun/saveHariEfektif</code> — Simpan Hari Efektif</h3>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>jml_hari</code></td><td>Jumlah hari efektif (angka)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;">Data disimpan ke tabel <code>master_hari_efektif</code> dengan key <code>id_hari_efektif = id_tp + id_smt</code> (gabungan ID tahun dan semester aktif). Menggunakan <code>REPLACE INTO</code> sehingga otomatis insert atau update.</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Semua operasi yang mengubah data (tambah, edit, hapus, ganti aktif) dicatat ke tabel log aktivitas via <code>Log_model::saveLog()</code> dengan kode aksi: <code>3</code> = tambah, <code>4</code> = edit/ganti, <code>5</code> = hapus.</div>
        </div>
    </div>`
};

