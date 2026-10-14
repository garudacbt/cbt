if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['changelog'] = {
    title: 'Changelog',
    desc: 'Riwayat perubahan dan pembaruan aplikasi.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-history"></i> Changelog</h2>
        <p>Riwayat perubahan dan pembaruan pada aplikasi GarudaCBT.</p>

        <h3>Version 1.6.0 RC_12 <span class="badge badge-success">RELEASE</span> <small class="text-muted">06 Juli 2026</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-danger">Security</span> Perbaikan Keamanan (Hasil Audit & Pentest)</h4>
            <ul>
                <li><strong>Installer dikunci setelah instalasi</strong> — semua method Install (createAdmin, createSetting, createApp, checkDatabase, createDb) diblokir dengan HTTP 403 bila aplikasi sudah ter-install. Mencegah pembuatan akun admin tanpa autentikasi pada instance yang sudah berjalan.</li>
                <li><strong>Penulisan config database aman dari injeksi kode PHP</strong> — nilai hostname/username/password/database kini ditulis menggunakan <code>var_export()</code> (bukan interpolasi string mentah), divalidasi dengan whitelist karakter, dan permission file dikembalikan ke 0644 (sebelumnya di-chmod 0777).</li>
                <li><strong>Endpoint update skema database dibatasi administrator</strong> — controller Update memerlukan login + role admin. Sebelumnya bisa diakses tanpa autentikasi sama sekali.</li>
                <li><strong>SQL Injection (blind time-based) diperbaiki</strong> — <code>Post_model::getPostForUser()</code> (endpoint /siswa/getPost?kelas=) dan <code>Dashboard_model::getTahunById()/getSemesterById()</code> (endpoint /bukurapor?tp=) kini memakai Query Builder binding, tidak lagi melakukan concatenasi string ke klausa WHERE.</li>
                <li><strong>CSRF protection diperkuat</strong> — <code>csrf_exclude_uris</code> dikosongkan; endpoint materi/tugas (sebelumnya dikecualikan) kini wajib menyertakan CSRF token.</li>
                <li><strong>Pencegahan webshell via upload file</strong> — ekstensi file gambar hanya diizinkan jpg/png/gif/webp (mime yang dikirim penyerang tidak lagi menentukan ekstensi file) pada modul materi, bank soal, dan import foto siswa/guru. Ditambah file <code>.htaccess</code> di direktori uploads/ untuk mematikan eksekusi script sebagai defense in depth.</li>
                <li><strong>Stored XSS pada pengumuman diperbaiki</strong> — output teks pengumuman di-escape dengan <code>html_escape()</code> sebelum dirender ke HTML.</li>
                <li><strong>Encryption key tidak lagi hardcoded</strong> — key di-generate unik per-instalasi (dari environment variable <code>GARUDA_ENCRYPTION_KEY</code> atau file <code>application/config/encryption_key.php</code> yang dibuat otomatis), menggantikan key statis yang identik untuk semua instalasi karena ada di repo publik.</li>
                <li><strong>Default ENVIRONMENT=production</strong> — pesan error SQL lengkap (db_debug) tidak lagi ditampilkan ke user. Untuk development lokal dapat di-override dengan <code>CI_ENV=development</code>.</li>
                <li><strong>Autentikasi & otorisasi terpusat</strong> — semua controller melalui MY_Controller: redirect ke halaman login bila belum login, pengecekan ulang status aktif user pada setiap request, serta guard role admin/guru pada modul sensitif (rapor, CBT, e-learning, pengumuman, database, dll).</li>
                <li><strong>Hardening lain</strong> — controller Compare (dev tool) dibatasi admin-only; penghapusan backup memvalidasi nama file (anti path traversal); batas ukuran upload ditentukan oleh server (bukan dari input client); cookie aplikasi di-set HttpOnly.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Panduan Pengguna (user guide) berbasis GitBook: halaman tutorial CBT, e-Learning, Rapor, dan endpoint; tema dark untuk halaman dokumentasi; menu Panduan Pengguna dipindah ke bawah.</li>
                <li>Halaman changelog di dalam aplikasi (detail changelog).</li>
                <li>Fitur backup & restore database (termasuk perbaikan restore backup).</li>
                <li>Data Manager: query SHOW DATABASE dengan base_url helper.</li>
                <li>Dukungan jenjang PKBM.</li>
                <li>Progress bar pada halaman rekap.</li>
                <li>Helper functions terpusat (pemindahan kode ke helper, nested controllers).</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Refactor MY_Controller.php dan Auth.php.</li>
                <li>Merge JSON menu ke sidebar.php; penghapusan localStorage menu.</li>
                <li>Rename class migration, null safety, dan refactor init.</li>
                <li>Guru edit soal: deteksi ketika siswa sudah load soal, update rekap jika sudah direkap.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix data manager, fix rekap, fix edit nilai, fix proses nilai.</li>
                <li>Fix berita acara & status durasi siswa, fix paksa selesai di siswa, fix durasi.</li>
                <li>Fix rapor eskul, rapor nilai ekstra, rapor mapel tanpa nilai, nilai input manual.</li>
                <li>Fix alokasi tanpa save, ujian tanpa alokasi, jadwal, NIS/NIP bertitik.</li>
                <li>Fix import/update siswa/guru, convert base64, dokumen guru https.</li>
                <li>Fix zoom jodohkan, status siswa 0 detik, single quote mapel/ekstra.</li>
                <li>Fix copy materi, copy jabatan/pengampu, login, handle jadwal.</li>
                <li>Fitur blokir siswa oleh pengawas (wip blokir siswa), fix notif applyAction.</li>
                <li>Fix semua jenjang, fix merged, fix nilai di siswa, fix redirect installer.</li>
                <li>Fix base_url, data tahun/semester, full screen guide.</li>
            </ul>
        </div>

        <h3>Version 1.6.0 RC 11 <span class="badge badge-success">RELEASE</span> <small class="text-muted">08 Mei 2026</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Arsip rapor PTS dan cetak PTS.</li>
                <li>Deskripsi predikat dan KKM akun guru (upload/input nilai rapor).</li>
                <li>Setting tampil NIP; foto NISN di akun siswa dan di setting.</li>
                <li>Sortir siswa, urutan siswa, dan sort nilai e-learning.</li>
                <li>Penggabungan view arsip.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Perubahan mekanisme upload soal dan upload siswa; upload guru.</li>
                <li>Merge dari main.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix login siswa/guru; fix update siswa dobel tabel users/users_groups.</li>
                <li>Fix nama siswa, hapus alumni, delete siswa buku induk.</li>
                <li>Fix rapor, print rapor, leger, DKN, hasil e-learning/materi/tugas.</li>
                <li>Fix tombol nilai e-learning, alokasi berita acara.</li>
                <li>Fix tabel soal kosong, cetak tanpa nomor peserta, opsi kelas siswa.</li>
                <li>Fix search siswa/guru, error import, jam log dashboard, informasi bank soal.</li>
                <li>Fix NaN, decimal, hide kolom minus, error ekstra, print tabel kecil.</li>
            </ul>
        </div>

        <h3>Version 1.6.0 RC-10 <span class="badge badge-success">RELEASE</span> <small class="text-muted">04 April 2026</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Pemisahan materi agama (mapel agama: jadwal materi agama, edit materi agama, filter siswa agama).</li>
                <li>Ekstrakurikuler: jadwal materi ekskul, detail ekstrakurikuler, halaman siswa ekstrakurikuler, merge tabel eskul, deteksi bentrok mapel & ekstra.</li>
                <li>Kelas/mapel gabungan: materi gabungan, jadwal materi gabungan, nilai materi gabungan, filter siswa gabungan, arsip kelas gabungan.</li>
                <li>Absensi materi/tugas di akun siswa; kehadiran bulanan (refactor siswa_harian.php).</li>
                <li>Rotasi layar/landscape pada ujian siswa.</li>
                <li>Deteksi illegal agent.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Refactor hadir bulanan, rekap nilai materi, nilai harian dipisahkan untuk agama.</li>
                <li>Handle jawaban sebagai array ketika unserializing.</li>
                <li>Log materi agama.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix cetak (termasuk cetak tanpa alokasi/pengawas), fix cetak CBT, fix print tabel kecil.</li>
                <li>Fix rekap paging, rekap siswa tanpa rekap jadwal, rekap ketika tidak ada siswa.</li>
                <li>Fix dashboard guru/siswa, hapus jadwal, delete all jadwal.</li>
                <li>Fix pelanggaran full screen, error input nilai, libur selain minggu.</li>
                <li>Fix warna PDF, waktu mulai ketika diulang, ulangi siswa.</li>
                <li>Fix e-learning akun guru, bulanan, absen bulanan tugas.</li>
                <li>Fix materi sebelumnya, materi gabungan, jadwal materi agama siswa.</li>
                <li>Fix arsip materi/tugas, arsip siswa, opsi walikelas.</li>
                <li>Fix nilai materi harian, nilai eskul, guru eskul tanpa mapel.</li>
                <li>Fix error parsing, error materi, back/forward, change NISN.</li>
                <li>Fix hapus kelas kosong, save detail siswa, detail ekstra.</li>
                <li>Fix login, update siswa, constants.php, hapus materi/tugas.</li>
            </ul>
        </div>

        <h3>Version 1.6.0 RC_8 <span class="badge badge-success">RELEASE</span> <small class="text-muted">07 Desember 2025</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Pengecekan exist table sebelum migrasi (add table if exist).</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Perbaikan urutan alokasi waktu.</li>
                <li>Penghapusan validasi jadwal (wip remove validasi_jadwal).</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix KATROL.</li>
                <li>Fix import soal, duplikat nomor peserta.</li>
                <li>Fix absensi & berita acara, sesi siswa, nomor urut.</li>
                <li>Fix aktifkan siswa, warning import siswa.</li>
                <li>Delete all jadwal (wip).</li>
            </ul>
        </div>

        <h3>Version 1.6.0 RC_7 <span class="badge badge-success">RELEASE</span> <small class="text-muted">19 November 2025</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Logo aplikasi pada halaman login dan halaman ujian siswa.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Filter kelas guru; penghapusan disable Monday.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix alumni dan upacara, fix nilai siswa, fix kelas bank soal, fix CBT siswa.</li>
                <li>Hide alumni di daftar siswa.</li>
            </ul>
        </div>

        <h3>Version 1.6.0 RC_6 <span class="badge badge-success">RELEASE</span> <small class="text-muted">25 Oktober 2025</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Perpustakaan (ePerpus): admin perpustakaan, skema perpustakaan, preview URL, pencarian perpustakaan di akun siswa.</li>
                <li>Log aktivitas: menu log, filter log, hapus log (terpilih).</li>
                <li>Log pelanggaran siswa & pengurangan nilai pelanggaran (minus) pada rekap.</li>
                <li>Token pengawas & generate token di akun pengawas.</li>
                <li>Auto pengawas (admin/guru), atur pengawas, pemisahan guru pengampu.</li>
                <li>Penggabungan alokasi & pengawas, migrasi alokasi.</li>
                <li>Jam ke, jadwal istirahat, upacara/libur.</li>
                <li>Media player baru untuk materi: audio/video, play count, video fullscreen.</li>
                <li>Copy kelas, copy jadwal KBM, copy materi/tugas otomatis antar kelas.</li>
                <li>Kenaikan semua kelas, bulk create kelas, auto create kelas.</li>
                <li>Nomor peserta (NIS/NISN), reset nomor peserta.</li>
                <li>Nomor ijazah, jabatan guru, copy jabatan.</li>
                <li>Backup folder, hapus log terpilih.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Dashboard status untuk siswa, pengawas, dan guru.</li>
                <li>Migrasi optional, perbaikan migrasi database lama, fresh install.</li>
                <li>Optimasi search/aktivasi siswa; PHP 8.3 null fixes.</li>
                <li>Remove pace-progress; rewrite load view.</li>
                <li>Cetak: kartu, berita acara, kehadiran, absen, CBT, bulk print.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix CBT siswa, ujian siswa, nilai siswa, koreksi dari rekap.</li>
                <li>Fix load nilai per jadwal, load awal ujian siswa, auto simpan ulang pengawas.</li>
                <li>Fix analisis, db fresh, menu admin/pengawas, empty unserialize.</li>
                <li>Fix migration limit memory, auto close, cek jadwal sebelumnya.</li>
                <li>Fix logo aplikasi sekolah ketika ujian.</li>
                <li>Fix materi, download, e-learning, migrate db lama, sort.</li>
                <li>Fix duplikat username (cek username saat aktivasi guru/siswa), nama guru.</li>
                <li>Fix jadwal hari ini di siswa, video fullscreen, pembulatan.</li>
                <li>Fix hapus pengawas ketika hapus jadwal CBT, siswa akun suspend.</li>
                <li>Fix total siswa dashboard, token, filter search log, ulangi materi.</li>
                <li>Fix query aktivasi guru, import data siswa, resize img/foto Word.</li>
                <li>Fix update Set Mapel/guru, materi terdahulu & arsip, istirahat kosong.</li>
                <li>Fix delete all materi, acak soal, keterangan, materi 1 mapel beda kelas.</li>
                <li>Fix search status siswa, img menjodohkan, save soal manual, new db.</li>
                <li>Fix display kelas, kelas jadwal, ekspor minus, TP Before.</li>
                <li>Fix hapus jadwal e-learning rule, rekap filter guru, arabic & sort nomor soal.</li>
                <li>Fix error calendar, batasi tgl bulan ini, edit admin, absen di siswa.</li>
                <li>Fix nilai ujian di siswa, jadwal mapel/materi di siswa, dashboard CBT.</li>
                <li>Fix ekspor analisis, layout nomor peserta, remove serialize.</li>
                <li>Fix filter tgl di CBT pengawas, alokasi, tidak harus set ruang/sesi.</li>
                <li>Fix alert tahun semester, arsip siswa, login siswa ke materi/tugas.</li>
                <li>Fix bulk tambah kelas, tp_before, sort nama kelas, copy jabatan error.</li>
                <li>Fix hapus jadwal, materi detail.</li>
            </ul>
        </div>

        <h3>Version 1.6.0 RC-2 <span class="badge badge-success">RELEASE</span> <small class="text-muted">15 Juni 2025</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Arsip materi/tugas (fitur arsip).</li>
                <li>Reformat jadwal; export all dengan filter mapel guru.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Redirect init; rekap dengan paging.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix arsip, notif, reset, status siswa di pengawas.</li>
                <li>Fix soal hanya gambar tanpa teks.</li>
                <li>Ulangi siswa update rekap; fix duplikat rekap.</li>
                <li>Fix nilai ekspor kosong.</li>
            </ul>
        </div>

        <h3>Version 1.6.0 RC-1 <span class="badge badge-success">RELEASE</span> <small class="text-muted">08 Juni 2025</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Arsip materi/tugas (wip awal).</li>
                <li>Rekap filter guru.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Remove pace loading.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Delete jadwal.</li>
            </ul>
        </div>

        <h3>Version 1.6.0 <span class="badge badge-success">RELEASE</span> <small class="text-muted">02 Juni 2025</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Database baru (new db, new master db) + properti siswa tambahan.</li>
                <li>Konverter base64 otomatis dari editor saat simpan soal.</li>
                <li>Restyle tabel menjodohkan.</li>
                <li>Bank soal terjadwal.</li>
                <li>Form agama siswa; installer PHP 7/8; cek database sudah ada.</li>
                <li>Paginate.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Switch session driver.</li>
                <li>Renew migration; dobel cek migrasi dan installer.</li>
                <li>Import siswa kelas; agama tidak case sensitive.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix detail soal, rekap guru, rekap memory limit, division by zero.</li>
                <li>Fix status siswa di pengawas; hide siswa bukan agama.</li>
                <li>Fix delete rapor, alumni, pindah/keluar, filter siswa, disable bank soal.</li>
                <li>Fix delete siswa (dengan pengecekan), edit jadwal.</li>
                <li>Fix aktivasi ulang siswa/guru, validasi jadwal sudah ada.</li>
                <li>Fix cetak kehadiran & berita acara, rekap setelah migrasi, import guru/siswa.</li>
            </ul>
        </div>

        <h3>Version 1.6.0 (new db version) <span class="badge badge-success">RELEASE</span> <small class="text-muted">13 Mei 2025</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Skema database baru (new db version) & master DB baru.</li>
                <li>Inisialisasi baru (new init) + migrasi baru.</li>
                <li>Pembagian waktu CBT & jadwal istirahat.</li>
                <li>Berita acara; sweetAlert v11.</li>
                <li>Slide zoom touch; add form agama siswa.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Metode rekap baru; perbaikan memory limit rekap.</li>
                <li>Filter nilai siswa (akun guru mapel), filter mapel agama, filter soal agama.</li>
                <li>Sort absensi; bulk delete/rekap; tandai semua sudah dikoreksi.</li>
                <li>Validasi user/pass guru > 4 karakter & validasi import siswa.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix save profile tanpa jabatan, cetak kehadiran & berita acara, print absen.</li>
                <li>Fix import soal tabel, nilai desimal, rekap (rollback/migrasi).</li>
                <li>Fix minus menit koreksi rekap; rekap ketika jadwal dihapus.</li>
                <li>Fix semua aksi rekap & export ketika jadwal dihapus.</li>
                <li>Fix load soal, alokasi, jodohkan, reset waktu di pengawas, reset login.</li>
                <li>Fix dashboard pengawas, aksi di status siswa (pengawas), session.</li>
                <li>Fix delete jadwal, status warna jadwal rekap, rekap delete jadwal.</li>
                <li>Fix aktivasi ulang siswa/guru, delete siswa, edit jadwal.</li>
                <li>Fix alumni, pindah/keluar, filter siswa, disable bank soal.</li>
                <li>Fix rekap guru, import siswa, paginate.</li>
            </ul>
        </div>

        <h3>Version 1.6.0 BETA-5 <span class="badge badge-success">RELEASE</span> <small class="text-muted">15 April 2025</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Force fullscreen untuk ujian.</li>
                <li>Badge agama; download/update foto siswa.</li>
                <li>Import cek soal.</li>
                <li>DB Manager (wip).</li>
                <li>Tombol aktifkan jadwal; notif import guru.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Validasi akses: token/jadwal_aktif/agama/selesai/tgl/kelas saat direct URL.</li>
                <li>Validasi IP; hide jadwal beda tp/smt.</li>
                <li>Skip soal tanpa jawaban; hide soal tidak digunakan.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix CBT siswa, download detail soal, gambar koreksi.</li>
                <li>Fix rekap, input nilai guru, minor bugs.</li>
                <li>Fix import soal jodohkan spasi jawaban.</li>
                <li>Fix koreksi/rekap nilai tanpa jawaban siswa.</li>
                <li>Fix edit password guru/siswa, dashboard & nilai siswa, status/nilai susulan, alokasi.</li>
            </ul>
        </div>

        <h3>Version 1.6.0 BETA-2 <span class="badge badge-success">RELEASE</span> <small class="text-muted">18 Maret 2025</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Sidebar baru.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Merge dari main.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix rekap admin/guru, rekap pengawas dan guru mapel.</li>
                <li>Fix status/nilai siswa di akun pengawas.</li>
            </ul>
        </div>

        <h3>Version 1.6.0 BETA <span class="badge badge-success">RELEASE</span> <small class="text-muted">12 Februari 2025</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>E-learning baru: jadwal mapel e-learning, materi baru, absen bulanan & harian baru, nilai harian baru.</li>
                <li>Rekap per semester; sinkron nilai e-learning.</li>
                <li>Migrasi tabel kelas_jadwal_materi.</li>
                <li>Upload foto siswa/guru; import guru/foto.</li>
                <li>Editor matematika (KaTeX v0.16.10); summernote untuk jawaban esai siswa.</li>
                <li>Export excel; zoom soal siswa.</li>
                <li>Filter agama siswa; status ujian by agama.</li>
                <li>Aktivasi sesi siswa; filter soal agama.</li>
                <li>Installer.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Update jQuery 3.4.1 ke 3.7.1.</li>
                <li>Select2 auto width & search.</li>
                <li>Remove serialize/unserialize; remove olah nilai dari siswa.</li>
                <li>Remove bloat code; gitignore; new migrate.</li>
                <li>Merge dari main (fix CBT siswa, jadwal siswa).</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix rapor mapel ekstrakurikuler, nilai siswa, dashboard siswa.</li>
                <li>Fix infinity, disable edit bank, fixing jquery/migration.</li>
                <li>Fix save/edit jadwal mapel, konversi, hapus jadwal mapel.</li>
                <li>Fix filter agama siswa, bulanan & rekap e-learning, kehadiran harian.</li>
                <li>Fix aktifasi siswa by sesi, null db, blank.</li>
                <li>Fix nilai jodohkan arab/gambar, koreksi, math edit jodohkan.</li>
                <li>Fix soal jodohkan dan PK, error analisis, undefined variable.</li>
                <li>Fix str_replace, strtolower/strtoupper, update foto siswa.</li>
                <li>Fix import mapel, installer, tp/smt, import/update data siswa.</li>
                <li>Fix error nilai, models undefined, delete tambah/import alumni (sementara).</li>
                <li>Fix some bugs, zoom, header table excel, materi.</li>
            </ul>
        </div>

        <h3>Version 1.5.3 (2024_05_07) <span class="badge badge-success">RELEASE</span> <small class="text-muted">07 Mei 2024</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Pemilihan peminatan (wip send peminatan).</li>
                <li>Auto logout setelah ganti password admin.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Remove vendor; trigger select2.</li>
            </ul>
        </div>

        <h3>Version 1.5.4 <span class="badge badge-success">RELEASE</span> <small class="text-muted">05 Mei 2024</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-info">Improvement</span> Peningkatan</h4>
            <ul>
                <li>Pembersihan dependensi: remove vendor, remove phpOffice.</li>
                <li>Kompatibilitas PHP 8 / 8.3.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix soal jodohkan dianggap belum jawab, filter alokasi waktu, error trim().</li>
                <li>Fix INSTALL/UPDATE.</li>
                <li>Fix import soal isian, edit materi, nilai harian e-learning.</li>
                <li>Fix header cetak, status siswa pilihan materi/tugas.</li>
                <li>Fix hapus nilai siswa ketika diulang, import soal.</li>
            </ul>
        </div>

        <h3>Version 1.5.3 <span class="badge badge-success">RELEASE</span> <small class="text-muted">04 Maret 2024</small></h3>

        <div class="version-item">
            <h4><span class="badge badge-success">New</span> Fitur Baru</h4>
            <ul>
                <li>Fitur CBT lengkap: bank soal, jadwal ujian, pelaksanaan, koreksi, rekap, analisis soal.</li>
                <li>Jenis soal: PG, esai, menjodohkan, isian, kompleks, PG kompleks.</li>
                <li>Rapor: PTS/PAS, SD/MI, mapel peminatan/jurusan, KKM.</li>
                <li>E-learning: materi/tugas, jadwal mapel, absensi harian/bulanan, nilai.</li>
                <li>Data master: siswa, guru, kelas, mapel, alumni, kenaikan kelas.</li>
                <li>Pengawas ujian: deteksi tab/new tab, reset waktu, berita acara, daftar peserta, nomor peserta.</li>
                <li>Import/export: import siswa/guru/soal (Word/Excel), export nilai/absensi/rekap.</li>
                <li>Cetak: kartu ujian, berita acara, absen.</li>
                <li>Rekonstruksi menu sidebar; login mode CBT only; redirect siswa ke CBT.</li>
            </ul>
        </div>

        <div class="version-item">
            <h4><span class="badge badge-warning">Fix</span> Perbaikan Bug</h4>
            <ul>
                <li>Fix back to CBT; siswa redirect to CBT.</li>
                <li>Fix error koreksi/rekap; pengawas undefined.</li>
                <li>Fix import arabic; detail soal; save/delete soal.</li>
                <li>Fix deteksi jawaban siswa; timer ujian; reset ujian.</li>
                <li>Fix rapor (mi, sd, pts); nilai materi/tugas; absensi.</li>
                <li>Fix export absen/nilai; pengumuman kepada kelas; token; jadwal materi.</li>
            </ul>
        </div>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>Untuk informasi lebih detail tentang setiap versi, silakan hubungi tim support GarudaCBT.</div>
        </div>
    </div>`
};
