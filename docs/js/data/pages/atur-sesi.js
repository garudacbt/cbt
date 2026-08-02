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
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Semua operasi Sesi Ujian menggunakan AJAX POST ke controller <code>Cbtsesi</code> dan mengembalikan respons JSON. Hanya Administrator yang memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtsesi</code></td><td>Tampilkan halaman data sesi ujian</td></tr>
                <tr><td>POST</td><td><code>cbtsesi/data</code></td><td>Ambil data sesi ujian (JSON DataTables)</td></tr>
                <tr><td>POST</td><td><code>cbtsesi/add</code></td><td>Tambah sesi ujian baru</td></tr>
                <tr><td>POST</td><td><code>cbtsesi/update</code></td><td>Update data sesi ujian</td></tr>
                <tr><td>GET</td><td><code>cbtsesi/edit/{id}</code></td><td>Tampilkan halaman edit sesi</td></tr>
                <tr><td>POST</td><td><code>cbtsesi/delete</code></td><td>Hapus sesi ujian (bulk)</td></tr>
                <tr><td>GET</td><td><code>cbtsesi/sesisiswa</code></td><td>Tampilkan halaman sesi untuk siswa</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtsesi/add</code> — Tambah Sesi Ujian</h3>
        <p>Endpoint ini menangani operasi penambahan sesi ujian baru ke database.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>nama_sesi</code></td><td>Ya</td><td>Nama sesi (contoh: Sesi 1 Pagi)</td></tr>
                <tr><td><code>kode_sesi</code></td><td>Ya</td><td>Kode unik sesi (contoh: S1, SES001)</td></tr>
                <tr><td><code>waktu_mulai</code></td><td>Ya</td><td>Waktu mulai sesi (format HH:MM:SS)</td></tr>
                <tr><td><code>waktu_akhir</code></td><td>Ya</td><td>Waktu akhir sesi (format HH:MM:SS)</td></tr>
                <tr><td><code>istirahat</code></td><td>Tidak</td><td>Durasi istirahat dalam menit</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": { "nama_sesi": "Sesi 1", "kode_sesi": "S1", "waktu_mulai": "08:00:00", "waktu_akhir": "10:00:00", "istirahat": "10" } }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtsesi/update</code> — Update Sesi Ujian</h3>
        <p>Endpoint ini menangani operasi perubahan data sesi ujian yang sudah ada.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_sesi</code></td><td>Ya</td><td>ID sesi yang akan diupdate</td></tr>
                <tr><td><code>nama_sesi</code></td><td>Ya</td><td>Nama sesi baru</td></tr>
                <tr><td><code>kode_sesi</code></td><td>Ya</td><td>Kode sesi baru</td></tr>
                <tr><td><code>waktu_mulai</code></td><td>Ya</td><td>Waktu mulai baru</td></tr>
                <tr><td><code>waktu_akhir</code></td><td>Ya</td><td>Waktu akhir baru</td></tr>
                <tr><td><code>istirahat</code></td><td>Tidak</td><td>Durasi istirahat dalam menit</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "Data berhasil diupdate" }</pre>
        <p style="margin-top:8px;"><strong>Respons JSON — gagal:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": false, "message": "Gagal mengupdate data" }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtsesi/delete</code> — Hapus Sesi Ujian</h3>
        <p>Endpoint ini menangani operasi penghapusan sesi ujian (bisa bulk/menghapus banyak sekaligus).</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>checked[]</code></td><td>Ya</td><td>Array ID sesi yang akan dihapus</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "total": 2 }</pre>
        <p style="margin-top:8px;"><strong>Respons JSON — gagal (tidak ada data terpilih):</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": false }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Sesi yang sudah digunakan dalam jadwal ujian atau memiliki token tidak dapat dihapus. Pastikan menghapus data terkait terlebih dahulu sebelum menghapus sesi.</div>
        </div>
    </div>`
};
