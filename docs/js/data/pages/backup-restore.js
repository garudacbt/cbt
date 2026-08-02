if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['backup-restore'] = {
    title: 'Backup & Restore',
    desc: 'Melakukan backup dan restore data aplikasi.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-database"></i> Backup & Restore</h2>
        <p>Backup & Restore menyediakan fitur untuk mencadangkan dan memulihkan data aplikasi GarudaCBT.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <h3>Backup Data</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Database > Backup & Restore</code></li>
            <li>Klik tab <code class="inline">Backup</code></li>
            <li>Pilih data yang akan di-backup:
                <ul style="margin-top:8px">
                    <li><strong>Database</strong> — seluruh data aplikasi</li>
                    <li><strong>Files</strong> — file upload (soal, materi, dll)</li>
                    <li><strong>Full Backup</strong> — database dan files</li>
                </ul>
            </li>
            <li>Klik <code class="inline">Backup</code></li>
            <li>Tunggu proses backup selesai</li>
            <li>Download file backup</li>
        </ol>

        <h3>Restore Data</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Database > Backup & Restore</code></li>
            <li>Klik tab <code class="inline">Restore</code></li>
            <li>Pilih file backup yang akan di-restore</li>
            <li>Review informasi backup</li>
            <li>Klik <code class="inline">Restore</code></li>
            <li>Konfirmasi restore</li>
            <li>Tunggu proses restore selesai</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Restore akan menggantikan seluruh data saat ini. Pastikan untuk melakukan backup sebelum melakukan restore. Restore tidak dapat dibatalkan.</div>
        </div>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Lakukan backup secara rutin, minimal seminggu sekali atau sebelum melakukan perubahan besar pada data.</div>
        </div>
    </div>`
};
