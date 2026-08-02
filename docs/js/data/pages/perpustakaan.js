if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['perpustakaan'] = {
    title: 'Perpustakaan Digital',
    desc: 'Mengelola perpustakaan digital e-learning.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-book"></i> Perpustakaan Digital</h2>
        <p>Perpustakaan Digital menyediakan fitur untuk mengelola buku dan referensi digital dalam sistem e-learning.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <h3>Menambah Buku Digital</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">E-Learning > Data E-Learning > Perpustakaan Digital</code></li>
            <li>Klik tombol <code class="inline">Tambah Buku</code></li>
            <li>Isi data buku:
                <ul style="margin-top:8px">
                    <li><strong>Judul</strong> — judul buku</li>
                    <li><strong>Penulis</strong> — nama penulis</li>
                    <li><strong>Kategori</strong> — kategori buku</li>
                    <li><strong>Deskripsi</strong> — deskripsi buku</li>
                    <li><strong>File</strong> — upload file buku (PDF)</li>
                    <li><strong>Cover</strong> — upload gambar cover</li>
                </ul>
            </li>
            <li>Klik <code class="inline">Simpan</code></li>
        </ol>

        <h3>Fitur Perpustakaan</h3>
        <ul>
            <li><strong>Pencarian</strong> — cari buku berdasarkan judul atau penulis</li>
            <li><strong>Kategori</strong> — filter berdasarkan kategori</li>
            <li><strong>Download</strong> — download buku untuk dibaca offline</li>
            <li><strong>Reading History</strong> — riwayat bacaan siswa</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Gunakan Perpustakaan Digital untuk menyediakan referensi tambahan bagi siswa dalam proses pembelajaran.</div>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Gunakan Perpustakaan Digital untuk menyediakan referensi tambahan bagi siswa dalam proses pembelajaran.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Perpustakaan Digital dikelola melalui controller <code>Elearning</code>. Buku/URL disimpan di tabel <code>kelas_libraries</code>. Administrator dan Guru memiliki akses untuk menambah & menghapus pustaka.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>POST</td><td><code>elearning/add_pustaka</code></td><td>Tambah/edit entri perpustakaan</td></tr>
                <tr><td>GET</td><td><code>elearning/del_pustaka?id_url={id}</code></td><td>Hapus entri perpustakaan</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>elearning/add_pustaka</code> — Tambah/Edit Pustaka</h3>
        <p>Endpoint ini melakukan insert bila <code>id</code> kosong, atau update bila <code>id</code> terisi.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id</code></td><td>ID pustaka (kosong = tambah baru)</td></tr>
                <tr><td><code>url_address</code></td><td>URL buku/referensi digital</td></tr>
                <tr><td><code>title</code></td><td>Judul buku</td></tr>
                <tr><td><code>site_name</code></td><td>Nama situs/sumber</td></tr>
                <tr><td><code>description</code></td><td>Deskripsi buku</td></tr>
                <tr><td><code>image</code></td><td>URL gambar cover (hanya saat tambah baru)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": true,
  "msg": "Pustaka berhasil disimpan"
}</pre>
        <p style="margin-top:8px;"><strong>Respons JSON — gagal:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": false,
  "msg": "Gagal menyimpan pustaka"
}</pre>

        <h3 style="margin-top:20px;">GET <code>elearning/del_pustaka</code> — Hapus Pustaka</h3>
        <p>Endpoint ini menghapus entri dari tabel <code>kelas_libraries</code> berdasarkan <code>id_url</code>.</p>
        <table class="table-custom">
            <thead><tr><th>Parameter</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_url</code></td><td>ID pustaka yang akan dihapus</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "msg": "URL pustaka berhasil dihapus" }</pre>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <ul style="margin-bottom:0;">
                    <li>Field <code>image</code> (cover) hanya diisi saat menambah baru, tidak saat edit.</li>
                    <li>URL harus valid agar dapat dibuka oleh siswa.</li>
                    <li>Semua request menggunakan token CSRF dan session login aktif.</li>
                </ul>
            </div>
        </div>
    </div>`
};
