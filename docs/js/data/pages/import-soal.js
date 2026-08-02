if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['import-soal'] = {
    title: 'Import Soal',
    desc: 'Panduan lengkap import soal dari file Word ke bank soal di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-file-word"></i> Import Soal dari Word</h2>
        <p>Fitur import memungkinkan menambah banyak soal sekaligus dari file Word (.doc/.docx) ke dalam bank soal yang dipilih. Ini sangat berguna untuk memindahkan soal dari format lama atau untuk menambah soal dalam jumlah besar secara efisien.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Fitur Import Soal</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Bank Soal</code></li>
            <li>Pilih bank soal yang ingin diisi dengan soal</li>
            <li>Klik tombol <code class="inline">Detail</code> pada bank soal tersebut</li>
            <li>Pada halaman Detail Bank Soal, klik tombol <code class="inline">Import Soal</code></li>
            <li>Modal import akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan bank soal belum digunakan dalam jadwal ujian atau oleh siswa sebelum melakukan import soal.</div>
        </div>
        <hr>
        <h3>🠊 Download Template Word</h3>
        <ol class="step-list">
            <li>Pada modal Import Soal, klik tombol <code class="inline">Download Template</code></li>
            <li>File template Word akan didownload ke komputer Anda</li>
            <li>Buka file template tersebut menggunakan Microsoft Word atau aplikasi pengolah dokumen lainnya</li>
            <li>Template berisi format standar untuk setiap jenis soal yang dikonfigurasi di bank soal</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Template yang didownload sudah disesuaikan dengan konfigurasi bank soal Anda. Template menggunakan format standar AKM (Asesmen Kompetensi Minimum).</div>
        </div>
        <hr>
        <h3>🠊 Format Template untuk Pilihan Ganda</h3>
        <p>Format Pilihan Ganda dalam template Word menggunakan struktur tabel atau format teks yang telah ditentukan:</p>
        <ul class="step-list">
            <li><strong>Nomor Soal:</strong> Nomor urut soal (1, 2, 3, ...)</li>
            <li><strong>Pertanyaan:</strong> Teks pertanyaan soal</li>
            <li><strong>Opsi Jawaban:</strong> Pilihan jawaban A, B, C, D, atau E</li>
            <li><strong>Kunci Jawaban:</strong> Jawaban yang benar (ditandai dengan format khusus)</li>
            <li><strong>Pembahasan:</strong> Penjelasan jawaban (opsional)</li>
        </ul>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Ikuti format template yang disediakan. Kunci jawaban ditandai dengan format bold atau highlight sesuai contoh di template.</div>
        </div>
        <hr>
        <h3>🠊 Format Template untuk Ganda Kompleks</h3>
        <p>Format Ganda Kompleks dalam template Word menggunakan struktur yang telah ditentukan:</p>
        <ul class="step-list">
            <li><strong>Nomor Soal:</strong> Nomor urut soal</li>
            <li><strong>Pertanyaan:</strong> Teks pertanyaan</li>
            <li><strong>Opsi Jawaban:</strong> Daftar opsi jawaban yang tersedia</li>
            <li><strong>Kunci Jawaban:</strong> Jawaban benar (bisa lebih dari satu)</li>
            <li><strong>Pembahasan:</strong> Penjelasan jawaban (opsional)</li>
        </ul>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Untuk ganda kompleks, kunci jawaban dapat terdiri dari lebih dari satu opsi yang benar. Ikuti format penandaan kunci sesuai template.</div>
        </div>
        <hr>
        <h3>🠊 Format Template untuk Menjodohkan</h3>
        <p>Format Menjodohkan dalam template Word menggunakan struktur tabel dua kolom:</p>
        <ul class="step-list">
            <li><strong>Nomor Soal:</strong> Nomor urut soal</li>
            <li><strong>Instruksi:</strong> Teks instruksi soal</li>
            <li><strong>Kolom Kiri:</strong> Item pertanyaan yang harus dijodohkan</li>
            <li><strong>Kolom Kanan:</strong> Item jawaban yang tersedia</li>
            <li><strong>Pasangan:</strong> Jawaban yang benar (ditandai sesuai format)</li>
            <li><strong>Pembahasan:</strong> Penjelasan jawaban (opsional)</li>
        </ul>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Pastikan jumlah item di kolom kiri dan kanan sama. Gunakan format penandaan pasangan sesuai contoh di template.</div>
        </div>
        <hr>
        <h3>🠊 Format Template untuk Isian Singkat</h3>
        <p>Format Isian Singkat dalam template Word menggunakan struktur yang telah ditentukan:</p>
        <ul class="step-list">
            <li><strong>Nomor Soal:</strong> Nomor urut soal</li>
            <li><strong>Pertanyaan:</strong> Teks pertanyaan dengan tempat kosong untuk jawaban</li>
            <li><strong>Kunci Jawaban:</strong> Jawaban yang benar (bisa multiple)</li>
            <li><strong>Pembahasan:</strong> Penjelasan jawaban (opsional)</li>
        </ul>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Untuk isian singkat, Anda dapat memberikan beberapa jawaban yang diterima. Sistem akan menilai benar jika jawaban siswa cocok dengan salah satu kunci.</div>
        </div>
        <hr>
        <h3>🠊 Format Template untuk Essay</h3>
        <p>Format Essay dalam template Word menggunakan struktur yang telah ditentukan:</p>
        <ul class="step-list">
            <li><strong>Nomor Soal:</strong> Nomor urut soal</li>
            <li><strong>Pertanyaan/Instruksi:</strong> Teks pertanyaan atau instruksi penugasan</li>
            <li><strong>Kunci Jawaban:</strong> Jawaban ideal atau pedoman penilaian</li>
            <li><strong>Pembahasan:</strong> Penjelasan jawaban (opsional)</li>
        </ul>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Berikan jawaban ideal yang jelas untuk memudahkan guru dalam penilaian. Jawaban ideal tidak wajib diisi namun sangat disarankan.</div>
        </div>
        <hr>
        <h3>🠊 Mengisi Template Word</h3>
        <ol class="step-list">
            <li>Buka file template yang sudah didownload</li>
            <li>Ikuti format yang telah disediakan dalam template</li>
            <li>Isi soal sesuai dengan format yang telah dijelaskan</li>
            <li>Gunakan format penandaan kunci jawaban sesuai contoh</li>
            <li>Pastikan semua informasi wajib terisi</li>
            <li>Hapus contoh soal jika tidak diperlukan</li>
            <li>Simpan file dalam format .doc atau .docx</li>
        </ol>
        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Jangan mengubah struktur format template</li>
                    <li>Gunakan format penandaan kunci jawaban yang sesuai</li>
                    <li>Pastikan format file adalah .doc atau .docx</li>
                    <li>Hapus contoh soal sebelum import</li>
                    <li>Pastikan file tidak terproteksi atau terkunci</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Upload dan Proses Import</h3>
        <ol class="step-list">
            <li>Kembali ke modal Import Soal di GarudaCBT</li>
            <li>Klik tombol <code class="inline">Pilih File</code></li>
            <li>Navigasi ke file Word yang telah diisi</li>
            <li>Pilih file dan klik <code class="inline">Open</code></li>
            <li>Nama file akan ditampilkan di modal</li>
            <li>Klik tombol <code class="inline">Upload</code></li>
            <li>Sistem akan memproses file dan mengimport soal</li>
            <li>Tunggu hingga proses selesai</li>
            <li>Notifikasi sukses akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Waktu proses tergantung pada jumlah soal yang diimport. Sistem akan membaca file Word dan mengekstrak soal sesuai format yang ditentukan.</div>
        </div>
        <hr>
        <h3>🠊 Verifikasi Hasil Import</h3>
        <ol class="step-list">
            <li>Setelah proses selesai, tutup modal import</li>
            <li>Refresh halaman Detail Bank Soal</li>
            <li>Cek tab jenis soal yang diimport</li>
            <li>Pastikan jumlah soal sesuai dengan yang diimport</li>
            <li>Buka beberapa soal untuk verifikasi konten</li>
            <li>Pastikan format soal benar dan tidak ada error</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Selalu verifikasi hasil import sebelum menggunakan bank soal untuk ujian. Cek beberapa soal secara acak untuk memastikan data terimport dengan benar.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Gunakan template resmi:</strong> Selalu download template terbaru dari sistem</li>
            <li><strong>Backup data:</strong> Backup file Word sebelum import</li>
            <li><strong>Batch import:</strong> Import soal per jenis untuk memudahkan troubleshooting</li>
            <li><strong>Validasi data:</strong> Cek data di Word sebelum upload</li>
            <li><strong>Hapus contoh soal:</strong> Pastikan contoh soal dihapus sebelum import</li>
            <li><strong>Format konsisten:</strong> Gunakan format yang konsisten untuk semua soal</li>
            <li><strong>Test kecil:</strong> Coba import beberapa soal dulu sebelum import besar</li>
            <li><strong>Verifikasi hasil:</strong> Selalu cek hasil import setelah proses selesai</li>
            <li><strong>Dokumentasi:</strong> Simpan file Word sebagai dokumentasi soal</li>
            <li><strong>Review soal:</strong> Review soal setelah import sebelum digunakan</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Import gagal:</strong>
                <span>Pastikan format file adalah .doc atau .docx. Pastikan file tidak rusak atau korup. Cek apakah format soal sesuai template. Pastikan file tidak terproteksi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Data tidak tersimpan dengan benar:</strong>
                <span>Pastikan format soal sesuai template. Pastikan penandaan kunci jawaban benar. Cek apakah ada karakter khusus yang menyebabkan error parsing.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Jumlah soal tidak sesuai:</strong>
                <span>Pastikan semua soal menggunakan format yang benar. Cek apakah ada duplikasi nomor soal. Pastikan contoh soal sudah dihapus.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kunci jawaban error:</strong>
                <span>Pastikan penandaan kunci jawaban sesuai format template. Gunakan bold atau highlight sesuai contoh. Pastikan format konsisten untuk semua soal.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Format tidak dikenali:</strong>
                <span>Pastikan menggunakan template resmi dari sistem. Download template baru jika format berubah. Pastikan struktur dokumen tidak diubah.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Proses sangat lambat:</strong>
                <span>Waktu proses tergantung jumlah soal dan spesifikasi server. Untuk ribuan soal, proses mungkin memakan waktu beberapa menit. Tunggu hingga proses selesai.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Override data:</strong> Import soal akan menambah soal baru ke bank soal. Import tidak akan menghapus atau mengganti soal yang sudah ada.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Duplikasi nomor:</strong> Jika ada nomor soal yang sama dengan soal yang sudah ada, sistem akan membuat nomor baru secara otomatis.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Limit ukuran file:</strong> Pastikan ukuran file Word tidak terlalu besar. Untuk ribuan soal, pertimbangkan untuk membagi menjadi beberapa file.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Backup:</strong> Selalu backup file Word sebagai dokumentasi. File ini dapat digunakan untuk import ke bank soal lain di tahun pelajaran berikutnya.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Semua operasi Import Soal menggunakan AJAX POST ke controller <code>Cbtbanksoal</code> dan mengembalikan respons JSON. Hanya Administrator dan Guru yang memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtbanksoal/importsoal/{id}</code></td><td>Tampilkan halaman import soal</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/importExcel</code></td><td>Proses import soal dari file Word</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/downloadTemplate/{id}</code></td><td>Download template Word untuk import</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtbanksoal/importExcel</code> — Import Soal dari Word</h3>
        <p>Endpoint ini menangani operasi import soal dari file Word (.doc/.docx).</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>bank_id</code></td><td>Ya</td><td>ID bank soal tujuan</td></tr>
                <tr><td><code>upload_file</code></td><td>Ya</td><td>File Word (.doc/.docx) yang diupload</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true, "message": "Import berhasil", "total": 50 }</pre>
        <p style="margin-top:8px;"><strong>Respons JSON — gagal:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": false, "message": "Format file tidak valid" }</pre>

        <h3 style="margin-top:20px;">Format File Word</h3>
        <p>File Word harus menggunakan format template standar AKM (format_soal_akm.docx). Format template mencakup struktur untuk semua jenis soal yang dikonfigurasi di bank soal:</p>
        <ul class="step-list">
            <li><strong>Pilihan Ganda</strong> — Format soal pilihan ganda dengan opsi A-E</li>
            <li><strong>Ganda Kompleks</strong> — Format soal dengan multiple jawaban benar</li>
            <li><strong>Menjodohkan</strong> — Format soal menjodohkan dengan dua kolom</li>
            <li><strong>Isian Singkat</strong> — Format soal isian singkat</li>
            <li><strong>Essay</strong> — Format soal essay</li>
        </ul>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Operasi import dicatat ke tabel log aktivitas. Sistem akan membaca file Word dan mengekstrak soal berdasarkan format template yang ditentukan.</div>
        </div>
    </div>`
};
