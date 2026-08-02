if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['atur-ruang'] = {
    title: 'Atur Ruang Ujian',
    desc: 'Panduan lengkap mengatur ruang ujian untuk pembagian siswa di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-door-open"></i> Mengatur Ruang Ujian</h2>
        <p>Ruang ujian adalah lokasi fisik atau virtual tempat ujian dilaksanakan. Setiap ruang memiliki kapasitas maksimal jumlah komputer/siswa. Ruang ujian penting untuk manajemen kapasitas dan penugasan siswa ke lokasi ujian yang sesuai.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Ruang Ujian</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Ruang Ujian</code></li>
            <li>Halaman Ruang Ujian akan ditampilkan dengan daftar ruang yang ada</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Ruang ujian dapat dibuat secara independen dan kemudian ditugaskan ke sesi ujian. Pastikan kapasitas ruang sesuai dengan jumlah komputer yang tersedia.</div>
        </div>
        <hr>
        <h3>🠊 Membuat Ruang Ujian Baru</h3>
        <ol class="step-list">
            <li>Pada halaman Ruang Ujian, klik tombol <code class="inline">+ Tambah Ruang</code> di pojok kanan atas</li>
            <li>Halaman Buat Ruang akan ditampilkan dengan form input</li>
            <li>Isi formulir informasi ruang ujian:
                <ul class="step-list">
                    <li><strong>Nama Ruang:</strong> Nama ruang (wajib diisi, contoh: Lab Komputer 1, Lab Bahasa, dll)</li>
                    <li><strong>Kode Ruang:</strong> Kode unik untuk ruang (opsional, sistem akan generate otomatis jika kosong)</li>
                    <li><strong>Kapasitas:</strong> Jumlah maksimal siswa yang dapat menggunakan ruang ini</li>
                    <li><strong>Lokasi:</strong> Lokasi fisik ruang (contoh: Gedung A Lantai 2)</li>
                    <li><strong>Fasilitas:</strong> Fasilitas yang tersedia di ruang (opsional)</li>
                    <li><strong>Keterangan:</strong> Catatan tambahan tentang ruang (opsional)</li>
                    <li><strong>Status:</strong> Pilih status ruang (Aktif atau Non Aktif)</li>
                </ul>
            </li>
            <li>Periksa ringkasan informasi yang ditampilkan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Ruang ujian baru akan dibuat dan ditambahkan ke daftar ruang</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan nama ruang yang deskriptif dan mudah diidentifikasi. Pastikan kapasitas ruang sesuai dengan jumlah komputer yang tersedia untuk menghindari masalah saat ujian.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Status Ruang Ujian</h3>
        <ol class="step-list">
            <li><strong>Abu-abu (text-muted):</strong> Ruang tidak aktif atau tidak digunakan</li>
            <li><strong>Hijau (text-success):</strong> Ruang aktif dan tersedia untuk ujian</li>
            <li><strong>Kuning (text-yellow):</strong> Ruang aktif dan sedang digunakan untuk ujian</li>
            <li><strong>Merah (text-danger):</strong> Ruang bermasalah atau tidak tersedia</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Ruang yang sedang digunakan untuk ujian tidak dapat dihapus</li>
                    <li>Ruang yang sudah ditugaskan ke sesi tidak dapat dihapus</li>
                    <li>Kapasitas ruang harus sesuai dengan jumlah komputer fisik</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Mengedit Ruang Ujian</h3>
        <ol class="step-list">
            <li>Pada halaman Ruang Ujian, cari ruang yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> pada ruang tersebut</li>
            <li>Ubah data ruang sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Ruang akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Ruang tidak dapat diedit jika sedang digunakan untuk ujian</li>
                    <li>Perubahan kapasitas akan mempengaruhi sesi yang terkait</li>
                    <li>Pastikan kapasitas baru tidak melebihi kapasitas fisik</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Menghapus Ruang Ujian</h3>
        <ol class="step-list">
            <li>Pilih ruang yang ingin dihapus dengan checkbox</li>
            <li>Klik tombol <code class="inline">Hapus terpilih</code></li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Ruang akan dihapus beserta semua data terkait</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Ruang yang sedang digunakan untuk ujian tidak dapat dihapus</li>
                    <li>Ruang yang sudah ditugaskan ke sesi tidak dapat dihapus</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Filter Ruang Ujian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter</code> untuk memfilter berdasarkan:
                <ul class="step-list">
                    <li>Semua: Menampilkan semua ruang</li>
                    <li>Status: Filter berdasarkan status ruang</li>
                    <li>Lokasi: Filter berdasarkan lokasi</li>
                    <li>Kapasitas: Filter berdasarkan kapasitas</li>
                </ul>
            </li>
            <li>Pilih filter yang diinginkan</li>
            <li>Dropdown tambahan akan muncul sesuai filter yang dipilih</li>
            <li>Tabel akan menampilkan ruang sesuai filter</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk menemukan ruang tertentu dengan cepat, terutama jika jumlah ruang sangat banyak.</div>
        </div>
        <hr>
        <h3>🠊 Menugaskan Ruang ke Sesi</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">CBT > Jadwal CBT</code></li>
            <li>Pilih jadwal ujian yang akan diatur</li>
            <li>Klik tab <code class="inline">Sesi</code></li>
            <li>Pilih sesi yang akan ditugaskan ruang</li>
            <li>Klik tombol <code class="inline">Edit</code> pada sesi tersebut</li>
            <li>Pilih ruang dari dropdown</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Ruang akan ditugaskan ke sesi tersebut</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Satu ruang dapat digunakan untuk beberapa sesi jika waktunya tidak tumpang tindih. Pastikan kapasitas ruang cukup untuk jumlah siswa di setiap sesi.</div>
        </div>
        <hr>
        <h3>🠊 Copy Ruang Ujian</h3>
        <ol class="step-list">
            <li>Pada halaman Ruang Ujian, klik tombol <code class="inline">Copy Ruang</code></li>
            <li>Modal akan muncul dengan daftar ruang yang tersedia</li>
            <li>Pilih ruang yang ingin disalin</li>
            <li>Ubah data yang diperlukan (nama, kapasitas, dll)</li>
            <li>Klik tombol <code class="inline">Copy</code></li>
            <li>Ruang baru akan dibuat berdasarkan ruang yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur Copy sangat berguna untuk membuat ruang baru berdasarkan ruang yang sudah ada, misalnya untuk ruang dengan konfigurasi yang sama namun lokasi berbeda.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Kapasitas akurat:</strong> Pastikan kapasitas ruang sesuai dengan jumlah komputer yang tersedia</li>
            <li><strong>Nama yang deskriptif:</strong> Gunakan format nama yang konsisten dan mudah dipahami</li>
            <li><strong>Lokasi jelas:</strong> Berikan informasi lokasi yang jelas untuk memudahkan siswa</li>
            <li><strong>Status aktif:</strong> Set status ruang ke Non Aktif jika tidak digunakan sementara</li>
            <li><strong>Backup ruang:</strong> Gunakan fitur Copy untuk backup ruang sebelum mengubah</li>
            <li><strong>Komunikasi:</strong> Komunikasikan lokasi ruang kepada siswa sebelum ujian</li>
            <li><strong>Review:</strong> Review ruang sebelum mengaktifkannya</li>
            <li><strong>Testing:</strong> Cek ketersediaan komputer di ruang sebelum ujian</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan format ruang untuk referensi tim</li>
            <li><strong>Monitoring:</strong> Monitor penggunaan ruang untuk optimasi kapasitas</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa membuat ruang:</strong>
                <span>Pastikan semua field wajib sudah terisi. Pastikan nama ruang belum digunakan. Pastikan kapasitas lebih dari 0.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kapasitas tidak valid:</strong>
                <span>Pastikan kapasitas adalah angka positif. Pastikan kapasitas sesuai dengan jumlah komputer fisik yang tersedia.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengedit ruang:</strong>
                <span>Ruang yang sedang digunakan untuk ujian tidak dapat diedit. Tunggu hingga ujian selesai atau hapus penugasan sesi terlebih dahulu.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Ruang tidak muncul di dropdown sesi:</strong>
                <span>Pastikan ruang sudah dibuat dan statusnya Aktif. Pastikan ruang belum penuh di sesi lain pada waktu yang sama.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kapasitas terlampaui:</strong>
                <span>Pastikan kapasitas ruang cukup untuk jumlah siswa yang ditugaskan. Kurangi jumlah siswa atau tambah ruang baru.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Copy ruang gagal:</strong>
                <span>Pastikan nama ruang baru belum digunakan. Pastikan data yang diinput valid.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan:</strong> Ruang terkait dengan sesi ujian. Perubahan pada ruang akan mempengaruhi sesi yang terkait.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Kapasitas Fisik:</strong> Pastikan kapasitas ruang sesuai dengan jumlah komputer fisik yang tersedia. Siswa melebihi kapasitas tidak dapat mengikuti ujian.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Status Ruang:</strong> Hanya ruang dengan status Aktif yang dapat digunakan dalam sesi ujian. Set status ruang ke Aktif setelah siap digunakan.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Penggunaan Ganda:</strong> Satu ruang dapat digunakan untuk beberapa sesi jika waktunya tidak tumpang tindih. Pastikan jadwal sesi tidak bentrok.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Semua operasi Ruang Ujian menggunakan AJAX POST ke controller <code>Cbtruang</code> dan mengembalikan respons JSON. Hanya Administrator yang memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtruang</code></td><td>Tampilkan halaman data ruang ujian</td></tr>
                <tr><td>POST</td><td><code>cbtruang/data</code></td><td>Ambil data ruang ujian (JSON DataTables)</td></tr>
                <tr><td>POST</td><td><code>cbtruang/add</code></td><td>Tambah ruang ujian baru</td></tr>
                <tr><td>POST</td><td><code>cbtruang/update</code></td><td>Update data ruang ujian</td></tr>
                <tr><td>POST</td><td><code>cbtruang/delete</code></td><td>Hapus ruang ujian (bulk)</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtruang/add</code> — Tambah Ruang Ujian</h3>
        <p>Endpoint ini menangani operasi penambahan ruang ujian baru ke database.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>nama_ruang</code></td><td>Ya</td><td>Nama ruang (contoh: Lab Komputer 1)</td></tr>
                <tr><td><code>kode_ruang</code></td><td>Ya</td><td>Kode unik ruang (contoh: LAB01, R001)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": { "nama_ruang": "Lab Komputer 1", "kode_ruang": "LAB01" } }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtruang/update</code> — Update Ruang Ujian</h3>
        <p>Endpoint ini menangani operasi perubahan data ruang ujian yang sudah ada. Data diproses melalui model Cbt_model method updateRuang().</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_ruang</code></td><td>Ya</td><td>ID ruang yang akan diupdate</td></tr>
                <tr><td><code>nama_ruang</code></td><td>Ya</td><td>Nama ruang baru</td></tr>
                <tr><td><code>kode_ruang</code></td><td>Ya</td><td>Kode ruang baru</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "Data ruang berhasil diupdate" }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtruang/delete</code> — Hapus Ruang Ujian</h3>
        <p>Endpoint ini menangani operasi penghapusan ruang ujian (bisa bulk/menghapus banyak sekaligus).</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>checked[]</code></td><td>Ya</td><td>Array ID ruang yang akan dihapus</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "total": 3 }</pre>
        <p style="margin-top:8px;"><strong>Respons JSON — gagal (tidak ada data terpilih):</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": false }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Ruang yang sudah digunakan dalam sesi ujian atau jadwal tidak dapat dihapus. Pastikan menghapus penugasan sesi terkait terlebih dahulu sebelum menghapus ruang.</div>
        </div>
    </div>`
};
