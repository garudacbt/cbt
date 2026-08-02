if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['profil-sekolah'] = {
    title: 'Profil Sekolah',
    desc: 'Mengelola data profil sekolah.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-building"></i> Profil Sekolah</h2>
        <p>Profil sekolah berisi informasi dasar tentang sekolah yang akan ditampilkan di rapor dan dokumen resmi.</p>

        <h3>Mengedit Profil Sekolah</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Pengaturan > Data Sekolah > Profil Sekolah</code></li>
            <li>Edit informasi sekolah:
                <ul style="margin-top:8px">
                    <li><strong>Nama Sekolah</strong> — nama resmi sekolah</li>
                    <li><strong>NPSN</strong> — Nomor Pokok Sekolah Nasional</li>
                    <li><strong>Alamat</strong> — alamat lengkap</li>
                    <li><strong>Telepon</strong> — nomor telepon</li>
                    <li><strong>Email</strong> — email sekolah</li>
                    <li><strong>Website</strong> — website sekolah</li>
                    <li><strong>Kepala Sekolah</strong> — nama kepala sekolah</li>
                    <li><strong>NIP Kepala Sekolah</strong> — NIP kepala sekolah</li>
                </ul>
            </li>
            <li>Upload logo sekolah (opsional)</li>
            <li>Klik <code class="inline">Simpan</code></li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Informasi profil sekolah akan otomatis ditampilkan di kop rapor dan dokumen resmi lainnya.</div>
        </div>
    </div>`
};
