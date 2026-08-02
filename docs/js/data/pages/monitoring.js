if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['monitoring'] = {
    title: 'Monitoring Ujian',
    desc: 'Panduan lengkap memantau pelaksanaan ujian secara real-time di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-desktop"></i> Monitoring Ujian Real-Time</h2>
        <p>Fitur monitoring memungkinkan pengawas dan administrator melihat status ujian secara real-time, termasuk siswa yang sedang mengerjakan, selesai, atau mengalami masalah. Monitoring adalah alat penting untuk memastikan kelancaran ujian dan menangani masalah dengan cepat.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Dashboard Monitoring</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator, Guru, atau Pengawas ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Pelaksanaan CBT</code></li>
            <li>Pilih jadwal ujian yang sedang berlangsung</li>
            <li>Klik tombol <code class="inline">Monitoring</code></li>
            <li>Dashboard monitoring real-time akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Dashboard monitoring hanya aktif selama ujian berlangsung. Pastikan jadwal ujian sudah aktif sebelum mengakses monitoring.</div>
        </div>
        <hr>
        <h3>🠊 Dashboard Monitoring</h3>
        <p>Dashboard monitoring menampilkan informasi berikut:</p>
        <ul class="step-list">
            <li><strong>Status Siswa:</strong> Belum mulai, sedang mengerjakan, selesai, atau terputus</li>
            <li><strong>Sisa Waktu:</strong> Waktu tersisa untuk setiap siswa</li>
            <li><strong>Progress:</strong> Jumlah soal yang telah dikerjakan</li>
            <li><strong>Koneksi:</strong> Status koneksi internet siswa</li>
            <li><strong>Aktivitas:</strong> Log aktivitas siswa selama ujian</li>
            <li><strong>Statistik:</strong> Ringkasan statistik ujian (total siswa, selesai, dll)</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Update Real-Time:</strong> Dashboard monitoring di-update secara real-time. Informasi yang ditampilkan selalu up-to-date dengan kondisi ujian saat ini.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Status Siswa</h3>
        <ol class="step-list">
            <li><strong>Belum Mulai (Abu-abu):</strong> Siswa belum login atau belum memulai ujian</li>
            <li><strong>Sedang Mengerjakan (Hijau):</strong> Siswa sedang aktif mengerjakan ujian</li>
            <li><strong>Selesai (Biru):</strong> Siswa telah menyelesaikan ujian</li>
            <li><strong>Terputus (Kuning):</strong> Siswa terputus dari koneksi internet</li>
            <li><strong>Bermasalah (Merah):</strong> Siswa mengalami masalah teknis</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Siswa dengan status terputus atau bermasalah memerlukan perhatian segera</li>
                    <li>Reset token mungkin diperlukan untuk siswa yang terputus</li>
                    <li>Perpanjangan waktu mungkin diperlukan untuk siswa yang mengalami masalah</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Statistik Ujian</h3>
        <p>Dashboard monitoring juga menampilkan statistik ringkasan:</p>
        <ul class="step-list">
            <li><strong>Total Siswa:</strong> Jumlah total siswa yang terdaftar</li>
            <li><strong>Sudah Login:</strong> Jumlah siswa yang sudah login</li>
            <li><strong>Sedang Mengerjakan:</strong> Jumlah siswa yang sedang aktif</li>
            <li><strong>Selesai:</strong> Jumlah siswa yang sudah selesai</li>
            <li><strong>Terputus:</strong> Jumlah siswa yang terputus</li>
            <li><strong>Rata-rata Nilai:</strong> Rata-rata nilai sementara (untuk soal auto-grade)</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Statistik ini membantu pengawas memantau progress secara keseluruhan dan mengidentifikasi masalah yang memerlukan perhatian.</div>
        </div>
        <hr>
        <h3>🠊 Aksi yang Dapat Dilakukan</h3>
        <p>Dari dashboard monitoring, pengawas dapat melakukan berbagai aksi:</p>
        <ul class="step-list">
            <li><strong>Reset Token:</strong> Reset token untuk siswa yang terputus atau mengalami masalah login</li>
            <li><strong>Perpanjangan Waktu:</strong> Berikan perpanjangan waktu untuk siswa tertentu jika diperlukan</li>
            <li><strong>Kirim Pesan:</strong> Kirim pesan ke siswa tertentu atau ke semua siswa</li>
            <li><strong>Force Submit:</strong> Paksa submit jawaban siswa jika diperlukan (misal: waktu habis)</li>
            <li><strong>Pause/Resume:</strong> Pause atau resume ujian untuk siswa tertentu</li>
            <li><strong>Lihat Jawaban:</strong> Lihat jawaban siswa (setelah submit)</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Gunakan aksi dengan hati-hati dan hanya jika diperlukan</li>
                    <li>Reset token akan memutus koneksi siswa yang sedang mengerjakan</li>
                    <li>Force submit tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Filter dan Pencarian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter Status</code> untuk memfilter berdasarkan status siswa</li>
            <li>Gunakan kolom <code class="inline">Cari</code> untuk mencari siswa berdasarkan nama atau NIS</li>
            <li>Gunakan dropdown <code class="inline">Filter Kelas</code> untuk memfilter berdasarkan kelas</li>
            <li>Hasil akan ditampilkan sesuai filter yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk menemukan siswa tertentu dengan cepat, terutama jika jumlah siswa sangat banyak.</div>
        </div>
        <hr>
        <h3>🠊 Detail Siswa</h3>
        <ol class="step-list">
            <li>Klik pada nama siswa di dashboard monitoring</li>
            <li>Modal detail siswa akan ditampilkan</li>
            <li>Informasi yang ditampilkan:
                <ul class="step-list">
                    <li>Nama dan NIS siswa</li>
                    <li>Kelas dan sesi</li>
                    <li>Status saat ini</li>
                    <li>Waktu mulai dan sisa waktu</li>
                    <li>Progress pengerjaan soal</li>
                    <li>Log aktivitas</li>
                    <li>Jawaban yang sudah disubmit (jika ada)</li>
                </ul>
            </li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Detail siswa berguna untuk troubleshooting dan memahami kondisi spesifik siswa yang mengalami masalah.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Monitoring aktif:</strong> Monitor dashboard secara aktif selama ujian</li>
            <li><strong>Respons cepat:</strong> Respon cepat terhadap masalah yang muncul</li>
            <li><strong>Komunikasi:</strong> Gunakan fitur pesan untuk komunikasi dengan siswa</li>
            <li><strong>Dokumentasi:</strong> Catat semua insiden dan tindakan yang diambil</li>
            <li><strong>Koordinasi:</strong> Koordinasi dengan tim teknis jika ada masalah sistem</li>
            <li><strong>Backup:</strong> Siapkan prosedur backup jika sistem gagal</li>
            <li><strong>Filter efektif:</strong> Gunakan filter untuk fokus pada siswa yang memerlukan perhatian</li>
            <li><strong>Statistik:</strong> Pantau statistik untuk memahami progress keseluruhan</li>
            <li><strong>Laporan:</strong> Buat laporan lengkap setelah ujian selesai</li>
            <li><strong>Review:</strong> Review prosedur untuk perbaikan ujian berikutnya</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Dashboard tidak muncul:</strong>
                <span>Pastikan jadwal ujian sedang aktif. Pastikan ujian sudah dimulai. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Data tidak update real-time:</strong>
                <span>Pastikan koneksi internet stabil. Refresh halaman. Cek apakah ada error di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul di dashboard:</strong>
                <span>Pastikan siswa sudah login. Pastikan siswa ditugaskan ke sesi yang benar. Periksa status koneksi siswa.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Status siswa tidak berubah:</strong>
                <span>Pastikan siswa masih terhubung ke sistem. Periksa koneksi internet siswa. Coba refresh halaman.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Aksi gagal:</strong>
                <span>Pastikan siswa masih dalam sistem. Pastikan tidak ada error koneksi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Statistik tidak akurat:</strong>
                <span>Statistik di-update secara berkala, bukan real-time. Tunggu beberapa detik untuk update. Refresh halaman jika perlu.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Waktu Aktif:</strong> Dashboard monitoring hanya aktif selama ujian berlangsung. Setelah ujian selesai, data monitoring akan tersimpan untuk laporan.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Log Aktivitas:</strong> Semua aktivitas siswa dicatat dalam log untuk audit dan dokumentasi. Log dapat diakses setelah ujian selesai.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Multi-User:</strong> Beberapa pengawas dapat mengakses dashboard monitoring secara bersamaan untuk koordinasi yang lebih baik.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Performa:</strong> Dashboard monitoring menggunakan update berkala untuk menjaga performa sistem. Data tidak di-update secara instan untuk setiap aksi.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Monitoring Ujian menggunakan endpoint khusus untuk mengambil data real-time dan melakukan aksi kontrol. Semua operasi menggunakan AJAX dan mengembalikan respons JSON.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtjadwal/monitoring/{id_jadwal}</code></td><td>Tampilkan dashboard monitoring</td></tr>
                <tr><td>GET</td><td><code>cbtjadwal/getMonitoringData/{id_jadwal}</code></td><td>Ambil data monitoring real-time</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/resetTokenSiswa</code></td><td>Reset token untuk siswa tertentu</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/tambahWaktuSiswa</code></td><td>Tambah waktu untuk siswa tertentu</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/kirimPesanSiswa</code></td><td>Kirim pesan ke siswa</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/forceSubmitSiswa</code></td><td>Paksa submit jawaban siswa</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/pauseSiswa</code></td><td>Pause ujian untuk siswa</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/resumeSiswa</code></td><td>Resume ujian untuk siswa</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">GET <code>cbtjadwal/getMonitoringData/{id_jadwal}</code> — Ambil Data Monitoring</h3>
        <p>Endpoint ini menangani pengambilan data monitoring real-time untuk dashboard.</p>
        <table class="table-custom">
            <thead><tr><th>Parameter URL</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "siswa": [
    { "id": 1, "nama": "Siswa A", "status": "sedang_mengerjakan", "progress": 15, "sisa_waktu": 1800, "koneksi": "online" },
    { "id": 2, "nama": "Siswa B", "status": "selesai", "progress": 40, "sisa_waktu": 0, "koneksi": "online" }
  ],
  "statistik": { "total": 30, "selesai": 5, "sedang": 25, "terputus": 0 }
}</pre>

        <h3 style="margin-top:20px;">POST <code>cbtjadwal/forceSubmitSiswa</code> — Force Submit</h3>
        <p>Endpoint ini menangani operasi force submit jawaban siswa.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_siswa</code></td><td>Ya</td><td>ID siswa yang akan di-force submit</td></tr>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "Jawaban berhasil disubmit" }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Data monitoring di-update secara berkala (setiap 5-10 detik) untuk menjaga performa sistem.</div>
        </div>
    </div>`
};
