if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['info-box'] = {
    title: 'Info Box Dashboard',
    desc: 'Penjelasan detail setiap info box di dashboard admin.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-th-large"></i> Info Box Data Umum</h2>
        <p>Info box menampilkan statistik ringkas untuk Data Umum sekolah:</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <table class="table-custom">
            <thead><tr><th>Info Box</th><th>Fungsi</th><th>Menu Terkait</th></tr></thead>
            <tbody>
                <tr><td>Siswa</td><td>Total siswa aktif tahun ajaran ini</td><td>Data Siswa</td></tr>
                <tr><td>Rombel</td><td>Total rombel/kelas aktif</td><td>Data Kelas</td></tr>
                <tr><td>Guru</td><td>Total guru terdaftar</td><td>Data Guru</td></tr>
                <tr><td>Wali Kelas</td><td>Total guru yang menjadi wali kelas</td><td>Data Guru</td></tr>
                <tr><td>Mapel</td><td>Total mata pelajaran</td><td>Data Mapel</td></tr>
                <tr><td>Ekstrakurikuler</td><td>Total kegiatan ekstrakurikuler</td><td>Data Ekstra</td></tr>
            </tbody>
        </table>

        <h2 style="margin-top:28px"><i class="fas fa-laptop"></i> Info Box CBT</h2>
        <p>Info box untuk modul Computer Based Test:</p>

        <table class="table-custom">
            <thead><tr><th>Info Box</th><th>Fungsi</th><th>Menu Terkait</th></tr></thead>
            <tbody>
                <tr><td>Ruang</td><td>Total ruang ujian yang tersedia</td><td>CBT Ruang</td></tr>
                <tr><td>Sesi</td><td>Total sesi ujian</td><td>CBT Sesi</td></tr>
                <tr><td>Bank Soal</td><td>Total bank soal yang dibuat</td><td>Bank Soal</td></tr>
                <tr><td>Jadwal</td><td>Total jadwal ujian aktif</td><td>CBT Jadwal</td></tr>
            </tbody>
        </table>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>Angka pada info box dihitung berdasarkan tahun ajaran dan semester yang sedang aktif. Mengganti tahun ajaran akan mengubah angka yang ditampilkan.</div>
        </div>
    </div>`
};
