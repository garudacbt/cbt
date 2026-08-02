if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['instalasi'] = {
    title: 'Instalasi',
    desc: 'Langkah-langkah instalasi GarudaCBT di berbagai environment.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-download"></i> Metode Instalasi</h2>
        <p>GarudaCBT dapat diinstal di berbagai lingkungan. Pilih metode yang sesuai dengan kebutuhan infrastruktur Anda.</p>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>Sebelum instalasi, pastikan server Anda memenuhi <a href="#/persyaratan-sistem">persyaratan sistem</a> — PHP &ge;7.3, MySQL/MariaDB, Apache/Nginx, dan ekstensi PHP yang dibutuhkan.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-file-archive"></i> Download GarudaCBT</h2>
        <ol class="step-list">
            <li>Unduh file rilis terbaru dari <a href="https://github.com/garudacbt/cbt" target="_blank"><i class="fab fa-github"></i> GitHub GarudaCBT</a></li>
            <li>Extract file ZIP ke folder yang diinginkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Anda juga bisa clone langsung via Git: <code>git clone https://github.com/garudacbt/cbt.git garudacbt</code></div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-laptop"></i> Metode 1: XAMPP / Laragon (Lokal Windows)</h2>
        <p>Metode paling mudah untuk penggunaan lokal atau jaringan LAN di lingkungan sekolah.</p>
        <ol class="step-list">
            <li>Install <strong>XAMPP</strong> atau <strong>Laragon</strong>, lalu jalankan Apache dan MySQL</li>
            <li>Extract/pindahkan folder GarudaCBT ke:
                <ul>
                    <li>XAMPP: <code class="inline">C:/xampp/htdocs/garudacbt</code></li>
                    <li>Laragon: <code class="inline">C:/laragon/www/garudacbt</code></li>
                </ul>
            </li>
            <li>Buka browser dan akses <code class="inline">http://localhost/garudacbt/installer</code></li>
            <li>Isi parameter database dan klik <strong>INSTALL / UPDATE</strong></li>
            <li>Ikuti wizard hingga selesai, lalu lanjut ke <code class="inline">/init</code></li>
        </ol>
        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Pastikan <code>mod_rewrite</code> sudah diaktifkan di Apache dan opsi <code>AllowOverride All</code> sudah diset agar URL routing berfungsi.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-server"></i> Metode 2: VPS / Linux Server (Ubuntu/Debian)</h2>
        <p>Panduan lengkap untuk deployment di VPS (Virtual Private Server) dengan Ubuntu 20.04/22.04 atau Debian. Cocok untuk penggunaan online yang diakses dari internet.</p>

        <h3><i class="fas fa-shield-alt"></i> Persiapan Awal VPS</h3>
        <p>Login ke VPS via SSH, lalu lakukan konfigurasi dasar keamanan:</p>
        <div class="code-block">
            <span class="code-label">bash</span>
            <span class="cm"># Update sistem</span><br>
            sudo apt update &amp;&amp; sudo apt upgrade -y<br><br>
            <span class="cm"># (Opsional) Buat user non-root jika belum ada</span><br>
            sudo adduser deployer<br>
            sudo usermod -aG sudo deployer<br><br>
            <span class="cm"># Konfigurasi firewall dasar</span><br>
            sudo ufw allow OpenSSH<br>
            sudo ufw allow 80/tcp<br>
            sudo ufw allow 443/tcp<br>
            sudo ufw enable
        </div>

        <h3 style="margin-top:20px;"><i class="fas fa-puzzle-piece"></i> Langkah 1: Install LAMP Stack</h3>
        <div class="code-block">
            <span class="code-label">bash</span>
            <span class="cm"># Install Apache, MySQL, PHP beserta ekstensi yang dibutuhkan</span><br>
            sudo apt install -y apache2 mysql-server \<br>
            &nbsp;&nbsp;php php-mysqli php-gd php-curl php-zip \<br>
            &nbsp;&nbsp;php-mbstring php-json php-dom php-fileinfo \<br>
            &nbsp;&nbsp;php-iconv php-calendar php-xml libapache2-mod-php<br><br>
            <span class="cm"># Aktifkan mod_rewrite untuk URL routing CodeIgniter</span><br>
            sudo a2enmod rewrite<br>
            sudo systemctl restart apache2<br><br>
            <span class="cm"># Verifikasi versi PHP (harus >= 7.3)</span><br>
            php -v
        </div>

        <h3 style="margin-top:20px;"><i class="fas fa-database"></i> Langkah 2: Konfigurasi MySQL</h3>
        <div class="code-block">
            <span class="code-label">bash</span>
            <span class="cm"># Jalankan wizard keamanan MySQL</span><br>
            sudo mysql_secure_installation<br><br>
            <span class="cm"># Masuk ke MySQL sebagai root</span><br>
            sudo mysql -u root -p<br>
        </div>
        <p style="margin-top:8px;">Setelah masuk ke MySQL, jalankan perintah berikut:</p>
        <div class="code-block">
            <span class="code-label">sql</span>
            <span class="cm">-- Buat database dan user khusus untuk GarudaCBT</span><br>
            CREATE DATABASE garudacbt CHARACTER SET utf8 COLLATE utf8_general_ci;<br>
            CREATE USER 'garuda_user'@'localhost' IDENTIFIED BY 'password_kuat_disini';<br>
            GRANT ALL PRIVILEGES ON garudacbt.* TO 'garuda_user'@'localhost';<br>
            FLUSH PRIVILEGES;<br>
            EXIT;
        </div>
        <div class="info-box warning" style="margin-top:10px;">
            <i class="fas fa-exclamation-triangle"></i>
            <div>Ganti <code>password_kuat_disini</code> dengan password yang kuat. Jangan gunakan user <code>root</code> untuk koneksi aplikasi di produksi.</div>
        </div>

        <h3 style="margin-top:20px;"><i class="fas fa-code-branch"></i> Langkah 3: Deploy File Aplikasi</h3>
        <div class="code-block">
            <span class="code-label">bash</span>
            <span class="cm"># Masuk ke direktori web</span><br>
            cd /var/www<br><br>
            <span class="cm"># Clone dari GitHub (atau upload via SFTP/SCP)</span><br>
            sudo git clone https://github.com/garudacbt/cbt.git garudacbt<br><br>
            <span class="cm"># Set kepemilikan file ke user Apache</span><br>
            sudo chown -R www-data:www-data /var/www/garudacbt<br><br>
            <span class="cm"># Set permission — direktori 755, file 644</span><br>
            sudo find /var/www/garudacbt -type d -exec chmod 755 {} \;<br>
            sudo find /var/www/garudacbt -type f -exec chmod 644 {} \;<br><br>
            <span class="cm"># Direktori yang harus writable oleh web server</span><br>
            sudo chmod -R 777 /var/www/garudacbt/application/cache<br>
            sudo chmod -R 777 /var/www/garudacbt/uploads<br>
            sudo chmod 666 /var/www/garudacbt/application/config/database.php
        </div>

        <h3 style="margin-top:20px;"><i class="fas fa-globe"></i> Langkah 4: Konfigurasi Virtual Host Apache</h3>
        <div class="code-block">
            <span class="code-label">bash</span>
            sudo nano /etc/apache2/sites-available/garudacbt.conf
        </div>
        <p style="margin-top:8px;">Isi file konfigurasi:</p>
        <div class="code-block">
            <span class="code-label">apache</span>
            &lt;VirtualHost *:80&gt;<br>
            &nbsp;&nbsp;ServerName domain-anda.com<br>
            &nbsp;&nbsp;ServerAlias www.domain-anda.com<br>
            &nbsp;&nbsp;DocumentRoot /var/www/garudacbt<br><br>
            &nbsp;&nbsp;&lt;Directory /var/www/garudacbt&gt;<br>
            &nbsp;&nbsp;&nbsp;&nbsp;AllowOverride All<br>
            &nbsp;&nbsp;&nbsp;&nbsp;Require all granted<br>
            &nbsp;&nbsp;&lt;/Directory&gt;<br><br>
            &nbsp;&nbsp;ErrorLog \${APACHE_LOG_DIR}/garudacbt_error.log<br>
            &nbsp;&nbsp;CustomLog \${APACHE_LOG_DIR}/garudacbt_access.log combined<br>
            &lt;/VirtualHost&gt;
        </div>
        <div class="code-block" style="margin-top:8px;">
            <span class="code-label">bash</span>
            <span class="cm"># Aktifkan site dan reload Apache</span><br>
            sudo a2ensite garudacbt.conf<br>
            sudo a2dissite 000-default.conf<br>
            sudo systemctl reload apache2
        </div>

        <h3 style="margin-top:20px;"><i class="fas fa-lock"></i> Langkah 5: Pasang SSL/HTTPS dengan Certbot</h3>
        <p>Sangat direkomendasikan untuk produksi agar data login dan ujian terenkripsi.</p>
        <div class="code-block">
            <span class="code-label">bash</span>
            <span class="cm"># Install Certbot</span><br>
            sudo apt install -y certbot python3-certbot-apache<br><br>
            <span class="cm"># Request sertifikat SSL (ganti dengan domain Anda)</span><br>
            sudo certbot --apache -d domain-anda.com -d www.domain-anda.com<br><br>
            <span class="cm"># Certbot akan otomatis mengupdate konfigurasi Apache ke HTTPS</span><br>
            <span class="cm"># Sertifikat diperbarui otomatis via cron/systemd timer</span>
        </div>
        <div class="info-box info" style="margin-top:10px;">
            <i class="fas fa-info-circle"></i>
            <div>Certbot (Let's Encrypt) gratis dan sertifikat berlaku 90 hari. Perpanjangan otomatis sudah dikonfigurasi saat instalasi Certbot.</div>
        </div>

        <h3 style="margin-top:20px;"><i class="fas fa-magic"></i> Langkah 6: Jalankan Wizard Instalasi</h3>
        <ol class="step-list">
            <li>Buka browser dan akses <code class="inline">https://domain-anda.com/installer</code></li>
            <li>Isi konfigurasi database: hostname <code>localhost</code>, username <code>garuda_user</code>, password, nama database <code>garudacbt</code></li>
            <li>Klik <strong>INSTALL / UPDATE</strong> dan tunggu proses selesai</li>
            <li>Setelah sukses (<code>cond = 9</code>), browser otomatis redirect ke <code>/init</code> untuk inisialisasi data awal</li>
        </ol>

        <h3 style="margin-top:20px;"><i class="fas fa-tachometer-alt"></i> Optimasi Tambahan (Opsional)</h3>
        <div class="code-block">
            <span class="code-label">bash</span>
            <span class="cm"># Aktifkan PHP OPcache untuk performa lebih baik</span><br>
            sudo phpenmod opcache<br><br>
            <span class="cm"># Aktifkan Gzip compression di Apache</span><br>
            sudo a2enmod deflate<br>
            sudo systemctl restart apache2<br><br>
            <span class="cm"># Cek status semua service</span><br>
            sudo systemctl status apache2<br>
            sudo systemctl status mysql
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-cloud"></i> Metode 3: Shared Hosting (cPanel)</h2>
        <p>Untuk hosting di layanan shared hosting seperti Niagahoster, Dewaweb, dll.</p>
        <ol class="step-list">
            <li>Upload semua file GarudaCBT ke folder <code class="inline">public_html</code> (atau subfolder, misal <code class="inline">public_html/sekolah</code>)</li>
            <li>Buat database baru melalui <code class="inline">cPanel &rarr; MySQL Databases</code>, catat nama database, username, dan password-nya</li>
            <li>Pastikan file <code class="inline">application/config/database.php</code> memiliki permission <code>644</code> atau <code>666</code> agar bisa ditulis saat instalasi</li>
            <li>Akses <code class="inline">https://domain-anda.com/installer</code></li>
            <li>Isi parameter database dan klik <strong>INSTALL / UPDATE</strong> — wizard akan mendeteksi kondisi dan menjalankan proses otomatis</li>
            <li>Setelah sukses, ikuti redirect ke <code>/init</code> untuk setup data awal</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div>Untuk produksi di hosting, <strong>selalu aktifkan HTTPS</strong> melalui fitur SSL/TLS di cPanel untuk keamanan data pengguna.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-folder-open"></i> Struktur Folder Penting</h2>
        <table class="table-custom">
            <thead><tr><th>Folder/File</th><th>Keterangan</th><th>Permission</th></tr></thead>
            <tbody>
                <tr><td><code>application/config/database.php</code></td><td>Konfigurasi koneksi database — ditulis otomatis saat instalasi</td><td>Writable saat install</td></tr>
                <tr><td><code>application/cache/</code></td><td>Cache sesi dan data runtime</td><td>777</td></tr>
                <tr><td><code>uploads/</code></td><td>File upload (foto siswa, materi, tugas)</td><td>777</td></tr>
                <tr><td><code>backups/</code></td><td>Hasil backup database (dibuat otomatis)</td><td>755</td></tr>
                <tr><td><code>assets/app/db/master.sql</code></td><td>SQL skema database yang diimport saat instalasi</td><td>Baca saja</td></tr>
                <tr><td><code>.htaccess</code></td><td>Konfigurasi URL rewriting Apache</td><td>644</td></tr>
            </tbody>
        </table>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-exclamation-circle"></i> Troubleshooting Instalasi</h2>
        <div class="info-box warning" style="margin-bottom:10px;">
            <i class="fas fa-exclamation-triangle"></i>
            <div><strong>Halaman putih / 500 error</strong> — Periksa log error PHP. Biasanya disebabkan ekstensi PHP yang tidak aktif atau permission folder yang salah.</div>
        </div>
        <div class="info-box warning" style="margin-bottom:10px;">
            <i class="fas fa-exclamation-triangle"></i>
            <div><strong>404 Not Found di URL selain halaman utama</strong> — <code>mod_rewrite</code> belum aktif atau <code>AllowOverride All</code> belum diset di konfigurasi Apache.</div>
        </div>
        <div class="info-box warning" style="margin-bottom:10px;">
            <i class="fas fa-exclamation-triangle"></i>
            <div><strong>"tidak ada akses ke file database.php"</strong> — File <code>application/config/database.php</code> belum writable. Ubah permission ke <code>666</code> sementara saat instalasi, kemudian kembalikan ke <code>644</code> setelahnya.</div>
        </div>
        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div><strong>Koneksi database gagal</strong> — Periksa hostname (biasanya <code>localhost</code>), username, password, dan nama database. Di shared hosting, username database biasanya diawali prefix cPanel.</div>
        </div>
    </div>
    `
};
