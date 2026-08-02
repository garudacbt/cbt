if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['db-management'] = {
    title: 'Data Management',
    desc: 'Manajemen data dan database aplikasi.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-database"></i> Data Management</h2>
        <p>Data Management menyediakan fitur untuk mengelola data dalam database aplikasi GarudaCBT.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <h3>Fitur Data Management</h3>
        <ul>
            <li><strong>Clear Data</strong> — Menghapus data sementara dan cache</li>
            <li><strong>Reset Data</strong> — Mereset data ke kondisi awal</li>
            <li><strong>Optimize Database</strong> — Mengoptimalkan kinerja database</li>
            <li><strong>Check Integrity</strong> — Memeriksa integritas data</li>
        </ul>

        <h3>Menggunakan Data Management</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Database > Data Management</code></li>
            <li>Pilih operasi yang akan dilakukan</li>
            <li>Review konfirmasi dan peringatan</li>
            <li>Klik <code class="inline">Eksekusi</code></li>
            <li>Tunggu proses selesai</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Operasi Data Management dapat menghapus atau memodifikasi data. Pastikan untuk melakukan backup sebelum melakukan operasi yang bersifat destruktif.</div>
        </div>
    </div>`
};
