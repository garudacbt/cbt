if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['db-management'] = {
    title: 'Data Management',
    desc: 'Mengosongkan tabel database secara aman, dengan backup otomatis sebelum setiap penghapusan.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-database"></i> Data Management (Bersihkan Data)</h2>
        <p>Halaman <strong>Bersihkan Data</strong> digunakan administrator untuk mengosongkan (truncate) tabel-tabel
        database aplikasi GarudaCBT secara aman. Setiap tabel yang dikosongkan akan <strong>otomatis di-backup</strong>
        terlebih dahulu, sehingga data dapat dipulihkan kembali melalui menu
        <code class="inline">Database &gt; Backup &amp; Restore</code>.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <h3>Fitur</h3>
        <ul>
            <li><strong>Daftar tabel dinamis</strong> — menampilkan seluruh tabel beserta jumlah baris data (Total Data) saat ini.</li>
            <li><strong>Kosongkan tabel</strong> — mengosongkan isi satu tabel tanpa menghapus strukturnya, lengkap dengan backup otomatis.</li>
            <li><strong>Backup otomatis</strong> — file backup <code class="inline">.sql</code> dibuat sebelum tabel dikosongkan.</li>
            <li><strong>Pengelompokan kategori</strong> — tabel dikelompokkan menurut tingkat risiko penghapusan.</li>
        </ul>

        <h3>Kategori Tabel</h3>
        <p>Setiap kelompok tabel diberi keterangan tingkat risiko:</p>
        <table class="table-custom">
            <thead>
                <tr><th>Kategori</th><th>Keterangan</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Master</strong></td>
                    <td>Data yang dipakai sepanjang tahun/semester. Sebaiknya tidak dihapus kecuali sudah tidak diperlukan.</td>
                </tr>
                <tr>
                    <td><strong>Dapat dikosongkan</strong></td>
                    <td>Data yang hanya digunakan pada satu tahun/semester (mis. jadwal, log, nilai sementara).</td>
                </tr>
                <tr>
                    <td><strong>Tidak digunakan</strong></td>
                    <td>Tabel lama yang tidak dipakai di versi terbaru; aman untuk dikosongkan.</td>
                </tr>
            </tbody>
        </table>

        <h3>Cara Mengosongkan Tabel</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Database &gt; Data Management</code>.</li>
            <li>Temukan tabel yang ingin dikosongkan. Tombol <code class="inline">Kosongkan</code> hanya aktif bila tabel memiliki data (Total Data &gt; 0).</li>
            <li>Klik <code class="inline">Kosongkan</code> pada baris tabel tersebut.</li>
            <li>Baca konfirmasi, lalu klik <code class="inline">Hapus!</code>.</li>
            <li>Tunggu proses selesai. Tabel akan di-backup lalu dikosongkan, dan halaman dimuat ulang.</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div><strong>Perhatian:</strong> Mengosongkan <code class="inline">master_siswa</code> juga akan mengosongkan
            tabel <code class="inline">buku_induk</code> (data induk siswa) agar tidak menyisakan data yatim. Kedua tabel
            tetap di-backup otomatis sebelum dikosongkan.</div>
        </div>

        <h3>Backup Otomatis &amp; Pemulihan</h3>
        <ul>
            <li>Sebelum sebuah tabel dikosongkan, sistem membuat file backup di folder <code class="inline">backups/</code>.</li>
            <li>Nama file berformat <code class="inline">backup_&lt;nama_tabel&gt;_&lt;tanggal_jam&gt;.sql</code>, contoh: <code class="inline">backup_master_siswa_2026_10_14_09_30_00.sql</code>.</li>
            <li>Backup tersebut dapat dilihat, diunduh, atau dipulihkan (restore) melalui menu <code class="inline">Database &gt; Backup &amp; Restore</code>.</li>
        </ul>

        <h3>Tabel yang Dilindungi</h3>
        <p>Tabel sistem dan konfigurasi penting <strong>tidak ditampilkan</strong> dan tidak dapat dikosongkan dari halaman ini,
        antara lain: <code class="inline">users</code>, <code class="inline">groups</code>, <code class="inline">users_groups</code>,
        <code class="inline">setting</code>, <code class="inline">ci_sessions</code>, <code class="inline">migrations</code>,
        <code class="inline">login_attempts</code>, serta tabel master acuan (tahun, semester, level, dll).</p>

        <div class="info-box">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Lakukan backup penuh melalui menu <code class="inline">Database &gt; Backup &amp; Restore</code>
            sebelum mengosongkan banyak tabel sekaligus, terutama di akhir tahun ajaran.</div>
        </div>
    </div>`
};
