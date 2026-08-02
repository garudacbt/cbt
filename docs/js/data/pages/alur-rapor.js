if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['alur-rapor'] = {
    title: 'Alur Penerbitan Rapor',
    desc: 'Panduan lengkap proses penerbitan rapor, dari pengaturan admin hingga pencetakan oleh wali kelas.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-project-diagram"></i> Alur Kerja: Penerbitan Rapor Siswa</h2>
        <p>Halaman ini menjelaskan urutan langkah yang direkomendasikan untuk menerbitkan rapor. Proses ini melibatkan dua peran utama: <strong>Administrator</strong> untuk pengaturan awal dan <strong>Guru/Wali Kelas</strong> untuk input nilai dan data pendukung.</p>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan semua kegiatan penilaian (CBT dan E-Learning) sudah selesai dan nilainya sudah direkap sebelum memulai alur ini.</div>
        </div>

        <hr>
        <h3>Tahap 1: Pengaturan Rapor oleh Administrator</h3>
        <p>Admin perlu melakukan konfigurasi dasar rapor di awal semester. Pengaturan ini akan menjadi acuan bagi semua guru.</p>
        <ol class="step-list">
            <li><strong>Setting Rapor:</strong> Buka menu <code class="inline">Rapor > Setting Rapor</code>. Atur tanggal rapor dan format cetak yang akan digunakan.</li>
            <li><strong>KKM dan Bobot:</strong> Di menu yang sama, atur Kriteria Ketuntasan Minimal (KKM) untuk setiap mata pelajaran serta bobot nilai (misal: 60% Harian, 40% Akhir).</li>
            <li><strong>Predikat Nilai:</strong> Atur rentang nilai untuk setiap predikat (Sangat Baik, Baik, Cukup, Kurang).</li>
            <li><strong>Aturan Penilaian:</strong> Tentukan komponen-komponen nilai apa saja yang akan masuk ke dalam rapor.</li>
        </ol>
        <p>Lihat panduan detail di halaman <a href="#/setting-rapor">Setting Rapor</a>.</p>

        <hr>
        <h3>Tahap 2: Input Nilai oleh Guru Mata Pelajaran</h3>
        <p>Setelah admin selesai melakukan pengaturan, setiap guru mata pelajaran bertanggung jawab untuk menginput nilai.</p>
        <ol class="step-list">
            <li>Login sebagai <strong>Guru</strong>.</li>
            <li>Buka menu <code class="inline">PENILAIAN > Input Nilai</code>.</li>
            <li>Pilih kelas dan mata pelajaran yang diampu.</li>
            <li>Masukkan nilai pengetahuan dan keterampilan untuk setiap siswa. Anda bisa menginput manual atau mengimpor dari nilai harian/akhir yang sudah ada di sistem.</li>
            <li>Klik <code class="inline">Simpan</code> setelah selesai.</li>
        </ol>

        <hr>
        <h3>Tahap 3: Input Data Tambahan oleh Wali Kelas</h3>
        <p>Wali Kelas memiliki tugas untuk melengkapi data-data non-akademik dan memverifikasi kelengkapan nilai.</p>
        <ol class="step-list">
            <li>Login sebagai <strong>Guru</strong> yang juga menjabat sebagai <strong>Wali Kelas</strong>.</li>
            <li><strong>Periksa Nilai:</strong> Buka menu <code class="inline">PENILAIAN > Periksa Nilai</code> untuk memastikan semua guru mata pelajaran sudah menginput nilai untuk kelas Anda.</li>
            <li><strong>Input Data Wali Kelas:</strong> Buka menu <code class="inline">PENILAIAN > Input Wali Kelas</code>. Di sini Anda akan menemukan beberapa submenu:
                <ul class="step-list">
                    <li><strong>Sikap Spiritual & Sosial:</strong> Isi deskripsi sikap untuk setiap siswa.</li>
                    <li><strong>Prestasi:</strong> Tambahkan data prestasi yang diraih siswa (jika ada).</li>
                    <li><strong>Kehadiran:</strong> Masukkan jumlah absensi (Sakit, Izin, Tanpa Keterangan).</li>
                    <li><strong>Catatan & Kenaikan:</strong> Berikan catatan personal untuk siswa dan tentukan status kenaikan kelas di akhir tahun ajaran.</li>
                </ul>
            </li>
        </ol>
        
        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Pastikan semua data sudah terisi lengkap dan benar sebelum melanjutkan ke tahap pencetakan.</div>
        </div>

        <hr>
        <h3>Tahap 4: Pencetakan Rapor dan Dokumen Pendukung</h3>
        <p>Setelah semua data terisi, rapor siap untuk dicetak.</p>
        <ol class="step-list">
            <li>Masih sebagai <strong>Wali Kelas</strong>, buka menu <code class="inline">CETAK</code>.</li>
            <li>Pilih menu yang sesuai:
                <ul class="step-list">
                    <li><strong>Rapor PTS:</strong> Untuk mencetak rapor tengah semester.</li>
                    <li><strong>Rapor Akhir:</strong> Untuk mencetak rapor akhir semester.</li>
                    <li><strong>Legger:</strong> Untuk mencetak rekapitulasi nilai seluruh siswa dalam satu kelas (legger).</li>
                    <li><strong>DKN:</strong> Untuk mencetak Daftar Kumpulan Nilai.</li>
                </ul>
            </li>
            <li>Pilih siswa atau seluruh kelas, lalu klik tombol cetak. Sistem akan menghasilkan file PDF yang siap diunduh.</li>
        </ol>

        <div class="info-box success">
            <i class="fas fa-check-circle"></i>
            <div><strong>Selesai!</strong> Dengan mengikuti alur ini, Anda telah berhasil menerbitkan rapor siswa secara lengkap dan sistematis.</div>
        </div>

        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ul class="step-list">
            <li><strong>Koordinasi:</strong> Komunikasikan batas waktu input nilai kepada semua guru mata pelajaran agar tidak ada yang terlambat.</li>
            <li><strong>Gunakan Fitur "Periksa Nilai":</strong> Wali kelas sebaiknya secara rutin menggunakan menu "Periksa Nilai" untuk memantau progres input nilai dari guru lain.</li>
            <li><strong>Template Deskripsi:</strong> Untuk deskripsi sikap, siapkan beberapa template kalimat yang bisa di-copy-paste dan disesuaikan untuk mempercepat pengisian.</li>
            <li><strong>Cetak Draft:</strong> Sebelum mencetak massal, cetak satu rapor sebagai sampel (draft) untuk diperiksa kelengkapan dan kebenarannya.</li>
        </ul>

        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai mata pelajaran tidak muncul di rapor.</strong>
                <span>Kemungkinan besar guru mata pelajaran tersebut belum menginput nilai. Hubungi guru yang bersangkutan dan periksa melalui menu "Periksa Nilai".</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tombol "Cetak Rapor" tidak aktif.</strong>
                <span>Pastikan semua komponen nilai yang diwajibkan oleh admin (misal: sikap, kehadiran) sudah terisi. Sistem tidak akan mengizinkan pencetakan jika data belum lengkap.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Deskripsi predikat tidak sesuai.</strong>
                <span>Pengaturan deskripsi predikat dilakukan oleh admin di menu <code class="inline">Rapor > Setting Rapor</code>. Hubungi admin jika ada ketidaksesuaian.</span>
            </div>
        </div>
    </div>`
};