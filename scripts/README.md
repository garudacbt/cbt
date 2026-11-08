# Garuda CBT Utility & Patch Scripts

Folder ini berisi skrip bantu dan *hotfix patch* untuk mempermudah pemeliharaan aplikasi Garuda CBT.

---

## 🛠️ Hotfix: `patch_fix_issues.php`

Skrip ini dirancang untuk menyelesaikan dua isu kritis:
1. **Issue #14:** Mencegah aplikasi mendadak me-*redirect* ke `/install` saat koneksi database terputus atau server sedang sibuk (*overload*).
2. **Issue #35:** Mengatasi kendala gagal login pada browser Safari di perangkat iOS (iPhone / iPad) melalui penambahan header cookie `SameSite=Lax` dan deteksi protokol HTTPS dinamis di balik reverse proxy (Cloudflare/Nginx/aaPanel).

### Cara Menjalankan Patch:

#### Opsi 1: Melalui Terminal / SSH / Command Prompt
```bash
php scripts/patch_fix_issues.php
```

#### Opsi 2: Melalui Web Browser
Buka tautan berikut di browser Anda:
```
http://alamat-ip-atau-domain-sekolah/scripts/patch_fix_issues.php
```
*(Setelah selesai dan sukses, Anda dapat menghapus file ini demi keamanan)*.
