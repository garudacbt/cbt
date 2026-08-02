if (typeof pageContents === 'undefined') var pageContents = {};

pageContents['rekap-nilai'] = {
    title: 'Rekap Nilai',
    desc: 'Panduan lengkap melihat rekapitulasi nilai ujian CBT di GarudaCBT.',
    html: `
    <div class="content-card">
        <h2><i class="fas fa-chart-bar"></i> Rekapitulasi Nilai Ujian</h2>
        <p>Rekap nilai menampilkan hasil ujian seluruh siswa dalam bentuk tabel yang dapat difilter dan diexport. Fitur ini memungkinkan guru dan administrator melihat performa siswa secara keseluruhan dan melakukan analisis hasil ujian.</p>

        <div class="screenshot-placeholder">
            <i class="fas fa-image"></i>
            <p>Screenshot akan ditambahkan di sini</p>
        </div>

        <hr>
        <h3>🠊 Mengakses Menu Rekap Nilai</h3>
        <ol class="step-list">
            <li>Login sebagai Administrator atau Guru ke sistem</li>
            <li>Buka menu <code class="inline">CBT</code></li>
            <li>Klik submenu <code class="inline">Hasil CBT</code></li>
            <li>Klik <code class="inline">Rekap Nilai</code></li>
            <li>Halaman Rekap Nilai akan ditampilkan</li>
        </ol>
        <div class="info-box tip">
            <i class="fas fa-info-circle"></i>
            <div><strong>Penting:</strong> Pastikan ujian sudah selesai dan koreksi manual sudah selesai sebelum melihat rekap nilai. Nilai yang belum dikoreksi akan dianggap 0.</div>
        </div>
        <hr>
        <h3>🠊 Melihat Rekap Nilai</h3>
        <ol class="step-list">
            <li>Pada halaman Rekap Nilai, pilih jadwal ujian yang ingin dilihat</li>
            <li>Dropdown jadwal ujian akan menampilkan semua jadwal yang sudah selesai</li>
            <li>Pilih jadwal ujian dari dropdown</li>
            <li>Rekap nilai akan ditampilkan dalam tabel</li>
            <li>Informasi yang ditampilkan:
                <ul class="step-list">
                    <li><strong>Nama Siswa:</strong> Nama siswa peserta ujian</li>
                    <li><strong>NIS:</strong> Nomor Induk Siswa</li>
                    <li><strong>Kelas:</strong> Kelas siswa</li>
                    <li><strong>Nilai Akhir:</strong> Nilai akhir ujian (0-100)</li>
                    <li><strong>Benar:</strong> Jumlah jawaban benar</li>
                    <li><strong>Salah:</strong> Jumlah jawaban salah</li>
                    <li><strong>Tidak Dijawab:</strong> Jumlah soal tidak dijawab</li>
                    <li><strong>Waktu:</strong> Waktu pengerjaan (menit:detik)</li>
                    <li><strong>Status:</strong> Status ujian (Selesai, Terputus, dll)</li>
                </ul>
            </li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Nilai akhir dihitung berdasarkan bobot setiap jenis soal. Pastikan bobot sudah diatur dengan benar di bank soal.</div>
        </div>
        <hr>
        <h3>🠊 Filter Rekap Nilai</h3>
        <ol class="step-list">
            <li>Gunakan dropdown <code class="inline">Filter</code> untuk memfilter berdasarkan:
                <ul class="step-list">
                    <li>Semua: Menampilkan semua siswa</li>
                    <li>Kelas: Filter berdasarkan kelas</li>
                    <li>Status: Filter berdasarkan status ujian</li>
                    <li>Nilai: Filter berdasarkan rentang nilai</li>
                </ul>
            </li>
            <li>Pilih filter yang diinginkan</li>
            <li>Dropdown tambahan akan muncul sesuai filter yang dipilih</li>
            <li>Tabel akan menampilkan data sesuai filter</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Filter sangat berguna untuk menemukan siswa tertentu atau menganalisis performa berdasarkan kriteria tertentu.</div>
        </div>
        <hr>
        <h3>🠊 Pencarian Siswa</h3>
        <ol class="step-list">
            <li>Gunakan kolom <code class="inline">Cari</code> di pojok kanan atas tabel</li>
            <li>Ketik nama siswa atau NIS yang ingin dicari</li>
            <li>Tabel akan menampilkan hasil pencarian secara real-time</li>
            <li>Hasil akan menyoroti teks yang cocok dengan pencarian</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Pencarian bersifat case-insensitive dan akan mencocokkan teks di kolom nama dan NIS.</div>
        </div>
        <hr>
        <h3>🠊 Export Data ke Excel</h3>
        <ol class="step-list">
            <li>Pada halaman Rekap Nilai, klik tombol <code class="inline">Export Excel</code></li>
            <li>File Excel akan didownload ke komputer</li>
            <li>File berisi data rekap nilai yang sedang ditampilkan</li>
            <li>Data dapat diolah lebih lanjut menggunakan Microsoft Excel</li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Export Excel berguna untuk analisis lebih lanjut, pembuatan laporan, atau dokumentasi hasil ujian.</div>
        </div>
        <hr>
        <h3>🠊 Detail Nilai Siswa</h3>
        <ol class="step-list">
            <li>Pada tabel rekap nilai, klik pada nama siswa</li>
            <li>Modal detail nilai siswa akan ditampilkan</li>
            <li>Informasi yang ditampilkan:
                <ul class="step-list">
                    <li>Informasi siswa (nama, NIS, kelas)</li>
                    <li>Statistik ujian (nilai, benar, salah, tidak dijawab)</li>
                    <li>Waktu pengerjaan</li>
                    <li>Detail jawaban per soal</li>
                    <li>Pembahasan soal (jika tersedia)</li>
                </ul>
            </li>
        </ol>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Detail nilai berguna untuk memahami performa siswa secara spesifik dan memberikan feedback yang lebih baik.</div>
        </div>
        <hr>
        <h3>🠊 Statistik Ujian</h3>
        <p>Halaman Rekap Nilai juga menampilkan statistik ringkasan:</p>
        <ul class="step-list">
            <li><strong>Total Siswa:</strong> Jumlah total siswa yang mengikuti ujian</li>
            <li><strong>Rata-rata Nilai:</strong> Rata-rata nilai seluruh siswa</li>
            <li><strong>Nilai Tertinggi:</strong> Nilai tertinggi di antara seluruh siswa</li>
            <li><strong>Nilai Terendah:</strong> Nilai terendah di antara seluruh siswa</li>
            <li><strong>Siswa Lulus:</strong> Jumlah siswa yang lulus (nilai >= KKM)</li>
            <li><strong>Siswa Tidak Lulus:</strong> Jumlah siswa yang tidak lulus (nilai < KKM)</li>
            <li><strong>Persentase Kelulusan:</strong> Persentase siswa yang lulus</li>
        </ul>

        <div class="info-box tip">
            <i class="fas fa-lightbulb"></i>
            <div><strong>Tips:</strong> Statistik ini membantu guru memahami performa kelas secara keseluruhan dan mengidentifikasi area yang perlu perhatian.</div>
        </div>
        <hr>
        <h3>🠊 Tips & Best Practices</h3>
        <ol class="step-list">
            <li><strong>Koreksi selesai:</strong> Pastikan koreksi manual selesai sebelum melihat rekap nilai</li>
            <li><strong>Export berkala:</strong> Export data secara berkala untuk backup dan dokumentasi</li>
            <li><strong>Analisis statistik:</strong> Gunakan statistik untuk memahami performa kelas</li>
            <li><strong>Filter efektif:</strong> Gunakan filter untuk fokus pada siswa tertentu</li>
            <li><strong>Detail individual:</strong> Lihat detail nilai untuk memahami performa individual</li>
            <li><strong>Komunikasi:</strong> Gunakan data untuk komunikasi dengan siswa dan orang tua</li>
            <li><strong>Perbaikan:</strong> Gunakan data untuk perbaikan pembelajaran</li>
            <li><strong>Dokumentasi:</strong> Simpan export Excel sebagai dokumentasi resmi</li>
            <li><strong>Review:</strong> Review data untuk memastikan akurasi</li>
            <li><strong>Feedback:</strong> Berikan feedback kepada siswa berdasarkan data</li>
        </ol>
        <hr>
        <h3>🠊 Troubleshooting: Masalah Umum dan Solusi</h3>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Data tidak muncul:</strong>
                <span>Pastikan jadwal ujian sudah dipilih. Pastikan ujian sudah selesai. Pastikan ada siswa yang mengikuti ujian.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Nilai 0 untuk semua siswa:</strong>
                <span>Pastikan koreksi manual sudah selesai untuk soal essay dan isian singkat. Nilai yang belum dikoreksi akan dianggap 0.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Export gagal:</strong>
                <span>Pastikan koneksi internet stabil. Coba refresh halaman dan ulangi export. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Filter tidak berfungsi:</strong>
                <span>Pastikan filter dipilih dengan benar. Refresh halaman dan coba lagi. Periksa apakah ada error di console browser.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Detail tidak muncul:</strong>
                <span>Pastikan siswa sudah selesai ujian. Pastikan data jawaban sudah tersimpan. Refresh halaman dan coba lagi.</span>
            </div>
        </div>
        <div class="info-box danger">
            <i class="fas fa-times-circle"></i>
            <div class="d-flex flex-column">
                <strong>Statistik tidak akurat:</strong>
                <span>Pastikan semua nilai sudah dikoreksi. Refresh halaman untuk update data. Periksa apakah ada data yang belum lengkap.</span>
            </div>
        </div>
        <hr>
        <h3>🠊 Catatan Penting</h3>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Koreksi Manual:</strong> Nilai soal essay dan isian singkat perlu dikoreksi manual melalui menu Koreksi sebelum nilai final tersedia.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>KKM:</strong> Statistik kelulusan berdasarkan KKM (Kriteria Ketuntasan Minimal) yang ditetapkan untuk mata pelajaran tersebut.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Data Real-Time:</strong> Data rekap nilai di-update secara real-time setelah koreksi selesai. Refresh halaman untuk melihat data terbaru.</div>
        </div>
        <div class="info-box info">
            <i class="fas fa-info-circle"></i>
            <div>
                <strong>Export Format:</strong> Export Excel menghasilkan file .xlsx yang dapat dibuka dengan Microsoft Excel atau aplikasi spreadsheet lainnya.</div>
        </div>
    </div>

    <div class="content-card">
        <h2><i class="fas fa-code"></i> Detail Teknis API</h2>
        <p>Rekap Nilai menggunakan endpoint untuk mengambil data rekapitulasi nilai seluruh siswa. Data diambil melalui AJAX GET dan mengembalikan respons JSON atau file Excel untuk export.</p>

        <h3>Daftar Endpoint</h3>
        <table class="table-custom">
            <thead><tr><th>Method</th><th>Endpoint</th><th>Fungsi</th></tr></thead>
            <tbody>
                <tr><td>GET</td><td><code>cbtrekap/rekap/{id_jadwal}</code></td><td>Tampilkan halaman rekap nilai</td></tr>
                <tr><td>GET</td><td><code>cbtrekap/getRekap/{id_jadwal}</code></td><td>Ambil data rekap nilai</td></tr>
                <tr><td>GET</td><td><code>cbtrekap/getDetail/{id_jadwal}/{id_siswa}</code></td><td>Ambil detail nilai siswa</td></tr>
                <tr><td>GET</td><td><code>cbtrekap/exportExcel/{id_jadwal}</code></td><td>Export rekap nilai ke Excel</td></tr>
                <tr><td>GET</td><td><code>cbtrekap/getStatistik/{id_jadwal}</code></td><td>Ambil statistik rekap nilai</td></tr>
            </tbody>
        </table>

        <h3 style="margin-top:20px;">GET <code>cbtrekap/getRekap/{id_jadwal}</code> — Ambil Rekap Nilai</h3>
        <p>Endpoint ini menangani pengambilan data rekapitulasi nilai seluruh siswa.</p>
        <table class="table-custom">
            <thead><tr><th>Parameter URL</th><th>Wajib</th><th>Keterangan</th></tr></thead>
            <tbody>
                <tr><td><code>id_jadwal</code></td><td>Ya</td><td>ID jadwal ujian</td></tr>
            </tbody>
        </table>
        <p style="margin-top:8px;"><strong>Respons JSON:</strong></p>
        <pre style="background:#f4f4f4;padding:12px;border-radius:4px;font-size:13px;">{
  "siswa": [
    { "id": 1, "nama": "Siswa A", "nis": "12345", "kelas": "X-A", "nilai": 85, "benar": 35, "salah": 5, "waktu": 2400 },
    { "id": 2, "nama": "Siswa B", "nis": "12346", "kelas": "X-A", "nilai": 90, "benar": 38, "salah": 2, "waktu": 2100 }
  ],
  "statistik": { "total": 30, "rata_rata": 87.5, "tertinggi": 95, "terendah": 70, "lulus": 28 }
}</pre>

        <div class="info-box info" style="margin-top:16px;">
            <i class="fas fa-info-circle"></i>
            <div>Data rekap nilai dihitung secara real-time setelah koreksi selesai. Refresh halaman untuk melihat data terbaru.</div>
        </div>
    </div>`
};
