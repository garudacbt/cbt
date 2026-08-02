if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['tambah-soal'] = {
    title: 'Tambah Soal',
    desc: 'Panduan lengkap menambahkan soal ke dalam bank soal di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-plus-circle"></i> Menambah Soal ke Bank Soal</h2>
        <p>Setelah bank soal dibuat, Anda dapat menambahkan soal ke dalamnya. GarudaCBT mendukung berbagai jenis soal termasuk Pilihan Ganda, Ganda Kompleks, Menjodohkan, Isian Singkat, dan Essay. Soal dapat ditambahkan secara manual atau melalui import dari file Excel.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Halaman Tambah Soal</h3>
        <ol class="step-list">
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Bank Soal</code></li>
            <li>Pilih bank soal yang ingin ditambah soal</li>
            <li>Klik tombol <code class="inline">Buat Soal</code> atau <code class="inline">Detail</code> pada bank soal tersebut</li>
            <li>Halaman Detail Bank Soal akan ditampilkan dengan tab untuk setiap jenis soal</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan bank soal belum digunakan dalam jadwal ujian atau oleh siswa sebelum menambah/mengedit soal.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Soal Pilihan Ganda</h3>
        <ol class="step-list">
            <li>Pada halaman Detail Bank Soal, klik tab <code class="inline">Pilihan Ganda</code></li>
            <li>Klik tombol <code class="inline">+ Tambah Soal</code></li>
            <li>Isi formulir soal:
                <ul class="step-list">
                    <li><strong>Nomor Soal:</strong> Nomor urut soal (otomatis atau manual)</li>
                    <li><strong>Pertanyaan:</strong> Teks soal (wajib diisi)</li>
                    <li><strong>Opsi A:</strong> Opsi jawaban pertama</li>
                    <li><strong>Opsi B:</strong> Opsi jawaban kedua</li>
                    <li><strong>Opsi C:</strong> Opsi jawaban ketiga</li>
                    <li><strong>Opsi D:</strong> Opsi jawaban keempat (jika opsi 4)</li>
                    <li><strong>Opsi E:</strong> Opsi jawaban kelima (jika opsi 5)</li>
                    <li><strong>Jawaban Benar:</strong> Pilih opsi yang benar (A, B, C, D, atau E)</li>
                    <li><strong>Pembahasan:</strong> Penjelasan jawaban (opsional)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Soal akan ditambahkan ke bank soal</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan pertanyaan yang jelas dan tidak ambigu. Pastikan opsi jawaban homogen (semua angka, semua kalimat, dll) untuk mengurangi kebingungan siswa.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Soal Ganda Kompleks</h3>
        <ol class="step-list">
            <li>Pada halaman Detail Bank Soal, klik tab <code class="inline">Ganda Kompleks</code></li>
            <li>Klik tombol <code class="inline">+ Tambah Soal</code></li>
            <li>Isi formulir soal:
                <ul class="step-list">
                    <li><strong>Nomor Soal:</strong> Nomor urut soal</li>
                    <li><strong>Pertanyaan:</strong> Teks soal (wajib diisi)</li>
                    <li><strong>Opsi Jawaban:</strong> Masukkan opsi jawaban (bisa lebih dari satu yang benar)</li>
                    <li><strong>Jawaban Benar:</strong> Pilih semua opsi yang benar (multiple choice)</li>
                    <li><strong>Pembahasan:</strong> Penjelasan jawaban (opsional)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Soal akan ditambahkan ke bank soal</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Soal Ganda Kompleks memiliki lebih dari satu jawaban benar. Siswa harus memilih semua jawaban yang benar untuk mendapatkan nilai penuh.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Soal Menjodohkan</h3>
        <ol class="step-list">
            <li>Pada halaman Detail Bank Soal, klik tab <code class="inline">Menjodohkan</code></li>
            <li>Klik tombol <code class="inline">+ Tambah Soal</code></li>
            <li>Isi formulir soal:
                <ul class="step-list">
                    <li><strong>Nomor Soal:</strong> Nomor urut soal</li>
                    <li><strong>Pertanyaan:</strong> Teks soal atau instruksi</li>
                    <li><strong>Pertanyaan (Kolom Kiri):</strong> Daftar item di kolom kiri</li>
                    <li><strong>Jawaban (Kolom Kanan):</strong> Daftar item di kolom kanan</li>
                    <li><strong>Pasangan Jawaban:</strong> Tentukan pasangan yang benar</li>
                    <li><strong>Pembahasan:</strong> Penjelasan jawaban (opsional)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Soal akan ditambahkan ke bank soal</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Pastikan jumlah item di kolom kiri dan kanan sama. Gunakan item yang jelas dan mudah dipasangkan.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Soal Isian Singkat</h3>
        <ol class="step-list">
            <li>Pada halaman Detail Bank Soal, klik tab <code class="inline">Isian Singkat</code></li>
            <li>Klik tombol <code class="inline">+ Tambah Soal</code></li>
            <li>Isi formulir soal:
                <ul class="step-list">
                    <li><strong>Nomor Soal:</strong> Nomor urut soal</li>
                    <li><strong>Pertanyaan:</strong> Teks soal dengan bagian yang harus diisi (wajib diisi)</li>
                    <li><strong>Jawaban Benar:</strong> Jawaban yang benar (bisa multiple)</li>
                    <li><strong>Pembahasan:</strong> Penjelasan jawaban (opsional)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Soal akan ditambahkan ke bank soal</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Soal Isian Singkat memerlukan koreksi manual oleh guru. Sistem tidak dapat menilai secara otomatis karena variasi jawaban yang mungkin.</div>
        </div>
        <hr>
        <h3>🠊 Menambah Soal Essay</h3>
        <ol class="step-list">
            <li>Pada halaman Detail Bank Soal, klik tab <code class="inline">Essay</code></li>
            <li>Klik tombol <code class="inline">+ Tambah Soal</code></li>
            <li>Isi formulir soal:
                <ul class="step-list">
                    <li><strong>Nomor Soal:</strong> Nomor urut soal</li>
                    <li><strong>Pertanyaan:</strong> Teks soal atau instruksi (wajib diisi)</li>
                    <li><strong>Jawaban Benar:</strong> Jawaban ideal atau kunci jawaban (untuk referensi guru)</li>
                    <li><strong>Pembahasan:</strong> Penjelasan jawaban (opsional)</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Soal akan ditambahkan ke bank soal</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Soal Essay memerlukan koreksi manual oleh guru. Berikan jawaban ideal yang jelas untuk memudahkan guru dalam penilaian.</div>
        </div>
        <hr>
        <h3>🠊 Mengedit Soal</h3>
        <ol class="step-list">
            <li>Pada halaman Detail Bank Soal, pilih tab jenis soal yang ingin diedit</li>
            <li>Cari soal yang ingin diedit di daftar soal</li>
            <li>Klik tombol <code class="inline">Edit</code> pada soal tersebut</li>
            <li>Ubah data soal sesuai kebutuhan</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Soal akan diperbarui</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Soal tidak dapat diedit jika bank soal sudah digunakan dalam jadwal ujian</li>
                    <li>Soal tidak dapat diedit jika bank soal sudah digunakan oleh siswa</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Menghapus Soal</h3>
        <ol class="step-list">
            <li>Pada halaman Detail Bank Soal, pilih tab jenis soal yang ingin dihapus</li>
            <li>Cari soal yang ingin dihapus di daftar soal</li>
            <li>Klik tombol <code class="inline">Hapus</code> pada soal tersebut</li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Soal akan dihapus dari bank soal</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Soal tidak dapat dihapus jika bank soal sudah digunakan dalam jadwal ujian</li>
                    <li>Soal tidak dapat dihapus jika bank soal sudah digunakan oleh siswa</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Memilih Soal untuk Ditampilkan</h3>
        <ol class="step-list">
            <li>Pada halaman Detail Bank Soal, centang soal yang ingin ditampilkan dalam ujian</li>
            <li>Klik tombol <code class="inline">Simpan Terpilih</code></li>
            <li>Soal yang dicentang akan ditampilkan dalam ujian</li>
            <li>Soal yang tidak dicentang tidak akan ditampilkan</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Anda dapat memiliki lebih banyak soal di bank soal daripada yang ditampilkan dalam ujian. Ini berguna untuk variasi soal di ujian berikutnya.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Pertanyaan yang jelas:</strong> Gunakan bahasa yang jelas dan tidak ambigu</li>
            <li><strong>Opsi homogen:</strong> Untuk pilihan ganda, pastikan opsi jawaban homogen</li>
            <li><strong>Variasi tingkat kesulitan:</strong> Buat soal dengan berbagai tingkat kesulitan</li>
            <li><strong>Pembahasan lengkap:</strong> Berikan pembahasan untuk membantu siswa belajar</li>
            <li><strong>Backup soal:</strong> Gunakan fitur Import/Export untuk backup soal</li>
            <li><strong>Review soal:</strong> Selalu review soal sebelum digunakan dalam ujian</li>
            <li><strong>Gunakan import:</strong> Untuk banyak soal, gunakan fitur Import dari Excel</li>
            <li><strong>Organisasi:</strong> Beri nomor soal yang konsisten dan mudah diikuti</li>
            <li><strong>Testing:</strong> Coba uji coba soal sebelum ujian sebenarnya</li>
            <li><strong>Dokumentasi:</strong> Buat dokumentasi internal tentang standar soal</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa menambah soal:</strong>
                <span>Pastikan bank soal belum digunakan dalam jadwal ujian atau oleh siswa. Pastikan semua field wajib sudah terisi dengan benar.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengedit soal:</strong>
                <span>Bank soal sudah digunakan dalam jadwal ujian atau sudah digunakan oleh siswa. Hapus atau pindahkan data terkait terlebih dahulu.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Soal tidak tersimpan:</strong>
                <span>Pastikan semua field wajib sudah terisi. Periksa koneksi internet saat menyimpan. Cek apakah ada error yang ditampilkan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Jumlah soal tidak sesuai:</strong>
                <span>Pastikan jumlah soal yang dibuat sesuai dengan konfigurasi bank soal. Jika kurang, bank soal akan ditandai sebagai "Belum selesai".</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Opsi jawaban tidak muncul:</strong>
                <span>Pastikan konfigurasi opsi jawaban di bank soal sudah diatur dengan benar (3, 4, atau 5 opsi).</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Auto-grade vs Manual:</strong> Soal Pilihan Ganda, Ganda Kompleks, dan Menjodohkan dapat dinilai otomatis oleh sistem. Soal Isian Singkat dan Essay perlu dikoreksi manual oleh guru.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Status Bank Soal:</strong> Bank soal akan ditandai sebagai "Belum selesai" jika jumlah soal yang dibuat kurang dari konfigurasi. Bank soal harus "selesai" sebelum dapat digunakan dalam jadwal ujian.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Soal Terpilih:</strong> Tidak semua soal di bank soal harus ditampilkan dalam ujian. Anda dapat memilih soal mana yang akan ditampilkan dengan mencentang soal tersebut.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Backup Soal:</strong> Gunakan fitur Download Soal untuk backup soal dalam format yang dapat dicetak. Gunakan fitur Copy Bank Soal untuk membuat bank soal baru berdasarkan yang sudah ada.
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Semua operasi Tambah Soal menggunakan AJAX POST ke controller <code>Cbtbanksoal</code> dan mengembalikan respons JSON. Hanya Administrator dan Guru yang memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>POST</td><td><code>cbtbanksoal/tambahSoal</code></td><td>Tambah soal kosong baru</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/saveSoal</code></td><td>Simpan soal (tambah atau edit)</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/hapusSoal</code></td><td>Hapus soal</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/resetNumber</code></td><td>Reset nomor soal</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/uploadFile</code></td><td>Upload file untuk soal</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/upload_image</code></td><td>Upload gambar untuk Summernote</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/uploadSoalImage</code></td><td>Upload gambar soal</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/deleteFile</code></td><td>Hapus file soal</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/saveSelected</code></td><td>Simpan soal terpilih untuk ditampilkan di ujian</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/getSoalByNomor</code></td><td>Ambil soal berdasarkan nomor</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtbanksoal/saveSoal</code> — Simpan Soal</h3>
        <p>Endpoint ini menangani operasi tambah dan edit soal dengan berbagai jenis.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>method</code></td><td>Ya</td><td><code>"add"</code> untuk tambah, <code>"edit"</code> untuk edit</td></tr>
                <tr><td><code>bank_id</code></td><td>Ya</td><td>ID bank soal</td></tr>
                <tr><td><code>jenis</code></td><td>Ya</td><td>Jenis soal (1: Pilihan Ganda, 2: Kompleks, 3: Menjodohkan, 4: Isian, 5: Esai)</td></tr>
                <tr><td><code>nomor_soal</code></td><td>Ya</td><td>Nomor soal</td></tr>
                <tr><td><code>soal</code></td><td>Ya</td><td>Isi soal (HTML)</td></tr>
                <tr><td><code>soal_id</code></td><td>Tidak</td><td>ID soal (hanya untuk edit)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": "Soal berhasil dibuat" }</pre>

        <h3 style="margin-top:20px;">POST <code>cbtbanksoal/hapusSoal</code> — Hapus Soal</h3>
        <p>Endpoint ini menangani operasi penghapusan soal.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>soal_id</code></td><td>Ya</td><td>ID soal yang akan dihapus</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Semua operasi yang mengubah data (tambah, edit, hapus) dicatat ke tabel log aktivitas dengan kode aksi: <code>3</code> = tambah, <code>4</code> = edit, <code>5</code> = hapus.</div>
        </div>
    </div>`
};
