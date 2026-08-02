if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['log-aktivitas'] = {
    title: 'Log Aktivitas',
    desc: 'Melihat log aktivitas pengguna dalam sistem.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-clock"></i> Log Aktivitas</h2>
        <p>Log Aktivitas menampilkan riwayat aktivitas pengguna dalam sistem GarudaCBT untuk keperluan audit dan monitoring.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <h3>Melihat Log Aktivitas</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Informasi > Log Aktivitas</code></li>
            <li>Pilih filter yang diinginkan:
                <ul style="margin-top:8px">
                    <li><strong>Tanggal</strong> — filter berdasarkan tanggal</li>
                    <li><strong>User</strong> — filter berdasarkan pengguna</li>
                    <li><strong>Aktivitas</strong> — filter berdasarkan jenis aktivitas</li>
                    <li><strong>Module</strong> — filter berdasarkan modul</li>
                </ul>
            </li>
            <li>Daftar log aktivitas akan ditampilkan:
                <ul style="margin-top:8px">
                    <li><strong>Tanggal/Waktu</strong> — waktu aktivitas</li>
                    <li><strong>User</strong> — nama pengguna</li>
                    <li><strong>Aktivitas</strong> — jenis aktivitas</li>
                    <li><strong>Module</strong> — modul yang diakses</li>
                    <li><strong>IP Address</strong> — alamat IP</li>
                    <li><strong>Status</strong> — status aktivitas</li>
                </ul>
            </li>
        </ol>

        <h3>Fitur Log</h3>
        <ul>
            <li><strong>Export</strong> — export log ke Excel</li>
            <li><strong>Filter</strong> — filter berbagai kriteria</li>
            <li><strong>Clear Log</strong> — menghapus log lama</li>
            <li><strong>Search</strong> — pencarian aktivitas spesifik</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Log aktivitas penting untuk audit dan keamanan sistem. Jangan menghapus log kecuali diperlukan.</div>
        </div>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Gunakan log aktivitas untuk melacak aktivitas mencurigakan atau troubleshooting masalah sistem.</div>
        </div>
    </div>`
};
