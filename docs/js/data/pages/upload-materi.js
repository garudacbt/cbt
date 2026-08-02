if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['upload-materi'] = {
    title: 'Upload Materi',
    desc: 'Panduan lengkap upload file materi secara massal di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-upload"></i> Upload Materi Massal</h2>
        <p>Fitur upload materi memungkinkan mengupload banyak file sekaligus ke dalam sistem. Fitur ini sangat berguna untuk mengupload materi dalam jumlah besar secara efisien. Guru memiliki akses ke menu ini untuk mengelola materi pembelajaran secara massal.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Fitur Upload Materi</h3>
        <ol class="step-list">
            <li>Login sebagai Guru ke sistem</li>
            <li>Buka menu <code class="inline">E-Learning</code></li>
            <li>Klik submenu <code class="inline">Materi</code></li>
            <li>Klik tombol <code class="inline">Upload Materi</code> di pojok kanan atas</li>
            <li>Halaman Upload Materi akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan mata pelajaran dan kelas sudah diatur sebelum upload materi. File yang diupload akan otomatis ditugaskan ke mapel dan kelas yang dipilih.</div>
        </div>
        <hr>
        <h3>🠊 Melakukan Upload Massal</h3>
        <ol class="step-list">
            <li>Pada halaman Upload Materi, pilih mata pelajaran dari dropdown</li>
            <li>Pilih kelas tujuan dari dropdown (bisa multiple)</li>
            <li>Klik tombol <code class="inline">Pilih File</code></li>
            <li>Pilih file yang ingin diupload (bisa multiple selection)</li>
            <li>Daftar file yang dipilih akan ditampilkan</li>
            <li>Isi judul untuk setiap file:
                <ul class="step-list">
                    <li><strong>Judul:</strong> Judul materi (wajib diisi)</li>
                    <li><strong>Deskripsi:</strong> Deskripsi materi (opsional)</li>
                </ul>
            </li>
            <li>Periksa ringkasan informasi yang ditampilkan</li>
            <li>Klik tombol <code class="inline">Upload</code></li>
            <li>Proses upload akan dimulai</li>
            <li>Konfirmasi keberhasilan akan ditampilkan</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan nama file yang deskriptif sebelum upload. Judul akan otomatis diisi berdasarkan nama file, namun dapat diedit sesuai kebutuhan.</div>
        </div>
        <hr>
        <h3>🠊 Format File yang Didukung</h3>
        <ol class="step-list">
            <li><strong>PDF (.pdf):</strong> Dokumen PDF, cocok untuk materi teks dan gambar</li>
            <li><strong>Microsoft Word (.doc, .docx):</strong> Dokumen Word, dapat diedit</li>
            <li><strong>Microsoft PowerPoint (.ppt, .pptx):</strong> Presentasi PowerPoint</li>
            <li><strong>Excel (.xls, .xlsx):</strong> Spreadsheet Excel</li>
            <li><strong>Image (.jpg, .png, .gif):</strong> File gambar</li>
            <li><strong>Video (.mp4, .avi):</strong> File video (tergantung konfigurasi server)</li>
            <li><strong>Audio (.mp3, .wav):</strong> File audio (tergantung konfigurasi server)</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Batasi ukuran file maksimal 10MB per file untuk menghindari masalah upload</li>
                    <li>Total ukuran semua file dalam satu batch tidak boleh melebihi 100MB</li>
                    <li>Pastikan file tidak mengandung virus atau malware</li>
                    <li>Gunakan format yang kompatibel dengan perangkat siswa</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Memahami Proses Upload</h3>
        <ol class="step-list">
            <li><strong>Validasi File:</strong> Sistem akan memvalidasi format dan ukuran file</li>
            <li><strong>Upload Progress:</strong> Progress bar akan menampilkan status upload</li>
            <li><strong>Auto-naming:</strong> Judul otomatis diisi berdasarkan nama file</li>
            <li><strong>Batch Processing:</strong> File diupload satu per satu dalam batch</li>
            <li><strong>Error Handling:</strong> File yang gagal akan ditampilkan dengan pesan error</li>
            <li><strong>Completion:</strong> Notifikasi akan ditampilkan setelah semua file selesai</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Jika ada file yang gagal upload, periksa pesan error dan coba lagi. File yang berhasil akan tetap tersimpan di sistem.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Organisasi file:</strong> Kelompokkan file berdasarkan bab atau topik</li>
            <li><strong>Nama file deskriptif:</strong> Gunakan nama file yang jelas dan deskriptif</li>
            <li><strong>Ukuran optimal:</strong> Kompres file jika ukuran terlalu besar</li>
            <li><strong>Batch kecil:</strong> Upload dalam batch kecil untuk stabilitas</li>
            <li><strong>Koneksi stabil:</strong> Pastikan koneksi internet stabil saat upload</li>
            <li><strong>Format konsisten:</strong> Gunakan format file yang konsisten</li>
            <li><strong>Review judul:</strong> Review dan edit judul setelah upload</li>
            <li><strong>Backup lokal:</strong> Selalu backup file secara lokal</li>
            <li><strong>Testing:</strong> Coba download file setelah upload untuk verifikasi</li>
            <li><strong>Dokumentasi:</strong> Catat file yang sudah diupload untuk referensi</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Upload gagal:</strong>
                <span>Pastikan ukuran file tidak melebihi 10MB per file. Pastikan total ukuran batch tidak melebihi 100MB. Periksa koneksi internet dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Format tidak didukung:</strong>
                <span>Pastikan format file sesuai dengan yang didukung sistem. Konversi file ke format yang didukung jika perlu.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>File tidak terupload:</strong>
                <span>Pastikan file sudah dipilih dengan benar. Periksa apakah ada error yang ditampilkan. Coba upload satu file per kali untuk isolasi masalah.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Progress berhenti:</strong>
                <span>Pastikan koneksi internet stabil. Refresh halaman dan coba lagi. Jika masalah berlanjut, hubungi administrator.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Judul tidak terisi:</strong>
                <span>Judul akan otomatis diisi berdasarkan nama file. Jika nama file tidak valid, isi judul manual sebelum upload.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> Materi diupload per tahun pelajaran dan semester. Data di tahun pelajaran berbeda adalah data yang terpisah.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Batasan Ukuran:</strong> Batas ukuran file ditentukan oleh konfigurasi server. Hubungi administrator jika perlu mengubah batas ukuran.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru hanya dapat upload materi untuk mapel yang mereka ampu. Administrator memiliki akses penuh ke semua mapel.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Upload vs Tambah Manual:</strong> Gunakan Upload Materi untuk banyak file sekaligus. Gunakan Tambah Materi untuk satu file dengan detail lengkap.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru hanya dapat mengunggah lampiran untuk materi mapel yang mereka ampu. Administrator memiliki akses penuh.
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Upload dan penghapusan lampiran materi ditangani oleh controller <code>Elearning</code> melalui AJAX dan mengembalikan respons JSON. File disimpan di folder <code>./uploads/materi/</code>.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>POST</td><td><code>elearning/uploadFile</code></td><td>Upload satu file lampiran materi</td></tr>
                <tr><td>POST</td><td><code>elearning/deleteFile</code></td><td>Hapus file lampiran dari server</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>elearning/uploadFile</code> — Upload Lampiran</h3>
        <p>Endpoint ini mengunggah file menggunakan library <code>upload</code> CodeIgniter dan mengembalikan path relatif yang akan disimpan ke field <code>file</code> di tabel <code>kelas_materi</code>.</p>
        <table class="table-custom">
            <thead><tr><th>Field</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>file_uploads</code> (file)</td><td>File yang diunggah</td></tr>
                <tr><td><code>max-size</code></td><td>Batas ukuran maksimum dalam KB</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Tipe file diizinkan:</strong> <code>jpg, jpeg, png, gif, mpeg, mp3, wav, mp4, avi, doc, docx, xls, xlsx, ppt, pptx, csv, pdf, rtf, txt</code></p>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": true,
  "src": "uploads/materi/namafile.pdf",
  "filename": "namafile",
  "type": "application/pdf",
  "size": 12345
}</pre>
        <p style="margin-top:8px;"><strong>Respons JSON — gagal:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "status": false,
  "src": "<pesan error upload>"
}</pre>

        <h3 style="margin-top:20px;">POST <code>elearning/deleteFile</code> — Hapus Lampiran</h3>
        <p>Endpoint ini menghapus file fisik dari server menggunakan <code>safe_unlink()</code>.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>src</code></td><td>Path relatif file (misal <code>uploads/materi/namafile.pdf</code>)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Output (plain text):</strong> <code>File Delete Successfully</code> atau <code>Gagal</code></p>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <ul style="margin-bottom:0;">
                    <li>File di-overwrite bila nama sama (<code>overwrite = TRUE</code>).</li>
                    <li>Penghapusan file tidak otomatis menghapus referensi di field <code>file</code> materi — lakukan via UI agar data JSON ikut diperbarui.</li>
                    <li>Semua request menggunakan token CSRF dan session login aktif.</li>
                </ul>
            </div>
        </div>
    </div>`
};
