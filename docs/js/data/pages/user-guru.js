if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['user-guru'] = {
    title: 'User Guru',
    desc: 'Manajemen akun pengguna untuk guru.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-chalkboard-teacher"></i> User Guru</h2>
        <p>User Guru menyediakan fitur untuk mengelola akun pengguna bagi guru dalam sistem GarudaCBT.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <h3>Menambah User Guru</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Pengaturan > Manajemen Pengguna > User Guru</code></li>
            <li>Klik tombol <code class="inline">Tambah User</code></li>
            <li>Isi data user:
                <ul style="margin-top:8px">
                    <li><strong>Nama</strong> — nama lengkap guru</li>
                    <li><strong>NIP/NUPTK</strong> — nomor identitas guru</li>
                    <li><strong>Username</strong> — nama untuk login</li>
                    <li><strong>Password</strong> — kata sandi</li>
                    <li><strong>Email</strong> — alamat email</li>
                    <li><strong>No. HP</strong> — nomor telepon</li>
                </ul>
            </li>
            <li>Pilih hak akses:
                <ul style="margin-top:8px">
                    <li><strong>Guru Mapel</strong> — akses mengajar dan input nilai</li>
                    <li><strong>Wali Kelas</strong> — akses tambahan untuk manajemen kelas</li>
                    <li><strong>Guru Piket</strong> — akses untuk jadwal piket</li>
                </ul>
            </li>
            <li>Klik <code class="inline">Simpan</code></li>
        </ol>

        <h3>Mengedit User Guru</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Pengaturan > Manajemen Pengguna > User Guru</code></li>
            <li>Cari guru yang akan diedit</li>
            <li>Klik tombol <code class="inline">Edit</code></li>
            <li>Ubah data yang diperlukan</li>
            <li>Klik <code class="inline">Simpan</code></li>
        </ol>

        <h3>Mereset Password</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Pengaturan > Manajemen Pengguna > User Guru</code></li>
            <li>Cari guru yang akan di-reset password</li>
            <li>Klik tombol <code class="inline">Reset Password</code></li>
            <li>Masukkan password baru</li>
            <li>Klik <code class="inline">Simpan</code></li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Berikan hak akses sesuai dengan tugas dan tanggung jawab guru. Jangan berikan akses admin kepada guru kecuali diperlukan.</div>
        </div>
    </div>`
};
