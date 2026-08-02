if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['token-cbt'] = {
    title: 'Token CBT',
    desc: 'Panduan lengkap mengelola token untuk akses ujian di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-key"></i> Token Ujian CBT</h2>
        <p>Token adalah kode akses yang harus dimasukkan siswa untuk dapat mengikuti ujian. Token berfungsi sebagai keamanan dan kontrol akses ujian, memastikan hanya siswa yang berhak yang dapat mengakses ujian pada waktu yang ditentukan.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Token Ujian</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Token CBT</code></li>
            <li>Halaman Token Ujian akan ditampilkan dengan daftar token yang ada</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Token terikat ke sesi ujian. Pastikan sesi ujian sudah dibuat dan kelas sudah ditugaskan sebelum generate token.</div>
        </div>
        <hr>
        <h3>🠊 Generate Token Ujian</h3>
        <ol class="step-list">
            <li>Pada halaman Token Ujian, klik tombol <code class="inline">Generate Token</code></li>
            <li>Modal generate token akan ditampilkan</li>
            <li>Pilih jadwal ujian yang akan diberi token</li>
            <li>Pilih sesi ujian yang akan diberi token</li>
            <li>Klik tombol <code class="inline">Generate</code></li>
            <li>Token akan dibuat dan ditampilkan di layar</li>
            <li>Salin atau catat token untuk dibagikan kepada siswa</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Token biasanya terdiri dari 6-8 karakter alfanumerik. Sistem akan generate token secara acak untuk keamanan maksimal.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Status Token</h3>
        <ol class="step-list">
            <li><strong>Abu-abu (text-muted):</strong> Token belum aktif atau sudah expired</li>
            <li><strong>Hijau (text-success):</strong> Token aktif dan siap digunakan</li>
            <li><strong>Kuning (text-yellow):</strong> Token sedang digunakan oleh siswa</li>
            <li><strong>Merah (text-danger):</strong> Token expired atau dibatalkan</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Token hanya valid pada waktu sesi yang ditentukan</li>
                    <li>Token akan expired setelah sesi selesai</li>
                    <li>Token yang sudah digunakan tidak dapat dihapus</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Reset Token Ujian</h3>
        <ol class="step-list">
            <li>Pada halaman Token Ujian, cari token yang ingin di-reset</li>
            <li>Klik tombol <code class="inline">Reset Token</code> pada token tersebut</li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Token baru akan di-generate untuk menggantikan token lama</li>
            <li>Token lama tidak akan lagi valid</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Reset token akan membuat token lama tidak valid</li>
                    <li>Siswa yang sedang menggunakan token lama akan terputus</li>
                    <li>Gunakan reset hanya jika benar-benar diperlukan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Token</h3>
        <ul class="step-list">
            <li><strong>Unik per Sesi:</strong> Setiap sesi memiliki token yang berbeda</li>
            <li><strong>Validitas Waktu:</strong> Token hanya valid pada waktu sesi yang ditentukan</li>
            <li><strong>Single Use:</strong> Token dapat digunakan oleh banyak siswa dalam sesi yang sama</li>
            <li><strong>Auto-Expire:</strong> Token akan expired setelah sesi selesai</li>
            <li><strong>Reset Capability:</strong> Token dapat di-reset jika terjadi masalah</li>
            <li><strong>Case Sensitive:</strong> Token bersifat case-sensitive (huruf besar dan kecil berbeda)</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Penting:</strong> Token bersifat case-sensitive. Pastikan siswa memasukkan token dengan benar, termasuk huruf besar dan kecil.</div>
        </div>
        <hr>
        <h3>🠊 Distribusi Token ke Siswa</h3>
        <ol class="step-list">
            <li>Generate token untuk sesi ujian</li>
            <li>Salin atau catat token yang di-generate</li>
            <li>Bagikan token kepada siswa melalui:
                <ul class="step-list">
                    <li>Papan tulis di ruang ujian</li>
                    <li>Grup WhatsApp atau komunikasi kelas</li>
                    <li>Email resmi sekolah</li>
                    <li>Cetak dan bagikan secara fisik</li>
                </ul>
            </li>
            <li>Pastikan semua siswa menerima token sebelum sesi dimulai</li>
            <li>Instruksikan siswa untuk memasukkan token dengan benar</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Bagikan token 10-15 menit sebelum sesi dimulai untuk memberikan waktu bagi siswa mempersiapkan diri. Jangan bagikan token terlalu jauh hari sebelum ujian.</div>
        </div>
        <hr>
        <h3>🠊 Filter Token Ujian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter</code> untuk memfilter berdasarkan:
                <ul class="step-list">
                    <li>Semua: Menampilkan semua token</li>
                    <li>Jadwal: Filter berdasarkan jadwal ujian</li>
                    <li>Sesi: Filter berdasarkan sesi ujian</li>
                    <li>Status: Filter berdasarkan status token</li>
                </ul>
            </li>
            <li>Pilih filter yang diinginkan</li>
            <li>Dropdown tambahan akan muncul sesuai filter yang dipilih</li>
            <li>Tabel akan menampilkan token sesuai filter</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk menemukan token tertentu dengan cepat, terutama jika jumlah token sangat banyak.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Generate tepat waktu:</strong> Generate token mendekati waktu ujian untuk keamanan</li>
            <li><strong>Distribusi terkontrol:</strong> Bagikan token hanya kepada siswa yang berhak</li>
            <li><strong>Verifikasi token:</strong> Pastikan token valid sebelum dibagikan</li>
            <li><strong>Backup token:</strong> Catat token di tempat aman sebagai backup</li>
            <li><strong>Komunikasi jelas:</strong> Instruksikan siswa cara memasukkan token dengan benar</li>
            <li><strong>Monitoring penggunaan:</strong> Monitor penggunaan token selama ujian</li>
            <li><strong>Reset hati-hati:</strong> Gunakan reset token hanya jika diperlukan</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan prosedur distribusi token</li>
            <li><strong>Testing:</strong> Uji coba proses token sebelum ujian sebenarnya</li>
            <li><strong>Keamanan:</strong> Jangan bagikan token melalui channel yang tidak aman</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa generate token:</strong>
                <span>Pastikan jadwal ujian sudah dibuat. Pastikan sesi ujian sudah dibuat. Pastikan kelas sudah ditugaskan ke sesi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Token tidak valid:</strong>
                <span>Pastikan token dimasukkan dengan benar (case-sensitive). Pastikan token masih dalam masa validitas. Pastikan sesi ujian sedang aktif.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak bisa mengakses ujian:</strong>
                <span>Pastikan token sudah dibagikan. Pastikan token valid dan sesi aktif. Pastikan siswa ditugaskan ke sesi yang benar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Token expired:</strong>
                <span>Token akan expired setelah sesi selesai. Generate token baru jika perlu memperpanjang waktu ujian atau untuk sesi tambahan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Reset token gagal:</strong>
                <span>Pastikan token masih ada dalam sistem. Pastikan tidak ada error koneksi. Coba refresh halaman dan ulangi proses.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Token salah dimasukkan:</strong>
                <span>Instruksikan siswa untuk memeriksa kembali token. Pastikan huruf besar dan kecil sesuai. Berikan token baru jika perlu.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan:</strong> Token terikat ke sesi ujian. Perubahan pada sesi akan mempengaruhi validitas token.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Keamanan:</strong> Token adalah mekanisme keamanan penting. Jangan bagikan token kepada pihak yang tidak berhak.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Validitas Waktu:</strong> Token hanya valid pada waktu sesi yang ditentukan. Siswa tidak dapat mengakses ujian di luar waktu sesi.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Case Sensitive:</strong> Token bersifat case-sensitive. Pastikan siswa memasukkan token dengan benar, termasuk huruf besar dan kecil.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Semua operasi Token CBT menggunakan AJAX POST ke controller <code>Cbtjadwal</code> dan mengembalikan respons JSON. Administrator dan Guru memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtjadwal/token</code></td><td>Tampilkan halaman token ujian</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/generateToken</code></td><td>Generate token baru untuk sesi ujian</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/resetToken</code></td><td>Reset token untuk sesi ujian</td></tr>
                <tr><td>GET</td><td><code>cbtjadwal/getToken/{id_jadwal}/{id_sesi}</code></td><td>Ambil token berdasarkan jadwal dan sesi</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtjadwal/generateToken</code> — Generate Token</h3>
        <p>Endpoint ini menangani operasi generate token baru untuk sesi ujian.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
                <tr><td><code>id_sesi</code></td><td>Ya</td><td>ID sesi ujian</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "token": "ABC123XY", "message": "Token berhasil di-generate" }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtjadwal/resetToken</code> — Reset Token</h3>
        <p>Endpoint ini menangani operasi reset token untuk sesi ujian.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
                <tr><td><code>id_sesi</code></td><td>Ya</td><td>ID sesi ujian</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "token": "NEW456AB", "message": "Token berhasil di-reset" }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Token di-generate secara acak dengan panjang 6-8 karakter alfanumerik. Token lama akan menjadi tidak valid setelah reset.</div>
        </div>
    </div>`
};
