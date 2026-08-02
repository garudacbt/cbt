if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['hasil-ujian'] = {
    title: 'Hasil Ujian',
    desc: 'Panduan lengkap melihat hasil ujian siswa di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-chart-line"></i> Hasil Ujian Siswa</h2>
        <p>Hasil Ujian digunakan untuk melihat hasil ujian siswa secara individual. Fitur ini memungkinkan guru dan administrator melihat skor, jawaban, dan analisis detail performa setiap siswa untuk evaluasi dan perbaikan pembelajaran.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Hasil Ujian</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Hasil CBT</code></li>
            <li>Klik <code class="inline">Hasil Ujian</code></li>
            <li>Halaman Hasil Ujian akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Hasil Ujian hanya tersedia setelah ujian selesai dan semua jawaban sudah dikoreksi. Pastikan proses koreksi sudah selesai sebelum melihat hasil ujian.</div>
        </div>
        <hr>
        <h3>🠊 Melihat Hasil Ujian</h3>
        <ol class="step-list">
            <li>Pada halaman Hasil Ujian, pilih jadwal ujian yang akan dilihat</li>
            <li>Pilih kelas untuk memfilter siswa</li>
            <li>Daftar siswa dengan hasil ujian akan ditampilkan</li>
            <li>Informasi yang ditampilkan:
                <ul class="step-list">
                    <li><strong>Nama Siswa:</strong> Nama peserta ujian</li>
                    <li><strong>NIS:</strong> Nomor Induk Siswa</li>
                    <li><strong>Kelas:</strong> Kelas siswa</li>
                    <li><strong>Nilai:</strong> Skor ujian siswa</li>
                    <li><strong>Benar:</strong> Jumlah jawaban benar</li>
                    <li><strong>Salah:</strong> Jumlah jawaban salah</li>
                    <li><strong>Tidak Dijawab:</strong> Jumlah soal tidak dijawab</li>
                    <li><strong>Waktu:</strong> Waktu pengerjaan siswa</li>
                </ul>
            </li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Gunakan filter untuk melihat hasil per kelas atau mencari siswa tertentu. Ini akan memudahkan analisis hasil ujian.</div>
        </div>
        <hr>
        <h3>🠊 Detail Hasil Ujian Siswa</h3>
        <ol class="step-list">
            <li>Klik pada nama siswa di tabel Hasil Ujian</li>
            <li>Modal detail hasil ujian akan ditampilkan</li>
            <li>Informasi yang ditampilkan:
                <ul class="step-list">
                    <li>Informasi siswa (nama, NIS, kelas)</li>
                    <li>Ringkasan skor (nilai, benar, salah, tidak dijawab)</li>
                    <li>Waktu pengerjaan (mulai, selesai, durasi)</li>
                    <li>Detail jawaban per soal:
                        <ul class="step-list">
                            <li>Nomor soal</li>
                            <li>Jawaban siswa</li>
                            <li>Jawaban benar</li>
                            <li>Status (benar/salah/tidak dijawab)</li>
                            <li>Poin per soal</li>
                        </ul>
                    </li>
                    <li>Grafik performa (jika tersedia)</li>
                </ul>
            </li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Detail hasil ujian berguna untuk analisis mendalam dan memberikan feedback spesifik kepada siswa.</div>
        </div>
        <hr>
        <h3>🠊 Filter dan Pencarian</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter Kelas</code> untuk memfilter berdasarkan kelas</li>
            <li>Gunakan dropdown <code class="inline">Filter Rentang Nilai</code> untuk memfilter berdasarkan skor</li>
            <li>Gunakan kolom <code class="inline">Cari</code> untuk mencari siswa berdasarkan nama atau NIS</li>
            <li>Hasil akan ditampilkan sesuai filter yang dipilih</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter rentang nilai berguna untuk mengidentifikasi siswa yang perlu perhatian khusus (nilai rendah) atau siswa berprestasi (nilai tinggi).</div>
        </div>
        <hr>
        <h3>🠊 Export Hasil Ujian</h3>
        <ol class="step-list">
            <li>Pada halaman Hasil Ujian, klik tombol <code class="inline">Export</code></li>
            <li>Pilih format export:
                <ul class="step-list">
                    <li><strong>PDF:</strong> Untuk laporan resmi dan distribusi</li>
                    <li><strong>Excel:</strong> Untuk analisis data dan pengolahan lebih lanjut</li>
                </ul>
            </li>
            <li>Pilih data yang akan di-export:
                <ul class="step-list">
                    <li><strong>Ringkasan:</strong> Hanya data ringkasan per siswa</li>
                    <li><strong>Detail:</strong> Data ringkasan + detail jawaban per soal</li>
                </ul>
            </li>
            <li>Klik tombol <code class="inline">Download</code></li>
            <li>File akan di-generate dan didownload ke komputer</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Export dalam format Excel jika perlu mengolah data lebih lanjut atau membuat analisis statistik.</div>
        </div>
        <hr>
        <h3>🠊 Ketentuan Hasil Ujian</h3>
        <ul class="step-list">
            <li><strong>Post-Ujian:</strong> Hasil ujian hanya tersedia setelah ujian selesai</li>
            <li><strong>Koreksi:</strong> Pastikan proses koreksi sudah selesai sebelum melihat hasil</li>
            <li><strong>Per Jadwal:</strong> Hasil ujian diorganisir per jadwal ujian</li>
            <li><strong>Akses:</strong> Guru dapat melihat hasil siswa di kelas yang mereka ampu</li>
            <li><strong>Edit:</strong> Nilai dapat diedit jika diperlukan (dengan izin)</li>
        </ul>

        <div class="info-box warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Peringatan:</strong>
                <ul>
                    <li>Hasil ujian bersifat sensitif dan harus dijaga kerahasiaannya</li>
                    <li>Hanya bagikan hasil kepada pihak yang berhak</li>
                    <li>Gunakan hasil ujian untuk evaluasi dan perbaikan pembelajaran</li>
                </ul>
            </div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Analisis:</strong> Analisis hasil ujian untuk identifikasi area perbaikan</li>
            <li><strong>Feedback:</strong> Berikan feedback konstruktif kepada siswa</li>
            <li><strong>Perbandingan:</strong> Bandingkan hasil dengan ujian sebelumnya</li>
            <li><strong>Tren:</strong> Identifikasi tren performa siswa</li>
            <li><strong>Intervensi:</strong> Berikan intervensi untuk siswa yang memerlukan</li>
            <li><strong>Dokumentasi:</strong> Simpan hasil ujian sebagai arsip</li>
            <li><strong>Komunikasi:</strong> Komunikasikan hasil kepada orang tua siswa</li>
            <li><strong>Review:</strong> Review hasil ujian secara berkala</li>
            <li><strong>Perbaikan:</strong> Gunakan hasil untuk perbaikan metode pengajaran</li>
            <li><strong>Keamanan:</strong> Jaga kerahasiaan data hasil ujian</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Hasil tidak muncul:</strong>
                <span>Pastikan jadwal ujian sudah dipilih. Pastikan ujian sudah selesai. Pastikan proses koreksi sudah selesai. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai tidak sesuai:</strong>
                <span>Pastikan kunci jawaban sudah diatur dengan benar. Periksa proses koreksi manual untuk soal essay. Koreksi ulang jika diperlukan.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Siswa tidak muncul:</strong>
                <span>Pastikan siswa sudah menyelesaikan ujian. Pastikan siswa terdaftar di jadwal ujian. Periksa status koreksi siswa.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Export gagal:</strong>
                <span>Pastikan koneksi internet stabil. Coba refresh halaman dan ulangi proses. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Detail tidak muncul:</strong>
                <span>Pastikan siswa sudah menyelesaikan ujian. Pastikan data tersimpan. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Post-Ujian:</strong> Hasil ujian hanya tersedia setelah ujian selesai dan semua jawaban sudah dikoreksi. Pastikan proses koreksi sudah selesai sebelum melihat hasil.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Koreksi Otomatis:</strong> Soal pilihan ganda dikoreksi secara otomatis. Soal essay dan jawaban singkat memerlukan koreksi manual oleh guru.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Edit Nilai:</strong> Nilai dapat diedit jika diperlukan, misalnya untuk kasus khusus atau penyesuaian. Edit nilai memerlukan izin administrator.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Akses Guru:</strong> Guru dapat melihat hasil siswa di kelas yang mereka ampu. Administrator memiliki akses penuh ke semua hasil ujian.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Hasil Ujian menggunakan endpoint untuk mengambil data hasil ujian siswa secara individual. Data diambil melalui AJAX GET dan mengembalikan respons JSON.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbthasil/hasil/{id_jadwal}</code></td><td>Tampilkan halaman hasil ujian</td></tr>
                <tr><td>GET</td><td><code>cbthasil/getHasil/{id_jadwal}/{id_siswa}</code></td><td>Ambil hasil ujian siswa tertentu</td></tr>
                <tr><td>GET</td><td><code>cbthasil/getDetailJawaban/{id_siswa}/{id_jadwal}</code></td><td>Ambil detail jawaban siswa</td></tr>
                <tr><td>GET</td><td><code>cbthasil/export/{id_jadwal}/{format}</code></td><td>Export hasil ujian (PDF/Excel)</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">GET <code>cbthasil/getHasil/{id_jadwal}/{id_siswa}</code> — Ambil Hasil Siswa</h3>
        <p>Endpoint ini menangani pengambilan data hasil ujian siswa tertentu.</p>
        <table class="table-custom">
            <thead><tr><th>Parameter URL</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
                <tr><td><code>id_siswa</code></td><td>Ya</td><td>ID siswa</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "siswa": { "id": 1, "nama": "Siswa A", "nis": "12345", "kelas": "X-A" },
  "hasil": { "nilai": 85, "benar": 35, "salah": 5, "tidak_dijawab": 0, "waktu": 2400 },
  "detail_jawaban": [
    { "nomor": 1, "jawaban": "A", "kunci": "A", "status": "benar", "poin": 2 }
  ]
}</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Hasil ujian hanya tersedia setelah ujian selesai dan semua jawaban sudah dikoreksi.</div>
        </div>
    </div>`
};
