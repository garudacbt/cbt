if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['update-migrasi'] = {
    title: 'Update & Migrasi Database',
    desc: 'Memperbarui struktur database saat versi aplikasi naik, serta memulihkan data bila migrasi gagal.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-sync-alt"></i> Update & Migrasi Database</h2>
        <p>Halaman <strong>Update & Migrasi</strong> muncul otomatis ketika versi aplikasi (kode) lebih baru
        daripada versi database. Halaman ini menyesuaikan struktur & data database agar sesuai dengan versi
        aplikasi terbaru sebelum aplikasi dapat digunakan.</p>

        <div class="info-box">
            <i class="fas fa-info-circle"></i>
            <div>Halaman ini biasanya dapat diakses di alamat <code class="inline">/migrate</code> atau langsung
            dari halaman utama saat sistem mendeteksi ada migrasi tertunda.</div>
        </div>

        <h3>Kapan Halaman Ini Muncul?</h3>
        <ul class="step-list">
            <li>Setelah Anda <strong>mengganti file aplikasi</strong> ke versi yang lebih baru.</li>
            <li>Saat login/dashboard mendeteksi <code class="inline">current_version < latest_version</code>.</li>
            <li>Saat instalasi baru jika database masih perlu disesuaikan ke versi terbaru.</li>
        </ul>

        <h3>Menjalankan Migrasi</h3>
        <ol class="step-list">
            <li>Buka halaman <strong>Update Database</strong>.</li>
            <li>Klik <code class="inline">Cek Database</code> untuk memeriksa kondisi & versi database.</li>
            <li>Klik <code class="inline">Update Database</code> untuk memulai proses migrasi.</li>
            <li>Tunggu hingga proses selesai. Aplikasi akan kembali ke halaman utama secara otomatis.</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div><strong>Backup database secara manual terlebih dahulu!</strong> Meskipun sistem sudah membuat backup
            otomatis per tabel (lihat di bawah), backup manual tetap dianjurkan sebagai lapisan pengaman terakhir.</div>
        </div>

        <h3>Pengaman Otomatis Selama Migrasi</h3>
        <p>Sebelum sebuah tabel dikosongkan untuk diproses, sistem otomatis membuat salinannya ke tabel
        <code class="inline"><nama_tabel>_migbak</code> (struktur + data). Backup ini:</p>
        <ul class="step-list">
            <li>Dibuat <strong>sebelum</strong> tabel asli dikosongkan.</li>
            <li><strong>Tidak pernah ditimpa</strong> jika sudah ada — sehingga data asli selalu aman meskipun migrasi
            dijalankan berkali-kali.</li>
            <li>Dapat dipulihkan kapan saja melalui tombol pemulihan pada dialog kegagalan.</li>
        </ul>

        <h3>Jika Migrasi Gagal</h3>
        <p>Bila proses terhenti (misalnya koneksi terputus atau terjadi error), akan muncul dialog
        <strong>“Migrasi Gagal”</strong> yang berisi:</p>
        <ol class="step-list">
            <li><strong>Pesan kesalahan</strong> yang menyebabkan migrasi berhenti.</li>
            <li><strong>Daftar tabel</strong> yang sudah dikosongkan dan memiliki backup
            (<code class="inline">_migbak</code>) — yaitu tabel yang bisa dipulihkan.</li>
        </ol>
        <p>Pada dialog tersebut tersedia dua pilihan:</p>
        <ul class="step-list">
            <li><strong>Pulihkan Semua (Batalkan Migrasi)</strong> — mengembalikan semua tabel ke kondisi sebelum
            migrasi dan mengembalikan versi database, sehingga Anda dapat menjalankan migrasi lagi dari awal.</li>
            <li><strong>Tutup Tanpa Memulihkan</strong> — menutup dialog. Backup <code class="inline">_migbak</code>
            tetap tersimpan dan dapat dipulihkan pada percobaan berikutnya.</li>
        </ul>

        <h3>Peringatan Sebelum Menjalankan Ulang</h3>
        <p>Jika ada migrasi sebelumnya yang belum selesai (masih terdapat backup <code class="inline">_migbak</code>),
        sistem akan menampilkan peringatan <strong>“Migrasi Sebelumnya Belum Selesai”</strong> saat Anda menekan
        <code class="inline">Update Database</code>. Anda dipilihkan untuk:</p>
        <ul class="step-list">
            <li><strong>Pulihkan Dulu</strong> — membatalkan migrasi sebelumnya dan memulihkan data (disarankan).</li>
            <li><strong>Lanjutkan Migrasi</strong> — melanjutkan. Backup lama <em>tidak</em> akan ditimpa, namun tabel
            yang sudah kosong akan tetap kosong sampai dipulihkan.</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Jika ragu setelah migrasi gagal, pilih <strong>Pulihkan Semua</strong> terlebih dahulu. Aplikasi akan
            kembali ke kondisi stabil sebelum migrasi, lalu Anda bisa mencoba lagi setelah memastikan koneksi &
            backup aman.</div>
        </div>

        <div class="info-box">
            <i class="fas fa-database"></i>
            <div>Tabel backup <code class="inline">_migbak</code> sengaja dibiarkan ada setelah migrasi sebagai
            jaring pengaman. Anda dapat menghapusnya manual melalui menu
            <code class="inline">Database > Data Management</code> bila sudah yakin migrasi berhasil.</div>
        </div>
    </div>`
};
