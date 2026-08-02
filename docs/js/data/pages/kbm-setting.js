if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['kbm-setting'] = {
    title: 'Setting KBM',
    desc: 'Panduan lengkap mengatur setting KBM (Kegiatan Belajar Mengajar) di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-cogs"></i> Setting KBM</h2>
        <p>Setting KBM mengatur parameter kegiatan belajar mengajar seperti jam pelajaran, istirahat, dan hari efektif. Setting ini menjadi dasar untuk pembuatan jadwal pelajaran dan sistem absensi. Administrator memiliki akses penuh ke menu ini.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Setting KBM</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator ke sistem</li>
            <li>Buka menu <code class="inline">E-Learning</code></li>
            <li>Klik submenu <code class="inline">Jadwal Pelajaran</code></li>
            <li>Klik tab <code class="inline">Setting KBM</code></li>
            <li>Halaman Setting KBM akan ditampilkan dengan beberapa tab konfigurasi</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Setting KBM harus diatur sebelum membuat jadwal pelajaran. Perubahan Setting KBM akan mempengaruhi semua jadwal pelajaran yang sudah ada.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur Jam Pelajaran</h3>
        <ol class="step-list">
            <li>Pada halaman Setting KBM, pilih tab <code class="inline">Jam Pelajaran</code></li>
            <li>Daftar jam pelajaran yang sudah ada akan ditampilkan</li>
            <li>Klik tombol <code class="inline">+ Tambah Jam</code> untuk menambah jam pelajaran baru</li>
            <li>Isi formulir jam pelajaran:
                <ul class="step-list">
                    <li><strong>Jam Ke:</strong> Urutan jam pelajaran (1, 2, 3, dst)</li>
                    <li><strong>Mulai:</strong> Jam mulai pelajaran (format 24 jam, misal 07:00)</li>
                    <li><strong>Selesai:</strong> Jam selesai pelajaran (format 24 jam, misal 07:45)</li>
                    <li><strong>Durasi:</strong> Lama pelajaran dalam menit (otomatis dihitung)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Jam pelajaran akan ditambahkan ke daftar</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Pastikan jam selesai setelah jam mulai. Durasi akan dihitung otomatis berdasarkan selisih waktu mulai dan selesai.</div>
        </div>
        <hr>
        <h3>🠊 Mengedit Jam Pelajaran</h3>
        <ol class="step-list">
            <li>Pada tab Jam Pelajaran, cari jam yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> pada jam tersebut</li>
            <li>Ubah data jam pelajaran sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Jam pelajaran akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Perubahan jam pelajaran akan mempengaruhi semua jadwal pelajaran</li>
                    <li>Pastikan untuk mengkomunikasikan perubahan kepada guru dan siswa</li>
                    <li>Jadwal pelajaran mungkin perlu disesuaikan setelah perubahan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Menghapus Jam Pelajaran</h3>
        <ol class="step-list">
            <li>Pada tab Jam Pelajaran, cari jam yang ingin dihapus</li>
            <li>Klik tombol <code class="inline">Hapus</code> pada jam tersebut</li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Jam pelajaran akan dihapus</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Jam pelajaran yang digunakan dalam jadwal tidak dapat dihapus</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Mengatur Istirahat</h3>
        <ol class="step-list">
            <li>Pada halaman Setting KBM, pilih tab <code class="inline">Istirahat</code></li>
            <li>Daftar istirahat yang sudah ada akan ditampilkan</li>
            <li>Klik tombol <code class="inline">+ Tambah Istirahat</code> untuk menambah istirahat baru</li>
            <li>Isi formulir istirahat:
                <ul class="step-list">
                    <li><strong>Istirahat Ke:</strong> Urutan istirahat (1, 2, dst)</li>
                    <li><strong>Mulai:</strong> Jam mulai istirahat (format 24 jam)</li>
                    <li><strong>Selesai:</strong> Jam selesai istirahat (format 24 jam)</li>
                    <li><strong>Durasi:</strong> Lama istirahat dalam menit (otomatis dihitung)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Istirahat akan ditambahkan ke daftar</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Istirahat biasanya diatur setelah beberapa jam pelajaran. Sesuaikan dengan kebijakan sekolah mengenai jam istirahat.</div>
        </div>
        <hr>
        <h3>🠊 Mengatur Hari Efektif</h3>
        <ol class="step-list">
            <li>Pada halaman Setting KBM, pilih tab <code class="inline">Hari Efektif</code></li>
            <li>Daftar hari dalam seminggu akan ditampilkan</li>
            <li>Centang hari yang efektif untuk pembelajaran</li>
            <li>Atur jumlah jam pelajaran per hari untuk setiap hari yang dicentang</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Setting hari efektif akan disimpan</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Hari yang tidak dicentang tidak akan muncul dalam jadwal pelajaran. Gunakan ini untuk hari libur atau hari tanpa KBM.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Atur sebelum jadwal:</strong> Atur Setting KBM sebelum membuat jadwal pelajaran</li>
            <li><strong>Konsistensi:</strong> Pastikan setting konsisten dengan kalender akademik</li>
            <li><strong>Komunikasi:</strong> Komunikasikan perubahan kepada guru dan siswa</li>
            <li><strong>Review:</strong> Review setting sebelum mengaktifkannya</li>
            <li><strong>Backup:</strong> Catat setting sebelum mengubah untuk referensi</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan kebijakan KBM untuk referensi tim</li>
            <li><strong>Testing:</strong> Coba uji coba setting sebelum implementasi penuh</li>
            <li><strong>Update berkala:</strong> Review dan update setting secara berkala</li>
            <li><strong>Sesuaikan kebutuhan:</strong> Sesuaikan dengan kebutuhan sekolah dan kurikulum</li>
            <li><strong>Perhatikan istirahat:</strong> Pastikan istirahat cukup untuk siswa dan guru</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menambah jam pelajaran:</strong>
                <span>Pastikan format waktu sudah benar (24 jam). Pastikan jam selesai setelah jam mulai. Periksa apakah ada error yang ditampilkan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Jam pelajaran tidak muncul di jadwal:</strong>
                <span>Pastikan jam pelajaran sudah disimpan dengan benar. Pastikan hari efektif sudah diatur untuk hari tersebut.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menghapus jam pelajaran:</strong>
                <span>Jam pelajaran yang digunakan dalam jadwal tidak dapat dihapus. Hapus atau edit jadwal terkait terlebih dahulu.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Durasi tidak sesuai:</strong>
                <span>Durasi dihitung otomatis dari waktu mulai dan selesai. Pastikan waktu selesai setelah waktu mulai.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Hari efektif tidak berfungsi:</strong>
                <span>Pastikan hari yang diinginkan sudah dicentang. Pastikan jumlah jam pelajaran per hari sudah diatur.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> Setting KBM dibuat per tahun pelajaran dan semester. Data di tahun pelajaran berbeda adalah data yang terpisah.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan Jadwal:</strong> Setting KBM menjadi dasar untuk pembuatan jadwal pelajaran. Perubahan Setting KBM akan mempengaruhi semua jadwal.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Administrator:</strong> Hanya Administrator yang dapat mengakses dan mengubah Setting KBM. Guru tidak memiliki akses ke menu ini.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Integrasi dengan Absensi:</strong> Setting KBM digunakan sebagai dasar untuk sistem absensi. Pastikan setting akurat sebelum mulai menggunakan absensi.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Administrator:</strong> Hanya Administrator yang dapat mengakses dan mengubah Setting KBM. Guru tidak memiliki akses ke menu ini.
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Setting KBM (jam pelajaran, istirahat, hari efektif, upacara) disimpan melalui endpoint <code>elearning/setJadwal</code> menggunakan AJAX POST dan mengembalikan respons JSON. Hanya Administrator yang dapat mengakses endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>POST</td><td><code>elearning/setJadwal</code></td><td>Simpan setting KBM (jam pelajaran, istirahat, hari efektif, upacara)</td></tr>
                <tr><td>POST</td><td><code>elearning/reformat_jadwal</code></td><td>Menyesuaikan rentang jam KBM dari jadwal mapel</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>elearning/setJadwal</code> — Simpan Setting KBM</h3>
        <p>Endpoint ini menerima konfigurasi KBM dan menyimpannya ke tabel <code>kelas_jadwal_kbm</code> (serta <code>kelas_jadwal_mapel</code> bila <code>format=1</code>).</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>jam_mulai</code></td><td>Jam mulai KBM (format 24 jam, misal 07:00)</td></tr>
                <tr><td><code>jam_selesai</code></td><td>Jam selesai KBM</td></tr>
                <tr><td><code>hari_libur</code></td><td>Daftar hari libur (pisahkan dengan koma)</td></tr>
                <tr><td><code>hari_upacara</code> / <code>jam_upacara</code> / <code>durasi_upacara</code></td><td>Konfigurasi upacara bendera (hari ke-, jam ke-, durasi)</td></tr>
                <tr><td><code>format</code></td><td><code>1</code> = format otomatis (generate jadwal mapel), kosong = hanya simpan KBM</td></tr>
                <tr><td><code>jam_mapel</code></td><td>Durasi tiap jam pelajaran (menit)</td></tr>
                <tr><td><code>jml_mapel</code></td><td>Jumlah jam pelajaran per hari</td></tr>
                <tr><td><code>ist0</code>…<code>ist4</code></td><td>Jam ke istirahat (maks 5)</td></tr>
                <tr><td><code>dur_ist0</code>…<code>dur_ist4</code></td><td>Durasi istirahat (menit)</td></tr>
                <tr><td><code>id_tp</code> / <code>id_smt</code></td><td>ID tahun pelajaran & semester aktif</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": true,
  "jadwal_kelas": [ { "id_kelas": "...", "kbm_jam_mulai": "07:00", ... } ],
  "data_insert": [ ... ],
  "data_update": [ ... ]
}</pre>

        <h3 style="margin-top:20px;">POST <code>elearning/reformat_jadwal</code> — Reformat Rentang KBM</h3>
        <p>Endpoint ini menghitung ulang <code>kbm_jam_mulai</code> / <code>kbm_jam_selesai</code> berdasarkan jam pelajaran terkecil & terbesar pada <code>kelas_jadwal_mapel</code>.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_tp</code> / <code>id_smt</code></td><td>Filter tahun & semester</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": true,
  "min_time": "07:00",
  "max_time": "13:30",
  "kbm": [ ... ],
  "mapel": [ ... ]
}</pre>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <ul style="margin-bottom:0;">
                    <li>Jam pelajaran yang sudah digunakan dalam jadwal tidak dapat dihapus.</li>
                    <li>Perubahan setting akan mempengaruhi semua jadwal pelajaran yang sudah ada.</li>
                    <li>Semua request menggunakan token CSRF dan session login Administrator.</li>
                </ul>
            </div>
        </div>
    </div>`
};
