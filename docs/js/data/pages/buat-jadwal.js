if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['buat-jadwal'] = {
    title: 'Buat Jadwal Ujian',
    desc: 'Panduan lengkap membuat jadwal ujian CBT di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-calendar-plus"></i> Membuat Jadwal Ujian</h2>
        <p>Jadwal ujian mengatur kapan ujian akan dilaksanakan, mata pelajaran apa yang diujikan, bank soal yang digunakan, dan kelas mana yang mengikuti ujian. Jadwal ujian adalah fondasi dari seluruh pelaksanaan CBT.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Jadwal Ujian</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Jadwal CBT</code></li>
            <li>Halaman Jadwal Ujian akan ditampilkan dengan daftar jadwal yang ada</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan bank soal sudah dibuat dan statusnya Aktif sebelum membuat jadwal ujian. Bank soal Non Aktif tidak akan muncul dalam pilihan.</div>
        </div>
        <hr>
        <h3>🠊 Membuat Jadwal Ujian Baru</h3>
        <ol class="step-list">
            <li>Pada halaman Jadwal Ujian, klik tombol <code class="inline">+ Jadwal Baru</code> di pojok kanan atas</li>
            <li>Halaman Buat Jadwal akan ditampilkan dengan form input</li>
            <li>Isi formulir informasi jadwal ujian:
                <ul class="step-list">
                    <li><strong>Nama Ujian:</strong> Nama ujian (wajib diisi, contoh: UTS Matematika Kelas 7)</li>
                    <li><strong>Kode Ujian:</strong> Kode unik untuk ujian (opsional, sistem akan generate otomatis jika kosong)</li>
                    <li><strong>Mata Pelajaran:</strong> Pilih mata pelajaran dari dropdown</li>
                    <li><strong>Bank Soal:</strong> Pilih bank soal yang akan digunakan (hanya bank soal Aktif yang muncul)</li>
                    <li><strong>Tanggal:</strong> Pilih tanggal pelaksanaan ujian</li>
                    <li><strong>Waktu Mulai:</strong> Set jam mulai ujian</li>
                    <li><strong>Waktu Selesai:</strong> Set jam selesai ujian</li>
                    <li><strong>Durasi (menit):</strong> Durasi ujian dalam menit (otomatis dihitung dari waktu mulai dan selesai)</li>
                    <li><strong>Kelas:</strong> Pilih kelas-kelas yang akan mengikuti ujian (bisa multiple)</li>
                    <li><strong>Status:</strong> Pilih status jadwal (Aktif atau Non Aktif)</li>
                </ul>
            </li>
            <li>Periksa ringkasan informasi yang ditampilkan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Jadwal ujian baru akan dibuat dan ditambahkan ke daftar jadwal</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan nama ujian yang deskriptif dan mudah dipahami. Format yang konsisten seperti "UTS-[Mapel]-[Kelas]-[Semester]" akan memudahkan manajemen jadwal.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Status Jadwal Ujian</h3>
        <ol class="step-list">
            <li><strong>Abu-abu (text-muted):</strong> Jadwal belum aktif atau sudah selesai</li>
            <li><strong>Kuning (text-yellow):</strong> Jadwal aktif dan ujian sedang berlangsung</li>
            <li><strong>Hijau (text-success):</strong> Jadwal aktif dan siap untuk ujian</li>
            <li><strong>Merah (text-danger):</strong> Jadwal bermasalah atau dibatalkan</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Jadwal yang sudah digunakan oleh siswa tidak dapat dihapus</li>
                    <li>Jadwal yang sudah selesai tidak dapat diedit</li>
                    <li>Bank soal yang digunakan dalam jadwal tidak dapat diedit</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Mengedit Jadwal Ujian</h3>
        <ol class="step-list">
            <li>Pada halaman Jadwal Ujian, cari jadwal yang ingin diedit</li>
            <li>Klik tombol <code class="inline">Edit</code> pada jadwal tersebut</li>
            <li>Ubah data jadwal sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Jadwal akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Jadwal tidak dapat diedit jika ujian sudah dimulai</li>
                    <li>Jadwal tidak dapat diedit jika sudah ada siswa yang mengikuti ujian</li>
                    <li>Perubahan waktu akan mempengaruhi semua sesi yang terkait</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Menghapus Jadwal Ujian</h3>
        <ol class="step-list">
            <li>Pilih jadwal yang ingin dihapus dengan checkbox</li>
            <li>Klik tombol <code class="inline">Hapus terpilih</code></li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Jadwal akan dihapus beserta semua data terkait</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Jadwal yang sudah digunakan oleh siswa tidak dapat dihapus</li>
                    <li>Tindakan ini akan menghapus semua sesi dan data terkait</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Filter Jadwal Ujian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter</code> untuk memfilter berdasarkan:
                <ul class="step-list">
                    <li>Semua: Menampilkan semua jadwal</li>
                    <li>Mapel: Filter berdasarkan mata pelajaran</li>
                    <li>Kelas: Filter berdasarkan kelas</li>
                    <li>Status: Filter berdasarkan status jadwal</li>
                    <li>Tanggal: Filter berdasarkan rentang tanggal</li>
                </ul>
            </li>
            <li>Pilih filter yang diinginkan</li>
            <li>Dropdown tambahan akan muncul sesuai filter yang dipilih</li>
            <li>Tabel akan menampilkan jadwal sesuai filter</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk menemukan jadwal tertentu dengan cepat, terutama jika jumlah jadwal sangat banyak.</div>
        </div>
        <hr>
        <h3>🠊 Copy Jadwal Ujian</h3>
        <ol class="step-list">
            <li>Pada halaman Jadwal Ujian, klik tombol <code class="inline">Copy Jadwal</code></li>
            <li>Modal akan muncul dengan daftar jadwal yang tersedia</li>
            <li>Pilih jadwal yang ingin disalin</li>
            <li>Ubah data yang diperlukan (tanggal, waktu, kelas, dll)</li>
            <li>Klik tombol <code class="inline">Copy</code></li>
            <li>Jadwal baru akan dibuat berdasarkan jadwal yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur Copy sangat berguna untuk membuat jadwal ujian baru berdasarkan jadwal yang sudah ada, misalnya untuk ujian berikutnya dengan konfigurasi yang sama namun kelas berbeda.</div>
        </div>
        <hr>
        <h3>🠊 Langkah Selanjutnya</h3>
        <p>Setelah jadwal ujian dibuat, langkah selanjutnya adalah:</p>
        <ol class="step-list">
            <li><strong>Atur Sesi:</strong> Buat sesi ujian untuk membagi pelaksanaan ke dalam beberapa waktu jika diperlukan</li>
            <li><strong>Atur Ruang:</strong> Tentukan ruang ujian dan kapasitasnya</li>
            <li><strong>Generate Token:</strong> Buat token untuk akses ujian</li>
            <li><strong>Assign Pengawas:</strong> Tetapkan pengawas untuk setiap sesi</li>
        </ol>

        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Urutan Penting:</strong> Pastikan untuk mengatur sesi dan ruang sebelum generate token. Token akan terikat ke sesi dan ruang yang telah ditentukan.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Perencanaan matang:</strong> Rencanakan jadwal ujian jauh hari sebelum tanggal pelaksanaan</li>
            <li><strong>Nama yang deskriptif:</strong> Gunakan format nama yang konsisten dan mudah dipahami</li>
            <li><strong>Bank soal siap:</strong> Pastikan bank soal sudah selesai dan Aktif sebelum membuat jadwal</li>
            <li><strong>Kapasitas ruang:</strong> Pertimbangkan kapasitas ruang saat menentukan kelas per sesi</li>
            <li><strong>Waktu yang cukup:</strong> Berikan waktu yang cukup untuk siswa mengerjakan soal</li>
            <li><strong>Backup jadwal:</strong> Gunakan fitur Copy untuk backup jadwal sebelum mengubah</li>
            <li><strong>Komunikasi:</strong> Komunikasikan jadwal kepada guru dan siswa sebelum tanggal pelaksanaan</li>
            <li><strong>Review:</strong> Review jadwal sebelum mengaktifkannya</li>
            <li><strong>Testing:</strong> Lakukan uji coba sistem sebelum ujian sebenarnya</li>
            <li><strong>Dokumentasi:</strong> Dokumentasikan format jadwal untuk referensi tim</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa membuat jadwal:</strong>
                <span>Pastikan semua field wajib sudah terisi. Pastikan bank soal sudah ada dan statusnya Aktif. Pastikan kelas sudah dibuat untuk tahun pelajaran dan semester aktif.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Bank soal tidak muncul di dropdown:</strong>
                <span>Pastikan bank soal sudah dibuat dan statusnya Aktif. Bank soal dengan status Non Aktif tidak akan muncul dalam pilihan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kelas tidak muncul di dropdown:</strong>
                <span>Pastikan kelas sudah dibuat di menu Kelas / Rombel untuk tahun pelajaran dan semester aktif.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengedit jadwal:</strong>
                <span>Jadwal yang sudah digunakan oleh siswa atau ujian sudah dimulai tidak dapat diedit. Hapus atau pindahkan data terkait terlebih dahulu.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Durasi tidak sesuai:</strong>
                <span>Durasi dihitung otomatis dari waktu mulai dan selesai. Pastikan waktu selesai setelah waktu mulai.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Copy jadwal gagal:</strong>
                <span>Pastikan bank soal dan kelas yang digunakan masih tersedia. Jika bank soal atau kelas sudah dihapus, copy akan gagal.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> Jadwal ujian dibuat per tahun pelajaran dan semester. Data di tahun pelajaran berbeda adalah data yang terpisah.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Status Bank Soal:</strong> Hanya bank soal dengan status Aktif yang dapat digunakan dalam jadwal ujian. Set status bank soal ke Aktif setelah selesai dibuat.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Ketergantungan:</strong> Jadwal ujian terkait dengan sesi, ruang, dan token. Perubahan pada jadwal akan mempengaruhi komponen lainnya.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru hanya dapat melihat dan mengelola jadwal untuk mata pelajaran yang mereka ampu. Administrator memiliki akses penuh ke semua jadwal.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Semua operasi Jadwal Ujian menggunakan AJAX POST ke controller <code>Cbtjadwal</code> dan mengembalikan respons JSON. Administrator dan Guru memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtjadwal</code></td><td>Tampilkan halaman daftar jadwal ujian</td></tr>
                <tr><td>GET</td><td><code>cbtjadwal/add/{id_jadwal}</code></td><td>Tampilkan halaman tambah/edit jadwal ujian (id=0 untuk tambah)</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/saveJadwal</code></td><td>Simpan jadwal ujian baru atau edit yang ada</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/aktifkan_jadwal</code></td><td>Aktifkan/nonaktifkan jadwal ujian</td></tr>
                <tr><td>GET</td><td><code>cbtjadwal/deleteJadwal</code></td><td>Hapus satu jadwal ujian</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/deleteAllJadwal</code></td><td>Hapus jadwal ujian secara bulk</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/getBankMapel/{id_mapel}</code></td><td>Ambil daftar bank soal berdasarkan mapel</td></tr>
                <tr><td>POST</td><td><code>cbtjadwal/get_all_norekap</code></td><td>Ambil semua data yang belum direkap</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtjadwal/saveJadwal</code> — Simpan Jadwal Ujian</h3>
        <p>Endpoint ini menangani operasi penyimpanan jadwal ujian baru atau edit yang ada.</p>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "success": true, "message": "Jadwal berhasil disimpan" }</pre>
        <p style="margin-top:8px;"><strong>Respons JSON — gagal:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "success": false, "message": "Bank soal sudah digunakan" }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtjadwal/aktifkan_jadwal</code> — Aktifkan/Nonaktifkan Jadwal</h3>
        <p>Endpoint ini menangani operasi aktifkan atau nonaktifkan jadwal ujian.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>method</code></td><td>Ya</td><td>Method untuk toggle status (1 atau 0)</td></tr>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian yang akan diubah statusnya</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }</pre>

        <h3 style="margin-top:20px;">GET <code>cbtjadwal/deleteJadwal</code> — Hapus Jadwal Ujian</h3>
        <p>Endpoint ini menangani operasi penghapusan satu jadwal ujian.</p>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "berhasil" }</pre>
        <p style="margin-top:8px;"><strong>Respons JSON — gagal:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": false, "message": "Hasil Ujian belum direkap" }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtjadwal/deleteAllJadwal</code> — Hapus Jadwal Ujian Bulk</h3>
        <p>Endpoint ini menangani operasi penghapusan beberapa jadwal ujian sekaligus.</p>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "berhasil" }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Semua operasi yang mengubah data (tambah, edit, hapus, aktifkan) dicatat ke tabel log aktivitas.</div>
        </div>
    </div>`
};
