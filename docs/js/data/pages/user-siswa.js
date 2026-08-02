if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['user-siswa'] = {
    title: 'User Siswa',
    desc: 'Mengelola akun pengguna siswa.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-user-graduate"></i> Manajemen User Siswa</h2>
        <p>User siswa adalah akun login untuk siswa. Akun ini dibuat otomatis saat data siswa ditambahkan.</p>

        <h3>Aktivasi Akun Siswa</h3>
        <p>Akun siswa dibuat otomatis dengan:</p>
        <ul>
            <li><strong>Username</strong> — menggunakan NIS</li>
            <li><strong>Password</strong> — default sama dengan NIS</li>
            <li><strong>Status</strong> — aktif secara default</li>
        </ul>

        <h3>Mengelola Akun Siswa</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Pengaturan > Pengguna > User Siswa</code></li>
            <li>Daftar user siswa akan ditampilkan</li>
            <li>Aksi yang dapat dilakukan:
                <ul style="margin-top:8px">
                    <li><strong>Reset Password</strong> — reset password ke default</li>
                    <li><strong>Nonaktifkan</strong> — nonaktifkan akun sementara</li>
                    <li><strong>Aktivkan</strong> — aktifkan kembali akun</li>
                    <li><strong>Hapus</strong> — hapus akun</li>
                </ul>
            </li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Menghapus akun siswa tidak akan menghapus data siswa. Data siswa tetap tersimpan di Data Master.</div>
        </div>
    </div>`
};
