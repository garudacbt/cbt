#!/bin/bash
set -e

# Pastikan direktori penting ada dan memiliki hak akses untuk www-data
mkdir -p /var/www/html/uploads \
         /var/www/html/backups \
         /var/www/html/application/cache \
         /var/www/html/application/logs

chown -R www-data:www-data /var/www/html/uploads \
                           /var/www/html/backups \
                           /var/www/html/application/cache \
                           /var/www/html/application/logs \
                           /var/www/html/application/config/database.php 2>/dev/null || true

# Tunggu layanan database siap
if [ -n "$DB_HOST" ] && [ "$DB_HOST" != "localhost" ] && [ "$DB_HOST" != "127.0.0.1" ]; then
    echo "[GarudaCBT] Menunggu koneksi database ($DB_HOST)..."
    RETRIES=30
    until php -r "\$conn = @new mysqli('$DB_HOST', '${DB_USER:-root}', '${DB_PASS:-}', '', 3306); if (\$conn->connect_error) { exit(1); } else { \$conn->close(); exit(0); }" > /dev/null 2>&1 || [ $RETRIES -eq 0 ]; do
        RETRIES=$((RETRIES-1))
        sleep 2
    done
    if [ $RETRIES -eq 0 ]; then
        echo "[GarudaCBT] PERINGATAN: Database belum siap setelah 60 detik. Melanjutkan startup..."
    else
        echo "[GarudaCBT] Koneksi ke database berhasil!"
    fi
fi

# Otomatisasi konfigurasi database.php jika variabel lingkungan tersedia
CONFIG_FILE="/var/www/html/application/config/database.php"
if [ -n "$DB_HOST" ] && [ -n "$DB_NAME" ] && [ -f "$CONFIG_FILE" ]; then
    # Cek apakah database.php masih kosong / belum diatur
    if grep -q "'hostname' => ''" "$CONFIG_FILE" || grep -q "'hostname' => '%HOSTNAME%'" "$CONFIG_FILE" || [ "$FORCE_DB_CONFIG" = "true" ]; then
        echo "[GarudaCBT] Mengisi otomatis application/config/database.php dengan parameter Docker..."
        cat <<EOF > "$CONFIG_FILE"
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

\$active_group = 'default';
\$query_builder = TRUE;

\$db['default'] = array(
    'dsn'      => '',
    'hostname' => '$DB_HOST',
    'username' => '${DB_USER:-root}',
    'password' => '${DB_PASS:-}',
    'database' => '$DB_NAME',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt'  => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
EOF
        chown www-data:www-data "$CONFIG_FILE" 2>/dev/null || true
        chmod 664 "$CONFIG_FILE" 2>/dev/null || true
    fi
fi

exec "$@"
