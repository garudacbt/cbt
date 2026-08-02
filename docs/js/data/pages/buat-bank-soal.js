if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['buat-bank-soal'] = {
    title: 'Buat Bank Soal',
    desc: 'Panduan lengkap membuat bank soal untuk ujian CBT di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-folder-open"></i> Membuat Bank Soal</h2>
        <p>Bank Soal adalah tempat menyimpan kumpulan soal yang akan digunakan untuk ujian CBT. Administrator dan Guru memiliki akses ke menu ini. Setiap bank soal dapat berisi berbagai jenis soal seperti Pilihan Ganda, Ganda Kompleks, Menjodohkan, Isian Singkat, dan Essay.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Bank Soal</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Bank Soal</code></li>
            <li>Halaman Bank Soal akan ditampilkan dengan daftar bank soal yang ada</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan tahun pelajaran dan semester sudah diaktifkan sebelum membuat bank soal. Guru hanya dapat melihat dan mengelola bank soal yang mereka buat sendiri.</div>
        </div>
        <hr>
        <h3>🠊 Membuat Bank Soal Baru</h3>
        <ol class="step-list">
            <li>Pada halaman Bank Soal, klik tombol <code class="inline">Tambah Bank Soal</code> di pojok kanan atas</li>
            <li>Halaman Buat Bank Soal akan ditampilkan dengan form input</li>
            <li>Isi formulir informasi bank soal:
                <ul class="step-list">
                    <li><strong>Kode Bank Soal:</strong> Kode unik untuk bank soal (wajib diisi, maksimal 20 karakter)</li>
                    <li><strong>Mata Pelajaran:</strong> Pilih mata pelajaran dari dropdown</li>
                    <li><strong>Guru Pengampu:</strong> Pilih guru yang mengampu mata pelajaran tersebut</li>
                    <li><strong>Level:</strong> Pilih level kelas (sesuai jenjang sekolah)</li>
                    <li><strong>Pilih Kelas:</strong> Pilih kelas-kelas yang akan menggunakan bank soal ini (bisa multiple)</li>
                </ul>
            </li>
            <li>Atur konfigurasi soal untuk setiap jenis:
                <ul class="step-list">
                    <li><strong>Soal Pilihan Ganda:</strong> Jumlah soal, bobot %, dan opsi jawaban (3, 4, atau 5)</li>
                    <li><strong>Soal Ganda Kompleks:</strong> Jumlah soal dan bobot %</li>
                    <li><strong>Soal Menjodohkan:</strong> Jumlah soal dan bobot %</li>
                    <li><strong>Soal Isian Singkat:</strong> Jumlah soal dan bobot %</li>
                    <li><strong>Soal Uraian/Essai:</strong> Jumlah soal dan bobot %</li>
                </ul>
            </li>
            <li>Perhatikan Total Soal dan Total Bobot yang dihitung otomatis</li>
            <li>Pilih <strong>Mapel Agama</strong> jika ini adalah mata pelajaran agama</li>
            <li>Pilih <strong>Status Bank Soal:</strong> Aktif atau Non Aktif</li>
            <li>Klik tombol <code class="inline">Simpan</code></li>
            <li>Bank soal baru akan dibuat dan dapat diisi dengan soal</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Total bobot sebaiknya 100% untuk memudahkan perhitungan nilai. Gunakan kode bank soal yang deskriptif seperti "MTK-K7-UTS1" untuk Matematika Kelas 7 UTS 1.</div>
        </div>
        <hr>
        <h3>🠊 Memahami Kode Warna Bank Soal</h3>
        <ol class="step-list">
            <li><strong>Abu-abu (text-muted):</strong> Bank soal tidak digunakan (bisa dihapus)</li>
            <li><strong>Kuning (text-yellow):</strong> Bank soal digunakan dalam jadwal ujian</li>
            <li><strong>Merah (text-maroon):</strong> Bank soal sudah digunakan oleh siswa (tidak bisa diedit)</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Bank soal yang sudah digunakan oleh siswa tidak dapat diedit atau dihapus</li>
                    <li>Bank soal yang digunakan dalam jadwal ujian tidak dapat diedit</li>
                    <li>Hapus bank soal yang tidak terpakai untuk menjaga kebersihan data</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Filter Bank Soal</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter</code> untuk memfilter berdasarkan:
                <ul class="step-list">
                    <li>Semua: Menampilkan semua bank soal</li>
                    <li>Guru: Filter berdasarkan guru pembuat</li>
                    <li>Mapel: Filter berdasarkan mata pelajaran</li>
                    <li>Level: Filter berdasarkan level kelas</li>
                </ul>
            </li>
            <li>Pilih filter yang diinginkan</li>
            <li>Dropdown tambahan akan muncul sesuai filter yang dipilih</li>
            <li>Tabel akan menampilkan bank soal sesuai filter</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk menemukan bank soal tertentu dengan cepat, terutama jika jumlah bank soal sangat banyak.</div>
        </div>
        <hr>
        <h3>🠊 Mode Tampilan</h3>
        <ol class="step-list">
            <li>Gunakan tombol mode tampilan di pojok kanan atas:
                <ul class="step-list">
                    <li><strong>Mode List (ikon list):</strong> Menampilkan bank soal dalam bentuk tabel</li>
                    <li><strong>Mode Grid (ikon grid):</strong> Menampilkan bank soal dalam bentuk kartu</li>
                </ul>
            </li>
            <li>Klik tombol mode yang diinginkan</li>
            <li>Tampilan akan berubah sesuai mode yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Mode Grid memberikan tampilan yang lebih visual dengan informasi lengkap dalam kartu, sedangkan Mode List memberikan tampilan yang lebih ringkas dalam tabel.</div>
        </div>
        <hr>
        <h3>🠊 Copy Bank Soal</h3>
        <ol class="step-list">
            <li>Pada halaman Bank Soal, klik tombol <code class="inline">Copy Bank Soal</code></li>
            <li>Modal akan muncul dengan daftar bank soal yang tersedia</li>
            <li>Pilih bank soal yang ingin disalin</li>
            <li>Klik tombol <code class="inline">Copy</code></li>
            <li>Bank soal akan disalin dengan kode baru dan kelas yang disesuaikan</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Fitur Copy sangat berguna untuk membuat bank soal baru berdasarkan bank soal yang sudah ada, misalnya untuk ujian berikutnya dengan soal yang sama namun kelas berbeda.</div>
        </div>
        <hr>
        <h3>🠊 Hapus Bank Soal</h3>
        <ol class="step-list">
            <li>Pilih bank soal yang ingin dihapus dengan checkbox</li>
            <li>Klik tombol <code class="inline">Hapus terpilih</code></li>
            <li>Konfirmasi akan muncul</li>
            <li>Klik tombol konfirmasi untuk melanjutkan</li>
            <li>Bank soal akan dihapus beserta semua soal di dalamnya</li>
        </ol>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Bank soal yang sudah digunakan dalam jadwal ujian tidak dapat dihapus</li>
                    <li>Bank soal yang sudah digunakan oleh siswa tidak dapat dihapus</li>
                    <li>Tindakan ini akan menghapus semua soal dalam bank soal</li>
                    <li>Tindakan ini tidak dapat dibatalkan</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Download Soal</h3>
        <ol class="step-list">
            <li>Pada tabel atau kartu bank soal, klik tombol <code class="inline">Download Soal</code></li>
            <li>Soal akan didownload dalam format yang dapat dicetak</li>
            <li>Fitur ini berguna untuk ujian kertas atau dokumentasi</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Catatan:</strong> Download soal berguna untuk keperluan ujian kertas atau sebagai backup dokumentasi soal.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Kode yang deskriptif:</strong> Gunakan format kode yang konsisten dan mudah dipahami</li>
            <li><strong>Total bobot 100%:</strong> Pastikan total bobot semua jenis soal adalah 100% untuk memudahkan perhitungan</li>
            <li><strong>Organisasi bank soal:</strong> Buat bank soal terpisah untuk setiap ujian (UTS, UAS, dll)</li>
            <li><strong>Filter dengan bijak:</strong> Gunakan filter untuk menemukan bank soal dengan cepat</li>
            <li><strong>Copy untuk efisiensi:</strong> Gunakan fitur Copy untuk membuat bank soal baru berdasarkan yang sudah ada</li>
            <li><strong>Hapus yang tidak terpakai:</strong> Hapus bank soal yang tidak digunakan untuk menjaga kebersihan data</li>
            <li><strong>Status aktif:</strong> Set status bank soal ke Non Aktif jika tidak digunakan sementara</li>
            <li><strong>Backup sebelum hapus:</strong> Selalu backup data sebelum menghapus bank soal</li>
            <li><strong>Dokumentasi:</strong> Buat dokumentasi internal tentang format kode bank soal untuk referensi tim</li>
            <li><strong>Testing:</strong> Setelah membuat bank soal, coba tambahkan beberapa soal untuk memastikan berfungsi dengan benar</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa membuat bank soal:</strong>
                <span>Pastikan semua field wajib sudah terisi. Pastikan guru dan mapel sudah ada di sistem. Pastikan kelas sudah dibuat untuk tahun pelajaran dan semester aktif.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Kelas tidak muncul di dropdown:</strong>
                <span>Pastikan kelas sudah dibuat di menu Kelas / Rombel untuk tahun pelajaran dan semester aktif. Pastikan juga guru sudah ditugaskan ke kelas dan mapel yang sesuai.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Tidak bisa mengedit bank soal:</strong>
                <span>Bank soal yang sudah digunakan dalam jadwal ujian atau sudah digunakan oleh siswa tidak dapat diedit. Hapus atau pindahkan data terkait terlebih dahulu.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Total bobot tidak 100%:</strong>
                <span>Ini tidak masalah, namun disarankan total bobot 100% untuk memudahkan perhitungan nilai. Sesuaikan bobot setiap jenis soal agar totalnya 100%.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Guru tidak muncul di dropdown:</strong>
                <span>Pastikan guru sudah ditugaskan sebagai pengampu mapel di menu Jabatan Guru. Pastikan juga mapel sudah dipilih terlebih dahulu.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Copy bank soal gagal:</strong>
                <span>Pastikan nama kelas di semester sebelumnya dan semester sekarang sesuai atau memiliki mapping yang benar. Jika nama kelas berbeda, sistem mungkin tidak dapat menemukan kelas yang sesuai.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data per tahun pelajaran:</strong> Bank soal dibuat per tahun pelajaran dan semester. Data di tahun pelajaran berbeda adalah data yang terpisah, sehingga perlu dibuat ulang setiap tahun pelajaran baru.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Mapel Agama:</strong> Jika bank soal untuk mapel agama, pilih agama yang sesuai. Soal akan diberikan ke siswa sesuai agama yang dianut.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Status Bank Soal:</strong> Bank soal dengan status Non Aktif tidak akan muncul dalam pilihan saat membuat jadwal ujian. Gunakan status ini untuk bank soal yang sedang dalam proses pembuatan atau tidak digunakan sementara.
            </div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru hanya dapat melihat dan mengelola bank soal yang mereka buat sendiri. Administrator memiliki akses penuh ke semua bank soal.
            </div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Proses & API</h2>
        <p>Semua operasi Bank Soal menggunakan AJAX POST ke controller <code>Cbtbanksoal</code> dan mengembalikan respons JSON. Hanya Administrator dan Guru yang memiliki akses ke endpoint ini.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtbanksoal</code></td><td>Tampilkan halaman daftar bank soal</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/data/{guru}</code></td><td>Ambil data semua bank soal</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/dataTable/{guru}</code></td><td>Ambil data semua bank soal untuk DataTables</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/addBank</code></td><td>Tampilkan halaman tambah bank soal</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/editBank</code></td><td>Tampilkan halaman edit bank soal</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/saveBank</code></td><td>Simpan bank soal baru atau edit yang ada</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/deleteBank</code></td><td>Hapus satu bank soal</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/deleteAllBank</code></td><td>Hapus bank soal secara bulk</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/get_detail</code></td><td>Ambil detail bank soal beserta soal-soalnya</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/detail/{id}</code></td><td>Tampilkan halaman detail bank soal</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/get_soals/{id}</code></td><td>Ambil semua soal dari bank soal</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/saveSelected</code></td><td>Simpan soal terpilih untuk ditampilkan di ujian</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/copyBankSoal/{id_bank}</code></td><td>Salin bank soal beserta semua soal di dalamnya</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/buatsoal/{id_bank}</code></td><td>Tampilkan halaman membuat soal</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/getSoalByNomor</code></td><td>Ambil soal berdasarkan nomor</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/tambahSoal</code></td><td>Tambah soal kosong baru</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/saveSoal</code></td><td>Simpan soal (tambah atau edit)</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/hapusSoal</code></td><td>Hapus soal</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/resetNumber</code></td><td>Reset nomor soal</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/uploadFile</code></td><td>Upload file untuk soal</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/upload_image</code></td><td>Upload gambar untuk Summernote</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/uploadSoalImage</code></td><td>Upload gambar soal</td></tr>
                <tr><td>POST</td><td><code>cbtbanksoal/deleteFile</code></td><td>Hapus file soal</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/importsoal/{id}</code></td><td>Tampilkan halaman import soal</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/getMapelGuru</code></td><td>Ambil mapel yang diajar oleh guru tertentu</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/getGuruMapel</code></td><td>Ambil guru yang mengajar mapel tertentu</td></tr>
                <tr><td>GET</td><td><code>cbtbanksoal/getKelasLevel</code></td><td>Ambil kelas berdasarkan level</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">POST <code>cbtbanksoal/saveBank</code> — Simpan Bank Soal</h3>
        <p>Endpoint ini menangani operasi tambah dan edit bank soal.</p>
        <table class="table-custom">
            <thead><tr><th>Field POST</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_bank</code></td><td>Tidak</td><td>ID bank soal (hanya untuk edit)</td></tr>
                <tr><td><code>kode</code></td><td>Ya</td><td>Kode unik bank soal</td></tr>
                <tr><td><code>id_guru</code></td><td>Ya</td><td>ID guru pengampu</td></tr>
                <tr><td><code>id_mapel</code></td><td>Ya</td><td>ID mata pelajaran</td></tr>
                <tr><td><code>level</code></td><td>Ya</td><td>Level kelas</td></tr>
                <tr><td><code>tampil_pg</code></td><td>Tidak</td><td>Jumlah soal pilihan ganda yang ditampilkan</td></tr>
                <tr><td><code>tampil_kompleks</code></td><td>Tidak</td><td>Jumlah soal pilihan ganda kompleks yang ditampilkan</td></tr>
                <tr><td><code>tampil_jodohkan</code></td><td>Tidak</td><td>Jumlah soal menjodohkan yang ditampilkan</td></tr>
                <tr><td><code>tampil_isian</code></td><td>Tidak</td><td>Jumlah soal isian yang ditampilkan</td></tr>
                <tr><td><code>tampil_esai</code></td><td>Tidak</td><td>Jumlah soal esai yang ditampilkan</td></tr>
                <tr><td><code>bobot_pg</code></td><td>Tidak</td><td>Bobot soal pilihan ganda</td></tr>
                <tr><td><code>bobot_kompleks</code></td><td>Tidak</td><td>Bobot soal pilihan ganda kompleks</td></tr>
                <tr><td><code>bobot_jodohkan</code></td><td>Tidak</td><td>Bobot soal menjodohkan</td></tr>
                <tr><td><code>bobot_isian</code></td><td>Tidak</td><td>Bobot soal isian</td></tr>
                <tr><td><code>bobot_esai</code></td><td>Tidak</td><td>Bobot soal esai</td></tr>
                <tr><td><code>opsi</code></td><td>Tidak</td><td>Jumlah opsi jawaban pilihan ganda (3/4/5)</td></tr>
                <tr><td><code>agama</code></td><td>Tidak</td><td>Status mapel agama (1/0)</td></tr>
                <tr><td><code>status</code></td><td>Ya</td><td>Status bank soal (1: Aktif, 0: Non Aktif)</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON — sukses:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{ "status": true }</pre>

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

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Semua operasi yang mengubah data (tambah, edit, hapus) dicatat ke tabel log aktivitas dengan kode aksi: <code>3</code> = tambah, <code>4</code> = edit, <code>5</code> = hapus.</div>
        </div>
    </div>`
};
