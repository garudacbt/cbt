if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['login-pertama'] = {
    title: 'Login',
    desc: 'Cara masuk ke sistem dan mengenali antarmuka halaman login GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-sign-in-alt"></i> Halaman Login</h2>
        <p>Halaman login adalah pintu masuk ke aplikasi GarudaCBT. Semua pengguna (admin, guru, siswa) harus login terlebih dahulu untuk mengakses fitur sesuai peran masing-masing.</p>
        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot halaman login akan ditambahkan di sini</p>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-desktop"></i> Antarmuka Login</h2>

        <h3>Form Login</h3>
        <table class="table-custom">
            <thead><tr><th>Field</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr>
                    <td><strong>Username</strong></td>
                    <td>Nama akun pengguna, minimal 5 karakter</td>
                </tr>
                <tr>
                    <td><strong>Password</strong></td>
                    <td>Kata sandi akun, minimal 5 karakter. Klik ikon <i class="fas fa-eye"></i> di ujung field untuk menampilkan/sembunyikan karakter</td>
                </tr>
                <tr>
                    <td><strong>Mode Login</strong></td>
                    <td>
                        Dropdown pilihan mode akses:
                        <ul style="margin:4px 0 0;">
                            <li><strong>Login CBT</strong> — siswa langsung diarahkan ke halaman ujian, menu E-Learning dan Rapor disembunyikan</li>
                            <li><strong>Login E-Learning &amp; CBT</strong> — dashboard lengkap dengan semua menu</li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>

        <h3 style="margin-top:16px;">Pesan Status</h3>
        <p>Area pesan di bawah tombol login menampilkan feedback secara real-time:</p>
        <table class="table-custom">
            <thead><tr><th>Warna</th><th>Kondisi</th></tr></thead>
            <tbody>
                <tr><td><span style="background:#17a2b8;color:#fff;padding:2px 8px;border-radius:3px;font-size:13px;">Biru</span></td><td>Sedang memproses login</td></tr>
                <tr><td><span style="background:#28a745;color:#fff;padding:2px 8px;border-radius:3px;font-size:13px;">Hijau</span></td><td>Login berhasil — akan redirect otomatis</td></tr>
                <tr><td><span style="background:#dc3545;color:#fff;padding:2px 8px;border-radius:3px;font-size:13px;">Merah</span></td><td>Login gagal — tampilkan pesan error</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:16px;">Background Slideshow</h3>
        <p>Halaman login menampilkan tiga gambar latar (<code>wall1.jpg</code>, <code>wall2.png</code>, <code>wall3.jpg</code>) yang berganti otomatis setiap 10 detik.</p>

        <h3 style="margin-top:16px;">Lupa Password</h3>
        <p>Tidak ada fitur self-service reset password. Administrator dapat mereset password pengguna melalui halaman <strong>Reset Password</strong> di URL <code>/reset_password</code>. Guru dan Siswa yang lupa password harus menghubungi Administrator untuk dibantu mereset.</p>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-key"></i> Reset Password</h2>

        <h3>Cara Mengakses</h3>
        <p>Hanya <strong>Administrator</strong> yang dapat mengakses halaman ini. Login terlebih dahulu sebagai Admin, lalu buka URL:</p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">http://&lt;alamat-server&gt;/reset_password</pre>
        <p>Jika belum login atau bukan Admin, akses akan ditolak:</p>
        <ul>
            <li>Belum login → diarahkan ke halaman <code>auth</code> (login)</li>
            <li>Login sebagai Guru / Siswa → muncul error <strong>403 Akses Terlarang</strong></li>
        </ul>

        <h3 style="margin-top:16px;">Form Reset Password</h3>
        <table class="table-custom">
            <thead><tr><th>Field</th><th>Aturan</th></tr></thead>
            <tbody>
                <tr>
                    <td><strong>Username</strong></td>
                    <td>Wajib diisi — harus terdaftar di database</td>
                </tr>
                <tr>
                    <td><strong>Password Baru</strong></td>
                    <td>Wajib diisi, minimal <strong>5 karakter</strong>, harus sama dengan field Konfirmasi Password</td>
                </tr>
                <tr>
                    <td><strong>Konfirmasi Password</strong></td>
                    <td>Wajib diisi — harus cocok dengan Password Baru</td>
                </tr>
            </tbody>
        </table>

        <h3 style="margin-top:16px;">Alur Proses Reset</h3>
        <ol class="step-list">
            <li><strong>Submit form</strong> — dikirim via AJAX POST ke endpoint <code>reset_password/reset</code></li>
            <li><strong>Validasi input</strong> — server memeriksa semua field (wajib diisi, panjang minimal, kecocokan password)</li>
            <li><strong>Cek username</strong> — cari username di database; jika tidak ditemukan, kembalikan error</li>
            <li><strong>Update password</strong> — password di-hash dengan <strong>bcrypt</strong> lalu disimpan ke tabel <code>users</code></li>
            <li><strong>Sinkronisasi tabel role</strong> — untuk Guru, password plaintext juga diperbarui di <code>master_guru</code>; untuk Siswa di <code>master_siswa</code></li>
            <li><strong>Kembalikan respons JSON</strong> — status berhasil atau pesan error</li>
        </ol>

        <h3 style="margin-top:16px;">Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>URL</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>reset_password</code></td><td>Tampilkan halaman form reset password</td></tr>
                <tr><td>POST</td><td><code>reset_password/reset</code></td><td>Proses reset, kembalikan JSON</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:16px;">Struktur Respons JSON</h3>
        <p><strong>Reset berhasil:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": true,
  "message": ""
}</pre>

        <p style="margin-top:12px;"><strong>Gagal — username tidak terdaftar:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": false,
  "message": "Username tidak terdaftar!"
}</pre>

        <p style="margin-top:12px;"><strong>Gagal — validasi input:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": false,
  "errors": {
    "username": "...",
    "password": "...",
    "confirm_password": "..."
  }
}</pre>

        <p style="margin-top:12px;"><strong>Gagal — error saat update database:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": false,
  "message": "Reset password gagal!"
}</pre>

        <h3 style="margin-top:16px;">Pembaruan per Role</h3>
        <table class="table-custom">
            <thead><tr><th>Role</th><th>Tabel yang Diperbarui</th><th>Format Password</th></tr></thead>
            <tbody>
                <tr><td>Admin (<code>group_id = 1</code>)</td><td><code>users</code></td><td>bcrypt hash</td></tr>
                <tr><td>Guru (<code>group_id = 2</code>)</td><td><code>users</code> + <code>master_guru</code></td><td>bcrypt hash + plaintext</td></tr>
                <tr><td>Siswa (<code>group_id = 3</code>)</td><td><code>users</code> + <code>master_siswa</code></td><td>bcrypt hash + plaintext</td></tr>
            </tbody>
        </table>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <ul style="margin-bottom:0;">
                    <li>Hanya Administrator yang dapat mengakses halaman ini. Guru dan Siswa tidak memiliki akses.</li>
                    <li>Tidak ada verifikasi identitas tambahan (email/OTP) — gunakan fitur ini hanya di jaringan internal sekolah.</li>
                    <li>Untuk Guru dan Siswa, password plaintext juga ikut diperbarui di tabel <code>master_guru</code> / <code>master_siswa</code>.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API Login</h2>

        <h3>Alur Proses</h3>
        <ol class="step-list">
            <li><strong>Submit form</strong> — dikirim via AJAX POST ke endpoint <code>auth/login</code></li>
            <li><strong>Validasi input</strong> — server memeriksa username &amp; password (panjang, tidak kosong)</li>
            <li><strong>Rate limiting</strong> — cek apakah username sudah gagal login 3x dalam 5 menit terakhir</li>
            <li><strong>Cari user</strong> — cari username di database, periksa status aktif</li>
            <li><strong>Verifikasi password</strong> — cocokkan input dengan hash bcrypt di database</li>
            <li><strong>Buat sesi</strong> — simpan data user ke session CodeIgniter</li>
            <li><strong>Catat log</strong> — aktivitas login berhasil dicatat ke tabel log</li>
            <li><strong>Redirect</strong> — arahkan ke halaman sesuai mode login dan role pengguna</li>
        </ol>

        <h3 style="margin-top:16px;">Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>URL</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>auth</code></td><td>Tampilkan halaman login</td></tr>
                <tr><td>POST</td><td><code>auth/login</code></td><td>Proses autentikasi, kembalikan JSON</td></tr>
                <tr><td>GET</td><td><code>auth/logout</code></td><td>Hapus sesi dan redirect ke login</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:16px;">Struktur Respons JSON</h3>
        <p><strong>Login berhasil:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "success": true,
  "message": "Login berhasil",
  "error": {},
  "role": "1",
  "user": { "id": "123", "username": "admin", "nama_lengkap": "Administrator" }
}</pre>

        <p style="margin-top:12px;"><strong>Login gagal — username/password salah:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "success": false,
  "message": "Username atau Password salah!",
  "error": { "username": "Username wajib diisi", "password": "" },
  "role": "0",
  "user": null
}</pre>

        <p style="margin-top:12px;"><strong>Login gagal — rate limiting (3x percobaan):</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "success": false,
  "message": "Anda sudah 3x melakukan percobaan login. Silakan tunggu 5 menit atau hubungi Administrator.",
  "error": {},
  "role": "0",
  "user": null
}</pre>

        <p style="margin-top:12px;"><strong>Login gagal — akun nonaktif:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "success": false,
  "message": "Akun Anda dinonaktifkan!",
  "error": {},
  "role": "0",
  "user": null
}</pre>

        <h3 style="margin-top:16px;">Logika Redirect Setelah Login</h3>
        <table class="table-custom">
            <thead><tr><th>Mode Login</th><th>Role</th><th>Redirect ke</th></tr></thead>
            <tbody>
                <tr><td>CBT-only (<code>'1'</code>)</td><td>Siswa (<code>role = 3</code>)</td><td><code>cbtsiswa/cbt</code> — langsung ke halaman ujian</td></tr>
                <tr><td>CBT-only (<code>'1'</code>)</td><td>Admin / Guru</td><td>Dashboard utama (<code>base_url</code>)</td></tr>
                <tr><td>E-Learning &amp; CBT (<code>'0'</code>)</td><td>Semua role</td><td>Dashboard utama (<code>base_url</code>)</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:16px;">Data Sesi yang Disimpan</h3>
        <table class="table-custom">
            <thead><tr><th>Key</th><th>Isi</th></tr></thead>
            <tbody>
                <tr><td><code>user_id</code></td><td>ID user dari database</td></tr>
                <tr><td><code>username</code></td><td>Username yang login</td></tr>
                <tr><td><code>role</code></td><td>Group ID user (numerik)</td></tr>
                <tr><td><code>role_name</code></td><td>Nama role</td></tr>
                <tr><td><code>is_login</code></td><td>Flag <code>true</code> — digunakan untuk cek autentikasi di setiap halaman</td></tr>
            </tbody>
        </table>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-shield-alt"></i> Keamanan</h2>

        <h3>Rate Limiting</h3>
        <ul>
            <li>Setelah <strong>3 kali gagal</strong> login untuk username yang sama, akun dikunci sementara <strong>5 menit</strong></li>
            <li>Data percobaan disimpan per username + IP address + timestamp</li>
            <li>Setelah 5 menit berlalu, percobaan direset otomatis</li>
        </ul>

        <h3>Password Hashing (Bcrypt)</h3>
        <ul>
            <li>Password disimpan sebagai hash bcrypt — tidak bisa di-reverse</li>
            <li>Verifikasi menggunakan <code>password_verify()</code> PHP bawaan</li>
        </ul>

        <h3>CSRF Protection</h3>
        <ul>
            <li>Token CSRF disertakan di setiap form POST</li>
            <li>Token berlaku ~30 jam (<code>csrf_expire = 9000 × 12</code> detik)</li>
            <li>Token tidak diregenerasi tiap submit agar AJAX tetap berfungsi</li>
        </ul>

        <h3>Session</h3>
        <ul>
            <li>Driver: file di <code>application/cache/sessions/</code></li>
            <li>Timeout: <strong>24 jam</strong> tidak aktif</li>
            <li>Session diikat ke IP address — jika IP berubah, sesi langsung invalid</li>
            <li>Session ID diperbarui otomatis setiap 1 jam</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <ul style="margin-bottom:0;">
                    <li>Login gagal 3x = terkunci 5 menit. Tunggu atau minta Administrator mereset percobaan.</li>
                    <li>Jika IP berubah di tengah sesi (misalnya pindah jaringan), pengguna harus login ulang.</li>
                    <li>Di lab komputer, selalu <strong>logout</strong> setelah selesai agar sesi tidak bisa dipakai orang lain.</li>
                </ul>
            </div>
        </div>
    </div>
    `
};
