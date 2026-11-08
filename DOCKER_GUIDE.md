# Panduan Instalasi Modern Garuda CBT Menggunakan Docker

Dokumentasi ini dibuat untuk mempermudah operator sekolah, madrasah, dan tim IT laboratorium dalam menjalankan **Garuda CBT** secara cepat, terisolasi, dan andal tanpa harus kesulitan mengonfigurasi XAMPP, Laragon, maupun cPanel manual.

---

## 🚀 Mengapa Menggunakan Docker?

* **Zero-Configuration PHP:** Tidak perlu repot menyalakan ekstensi `mysqli`, `gd`, `zip`, `fileinfo`, atau `calendar` secara manual di `php.ini`.
* **Database Otomatis Terinisialisasi:** Skema awal `master.sql` langsung terpasang saat pertama kali container database dibuat.
* **Terisolasi & Bersih:** Tidak mengotori sistem operasi server/laptop dan tidak akan bentrok dengan aplikasi web lain.
* **Sudah Dilengkapi phpMyAdmin:** Mempermudah backup dan pemulihan darurat melalui browser di port `8081`.
* **Keamanan Tambahan:** Folder `uploads/` telah diproteksi agar file skrip PHP yang diunggah tidak dapat dieksekusi oleh peretas.

---

## 📋 Prasyarat

Pastikan komputer/server telah terpasang:
* **Docker Engine** (versi 20.10+) dan **Docker Compose** (v2+)
* Atau **Docker Desktop** jika menggunakan Windows / macOS.

---

## ⚡ Langkah Cepat (Quick Start)

### 1. Salin Konfigurasi Environment (Opsional)
Secara default, aplikasi sudah memiliki nilai bawaan yang siap pakai. Jika Anda ingin mengubah port atau sandi database, salin file contoh:

```bash
cp .env.example .env
```

### 2. Jalankan Container
Cukup jalankan satu perintah berikut di direktori proyek:

```bash
docker compose up -d
```

> **Catatan:** Pada saat pertama kali dijalankan, proses *build image* PHP dan download MariaDB membutuhkan waktu sekitar 2–4 menit tergantung kecepatan internet.

### 3. Akses Aplikasi
Setelah container berjalan, buka browser:

| Layanan | URL Akses | Kredensial Default |
| :--- | :--- | :--- |
| **Garuda CBT** | [http://localhost:8080](http://localhost:8080) | Dibuat pada wizard pertama |
| **phpMyAdmin** | [http://localhost:8081](http://localhost:8081) | User: `garudacbt`, Pass: `garuda123`<br>*(atau User: `root`, Pass: `rootsecret`)* |

---

## 🛠️ Inisialisasi Pertama (First-Time Setup)

1. Buka [http://localhost:8080](http://localhost:8080) di browser.
2. Anda akan langsung diarahkan ke form wizard instalasi sekolah (`/install`):
   * **Profil Sekolah:** Masukkan Jenjang (SD/SMP/SMA/SMK/MI/MTs/MA), Nama Sekolah, dan Alamat.
   * **Akun Administrator:** Tentukan Nama Lengkap, Username, dan Password admin yang Anda inginkan.
3. Klik **Simpan / Selesai**, dan aplikasi Garuda CBT siap digunakan!

---

## 🔄 Perintah Manajemen Sehari-hari

Jalankan perintah ini di dalam folder `cbt`:

* **Melihat status container:**
  ```bash
  docker compose ps
  ```

* **Melihat log aplikasi secara langsung (live debugging):**
  ```bash
  docker compose logs -f app
  ```

* **Menghentikan aplikasi:**
  ```bash
  docker compose stop
  ```

* **Menjalankan kembali aplikasi:**
  ```bash
  docker compose start
  ```

* **Mematikan dan merapikan container:**
  ```bash
  docker compose down
  ```
  *(Data database Anda tetap tersimpan aman di volume `db_data`)*.

---

## 💾 Backup & Restore Database

### Cara 1: Melalui phpMyAdmin
1. Buka [http://localhost:8081](http://localhost:8081).
2. Login dengan user `garudacbt` dan password `garuda123`.
3. Pilih database `garudacbt` lalu gunakan tab **Export** atau **Import**.

### Cara 2: Melalui Terminal (Sangat Cepat)
* **Backup:**
  ```bash
  docker exec -i garudacbt_db mariadb-dump -u garudacbt -pgaruda123 garudacbt > backup_garuda.sql
  ```

* **Restore:**
  ```bash
  docker exec -i garudacbt_db mariadb -u garudacbt -pgaruda123 garudacbt < backup_garuda.sql
  ```

---

## 🌐 Penggunaan di Jaringan Laboratorium / Server Lokal (Offline LAN)

Jika Garuda CBT diinstal di komputer server lokal (misalnya di Lab Komputer Sekolah):
1. Cari tahu IP Address lokal komputer server, contoh: `192.168.1.100`.
2. Buka firewall port `8080` pada komputer server.
3. Siswa dan pengawas di komputer client/laptop dapat langsung mengakses ujian melalui:
   ```
   http://192.168.1.100:8080
   ```

---

## ⚡ Tips Performa untuk Ujian Massal (>300 Siswa Serentak)

* **RAM:** Pastikan server memiliki minimal 4 GB - 8 GB RAM.
* Di dalam `docker-compose.yml`, kami sudah mengatur default:
  * `--max_connections=500`
  * `--innodb_buffer_pool_size=512M`
* **PHP Opcache:** Sudah diaktifkan secara otomatis di dalam `Dockerfile` untuk mempercepat pemrosesan skrip PHP tanpa membebani CPU server.
