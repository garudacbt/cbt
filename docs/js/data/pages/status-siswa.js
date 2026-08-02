if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['status-siswa'] = {
    title: 'Status Siswa',
    desc: 'Panduan lengkap memantau status peserta ujian secara real-time di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-user-clock"></i> Status Siswa Ujian</h2>
        <p>Status Siswa digunakan untuk memantau status dan aktivitas peserta ujian secara real-time. Fitur ini memungkinkan pengawas dan administrator melihat kondisi setiap siswa selama ujian berlangsung, termasuk status login, progress pengerjaan, dan koneksi.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Status Siswa</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator, Guru, atau Pengawas ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Pelaksanaan CBT</code></li>
            <li>Klik <code class="inline">Status Siswa</code></li>
            <li>Halaman Status Siswa akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Status Siswa hanya aktif selama ujian berlangsung. Pastikan jadwal ujian sudah aktif sebelum mengakses Status Siswa.</div>
        </div>
        <hr>
        <h3>🠊 Memantau Status Siswa</h3>
        <ol class="step-list">
            <li>Pada halaman Status Siswa, pilih jadwal ujian yang sedang berlangsung</li>
            <li>Pilih ruang dan sesi untuk memfilter siswa</li>
            <li>Daftar siswa dengan status akan ditampilkan secara real-time</li>
            <li>Informasi yang ditampilkan:
                <ul class="step-list">
                    <li><strong>Nama Siswa:</strong> Nama peserta ujian</li>
                    <li><strong>NIS:</strong> Nomor Induk Siswa</li>
                    <li><strong>Kelas:</strong> Kelas siswa</li>
                    <li><strong>Status:</strong> Status saat ini siswa</li>
                    <li><strong>Progress:</strong> Jumlah soal yang telah dikerjakan</li>
                    <li><strong>Sisa Waktu:</strong> Waktu tersisa untuk siswa</li>
                    <li><strong>Koneksi:</strong> Status koneksi internet siswa</li>
                </ul>
            </li>
            <li>Status akan diperbarui secara real-time</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Status Siswa di-update secara real-time. Refresh halaman secara berkala untuk memastikan data terbaru.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Status Siswa</h3>
        <p>Sistem menampilkan berbagai status siswa:</p>
        <ul class="step-list">
            <li><strong>Belum Login:</strong> Siswa belum login ke sistem ujian</li>
            <li><strong>Sudah Login:</strong> Siswa telah login tapi belum memulai ujian</li>
            <li><strong>Sedang Mengerjakan:</strong> Siswa sedang aktif mengerjakan ujian</li>
            <li><strong>Selesai:</strong> Siswa telah menyelesaikan ujian</li>
            <li><strong>Disconnect:</strong> Siswa terputus dari koneksi internet</li>
            <li><strong>Timeout:</strong> Waktu ujian siswa telah habis</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Siswa dengan status Disconnect memerlukan perhatian segera</li>
                    <li>Siswa dengan status Timeout mungkin memerlukan perpanjangan waktu</li>
                    <li>Monitor status siswa secara aktif selama ujian</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Aksi yang Dapat Dilakukan</h3>
        <p>Dari halaman Status Siswa, pengawas dapat melakukan berbagai aksi:</p>
        <ul class="step-list">
            <li><strong>Kick Out:</strong> Mengeluarkan siswa dari ujian</li>
            <li><strong>Reset Login:</strong> Mereset login siswa yang terputus</li>
            <li><strong>Tambah Waktu:</strong> Menambah waktu ujian untuk siswa tertentu</li>
            <li><strong>Kirim Pesan:</strong> Mengirim pesan ke siswa tertentu atau semua siswa</li>
            <li><strong>Force Submit:</strong> Paksa submit jawaban siswa</li>
            <li><strong>Lihat Detail:</strong> Melihat detail progress dan jawaban siswa</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Gunakan aksi dengan hati-hati dan hanya jika diperlukan</li>
                    <li>Kick Out akan mengeluarkan siswa dari ujian</li>
                    <li>Force Submit tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Filter dan Pencarian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter Status</code> untuk memfilter berdasarkan status siswa</li>
            <li>Gunakan dropdown <code class="inline">Filter Kelas</code> untuk memfilter berdasarkan kelas</li>
            <li>Gunakan kolom <code class="inline">Cari</code> untuk mencari siswa berdasarkan nama atau NIS</li>
            <li>Hasil akan ditampilkan sesuai filter yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk fokus pada siswa dengan status tertentu, seperti siswa yang Disconnect atau Timeout.</div>
        </div>
        <hr>
        <h3>🠊 Detail Siswa</h3>
        <ol class="step-list">
            <li>Klik pada nama siswa di tabel Status Siswa</li>
            <li>Modal detail siswa akan ditampilkan</li>
            <li>Informasi yang ditampilkan:
                <ul class="step-list">
                    <li>Informasi siswa (nama, NIS, kelas)</li>
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
            <li><strong>Monitoring aktif:</strong> Monitor status siswa secara aktif selama ujian</li>
            <li><strong>Respons cepat:</strong> Respon cepat terhadap siswa dengan status Disconnect</li>
            <li><strong>Komunikasi:</strong> Gunakan fitur pesan untuk komunikasi dengan siswa</li>
            <li><strong>Dokumentasi:</strong> Catat semua insiden dan tindakan yang diambil</li>
            <li><strong>Filter efektif:</strong> Gunakan filter untuk fokus pada siswa yang memerlukan perhatian</li>
            <li><strong>Koordinasi:</strong> Koordinasi dengan tim teknis jika ada masalah sistem</li>
            <li><strong>Backup:</strong> Siapkan prosedur backup jika sistem gagal</li>
            <li><strong>Laporan:</strong> Buat laporan lengkap setelah ujian selesai</li>
            <li><strong>Review:</strong> Review prosedur untuk perbaikan ujian berikutnya</li>
            <li><strong>Etika:</strong> Jaga etika dan profesionalisme selama pengawasan</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Status tidak muncul:</strong>
                <span>Pastikan jadwal ujian sudah dipilih. Pastikan ujian sudah dimulai. Refresh halaman dan coba lagi.</span>
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
                <strong>Siswa tidak muncul:</strong>
                <span>Pastikan siswa sudah login. Pastikan siswa ditugaskan ke sesi yang benar. Periksa status koneksi siswa.</span>
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
                <strong>Detail tidak muncul:</strong>
                <span>Pastikan siswa sudah login. Pastikan data tersimpan. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Waktu Aktif:</strong> Status Siswa hanya aktif selama ujian berlangsung. Setelah ujian selesai, data status akan tersimpan untuk laporan.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Update Real-Time:</strong> Status siswa di-update secara real-time. Informasi yang ditampilkan selalu up-to-date dengan kondisi ujian saat ini.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Log Aktivitas:</strong> Semua aktivitas siswa dicatat dalam log untuk audit dan dokumentasi. Log dapat diakses setelah ujian selesai.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Multi-User:</strong> Beberapa pengawas dapat mengakses Status Siswa secara bersamaan untuk koordinasi yang lebih baik.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Status Siswa menggunakan endpoint monitoring untuk mengambil data status siswa secara real-time. Data diambil melalui AJAX GET dan mengembalikan respons JSON.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtjadwal/statusSiswa/{id_jadwal}</code></td><td>Tampilkan halaman status siswa</td></tr>
                <tr><td>GET</td><td><code>cbtjadwal/getStatusData/{id_jadwal}</code></td><td>Ambil data status siswa real-time</td></tr>
                <tr><td>GET</td><td><code>cbtjadwal/getSiswaDetail/{id_siswa}/{id_jadwal}</code></td><td>Ambil detail status siswa tertentu</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/kickSiswa</code></td><td>Kick out siswa dari ujian</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/resetLoginSiswa</code></td><td>Reset login siswa</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">GET <code>cbtjadwal/getStatusData/{id_jadwal}</code> — Ambil Status Real-Time</h3>
        <p>Endpoint ini menangani pengambilan data status siswa secara real-time.</p>
        <table class="table-custom">
            <thead><tr><th>Parameter URL</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "siswa": [
    { "id": 1, "nama": "Siswa A", "status": "sedang_mengerjakan", "progress": 15, "sisa_waktu": 1800 },
    { "id": 2, "nama": "Siswa B", "status": "selesai", "progress": 40, "sisa_waktu": 0 }
  ],
  "statistik": { "total": 30, "selesai": 5, "sedang": 25 }
}</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Data status di-update secara berkala (setiap 5-10 detik) untuk menjaga performa sistem.</div>
        </div>
    </div>`
};
