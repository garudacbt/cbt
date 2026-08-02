if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['alur-ujian-cbt'] = {
    title: 'Alur Menyelenggarakan Ujian CBT',
    desc: 'Panduan langkah demi langkah untuk membuat dan melaksanakan ujian online (CBT).',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-project-diagram"></i> Alur Kerja: Menyelenggarakan Ujian CBT</h2>
        <p>Halaman ini menjelaskan urutan langkah yang direkomendasikan untuk guru atau admin dalam menyelenggarakan ujian berbasis komputer (CBT) dari awal hingga akhir, sesuai dengan urutan menu di aplikasi.</p>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan data master seperti Siswa, Kelas, dan Mata Pelajaran sudah lengkap sebelum memulai alur ini.</div>
        </div>

        <hr>
        <h3>Tahap 1: Persiapan Data Pendukung</h3>
        <p>Langkah awal adalah memastikan semua data pendukung untuk ujian sudah siap.</p>
        <ol class="step-list">
            <li><strong>Jenis Ujian, Sesi, Ruang:</strong> Buka menu <code class="inline">Data Ujian</code> dan pastikan data untuk <a href="#/jenis-ujian">Jenis Ujian</a>, <a href="#/sesi">Sesi</a>, dan <a href="#/ruang">Ruang</a> sudah tersedia. Tambahkan jika perlu.</li>
            <li><strong>Bank Soal:</strong> Ini adalah langkah paling krusial. Buka <code class="inline">Data Ujian > Bank Soal</code> untuk <a href="#/buat-bank-soal">membuat bank soal</a> baru, lalu isi dengan butir-butir soal melalui fitur <a href="#/tambah-soal">Tambah Soal</a> atau <a href="#/import-soal">Import Soal</a>.</li>
        </ol>

        <hr>
        <h3>Tahap 2: Penjadwalan dan Pengorganisasian</h3>
        <p>Setelah bank soal siap, langkah selanjutnya adalah menjadwalkan ujian dan mengatur pesertanya.</p>
        <ol class="step-list">
            <li><strong>Buat Jadwal:</strong> Buka <code class="inline">Data Ujian > Jadwal</code>, lalu klik <code class="inline">Buat Jadwal Baru</code>. Pilih bank soal yang akan diujikan, tentukan tanggal dan durasi. Lihat panduan di <a href="#/buat-jadwal">Buat Jadwal</a>.</li>
            <li><strong>Alokasi Waktu:</strong> Buka <code class="inline">Data Ujian > Alokasi Waktu</code>. Fitur ini digunakan untuk mengalokasikan satu jadwal ke beberapa sesi atau jam yang berbeda dalam satu hari. Ini berguna untuk ujian dengan banyak sesi. Lihat panduan di <a href="#/alokasi-waktu">Alokasi Waktu</a>.</li>
            <li><strong>Atur Ruang/Sesi Siswa:</strong> Buka <code class="inline">Data Ujian > Atur Ruang/Sesi</code> untuk menempatkan siswa ke dalam ruang dan sesi ujian yang spesifik. Langkah ini wajib jika ujian dilaksanakan dalam beberapa ruang/sesi.</li>
            <li><strong>Tetapkan Pengawas:</strong> Buka <code class="inline">Data Ujian > Pengawas</code>. Tugaskan guru sebagai pengawas untuk jadwal, ruang, dan sesi yang telah dibuat.</li>
        </ol>
        
        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Urutan sangat penting: Buat Jadwal ➔ Alokasi Waktu (jika perlu) ➔ Atur Sesi Siswa ➔ Tetapkan Pengawas.</div>
        </div>

        <hr>
        <h3>Tahap 3: Pelaksanaan Ujian</h3>
        <p>Pada hari-H, fokus utama adalah memastikan ujian berjalan lancar.</p>
        <ol class="step-list">
            <li><strong>Rilis Token:</strong> Buka <code class="inline">Data Ujian > Token</code>. Klik <code class="inline">RILIS TOKEN BARU</code> agar siswa bisa login ke halaman ujian. Token ini bersifat dinamis dan akan berubah secara berkala jika diatur otomatis.</li>
            <li><strong>Cetak Dokumen:</strong> Buka <code class="inline">Pelaksanaan Ujian > Cetak</code> untuk mencetak kartu peserta, daftar hadir, dan berita acara jika diperlukan.</li>
            <li><strong>Aktivasi Peserta:</strong> Di menu <code class="inline">Pelaksanaan Ujian > Aktivasi Peserta</code>, Anda bisa melihat status login semua peserta dan melakukan reset jika ada yang terkendala.</li>
            <li><strong>Pantau Status Siswa:</strong> Gunakan menu <code class="inline">Pelaksanaan Ujian > Status Siswa</code> untuk memonitor progres ujian setiap siswa secara real-time.</li>
        </ol>

        <hr>
        <h3>Tahap 4: Evaluasi dan Pelaporan</h3>
        <p>Setelah waktu ujian berakhir, sistem akan otomatis menilai jawaban pilihan ganda.</p>
        <ol class="step-list">
            <li><strong>Koreksi Esai:</strong> Jika ada soal esai, buka <code class="inline">Hasil Ujian > Koreksi Esai</code> (di dalam menu Hasil Ujian) untuk memberikan skor manual.</li>
            <li><strong>Lihat Hasil Ujian:</strong> Buka <code class="inline">Pelaksanaan Ujian > Hasil Ujian</code> untuk melihat perolehan nilai akhir setiap siswa.</li>
            <li><strong>Analisis Soal:</strong> (Opsional) Gunakan menu <code class="inline">Hasil Ujian > Analisis Soal</code> untuk mengevaluasi kualitas setiap butir soal.</li>
            <li><strong>Rekap Nilai:</strong> Buka <code class="inline">Pelaksanaan Ujian > Rekap Nilai</code> untuk melihat, mengunduh, atau mencetak rekapitulasi nilai keseluruhan.</li>
        </ol>

        <div class="info-box success">
            <i class="fas fa-check-circle"></i>
            <div><strong>Selesai!</strong> Dengan mengikuti alur ini, Anda telah berhasil menyelenggarakan satu siklus ujian CBT secara lengkap dan terstruktur.</div>
        </div>

        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ul class="step-list">
            <li><strong>Uji Coba Bank Soal:</strong> Sebelum dijadwalkan, lakukan uji coba bank soal dengan akun siswa demo untuk memastikan semua soal, gambar, dan audio/video tampil dengan benar.</li>
            <li><strong>Gunakan Fitur "Copy Jadwal":</strong> Jika Anda perlu membuat jadwal serupa untuk kelas lain, gunakan fitur "Copy Jadwal" untuk menghemat waktu.</li>
            <li><strong>Token Otomatis:</strong> Untuk ujian skala besar, aktifkan mode token otomatis di halaman <code class="inline">Token</code> agar token diperbarui secara berkala tanpa intervensi manual.</li>
            <li><strong>Reset Peserta:</strong> Jika siswa mengalami masalah (misal: mati lampu, browser tertutup), gunakan fitur "Reset Peserta" di halaman <code class="inline">Status Siswa</code> untuk mengizinkan mereka login kembali.</li>
        </ul>

        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak bisa login ujian.</strong>
                <span>Periksa beberapa hal: 1) Pastikan token yang dimasukkan siswa sudah benar dan masih berlaku. 2) Pastikan siswa sudah dialokasikan ke dalam sesi dan ruang ujian. 3) Pastikan status siswa aktif dan tidak sedang login di perangkat lain.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Jadwal ujian tidak muncul untuk siswa.</strong>
                <span>Pastikan tanggal dan jam ujian pada jadwal sudah benar. Pastikan juga jadwal tersebut telah dialokasikan untuk kelas siswa yang bersangkutan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tidak muncul setelah ujian selesai.</strong>
                <span>Jika ujian memuat soal esai, nilai akhir tidak akan muncul sebelum guru melakukan koreksi manual. Jika semua soal adalah Pilihan Ganda, coba lakukan "Ulang Perhitungan" di halaman <code class="inline">Hasil Ujian</code>.</span>
            </div>
        </div>
    </div>`
};