if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['jadwal-harian'] = {
    title: 'Jadwal Harian Guru',
    desc: 'Memahami tampilan jadwal pelajaran harian.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-calendar-day"></i> Jadwal Pelajaran Harian</h2>
        <p>Jadwal pelajaran harian ditampilkan di dashboard guru berdasarkan hari saat ini. Jadwal ini menunjukkan jam mengajar, kelas, dan mata pelajaran yang diajar.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <h3>Informasi yang Ditampilkan</h3>
        <ul>
            <li><strong>Jam Ke</strong> — urutan jam pelajaran</li>
            <li><strong>Waktu</strong> — jam mulai dan selesai pelajaran</li>
            <li><strong>Kelas</strong> — nama kelas/rombel</li>
            <li><strong>Mata Pelajaran</strong> — mata pelajaran yang diajar</li>
            <li><strong>Status</strong> — status pelajaran (berlangsung, selesai, libur)</li>
        </ul>

        <h3>Fitur Jadwal</h3>
        <p>Jadwal pelajaran diatur oleh administrator melalui menu <code class="inline">E-Learning > Jadwal Pelajaran</code>. Guru dapat:</p>
        <ul>
            <li>Melihat jadwal hari ini dan hari lain</li>
            <li>Melihat detail jadwal dengan klik pada jadwal</li>
            <li>Mengakses materi dan tugas terkait jadwal</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>Jika tidak ada jadwal untuk hari ini, akan ditampilkan pesan "Tidak ada jadwal untuk hari ini". Hubungi administrator untuk mengatur jadwal.</div>
        </div>
    </div>`
};
