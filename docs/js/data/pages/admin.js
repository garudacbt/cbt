if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['admin'] = {
    title: 'Administrator',
    desc: 'Mengelola akun administrator sistem.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-user-shield"></i> Manajemen Administrator</h2>
        <p>Administrator adalah pengguna dengan akses penuh ke seluruh fitur sistem. Hanya administrator yang dapat menambah administrator baru.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <h3>Menambah Administrator</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Pengaturan > Pengguna > Administrator</code></li>
            <li>Klik tombol <code class="inline">+ Tambah Admin</code></li>
            <li>Isi formulir:
                <ul style="margin-top:8px">
                    <li><strong>Username</strong> — username untuk login</li>
                    <li><strong>Password</strong> — password minimal 5 karakter</li>
                    <li><strong>Nama Lengkap</strong> — nama administrator</li>
                    <li><strong>Email</strong> — email (opsional)</li>
                </ul>
            </li>
            <li>Klik <code class="inline">Simpan</code></li>
        </ol>

        <h3>Hak Akses Administrator</h3>
        <ul>
            <li>Kelola seluruh data master</li>
            <li>Kelola pengguna sistem</li>
            <li>Konfigurasi sistem</li>
            <li>Backup dan restore database</li>
            <li>Akses ke seluruh fitur</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Hindari membuat terlalu banyak administrator. Sebaiknya hanya 2-3 administrator untuk keamanan sistem.</div>
        </div>
    </div>`
};
