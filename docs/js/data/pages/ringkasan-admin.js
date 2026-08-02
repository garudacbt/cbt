if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['ringkasan-admin'] = {
    title: 'Ringkasan Admin',
    desc: 'Penjelasan mengenai fitur dan informasi yang tersedia di dasbor Administrator.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-user-shield"></i> Dasbor Administrator</h2>
        <p>Dasbor Administrator adalah halaman utama yang akan Anda lihat setelah login. Halaman ini memberikan ringkasan cepat mengenai status sekolah, jadwal, dan aktivitas terbaru dalam satu tampilan.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot Dasbor Admin akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Info Box Utama</h3>
        <p>Di bagian atas, terdapat kotak-kotak informasi (Info Box) yang menampilkan jumlah data master di sistem. Setiap kotak berfungsi sebagai tautan cepat ke halaman pengelolaannya.</p>
        <ul class="step-list">
            <li><strong>Siswa:</strong> Total siswa yang terdaftar di tahun ajaran aktif.</li>
            <li><strong>Rombel:</strong> Jumlah rombongan belajar atau kelas.</li>
            <li><strong>Guru:</strong> Total guru yang terdaftar.</li>
            <li><strong>Wali Kelas:</strong> Jumlah guru yang menjabat sebagai wali kelas.</li>
            <li><strong>Mapel:</strong> Total mata pelajaran yang tersedia.</li>
            <li><strong>Ekstrakurikuler:</strong> Jumlah kegiatan ekstrakurikuler.</li>
        </ul>
        <hr>
        <h3>🠊 Panel Penilaian (CBT)</h3>
        <p>Panel ini berisi ringkasan dan tautan cepat untuk fitur-fitur terkait Computer Based Test (CBT).</p>
        <ul class="step-list">
            <li><strong>Ruang:</strong> Jumlah ruang ujian yang tersedia.</li>
            <li><strong>Sesi:</strong> Jumlah sesi ujian yang telah dibuat.</li>
            <li><strong>Bank Soal:</strong> Total bank soal yang ada di sistem.</li>
            <li><strong>Jadwal:</strong> Jumlah jadwal ujian yang telah dibuat.</li>
            <li><strong>Token:</strong> Menampilkan token ujian yang sedang aktif. Klik untuk menuju halaman manajemen token.</li>
        </ul>
        <hr>
        <h3>🠊 Jadwal Penilaian Hari Ini</h3>
        <p>Widget ini menampilkan tabel dinamis berisi semua jadwal ujian yang berlangsung pada hari ini. Informasi yang ditampilkan meliputi:</p>
        <ul class="step-list">
            <li>Ruang dan Sesi Ujian.</li>
            <li>Mata Pelajaran dan Bank Soal yang diujikan.</li>
            <li>Kelas peserta.</li>
            <li>Nama Pengawas.</li>
            <li>Jumlah dan status siswa (Belum Login, Sedang Login, Selesai).</li>
        </ul>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Info:</strong> Data pada tabel ini akan diperbarui secara otomatis untuk memberikan pantauan real-time.</div>
        </div>
        <hr>
        <h3>🠊 Widget Lainnya</h3>
        <p>Selain panel utama, dasbor admin juga dilengkapi dengan beberapa widget tambahan:</p>
        <ol class="step-list">
            <li><strong>E-Learning Hari Ini:</strong> Menampilkan jadwal Kegiatan Belajar Mengajar (KBM) harian untuk setiap kelas.</li>
            <li><strong>Aktivitas:</strong> Menampilkan log aktivitas terbaru dari semua pengguna di sistem.</li>
            <li><strong>Info/Pengumuman:</strong> Menampilkan daftar pengumuman yang telah dipublikasikan untuk admin, guru, atau siswa.</li>
        </ol>
    </div>`
};