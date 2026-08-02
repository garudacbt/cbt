if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['tentang-panduan'] = {
    title: 'Tentang Panduan',
    desc: 'Kenali tujuan dan cara menggunakan dokumen panduan ini.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-info-circle"></i> Apa Itu Panduan Ini?</h2>
        <p>
            Dokumen ini adalah panduan resmi untuk menggunakan <strong>GarudaCBT v1.6.0</strong>, 
            sistem manajemen sekolah terintegrasi yang mencakup Computer Based Test (CBT), 
            E-Learning, Manajemen Rapor, dan Data Umum.
        </p>
        <p>
            Panduan disusun bertahap dari instalasi hingga penggunaan sehari-hari, 
            sehingga dapat diikuti baik oleh pengguna baru maupun pengguna berpengalaman.
        </p>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Baca bagian <strong>Memulai</strong> terlebih dahulu jika Anda baru mengenal sistem ini. Jika sudah familiar, langsung navigasikan ke bagian yang dibutuhkan melalui menu sidebar.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-users"></i> Untuk Siapa Panduan Ini?</h2>
        <table class="table-custom">
            <thead><tr><th>Peran</th><th>Cakupan Panduan</th></tr></thead>
            <tbody>
                <tr>
                    <td><i class="fas fa-user-shield" style="margin-right:6px;color:var(--accent)"></i><strong>Administrator</strong></td>
                    <td>Instalasi, konfigurasi sistem, manajemen Data Umum (siswa, guru, kelas, mapel), manajemen pengguna, pengaturan rapor, backup database</td>
                </tr>
                <tr>
                    <td><i class="fas fa-chalkboard-teacher" style="margin-right:6px;color:var(--accent)"></i><strong>Guru</strong></td>
                    <td>Membuat bank soal, jadwal ujian CBT, mengelola materi dan tugas e-learning, absensi, input nilai, catatan kelas</td>
                </tr>
                <tr>
                    <td><i class="fas fa-user-graduate" style="margin-right:6px;color:var(--accent)"></i><strong>Siswa</strong></td>
                    <td>Mengikuti ujian CBT, mengakses materi dan tugas, mengumpulkan tugas, melihat nilai dan jadwal pelajaran</td>
                </tr>
                <tr>
                    <td><i class="fas fa-user-tie" style="margin-right:6px;color:var(--accent)"></i><strong>Wali Kelas</strong></td>
                    <td>Mengelola data siswa kelas, input nilai rapor, membuat catatan wali kelas, mencetak rapor</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-map"></i> Struktur Panduan</h2>
        <p>Panduan ini dibagi menjadi beberapa bagian utama yang dapat diakses melalui sidebar:</p>

        <table class="table-custom">
            <thead><tr><th>Bagian</th><th>Isi</th></tr></thead>
            <tbody>
                <tr>
                    <td><i class="fas fa-book-open" style="margin-right:6px"></i><strong>Mulai</strong></td>
                    <td>
                        Pendahuluan (tentang aplikasi, persyaratan sistem, panduan ini),
                        langkah memulai (instalasi, konfigurasi awal, login pertama),
                        dan alur kerja umum (awal tahun ajaran, ujian CBT, e-learning, rapor)
                    </td>
                </tr>
                <tr>
                    <td><i class="fas fa-tachometer-alt" style="margin-right:6px"></i><strong>Dashboard</strong></td>
                    <td>Tampilan dan fitur dashboard untuk Admin, Guru, dan Siswa</td>
                </tr>
                <tr>
                    <td><i class="fas fa-server" style="margin-right:6px"></i><strong>Administrator</strong></td>
                    <td>Pengelolaan Data Umum: tahun ajaran, mata pelajaran, jurusan, kelas, siswa, guru, ekstrakurikuler, buku induk</td>
                </tr>
                <tr>
                    <td><i class="fas fa-laptop" style="margin-right:6px"></i><strong>CBT</strong></td>
                    <td>Bank soal, jenis ujian, sesi &amp; ruang, nomor peserta, jadwal, pengawas, token, pelaksanaan ujian, hasil &amp; analisis</td>
                </tr>
                <tr>
                    <td><i class="fas fa-book-open" style="margin-right:6px"></i><strong>E-Learning</strong></td>
                    <td>Jadwal pelajaran, materi, tugas, absensi, perpustakaan digital, rekap nilai e-learning</td>
                </tr>
                <tr>
                    <td><i class="fas fa-award" style="margin-right:6px"></i><strong>Rapor</strong></td>
                    <td>Pengaturan rapor (KKM, predikat, bobot nilai, template), input nilai, catatan wali kelas, cetak rapor, legger, data alumni</td>
                </tr>
                <tr>
                    <td><i class="fas fa-bullhorn" style="margin-right:6px"></i><strong>Informasi</strong></td>
                    <td>Pengumuman dan log aktivitas pengguna</td>
                </tr>
                <tr>
                    <td><i class="fas fa-cog" style="margin-right:6px"></i><strong>Pengaturan</strong></td>
                    <td>Profil sekolah, manajemen user (admin, guru, siswa)</td>
                </tr>
                <tr>
                    <td><i class="fas fa-database" style="margin-right:6px"></i><strong>Database</strong></td>
                    <td>Database management, backup &amp; restore, image converter</td>
                </tr>
                <tr>
                    <td><i class="fas fa-life-ring" style="margin-right:6px"></i><strong>Lainnya</strong></td>
                    <td>FAQ, tips &amp; trick, changelog</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-book"></i> Konvensi Penulisan</h2>
        <table class="table-custom">
            <thead><tr><th>Format</th><th>Arti</th></tr></thead>
            <tbody>
                <tr><td><code class="inline">kode monospace</code></td><td>Nama menu, tombol, input field, atau perintah di antarmuka/terminal</td></tr>
                <tr><td><strong style="color:var(--accent)">Teks tebal berwarna</strong></td><td>Penekanan penting atau perhatian khusus</td></tr>
                <tr><td><i class="fas fa-keyboard" style="margin-right:6px"></i><code>Ctrl + S</code></td><td>Kombinasi tombol keyboard</td></tr>
                <tr>
                    <td><span style="display:inline-flex;align-items:center;gap:6px;background:#fff3cd;border-left:3px solid #ffc107;padding:2px 8px;border-radius:3px;font-size:13px;"><i class="fas fa-exclamation-triangle" style="color:#ffc107"></i> Peringatan</span></td>
                    <td>Tindakan yang berpotensi menyebabkan kehilangan data atau dampak permanen</td>
                </tr>
                <tr>
                    <td><span style="display:inline-flex;align-items:center;gap:6px;background:#d1ecf1;border-left:3px solid #17a2b8;padding:2px 8px;border-radius:3px;font-size:13px;"><i class="fas fa-info-circle" style="color:#17a2b8"></i> Info</span></td>
                    <td>Informasi tambahan atau catatan yang berguna</td>
                </tr>
                <tr>
                    <td><span style="display:inline-flex;align-items:center;gap:6px;background:#d4edda;border-left:3px solid #28a745;padding:2px 8px;border-radius:3px;font-size:13px;"><i class="fas fa-lightbulb" style="color:#28a745"></i> Tips</span></td>
                    <td>Saran atau cara lebih efisien untuk menyelesaikan suatu tugas</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-history"></i> Versi Aplikasi</h2>
        <table class="table-custom">
            <thead><tr><th>Info</th><th>Detail</th></tr></thead>
            <tbody>
                <tr><td>Versi Aplikasi</td><td><strong>GarudaCBT v1.6.0 RC_12</strong></td></tr>
                <tr><td>Tanggal Rilis</td><td>06 Juli 2026</td></tr>
                <tr><td>Framework</td><td>CodeIgniter 3</td></tr>
                <tr><td>Kompatibilitas PHP</td><td>7.3 — 8.x</td></tr>
                <tr><td>Lisensi</td><td>MIT License</td></tr>
            </tbody>
        </table>
        <div class="info-box info" style="margin-top:12px;">
            <i class="fas fa-info-circle"></i>
            <div>Panduan ini ditulis berdasarkan versi <strong>v1.6.0 RC_12</strong>. Fitur pada versi lebih lama atau lebih baru mungkin sedikit berbeda. Periksa <strong>Changelog</strong> untuk melihat perubahan antar versi.</div>
        </div>
    </div>
    `
};
