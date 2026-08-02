if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['pengawas'] = {
    title: 'Pengawas Ujian',
    desc: 'Panduan lengkap peran dan fungsi pengawas dalam pelaksanaan CBT di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-user-shield"></i> Pengawas Ujian</h2>
        <p>Pengawas ujian bertugas memantau pelaksanaan ujian untuk memastikan kelancaran dan kejujuran ujian. Pengawas memiliki peran krusial dalam menjamin integritas ujian dan membantu siswa yang mengalami masalah teknis selama ujian berlangsung.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Peran Pengawas Ujian</h3>
        <p>Pengawas ujian memiliki beberapa peran penting dalam pelaksanaan CBT:</p>
        <ul class="step-list">
            <li><strong>Distribusi Token:</strong> Membagikan token kepada siswa sebelum ujian dimulai</li>
            <li><strong>Monitoring:</strong> Memantau aktivitas siswa selama ujian secara real-time</li>
            <li><strong>Troubleshooting:</strong> Membantu siswa yang mengalami masalah teknis</li>
            <li><strong>Keamanan:</strong> Memastikan tidak ada kecurangan selama ujian</li>
            <li><strong>Manajemen Waktu:</strong> Mengatur dan memperpanjang waktu ujian jika diperlukan</li>
            <li><strong>Laporan:</strong> Membuat laporan aktivitas dan insiden selama ujian</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Pengawas harus memahami sistem monitoring sebelum ujian dimulai untuk meminimalkan gangguan saat ujian berlangsung.</div>
        </div>
        <hr>
        <h3>🠊 Mengakses Dashboard Pengawas</h3>
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
        <h3>🠊 Dashboard Monitoring Real-Time</h3>
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
        <h3>🠊 Aksi yang Dapat Dilakukan Pengawas</h3>
        <p>Pengawas dapat melakukan berbagai aksi dari dashboard monitoring:</p>
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
        <h3>🠊 Reset Token untuk Siswa</h3>
        <ol class="step-list">
            <li>Pada dashboard monitoring, cari siswa yang perlu reset token</li>
            <li>Klik tombol <code class="inline">Reset Token</code> pada siswa tersebut</li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Token baru akan di-generate untuk siswa tersebut</li>
            <li>Bagikan token baru kepada siswa</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Reset token akan memutus koneksi siswa yang sedang mengerjakan</li>
                    <li>Jawaban yang belum disimpan akan hilang</li>
                    <li>Gunakan reset hanya jika siswa benar-benar terputus</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Perpanjangan Waktu Ujian</h3>
        <ol class="step-list">
            <li>Pada dashboard monitoring, cari siswa yang perlu perpanjangan waktu</li>
            <li>Klik tombol <code class="inline">Perpanjang Waktu</code> pada siswa tersebut</li>
            <li>Masukkan durasi perpanjangan (dalam menit)</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Waktu siswa akan diperpanjang sesuai durasi yang dimasukkan</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Perpanjangan waktu berguna untuk siswa yang mengalami gangguan teknis atau keadaan darurat. Dokumentasikan alasan perpanjangan untuk laporan.</div>
        </div>
        <hr>
        <h3>🠊 Mengirim Pesan ke Siswa</h3>
        <ol class="step-list">
            <li>Pada dashboard monitoring, klik tombol <code class="inline">Kirim Pesan</code></li>
            <li>Pilih penerima pesan:
                <ul class="step-list">
                    <li>Siswa tertentu: Pilih siswa dari daftar</li>
                    <li>Semua siswa: Kirim ke semua siswa yang sedang mengerjakan</li>
                </ul>
            </li>
            <li>Ketik pesan yang ingin dikirim</li>
            <li>Klik tombol <code class="inline">Kirim</code></li>
            <li>Pesan akan ditampilkan di layar siswa</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan fitur pesan untuk memberikan pengumuman penting atau instruksi selama ujian berlangsung tanpa mengganggu siswa lain.</div>
        </div>
        <hr>
        <h3>🠊 Force Submit Jawaban</h3>
        <ol class="step-list">
            <li>Pada dashboard monitoring, cari siswa yang perlu force submit</li>
            <li>Klik tombol <code class="inline">Force Submit</code> pada siswa tersebut</li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Jawaban siswa akan disubmit secara otomatis</li>
            <li>Siswa tidak dapat melanjutkan ujian</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Force submit tidak dapat dibatalkan</li>
                    <li>Siswa tidak dapat melanjutkan ujian setelah force submit</li>
                    <li>Gunakan force submit hanya jika diperlukan (misal: waktu habis)</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices untuk Pengawas</h3>
        <ol class="step-list">
            <li><strong>Persiapan:</strong> Pelajari sistem monitoring sebelum ujian dimulai</li>
            <li><strong>Komunikasi:</strong> Komunikasikan prosedur kepada siswa sebelum ujian</li>
            <li><strong>Monitoring aktif:</strong> Monitor dashboard secara aktif selama ujian</li>
            <li><strong>Respons cepat:</strong> Respon cepat terhadap masalah yang muncul</li>
            <li><strong>Dokumentasi:</strong> Catat semua insiden dan tindakan yang diambil</li>
            <li><strong>Komunikasi dengan tim:</strong> Koordinasi dengan tim teknis jika ada masalah sistem</li>
            <li><strong>Backup:</strong> Siapkan prosedur backup jika sistem gagal</li>
            <li><strong>Etika:</strong> Jaga etika dan profesionalisme selama pengawasan</li>
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
                <strong>Reset token gagal:</strong>
                <span>Pastikan siswa masih dalam sistem. Pastikan tidak ada error koneksi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Pesan tidak terkirim:</strong>
                <span>Pastikan siswa masih terhubung ke sistem. Periksa koneksi internet siswa. Coba kirim ulang.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Force submit gagal:</strong>
                <span>Pastikan siswa masih dalam sistem. Pastikan siswa belum submit secara manual. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul di dashboard:</strong>
                <span>Pastikan siswa sudah login. Pastikan siswa ditugaskan ke sesi yang benar. Periksa status koneksi siswa.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Terbatas:</strong> Hanya Administrator, Guru, dan Pengawas yang memiliki akses ke dashboard monitoring. Siswa tidak memiliki akses ke fitur ini.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Waktu Aktif:</strong> Dashboard monitoring hanya aktif selama ujian berlangsung. Setelah ujian selesai, data monitoring akan tersimpan untuk laporan.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Log Aktivitas:</strong> Semua aksi yang dilakukan pengawas akan dicatat dalam log aktivitas untuk audit dan dokumentasi.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Multi-Pengawas:</strong> Beberapa pengawas dapat mengakses dashboard monitoring secara bersamaan untuk koordinasi yang lebih baik.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Pengawas Ujian menggunakan endpoint monitoring untuk memantau dan mengontrol ujian secara real-time. Semua operasi menggunakan AJAX POST dan mengembalikan respons JSON.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtjadwal/monitoring/{id_jadwal}</code></td><td>Tampilkan dashboard monitoring ujian</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/resetToken</code></td><td>Reset token untuk siswa tertentu</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/tambahWaktu</code></td><td>Tambah waktu ujian untuk siswa tertentu</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/kirimPesan</code></td><td>Kirim pesan ke siswa</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/forceSubmit</code></td><td>Paksa submit jawaban siswa</td></tr>
                <tr><td>GET</td><td><code>cbtjadwal/getMonitoringData/{id_jadwal}</code></td><td>Ambil data monitoring real-time</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtjadwal/resetToken</code> — Reset Token</h3>
        <p>Endpoint ini menangani operasi reset token untuk siswa yang terputus atau mengalami masalah login.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_siswa</code></td><td>Ya</td><td>ID siswa yang akan di-reset token</td></tr>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "token": "ABC123" }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtjadwal/tambahWaktu</code> — Tambah Waktu</h3>
        <p>Endpoint ini menangani operasi perpanjangan waktu ujian untuk siswa tertentu.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_siswa</code></td><td>Ya</td><td>ID siswa yang akan ditambah waktu</td></tr>
                <tr><td><code>menit</code></td><td>Ya</td><td>Durasi perpanjangan (menit)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "Waktu berhasil ditambah" }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Semua aksi pengawas dicatat dalam log aktivitas untuk audit dan dokumentasi.</div>
        </div>
    </div>`
};
