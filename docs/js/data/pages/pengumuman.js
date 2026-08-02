if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['pengumuman'] = {
    title: 'Pengumuman',
    desc: 'Mengelola pengumuman untuk pengguna aplikasi.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-bullhorn"></i> Pengumuman</h2>
        <p>Pengumuman digunakan untuk menyampaikan informasi penting kepada seluruh pengguna aplikasi GarudaCBT.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <h3>Membuat Pengumuman</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Informasi > Pengumuman</code></li>
            <li>Klik tombol <code class="inline">Tambah Pengumuman</code></li>
            <li>Isi data pengumuman:
                <ul style="margin-top:8px">
                    <li><strong>Judul</strong> — judul pengumuman</li>
                    <li><strong>Isi</strong> — konten pengumuman</li>
                    <li><strong>Kategori</strong> — kategori pengumuman</li>
                    <li><strong>Tanggal</strong> — tanggal tayang</li>
                    <li><strong>Target</strong> — target audience (Admin/Guru/Siswa)</li>
                    <li><strong>Status</strong> — aktif/nonaktif</li>
                </ul>
            </li>
            <li>Klik <code class="inline">Simpan</code></li>
        </ol>

        <h3>Fitur Pengumuman</h3>
        <ul>
            <li><strong>Edit</strong> — mengubah pengumuman</li>
            <li><strong>Hapus</strong> — menghapus pengumuman</li>
            <li><strong>Publish/Unpublish</strong> — mengatur status tayang</li>
            <li><strong>Priority</strong> — mengatur prioritas tampilan</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Gunakan pengumuman untuk informasi penting seperti jadwal ujian, maintenance sistem, atau kegiatan sekolah.</div>
        </div>
    </div>`
};
