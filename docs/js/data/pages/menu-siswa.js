if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['menu-siswa'] = {
    title: 'Menu Siswa',
    desc: 'Penjelasan detail setiap menu yang tersedia untuk siswa.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-list"></i> Detail Menu Siswa</h2>
        <p>Berikut penjelasan detail untuk setiap menu yang tersedia di dashboard siswa:</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <table class="table-custom">
            <thead><tr><th>Menu</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>Jadwal Pelajaran</td><td>Menampilkan jadwal pelajaran mingguan dengan jam, kelas, dan mapel</td></tr>
                <tr><td>Materi</td><td>Mengakses materi pembelajaran yang diupload guru</td></tr>
                <tr><td>Tugas</td><td>Melihat daftar tugas, mengerjakan, dan mengumpulkan tugas</td></tr>
                <tr><td>Ujian/Ulangan</td><td>Mengikuti ujian CBT yang dijadwalkan</td></tr>
                <tr><td>Nilai Hasil</td><td>Melihat nilai ujian, tugas, dan nilai rapor</td></tr>
                <tr><td>Absensi</td><td>Melihat riwayat kehadiran di kelas</td></tr>
                <tr><td>Catatan Guru</td><td>Melihat catatan dan evaluasi dari guru</td></tr>
                <tr><td>Arsip</td><td>Mengakses materi dan tugas dari semester sebelumnya</td></tr>
                <tr><td>E-Perpus</td><td>Akses perpustakaan digital (integrasi pihak ketiga)</td></tr>
            </tbody>
        </table>

        <h3>Mengikuti Ujian CBT</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">Ujian/Ulangan</code></li>
            <li>Pilih ujian yang tersedia untuk hari ini</li>
            <li>Masukkan token ujian yang diberikan pengawas</li>
            <li>Klik <code class="inline">Mulai Ujian</code></li>
            <li>Kerjakan soal sesuai waktu yang ditentukan</li>
            <li>Klik <code class="inline">Selesai</code> setelah selesai mengerjakan</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div><strong>Penting:</strong> Pastikan koneksi internet stabil saat mengikuti ujian. Jangan refresh atau tutup browser saat ujian berlangsung.</div>
        </div>
    </div>`
};
