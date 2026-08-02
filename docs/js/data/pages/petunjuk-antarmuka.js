if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['petunjuk-antarmuka'] = {
    title: 'Petunjuk Antarmuka',
    desc: 'Mengenal antarmuka, navigasi, dan cara penggunaan dasar GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-compass"></i> Mengenal Antarmuka GarudaCBT</h2>
        <p>GarudaCBT menggunakan layout AdminLTE dengan empat area utama yang perlu Anda kenali:</p>
        <table class="table-custom">
            <thead><tr><th>Area</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr>
                    <td><strong>Navbar (atas)</strong></td>
                    <td>Tombol toggle sidebar, nama sekolah, notifikasi, info tahun ajaran aktif, dan tombol logout</td>
                </tr>
                <tr>
                    <td><strong>Sidebar (kiri)</strong></td>
                    <td>Menu navigasi utama — isinya berbeda tergantung peran (Admin, Guru, Siswa) dan mode login</td>
                </tr>
                <tr>
                    <td><strong>Content Area (tengah)</strong></td>
                    <td>Area konten halaman yang sedang aktif</td>
                </tr>
                <tr>
                    <td><strong>Footer (bawah)</strong></td>
                    <td>Versi aplikasi dan informasi copyright</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-bars"></i> Struktur Menu Sidebar</h2>
        <p>Menu sidebar dikelompokkan menjadi beberapa bagian header sesuai fungsinya:</p>

        <h3><i class="fas fa-home" style="width:18px"></i> HOME</h3>
        <table class="table-custom">
            <thead><tr><th>Menu</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>Dashboard</td><td>Halaman ringkasan dengan info box, jadwal hari ini, dan widget aktivitas</td></tr>
                <tr><td>Data Umum</td><td>Tahun Pelajaran, Mata Pelajaran, Jurusan, Kelas, Siswa, Ekstrakurikuler, Guru</td></tr>
                <tr><td>Data E-Learning</td><td>Jadwal Pelajaran, Materi, Tugas, Perpustakaan Digital</td></tr>
                <tr><td>Data Ujian</td><td>Jenis Ujian, Sesi, Ruang, Nomor Peserta, Atur Ruang/Sesi, Bank Soal, Jadwal, Alokasi Waktu, Pengawas, Token</td></tr>
                <tr><td>Pengumuman</td><td>Kelola dan distribusikan pengumuman</td></tr>
                <tr><td>Log Aktivitas</td><td>Rekam jejak aktivitas semua pengguna</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:16px;"><i class="fas fa-graduation-cap" style="width:18px"></i> PELAKSANAAN</h3>
        <table class="table-custom">
            <thead><tr><th>Menu</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>Hasil E-Learning</td><td>Nilai Materi/Tugas, Kehadiran Harian, Kehadiran Bulanan, Rekap Nilai</td></tr>
                <tr><td>Pelaksanaan Ujian</td><td>Cetak, Aktivasi Peserta, Status Siswa, Hasil Ujian, Rekap Nilai</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:16px;"><i class="fas fa-book" style="width:18px"></i> RAPOR</h3>
        <table class="table-custom">
            <thead><tr><th>Menu</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>Setting Rapor</td><td>Konfigurasi KKM, predikat, bobot nilai, template, dan input nilai</td></tr>
                <tr><td>Kumpulan Rapor</td><td>Arsip rapor dan cetak legger</td></tr>
                <tr><td>Alumni</td><td>Data kelulusan dan alumni siswa</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:16px;"><i class="fas fa-cog" style="width:18px"></i> PENGATURAN</h3>
        <table class="table-custom">
            <thead><tr><th>Menu</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>Profile Sekolah</td><td>Identitas, logo, dan informasi sekolah</td></tr>
                <tr><td>User Management</td><td>Kelola akun Administrator, Guru, dan Siswa</td></tr>
                <tr><td>Database</td><td>Data Manager, Backup/Restore, Image Converter</td></tr>
                <tr><td>Panduan Pengguna</td><td>Membuka dokumentasi ini di tab baru</td></tr>
            </tbody>
        </table>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-toggle-on"></i> Mode Login: CBT-Only vs Full</h2>
        <p>Saat login, pengguna dapat memilih dua mode yang menentukan tampilan menu dan alur setelah login:</p>
        <table class="table-custom">
            <thead><tr><th>Mode</th><th>Tampilan Menu</th><th>Redirect Setelah Login</th><th>Cocok untuk</th></tr></thead>
            <tbody>
                <tr>
                    <td><strong>Login CBT</strong></td>
                    <td>Hanya menu bertanda CBT — menu E-Learning dan Rapor disembunyikan</td>
                    <td>Siswa langsung ke halaman ujian (<code>/cbtsiswa/cbt</code>)</td>
                    <td>Hari pelaksanaan ujian di lab komputer</td>
                </tr>
                <tr>
                    <td><strong>Login E-Learning & CBT</strong></td>
                    <td>Semua menu ditampilkan lengkap</td>
                    <td>Dashboard utama</td>
                    <td>Penggunaan sehari-hari (admin, guru, siswa)</td>
                </tr>
            </tbody>
        </table>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Pilihan mode disimpan di <code>localStorage</code> browser. Jika siswa membuka browser baru atau di perangkat lain, mereka perlu memilih mode login lagi.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-mouse-pointer"></i> Konvensi Antarmuka</h2>
        <p>GarudaCBT menggunakan pola tombol yang konsisten di seluruh halaman:</p>
        <table class="table-custom">
            <thead><tr><th>Warna Tombol</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td><span style="background:#007bff;color:#fff;padding:2px 10px;border-radius:3px;font-size:13px;">Biru</span></td><td>Tambah data baru / aksi utama</td></tr>
                <tr><td><span style="background:#ffc107;color:#212529;padding:2px 10px;border-radius:3px;font-size:13px;">Kuning</span></td><td>Edit / ubah data</td></tr>
                <tr><td><span style="background:#dc3545;color:#fff;padding:2px 10px;border-radius:3px;font-size:13px;">Merah</span></td><td>Hapus data</td></tr>
                <tr><td><span style="background:#28a745;color:#fff;padding:2px 10px;border-radius:3px;font-size:13px;">Hijau</span></td><td>Aktifkan / konfirmasi / export</td></tr>
                <tr><td><span style="background:#17a2b8;color:#fff;padding:2px 10px;border-radius:3px;font-size:13px;">Teal/Info</span></td><td>Lihat detail / cetak / informasi tambahan</td></tr>
                <tr><td><span style="background:#6c757d;color:#fff;padding:2px 10px;border-radius:3px;font-size:13px;">Abu-abu</span></td><td>Batal / tutup / nonaktif</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:16px;">Tabel Data (DataTables)</h3>
        <p>Sebagian besar halaman daftar menggunakan DataTables dengan fitur:</p>
        <ul>
            <li><strong>Pencarian</strong> — kotak search di pojok kanan atas tabel, filter real-time</li>
            <li><strong>Sorting</strong> — klik header kolom untuk mengurutkan data</li>
            <li><strong>Pagination</strong> — navigasi halaman di bawah tabel</li>
            <li><strong>Reload</strong> — tombol reload di pojok kanan atas halaman untuk memuat ulang data</li>
        </ul>

        <h3 style="margin-top:16px;">Form Input & Modal</h3>
        <ul>
            <li>Sebagian besar operasi tambah/edit dilakukan melalui <strong>modal popup</strong> tanpa berpindah halaman</li>
            <li>Field bertanda <strong>*</strong> atau disorot merah adalah field wajib</li>
            <li>Notifikasi hasil operasi (berhasil/gagal) muncul sebagai <strong>toast notification</strong> di sudut layar</li>
            <li>Konfirmasi hapus selalu ditampilkan sebelum data benar-benar dihapus</li>
        </ul>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-exchange-alt"></i> Ganti Tahun Ajaran Aktif</h2>
        <p>Seluruh data di aplikasi mengacu pada <strong>tahun ajaran dan semester yang sedang aktif</strong>. Tampilan info tahun ajaran aktif terlihat di navbar bagian atas.</p>
        <p>Untuk mengganti tahun ajaran atau semester aktif, buka <strong>Data Umum &rarr; Tahun Pelajaran</strong> dan klik tombol <code class="inline">AKTIFKAN</code> pada tahun/semester yang diinginkan.</p>
        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Mengganti tahun ajaran aktif akan mengubah semua data yang ditampilkan di seluruh modul — pastikan proses di tahun ajaran sebelumnya sudah selesai.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-sign-out-alt"></i> Logout</h2>
        <p>Klik tombol <strong>LOGOUT</strong> di bagian bawah sidebar untuk keluar dari sesi. Session akan berakhir otomatis setelah <strong>24 jam</strong> tidak aktif, atau jika IP address berubah.</p>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>Selalu logout setelah selesai menggunakan aplikasi, terutama di komputer bersama seperti lab komputer sekolah.</div>
        </div>
    </div>
    `
};
