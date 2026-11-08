<?php
/**
 * Garuda CBT - Hotfix Patch Script for Issue #14 & Issue #35
 *
 * 1. Issue #14: Mencegah false redirect ke '/install' saat koneksi database sibuk/terputus.
 * 2. Issue #35: Mengatasi gagal login di Safari iOS (iPhone/iPad) dengan SameSite=Lax dan reverse-proxy HTTPS handling.
 *
 * Jalankan via CLI: php scripts/patch_fix_issues.php
 * Atau via Web Browser: http://domain-anda/scripts/patch_fix_issues.php
 */

header('Content-Type: text/plain; charset=utf-8');

$base_dir = dirname(__DIR__);
$config_file = $base_dir . '/application/config/config.php';
$auth_file   = $base_dir . '/application/controllers/Auth.php';

echo "=== GARUDA CBT PATCH: ISSUE #14 & #35 ===\n\n";

// -------------------------------------------------------------
// PATCH 1: application/config/config.php (Issue #35 - Safari iOS)
// -------------------------------------------------------------
echo "[1/2] Memeriksa application/config/config.php ...\n";
if (!file_exists($config_file)) {
    echo "  [ERROR] File config.php tidak ditemukan!\n";
} else {
    $config_content = file_get_contents($config_file);

    $needs_update = false;

    // A. Tambahkan deteksi HTTPS reverse proxy jika belum ada
    if (strpos($config_content, 'HTTP_X_FORWARDED_PROTO') === false) {
        $old_scheme = '$scheme = (isset($_SERVER["HTTPS"]) && @$_SERVER["HTTPS"] == "on") ? "https" : "http";';
        $new_scheme = '// [PATCH] Deteksi HTTPS dinamis termasuk reverse proxy (Cloudflare/Nginx/aaPanel)' . "\n"
            . '$is_https = (isset($_SERVER["HTTPS"]) && @$_SERVER["HTTPS"] == "on")' . "\n"
            . '    || (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && $_SERVER["HTTP_X_FORWARDED_PROTO"] == "https")' . "\n"
            . '    || (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && $_SERVER["HTTP_X_FORWARDED_SSL"] == "on")' . "\n"
            . '    || (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] == 443);' . "\n"
            . '$scheme = $is_https ? "https" : "http";' . "\n"
            . 'if ($is_https) { $_SERVER["HTTPS"] = "on"; }';

        if (strpos($config_content, $old_scheme) !== false) {
            $config_content = str_replace($old_scheme, $new_scheme, $config_content);
            $needs_update = true;
            echo "  + Patch HTTPS reverse-proxy berhasil ditambahkan.\n";
        }
    }

    // B. Tambahkan SameSite & Cookie Secure untuk Safari iOS
    if (strpos($config_content, 'cookie_samesite') === false) {
        $old_cookie = "\$config['cookie_httponly'] \t= FALSE;";
        $new_cookie = "\$config['cookie_httponly'] \t= FALSE;\n"
            . "// [PATCH Issue #35] Cookie SameSite untuk kompatibilitas iOS Safari & mobile browsers\n"
            . "\$config['cookie_samesite'] \t= 'Lax';\n"
            . "\$config['sess_samesite'] \t= 'Lax';\n"
            . "if (isset(\$is_https) && \$is_https) {\n"
            . "    \$config['cookie_secure'] = TRUE;\n"
            . "}";

        if (strpos($config_content, $old_cookie) !== false) {
            $config_content = str_replace($old_cookie, $new_cookie, $config_content);
            $needs_update = true;
            echo "  + Patch Cookie SameSite=Lax (Safari iOS) berhasil ditambahkan.\n";
        }
    }

    if ($needs_update) {
        copy($config_file, $config_file . '.bak');
        file_put_contents($config_file, $config_content);
        echo "  -> Berhasil memperbarui application/config/config.php (Backup tersimpan di .bak)\n";
    } else {
        echo "  * application/config/config.php sudah terkonfigurasi dengan baik.\n";
    }
}

// -------------------------------------------------------------
// PATCH 2: application/controllers/Auth.php (Issue #14 - False Reinstall)
// -------------------------------------------------------------
echo "\n[2/2] Memeriksa application/controllers/Auth.php ...\n";
if (!file_exists($auth_file)) {
    echo "  [ERROR] File Auth.php tidak ditemukan!\n";
} else {
    $auth_content = file_get_contents($auth_file);

    $old_sAlm4 = 'sAlm4: redirect("\x69\x6e\163\x74\141\154\154"); goto mIqrm;';
    $old_n9hsw = 'n9hsw: redirect("\x69\x6e\x73\x74\x61\154\x6c"); goto Xii94;';

    $patch_sAlm4 = 'sAlm4: include_once APPPATH . "config/database.php"; if (!empty($db["default"]["database"]) && $db["default"]["database"] !== "%DATABASE%") { show_error("Koneksi ke database terputus atau server sedang sibuk. Silakan muat ulang (refresh) halaman.", 503, "Database Busy / Connection Issue"); return; } redirect("\x69\x6e\163\x74\141\154\154"); goto mIqrm;';
    $patch_n9hsw = 'n9hsw: include_once APPPATH . "config/database.php"; if (!empty($db["default"]["database"]) && $db["default"]["database"] !== "%DATABASE%") { show_error("Gagal memuat konfigurasi sekolah dari database karena beban server tinggi. Silakan muat ulang (refresh) halaman.", 503, "Database Busy"); return; } redirect("\x69\x6e\x73\x74\x61\154\x6c"); goto Xii94;';

    $needs_auth_update = false;

    if (strpos($auth_content, $old_sAlm4) !== false) {
        $auth_content = str_replace($old_sAlm4, $patch_sAlm4, $auth_content);
        $needs_auth_update = true;
        echo "  + Patch sAlm4 (mencegah false redirect saat list_tables gagal) berhasil diterapkan.\n";
    }

    if (strpos($auth_content, $old_n9hsw) !== false) {
        $auth_content = str_replace($old_n9hsw, $patch_n9hsw, $auth_content);
        $needs_auth_update = true;
        echo "  + Patch n9hsw (mencegah false redirect saat getSetting gagal) berhasil diterapkan.\n";
    }

    if ($needs_auth_update) {
        copy($auth_file, $auth_file . '.bak');
        file_put_contents($auth_file, $auth_content);
        echo "  -> Berhasil memperbarui application/controllers/Auth.php (Backup tersimpan di .bak)\n";
    } else {
        echo "  * application/controllers/Auth.php sudah memiliki pengaman database.\n";
    }
}

echo "\n=== PATCH SELESAI DENGAN SUKSES ===\n";
