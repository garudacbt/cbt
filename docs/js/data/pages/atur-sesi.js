if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['atur-sesi'] = {
    title: 'Atur Sesi Ujian',
    desc: 'Panduan lengkap mengatur sesi ujian untuk pembagian waktu di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-clock"></i> Mengatur Sesi Ujian</h2>
        <p>Sesi ujian digunakan untuk membagi pelaksanaan ujian ke dalam beberapa sesi waktu jika jumlah siswa melebihi kapasitas ruang komputer atau untuk alasan manajemen lainnya. Setiap sesi dapat memiliki konfigurasi waktu, ruang, dan token yang berbeda.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Sesi Ujian</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Jadwal CBT</code></li>
            <li>Pilih jadwal ujian yang akan diatur sesinya</li>
            <li>Klik tombol <code class="inline">Detail</code> pada jadwal tersebut</li>
            <li>Pada halaman Detail Jadwal, klik tab <code class="inline">Sesi</code></li>
            <li>Daftar sesi untuk jadwal tersebut akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan jadwal ujian sudah dibuat sebelum mengatur sesi. Sesi adalah bagian dari jadwal ujian dan tidak dapat dibuat secara independen.</div>
        </div>
        <hr>
        <h3>🠊 Membuat Sesi Ujian Baru</h3>
        <ol class="step-list">
            <li>Pada tab Sesi, klik tombol <code class="inline">+ Tambah Sesi</code></li>
            <li>Modal tambah sesi akan ditampilkan</li>
            <li>Isi formulir informasi sesi:
                <ul class="step-list">
                    <li><strong>Nama Sesi:</strong> Nama sesi (wajib diisi, contoh: Sesi 1, Sesi Pagi, dll)</li>
                    <li><strong>Waktu Mulai:</strong> Set jam mulai sesi (harus dalam rentang waktu jadwal ujian)</li>
                    <li><strong>Waktu Selesai:</strong> Set jam selesai sesi (harus dalam rentang waktu jadwal ujian)</li>
                    <li><strong>Kapasitas:</strong> Jumlah maksimal siswa yang dapat mengikuti sesi ini</li>
                    <li><strong>Ruang:</strong> Pilih ruang ujian untuk sesi ini (jika ruang sudah dibuat)</li>
                    <li><strong>Keterangan:</strong> Catatan tambahan tentang sesi (opsional)</li>
                </ul>
            </li>
            <li>Periksa ringkasan informasi yang ditampilkan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Sesi baru akan ditambahkan ke daftar sesi</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan nama sesi yang deskriptif seperti "Sesi 1 - 08:00-10:00" untuk memudahkan identifikasi. Pastikan waktu sesi tidak tumpang tindih dengan sesi lain.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Status Sesi Ujian</h3>
        <ol class="step-list">
            <li><strong>Abu-abu (text-muted):</strong> Sesi belum aktif atau sudah selesai</li>
            <li><strong>Kuning (text-yellow):</strong> Sesi aktif dan ujian sedang berlangsung</li>
            <li><strong>Hijau (text-success):</strong> Sesi aktif dan siap untuk ujian</li>
            <li><strong>Merah (text-danger):</strong> Sesi bermasalah atau dibatalkan</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Sesi yang sudah digunakan oleh siswa tidak dapat dihapus</li>
                    <li>Sesi yang sudah selesai tidak dapat diedit</li>
                    <li>Waktu sesi harus dalam rentang waktu jadwal ujian</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Mengedit Sesi Ujian</h3>
        <ol class="step-list">
            <li>Pada tab Sesi, cari sesi yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> pada sesi tersebut</li>
            <li>Ubah data sesi sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Sesi akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Sesi tidak dapat diedit jika ujian sudah dimulai</li>
                    <li>Sesi tidak dapat diedit jika sudah ada siswa yang mengikuti ujian</li>
                    <li>Perubahan waktu akan mempengaruhi token yang terkait</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Menghapus Sesi Ujian</h3>
        <ol class="step-list">
            <li>Pilih sesi yang ingin dihapus dengan checkbox</li>
            <li>Klik tombol <code class="inline">Hapus terpilih</code></li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Sesi akan dihapus beserta semua data terkait</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Sesi yang sudah digunakan oleh siswa tidak dapat dihapus</li>
                    <li>Tindakan ini akan menghapus semua token dan data terkait</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Menugaskan Kelas ke Sesi</h3>
        <ol class="step-list">
            <li>Pada tab Sesi, klik tombol <code class="inline">Assign Kelas</code></li>
            <li>Modal assign kelas akan ditampilkan</li>
            <li>Pilih kelas yang akan ditugaskan ke sesi</li>
            <li>Pilih sesi yang dituju</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Kelas akan ditugaskan ke sesi tersebut</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Satu kelas dapat ditugaskan ke beberapa sesi jika diperlukan. Ini berguna untuk ujian yang dilaksanakan dalam beberapa gelombang.</div>
        </div>
        <hr>
        <h3>🠊 Copy Sesi Ujian</h3>
        <ol class="step-list">
            <li>Pada tab Sesi, klik tombol <code class="inline">Copy Sesi</code></li>
            <li>Modal akan muncul dengan daftar sesi yang tersedia</li>
            <li>Pilih sesi yang ingin disalin</li>
            <li>Ubah data yang diperlukan (waktu, kapasitas, dll)</li>
            <li>Klik tombol <code class="inline">Copy</code></li>
            <li>Sesi baru akan dibuat berdasarkan sesi yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur Copy sangat berguna untuk membuat sesi baru berdasarkan sesi yang sudah ada, misalnya untuk sesi berikutnya dengan konfigurasi yang sama namun waktu berbeda.</div>
        </div>
        <hr>
        <h3>🠊 Hubungan Sesi dengan Token</h3>
        <p>Setiap sesi memiliki token unik yang digunakan untuk akses ujian:</p>
        <ul class="step-list">
            <li><strong>Token per Sesi:</strong> Setiap sesi memiliki token yang berbeda</li>
            <li><strong>Validitas Token:</strong> Token hanya valid pada waktu sesi yang ditentukan</li>
            <li><strong>Reset Token:</strong> Token dapat di-reset jika terjadi masalah</li>
            <li><strong>Distribusi:</strong> Token harus dibagikan kepada siswa sebelum sesi dimulai</li>
        </ul>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Penting:</strong> Siswa hanya dapat mengikuti ujian pada sesi yang telah ditugaskan ke kelasnya. Pastikan assign kelas sudah dilakukan sebelum generate token.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Perencanaan kapasitas:</strong> Hitung total siswa dan bagi dengan kapasitas ruang untuk menentukan jumlah sesi</li>
            <li><strong>Waktu yang cukup:</strong> Berikan waktu istirahat antar sesi jika ada</li>
            <li><strong>Nama yang deskriptif:</strong> Gunakan format nama yang konsisten dan mudah dipahami</li>
            <li><strong>Assign kelas:</strong> Assign kelas ke sesi sebelum generate token</li>
            <li><strong>Backup sesi:</strong> Gunakan fitur Copy untuk backup sesi sebelum mengubah</li>
            <li><strong>Komunikasi:</strong> Komunikasikan jadwal sesi kepada guru dan siswa</li>
            <li><strong>Review:</strong> Review sesi sebelum mengaktifkannya</li>
            <li><strong>Testing:</strong> Lakukan uji coba sistem sebelum ujian sebenarnya</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan format sesi untuk referensi tim</li>
            <li><strong>Monitoring:</strong> Monitor kapasitas sesi untuk memastikan tidak overload</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa membuat sesi:</strong>
                <span>Pastikan semua field wajib sudah terisi. Pastikan waktu sesi dalam rentang waktu jadwal ujian. Pastikan jadwal ujian sudah dibuat.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Waktu sesi tidak valid:</strong>
                <span>Pastikan waktu mulai sebelum waktu selesai. Pastikan waktu sesi dalam rentang waktu jadwal ujian. Pastikan tidak ada tumpang tindih dengan sesi lain.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Ruang tidak muncul di dropdown:</strong>
                <span>Pastikan ruang sudah dibuat di menu Ruang Ujian. Pastikan ruang belum penuh di sesi lain pada waktu yang sama.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengedit sesi:</strong>
                <span>Sesi yang sudah digunakan oleh siswa atau ujian sudah dimulai tidak dapat diedit. Hapus atau pindahkan data terkait terlebih dahulu.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kapasitas terlampaui:</strong>
                <span>Pastikan kapasitas sesi cukup untuk jumlah siswa yang ditugaskan. Kurangi jumlah siswa atau tambah sesi baru.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Copy sesi gagal:</strong>
                <span>Pastikan ruang dan kelas yang digunakan masih tersedia. Jika ruang atau kelas sudah dihapus, copy akan gagal.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan:</strong> Sesi terkait dengan jadwal ujian, ruang, dan token. Perubahan pada sesi akan mempengaruhi komponen lainnya.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Assign Kelas:</strong> Pastikan assign kelas ke sesi sudah dilakukan sebelum generate token. Siswa hanya dapat mengikuti ujian pada sesi yang ditugaskan ke kelasnya.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Token Unik:</strong> Setiap sesi memiliki token yang unik. Token harus dibagikan kepada siswa sebelum sesi dimulai.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Waktu Valid:</strong> Token hanya valid pada waktu sesi yang ditentukan. Siswa tidak dapat mengakses ujian di luar waktu sesi.</div>
        </div>
    </div>`
};
