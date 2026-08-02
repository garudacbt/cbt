if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['persyaratan-sistem'] = {
    title: 'Persyaratan Sistem',
    desc: 'Spesifikasi minimum dan yang disarankan untuk menjalankan GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-desktop"></i> Persyaratan Perangkat Keras</h2>
        <table class="table-custom">
            <thead><tr><th>Komponen</th><th>Minimum</th><th>Disarankan</th></tr></thead>
            <tbody>
                <tr><td>Prosesor</td><td>Dual-core 1.6 GHz</td><td>Quad-core 2.5 GHz atau lebih tinggi</td></tr>
                <tr><td>RAM</td><td>4 GB</td><td>8 GB atau lebih</td></tr>
                <tr><td>Ruang Disk</td><td>5 GB tersedia</td><td>20 GB tersedia (untuk upload file &amp; backup)</td></tr>
                <tr><td>Resolusi Layar</td><td>1280 x 720</td><td>1920 x 1080 atau lebih tinggi</td></tr>
            </tbody>
        </table>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-globe"></i> Persyaratan Perangkat Lunak (Server)</h2>
        <table class="table-custom">
            <thead><tr><th>Perangkat Lunak</th><th>Versi Minimum</th><th>Catatan</th></tr></thead>
            <tbody>
                <tr><td>PHP</td><td>7.3</td><td>Diuji hingga PHP 8.x — disarankan PHP 7.4 atau 8.1</td></tr>
                <tr><td>MySQL</td><td>5.7</td><td>Database utama aplikasi</td></tr>
                <tr><td>MariaDB</td><td>10.2</td><td>Alternatif MySQL yang kompatibel penuh</td></tr>
                <tr><td>Apache</td><td>2.4</td><td>Harus mengaktifkan <code>mod_rewrite</code></td></tr>
                <tr><td>Nginx</td><td>1.18</td><td>Alternatif Apache, perlu konfigurasi rewrite manual</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px"><i class="fas fa-puzzle-piece"></i> Ekstensi PHP yang Dibutuhkan</h3>
        <p>Ekstensi berikut wajib aktif di server. Periksa via <code>phpinfo()</code> atau <code>php -m</code>.</p>
        <table class="table-custom">
            <thead><tr><th>Ekstensi</th><th>Kegunaan</th></tr></thead>
            <tbody>
                <tr><td><code>mysqli</code></td><td>Koneksi ke database MySQL/MariaDB</td></tr>
                <tr><td><code>gd</code></td><td>Pemrosesan gambar (foto siswa, logo sekolah)</td></tr>
                <tr><td><code>curl</code></td><td>HTTP request (update, integrasi eksternal)</td></tr>
                <tr><td><code>zip</code></td><td>Kompresi file backup dan export</td></tr>
                <tr><td><code>json</code></td><td>Parsing dan enkoding data JSON (API internal)</td></tr>
                <tr><td><code>dom</code></td><td>Pemrosesan dokumen XML/HTML</td></tr>
                <tr><td><code>fileinfo</code></td><td>Deteksi tipe file saat upload</td></tr>
                <tr><td><code>iconv</code></td><td>Konversi encoding karakter</td></tr>
                <tr><td><code>calendar</code></td><td>Fungsi kalender PHP</td></tr>
                <tr><td><code>libxml</code></td><td>Parsing XML untuk export dokumen</td></tr>
                <tr><td><code>mbstring</code></td><td>Penanganan string multibyte (karakter Indonesia)</td></tr>
            </tbody>
        </table>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Pada paket hosting seperti XAMPP, Laragon, atau cPanel, sebagian besar ekstensi ini sudah aktif secara default.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-server"></i> Konfigurasi Web Server</h2>

        <h3><i class="fas fa-chevron-right"></i> Apache</h3>
        <p>GarudaCBT menggunakan URL rewriting. Pastikan <code>mod_rewrite</code> aktif dan file <code>.htaccess</code> di root aplikasi berisi:</p>
        <pre style="background:#f4f4f4; padding:12px; border-radius:4px; font-size:13px;">RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]</pre>
        <div class="info-box warning" style="margin-top:12px;">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Pastikan <code>AllowOverride All</code> sudah diset pada konfigurasi virtual host Apache agar <code>.htaccess</code> berfungsi.</div>
        </div>

        <h3 style="margin-top:24px;"><i class="fas fa-chevron-right"></i> Nginx</h3>
        <p>Nginx tidak membaca <code>.htaccess</code>, sehingga konfigurasi rewrite harus ditulis langsung di blok <code>server</code>. Contoh konfigurasi virtual host untuk GarudaCBT:</p>
        <pre style="background:#f4f4f4; padding:12px; border-radius:4px; font-size:13px;">server {
    listen 80;
    server_name example.com;
    root /var/www/garudacbt;
    index index.php index.html;

    # URL rewriting — pengganti .htaccess CodeIgniter
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # Proses file PHP via PHP-FPM
    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass unix:/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    # Blokir akses ke direktori sensitif
    location ~ ^/(application|system|\.git) {
        deny all;
        return 404;
    }

    # Cache aset statis
    location ~* \.(js|css|png|jpg|jpeg|gif|ico|svg|woff2?)$ {
        expires 30d;
        add_header Cache-Control "public, no-transform";
    }
}</pre>
        <div class="info-box info" style="margin-top:12px;">
            <i class="fas fa-info-circle"></i>
            <div>Sesuaikan <code>fastcgi_pass</code> dengan versi PHP-FPM yang terinstall, misalnya <code>php7.4-fpm.sock</code> atau <code>php8.1-fpm.sock</code>. Ganti <code>example.com</code> dengan domain atau IP server Anda.</div>
        </div>
        <div class="info-box warning" style="margin-top:12px;">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Setelah mengubah konfigurasi Nginx, jalankan <code>nginx -t</code> untuk memvalidasi sintaks, lalu <code>systemctl reload nginx</code> untuk menerapkan perubahan.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-laptop"></i> Browser yang Didukung</h2>
        <table class="table-custom">
            <thead><tr><th>Browser</th><th>Versi Minimum</th><th>Catatan</th></tr></thead>
            <tbody>
                <tr><td><i class="fab fa-chrome"></i> Google Chrome</td><td>90+</td><td>Browser utama yang direkomendasikan</td></tr>
                <tr><td><i class="fab fa-firefox"></i> Mozilla Firefox</td><td>88+</td><td>Didukung penuh</td></tr>
                <tr><td><i class="fab fa-edge"></i> Microsoft Edge</td><td>90+</td><td>Berbasis Chromium, kompatibel penuh</td></tr>
                <tr><td><i class="fab fa-safari"></i> Safari</td><td>14+</td><td>Didukung untuk akses siswa (iPad/Mac)</td></tr>
            </tbody>
        </table>
        <div class="info-box warning" style="margin-top:12px;">
            <i class="fas fa-exclamation-triangle"></i>
            <div><strong>Internet Explorer tidak didukung.</strong> Gunakan browser modern di atas untuk pengalaman terbaik.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-network-wired"></i> Persyaratan Jaringan</h2>
        <ul>
            <li>Untuk penggunaan <strong>lokal (LAN)</strong>: server dan client cukup terhubung dalam satu jaringan, tanpa koneksi internet.</li>
            <li>Untuk penggunaan <strong>online (hosting)</strong>: diperlukan SSL/TLS certificate (HTTPS) untuk keamanan data.</li>
            <li>Modul <strong>CBT offline mode</strong>: siswa cukup terhubung ke server lokal, tidak perlu koneksi internet setelah halaman dimuat.</li>
            <li>Bandwidth yang disarankan per client saat ujian: minimal <strong>512 Kbps</strong>.</li>
        </ul>
    </div>
    `
};
