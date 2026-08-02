if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['tentang-aplikasi'] = {
    title: 'Tentang Garuda CBT',
    desc: 'Gabungan Aplikasi Rapor, Ujian dan e-Learning (Garuda CBT)',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-info-circle"></i> Apa itu Garuda CBT</h2>
        <p>
            <strong>Garuda CBT</strong> adalah Gabungan Aplikasi Rapor, Ujian dan e-Learning.
            Aplikasi berbasis web yang dirancang khusus untuk kebutuhan pendidikan di Indonesia, 
            mengintegrasikan berbagai modul penting dalam satu platform yang mudah digunakan — 
            mulai dari pelaksanaan ujian/ulangan, e-learning, hingga manajemen rapor sekolah/madrasah.
        </p>
        <a href="https://github.com/garudacbt/cbt" target="_blank" class="btn btn-primary">
            <i class="fab fa-github"></i> GITHUB / DOWNLOAD
        </a>
        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Dikembangkan dengan <strong>CodeIgniter 3</strong>, kompatibel dengan PHP 7.4 hingga PHP 8.x.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-th-large"></i> Modul Utama</h2>
        <table class="table-custom">
            <thead><tr><th>Modul</th><th>Deskripsi</th></tr></thead>
            <tbody>
                <tr><td><i class="fas fa-laptop"></i> <strong>CBT (Ujian Online)</strong></td><td>Sistem ujian berbasis komputer dengan bank soal, jadwal, sesi, ruang, nomor peserta, token, pengawas, monitoring real-time, rekap dan analisis hasil</td></tr>
                <tr><td><i class="fas fa-book-open"></i> <strong>E-Learning</strong></td><td>Manajemen pembelajaran online: jadwal pelajaran, distribusi materi, tugas, dan absensi siswa per mata pelajaran</td></tr>
                <tr><td><i class="fas fa-award"></i> <strong>Rapor</strong></td><td>Pengolahan nilai rapor lengkap dengan KKM, predikat, catatan, dan cetak rapor otomatis</td></tr>
                <tr><td><i class="fas fa-book"></i> <strong>Buku Induk</strong></td><td>Pencatatan data induk siswa secara lengkap dan terstruktur</td></tr>
                <tr><td><i class="fas fa-users"></i> <strong>Data Umum</strong></td><td>Kelola data siswa, guru, kelas, mata pelajaran, jurusan, ekstrakurikuler, dan tahun ajaran</td></tr>
                <tr><td><i class="fas fa-user-graduate"></i> <strong>Alumni & Kelulusan</strong></td><td>Manajemen data kelulusan dan alumni siswa</td></tr>
                <tr><td><i class="fas fa-chalkboard-teacher"></i> <strong>Wali Kelas</strong></td><td>Fitur khusus wali kelas: daftar siswa, catatan wali kelas, dan struktur organisasi kelas</td></tr>
                <tr><td><i class="fas fa-sticky-note"></i> <strong>Catatan Guru</strong></td><td>Pencatatan selama pembelajaran per kelas dan mata pelajaran</td></tr>
                <tr><td><i class="fas fa-bullhorn"></i> <strong>Pengumuman</strong></td><td>Kelola dan distribusikan pengumuman kepada siswa dan guru</td></tr>
                <tr><td><i class="fas fa-cog"></i> <strong>Pengaturan</strong></td><td>Profil sekolah, manajemen user (admin/guru/siswa), backup & restore database</td></tr>
            </tbody>
        </table>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-laptop"></i> Computer Based Test (CBT)</h2>
        <p>Modul ujian online yang lengkap untuk mendukung pelaksanaan ujian/ulangan di sekolah/madrasah.</p>
        <ul>
            <li><strong>Bank Soal</strong> — kelola soal per mata pelajaran dengan berbagai jenis soal</li>
            <li><strong>Jadwal Ujian</strong> — penjadwalan ujian yang fleksibel per kelas dan mata pelajaran</li>
            <li><strong>Sesi &amp; Ruang Ujian</strong> — pengaturan sesi dan alokasi ruang ujian</li>
            <li><strong>Nomor Peserta</strong> — generate nomor peserta ujian secara otomatis</li>
            <li><strong>Token Ujian</strong> — sistem token untuk keamanan akses ujian</li>
            <li><strong>Pengawas</strong> — penugasan pengawas per ruang ujian</li>
            <li><strong>Monitoring Real-time</strong> — pantau status ujian siswa secara langsung</li>
            <li><strong>Rekap Nilai</strong> — rekapitulasi hasil penilaian seluruh peserta</li>
            <li><strong>Analisis Soal</strong> — analisis statistik soal untuk evaluasi kualitas ujian</li>
            <li><strong>Cetak Hasil</strong> — cetak kartu peserta, berita acara, dan hasil ujian</li>
            <li><strong>Offline Mode</strong> — dapat berjalan tanpa koneksi internet setelah loading awal</li>
        </ul>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-book-open"></i> E-Learning</h2>
        <p>Manajemen pembelajaran online yang terintegrasi untuk guru dan siswa.</p>
        <ul>
            <li>Pengelolaan jadwal pelajaran per kelas</li>
            <li>Distribusi materi pembelajaran</li>
            <li>Pengelolaan dan pengumpulan tugas</li>
            <li>Sistem absensi siswa per mata pelajaran</li>
            <li>Akses materi dan tugas oleh siswa melalui portal KBM</li>
        </ul>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-award"></i> Rapor & Buku Induk</h2>
        <p>Pengolahan nilai dan data siswa yang terstruktur untuk memudahkan penyusunan rapor.</p>
        <ul>
            <li>Pengolahan nilai rapor dengan KKM dan predikat otomatis</li>
            <li>Input nilai via import file Excel atau input manual langsung</li>
            <li>Catatan deskripsi per mata pelajaran</li>
            <li>Cetak rapor otomatis (format Word/PDF)</li>
            <li>Buku induk siswa yang lengkap dan terstruktur</li>
        </ul>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-database"></i> Data Umum & Master</h2>
        <p>Kelola seluruh data master sekolah dari satu tempat.</p>
        <ul>
            <li><strong>Data Siswa</strong> — biodata, foto, status, dan riwayat kelas</li>
            <li><strong>Data Guru</strong> — biodata, mata pelajaran ampu, dan wali kelas</li>
            <li><strong>Data Kelas</strong> — manajemen kelas per tahun ajaran dan semester</li>
            <li><strong>Data Mata Pelajaran</strong> — kelola mapel reguler dan gabungan</li>
            <li><strong>Data Jurusan</strong> — manajemen jurusan/program keahlian</li>
            <li><strong>Ekstrakurikuler</strong> — kelola jenis dan peserta ekstrakurikuler</li>
            <li><strong>Tahun Ajaran</strong> — pengaturan tahun ajaran dan semester aktif</li>
            <li><strong>Alumni &amp; Kelulusan</strong> — data kelulusan dan penelusuran alumni</li>
        </ul>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-chalkboard-teacher"></i> Fitur Wali Kelas & Guru</h2>
        <ul>
            <li><strong>Portal Wali Kelas</strong> — daftar siswa, catatan wali kelas, dan struktur organisasi kelas</li>
            <li><strong>Catatan Guru</strong> — pencatatan kejadian/catatan selama pembelajaran per kelas dan mapel</li>
            <li><strong>Pengumuman</strong> — buat dan kelola pengumuman untuk siswa dan guru</li>
        </ul>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-users-cog"></i> Manajemen Akun & Pengaturan</h2>
        <ul>
            <li><strong>Multi-Role Access</strong> — hak akses terpisah untuk admin, guru, dan siswa</li>
            <li><strong>Manajemen Admin</strong> — tambah, edit, dan kelola akun administrator</li>
            <li><strong>Manajemen Akun Guru</strong> — buat dan kelola akun login guru</li>
            <li><strong>Manajemen Akun Siswa</strong> — buat dan kelola akun login siswa</li>
            <li><strong>Profil Sekolah</strong> — atur identitas, logo, dan kepala sekolah</li>
            <li><strong>Backup &amp; Restore</strong> — backup database otomatis dan restore saat diperlukan</li>
            <li><strong>Log Aktivitas</strong> — pencatatan aktivitas pengguna di sistem</li>
        </ul>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-star"></i> Keunggulan Teknis</h2>
        <table class="table-custom">
            <thead><tr><th>Fitur</th><th>Deskripsi</th></tr></thead>
            <tbody>
                <tr><td>Responsive Design</td><td>Tampilan optimal di desktop, tablet, dan smartphone</td></tr>
                <tr><td>Import/Export</td><td>Import data siswa/guru/soal dari Excel & Word, export ke Excel, Word, PDF, atau cetak langsung</td></tr>
                <tr><td>Offline Mode</td><td>Modul CBT dapat berjalan tanpa koneksi internet setelah loading awal</td></tr>
                <tr><td>Analisis Soal</td><td>Analisis statistik butir soal untuk evaluasi kualitas ujian</td></tr>
                <tr><td>Backup & Restore</td><td>Backup dan restore database dengan mudah</td></tr>
                <tr><td>Log Aktivitas</td><td>Rekam jejak aktivitas seluruh pengguna</td></tr>
            </tbody>
        </table>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-images"></i> Screenshot</h2>
        <p>Berikut adalah beberapa tangkapan layar dari aplikasi Garuda CBT.</p>
        <div class="screenshot-placeholder" style="padding: 10px; background-color: #f9f9f9;">
            <img src="screenshot/cbt/12_jadwal.png" style="width:100%; border: 1px solid #ddd; border-radius: 4px; padding: 5px; background-color: white;">
            <p class="text-center" style="margin-top: 8px; font-size: 14px; color: #555;">Tampilan Jadwal Ujian</p>
        </div>
        <div class="screenshot-placeholder" style="margin-top: 16px; padding: 10px; background-color: #f9f9f9;">
            <img src="screenshot/umum/1_beranda.png" style="width:100%; border: 1px solid #ddd; border-radius: 4px; padding: 5px; background-color: white;">
            <p class="text-center" style="margin-top: 8px; font-size: 14px; color: #555;">Tampilan Beranda</p>
        </div>
    </div>
    `
};
